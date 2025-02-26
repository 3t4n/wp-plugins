<?php

/**
 * Plugin upgrade class. This will become more populated over time.
 *
 * @author CyberSpecLab
 * @since 1.0
 */
class ESL_Upgrade {

    /**
     * Upgrade from Cyber Slider
     *
     * @since 1.0
     */
    public static final function do_upgrades() {

        /** Get current plugin version */
        $version = get_option( 'cyberslider_version' );

        /** Trigger activation if needed */
        if ( !$version )
            cyberslider::get_instance()->activate();

        /**
         * A name change occurred in this version, so we check for the old database option before execution (because the user may never have upgraded to v2.0!)
         */
        if ( get_option( 'showslider_version' ) && ( version_compare( $version, '2.0.1', '<' ) || version_compare( $version, '2.0.1.3', '=' ) ) )
            self::do_201_upgrade();
        if ( get_option( 'showslider_version' ) && ( version_compare( $version, '2.0.1', '=' ) ) )
            self::do_201_cleanup();

        /** Upgrade to v2.1 */
        if ( version_compare( $version, '2.1', '<' ) )
            self::do_210_upgrade();

        /** Custom hooks */
        do_action( 'cyberslider_upgrades', cyberslider::$version, $version );

        /** Update plugin version number if needed */
        if ( !version_compare( $version, cyberslider::$version, '=' ) )
            update_option( 'cyberslider_version', cyberslider::$version );

    }

    /**
     * Do 2.0.1 upgrades
     *
     * @since 1.0
     */
    public static final function do_201_upgrade() {

        global $wp_roles;

        /** Transfer old options for plugin name revert */
        update_option( 'cyberslider_version', get_option( 'showslider_version' ) );
        update_option( 'cyberslider_slideshow', get_option( 'showslider_slideshow' ) );
        update_option( 'cyberslider_settings', get_option( 'showslider_settings' ) );
        /**
         * If we've upgraded to v2.0, regardless if our major upgrade fired successfully or not
         * we don't want to fire it again and destroy up any changes we've made since
         */
        update_option( 'cyberslider_major_upgrade', 1 );
        update_option( 'cyberslider_disable_welcome_panel', get_option( 'showslider_disable_welcome_panel' ) );

        /** Cleanup the old settings */
        self::do_201_cleanup();

        /** Remove old permissions and add new ones */
        foreach ( $wp_roles->roles as $role => $info ) {
            $user_role = get_role( $role );
            cyberslider::get_instance()->remove_capability( 'showslider_edit_slideshow', $user_role );
            cyberslider::get_instance()->remove_capability( 'showslider_edit_settings', $user_role );
        }
        cyberslider::get_instance()->manage_capabilities( 'add' );

    }

    /**
     * Clean's up setting after v2.0.1 upgrade
     *
     * @since 1.0
     */
    public static final function do_201_cleanup() {
        delete_option( 'showslider_version' );
        delete_option( 'showslider_slideshow' );
        delete_option( 'showslider_settings' );
        delete_option( 'showslider_cybershowslider_upgrade' );
        delete_option( 'showslider_disable_welcome_panel' );
    }

    /**
     * Does 2.1 plugin upgrade
     *
     * @since 1.0
     */
    public static final function do_210_upgrade() {

        global $wp_roles;

        /** Add the customizations database option */
        add_option( 'cyberslider_customizations', json_encode( cyberslider::get_instance()->customization_defaults() ) );
        
        /** Add the customization panel capability */
        foreach ( $wp_roles->roles as $role => $info )
            cyberslider::get_instance()->add_capability( 'cyberslider_can_customize', get_role( $role ) );

    }

}