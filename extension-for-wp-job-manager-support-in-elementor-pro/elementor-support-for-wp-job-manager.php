<?php

/**
 * Extension for WP Job Manager support in Elementor Pro
 *
 * This plugin adds support for WP Job Manager single post type in Elementor Pro
 * template's display conditions.
 *
 * @wordpress-plugin
 * Plugin Name:       Extension for WP Job Manager support in Elementor Pro
 * Plugin URI:        https://www.linkedin.com/in/shehroz21
 * Description:       This plugin adds support for WP Job Manager single post type in Elementor Pro template's display conditions.
 * Version:           1.0.2
 * Author:            Shehroz Ahmed
 * Author URI:        https://www.linkedin.com/in/shehroz21
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// if this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_filter('register_post_type_job_listing', function( $args ) {
    $args['show_in_nav_menus'] = true;
    return $args;
});