<?php 

	if( ! defined('ABSPATH')){ exit(); }

	register_activation_hook(APPSAUR_LOCALIZATION_HOOK_PATH, 'appsaur_localization_install' );
	
	function appsaur_localization_install(){
		global $wpdb;
		
		$charset_collate = $wpdb->get_charset_collate();

		$wpdb->query("CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."al_maps` (`id` INT NOT NULL AUTO_INCREMENT,`name` VARCHAR(32) NOT NULL,`center` VARCHAR(32) NOT NULL,`zoom` INT NOT NULL,`height` INT NOT NULL,PRIMARY KEY  (id)) $charset_collate;");

		$wpdb->query("CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."al_locations` (`id` INT NOT NULL AUTO_INCREMENT,`name` TEXT NOT NULL,`city` VARCHAR(48) NOT NULL,`street` TEXT NULL,`code` VARCHAR(8) NULL,`desc` TEXT NULL,`link` TEXT NULL,`parent` INT NOT NULL,`lat` REAL NOT NULL,`lng` REAL NOT NULL,PRIMARY KEY  (id)) $charset_collate;");
	}
	
?>