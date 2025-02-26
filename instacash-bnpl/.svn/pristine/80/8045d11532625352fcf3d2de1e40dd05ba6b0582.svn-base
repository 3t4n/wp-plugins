<?php

/**
 * Extending WC_Payment_Gateway for custom workflow.
 * Using class without namespace, because have an issue with frontend classname.
 * php version 7.4.33
 *
 * @category Woocommerce-plugin
 * @package  instacashBnpl
 * @author   Fintrous Group Kft. <fintrous.com>
 * @license  GNU General Public License v3.0
 * @link     https://instacash.hu/
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use InstaCash\BNPL\Config;
use InstaCash\BNPL\Helper;
use InstaCash\BNPL\Handler;
use InstaCash\BNPL\Conditions;
use InstaCash\Symfony\Component\HttpFoundation\Request;

/**
 * Extended WC_Payment_Gateway class.
 */
class InstaCashBNPLApplication extends WC_Payment_Gateway
{
    /**
     * WP Nonce key.
     *
     * @var string
     */
    const NONCE_KEY = 'ic-bnpl';

    /**
     * Enqueue asset identificator.
     *
     * @var string
     */
    const ASSET_ID = 'ic-bnpl';

    /**
     * Request Handler class.
     *
     * @var Handler
     */
    protected $handler;

    /**
     * Data modification helper.
     *
     * @var Helper
     */
    protected $helper;

    /**
     * Offer ID.
     *
     * @var int
     */
    protected $offer_id;

    /**
     * Possibly offer.
     *
     * @var array<int|string>
     */
    protected $possibly;

    /**
     * Woocommerce logger class.
     *
     * @var \WC_Logger
     */
    protected $log;

    /**
     * Debug level option.
     *
     * @var string
     */
    protected $debug_level;

    /**
     * Product page displayable info.
     *
     * @var array
     */
    protected $info;

    /**
     * Product page event runing flag.
     *
     * @var boolean
     */
    protected $pageEvent;

    public function __construct()
    {
        $this->id                 = __CLASS__;
        $this->icon               = instaCashBnplPluginUri('assets/image/installment.png');
        $this->method_title       = __('InstaCashBNPL', 'instacash-bnpl');
        $this->method_description = __('Apply for a loan through InstaCash', 'instacash-bnpl');
        $this->has_fields         = true;
        $this->helper             = new Helper();
        $this->title              = $this->get_option('title');
        $this->description        = $this->get_option('description');
        $this->form_fields        = $this->get_form_fields();
        $this->supports           = [ 'products' ];
        $this->handler            = new Handler($this->get_option('api_key'));
        $this->log                = wc_get_logger();
        $this->debug_level        = $this->get_option('debug_level');
        $this->init_settings();
        $this->add_hooks();
    }

    /**
     * Add actions to WC events.
     *
     * @return void
     */
    public function add_hooks()
    {
        add_filter('woocommerce_available_payment_gateways', [ $this, 'gateway_filter' ]);

        add_action('instacash_bnpl_offer_check', [ $this, 'check_synchron' ], 10, 0);
        // add_action('woocommerce_add_to_cart', [$this, 'on_action_cart_updated'], 10, 2);
        add_action('woocommerce_before_single_product', [$this, 'product_page_bnpl'], 10, 0);
        add_action('woocommerce_before_single_product_summary', [$this, 'product_page_bnpl'], 10, 0);
        add_action('woocommerce_review_order_before_payment', [ $this, 'remaining_for_bnpl' ]);
        add_action('woocommerce_update_options_payment_gateways_' . $this->id, [ $this, 'process_admin_options' ]);
        add_action('wp_ajax_nopriv_product_bnpl_calculator', [ $this, 'product_calculation_by_subtotal' ]);
        add_action('wp_ajax_product_bnpl_calculator', [ $this, 'product_calculation_by_subtotal' ]);
        add_action('wp_ajax_nopriv_bnpl_calculator', [ $this, 'calculation_response' ]);
        add_action('wp_ajax_bnpl_calculator', [ $this, 'calculation_response' ]);
        add_action('add_meta_boxes', [ $this, 'order_status_metabox' ]);
        add_action('admin_print_styles', [ $this, 'add_admin_styles' ]);
        add_action('admin_notices', [ $this, 'bnpl_notices' ]);
        add_action('admin_init', [ $this, 'bnpl_sync_action' ]);
        add_action('rest_api_init', [ $this, 'addWebhook' ]);
    }

