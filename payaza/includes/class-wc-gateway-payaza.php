<?php

if (! defined('ABSPATH')) {
	exit;
}

class WC_Gateway_Payaza extends WC_Payment_Gateway_CC
{

	/**
	 * Is test mode active?
	 *
	 * @var bool
	 */
	public $testmode;

	/**
	 * Should orders be marked as complete after payment?
	 * 
	 * @var bool
	 */
	public $autocomplete_order;

	/**
	 * Payaza payment page type.
	 *
	 * @var string
	 */
	public $payment_page;

	/**
	 * Payaza test public key.
	 *
	 * @var string
	 */
	public $test_public_key;

	/**
	 * Payaza test secret key.
	 *
	 * @var string
	 */
	public $test_secret_key;

	/**
	 * Payaza live public key.
	 *
	 * @var string
	 */
	public $live_public_key;

	/**
	 * Payaza live secret key.
	 *
	 * @var string
	 */
	public $live_secret_key;

	/**
	 * Should we save customer cards?
	 *
	 * @var bool
	 */
	public $saved_cards;


	/**
	 * Should the cancel & remove order button be removed on the pay for order page.
	 *
	 * @var bool
	 */
	public $remove_cancel_order_button;


	/**
	 * API public key
	 *
	 * @var string
	 */
	public $public_key;

	/**
	 * API secret key
	 *
	 * @var string
	 */
	public $secret_key;

	/**
	 * Gateway disabled message
	 *
	 * @var string
	 */
	public $msg;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->id                 = 'payaza';
		$this->method_title       = __('Payaza', 'woo-payaza');
		$this->method_description = sprintf(__('With Payaza, your customers have access to as many payment options as possible at a very affordable rate using Mastercard, Visa, Verve Cards and Bank Accounts. <a href="%1$s" target="_blank">Sign up</a> for a Payaza account, and <a href="%2$s" target="_blank">get your API keys</a>.', 'woo-payaza'), 'https://payaza.africa', 'https://payaza.africa/login');
		$this->has_fields         = true;

		$this->payment_page = $this->get_option('payment_page');

		$this->supports = array(
			'products',
			'refunds',
			'tokenization',

		);

		// Load the form fields
		$this->init_form_fields();

		// Load the settings
		$this->init_settings();

		// Get setting values

		$this->title              = $this->get_option('title');
		$this->description        = $this->get_option('description');
		$this->enabled            = $this->get_option('enabled');
		$this->testmode           = $this->get_option('testmode') === 'yes' ? true : false;
		$this->autocomplete_order = $this->get_option('autocomplete_order') === 'yes' ? true : false;

		$this->test_public_key = $this->get_option('test_public_key');
		$this->test_secret_key = $this->get_option('test_secret_key');

		$this->live_public_key = $this->get_option('live_public_key');
		$this->live_secret_key = $this->get_option('live_secret_key');

		$this->saved_cards = $this->get_option('saved_cards') === 'yes' ? true : false;

		$this->remove_cancel_order_button = $this->get_option('remove_cancel_order_button') === 'yes' ? true : false;

		$this->form_fields = array_merge($this->form_fields, array(
			'nonce' => array(
				'type' => 'nonce',
				'class' => array('payaza-gateway-nonce'),
			),
		));
		$this->testmode = $this->get_option('testmode') === 'yes';
		$this->public_key = $this->testmode ? $this->test_public_key : $this->live_public_key;
		$this->secret_key = $this->testmode ? $this->test_secret_key : $this->live_secret_key;

