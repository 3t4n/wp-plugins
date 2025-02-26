<?php
/*
	* Plugin Name: Server Analitycs
	* Plugin URL: https://www.diletec.com.br
	* Description: Verifica o servidor, focado em carga e memoria. 
	* Version: 2.0
	* Author: Diletec
	* Author URI: https://www.diletec.com.br
	* Requires at least: 3.3
	* Requires PHP: 5.6
	* Tested up to: 5.5
*/


function SeverAnalitycs_add_dashboard_widgets() {

	wp_add_dashboard_widget(
		'server_dashboard_widget',  // Widget slug.
		'Server Analytics',         // Title.
		'SeverAnalitycs_dashboard_widget_function' // Display function.
	);
}
add_action( 'wp_dashboard_setup', 'SeverAnalitycs_add_dashboard_widgets' );


function SeverAnalitycs_dashboard_widget_function() {

	include_once("uso.php");
	echo '<br/> Uso do processador: ';
	include_once("cargacpu.php");
	echo '<br/>';
	include_once("alocada.php");
	echo '<br/><br/>Detalhes de memoria HD: ';
	include_once("infos.php");
}