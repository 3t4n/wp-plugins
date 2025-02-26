<?php

/**
* Plugin Name: Avatar 3D Creator
* Plugin URI: https://avatar3dcreator.com/wordpress-plugin-avatar-3d-creator-create-character-3d/
* Description: Avatar 3D Creator Free Online. Create your own 3D Character for VR Chats and Games.
* Version: 1.0.0
* Author: Avatar 3D Creator
* Author URI: https:/avatar3dcreator.com/
* License: GPLv2 or later
* Text Domain: avatar3dcreator
*/

// create page
function av3d_create_page() {
	
	 $av3d_page = get_page_by_path( 'avatar-3d-creator' , OBJECT );
	
	if( !isset($av3d_page) ) {
	
	$my_post  = array( 'post_title'     => 'Avatar 3D Creator',
	                   'post_type'      => 'page',
	                   'post_name'      => 'avatar-3d-creator',
	                   'post_content'   => '<iframe src="//avatar3dcreator.com/examples/avatar3dcreator/?g=1" name="frame1" scrolling="auto" frameborder="no" align="center" height="540px" width="100%"></iframe>',
	                   'post_status'    => 'publish' );
	
	// Get Post ID - FALSE to return 0 instead of wp_error            
	$PageID = wp_insert_post( $my_post, FALSE );

	}
	
}

// save function to create page
add_action( 'init', 'av3d_create_page' );

// activate function to create page
function av3d_activate() { 

    av3d_create_page(); 

}

// load function to create page on plugin activation
register_activation_hook( __FILE__, 'av3d_activate' );
