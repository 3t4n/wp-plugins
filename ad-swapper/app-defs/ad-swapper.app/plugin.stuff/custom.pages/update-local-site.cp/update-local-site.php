<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / CUSTOM.PAGES / UPDATE-LOCAL-SITE.CP /
//      UPDATE-LOCAL-SITE.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateLocalSite ;

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
    // Updates the Ad Swapper Local site (with the details - downloaded from the
    // Central site - of the Ad Swapper ads that the Local site can display)...
    //
    // Returns the "Update Local Site" page HTML.
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

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $_POST = Array()
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_POST , '$_POST' ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_COOKIE , '$_COOKIE' ) ;

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

    // -------------------------------------------------------------------------

    if (    array_key_exists(
                'sync_step'     ,
                $_GET
                )
            &&
            $_GET['sync_step'] === '2'
        ) {
        $question_synchronising = TRUE ;

    } else {
        $question_synchronising = FALSE ;

    }

    // -------------------------------------------------------------------------

    $sync_output = '' ;

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
    // Load the Ad Swapper datasets...
    // =========================================================================

    require_once( dirname( dirname( dirname( __FILE__ ) ) ) . '/includes/datasets-support.php' ) ;

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

    $ad_swapper_dataset_records =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetSupport\get_ad_swapper_dataset_records(
            $core_plugapp_dirs      ,
            $question_front_end
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $ad_swapper_dataset_records ) ) {
        return array( $ad_swapper_dataset_records )  ;
    }

    // -------------------------------------------------------------------------

    list(
        $app_defs_directory_tree                        ,
        $applications_dataset_and_view_definitions_etc  ,
        $all_application_dataset_definitions            ,
        $loaded_datasets
        ) = $ad_swapper_dataset_records ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $loaded_datasets = Array(
    //
    //         [ad_swapper_ads_outgoing] => Array(
    //              [title]                 => Ads - Outgoing
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1417157309
    //                      [last_modified_server_datetime_utc] => 1417157309
    //                      [key]                               => 9d9836e7-e8fd-4ca0-a848-ceef839e04ad-1417157309-463474-1176
    //                      [site_key]                          =>
    //                      [image_url]                         => http://localhost/plugdev/wp-content/uploads/2014/06/rookie-mag-postcards-from-wonderland.jpeg
    //                      [link_url]                          => http://www.google.co.nz
    //                      [alt_text]                          =>
    //                      [description]                       =>
    //                      [start_datetime]                    =>
    //                      [end_datetime]                      =>
    //                      [question_disabled]                 =>
    //                      [aspect_ratio_min]                  =>
    //                      [aspect_ratio_max]                  =>
    //                      [sequence_number]                   =>
    //                      )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [9d9836e7-e8fd-4ca0-a848-ceef839e04ad-1417157309-463474-1176] => 0
    //                  )
    //
    //              )
    //
    //          [ad_swapper_impressions] => Array(
    //              [title]                 => Impressions
    //              [records]               => Array()
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array()
    //              )
    //
    //          [ad_swapper_plugin_settings] => Array(
    //              [title]                 => Plugin Settings
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1417930162
    //                      [last_modified_server_datetime_utc] => 1417930162
    //                      [key]                               => abd1d6f4-7865-487b-a668-0fcbab0f17d3-1417930162-821262-1282
    //                      [ad_swapper_user_sid]                => gcmv-2mpy-xkwc-39kg-m9c3-939h
    //                      [plugin_registration_key]           => MoHnDSq88CX.../fU1RA7IR
    //                      [api_public_encryption_key]         => xxx
    //                      [ad_swapper_site_sid]               => 7cnc-npvh-cd3m-vyk4-czdd-72dh
    //                      [api_url_override]                  =>
    //                      )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [abd1d6f4-7865-487b-a668-0fcbab0f17d3-1417930162-821262-1282] => 0
    //                  )
    //              )
    //
    //          [ad_swapper_site_profile] => Array(
    //              [title]                 => Site Profile
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1417839045
    //                      [last_modified_server_datetime_utc] => 1417839045
    //                      [key]                               => 68fb3737-d4a7-481f-a941-b82e916b0b6c-1417839045-460169-1281
    //                      [site_title]                        => Plugdev
    //                      [home_page_url]                     => http://localhost/plugdev
    //                      [general_description]               =>
    //                      [ads_wanted_description]            =>
    //                      [sites_wanted_description]          =>
    //                      [categories_available]              =>
    //                      [categories_wanted]                 =>
    //                      )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [68fb3737-d4a7-481f-a941-b82e916b0b6c-1417839045-460169-1281] => 0
    //                  )
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $loaded_datasets ) ;

