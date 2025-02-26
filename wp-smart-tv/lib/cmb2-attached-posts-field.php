<?php

if ( ! class_exists( 'WDS_CMB2_Attached_Posts_Field_126', false ) ) {

	/**
	 * Versioned loader class-name
	 *
	 * This ensures each version is loaded/checked.
	 *
	 * @category WordPressLibrary
	 * @package  WDS_CMB2_Attached_Posts_Field
	 * @author   WebDevStudios <contact@webdevstudios.com>
	 * @license  GPL-2.0+
	 * @version  1.2.6
	 * @link     https://github.com/WebDevStudios/cmb2-attached-posts
	 * @since    1.2.3
	 */
	class WDS_CMB2_Attached_Posts_Field_126 {

		/**
		 * WDS_CMB2_Attached_Posts_Field version number
		 * @var   string
		 * @since 1.2.3
		 */
		const VERSION = '1.2.6';

		/**
		 * Current version hook priority.
		 * Will decrement with each release
		 *
		 * @var   int
		 * @since 1.2.3
		 */
		const PRIORITY = 9996;

		/**
		 * Starts the version checking process.
		 * Creates CMB2_ATTACHED_POSTS_FIELD_LOADED definition for early detection by
		 * other scripts.
		 *
		 * Hooks WDS_CMB2_Attached_Posts_Field inclusion to the cmb2_attached_posts_field_load hook
		 * on a high priority which decrements (increasing the priority) with
		 * each version release.
		 *
		 * @since 1.2.3
		 */
		public function __construct() {
			if ( ! defined( 'CMB2_ATTACHED_POSTS_FIELD_LOADED' ) ) {
				/**
				 * A constant you can use to check if WDS_CMB2_Attached_Posts_Field is loaded
				 * for your plugins/themes with WDS_CMB2_Attached_Posts_Field dependency.
				 *
				 * Can also be used to determine the priority of the hook
				 * in use for the currently loaded version.
				 */
				define( 'CMB2_ATTACHED_POSTS_FIELD_LOADED', self::PRIORITY );
			}

			// Use the hook system to ensure only the newest version is loaded.
			add_action( 'cmb2_attached_posts_field_load', array( $this, 'include_lib' ), self::PRIORITY );

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
			do_action( 'cmb2_attached_posts_field_load' );
		}

		/**
		 * A final check if WDS_CMB2_Attached_Posts_Field exists before kicking off
		 * our WDS_CMB2_Attached_Posts_Field loading.
		 *
		 * CMB2_ATTACHED_POSTS_FIELD_VERSION and CMB2_ATTACHED_POSTS_FIELD_DIR constants are
		 * set at this point.
		 *
		 * @since  1.2.3
		 */
		public function include_lib() {
			if ( class_exists( 'WDS_CMB2_Attached_Posts_Field', false ) ) {
				return;
			}

			if ( ! defined( 'CMB2_ATTACHED_POSTS_FIELD_VERSION' ) ) {
				/**
				 * Defines the currently loaded version of WDS_CMB2_Attached_Posts_Field.
				 */
				define( 'CMB2_ATTACHED_POSTS_FIELD_VERSION', self::VERSION );
			}

			if ( ! defined( 'CMB2_ATTACHED_POSTS_FIELD_DIR' ) ) {
				/**
				 * Defines the directory of the currently loaded version of WDS_CMB2_Attached_Posts_Field.
				 */
				define( 'CMB2_ATTACHED_POSTS_FIELD_DIR', dirname( __FILE__ ) . '/' );
			}

			// Include and initiate WDS_CMB2_Attached_Posts_Field.
			require_once CMB2_ATTACHED_POSTS_FIELD_DIR . 'WDS_CMB2_Attached_Posts.php';
		}

	}

	// Kick it off.
	new WDS_CMB2_Attached_Posts_Field_126;
}
