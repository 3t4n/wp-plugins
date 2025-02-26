<?php
//short code
add_shortcode( 'donation-using-woocommerce', 'donation_using_woocommerce_form_func' );
function donation_using_woocommerce_form_func( $atts ) {

    ob_start();
	?> 
    <form action="" method="post">
    <?php wp_nonce_field( 'donationValue_nonce', 'donationValue_nonce' ); ?> 
    <input type="number" name="donation_amt" class="donation-amt-field" value="1">
    <input type="submit" Value="Donate" name="donationSubmit" class="donation-btn">
    </form>
    <?php
	return ob_get_clean();
}

add_action( 'template_redirect', 'add_to_cart_on_custom_page_and_redirect');
 
function add_to_cart_on_custom_page_and_redirect(){
 
    if( isset( $_POST['donationSubmit'] ) ) {
        if ( ! isset( $_POST['donationValue_nonce'] ) ) {
            return;
        }

        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $_POST['donationValue_nonce'], 'donationValue_nonce' ) ) {
            return;
        }
        $price = sanitize_text_field($_POST['donation_amt']); 
        $cart_item_data['_other_options']['product-price'] = $price ;
		$cart = WC()->cart->add_to_cart( get_option('sg_donation_product_id'), 1, null, null, $cart_item_data );
        wp_safe_redirect( wc_get_checkout_url() );
		exit();
    }
 
}

// adding custom price
add_action( 'woocommerce_before_calculate_totals','add_custom_price');
function add_custom_price( $cart_object ) {
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        if($cart_item['product_id'] == get_option('sg_donation_product_id')){
            $custom_price = $cart_item['_other_options']['product-price']; // This will be your custom price
            $cart_item['data']->set_price($custom_price);
        }
    }
}