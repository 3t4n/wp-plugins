<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
//status

add_action('wp_ajax_digages_update_order_status', 'digages_update_order_status');
add_action('wp_ajax_nopriv_digages_update_order_status', 'digages_update_order_status'); // For non-logged-in users

function digages_update_order_status() {
    // Ensure the necessary parameters are received
    if (isset($_POST['order_id']) && isset($_POST['status'])) { 
    check_ajax_referer('digages_send_p2p_confirmation', 'nonce');

        $order_id = isset($_POST['order_id']) ? sanitize_text_field(wp_unslash($_POST['order_id'])) : '';
        $status = isset($_POST['status']) ? sanitize_text_field(wp_unslash($_POST['status'])) : ''; 

        //error_log('Updating order status for order ID ' . $order_id . ' to ' . $status);

        // Load the WooCommerce order
        $order = wc_get_order($order_id);

        //error_log('Order object: ' . var_export($order, true));

        if ($order) {
            try {
                // Update the order status
                $order->update_status($status, 'Order status updated via AJAX.');
                $order->save(); // Save the changes to the order

                //error_log('Order status updated successfully');

                // Return a success response
                wp_send_json_success();
            } catch (Exception $e) {
                //error_log('Error updating order status: ' . $e->getMessage());
                wp_send_json_error('Error updating order status');
            }
        } else {
            wp_send_json_error('Order not found');
        }
    } else {
        wp_send_json_error('Invalid data provided');
    }

    wp_die(); // Terminate the script
}


// Hook to handle the AJAX requests for both logged-in and non-logged-in users
add_action('wp_ajax_digages_upload_screenshot', 'digages_upload_screenshot_and_update_order');
add_action('wp_ajax_nopriv_digages_upload_screenshot', 'digages_upload_screenshot_and_update_order');

function digages_upload_screenshot_and_update_order() {
    // Check if the required POST parameters are set
    if (isset($_POST['order_id']) && isset($_POST['payment_method_title'])) {    
            
        check_ajax_referer('digages_send_p2p_confirmation', 'nonce');     
        // The uploaded file
        // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
        $uploaded_file = $_FILES['screenshot'] ?? null;
        
        // Sanitize the input data
        $order_id = intval($_POST['order_id']);
        $payment_method_title = isset($_POST['payment_method_title']) ? sanitize_text_field(wp_unslash($_POST['payment_method_title'])) : ''; 
        $Ord_status = isset($_POST['status']) ? sanitize_text_field(wp_unslash($_POST['status'])) : '';  // "on-hold"

        // Load the WooCommerce order
        $order = wc_get_order($order_id);

        if ($order) {
            // Check if the status is valid before setting it
            if (!empty($Ord_status)) {
                if (in_array('wc-' . $Ord_status, array_keys(wc_get_order_statuses()))) {
                    if ($order->get_status() !== $Ord_status) {
                        $order->set_status($Ord_status);
                    }
                }
            }

            // Update the payment method title
            $order->set_payment_method_title($payment_method_title);

            // Handle the file upload
            if ($uploaded_file) {
                // Sanitize the file name
                $file_name = sanitize_file_name($uploaded_file['name']);
                $uploaded_file['name'] = $file_name;
            
                // Allowed file types
                $allowed_file_types = ['jpg', 'jpeg', 'png', 'webp', 'pdf'];
            
                // Validate the file type
                $file_type = wp_check_filetype($file_name); 
            
                if (in_array($file_type['ext'], $allowed_file_types)) {
                    // Upload the file to the WordPress uploads directory
                    require_once(ABSPATH . 'wp-admin/includes/file.php');
                    require_once(ABSPATH . 'wp-admin/includes/image.php');
                    require_once(ABSPATH . 'wp-admin/includes/media.php');
                    
                    $uploaded = wp_handle_upload($uploaded_file, ['test_form' => false]);
            
                    if (!isset($uploaded['error']) && isset($uploaded['url'])) {
                        // File was uploaded successfully, now add it to the Media Library
                        $file_path = $uploaded['file'];
                        $file_url = $uploaded['url'];
                        
                        // Prepare attachment data
                        $wp_filetype = wp_check_filetype(basename($file_path), null);
                        $attachment = array(
                            'guid' => $file_url,
                            'post_mime_type' => $wp_filetype['type'],
                            'post_title' => sanitize_file_name(basename($file_path)),
                            'post_content' => '',
                            'post_status' => 'inherit',
                        );
                        
                        //error_log('order id:'.$order_id .'file url'. $file_url);
                        add_post_meta($order_id, '_screenshot_file', $file_url);

                        // Insert the attachment into the database
                        $attachment_id = wp_insert_attachment($attachment, $file_path, $order_id);
                        
                        // Generate and update attachment metadata
                        if (!is_wp_error($attachment_id)) {
                            $attachment_metadata = wp_generate_attachment_metadata($attachment_id, $file_path);
                            wp_update_attachment_metadata($attachment_id, $attachment_metadata);
                            
                            // Save the screenshot URL to the order's metadata
                            // //update_post_meta($order_id, '_screenshot_file', $file_url);
                            // error_log('order id:'.$order_id .'file url'. $file_url);
                            // add_post_meta($order_id, '_screenshot_file', $file_url);

                        }
                    } else {
                        // File upload failed
                        wp_send_json_error('File upload failed: ' . $uploaded['error']);
                    }
                } else {
                    // Invalid file type
                    wp_send_json_error('Invalid file type. Please upload a valid file (jpg, jpeg, png, gif, pdf).');
                }
            } else {
                wp_send_json_error('No file uploaded or an error occurred.');
            }

            // Save the updated order
            $order->save();

            // Prepare the response with a redirect URL
            $order_key = $order->get_order_key();
            $checkout_url = wc_get_page_permalink('checkout');
            $redirect_url = $checkout_url . 'order-received/' . $order_id . '/?key=' . $order_key;

            // Send a success response with the redirect URL
            wp_send_json_success(array(
                'redirect' => $redirect_url
            ));
        } else {
            // Order not found
            wp_send_json_error('Order not found');
        }
    } else {
        // Missing required parameters
        wp_send_json_error('Missing order ID or payment method title');
    }
}



