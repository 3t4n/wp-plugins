<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 

function as_after_plugin_loaded(){
	load_plugin_textdomain( 'asm', false, as_root_metabox . '/lang' ); 
}

add_action( 'plugins_loaded', 'as_after_plugin_loaded' );