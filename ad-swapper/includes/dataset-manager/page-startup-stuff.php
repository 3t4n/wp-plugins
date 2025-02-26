<?php

// *****************************************************************************
// <SOME-PLUGIN>.APP / INCLUDES / DATASET-MANAGER / PAGE-STARTUP-STUFF.PHP
// (C) 2013-2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// get_page_startup_stuff()
// =============================================================================

function get_page_startup_stuff(
    $app_handle             ,
    $question_front_end
    ) {

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

    // =========================================================================
    // Init.
    // =========================================================================

//  $ns = __NAMESPACE__ ;
//  $fn = __FUNCTION__  ;

    // =========================================================================
    // Get the CORE PLUGAPP DIRS...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\
    // get_core_plugapp_dirs(
    //      $path_in_plugin         ,
    //      $app_handle = NULL
    //      )
    // - - - - - - - - - - - - - - - - - -
    // Returns the dirspecs of the main dirs used in a given app.  Ie:-
    //
    //      array(
    //          'plugin_root_dir'                   =>  "xxx"   ,
    //          'plugins_includes_dir'              =>  "xxx"   ,
    //          'plugins_app_defs_dir'              =>  "xxx"   ,
    //          'dataset_manager_includes_dir'      =>  "xxx"   ,   //  (1)
    //          'apps_dot_app_dir'                  =>  "xxx"   ,   //  (2)
    //          'apps_plugin_stuff_dir'             =>  "xxx"   ,   //  (3)
    //          )
    //
    //      (1) This is where most of the "Dataset Manager" includes files
    //          are stored.
    //
    //      (2) If $app_handle === NULL, the returned $apps_dot_app_dir
    //          is NULL too.
    //
    //      (3) If $app_handle === NULL, the returned $apps_plugin_stuff_dir
    //          is NULL too.
    //
    // ---
    //
    // $path_in_plugin should be a file, directory or link path in the
    // plugin (or "app") from which this function is called.  Typically,
    // one uses __FILE__ for this purpose.  Eg:-
    //
    //      \greatKiwi_byFernTec_adSwapper_local_pluginVersion_appsAPI\get_single_app_defs_root_dir( __FILE__ ) ;
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

//  $app_handle = 'xxx' ;

    // -------------------------------------------------------------------------

    $core_plugapp_dirs =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_core_plugapp_dirs(
            $path_in_plugin     ,
            $app_handle
            ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
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
    // -------------------------------------------------------------------------

    // =========================================================================
    // LOAD and RETURN the APPLICATION'S DATASET DEFINITIONS and DATASETS...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // load_datasets(
    //      $app_handle             ,
    //      $question_front_end     ,
    //      $core_plugapp_dirs
    //      )
    // - - - - - - - - - - - - - - -
    // Loads and returns the application's dataset definitions and records.
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

    $result = load_datasets(
                    $app_handle             ,
                    $question_front_end     ,
                    $core_plugapp_dirs
                    ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
    }

    // -------------------------------------------------------------------------

    list(
        $app_defs_directory_tree                        ,
        $applications_dataset_and_view_definitions_etc  ,
        $all_application_dataset_definitions            ,
        $loaded_datasets
        ) = $result ;

    // -------------------------------------------------------------------------

    return array(
                $core_plugapp_dirs                              ,
                $app_defs_directory_tree                        ,
                $applications_dataset_and_view_definitions_etc  ,
                $all_application_dataset_definitions            ,
                $loaded_datasets
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// load_datasets()
// =============================================================================

function load_datasets(
    $app_handle             ,
    $question_front_end     ,
    $core_plugapp_dirs
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // load_datasets(
    //      $app_handle             ,
    //      $question_front_end     ,
    //      $core_plugapp_dirs
    //      )
    // - - - - - - - - - - - - - - -
    // Loads and returns the application's dataset definitions and records.
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

    // =========================================================================
    // Init.
    // =========================================================================

//  $ns = __NAMESPACE__ ;
//  $fn = __FUNCTION__  ;

    // =========================================================================
    // Support Routines...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/common.php' ) ;

    // =========================================================================
    // LOAD the APPLICATION'S DATASET DEFINITIONS...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // load_dataset_definitions_and_initialise_array_storage(
    //      $core_plugapp_dirs                      ,
    //      $target_apps_apps_dir_relative_path     ,
    //      $question_front_end
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // $target_apps_apps_dir_relative_path is like (eg):-
    //      o   "teaser-maker"
    //      o   "basepress-users/reporting-module"
    //      o   etc.
    //
    // RETURNS
    //      o   On SUCCESS
    //              ARRAY(
    //                  $app_defs_directory_tree                        ,
    //                  $applications_dataset_and_view_definitions_etc  ,
    //                  $all_application_dataset_definitions
    //                  )
    //
    //      o   On FAILURE
    //              $error_message STRING
    // -------------------------------------------------------------------------

    $target_apps_apps_dir_relative_path = $app_handle ;

//  $question_front_end                 = TRUE        ;     // ???

    // -------------------------------------------------------------------------

    $result = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\load_dataset_definitions_and_initialise_array_storage(
                    $core_plugapp_dirs                      ,
                    $target_apps_apps_dir_relative_path     ,
                    $question_front_end
                    ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
    }

    // -------------------------------------------------------------------------

    list(
        $app_defs_directory_tree                        ,
        $applications_dataset_and_view_definitions_etc  ,
        $all_application_dataset_definitions
        ) = $result ;

    // =========================================================================
    // LOAD the application's DATASETS...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // load_applications_datasets(
    //      $all_application_dataset_definitions    ,
    //      $core_plugapp_dirs                      ,
    //      &$loaded_datasets = array()
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Makes sure that (on return):-
    //      $loaded_datasets
    // contains the title, records, key field slug and record indices by key
    // of all the datasets defined in:-
    //      $all_application_dataset_definitions
    //
    // In other words:-
    //
    //      o   Those datasets already in both:-
    //              $all_application_dataset_definitions, and;
    //              $loaded_datasets
    //          are ignored (their existing data is left as is).
    //
    // But:-
    //
    //      o   Those datasets in:-
    //              $all_application_dataset_definitions
    //          but not yet in:-
    //              $loaded_datasets
    //          are added to:-
    //              $loaded_datasets
    //
    // NOTE!
    // =====
    // The input $loaded_datasets must be either:-
    //      o   The empty array, or;
    //      o   An array like:-
    //              $loaded_datasets = array(
    //                  '<this_dataset_slug>'   => array(
    //                      'title'                     =>  "xxx"           ,
    //                      'records'                   =>  array(...)      ,
    //                      'key_field_slug'            =>  "yyy"           ,
    //                      'record_indices_by_key'     =>  array(...)
    //                      )
    //                  ...
    //                  )
    //
    // RETURNS
    //      o   On SUCCESS
    //              TRUE
    //
    //      o   On FAILURE
    //              $error_message STRING
    // -------------------------------------------------------------------------

    $loaded_datasets = array() ;

    // -------------------------------------------------------------------------

    $result =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\load_applications_datasets(
            $all_application_dataset_definitions    ,
            $core_plugapp_dirs                      ,
            $loaded_datasets
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
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

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $loaded_datasets ) ;

    // =========================================================================
    // Return the results...
    // =========================================================================

    return array(
        $app_defs_directory_tree                        ,
        $applications_dataset_and_view_definitions_etc  ,
        $all_application_dataset_definitions            ,
        $loaded_datasets
        ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

