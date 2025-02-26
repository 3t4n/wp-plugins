<?php

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

/* --------------------------------------------------------------------------------------------- */
/* MIGRATE / UPGRADE =========================================================================== */
/* --------------------------------------------------------------------------------------------- */

add_action('admin_init', 'rankology_fno_upgrader');
/**
 * Tell WP what to do when admin is loaded aka upgrader.
 *
 * 
 */
function rankology_fno_upgrader() {

    $actual_version = 0;

    // You can hook the upgrader to trigger any action when rankology is upgraded.
    // First install.
    if ( ! $actual_version) {
        /*
         * Allow to prevent plugin first install hooks to fire.
         *
         * 
         *
         * @param (bool) $prevent True to prevent triggering first install hooks. False otherwise.
         */
        if ( ! apply_filters('rankology_fno_prevent_first_install', false)) {
            /*
             * Fires on the plugin first install.
             *
             * 
             *
             */
            do_action('rankology_fno_first_install');
        }
    }

    if (RANKOLOGY_VERSION !== $actual_version) {
        //Add Redirections caps to user with "manage_options" capability
        $roles = get_editable_roles();
        if ( ! empty($roles)) {
            foreach ($GLOBALS['wp_roles']->role_objects as $key => $role) {
                if (isset($roles[$key]) && $role->has_cap('manage_options')) {
                    $role->add_cap('edit_redirection');
                    $role->add_cap('edit_redirections');
                    $role->add_cap('edit_others_redirections');
                    $role->add_cap('publish_redirections');
                    $role->add_cap('read_redirection');
                    $role->add_cap('read_private_redirections');
                    $role->add_cap('delete_redirection');
                    $role->add_cap('delete_redirections');
                    $role->add_cap('delete_others_redirections');
                    $role->add_cap('delete_published_redirections');
                }
                if (isset($roles[$key]) && $role->has_cap('manage_options')) {
                    $role->add_cap('edit_schema');
                    $role->add_cap('edit_schemas');
                    $role->add_cap('edit_others_schemas');
                    $role->add_cap('publish_schemas');
                    $role->add_cap('read_schema');
                    $role->add_cap('read_private_schemas');
                    $role->add_cap('delete_schema');
                    $role->add_cap('delete_schemas');
                    $role->add_cap('delete_others_schemas');
                    $role->add_cap('delete_published_schemas');
                }
            }
        }

        /*
         * @param (string) $new_pro_version    The version being upgraded to.
         * @param (string) $actual_pro_version The previous version.
         */
        do_action('rankology_fno_upgrade', RANKOLOGY_VERSION, $actual_version);
    }

    // If any upgrade has been done, we flush and update version.
    if (did_action('rankology_fno_first_install') || did_action('rankology_fno_upgrade')) {
        // Do not use rankology_get_option() here.

        $options = get_option('rankology_versions');
        $options = is_array($options) ? $options : [];

        $options['fno'] = RANKOLOGY_VERSION;
        if (is_multisite()) {
            //We must pass these parameters for performance reasons
            $sites = get_sites([
                'update_site_cache' => false,
                'update_site_meta_cache' => false,
                'number' => 9999
            ]);
            foreach ($sites as $site) {
                update_blog_option($site->blog_id, 'rankology_versions', $options);
            }
        } else {
            update_option('rankology_versions', $options);
            
        }
    }
}

add_action('rankology_fno_upgrade', 'rankology_fno_new_upgrade', 10, 2);

/**
 * What to do when rankology is updated, depending on versions.
 *
 * 
 *
 * @param (string) $rankology_version The version being upgraded to
 * @param (string) $actual_version   The previous version
 */
function rankology_fno_new_upgrade($rankology_version, $actual_version) {
}
