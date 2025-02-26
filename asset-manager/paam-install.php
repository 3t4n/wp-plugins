<?php
/**
 * Plugin activation/deactivation. Create necessary
 * tables and directories. Tables are not uninstalled
 * on deactivation by default, but you can comment
 * out the last line in this file to uninstall them
 * the next time you deactivate if needed.
 */
 
/*****************************************************
 * Activation
 *****************************************************/
/**
 * Install tables and attempt to create upload folder.
 */
function paam_install() {
	// create upload folder
	$upload_info = wp_upload_dir();
	$upload_folder = $upload_info['basedir'];
	if (!is_writable($upload_folder)) {
		die("Assets manager folder does not exist or is not writable. Please create the folder $upload_folder and give it write permissions.");
		return false;
	}
	if (!file_exists(PAAM_IMAGEUPLOADPATH)) {
		mkdir(PAAM_IMAGEUPLOADPATH) or die("Could not create folder " . PAAM_IMAGEUPLOADPATH . ". Please create this folder manually and give it write permissions.");	
	}
	
	if (!file_exists(PAAM_TEMPPATH)) {
		mkdir(PAAM_TEMPPATH) or die("Could not create folder " . PAAM_TEMPPATH . ". Please create this folder manually and give it write permissions.");	
	}
	
	// Setup database
	paam_install_sku_db();
	paam_install_assets_db();
}

/**
 * Create sku table
 */
function paam_install_sku_db() {
	global $wpdb;
	$wpdb->query('CREATE TABLE  `' . PAAM_DB_SKUS . '` (
				  `sku_id` int(10) unsigned NOT NULL auto_increment,
				  `post_id` int(10) unsigned NOT NULL,
				  `sku_name` varchar(45) NOT NULL,
				  `sku_description` text,
				  `sku_thumbnail` varchar(500),
				  PRIMARY KEY  (`sku_id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;');
}

/**
 * Create assets table
 */
function paam_install_assets_db() {
	global $wpdb;
	$wpdb->query('CREATE TABLE `' . PAAM_DB_ASSETS . '` (
					`asset_id` int(10) unsigned NOT NULL auto_increment,
					`sku_id` int(10) unsigned NOT NULL,
					`asset_title` varchar(500),
					`asset_filename` varchar(500),
					PRIMARY KEY (`asset_id`)
				  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;');
}

register_activation_hook(PAAM_PLUGINDIR . 'asset-manager.php', 'paam_install');

/*****************************************************
 * Deactivation
 *****************************************************/
function paam_uninstall() {
	global $wpdb;
	$wpdb->query('DROP TABLE IF EXISTS ' . PAAM_DB_SKUS . '');
	$wpdb->query('DROP TABLE IF EXISTS ' . PAAM_DB_ASSETS . '');
	// Intentionally not deleting uploads (I figured there is the change that
	// users may not have kept copies of these slides if they need them later
	// and the disk space used will be miniscule.
}

// uncomment next line to drop tables used for this plugin upon deactivation
//register_deactivation_hook(PAAM_PLUGINDIR . 'assets-manager.php', 'paam_uninstall');