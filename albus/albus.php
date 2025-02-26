<?php
/*
Plugin Name: Albus
Plugin URI: 
Description: Enables the use of Albus whitelisting plugin for Bukkit (Minecraft) on WordPress installations
Author: Joel Bergroth
Version: 0.3
Author URI: http://edvindev.wordpress.com
*/

/*  Copyright 2011 Joel Bergroth (email: joel.bergroth@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//Includes

register_activation_hook(__FILE__, 'albus_activation');

function albus_activation() {
	
	global $wpdb;
	
	$users_table_name = $wpdb->prefix.'users';

	$sql = "ALTER TABLE $users_table_name ADD whitelist INT NOT NULL DEFAULT '0';";
		
	$wpdb->query($sql);

}


//Filters
add_filter('manage_users_columns', 'add_albus_column');
add_filter('manage_users_custom_column', 'manage_albus_column', 10, 3);

function add_albus_column($columns) {
	
	$columns['whitelist'] = 'Whitelisted';
	
	return $columns;

}

function manage_albus_column($empty='', $column_name, $id) {

	global $wpdb;
	
	if( $column_name == 'whitelist' ) {
	
		$user_info = get_userdata($id);
		$user_login = $user_info->user_login;
		
		if($user_login != 'admin') {
		
			if($user_info->whitelist == '1') {
				$whitelisted = 'Yes'.'<br />'.'<div class="row-actions"><span class="delete"><a href="?blacklist='.$id.'">Remove from whitelist</a></span></div>';
			}
			else {
				$whitelisted = 'No'.'<br />'.'<div class="row-actions"><span class="edit"><a href="?whitelist='.$id.'">Add to whitelist</a></span></div>';
			}
			
		}
		else {
			$whitelisted = '<i>Cannot be whitelisted</i>';
		}
		
		return $whitelisted;
		
    }
}

function albus_register_settings() {
	
	if( strstr( $_SERVER['PHP_SELF'], '/wp-admin/users.php' ) && current_user_can( 'edit_users' ) ) {
	
		if( isset( $_GET['whitelist'] ) ) {
			
			if( is_numeric($_GET['whitelist']) ) {
			
				global $wpdb;
				
				$userdata = get_userdata($_GET['whitelist']);
			
				$users_table_name = $wpdb->prefix.'users';
				
				if ( $userdata->whitelist != '1' ) {
			
					$wpdb->update( $users_table_name, array( 'whitelist' => '1'), array( 'ID' => $_GET['whitelist'] ) );
				
					//wp_mail( $to, $subject, $message, $headers, $attachments );
					wp_mail( $userdata->user_email, 'Whitelisted', 'You are now whitelisted on '.get_bloginfo('name').'!');
					
				}
			}
			else {
			
				global $wpdb;
				
				$userdata = get_userdatabylogin($_GET['whitelist']);
			
				$users_table_name = $wpdb->prefix.'users';
				
				if ( $userdata->whitelist != '1' ) {
			
					$wpdb->update( $users_table_name, array( 'whitelist' => '1'), array( 'user_login' => $_GET['whitelist'] ) );
				
					//wp_mail( $to, $subject, $message, $headers, $attachments );
					wp_mail( $userdata->user_email, 'Whitelisted', 'You are now whitelisted on '.get_bloginfo('name').'!');
					
				}
			}
		}
		elseif( isset( $_GET['blacklist'] ) ) {
		
			if ( is_numeric($_GET['blacklist']) ) {
		
				global $wpdb;
			
				$users_table_name = $wpdb->prefix.'users';
			
				$wpdb->update( $users_table_name, array( 'whitelist' => '0'), array( 'ID' => $_GET['blacklist'] ) );
		
			}
		}
	}
}
add_action( 'admin_init', 'albus_register_settings' );

?>