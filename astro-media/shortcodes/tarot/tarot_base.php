<?php
// tarot-base.php

require_once('components/tarot-header.php');
require_once('components/tarot-body.php');
require_once('components/tarot-footer.php');
require_once(dirname(__FILE__) . '/../../midone.php');
require_once(dirname(__FILE__) . '/../../tarotapi.php');

function tarot_base($product_id, $type, $name) {

    ob_start();

    global $wpdb;  

    $table_name = $wpdb->prefix . 'astromedia';

    $token = $wpdb->get_results("SELECT token FROM $table_name WHERE id='1'");
    $token = $token[0]->token;

    $email = $wpdb->get_results("SELECT email FROM $table_name WHERE id='1'");
    $email = $email[0]->email;

    $result = get_readings();
    if ($result['error']) {
        // Handle the error
        echo "Error: " . $result['message'];
    } else {
        $result = $result['data'];
        // Process the data
    }
    
    $desiredId = null;
    foreach ($result as $group) {
        foreach ($group['readings'] as $reading) {
            if ($reading['name'] === $name) {
                $desiredId = $reading['id'];
                break 2; // Breaks out of both loops once the ID is found
            }
        }
    }
    
    $result = get_reading($desiredId);
    if ($result['error']) {
        // Handle the error
        echo "Error: " . $result['message'];
    } else {
        $data = $result['data'];
        // Process the data
    }
    
    $readingData = $data;
    $drawingShape = $readingData['drawingShape'];
    $cardBackground = $readingData['cardSet']['image'];
    $numCardsToDraw = count($readingData['drawings']);
    $numberOfCards = $readingData['cardSet']['numberOfCards'];
    $drawings = $readingData['drawings'];  
    $purchase =  $readingData['purchase'];
    $dateDescription =  $readingData['dateDescription'];
    $zodiacSigns =  $readingData['zodiacSigns'];

    if($purchase == null){

        $free = 1;
    }else{
        $free = 0;
    }

    $descriptions = $readingData['descriptions'];

    $detailDescriptions = $descriptions;
    
    /*
    $detailDescriptions = array_filter($descriptions, function($description) {
        return $description['type'] == 'detail';
    });

    $detailgame = array_filter($descriptions, function($description) {
        return $description['type'] == 'game';
    });

    // Convert the filtered results back to a zero-indexed array
    $detailDescriptions = array_values($detailDescriptions);
    $detailgame = array_values($detailgame);
    */

    // set day to inactive
    $day_active = 0;

    // check if zodiac signs are required for this reading
    if($zodiacSigns != NULL){

        $zodiac_active = 1;
    }else{
            
        $zodiac_active = 0;
    }

    // check if date is required for this reading
    if($dateDescription != NULL){

        $dateDescription_active = 1;

        // check if date is active
        if($dateDescription['dateFormat'] == 'dd-MM-yyyy'){

            $day_active = 1;
        }

    }else{
            
        $dateDescription_active = 0;
    }

    $detailgame = '';
    
    $reading_id = $readingData['id'];

    // get product details
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
 
    // Call the functions to output the tarot components
    echo tarot_header($product_id, $type, $cardBackground);

    echo tarot_body($token, $type, $product_id, $product_details, $drawings, $drawingShape, $detailDescriptions, $numCardsToDraw, $reading_id, $name, $numberOfCards, $dateDescription, $zodiacSigns); 

    echo tarot_footer($type, $email, $token, $product_id, $free, $reading_id, $dateDescription_active, $zodiac_active, $day_active);
    
    $output = ob_get_clean(); // Get the contents of the buffer and end buffering

    return $output;
}
