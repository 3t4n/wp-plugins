<?php
/**
 * Plugin Name: Advanced Image Grabber
 * Plugin URI: https://www.mansurahamed.com/advanced-image-grabber/
 * Description: Fetch images from any webpage and save into your media library. This plugin shows all the images of a webpage to download. You can bulk download all images from any webpage into media library at one click. 
 * Version: 1.1
 * Author: Mansur Ahamed
 * Author URI: https://www.upwork.com/freelancers/~013259d08861bd5bd8
 * License: GPLv2 http://www.gnu.org/licenses/gpl-2.0.html
 */

require_once('class_image_grabber.php');
require_once('views.php');
add_action( 'admin_menu', 'advanced_image_grabber_admin_menu' );

function advanced_image_grabber_admin_menu() {
	add_management_page( 
		'Advanced Image Grabber',
		'Image Grabber',
		'manage_options',
		'advanced-image-grabber',
		array('Advanced_Image_Grabber_views','adminSettingsPage')
	);
}

?>