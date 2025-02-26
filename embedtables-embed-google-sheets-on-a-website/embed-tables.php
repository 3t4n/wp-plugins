<?php
/**
 * Plugin Name: EmbedTables - Embed Google Sheets on a website
 * Plugin URI: https://embedtables.com
 * Description: EmbedTables lets you beautifully embed data from Google Sheets or Airtable in no time. Don't redirect users to spreadsheets anymore.
 * Version: 1.0.0
 * Author: EmbedTables
 * License: GPLv2 or later
 */


function embt_wp_plugin($atts) {
    
    $values = shortcode_atts( array(
            'id' => '',
        ), $atts );
    $id = $values['id'];
    $Content = "<div data-embedtableid='".$id."'></div>";

	 
    return $Content;
}

function embt_enqueue_scripts(){
    wp_enqueue_script( 'embed-tables-bundle-script', 'https://scripts.embedtables.com/script.js', array(), null, true );
}

function embt_options_page() {
    add_menu_page(
        'EmbedTables',
        'EmbedTables',
        'manage_options',
        plugin_dir_path(__FILE__) . 'admin/view.php',
        null,
        plugin_dir_url( __FILE__ ) . 'admin/images/et.png',
    );
}

add_action( 'wp_enqueue_scripts', 'embt_enqueue_scripts' );
add_shortcode('embedtable', 'embt_wp_plugin');
add_action( 'admin_menu', 'embt_options_page' );

?>