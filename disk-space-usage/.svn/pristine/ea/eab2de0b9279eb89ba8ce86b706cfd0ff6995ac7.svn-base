<?php
/*
Plugin Name: Disk Space Usage (Basic)
Plugin URI: https://www.codeteam.in/product/disk-space-usage/
Description: Show the disk space of the server on the admin panel dashboard
Version: 1.7
Tested up to 6.4.1
Author: Siddharth Nagar
Author URI: http://www.codeteam.in/
License: GPLv2
*/

if ( !defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

if ( ! defined( 'SN_DSU_AUTHOR_URL' ) ) {
    define( 'SN_DSU_AUTHOR_URL', 'https://www.codeteam.in/' );
}

if ( ! defined( 'SN_DSU_PLUGIN_URL' ) ) {
    define( 'SN_DSU_PLUGIN_URL', SN_DSU_AUTHOR_URL.'product/disk-space-usage/' );
}

if ( ! defined( 'SN_DSU_PLUGIN_VERSION' ) ) {
    define( 'SN_DSU_PLUGIN_VERSION', '1.7' );
}

if ( ! defined( 'SN_DSU_SLUG' ) ) {
    define( 'SN_DSU_SLUG', 'disk-space-usage' );
}

if ( ! defined( 'SN_DSU_DIR' ) ) {
    define( 'SN_DSU_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'SN_DSU_URL' ) ) {
    define( 'SN_DSU_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'SN_DSU_FILE' ) ) {
    define( 'SN_DSU_FILE', __FILE__ );
}


/**
 * Initialize plugin
 * @description Function to initialize the plugin
 */
function sn_dsu_init() {

    load_plugin_textdomain( SN_DSU_SLUG, false, dirname( plugin_basename( __FILE__ ) ). '/languages/' );

    add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'sn_dsu_plugin_action_links');
    add_action('wp_dashboard_setup', 'sn_dsu_add_dashboard_widget');
}
add_action( 'sn_dsu_init', 'sn_dsu_init' );

/**
 * Add action links on plugin page
 * @description Function to add plugin action links
 *
 * @param $links
 * @return array
 */
function sn_dsu_plugin_action_links( $links ) {
    $plugin_links = array(
        '<a target="_blank" href="'.SN_DSU_AUTHOR_URL.'contact-us">' . __('Support', SN_DSU_SLUG) . '</a>',
        '<a target="_blank" href="https://wordpress.org/support/plugin/disk-space-usage/reviews?rate=5#new-post">' . __('Review', SN_DSU_SLUG) . '</a>',
        '<a target="_blank" href="'.SN_DSU_PLUGIN_URL.'" style="color:#4DB849;"> ' . __('Premium Upgrade', SN_DSU_SLUG) . '</a>',
    );
    return array_merge($plugin_links, $links);
}

/**
 * Register dashboard widget box
 * @description Function to initialize the plugin
 */
function sn_dsu_add_dashboard_widget() {
    global $wp_meta_boxes;
    wp_add_dashboard_widget('space_widget', 'Disk Space Usage', 'sn_dsu_disk_space_usage_widget');
}

/**
 * Show the disk space widget on the dashboard
 * @description Function to show the widget on the dashboard
 */
function sn_dsu_disk_space_usage_widget() {
    $total_disk_size = disk_total_space('.');
    $total_free_space = disk_free_space('.');
    $total_disk_used = $total_disk_size - $total_free_space;
    $usage_percentage = intval(($total_disk_used * 100) / $total_disk_size);
    ?>
    <div id="sn_dsu_widget">
        <div style="border:solid 1px #ccd0d4;border-radius:3px;">
            <div style="width:<?php echo($usage_percentage) ?>%;height:25px;background:#007cba;color:#b3b3b3;text-align: center;line-height:25px;font-size:12px;white-space:nowrap;"><?php echO($usage_percentage) ?>% Used</div>
        </div>
        <div style="overflow:hidden;font-size:11px;font-weight:bold;margin-top:5px;">
            <div style="float:left;"><?php echo('Disk Used: '.intval($total_disk_used/1073741824)) ?>GB</div>
            <div style="float:right;"><?php echo('Disk Space: '.intval($total_disk_size/1073741824)) ?>GB</div>
        </div>
        <div style="margin-top:10px;text-align:center;"><a href="<?php echo(SN_DSU_PLUGIN_URL); ?>" target="_blank" rel="nofollow" style="display:inline-block;padding:5px 10px;text-decoration:none;border:solid 1px #007cba;border-radius:3px;">Buy Premium Plugin</a></div>
    </div>
    <?php
}

/**
 * Install plugin
 * @description Function to initiate the plugin installation
 */
function sn_dsu_install() {

    do_action( 'sn_dsu_init' );
}
add_action( 'plugins_loaded', 'sn_dsu_install', 10 );