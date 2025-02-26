<?php

/**
 * Creating warehouse database table on plugin activate
 * @package     Woocommerce ODFL Edition
 * @author      <https://eniture.com/>
 * @copyright   Copyright (c) 2017, Eniture
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Create warehouse database table
 */
function create_odfl_wh_db($network_wide = null)
{
    if ( is_multisite() && $network_wide ) {
        global $wpdb;
        foreach (get_sites(['fields'=>'ids']) as $blog_id) {
            switch_to_blog($blog_id);
            $warehouse_table = $wpdb->prefix . "warehouse";
            if ($wpdb->query("SHOW TABLES LIKE '" . $warehouse_table . "'") === 0) {
                $origin = 'CREATE TABLE ' . $warehouse_table . '(
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        city varchar(200) NOT NULL,
        state varchar(200) NOT NULL,
        address varchar(255) NOT NULL,
        phone_instore varchar(255) NOT NULL,
        zip varchar(200) NOT NULL,
        country varchar(200) NOT NULL,
        location varchar(200) NOT NULL,
        nickname varchar(200) NOT NULL,
        enable_store_pickup VARCHAR(255) NOT NULL,
        miles_store_pickup VARCHAR(255) NOT NULL ,
        match_postal_store_pickup VARCHAR(255) NOT NULL ,
        checkout_desc_store_pickup VARCHAR(255) NOT NULL ,
        enable_local_delivery VARCHAR(255) NOT NULL ,
        miles_local_delivery VARCHAR(255) NOT NULL ,
        match_postal_local_delivery VARCHAR(255) NOT NULL ,
        checkout_desc_local_delivery VARCHAR(255) NOT NULL ,
        fee_local_delivery VARCHAR(255) NOT NULL ,
        suppress_local_delivery VARCHAR(255) NOT NULL,                       
        odfl_account VARCHAR(255) NOT NULL,     
        origin_markup VARCHAR(255),                    
        PRIMARY KEY  (id) )';
                dbDelta($origin);
            }
            add_option('odfl_db_version', '1.0');

            $warehouse_details = $wpdb->get_row("SHOW COLUMNS FROM " . $warehouse_table . " LIKE 'enable_store_pickup'");
            if (!(isset($warehouse_details->Field) && $warehouse_details->Field == 'enable_store_pickup')) {

                $wpdb->query(sprintf("ALTER TABLE %s ADD COLUMN enable_store_pickup VARCHAR(255) NOT NULL , "
                    . "ADD COLUMN miles_store_pickup VARCHAR(255) NOT NULL , "
                    . "ADD COLUMN match_postal_store_pickup VARCHAR(255) NOT NULL , "
                    . "ADD COLUMN checkout_desc_store_pickup VARCHAR(255) NOT NULL , "
                    . "ADD COLUMN enable_local_delivery VARCHAR(255) NOT NULL , "
                    . "ADD COLUMN miles_local_delivery VARCHAR(255) NOT NULL , "
                    . "ADD COLUMN match_postal_local_delivery VARCHAR(255) NOT NULL , "
                    . "ADD COLUMN checkout_desc_local_delivery VARCHAR(255) NOT NULL , "
                    . "ADD COLUMN fee_local_delivery VARCHAR(255) NOT NULL , "
                    . "ADD COLUMN suppress_local_delivery VARCHAR(255) NOT NULL", $warehouse_table));
            }

            $odfl_account = $wpdb->get_row("SHOW COLUMNS FROM " . $warehouse_table . " LIKE 'odfl_account'");
            if (!(isset($odfl_account->Field) && $odfl_account->Field == 'odfl_account')) {
                $wpdb->query(sprintf("ALTER TABLE %s ADD COLUMN odfl_account VARCHAR(255) NULL ", $warehouse_table));
            }

            // Origin terminal address
            odfl_update_warehouse();
            restore_current_blog();
        }

    } else {
        global $wpdb;
        $warehouse_table = $wpdb->prefix . "warehouse";
        if ($wpdb->query("SHOW TABLES LIKE '" . $warehouse_table . "'") === 0) {
            $origin = 'CREATE TABLE ' . $warehouse_table . '(
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        city varchar(200) NOT NULL,
        state varchar(200) NOT NULL,
        address varchar(255) NOT NULL,
        phone_instore varchar(255) NOT NULL,
        zip varchar(200) NOT NULL,
        country varchar(200) NOT NULL,
        location varchar(200) NOT NULL,
        nickname varchar(200) NOT NULL,
        enable_store_pickup VARCHAR(255) NOT NULL,
        miles_store_pickup VARCHAR(255) NOT NULL ,
        match_postal_store_pickup VARCHAR(255) NOT NULL ,
        checkout_desc_store_pickup VARCHAR(255) NOT NULL ,
        enable_local_delivery VARCHAR(255) NOT NULL ,
        miles_local_delivery VARCHAR(255) NOT NULL ,
        match_postal_local_delivery VARCHAR(255) NOT NULL ,
        checkout_desc_local_delivery VARCHAR(255) NOT NULL ,
        fee_local_delivery VARCHAR(255) NOT NULL ,
        suppress_local_delivery VARCHAR(255) NOT NULL,                       
        odfl_account VARCHAR(255) NOT NULL,   
        origin_markup VARCHAR(255),                      
        PRIMARY KEY  (id) )';
            dbDelta($origin);
        }
        add_option('odfl_db_version', '1.0');

        $warehouse_details = $wpdb->get_row("SHOW COLUMNS FROM " . $warehouse_table . " LIKE 'enable_store_pickup'");
        if (!(isset($warehouse_details->Field) && $warehouse_details->Field == 'enable_store_pickup')) {

            $wpdb->query(sprintf("ALTER TABLE %s ADD COLUMN enable_store_pickup VARCHAR(255) NOT NULL , "
                . "ADD COLUMN miles_store_pickup VARCHAR(255) NOT NULL , "
                . "ADD COLUMN match_postal_store_pickup VARCHAR(255) NOT NULL , "
                . "ADD COLUMN checkout_desc_store_pickup VARCHAR(255) NOT NULL , "
                . "ADD COLUMN enable_local_delivery VARCHAR(255) NOT NULL , "
                . "ADD COLUMN miles_local_delivery VARCHAR(255) NOT NULL , "
                . "ADD COLUMN match_postal_local_delivery VARCHAR(255) NOT NULL , "
                . "ADD COLUMN checkout_desc_local_delivery VARCHAR(255) NOT NULL , "
                . "ADD COLUMN fee_local_delivery VARCHAR(255) NOT NULL , "
                . "ADD COLUMN suppress_local_delivery VARCHAR(255) NOT NULL", $warehouse_table));
        }

        $odfl_account = $wpdb->get_row("SHOW COLUMNS FROM " . $warehouse_table . " LIKE 'odfl_account'");
        if (!(isset($odfl_account->Field) && $odfl_account->Field == 'odfl_account')) {
            $wpdb->query(sprintf("ALTER TABLE %s ADD COLUMN odfl_account VARCHAR(255) NULL ", $warehouse_table));
        }

        // Origin terminal address
        odfl_update_warehouse();
    }

}

