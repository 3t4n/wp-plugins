<?php 
/*
Plugin Name: Simple Page Title
Plugin URI:  https://wordpress.org/plugins/simple-page-title/
Description: Awsome plugin for change the page titte like pages, archieve, and single post types. you use the function 'simple_page_title();' and short code '[simple_page_title]'.
Version:     2.0
Author:      Saurabh Jain
Author URI:  http://saurabh.eu5.org/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

register_activation_hook( __FILE__, 'spt_activated' );
/*
 * the code that run after activate plugin.
 */ 

function spt_activated(){
   spt_addOption();
}

function spt_addOption(){
	add_option('spt_home','Home');
	add_option('spt_404','404');
	add_option('spt_search','Search');
	add_option('spt_blog','Blog');
	add_option('spt_category','Category'); 
	add_option('spt_tag','Tag');
	add_option('spt_blog_single','%postname%');
	add_option('spt_ele_name','h1');
	add_option('spt_ele_ID','%postID%');
	add_option('spt_ele_class','%postclass%');
	$args = array('public'=> true,'_builtin'=>false); 
	$output = 'names'; 
	$operator = 'and'; 
	$post_types = get_post_types( $args, $output, $operator ); 
	foreach ($post_types as $post_type) {
    	add_option('spta_'.$post_type.'', $post_type);
	    add_option('spts_'.$post_type.'', '%postname%'); 
	}
}

function spt_deleleOption(){
	delete_option('spt_home');
	delete_option('spt_404');
	delete_option('spt_search');
	delete_option('spt_blog');
	delete_option('spt_category');
	delete_option('spt_tag');
	delete_option('spt_blog_single');
	delete_option('spt_ele_name');
	delete_option('spt_ele_ID');
	delete_option('spt_ele_class');
	$args = array('public'=> true,'_builtin'=>false); 
	$output = 'names'; 
	$operator = 'and'; 
	$post_types = get_post_types( $args, $output, $operator ); 
	foreach ($post_types as $post_type) {
	  delete_option('spta_'.$post_type.'');
	  delete_option('spts_'.$post_type.''); 
	} 
}

// add mennu page option in admin menu.
require('include/add-mennu.php');

// page titles setting's start here..
require('include/page-titles.php');

/*
 * The code that runs during plugin deactivation.
 */
register_deactivation_hook( __FILE__, 'spt_deactivated' );
/*
 * the code that run after activate plugin.
 */

define('spt_plugin_url', plugins_url('/', __FILE__)  );

function spt_addScript() {
  wp_enqueue_style('custom_style', spt_plugin_url.'css/custom-style.css');
  wp_enqueue_script('custom_script', spt_plugin_url.'js/custom-page.js');
}

/*
 * Add Style and Script in admin section.. 
 */

add_action('admin_enqueue_scripts', 'spt_addScript');

function spt_deactivated(){
	spt_deleleOption();
}

?>