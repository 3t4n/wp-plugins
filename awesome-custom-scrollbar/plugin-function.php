<?php 
/*
Plugin Name:Awesome wordpress custom scrollbar
Plugin URI:https://wordpress.org/plugins/awesome-wordpress-custom-scrollbar/
Description:This plugin will be enable custom scrollbar in your any wordpress themes.just you can install or upload & activate your web server wordpress plugin directory and see awesome custom scrollbar in website.
in theme files. 
Version:1.0
Author:Ariful
Author URI:http://arifulislam.ultimatefreehost.in/
Text Domain:custom-scrollbar-wp
Domain Path: /languages
*/



//---add latest jquery start  --//

function awesome_custom_scrollbar_wp_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'awesome_custom_scrollbar_wp_latest_jquery');

//---end----//


//include css & js file //

function awesome_custom_scrollbar_js_css() {
    wp_enqueue_script( 'custom_scrollbar-js', plugins_url( '/js/jquery.nicescroll.min.js', __FILE__ ), array('jquery'), 1.0, true);
    wp_enqueue_style( 'custom_scrollbar-css', plugins_url( '/css/custom-scroll.css', __FILE__ ));
}

add_action('init','awesome_custom_scrollbar_js_css');



//---color picker file include functions ---//

function awesome_custom_scrollbar_color_picker( $hook ) {
 
    if( is_admin() ) {
     
        // Add the color picker css file      
        wp_enqueue_style( 'wp-color-picker' );
         
        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'custom-script-handle', plugins_url( '/inc/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
    }
}

add_action( 'admin_enqueue_scripts', 'awesome_custom_scrollbar_color_picker' );








//awesome custom scroll bar active //

function awesome_custom_scrollbar_active(){?>

	<?php global $custom_scrollbar_option; $custom_scrollbar_settings =get_option('custom_scrollbar_option',$custom_scrollbar_option);?>


	<script type="text/javascript"> 
		jQuery(document).ready(function() {
		  
			jQuery("html").niceScroll({
				
				cursorcolor:"#e67e22",
				cursorwidth:"10px",
				cursorborderradious:"0",
				cursorborder:"1px solid #e74c3c",
				scrollspeed:"60",
				autohidemode:false,
				touchbehavior:true,
				bouncescroll:true,
				horizrailenable:false
			});
		  });
	</script>
<?php	
}
add_action('wp_head','awesome_custom_scrollbar_active');


///-----end----//













?>