<?php

	if(!defined('ABSPATH')) exit;

	add_action( 'wp_ajax_appsaur_localization_delete_localization_controller', 'appsaur_localization_delete_localization_controller' );

	function appsaur_localization_delete_localization_controller(){
		global $wpdb;
		?>
		<h1>Appsaur Localizations</h1>
		<?php
		$wpdb->query("DELETE FROM `".$wpdb->prefix."al_locations` WHERE `id`='".esc_html(@$_POST['id'])."'");
		
		?>
		<div class='cloud-primary'><?php _e('Delete localization...','appsaur-localization');?></div>
		<div class='al-action-btn run' mth='localizations' params='id:<?php echo esc_html(@$_POST['pid']);?>;' tg='wpbody-content'></div>
		<?php
		exit();
	}