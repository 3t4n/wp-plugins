<?php
/**
 * Abstract payment gateway
 *
 * Hanldes generic payment gateway functionality which is extended by idividual payment gateways.
 *
 * @class Mollie_EDD_Gateway_Abstract
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

abstract class Mollie_EDD_Gateway_Abstract extends EDD_Mollie_Settings {

	/**
	 * Set if the place order button should be renamed on selection.
	 *
	 * @var string
	 */
	public $order_button_text;

	/**
	 * Yes or no based on whether the method is enabled.
	 *
	 * @var string
	 */
	public $enabled = 'yes';

	/**
	 * Payment method title for the frontend.
	 *
	 * @var string
	 */
	public $title;

	/**
	 * Payment method description for the frontend.
	 *
	 * @var string
	 */
	public $description;

	/**
	 * Chosen payment method id.
	 *
	 * @var bool
	 */
	public $chosen;

	/**
	 * Gateway title.
	 *
	 * @var string
	 */
	public $method_title = '';

	/**
	 * Gateway description.
	 *
	 * @var string
	 */
	public $method_description = '';

	/**
	 * True if the gateway shows fields on the checkout.
	 *
	 * @var bool
	 */
	public $has_fields;

	/**
	 * Countries this gateway is allowed for.
	 *
	 * @var array
	 */
	public $countries;

	/**
	 * Available for all counties or specific.
	 *
	 * @var string
	 */
	public $availability;

	/**
	 * Icon for the gateway.
	 *
	 * @var string
	 */
	public $icon;

	/**
	 * Supported features such as 'default_credit_card_form', 'refunds'.
	 *
	 * @var array
	 */
	public $supports = array( 'products' );

	/**
	 * Maximum transaction amount, zero does not define a maximum.
	 *
	 * @var int
	 */
	public $max_amount = 0;

	/**
	 * Optional URL to view a transaction.
	 *
	 * @var string
	 */
	public $view_transaction_url = '';

	/**
	 * Optional label to show for "new payment method" in the payment
	 * method/token selection radio selection.
	 *
	 * @var string
	 */
	public $new_method_label = '';

	/**
	 * Return the title for admin screens.
	 *
	 * @return string
	 */
	public function get_method_title() {
		return apply_filters( 'edd_mollie_gateway_method_title', $this->method_title, $this );
	}

	/**
	 * Return the description for admin screens.
	 *
	 * @return string
	 */
	public function get_method_description() {
		return apply_filters( 'edd_mollie_gateway_method_description', $this->method_description, $this );
	}

	/**
	 * Init settings for gateways.
	 */
	public function init_settings() {
		parent::init_settings();
		$this->enabled  = ! empty( $this->settings['enabled'] ) && 'yes' === $this->settings['enabled'] ? 'yes' : 'no';
	}

	/**
	 * Register Settings in WP Settings API.
	 *
	 * @since 1.0.0
	 * @uses get_option(), add_option()
	 */
	public function register_settings() {
		$page              = 'edd_settings_gateways-edd-mollie_' . $this->id;
		$section           = $this->get_option_key() . "_default";
		$main_settings_url = remove_query_arg( 'mollie_gateway' );
		$back_label        = __( 'Back to main Mollie settings', 'edd-mollie-gateway' );
		$back_link         =' <small class="wc-admin-breadcrumb"><a href="' . esc_url( $main_settings_url ) . '" aria-label="' . esc_html( $back_label ) . '">&#x2934;</a></small>';

		add_settings_section(
			$section,
			$this->get_method_title() . $back_link,
			array( $this, 'generate_header_html'),
			$page
		);
		parent::register_settings();
	}

	public function generate_header_html()
	{
		echo wp_kses_post( $this->get_method_description() );
	}

	/**
	 * Return whether or not this gateway still requires setup to function.
	 *
	 * When this gateway is toggled on via AJAX, if this returns true a
	 * redirect will occur to the settings page instead.
	 *
	 * @since 1.0.0
	 * @return bool
	 */
	public function needs_setup() {
		return false;
	}

	/**
	 * Get the return url (thank you page).
	 *
	 * @return void
	 */
	public function get_return_url() {
		#
	}

	/**
	 * Get a link to the transaction on the 3rd party gateway site (if applicable).
	 *
	 * @return string transaction URL, or empty string.
	 */
	public function get_transaction_url( $order ) {
		$return_url = '';
		$transaction_id = $order->transaction_id;
		if ( ! empty( $this->view_transaction_url ) && ! empty( $transaction_id ) ) {
			$return_url = sprintf( $this->view_transaction_url, $transaction_id );
		}
		return apply_filters( 'edd_mollie_get_transaction_url', $return_url, $order, $this );
	}

	/**
	 * Check if the gateway is available for use.
	 *
	 * @return bool
	 */
	public function is_available() {
		$is_available = $this->is_enabled();

		return $is_available;
	}


	/**
	 * Check if the gateway is enabled
	 *
	 * @return bool
	 */
	public function is_enabled() {
		$is_enabled = ( 'yes' === $this->enabled );

		return $is_enabled;
	}

	/**
	 * Check if the gateway has fields on the checkout.
	 *
	 * @return bool
	 */
	public function has_fields() {
		return (bool) $this->has_fields;
	}

	/**
	 * Return the gateway's title.
	 *
	 * @return string
	 */
	public function get_title() {
		return apply_filters( 'edd_mollie_gateway_title', $this->title, $this->id );
	}

	/**
	 * Return the gateway's description.
	 *
	 * @return string
	 */
	public function get_description() {
		return apply_filters( 'edd_mollie_gateway_description', $this->description, $this->id );
	}

	/**
	 * Return the gateway's icon.
	 *
	 * @return string
	 */
	public function get_icon() {

		$icon = $this->icon ? '<img src="' . $this->icon . '" alt="' . esc_attr( $this->get_title() ) . '" />' : '';

		return apply_filters( 'edd_mollie_gateway_icon', $icon, $this->id );
	}

	/**
	 * Set as current gateway.
	 *
	 * Set this as the current gateway.
	 */
	public function set_current() {
		$this->chosen = true;
	}

	/**
	 * Process Payment.
	 *
	 * Process the payment. Override this in your gateway. When implemented, this should.
	 * return the success and redirect in an array. e.g:
	 *
	 *        return array(
	 *            'result'   => 'success',
	 *            'redirect' => $this->get_return_url( $order )
	 *        );
	 *
	 * @param int $order_id Order ID.
	 * @return array
	 */
	public function process_payment( $order_id ) {
		return array();
	}

	/**
	 * Process refund.
	 *
	 * If the gateway declares 'refunds' support, this will allow it to refund.
	 * a passed in amount.
	 *
	 * @param  int    $order_id Order ID.
	 * @param  float  $amount Refund amount.
	 * @param  string $reason Refund reason.
	 * @return boolean True or false based on success, or a WP_Error object.
	 */
	public function process_refund( $order_id, $amount = null, $reason = '' ) {
		return false;
	}

	/**
	 * Validate frontend fields.
	 *
	 * Validate payment fields on the frontend.
	 *
	 * @return bool
	 */
	public function validate_fields() {
		return true;
	}

	/**
	 * If There are no payment fields show the description if set.
	 * Override this in your gateway if you have some.
	 */
	public function payment_fields() {
		$description = $this->get_description();
		
		if ( $description ) {
			echo wp_kses_post( $description );
		}

		if ( $this->supports( 'default_credit_card_form' ) ) {
			$this->credit_card_form(); // Deprecated, will be removed in a future version.
		}
	}

	/**
	 * Check if a gateway supports a given feature.
	 *
	 * Gateways should override this to declare support (or lack of support) for a feature.
	 * For backward compatibility, gateways support 'products' by default, but nothing else.
	 *
	 * @param string $feature string The name of a feature to test support for.
	 * @return bool True if the gateway supports the feature, false otherwise.
	 * @since 1.0.0
	 */
	public function supports( $feature ) {
		return apply_filters( 'edd_mollie_payment_gateway_supports', in_array( $feature, $this->supports ), $feature, $this );
	}

	/**
	 * Can the order be refunded via this gateway?
	 *
	 * Should be extended by gateways to do their own checks.
	 *
	 * @param  $order Order object.
	 * @return bool If false, the automatic refund button is hidden in the UI.
	 */
	public function can_refund_order( $order ) {
		return $order && $this->supports( 'refunds' );
	}

	/**
	 * Add payment method via account screen. This should be extended by gateway plugins.
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function add_payment_method() {
		return array(
			'result'   => 'failure',
			'redirect' => '',
		);
	}
}