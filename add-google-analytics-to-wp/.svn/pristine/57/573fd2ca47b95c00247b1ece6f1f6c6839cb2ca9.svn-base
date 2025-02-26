<?php
class Meetanshi_sql {
    public static function mdetector_activate(){
        global $wpdb;
        $table_name = $wpdb->prefix . "m_analtics" ;
        if($wpdb->get_var('SHOW TABLE LIKE ' . $table_name) != $table_name)
        {
            $sql='CREATE TABLE ' .$table_name. '(
		id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
		hit_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		g_code VARCHAR(30) DEFAULT 0,
		mit_flag VARCHAR(10) DEFAULT 0,
		PRIMARY KEY (id))';

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
            add_option('mdetector_datebase_version'.'1.0');
        }
    }
}