<?php
/*
Plugin Name: Cosmic History Quotes
Plugin URI: http://anthonyfogleman.com/blog/cosmic-history-quotes-wp-plugin/
Description: Inserts 365 daily quotes from the seven volume Cosmic History Chronicles.  It changes daily! Works in English, Spanish or Dutch. Very lightweight plugin. It has a widget you can drag into your sidebar, or you can insert the shortcode [cosmic-quotes] into any post, page or text widget.
Version: 2.3.1
Author: Anthony R. Fogleman
Author URI: http://anthonyfogleman.com
License: GPLv2
*/

/*  Copyright 2013  Anthony R. Fogleman  ( circle@uptimehosting.com )

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


/* Add a widget to the dashboard.
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */

// Include dashboard widget
include('chq_dashboard_widget.php');

// This code creates the ability to use shortcodes in the sidebar
add_filter('widget_text', 'do_shortcode');  

// Include output
include('chron_output.inc');

// This code creates the ability to use shortcodes in the sidebar
add_shortcode('cosmic-quotes', 'start_chron');  // called from page with: [chronicles default_lang="en"]

// Include wp menu and settings file
include('settings.inc');

// create custom plugin settings menu
add_action('admin_menu', 'chq_create_menu');

// This code puts a Settings link on the admin plugins listing page
function plugin_add_settings_link( $links ) {
    $settings_link = '<a href="options-general.php?page=cosmic-history-quotes/settings.inc">Settings</a>';
  	array_push( $links, $settings_link );
  	return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'plugin_add_settings_link' );

/* EOF */