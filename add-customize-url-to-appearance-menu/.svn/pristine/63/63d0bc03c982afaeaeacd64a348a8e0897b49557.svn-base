<?php
/*
Plugin Name: Add Customize URL to Appearance Menu
Plugin URI: http://tiagonoronha.com/plugins/add-customize-url-appearance-menu
Version: 0.1
Description: Adds a shortcut link to the Customize page in the Appearance menu.
Author: tiagonoronha.com
Tested up to: 3.6
Author URI: http://tiagonoronha.com
Text Domain: add-customize-url
Domain Path: /languages/

	License: GNU General Public License v3.0
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

load_plugin_textdomain( 'add-customize-url', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

add_action( 'admin_menu' , 'admin_add_customize_link' );
function admin_add_customize_link() {
    global $submenu;
    $key = end( array_keys( $submenu['themes.php'] ) ) + 1;
    $submenu['themes.php'][$key++] = array( __('Customize', 'add-customize-url'), 'edit_theme_options' , wp_customize_url() ); 
}