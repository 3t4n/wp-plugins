<?php
/**
 * Borica_Payment_Gateway Borica_Payment_Gateway_Blocks Class Doc Comment
 *
 * PHP version 8
 *
 * @category Payment Gateway
 * @package  Borica_Woo_Payment_Gateway
 * @author   Ilko Ivanov <ilko.iv@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.borica.bg/
 */

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

/**
 * Borica_Payment_Gateway_Blocks Class Doc Comment
 *
 * Borica_Payment_Gateway_Blocks Class
 *
 * @author   Ilko Ivanov <ilko.iv@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.borica.bg/
 */
final class Borica_Payment_Gateway_Blocks extends AbstractPaymentMethodType {

	/**
	 * Instance of the Borica_Woo_Payment_Gateway class.
	 *
	 * This property holds an instance of the Borica_Woo_Payment_Gateway class,
	 * which manages the core functionality of the Borica payment gateway.
	 * It is initialized in the `initialize()` method and used to check
	 * the availability of the payment gateway and to retrieve payment-related data.
	 *
	 * @var Borica_Woo_Payment_Gateway
	 */
	private $gateway;

	/**
	 * Internal name identifier for the Borica payment gateway.
	 *
	 * This property defines the unique name used internally to identify
	 * the Borica payment gateway within the WooCommerce system.
	 * It is used by WooCommerce to register and manage the payment method.
	 *
	 * @var string
	 */
	protected $name = 'borica_woo_payment_gateway';

	/**
	 * Initializes the Borica payment gateway.
	 *
	 * This method is responsible for setting up the Borica payment gateway by:
	 * 1. Retrieving the gateway settings from the WordPress options table using the option name
	 *    'woocommerce_borica_woo_payment_gateway_settings'. If no settings are found, an empty array is used as a fallback.
	 * 2. Creating a new instance of the Borica_Woo_Payment_Gateway class, which manages the core payment functionality.
	 *
	 * This method is typically called during the gateway's initialization process to ensure that the gateway is ready for use.
	 *
	 * @return void
	 */
	public function initialize() {
		$this->settings = get_option( 'woocommerce_borica_woo_payment_gateway_settings', array() );
		$this->gateway  = new Borica_Woo_Payment_Gateway();
	}

	/**
	 * Checks if the Borica payment gateway is active.
	 *
	 * This method determines whether the Borica payment gateway is available for use.
	 * It does so by calling the `is_available()` method on the `Borica_Woo_Payment_Gateway` instance,
	 * which checks the gateway's availability based on its configuration and the current environment.
	 *
	 * @return bool True if the gateway is active and available, false otherwise.
	 */
	public function is_active() {
		return $this->gateway->is_available();
	}

	/**
	 * Registers and returns the script handles required for the Borica payment gateway integration in WooCommerce blocks.
	 *
	 * This method registers the JavaScript file necessary for integrating the Borica payment gateway into the WooCommerce blocks-based
	 * checkout. It does the following:
	 *
	 * 1. Registers a script handle named 'borica_woo_payment_gateway-blocks-integration', which points to the 'checkout.js' file
	 *    located in the same directory as this PHP file.
	 * 2. Specifies an array of dependencies for the script, ensuring that required WooCommerce and WordPress components
	 *    are loaded before this script.
	 * 3. Registers the script for translation using `wp_set_script_translations`, if the function is available, to support localization.
	 * 4. Returns an array containing the registered script handle, which WooCommerce will use to enqueue the script on the appropriate pages.
	 *
	 * @return array An array containing the script handle for the Borica payment gateway integration.
	 */
	public function get_payment_method_script_handles() {
		$script_path    = plugin_dir_path( __FILE__ ) . 'checkout.js';
		$script_version = file_exists( $script_path ) ? filemtime( $script_path ) : '1.0.0';

		wp_register_script(
			'borica_woo_payment_gateway-blocks-integration',
			plugin_dir_url( __FILE__ ) . 'checkout.js',
			array(
				'wc-blocks-registry',
				'wc-settings',
				'wp-element',
				'wp-html-entities',
				'wp-i18n',
			),
			$script_version,
			true
		);
		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( 'borica_woo_payment_gateway-blocks-integration' );
		}
		return array( 'borica_woo_payment_gateway-blocks-integration' );
	}

	/**
	 * Retrieves and returns the data required to render the Borica payment method on the checkout page.
	 *
	 * This method gathers all the necessary data to be passed to the frontend for displaying the Borica payment gateway option
	 * during the checkout process. The data includes:
	 *
	 * 1. **Title and Description**: Retrieved from the `Borica_Woo_Payment_Gateway` instance, these fields define the payment method's
	 *    title and description as shown to the customer.
	 * 2. **Image Source**: A URL pointing to an image that represents the payment method, typically a logo. This URL is constructed using
	 *    the `BORICA_IMAGES_URI` constant and appending the path to the image file.
	 * 3. **Processed By**: A localized string indicating that the payment is processed by BORICA.
	 * 4. **Gateway Options**:
	 *    - `borica_direct`: Indicates whether the payment method operates in direct mode, retrieved as an integer from the WordPress options table.
	 *    - `borica_testmode`: Indicates whether the gateway is in test mode, also retrieved as an integer from the WordPress options table.
	 * 5. **Button Texts**: Localized text for the payment button and the place order button, to be displayed on the checkout page.
	 *
	 * @return array An associative array containing the data required to render the Borica payment method.
	 */
	public function get_payment_method_data() {
		$borica_direct   = (int) get_option( 'borica_direct' );
		$borica_testmode = (int) get_option( 'borica_testmode' );
		if ( 1 === $borica_testmode ) {
			$boricaTitle = __( 'Payment by Credit/Debit Card', 'borica' ) . ' ' . __( '(TEST MODE)', 'borica' );
		} else {
			$boricaTitle = __( 'Payment by Credit/Debit Card', 'borica' );
		}
		return array(
			'title'                       => $boricaTitle,
			'description'                 => $this->gateway->description,
			'img_src'                     => esc_url( BORICA_IMAGES_URI ) . '/borica_cards.png',
			'processed_by'                => esc_html__( 'Processed by BORICA', 'borica' ),
			'borica_direct'               => esc_attr( $borica_direct ),
			'borica_testmode'             => esc_attr( $borica_testmode ),
			'borica_btn_pay_text'         => esc_html__( 'Payment', 'borica' ),
			'borica_btn_place_order_text' => esc_html__( 'Place Order', 'borica' ),
		);
	}
}
