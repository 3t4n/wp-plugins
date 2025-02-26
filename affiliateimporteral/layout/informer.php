<?php

global $wpdb;

$ViewContent = '';

$Content = json_decode(file_get_contents('https://cr1000team.com/wpad.json'), true);
$ContentCount = count($Content);

if($ContentCount > 0) {
    foreach($Content as $Item) {
        $ViewContent .= "<a href='" . $Item['DirectLinkURL'] . "' target='" . $Item['DirectLinkTarget'] . "'>";
        $ViewContent .= "<img src='" . $Item['BannerImageURL'] . "' width='" . $Item['BannerWidth'] . "' height='" . $Item['BannerHeight'] . "'>";
        $ViewContent .= "</a>";
    }
}

echo $ViewContent;
