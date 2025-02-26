<?php

class studioInstaller {
	public function install() {
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta("CREATE TABLE IF NOT EXISTS ".STUDIO_MAP_TABLE." (
				`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				`studio_id` int(11) unsigned NOT NULL,
				`title` varchar(255) NOT NULL,
				`height` int(4) unsigned NOT NULL,
				`width` int(4) unsigned NOT NULL,
				`html` longtext NOT NULL,
				PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
		");
	}
	
	public function uninstall() {
		$tab  = STUDIO_MAP_TABLE;
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	}
}
?>