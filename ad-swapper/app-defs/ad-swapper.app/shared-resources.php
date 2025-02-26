<?php

// *****************************************************************************
// AD-SWAPPER.APP / SHARED-RESOURCES.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources ;
        //  NOTE!
        //  -----
        //  The dataset name/slug should be camel cased.  Eg:-
        //      projects
        //      referenceUrls
        //      globalLogMessages

// =============================================================================
// get_available_ads_record_by_ad_sid()
// =============================================================================

function get_available_ads_record_by_ad_sid(
    $all_application_dataset_definitions    ,
    $ad_sid                                 ,
    &$loaded_datasets   = NULL              ,
    &$core_plugapp_dirs = NULL
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\
    // get_available_ads_record_by_ad_sid(
    //      $all_application_dataset_definitions    ,
    //      $ad_sid                                 ,
    //      &$loaded_datasets   = NULL              ,
    //      &$core_plugapp_dirs = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $available_ads_record ARRAY
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $loaded_datasets , '$loaded_datasets' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $ad_sid , '$ad_sid' ) ;

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__     ;
    $fn = __FUNCTION__      ;
    $ln = (string) __LINE__ ;

    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_available_ads' ;

    // =========================================================================
    // Load the "Ads" records...
    // =========================================================================

    if (    ! is_array( $loaded_datasets )
            ||
            ! array_key_exists(
                    $dataset_slug       ,
                    $loaded_datasets
                    )
        ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_dataset_title_records_key_field_slug_and_record_indices_by_key(
        //      $all_application_dataset_definitions    ,
        //      $dataset_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      o   On SUCCESS
        //              ARRAY(
        //                  $dataset_title                  STRING
        //                  $dataset_records                ARRAY
        //                  $array_storage_key_field_slug   STRING
        //                  $record_indices_by_key          ARRAY
        //                  )
        //
        //      o   On FAILURE
        //              $error_message STRING
        // -------------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_dataset_title_records_key_field_slug_and_record_indices_by_key(
                $all_application_dataset_definitions    ,
                $dataset_slug
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        $loaded_datasets[ $dataset_slug ] = array(
            'title'                 =>  $result[0]      ,
            'records'               =>  $result[1]      ,
            'key_field_slug'        =>  $result[2]      ,
            'record_indices_by_key' =>  $result[3]
            ) ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $dataset_records = $loaded_datasets[ $dataset_slug ]['records'] ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $dataset_records = Array(
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]       => 1421569635
    //                      [last_modified_server_datetime_utc] => 1421569635
    //                      [key]                               => cfe6de47-5c12-4397-b9f6-61af9d6fd1d5-1421569635-787371-1425
    //                      [global_sid]                        => ncgh-vzkm
    //                      [ad_swapper_site_sid]               => 2kcv-gwhz
    //                      [image_url]                         => http://localhost/plugdev/wp-content/uploads/2014/06/rookie-mag-postcards-from-wonderland.jpeg
    //                      [link_url]                          => http://www.google.co.nz
    //                      [alt_text]                          =>
    //                      [description]                       =>
    //                      [start_datetime]                    =>
    //                      [end_datetime]                      =>
    //                      [aspect_ratio_min]                  =>
    //                      [aspect_ratio_max]                  =>
    //                      [sequence_number]                   =>
    //                      [question_display]                  => 1
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $dataset_records , '$dataset_records' ) ;

    // =========================================================================
    // Get the requested record...
    // =========================================================================

    $requested_record = NULL ;

    // -------------------------------------------------------------------------

    foreach ( $dataset_records as $this_index => $this_record ) {

        // ---------------------------------------------------------------------

        if (    array_key_exists( 'global_sid' , $this_record )
                &&
                $this_record['global_sid'] === $ad_sid
            ) {
            $requested_record = $this_record ;
            break ;
        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( ! is_array( $requested_record ) ) {

        return <<<EOT
PROBLEM:&nbsp; Available Ads record not found
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $requested_record ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_available_sites_record_by_site_sid()
// =============================================================================

function get_available_sites_record_by_site_sid(
    $all_application_dataset_definitions    ,
    $site_sid                               ,
    &$loaded_datasets   = NULL              ,
    &$core_plugapp_dirs = NULL
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\
    // get_available_sites_record_by_site_sid(
    //      $all_application_dataset_definitions    ,
    //      $site_sid                               ,
    //      &$loaded_datasets   = NULL              ,
    //      &$core_plugapp_dirs = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $available_sites_record ARRAY
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__     ;
    $fn = __FUNCTION__      ;
    $ln = (string) __LINE__ ;

    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_available_sites' ;

    // =========================================================================
    // Load the "Sites" records...
    // =========================================================================

    if (    ! is_array( $loaded_datasets )
            ||
            ! array_key_exists(
                    $dataset_slug       ,
                    $loaded_datasets
                    )
        ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_dataset_title_records_key_field_slug_and_record_indices_by_key(
        //      $all_application_dataset_definitions    ,
        //      $dataset_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      o   On SUCCESS
        //              ARRAY(
        //                  $dataset_title                  STRING
        //                  $dataset_records                ARRAY
        //                  $array_storage_key_field_slug   STRING
        //                  $record_indices_by_key          ARRAY
        //                  )
        //
        //      o   On FAILURE
        //              $error_message STRING
        // -------------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_dataset_title_records_key_field_slug_and_record_indices_by_key(
                $all_application_dataset_definitions    ,
                $dataset_slug
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        $loaded_datasets[ $dataset_slug ] = array(
            'title'                 =>  $result[0]      ,
            'records'               =>  $result[1]      ,
            'key_field_slug'        =>  $result[2]      ,
            'record_indices_by_key' =>  $result[3]
            ) ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $dataset_records = $loaded_datasets[ $dataset_slug ]['records'] ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $dataset_records = Array(
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]                  => 1421545408
    //                      [last_modified_server_datetime_utc]            => 1421545408
    //                      [key]                                          => 10906d4d-6d60-4e39-b201-9bf2b52f4347-1421545408-370125-1421
    //                      [ad_swapper_site_sid]                          => 2kcv-gwhz
    //                      [site_title]                                   => Plugdev
    //                      [home_page_url]                                => http://localhost/plugdev
    //                      [general_description]                          =>
    //                      [ads_wanted_description]                       =>
    //                      [sites_wanted_description]                     =>
    //                      [categories_available]                         =>
    //                      [categories_wanted]                            =>
    //                      [question_display_this_sites_ads_on_your_site] => 1
    //                      [question_display_your_ads_on_this_site]       =>
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $dataset_records , '$dataset_records' ) ;

    // =========================================================================
    // Get the requested record...
    // =========================================================================

    $requested_record = NULL ;

    // -------------------------------------------------------------------------

    foreach ( $dataset_records as $this_index => $this_record ) {

        // ---------------------------------------------------------------------

        if (    array_key_exists( 'ad_swapper_site_sid' , $this_record )
                &&
                $this_record['ad_swapper_site_sid'] === $site_sid
            ) {
            $requested_record = $this_record ;
            break ;
        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( ! is_array( $requested_record ) ) {

        return <<<EOT
PROBLEM:&nbsp; Available Sites record not found
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $requested_record ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_available_sites_record_by_site_unique_key()
// =============================================================================

function get_available_sites_record_by_site_unique_key(
    $all_application_dataset_definitions    ,
    $site_unique_key                        ,
    &$loaded_datasets   = NULL              ,
    &$core_plugapp_dirs = NULL
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\
    // get_available_sites_record_by_site_unique_key(
    //      $all_application_dataset_definitions    ,
    //      $site_unique_key                        ,
    //      &$loaded_datasets   = NULL              ,
    //      &$core_plugapp_dirs = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $available_sites_record ARRAY
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__     ;
    $fn = __FUNCTION__      ;
    $ln = (string) __LINE__ ;

    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_available_sites' ;

    // =========================================================================
    // Load the "Sites" records...
    // =========================================================================

    if (    ! is_array( $loaded_datasets )
            ||
            ! array_key_exists(
                    $dataset_slug       ,
                    $loaded_datasets
                    )
        ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_dataset_title_records_key_field_slug_and_record_indices_by_key(
        //      $all_application_dataset_definitions    ,
        //      $dataset_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      o   On SUCCESS
        //              ARRAY(
        //                  $dataset_title                  STRING
        //                  $dataset_records                ARRAY
        //                  $array_storage_key_field_slug   STRING
        //                  $record_indices_by_key          ARRAY
        //                  )
        //
        //      o   On FAILURE
        //              $error_message STRING
        // -------------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_dataset_title_records_key_field_slug_and_record_indices_by_key(
                $all_application_dataset_definitions    ,
                $dataset_slug
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        $loaded_datasets[ $dataset_slug ] = array(
            'title'                 =>  $result[0]      ,
            'records'               =>  $result[1]      ,
            'key_field_slug'        =>  $result[2]      ,
            'record_indices_by_key' =>  $result[3]
            ) ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $dataset_records = $loaded_datasets[ $dataset_slug ]['records'] ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $dataset_records = Array(
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]                  => 1421545408
    //                      [last_modified_server_datetime_utc]            => 1421545408
    //                      [key]                                          => 10906d4d-6d60-4e39-b201-9bf2b52f4347-1421545408-370125-1421
    //                      [ad_swapper_site_sid]                          => 2kcv-gwhz
    //                      [site_title]                                   => Plugdev
    //                      [home_page_url]                                => http://localhost/plugdev
    //                      [general_description]                          =>
    //                      [ads_wanted_description]                       =>
    //                      [sites_wanted_description]                     =>
    //                      [categories_available]                         =>
    //                      [categories_wanted]                            =>
    //                      [question_display_this_sites_ads_on_your_site] => 1
    //                      [question_display_your_ads_on_this_site]       =>
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $dataset_records , '$dataset_records' ) ;

    // =========================================================================
    // Get the requested record...
    // =========================================================================

    $requested_record = NULL ;

    // -------------------------------------------------------------------------

    foreach ( $dataset_records as $this_index => $this_record ) {

        // ---------------------------------------------------------------------

        if (    array_key_exists( 'site_unique_key' , $this_record )
                &&
                $this_record['site_unique_key'] === $site_unique_key
            ) {
            $requested_record = $this_record ;
            break ;
        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( ! is_array( $requested_record ) ) {

        return <<<EOT
PROBLEM:&nbsp; Available Sites record not found
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $requested_record ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_ad_slots_record_by_ad_slot_sid()
// =============================================================================

function get_ad_slots_record_by_ad_slot_sid(
    $all_application_dataset_definitions    ,
    $ad_slot_sid                            ,
    &$loaded_datasets   = NULL              ,
    &$core_plugapp_dirs = NULL
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\
    // get_ad_slots_record_by_ad_slot_sid(
    //      $all_application_dataset_definitions    ,
    //      $ad_slot_sid                            ,
    //      &$loaded_datasets   = NULL              ,
    //      &$core_plugapp_dirs = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $ad_slots_record ARRAY
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__     ;
    $fn = __FUNCTION__      ;
    $ln = (string) __LINE__ ;

    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_ad_slots' ;

    // =========================================================================
    // Load the "Ad Slots" records...
    // =========================================================================

    if (    ! is_array( $loaded_datasets )
            ||
            ! array_key_exists(
                    $dataset_slug       ,
                    $loaded_datasets
                    )
        ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_dataset_title_records_key_field_slug_and_record_indices_by_key(
        //      $all_application_dataset_definitions    ,
        //      $dataset_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      o   On SUCCESS
        //              ARRAY(
        //                  $dataset_title                  STRING
        //                  $dataset_records                ARRAY
        //                  $array_storage_key_field_slug   STRING
        //                  $record_indices_by_key          ARRAY
        //                  )
        //
        //      o   On FAILURE
        //              $error_message STRING
        // -------------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_dataset_title_records_key_field_slug_and_record_indices_by_key(
                $all_application_dataset_definitions    ,
                $dataset_slug
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        $loaded_datasets[ $dataset_slug ] = array(
            'title'                 =>  $result[0]      ,
            'records'               =>  $result[1]      ,
            'key_field_slug'        =>  $result[2]      ,
            'record_indices_by_key' =>  $result[3]
            ) ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $dataset_records = $loaded_datasets[ $dataset_slug ]['records'] ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $dataset_records = Array(
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]       => 1423272554
    //                      [last_modified_server_datetime_utc] => 1423272554
    //                      [key]                               => c6886167-8b81-43c4-9bbb-b7391a007356-1423272554-653172-1523
    //                      [local_key]                         => 28aba5f6449b8e71f0b96c80a9156f20c0ca451a36e5483c7653579d6f554485
    //                      [name]                              => right-sidebar
    //                      [title]                             => Right Sidebar
    //                      [description]                       =>
    //                      [width_nominal]                     => 300
    //                      [width_min]                         =>
    //                      [width_max]                         =>
    //                      [height_nominal]                    => 480
    //                      [height_min]                        =>
    //                      [height_max]                        =>
    //                      [sequence_number]                   =>
    //                      [question_disabled]                 =>
    //                      [global_sid]                        => 23mk-hzcw
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $dataset_records , '$dataset_records' ) ;

    // =========================================================================
    // Get the requested record...
    // =========================================================================

    $requested_record = NULL ;

    // -------------------------------------------------------------------------

    foreach ( $dataset_records as $this_index => $this_record ) {

        // ---------------------------------------------------------------------

        if (    array_key_exists( 'global_sid' , $this_record )
                &&
                $this_record['global_sid'] === $ad_slot_sid
            ) {
            $requested_record = $this_record ;
            break ;
        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( ! is_array( $requested_record ) ) {

        return <<<EOT
PROBLEM:&nbsp; Ad Slots record not found
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $requested_record ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_page_requests_record_by_page_request_id()
// =============================================================================

function get_page_requests_record_by_page_request_id(
    $all_application_dataset_definitions    ,
    $page_request_id                        ,
    $core_plugapp_dirs = NULL
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\
    // get_page_requests_record_by_page_request_id(
    //      $all_application_dataset_definitions    ,
    //      $page_request_id                        ,
    //      $core_plugapp_dirs = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // NOTE!
    // =====
    // "Page Requests" are stored in a MySQL table (not array storage).
    //
    // RETURNS
    //      On SUCCESS
    //          o   array(
    //                  $core_plugapp_dirs              STRING          ,
    //                  $page_requests_mysql_table_name STRING          ,
    //                  $page_requests_record           ARRAY/FALSE
    //                  )
    //              Where $page_requests_record is one of:-
    //                  --  ARRAY (if page request found)
    //                  --  FALSE (if page request NOT found)
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__             ;
    $fn = __FUNCTION__              ;
    $ln = number_format( __LINE__ ) ;

    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_page_requests' ;

    $safe_dataset_slug = \htmlentities( $dataset_slug ) ;

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $dataset_slug , $all_application_dataset_definitions ) ) {

        return <<<EOT
PROBLEM:&nbsp; Unrecognised/unsupported dataset ("{$safe_dataset_slug}")
Detected in:&nbsp; \\{$ns}\\{$fn}() (near line {$ln})
EOT;

    }

    // -------------------------------------------------------------------------

    $selected_datasets_dmdd = $all_application_dataset_definitions[ $dataset_slug ] ;

    // -------------------------------------------------------------------------

    if ( ! is_array( $core_plugapp_dirs ) ) {

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
        //
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

    require_once( $core_plugapp_dirs['dataset_manager_includes_dir'] . '/mysql-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\
    // auto_create_or_validate__return_table_name_for__datasets_mysql_table(
    //      $core_plugapp_dirs                      ,
    //      $question_front_end                     ,
    //      $target_apps_apps_dir_relative_path     ,
    //      $dataset_slug
    //      )
    // - - - - - - - - - - - - - - - - -
    // Auto-creates the dataset's MySQL table (if that table doesn't exist yet).
    //
    // Or validates the table if it does exist.  Where, by validate, we mean
    // check that the table on disk is the same as defined in the dataset
    // definition.  In other words, if the dataset definition has been updated
    // (but the table on disk hasn't), complain!
    //
    // $target_apps_apps_dir_relative_path is like (eg):-
    //      o   "teaser-maker"
    //      o   "basepress-users/reporting-module"
    //      o   etc.
    //
    // If the auto-creation/validation is successful, returns the table's
    // MySQL able name.
    //
    // RETURNS
    //      On SUCCESS
    //          $mysql_table_name STRING
    //
    //      On FAILURE
    //          ARRAY
    //              $error_message STRING
    //              )
    // -------------------------------------------------------------------------

    $question_front_end = FALSE ;

    // -------------------------------------------------------------------------

    $mysql_table_name =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\auto_create_or_validate__return_table_name_for__datasets_mysql_table(
            $core_plugapp_dirs                      ,
            $question_front_end                     ,
            $selected_datasets_dmdd                 ,
            $dataset_slug
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $mysql_table_name ) ) {
        return $mysql_table_name[0] ;
    }

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\
    // get_zero_or_more_records(
    //      $sql
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // NOTE!  The INPUT $sql should NOT be escaped.
    //
    // RETURNS
    //      On SUCCESS
    //      - - - - -
    //      The 0+ records specified by the SQL string (as a PHP numeric
    //      array of records).  Eg:-
    //
    //          $records = array(
    //              0   =>  array(
    //                          'field_name_1'  =>  <field_value_1>     ,
    //                          'field_name_2'  =>  <field_value_2>     ,
    //                          ...                 ...
    //                          'field_name_N'  =>  <field_value_N>
    //                          )
    //              ...
    //              )
    //
    //      On FAILURE
    //      - - - - -
    //      An error message STRING.
    // -------------------------------------------------------------------------

    $sql = <<<EOT
SELECT *
FROM `{$mysql_table_name}`
WHERE `id` = "{$page_request_id}"
EOT;

    // -------------------------------------------------------------------------

    $page_requests_records =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\get_zero_or_more_records(
            $sql
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $page_requests_records ) ) {
        return $page_requests_records ;
    }

    // -------------------------------------------------------------------------

    if ( count( $page_requests_records ) > 1 ) {

        return <<<EOT
PROBLEM:&nbsp; Page requests record selection error (more than one record for "id")
Detected in:&nbsp; \\{$ns}\\{$fn}() (near line {$ln})
EOT;

    }

    // -------------------------------------------------------------------------

    if ( count( $page_requests_records ) < 1 ) {
        $page_requests_record = FALSE ;

    } else {
        $page_requests_record = $page_requests_records[0] ;

    }

    // -------------------------------------------------------------------------

    return array(
                $core_plugapp_dirs      ,
                $mysql_table_name       ,
                $page_requests_record
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_web_site_collections_record_by_collection_global_unique_key()
// =============================================================================

function get_web_site_collections_record_by_collection_global_unique_key(
    $all_application_dataset_definitions    ,
    $collection_global_unique_key           ,
    &$loaded_datasets   = NULL              ,
    &$core_plugapp_dirs = NULL
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\
    // get_web_site_collections_record_by_collection_global_unique_key(
    //      $all_application_dataset_definitions    ,
    //      $collection_global_unique_key           ,
    //      &$loaded_datasets   = NULL              ,
    //      &$core_plugapp_dirs = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $web_site_collections_record ARRAY
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $loaded_datasets , '$loaded_datasets' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $collection_global_unique_key , '$collection_global_unique_key' ) ;

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__     ;
    $fn = __FUNCTION__      ;
    $ln = (string) __LINE__ ;

    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_web_site_collections' ;

    // =========================================================================
    // Load the "Web Site Collections" records...
    // =========================================================================

    if (    ! is_array( $loaded_datasets )
            ||
            ! array_key_exists(
                    $dataset_slug       ,
                    $loaded_datasets
                    )
        ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_dataset_title_records_key_field_slug_and_record_indices_by_key(
        //      $all_application_dataset_definitions    ,
        //      $dataset_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      o   On SUCCESS
        //              ARRAY(
        //                  $dataset_title                  STRING
        //                  $dataset_records                ARRAY
        //                  $array_storage_key_field_slug   STRING
        //                  $record_indices_by_key          ARRAY
        //                  )
        //
        //      o   On FAILURE
        //              $error_message STRING
        // -------------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_dataset_title_records_key_field_slug_and_record_indices_by_key(
                $all_application_dataset_definitions    ,
                $dataset_slug
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        $loaded_datasets[ $dataset_slug ] = array(
            'title'                 =>  $result[0]      ,
            'records'               =>  $result[1]      ,
            'key_field_slug'        =>  $result[2]      ,
            'record_indices_by_key' =>  $result[3]
            ) ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $dataset_records = $loaded_datasets[ $dataset_slug ]['records'] ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $dataset_records = Array(
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]       => 1425197599
    //                      [last_modified_server_datetime_utc] => 1425197599
    //                      [key]                               => 20a9a031-0d81-49ea-8774-57c66a029156-1425197599-330451-1682
    //                      [local_unique_key]                  => d4ky-9zyg-gp2w-hdyy
    //                      [global_unique_key]                 => 2222-2222-2222-2222-d4ky-9zyg-gp2w-hdyy
    //                      [name_slash_title]                  => Dog Lovers
    //                      [description]                       => Targeted at users who are dog lovers...
    //                      [collection_home_page_url]          => http://www.ferntechnology.com/
    //                      [question_moderated]                => 1
    //                      [question_disabled]                 =>
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $dataset_records , '$dataset_records' ) ;

    // =========================================================================
    // Get the requested record...
    // =========================================================================

    $requested_record = NULL ;

    // -------------------------------------------------------------------------

    foreach ( $dataset_records as $this_index => $this_record ) {

        // ---------------------------------------------------------------------

        if (    array_key_exists( 'global_unique_key' , $this_record )
                &&
                $this_record['global_unique_key'] === $collection_global_unique_key
            ) {
            $requested_record = $this_record ;
            break ;
        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( ! is_array( $requested_record ) ) {

        return <<<EOT
PROBLEM:&nbsp; Web Site Collections record not found
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $requested_record ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_web_site_collection_members_record_by_collection_global_and_member_site_unique_keys()
// =============================================================================

function get_web_site_collection_members_record_by_collection_global_and_member_site_unique_keys(
    $all_application_dataset_definitions    ,
    $collection_global_unique_key           ,
    $member_site_unique_key                 ,
    &$loaded_datasets   = NULL              ,
    &$core_plugapp_dirs = NULL
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\
    // get_web_site_collection_members_record_by_collection_global_and_member_site_unique_keys(
    //      $all_application_dataset_definitions    ,
    //      $collection_global_unique_key           ,
    //      $member_site_unique_key                 ,
    //      &$loaded_datasets   = NULL              ,
    //      &$core_plugapp_dirs = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $web_site_collection_members_record ARRAY
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $loaded_datasets , '$loaded_datasets' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $collection_global_unique_key , '$collection_global_unique_key' ) ;

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__     ;
    $fn = __FUNCTION__      ;
    $ln = (string) __LINE__ ;

    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_this_sites_web_site_collection_members' ;

    // =========================================================================
    // Load the "This Site's Web Site Collection Members" records...
    // =========================================================================

    if (    ! is_array( $loaded_datasets )
            ||
            ! array_key_exists(
                    $dataset_slug       ,
                    $loaded_datasets
                    )
        ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_dataset_title_records_key_field_slug_and_record_indices_by_key(
        //      $all_application_dataset_definitions    ,
        //      $dataset_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      o   On SUCCESS
        //              ARRAY(
        //                  $dataset_title                  STRING
        //                  $dataset_records                ARRAY
        //                  $array_storage_key_field_slug   STRING
        //                  $record_indices_by_key          ARRAY
        //                  )
        //
        //      o   On FAILURE
        //              $error_message STRING
        // -------------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_dataset_title_records_key_field_slug_and_record_indices_by_key(
                $all_application_dataset_definitions    ,
                $dataset_slug
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        $loaded_datasets[ $dataset_slug ] = array(
            'title'                 =>  $result[0]      ,
            'records'               =>  $result[1]      ,
            'key_field_slug'        =>  $result[2]      ,
            'record_indices_by_key' =>  $result[3]
            ) ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $dataset_records = $loaded_datasets[ $dataset_slug ]['records'] ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $dataset_records = Array(
    //
    //          [0] => Array(
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $dataset_records , '$dataset_records' ) ;

    // =========================================================================
    // Get the requested record...
    // =========================================================================

    $requested_record = NULL ;

    // -------------------------------------------------------------------------

    foreach ( $dataset_records as $this_index => $this_record ) {

        // ---------------------------------------------------------------------

        if (    array_key_exists( 'collection_global_unique_key' , $this_record )
                &&
                $this_record['collection_global_unique_key'] === $collection_global_unique_key
                &&
                array_key_exists( 'member_site_unique_key' , $this_record )
                &&
                $this_record['member_site_unique_key'] === $member_site_unique_key
            ) {
            $requested_record = $this_record ;
            break ;
        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( ! is_array( $requested_record ) ) {

        return <<<EOT
PROBLEM:&nbsp; Web Site Collection Members record not found
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $requested_record ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

