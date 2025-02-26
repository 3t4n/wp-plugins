<?php
/**
 * デタベスプラグインが有効になった際に、データベースを作成して利用できる環境を整える
 */
function dtbs_create_db_tables() {

	global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	$table_search = $wpdb->get_row( 'SHOW TABLES FROM ' . DB_NAME . " LIKE '" . $wpdb->prefix . "dtbs'" );

	if ( empty( $table_search ) ) {

		$sql1 = 'CREATE TABLE `' . $wpdb->prefix . "dtbs` (
							`cd_id` smallint(2) unsigned NOT NULL AUTO_INCREMENT,
							`cd_title` varchar(32) NOT NULL,
							`cd_admin_rows` int(4) unsigned NOT NULL DEFAULT '0',
							`cd_pub_rows` int(4) unsigned NOT NULL DEFAULT '0',
							`cd_search_word` enum('y','n') NOT NULL DEFAULT 'n',
							`cd_dir_name` varchar(32) DEFAULT NULL,
							`cd_rewrite` enum('y','n') NOT NULL DEFAULT 'n',
							PRIMARY KEY (`cd_id`)
						) ENGINE=InnoDB " . $charset_collate;
		dbDelta( $sql1 );

		$sql2 = 'CREATE TABLE `' . $wpdb->prefix . "dtbs_detail` (
							`cdd_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
							`cdi_id` int(4) unsigned NOT NULL,
							`cdd_current_id` int(4) unsigned NOT NULL DEFAULT '0',
							`cdd_value` varchar(128) NOT NULL,
							`cdd_sort_no` smallint(2) unsigned NOT NULL DEFAULT '0',
							PRIMARY KEY (`cdd_id`),
							UNIQUE KEY `dtbs_id_value` (`cdi_id`,`cdd_value`)
						) ENGINE =InnoDB " . $charset_collate;
		dbDelta( $sql2 );

		$sql3 = 'CREATE TABLE `' . $wpdb->prefix . "dtbs_item` (
							`cdi_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
							`cd_id` smallint(2) unsigned NOT NULL,
							`cdi_current_id` int(4) unsigned NOT NULL DEFAULT '0',
							`cdi_title` varchar(32) NOT NULL,
							`cdi_style` enum('pulldown','radio','checkbox') NOT NULL,
							`cdi_sort_no` smallint(2) unsigned NOT NULL DEFAULT '0',
							PRIMARY KEY (`cdi_id`)
						) ENGINE =InnoDB " . $charset_collate;
		dbDelta( $sql3 );

		$sql4 = 'CREATE TABLE `' . $wpdb->prefix . 'dtbs_match` (
							`ID` bigint(20) unsigned NOT NULL,
							`cdd_id` int(4) unsigned NOT NULL,
							KEY `mID` (`ID`)
						) ENGINE =InnoDB ' . $charset_collate;
		dbDelta( $sql4 );

		$sql5 = 'CREATE TABLE `' . $wpdb->prefix . 'dtbs_target` (
							`cd_id` smallint(2) unsigned NOT NULL,
							`cd_target` varchar(32) NOT NULL,
							UNIQUE KEY `' . $wpdb->prefix . 'dtbs_target` (`cd_id`,`cd_target`)
						) ENGINE =InnoDB ' . $charset_collate;
		dbDelta( $sql5 );

	}
}

/**
 * デタベスプラグインが削除された際に、データベースを削除する
 */
function dtbs_delete_db_tables() {

	global $wpdb;

	$dtbs_table_name = array( 'dtbs', 'dtbs_detail', 'dtbs_item', 'dtbs_match', 'dtbs_target' );
	foreach ( $dtbs_table_name as $tale_name ) {
		$sql = 'DROP TABLE ' . $wpdb->prefix . $tale_name;
		$wpdb->query( $sql );
	}

}

?>