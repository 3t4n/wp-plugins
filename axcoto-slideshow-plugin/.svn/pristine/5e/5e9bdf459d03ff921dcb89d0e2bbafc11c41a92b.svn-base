<?php
/*
 Plugin Name: Axcoto SlideShow
 Plugin URI: http://axcoto.com
 Description: Display your slideshow in a amazing and terrific manner, on your sidebar or post/page, unlimited numbers
 Version: 1.0
 Author: kureikain
 Author URI: http://axcoto.com/vincent
 */

define(AXCOTO_HASHTAG, 'Axcoto-Slideshow');
define(AXCOTO_SLIDESHOW_WIDGET_ID, 'widget_axcoto_slideshow');
define(AXCOTO_SLIDESHOW_DIR, ABSPATH . 'wp-content/plugins/axcoto-slideshow');
$siteurl = get_option('siteurl') . '/wp-content/plugins/axcoto-slideshow';
define(AXCOTO_SLIDESHOW_URL, $siteurl);

include 'axcoto-slideshow-widget.php';

if (stripos($siteurl, 'http://www')===FALSE) {
	str_replace('http://', 'http://www', $siteurl);
	define(AXCOTO_SLIDESHOW_URL, $siteurl);		
} else {
	define(AXCOTO_SLIDESHOW_URL, $siteurl);
}

include('axcoto-slideshow.class.php');

wp_register_script('axcoto-swfobject', AXCOTO_SLIDESHOW_URL . "/js/swfobject.js", false, '1.0');
wp_register_script('axcoto-validate', AXCOTO_SLIDESHOW_URL . "/js/validate/jquery.validate.pack.js", false, '1.0');
wp_register_script('axcoto-general', AXCOTO_SLIDESHOW_URL . "/js/axcoto.js", false, '1.0');

wp_register_style('axcoto-validate', AXCOTO_SLIDESHOW_URL  . '/js/validate/f.css', false, '1.0');
wp_register_style('axcoto-css', AXCOTO_SLIDESHOW_URL  . '/css/axcoto.css', false, '1.0');

wp_enqueue_script(array('axcoto-swfobject', 'axcoto-validate', 'axcoto-general'));
wp_enqueue_style(array('axcoto-validate', 'axcoto-css')) ;

function axcoto_slideshow_admin_page() {
	Axcoto_Slideshow::getSingleton()->renderAdminPage();
}

function axcoto_slideshow_admin_help() {
	Axcoto_Slideshow::getSingleton()->renderAdminHelp();
}

// Add item to Settings
function axcoto_slideshow_admin_menu() {
	add_menu_page('Axcoto Slideshow', 'AX Slideshow', 8, 'axcoto_slideshow', 'axcoto_slideshow_admin_page', AXCOTO_SLIDESHOW_URL . '/images/icon.png');
	/*
	add_submenu_page('axcoto_slideshow', 'List Galleries', 'List Galleries', 8, 'axcoto_slideshow', 'axcoto_slideshow_admin_page' );	
	add_submenu_page('axcoto_slideshow', 'Help', 'Help', 8, 'axcoto-slideshow-admin-help', 'axcoto_slideshow_admin_help' );
	add_submenu_page('axcoto_slideshow', 'About', 'About', 8, 'axcoto-slideshow-admin-about', 'axcoto_slideshow_admin_help' );
	*/
}
add_action('admin_menu', 'axcoto_slideshow_admin_menu');


function axcoto_slideshow_filter($content) {
	return Axcoto_Slideshow::getSingleton()->filterInsertSlideshow($content);	
}

add_action('widgets_init', create_function('', 'return register_widget("Axcoto_Slideshow_Widget");'));
add_filter('the_content', 'axcoto_slideshow_filter',10);
?>
