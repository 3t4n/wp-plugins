<?php
/*
Plugin Name: Auto Responsive Table
Plugin URI: https://store.devilhunter.net/wordpress-plugin/auto-responsive-table/
Description: PlugIn activation is enough to transform all normal tables into Responsive Tables automatically. Create and edit Tables directly inside Post Editor or Page Editor. No shortcodes or external configurations required.
Version: 1.0
Author: Tawhidur Rahman Dear
Author URI: https://www.tawhidurrahmandear.com
Requires at least: 5.5
Requires PHP: 7.4
License: GPLv2 or later
Text Domain: auto-responsive-table
 */


 // Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}
//

function autoresponsivetable_by_tawhidurrahmandear_links($plugin_meta, $plugin_file) {
    if ($plugin_file === plugin_basename(__FILE__)) {
        $new_links = array(
            '<a href="https://store.devilhunter.net/wordpress-plugin/auto-responsive-table" target="_blank">Introduction to Plugin with Documentation</a>',
			'<a href="https://dearstore.gumroad.com/l/responsive-sortable-table-for-wordpress" target="_blank">Buy Pro Version</a>',
			'<a href="https://store.devilhunter.net/wordpress-plugin/responsive-sortable-table" target="_blank">Live Preview of Pro Version</a>',
            '<a href="https://wordpress.org/plugins/auto-responsive-table/#reviews" target="_blank">Rate and Review at WordPress.org</a>',
            '<a href="https://itsolution.devilhunter.net" target="_blank">Hire for WordPress Web Development</a>',
        );

        // Add the new links to the existing array of links
        $plugin_meta = array_merge($plugin_meta, $new_links);
    }
    return $plugin_meta;
}
add_filter('plugin_row_meta', 'autoresponsivetable_by_tawhidurrahmandear_links', 10, 2);


// the PlugIn
function autoresponsivetable_by_tawhidurrahmandear_add_script_to_head() {
    $plugin_url = plugin_dir_url(__FILE__);

    wp_enqueue_script(
        'auto-responsive-table-script',
        $plugin_url . 'auto-responsive-table.js',
        array(), 
        '1.0', // Explicit version
        true // Load in footer
    );

    // Enqueue the CSS file
    wp_enqueue_style(
        'auto-responsive-table-style',
        $plugin_url . 'auto-responsive-table.css',
        array(),
        '1.0' // Explicit version
    );
}

add_action('wp_enqueue_scripts', 'autoresponsivetable_by_tawhidurrahmandear_add_script_to_head');