    /**
     * Add rest endpoint.
     *
     * @return void
     */
    public function addWebhook()
    {
        \register_rest_route(
            'instaCashBNPL/v1',
            '/orderStatus/',
            [
            'methods'             => 'POST',
            'permission_callback' => [$this, 'check_request'],
            'callback'            => [$this, 'order_status']
            ]
        );
    }

    /**
     * Merge form fields.
     *
     * @return array
     */
    public function get_form_fields()
    {
        return array_merge(Config::optionFields(), $this->helper->getDynamicFields());
    }

    /**
     * Handle Purchase request.
     *
     * @param int $order_id
     *
     * @return false|array<string>
     */
    public function process_payment($order_id)
    {

        $order    = wc_get_order($order_id);
        $request  = $this->helper->getRequestArray($order_id, $this->get_return_url($order));
        $response = $this->handler->sendApplicationRequest($request['payment'], $request['customer'], $request['items']);

        if (! $response) {
            $this->log->error('No response for request: ' . wp_json_encode($request), ['source' => Config::LOG_NAME]);

            return false;
        }

        $application = json_decode($response->getBody()->getContents());

        if (! $application) {
            $this->debug_log('Application failed on order: ' . $order_id, wp_json_encode($order));

            return [
                'result'   => 'fail',
                'redirect' => ''
            ];
        }

        $order->update_status($this->get_option('pending_status'));
        $order->update_meta_data('publicId', $application->publicId);
        $order->update_meta_data('purchaseId', $application->dealId);
        $order->update_meta_data('checkoutId', $request['payment']['checkoutId']);
        $order->save();

        return [
            'result'   => 'success',
            'redirect' => $this->helper->getRedirectUrl(
                $this->get_option('bnpl_id'),
                $application->publicId,
                ($this->get_option('test_mode') === 'yes')
            )
        ];
    }

    /**
     * Add calculator template and scripts to payment field.
     */
    public function payment_fields()
    {
        $this->get_info();

        include_once instaCashBnplPluginPath('/template/calculator.php');

        add_action(
            'wp_footer',
            function () {
                $this->load_styles();
                wp_enqueue_script(self::ASSET_ID, plugin_dir_url(__DIR__) . 'assets/js/calculator.js', [], '1.0.3',['in_footer', true]);
                wp_localize_script(self::ASSET_ID,
                    'BNPLObject', [
                        'calculator' => admin_url('admin-ajax.php?action=bnpl_calculator'),
                        'locale'     => get_locale()
                    ]
                );
            }
        );
    }

    /**
     * Check status message request.
     *
     * Authorization check cannot be interpreted because the process is not linked to a user.
     * Therefore, we check the content of the request to ensure that a status message is indeed received.
     *
     * @param \WP_REST_Request $request
     *
     * @return boolean
     */
    public function check_request($request)
    {
        if (!is_object($request)) {
            $this->log->error('Instacash status error: Status message is not an object!', ['source' => Config::LOG_NAME]);

            return false;
        }

        $message  = $request->get_json_params();
        $checkout = false;

        if (!isset($message['deal']) || !is_array($message['deal'])) {
            $this->log->error('Instacash status error: Deal is not an array!', ['source' => Config::LOG_NAME]);

            return false;
        }

        if (isset($message['purchase']['orderId'])) {
            $checkout = get_post_meta($message['purchase']['orderId'] , 'checkoutId', true);
        }

        if (!$checkout || !isset($message['purchase']['checkoutId']) || $checkout !== $message['purchase']['checkoutId']) {
            $this->log->error('An incorrect webhook message was received!', ['source' => Config::LOG_NAME]);
            $this->log->error(strval(wp_json_encode($message)), ['source' => Config::LOG_NAME]);

            return false;
        }

        return true;
    }

