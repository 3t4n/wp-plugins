<?php
// ###############################
// -> Eliminar enlaces de la cabecera REST API Links
// ###############################
	if ( ! is_user_logged_in() ){
		function fun_pymseo_disable_rest_api( $access ) {
    		return new WP_Error( 'rest_cannot_access', __( 'Disable REST API', 'ddd' ), array( 'status' => rest_authorization_required_code() ) );
		}
		add_filter( 'rest_authentication_errors', 'fun_pymseo_disable_rest_api' ); // Desactiva la tag de enlace de la REST API
		remove_action('wp_head', 'rest_output_link_wp_head', 10); // Desactiva enlaces de oEmbed Discovery
		remove_action('wp_head', 'wp_oembed_add_discovery_links', 10); // Desactiva enlace de la REST API en las cabeceras HTTP
		remove_action('template_redirect', 'rest_output_link_header', 11, 0);
	}

?>