<?php
/*
Plugin Name: Aazeen extension
Plugin URI:
Description: Adds front page sections and other extensions to Aazeen WordPress theme.
Version: 1.0.7
Author: themezwp
Author URI: http://themezwp.com
Text Domain: aazeen-extension
Domain Path: /languages
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

defined('ABSPATH') or die("No script kiddies please!");

define('AAZEEN_EXTEN_VERSION', '1.0.7');


$AAZEEN_EXTEN_file = __FILE__;
$AAZEEN_EXTEN_dir = plugin_dir_path( __FILE__ );
$AAZEEN_EXTEN_uri = plugins_url( '', __FILE__ );

// disable the loading of the JavaScript and CSS contact 7
add_filter( 'wpcf7_load_css', '__return_false' );



/**
* Enqueue Widget Scripts
*
* @param $hook
*/
//Load ADMIN CSS & JS SCRIPTS
function aazeen_extension_widget_scripts($hook)
{
    wp_enqueue_style('aazeen_fontbackend_extension', plugins_url('/assets/fontawesome/css/font-awesome.min.css', __FILE__));
    wp_enqueue_style('aazeen_backend_extension', plugins_url('/assets/js/aazeen_widgets_custom_css.min.css', __FILE__));
    //WIDGETS
    if ('widgets.php' == $hook || 'post.php' == $hook) {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_script('aazeen_extension_widgets', plugins_url('/assets/js/widget-media.js', __FILE__));
    }
}
add_action('admin_enqueue_scripts', 'aazeen_extension_widget_scripts');

/**
 * Aazeen extension Theme Customizer
 *
 * @package Aazeen extension
 */

/**
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aazeen_extension_enqueue_customizer_scripts(){
	wp_enqueue_script( 'jquery-ui-tooltip' );
	wp_enqueue_script( 'hoverIntent' );
	wp_enqueue_style( 'aazeen-extension-customizer-css', plugins_url( '/customizer/admin.css', __FILE__ ),'customizer-css');

	wp_enqueue_script( 'aazeen-extension-customizer-js', plugins_url( '/customizer/customizer-control.js', __FILE__ ),array('customize-controls'), true);

	//Wordpress 4.7 FIXES

	wp_localize_script( 'aazeen-extension-customizer-js', 'objectL10n', array(
		'widgetfocusurl' => admin_url('customize.php?autofocus[panel]=widgets'),
		'optimwidgt' => __( 'aazeen Widgets', 'aazeen-extension' ),
		'othrimwidgt' => __( 'Other Widgets', 'aazeen-extension' ),

) );
}
add_action( 'customize_controls_enqueue_scripts', 'aazeen_extension_enqueue_customizer_scripts' );

/**
* Checks whether woocommerce is active or not
*
* @return boolean
*/
function aazeen_extension_is_woocommerce_active()
{
    if (class_exists('woocommerce')) {
        return true;
    } else {
        return false;
    }
}

/**
 * Checks whether siteorigin pagebuilder is active or not
 *
 * @return boolean
 */
 if ( ! function_exists( 'is_plugin_active' ) ) {
   include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // Require plugin.php to use is_plugin_active() below
 }

 // check aazeen theme active or not

 $theme_data    = wp_get_theme();
 $is_child      = is_child_aazeen_ex( $theme_data );

  function is_child_aazeen_ex( $theme_data ) {
     // For limitation of empty() write in var
     $parent = $theme_data->parent();
     if ( ! empty( $parent ) ) {
         return TRUE;
     }
     return FALSE;
 }
if ( $is_child ) {
    $current_theme_name = $theme_data->parent()->Name;
} else {
  $current_theme = wp_get_theme();
  $current_theme_name = $current_theme->Name;
}

if($current_theme_name == 'Aazeen' || $current_theme_name == 'Aazeen Pro'){

// widgtes

require $AAZEEN_EXTEN_dir . 'inc/widget-clients.php';
require $AAZEEN_EXTEN_dir . 'inc/widget-service.php';
require $AAZEEN_EXTEN_dir . 'inc/widget-team.php';
require $AAZEEN_EXTEN_dir . 'inc/widget-contact.php';
require $AAZEEN_EXTEN_dir . 'inc/widget-feature.php';
require $AAZEEN_EXTEN_dir . 'inc/latest-posts-carousel.php';
require $AAZEEN_EXTEN_dir . 'inc/latest-posts-masonry.php';
if($current_theme_name == 'Aazeen' ){
require $AAZEEN_EXTEN_dir . 'inc/widget-slider.php';
} elseif ($current_theme_name == 'Aazeen Pro') {
  require $AAZEEN_EXTEN_dir . 'inc/widget-slider-pro.php';
  require $AAZEEN_EXTEN_dir . 'inc/widget-service-syone.php';
  }
require $AAZEEN_EXTEN_dir . 'inc/widget-callout.php';


if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
    require $AAZEEN_EXTEN_dir . 'inc/product-carousel.php';

}
}

	if ( is_plugin_active( 'siteorigin-panels/siteorigin-panels.php' ) ) {
// siteorigin panel
  if($current_theme_name == 'Aazeen' ){
        require $AAZEEN_EXTEN_dir . 'siteorigin.php';
    } elseif ($current_theme_name == 'Aazeen Pro') {
        require $AAZEEN_EXTEN_dir . 'siteorigin-pro.php';
    }
}

// extensions-functions
require_once 'extensions-functions.php';


// $meta_boxes
require_once 'meta-box/meta-box.php';

// TGM-Plugin-Activation
require_once 'tgm-activation.php';

// demos
if($current_theme_name == 'Aazeen' ){

require_once 'function-demo.php';

}elseif ($current_theme_name == 'Aazeen Pro') {

  require_once 'function-demo-pro.php';
}

require_once 'fontawesome.php';
require_once 'inc/default.php';

if ( !is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) ) {

// one click demo

require_once 'one-click-demo-import/one-click-demo-import.php';

}
