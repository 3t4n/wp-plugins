<?php
/**
 * Borica_Woo_Payment_Gateway Payment Gateway Class Doc Comment
 *
 * PHP version 8
 *
 * @category Payment Gateway
 * @package  Borica_Woo_Payment_Gateway
 * @author   Ilko Ivanov <ilko.iv@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.borica.bg/
 */

/**
 * Borica_Woo_Payment_Gateway Class Doc Comment
 *
 * Borica_Woo_Payment_Gateway Class, payment functions
 *
 * @author   Ilko Ivanov <ilko.iv@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.borica.bg/
 */
class Borica_Woo_Payment_Gateway extends WC_Payment_Gateway {

	/**
	 * BORICA Transaction Type: Authorization
	 *
	 * This constant represents the transaction type for authorization within the BORICA payment gateway system.
	 *
	 * The value `1` indicates an authorization transaction, where funds are reserved on the cardholder's account
	 * but not yet captured. This is typically used in scenarios where payment is confirmed but the final amount
	 * may change before the capture.
	 *
	 * @var int
	 */
	private const BORICA_TRTYPE_AUTHORIZATION = 1;

	/**
	 * BORICA Country Code
	 *
	 * This constant defines the country code used in transactions with the BORICA payment gateway.
	 *
	 * The value `'BG'` represents Bulgaria, which is the default country for transactions processed
	 * through BORICA. This code is used in various parts of the payment request to indicate the origin
	 * of the transaction.
	 *
	 * Usage:
	 * - This constant is included in the payment gateway parameters sent to BORICA to specify the
	 *   country where the transaction is initiated.
	 *
	 * @var string BORICA_COUNTRY
	 */
	private const BORICA_COUNTRY = 'BG';

	/**
	 * BORICA Addendum Fields
	 *
	 * This constant defines additional data fields to be included in the BORICA payment request.
	 *
	 * The value `'AD,TD'` represents specific addendum fields that provide extra transaction details
	 * or options. These fields can include additional data such as merchant details or transaction
	 * specifics required by BORICA for processing the payment.
	 *
	 * Usage:
	 * - This constant is used when constructing the payment request parameters to ensure that the necessary
	 *   addendum data is included in the transaction sent to BORICA.
	 *
	 * @var string BORICA_ADDENDUM
	 */
	private const BORICA_ADDENDUM = 'AD,TD';

	/**
	 * BORICA Language Code
	 *
	 * This constant defines the language code used in transactions with the BORICA payment gateway.
	 *
	 * The value `'BG'` represents Bulgarian, which is the default language for the user interface and
	 * communications in the BORICA payment process. This setting ensures that any messages, prompts,
	 * or instructions displayed to the user during the payment process are in Bulgarian.
	 *
	 * Usage:
	 * - This constant is included in the payment gateway parameters sent to BORICA to specify the
	 *   language used in the transaction and any associated user interactions.
	 *
	 * @var string BORICA_LANG
	 */
	private const BORICA_LANG = 'BG';

	/**
     * Instructions for the payment gateway.
     * This is a string containing instructions that are shown to the customer.
     *
     * @var string
     */
	public $instructions;

	/**
     * The status of the order after payment is processed.
     * This stores the status that an order should be set to after payment has been completed.
     *
     * @var string
     */
	public $order_status;

