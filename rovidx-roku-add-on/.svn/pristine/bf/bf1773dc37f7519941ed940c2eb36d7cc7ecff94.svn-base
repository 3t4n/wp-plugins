<?php

// XML Generator
function rokuFeedGen()
{
    global $roFeed, $roCatGrab;
	$options = get_option('rovidx_settings_roku');
	$userCat = $options["rokuCat"];

    $roDat   = 'roku';
	add_feed($roDat, 'rokuBasicChannel');
	add_feed('rokucat', 'rokuBasicCats');
}
add_action('init', 'rokuFeedGen');
