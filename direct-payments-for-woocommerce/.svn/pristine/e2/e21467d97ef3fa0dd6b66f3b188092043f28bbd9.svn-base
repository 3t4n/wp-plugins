<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
add_action('wp_ajax_digages_fetch_payment_methods', 'digages_fetch_payment_methods');
add_action('wp_ajax_nopriv_digages_fetch_payment_methods', 'digages_fetch_payment_methods'); // For non-logged-in users

function digages_fetch_payment_methods() {
    
    
    // Fetch the WooCommerce cart total and currency
    $cart_total = WC()->cart->get_total();
    $currency = get_woocommerce_currency();
    $image_url = plugins_url('../assets/img/copy.svg', __FILE__);  
$cart_total_float = WC()->cart->get_cart_contents_total();

    
    // Fetch the bank, mobile money, and P2P payments options from the database
$bankTransfers = get_option('digages_direct_bank_accounts', []);
$mobileMoney = get_option('digages_direct_mobile_accounts', []);
$cryptoMoney = get_option('digages_direct_crypto_accounts', []);
$p2pPayments = get_option('digages_direct_p2p_accounts', []);
 
// phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
 
// Transform bank transfers data
$formattedBankTransfers = array_map(function ($item) use ($currency, $cart_total_float, $cart_total, $image_url, $bankTransfers) {
    // Determine which wrapper to use based on availability of sort code, iban, or swift
    $wrapperClass = (empty($item['sort_code']) && empty($item['iban']) && empty($item['bic_swift'])) ? 'btssr3' : 'btssr4';
    $outerwrapperClass = (empty($item['sort_code']) && empty($item['iban']) && empty($item['bic_swift'])) ? 'outer-wrapperp3' : 'tumaz-sccrrit';
    
    $details = ' 
    <div class="' . $outerwrapperClass . '">
        <div class="' . $wrapperClass . '">
            <div class="rowt">
                <div class="colt-7">
                    <div class="rowt rowt-colts-1">
                        <div class="colt bdttcxt">BANK NAME</div>
                        <div class="colt bdttcxtw">' . ($item['bank_name'] ?? '') . '</div>
                    </div>
                </div>';

    // Only add the "Change" button if more than one record exists in bank transfers
    if (count($bankTransfers) > 1) {
        $details .= '<div class="text-end colt-5 kjfk">
                        <span class="chaabtnd changeSelection tumaz_hand_pointer">Change</span>
                     </div>';
    }

    $details .= '</div>
                 <div class="colt tlks">
                     <div class="rowt rowt-colts-1">
                         <div class="colt bdttcxt">ACCOUNT NUMBER</div>
                         <div class="colt bdttcxtw">
                             <div class="rowt digagescopybank-container">
                                 <div class="colt-10 numb digages_breakword digagestext-to-copybank" style="overflow-wrap: break-word !important;">' . ($item['account_number'] ?? '') . '</div> 
                                 <div class="colt-2t digagescopybank-button tumaz_hand_pointer"><span class="copybank"><img src="' . esc_url($image_url) . '"></span></div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="colt tlks">
                     <div class="rowt rowt-colts-1">
                         <div class="colt bdttcxt">AMOUNT</div>
                         <div class="colt bdttcxtw">
                             <div class="rowt digagescopybank-container">
                                 <div class="colt-10 ">' . $cart_total . '<span class="digagestext-to-copybank" style="display: none;">'. $cart_total_float .'</span></div> 
                                 <div class="colt-2t digagescopybank-button tumaz_hand_pointer"><span class=""><img src="' . esc_url($image_url) . '" /></span></div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="colt tlks">
                     <div class="rowt rowt-colts-1">
                         <div class="colt bdttcxt">ACCOUNT NAME</div>
                         <div class="colt bdttcxtw accntnamv">' . ($item['account_name'] ?? '') . '</div> 
                     </div>
                 </div>';

    // Append conditional details for sort code, iban, swift
    $conditionalDetails = '';
    if (!empty($item['sort_code'])) {
        $conditionalDetails .= '
        <div class="colt tlks">
            <div class="rowt rowt-colts-1">
                <div class="colt bdttcxt">SORT CODE</div>
                <div class="colt bdttcxtw">
                    <div class="rowt digagescopybank-container">
                        <div class="colt-10 digagestext-to-copybank">' . ($item['sort_code'] ?? '') . '</div> 
                        <div class="colt-2t digagescopybank-button tumaz_hand_pointer"><span class=""><img src="' . esc_url($image_url) . '" /></span></div>
                    </div>
                </div>
            </div>
        </div>';
    }

    if (!empty($item['iban'])) {
        $conditionalDetails .= '
        <div class="colt tlks">
            <div class="rowt rowt-colts-1">
                <div class="colt bdttcxt">IBAN</div>
                <div class="colt bdttcxtw">
                    <div class="rowt digagescopybank-container">
                        <div class="colt-10 digagestext-to-copybank">' . ($item['iban'] ?? '') . '</div> 
                        <div class="colt-2t digagescopybank-button tumaz_hand_pointer"><span class=""><img src="' . esc_url($image_url) . '" /></span></div>
                    </div>
                </div>
            </div>
        </div>';
    }

    if (!empty($item['bic_swift'])) {
        $conditionalDetails .= '
        <div class="colt tlks">
            <div class="rowt rowt-colts-1">
                <div class="colt bdttcxt">BIC/SWIFT</div>
                <div class="colt bdttcxtw">
                    <div class="rowt digagescopybank-container">
                        <div class="colt-10 digagestext-to-copybank">' . ($item['bic_swift'] ?? '') . '</div> 
                        <div class="colt-2t digagescopybank-button tumaz_hand_pointer"><span class=""><img src="' . esc_url($image_url) . '" /></span></div>
                    </div>
                </div>
            </div>
        </div>';
    }

    // Combine all details
    return [
        'id' => uniqid(),
        'name' => $item['bank_name'] ?? '',
        'details' => $details . $conditionalDetails . '</div></div>' // closing wrapper div
     ];
}, $bankTransfers);


    //<div class="colt bdttcxt">' . WC()->session->get('order_id') . '</div>. esc_html($currency) 
    // Transform mobile money data
// Transform mobile money data
$formattedMobileMoney = array_map(function ($item) use ($currency, $cart_total_float , $cart_total, $mobileMoney) {

    $image_urlw = plugins_url('../assets/img/copy.svg', __FILE__); 
    // Set up the mobile money details
    $details = '
    <div class="btssr3">
        <div class="rowt">
            <div class="colt-7">
                <div class="rowt rowt-colts-1">
                    <div class="colt bdttcxt">MOBILE MONEY PROVIDER</div>
                    <div class="colt bdttcxtw">' . ($item['mobile_name'] ?? '') . '</div>
                </div>
            </div>';

    // Only add the "Change" button if more than one record exists in mobile money options
    if (count($mobileMoney) > 1) {
        $details .= '<div class="text-end colt-5 kjf">
                        <span class="chaabtnd mobmonchangeSelection tumaz_hand_pointer">Change</span>
                     </div>';
    }

    $details .= '</div>
                <div class="colt tlks">
                    <div class="rowt rowt-colts-1">
                        <div class="colt bdttcxt">PHONE NUMBER</div>
                        <div class="colt bdttcxtw">
                            <div class="rowt digagesmobcopy-container">
                                <div class="colt-10 ssns digages_breakword digagesmobtext-to-copy" style="overflow-wrap: break-word !important;">' . ($item['phone_number'] ?? '') . '</div> 
                                <div class="colt-2t digagesmobcopy-button tumaz_hand_pointer"><span class=""><img src="' . esc_url($image_urlw) . '" /></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="colt tlks">
                    <div class="rowt rowt-colts-1">
                        <div class="colt bdttcxt">AMOUNT</div>
                        <div class="colt bdttcxtw">
                            <div class="rowt digagesmobcopy-container">
                                <div class="colt-10">' . $cart_total . '<span class="digagesmobtext-to-copy" style="display: none;">'. $cart_total_float .'</span></div> 
                                <div class="colt-2t digagesmobcopy-button tumaz_hand_pointer"><span class=""><img src="' . esc_url($image_urlw) . '" /></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="colt tlks">
                    <div class="rowt rowt-colts-1">
                        <div class="colt bdttcxt">ACCOUNT NAME</div>
                        <div class="colt bdttcxtw accntnam">' . ($item['account_name'] ?? '') . '</div> 
                    </div>
                </div>
            </div>';

    // Combine all details
    return [
        'id' => uniqid(),
        'name' => $item['mobile_name'] ?? '',
        'details' => $details // closing wrapper div
    ];
}, $mobileMoney);



// Transform crypto money data
$formattedcryptoMoney = array_map(function ($item) use ($currency, $cart_total_float , $cart_total, $cryptoMoney) {

    $image_urlw = plugins_url('../assets/img/copy.svg', __FILE__); 
    // Set up the crypto money details
    $details = '
    <div class="btssr3">
        <div class="rowt">
            <div class="colt-7">
                <div class="rowt rowt-colts-1">
                    <div class="colt bdttcxt">CRYPTOCURRENCY</div>
                    <div class="colt bdttcxtw">' . ($item['crypto_name'] ?? '') . '</div>
                </div>
            </div>';

    // Only add the "Change" button if more than one record exists in crypto money options
    if (count($cryptoMoney) > 1) {
        $details .= '<div class="text-end colt-5 kjf">
                        <span class="chaabtnd crymonchangeSelection tumaz_hand_pointer">Change</span>
                     </div>';
    }

    $details .= '</div> 
    
                <div class="colt tlks">
                    <div class="rowt rowt-colts-1">
                        <div class="colt bdttcxt">NETWORK</div>
                        <div class="colt bdttcxtw cryptoaccntnam">' . ($item['account_name'] ?? '') . '</div> 
                    </div>
                </div> 

                <div class="colt tlks">
                    <div class="rowt rowt-colts-1">
                        <div class="colt bdttcxt">WALLET ADDRESS</div>
                        <div class="colt bdttcxtw">
                            <div class="rowt digagescrypcopy-container">
                                <div class="colt-10 cryptossns digagescryptext-to-copy digages_breakword" style="overflow-wrap: break-word !important;">' . ($item['phone_number'] ?? '') . '</div> 
                                <div class="colt-2t digagescrypcopy-button tumaz_hand_pointer"><span class=""><img src="' . esc_url($image_urlw) . '" /></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="colt tlks">
                    <div class="rowt rowt-colts-1">
                        <div class="colt bdttcxt">AMOUNT</div>
                        <div class="colt bdttcxtw">
                            <div class="rowt digagescrypcopy-container">
                                <div class="colt-10">' . $cart_total . '<span class="digagescryptext-to-copy" style="display: none;">'. $cart_total_float .'</span></div> 
                                <div class="colt-2t digagescrypcopy-button tumaz_hand_pointer"><span class=""><img src="' . esc_url($image_urlw) . '" /></span></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>';
// phpcs:enable
    // Combine all details
    return [
        'id' => uniqid(),
        'name' => $item['crypto_name'] ?? '',
        'details' => $details // closing wrapper div
    ];
}, $cryptoMoney);



    // Transform P2P payments data
    $formattedP2PPayments = array_map(function ($item) use ($currency, $cart_total) {
        return [
            'id' => uniqid(),
            'name' => $item['p2p_name'] ?? '',
            'details' => ''
        ];
    }, $p2pPayments);

    
    // Prepare the data structure
    $data = [
        'bankTransfers' => $formattedBankTransfers,
        'mobileMoney' => $formattedMobileMoney,
        'cryptoMoney' => $formattedcryptoMoney,
        'p2pPayments' => $formattedP2PPayments,
    ];

    // Return the data as a successful AJAX response
    wp_send_json_success($data);
} 


