<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

class fwr_csv_exporter
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;
    /**
     * Values passed from Export Form.
     *
     * @since    1.0.0
     * @access   private
     * @var      array $args The options for this export.
     */
    private $args;
    /**
     * Bunch of shorthand Vars from @args passed before
     *
     * @since    1.0.0
     * @access   private
     * @var      string $dateFrom The options for this export.
     * @var      string $dateTo The options for this export.
     * @var      string $orderStatus The options for this export.
     */
    private $dateFrom;
    private $dateTo;
    private $orderStatus;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of this plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct ( $plugin_name, $version, $args )
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->args = $args[ $this->plugin_name ];
        $this->dateFrom = $this->args[ 'orders_date_from' ];
        $this->dateTo = $this->args[ 'orders_date_to' ];
        $this->orderStatus = isset( $this->args[ 'orders_order_status' ] ) ? $this->args[ 'orders_order_status' ] : 'completed';
    }

    /**
     * Main function for this Export class
     */
    public function export ()
    {
        ob_start();
        $fName = sprintf( 'feedatyCSV__%s__%s.csv', $this->dateFrom, $this->dateTo );
        $handle = fopen( $fName, 'w' );
        //check if $handle is a valide resource
        if ( !$handle ) {

            return;
        }

        $default_culture = strtoupper( substr( get_locale(), 0, 2 ) );
        fputcsv( $handle, array (
                            'Order ID',
                            'UserID',
                            'E-mail',
                            'Date',
                            'Product ID',
                            'Extra',
                            'Product Url',
                            'Product Image',
                            'EAN',
                            'Culture'
                        )
        );

        if ( is_array( $orders = $this->get_orders() ) ) {
            foreach ( $orders as $order ) {
                $idOrder = $order->get_id();
                $alt_id = $idOrder;
                if ( version_compare( WC_VERSION, '4.0', '<=' ) ) {
                    $checkStatus = sprintf( 'wc-%s', $this->orderStatus );
                    if ( $order->post->post_status != $checkStatus ) {
                        continue;
                    }
                } // Woocommerce >= 5.x.x code
                else {
                    if ( $order->get_status() != $this->orderStatus ) {
                        continue;
                    }
                }
                if ( method_exists( $order, 'get_billing_email' ) ) {
                    $alt_id = $order->get_billing_email();
                }
                $options = get_option( $this->plugin_name );
                $email = $alt_id;
                $user_id = $alt_id;
                $culture = $order->get_meta( '_billing_locale', true );
                if ( empty( $culture ) ) {
                    $culture = $default_culture;
                }
                if ( is_array( $items = $order->get_items() ) ) {
                    foreach ( $items as $item ) {
                        if ( !method_exists( $order, 'get_date_completed' ) ) {
                            continue;
                        }
                        $product = wc_get_product( $item[ 'product_id' ] );
                        if ( is_object( $product ) ) {
                            $product_id = $product->get_id();
                            $ean = get_post_meta( $product_id, 'feedaty_ean', true );
                            if ( isset( $options[ 'productIdentifier' ] ) && $options[ 'productIdentifier' ] == 'sku' ) {
                                $product_id = $product->get_sku();
                            }
                            $img_url = wp_get_attachment_image_url( $product->get_image_id(), 'full' );

                            //Feedaty Import requires a specific date/time format
                            $date = '--';
                            if ( !empty( $order->get_date_completed() ) ) {
                                $order_date = $order->get_date_completed()->getTimestamp();//date( $date_time_format, strtotime( $order->get_date_completed() ) );
                                $date = wp_date( 'd/m/Y H:i', (int)$order_date );          //  date( $date_time_format, $order_date );
                            }

                            fputcsv( $handle, array (
                                $idOrder,
                                $user_id,
                                $email,
                                $date,
                                $product_id,
                                $item->get_name(),
                                $product->get_permalink(),
                                $img_url,
                                (string)$ean,
                                $culture
                            ) );
                        }
                    }
                }
            }
        }

        fclose( $handle );
        ob_end_flush();

        $this->downloadCsv( $fName );
        die();
    }

    /**
     * Filters query params for retrieving order export
     *
     * @return array
     * @throws Exception
     */
    private function set_query_params ()
    {
        $dateFormat = 'Y-m-d';
        $dateFrom = null;
        $operator = '<=';

        if ( !empty( $this->dateFrom ) ) {
            $dateFrom = new DateTime( $this->dateFrom );
            $operator = '...';
        }
        $dateTo = new DateTime();
        if ( !empty( $this->dateTo ) ) {
            $dateTo = new DateTime( $this->dateTo );
        }

        $params = array (
            'limit'  => -1,
            'status' => $this->orderStatus
        );
        $params[ 'date_created' ] = sprintf( '%s%s%s',
                                             empty( $dateFrom ) ? null : date_format( $dateFrom, $dateFormat ),
                                             $operator,
                                             date_format( $dateTo, $dateFormat )
        );

        return $params;
    }

    /**
     * Retrieves WooCommerce orders
     *
     * @return stdClass|WC_Order[]
     * @throws Exception
     */
    private function get_orders ()
    {
        if ( is_multisite() ) {
            switch_to_blog( get_current_blog_id() );
            $orders = wc_get_orders( $this->set_query_params() );
            restore_current_blog();
        } else {
            $orders = wc_get_orders( $this->set_query_params() );
        }

        return $orders;
    }

    /**
     * Parse Headers for downloading CSV files
     *
     * @param $file
     */
    protected function downloadCsv ( $file )
    {
        if ( file_exists( $file ) ) {
            //set headers
            header( 'Content-Description: File Transfer' );
            header( 'Content-Type: application/csv' );
            header( 'Content-Disposition: attachment; filename=' . basename( $file ) );
            header( 'Expires: 0' );
            header( 'Cache-Control: must-revalidate' );
            header( 'Pragma: public' );
            header( 'Content-Length: ' . filesize( $file ) );
            ob_clean();
            flush();
            readfile( $file );
        }
    }
}