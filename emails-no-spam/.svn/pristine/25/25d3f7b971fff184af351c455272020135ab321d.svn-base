<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $wpdb;

$table_name = $wpdb->prefix . 'my_lists';
$charset_collate = $wpdb->get_charset_collate();
$sql = "CREATE TABLE IF NOT EXISTS $table_name (
  id_list int(15) NOT NULL AUTO_INCREMENT,
  id_msg int(11) NOT NULL,
  list_name varchar(55) NOT NULL,
  date_init int(15) NOT NULL,
  quantity int(11) NOT NULL,
  sends int(11) NOT NULL,
  last_send int(11) NOT NULL,
  last_server int(11) NOT NULL,
  list_unsubscribe varchar(255) NOT NULL,
  PRIMARY KEY  (id_list)
) $charset_collate;";
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );
?>