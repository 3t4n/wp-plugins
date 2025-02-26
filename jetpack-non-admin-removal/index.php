<?php
/**
 * Plugin Name: JetPack Non-Admin Removal
 * Plugin URI: http://wordpress.org/plugins/jetpack-non-admin-removal/
 * Description: Removes JetPack from Non-Admin users on your website.
 * Version: 3.0
 * Author: Alex Westergaard
 * Author URI: http://alexwestergaard.com
 * License: GPLv2
 */
 
add_action( 'admin_init', 'jetpack_nonadmin_removal_init');

function jetpack_nonadmin_removal_init() {
	if( !current_user_can( 'manage_options' ) ) {
		if(
				false !== strpos($_SERVER['REQUEST_URI'], '/wp-admin/admin.php?page=jetpack')
			||	false !== strpos($_SERVER['REQUEST_URI'], '/wp-admin/admin.php?page=omnisearch')
		) {
			wp_redirect( '/wp-admin/', 302 );
		}
		if( class_exists( 'Jetpack' ) ) {
			remove_menu_page( 'jetpack' );
		}
	}
}

?>