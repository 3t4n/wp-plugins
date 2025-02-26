<?php
/*
Plugin Name: ADOP AMP
Plugin URI: http://adop.cc/amp/
Description: ADOP AMP Plugin
Version: 1.0.0
Author: adop
Author URI: http://adop.cc
License: GPL2
*/
define(ADOP_AMP_URL, 'https://amp.adop.cc');

require_once(dirname(__FILE__) . '/includes/admin-setting.php');
require_once(dirname(__FILE__) . '/includes/insert-header.php');
require_once(dirname(__FILE__) . '/includes/common.php');

function adop_amp_activation() {
    adop_amp_set_default_options();
}

function adop_amp_deactivation() {
    adop_amp_unset_default_options();
}



register_activation_hook(__FILE__, 'adop_amp_activation');
register_deactivation_hook(__FILE__, 'adop_amp_deactivation');

/*
 * Header tag
 * /includes/insert-header.php
 */
add_action('wp_head','adop_amp_add_header_tag');

/*
 * Admin Page
 * /includes/admin-setting.php
 */
add_action('admin_menu', 'adop_amp_plugin_settings');
?>