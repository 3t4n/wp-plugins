<?php
defined('ABSPATH') || die("Nice try");


register_activation_hook(CUSTOMSHAPEDIVIDERS_PLUGIN_FILE, function(){
	global $wpdb;

	$table_name = $wpdb->prefix . 'customshapebuild';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id int(11) NOT NULL AUTO_INCREMENT,
		iwantit int(11) NULL NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );

	global $wpdb;
	$prefix = $wpdb->prefix;
	$table = $prefix.'customshapebuild';
	$data = array(
		"iwantit"=>1
	);
	$wpdb->insert($table, $data);



});
register_deactivation_hook(CUSTOMSHAPEDIVIDERS_PLUGIN_FILE,function(){
	// global $wpdb;
	// $prefix = $wpdb->prefix;
	// $table = $prefix.'likesdislikes';
	// $sql = "TRUNCATE TABLE $table;";
	// $wpdb->query($sql);


});