	/**
	 * Borica_Woo_Payment_Gateway Constructor
	 *
	 * Initializes the Borica payment gateway by setting up essential properties, configuration options, and hooks.
	 *
	 * This method is responsible for defining the gateway's basic settings such as the ID, title, description, and icon.
	 * It also initializes form fields and settings for the gateway, and sets up actions for processing options in the
	 * WooCommerce admin panel and handling the receipt page.
	 *
	 * Key initialization steps:
	 * - `$this->id`: Sets the unique identifier for the gateway.
	 * - `$this->method_title`: Defines the title displayed for the payment method in WooCommerce.
	 * - `$this->method_description`: Provides a description of the payment method.
	 * - `$this->icon`: Allows customization of the payment gateway icon via filters.
	 * - `$this->has_fields`: Specifies whether the payment gateway has custom input fields on the checkout page.
	 * - `$this->init_form_fields()` and `$this->init_settings()`: Initializes form fields and settings.
	 * - Test mode handling: If the gateway is in test mode, appends a "TEST MODE" indicator to the title.
	 * - `$this->title`: Sets the title displayed to customers at checkout, including test mode text if applicable.
	 * - `$this->description` and `$this->instructions`: Defines the description and instructions shown to customers.
	 * - `$this->order_status`: Sets the initial order status for orders processed by this gateway.
	 * - Hooks: Adds actions to handle updates to payment gateway settings and to display the receipt page and thankyou page.
	 */
	public function __construct() {
		$this->id                 = 'borica_woo_payment_gateway';
		$this->method_title       = __( 'BORICA', 'borica' );
		$this->method_description = __( 'BORICA Payments works by redirecting customers to BORICA payment page where they enter their card details. To use this payment option you need to have a virtual POS.', 'borica' );
		$this->icon               = apply_filters( 'woocommerce_custom_gateway_icon', '' );
		$this->has_fields         = false;
		$this->init_form_fields();
		$this->init_settings();
		$borica_testmode = (int) get_option( 'borica_testmode' );
		if ( 1 === $borica_testmode ) {
			$this->title = __( 'Payment by Credit/Debit Card', 'borica' ) . ' ' . __( '(TEST MODE)', 'borica' );
		} else {
			$this->title = __( 'Payment by Credit/Debit Card', 'borica' );
		}
		$this->description  = ' ';
		$this->instructions = $this->description;
		$this->order_status = 'pending';
		add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
		add_action( 'woocommerce_thankyou_' . $this->id, array( $this, 'thankyou_borica_page' ) );
		add_action( 'woocommerce_receipt_' . $this->id, array( $this, 'receipt_page' ) );
	}

	/**
	 * Determines if the BORICA Payment Gateway is available for use.
	 *
	 * This method checks several conditions to determine whether the BORICA payment gateway
	 * should be available as a payment option for the current transaction. If any of these
	 * conditions fail, the gateway is considered unavailable.
	 *
	 * Availability conditions include:
	 * - Gateway Enabled: The gateway must be enabled in the WooCommerce settings (`$this->enabled`).
	 * - Order Total: The order total must be within the acceptable range, not exceeding the maximum amount
	 *   configured for the gateway (`$this->max_amount`).
	 * - BORICA Status: The BORICA gateway status must be active (`borica_status` option must be `1`).
	 * - Supported Currencies: The currency used in the transaction must be either EUR or BGN.
	 * - Terminal ID (TID): A valid Terminal ID must be configured for the respective currency
	 *   (BGN or EUR) in the WooCommerce settings.
	 *
	 * If any of these conditions are not met, the method returns `false`, indicating that the payment
	 * gateway is not available. Otherwise, it returns `true`.
	 *
	 * @return bool True if the payment gateway is available, false otherwise.
	 */
	public function is_available() {
		if ( 'yes' !== $this->enabled ) {
			return false;
		}

		if ( WC()->cart && 0 < $this->get_order_total() && 0 < $this->max_amount && $this->max_amount < $this->get_order_total() ) {
			return false;
		}

		$borica_status = (int) get_option( 'borica_status' );
		if ( 1 !== $borica_status ) {
			return false;
		}

		$borica_currency_code = get_woocommerce_currency();
		if ( 'EUR' !== $borica_currency_code && 'BGN' !== $borica_currency_code ) {
			return false;
		}

		$borica_tid_bgn = (string) get_option( 'borica_tid_bgn' );
		$borica_tid_eur = (string) get_option( 'borica_tid_eur' );
		if ( '' === trim( $borica_tid_bgn ) && '' === trim( $borica_tid_eur ) ) {
			return false;
		}

		if ( '' === trim( $borica_tid_bgn ) && 'BGN' === $borica_currency_code ) {
			return false;
		}
		if ( '' === trim( $borica_tid_eur ) && 'EUR' === $borica_currency_code ) {
			return false;
		}

		return true;
	}

