<?php
if (!defined('WP_UNINSTALL_PLUGIN')) exit;

global $wpdb;

delete_option('pofw_pizzatoppings_min_selection');
delete_option('pofw_pizzatoppings_max_selection');
delete_option('pofw_pizzatoppings_min_message');
delete_option('pofw_pizzatoppings_max_message');

$wpdb->query("DROP TABLE IF EXISTS {$wpdb->base_prefix}pofw_pizzatoppings_product");

