<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
Plugin Name: Fontsize Selector Widget
Plugin URI: http://themes.tradesouthwest.com/plugins/Fontsize-Selector-Form/
Description: Creates a widget to add to your sidebar that allows users on the front end to select the font size for a theme page.
Version: 0.4
Author: Larry Judd Oliver
Author URI: http://tradesouthwest.com
Text Domain: fontsize-selector
Domain Path: /languages

*/
/**activate/deactivate hooks
 */
function fontsize_selector_plugin_activation()
{
    global $wp_version;
    $wp = '4.8';
        if ( version_compare( $wp_version, $wp, '<' ) ) {

	        deactivate_plugins( basename( __FILE__ ) );
            wp_die(		'<p>' .
			sprintf(__( 'This plugin can not be activated because it requires a WordPress version 
			greater than %1$s. Please go to Dashboard &#9656; Updates to the latest version of WordPress .', 
			'depict' ),
			$wp )
			. '</p> <a href="' . admin_url( 'plugins.php' )
            . '">' . __( 'Back', 'fontsize-selector' ) . '</a>'
		    );
        }
}

/**house keeeping fallback
 */
function fontsize_selector_plugin_deactivation()
{
    $option_name = 'fontsize_selector_options_fontsize';
    delete_option($option_name);
}

register_activation_hook( __FILE__,   'fontsize_selector_plugin_activation' );
register_deactivation_hook( __FILE__, 'fontsize_selector_plugin_deactivation' );
register_uninstall_hook(__FILE__,     'fontsize_selector_uninstall_run');

/**enqueue text-domain
 * example usage: German MO and PO files should be named
 * fontsize-selector-de_DE.mo and fontsize-selector-de_DE.po.
 */
function fontsize_selector_load_textdomain()
{
    load_plugin_textdomain( 'fontsize-selector',
                            FALSE,
                            plugins_url( basename( __DIR__ )) . '/languages/'
                      );
}
add_action( 'init', 'fontsize_selector_load_textdomain' );

/**include stylesheet
 * @wp_enqueue
*/
if( !function_exists('fontsize_selector_styles')){
function fontsize_selector_styles() {
    wp_register_style( 'fontsize-selector-style',
                      plugins_url( basename( __DIR__ ))
        			  . '/fontsize-selector-style.css' );
    /* wp_register_script( 'fontsize_localstore', plugin_dir_url( __FILE__ ) 
    				  . 'bin/fontsize.localstore.js', array('jquery'), time(), true ); 
    	*/			  
    wp_enqueue_style( 'fontsize-selector-style' );
    //wp_enqueue_script( 'fontsize_localstore' ); 
}
add_action( 'wp_enqueue_scripts', 'fontsize_selector_styles' );
}
require_once ( 'fontsize-admin.php' );
require_once ( 'FontsizeSelector_Widget.php' );
/**
 * Whether to include widget or not.
 * @since 0.5
 */
function fontsize_selector_widget_maybe(){

    $widget_maybe = get_option('fss_fontsize_allowed');
    if( 'fss_fontsize_admin_only' != $widget_maybe ) {
        return 'false';
    } else {
        return 'true';
    }
}
/**
 * @init function to Register widget Fontsize Selector
 * Widget class gets init function if set.
*/
function fontsize_selector_register_widget() {
    $maybe = fontsize_selector_widget_maybe();
    if ( $maybe === 'false' ) 
       register_widget( 'fontsize_selector_widget' );
}
/** 
 *  @callback to register widget 
 */
add_action( 'widgets_init', 'fontsize_selector_register_widget' ); 
add_action( 'init', 'fontsize_selector_custom_css');

function fontsize_selector_custom_css() { 
    
    $size      = 'inherit';
    $fontsizes = (!isset($_COOKIE['fontsize_selector_widget_font_size']))
                    ? '20202020_16' : $_COOKIE['fontsize_selector_widget_font_size'];
    $fontSizes = substr($fontsizes, strpos($fontsizes, "_")+1);
    
    $maybe = fontsize_selector_widget_maybe();
    $options_selected = get_option( 'fontsize_selector_options_fontsize' ); 
    
    if ( $maybe === 'false' ) { 
        $size = sanitize_text_field($fontSizes); 
    }
        else {
        unset($_COOKIE['fontsize_selector_widget_font_size']);
        setcookie('fontsize_selector_widget_font_size', null, -1, '/'); 
        $size = sanitize_text_field($options_selected);
    }
    //if( current_user_can('administrator')) return;  
    echo '<style id="fontsize-selector-style">'; 
    echo 'p, ul, li, ol, td, a, form, label, fieldset{ font-size: ' . esc_attr($size) . 'px !important;}'; 
    echo '</style>';
    
}
add_action( 'wp_head', 'fontsize_selector_custom_css');

?>