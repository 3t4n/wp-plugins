<?php
/*
Plugin Name: Oembed for My Mitsu Estimation Form
Plugin URI: https://my-mitsu.com/
Description: You can embed an estimation(calculation) form by inserting a url. An estimation form is provided by a webservice in Japan called My Mitsu.
Version: 1.1
Author: Fumito MIZUNO
Author URI: https://rescuework.nagoya/blog/
Text Domain: oembed-for-my-mitsu-estimation-form
Domain Path: /languages
License: GPL ver.2 or later
*/

function my_mitsu_oembed_load_plugin_textdomain() {
    load_plugin_textdomain( 'oembed-for-my-mitsu-estimation-form', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'my_mitsu_oembed_load_plugin_textdomain' );

wp_embed_register_handler( 'my-mitsu', '#https://my-mitsu\.jp/estimation/([a-zA-Z0-9/]+)#', 'mymitsu_oembed_handler' );

function mymitsu_oembed_handler( $matches, $attr, $url, $rawattr ) {
    global $content_width;
    if ( isset( $content_width ) && $content_width > 0 ) {
        $width = $content_width;
        $height = $content_width * 3/2;
    } else {
        $width = 640;
        $height = 960;
    }
    $width = apply_filters( 'mymitsu_oembed_width', $width );
    $height = apply_filters( 'mymitsu_oembed_height', $height );

    $format = '<iframe src="%s" width="%s" height="%s"></iframe>';
    return sprintf( $format,
        esc_url($url),
        intval($width),
        intval($height)
    );
}

function mymitsu_plugin_admin_page() {
    add_menu_page('Estimation Form', __('Estimation Form', 'oembed-for-my-mitsu-estimation-form'), 'manage_options' , 'oembed-my-mitsu', 'oembed_my_mitsu' ,'' , 66);
}
add_action( 'admin_menu', 'mymitsu_plugin_admin_page' );

function oembed_my_mitsu() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    ?>
    <div class="wrap">
        <h1><?php _e('Estimation Form' ,'oembed-for-my-mitsu-estimation-form');?></h1>
        <p><?php _e( 'My Mitsu, is a webservice in Japan, allows users to create an estimation(calculation) form.', 'oembed-for-my-mitsu-estimation-form');?>
            <?php _e( 'A powerful form allows you to create a conditional form with calculation, and outputs a PDF file.', 'oembed-for-my-mitsu-estimation-form');?>
            <?php _e( 'It is suited for business persons.', 'oembed-for-my-mitsu-estimation-form');?>
            <a href="https://my-mitsu.com/">https://my-mitsu.com/</a> <?php _e( 'written in Japanese', 'oembed-for-my-mitsu-estimation-form');?>
        </p>
        <p><?php _e( 'This plugin allows you to output an iframe html tag in a simple way. Simply filling in a URL will ouput an iframe html code.', 'oembed-for-my-mitsu-estimation-form');?></p>
        <p><?php _e( 'https://my-mitsu.jp/estimation/274 will output &lt;iframe src="https://my-mitsu.jp/estimation/274" id="mymitsu" width="640" height="480"&gt;&lt;/iframe&gt;', 'oembed-for-my-mitsu-estimation-form');?></p>
        <p><?php _e( '* Note * In order to create an estimation form, you need to register My Mitsu.', 'oembed-for-my-mitsu-estimation-form');?><a href="https://my-mitsu.jp/">https://my-mitsu.jp/</a></p>
        <h2><?php _e('Estimation Form Example' ,'oembed-for-my-mitsu-estimation-form');?></h2>
        <iframe src="https://my-mitsu.jp/estimation/274" id="mymitsu" width="800" height="800"></iframe>
        <h2><?php _e('How to set up your Estimation Forms' ,'oembed-for-my-mitsu-estimation-form');?></h2>
        <p><?php _e('You can find some example forms and settings.' ,'oembed-for-my-mitsu-estimation-form');?><a href="https://my-mitsu.com/sample/cloud-server"><?php _e('Estimation form example for a cloud-server price' ,'oembed-for-my-mitsu-estimation-form');?></a></p>
    </div>
    <?php
}
