<?php
//###############################
//--> No indexar las paginas de error 404
//###############################
if (get_option('pymseoWPOnoIndexPage404')) {
	function fun_pymseo_wpo_noindex_nofollow_404() {
		if ( is_404() ) { 
			echo '<meta name="robots" content="noindex,nofollow" />'; 
		}
	}
	add_action( 'wp_head', 'fun_pymseo_wpo_noindex_nofollow_404' );
}
?>