/**
 * Update warehouse
 */
function odfl_update_warehouse()
{
    // Origin terminal address
    // Terminal phone number
    global $wpdb;
    $warehouse_table = $wpdb->prefix . "warehouse";
    $warehouse_address = $wpdb->get_row("SHOW COLUMNS FROM " . $warehouse_table . " LIKE 'phone_instore'");
    if (!(isset($warehouse_address->Field) && $warehouse_address->Field == 'phone_instore')) {
        $wpdb->query(sprintf("ALTER TABLE %s ADD COLUMN address VARCHAR(255) NOT NULL", $warehouse_table));
        $wpdb->query(sprintf("ALTER TABLE %s ADD COLUMN phone_instore VARCHAR(255) NOT NULL", $warehouse_table));
    }

    $origin_markup = $wpdb->get_row("SHOW COLUMNS FROM " . $warehouse_table . " LIKE 'origin_markup'");
    if (!(isset($origin_markup->Field) && $origin_markup->Field == 'origin_markup')) {
        $wpdb->query(sprintf("ALTER TABLE %s ADD COLUMN origin_markup VARCHAR(255)", $warehouse_table));
    }
}

/**
 * Create LTL Class
 */
function create_odfl_ltl_freight_class($network_wide = null)
{
    if ( is_multisite() && $network_wide ) {

        foreach (get_sites(['fields'=>'ids']) as $blog_id) {
            switch_to_blog($blog_id);
            if (!function_exists('create_ltl_class')) {
                wp_insert_term(
                    'LTL Freight', 'product_shipping_class', array(
                        'description' => 'The plugin is triggered to provide an LTL freight quote when the shopping cart contains an item that has a designated shipping class. Shipping class? is a standard WooCommerce parameter not to be confused with freight class? or the NMFC classification system.',
                        'slug' => 'ltl_freight'
                    )
                );
            }
            restore_current_blog();
        }

    } else {
        if (!function_exists('create_ltl_class')) {
            wp_insert_term(
                'LTL Freight', 'product_shipping_class', array(
                    'description' => 'The plugin is triggered to provide an LTL freight quote when the shopping cart contains an item that has a designated shipping class. Shipping class? is a standard WooCommerce parameter not to be confused with freight class? or the NMFC classification system.',
                    'slug' => 'ltl_freight'
                )
            );
        }
    }
}

/**
 * Add Option For ODFL
 */
