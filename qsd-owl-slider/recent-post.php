<?php
/**
* plugin name:Recent Post Scroll Widget
*  description:Shwon your recent post with smoothly scrolling . to use it go to appearance->widget and set widget
* version:1.8
* Author: Quazi Sazzad
* Author URI: https://solverwp.com/
* plugin uri: https://solverwp.com/downloads/magazine-newspaper-template/
* Tested up to: 5.5
*License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * License: GPL2
 * Copyright 2016  quazi sazzad  (email : qsazzad21@gmail.com, skype:quazisazzad)
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
**/
?>
<?php
 
 if( !defined('ABSPATH') ){
	exit;
}



/**
 * Load plugin textdomain.
 */
add_action( 'plugins_loaded', 'Recent_post_scroll_textdomain' );

function Recent_post_scroll_textdomain() {
  load_plugin_textdomain( 'Rpc', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' ); 
}


require_once(plugin_dir_path(__FILE__).'/includes/Rpc_class.php');
require_once(plugin_dir_path(__FILE__).'/includes/rpc_script.php');

function widget_rpc(){
	register_widget('rpc_widget');
}
add_action('widgets_init','widget_rpc');