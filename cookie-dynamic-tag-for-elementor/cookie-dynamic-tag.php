<?php
/**
 * Plugin Name:       Cookie Dynamic Tag for Elementor
 * Plugin URI:        https://wecodify.co/
 * Description:       Enables you to use browser cookies as dynamic tags in Elementor Pro.
 * Version:           1.0.0
 * Elementor tested up to: 3.6.6
 * Elementor Pro tested up to: 3.7.2
 * Author:            WeCodify Co.
 * Author URI:        https://wecodify.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cookie-dynamic-tag
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Cookie Dynamic Tag.
 *
 * Include dynamic tag file and register tag class.
 *
 * @param \Elementor\Core\DynamicTags\Manager $dynamic_tags_manager Elementor dynamic tags manager.
 *
 * @return void
 * @since 1.0.0
 */
add_action( 'elementor/dynamic_tags/register', function ( $dynamic_tags_manager ) {
	// include dependencies
	require_once( __DIR__ . '/includes/elementor.php' );

	$dynamic_tags_manager->register( new \Elementor_Dynamic_Tag_Cookie );
} );