<?php

	if(!defined('ABSPATH')) exit;

	add_action( 'wp_ajax_appsaur_localization_delete_map_controller', 'appsaur_localization_delete_map_controller' );

	function appsaur_localization_delete_map_controller(){
		global $wpdb;
		$wpdb->query("DELETE FROM `".$wpdb->prefix."al_maps` WHERE `id`='".sanitize_key(@$_POST['id'])."'");
		$wpdb->query("DELETE FROM `".$wpdb->prefix."al_locations` WHERE `parent`='".sanitize_key(@$_POST['id'])."'");
		?>
		<h1>Appsaur Localizations</h1>
		<div class='cloud-primary'><?php _e('Map delete...','appsaur-localization');?></div>
		<div class='al-action-btn run' mth='main' params='' tg='wpbody-content'></div>
		<?php
		exit();
	}