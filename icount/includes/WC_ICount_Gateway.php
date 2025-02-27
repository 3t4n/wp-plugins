<?php

namespace WC_Gateway_ICount;

use Exception;

require_once 'WC_ICount_Logger.php';
require_once 'WC_ICount_Locker.php';

class WC_ICount_Gateway extends \WC_Payment_Gateway
{
	const
		META_KEY_ICOUNT_DOC_ID = 'icount-doc-id',
		META_KEY_ORDER_PAYPAGE_ID_FOR_CREATE_DOC = 'order-paypage-id-for-create-doc',
		META_KEY_IS_TAX_ENABLED = 'is_taxable_enabled',
		SECRET_VERIFY = 'secret-verify',
		META_KEY_SECRET_VERIFY = '_' . self::SECRET_VERIFY,// '_' do it hidden
		DO_NOT_CREATE_DOCS_OPTION = '',
		NOT_SELECTED_PAYPAGE_OPTION = '';

	private WC_ICount_Logger $logger;

	private ?string $token_access;
		
	private array $doctype_map;

	private function _allowed_doctypes(): array
	{
		return [
			1 => [self::DO_NOT_CREATE_DOCS_OPTION, 'invrec'],
			2 => [self::DO_NOT_CREATE_DOCS_OPTION, 'invrec', 'receipt'],
			3 => [self::DO_NOT_CREATE_DOCS_OPTION, 'invrec'],
			4 => [self::DO_NOT_CREATE_DOCS_OPTION, 'receipt', 'trec'],
			5 => [self::DO_NOT_CREATE_DOCS_OPTION, 'receipt'],
			null => [self::DO_NOT_CREATE_DOCS_OPTION],
		][$this->_authorized_business_type_id()];
	}

	private function _authorized_business_type_id()
	{
		return $this->get_option('company_info', [])['business_type_id'] ?? null;
	}

	private function _invoice_type_default(): string
	{
		return $this->_allowed_doctypes()[1] ?? self::DO_NOT_CREATE_DOCS_OPTION;
	}

