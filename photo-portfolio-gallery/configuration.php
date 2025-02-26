<?php
/**
 * Plugin configurations
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$GLOBALS['webpace_portfolio_aliases'] = array(
	'Photo_Gallery_Install'          => 'includes/front-end/photo-portfolio-install-class',
	'Photo_Gallery_Template_Loader'  => 'includes/front-end/photo-portfolio-class-template-loader',
	'Photo_Gallery_Ajax'             => 'includes/front-end/photo-portfolio-class-ajax',
	'Photo_Gallery_Widgets'          => 'includes/front-end/photo-portfolio-class-widgets',
	'Photo_Gallery_Widget'           => 'includes/front-end/photo-portfolio-class-webpace-widget',
	'Photo_Gallery_Shortcode'        => 'includes/front-end/photo-portfolio-class-shortcode',
	'Photo_Gallery_Frontend_Scripts' => 'includes/front-end/photo-portfolio-class-frontend-scripts',
	'Photo_Gallery_Admin'            => 'includes/admin/class-photo-portfolio-admin',
	'Photo_Gallery_Admin_Assets'     => 'includes/admin/class-photo-portfolio-admin-assets',
	'Photo_Gallery_General_Options'  => 'includes/admin/class-photo-portfolio-general-options',
	'Photo_Gallery_Portfolios'       => 'includes/admin/class-photo-portfolio-page',
	'Photo_Gallery_Lightbox_Options' => 'includes/admin/class-photo-portfolio-lightbox-settings',
	'Photo_Gallery_Licensing'        => 'includes/admin/class-photo-portfolio-licensing'
);

/**
 * @param $classname
 *
 * @throws Exception
 */
function photo_gallery_autoload( $classname ) {
	global $webpace_portfolio_aliases;

	/**
	 * We do not touch classes that are not related to us
	 */
	if ( ! strstr( $classname, 'Photo_Gallery_' ) ) {
		return;
	}

	if ( ! key_exists( $classname, $webpace_portfolio_aliases ) ) {
		throw new Exception( 'trying to load "' . $classname . '" class that is not registered in config file.' );
	}

	$path = Photo_Gallery()->plugin_path() . '/' . $webpace_portfolio_aliases[ $classname ] . '.php';

	if ( ! file_exists( $path ) ) {

		throw new Exception( 'the given path for class "' . $classname . '" is wrong, trying to load from ' . $path );

	}

	require_once $path;

	if ( ! interface_exists( $classname ) && ! class_exists( $classname ) ) {

		throw new Exception( 'The class "' . $classname . '" is not declared in "' . $path . '" file.' );

	}
}

spl_autoload_register( 'photo_gallery_autoload' );