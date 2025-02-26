<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / AD-DISPLAYER / WIDGET-SETTINGS-SUPPORT.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_widgetSettingsSupport ;

// =============================================================================
// load_widget_instance_settings()
// =============================================================================

function load_widget_instance_settings(
    $widget_instance_obj                            ,
    $widget_settings_dataset_slug                   ,
    &$all_application_dataset_definitions = NULL    ,
    &$loaded_datasets                     = NULL    ,
    &$core_plugapp_dirs                   = NULL    ,
    &$app_handle                          = NULL
    ) {

    // -------------------------------------------------------------------------
    // greatKiwi_byFernTec_adSwapper_local_v0x1x211_widgetSettingsSupport\
    // load_widget_instance_settings(
    //      $widget_instance_obj                            ,
    //      $widget_settings_dataset_slug                   ,
    //      &$all_application_dataset_definitions = NULL    ,
    //      &$loaded_datasets                     = NULL    ,
    //      &$core_plugapp_dirs                   = NULL    ,
    //      &$app_handle                          = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns this widget instance's currently saved settings (in a PHP
    // associative array).  If the widget instances has NO settings (yet),
    // returns an empty array.
    //
    // Set $loaded_datasets to NULL if the (ARRAY STORAGE) datasets haven't
    // been loaded yet...
    //
    // $app_handle should be (eg):-
    //      "teaser-maker"
    //      "ad-swapper"
    //      ...
    //
    // (and is only required if $loaded_datasets = NULL).
    //
    // RETURNS
    //      On SUCCESS
    //          ARRAY $widget_instance_settings
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $widget_instance_obj = greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\ad_swapper_ad_display_widget Object(
    //          [id_base]           =>  ad_swapper_ad_display_widget
    //          [name]              =>  Ad Swapper Ad Displayer
    //          [widget_options]    =>  Array(
    //                                      [classname] => widget_ad_swapper_ad_display_widget
    //                                      [description] => Drag me to the widget area(s) you want to display Ad Swapper Ads in...
    //                                      )
    //          [control_options]   =>  Array(
    //                                      [id_base] => ad_swapper_ad_display_widget
    //                                      )
    //          [number]            =>  2
    //          [id]                =>  ad_swapper_ad_display_widget-2
    //          [updated]           =>
    //          [option_name]       =>  widget_ad_swapper_ad_display_widget
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $widget_instance_obj , '$widget_instance_obj' ) ;

    // =========================================================================
    // Init.
    // =========================================================================

//  $ns = __NAMESPACE__ ;
//  $fn = __FUNCTION__  ;

    // =========================================================================
    // Load the ARRAY STORAGE datasets (if necessary)...
    // =========================================================================

    if ( ! is_array( $loaded_datasets ) ) {

        // =========================================================================
        // Get the CORE PLUGAPP DIRS (if neccesary)...
        // =========================================================================

        if ( ! is_string( $core_plugapp_dirs ) ) {

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

//          $app_handle = 'ad-swapper' ;

            // -------------------------------------------------------------------------

            $core_plugapp_dirs =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_core_plugapp_dirs(
                    $path_in_plugin     ,
                    $app_handle
                    ) ;

            // ---------------------------------------------------------------------

        }

        // =========================================================================
        // Load the Ad Swapper datasets...
        // =========================================================================

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
            return $dataset_records ;
        }

        // -------------------------------------------------------------------------

        list(
            $app_defs_directory_tree                        ,
            $applications_dataset_and_view_definitions_etc  ,
            $all_application_dataset_definitions            ,
            $loaded_datasets
            ) = $dataset_records ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $loaded_datasets = Array(
    //
    //          [ad_swapper_ad_slots] => Array(
    //              [title]         => Ad Slots
    //              [records]       => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1420622748
    //                      [last_modified_server_datetime_utc] => 1420622748
    //                      [key]                               => cf94d256-ece4-4b84-af71-6d562059ee4f-1420622748-483667-1405
    //                      [local_key]                         => 971c0f797cbb593f6a441dabad4494b76b4424a472e8afc99aaad1f82d1a7142
    //                      [name]                              => right-sidebar
    //                      [title]                             => Right Sidebar
    //                      [description]                       =>
    //                      [width_nominal]                     => 300
    //                      [width_min]                         =>
    //                      [width_max]                         =>
    //                      [height_nominal]                    => 400
    //                      [height_min]                        => 32
    //                      [height_max]                        => 1000
    //                      [sequence_number]                   => 10
    //                      [global_id]                         => 10
    //                      )
    //
    //                  [1] => Array(
    //                      [created_server_datetime_utc]       => 1420699900
    //                      [last_modified_server_datetime_utc] => 1420699900
    //                      [key]                               => 8d00c863-ccf8-467b-bcf0-27f1f176b645-1420699900-596488-1406
    //                      [local_key]                         => 554358ae4516ad3693af16a4d1d617b1b6f1fc61ff7cac5361d368c07e6358d2
    //                      [name]                              => full-width-footer
    //                      [title]                             => Full-Width Footer
    //                      [description]                       =>
    //                      [width_nominal]                     => 1000
    //                      [width_min]                         => 300
    //                      [width_max]                         => 1000
    //                      [height_nominal]                    => 300
    //                      [height_min]                        => 32
    //                      [height_max]                        => 600
    //                      [sequence_number]                   => 20
    //                      [global_id]                         => 11
    //                      )
    //
    //                  )
    //
    //              [key_field_slug] => key
    //
    //              [record_indices_by_key] => Array(
    //                  [cf94d256-ece4-4b84-af71-6d562059ee4f-1420622748-483667-1405] => 0
    //                  [8d00c863-ccf8-467b-bcf0-27f1f176b645-1420699900-596488-1406] => 1
    //                  )
    //
    //              )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $loaded_datasets ) ;

    // =========================================================================
    // Loop over the "Widget Settings"
    // =========================================================================

    $widget_instance_settings = array() ;

    // -------------------------------------------------------------------------

    foreach ( $loaded_datasets[ $widget_settings_dataset_slug ]['records'] as $this_widget_settings_record ) {

        if ( $this_widget_settings_record['widget_id'] === $widget_instance_obj->id ) {
            $widget_instance_settings = $this_widget_settings_record['widget_settings'] ;
            break ;
        }

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $widget_instance_settings ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

