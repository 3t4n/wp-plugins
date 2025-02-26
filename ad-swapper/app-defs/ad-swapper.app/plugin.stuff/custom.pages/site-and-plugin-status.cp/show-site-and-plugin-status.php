<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / CUSTOM.PAGES / SITE-AND-PLUGIN-STATUS.CP /
//      SHOW-SITE-AND-PLUGIN-STATUS.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_siteAndPluginStatus ;

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
    // Displays the "Site / Plugin Status" page (or at least, returns that
    // page's HTML).
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
    // Get the SITE TITLE...
    // =========================================================================

    require_once( $core_plugapp_dirs['apps_plugin_stuff_dir'] . '/includes/ad-swapper-core-stuff.php' ) ;

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

    $site_profile =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adSwapperCoreStuff\get_site_profile_record(
            $core_plugapp_dirs
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $site_profile ) ) {
        return array( $site_profile ) ;
    }
    // -------------------------------------------------------------------------

    $site_title = trim( $site_profile['site_title'] ) ;

    // -------------------------------------------------------------------------

    if ( $site_title === '' ) {
        $site_title = 'Plugin Site' ;
    }

    // -------------------------------------------------------------------------

    if ( trim( $site_profile['home_page_url'] ) !== '' ) {

        $site_title = <<<EOT
<a  target="_blank"
    href="{$site_profile['home_page_url']}"
    style="color:#0066CC; text-decoration:none"
    >{$site_title}</a>
EOT;

    }

    // -------------------------------------------------------------------------

    $site_title = <<<EOT
<p style="text-align:center; position:relative; top:4px">
    for site:&nbsp;
        <span style="font-size:175%; font-weight:bold; color:#0066CC"
            >{$site_title}</span>
