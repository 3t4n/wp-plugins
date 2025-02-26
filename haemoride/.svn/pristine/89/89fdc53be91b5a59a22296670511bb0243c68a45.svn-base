<?php
/**
 * @package Haemoride
 * @version 2.1.1
 */
/*
Plugin Name: Hæmoride
Plugin URI: https://plugins.svn.wordpress.org/haemoride/
Description: Pifter dit wordpress op med noget godt gammeldags dansk toilethumor.
Author: Simon Lejel
Version: 2.1.1
Author URI: http://simon.aspitnord.dk
*/

function hem_get_quotes() {
	/** These are the quotes for the toilet humor */
	$quotes = "Hæmoride Hæmoride Hæmoride; Min røv er træt af at skide;
Porcelænet skinner så fin og hvid; Brættet føles varm og blid;
Muskler spændes til et tryk; Tronen ryster, der tømmes ryg;
Var det glas fra hullet flød; På papiret en plet så rød;
Der kradses huller i min buks; Fingeren er min lille duks;
Lille spejl på gulvet der; Vis mig vej i hullet her;
Du er vokset i min skygge; Du ømme, lede lille tykke;
Jeg skal skide; Har du Wordpress samt en hæmoride på din side;
Hvorfor skal mit røvhul lide; Hæmoride Hæmoride Hæmoride;";

	// Here we split it into lines
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a line
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hem() {
	$chosen = hem_get_quotes();
	echo "<p id='hem'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hem' );

// We need some CSS to position the paragraph
function hem_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#hem {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 25px;
		font-family: \"Comic Sans MS\", cursive, sans-serif;
		animation-name: rainbow;
		animation-duration: 8s;
		animation-iteration-count: infinite;
		word-spacing: 2px;
		color: rgba(0, 0, 0, 0);
		font-weight: bold;
	}
	@keyframes rainbow{
		0% {text-shadow: 3px 0 0 rgb(217,31,38), 5px 0 0 rgb(226,91,14), 7px 0 0 rgb(245,221,8), 9px 0 0 rgb(5,148,68), 11px 0 0 rgb(2,135,206), 13px 0 0 rgb(4,77,145), 15px 0 0 rgb(42,21,113); color: rgba(0, 0, 0, 0);}
		15% {text-shadow: -3px 0 0 rgb(217,31,38), -5px 0 0 rgb(226,91,14), -7px 0 0 rgb(245,221,8), -9px 0 0 rgb(5,148,68), -11px 0 0 rgb(2,135,206), -13px 0 0 rgb(4,77,145) , -15px 0 0 rgb(42,21,113); color: rgba(0, 0, 0, 0);}
		30% {text-shadow: none; color: #FF4081;}
		45% {text-shadow: none; color: #FF4081;}
		60% {text-shadow: -3px 0 0 rgb(217,31,38), -5px 0 0 rgb(226,91,14), -7px 0 0 rgb(245,221,8), -9px 0 0 rgb(5,148,68), -11px 0 0 rgb(2,135,206), -13px 0 0 rgb(4,77,145) , -15px 0 0 rgb(42,21,113); color: rgba(0, 0, 0, 0);}
		100% {text-shadow: 3px 0 0 rgb(217,31,38), 5px 0 0 rgb(226,91,14), 7px 0 0 rgb(245,221,8), 9px 0 0 rgb(5,148,68), 11px 0 0 rgb(2,135,206), 13px 0 0 rgb(4,77,145), 15px 0 0 rgb(42,21,113); color: rgba(0, 0, 0, 0);}
	}
	</style>
	";
}

add_action( 'admin_head', 'hem_css' );

?>
