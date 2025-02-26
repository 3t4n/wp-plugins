<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Plugin Name:       Human BMI Calculator
 * Plugin URI:        https://wordpress.org/plugins/human-bmi-calculator/
 * Description:       A Caculator to show a person's body status based on height and weight using BMI Calculator
 * Version:           1.0.0
 * Requires at least: 6.0
 * Requires PHP:      7.2
 * Author:            Tareq Mahmud 
 * Author URI:        https://tareqemon.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       hbc
 */

// CSS
function hbmi_enqueue_style(){
    wp_enqueue_style('hbmi-style', plugins_url('css/hbc-style.css', __FILE__));
  }
  add_action( "wp_enqueue_scripts", "hbmi_enqueue_style" );


 // JavaScript
 function hbmi_enqueue_scripts(){
    wp_enqueue_script('jquery');
    wp_enqueue_script('hbmi-plugin-script', plugins_url('js/hbc-plugin.js', __FILE__), array(), '1.0.0', 'true');
  }
  add_action( "wp_enqueue_scripts", "hbmi_enqueue_scripts" );


// Calculator View
  function hbmi_output($atts, $inc) {
	return hbmi_get_include_contents($inc);
  }
   
  function hbmi_get_include_contents($filename) {
	ob_start();  
	@include( plugin_dir_path( __FILE__ ) . 'bmi-view.php');
	 return ob_get_clean();
  }

// register shortcode
add_shortcode('hbmi-calculator', 'hbmi_output'); 


// Admin Page
add_action('admin_menu', 'hbmi_plugin_setup_menu');
 
function hbmi_plugin_setup_menu(){
    add_menu_page( 'BMI Calculator Plugin', 'BMI Calculator', 'manage_options', 'hbmi-calculator-settings', 'hbmi_plugin_init','dashicons-calculator');
}
 
function hbmi_plugin_init(){
    echo "<h2>BMI Calculator Settings</h2>";
    echo "<h4>To display the calculator in any page or post, just use the shortcode:  <b>[hbmi-calculator]</b></h4>";
}


?>