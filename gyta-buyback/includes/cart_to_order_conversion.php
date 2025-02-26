<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
    // Exit if accessed directly
}
add_action(
    'woocommerce_thankyou',
    'wcpti_content_thankyou',
    10,
    1
);
add_action(
    'woocommerce_view_order',
    'wcpti_content_thankyou',
    10,
    1
);
function wcpti_content_thankyou(  $order_id  ) {
    $order = wc_get_order( $order_id );
    $wcpti_easypost_postage_label_png_url = $order->get_meta( '_wcpti_easypost_postage_label_png_url' );
    if ( $wcpti_easypost_postage_label_png_url == '' ) {
        // WCPTI_EasyPost::createLabel(array('orderObj'=>$orderObj, 'order_id'=>$order_id));
        $wcpti_easypost_error = $order->get_meta( '_wcpti_easypost_error' );
        if ( $wcpti_easypost_error != '' ) {
            echo "<p class='wcpti-shippingLabelErrorDisplay'>Error obtaining shipping label: " . $wcpti_easypost_error . '</p>';
        }
    }
    if ( $wcpti_easypost_postage_label_png_url != '' ) {
        ?>
			<button class='wcpti_shipping_label_print' type='button' onclick="window.open('<?php 
        echo $wcpti_easypost_postage_label_png_url;
        ?>')">Print Shipping Label</button>
		<?php 
    }
    //echo '<br>wcpti_settings_easypost_pre_checkout_address_validation = '.get_option( 'wcpti_settings_easypost_pre_checkout_address_validation' );
    //! show $text_to_display = get_option( 'wcpti_settings_order_placed_local_drop_off' ); here if it's local
    $orderObj = new WC_Order($order_id);
    if ( isLocalPickup( $orderObj ) ) {
        $text_to_display = get_option( 'wcpti_settings_order_placed_local_drop_off' );
        if ( $text_to_display != '' ) {
            echo '<h3 class="wcpti-localDropOffInstructionsHeader">' . esc_html( getShippingMethodLabel( $orderObj ) ) . ' instructions</h3>';
            echo '<p class="wcpti-localDropOffInstructionsContent">' . esc_html( $text_to_display ) . '</p>';
        }
    }
    $customer_order_approval_required = get_option( 'wcpti_customer_order_approval_required' );
    if ( $customer_order_approval_required == 'yes' ) {
        // echo 'current status: '.$orderObj->get_status();
        //echo '<br>';
        $display_status = '';
        if ( $orderObj->get_status() == 'cust-approved' ) {
            $display_status = 'Customer Approved';
        }
        if ( $orderObj->get_status() == 'cust-disapproved' ) {
            $display_status = 'Customer Disapproved';
        }
        if ( $display_status != '' ) {
            echo '<div id="wcpti_order_notices" class=" notice ">';
            // error is-dismissible
            echo '<p>' . wp_kses_post( 'Your Current Status is: ' . $display_status ) . '</p>';
            echo '</div>';
        }
        if ( $orderObj->get_status() == 'wait-cust-app' ) {
            ?>
				<form method='post' id='wcpti-wait-cust-app-form' style="display:inline;">
					<input type='hidden' name='command' value='customer order approval'>
					<input type='hidden' name='approval' value='true'>
					<input type='hidden' name='key' value="<?php 
            echo $_REQUEST['key'];
            ?>">
					<input type='submit' value="I approve this order for <?php 
            echo get_woocommerce_currency_symbol() . $orderObj->get_total();
            ?>">
				</form>
				
				<form method='post' id='wcpti-wait-cust-app-form' style="display:inline;">
					<input type='hidden' name='command' value='customer order approval'>
					<input type='hidden' name='approval' value='false'>
					<input type='hidden' name='key' value="<?php 
            echo $_REQUEST['key'];
            ?>">
					<input type='submit' value="I DO NOT approve this order">
				</form>
				
			<?php 
        }
    }
}

/**
 * Start: Store the cart weight into the order
 **/
// From: https://www.businessbloomer.com/woocommerce-save-display-order-total-weight/
add_action( 'woocommerce_checkout_update_order_meta', 'wcpti_save_weight_order' );
function wcpti_save_weight_order(  $order_id  ) {
    $weight = WC()->cart->get_cart_contents_weight();
    $order = wc_get_order( $order_id );
    $order->update_meta_data( '_cart_weight', sanitize_text_field( $weight ) );
    $order->save();
}

/**
 * End: Store the cart weight into the order
 **/
/**
 * Start: Validate the address before checking out
 **/
add_action( 'woocommerce_checkout_process', 'wcpti_validate_address_pre_checkout' );
function wcpti_validate_address_pre_checkout() {
    $easypost_api_key = get_option( 'wcpti_settings_easypost_api_key' );
    if ( $easypost_api_key == '' ) {
        // If no key is on file, skip this check because it won't work anyways
        return;
    }
    // https://stackoverflow.com/questions/49535670/make-order-notes-required-if-shipping-method-is-local-pickup-in-woocommerce
    $chosen_shipping = WC()->session->get( 'chosen_shipping_methods' )[0];
    $chosen_shipping = explode( ':', $chosen_shipping );
    if ( $chosen_shipping[0] == 'local_pickup' ) {
        //wc_add_notice( "Say what, you're gonna drop it off?", 'error' ); // apparently, by adding a 'notice', that stops the checkout process
        return;
        // no need to validate the address, they're going to drop it off
    }
    // you can add any custom validations here
    $params = array();
    $params['billing_address_1'] = sanitize_text_field( $_POST['billing_address_1'] );
    $params['billing_address_2'] = sanitize_text_field( $_POST['billing_address_2'] );
    $params['billing_city'] = sanitize_text_field( $_POST['billing_city'] );
    $params['billing_state'] = sanitize_text_field( $_POST['billing_state'] );
    $params['billing_postcode'] = sanitize_text_field( $_POST['billing_postcode'] );
    $params['billing_phone'] = sanitize_text_field( $_POST['billing_phone'] );
    $params['billing_country'] = sanitize_text_field( $_POST['billing_country'] );
    $address_validation_result = array(
        'success' => true,
    );
    if ( get_option( 'wcpti_settings_vpfi_use_easypost' ) != 'no' ) {
        if ( get_option( 'wcpti_settings_easypost_skip_address_validation' ) != 'yes' ) {
            $address_validation_result = WCPTI_EasyPost::validateAddress( $params );
        }
    }
    /*
    echo "<pre>";
    	print_r($_POST,true);
    echo "</pre>";
    */
    if ( $address_validation_result['success'] === true ) {
        // do nothing
    } else {
        $message = $address_validation_result['message'];
        if ( is_array( $message ) ) {
            $message = implode( ', ', $message );
        }
        // wc_add_notice( $address_validation_result['response'], 'error' );
        wc_add_notice( 'Shipping Validation Error: ' . $message, 'error' );
        // apparently, by adding a 'notice', that stops the checkout process
    }
    /*
    if ( empty( $_POST['contactmethod'] ) ) {
    	wc_add_notice( 'Please select your preferred contact method.', 'error' );
    }
    */
}

/**
 * End: Validate the address before checking out
 **/