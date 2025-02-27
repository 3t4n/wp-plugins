<?php
/**
 * Adds Borica Payments plugin core functions.
 *
 * This file contains the Borica Payments plugin core functions.
 *
 * @package Borica_Woo_Payment_Gateway
 */

use Automattic\WooCommerce\Internal\DataStores\Orders\CustomOrdersTableController;

require_once BORICA_INCLUDES_DIR . '/class-borica-helper.php';
require_once BORICA_INCLUDES_DIR . '/class-borica-logger.php';

/**
 * Adds the HTTP Strict Transport Security (HSTS) header to enforce HTTPS connections.
 *
 * This function checks if the current request is being served over HTTPS. If it is,
 * the function sends the Strict-Transport-Security (HSTS) header with a max-age of
 * one year (31536000 seconds). The 'includeSubDomains' directive applies the policy
 * to all subdomains, and the 'preload' directive allows the domain to be added to the
 * browser's HSTS preload list. HSTS helps protect against protocol downgrade attacks and
 * cookie hijacking.
 *
 * The header will only be sent for secure HTTPS connections to prevent it from being
 * sent over unsecured HTTP requests.
 *
 * @return void
 */
function borica_add_hsts_header() {
	if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
		header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
	}
}

/**
 * Loads the text domain for Borica Payments plugin.
 *
 * This function loads the translation file (.mo) for the specified locale.
 * It ensures that the plugin's text domain is loaded, allowing for localization.
 *
 * The locale is determined by the `determine_locale()` function and can be filtered
 * by the `plugin_locale` filter. The corresponding `.mo` file is then loaded from
 * the `/languages/` directory within the plugin's directory.
 *
 * @return void
 */
function borica_load_textdomain() {
	$locale = apply_filters( 'plugin_locale', determine_locale(), 'borica' );
	$mofile = "borica-{$locale}.mo";
	load_textdomain( 'borica', BORICA_PLUGIN_DIR . '/languages/' . $mofile );
}

/**
 * Adds allowed origins for Borica Payments.
 *
 * This function adds the test and production URLs to the list of allowed origins.
 *
 * @param array $origins An array of existing allowed origins.
 * @return array The modified array of allowed origins.
 */
function borica_add_allowed_origins( $origins ) {
	$origins[] = BORICA_TEST_URL;
	$origins[] = BORICA_PRODUCTION_URL;
	return $origins;
}

/**
 * Loads the Borica payment gateway class for WooCommerce.
 *
 * This function checks if the `WC_Payment_Gateway` class exists, which indicates that
 * WooCommerce is active. If WooCommerce is active, the Borica payment gateway class
 * is loaded from the includes directory.
 *
 * @return void
 */
function borica_load_class_plugin() {
	if ( ! class_exists( 'WC_Payment_Gateway' ) ) {
		return;
	}
	include BORICA_INCLUDES_DIR . '/class-borica-woo-payment-gateway.php';
}

/**
 * Adds the Borica payment gateway to the list of available WooCommerce gateways.
 *
 * This function appends the `Borica_Woo_Payment_Gateway` class to the array of payment gateways
 * that WooCommerce recognizes, making it available as a payment option in the checkout process.
 *
 * @param array $gateways An array of existing payment gateway class names.
 * @return array The modified array of payment gateway class names including Borica.
 */
function borica_add_gateway( $gateways ) {
	$gateways[] = 'Borica_Woo_Payment_Gateway';
	return $gateways;
}

/**
 * Adds a BORICA payment meta box to the WooCommerce order screen.
 *
 * This function adds a meta box to the WooCommerce order edit screen for displaying
 * information related to BORICA payment by credit or debit card. The function determines
 * the correct page ID based on whether the custom orders table is enabled or not.
 *
 * @return void
 */
function borica_add_meta_box() {
	$borica_enable_container = wc_get_container()->get( CustomOrdersTableController::class )->custom_orders_table_usage_is_enabled();
	if ( $borica_enable_container ) {
		$borica_page_id = wc_get_page_screen_id( 'shop-order' );
	} else {
		$borica_page_id = 'shop_order';
	}
	add_meta_box(
		'borica_order_postbox',
		__( 'BORICA - Payment by Credit/Debit Card', 'borica' ),
		'display_borica_order_postbox',
		$borica_page_id,
		'advanced',
		'default'
	);
}

/**
 * Displays the BORICA payment information meta box on the WooCommerce order edit page.
 *
 * This function outputs a meta box with detailed information about a specific BORICA
 * transaction associated with a WooCommerce order. It handles the retrieval of BORICA
 * transaction details such as the order total, transaction date, action status, and
 * other relevant payment information. The meta box also provides options for checking
 * the transaction status and submitting a payment cancellation request.
 *
 * @param WP_Post|WC_Order $post_or_order_object The current post object or WooCommerce order object.
 * @return void
 */
