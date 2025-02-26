<?php
/**
 * Plugin Name: Distinctive Lightbox
 * Description: A lightweight, pure JS lightbox which supports beautiful galleries and also YouTube/Vimeo videos.
 * Version:     1.0.4
 * Author:      DistinctivePixels
 * Author URI:  https://www.distinctivepixels.com
 * Text Domain: distinctive-lightbox
 * Domain Path: /languages
 *
 * @package DistinctiveLightbox
 */


// Useful global constants.
define( 'DISTINCTIVE_LIGHTBOX_VERSION', '1.0.4' );
define( 'DISTINCTIVE_LIGHTBOX_URL', plugin_dir_url( __FILE__ ) );
define( 'DISTINCTIVE_LIGHTBOX_PATH', plugin_dir_path( __FILE__ ) );
define( 'DISTINCTIVE_LIGHTBOX_INC', DISTINCTIVE_LIGHTBOX_PATH . 'includes/' );
define( 'DISTINCTIVE_LIGHTBOX_FILE', __FILE__ );

// Include files.
require_once DISTINCTIVE_LIGHTBOX_INC . 'functions/core.php';

// Require Composer autoloader if it exists.
if ( file_exists( DISTINCTIVE_LIGHTBOX_PATH . '/vendor/autoload.php' ) ) {
	require_once DISTINCTIVE_LIGHTBOX_PATH . 'vendor/autoload.php';
}

$distinctive_lightbox = \DistinctiveLightbox\DistinctiveLightbox::get_instance();
$distinctive_lightbox->init();
