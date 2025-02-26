<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / CUSTOM.PAGES / RELOAD-ADS-LIST.CP /
//      RELOAD-ADS-LIST.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_reloadAdsList ;

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
    // Set the "reload ads list" flag...
    // =========================================================================

    require_once( $core_plugapp_dirs['apps_plugin_stuff_dir'] . '/ad-displayer/generic-support/ads-list-support.php' ) ;

    require_once( $core_plugapp_dirs['apps_plugin_stuff_dir'] . '/ad-displayer/generic-support/ads-list-reload-requested.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // set_or_clear_ads_list_reload_request(
    //      $ad_type            ,
    //      $set_or_clear
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // Sets or clears the flag that indicates whether or not a reload of the
    // specified "ads list" has been requested.
    //
    // $ad_type should be one of:   "banner", "normal"
    //
    // $set_or_clear should be one of:  "set", "clear"
    //
    // RETURNS
    //      TRUE
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // BANNER ADS
    // -------------------------------------------------------------------------

    $ad_type      = 'banner' ;
    $set_or_clear = 'set'    ;

    // -------------------------------------------------------------------------

    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\set_or_clear_ads_list_reload_request(
        $ad_type            ,
        $set_or_clear
        ) ;

    // -------------------------------------------------------------------------
    // NORMAL ADS
    // -------------------------------------------------------------------------

    $ad_type      = 'normal' ;
    $set_or_clear = 'set'    ;

    // -------------------------------------------------------------------------

    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\set_or_clear_ads_list_reload_request(
        $ad_type            ,
        $set_or_clear
        ) ;

    // =========================================================================
    // GET OK URL...
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

    if ( is_array( $ok_url ) ) {
        return $ok_url ;
    }

    // =========================================================================
    // SYNCHRONISING ?
    // =========================================================================

    if (    array_key_exists(
                'sync_step'     ,
                $_GET
                )
            &&
            $_GET['sync_step'] === '3'
        ) {

        // ---------------------------------------------------------------------
        // Get the sync output so far...
        // ---------------------------------------------------------------------

        require_once( dirname( dirname( __FILE__ ) ) . '/synchronisation-support.php' ) ;

        // ---------------------------------------------------------------------

        $option_name =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_synchronisationSupport\get_sync_output_option_name()
            ;

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

        $sync_output_so_far =
            get_option(
                $option_name
                ) ;

        // --------------------------------------------------------------------

        if ( $sync_output_so_far === FALSE ) {
            $sync_output_so_far = '' ;
                //  ???  An ERROR MESSAGE might be better ???
        }

        // --------------------------------------------------------------------

        $ok =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_green_message(
                '<p>Ads List RELOADED OK!</p>'
                ) ;

        // -----------------------------------------------------------------

        return <<<EOT
{$sync_output_so_far}
<div style="width:90%; margin-left:1.5em; margin-top:25px; border:2px solid #CCCCCC; border-left:15px solid #CCCCCC; padding:0 1em 1.2em 1.5em; background-color:#FFFFFF">
    {$page_header}
    <div style="margin-top:2em; width:98%">{$ok}</div>
</div>
<h2 style="margin-bottom:0; position:relative; top:5px">Synchronisation completed OK</h2>
<p><a   style="color:#0066CC; font-size:167%; font-weight:bold"
    href="{$ok_url}"
    >OK</a></p>
EOT;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Display "OK" message...
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

    return <<<EOT
<br />
<br />

<div style="max-width:480px; margin-left:2em; border:1px solid #008000; background-color:#E7FFE7; padding:1em 2em">

    <h1>Reload Ads List</h1>

    <p style="color:#0066CC; font-size:133%; font-weight:bold; position:relative; top:3px">DONE :)</p>

    <p><i>The Ads List will be reloaded the next time a front-end page with Ad
    Swapper ads is displayed (by either you, or any other Web user).</i></p>

    <p><i>Hopefully, if there have been any problems with your Ad Swapper ads
    not displaying properly (or at all), this forced reload will have cleared
    them up.</i><?p>

    <p><a   style="color:#0066CC; font-size:167%; font-weight:bold"
            href="{$ok_url}"
            >OK</a></p>

</div>

<br />
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

