<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

if ( is_multisite() ) {
    $current_blog = $wpdb -> blogid;
    // Get all blogs in the network and activate plugin on each one
    $blog_ids = $wpdb -> get_col( "SELECT blog_id FROM $wpdb -> blogs" );
    foreach ( $blog_ids as $blog_id ) {
        switch_to_blog( $blog_id );
        $table_name = $wpdb -> prefix . 'appts_tables_data';
        $charset_collate = $wpdb -> get_charset_collate();
        $sql = "CREATE TABLE $table_name (
				  id int(11) AUTO_INCREMENT primary key NOT NULL,
				  name varchar(25) NOT NULL,
				  sid varchar(255) NOT NULL,
				  table_data longtext NOT NULL,
				  created_date timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
		  		  last_modified_date timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
				) $charset_collate";
        dbDelta( $sql );
        restore_current_blog();
    }
} else {
    $table_name = $wpdb -> prefix . 'appts_tables_data';
    $charset_collate = $wpdb -> get_charset_collate();
    $sql = "CREATE TABLE $table_name (
			  id int(11) AUTO_INCREMENT primary key NOT NULL,
			  name varchar(25) NOT NULL,
			  sid varchar(255) NOT NULL,
			  table_data longtext NOT NULL,
			  created_date timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	  		  last_modified_date timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
			) $charset_collate";
    dbDelta( $sql );
}