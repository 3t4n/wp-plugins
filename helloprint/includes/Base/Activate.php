<?php

/** 
 * @package HelloPrint
 */

namespace HelloPrint\Inc\Base;

use HelloPrint\Inc\Base\Controllers\BaseController;

class Activate extends BaseController
{

	public static function activate()
	{
		global $wpdb;
		$env_mode = get_option("helloprint_env_mode");
		if (!$env_mode) {
			add_option('helloprint_env_mode', 1);
		}
		// $charset_collate = $wpdb->get_charset_collate();

		// if ($installed_ver != $this->version) {
		// 	update_option('helloprint_db_version', $this->version);
		// }

		$activate = new \HelloPrint\Inc\Base\Activate();
		$activate->init_helloprint_translation_db();
		$activate->init_helloprint_order_presets_db();
		$activate->init_helloprint_bulk_import_queue_db();
		$activate->init_helloprint_pitchprint_db();
		$activate->init_helloprint_pricing_tiers_db();
		flush_rewrite_rules();
	}

	// Initialize DB Tables
    public function init_helloprint_translation_db()
    {
        global $table_prefix, $wpdb;

        // Translation Table
        $translationsTable = $table_prefix . 'helloprint_translations';

        // Create Translations Table if not exist
        if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $translationsTable)) != $translationsTable) {

            // Query - Create Table
            $sql = "CREATE TABLE `$translationsTable` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `string` VARCHAR(500) NOT NULL,
                `translation` VARCHAR(500) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;";

            // Include Upgrade Script
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

            // Create Table
            dbDelta($sql);
        }
    }

	public function init_helloprint_order_presets_db()
    {
        global $table_prefix, $wpdb;

        // Order Presets Table
        $orderPresetsTable = $table_prefix . 'helloprint_order_presets';

        // Create Presets Table if not exists
        if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $orderPresetsTable)) != $orderPresetsTable) {

            // Create Table Query
            $sql = "CREATE TABLE `$orderPresetsTable` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `order_preset_name` VARCHAR(500) NOT NULL,
                `helloprint_item_sku` VARCHAR(500) NOT NULL,
                `helloprint_variant_key` VARCHAR(500) NOT NULL,
                `default_service_level` VARCHAR(500) NOT NULL,
                `default_quantity` INT(11) DEFAULT 0,
                `file_name` VARCHAR(500) NULL,
                `file_url` VARCHAR(500) NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }

        // Add columns if missing
        if (!$wpdb->get_results($wpdb->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = %s AND column_name = 'available_options'", $orderPresetsTable))) {
            $wpdb->query("ALTER TABLE `$orderPresetsTable` ADD available_options TEXT DEFAULT '' AFTER default_quantity, ADD default_options TEXT DEFAULT '' AFTER available_options");
        }
        if (!$wpdb->get_results($wpdb->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = %s AND column_name = 'product_type'", $orderPresetsTable))) {
            $wpdb->query("ALTER TABLE `$orderPresetsTable` ADD product_type VARCHAR(30) DEFAULT 'non_hp' AFTER id, ADD helloprint_product_id VARCHAR(300) DEFAULT '' AFTER default_quantity");
        }

        // Order Line Item Presets Table
        $orderLineItemPresetsTable = $table_prefix . 'helloprint_order_line_item_presets';

        // Create Line Item Presets Table if not exists
        if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $orderLineItemPresetsTable)) != $orderLineItemPresetsTable) {

            $sql = "CREATE TABLE `$orderLineItemPresetsTable` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `order_id` INT(11) NULL,
                `line_item_id` INT(11) NULL,
                `preset_id` INT(11) NULL,
                `service_level` VARCHAR(500) NOT NULL,
                `quantity` INT(11) DEFAULT 0,
                PRIMARY KEY (`id`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }

        if (!$wpdb->get_results($wpdb->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = %s AND column_name = 'options'", $orderLineItemPresetsTable))) {
            $wpdb->query("ALTER TABLE `$orderLineItemPresetsTable` ADD options TEXT DEFAULT '' AFTER quantity");
        }

        // Order Line Item File Presets Table
        $orderLineFilePresetsTable = $table_prefix . 'helloprint_order_line_preset_files';

        // Create Order Line Item File Presets Table if not exists
        if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $orderLineFilePresetsTable)) != $orderLineFilePresetsTable) {

            $sql = "CREATE TABLE `$orderLineFilePresetsTable` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `order_id` INT(11) NULL,
                `line_item_id` INT(11) NULL,
                `file_url` VARCHAR(500) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }

        // Order Line Item Public File Table
        $orderLineFilePublicTable = $table_prefix . 'helloprint_order_line_public_files';

        // Create Order Line Item Public File Table if not exists
        if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $orderLineFilePublicTable)) != $orderLineFilePublicTable) {

            $sql = "CREATE TABLE `$orderLineFilePublicTable` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `order_id` INT(11) NULL,
                `line_item_id` INT(11) NULL,
                `public_file_url` VARCHAR(500) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
    }

	// Initialize DB Tables
	public function init_helloprint_bulk_import_queue_db()
    {
        // WP Globals
        global $table_prefix, $wpdb;

        // Bulk import queue Table
        $bulkImportQueueTable = $table_prefix . 'helloprint_bulk_import_queues';

        // Create Bulk import queue Table if not exist
        if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $bulkImportQueueTable)) != $bulkImportQueueTable) {

            // Query - Create Table
            $sql = "CREATE TABLE `$bulkImportQueueTable` (";
            $sql .= " `id` int(11) NOT NULL AUTO_INCREMENT, ";
            $sql .= " `category` int(11) NOT NULL, ";
            $sql .= " `product_id` TEXT NOT NULL, ";
            $sql .= " `imported` TINYINT(1) NOT NULL DEFAULT 0, ";
            $sql .= " `attempts` int(11) NOT NULL DEFAULT 0, ";
            $sql .= " `date` DATE NOT NULL DEFAULT CURRENT_DATE, ";
            $sql .= " PRIMARY KEY (`id`) ";
            $sql .= ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1;";

            // Include Upgrade Script
            require_once(ABSPATH . '/wp-admin/includes/upgrade.php');

            // Create Table
            dbDelta($sql);
        }
    }

	// Initialize DB Tables

	public function init_helloprint_pitchprint_db()
    {
        // WP Globals
        global $table_prefix, $wpdb;

        // Pitch Print Table
        $pitchPrintTable = $table_prefix . 'helloprint_pitch_prints';

        // Create Pitch Print Table if not exist
        if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $pitchPrintTable)) != $pitchPrintTable) {
            
            // Query - Create Table
            $sql = "CREATE TABLE `$pitchPrintTable` (";
            $sql .= " `id` int(11) NOT NULL AUTO_INCREMENT, ";
            $sql .= " `name` varchar(500) NOT NULL, ";
            $sql .= " `pitchprint_design_id` varchar(500) NOT NULL, ";
            $sql .= " `hp_variant_key` varchar(500) NOT NULL, ";
            $sql .= " PRIMARY KEY (`id`) ";
            $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";

            // Include Upgrade Script
            require_once(ABSPATH . '/wp-admin/includes/upgrade.php');

            // Create Table
            dbDelta($sql);
        }
    }

	// Initialize DB Tables

	public function init_helloprint_pricing_tiers_db()
    {
        // WP Globals
        global $table_prefix, $wpdb;

        // Pricing Tiers Table
        $pricingTiersTable = $table_prefix . 'helloprint_pricing_tiers';

        // Create Pricing Tiers Table if not exist
        if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $pricingTiersTable)) != $pricingTiersTable) {
            // Query - Create Table
            $sql = "CREATE TABLE `$pricingTiersTable` (";
            $sql .= " `id` int(11) NOT NULL auto_increment, ";
            $sql .= " `name` varchar(500) NOT NULL, ";
            $sql .= " `default_markup` int(11) NOT NULL DEFAULT 0, ";
            $sql .= " `enable_scaling` int(1) NOT NULL DEFAULT 0, ";
            $sql .= " PRIMARY KEY (`id`) ";
            $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";

            // Include Upgrade Script
            require_once(ABSPATH . '/wp-admin/includes/upgrade.php');

            // Create Table
            dbDelta($sql);
        }

        // Check for 'tier_type' column
        $tier_type = $wpdb->get_results($wpdb->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = %s AND column_name = %s", $pricingTiersTable, 'tier_type'));

        if (empty($tier_type)) {
            $wpdb->query($wpdb->prepare("ALTER TABLE $pricingTiersTable ADD tier_type varchar(500) DEFAULT 'margin' AFTER name"));
        }

        // Scaled Pricing Table
        $scaledPricingTable = $table_prefix . 'helloprint_scaled_pricing';

        // Create Scaled Pricing Table if not exist
        if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $scaledPricingTable)) != $scaledPricingTable) {
            // Query - Create Table
            $sql = "CREATE TABLE `$scaledPricingTable` (";
            $sql .= " `id` int(11) NOT NULL auto_increment, ";
            $sql .= " `pricing_tier_id` int(11) NULL, ";
            $sql .= " `price` DOUBLE(11, 2) NOT NULL DEFAULT 0, ";
            $sql .= " `margin` int(11) NOT NULL DEFAULT 0, ";
            $sql .= " PRIMARY KEY (`id`) ";
            $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";

            // Include Upgrade Script
            require_once(ABSPATH . '/wp-admin/includes/upgrade.php');

            // Create Table
            dbDelta($sql);
        }

        // Helloprint product Pricing Table
        $helloprintProductPricingTable = $table_prefix . 'helloprint_product_pricing_tier';

        // Create Product Pricing Table if not exist
        if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $helloprintProductPricingTable)) != $helloprintProductPricingTable) {
            // Query - Create Table
            $sql = "CREATE TABLE `$helloprintProductPricingTable` (";
            $sql .= " `id` int(11) NOT NULL auto_increment, ";
            $sql .= " `product_id` int(11) NULL, ";
            $sql .= " `pricing_tier_id` int(11) NULL, ";
            $sql .= " `profile` VARCHAR(500) NULL, ";
            $sql .= " PRIMARY KEY (`id`) ";
            $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";

            // Include Upgrade Script
            require_once(ABSPATH . '/wp-admin/includes/upgrade.php');

            // Create Table
            dbDelta($sql);
        }
    }
}
