<?php

namespace DavidWenner\ATestimonialBuilder;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use DavidWenner\ATestimonialBuilder\ATBS_Handlers;

class ATBS_Hooks {

    /**
     * Plugin activation hook.
     * Registers the default options for the plugin.
     */
    public function atbs_activation_hook()
    {
        // Register the default options for the plugin
        add_option('atbs_post_id', '');
        add_option('atbs_is_logged_in', false);
        add_option('atbs_user_email', '');
        add_option('atbs_user_identity', '');
        add_option('atbs_is_guest_logged_in', true);
        add_option('atbs_guest_identity', '43f50b5c899b6460bf7361309160e4e');
        add_option('atbs_oauth_token', 'klOg1sNi6PoKein11TxGgAcnfn6a6-IVnMxJiriP');

        //clear the demo data
        ATBS_Handlers::atbs_api()->post('content/clear', wp_json_encode([
            'auth_token' => ATBS_Handlers::atbs_get_guest_user_identity(),
        ]));
    }

    /**
     * Plugin deactivation hook.
     * Removes the options for the plugin.
     */
    public function atbs_deactivation_hook()
    {

        //clear the demo data
        ATBS_Handlers::atbs_api()->post('content/clear', wp_json_encode([
            'auth_token' => ATBS_Handlers::atbs_get_guest_user_identity(),
        ]));

        // Remove the options for the plugin
        delete_option('atbs_is_logged_in');
        delete_option('atbs_is_guest_logged_in');
        delete_option('atbs_user_identity');
        delete_option('atbs_user_email');
        delete_option('atbs_guest_identity');

        if (($post_id = get_option('atbs_post_id', null)) && ($post = get_post($post_id))) {
            wp_delete_post($post_id);
        }

        delete_option('atbs_post_id');
        delete_option('atbs_oauth_token');
    }
}
