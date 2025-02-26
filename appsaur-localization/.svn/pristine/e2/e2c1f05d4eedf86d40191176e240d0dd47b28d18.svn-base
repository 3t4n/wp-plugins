<?php

	if(!defined('ABSPATH')) exit;

	add_action( 'wp_ajax_appsaur_localization_save_settings_controller', 'appsaur_localization_save_settings_controller' );

	function appsaur_localization_save_settings_controller(){
		global $wpdb;
		?>
		<h1>Appsaur Localizations</h1>
		<?php
		$key=get_option('ALKEY');

		if($key){
			$wpdb->query("INSERT INTO `".$wpdb->prefix."options` (`option_name`,`option_value`) VALUES ('ALKEY','".sanitize_text_field(@$_POST['alkey'])."')");
		}else{
			$wpdb->query("UPDATE `".$wpdb->prefix."options` SET `option_value`='".sanitize_text_field(@$_POST['alkey'])."' WHERE `option_name`='ALKEY'");
		}
		
		?>
		<div class='cloud-primary'><?php _e('Saved API key','appsaur-localization');?></div>
		<div class='al-action-btn run' mth='main' params='' tg='wpbody-content'></div>
		<?php
		exit();
	}