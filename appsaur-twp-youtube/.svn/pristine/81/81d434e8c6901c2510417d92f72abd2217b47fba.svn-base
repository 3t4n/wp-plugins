<?php 
	class install{
		function install(){
			global $wpdb;
			$charset_collate = $wpdb->get_charset_collate();

			$wpdb->query("CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."twp_vid_cat` (`id` INT NOT NULL AUTO_INCREMENT,`title` VARCHAR(32) NOT NULL,`name` VARCHAR(32) NOT NULL,PRIMARY KEY  (id)) $charset_collate;");

			$wpdb->query("CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."twp_vid` (`id` INT NOT NULL AUTO_INCREMENT,`title` TEXT NOT NULL,`vid` VARCHAR(32) NOT NULL,`cat` LONGTEXT NULL,`thumbnail` INT NOT NULL,PRIMARY KEY  (id)) $charset_collate;");
		}
	}
	$obj=new install();
?>