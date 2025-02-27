<?php

/*

Plugin Name: Plugin Navidad IndianWebs

Plugin URI: https://indianwebs.com/plugins

Description: Pon un mensaje navideño y un efecto de nieve en tu web.

Version: 1.3

Author: Cristopher Quispe

Author URI: https://indianwebs.com/

License: GPLv2 or later

*/



/*Detecta el tipo de versión de WordPress*/



register_activation_hook(__FILE__,'efecto_nieve_install');

function efecto_nieve_install(){

	global $wp_version;

	if(version_compare($wp_version, "3.2.1", "<")) {

		deactivate_plugins(basename(__FILE__));

		wp_die("This plugin requires WordPress version 3.2.1 or higher.");

	}

	set_navidad();

}

add_action('admin_menu','efecto_nieve_menu');



function efecto_nieve_menu(){

	add_menu_page('NAVIDAD', 'NAVIDAD','administrator', 'navidad-indianwebs.php', 'efecto_nieve_action', plugins_url('snowflake.png', __FILE__));

}





   

/*Administrador del Plugin*/

 

   

function efecto_nieve_action(){

	

   		$option_name1 = 'set_copos' ;

			$option_name1_1 = 'set_flakeCount';
			$option_name1_2 = 'set_minSize';
			$option_name1_3 = 'set_maxSize';
			$option_name1_4 = 'set_maxSpeed';


		$option_name2 = 'set_msg' ;

		$option_name3 = 'set_postal' ;

		$option_name4 = 'set_imagen' ;

		$option_name5 = 'set_posicion' ;

		

		switch($_REQUEST['act']) {

				case "save":

					if ( 

						! isset( $_POST['nieve_nonce'] ) 

						|| ! wp_verify_nonce( $_POST['nieve_nonce'], 'nieve_action' ) 

					) {

					

					   print 'Sorry, your nonce did not verify.';

					   exit;

					

					} else {

					   set_navidad();

						echo '<div class="updated below-h2" id="message" style="position:relative; clear:both;"><p>Efecto nieve: '.$_REQUEST['set_copos'].'</p></div>';

						echo '<div class="updated below-h2" id="message" style="position:relative; clear:both;"><p>Mensaje de navidad: '.$_REQUEST['set_postal'].'</p></div>';

						break;

					

					}

					default:

		}

				

			   /*Establecer opciones*/

				$set_copos=get_option( $option_name1 );

					$set_flakeCount = get_option($option_name1_1);
					$set_minSize = get_option($option_name1_2);
					$set_maxSize = get_option($option_name1_3);
					$set_maxSpeed = get_option($option_name1_4);

				$set_msg=get_option( $option_name2 );

				$set_postal=get_option( $option_name3 );

				$set_imagen = get_option( $option_name4 );

				$set_posicion = get_option( $option_name5 );

				require_once('form.php');

}  


