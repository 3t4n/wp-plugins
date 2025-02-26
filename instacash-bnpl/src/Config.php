<?php

/**
 * Store option fields in class constant.
 * php version 7.4.33
 *
 * @category Woocommerce-plugin
 * @package  instacashBnpl
 * @author   Fintrous Group Kft. <fintrous.com>
 * @license  GNU General Public License v3.0
 * @link     https://instacash.hu/
 */

namespace InstaCash\BNPL;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Static config class.
 */
class Config
{
    // Server URL
    public const SERVER = 'https://bnpl.instacash.hu';

    // Staging server URL
    public const TEST_SERVER = 'https://bnpl-staging.instacash.hu';

    // Merchant portal URL
    public const MERCHANT = 'https://merchant.instacash.hu';

    // Staging merchant portal URL
    public const TEST_MERCHANT = 'https://merchant-staging.instacash.hu';

    // Webhook Url for install notification
    public const NOTIFICATION_CHANNEL = 'https://chat.googleapis.com/v1/spaces/AAAAPozr6TA/messages?key=AIzaSyDdI0hCZtE6vySjMm-WEfRq3CPzqKqqsHI&token=A90Fqw-aZvvaEA2TXgifnvHnJnmLj0RvFHVmjAayeEI';

    // Webhook install message
    public const INSTALL_MESSAGE = 'An activation process at %s';

    // Webhook install message
    public const REMOVAL_MESSAGE = 'A deactivation process at %s';

    // Nonce key for notifications
    public const NONCE_KEY = 'InstaCashBnplNoticeNonce';

    // Woocommerce log file name
    public const LOG_NAME = 'instacash-errors';

    // Woocommerce options name
    public const OPTIONS_NAME = 'woocommerce_InstaCashBNPLApplication_settings';

    // Woocommerce sync option name
    public const SYNC_OPTION_NAME = 'woocommerce_InstaCashBNPLApplication_offers_sync';

    // Woocommerce offers option name
    public const OFFERS_OPTION_NAME = 'woocommerce_InstaCashBNPLApplication_offers';

    // Deal Status option name
    public const STATUS_OPTION_NAME = 'instaCashApplicationStatus';

    // Transactions option name
    public const TRANSACTIONS_OPTION_NAME = 'instaCashTransactions';

    // Paid transactions option name
    public const PAID_OPTION_NAME = 'instaCashPaidTransactions';

    // REST API URL Base
    public const REST_BASE = 'instaCashBNPL/v1';

    // REST API URL ENDPOINT
    public const REST_ENDPOINT = '/orderStatus/';

    // API element completed status.
    public const COMPLETED_STATUS = 'PAID';

    // Default lang iso for urls
    public const DEFAULT_URL = 'en';

    // Service detail urls by language
    public const URLS = [
        'hu' => 'https://instacash.hu/merchan-bnpl/',
        'sk' => 'https://instacash.sk/merchan-bnpl/',
        'en' => 'https://instacash.co/merchants/',
    ];

