<?php 
/*
 * Enqueue Scrollbar Style & JS
 * @author nasir2015
 */
 
/*===============================================
    Enqueue latest jQuery & required css files
=================================================*/
function nnf_scrollbar_files(){
wp_enqueue_script('jquery');
wp_enqueue_script('scrollbar-min-js',plugins_url('/../assets/js/jquery.nicescroll.min.js',__FILE__), array('jquery'), '3.6.6',false);	
}
add_action('wp_enqueue_scripts' , 'nnf_scrollbar_files');	
add_action('admin_enqueue_scripts' , 'nnf_scrollbar_files');


/*===============================================
	Enqueue Admin only stylesheet & jQuery
=================================================*/
function nnf_scrollbar_color_pickr_function( $hook ){
	if(is_admin()){
	// first check that $hook_suffix is appropriate for your admin page
	wp_enqueue_style('wp-color-picker');
	wp_enqueue_script('scrollbar-custom-script', plugins_url('/../assets/js/colorpicker.js',__FILE__), array('wp-color-picker'), false,true);
	}
}
add_action('admin_enqueue_scripts', 'nnf_scrollbar_color_pickr_function');
?>