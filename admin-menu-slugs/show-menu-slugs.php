<?php
	/**
	 * Plugin Name: Admin Menu Slugs
	 * Description: Adds the menu and submenu slugs in admin panel.
	 * Version:     2.4
	 * Author:      PlainSurf Solutions
	 * Author URI:  https://plainsurf.com/
	 * License: GPL2
	 */

	/**
	 * @package     Admin Menu Slugs
	 * @copyright   Copyright (c) 2021, PlainSurf Solutions.
	 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
	 * @since       1.0.0
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	function ams_add_slugs() {
		global $menu, $submenu;

		$slug_template = '<br><span style="color: yellow; background: #000; display: inline-block; padding: 1px 5px; font-size: 10px;">[%s]</span>';

		foreach ( $menu as $index => $meta ) {
			$menu[$index][0] = $meta[0] . sprintf($slug_template, $meta[2]);
		}

		foreach ( $submenu as $menu_slug => $submenu_items ) {
			foreach ($submenu_items as $index => $meta) {
				$submenu[$menu_slug][$index][0] = $meta[0] . sprintf($slug_template, $meta[2]);
			}
		}
	}

	function ams_menu_slugger_init() {
		add_action( 'admin_menu', 'ams_add_slugs', 99999999 );
	}

	add_action( 'plugins_loaded', 'ams_menu_slugger_init' );
