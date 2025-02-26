<?php
// ###############################
// UX/UI -> Buscador
// ###############################
//--> Si solo hay un busqueda, redirigir automaticameente al resultado
// ###############################
add_action( 'template_redirect', 'fun_pymseo_ux_search_redirect' );
function fun_pymseo_ux_search_redirect() {
	if ( is_search( )) {
		global $wp_query;
		if ( $wp_query->post_count == 1 ) {
			wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
		}
	}
}
?>