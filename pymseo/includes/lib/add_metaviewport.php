<?php
// ###############################
//--> add metatag viewport y eliminar si hay alguna previamente
// ###############################
	remove_action( 'wp_head', 'viewport_meta' );
	function fun_pymseo_add_meta_tag_viewport() {
		echo '<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=2.0">';
	}
	add_action('wp_head', 'fun_pymseo_add_meta_tag_viewport');

?>