//  // =========================================================================
//  // Get the Manually Selected Sites...
//  //
//  // NOTE!
//  // -----
//  // We send the "site unique keys" of the manually selected sites to the
//  // Central site, so that it knows which sites to send the outgoing ads
//  // for...
//  // =========================================================================
//
//  $manually_selected_site_unique_keys = array() ;
//
//  $dataset_slug = 'ad_swapper_available_sites' ;
//
//  // -------------------------------------------------------------------------
//
//  foreach ( $loaded_datasets[ $dataset_slug ]['records'] as $this_record ) {
//
//      // ---------------------------------------------------------------------
//
//      if ( $this_record['question_display_this_sites_ads_on_your_site'] ) {
//
//          $manually_selected_site_unique_keys[] =
//              $this_record['site_unique_key']
//              ;
//
//      }
//
//      // ---------------------------------------------------------------------
//
//  }

    // =========================================================================
    // Get the Manually Selected Sites...
    //
    // NOTE!
    // -----
    // We send the "ad_swapper_site_sids" of the manually selected sites to
    // the Central site, so that it knows which sites to send the outgoing ads
    // for...
    // =========================================================================

//  $manually_selected_ad_swapper_site_sids = array() ;
//
//  $dataset_slug = 'ad_swapper_other_site_specific_settings' ;
//
//  // -------------------------------------------------------------------------
//
//  foreach ( $loaded_datasets[ $dataset_slug ]['records'] as $this_record ) {
//
//      // ---------------------------------------------------------------------
//
//      if ( $this_record['question_display_this_sites_ads_on_your_site'] ) {
//
//          $manually_selected_ad_swapper_site_sids[] =
//              $this_record['ad_swapper_site_sid']
//              ;
//
//      }
//
//      // ---------------------------------------------------------------------
//
//  }

    // =========================================================================
    // Get the calling site's LICENSE KEY...
    // =========================================================================

//  $calling_sites_license_key = '' ;
//
//  $dataset_slug = 'ad_swapper_site_profile' ;
//
//  // -------------------------------------------------------------------------
//
//  if (    is_array( $loaded_datasets[ $dataset_slug ]['records'] )
//          &&
//          count( $loaded_datasets[ $dataset_slug ]['records'] ) === 1
//          &&
//          array_key_exists( 0 , $loaded_datasets[ $dataset_slug ]['records'] )
//          &&
//          is_array( $loaded_datasets[ $dataset_slug ]['records'][0] )
//          &&
//          array_key_exists( 'license_key' , $loaded_datasets[ $dataset_slug ]['records'][0] )
//          &&
//          is_string( $loaded_datasets[ $dataset_slug ]['records'][0]['license_key'] )
//      ) {
//
//      $calling_sites_license_key = trim( $loaded_datasets[ $dataset_slug ]['records'][0]['license_key'] ) ;
//
//  }

    // =========================================================================
    // Prepare the data to be sent to the Ad Swapper Central site...
    // =========================================================================

    // -------------------------------------------------------------------------
    // API Data
    // -------------------------------------------------------------------------

