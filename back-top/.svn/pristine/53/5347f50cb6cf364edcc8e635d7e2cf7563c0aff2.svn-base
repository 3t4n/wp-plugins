<?php
// Add Scripts
function backtop_sctiprs(){
	
	wp_enqueue_style( 'app-css', plugins_url( 'assets/css/app.css', dirname(__FILE__), false )); 

	wp_enqueue_script('app-js', plugins_url( 'assets/js/app.js', dirname(__FILE__), array('jquery'), true ));

}
add_action('wp_enqueue_scripts', 'backtop_sctiprs');

function backtop_styles(){?>
	<style>
		.scroll-top{
			background-color : <?php echo cs_get_option( 'bt_box_color' );?>;
		}
		 .scroll-top:hover {
		    background-color : <?php echo cs_get_option( 'bt_box_hover_color' );?>;
		}
	</style>
<?php	
}
add_action('wp_head', 'backtop_styles');