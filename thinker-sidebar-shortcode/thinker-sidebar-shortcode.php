<?php
/**
 * Thinker Sidebar Shortcode
 *
 * @link              http://www.thinkerwebdesign.com/thinker-sidebar-shortcode-plugin/
 * @since             1.0.0
 * @package           Thinker_Sidebar_Shortcode
 * @author            ThinkerWebDesign
 * @license           GPLv3
 *
 * @wordpress-plugin
 * Plugin Name:       Sidebar Shortcode
 * Plugin URI:        http://www.thinkerwebdesign.com/thinker-sidebar-shortcode-plugin/
 * Description:       Add sidebars to WP posts and pages via shortcodes.
 * Version:           1.0.0
 * Author:            ThinkerWebDesign
 * Author URI:        http://www.thinkerwebdesign.com
 * Text Domain:       thinker-sidebar-shortcode
 * License:           GPLv3
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */

/*
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details:
http://www.gnu.org/licenses/gpl-3.0.txt
*/

// If this file is called directly then abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Contains the main functionality of the plugin.
 *
 * Contains the shortcode function and the action hook.
 *
 * @since   1.0.0
 */
class Thinker_Sidebar_Shortcode {

	/**
	 * Registers the shortcode using the init action hook.
	 *
	 * Adds shortcode after WordPress has been initialized.
	 *
	 * @since 1.0.0
	 */
	public function run() {
		add_action( 'init', array( $this, 'register_shortcode' ) );
	}

	/**
	 * Registers the shortcode.
	 *
	 * Adds a hook for the [sidebar] shortcode tag.
	 *
	 * @since 1.0.0
	 */
	public function register_shortcode() {
		add_shortcode( 'sidebar', array( $this, 'shortcode' ) );
	}

	/**
	 * Handles all functionality of the sidebar shortcode.
	 *
	 * If shortcode ID exactly matches a sidebar then uses ID of matched sidebar.
	 * Otherwise if shortcode Name matches a sidebar then uses ID of matched sidebar.
	 * If the shortcode matches a sidebar then verifies that the sidebar has widgets.
	 * Sanitizes the HTML classes and removes unneeded spaces before returning HTML.
	 * If neither ID nor Name exactly matches an active sidebar then returns null.
	 *
	 * @since 1.0.0
	 *
	 * @global array $wp_registered_sidebars
	 *
	 * @param  array $atts    Shortcode attributes.
	 * @param  array $content Shortcode content. Default empty.
	 * @return string         Displays sidebar.
	 */
	public function shortcode( $atts, $content = '' ) {
		global $wp_registered_sidebars;

		// Returns if no sidebars are registered or shortcode attributes are empty.
		if ( ! is_dynamic_sidebar() || empty( $wp_registered_sidebars ) || empty( $atts ) ) {
			return;
		}

		// Sets default shortcode attributes if missing from shortcode.
		$atts = shortcode_atts(
			array(
				'name'  => '',
				'id'    => '',
				'class' => '',
			),
			$atts,
			'sidebar'
		);

		// Sets variables from shortcode attributes.
		$name  = $atts['name'];
		$id    = $atts['id'];
		$class = $atts['class'];

		// Gets Sidebar ID. Gives precedent to ID over Name.
		$sidebar_id = '';
		if ( $id && array_key_exists( $id, $wp_registered_sidebars ) ) {
			$sidebar_id = $id;
		} elseif ( $name ) {
			foreach ( $wp_registered_sidebars as $sidebar ) {

				// If shortcode Name matches a sidebar then sets sidebar ID.
				if ( $sidebar['name'] === $name ) {
					$sidebar_id = $sidebar['id'];
				}
			}
		}

		// Verifies that the shortcode matched a sidebar and the sidebar is active.
		if ( $sidebar_id && is_active_sidebar( $sidebar_id ) ) {

			// Sanitizes class by permitting only (letter,number,space,-,_) characters.
			$class_out = 'sidebar-shortcode';
			if ( ! preg_match( '/[^-_a-zA-Z0-9\pL]/u', $sidebar_id ) ) {
				$class_out = $class_out . ' ' . $sidebar_id;
			}
			if ( $class && ! preg_match( '/[^-_ a-zA-Z0-9\pL]/u', $class ) ) {
				$class_out = $class_out . ' ' . $class;
			}

			// Removes leading, trailing, and extra spaces from HTML class attribute.
			$class_out = trim( $class_out );
			$class_out = preg_replace( '/\s+/', ' ', $class_out );

			// Displays the Sidebar.
			ob_start();
			dynamic_sidebar( $sidebar_id );
			$sidebar_out = ob_get_clean();
			$html        = '
				<div class="' . $class_out . '" role="complementary">
					<div class="sidebar-shortcode-content">
						' . $sidebar_out . '
					</div>
				</div>
			';
			return $html;
		}
	}
}

/**
 * Begins execution of the plugin.
 *
 * Runs the entire plugin by handling the shortcode functionality and
 * registering the shortcode via the init action hook.
 *
 * @since 1.0.0
 */
function run_thinker_sidebar_shortcode() {
	$plugin = new Thinker_Sidebar_Shortcode();
	$plugin->run();
}
run_thinker_sidebar_shortcode();
