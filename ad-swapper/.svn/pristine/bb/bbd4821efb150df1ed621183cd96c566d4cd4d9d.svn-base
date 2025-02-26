<?php

// *****************************************************************************
// AD-SWAPPER.APP / APP-DATA.PHP
// (C) 2014 Peter Newman. All Rights Reserved
// *****************************************************************************

    namespace greatKiwi_pluginMaker_appStuff_adSwapper ;

//  namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_appData ;

// =============================================================================
// BUG-FIX!
//
// This is a hack to fix a problem that pressing Save in the
//      Appearance -> Widgets -> Ad Swapper Ad Display
//
// widget (from Plugin Plant, at least), generates the following error
// message:-
//
//      Fatal error: Cannot redeclare
//      greatKiwi_pluginMaker_appStuff_adSwapper\get_app_data() (previously
//      declared in
//      /opt/lampp/htdocs/plugdev/wp-content/plugins/ad-swapper-local-v0.1.61/app-defs/ad-swapper.app/app-data.php:37)
//      in
//      /opt/lampp/htdocs/plugdev/wp-content/plugins/plugin-plant/app-defs/ad-swapper.app/app-data.php
//      on line 84
//
// =============================================================================

    if ( ! \function_exists(
            '\\' . __NAMESPACE__ . '\\get_app_data'
            )
        ) {

// =============================================================================
// get_app_data()
// =============================================================================

function get_app_data() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appData\get_app_data()
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns an array holding the application-specific data...
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          ARRAY $app_data
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =============================================================================
    // APP SETUP...
    // =============================================================================

    $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_adSwapperUserIdOptions'] =
        array(
            'number_groups'         =>  6       ,
            'chars_per_group'       =>  4       ,
            'group_separator'       =>  '-'     ,
            'lowercase_only'        =>  TRUE    ,
            'question_punctuation'  =>  FALSE
            ) ;
        //  See ".../includes/great-kiwi-passwords.php"

    // -------------------------------------------------------------------------

    $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_adSwapperSiteIdOptions'] =
        array(
            'number_groups'         =>  6       ,
            'chars_per_group'       =>  4       ,
            'group_separator'       =>  '-'     ,
            'lowercase_only'        =>  TRUE    ,
            'question_punctuation'  =>  FALSE
            ) ;
        //  See ".../includes/great-kiwi-passwords.php"

    // =============================================================================
    // Return the APP DATA...
    // =============================================================================

    return array(
                'app_slug'                  =>  'ad_swapper'        ,
                'app_title'                 =>  'Ad Swapper'        ,
                'app_title_camel_case'      =>  'adSwapper'         ,
                'dataset_listing_order'     =>  array(
                                                    'ad_swapper_plugin_settings'        ,
                                                    'ad_swapper_site_profile'           ,
                                                    'ad_swapper_ads_outgoing'           ,
                                                    'ad_swapper_ad_slots'               ,
                                                    'ad_swapper_web_site_collections'   ,
                                                    'ad_swapper_available_sites'        ,
                                                    'ad_swapper_available_ads'          ,
                                                    'ad_swapper_page_requests'          ,
                                                    'ad_swapper_ad_impressions'         ,
                                                    'ad_swapper_widget_settings'
                                                    )
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// -----------------------------------------------------------------------------

    }       //  See the "\function_exists()", above.

// =============================================================================
// That's that!
// =============================================================================

