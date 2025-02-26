<?php
// ###############################
// DISABLE XML-RPC PING
// ###############################
	if ( ! is_user_logged_in() ){
		add_filter('xmlrpc_methods', 'fun_pymseo_disable_xmlrpc_ping');
		add_filter('wp_headers', 'fun_pymseo_remove_x_pingback');
		add_filter('xmlrpc_enabled', '__return_false');
		function fun_pymseo_disable_xmlrpc_ping ($methods) {
			unset( $methods['pingback.ping'] );
			return $methods;
		}
		function fun_pymseo_remove_x_pingback($headers) {
			unset($headers['X-Pingback']);
			return $headers;
		}
	}
	array_push($pymlineashtaccessBlockFile,'# BEGIN - Block xmlrpc.php');
	array_push($pymlineashtaccessBlockFile,'<Files xmlrpc.php>');
	array_push($pymlineashtaccessBlockFile,'order deny,allow');
	array_push($pymlineashtaccessBlockFile,'deny from all');
	array_push($pymlineashtaccessBlockFile,'</Files>');
	array_push($pymlineashtaccessBlockFile,'# END - Block xmlrpc.php');

?>