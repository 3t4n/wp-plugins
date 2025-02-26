<?php

// *****************************************************************************
// PROTO-PRESS / ADMIN / MANAGE-DATASET.PHP
// (C) 2013 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// manage_dataset()
// =============================================================================

function manage_dataset(
    $caller_app_slash_plugins_global_namespace      ,
    $dataset_manager_home_page_title                ,
    $caller_apps_includes_dir                       ,
    $all_application_dataset_definitions            ,
    $dataset_slug                                   ,
    $question_front_end
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\manage_dataset(
    //      $caller_app_slash_plugins_global_namespace      ,
    //      $dataset_manager_home_page_title                ,
    //      $caller_apps_includes_dir                       ,
    //      $all_application_dataset_definitions            ,
    //      $dataset_slug                                   ,
    //      $question_front_end
    //      )
    // - - - - - - - - - - - - - - - -
    // Creates and returns a screen for adding, editing and deleting records
    // of the specified dataset.
    //
    // $all_application_dataset_definitions should be like (eg):-
    //
    //      $all_application_dataset_definitions = Array(
    //
    //          [projects] => Array(    //  <== "dataset_slug"
    //              [dataset_slug]              => projects
    //              [dataset_name_singular]     => project
    //              [dataset_name_plural]       => projects
    //              [dataset_title_singular]    => Project
    //              [dataset_title_plural]      => Projects
    //              [basepress_dataset_handle]  => array(...)
    //              )
    //
    //          ...
    //
    //          )
    //
    // NOTE!
    // =====
    // The returned page may be the page requested proper.  Or it may be just
    // the page header/footer, and an error message.
    //
    // RETURNS:-
    //      $page_html STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $_GET = array(
    //                  [page] => protoPress
    //                  )
    //
    //      --OR--
    //
    //      $_GET = array(
    //                  [page]          =>  protoPress
    //                  [action]        =>  manage-dataset
    //                  [dataset_slug]  =>  projects
    //                  )
    //
    // -------------------------------------------------------------------------

//pr( $_GET ) ;

    // =========================================================================
    // Get the CORE PLUGAPP DIRS...
    // =========================================================================

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

        return standard_dataset_manager_error(
                    $dataset_manager_home_page_title    ,
                    $msg                                ,
                    $caller_apps_includes_dir           ,
                    $question_front_end
                    ) ;

    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $app_handle ) ;

    // -------------------------------------------------------------------------

    $core_plugapp_dirs =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_core_plugapp_dirs(
            $path_in_plugin     ,
            $app_handle
            ) ;

    // =========================================================================
    // Get the specified dataset's DATASET MANAGER DATASET DEFINITION...
    // =========================================================================

    $selected_datasets_dmdd = $all_application_dataset_definitions[ $dataset_slug ] ;
                                    //  dmdd = Dataset Manager Dataset Definition

    // =========================================================================
    // Identify the STORAGE MODE...
    // =========================================================================

    if (    array_key_exists( 'storage_method' , $selected_datasets_dmdd )
            &&
            $selected_datasets_dmdd['storage_method'] === 'mysql'
        ) {
        $storage_mode = 'mysql' ;

    } else {
        $storage_mode = 'array-storage' ;

    }

    // =========================================================================
    // LOAD the DATASET RECORDS...
    // =========================================================================

    if ( $storage_mode === 'mysql' ) {

        // =====================================================================
        // FROM MYSQL...
        // =====================================================================

        require_once( $caller_apps_includes_dir . '/dataset-manager/mysql-support-4-manage-dataset.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\
        // load_table_records(
        //      $core_plugapp_dirs                          ,
        //      $all_application_dataset_definitions        ,
        //      $dataset_slug                               ,
        //      $question_front_end
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - -
        // Returns the records in the MySQL table associated with the specified
        // dataset.
        //
        // By default, loads ALL the records in the dataset's MySQL table.
        //
        // But if a:-
        //      <dataset_definition>['mysql_overrides']['load_all_records_function']
        //
        // was specified, will call that to do the loading (which allows you to load
        // whatever records you want - those for the currently logged-in (WordPress)
        // user, for example).
        //
        // RETURNS
        //      On SUCCESS
        //          ARRAY $table_records
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        $dataset_records =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\load_table_records(
                $core_plugapp_dirs                          ,
                $all_application_dataset_definitions        ,
                $dataset_slug                               ,
                $question_front_end
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $dataset_records ) ) {

            return standard_dataset_manager_error(
                $dataset_manager_home_page_title    ,
                $dataset_records                    ,
                $caller_apps_includes_dir           ,
                $question_front_end
                ) ;

        }

        // ---------------------------------------------------------------------

    } else {

        // =====================================================================
        // FROM ARRAY STORAGE...
        // =====================================================================

        require_once( $caller_apps_includes_dir . '/array-storage.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\load_numerically_indexed(
        //      $dataset_name                       ,
        //      $question_die_on_error = FALSE
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Loads and returns the specified PHP numerically indexed array.
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

        $question_die_on_error = TRUE ;

        $dataset_records = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\load_numerically_indexed(
                                $dataset_slug               ,
                                $question_die_on_error
                                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $dataset_records ) ) {

            return standard_dataset_manager_error(
                $dataset_manager_home_page_title    ,
                $dataset_records                    ,
                $caller_apps_includes_dir           ,
                $question_front_end
                ) ;

        }

        // ---------------------------------------------------------------------

    }

//pr( $dataset_records ) ;

    // =========================================================================
    // Get the "Dataset Title" (for error reporting purposes)...
    // =========================================================================

    if (    isset( $selected_datasets_dmdd['dataset_title_plural'] )
            &&
            is_string( $selected_datasets_dmdd['dataset_title_plural'] )
            &&
            trim( $selected_datasets_dmdd['dataset_title_plural'] ) !== ''
        ) {
        $dataset_title = $selected_datasets_dmdd['dataset_title_plural'] ;

    } else {
        $dataset_title = to_title( $dataset_slug ) ;

    }

    // =========================================================================
    // GET the ORPHANED RECORDS (if needed)...
    // =========================================================================

    // -------------------------------------------------------------------------
    // orphaned_records_supported()
    // - - - - - - - - - - - - - -
    // RETURNS TRUE or FALSE - depending on whether or not we should support
    // the handling of "orphaned records".  (In other words, should we:-
    //      o   Display the "show/hide orphaned records" button, and;
    //      o   Support the deleting of orphaned records,
    //      o   etc.
    //
    // NOTE!
    // =====
    // 1.   Orphaned records are supported unless the plugin's
    //          $version_names
    //
    //      array (if the plugin has one), has:-
    //          'support_orphaned_records'  =  FALSE
    //
    //      See:-
    //          \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginMaker\
    //          get_all_version_names()
    //
    //      in the plugin's:-
    //          .../app-defs/xxx.app/plugin.stuff/version-names.php
    //
    //      file (for more info).
    //
    // 2.   Thus orphaned records ARE supported - unless you explicitly switch
    //      OFF that support in the plugin's "version-names.php" file.
    // -------------------------------------------------------------------------

    $orphaned_record_indices = NULL ;

    // -------------------------------------------------------------------------

//  if (    (   isset( $selected_datasets_dmdd['dataset_records_table']['error_if_orphaned_records'] )
//              &&
//              $selected_datasets_dmdd['dataset_records_table']['error_if_orphaned_records'] === TRUE
//          )
//          ||
//          question_show_orphaned_records_button( $selected_datasets_dmdd )
//      ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // orphaned_records_supported(
    //      $app_handle = NULL
    //      )
    // - - - - - - - - - - - - - -
    // RETURNS
    //      o   On SUCCESS
    //              TRUE or FALSE - depending on whether or not we should
    //              support the handling of "orphaned records".  (In other
    //              words, should we:-
    //              -   Display the "show/hide orphaned records" button, and;
    //              -   Support the deleting of orphaned records,
    //              -   etc.)
    //
    //      o   On FAILURE
    //              $error_message STRING
    //
    // NOTE!
    // =====
    // 1.   Orphaned records are supported unless the plugin's
    //          $version_names
    //
    //      array (if the plugin has one), has:-
    //          'support_orphaned_records' = FALSE
    //
    //      See:-
    //          \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginMaker\
    //          get_all_version_names()
    //
    //      in the plugin's:-
    //          .../app-defs/xxx.app/plugin.stuff/version-names.php
    //
    //      file (for more info).
    //
    // 2.   Thus orphaned records ARE supported - unless you explicitly switch
    //      OFF that support in the plugin's "version-names.php" file.
    //
    // 3.   $app_handle defaults to:-
    //          $_GET['application']
    //      (if it exists).
    // -------------------------------------------------------------------------

    if ( orphaned_records_supported() ) {

        // ---------------------------------------------------------------------

        require_once( dirname( __FILE__ ) . '/orphaned-records.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_orphaned_record_indices(
        //      $all_application_dataset_definitions    ,
        //      $caller_apps_includes_dir               ,
        //      $selected_datasets_dmdd                 ,
        //      $dataset_records                        ,
        //      $dataset_slug                           ,
        //      $dataset_title                          ,
        //      $question_front_end
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Returns a (possibly empty) ARRAY contain the indices (in the
        // $dataset_records array), of the orphaned records in that array (if
        // there are any).
        //
        // RETURNS
        //      o   On SUCCESS
        //          - - - - -
        //          (Possibly empty) $orphaned_record_indices ARRAY
        //
        //      o   On FAILURE
        //          - - - - -
        //          $error_message STRING
        // -------------------------------------------------------------------------

//      if ( $question_front_end ) {
//          $data_for = 'dhtmlx-grid' ;
//
//      } else {
//          $data_for = 'wp-list-table' ;
//
//      }

        // ---------------------------------------------------------------------

        $orphaned_record_indices = get_orphaned_record_indices(
                                        $all_application_dataset_definitions    ,
                                        $caller_apps_includes_dir               ,
                                        $selected_datasets_dmdd                 ,
                                        $dataset_records                        ,
                                        $dataset_slug                           ,
                                        $dataset_title                          ,
                                        $question_front_end
                                        ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $orphaned_record_indices ) ) {

            return standard_dataset_manager_error(
                        $dataset_manager_home_page_title    ,
                        $orphaned_record_indices            ,
                        $caller_apps_includes_dir           ,
                        $question_front_end
                        ) ;

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // DO "ERROR IF ORPHANED INDICES"...
    // =========================================================================

/*
    if (    isset( $selected_datasets_dmdd['dataset_records_table']['error_if_orphaned_records'] )
            &&
            $selected_datasets_dmdd['dataset_records_table']['error_if_orphaned_records'] === TRUE
            &&
            count( $orphaned_record_indices ) > 0
        ) {

        // =====================================================================
        // Handle Form Submission ?
        // =====================================================================

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $_POST = Array()
        //
        //      --OR--
        //
        //      $_POST = Array(
        //                  [delete-orphaned-records] => true
        //                  )
        //
        // ---------------------------------------------------------------------

//pr( $_POST ) ;

        // ---------------------------------------------------------------------

        if (    count( $_POST ) > 0
                &&
                isset( $_POST['delete_orphaned_records'] )
                &&
                $_POST['delete_orphaned_records'] === 'true'
            ) {

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\delete_orphaned_records(
            //      $all_application_dataset_definitions    ,
            //      $caller_apps_includes_dir               ,
            //      $selected_datasets_dmdd                 ,
            //      &$dataset_records                       ,
            //      $dataset_slug                           ,
            //      $dataset_title                          ,
            //      $question_front_end                     ,
            //      $orphaned_record_indices
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
            // Deletes the specified orphaned records (from $dataset records - both
            // in memory and on disk)...
            //
            // RETURNS
            //      o   On SUCCESS
            //          - - - - -
            //          TRUE
            //
            //      o   On FAILURE
            //          - - - - -
            //          $error_message STRING
            // -------------------------------------------------------------------------

            $result = delete_orphaned_records(
                            $all_application_dataset_definitions    ,
                            $caller_apps_includes_dir               ,
                            $selected_datasets_dmdd                 ,
                            $dataset_records                        ,
                            $dataset_slug                           ,
                            $dataset_title                          ,
                            $question_front_end                     ,
                            $orphaned_record_indices
                            ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {

                return standard_dataset_manager_error(
                            $dataset_manager_home_page_title    ,
                            $orphaned_record_indices[0]         ,
                            $caller_apps_includes_dir           ,
                            $question_front_end
                            ) ;

            }

            // -----------------------------------------------------------------

        } else {

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_orphaned_records_table_html(
            //      $all_application_dataset_definitions    ,
            //      $caller_apps_includes_dir               ,
            //      $selected_datasets_dmdd                 ,
            //      $dataset_records                        ,
            //      $dataset_slug                           ,
            //      $dataset_title                          ,
            //      $question_front_end                     ,
            //      $orphaned_record_indices                ,
            //      $data_for
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
            // Returns the HTML for a table to display/delete the orphaned records in
            // the dataset.
            //
            // $data_for must be one of:-
            //      o   'wp-list-table'
            //      o   'dhtmlx-grid'
            //
            // RETURNS
            //      o   On SUCCESS
            //          - - - - -
            //          (Possibly empty) $orphaned_records_html STRING
            //
            //      o   On FAILURE
            //          - - - - -
            //          array( $error_message STRING )
            // -------------------------------------------------------------------------

            if ( $question_front_end ) {
                $data_for = 'dhtmlx-grid' ;

            } else {
                $data_for = 'wp-list-table' ;

            }

            // -----------------------------------------------------------------

            $orphaned_records_table_html = get_orphaned_records_table_html(
                                                $all_application_dataset_definitions    ,
                                                $caller_apps_includes_dir               ,
                                                $selected_datasets_dmdd                 ,
                                                $dataset_records                        ,
                                                $dataset_slug                           ,
                                                $dataset_title                          ,
                                                $question_front_end                     ,
                                                $orphaned_record_indices                ,
                                                $data_for
                                                ) ;

            // -----------------------------------------------------------------

            if ( is_array( $orphaned_records_table_html ) ) {
                $orphaned_records_table_html = $orphaned_records_table_html[0] ;
            }

            // -----------------------------------------------------------------

            $onclick = <<<EOT
document.forms['delete_orphaned_records'].submit()
EOT;

            // -----------------------------------------------------------------

            $out = <<<EOT
<br />
Oops, the "{$dataset_title}" dataset contains the following orphaned records...
<div style="position:relative; top:-3.5em; padding-right:1em">{$orphaned_records_table_html}
<a href="javascript:void()" onclick="{$onclick}">Click here to DELETE the ORPHANED RECORDS...</a></div>
<form name="delete_orphaned_records" action="" method="POST"><input type="hidden" name="delete_orphaned_records" value="true" /></form>
EOT;

            // -----------------------------------------------------------------

            $out = str_replace( "\n" , '' , $out ) ;

            // -----------------------------------------------------------------

            return standard_dataset_manager_error(
                        $dataset_manager_home_page_title    ,
                        $out                                ,
                        $caller_apps_includes_dir           ,
                        $question_front_end
                        ) ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }
*/

    // =========================================================================
    // Handle "DELETE ORPHANED RECORDS" form submission...
    // =========================================================================

//  if (    question_show_orphaned_records_button( $selected_datasets_dmdd )
//          &&

    if (    is_array( $orphaned_record_indices )
            &&
            count( $orphaned_record_indices ) > 0
        ) {

        // =====================================================================
        // Handle Form Submission ?
        // =====================================================================

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $_POST = Array()
        //
        //      --OR--
        //
        //      $_POST = Array(
        //                  [delete-orphaned-records] => true
        //                  )
        //
        // ---------------------------------------------------------------------

//pr( $_POST ) ;

        // ---------------------------------------------------------------------

        if (    count( $_POST ) > 0
                &&
                array_key_exists( 'delete_orphaned_records' , $_POST )
                &&
                $_POST['delete_orphaned_records'] === 'true'
            ) {

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
            // delete_orphaned_records(
            //      $all_application_dataset_definitions    ,
            //      $caller_apps_includes_dir               ,
            //      $selected_datasets_dmdd                 ,
            //      &$dataset_records                       ,
            //      $dataset_slug                           ,
            //      $dataset_title                          ,
            //      $question_front_end                     ,
            //      $orphaned_record_indices
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
            // Deletes the specified orphaned records (from $dataset records - both
            // in memory and on disk)...
            //
            // RETURNS
            //      o   On SUCCESS
            //          - - - - -
            //          TRUE
            //
            //      o   On FAILURE
            //          - - - - -
            //          $error_message STRING
            // -------------------------------------------------------------------------

            $result = delete_orphaned_records(
                            $all_application_dataset_definitions    ,
                            $caller_apps_includes_dir               ,
                            $selected_datasets_dmdd                 ,
                            $dataset_records                        ,
                            $dataset_slug                           ,
                            $dataset_title                          ,
                            $question_front_end                     ,
                            $orphaned_record_indices
                            ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {

                return standard_dataset_manager_error(
                            $dataset_manager_home_page_title    ,
                            $orphaned_record_indices[0]         ,
                            $caller_apps_includes_dir           ,
                            $question_front_end
                            ) ;

            }

            // -----------------------------------------------------------------

            $orphaned_record_indices = get_orphaned_record_indices(
                                            $all_application_dataset_definitions    ,
                                            $caller_apps_includes_dir               ,
                                            $selected_datasets_dmdd                 ,
                                            $dataset_records                        ,
                                            $dataset_slug                           ,
                                            $dataset_title                          ,
                                            $question_front_end
                                            ) ;

            // -----------------------------------------------------------------

            if ( is_string( $orphaned_record_indices ) ) {

                return standard_dataset_manager_error(
                            $dataset_manager_home_page_title    ,
                            $orphaned_record_indices[0]         ,
                            $caller_apps_includes_dir           ,
                            $question_front_end
                            ) ;

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SINGLE RECORD MODE ?
    // =========================================================================

    if (    array_key_exists( 'question_single_record_mode' , $selected_datasets_dmdd )
            &&
            $selected_datasets_dmdd['question_single_record_mode'] === TRUE
        ) {

        // ---------------------------------------------------------------------
        // YES - WE HAVE "SINGLE RECORD MODE"
        // ==================================
        // So now we want to call:-
        //      "add_edit_record()"
        //
        // But "add_edit_record()" expects EITHER:-
        //
        //      o   $_GET['action'] = 'add-record'
        //
        // OR:-
        //
        //      o   $_GET['action']     = 'edit-record'
        //          $_GET['record_key'] = '<some record key>'
        //
        // (on entry).
        //
        // So now we have to figure out which one applies...
        //
        // ---
        //
        // It depends on whether or not there are CALLER-SPECIFIC RECORDS, as
        // follows:-
        //
        //      o   CALLER SPECIFIC RECORDS = YES
        //
        //              If the dataset HAS a caller specific record for the
        //              current caller, then we're EDITING that record.
        //
        //              Otherwise, we're ADDING a caller specific record for
        //              the current caller
        //
        //      o   CALLER SPECIFIC RECORDS = NO
        //
        //              If the dataset is EMPTY, then we're ADDING the first
        //              and only record.
        //
        //              Otherwise, we're EDITING the first and only record.
        //
        // ---------------------------------------------------------------------

        // =====================================================================
        // No matter whether we have CALLER SPECIFIC RECORDS or not, we need
        // to know the dataset's:-
        //      $key_field_slug
        // =====================================================================

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_dataset_key_field_slug(
        //      $all_application_dataset_definitions    ,
        //      $dataset_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Returns the dataset's (array storage) key field slug.
        //
        // RETURNS
        //      o   $array_storage_key_field_slug STRING on SUCCESS
        //      o   array( $error_message STRING ) on FAILURE
        // -------------------------------------------------------------------------

        $key_field_slug = get_dataset_key_field_slug(
                                $all_application_dataset_definitions    ,
                                $dataset_slug
                                ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $key_field_slug ) ) {

            return standard_dataset_manager_error(
                        $dataset_manager_home_page_title    ,
                        $key_field_slug[0]                  ,
                        $caller_apps_includes_dir           ,
                        $question_front_end
                        ) ;

        }

        // =====================================================================
        // Caller Specific Records ?
        // =====================================================================

        if (    array_key_exists( 'question_caller_specific_record_mode' , $selected_datasets_dmdd )
                &&
                $selected_datasets_dmdd['question_caller_specific_record_mode'] === TRUE
            ) {

            // =================================================================
            // CALLER SPECIFIC RECORDS = YES
            // =================================================================

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
            // get_dataset_record_indices_by_key(
            //      $dataset_title      ,
            //      $dataset_records    ,
            //      $key_field_slug
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
            // RETURNS:-
            //      o   (array) $record_indices_by_id on SUCCESS
            //      o   (string) $error_message on FAILURE
            // -------------------------------------------------------------------------

            $record_indices_by_key =
                get_dataset_record_indices_by_key(
                    $dataset_title      ,
                    $dataset_records    ,
                    $key_field_slug
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $record_indices_by_key ) ) {

                return standard_dataset_manager_error(
                            $dataset_manager_home_page_title    ,
                            $record_indices_by_key              ,
                            $caller_apps_includes_dir           ,
                            $question_front_end
                            ) ;

            }

            // -----------------------------------------------------------------

            require_once( $caller_apps_includes_dir . '/dataset-manager/add-edit-record_get-record-to-be-edited.php' ) ;

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
            // get_existing_record_to_be_edited(
            //      $selected_datasets_dmdd     ,
            //      $dataset_records            ,
            //      $record_indices_by_key      ,
            //      $dataset_title
            //      )
            // - - - - - - - - - - - - - - - - -
            // Returns the record to be edited.  More specifically:-
            //
            //      o   If the dataset supports CALLER SPECIFIC records, returns
            //          the record returned by the dataset specific:-
            //              "get_caller_specific_record()"
            //          routine.
            //
            //          Unless no such record exists, in which case it returns
            //          FALSE.
            //
            //      o   If the dataset DOESN'T support CALLER SPECIFIC records,
            //          returns the record specified by:-
            //                  $_GET['record_key']
            //
            // ---
            //
            // ONLY works if we're EDITING a record !!!  SHOULDN'T be called
            // if we're ADDING a record (or neither editing nor adding a record).
            //
            // ---
            //
            // Called from:-
            //
            //      o   Function:   "create_zebra_form_object_instance()"
            //              --  In file:  add-edit-record_create-zebra-form.php
            //              --  Whilst:   Creating the form to be edited.
            //
            //      o   Function:   "handle_zebra_form_submission()"
            //              --  In file:  add-edit-record_submission-handler.php
            //              --  Whilst:   Handling the form submission.
            //
            // ---
            //
            // RETURNS:-
            //      o   On SUCCESS!
            //          - - - - - -
            //          array(
            //              $record_to_be_edited_key   STRING   ,
            //              $record_to_be_edited_index INT      ,
            //              $record_to_be_edited       ARRAY
            //              )
            //
            //      o   On FAILURE!
            //          - - - - - -
            //              ##  FALSE if:-
            //                  --  The dataset supports CALLER SPECIFIC RECORDS,
            //                      AND;
            //                  --  NO record for the current caller was found.
            //          --or--
            //              ##  $error_message STRING
            // -------------------------------------------------------------------------

            $result = get_existing_record_to_be_edited(
                            $selected_datasets_dmdd     ,
                            $dataset_records            ,
                            $record_indices_by_key      ,
                            $dataset_title
                            ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {

                return standard_dataset_manager_error(
                            $dataset_manager_home_page_title    ,
                            $result                             ,
                            $caller_apps_includes_dir           ,
                            $question_front_end
                            ) ;

            }

            // -----------------------------------------------------------------

            if ( $result === FALSE ) {

                // -------------------------------------------------------------

                $_GET['action'] = 'add-record' ;

                // -------------------------------------------------------------

            } else {

                // -------------------------------------------------------------

                list(
                    $record_to_be_edited_key    ,
                    $record_to_be_edited_index  ,
                    $record_to_be_edited
                    ) = $result ;

                $_GET['action']     = 'edit-record' ;

                $_GET['record_key'] = $record_to_be_edited_key ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        } else {

            // =================================================================
            // CALLER SPECIFIC RECORDS = NO
            // =================================================================

            if ( count( $dataset_records ) > 0 ) {

                // -------------------------------------------------------------

                $_GET['action']     = 'edit-record' ;
                $_GET['record_key'] = $dataset_records[0][ $key_field_slug ] ;

                // -------------------------------------------------------------

            } else {

                // -------------------------------------------------------------

                $_GET['action'] = 'add-record' ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // Now we can skip "manage_datasets" proper.
        //
        // And skip straight to ADDING or EDITING the single record...
        // =====================================================================

        require_once( dirname( __FILE__ ) . '/add-edit-record.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // add_edit_record(
        //      $caller_app_slash_plugins_global_namespace      ,
        //      $home_page_title                                ,
        //      $caller_apps_includes_dir                       ,
        //      $all_application_dataset_definitions            ,
        //      $dataset_slug                                   ,
        //      $question_front_end                             ,
        //      $display_options    = array()                   ,
        //      $submission_options = array()
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - -
        // Outputs a screen for adding or editing a record to/of the specified
        // dataset.
        //
        // $all_application_dataset_definitions should be like (eg):-
        //
        //      $all_application_dataset_definitions = Array(
        //
        //          [projects] => Array(    //  <== "dataset_slug"
        //              [dataset_slug]              => projects
        //              [dataset_name_singular]     => project
        //              [dataset_name_plural]       => projects
        //              [dataset_title_singular]    => Project
        //              [dataset_title_plural]      => Projects
        //              [basepress_dataset_handle]  => array(...)
        //              )
        //
        //          ...
        //
        //          )
        //
        // RETURNS:-
        //      Nothing
        // -------------------------------------------------------------------------

        $display_options    = array() ;
        $submission_options = array() ;

        // ---------------------------------------------------------------------

        return add_edit_record(
                    $caller_app_slash_plugins_global_namespace      ,
                    $dataset_manager_home_page_title                ,
                    $caller_apps_includes_dir                       ,
                    $all_application_dataset_definitions            ,
                    $dataset_slug                                   ,
                    $question_front_end                             ,
                    $display_options                                ,
                    $submission_options
                    ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // GET the Manage Dataset HTML...
    // =========================================================================

    if (  $question_front_end ) {

        // ---------------------------------------------------------------------

        require_once( dirname( __FILE__ ) . '/manage-dataset-with-dhtmlx-grid.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\manage_dataset_with_dhtmlx_grid(
        //      $core_plugapp_dirs                              ,
        //      $caller_app_slash_plugins_global_namespace      ,
        //      $dataset_manager_home_page_title                ,
        //      $caller_apps_includes_dir                       ,
        //      $all_application_dataset_definitions            ,
        //      $selected_datasets_dmdd                         ,
        //      $dataset_records                                ,
        //      $dataset_title                                  ,
        //      $dataset_slug                                   ,
        //      $question_front_end                             ,
        //      $orphaned_record_indices
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Creates and returns a widget for adding, editing and deleting records
        // of the specified dataset.
        //
        // $all_application_dataset_definitions should be like (eg):-
        //
        //      $all_application_dataset_definitions = Array(
        //
        //          [projects] => Array(    //  <== "dataset_slug"
        //              [dataset_slug]              => projects
        //              [dataset_name_singular]     => project
        //              [dataset_name_plural]       => projects
        //              [dataset_title_singular]    => Project
        //              [dataset_title_plural]      => Projects
        //              [basepress_dataset_handle]  => array(...)
        //              )
        //
        //          ...
        //
        //          )
        //
        // NOTE!
        // =====
        // The returned widget be the widget requested proper.  Or it may be just
        // (eg;) a header, error message and footer.
        //
        // RETURNS:-
        //      $page_html STRING
        // -------------------------------------------------------------------------

        return manage_dataset_with_dhtmlx_grid(
                    $core_plugapp_dirs                              ,
                    $caller_app_slash_plugins_global_namespace      ,
                    $dataset_manager_home_page_title                ,
                    $caller_apps_includes_dir                       ,
                    $all_application_dataset_definitions            ,
                    $selected_datasets_dmdd                         ,
                    $dataset_records                                ,
                    $dataset_title                                  ,
                    $dataset_slug                                   ,
                    $question_front_end                             ,
                    $orphaned_record_indices
                    ) ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        require_once( dirname( __FILE__ ) . '/manage-dataset-with-wp-list-table.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\manage_dataset_with_wp_list_table(
        //      $core_plugapp_dirs                              ,
        //      $caller_app_slash_plugins_global_namespace      ,
        //      $dataset_manager_home_page_title                ,
        //      $caller_apps_includes_dir                       ,
        //      $all_application_dataset_definitions            ,
        //      $selected_datasets_dmdd                         ,
        //      $dataset_records                                ,
        //      $dataset_title                                  ,
        //      $dataset_slug                                   ,
        //      $question_front_end                             ,
        //      $orphaned_record_indices
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Creates and returns a widget for adding, editing and deleting records
        // of the specified dataset.
        //
        // $all_application_dataset_definitions should be like (eg):-
        //
        //      $all_application_dataset_definitions = Array(
        //
        //          [projects] => Array(    //  <== "dataset_slug"
        //              [dataset_slug]              => projects
        //              [dataset_name_singular]     => project
        //              [dataset_name_plural]       => projects
        //              [dataset_title_singular]    => Project
        //              [dataset_title_plural]      => Projects
        //              [basepress_dataset_handle]  => array(...)
        //              )
        //
        //          ...
        //
        //          )
        //
        // NOTE!
        // =====
        // The returned widget be the widget requested proper.  Or it may be just
        // (eg;) a header, error message and footer.
        //
        // RETURNS:-
        //      $page_html STRING
        // -------------------------------------------------------------------------

        return manage_dataset_with_wp_list_table(
                    $core_plugapp_dirs                              ,
                    $caller_app_slash_plugins_global_namespace      ,
                    $dataset_manager_home_page_title                ,
                    $caller_apps_includes_dir                       ,
                    $all_application_dataset_definitions            ,
                    $selected_datasets_dmdd                         ,
                    $dataset_records                                ,
                    $dataset_title                                  ,
                    $dataset_slug                                   ,
                    $question_front_end                             ,
                    $orphaned_record_indices
                    ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// question_show_orphaned_records_button()
// =============================================================================

/*
function question_show_orphaned_records_button(
    $selected_datasets_dmdd
    ) {

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $selected_datasets_dmdd['dataset_records_table'] = array(
    //          ...
    //          'buttons'   =>  array(
    //              array(
    //                  'type'  =>  'add_record'
    //                  )   ,
    //              array(
    //                  'type'                          =>  'custom'                                                            ,
    //                  'title'                         =>  'Clone Built-In Layout'                                             ,
    //                  'get_button_html_function_name' =>  '\\' . __NAMESPACE__ . '\\get_clone_built_in_layout_button_html'    ,
    //                  'extra_args'                    =>  NULL
    //                  )   ,
    //              array(
    //                  'type'                          =>  'custom'                                                            ,
    //                  'title'                         =>  'Clone Custom Layout'                                               ,
    //                  'get_button_html_function_name' =>  '\\' . __NAMESPACE__ . '\\get_clone_custom_layout_button_html'      ,
    //                  'extra_args'                    =>  NULL
    //                  )   ,
    //              array(
    //                  'type'  =>  'delete_all_records'
    //                  )   ,
    //              array(
    //                  'type'  =>  'show_orphaned_records'
    //                  )
    //              )
    //          ...
    //          )
    //
    // -------------------------------------------------------------------------

    if (    array_key_exists( 'buttons' , $selected_datasets_dmdd['dataset_records_table'] )
            &&
            is_array( $selected_datasets_dmdd['dataset_records_table']['buttons'] )
        ) {

        // ---------------------------------------------------------------------

         foreach ( $selected_datasets_dmdd['dataset_records_table']['buttons'] as $this_button ) {

            if (    array_key_exists( 'type' , $this_button )
                    &&
                    $this_button['type'] === 'show_orphaned_records'
                ) {
                return TRUE ;
            }

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    return FALSE ;

    // -------------------------------------------------------------------------

}
*/

// =============================================================================
// That's that!
// =============================================================================

