<?php
add_action( 'woocommerce_thankyou', 'nummuspay_checkout', 20 );
if (!function_exists( 'nummuspay_checkout' )) {
    function nummuspay_checkout($order_id) {
        if ($order_id > 0) {
            $order = wc_get_order($order_id);
            if ($order instanceof WC_Order) {
                // wp_add_inline_script('noConflictscript','$ = jQuery.noConflict(true);');
                wp_enqueue_script( 'nummuspayjs', 'https://api.nummuspay.com/Content/js/v1/nummuspay.js', array(), '1.0' );
                wp_add_inline_script('nummuspayjs','$ = jQuery.noConflict(true);');
                ?>
                <!-- <script>$ = jQuery.noConflict(true);</script> -->
                <!-- <script src="https://api.nummuspay.com/Content/js/v1/nummuspay.js"></script> -->
                <!-- <script type="text/javascript"> -->
                   <?php wp_add_inline_script('nummuspayjs', 'var orderData = '.json_encode($order->get_data()).';
                    Nummuspay.Checkout({
                        merchantUniqueID: orderData.number,
                        publicCheckoutPageID: '. get_option("_CHECKOUT_PAGE_ID_FROM_NUMMUSPAY").',
                        currency: orderData.currency,
                        amount: orderData.total,
                        tax: 0,
                        firstName: orderData.billing.first_name,
                        lastName: orderData.billing.last_name,
                        email: orderData.billing.email,
                        company: orderData.billing.company,
                        phone: orderData.billing.phone,
                        billingAddress1: orderData.billing.address_1,
                        billingAddress2: orderData.billing.address_2,
                        billingCountry: orderData.billing.country,
                        billingState: orderData.billing.state,
                        billingCity: orderData.billing.city,
                        billingZip: orderData.billing.postcode
                    });');?>
                <!-- </script> -->
                <?php
            }
        }
    }
}

function integrationnummuspay_register_options_page() {
  add_options_page('Integration for Nummuspay', 'Integration for Nummuspay', 'manage_options', 'integration-nummuspay', 'integrationnummuspay_option_page'); 
}
add_action('admin_menu', 'integrationnummuspay_register_options_page');

function integrationnummuspay_option_page()
{

	if(isset($_POST['NUMMUSPAYSubmit'])){
        if ( ! isset( $_POST['NUMMUSPAYValue_nonce'] ) ) {
            return;
        }

        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $_POST['NUMMUSPAYValue_nonce'], 'NUMMUSPAYValue_nonce' ) ) {
            return;
        }
		update_option('_CHECKOUT_PAGE_ID_FROM_NUMMUSPAY',sanitize_text_field($_POST['NUMMUSPAYValue']));
	}
    
    ?>
        <h1>Nummuspay Integration </h1>
        <div class="numpaydiv">
            <form method="POST">
                <?php wp_nonce_field( 'NUMMUSPAYValue_nonce', 'NUMMUSPAYValue_nonce' ); ?>
                <div class="numpaydiv">YOUR CHECKOUT PAGE ID FROM NUMMUSPAY:<br><input type="text" id="NUMMUSPAYValue" name="NUMMUSPAYValue" value="<?php echo get_option('_CHECKOUT_PAGE_ID_FROM_NUMMUSPAY'); ?>"></div>
                <div class="numpaydiv"><input type="submit" name="NUMMUSPAYSubmit" value="Insert"></div>
            </form>
        </div>
        <style>
            div.numpaydiv{
                padding: 5px;
            }
        </style>
    <?php
	
}

