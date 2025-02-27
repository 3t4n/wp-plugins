<?php

namespace Molongui\BumpOffer\Includes;
\defined( 'ABSPATH' ) or exit;
class DB_Update
{
    public function db_update_10()
    {
        $main    = \get_option( 'molongui_bump_offer_main', array() );
        $default = \get_option( 'molongui_bump_offer_default', array() );
        $compat  = \get_option( 'molongui_bump_offer_compat', array() );
        $options = \array_merge( $main, $default, $compat );
        \update_option( 'molongui_bump_offer_options', $options );
        \delete_option( 'molongui_bump_offer_main' );
        \delete_option( 'molongui_bump_offer_default' );
        \delete_option( 'molongui_bump_offer_compat' );
        $now = \get_option( 'molongui_bump_offer_installation', array() );

        if ( !empty( $now ) )
        {
            $new = array
            (
                'timestamp' => isset( $now['install_date'] ) ? $now['install_date'] : '',
                'version'   => isset( $now['install_version'] ) ? $now['install_version'] : '',
            );
            \update_option( 'molongui_bump_offer_install', $new );
            \delete_option( 'molongui_bump_offer_installation' );
        }
    }
    public function db_update_9()
    {
        $deals = get_posts( array
        (
            'numberposts'   => -1,
            'fields'        => 'ids',
            'post_type'     => 'molongui_bump',
            'no_found_rows' => true,
        ));
        foreach ( $deals as $deal )
        {
            update_post_meta( $deal, '_molongui_deal_type', 'custom' );
            update_post_meta( $deal, '_molongui_deal_quantity', 1 );
        }
    }
    public function db_update_8()
    {
        \delete_option( 'molongui_order_bump_db_version' );
    }
    public function db_update_7()
    {
        $rename = array
        (
            'molongui_order_bump_db_version'   => 'molongui_bump_offer_db_version',
            'molongui_order_bump_installation' => 'molongui_bump_offer_installation',
            'molongui_order_bump_main'         => 'molongui_bump_offer_main',
            'molongui_order_bump_defaults'     => 'molongui_bump_offer_default',
            'molongui_order_bump_advanced'     => 'molongui_bump_offer_compat',
            'molongui_order_bump_notices'      => 'molongui_bump_offer_notices',
        );
        foreach ( $rename as $old => $new )
        {
            if ( $db_value = \get_option( $old ) )
            {
                \delete_option( $old );
                \update_option( $new, $db_value );
            }
        }
        $main   = \get_option( 'molongui_bump_offer_main'   );
        $compat = \get_option( 'molongui_bump_offer_compat' );

        $main['keep_config'] = isset( $compat['keep_config'] ) ? $compat['keep_config'] : false;
        $main['keep_data']   = isset( $compat['keep_data'] )   ? $compat['keep_data']   : false;

        unset( $compat['keep_config'] );
        unset( $compat['keep_data'] );
        $main['submenu_location'] = 'woocommerce';

        \update_option( 'molongui_bump_offer_main'  , $main   );
        \update_option( 'molongui_bump_offer_compat', $compat );
        \delete_option( 'molongui_order_bump_version' );
        \delete_option( 'molongui_order_bump_strings' );
        \add_option( 'molongui_bump_offer_hooks', array( 'woocommerce_review_order_before_submit' ) );
        \update_option( 'molongui_bump_offer_db_version', '7' );
    }
    public function db_update_6()
    {
        $main = \get_option( 'molongui_order_bump_main' );
        $main['exclude_bumps_from_contents'] = true;
        \update_option( 'molongui_order_bump_main', $main );
    }
    public function db_update_5()
    {
        global $wpdb;
        $wpdb->query( "UPDATE {$wpdb->prefix}postmeta SET meta_value = 'start' WHERE meta_key = '_molongui_bump_box_align' AND meta_value = 'left';" );
        $wpdb->query( "UPDATE {$wpdb->prefix}postmeta SET meta_value = 'end' WHERE meta_key = '_molongui_bump_box_align' AND meta_value = 'right';" );
    }
    public function db_update_4()
    {
        \delete_option( 'molongui_bump_offer_db_version' );
    }
    public function db_update_3()
    {
        $rename = array
        (
            'molongui_bump_offer_installation' => 'molongui_order_bump_installation',
            'molongui_bump_offer_notices'      => 'molongui_order_bump_notices',
            'molongui_bump_offer_main'         => 'molongui_order_bump_main',
            'molongui_bump_offer_strings'      => 'molongui_order_bump_strings',
            'molongui_bump_offer_advanced'     => 'molongui_order_bump_advanced',
            'molongui_bump_offer_version'      => 'molongui_order_bump_version',
            'molongui_bump_offer_license'      => 'molongui_order_bump_license',
            'molongui_bump_offer_product_id'   => 'molongui_order_bump_product_id',
            'molongui_bump_offer_activated'    => 'molongui_order_bump_activated',
            'molongui_bump_offer_instance'     => 'molongui_order_bump_instance',
        );

        foreach ( $rename as $old => $new )
        {
            if ( $db_value = \get_option( $old ) )
            {
                if ( $old == 'molongui_bump_offer_product_id' )
                {
                    \delete_option( $old );
                    \update_option( $new, \str_replace( 'Bump Offer', 'Order Bump', $db_value ) );
                }
                else
                {
                    \delete_option( $old );
                    \update_option( $new, $db_value );
                }
            }
        }
        \delete_option( 'molongui_bump_offer_strings' );
        \update_option( 'molongui_order_bump_db_version', '3' );
    }
    public function db_update_2()
    {
        $transients = array
        (
            'molongui-bump-offer-install-notice'         => 'install-notice-dismissal',
            'molongui-bump-offer-whatsnew-notice'        => 'whatsnew-notice-dismissal',
            'molongui-bump-offer-upgrade-notice'         => 'upgrade-notice-dismissal',
            'molongui-bump-offer-rate-notice'            => 'rate-notice-dismissal',
            'molongui-bump-offer-renew-license-notice'   => 'renew-license-notice-dismissal',
            'molongui-bump-offer-expired-license-notice' => 'expired-license-notice-dismissal',
        );

        foreach ( $transients as $transient_name => $key )
        {
            $value = \get_site_transient( $transient_name );
            if ( $value )
            {
                $notices = \get_option( 'molongui_bump_offer_notices' );
                if ( !$notices ) $notices = array();
                $notices[$key] = $value;
                \update_option( 'molongui_bump_offer_notices', $notices );
            }
            \delete_site_transient( $transient_name );
        }
    }

} // class