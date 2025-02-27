<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Register custom endpoint to handle order confirmation/cancellation
class Digages_Email_Order_Status_Update_URL {
    
    public function __construct() {
        add_action( 'init', [ $this, 'add_custom_rewrite_rules' ] );
        add_action( 'template_redirect', [ $this, 'process_order_status_update' ] );
        add_filter( 'query_vars', [ $this, 'add_query_vars' ] );
    }

    // Add custom rewrite rules
    public function add_custom_rewrite_rules() {
        add_rewrite_rule( '^digages-email-confirm-order/([0-9]+)/?$', 'index.php?order_id=$matches[1]&order_action=confirm', 'top' );
        add_rewrite_rule( '^digages-email-cancel-order/([0-9]+)/?$', 'index.php?order_id=$matches[1]&order_action=cancel', 'top' );
        flush_rewrite_rules(); // Flush rewrite rules to apply the new ones
    }

    // Register custom query vars
    public function add_query_vars( $vars ) {
        $vars[] = 'order_id';
        $vars[] = 'order_action';
        return $vars;
    }

    // Process the order status update
// Process the order status update
public function process_order_status_update() {
    // Only check login status when accessing the custom order confirmation/cancellation URLs
    $order_id = absint( get_query_var( 'order_id' ) );
    $order_action = sanitize_text_field( get_query_var( 'order_action' ) );

    if ( $order_id && $order_action ) {
        // Restrict access to logged-in users for these actions only
        if ( ! is_user_logged_in() ) {
            wp_die( 'You must be logged in to perform this action.' );
        }

        $order = wc_get_order( $order_id );

        if ( $order ) {
            if ( $order_action === 'confirm' ) {
                $order->update_status( 'processing', 'Order completed via URL.' );
                wp_redirect( home_url( '/wp-admin/admin.php?page=digages-direct-payments' ) );
                exit;
            } elseif ( $order_action === 'cancel' ) {
                $order->update_status( 'cancelled', 'Order cancelled via URL.' );
                wp_redirect( home_url( '/wp-admin/admin.php?page=digages-direct-payments' ) );
                exit;
            }
        } else {
            wp_die( 'Invalid Order ID.' );
        }
    }
}


}

new Digages_Email_Order_Status_Update_URL();
?>