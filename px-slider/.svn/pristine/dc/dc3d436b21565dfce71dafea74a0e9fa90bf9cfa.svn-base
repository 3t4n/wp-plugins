<?php
// PXSLIDER REQUIRED SCRIPTS 
add_action('admin_init', 'px_admin_scripts');
add_action('wp_enqueue_scripts', 'px_front_scripts');
function px_admin_scripts(){
	if(is_admin()){
		if(isset($_REQUEST['page']) && $_REQUEST['page']=='pxslider'){
			wp_register_style('px_admin-css',plugins_url('inc/admin/css/px_admin.css',__FILE__),false, '1.0.0');
			wp_enqueue_style('px_admin-css');
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
			wp_enqueue_style('thickbox');	
			wp_enqueue_script('px_admin-js',plugins_url('inc/admin/js/px_admin.js',__FILE__),false, '1.0.0');
			wp_enqueue_script('px_admin-js');
		}
	}
}
function px_front_scripts(){	
	if(!is_admin()){
		wp_enqueue_script('jquery');
		wp_register_script('px_front-js',plugins_url('inc/front/js/pxslider.js',__FILE__), array('jquery'));
		wp_enqueue_script('px_front-js');
		wp_register_script('easing-js',plugins_url('inc/front/js/jquery.easing.1.3.js',__FILE__), array('jquery'));
		wp_enqueue_script('easing-js');
		wp_register_style('px_front-css',plugins_url('inc/front/css/pxslider.css',__FILE__));
		wp_enqueue_style('px_front-css');
	}
}
?>