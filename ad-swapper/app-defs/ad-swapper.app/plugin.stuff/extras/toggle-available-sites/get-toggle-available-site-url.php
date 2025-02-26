<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / EXTRAS / TOGGLE-AVAILABLE-SITES /
//      GET-TOGGLE-AVAILABLE-SITE-URL.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_toggleAvailableSites ;

// =============================================================================
// get_toggle_available_site_url()
// =============================================================================

function get_toggle_available_site_url(
    $core_plugapp_dirs      ,
    $site_record            ,
    $direction
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_toggleAvailableSites\
    // get_toggle_available_site_url(
    //      $core_plugapp_dirs      ,
    //      $site_record            ,
    //      $direction
    //      )
    // - - - - - - - - - - - - - - -
    // //   $direction is one of:  "theirs-on-yours"  "yours-on-theirs"
    // $direction is one of:  "this-on-plugin"  "plugin-on-this"
    //
    // RETURNS
    //      On SUCCESS
    //          $toggle_available_site_url STRING
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $site_record = Array(
    //          [created_server_datetime_utc]                  => 1421545408
    //          [last_modified_server_datetime_utc]            => 1421545408
    //          [key]                                          => 10906d4d-6d60-4e39-b201-9bf2b52f4347-1421545408-370125-1421
    //          [ad_swapper_site_sid]                          => 2kcv-gwhz
    //          [site_title]                                   => Plugdev
    //          [home_page_url]                                => http://localhost/plugdev
    //          [general_description]                          =>
    //          [ads_wanted_description]                       =>
    //          [sites_wanted_description]                     =>
    //          [categories_available]                         =>
    //          [categories_wanted]                            =>
    //          [question_display_this_sites_ads_on_your_site] => 1
    //          [question_display_your_ads_on_this_site]       => 1
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $site_record ) ;

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // $direction ?
    // =========================================================================

//  if (    $direction !== 'theirs-on-yours'
//          &&
//          $direction !== 'yours-on-theirs'
//      ) {
    if (    $direction !== 'this-on-plugin'
            &&
            $direction !== 'plugin-on-this'
        ) {

//PROBLEM:&nbsp; Bad "direction" (one of "theirs-on-yours", "yours-on-theirs" expected) (#1)

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "direction" (one of "this-on-plugin", "plugin-on-this" expected) (#1)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        return array( $msg ) ;

    }

    // =========================================================================
    // Get a "Form Secret"...
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/form-secrets.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_formSecrets\
    // get_new_form_secret(
    //      $form_name                  ,
    //      $instance_data_or_hash
    //      )
    // - - - - - - - - - - - - - - - - -
    // A "form secret" is a 128 character random hex string.  That's unique to
    // the supplied:-
    //      o   $form_name
    //      o   $instance_data_or_hash
    // and;
    //      o   $_SERVER['REMOTE_ADDR']
    //      o   $_SERVER['HTTP_USER_AGENT']
    //
    // A copy of the form secret and the above details is kept in a record
    // in the "Form Secrets" dataset.  The form secret should be included in
    // the GET/POST data when the form is submitted.  The submission is then
    // only accepted if a "Form Secrets" record with the matching details
    // exists.
    //
    // RETURNS
    //      On SUCCESS
    //          $form_secret STRING
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    $form_name = 'toggle-available-site' ;

    $instance_data_or_hash =
        $site_record['ad_swapper_site_sid'] . '-' . $direction
        ;

    // -------------------------------------------------------------------------

    $form_secret =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_formSecrets\get_new_form_secret(
            $form_name                  ,
            $instance_data_or_hash
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $form_secret ) ) {
        return $form_secret ;
    }

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
        return array( $other_site_specific_settings_records ) ;
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

        if ( $this_record['ad_swapper_site_sid'] === $site_record['ad_swapper_site_sid'] ) {

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
        //      =>  Get the settings from the blank, default record...
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
            return array( $site_specific_settings_record ) ;
        }

        // ---------------------------------------------------------------------

        $site_specific_settings_record['ad_swapper_site_sid'] = $site_record['ad_swapper_site_sid'] ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Construct the URL...
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/path-utils.php' ) ;

//  // -------------------------------------------------------------------------
//  // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pathUtils\
//  // wp_path2url(
//  //      $path
//  //      )
//  // - - - - - -
//  // RETURNS:-
//  //      o   $url on SUCCESS
//  //      o   array( $error_message ) on FAILURE
//  // -------------------------------------------------------------------------
//
//  $target_filespec = dirname( __FILE__ ) . '/toggle-available-site.php' ;
//
//  // -------------------------------------------------------------------------
//
//  $url =
//      \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pathUtils\wp_path2url(
//          $target_filespec
//          ) ;
//
//  // -------------------------------------------------------------------------
//
//  if ( is_array( $url ) ) {
//      return $url ;
//  }

    // -------------------------------------------------------------------------

    $url = \admin_url( 'admin-ajax.php' ) ;

    // -------------------------------------------------------------------------

//  if ( $direction === 'theirs-on-yours' ) {
    if ( $direction === 'this-on-plugin' ) {

        if ( $site_specific_settings_record['question_display_this_sites_ads_on_your_site'] ) {
            $to = 'false' ;
        } else {
            $to = 'true' ;
        }

//  } elseif ( $direction === 'yours-on-theirs' ) {
    } elseif ( $direction === 'plugin-on-this' ) {

        if ( $site_specific_settings_record['question_display_your_ads_on_this_site'] ) {
            $to = 'false' ;
        } else {
            $to = 'true' ;
        }

    } else {

//PROBLEM:&nbsp; Bad "direction" (one of "theirs-on-yours", "yours-on-theirs" expected) (#2)

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "direction" (one of "this-on-plugin", "plugin-on-this" expected) (#2)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        return array( $msg ) ;

    }

    // -------------------------------------------------------------------------

    $url .= <<<EOT
?action=greatKiwi_byFerntec_toggleAvailableSites&siteid={$site_record['ad_swapper_site_sid']}&direction={$direction}&to={$to}&secret={$form_secret}
EOT;

    // =========================================================================
    // SUCCESS
    // =========================================================================

    return $url ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

