<?php

	if(!defined('ABSPATH')) exit;

	add_action( 'wp_ajax_appsaur_localization_new_map_controller', 'appsaur_localization_new_map_controller' );

	function appsaur_localization_new_map_controller(){
		global $wpdb;
		$wpdb->query("INSERT INTO `".$wpdb->prefix."al_maps` (`name`,`center`,`zoom`,`height`) VALUES ('".sanitize_text_field(@$_POST['name'])."','".sanitize_text_field(@$_POST['center'])."','".sanitize_key(@$_POST['zoom'])."','".sanitize_key(@$_POST['height'])."')");
		?>
		<h1>Appsaur Localizations</h1>
		<div class='cloud-primary'><?php _e('Map saved...','appsaur-localization');?></div>
		<div class='al-action-btn run' mth='main' params='' tg='wpbody-content'></div>
		<?php
		exit();
	}