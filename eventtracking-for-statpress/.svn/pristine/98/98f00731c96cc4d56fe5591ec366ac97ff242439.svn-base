<?php

/****************************************************************************
 * プラグイン内部のみで使用する関数
 ****************************************************************************/
/**
 * プラグイン読み込みの最初に実行
 */
function jocDlChecker_init() {
  if (!defined('JOCDLCHECKER_PATH')) define('JOCDLCHECKER_PATH', plugin_dir_path(__FILE__));
  if (!defined('JOCDLCHECKER_URL'))  define('JOCDLCHECKER_URL',  plugin_dir_url(__FILE__));
}

/**
 * 有効化時に実行する関数
 */
 
	$joc_dl_ckecker_db_version = "1.0";
	
function joc_dl_checker_activate() {
	
	if( !is_plugin_active( "statpress/statpress.php" ) ){
		wp_die( _e('You need to enable "Stat press"' ) );
	}
	
	/*	statpress利用のため不要に
	global $wpdb;
	global $jal_db_version;

	$table_name = $wpdb->prefix . "dl_checker";
	if($wpdb->get_var("show tables like '$table_name'") != $table_name) {

		$sql = "
				CREATE TABLE " . $table_name . " (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`unixtime` time NOT NULL,
				`ip` tinytext NOT NULL,
				`urlrequested` text NOT NULL,
				`agent` text NOT NULL,
				`referrer` text NOT NULL,
				`os` tinytext NOT NULL,
				`browser` tinytext NOT NULL,
				`timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
				";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);

		add_option("joc_dl_ckecker_db_version", $joc_dl_ckecker_db_version);

	}
	*/
}