function set_navidad(){

	

		$option_name1 = 'set_copos';

			$option_name1_1 = 'set_flakeCount';
			$option_name1_2 = 'set_minSize';
			$option_name1_3 = 'set_maxSize';
			$option_name1_4 = 'set_maxSpeed';

		$option_name2 = 'set_msg';

		$option_name3 = 'set_postal';

		$option_name4 = 'set_imagen';

		$option_name5 = 'set_posicion' ;

		$option_name6 = 'set_imagen2';

		/*Valores por defecto*/

		

		$new_value1 = ($_REQUEST['set_copos']=="")?'No': $_REQUEST['set_copos'];

		if ( get_option( $option_name1 ) !== false ) {

			update_option( $option_name1, $new_value1 );

		} else {

			$deprecated = null;

			$autoload = 'no';

			add_option( $option_name1, $new_value1, $deprecated, $autoload );

		}

		//UPDATE 1.3
		$new_value1_1 = ($_REQUEST['set_flakeCount']=="")?'25': $_REQUEST['set_flakeCount'];

		if ( get_option( $option_name1_1 ) !== false ) {

			update_option( $option_name1_1, $new_value1_1 );

		} else {

			$deprecated = null;

			$autoload = '';

			add_option( $option_name1_1, $new_value1_1, $deprecated, $autoload );

		}

		$new_value1_2 = ($_REQUEST['set_minSize']=="")?'10': $_REQUEST['set_minSize'];

		if ( get_option( $option_name1_2 ) !== false ) {

			update_option( $option_name1_2, $new_value1_2 );

		} else {

			$deprecated = null;

			$autoload = '';

			add_option( $option_name1_2, $new_value1_2, $deprecated, $autoload );

		}

		$new_value1_3 = ($_REQUEST['set_maxSize']=="")?'20': $_REQUEST['set_maxSize'];

		if ( get_option( $option_name1_3 ) !== false ) {

			update_option( $option_name1_3, $new_value1_3 );

		} else {

			$deprecated = null;

			$autoload = '';

			add_option( $option_name1_3, $new_value1_3, $deprecated, $autoload );

		}

		$new_value1_4 = ($_REQUEST['set_maxSpeed']=="")?'3': $_REQUEST['set_maxSpeed'];

		if ( get_option( $option_name1_4 ) !== false ) {

			update_option( $option_name1_4, $new_value1_4 );

		} else {

			$deprecated = null;

			$autoload = '';

			add_option( $option_name1_4, $new_value1_4, $deprecated, $autoload );

		}

		//END UPDATE 1.3


		$new_value2 = ($_REQUEST['set_msg']=="")?'': $_REQUEST['set_msg'];

		if ( get_option( $option_name1 ) !== false ) {

			update_option( $option_name2, $new_value2 );

		} else {

			$deprecated = null;

			$autoload = '';

			add_option( $option_name2, $new_value2, $deprecated, $autoload );

		}

		

		$new_value3 = ($_REQUEST['set_postal']=="")?'No': $_REQUEST['set_postal'];

		if ( get_option( $option_name3 ) !== false ) {

			update_option( $option_name3, $new_value3 );

		} else {

			$deprecated = null;

			$autoload = 'no';

			add_option( $option_name3, $new_value3, $deprecated, $autoload );

		}

		$new_value4 = ($_REQUEST['set_imagen2']=="")?'': $_REQUEST['set_imagen2'];

		if ( get_option( $option_name4 ) !== false ) {

			update_option( $option_name4, $new_value4 );

		} else {

			$deprecated = null;

			$autoload = '';

			add_option( $option_name4, $new_value4, $deprecated, $autoload );

		}

		

		$new_value5 = ($_REQUEST['set_posicion']=="")?'Derecha': $_REQUEST['set_posicion'];

		if ( get_option( $option_name5 ) !== false ) {

			update_option( $option_name5, $new_value5 );

		} else {

			$deprecated = null;

			$autoload = 'derecha';

			add_option( $option_name5, $new_value5, $deprecated, $autoload );

		}

		

}



/*Muestra las opciones*/

function mostrar_efecto_nieve(){

	

	$option_name1 = 'set_copos' ;

	$set_copos=get_option( $option_name1 );

	

	/*Condicional para mostrar las opciones*/

	//Busqueda Rapida

	if($set_copos=='Yes'){

		$script .= '<script>jQuery(document).snowfall({flakeCount : '.get_option('set_flakeCount').', image :"'.plugins_url('/images/snowflake.png', __FILE__).'", minSize: '.get_option('set_minSize').', maxSize:'.get_option('set_maxSize').', maxSpeed : '.get_option('set_maxSpeed').'});</script>';

		echo $script;

	}

	

}

function cargar_jquery(){

	wp_register_script('efecto', plugins_url('/js/jquery-3.5.1.min.js', __FILE__));

	wp_enqueue_script('efecto');

}

add_action( 'wp_enqueue_scripts', 'cargar_jquery' );

function mostrar_nieve(){

	wp_register_script('efecto', plugins_url('/js/snowfall.jquery.min.js', __FILE__));

	wp_enqueue_script('efecto');

}

add_action( 'init', 'mostrar_nieve' );



function agregar_js() {

	wp_register_script('popup', plugins_url('/js/script.js', __FILE__));

	wp_enqueue_script('popup');

}

add_action( 'wp_enqueue_scripts', 'agregar_js' );



function agregar_estilo() {

	wp_register_style('estilo', plugins_url('/css/style.css', __FILE__));

	wp_enqueue_style('estilo');

}

add_action( 'wp_enqueue_scripts', 'agregar_estilo' );



