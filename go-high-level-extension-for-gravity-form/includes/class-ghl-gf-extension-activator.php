<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.ibsofts.com
 * @since      5.0.7
 *
 * @package    Ghl_Gf_Extension
 * @subpackage Ghl_Gf_Extension/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      5.0.7
 * @package    Ghl_Gf_Extension
 * @subpackage Ghl_Gf_Extension/includes
 * @author     iB Softs <https://www.ibsofts.com>
 */
class Ghl_Gf_Extension_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    5.0.7
	 */
	public static function activate() {
		global $wpdb;
		if (is_multisite()) {
			// Get all site IDs in the network
			$sites = get_sites();
			
			foreach ($sites as $site) {
				$site_id = $site->blog_id;
				$table_name = $wpdb->get_blog_prefix($site_id) . "ghlex_subaccount";
				self::create_table_for_site($table_name);
				// Create the ghlexform_mapping table for each site
				$mapping_table_name = $wpdb->get_blog_prefix($site_id) . "ghlexform_mapping";
				self::create_table_for_site($mapping_table_name, true);
			}
		} else {
			// For non-Multisite installations, perform activation for the main site.
			$table_name = $wpdb->prefix . "ghlex_subaccount";
			self::create_table_for_site($table_name);
			// Create the ghlexform_mapping table for the main site
			$mapping_table_name = $wpdb->prefix . "ghlexform_mapping";
			self::create_table_for_site($mapping_table_name, true);
		}
	}
	
	public static function create_table_for_site($table_name, $isMappingTable = false){
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		
		// Check if the table already exists
		$table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'");
		
		if ($table_exists !== $table_name) {
			// Create the table structure
			$sql = "CREATE TABLE $table_name (
				 `id` mediumint(9) NOT NULL AUTO_INCREMENT,
				 `Location_id` varchar(55) NOT NULL,
				 `Location_name` varchar(55) NOT NULL,
				 `Location_acc_tok` varchar(2550) NOT NULL,
				 `Location_ref_tok` varchar(2550) NOT NULL,
				 `Location_tok_expire` varchar(55) NOT NULL,
				 PRIMARY KEY (id)
			) $charset_collate;";
			
			// If it's the mapping table, adjust the table structure
			if ($isMappingTable) {
				$sql = "CREATE TABLE $table_name (
					 `id` mediumint(9) NOT NULL AUTO_INCREMENT,
					 `form_option_name` varchar(255) NOT NULL,
					 `form_option_value` varchar(255) NOT NULL,
					 PRIMARY KEY (id)
				) $charset_collate;";
			}
			
			$wpdb->query($wpdb->prepare($sql));
		}
	}
	

}
