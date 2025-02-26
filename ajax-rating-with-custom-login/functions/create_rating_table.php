<?php
function mith_arcl_create_rating_table(){ 

//create rating table //

global  $wpdb;
	$table_name  = $wpdb->prefix . "ratings";
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	user_id varchar (255) NOT NULL,
	post_id varchar (255) NOT NULL,
	 
	rating_value varchar(255) DEFAULT '' NOT NULL,
	  time timestamp  DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	  UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}

register_activation_hook( __FILE__, 'mith_arcl_create_rating_table' );

?>