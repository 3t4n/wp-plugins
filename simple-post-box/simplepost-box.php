<?php
/**
 * @package SimplePostBox
 * @version 1.0
 */
/*
Plugin Name: Simple Post Box
Plugin URI: http://wordpress.org/extend/plugins/simple-post-box/
Description: Simple Post Box is a very easy plugin for WordPress which displays your recent 5 posts with a simple box. This plugin will be shown on the footer of your pages. Once you click the icon, a recent post will be shown. This is a jQuery and css based box.
Author: jandbond
Version: 1.0
Author URI: http://guspark.wordpress.com/
*/

if($wp_version >= '2.6.0') {
	$stimuli_simplepost_box_plugin_prefix = WP_PLUGIN_URL."/simple-post-box/"; /* plugins dir can be anywhere after WP2.6 */
} else {
	$stimuli_simplepost_box_plugin_prefix = get_bloginfo('wpurl')."/wp-content/plugins/simple-post-box/";
}

function simplepost_box_styles() {
	global $wp_version;
	global $stimuli_simplepost_box_plugin_prefix;
	$jh_pbox_styles_prefix = ($stimuli_simplepost_box_plugin_prefix."css/");
	wp_enqueue_style('simpostbox', $jh_pbox_styles_prefix.'simplepost-box-style.css', false, '1.0', 'all');
}

function showPost(){
	global $stimuli_simplepost_box_plugin_prefix;
	$jh_pbox_styles_prefix = ($stimuli_simplepost_box_plugin_prefix."img/");
	$myPost = new WP_Query();
	$myPost->query('posts_per_page=5');
	
	$pl_dbox_html = "
	<!-- begin simplepost box -->
	<img id=\"jh-imgpost\" src=\"$jh_pbox_styles_prefix"."stock_post.png\" width=\"30\" height=\"30\"/>
	
	<div id=\"jh-pbox\" >
		<div id=\"jh-pbox-content\">			
		<ul>
			";			
	while($myPost->have_posts()) : $myPost->the_post();
		$thetitle = the_title('','',false);
		$thepermalink = get_permalink();
		$pl_dbox_html .= "
					<li><a href=\"$thepermalink\" class=\"jh-pbox-post-title\">$thetitle</a></li>
				";				
	endwhile;	
	$pl_dbox_html .= "
			</ul>
		 </div>
		</div>
	<!-- end simplepost box -->
	";
	
	echo($pl_dbox_html);	
}

function inc_jquery() {
   wp_enqueue_script( 'jquery' );
}    

function simplepost_box_scripts(){
	global $wp_version;
	global $stimuli_simplepost_box_plugin_prefix;
	$jh_pbox_jscripts_prefix = ($stimuli_simplepost_box_plugin_prefix."js/");

	wp_register_script('jh-pboxjscript', $jh_pbox_jscripts_prefix.'simplepost-box-funcs.js');
	wp_enqueue_script('jh-pboxjscript');
}

add_action('get_header', 'simplepost_box_styles');
add_action('wp_enqueue_scripts', 'inc_jquery');
add_action('wp_enqueue_scripts', 'simplepost_box_scripts');
add_action( 'wp_footer', 'showPost' );