function display_borica_order_postbox( $post_or_order_object ) {
	if ( $post_or_order_object instanceof WP_Post ) {
		$order = wc_get_order( $post_or_order_object->ID );
	} else {
		$order = $post_or_order_object;
	}

	if ( ! $order ) {
		return;
	}

	$order_id      = $order->get_id();
	$borica_helper = new Borica_Helper();
	$order_row     = $borica_helper->get_borica_order_by_id( $order_id );

	if ( count( $order_row ) === 0 ) {
		return;
	}

	$borica_order_total     = $order->get_total();
	$borica_currency        = $order->get_currency();
	$borica_currency_symbol = get_woocommerce_currency_symbol( $borica_currency );
	$created_at             = $order_row['created_at'];
	$date_transaction       = new DateTime( $created_at );
	$borica_timezone        = (int) $order_row['merch_gmt'];
	$merchant_gmt_abs       = abs( $borica_timezone );
	if ( $borica_timezone >= 0 ) {
		$date_transaction->add( new DateInterval( 'PT' . $merchant_gmt_abs . 'H' ) );
	} else {
		$date_transaction->sub( new DateInterval( 'PT' . $merchant_gmt_abs . 'H' ) );
	}
	$borica_order_date = $date_transaction->format( 'd.m.Y H:i:s' );
	$borica_action     = (int) $order_row['action'];
	switch ( $borica_action ) {
		case 0:
			$borica_order_action = '<span style="color:green;">' . __( 'Successfully completed transaction', 'borica' ) . '</span>';
			break;
		case 1:
			$borica_order_action = '<span style="color:red;">' . __( 'Duplicate transaction', 'borica' ) . '</span>';
			break;
		case 2:
			$borica_order_action = '<span style="color:red;">' . __( 'Transaction declined', 'borica' ) . '</span>';
			break;
		case 3:
			$borica_order_action = '<span style="color:red;">' . __( 'Error processing transaction', 'borica' ) . '</span>';
			break;
		case 7:
			$borica_order_action = '<span style="color:red;">' . __( 'Duplicate transaction on failed authentication', 'borica' ) . '</span>';
			break;
		case 21:
			$borica_order_action = '<span style="color:red;">' . __( 'Soft Decline', 'borica' ) . '</span>';
			break;
		case 999:
			$borica_order_action = '<span style="color:red;">' . __( 'Transaction not completed', 'borica' ) . '</span>';
			break;
		default:
			$borica_order_action = '<span style="color:red;">' . __( 'Transaction not completed', 'borica' ) . '</span>';
	}
	$borica_rc       = $order_row['rc'];
	$borica_status   = $order_row['status'];
	$borica_approval = $order_row['approval'];
	if ( strlen( $order_id ) >= 6 ) {
		$borica_order          = substr( $order_id, -6 );
		$borica_order_internal = $borica_order . $order_id;
	} else {
		$borica_order          = str_pad( $order_id, 6, '0', STR_PAD_LEFT );
		$borica_order_internal = $borica_order . $order_id;
	}
	$borica_rrn            = $order_row['rrn'];
	$borica_int_ref        = $order_row['int_ref'];
	$borica_request_cancel = (float) $order_row['cancel_amount'];
	$borica_rest           = $borica_order_total - $borica_request_cancel;
	switch ( $order_row['request_cancel'] ) {
		case '00':
			if ( 0 === $borica_rest ) {
				$borica_request_cancel =
					'<span style="color:green;">' .
					__( 'Successful cancellation of payment (or refund).', 'borica' ) .
					' ' .
					__( 'Net amount paid by card ', 'borica' ) .
					number_format( $borica_rest, 2, '.', '' ) .
					' ' .
					$borica_currency_symbol .
					'</span>';
			} else {
				$borica_request_cancel =
					'<span style="color:green;">' .
					__( 'Amount successfully canceled ', 'borica' ) .
					number_format( $borica_rest, 2, '.', '' ) .
					' ' .
					$borica_currency_symbol .
					' ' .
					__( 'Net amount paid by card ', 'borica' ) .
					number_format( $borica_request_cancel, 2, '.', '' ) .
					' ' .
					$borica_currency_symbol .
					'</span>';
			}
			break;
		case '11':
			$borica_request_cancel =
				'<span style="color:red;">' .
				__( 'Payment cancellation request sent. The request has been rejected.', 'borica' ) .
				' ' .
				__( 'The request was to cancel the amount of: ', 'borica' ) .
				number_format( $borica_rest, 2, '.', '' ) .
				'. ' .
				__( 'In the event of an unsuccessful cancellation, the merchant may contact the servicing financial institution.', 'borica' ) .
				'</span>';
			break;
		case '999':
			$borica_request_cancel =
				'<span>' .
				__( 'No Request for Reversal Payment has been sent.', 'borica' ) .
				'</span>';
			break;
	}

	$current_date_check = date( 'd.m.Y H:i:s', strtotime( '-' . BORICA_CHECK_PAYMENT_STATUS_TIME . ' hours' ) );
	if ( new DateTime( $created_at ) > new DateTime( $current_date_check ) ) {
		$is_bcps = 1;
	} else {
		$is_bcps = 0;
	}

	$current_date_drop = date( 'd.m.Y H:i:s', strtotime( '-' . BORICA_DROP_PAYMENT_TIME . ' hours' ) );
	if ( ( new DateTime( $created_at ) > new DateTime( $current_date_drop ) ) &&
		'00' === $borica_rc &&
		0 === $borica_action &&
		'999' === $order_row['request_cancel']
	) {
		$is_bdp = 1;
	} else {
		$is_bdp = 0;
	}

	$borica_testmode = (int) get_option( 'borica_testmode' );
	if ( 1 === $borica_testmode ) {
		$borica_url = 'https://3dsgate-dev.borica.bg/cgi-bin/cgi_link';
	} else {
		$borica_url = 'https://3dsgate.borica.bg/cgi-bin/cgi_link';
	}

	$borica_terminal = '';
	$borica_merchant = '';
	if ( 'BGN' === $borica_currency ) {
		$borica_terminal = (string) get_option( 'borica_tid_bgn' );
		$borica_merchant = (string) get_option( 'borica_mid_bgn' );
	}
	if ( 'EUR' === $borica_currency ) {
		$borica_terminal = (string) get_option( 'borica_tid_eur' );
		$borica_merchant = (string) get_option( 'borica_mid_eur' );
	}
	if ( '999' === $order_row['request_cancel'] ) {
		$borica_tran_trtype = BORICA_TRTYPE_AUTHORIZATION;
	} else {
		$borica_tran_trtype = BORICA_TRTYPE_DROP_STATUS;
	}
	$borica_nonce        = $order_row['nonce'];
	$borica_increment_id = $order_row['increment_id'];
	$base_url            = get_site_url();
	$borica_mname        = (string) get_option( 'borica_mname' );
	$borica_email        = (string) get_option( 'borica_email' );
	$borica_timestamp    = gmdate( 'YmdHis' );

	$borica_allowed_html = array(
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

	if ( count( $order_row ) > 0 ) {
		ob_start();
		?>
		<input type="hidden" id="is_bcps" value="<?php echo esc_attr( $is_bcps ); ?>" >
		<input type="hidden" id="is_bdp" value="<?php echo esc_attr( $is_bdp ); ?>" >
		<input type="hidden" id="borica_order" value="<?php echo esc_attr( $borica_order ); ?>" >
		<input type="hidden" id="boricaOrderTotal" value="<?php echo esc_attr( $borica_order_total ); ?>" >
		<input type="hidden" id="boricaUrl" value="<?php echo esc_attr( $borica_url ); ?>" >
		<input type="hidden" id="boricaTerminal" value="<?php echo esc_attr( $borica_terminal ); ?>" >
		<input type="hidden" id="boricaCheckPaymentTrtype" value="<?php echo esc_attr( BORICA_TRTYPE_CHECK_STATUS ); ?>" >
		<input type="hidden" id="boricaTranTrtype" value="<?php echo esc_attr( $borica_tran_trtype ); ?>" >
		<input type="hidden" id="boricaNonce" value="<?php echo esc_attr( $borica_nonce ); ?>" >
		<input type="hidden" id="boricaCurrency" value="<?php echo esc_attr( $borica_currency ); ?>" >
		<input type="hidden" id="boricaAction" value="<?php echo esc_attr( $borica_action ); ?>" >
		<input type="hidden" id="boricaIncrementId" value="<?php echo esc_attr( $borica_increment_id ); ?>" >
		<input type="hidden" id="text_enabled" value="<?php echo esc_attr( __( 'Yes', 'borica' ) ); ?>" >
		<input type="hidden" id="text_disabled" value="<?php echo esc_attr( __( 'No', 'borica' ) ); ?>" >
		<input type="hidden" id="info_title_alert" value="<?php echo esc_attr( __( 'Caution', 'borica' ) ); ?>" >
		<input type="hidden" id="info_text_alert" value="<?php echo esc_attr( __( 'Do you confirm sending a Payment Cancellation request?', 'borica' ) ); ?>" >
		<input type="hidden" id="boricaDropPaymentTrtype" value="<?php echo esc_attr( BORICA_TRTYPE_DROP_STATUS ); ?>" >
		<input type="hidden" id="info_desc" value="<?php echo esc_attr( __( 'Order of goods from', 'borica' ) ); ?>" >
		<input type="hidden" id="baseUrl" value="<?php echo esc_attr( $base_url ); ?>" >
		<input type="hidden" id="boricaMerchant" value="<?php echo esc_attr( $borica_merchant ); ?>" >
		<input type="hidden" id="boricaMname" value="<?php echo esc_attr( $borica_mname ); ?>" >
		<input type="hidden" id="boricaEmail" value="<?php echo esc_attr( $borica_email ); ?>" >
		<input type="hidden" id="boricaCountry" value="<?php echo esc_attr( BORICA_COUNTRY ); ?>" >
		<input type="hidden" id="boricaTimezone" value="<?php echo esc_attr( $borica_timezone ); ?>" >
		<input type="hidden" id="boricaLang" value="<?php echo esc_attr( BORICA_LANG ); ?>" >
		<input type="hidden" id="boricaAddendum" value="<?php echo esc_attr( BORICA_ADDENDUM ); ?>" >
		<input type="hidden" id="boricaTimestamp" value="<?php echo esc_attr( $borica_timestamp ); ?>" >
		<input type="hidden" id="info_title_info" value="<?php echo esc_attr( __( 'Message', 'borica' ) ); ?>" >
		<input type="hidden" id="info_text_info" value="<?php echo esc_attr( __( 'You cannot cancel a payment for an amount greater than the total amount of the order!', 'borica' ) ); ?>" >
		<div class="borica_container">
			<div class="borica_row">
				<div class="borica_panel">
					<div class="borica_panel_heading">
						<?php echo esc_html( __( 'Information on payment of the order by Credit/Debit card through Borika', 'borica' ) ); ?>
					</div>
					<div class="borica_panel_body">
						<table class="borica_table">
							<tbody>
								<tr>
									<td style="width: 50%;"><?php echo esc_html( __( 'Order ID :', 'borica' ) ); ?></td>
									<td style="width: 50%;"><?php echo esc_html( $order_id ); ?></td>
								</tr>
								<tr>
									<td style="width: 50%;"><?php echo esc_html( __( 'Total amount of the order :', 'borica' ) ); ?></td>
									<td style="width: 50%;"><?php echo esc_html( $borica_order_total ); ?>  <?php echo esc_html( $borica_currency_symbol ); ?></td>
								</tr>
								<tr>
									<td style="width: 50%;"><?php echo esc_html( __( 'Date of transaction :', 'borica' ) ); ?></td>
									<td style="width: 50%;"><?php echo esc_html( $borica_order_date ); ?></td>
								</tr>
								<tr>
									<td style="width: 50%;"><?php echo esc_html( __( 'Action :', 'borica' ) ); ?></td>
									<td style="width: 50%;"><div id="boricaOrderAction"><?php echo wp_kses( $borica_order_action, $borica_allowed_html ); ?></div></td>
								</tr>
								<tr>
									<td style="width: 50%;"><?php echo esc_html( __( 'Return code :', 'borica' ) ); ?></td>
									<td style="width: 50%;"><div id="boricaRc"><?php echo esc_html( $borica_rc ); ?></div></td>
								</tr>
								<tr>
									<td style="width: 50%;"><?php echo esc_html( __( 'Status :', 'borica' ) ); ?></td>
									<td style="width: 50%;"><div id="boricaStatus"><?php echo esc_html( $borica_status ); ?></div></td>
								</tr>
								<tr>
									<td style="width: 50%;"><?php echo esc_html( __( 'Authorization code :', 'borica' ) ); ?></td>
									<td style="width: 50%;"><div id="boricaApproval"><?php echo esc_html( $borica_approval ); ?></div></td>
								</tr>
								<tr>
									<td style="width: 50%;"><?php echo esc_html( __( 'Internal number (ORDER) :', 'borica' ) ); ?></td>
									<td style="width: 50%;"><div id="boricaOrderInternal"><?php echo esc_html( $borica_order_internal ); ?></div></td>
								</tr>
								<tr>
									<td style="width: 50%;"><?php echo esc_html( __( 'Reference (RRN) :', 'borica' ) ); ?></td>
									<td style="width: 50%;"><div id="boricaRrn"><?php echo esc_html( $borica_rrn ); ?></div></td>
								</tr>
								<tr>
									<td style="width: 50%;"><?php echo esc_html( __( 'Internal reference :', 'borica' ) ); ?></td>
									<td style="width: 50%;"><div id="boricaIntRef"><?php echo esc_html( $borica_int_ref ); ?></div></td>
								</tr>
								<tr>
									<td style="width: 50%;"><?php echo esc_html( __( 'Cancellation of payment :', 'borica' ) ); ?></td>
									<td style="width: 50%;"><div id="boricaRequestCancel"><?php echo wp_kses( $borica_request_cancel, $borica_allowed_html ); ?></div></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="borica_panel_footer">
						<button id="borica_btn_check_payment" class="button-secondary"><?php echo esc_html( __( 'Check for transaction status', 'borica' ) ); ?></button>
					</div>
				</div>
				
				<div class="borica_panel">
					<div class="borica_panel_heading">
						<?php echo esc_html( __( 'Payment Cancellation Request', 'borica' ) ); ?>
					</div>
					<div class="borica_panel_body">
						<div class="borica_form_group">
							<label class="borica_form_controll" for="current_amount"><?php echo esc_html( __( 'Amount of the Reversal Payment request', 'borica' ) ); ?></label>
							<div class="borica_form_controll full">
								<input type="number" id="current_amount" value="<?php echo esc_html( $borica_order_total ); ?>" class="form-control" />
								<div class="borica_text_small"><?php echo esc_html( __( 'You can enter an amount less than or equal to the total amount of the order. You can use the button to the right of the input field to load directly the total amount of the order.', 'borica' ) ); ?></div>
							</div>
							<div class="borica_form_controll">
								<button id="borica_btn_default_amount" class="button-secondary"><?php echo esc_html( __( 'Load the full amount', 'borica' ) ); ?></button>
							</div>
						</div>
					</div>
					<div class="borica_panel_footer">
						<button id="borica_btn_cancell_payment" class="button-secondary"><?php echo esc_html( __( 'Refund', 'borica' ) ); ?></button>
					</div>
				</div>
			</div>
		</div>
		<?php
		ob_end_flush();
	} else {
		echo esc_html( __( 'No payment was made with BORICA - Payment by Credit/Debit Card', 'borica' ) );
	}
}

/**
 * Enqueues BORICA-specific styles and scripts on WooCommerce checkout and order pay pages.
 *
 * This function checks if the current page is the WooCommerce checkout page or the order payment page.
 * If it is, it enqueues the necessary CSS and JavaScript files specific to BORICA's payment processing.
 * Additionally, it localizes the JavaScript files to pass the necessary data, such as AJAX URLs and nonces.
 *
 * @return void
 */
function borica_add_meta() {
	if ( is_checkout() ) {
		wp_enqueue_style( 'borica_checkout_styles', BORICA_CSS_URI . '/borica_checkout.css', array(), BORICA_MOD_VERSION, 'all' );
		wp_enqueue_script( 'borica_checkout_js', BORICA_JS_URI . '/borica_checkout.js', array( 'jquery' ), BORICA_MOD_VERSION, true );
		wp_localize_script(
			'borica_checkout_js',
			'borica_checkout_js',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'nonce'    => wp_create_nonce( 'borica_nonce' ),
			)
		);
	}
	if ( is_wc_endpoint_url( 'order-pay' ) ) {
		wp_enqueue_style( 'borica_pay_styles', BORICA_CSS_URI . '/borica_pay.css', array(), BORICA_MOD_VERSION, 'all' );
		wp_enqueue_script( 'borica_pay_js', BORICA_JS_URI . '/borica_pay.js', array( 'jquery' ), BORICA_MOD_VERSION, true );
		wp_localize_script(
			'borica_pay_js',
			'borica_pay_js',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'nonce'    => wp_create_nonce( 'borica_nonce' ),
			)
		);
	}
}