    /**
     * Default option field of WC Payment.
     *
     * @return array<string, array<string, array<string, string>|bool|string>>
     */
    public static function optionFields()
    {
        return [
            'hook_title'           => [
                'title'       => __('Webhook URL for BNPL System', 'instacash-bnpl'),
                'type'        => 'title',
                'description' => sprintf(
                    '<p>%s</p><p><strong>%s/%s/%s%s</strong></p>',
                    __('For status change notifications, you must enter this URL under the webhook heading on the merchant portal.', 'instacash-bnpl'),
                    home_url(),
                    rest_get_url_prefix(),
                    self::REST_BASE,
                    self::REST_ENDPOINT
                ),
            ],
            'title'                => [
                'title'       => __('Title', 'instacash-bnpl'),
                'type'        => 'text',
                'description' => __('This controls the title which the user sees during checkout.', 'instacash-bnpl'),
                'default'     => __('InstaCash', 'instacash-bnpl'),
                'desc_tip'    => true,
            ],
            'description'          => [
                'title'       => __('Description', 'instacash-bnpl'),
                'type'        => 'textarea',
                'css'         => 'max-width: 400px;',
                'description' => __('This controls the description which the user sees during checkout.', 'instacash-bnpl'),
                'default'     => __('Apply for a loan and pay in installments', 'instacash-bnpl'),
                'desc_tip'    => true,
            ],
            'test_mode'     => array(
                'title'       => __('Test mode', 'instacash-bnpl'),
                'type'        => 'select',
                'options'     => [
                    'yes' => __('Enabled', 'instacash-bnpl'),
                    'no'  => __('Disabled', 'instacash-bnpl'),
                ],
                'desc_tip'    => true,
                'description' => __('Redirects requests to test urls like barion sandbox.', 'instacash-bnpl'),
                'default'     => 'yes',
            ),
            'api_key'              => [
                'title'       => __('API Key', 'instacash-bnpl'),
                'type'        => 'text',
                'description' => __('A unique alphanumeric string that identifies the service', 'instacash-bnpl'),
                'default'     => '',
                'desc_tip'    => true,
            ],
            'merchant_id'          => [
                'title'       => __('Merchant Identifier', 'instacash-bnpl'),
                'type'        => 'number',
                'description' => __('The merchant´s unique identifier in the InstaCash system', 'instacash-bnpl'),
                'default'     => '',
                'desc_tip'    => true,
            ],
            'bnpl_id'              => [
                'title'       => __('BNPL Identifier', 'instacash-bnpl'),
                'type'        => 'text',
                'description' => __('An alphanumeric string that identifies the service route. Copy of merchant portal setting.', 'instacash-bnpl'),
                'default'     => '',
                'desc_tip'    => true,
            ],
            'pending_status'       => [
                'title'       => __('Pending status', 'instacash-bnpl'),
                'type'        => 'select',
                'options'     => wc_get_order_statuses(),
                'description' => __('Select the "wait for payment" status', 'instacash-bnpl'),
                'default'     => 'wc-on-hold',
                'desc_tip'    => true,
            ],
            'first_status'         => [
                'title'       => __('Started status', 'instacash-bnpl'),
                'type'        => 'select',
                'options'     => wc_get_order_statuses(),
                'description' => __('Select the "first installment payed" status', 'instacash-bnpl'),
                'default'     => 'wc-processing',
                'desc_tip'    => true,
            ],
            'last_status'          => [
                'title'       => __('Completed Status', 'instacash-bnpl'),
                'type'        => 'select',
                'options'     => wc_get_order_statuses(),
                'description' => __('Select the "all installment payed" status', 'instacash-bnpl'),
                'default'     => 'wc-completed',
                'desc_tip'    => true,
            ],
            'interrupted_status'   => [
                'title'       => __('Interrupted Status', 'instacash-bnpl'),
                'type'        => 'select',
                'options'     => wc_get_order_statuses(),
                'description' => __('Select the "interrupted from the API" status', 'instacash-bnpl'),
                'default'     => 'wc-failed',
                'desc_tip'    => true,
            ],
            'remaining_notice'     => array(
                'title'       => __('Enable remaining amount notification', 'instacash-bnpl'),
                'type'        => 'select',
                'options'     => [
                    'yes' => __('Enabled', 'instacash-bnpl'),
                    'no'  => __('Disabled', 'instacash-bnpl'),
                ],
                'desc_tip'    => true,
                'description' => __('Notification of how much amount is missing so that installment payments are available.', 'instacash-bnpl'),
                'default'     => 'no',
            ),
            'remaining_details'    => [
                'title'       => __('Details URL', 'instacash-bnpl'),
                'type'        => 'url',
                'description' => __('Link to the BNPL description, if one has been prepared.', 'instacash-bnpl'),
                'default'     => '',
                'desc_tip'    => true,
            ],
            'remaining_tooltip'    => [
                'title'       => __('Info description', 'instacash-bnpl'),
                'type'        => 'textarea',
                'css'         => 'max-width: 400px;',
                'description' => __('A description can be added to the remaining amount notification information logo.', 'instacash-bnpl'),
                'default'     => '',
                'desc_tip'    => true,
            ],
            'debug_level'          => [
                'title'       => __('Debug mode', 'instacash-bnpl'),
                'type'        => 'select',
                'options'     => [
                    'disabled' => __('Disabled', 'instacash-bnpl'),
                    'Base'     => __('Base (log any action)', 'instacash-bnpl'),
                    'full'     => __('Full (log event contents too)', 'instacash-bnpl'),
                ],
                'description' => __('Select the debug level', 'instacash-bnpl'),
                'default'     => 'disabled',
                'desc_tip'    => true,
            ],
            'styles'               => [
                'title'       => __('BNPL Styles', 'instacash-bnpl'),
                'type'        => 'title',
                'description' => __('Add Custom styles to displaying BNPL solution elements', 'instacash-bnpl'),
            ],
            'primary_color'        => [
                'title'       => __('Primary color', 'instacash-bnpl'),
                'type'        => 'color',
                'description' => __('Background color of prescore button etc.', 'instacash-bnpl'),
                'default'     => '#2c3843',
                'desc_tip'    => true,
            ],
            'secondary_color'      => [
                'title'       => __('Secondary color', 'instacash-bnpl'),
                'type'        => 'color',
                'description' => __('Background color of highlighted text and progress circle', 'instacash-bnpl'),
                'default'     => '#c6d601',
                'desc_tip'    => true,
            ],
            'btn_text_color'       => [
                'title'       => __('Button label color', 'instacash-bnpl'),
                'type'        => 'color',
                'description' => __('Label color of prescore button', 'instacash-bnpl'),
                'default'     => '#ffffff',
                'desc_tip'    => true,
            ],
            'text_color'           => [
                'title'       => __('Text color', 'instacash-bnpl'),
                'type'        => 'color',
                'description' => __('Text color of prescore title and others', 'instacash-bnpl'),
                'default'     => '#2d2d2d',
                'desc_tip'    => true,
            ],
            'rounding'             => [
                'title'       => __('Border rounding', 'instacash-bnpl'),
                'type'        => 'number',
                'description' => __('Number of pixels to rounding the block edges', 'instacash-bnpl'),
                'default'     => '8',
                'desc_tip'    => true,
            ],
            'usp_title'            => [
                'title'       => __('USP icons title', 'instacash-bnpl'),
                'type'        => 'text',
                'description' => __('Title above USP icons.', 'instacash-bnpl'),
                'default'     => '',
                'desc_tip'    => true,
            ],
            'usp_receipt_title'    => [
                'title'       => __('Receipt icon title', 'instacash-bnpl'),
                'type'        => 'text',
                'description' => __('Title of an USP icon.', 'instacash-bnpl'),
                'default'     => '',
                'desc_tip'    => true,
            ],
            'usp_receipt_desc'     => [
                'title'       => __('Receipt icon description', 'instacash-bnpl'),
                'type'        => 'text',
                'description' => __('Description of an USP icon.', 'instacash-bnpl'),
                'default'     => '',
                'desc_tip'    => true,
            ],
            'usp_clock_title'      => [
                'title'       => __('Clock icon title', 'instacash-bnpl'),
                'type'        => 'text',
                'description' => __('Title of an USP icon.', 'instacash-bnpl'),
                'default'     => '',
                'desc_tip'    => true,
            ],
            'usp_clock_desc'       => [
                'title'       => __('Clock icon description', 'instacash-bnpl'),
                'type'        => 'text',
                'description' => __('Description of an USP icon.', 'instacash-bnpl'),
                'default'     => '',
                'desc_tip'    => true,
            ],
            'usp_automat_title'    => [
                'title'       => __('Automatic icon title', 'instacash-bnpl'),
                'type'        => 'text',
                'description' => __('Title of an USP icon.', 'instacash-bnpl'),
                'default'     => '',
                'desc_tip'    => true,
            ],
            'usp_automat_desc'     => [
                'title'       => __('Automatic icon description', 'instacash-bnpl'),
                'type'        => 'text',
                'description' => __('Description of an USP icon.', 'instacash-bnpl'),
                'default'     => '',
                'desc_tip'    => true,
            ],
            'product_page'         => [
                'title'       => __('Product page options', 'instacash-bnpl'),
                'type'        => 'title',
                'description' => __('When using Elementor, blocks must be placed on product pages using the builder.', 'instacash-bnpl'),
            ],
            'calculation_place'    => [
                'title'       => __('Calculation place', 'instacash-bnpl'),
                'type'        => 'select',
                'options'     => [
                    'none'                                  => __('Don`t show up', 'instacash-bnpl'),
                    'woocommerce_single_product_summary'    => __('Product summary', 'instacash-bnpl'),
                    'woocommerce_before_add_to_cart_form'   => __('Before add to cart form', 'instacash-bnpl'),
                    'woocommerce_before_add_to_cart_button' => __('Before add to cart button', 'instacash-bnpl'),
                    'woocommerce_after_add_to_cart_form'    => __('After add to cart form', 'instacash-bnpl'),
                    'woocommerce_product_meta_start'        => __('Before meta', 'instacash-bnpl'),
                ],
                'description' => __('Select where to appear a calculation for product price', 'instacash-bnpl'),
                'default'     => 'none',
                'desc_tip'    => true,
            ],
            'prescore_place'       => [
                'title'       => __('Prescore place', 'instacash-bnpl'),
                'type'        => 'select',
                'options'     => [
                    'none'                                  => __('Don`t show up', 'instacash-bnpl'),
                    'woocommerce_single_product_summary'    => __('Product summary', 'instacash-bnpl'),
                    'woocommerce_before_add_to_cart_form'   => __('Before add to cart form', 'instacash-bnpl'),
                    'woocommerce_before_add_to_cart_button' => __('Before add to cart button', 'instacash-bnpl'),
                    'woocommerce_after_add_to_cart_form'    => __('After add to cart form', 'instacash-bnpl'),
                    'woocommerce_product_meta_start'        => __('Before meta', 'instacash-bnpl'),
                ],
                'description' => __('Select where to appear a prescore box', 'instacash-bnpl'),
                'default'     => 'none',
                'desc_tip'    => true,
            ],
            'prescore_title'       => [
                'title'       => __('Prescore title', 'instacash-bnpl'),
                'type'        => 'text',
                'description' => __('Title of the displayed prescore block', 'instacash-bnpl'),
                'default'     => '',
                'desc_tip'    => true,
            ],
            'prescore_description' => [
                'title'       => __('Prescore description', 'instacash-bnpl'),
                'type'        => 'text',
                'description' => __('Description to the displayed prescore block', 'instacash-bnpl'),
                'default'     => '',
                'desc_tip'    => true,
            ],
            'usp_list_1'           => [
                'title'       => __('Short usp items', 'instacash-bnpl'),
                'type'        => 'text',
                'description' => __('Mini USP blocks on Product calculation', 'instacash-bnpl'),
                'default'     => '',
                'desc_tip'    => true,
            ],
            'usp_list_2'           => [
                'title'       => '',
                'type'        => 'text',
                'description' => '',
                'default'     => '',
                'desc_tip'    => false,
            ],
            'usp_list_3'           => [
                'title'       => '',
                'type'        => 'text',
                'description' => '',
                'default'     => '',
                'desc_tip'    => false,
            ],
            'usp_list_4'           => [
                'title'       => '',
                'type'        => 'text',
                'description' => '',
                'default'     => '',
                'desc_tip'    => false,
            ],
            'dynamic_fields'       => [
                'title'       => __('BNPL Offers', 'instacash-bnpl'),
                'type'        => 'title',
            ],
        ];
    }

