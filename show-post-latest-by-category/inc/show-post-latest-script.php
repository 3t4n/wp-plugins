<?php 
function tvc_splc_save_widget_style(){
	wp_enqueue_style('post-main-style', TVC_SPLC_PLUGIN_URL . '/css/main.css' );
}
add_action('wp_enqueue_scripts' , 'tvc_splc_save_widget_style');