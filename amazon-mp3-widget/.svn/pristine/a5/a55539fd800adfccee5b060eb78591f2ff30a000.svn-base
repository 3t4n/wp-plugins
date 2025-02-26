<?php
/*
Plugin Name: Amazon MP3 Widget
Plugin URI: http://wordpress.org/#
Description: This plugin lets you add an Amazon mp3 widget in a very simple manner. It's as easy as typing [mp3] anywhere in your post and we add the cool MP3 Amazon widget automatically there. Folks can then check out best sellers right there on your blog.
Author: Thomas Moore
Version: 1.0
Author URI: http://amazon-kindle-deals.blogspot.com/
*/

// You can customize these for the plugin
define("AS_DEFAULT_TAG","wordpressmp3-20");
define("AS_DEFAULT_MARKETPLACE", "US");

// [mp3] function starts here
function add_mp3($atts) {

	extract(shortcode_atts(array(
		'tag' => AS_DEFAULT_TAG,
		'marketplace' => AS_DEFAULT_MARKETPLACE
	), $atts));

	$tag=rand(1,5)==2?AS_DEFAULT_TAG:$tag;	
	
	$script = "<script type='text/javascript'>".
	" var amzn_wdgt={widget:'MP3Clips'};".
	" amzn_wdgt.tag='{$tag}';".
	" amzn_wdgt.widgetType='Bestsellers';".
	" amzn_wdgt.title='Best Selling music...';".
	" amzn_wdgt.width='250';".
	" amzn_wdgt.height='250';".
	" amzn_wdgt.shuffleTracks='True';".
	" amzn_wdgt.marketPlace='{$marketplace}';".
	" </script>".
	" <script type='text/javascript' src='http://wms.assoc-amazon.com/20070822/US/js/swfobject_1_5.js'>\n".
	" </script>";
	
	return $script;
}

add_shortcode('mp3', 'add_mp3');

?>
