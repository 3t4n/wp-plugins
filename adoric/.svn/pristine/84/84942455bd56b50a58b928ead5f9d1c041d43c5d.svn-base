<?php

defined( 'ABSPATH' ) or exit;

class adoric_sql
{
    private static  $adoric_table_name = 'adoric_data' ;
    
    public function __construct() {}
    
    public function delete_adoric_table()
    {
        global  $table_prefix, $wpdb ;
        $table_name = $table_prefix . self::$adoric_table_name;
        $query = "DROP TABLE IF EXISTS {$table_name}";
        $wpdb->query( $query );
    }

    public function create_adoric_table() {
        global  $table_prefix, $wpdb ;
        $table_name = $table_prefix . self::$adoric_table_name;
       
        if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}';" ) !== $table_name ) {
            $query = "CREATE TABLE {$table_name} (`id` int(11) unsigned NOT NULL AUTO_INCREMENT, `domain_id` LONGTEXT DEFAULT '', `account_id` LONGTEXT DEFAULT '', `embed_code` LONGTEXT DEFAULT '', PRIMARY KEY (`id`));";
            $wpdb->query( $query );
        }

    }
    
    public function update_account_data( $args )
    {
        $args = wp_parse_args( $args, [
            'account_id' => '',
            'domain_id' => '',
            'embed_code' => ''
        ] );
        $result = null;
        
        global  $table_prefix, $wpdb ;
        
        $table_name = $table_prefix . self::$adoric_table_name;

        $row = $wpdb->get_row("SELECT * FROM {$table_name} LIMIT 1");
        
        $wpdb->hide_errors();
        
        if ( empty($row) ) {
            $result = $wpdb->insert( $table_name, $args );
        } else {
            $result = $wpdb->update( $table_name, $args, [
                'id' => $row -> id,
            ] );
        }
        
        if ($result === FALSE) {
            wp_send_json_error($wpdb->last_error);
            wp_die();
        } else {
            return $result;
        }
    }
    
    public function get_account_data()
    {
        global  $table_prefix, $wpdb ;
        
        $table_name = $table_prefix . self::$adoric_table_name;

        $row = $wpdb->get_row("SELECT * FROM {$table_name} LIMIT 1");
        
        if ( !(empty($row)) && !(is_null($row)) ) {
            return $row;
        }
        
        return null;
    }
}
