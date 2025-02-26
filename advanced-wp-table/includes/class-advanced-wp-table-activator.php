<?php
/**
 * Advanced WP Table Activator.
 *
 * @since   1.3.1
 *
 * @package Advanced_WP_Table
 */

/**
 * Class Advanced_WP_Table_Table_Activator
 *
 * @since 1.3.1
 */
class Advanced_WP_Table_Table_Activator {

	/**
	 * This is to check if the automatic update of wp plugin can migrate the plugin data.
	 *
	 * @since 1.3.1
	 *
	 * @return void
	 */
	public static function activate() {
		$db_version_option_key = 'advanced_wp_table_db_version';

		if ( ! get_option( $db_version_option_key ) ) {
			$tables = get_posts(
				array(
					'post_type'   => 'advanced-wp-table',
					'post_status' => 'any',
					'fields'      => 'ids',
				)
			);

			foreach ( $tables as $table_id ) {
				$table_content = get_post_meta( $table_id, 'advanced_wp_table_data', true );
				update_post_meta( $table_id, 'advanced_wp_table_content', $table_content );
			}

			// Update the db version.
			update_option( $db_version_option_key, ADVANCED_WP_TABLE_VERSION );
		}
	}

}
