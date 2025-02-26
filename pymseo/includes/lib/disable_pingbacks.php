<?php
// ###############################
//-> Desactivar Pingbacks
// ###############################
	function fun_pymseo_seguridad_desactivar_pingbacks ($vectors) {
		unset( $vectors['pingback.ping'] );
		return $vectors;
	}
	add_filter( 'xmlrpc_methods', 'fun_pymseo_seguridad_desactivar_pingbacks');
?>