<?php
/*
Plugin Name: Sign Out Reminder
Description: Displays a reminder to users to remember to log out whenever they log in to the admin area.
Plugin URI:  http://lud.icro.us/wordpress-plugin-sign-out-reminder/
Version:     0.2
Author:      John Blackbourn
Author URI:  http://johnblackbourn.com/

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

*/

function sign_out_reminder() {
	if ( strpos( wp_get_referer(), 'wp-login.php' ) ) {
		?>
	<div class="updated fade" id="signoutreminder"><p><?php _e( 'Remember to always log out after you&#0146;ve finished by clicking on the Log Out link at the top of the page.', 'signoutreminder' ); ?></p></div>
		<?php
	}
}

if ( function_exists( 'load_plugin_textdomain' ) )
	load_plugin_textdomain( 'signoutreminder', PLUGINDIR );

if ( function_exists( 'add_action' ) )
	add_action( 'admin_notices', 'sign_out_reminder' );

?>