    /**
     * Offer specific options.
     *
     * @return array<string, array<string, array<string, string>|bool|string>>
     */
    public static function dinamycOptionFields()
    {
        return [
            'countries' => [
                'title'       => __('Allowed Countries', 'instacash-bnpl'),
                'type'        => 'multiselect',
                'class'       => 'wc-enhanced-select',
                'options'     => ['all' => __('All available countries', 'instacash-bnpl')] + (new \WC_Countries())->get_allowed_countries(),
                'description' => __('Countries for which installment payments are permitted.', 'instacash-bnpl'),
                'default'     => 'all',
                'desc_tip'    => true,
            ],
            'categories' => [
                'title'       => __('Disallowed categories', 'instacash-bnpl'),
                'type'        => 'multiselect',
                'class'       => 'wc-enhanced-select',
                'options'     => self::getProductCategories(),
                'description' => __('Categories in which you cannot pay in installments with the products in the cart', 'instacash-bnpl'),
                'default'     => 'none',
                'desc_tip'    => true,
            ],
            'cart_min' => [
                'title'       => __('Minimum cart total', 'instacash-bnpl'),
                'type'        => 'number',
                'description' => __('Minimum amount that can be paid in installments.', 'instacash-bnpl'),
                'desc_tip'    => true,
            ],
            'cart_max' => [
                'title'       => __('Maximum cart total', 'instacash-bnpl'),
                'type'        => 'number',
                'description' => __('Maximum amount that can still be paid in installments.', 'instacash-bnpl'),
                'desc_tip'    => true,
            ],
            'on_sales' => array(
                'title'       => __('Disallow discounts', 'instacash-bnpl'),
                'type'        => 'select',
                'options'     => [
                    'yes' => __('Enabled', 'instacash-bnpl'),
                    'no'  => __('Disabled', 'instacash-bnpl'),
                ],
                'desc_tip'    => true,
                'description' => __('Disabling installment payments for discount products', 'instacash-bnpl'),
                'default'     => 'no',
            ),
            'not_stock' => array(
                'title'       => __('Disallow backorder', 'instacash-bnpl'),
                'type'        => 'select',
                'options'     => [
                    'yes' => __('Enabled', 'instacash-bnpl'),
                    'no'  => __('Disabled', 'instacash-bnpl'),
                ],
                'desc_tip'    => true,
                'description' => __('Disabling installment payments for products in backorder', 'instacash-bnpl'),
                'default'     => 'no',
            ),
            'companies' => array(
                'title'       => __('Disallow companies', 'instacash-bnpl'),
                'type'        => 'select',
                'options'     => [
                    'yes' => __('Enabled', 'instacash-bnpl'),
                    'no'  => __('Disabled', 'instacash-bnpl'),
                ],
                'desc_tip'    => true,
                'description' => __('Disabling installment payments for company purchases', 'instacash-bnpl'),
                'default'     => 'yes',
            ),
            'account' => array(
                'title'       => __('Disallow accountless', 'instacash-bnpl'),
                'type'        => 'select',
                'options'     => [
                    'yes' => __('Enabled', 'instacash-bnpl'),
                    'no'  => __('Disabled', 'instacash-bnpl'),
                ],
                'desc_tip'    => true,
                'description' => __('Disabling installment payments for customers who have not logged in', 'instacash-bnpl'),
                'default'     => 'no',
            ),
        ];
    }

