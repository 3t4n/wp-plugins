<?php
/**
 * @package    oneto-companion
 */

require oneto_companion_plugin_dir . 'inc/oneto/customizer/extra-oneto-customizer.php';
require oneto_companion_plugin_dir . 'inc/oneto/customizer/extra-oneto-customizer-options.php';
require oneto_companion_plugin_dir . 'inc/oneto/customizer/extra-oneto-customizer-default.php';
if($activate_theme == 'Oneto'){
require oneto_companion_plugin_dir .  '/inc/oneto/customizer/customizer-page-editor/class/class-oneto-page-editor.php';
}
if ( ! function_exists( 'onetocompanion_oneto_frontpage_sections' ) ) :
	function onetocompanion_oneto_frontpage_sections() {
		// Services
	$activate_theme_data = wp_get_theme(); // getting current theme data
	$activate_theme = $activate_theme_data->name;		
		require oneto_companion_plugin_dir . 'inc/oneto/front-page/extra-oneto-slider.php';
		require oneto_companion_plugin_dir . 'inc/oneto/front-page/extra-oneto-client.php';
		require oneto_companion_plugin_dir . 'inc/oneto/front-page/extra-oneto-feature.php';
		if('Oneto' == $activate_theme) {
		require oneto_companion_plugin_dir . 'inc/oneto/front-page/extra-oneto-testimonial.php';
		}		
		require oneto_companion_plugin_dir . 'inc/oneto/front-page/extra-oneto-blog.php';
		require oneto_companion_plugin_dir . 'inc/oneto/front-page/extra-oneto-cta.php';
    }
	add_action( 'onetocompanion_oneto_frontpage', 'onetocompanion_oneto_frontpage_sections' );
endif;

if ( ! function_exists( 'onetocompanion_oneto_top_header_section' ) ) :
	function onetocompanion_oneto_top_header_section() {
        require oneto_companion_plugin_dir . 'inc/oneto/front-page/extra-oneto-top-header.php';	
    }
	add_action( 'onetocompanion_oneto_top_header', 'onetocompanion_oneto_top_header_section' );
endif;

function onetocompanion_oneto_enqueue_scripts() {
	wp_enqueue_style('animate',oneto_companion_plugin_url .'inc/oneto/assets/css/animate.css');
	wp_enqueue_style('owl-carousel-min',oneto_companion_plugin_url .'inc/oneto/assets/css/owl.carousel.min.css');
	wp_enqueue_style('oneto-css',oneto_companion_plugin_url .'inc/oneto/assets/css/oneto.css');
	wp_enqueue_script( 'owl-carousel', oneto_companion_plugin_url . 'inc/oneto/assets/js/owl.carousel.min.js', array('jquery'), false, true);
	wp_enqueue_script( 'oneto-custom', oneto_companion_plugin_url . 'inc/oneto/assets/js/custom.js', array('jquery'), false, true);
}
add_action( 'wp_enqueue_scripts', 'onetocompanion_oneto_enqueue_scripts' );