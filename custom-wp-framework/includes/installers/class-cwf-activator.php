<?php

namespace Custom_WP_Framework\Includes\Installers;

// Exit if accessed directly.
if ( ! defined ( 'ABSPATH' ) ) { 
	exit(); 
} 

/**
 * Class for activating the plugin.
 * 
 * @since	1.0.0
 */
class CWF_Activator {

	/**
	 * Activate the plugin.
	 * 
	 * Create the data structures necessary for plugin execution.
	 * 
	 * @since 	1.0.0
	 * @param	void
	 * @return	void
	 */
	public static function activate_cwf_plugin() {
		/**
		 * If the version number is not found in the options table, upgrade the database.
		 */ 
		if( ! get_option( 'custom_wp_framework_version' ) ) {

			/**
			 * Function call to create the necessary database tables.
			 */
			self::create_cwf_tables();
		}
		else { 

			/**
			 * If the version number is found but is lower than the current plugin version, upgrade the database.
			 */
			if( version_compare( get_option( 'custom_wp_framework_version' ) , CUSTOM_WP_FRAMEWORK_VERSION ) == -1 ) {

				/**
				 * Function call to create the necessary database tables.
				 */
				self::create_cwf_tables();
			} 
		}

		/**
		 * Update the version number in the options table.
		 */ 
		update_option( 'custom_wp_framework_version', CUSTOM_WP_FRAMEWORK_VERSION );


		/**
		 * Update the 'rewrite' required flag to true to queue rewrite flush. 
		 */
		update_option( 'cwf_rewrite_required', 1 );
	}

	/**
	 * Create custom database tables for plugin.
	 * 
	 * Create a database table to store registered Custom Post Types. 
	 * 
	 * @since	1.0.0
	 * @param	void
	 * @return	void
	 */
	function create_cwf_tables() {

		/**
		 * The WordPress class to interact with the database.
		 * 
		 * @since 	1.0.0
		 * @var		object	$wpdb
		 */
		global $wpdb;

		/**
		 * File that contains the function needed to upgrade the database.
		 */
		require_once ( ABSPATH . '/wp-admin/includes/upgrade.php' );

		/**
		 * Set the default database character set and collation to match core WordPress. 
		 * 
		 * @since 	1.0.0
		 * @var		string	$charset_collate
		 */
		$charset_collate = 'DEFAULT CHARACTER SET ' . $wpdb->charset . ' COLLATE ' . $wpdb->collate;

		/**
		 * The table name for storing the custom post types. 
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
		$sql = 'CREATE TABLE ' . $table_name . ' (
			id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			cpt_key varchar(20) NOT NULL,
			cpt_args longtext,
			cpt_is_active tinyint(1),
			cpt_date_created datetime,
			cpt_date_modified datetime,
			cpt_last_modified_by bigint(20),
			PRIMARY KEY (id),
			UNIQUE INDEX cpt_UNIQUE (cpt_key ASC)  
			) ' . $charset_collate . ';';

		/**
		 * Call function that creates the database table for the custom post types. 
		 */
		dbDelta($sql);
	}
}