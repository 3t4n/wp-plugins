<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / AD-DISPLAYER /
//      AD-DISPLAY-GENERIC-SUPPORT.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer ;

// =============================================================================
// get_current_page_number_variable_name()
// =============================================================================

function get_current_page_number_variable_name() {
    return 'greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer_currentPageNumber' ;
}

// =============================================================================
// get_last_used_page_number_option_name()
// =============================================================================

function get_last_used_page_number_option_name() {
    return 'adSwapper_adDisplayer_lastUsedPageNumber' ;
}

// =============================================================================
// get_current_page_number()
// =============================================================================

function get_current_page_number() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_current_page_number()
    // - - - - - - - - - - - - -
    // RETURNS
    //      INT $current_page_number (1 to PHP_INT_MAX)
    //
    //      The value returned has been checked - and is OK to use.
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    $current_page_number_varname = get_current_page_number_variable_name() ;

    // -------------------------------------------------------------------------

    if ( array_key_exists( $current_page_number_varname , $GLOBALS ) ) {

        // ---------------------------------------------------------------------

        if (    ! is_int( $GLOBALS[ $current_page_number_varname ] )
                ||
                $GLOBALS[ $current_page_number_varname ] < 1
            ) {

            $ns = __NAMESPACE__ ;
            $fn = __FUNCTION__  ;
            $ln = __LINE__ - 6  ;

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "current_page_number" (1, 2, 3... expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

            die( nl2br( $msg ) ) ;

        }

        // ---------------------------------------------------------------------

        return $GLOBALS[ $current_page_number_varname ] ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // The current page number GLOBAL ISN'T defined yet.
    //
    // Thus, the current page has just been started.  And we must get it's
    // page number from the "last_used_page_number" in the Wordress
    // options database (and update that "last_used_page_number" option as
    // we do).
    // -------------------------------------------------------------------------

    $last_used_page_number_option_name = get_last_used_page_number_option_name() ;

    // -------------------------------------------------------------------------
    // get_option( $option , $default )
    // - - - - - - - - - - - - - - - -
    // A safe way of getting values for a named option from the options database
    // table . If the desired option does not exist, or no value is associated
    // with it, FALSE will be returned.
    //
    //      $option
    //          (string) (required) Name of the option to retrieve. Underscores
    //          separate words, lowercase only.
    //          Default: None
    //
    //      $default
    //          (mixed) (optional) The default value to return if no value is
    //          returned (ie. the option is not in the database).
    //          Default: false
    //
    // RETURN VALUES
    //      (mixed) Current value for the specified option. If the option does
    //      not exist, returns parameter $default if specified or boolean FALSE
    //      by default.
    // ------------------------------------------------------------------------

    $last_used_page_number = get_option( $last_used_page_number_option_name ) ;

    // ---------------------------------------------------------------------

    if ( $last_used_page_number === FALSE ) {       //  Not defined ?

        $last_used_page_number = 0 ;

    } elseif ( is_int( $last_used_page_number ) ) {

        if ( $last_used_page_number < 1 ) {

            $ns = __NAMESPACE__ ;
            $fn = __FUNCTION__  ;
            $ln = __LINE__ - 4  ;

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "last_used_page_number" (1, 2, 3... expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

            die( nl2br( $msg ) ) ;

        }

    } elseif (  ! is_string( $last_used_page_number )
                ||
                ! ctype_digit( $last_used_page_number )
        ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 6  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "last_used_page_number" (1, 2, 3... expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    } elseif ( $last_used_page_number === PHP_INT_MAX ) {       //  Wrap-around ?

        $last_used_page_number = 0 ;

    }

    // -------------------------------------------------------------------------

    $GLOBALS[ $current_page_number_varname ] = $last_used_page_number + 1 ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // update_option_properly(
    //      $option_name    ,
    //      $new_value      ,
    //      $autoload
    //      )
    // - - - - - - - - - - -
    // Fixes numerous bugs with WordPress's "update_option()".
    //
    // In particular:-
    //
    // 1.   You can now save BOOLEAN values.  Though you MUST read them with:-
    //          get_boolean_option()
    //
    // 2.   Integer values can be retrieved as INTs - by reading them with:-
    //          get_integer_option()
    //
    // 3.   Doubles/floats and resources still not supported yet.
    //
    // $new_value MUST be:-
    //          boolean, integer, string, array, or object
    //
    // RETURNS:-
    //      TRUE (whether the new value is different from the old value or not)
    //
    // "dies()" on error.
    // -------------------------------------------------------------------------

    $autoload = TRUE ;

    // -------------------------------------------------------------------------

    update_option_properly(
        $last_used_page_number_option_name          ,
        $GLOBALS[ $current_page_number_varname ]    ,
        $autoload
        ) ;

    // -------------------------------------------------------------------------

    return $GLOBALS[ $current_page_number_varname ] ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_number_ads_list_reloads_this_page_variable_name()
// =============================================================================

function get_number_ads_list_reloads_this_page_variable_name() {
    return 'greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer_numberAdsListReloadsThisPage' ;
}

// =============================================================================
// get_number_ads_list_reloads_this_page()
// =============================================================================

function get_number_ads_list_reloads_this_page(
    $ad_slot_ad_type
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_number_ads_list_reloads_this_page(
    //      $ad_slot_ad_type
    //      )
    // - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      INT $number_times_ads_list_reloaded_this_page (0 to PHP_INT_MAX)
    //
    //      The value returned has been checked - and is OK to use.
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    $number_ads_list_reloads_this_page_varname = get_number_ads_list_reloads_this_page_variable_name() ;

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $number_ads_list_reloads_this_page_varname , $GLOBALS ) ) {
        return 0 ;
    }

    // -------------------------------------------------------------------------

    if ( ! is_array( $GLOBALS[ $number_ads_list_reloads_this_page_varname ] ) ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "number_ads_list_reloads_this_page" (array expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    if (    ! array_key_exists(
                $ad_slot_ad_type                                        ,
                $GLOBALS[ $number_ads_list_reloads_this_page_varname ]
                )
        ) {
        return 0 ;
    }

    // -------------------------------------------------------------------------

    if ( ! is_int( $GLOBALS[ $number_ads_list_reloads_this_page_varname ][ $ad_slot_ad_type ] ) ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        $safe_ad_slot_ad_type = htmlentities( $ad_slot_ad_type ) ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "number_ads_list_reloads_this_page" (0, 1, 2... expected)
For Ad Slot Ad Type:&nbsp; {$safe_ad_slot_ad_type}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // ---------------------------------------------------------------------

    return $GLOBALS[ $number_ads_list_reloads_this_page_varname ][ $ad_slot_ad_type ] ;

    // ---------------------------------------------------------------------

    }

// =============================================================================
// inc_number_ads_list_reloads_this_page()
// =============================================================================

function inc_number_ads_list_reloads_this_page(
    $ad_slot_ad_type
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // inc_number_ads_list_reloads_this_page(
    //      $ad_slot_ad_type
    //      )
    // - - - - - - - - - - - - - - - - - - - -
    // Increments "number ads list reloads per page" (by 1)
    //
    // Should be called every time the ads list is loaded/re-loaded. EXCEPT for
    // trial reloads - whoose purpose is to check if the ads list has changed -
    // and for which it's found that the ads list HASN'T changed.
    //
    // RETURNS
    //      TRUE
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    $number_ads_list_reloads_this_page_varname = get_number_ads_list_reloads_this_page_variable_name() ;

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $number_ads_list_reloads_this_page_varname , $GLOBALS ) ) {
        $GLOBALS[ $number_ads_list_reloads_this_page_varname ] = array(
            $ad_slot_ad_type    =>  1
            ) ;
        return TRUE ;
    }

    // -------------------------------------------------------------------------

    if ( ! is_array( $GLOBALS[ $number_ads_list_reloads_this_page_varname ] ) ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "number_ads_list_reloads_this_page" (array expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $ad_slot_ad_type , $GLOBALS[ $number_ads_list_reloads_this_page_varname ] ) ) {
        $GLOBALS[ $number_ads_list_reloads_this_page_varname ][ $ad_slot_ad_type ] = 1 ;
        return TRUE ;
    }

    // -------------------------------------------------------------------------

    if (    ! is_int( $GLOBALS[ $number_ads_list_reloads_this_page_varname ][ $ad_slot_ad_type ] )
            ||
            $GLOBALS[ $number_ads_list_reloads_this_page_varname ][ $ad_slot_ad_type ] < 0
        ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 6  ;

        $safe_ad_slot_ad_type = htmlentities( $ad_slot_ad_type ) ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "number_ads_list_reloads_this_page" (0, 1, 2... expected)
For Ad Slot Ad Type:&nbsp; {$safe_ad_slot_ad_type}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // ---------------------------------------------------------------------

    $GLOBALS[ $number_ads_list_reloads_this_page_varname ][ $ad_slot_ad_type ]++ ;

    // ---------------------------------------------------------------------

    return TRUE ;

    // ---------------------------------------------------------------------

    }

// =============================================================================
// get_iteration_number_this_page_variable_name()
// =============================================================================

function get_iteration_number_this_page_variable_name() {
    return 'greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer_iterationNumberThisPage' ;
}

// =============================================================================
// get_iteration_number_this_page()
// =============================================================================

function get_iteration_number_this_page(
    $ad_slot_ad_type
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_iteration_number_this_page(
    //      $ad_slot_ad_type
    //      )
    // - - - - - - - - - - - - - - - -
    // RETURNS
    //      INT $iteration_number_this_page (1 to PHP_INT_MAX)
    //
    //      The value returned has been checked - and is OK to use.
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    $iteration_number_this_page_varname = get_iteration_number_this_page_variable_name() ;

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $iteration_number_this_page_varname , $GLOBALS ) ) {
        return 1 ;
    }

    // -------------------------------------------------------------------------

    if ( ! is_array( $GLOBALS[ $iteration_number_this_page_varname ] ) ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "iteration_number_this_page" (array expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    if (    ! array_key_exists(
                $ad_slot_ad_type                                        ,
                $GLOBALS[ $iteration_number_this_page_varname ]
                )
        ) {
        return 1 ;
    }

    // -------------------------------------------------------------------------

    if ( ! is_int( $GLOBALS[ $iteration_number_this_page_varname ][ $ad_slot_ad_type ] ) ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        $safe_ad_slot_ad_type = htmlentities( $ad_slot_ad_type ) ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "iteration_number_this_page" (1, 2, 3... expected)
For Ad Slot Ad Type:&nbsp; {$safe_ad_slot_ad_type}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // ---------------------------------------------------------------------

    return $GLOBALS[ $iteration_number_this_page_varname ][ $ad_slot_ad_type ] ;

    // ---------------------------------------------------------------------

    }

// =============================================================================
// inc_iteration_number_this_page()
// =============================================================================

function inc_iteration_number_this_page(
    $ad_slot_ad_type
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // inc_iteration_number_this_page(
    //      $ad_slot_ad_type
    //      )
    // - - - - - - - - - - - - - - - - - - - -
    // Increments "iteration number this page" (by 1)
    //
    // RETURNS
    //      TRUE
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    $iteration_number_this_page_varname = get_iteration_number_this_page_variable_name() ;

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $iteration_number_this_page_varname , $GLOBALS ) ) {
        $GLOBALS[ $iteration_number_this_page_varname ] = array(
            $ad_slot_ad_type    =>  2
            ) ;
        return TRUE ;
    }

    // -------------------------------------------------------------------------

    if ( ! is_array( $GLOBALS[ $iteration_number_this_page_varname ] ) ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "iteration_number_this_page" (array expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $ad_slot_ad_type , $GLOBALS[ $iteration_number_this_page_varname ] ) ) {
        $GLOBALS[ $iteration_number_this_page_varname ][ $ad_slot_ad_type ] = 2 ;
        return TRUE ;
    }

    // -------------------------------------------------------------------------

    if (    ! is_int( $GLOBALS[ $iteration_number_this_page_varname ][ $ad_slot_ad_type ] )
            ||
            $GLOBALS[ $iteration_number_this_page_varname ][ $ad_slot_ad_type ] < 1
        ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 6  ;

        $safe_ad_slot_ad_type = htmlentities( $ad_slot_ad_type ) ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "iteration_number_this_page" (1, 2, 3... expected)
For Ad Slot Ad Type:&nbsp; {$safe_ad_slot_ad_type}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // ---------------------------------------------------------------------

    $GLOBALS[ $iteration_number_this_page_varname ][ $ad_slot_ad_type ]++ ;

    // ---------------------------------------------------------------------

    return TRUE ;

    // ---------------------------------------------------------------------

    }

// =============================================================================
// get_core_plugapp_dirs_4_ad_displayer()
// =============================================================================

function get_core_plugapp_dirs_4_ad_displayer() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_core_plugapp_dirs_4_ad_displayer()
    // - - - - - - - - - - - - - - - - - - -
    // Returns the core plugapp dirs, for the ad displayer.
    //
    // NOTE!    The ad displayer routines are called from within WordPress
    //          (Ad Swapper "ad slot") widgets.  And thus, know nothing of
    //          any:-
    //              $core_plugapp_dirs
    //
    //          that may have been loaded by other code in the Ad Swapper
    //          plugin.
    //
    //          To prevent multiple reloads of these dirs, we cache the ad
    //          displayer's version in $GLOBALS.
    //
    // RETURNS
    //      ARRAY $core_plugapp_dirs
    // -------------------------------------------------------------------------

    $core_plugapp_dirs_varname =
        '\greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer_corePlugappDirs'
        ;

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $core_plugapp_dirs_varname , $GLOBALS ) ) {

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

        $GLOBALS[ $core_plugapp_dirs_varname ] =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_core_plugapp_dirs(
                $path_in_plugin     ,
                $app_handle
                ) ;

        // ---------------------------------------------------------------------

    }

    // ---------------------------------------------------------------------

    return $GLOBALS[ $core_plugapp_dirs_varname ] ;

    // ---------------------------------------------------------------------

}

// =============================================================================
// get_loaded_datasets_4_ad_displayer()
// =============================================================================

function get_loaded_datasets_4_ad_displayer() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_loaded_datasets_4_ad_displayer()
    // - - - - - - - - - - - - - - - - - -
    // Returns the loaded datasets, for the ad displayer.
    //
    // NOTE!    The ad displayer routines are called from within WordPress
    //          (Ad Swapper "ad slot") widgets.  And thus, know nothing of
    //          the:-
    //              $loaded_datasets
    //
    //          that may have been loaded by other code in the Ad Swapper
    //          plugin.
    //
    //          To prevent multiple reloads of these datasets, we cache the ad
    //          displayer's version in $GLOBALS.
    //
    // RETURNS
    //      ARRAY $loaded_datasets
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    $core_plugapp_dirs = get_core_plugapp_dirs_4_ad_displayer() ;

    // -------------------------------------------------------------------------

    require_once( $core_plugapp_dirs['apps_plugin_stuff_dir'] . '/includes/datasets-support.php' ) ;

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

    $question_front_end = FALSE ;

    // -------------------------------------------------------------------------

    $dataset_records =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetSupport\get_ad_swapper_dataset_records(
            $core_plugapp_dirs      ,
            $question_front_end
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $dataset_records ) ) {
        die( nl2br( $msg ) ) ;
    }

    // -------------------------------------------------------------------------

    list(
        $app_defs_directory_tree                        ,
        $applications_dataset_and_view_definitions_etc  ,
        $all_application_dataset_definitions            ,
        $loaded_datasets
        ) = $dataset_records ;

    // -------------------------------------------------------------------------

    return $loaded_datasets ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// is_start_of_page_for()
// =============================================================================

function is_start_of_page_for(
    $id_string
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // is_start_of_page_for(
    //      $id_string
    //      )
    // - - - - - - - - - - -
    // This function returns TRUE the first time it's called (with a given
    // $id_string).  The second and subsequent calls (with the same
    // $id_string), return FALSE.
    //
    // The $id_string:-
    //
    //      o   Must be a valid PHP variable name, and;
    //
    //      o   When appended to:-
    //              "greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer_"
    //
    //          must generate a UNIQUE variable name that WON'T conflict with
    //          any other GLOBAL variable name that might be generated (by
    //          this version of the plugin "is_start_page_for()" is called
    //          from).
    //
    // RETURNS
    //      TRUE or FALSE
    //
    // dies() on error.
    // -------------------------------------------------------------------------

    if (    ! is_string( $id_string )
            ||
            trim( $id_string ) === ''
        ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 6  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "id_string" (non-empty string expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    $varname =
        'greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer_' .
        $id_string
        ;

    // -------------------------------------------------------------------------

    $target_value = 'set-by-is-start-of-page-for' ;

    // -------------------------------------------------------------------------

    if (    array_key_exists( $varname , $GLOBALS )
            &&
            $GLOBALS[ $varname ] !== $target_value
        ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 6  ;

        $safe_id_string = htmlentities( $id_string ) ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "id_string" ("{$safe_id_string}" appears to be used elsewhere)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    if ( array_key_exists( $varname , $GLOBALS ) ) {
        return FALSE ;
    }

    // -------------------------------------------------------------------------

    $GLOBALS[ $varname ] = $target_value ;

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

/*
// =============================================================================
// get_option_name_4_update_CENTRAL_site_run_since_ads_list_last_reloaded()
// =============================================================================

function get_option_name_4_update_CENTRAL_site_run_since_ads_list_last_reloaded() {
    return 'adSwapper_adDisplayer_UCS_run_since_AL_last_reloaded' ;
        //  WordPress option names are 64 chars max.
}
*/

// =============================================================================
// get_option_name_4_update_LOCAL_site_run_since_ads_list_last_reloaded()
// =============================================================================

function get_option_name_4_update_LOCAL_site_run_since_ads_list_last_reloaded() {
    return 'adSwapper_adDisplayer_ULS_run_since_AL_last_reloaded' ;
        //  WordPress option names are 64 chars max.
}

/*
// =============================================================================
// get_update_CENTRAL_site_run_since_ads_list_last_reloaded()
// =============================================================================

function get_update_CENTRAL_site_run_since_ads_list_last_reloaded() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_update_CENTRAL_site_run_since_ads_list_last_reloaded()
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      TRUE or FALSE
    //      NULL if option doesn't exist
    //
    // die()s on other error
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_boolean_option(
    //      $option_name                ,
    //      $die_if_not_exist = FALSE
    //      )
    // - - - - - - - - - - - - - - - - -
    // Retrieves a PHP BOOLEAN value (TRUE or FALSE), from the WordPress
    // options database.
    //
    // NOTE!
    // =====
    // The BOOLEAN value MUST have been saved with "update_option_properly()".
    //
    // RETURNS
    //      If $die_if_not_exist = TRUE
    //          TRUE or FALSE
    //          dies() if option doesn't exist
    //      If $die_if_not_exist = FALSE
    //          TRUE or FALSE
    //          NULL if option doesn't exist
    //
    // die()s on other error
    // -------------------------------------------------------------------------

    $die_if_not_exist = FALSE ;

    // -------------------------------------------------------------------------

    return get_boolean_option(
                get_option_name_4_update_CENTRAL_site_run_since_ads_list_last_reloaded()    ,
                $die_if_not_exist
                ) ;

    // -------------------------------------------------------------------------

}
*/

// =============================================================================
// get_update_LOCAL_site_run_since_ads_list_last_reloaded()
// =============================================================================

function get_update_LOCAL_site_run_since_ads_list_last_reloaded() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_update_LOCAL_site_run_since_ads_list_last_reloaded()
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      TRUE or FALSE
    //      NULL if option doesn't exist
    //
    // die()s on other error
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_boolean_option(
    //      $option_name                ,
    //      $die_if_not_exist = FALSE
    //      )
    // - - - - - - - - - - - - - - - - -
    // Retrieves a PHP BOOLEAN value (TRUE or FALSE), from the WordPress
    // options database.
    //
    // NOTE!
    // =====
    // The BOOLEAN value MUST have been saved with "update_option_properly()".
    //
    // RETURNS
    //      If $die_if_not_exist = TRUE
    //          TRUE or FALSE
    //          dies() if option doesn't exist
    //      If $die_if_not_exist = FALSE
    //          TRUE or FALSE
    //          NULL if option doesn't exist
    //
    // die()s on other error
    // -------------------------------------------------------------------------

    $die_if_not_exist = FALSE ;

    // -------------------------------------------------------------------------

    return get_boolean_option(
                get_option_name_4_update_LOCAL_site_run_since_ads_list_last_reloaded()  ,
                $die_if_not_exist
                ) ;

    // -------------------------------------------------------------------------

}

/*
// =============================================================================
// set_update_CENTRAL_site_run_since_ads_list_last_reloaded()
// =============================================================================

function set_update_CENTRAL_site_run_since_ads_list_last_reloaded(
    $value
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // set_update_CENTRAL_site_run_since_ads_list_last_reloaded()
    //      $value
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Set this variable to $value (which must be TRUE or FALSE ).
    //
    // RETURNS
    //      TRUE
    //
    // die()s on error
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // set_boolean_option(
    //      $option_name    ,
    //      $value
    //      )
    // - - - - - - - - - - -
    // Set the specified option to $value (which must be TRUE or FALSE ).
    //
    // RETURNS
    //      TRUE
    //
    // die()s on error
    // -------------------------------------------------------------------------

    return set_boolean_option(
                get_option_name_4_update_CENTRAL_site_run_since_ads_list_last_reloaded()    ,
                $value
                ) ;

    // -------------------------------------------------------------------------

}
*/

// =============================================================================
// set_update_LOCAL_site_run_since_ads_list_last_reloaded()
// =============================================================================

function set_update_LOCAL_site_run_since_ads_list_last_reloaded(
    $value
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // set_update_LOCAL_site_run_since_ads_list_last_reloaded()
    //      $value
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Set this variable to $value (which must be TRUE or FALSE ).
    //
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    return set_boolean_option(
                get_option_name_4_update_LOCAL_site_run_since_ads_list_last_reloaded()    ,
                $value
                ) ;

    // -------------------------------------------------------------------------

/*
    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    if ( $value === TRUE ) {
        $value = 'yes' ;

    } elseif ( $value === FALSE ) {
        $value = 'no' ;

    } else {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM:&nbsp; Bad "value" (TRUE or FALSE expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

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

    update_option(
        get_option_name_4_update_LOCAL_site_run_since_ads_list_last_reloaded()  ,
        $value
        ) ;

    // -------------------------------------------------------------------------

    return TRUE ;
*/

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_boolean_option()
// =============================================================================

function get_boolean_option(
    $option_name                ,
    $die_if_not_exist = FALSE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_boolean_option(
    //      $option_name                ,
    //      $die_if_not_exist = FALSE
    //      )
    // - - - - - - - - - - - - - - - - -
    // Retrieves a PHP BOOLEAN value (TRUE or FALSE), from the WordPress
    // options database.
    //
    // NOTE!
    // =====
    // The BOOLEAN value MUST have been saved with "update_option_properly()".
    //
    // RETURNS
    //      If $die_if_not_exist = TRUE
    //          TRUE or FALSE
    //          dies() if option doesn't exist
    //      If $die_if_not_exist = FALSE
    //          TRUE or FALSE
    //          NULL if option doesn't exist
    //
    // die()s on other error
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // In conjunction with "update_option_properly()", solves the bugs that
    // "update_option()":-
    //
    // 1.   Can only save:-
    //          integer, string, array, or object
    //
    //      And;
    //
    // 2.   Converts integers to string.
    // -------------------------------------------------------------------------

    $safe_option_name = htmlentities( (string) $option_name ) ;

    // -------------------------------------------------------------------------

    if (    ! is_string( $option_name )
            ||
            trim( $option_name ) === ''
        ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 6  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad option name ("{$safe_option_name}") (non-empty string expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------
    // get_option( $option , $default )
    // - - - - - - - - - - - - - - - -
    // A safe way of getting values for a named option from the options database
    // table . If the desired option does not exist, or no value is associated
    // with it, FALSE will be returned.
    //
    //      $option
    //          (string) (required) Name of the option to retrieve. Underscores
    //          separate words, lowercase only.
    //          Default: None
    //
    //      $default
    //          (mixed) (optional) The default value to return if no value is
    //          returned (ie. the option is not in the database).
    //          Default: false
    //
    // RETURN VALUES
    //      (mixed) Current value for the specified option. If the option does
    //      not exist, returns parameter $default if specified or boolean FALSE
    //      by default.
    // ------------------------------------------------------------------------

    $default = $safe_option_name . '-not-created-yet' ;

    // -------------------------------------------------------------------------

    $existing_value = get_option( $option_name , $default ) ;

    // -------------------------------------------------------------------------

    if ( $existing_value === $default ) {       //  Option NOT created yet!

        if ( $die_if_not_exist ) {

            $ns = __NAMESPACE__ ;
            $fn = __FUNCTION__  ;
            $ln = __LINE__ - 4  ;

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "{$safe_option_name}" (no such option)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

            die( nl2br( $msg ) ) ;

        } else {

            return NULL ;

        }

    }

//var_dump( $existing_value ) ;

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // Booleans are saved as "0" (FALSE) and "1" (TRUE).
    // -------------------------------------------------------------------------

    if ( $existing_value === '0' ) {
        return FALSE ;

    } elseif ( $existing_value === '1' ) {
        return TRUE ;

    }

    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;
    $ln = __LINE__      ;

    $msg = <<<EOT
PROBLEM:&nbsp; Bad "{$safe_option_name}" ("0" or "1" expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    die( nl2br( $msg ) ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// set_boolean_option()
// =============================================================================

function set_boolean_option(
    $option_name    ,
    $value
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // set_boolean_option(
    //      $option_name    ,
    //      $value
    //      )
    // - - - - - - - - - - -
    // Set the specified option to $value (which must be TRUE or FALSE ).
    //
    // RETURNS
    //      TRUE
    //
    // die()s on error
    // -------------------------------------------------------------------------

    if ( ! is_bool( $value ) ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        $safe_option_name = htmlentities( $option_name ) ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "{$safe_option_name}" (TRUE or FALSE expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // update_option_properly(
    //      $option_name    ,
    //      $new_value      ,
    //      $autoload
    //      )
    // - - - - - - - - - - -
    // Fixes numerous bugs with WordPress's "update_option()".
    //
    // In particular:-
    //
    // 1.   You can now save BOOLEAN values.  Though you MUST read them with:-
    //          get_boolean_option()
    //
    // 2.   Integer values can be retrieved as INTs - by reading them with:-
    //          get_integer_option()
    //
    // 3.   Doubles/floats and resources still not supported yet.
    //
    // $new_value MUST be:-
    //          boolean, integer, string, array, or object
    //
    // RETURNS:-
    //      TRUE (whether the new value is different from the old value or not)
    //
    // "dies()" on error.
    // -------------------------------------------------------------------------

    $autoload = TRUE ;

    // -------------------------------------------------------------------------

    update_option_properly(
        $option_name    ,
        $value          ,
        $autoload
        ) ;

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_integer_option()
// =============================================================================

function get_integer_option(
    $option_name
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_integer_option(
    //      $option_name
    //      )
    // - - - - - - - - - -
    // Retrieves a PHP INT value, from the WordPress options database.
    //
    // Should be used instead of "get_option()", because "get_option()"
    // returns INTs as STRINGs.
    //
    // NOTE!
    // =====
    // The INTEGER value can have been saved with either; "update_option(), or;
    // "update_option_properly()".
    //
    // RETURNS
    //      INT $saved_value
    //
    // die()s on error (eg; option doesn't exist yet)
    // -------------------------------------------------------------------------

    $safe_option_name = htmlentities( (string) $option_name ) ;

    // -------------------------------------------------------------------------

    if (    ! is_string( $option_name )
            ||
            trim( $option_name ) === ''
        ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 6  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad option name ("{$safe_option_name}") (non-empty string expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------
    // get_option( $option , $default )
    // - - - - - - - - - - - - - - - -
    // A safe way of getting values for a named option from the options database
    // table . If the desired option does not exist, or no value is associated
    // with it, FALSE will be returned.
    //
    //      $option
    //          (string) (required) Name of the option to retrieve. Underscores
    //          separate words, lowercase only.
    //          Default: None
    //
    //      $default
    //          (mixed) (optional) The default value to return if no value is
    //          returned (ie. the option is not in the database).
    //          Default: false
    //
    // RETURN VALUES
    //      (mixed) Current value for the specified option. If the option does
    //      not exist, returns parameter $default if specified or boolean FALSE
    //      by default.
    // ------------------------------------------------------------------------

    $default = $safe_option_name . '-not-created-yet' ;

    // -------------------------------------------------------------------------

    $existing_value = get_option( $option_name , $default ) ;

    // -------------------------------------------------------------------------

    if ( $existing_value === $default ) {       //  Option NOT created yet!

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "{$safe_option_name}" (no such option)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // get_option() seems to SOMETIMES return INTs as STRINGs
    // -------------------------------------------------------------------------

//var_dump( $existing_value ) ;

    $ok = FALSE ;

    // -------------------------------------------------------------------------

    if ( is_int( $existing_value ) ) {

        // ---------------------------------------------------------------------

        $ok = TRUE ;

        // ---------------------------------------------------------------------

    } elseif ( is_string( $existing_value ) ) {

        // ---------------------------------------------------------------------

        if ( $existing_value[0] === '-' ) {
            $digits = substr( $existing_value , 1 ) ;

        } else {
            $digits = $existing_value ;

        }

        // ---------------------------------------------------------------------

        if ( ctype_digit( $digits ) ) {
            $existing_value = (int) $existing_value ;
            $ok = TRUE ;
        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( ! $ok ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "{$safe_option_name}" (integer value expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    return $existing_value ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_array_option()
// =============================================================================

function get_array_option(
    $option_name                ,
    $die_if_not_exist = FALSE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_array_option(
    //      $option_name                ,
    //      $die_if_not_exist = FALSE
    //      )
    // - - - - - - - - - - - - - - -
    // Retrieves a PHP ARRAY from the WordPress options database.
    //
    // Should be used instead of "get_option()", because "get_option()"
    //      o   Doesn't check that the returned value is an array
    //
    // NOTE!
    // =====
    // The ARRAY value can have been saved with either; "update_option(), or;
    // "update_option_properly()".
    //
    // RETURNS
    //      o   $die_if_not_exist = TRUE
    //              ARRAY $saved_value
    //              dies()s if option doesn't exist
    //
    //      o   $die_if_not_exist = FALSE
    //              ARRAY $saved_value
    //              --or--
    //              FALSE (= option doesn't exist)
    //
    // die()s on error (eg; retrieved option not an array)
    // -------------------------------------------------------------------------

    $safe_option_name = htmlentities( (string) $option_name ) ;

    // -------------------------------------------------------------------------

    if (    ! is_string( $option_name )
            ||
            trim( $option_name ) === ''
        ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 6  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad option name ("{$safe_option_name}") (non-empty string expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------
    // get_option( $option , $default )
    // - - - - - - - - - - - - - - - -
    // A safe way of getting values for a named option from the options database
    // table . If the desired option does not exist, or no value is associated
    // with it, FALSE will be returned.
    //
    //      $option
    //          (string) (required) Name of the option to retrieve. Underscores
    //          separate words, lowercase only.
    //          Default: None
    //
    //      $default
    //          (mixed) (optional) The default value to return if no value is
    //          returned (ie. the option is not in the database).
    //          Default: false
    //
    // RETURN VALUES
    //      (mixed) Current value for the specified option. If the option does
    //      not exist, returns parameter $default if specified or boolean FALSE
    //      by default.
    // ------------------------------------------------------------------------

    $default = $safe_option_name . '-not-created-yet' ;

    // -------------------------------------------------------------------------

    $existing_value = get_option( $option_name , $default ) ;

    // -------------------------------------------------------------------------

    if ( $existing_value === $default ) {       //  Option NOT created yet!

        if ( $die_if_not_exist ) {

            $ns = __NAMESPACE__ ;
            $fn = __FUNCTION__  ;
            $ln = __LINE__ - 4  ;

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "{$safe_option_name}" (no such option)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

            die( nl2br( $msg ) ) ;

        } else {

            return FALSE ;

        }

    }

    // -------------------------------------------------------------------------

    if ( ! is_array( $existing_value ) ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "{$safe_option_name}" (array expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    return $existing_value ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// update_option_properly()
// =============================================================================

function update_option_properly(
    $option_name    ,
    $new_value      ,
    $autoload
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // update_option_properly(
    //      $option_name    ,
    //      $new_value      ,
    //      $autoload
    //      )
    // - - - - - - - - - - -
    // Fixes numerous bugs with WordPress's "update_option()".
    //
    // In particular:-
    //
    // 1.   You can now save BOOLEAN values.  Though you MUST read them with:-
    //          get_boolean_option()
    //
    // 2.   Integer values can be retrieved as INTs - by reading them with:-
    //          get_integer_option()
    //
    // 3.   Doubles/floats and resources still not supported yet.
    //
    // $new_value MUST be:-
    //          boolean, integer, string, array, or object
    //
    // RETURNS:-
    //      TRUE (whether the new value is different from the old value or not)
    //
    // "dies()" on error.
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // WordPress "update_option()" Bugs
    // ================================
    //
    // 1.   "update_option()" returns:-
    //          (boolean) True if option value has changed, false if not or if
    //          update failed.
    //
    //      In other words, with "update_option()", you can't tell the
    //      difference between:-
    //      o   A genuine DB error, or;
    //      o   The "new" and "old" values being the same.
    //
    //      The result being that you have to avoid error checking the returned
    //      "update_option()" value - and thus will miss reporting/handling
    //      genuine DB errors.
    //
    // 2.   "update_option()" can only save
    //          integer, string, array, or object
    //
    //      So BOOLEANS and FLOATS, for example, can't be saved.
    //
    // 3.   INTs are saved as STRINGS (and returned by "get_option()" as
    //      STRINGS.
    // -------------------------------------------------------------------------

    $safe_option_name = htmlentities( $option_name ) ;

    // -------------------------------------------------------------------------

    if (    ! is_bool( $new_value )
            &&
            ! is_int( $new_value )      //  native to "update_option()"
            &&
            ! is_string( $new_value )   //  native to "update_option()"
            &&
            ! is_array( $new_value )    //  native to "update_option()"
            &&
            ! is_object( $new_value )   //  native to "update_option()"
        ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 8  ;

        $type = strtoupper( gettype( $new_value ) ) ;

        $msg = <<<EOT
PROBLEM:&nbsp; Can't save "{$safe_option_name}" - because it's data type ("{$type}") isn't supported (must be BOOLEAN, INTEGER, STRING, ARRAY or OBJECT)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // --------------------------------------------------------------------------
    // get_option( $option , $default )
    // - - - - - - - - - - - - - - - -
    // A safe way of getting values for a named option from the options database
    // table . If the desired option does not exist, or no value is associated
    // with it, FALSE will be returned.
    //
    //      $option
    //          (string) (required) Name of the option to retrieve. Underscores
    //          separate words, lowercase only.
    //          Default: None
    //
    //      $default
    //          (mixed) (optional) The default value to return if no value is
    //          returned (ie. the option is not in the database).
    //          Default: false
    //
    // RETURN VALUES
    //      (mixed) Current value for the specified option. If the option does
    //      not exist, returns parameter $default if specified or boolean FALSE
    //      by default.
    // -------------------------------------------------------------------------

    $default = $safe_option_name . '-not-created-yet' ;

    // -------------------------------------------------------------------------

    $existing_value = get_option( $option_name , $default ) ;

//echo '<br />' , $option_name , ' = ' , $existing_value ; var_dump( $existing_value ) ;

    // -------------------------------------------------------------------------

    if ( $existing_value !== $default ) {       //  Option exists

        // ---------------------------------------------------------------------
        // Convert INTs back from STRINGS (for the "already set" comparison
        // that follows)...
        // ---------------------------------------------------------------------

        if (    is_int( $new_value )
                &&
                is_string( $existing_value )
                &&
                ctype_digit( $existing_value )
            ) {
            $existing_value = (int) $existing_value ;
        }

        // ---------------------------------------------------------------------
        // No update required if $new_value is already set.
        // ---------------------------------------------------------------------

        if ( $new_value === TRUE ) {

            if ( $existing_value === '1' ) {
                return TRUE ;
            }

        } elseif ( $new_value === FALSE ) {

            if ( $existing_value === '0' ) {
                return TRUE ;
            }

        } else {

            if ( $existing_value === $new_value ) {
                return TRUE ;
            }

        }

        // ---------------------------------------------------------------------

    }

    // --------------------------------------------------------------------------
    // BOOLEAN support...
    // --------------------------------------------------------------------------

    if ( $new_value === TRUE ) {
        $new_value = '1' ;

    } elseif ( $new_value === FALSE ) {
        $new_value = '0' ;

    }

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

    $result = update_option( $option_name , $new_value , $autoload ) ;

    // -------------------------------------------------------------------------

    if ( $result !== TRUE ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        $safe_option_name = htmlentities( $option_name ) ;

        $msg = <<<EOT
PROBLEM:&nbsp; Database error saving "{$safe_option_name}"
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// Other generic support routines...
// =============================================================================

    require_once( dirname( __FILE__ ) . '/generic-support/ads-list-support.php' ) ;

    require_once( dirname( __FILE__ ) . '/generic-support/ads-list-reload-requested.php' ) ;

//  require_once( dirname( __FILE__ ) . '/generic-support/sites-displayed-this-page.php' ) ;

// =============================================================================
// That's that!
// =============================================================================

