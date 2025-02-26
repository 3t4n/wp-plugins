<?php
/*
 * Plugin Name:       AJS Instagram Feed
 * Plugin URI:        http://www.appswifters.com/angularjs-instagram-feed
 * Description:       AJS(AngularJS) Instagram Feed displays impressive & responsive photos from instagram using AngularJS.
 * Version:           1.0
 * Author:            AppSwifters
 * Author URI:        http://appswifters.com
 * Text Domain:       ajs-instagram-feed
 * License: 		  GPLv2 or later
 * License URI:		  http://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path:       /languages
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once plugin_dir_path( __FILE__ ) . 'includes/class-ajs-instagram-feed.php';

register_activation_hook( __FILE__, 'ajs_instagram_feed_activate');

function ajs_instagram_feed_activate(){

	$sort_photos = get_option('ajs_sort_photos');
	if ( empty($sort_photos) ) {
		update_option('ajs_sort_photos', "-created_timet");
	}
	
	$ajs_count = get_option('ajs_count');
	if ( empty($count) ) {
		update_option('ajs_count', "6");
	}
	
	$show_username = get_option('ajs_show_username');
	if ( empty($show_username) ) {
		update_option('ajs_show_username', "yes");
	}
	
	$username_text_color = get_option('ajs_username_text_color');
	if ( empty($username_text_color) ) {
		update_option('ajs_username_text_color', "#1c5380");
	}
	
	$show_follow_btn = get_option('ajs_show_follow_btn');
	if ( empty($show_follow_btn) ) {
		update_option('ajs_show_follow_btn', "yes");
	}
	
	$follow_btn_text_color = get_option('ajs_follow_btn_text_color');
	if ( empty($follow_btn_text_color) ) {
		update_option('ajs_follow_btn_text_color', "#fffff");
	}
	
	$follow_btn_bg_color = get_option('ajs_follow_btn_bg_color');
	if ( empty($follow_btn_bg_color) ) {
		update_option('ajs_follow_btn_bg_color', "#1c5380");
	}
	
	$follow_btn_text = get_option('ajs_follow_btn_text');
	if ( empty($follow_btn_text) ) {
		update_option('ajs_follow_btn_text', "Follow on Instagram");
	}
	
	update_option('ajs_client_id', "0e270ebf674f4e9fa037d223476e1abc");
}

//Add  the nedded styles & script
add_action('wp_print_styles', 'ajs_instagram_feed_style');
add_action('wp_head', 'ajs_instagram_feed_custom_cssnjs');
add_action('init', 'ajs_instagram_feed_script');

add_shortcode('angularjs-instagram-feed', 'ajs_instagram_feed_shortcode');

/** Link the needed stylesheet */
function ajs_instagram_feed_style() {
	wp_enqueue_style('ajs-instagram-feed-css', WP_PLUGIN_URL.'/ajs-instagram-feed/styles/ajs-instagram-feed.css');
	wp_enqueue_style('font-awesome-css', WP_PLUGIN_URL.'/ajs-instagram-feed/font-awesome/css/font-awesome.min.css');
}

function ajs_instagram_feed_custom_cssnjs() {
	echo "<style type=\"text/css\" media=\"screen\">" . stripslashes(get_option('ajs_custom_css')). "</style>";
	echo "<script type=\"text/javascript\"> var pluginUrl = '". WP_PLUGIN_URL ."'; </script>";
	echo "<script type=\"text/javascript\">" . stripslashes(get_option('ajs_custom_js')). "</script>";
	echo "<script type=\"text/javascript\">";
		$custom_styles = ' $j = jQuery.noConflict(); $j(document).ready(function() {';
		$custom_styles .= ' $j(".ajs-instagram-feed .profile img").css({"border" : "2px solid '.get_option('ajs_username_text_color').'"});';
		$custom_styles .= ' $j(".ajs-instagram-feed .profile h2, .ajs-instagram-feed .profile p").css({"color" : "'.get_option('ajs_username_text_color').'"});';
		$custom_styles .= ' $j(".ajs-instagram-feed .follow-btn").css({"background" : "'.get_option('ajs_follow_btn_bg_color').'"});';
		$custom_styles .= ' $j(".ajs-instagram-feed .follow-btn").css({"color" : "'.get_option('ajs_follow_btn_text_color').'"});';
	echo $custom_styles;
	echo " }); </script>";
}

/** Link the needed script */
function ajs_instagram_feed_script() {
	if ( !is_admin() ){
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'angular', plugins_url('/js/angular.min.js', __FILE__), array('jquery') );
		wp_enqueue_script( 'angular-resource', plugins_url('/js/angular-resource.min.js', __FILE__), array('angular') );
		wp_enqueue_script( 'ajs-script', plugins_url('/js/ajs-script.js', __FILE__), array('angular') );
	}
}

function ajs_instagram_feed_shortcode() {
	return ajs_instagram_feed_show( );
}

function ajs_instagram_feed_show( ) {	

	if ( get_option('ajs_access_token') && get_option('ajs_user_id') ){
		$output = '<div class="ajs-instagram-feed" ng-app="ajsInstagramFeed" ng-controller="AjsInstagramFeedController">
				<div class="container">';
				
		if (get_option('ajs_show_username') == 'yes'){			
			$output .= '<div class="profile">
					<img align="left" src="{{user.profile_picture}}" />
					<h2>{{user.username}}</h2>
					<p>{{user.bio}}</p>
				</div>
				<div class="clr"></div>';
		}
				$output .= '<div class="img-block" ng-repeat="p in pics | orderBy:\''.get_option('ajs_sort_photos').'\'">
					<div class="block blk-bg slide-left">
						<a href="{{p.link}}" target="_blank">
							<img ng-src="{{p.images.low_resolution.url}}" />
							<div class="text">
								<span>
									<p class="stats"> {{p.created_time * 1000 | date : \'mediumDate\'}}</p>
								</span>
							</div>
						</a>
					</div>
				</div>';
				
		if (get_option('ajs_show_follow_btn') == 'yes'){
			$output .= '<div class="links">
					<a href="http://instagram.com/{{user.username}}" target="_blank" class="follow-btn">'.get_option('ajs_follow_btn_text').'</a>
				</div>';
		}else{
			$output .= '<div class="clr pad10"></div>';
		}

		$output .= '</div>
			</div>';
	}else{
		$output =  '<div class="ajs-instagram-feed">Please configure your access token & user id.</div>';
	}
	
	return $output;
}

function run_ajs_instagram_feed() {
	$ajsinsta = new Ajs_Instagram_Feed();
	$ajsinsta->run();
}

run_ajs_instagram_feed();
