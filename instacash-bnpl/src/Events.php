<?php

/**
 * Store WP event hooks.
 * php version 7.4.33
 *
 * @category Woocommerce-plugin
 * @package  instacashBnpl
 * @author   Fintrous Group Kft. <fintrous.com>
 * @license  GNU General Public License v3.0
 * @link     https://instacash.hu/
 */

namespace InstaCash\BNPL;

use InstaCash\Symfony\Component\HttpFoundation\Request;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Wp hook handler.
 */
class Events
{
    /**
     * Add WP function modifications by filters and actions.
     *
     * @return void
     */
    public function hooks()
    {
        add_action('manage_shop_order_posts_custom_column', [$this, 'paymentStatusDetails'], 20, 2);
        add_action('woocommerce_before_account_navigation', [$this, 'accountNavigationAddJS']);
        add_action('woocommerce_before_checkout_form', [$this, 'pendingOrderNotice']);
        add_action('woocommerce_pay_order_before_submit', [$this, 'orderPayAddJS']);
        add_action('elementor/widgets/register', [$this, 'registerElementorWidget']);
        add_action('restrict_manage_posts', [$this, 'statusFilterInput']);

        add_filter('woocommerce_account_menu_items', [$this, 'paymentLinkToProfile'], 10, 2);
        add_filter('woocommerce_get_endpoint_url', [$this, 'paymentLink'], 10, 4);
        add_filter('manage_edit-shop_order_columns', [$this, 'paymentStatusColumn'], 20, 1);
        add_filter('request', [$this, 'dealStatusMetaFilter'], 10, 1);
    }

    /**
     * Add some extra data to customer account "Installment payment" button with JS.
     *
     * @return void
     */
    public function accountNavigationAddJS()
    {
        \wp_enqueue_script('ic-bnpl', \instaCashBnplPluginUri('assets/js/payment.js'), [], '1.0.3', ['in_footer', true]);
    }

    /**
     * Add handler JS to order pay screen in customer side.
     * Print payment link to redirect.
     *
     * @return void
     */
    public function orderPayAddJS()
    {

        // Only run if pending order exists
        if (!get_query_var('pay_for_order') && get_query_var('key')) {
            return;
        }

        $order_id = \absint(\get_query_var('order-pay'));
        $order    = \wc_get_order($order_id);

        if (!($order instanceof \WC_Order) || \InstaCashBNPLApplication::class !== $order->get_payment_method()) {
            return;
        }

        $options = (array) \get_option(Config::OPTIONS_NAME);
        $mode    = ($options['test_mode'] === 'yes');

        printf(
            '<input type="hidden" name="instaCashPaymentUrl" id="instaCashPaymentUrl" value="%s/%s/%s">',
            esc_url(Config::getServer($mode)),
            esc_attr(strval($options['bnpl_id'])),
            esc_attr(strval($order->get_meta('publicId')))
        );
        \wp_enqueue_script('ic-bnpl-order', \instaCashBnplPluginUri('assets/js/payment.js'), [], '1.0.3', ['in_footer', true]);
    }

    /**
     * Add an "Instalment payment" button to customer profile navigation.
     *
     * @param array<string> $items
     * @param mixed         $endpoints
     *
     * @return array<string>
     */
    public function paymentLinkToProfile($items, $endpoints)
    {

        $items['InstaCash'] = __('Installment payment', 'instacash-bnpl');
        return $items;
    }

    /**
     * Add link to customer profile "Instalment payment" button.
     *
     * @param string $url
     * @param string $endpoint
     * @param string $value
     * @param string $permalink
     *
     * @return string
     */
    public function paymentLink($url, $endpoint, $value, $permalink)
    {
        if ($endpoint === 'InstaCash') {
            $options = (array) \get_option(Config::OPTIONS_NAME);
            $mode    = ($options['test_mode'] === 'yes');
            $url     = Config::getServer($mode) . '/' . $options['bnpl_id'] . '/';
        }
        return $url;
    }

    /**
     * Show a notification to the customer if they already have a pending order.
     *
     * @return void
     */
    public function pendingOrderNotice()
    {

        $orders  = (array) \wc_get_orders(['customer_id' => \get_current_user_id(),'status' => ['on-hold', 'pending']]);
        $pending = false;

        foreach ($orders as $order) {
            if ($order->get_payment_method() === \InstaCashBNPLApplication::class) {
                $pending = true;
            }
        }

        if (!$pending) {
            return;
        }

        \wc_print_notice(
            sprintf(
                '%s <a href="%s" style="text-decoration:none;float:right;">%s ></a>',
                __('You already have a pending order.', 'instacash-bnpl'),
                \wc_get_account_endpoint_url('orders'),
                __('Orders', 'instacash-bnpl')
            ),
            'notice'
        );
    }

