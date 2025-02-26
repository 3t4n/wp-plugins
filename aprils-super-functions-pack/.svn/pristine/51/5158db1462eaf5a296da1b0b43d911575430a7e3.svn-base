<?php
/*
Plugin Name: April's Super Functions Pack
Plugin URI: http://springthistle.com/wordpress/plugin_functionspack/
Description: Lots of useful shortcodes, some functions, some javascript etc. See the <a href="tools.php?page=aprils-super-functions-pack/aprils-super-functions-pack.php">Shortcode Instructions</a> and <a href="tools.php?page=aprils-super-functions-pack/aprils-super-functions-pack.php&type=settings">Settings</a>.
Author: Aaron Hodge Silver
Version: 1.4.8
Author URI: http://springthistle.com/

** Copyright 2014  Aaron Hodge Silver **

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

Changelog:
1.0 - 2011-04-14 - Creation
1.1 - 2011-04-28 - Released
1.2 - 2011-04-30 - Optionionated
1.3 - 2011-06-01 - Lots of little enhancements
1.4 - 2011-11-11 - Added facebook meta tags

Future to-do list:
* Turn sub-pages template function into an actual widget
* Clean up asfp_getimage() to be more flexible

*/


/*
 * INCLUDE OTHER PHP FILES AND ALSO JAVASCRIPT * * * * * * * * * * * * * * * * * *
 */

$filepath = WP_PLUGIN_DIR.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
$urlpath = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));

/* TEMPLATE & OTHER FUNCTIONS */
require_once ($filepath.'/lib/template_funcs.php');

/* WIDGETS */
require_once ($filepath.'/lib/asfpwidgets.php');

/* SHORTCODES */
require_once ($filepath.'/lib/shortcodes/shortcodes.php');
require_once ($filepath.'/lib/shortcodes/buttons.php');
require_once ($filepath.'/lib/shortcodes/columns.php');
require_once ($filepath.'/lib/shortcodes/icons.php');

/* JAVASCRIPT */
function asfp_init_method() {
	global $urlpath;
    if (!is_admin()) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('ahshead',$urlpath.'js/jquery.ahshead.js','jquery');
		if (get_option('asfp_tabsjs')!=1) wp_enqueue_script('tabs',$urlpath.'js/jquery.asfp.tabs.js','jquery');
		if (get_option('asfp_tabsjs')!=1)wp_enqueue_script('ahsfoot',$urlpath.'js/jquery.ahsfoot.js','jquery',null,true);
		if (get_option('asfp_sfjs')==1) wp_enqueue_script('ahssf',$urlpath.'js/jquery.suckerfish.js','jquery');
		if (get_option('asfp_cformsjs')==1) wp_enqueue_script('ahscf',$urlpath.'js/jquery.ahscform.js','jquery');
		wp_register_style('asfp_shortcodes',plugins_url('shortcodes.css', __FILE__));
		wp_register_style('asfp_dynamic',plugins_url('style.php', __FILE__));
		wp_enqueue_style('asfp_shortcodes');
		wp_enqueue_style('asfp_dynamic');
    }
}    
add_action('init', 'asfp_init_method');

function asfp_headstuff() {
	if (!is_admin() && get_option('asfp_fbmeta')==1) {
		echo "\n<!-- April's Super Function Pack : BEGIN -->\n";
		asfp_fb_to_head();
		echo "<!-- April's Super Function Pack : END -->\n\n";
	}
}
add_action('wp_head', 'asfp_headstuff');

function asfp_footstuff() {
	global $urlpath;
	echo "\n<!-- April's Super Function Pack : BEGIN -->\n";
	echo '<script type="text/javascript">'."\n";
	if (get_option('asfp_titlejs')==1) echo "jQuery('#menu').find('a').attr({ title: '' });"."\n";
	echo '</script>'."\n";
	echo "<!-- April's Super Function Pack : END -->\n\n";
}
add_action('wp_footer', 'asfp_footstuff');

/* ADDITIONAL FEATURES */
if (get_option('asfp_doctypes')==1) add_filter('the_content', 'asfp_doctypes_regex', 9);

// DO SHORTCODES AT SIDEBARS
add_filter('widget_text', 'do_shortcode');
// AUTOMATIC RSS FEED
add_theme_support( 'automatic-feed-links' );
// IMAGES SUPPORT
add_theme_support( 'post-thumbnails' );


/*
 * INCLUDE AND ADD EXPLANATORY/HELP PAGE TO MENU * * * * * * * * * * * * * * * * * *
 */

function print_howto_page() {
	global $filepath;
	include($filepath.'readme.php');
}
// adds our new option page to the admin menu
function modify_menu_for_asfp() {
	add_submenu_page(
		'tools.php',
		"April's Super Functions Pack",	// Page <title>
		"Super Functions Pack", // Menu title
		7,				// What level of user
		__FILE__,            //File to open
		'print_howto_page'  //Function to call
		);  
}
add_action('admin_menu','modify_menu_for_asfp');

/*
 * CREATE AND SAVE COLUMN WIDTH OPTIONS * * * * * * * * * * * * * * * * * * * * * *
 */

function asfp_init(){
    if(function_exists('register_setting')){
        register_setting('asfp-options', 'asfp_pagewidth');
        register_setting('asfp-options', 'asfp_cformsjs');
        register_setting('asfp-options', 'asfp_sfjs');
        register_setting('asfp-options', 'asfp_doctypes');
        register_setting('asfp-options', 'asfp_doctypes_list');
        register_setting('asfp-options', 'asfp_titlejs');
        register_setting('asfp-options', 'asfp_fbmeta');
        register_setting('asfp-options', 'asfp_fbmeta_img');
        register_setting('asfp-options', 'asfp_tabsjs');
    }
}
add_action('admin_init', 'asfp_init');

// Set the default options when the plugin is activated
function asfp_activate(){
    add_option('asfp_pagewidth', '845');
    add_option('asfp_cformsjs', '0');
    add_option('asfp_sfjs', '0');
    add_option('asfp_doctypes', '0');
    add_option('asfp_doctypes_list', 'pdf,mp3,zip,doc,xls,ppt,odt,ods,odp,odg,rtf,txt,mov');
    add_option('asfp_titlejs', '0');
    add_option('asfp_fbmeta', '0');
    add_option('asfp_fbmeta_img', '');
    add_option('asfp_tabsjs', '0');
}

register_activation_hook( __FILE__, 'asfp_activate');


?>