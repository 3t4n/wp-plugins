<?php
if (!defined('ABSPATH')){
exit; // Exit if accessed directly
}

final class MultipleLocationGoogleMapAdmin
{
public function __construct()
{
add_action('admin_menu', array( $this, 'MultipleLocationGoogleMapAdminMenu'));
add_action('admin_enqueue_scripts', array($this, 'MultipleLocationGoogleMapColorCss'));
}

function MultipleLocationGoogleMapColorCss(){
// Add the color picker css file       
wp_enqueue_style('wp-color-picker'); 
// Include our custom jQuery file with WordPress Color Picker dependency
wp_enqueue_script('custom-script-handle', MLGM_PLUGIN_URL.'asset/js/mlgm-color-picker.js', array( 'wp-color-picker' ), false, true); 
wp_enqueue_style('mlgm_map_css', MLGM_PLUGIN_URL.'asset/css/mlgm-map-css.css');
wp_enqueue_style('mlgm_jquery_ui_css', MLGM_PLUGIN_URL.'asset/css/mlgm-jquery-ui.css');
wp_enqueue_script('jquery-ui-core');
wp_enqueue_script('mlgm_range_slider_js', MLGM_PLUGIN_URL.'asset/js/mlgm-range-slider.js', array('jquery' ), false, true); 
}

function MultipleLocationGoogleMapAdminMenu() {
add_submenu_page('edit.php?post_type=mlgm', __('Settings','mlgm'), __('Settings','mlgm'), 'manage_location_google_map', 'mlgmsetting',array($this,'MultipleLocationGoogleSetting'));
}

function  MultipleLocationGoogleSetting() {
include_once(MLGM_PLUGIN_DIR.'includes/admin/settings.php');
}      
}

$GLOBALS['MultipleLocationGoogleMapAdmin']=new MultipleLocationGoogleMapAdmin();
?>