/**
 * Enqueues BORICA-specific styles and scripts for the WordPress admin area.
 *
 * This function checks the current admin screen and enqueues the appropriate CSS and JavaScript files
 * for BORICA settings and order pages. It ensures that the necessary styles and scripts are loaded
 * only on the relevant admin pages, such as the BORICA settings page and the WooCommerce order edit screen.
 * The scripts are also localized to include AJAX URLs and nonces for secure AJAX requests.
 *
 * @return void
 */
function borica_add_meta_admin() {
	$screen = get_current_screen();
	if ( isset( $screen->id ) && 'settings_page_borica-options' === $screen->id ) {
		wp_enqueue_style( 'borica_style_admin', plugin_dir_url( __FILE__ ) . '../css/borica_admin.css', array(), BORICA_MOD_VERSION, 'all' );
		wp_enqueue_script(
			'sweetalert2',
			'//cdn.jsdelivr.net/npm/sweetalert2@11',
			array(),
			BORICA_MOD_VERSION,
			true
		);
		wp_enqueue_script( 'borica_js_admin', plugin_dir_url( __FILE__ ) . '../js/borica_admin.js', array( 'jquery' ), BORICA_MOD_VERSION, true );
		wp_localize_script(
			'borica_js_admin',
			'borica_admin',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'nonce'    => wp_create_nonce( 'borica_nonce' ),
			)
		);
	}
	$borica_enable_container = wc_get_container()->get( CustomOrdersTableController::class )->custom_orders_table_usage_is_enabled();
	if ( $borica_enable_container ) {
		$borica_page_id = wc_get_page_screen_id( 'shop-order' );
	} else {
		$borica_page_id = 'shop_order';
	}
	if ( isset( $screen->id ) && $screen->id === $borica_page_id ) {
		wp_enqueue_style( 'borica_style_order_admin', plugin_dir_url( __FILE__ ) . '../css/borica_order_admin.css', array(), BORICA_MOD_VERSION, 'all' );
		wp_enqueue_script(
			'sweetalert2',
			'//cdn.jsdelivr.net/npm/sweetalert2@11',
			array(),
			BORICA_MOD_VERSION,
			true
		);
		wp_enqueue_script( 'borica_js_order_admin', plugin_dir_url( __FILE__ ) . '../js/borica_order_admin.js', array( 'jquery' ), BORICA_MOD_VERSION, true );
		wp_localize_script(
			'borica_js_order_admin',
			'borica_order_admin',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'nonce'    => wp_create_nonce( 'borica_nonce' ),
			)
		);
	}
}

/**
 * Loads the BORICA admin options page.
 *
 * This function includes the BORICA admin options page template. The template file
 * `borica-import-admin.php` contains the settings and options related to the BORICA payment gateway
 * for the WordPress admin area.
 *
 * @return void
 */
function borica_admin_options() {
	include 'borica-import-admin.php';
}

/**
 * Creates the necessary database tables for the BORICA payment gateway.
 *
 * This function checks if the required tables for storing BORICA orders and logs exist in the WordPress database.
 * If the tables do not exist, it creates them using the specified SQL schema. The `borica_orders` table stores
 * information about BORICA transactions, and the `borica_logs` table records log messages related to the payment processing.
 *
 * The function uses the `dbDelta()` function to handle table creation and schema updates. The character set and collation
 * for the tables are determined based on the WordPress database settings.
 *
 * @global wpdb $wpdb The WordPress database abstraction object.
 * @return void
 */
function borica_create_tables() {
	global $wpdb;
	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	$table_orders_name  = $wpdb->prefix . 'borica_orders';
	$table_logs_name    = $wpdb->prefix . 'borica_logs';
	$charset_collate    = $wpdb->get_charset_collate();
	$table_order_exists = ( $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $table_orders_name ) ) === $table_orders_name );
	$table_logs_exists  = ( $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $table_logs_name ) ) === $table_logs_name );

	if ( ! $table_order_exists ) {
		$sql_orders = "CREATE TABLE $table_orders_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			action varchar(20) NOT NULL,
			rc varchar(20) NOT NULL,
			created_at DATETIME NOT NULL,
			increment_id varchar(50) NULL,
			status varchar(255) NOT NULL,
			rrn varchar(20) NOT NULL,
			int_ref varchar(20) NOT NULL,
			approval varchar(6) NOT NULL,
			merch_gmt varchar(3) NOT NULL,
			request_cancel varchar(20) NOT NULL,
			cancel_amount varchar(20) NOT NULL,
			nonce varchar(32) NOT NULL,
			PRIMARY KEY (id),
			FULLTEXT idx (`nonce`)
		) $charset_collate;";
		dbDelta( $sql_orders );
	}

	if ( ! $table_logs_exists ) {
		$sql_logs = "CREATE TABLE $table_logs_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
			message TEXT NOT NULL DEFAULT '',
			PRIMARY KEY (id) 
		) $charset_collate;";
		dbDelta( $sql_logs );
	}
}

/**
 * Removes the BORICA-related database tables.
 *
 * This function deletes the custom database tables used by the BORICA payment gateway plugin.
 * Specifically, it drops the `borica_orders` and `borica_logs` tables from the WordPress database
 * if they exist. This operation is typically used during the uninstallation of the plugin to clean
 * up the database.
 *
 * @global wpdb $wpdb The WordPress database abstraction object.
 * @return void
 */
function borica_remove_tables() {
	global $wpdb;
	$table_orders_name = $wpdb->prefix . 'borica_orders';
	$table_logs_name   = $wpdb->prefix . 'borica_logs';
	$sql_orders = "DROP TABLE IF EXISTS $table_orders_name;";
	$sql_logs = "DROP TABLE IF EXISTS $table_logs_name;";
	$wpdb->query( $sql_orders );
	$wpdb->query( $sql_logs );
}

/**
 * AJAX handler for testing the correspondence between a BORICA private key and a public certificate.
 *
 * This function checks if a provided public certificate matches the BORICA test private key
 * and password stored in the WordPress options. It is intended to be called via an AJAX request.
 * The function verifies the AJAX nonce for security, checks if the request is valid and
 * a POST request, and then uses OpenSSL functions to test the match between the private key
 * and the public certificate.
 *
 * The result is returned as a JSON response, indicating success or failure.
 *
 * @return void
 */
function borica_testkeysbgn() {
	check_ajax_referer( 'borica_nonce', 'security' );

	$json = array(
		'checkCertTitle'    => __( 'Error', 'borica' ),
		'checkCertText'     => __( 'Test for correspondence between private key and public key failed.', 'borica' ),
		'confirmButtonText' => __( 'Yes', 'borica' ),
	);
	if ( wp_doing_ajax() && isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] ) {
		if ( ! empty( $_POST['PUBLIC_CERTIFICATE'] ) ) {
			$certificate_data = sanitize_text_field( wp_unslash( $_POST['PUBLIC_CERTIFICATE'] ) );
			$prefix           = 'data:application/x-x509-ca-cert;base64,';
			if ( strpos( $certificate_data, $prefix ) === 0 ) {
				$certificate_data   = substr( $certificate_data, strlen( $prefix ) );
				$public_certificate = base64_decode( $certificate_data );
				if ( false === $public_certificate ) {
					$json['checkCertText'] = __( 'Invalid base64 code.', 'borica' );
				} else {
					$borica_test_key_bgn      = (string) get_option( 'borica_test_key_bgn' );
					$borica_test_password_bgn = (string) get_option( 'borica_test_password_bgn' );
					$pkeyid                   = openssl_get_privatekey( $borica_test_key_bgn, $borica_test_password_bgn );
					$check_cert               = openssl_x509_check_private_key( $public_certificate, $pkeyid );
					$json                     = array(
						'checkCertTitle'    => $check_cert ?
							__( 'Message', 'borica' ) :
							__( 'Error', 'borica' ),
						'checkCertText'     => $check_cert ?
							__( 'Successful match test between private key and public key.', 'borica' ) :
							__( 'Test for correspondence between private key and public key failed.', 'borica' ),
						'confirmButtonText' => __( 'Yes', 'borica' ),
					);
				}
			} else {
				$json['checkCertText'] = __( 'A valid data: URI format is missing.', 'borica' );
			}
		} else {
			$json['checkCertText'] = __( 'A valid data: URI format is missing.', 'borica' );
		}
	}

	echo ( wp_json_encode( $json ) );
	die();
}

/**
 * AJAX handler for testing the correspondence between a BORICA production private key and a public certificate.
 *
 * This function checks whether the provided public certificate matches the BORICA production private key
 * and password stored in the WordPress options. It is intended to be called via an AJAX request.
 * The function verifies the AJAX nonce for security, validates the request as a POST request,
 * and then uses OpenSSL functions to test the match between the private key and the public certificate.
 *
 * The result is returned as a JSON response indicating success or failure.
 *
 * @return void
 */
function borica_productionkeysbgn() {
	check_ajax_referer( 'borica_nonce', 'security' );

	$json = array(
		'checkCertTitle'    => __( 'Error', 'borica' ),
		'checkCertText'     => __( 'Test for correspondence between private key and public key failed.', 'borica' ),
		'confirmButtonText' => __( 'Yes', 'borica' ),
	);
	if ( wp_doing_ajax() && isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] ) {
		if ( ! empty( $_POST['PUBLIC_CERTIFICATE'] ) ) {
			$certificate_data = sanitize_text_field( wp_unslash( $_POST['PUBLIC_CERTIFICATE'] ) );
			$prefix           = 'data:application/x-x509-ca-cert;base64,';
			if ( strpos( $certificate_data, $prefix ) === 0 ) {
				$certificate_data   = substr( $certificate_data, strlen( $prefix ) );
				$public_certificate = base64_decode( $certificate_data );
				if ( false === $public_certificate ) {
					$json['checkCertText'] = __( 'Invalid base64 code.', 'borica' );
				} else {
					$borica_production_key_bgn      = (string) get_option( 'borica_production_key_bgn' );
					$borica_production_password_bgn = (string) get_option( 'borica_production_password_bgn' );
					$pkeyid                         = openssl_get_privatekey( $borica_production_key_bgn, $borica_production_password_bgn );
					$check_cert                     = openssl_x509_check_private_key( $public_certificate, $pkeyid );
					$json                           = array(
						'checkCertTitle'    => $check_cert ?
							__( 'Message', 'borica' ) :
							__( 'Error', 'borica' ),
						'checkCertText'     => $check_cert ?
							__( 'Successful match test between private key and public key.', 'borica' ) :
							__( 'Test for correspondence between private key and public key failed.', 'borica' ),
						'confirmButtonText' => __( 'Yes', 'borica' ),
					);
				}
			} else {
				$json['checkCertText'] = __( 'A valid data: URI format is missing.', 'borica' );
			}
		} else {
			$json['checkCertText'] = __( 'A valid data: URI format is missing.', 'borica' );
		}
	}

	echo ( wp_json_encode( $json ) );
	die();
}

/**
 * AJAX handler for testing the correspondence between a BORICA test private key for EUR and a public certificate.
 *
 * This function checks whether the provided public certificate matches the BORICA test private key
 * and password for EUR transactions, which are stored in the WordPress options. It is intended to be called via an AJAX request.
 * The function verifies the AJAX nonce for security, validates the request as a POST request,
 * and then uses OpenSSL functions to test the match between the private key and the public certificate.
 *
 * The result is returned as a JSON response indicating success or failure.
 *
 * @return void
 */
