<?php
/*
Plugin Name: Ac-Scroll-Up
Description: this plugin is for scroll to top.
Author: Asif Ahmmad
Plugin URI:http://aidclub.net/wp
Author URI:http://aidclub.net
version:1.0
*/

require_once('scroll-settings.php');

// Register script.
function ac_scroll_up_plugin_scripts() {		 
	 	 
	 wp_register_style( 'font-awesome', plugins_url( '/css/font-awesome.min.css' , __FILE__  ) );	 
	 wp_register_style( 'plugin-style', plugins_url('/css/plugin-style.css', __FILE__) );	 
	 
	 wp_enqueue_style( 'font-awesome' );
	 wp_enqueue_style( 'plugin-style');
	 
	wp_enqueue_script('scrollUp',plugins_url( '/js/jquery.scrollUp.min.js' , __FILE__ ),array( 'jquery' ));
	wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'ac_scroll_up_plugin_scripts' );



// Register colorpicker.
function wpac_add_color_picker( $hook ) {
 
    if( is_admin() ) {
     
        // Add the color picker css file      
        wp_enqueue_style( 'wp-color-picker' );
         
        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'custom-script-handle', plugins_url( '/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
    }
}
add_action( 'admin_enqueue_scripts', 'wpac_add_color_picker' );



function ac_scroll_active_hook(){?>
	<script type="text/javascript">
		jQuery(function ($) {
		  $.scrollUp({
			scrollName: 'scrollUp', // Element ID
			topDistance: '300', // Distance from top before showing element (px)
			topSpeed: 300, // Speed back to top (ms)
			animation: 'fade', // Fade, slide, none
			animationInSpeed: 200, // Animation in speed (ms)
			animationOutSpeed: 200, // Animation out speed (ms)
			//scrollText: '<i class="fa fa-<?php echo esc_attr( get_option('icon') ); ?>"></i>', // Text for element
			scrollText: '<i class="fa fa-angle-double-up"></i>', // Text for element 
			activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
		  });
		  		  
		});
	</script>
	<style type="text/css">
		#scrollUp {
			  background: <?php echo esc_attr( get_option('background_color') ); ?>;
			  color: <?php echo esc_attr( get_option('font_color') ); ?>;
			}
		a#scrollUp:hover{color:<?php echo esc_attr( get_option('hover_color') ); ?>;}
	
	</style>
<?php
}
add_action('wp_head', 'ac_scroll_active_hook');