    /**
     * Receive application status from webhook.
     *
     * @param \WP_REST_Request $request
     *
     * @return \WP_REST_Response
     */
    public function order_status($request)
    {
        $statusMessage = $request->get_json_params();

        $this->debug_log('Webhook order status.', strval(wp_json_encode($statusMessage)));

        $paidCount = count(
            array_filter(
                $statusMessage['deal']['transactions'],
                static function ($transaction) {
                    return Config::COMPLETED_STATUS === $transaction['status'];
                }
            )
        );

        $order = wc_get_order($statusMessage['purchase']['orderId']);

        if (!($order instanceof \WC_Order)) {
            $this->log->error('Order ID does not point to an order', ['source' => Config::LOG_NAME]);

            return new \WP_REST_Response(['Bad Request'], 400);
        }

        $order->update_meta_data(Config::TRANSACTIONS_OPTION_NAME, strval(count($statusMessage['deal']['transactions'])));
        $order->update_meta_data(Config::STATUS_OPTION_NAME, $statusMessage['deal']['status']);
        $order->update_meta_data(Config::PAID_OPTION_NAME, strval($paidCount));

        if (!isset($statusMessage['application']) || !is_array($statusMessage['application'])) {
            $this->log->error('Instacash status error: Application is not an array!', ['source' => Config::LOG_NAME]);
        }

        if ($paidCount === count($statusMessage['deal']['transactions'])) {
            $order->update_status($this->get_option('last_status'));
        } elseif ('INITIAL_PAYMENT_COMPLETED' === $statusMessage['deal']['status']) {
            $order->update_status($this->get_option('first_status'));
        } elseif (in_array($statusMessage['deal']['status'], ['CANCELLED', 'DENIED', 'INTERRUPTED'])) {
            $order->update_status($this->get_option('interrupted_status'));
        }

        $order->save();

        return new \WP_REST_Response(['OK'], 200);
    }

