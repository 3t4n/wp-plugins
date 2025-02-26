<?php
/*
Plugin Name: DSGVO Youtube
Plugin URI: https://www.ericmaechler.com/produkt/dsgvo-youtube/
Description: Add your youtube videos as according to the GDPR / DSGVO regulations. Füge deine Videos gemäss den DSGVO Richtlinien ein. (<a href="options-general.php?page=QGA_dsgvoyoutube">Settings/Instruction</a>)
Version: 1.5.1
Author: Eric-Oliver Mächler
Author URI: https://www.ericmaechler.com
Requires at least: 4.0
Tested up to: 6.7.1
Text Domain: dsgvo-youtube
Domain Path: /languages
*/

//dsgvo youtube mehrsprachig machen
function my_plugin_initdsgvoyoutube() {
    load_plugin_textdomain( 'dsgvo-youtube', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
  }
  add_action('init', 'my_plugin_initdsgvoyoutube');



// Funktion zum Einbinden des PHP-Stylesheets
function dsgvoyoutube_enqueue_styles() {
    // Pfad zum PHP-Stylesheet
    $php_file = plugins_url( 'css/style.php', __FILE__ );

    // Einbinden des PHP-Stylesheets im Backend und Frontend
    wp_enqueue_style( 'dsgvoyoutube-style', $php_file );
}

// Hook, um die Funktion aufzurufen
add_action( 'admin_enqueue_scripts', 'dsgvoyoutube_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'dsgvoyoutube_enqueue_styles' );







// add menu section
include 'conf.php';

// add css JS -> includes/add-js-css.php
include ("includes/add-js-css.php");

// add Button für Text-Editor mit standard-bild
include ("includes/add-button-texteditor.php");

// add Button für Text-Editor mit standard-bild
include ("includes/add-button-texteditor-eigenesbild.php");

// the popup shortcode
include("popup.php");

// video replace thumbnail
include("inpage.php");