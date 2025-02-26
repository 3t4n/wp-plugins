<?php
function avk_backgroundstickystyle(){
	wp_enqueue_style('avk_styles',plugin_dir_url(__FILE__).'css/adminmain.css');
	//wp_enqueue_script('avk_jsmin1',plugin_dir_url(__FILE__).'js/avk_color.min.js');
	wp_enqueue_script('avk_jsmin4',plugin_dir_url(__FILE__).'js/avk_sticky.js');

 wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('js/my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
    
     wp_enqueue_script('jquery');
// This will enqueue the Media Uploader script
    wp_enqueue_media();
	
}

?>
<?php
add_action( 'admin_enqueue_scripts', 'avk_backgroundstickystyle' );
?>