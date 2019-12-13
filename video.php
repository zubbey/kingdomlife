<?php
//Get videos from channel by YouTube Data API
$API_key    = 'AIzaSyCWKqgF6cZ_8NFrsi4J_xfNShB2DHSkU6U';
$channelID  = 'UCUpOJeFIjT8Xx8Aux-OcT8w';
$maxResults = 50;
$videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&key='.$API_key.''));
//YouTube Video ID – $item->id->videoId
//YouTube Video Publish Date – $item->snippet->publishedAt
//YouTube Channel ID – $item->snippet->channelId
//YouTube Video Title – $item->snippet->title
//YouTube Video Description – $item->snippet->description
//YouTube Video Thumbnail URL (default size) – $item->snippet->thumbnails->default->url
//YouTube Video Thumbnail URL (medium size) – $item->snippet->thumbnails->medium->url
//YouTube Video Thumbnail URL (large size) – $item->snippet->thumbnails->high->url
//YouTube Channel Title – $item->snippet->channelTitle
?>

<div class="container">
    <div class="row clearfix">
        <?php
        foreach($videoList->items as $item){
            //Embed video
            if(isset($item->id->videoId)){
                echo '
                    <div class="col m-auto">
                        <div class="card">
                            <div class="card-body m-auto youtube-video mb-3" style="width: 320px; height: 100%">
                                <iframe width="280" height="150" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
                                <div class="card-title"><h5>'. $item->snippet->title .'</h5></div>
                                <p class="card-text">'. $item->snippet->publishedAt .'</p>
                            </div>
                        </div>
                    </div>';
            }
        }
        ?>
    </div>
</div>
