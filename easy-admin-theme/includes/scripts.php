<?php

/* ------------------------------------------------------------------
 * Load JS on Frontend
 * --------------------------------------------------------------- */

function eat_load_front_scripts() {
	
	// front javascript calls here
	/* wp_enqueue_script('eat-front-scripts', plugins_url( 'assets/js/xxx.js' , dirname(__FILE__) ) ); */
	
}
add_action('wp_head', 'eat_load_front_scripts');

/* ------------------------------------------------------------------
 * Load JS for Administration Only
 * --------------------------------------------------------------- */

function eat_load_admin_scripts($hook) {
 
	global $eat_settings_page;
 
	if( $hook != $eat_settings_page ) 
		return;
 
	// Enqueues Needed Admin Styles
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-sortable');

	wp_enqueue_script('eat-admin-scripts', plugins_url( 'includes/js/admin-scripts.js' , dirname(__FILE__) ) );

}

add_action('admin_enqueue_scripts', 'eat_load_admin_scripts');


?>