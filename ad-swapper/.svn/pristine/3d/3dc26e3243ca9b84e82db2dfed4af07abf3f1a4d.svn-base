<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / ADSWAPPER-ADMANAGER-SUPPORT.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

// =============================================================================
// is_adswapper_admanager_site()
// =============================================================================

if ( ! function_exists( 'is_adswapper_admanager_site' ) ) {

function is_adswapper_admanager_site() {

    // -------------------------------------------------------------------------

    if ( ! is_multisite() ) {
        return FALSE ;
    }

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( 'HTTP_HOST' , $_SERVER ) ) {
        die( 'PROBLEM:&nbsp; No HTTP_HOST' ) ;
    }

    // -------------------------------------------------------------------------

    $domain_names_for_adswapper_admanager_site = array(
        'adswapper.biz'         ,
        'localhost.com'
        ) ;

    // -------------------------------------------------------------------------

    foreach ( $domain_names_for_adswapper_admanager_site as $this_domain_name ) {

        $this_domain_name_len = strlen( $this_domain_name ) ;

        if ( substr( $_SERVER['HTTP_HOST'] , -1 * $this_domain_name_len ) === $this_domain_name ) {
            return TRUE ;
        }

    }

    // -------------------------------------------------------------------------

    return FALSE ;

    // -------------------------------------------------------------------------

}

}

// =============================================================================
// run_ad_swapper_local_plugin()
// =============================================================================

if ( ! function_exists( 'run_ad_swapper_local_plugin' ) ) {

function run_ad_swapper_local_plugin() {

    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adminSection\home_page() ;

}

}

// =============================================================================
// get_ad_swapper_local_plugin_url()
// =============================================================================

if ( ! function_exists( 'get_ad_swapper_local_plugin_url' ) ) {

function get_ad_swapper_local_plugin_url() {

    return  trailingslashit( admin_url() ) .
            'admin.php?page=adSwapperLocalV0x1x211'
            ;

}

}

// =============================================================================
// That's that!
// =============================================================================

