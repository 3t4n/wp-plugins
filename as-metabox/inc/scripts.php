<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 

if (!function_exists('as_metabox_enqueue_scription')) {
	function as_metabox_enqueue_scription(){
		global $pagenow;

		if ($pagenow == 'post.php') {
			wp_enqueue_style( 'as_font_awesome_css', as_root_metabox_url.'/assets/css/font-awesome.min.css' );
			wp_enqueue_style( 'as_jquery_ui_css', as_root_metabox_url.'/assets/css/jquery-ui.min.css' );
			wp_enqueue_style( 'as_animate_css', as_root_metabox_url.'/assets/css/animate.css' );
			wp_enqueue_style( 'as_main_css', as_root_metabox_url.'/assets/css/as_main.css' );

			wp_register_script( 'as_main_js', as_root_metabox_url.'/assets/js/as_main.js', 'jquery', 1.0, true );

		    wp_localize_script( 'as_main_js', 'as_meta_local',
		        array( 
		            'nonce_local' => wp_create_nonce( 'as_metabox_for_ajax' ),
		        )
		    );

			wp_enqueue_script('jquery');

			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script('wp-color-picker');

			wp_enqueue_script( 'jquery-ui-datepicker' );
			wp_enqueue_script('jquery-ui-accordion');
			wp_enqueue_script('jquery-ui-accordion');
			wp_enqueue_script('jquery-ui-dialog');

			wp_enqueue_script('as_tabulous_js');
			wp_enqueue_script('as_main_js');
		}

	}

	add_action('admin_enqueue_scripts','as_metabox_enqueue_scription');
}
