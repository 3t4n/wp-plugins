<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php

include('settings.php'); // Load the files to get the databse info

// ----------------------------------------------
// checking if the data existing on the db and 
// if not we will create it with initial settings
// ----------------------------------------------    

if( !get_option($wp_options_name) ) {

    // ----------------------------------------------
    // getting all the values and clear data
    // ----------------------------------------------    

    $phone_display_checkbox = 1;
    $phone_button_href = '';
    $phone_button_text = 'Call Us Now';
    $phone_background_color = '#008cd6';
    $phone_button_width = '50%';
    $phone_button_position = 1;

    $email_display_checkbox = 1;
    $email_button_href = '';
    $custom_contact_page_link = 0;
    $show_email_button_text = 0;
    $email_button_text = '';
    $email_background_color = '#dca100';
    $email_button_width = '25%';
    $email_button_position = 2;

    $whatsapp_display_checkbox = 1;
    $whatsapp_button_href = '';
    $whatsapp_button_text = '';
    $whatsapp_url_message = '';
    $whatsapp_background_color = '#09547c';
    $whatsapp_button_width = '25%';
    $whatsapp_button_position = 3;

    $chat_display_checkbox = 0;
    $chat_button_href = '';
    $chat_button_text = '';
    $chat_background_color = '#008cd6';
    $chat_button_width = '25%';
    $chat_button_position = 4;

    $skype_display_checkbox = 0;
    $skype_button_href = '';
    $skype_button_text = '';
    $skype_background_color = '#008cd6';
    $skype_button_width = '25%';
    $skype_button_position = 5;

    $mobile_width = 960;

    $exclude_option = '';
    $exclude_ids = '';

    // ----------------------------------------------
    // insert the data into an array
    // ----------------------------------------------  

    $plugin_data_array = array(
        'phone_display_checkbox' => $phone_display_checkbox,
        'phone_button_href' => $phone_button_href,
        'phone_button_text' => $phone_button_text,
        'phone_background_color' => $phone_background_color,
        'phone_button_width' => $phone_button_width,
        'phone_button_position' => $phone_button_position,

        'email_display_checkbox' => $email_display_checkbox,
        'email_button_href' => $email_button_href,
        'custom_contact_page_link' => $custom_contact_page_link,
        'email_button_text' => $email_button_text,
        'email_background_color' => $email_background_color,
        'email_button_width' => $email_button_width,
        'email_button_position' => $email_button_position,

        'whatsapp_display_checkbox' => $whatsapp_display_checkbox,
        'whatsapp_button_href' => $whatsapp_button_href,
        'whatsapp_button_text' => $whatsapp_button_text,
        'whatsapp_url_message' => $whatsapp_url_message,
        'whatsapp_background_color' => $whatsapp_background_color,
        'whatsapp_button_width' => $whatsapp_button_width,
        'whatsapp_button_position' => $whatsapp_button_position,

        'chat_display_checkbox' => $chat_display_checkbox,
        'chat_button_href' => $chat_button_href,
        'chat_button_text' => $chat_button_text,
        'chat_background_color' => $chat_background_color,
        'chat_button_width' => $chat_button_width,
        'chat_button_position' => $chat_button_position,

        'skype_display_checkbox' => $skype_display_checkbox,
        'skype_button_href' => $skype_button_href,
        'skype_button_text' => $skype_button_text,
        'skype_background_color' => $skype_background_color,
        'skype_button_width' => $skype_button_width,
        'skype_button_position' => $skype_button_position,

        'mobile_width' => $mobile_width,

        'exclude_option' => $exclude_option,
        'exclude_ids' => $exclude_ids,
    ); // $creating_data_array = array(

    // ----------------------------------------------
    // creating a value with all the array data
    // ----------------------------------------------  
    
    $array_key_name = "";
    $array_item_value = "";
    
    foreach($plugin_data_array as $key=>$item) {
        $array_key_name .= "####" . $key;
    	$array_item_value .= "####" . $item;
    } // foreach($medical_form_array as $key=>$item) {

    // ----------------------------------------------
    // inserting all the data to datbase
    // ----------------------------------------------  

    $plugin_data = $array_key_name . "***" . $array_item_value;
    $plugin_data = sanitize_text_field($plugin_data);

    // update optuon on the database into wp_options
    update_option($wp_options_name, $plugin_data);    

} // if( !get_option($wp_options_name) ) {