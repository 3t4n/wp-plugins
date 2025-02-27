 <?php 
if ( esc_attr( get_option( 'skt_donation_paypalexp_mode_zero_one' ) ) == 'true' ) {
    $clientId = esc_attr( get_option( 'skt_donation_paypalexp_test_api' ) );
    $secret = esc_attr( get_option( 'skt_donation_paypalexp_secretkey' ) );
    $sandbox_live = "https://api-m.sandbox.paypal.com";
} else {
    $clientId = esc_attr( get_option( 'skt_donation_paypalexp_live_api' ) );
    $secret = esc_attr( get_option( 'skt_donation_paypalexpIlive_secretkey' ) );
    $sandbox_live = "https://api-m.paypal.com";
}

$page_id = get_queried_object_id();
$get_pageurl = get_the_permalink( $page_id );

// Set up PayPal API credentials
$client_id = $clientId;
$client_secret = $secret;

// Set up API endpoints
$api_base = $sandbox_live; // Sandbox or live environment
$create_order_url = $api_base . '/v2/checkout/orders';

// Generate the Basic Authentication token
$auth_token = base64_encode( "$client_id:$client_secret" );

// Set up request data
$data = array(
    'intent' => 'CAPTURE',
    'purchase_units' => array(
        array(
            'amount' => array(
                'currency_code' => $payment_in_currency,
                'value' => $donation_amount // Set your purchase amount here
            )
        )
    ),
    'application_context' => array(
        'brand_name' => 'Donation',
        'landing_page' => 'NO_PREFERENCE', // Options: 'NO_PREFERENCE', 'BILLING', or 'LOGIN'
        'user_action' => 'PAY_NOW', // Options: 'CONTINUE' or 'PAY_NOW'
        'return_url' => add_query_arg(
            array(
                'mode'              => 'paypalsuccess',
                'first_name'        => $first_name,
                'last_name'         => $last_name,
                'email'             => $email,
                'phone'             => $phone,
                'donation_amount'   => $donation_amount,
                'payment_in_currency' => $payment_in_currency,
            ),
            $get_pageurl
        ), // Redirect URL after payment completion
        'cancel_url' => add_query_arg(
            'mode',
            'paypalfail',
            $get_pageurl
        ) // Redirect URL if the user cancels the payment
    )
);

// Make the API request using wp_remote_post()
$response = wp_remote_post(
    $create_order_url,
    array(
        'method'    => 'POST',
        'headers'   => array(
            'Authorization' => 'Basic ' . $auth_token,
            'Content-Type'  => 'application/json',
        ),
        'body'      => wp_json_encode( $data ), // Safely encode data to JSON
        'timeout'   => 45, // Set a timeout limit
    )
);

// Check for errors
if ( is_wp_error( $response ) ) {
    echo esc_html__( 'Error: Failed to create order.', 'skt-donation' );
    echo esc_html( $response->get_error_message() );
} else {
    $http_status = wp_remote_retrieve_response_code( $response );
    $body = json_decode( wp_remote_retrieve_body( $response ), true );

    if ( $http_status !== 201 ) {
        echo esc_attr( "Error: Failed to create order. HTTP Status Code: $http_status", 'skt-donation' );
    } else {
        // Get the approval URL from the response
        $approval_url = '';
        foreach ( $body['links'] as $link ) {
            if ( $link['rel'] === 'approve' ) {
                $approval_url = $link['href'];
                break;
            }
        }

        // Redirect the user to PayPal for payment approval
        wp_redirect( $approval_url );
        exit;
    }
}
?>
