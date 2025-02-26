<?php
/**
 * Plugin Name: LiveCam + Timelapse for Wordpress and Android
 * Plugin URI: http://livecam.vicbusiness.com
 * Description: Add a tag for a livecam image from your android phone. A timelapse video of the last 12 hours is also generated.
 Add them to your pages and posts. Usage: [vicbusiness_livecam code='12345'] will display latest image. [vicbusiness_timelapse code='12345']
 will display last 12 hours of timelapse video. The code must be obtained from your android phone Press button marked show device code to see
 what this value should be. Download Android application from https://play.google.com/store/apps/details?id=vicbusiness.com
 * Version: 1
 * Author: vicbusiness.com
 * Author URI: http://livecam.vicbusiness.com
 * License: GPL2
 */

 add_shortcode('vicbusiness_livecam', 'vicbusiness_livecam');
 add_shortcode('vicbusiness_timelapse', 'vicbusiness_timelapse');
 wp_enqueue_script('livecamjs',WP_PLUGIN_URL.'/livecam.vicbusiness.com/livecamwp.js', array(), '1.3');
 wp_enqueue_script('videojs',WP_PLUGIN_URL.'/livecam.vicbusiness.com/video.js', array(), '1.3');
 wp_enqueue_style( 'video-jscss', WP_PLUGIN_URL.'/livecam.vicbusiness.com/video-js.css' );
 
 function getUrl(){
	return "http://livecam.vicbusiness.com/ul/";
 }
 
 function vicbusiness_livecam( $atts, $content, $sc) {
	return "<img id='imgSrc' src='".getUrl().$atts['code']."/image.jpg?d=".time()."' onload='fnSetTimer(this, this.src, 0, 1000);'/>";
 }
 
 function vicbusiness_timelapse($atts, $content, $sc) {
	$content ="<video  id=\"timelapse\" class=\"video-js vjs-default-skin\" controls preload=\"none\" width=\"420px\"	height=\"280px\"	  
				  data-setup=\"{}\">".
					"<source id='vidSrc' src='".getUrl().$atts['code']."/video.flv?d=".time()."' type='video/flv'/>								
				</video>";
	return $content;
 }