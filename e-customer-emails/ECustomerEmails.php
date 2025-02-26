<?php
/**
 * Plugin Name:       E-Customer Emails
 * Plugin URI:        https://wordpress.org/plugins/e-customer-emails/
 * Description:       Send an email easily to a client via the orders menu of WooCommerce
 * Version:           1.1.1
 * Requires at least: 5.9
 * Requires PHP:      7.4
 * Author:            Dennis Weijer
 * Author URI:        https://profiles.wordpress.org/dweijer/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       e-customer-emails
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Function to check if WooCommerce is active
 * 
 * @since   1.0.0
 * @author  Dennis Weijer
 */
register_activation_hook( __FILE__, 'ECE_activation' );
if ( ! function_exists( 'ECE_activation' ) ) {
    function ECE_activation() {
        if ( ! current_user_can( 'activate_plugins' ) ) {
            wp_die( esc_html__( 'You don\'t have permissions to activate this plugin!', 'e-customer-emails' ) );
        } else {
            if (
                ! in_array( 
                    'woocommerce/woocommerce.php',
                    apply_filters( 'active_plugins', get_option( 'active_plugins' ) )
                 )
             ) {
                deactivate_plugins( 'WooCustomerEmails/WooCustomerEmails.php' );
                wp_die( '<strong>Woo Customer Emails: </strong> ' . esc_html__( 'You need to install the plugin ', 'e-customer-emails' ) . '<em>WooCommerce</em> ' . esc_html__( 'before you can use this plugin.', 'e-customer-emails' ) );
             }
        }
    }
}

/**
 * Function to disable this plugin once WooCommerce is being disabled
 * 
 * @since   1.0.0
 * @author  Dennis Weijer
 */
add_action( 'deactivated_plugin', 'ECE_deactive_woo_not_active', 10, 2 );
if ( ! function_exists( 'ECE_deactive_woo_not_active' ) ) {
    function ECE_deactive_woo_not_active( $plugin, $network_activation ) {
        if ( $plugin == "woocommerce/woocommerce.php" ) {
            deactivate_plugins( [plugin_basename( __FILE__ ), "woocommerce/woocommerce.php"], true );
            error_log( 'This plugin has been deactivated because you have deactivated WooCommerce' );
            $args = var_export( func_get_args(), true );
            error_log( $args );
            wp_die( '<strong>Woo Customer Emails: </strong> ' . esc_html__( 'This plugin is deactivated, because you deactivated ', 'e-customer-emails' ) . '<em>WooCommerce</em>' );
        }
    }
}

/**
 * Function to create an Email metabox into the order section of WooCommerce
 * 
 * @since   1.0.0
 * @author  Dennis Weijer
 */
add_action( 'add_meta_boxes', 'ECE_add_meta_boxes' );
if ( ! function_exists( 'ECE_add_meta_boxes' ) ) {
    function ECE_add_meta_boxes() {
        add_meta_box(
            'ECE_email_field',
            esc_html__( 'Email Client', 'e-customer-emails' ),
            'ECE_add_email_field',
            'shop_order',
            'normal',
            'high'
        );
    }
}

/**
 * Function to create an Variables metabox into the E-Customer Singatures post type
 * 
 * @since   1.1.0
 * @author  Dennis Weijer
 */
add_action( 'add_meta_boxes', 'ECE_add_meta_boxes_variables' );
if ( ! function_exists( 'ECE_add_meta_boxes_variables' ) ) {
    function ECE_add_meta_boxes_variables() {
        add_meta_box(
            'ECE_variables_field',
            esc_html__( 'Variables', 'e-customer-emails' ),
            'ECE_add_variables_field',
            'ece_signatures',
            'normal',
            'default'
        );
    }
}

/**
 * Function to create the content of the Email metabox
 * 
 * @since   1.0.0
 * @author  Dennis Weijer
 */
