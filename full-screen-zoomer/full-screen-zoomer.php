<?php 
/**
* Plugin Name: Full secreen zoomer
* Plugin URI: http://demos.yo-medya.fr/
* Description: an awesome zoomer
* Version: 1.0
* Author: Yo-Médya.fr/
* Author URI: http://yo-medya.fr/
**/
 
 add_action( 'admin_menu', 'fullscreenzoomer_menu' );
/** Step 1. */
function fullscreenzoomer_menu() {
	add_options_page( 'Full secreen zoomer', 'Full secreen zoomer', 'manage_options', 'fullscreenzoomer', 'fullscreenzoomer_options_page' );
}


/** Step 3. */
function fullscreenzoomer_options_page() {
	global $wp;
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
?>
	<div class="wrap">
		<h2>fullscreenzoomer Gallery Options</h2>
		<div class="updated">
             <p>This is the free version of fullscreenzoomer Gallery plugin</p>
         </div>
		 <h3>Nothing to configure !! awesome hein ?! you just need to :</h3>
		 <p>
		 Add a css class to any image you want to applicate the Full Screen Zoomer plugin
		 </p>
	</div>
<?php
}

add_action('wp_footer', 'fullscreenzoomer_call_plugin');

function fullscreenzoomer_call_plugin () {
	$html .='
		<script>
		jQuery(document).ready(function(){
			var elements = document.querySelectorAll( ".fullscreenzoomer" );
			Intense( elements );
		});
		</script>
	';
	echo $html;
}

function fullscreenzoomer_enqueue_plugin () {
	/*********include assets (js and css)**************/
	wp_enqueue_style("fullscreenzoomercss",plugins_url( 'full-screen-zoomer/assets/css/fullscreenzoomer.css'));
	wp_enqueue_script("fullscreenzoomerjs",plugins_url( 'full-screen-zoomer/assets/js/fullscreenzoomer.min.js'));
	
}
add_action('wp_enqueue_scripts', 'fullscreenzoomer_enqueue_plugin');
 ?>