	public function __construct()
	{

		$this->doctype_map = [
			self::DO_NOT_CREATE_DOCS_OPTION => __('Don\'t create document', 'woocommerce-icount'),//on the top - to do it first in <select> and selected by default
			'invrec' => __('Invoice & Receipt', 'woocommerce-icount'),
			'receipt' => __('Receipt', 'woocommerce-icount'),
			'trec' => __('Donation', 'woocommerce-icount'),
		];
				
		$this->id = PLUGIN_ID;
		$this->has_fields = false;
		$this->method_title = __('iCount System', 'woocommerce-icount');
		$this->method_description = __('iCount Credit Card Secure Payment', 'woocommerce-icount');
		$this->init_form_fields();
		$this->init_settings();

		$this->token_access = $this->get_option('token_access') ?: null;
		$this->logger = new WC_ICount_Logger($this->get_option('is_debug_log') !== 'no');
		$this->title = $this->get_option('title');
		$this->description = $this->get_option('description');
		
		if ($this->get_option('hide_icon') == 'no') {
			$this->icon = ICOUNT_PAYMENT_PLUGIN_URL . '/assets/images/icount.png';
		}

		
add_action('admin_notices',
	function () {
		
	   try {				
			@[
				'cid' => $cid,
				'user' => $user,
				'token_masked' => $token_masked,
				'company_info' => [
					'business_type_id' => $business_type_id,
					'is_vat_exempt' => $is_vat_exempt,
				],
			] = $this->auth_info() ?? [];
				
		} catch (\Throwable $e) {		
		   
		    $admin_url = admin_url('admin.php?page=wc-settings&tab=checkout&section=' . PLUGIN_ID);
		    $doc_url = 'http://www.icount.co.il/help/integration/woocommerce';
		      
			printf( '<div class="notice notice-error"><p>iCount Payment Gateway Error: Missing Access Token. Add token in <a href="%1$s">settings</a> View <a target=_blank href="%2$s">documentation</a></p></div>', esc_url($admin_url), esc_url($doc_url));							
		}												
	}		   
);
		
		
		add_action(
			'woocommerce_update_options_payment_gateways_' . $this->id,
			[$this, 'process_admin_options']
		);

		add_filter('woocommerce_settings_api_sanitized_fields_' . $this->id,
			function ($settings) {
				foreach ($settings as $k => $v) {
					if (strpos($k, '__') === 0)
						unset($settings[$k]);
				}
				return $settings;
			});

		add_action(
			'admin_enqueue_scripts',
			function () {
				$screen = get_current_screen();

				if (!is_null($screen) && 'woocommerce_page_wc-settings' === $screen->id) {
					wp_enqueue_script(
						'icount_gateway_iframe_admin_settings',
						ICOUNT_PAYMENT_PLUGIN_URL . '/assets/js/admin_settings.js',
						['jquery-ui-dialog'],
						ICOUNT_PAYMENT_PLUGIN_WOOCO_INFO['ic_version'],
					);
					wp_enqueue_style(
						'icount_gateway_iframe_admin_settings_css',
						ICOUNT_PAYMENT_PLUGIN_URL . '/assets/css/admin_settings.css',
						[],
						ICOUNT_PAYMENT_PLUGIN_WOOCO_INFO['ic_version']
					);
				}
			});

		add_action(
			"woocommerce_api_{$this->id}-token_access",
			function () {
				$access_token = $this->get_field_value('input_token_access', []);
				$this->token_access = $access_token;
				try {
					@[
						'cid' => $cid,
						'user' => $user,
						'token_masked' => $token_masked,
						'company_info' => [
							'business_type_id' => $business_type_id,
							'is_vat_exempt' => $is_vat_exempt,
						],
					] = $this->auth_info() ?? [];
					$this->update_option('token_access', $access_token);
					$this->update_option(
						'company_info',
						[
							'id' => $cid,
							'business_type_id' => (int)$business_type_id,
							'is_vat_exempt' => (bool)$is_vat_exempt,
						]
					);
					$this->update_option('paypage_id', self::NOT_SELECTED_PAYPAGE_OPTION);
					$this->update_option('invoice_type', $this->_invoice_type_default());

					$response = [
						'status' => true,
						'cid' => $cid,
						'user' => $user,
						'token_masked' => $token_masked,
					];
				} catch (\Throwable $e) {
					$response = [
						'status' => false,
						'info' => $e->getMessage(),
					];
				}
				wp_send_json($response);
			}
		);

		add_action(
			'woocommerce_api_' . $this->id . '-ipn_response',
			function () {
				$posted = wp_unslash(
					array_filter(
						$_REQUEST,
						fn($k) => in_array(
							$k,
							[
								self::SECRET_VERIFY,
								'order-id',
								'confirmation_code',
								'sum',
								'num_of_payments',
								'cc_type',
								'cc_last4',
								'multipass',
								'currency_code',
								'first_payment',
								
								'interest_rate',
								'total_interest',
								'total_paid'
							]
						),
						ARRAY_FILTER_USE_KEY
					)
				);
				$secret_verify = $posted[self::SECRET_VERIFY] ?: null;
				$order_id = $posted['order-id'];
				if (
					!is_null($secret_verify) &&
					ctype_digit($order_id) &&
					($order = wc_get_order($order_id)) &&
					$order->meta_exists(self::META_KEY_SECRET_VERIFY) &&
					hash_equals($order->get_meta(self::META_KEY_SECRET_VERIFY), $secret_verify)
				) {
					$confirmation_code = $posted['confirmation_code'] ?: null;

					$order->update_meta_data(
						'_icount_transaction_details',
						($posted['sum'] != 0
							? [
								'cc' => [
									'sum' => ($posted['total_interest']) ? $posted['sum'] + $posted['total_interest'] : $posted['sum'],
									'num_of_payments' => $posted['num_of_payments'],
									'cc_type' => $posted['cc_type'],
									'cc_last4' => $posted['cc_last4'],
									'confirmation_code' => $posted['confirmation_code']
								],
							] : []
						)
						+
						(array_key_exists('multipass', $posted)
							? ['multipass' => $posted['multipass'],]
							: []
						)
					);
					$order->save();

					$order->payment_complete($confirmation_code);

					$transaction_notes =
						array_intersect_key(
							[
								'sum' => __('Total', 'woocommerce-icount'),
								'currency_code' => __('Currency', 'woocommerce-icount'),
								'num_of_payments' => __('Number of payments', 'woocommerce-icount'),
								'first_payment' => __('First Payment', 'woocommerce-icount'),
								'cc_last4' => __('Card Number', 'woocommerce-icount'),
								'cc_type' => __('Card Type', 'woocommerce-icount'),
								'confirmation_code' => __('CC Confirmation Code', 'woocommerce-icount'),
							],
							$posted
						);

					array_walk($transaction_notes, function (&$v, string $k) use ($posted) {
						$v = "$v: {$posted[$k]}";
					});

					$order->add_order_note(
						implode("\n",
							[__('Transaction Details', 'woocommerce-icount') . ':'] +
							$transaction_notes
						)
					);
				} else {
					$this->logger->log("Possible fraud detected for order: '{$order_id}' and secret-verify:'{$secret_verify}'");
				}
			}
		);

		
		

		
add_action(
			'woocommerce_receipt_' . $this->id,
			function ($order_id) {

				$order = wc_get_order($order_id);

				$atomic_lock = new WC_ICount_Locker("order_{$order_id}", false);
				if (!$order->meta_exists(self::META_KEY_SECRET_VERIFY)) {
					$order->add_meta_data(self::META_KEY_SECRET_VERIFY, wp_generate_password(20), true);
					$order->save_meta_data();
				}
				unset($atomic_lock);

				try {
					wp_enqueue_script(
						'icount_gateway_iframe_checkout',
						ICOUNT_PAYMENT_PLUGIN_URL . '/assets/js/checkout.js',
						['jquery'],
						ICOUNT_PAYMENT_PLUGIN_WOOCO_INFO['ic_version'],
						true
					);
					
					
					$payment_url = esc_url(
							$this->__wp_remote_post(
								'woocommerce/generate_sale',
								ICOUNT_PAYMENT_PLUGIN_WOOCO_INFO +
								[
									'wc_order_id' => $order->get_id(),
									'paypage_id' => (int)$this->get_option('paypage_id'),
								 	'lang' => (substr(get_bloginfo("language"), 0, 2) == 'he' ? 'he' : 'en'),
									'ipn_url' => add_query_arg(
										array_map(
											'urlencode',
											[
												'wc-api' => $this->id . '-ipn_response',
												'order-id' => $order->get_id(),
												self::SECRET_VERIFY => $order->get_meta(self::META_KEY_SECRET_VERIFY), 
											]
										),
										site_url('/')
									),
									'client_name' => $order->get_billing_company() ?? $order->get_formatted_billing_full_name(),
									'first_name' => $order->get_billing_first_name(),
									'last_name' => $order->get_billing_last_name(),
									'email' => $order->get_billing_email(),
									'phone' => $order->get_billing_phone(),
									'currency_code' => $order->get_currency(),
									'delivery_methods' => [],

									'items' => [
										[
											'description' => "Order #{$order->get_order_number()}",
											'unitprice_incl' => $order->get_total(),
											'quantity' => 1,
										],
									],
									'is_iframe' => 1,
								]
							)['sale_url']
					);
					
					$thankyou_url = esc_url($order->get_checkout_order_received_url());					
					echo '<div class="icount_gateway_iframe_checkout"  data-payment-url="' . esc_url($payment_url)  . '" data-thankyou-url="' . esc_url($thankyou_url) . '"></div>';					

				} catch (Exception $e) {
				}
			}
		);
	

		add_action(
			"woocommerce_api_{$this->id}-paypage_generate",
			function () {
				static $paypage_name = 'Woocommerce First Paypage (ILS)';
				try {
					$api_response = [
						'status' => true,
						'paypage_name' => $paypage_name,
						'paypage_id' => $this->__wp_remote_post(
							'paypage/create',
							[
								'page_name' => $paypage_name,
								'currency_id' => 5, // currency ILS
							],
						)['paypage_id'],
						'info' => '',
					];

				} catch (Exception $e) {
					$api_response['status'] = false;
					$api_response['info'] = "Unsuccessful create paypage response: {$e->getMessage()}";
				}

				wp_send_json($api_response);
			}
		);

		// sync docs
		$paypal_payment_method_id = 'paypal';

		$is_our_case_doc_sync_fn = fn(\WC_Order $order) => in_array($order->get_payment_method(), [
			$paypal_payment_method_id,
			$this->id,
		]);

		add_action(
			'woocommerce_new_order',
			function (int $order_id, \WC_Order $order) {
				$order->add_meta_data(
					self::META_KEY_IS_TAX_ENABLED,
					wc_tax_enabled(),
					true
				);
				$order->save_meta_data();
			},
			0,
			2
		);

		add_action(
			'woocommerce_pre_payment_complete',
			function (int $order_id) {
				$order = wc_get_order($order_id);
				$order->add_meta_data(
					self::META_KEY_ORDER_PAYPAGE_ID_FOR_CREATE_DOC,
					(int)$this->get_option('paypage_id'),
					true
				);
				$order->save_meta_data();
			},
			0
		);

		add_action(
			'woocommerce_order_status_changed',
			function (int $order_id, string $from_status, string $to_status, \WC_Order $order) use (&$is_our_case_doc_sync_fn, &$paypal_payment_method_id) {
				$doctype = $this->get_option('invoice_type');
				if (
					empty($doctype)
					||
					!in_array($doctype, $this->_allowed_doctypes())
					||
					!in_array($to_status, [
						'processing',
						'completed',
						'on-hold',
					])
					||
					!$is_our_case_doc_sync_fn($order)
					||
					$order->meta_exists(self::META_KEY_ICOUNT_DOC_ID)
				)
					return;

				$income_type_id = null;
				$client_type_id = null;
				try {
					@[
						'paypage_info' => [
							'income_type_id' => $income_type_id,
							'client_type_id' => $client_type_id,
						],
					] = $this->__wp_remote_post(
						'paypage/info',
						[
							'paypage_id' => $order->get_meta(self::META_KEY_ORDER_PAYPAGE_ID_FOR_CREATE_DOC)
								?: $this->get_option('paypage_id'),
						]
					);
				} catch (Exception $e) {
				}

$items = [];
$all_items_exempt = true;
$generic_item_round_total_incvat = $order->get_total();
$decimals = wc_get_price_decimals(); 

$items = [];
        $all_items_exempt = true;
        $generic_item_round_total_incvat = $order->get_total();

/** @var \WC_Order_Item_Product|\WC_Order_Item_Shipping|\WC_Order_Item_Fee $item */
foreach ($order->get_items(['line_item', 'shipping', 'fee']) as $item) {
    $item_total_incvat = $order->get_item_total($item, true);
    $generic_item_round_total_incvat -= $item_total_incvat * $item->get_quantity();
    $item_total = (float) $item->get_total();
    $item_taxes = $item->get_taxes();
    $total_tax = isset($item_taxes['total']) ? array_sum($item_taxes['total']) : 0;
    $item_tax_rate_percents = ($item_total != 0) ? ($total_tax / $item_total) * 100 : 0;
    if ($item_tax_rate_percents > 0) {
        $all_items_exempt = false;
    }

    $items[] = array_filter(
        [
            'description' => $item->get_name(),
            'quantity' => $item->get_quantity(),
            'sku' => $item instanceof \WC_Order_Item_Product
                ? ($item->get_product()->get_sku() ?: null)
                : null,
            'unitprice_incvat' => $item_total_incvat,
        ] +
        ($order->get_meta(self::META_KEY_IS_TAX_ENABLED)
            ? [
                'taxes' => [0 => $item_tax_rate_percents],
                'tax_exempt' => $item_tax_rate_percents == 0,
            ]
            : [
                'tax_exempt' => $order->get_billing_country() != 'IL',
            ]
        ),
        fn($v) => !is_null($v)
    );
}

if (isset($_REQUEST['total_interest'])) {
    $total_interest = round((float) $_REQUEST['total_interest'], $decimals);
    $items[] = [
        'description' => __('Total Interest', 'woocommerce-icount'),
        'quantity' => 1,
        'unitprice_incvat' => $total_interest,
        'tax_exempt' => $all_items_exempt,
    ];
}

				try {
$custom_hwc_map = [

    sprintf( 
		/* translators: %s: Order number */
		__('Order Number: %s', 'woocommerce-icount'), 
		$order->get_order_number()
	) => $order->get_order_number(),	

	sprintf( 
		/* translators: %s: Notes */
		__('Notes: %s', 'woocommerce-icount'), 
		$order->get_customer_note()
	) => $order->get_customer_note(),		

	sprintf( 
		/* translators: %s: HWC */
		__('&nbsp; %s', 'woocommerce-icount'), 
		get_post_meta($order->get_id(), 'hwc', true)
	) => get_post_meta($order->get_id(), 'hwc', true)		
	
];

$custom_hwc = array_filter(array_map(
    fn($template, $value) => !empty($value) ? sprintf($template, $value) : null,
    array_keys($custom_hwc_map),
    $custom_hwc_map
));

$hwc = implode("\n", $custom_hwc);

					@[
						'doctype' => $doctype,
						'docnum' => $docnum,
					] = $this->__wp_remote_post(
						'doc/create',
						array_filter(
							[
								'doctype' => $doctype,
								'cc_page_id' => $order->get_meta(self::META_KEY_ORDER_PAYPAGE_ID_FOR_CREATE_DOC)
								?: $this->get_option('paypage_id'),
								'wc_order_id' => $order->get_id(),
								'client_type_id' => $client_type_id,//MAXIM: missing in API doc, but Konstantin approved
								'email' => $order->get_billing_email(),
								'client_name' => $order->get_billing_company() ?: $order->get_formatted_billing_full_name(),
								'client_address' => WC()->countries->get_formatted_address($order->get_address('billing'), ', '),
								'shipping_address' => WC()->countries->get_formatted_address($order->get_address('shipping'), ', '),
								'send_email' => $this->get_option('send_invoice_by_mail') === 'yes' ? 1 : 0,
								'email_to' => $order->get_billing_email(),
								'items' => $items,
								'currency_code' => $order->get_currency(),
								'income_type_id' => $income_type_id,
								'income_type_name' => wp_parse_url(site_url(), PHP_URL_HOST),
	    						 'hwc' => $hwc,
								'sanity_string' => base64_encode(
									hash(
										'md5',
										$order->get_id() . ";WooHost:" . wp_parse_url(site_url(), PHP_URL_HOST),
										true
									),
								),
							]
							+ ($order->get_payment_method() === $paypal_payment_method_id
								? [
									'paypal' => [
										'sum' => $order->get_total(),
										'txn_id' => $order->get_transaction_id(),
										'payer_name' => $order->get_formatted_billing_full_name(),
									],
								]
								: ($order->get_meta('_icount_transaction_details') ?: []) + [
									'sum' => $order->get_total(),
									'confirmation_code' => $order->get_transaction_id(),
								]
							),
							fn($v) => !is_null($v)
						)
					);

					$order->update_meta_data(
						self::META_KEY_ICOUNT_DOC_ID,
						[
							'doctype' => $doctype,
							'docnum' => $docnum,
						]
					);
					$order->save();

				} catch (Exception $e) {
				}
			},
			0, 4
		);

		add_action(
			'woocommerce_admin_order_data_after_payment_info',
			function (\WC_Order $order) {
				@[
					'doctype' => $doctype,
					'docnum' => $docnum,
				] = $order->get_meta(self::META_KEY_ICOUNT_DOC_ID) ?: [];

				if (!is_null($doctype) && array_key_exists($doctype, $this->doctype_map)) {
					echo '<p>'
						. esc_html(__('ICount document', 'woocommerce-icount'))
						. ': '
						. '<a href="'
						. esc_url(
							add_query_arg(
								[
									'wc-api' => "{$this->id}-redirect_to_doc",
									'order-id' => $order->get_id(),
								],
								site_url('/')
							)
						)
						. '">'
						. esc_html("{$this->doctype_map[$doctype]} #{$docnum}")
						. '</a>'
						. '</p>';
				}
			}
		);
		add_action(
			'woocommerce_api_' . $this->id . '-redirect_to_doc',
			function () {
				$order_id = (isset($_REQUEST['order-id'])) ? wp_kses_post(wp_unslash($_REQUEST['order-id'])) : null;
				if (
					ctype_digit($order_id) &&
					($order = wc_get_order($order_id)) &&
					$order->meta_exists(self::META_KEY_ICOUNT_DOC_ID)
				) {
					@[
						'doctype' => $doctype,
						'docnum' => $docnum,
					] = $order->get_meta(self::META_KEY_ICOUNT_DOC_ID);

					try {
						wp_redirect(
							$this->__wp_remote_post(
								'doc/get_doc_url',
								[
									'doctype' => $doctype,
									'docnum' => $docnum,
								]
							)['doc_url']
						);
					} catch (Exception $e) {
					}
				}
			}
		);
	}

