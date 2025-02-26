<?php
/**
 * Item inventory database class.
 *
 * @package GetPaid
 * @subpackage Item Inventory
 * @version 1.0.0
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Item inventory installer/updater class.
 *
 * @package GetPaid
 * @subpackage Item Inventory
 * @version 1.0.0
 * @since   1.0.0
 */
class GetPaid_Item_Inventory_Installer {

    /**
     * Class constructor.
     * 
     * @param int $upgrade_from The current database version.
     */
    public function __construct( $upgrade_from ) {

        $method = "upgrade_from_$upgrade_from";

        if ( method_exists( $this, $method ) ) {
            $this->$method();
        }

    }

    /**
     * Do a fresh install.
     * 
     */
    protected function upgrade_from_0() {
        global $wpdb;

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        // Create tables.
        $charset_collate = $wpdb->get_charset_collate();
        $sql             = "CREATE TABLE {$wpdb->prefix}getpaid_reserved_stock (
            `invoice_id` bigint(20) NOT NULL,
            `item_id` bigint(20) NOT NULL,
            `stock_quantity` double NOT NULL DEFAULT 0,
            `timestamp` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
            `expires` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
            PRIMARY KEY  (`invoice_id`, `item_id`)
        ) $charset_collate;";

        dbDelta( $sql );

    }

}
