<?php
// ###############################
//--> Cambiar el numero de resultados en la busqueda
// ###############################
	function fun_pymseo_ux_search_limit_post() {
	  if ( is_search() ) {
		set_query_var( 'posts_per_archive_page', get_option('pymseoUXSearchChangingNumberResultsPage') ); 
	  }
	}
	add_filter('pre_get_posts','fun_pymseo_ux_search_limit_post');

?>