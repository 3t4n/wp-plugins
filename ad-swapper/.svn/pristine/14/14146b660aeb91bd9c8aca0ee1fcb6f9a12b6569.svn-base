<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / INCLUDES / AD-SWAPPER-CORE-STUFF.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_adSwapperCoreStuff ;

// =============================================================================
// get_plugin_settings_record()
// =============================================================================

function get_plugin_settings_record(
    $core_plugapp_dirs
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adSwapperCoreStuff\
    // get_plugin_settings_record(
    //      $core_plugapp_dirs
    //      )
    // - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $plugin_settings_record ARRAY
    //
    //          Eg:-
    //
    //              $plugin_settings_record = Array(
    //                  [created_server_datetime_utc]       => 1421887967
    //                  [last_modified_server_datetime_utc] => 1421887967
    //                  [key]                               => 7dd6c89c-6ac1-4b07-9851-be51d6219420-1421887967-696176-1480
    //                  [ad_swapper_user_sid]               => 2gkw-vmcz
    //                  [ad_swapper_site_sid]               => 2kmv-hzgc
    //                  [site_unique_key]                   => 2222-2222-2222-2222
    //                  [site_registration_key]             => 675ed35f6c108...97a78fe029d
    //                  [api_public_encryption_key]         =>
    //                  [api_mcryption_key]                 => bc502c56b...b9749691a
    //                  [api_url_override]                  => http://.../api-call-handler.php
    //                  )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/array-storage.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\
    // load_numerically_indexed(
    //      $dataset_name                       ,
    //      $question_die_on_error = FALSE      ,
    //      $array_storage_data = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Loads and returns the specified PHP numerically indexed array.
    //
    // $array_storage_data can be either:-
    //
    //      o   NULL (in which case:-
    //              $GLOBALS['GREAT_KIWI']['ARRAY_STORAGE']
    //          is used), or;
    //
    //      o   array(
    //              'default_storage_method'    =>  "json" | "basepress-dataset"
    //              'json_data_files_dir'       =>  NULL | "xxx"
    //              'supported_datasets'        =>  $supported_datasets
    //              )
    //          Where $supported_datasets is:-
    //              array(
    //                  '<some_dataset_slug>'   =>  array(
    //                      'storage_method'            =>  NULL | "json" | "basepress-dataset"     ,
    //                      'json_filespec'             =>  NULL | "xxx"                            ,
    //                      'basepress_dataset_handle'  =>  $some_basepress_dataset_handle
    //                      )
    //                  ...
    //                  )
    //          Where $some_basepress_dataset_handle is (eg):-
    //              array(
    //                  'nice_name'     =>  'adSwapper_byFerntec_someDatasetName'   ,
    //                  'unique_key'    =>  $some_basepress_dataset_uid             ,
    //                  'version'       =>  '0.1'
    //                  )
    //          Where $some_basepress_dataset_uid is (eg):-
    //              '2f35c079-ef2e-4dea-a0e2-f1f861375aef' . '-' .
    //              'afe2576d-76b2-4a5c-83a3-60b652467438' . '-' .
    //              '995a2d40-63d3-11e3-949a-0800200c9a66' . '-' .
    //              'a6acf950-63d3-11e3-949a-0800200c9a66'
    //              ;
    //
    // RETURNS
    //      o   On SUCCESS
    //          - - - - -
    //          ARRAY $array
    //          A possibly empty PHP numerically indexed ARRAY.
    //
    //      o   On FAILURE
    //          - - - - -
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_plugin_settings' ;

    // -------------------------------------------------------------------------

    $dataset_records =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\load_numerically_indexed(
            $dataset_slug
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $dataset_records ) ) {
        return $dataset_records ;
    }

    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    if ( count( $dataset_records ) < 1 ) {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM:&nbsp; No "Plugin Settings" record.
Please run "Maintain Plugin Settings", and complete the plugin/site setup, as described there.
Detected in: &nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    if ( count( $dataset_records ) > 1 ) {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM:&nbsp; Too many "Plugin Settings" records.
We'll use the first one found.&nbsp; But your Ad Swapper plugin database is CORRUPT.
Please <a href="http://www.adswapper.com/help-support/" style="text-decoration:none">file a support ticket or contact us</a>.
Detected in: &nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $dataset_records[0] = Array(
    //          [created_server_datetime_utc]       => 1421887967
    //          [last_modified_server_datetime_utc] => 1421887967
    //          [key]                               => 7dd6c89c-6ac1-4b07-9851-be51d6219420-1421887967-696176-1480
    //          [ad_swapper_user_sid]               => 2gkw-vmcz
    //          [ad_swapper_site_sid]               => 2kmv-hzgc
    //          [site_unique_key]                   => 2222-2222-2222-2222
    //          [site_registration_key]             => 675ed35f6c108...97a78fe029d
    //          [api_public_encryption_key]         =>
    //          [api_mcryption_key]                 => bc502c56b...b9749691a
    //          [api_url_override]                  => http://.../api-call-handler.php
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $dataset_records[0]     ,
//    '$dataset_records[0]'
//    ) ;

    // -------------------------------------------------------------------------

    return $dataset_records[0] ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_site_profile_record()
// =============================================================================

function get_site_profile_record(
    $core_plugapp_dirs
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adSwapperCoreStuff\
    // get_site_profile_record(
    //      $core_plugapp_dirs
    //      )
    // - - - - - - - - - - - -
    // The returned value is cached (in memory) - for speed on the second
    // and subsequent calls.
    //
    // RETURNS
    //      On SUCCESS
    //          $site_profile_record ARRAY
    //
    //          Eg;
    //
    //              $site_profile_record = array(
    //                  [created_server_datetime_utc]       => 1418445063
    //                  [last_modified_server_datetime_utc] => 1418445063
    //                  [key]                               => add9f270-9f5b-429a-a264-f0f5c7cc59db-1418445063-977293-1355
    //                  [site_title]                        => Plugdev
    //                  [home_page_url]                     => http://localhost/plugdev
    //                  [general_description]               =>
    //                  [ads_wanted_description]            =>
    //                  [sites_wanted_description]          =>
    //                  [categories_available]              =>
    //                  [categories_wanted]                 =>
    //                  [geoip_continents_incl]             =>
    //                  [geoip_continents_excl]             =>
    //                  [geoip_countries_incl]              => NZ
    //                  [geoip_countries_excl]              =>
    //                  [geoip_regions_incl]                =>
    //                  [geoip_regions_excl]                =>
    //                  [geoip_cities_incl]                 =>
    //                  [geoip_cities_excl]                 =>
    //                  [max_ads_per_site_per_page]         => 1
    //                  [question_auto_approve_new_ads]     =>
    //                  [test_method]                       => none
    //                  [test_ip]                           => 127.0.0.1
    //                  [question_disable_incoming_ads]     =>
    //                  [question_disable_outgoing_ads]     =>
    //                  [license_key]                       => 8bb5a535f3b949223e4be34bccfe97fe
    //                  [show_ads_list_reload_buttons]      =>
    //                  [question_manual_update_approval]   => 1
    //                  [max_repetitions_per_ad_per_page]   => 1
    //                  )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/array-storage.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\
    // load_numerically_indexed(
    //      $dataset_name                       ,
    //      $question_die_on_error = FALSE      ,
    //      $array_storage_data = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Loads and returns the specified PHP numerically indexed array.
    //
    // $array_storage_data can be either:-
    //
    //      o   NULL (in which case:-
    //              $GLOBALS['GREAT_KIWI']['ARRAY_STORAGE']
    //          is used), or;
    //
    //      o   array(
    //              'default_storage_method'    =>  "json" | "basepress-dataset"
    //              'json_data_files_dir'       =>  NULL | "xxx"
    //              'supported_datasets'        =>  $supported_datasets
    //              )
    //          Where $supported_datasets is:-
    //              array(
    //                  '<some_dataset_slug>'   =>  array(
    //                      'storage_method'            =>  NULL | "json" | "basepress-dataset"     ,
    //                      'json_filespec'             =>  NULL | "xxx"                            ,
    //                      'basepress_dataset_handle'  =>  $some_basepress_dataset_handle
    //                      )
    //                  ...
    //                  )
    //          Where $some_basepress_dataset_handle is (eg):-
    //              array(
    //                  'nice_name'     =>  'adSwapper_byFerntec_someDatasetName'   ,
    //                  'unique_key'    =>  $some_basepress_dataset_uid             ,
    //                  'version'       =>  '0.1'
    //                  )
    //          Where $some_basepress_dataset_uid is (eg):-
    //              '2f35c079-ef2e-4dea-a0e2-f1f861375aef' . '-' .
    //              'afe2576d-76b2-4a5c-83a3-60b652467438' . '-' .
    //              '995a2d40-63d3-11e3-949a-0800200c9a66' . '-' .
    //              'a6acf950-63d3-11e3-949a-0800200c9a66'
    //              ;
    //
    // RETURNS
    //      o   On SUCCESS
    //          - - - - -
    //          ARRAY $array
    //          A possibly empty PHP numerically indexed ARRAY.
    //
    //      o   On FAILURE
    //          - - - - -
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $global_varname = 'ad_swapper_plugin_site_profile_record' ;

    // -------------------------------------------------------------------------

    if ( array_key_exists( $global_varname , $GLOBALS ) ) {
        return $GLOBALS[ $global_varname ] ;
    }

    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_site_profile' ;

    // -------------------------------------------------------------------------

    $dataset_records =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\load_numerically_indexed(
            $dataset_slug
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $dataset_records ) ) {
        return $dataset_records ;
    }

    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    if ( count( $dataset_records ) < 1 ) {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM:&nbsp; No "Site Profile" record.
Please run "Maintain This Site's Profile", and fill in and Submit the "Site Profile" form.
Detected in: &nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    if ( count( $dataset_records ) > 1 ) {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM:&nbsp; Too many "Site Profile" records.
We'll use the first one found.&nbsp; But your Ad Swapper plugin database is CORRUPT.
Please <a href="http://www.adswapper.com/help-support/" style="text-decoration:none">file a support ticket or contact us</a>.
Detected in: &nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $dataset_records[0] = Array(
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
    //          [max_ads_per_site_per_page]         => 1
    //          [question_auto_approve_new_ads]     =>
    //          [test_method]                       => none
    //          [test_ip]                           => 127.0.0.1
    //          [question_disable_incoming_ads]     =>
    //          [question_disable_outgoing_ads]     =>
    //          [license_key]                       => 8bb5a535f3b949223e4be34bccfe97fe
    //          [show_ads_list_reload_buttons]      =>
    //          [question_manual_update_approval]   => 1
    //          [max_repetitions_per_ad_per_page]   => 1
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $dataset_records[0]     ,
//    '$dataset_records[0]'
//    ) ;

    // -------------------------------------------------------------------------

    $GLOBALS[ $global_varname ] = $dataset_records[0] ;

    // -------------------------------------------------------------------------

    return $GLOBALS[ $global_varname ] ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_plugin_sites_ad_swapper_site_sid()
// =============================================================================

function get_plugin_sites_ad_swapper_site_sid(
    $core_plugapp_dirs = NULL
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adSwapperCoreStuff\
    // get_plugin_sites_ad_swapper_site_sid(
    //      $core_plugapp_dirs = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // NOTE!
    // -----
    // The value stored is cached (in memory), to make subsequent calls
    // faster.
    //
    // RETURNS
    //      On SUCCESS
    //          $plugin_sites_ad_swapper_site_sid STRING
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    $global_varname = '__plugin_sites_ad_swapper_site_sid__' ;

    // -------------------------------------------------------------------------

    if (    array_key_exists(
                $global_varname     ,
                $GLOBALS
                )
        ) {
        return $GLOBALS[ $global_varname ] ;
            //  Cache it, in case of repeated calls...
    }

    // -------------------------------------------------------------------------
    if ( $core_plugapp_dirs === NULL ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\
        // get_core_plugapp_dirs(
        //      $path_in_plugin         ,
        //      $app_handle = NULL
        //      )
        // - - - - - - - - - - - - - - -
        // Returns the dirspecs of the main dirs used in a given app.  Ie:-
        //
        //      array(
        //          'plugin_root_dir'                   =>  "xxx"   ,
        //          'plugins_includes_dir'              =>  "xxx"   ,
        //          'plugins_app_defs_dir'              =>  "xxx"   ,
        //          'dataset_manager_includes_dir'      =>  "xxx"   ,   //  (1)
        //          'apps_dot_app_dir'                  =>  "xxx"   ,   //  (2)
        //          'apps_plugin_stuff_dir'             =>  "xxx"       //  (3)
        //          'custom_pages_dir'                  =>  "xxx"       //  (4)
        //          )
        //
        //      (1) This is where most of the "Dataset Manager" includes files
        //          are stored.
        //
        //      (2) If $app_handle === NULL, the returned 'apps_dot_app_dir'
        //          is NULL too.
        //
        //      (3) If $app_handle === NULL, the returned 'apps_plugin_stuff_dir'
        //          is NULL too.
        //
        //      (4) If $app_handle === NULL, the returned 'custom_pages_dir'
        //          is NULL too.

        // ---
        //
        // $path_in_plugin should be a file, directory or link path in the
        // plugin (or "app") from which this function is called.  Typically,
        // one uses __FILE__ for this purpose.  Eg:-
        //
        //      \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_single_app_defs_root_dir( __FILE__ ) ;
        //
        // ---
        //
        // $app_handle should be either:-
        //
        //      o   A single "app slug" - eg; "research-assistant" - as a
        //          STRING.  For which the returned dirspec might be (eg):-
        //
        //              /home/joe/.../plugins/some-plugin/app-defs/research-assistant.app
        //
        // Or:-
        //
        //      o   An array of (nested) app slugs.  Eg:-
        //
        //              array(
        //                  'some-app'          ,
        //                  'child-app'         ,
        //                  'grandchild-app'
        //                  [...]
        //                  )
        //
        //          For which the returned dirspec might be (eg):-
        //
        //              /home/joe/.../plugins/some-plugin/app-defs/some-app.app/child-app.app/grandchild-app.app
        //
        // Exits with an error message if the directory can't be returned (eg;
        // doesn't exist).
        //
        // NOTE!
        // -----
        // These "apps" and "datasets" (etc) are typically defined in a directory
        // tree structure like (eg):-
        //
        //      /plugins/this-plugin/
        //      +-- app-defs/
        //      |   +-- some-app.app/
        //      |   |   +-- child-app.app/
        //      |   |       +-- grandchild-app.app
        //      |   |           +-- etc...
        //      |   +-- another-app.app/
        //      |       +-- ...
        //      +-- includes/
        //      +-- js/
        //      +-- admin/
        //      +-- remote/
        //      +-- ...etc...
        //      +-- this-plugin.php
        //      +-- ...etc...
        //
        // -------------------------------------------------------------------------

        $path_in_plugin = __FILE__ ;

        $app_handle = 'ad-swapper' ;

        // ---------------------------------------------------------------------

        $core_plugapp_dirs =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_core_plugapp_dirs(
                $path_in_plugin     ,
                $app_handle
                ) ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // get_plugin_settings_record(
    //      $core_plugapp_dirs
    //      )
    // - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $plugin_settings_record ARRAY
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $plugin_settings_record =
        get_plugin_settings_record(
            $core_plugapp_dirs
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $plugin_settings_record ) ) {
        return array( $plugin_settings_record ) ;
    }

    // -------------------------------------------------------------------------

    $GLOBALS[ $global_varname ] =
        $plugin_settings_record['ad_swapper_site_sid']
        ;

    // -------------------------------------------------------------------------

    return $GLOBALS[ $global_varname ] ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

