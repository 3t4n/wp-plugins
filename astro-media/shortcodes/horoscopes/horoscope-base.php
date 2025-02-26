<?php
// horoscope-base.php

require_once('components/horoscope-header.php');
require_once('components/horoscope-bodyv1.php');
require_once('components/horoscope-bodyv2.php');
require_once('components/horoscope-footer-free.php');
require_once('components/horoscope-footer-paid.php');
require_once(dirname(__FILE__) . '/../../midone.php');


function horoscope_base($product_id, $type, $free) {
    
    ob_start(); // Start output buffering

    global $wpdb;  

    $table_name = $wpdb->prefix . 'astromedia';

    $token = $wpdb->get_results("SELECT token FROM $table_name WHERE id='1'");
    $token = $token[0]->token;

    $email = $wpdb->get_results("SELECT email FROM $table_name WHERE id='1'");
    $email = $email[0]->email;

    global $wpdb;
    $table_name = $wpdb->prefix . 'customimages'; // Replace 'your_table_name' with the actual table name
    $product_id_to_fetch = $product_id; // Fetch images for product_id 6

    // Prepare and execute the query with a WHERE clause to filter by product_id
    $zodiac_images = $wpdb->get_results(
        $wpdb->prepare("SELECT * FROM $table_name WHERE token = %s AND product_id = %s", $token, $product_id_to_fetch)
    );  

    // get products

    $post_fields = array(
        'product_id' => $product_id,
    );
    
    $host = 'https://astromedia-business.nl/api/endpoint/v1/getproductdetails';
    
    $response = wp_remote_post($host, array(
        'headers' => array('Content-Type' => 'application/x-www-form-urlencoded'),
        'body' => $post_fields,
        'timeout' => 30,
        'sslverify' => false,
    ));
    
    if (is_wp_error($response)) {
        $error_message = $response->get_error_message();
    } else {
        $result = wp_remote_retrieve_body($response);
    }

    $product_details = json_decode($result, true);
    
    $active = 0;
    $version = 1;

    if ($zodiac_images) {
        foreach ($zodiac_images as $image) {
            // Access the columns using object notation
            $active = $image->active;
            $version = $image->vers;
        }
    }

    $current_user = wp_get_current_user();
    $user_id = $current_user->ID;
    
    // Call the functions to output the horoscope components
    echo horoscope_header($product_id, $type);

    if($version == 1 || $active == 1){

        echo horoscope_bodyv1($token, $type, $version, $active, $free, $zodiac_images, $product_id, $product_details); // Example array
    }elseif($version == 2){

        echo horoscope_bodyv2($token, $type, $version, $active, $free, $product_id, $product_details); // Example array
    }

    if($free == 'free'){

        echo horoscope_footer_free($type, $free, $email, $token, $product_id, $version);
    }else{

        echo horoscope_footer_paid($type, $free, $email, $token, $product_id, $version);
    }
    
    

    $output = ob_get_clean(); // Get the contents of the buffer and end buffering
    return $output;
}
