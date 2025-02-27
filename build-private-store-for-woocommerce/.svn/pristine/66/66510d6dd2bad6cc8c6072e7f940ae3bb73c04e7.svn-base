<?php 

add_action( 'admin_enqueue_scripts', 'BPSFW_load_admin_script_style');
add_action( 'wp_enqueue_scripts', 'BPSFW_load_script_style');

function BPSFW_load_admin_script_style() {
	if(isset($_GET['page']) && $_GET['page'] == 'private-store'){
      	wp_enqueue_style( 'bpsfw-backend-css', BPSFW_PLUGIN_DIR.'/assets/css/bpsfw-backend.css', false, '1.0' );
      	wp_enqueue_style( 'woocommerce_admin_styles-css', WP_PLUGIN_URL. '/woocommerce/assets/css/admin.css',array( 'woocommerce_admin_styles'),'1.0',"all");
      	// Enqueue the script
		wp_enqueue_script( 'bpsfw-backend-js', BPSFW_PLUGIN_DIR . '/assets/js/bpsfw-backend-js.js', array( 'jquery', 'select2' ) );

		// Create a nonce and localize the script with the nonce and AJAX URL
		$nonce = wp_create_nonce( 'bpsfw_ajax_nonce' );

		wp_localize_script( 'bpsfw-backend-js', 'bpsfw_ajax_postajax', array(
		    'ajaxurl'  => admin_url( 'admin-ajax.php' ),
		    'nonce'    => $nonce,  // Pass the nonce to the JavaScript file
		) );

  		wp_enqueue_style('wp-color-picker' );
      wp_enqueue_script('wp-color-picker-alpha', BPSFW_PLUGIN_DIR . '/assets/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '1.0.0', true );
      $color_picker_strings = array(
          'clear'            => 'Clear',
          'clearAriaLabel'   => 'Clear color',
          'defaultString'    => 'Default',
          'defaultAriaLabel' => 'Select default color',
          'pick'             => 'Select Color',
          'defaultLabel'     => 'Color value',
      );
      wp_localize_script( 'wp-color-picker-alpha', 'wpColorPickerL10n', $color_picker_strings );
      wp_enqueue_script( 'wp-color-picker-alpha' );
	}
}


function BPSFW_load_script_style() {
	wp_enqueue_script('jquery', false, array(), false, false);
}