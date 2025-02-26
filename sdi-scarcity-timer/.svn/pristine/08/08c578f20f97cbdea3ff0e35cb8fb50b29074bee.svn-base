<?php
/**
 * @package sdi-scarcity
 * @version 0.1
 */

 function sdiTimer($attr, $content){ 
	return (new SdiCampaign())->timer($attr, $content); 
}
add_shortcode( 'sdi-timer', 'sdiTimer');

// Enqueue our styles and scripts
add_action( 'wp_enqueue_scripts', function(){
	(new SdiScarcity())->assets();
} );

//Timer Ajax Hook
function sdi_update_timer() { (new SdiCampaign())->updateTimer(); }
add_action( 'wp_ajax_sdi_update_timer', 'sdi_update_timer' );
add_action( 'wp_ajax_nopriv_sdi_update_timer', 'sdi_update_timer' );