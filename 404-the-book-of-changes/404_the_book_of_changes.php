<?php 
/*
Plugin Name: 404 The Book of Changes
Plugin URI: https://socpravo.ru/en-404-i-ching/
Version: 1.4
Description: Plugin «404 The Book of Changes» is a selection of 8 out of the 64 points in the random number generator. Every choice is unique, each field is unique, each result is unique. The result of a choice is a small piece of text from a very ancient treatise «The Book of Changes» (using the link at the beginning of the text you can read further).
Author: sciffuld and kenny5660
Author URI: https://socpravo.ru/
License: GPL2
Text Domain: wp-404tboc-page
Domain Path: /languages

*/
/*  Copyright 2016  sciffuld and kenny5660  (email: socpravo.ru@gmail.com)

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
defined('ABSPATH') or die('No script kiddies please!'); 
function content_404tboc_page(){
	ob_start();
    include(__DIR__ .'/content_wp-404-page.php');
    $outputss = ob_get_contents();
    ob_end_clean();   

    return $outputss;  
}
add_shortcode('page404tboc', 'content_404tboc_page');

add_action('admin_menu','register_options_404tboc',103);
function register_options_404tboc(){ 
//add_menu_page('Страница 404', 'Страница 404', 'manage_options', 'options_404', 'options_404_callback','dashicons-exerpt-view', 104.23 );
add_options_page( __('404 The Book of Changes (I Ching)','wp-404tboc-page'),__('404 The Book of Changes (I Ching)','wp-404tboc-page'),  'manage_options', 'options_404tboc', 'options_404tboc_callback' );
}
 function options_404tboc_callback(){
	 include(__DIR__ .'/admin-wp-404-page.php');
 }
 
 function pageRedirect404tboc(){
	if(is_404() && get_option('is-page-404tboc') =='1'){
		wp_redirect( get_permalink(get_option('page-404tboc')) );
		exit();
	}
}
add_action( 'template_redirect', 'pageRedirect404tboc' );
 
  add_action('wp_ajax_random_text_wp_404tboc', 'random_text_wp_404tboc_callback');
 add_action('wp_ajax_nopriv_random_text_wp_404tboc', 'random_text_wp_404tboc_callback');
function random_text_wp_404tboc_callback() {
	include(__DIR__ ."/random-text-wp-404-page.php"); 
wp_die();
    
}
 add_action('wp_ajax_restart_404tboc', 'wp_ajax_restart_404tboc_callback');
 add_action('wp_ajax_nopriv_restart_404tboc', 'wp_ajax_restart_404tboc_callback');
function wp_ajax_restart_404tboc_callback() {
$restart = true;
      include(__DIR__ .'/content_wp-404-page.php');
wp_die();

}
add_action('plugins_loaded', 'plagin404tboc_init');
function plagin404tboc_init(){
load_textdomain('wp-404tboc-page',__DIR__ ."/languages/wp-404-page-".get_locale().'.mo'); 
}
// Код активации ...
function Plugin404tboc_activate(){
	load_textdomain('wp-404tboc-page',__DIR__ ."/languages/wp-404-page-".get_locale().'.mo'); 
	$defaults = array(
	'post_title'    => __('Page not found - Error 404','wp-404tboc-page'),
	 'post_content'  => '[page404tboc]',
	'post_status'   => 'publish',
	'post_type'     => 'page',
	'post_author'   => $user_ID,
	'ping_status'   => get_option('default_ping_status'),
	'post_parent'   => 0,
	'menu_order'    => 0,
	'to_ping'       => '',
	'pinged'        => '',
	'post_password' => '',
	'guid'          => '',
	'post_content_filtered' => '',
	'post_excerpt'  => '',
	'import_id'     => 0
);
$post_id = wp_insert_post( $defaults );
add_option( 'startText404tboc','<h2 style="text-align: center;">'.__('The page you are looking for doesn`t exist.','wp-404tboc-page').'</h2>
<h2 style="text-align: center;"><img class="aligncenter size-full wp-image-1713" src="'.plugins_url("/start-logo404.gif", __FILE__).'" alt="3" width="333" height="333" /></h2>
<h3 style="text-align: center;"><span style="color: #141412;"><span style="font-family: "Source Sans Pro", Helvetica, sans-serif;"><span style="font-size: medium;">'.__('Could it be just a mistake or the Destiny that has brought you here? Have you ever heard of The Book of Changes (I Ching)?','wp-404tboc-page'). 
'<a href="https://ru.wikipedia.org/wiki/%D0%9A%D0%BD%D0%B8%D0%B3%D0%B0_%D0%9F%D0%B5%D1%80%D0%B5%D0%BC%D0%B5%D0%BD" target="_blank" rel="nofollow">'.__('You are free to read about it carefully. But could the Destiny have brought you here just for reading? Ask yourself a Question and listen to the Destiny`s answer.','wp-404tboc-page').'</a></span></span></span></h3>','wp-404tboc-page');
	add_option('text-button-main404tboc', __('I have no questions (Home page)','wp-404tboc-page'));
	add_option('text-button-continue404tboc', __('Read Answer','wp-404tboc-page'));
	add_option('text-button-restart404tboc', __('Are there any other questions?','wp-404tboc-page'));
	add_option('page-404tboc', $post_id);
	add_option('is-page-404tboc','1');
	add_option('is-text-button-restart404tboc','1');
	add_option('is-text-support404tboc','1');
	add_option('skin-404tboc', "skin1");
}
register_activation_hook( __FILE__,'Plugin404tboc_activate');
?>