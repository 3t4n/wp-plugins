<?php
//###############################
//--> Eliminar todo lo relativo a las etiquetas | tag.php
//###############################
// Desactivar Tags Dashboard WP
add_action('admin_menu', 'fun_pymseo_disable_page_tag_menu');
function fun_pymseo_disable_page_tag_menu() {
	remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
}
// Eliminar tags de los posts
function fun_pymseo_disable_page_tag() {
	unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'fun_pymseo_disable_page_tag');
//Establecemos la pagina de error 404
function fun_pymseo_disable_page_tag_404(){
	if( is_tag() ) {
		global $wp_query;
		$wp_query->set_404();
	}
}
add_action('template_redirect', 'fun_pymseo_disable_page_tag_404');

?>