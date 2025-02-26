<?php
/**
 * Helper function used througout the plugin.
 *
 * @package Jbid
 */

namespace Jbid\Post_Filter;

if ( ! class_exists( 'Jbid\Post_Filter\Enqueue_Scripts' ) ) {

	/**
	 * A class for defining common helpers.
	 */
	class Enqueue_Scripts {

		/**
		 * Main class constructor.
		 */
		public function __construct() {
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_fe_scripts' ) );
		}

		/**
		 * Enqueue scripts on frontend pages.
		 */
		public function enqueue_fe_scripts() {
			global $post;

			if (
				is_a( $post, 'WP_Post' ) &&
				has_shortcode( $post->post_content, 'jbid_smart_searchify' )
			) {
				wp_enqueue_script( 'jquery' );
				wp_register_style( 'jbid-ssearchify', JBIPF_DIR_URL . 'assets/css/jbid-ssearchify.css', array(), '1.0.5' );
				wp_enqueue_style( 'jbid-ssearchify' );

				wp_register_script( 'jquery-multi-select', JBIPF_DIR_URL . 'assets/js/jquery.multi-select.js', array( 'jquery' ), '1.0.0', true );

				wp_register_script( 'jbid-ssearchify', JBIPF_DIR_URL . 'assets/js/jbid-ssearchify.js', array( 'jquery', 'jquery-multi-select' ), '1.0.1', true );
				wp_localize_script(
					'jbid-ssearchify',
					'jbid_fe_object',
					array(
						'ajaxurl'  => admin_url( 'admin-ajax.php' ),
						'security' => wp_create_nonce( '_ss_nounce' ),
					),
				);
				wp_enqueue_script( 'jbid-ssearchify' );
				wp_enqueue_script( 'jquery-multi-select' );
			}
		}

		/**
		 * Enqueue admin scripts on admin side page.
		 */
		public function enqueue_admin_scripts() {

			global $current_screen;

			if ( 'jbid_smart_searchify' === $current_screen->id ) {

				// wp_register_style( 'jquery-ui', JBIPF_DIR_URL . 'assets/css/vendors/jquery-ui.css', array(), '1.13.2' );

				wp_register_style( 'jbid-ssearchify-admin', JBIPF_DIR_URL . 'assets/css/jbid-ssearchify-admin.css', array(), '1.0.2' );
				wp_enqueue_style( 'jbid-ssearchify-admin' );

				// wp_register_script( 'jquery-ui', JBIPF_DIR_URL . 'assets/js/vendors/jquery-ui.js', array( 'jquery' ), '1.13.2', true );
				wp_register_script( 'jbid-ssearchify-admin', JBIPF_DIR_URL . 'assets/js/jbid-ssearchify-admin.js', array( 'jquery' ), '1.0.3', true );

				wp_localize_script(
					'jbid-ssearchify-admin',
					'jbid_ajax_object',
					array(
						'ajaxurl'  => admin_url( 'admin-ajax.php' ),
						'security' => wp_create_nonce( '_post_taxonomy' ),
					),
				);

				wp_enqueue_script( 'jquery-ui-accordion' );
				wp_enqueue_script( 'jbid-ssearchify-admin' );
			}

		}
	}
}