    /**
     * Deal statuses.
     *
     * @return array<string, array<string, string>>
     */
    public static function dealStates()
    {

        return [
            'PREPARED'                  => [
                'name'  => __('Purchase created', 'instacash-bnpl'),
                'desc'  => __('A purchase has been made in the BNPL system', 'instacash-bnpl'),
                'color' => '#00a1a1',
                'state' => 'on-hold',
            ],
            'CANCELLED'                 => [
                'name'  => __('Purchase cancelled', 'instacash-bnpl'),
                'desc'  => __('Payment process terminated', 'instacash-bnpl'),
                'color' => '#612006',
                'state' => 'cancelled',
            ],
            'INITIAL_PAYMENT_COMPLETED' => [
                'name'  => __('Initial installment paid', 'instacash-bnpl'),
                'desc'  => __('The customer has paid the initial installment', 'instacash-bnpl'),
                'color' => '#015105',
                'state' => 'processing',
            ],
            'ONGOING'                   => [
                'name'  => __('Next installment paid', 'instacash-bnpl'),
                'desc'  => __('The customer has paid the next installment', 'instacash-bnpl'),
                'color' => '#039470',
                'state' => '',
            ],
            'ONGOING_DELAYED'           => [
                'name'  => __('Transaction delayed', 'instacash-bnpl'),
                'desc'  => __('The customer is late in paying the next installment.', 'instacash-bnpl'),
                'color' => '#ff5b0f',
                'state' => '',
            ],
            'COMPLETED'                 => [
                'name'  => __('Purchase completed', 'instacash-bnpl'),
                'desc'  => __('Customer has paid the remaining installments.', 'instacash-bnpl'),
                'color' => '#01950a',
                'state' => 'completed',
            ],
            'INTERRUPTED'               => [
                'name'  => __('Purchase interrupted', 'instacash-bnpl'),
                'desc'  => __('The customer interrupted the installment payment.', 'instacash-bnpl'),
                'color' => '#ff0000',
                'state' => 'failed',
            ]
        ];
    }

