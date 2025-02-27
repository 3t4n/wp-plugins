<div class="paypal_hide_show skt_donation_box skt_donation_form">
<?php
	global $wpdb;
	$wp_skt_choose_currency_paypal = $wpdb->prefix . "skt_choose_currency_paypal";
    $select_choose_currency_paypal = $wpdb->get_row("SELECT * FROM $wp_skt_choose_currency_paypal WHERE id='1'"); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
    $get_choose_stripe_count = $wpdb->num_rows;
    if ($get_choose_stripe_count <= 0) {
        $for_paypal_payment ="USD";
        $for_paypal_sign ="&#36;";
    }else{
        $type_currency_id_paypal = $select_choose_currency_paypal->type_currency_id;
        $currency_symbol_id_paypal = $select_choose_currency_paypal->currency_symbol_id;
        $skt_country_type_currency = $wpdb->prefix . "skt_country_type_currency";
        $select_type_currency_stripe = $wpdb->get_row("SELECT * FROM $skt_country_type_currency WHERE id='$type_currency_id_paypal'"); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
        $for_paypal_payment =  $select_type_currency_stripe->currency_stripe;
        $for_paypal_sign =  $select_type_currency_stripe->currency_sign;
    }
	if ( esc_attr(get_option('skt_donation_paypalexp_mode_zero_one') == 'true' )){
	    $clientId = esc_attr( get_option('skt_donation_paypalexp_test_api') );
	    $secret = esc_attr( get_option('skt_donation_paypalexp_secretkey') );
	    $sandbox_live = "https://api-m.sandbox.paypal.com";
	}else{
	   $clientId = esc_attr( get_option('skt_donation_paypalexp_live_api') );
	   $secret = esc_attr( get_option('skt_donation_paypalexpIlive_secretkey') );
	   $sandbox_live = "https://api-m.paypal.com";
	}
	$recurringtime = esc_attr( get_option('skt_donation_priceper') );
	$productname = "Donations";
?>
    <script src="<?php echo esc_url( 'https://www.paypal.com/sdk/js?client-id='. $clientId ); // phpcs:ignore WordPress.WP.EnqueuedResources.NonEnqueuedScript ?>&vault=true&intent=subscription" data-namespace="paypal_sdk"></script>
<?php
	// Get Access Token
$response = wp_remote_post(
    $sandbox_live . "/v1/oauth2/token",
    [
        'headers' => [
            'Authorization' => 'Basic ' . base64_encode($clientId . ':' . $secret),
            'Content-Type'  => 'application/x-www-form-urlencoded',
        ],
        'body'    => [
            'grant_type' => 'client_credentials',
        ],
        'sslverify' => false, // Disable SSL verification for testing; remove in production!
    ]
);

