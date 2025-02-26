<?php
/*
Plugin Name: click-to-vote.me
Version: 21.3.13
Plugin URI: https://www.tipsandtricks-hq.com/?p=2700
Author: click-to-vote.me
Author URI: https://click-to-vote.me/
Description: Plugin to display click-to-vote.me polls.
 */

include_once 'settings.php';

add_shortcode('click-to-vote', function ($atts) {
    extract(shortcode_atts(array(
        'url' => '',
        'width' => '',
        'height' => '',
    ), $atts));

    if (empty($url)) {
        return "<p>Error! You must specify a value for 'url' to use this shortcode!</p>";
    }

    $src = "";

    // HTTPS URL
    $pattern = "/^(?:https:\/\/)click-to-vote.me\/[a-zA-Z0-9\/-]+$/i";
    $matchUrl = preg_match($pattern, $url);
    if ($matchUrl) {
        $src = $url;
    }

    // DOMAIN URL
    if (!$matchUrl) {
        $pattern = "/^click-to-vote.me\/[a-zA-Z0-9\/-]+$/i";
        $matchDomain = preg_match($pattern, $url);
        if ($matchDomain) {
            $src = "https://" . $url;
        }
    }

    // ID URL
    if (!$matchUrl) {
        $pattern = "/^[a-zA-Z0-9]*$/i";
        $matchId = preg_match($pattern, $url);
        if ($matchId) {
            $src = "https://click-to-vote.me/" . $url;
        }
    }

    if (!$matchUrl) {
        return "<script>console.error('wrong click-to-vote url: $url')</script>";
    }

    $width = filter_var($width, FILTER_SANITIZE_NUMBER_INT) ?: 560;
    $height = filter_var($height, FILTER_SANITIZE_NUMBER_INT) ?: 350;

    $output = "<iframe width='$width' height='$height' src='$url' frameborder='0'></iframe>";
    return $output;
});
