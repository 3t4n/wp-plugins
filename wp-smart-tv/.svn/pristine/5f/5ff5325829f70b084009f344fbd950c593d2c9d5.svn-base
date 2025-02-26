<?php

if ( ! class_exists( 'CMB2_Post_Search_field_025', false ) ) {

	/**
	 * Versioned loader class-name
	 *
	 * This ensures each version is loaded/checked.
	 *
	 * @category WordPressLibrary
	 * @package  CMB2_Post_Search_field
	 * @author   WebDevstudios <contact@webdevstudios.com>
	 * @license  GPL-2.0+
	 * @version  0.2.5
	 * @link     https://github.com/WebDevStudios/CMB2-Post-Search-field
	 * @since    0.2.4
	 */
	class CMB2_Post_Search_field_025 {

		/**
		 * CMB2_Post_Search_field version number
		 * @var   string
		 * @since 0.2.4
		 */
		const VERSION = '0.2.5';

		/**
		 * Current version hook priority.
		 * Will decrement with each release
		 *
		 * @var   int
		 * @since 0.2.4
		 */
		const PRIORITY = 9998;

		/**
		 * Starts the version checking process.
		 * Creates CMB2_POST_SEARCH_FIELD_LOADED definition for early detection by
		 * other scripts.
		 *
		 * Hooks CMB2_Post_Search_field inclusion to the cmb2_post_search_field_load hook
		 * on a high priority which decrements (increasing the priority) with
		 * each version release.
		 *
		 * @since 0.2.4
		 */
		public function __construct() {
			if ( ! defined( 'CMB2_POST_SEARCH_FIELD_LOADED' ) ) {
				/**
				 * A constant you can use to check if CMB2_Post_Search_field is loaded
				 * for your plugins/themes with CMB2_Post_Search_field dependency.
				 *
				 * Can also be used to determine the priority of the hook
				 * in use for the currently loaded version.
				 */
				define( 'CMB2_POST_SEARCH_FIELD_LOADED', self::PRIORITY );
			}

			// Use the hook system to ensure only the newest version is loaded.
			add_action( 'cmb2_post_search_field_load', array( $this, 'include_lib' ), self::PRIORITY );

			// Use the hook system to ensure only the newest version is loaded.
			add_action( 'after_setup_theme', array( $this, 'do_hook' ) );
		}

		/**
		 * Fires the cmb2_attached_posts_field_load action hook
		 * (from the after_setup_theme hook).
		 *
		 * @since 1.2.3
		 */
		public function do_hook() {
			// Then fire our hook.
			do_action( 'cmb2_post_search_field_load' );
		}

		/**
		 * A final check if CMB2_Post_Search_field exists before kicking off
		 * our CMB2_Post_Search_field loading.
		 *
		 * CMB2_POST_SEARCH_FIELD_VERSION and CMB2_POST_SEARCH_FIELD_DIR constants are
		 * set at this point.
		 *
		 * @since  0.2.4
		 */
		public function include_lib() {
			if ( class_exists( 'CMB2_Post_Search_field', false ) ) {
				return;
			}

			if ( ! defined( 'CMB2_POST_SEARCH_FIELD_VERSION' ) ) {
				/**
				 * Defines the currently loaded version of CMB2_Post_Search_field.
				 */
				define( 'CMB2_POST_SEARCH_FIELD_VERSION', self::VERSION );
			}

			if ( ! defined( 'CMB2_POST_SEARCH_FIELD_DIR' ) ) {
				/**
				 * Defines the directory of the currently loaded version of CMB2_Post_Search_field.
				 */
				define( 'CMB2_POST_SEARCH_FIELD_DIR', dirname( __FILE__ ) . '/' );
			}

			// Include and initiate CMB2_Post_Search_field.
			require_once CMB2_POST_SEARCH_FIELD_DIR . 'cmb2-post-search-field-init.php';
		}

	}

	// Kick it off.
	new CMB2_Post_Search_field_025;
}
