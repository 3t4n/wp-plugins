<?php
//###############################
// Crawl Budget
//###############################
//--> Eliminar todo lo relativo al autor | author.php
//###############################
// Eliminamos el enlace del author
	function fun_pymseo_disable_change_link_author() {
    	return ( '' );
	}
	add_filter( 'author_link', 'fun_pymseo_disable_change_link_author' );
	//Establecemos la pagina de error 404
	function fun_pymseo_disable_page_author_404(){
    	if( is_author() ) {
        	global $wp_query;
        	$wp_query->set_404();
    	}
	}
	add_action('template_redirect', 'fun_pymseo_disable_page_author_404');
?>