	/**
	 * Redirects to the BORICA Payment Gateway settings page in the WordPress admin panel.
	 *
	 * This method is responsible for redirecting the admin user to the BORICA payment gateway
	 * settings page within the WordPress admin interface. The redirection is handled via
	 * JavaScript, ensuring that when this method is called, the user is automatically taken
	 * to the BORICA options page.
	 *
	 * Key functionality:
	 * - Starts output buffering using `ob_start()`.
	 * - Outputs a JavaScript snippet that sets the `location` to the BORICA options page URL
	 *   (`/wp-admin/options-general.php?page=borica-options`).
	 * - Ends and flushes the output buffer with `ob_end_flush()`, which sends the script
	 *   to the browser to trigger the redirection.
	 *
	 * This method is typically called when the admin user attempts to access the settings
	 * for the BORICA payment gateway from within WooCommerce's payment gateways settings.
	 *
	 * @return void
	 */
	public function admin_options() {
		ob_start();
		?>
		<script>
			location = '/wp-admin/options-general.php?page=borica-options';
		</script>
		<?php
		ob_end_flush();
	}

	/**
	 * Displays the payment fields on the WooCommerce checkout page for the BORICA payment gateway.
	 *
	 * This method renders the necessary HTML elements that are displayed to customers during checkout
	 * when they select the BORICA payment gateway. It primarily handles the display of a description
	 * and additional hidden fields required by the BORICA gateway.
	 *
	 * Key functionality:
	 * - Displays the payment method description if available, using `wpautop` and `wptexturize`
	 *   to format the text, followed by `wp_kses_post()` to safely output allowed HTML.
	 * - Retrieves the `borica_direct` option, which determines if the payment is processed directly,
	 *   and includes it as a hidden input field, with the value escaped using `esc_attr()`.
	 * - Displays a panel with the BORICA branding, including an image of accepted cards and a title
	 *   indicating that the payment is processed by BORICA. The image source and title are both
	 *   properly escaped using `esc_url()` and `esc_attr()`.
	 *
	 * The method ensures that any necessary information and branding are presented to the customer
	 * in a clear and secure manner during the checkout process.
	 *
	 * @return void
	 */
	public function payment_fields() {
		$description = $this->get_description();
		if ( $description ) {
			echo wp_kses_post( wpautop( wptexturize( $description ) ) );
		}
		$borica_direct     = (int) get_option( 'borica_direct' );
		$borica_testmode   = (int) get_option( 'borica_testmode' );
		$borica_text_color = (string) get_option( 'borica_text_color' );
		?>
		<style>
		.borica_red {
			display: inline-block !important;
			background: linear-gradient(to left, red 0%, red 32%, <?php echo esc_html( $borica_text_color ); ?> 32%);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}
		</style>
		<input type="hidden" id="borica_direct" value="<?php echo esc_attr( $borica_direct ); ?>" >
		<input type="hidden" id="borica_testmode" value="<?php echo esc_attr( $borica_testmode ); ?>" >
		<input type="hidden" id="borica_btn_pay_text" value="<?php echo esc_attr( __( 'Payment', 'borica' ) ); ?>" >
		<div class="borica_panel">
			<img class="borica_cards" src="<?php echo esc_url( BORICA_IMAGES_URI ); ?>/borica_cards.png" title="<?php echo esc_attr( $this->title ); ?>">
			<h4><?php echo esc_html__( 'Processed by BORICA', 'borica' ); ?></h4>
		</div>
		<?php
	}

	/**
	 * Validates the payment fields during the checkout process.
	 *
	 * This method is intended to validate any custom payment fields added by the BORICA payment gateway
	 * during the checkout process. However, in its current implementation, it does not perform any validation
	 * and always returns `true`.
	 *
	 * Key functionality:
	 * - The method serves as a placeholder for potential future validations.
	 * - Always returns `true`, indicating that no validation errors are present.
	 *
	 * Usage:
	 * - This method is automatically called during the checkout process to validate the payment fields
	 *   associated with the BORICA gateway. Since it always returns `true`, it implies that the form
	 *   can proceed without any validation errors.
	 *
	 * Considerations:
	 * - If custom fields are added to the BORICA payment gateway in the future, this method can be
	 *   expanded to include necessary validation logic.
	 *
	 * @return bool Always returns `true` indicating successful validation.
	 */
	public function validate_fields() {
		return true;
	}

