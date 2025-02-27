<?php
/*  Copyright 2013  Oakwood Creative  (email : info@oakwood.se)

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

/*
Plugin Name: Site Closed
Description: If active, closes the website and only logged in users will be able view it normaly.
Version: 0.2.5
Author: Oakwood Creative
Author URI: http://oakwood.se
License: GPL2
*/
function owc_plugin_site_closed() {
	if(!is_user_logged_in()){
		status_header('503');
		if(!locate_template('maintenance.php')){
			echo '<h1>' . __('Site Closed', 'owc_plugin_site_closed') . '</h1>';
		}
        else{
            get_template_part('maintenance');
        }
		die;
	}
}
add_action( 'send_headers', 'owc_plugin_site_closed', 0 );
?>