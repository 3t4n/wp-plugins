<?php
/**
 * The WCV_Export_Helper Class
 *
 * This is the this is the helper class to help exporting data for vendors
 */

if ( ! defined( 'ABSPATH' ) ) {
    return;
}

/**
 * WCVendors Pro Order Export class.
 *
 * @version 2.5.2
 * @since   2.5.2
 */
class WCV_Export_Helper {

    /**
     * Whether the vendor is allowed to view orders.
     *
     * @var boolean
     * @version 2.5.2
     * @since   2.5.2
     */
    public $can_view_orders = false;

    /**
     * Whether the vendor is allowed to export orders.
     *
     * @var boolean
     * @version 2.5.2
     * @since   2.5.2
     */
    public $can_export_csv = false;

    /**
     * Whether the vendor is allowed to view customer emails.
     *
     * @var boolean
     * @version 2.5.2
     * @since   2.5.2
     */
    public $can_view_emails = false;

    /**
     * Whether the vendor is allowed to view customer names.
     *
     * @var boolean
     * @version 2.5.2
     * @since   2.5.2
     */
    public $can_view_name = false;

    /**
     * Whether the vendor is allowed to view shipping names.
     *
     * @var boolean
     * @version 2.5.2
     * @since   2.5.2
     */
    public $can_view_shipping_name = false;

    /**
     * Whether the vendor is allowed to view customer addresses.
     *
     * @var boolean
     * @version 2.5.2
     * @since   2.5.2
     */
    public $can_view_address = false;

    /**
     * Whether the vendor is allowed to view customer phone numbers.
     *
     * @var boolean
     * @version 2.5.2
     * @since   2.5.2
     */
    public $can_view_phone = false;


    /**
     * Initialize the class and set its properties.
     *
     * @version 2.5.2
     * @since   2.5.2
     */
    public function __construct() {

        $this->can_view_orders        = wc_string_to_bool( get_option( 'wcvendors_capability_orders_enabled', 'no' ) );
        $this->can_export_csv         = wc_string_to_bool( get_option( 'wcvendors_capability_orders_export', 'no' ) );
        $this->can_view_emails        = wc_string_to_bool( get_option( 'wcvendors_capability_order_customer_email', 'no' ) );
        $this->can_view_name          = wc_string_to_bool( get_option( 'wcvendors_capability_order_customer_name', 'no' ) );
        $this->can_view_shipping_name = wc_string_to_bool( get_option( 'wcvendors_capability_order_customer_shipping_name', 'no' ) );
        $this->can_view_address       = wc_string_to_bool( get_option( 'wcvendors_capability_order_customer_shipping', 'no' ) );
        $this->can_view_phone         = wc_string_to_bool( get_option( 'wcvendors_capability_order_customer_phone', 'no' ) );
    }

