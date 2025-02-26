<?php
/*
 * Plugin Name: Saeid Simple Text Rotator
 * Plugin URI: mailto: peratik@gmail.com
 * Description: It uses jQuery Super Simple Text Rotator by Pete R. on a simple shortcode to rotate your texts!
 * Version: 1.0 
 * Author: Saeid M.Rezaei
 * Author URI: mailto: peratik@gmail.com
 */

function saeid_rotate_scripts() {
	global $post;
	if (has_shortcode( $post->post_content, 'saeidrotate')) {
		wp_enqueue_style( 'simpletextrotator', plugins_url( 'simpletextrotator.css', __FILE__ ) );
		wp_enqueue_script( 'simple-text-rotator', plugins_url( 'jquery.simple-text-rotator.js', __FILE__ ), array( 'jquery' ) );
	}
}
add_action( 'wp_enqueue_scripts', 'saeid_rotate_scripts' );

function saeid_rotate_my_text_func($atts, $content = null) {

	$id = saeidrotateGenerateRandomString();

	extract(shortcode_atts( array(
        'class' => 'rotate',
        'animation' => 'dissolve',
		'separator' => ',',
		'speed' => 2000,
    ), $atts ));
	
	$rotatejquery = '
	<script>
	jQuery(document).ready(function(){
		jQuery("#'.$id.'.'.$class.'").textrotator({
			animation: "'.$animation.'",
			separator: "'.$separator.'",
			speed: '.$speed.'
		});
	});
	</script>
	';
	echo $rotatejquery;
	
	return '<span id="'.$id.'" class="'.$class.'">'.do_shortcode($content).'</span>';
	
}
add_shortcode( 'saeidrotate', 'saeid_rotate_my_text_func' );

function saeidrotateGenerateRandomString($length = 8) {
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}