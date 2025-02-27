<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
    // Verify and process the form submission
if ( isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] ) {
    // Process the desktop form
    if ( isset( $_POST['digages_desktop_form_submitted'], $_POST['digages_desktop_form_nonce'] ) && 
         wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['digages_desktop_form_nonce'] ) ), 'digages_desktop_form_submitted' ) ) {

        $bulk_action = isset( $_POST['bulk_action'] ) ? sanitize_text_field( wp_unslash( $_POST['bulk_action'] ) ) : '';
        $selected_orders = isset( $_POST['post'] ) ? array_map( 'sanitize_text_field', wp_unslash( $_POST['post'] ) ) : array();

        // Process the selected orders based on the bulk action
        if ( ! empty( $selected_orders ) && $bulk_action ) {
            foreach ( $selected_orders as $order_id ) {
                $order = wc_get_order( $order_id );
                if ( $order ) {
                    switch ( $bulk_action ) {
                        case 'mark_processing':
                            $order->update_status( 'processing' );
                            break;
                        case 'mark_on-hold':
                            $order->update_status( 'on-hold' );
                            break;
                        case 'mark_completed':
                            $order->update_status( 'completed' );
                            break;
                        case 'mark_cancelled':
                            $order->update_status( 'cancelled' );
                            break;
                        case 'trash':
                            $order->delete( false ); // Move to Trash
                            break;
                    }
                }
            }
              }
    }
}
    
?>