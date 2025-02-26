<?php
/*
Plugin Name: Mail Categories
Plugin URI: https://github.com/christiancabrero/Mail-Categories
Description: Plugin que realiza un informe de la ultima entrada de cada categoría y avisa por email si hace tiempo que no se publican entradas.
Author: Christian Cabrero
Author URI: https://cabrero.ch
Version: 2.0
License: GPLv2
*/
if ( ! defined( 'ABSPATH' ) ) exit;

/* función que pinta el menú debajo de ajustes*/
function cabrero_menu_ajustes(){
    add_menu_page( 
    	'Mail Categories', //título de la página
    	'Mail Categories', //título del menú
    	'activate_plugins', //capability
    	'ajustes-mail-categories', //slug cambiar por read para pintar dentro de ajustes
    	'cabrero_pagina_opciones', //función que se ejecutará para pintar el contenido
    	'dashicons-email-alt', //icono interno WP: https://developer.wordpress.org/resource/dashicons
    	80 //posicion: 5,10,15,20,25,60,65,70,75,80,100
    );
}

// Añade más links en los detalles del plugin
function cabrero_plugin_meta_links( $links, $file ) {
	if ( $file === 'mail-categories/mail-categories.php' ) {
		$links[] = '<a href="https://profiles.wordpress.org/christiancabrero/#content-plugins" target="_blank" title="' . __( 'Más plugins &#187;' ) . '"><strong>' . __( 'Más plugins &#187;' ) . '</strong></a>';
	}
	return $links;
}
add_filter( 'plugin_row_meta', 'cabrero_plugin_meta_links', 10, 2 );

require_once("comparar_fechas.php"); // Incluye la funcion que compara fechas

require("mail-cron.php"); //Funciones de email cron

/* acción para añadir la opción de nuestro plugin al menú */
add_action('admin_menu','cabrero_menu_ajustes');
function cabrero_pagina_opciones(){	
	
	if(isset($_POST['action']) && $_POST['action'] == "salvaropciones"){
		
		// Nonce que verifica si el token es correcto
		$nonce = $_POST['_wpnonce'];
		// Si el nonce no es correcto mostramos error
		if ( ! wp_verify_nonce( $nonce, 'nonce-formulario' ) ){
		  die( 'Nonce no válido, su token ha caducado.<br/>Vuelva a intentarlo o pruebe con otro usuario.' );
		}
		
		update_option('form_dias',$_POST['dias']);
		update_option('form_email',$_POST['email']);
		update_option('form_activo',$_POST['activo']);
		echo("<div class='updated message' style='padding: 10px'>Opciones guardadas.</div>");
	}
	/*
	if (isset($_POST['action']) && $_POST['action'] == "error"){
		echo("<div class='error message' style='padding: 10px'>Datos erróneos, por favor revise que sean correctos.</div>");
	}
	/* Snippets php pagina de ajustes y para enviar email */
	
	require_once("ajustes_plugin.php");	
	require_once("enviar_email.php");

}	

register_activation_hook( __FILE__, 'cabrero_activar_cron' ); //Función a ejecutar cuando se activa el plugin
register_deactivation_hook( __FILE__, 'cabrero_desactivar_cron' ); //Función a ejecutar cuando se desactiva el plugin

?>