	public function init_form_fields()
	{
		$allowed_doctypes = $this->_allowed_doctypes();

		$this->form_fields =
			[
				'enabled' => [
					'title' => __('Enable/Disable', 'woocommerce-icount'),
					'type' => 'checkbox',
					'label' => ' ',
					'default' => 'yes',
				],
				'title' => [
					'title' => __('Title', 'woocommerce-icount'),
					'type' => 'text',
					'description' => __('This controls the title which the user sees during checkout', 'woocommerce-icount'),
					'default' => __('Pay with Debit or Credit Card', 'woocommerce-icount'),
					'desc_tip' => true,
				],
				'description' => [
					'title' => __('Description', 'woocommerce-icount'),
					'type' => 'textarea',
					'default' => __('Pay securely by Debit or Credit Card through iCount', 'woocommerce-icount'),
				],

				'__token_access' => [
					'title' => __('Token Access', 'woocommerce-icount'),
					'type' => 'token_access', /** @see generate_token_access_html */
					'description' => __('Enter your iCount API credentials to generate Access Token', 'woocommerce-icount'),
					'desc_tip' => true,
				],

				'paypage_id' => [
					'title' => __('Paypage ID', 'woocommerce-icount'),
					'type' => 'paypage',
					'description' => __('Your payment page ID created in iCount System', 'woocommerce-icount'),
					'default' => self::NOT_SELECTED_PAYPAGE_OPTION,
					'desc_tip' => true,
				],

				'payment_mode' => [
					'title' => __('Payment mode', 'woocommerce-icount'),
					'type' => 'select',
					'options' => [
						'iframe' => __('iFrame when possilbe (onsite)', 'woocommerce-icount'),
						'redirect' => __('Always redirect (offsite)', 'woocommerce-icount'),
					],
					'default' => 'iframe',
				],			
			
				'hide_icon' => [
					'title' => __('Hide iCount Icon In The Checkout Page', 'woocommerce-icount'),
					'type' => 'checkbox',
					'label' => ' ',
					'default' => 'no',
				],

				'invoice_type' => [
					'title' => __('Invoice Type', 'woocommerce-icount'),
					'type' => 'select',
					'options' => array_filter(
						$this->doctype_map,
						fn(string $k) => in_array($k, $allowed_doctypes),
						ARRAY_FILTER_USE_KEY
					),
					'class' => 'invoice_options',
					'default' => $this->_invoice_type_default(),
				],

				'send_invoice_by_mail' => [
					'title' => __('Send Invoice by Mail', 'woocommerce-icount'),
					'type' => 'checkbox',
					'label' => __('Send the invoice to the customer by email.', 'woocommerce-icount'),
					'default' => 'yes',
				],

				'is_debug_log' => [
					'title' => __('Debug log', 'woocommerce-icount'),
					'type' => 'checkbox',
					'label' => ' ',
					'default' => 'no',
				],
				'__TAX_INFO_title' => [
					'title' => __('Tax details', 'woocommerce-icount') . ':',
					'type' => 'title',
				],
				'__TAX_INFO' => [
					'type' => 'tax_info',
				],
			];
	}

