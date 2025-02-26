<?php
	
	if( ! defined('ABSPATH')){ exit(); }

	register_deactivation_hook(APPSAUR_LOCALIZATION_HOOK_PATH, 'appsaur_localization_uninstall');

	function appsaur_localization_uninstall(){
		global $wpdb;

		$wpdb->query("DROP TABLE IF EXISTS `".$wpdb->prefix."al_maps`");

		$wpdb->query("DROP TABLE IF EXISTS `".$wpdb->prefix."al_locations`");
	}