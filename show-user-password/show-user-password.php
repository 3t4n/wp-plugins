<?php
/**
* Plugin Name: Show User Password
* Plugin URI: https://carlosmr.com/show-user-password
* Description: This plugin shows the password field in the table of the Users section in the WordPress dashboard.
* Version: 1.0.0
* Author: Carlos Mart&iacute;nez Romero
* Author URI: https://carlosmr.com
* License: GPL+2
* Text Domain: show-user-password
* Domain Path: /languages
*/
// Starts the plugin
add_action( 'plugins_loaded', 'cmr_supwd_execute' );
function cmr_supwd_execute(){
add_filter('manage_users_columns', 'cmr_supwd_add_upwd_col');
	function cmr_supwd_add_upwd_col($columns) {
	    $columns['user_pass'] = 'MD5 Password';
	    return $columns;
	}
	 
	add_action('manage_users_custom_column',  'cmr_supwd_show_upwd_col_data', 10, 3);
	function cmr_supwd_show_upwd_col_data($value, $column_name, $user_id) {
	    $user = get_userdata( $user_id );
	    if ( 'user_pass' == $column_name )
	        return $user->user_pass;
	    return $value;
	}
}