	/**
	 * Processes the payment for an order using the BORICA payment gateway.
	 *
	 * This method handles the payment processing workflow when a customer chooses to pay using
	 * the BORICA payment gateway. It updates the order status, reduces stock levels, empties the
	 * shopping cart, and generates a URL to redirect the customer to the payment page.
	 *
	 * Key functionality:
	 * - Retrieves the order object using the provided `$order_id`.
	 * - Updates the order status to 'pending' with a note stating 'Awaiting payment'.
	 * - Reduces the stock levels of the items in the order using `wc_reduce_stock_levels()`.
	 * - Empties the WooCommerce cart to prepare for the payment process.
	 * - Generates a receipt URL for the order, which includes the order ID and order key, allowing
	 *   the customer to be redirected to the BORICA payment page.
	 *
	 * Return:
	 * - Returns an array with the following keys:
	 *   - `'result' => 'success'`: Indicates that the payment processing was successful.
	 *   - `'redirect' => $receipt_url`: Contains the URL where the customer will be redirected to complete the payment.
	 *
	 * @param int $order_id The ID of the order being processed.
	 *
	 * @return array An associative array containing the result status and the redirect URL.
	 */
	public function process_payment( $order_id ) {
		$order = wc_get_order( $order_id );
		$order->update_status( 'pending', __( 'Awaiting payment', 'borica' ) );
		wc_reduce_stock_levels( $order_id );
		WC()->cart->empty_cart();
		$receipt_url = add_query_arg( 'order-pay', $order->get_id(), add_query_arg( 'key', $order->get_order_key(), wc_get_endpoint_url( 'order-pay', $order->get_id(), wc_get_checkout_url() ) ) );

		return array(
			'result'   => 'success',
			'redirect' => $receipt_url,
		);
	}

	/**
	 * Displays the "Thank You" page with billing and optional shipping addresses for an order.
	 *
	 * This method is called on the "Thank You" page to show the billing and shipping addresses
	 * associated with a given WooCommerce order. It retrieves the order details using the provided
	 * order ID and formats them for display in a flexbox layout.
	 *
	 * @param int $order_id The ID of the order to retrieve billing and shipping information for.
	 *
	 * @return void
	 */
	public function thankyou_borica_page($order_id) {
		$order = wc_get_order($order_id);
		if (!$order) return;
		$billing_address = $order->get_formatted_billing_address();
		$shipping_address = $order->get_formatted_shipping_address();
		echo '<section style="display:flex;justify-content:space-between;clear:both;">';
		echo '<div>';
		echo '<h2>' . esc_html__( 'Billing Address', 'woocommerce' ) . '</h2>';
		echo '<p>' . $billing_address . '</p>';
		echo '</div>';
		echo '<div>';
		if ($shipping_address) {
			echo '<h2>' . esc_html__( 'Shipping Address', 'woocommerce' ) . '</h2>';
			echo '<p>' . $shipping_address . '</p>';
		} else {
			echo '<p>' . esc_html__( 'No shipping address available.', 'woocommerce' ) . '</p>';
		}
		echo '</div>';
		echo '</div>';
	}