    /**
     * Send the CSV to the browser for download
     *
     * @version 1.8.8
     * @since   1.8.8 - Added HPOS Compatibility.
     * @since   2.5.2
     *
     * @param array $all_orders All the orders to export.
     *
     * @return array  $orders  Formatted orders.
     */
    public function format_orders_export( $all_orders ) {

        $rows = array();

        if ( empty( $all_orders ) ) {
            return $rows;
        }

        foreach ( $all_orders as $order_row ) {
            $vendor_order = $order_row->order;

            $parent_order   = wc_get_order( $vendor_order->get_parent_id() );
            $products       = '';
            $needs_shipping = false;
            $needs_to_ship  = false;
            $downloadable   = false;

            foreach ( $vendor_order->get_items() as $order_item_id => $item ) {

                $product_id = $item->get_product_id();
                $product    = wc_get_product( $product_id );

                $needs_shipping = $product->is_virtual();
                if ( ! $needs_shipping ) {
                    $needs_shipping = 0;
                }

                $downloadable = ( $product->is_downloadable() ) ? true : false;
                if ( is_null( $downloadable ) ) {
                    $downloadable = 0;
                }
                $item_qty      = $item->get_quantity();
                $item_name     = $item->get_name();
                $products     .= "$item_qty x $item_name \r";
                $needs_to_ship = ( $needs_shipping || ! $downloadable ) ? true : false;
            }

            $shippers = (array) $parent_order->get_meta( 'wc_pv_shipped' );
            $shippers = array_filter( $shippers );

            $has_shipped = in_array( get_current_user_id(), $shippers, true ) ? __( 'Yes', 'wc-vendors' ) : __( 'No', 'wc-vendors' );
            $shipped     = ( $needs_to_ship ) ? $has_shipped : __( 'NA', 'wc-vendors' );
            $order_date  = $parent_order->get_date_created();

            $use_shipping_address = apply_filters( 'wcv_export_orders_use_shipping_address', true );
            $shipping_name        = $parent_order->get_shipping_first_name() . ' ' . $parent_order->get_shipping_last_name();
            $billing_name         = $parent_order->get_billing_first_name() . ' ' . $parent_order->get_billing_last_name();
            $customer_details     = $use_shipping_address && '' !== trim( $shipping_name ) ? $shipping_name : $billing_name;

            $new_row = array();

            $new_row['order_number'] = $parent_order->get_order_number();
            $new_row['products']     = $products;
            if ( $this->can_view_name ) {
                $new_row['customer'] = $customer_details;
            }
            if ( $this->can_view_address ) {
                $new_row['address']  = $use_shipping_address && '' !== $parent_order->get_shipping_address_1() ? $parent_order->get_shipping_address_1() : $parent_order->get_billing_address_1();
                $new_row['address2'] = $use_shipping_address && '' !== $parent_order->get_shipping_address_2() ? $parent_order->get_shipping_address_2() : $parent_order->get_billing_address_2();
                $new_row['city']     = $use_shipping_address && '' !== $parent_order->get_shipping_city() ? $parent_order->get_shipping_city() : $parent_order->get_billing_city();
                $new_row['state']    = $use_shipping_address && '' !== $parent_order->get_shipping_state() ? $parent_order->get_shipping_state() : $parent_order->get_billing_state();
                $new_row['zip']      = $use_shipping_address && '' !== $parent_order->get_shipping_postcode() ? $parent_order->get_shipping_postcode() : $parent_order->get_billing_postcode();
            }
            if ( $this->can_view_emails ) {
                $new_row['email'] = $parent_order->get_billing_email();
            }
            if ( $this->can_view_phone ) {
                $new_row['phone'] = $parent_order->get_billing_phone();
            }
            $new_row['total']      = $order_row->total;
            $new_row['status']     = $shipped;
            $new_row['order_date'] = date_i18n( 'Y-m-d', strtotime( $order_date ) );

            $rows[] = $new_row;
        }

        return $rows;
    } // prepare_orders_export

    /**
     * Send the CSV to the browser for download
     *
     * @version 2.5.2
     * @since   2.5.2
     *
     * @param    array  $headers  The CSV column headers.
     * @param    array  $body     The CSV body.
     * @param    string $filename The CSV filename.
     */
    public function download_csv( $headers, $body, $filename ) {

        // Clear browser output before this point.
        if ( ob_get_contents() ) {
            ob_end_clean();
        }

        if ( ! $body ) {
            return false;
        }

        // Output headers so that the file is downloaded rather than displayed.
        header( 'Content-Type: text/csv; charset=utf-8' );
        header( 'Content-Disposition: attachment; filename=' . $filename . '.csv' );

        // Create a file pointer connected to the output stream.
        $csv_output = fopen( 'php://output', 'w' );

        // Output the column headings.
        fputcsv( $csv_output, $headers );

        // Body.
        foreach ( $body as $data ) {
            fputcsv( $csv_output, $data );
        }

        die();
    } // download_csv

    /**
     * Headers for the orders export CSV
     *
     * @version 2.5.2
     * @since   2.5.2
     *
     * @return array
     */
    public function get_export_headers() {
        $headers = array(
            'order'    => __( 'Order', 'wc-vendors' ),
            'product'  => __( 'Product Title', 'wc-vendors' ),
            'name'     => __( 'Full name', 'wc-vendors' ),
            'address'  => __( 'Address', 'wc-vendors' ),
            'address2' => __( 'Address 2', 'wc-vendors' ),
            'city'     => __( 'City', 'wc-vendors' ),
            'state'    => __( 'State', 'wc-vendors' ),
            'zip'      => __( 'Zip', 'wc-vendors' ),
            'email'    => __( 'Email address', 'wc-vendors' ),
            'phone'    => __( 'Phone', 'wc-vendors' ),
            'total'    => __( 'Order Total', 'wc-vendors' ),
            'status'   => __( 'Order Status', 'wc-vendors' ),
            'date'     => __( 'Date', 'wc-vendors' ),
        );

        if ( ! $this->can_view_emails ) {
            unset( $headers['email'] );
        }

        if ( ! $this->can_view_phone ) {
            unset( $headers['phone'] );
        }

        if ( ! $this->can_view_name ) {
            unset( $headers['name'] );
        }

        if ( ! $this->can_view_address ) {
            unset( $headers['address'] );
            unset( $headers['address2'] );
            unset( $headers['city'] );
            unset( $headers['state'] );
            unset( $headers['zip'] );
        }

        return apply_filters( 'wcv_export_headers', $headers );
    }
}
