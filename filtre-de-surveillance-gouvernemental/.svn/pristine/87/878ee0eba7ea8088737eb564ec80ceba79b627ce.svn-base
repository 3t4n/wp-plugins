<?php
/*
Plugin Name: Filtre de surveillance gouvernemental
Plugin URI: http://lejoker.net/hadopi
Description: Ce plugin permet l'affichage d'une page de sensibilisation au danger du filtrage sur Internet.
Author: Le Joker
Version: 1.1
Author URI: http://lejoker.net/elucubrations
*/

function filtregouv_init() 
	{
	$chemin_FG = WP_PLUGIN_URL.'/filtregouv/';
	$urlactuelle = $_SERVER["SERVER_NAME"].$_SERVER['REQUEST_URI'];
	$urlencodee = urlencode($urlactuelle);
	$envoi_FG = $chemin_FG.'filtregouv.php?alb='.$urlencodee;
	echo '<!-- filtre gouvernemental -->';
  	echo '<meta http-equiv="refresh" content="200; url='.$envoi_FG.'">';
	echo '<link rel="icon" href="favicon.gif" type="image/gif">';
	}
	
function filtre_nase() 
	{
	echo '<!-- filtre gouvernemental dans les choux -->';
	echo '<link rel="icon" href="Shield01.gif" type="image/gif">';
	}
	
//Si le filtre a deja ete affiché...
if (isset($_GET['hadopi']))
	{	
	$fia = $_GET['hadopi'];
	}

if ($fia != "bullshit")
	{		
	add_action('wp_head', 'filtregouv_init', 0);
	}
else
	{	
	add_action('wp_head', 'filtre_nase', 0);
	}
?>