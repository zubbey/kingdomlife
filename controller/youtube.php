<?php
require_once ('./config/constants.php');
//Get videos from channel by YouTube Data API
$API_key    = 'GOOGLE_API_KEY';
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