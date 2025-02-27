<?php

/**
 * Plugin Name: Columns Reordering For Elementor
 * Plugin URI: https://wordpress.org/plugins/columns-reordering-for-elementor
 * Description: Help you easily reorder Elementor columns, sections and widgets responsively. No need to duplicate things!
 * Author: WP Clevel
 * Author URI: https://wpclevel.com
 * Version: 1.0.2
 * Text Domain: columns-reordering-for-elementor
 * Requires PHP: 5.6
 * Requires at least: 5.6
 * Tested up to: 5.9
 */

/**
 * This source code is licensed under the license found in
 * the LICENSE file in the root directory of this source tree.
 */

/**
 * Do installation
 *
 * @see https://developer.wordpress.org/reference/hooks/plugins_loaded/
 */
function sc_rce_install()
{
    // Make sure translation is available.
    load_plugin_textdomain('columns-reordering-for-elementor', false, 'columns-reordering-for-elementor/languages');

    // Load common hooks.
    require __DIR__ . '/includes/common/hooks.php';
}
add_action('plugins_loaded', 'sc_rce_install', 10, 0);
