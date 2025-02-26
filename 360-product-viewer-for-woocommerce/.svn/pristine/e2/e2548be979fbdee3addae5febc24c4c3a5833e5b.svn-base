<?php
namespace WP360view\Frontend;

use \WP360view\Helper\Wp360view_Loader;  

/**
 * 360 Product Template
 *
 * @since      1.0.0
 *
 * @package    WP360view
 * @subpackage WP360view\Frontend
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

echo '<a id="#threesixty_content_wrap" data-original-title="'. esc_attr__( '360 Product View', 'wp360view' ).'" class="threesixty-btn" data-images="'. esc_attr( $data_images ) .'" data-height="'. esc_attr( $height ) .'" data-width="'. esc_attr( $width ) .'" href="#threesixty_content_wrap">';
	echo '<img src="' . esc_url( WP360VIEW_PLUGIN_URL ) . 'images/360-degrees.png">';	
echo '</a>';

echo '<div id="threesixty_content_wrap" class="threesixty_content_wrap mfp-hide">';
	echo '<div class="threesixty threesixty-products'. esc_attr( $show_cursor_class ).'">';
		echo '<div class="spinner">';
		    echo '<span>0%</span>';
		echo '</div>';
		echo '<ol class="threesixty_images"></ol>';
	echo '</div>';
echo '</div>';