	public function process_admin_options(): bool
	{
		$atomic_lock = new WC_ICount_Locker(static::class . '::' . __METHOD__, false);
		//Disconnect previous paypage (if was selected):
		$paypage_id_prev = $this->get_option('paypage_id');
		if ($paypage_id_prev !== self::NOT_SELECTED_PAYPAGE_OPTION) {
			try {
				$this->__wp_remote_post(
					'woocommerce/disconnect',
					ICOUNT_PAYMENT_PLUGIN_WOOCO_INFO +
					[
						'paypage_id' => (int)$paypage_id_prev,
					]
				);
			} catch (Exception $e) {
			}
		}

		$result = parent::process_admin_options();

		$paypage_id_curr = $this->get_option('paypage_id');
		if ($paypage_id_curr == self::NOT_SELECTED_PAYPAGE_OPTION) {
			\WC_Admin_Settings::add_error(__('Please select Paypage', 'woocommerce-icount'));
		} 
		elseif ($this->is_available()) {
			try {
				$this->__wp_remote_post(
					'woocommerce/connect',
					ICOUNT_PAYMENT_PLUGIN_WOOCO_INFO +
					[
						'paypage_id' => (int)$paypage_id_curr,

						'plugin_settings' => array_filter(
							$this->settings,
							fn(string $key) => in_array(
								$key,
								[
									'enabled',
									'title',
									'description',
									'paypage_id',
									'hide_icon',
									'invoice_type',
									'is_debug_log',
								]
							),
							ARRAY_FILTER_USE_KEY
						),
					]
				);
			} catch (Exception $e) {
			}
		}
		unset($atomic_lock, $paypage_id_prev, $paypage_id_curr);

		try {
			[
				'company_info' => [
					'is_vat_exempt' => $is_vat_exempt,
				],
			] = $this->auth_info();

			if ($is_vat_exempt && wc_tax_enabled()) {
				\WC_Admin_Settings::add_error(__('There is a conflict with your business type in iCount. Please either deactivate Taxes in WooCommerce or use a different iCount account.', 'woocommerce-icount'));
			}
		} catch (Exception $e) {
			\WC_Admin_Settings::add_error(__('Authorization Required', 'woocommerce-icount') . ": {$e->getMessage()}");
		}

		return $result;
	}