	/**
	 * Generates the payment receipt page for the BORICA payment gateway.
	 *
	 * This method creates and displays the HTML content necessary for the payment receipt page,
	 * where customers are prompted to complete their payment through the BORICA payment gateway.
	 *
	 * Key functionality:
	 * - Retrieves the order details using the provided `$order_id`.
	 * - Determines the appropriate BORICA gateway URL based on whether test mode is enabled.
	 * - Retrieves and processes the cardholder's first and last names, converting them to uppercase and
	 *   transliterating them to ensure they are in the correct format for the BORICA gateway.
	 * - Outputs hidden fields and a form that submits the payment details to the BORICA gateway.
	 * - Includes a button for customers to submit the payment and a cancel button to restore the cart
	 *   if they choose not to proceed with the payment.
	 *
	 * Security Considerations:
	 * - All dynamic content, such as cardholder information, order ID, and BORICA gateway URL, is properly
	 *   escaped using appropriate WordPress escaping functions like `esc_attr()` and `esc_url()` to
	 *   prevent security vulnerabilities such as XSS (Cross-Site Scripting).
	 *
	 * @param int $order_id The ID of the order for which the receipt page is generated.
	 *
	 * @return void
	 */
	public function receipt_page( $order_id ) {
		if ( ! get_transient( 'borica_receipt_page_' . $order_id ) ) {
			set_transient( 'borica_receipt_page_' . $order_id, true, 3600 );

			$order = wc_get_order( $order_id );

			$borica_testmode = (int) get_option( 'borica_testmode' );
			if ( 1 === $borica_testmode ) {
				$borica_url   = 'https://3dsgate-dev.borica.bg/cgi-bin/cgi_link';
				$borica_title = __( 'Payment by Credit/Debit Card', 'borica' ) . '&nbsp;<span style="color:red;">' . __( '(TEST MODE)', 'borica' ) . '</span>';
			} else {
				$borica_url   = 'https://3dsgate.borica.bg/cgi-bin/cgi_link';
				$borica_title = __( 'Payment by Credit/Debit Card', 'borica' );
			}
			$cardholder_email_address        = $order->get_billing_email();
			$cardholder_home_phone           = $order->get_billing_phone();
			$borica_firstname                = $order->get_billing_first_name();
			$transliterated_borica_firstname = $this->transliterate( $borica_firstname );
			$cleaned_borica_firstname        = preg_replace( '/[^a-zA-Z\-\.\ ]/', '', $transliterated_borica_firstname );
			$trimmed_borica_firstname        = mb_substr( $cleaned_borica_firstname, 0, 22 );
			$uppercase_borica_firstname      = strtoupper( $trimmed_borica_firstname );
			$borica_lastname                 = $order->get_billing_last_name();
			$transliterated_borica_lastname  = $this->transliterate( $borica_lastname );
			$cleaned_borica_lastname         = preg_replace( '/[^a-zA-Z\-\.\ ]/', '', $transliterated_borica_lastname );
			$trimmed_borica_lastname         = mb_substr( $cleaned_borica_lastname, 0, 22 );
			$uppercase_borica_lastname       = strtoupper( $trimmed_borica_lastname );
			$cardholder_name                 = $uppercase_borica_firstname . ' ' . $uppercase_borica_lastname;
			$borica_direct                   = (int) get_option( 'borica_direct' );
			$borica_allowed_html             = array(
				'span' => array(
					'style' => array(),
				),
				'div'  => array(
					'class' => array(),
				),
				'a'    => array(
					'href'  => array(),
					'title' => array(),
				),
			);

			echo '<div id="borica_overlay" class="borica_overlay"></div>';
			echo '<input type="hidden" id="borica_direct" value="' . esc_attr( $borica_direct ) . '" >';
			echo '<p>' . esc_html( __( 'Thank you for your order, please click the button below to pay with', 'borica' ) ) . ' ' . wp_kses( $borica_title, $borica_allowed_html ) . '</p>';
			echo '<input type="hidden" id="CARDHOLDER_EMAIL_ADDRESS" value="' . esc_attr( $cardholder_email_address ) . '" />';
			echo '<input type="hidden" id="CARDHOLDER_HOME_PHONE" value="' . esc_attr( $cardholder_home_phone ) . '" />';
			echo '<input type="hidden" id="CARDHOLDER_NAME" value="' . esc_attr( $cardholder_name ) . '" />';
			echo '<input type="hidden" id="ORDER_ID" value="' . esc_attr( $order_id ) . '" />';
			echo '<form action="' . esc_url( $borica_url ) . '" method="POST" id="borica_payment_form">';

			$args = $this->get_gateway_args( $order );

			foreach ( $args as $key => $value ) {
				echo '<input type="hidden" name="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" value="' . esc_attr( $value ) . '" />';
			}
			echo '<input type="submit" class="button alt" id="submit_borica_payment_form" value="' . esc_attr( __( 'Payment', 'borica' ) ) . '" />';
			echo '<a class="button cancel" href="' . esc_url( $order->get_cancel_order_url() ) . '">' . esc_html( __( 'Cancel order & restore cart', 'borica' ) ) . '</a>';
			echo '</form>';
		}
	}