		add_action('wp_enqueue_scripts', array($this, 'payment_scripts'));
		add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));

		add_action('admin_notices', array($this, 'admin_notices'));
		add_action(
			'woocommerce_update_options_payment_gateways_' . $this->id,
			array(
				$this,
				'process_admin_options',
			)
		);

		add_action('woocommerce_receipt_' . $this->id, array($this, 'receipt_page'));
		add_action('woocommerce_api_wc_gateway', array($this, 'verify_payaza_transaction'));

		// Check if the gateway can be used.
		if (! $this->is_valid_for_use()) {
			$this->enabled = false;
		}
	}

	/**
	 * Check if this gateway is enabled and available in the user's country.
	 */
	public function is_valid_for_use()
	{



		return true;
	}

	/**
	 * Display payaza payment icon.
	 */
	public function get_icon()
	{


		$icon = '<img src="' . WC_HTTPS::force_https_url(plugins_url('assets/images/Payaza Logo.svg', WC_PAYAZA_MAIN_FILE)) . '" alt="Payment Options" />';

		return apply_filters('woocommerce_gateway_icon', $icon, $this->id);
	}

	/**
	 * Check if Payaza merchant details is filled.
	 */
	public function admin_notices()
	{

		if ($this->enabled == 'yes') {
			if ($this->testmode) {
				echo '<div class="notice notice-warning"><p>' . __('Payaza is in test mode. Make sure to disable test mode in live environments.', 'woo-payaza') . '</p></div>';
			} else {
				echo '<div class="notice notice-success"><p>' . __('Payaza is live.', 'woo-payaza') . '</p></div>';
			}
		}


		// Check required fields.
		if (! ($this->public_key && $this->secret_key)) {
			echo '<div class="error"><p>' .  sprintf(__('Please enter your Payaza merchant details <a href="%s">here</a> to be able to use the Payaza WooCommerce plugin.', 'woo-payaza'), admin_url('admin.php?page=wc-settings&tab=checkout&section=payaza')) . '</p></div>';
			return;
		}
	}

	/**
	 * Check if Payaza gateway is enabled.
	 *
	 * @return bool
	 */
	public function is_available()
	{

		if ('yes' == $this->enabled) {

			if (! ($this->public_key && $this->secret_key)) {

				return false;
			}

			return true;
		}

		return false;
	}

	/**
	 * Admin Panel Options.
	 */
	public function admin_options()
	{

?>

		<h2><?php _e('Payaza', 'woo-payaza'); ?>
			<?php
			if (function_exists('wc_back_link')) {
				wc_back_link(__('Return to payments', 'woo-payaza'), admin_url('admin.php?page=wc-settings&tab=checkout'));
			}
			?>
		</h2>
		<h4>

			<strong><?php printf(
						__(
							'Set your webhook URL <a href="%1$s" target="_blank" rel="noopener noreferrer">here</a> to the URL below<span style="color: green"><pre><code>%2$s</code></pre></span>',
							'woo-payaza'
						),
						esc_url('https://payaza.africa/settings'),
						esc_html(WC()->api_request_url('Paz_WC_Payaza_Webhook'))
					); ?></strong>
		</h4>
		<?php

		if ($this->is_valid_for_use()) {

			echo '<table class="form-table">';
			$this->generate_settings_html();
			echo '</table>';
		} else {
		?>
			<div class="inline error">
				<p><strong><?php printf(esc_html__('Payaza Payment Gateway Disabled', 'woo-payaza'), esc_html($this->msg)); ?></strong></p>
			</div>

<?php
		}
	}

	/**
	 * Initialise Gateway Settings Form Fields.
	 */
	public function init_form_fields()
	{

		$form_fields = array(
			'enabled'                          => array(
				'title'       => __('Enable/Disable', 'woo-payaza'),
				'label'       => __('Enable Payaza', 'woo-payaza'),
				'type'        => 'checkbox',
				'description' => __('Enable Payaza as a payment option on the checkout page.', 'woo-payaza'),
				'default'     => 'no',
				'desc_tip'    => true,
			),
			'title'                            => array(
				'title'       => __('Title', 'woo-payaza'),
				'type'        => 'text',
				'description' => __('This controls the payment method title which the user sees during checkout.', 'woo-payaza'),
				'default'     => __('Debit/Credit Cards', 'woo-payaza'),
				'desc_tip'    => true,
			),
			'description'                      => array(
				'title'       => __('Description', 'woo-payaza'),
				'type'        => 'textarea',
				'description' => __('This controls the payment method description which the user sees during checkout.', 'woo-payaza'),
				'default'     => __('Make payment using your debit and credit cards', 'woo-payaza'),
				'desc_tip'    => true,
			),
			'testmode'                         => array(
				'title'       => __('Test mode', 'woo-payaza'),
				'label'       => __('Enable Test Mode', 'woo-payaza'),
				'type'        => 'checkbox',
				'description' => __('Test mode enables you to test payments before going live. <br />Once the LIVE MODE is enabled on your Payaza account uncheck this.', 'woo-payaza'),
				'default'     => 'yes',
				'desc_tip'    => true,
			),

			'test_secret_key'                  => array(
				'title'       => __('Test Secret Key', 'woo-payaza'),
				'type'        => 'password',
				'description' => __('Enter your Test Secret Key here', 'woo-payaza'),
				'default'     => '',
			),
			'test_public_key'                  => array(
				'title'       => __('Test Public Key', 'woo-payaza'),
				'type'        => 'text',
				'description' => __('Enter your Test Public Key here.', 'woo-payaza'),
				'default'     => '',
			),
			'live_secret_key'                  => array(
				'title'       => __('Live Secret Key', 'woo-payaza'),
				'type'        => 'password',
				'description' => __('Enter your Live Secret Key here.', 'woo-payaza'),
				'default'     => '',
			),
			'live_public_key'                  => array(
				'title'       => __('Live Public Key', 'woo-payaza'),
				'type'        => 'text',
				'description' => __('Enter your Live Public Key here.', 'woo-payaza'),
				'default'     => '',
			),
			'autocomplete_order'               => array(
				'title'       => __('Autocomplete Order After Payment', 'woo-payaza'),
				'label'       => __('Autocomplete Order', 'woo-payaza'),
				'type'        => 'checkbox',
				'class'       => 'wc-payaza-autocomplete-order',
				'description' => __('If enabled, the order will be marked as complete after successful payment', 'woo-payaza'),
				'default'     => 'no',
				'desc_tip'    => true,
			),
			'remove_cancel_order_button'       => array(
				'title'       => __('Remove Cancel Order & Restore Cart Button', 'woo-payaza'),
				'label'       => __('Remove the cancel order & restore cart button on the pay for order page', 'woo-payaza'),
				'type'        => 'checkbox',
				'description' => '',
				'default'     => 'no',
			),
			'saved_cards'                      => array(
				'title'       => __('Saved Cards', 'woo-payaza'),
				'label'       => __('Enable Payment via Saved Cards', 'woo-payaza'),
				'type'        => 'checkbox',
				'description' => __('If enabled, users will be able to pay with a saved card during checkout. Card details are saved on Payaza servers, not on your store.<br>Note that you need to have a valid SSL certificate installed.', 'woo-payaza'),
				'default'     => 'no',
				'desc_tip'    => true,
			),


		);

		if ('NGN' !== get_woocommerce_currency()) {
			unset($form_fields['custom_gateways']);
		}

		$this->form_fields = $form_fields;
	}

	/**
	 * Payment form on checkout page
	 */
	public function payment_fields()
	{

		wp_nonce_field('wc_payaza_nonce', 'wc_payaza_nonce');


		if ($this->description) {
			echo wpautop(wptexturize(esc_html($this->description)));
		}

		if (! is_ssl()) {
			return;
		}

		if ($this->supports('tokenization') && is_checkout() && $this->saved_cards && is_user_logged_in()) {
			$this->tokenization_script();
			$this->saved_payment_methods();
			$this->save_payment_method_checkbox();
		}
	}

	/**
	 * Outputs scripts used for payaza payment.
	 */

	public function payment_scripts()
	{

		if (isset($_GET['pay_for_order']) || ! is_checkout_pay_page()) {
			return;
		}

		if ($this->enabled === 'no') {
			return;
		}

		$order_key = isset($_GET['key']) ? sanitize_text_field(wp_unslash($_GET['key'])) : '';
		$order_id  = absint(get_query_var('order-pay'));

		$order = wc_get_order($order_id);

		if (! $order || $this->id !== $order->get_payment_method()) {
			return;
		}

		$suffix = (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) ? '' : '.min';

		wp_enqueue_script('jquery');
		wp_enqueue_script('payaza', 'https://checkout-v2.payaza.africa/js/v1/bundle.js', array('jquery'), WC_PAYAZA_VERSION, false);
		wp_enqueue_script('wc_payaza', plugins_url('assets/js/payaza' . $suffix . '.js', WC_PAYAZA_MAIN_FILE), array('jquery', 'payaza'), WC_PAYAZA_VERSION, false);

		$payaza_params = array(
			'key'            => $this->public_key,
			'connection_mode' => $this->testmode ? 'Test' : 'Live',
			'thank_you_url'  => wc_get_endpoint_url('order-received', '', wc_get_checkout_url()),
		);

		if (is_checkout_pay_page() && get_query_var('order-pay')) {

			$email         = $order->get_billing_email();
			$first_name    = $order->get_billing_first_name();
			$last_name 	   = $order->get_billing_last_name();
			$phone_number  = $order->get_billing_phone();
			$amount        = $order->get_total() * 100;
			$txnref        = $order_id . '_' . time();
			$the_order_id  = $order->get_id();
			$the_order_key = $order->get_order_key();
			$currency      = $order->get_currency();

			if ($the_order_id == $order_id && $the_order_key == $order_key) {

				// Additional parameters for the checkout payment page
				$payaza_params['email']    = $email;
				$payaza_params['first_name'] = $first_name;
				$payaza_params['last_name'] = $last_name;
				$payaza_params['phone_number'] = $phone_number;
				$payaza_params['amount'] = absint($amount);
				$payaza_params['txnref'] = $txnref;
				$payaza_params['currency'] = $currency;
			}




			$order->update_meta_data('_paystack_txn_ref', $txnref);
			$order->save();
		}
		wp_localize_script('wc_payaza', 'wc_payaza_params', $payaza_params);
	}






	/**
	 * Load admin scripts.
	 */
	public function admin_scripts()
	{

		if ('woocommerce_page_wc-settings' !== get_current_screen()->id) {
			return;
		}

		$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

		$payaza_admin_params = array(
			'plugin_url' => WC_PAYAZA_URL,
		);

		wp_enqueue_script('wc_payaza_admin', plugins_url('assets/js/payaza-admin' . $suffix . '.js', WC_PAYAZA_MAIN_FILE), array(), WC_PAYAZA_VERSION, true);

		wp_localize_script('wc_payaza_admin', 'wc_payaza_admin_params', $payaza_admin_params);
	}


	/**
	 * Process the payment.
	 *
	 * @param int $order_id
	 *
	 * @return array|void
	 */
	function process_payment($order_id)
	{
		global $woocommerce;
		$order = new WC_Order($order_id);

	if ( isset( $_POST[ $new_payment_method ] ) && ( true === (bool) $_POST[ $new_payment_method ] ) && $this->saved_cards && is_user_logged_in() ) {
	 		$order->update_meta_data( '_wc_payaza_save_card', true );
	 		$order->save();
		}

		// Mark as on-hold (we're awaiting the payment)
		$order->update_status('on-hold', __('Awaiting payment', 'woo-payaza'));

		// Reduce stock levels
		$order->reduce_order_stock();

		// Remove cart
		$woocommerce->cart->empty_cart();

		// Return thankyou redirect
		return array(
			'result' => 'success',
			'redirect' => $order->get_checkout_payment_url(true),
		);
	}
	//	$order->payment_complete();

		// Remove cart
		//$woocommerce->cart->empty_cart();

		// Return thankyou redirect
	//	return array(
		//	'result' => 'success',
	//		'redirect' => $order->get_checkout_payment_url($order_id),
		//);
	//}




	//  public function process_payment( $order_id ) {
	//  	$payment_token = 'wc-' . trim( $this->id ) . '-payment-token';

	// // 	// Check if a saved token is used for payment.
	//  	if ( isset( $_POST[ $payment_token ] ) && 'new' !== wc_clean( $_POST[ $payment_token ] ) ) {
	//  		$token_id = wc_clean( $_POST[ $payment_token ] );
	//  		$token = \WC_Payment_Tokens::get( $token_id );

	//  		// Verify token ownership.
	//  		if ( $token->get_user_id() !== get_current_user_id() ) {
	//  			wc_add_notice( 'Invalid token ID', 'error' );
	//  			return;
	//  		}

	//  		// Process payment with token.
	//  		$token_payment_status = $this->process_token_payment( $token->get_token(), $order_id );

	//  		if ( ! $token_payment_status ) {

	//  		$order = wc_get_order( $order_id );

	//  		// Redirect to the receipt page after successful payment.
	//  		return array(
	//  			'result'   => 'success',
	//  			'redirect' => $this->get_return_url( $order ),
	// 			//'redirect' => $order->get_checkout_payment_url( true ),


	//  		);
	//  	}

	//  	$order = wc_get_order( $order_id );
	// 	$new_payment_method = 'wc-' . trim( $this->id ) . '-new-payment-method';

	// // 	// Check if a new payment method is being saved.
	// 	if ( isset( $_POST[ $new_payment_method ] ) && ( true === (bool) $_POST[ $new_payment_method ] ) && $this->saved_cards && is_user_logged_in() ) {
	// 		$order->update_meta_data( '_wc_payaza_save_card', true );
	//  		$order->save();
	// 	}

	//  	// Redirect to the receipt page.	
	//         return array(
	//      	'result'   => 'success',
	//  		'redirect' => $order->get_checkout_payment_url( true ),
	//   	);
	//  }


	/**
	 * Show new card can only be added when placing an order notice.
	 */
	public function add_payment_method()
	{

		wc_add_notice(__('You can only add a new card when placing an order.', 'woo-payaza'), 'error');

		return;
	}

	/**
	 * Displays the payment page.
	 *
	 * @param $order_id
	 */
	public function receipt_page($order_id)
	{

		$order = wc_get_order($order_id);
		$email  = $order->get_billing_email();

		echo '<div id="wc-payaza-form">';


		echo '<p>' . esc_html_e('Thank you for your order, please click the button below to pay with Payaza.', 'woo-payaza') . '</p>';




		echo '<div id="payaza_form">
  <form id="order_review" method="post" action="' . esc_url(wc_get_checkout_url()) . '">
    <input type="hidden" name="payaza_payment_button" value="1">
  </form>
  <button class="button" id="payaza-payment-button">' . __('Pay Now', 'woo-payaza') . '</button>';


		if (! $this->remove_cancel_order_button) {
			echo '  <a class="button cancel" id="payaza-cancel-payment-button" href="' . esc_url($order->get_cancel_order_url()) . '">' . __('Cancel order &amp; restore cart', 'woo-payaza') . '</a></div>';
		}

		echo '</div>';
	}


	/**
	 * Verify Payaza payment.
	 */
	public function verify_payaza_transaction()
	{

		if (isset($_REQUEST['payaza_txnref'])) {
			$payaza_txn_ref = sanitize_text_field($_REQUEST['payaza_txnref']);
		} elseif (isset($_REQUEST['reference'])) {
			$payaza_txn_ref = sanitize_text_field($_REQUEST['reference']);
		} else {
			$payaza_txn_ref = false;
		}

		@ob_clean();

		if ($payaza_txn_ref) {

			$payaza_response = $this->get_payaza_transaction($payaza_txn_ref);

			if (false !== $payaza_response) {

				if ('success' == $payaza_response->data->status) {

					$order_details = explode('_', $payaza_response->data->reference);
					$order_id      = (int) $order_details[0];
					$order         = wc_get_order($order_id);

					if (in_array($order->get_status(), array('processing', 'completed', 'on-hold'))) {

						wp_redirect($this->get_return_url($order));

						exit;
					}

					$order_total      = $order->get_total();
					$order_currency   = $order->get_currency();
					$currency_symbol  = get_woocommerce_currency_symbol($order_currency);
					$amount_paid      = $payaza_response->data->amount / 100;
					$payaza_ref     = $payaza_response->data->reference;
					$payment_currency = strtoupper($payaza_response->data->currency);
					$gateway_symbol   = get_woocommerce_currency_symbol($payment_currency);

					// check if the amount paid is equal to the order amount.
					if ($amount_paid < absint($order_total)) {

						$order->update_status('on-hold', '');

						$order->add_meta_data('_transaction_id', $payaza_ref, true);

						$notice      = sprintf(__('Thank you for shopping with us.%1$sYour payment transaction was successful, but the amount paid is not the same as the total order amount.%2$sYour order is currently on hold.%3$sKindly contact us for more information regarding your order and payment status.', 'woo-payaza'), '<br />', '<br />', '<br />');
						$notice_type = 'notice';

						// Add Customer Order Note
						$order->add_order_note($notice, 1);

						// Add Admin Order Note
						$admin_order_note = sprintf(__('<strong>Look into this order</strong>%1$sThis order is currently on hold.%2$sReason: Amount paid is less than the total order amount.%3$sAmount Paid was <strong>%4$s (%5$s)</strong> while the total order amount is <strong>%6$s (%7$s)</strong>%8$s<strong>payaza Transaction Reference:</strong> %9$s', 'woo-payaza'), '<br />', '<br />', '<br />', $currency_symbol, $amount_paid, $currency_symbol, $order_total, '<br />', $payaza_ref);
						$order->add_order_note($admin_order_note);

						function_exists('wc_reduce_stock_levels') ? wc_reduce_stock_levels($order_id) : $order->reduce_order_stock();

						wc_add_notice($notice, $notice_type);
					} else {

						if ($payment_currency !== $order_currency) {

							$order->update_status('on-hold', '');

							$order->update_meta_data('_transaction_id', $payaza_ref);

							$notice      = sprintf(__('Thank you for shopping with us.%1$sYour payment was successful, but the payment currency is different from the order currency.%2$sYour order is currently on-hold.%3$sKindly contact us for more information regarding your order and payment status.', 'woo-payaza'), '<br />', '<br />', '<br />');
							$notice_type = 'notice';

							// Add Customer Order Note
							$order->add_order_note($notice, 1);

							// Add Admin Order Note
							$admin_order_note = sprintf(__('<strong>Look into this order</strong>%1$sThis order is currently on hold.%2$sReason: Order currency is different from the payment currency.%3$sOrder Currency is <strong>%4$s (%5$s)</strong> while the payment currency is <strong>%6$s (%7$s)</strong>%8$s<strong>payaza Transaction Reference:</strong> %9$s', 'woo-payaza'), '<br />', '<br />', '<br />', $order_currency, $currency_symbol, $payment_currency, $gateway_symbol, '<br />', $payaza_ref);
							$order->add_order_note($admin_order_note);

							function_exists('wc_reduce_stock_levels') ? wc_reduce_stock_levels($order_id) : $order->reduce_order_stock();

							wc_add_notice($notice, $notice_type);
						} else {

							$order->payment_complete($payaza_ref); // Mark the order as complete
							if ($this->is_autocomplete_order_enabled($order)) {
								$order->update_status('completed'); // Update status to completed if enabled
							}
							$order->add_order_note(sprintf(__('Payment via payaza successful (Transaction Reference: %s)', 'woo-payaza'), $payaza_ref));

							if ($this->is_autocomplete_order_enabled($order)) {
								$order->update_status('completed');
							}
						}
					}

					$order->save();

					$this->save_card_details($payaza_response, $order->get_user_id(), $order_id);

					WC()->cart->empty_cart();
				} else {

					$order_details = explode('_', $_REQUEST['payaza_txnref']);

					$order_id = (int) $order_details[0];

					$order = wc_get_order($order_id);

					$order->update_status('failed', __('Payment was declined by payaza.', 'woo-payaza'));
				}
			}

			wp_redirect($this->get_return_url($order));

			exit;
		}

		wp_redirect(wc_get_page_permalink('cart'));

		exit;
	}


	/**
	 * Save Customer Card Details.
	 *
	 * @param $payaza_response
	 * @param $user_id
	 * @param $order_id
	 */
	public function save_card_details($payaza_response, $user_id, $order_id)
	{

		// $this->save_subscription_payment_token($order_id, $payaza_response);

		$save_card = get_post_meta($order_id, '_wc_payaza_save_card', true);

		if ($user_id && $this->saved_cards && $save_card && $payaza_response->data->authorization->reusable && 'card' == $payaza_response->data->authorization->channel) {

			$order = wc_get_order($order_id);

			$gateway_id = $order->get_payment_method();

			$last4     = $payaza_response->data->authorization->last4;
			$exp_year  = $payaza_response->data->authorization->exp_year;
			$brand     = $payaza_response->data->authorization->card_type;
			$exp_month = $payaza_response->data->authorization->exp_month;
			$auth_code = $payaza_response->data->authorization->authorization_code;

			$token = new WC_Payment_Token_CC();
			$token->set_token($auth_code);
			$token->set_gateway_id($gateway_id);
			$token->set_card_type(strtolower($brand));
			$token->set_last4($last4);
			$token->set_expiry_month($exp_month);
			$token->set_expiry_year($exp_year);
			$token->set_user_id($user_id);
			$token->save();

			delete_post_meta($order_id, '_wc_payaza_save_card');
		}
	}



	/**
	 * Checks if WC version is less than passed in version.
	 *
	 * @param string $version Version to check against.
	 *
	 * @return bool
	 */
	public function is_wc_lt($version)
	{
		// return version_compare(WC_VERSION, $version, '<');
	}

	/**
	 * Checks if autocomplete order is enabled for the payment method.
	 *
	 * @since 5.7
	 * @param WC_Order $order Order object.
	 * @return bool
	 */
	protected function is_autocomplete_order_enabled($order)
	{
		$autocomplete_order = false;

		$payment_method = $order->get_payment_method();

		$payaza_settings = get_option('woocommerce_' . $payment_method . '_settings');

		if (isset($payaza_settings['autocomplete_order']) && 'yes' === $payaza_settings['autocomplete_order']) {
			$autocomplete_order = true;
		}

		return $autocomplete_order;
	}
	public function get_logo_url()
	{



		$url = WC_HTTPS::force_https_url(plugins_url('assets/images/payaza.png', WC_PAYAZA_MAIN_FILE));


		return apply_filters('wc_payaza_gateway_icon_url', $url, $this->id);
	}
	/**
	 * Retrieve the payment channels configured for the gateway
	 *
	 * @since 5.7
	 * @param WC_Order $order Order object.
	 * @return array
	 */
	protected function get_gateway_payment_channels($order)
	{

		$payment_method = $order->get_payment_method();

		if ('payaza' === $payment_method) {
			return array();
		}

		$payment_channels = $this->get_option('payment_channels');

		if (empty($payment_channels)) {
			$payment_channels = array('card');
		}

		return $payment_channels;
	}
	private function get_payaza_transaction($payaza_txn_ref)
	{

		$payaza_url = 'https://cards-live.78financials.com/card_charge/transaction_status' . $payaza_txn_ref;

		$headers = array(
			'Authorization' => 'Bearer ' . $this->secret_key,
		);

		$args = array(
			'headers' => $headers,
			'timeout' => 60,
		);

		$request = wp_remote_get($payaza_url, $args);

		if (! is_wp_error($request) && 200 === wp_remote_retrieve_response_code($request)) {
			return json_decode(wp_remote_retrieve_body($request));
		}

		return false;
	}
}
