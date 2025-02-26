<?php
//###############################
//--> Eliminar todo lo relativo al fecha | date.php
//###############################

//Establecemos la pagina de error 404
function fun_pymseo_disable_page_date_404(){
	if( is_date() ) {
		global $wp_query;
		$wp_query->set_404();
	}
}
add_action('template_redirect', 'fun_pymseo_disable_page_date_404');

?>