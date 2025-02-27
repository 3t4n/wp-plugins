<?php
/*
Plugin Name: The Moneytizer
Plugin URI: http://www.themoneytizer.com/
Description: Plugin of the ad network The Moneytizer that facilitates the integration of your ad tags
Version: 10.0.4
Author: The Moneytizer
Author URI: https://www.themoneytizer.com/
License: GPL2
Text Domain: the-moneytizer
Domain Path: /languages
*/

__('Plugin de la régie publicitaire The Moneytizer qui facilite le placement des tags publicitaires','themoneytizer');

// Ajout de l'API
include_once plugin_dir_path( __FILE__ ).'/themoneytizer-api.php';

// Ajout du widget
include_once plugin_dir_path( __FILE__ ).'/themoneytizer-widget.php';

// Ajout du shortcode
include_once plugin_dir_path( __FILE__ ).'/themoneytizer-shortcode.php';

// Page de configuration
include_once plugin_dir_path( __FILE__ ).'/themoneytizer-config.php';

add_filter('https_ssl_verify', '__return_false');
add_filter('plugin_action_links', 'themoneytizer_plugin_action_links', 10, 2);

/**
*Outputs script to the frontend
*/
function themoneytizer_frontendHeader() {
    themoneytizer_output('themoneytizer_insert_header');
}

function themoneytizer_frontendFooter() {
    themoneytizer_output('themoneytizer_insert_footer');
}

function themoneytizer_reco_native_hook($content) {
    if( is_single() ) {

    $content .= themoneytizer_output('themoneytizer_insert_article');

    }
    return $content;
}

function themoneytizer_loadLanguageFiles() {
    $domain = 'themoneytizer';
    $locale =  get_option("themoneytizer_data_language");

    if (strpos($locale, 'fr') !== false) {
        $locale = "fr_FR";
    }elseif(strpos($locale, 'en') !== false){
        $locale = "en_US";
    }elseif(strpos($locale, 'it') !== false){
        $locale = "it_IT";
    }elseif(strpos($locale, 'de') !== false){
        $locale = "de_DE";
    }elseif(strpos($locale, 'es') !== false){
        $locale = "es_ES";
    }elseif(strpos($locale, 'pt') !== false) {
	    $locale = "pt_PT";
    }elseif(strpos($locale, 'ru') !== false){
	    $locale = "ru_RU";
    }else{
        $locale = "en_US";
    }

    update_option('themoneytizer_user_local_lang', $locale);

    $mofile = $domain . '-' . $locale . '.mo';

    $plugin_rel_path = dirname( plugin_basename( __FILE__ ) ) . '/languages/';

    if ( load_textdomain( $domain, $plugin_rel_path )) {
            return true;
    }

    if ( false !== $plugin_rel_path ) {
            $path = WP_PLUGIN_DIR . '/' . trim( $plugin_rel_path, '/' );
    } elseif ( false !== $deprecated ) {
            _deprecated_argument( __FUNCTION__, '2.7.0' );
            $path = ABSPATH . trim( $deprecated, '/' );
    } else {
        $path = WP_PLUGIN_DIR;
    }

    return load_textdomain( $domain, $path . '/' . $mofile );
}

function themoneytizer_output($setting) {
    if (is_admin() OR is_feed() OR is_robots() OR is_trackback()) {
        return;
    }
    $meta = get_option($setting);

    if (empty($meta)) {
        return;
    }

    if (trim($meta) == '') {
        return;
    }
    echo stripslashes($meta);
}

add_action('wp_head', 'themoneytizer_frontendHeader');
add_action('wp_footer', 'themoneytizer_frontendFooter');
add_action('plugins_loaded', 'themoneytizer_loadLanguageFiles');
add_filter( 'the_content', 'themoneytizer_reco_native_hook');

function themoneytizer_plugin_action_links($links, $file) {
    static $this_plugin;

    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }

    if ($file == $this_plugin) {
        $settings_link = __('<a href="options-general.php?page=themoneytizer">Réglages</a>','themoneytizer');

        array_unshift($links, $settings_link);
    }
    return $links;
}
