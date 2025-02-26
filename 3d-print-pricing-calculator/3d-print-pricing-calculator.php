<?php
/*
 * Plugin Name: 3D Print Pricing Calculator
 * Description: A simple stl file parser and printing calculator
 * Author: Pikocode
 * Author URI: https://pikocode.com/
 * Version: 1.0.8
 * Text Domain: 3d-print-pricing-calculator
 * License: GPL-3.0
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *  
 * Copyright (C) 2024 Pikocode
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/gpl-3.0.html>.
 */
if (! defined('ABSPATH')) exit;

// Include necessary files
require_once plugin_dir_path(__FILE__) . 'includes/admin-settings.php';

// Enqueue scripts and styles
function ppc3d_stl_parser_enqueue_scripts()
{
    wp_enqueue_script('babylon', 'https://cdn.babylonjs.com/babylon.js', array(), '7.25.1', true);
    wp_enqueue_script('babylon-loader', 'https://cdn.babylonjs.com/loaders/babylonjs.loaders.min.js', array(), '7.25.1', true);

    if (!is_admin()) {
        wp_enqueue_style('bootstrap', plugin_dir_url(__FILE__) . 'includes/bootstrap/css/bootstrap.min.css', array(), '5.3.3', false);
        wp_enqueue_style('fontawesome', plugin_dir_url(__FILE__) . 'includes/font-awesome/fontawesome.min.css', array(), '6.5.2', false);
        wp_enqueue_style('fontawesome-all', plugin_dir_url(__FILE__) . 'includes/font-awesome/all.min.css', array(), '6.5.2', false);
        wp_enqueue_script('bootstrap-js',  plugin_dir_url(__FILE__) . 'includes/bootstrap/js/bootstrap.min.js', array(), '5.3.3', true);
        $style_path = plugin_dir_path(__FILE__) . 'css/style.css';
        $style_version = file_exists($style_path) ? filemtime($style_path) : false;
        wp_enqueue_style('stl-parser-style', plugins_url('css/style.css', __FILE__), array(), $style_version);

        $script_path = plugin_dir_path(__FILE__) . 'js/script.js';
        $script_version = file_exists($script_path) ? filemtime($script_path) : false;
        wp_enqueue_script('stl-parser-script', plugins_url('js/script.js', __FILE__), array('jquery', 'babylon', 'babylon-loader', 'bootstrap-js'), $script_version, true);
        // Localize the script

        wp_localize_script('stl-parser-script', 'ppc3d_stl_parser_3d', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('ppc3d_upload_stl_nonce'),
        ));
    }
}
add_action('wp_enqueue_scripts', 'ppc3d_stl_parser_enqueue_scripts');

function ppc3d_enqueue_custom_admin_styles()
{
    $style_path_admin = plugin_dir_path(__FILE__) . 'css/admin-style.css';
    $style_version_admin = file_exists($style_path_admin) ? filemtime($style_path_admin) : false;
    wp_enqueue_style('custom-admin-styles',  plugins_url('/css/admin-styles.css', __FILE__), array(), $style_version_admin);
    $script_path_admin = plugin_dir_path(__FILE__) . 'js/admin-scripts.js';
    $script_version_admin = file_exists($script_path_admin) ? filemtime($script_path_admin) : false;
    wp_enqueue_script('stl-parser-admin-script', plugins_url('js/admin-scripts.js', __FILE__), array('jquery'), $script_version_admin, true);

    // Localize the admin script

    wp_localize_script('stl-parser-admin-script', 'ppc3d_stl_parser_admin', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ppc3d_upload_stl_nonce'),
    ));
}
add_action('admin_enqueue_scripts', 'ppc3d_enqueue_custom_admin_styles');

// Define the AJAX action hooks
add_action('wp_ajax_ppc3d_upload_stl_file', 'ppc3d_upload_stl_file');
add_action('wp_ajax_nopriv_ppc3d_upload_stl_file', 'ppc3d_upload_stl_file');
add_action('wp_ajax_ppc3d_show_stl_file', 'ppc3d_show_stl_file');
add_action('wp_ajax_nopriv_ppc3d_show_stl_file', 'ppc3d_show_stl_file');
add_action('wp_ajax_ppc3d_send_purchase_emails', 'ppc3d_send_purchase_emails_callback');

function ppc3d_allow_stl_uploads($mimes)
{
    // Allow STL file uploads
    $mimes['stl'] = 'application/sla';
    return $mimes;
}
add_filter('upload_mimes', 'ppc3d_allow_stl_uploads');


