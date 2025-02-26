<?php
/*
Plugin Name: Add bbPress Default Role
Plugin URI: http://trevordavis.net/plugins/add-bbpress-default-role/
Description: When integrating bbPress and WordPress and using only the WordPress registration, no default role was assigned to the user in bbPress. This will give the user a role of member in bbPress.
Author: Trevor Davis
Version: 0.1
Author URI: http://trevordavis.net/
*/

function insertbbPressRole($insert_id) {
	$capability = maybe_unserialize('a:1:{s:6:"member";b:1;}');
	update_usermeta($insert_id,'bb_capabilities',$capability);
}

add_action('user_register', 'insertbbPressRole');
?>