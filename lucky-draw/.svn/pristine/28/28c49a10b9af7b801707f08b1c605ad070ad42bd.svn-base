<?php
 if ( ! defined( 'ABSPATH' ) ) exit;
/**
Plugin Name: Lucky Draw | DESIGN - REWARD - REPEAT. 

Description: The **Lucky Draw Box Plugin** allows administrators to create exciting lucky draw events where participants can register for a chance to win fabulous prizes! This plugin offers an easy way to manage and style contests on your WordPress site with prize draws, fair random winner selection. 
Version: 3.0
Author: Owais Khan
Author URI: https://github.com/owaisk7
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

*/
global $wpdb;
define("Lucky_Draw_Plugin_URL",plugin_dir_url( __FILE__ ));
define("Lucky_Draw_Database", $wpdb->prefix.'lucky_draw');
define("Lucky_Draw_Database2", $wpdb->prefix.'lucky_draw_contestants');
define("Lucky_Draw_Home_URL", admin_url());
define("Lucky_Draw_Dir_Name", dirname(__FILE__));
define("Lucky_Draw_Plugin_Path",plugin_dir_path( __FILE__ )); 

//Add Main Menu All menu options are in menu.php

require_once Lucky_Draw_Plugin_Path.'includes/menus.php';


function lucky_draw_table_creation(){
  //Check if Tables exist .. if not then create .
    
 include_once (dirname(__FILE__).'../includes/lucky-draw-db.php');
 
 }



// Add Shortcode lucky_draw_view
add_shortcode( "lucky_draw_view", "lucky_draw_view");

function lucky_draw_view(){


ob_start();

  include (dirname(__FILE__).'../drawbox.php');
$html = ob_get_contents();
ob_get_clean();
return $html;

}


//Include LuckyDraw Mail Functions

include_once Lucky_Draw_Plugin_Path.'includes/lucky-draw-mail.php';

// Include Lucky Draw COre Functions

 include_once Lucky_Draw_Plugin_Path.'includes/lucky-draw-main.php';

//Styles 
include_once Lucky_Draw_Plugin_Path.'lib/styles.php';

$drawtype="";
//Get Draw Type And Display Short Code
//$drawtype=lucky_draw_draw_type();
if($drawtype=="afteraddtocart"){
  function custom_content_after_add_to_cart() {
    // Custom content after the Add to Cart button
    include (dirname(__FILE__).'../drawbox.php');
  }
  
  add_action( 'woocommerce_single_product_summary', 'custom_content_after_add_to_cart', 35 );
  

}elseif($drawtype=="orderthankyou")
{  

  function custom_content_after_order_complete() {
    // Get the order object
    include (dirname(__FILE__).'../drawbox.php');
  
  }
  add_action( 'woocommerce_thankyou', 'custom_content_after_order_complete',0 );
  

}


  





function lucky_draw_get_product_link_by_sku($sku) {
        // Get the product by SKU
        $product = wc_get_product_id_by_sku($sku);
        
        if ($product) {
            // Get the product URL
            return get_permalink($product);
        } else {
            return false; // Return false if product not found
        }
      }
      
function lucky_draw_participation_form() {
        if ( !defined('ABSPATH') ) {
                die('Direct access not allowed');
            }
            
        include_once Lucky_Draw_Plugin_Path.'drawboxdone.php';
      }
      
add_action('admin_post_lucky_draw_participation_form', 'lucky_draw_participation_form');








// Wp enqueue Scripts
function lucky_draw_assets(){
// Enqueue JS
 
 wp_enqueue_script('luckydrawjquerys','/wp-content/plugins/lucky-draw/assets/js/lucky_draw_jquery_3-7-1.js','','1.0',false);

 wp_enqueue_script('luckydrawjqueryui','/wp-content/plugins/lucky-draw/assets/js/lucky_draw_jqueryui.js','','1.0',false);

 wp_enqueue_script('luckydrawtablejs','/wp-content/plugins/lucky-draw/assets/js/lucky_draw_tables.js','','1.0',false);

// wp_enqueue_script('luckydrawsemanticjs','/wp-content/plugins/lucky-draw/assets/js/lucky_draw_semantic.min.js','','1.0',false);

 wp_enqueue_script('luckydrawbootstrap-bundle','/wp-content/plugins/lucky-draw/assets/js/lucky_draw_bootstrap533_bundle.js','','1.0 ',false);

 wp_enqueue_script('luckydrawsemanticsearchjs','/wp-content/plugins/lucky-draw/assets/js/search.min.js','','1.0 ',false);

 wp_enqueue_script('luckydrawsemanticmodaljs','/wp-content/plugins/lucky-draw/assets/js/modal.min.js','','1.0 ',false);

 wp_enqueue_script('luckydrawjs','/wp-content/plugins/lucky-draw/assets/js/luckydraw.js','',' ',true);
 
// Enqueue CSS
 
wp_enqueue_style('luckydrawjquery-ui-css','/wp-content/plugins/lucky-draw/assets/css/lucky_draw_jquery_ui.css','','1.0');

wp_enqueue_style('luckydrawbootstrap','/wp-content/plugins/lucky-draw/assets/css/lucky_draw_bootstrap.css','','1.0');



wp_enqueue_style('luckydrawbootstrapedit','/wp-content/plugins/lucky-draw/assets/css/lucky_draw_bootstrap_edit.css','','1.0');
 
wp_enqueue_style('luckydrawsemanticsearch','/wp-content/plugins/lucky-draw/assets/css/search.min.css','','1.0');


}
add_action( 'init',"lucky_draw_assets");



//


function lucky_draw_table_deletion(){
  global $wpdb;
  $query = $wpdb->prepare( 'SHOW TABLES LIKE %s',Lucky_Draw_Database);

  if ( ! $wpdb->get_var( $query ) == Lucky_Draw_Database ) {
    $wpdb->query("DROP TABLE ".Lucky_Draw_Database); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange
      }
      
  $query = $wpdb->prepare( 'SHOW TABLES LIKE %s',Lucky_Draw_Database2);

   if ( ! $wpdb->get_var( $query ) == Lucky_Draw_Database2 ) {   
      $wpdb->query("DROP TABLE ".Lucky_Draw_Database2); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange
      }
}        
//Create Tables When Plugin Activated    
register_activation_hook(__FILE__,'lucky_draw_table_creation');
register_deactivation_hook(__FILE__,'lucky_draw_table_deletion');

