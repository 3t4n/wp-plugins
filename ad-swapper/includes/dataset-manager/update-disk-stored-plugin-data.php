<?php

// *****************************************************************************
// DATASET-MANAGER / UPDATE-DISK-STORED-PLUGIN-DATA.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// update_disk_stored_plugin_data()
// =============================================================================

function update_disk_stored_plugin_data(
    $app_handle             ,
    $question_front_end
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // update_disk_stored_plugin_data(
    //      $app_handle             ,
    //      $question_front_end
    //      )
    // - - - - - - - - - - - - - - - -
    // Updates the specified app's datasets - whether they're stored in
    // "array-storage" or a MySql database.
    //
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //          --OR--
    //          $manual_update_html STRING
    //          ($manual_update_html will be a non-empty string, only if at
    //          least one dataset was to be manually updated.)
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

//  // =========================================================================
//  // If there's NO:-
//  //      \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
//  //      get_database_update_method()
//  //
//  // function, then we DON'T try to update the database.
//  // =========================================================================
//
//  if (    ! function_exists(
//              '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_database_update_method'
//              )
//      ) {
//      return TRUE ;
//  }

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Do the PAGE STARTUP stuff...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/page-startup-stuff.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_page_startup_stuff(
    //      $app_handle             ,
    //      $question_front_end
    //      )
    // - - - - - - - - - - - - - - -
    // Gets and returns the application's core plugapp dirs and dataset
    // definitions and datasets.
    //
    // You can call this routine at the start of some PHP page that's called
    // directly - by some url like (eg):-
    //      http://www.example.com/path/to/some-php-file.php
    //
    // Then you have all the info. needed to:-
    //      o   Access the plugin's includes files and scripts, etc.
    //      o   Read/write the plugin's datasets.
    //
    // NOTES!
    // ------
    // 1.   $app_handle is the application's dash-separated, lowercase
    //      name.  Eg:-
    //          "gadgets"
    //          "picture-docs"
    //          "teaser-maker"
    //
    // 2.   $question_front_end should be TRUE or FALSE
    //
    // RETURNS:-
    //
    //      On FAILURE
    //          $error_message STRING
    //
    //      On SUCCESS
    //          array(
    //              $core_plugapp_dirs                              ,
    //              $app_defs_directory_tree                        ,
    //              $applications_dataset_and_view_definitions_etc  ,
    //              $all_application_dataset_definitions            ,
    //              $loaded_datasets
    //              )
    //
    // Where:-
    //
    //      $core_plugapp_dirs = array(
    //          'plugin_root_dir'               =>  '/opt/lampp/htdocs/.../wp-content/plugins/research-assistant'
    //          'plugins_includes_dir'          =>  '/opt/lampp/htdocs/.../wp-content/plugins/research-assistant/includes'
    //          'plugins_apps_defs_dir'         =>  '/opt/lampp/htdocs/.../wp-content/plugins/research-assistant/app-defs'
    //          'dataset_manager_includes_dir'  =>  '/opt/lampp/htdocs/.../wp-content/plugins/research-assistant/includes/dataset-manager'
    //          'apps_dot_app_dir'              =>  '/opt/lampp/htdocs/.../wp-content/plugins/research-assistant/app-defs/basepress-logger.app'
    //          'apps_plugin_stuff_dir'         =>  '/opt/lampp/htdocs/.../wp-content/plugins/basepress-logger-v0.1/app-defs/basepress-logger.app/plugin.stuff'
    //          )
    //
    //      $loaded_datasets = Array(
    //
    //          [gadgets] => Array(
    //
    //              [title]                 => Gadgets
    //
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_UTC]       => 1402881712
    //                      [last_modified_server_datetime_UTC] => 1402903717
    //                      [author_key]                        =>
    //                      [version_key]                       =>
    //                      [theme_key]                         =>
    //                      [key]                               => fd2958ca-bc52-4015-b6d3-02ce079b0b2f-1402881712-453134-243
    //                      [title]                             => Spaced List Item
    //                      [enabled]                           => 1
    //                      [temporarily_disabled]              =>
    //                      [synopsis]                          => PHAgY4uPC9kaXY+
    //                      [synopsis_format]                   => nl2br
    //                      [description]                       => SW5kZGVtKS4=
    //                      [description_format]                => none
    //                      [docs_url]                          =>
    //                      [screenshot_url]                    => http://localhost/plugdev/wp-content/uploads/2014/06/gadget-screenshot-spaced-list-item.jpeg
    //                      [html_4_head_start]                 =>
    //                      [html_4_head_end]                   =>
    //                      [html_4_body_start]                 =>
    //                      [html_4_body_end]                   =>
    //                      [css_4_head_start]                  =>
    //                      [css_4_head_end]                    => LnNwYWNlZC1sawOw0KfQ==
    //                      [js_4_head_start]                   =>
    //                      [js_4_head_end]                     =>
    //                      [js_4_body_start]                   =>
    //                      [js_4_body_end]                     =>
    //                      )
    //
    //                  ...
    //
    //                  )
    //
    //              [key_field_slug]        => key
    //
    //              [record_indices_by_key] => Array(
    //                  [fd2958ca-bc52-4015-b6d3-02ce079b0b2f-1402881712-453134-243] => 0
    //                  )
    //
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

    $result =
        get_page_startup_stuff(
            $app_handle             ,
            $question_front_end
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return array( $result ) ;
    }

    // -------------------------------------------------------------------------

    list(
        $core_plugapp_dirs                              ,
        $app_defs_directory_tree                        ,
        $applications_dataset_and_view_definitions_etc  ,
        $all_application_dataset_definitions            ,
        $loaded_datasets
        ) = $result ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $app_defs_directory_tree    ,
//    '$app_defs_directory_tree'
//    ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $applications_dataset_and_view_definitions_etc      ,
//    '$applications_dataset_and_view_definitions_etc'
//    ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $all_application_dataset_definitions        ,
//    '$all_application_dataset_definitions'
//    ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $core_plugapp_dirs = Array(
    //          [plugin_root_dir]               => /opt/../plugin-plant
    //          [plugins_includes_dir]          => /opt/../plugin-plant/includes
    //          [plugins_app_defs_dir]          => /opt/../plugin-plant/app-defs
    //          [dataset_manager_includes_dir]  => /opt/../plugin-plant/includes/dataset-manager
    //          [apps_dot_app_dir]              => /opt/../plugin-plant/app-defs/ad-swapper.app
    //          [apps_plugin_stuff_dir]         => /opt/../plugin-plant/app-defs/ad-swapper.app/plugin.stuff
    //          [custom_pages_dir]              => /opt/../plugin-plant/app-defs/ad-swapper.app/plugin.stuff/custom.pages
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $core_plugapp_dirs , '$core_plugapp_dirs' ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      array_keys( $loaded_datasets ) = Array(
    //           [0] => ad_swapper_ad_impressions
    //           [1] => ad_swapper_ad_slots
    //           [2] => ad_swapper_ads_outgoing
    //           [3] => ad_swapper_available_ads
    //           [4] => ad_swapper_available_selected_and_approved_web_site_collections
    //           [5] => ad_swapper_available_sites
    //           [6] => ad_swapper_other_site_specific_settings
    //           [7] => ad_swapper_page_requests
    //           [8] => ad_swapper_plugin_settings
    //           [9] => ad_swapper_site_profile
    //          [10] => ad_swapper_this_sites_web_site_collection_members
    //          [11] => ad_swapper_web_site_collections
    //          [12] => ad_swapper_widget_settings
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $loaded_datasets , '$loaded_datasets' ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    array_keys( $loaded_datasets )      ,
//    'array_keys( $loaded_datasets )'
//    ) ;

    // =========================================================================
    // Get the (DEFAULT) DATABASE UPDATE METHOD to use (along with the
    // dataset-specific OVERRIDES)...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_database_update_method(
    //      $core_plugapp_dirs                              ,
    //      $app_defs_directory_tree                        ,
    //      $applications_dataset_and_view_definitions_etc  ,
    //      $all_application_dataset_definitions            ,
    //      $loaded_datasets
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns:-
    //      o   The application/plugin's DEFAULT database update method, and;
    //      o   Any dataset-specific OVERRIDES.
    //
    // NOTE!
    // =====
    // This routine is APP/PLUGIN specific.  It's defined in the
    // app/plugin's "plugin.stuff" dir.
    //
    // RETURNS
    //      On SUCCESS
    //          array(
    //              $default_database_update_method STRING
    //              One of:-
    //                  "none"
    //                  "manual"
    //                  "auto"
    //              ,
    //              NULL
    //              --OR--
    //              $dataset_specfic_update_method_overrides
    //              )
    //
    //          Where $dataset_specfic_update_method_overrides is like (eg):-
    //              array(
    //                  'dataset_slug_1'    =>  "none" || "manual" || "auto"    ,
    //                  'dataset_slug_2'    =>  "none" || "manual" || "auto"    ,
    //                  ...
    //                  )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $result =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_database_update_method(
            $core_plugapp_dirs                              ,
            $app_defs_directory_tree                        ,
            $applications_dataset_and_view_definitions_etc  ,
            $all_application_dataset_definitions            ,
            $loaded_datasets
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return array( $result ) ;
    }

    // -------------------------------------------------------------------------

    list(
        $default_database_update_method             ,
        $dataset_specfic_update_method_overrides
        ) = $result ;

    // =========================================================================
    // If:-
    //      $default_database_update_method
    //
    // is "none", then we're done.
    // =========================================================================

    if (    $default_database_update_method === 'none'
            &&
            (   ! is_array( $dataset_specfic_update_method_overrides )
                ||
                count( $dataset_specfic_update_method_overrides ) < 1
                )
        ) {
        return TRUE ;
    }

    // =========================================================================
    // Validate $default_database_update_method...
    // =========================================================================

    if (    ! in_array(
                $default_database_update_method         ,
                array( 'none' , 'manual' , 'auto' )     ,
                TRUE
                )
        ) {

        $ln = __LINE__ - 5 ;

        $safe_default_database_update_method = htmlentities( $default_database_update_method ) ;

        $msg = <<<EOT
PROBLEM:&nbsp; Unrecognised/unsupported "default_database_update_method" ("{$safe_default_database_update_method}")
Detected in:&nbsp; \\{$ns}\\{$fn} near line {$ln}
EOT;

        return array( $msg ) ;

    }

    // =========================================================================
    // Get the application's LAST CHECKED DATASET DETAILS...
    // =========================================================================

    $option_name =
        str_replace( '-' , '_' , $app_handle ) .
        '_last_checked_dataset_details'
        ;

    // -------------------------------------------------------------------------

    $last_checked_dataset_details =
        get_option( $option_name ) ;
            //  Returns the current value for the specified option.  If the
            //  option does not exist, returns parameter $default if specified
            //  or boolean FALSE by default.

    // -------------------------------------------------------------------------

    if ( $last_checked_dataset_details === FALSE ) {
        $last_checked_dataset_details = array() ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $last_checked_dataset_details = Array(
    //
    //          [array_stored_test_dataset_one] => Array(
    //              [filesize]  => 38034
    //              [filemtime] => 1448246041
    //              [sha1_file] => c6d81d27d2f4986cca70263f9505d11a0d673be0
    //              )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $last_checked_dataset_details , '$last_checked_dataset_details' ) ;

    // =========================================================================
    // Work over the loaded datasets, getting the definition filespec (and
    // related details), for each one in turn...
    // =========================================================================

    $main_page_html = '' ;

    $distinct_value_summary_pages_html = '' ;

    $record_listing_pages_html = '' ;

    // -------------------------------------------------------------------------

    $get_new_field_function_error_html = '' ;

    $get_new_field_function_error_token = '[*GET*NEW_FIELD*FUNCTION*ERROR*]' ;

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/string-utils.php' ) ;

    // -------------------------------------------------------------------------

    $number_auto_updates_required_and_successfully_completed = 0 ;

    $number_auto_updates_required_but_NOT_done = 0 ;

    $dataset_auto_update_failure_slugs = array() ;

    // -------------------------------------------------------------------------

    foreach ( $loaded_datasets as $dataset_slug => $datasets_details ) {

        // =====================================================================
        // Get the update method for this dataset...
        // =====================================================================

        $this_dataset_update_method = $default_database_update_method ;
            //  "none", "manual" or "auto"

        // ---------------------------------------------------------------------

        if (    is_array( $dataset_specfic_update_method_overrides )
                &&
                array_key_exists(
                    $dataset_slug                               ,
                    $dataset_specfic_update_method_overrides
                    )
            ) {

            // -----------------------------------------------------------------

            $this_dataset_update_method =
                $dataset_specfic_update_method_overrides[ $dataset_slug ]
                ;
                //  "none", "manual" or "auto" (we hope)

            // -----------------------------------------------------------------

            if ( $this_dataset_update_method === 'none' ) {
                continue ;
                    //  DON'T update this dataset!
            }

            // -----------------------------------------------------------------

            if (    ! in_array(
                        $this_dataset_update_method     ,
                        array( 'manual' , 'auto' )      ,
                        TRUE
                        )
                ) {

                $ln = __LINE__ - 5 ;

                $safe_dataset_specific_update_method = htmlentities( $this_dataset_update_method ) ;

                $msg = <<<EOT
PROBLEM:&nbsp; Unrecognised/unsupported "dataset_specific_update_method" ("{$safe_dataset_specific_update_method}")
For dataset:&nbsp; {$dataset_slug}
Detected in:&nbsp; \\{$ns}\\{$fn} near line {$ln}
EOT;

                return array( $msg ) ;

            }

            // -----------------------------------------------------------------

        }

//echo '<br />' , $dataset_slug , ' --- ' , $this_dataset_update_method ;

        // =====================================================================
        // Get the file's filespec (and other required details)...
        // =====================================================================

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_dataset_definition_file_details(
        //      $core_plugapp_dirs      ,
        //      $dataset_slug
        //      )
        // - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      On SUCCESS
        //          array(
        //              $dd_filespec    ,
        //              $filesize       ,
        //              $filemtime      ,
        //              $sha1_file
        //              )
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        $result = get_dataset_definition_file_details(
                        $core_plugapp_dirs      ,
                        $dataset_slug
                        ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return array( $result ) ;
        }

        // ---------------------------------------------------------------------

        list(
            $dd_filespec    ,
            $filesize       ,
            $filemtime      ,
            $sha1_file
            ) = $result ;

        // =====================================================================
        // Has the file changed ?
        //
        // If NOT, skip to next file (if there is one).
        // =====================================================================

        if (    array_key_exists(
                    $dataset_slug                       ,
                    $last_checked_dataset_details
                    )
                &&
                $filesize === $last_checked_dataset_details[ $dataset_slug ]['filesize']
                &&
                $filemtime === $last_checked_dataset_details[ $dataset_slug ]['filemtime']
                &&
                $sha1_file === $last_checked_dataset_details[ $dataset_slug ]['sha1_file']
            ) {
            continue ;
                //  File HASN'T changed (since last time it was checked)
        }

        // =====================================================================
        // Get the dataset's definition...
        // =====================================================================

        $selected_datasets_dmdd =
            $all_application_dataset_definitions[ $dataset_slug ]
            ;

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $selected_datasets_dmdd = Array(
        //          [dataset_slug]                      =>  ad_swapper_widget_settings
        //          [dataset_name_singular]             =>  ad_swapper_widget_settings
        //          [dataset_name_plural]               =>  ad_swapper_widget_settings
        //          [dataset_title_singular]            =>  Widget Settings
        //          [dataset_title_plural]              =>  Widget Settings
        //          [basepress_dataset_handle]          =>  Array(
        //              [nice_name]  => adSwapper_byFernTec_widgetSettings
        //              [unique_key] => f0161266-1bdf-4c...2684795fd
        //              [version]    => 0.1
        //              )
        //          [dataset_records_table]             =>
        //          [zebra_forms]                       =>  Array(
        //                                                      [default] =>
        //                                                      )
        //          [array_storage_record_structure]    =>  Array(
        //              [0] => Array(
        //                          [slug]                      => created_server_datetime_utc
        //                          [array_storage_value_from]  => Array (
        //                              [add] => Array(
        //                                          [method] => created-server-datetime-utc
        //                                          )
        //                              [edit] => Array(
        //                                          [method] => dont-change
        //                                          )
        //                              )
        //                          [constraints]               => Array(
        //                              [0] => Array(
        //                                          [method] => unix-timestamp
        //                                          )
        //                              )
        //                          )
        //              ...
        //              )
        //          [array_storage_key_field_slug]      =>  key
        //          [custom_actions]                    =>  Array()
        //          [storage_method]                    =>  "mysql" or "array-storage"
        //          [mysql_overrides]                   =>  array(
        //              [array_storage_key_field_slug]                      =>  'ad_swapper_site_sid'   ,
        //              [fail_link_creation_silently_on_empty_record_key]   =>  TRUE                    ,
        //              [missing_fields]                                    =>  array(
        //                                                                          'key'
        //                                                                          )                   ,
        //              [extra_fields]                                      =>  array(
        //                                                                          'id'
        //                                                                          )
        //              )
        //          )
        //
        // ---------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $selected_datasets_dmdd         ,
//    '$selected_datasets_dmdd'
//    ) ;

        // =====================================================================
        // Check to see if this disk-stored dataset's STRUCTURE is out-of-date.
        // And if so, UPDATE it...
        // =====================================================================

        $storage_method = 'array-storage' ;

        // ---------------------------------------------------------------------

        if ( array_key_exists( 'storage_method' , $selected_datasets_dmdd ) ) {
            $storage_method = $selected_datasets_dmdd['storage_method'] ;
        }

        // ---------------------------------------------------------------------

        if ( $storage_method === 'array-storage' ) {

            // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
            // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
            // ARRAY STORED DATASET DATA
            // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
            // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

            require_once( dirname( __FILE__ ) . '/update-array-stored-dataset-data.php' ) ;

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
            // update_array_stored_dataset_data(
            //      $core_plugapp_dirs              ,
            //      &$loaded_datasets               ,
            //      $dataset_slug                   ,
            //      $selected_datasets_dmdd         ,
            //      $this_dataset_update_method
            //      )
            // - - - - - - - - - - - - - - - - - - -
            // This routine is called - when the application/plugin first starts -
            // if the:-
            //      "xxx.app/yyy.dd.php"
            //
            // file (in which the dataset is defined) - has been changed since the
            // last time this routine was run.
            //
            // ---
            //
            // This routine then checks to see whether the dataset structure defined
            // in the dataset definition file:-
            //      "xxx.app/yyy.dd.php"
            //
            // matches the structure in the stored $dataset_records.  And if NOT,
            // updates the stored dataset records as specified by:-
            //      $this_dataset_update_method
            //
            // ---
            //
            // $this_dataset_update_method is "auto" or "manual".
            //
            // RETURNS
            //      On SUCCESS
            //          TRUE  - If "auto" update required AND successfully
            //                  completed.
            //          --OR--
            //          FALSE - If "auto" update required BUT NOT done.
            //          --OR--
            //          NULL  - NO database updating is required (for this
            //                  dataset) - AND - "updaction_finished" was set
            //                  (for this dataset).
            //          --OR--
            //          array(
            //              $manual_approval_page_html__4_dataset    STRING     ,
            //              $distinct_value_summary_pages__4_dataset STRING     ,
            //              $record_listing_pages__4_dataset         STRING
            //              ) ARRAY
            //              NOTE!   All the above strings will be EMPTY, if the dataset
            //                      required NO "manual" updates.
            //
            //      On FAILURE
            //          $error_message STRING
            // -------------------------------------------------------------------------

            $result = update_array_stored_dataset_data(
                            $core_plugapp_dirs          ,
                            $loaded_datasets            ,
                            $dataset_slug               ,
                            $selected_datasets_dmdd     ,
                            $this_dataset_update_method
                            ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {

                // -------------------------------------------------------------

                if (    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\starts_with(
                            $result                                 ,
                            $get_new_field_function_error_token
                            )
                    ) {

                    $get_new_field_function_error_html .=
                        substr( $result , strlen( $get_new_field_function_error_token ) )
                        ;

                    continue ;

                } else {

                    return array( $result ) ;

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            if (    $result === TRUE
                    ||
                    $result === NULL
                ) {

                // -------------------------------------------------------------
                // Dataset Updated OK!
                //
                //      =>  Update this datase's
                //              "last checked dataset details"...
                // -------------------------------------------------------------

                $last_checked_dataset_details[ $dataset_slug ] = array(
                    'filesize'  =>  $filesize       ,
                    'filemtime' =>  $filemtime      ,
                    'sha1_file' =>  $sha1_file
                    ) ;

                // -------------------------------------------------------------------------
                // update_option( $option, $new_value, $autoload )
                // - - - - - - - - - - - - - - - - - - - - - - - -
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
                //      $newvalue
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

                $update_result = update_option(
                                    $option_name                    ,
                                    $last_checked_dataset_details
                                    ) ;

                // -------------------------------------------------------------

                if ( $update_result !== TRUE ) {

                    $ln = __LINE__ - 2 ;

                    $safe_dataset_slug = htmlentities( $dataset_slug ) ;

                    $msg = <<<EOT
PROBLEM:&nbsp; "set_option()" failure updating db update details
For dataset:&nbsp; {$safe_dataset_slug}
Detected in:&nbsp; \\{$ns}\\{$fn} near line {$ln}
EOT;

                    return array( $msg ) ;

                }

                // -------------------------------------------------------------

            }

            // ------------------------------------------------------------------

            if ( $result === TRUE ) {

                // -------------------------------------------------------------
                // Database auto-updated OK...
                // -------------------------------------------------------------

                $number_auto_updates_required_and_successfully_completed++ ;

                // -------------------------------------------------------------

            } elseif ( $result === FALSE ) {

                // -------------------------------------------------------------
                // Update required, but NOT done :(
                // -------------------------------------------------------------

                $number_auto_updates_required_but_NOT_done++ ;

                $dataset_auto_update_failure_slugs[] = $dataset_slug ;

                // -------------------------------------------------------------

            } elseif ( $result === NULL ) {

                // -------------------------------------------------------------
                // "last checked dataset details" updated OK!
                //
                //      =>  Skip to next dataset (if there is one)...
                // -------------------------------------------------------------

                continue ;

                // -------------------------------------------------------------

            } else {

                // -------------------------------------------------------------
                // Manual update required...
                // -------------------------------------------------------------

                list(
                    $manual_approval_page_html__4_dataset       ,
                    $distinct_value_summary_pages__4_dataset    ,
                    $record_listing_pages__4_dataset
                    ) = $result ;

                // -------------------------------------------------------------

                $main_page_html .= $manual_approval_page_html__4_dataset ;

                $distinct_value_summary_pages_html .= $distinct_value_summary_pages__4_dataset ;

                $record_listing_pages_html .= $record_listing_pages__4_dataset ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        } elseif ( $storage_method === 'mysql' ) {

            // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
            // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
            // MYSQL STORED DATASET DATA
            // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
            // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

            require_once( dirname( __FILE__ ) . '/update-mysql-stored-dataset-data.php' ) ;

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
            // update_mysql_stored_dataset_data(
            //      $core_plugapp_dirs              ,
            //      $question_front_end             ,
            //      $dataset_slug                   ,
            //      $selected_datasets_dmdd         ,
            //      $this_dataset_update_method
            //      )
            // - - - - - - - - - - - - - - - - - - -
            // This routine is called - when the application/plugin first starts -
            // if the:-
            //      "xxx.app/yyy.dd.php"
            //
            // file (in which the dataset is defined) - has been changed since the
            // last time this routine was run.
            //
            // ---
            //
            // This routine then checks to see whether the dataset structure defined
            // in the dataset definition file:-
            //      "xxx.app/yyy.dd.php"
            //
            // matches the structure in the stored MySQL table.  And if NOT,
            // updates the stored MySQL table as specified by:-
            //      $this_dataset_update_method
            //
            // ---
            //
            // $this_dataset_update_method is "auto" or "manual".
            //
            // RETURNS
            //      On SUCCESS
            //          TRUE  - If "auto" update required AND successfully
            //                  completed.
            //          --OR--
            //          FALSE - If "auto" update required BUT NOT done.
            //          --OR--
            //          NULL  - NO database updating is required (for this
            //                  dataset) - AND - "updaction_finished" was set
            //                  (for this dataset).
            //          --OR--
            //          array(
            //              $manual_approval_page_html__4_dataset    STRING     ,
            //              $distinct_value_summary_pages__4_dataset STRING     ,
            //              $record_listing_pages__4_dataset         STRING
            //              ) ARRAY
            //              NOTE!   All the above strings will be EMPTY, if the MySQL
            //                      table required NO ("auto" or "manual") updates.
            //
            //      On FAILURE
            //          $error_message STRING
            // -------------------------------------------------------------------------

            $result = update_mysql_stored_dataset_data(
                            $core_plugapp_dirs          ,
                            $loaded_datasets            ,
                            $dataset_slug               ,
                            $selected_datasets_dmdd     ,
                            $this_dataset_update_method
                            ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {

                // -------------------------------------------------------------

                if (    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\starts_with(
                            $result                                 ,
                            $get_new_field_function_error_token
                            )
                    ) {

                    $get_new_field_function_error_html .=
                        substr( $result , strlen( $get_new_field_function_error_token ) )
                        ;

                    continue ;

                } else {

                    return array( $result ) ;

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            if (    $result === TRUE
                    ||
                    $result === NULL
                ) {

                // -------------------------------------------------------------
                // Dataset Updated OK!
                //
                //      =>  Update this datase's
                //              "last checked dataset details"...
                // -------------------------------------------------------------

                $last_checked_dataset_details[ $dataset_slug ] = array(
                    'filesize'  =>  $filesize       ,
                    'filemtime' =>  $filemtime      ,
                    'sha1_file' =>  $sha1_file
                    ) ;

                // -------------------------------------------------------------------------
                // update_option( $option, $new_value, $autoload )
                // - - - - - - - - - - - - - - - - - - - - - - - -
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
                //      $newvalue
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

                $update_result = update_option(
                                    $option_name                    ,
                                    $last_checked_dataset_details
                                    ) ;

                // -------------------------------------------------------------

                if ( $update_result !== TRUE ) {

                    $ln = __LINE__ - 2 ;

                    $safe_dataset_slug = htmlentities( $dataset_slug ) ;

                    $msg = <<<EOT
PROBLEM:&nbsp; "set_option()" failure updating db update details
For dataset:&nbsp; {$safe_dataset_slug}
Detected in:&nbsp; \\{$ns}\\{$fn} near line {$ln}
EOT;

                    return array( $msg ) ;

                }

                // -------------------------------------------------------------

            }

            // ------------------------------------------------------------------

            if ( $result === TRUE ) {

                // -------------------------------------------------------------
                // Database auto-updated OK...
                // -------------------------------------------------------------

                $number_auto_updates_required_and_successfully_completed++ ;

                // -------------------------------------------------------------

            } elseif ( $result === FALSE ) {

                // -------------------------------------------------------------
                // Update required, but NOT done :(
                // -------------------------------------------------------------

                $number_auto_updates_required_but_NOT_done++ ;

                $dataset_auto_update_failure_slugs[] = $dataset_slug ;

                // -------------------------------------------------------------

            } elseif ( $result === NULL ) {

                // -------------------------------------------------------------
                // "last checked dataset details" updated OK!
                //
                //      =>  Skip to next dataset (if there is one)...
                // -------------------------------------------------------------

                continue ;

                // -------------------------------------------------------------

            } else {

                // -------------------------------------------------------------
                // Manual update required...
                // -------------------------------------------------------------

                list(
                    $manual_approval_page_html__4_dataset       ,
                    $distinct_value_summary_pages__4_dataset    ,
                    $record_listing_pages__4_dataset
                    ) = $result ;

                // -------------------------------------------------------------

                $main_page_html .= $manual_approval_page_html__4_dataset ;

                $distinct_value_summary_pages_html .= $distinct_value_summary_pages__4_dataset ;

                $record_listing_pages_html .= $record_listing_pages__4_dataset ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------
            // ERROR
            // -----------------------------------------------------------------

            $ln = __LINE__ - 4 ;

            $msg = <<<EOT
PROBLEM:&nbsp; Unrecognised/unsupported "storage_method" for dataset "{$dataset_slug}"
Detected in:&nbsp; \\{$ns}\\{$fn} near line {$ln}
EOT;

            return array( $msg ) ;

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // Repeat with the NEXT dataset definition FILE (if there is one)...
        // =====================================================================

    }

    // =========================================================================
    // Any "get new field function" errors ?
    // =========================================================================

    if ( $get_new_field_function_error_html !== '' ) {
        return array( $get_new_field_function_error_html ) ;
    }

    // =========================================================================
    // ANY SUCCESSFUL AUTO-UPDATES ?
    // =========================================================================

    if ( $number_auto_updates_required_and_successfully_completed > 0 ) {

        // ---------------------------------------------------------------------
        // One or more datasets has been successfully auto-updated.  So we
        // reload this current page (to get the the latest database update
        // situation).
        // ---------------------------------------------------------------------

        require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/url-utils.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\
        // get_current_page_url(
        //      $question_die_on_error = FALSE
        //      )
        // - - - - - - - - - - - - - - - - - -
        // Attempts to retrieve the current page URL from $_SERVER.  Returns
        // (eg):-
        //      http://www.example.com/path/to/some-file.php
        //
        // In other words, the returned URL will general include ALL the URL
        // components (SCHEME, HOST, PORT, PATH, QUERY and FRAGMENT).  However,
        // only those components present in the calling URL will be returned.
        //
        // RETURNS
        //      o   On SUCCESS!
        //          -----------
        //          $current_page_url STRING
        //
        //      o   On FAILURE!
        //          -----------
        //          If $question_die_on_error = TRUE
        //              Doesn't return
        //          If $question_die_on_error = FALSE
        //              array( $error_message STRING )
        // -------------------------------------------------------------------------

        $question_die_on_error = FALSE ;

        // ---------------------------------------------------------------------

        $url =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\get_current_page_url(
                $question_die_on_error
                ) ;

        // ---------------------------------------------------------------------

        $reload_current_page = <<<EOT
<script type="text/javascript">
    location.href="{$url}" ;
</script>
EOT;

        // ---------------------------------------------------------------------

        die( $reload_current_page ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // ANY MANUAL UPDATES REQUIRED ?
    // =========================================================================

    if ( $main_page_html !== '' ) {

        // ---------------------------------------------------------------------

        $h1_style = <<<EOT
margin-top:1em; margin-bottom:-0.7em; text-align:center; line-height:133%
EOT;

        // ---------------------------------------------------------------------

        $js = <<<EOT
<script type="text/javascript">
    window.last_displayed_distinct_values_summary_id = '' ;
    window.last_displayed_records_listing_id         = '' ;
    function show_distinct_values( id ) {
        document.getElementById( 'database-updates-main-page-html' ).style.display = 'none' ;
        document.getElementById( id ).style.display = '' ;
        window.last_displayed_distinct_values_summary_id = id ;
    }
    function back_to_main_page() {
        document.getElementById( window.last_displayed_distinct_values_summary_id ).style.display = 'none' ;
        document.getElementById( 'database-updates-main-page-html' ).style.display = '' ;
    }
    function back_to_distinct_value_summary_page() {
        document.getElementById( window.last_displayed_records_listing_id ).style.display = 'none' ;
        document.getElementById( window.last_displayed_distinct_values_summary_id ).style.display = '' ;
    }
    function toggle_distinct_value_records( id ) {
        var el = document.getElementById( id ) ;
        if ( el.style.display === 'none' ) {
            el.style.display = '' ;
            document.getElementById( window.last_displayed_distinct_values_summary_id ).style.display = 'none' ;
            window.last_displayed_records_listing_id = id ;
        } else {
            el.style.display = 'none' ;
            document.getElementById( window.last_displayed_distinct_values_summary_id ).style.display = '' ;
        }
    }
    function question_add_this_field( a_el , field_slug , url ) {
        var question_text = 'ADD the "' + field_slug + '" field?\\n\\nARE YOU SURE?' ;
        question_xxx_this_field( a_el , url , question_text ) ;
    }
    function question_update_this_field( a_el , field_slug , url ) {
        var question_text = 'UPDATE the "' + field_slug + '" field?\\n\\nARE YOU SURE?' ;
        question_xxx_this_field( a_el , url , question_text ) ;
    }
    function question_remove_this_field( a_el , field_slug , url ) {
        var question_text = 'REMOVE the "' + field_slug + '" field?\\n\\nARE YOU SURE?' ;
        question_xxx_this_field( a_el , url , question_text ) ;
    }
    function question_xxx_this_field( a_el , url , question_text ) {
        var tr_el = UDSPD_get_ancestor( a_el , { 'tagName' : 'TR' } , false ) ;
        if ( tr_el ) {
            var old_bg = tr_el.style.backgroundColor ;
            tr_el.style.backgroundColor = '#FFFF80' ;
        }
        var yes = confirm( question_text ) ;
        if ( tr_el ) {
            tr_el.style.backgroundColor = old_bg ;
        }
        if ( yes ) {
            location.href = url ;
        }
    }
    function question_add_all_dataset_fields( a_el , dataset_slug , url ) {
        var question_text = 'ADD ALL NEW fields to this dataset ("' + dataset_slug + '")?\\n\\nARE YOU SURE?' ;
        question_xxx_all_dataset_fields( a_el , dataset_slug , url , question_text ) ;
    }
    function question_update_all_dataset_fields( a_el , dataset_slug , url ) {
        var question_text = 'UPDATE ALL CHANGED fields in this dataset ("' + dataset_slug + '")?\\n\\nARE YOU SURE?' ;
        question_xxx_all_dataset_fields( a_el , dataset_slug , url , question_text ) ;
    }
    function question_remove_all_dataset_fields( a_el , dataset_slug , url ) {
        var question_text = 'REMOVE ALL DELETED fields from this dataset ("' + dataset_slug + '")?\\n\\nARE YOU SURE?' ;
        question_xxx_all_dataset_fields( a_el , dataset_slug , url , question_text ) ;
    }
    function question_add_all_then_remove_all( a_el , dataset_slug , url ) {
        var question_text = 'ADD ALL NEW then REMOVE ALL DELETED fields (from this dataset: "' + dataset_slug + '")?\\n\\nARE YOU SURE?' ;
        question_xxx_all_dataset_fields( a_el , dataset_slug , url , question_text ) ;
    }
    function question_add_all_then_update_all_then_remove_all( a_el , dataset_slug , url ) {
        var question_text = 'ADD ALL NEW, UPDATE ALL CHANGED, then REMOVE ALL DELETED fields (from this dataset: "' + dataset_slug + '")?\\n\\nARE YOU SURE?' ;
        question_xxx_all_dataset_fields( a_el , dataset_slug , url , question_text ) ;
    }
    function question_xxx_all_dataset_fields( a_el , dataset_slug , url , question_text ) {
        var div_el = UDSPD_get_ancestor( a_el , { 'tagName' : 'DIV' , 'id' : 'container-div-4-' + dataset_slug } , false ) ;
        if ( div_el ) {
            var old_bg = div_el.style.backgroundColor ;
            div_el.style.backgroundColor = '#FFFF80' ;
        }
        var yes = confirm( question_text ) ;
        if ( div_el ) {
            div_el.style.backgroundColor = old_bg ;
        }
        if ( yes ) {
            location.href = url ;
        }
    }
// ===========================================================================
// UDSPD_get_ancestor()
// ===========================================================================
function UDSPD_get_ancestor( start_el , like , stop_el ) {
    // -----------------------------------------------------------------------
    // UDSPD_get_ancestor( start_el , like , stop_el )
    // - - - - - - - - - - - - - - - - - - - - -
    // "like" is an object (associative array) like:-
    //
    //      {   tagName                 :   "xxx"
    //          class                   :   "xxx"
    //          id                      :   "xxx"
    //          <property_name_1>       :   <property_value_1>
    //          ...
    //          <property_name_N>       :   <property_value_N>
    //          }
    //
    // All the name = value pairs are optional.  Just specify what you need
    // to identify the ancestor that you're looking for.
    //
    // Returns false if no such ancestor found.
    // -----------------------------------------------------------------------
    if ( typeof stop_el === 'undefined' ) {
        var stop_el = document ;
    }
    var current_el = start_el.parentNode ;
    var all_properties_match ;
    while ( true ) {
        all_properties_match = true ;
        for ( name in like ) {
            if ( name === 'tagName' ) {
                if (    typeof current_el[ name ] !== 'string' ||
                        current_el[ name ].toUpperCase() !== like[ name ].toUpperCase()
                    ) {
                    all_properties_match = false ;
                    break ;
                }
            } else {
                if (    typeof current_el[ name ] !== 'string' ||
                        current_el[ name ] !== like[ name ]
                    ) {
                    all_properties_match = false ;
                    break ;
                }
            }
        }
        if ( all_properties_match ) {
            return current_el ;
        }
        if ( current_el === stop_el ) {
            break ;
        }
        current_el = current_el.parentNode ;
    }
    return false ;
}
</script>
EOT;

        // ---------------------------------------------------------------------

        return <<<EOT
<div style="width:98%">
    <div id="database-updates-main-page-html">
        <h1 style="{$h1_style}">Database Update Required</h1>
        {$main_page_html}
    </div>
    {$distinct_value_summary_pages_html}
    {$record_listing_pages_html}
</div>
{$js}
<br />
<br />
<br />
EOT;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // ANY AUTO-UPDATES REQUIRED - BUT NOT DONE ?
    // =========================================================================

    if ( $number_auto_updates_required_but_NOT_done > 0 ) {

        // ----------------------------------------------------------------------

        if (    function_exists(
                    '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\\get_plugin_title'
                    )
            ) {

            $plugin_title =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_plugin_title()
                ;

        } else {

            $plugin_title = '' ;

        }

        // ----------------------------------------------------------------------

        if (    function_exists(
                    '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\\get_plugin_full_version_number_with_dots'
                    )
            ) {

            $plugin_version_number =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_plugin_full_version_number_with_dots()
                ;

        } else {

            $plugin_version_number = '' ;

        }

        // ----------------------------------------------------------------------

        if ( $plugin_title !== '' ) {

            if ( $plugin_version_number !== '' ) {

                $plugin_title = <<<EOT
<h3>{$plugin_title} Plugin - Version {$plugin_version_number}</h3><br />
EOT;

            } else {

                $plugin_title = <<<EOT
<h3>{$plugin_title}</h3><br />
EOT;

            }

        }

        // ----------------------------------------------------------------------

        $bad_datasets = '' ;

        // ----------------------------------------------------------------------

        foreach ( $dataset_auto_update_failure_slugs as $this_dataset_slug ) {

            $this_safe_dataset_slug = htmlentities( $this_dataset_slug ) ;

            $bad_datasets .= <<<EOT
<li><b>{$this_safe_dataset_slug}</b></li>\n
EOT;

        }

        // ----------------------------------------------------------------------

        $msg = <<<EOT
<br />
<br />

<div style="max-width:640px">

    {$plugin_title}

    <h1>Problem!&nbsp; Database Update Required!</h1>

    <p>Your Ad Swapper plugin's database requires updating.&nbsp; But for some
    reason, that update can't be done.</p>

    <p>The datasets that weren't successfully updated are:-</p>

    <ul style="list-style-type:disc; margin-left:1.5em">{$bad_datasets}</ul>

    <p>Your ads should still display (on other Ad Swapper sites).&nbsp; And
    their ads on yours.&nbsp; It's just that you won't be able to create new ads
    (etc), until this problem is fixed.</p>

    <p>Please <a target="_blank"
    href="http://www.adswapper.com/contact-us/">contact us</a> (and tell us that
    you have an "database auto-update error").</p>

</div>

<br />
<br />
<br />
EOT;

        // ----------------------------------------------------------------------

        die( $msg) ;

        // ----------------------------------------------------------------------

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return TRUE ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_dataset_definition_file_details()
// =============================================================================

function get_dataset_definition_file_details(
    $core_plugapp_dirs      ,
    $dataset_slug
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_dataset_definition_file_details(
    //      $core_plugapp_dirs      ,
    //      $dataset_slug
    //      )
    // - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          array(
    //              $dd_filespec    ,
    //              $filesize       ,
    //              $filemtime      ,
    //              $sha1_file
    //              )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Get the file's filespec (and other required details)...
    // =========================================================================

    $dd_filespec =
        $core_plugapp_dirs['apps_dot_app_dir'] .
        '/' .
        str_replace( '_' , '-' , $dataset_slug ) .
        '.dd.php'
        ;

    // -------------------------------------------------------------------------
    // int filesize ( string $filename )
    // - - - - - - - - - - - - - - - - -
    // Gets the size for the given file.
    //
    //      filename
    //          Path to the file.
    //
    // Returns the size of the file in bytes, or FALSE (and generates an error
    // of level E_WARNING) in case of an error.
    //
    // Note:    Because PHP's integer type is signed and many platforms use
    //          32bit integers, some filesystem functions may return unexpected
    //          results for files which are larger than 2GB.
    //
    // (PHP 4, PHP 5, PHP 7)
    // -------------------------------------------------------------------------

    $filesize = @filesize( $dd_filespec ) ;

    // -------------------------------------------------------------------------

    if ( $filesize === FALSE ) {

        $ln = __LINE__ - 2 ;

        $safe_basename = htmlentities( basename( $dd_filespec ) ) ;

        return <<<EOT
PROBLEM:&nbsp; "filesize()" failure for {$safe_basename}
Detected in:&nbsp; \\{$ns}\\{$fn} near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------
    // int filemtime ( string $filename )
    // - - - - - - - - - - - - - - - - -
    // This function returns the time when the data blocks of a file were being
    // written to, that is, the time when the content of the file was changed.
    //
    //      filename
    //          Path to the file.
    //
    // RETURN VALUES
    //      Returns the time the file was last modified, or FALSE on failure.
    //      The time is returned as a Unix timestamp, which is suitable for the
    //      date() function.
    //
    // (PHP 4, PHP 5, PHP 7)
    // -------------------------------------------------------------------------

    $filemtime = filemtime( $dd_filespec ) ;

    // -------------------------------------------------------------------------

    if ( $filemtime === FALSE ) {

        $ln = __LINE__ - 2 ;

        $safe_basename = htmlentities( basename( $dd_filespec ) ) ;

        return <<<EOT
PROBLEM:&nbsp; "filemtime()" failure for {$safe_basename}
Detected in:&nbsp; \\{$ns}\\{$fn} near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------
    // string sha1_file ( string $filename [, bool $raw_output = false ] )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Calculates the sha1 hash of the file specified by filename using the »
    // US Secure Hash Algorithm 1, and returns that hash. The hash is a
    // 40-character hexadecimal number.
    //
    //      filename
    //          The filename of the file to hash.
    //
    //      raw_output
    //          When TRUE, returns the digest in raw binary format with a length
    //          of 20.
    //
    // Returns a string on success, FALSE otherwise.
    //
    // (PHP 4 >= 4.3.0, PHP 5)
    // -------------------------------------------------------------------------

    $sha1_file = sha1_file( $dd_filespec ) ;

    // -------------------------------------------------------------------------

    if ( $sha1_file === FALSE ) {

        $ln = __LINE__ - 2 ;

        $safe_basename = htmlentities( basename( $dd_filespec ) ) ;

        return <<<EOT
PROBLEM:&nbsp; "sha1_file()" failure for {$safe_basename}
Detected in:&nbsp; \\{$ns}\\{$fn} near line {$ln}
EOT;

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return array(
                $dd_filespec    ,
                $filesize       ,
                $filemtime      ,
                $sha1_file
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