	protected function generate_paypage_html(string $key, array $data): string
	{
		$field_key = $this->get_field_key($key);

		$value = $this->get_option($key, self::NOT_SELECTED_PAYPAGE_OPTION);

		$field_key_attr = esc_attr($field_key);

		$title_html = wp_kses_post($data['title']);

		$input_html = null;

		if (!is_null($this->token_access)) {
			try {
				$input_html = "<select data-type=\"paypage\" name=\"{$field_key_attr}\" id=\"{$field_key_attr}\">"
					. array_reduce(
						array_filter(
							$this->__wp_remote_post('paypage/get_list', [])['paypages'],
							fn(array $page_info) => $page_info['is_active'] &&
								!($page_info['is_deleted'] ?? false) &&
								(!$page_info['is_wooco'] || $page_info['wooco_domain'] == ICOUNT_PAYMENT_PLUGIN_WC_DOMAIN)
						),
						fn(string $carry, array $page_info) => $carry
							. '<option value="'
							. esc_attr($page_info['page_id'])
							. '" '
							. ($page_info['page_id'] == $value ? 'selected' : '')
							. '>'
							. esc_html("{$page_info['page_name']} ( #{$page_info['page_id']} )")
							. '</option>'
						,
						'<option value=""> --- </option>'
					)
					. '</select><p><button>' . esc_html(__('Create Payment Page', 'woocommerce-icount')) . '</button></p>';

			} catch (Exception $e) {
				$input_html = esc_html($e->getMessage());
			}
		}

		return '<tr style="vertical-align: top">
	<th scope="row" class="titledesc">
		<label for="' . $field_key_attr . '">' . $title_html . ' ' . $this->get_tooltip_html($data) . '</label>
	</th>
	<td class="forminp">
		<fieldset>
			<legend class="screen-reader-text"><span>' . $title_html . '</span></legend>'
			. $input_html . '
		</fieldset>
	</td>
</tr>';
	}