if ( ! function_exists( 'ECE_add_email_field' ) ) {
    function ECE_add_email_field() {
        global $post;

        $PostID = $post->ID;

        $nonce = wp_create_nonce( 'ECE_email_form_nonce' );
        $link = sanitize_url( admin_url('admin-ajax.php?action=ece_send_email&post_id='.$PostID.'&nonce='.$nonce) );

        $order = wc_get_order( $post->ID );
        $customer_id = sanitize_key( $order->get_customer_id() );
        
        $user = $order->get_user();
        $billing_email  = sanitize_email( $order->get_billing_email() );

        ob_start();
        include( plugin_dir_path( __FILE__ ) . 'templates/ece-email-form.php' );
        echo ob_get_clean();
    }
}

/**
 * Function to create the content of the Variables metabox
 * 
 * @since   1.1.0
 * @author  Dennis Weijer
 */
if ( ! function_exists( 'ECE_add_variables_field' ) ) {
    function ECE_add_variables_field() {
        ob_start();
        include( plugin_dir_path( __FILE__ ) . 'templates/ece-variables.php' );
        echo ob_get_clean();
    }
}

/**
 * Function to handle the AJAX Request when 'Send Email' button is clicked
 * 
 * @since   1.0.0
 * @author  Dennis Weijer
 */
add_action( "wp_ajax_ece_send_email", "ece_send_email" );
function ece_send_email() {

    // Nonce check for an extra layer of security, the function will exit if it fails
    if ( ! wp_verify_nonce( sanitize_key( $_REQUEST[ 'nonce' ] ), "ECE_email_form_nonce" ) ) {
        exit( "Woof Woof Woof" );
    }

    // Setting standard result, if no other result is given by this function
    $result['type'] = "error";
    $result['msg'] = esc_html__( "No output given. Please contact a developer.", "e-customer-emails" );

    // Getting all the values, sanitize them, replace strings (if neccesary), and generate errors if there are any
    $errors = [];

    $post_id = sanitize_key( $_REQUEST[ 'post_id' ] );
    if ( empty( $post_id ) ) {
        $errors[] = "No valid post id passed!";
    }

    $order = wc_get_order( $post_id );
    $customer_id = sanitize_key( $order->get_customer_id() );
    
    $billing_email  = sanitize_email( $order->get_billing_email() );
    $first_name = wp_kses_post( $order->get_billing_first_name() );
    $last_name = wp_kses_post( $order->get_billing_last_name() );

    $cc = sanitize_email( $_REQUEST['cc'] );
    $bcc = sanitize_email( $_REQUEST['bcc'] );

    if ( ! empty( $cc ) && is_email( $cc ) == false  ) {
        $errors[] = esc_html__( "CC email adress is not valid!", "e-customer-emails" );
    } 

    if( ! empty( $bcc ) && is_email( $bcc ) == false ) {
        $errors[] = esc_html__( "BCC email adress is not valid!", "e-cutsomer-emails" );
    }

    $gottenSubject = wp_kses_post( $_REQUEST['subject'] );

    $gottenMessage = wp_kses_post( $_REQUEST['message'] );
    $gottenMessage = str_replace( '&nbsp;', '<br />', $gottenMessage );
    $gottenMessage = str_replace( '[first_name]', $first_name, $gottenMessage );
    $gottenMessage = str_replace( '[last_name]', $first_name, $gottenMessage );
    $gottenMessage = str_replace( '[full_name]', $first_name . ' ' . $last_name, $gottenMessage );

    $SubjectLength = strlen( $gottenSubject );
    $gottenMessageLength = strlen( $gottenMessage );

    if ( empty( $gottenSubject) || $gottenSubject == '' ) {
        $errors[] = esc_html__( "Please enter an Email Subject!", "e-customer-emails" );
    } else {
        if ( $SubjectLength < 10 || $SubjectLength > 75 ) {
            $errors[] = esc_html__( "The length of the subject needs to be between 10 and 75 characters!", "e-customer-emails" );
        }
    }

    if ( empty( $gottenMessage ) || $gottenMessage == '' ) {
        $errors[] = esc_html__( "Please enter an Email message!", "e-customer-emails" );
    } else {
        if ( $gottenMessageLength < 17 ) {
            $errors[] = esc_html__( "The length of the message needs to be be 10 characters or more!", "e-customer-emails" );
        }
    }

    // If there are no errors
    if ( empty( $errors ) ) {
        // Generate the email
        $current_user = wp_get_current_user();

        $to = esc_html( $billing_email );
        $subject = $gottenSubject;
        $message = $gottenMessage;
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '. esc_html( $current_user->display_name ) .' <'. sanitize_email( $current_user->user_email ) .'>' . "\r\n";
        $headers .= 'To: '. $first_name . ' ' . $last_name .' <'. $billing_email .'>' . "\r\n";
        
        if ( ! empty( $cc ) ) {
            $headers .= 'Cc: ' . $cc . "\r\n";
        }

        if ( ! empty( $bcc ) ) {
            $headers .= 'Bcc: ' . $bcc . "\r\n";
        }

        // Send the email and check if it was sent successfully
        if ( wp_mail( $to, $subject, $message, $headers ) ) {
            $result['type'] = "success";
            $result['msg'] = esc_html__( "Email successfully sent!", "e-customer-emails" );
        } else {
            $result['type'] = "error";
            $result['msg'] = [  esc_html__( "Email could not be sent!", "e-customer-emails" ) ];
        }
    } 
    // If there are errors
    else {
        $result['msg'] = $errors;
    }

    // Check if action was fired via Ajax call. If yes, JS code will be triggered. Else the user is redirected to the post page
    if( ! empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest' ) {
        $result = json_encode( $result );
        echo wp_kses_post( $result );
    } else {
        header( "Location: " . sanitize_url( $_SERVER['HTTP_REFERER'] ) );
    }

    // Don't forget to end your scripts with a die() function - very important
    wp_die();
}

