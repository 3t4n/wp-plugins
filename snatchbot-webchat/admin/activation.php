<?php 

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('SBW_Activation') ) :
	
class SBW_Activation {
	
	/**
	 * __construct
	 *
	 * Sets up the class functionality.
	 *
	 * @date	23/11/19
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */
	 function __construct() {
		
		// Add hooks.
		register_activation_hook( SBW_MAIN_FILE_PATH, array( $this, 'myplugin_activate' ) );
		register_deactivation_hook( SBW_MAIN_FILE_PATH, array( $this, 'myplugin_deactivate' ) );
	}
	
	/**
	 * myplugin_activate
	 *
	 * @date	23/11/19
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */
	function myplugin_activate(){
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
	
		$table = $wpdb->prefix . 'snatchbot_webchat';
		$checkTable = $wpdb->get_var( $wpdb->prepare("SHOW TABLES LIKE %s", $table) );

		if ($checkTable != $table ) {
			$sql  = "CREATE TABLE $table (
					id INT(20) AUTO_INCREMENT,
					bot_id INT(10),
					is_deploy Boolean,
					wp_user_id INT(10) NOT NULL,
					snatch_user_id INT(10),
					auth_token VARCHAR(1024),
					refresh_token VARCHAR(1024),
					email VARCHAR(255),
					user_name VARCHAR(255),
					full_name VARCHAR(255),
					created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
					updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
					PRIMARY KEY(id)) $charset_collate";
	
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		}
	}
	
	/**
	 * myplugin_deactivate
	 *
	 * @date	23/11/19
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */
	function myplugin_deactivate(){
		global $wpdb;
		$table = $wpdb->prefix . 'snatchbot_webchat';
		$wpdb->query( "DROP TABLE IF EXISTS {$table}");
	}
}

// Instantiate.
sbw_new_instance('SBW_Activation');

endif; // class_exists check
