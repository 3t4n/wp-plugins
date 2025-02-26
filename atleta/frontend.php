<?php

/**
 * Injects Atleta dependency in the HEAD.
 */
function atleta_inject_dependency(){
	wp_enqueue_script('atleta_embed', plugin_dir_url( __FILE__ ).'/embed.js');
}
add_action('wp_enqueue_scripts', 'atleta_inject_dependency');