<?php

namespace Custom_WP_Framework\Includes\Installers;

// Exit if accessed directly.
if ( ! defined ( 'ABSPATH' ) ) { 
	exit(); 
} 

/**
 * Class for uninstalling the plugin.
 * 
 * @since   1.0.0
 */
class CWF_Uninstaller {

    /**
     * Uninstall the plugin
     * 
     * Clean up and delete data and database structures.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public static function uninstall_cwf_plugin() {

        /**
         * Delete plugin tables from database.
         */
        self::delete_tables();
    }

    /**
     * Delete plugin tables from database.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void 
     */
    function delete_tables() {
        /**
         * The WordPress class to interact with the database.
         * 
         * @since 	1.0.0
         * @var		object	$wpdb
         */
        global $wpdb;
        
        /**
         * The table name that stores the custom post types. 
         * 
         * @since 	1.0.0
         * @var		string	$table_name
         */
        $table_name = $wpdb->prefix . 'cwf_custom_post_types';

        /**
         * The SQL for creating a database table to store custom post types. 
         * 
         * @since 	1.0.0
         * @var		string	$sql
         */
        $sql = "DROP TABLE IF EXISTS $table_name";

        /**
         * Execute SQL for deleting custom post types table.
         */
        $wpdb->query( $sql );
    }
}