    /**
     * Adding payment status column to admin order list.
     *
     * @param array<string> $columns
     *
     * @return array<string>
     */
    public function paymentStatusColumn($columns)
    {
        $reordered_columns = array();

        // Inserting columns to a specific location
        foreach ($columns as $key => $column) {
            $reordered_columns[$key] = $column;
            if ($key ==  'order_status') {
                // Inserting after "Status" column
                $reordered_columns['instacash-status'] = __('Payment Status', 'instacash-bnpl');
            }
        }
        return $reordered_columns;
    }

    /**
     * Add status information to orders table column.
     *
     * @param string $column
     * @param int    $orderId
     *
     * @return void
     */
    public function paymentStatusDetails($column, $orderId)
    {
        if ('instacash-status' !== $column) {
            return;
        }

        $order  = \wc_get_order($orderId);

        if (!($order instanceof \WC_Order) || \InstaCashBNPLApplication::class !== $order->get_payment_method()) {
            \esc_html_e('No Status', 'instacash-bnpl');
            return;
        }

        $status     = strval($order->get_meta(Config::STATUS_OPTION_NAME));
        $jsonStatus = json_decode($status, false);

        if (!$status && !$jsonStatus && !isset(Config::dealStates()[$status])) {
            \esc_html_e('Click to get status', 'instacash-bnpl');
            return;
        }

        if ($jsonStatus) {
            $status       = $jsonStatus->deal->status;
            $transactions = count($jsonStatus->deal->transactions);
            $paid         = count(
                array_filter(
                    $jsonStatus->deal->transactions,
                    static function ($transaction) {
                        return Config::COMPLETED_STATUS === $transaction->status;
                    }
                )
            );
        } else {
            $transactions = $order->get_meta(Config::TRANSACTIONS_OPTION_NAME);
            $paid         = $order->get_meta(Config::PAID_OPTION_NAME);
        }

        printf(
            '<strong style="color:%s">%s</strong><br/>%s/%s %s',
            esc_attr(Config::dealStates()[$status]['color']),
            esc_html(Config::dealStates()[$status]['name']),
            esc_attr(strval($paid)),
            esc_attr(strval($transactions)),
            esc_html(__('Paid', 'instacash-bnpl'))
        );
    }

    /**
     * Add a filter field to orders table heading.
     *
     * @return void
     */
    public function statusFilterInput()
    {
        global $typenow;

        if ('shop_order' === $typenow) {
            $request = Request::createFromGlobals();
            $states  = Config::dealStates();
            $state   = $request->query->get(Config::STATUS_OPTION_NAME, '');
            $paid    = $request->query->get(Config::PAID_OPTION_NAME, '');

            include_once instaCashBnplPluginPath('/template/admin/filterSelect.php');
        }
    }

    /**
     * Adds a meta_query to order list if it's selected.
     *
     * @param array<string> $vars
     *
     * @return array<array<int|string, array<int, array<string, bool|float|int|string|null>>|string>|string>
     */
    public function dealStatusMetaFilter($vars)
    {
        global $typenow;
        $request = Request::createFromGlobals();

        if ('shop_order' !== $typenow) {
            return $vars;
        }

        $filters = [];

        if ('' !== $request->query->get(Config::STATUS_OPTION_NAME, '')) {
            $filters[] = [
                'key'     => Config::STATUS_OPTION_NAME,
                'value'   => $request->query->get(Config::STATUS_OPTION_NAME),
                'compare' => 'LIKE'
            ];
        }

        if ('' !== $request->query->get(Config::PAID_OPTION_NAME, '')) {
            $filters[] = [
                'key'     => Config::PAID_OPTION_NAME,
                'value'   => $request->query->get(Config::PAID_OPTION_NAME, 0),
                'compare' => '='
            ];
        }

        if ($filters) {
            $vars['meta_query']   = [
                'relation' => 'AND',
                $filters
            ];
        }

        return $vars;
    }

    /**
     * Add product page elements to elementor widget.
     *
     * @param \Elementor\Widgets_Manager $widgetsManager
     */
    public function registerElementorWidget( $widgetsManager ) {

        $widgetsManager->register( new \InstaCashElementorProductCalculation() );
        $widgetsManager->register( new \InstaCashElementorProductPrescore() );
    }


    /**
     * Send a Notification during activation.
     */
    public static function installed()
    {
        $message = sprintf(Config::INSTALL_MESSAGE, get_site_url());
        $nonce   = wp_create_nonce(Config::NONCE_KEY);

        Transport::sendNotification($message, $nonce);
    }

    /**
     * Send a Notification during deactivation.
     */
    public static function removed()
    {
        $message = sprintf(Config::REMOVAL_MESSAGE, get_site_url());
        $nonce   = wp_create_nonce(Config::NONCE_KEY);

        Transport::sendNotification($message, $nonce);
    }
}