/**
 * Function to handle the AJAX Request when 'Insert Signature' button is clicked
 * 
 * @since   1.1.0
 * @author  Dennis Weijer
 */
add_action( "wp_ajax_ece_insert_signature", "ece_insert_signature" );
function ece_insert_signature() {

    // Setting standard result, if no other result is given by this function
    $result['type'] = "error";
    $result['msg'] = esc_html__( "Something went wrong!", "e-customer-emails" );

    // Getting all the values, sanitize them, replace strings (if neccesary), and generate errors if there are any
    $errors = [];

    $signature_id = sanitize_key( $_REQUEST[ 'signature_id' ] );

    if ( empty( $signature_id ) ) {
        $errors[] = "Please select an valid signature!";
    }

    // If there are no errors
    if ( empty( $errors ) ) {
        
        $signature_post = get_post( $signature_id );
        $signature_content = wp_kses_post( $signature_post->post_content );
        $signature_content = apply_filters( 'the_content', $signature_content );
        $signature_content = str_replace( '"', "'", $signature_content );
        $signature_content = str_replace( "&nbsp;", "<br />", $signature_content );

        $result['type'] = "success";
        $result['msg'] = esc_html__( "Signature inserted successfully!", "e-customer-emails" );
        $result['signature'] = $signature_content;

    } 
    // If there are errors
    else {
        $result['msg'] = $errors;
    }

    // Check if action was fired via Ajax call. If yes, JS code will be triggered. Else the user is redirected to the post page
    if( ! empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest' ) {
        $result = json_encode( $result );
        echo wp_kses_post( $result );
    } else {
        header( "Location: " . $_SERVER['HTTP_REFERER'] );
    }

    // Don't forget to end your scripts with a die() function - very important
    wp_die();
}

/**
 * Function to add the signatures post type
 * 
 * @since   1.1.0
 * @author  Dennis weijer
 */
