<?php
/**
 * Plugin Name:     Advanced WP Table
 * Plugin URI:      https://wordpress.org/plugins/advanced-wp-table
 * Description:     An easy to use plugin to create tables in WordPress.
 * Author:          Mainul Hassan Main
 * Author URI:      https://mainulhassan.info
 * Text Domain:     advanced-wp-table
 * Domain Path:     /languages
 * Version:         1.3.2
 * License:         GPLv3
 *
 * @package         Advanced_WP_Table
 */

if ( ! function_exists( 'awt_fs' ) ) {
	/**
	 * Create a helper function for easy SDK access.
	 *
	 * @since 1.1.0
	 *
	 * @return mixed
	 *
	 * @throws \Freemius_Exception Throw error.
	 */
	function awt_fs() {
		global $awt_fs;

		if ( ! isset( $awt_fs ) ) {
			// Include Freemius SDK.
			require_once dirname( __FILE__ ) . '/includes/freemius/start.php';

			$awt_fs = fs_dynamic_init(
				array(
					'id'             => '5735',
					'slug'           => 'advanced-wp-table',
					'type'           => 'plugin',
					'public_key'     => 'pk_00b5e191384bb0759829eb9772649',
					'is_premium'     => false,
					'has_addons'     => false,
					'has_paid_plans' => false,
					'menu'           => array(
						'slug' => 'advanced-wp-table',
					),
				)
			);
		}

		return $awt_fs;
	}

	// Init Freemius.
	try {
		awt_fs();
	} catch ( Freemius_Exception $e ) {
		// Display the error message and stop executing.
		wp_die( esc_html( $e->getMessage() ) );
	}

	// Signal that SDK was initiated.
	do_action( 'awt_fs_loaded' );
}

if ( ! defined( 'ADVANCED_WP_TABLE_VERSION' ) ) {
	define( 'ADVANCED_WP_TABLE_VERSION', '1.3.2' );
}

// Include the main WooCommerce class.
if ( ! class_exists( 'Advanced_WP_Table' ) ) {
	require_once dirname( __FILE__ ) . '/includes/class-advanced-wp-table.php';
}

/**
 * The code that runs during plugin activation.
 *
 * @since 1.3.1
 */
function advanced_wp_table_activate() {
	require_once dirname( __FILE__ ) . '/includes/class-advanced-wp-table-activator.php';
	Advanced_WP_Table_Table_Activator::activate();
}

register_activation_hook( __FILE__, 'advanced_wp_table_activate' );

/**
 * Try to run the migration using 'upgrader_process_complete' hook.
 *
 * @param WP_Upgrader $upgrader_object
 * @param array       $options
 *
 * @since 1.3.2
 *
 * @return void
 */
function advanced_wp_table_updated( $upgrader_object, $options ) {
	error_log( 'called the function advanced_wp_table_updated' );

	// Check if the updated plugin is your plugin
	if ( $options['action'] === 'update' && $options['type'] === 'plugin' && isset( $options['plugins'] ) ) {
		error_log( 'we are inside the plugin update condition' );

		$updated_plugins = $options['plugins'];

		$db_version_option_key = 'advanced_wp_table_db_version';

		// Check if your plugin is in the list of updated plugins
		if ( in_array( 'advanced-wp-table/advanced-wp-table.php', $updated_plugins ) ) {
			error_log( 'we are checking if migration should be run' );

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

				error_log( 'The migration ran successfully' );
			}
		}
	}
}

add_action( 'upgrader_process_complete', 'advanced_wp_table_updated', 10, 2 );

if ( ! function_exists( 'advanced_wp_table_run' ) ) {
	/**
	 * Run the class.
	 *
	 * @since 1.0.0
	 *
	 * @return \Advanced_WP_Table
	 */
	function advanced_wp_table_run() {
		return Advanced_WP_Table::instance();
	}

	advanced_wp_table_run();
}
