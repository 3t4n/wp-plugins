<?php
/**
#_________________________________________________ PLUGIN
Plugin Name: Timeline Express - No Icons Add-On
Plugin URI: https://www.wp-timelineexpress.com
Description: Remove icons from a single timeline or all timelines globally.
Version: 1.2.0
Author: Code Parrots
Text Domain: timeline-express-no-icons-add-on
Author URI: http://www.codeparrots.com
License: GPL2

#_________________________________________________ LICENSE
Copyright 2012-16 Code Parrots (email : codeparrots@gmail.com)

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

#_________________________________________________ CONSTANTS
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {

	die;

}

// Include our constants
include_once plugin_dir_path( __FILE__ ) . '/constants.php';

// Hook in and load our class
function initialize_timeline_express_no_icons_addon() {

	if ( ! class_exists( 'TimelineExpressBase' ) ) {

		include_once( TIMELINE_EXPRESS_NO_ICONS_PATH . 'lib/partials/base-plugin-check.php' );

		return;

	}

	class Timeline_Express_No_Icons extends TimelineExpressBase {

		private $options;

		public function __construct() {

			/**
			 * Introduce Timeline Express Pro shortcode generator section
			 *
			 * @since 1.2.0
			 */
			include_once( TIMELINE_EXPRESS_NO_ICONS_PATH . 'lib/class-tinymce.php' );

			add_filter( 'shortcode_atts_timeline-express', array( $this, 'add_no_icon_shortcode_parameter' ), 10, 4 );

			add_action( 'admin_init', array( $this, 'register_settings' ) );
			add_action( 'admin_head', array( $this, 'hide_icon_selection' ) );

			add_action( 'timeline_express_add_on_options_page_header', array( $this, 'generate_options_page_header' ) );
			add_action( 'timeline_express_add_on_options_page',        array( $this, 'generate_options_section' ) );

			$this->options = get_option( TIMELINE_EXPRESS_NO_ICONS_OPTION, array(
				'global_no_icons'          => false,
				'disable_hover_animations' => false,
			) );

		}

		/**
		 * Register our Timeline Express No Icons Options
		 *
		 * @since 1.0.0
		 */
		public function register_settings() {

			register_setting(
				'timeline-express-no-icons-settings',
				'timeline_express_no_icons_storage',
				array( $this, 'save_timeline_express_no_icons_options' )
			);

		}

		/**
		 * Hide the icon selection field on the add/edit announcement page.
		 *
		 * @since 1.0.0
		 */
		public function hide_icon_selection() {

			$screen = get_current_screen();

			if ( ! isset( $screen->base ) || 'post' !== $screen->base ) {

				return;

			}

			if ( ! isset( $screen->post_type ) || 'te_announcements' !== $screen->post_type ) {

				return;

			}

			if ( $this->options['global_no_icons'] ) {

				?>

				<style type="text/css">
				body.wp-admin .cmb-type-te-bootstrap-dropdown {
					display: none;
				}
				</style>

				<?php

			}

		}

		/**
		 * Add a new shortcode parameter to our [timeline-express] shortcode
		 * New: no-icons
		 * Possible: 1/0
		 *
		 * @param mixed  $output
		 * @param array  $pairs
		 * @param array  $atts
		 * @param string $shortcode
		 *
		 * @since 1.0.0
		 */
		public function add_no_icon_shortcode_parameter( $output, $pairs, $atts, $shortcode ) {

			if ( ( ! isset( $atts['no-icons'] ) || 1 !== (int) $atts['no-icons'] ) && ! $this->options['global_no_icons'] ) {

				return $output;

			}

			add_filter( 'timeline-express-announcement-container-class', array( $this, 'append_no_icon_container_class' ), 12, 2 );

			if ( ! function_exists( 'is_plugin_active' ) ) {

				include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

			}

			/**
			 * If Timeline Express v2 'styles' module is active
			 * let it handle the styles for the 'no-icon' class.
			 *
			 * @since 1.2.0
			 */
			if ( class_exists( 'Timeline_Express_Styles' ) ) {

				// Hide the icon in rotated-square/small-dot icon containers
				?>

				<style type="text/css">
				.cd-timeline-block.hide-icon .fa {
					display: none !important;
				}
				</style>

				<?php

				return $output;

			}

			$suffix = WP_DEBUG ? '' : '.min';

			wp_enqueue_style( 'timeline-express-no-icons', TIMELINE_EXPRESS_NO_ICONS_URL . "/lib/css/timeline-express-no-icons-add-on{$suffix}.css", array( 'timeline-express-base' ) );

			return $output;

		}

		/**
		 * Append the no-icons container class
		 *
		 * @return array $classes
		 *
		 * @since 1.0.0
		 */
		public function append_no_icon_container_class( $classes, $post_id ) {

			$class_array = array();

			if ( ! $this->options['disable_hover_animations'] ) {

				$class_array[] = 'no-animation';

			}

			$icon_container = get_post_meta( $post_id, '_timeline_styles_icon_style', true );

			if ( $icon_container && ( 'small-dot' === $icon_container || 'rotated-square' === $icon_container ) ) {

				return $classes . ' hide-icon';

			}

			if ( false === stripos( $classes, 'no-icon' ) ) {

				$class_array[] = 'no-icon';

			}

			if ( empty( $class_array ) ) {

				return $classes;

			}

			return $classes . ' ' . implode( ' ', $class_array );

		}

		/**
		 * Generate the options page header
		 *
		 * @param  string $tab The current tab to render.
		 *
		 * @return mixed
		 *
		 * @since 1.0.0
		 */
		public function generate_options_page_header( $tab ) {

			if ( 'no-icons' !== $tab ) {

				return;

			}

			printf(
				'<h1>%1$s</h1><p class="description">%2$s</p>',
				esc_html__( 'Timeline Express - No Icons Add-On', 'timeline-express-no-icons-add-on' ),
				esc_html__( 'Adjust the settings for this add-on below.', 'timeline-express-no-icons-add-on' )
			);

		}

		/**
		 * Generate our options section for the No Icons Add-on
		 *
		 * @return mixed
		 *
		 * @since 1.0.0
		 */
		public function generate_options_section( $tab ) {

			if ( 'no-icons' !== $tab ) {

				return;

			}

			ob_start();

			include_once( TIMELINE_EXPRESS_NO_ICONS_PATH . 'lib/partials/options-section.php' );

			return ob_get_contents();

		}

		/**
		 * Timeline Express No Icons Options Save
		 *
		 * @return array
		 *
		 * @since 1.0.0
		 */
		public function save_timeline_express_no_icons_options() {

			if ( ! isset( $_POST['timeline_express_no_icons_settings_nonce'] ) || ! wp_verify_nonce( $_POST['timeline_express_no_icons_settings_nonce'], 'timeline_express_no_icons_save_settings' ) ) {

				wp_die( esc_attr__( 'Sorry, the nonce security check did not pass. Please go back to the settings page, refresh the page and try to save your settings again.', 'timeline-express-no-icons-add-on' ), __( 'Failed Nonce Security Check', 'timeline-express-no-icons-add-on' ), array(
					'response' => 500,
					'back_link' => true,
					'text_direction' => ( is_rtl() ) ? 'rtl' : 'ltr',
				) );

			}

			$posted_option = isset( $_POST['timeline_express_storage'] ) ? $_POST['timeline_express_storage'] : false;

			$options['global_no_icons']          = isset( $posted_option['global_no_icons'] ) ? true : false;
			$options['disable_hover_animations'] = isset( $posted_option['disable_hover_animations'] ) ? true : false;

			return $options;

		}

	}

	new Timeline_Express_No_Icons;

}
add_action( 'plugins_loaded', 'initialize_timeline_express_no_icons_addon' );


/**
 * Timeline Express Add-on activate
 *
 * @since 1.0.0
 */
function timeline_express_no_icons_addon_activate() {

	$add_ons = get_option( 'timeline_express_installed_add_ons', array() );

	if ( ! isset( $add_ons['no-icons'] ) ) {

		$add_ons['no-icons'] = __( 'No Icons Add-On' , 'timeline-express-no-icons-add-on' );

		update_option( 'timeline_express_installed_add_ons', $add_ons );

	}

	if ( function_exists( 'delete_timeline_express_transients' ) ) {

		delete_timeline_express_transients();

	}

}
register_activation_hook( __FILE__, 'timeline_express_no_icons_addon_activate' );

/**
 * Timeline Express Add-on deactivate
 *
 * @since 1.0.0
 */
function timeline_express_no_icons_addon_activate_deactivate() {

	$add_ons = get_option( 'timeline_express_installed_add_ons', array() );

	if ( isset( $add_ons['no-icons'] ) ) {

		unset( $add_ons['no-icons'] );

		update_option( 'timeline_express_installed_add_ons', $add_ons );

	}

}
register_deactivation_hook( __FILE__, 'timeline_express_no_icons_addon_activate_deactivate' );