//      'manually_selected_ad_swapper_site_sids_to_display_ads_for' =>  $manually_selected_ad_swapper_site_sids

//  $api_data = array(
//      'license_key'   =>  $calling_sites_license_key
//      ) ;

    $api_data = array() ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $api_data ) ;

    // =========================================================================
    // Make the API Call to Ad Swapper Central...
    // =========================================================================

    require_once( dirname( dirname( dirname( __FILE__ ) ) ) . '/api/api-call-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_apiCallSupport\
    // make_api_call_to_ad_swapper_central(
    //      $core_plugapp_dirs                              ,
    //      $question_front_end                             ,
    //      $app_defs_directory_tree                        ,
    //      $applications_dataset_and_view_definitions_etc  ,
    //      $all_application_dataset_definitions            ,
    //      $loaded_datasets                                ,
    //      $api_name                                       ,
    //      $api_data
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // $api_data should be an array like (eg):-
    //
    //      $api_data = array(
    //          'this'              =>  <any PHP data type>
    //          'that'              =>  <any PHP data type>
    //          ...
    //          'the_other_thing'   =>  <any PHP data type>
    //          )
    //
    // RETURNS
    //      On SUCCESS
    //          o   TRUE
    //                  If there was NO passback data (or in other words,
    //                  the Central site replied "--OK--").
    //          o   ARRAY $api_passback_data
    //                  If the Central site replied "--OK-WITH-DATA--"
    //                  (though the array may be empty)
    //
    //      On FAILURE
    //          $error_message STRING
    //              This string might be either:-
    //              o   A error message or other (eg; debugging) string,
    //                  passed back from the Central site, or;
    //              o   An error message string generated by this routine
    //                  (or one of it's sub-routines).
    // -------------------------------------------------------------------------

    $api_name = 'update-local-site' ;

    // -------------------------------------------------------------------------

    ob_start() ;

    // -------------------------------------------------------------------------

    $api_passback_data =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_apiCallSupport\make_api_call_to_ad_swapper_central(
            $core_plugapp_dirs                              ,
            $question_front_end                             ,
            $app_defs_directory_tree                        ,
            $applications_dataset_and_view_definitions_etc  ,
            $all_application_dataset_definitions            ,
            $loaded_datasets                                ,
            $api_name                                       ,
            $api_data
            ) ;

    // -------------------------------------------------------------------------

    if ( $question_synchronising ) {
        $sync_output .= ob_get_clean() ;

    } else {
        echo ob_get_clean() ;

    }

    // -------------------------------------------------------------------------

    if ( is_string( $api_passback_data ) ) {
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\debug_print_backtrace() ;
        return array( $api_passback_data ) ;
    }

    // =========================================================================
    // Process the API Passback Data (if there is any)...
    // =========================================================================

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $api_passback_data ) ;
//echo '<br />' , gettype( $api_passback_data ) ;

    if ( is_array( $api_passback_data ) ) {

        // -------------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $api_passback_data = Array(
        //
        //          [sites] => Array(
        //              [0] => Array(
        //                  [ad_swapper_site_sid]       => 2kcv-gwhz
        //                  [site_title]                => Plugdev
        //                  [home_page_url]             => http://localhost/plugdev
        //                  [general_description]       =>
        //                  [ads_wanted_description]    =>
        //                  [sites_wanted_description]  =>
        //                  [categories_available]      =>
        //                  [categories_wanted]         =>
        //                  )
        //              ...
        //              )
        //
        //          [outgoing_ads] => Array(
        //              [0] => Array(
        //                  [global_sid]          => ncgh-vzkm
        //                  [local_key]           => 542e82a17ed5ab8803342ef00a637fccbe6abd29caec550d16252856c60fa88b
        //                  [ad_swapper_site_sid] => 2kcv-gwhz
        //                  [image_url]           => http://localhost/plugdev/wp-content/uploads/2014/06/rookie-mag-postcards-from-wonderland.jpeg
        //                  [link_url]            => http://www.google.co.nz
        //                  [alt_text]            =>
        //                  [description]         =>
        //                  [start_datetime]      =>
        //                  [end_datetime]        =>
        //                  [aspect_ratio_min]    =>
        //                  [aspect_ratio_max]    =>
        //                  [sequence_number]     =>
        //                  )
        //              ...
        //              )
        //
        //          [available_web_site_collections] => Array(
        //              [0] => Array(
        //                          [site_unique_key]          => 2222-2222-2222-2222
        //                          [local_unique_key]         => d4ky-9zyg-gp2w-hdyy
        //                          [global_unique_key]        => 2222-2222-2222-2222-d4ky-9zyg-gp2w-hdyy
        //                          [name_slash_title]         => Dog Lovers
        //                          [description]              => Targeted at users who are dog lovers....
        //                          [collection_home_page_url] => http://www.ferntechnology.com/
        //                          [question_moderated]       => 1
        //                          )
        //              ...
        //              )
        //
        //          [your_web_site_collection_members] => Array(
        //              [2222-2222-2222-2222-d4ky-9zyg-gp2w-hdyy] => Array(
        //                  [0] => 2222-2222-2222-2222
        //                  ...
        //                  )
        //              [2222-2222-2222-2222-zn2w-vc3g-pvxd-vpzv] => Array(
        //                  [0] => 2222-2222-2222-2222
        //                  ...
        //                  )
        //              ...
        //              )
        //
        //          )
        //
        // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $api_passback_data ) ;

        // =====================================================================
        // SITE AND PLUGIN STATUS
        // =====================================================================

        if (    array_key_exists( 'site_and_plugin_status' , $api_passback_data )
                &&
                is_array( $api_passback_data['site_and_plugin_status'] )
            ) {

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $api_passback_data['site_and_plugin_status'] = Array(
            //          [subscription_license_key]          => 8bb5a535f3b949223e4be34bccfe97fe
            //          [exact_subscription_type]           => paid
            //          [effective_subscription_type]       => paid
            //          [subscription_start_datetime_gmt]   => 1449313376
            //          [subscription_expiry_datetime_gmt]  => 1478564757
            //          [central_plugin_version]            => latest
            //          [min_local_plugin_version]          => unknown
            //          [max_local_plugin_version]          => unknown
            //          )
            //
            // -----------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $api_passback_data['site_and_plugin_status']          ,
//    '$api_passback_data[\'site_and_plugin_status\']'
//    ) ;

            // -----------------------------------------------------------------

            require_once( $core_plugapp_dirs['apps_dot_app_dir'] . '/site-and-plugin-status-support.php' ) ;

            // ------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_siteAndPluginStatusSupport\
            // set_site_and_plugin_status(
            //      $site_and_plugin_status
            //      )
            // - - - - - - - - - - - - - -
            // $site_and_plugin_status should be like (eg):-
            //
            //      $site_and_plugin_status = array(
            //          'last_central_data_retrieval_time_gmt'  =>  <this-time()>                       ,
            //          'subscription_license_key'              =>  '' or 32-char HEX string            ,
            //          'exact_subscription_type'               =>  'trial", "paid", "manual", etc      ,
            //          'effective_subscription_type'           =>  'trial" or "paid"                   ,
            //          'subscription_start_datetime_gmt'       =>  <that-time()>                       ,
            //          'subscription_expiry_datetime_gmt'      =>  <the-other-time()>                  ,
            //          'central_plugin_version'                =>  'X.Y.Z'                             ,
            //          'min_local_plugin_version'              =>  'A.B.C'                             ,
            //          'max_local_plugin_version'              =>  'D.E.F'
            //          )
            //
            // RETURNS
            //      On SUCCESS
            //          TRUE
            //
            //      On FAILURE
            //          $error_message STRING
            // ------------------------------------------------------------------------

            $site_and_plugin_status = $api_passback_data['site_and_plugin_status'] ;

            // -----------------------------------------------------------------

            $site_and_plugin_status['last_central_data_retrieval_time_gmt'] =
                time()
                ;

            // -----------------------------------------------------------------

            $result =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_siteAndPluginStatusSupport\set_site_and_plugin_status(
                    $site_and_plugin_status
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return array( $result ) ;
            }

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // AVAILABLE SITES
        // =====================================================================

        if (    array_key_exists( 'sites' , $api_passback_data )
                &&
                is_array( $api_passback_data['sites'] )
            ) {

            // ---------------------------------------------------------------------

            require_once( dirname( __FILE__ ) . '/update-available-sites.php' ) ;

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateLocalSite\
            // update_available_sites(
            //      $core_plugapp_dirs                      ,
            //      $question_front_end                     ,
            //      $all_application_dataset_definitions    ,
            //      &$loaded_datasets                       ,
            //      $api_passback_data
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - -
            // RETURNS
            //      On SUCCESS
            //          TRUE
            //
            //      On FAILURE
            //          $error_message STRING
            // -------------------------------------------------------------------------

            $result =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateLocalSite\update_available_sites(
                    $core_plugapp_dirs                      ,
                    $question_front_end                     ,
                    $all_application_dataset_definitions    ,
                    $loaded_datasets                        ,
                    $api_passback_data
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return array( $result ) ;
            }

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // AVAILABLE ADS
        // =====================================================================

        if (    array_key_exists( 'outgoing_ads' , $api_passback_data )
                &&
                is_array( $api_passback_data['outgoing_ads'] )
            ) {

            // ---------------------------------------------------------------------

            require_once( dirname( __FILE__ ) . '/update-available-ads.php' ) ;

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateLocalSite\
            // update_available_ads(
            //      $core_plugapp_dirs                      ,
            //      $question_front_end                     ,
            //      $all_application_dataset_definitions    ,
            //      &$loaded_datasets                       ,
            //      $api_passback_data
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - -
            // RETURNS
            //      On SUCCESS
            //          TRUE
            //
            //      On FAILURE
            //          $error_message STRING
            // -------------------------------------------------------------------------

            $result =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateLocalSite\update_available_ads(
                    $core_plugapp_dirs                      ,
                    $question_front_end                     ,
                    $all_application_dataset_definitions    ,
                    $loaded_datasets                        ,
                    $api_passback_data
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return array( $result ) ;
            }

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // AVAILABLE AND SELECTED WEB SITE COLLECTIONS
        // =====================================================================

        if (    array_key_exists( 'available_web_site_collections' , $api_passback_data )
                &&
                is_array( $api_passback_data['available_web_site_collections'] )
            ) {

            // ---------------------------------------------------------------------

            require_once( dirname( __FILE__ ) . '/update-available-and-selected-web-site-collections.php' ) ;

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateLocalSite\
            // update_available_and_selected_web_site_collections(
            //      $core_plugapp_dirs                      ,
            //      $question_front_end                     ,
            //      $all_application_dataset_definitions    ,
            //      &$loaded_datasets                       ,
            //      $api_passback_data
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - -
            // RETURNS
            //      On SUCCESS
            //          TRUE
            //
            //      On FAILURE
            //          $error_message STRING
            // -------------------------------------------------------------------------

            $result =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateLocalSite\update_available_and_selected_web_site_collections(
                    $core_plugapp_dirs                      ,
                    $question_front_end                     ,
                    $all_application_dataset_definitions    ,
                    $loaded_datasets                        ,
                    $api_passback_data
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return array( $result ) ;
            }

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // THIS SITES WEB SITE COLLECTION MEMBER SITES
        // =====================================================================

        if (    array_key_exists( 'your_web_site_collection_members' , $api_passback_data )
                &&
                is_array( $api_passback_data['your_web_site_collection_members'] )
            ) {

            // ---------------------------------------------------------------------

            require_once( dirname( __FILE__ ) . '/update-this-sites-web-site-collection-members.php' ) ;

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateLocalSite\
            // update_this_sites_web_site_collection_members(
            //      $core_plugapp_dirs                      ,
            //      $question_front_end                     ,
            //      $all_application_dataset_definitions    ,
            //      &$loaded_datasets                       ,
            //      $api_passback_data
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - -
            // RETURNS
            //      On SUCCESS
            //          TRUE
            //
            //      On FAILURE
            //          $error_message STRING
            // -------------------------------------------------------------------------

            $result =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateLocalSite\update_this_sites_web_site_collection_members(
                    $core_plugapp_dirs                      ,
                    $question_front_end                     ,
                    $all_application_dataset_definitions    ,
                    $loaded_datasets                        ,
                    $api_passback_data
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return array( $result ) ;
            }

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // APPROVED WEB SITE COLLECTION MEMBERSHIPS
        // =====================================================================

        if (    array_key_exists( 'approved_web_site_collection_memberships' , $api_passback_data )
                &&
                is_array( $api_passback_data['approved_web_site_collection_memberships'] )
            ) {

            // ---------------------------------------------------------------------

            require_once( dirname( __FILE__ ) . '/update-approved-web-site-collection-memberships.php' ) ;

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateLocalSite\
            // update_approved_web_site_collection_memberships(
            //      $core_plugapp_dirs                      ,
            //      $question_front_end                     ,
            //      $all_application_dataset_definitions    ,
            //      &$loaded_datasets                       ,
            //      $api_passback_data
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - -
            // RETURNS
            //      On SUCCESS
            //          TRUE
            //
            //      On FAILURE
            //          $error_message STRING
            // -------------------------------------------------------------------------

            $result =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateLocalSite\update_approved_web_site_collection_memberships(
                    $core_plugapp_dirs                      ,
                    $question_front_end                     ,
                    $all_application_dataset_definitions    ,
                    $loaded_datasets                        ,
                    $api_passback_data
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return array( $result ) ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Update:-
    //      set_update_LOCAL_site_run_since_ads_list_last_reloaded
    // =========================================================================

    require_once( $core_plugapp_dirs['apps_plugin_stuff_dir'] . '/ad-displayer/ad-display-generic-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // set_update_LOCAL_site_run_since_ads_list_last_reloaded()
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

    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\set_update_LOCAL_site_run_since_ads_list_last_reloaded(
        TRUE
        ) ;

    // =========================================================================
    // Display the results page...
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

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/string-utils.php' ) ;

    // -------------------------------------------------------------------------

    if (    $api_passback_data === TRUE
            ||
            is_array( $api_passback_data )
        ) {

        // ---------------------------------------------------------------------
        // Synchronising ?
        //
        //      If so, skip directly to Reload Ads List...
        // ---------------------------------------------------------------------

        if ( $question_synchronising ) {

            // -----------------------------------------------------------------
            // Get "Reload Ads List" URL...
            // -----------------------------------------------------------------

            require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/url-utils.php' ) ;

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\
            // get_query_adjusted_current_page_url(
            //      $query_changes = array()        ,
            //      $question_amp = FALSE           ,
            //      $question_die_on_error = FALSE
            //      ) ;
            // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
            // Attempts to retrieve the current page URL from $_SERVER.
            //
            // If successful, returns the URL with the query part adjusted as
            // requested.
            //
            // ---
            //
            // $query_changes is like:-
            //
            //      $query_changes = array(
            //                          'name1'     =>  NULL
            //                          'name2'     =>  'xxx'
            //                          )
            //
            // Where the values supplied should NOT be URL encoded.
            // ("get_query_adjusted_current_page_url()" will urlencode() them 4 you.)
            //
            // If the value is NULL, then the query parameter is removed (if it
            // exists).  Otherwise, the query parameter is set (silently overwriting
            // any existing value).
            //
            // RETURNS
            //      o   On SUCCESS!
            //          -----------
            //          $query_adjusted_current_page_url STRING
            //
            //      o   On FAILURE!
            //          -----------
            //          If $question_die_on_error = TRUE
            //              Doesn't return
            //          If $question_die_on_error = FALSE
            //              array( $error_message STRING )
            // -------------------------------------------------------------------------

            $query_changes = array(
                'custom_page'   =>  'reload-ads-list'       ,
                'sync_step'     =>  '3'
                ) ;

            // -----------------------------------------------------------------

            $next_sync_step_url =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\get_query_adjusted_current_page_url(
                    $query_changes
                    ) ;

            // -----------------------------------------------------------------

            if ( is_array( $next_sync_step_url ) ) {
                return $next_sync_step_url ;
            }

            // -----------------------------------------------------------------
            // Get the sync output so far...
            // -----------------------------------------------------------------

            require_once( dirname( dirname( __FILE__ ) ) . '/synchronisation-support.php' ) ;

            // -----------------------------------------------------------------

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

            // -------------------------------------------------------------------------

            if ( $sync_output_so_far === FALSE ) {
                $sync_output_so_far = '' ;
                    //  ???  An ERROR MESSAGE might be better ???
            }

            // -----------------------------------------------------------------
            // Save the "Update Local Site" sync output...
            // -----------------------------------------------------------------

            $ok =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_green_message(
                    '<p>Ad Swapper Local Site UPDATED OK!</p>'
                    ) ;

            // -----------------------------------------------------------------

            $now = time() ;
                        //  Use this to force $sync_output to change - so that
                        //  "update_option()" doesn't return FALSE, due to
                        //  value not changed.

            // -----------------------------------------------------------------

            $sync_output_to_save = <<<EOT
{$sync_output_so_far}
<div style="width:90%; margin-left:1.5em; margin-top:25px; border:2px solid #CCCCCC; border-left:15px solid #CCCCCC; padding:0 1em 1.2em 1.5em; background-color:#FFFFFF">
    {$page_header}
    {$sync_output}
    <div style="margin-top:2em; width:98%">{$ok}</div>
    <div style="display:none">{$now}</div>
</div>
EOT;

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

            $result = update_option(
                            $option_name            ,
                            $sync_output_to_save
                            ) ;

            // -----------------------------------------------------------------

            if ( $result !== TRUE ) {

                $ln = __LINE__ - 2 ;

                $msg = <<<EOT
PROBLEM:&nbsp; "update_option()" failure saving sync output
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

                return array( $msg ) ;

            }

            // -----------------------------------------------------------------
            // Go direct to "Update Local Site"...
            // -----------------------------------------------------------------

            return <<<EOT
{$page_header}
{$sync_output}
<div style="margin-top:2em; width:98%">{$ok}</div>
<script type="text/javascript">
    location.href = "{$next_sync_step_url}" ;
</script>
EOT;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        $page_body = <<<EOT
<p>Ad Swapper Local Site UPDATED OK!</p>
<p><a href="{$ok_url}" style="text-decoration:none; font-size:133%; font-weight:bold">OK</a></p>
EOT;

        $page_body =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_green_message(
                $page_body
            ) ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $page_body = trim( $api_passback_data ) ;

        if ( $page_body === '' ) {
            $page_body = '&lt;no response&gt;' ;
        }

        $page_body = <<<EOT
<p style="font-size:133%; font-weight:bold">PROBLEM UPDATING LOCAL SITE!</p>
<p>{$page_body}</p>
<p><a href="{$ok_url}" style="text-decoration:none; font-size:133%; font-weight:bold">OK</a></p>
EOT;

        $page_body =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_error_message(
                $page_body
            ) ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    return <<<EOT
{$page_header}

<div style="margin-top:2em; width:98%">{$page_body}</div>

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

