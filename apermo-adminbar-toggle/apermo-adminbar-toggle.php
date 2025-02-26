<?php
/**
 * Apermo AdminBar Toggle
 *
 * @package apermo-adminbar-toggle
 *
 * @wordpress-plugin
 * Plugin Name: Apermo AdminBar Toggle
 * Plugin URI: https://wordpress.org/plugins/apermo-adminbar-toggle/
 * Version: 1.1.0
 * Description: A plugin with a single function, a keyboard shortcut for the frontend to hide the AdminBar, or show it again.
 * Author: Christoph Daum
 * Author URI: https://christoph-daum.de/
 * Text Domain: apermo-adminbar-toggle
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Apermo AdminBar Toggle
 * Copyright (C) 2016-2017, Christoph Daum - wordpress@apermo.de
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
class ApermoAdminBarToggle {
	/**
	 * ApermoAdminBarToggle constructor.
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'js_keycodes' ) );
	}

	public function js_keycodes() {
		wp_enqueue_script( 'apermo-adminbar-toggle-js-keycodes', plugins_url( 'js/keycodes.js', __FILE__ ), array( 'jquery' ) );
	}
}

// Run boy, run!
add_action( 'plugins_loaded', function () {
	new ApermoAdminBarToggle();
} );