    /**
     * Order statuses of Loan application system translated to WC payment statuses.
     *
     * @return array<string, array<string, string>>
     */
    public static function orderStates()
    {

        return [
            'CREATED'                  => [
                'name'  => __('Purchase created', 'instacash-bnpl'),
                'desc'  => __('A purchase has been made in the Instacash system', 'instacash-bnpl'),
                'color' => '#00a1a1',
                'state' => '',
            ],
            'INITIAL'                   => [
                'name'  => __('Purchase linked to customer', 'instacash-bnpl'),
                'desc'  => __('Customer has logged into their account', 'instacash-bnpl'),
                'color' => '#008a8a',
                'state' => '',
            ],
            'STARTED'      => [
                'name'  => __('Loan application started', 'instacash-bnpl'),
                'desc'  => __('The customer has started the loan application', 'instacash-bnpl'),
                'color' => '#005e5e',
                'state' => 'on-hold',
            ],
            'UNDER_REVIEW' => [
                'name'  => __('Loan application under review', 'instacash-bnpl'),
                'desc'  => __('The bank is now checking whether the requested loan amount can be granted based on the customer´s data', 'instacash-bnpl'),
                'color' => '#008f8f',
                'state' => '',
            ],
            'APPROVED'            => [
                'name'  => __('Loan application approved', 'instacash-bnpl'),
                'desc'  => __('The loan is being disbursed', 'instacash-bnpl'),
                'color' => '#039470',
                'state' => '',
            ],
            'INTERRUPTED'                  => [
                'name'  => __('Purchase revoked', 'instacash-bnpl'),
                'desc'  => __('Loan application has been revoked', 'instacash-bnpl'),
                'color' => '#ff5b0f',
                'state' => 'failed',
            ],
            'CANCELLED'                => [
                'name'  => __('Purchase cancelled', 'instacash-bnpl'),
                'desc'  => __('Payment process terminated', 'instacash-bnpl'),
                'color' => '#612006',
                'state' => 'cancelled',
            ],
            'DENIED'                   => [
                'name'  => __('Loan application rejected', 'instacash-bnpl'),
                'desc'  => __('Unsuccessful Loan Application', 'instacash-bnpl'),
                'color' => '#ff0000',
                'state' => 'failed',
            ],
            'SIGNED'        => [
                'name'  => __('Amount transferred', 'instacash-bnpl'),
                'desc'  => __('The bank disbursed the amount', 'instacash-bnpl'),
                'color' => '#015105',
                'state' => '',
            ],
            'COMPLETED'                     => [
                'name'  => __('Payment Completed', 'instacash-bnpl'),
                'desc'  => __('Payment was confirmed by the merchant', 'instacash-bnpl'),
                'color' => '#01950a',
                'state' => 'processing',
            ],
        ];
    }

    /**
     * Make an array from available product categories.
     *
     * @return array<string>
     */
    public static function getProductCategories()
    {
        $categories = ['none' => __('No disallowed category', 'instacash-bnpl')];
        foreach ((array) get_terms(['taxonomy' => 'product_cat', 'hide_empty' => false]) as $category) {
            if (isset($category->term_id)) {
                $categories[$category->term_id] = $category->name;
            }
        }
        return $categories;
    }

    /**
     * Return server url by mode flag.
     *
     * @param boolean $testMode
     *
     * @return string
     */
    public static function getServer($testMode)
    {
        return $testMode ? self::TEST_SERVER : self::SERVER;
    }

    /**
     * Return server url by mode flag.
     *
     * @param boolean $testMode
     *
     * @return string
     */
    public static function getMerchantPortal($testMode)
    {
        return $testMode ? self::TEST_MERCHANT : self::MERCHANT;
    }
}
