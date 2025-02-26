<?php
/*
Plugin Name: Outdooractive Embed
Plugin URI: https://corporate.outdooractive.com
Description: Embeds any kind of outdooractive content on your website.
Version: 1.6
Author: Outdooractive AG
Author URI: https://corporate.outdooractive.com
License: GPL v3
*/
if ( ! defined( 'ABSPATH' ) ) exit; 

function outdooractive_embed_init() {
    load_plugin_textdomain( 'outdooractiveEmbed', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
}

add_action( 'init', 'outdooractive_embed_init' );

function oaembed_tinymce_plugin_add_locale( $locales ) {
    $locales [''] = plugin_dir_path(__FILE__) . '/OAButton/tinymce_langs.php';
    return $locales;
}

add_filter( 'mce_external_languages', 'oaembed_tinymce_plugin_add_locale' );

add_action( 'admin_init', 'outdooractive_button' );

function outdooractive_button() {
    if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
        add_filter( 'mce_buttons', 'register_outdooractive_button' );
        add_filter( 'mce_external_plugins', 'add_outdooractive_button' );
    }
}

function register_outdooractive_button( $buttons ) {
    array_push( $buttons, "button_outdooractive" );
    return $buttons;
}

function add_outdooractive_button( $plugin_array ) {
    $options = get_option ( 'oaembedoptions' );
    $usr = $options['usrName'];
    $pro = $options['proKey'];
    if ($usr != null && $pro != null) {
        $plugin_array['outdooractive_script'] = plugins_url( '/OAButton/oamenubuttonpro.js', __FILE__ );
    } else {
        $plugin_array['outdooractive_script'] = plugins_url( '/OAButton/oamenubutton.js', __FILE__ );
    }
    return $plugin_array;
}

add_action( 'admin_enqueue_scripts', 'oaembed_adminScriptsAndCSS' );

function oaembed_adminScriptsAndCSS() {
    wp_enqueue_style( 'outdooractive', plugins_url( 'outdooractive.css', __FILE__ ) );
}


add_action('admin_notices', 'oaembed_admin_notice');

function oaembed_admin_notice() {
    global $current_user ;
    $user_id = $current_user->ID;
    $screen = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if ( strpos( $screen, '?' ) !== false ) {
        $sign = '&';
    } else {
        $sign = '?';
    }
        /* Check that the user hasn't already clicked to ignore the message */
    if ( ! get_user_meta($user_id, 'oaembed_ignore_notice') && current_user_can('manage_options')) {
        echo '<div class="updated" style="border-left-color: #a1b303"><p>'; 
        printf(__('Thank you for installing Outdooractive Embed. Please visit the <a href="%2$s">plugin settings page</a> to find out how it works. | <a href="%1$s">Hide Notice</a>', 'outdooractiveEmbed'), $screen.$sign.'oaembed_nag_ignore=0', admin_url( 'options-general.php?page=oaembed-admin' ));
        echo "</p></div>";
    }
}

add_action('admin_init', 'oaembed_nag_ignore');

function oaembed_nag_ignore() {
    global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['oaembed_nag_ignore']) && '0' == $_GET['oaembed_nag_ignore'] ) {
             add_user_meta($user_id, 'oaembed_ignore_notice', 'true', true);
    }
}


//import Shortcodes and Widgets

require_once(dirname(__FILE__).'/configpage.php');
require_once(dirname(__FILE__).'/shortcodes.php');
require_once(dirname(__FILE__).'/Widgets/EmbedContent.php');



/* gutenberg */
function outdooractive_embed_gutenberg_init(){
    wp_enqueue_style( 'outdooractive_gutenberg_style', plugins_url( 'Gutenberg/gutenberg.css', __FILE__ ) );
    wp_register_script('outdooractive_gutenberg', plugins_url( 'Gutenberg/gutenberg.js', __FILE__ ), array('wp-blocks', 'wp-element', 'wp-i18n'));

    wp_set_script_translations( 'outdooractive_gutenberg', 'outdooractiveEmbed', plugin_dir_path( __FILE__ ) . 'lang' );

    register_block_type('outdooractive/embed', array(
        'editor_script' => 'outdooractive_gutenberg',
        'render_callback' => 'server_renderer_outdooractive_embed',
        'attributes' => array(
            'url' => array(
                'type' => 'string'
            ),
            'maxwidth' => array(
                'type' => 'string'
            ),
            'pro' => array(
                'type' => 'boolean'
            )
        )
    ));
}

add_action( 'init', 'outdooractive_embed_gutenberg_init' );

function server_renderer_outdooractive_embed( $attr ){
    $maxwidth = '';
    if(isset($attr['maxwidth'])){
        $maxwidth = esc_attr($attr['maxwidth']);
    }

    return do_shortcode('[oaembed '
        . 'url="' . esc_attr($attr['url'])
        . '" maxwidth="' . $maxwidth
        . '" ' . ($attr['pro'] === true ? 'usepro=true ' : '')
        . ']');
}

/* https://wordpress.org/gutenberg/handbook/designers-developers/developers/internationalization/ */

?>