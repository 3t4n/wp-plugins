<?php
/*
Plugin Name: PPM Testimonial
Plugin URI: http://perfectpointmarketing.com/plugins/ppm-Testimonial
Description: This plugin will add fade in out testimonials via shortcode in page or post.
Author: Perfect Point Marketing
Author URI: http://perfectpointmarketing.com
Version: 1.1
*/


/*Some Set-up*/
define('PPM_TM_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );


/* Adding Latest jQuery from Wordpress */
function ppm_testimonial_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'ppm_testimonial_latest_jquery');

/* Adding plugin javascript active file */
wp_enqueue_script('ppm-tm-plugin-main-active', PPM_TM_PLUGIN_PATH.'js/jquery.quote_rotator.js', array('jquery'));
/* Adding plugin javascript active file */
wp_enqueue_script('ppm-tm-plugin-script-active', PPM_TM_PLUGIN_PATH.'js/ppm-tm-active.js', array('jquery'));

/* Adding Plugin custm CSS file */
wp_enqueue_style('ppm-tm-plugin-style', PPM_TM_PLUGIN_PATH.'css/ppm-testimonial-plugin-style.css');



/* Add Slider Shortcode Button on Post Visual Editor */
function ppmtestimonial_button_function() {
	add_filter ("mce_external_plugins", "ppmtestimonial_button_js");
	add_filter ("mce_buttons", "ppmtestimonial_button");
}

function ppmtestimonial_button_js($plugin_array) {
	$plugin_array['ppmtestimonials'] = plugins_url('js/custom-button.js', __FILE__);
	return $plugin_array;
}

function ppmtestimonial_button($buttons) {
	array_push ($buttons, 'ppmtestimonials');
	return $buttons;
}
add_action ('init', 'ppmtestimonial_button_function'); 


/*Files to Include*/
require_once('testimonial-type.php');

/* Testimonial Loop */
function ppm_get_testimonial(){
	$ppmtestimonial= '<ul id="ppm_quotes">';
	query_posts('post_type=ppm-testimonial&posts_per_page=-1');
	if (have_posts()) : while (have_posts()) : the_post(); 
		$testimonialauthor= get_the_title(); 
		$testimonialcontent= get_the_content(); 
		$ppmtestimonial.='<li><blockquote>'.$testimonialcontent.'</blockquote><cite>&mdash;'.$testimonialauthor.'</cite></li>';		
	endwhile; endif; wp_reset_query();
	$ppmtestimonial.= '</ul>';
	return $ppmtestimonial;
}


/**add the shortcode for the Testimonial- for use in editor**/
function ppm_insert_testimonial($atts, $content=null){
	$ppmtestimonial= ppm_get_testimonial();
	return $ppmtestimonial;
}
add_shortcode('ppm_testimonial', 'ppm_insert_testimonial');

/**add template tag- for use in themes**/
function ppm_testimonial(){
	print ppm_get_testimonial();
}
?>