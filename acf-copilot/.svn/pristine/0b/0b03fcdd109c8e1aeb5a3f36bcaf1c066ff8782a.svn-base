<?php
/**
 * [Short description]
 *
 * @package    DEVRY\ACFC
 * @copyright  Copyright (c) 2025, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.0
 */

namespace DEVRY\ACFC;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

if ( ! class_exists( 'ACF_Copilot' ) ) {

	class ACF_Copilot {
		// Supported post types.
		public $types_supported;

		// User access.
		public $user_access;

		// Disable field group addons.
		public $disable_field_group_addons;

		// Disable LivePreview mode.
		public $disable_livepreview;

		// Global LivePreview mode.
		public $livepreview_mode;

		// Compact mode.
		public $compact_mode;

		/**
		 * Consturtor.
		 */
		public function __construct() {
			// Use some defaults for the Options, for initial plugin usage.
			$this->types_supported            = array( 'page', 'post' );
			$this->user_access                = array( 'administrator' );
			$this->disable_field_group_addons = ''; // No
			$this->disable_livepreview        = ''; // No
			$this->livepreview_mode           = ''; // On
			$this->compact_mode               = ''; // No

			// Retrieve from options, if available; otherwise, use the default values.
			$this->types_supported            = get_option( 'acfc_types_supported', $this->types_supported );
			$this->user_access                = get_option( 'acfc_user_access', $this->user_access );
			$this->disable_field_group_addons = get_option( 'acfc_disable_field_group_addons', $this->disable_field_group_addons );
			$this->disable_livepreview        = get_option( 'acfc_disable_livepreview', $this->disable_livepreview );
			$this->livepreview_mode           = get_option( 'acfc_livepreview_mode', $this->livepreview_mode );
			$this->compact_mode               = get_option( 'acfc_compact_mode', $this->compact_mode );
		}

		/**
		 * Initializor.
		 */
		public function init() {
			add_action( 'wp_loaded', array( $this, 'on_loaded' ) );
		}

		/**
		 * Plugin loaded.
		 */
		public function on_loaded() {
		}
	}

	// Initialize.
	$acf_copilot = new ACF_Copilot();
	$acf_copilot->init();
}