function ppc3d_handle_file_upload($file_key)
{
    // Verify nonce
    if (! check_ajax_referer('ppc3d_upload_stl_nonce', 'nonce', false)) {
        wp_send_json_error('Nonce verification failed.');
        wp_die();
    }

    // Sanitize the file key
    $file_key = sanitize_key($file_key);

    // Verify file upload exists
    if (!isset($_FILES[$file_key])) {
        wp_send_json_error('No file uploaded.');
        wp_die();
    }

    // Use wp_handle_upload for sanitizing and handling the file upload
    $upload_overrides = ['test_form' => false]; // Disable test for POST form field
    $upload_dir = wp_upload_dir();
    $upload_path = trailingslashit($upload_dir['path']); // Directory path for uploads

    // Get original file name and sanitize it
    $file_name = sanitize_file_name($_FILES[$file_key]['name']);
    $file_path = $upload_path . $file_name;

    // Check if the file already exists and delete it
    if (file_exists($file_path)) {
        unlink($file_path); // Deletes the existing file
    }

    // Upload the new file
    $uploaded_file = wp_handle_upload($_FILES[$file_key], $upload_overrides);

    // Check if the file was uploaded successfully
    if (isset($uploaded_file['error'])) {
        wp_send_json_error('File upload error: ' . $uploaded_file['error']);
        wp_die();
    }

    // Verify the file extension is STL
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    if ($file_extension !== 'stl') {
        // Delete the file if it's not an STL
        wp_delete_file($uploaded_file['file']);
        wp_send_json_error('Invalid file type. Please upload an STL file.');
        wp_die();
    }

    // Return the file details
    return [
        'file_name' => $file_name,
        'root_url' => trailingslashit($upload_dir['url']),
        'site_upload_path' => esc_url_raw($uploaded_file['url']),
        'upload_path' => $uploaded_file['file'],
    ];
}

// Function to handle STL file upload and API request
function ppc3d_upload_stl_file()
{
    // Verify nonce
    if (! check_ajax_referer('ppc3d_upload_stl_nonce', 'nonce', false)) {
        wp_send_json_error('Nonce verification failed.');
        wp_die();
    }

    $file_data = ppc3d_handle_file_upload('stl_file');

    $api_key = sanitize_text_field(get_option('ppc3d_stl_parser_api_key'));
    $api_url = sanitize_text_field(get_option('ppc3d_stl_parser_api_url'));

    // Check if necessary $_POST variables are set
    $printing_technology = isset($_POST['printing_technology']) ? intval($_POST['printing_technology']) : 0;
    $material = isset($_POST['material']) ? intval($_POST['material']) : 0;
    $quality = isset($_POST['quality']) ? intval($_POST['quality']) : 0;
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;
    $infill = isset($_POST['infill']) ? intval($_POST['infill']) : 0;
    $color = isset($_POST['color']) ? intval($_POST['color']) : 0;
    $unit = isset($_POST['unit']) ? sanitize_text_field(wp_unslash($_POST['unit'])) : '';
    $scale = isset($_POST['scale']) ? intval($_POST['scale']) : 0;

    // Prepare POST data
    $body = [
        'scale' => $scale,
        'unit' => $unit,
        'stl_file' => $file_data['site_upload_path'],
        'cost_per_cc' => floatval(get_option('stl_parser_cost_per_cc')),
        'printing_technology' => $printing_technology,
        'material' => $material,
        'quality' => $quality,
        'quantity' => $quantity,
        'infill' => $infill,
        'color' => $color,
        'api_key' => $api_key,
    ];

    // Make the API request
    $response = wp_remote_post($api_url, ['body' => $body]);

    // Check for errors
    if (is_wp_error($response)) {
        wp_send_json_error('API request failed: ' . $response->get_error_message());
        wp_die();
    }

    // Parse the JSON response
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    // Generate a unique transient key using wp_generate_uuid4
    $transient_key = sanitize_key('ppc3d_data_' . wp_generate_uuid4());
    set_transient('ppc3d_transient_key', $transient_key, DAY_IN_SECONDS);

    $printing_technology = isset($_POST['printing_technology']) ? sanitize_text_field(wp_unslash($_POST['printing_technology'])) : ''; // Sanitize as string
    $material = isset($_POST['material']) ? sanitize_text_field(wp_unslash($_POST['material'])) : ''; // Sanitize as string
    $quality = isset($_POST['quality']) ? sanitize_text_field(wp_unslash($_POST['quality'])) : '';   // Sanitize as string
    $infill = isset($_POST['infill']) ? sanitize_text_field(wp_unslash($_POST['infill'])) : '';      // Sanitize as string
    $color = isset($_POST['color']) ? sanitize_text_field(wp_unslash($_POST['color'])) : '';        // Sanitize as string

    $data['data']['rootUrl'] =  $file_data['root_url'];
    $data['data']['url'] = $file_data['site_upload_path'];
    $data['data']['fileName'] = $file_data['file_name'];
    $data['data']['formated_data']['fileName'] = $file_data['file_name'];
    // Add the form data to the response (NAME)
    $data['data']['selectedFormData'] = [
        'printing_technology' => $printing_technology,
        'material' => $material,
        'quality' => $quality,
        'infill' => $infill,
        'color' => $color,
        'quantity' => $quantity,
    ];
    $data['data']['formated_data']['transientKey'] = $transient_key;

    // Save formatted data in transient
    set_transient($transient_key, $data['data'], DAY_IN_SECONDS);

    // Return the transient key along with the data
    wp_send_json_success($data['data']);

    wp_die();
}

