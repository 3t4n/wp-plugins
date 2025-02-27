<?php
function skt_donation_paypal_process_function(){
    if ( sanitize_text_field( wp_unslash( isset( $_REQUEST['REQUEST_URI_nonce'] ) ) ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['REQUEST_URI_nonce'], 'REQUEST_URI_nonce_action' ) ) ) ) {
        echo esc_html( '' );
    }
    $mode_of_paypal = sanitize_text_field( wp_unslash(isset($_REQUEST['mode_of_paypal']) ? $_REQUEST['mode_of_paypal'] : ''));
    global $wpdb;
    if($mode_of_paypal=="simple_paypal"){
        global $post;
        $page_id = $post->ID;

        $paypal_payment_id = sanitize_text_field( wp_unslash(isset($_REQUEST['paymentID']) ? $_REQUEST['paymentID'] : ''));
        $paypal_payer_id = sanitize_text_field( wp_unslash(isset($_REQUEST['payerID']) ? $_REQUEST['payerID'] : ''));
        $paypal_token = sanitize_text_field( wp_unslash(isset($_REQUEST['token']) ? $_REQUEST['token'] : ''));
        $donation_amount = sanitize_text_field( wp_unslash(isset($_REQUEST['donation_amount']) ? $_REQUEST['donation_amount'] : ''));
        $customer_firstname = sanitize_text_field( wp_unslash(isset($_REQUEST['first_name']) ? $_REQUEST['first_name'] : ''));
        $customer_lastname = sanitize_text_field( wp_unslash(isset($_REQUEST['last_name']) ? $_REQUEST['last_name'] : ''));
        $customer_email = sanitize_text_field( wp_unslash(isset($_REQUEST['email']) ? $_REQUEST['email'] : ''));
        $customer_phone = sanitize_text_field( wp_unslash(isset($_REQUEST['phone']) ? $_REQUEST['phone'] : ''));

        $mode="paypal";
        $status = "paid";
        $current_date = gmdate('d-m-Y');
        $table_name = $wpdb->prefix ."skt_donation_amount"; 
        $data_donation_amt = array(
            'customer_firstname' => $customer_firstname,
            'customer_lastname' => $customer_lastname,
            'customer_email' => $customer_email,
            'customer_phone' => $customer_phone,
            'paypal_payment_id' => $paypal_payment_id,
            'paypal_payer_id' => $paypal_payer_id,
            'paypal_token' => $paypal_token,
            'mode' => "paypal",
            'status' => 'paid',
            'donation_amount' => $donation_amount,
            'payment_date' => $current_date,
        );
        $insert_data = $wpdb->insert( $table_name, $data_donation_amt ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
        if($insert_data){
            /*********Email functiion start here*****/
            $admin_email_address = esc_attr( get_option('skt_donation_skt_email_address') );
            $email_subject = esc_attr( get_option('skt_donation_skt_email_subject') );
            $email_message = esc_attr( get_option('skt_donation_skt_email_message') );
            $to = $customer_email;
            // subject
            $subject = $email_subject;
            // compose message
                $message = "
                <html>
                <head>
                    <title></title>
                </head>
                <body>
                    <p>".$email_message."</p>
                </body>
                </html>
                ";
                // To send HTML mail, the Content-type header must be set
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // More headers
                $headers .= $admin_email_address;
                // send email
                wp_mail($to, $subject, $message, $headers);
                /*********Email functiion end here*******/
                $paypal_success = "Payment Sucessfully Completed and Transaction ID : ".$paypal_payment_id;
                $path_name = get_site_url().'/?page_id='.$page_id.'&payment_result_success='.$paypal_success.'&payment_gatway=payment_success&payment_gatway_result=result';
                echo '<script>window.location = "'. $path_name .'";</script>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                exit();
        }else{
                $paypal_success = "Payment Sucessfully Completed But Data Not Save In Our System and Transaction ID : ".$paypal_payment_id;
                $path_name = get_site_url().'/?page_id='.$page_id.'&payment_result_success='.$paypal_success.'&payment_gatway=payment_success&payment_gatway_result=result';
                echo '<script>window.location = "'. $path_name . '";</script>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                exit();
        }
    }
}
?>