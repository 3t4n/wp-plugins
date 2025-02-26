<?php
/*
Plugin Name: Quick Chat GPT
Description: A plugin for adding API keys to use with Chat GPT
Version: 1.0.0
Author: logicdigger
*/

defined( 'ABSPATH' ) or die( 'No direct access!' );

include_once( plugin_dir_path( __FILE__ ) . 'inc/quickchatgpt.class.php' );

function quick_chat_gpt_scripts() {
    wp_enqueue_style( 'quick-chat-gpt-style', plugin_dir_url( __FILE__ ) . 'css/style.css' ,array(),'1.0.0');
    wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css', array());
	 wp_enqueue_script( 'tinymce', includes_url( 'js/tinymce/' ) . 'wp-tinymce.php', array( 'jquery' ), false, true );
    wp_enqueue_script( 'quick-chat-gpt-script', plugin_dir_url( __FILE__ ) . 'js/quickchatgpt.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'quick_chat_gpt_scripts' );

add_action( 'admin_head', 'quick_chat_gpt_template_part' );
function quick_chat_gpt_template_part() {
    $options = get_option( 'quick_chat_gpt_options' );
    if(isset($options) && isset($options['api_key'])){
        if(isset($options) && isset($options['position'])){
            $position = $options['position'];
            if( $position == 'left' ) {
                include( plugin_dir_path( __FILE__ ) . 'template-parts/chat_gpt_style_1.php' );
            } else {
                include( plugin_dir_path( __FILE__ ) . 'template-parts/chat_gpt_style_1.php' );
            }
        }else{
            include( plugin_dir_path( __FILE__ ) . 'template-parts/chat_gpt_style_1.php' );
        }
    }
}

function quick_chat_gpt_response() {
    check_ajax_referer( 'gpt_form_nonce', 'gpt_form_nonce_field' );
    $options = get_option( 'quick_chat_gpt_options' );
    $prompt = sanitize_text_field( $_POST['gptinput'] ); // get the input value from the AJAX post request

    // set default values for model, temperature, and max_tokens
    $model = 'text-davinci-003';
    $temperature = 0;
    $max_tokens = 2500;

    // check if values are set in the settings and use them if they are
    if (isset($options['model_name']) && !empty($options['model_name'])) {
        $model = $options['model_name'];
    }
    if (isset($options['temperature']) && !empty($options['temperature'])) {
        $temperature = (int) $options['temperature'];
    }
    if (isset($options['max_length']) && !empty($options['max_length'])) {
        $max_tokens = (int) $options['max_length'];
    }

    // set the CURLOPT_POSTFIELDS data using the values from settings or defaults
    $post_fields = array(
        'model' => $model,
        'prompt' => $prompt,
        'temperature' => $temperature,
        'max_tokens' => $max_tokens
    );
    $post_fields = json_encode($post_fields);

$args = array(
    'body' => $post_fields,
    'headers' => array(
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer '.$options['api_key']
    )
);

$response = wp_remote_post( 'https://api.openai.com/v1/completions', $args );
$response = json_decode( wp_remote_retrieve_body( $response ), true );

    if(isset($response["choices"][0]["text"])){
         $text = $response["choices"][0]["text"];
         echo $text;
    }
//print_r($response );
    wp_die();
}
add_action( 'wp_ajax_quick_chat_gpt', 'quick_chat_gpt_response' );
add_action( 'wp_ajax_nopriv_quick_chat_gpt', 'quick_chat_gpt_response' );
