<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / CUSTOM.PAGES / VIEW-MANUALLY-APPROVED-AVAILABLE-ADS.CP /
//      VIEW-MANUALLY-APPROVED-AVAILABLE-ADS.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_viewManuallyApprovedAvailableAds ;

// =============================================================================
// get_custom_page_html_proper()
// =============================================================================

function get_custom_page_html_proper(
    $core_plugapp_dirs                                  ,
    $applications_dataset_and_view_definitions_etc      ,
    $all_custom_pages                                   ,
    $this_custom_page                                   ,
    $question_front_end
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_<customPageNameCamelCase>\
    // get_custom_page_html_proper(
    //      $core_plugapp_dirs                                  ,
    //      $applications_dataset_and_view_definitions_etc      ,
    //      $all_custom_pages                                   ,
    //      $this_custom_page                                   ,
    //      $question_front_end
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Sets a flag to force an Ads List Reload, the next time a front-end page
    // with Ad Slots on it is displayed.
    //
    // Returns the "Reload Ads List" page HTML.
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

    // =========================================================================
    // Make sure that:-
    //      $core_plugapp_dirs
    //
    // is properly filled...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we might have (eg):-
    //
    //      $core_plugapp_dirs = Array(
    //          [plugin_root_dir]              => /.../wp-content/plugins/plugin-plant
    //          [plugins_includes_dir]         => /.../wp-content/plugins/plugin-plant/includes
    //          [plugins_app_defs_dir]         => /.../wp-content/plugins/plugin-plant/app-defs
    //          [dataset_manager_includes_dir] => /.../wp-content/plugins/plugin-plant/includes/dataset-manager
    //          [apps_dot_app_dir]             =>
    //          [apps_plugin_stuff_dir]        =>
    //          [custom_pages_dir]             =>
    //          )
    //
    // We want ALL the fields filled...
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $core_plugapp_dirs , '$core_plugapp_dirs' ) ;

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

    // -------------------------------------------------------------------------

    if (    array_key_exists( 'application' , $_GET )
            &&
            trim( $_GET['application'] ) !== ''
        ) {

        $app_handle = $_GET['application'] ;

    } else {

        $msg = <<<EOT
PROBLEM:&nbsp; No "app_handle"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        return array( $msg ) ;

    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $app_handle ) ;

    // -------------------------------------------------------------------------

    $core_plugapp_dirs =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_core_plugapp_dirs(
            $path_in_plugin     ,
            $app_handle
            ) ;

    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $core_plugapp_dirs , '$core_plugapp_dirs' ) ;

    // =========================================================================
    // Get the MANUALLY APPROVED AVAILABLE ADS...
    // =========================================================================

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
    // -------------------------------------------------------------------------

    require_once( $core_plugapp_dirs['apps_dot_app_dir'] . '/manually-approved-available-ads-support.php' ) ;

    // -------------------------------------------------------------------------

    $option_name =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_manuallyApprovedAvailableAds\get_manually_approved_available_ads_option_name()
        ;

    // -------------------------------------------------------------------------

    $manually_approved_available_ads =
        get_option(
            $option_name
            ) ;

    // -------------------------------------------------------------------------

    if ( $manually_approved_available_ads === FALSE ) {
        $manually_approved_available_ads = array() ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $manually_approved_available_ads = Array(
    //
    //          "<ad_sid>"  =>  <a-time()_last_downloaded>
    //
    //          "<ad_sid>"  =>  <r-time()_last_downloaded>
    //
    //          [nnhw-zmcg] =>  a-1448527327        (approved)
    //
    //          [9khc-zwmv] =>  r-1448527327        (rejected)
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $manually_approved_available_ads        ,
//    '$manually_approved_available_ads'
//    ) ;

    // =========================================================================
    // Display the MANUALLY APPROVED AVAILABLE ADS...
    // =========================================================================

\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
    $manually_approved_available_ads        ,
    '$manually_approved_available_ads'
    ) ;




    // =========================================================================
    // SUCCESS
    // =========================================================================

    return '' ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

