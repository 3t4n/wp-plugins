<?php

class Ampsy_Tables {
	public function create() {
		global $wpdb;
		$table_name = $wpdb->prefix . "ampsy_widgets";

		if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'") != $table_name ) {
			$sql = 'CREATE TABLE '.$table_name.'(
					id INTEGER NOT NULL AUTO_INCREMENT,
					name VARCHAR(255),
					width VARCHAR(255),
					height VARCHAR(255),
					instance_key VARCHAR(255),
					border TINYINT(1),
					PRIMARY KEY (id))';
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}

	public function delete() {
		global $wpdb;
		$table_name = $wpdb->prefix . "ampsy_widgets";

		if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'") == $table_name ) {
			$wpdb->query( "DROP TABLE {$table_name}" );
		}
	}
}

?>
