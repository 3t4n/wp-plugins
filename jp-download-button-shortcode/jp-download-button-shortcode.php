<?php

/*
Plugin Name: JP Download Button Shortcode
Plugin URI: http://skjoybd.com/plugins/jp-downlaod-button-shortcode
Description: This is a simple plugin.Use shortcode [download]your download link here[/download] to post or page.Then see a beautifull download button will be appear.
Author: S.k.joy
Version: 1.0
Author URI: http://skjoybd.com
*/

/* Download button shortcode */
	
	define('JP_DOWNLOAD_BUTTON_SHORTCODE', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	
	function download_button ($atts, $content=null) {
	return '<center><a href="'.$content.'" target="blank" title="Click here to download"><img style="background: none; padding: 0px; border: none;" src="'.JP_DOWNLOAD_BUTTON_SHORTCODE.'img/download.gif" alt="Download" /></a></center>';
	}
	
	add_shortcode('download','download_button');


?>