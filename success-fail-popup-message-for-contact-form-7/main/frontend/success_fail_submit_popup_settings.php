<?php

if (!defined('ABSPATH')){
    exit;
}


// Use for front submit form and get all items for popup
add_filter( 'wpcf7_ajax_json_echo', 'SFPMCF7_wpcf7_ajax_json_echo' , 10, 2 ); 
function SFPMCF7_wpcf7_ajax_json_echo( $items, $result ) { 

    $formid = sanitize_text_field($_REQUEST['_wpcf7']);
    $items["popup_id"] = get_post_meta( $formid, 'sfpmcf7_enabled_popup_val', true );
    $items["failure_popup_id"] = get_post_meta( $formid, 'sfpmcf7_enabled_failure_popup_val', true );

    // Check popup message if text is not available then it pass default text
    if( ! empty(get_post_meta( $formid, 'sfpmcf7_popup_message', true ))) {
        $items["sfpmcf7_popup_message"] = get_post_meta( $formid, 'sfpmcf7_popup_message', true );
    }else{
        $items["sfpmcf7_popup_message"] = "Form has been submitted successfully.";
    }

    // Check popup width if width is not available then it pass default width
    if( ! empty(get_post_meta( $formid, 'sfpmcf7_m_popup_width', true ))) {
        $items["sfpmcf7_m_popup_width"] = get_post_meta( $formid, 'sfpmcf7_m_popup_width', true );
    }else{
        $items["sfpmcf7_m_popup_width"] = "500px";
    }

    // Check popup border radius if border radius is not available then it pass default border radius
    if( ! empty(get_post_meta( $formid, 'sfpmcf7_m_popup_radius', true ))) {
        $items["sfpmcf7_m_popup_radius"] = get_post_meta( $formid, 'sfpmcf7_m_popup_radius', true );
    }else{
        $items["sfpmcf7_m_popup_radius"] = "10px";
    }

    // Check popup duration time if duration time is not available then it pass default duration time
    if( ! empty(get_post_meta( $formid, 'sfpmcf7_m_popup_duration', true ))) {
        $items["sfpmcf7_m_popup_duration"] = get_post_meta( $formid, 'sfpmcf7_m_popup_duration', true );
    }else{
        $items["sfpmcf7_m_popup_duration"] = "100000000000";
    }

    // Check popup background option if option is not available then it pass popup background option
    if( ! empty(get_post_meta( $formid, 'sfpmcf7_popup_background_option', true ))) {
        $items["sfpmcf7_popup_background_option"] = get_post_meta( $formid, 'sfpmcf7_popup_background_option', true );
    }else{
        $items["sfpmcf7_popup_background_option"] = "bg_color";
    }

    // Check popup background color if color is not available then it pass default color
    if( ! empty(get_post_meta( $formid, 'sfpmcf7_popup_background_color', true ))) {
        $items["sfpmcf7_popup_background_color"] = get_post_meta( $formid, 'sfpmcf7_popup_background_color', true );
    }else{
        $items["sfpmcf7_popup_background_color"] = "#fff";
    }

    // Check popup background image if image is not available then it pass blank value
    if( ! empty(get_post_meta( $formid, 'sfpmcf7_popup_image_color', true ))) {
        $items["sfpmcf7_popup_image_color"] = get_post_meta( $formid, 'sfpmcf7_popup_image_color', true );
    }else{
        $items["sfpmcf7_popup_image_color"] = SFPMCF7_PLUGIN_DIR . '/assets/img/popup_img2.png';
    }

    // Check popup background gradient color if gradient color is not available then it pass gradient color
    if( ! empty(get_post_meta( $formid, 'sfpmcf7_popup_gradient_color', true ))) {
        $items["sfpmcf7_popup_gradient_color"] = get_post_meta( $formid, 'sfpmcf7_popup_gradient_color', true );
    }else{
        $items["sfpmcf7_popup_gradient_color"] = "#fff";
    }

    // Check popup background gradient color 2 if gradient color 2  is not available then it pass gradient color
    if( ! empty(get_post_meta( $formid, 'sfpmcf7_popup_gradient_color1', true ))) {
        $items["sfpmcf7_popup_gradient_color1"] = get_post_meta( $formid, 'sfpmcf7_popup_gradient_color1', true );
    }else{
        $items["sfpmcf7_popup_gradient_color1"] = "#FF0000";
    }


    // Check popup text color if color is not available then it pass default color
    if( ! empty(get_post_meta( $formid, 'sfpmcf7_popup_text_color', true ))) {
        $items["sfpmcf7_popup_text_color"] = get_post_meta( $formid, 'sfpmcf7_popup_text_color', true );
    }else{
        $items["sfpmcf7_popup_text_color"] = "#000";
    }

    // Check popup button text if text is not available then it pass default text
    if( ! empty(get_post_meta( $formid, 'sfpmcf7_popup_button_text', true ))) {
        $items["sfpmcf7_popup_button_text"] = get_post_meta( $formid, 'sfpmcf7_popup_button_text', true );
    }else{
        $items["sfpmcf7_popup_button_text"] = "Ok";
    }

    // Check popup button background color if color is not available then it pass default color
    if( ! empty(get_post_meta( $formid, 'sfpmcf7_popup_button_background_color', true ))) {
        $items["sfpmcf7_popup_button_background_color"] = get_post_meta( $formid, 'sfpmcf7_popup_button_background_color', true );
    }else{
        $items["sfpmcf7_popup_button_background_color"] = "#3085d6";
    }

    // Check failure popup text color if color is not available then it pass default color
    // if( ! empty(get_post_meta( $formid, 'sfpmcf7_failure_popup_text_color', true ))) {
    //     $items["sfpmcf7_failure_popup_text_color"] = get_post_meta( $formid, 'sfpmcf7_failure_popup_text_color', true );
    // }else{
    //     $items["sfpmcf7_failure_popup_text_color"] = "#000";
    // }

    // Check failure popup width if width is not available then it pass default width
    // if( ! empty(get_post_meta( $formid, 'sfpmcf7_failure_popup_width', true ))) {
    //     $items["sfpmcf7_failure_popup_width"] = get_post_meta( $formid, 'sfpmcf7_failure_popup_width', true );
    // }else{
    //     $items["sfpmcf7_failure_popup_width"] = "500px";
    // }

    // Check failure popup border radius if border radius is not available then it pass default border radius
    // if( ! empty(get_post_meta( $formid, 'sfpmcf7_failure_popup_radius', true ))) {
    //     $items["sfpmcf7_failure_popup_radius"] = get_post_meta( $formid, 'sfpmcf7_failure_popup_radius', true );
    // }else{
    //     $items["sfpmcf7_failure_popup_radius"] = "10px";
    // }

    // Check failure popup duration time if duration time is not available then it pass default duration time
    // if( ! empty(get_post_meta( $formid, 'sfpmcf7_failure_popup_duration', true ))) {
    //     $items["sfpmcf7_failure_popup_duration"] = get_post_meta( $formid, 'sfpmcf7_failure_popup_duration', true );
    // }else{
    //     $items["sfpmcf7_failure_popup_duration"] = "100000000000";
    // }

    // Check failure popup button text if text is not available then it pass default text
    // if( ! empty(get_post_meta( $formid, 'sfpmcf7_failure_popup_button_text', true ))) {
    //     $items["sfpmcf7_failure_popup_button_text"] = get_post_meta( $formid, 'sfpmcf7_failure_popup_button_text', true );
    // }else{
    //     $items["sfpmcf7_failure_popup_button_text"] = "Ok";
    // }

    // Check failure failure popup button background color if color is not available then it pass default color
    // if( ! empty(get_post_meta( $formid, 'sfpmcf7_failure_popup_button_background_color', true ))) {
    //     $items["sfpmcf7_failure_popup_button_background_color"] = get_post_meta( $formid, 'sfpmcf7_failure_popup_button_background_color', true );
    // }else{
    //     $items["sfpmcf7_failure_popup_button_background_color"] = "#3085d6";
    // }

    // Check failure popup background option if option is not available then it pass popup background color
    // if( ! empty(get_post_meta( $formid, 'sfpmcf7_failure_popup_background_option', true ))){
    //     $items["sfpmcf7_failure_popup_background_option"] = get_post_meta( $formid, 'sfpmcf7_failure_popup_background_option', true );
    // }else{
    //     $items["sfpmcf7_failure_popup_background_option"] = "bg_color";
    // }

    // Check failure popup background color if color is not available then it pass default color
    if( ! empty(get_post_meta( $formid, 'sfpmcf7_failure_popup_background_color', true ))){
        $items["sfpmcf7_failure_popup_background_color"] = get_post_meta( $formid, 'sfpmcf7_failure_popup_background_color', true );
    }else{
        $items["sfpmcf7_failure_popup_background_color"] = "#fff";
    }

    // Check failure popup background image if image is not available then it pass blank value
    // if( ! empty(get_post_meta( $formid, 'sfpmcf7_failure_popup_image_color', true ))){
    //     $items["sfpmcf7_failure_popup_image_color"] = get_post_meta( $formid, 'sfpmcf7_failure_popup_image_color', true );
    // }else{
    //     $items["sfpmcf7_failure_popup_image_color"] = SFPMCF7_PLUGIN_DIR . '/assets/img/popup_img2.png';
    // }

    // Check failure popup background gradient color if gradient color is not available then it pass gradient color
    // if( ! empty(get_post_meta( $formid, 'sfpmcf7_failure_popup_gradient_color', true ))){
    //     $items["sfpmcf7_failure_popup_gradient_color"] = get_post_meta( $formid, 'sfpmcf7_failure_popup_gradient_color', true );
    // }else{
    //     $items["sfpmcf7_failure_popup_gradient_color"] = "#fff";
    // }

    // Check failure popup 2 background gradient color if gradient color 2 is not available then it pass gradient color
    // if( ! empty(get_post_meta( $formid, 'sfpmcf7_failure_popup_gradient_color1', true ))){
    //     $items["sfpmcf7_failure_popup_gradient_color1"] = get_post_meta( $formid, 'sfpmcf7_failure_popup_gradient_color1', true );
    // }else{
    //     $items["sfpmcf7_failure_popup_gradient_color1"] = "#FF0000";
    // }
    return $items; 
}