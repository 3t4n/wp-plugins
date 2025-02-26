<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / EXTRAS / TOGGLE-AVAILABLE-ADS /
//      TOGGLE-AVAILABLE-AD.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_toggleAvailableAds ;

// =============================================================================
// toggle_available_ad()
// =============================================================================

function toggle_available_ad(
    $plugin_root_dir
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_toggleAvailableAds\
    // toggle_available_ad(
    //      $plugin_root_dir
    //      )
    // - - - - - - - - - - -
    // This routine handles calls to toggle the:-
    //      o   question_display
    //
    // status of a particular "Available Ad"...
    //
    // On SUCCESS
    //      Returns to the "Manage Available Ads" screen.
    //
    // On FAILURE
    //      exit()s with an error message.
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $_GET = array(
    //                  [action]    => greatKiwi_byFerntec_toggleAvailableAds
    //                  [adid]      => 94wm-zvhg
    //                  [to]        => false
    //                  [secret]    => 83f8dc5de...10b2ba0a748208
    //                  [return_to] => 687474703a2f2...2d35333236
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

    if ( count( $_GET ) < 4 || count( $_GET ) > 5 ) {
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
    // adid ?
    // =========================================================================

    if ( ! array_key_exists( 'adid' , $_GET ) ) {
        fatal_error( 'No "adid"' ) ;
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

    if (    trim( $_GET['adid'] ) === ''
            ||
            ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\question_sequential_id(
                    $_GET['adid']
                    )
        ) {
        fatal_error( 'Bad "adid"' ) ;
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

    $form_name = 'toggle-available-ad' ;

    $instance_data_or_hash = $_GET['adid'] ;

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
    //                  [adid]   => ncgh-vzkm
    //                  [to]     => false
    //                  [secret] => 4a012c706c05...71cc20b81e
    //                  )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_GET , '$_GET' ) ;

    // =========================================================================
    // Get the "Ad Swapper Available Ads" dataset details...
    // =========================================================================

    require_once( $core_plugapp_dirs['apps_dot_app_dir'] . '/ad-swapper-available-ads.dd.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableAds\
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
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableAds\get_datasets_array_storage_details()
        ;

    // =========================================================================
    // Load the "Ad Swapper Available Ads" records...
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

    $available_ad_records =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\load_numerically_indexed(
            $datasets_array_storage_details['dataset_slug']             ,
            $question_die_on_error                                      ,
            $datasets_array_storage_details['array_storage_data']
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $available_ad_records ) ) {
        fatal_error( $available_ad_records ) ;
        return ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $available_ad_records = Array(
    //
    //          [0] => Array(
    //              [created_server_datetime_utc]       => 1421569635
    //              [last_modified_server_datetime_utc] => 1421569635
    //              [key]                               => cfe6de47-5c12-4397-b9f6-61af9d6fd1d5-1421569635-787371-1425
    //              [global_sid]                        => ncgh-vzkm
    //              [ad_swapper_site_sid]               => 2kcv-gwhz
    //              [image_url]                         => http://localhost/plugdev/wp-content/uploads/2014/06/rookie-mag-postcards-from-wonderland.jpeg
    //              [link_url]                          => http://www.google.co.nz
    //              [alt_text]                          =>
    //              [description]                       =>
    //              [start_datetime]                    =>
    //              [end_datetime]                      =>
    //              [aspect_ratio_min]                  =>
    //              [aspect_ratio_max]                  =>
    //              [sequence_number]                   =>
    //              [question_display]                  => 1
    //              )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $available_ad_records ) ;

    // =========================================================================
    // Search for the specified ad...
    // =========================================================================

    $ad_record       = NULL ;
    $ad_record_index = NULL ;

    // -------------------------------------------------------------------------

    foreach ( $available_ad_records as $this_index => $this_record ) {

        // ---------------------------------------------------------------------

        if ( $this_record['global_sid'] === $_GET['adid'] ) {

            $ad_record       = $this_record ;
            $ad_record_index = $this_index  ;

            break ;

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Ad found ?
    // =========================================================================

    if ( $ad_record === NULL ) {
        fatal_error( 'Bad "adid"' ) ;
        return ;
    }

    // =========================================================================
    // Toggle the ad's:-
    //      question_display
    //
    // setting, as requested.
    //
    // While making sure that:-
    //      o   $_GET['to'], and;
    //      o   question_display
    //
    // match, while doing so.
    // =========================================================================

    require_once( $core_plugapp_dirs['apps_dot_app_dir'] . '/manually-approved-available-ads-support.php' ) ;

    // ------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_manuallyApprovedAvailableAds\
    // record_available_ads_approval_setting(
    //      $ad_sid
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // Record the fact that a specific "available ad" was either approved or
    // rejected.
    //
    // We don't care (or record) whether the ad was approved or rejected
    // (the available ad's "question_display" field records that).  What
    // we're recording is that fact that the Ad Swapper site owner has
    // manually approved or rejected the display of this ad on their site.
    //
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // ------------------------------------------------------------------------

    if ( $_GET['to'] === 'true' ) {

        // ---------------------------------------------------------------------

        if ( $available_ad_records[ $ad_record_index ]['question_display'] === TRUE ) {
            fatal_error( 'Bad "to"' ) ;
            return ;
        }

        // ---------------------------------------------------------------------

        $available_ad_records[ $ad_record_index ]['question_display'] = TRUE ;

        // ---------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_manuallyApprovedAvailableAds\record_available_ads_approval_setting(
                $available_ad_records[ $ad_record_index ]['global_sid']     ,
                TRUE
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            fatal_error( $result ) ;
            return ;
        }

        // ---------------------------------------------------------------------

        $what_to = 'ENABLED' ;

        // ---------------------------------------------------------------------

    } elseif ( $_GET['to'] === 'false' ) {

        // ---------------------------------------------------------------------

        if ( $available_ad_records[ $ad_record_index ]['question_display'] !== TRUE ) {
            fatal_error( 'Bad "to"' ) ;
            return ;
        }

        // ---------------------------------------------------------------------

        $available_ad_records[ $ad_record_index ]['question_display'] = FALSE ;

        // ---------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_manuallyApprovedAvailableAds\record_available_ads_approval_setting(
                $available_ad_records[ $ad_record_index ]['global_sid']     ,
                FALSE
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            fatal_error( $result ) ;
            return ;
        }

        // ---------------------------------------------------------------------

        $what_to = 'DISABLED' ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        fatal_error( 'Bad "to"' ) ;
        return ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $what = <<<EOT
Display of this ad <span style="font-weight:normal">(on your site)</span> {$what_to} OK!
EOT;

    // =========================================================================
    // Update the "Available Ads" dataset...
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
            $available_ad_records                                    ,
            $question_die_on_error                                      ,
            $datasets_array_storage_details['array_storage_data']
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $ok ) ) {
        fatal_error( $ok ) ;
        return ;
    }

    // =========================================================================
    // Go back to either the specified page, or the page we came from...
    // =========================================================================

    if (    array_key_exists( 'return_to' , $_GET )
            &&
            trim( $_GET['return_to'] ) !== ''
            &&
            ctype_xdigit( $_GET['return_to'] )
        ) {

        // ---------------------------------------------------------------------

//http://localhost/plugdev/wp-admin/admin.php?
//  page=pluginPlant                        &
//  action=edit-record                      &
//  application=ad-swapper                  &
//  dataset_slug=ad_swapper_available_ads   &
//  record_key=7022de2f-e41a-4cb7-8507-426317066fe1-1446879699-508095-5135

        // ---------------------------------------------------------------------

        require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/string-utils.php' ) ;

        // ---------------------------------------------------------------------

        $url =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\hex_decode(
                $_GET['return_to']
                ) ;

        // ---------------------------------------------------------------------

        require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/url-utils.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\
        // is_url(
        //      $candidate_url
        //      )
        // - - - - - - - - - -
        // Returns a flag indicating whether or not the specified string looks
        // like an ABSOLUTE URL.
        //
        // NOTE!
        // =====
        // This routine is a wrapper around:-
        //      absolute_url_string__minLen_maxLen_questionEmptyOK()
        //
        // Use the wrapped routine if you want more control.
        //
        // RETURNS
        //      TRUE or FALSE
        // -------------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\is_url(
                $url
                ) ;

        // ---------------------------------------------------------------------

        if ( $result !== TRUE ) {
            fatal_error( 'Bad "return_to"' ) ;
            return ;
        }

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        require_once( $core_plugapp_dirs['dataset_manager_includes_dir'] . '/get-dataset-urls.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_manage_dataset_url(
        //      $caller_apps_includes_dir   ,
        //      $question_front_end         ,
        //      $dataset_slug = NULL
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Returns the "manage-dataset" URL.
        //
        // If $dataset_slug is NULL, then we use:-
        //      $_GET['dataset_slug']
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

        $question_front_end = FALSE ;

        // ---------------------------------------------------------------------

        $_GET['application'] = 'ad-swapper' ;

        // ---------------------------------------------------------------------

        $url =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_manage_dataset_url(
                $core_plugapp_dirs['plugins_includes_dir']          ,
                $question_front_end                                 ,
                $datasets_array_storage_details['dataset_slug']
                ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $url ) ) {
            fatal_error( $url[0] ) ;
            return ;
        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    echo <<<EOT
<br />
<br />

<p style="font-weight:bold">{$what}</p>

<p style="font-style:italic">Click "Manage Available Ads" (above), to continue...</p>

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
    toggle_available_ad(
        $greatKiwi_byFernTec_adSwapper_local_v0x1x211_plugin_root_dir
        ) ;

// =============================================================================
// That's that!
// =============================================================================

