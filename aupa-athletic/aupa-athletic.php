<?php
/*
Plugin Name: Aupa Athletic
Plugin URI: http://www.irekisoft.net/aupa_athletic
Description: Al activar el plugin nos aparecerá la imagen de apoyo a nuestro Athletic en la parte superior derecha de la pantalla.
Author: Irekisoft
Version: 1.0
License: GPLv2
Author URI: http://www.irekisoft.net
*/

function render_aupa_athletic() {
	$imagen_url = plugins_url('aupa-athletic.png', __FILE__ );
	if(function_exists('is_admin_bar_showing')) {
		$padding_top = is_admin_bar_showing() ? 28 : 0;
	} else {
		$padding_top = 0;
	}
	echo "<img src='{$imagen_url}' alt='Aupa Athletic' style='position: fixed; top: ".$padding_top ."px; right: 0; z-index: 100000;  border:none;' />";
}
add_action('wp_footer', 'render_aupa_athletic');