function borica_testkeyseur() {
	check_ajax_referer( 'borica_nonce', 'security' );

	$json = array(
		'checkCertTitle'    => __( 'Error', 'borica' ),
		'checkCertText'     => __( 'Test for correspondence between private key and public key failed.', 'borica' ),
		'confirmButtonText' => __( 'Yes', 'borica' ),
	);
	if ( wp_doing_ajax() && isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] ) {
		if ( ! empty( $_POST['PUBLIC_CERTIFICATE'] ) ) {
			$certificate_data = sanitize_text_field( wp_unslash( $_POST['PUBLIC_CERTIFICATE'] ) );
			$prefix           = 'data:application/x-x509-ca-cert;base64,';
			if ( strpos( $certificate_data, $prefix ) === 0 ) {
				$certificate_data   = substr( $certificate_data, strlen( $prefix ) );
				$public_certificate = base64_decode( $certificate_data );
				if ( false === $public_certificate ) {
					$json['checkCertText'] = __( 'Invalid base64 code.', 'borica' );
				} else {
					$borica_test_key_eur      = (string) get_option( 'borica_test_key_eur' );
					$borica_test_password_eur = (string) get_option( 'borica_test_password_eur' );
					$pkeyid                   = openssl_get_privatekey( $borica_test_key_eur, $borica_test_password_eur );
					$check_cert               = openssl_x509_check_private_key( $public_certificate, $pkeyid );
					$json                     = array(
						'checkCertTitle'    => $check_cert ?
							__( 'Message', 'borica' ) :
							__( 'Error', 'borica' ),
						'checkCertText'     => $check_cert ?
							__( 'Successful match test between private key and public key.', 'borica' ) :
							__( 'Test for correspondence between private key and public key failed.', 'borica' ),
						'confirmButtonText' => __( 'Yes', 'borica' ),
					);
				}
			} else {
				$json['checkCertText'] = __( 'A valid data: URI format is missing.', 'borica' );
			}
		} else {
			$json['checkCertText'] = __( 'A valid data: URI format is missing.', 'borica' );
		}
	}

	echo ( wp_json_encode( $json ) );
	die();
}

/**
 * AJAX handler for testing the correspondence between a BORICA production private key for EUR and a public certificate.
 *
 * This function checks whether the provided public certificate matches the BORICA production private key
 * and password for EUR transactions, which are stored in the WordPress options. It is intended to be called via an AJAX request.
 * The function verifies the AJAX nonce for security, validates the request as a POST request,
 * and then uses OpenSSL functions to test the match between the private key and the public certificate.
 *
 * The result is returned as a JSON response indicating success or failure.
 *
 * @return void
 */
function borica_productionkeyseur() {
	check_ajax_referer( 'borica_nonce', 'security' );

	$json = array(
		'checkCertTitle'    => __( 'Error', 'borica' ),
		'checkCertText'     => __( 'Test for correspondence between private key and public key failed.', 'borica' ),
		'confirmButtonText' => __( 'Yes', 'borica' ),
	);
	if ( wp_doing_ajax() && isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] ) {
		if ( ! empty( $_POST['PUBLIC_CERTIFICATE'] ) ) {
			$certificate_data = sanitize_text_field( wp_unslash( $_POST['PUBLIC_CERTIFICATE'] ) );
			$prefix           = 'data:application/x-x509-ca-cert;base64,';
			if ( strpos( $certificate_data, $prefix ) === 0 ) {
				$certificate_data   = substr( $certificate_data, strlen( $prefix ) );
				$public_certificate = base64_decode( $certificate_data );
				if ( false === $public_certificate ) {
					$json['checkCertText'] = __( 'Invalid base64 code.', 'borica' );
				} else {
					$borica_production_key_eur      = (string) get_option( 'borica_production_key_eur' );
					$borica_production_password_eur = (string) get_option( 'borica_production_password_eur' );
					$pkeyid                         = openssl_get_privatekey( $borica_production_key_eur, $borica_production_password_eur );
					$check_cert                     = openssl_x509_check_private_key( $public_certificate, $pkeyid );
					$json                           = array(
						'checkCertTitle'    => $check_cert ?
							__( 'Message', 'borica' ) :
							__( 'Error', 'borica' ),
						'checkCertText'     => $check_cert ?
							__( 'Successful match test between private key and public key.', 'borica' ) :
							__( 'Test for correspondence between private key and public key failed.', 'borica' ),
						'confirmButtonText' => __( 'Yes', 'borica' ),
					);
				}
			} else {
				$json['checkCertText'] = __( 'A valid data: URI format is missing.', 'borica' );
			}
		} else {
			$json['checkCertText'] = __( 'A valid data: URI format is missing.', 'borica' );
		}
	}

	echo ( wp_json_encode( $json ) );
	die();
}

/**
 * AJAX handler for sending BORICA payment information.
 *
 * This function processes data from an AJAX POST request to prepare and send payment information
 * to BORICA. It verifies the security nonce, sanitizes input fields, and generates the necessary
 * data for the payment request. The data is then logged if debugging is enabled, and the payment
 * details, including a signed authorization, are returned as a JSON response.
 *
 * @return void
 */
