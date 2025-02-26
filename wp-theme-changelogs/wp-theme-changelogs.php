<?php
/*
Plugin Name: WP Theme Changelogs
Plugin URI: https://github.com/ThemeZee/wp-theme-changelogs
Description: Adding changelogs for themes hosted on wordpress.org
Author: ThemeZee
Author URI: https://themezee.com/
Version: 1.0
Text Domain: wp-theme-changelogs
Domain Path: /languages/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

WP Theme Changelogs
Copyright(C) 2016, ThemeZee.com - support@themezee.com

This plugin uses the WordPress Plugin Readme Parser
https://github.com/markjaquith/WordPress-Plugin-Readme-Parser

*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main ThemeZee_Theme_Changelogs Class
 *
 * @package WP Theme Changelogs
 */
class ThemeZee_Theme_Changelogs {

	/**
	 * Call all Functions to setup the Plugin
	 *
	 * @uses ThemeZee_Theme_Changelogs::constants() Setup the constants needed
	 * @uses ThemeZee_Theme_Changelogs::includes() Include the required files
	 * @uses ThemeZee_Theme_Changelogs::setup_actions() Setup the hooks and actions
	 * @return void
	 */
	static function setup() {

		// Setup Constants.
		self::constants();

		// Setup Translation.
		add_action( 'plugins_loaded', array( __CLASS__, 'translation' ) );

		// Include Files.
		self::includes();

		// Setup Action Hooks.
		self::setup_actions();

	}

	/**
	 * Setup plugin constants
	 *
	 * @return void
	 */
	static function constants() {

		// Define Plugin Name.
		define( 'TZTCL_NAME', 'WP Theme Changelogs' );

		// Define Version Number.
		define( 'TZTCL_VERSION', '1.0' );

		// Plugin Folder Path.
		define( 'TZTCL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

		// Plugin Folder URL.
		define( 'TZTCL_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

		// Plugin Root File.
		define( 'TZTCL_PLUGIN_FILE', __FILE__ );

	}

	/**
	 * Load Translation File
	 *
	 * @return void
	 */
	static function translation() {

		load_plugin_textdomain( 'wp-theme-changelogs', false, dirname( plugin_basename( TZTCL_PLUGIN_FILE ) ) . '/languages/' );

	}

	/**
	 * Include required files
	 *
	 * @return void
	 */
	static function includes() {

		// Include Changelog Box.
		require_once TZTCL_PLUGIN_DIR . '/includes/class-tztcl-changelog-box.php';

	}

	/**
	 * Setup Action Hooks
	 *
	 * @return void
	 */
	static function setup_actions() {

		// Enqueue Changelog JS.
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'show_changelog_link_js' ) );

	}

	/**
	 * Show Changelog Link
	 *
	 * @return void
	 */
	static function show_changelog_link_js( $hook ) {

		// Load only on update page.
		if ( 'update-core.php' !== $hook ) {
			return;
		}

		// Enqueue Changelog Links JS.
		wp_enqueue_script( 'tztcl-changelog-links', TZTCL_PLUGIN_URL . 'assets/js/changelog-links.js', array( 'jquery' ), TZTCL_VERSION );

		// Pass Changelog Links to Javascript.
		wp_localize_script( 'tztcl-changelog-links', 'tztcl_changelog_links', self::get_changelog_links() );

	}

	/**
	 * Get Changelog Links
	 *
	 * @return array Changelog Links
	 */
	static function get_changelog_links() {

		$changelog_links = array();

		// Get Theme Updates.
		$themes = get_theme_updates();

		// Return early if no updates available.
		if ( empty( $themes ) ) {
			return;
		}

		// Loop through available updates.
		foreach ( $themes as $stylesheet => $theme ) {

			// Set Variables.
			$theme_name = esc_html( $theme->get( 'Name' ) );
			$theme_slug = esc_attr( $stylesheet );
			$theme_version = $theme->update['new_version'];

			// Changelog URL.
			$details_url = self_admin_url( 'index.php?tztcl_action=changelog&theme=' . $theme_slug . '&version=' . $theme_version . '&TB_iframe=true&width=640&height=662' );

			// Create Changelog Link.
			$details = sprintf(
				'<a href="%1$s" class="thickbox open-plugin-details-modal" aria-label="%2$s">%3$s</a>',
				esc_url( $details_url ),
				esc_attr( sprintf( __( 'View %1$s version %2$s details' ), $theme_name, $theme_version ) ),
				sprintf( __( 'View version %s details.' ), $theme_version )
			);

			// Add Link to changelog array.
			$changelog_links[ $theme_slug ] = $details;

		}

		return $changelog_links;

	}
}

// Run Plugin.
ThemeZee_Theme_Changelogs::setup();
