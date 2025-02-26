<?php

/**
 * Plugin Name: AA Audio Player
 * Plugin URI: http://wordpress.org/aaplayer
 * Description: This is a cross browser supported audio player with playlist and shortcode enriched. This plugin is developed by Double A. For shortcode use [aaplayer src='http://yoursite.com/example.mp3'] , for playlist please read readme.txt . It is the in plugin folder.
 * Version: 1.0
 * Author: aaextention
 * Author URI: http://webdesigncr3ator.com
 * Support Email : contact2us.aa@gmail.com
 * License: GPL2
 **/
	
	
//register script and style

function reg_script_and_style() {
	wp_enqueue_script(
		'newscript',
		plugins_url( '/playlist.js' , __FILE__ ),
		array( 'jquery' )
	);
		wp_enqueue_style(
		'stylefile',
		plugins_url( '/style.css' , __FILE__ )
	);
	
	
}

//adding into header
add_action( 'wp_enqueue_scripts', 'reg_script_and_style' );

function player($atts){

    $a = shortcode_atts( array(
		'src'=> ''
    ), $atts );

	
	return ' <audio id="audio" preload="auto" tabindex="0" controls="" type="audio/mpeg">
        <source type="audio/mp3" src="'.$a['src'].'">
        Sorry, your browser does not support HTML5 audio.
    </audio>
	';

}


//Ensure your playlist here


function start_playlist(){
	return ' <ul id="playlist">';

}

function stop_playlist(){
	
	return '  </ul>';
}

function add_to_playlist($atts){
	  $a = shortcode_atts( array(
		'src'=> '',
		'name'=>''
    ), $atts );

	//return '  <li><a href="#" c="'.$a['src'].'" onclick="'."load_playlist('".$a['src']."')".'">'.$a['name'].'</a></li>';
	return '  <li><a href="#" onclick="'."load_playlist('".$a['src']."')".'">'.$a['name'].'</a></li>';
}
add_shortcode( 'aaplayer', 'player' );

add_shortcode( 'startaap', 'start_playlist' );
add_shortcode( 'stopaap', 'stop_playlist' );
add_shortcode( 'addpl', 'add_to_playlist' );



//add jquery
function include_jQuery() {
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery'); 
        wp_register_script('jquery', plugins_url( '/jquery183.js' , __FILE__ ), false, '1.8.3'); 
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'include_jQuery');