	/**
	 * Constructs the arguments for the BORICA payment gateway request.
	 *
	 * This method generates the array of parameters required by the BORICA payment gateway to process a payment.
	 * It gathers information from the order and various settings, formats it according to BORICA's requirements,
	 * and returns the resulting array of arguments.
	 *
	 * Key functionality:
	 * - **Order ID Handling:** The order ID is adjusted to meet BORICA's format requirements, ensuring it is either
	 *   truncated or padded to 6 digits.
	 * - **Currency Handling:** The appropriate terminal and merchant IDs are selected based on the currency of the transaction (BGN or EUR).
	 * - **Amount Formatting:** The order total is formatted to two decimal places as required by BORICA.
	 * - **Date and Time:** The current timestamp and GMT offset are calculated for inclusion in the payment request.
	 * - **Unique Identifiers:** Generates a unique nonce and timestamp to ensure the security of the transaction.
	 * - **Dynamic Description:** Constructs a description of the order that includes the site URL.
	 * - **Security Considerations:** Proper escaping and sanitization should be applied where necessary to ensure the security of the data being sent to BORICA.
	 *
	 * Filters:
	 * - `woocommerce_custom_gateway_args`: Allows customization of the arguments array before it is returned.
	 *
	 * @param WC_Order $order The WooCommerce order object for which the payment is being processed.
	 *
	 * @return array The array of arguments to be sent to the BORICA payment gateway.
	 */
	public function get_gateway_args( $order ) {
		$order_id              = $order->get_id();
		$current_currency_code = get_woocommerce_currency();
		$borica_terminal       = '';
		$borica_merchant       = '';
		if ( 'BGN' === $current_currency_code ) {
			$borica_terminal = (string) get_option( 'borica_tid_bgn' );
			$borica_merchant = (string) get_option( 'borica_mid_bgn' );
		}
		if ( 'EUR' === $current_currency_code ) {
			$borica_terminal = (string) get_option( 'borica_tid_eur' );
			$borica_merchant = (string) get_option( 'borica_mid_eur' );
		}
		$borica_trtype   = self::BORICA_TRTYPE_AUTHORIZATION;
		$borica_amount   = number_format( (float) $order->get_total(), 2, '.', '' );
		$borica_currency = $current_currency_code;
		if ( strlen( $order_id ) >= 6 ) {
			$borica_order = substr( $order_id, -6 );
		} else {
			$borica_order = str_pad( $order_id, 6, '0', STR_PAD_LEFT );
		}
		$base_url                    = get_site_url();
		$borica_desc                 = __( 'Order of goods from', 'borica' ) . ' ' . $base_url;
		$borica_merch_name           = (string) get_option( 'borica_mname' );
		$borica_email                = (string) get_option( 'borica_email' );
		$borica_country              = self::BORICA_COUNTRY;
		$original_date               = $order->get_date_created();
		$date                        = new DateTime( $original_date );
		$borica_merch_gmt            =
			isset( explode( ':', $date->format( 'P' ) )[0] ) ?
			explode( ':', $date->format( 'P' ) )[0] :
			'+03';
		$borica_addendum             = self::BORICA_ADDENDUM;
		$borica_ad_cust_bor_order_id = $borica_order . $order_id;
		$borica_timestamp            = gmdate( 'YmdHis' );
		$borica_nonce                = strtoupper( bin2hex( random_bytes( 16 ) ) );
		$borica_lang                 = self::BORICA_LANG;

		$args = array(
			'TERMINAL'             => $borica_terminal,
			'TRTYPE'               => $borica_trtype,
			'AMOUNT'               => $borica_amount,
			'CURRENCY'             => $borica_currency,
			'ORDER'                => $borica_order,
			'DESC'                 => $borica_desc,
			'MERCHANT'             => $borica_merchant,
			'MERCH_NAME'           => $borica_merch_name,
			'MERCH_URL'            => $base_url,
			'EMAIL'                => $borica_email,
			'COUNTRY'              => $borica_country,
			'MERCH_GMT'            => $borica_merch_gmt,
			'ADDENDUM'             => $borica_addendum,
			'AD.CUST_BOR_ORDER_ID' => $borica_ad_cust_bor_order_id,
			'TIMESTAMP'            => $borica_timestamp,
			'NONCE'                => $borica_nonce,
			'LANG'                 => $borica_lang,
			'M_INFO'               => '',
			'P_SIGN'               => '',
		);

		return apply_filters( 'woocommerce_custom_gateway_args', $args, $order );
	}

