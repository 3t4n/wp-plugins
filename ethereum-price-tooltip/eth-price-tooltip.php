<?php
/*
Plugin Name: Ethereum Price Tooltip
Description: Plugin will find mentions of Ethereum in your texts and automatically add a toltip to it with actual price in USD and EUR.
Version: 1.4.2
Author: plugins.club
Author URI: https://plugins.club/free-wordpres-plugins/ethereum-price-tooltip/
*/

// Load settings page and Tooltip - Ticker files
require_once plugin_dir_path( __FILE__ ) . 'includes/settings_page.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/tooltip.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/ticker.php';

// Add/switch CSS files
function add_eth_tooltip_css()
{
    $selected_option = get_option('ethereum_price_option', 'tooltip');

    if ($selected_option === 'tooltip') {
        wp_enqueue_style('tooltip-style', plugins_url('includes/css/tooltip-style.css', __FILE__), false, '1.0.0', 'all');
    } elseif ($selected_option === 'ticker') {
        wp_enqueue_style('ticker-style', plugins_url('includes/css/ticker-style.css', __FILE__), false, '1.0.0', 'all');
    }
}
add_action('wp_enqueue_scripts', 'add_eth_tooltip_css');

// By default display Tooltip, and allow switching
function add_eth_content($the_content)
{
    $selected_option = get_option('ethereum_price_option', 'tooltip');

    if ($selected_option === 'ticker') {
        $the_content = add_ticker_to_eth($the_content);
    } else {
        $the_content = add_tooltip_to_eth($the_content);
    }

    return $the_content;
}

// Add the content filter for switching between tooltip and ticker
add_filter('the_content', 'add_eth_content');
