<?php

/**
 * AWEOS Dashboard Note
 *
 * @author      AWEOS GmbH
 * @copyright   2019 AWEOS GmbH. All rights reserved.
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: AWEOS Dashboard Note
 * Plugin URI:  -
 * Description: Build for teams that need to leave another admin a note directly in the dashboard.
 * Version:     2.3
 * Author:      AWEOS GmbH
 * Author URI:  https://aweos.de
 * Text Domain: aw-dash-domain
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

if (!defined("ABSPATH")) exit;

function aw_dash_dashboard_setup()
{
    wp_add_dashboard_widget(
        'ep-dashboard_overview', // widget id
        esc_html(get_option("aw_dash_notice_dev_title")), // Title.
        'aw_dash_print_note_widget'
    );
}

add_action("wp_dashboard_setup", "aw_dash_dashboard_setup");

function aw_dash_print_note_widget()
{
    echo stripslashes(
        get_option('aw_dash_notice_wysiwyg_feld')
    );
}

function aw_dash_notice_dev_register_options_page()
{
    add_options_page('options', 'Note', 'manage_options', 'aw-dash-notice-dev', 'aw_dash_notice_dev_options_page');
}

add_action('admin_menu', 'aw_dash_notice_dev_register_options_page');

function aw_dash_notice_dev_register_settings()
{
    add_option('aw_dash_notice_dev_title');
    
    register_setting(
        'aw_dash_notice_dev_options_group', 
        'aw_dash_notice_dev_title', 
        ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field']
    );
    
    add_option('aw_dash_notice_wysiwyg_feld');
    
    register_setting(
        'aw_dash_notice_dev_options_group', 
        'aw_dash_notice_wysiwyg_feld', 
        ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field']
    );
}

add_action('admin_init', 'aw_dash_notice_dev_register_settings');

function aw_dash_notice_dev_options_page()
{
    require_once 'form.php';
}

function aw_dash_wysiwyg_update()
{
    if (isset($_POST['aw_dash_notice_wysiwyg_feld']) && isset($_GET['nonce']) && wp_verify_nonce($_GET['nonce'], 'wp_dashboard_nonce')) {
        $wyswyg_san =  wp_kses_post($_POST['aw_dash_notice_wysiwyg_feld']);
        update_option('aw_dash_notice_wysiwyg_feld', $wyswyg_san);
    }
}

add_action('admin_init', 'aw_dash_wysiwyg_update', 10);
