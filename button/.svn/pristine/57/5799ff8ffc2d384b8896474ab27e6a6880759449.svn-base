<?php 
// wp_register_style
add_action('admin_enqueue_scripts','button_metaboxes_scripts');
function button_metaboxes_scripts(){

	global $typenow; 

	$dataToBePassed = array('Button_URL'  => BUTTON_URL);

	if ( $typenow == 'wd_button' ){		
		
		// jquery
		wp_enqueue_script( 'jquery');

		// jquery ui
		wp_enqueue_script('jquery-ui-draggable');

		//bootstrap
		wp_enqueue_style('bootstrap',BUTTON_URL.'assets/css/bootstrap.min.css',array(), '0.1.0', 'all');
		wp_enqueue_script('bootstrap',BUTTON_URL.'assets/js/bootstrap.min.js',array(), '0.1.0', true);

		// button hide show script
		wp_enqueue_script( 'button-effect-script', BUTTON_URL.'assets/js/admin/button-effect-script.js', array('jquery'), '0.1.0', true);

		// color picker
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'button-colorpicker-script', BUTTON_URL.'assets/js/admin/button-color-picker.js', array( 'wp-color-picker' ), '1.0.0', true );

		// metabox style
		wp_enqueue_style('button-metaboxes-style',BUTTON_URL.'assets/css/admin/metaboxes-style.css',array(), '0.1.0', 'all');	

		// linedtextarea
		wp_enqueue_style('jquery-numberedtextarea-css',BUTTON_URL.'assets/css/admin/jquery.numberedtextarea.css',array(), '0.1.0', 'all');
		wp_enqueue_script( 'jquery-numberedtextarea-js', BUTTON_URL.'assets/js/admin/jquery.numberedtextarea.js', array(), '1.0.0', true);

		// admin js
		wp_enqueue_script( 'custom-script', BUTTON_URL.'assets/js/admin/admin.js', array(), '1.0.0', true );

		// live preview
		wp_enqueue_script( 'button-preview', BUTTON_URL.'assets/js/admin/button-preview.js', array(), '1.0.0', true );

		// wp localize
		$localize_array = array('button-preview'=> $dataToBePassed );

		foreach ($localize_array as $key => $value) {
			wp_localize_script( $key, 'php_vars', $value );
		}		
	}
}