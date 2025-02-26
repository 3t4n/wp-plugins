<?php
/**
 * Plugin Name: AxialNest for Woocommerce
 * Requires Plugins: woocommerce
 * Description: AxialNest 3D customizer extension for Woocommerce
 * Version: 1.0.0
 * Author: Techutamos
 * Author URI: https://axialnest.com
 * Text Domain: axialnest-for-woocommerce
 * Domain Path: /languages
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package extension
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'AXIALNEST_WOO_MAIN_PLUGIN_FILE' ) ) {
	define( 'AXIALNEST_WOO_MAIN_PLUGIN_FILE', __FILE__ );
}

require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

use AxialnestWoocommerce\Admin\Setup;

// phpcs:disable WordPress.Files.FileName

/**
 * WooCommerce fallback notice.
 *
 * @since 0.1.0
 */
function axialnest_woocommerce_missing_wc_notice() {
	/* translators: %s WC download URL link. */
	echo '<div class="error"><p><strong>' . sprintf( esc_html__( 'Axialnest Woocommerce requires WooCommerce to be installed and active. You can download %s here.', 'axialnest-for-woocommerce' ), '<a href="https://woo.com/" target="_blank">WooCommerce</a>' ) . '</strong></p></div>';
}

register_activation_hook( __FILE__, 'axialnest_woocommerce_activate' );

/**
 * Activation hook.
 *
 * @since 0.1.0
 */
function axialnest_woocommerce_activate() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		add_action( 'admin_notices', 'axialnest_woocommerce_missing_wc_notice' );
		return;
	}
}

if ( ! class_exists( 'axialnest_woocommerce' ) ) :
	/**
	 * The axialnest_woocommerce class.
	 */
	class axialnest_woocommerce {
		/**
		 * This class instance.
		 *
		 * @var \axialnest_woocommerce single instance of this class.
		 */
		private static $instance;

		/**
		 * Constructor.
		 */
		public function __construct() {
			if ( is_admin() ) {
				new Setup();
			}
		}

		/**
		 * Cloning is forbidden.
		 */
		public function __clone() {
			wc_doing_it_wrong( __FUNCTION__, __( 'Cloning is forbidden.', 'axialnest-for-woocommerce' ), $this->version );
		}

		/**
		 * Unserializing instances of this class is forbidden.
		 */
		public function __wakeup() {
			wc_doing_it_wrong( __FUNCTION__, __( 'Unserializing instances of this class is forbidden.', 'axialnest-for-woocommerce' ), $this->version );
		}

		/**
		 * Gets the main instance.
		 *
		 * Ensures only one instance can be loaded.
		 *
		 * @return \axialnest_woocommerce
		 */
		public static function instance() {

			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}
endif;

add_action( 'after_setup_theme', 'axialnest_woo_init', 10 );

function axialnest_woo_init() {
	load_plugin_textdomain( 'axialnest-for-woocommerce', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );

	if ( ! class_exists( 'WooCommerce' ) ) {
		add_action( 'admin_notices', 'axialnest_woocommerce_missing_wc_notice' );
		return;
	}

	axialnest_woocommerce::instance();
	require plugin_dir_path( __FILE__ ) . '/src/extension-settings.php';

	require plugin_dir_path( __FILE__ ) . '/src/customizer.php';
	axialnest_woo_add_product_customizer();

	require plugin_dir_path( __FILE__ ) . '/src/product-custom-fields.php';
	require plugin_dir_path( __FILE__ ) . '/src/cart-manager.php';
}