function borica_send() {
	check_ajax_referer( 'borica_nonce', 'security' );

	$json = array();

	if ( wp_doing_ajax() && isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] ) {
		if ( isset( $_POST['TERMINAL'] ) ) {
			$borica_terminal = (string) htmlspecialchars( wp_unslash( $_POST['TERMINAL'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_terminal = '';
		}
		if ( isset( $_POST['TRTYPE'] ) ) {
			$borica_trtype = filter_var( wp_unslash( $_POST['TRTYPE'] ), FILTER_SANITIZE_NUMBER_INT );
		} else {
			$borica_trtype = '';
		}
		if ( isset( $_POST['AMOUNT'] ) ) {
			$borica_amount = filter_var( wp_unslash( $_POST['AMOUNT'] ), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
		} else {
			$borica_amount = '';
		}
		if ( isset( $_POST['CURRENCY'] ) ) {
			$borica_currency = (string) htmlspecialchars( wp_unslash( $_POST['CURRENCY'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_currency = '';
		}
		if ( isset( $_POST['ORDER'] ) ) {
			$borica_order = (string) htmlspecialchars( wp_unslash( $_POST['ORDER'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_order = '';
		}
		if ( isset( $_POST['DESC'] ) ) {
			$borica_desc = (string) htmlspecialchars( wp_unslash( $_POST['DESC'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_desc = '';
		}
		if ( isset( $_POST['MERCHANT'] ) ) {
			$borica_merchant = (string) htmlspecialchars( wp_unslash( $_POST['MERCHANT'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_merchant = '';
		}
		if ( isset( $_POST['MERCH_NAME'] ) ) {
			$borica_merch_name = (string) htmlspecialchars( wp_unslash( $_POST['MERCH_NAME'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_merch_name = '';
		}
		if ( isset( $_POST['MERCH_URL'] ) ) {
			$borica_merch_url = (string) htmlspecialchars( wp_unslash( $_POST['MERCH_URL'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_merch_url = '';
		}
		if ( isset( $_POST['EMAIL'] ) ) {
			$borica_email = (string) htmlspecialchars( wp_unslash( $_POST['EMAIL'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_email = '';
		}
		if ( isset( $_POST['COUNTRY'] ) ) {
			$borica_country = (string) htmlspecialchars( wp_unslash( $_POST['COUNTRY'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_country = '';
		}
		if ( isset( $_POST['MERCH_GMT'] ) ) {
			$borica_merch_gmt = (string) htmlspecialchars( wp_unslash( $_POST['MERCH_GMT'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_merch_gmt = '';
		}
		if ( isset( $_POST['ADDENDUM'] ) ) {
			$borica_addendum = (string) htmlspecialchars( wp_unslash( $_POST['ADDENDUM'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_addendum = '';
		}
		if ( isset( $_POST['AD_CUST_BOR_ORDER_ID'] ) ) {
			$borica_ad_cust_bor_order_id = (string) htmlspecialchars( wp_unslash( $_POST['AD_CUST_BOR_ORDER_ID'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_ad_cust_bor_order_id = '';
		}
		if ( isset( $_POST['NONCE'] ) ) {
			$borica_nonce = (string) htmlspecialchars( wp_unslash( $_POST['NONCE'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_nonce = '';
		}
		if ( isset( $_POST['LANG'] ) ) {
			$borica_lang = (string) htmlspecialchars( wp_unslash( $_POST['LANG'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_lang = '';
		}
		if ( isset( $_POST['ORDER_ID'] ) ) {
			$borica_order_id = (string) htmlspecialchars( wp_unslash( $_POST['ORDER_ID'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_order_id = '';
		}
		if ( isset( $_SERVER['REMOTE_ADDR'] ) ) {
			$browser_ip_address = (string) htmlspecialchars( wp_unslash( $_SERVER['REMOTE_ADDR'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$browser_ip_address = '0.0.0.0';
		}
		if ( isset( $_POST['BROWSER_SCREEN_HEIGHT'] ) ) {
			$browser_screen_height = filter_var( wp_unslash( $_POST['BROWSER_SCREEN_HEIGHT'] ), FILTER_SANITIZE_NUMBER_INT );
		} else {
			$browser_screen_height = '';
		}
		if ( isset( $_POST['BROWSER_SCREEN_WIDTH'] ) ) {
			$browser_screen_width = filter_var( wp_unslash( $_POST['BROWSER_SCREEN_WIDTH'] ), FILTER_SANITIZE_NUMBER_INT );
		} else {
			$browser_screen_width = '';
		}
		if ( isset( $_POST['CARDHOLDER_EMAIL_ADDRESS'] ) ) {
			$cardholder_email_address = (string) htmlspecialchars( wp_unslash( $_POST['CARDHOLDER_EMAIL_ADDRESS'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$cardholder_email_address = '';
		}
		if ( isset( $_POST['CARDHOLDER_HOME_PHONE'] ) ) {
			$cardholder_home_phone = (string) htmlspecialchars( wp_unslash( $_POST['CARDHOLDER_HOME_PHONE'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$cardholder_home_phone = '';
		}
		if ( isset( $_POST['CARDHOLDER_NAME'] ) ) {
			$cardholder_name = (string) htmlspecialchars( wp_unslash( $_POST['CARDHOLDER_NAME'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$cardholder_name = '';
		}

		$borica_m_info_arr       = array(
			'browserIP'           => $browser_ip_address,
			'browserScreenHeight' => $browser_screen_height,
			'browserScreenWidth'  => $browser_screen_width,
			'homePhone'           => $cardholder_home_phone,
			'email'               => $cardholder_email_address,
			'cardholderName'      => $cardholder_name,
		);
		$borica_m_info_str       = wp_json_encode( $borica_m_info_arr, JSON_UNESCAPED_UNICODE );
		$json['boricaMInfo']     = base64_encode( $borica_m_info_str );
		$json['boricaTimestamp'] = gmdate( 'YmdHis' );

		$helper     = new Borica_Helper();
		$date_time  = DateTime::createFromFormat( 'YmdHis', $json['boricaTimestamp'], new DateTimeZone( 'UTC' ) );
		$new_format = 'Y-m-d H:i:s';
		$data       = array(
			'action'         => '999',
			'rc'             => '999',
			'created_at'     => $date_time->format( $new_format ),
			'increment_id'   => $borica_order_id,
			'status'         => '999',
			'rrn'            => '999',
			'int_ref'        => '999',
			'approval'       => '999',
			'merch_gmt'      => $borica_merch_gmt,
			'request_cancel' => '999',
			'cancel_amount'  => '0.00',
			'nonce'          => $borica_nonce,
		);
		$params     = array(
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
		);
		$helper->create_borica_order( $data, $params );

		$borica_p_sign       = $helper->sign_authorization(
			$borica_terminal,
			$borica_trtype,
			$borica_amount,
			$borica_currency,
			$borica_order,
			$json['boricaTimestamp'],
			$borica_nonce
		);
		$json['boricaPSign'] = $borica_p_sign['pSign'];

		$borica_debug = (int) get_option( 'borica_debug' );
		if ( 1 === $borica_debug ) {
			$base_url = get_site_url();
			$logger   = new Borica_Logger();
			$logger->log(
				array(
					'1.Borica_Woo_Payment_Gateway.borica_send' => array(
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
						'TIMESTAMP'            => $json['boricaTimestamp'],
						'NONCE'                => $borica_nonce,
						'LANG'                 => $borica_lang,
						'M_INFO'               => $json['boricaMInfo'],
						'P_SIGN'               => $json['boricaPSign'],
					),
				),
			);
		}
	}

	echo ( wp_json_encode( $json ) );
	die();
}

/**
 * AJAX handler for retrieving BORICA logs.
 *
 * This function handles an AJAX request to retrieve logs related to BORICA transactions.
 * It verifies the security nonce and checks that the request is a POST request.
 * If valid, it utilizes the Borica_Helper class to fetch the logs and returns them as a JSON response.
 *
 * @return void
 */
function borica_log() {
	check_ajax_referer( 'borica_nonce', 'security' );
	$helper = new Borica_Helper();
	$json   = array();
	if ( wp_doing_ajax() && isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] ) {
		$json = $helper->get_borica_logs();
	}

	echo ( wp_json_encode( $json, JSON_UNESCAPED_UNICODE ) );
	die();
}

/**
 * AJAX handler for checking the status of a BORICA payment.
 *
 * This function processes an AJAX POST request to verify the status of a BORICA payment.
 * It validates the request by checking the security nonce and sanitizing all inputs.
 * The function then makes a cURL request to the BORICA API to retrieve the current status
 * of the transaction and compares it with the previously recorded status.
 * If the status has changed, it updates the database accordingly.
 * The function logs both the request and response details for auditing purposes.
 * Finally, it returns the result as a JSON response indicating whether the status has changed,
 * remains the same, or if the status could not be determined.
 *
 * @return void
 */
function borica_check_payment() {
	check_ajax_referer( 'borica_nonce', 'security' );

	$result_change = array();
	if ( wp_doing_ajax() && isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] ) {
		if ( isset( $_POST['BORICA_URL'] ) ) {
			$borica_url = filter_var( wp_unslash( $_POST['BORICA_URL'] ), FILTER_VALIDATE_URL );
		} else {
			$borica_url = '';
		}
		if ( isset( $_POST['TERMINAL'] ) ) {
			$borica_terminal = (string) htmlspecialchars( wp_unslash( $_POST['TERMINAL'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_terminal = '';
		}
		if ( isset( $_POST['TRTYPE'] ) ) {
			$borica_trtype = filter_var( wp_unslash( $_POST['TRTYPE'] ), FILTER_SANITIZE_NUMBER_INT );
		} else {
			$borica_trtype = '';
		}
		if ( isset( $_POST['ORDER'] ) ) {
			$borica_order = (string) htmlspecialchars( wp_unslash( $_POST['ORDER'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_order = '';
		}
		if ( isset( $_POST['TRAN_TRTYPE'] ) ) {
			$borica_tran_trtype = filter_var( wp_unslash( $_POST['TRAN_TRTYPE'] ), FILTER_SANITIZE_NUMBER_INT );
		} else {
			$borica_tran_trtype = '';
		}
		if ( isset( $_POST['NONCE'] ) ) {
			$borica_nonce = (string) htmlspecialchars( wp_unslash( $_POST['NONCE'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_nonce = '';
		}
		if ( isset( $_POST['ACTION'] ) ) {
			$borica_action = (string) htmlspecialchars( wp_unslash( $_POST['ACTION'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_action = '';
		}
		if ( isset( $_POST['RC'] ) ) {
			$borica_rc = (string) htmlspecialchars( wp_unslash( $_POST['RC'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_rc = '';
		}
		if ( isset( $_POST['STATUSMSG'] ) ) {
			$borica_status = (string) htmlspecialchars( wp_unslash( $_POST['STATUSMSG'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_status = '';
		}
		if ( isset( $_POST['INCREMENT_ID'] ) ) {
			$borica_increment_id = (string) htmlspecialchars( wp_unslash( $_POST['INCREMENT_ID'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_increment_id = '';
		}
		if ( isset( $_POST['BORICA_CURRENCY_CODE'] ) ) {
			$borica_currency_code = (string) htmlspecialchars( wp_unslash( $_POST['BORICA_CURRENCY_CODE'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_currency_code = '';
		}

		$borica_helper               = new Borica_Helper();
		$borica_p_sign_check_payment = $borica_helper->sign_check_payment(
			$borica_terminal,
			$borica_trtype,
			$borica_order,
			$borica_nonce,
			$borica_currency_code
		);
		$borica_p_sign               = $borica_p_sign_check_payment['pSign'];

		$borica_debug = (int) get_option( 'borica_debug' );
		if ( 1 === $borica_debug ) {
			$borica_logger = new Borica_Logger();
			$borica_logger->log(
				array(
					'3.Borica_Woo_Payment_Gateway.borica_check_payment.request' => array(
						'TERMINAL'    => $borica_terminal,
						'TRTYPE'      => $borica_trtype,
						'ORDER'       => $borica_order,
						'TRAN_TRTYPE' => $borica_tran_trtype,
						'NONCE'       => $borica_nonce,
						'P_SIGN'      => $borica_p_sign,
					),
				),
			);
		}

		$response = wp_remote_post(
			$borica_url,
			array(
				'method'    => 'POST',
				'body'      => array(
					'TERMINAL'    => $borica_terminal,
					'TRTYPE'      => $borica_trtype,
					'ORDER'       => $borica_order,
					'TRAN_TRTYPE' => $borica_tran_trtype,
					'NONCE'       => $borica_nonce,
					'P_SIGN'      => $borica_p_sign,
				),
				'headers'   => array(
					'Content-Type' => 'application/x-www-form-urlencoded',
					'Accept'       => 'application/json',
				),
				'timeout'   => 20,
				'sslverify' => true,
			)
		);

		if ( is_wp_error( $response ) ) {
			$result_change = array(
				'resultChange'      => -1,
				'resultChangeTitle' => __( 'Error', 'borica' ),
				'resultChangeText'  => __( 'There was an error communicating with the BORICA server.', 'borica' ),
			);
			echo ( wp_json_encode( $result_change ) );
			die();
		}

		$response_obj = json_decode( wp_remote_retrieve_body( $response ) );

		$response_p_sign         = $response_obj->P_SIGN;
		$response_action         = $response_obj->ACTION;
		$response_rc             = $response_obj->RC;
		$response_approval       = $response_obj->APPROVAL;
		$response_terminal       = $response_obj->TERMINAL;
		$response_trtype         = $response_obj->TRTYPE;
		$response_amount         = $response_obj->AMOUNT;
		$response_currency       = $response_obj->CURRENCY;
		$response_order          = $response_obj->ORDER;
		$response_rrn            = $response_obj->RRN;
		$response_int_ref        = $response_obj->INT_REF;
		$response_pares_status   = $response_obj->PARES_STATUS;
		$response_eci            = $response_obj->ECI;
		$response_timestamp      = $response_obj->TIMESTAMP;
		$response_tran_date      = $response_obj->TRAN_DATE;
		$response_tran_tr_type   = $response_obj->TRAN_TRTYPE;
		$response_auth_step_res  = $response_obj->AUTH_STEP_RES;
		$response_cardholderinfo = $response_obj->CARDHOLDERINFO;
		$response_card           = $response_obj->CARD;
		$response_card_brand     = $response_obj->CARD_BRAND;
		$response_nonce          = $response_obj->NONCE;
		$response_status         = $response_obj->STATUSMSG;

		if ( 1 === $borica_debug ) {
			$borica_logger->log(
				array(
					'4.Borica_Woo_Payment_Gateway.borica_check_payment.responce' => array(
						'P_SIGN'         => $response_p_sign,
						'ACTION'         => $response_action,
						'RC'             => $response_rc,
						'APPROVAL'       => $response_approval,
						'TERMINAL'       => $response_terminal,
						'TRTYPE'         => $response_trtype,
						'AMOUNT'         => $response_amount,
						'CURRENCY'       => $response_currency,
						'ORDER'          => $response_order,
						'RRN'            => $response_rrn,
						'INT_REF'        => $response_int_ref,
						'PARES_STATUS'   => $response_pares_status,
						'ECI'            => $response_eci,
						'TIMESTAMP'      => $response_timestamp,
						'TRAN_DATE'      => $response_tran_date,
						'TRAN_TRTYPE'    => $response_tran_tr_type,
						'AUTH_STEP_RES'  => $response_auth_step_res,
						'CARDHOLDERINFO' => $response_cardholderinfo,
						'CARD'           => $response_card,
						'CARD_BRAND'     => $response_card_brand,
						'NONCE'          => $response_nonce,
						'STATUSMSG'      => $response_status,
					),
				),
			);
		}

		$borica_check_authorization = $borica_helper->check_authorization(
			$response_p_sign,
			$response_action,
			$response_rc,
			$response_approval,
			$response_terminal,
			$response_trtype,
			$response_amount,
			$response_currency,
			$response_order,
			$response_rrn,
			$response_int_ref,
			$response_pares_status,
			$response_eci,
			$response_timestamp,
			$response_nonce
		);

		$is_change =
			$borica_action !== $response_action ||
			$borica_rc !== $response_rc ||
			$borica_status !== $response_status;

		$response_action_txt = '';
		switch ( $response_action ) {
			case '0':
				$response_action_txt = '<span style="color:green;">' . __( 'Successfully completed transaction', 'borica' ) . '</span>';
				break;
			case '1':
				$response_action_txt = '<span style="color:red;">' . __( 'Duplicate transaction', 'borica' ) . '</span>';
				break;
			case '2':
				$response_action_txt = '<span style="color:red;">' . __( 'Transaction declined', 'borica' ) . '</span>';
				break;
			case '3':
				$response_action_txt = '<span style="color:red;">' .
					__( 'Error processing transaction', 'borica' ) .
					'</span>';
				break;
			case '7':
				$response_action_txt = '<span style="color:red;">' .
					__( 'Duplicate transaction on failed authentication', 'borica' ) .
					'</span>';
				break;
			case '21':
				$response_action_txt = '<span style="color:red;">' . __( 'Soft Decline', 'borica' ) . '</span>';
				break;
			case '999':
				$response_action_txt = '<span style="color:red;">' . __( 'Transaction not completed', 'borica' ) . '</span>';
				break;
		}

		if ( $borica_check_authorization ) {
			if ( $is_change ) {
				$result_change      = array(
					'resultChange'      => 1,
					'responseRc'        => $response_rc,
					'responseStatus'    => $response_status,
					'responseActionTxt' => $response_action_txt,
					'resultChangeTitle' => __( 'Message', 'borica' ),
					'resultChangeText'  => __( 'The transaction status has changed', 'borica' ),
				);
				$data_check         = array(
					'action'   => '' !== $response_action ? $response_action : '999',
					'rc'       => '' !== $response_rc ? $response_rc : '999',
					'status'   => '' !== $response_status ? $response_status : '999',
					'approval' => '' !== $response_approval ? $response_approval : '999',
				);
				$where_borica_order = array(
					'nonce' => $borica_nonce,
				);
				$borica_helper->update_borica_order( $data_check, $where_borica_order );
			} else {
				$result_change = array(
					'resultChange'      => 0,
					'resultChangeTitle' => __( 'Message', 'borica' ),
					'resultChangeText'  => __( 'There are no changes to the transaction status', 'borica' ),
				);
			}
		} else {
			$result_change = array(
				'resultChange'      => -1,
				'resultChangeTitle' => __( 'Error', 'borica' ),
				'resultChangeText'  => __( 'We cannot determine the status of the selected transaction', 'borica' ),
			);
		}
	}

	echo ( wp_json_encode( $result_change ) );
	die();
}

/**
 * AJAX handler for dropping (canceling) a BORICA payment.
 *
 * This function processes an AJAX POST request to cancel a BORICA payment.
 * It validates the request by checking the security nonce and sanitizing all inputs.
 * The function then makes an HTTP request to the BORICA API to perform the cancellation
 * and retrieve the result of the transaction. It logs both the request and response details
 * for auditing purposes and returns the result as a JSON response.
 *
 * @return void
 */
function borica_drop_payment() {
	check_ajax_referer( 'borica_nonce', 'security' );

	$result_change = array();
	if ( wp_doing_ajax() && isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] ) {
		if ( isset( $_POST['BORICA_URL'] ) ) {
			$borica_url = filter_var( wp_unslash( $_POST['BORICA_URL'] ), FILTER_VALIDATE_URL );
		} else {
			$borica_url = '';
		}
		if ( isset( $_POST['TERMINAL'] ) ) {
			$borica_terminal = (string) htmlspecialchars( wp_unslash( $_POST['TERMINAL'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_terminal = '';
		}
		if ( isset( $_POST['TRTYPE'] ) ) {
			$borica_trtype = filter_var( wp_unslash( $_POST['TRTYPE'] ), FILTER_SANITIZE_NUMBER_INT );
		} else {
			$borica_trtype = '';
		}
		if ( isset( $_POST['AMOUNT'] ) ) {
			$borica_amount = filter_var( wp_unslash( $_POST['AMOUNT'] ), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
		} else {
			$borica_amount = '';
		}
		if ( isset( $_POST['CURRENT_AMOUNT'] ) ) {
			$borica_current_amount = filter_var( wp_unslash( $_POST['CURRENT_AMOUNT'] ), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
		} else {
			$borica_current_amount = '';
		}
		if ( isset( $_POST['CURRENCY'] ) ) {
			$borica_currency = (string) htmlspecialchars( wp_unslash( $_POST['CURRENCY'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_currency = '';
		}
		if ( isset( $_POST['ORDER'] ) ) {
			$borica_order = (string) htmlspecialchars( wp_unslash( $_POST['ORDER'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_order = '';
		}
		if ( isset( $_POST['DESC'] ) ) {
			$borica_desc = (string) htmlspecialchars( wp_unslash( $_POST['DESC'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_desc = '';
		}
		if ( isset( $_POST['MERCHANT'] ) ) {
			$borica_merchant = (string) htmlspecialchars( wp_unslash( $_POST['MERCHANT'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_merchant = '';
		}
		if ( isset( $_POST['MERCH_NAME'] ) ) {
			$borica_merchant_name = (string) htmlspecialchars( wp_unslash( $_POST['MERCH_NAME'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_merchant_name = '';
		}
		if ( isset( $_POST['MERCH_URL'] ) ) {
			$borica_merchant_url = filter_var( wp_unslash( $_POST['MERCH_URL'] ), FILTER_VALIDATE_URL );
		} else {
			$borica_merchant_url = '';
		}
		if ( isset( $_POST['EMAIL'] ) ) {
			$borica_email = filter_var( wp_unslash( $_POST['EMAIL'] ), FILTER_VALIDATE_EMAIL );
		} else {
			$borica_email = '';
		}
		if ( isset( $_POST['COUNTRY'] ) ) {
			$borica_country = (string) htmlspecialchars( wp_unslash( $_POST['COUNTRY'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_country = '';
		}
		if ( isset( $_POST['MERCH_GMT'] ) ) {
			$borica_merchant_gmt = (string) htmlspecialchars( wp_unslash( $_POST['MERCH_GMT'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_merchant_gmt = '';
		}
		if ( isset( $_POST['LANG'] ) ) {
			$borica_lang = (string) htmlspecialchars( wp_unslash( $_POST['LANG'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_lang = '';
		}
		if ( isset( $_POST['ADDENDUM'] ) ) {
			$borica_addendum = (string) htmlspecialchars( wp_unslash( $_POST['ADDENDUM'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_addendum = '';
		}
		if ( isset( $_POST['AD_CUST_BOR_ORDER_ID'] ) ) {
			$borica_custom_order = (string) htmlspecialchars( wp_unslash( $_POST['AD_CUST_BOR_ORDER_ID'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_custom_order = '';
		}
		if ( isset( $_POST['RRN'] ) ) {
			$borica_rrn = (string) htmlspecialchars( wp_unslash( $_POST['RRN'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_rrn = '';
		}
		if ( isset( $_POST['INT_REF'] ) ) {
			$borica_int_ref = (string) htmlspecialchars( wp_unslash( $_POST['INT_REF'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_int_ref = '';
		}
		if ( isset( $_POST['TIMESTAMP'] ) ) {
			$borica_timestamp = (string) htmlspecialchars( wp_unslash( $_POST['TIMESTAMP'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_timestamp = '';
		}
		if ( isset( $_POST['NONCE'] ) ) {
			$borica_nonce = (string) htmlspecialchars( wp_unslash( $_POST['NONCE'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_nonce = '';
		}
		if ( isset( $_POST['INCREMENT_ID'] ) ) {
			$borica_increment_id = (string) htmlspecialchars( wp_unslash( $_POST['INCREMENT_ID'] ), ENT_QUOTES, 'UTF-8' );
		} else {
			$borica_increment_id = '';
		}

		$borica_helper              = new Borica_Helper();
		$borica_p_sign_drop_payment = $borica_helper->sign_drop_payment(
			$borica_terminal,
			$borica_trtype,
			$borica_current_amount,
			$borica_currency,
			$borica_order,
			$borica_timestamp,
			$borica_nonce
		);
		$borica_p_sign              = $borica_p_sign_drop_payment['pSign'];

		$borica_debug = (int) get_option( 'borica_debug' );
		if ( 1 === $borica_debug ) {
			$borica_logger = new Borica_Logger();
			$borica_logger->log(
				array(
					'5.Borica_Woo_Payment_Gateway.borica_drop_payment.request' => array(
						'TERMINAL'             => $borica_terminal,
						'TRTYPE'               => $borica_trtype,
						'AMOUNT'               => $borica_current_amount,
						'CURRENCY'             => $borica_currency,
						'ORDER'                => $borica_order,
						'DESC'                 => $borica_desc,
						'MERCHANT'             => $borica_merchant,
						'MERCH_NAME'           => $borica_merchant_name,
						'MERCH_URL'            => $borica_merchant_url,
						'EMAIL'                => $borica_email,
						'COUNTRY'              => $borica_country,
						'MERCH_GMT'            => $borica_merchant_gmt,
						'LANG'                 => $borica_lang,
						'ADDENDUM'             => $borica_addendum,
						'AD.CUST_BOR_ORDER_ID' => $borica_custom_order,
						'RRN'                  => $borica_rrn,
						'INT_REF'              => $borica_int_ref,
						'TIMESTAMP'            => $borica_timestamp,
						'NONCE'                => $borica_nonce,
						'P_SIGN='              => $borica_p_sign,
					),
				),
			);
		}

		$response = wp_remote_post(
			$borica_url,
			array(
				'method'    => 'POST',
				'body'      => array(
					'TERMINAL'             => $borica_terminal,
					'TRTYPE'               => $borica_trtype,
					'AMOUNT'               => $borica_current_amount,
					'CURRENCY'             => $borica_currency,
					'ORDER'                => $borica_order,
					'DESC'                 => $borica_desc,
					'MERCHANT'             => $borica_merchant,
					'MERCH_NAME'           => $borica_merchant_name,
					'MERCH_URL'            => $borica_merchant_url,
					'EMAIL'                => $borica_email,
					'COUNTRY'              => $borica_country,
					'MERCH_GMT'            => $borica_merchant_gmt,
					'LANG'                 => $borica_lang,
					'ADDENDUM'             => $borica_addendum,
					'AD.CUST_BOR_ORDER_ID' => $borica_custom_order,
					'RRN'                  => $borica_rrn,
					'INT_REF'              => $borica_int_ref,
					'TIMESTAMP'            => $borica_timestamp,
					'NONCE'                => $borica_nonce,
					'P_SIGN'               => $borica_p_sign,
				),
				'headers'   => array(
					'Content-Type' => 'application/x-www-form-urlencoded',
					'Accept'       => 'application/json',
				),
				'timeout'   => 20,
				'sslverify' => true,
			)
		);

		if ( is_wp_error( $response ) ) {
			$result_change = array(
				'resultChange'      => -1,
				'resultChangeTitle' => __( 'Error', 'borica' ),
				'resultChangeText'  => __( 'There was an error communicating with the BORICA server.', 'borica' ),
			);
			echo ( wp_json_encode( $result_change ) );
			die();
		}

		$response_obj = json_decode( wp_remote_retrieve_body( $response ) );

		$response_p_sign         = $response_obj->P_SIGN;
		$response_action         = $response_obj->ACTION;
		$response_rc             = $response_obj->RC;
		$response_approval       = $response_obj->APPROVAL;
		$response_terminal       = $response_obj->TERMINAL;
		$response_trtype         = $response_obj->TRTYPE;
		$response_amount         = $response_obj->AMOUNT;
		$response_currency       = $response_obj->CURRENCY;
		$response_order          = $response_obj->ORDER;
		$response_rrn            = $response_obj->RRN;
		$response_int_ref        = $response_obj->INT_REF;
		$response_pares_status   = $response_obj->PARES_STATUS;
		$response_eci            = $response_obj->ECI;
		$response_timestamp      = $response_obj->TIMESTAMP;
		$response_nonce          = $response_obj->NONCE;
		$response_status         = $response_obj->STATUSMSG;
		$response_tran_date      = $response_obj->TRAN_DATE;
		$response_auth_step_res  = $response_obj->AUTH_STEP_RES;
		$response_cardholderinfo = $response_obj->CARDHOLDERINFO;
		$response_card           = $response_obj->CARD;
		$response_card_brand     = $response_obj->CARD_BRAND;

		$borica_drop_authorization = $borica_helper->check_authorization(
			$response_p_sign,
			$response_action,
			$response_rc,
			$response_approval,
			$response_terminal,
			$response_trtype,
			$response_amount,
			$response_currency,
			$response_order,
			$response_rrn,
			$response_int_ref,
			$response_pares_status,
			$response_eci,
			$response_timestamp,
			$response_nonce,
		);

		$request_cancel_txt    = '';
		$borica_order_total    = (float) $borica_amount;
		$borica_request_cancel = (float) $response_amount;
		$borica_rest           = $borica_order_total - $borica_request_cancel;

		$request_cancel = '11';
		if ( $borica_drop_authorization ) {
			if ( 0 === (int) $response_action && '00' === $response_rc ) {
				$request_cancel      = '00';
				$borica_order_origin = '';
				$order_row           = $borica_helper->get_borica_order( $borica_nonce );
				if ( count( $order_row ) > 0 ) {
					$borica_order_origin = $order_row['increment_id'];
				}
				$order = wc_get_order( $borica_order_origin );
				if ( $order && 'refunded' !== $order->get_status() ) {
					$refund = wc_create_refund(
						array(
							'amount'     => $borica_rest,
							'reason'     => '',
							'order_id'   => $borica_order_origin,
							'refund_id'  => 0,
							'line_items' => array(),
						)
					);
					$order->add_order_note( __( 'Order has been refunded via BORICA - Payment by Credit/Debit Card.', 'borica' ) );
					if ( 0 !== $borica_rest ) {
						$order->update_status( 'processing', __( 'Payment processing via BORICA - Payment by Credit/Debit Card.', 'borica' ) );
					}
				}
			}
		}

		$borica_currency_symbol = get_woocommerce_currency_symbol( $borica_currency );

		switch ( $request_cancel ) {
			case '00':
				if ( 0 === $borica_rest ) {
					$request_cancel_txt =
						'<span style="color:green;">' .
						__( 'Successful cancellation of payment (or refund).', 'borica' ) .
						' ' .
						__( 'Net amount paid by card ', 'borica' ) .
						number_format( $borica_rest, 2, '.', '' ) .
						' ' .
						$borica_currency_symbol .
						'</span>';
				} else {
					$request_cancel_txt =
						'<span style="color:green;">' .
						__( 'Amount successfully canceled ', 'borica' ) .
						number_format( $borica_rest, 2, '.', '' ) .
						' ' .
						$borica_currency_symbol .
						' ' .
						__( 'Net amount paid by card ', 'borica' ) .
						number_format( $borica_request_cancel, 2, '.', '' ) .
						' ' .
						$borica_currency_symbol .
						'</span>';
				}
				break;
			case '11':
				$request_cancel_txt =
					'<span style="color:red;">' .
					__( 'Payment cancellation request sent. The request has been rejected.', 'borica' ) .
					' ' .
					__( 'The request was to cancel the amount of: ', 'borica' ) .
					number_format( $borica_rest, 2, '.', '' ) .
					'. ' .
					__( 'In the event of an unsuccessful cancellation, the merchant may contact the servicing financial institution.', 'borica' ) .
					'</span>';
				break;
		}

		$data_drop          = array(
			'request_cancel' => $request_cancel,
			'cancel_amount'  => $response_amount,
		);
		$where_borica_order = array(
			'nonce' => $borica_nonce,
		);
		$borica_helper->update_borica_order( $data_drop, $where_borica_order );

		$result_change = array(
			'resultChange'      => 1,
			'requestCancelTxt'  => $request_cancel_txt,
			'resultChangeTitle' => __( 'Message', 'borica' ),
			'resultChangeText'  => __( 'The transaction status has changed', 'borica' ),
			'requestCancel'     => $request_cancel,
			'cancelAmount'      => $response_amount,
			'boricaNonce'       => $borica_nonce,
		);
	}

	echo ( wp_json_encode( $result_change ) );
	die();
}

/**
 * Handles the BORICA payment gateway response in WooCommerce.
 *
 * This function processes the POST request sent by the BORICA payment gateway,
 * validates the data, updates the order status, and displays the appropriate
 * messages to the user based on the result of the transaction.
 *
 * @return void
 */
function borica_woo_payment_gateway_impl() {
	if ( isset( $_GET['wc-api'] ) && 'borica_woo_payment_gateway_impl' === $_GET['wc-api'] ) {
		if ( isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] ) {
			$text_borica_order     = __( 'Your order number is:', 'borica' );
			$text_borica_card_info = __( 'Cardholder Information:', 'borica' );
			$text_borica_back_mail = __( 'We will send you an order confirmation email with details and tracking information.', 'borica' );
			$text_next             = __( 'Continue shopping', 'borica' );

			if ( isset( $_POST['ACTION'] ) ) {
				$borica_action = (string) htmlspecialchars( wp_unslash( $_POST['ACTION'] ), ENT_QUOTES, 'UTF-8' );
			} else {
				$borica_action = '';
			}
			if ( isset( $_POST['RC'] ) ) {
				$borica_rc = (string) htmlspecialchars( wp_unslash( $_POST['RC'] ), ENT_QUOTES, 'UTF-8' );
			} else {
				$borica_rc = '';
			}
			if ( isset( $_POST['STATUSMSG'] ) ) {
				$borica_statusmsg = (string) htmlspecialchars( wp_unslash( $_POST['STATUSMSG'] ), ENT_QUOTES, 'UTF-8' );
			} else {
				$borica_statusmsg = '';
			}
			if ( isset( $_POST['TERMINAL'] ) ) {
				$borica_terminal = (string) htmlspecialchars( wp_unslash( $_POST['TERMINAL'] ), ENT_QUOTES, 'UTF-8' );
			} else {
				$borica_terminal = '';
			}
			if ( isset( $_POST['TRTYPE'] ) ) {
				$borica_trtype = filter_var( wp_unslash( $_POST['TRTYPE'] ), FILTER_SANITIZE_NUMBER_INT );
			} else {
				$borica_trtype = '';
			}
			if ( isset( $_POST['AMOUNT'] ) ) {
				$borica_amount = filter_var( wp_unslash( $_POST['AMOUNT'] ), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
			} else {
				$borica_amount = '';
			}
			if ( isset( $_POST['CURRENCY'] ) ) {
				$borica_currency = (string) htmlspecialchars( wp_unslash( $_POST['CURRENCY'] ), ENT_QUOTES, 'UTF-8' );
			} else {
				$borica_currency = '';
			}
			if ( isset( $_POST['ORDER'] ) ) {
				$borica_order = (string) htmlspecialchars( wp_unslash( $_POST['ORDER'] ), ENT_QUOTES, 'UTF-8' );
			} else {
				$borica_order = '';
			}
			if ( isset( $_POST['TIMESTAMP'] ) ) {
				$borica_timestamp = (string) htmlspecialchars( wp_unslash( $_POST['TIMESTAMP'] ), ENT_QUOTES, 'UTF-8' );
			} else {
				$borica_timestamp = '';
			}
			if ( isset( $_POST['TRAN_DATE'] ) ) {
				$borica_tran_date = (string) htmlspecialchars( wp_unslash( $_POST['TRAN_DATE'] ), ENT_QUOTES, 'UTF-8' );
			} else {
				$borica_tran_date = '';
			}
			if ( isset( $_POST['APPROVAL'] ) ) {
				$borica_approval = (string) htmlspecialchars( wp_unslash( $_POST['APPROVAL'] ), ENT_QUOTES, 'UTF-8' );
			} else {
				$borica_approval = '';
			}
			if ( isset( $_POST['RRN'] ) ) {
				$borica_rrn = (string) htmlspecialchars( wp_unslash( $_POST['RRN'] ), ENT_QUOTES, 'UTF-8' );
			} else {
				$borica_rrn = '';
			}
			if ( isset( $_POST['INT_REF'] ) ) {
				$borica_int_ref = (string) htmlspecialchars( wp_unslash( $_POST['INT_REF'] ), ENT_QUOTES, 'UTF-8' );
			} else {
				$borica_int_ref = '';
			}
			if ( isset( $_POST['LANG'] ) ) {
				$borica_lang = (string) htmlspecialchars( wp_unslash( $_POST['LANG'] ), ENT_QUOTES, 'UTF-8' );
			} else {
				$borica_lang = '';
			}
			if ( isset( $_POST['PARES_STATUS'] ) ) {
				$borica_pares_status = (string) htmlspecialchars( wp_unslash( $_POST['PARES_STATUS'] ), ENT_QUOTES, 'UTF-8' );
			} else {
				$borica_pares_status = '';
			}
			if ( isset( $_POST['AUTH_STEP_RES'] ) ) {
				$borica_auth_step_res = (string) htmlspecialchars( wp_unslash( $_POST['AUTH_STEP_RES'] ), ENT_QUOTES, 'UTF-8' );
			} else {
				$borica_auth_step_res = '';
			}
			if ( isset( $_POST['CARDHOLDERINFO'] ) ) {
				$borica_cardholderinfo = (string) htmlspecialchars( wp_unslash( $_POST['CARDHOLDERINFO'] ), ENT_QUOTES, 'UTF-8' );
			} else {
				$borica_cardholderinfo = '';
			}
			if ( isset( $_POST['ECI'] ) ) {
				$borica_eci = (string) htmlspecialchars( wp_unslash( $_POST['ECI'] ), ENT_QUOTES, 'UTF-8' );
			} else {
				$borica_eci = '';
			}
			if ( isset( $_POST['CARD'] ) ) {
				$borica_card = (string) htmlspecialchars( wp_unslash( $_POST['CARD'] ), ENT_QUOTES, 'UTF-8' );
			} else {
				$borica_card = '';
			}
			if ( isset( $_POST['CARD_BRAND'] ) ) {
				$borica_card_brand = (string) htmlspecialchars( wp_unslash( $_POST['CARD_BRAND'] ), ENT_QUOTES, 'UTF-8' );
			} else {
				$borica_card_brand = '';
			}
			if ( isset( $_POST['NONCE'] ) ) {
				$borica_nonce = (string) htmlspecialchars( wp_unslash( $_POST['NONCE'] ), ENT_QUOTES, 'UTF-8' );
			} else {
				$borica_nonce = '';
			}
			if ( isset( $_POST['P_SIGN'] ) ) {
				$borica_p_sign = (string) htmlspecialchars( wp_unslash( $_POST['P_SIGN'] ), ENT_QUOTES, 'UTF-8' );
			} else {
				$borica_p_sign = '';
			}

			if (
				'' !== $borica_timestamp &&
				'' !== $borica_action &&
				'' !== $borica_rc &&
				'' !== $borica_nonce
			) {
				get_header();
				echo '<div id="borica_primary" style="max-width: 1140px;margin-left: auto;margin-right: auto;">';
				echo '<div id="borica_main">';

				$borica_helper      = new Borica_Helper();
				$created_at         = date( 'Y-m-d H:i:s', strtotime( $borica_timestamp ) );
				$data_borica_order  = array(
					'action'     => $borica_action,
					'rc'         => $borica_rc,
					'created_at' => $created_at,
					'status'     => $borica_statusmsg,
					'rrn'        => $borica_rrn,
					'int_ref'    => $borica_int_ref,
					'approval'   => $borica_approval,
				);
				$where_borica_order = array(
					'nonce' => $borica_nonce,
				);
				$borica_helper->update_borica_order( $data_borica_order, $where_borica_order );

				$borica_debug = (int) get_option( 'borica_debug' );
				if ( 1 === $borica_debug ) {
					$base_url = get_site_url();
					$logger   = new Borica_Logger();
					$logger->log(
						array(
							'2.Borica_Woo_Payment_Gateway.borica_back' => array(
								'ACTION'         => $borica_action,
								'RC'             => $borica_rc,
								'STATUSMSG'      => $borica_statusmsg,
								'TERMINAL'       => $borica_terminal,
								'TRTYPE'         => $borica_trtype,
								'AMOUNT'         => $borica_amount,
								'CURRENCY'       => $borica_currency,
								'ORDER'          => $borica_order,
								'TIMESTAMP'      => $borica_timestamp,
								'TRAN_DATE'      => $borica_tran_date,
								'APPROVAL'       => $borica_approval,
								'RRN'            => $borica_rrn,
								'INT_REF'        => $borica_int_ref,
								'LANG'           => $borica_lang,
								'PARES_STATUS'   => $borica_pares_status,
								'AUTH_STEP_RES'  => $borica_auth_step_res,
								'CARDHOLDERINFO' => $borica_cardholderinfo,
								'ECI'            => $borica_eci,
								'CARD'           => $borica_card,
								'CARD_BRAND'     => $borica_card_brand,
								'NONCE'          => $borica_nonce,
								'P_SIGN'         => $borica_p_sign,
							),
						),
					);
				}

				$borica_order_origin = '';
				$order_row           = $borica_helper->get_borica_order( $borica_nonce );
				if ( count( $order_row ) > 0 ) {
					$borica_order_origin = $order_row['increment_id'];
				}
				$borica_unsuccess_message = (string) get_option( 'borica_unsuccess_message' );
				$borica_success_message   = (string) get_option( 'borica_success_message' );
				if ( 0 === (int) $borica_action && '00' === $borica_rc ) {
					$check_authorization =
						$borica_helper->check_authorization(
							$borica_p_sign,
							$borica_action,
							$borica_rc,
							$borica_approval,
							$borica_terminal,
							$borica_trtype,
							$borica_amount,
							$borica_currency,
							$borica_order,
							$borica_rrn,
							$borica_int_ref,
							$borica_pares_status,
							$borica_eci,
							$borica_timestamp,
							$borica_nonce
						);
					if ( $check_authorization ) {
						$order = wc_get_order( $borica_order_origin );
						$order->add_order_note( __( 'Payment processing via BORICA - Payment by Credit/Debit Card.', 'borica' ) );
						$order->update_status( 'processing', __( 'Payment processing via BORICA - Payment by Credit/Debit Card.', 'borica' ) );
						wc_reduce_stock_levels( $borica_order_origin );

						echo '<div style="font-weight:bold;font-size:22px;">';
						echo esc_html( $borica_success_message );
						echo '</div>';
						echo '<div>';
						echo esc_html( __( 'Cardholder Information:', 'borica' ) . '&nbsp;' );
						echo '<strong>';
						echo esc_html( $borica_cardholderinfo );
						echo '</strong>';
						echo '</div>';
						echo '<div>';
						echo esc_html( __( 'Your order number is:', 'borica' ) . '&nbsp;' );
						echo '<strong>';
						echo esc_html( $borica_order_origin );
						echo '</strong>';
						echo '</div>';
						echo '<div>';
						echo esc_html( __( 'We will send you an order confirmation email with details and tracking information.', 'borica' ) );
						echo '</div>';
					} else {
						$order = wc_get_order( $borica_order_origin );
						$order->update_status( 'failed', __( 'Payment failed via BORICA - Payment by Credit/Debit Card.', 'borica' ) );

						echo '<div style="font-weight:bold;font-size:22px;">';
						echo '<span style="color:red;">' . esc_html( $borica_unsuccess_message ) . '</span>';
						echo '</div>';
						echo '<div>';
						echo esc_html( __( 'Your order number is:', 'borica' ) . '&nbsp;' );
						echo '<strong>';
						echo esc_html( $borica_order_origin );
						echo '</strong>';
						echo '</div>';
					}
				} else {
					$order = wc_get_order( $borica_order_origin );
					$order->update_status( 'failed', __( 'Payment failed via BORICA - Payment by Credit/Debit Card.', 'borica' ) );

					echo '<div style="font-weight:bold;font-size:22px;">';
					echo '<span style="color:red;">' . esc_html( $borica_unsuccess_message ) . '</span>';
					echo '</div>';
					echo '<div>';
					echo esc_html( __( 'Cardholder Information:', 'borica' ) . '&nbsp;' );
					echo '<strong>';
					echo esc_html( $borica_cardholderinfo );
					echo '</strong>';
					echo '</div>';
					echo '<div>';
					echo esc_html( __( 'Your order number is:', 'borica' ) . '&nbsp;' );
					echo '<strong>';
					echo esc_html( $borica_order_origin );
					echo '</strong>';
					echo '</div>';
				}
				$base_url = get_site_url();

				$borica_payment_response = (int) get_option( 'borica_payment_response' );
				if ($borica_payment_response === 1) {
					$order = wc_get_order( $borica_order_origin );
					?>
					<br />
					<hr />
					<div class="woocommerce-order">
						<?php
						if ( $order ) {
							do_action( 'woocommerce_before_thankyou', $order->get_id() );
							?>
							<?php if ( $order->has_status( 'failed' ) ) { ?>
								<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>
								<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
									<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
									<?php if ( is_user_logged_in() ) : ?>
										<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
									<?php endif; ?>
								</p>
							<?php } else { ?>
								<?php wc_get_template( 'checkout/order-received.php', array( 'order' => $order ) ); ?>
								<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">
									<li class="woocommerce-order-overview__order order">
										<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
										<strong><?php esc_html_e( $order->get_order_number() ); ?></strong>
									</li>
									<li class="woocommerce-order-overview__date date">
										<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
										<strong><?php esc_html_e( wc_format_datetime( $order->get_date_created() ) ); ?></strong>
									</li>
									<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
										<li class="woocommerce-order-overview__email email">
											<?php esc_html_e( 'Email:', 'woocommerce' ); ?>
											<strong><?php esc_html_e( $order->get_billing_email() ); ?></strong>
										</li>
									<?php endif; ?>
									<li class="woocommerce-order-overview__total total">
										<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
										<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
									</li>
									<?php if ( $order->get_payment_method_title() ) : ?>
										<li class="woocommerce-order-overview__payment-method method">
											<?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
											<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
										</li>
									<?php endif; ?>
								</ul>
							<?php } ?>
							<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>
							<?php $customer_id = $order->get_customer_id(); ?>
							<?php if ( $customer_id > 0 ) { ?>
								<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
							<?php } ?>
						<?php } else { ?>
							<?php wc_get_template( 'checkout/order-received.php', array( 'order' => false ) ); ?>
						<?php } ?>
					</div>
					<?php
				}

				echo '<div style="font-weight:bold;font-size:18px;padding-bottom:20px;">';
				echo '<a href="' . esc_url( $base_url ) . '">';
				echo '<span>' . esc_html( __( 'Continue shopping', 'borica' ) ) . '</span>';
				echo '</a>';
				echo '</div>';

				echo '</div>';
				echo '</div>';
				get_footer();
				die;
			} else {
				wp_die(
					__('You do not have sufficient permissions to access this page.', 'borica'),
					__('Unauthorized Access', 'borica'),
					[
						'response' => 403,
						'back_link' => true,
					]
				);
			}
		} else {
			wp_die(
				__('Invalid request method. This page only accepts POST requests.', 'borica'),
				__('Invalid Request', 'borica'),
				[
					'response' => 405,
					'back_link' => true,
				]
			);
		}
	}
}

/**
 * Restores the WooCommerce cart when an order is canceled.
 *
 * This function is designed to be triggered when an order is canceled. It
 * retrieves the order by its ID, clears the current cart, and repopulates
 * the cart with the items from the canceled order. Finally, it redirects the
 * user to the cart page.
 *
 * @param int $order_id The ID of the order that was canceled.
 *
 * @return void
 */
function borica_restore_cart_on_order_cancel( $order_id ) {
	$order = wc_get_order( $order_id );
	if ( ! $order ) {
		return;
	}
	if ( ! WC()->cart ) {
		return;
	}
	WC()->cart->empty_cart();
	foreach ( $order->get_items() as $item_id => $item ) {
		$product_id = $item->get_product_id();
		$quantity   = $item->get_quantity();
		WC()->cart->add_to_cart( $product_id, $quantity );
	}
	wp_safe_redirect( wc_get_cart_url() );
	exit;
}

/**
 * Disables auto-update for the "borica-payments" plugin.
 *
 * This function is hooked into the 'auto_update_plugin' filter to prevent WordPress from
 * automatically updating the "borica-payments" plugin. It checks the plugin slug and returns
 * false to disable auto-update for this specific plugin.
 *
 * @param bool   $update Whether the plugin should be auto-updated. Default true.
 * @param object $item   An object containing plugin data. Includes the 'slug' property
 *                       to identify the plugin.
 *
 * @return bool False if the plugin is "borica-payments" to prevent auto-update;
 *              otherwise, returns the original $update value to allow auto-update.
 */
function borica_disable_auto_update_for_plugin($update, $item) {
	if ($item->slug === 'borica-payments') {
		return false;
	}
	return $update;
}

/**
 * Adds the order ID as the transaction ID for orders using the Borica payment gateway.
 *
 * This function is triggered when an order is processed during checkout. If the payment method
 * for the order is "borica_woo_payment_gateway", the order ID is set as the transaction ID
 * using WooCommerce's internal methods.
 *
 * @param int $order_id The ID of the order being processed.
 *
 * @return void
 */
function borica_add_transaction_id_to_order($order_id) {
	$order = wc_get_order($order_id);
	if ($order && $order->get_payment_method() === 'borica_woo_payment_gateway') {
		$transaction_id = $order_id;
		$order->set_transaction_id($transaction_id);
		$order->save();
	}
}