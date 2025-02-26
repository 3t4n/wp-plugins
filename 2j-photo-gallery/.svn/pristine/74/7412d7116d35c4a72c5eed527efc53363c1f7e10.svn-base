<?php
/*
Plugin Name: Photo Gallery by 2J - Responsive Photo Gallery, Image Gallery
Plugin URI: http://2joomla.net/wordpress-plugins/photo-gallery
Description: Photo gallery with light style design. Simple config and interface settings of the photo gallery. Classic and grid photo layout.
Version: 1.0.12
Author: 2JGallery
Author URI: http://2joomla.net/wordpress-plugins/photo-gallery/overview
License: GPL2
Text Domain: 2j-photo-gallery
Domain Path: /languages
*/


if ( ! defined( 'WPINC' ) )  die;
if ( ! defined( 'ABSPATH' ) ) exit;

define('TWOJ_PHOTO_GALLERY_VERSION', 			'1.0.12');
define("TWOJ_PHOTO_GALLERY_URL", 				plugin_dir_url( __FILE__ ) );
define("TWOJ_PHOTO_GALLERY_PATH", 				plugin_dir_path( __FILE__ ) );
define("TWOJ_PHOTO_GALLERY_INCLUDES_PATH", 		TWOJ_PHOTO_GALLERY_PATH.'includes/');

function Photo_Gallery_2J_Function_Activation(){
		require_once TWOJ_PHOTO_GALLERY_PATH.'photo_gallery_init.php';
		Class_Photo_Gallery_2J_Activator::start();
}
register_activation_hook( __FILE__, 'Photo_Gallery_2J_Function_Activation' );

function Photo_Gallery_2J_Function_Deactivation(){
		require_once TWOJ_PHOTO_GALLERY_PATH.'photo_gallery_init.php';
		Class_Photo_Gallery_2J_Activator::end();
}
register_deactivation_hook( __FILE__, 'Photo_Gallery_2J_Function_Deactivation' );

require_once TWOJ_PHOTO_GALLERY_INCLUDES_PATH.'widget.php';

function twoj_photo_gallery_settings_menu() {
	$title = __( '2J Photo Gallery' );
	add_submenu_page( 'options-general.php', $title, $title, 'manage_options', 'photo_gallery_2j_settings', 'twoj_photo_gallery_options' );
}

if( is_admin() ) {
	add_action( 'admin_menu', 'twoj_photo_gallery_settings_menu' );
}

function twoj_photo_gallery_options() {
	include( TWOJ_PHOTO_GALLERY_INCLUDES_PATH .'options.php');
}
