<?php

namespace Custom_WP_Framework\Includes\Installers;

// Exit if accessed directly.
if ( ! defined ( 'ABSPATH' ) ) { 
	exit(); 
} 

/**
 * Class for deactivating the plugin.
 * 
 * @since	1.0.0
 */
class CWF_Deactivator {

	/**
	 * Deactivate the plugin.
	 * 
	 * Clean up and delete any unnecessary data.
	 * 
	 * @since 	1.0.0
	 * @param	void
	 * @return	void
	 */
	public static function deactivate_cwf_plugin() {

		/**
		 * Flush rewrite rules on deactivation.
		 */
		flush_rewrite_rules();

		/**
		 * Delete the version number from the options table.
		 */
		delete_option( 'custom_wp_framework_version' );

		/**
		 * Delete the 'rewrite' required flag from the options table.
		 */
		delete_option( 'cwf_rewrite_required' );
		
	}
}