    /**
     * Set sync required flag to false after update.
     */
    public function bnpl_sync_action()
    {
        $nonce = filter_input(INPUT_POST, self::NONCE_KEY, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (isset($_POST['bnplSyncAction']) && wp_verify_nonce($nonce, self::NONCE_KEY)) {
            update_option(Config::SYNC_OPTION_NAME, false);
        }
    }

    /**
     * Check if API key exists or need to print onboard notice.
     */
    public function bnpl_notices()
    {
        if ('' !== $this->get_option('api_key')) {
            $sync = get_option(Config::SYNC_OPTION_NAME, false);
            if ($sync) {
                include_once instaCashBnplPluginPath('/template/admin/syncNotice.php');
            }

            return;
        }

        // $merchantPortal = Config::getMerchantPortal(($this->get_option('test_mode') === 'yes'));
        $isoCode        = explode('-', get_bloginfo('language'))[0];
        $merchantPortal = isset(Config::URLS[$isoCode]) ? Config::URLS[$isoCode] : Config::URLS[Config::DEFAULT_URL];;

        include_once instaCashBnplPluginPath('/template/admin/onboardNotice.php');
    }

    /**
     * Calculation ajax response to customer.
     */
    public function calculation_response()
    {

        $request  = Request::createFromGlobals();
        $response = $this->handler->sendCalculationRequest(
            $request->request->getInt('offerId'),
            $request->request->getInt('amount')
        );

        $rawCalculation = json_decode($response->getBody()->getContents());

        if (!$response || !$rawCalculation) {
            $this->debug_log('Ajax calculation error!', wp_json_encode($request));

            wp_send_json_error(
                [
                    'message' => __('The app is not responding, please try again later', 'instacash-bnpl')
                ],
                503
            );
            exit;
        }

        $calculation = $this->helper->calculationPriceFormat($rawCalculation);

        return $this->print_json_response($calculation);
    }

    /**
     * Get offers for admin settings
     *
     * @return void
     */
    public function get_offers()
    {

        $offersResponse = $this->handler->getOffers();

        if (!$offersResponse) {
            add_action(
                'admin_notices',
                function () {
                    $sync = __('No available offers', 'instacash-bnpl');
                    include_once instaCashBnplPluginPath('/template/admin/syncNotice.php');
                }
            );

            return;
        }

        $offers = json_decode($offersResponse->getBody()->getContents());

        if (!is_array($offers)) {
            $this->log->error('Instacash offers not an array: ' . $offersResponse, ['source' => Config::LOG_NAME]);
        }

        update_option(Config::OFFERS_OPTION_NAME, $offers);
    }

    /**
     * Print response for ajax call.
     */
    public function print_json_response($calculation)
    {
        header('Content-Type: application/json; charset=UTF-8');
        print wp_json_encode($calculation);
        exit;
    }

    /**
     * Get Application Status.
     *
     * @param string $type
     * @param string $request_id
     *
     * @return \stdClass|false
     */
    public function get_status($type, $request_id)
    {
        $response = $this->handler->getStatus($type, $request_id);

        if ($response) {
            return json_decode($response->getBody()->getContents());
        };

        return $response;
    }

    /**
     * Add a metabox to see the statuses in OLM Application.
     *
     * @return void
     */
    public function order_status_metabox()
    {
        add_meta_box('application_status', __('Payment Status', 'instacash-bnpl'), [$this, 'meta_box_content'], 'shop_order', 'side', 'core');
    }

    /**
     * Get the Application status for display in metabox.
     *
     * @return void|false
     */
    public function meta_box_content()
    {

        $order  = wc_get_order(get_the_ID());

        if (__CLASS__ !== $order->get_payment_method()) {
            esc_html_e('No Status', 'instacash-bnpl');
            return false;
        }

        $status = $this->get_status('deal', $order->get_meta('purchaseId'));

        if (!$status) {
            esc_html_e('No Status', 'instacash-bnpl');
            return false;
        }

        $paid_count = count(
            array_filter(
                $status->transactions,
                static function ($transaction) {
                    return Config::COMPLETED_STATUS === $transaction->status;
                }
            )
        );

        $unpaid_count   = count($status->transactions) - $paid_count;
        $merchantPortal = Config::getMerchantPortal(($this->get_option('test_mode') === 'yes'));

        include_once instaCashBnplPluginPath('/template/admin/boxContent.php');

        if ($order->get_meta(Config::STATUS_OPTION_NAME)) {
            $order->update_meta_data(Config::TRANSACTIONS_OPTION_NAME, count($status->transactions));
            $order->update_meta_data(Config::STATUS_OPTION_NAME, $status->status);
            $order->update_meta_data(Config::PAID_OPTION_NAME, $paid_count);
            $order->save();
        }
    }

    /**
     * Extended WooCommerce payment option page.
     */
    public function admin_options()
    {
        $nonce = filter_input(INPUT_POST, self::NONCE_KEY, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (isset($_POST['bnplSyncAction']) && wp_verify_nonce($nonce, self::NONCE_KEY)) {

            $this->get_offers();

            $currentOptions = array_keys($this->form_fields);
            $options        = get_option(Config::OPTIONS_NAME);
            $needsUpdate    = false;

            foreach ($options as $optionKey => $option) {
                if(!in_array($optionKey, $currentOptions) && 'enabled' !== $optionKey) {
                    $needsUpdate = true;
                    unset($options[$optionKey]);
                }
            }

            if ($needsUpdate) {
                update_option(Config::OPTIONS_NAME, $options);
                esc_html_e('Options synchronized!', 'instacash-bnpl');
            }

        }

        wp_enqueue_script(self::ASSET_ID, plugin_dir_url(__DIR__) . 'assets/js/ic-admin.js', [], '1.0.0', true);

        $overlaps = InstaCash\BNPL\Conditions::overlapCheck();

        if ([] !== $overlaps) {
            include_once instaCashBnplPluginPath('/template/admin/overlapNotice.php');
        }

        include_once instaCashBnplPluginPath('/template/admin/optionsPage.php');
    }

    public function check_synchron()
    {
        $offersResponse = $this->handler->getOffers();

        if (!$offersResponse) {
            update_option(Config::SYNC_OPTION_NAME, __('BNPL Check: No offers!', 'instacash-bnpl'));
            return;
        }

        $offersArray = json_decode($offersResponse->getBody()->getContents());
        $offers      = get_option(Config::OFFERS_OPTION_NAME, []);

        if ($offers != $offersArray) {
            update_option(Config::SYNC_OPTION_NAME, __('BNPL Check: Sync required!', 'instacash-bnpl'));
        }
    }

    public function remaining_for_bnpl()
    {
        if (!is_array($this->possibly) || 'no' === $this->get_option('remaining_notice', false)) {
            return;
        }

        $total     = WC()->cart->total;
        $cart_min  = $this->possibly['cart_min'];
        $width     = ($cart_min > $total) ? (100 - ($cart_min - $total) / ($cart_min / 100)) : 100;
        $line      = (50 > $width) ? sanitize_hex_color($this->get_option('secondary_color')) : sanitize_hex_color($this->get_option('primary_color'));
        $info      = $this->get_option('remaining_tooltip', false);
        $details   = $this->get_option('remaining_details', false);

        $this->load_styles(
            [
                'bnpl-line-color' => $line,
                'bnpl-progress-width' => $width . '%'
            ]
        );

        include_once instaCashBnplPluginPath('/template/remaining.php');
    }

    /**
     * Filter gateway by options.
     *
     * @param array<string> $methods
     *
     * @return array<string>
     */
    public function gateway_filter($methods)
    {
        if (!is_checkout()) {
            return $methods;
        }

        $offer = Conditions::offersFilter();

        if (is_array($offer)) {
            $this->possibly = $offer;
            $offer          = false;
        }

        if (!$offer) {
            unset($methods[InstaCashBNPLApplication::class]);
        }

        $this->offer_id = $offer;
        return $methods;
    }

    /**
     * Add product calculation and prescore block to product page.
     *
     * @return void
     */
    public function product_page_bnpl()
    {
        if($this->pageEvent){
            return;
        }

        $this->pageEvent = true;
        $baseElements = $this->get_base_elements();

        if(!$baseElements) {
            return;
        }

        $this->get_info();
        $this->load_styles();

        if ('none' !== $this->get_option('calculation_place', 'none')) {
            $this->load_calculation($baseElements['offer'], $baseElements['product']);
        } else {
            $this->debug_log('Product calculation disabled!');
        }

        if ('none' !== $this->get_option('prescore_place', 'none')) {
            $this->load_prescore($baseElements['offer'], $baseElements['product']);
        } else {
            $this->debug_log('Product prescore disabled!');
        }

        if ($this->have_info('calculation')) {
            $this->load_scripts($baseElements['offer']);

            add_action($this->get_option('calculation_place', 'woocommerce_single_product_summary'), [$this, 'print_calculation'], 11, 0);
        }

        if($this->have_info('prescore')) {
            add_action($this->get_option('prescore_place', 'woocommerce_single_product_summary'), [$this, 'print_prescore_box'], 10, 0);
        }

        return;
    }

    /**
     * Set product page base elements.
     *
     * @return false|array
     */
    public function get_base_elements()
    {
        if ('none' === $this->get_option('prescore_place', 'none') && 'none' === $this->get_option('calculation_place', 'none')) {
            $this->debug_log('Product page BNPL events are disabled');

            return false;
        }

        $product = wc_get_product(get_the_ID());
        $offer   = Conditions::productOfferFilter($product);

        if (!$offer) {
            $this->debug_log('No available offer to product page events', wp_json_encode($product));

            return false;
        }

        return ['offer' => $offer, 'product' => $product];
    }

    /**
     * Set prescore display data.
     */
    public function load_prescore($offer, $product)
    {
        $price       = $product->get_sale_price() ? $product->get_sale_price() : $product->get_price();
        $uri         = sprintf('%s/%s/prescore/', Config::getServer(($this->get_option('test_mode') === 'yes')), $this->get_option('bnpl_id'));
        $description = $product->get_short_description() ? wp_strip_all_tags($product->get_short_description()) : $product->get_title();
        $trimmed     = 340 > mb_strlen($description) ? $description : substr($description, 0, strpos($description, ' ', 340)) . '...';
        $parameters  = [
            'offerId'     => $offer,
            'amount'      => $price,
            'merchantId'  => $this->get_option('merchant_id', '0'),
            'name'        => urlencode($product->get_title()),
            'description' => urlencode($trimmed),
            'redirectUrl' => urlencode($product->get_permalink())
        ];

        if (!$this->get_option('merchant_id')) {
            return;
        }

        $parameters['merchantId'] = $this->get_option('merchant_id');

        $this->info['prescore'] = [
            'price'       => wc_price($price),
            'title'       => $this->get_option('prescore_title'),
            'description' => $this->get_option('prescore_description'),
            'url'         => add_query_arg($parameters, $uri)
        ];

        if ('full' === $this->debug_level) {
            $this->log->debug(wp_json_encode($this->info['prescore']), ['source' => Config::LOG_NAME]);
        }
    }

    /**
     * Set product calculation.
     */
    public function load_calculation($offer, $product)
    {
        $price     = $product->get_sale_price() ? $product->get_sale_price() : $product->get_price();
        $transient = $this->product_calculation_transient($offer, $price);

        if (!$transient) {
            $this->debug_log(sprintf('No calculation for offer: %s with amount of %s', $offer, $price));

            return;
        }

        $this->info['calculation']  = $this->helper->calculationPriceFormat($transient);
        $this->info['one_line']     = $this->helper->getOneLine($this->info['calculation']);
        $this->info['productPrice'] = $price;

        $this->debug_log('Product page calculation.', wp_json_encode($this->info['calculation']));
    }

    /**
     * Set display info elements.
     */
    public function get_info()
    {
        $this->info = [
            'offer'                   => $this->offer_id,
            'description'             => str_replace("\n", '<br>', $this->get_option('description')),
            'usp_list'                => [
                $this->get_option('usp_list_1'),
                $this->get_option('usp_list_2'),
                $this->get_option('usp_list_3'),
                $this->get_option('usp_list_4'),
            ],
            'usp_title'               => $this->get_option('usp_title'),
            'usp_receipt_title'       => $this->get_option('usp_receipt_title'),
            'usp_receipt_description' => $this->get_option('usp_receipt_desc'),
            'usp_clock_title'         => $this->get_option('usp_clock_title'),
            'usp_clock_description'   => $this->get_option('usp_clock_desc'),
            'usp_automat_title'       => $this->get_option('usp_automat_title'),
            'usp_automat_description' => $this->get_option('usp_automat_desc')
        ];
    }

    /**
     * Enqueue admin styles.
     */
    public function add_admin_styles()
    {
        wp_enqueue_style(self::ASSET_ID, plugin_dir_url(__DIR__) . 'assets/css/ic-admin.css', [], '1.0.0');
    }

    /**
     * Enqueue styles.
     *
     * @param array $styleArray
     */
    public function load_styles($styleArray = [])
    {
        $extraStyle = '';

        foreach ($styleArray as $name => $value) {
            $extraStyle .= sprintf(('--%s: %s;'), $name, $value);
        }

        wp_enqueue_style(self::ASSET_ID, plugin_dir_url(__DIR__) . 'assets/css/ic-bnpl.css', [], '1.0.0');
        wp_add_inline_style(
            self::ASSET_ID,
            sprintf(
                ':root {
                    --bnpl-primary-color: %s;
                    --bnpl-secondary-color: %s;
                    --bnpl-btn-text-color: %s;
                    --bnpl-text-color: %s;
                    --bnpl-rounding: %dpx;
                    %s
                }',
                sanitize_hex_color($this->get_option('primary_color')),
                sanitize_hex_color($this->get_option('secondary_color')),
                sanitize_hex_color($this->get_option('btn_text_color')),
                sanitize_hex_color($this->get_option('text_color')),
                esc_attr($this->get_option('rounding')),
                esc_attr($extraStyle)
            )
        );
    }

    /**
     * Enqueue scripts.
     */
    public function load_scripts($offer)
    {
        wp_enqueue_script(self::ASSET_ID, plugin_dir_url(__DIR__) . 'assets/js/single-product.js', [], '1.0.3', ['in_footer', true]);
        wp_localize_script(
            self::ASSET_ID,
            'BNPLObject',
            [
                'calculator' => base64_encode(admin_url('admin-ajax.php?action=product_bnpl_calculator')),
                'offer'      => wp_json_encode($this->info['calculation']),
                'condition'  => Conditions::cartSizes($offer),
                'locale'     => get_locale()
            ]
        );
    }

    /**
     * Quantity based calculation.
     */
    public function product_calculation_by_subtotal()
    {

        $request  = Request::createFromGlobals();

        if(
            $request->request->getInt('min') < $request->request->getInt('subtotal')
            && $request->request->getInt('subtotal') < $request->request->getInt('max')
        ) {
            $offer            = json_decode(stripslashes($request->request->get('offer')), false);
            $subtotal         = $request->request->getInt('subtotal');
            $ratedPrice       = $subtotal + (($subtotal / 100) * floatval($offer->rate));
            $paymentCount     = $offer->downPaymentTotal ? (count($offer->payments) - 1) : count($offer->payments);
            $downPaymentTotal = $ratedPrice / 100 * floatval($offer->downPayment);
            $occassion        = ($ratedPrice - $downPaymentTotal) / $paymentCount + floatval($offer->fee);
            $total            = $downPaymentTotal + ($occassion * $paymentCount);
            $apr              = (floatval($offer->fee) * $paymentCount)/($subtotal / 100);
            $payments         = [];

            foreach($offer->payments as $index => $payment) {
                $payments[$index]      = $payment;
                $payments[$index]->sum = wc_price($occassion);
            }

            if(0 < intval($offer->downPayment)) {
                $payments[0]->sum = wc_price($downPaymentTotal);
            }

            $calculation = (object) [
                'downPaymentTotal' => wc_price($downPaymentTotal),
                'prescoreTotal'    => $total,
                'downPayment'      => floatval($offer->downPayment),
                'total'            => wc_price($total),
                'thm'              => $apr,
                'fee'              => is_numeric($offer->fee) ? wc_price($offer->fee) : $offer->fee,
                'rate'             => floatval($offer->rate),
                'payments'         => $payments
            ];

            return $this->print_json_response(
                [
                    'calculation' => $calculation,
                    'one_line'    => $this->helper->getOneLine($calculation),
                    'condition'   => [
                        'min' => $request->request->getInt('min'),
                        'max' => $request->request->getInt('max')
                    ],
                ]
            );
        }

        $product  = wc_get_product($request->request->getInt('productId'));
        $offer    = Conditions::productOfferFilter($product, $request->request->getInt('subtotal'));

        if (!$offer) {
            wp_send_json_error(
                [
                    'message' => __('There are no offers to show for the specified quantity', 'instacash-bnpl')
                ],
                503
            );
            exit;
        }

        $calculation = $this->helper->calculationPriceFormat(
            $this->product_calculation_transient($offer, $request->request->getInt('subtotal'))
        );

        $this->print_json_response(
            [
                'calculation' => $calculation,
                'condition'   => Conditions::cartSizes($offer),
                'one_line'    => $this->helper->getOneLine($calculation)
            ]
        );
    }

    /**
     * Set or get calculation transient per product.
     *
     * @return object|false
     */
    public function product_calculation_transient($offer, $amount)
    {
        $calculation = get_transient('instaCashBNPLProductCalculation_' . strval($offer + $amount));

        if (!$calculation) {
            $response = $this->handler->sendCalculationRequest($offer, $amount);
            if (!$response) {
                return false;
            }

            $calculation = json_decode($response->getBody()->getContents());

            if(!$calculation){
                return false;
            }

            set_transient('instaCashBNPLProductCalculation_' . strval($offer + $amount), $calculation, DAY_IN_SECONDS);
        }

        return $calculation;
    }

    /**
     * Check log level and write log.
     *
     * @param null|string $info
     * @param null|string $log
     */
    private function debug_log($info = null, $log = null)
    {
        if ('disabled' !== $this->debug_level && $info) {
            $this->log->debug($info, ['source' => Config::LOG_NAME]);

            if ('full' === $this->debug_level && $log) {
                $this->log->debug($log, ['source' => Config::LOG_NAME]);
            }
        }
    }

    /**
     * Check if info array have element
     *
     * @param string $element
     *
     * @return bool
     */
    public function have_info($element)
    {
        if(isset($this->info[$element]) && $this->info[$element]) {

            return true;
        }

        return false;
    }

    /**
     * print prescore block template file.
     */
    public function print_prescore_box()
    {
        include_once \instaCashBnplPluginPath('/template/productPrescore.php');
    }

    /**
     * print product calculation template file.
     */
    public function print_calculation()
    {
        include_once \instaCashBnplPluginPath('/template/productCalculation.php');
    }
}
