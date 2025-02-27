<?php

namespace WcGetnet\WooCommerce;

use CoffeeCode\WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register Order Service Provider.
 */
class OrderServiceProvider implements ServiceProviderInterface {

	/**
	 * {@inheritDoc}
	 */
	public function register( $container ) {
		// Nothing to register.
	}

	/**
	 * {@inheritDoc}
	 */
	public function bootstrap( $container ) {
		add_filter( 'manage_woocommerce_page_wc-orders_columns', [$this, 'getnet_add_payment_method_column'] );
		add_filter( 'manage_woocommerce_page_wc-orders_custom_column', [$this, 'getnet_hpos_populate_payment_method_column'], 20, 2 );

        add_filter( 'manage_edit-shop_order_columns', [$this, 'getnet_add_payment_method_column'] );
        add_action( 'manage_shop_order_posts_custom_column', [$this, 'getnet_legacy_populate_payment_method_column'], 20, 2 );
	}

    /**
     * Method to add a custom column to print the payment method in the orders list
     *
     * @param array $columns - wc order page colums data
     * @return void
     */
    public function getnet_add_payment_method_column($columns) {
        foreach ( $columns as $key => $column ) {
            if ( 'order_total' === $key ) {
                $new_columns['payment_method'] = __('Método de Pagamento', 'woocommerce');
            }
            $new_columns[ $key ] = $column;
        }

        return $new_columns ?? $columns;
    }

    /**
     * Method to fill in the date in the column, adding the payment method in the column to legacy WordPress posts storage config.
     *
    * @param string $column_name - column name
    * @param int $post_id - order post ID
    * @return void
    */
    public function getnet_legacy_populate_payment_method_column($column_name, $post_id): void {
        if ( 'payment_method' != $column_name ) {
            return;
        }

        $order = wc_get_order($post_id);
        $payment_type = $order->get_meta('_getnet_payment_type');

        if ($payment_type) {
            echo esc_html($this->getPaymentTypeByMeta($payment_type));
            return;
        }

       echo esc_html($this->getPaymentTypeOldOrders($order));
    }
    /**
     * Method to fill in the date in the column, adding the payment method in the column
     *
     * @param string $column_name - column name
     * @param object $order - order object
     * @return void
     */
    public function getnet_hpos_populate_payment_method_column($column_name, $order): void{
        if ( 'payment_method' != $column_name ) {
            return;
        }

        $payment_type = $order->get_meta('_getnet_payment_type');

        if ($payment_type) {
            echo esc_html($this->getPaymentTypeByMeta($payment_type));
            return;
        }

       echo esc_html($this->getPaymentTypeOldOrders($order));
    }

    /**
     * Returns the payment type based on the given meta.
     *
     * This function takes a payment type as a string and returns a string
     * corresponding to the name of the payment method.
     *
     * @param string $payment_type The payment type (e.g., 'BOLETO', 'CREDIT', 'PIX').
     * @return string The name of the payment method.
     */
    public function getPaymentTypeByMeta( string $payment_type ) {
        switch ($payment_type) {
            case 'BOLETO':
                return 'Boleto';
            case 'CREDIT':
                return 'Cartão de crédito';
            case 'PIX':
                return 'PIX';
            default:
                return '';
        }
    }

    /**
     * Retrieves the payment type for old orders.
     *
     * This function is used to fetch the payment type for orders that were placed
     * before implement of the order meta _getnet_payment_type. It ensures compatibility
     * with older orders by retrieving the payment type from the order response and request meta.
     *
     * @param int $order_id The ID of the order.
     * @return string The payment type for the given order.
     */
    public function getPaymentTypeOldOrders( $order ) {
        $response       = $order->get_meta('_getnet_response');
        $request        = $order->get_meta('_getnet_request');
        $endpoint       = $order->get_meta('_getnet_transaction_endpoint');
        $payment_method = $request['data']->payment->payment_method ?? null;

        $payment_type = '';

        if ( 'BOLETO' === $payment_method ) {
            $payment_type = 'Boleto';
        }

        if ('CREDIT' === $payment_method ) {
            $payment_type = 'Cartão de crédito';
        }

        if ( !empty($response['additional_data']['qr_code']) || str_ends_with($endpoint, '/payments/qrcode/pix') ) {
            $payment_type = 'PIX';
        }

        return $payment_type;
    }
}
