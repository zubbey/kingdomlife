<?php
require_once '../config/youtube-config.php';

session_start();

if (isset($_POST['submit'])) {

    $_SESSION['title'] = $_POST['vtitle'];
    $_SESSION['desc'] = $_POST['vdesc'];
    $_SESSION['tags'] = explode(",", $_POST['vtags']);

    $supported_filetype = array("video/mp4", "video/avi", "video/mpeg", "video/mpg", "video/mov", "video/wmv", "video/rm");

    if (isset($_FILES['video']['name'])) {
        $file_name = $_FILES['video']['name'];

        // get file extension
        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // get filename without extension
        $filenamewithoutextension = pathinfo($file_name, PATHINFO_FILENAME);

        if (in_array($_FILES['video']['type'], $supported_filetype)) {

            if (!file_exists(getcwd(). '/uploads')) {

                mkdir(getcwd(). '/uploads', 0777);
            }

            $filename_to_store = $filenamewithoutextension. '_' .time(). '.' .$ext;
            $video_path = getcwd(). '/uploads/'.$filename_to_store;
            move_uploaded_file($_FILES['video']['tmp_name'], $video_path);

            $_SESSION['video_path'] = $video_path;
        }
    }
}

// Check if an auth token exists for the required scopes
$tokenSessionKey = 'token-' . $client->prepareScopes();
if (isset($_GET['code'])) {
    if (strval($_SESSION['state']) !== strval($_GET['state'])) {
        die('The session state did not match.');
    }

    $client->authenticate($_GET['code']);
    $_SESSION[$tokenSessionKey] = $client->getAccessToken();
    header('Location: ' . $redirect);
}

if (isset($_SESSION[$tokenSessionKey])) {
    $client->setAccessToken($_SESSION[$tokenSessionKey]);
}

// Check to ensure that the access token was successfully acquired.
if ($client->getAccessToken()) {
    $htmlBody = '';
    try{

        if (isset($_SESSION['video_path'])) {

            // REPLACE this value with the path to the file you are uploading.
            $videoPath = $_SESSION['video_path'];

            // Create a snippet with title, description, tags and category ID
            // Create an asset resource and set its snippet metadata and type.
            // This example sets the video's title, description, keyword tags, and
            // video category.
            $snippet = new Google_Service_YouTube_VideoSnippet();
            $snippet->setTitle($_SESSION['title']);
            $snippet->setDescription($_SESSION['desc']);
            $snippet->setTags($_SESSION['tags']);

            // Numeric video category. See
            // https://developers.google.com/youtube/v3/docs/videoCategories/list
            $snippet->setCategoryId("22");

            // Set the video's status to "public". Valid statuses are "public",
            // "private" and "unlisted".
            $status = new Google_Service_YouTube_VideoStatus();
            $status->privacyStatus = "private";

            // Associate the snippet and status objects with a new video resource.
            $video = new Google_Service_YouTube_Video();
            $video->setSnippet($snippet);
            $video->setStatus($status);

            // Specify the size of each chunk of data, in bytes. Set a higher value for
            // reliable connection as fewer chunks lead to faster uploads. Set a lower
            // value for better recovery on less reliable connections.
            $chunkSizeBytes = 1 * 1024 * 1024;

            // Setting the defer flag to true tells the client to return a request which can be called
            // with ->execute(); instead of making the API call immediately.
            $client->setDefer(true);

            // Create a request for the API's videos.insert method to create and upload the video.
            $insertRequest = $youtube->videos->insert("status,snippet", $video);

            // Create a MediaFileUpload object for resumable uploads.
            $media = new Google_Http_MediaFileUpload(
                $client,
                $insertRequest,
                'video/*',
                null,
                true,
                $chunkSizeBytes
            );
            $media->setFileSize(filesize($videoPath));


            // Read the media file and upload it chunk by chunk.
            $status = false;
            $handle = fopen($videoPath, "rb");
            while (!$status && !feof($handle)) {
                $chunk = fread($handle, $chunkSizeBytes);
                $status = $media->nextChunk($chunk);
            }

            fclose($handle);

            // If you want to make other calls after the file upload, set setDefer back to false
            $client->setDefer(false);

            @unlink($_SESSION['video_path']);
            unset($_SESSION['video_path']);
            $_SESSION['id'] = $status['id'];
        }

        $htmlBody .= "<h3>Video Uploaded</h3><ul>";
        $htmlBody .= sprintf('<li>%s (%s)</li>',
            $_SESSION['title'],
            $_SESSION['id']);

        $htmlBody .= '</ul>';

    } catch (Google_Service_Exception $e) {
        $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
            htmlspecialchars($e->getMessage()));
    } catch (Google_Exception $e) {
        $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
            htmlspecialchars($e->getMessage()));
    }

    $_SESSION[$tokenSessionKey] = $client->getAccessToken();
}else {
    // If the user hasn't authorized the app, initiate the OAuth flow
    $state = mt_rand();
    $client->setState($state);
    $_SESSION['state'] = $state;

    $authUrl = $client->createAuthUrl();
    $htmlBody = <<<END
  <h3>Authorization Required</h3>
  <p>You need to <a href="$authUrl">authorize access</a> before proceeding.<p>
END;
}
?>

<!doctype html>
<html>
<head>
    <title>Video Uploaded</title>
</head>
<body>
<?=$htmlBody?>
</body>
</html>