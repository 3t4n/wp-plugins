<?php

/*
Plugin Name: Heptabot
Description: Ce plugin permet d'ajouter un shortcode pour utiliser Heptabot sur votre site web
Version: 0.1
Author: Heptadeca
Author URI: http://www.heptadeca.com
License: GPL2
*/


function heptabot_renv_base($id_m,$auto = 'true')
	{
	return '
	
	<script type="text/javascript">
	var heptabot_lanceur = {
	\'id_m\' : '.$id_m.',
	\'auto_load\' : '.$auto.',
	};
	(function() {
	 var n_js = document.createElement(\'script\'); n_js.type = \'text/javascript\'; n_js.async = true;
    n_js.src = \'http://moomoot.com/app/heptabot.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(n_js, s);
	var n_css = document.createElement(\'link\'); n_css.type = \'text/css\'; n_css.rel = \'stylesheet\';
	n_css.href = \'http://moomoot.com/app/heptabot.css\';
	s = document.getElementsByTagName(\'head\')[0]; s.insertBefore(n_css, s.firstChild);
  })();
  </script>
  ';	
	}

function heptabot_script_inst($atts) {
	
	//récupère les paramètres
    $atts = shortcode_atts(
    array(
        'id_m' => 'id_m',
    ), $atts);
    //transforme les paramètres en variables
    extract($atts);
	$ret = '<div id="chat_heptabot"></div>';
	$ret .= heptabot_renv_base($id_m);
	return $ret;
	
}


function heptabot_btn($atts) {
 	//récupère les paramètres
    $atts = shortcode_atts(
    array(
        'id_m' => 'id_m',
    ), $atts);
    //transforme les paramètres en variables
    extract($atts);
	$ret = '<div id="chat_heptabot"></div>';
	$ret .= heptabot_renv_base($id_m,'false');
	$ret .='	<button type="button" onclick="heptabot_init()">Lancer le bot</button>';
	return $ret;
	
}


function heptabot_menu_callback()
	{ 
	$ret =  '<div class="wrap"><h1>Heptabot </h1><p>Merci d\'utiliser Heptabot :-) .</p>';
	$ret .=  '<p>Pour gérer votre compte, cliquez ici <a href="https://www.hepta-deca.fr">https://www.hepta-deca.fr</a></p>';
	$ret .=  '<p>Pour insérer Heptabot sur l\'une de vos pages, il vous suffit d\'utiliser les shortcodes suivant :</p>';
	$ret .=  '<ul>
	<li>Version en lancement automatique : [heptabot id_m="*"]</li>
	<li>Version en lancement avec bouton : [heptabot_btn id_m="*"]</li>
	<li>*** Pour connaitre l\'id_m de votre bot, rendez vous sur <a href="https://www.hepta-deca.fr" target="_blank">votre compte Heptabot</a></li>
	</ul>';
	$ret .=  '<p>Pour plus d\'informations ou demandes d\'évolution merci de nous contacter à hello@heptadeca.com</p>';
	$ret .=  '</div>'; 
	echo $ret;
	}

function heptabot_add_menu(){
add_menu_page('Heptabot', 'Heptabot', 'manage_options', 'heptabot_menu', 'heptabot_menu_callback',plugin_dir_url(__FILE__ ).'/images/heptabot.png', 20);
}	
	
add_action( 'admin_menu', 'heptabot_add_menu' );	
	
add_shortcode('heptabot', 'heptabot_script_inst');
add_shortcode('heptabot_btn', 'heptabot_btn');


?>