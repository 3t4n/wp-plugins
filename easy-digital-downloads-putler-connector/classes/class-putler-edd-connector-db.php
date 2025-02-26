<?php
/**
 * Class for handling the db updates.
 *
 * @package     easy-digital-downloads-putler-connector/classes/
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Putler_EDD_Connector_DB' ) ) {

	/**
	 * Class Putler_EDD_Connector_DB
	 */
	class Putler_EDD_Connector_DB {
		/**
		 * Do update on the DataBase
		 *
		 * @return void
		 */
		public function do_db_update() {
			global $wpdb;
			// For multisite table prefix.
			if ( is_multisite() ) {
				$blog_ids = $wpdb->get_col( "SELECT blog_id FROM {$wpdb->blogs}" ); // WPCS: cache ok, db call ok.
				foreach ( $blog_ids as $id ) {
					if ( empty( $id ) ) {
						continue;
					}
					$id = intval( $id );
					switch_to_blog( $id );
					$this->create_required_tables();
					restore_current_blog();
				}
			} else {
				$this->create_required_tables();
			}
		}

		/**
		 * Create table to store subscription modified time
		 *
		 * @return void
		 */
		public function create_required_tables() {
			global $wpdb;
			if ( 'yes' === get_option( '_eddpc_subscription_table_created', 'no' ) ) {
				return;
			}
			$collate = '';
			if ( $wpdb->has_cap( 'collation' ) ) {
				$collate = $wpdb->get_charset_collate();
				if ( ! empty( $wpdb->collate ) ) {
					$collate .= " COLLATE $wpdb->collate";
				}
			}
			if ( empty( $collate ) ) {
				return;
			}
			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			$dd_tables = "
				CREATE TABLE IF NOT EXISTS {$wpdb->prefix}eddpc_subscription ( 
				    subscription_id BIGINT NOT NULL ,
				    modified_time INT(11) NOT NULL , 
				    PRIMARY KEY (subscription_id)
			    ) $collate;
				";
			dbDelta( $dd_tables );
			update_option( '_eddpc_subscription_table_created', 'yes' );
		}
	}
}
