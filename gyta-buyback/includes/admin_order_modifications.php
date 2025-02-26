<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
    // Exit if accessed directly
}
/**
 * Start: Modify the admin orders view interface
 **/
if ( is_admin() ) {
    add_action(
        'woocommerce_admin_order_data_after_order_details',
        'wcpti_admin_order_data_after_order_details',
        10,
        1
    );
    add_action(
        'woocommerce_admin_order_data_after_billing_address',
        'wcpti_admin_order_data_after_billing_address',
        10,
        1
    );
    add_action(
        'woocommerce_admin_order_data_after_shipping_address',
        'wcpti_admin_order_data_after_shipping_address',
        10,
        1
    );
    function wcpti_admin_order_data_after_order_details(  $order  ) {
        // placeholder
    }

    function wcpti_admin_order_data_after_billing_address(  $order  ) {
        echo "<div class='address'>";
        $payment_method = $order->get_payment_method();
        if ( $payment_method == 'wcpti_paypal' ) {
            echo '<p><strong>PayPal Address:</strong> ' . esc_html( $order->get_meta( '_wcpti_paypal_address' ) ) . '</p>';
        }
        if ( $payment_method == 'wcpti_amazon_gift_card' ) {
            echo '<p><strong>Amazon Gift Card Address:</strong> ' . esc_html( $order->get_meta( '_wcpti_amazon-gift-card-address' ) ) . '</p>';
        }
        echo "</div>";
    }

    function wcpti_admin_order_data_after_shipping_address(  $order  ) {
        echo "<div class='address'>";
        if ( isLocalPickup( $order ) ) {
            echo '<p>';
            echo '<strong>Shipping Label:</strong>';
            echo "No Label Needed: " . getShippingMethodLabel( $order );
            echo '</p>';
        } else {
            $tracking_data = $order->get_meta( '_wcpti_easypost_tracking', false );
            // passing false as second parameter to get all values if multiple exist
            if ( $tracking_data ) {
                $tracking_data = $tracking_data[0];
                if ( is_array( $tracking_data ) && count( $tracking_data ) > 0 ) {
                    echo '<p>';
                    // https://freemius.com/help/documentation/wordpress-sdk/software-licensing/
                    echo '<strong>Shipping Label:</strong>';
                    if ( wcpti_fs()->is_free_plan() ) {
                        wcpti_show_upgrade_now_notice();
                    }
                    isLocalPickup( $order );
                    echo '</p>';
                    echo '<p>';
                    echo '<strong>Tracking Number:</strong>';
                    if ( wcpti_fs()->is_free_plan() ) {
                        wcpti_show_upgrade_now_notice();
                    }
                    echo '</p>';
                }
            } else {
                $wcpti_easypost_error = $order->get_meta( '_wcpti_easypost_error' );
                if ( $wcpti_easypost_error != '' ) {
                    echo '<p>';
                    echo '<strong>Shipping Label Error</strong>';
                    echo esc_html( $wcpti_easypost_error );
                    echo '</p>';
                }
            }
        }
        echo '<p><strong>Order Weight:</strong> ' . esc_html( $order->get_meta( '_cart_weight' ) ) . ' ' . esc_html( get_option( 'woocommerce_weight_unit' ) ) . '</p>';
        echo "</div>";
    }

}
/**
 * End: Modify the admin orders view interface
 **/
/**
 * Start: Add actions to the 'order actions' admin order details screen
 **/
if ( is_admin() ) {
    add_action( 'woocommerce_order_actions', 'wcpti_woo_order_actions' );
    function wcpti_woo_order_actions(  $actions  ) {
        $actions['resend_order_created_email'] = '* Send "Order Created" Email';
        $actions['resend_order_processing_email'] = '* Send "Order Received" Email';
        // aka, "Order Processing"
        $actions['resend_order_completed_email'] = '* Send "Order Completed" Email';
        // aka, "Order Processing"
        $customer_order_approval_required = get_option( 'wcpti_customer_order_approval_required' );
        if ( $customer_order_approval_required == 'yes' ) {
            $actions['resend_order_pending_review_approval_email'] = '* Send "Payment Pending Customer Approval" Email';
            // aka, "Order Note"
        }
        return $actions;
    }

    add_action( 'woocommerce_order_action_resend_order_processing_email', 'wcpti_woo_resend_order_processing_email' );
    add_action( 'woocommerce_order_action_resend_order_created_email', 'wcpti_woo_resend_order_created_email' );
    add_action( 'woocommerce_order_action_resend_order_completed_email', 'wcpti_woo_resend_order_completed_email' );
    add_action( 'woocommerce_order_action_resend_order_pending_review_approval_email', 'wcpti_woo_resend_order_pending_review_approval_email' );
    function wcpti_woo_resend_order_processing_email(  $order  ) {
        $order_id = $order->get_id();
        $allmails = WC()->mailer()->emails;
        $email = $allmails['WC_Email_Customer_Processing_Order'];
        $email->trigger( $order_id );
        $order->add_order_note( '"Order Processing" Email Sent' );
    }

    function wcpti_woo_resend_order_created_email(  $order  ) {
        $order_id = $order->get_id();
        $allmails = WC()->mailer()->emails;
        $email = $allmails['WC_Email_Customer_On_Hold_Order'];
        $email->trigger( $order_id );
        $order->add_order_note( '"Order Created" Email Resent' );
    }

    function wcpti_woo_resend_order_completed_email(  $order  ) {
        $order_id = $order->get_id();
        $allmails = WC()->mailer()->emails;
        $email = $allmails['WC_Email_Customer_Completed_Order'];
        $email->trigger( $order_id );
        $order->add_order_note( '"Order Completed" Email Sent' );
    }

    function wcpti_woo_resend_order_pending_review_approval_email(  $order  ) {
        $order_id = $order->get_id();
        $allmails = WC()->mailer()->emails;
        $email = $allmails['WC_Email_Customer_Note'];
        $order->add_order_note( 'Your order is ready for review.  Please click the order number below.', true );
        // note for the customer
        $order->update_status( 'wc-wait-cust-app', 'Gyta Automatic Status Handling:' );
        $email->trigger( $order_id );
        $order->add_order_note( '"Order Pending Review Approval" Email Sent' );
    }

}
/**
 * End: Add actions to the 'order actions' admin order details screen
 **/