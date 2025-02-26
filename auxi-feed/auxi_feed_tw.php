<?php
/*
Plugin Name: Auxilerate Twitter masonry
Description: Display your twitter feeds in a masonry type layout
Version: 1.0
Author: Auxilherate
Text Domain: Auxilerate-Feed
License: GPLv2 or later
*/






add_action( 'init', function() {
	include "auxi_feed_auxiTw.php";
	$twitter_feeds = new Auxi_Feeds_Tw();
} );