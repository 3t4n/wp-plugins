<?php
/*
Plugin Name: Safer Email Link
Description: Adds a button to the TinyMCE to wrap an email address with a shortcode using the WordPress antispambot function. 
Version: 1.0
Author: Andrew Norcross
Author URI: http://andrewnorcross.com
*/

/*  Copyright 2011 Andrew Norcross

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; version 2 of the License (GPL v2) only.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// create and register button and javascript
add_filter('mce_external_plugins', 'sf_email_link_register');
add_filter('mce_buttons', 'sf_email_link_add_button', 0);
add_shortcode( 'sf_email', 'sf_email_shortcode' );


function sf_email_link_add_button($buttons) {
    array_push($buttons, 'separator', 'email_link_name');
    return $buttons;
}

function sf_email_link_register($plugin_array) {
	
	$sf_email_url = plugins_url( '/safer-email-link.js', __FILE__ );
    
	$plugin_array['email_link_name'] = $sf_email_url;
    return $plugin_array;
}

// Add shortcode function

function sf_email_shortcode( $atts, $content = null) {
	return '<a class="email-link" href="mailto:'.antispambot($content).'" title="Email" target="_blank">'.antispambot($content).'</a>';
		return $email_ssc;
}

