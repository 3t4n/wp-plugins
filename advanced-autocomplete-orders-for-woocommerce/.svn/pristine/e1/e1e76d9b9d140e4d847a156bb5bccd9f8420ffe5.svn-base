<?php
/**
 * Admin Class
 *
 * @category Admin
 * @package  Optemiz\AWO
 * @author   Nazrul Islam Nayan <nazrulislamnayan7@gmail.com>
 * @license  GPL3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * 
 * @since    1.0.0
 */
declare( strict_types=1 );

namespace Optemiz\AWO;

defined( 'ABSPATH' ) || exit;

use Optemiz\AWO;

if ( ! class_exists( 'Admin' ) ) {
	/**
	 * Admin class
	 *
	 * @class Admin The class that manages all about Admin
	 *
	 * @category Admin
	 * @package  Optemiz\AWO
	 * @author   Nazrul Islam Nayan <nazrulislamnayan7@gmail.com>
	 * @license  GPL3 https://www.gnu.org/licenses/gpl-3.0.en.html
	 * 
	 * @property null|object $_instance Instance of the class
	 */
	class Admin {

		/**
		 * Class constructor
		 *
		 * Sets up all the appropriate hooks and functions
		 * within our plugin.
		 *
		 * @return void
		 */
		public function __construct() {
			$this->hooks();
			
			do_action( 'awo_admin_loaded', $this );
		}

		/**
		 * Instance.
		 * 
		 * The instance will be created if it does not exist yet.
		 *
		 * @return self The main instance.
		 * @since 1.0.0
		 */
		public static function instance(): self {
			static $instance = null;
			if ( is_null( $instance ) ) {
				$instance = new self();
			}

			return $instance;
		}

		/**
		 * Hooks
		 *
		 * @return void
		 */
		public function hooks(): void {
			add_action( 'init', array( $this, 'shutdown' ));
        	add_filter( 'plugin_action_links_' . HAWO_BASENAME,  array( $this, 'awo_plugin_action_links' ) );
		}

		/**
		 * After all files loaded
		 */
		public function shutdown() {
			$options = get_option( 'awo_general_settings' );
			$options = ! empty( $options ) ? $options : [];
			$awo_counter = isset( $options['awo_hide_faq_number_for_product'] ) ? $options['awo_hide_faq_number_for_product'] : "1";

			//remove filter to hide faq count column from product list table
			if( isset($awo_counter) & "2" === $awo_counter ) {
				remove_filter( 'manage_product_posts_columns', 'awo_set_custom_faq_count_column' );
			}

		}

		/**
		 * Change the admin footer text on woocommerce-faq admin pages.
		 *
		 * @since  1.0.0
		 * @param  string $footer_text text to be rendered in the footer.
		 * @return string
		 */
		public function admin_footer_text( $footer_text ) {
			if ( ! current_user_can( 'manage_woocommerce' ) || ! function_exists( 'wc_get_screen_ids' ) ) {
				return $footer_text;
			}

			$footer_text = esc_html__( 'Thank you for using Happy Autocomplete WooCommerce Orders.', 'advanced-autocomplete-woocommerce-orders' );

			return $footer_text;
		}


		/**
		 * Filter plugin action links
		 *
		 * @since  1.3.16
		 * @param  array  $links List of existing plugin action links.
		 * @return array         List of modified plugin action links
		 */
		public function awo_plugin_action_links($links) {
			$links = array_merge( array(
				'<a href="' . esc_url( 'https://optemiz.com/docs/faq-for-woocommerce/' ) . '">' . esc_html__( 'Documentation', 'advanced-autocomplete-woocommerce-orders' ) . '</a>'
			), $links );

			return $links;
		}

		public function admin_footer_version() {

			$footer_version = sprintf( '<span class="ffw-admin-footer-version">Version: %s</span>', esc_html__( HAWO_VERSION , 'advanced-autocomplete-woocommerce-orders') );

			echo esc_html($footer_version);

			return;
		}
	}
}
