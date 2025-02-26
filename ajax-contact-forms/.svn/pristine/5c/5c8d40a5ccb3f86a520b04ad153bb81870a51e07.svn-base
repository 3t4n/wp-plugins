<?php
add_action('wp_head', 'acfw30_script');
function acfw30_script() {
	wp_register_script('acfw30-phone-mask', plugins_url('js/phone-mask.js', __FILE__));
	wp_enqueue_script('acfw30-phone-mask' );

	$acfw30_script_file = plugin_dir_path( __FILE__ ).'js/custom-script.js';

	if (file_exists($acfw30_script_file)) {
		wp_register_script('acfw30-custom-script', plugins_url('js/custom-script.js', __FILE__));
		wp_enqueue_script('acfw30-custom-script');
	} else {
		wp_register_script('acfw30-script', plugins_url('js/script.js', __FILE__));
		wp_enqueue_script('acfw30-script');
	}
	
	wp_localize_script('acfw30-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}


add_action('wp_enqueue_scripts', 'acfw30_style');
function acfw30_style() {
	$acfw30_style_file = plugin_dir_path( __FILE__ ).'css/custom-style.css';

	if (file_exists($acfw30_style_file)) {
	   	wp_register_style('acfw30-custom-style', plugins_url('css/custom-style.css', __FILE__), false, false, 'all');
	   	wp_enqueue_style('acfw30-custom-style');
	} else {
	    wp_register_style('acfw30-style', plugins_url('css/style.css', __FILE__), false, false, 'all');
	    wp_enqueue_style('acfw30-style');
	}

	wp_register_style('font-awesome', plugins_url('css/font-awesome.css', __FILE__), false, false, 'all');
	wp_enqueue_style('font-awesome');
	wp_register_style('acfw30-animate', plugins_url('css/ak86_animate.css', __FILE__), false, false, 'all');
	wp_enqueue_style('acfw30-animate');
}

add_action('admin_enqueue_scripts', 'acfw30_admin_style');
function acfw30_admin_style($admin_page){
	$acfw30_post_type = get_post_type();

	if($acfw30_post_type == 'acfw30_forms'){
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_style('wp-color-picker');
		wp_register_script('acfw30_admin_script', plugins_url('js/admin-script.js', __FILE__));
		wp_enqueue_script('acfw30_admin_script');

		wp_register_style('acfw30_admin_style', plugins_url('css/admin-style.css', __FILE__));
		wp_enqueue_style('acfw30_admin_style');

		wp_register_style('font-awesome', plugins_url('css/font-awesome.css', __FILE__), false, false, 'all');
		wp_enqueue_style('font-awesome');
	}

	if('widgets.php' == $admin_page){
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_style('wp-color-picker');
		
		wp_register_script('acfw30_widget_script', plugins_url('js/widget-script.js', __FILE__));
		wp_enqueue_script('acfw30_widget_script');

		wp_register_style('font-awesome', plugins_url('css/font-awesome.css', __FILE__), false, false, 'all');
		wp_enqueue_style('font-awesome');

	}
}
?>