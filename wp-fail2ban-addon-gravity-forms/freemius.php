<?php

declare ( strict_types = 1 );
/**
 * Freemius integration.
 *
 * @package wp-fail2ban-addon-gravity-forms
 * @since 1.1.0
 */
namespace com\wp_fail2ban\addons\GravityForms\Freemius;

// @codeCoverageIgnoreStart
defined( 'ABSPATH' ) or exit;
if ( !function_exists( __NAMESPACE__ . '\\wpf2b_addon_gform_fs' ) ) {
    /**
     * Create a helper function for easy SDK access.
     *
     * @since 1.0.0
     *
     * @return mixed
     */
    function wpf2b_addon_gform_fs()
    {
        global  $wpf2b_addon_gform_fs ;
        
        if ( !isset( $wpf2b_addon_gform_fs ) ) {
            // Activate multisite network integration.
            if ( !defined( 'WP_FS__PRODUCT_3565_MULTISITE' ) ) {
                define( 'WP_FS__PRODUCT_3565_MULTISITE', true );
            }
            // Include Freemius SDK.
            
            if ( file_exists( dirname( __DIR__ ) . '/wp-fail2ban/vendor/freemius/wordpress-sdk/start.php' ) ) {
                // Try to load SDK from parent plugin folder.
                require_once dirname( __DIR__ ) . '/wp-fail2ban/vendor/freemius/wordpress-sdk/start.php';
            } elseif ( file_exists( dirname( __DIR__ ) . '/wp-fail2ban-premium/vendor/freemius/wordpress-sdk/start.php' ) ) {
                // Try to load SDK from premium parent plugin folder.
                require_once dirname( __DIR__ ) . '/wp-fail2ban-premium/vendor/freemius/wordpress-sdk/start.php';
            } else {
                return false;
            }
            
            $wpf2b_addon_gform_fs = fs_dynamic_init( array(
                'id'             => '3565',
                'slug'           => 'wp-fail2ban-addon-gravity-forms',
                'premium_slug'   => 'wp-fail2ban-addon-gravity-forms-premium',
                'type'           => 'plugin',
                'public_key'     => 'pk_8c5d4d69296f78a9827a02d66732b',
                'is_premium'     => false,
                'has_paid_plans' => false,
                'parent'         => array(
                'id'         => '3072',
                'slug'       => 'wp-fail2ban',
                'public_key' => 'pk_146d2c2a5bee3b157e43501ef8682',
                'name'       => 'WP fail2ban',
            ),
                'menu'           => array(
                'first-path' => 'admin.php?page=wp-fail2ban_addon_gravityforms',
                'account'    => false,
                'support'    => false,
            ),
                'is_live'        => true,
            ) );
        }
        
        return $wpf2b_addon_gform_fs;
    }

}
/**
 * Freemius boilerplate
 *
 * @since 1.0.0
 *
 * @return bool
 */
function wpf2b_addon_gform_fs_is_parent_active_and_loaded()
{
    // Check if the parent's init SDK method exists.
    return function_exists( 'org\\lecklider\\charles\\wordpress\\wp_fail2ban\\wf_fs' );
}

/**
 * Freemius boilerplate
 *
 * @since 1.0.0
 *
 * @return bool
 */
function wpf2b_addon_gform_fs_is_parent_active()
{
    $active_plugins = get_option( 'active_plugins', [] );
    
    if ( is_multisite() ) {
        $network_active_plugins = get_site_option( 'active_sitewide_plugins', [] );
        $active_plugins = array_merge( $active_plugins, array_keys( $network_active_plugins ) );
    }
    
    foreach ( $active_plugins as $basename ) {
        if ( 0 === strpos( $basename, 'wp-fail2ban/' ) || 0 === strpos( $basename, 'wp-fail2ban-premium/' ) ) {
            return true;
        }
    }
    return false;
}

/**
 * Freemius boilerplate
 *
 * @since 1.0.0
 *
 * @return void
 */
function wpf2b_addon_gform_fs_init()
{
    
    if ( wpf2b_addon_gform_fs_is_parent_active_and_loaded() ) {
        // Init Freemius.
        
        if ( null === ($fs = wpf2b_addon_gform_fs()) ) {
            // @TODO
        } else {
            $fs->add_filter( 'redirect_on_activation', function ( $true ) {
                assert( $true );
                fs_redirect( network_admin_url( 'admin.php?page=wp-fail2ban_addon_gravityforms' ) );
            } );
            // Signal that the add-on's SDK was initiated.
            do_action( 'wpf2b_addon_gform_fs_loaded' );
            require_once 'functions.php';
            require_once 'init.php';
            add_action( 'init', WP_FAIL2BAN_ADDON_GRAVITY_FORMS_NS . '\\init' );
        }
    
    } else {
        // Parent is inactive, add your error handling here.
    }

}


if ( wpf2b_addon_gform_fs_is_parent_active_and_loaded() ) {
    // If parent already included, init add-on.
    wpf2b_addon_gform_fs_init();
} elseif ( wpf2b_addon_gform_fs_is_parent_active() ) {
    // Init add-on only after the parent is loaded.
    add_action( 'wf_fs_loaded', __NAMESPACE__ . '\\wpf2b_addon_gform_fs_init' );
} else {
    // Even though the parent is not activated, execute add-on for activation / uninstall hooks.
    wpf2b_addon_gform_fs_init();
}