</p>
EOT;

    // =========================================================================
    // Get the current SITE AND PLUGIN STATUS...
    // =========================================================================

    require_once( $core_plugapp_dirs['apps_dot_app_dir'] . '/site-and-plugin-status-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_siteAndPluginStatusSupport\
    // get_site_and_plugin_status()
    // - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $site_and_plugin_status ARRAY
    //
    //          Which array should be like (eg):-
    //
    //              $site_and_plugin_status = array(
    //                  'last_central_data_retrieval_time_gmt'  =>  <this-time()>                       ,
    //                  'subscription_license_key'              =>  '' or 32-char HEX string            ,
    //                  'exact_subscription_type'               =>  'trial", "paid", "manual", etc      ,
    //                  'effective_subscription_type'           =>  'trial" or "paid"                   ,
    //                  'subscription_start_datetime_gmt'       =>  <that-time()>                       ,
    //                  'subscription_expiry_datetime_gmt'      =>  <the-other-time()>                  ,
    //                  'central_plugin_version'                =>  'X.Y.Z'                             ,
    //                  'min_local_source_plugin_version'       =>  'A.B.C'                             ,
    //                  'max_local_source_plugin_version'       =>  'D.E.F'                             ,
    //                  'min_local_wordpress_plugin_version'    =>  'G.H.I'                             ,
    //                  'max_local_wordpress_plugin_version'    =>  'K.K.L'
    //                  )
    //
    //          Though if the "site_and_plugin_status" HASN'T been set yet
    //          (because "Update Local Site" HASN'T been run yet), it will be
    //          like:-
    //
    //              $site_and_plugin_status = array(
    //                  'last_central_data_retrieval_time_gmt'  =>  0           ,
    //                  'subscription_license_key'              =>  'unknown'   ,
    //                  'exact_subscription_type'               =>  'unknown'   ,
    //                  'effective_subscription_type'           =>  'unknown'   ,
    //                  'subscription_start_datetime_gmt'       =>  0           ,
    //                  'subscription_expiry_datetime_gmt'      =>  0           ,
    //                  'central_plugin_version'                =>  'unknown'   ,
    //                  'min_local_source_plugin_version'       =>  'unknown'   ,
    //                  'max_local_source_plugin_version'       =>  'unknown'   ,
    //                  'min_local_wordpress_plugin_version'    =>  'unknown'   ,
    //                  'max_local_wordpress_plugin_version'    =>  'unknown'
    //                  )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $site_and_plugin_status =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_siteAndPluginStatusSupport\get_site_and_plugin_status()
        ;

    // -------------------------------------------------------------------------

    if ( is_string( $site_and_plugin_status ) ) {
        return array( $site_and_plugin_status ) ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $site_and_plugin_status = Array(
    //          [subscription_license_key]             => 8bb5a535f3b949223e4be34bccfe97fe
    //          [exact_subscription_type]              => paid
    //          [effective_subscription_type]          => paid
    //          [subscription_start_datetime_gmt]      => 1449313376
    //          [subscription_expiry_datetime_gmt]     => 1478564757
    //          [central_plugin_version]               => latest
    //          [min_local_source_plugin_version]      => unknown
    //          [max_local_source_plugin_version]      => unknown
    //          [min_local_wordpress_plugin_version]   => unknown
    //          [max_local_wordpress_plugin_version]   => unknown
    //          [last_central_data_retrieval_time_gmt] => 1449368884
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $site_and_plugin_status     ,
//    '$site_and_plugin_status'
//    ) ;

    // =========================================================================
    // Get the various values to display...
    // =========================================================================

    // -------------------------------------------------------------------------
    // As At
    // -------------------------------------------------------------------------

    if ( $site_and_plugin_status['last_central_data_retrieval_time_gmt'] < 1 ) {

        // ---------------------------------------------------------------------

        $light = '#FFF3DD' ;
        $dark  = '#442C00' ;
            //  Orange = #FFA500

        // ---------------------------------------------------------------------

        $as_at_container_div_style = <<<EOT
margin:2em auto 0 auto; background-color:{$light}; color:{$dark}; border:1px solid {$dark}; padding:4px 12px; max-width:640px
EOT;

        // ---------------------------------------------------------------------

        $as_at = <<<EOT
<div style="{$as_at_container_div_style}">
    <u>NOTE!</u><br />
    The information on this page is set when you (successfully) run the
    <b>Update Local Site</b> option.&nbsp; But you DON'T seem to have done this
    yet.&nbsp; Please run <b>Update Local Site</b>, to get the latest
    information...
</div>
EOT;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $datetime = gmdate(
                        'j M Y \a\t G:i (g:i a) \G\M\T'                                     ,
                        $site_and_plugin_status['last_central_data_retrieval_time_gmt']
                        ) ;

        // ---------------------------------------------------------------------

        $ago = human_time_diff(
                    $site_and_plugin_status['last_central_data_retrieval_time_gmt']     ,
                    time()
                    ) ;

        // ---------------------------------------------------------------------

        $light = '#EEF2FD' ;
        $dark  = '#0D2D8C' ;
            //  Royal Blue 2 = #436EEE

        // ---------------------------------------------------------------------

        $as_at_container_div_style = <<<EOT
margin:2em auto 0 auto; background-color:{$light}; color:{$dark}; border:1px solid {$dark}; padding:4px 12px; max-width:640px
EOT;

        // ---------------------------------------------------------------------

        $as_at = <<<EOT
<div style="{$as_at_container_div_style}">
    <u>NOTE!</u><br />
    Most of the information on this page was updated the last time you
    (successfully) ran the <b>Update Local Site</b> option.&nbsp; Which was on
    <b>{$datetime}</b> ({$ago} ago).
</div>
EOT;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // Subscription Type
    // -------------------------------------------------------------------------

    $subscription_type =
        ucfirst( $site_and_plugin_status['effective_subscription_type'] )
        ;

    // -------------------------------------------------------------------------
    // Subscription Expiry Date
    // -------------------------------------------------------------------------

    if ( ctype_digit( (string) $site_and_plugin_status['subscription_expiry_datetime_gmt'] ) ) {

        // ---------------------------------------------------------------------

        if ( $site_and_plugin_status['subscription_expiry_datetime_gmt'] < 1 ) {

            // -----------------------------------------------------------------

            $expiry_date = 'Unknown' ;

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            $now = time() ;

            // -----------------------------------------------------------------

            $htd = human_time_diff(
                        $site_and_plugin_status['subscription_expiry_datetime_gmt']  ,
                        time()
                        ) ;

            // -----------------------------------------------------------------

            if ( $now >= $site_and_plugin_status['subscription_expiry_datetime_gmt'] ) {

                $when = <<<EOT
&nbsp; &nbsp;({$htd} ago)
EOT;

            } else {

                $htd = trim( $htd , 's' ) . 's' ;

                $when = <<<EOT
&nbsp; &nbsp;(in {$htd} time)
EOT;

            }

            // -----------------------------------------------------------------

            $expiry_date = gmdate(
                                'j M Y \a\t G:i (g:i a) \G\M\T'                        ,
                                $site_and_plugin_status['subscription_expiry_datetime_gmt']
                                ) ;

            // -----------------------------------------------------------------

            $expiry_date .= $when ;

            // -----------------------------------------------------------------

        }

    } else {

        // ---------------------------------------------------------------------

        if (    trim( $site_and_plugin_status['subscription_expiry_datetime_gmt'] ) === ''
                &&
                $site_and_plugin_status['effective_subscription_type'] === 'trial'
            ) {

            $expiry_date = 'never expires' ;

        } else {

            $expiry_date =
                ucfirst( $site_and_plugin_status['subscription_expiry_datetime_gmt'] )
                ;

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // Ad Swapper Central Version
    // -------------------------------------------------------------------------

    $ad_swapper_central_version =
        ucfirst( $site_and_plugin_status['central_plugin_version'] )
        ;
        //  The "ucfirst()" is in case of "unknown"

    // -------------------------------------------------------------------------
    // Min. Required Ad Swapper Local Version
    // -------------------------------------------------------------------------

    $min_required_ad_swapper_local_version =
        ucfirst( $site_and_plugin_status['min_local_source_plugin_version'] )
        ;
        //  The "ucfirst()" is in case of "unknown"

    // -------------------------------------------------------------------------

    $min_required_wordpress_plugins_repository_version_number =
        $site_and_plugin_status['min_local_wordpress_plugin_version']
        ;

    // -------------------------------------------------------------------------
    // Current Actual Ad Swapper Local Version
    // -------------------------------------------------------------------------

    $current_ad_swapper_local_version =
        ucfirst(
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_plugin_full_version_number_with_dots()
            )
        ;
        //  The "ucfirst()" is in case of "latest"

    // -------------------------------------------------------------------------
    //  $GLOBALS['wordpress_plugins_repository_support'] = array(
    //      'is_wordpress_plugins_repository_specific_version'      =>  FALSE           ,
    //      'plugin_title_4_admin_left_menu'                        =>  'Ad Swapper'    ,
    //      'plugin_title_4_page_header'                            =>  'Ad Swapper'    ,
    //      'wordpress_plugins_repository_specific_version_number'  =>  '[*WPRSVN*]'
    //      )
    // -------------------------------------------------------------------------

    if (    array_key_exists(
                'wordpress_plugins_repository_support'      ,
                $GLOBALS
                )
            &&
            array_key_exists(
                'is_wordpress_plugins_repository_specific_version'      ,
                $GLOBALS['wordpress_plugins_repository_support']
                )
            &&
            $GLOBALS['wordpress_plugins_repository_support']['is_wordpress_plugins_repository_specific_version'] === TRUE
            &&
            array_key_exists(
                'wordpress_plugins_repository_specific_version_number'      ,
                $GLOBALS['wordpress_plugins_repository_support']
                )
            &&
            is_string( $GLOBALS['wordpress_plugins_repository_support']['wordpress_plugins_repository_specific_version_number'] )
        ) {

        // ---------------------------------------------------------------------

        $wordpress_plugins_repository_version_number =
            $GLOBALS['wordpress_plugins_repository_support']['wordpress_plugins_repository_specific_version_number']
            ;

        // ---------------------------------------------------------------------

        $temp = str_replace( '.' , '' , $wordpress_plugins_repository_version_number ) ;

        // ---------------------------------------------------------------------

        if ( ! ctype_digit( $temp ) ) {
            $wordpress_plugins_repository_version_number = '' ;
        }

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $wordpress_plugins_repository_version_number = '' ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( $wordpress_plugins_repository_version_number !== '' ) {
        $min_required_ad_swapper_local_version = $min_required_wordpress_plugins_repository_version_number ;
        $current_ad_swapper_local_version = $wordpress_plugins_repository_version_number ;
    }

    // =========================================================================
    // Define the STYLES used...
    // =========================================================================

    $table_container_div_style = <<<EOT
background-color:#E7E7E7; padding-left:2em; text-align:center;
EOT;

    // -------------------------------------------------------------------------

    $h1_style = <<<EOT
margin-top:2em; margin-bottom:0; text-align:center
EOT;

    // -------------------------------------------------------------------------

    $h2_style = <<<EOT
margin-top:2em; margin-bottom:8px
EOT;

    // -------------------------------------------------------------------------

    $h3_style = <<<EOT
text-align:center
EOT;

    // -------------------------------------------------------------------------

    $name_td_style = <<<EOT
text-align:right; width:133px; padding:4px 8px
EOT;

    // -------------------------------------------------------------------------

    $value_td_style = <<<EOT
padding:4px 8px 4px 32px; text-align:left; font-weight:bold
EOT;

    // -------------------------------------------------------------------------

    $comment_td_style = <<<EOT
padding:4px 8px 4px 32px; text-align:left
EOT;

    // -------------------------------------------------------------------------

    $help_td_style = <<<EOT
padding:4px 8px 4px 32px; text-align:left
EOT;

    // -------------------------------------------------------------------------

    $ok_p_style = <<<EOT
text-align:center
EOT;

    // -------------------------------------------------------------------------

    $ok_a_style = <<<EOT
text-decoration:none; font-size:167%; font-weight:bold; color:#0066CC
EOT;

    // =========================================================================
    // DISPLAY the site and plugin status...
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

    // -------------------------------------------------------------------------

    $page_body = <<<EOT
<h1 style="{$h1_style}">Subscription and Plugin Status</h1>

{$site_title}

{$as_at}

<h2 style="{$h2_style}">Subscription Status...</h2>

<div style="{$table_container_div_style}"><table
    border="0"
    cellpadding="0"
    cellspacing="0"
    >
    <tr>
        <td style="{$name_td_style}">Subscription Type:</td>
        <td style="{$value_td_style}">{$subscription_type}</td>
        <td style="{$comment_td_style}">&nbsp;</td>
        <td style="{$help_td_style}">&nbsp;</td>
    </tr>
    <tr>
        <td style="{$name_td_style}">Subscription Expiry Date/Time:</td>
        <td style="{$value_td_style}">{$expiry_date}</td>
        <td style="{$comment_td_style}">&nbsp;</td>
        <td style="{$help_td_style}">&nbsp;</td>
    </tr>
</table></div>

<h2 style="{$h2_style}">Plugin Status...</h2>

<div style="{$table_container_div_style}"><table
    border="0"
    cellpadding="0"
    cellspacing="0"
    >
    <tr>
        <td style="{$name_td_style}">Ad Swapper Central Version:</td>
        <td style="{$value_td_style}">{$ad_swapper_central_version}</td>
        <td style="{$comment_td_style}">&nbsp;</td>
        <td style="{$help_td_style}">&nbsp;</td>
    </tr>
    <tr>
        <td style="{$name_td_style}">Min. Required Ad Swapper Local Version:</td>
        <td style="{$value_td_style}">{$min_required_ad_swapper_local_version}</td>
        <td style="{$comment_td_style}">&nbsp;</td>
        <td style="{$help_td_style}">&nbsp;</td>
    </tr>
    <tr>
        <td style="{$name_td_style}">Current Actual Ad Swapper Local Version:</td>
        <td style="{$value_td_style}">{$current_ad_swapper_local_version}</td>
        <td style="{$comment_td_style}">&nbsp;</td>
        <td style="{$help_td_style}">&nbsp;</td>
    </tr>
</table></div>

<p style="{$ok_p_style}"><a
    href="{$ok_url}"
    style="{$ok_a_style}"
    >OK</a></p>
EOT;

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

    return <<<EOT
<div style="width:98%">
    {$page_header}
    <div style="margin-top:2em">{$page_body}</div>
</div>
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

