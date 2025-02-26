<?php 

/**
 * Enqueue Scripts
 */

add_action('wp_enqueue_scripts', 'cyberslider_enqueue_scripts');
add_action('admin_enqueue_scripts', 'cyberslider_enqueue_admin');

function cyberslider_enqueue_scripts() {

	// Include in the footer?
	$footer = get_option('cs_include_at_footer', false) ? true : false;

	// Use Gogole CDN version of jQuery
	$global_options = get_option('cs_global_settings',true);
	$global_options = parse_str($global_options, $global_options);
	if($global_options['use_cdn']=='on') {
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', array(), '1.8.3');
	}

	// Register Cyber Slider resources
	wp_enqueue_script('slick-js', CS_ROOT_URL.'/assets/js/frontend/slick.min.js', array('jquery'), CS_PLUGIN_VERSION, TRUE );
	wp_enqueue_style('slick-css', CS_ROOT_URL.'/assets/css/frontend/slick.css', false, CS_PLUGIN_VERSION );
	wp_enqueue_style('slick-theme', CS_ROOT_URL.'/assets/css/frontend/slick-theme.css', false, CS_PLUGIN_VERSION );
	wp_enqueue_style('cyber-animation', CS_ROOT_URL.'/assets/css/frontend/cyber-text-animation.css', false, CS_PLUGIN_VERSION );

	//Cyber Slider JS & CSS
	wp_enqueue_script('cyber-slider', CS_ROOT_URL.'/assets/js/frontend/cyber_slider.js', array('jquery'), CS_PLUGIN_VERSION, TRUE );
	wp_enqueue_style('cyber-slider-css', CS_ROOT_URL.'/assets/css/frontend/cyber_slider.css', false, CS_PLUGIN_VERSION );

	//slider animation
	wp_enqueue_script('cyber-slider-animations', CS_ROOT_URL.'/assets/js/frontend/cyber-slider-animations.js', array('jquery'), CS_PLUGIN_VERSION, TRUE );
	wp_enqueue_style('responsive-css', CS_ROOT_URL.'/assets/css/frontend/responsive.css', false, CS_PLUGIN_VERSION );

}




function cyberslider_enqueue_admin() {

		// Load default WP resources
		wp_enqueue_script('jquery');
		wp_enqueue_script('thickbox');
		wp_enqueue_style('thickbox');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-ui-draggable');
		wp_enqueue_script('jquery-ui-core');
 		wp_enqueue_script('jquery-ui-dialog');
		wp_enqueue_script('jquery-ui-slider');
		wp_enqueue_script('wp-pointer');
		wp_enqueue_style('wp-pointer');

		// LayerSlider admin includes
		wp_enqueue_script('admin-js', CS_ROOT_URL.'/assets/js/backend/admin.js', array('jquery'), CS_PLUGIN_VERSION );
		wp_enqueue_style('admin-css', CS_ROOT_URL.'/assets/css/backend/admin.css', false, CS_PLUGIN_VERSION );
		wp_enqueue_style('global-css', CS_ROOT_URL.'/assets/css/backend/global.css', false, CS_PLUGIN_VERSION );
		wp_enqueue_style('jquery-dialog-ui-css','https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css');
		wp_register_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array('jquery'), NULL, false );
    	wp_register_style( 'bootstrap-css', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css', false, NULL );
		wp_enqueue_script('slick-js', CS_ROOT_URL.'/assets/js/frontend/slick.min.js', array('jquery'), CS_PLUGIN_VERSION, TRUE );
		wp_enqueue_style('slick-css', CS_ROOT_URL.'/assets/css/frontend/slick.css', false, CS_PLUGIN_VERSION );
		wp_enqueue_style('slick-theme', CS_ROOT_URL.'/assets/css/frontend/slick-theme.css', false, CS_PLUGIN_VERSION );
		wp_enqueue_style('cyber-animation', CS_ROOT_URL.'/assets/css/frontend/cyber-text-animation.css', false, CS_PLUGIN_VERSION );
		
		wp_enqueue_script( 'bootstrap-js' );
    	wp_enqueue_style( 'bootstrap-css' );

    	//Cyber Slider JS & CSS
 		wp_enqueue_script('cyber-slider', CS_ROOT_URL.'/assets/js/frontend/cyber_slider.js', array('jquery'), CS_PLUGIN_VERSION, TRUE );
 		wp_enqueue_script('tiny-color', '//cdnjs.cloudflare.com/ajax/libs/tinycolor/0.11.1/tinycolor.min.js', array('jquery'), CS_PLUGIN_VERSION, NULL );
 		wp_enqueue_script('cyber-color-picker-js', CS_ROOT_URL.'/assets/js/backend/bootstrap.colorpickersliders.js', array('jquery'), CS_PLUGIN_VERSION, NULL );
 		wp_enqueue_script('cyber-color-picker-nocielch', CS_ROOT_URL.'/assets/js/backend/bootstrap.colorpickersliders.nocielch.min.js', array('jquery'), CS_PLUGIN_VERSION, NULL );
 		wp_enqueue_style('cyber-slider-css', CS_ROOT_URL.'/assets/css/frontend/cyber_slider.css', false, CS_PLUGIN_VERSION );
		//slider animation
		wp_enqueue_script('cyber-slider-animations', CS_ROOT_URL.'/assets/js/frontend/cyber-slider-animations.js', array('jquery'), CS_PLUGIN_VERSION, TRUE );
		wp_enqueue_style('cyber-color-picker', CS_ROOT_URL.'/assets/css/backend/bootstrap.colorpickersliders.min.css', false, CS_PLUGIN_VERSION );
		wp_enqueue_style('responsive-css', CS_ROOT_URL.'/assets/css/frontend/responsive.css', false, CS_PLUGIN_VERSION );
	}