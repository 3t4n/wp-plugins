<?php
/**
 * A template for inserting asd_slide post types with the shortcode.
 *
 * @package        WordPress
 * @subpackage     ASD_RockAndRoll_Powerslider
 * Author:         Michael H Fahey
 * Author URI:     https://artisansitedesigns.com/staff/michael-h-fahey
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post;

echo '<div id="powerslide_' . esc_attr( $post->ID ) . '">' . "\r\n";

the_post_thumbnail( 'full' );
the_content();

echo '</div>' . "\r\n";