add_action('wp_ajax_digages_send_p2p_confirmation', 'digages_send_p2p_confirmation');
add_action('wp_ajax_nopriv_digages_send_p2p_confirmation', 'digages_send_p2p_confirmation');  // For non-logged-in users

function digages_send_p2p_confirmation() {
    // Ensure the necessary parameters are received
    if (isset($_POST['order_id']) && isset($_POST['user_email']) && isset($_POST['p2p_details'])) {
        
    // Verify nonce
    check_ajax_referer('digages_send_p2p_confirmation', 'nonce');
 

// Check if the required POST variables are set before processing
// Sanitize and unslash input in the same line, checking for existence
$order_id = isset($_POST['order_id']) ? sanitize_text_field(wp_unslash($_POST['order_id'])) : '';
$user_email = isset($_POST['user_email']) ? sanitize_email(wp_unslash($_POST['user_email'])) : '';
$bankName = isset($_POST['bankName']) ? wp_kses_post(wp_unslash($_POST['bankName'])) : '';
$phoneNumber = isset($_POST['phoneNumber']) ? wp_kses_post(wp_unslash($_POST['phoneNumber'])) : '';
$accountName = isset($_POST['accountName']) ? wp_kses_post(wp_unslash($_POST['accountName'])) : '';
$p2p_details = isset($_POST['p2p_details']) ? wp_kses_post(wp_unslash($_POST['p2p_details'])) : '';
$p2p_cusdetails = isset($_POST['p2p_cusdetails']) ? wp_kses_post(wp_unslash($_POST['p2p_cusdetails'])) : '';
$dtum_amount = isset($_POST['dtum_amount']) ? sanitize_text_field(wp_unslash($_POST['dtum_amount'])) : '';
 
$paymentdetailsmain = $bankName . ' | ' . $phoneNumber . ' | ' . $accountName; 
$uploaded_url = get_post_meta($order_id, '_screenshot_file', true);
 
// Continue with processing $uploaded_url

// error_log('details:'.$paymentdetailsmain);
// error_log('upload:'.$uploaded_url);
add_post_meta($order_id, '_digages_paymentdetails', $paymentdetailsmain); // Update the post meta with the payment details

// Decode HTML entities for proper display of any currency symbol 
$decoded_amount = html_entity_decode(wp_strip_all_tags(wc_price(WC()->cart->get_total(''))));

$scrimg = $uploaded_url;
$scrimglink = $scrimg;

// Determine the image extension
$image_extension = pathinfo($scrimg, PATHINFO_EXTENSION);


// Send the email to the admin
$admin_email = get_option('admin_email');  // Get the WordPress admin email
//$admin_email = 'tumazfresh@gmail.com';  // Get the WordPress admin email
$admin_subject = 'Payment of ' . $decoded_amount . ' from ' . $user_email;
$admin_message = '<p>'. html_entity_decode($p2p_details) . '</p>'; // nl2br for new lines

// Set the email headers to send HTML
$headers = array('Content-Type: text/html; charset=UTF-8'); 

// Fetch the image content for attachment
// Fetch the image content for attachment
$image_data = wp_remote_get($scrimglink);
if (is_wp_error($image_data)) {
    // Handle the error if the image couldn't be fetched
    // error_log('Error fetching image data');
} else {
    global $wp_filesystem;

    // Initialize the WP_Filesystem
    if (!function_exists('WP_Filesystem')) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
    }
    WP_Filesystem();

    // Set the path for the temporary file with the correct extension
    $temp_file = wp_tempnam() . '.' . $image_extension;

    // Save the image to the temporary file
    $wp_filesystem->put_contents($temp_file, wp_remote_retrieve_body($image_data));

    // Add the attachment to the email
    $attachments = array($temp_file);

    // Attempt to send the email to admin
    $admin_mail_sent = wp_mail($admin_email, $admin_subject, $admin_message, $headers, $attachments);

    // Clean up the temporary file
    wp_delete_file($temp_file);

    if ($admin_mail_sent) {
        // Email was sent successfully
        // error_log('Email sent');
    } else {
        // Email failed to send
        // error_log('Email not sent');
    }
}


    // // Attempt to send the email to admin
    // $admin_mail_sent = wp_mail($admin_email, $admin_subject, $admin_message, $headers, $attachments);

    // if ($admin_mail_sent) {
    //     // Email was sent successfully
    // } else {
    //     // Email failed to send
    // }




        // Now send the order confirmation email to the customer using WooCommerce's built-in email system
        if ($admin_mail_sent) {
            // Add the P2P customer details as custom order meta
            $order = wc_get_order($order_id);
            if ($order) {
                $order->update_meta_data('_p2p_cusdetails', $p2p_cusdetails);
                $order->save();
                
                // Load WooCommerce mailer and email classes
                $mailer = WC()->mailer();
                
                // Get the specific email object for "On Hold" order email
                $customer_email = $mailer->emails['WC_Email_Customer_On_Hold_Order']; // or use 'WC_Email_Customer_Invoice'
                
                // Trigger the email to be sent
                $customer_email->trigger($order_id);
            }

            wp_send_json_success('Emails sent successfully.');
        } else {
            wp_send_json_error('Admin email failed to send.');
        }
    } else {
        wp_send_json_error('Invalid data provided.');
    }

    wp_die();  // Terminate the script
}

// Add P2P Customer Details to the Customer Email
add_filter('woocommerce_email_order_meta', 'digages_add_p2p_cusdetails_to_email', 20, 3);
function digages_add_p2p_cusdetails_to_email($order, $sent_to_admin, $plain_text) {
    $p2p_cusdetails = $order->get_meta('_p2p_cusdetails');
    
    if ($p2p_cusdetails) {
        // Allowed HTML tags
$allowed_tags = [
    'p' => [],
    'br' => [],
    'h2' => [],
    'li' => [],
    'ul' => [],
    'div' => [],
    'strong' => [],
];

// Sanitize and allow specific HTML tags
echo wp_kses('<p>' . nl2br($p2p_cusdetails) . '</p>', $allowed_tags);

    }
}



?>   