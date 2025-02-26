<?php
/**
 * Plugin Name: Search & Replace for Elementor
 * Plugin URI: https://searchreplaceplugin.com/
 * Description: Quickly search and replace any text, links, or images in Elementor using Search & Replace for Elementor.
 * Version: 1.4.8
 * Requires Plugins: elementor
 * Elementor tested up to: 3.25
 * Elementor Pro tested up to: 3.25
 * Author: Krasen Slavov
 * Author URI: https://developry.com/
 * License: GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: search-replace-for-elementor
 * Domain Path: /lang
 *
 * Copyright (c) 2018 - 2024 Developry Ltd. (email: contact@developry.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301 USA
*/

namespace DEVRY\ELEMSNR;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

define( __NAMESPACE__ . '\ELEMSNR_ENV', 'prod' ); // Use prod, dev options.

define( __NAMESPACE__ . '\ELEMSNR_MIN_PHP_VERSION', '7.2' );
define( __NAMESPACE__ . '\ELEMSNR_MIN_WP_VERSION', '5.0' );
define( __NAMESPACE__ . '\ELEMSNR_MIN_ELEMENTOR_VERSION', '2.0' );

define( __NAMESPACE__ . '\ELEMSNR_PLUGIN_UUID', 'elemsnr' );
define( __NAMESPACE__ . '\ELEMSNR_PLUGIN_TEXTDOMAIN', 'search-replace-for-elementor' );
define( __NAMESPACE__ . '\ELEMSNR_PLUGIN_NAME', esc_html__( 'Search & Replace for Elementor', 'search-replace-for-elementor' ) );
define( __NAMESPACE__ . '\ELEMSNR_PLUGIN_VERSION', '1.4.8' );
define( __NAMESPACE__ . '\ELEMSNR_PLUGIN_DOMAIN', 'searchreplaceplugin.com' );
define( __NAMESPACE__ . '\ELEMSNR_PLUGIN_DOCS', 'https://searchreplaceplugin.com/help' );

define( __NAMESPACE__ . '\ELEMSNR_PLUGIN_WPORG_SUPPORT', 'https://wordpress.org/support/plugin/search-replace-for-elementor/#new-topic' );
define( __NAMESPACE__ . '\ELEMSNR_PLUGIN_WPORG_RATE', 'https://wordpress.org/support/plugin/search-replace-for-elementor/reviews/#new-post' );

define( __NAMESPACE__ . '\ELEMSNR_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( __NAMESPACE__ . '\ELEMSNR_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
define( __NAMESPACE__ . '\ELEMSNR_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );

define(
	__NAMESPACE__ . '\ELEMSNR_PLUGIN_ALLOWED_HTML_ARR',
	wp_json_encode(
		array(
			'br'     => array(),
			'strong' => array(),
			'em'     => array(),
			'a'      => array(
				'href'   => array(),
				'target' => array(),
				'name'   => array(),
			),
			'option' => array(
				'value'    => array(),
				'selected' => array(),
			),
		)
	)
);

// Required data field keys.
define(
	__NAMESPACE__ . '\ELEMSNR_REQUIRED_FIELD_KEYS_ARR',
	wp_json_encode(
		array(
			'text',
			// This will allow search & replace for <p><a> tags in the Text Widget in text-only mode.
			'editor', // (use with caution!!!)
		)
	)
);

// URL data field keys.
define(
	__NAMESPACE__ . '\ELEMSNR_URL_FIELD_KEYS_ARR',
	wp_json_encode(
		array(
			'url',
			'post_url',
			'video_url',
			'comment_url',
			'vimeo_url',
			'youtube_url',
			'dailymotion_url',
		)
	)
);

// Default data field keys.
define(
	__NAMESPACE__ . '\ELEMSNR_DEFAULT_FIELD_KEYS_ARR',
	wp_json_encode(
		array(
			'link_text',
			'item_text',
			'button_text',
			'inner_text',
			'before_text',
			'highlighted_text',
			'rotating_text',

			'name',
			'author_name',
			'form_name',
			'email_form_name',
			'email_form_name_2',
			'testimonial_name',

			'testimonial_job',

			'title',
			'title_text',
			'alert_title',
			'tab_title',
			'inner_tab_title_1',
			'inner_tab_title_2',
			'ribbon_title',
			'gallery_title',
			'playlist_title',
			'title_text_a',
			'title_text_b',

			'content',
			'tab_content',
			'blockquote_content',
			'testimonial_content',
			'email_content',
			'email_content_2',

			'description',
			'description_text',
			'description_text_a',
			'description_text_b',
			'alert_description',
			'item_description',

			'placeholder',

			'label',
			'field_label',
			'user_label',
			'password_label',
			'step_next_label',
			'step_previous_label',
			'tweet_button_label',
			'inner_tab_label_show_more',
			'inner_tab_label_show_less',
			'show_all_galleries_label',
			'label_days',
			'label_hours',
			'label_minutes',
			'label_seconds',
		)
	)
);

// URL for dev/prod for image folder.
if ( 'dev' === ELEMSNR_ENV ) {
	define( __NAMESPACE__ . '\ELEMSNR_PLUGIN_IMG_URL', ELEMSNR_PLUGIN_DIR_URL . 'assets/dev/images/' );
} else {
	define( __NAMESPACE__ . '\ELEMSNR_PLUGIN_IMG_URL', ELEMSNR_PLUGIN_DIR_URL . 'assets/dist/img/' );
}

require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/admin.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/library/class-elemsnr-admin.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/library/class-elemsnr-data-formatter.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/library/class-elementor-search-replace.php';