// Add shortcode for the file upload form
function ppc3d_stl_parser_upload_form_shortcode()
{
    ob_start();
    include(plugin_dir_path(__FILE__) . 'templates/upload-form.php');
    return ob_get_clean();
}

add_shortcode('ppc3d_stl_upload_form', 'ppc3d_stl_parser_upload_form_shortcode');

function ppc3d_dynamic_email_config($phpmailer)
{
    // Check if WP Mail SMTP plugin is active and get its SMTP settings
    if (class_exists('WP_Mail_Smtp\Pro\SMTP') && method_exists('WP_Mail_Smtp\Pro\SMTP', 'get_smtp_options')) {
        $smtp_options = \WP_Mail_Smtp\Pro\SMTP::get_smtp_options();

        // Use SMTP for sending emails
        $phpmailer->isSMTP();
        $phpmailer->Host = $smtp_options['smtp_host'];
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = $smtp_options['smtp_port'];
        $phpmailer->SMTPSecure = $smtp_options['smtp_encryption'];
        $phpmailer->Username = $smtp_options['smtp_user'];
        $phpmailer->Password = $smtp_options['smtp_pass'];
        $phpmailer->setFrom($smtp_options['from_email'], $smtp_options['from_name']);
    } else {
        // Fallback to WordPress default email setup
        $phpmailer->isMail(); // Use PHP's mail() function
        $phpmailer->setFrom(
            get_option('admin_email'), // Use WordPress admin email
            get_bloginfo('name') // Use the site name as the "From" name
        );
    }
}
add_action('phpmailer_init', 'ppc3d_dynamic_email_config');

add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/form_submission', array(
        'methods' => 'POST',
        'callback' => 'ppc3d_handle_custom_form_submission',
        'permission_callback' => '__return_true',
    ));
});

