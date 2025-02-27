<?php
// If this file is called directly, abort.
if (!defined("ABSPATH")) {
	exit();
}

function combar_sab_restart_options() { 

	$option = $_POST['option']; 
	$validate = check_ajax_referer( 'sab-restart', 'wpnonce' );
	$allowed = array('combar_sab_setting_desk', 'combar_sab_setting_mob', 'combar_sab_general_setting');
	$restarted = array();
	if ('combar_sab_general_setting' == $option) {
		$restarted['hash'] = 'on';
		$restarted['esc'] = 'on';
		$restarted['fontawesome'] = 'on';
		$restarted['minified'] = 'on';
		$restarted['tablet'] = 'mob';
	}
	
	if (in_array($option, $allowed)) {
		update_option($option, $restarted);
		die(true);	
	} else {
		die(false);
	}
	
}
add_action( 'wp_ajax_nopriv_combar_sab_restart_options', 'combar_sab_restart_options' );
add_action( 'wp_ajax_combar_sab_restart_options', 'combar_sab_restart_options' );