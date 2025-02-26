<?php 
/*
  Plugin Name: Category and Products Accordion Panel
  Description: Category and Products Accordion Panel
  Author: ikhodal team
  Plugin URI: http://www.ikhodal.com/wp-accordion-panel-for-category-and-products/
  Author URI: http://www.ikhodal.com/wp-accordion-panel-for-category-and-products/
  Version: 1.0
  License: GNU General Public License v2.0
  License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/ 
  
  
//////////////////////////////////////////////////////
// Defines the constants to use within the plugin. //
////////////////////////////////////////////////////// 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly  
/**
* Widget/Block Title
*/
define( 'acp_widget_title', __( 'Category & Product View', 'categoryaccordionpanel') );
 
/**
* Default category selection for fist product load in widget
*/
define( 'acp_category', '0' );

/**
* Number of products per next loading result
*/
define( 'acp_number_of_product_display', '2' );

/**
* Product price text color
*/
define( 'acp_price_text_color', '#000' );

/**
* Product title text color
*/
define( 'acp_title_text_color', '#000' );

/**
* Price text color for 'From-To' price 
*/
define( 'acp_price_tab_text_color', '#000' );

/**
* Price text background color for 'From-To' price 
*/
define( 'acp_price_tab_background_color', '#f7f7f7' );

/**
* Widget/block header text color
*/
define( 'acp_header_text_color', '#fff' );

/**
* Widget/block header text background color
*/
define( 'acp_header_background_color', '#00bc65' );

/**
* Display product title and text over product image
*/
define( 'acp_display_title_price_over_image', 'no' );

/**
* Widget/block width
*/
define( 'acp_widget_width', '100%' );  

/**
* Hide/Show widget title
*/
define( 'acp_hide_widget_title', 'no' );
 
/**
* Template for widget/block
*/
define( 'acp_template', 'pane_style_1' ); 

/**
* Hide/Show product price
*/
define( 'acp_hide_product_price', 'no' ); 

/**
* Hide/Show product title
*/
define( 'acp_hide_product_title', 'no' );  

/**
* Security key for block id
*/
define( 'acp_security_key', 'ACP_#s@R$@ASI#TA(!@@21M3' );
 
/**
*  Assets for accordion panel for category and products
*/
$acp_plugins_url = plugins_url( "/assets/", __FILE__ );

define( 'ACP_MEDIA', $acp_plugins_url ); 

/**
*  Plugin DIR
*/
$acp_plugin_DIR = plugin_basename(dirname(__FILE__));

define( 'ACP_Plugin_DIR', $acp_plugin_DIR ); 
 
/**
 * Include abstract class for common methods
 */
require_once 'include/abstract.php';


///////////////////////////////////////////////////////
// Include files for widget and shortcode management //
///////////////////////////////////////////////////////

/**
 * Admin panel widget configuration
 */ 
require_once 'include/admin.php'; 

/**
 * Load Accordion Panel for Category and Products on frontent pages
 */
require_once 'include/categoryaccordionpanel.php'; 
 