<?php
/**
 * @package ah_lek
 * @version 1.0
 */
/*
Plugin Name: Lek Lek
Plugin URI: http://valeriosouza.com.br
Description: Coloque o Lek Lek no seu WordPress
Author: Valério Souza
Version: 1.0.4
Author URI: http://valeriosouza.com.br
*/

function leklek_music() {
	/** These are the text to Hello Dolly */
	$text = "Aaaaaaaaah lelek lek lek lek lek lek lek lek lek lek
Girando girando girando para o lado
Girando girando girando pro outro
Aaaaaaaaah lelek lek lek lek lek lek lek lek lek lek
Girando girando girando para o lado
Girando girando girando pro outro
No passinho do volante, Quero ver o baile todo
Esse é o novo passinho pra geral se amarrar
Ele é muito maneiro, qualquer um pode mandar
É a revelação aqui do Rio de Janeiro
Se você aprender vai mandar o tempo inteiro
Pois nas comunidades esse passinho já estourou
Dança até titia, vovó e também vovô
Mas preste atenção agora vou te ensinar
O passinho do volante pra você também mandar
Aaaaaaaaah lelek lek lek lek lek lek lek lek lek lek
Girando girando girando para o lado
Girando girando girando pro outro
No passinho do volante, Quero ver o baile todo";

	// Here we split it into lines
	$text = explode( "\n", $text );

	// And then randomly choose a line
	return wptexturize( $text[ mt_rand( 0, count( $text ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function ah_lek() {
	$chosen = leklek_music();
	echo "<p id='lek'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'ah_lek' );

// We need some CSS to position the paragraph
function css() {
	
	echo "
	<style type='text/css'>
	#lek {
		float: right;
		padding-left: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'css' );

?>