	protected function generate_tax_info_html(string $key, array $data): string
	{
		$return = [];
		foreach ([

					 \__('Enable taxes', 'woocommerce-icount') => 
					 sprintf( 
						/* translators: %s: Enable taxes */
						esc_html__('&nbsp; %s', 'woocommerce-icount'), 
						wc_tax_enabled() ? 'Enabled' : 'Disabled'
					 ),

					 \__('Prices entered with tax', 'woocommerce-icount') => 			
						sprintf( 
							/* translators: %s: Entered with tax */
							esc_html__('&nbsp; %s', 'woocommerce-icount'), 
							['yes' => 'Yes, I will enter prices inclusive of tax','no' => 'No, I will enter prices exclusive of tax',][\get_option('woocommerce_prices_include_tax', null) ?? 'no']
						),
			
					 \__('Calculate tax based on', 'woocommerce-icount') => 		
						sprintf( 
							/* translators: %s: Calculate tax */
							esc_html__('&nbsp; %s', 'woocommerce-icount'), 
							['shipping' => 'Customer shipping address','billing' => 'Customer billing address','base' => 'Shop base address',][\get_option('woocommerce_tax_based_on')]
						),
				
					 \__('Shipping tax class', 'woocommerce-icount') => (
						 ['inherit' => \__('Shipping tax class based on cart items', 'woocommerce-icount')] +
						 wc_get_product_tax_class_options()
					 )[\get_option('woocommerce_shipping_tax_class', null) ?? 'inherit'],


					\__('Round tax at subtotal level, instead of rounding per line', 'woocommerce-icount') => 
						sprintf( 
							/* translators: %s: Round tax subtotal */
							esc_html__('&nbsp; %s', 'woocommerce-icount'), 
							['yes' => 'Enabled','no' => 'Disabled',][\get_option('woocommerce_tax_round_at_subtotal', null) ?? 'no']
						),


					 \__('Display prices during cart and checkout', 'woocommerce-icount') => 
						sprintf( 
							/* translators: %s: Display prices */
							esc_html__('&nbsp; %s', 'woocommerce-icount'), 
							['incl' => 'Including tax','excl' => 'Excluding tax',][\get_option('woocommerce_tax_display_cart')]
						),
			
				 ] as $title => $description) {
			$return[] = '<tr style="vertical-align: top">
	<th scope="row" class="titledesc">' . esc_html($title) . '</th>
	<td class="forminp">' . $description . '</td>
</tr>';
		}

		return wc_tax_enabled()
			? implode('', $return)
			: $return[0];
	}

