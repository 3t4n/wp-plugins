<?php

namespace Soft_Accordion;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Install
 */
class Install {

	/**
	 * Instance of the class.
	 *
	 * @var self|null
	 */
	protected static $instance = null;

	/**
	 * Active
	 *
	 * @return void
	 */
	public static function activate() {
		self::create_table();
		self::create_default_data();
	}

	/**
	 * Deactive
	 *
	 * @return void
	 */
	public static function deactivate() {
		flush_rewrite_rules();
	}

	/**
	 * Create Table
	 *
	 * @return void
	 */
	public static function create_table() {
		global $wpdb;

		$wpdb->hide_errors();

		include_once ABSPATH . 'wp-admin/includes/upgrade.php';

		$sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}soft_accordion (
					id INT(11) NOT NULL AUTO_INCREMENT,
                	is_active TINYINT(1) NOT NULL DEFAULT 1,
    				title VARCHAR(255) NULL,
    				type TEXT NOT NULL,
					custom_data LONGTEXT NOT NULL,
    				post_data LONGTEXT NOT NULL,
        			settings LONGTEXT NOT NULL,
					created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
					updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
					PRIMARY KEY (id)
					) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

		dbDelta( $sql );
	}


	/**
	 * Create plugin settings default data
	 *
	 * @since 1.0.0
	 */
	private static function create_default_data() {

		$version      = get_option( 'soft_accordion_version', '0' );
		$db_version   = get_option( 'soft_accordion_db_version', '0' );
		$install_time = get_option( 'soft_accordion_install_time', '' );

		if ( empty( $version ) ) {
			update_option( 'soft_accordion_version', SOFT_ACCORDION_VERSION );
		}

		if ( empty( $db_version ) ) {
			update_option( 'soft_accordion_db_version', '1.0.0' );
		}

		if ( empty( $install_time ) ) {
			update_option( 'soft_accordion_install_time', time() );
		}
	}

	/**
	 * Get the instance of Install class.
	 *
	 * @since 1.0.0
	 * @return Install
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}