function create_odfl_option($network_wide = null)
{
    if ( is_multisite() && $network_wide ) {

        foreach (get_sites(['fields'=>'ids']) as $blog_id) {
            switch_to_blog($blog_id);
            $eniture_plugins = get_option('EN_Plugins');

            if (!$eniture_plugins)
                add_option('EN_Plugins', json_encode(array('odfl')));
            else {
                $plugins_array = json_decode($eniture_plugins, true);

                if (!in_array('odfl', $plugins_array)) {
                    array_push($plugins_array, 'odfl');
                    update_option('EN_Plugins', json_encode($plugins_array));
                }
            }
            restore_current_blog();
        }

    } else {
        $eniture_plugins = get_option('EN_Plugins');

        if (!$eniture_plugins)
            add_option('EN_Plugins', json_encode(array('odfl')));
        else {
            $plugins_array = json_decode($eniture_plugins, true);

            if (!in_array('odfl', $plugins_array)) {
                array_push($plugins_array, 'odfl');
                update_option('EN_Plugins', json_encode($plugins_array));
            }
        }
    }

}

/**
 * Create shipping rules database table
 */
function create_odfl_shipping_rules_db($network_wide = null)
{
    if ( is_multisite() && $network_wide ) {

        foreach (get_sites(['fields'=>'ids']) as $blog_id) {
            switch_to_blog($blog_id);
            global $wpdb;
            $shipping_rules_table = $wpdb->prefix . "eniture_odfl_shipping_rules";

            if ($wpdb->query("SHOW TABLES LIKE '" . $shipping_rules_table . "'") === 0) {
                $query = 'CREATE TABLE ' . $shipping_rules_table . '(
                    id INT(10) NOT NULL AUTO_INCREMENT,
                    name VARCHAR(50) NOT NULL,
                    type VARCHAR(30) NOT NULL,
                    settings TEXT NULL,
                    is_active TINYINT(1) NOT NULL,
                    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    PRIMARY KEY (id)
                )';

                dbDelta($query);
            } else {
                $query = 'SHOW COLUMNS FROM ' . $shipping_rules_table . ' LIKE "type"';
                $result = $wpdb->get_results($query);
                $query = count($result) == 0 ? 'ALTER TABLE ' . $shipping_rules_table . ' ADD COLUMN type VARCHAR(30) NOT NULL' : 'ALTER TABLE ' . $shipping_rules_table . ' MODIFY type VARCHAR(30) NOT NULL';
                $wpdb->query($query);
            }

            restore_current_blog();
        }

    } else {
        global $wpdb;
        $shipping_rules_table = $wpdb->prefix . "eniture_odfl_shipping_rules";

        if ($wpdb->query("SHOW TABLES LIKE '" . $shipping_rules_table . "'") === 0) {
            $query = 'CREATE TABLE ' . $shipping_rules_table . '(
                id INT(10) NOT NULL AUTO_INCREMENT,
                name VARCHAR(50) NOT NULL,
                type VARCHAR(30) NOT NULL,
                settings TEXT NULL,
                is_active TINYINT(1) NOT NULL,
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                PRIMARY KEY (id) 
            )';

            dbDelta($query);
        } else {
            $query = 'SHOW COLUMNS FROM ' . $shipping_rules_table . ' LIKE "type"';
            $result = $wpdb->get_results($query);
            $query = count($result) == 0 ? 'ALTER TABLE ' . $shipping_rules_table . ' ADD COLUMN type VARCHAR(30) NOT NULL' : 'ALTER TABLE ' . $shipping_rules_table . ' MODIFY type VARCHAR(30) NOT NULL';
            $wpdb->query($query);
        }
    }
}

/**
 * Remove Option For estes
 */
function en_odfl_deactivate_plugin($network_wide = null)
{
    if ( is_multisite() && $network_wide ) {
        foreach (get_sites(['fields'=>'ids']) as $blog_id) {
            switch_to_blog($blog_id);
            $eniture_plugins = get_option('EN_Plugins');
            $plugins_array = json_decode($eniture_plugins, true);
            $plugins_array = !empty($plugins_array) && is_array($plugins_array) ? $plugins_array : array();
            $key = array_search('odfl', $plugins_array);
            if ($key !== false) {
                unset($plugins_array[$key]);
            }
            update_option('EN_Plugins', json_encode($plugins_array));
            restore_current_blog();
        }
    } else {
        $eniture_plugins = get_option('EN_Plugins');
        $plugins_array = json_decode($eniture_plugins, true);
        $plugins_array = !empty($plugins_array) && is_array($plugins_array) ? $plugins_array : array();
        $key = array_search('odfl', $plugins_array);
        if ($key !== false) {
            unset($plugins_array[$key]);
        }
        update_option('EN_Plugins', json_encode($plugins_array));
    }
}