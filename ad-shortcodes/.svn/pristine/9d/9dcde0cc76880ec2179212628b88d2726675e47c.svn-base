<?php
/**
 * @package Zumi Ad Shortcodes
 * @version 1.0.0
 */

/*
Plugin Name: Zumi Ad Shortcodes
Plugin URI:
Description: You can make shortcodes for any advertisement codes, and place anywhere in your articles.
Author: Zum-i-NET
Version: 1.0.0
Author URI: https://zum-i-net.co.jp

	Copyright 2022 Zum-i-NET (email : h.konishi@zum-i-net.co.jp)
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/display.php';

// register script.
wp_register_script( 'zumi-location-confirm', plugin_dir_url( __FILE__ ) . 'js/location_confirm.js' );
wp_enqueue_script( 'zumi-location-confirm' );

// register style.
wp_register_style( 'ZumiAdCSS', plugin_dir_url( __FILE__ ) . 'style.css' );
wp_register_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.6.1/css/all.css' );

// use style.
wp_enqueue_style( 'ZumiAdCSS' );
wp_enqueue_style( 'font-awesome' );


// Add menus.
add_action(
	'admin_menu',
	function () {

		// Import the language file.
		require_once __DIR__ . '/language.php';

		$lan = new Language( get_locale() );

		// slug.
		$slug = 'zumi-ads';

		// Add menu.
		add_menu_page(
			$lan->app_name,
			$lan->app_name,
			'administrator',
			$slug,
			function () use ( $lan, $slug ) {

			}
		);

		// Add manage ads page.
		add_submenu_page(
			$slug,
			$lan->manage_ads . ' | ' . $lan->app_name . ' by Zumi',
			$lan->manage_ads,
			'administrator',
			$slug,
			function () use ( $lan ) {
				zumi_manage_wrapper( 'ad_id', $lan->manage_ads, 'ads.php', 'ad.php' );
			}
		);

		// Add manage shortcode page.
		add_submenu_page(
			$slug,
			$lan->manage_ad_shortcode . 'Manage Ad Shortcodes | ' . $lan->app_name . ' by Zumi',
			$lan->manage_ad_shortcode,
			'administrator',
			'zumi-ad-shortcodes',
			function () use ( $lan ) {
				zumi_manage_wrapper( 'tag', $lan->manage_ad_shortcode, 'shortcodes.php', 'shortcode.php' );
			}
		);

		// Add manage fixed ads page.
		add_submenu_page(
			$slug,
			$lan->manage_fixed_ads . 'Manage Fixed Ads | ' . $lan->app_name . ' by Zumi',
			$lan->manage_fixed_ads,
			'administrator',
			'zumi-fixed-ads',
			function () use ( $lan ) {
				zumi_manage_wrapper( 'id', $lan->manage_fixed_ads, 'fixed_ads.php', 'fixed_ad.php' );
			}
		);

	}
);

/**
 * Manage page common part
 * @param string $id_name is name of id.
 * @param string $title is html title.
 * @param string $list_page is file name of list page.
 * @param string $setting_page is file name of edit page.
 */
function zumi_manage_wrapper( $id_name, $title, $list_page, $setting_page ) {

	$limit = 30;

	$lan = new Language( get_locale() );

	$id = null;

	// Get id.
	$id = Sanitize::get( $id_name, 'get' );

	if ( false === $id ) {
		echo 'The ID is invalid.';
		$id = null;
	}

	?>
	<h2><?php echo esc_html( $title ); ?></h2>

	<div class='zumi-wrapper'>
	<?php
	// if id is empty, show all.
	if ( is_null( $id ) ) {
		require __DIR__ . '/managements/' . $list_page;
	} else {
		// If id has a value, show edit page.
		require __DIR__ . '/managements/' . $setting_page;
	}
	?>

	</div>
	<?php

}


// Add widget.
require_once __DIR__ . '/widget.php';

add_action(
	'widgets_init',
	function () {
		register_widget( 'ZumiAdWidget' );
	}
);
