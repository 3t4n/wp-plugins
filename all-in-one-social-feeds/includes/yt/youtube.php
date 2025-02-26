<?php
$url = trim(get_option('netgo_youtube_video_url'));;
preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
$youtube_url = $matches[1]; 