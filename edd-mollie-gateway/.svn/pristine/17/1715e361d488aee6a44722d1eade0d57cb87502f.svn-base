<?php
/**
 * Plugin Name:       Payment Gateway using Mollie for Easy Digital Downloads
 * Plugin URI:        https://wpovernight.com/downloads/easy-digital-downloads-mollie-pro/
 * Description:       Accept payments via Mollie in your Easy Digital Downloads (EDD) store
 * Version:           3.2.17
 * Requires at least: 4.7
 * Requires PHP:      7.2
 * Author:            WP Overnight
 * Author URI:        https://wpovernight.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       edd-mollie-gateway
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class EDD_Mollie {

	public $version     = '3.2.17';

	protected $gateways = array();

	protected $settings;

	private static $instance;

	private function __construct() {

	}

	public static function instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof EDD_Mollie ) ) {
			self::$instance = new EDD_Mollie;

			if ( version_compare( PHP_VERSION, '7.2', '<' ) ) {

				add_action( 'admin_notices', array( __CLASS__, 'below_php_version_notice' ) );

			} else {
				add_action( 'init', array( self::$instance, 'load_textdomain' ), 9 );

				self::$instance->setup_constants();

				require_once EDD_MOLLIE_PLUGIN_DIR . '/vendor/autoload.php';

				self::$instance->setup_classes();
				self::$instance->actions();
				self::$instance->filters();
			}
		}

		return self::$instance;
	}

	/**
	 * Auto-load in-accessible properties on demand.
	 *
	 * @param mixed $key Key name.
	 * @return mixed
	 */
	public function __get( $key ) {
		if ( in_array( $key, array( 'gateways', 'settings' ), true ) ) {
			return $this->$key();
		}
	}

	function below_php_version_notice() {
		$message = '<div class="error"><p>' . esc_html__( 'Your version of PHP is below the minimum version of PHP required by Payment Gateway using Mollie for Easy Digital Downloads. Please contact your host and request that your version be upgraded to 5.6.0 or greater.', 'edd-mollie-gateway' ) . '</p></div>';
		echo wp_kses_post( $message );
	}

	private function setup_constants() {
		$this->define( 'EDD_MOLLIE_PLUGIN_DIR', dirname( __FILE__ ) );
		$this->define( 'EDD_MOLLIE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
		$this->define( 'EDD_MOLLIE_VERSION', $this->version );
	}

	/**
	 * Define constant if not already set
	 * @param  string $name
	 * @param  string|bool $value
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

	private function actions() {
		#
	}

	private function filters() {
		#
	}

	private function setup_classes() {
		EDD_Mollie_Install::instance();
		EDD_Mollie_Main::instance();
		if (class_exists('EDD_Mollie_Recurring')) {
			EDD_Mollie_Recurring::instance();
		}
	}

	public function gateways() {
		if (empty($this->gateways)) {
			$gateway_classes = array(
				'Mollie_EDD_Gateway_Bancontact',
				'Mollie_EDD_Gateway_BankTransfer',
				'Mollie_EDD_Gateway_Belfius',
				'Mollie_EDD_Gateway_Creditcard',
				'Mollie_EDD_Gateway_DirectDebit',
				'Mollie_EDD_Gateway_Eps',
				'Mollie_EDD_Gateway_Giftcard',
				'Mollie_EDD_Gateway_Giropay',
				'Mollie_EDD_Gateway_Ideal',
				'Mollie_EDD_Gateway_IngHomePay',
				'Mollie_EDD_Gateway_Kbc',
				'Mollie_EDD_Gateway_MyBank',
				'Mollie_EDD_Gateway_PayPal',
				'Mollie_EDD_Gateway_Paysafecard',
				'Mollie_EDD_Gateway_Przelewy24',
				'Mollie_EDD_Gateway_Sofort',
			);

			foreach ($gateway_classes as $class) {
				if (class_exists($class)) {
					$gateway = new $class();
					$this->gateways[$gateway->id] = $gateway;
				}
			}
		}

		return $this->gateways;
	}

	public function get_gateway( $id ) {
		// add mollie_ prefix if not present
		$prefix   = 'mollie_';
		$id       = strpos( $id, $prefix ) === false ? $prefix . $id : $id;
		$gateways = $this->gateways();
		if (isset($gateways[$id])) {
			return $gateways[$id];
		} else {
			return false;
		}
	}

	public function settings() {
		if (empty($this->settings)) {
			$this->settings = new Mollie_EDD_Settings_General();
		}
		return $this->settings;
	}

	/**
	 * Load Localisation files.
	 *
	 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
	 *
	 * Locales found in:
	 *      - WP_LANG_DIR/edd-mollie/edd-mollie-LOCALE.mo
	 *      - WP_LANG_DIR/plugins/edd-mollie-LOCALE.mo
	 */
	public function load_textdomain() {
		if ( function_exists( 'determine_locale' ) ) {
			$locale = determine_locale();
		} else {
			// @todo Remove when start supporting WP 5.0 or later.
			$locale = is_admin() ? get_user_locale() : get_locale();
		}
		$locale = apply_filters( 'plugin_locale', $locale, 'edd-mollie-gateway' );
		unload_textdomain( 'edd-mollie-gateway' );
		load_textdomain( 'edd-mollie-gateway', WP_LANG_DIR . '/edd-mollie-gateway/edd-mollie-gateway-' . $locale . '.mo' );
		load_plugin_textdomain( 'edd-mollie-gateway', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
}

function EDD_Mollie() {

	if( ! function_exists( 'EDD' ) ) {
		return;
	}

	return EDD_Mollie::instance();
}
add_action( 'plugins_loaded', 'edd_mollie', 10 );

/**
 * Plugin activation
 *
 * @since       1.0
 * @return      void
 */
function edd_mollie_plugin_activation() {
	#
}

register_activation_hook( __FILE__, 'edd_mollie_plugin_activation' );