<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / EXTRAS / TOGGLE-AVAILABLE-SITES /
//      TOGGLE-AVAILABLE-SITE.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_toggleAvailableSites ;

// =============================================================================
// toggle_available_site()
// =============================================================================

function toggle_available_site(
    $plugin_root_dir
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_toggleAvailableSites\
    // toggle_available_site(
    //      $plugin_root_dir
    //      )
    // - - - - - - - - - - - - -
    // This routine handles calls to toggle either the:-
    //      o   question_display_this_sites_ads_on_your_site
    // or the:-
    //      o   question_display_your_ads_on_this_site
    //
    // status of a particular "Available" (downloaded) site...
    //
    // On SUCCESS
    //      Returns to the "Manage Available Sites" screen.
    //
    // On FAILURE
    //      exit()s with an error message.
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $_GET = array(
    //                  [action]    => greatKiwi_byFerntec_toggleAvailableSites
    //                  [siteid]    => 2kcv-gwhz
    //                  [direction] => this-on-plugin
    //                  [to]        => false
    //                  [secret]    => 50a0a1479...497c19850
    //                  )
    //
    //      $_POST = array()
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_GET , '$_GET' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_POST , '$_POST' ) ;

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Must be a logged-in (WordPress) user...
    // =========================================================================

    if ( ! \is_user_logged_in() ) {
        fatal_error( 'You must be logged-in to access this file' ) ;
        return ;
    }

    // =========================================================================
    // Administrators only...
    // =========================================================================

    if ( ! \current_user_can( 'manage_options' ) ) {
        fatal_error( 'You don\'t have permission to access this file' ) ;
        return ;
    }

    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // INITIAL ERROR CHECKING...
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    // =========================================================================
    // $_GET ?
    // =========================================================================

    if ( count( $_GET ) !== 5 ) {
        fatal_error( 'Bad GET' ) ;
        return ;
    }

    // =========================================================================
    // $_POST
    // =========================================================================

    if ( count( $_POST ) !== 0 ) {
        fatal_error( 'Bad POST' ) ;
        return ;
    }

    // =========================================================================
    // Get the CORE PLUGAPP DIRS...
    // =========================================================================

    require_once( $plugin_root_dir . '/apps-api.php' ) ;

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

    // -------------------------------------------------------------------------

    $core_plugapp_dirs =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_core_plugapp_dirs(
            $path_in_plugin     ,
            $app_handle
            ) ;

    // =========================================================================
    // siteid ?
    // =========================================================================

    if ( ! array_key_exists( 'siteid' , $_GET ) ) {
        fatal_error( 'No "siteid"' ) ;
        return ;
    }

    // -------------------------------------------------------------------------

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/sequential-ids-support.php' ) ;

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

    if (    trim( $_GET['siteid'] ) === ''
            ||
            ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\question_sequential_id(
                    $_GET['siteid']
                    )
        ) {
        fatal_error( 'Bad "siteid"' ) ;
        return ;
    }

    // =========================================================================
    // direction ?
    // =========================================================================

    if ( ! array_key_exists( 'direction' , $_GET ) ) {
        fatal_error( 'No "direction"' ) ;
        return ;
    }

    // -------------------------------------------------------------------------

    if ( ! in_array(
                $_GET['direction']                              ,
//              array( 'theirs-on-yours' , 'yours-on-theirs' )  ,
                array( 'this-on-plugin' , 'plugin-on-this' )  ,
                TRUE
                )
        ) {
        fatal_error( 'Bad "direction"' ) ;
        return ;
    }

    // =========================================================================
    // to ?
    // =========================================================================

    if ( ! array_key_exists( 'to' , $_GET ) ) {
        fatal_error( 'No "to"' ) ;
        return ;
    }

    // -------------------------------------------------------------------------

    if ( ! in_array(
                $_GET['to']                     ,
                array( 'true' , 'false' )       ,
                TRUE
                )
        ) {
        fatal_error( 'Bad "to"' ) ;
        return ;
    }

    // =========================================================================
    // secret ?
    // =========================================================================

    if ( ! array_key_exists( 'secret' , $_GET ) ) {
        fatal_error( 'No "secret"' ) ;
        return ;
    }

    // -------------------------------------------------------------------------

    if (    trim( $_GET['secret'] ) === ''
            ||
            ! \ctype_xdigit( $_GET['secret'] )
        ) {
        fatal_error( 'Bad "secret"' ) ;
        return ;
    }

    // =========================================================================
    // Validate the "secret"...
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/form-secrets.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_formSecrets\
    // validate_form_secret(
    //      $form_name                  ,
    //      $instance_data_or_hash      ,
    //      $form_secret
    //      )
    // - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          One of:-
    //          o   ARRAY $form_secret_record (if the form secret WAS found).
    //              Where $form_secret_record is like (eg):-
    //                  array(
    //                      'form_name'             =>  $form_name              ,
    //                      'instance_data_or_hash' =>  $instance_data_or_hash  ,
    //                      'REMOTE_ADDR'           =>  "xxx"                   ,
    //                      'HTTP_USER_AGENT'       =>  "yyy"                   ,
    //                      'start_datetime_utc'    =>  ZZZ                     ,
    //                      'form_secret'           =>  $form_secret
    //                      )
    //          o   FALSE (if the specified form secret WASN'T found).
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $form_name = 'toggle-available-site' ;

    $instance_data_or_hash = $_GET['siteid'] . '-' . $_GET['direction'] ;

    // -------------------------------------------------------------------------

    $form_secret_record =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_formSecrets\validate_form_secret(
            $form_name                  ,
            $instance_data_or_hash      ,
            $_GET['secret']
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $form_secret_record ) ) {
        fatal_error( $form_secret_record ) ;
        return ;
    }

    // -------------------------------------------------------------------------

    if ( $form_secret_record === FALSE ) {
        fatal_error( 'Invalid or expired "secret"' ) ;
        return ;
    }

    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // NOW WE CAN CONTINUE THE ERROR CHECKING...
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $_GET = array(
    //                  [siteid]    => 2kcv-gwhz
    //                  [direction] => this-on-plugin
    //                  [to]        => false
    //                  [secret]    => 50a0a1479...497c19850
    //                  )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_GET , '$_GET' ) ;

/*
    // =========================================================================
    // Get the "Ad Swapper Available Sites" dataset details...
    // =========================================================================

    require_once( $core_plugapp_dirs['apps_dot_app_dir'] . '/ad-swapper-available-sites.dd.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableSites\
    // get_datasets_array_storage_details()
    // - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      ARRAY $datasets_array_storage_details = array(
    //                  'dataset_slug'              =>  "xxx"                       ,
    //                  'basepress_dataset_handle'  =>  $basepress_dataset_handle   ,
    //                  'array_storage_data'        =>  $array_storage_data
    //                  )
    //
    //      Where: $basepress_dataset_handle = array(
    //          'nice_name'     =>  "xxx"   ,
    //          'unique_key'    =>  "yyy"   ,
    //          'version'       =>  "zzz"
    //          )
    //
    //      And: $array_storage_data = array(
    //          'default_storage_method'    =>  "json" | "basepress-dataset"    ,
    //          'json_data_files_dir'       =>  NULL | "xxx"                    ,
    //          'supported_datasets'        =>  $supported_datasets
    //          ) ;
    //
    //      And: $supported_datasets = array
    //          "<dataset_slug>"    =>  array(
    //              'storage_method'            =>  "json" | "basepress-dataset"    ,
    //              'json_filespec'             =>  NULL | "xxx"                    ,
    //              'basepress_dataset_handle'  =>  $basepress_dataset_handle
    //              )
    //          ...
    //          )
    // -------------------------------------------------------------------------

    $datasets_array_storage_details =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableSites\get_datasets_array_storage_details()
        ;

    // =========================================================================
    // Load the "Ad Swapper Available Site" records...
    // =========================================================================

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

    $question_die_on_error = FALSE ;

    // -------------------------------------------------------------------------

    $available_site_records =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\load_numerically_indexed(
            $datasets_array_storage_details['dataset_slug']             ,
            $question_die_on_error                                      ,
            $datasets_array_storage_details['array_storage_data']
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $available_site_records ) ) {
        die( nl2br( $available_site_records ) ) ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $available_site_records = Array(
    //
    //          [0] => Array(
    //              [created_server_datetime_utc]       => 1421481213
    //              [last_modified_server_datetime_utc] => 1421481213
    //              [key]                               => 17780b77-3879-40b2-b8cf-040e54f7e9cb-1421481213-299654-1420
    //              [ad_swapper_site_sid]               => 2kcv-gwhz
    //              [site_title]                        => Plugdev
    //              [home_page_url]                     => http://localhost/plugdev
    //              [general_description]               =>
    //              [ads_wanted_description]            =>
    //              [sites_wanted_description]          =>
    //              [categories_available]              =>
    //              [categories_wanted]                 =>
    //              [question_ignore]                   =>
    //              )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $available_site_records ) ;

*/

    // =========================================================================
    // Get the "Other Site Specific Settings" dataset details...
    // =========================================================================

    require_once( $core_plugapp_dirs['apps_dot_app_dir'] . '/ad-swapper-other-site-specific-settings.dd.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperOthersiteSpecificSettings\
    // get_datasets_array_storage_details()
    // - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      ARRAY $datasets_array_storage_details = array(
    //                  'dataset_slug'              =>  "xxx"                       ,
    //                  'basepress_dataset_handle'  =>  $basepress_dataset_handle   ,
    //                  'array_storage_data'        =>  $array_storage_data
    //                  )
    //
    //      Where: $basepress_dataset_handle = array(
    //          'nice_name'     =>  "xxx"   ,
    //          'unique_key'    =>  "yyy"   ,
    //          'version'       =>  "zzz"
    //          )
    //
    //      And: $array_storage_data = array(
    //          'default_storage_method'    =>  "json" | "basepress-dataset"    ,
    //          'json_data_files_dir'       =>  NULL | "xxx"                    ,
    //          'supported_datasets'        =>  $supported_datasets
    //          ) ;
    //
    //      And: $supported_datasets = array
    //          "<dataset_slug>"    =>  array(
    //              'storage_method'            =>  "json" | "basepress-dataset"    ,
    //              'json_filespec'             =>  NULL | "xxx"                    ,
    //              'basepress_dataset_handle'  =>  $basepress_dataset_handle
    //              )
    //          ...
    //          )
    // -------------------------------------------------------------------------

    $datasets_array_storage_details =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperOtherSiteSpecificSettings\get_datasets_array_storage_details()
        ;

    // =========================================================================
    // Load the "Other Site Specific Settings" records...
    // =========================================================================

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

    $question_die_on_error = FALSE ;

    // -------------------------------------------------------------------------

    $other_site_specific_settings_records =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\load_numerically_indexed(
            $datasets_array_storage_details['dataset_slug']             ,
            $question_die_on_error                                      ,
            $datasets_array_storage_details['array_storage_data']
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $other_site_specific_settings_records ) ) {
        fatal_error( $other_site_specific_settings_records ) ;
        return ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $other_site_specific_settings_records = Array(
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]                  => 1446796885
    //                      [last_modified_server_datetime_utc]            => 1446796885
    //                      [key]                                          => ce905f38-eb19-4783-9b7a-371aad27b851-1446796885-756398-5104
    //                      [ad_swapper_site_sid]                          => 2kmv-hzgc
    //                      [question_display_your_ads_on_this_site]       =>
    //                      [question_display_this_sites_ads_on_your_site] =>
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $other_site_specific_settings_records       ,
//    '$other_site_specific_settings_records'
//    ) ;

    // =========================================================================
    // Search for the specified site, and toggle it's:-
    //      question_display_this_sites_ads_on_your_site
    //      question_display_your_ads_on_this_site
    //
    // setting as requested.
    //
    // While making sure that:-
    //      o   $_GET['to'], and;
    //      o   question_display_this_sites_ads_on_your_site or;
    //          question_display_your_ads_on_this_site
    //
    // match...
    // =========================================================================

    $site_specific_settings_record       = NULL ;
    $site_specific_settings_record_index = NULL ;

    // -------------------------------------------------------------------------

    foreach ( $other_site_specific_settings_records as $this_index => $this_record ) {

        // ---------------------------------------------------------------------

        if ( $this_record['ad_swapper_site_sid'] === $_GET['siteid'] ) {

            $site_specific_settings_record       = $this_record ;
            $site_specific_settings_record_index = $this_index  ;

            break ;

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Site found ?
    // =========================================================================

    if ( ! is_array( $site_specific_settings_record ) ) {

        // ---------------------------------------------------------------------
        // NO!
        //      =>  Add new record...
        // ---------------------------------------------------------------------

        require_once( $core_plugapp_dirs['apps_dot_app_dir'] . '/ad-swapper-other-site-specific-settings.dd.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperOtherSiteSpecificSettings\
        // get_full_blank_slash_defaulted_record(
        //      $core_plugapp_dirs              ,
        //      $dataset_records                ,
        //      $record_indices_by_key = NULL
        //      )
        // - - - - - - - - - - - - - - - - - - -
        // Returns a "blank" array storage record - containing ALL the dataset's
        // fields.
        //
        // With all fields other than the `overhead' fields:-
        //      o   created_server_datetime_utc
        //      o   last_modified_server_datetime_utc
        //      o   key
        //
        // set to their default values.  EXCEPT for the:-
        //      o   ad_swapper_site_sid
        //
        // field - which is left BLANK (empty string) - and MUST be set by the
        // CALLER (before the record is stored).
        //
        // NOTE!
        // =====
        // The returned record isn't added to the input $dataset_records.
        // Nor is is saved to disk.  It's the caller's job to do these things
        // (f required).
        //
        // RETURNS
        //      On SUCCESS
        //          $blank_record ARRAY
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        $record_indices_by_key = NULL ;

        // ---------------------------------------------------------------------

        $site_specific_settings_record =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperOtherSiteSpecificSettings\get_full_blank_slash_defaulted_record(
                $core_plugapp_dirs                      ,
                $other_site_specific_settings_records   ,
                $record_indices_by_key
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $site_specific_settings_record ) ) {
            fatal_error( $site_specific_settings_record ) ;
            return ;
        }

        // ---------------------------------------------------------------------

        $site_specific_settings_record['ad_swapper_site_sid'] = $_GET['siteid'] ;

        // ---------------------------------------------------------------------

        $other_site_specific_settings_records[] = $site_specific_settings_record ;

        // ---------------------------------------------------------------------

        $site_specific_settings_record       = NULL ;
        $site_specific_settings_record_index = NULL ;

        // ---------------------------------------------------------------------

        foreach ( $other_site_specific_settings_records as $this_index => $this_record ) {

            // -----------------------------------------------------------------

            if ( $this_record['ad_swapper_site_sid'] === $_GET['siteid'] ) {

                $site_specific_settings_record       = $this_record ;
                $site_specific_settings_record_index = $this_index  ;

                break ;

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        if ( ! is_array( $site_specific_settings_record ) ) {
            fatal_error( 'Can\'t find new site specific settings record' ) ;
            return ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Toggle the site's:-
    //      question_display_this_sites_ads_on_your_site, or;
    //      question_display_your_ads_on_this_site
    //
    // setting, as requested.
    //
    // While making sure that:-
    //      o   $_GET['to'], and;
    //      o   question_display_this_sites_ads_on_your_site or;
    //          question_display_your_ads_on_this_site
    //
    // match, while doing so.
    // =========================================================================

//  if ( $_GET['direction'] === 'theirs-on-yours' ) {
    if ( $_GET['direction'] === 'this-on-plugin' ) {

        // -----------------------------------------------------------------

        if ( $_GET['to'] === 'true' ) {

            // -----------------------------------------------------------------

            if ( $site_specific_settings_record['question_display_this_sites_ads_on_your_site'] ) {
                fatal_error( 'Bad "to"' ) ;
                return ;
            }

            // -----------------------------------------------------------------

            $other_site_specific_settings_records[ $site_specific_settings_record_index ]['question_display_this_sites_ads_on_your_site'] = TRUE ;

            // -----------------------------------------------------------------

            $what_to = 'ENABLED' ;

            // -----------------------------------------------------------------

        } elseif ( $_GET['to'] === 'false' ) {

            // -----------------------------------------------------------------

            if ( ! $site_specific_settings_record['question_display_this_sites_ads_on_your_site'] ) {
                fatal_error( 'Bad "to"' ) ;
                return ;
            }

            // -----------------------------------------------------------------

            $other_site_specific_settings_records[ $site_specific_settings_record_index ]['question_display_this_sites_ads_on_your_site'] = FALSE ;

            // -----------------------------------------------------------------

            $what_to = 'DISABLED' ;

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            fatal_error( 'Bad "to"' ) ;
            return ;

            // -----------------------------------------------------------------

        }

        // -----------------------------------------------------------------

        $what = <<<EOT
Display of this site's ads on your site {$what_to} OK!
EOT;

        // ---------------------------------------------------------------------

//  } elseif ( $_GET['direction'] === 'yours-on-theirs' ) {
    } elseif ( $_GET['direction'] === 'plugin-on-this' ) {

        // -----------------------------------------------------------------

        if ( $_GET['to'] === 'true' ) {

            // -----------------------------------------------------------------

            if ( $site_specific_settings_record['question_display_your_ads_on_this_site'] ) {
                fatal_error( 'Bad "to"' ) ;
                return ;
            }

            // -----------------------------------------------------------------

            $other_site_specific_settings_records[ $site_specific_settings_record_index ]['question_display_your_ads_on_this_site'] = TRUE ;

            // -----------------------------------------------------------------

            $what_to = 'ENABLED' ;

            // -----------------------------------------------------------------

        } elseif ( $_GET['to'] === 'false' ) {

            // -----------------------------------------------------------------

            if ( ! $site_specific_settings_record['question_display_your_ads_on_this_site'] ) {
                fatal_error( 'Bad "to"' ) ;
                return ;
            }

            // -----------------------------------------------------------------

            $other_site_specific_settings_records[ $site_specific_settings_record_index ]['question_display_your_ads_on_this_site'] = FALSE ;

            // -----------------------------------------------------------------

            $what_to = 'DISABLED' ;

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            fatal_error( 'Bad "to"' ) ;
            return ;

            // -----------------------------------------------------------------

        }

        // -----------------------------------------------------------------

        $what = <<<EOT
Display of your ads on this site {$what_to} OK!
EOT;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        fatal_error( 'Bad "direction" (#2)' ) ;
        return ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Update the "Other Site Specific Settings" dataset...
    // =========================================================================

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
    // NOTE!
    // -----
    // Does:-
    //      $array_to_save = array_values( $array_to_save ) ;
    //
    // to ensures it's indices are 0, 1, 2... (before saving it).
    //
    // ---
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
    //          TRUE
    //
    //      o   On FAILURE
    //          - - - - -
    //          $error message STRING
    // -------------------------------------------------------------------------

//  $question_die_on_error = FALSE ;

    // -------------------------------------------------------------------------

    $ok =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\save_numerically_indexed(
            $datasets_array_storage_details['dataset_slug']             ,
            $other_site_specific_settings_records                       ,
            $question_die_on_error                                      ,
            $datasets_array_storage_details['array_storage_data']
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $ok ) ) {
        fatal_error( $ok ) ;
        return ;
    }

    // =========================================================================
    // Go back to the "Manage Dataset" page...
    // =========================================================================

    require_once( $core_plugapp_dirs['dataset_manager_includes_dir'] . '/get-dataset-urls.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_manage_dataset_url(
    //      $caller_apps_includes_dir   ,
    //      $question_front_end         ,
    //      $dataset_slug = NULL        ,
    //      $page_variant = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the "manage-dataset" URL.
    //
    // If $dataset_slug is NULL, then we use:-
    //      $_GET['dataset_slug']
    //
    // If a STRING $page_variant slug is supplied, it's the CALLER's job to
    // ensure that it's defined.  In:-
    //      $selected_datasets_dmdd['dataset_records_table']['page_variants']
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          STRING $url
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $_COOKIE    ,
//    '$_COOKIE'
//    ) ;

    // -------------------------------------------------------------------------

    $question_front_end = FALSE ;

    // -------------------------------------------------------------------------

    $_GET['application'] = 'ad-swapper' ;

    // -------------------------------------------------------------------------

    $dataset_slug_to_return_to = 'ad_swapper_available_sites' ;

    // -------------------------------------------------------------------------

    require_once( $core_plugapp_dirs['apps_dot_app_dir'] . '/available-site-resources.php' ) ;

    // -------------------------------------------------------------------------

    $cookie_name =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableSites\get_last_displayed_available_sites_page_variant_cookie_name()
        ;

    // -------------------------------------------------------------------------

    if (    array_key_exists(
                $cookie_name    ,
                $_COOKIE
                )
            &&
            in_array(
                $_COOKIE[ $cookie_name ]                                    ,
                array( 'sites-to-advertise' , 'sites-to-advertise-on' )     ,
                TRUE
                )
        ) {

        // ---------------------------------------------------------------------


        $page_variant = $_COOKIE[ $cookie_name ] ;

        // ---------------------------------------------------------------------

        $url =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_manage_dataset_url(
                $core_plugapp_dirs['plugins_includes_dir']      ,
                $question_front_end                             ,
                $dataset_slug_to_return_to                      ,
                $page_variant
                ) ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $url =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_manage_dataset_url(
                $core_plugapp_dirs['plugins_includes_dir']      ,
                $question_front_end                             ,
                $dataset_slug_to_return_to
                ) ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( is_array( $url ) ) {
        fatal_error( $url[0] ) ;
        return ;
    }

    // -------------------------------------------------------------------------

    echo <<<EOT
<br />
<br />

<p style="font-weight:bold">{$what}</p>

<p style="font-style:italic">Click "Manage Available Sites" (above), to continue...</p>

<script type="text/javascript">
    parent.location.href = '{$url}' ;
</script>
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// fatal_error()
// =============================================================================

function fatal_error(
    $error_message
    ) {

    // -------------------------------------------------------------------------

    $debug_backtrace = debug_backtrace() ;

    $calling_function_name = $debug_backtrace[1]['function'] ;

    if ( $calling_function_name === '' ) {
        $calling_function_name = 'global' ;
    }

    $calling_function_line = $debug_backtrace[0]['line'] ;

    // -------------------------------------------------------------------------

    $msg = <<<EOT


PROBLEM:&nbsp; {$error_message}
Detected in:&nbsp; \\{$calling_function_name}()
Near line:&nbsp; {$calling_function_line}
EOT;

    // -------------------------------------------------------------------------

    echo nl2br( $msg ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// Call the handler function...
// =============================================================================

    //  DIRS NEEDED
    $greatKiwi_byFernTec_adSwapper_local_v0x1x211_plugin_root_dir =
        dirname( dirname( dirname( dirname( dirname( dirname( __FILE__ ) ) ) ) ) )
        ;

    //  CALL THIS API FUNCTION...
    toggle_available_site(
        $greatKiwi_byFernTec_adSwapper_local_v0x1x211_plugin_root_dir
        ) ;

// =============================================================================
// That's that!
// =============================================================================

