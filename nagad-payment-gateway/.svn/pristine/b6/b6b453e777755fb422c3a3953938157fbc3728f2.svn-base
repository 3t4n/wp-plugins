<?php

namespace Nagad\Gateway\Payment;

if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class txn_list extends \WP_List_Table {

    public function no_items() {
        _e( 'No Record Found', 'nagad-pay' );
    }

    public function get_columns() {
        return [
            'order_id'       => __( 'Order Id', 'nagad-pay' ),
            'nagad_order_id'       => __( 'Nagad Order Id', 'nagad-pay' ),
            'nagad_txn_id'             => __( 'Nagad Txn Id', 'nagad-pay' ),
            'payment_ref_id'     => __( 'Payment Ref ID', 'nagad-pay' ),
            'nagad_txn_amount' => __( 'Txn Amount', 'nagad-pay' ),
            'txn_status'     => __( 'Status', 'nagad-pay' ),
            'nagad_txn_time' => __( 'Transaction Time', 'nagad-pay' ),
            'order_time' => __( 'Initiation Time', 'nagad-pay' )
        ];
    }

    public function prepare_items( $search = '' ) {

        $column   = $this->get_columns();

        $this->_column_headers = [ $column ];

        $per_page     = 10;
        $current_page = $this->get_pagenum();
        $offset       = ( $current_page - 1 ) * $per_page;

        $args = [
            'number' => $per_page,
            'offset' => $offset,
        ];

        if ( $search != '' ) {
            $args['search'] = $search;
        }

        $this->items = helper::get_txn_list( $args );

        $this->set_pagination_args( [
            'total_items' => helper::get_txn_count(),
            'per_page'    => $per_page,
        ] );

    }

    protected function column_default( $item, $column_name ) {
        switch ( $column_name ) {
            case 'txn_status':
                $status = isset( $item->txn_status ) ? $item->txn_status : '';

                if ( 'success' === strtolower( $status ) ) {
                    return '<span style="color: green;"><b>' . esc_html( $status ) . '</b></span>';
                } else {
                    return '<span style="color: red;"><b>' . esc_html( $status ) . '</b></span>';
                }
                break;
            default:
                return isset( $item->$column_name ) ? $item->$column_name : '';
        }
    }

   
}
