<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * AVUTI Option Exist checker
 *
 * AVUTI Option Exist checker is for work better plugin options
 *
 * @since 2.0
 */
 
$avutioptionnames=array(
	'avutimoji',
	'avutidashicon',
	'avutijquery',
	'avutiguten'
);

$opt = isset($opt) ? $opt : '';
if (!option_exists( $opt )) {
		foreach($avutioptionnames as $opt) {
		add_option( $opt, '' );
	} 
}
function option_exists($name, $site_wide=false){
    global $wpdb; return $wpdb->query("SELECT * FROM ". ($site_wide ? $wpdb->base_prefix : $wpdb->prefix). "options WHERE option_name ='$name' LIMIT 1");
}