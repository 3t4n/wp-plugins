<?php
/*
Plugin Name: Admin Post Reminder
Plugin URI: http://esdev.net/wordpress-plugins/admin-post-reminder/
Description: For security reasons (so hackers won't know your admin username), you should not publish posts from your admin account. When the admin is logged in, the plugin displays a gentle reminder not to write any posts.
Version: 1.0.1
Author: Shawn Scammahorn / Es Developed
Author URI: http://esdev.net
*/

/*  Copyright 2009  Shawn Scammahorn / Es Developed  (email: web@esdev.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// ---------- Check to see if user is Admin STARTS HERE
add_action('init', 'wpapr_init');

function wpapr_init() {
	// Only show message if logged in user is the admin
	if(current_user_can('create_users')) {
		function wp_admin_post_reminder_note() {
			echo "<div class='updated fade' style='background-color:#ffb13b !important;border-color:#F90;'><p><strong>Remember:</strong> You're currently logged into WordPress as an admin. For <a href=\"http://esdev.net/wordpress-security-tip-dont-post-from-your-admin-account/\">security reasons</a>, do not write any posts from this account.</p></div>";
		}
		add_action( 'admin_notices', 'wp_admin_post_reminder_note' );
	}
}
// ---------- Check to see if user is Admin ENDS HERE

?>