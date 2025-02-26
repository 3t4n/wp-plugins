<?php
// ###############################
//--> Cambiar la URL de busqueda de ?s=search_term por un enlace permamente
// ###############################
function fun_pymseo_ux_search_urlrewrite() {
	if ( is_search() && ! empty( $_GET['s'] ) ) {
		wp_redirect( home_url ("/search/") . urlencode(get_query_var('s')) );
		exit();
	}
}
add_action( 'template_redirect','fun_pymseo_ux_search_urlrewrite');
?>