if (is_wp_error($response)) {
    die("Error: " . $response->get_error_message()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

$result = wp_remote_retrieve_body($response);
$json = json_decode($result);

if (empty($json->access_token)) {
    die("Error: No response.");
}

$tokencode = $json->access_token;

// Create Product
$product_response = wp_remote_post(
    $sandbox_live . "/v1/catalogs/products",
    [
        'headers' => [
            'Authorization' => 'Bearer ' . $tokencode,
            'Content-Type'  => 'application/json',
        ],
        'body'    => wp_json_encode([
            'name'        => $productname,
            'description' => 'Donations',
            'type'        => 'SERVICE',
            'category'    => 'SOFTWARE',
            'image_url'   => 'https://example.com/streaming.jpg',
            'home_url'    => 'https://example.com/home',
        ]),
        'sslverify' => false,
    ]
);

if (is_wp_error($product_response)) {
    die("Error: " . $product_response->get_error_message()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

$product_result = wp_remote_retrieve_body($product_response);
$product_data = json_decode($product_result);

if (empty($product_data->id)) {
    die("Error: No response.");
}

$product_id = $product_data->id;

// Create Billing Plan
$plan_response = wp_remote_post(
    $sandbox_live . "/v1/billing/plans",
    [
        'headers' => [
            'Authorization' => 'Bearer ' . $tokencode,
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json',
            'Prefer'        => 'return=representation',
        ],
        'body'    => wp_json_encode([
            'product_id' => $product_id,
            'name'       => $productname,
            'description' => ' ',
            'billing_cycles' => [
                [
                    'frequency' => [
                        'interval_unit'  => $recurringtime,
                        'interval_count' => 1,
                    ],
                    'tenure_type'  => 'TRIAL',
                    'sequence'     => 1,
                    'total_cycles' => 1,
                ],
                [
                    'frequency' => [
                        'interval_unit'  => $recurringtime,
                        'interval_count' => 1,
                    ],
                    'tenure_type'  => 'REGULAR',
                    'sequence'     => 2,
                    'total_cycles' => 12,
                    'pricing_scheme' => [
                        'fixed_price' => [
                            'value'         => $donation_amount,
                            'currency_code' => $for_paypal_payment,
                        ],
                    ],
                ],
            ],
            'payment_preferences' => [
                'service_type'            => 'PREPAID',
                'auto_bill_outstanding'   => true,
                'setup_fee'               => [
                    'value'         => $donation_amount,
                    'currency_code' => $for_paypal_payment,
                ],
                'setup_fee_failure_action' => 'CONTINUE',
                'payment_failure_threshold' => 3,
            ],
            'quantity_supported' => true,
            'taxes' => [
                'percentage' => '1',
                'inclusive'  => true,
            ],
        ]),
        'sslverify' => false,
    ]
);

if (is_wp_error($plan_response)) {
    die("Error: " . $plan_response->get_error_message()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

$plan_result = wp_remote_retrieve_body($plan_response);
$plan_data = json_decode($plan_result);

if (empty($plan_data->id)) {
    die("Error: No response.");
}

$subscription_id = $plan_data->id;

?>
    <div id="sktchangeeventone">
        <form name="checkoutexpress" id="sktpaypalbuttoncontainer" class="slt_form_horizontal" method="post">
            <?php if(esc_attr(get_option('skt_donation_first_name_show')) !="false"){ ?>
            <label><?php echo esc_attr( get_option('skt_donation_stripe_first_name_lable') ); ?></label>
            <input type="text" name="first_name"  id="sktfname" placeholder="<?php echo esc_attr( get_option('skt_donation_stripe_first_name') ); ?>" value="" required></br></br>
            <?php } ?>
            <?php if(esc_attr(get_option('skt_donation_last_name_show')) !="false"){ ?>
            <label><?php echo esc_attr( get_option('skt_donation_stripe_last_name_lable') ); ?></label>
            <input type="text" name="last_name" id="sktlname" placeholder="<?php echo esc_attr( get_option('skt_donation_stripe_last_name') ); ?>" value="" required></br></br>
            <?php }?>
            <?php if(esc_attr(get_option('skt_donation_email_show')) !="false"){ ?>
            <label><?php echo esc_attr( get_option('skt_donation_stripe_email_lable') ); ?></label>
            <input type="text" name="email" id="sktemail" placeholder="<?php echo esc_attr( get_option('skt_donation_stripe_email') ); ?>" value="" required></br></br>
            <?php } ?>
            <?php if(esc_attr(get_option('skt_donation_phone_show')) !="false"){ ?>
            <label><?php echo esc_attr( get_option('skt_donation_stripe_phone_name_lable') ); ?></label>
            <input type="text" name="phone" id="sktphone" placeholder="<?php echo esc_attr( get_option('skt_donation_stripe_phone_name') ); ?>" value="" required></br></br>
            <?php } ?>
            <label><?php echo esc_attr( get_option('skt_donation_stripe_amount_lable') ); ?></label>
            <input type="text" name="donation_amount" id="sktdonationamount" placeholder="<?php echo esc_attr( get_option('skt_donation_stripe_amount') ); ?>" value="<?php echo esc_attr($donation_amount);?>" required="required" readonly></br></br>
            <input type="hidden" name="payment_in_currency" value="<?php echo esc_attr($for_paypal_payment);?>">
            <input type="text" name="currency_sign" value="<?php echo esc_attr($for_paypal_sign);?>" readonly>
            <?php wp_nonce_field( 'paypalexpress_subscriptionnormal', 'add_paypalexpress_nonce' ); ?>
            <div id="paypalcheckout-button-container"></div>
        </form> 
    </div>
    <script>
      paypal_sdk.Buttons({
        createSubscription: function(data, actions) {
        return actions.subscription.create({
            'plan_id': '<?php echo esc_attr ( $subscription_id );?>'
          });
      },
      onApprove: function(data, actions) {
        var subscriptionID = data.subscriptionID;
          jQuery('#sktpaypalbuttoncontainer').append('<div><input type="text" id="paypalsubscriptionid" name="paypalexpsubscription_id" value=""/></div>');
          jQuery("#paypalsubscriptionid").val(subscriptionID);
          jQuery("form[name=checkoutexpress]").submit();
      }
    }).render('#paypalcheckout-button-container');
  </script>
</div>