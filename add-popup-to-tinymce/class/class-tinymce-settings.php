<?php
if ( ! class_exists( 'APTMCE_TINYMCE_SETTING' ) ) {
	class APTMCE_TINYMCE_SETTING {

		protected static $instance = null;

		public static function get_instance() {
			// If the single instance hasn't been set, set it now.
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function __construct() {
			add_action( 'admin_head', array( $this, 'my_add_mce_button' ) );

		}

		public function my_add_mce_button() {
			// check user permissions

			if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
				return;
			}
			// check if WYSIWYG is enabled
			if ( 'true' == get_user_option( 'rich_editing' ) ) {

				add_filter( 'mce_external_plugins', array( $this, 'my_add_tinymce_plugin' ) );
				add_filter( 'mce_buttons', array( $this, 'my_register_mce_button' ) );
			}
		}

		function my_add_tinymce_plugin( $plugin_array ) {
			$plugin_array[ 'aptmce_btn' ] = plugins_url( 'js/tinymce-setting.js', APTMC_BASE_PATH );

			return $plugin_array;
		}

		// Register new button in the editor
		function my_register_mce_button( $buttons ) {
			array_push( $buttons, 'aptmce_btn' );

			return $buttons;
		}
	}

}

add_action( 'plugins_loaded', array( 'APTMCE_TINYMCE_SETTING', 'get_instance' ) );