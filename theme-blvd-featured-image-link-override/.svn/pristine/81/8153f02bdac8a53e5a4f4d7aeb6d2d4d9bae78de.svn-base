<?php
/*
Plugin Name: Theme Blvd Featured Image Link Override
Description: When using a theme with Theme Blvd framework version 2.1.0+, this plugin allows you to set featured image link options globally throughout your site.
Version: 2.0.4
Author: Jason Bobich
Author URI: http://jasonbobich.com
License: GPL2

    Copyright 2015  Jason Bobich

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 2,
    as published by the Free Software Foundation.

    You may NOT assume that you can use any other version of the GPL.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    The license for this software can likely be found here:
    http://www.gnu.org/licenses/gpl-2.0.html

*/

/*
WAIT! Before we move on, we need to clear up one, little thing...

What the hell does "filo" stand for? -- You will see this used through
out the plugin, and it standard for "featured image link override" ...
No biggy.
*/

/**
 * Add filo options to Appearance > Theme Options > Configuration
 *
 * @since 1.0.0
 */

function themeblvd_filo_options() {

	if ( ! defined('TB_FRAMEWORK_VERSION') ) {

		return;

	}

	// First make sure they're using a theme that supports this.
	if ( function_exists( 'themeblvd_add_option_section' ) ) {

		// Add configuration tab, if it doesn't exist.
		themeblvd_add_option_tab( 'config', __( 'Configuration', 'theme-blvd-featured-image-link-override' ) );

		// Add option section
		themeblvd_add_option_section( 'config', 'filo', __( 'Featured Image Link Override', 'theme-blvd-featured-image-link-override' ), '', array(
			array(
				'name' 		=> __( 'Link Override', 'theme-blvd-featured-image-link-override' ),
				'desc' 		=> __( 'Select how you\'d like all featured image links currently set to "Featured image is not a link" to be overridden.', 'theme-blvd-featured-image-link-override' ),
				'id' 		=> 'filo',
				'std' 		=> 'none',
				'type' 		=> 'radio',
				'options'	=> array(
					'none' 	=> __( 'No, do not apply override.', 'theme-blvd-featured-image-link-override' ),
					'post' 	=> __( 'Featured images link to their posts.', 'theme-blvd-featured-image-link-override' ),
					'image'	=> __( 'Featured images link to their enlarged versions in a lightbox.', 'theme-blvd-featured-image-link-override' )
				)
			),
			array(
				'name' 		=> __( 'Single Posts', 'theme-blvd-featured-image-link-override' ),
				'desc' 		=> __( 'Would you like to apply your above selection to single posts, as well?<br><br>For example, if you have your featured images set to link to their posts, you may not want this functionality to repeat on the single post\'s page.', 'theme-blvd-featured-image-link-override' ),
				'id' 		=> 'filo_single',
				'std' 		=> 'true',
				'type' 		=> 'radio',
				'options'	=> array(
					'true' 		=> __( 'Yes, apply the above override to single posts, too.', 'theme-blvd-featured-image-link-override' ),
					'false' 	=> __( 'No, do not apply the above override to single posts.', 'theme-blvd-featured-image-link-override' )
				)
			)
		));
	}

}
add_action( 'after_setup_theme', 'themeblvd_filo_options' );

/**
 * Add filter to _tb_thumb_link custom field.
 *
 * @since 2.0.0
 */
function themeblvd_filo_thumb_link( $val, $post_id, $key ) {

	if ( $key != '_tb_thumb_link' ) {

		return $val;

	}

	if ( ! is_admin() || ( defined('DOING_AJAX') && DOING_AJAX ) ) {

		remove_filter('get_post_metadata', 'themeblvd_filo_thumb_link', 20);

		$new_val = get_post_meta($post_id, '_tb_thumb_link', true);

		add_filter('get_post_metadata', 'themeblvd_filo_thumb_link', 20, 3);

		if ( $new_val && $new_val != 'inactive' ) {

			return $val;

		}

		$filo = themeblvd_get_option('filo');

		if ( ! $filo || $filo == 'none' ) {

			return $val;

		}

		if ( $filo == 'post' ) {

			return 'post';

		} else if ( $filo == 'image' ) {

			return 'thumbnail';

		}

	}

	return $val;

}
add_filter( 'get_post_metadata', 'themeblvd_filo_thumb_link', 20, 3 );

/**
 * Add filter to _tb_thumb_link_single custom field.
 *
 * @since 2.0.0
 */
function themeblvd_filo_thumb_link_single( $val, $post_id, $key ) {

	if ( $key != '_tb_thumb_link_single' ) {

		return $val;

	}

	if ( ! is_admin() || ( defined('DOING_AJAX') && DOING_AJAX ) ) {

		remove_filter('get_post_metadata', 'themeblvd_filo_thumb_link', 20);

		$thumb_link = get_post_meta($post_id, '_tb_thumb_link', true);

		add_filter('get_post_metadata', 'themeblvd_filo_thumb_link', 20, 3);

		if ( $thumb_link && $thumb_link != 'inactive' ) {

			return $val;

		}

		$filo = themeblvd_get_option('filo');

		if ( ! $filo || $filo == 'none' ) {

			return $val;

		}

		$single = themeblvd_get_option('filo_single');

		if ( $single === 'thumbnail' ) {

			return 'thumbnail';

		} else if ( $single === 'true' ) {

			return 'yes';

		} else {

			return 'no';

		}
	}

	return $val;

}
add_filter( 'get_post_metadata', 'themeblvd_filo_thumb_link_single', 30, 3 );

/**
 * Register text domain for localization.
 *
 * @since 1.0.6
 */
function themeblvd_filo_localize() {

	load_plugin_textdomain('theme-blvd-featured-image-link-override');

}
add_action( 'init', 'themeblvd_filo_localize' );
