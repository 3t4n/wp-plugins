<?php
/*
Plugin Name: Smart Threema
Plugin URI: http://www.chefblogger.me
Description: Add Threema Buttons to your Website <a href="options-general.php?page=QGA_threemasmart">Configuration</a>
Version: 2.4
Author: Eric-Oliver Mächler
Author URI: http://www.ericmaechler.com
Requires at least: 4.0
Tested up to: 6.7.1
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//threema mehrsprachig machen
function my_plugin_initthreema() {
    load_plugin_textdomain( 'smart-threema', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
  }
  add_action('init', 'my_plugin_initthreema');








include 'conf.php';

add_action( 'wp_enqueue_scripts', 'threemasmart_css_style_include' );
 
function threemasmart_css_style_include() {
	//quick sharing button css 

wp_register_style( 'threemasmart_style', plugins_url('css/threemasmart_style.css', __FILE__) );
wp_enqueue_style( 'threemasmart_style' );
}

//threema://compose?id=33EJU3H5&text=Hier%20ein%20Beispiel%20Text.

/* ------------------------------------------- Chat Shortcode Funktion  -------------------------------------------------- */
include("add_to_content.php");
/* ----------------------------------------------------------------------------------------------------------------------- */

/* ------------------------------------------- Chat Shortcode Funktion  -------------------------------------------------- */
include("shortcode.php");
/* ----------------------------------------------------------------------------------------------------------------------- */


/* ------------------------------------------- Chat Shortcode Funktion  -------------------------------------------------- */
include("shortcode_design1.php");
/* ----------------------------------------------------------------------------------------------------------------------- */

/* ------------------------------------------- Chat Shortcode Funktion  -------------------------------------------------- */
include("shortcode_design2.php");
/* ----------------------------------------------------------------------------------------------------------------------- */



/* ------------------------------------------- Floating Button Funktion  -------------------------------------------------- */
$threemasmart_floatingbutton_status_check = get_option('threemasmart_floatingbutton_status');
if ($threemasmart_floatingbutton_status_check == 'an')
{
include("floating-button.php");	
}
else
{}

/* ----------------------------------------------------------------------------------------------------------------------- */


?>