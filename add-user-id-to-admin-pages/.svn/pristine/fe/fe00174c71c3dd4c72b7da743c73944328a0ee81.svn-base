<?php /** 
* Plugin Name: Add User ID to Admin Pages
* Description: Adds the User ID to the Users page within the WordPress admin
* Author: Worcester Web Studio
* Version: 1.0.2 */ 

function wws_grab_user_id_now( $columns ) {
	$columns['user_id'] = 'ID';
	return $columns;
}
add_filter('manage_users_columns', 'wws_grab_user_id_now');
 
function wws_grab_user_id_content_now($value, $column_name, $user_id) {
	if ( 'user_id' == $column_name )
		return $user_id;
	return $value;
}
add_action('manage_users_custom_column',  'wws_grab_user_id_content_now', 10, 3);
 
function wws_grab_user_id_style_now(){
	echo '<style>.column-user_id{width: 5%}</style>';
}
add_action('admin_head-users.php',  'wws_grab_user_id_style_now');

?>