// Register Custom Post Type
add_action( 'init', 'ECE_create_signatures_post_type', 0 );
if ( ! function_exists( 'ECE_create_signatures_post_type' ) ) {
    function ECE_create_signatures_post_type() {

        $labels = array(
            'name'                  => _x( 'E-Customer Signatures', 'Post Type General Name', 'e-customer-emails' ),
            'singular_name'         => _x( 'E-Customer Signature', 'Post Type Singular Name', 'e-customer-emails' ),
            'menu_name'             => __( 'E-Customer Signatures', 'e-customer-emails' ),
            'name_admin_bar'        => __( 'Signatures', 'e-customer-emails' ),
            'archives'              => __( 'E-Customer Signature Archives', 'e-customer-emails' ),
            'attributes'            => __( 'E-Customer Signature Attributes', 'e-customer-emails' ),
            'parent_item_colon'     => __( 'Parent E-Customer Signature:', 'e-customer-emails' ),
            'all_items'             => __( 'All E-Customer Signatures', 'e-customer-emails' ),
            'add_new_item'          => __( 'Add New E-Customer Signature', 'e-customer-emails' ),
            'add_new'               => __( 'Add New', 'e-customer-emails' ),
            'new_item'              => __( 'New E-Customer Signature', 'e-customer-emails' ),
            'edit_item'             => __( 'Edit E-Customer Signature', 'e-customer-emails' ),
            'update_item'           => __( 'Update E-Customer Signature', 'e-customer-emails' ),
            'view_item'             => __( 'View E-Customer Signature', 'e-customer-emails' ),
            'view_items'            => __( 'View E-Customer Signature', 'e-customer-emails' ),
            'search_items'          => __( 'Search E-Customer Signature', 'e-customer-emails' ),
            'not_found'             => __( 'Not found', 'e-customer-emails' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'e-customer-emails' ),
            'featured_image'        => __( 'Featured Image', 'e-customer-emails' ),
            'set_featured_image'    => __( 'Set featured image', 'e-customer-emails' ),
            'remove_featured_image' => __( 'Remove featured image', 'e-customer-emails' ),
            'use_featured_image'    => __( 'Use as featured image', 'e-customer-emails' ),
            'insert_into_item'      => __( 'Insert into E-Customer Signature', 'e-customer-emails' ),
            'uploaded_to_this_item' => __( 'Uploaded to this E-Customer Signature', 'e-customer-emails' ),
            'items_list'            => __( 'E-Customer Signatures list', 'e-customer-emails' ),
            'items_list_navigation' => __( 'E-Customer Signatures list navigation', 'e-customer-emails' ),
            'filter_items_list'     => __( 'Filter E-Customer Signatures list', 'e-customer-emails' ),
        );
        $args = array(
            'label'                 => __( 'E-Customer Signature', 'e-customer-emails' ),
            'description'           => __( 'Email signatures for the E-customer Emails plugin', 'e-customer-emails' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor' ),
            'hierarchical'          => false,
            'public'                => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 54,
            'menu_icon'             => 'dashicons-email-alt2',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => false,
            'can_export'            => false,
            'has_archive'           => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
        );
        register_post_type( 'ece_signatures', $args );

    }
}

/**
 * Function to enqueue all the scripts
 * 
 * @since   1.0.0
 * @author  Dennis Weijer
 */
add_action( 'init', 'ECE_script_enqueue' );
function ECE_script_enqueue() {

    // Register JS files with a unique handle, file location, and an array of dependencies
    wp_register_script( "send_email_script", plugin_dir_url( __FILE__ ) . 'js/ece-send-email.js', array('jquery') );
    wp_register_script( "insert_signature_script", plugin_dir_url( __FILE__ ) . 'js/ece-insert-signature.js', array('jquery') );
    
    // Localize scripts to the domain name, so that we can reference the url to admin-ajax.php file easily
    wp_localize_script( "send_email_script", 'ECE_Ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    wp_localize_script( "insert_signature_script", 'ECE_Ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

    // Enqueue jQuery library and all the scripts above
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'send_email_script' );
    wp_enqueue_script( 'insert_signature_script' );
}