	/**
	 * Transliterates Cyrillic characters to their Latin equivalents.
	 *
	 * This method takes a string containing Cyrillic characters and converts it to a Latin alphabet
	 * representation. This is often necessary for compatibility with systems that do not support
	 * non-Latin characters, such as certain payment gateways or databases.
	 *
	 * Key functionality:
	 * - **Character Mapping:** The method uses a predefined mapping array `$translit` that pairs Cyrillic
	 *   characters with their Latin equivalents. Both uppercase and lowercase letters are included.
	 * - **String Replacement:** The `strtr()` function is used to replace each Cyrillic character in the input
	 *   string with its corresponding Latin character, as defined in the `$translit` array.
	 * - **Supports Bulgarian Cyrillic:** The transliteration covers Bulgarian Cyrillic characters, which are
	 *   commonly used in the context of Bulgarian names and addresses.
	 *
	 * Usage:
	 * - This method is typically used when preparing data for systems that require Latin characters, ensuring
	 *   that names, addresses, and other text fields are correctly formatted.
	 *
	 * Example:
	 * - Input: `"Примерен текст"`
	 * - Output: `"Primeren tekst"`
	 *
	 * @param string $input The string containing Cyrillic characters to be transliterated.
	 *
	 * @return string The transliterated string with Latin characters.
	 */
	public function transliterate( string $input ): string {
		$translit = array(
			'а' => 'a',
			'б' => 'b',
			'в' => 'v',
			'г' => 'g',
			'д' => 'd',
			'е' => 'e',
			'ж' => 'zh',
			'з' => 'z',
			'и' => 'i',
			'й' => 'y',
			'к' => 'k',
			'л' => 'l',
			'м' => 'm',
			'н' => 'n',
			'о' => 'o',
			'п' => 'p',
			'р' => 'r',
			'с' => 's',
			'т' => 't',
			'у' => 'u',
			'ф' => 'f',
			'х' => 'h',
			'ц' => 'ts',
			'ч' => 'ch',
			'ш' => 'sh',
			'щ' => 'sht',
			'ъ' => 'a',
			'ь' => 'y',
			'ю' => 'yu',
			'я' => 'ya',
			'А' => 'A',
			'Б' => 'B',
			'В' => 'V',
			'Г' => 'G',
			'Д' => 'D',
			'Е' => 'E',
			'Ж' => 'Zh',
			'З' => 'Z',
			'И' => 'I',
			'Й' => 'Y',
			'К' => 'K',
			'Л' => 'L',
			'М' => 'M',
			'Н' => 'N',
			'О' => 'O',
			'П' => 'P',
			'Р' => 'R',
			'С' => 'S',
			'Т' => 'T',
			'У' => 'U',
			'Ф' => 'F',
			'Х' => 'H',
			'Ц' => 'Ts',
			'Ч' => 'Ch',
			'Ш' => 'Sh',
			'Щ' => 'Sht',
			'Ъ' => 'A',
			'Ь' => 'Y',
			'Ю' => 'Yu',
			'Я' => 'Ya',
		);
		return strtr( $input, $translit );
	}
}
