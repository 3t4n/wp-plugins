<?php
/*
Plugin Name: 360 Image Panorama for Elementor
Description: 360 Image Panorama Addon for Elementor Page Builder plugin.
Plugin URI:  https://themeofwp.com/plugins/elementor/image-panorama
Version:     1.0.3
Author:      themeofwpcom
Author URI:  https://themeofwp.com/
Text Domain: elementor-image-panorama
License:     Copyright ThemeofWP.com
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Support    : https://themeofwp.com/support/
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Load Image Panorama
 *
 * Load the plugin after Elementor (and other plugins) are loaded.
 *
 * @since 1.0.0
 */
	function TWP_image_panorama_load() {
		// Load localization file
		load_plugin_textdomain( 'image-panorama' );

		// Notice if the Elementor is not active
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', 'TWP_image_panorama_fail_load' );
			return;
		}

		// Check required version
		$elementor_version_required = '1.8.0';
		if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
			add_action( 'admin_notices', 'TWP_image_panorama_fail_load_out_of_date' );
			return;
		}

		// Require the main plugin file
		require( __DIR__ . '/plugin.php' );
	}
	add_action( 'plugins_loaded', 'TWP_image_panorama_load' );


/**
* Add plugin pro link to plugins page
 */
	add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'TWP_image_panorama_pro_link' );

	function TWP_image_panorama_pro_link( $links ) {
	   $links[] = '<a href="https://themeofwp.com/" target="_blank">More Plugins</a>';
	   $links[] = '<a href="https://themeofwp.com/help-videos/" target="_blank">Video Tutorials</a>';
	   return $links;
	}


	function TWP_image_panorama_fail_load_out_of_date() {
		if ( ! current_user_can( 'update_plugins' ) ) {
			return;
		}

		$file_path = 'elementor/elementor.php';

		$upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
		$message = '<p>' . esc_html__( 'Elementor Image Panorama is not working because you are using an old version of Elementor.', 'image-panorama' ) . '</p>';
		$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $upgrade_link, esc_html__( 'Update Elementor Now', 'image-panorama' ) ) . '</p>';

		echo '<div class="error">' . $message . '</div>';
	}


	function TWP_image_panorama_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'image-panorama',
			[
				'title' => esc_html__( 'Image Panorama', 'image-panorama' ),
				'icon' => 'fa fa-plug',
			]
		);
	}
	add_action( 'elementor/elements/categories_registered', 'TWP_image_panorama_widget_categories' );