function mostrar_tarjeta(){

	

	$option_name3 = 'set_postal' ;

	$set_postal=get_option( $option_name3 );

	$option_name2 = 'set_msg';

	$set_msg=get_option( $option_name2 );

	$option_name5 = 'set_posicion' ;

	$set_posicion=get_option( $option_name5 );

	$option_name4 = 'set_imagen' ;

	$set_imagen=get_option( $option_name4 );

	$option_name5 = 'set_imagen2' ;

	$set_imagen2=get_option( $option_name5 );

	

	/*Condicional para mostrar las opciones*/

	if($set_postal=='Yes' && $set_imagen != '' && $set_msg == ''){

		$set_msg = '';

		if($set_posicion== 'derecha'){

			$tarjeta .= '<div class="tarjeta" style="background: url('.$set_imagen.'); 

			background-size: contain;

			background-repeat:repeat-x;

			width: 500px;

			height: 180px;

			position:fixed;

			bottom:0;

			right:0;"><span id="close" onclick="cerrar()">x</span></div>';

			echo $tarjeta;

		}else if($set_posicion== 'izquierda'){

			$set_msg = '';

			$tarjeta .= '<div class="tarjeta" style="background: url('.$set_imagen.'); 

			background-size: contain;

			background-repeat:repeat-x;

			width: 500px;

			height: 180px;

			position:fixed;

			bottom:0;

			left:0;"><span id="close" onclick="cerrar()">x</span></div>';

			echo $tarjeta;

		}else if($set_posicion== 'centro'){

			$set_msg = '';

			$tarjeta .= '<div class="tarjeta" style="background: url('.$set_imagen.'); 

			background-size: contain;

			background-repeat:repeat-x;

			width: 500px;

			height: 180px;

			position:fixed;

			z-index:9999;

			bottom:50%;

			margin-bottom: -90px;

			margin-left: -250px;

			left:50%;"><span id="close" onclick="cerrar()">x</span></div>';

			echo $tarjeta;

		}

		

		

	}else if($set_postal=='Yes' && $set_posicion=='derecha' && $set_msg != ''){

		$set_imagen = '';

		if($set_msg == "feliznavidad1"){

			$tarjeta .= '<div class="tarjeta" id="popup1"><span id="close" onclick="cerrar()">x</span></div>';

		}else if($set_msg == "feliznavidad2"){

			$tarjeta .= '<div class="tarjeta" id="popup2"><span id="close" onclick="cerrar()">x</span></div>';

		}else if($set_msg == "feliznavidad3"){

			$tarjeta .= '<div class="tarjeta" id="popup3"><span id="close" onclick="cerrar()">x</span></div>';

		}else if($set_msg == "feliznavidad4"){

			$tarjeta .= '<div class="tarjeta" id="popup4"><span id="close" onclick="cerrar()">x</span></div>';

		}else if($set_msg == "feliznavidad5"){

			$tarjeta .= '<div class="tarjeta" id="popup5"><span id="close" onclick="cerrar()">x</span></div>';

		}else if($set_msg == "feliznavidad6"){

			$tarjeta .= '<div class="tarjeta" id="popup6"><span id="close" onclick="cerrar()">x</span></div>';

		}

		echo $tarjeta;

		

	}else if($set_postal=='Yes' && $set_posicion=='izquierda' && $set_msg != ''){

		$set_imagen = '';

		if($set_msg == "feliznavidad1"){

			$tarjeta .= '<div class="tarjeta" id="popup1-iz"><span id="close" onclick="cerrar()">x</span></div>';

		}else if($set_msg == "feliznavidad2"){

			$tarjeta .= '<div class="tarjeta" id="popup2-iz"><span id="close" onclick="cerrar()">x</span></div>';

		}else if($set_msg == "feliznavidad3"){

			$tarjeta .= '<div class="tarjeta" id="popup3-iz"><span id="close" onclick="cerrar()">x</span></div>';

		}else if($set_msg == "feliznavidad4"){

			$tarjeta .= '<div class="tarjeta" id="popup4-iz"><span id="close" onclick="cerrar()">x</span></div>';

		}else if($set_msg == "feliznavidad5"){

			$tarjeta .= '<div class="tarjeta" id="popup5-iz"><span id="close" onclick="cerrar()">x</span></div>';

		}else if($set_msg == "feliznavidad6"){

			$tarjeta .= '<div class="tarjeta" id="popup6-iz"><span id="close" onclick="cerrar()">x</span></div>';

		}

		echo $tarjeta;

	}else if($set_postal=='Yes' && $set_posicion=='centro' && $set_msg != ''){

		$set_imagen = '';

		if($set_msg == "feliznavidad1"){

			$tarjeta .= '<div class="tarjeta" id="popup1-cen"><span id="close" onclick="cerrar()">x</span></div>';

		}else if($set_msg == "feliznavidad2"){

			$tarjeta .= '<div class="tarjeta" id="popup2-cen"><span id="close" onclick="cerrar()">x</span></div>';

		}else if($set_msg == "feliznavidad3"){

			$tarjeta .= '<div class="tarjeta" id="popup3-cen"><span id="close" onclick="cerrar()">x</span></div>';

		}else if($set_msg == "feliznavidad4"){

			$tarjeta .= '<div class="tarjeta" id="popup4-cen"><span id="close" onclick="cerrar()">x</span></div>';

		}else if($set_msg == "feliznavidad5"){

			$tarjeta .= '<div class="tarjeta" id="popup5-cen"><span id="close" onclick="cerrar()">x</span></div>';

		}else if($set_msg == "feliznavidad6"){

			$tarjeta .= '<div class="tarjeta" id="popup6-cen"><span id="close" onclick="cerrar()">x</span></div>';

		}

		echo $tarjeta;

	}

	

	

}





wp_enqueue_style('thickbox'); // call to media files in wp

wp_enqueue_script('thickbox');

wp_enqueue_script( 'media-upload'); 



add_action( 'wp_footer', 'mostrar_tarjeta');

add_action( 'wp_footer', 'mostrar_efecto_nieve');



?>