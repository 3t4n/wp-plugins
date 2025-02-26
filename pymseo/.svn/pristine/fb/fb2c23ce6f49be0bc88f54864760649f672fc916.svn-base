<?php
// ###############################
// -> Cambiar el tiempo de expirar de las cookies
// ###############################
	function fun_pymseo_seguridad_expires_session( $expire ) {
		 // Un año en segundos: 365 d/a * 24h/d * 60m/d * 60s/m
		return 31536000;
	}
	add_action( 'auth_cookie_expiration', 'pymseoSeguridadChangeExpireSession' );
?>