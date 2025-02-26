<?php
function mith_arcl_load_custom_rating_scripts() {
	
	wp_register_style('bootstrap_css', plugin_dir_url(__FILE__) . '../assets/bootstrap/css/bootstrap.min.css', false , '1.0.0');
	wp_enqueue_style( 'bootstrap_css' );
	
	wp_register_style('font_awesome_css', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"', false , '1.0.0');
	wp_enqueue_style( 'font_awesome_css' );
	
	wp_register_style('custom_style_css', plugin_dir_url(__FILE__) . '../assets/css/main.css', false , '1.0.0');
	wp_enqueue_style( 'custom_style_css' );
	
	wp_register_style('custom_rating_css', plugin_dir_url(__FILE__) . '../assets/css/star-rating.min.css', false , '1.0.0');
	wp_enqueue_style( 'custom_rating_css' );
	
	wp_register_script('bootstrap_js', plugin_dir_url(__FILE__) . '../assets/bootstrap/js/bootstrap.min.js', array(), '1.0.0', true);
	wp_enqueue_script( 'bootstrap_js' );
	
	wp_register_script('custom_rating_js', plugin_dir_url(__FILE__) . '../assets/js/star-rating.min.js', array(), '1.0.0', true);
	wp_enqueue_script( 'custom_rating_js' );
	
	wp_register_script('custom_script_js', plugin_dir_url(__FILE__) . '../assets/js/myscript.js', array(), '1.0.0', true);
	wp_enqueue_script( 'custom_script_js' );
	
	
	// including ajax script in the plugin Myajax.ajaxurl
	wp_localize_script( 'custom_script_js', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php')));
	
	
	 wp_register_script( 'ajax-login-script', plugin_dir_url( __FILE__ ) . '../assets/js/ajax-login-script.js', array('jquery') );
        wp_enqueue_script( 'ajax-login-script' );

        wp_localize_script( 'ajax-login-script', 'ajax_login_object', array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'redirecturl' => home_url(),
            'loadingmessage' => __( 'Sending user info, please wait...' )
	
	 ));
	

}
add_action( 'wp_enqueue_scripts', 'mith_arcl_load_custom_rating_scripts' );
?>