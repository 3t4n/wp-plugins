<?php
/*
Plugin Name: Advanced Custom CSS
Plugin URI: http://prasadkirpekar.com/advanced-custom-css
Version: 1.1.0
Author: Prasad Kirpekar
Author URI: http://prasadkirpekar.com
Description: Add Custom CSS to your WordPress site. Easy and Flexible.
License: GPL v2
Copyright: Prasad Kirpekar

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

function acc_reg_scripts(){
	wp_register_script( 'md_script',plugin_dir_url(__FILE__).'include/materialize/materialize.min.js' );
	wp_register_script( 'cm_script',plugin_dir_url(__FILE__).'include/codemirror/codemirror.js' );
	wp_register_script('cm_lang',plugin_dir_url(__FILE__).'include/codemirror/css.js' );	
	wp_register_script( 'cm_init',plugin_dir_url(__FILE__).'include/codemirror/cm_init.js' );	
	wp_register_script( 'cm_ar',plugin_dir_url(__FILE__).'include/codemirror/autorefresh.js' );	
}
function acc_enqueue_scripts(){
	wp_enqueue_script('md_script');
	wp_enqueue_script('cm_script');
	wp_enqueue_script('cm_lang');
	wp_enqueue_script('cm_init');
	wp_enqueue_script('cm_ar');
	wp_enqueue_style('md_style',plugin_dir_url(__FILE__).'include/materialize/materialize.min.css');
	wp_enqueue_style('cm_style',plugin_dir_url(__FILE__).'include/codemirror/codemirror.css');
	wp_enqueue_style('cm_theme',plugin_dir_url(__FILE__).'include/codemirror/dracula.css');
	wp_enqueue_style('acc_css',plugin_dir_url(__FILE__).'include/acc.css');
}
function acc_init(){
	$css_everywhere="/*CSS added here will be included everywhere on site. You can use this option to set global CSS rules for your website.*/";
	$css_posts="/*CSS added here will be included on single posts on site.*/";
	$css_pages="/*CSS added here will be included on single page on site.*/";
	add_option("acc_css_everywhere",$css_everywhere);
	add_option("acc_css_posts",$css_posts);
	add_option("acc_css_pages",$css_pages);
}
function acc_option_page(){
	$page=add_theme_page("Advanced Custom CSS","Advanced Custom CSS","edit_theme_options","advanced-custom-css","acc_options");
	 add_action('admin_print_scripts-' . $page, 'acc_enqueue_scripts');
}
function acc_options(){
	include('include/csstidy/class.csstidy.php');
	$csstidy = new csstidy();
	$csstidy->set_cfg( 'remove_bslash',              false );
	$csstidy->set_cfg( 'compress_colors',            false );
	$csstidy->set_cfg( 'compress_font-weight',       false );
	$csstidy->set_cfg( 'optimise_shorthands',        0 );
	$csstidy->set_cfg( 'remove_last_;',              false );
	$csstidy->set_cfg( 'case_properties',            false );
	$csstidy->set_cfg( 'css_level',                  'CSS3.0' );
	$csstidy->set_cfg( 'preserve_css',               true );
	
	if(isset($_POST['everywhere_css'])&&check_admin_referer( 'acc_nonce_everywhere', 'acc_nonce_field_everywhere' )){
		$css=sanitize_textarea_field($_POST['everywhere_css']);
		$csstidy->parse( $css );
		$css = $csstidy->print->plain();
		update_option("acc_css_everywhere",$css);
		echo '<div class="updated fade"><p>Global CSS Saved! </p></div>';
	}
	if(isset($_POST['posts_css'])&&check_admin_referer( 'acc_nonce_posts', 'acc_nonce_field_posts' )){
		$css=sanitize_textarea_field($_POST['posts_css']);
		$csstidy->parse( $css );
		$css = $csstidy->print->plain();
		update_option("acc_css_posts",$css);
		echo '<div class="updated fade"><p>Post CSS Saved! </p></div>';
	
	}
	if(isset($_POST['pages_css'])&&check_admin_referer( 'acc_nonce_pages', 'acc_nonce_field_pages' )){
		$css=sanitize_textarea_field($_POST['pages_css']);
		$csstidy->parse( $css );
		$css = $csstidy->print->plain();
		update_option("acc_css_pages",$css);
		echo '<div class="updated fade"><p>Page CSS Saved! </p></div>';
	
	}
	echo include_once 'admin/acc-options.php';
}
function acc_place_css(){
	echo "<style>/*CSS added by Advanced Custom CSS Plugin*/".get_option('acc_css_everywhere')."</style>";
	global $post;
		if (is_single()&&get_post_type($post) == 'post'){
			echo "<style>/*CSS added by Advanced Custom CSS Plugin*/".get_option('acc_css_posts')."</style>";
		}
		elseif(get_post_type($post)=='page'){
			echo "<style>/*CSS added by Advanced Custom CSS Plugin*/".get_option('acc_css_pages')."</style>";
		}
}
register_activation_hook(__FILE__, 'acc_init');
add_action('admin_menu','acc_option_page');
add_action('admin_init','acc_reg_scripts');
add_action('wp_head','acc_place_css');
?>