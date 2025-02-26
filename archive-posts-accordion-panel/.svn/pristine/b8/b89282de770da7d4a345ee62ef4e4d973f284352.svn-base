<?php 
/*
  Plugin Name: Archive Posts Accordion Panel
  Description: Displays Archive posts with ajax filter
  Author: ikhodal team
  Plugin URI: http://www.ikhodal.com/wp-archive-posts-accordion-panel/
  Author URI: http://www.ikhodal.com/wp-archive-posts-accordion-panel/
  Version: 1.0
  License: GNU General Public License v2.0
  License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/ 
  
  
//////////////////////////////////////////////////////
// Defines the constants for use within the plugin. //
////////////////////////////////////////////////////// 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly  
/**
* Widget/Block Title
*/
define( 'avpt_widget_title', __( 'Archives', 'archivespostaccordion') );

/**
* Default date format
*/
define( 'avpt_date_format', 'year' ); 
 
/**
* Default category selection for post load in widget
*/
define( 'avpt_category', '0' );

/**
* Number of posts per next loading result
*/
define( 'avpt_number_of_post_display', '2' );

 
/**
* Post title text color
*/
define( 'avpt_title_text_color', '#000' );

/**
* Price text color for panel
*/
define( 'avpt_panel_text_color', '#000' );

/**
* Price text background color for panel
*/
define( 'avpt_panel_background_color', '#f7f7f7' );

/**
* Widget/block header text color
*/
define( 'avpt_header_text_color', '#fff' );

/**
* Widget/block header text background color
*/
define( 'avpt_header_background_color', '#00bc65' );

/**
* Display post title and text over post image
*/
define( 'avpt_display_title_over_image', 'no' );

/**
* Widget/block width
*/
define( 'avpt_widget_width', '100%' );  

/**
* Hide/Show widget title
*/
define( 'avpt_hide_widget_title', 'no' ); 
 
/**
* Template for widget/block
*/
define( 'avpt_template', 'pane_style_1' ); 
 
/**
* Hide/Show post title
*/
define( 'avpt_hide_post_title', 'no' );  

/**
* Security key for block id
*/
define( 'avpt_security_key', 'avpt_#s@R$@ASI#TA(!@@21M3' );
 
/**
*  Assets of the plugin
*/
$avpt_plugins_url = plugins_url( "/assets/", __FILE__ );

define( 'AVPT_MEDIA', $avpt_plugins_url ); 

/**
*  Plugin DIR
*/
$avpt_plugin_DIR = plugin_basename(dirname(__FILE__));

define( 'AVPT_Plugin_DIR', $avpt_plugin_DIR ); 
 
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
 * Load Archive Posts Accordion Panel on frontent pages
 */
require_once 'include/archivespostaccordion.php';  
 