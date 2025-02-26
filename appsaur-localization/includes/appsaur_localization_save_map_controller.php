<?php

	if(!defined('ABSPATH')) exit;

	add_action( 'wp_ajax_appsaur_localization_save_map_controller', 'appsaur_localization_save_map_controller' );

	function appsaur_localization_save_map_controller(){
		global $wpdb;
		$wpdb->query("UPDATE `".$wpdb->prefix."al_maps` SET `name`='".sanitize_text_field(@$_POST['name'])."',`center`='".sanitize_text_field(@$_POST['center'])."',`zoom`='".sanitize_text_field(@$_POST['zoom'])."',`height`='".sanitize_text_field(@$_POST['height'])."' WHERE `id`='".sanitize_key(@$_POST['id'])."'");
		?>
		<h1>Appsaur Localizations</h1>
		<div class='cloud-primary'><?php _e('Map saved...','appsaur-localization');?></div>
		<div class='al-action-btn run' mth='main' params='' tg='wpbody-content'></div>
		<?php
		exit();
	}