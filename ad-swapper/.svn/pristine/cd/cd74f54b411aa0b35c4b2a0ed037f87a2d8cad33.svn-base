<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / CUSTOM.PAGES / UPDATE-CENTRAL-SITE.CP /
//      UPDATE-CENTRAL-SITE.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateCentralSite ;

// =============================================================================
// get_update_central_site_page_html()
// =============================================================================

function get_update_central_site_page_html(
    $core_plugapp_dirs                                  ,
    $applications_dataset_and_view_definitions_etc      ,
    $all_custom_pages                                   ,
    $this_custom_page                                   ,
    $question_front_end
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_<customPageNameCamelCase>\
    // get_update_central_site_page_html(
    //      $core_plugapp_dirs                                  ,
    //      $applications_dataset_and_view_definitions_etc      ,
    //      $all_custom_pages                                   ,
    //      $this_custom_page                                   ,
    //      $question_front_end
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Updates the Ad Swapper Central site (with this site's Ad Swapper site
    // details and ads, etc.
    //
    // Returns the "Update Central Site" page HTML.
    //
    // RETURNS
    //      o   On SUCCESS
    //              $page_html STRING
    //              (The HTML for the page to be displayed.)
    //
    //      o   On FAILURE
    //              ARRAY( $error_message ) STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // NOTES!
    // ------
    // 1.   Here we should have (eg):-
    //
    //          $_GET = Array(
    //                      [page]          => pluginPlant
    //                      [action]        => custom-page
    //                      [application]   => selective-exporter
    //                      [custom_page]   => export-pages
    //                      )
    //
    // 2.   At this point, the following GET variables:-
    //          o   'page'
    //          o   'action'
    //          o   'application'
    //          o   'custom_page'
    //
    //      have been validated - and are OK.
    //
    // 3.   All, other (eg; custom page specific,) GET variables are unchecked.
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_GET , '$_GET' ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $_POST = Array()
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_POST , '$_POST' ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_COOKIE , '$_COOKIE' ) ;

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_page_header(
    //      $page_title                     ,
    //      $caller_apps_includes_dir       ,
    //      $question_front_end
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // Returns the page header HTML - for the currently running plugin - and
    // with the specified title.
    //
    // Dies() on error.
    // -------------------------------------------------------------------------

    $page_title = $this_custom_page['general_title'] ;

    $caller_apps_includes_dir = $core_plugapp_dirs['plugins_includes_dir'] ;

    $page_header = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_page_header(
                        $page_title                     ,
                        $caller_apps_includes_dir       ,
                        $question_front_end
                        ) ;

    // -------------------------------------------------------------------------

    if (    array_key_exists(
                'sync_step'     ,
                $_GET
                )
            &&
            $_GET['sync_step'] === '1'
        ) {
        $question_synchronising = TRUE ;

    } else {
        $question_synchronising = FALSE ;

    }

    // -------------------------------------------------------------------------

    $sync_output = '' ;

    // =========================================================================
    // Support Routines...
    // =========================================================================

    require_once( dirname( dirname( dirname( __FILE__ ) ) ) . '/api/api-call-support.php' ) ;

    // =========================================================================
    // Load the Ad Swapper datasets...
    // =========================================================================

    require_once( dirname( dirname( dirname( __FILE__ ) ) ) . '/includes/datasets-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetSupport\
    // get_ad_swapper_dataset_records(
    //      $core_plugapp_dirs      ,
    //      $question_front_end     ,
    //      )
    // - - - - - - - - - - - - - - -
    // Returns the CACHED Ad Swapper dataset records.
    //
    // RETURNS:-
    //
    //      On FAILURE
    //          $error_message STRING
    //
    //      On SUCCESS
    //          array(
    //              $app_defs_directory_tree                        ,
    //              $applications_dataset_and_view_definitions_etc  ,
    //              $all_application_dataset_definitions            ,
    //              $loaded_datasets
    //              )
    //
    // Where:-
    //
    //      $loaded_datasets = Array(
    //
    //          [ad_swapper_impressions] => Array(
    //              [title]                 => Impressions
    //              [records]               => Array()
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array()
    //              )
    //
    //          [ad_swapper_settings] => Array(
    //              [title]                 => Settings
    //              [records]               => Array(
    //                  [0] => Array(
    //                              [created_server_datetime_utc]       => 1416388978
    //                              [last_modified_server_datetime_utc] => 1416388978
    //                              [key]                               => c885e81e-4af9-40bd-a485-34c9d835d9e5-1416388978-679287-1131
    //                              [api_url_override]                  => http://localhost/plugdev/wp-content/plugins/plugin-plant/app-defs/ad-swapper-central.app/plugin.stuff/api/api-call-handler.php
    //                              )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [c885e81e-4af9-40bd-a485-34c9d835d9e5-1416388978-679287-1131] => 0
    //                  )
    //              )
    //
    //          [ad_swapper_plugin_settings] => Array(
    //              [title]                 => Plugin Settings
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1421887967
    //                      [last_modified_server_datetime_utc] => 1421887967
    //                      [key]                               => 7dd6c89c-6ac1-4b07-9851-be51d6219420-1421887967-696176-1480
    //                      [ad_swapper_user_sid]               => 2gkw-vmcz
    //                      [ad_swapper_site_sid]               => 2kmv-hzgc
    //                      [site_unique_key]                   => 2222-2222-2222-2222
    //                      [site_registration_key]             => 675ed35f6c108...7a78fe029d
    //                      [api_public_encryption_key]         =>
    //                      [api_mcryption_key]                 => bc502c56...bb9749691a
    //                      [api_url_override]                  => http://localhost/plugdev/.../api-call-handler.php
    //                      )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [7dd6c89c-6ac1-4b07-9851-be51d6219420-1421887967-696176-1480] => 0
    //                  )
    //              )
    //
    //          [ad_swapper_site_profile] => Array(
    //              [title]                 => Site Profile
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1416718948
    //                      [last_modified_server_datetime_utc] => 1416718948
    //                      [key]                               => 9475e467-59b6-4f6d-9f32-5413e2b07c4e-1416718948-108185-1163
    //                      [site_owners_ad_swapper_user_sid]   => z4v2-mkcx-wh79-yg3n
    //                      [site_url]                          => http://www.example.com
    //                      [site_title]                        => The Site
    //                      [site_description]                  =>
    //                      [ads_wanted_description]            =>
    //                      [sites_wanted_description]          =>
    //                      [categories_available]              =>
    //                      [categories_wanted]                 =>
    //                      )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [9475e467-59b6-4f6d-9f32-5413e2b07c4e-1416718948-108185-1163] => 0
    //                  )
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

    $ad_swapper_dataset_records =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetSupport\get_ad_swapper_dataset_records(
            $core_plugapp_dirs      ,
            $question_front_end
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $ad_swapper_dataset_records ) ) {
        return array( $ad_swapper_dataset_records )  ;
    }

    // -------------------------------------------------------------------------

    list(
        $app_defs_directory_tree                        ,
        $applications_dataset_and_view_definitions_etc  ,
        $all_application_dataset_definitions            ,
        $loaded_datasets
        ) = $ad_swapper_dataset_records ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $loaded_datasets = Array(
    //
    //         [ad_swapper_ads_outgoing] => Array(
    //              [title]                 => Ads - Outgoing
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1417157309
    //                      [last_modified_server_datetime_utc] => 1417157309
    //                      [key]                               => 9d9836e7-e8fd-4ca0-a848-ceef839e04ad-1417157309-463474-1176
    //                      [site_key]                          =>
    //                      [image_url]                         => http://localhost/plugdev/wp-content/uploads/2014/06/rookie-mag-postcards-from-wonderland.jpeg
    //                      [link_url]                          => http://www.google.co.nz
    //                      [alt_text]                          =>
    //                      [description]                       =>
    //                      [start_datetime]                    =>
    //                      [end_datetime]                      =>
    //                      [question_disabled]                 =>
    //                      [aspect_ratio_min]                  =>
    //                      [aspect_ratio_max]                  =>
    //                      [sequence_number]                   =>
    //                      )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [9d9836e7-e8fd-4ca0-a848-ceef839e04ad-1417157309-463474-1176] => 0
    //                  )
    //
    //              )
    //
    //          [ad_swapper_impressions] => Array(
    //              [title]                 => Impressions
    //              [records]               => Array()
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array()
    //              )
    //
    //          [ad_swapper_plugin_settings] => Array(
    //              [title]                 => Plugin Settings
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1417930162
    //                      [last_modified_server_datetime_utc] => 1417930162
    //                      [key]                               => abd1d6f4-7865-487b-a668-0fcbab0f17d3-1417930162-821262-1282
    //                      [ad_swapper_user_sid]                => gcmv-2mpy-xkwc-39kg-m9c3-939h
    //                      [plugin_registration_key]           => MoHnDSq88CX.../fU1RA7IR
    //                      [api_public_encryption_key]         => xxx
    //                      [ad_swapper_site_sid]               => 7cnc-npvh-cd3m-vyk4-czdd-72dh
    //                      [api_url_override]                  =>
    //                      )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [abd1d6f4-7865-487b-a668-0fcbab0f17d3-1417930162-821262-1282] => 0
    //                  )
    //              )
    //
    //          [ad_swapper_site_profile] => Array(
    //              [title]                 => Site Profile
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1417839045
    //                      [last_modified_server_datetime_utc] => 1417839045
    //                      [key]                               => 68fb3737-d4a7-481f-a941-b82e916b0b6c-1417839045-460169-1281
    //                      [site_title]                        => Plugdev
    //                      [home_page_url]                     => http://localhost/plugdev
    //                      [general_description]               =>
    //                      [ads_wanted_description]            =>
    //                      [sites_wanted_description]          =>
    //                      [categories_available]              =>
    //                      [categories_wanted]                 =>
    //                      )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [68fb3737-d4a7-481f-a941-b82e916b0b6c-1417839045-460169-1281] => 0
    //                  )
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

//$loaded_datasets['ad_swapper_ad_impressions']['records'] = array() ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $loaded_datasets , 'LOCAL $loaded_datasets' ) ;

//exit() ;

    // =========================================================================
    // Prepare the data to be sent to the Ad Swapper Central site...
    // =========================================================================

    if ( count( $loaded_datasets['ad_swapper_plugin_settings']['records'] ) < 1 ) {

        // ---------------------------------------------------------------------
        // NO Plugin Settings record yet!
        //
        //      =>  Site not yet registered with Ad Swapper Central
        // ---------------------------------------------------------------------

        $dataset_slug = 'ad_swapper_plugin_settings' ;

        // ---------------------------------------------------------------------

        $msg = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_apiCallSupport\get_site_not_registered_message(
                    $core_plugapp_dirs      ,
                    $question_front_end     ,
                    $dataset_slug
                    ) ;

        // ---------------------------------------------------------------------

        $msg = <<<EOT
<div style="margin-top:1em; width:98%">{$page_header}<br />{$msg}</div>
EOT;

        // ---------------------------------------------------------------------

        return $msg ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $plugin_registration_record_site_unique_key =
        $loaded_datasets['ad_swapper_plugin_settings']['records'][0]['site_unique_key']
        ;

    // =========================================================================
    // SITE PROFILE
    // =========================================================================

    if ( count( $loaded_datasets['ad_swapper_site_profile']['records'] ) < 1 ) {

        // ---------------------------------------------------------------------
        // NO Site Profile record yet!
        // ---------------------------------------------------------------------

        require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/string-utils.php' ) ;

        // ---------------------------------------------------------------------

        $msg = <<<EOT
<div style="padding:0.5em 0">
    Oops!&nbsp; <b>You haven't filled in and saved your Site Profile yet.</b>
    <div style="margin-top:1em">
        Please do this - by running the <b>Maintain This Site's Profile</b>
        option (from the Ad Swapper Main Menu) - then try again.
    </div>
</div>
EOT;

        // ---------------------------------------------------------------------

        $msg = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_error_message( $msg ) ;

        // ---------------------------------------------------------------------

        $msg = <<<EOT
<div style="margin-top:2em; width:98%">{$page_header}<br />{$msg}</div>
EOT;

        // ---------------------------------------------------------------------

        return \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_one_line( $msg ) ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $site_profile_record = $loaded_datasets['ad_swapper_site_profile']['records']['0'] ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $site_profile_record = Array(
    //          [created_server_datetime_utc]       => 1418445063
    //          [last_modified_server_datetime_utc] => 1418445063
    //          [key]                               => add9f270-9f5b-429a-a264-f0f5c7cc59db-1418445063-977293-1355
    //          [site_title]                        => Plugdev
    //          [home_page_url]                     => http://localhost/plugdev
    //          [general_description]               =>
    //          [ads_wanted_description]            =>
    //          [sites_wanted_description]          =>
    //          [categories_available]              =>
    //          [categories_wanted]                 =>
    //          [geoip_continents_incl]             =>
    //          [geoip_continents_excl]             =>
    //          [geoip_countries_incl]              => NZ
    //          [geoip_countries_excl]              =>
    //          [geoip_regions_incl]                =>
    //          [geoip_regions_excl]                =>
    //          [geoip_cities_incl]                 =>
    //          [geoip_cities_excl]                 =>
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $site_profile_record , 'LOCAL $site_profile_record' ) ;

    // -------------------------------------------------------------------------

    $site_profile = $site_profile_record ;

    // -------------------------------------------------------------------------

    unset( $site_profile['created_server_datetime_utc']       ) ;
    unset( $site_profile['last_modified_server_datetime_utc'] ) ;
    unset( $site_profile['key']                               ) ;

    // -------------------------------------------------------------------------

    unset( $site_profile['max_ads_per_site_per_page']       ) ;
    unset( $site_profile['max_repetitions_per_ad_per_page'] ) ;
    unset( $site_profile['test_method']                     ) ;
    unset( $site_profile['test_ip']                         ) ;
    unset( $site_profile['show_ads_list_reload_buttons']    ) ;
    unset( $site_profile['question_manual_update_approval'] ) ;

    // -------------------------------------------------------------------------

    if ( $site_profile['question_disable_incoming_ads'] ) {
        $site_profile['question_disable_incoming_ads'] = 'yes' ;
    } else {
        $site_profile['question_disable_incoming_ads'] = 'no' ;
    }

    // -------------------------------------------------------------------------

    if ( $site_profile['question_disable_outgoing_ads'] ) {
        $site_profile['question_disable_outgoing_ads'] = 'yes' ;
    } else {
        $site_profile['question_disable_outgoing_ads'] = 'no' ;
    }

    // -------------------------------------------------------------------------

    if ( $site_profile['question_auto_approve_new_ads'] ) {
        $site_profile['question_auto_approve_new_ads'] = 'yes' ;
    } else {
        $site_profile['question_auto_approve_new_ads'] = 'no' ;
    }

    // -------------------------------------------------------------------------

//  require_once( $core_plugapp_dirs['apps_dot_app_dir'] . '/site-and-plugin-status-support.php' ) ;
//
//  // -------------------------------------------------------------------------
//  // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_siteAndPluginStatusSupport\
//  // get_site_and_plugin_status()
//  // - - - - - - - - - - - - - -
//  // RETURNS
//  //      On SUCCESS
//  //          $site_and_plugin_status ARRAY
//  //
//  //          Which array should be like (eg):-
//  //
//  //              $site_and_plugin_status = array(
//  //                  'last_central_data_retrieval_time_gmt'  =>  <this-time()>                       ,
//  //                  'subscription_license_key'              =>  '' or 32-char HEX string            ,
//  //                  'exact_subscription_type'               =>  'trial", "paid", "manual", etc      ,
//  //                  'effective_subscription_type'           =>  'trial" or "paid"                   ,
//  //                  'subscription_start_datetime_gmt'       =>  <that-time()>                       ,
//  //                  'subscription_expiry_datetime_gmt'      =>  <the-other-time()>                  ,
//  //                  'central_plugin_version'                =>  'X.Y.Z'                             ,
//  //                  'min_local_plugin_version'              =>  'A.B.C'                             ,
//  //                  'max_local_plugin_version'              =>  'D.E.F'
//  //                  )
//  //
//  //          Though if the "site_and_plugin_status" HASN'T been set yet
//  //          (because "Update Local Site" HASN'T been run yet), it will be
//  //          like:-
//  //
//  //              $site_and_plugin_status = array(
//  //                  'last_central_data_retrieval_time_gmt'  =>  0           ,
//  //                  'subscription_license_key'              =>  'unknown'   ,
//  //                  'exact_subscription_type'               =>  'unknown'   ,
//  //                  'effective_subscription_type'           =>  'unknown'   ,
//  //                  'subscription_start_datetime_gmt'       =>  0           ,
//  //                  'subscription_expiry_datetime_gmt'      =>  0           ,
//  //                  'central_plugin_version'                =>  'unknown'   ,
//  //                  'min_local_plugin_version'              =>  'unknown'   ,
//  //                  'max_local_plugin_version'              =>  'unknown'
//  //                  )
//  //
//  //      On FAILURE
//  //          $error_message STRING
//  // -------------------------------------------------------------------------
//
//  $site_and_plugin_status =
//      \greatKiwi_byFernTec_adSwapper_local_v0x1x211_siteAndPluginStatusSupport\get_site_and_plugin_status()
//      ;
//
//  // -------------------------------------------------------------------------
//
//  if ( is_string( $site_and_plugin_status ) ) {
//      die( nl2br( $site_and_plugin_status ) ) ;
//  }
//
//  // -------------------------------------------------------------------------
//
//  $site_profile['subscription_license_key'] =
//      $site_and_plugin_status['subscription_license_key']
//      ;
//
//  // -------------------------------------------------------------------------
//
//  $site_profile['exact_subscription_type'] =
//      $site_and_plugin_status['exact_subscription_type']
//      ;
//
//  // -------------------------------------------------------------------------
//
//  $site_profile['effective_subscription_type'] =
//      $site_and_plugin_status['effective_subscription_type']
//      ;
//
//  // -------------------------------------------------------------------------
//
//  $site_profile['subscription_start_datetime_gmt'] =
//      $site_and_plugin_status['subscription_start_datetime_gmt']
//      ;
//
//  // -------------------------------------------------------------------------
//
//  $site_profile['subscription_expiry_datetime_gmt'] =
//      $site_and_plugin_status['subscription_expiry_datetime_gmt']
//      ;

    // =========================================================================
    // ADS - OUTGOING
    // =========================================================================

    $ads_outgoing = array() ;

    // -------------------------------------------------------------------------

    $outgoing_ad_counts = array(
        'total'         =>  0       ,
        'disabled'      =>  0       ,
        'non_disabled'  =>  0       ,
        'targeted'      =>  0       ,
        'non_targeted'  =>  0       ,
        'uploaded'      =>  0
        ) ;

    // -------------------------------------------------------------------------

    foreach ( $loaded_datasets['ad_swapper_ads_outgoing']['records'] as $record_index => $record_data ) {

        // ---------------------------------------------------------------------

        $outgoing_ad_counts['total']++ ;

        // ---------------------------------------------------------------------

        $question_skip = FALSE ;

        // ---------------------------------------------------------------------

        if (    array_key_exists( 'question_disabled' , $record_data )
                &&
                $record_data['question_disabled']
            ) {

            $outgoing_ad_counts['disabled']++ ;

            $question_skip = TRUE ;
                //  Skip disabled ads...

        } else {
            $outgoing_ad_counts['non_disabled']++ ;

        }

        // ---------------------------------------------------------------------

        $record_data['geoip_continents_incl'] = $site_profile['geoip_continents_incl'] ;
        $record_data['geoip_continents_excl'] = $site_profile['geoip_continents_excl'] ;
        $record_data['geoip_countries_incl']  = $site_profile['geoip_countries_incl']  ;
        $record_data['geoip_countries_excl']  = $site_profile['geoip_countries_excl']  ;
        $record_data['geoip_regions_incl']    = $site_profile['geoip_regions_incl']    ;
        $record_data['geoip_regions_excl']    = $site_profile['geoip_regions_excl']    ;
        $record_data['geoip_cities_incl']     = $site_profile['geoip_cities_incl']     ;
        $record_data['geoip_cities_excl']     = $site_profile['geoip_cities_excl']     ;
            //  Set the ad's "GeoIP" data from the site record
            //
            //  (Because ad-specific GeoIP isn't yet implemented.)

        // ---------------------------------------------------------------------

        if (    trim( $record_data['geoip_continents_incl'] ) === ''
                &&
                trim( $record_data['geoip_countries_incl']  ) === ''
                &&
                trim( $record_data['geoip_regions_incl']    ) === ''
                &&
                trim( $record_data['geoip_cities_incl']     ) === ''
            ) {

            $outgoing_ad_counts['non_targeted']++ ;

            $question_skip = TRUE ;
                //  Skip ads that aren't targeted at anyone...

        } else {

            $outgoing_ad_counts['targeted']++ ;

        }

        // ---------------------------------------------------------------------

        if ( $question_skip ) {
            continue ;
        }

        // ---------------------------------------------------------------------

        $outgoing_ad_counts['uploaded']++ ;

        // ---------------------------------------------------------------------

        unset( $record_data['created_server_datetime_utc']       ) ;
        unset( $record_data['last_modified_server_datetime_utc'] ) ;
        unset( $record_data['key']                               ) ;

        // ---------------------------------------------------------------------

        unset( $record_data['question_disabled'] ) ;

        // ---------------------------------------------------------------------

        $ads_outgoing[] = $record_data ;

        // ---------------------------------------------------------------------

    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $ads_outgoing , 'LOCAL $ads_outgoing' ) ;

    // =========================================================================
    // AD SLOTS
    // =========================================================================

    $ad_slots = array() ;

    // -------------------------------------------------------------------------

    foreach ( $loaded_datasets['ad_swapper_ad_slots']['records'] as $record_index => $record_data ) {

        // ---------------------------------------------------------------------

        if (    array_key_exists( 'question_disabled' , $record_data )
                &&
                $record_data['question_disabled']
            ) {
            continue ;
                //  Skip disabled ad slots...
        }

        // ---------------------------------------------------------------------

        unset( $record_data['created_server_datetime_utc']       ) ;
        unset( $record_data['last_modified_server_datetime_utc'] ) ;
        unset( $record_data['key']                               ) ;

        // ---------------------------------------------------------------------

        unset( $record_data['question_disabled'] ) ;

        // ---------------------------------------------------------------------

        $ad_slots[] = $record_data ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // COLLECTIONS
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $loaded_datasets['ad_swapper_web_site_collections'] = Array(
    //
    //          [title]                 => Web Site Collections
    //
    //          [records]               => Array(
    //              [0] => Array(
    //                  [created_server_datetime_utc]       => 1425197599
    //                  [last_modified_server_datetime_utc] => 1425197599
    //                  [key]                               => 20a9a031-0d81-49ea-8774-57c66a029156-1425197599-330451-1682
    //                  [local_unique_key]                  => d4ky-9zyg-gp2w-hdyy
    //                  [global_unique_key]                 => 2222-2222-2222-2222-d4ky-9zyg-gp2w-hdyy
    //                  [name_slash_title]                  => Dog Lovers
    //                  [description]                       => Targeted at users who are dog lovers...
    //                  [collection_home_page_url]          => http://www.ferntechnology.com/
    //                  [question_moderated]                => 1
    //                  [question_disabled]                 =>
    //                  )
    //              ...
    //              )
    //
    //          [key_field_slug]        => key
    //
    //          [record_indices_by_key] => Array(
    //              [20a9a031-0d81-49ea-8774-57c66a029156-1425197599-330451-1682] => 0
    //              ...
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

    $collections = array() ;

    // -------------------------------------------------------------------------

    foreach ( $loaded_datasets['ad_swapper_web_site_collections']['records'] as $record_index => $record_data ) {

        // ---------------------------------------------------------------------
        // NOTE!
        // =====
        // We send the (this site's) collections to Ad Swapper Central, whether
        // they're disabled or not.
        // ---------------------------------------------------------------------

//      if (    array_key_exists( 'question_disabled' , $record_data )
//              &&
//              $record_data['question_disabled']
//          ) {
//          continue ;
//              //  Skip disabled ad slots...
//      }

        // ---------------------------------------------------------------------

        unset( $record_data['created_server_datetime_utc']       ) ;
        unset( $record_data['last_modified_server_datetime_utc'] ) ;
        unset( $record_data['key']                               ) ;

        // ---------------------------------------------------------------------

//      unset( $record_data['question_disabled'] ) ;

        // ---------------------------------------------------------------------

        $collections[] = $record_data ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SELECTED COLLECTIONS (= COLLECTION MEMBERS)
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $loaded_datasets['ad_swapper_available_selected_and_approved_web_site_collections'] = Array(
    //
    //          [title]                 => Available and Selected Web Site Collections
    //
    //          [records]               => Array(
    //              [0] => Array(
    //                  [created_server_datetime_utc]       => 1425360931
    //                  [last_modified_server_datetime_utc] => 1425360931
    //                  [key]                               => edb2388d-9bef-4e61-af2e-c8dfff6c9324-1425360931-11671-1684
    //                  [site_unique_key]                   => 2222-2222-2222-2222
    //                  [local_unique_key]                  => d4ky-9zyg-gp2w-hdyy
    //                  [global_unique_key]                 => 2222-2222-2222-2222-d4ky-9zyg-gp2w-hdyy
    //                  [name_slash_title]                  => Dog Lovers
    //                  [description]                       => Targeted at users who are dog lovers...
    //                  [collection_home_page_url]          => http://www.ferntechnology.com/
    //                  [question_moderated]                => 1
    //                  [question_selected]                 => 1
    //                  )
    //              ...
    //              )
    //
    //          [key_field_slug]        => key
    //
    //          [record_indices_by_key] => Array(
    //              [edb2388d-9bef-4e61-af2e-c8dfff6c9324-1425360931-11671-1684] => 0
    //              ...
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $loaded_datasets['ad_swapper_available_selected_and_approved_web_site_collections']['records']          ,
//    '$loaded_datasets[\'ad_swapper_available_selected_and_approved_web_site_collections\'][\'records\']'
//    ) ;

    $selected_collections = array() ;

    // -------------------------------------------------------------------------

    foreach ( $loaded_datasets['ad_swapper_available_selected_and_approved_web_site_collections']['records'] as
                    $record_index => $record_data
        ) {

        // ---------------------------------------------------------------------
        // NOTE!
        // =====
        // We send only the selected collection (= the collections that this
        // site wants to join), to Ad Swapper Central.
        //
        // And only the "global_unique_keys" of the collections and sites
        // concerned (because the other collection and site data is already
        // at Ad Swapper Central).
        // ---------------------------------------------------------------------

//      if (    array_key_exists( 'question_disabled' , $record_data )
//              &&
//              $record_data['question_disabled']
//          ) {
//          continue ;
//              //  Skip disabled ad slots...
//      }

        // ---------------------------------------------------------------------

        if ( $record_data['question_selected'] ) {
            $selected_collections[] = $record_data['global_unique_key'] ;
        }

        // ---------------------------------------------------------------------

//      unset( $record_data['question_disabled'] ) ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $selected_collections = array(
        'member_site_unique_key'                    =>  $plugin_registration_record_site_unique_key     ,
        'selected_collections_global_unique_keys'   =>  $selected_collections
        ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $selected_collections       ,
//    '$selected_collections'
//    ) ;

    // =========================================================================
    // MODERATED COLLECTION MEMBERS
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $loaded_datasets[ 'ad_swapper_this_sites_web_site_collection_members' ]['records'] = Array(
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]          => 1425605929
    //                      [last_modified_server_datetime_utc]    => 1425605929
    //                      [key]                                  => 9a64466c-033f-49b4-a076-f299a1e35712-1425605929-546957-1690
    //                      [collection_global_unique_key]         => 2222-2222-2222-2222-d4ky-9zyg-gp2w-hdyy
    //                      [member_site_unique_key]               => 2222-2222-2222-2222
    //                      [question_member_enabled_by_moderator] => 1
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_this_sites_web_site_collection_members' ;

    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $loaded_datasets[ $dataset_slug ]['records']            ,
//    '$loaded_datasets[ $dataset_slug ][\'records\']'
//    ) ;

    // -------------------------------------------------------------------------

    $moderated_member_sites_by_collection = array() ;

    // -------------------------------------------------------------------------

    foreach ( $loaded_datasets[ $dataset_slug ]['records'] as $record_index => $record_data ) {

        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                    $record_data['collection_global_unique_key']    ,
                    $moderated_member_sites_by_collection
                    )
            ) {

            $moderated_member_sites_by_collection[
                $record_data['collection_global_unique_key']
                ] = array() ;

        }

        // ---------------------------------------------------------------------

        if (    array_key_exists(
                    $record_data['member_site_unique_key']              ,
                    $moderated_member_sites_by_collection[
                        $record_data['collection_global_unique_key']
                        ]
                    )
            ) {

//          \greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $record_data ) ;

            $msg = <<<EOT
PROBLEM:&nbsp; Duplicate "This Site's Web Site Collection Members" record index {$record_index}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        $moderated_member_sites_by_collection[
            $record_data['collection_global_unique_key']
            ][ $record_data['member_site_unique_key'] ] =
                $record_data['question_member_enabled_by_moderator']
                ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $moderated_member_sites_by_collection = array(
        'collection_owner_site_unique_key'      =>  $plugin_registration_record_site_unique_key     ,
        'moderated_member_sites_by_collection'  =>  $moderated_member_sites_by_collection
         ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $moderated_member_sites_by_collection = Array(
    //
    //          [collection_owner_site_unique_key]      => 2222-2222-2222-2222
    //
    //          [moderated_member_sites_by_collection]  => Array(
    //
    //              [2222-2222-2222-2222-d4ky-9zyg-gp2w-hdyy] => Array(
    //                  [2222-2222-2222-2222] => 1
    //                  ...
    //                  )
    //
    //              [2222-2222-2222-2222-zn2w-vc3g-pvxd-vpzv] => Array(
    //                  [2222-2222-2222-2222] => 1
    //                  ...
    //                  )
    //
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $moderated_member_sites_by_collection     ,
//    '$moderated_member_sites_by_collection'
//    ) ;

    // =========================================================================
    // OTHER SITE SPECFIC SETTINGS
    // --to--
    // TARGETED AND APPROVED SITES
    //
    //      In other words, we're going to copy:-
    //
    //      o   All the:-
    //              "question_display_this_sites_ads_on_your_site"
    //
    //          field site sids - from the "other site specific settings" LOCAL
    //          dataset - as a string of "@" separated site sids - to the
    //          "approved_ad_swapper_site_sids" field - in the CENTRAL site's
    //          "targeted_and_approved_sites" table.  And;
    //
    //      o   All the:-
    //              "question_display_your_ads_on_this_site"
    //
    //          field site sids - from the "other site specific settings" LOCAL
    //          dataset - as a string of "@" separated site sids - to the
    //          "targeted_ad_swapper_site_sids" field - in the CENTRAL site's
    //          "targeted_and_approved_sites" table.
    //
    // =========================================================================

    $ad_swapper_site_sids_of_targeted_sites = '' ;
    $ad_swapper_site_sids_of_approved_sites = '' ;

    $comma_targeted = '' ;
    $comma_approved = '' ;

    // -------------------------------------------------------------------------

    foreach ( $loaded_datasets['ad_swapper_other_site_specific_settings']['records'] as $record_index => $record_data ) {

        // ---------------------------------------------------------------------

        if ( $record_data['question_display_this_sites_ads_on_your_site'] ) {

            $ad_swapper_site_sids_of_approved_sites .=
                $comma_approved . $record_data['ad_swapper_site_sid']
                ;

            $comma_approved = '@' ;

        }

        // ---------------------------------------------------------------------

        if ( $record_data['question_display_your_ads_on_this_site'] ) {

            $ad_swapper_site_sids_of_targeted_sites .=
                $comma_targeted . $record_data['ad_swapper_site_sid']
                ;

            $comma_targeted = '@' ;

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Create the complete API Data to send...
    // =========================================================================

    $api_data = array(
                    'site_profile'                          =>  $site_profile                               ,
                    'ads_outgoing'                          =>  $ads_outgoing                               ,
                    'ad_slots'                              =>  $ad_slots                                   ,
                    'web_site_collections'                  =>  $collections                                ,
                    'selected_web_site_collections'         =>  $selected_collections                       ,
                    'moderated_member_sites_by_collection'  =>  $moderated_member_sites_by_collection       ,
                    'targeted_sites'                        =>  $ad_swapper_site_sids_of_targeted_sites     ,
                    'approved_sites'                        =>  $ad_swapper_site_sids_of_approved_sites
                    ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $api_data ) ;

    // =========================================================================
    // Make the API Call to Ad Swapper Central...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_apiCallSupport\
    // make_api_call_to_ad_swapper_central(
    //      $core_plugapp_dirs                              ,
    //      $question_front_end                             ,
    //      $app_defs_directory_tree                        ,
    //      $applications_dataset_and_view_definitions_etc  ,
    //      $all_application_dataset_definitions            ,
    //      $loaded_datasets                                ,
    //      $api_name                                       ,
    //      $api_data
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // $api_data should be an array like (eg):-
    //
    //      $api_data = array(
    //          'this'              =>  <any PHP data type>
    //          'that'              =>  <any PHP data type>
    //          ...
    //          'the_other_thing'   =>  <any PHP data type>
    //          )
    //
    // RETURNS
    //      On SUCCESS
    //          o   TRUE
    //                  If there was NO passback data (or in other words,
    //                  the Central site replied "--OK--").
    //          o   ARRAY $api_passback_data
    //                  If the Central site replied "--OK-WITH-DATA--"
    //                  (though the array may be empty)
    //
    //      On FAILURE
    //          $error_message STRING
    //              This string might be either:-
    //              o   A error message or other (eg; debugging) string,
    //                  passed back from the Central site, or;
    //              o   An error message string generated by this routine
    //                  (or one of it's sub-routines).
    // -------------------------------------------------------------------------

    $api_name = 'update-central-site' ;

    // -------------------------------------------------------------------------

    ob_start() ;

    // -------------------------------------------------------------------------

    $api_passback_data =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_apiCallSupport\make_api_call_to_ad_swapper_central(
            $core_plugapp_dirs                              ,
            $question_front_end                             ,
            $app_defs_directory_tree                        ,
            $applications_dataset_and_view_definitions_etc  ,
            $all_application_dataset_definitions            ,
            $loaded_datasets                                ,
            $api_name                                       ,
            $api_data
            ) ;

    // -------------------------------------------------------------------------

    if ( $question_synchronising ) {
        $sync_output .= ob_get_clean() ;

    } else {
        echo ob_get_clean() ;

    }

    // -------------------------------------------------------------------------

    if ( is_string( $api_passback_data ) ) {
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\debug_print_backtrace() ;
        return array( $api_passback_data ) ;
    }

    // =========================================================================
    // Process the API Passback Data (if there is any)...
    // =========================================================================

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $api_passback_data ) ;

//echo '<br />' , gettype( $api_passback_data ) ;

    if ( is_array( $api_passback_data ) ) {

        // -------------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $api_passback_data = Array(
        //
        //          [new_outgoing_ad_global_sids_by_local_key] => Array(
        //              [542e82a17ed5ab8803342ef00a637fccbe6abd29caec550d16252856c60fa88b] => n3gk-hvmw
        //              [49c895082a4bc5afad7a262dd1838dcabbfe0b4db4b16359e90cc52873163e10] => 7nmk-hdwv
        //              )
        //
        //          [new_ad_slot_global_sids_by_local_key] => Array(
        //              [ab64110189652140b20e35478924a670d56bacf36594d823f88e044a0985e416] => 2dzk-hmvg
        //              )
        //
        //          )
        //
        // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $api_passback_data ) ;

        // =====================================================================
        // OUTGOING ADS
        // =====================================================================

        if (    array_key_exists( 'new_outgoing_ad_global_sids_by_local_key' , $api_passback_data )
                &&
                is_array( $api_passback_data['new_outgoing_ad_global_sids_by_local_key'] )
                &&
                count( $api_passback_data['new_outgoing_ad_global_sids_by_local_key'] ) > 0
            ) {

            // -----------------------------------------------------------------
            // There are some "new_outgoing_ad_global_sids_by_local_key"...
            //
            // Are the "global_sids" in this array valid ?
            // -----------------------------------------------------------------

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\
            // question_sequential_id(
            //      $candidate_sid
            //      )
            // - - - - - - - - - - - -
            // Determines whether or not $candidate_sid looks like a sequential ID
            // as generated by (eg):-
            //      get_new_sequential_id()
            //      get_new_sequential_id_thats_unique_in_dataset()
            //
            // or not.  And returns TRUE or FALSE accordingly.
            //
            // In other words, $candidate_sid must be something like (eg):-
            //      "dczv-mwhk"
            //      "9npd-xd2h"
            //      "pxx4-4942-9vwm"
            //      "2n43-3dny-dykm"
            //      etc...
            // -------------------------------------------------------------------------

            foreach ( $api_passback_data['new_outgoing_ad_global_sids_by_local_key'] as $this_key => $this_sid ) {

                // -------------------------------------------------------------

//                  if (    trim( (string) $this_id ) === ''
//                          ||
//                          ! ctype_digit( (string) $this_id )
//                      ) {
//
//                      $msg = <<<EOT
//  PROBLEM:&nbsp; Bad "new_outgoing_ad_global_ids_by_local_key" (contains at least one invalid "global_id")
//  Detected in:&nbsp; \\{$ns}\\{$fn}()
//  EOT;
//
//                      return array( $msg ) ;
//
//                  }

                // -------------------------------------------------------------

                if (    trim( $this_sid ) === ''
                        ||
                        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\question_sequential_id(
                            $this_sid
                            ) !== TRUE
                    ) {

                    $msg = <<<EOT
PROBLEM:&nbsp; Bad "new_outgoing_ad_global_sids_by_local_key" (contains at least one invalid "global_sid")
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                    return array( $msg ) ;

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------
            // Make the updates...
            // -----------------------------------------------------------------

            $dataset_slug = 'ad_swapper_ads_outgoing' ;

            // -----------------------------------------------------------------

            $dataset_records =
                $loaded_datasets[ $dataset_slug ]['records']
                ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $dataset_records ) ;

            // -----------------------------------------------------------------

            foreach ( $dataset_records as $this_index => $this_record ) {

                // -------------------------------------------------------------

                if (    array_key_exists( 'local_key' , $this_record )
                        &&
                        array_key_exists( $this_record['local_key'] , $api_passback_data['new_outgoing_ad_global_sids_by_local_key'] )
                    ) {

                    $dataset_records[ $this_index ]['global_sid'] =
                        $api_passback_data['new_outgoing_ad_global_sids_by_local_key'][ $this_record['local_key'] ]
                        ;

                }

                // -------------------------------------------------------------

            }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $dataset_records ) ;

            // -----------------------------------------------------------------
            // Save the updated "Ads Outgoing" dataset records...
            // -----------------------------------------------------------------

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\
            // save_numerically_indexed(
            //      $dataset_name                       ,
            //      $array_to_save                      ,
            //      $question_die_on_error = FALSE      ,
            //      $array_storage_data = NULL
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - - - -
            // Saves the specified numerically-indexed PHP array.
            //
            // RETURNS
            //      o   On SUCCESS
            //          - - - - -
            //          TRUE
            //
            //      o   On FAILURE
            //          - - - - -
            //          $error message STRING
            // -------------------------------------------------------------------------

            $question_die_on_error = FALSE ;

            $array_storage_data = NULL ;

            // -----------------------------------------------------------------

            $result =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\save_numerically_indexed(
                    $dataset_slug               ,
                    $dataset_records            ,
                    $question_die_on_error      ,
                    $array_storage_data
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return array( $result ) ;
            }

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // AD SLOTS
        // =====================================================================

        if (    array_key_exists( 'new_ad_slot_global_sids_by_local_key' , $api_passback_data )
                &&
                is_array( $api_passback_data['new_ad_slot_global_sids_by_local_key'] )
                &&
                count( $api_passback_data['new_ad_slot_global_sids_by_local_key'] ) > 0
            ) {

            // -----------------------------------------------------------------
            // There are some "new_ad_slot_global_sids_by_local_key"...
            //
            // Are the "global_sids" in this array all valid ?
            // -----------------------------------------------------------------

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\
            // question_sequential_id(
            //      $candidate_sid
            //      )
            // - - - - - - - - - - - -
            // Determines whether or not $candidate_sid looks like a sequential ID
            // as generated by (eg):-
            //      get_new_sequential_id()
            //      get_new_sequential_id_thats_unique_in_dataset()
            //
            // or not.  And returns TRUE or FALSE accordingly.
            //
            // In other words, $candidate_sid must be something like (eg):-
            //      "dczv-mwhk"
            //      "9npd-xd2h"
            //      "pxx4-4942-9vwm"
            //      "2n43-3dny-dykm"
            //      etc...
            // -------------------------------------------------------------------------

            foreach ( $api_passback_data['new_ad_slot_global_sids_by_local_key'] as $this_key => $this_sid ) {

                // -------------------------------------------------------------

//                  if (    trim( (string) $this_id ) === ''
//                          ||
//                          ! ctype_digit( (string) $this_id )
//                      ) {
//
//                      $msg = <<<EOT
//  PROBLEM:&nbsp; Bad "new_ad_slot_global_sids_by_local_key" (contains at least one invalid "global_id")
//  Detected in:&nbsp; \\{$ns}\\{$fn}()
//  EOT;
//
//                      return array( $msg ) ;
//
//                  }

                // -------------------------------------------------------------

                if (    trim( (string) $this_sid ) === ''
                        ||
                        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\question_sequential_id(
                            $this_sid
                            ) !== TRUE
                    ) {

                    $msg = <<<EOT
PROBLEM:&nbsp; Bad "new_ad_slot_global_sids_by_local_key" (contains at least one invalid "global_sid")
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                    return array( $msg ) ;

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------
            // Make the updates...
            // -----------------------------------------------------------------

            $dataset_slug = 'ad_swapper_ad_slots' ;

            // -----------------------------------------------------------------

            $dataset_records =
                $loaded_datasets[ $dataset_slug ]['records']
                ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $dataset_records ) ;

            // -----------------------------------------------------------------

            foreach ( $dataset_records as $this_index => $this_record ) {

                // -------------------------------------------------------------

                if (    array_key_exists( 'local_key' , $this_record )
                        &&
                        array_key_exists( $this_record['local_key'] , $api_passback_data['new_ad_slot_global_sids_by_local_key'] )
                    ) {

                    $dataset_records[ $this_index ]['global_sid'] =
                        $api_passback_data['new_ad_slot_global_sids_by_local_key'][ $this_record['local_key'] ]
                        ;

                }

                // -------------------------------------------------------------

            }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $dataset_records ) ;

            // -----------------------------------------------------------------
            // Save the updated "Ad Slots" dataset records...
            // -----------------------------------------------------------------

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\
            // save_numerically_indexed(
            //      $dataset_name                       ,
            //      $array_to_save                      ,
            //      $question_die_on_error = FALSE      ,
            //      $array_storage_data = NULL
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - - - -
            // Saves the specified numerically-indexed PHP array.
            //
            // RETURNS
            //      o   On SUCCESS
            //          - - - - -
            //          TRUE
            //
            //      o   On FAILURE
            //          - - - - -
            //          $error message STRING
            // -------------------------------------------------------------------------

            $question_die_on_error = FALSE ;

            $array_storage_data = NULL ;

            // -----------------------------------------------------------------

            $result =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\save_numerically_indexed(
                    $dataset_slug               ,
                    $dataset_records            ,
                    $question_die_on_error      ,
                    $array_storage_data
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return array( $result ) ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Display the results page...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_home_page_url(
    //      $caller_apps_includes_dir   ,
    //      $question_front_end
    //      )
    // - - - - - - - - - - - - - - - - -
    // RETURNS
    //      o   On SUCCESS!
    //              $home_page_url STRING
    //
    //      o   On FAILURE!
    //              ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    $ok_url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_home_page_url(
            $core_plugapp_dirs['plugins_includes_dir']  ,
            $question_front_end
            ) ;

    // -------------------------------------------------------------------------

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/string-utils.php' ) ;

    // -------------------------------------------------------------------------

    if (    $api_passback_data === TRUE
            ||
            is_array( $api_passback_data )
        ) {

        // ---------------------------------------------------------------------
        // Synchronising ?
        //
        //      If so, skip directly to Update Local Site...
        // ---------------------------------------------------------------------

        if ( $question_synchronising ) {

            // -----------------------------------------------------------------
            // Get "Update Local Site" URL...
            // -----------------------------------------------------------------

            require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/url-utils.php' ) ;

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\
            // get_query_adjusted_current_page_url(
            //      $query_changes = array()        ,
            //      $question_amp = FALSE           ,
            //      $question_die_on_error = FALSE
            //      ) ;
            // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
            // Attempts to retrieve the current page URL from $_SERVER.
            //
            // If successful, returns the URL with the query part adjusted as
            // requested.
            //
            // ---
            //
            // $query_changes is like:-
            //
            //      $query_changes = array(
            //                          'name1'     =>  NULL
            //                          'name2'     =>  'xxx'
            //                          )
            //
            // Where the values supplied should NOT be URL encoded.
            // ("get_query_adjusted_current_page_url()" will urlencode() them 4 you.)
            //
            // If the value is NULL, then the query parameter is removed (if it
            // exists).  Otherwise, the query parameter is set (silently overwriting
            // any existing value).
            //
            // RETURNS
            //      o   On SUCCESS!
            //          -----------
            //          $query_adjusted_current_page_url STRING
            //
            //      o   On FAILURE!
            //          -----------
            //          If $question_die_on_error = TRUE
            //              Doesn't return
            //          If $question_die_on_error = FALSE
            //              array( $error_message STRING )
            // -------------------------------------------------------------------------

            $query_changes = array(
                'custom_page'   =>  'update-local-site'     ,
                'sync_step'     =>  '2'
                ) ;

            // -----------------------------------------------------------------

            $next_sync_step_url =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\get_query_adjusted_current_page_url(
                    $query_changes
                    ) ;

            // -----------------------------------------------------------------

            if ( is_array( $next_sync_step_url ) ) {
                return $next_sync_step_url ;
            }

            // -----------------------------------------------------------------
            // Save the "Update Central Site" sync output...
            // -----------------------------------------------------------------

            $ok =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_green_message(
                    '<p>Ad Swapper Central Site UPDATED OK!</p>'
                    ) ;

            // -----------------------------------------------------------------

            $now = time() ;
                        //  Use this to force $sync_output to change - so that
                        //  "update_option()" doesn't return FALSE, due to
                        //  value not changed.

            // -----------------------------------------------------------------

            $sync_output_to_save = <<<EOT
<h1>Synchronising (with Ad Swapper Central) - please wait...</h1>
<div style="width:90%; margin-left:1.5em; margin-top:25px; border:2px solid #CCCCCC; border-left:15px solid #CCCCCC; padding:0 1em 1.2em 1.5em; background-color:#FFFFFF">
    {$page_header}
    {$sync_output}
    <div style="margin-top:2em; width:98%">{$ok}</div>
    <div style="display:none">{$now}</div>
</div>
EOT;

            // -----------------------------------------------------------------

            require_once( dirname( dirname( __FILE__ ) ) . '/synchronisation-support.php' ) ;

            // -----------------------------------------------------------------

            $option_name =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_synchronisationSupport\get_sync_output_option_name()
                ;

            // -------------------------------------------------------------------------
            // update_option( $option , $new_value , $autoload )
            // - - - - - - - - - - - - - - - - - - - - - - - - -
            // Use the function update_option() to update a named option/value pair to
            // the options database table. The $option (option name) value is escaped
            // with $wpdb->prepare before the INSERT statement but not the option value,
            // this value should always be properly sanitized.
            //
            // This function may be used in place of add_option, although it is not as
            // flexible. update_option will check to see if the option already exists.
            // If it does not, it will be added with add_option('option_name',
            // 'option_value'). Unless you need to specify the optional arguments of
            // add_option(), update_option() is a useful catch-all for both adding and
            // updating options.
            //
            //      $option
            //          (string) (required) Name of the option to update. Must not
            //          exceed 64 characters. A list of valid default options to update
            //          can be found at the Option Reference.
            //          Default: None
            //
            //      $new_value
            //          (mixed) (required) The NEW value for this option name. This
            //          value can be an integer, string, array, or object.
            //          Default: None
            //
            //      $autoload
            //          (mixed) (optional) Whether to load the option when WordPress
            //          starts up. For existing options `$autoload` can only be updated
            //          using `update_option()` if `$value` is also changed. Accepts
            //          'yes' or true to enable, 'no' or false to disable. For
            //          non-existent options, the default value is 'yes'.
            //          Default: null
            //
            // RETURN VALUE
            //      (boolean) True if option value has changed, false if not or if
            //      update failed.
            // -------------------------------------------------------------------------

            $result = update_option(
                            $option_name            ,
                            $sync_output_to_save
                            ) ;

            // -----------------------------------------------------------------

            if ( $result !== TRUE ) {

                $ln = __LINE__ - 2 ;

                $msg = <<<EOT
PROBLEM:&nbsp; "update_option()" failure saving sync output
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

                return array( $msg ) ;

            }

            // -----------------------------------------------------------------
            // Go direct to "Update Local Site"...
            // -----------------------------------------------------------------

            return <<<EOT
{$page_header}
{$sync_output}
<div style="margin-top:2em; width:98%">{$ok}</div>
<script type="text/javascript">
    location.href = "{$next_sync_step_url}" ;
</script>
EOT;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // SUCCESS
        // ---------------------------------------------------------------------

        $page_body = <<<EOT
    <p>Ad Swapper Central Site UPDATED OK!</p>
<p><a href="{$ok_url}" style="text-decoration:none; font-size:133%; font-weight:bold">OK</a></p>
EOT;

        // ---------------------------------------------------------------------

        $page_body =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_green_message(
                $page_body
            ) ;

        // ---------------------------------------------------------------------
        // GeoIP WARNING ???
        // ---------------------------------------------------------------------

//      $outgoing_ad_counts = array(
//          'total'         =>  0       ,
//          'disabled'      =>  0       ,
//          'non_disabled'  =>  0       ,
//          'targeted'      =>  0       ,
//          'non_targeted'  =>  0       ,
//          'uploaded'      =>  0
//          ) ;

        // ---------------------------------------------------------------------

        if (    $outgoing_ad_counts['total'] > 0
                &&
                $outgoing_ad_counts['uploaded'] === 0
                &&
                trim( $site_profile['geoip_countries_incl'] ) === ''
                &&
                trim( $site_profile['geoip_continents_incl'] ) === ''
            ) {

            // -----------------------------------------------------------------

            $warning = <<<EOT
<p><u style="font-size:110%; font-weight:bold">WARNING - NO ADS!</u></p>

<p style="margin-bottom:0">Although the Ad Swapper central site was successfully
updated:-</p>

<ul style="margin:0 0 0 2em; list-style-type:disc">

    <li style="margin:0.33em 0">NO ADS WERE UPLOADED (for distribution to other
        Ad Swapper sites), and;</li>

    <li style="margin:0.33em 0">Any previously uploaded ads were DELETED.</li>

</ul>

<p>Thus, <b style="background-color:#000000; color:#FFFFFF">&nbsp;Ad Swapper
Central is currently distributing NO ADS for this site&nbsp;</b> (although other
Ad Swapper sites ***may*** still be showing your ads that they've previously
downloaded - and will continue to do until they <b>Update Local Site</b>
again).</p>

<p>To get your ads displaying again; please <b style="background-color:#000000;
color:#FFFFFF">&nbsp;select at least one country or continent&nbsp;</b> (to
target your ads at), from the <b>Maintain This Site's Profile</b> option (on the
Ad Swapper plugin Main Menu).</p>
EOT;

            // -----------------------------------------------------------------

            $warning =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_orange_message(
                    $warning
                ) ;

            // -----------------------------------------------------------------

            $page_body = $warning . '<br /><br />' . $page_body ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------
        // FAILURE
        // ---------------------------------------------------------------------

        $page_body = trim( $api_passback_data ) ;

        // ---------------------------------------------------------------------

        if ( $page_body === '' ) {
            $page_body = '&lt;no response&gt;' ;
        }

        // ---------------------------------------------------------------------

        $page_body = <<<EOT
<p style="font-size:133%; font-weight:bold">PROBLEM UPDATING CENTRAL SITE!</p>
<p>{$page_body}</p>
<p><a href="{$ok_url}" style="text-decoration:none; font-size:133%; font-weight:bold">OK</a></p>
EOT;

        // ---------------------------------------------------------------------

        $page_body =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_error_message(
                $page_body
            ) ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    return <<<EOT
{$page_header}

<div style="margin-top:2em; width:98%">{$page_body}</div>

<br />
<br />
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

