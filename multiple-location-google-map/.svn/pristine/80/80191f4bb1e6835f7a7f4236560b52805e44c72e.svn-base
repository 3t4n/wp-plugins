<?php
if (!defined('ABSPATH')){
exit; // Exit if accessed directly
}

final class YDSGoogleMapsAdmin
{
public function __construct()
{
add_action('admin_menu', array( $this, 'admin_menu' ) );
add_action('admin_enqueue_scripts', array($this, 'YDSGoogleMapsColorCss'));
}

function YDSGoogleMapsColorCss(){
// Add the color picker css file       
wp_enqueue_style('wp-color-picker'); 
// Include our custom jQuery file with WordPress Color Picker dependency
wp_enqueue_script('custom-script-handle', YDSGM_PLUGIN_URL.'asset/js/yds-color-picker.js', array( 'wp-color-picker' ), false, true); 
wp_enqueue_style('yds-map-css', YDSGM_PLUGIN_URL.'asset/css/yds-map-css.css');
wp_enqueue_style('jquery-ui-css', YDSGM_PLUGIN_URL.'asset/css/jquery-ui.css');
wp_enqueue_script('jquery-ui-core');
wp_enqueue_script('range_slider_js', YDSGM_PLUGIN_URL.'asset/js/range-slider.js', array('jquery' ), false, true); 
}

function admin_menu() {
add_submenu_page('edit.php?post_type=mlgm', __('Settings','mlgm'), __('Settings','mlgm'), 'manage_options', 'mlgmsetting',array($this,'yds_google_maps_setting'));
}

function  yds_google_maps_setting() {
include_once(YDSGM_PLUGIN_DIR.'includes/admin/settings.php');
}      
}

$GLOBALS['YDSGoogleMapsAdmin']=new YDSGoogleMapsAdmin();
?>