	public function admin_options()
	{
		echo '<div class="icount_settings_context" data-plugin-id="' . esc_attr($this->id) . '">';
		parent::admin_options();
		echo '</div>';
	}

		
	public function process_payment($order_id): array
	{				
				$order = wc_get_order($order_id);

				$atomic_lock = new WC_ICount_Locker("order_{$order_id}", false);
				if (!$order->meta_exists(self::META_KEY_SECRET_VERIFY)) {
					$order->add_meta_data(self::META_KEY_SECRET_VERIFY, wp_generate_password(20), true);
					$order->save_meta_data();
				}
				unset($atomic_lock);

		            $redirect = false;
		            if (stripos( $_SERVER['HTTP_USER_AGENT'], 'Safari') !== false) {						
						if (stripos( $_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false) 
							$redirect = false;											
						else 
							$redirect = true;
					}		
		
		            $check_redir = $this->get_option('payment_mode');
		            if ($check_redir !== 'iframe')
						$redirect = true;
		
					$payment_url = esc_url(
							$this->__wp_remote_post(
								'woocommerce/generate_sale',
								ICOUNT_PAYMENT_PLUGIN_WOOCO_INFO +
								[
									'wc_order_id' => $order->get_id(),
									'paypage_id' => (int)$this->get_option('paypage_id'),
								 	'lang' => (substr(get_bloginfo("language"), 0, 2) == 'he' ? 'he' : 'en'),
									'ipn_url' => add_query_arg(
										array_map(
											'urlencode',
											[
												'wc-api' => $this->id . '-ipn_response',
												'order-id' => $order->get_id(),
												self::SECRET_VERIFY => $order->get_meta(self::META_KEY_SECRET_VERIFY), 
											]
										),
										site_url('/')
									),
									'client_name' => $order->get_billing_company() ?? $order->get_formatted_billing_full_name(),
									'first_name' => $order->get_billing_first_name(),
									'last_name' => $order->get_billing_last_name(),
									'email' => $order->get_billing_email(),
									'phone' => $order->get_billing_phone(),
									'currency_code' => $order->get_currency(),
									'delivery_methods' => [],

									'items' => [
										[
											'description' => "Order #{$order->get_order_number()}",
											'unitprice_incl' => $order->get_total(),
											'quantity' => 1,
										],
									],
									//'is_iframe' => 1,
									'is_iframe'   => ($redirect === true) ? 0 : 1,
									'success_url' => ($redirect === true) ? esc_url($order->get_checkout_order_received_url()) : '',
								]
							)['sale_url']
					);		
		
					$thankyou_url = esc_url($order->get_checkout_order_received_url());							
		
		$thankyou = wp_parse_url($thankyou_url);
		$payment = wp_parse_url($payment_url);
		$pay_url = explode('/',$payment['path']);		
		$redir = ($redirect === true) ? 1 : 0;
		
		return [
			'result'   => 'success',
			'redirect' => '?ic_checkout=' . $pay_url[3] . '&ic_order_id=' . $order_id . '&ic_' . $thankyou['query'] . '&ic_path=' . $thankyou['path'] . '&ic_redir=' . $redir,			
		];
		
	}


	private function auth_info(): array
	{
		@[
			'cid' => $cid,
			'user' => $user,
			'company_info' => [
				'businessType' => $business_type_id,
				'is_vat_exempt' => $is_vat_exempt,
			],
		] = $this->__wp_remote_post(
			'auth/info',
			[
				'get_company_info' => true,//Get company information
				'get_settings' => false,//Get company settings as well
				'get_bank_accounts' => false,//Get company bank accounts list
			]
		);

		return [
			'cid' => $cid,
			'user' => $user,
			'token_masked' => preg_replace('/^.+(.{4})$/u', '...$1', $this->token_access),
			'company_info' => [
				'business_type_id' => $business_type_id,
				'is_vat_exempt' => (bool)$is_vat_exempt,
			],
		];
	}
	private function __wp_remote_post(string $action, array $data): array
	{
		$mask_for_log_cb = static function (array $data): string {
			static $mask = [
				'pass' => ['/^.*$/', '{SECRET}'],
				'access_token' => ['/^.*$/', '{SECRET}'],
				'refresh_token' => ['/^.*$/', '{SECRET}'],
				'Authorization' => ['/^.*$/', '{SECRET}'],
				'ipn_url' => ['/(' . self::SECRET_VERIFY . '=)[a-z0-9]+/', '$1{SECRET}'],
			];
			array_walk_recursive(
				$data,
				function (&$v, $k) use (&$mask) {
					if (isset($mask[$k])) {
						[$reg_exp, $replace] = $mask[$k];
						$v = preg_replace($reg_exp . 'u', $replace, $v);
					}
				}
			);
			return wp_json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
		};

		$log_REQUEST = "REQUEST: action: $action; data: " . $mask_for_log_cb($data);
		$log_RESPONSE = null;
		$is_error = false;
		try {
			if (is_null($this->token_access)) {
				throw new Exception(__('Authorization Required', 'woocommerce-icount'));
			}

			$response = wp_remote_post(
				"https://api.icount.co.il/api/v3.php/{$action}",
				[
					'headers' => [
						'Authorization' => "Bearer {$this->token_access}",
						'Content-Type' => 'application/json',
					],
					'body' => wp_json_encode($data),
					'timeout' => 15,
				]
			);

			if (is_wp_error($response))
				throw new Exception($response->get_error_message());

			$log_RESPONSE = "RESPONSE: action: $action; data: " . $mask_for_log_cb($response);

			$response_body = json_decode(wp_remote_retrieve_body($response), true) ?? [];

			if (!$response_body['status'])
				throw new Exception(
					$response_body['error_description']
						?: $response_body['reason']
				);

			return $response_body;
		} catch (Exception $e) {
			$is_error = true;
			throw $e;
		} finally {
			$this->logger->log(
				implode(PHP_EOL, [$log_REQUEST, $log_RESPONSE]),
				LEVEL_LOG::get(
					$is_error
						? LEVEL_LOG::ERROR
						: LEVEL_LOG::DEBUG
				)
			);
		}
	}

	protected function generate_token_access_html(string $key, array $data): string
	{
		$field_key = $this->get_field_key($key);

		try {
			@[
				'cid' => $cid,
				'user' => $user,
				'token_masked' => $token_masked,
			] = $this->auth_info();

			$value = __('Authorized', 'woocommerce-icount') . ": {$cid}/{$user} ({$token_masked})";
			$is_authorized = true;
		} catch (Exception $e) {
			$value = __('Authorization Required', 'woocommerce-icount');
			$is_authorized = false;
		}

		$field_key_attr = esc_attr($field_key);

		$title_html = wp_kses_post($data['title']);

		$token_access_dialog_html = $this->generate_settings_html(
			[
				'input_token_access' => [//key must be different from 'token_access'. Else we will send real 'token_access' option on frontend
					'title' => __('Token', 'woocommerce-icount'),
					'type' => 'password',
					'description' => '<a href="https://app.icount.co.il/admin/settings_automation.php#tabs-api-tokens" target="_blank">' . esc_html(__('Find here', 'woocommerce-icount')) . '</a>',
				],
			],
			false
		);
		return '<tr style="vertical-align: top">
	<th scope="row" class="titledesc">
		<label for="' . $field_key_attr . '">' . $title_html . '</label>
	</th>
	<td class="forminp">
		<fieldset>
			<legend class="screen-reader-text"><span>' . $title_html . '</span></legend>
			<input
				data-type="token_access"
				class="input-text regular-input"
				type="button"
				name="' . $field_key_attr . '"
				id="' . $field_key_attr . '"
				value="' . esc_attr($value) . '"
				data-is-authorized="' . ($is_authorized ? 'true' : 'false') . '"
			>
			<div title="Update Token Access" style="display:none">
				<div class="warning" style="color:red"></div>
				<table class="form-table">' . $token_access_dialog_html . '</table>
			</div>
		</fieldset>
	</td>
</tr>';
	}
}