//send bank transfer email

// Add action for AJAX request to resend order email
add_action('wp_ajax_digages_resend_order_email', 'digages_resend_order_email');
add_action('wp_ajax_nopriv_digages_resend_order_email', 'digages_resend_order_email'); // For non-logged-in users

function digages_resend_order_email() {
    // Ensure the required fields are set
    if (isset($_POST['order_id'])) {
        check_ajax_referer('digages_send_p2p_confirmation', 'nonce'); 
        $order_id = intval($_POST['order_id']);

        // Load the WooCommerce order
        $order = wc_get_order($order_id);
        
        if ($order) {
            // Get WooCommerce mailer
            $mailer = WC()->mailer(); 
            // Get WooCommerce mailer and the admin new order email 
            $admin_email = $mailer->emails['WC_Email_New_Order']; // WooCommerce built-in email for admin

            if ($admin_email) {
                // Trigger the "New Order" email to the admin
                $admin_email->trigger($order_id); // Send to admin based on WooCommerce settings 
            } else {
                wp_send_json_error(['message' => 'Failed to send order received email to admin']);
                return; // Exit if admin email fails
            }

            // If both emails are sent successfully
            wp_send_json_success(['message' => 'Emails have been resent successfully to customer and admin.']);
        } else {
            wp_send_json_error('Order not found.');
        }
    } else {
        wp_send_json_error('Missing order ID.');
    }

    wp_die(); // Always call this to terminate properly
}



// Main function to add products from a specific order back to the cart
function digages_add_order_products_to_cart_ajax() {
// Check if nonce is set and sanitize it
if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'digages_add_order_to_cart_nonce')) {
    wp_send_json_error('Invalid request.');
    return;
}


    // Get the order ID from AJAX data
    $order_id = isset($_POST['order_id']) ? intval($_POST['order_id']) : 0;
// Sanitize the return URL
$return_url = isset($_POST['return_url']) ? esc_url_raw(wp_unslash($_POST['return_url'])) : '';

    if (!$order_id) {
        wp_send_json_error('Order ID is invalid.');
        return;
    }

    // Store the order ID in a transient
    set_transient('digages_cancelled_order_id', $order_id, 5 * MINUTE_IN_SECONDS);
    
    // Store the return URL in the session
    if ($return_url) {
        WC()->session->set('digages_return_url', $return_url);
    }

    wp_send_json_success('Order ID stored successfully.');
}
add_action('wp_ajax_digages_add_order_to_cart', 'digages_add_order_products_to_cart_ajax');
add_action('wp_ajax_nopriv_digages_add_order_to_cart', 'digages_add_order_products_to_cart_ajax');


// Function to check for stored order ID and populate cart
function digages_check_and_populate_cart() {
    if (is_checkout()) {
        $order_id = get_transient('digages_cancelled_order_id');
        if ($order_id) {
            $order = wc_get_order($order_id);
            if ($order) {
                foreach ($order->get_items() as $item) {
                    $product_id = $item->get_product_id();
                    $quantity = $item->get_quantity();
                    $variation_id = $item->get_variation_id();
                    $product = wc_get_product($product_id);

                    if ($product && $product->is_in_stock()) {
                        WC()->cart->add_to_cart($product_id, $quantity, $variation_id);
                    }
                }
                delete_transient('digages_cancelled_order_id');
            }
        }
    }
}
add_action('wp', 'digages_check_and_populate_cart');
?>