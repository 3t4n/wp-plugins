<?php 
/**
 * Custom Hologram initial settings
 * 
 * The initial setup for each page allows for global and default(defined by postname) Holopush for each page.
 * 
 */
function appear2mee_init() {
    $options = get_option( 'appear2mee_options' );
    
    $web_id = isset($options["appear2mee_field_id"]) ? $options["appear2mee_field_id"] : null;
    
    //If web id is not defined donot register the plugin
    if ($web_id == null){
        return;
    }
    
    $position = isset($options["appear2mee_field_position"]) ? $options["appear2mee_field_position"] : "bottom_left";
    
    wp_enqueue_script('appear2mee', plugin_dir_url(__FILE__) . 'appear2mee-latest.js', array('jquery'), null, true );
    
    $inline_js = 'var path = window.location.pathname;';
    $inline_js .= 'console.log("Path =" + path);';
    
    $inline_js .= 'function get_wp_pagename(){';
    $inline_js .= '    var topic = path.split("/");';
    $inline_js .= '    console.log("Page name =" + topic[topic.length -2]);';
    $inline_js .= '    return topic[topic.length -2];';
    $inline_js .= '}';
    
    $inline_js .= 'if (!path.includes("wp-admin")) {';
    $inline_js .= '    console.log("Enable Appeartomee");';
    $inline_js .= '    window.Appear2meeLayer = window.Appear2meeLayer || [];';
    $inline_js .= '    function appear2mee() { Appear2meeLayer.push(arguments);} ';
    $inline_js .= '    appear2mee("initWithID","'.$web_id.'");';
    $inline_js .= '    appear2mee("setPosition","'.$position.'");';
    $inline_js .= '    appear2mee("receiveTopics", get_wp_pagename(), true);';
    $inline_js .= '}';
    
    wp_add_inline_script('appear2mee', $inline_js);
}

/**
 * Register our appear2mee_settings_init to the admin_init action hook.
 */
add_action( 'init', 'appear2mee_init' );
