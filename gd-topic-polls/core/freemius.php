<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
if ( !function_exists( 'topicpolls_fs' ) ) {
    function topicpolls_fs() {
        global $topicpolls_fs;
        if ( !isset( $topicpolls_fs ) ) {
            require_once dirname( TOPICPOLLS_FILE ) . '/vendor/freemius/wordpress-sdk/start.php';
            $topicpolls_fs = fs_dynamic_init( array(
                'id'             => '16903',
                'slug'           => 'gd-topic-polls',
                'premium_slug'   => 'topicpolls-pro',
                'type'           => 'plugin',
                'public_key'     => 'pk_a3bc7edd2ceea916df237a51e8990',
                'is_premium'     => false,
                'premium_suffix' => 'Pro',
                'has_paid_plans' => true,
                'has_addons'     => false,
                'trial'          => array(
                    'days'               => 7,
                    'is_require_payment' => true,
                ),
                'menu'           => array(
                    'slug'    => 'gd-topic-polls-dashboard',
                    'contact' => false,
                    'support' => true,
                ),
                'is_live'        => true,
            ) );
        }
        return $topicpolls_fs;
    }

    // Init Freemius.
    topicpolls_fs();
    // Signal that SDK was initiated.
    do_action( 'topicpolls_fs_loaded' );
    function topicpolls_premium_support_forum_url(  $wp_org_support_forum_url  ) : string {
        return 'https://support.dev4press.com/forums/forum/plugins/gd-topic-polls/';
    }

    if ( topicpolls_fs()->is_premium() ) {
        topicpolls_fs()->add_filter( 'support_forum_url', 'topicpolls_premium_support_forum_url' );
    }
}