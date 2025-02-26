<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/*
Plugin Name: atript
Plugin URI: http://wordpress.org/extend/plugins/atript/
Description: 
Version: 1.0
Author: Daniel Schmeh
Author URI: http://atript.org
*/

function activate_atript_container() {
  add_option('atript_code', '');
}

function deactive_atript_container() {
  delete_option('atript_code');
}

function admin_init_atript_container() {
  register_setting('atript_container', 'atript_code');
}

function admin_menu_atript_container() {
  add_options_page('atript Container', 'atript Container', 'manage_options', 'atript Container', 'options_page_atript_container');
}

function options_page_atript_container() {
  include( plugin_dir_path( __FILE__ ) . 'options.php' );
}

function atript_container() {
	     $atript_code = get_option('atript_code'); 
?>

<!-- atript plugin for WordPress -->
<?php echo $atript_code ?>

<?php
}

register_activation_hook(__FILE__, 'activate_atript_container');
register_deactivation_hook(__FILE__, 'deactive_atript_container');

if (is_admin()) {
  add_action('admin_init', 'admin_init_atript_container');
  add_action('admin_menu', 'admin_menu_atript_container');
}

if (!is_admin()) {
  add_action('wp_head', 'atript_container');
}

?>