function ppc3d_handle_custom_form_submission(WP_REST_Request $request)
{
    try {
        // Extract and sanitize parameters
        $fullName = sanitize_text_field($request->get_param('fullName'));
        $customerEmail = sanitize_email($request->get_param('email'));
        $shippingAddress = sanitize_text_field($request->get_param('shippingAddress'));
        $transient_key = sanitize_text_field($request->get_param('transient_key_field'));
        $admin_email = get_option('admin_email'); // WordPress admin email

        // Retrieve formatted data from the transient using the transient key
        $formatted_data = get_transient($transient_key);

        // Generate dynamic order number using timestamp and a random number
        $orderNumber = 'ORD-' . time() . '-' . rand(1000, 9999);

        // Customer email subject
        $subject_customer = "Order Confirmation - Order Code: $orderNumber";
        // Admin email subject
        $subject_admin = "New Order Received - $fullName - Order $orderNumber";

        // Start constructing the message in HTML
        $message = "
<html>
    <head>
        <title>Order Confirmation - $orderNumber</title>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                line-height: 1.6;
                color: #333;
                margin: 0;
                padding: 0;
                background-color: #f4f7fa;
                box-sizing: border-box;
            }
            .container {
                max-width: 800px;
                margin: 30px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }
            h1 {
                color: #007BFF;
                font-size: 28px;
                text-align: center;
                margin-bottom: 20px;
            }
            h3 {
                color: #007BFF;
                font-size: 22px;
                margin-top: 30px;
                margin-bottom: 10px;
            }
            p, li {
                font-size: 16px;
                line-height: 1.5;
                margin-bottom: 12px;
            }
            strong {
                color: #333;
            }
            ul {
                padding-left: 20px;
            }
            .order-info, .options-info {
                padding: 20px;
                background-color: #f9f9f9;
                border-left: 4px solid #007BFF;
                border-radius: 5px;
                margin-bottom: 20px;
            }
            .order-info li, .options-info li {
                display: flex;
                justify-content: space-between;
            }
            .order-info li span, .options-info li span {
                color: #555;
            }
            .order-info li strong, .options-info li strong {
                color: #333;
            }
            .footer {
                text-align: center;
                font-size: 14px;
                color: #777;
                margin-top: 30px;
            }
            .footer a {
                color: #007BFF;
                text-decoration: none;
            }
            .footer a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>Order Confirmation</h1>
            <p><strong>Order Code:</strong> $orderNumber</p>
            <p><strong>Name:</strong> $fullName</p>
            <p><strong>Email:</strong> $customerEmail</p>
            <p><strong>Shipping Address:</strong> $shippingAddress</p>

            <div class='order-info'>
                <h3>Order Details:</h3>
                <ul>
                    <li><strong>Price:</strong><span>" . (isset($formatted_data['formated_data']['price']) ? $formatted_data['formated_data']['price'] : 'N/A') . "</span></li>
                    <li><strong>Material Volume:</strong><span>" . (isset($formatted_data['formated_data']['material_volume']) ? $formatted_data['formated_data']['material_volume'] : 'N/A') . "</span></li>
                    <li><strong>Support Material Volume:</strong><span>" . (isset($formatted_data['formated_data']['support_material']) ? $formatted_data['formated_data']['support_material'] : 'N/A') . "</span></li>
                    <li><strong>Box Volume:</strong><span>" . (isset($formatted_data['formated_data']['box_volume']) ? $formatted_data['formated_data']['box_volume'] : 'N/A') . "</span></li>
                    <li><strong>Surface Area:</strong><span>" . (isset($formatted_data['formated_data']['total_surface_area']) ? $formatted_data['formated_data']['total_surface_area'] : 'N/A') . "</span></li>
                    <li><strong>Model Weight:</strong><span>" . (isset($formatted_data['formated_data']['total_grams']) ? $formatted_data['formated_data']['total_grams'] : 'N/A') . " Grams</span></li>
                    <li><strong>Model Dimensions (LxWxH):</strong><span>" . (isset($formatted_data['formated_data']['model_dimensions']) ? $formatted_data['formated_data']['model_dimensions'] : 'N/A') . "</span></li>
                    <li><strong>Number of Polygons:</strong><span>" . (isset($formatted_data['formated_data']['number_of_polygons']) ? $formatted_data['formated_data']['number_of_polygons'] : 'N/A') . "</span></li>
                </ul>
            </div>

            <div class='options-info'>
                <h3>Selected Options:</h3>
                <ul>
                    <li><strong>Printing Technology:</strong><span>" . (isset($formatted_data['selectedFormData']['printing_technology']) ? $formatted_data['selectedFormData']['printing_technology'] : 'N/A') . "</span></li>
                    <li><strong>Material:</strong><span>" . (isset($formatted_data['selectedFormData']['material']) ? $formatted_data['selectedFormData']['material'] : 'N/A') . "</span></li>
                    <li><strong>Quality:</strong><span>" . (isset($formatted_data['selectedFormData']['quality']) ? $formatted_data['selectedFormData']['quality'] : 'N/A') . "</span></li>
                    <li><strong>Infill:</strong><span>" . (isset($formatted_data['selectedFormData']['infill']) ? $formatted_data['selectedFormData']['infill'] : 'N/A') . "</span></li>
                    <li><strong>Color:</strong><span>" . (isset($formatted_data['selectedFormData']['color']) ? $formatted_data['selectedFormData']['color'] : 'N/A') . "</span></li>
                    <li><strong>Quantity:</strong><span>" . (isset($formatted_data['selectedFormData']['quantity']) ? $formatted_data['selectedFormData']['quantity'] : 'N/A') . "</span></li>
                </ul>
            </div>

            <div class='footer'>
                <p>Thank you for your order! If you have any questions, feel free to <a href='mailto:support@example.com'>contact us</a>.</p>
            </div>
        </div>
    </body>
</html>
";

        // Send email to the customer (HTML content enabled)
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $email_sent_customer = wp_mail($customerEmail, $subject_customer, $message, $headers);

        // Send email to the admin (HTML content enabled)
        $email_sent_admin = wp_mail($admin_email, $subject_admin, $message, $headers);

        // Handle email sending status and response
        if ($email_sent_customer && $email_sent_admin) {
            return new WP_REST_Response(array(
                'success' => true,
                'data' => array(
                    'message' => 'Order successfully placed!',
                    'orderNumber' => $orderNumber,
                    'adminEmail' => $admin_email,
                )
            ), 200);
        } else {
            return new WP_REST_Response(array(
                'success' => false,
                'data' => array('message' => 'Failed to send email. Please try again later.')
            ), 500);
        }
    } catch (Exception $e) {
        return new WP_REST_Response(array(
            'success' => false,
            'data' => array(
                'message' => 'An unexpected error occurred.',
                'error' => $e->getMessage()
            )
        ), 500);
    }
}
