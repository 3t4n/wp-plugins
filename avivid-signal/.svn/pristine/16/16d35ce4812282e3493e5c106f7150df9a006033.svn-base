<?php
/**
 * AviviD Signal is a service for push notification.
 *
 * @package AviviD Signal
 * @author AviviD
 * @license GPL-2.0+
 * @link https://www.avividai.com/download
 * @copyright 2021 AviviD, LLC. All rights reserved.
 *            @wordpress-plugin
 *            Plugin Name: AviviD Signal
 *            Plugin URI: https://www.avividai.com/download
 *            Description: AviviD Signal is a service for push notification.
 *            Version: 1.00.00
 *            Author: AviviD
 *            Author URI: https://www.avividai.com/
 *            Contributors: AviviD
 *            License: GPL-2.0+
 *            License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
//register_activation_hook( __FILE__, 'your_activation_function');
//register_deactivation_hook( __FILE__, 'your_deactivation_function');
//register_uninstall_hook( __FILE__, 'your_uninstall_function');
function avivid_signal_add_menu() {
	add_menu_page( 
                  "AviviD Signal Settings", 
                  "AviviD Signal Settings", 
                  "manage_options", 
                  "avivid_signal", 
                  "avivid_signal_page"
                 );
}
add_action ( "admin_menu", "avivid_signal_add_menu" );
function avivid_signal_page() {
    echo '<div class="wrap">
	<form method="post" action="options.php">';
	settings_fields( "avivid_signal_option" );
    do_settings_sections( "avivid_signal_option" );
	echo avivid_signal_web_id_options();
    echo avivid_signal_category_id_options();
    submit_button();
    echo '</form></div>';
    echo "Please apply your own web_id / category_id , or fill in existing web_id / category_id to continue.<br />
          <a href='https://master.likr.com.tw/admin/public/login' target='_blank'>apply here</a>";
}
function avivid_signal_settings() {
	/*add_settings_section( "avivid_signal_web_id", "", null, "avivid_signal" );
	add_settings_field( "avivid_signal_web_id", 
                        "AviviD web_id :", 
                        "avivid_signal_web_id_options", 
                        "avivid_signal", 
                        "avivid_signal_web_id" );*/
	register_setting("avivid_signal_option", 
                     "avivid_signal_web_id");
    /*add_settings_section( "avivid_signal_category_id", "", null, "avivid_signal" );
    add_settings_field( "avivid_signal_category_id",
                        "AviviD category_id :", 
                        "avivid_signal_category_id_options",
                        "avivid_signal", 
                        "avivid_signal_category_id" );*/
    register_setting("avivid_signal_option", 
                     "avivid_signal_category_id");
}
add_action ( "admin_init", "avivid_signal_settings" );
function avivid_signal_web_id_options() {
    $string = '<div class="postbox" style="width: 65%; padding: 30px;">
	<input type="text" name="avivid_signal_web_id"
		value="';
    $string .= stripslashes_deep ( esc_attr ( get_option ( 'avivid_signal_web_id' ) ) );
	$string .= '" /> Provide a web_id.</div>';
    return $string;
}
function avivid_signal_category_id_options() {
    $string =  '<div class="postbox" style="width: 65%; padding: 30px;">
    <input type="text" name="avivid_signal_category_id"
        value="';
    $string .= stripslashes_deep(esc_attr(get_option('avivid_signal_category_id')));
    $string .= '" /> Provide a category_id.</div>';
    return $string;
}
add_filter ( 'the_content', 'avivid_signal_web_id_content' );
function avivid_signal_web_id_content($content) {
	return $content . stripslashes_deep(esc_attr(get_option('avivid_signal_web_id')));
}
add_filter ( 'the_content', 'avivid_signal_category_id_content' );
function avivid_signal_category_id_content($content) {
    return $content . stripslashes_deep(esc_attr(get_option('avivid_signal_category_id')));
}
function avivid_signal_load_scripts($hook) {
    $output_config = set_aviavid_config_js();
    $config_js = plugin_dir_path(__FILE__).'js/avivid_signal_config.js';
    file_put_contents($config_js, $output_config);
    sleep(1);
    if (file_exists($config_js)){
        wp_register_script('avivid_signal_config', 
                           plugins_url('js/avivid_signal_config.js',__FILE__), 
                           array(), 
                           false, 
                           true);
        wp_enqueue_script('avivid_signal_config');
    }
    wp_register_script('avivid_signal_sdk', 
                       plugins_url('js/avivid_signal_sdk.js',__FILE__), 
                       array(), 
                       false, 
                       true);
    wp_enqueue_script('avivid_signal_sdk');
}
add_action('wp_enqueue_scripts', 'avivid_signal_load_scripts');
function set_aviavid_config_js(){
    $web_id = get_option('avivid_signal_web_id');
    $category_id = get_option('avivid_signal_category_id');
    $string = "window.AviviD = window.AviviD || {settings:{},status:{}};";
    $string .= "AviviD.web_id = '$web_id';";
    $string .= "AviviD.category_id = window.avivid_category_id || '$category_id';";
    return $string;
}
?>
