<?php
/*
Plugin Name: Admin Menu Restrictor
Description: Restricts the admin menu for non-admin users, allowing only the 'Posts' menu to be visible.
Version: 1.1
Author: Ram Vaithia Nathan
Author URI: https://mysitebroker.com
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

add_action('admin_menu', 'amr_restrict_admin_menu');

function amr_restrict_admin_menu() {
    if (!current_user_can('administrator')) {
        global $menu;
        $allowed_menu = array('edit.php'); // Only allow 'Posts' menu
        foreach ($menu as $key => $value) {
            if (!in_array($value[2], $allowed_menu)) {
                remove_menu_page($value[2]);
            }
        }
    }
}
