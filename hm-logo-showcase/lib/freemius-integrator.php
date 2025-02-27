<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
if ( !function_exists( 'hls_fs' ) ) {
    // Create a helper function for easy SDK access.
    function hls_fs() {
        global $hls_fs;
        if ( !isset( $hls_fs ) ) {
            // Include Freemius SDK.
            require_once HMLS_PATH . '/freemius/start.php';
            $hls_fs = fs_dynamic_init( array(
                'id'             => '8758',
                'slug'           => 'hm-logo-showcase',
                'type'           => 'plugin',
                'public_key'     => 'pk_68d93bcff2f5fa1b83006685ae6c5',
                'is_premium'     => false,
                'premium_suffix' => 'Professional',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'trial'          => array(
                    'days'               => 14,
                    'is_require_payment' => true,
                ),
                'menu'           => array(
                    'slug' => 'edit.php?post_type=hmls_logo',
                ),
                'is_live'        => true,
            ) );
        }
        return $hls_fs;
    }

    // Init Freemius.
    hls_fs();
    // Signal that SDK was initiated.
    do_action( 'hls_fs_loaded' );
    function hls_fs_support_forum_url(  $wp_support_url  ) {
        return 'https://wordpress.org/support/plugin/hm-logo-showcase/';
    }

    hls_fs()->add_filter( 'support_forum_url', 'hls_fs_support_forum_url' );
    function hls_fs_custom_connect_message_on_update(
        $message,
        $user_first_name,
        $plugin_title,
        $user_login,
        $site_link,
        $freemius_link
    ) {
        return sprintf(
            __( 'Hey %1$s' ) . ',<br>' . __( 'Please help us improve %2$s! If you opt-in, some data about your usage of %2$s will be sent to %5$s. If you skip this, that\'s okay! %2$s will still work just fine.', 'hm-logo-showcase' ),
            $user_first_name,
            '<b>' . $plugin_title . '</b>',
            '<b>' . $user_login . '</b>',
            $site_link,
            $freemius_link
        );
    }

    hls_fs()->add_filter(
        'connect_message_on_update',
        'hls_fs_custom_connect_message_on_update',
        10,
        6
    );
}