<?php

// *****************************************************************************
// DATASET-MANAGER / GET-DATASET-RECORDS-TABLE-DATA.PHP
// (C) 2013 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// get_dataset_records_table_data()
// =============================================================================

function get_dataset_records_table_data(
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_records                        ,
    $dataset_slug                           ,
    $dataset_title                          ,
    $question_front_end                     ,
    $caller_apps_includes_dir               ,
    $data_for
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_dataset_records_table_data(
    //      $selected_datasets_dmdd     ,
    //      $dataset_records            ,
    //      $dataset_slug               ,
    //      $dataset_title              ,
    //      $question_front_end         ,
    //      $caller_apps_includes_dir   ,
    //      $data_for
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Gets the:-
    //      $table_data
    //
    // for the specified dataset and it's data.
    //
    // $data_for must be one of:-
    //      o   'wp-list-table'
    //      o   'dhtmlx-grid'
    //
    // RETURNS
    //      o   On SUCCESS
    //          - - - - -
    //          #   $data_for = 'wp-list-table'
    //                  array(
    //                      ARRAY  $table_data                              ,
    //                      ARRAY  $data_field_slugs_for_column_sorting     ,
    //                      STRING $support_javascript
    //                      )
    //          #   $data_for = 'dhtmlx-grid'
    //                  array(
    //                      ARRAY  $table_data                              ,
    //                      ARRAY  $sort_data                               ,
    //                      ARRAY  $data_field_slugs_for_column_sorting     ,
    //                      STRING $support_javascript
    //                      )
    //
    //          Where:-
    //              $support_javascript
    //          is the Javascript required (for things like "DELETE this
    //          record? ARE YOU SURE?" confirmation, etc),
    //
    //      o   On FAILURE
    //          - - - - -
    //          $error_message STRING
    // -------------------------------------------------------------------------

//pr( $dataset_records ) ;

//\greatKiwi_basepressLogger\pr( $dataset_records ) ;

//pr( $_GET ) ;

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // $table_data is constructed from:-
    //      $selected_datasets_dmdd['dataset_records_table'], and;
    //      $dataset_records
    //
    // $selected_datasets_dmdd['dataset_records_table'] is like (eg):-
    //
    //      $selected_datasets_dmdd['dataset_records_table'] = array(
    //
    //          'column_defs'   =>  array(
    //
    //      //      array(
    //      //          'base_slug'                     =>  'xxx'
    //      //          'label'                         =>  'Xxx' OR ''/NULL (means use "to_title( <base slug> )"
    //      //          'question_sortable'             =>  TRUE OR FALSE/NULL
    //      //          'raw_value_from'                =>  array(
    //      //                                                  'method'    =>  'array-storage-field-slug'      ,
    //      //                                                  'instance'  =>  "xxx"
    //      //                                                  )   ,
    //      //                                              --OR--
    //      //                                              array(
    //      //                                                  'method'    =>  'special-type'                  ,
    //      //                                                  'instance'  =>  "action"
    //      //                                                  )   ,
    //      //                                              --OR--
    //      //                                              array(
    //      //                                                  'method'    =>  'foreign-field'                 ,
    //      //                                                  'instance'  =>  "<target-field-name>"
    //      //                                                  'args'      =>  array(
    //      //                                                                      array(
    //      //                                                                          'pointer_field_array_storage_slug'  =>  '<pointer_field_slug>'  ,
    //      //                                                                          'foreign_dataset'                   =>  '<dataset_slug>'
    //      //                                                                          )   ,
    //      //                                                                      ...
    //      //                                                                      )
    //      //                                                  )   ,
    //      //
    //      //          'width_in_percent'              =>  1 to 100 (All columns must add up 100%.  Though
    //      //                                              some columns may be left 0/NULL or unspecified -
    //      //                                              in which case the leftover width will be evenly
    //      //                                              distributed amongst these columns.
    //      //          'header_halign'                 =>  'left' | 'center' | 'right'
    //      //          'header_valign'                 =>  'top' | 'middle' | 'bottom'
    //      //          'data_halign'                   =>  'left' | 'center' | 'right'
    //      //          'data_valign'                   =>  'top' | 'middle' | 'bottom'
    //      //
    //      //          'data_field_slug_to_display'    =>  "xxx" (generated automatically; DON'T specify)
    //      //          'data_field_slug_to_sort_by'    =>  "xxx" (generated automatically; DON'T specify)
    //      //          )   ,
    //
    //              array(
    //                  'base_slug'                     =>  'title'             ,
    //                  'label'                         =>  'Project Title'     ,
    //                  'question_sortable'             =>  TRUE                ,
    //                  'raw_value_from'                =>  array(
    //                                                          'method'    =>  'array-storage-field-slug'  ,
    //                                                          'instance'  =>  'title'
    //                                                          )   ,
    //                  'display_treatments'            =>  array()
    //                  'sort_treatments'               =>  array()
    //                  'data_field_slug_to_display'    =>  title
    //                  'data_field_slug_to_sort_by'    =>  title
    //                  'header_halign'                 =>  center
    //                  'header_valign'                 =>  middle
    //                  'data_halign'                   =>  center
    //                  'data_valign'                   =>  middle
    //                  'width_in_percent'              =>  50
    //                  )   ,
    //
    //              array(
    //                  'base_slug'                     =>  'action'            ,
    //                  'label'                         =>  'Action'            ,
    //                  'question_sortable'             =>  FALSE               ,
    //                  'raw_value_from'                =>  array(
    //                                                          'method'    =>  'special-type'  ,
    //                                                          'instance'  =>  'action'
    //                                                          )   ,
    //                  'display_treatments'            =>  array()
    //                  'sort_treatments'               =>  array()
    //                  'data_field_slug_to_display'    =>  action
    //                  'data_field_slug_to_sort_by'    =>  action
    //                  'header_halign'                 =>  center
    //                  'header_valign'                 =>  middle
    //                  'data_halign'                   =>  center
    //                  'data_valign'                   =>  middle
    //                  'width_in_percent'              =>  50
    //                  )
    //
    //              )   ,
    //
    //          [rows_per_page]                      => 10
    //          [default_data_field_slug_to_orderby] => title
    //          [default_order]                      => asc
    //          [actions]                            => Array(
    //                                                      [edit]   => edit
    //                                                      [delete] => delete
    //                                                      )
    //          [action_separator]                  =>
    //
    //          [checked_defaulted_ok]              => 1
    //
    //          )
    //
    // NOTE!
    // =====
    // On entry, it's assumed that:-
    //     $selected_datasets_dmdd['dataset_records_table']
    //
    // has been checked/defaulted by:-
    //     check_and_default_dataset_records_table()
    //
    // And thus it, and all it's required members, are present and correct.
    // -------------------------------------------------------------------------

//pr( $selected_datasets_dmdd['dataset_records_table'] ) ;

    // =========================================================================
    // Init...
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__ ;

    // -------------------------------------------------------------------------

    require_once( dirname( __FILE__ ) . '/get-dataset-records-table-data-support-1.php' ) ;

    // -------------------------------------------------------------------------

    if (    array_key_exists(
                'storage_method'            ,
                $selected_datasets_dmdd
                )
            &&
            is_string( $selected_datasets_dmdd['storage_method'] )
            &&
            trim( $selected_datasets_dmdd['storage_method'] ) !== ''
        ) {
        $storage_method = $selected_datasets_dmdd['storage_method'] ;

    } else {
        $storage_method = 'array-storage' ;

    }

    // =========================================================================
    // $data_for
    // =========================================================================

    if ( ! in_array(
                $data_for                                   ,
                array( 'wp-list-table' , 'dhtmlx-grid' )    ,
                TRUE
                )
        ) {

        $safe_data_for = htmlentities( $data_for ) ;

        return <<<EOT
PROBLEM Getting Dataset Records Table Data:&nbsp; Unrecognised/unsupported "data_for" ("{$safe_data_for}")
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // =========================================================================
    // Make sure that the Dataset Records Table has been CHECKED and DEFAULTED
    // OK...
    // =========================================================================

    if ( ! array_key_exists( 'dataset_records_table' , $selected_datasets_dmdd ) ) {

        return <<<EOT
PROBLEM Getting Dataset Records Table Data:&nbsp; "dataset_records_table" NOT defined
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    if (    ! is_array( $selected_datasets_dmdd['dataset_records_table'] )
            ||
            count( $selected_datasets_dmdd['dataset_records_table'] ) < 1
        ) {

        return <<<EOT
PROBLEM Getting Dataset Records Table Data:&nbsp; Bad "dataset_records_table" (non-empty array expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    if (    ! array_key_exists( 'checked_defaulted_ok' , $selected_datasets_dmdd['dataset_records_table'] )
            ||
            $selected_datasets_dmdd['dataset_records_table']['checked_defaulted_ok'] !== TRUE
        ) {

        return <<<EOT
PROBLEM Getting Dataset Records Table Data:&nbsp; "dataset_records_table" doesn't seem to have been checked and defaulted yet
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

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

        return <<<EOT
PROBLEM:&nbsp; No "app_handle"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $app_handle ) ;

    // -------------------------------------------------------------------------

    $core_plugapp_dirs =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_core_plugapp_dirs(
            $path_in_plugin     ,
            $app_handle
            ) ;

    // =========================================================================
    // Init. the "loaded datasets" array - where we cache the foreign datasets
    // that might be accessed when filling "foreign fields", for example...
    // =========================================================================

    // -------------------------------------------------------------------------
    // load_dataset(
    //      $all_application_dataset_definitions    ,
    //      $caller_apps_includes_dir               ,
    //      &$loaded_datasets                       ,
    //      $dataset_slug                           ,
    //      $dataset_key_field_slug = NULL          ,
    //      $dataset_title          = NULL          ,
    //      $dataset_records        = NULL          ,
    //      $record_indices_by_key  = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Adds the specified dataset to $loaded_datasets (unless it's already
    // loaded).
    //
    // NOTE!
    // =====
    // 1.   Each of:-
    //          o   $dataset_key_field_slug
    //          o   $dataset_title
    //          o   $dataset_records
    //          o   $record_indices_by_key
    //
    //      is only loaded if it wasn't supplied on input.
    //
    // 2.   $loaded_datasets is like (eg):-
    //
    //          $loaded_datasets = array(
    //
    //              <dataset_slug>  =>  array(
    //                                      'title'                 =>  "xxx"           ,
    //                                      'records'               =>  array(...)      ,
    //                                      'key_field_slug'        =>  "xxx" or NULL
    //                                      'record_indices_by_key' =>  array(...)
    //                                      )   ,
    //
    //              ...
    //
    //              )
    //
    // RETURNS
    //      o   TRUE on SUCCESS
    //      o   $error_message STRING on FAILURE
    // -------------------------------------------------------------------------

    $loaded_datasets = array() ;

    // -------------------------------------------------------------------------

    $dataset_key_field_slug = NULL ;
    $record_indices_by_key  = NULL ;

    // -------------------------------------------------------------------------

    $result = load_dataset(
                    $all_application_dataset_definitions    ,
                    $caller_apps_includes_dir               ,
                    $loaded_datasets                        ,
                    $dataset_slug                           ,
                    $dataset_key_field_slug                 ,
                    $dataset_title                          ,
                    $dataset_records                        ,
                    $record_indices_by_key
                    ) ;
                    //  Add the current dataset (whoose records we're
                    //  displaying), into the $loaded_datasets array

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
    }

    // =========================================================================
    // Is SIMPLE FILTERING to be used ?
    //
    // If so, call the dataset's DATA TABLE FILTER FUNCTION (to filter
    // $dataset_records)...
    // =========================================================================

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $dataset_records        ,
//    '$dataset_records'
//    ) ;

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // Simple filtering is where we have (eg):-
    //
    //      $selected_datasets_dmdd = array(
    //          ...
    //          'dataset_records_table'     =>  array(
    //              ...
    //              'filter_function'   =>  array(
    //                  'name_incl_namespace'   =>  '\\' . __NAMESPACE__ . '\\<my_simple_filter_function_name>'     ,
    //                  'extra_args'            =>  NULL
    //                  )
    //              ...
    //              )
    //          ...
    //          )
    //
    // -------------------------------------------------------------------------

    if (    array_key_exists( 'filter_function' , $selected_datasets_dmdd['dataset_records_table'] )
            &&
            is_array( $selected_datasets_dmdd['dataset_records_table']['filter_function'] )
            &&
            count( $selected_datasets_dmdd['dataset_records_table']['filter_function'] ) > 0
        ) {

        // ---------------------------------------------------------------------

        require_once( dirname( __FILE__ ) . '/filtering-simple-filtering.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // simple_filter_dataset_records(
        //      $core_plugapp_dirs                      ,
        //      $all_application_dataset_definitions    ,
        //      $selected_datasets_dmdd                 ,
        //      $dataset_records                        ,
        //      $dataset_slug                           ,
        //      $dataset_title                          ,
        //      $question_front_end                     ,
        //      &$loaded_datasets
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // Simple filtering is where we have (eg):-
        //
        //      $selected_datasets_dmdd = array(
        //          ...
        //          'dataset_records_table'     =>  array(
        //              ...
        //              'filter_function'   =>  array(
        //                  'name_incl_namespace'   =>  '\\' . __NAMESPACE__ . '\\<my_simple_filter_function_name>'     ,
        //                  'extra_args'            =>  NULL
        //                  )
        //              ...
        //              )
        //          ...
        //          )
        //
        // The simple filter function then filters the supplied:-
        //      $dataset_records
        //
        // based on (eg):-
        //      o   $_GET
        //      o   $_POST
        //      o   $_COOKIE (*)
        //      o   $_SERVER
        //      o   or WordPress login related variables/functions like (eg):-
        //          --  current_user_can()
        //          --  is user logged in()
        //          --  wp_get_current_user()
        //          --  etc
        //      o   etc
        //
        // (*)  Complex filtering - see "filter_dataset_records()" - also uses
        //      $_COOKIE.
        //
        // RETURNS
        //      On SUCCESS
        //          $filtered_dataset_records ARRAY
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        $result = simple_filter_dataset_records(
                        $core_plugapp_dirs                      ,
                        $all_application_dataset_definitions    ,
                        $selected_datasets_dmdd                 ,
                        $dataset_records                        ,
                        $dataset_slug                           ,
                        $dataset_title                          ,
                        $question_front_end                     ,
                        $loaded_datasets
                        ) ;
                        // RETURNS
                        //      On SUCCESS
                        //          $filtered_dataset_records
                        //
                        //      On FAILURE
                        //          $error_message STRING

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        if ( count( $result ) !== count( $dataset_records ) ) {

            // -----------------------------------------------------------------

            $dataset_records = $result ;

            // -----------------------------------------------------------------

            $loaded_datasets[ $dataset_slug ]['records'] = $dataset_records ;

            // -----------------------------------------------------------------

            if ( $storage_method !== 'mysql' ) {

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

                $result =
                    get_dataset_record_indices_by_key(
                        $dataset_title                                          ,
                        $dataset_records                                        ,
                        $loaded_datasets[ $dataset_slug ]['key_field_slug']
                        ) ;

                // -------------------------------------------------------------

                if ( is_string( $result ) ) {
                    return $result ;
                }

                // -------------------------------------------------------------

                $loaded_datasets[ $dataset_slug ]['record_indices_by_key'] = $result ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Is COMPLEX FILTERING to be used ?
    //
    // If so, call the dataset's DATA TABLE FILTER FUNCTION (to filter
    // $dataset_records)...
    // =========================================================================

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // Complex filtering is where we have (eg):-
    //
    //      $selected_datasets_dmdd = array(
    //          ...
    //          'dataset_records_table'     =>  array(
    //              ...
    //              'filters'       =>  array(
    //                  array(
    //                      'toolbar_title'                             =>  'Sites To Show?'    ,
    //                      'toolbar_ui_type'                           =>  'dropdown'          ,
    //                      'cookie_name'                               =>  NULL                ,
    //                      'default_cookie_value'                      =>  NULL                ,
    //                      'cookie_names_by_pv_slug'                   =>  array(
    //                          'sites-to-advertise'    =>  'ad-swapper-sites-to-advertise'     ,
    //                          'sites-to-advertise-on' =>  'ad-swapper-sites-to-advertise-on'
    //                          )   ,
    //                      'default_cookie_values_by_pv_slug'          =>  array(
    //                          'sites-to-advertise'    =>  'yes-yes'   ,
    //                          'sites-to-advertise-on' =>  'yes-yes'
    //                          )   ,
    //                      'titles_by_value'                           =>  NULL                ,
    //                      'custom_get_toolbar_html_function'          =>  NULL                                                                    ,
    //                      'custom_get_toolbar_html_function_args'     =>  NULL                                                                    ,
    //                      'custom_get_titles_by_value_function'       =>  '\\' . __NAMESPACE__ . '\\custom_get_filter_titles_by_value_function'   ,
    //                      'custom_get_titles_by_value_function_args'  =>  NULL                                                                    ,
    //                      'custom_record_filtering_function'          =>  '\\' . __NAMESPACE__ . '\\custom_record_filtering_function'             ,
    //                      'custom_record_filtering_function_args'     =>  NULL                                                                    ,
    //                      'get_help_html_function'                    =>  NULL    ,   //  '\\' . __NAMESPACE__ . '\\get_help_html_4_filtering'                    ,
    //                      'get_help_html_function_args'               =>  NULL                                                                    ,
    //                      'foreign_dataset_field_args'                =>  array(
    //                          'foreign_dataset_slug'          =>  ''  ,
    //                          'foreign_match_field_slug'      =>  ''  ,
    //                          'foreign_title_field_slug'      =>  ''  ,
    //                          'this_match_field_slug'         =>  ''
    //                          )
    //                      )
    //                  ...
    //                  )
    //              ...
    //              )
    //          ...
    //          )
    //
    // -------------------------------------------------------------------------

    if (    array_key_exists( 'filters' , $selected_datasets_dmdd['dataset_records_table'] )
            &&
            is_array( $selected_datasets_dmdd['dataset_records_table']['filters'] )
            &&
            count( $selected_datasets_dmdd['dataset_records_table']['filters'] ) > 0
        ) {

        // ---------------------------------------------------------------------

        require_once( dirname( __FILE__ ) . '/filtering-record-filtering.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // filter_dataset_records(
        //      $core_plugapp_dirs                      ,
        //      $all_application_dataset_definitions    ,
        //      $selected_datasets_dmdd                 ,
        //      $dataset_records                        ,
        //      $dataset_slug                           ,
        //      $dataset_title                          ,
        //      $question_front_end                     ,
        //      &$loaded_datasets
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      On SUCCESS
        //          $filtered_dataset_records ARRAY
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        $result = filter_dataset_records(
                        $core_plugapp_dirs                      ,
                        $all_application_dataset_definitions    ,
                        $selected_datasets_dmdd                 ,
                        $dataset_records                        ,
                        $dataset_slug                           ,
                        $dataset_title                          ,
                        $question_front_end                     ,
                        $loaded_datasets
                        ) ;
                        // RETURNS
                        //      On SUCCESS
                        //          $filtered_dataset_records
                        //
                        //      On FAILURE
                        //          $error_message STRING

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        if ( count( $result ) !== count( $dataset_records ) ) {

            // -----------------------------------------------------------------

            $dataset_records = $result ;

            // -----------------------------------------------------------------

            $loaded_datasets[ $dataset_slug ]['records'] = $dataset_records ;

            // -----------------------------------------------------------------

            if ( $storage_method !== 'mysql' ) {

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

                $result =
                    get_dataset_record_indices_by_key(
                        $dataset_title                                          ,
                        $dataset_records                                        ,
                        $loaded_datasets[ $dataset_slug ]['key_field_slug']
                        ) ;

                // -------------------------------------------------------------

                if ( is_string( $result ) ) {
                    return $result ;
                }

                // -------------------------------------------------------------

                $loaded_datasets[ $dataset_slug ]['record_indices_by_key'] = $result ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Init. the various internal and output variables used...
    // =========================================================================

    $data_field_slugs_for_column_sorting = array() ;

    $question_delete_record_javascript_required = FALSE ;

    // =========================================================================
    // Do the "PRE GET TABLE DATA" function (if there is one)...
    // =========================================================================

    if (    array_key_exists( 'pre_get_table_data_function_name' , $selected_datasets_dmdd['dataset_records_table'] )
            &&
            is_string( $selected_datasets_dmdd['dataset_records_table']['pre_get_table_data_function_name'] )
            &&
            trim( $selected_datasets_dmdd['dataset_records_table']['pre_get_table_data_function_name'] ) !== ''
        ) {

        // ----------------------------------------------------------------------

        if ( ! function_exists( $selected_datasets_dmdd['dataset_records_table']['pre_get_table_data_function_name'] ) ) {

            return <<<EOT
PROBLEM Getting Dataset Records Table Data:&nbsp; "dataset_records_table" + "pre_get_table_data_function_name" doesn't exist
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // -------------------------------------------------------------------------
        // <my_custom_pre_get_table_data_function>(
        //      $dataset_slug                           ,
        //      $dataset_title                          ,
        //      $question_front_end                     ,
        //      $caller_apps_includes_dir               ,
        //      &$all_application_dataset_definitions   ,
        //      &$selected_datasets_dmdd                ,
        //      &$dataset_records                       ,
        //      &$loaded_datasets
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // This function can update any of:-
        //      o   $all_application_dataset_definitions   ,
        //      o   $selected_datasets_dmdd                ,
        //      o   $dataset_records                       ,
        //      o   $loaded_datasets
        //
        // if it wants to (to sort the dataset records to be displayed, for
        // example).
        //
        // It should also return a (possibly empty) array containing the
        // arguments (if any), it wants to return to the main "get dataset records
        // table data" function.
        //
        // RETURNS
        //      o   On SUCCESS
        //              $custom_get_table_data_function_data ARRAY
        //
        //      o   On FAILURE
        //              $error_message STRING
        // -------------------------------------------------------------------------

        $custom_get_table_data_function_data =
            $selected_datasets_dmdd['dataset_records_table']['pre_get_table_data_function_name'](
                $dataset_slug                           ,
                $dataset_title                          ,
                $question_front_end                     ,
                $caller_apps_includes_dir               ,
                $all_application_dataset_definitions    ,
                $selected_datasets_dmdd                 ,
                $dataset_records                        ,
                $loaded_datasets
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $custom_get_table_data_function_data ) ) {
            return $custom_get_table_data_function_data ;
        }

        // ---------------------------------------------------------------------

        if ( ! is_array( $custom_get_table_data_function_data ) ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "dataset_records_table" + "pre_get_table_data_function_name" return value (possibly empty array expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $custom_get_table_data_function_data = array() ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Get the ARRAY STORAGE field indices and slugs - for the array storage
    // fields that are Base64 encoded...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_pre_check_base64_encoded_array_storage_field_indices_by_slug(
    //      $selected_datasets_dmdd
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS!
    //          ARRAY $pre_check_base64_encoded_array_storage_field_indices_by_slug
    //
    //      On FAILURE
    //          $error_message string
    // -------------------------------------------------------------------------

    $pre_check_base64_encoded_array_storage_field_indices_by_slug =
        get_pre_check_base64_encoded_array_storage_field_indices_by_slug(
            $selected_datasets_dmdd
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $pre_check_base64_encoded_array_storage_field_indices_by_slug ) ) {
        return $pre_check_base64_encoded_array_storage_field_indices_by_slug ;
    }

    // =========================================================================
    // LOOP OVER the COLUMN DEFINITIONS - adding each column/field to the output
    // table data in turn..
    // =========================================================================

    $table_data = array() ;

    $sort_data = array() ;
        //  This array is like (eg):-
        //
        //      $sort_data = array(
        //          '<sort_field_slug_1>'   =>  array(...values_1...)
        //          '<sort_field_slug_2>'   =>  array(...values_2...)
        //          ...
        //          '<sort_field_slug_3>'   =>  array(...values_3...)
        //          )

    // -------------------------------------------------------------------------

    foreach ( $selected_datasets_dmdd['dataset_records_table']['column_defs'] as $this_column_index => $this_column_def ) {

        // ---------------------------------------------------------------------

        $column_number = $this_column_index + 1 ;

        // =====================================================================
        // The "RAW_VALUE_FROM" field tells us how to get the field value
        // for each column...
        // =====================================================================

        // ---------------------------------------------------------------------
        // The options are:-
        //
        //      $this_column_def['raw_value_from'] = array(
        //          'method'    =>  'array-storage-field-slug'      ,
        //          'instance'  =>  "<field_slug>"
        //          )
        //
        //      $this_column_def['raw_value_from'] = array(
        //          'method'    =>  'special-type'                  ,
        //          'instance'  =>  "<record-action>"
        //          )
        //
        //          Where "<record-action>" is one of:-
        //              o   "standard"
        //              o   "custom"
        //
        //      $this_column_def['raw_value_from'] = array(
        //          'method'    =>  'foreign-field'             ,
        //          'instance'  =>  "<target-field-name>"       ,
        //          'args'      =>  array(
        //                              array(
        //                                  'pointer_field_array_storage_slug'  =>  '<pointer_field_slug>'  ,
        //                                  'foreign_dataset'                   =>  '<dataset_slug>'
        //                                  )   ,
        //                              ...
        //                              )
        //          )
        //
        //      $this_column_def['raw_value_from'] = array(
        //          'method'    =>  'custom-function'                                               ,
        //          'instance'  =>  "function-name-including-namespace-prefix-if-there-is-one>"     ,
        //          'args'      =>  array()
        //          )
        //
        // ---------------------------------------------------------------------

        if ( $this_column_def['raw_value_from']['method'] === 'array-storage-field-slug' ) {

            // =================================================================
            // ARRAY-STORAGE-FIELD-SLUG
            // =================================================================

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_column_def['raw_value_from'] = array(
            //          'method'    =>  'array-storage-field-slug'      ,
            //          'instance'  =>  "xxx"
            //          )
            //
            // -----------------------------------------------------------------

            // =================================================================
            // "INSTANCE" OK?
            // =================================================================

            if (    ! is_string( $this_column_def['raw_value_from']['instance'] )
                    ||
                    trim( $this_column_def['raw_value_from']['instance'] ) === ''
                    ||
                    ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_varname( $this_column_def['raw_value_from']['instance'] )
                    ||
                    strlen( $this_column_def['raw_value_from']['instance'] ) > 64
                ) {

                return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "raw_value_from" + "instance" - for column# {$column_number} (1 to 64 character, variable name type string expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // =================================================================
            // Get this column's TABLE DATA for all the dataset records...
            // =================================================================

            foreach ( $dataset_records as $record_index => $record_data ) {

                // =============================================================
                // RECORD HAS "INSTANCE" FIELD ?
                // =============================================================

                if ( ! array_key_exists( $this_column_def['raw_value_from']['instance'] , $record_data ) ) {

                    $record_number = $record_index + 1 ;

                    $safe_instance = htmlentities( $this_column_def['raw_value_from']['instance'] ) ;

                    return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "raw_value_from" + "instance" - for column# {$column_number} (dataset record# {$record_number} has NO "{$safe_instance}" field)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // =============================================================
                // GET THE RAW FIELD VALUE...
                // =============================================================

                $raw_field_value = $record_data[ $this_column_def['raw_value_from']['instance'] ] ;

                // =============================================================
                // BASE64 DECODE the raw field value, if required...
                // =============================================================

                if ( array_key_exists(
                            $this_column_def['raw_value_from']['instance']                  ,
                            $pre_check_base64_encoded_array_storage_field_indices_by_slug
                            )
                    ) {
                    $raw_field_value = base64_decode( $raw_field_value ) ;
                }

                // =============================================================
                // SAVE THE "DISPLAY" VALUE
                // =============================================================

                $display_value = $raw_field_value ;

                // -------------------------------------------------------------------------
                // apply_display_treatments_to_field_value(
                //      $all_application_dataset_definitions    ,
                //      $selected_datasets_dmdd                 ,
                //      $dataset_records                        ,
                //      $dataset_slug                           ,
                //      $dataset_title                          ,
                //      $question_front_end                     ,
                //      $caller_apps_includes_dir               ,
                //      $this_column_def_index                  ,
                //      $this_column_def                        ,
                //      $this_dataset_record_index              ,
                //      $this_dataset_record_data               ,
                //      &$custom_get_table_data_function_data   ,
                //      &$field_value
                //      )
                // - - - - - - - - - - - - - - - - - - - - - - -
                // Applies the specified "treatments" to the current field's value...
                //
                // RETURNS
                //      o   On SUCCESS!
                //          - - - - - -
                //          TRUE
                //
                //      o   On FAILURE!
                //          - - - - - -
                //          $error_message STRING
                // -------------------------------------------------------------------------

                $result = apply_display_treatments_to_field_value(
                                $all_application_dataset_definitions    ,
                                $selected_datasets_dmdd                 ,
                                $dataset_records                        ,
                                $dataset_slug                           ,
                                $dataset_title                          ,
                                $question_front_end                     ,
                                $caller_apps_includes_dir               ,
                                $this_column_index                      ,
                                $this_column_def                        ,
                                $record_index                           ,
                                $record_data                            ,
                                $custom_get_table_data_function_data    ,
                                $display_value
                                ) ;

                // -------------------------------------------------------------

                if ( is_string( $result ) ) {
                    return $result ;
                }

                // -------------------------------------------------------------

                if ( array_key_exists( $record_index , $table_data ) ) {

                    $table_data[ $record_index ][ $this_column_def['data_field_slug_to_display'] ] = $display_value ;

                } else {

                    $table_data[ $record_index ] = array(
                        $this_column_def['data_field_slug_to_display'] => $display_value
                        ) ;

                }

                // =============================================================
                // SAVE THE "SORT" VALUE (if there is one)...
                // =============================================================

                if ( $this_column_def['question_sortable'] ) {

                    // ---------------------------------------------------------

                    $sort_value = $raw_field_value ;

//                  // -------------------------------------------------------------------------
//                  // apply_sort_treatments_to_field_value(
//                  //      $all_application_dataset_definitions    ,
//                  //      $selected_datasets_dmdd                 ,
//                  //      $dataset_records                        ,
//                  //      $dataset_slug                           ,
//                  //      $dataset_title                          ,
//                  //      $question_front_end                     ,
//                  //      $caller_apps_includes_dir               ,
//                  //      $this_column_def_index                  ,
//                  //      $this_column_def                        ,
//                  //      $this_dataset_record_index              ,
//                  //      $this_dataset_record_data               ,
//                  //      &$custom_get_table_data_function_data   ,
//                  //      &$field_value
//                  //      )
//                  // - - - - - - - - - - - - - - - - - - - - - - -
//                  // Applies the specified "treatments" to the current field's value...
//                  //
//                  // RETURNS
//                  //      o   On SUCCESS!
//                  //          - - - - - -
//                  //          TRUE
//                  //
//                  //      o   On FAILURE!
//                  //          - - - - - -
//                  //          $error_message STRING
//                  // -------------------------------------------------------------------------
//
//                  $result = apply_sort_treatments_to_field_value(
//                                  $all_application_dataset_definitions    ,
//                                  $selected_datasets_dmdd                 ,
//                                  $dataset_records                        ,
//                                  $dataset_slug                           ,
//                                  $dataset_title                          ,
//                                  $question_front_end                     ,
//                                  $caller_apps_includes_dir               ,
//                                  $this_column_index                      ,
//                                  $this_column_def                        ,
//                                  $record_index                           ,
//                                  $record_data                            ,
//                                  $custom_get_table_data_function_data    ,
//                                  $sort_value
//                                  ) ;
//
//                  // ---------------------------------------------------------
//
//                  if ( is_string( $result ) ) {
//                      return $result ;
//                  }

                    // ---------------------------------------------------------

                    if ( $data_for === 'wp-list-table' ) {

                        // -----------------------------------------------------

                        if ( array_key_exists( $record_index , $table_data ) ) {

                            $table_data[ $record_index ][ $this_column_def['data_field_slug_to_sort_by'] ] = $sort_value ;

                        } else {

                            $table_data[ $record_index ] = array(
                                $this_column_def['data_field_slug_to_sort_by'] => $sort_value
                                ) ;

                        }

                        // -----------------------------------------------------

                    } elseif ( $data_for === 'dhtmlx-grid' ) {

                        // -----------------------------------------------------
                        // $sort_data is like (eg):-
                        //
                        //      $sort_data = array(
                        //          '<sort_field_slug_1>'   =>  array(...values_1...)
                        //          '<sort_field_slug_2>'   =>  array(...values_2...)
                        //          ...
                        //          '<sort_field_slug_3>'   =>  array(...values_3...)
                        //          )
                        //
                        // NOTE!
                        // =====
                        // When adding the values, we DON'T add duplicates.
                        // -----------------------------------------------------

                        if ( array_key_exists(
                                $this_column_def['data_field_slug_to_sort_by']  ,
                                $sort_data
                                )
                            ) {

                            if ( ! in_array(    $sort_value                                                     ,
                                                $sort_data[ $this_column_def['data_field_slug_to_sort_by'] ]    ,
                                                TRUE
                                                )
                                ) {
                                $sort_data[ $this_column_def['data_field_slug_to_sort_by'] ][] = $sort_value ;
                            }

                        } else {

                            $sort_data[ $this_column_def['data_field_slug_to_sort_by'] ] = array(
                                $sort_value
                                ) ;

                        }

                        // -----------------------------------------------------

                    }

                    // ---------------------------------------------------------

                }

                // =============================================================
                // Repeat with the NEXT RECORD (if there is one)...
                // =============================================================

            }

            // -----------------------------------------------------------------

        } elseif ( $this_column_def['raw_value_from']['method'] === 'special-type' ) {

            // =================================================================
            // SPECIAL-TYPE
            // =================================================================

            // -----------------------------------------------------------------
            // Check the "instance" parameter...
            // -----------------------------------------------------------------

            if (    ! is_string( $this_column_def['raw_value_from']['instance'] )
                    ||
                    trim( $this_column_def['raw_value_from']['instance'] ) === ''
                ) {

                return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "raw_value_from" + "instance" - for column# {$column_number} (non-empty string expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // =================================================================
            // PROCESS the SPECIAL TYPE's "instance"...
            // =================================================================

            if ( $this_column_def['raw_value_from']['instance'] === 'record-action' ) {

                // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
                // "SPECIAL_TYPE" = "ACTION"...
                // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

                // -------------------------------------------------------------
                // Here we should have (eg):-
                //
                //      $this_column_def['raw_value_from'] = array(
                //          'method'    =>  'special-type'                  ,
                //          'instance'  =>  "record-action"
                //          )
                //
                // In other words, this column is an "Action" column.
                //
                // Where each record has zero or more "actions" - as specified
                // by the Dataset Records Table's:-
                //     "record_actions"
                //
                // parameter.  Which is like (eg):-
                //
                //      <dataset records table>['record_actions'] = array(
                //          array(
                //              'type'          =>  'standard'      ,
                //              'slug'          =>  'edit'          ,
                //              'link_title'    =>  'edit'
                //              )   ,
                //          array(
                //              'type'          =>  'standard'      ,
                //              'slug'          =>  'delete'        ,
                //              'link_title'    =>  'delete'
                //              )   ,
                //          array(
                //              'type'          =>  'custom'                ,
                //              'slug'          =>  'select-dirs-files'     ,
                //              'link_title'    =>  'select files'
                //              )
                //          )
                //
                // Which will typically be displayed in the table's "Action"
                // column - as clickable links like (eg):-
                //     edit   delete   select files
                //
                // -------------------------------------------------------------

                // =============================================================
                // Get the ARRAY STORAGE KEY FIELD SLUG (for those actions,
                // eg:-
                //      o   edit
                //      o   delete
                //
                // that need it...
                // =============================================================

                $array_storage_key_field_slug = '' ;

                // -------------------------------------------------------------

                if ( isset( $selected_datasets_dmdd['array_storage_key_field_slug'] ) ) {

                    // ---------------------------------------------------------

                    if (    ! is_string( $selected_datasets_dmdd['array_storage_key_field_slug'] )
                            ||
                            trim( $selected_datasets_dmdd['array_storage_key_field_slug'] ) === ''
                            ||
                            ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_varname( $selected_datasets_dmdd['array_storage_key_field_slug'] )
                        ) {

                        return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "array_storage_key_field_slug" (must be a non-blank variable-name like string)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                    }

                    // ---------------------------------------------------------

                    $array_storage_key_field_slug = $selected_datasets_dmdd['array_storage_key_field_slug'] ;

                    // ---------------------------------------------------------

                }

                // =============================================================
                // DEFAULT the RECORD ACTIONS...
                // =============================================================

                // -------------------------------------------------------------
                // Here we should have (eg):-
                //
                //      $selected_datasets_dmdd['dataset_records_table']['record_actions'] = array(
                //          array(
                //              'type'          =>  'standard'      ,
                //              'slug'          =>  'edit'          ,
                //              'link_title'    =>  'edit'
                //              )   ,
                //          array(
                //              'type'          =>  'standard'      ,
                //              'slug'          =>  'delete'        ,
                //              'link_title'    =>  'delete'
                //              )   ,
                //          array(
                //              'type'          =>  'custom'                ,
                //              'slug'          =>  'select-dirs-files'     ,
                //              'link_title'    =>  'select files'
                //              )
                //          )
                //
                // -------------------------------------------------------------

                if ( ! isset( $selected_datasets_dmdd['dataset_records_table']['record_actions'] ) ) {

                    // ---------------------------------------------------------

                    if ( $array_storage_key_field_slug === '' ) {

                        $selected_datasets_dmdd['dataset_records_table']['record_actions'] = array() ;

                    } else {

                        $selected_datasets_dmdd['dataset_records_table']['record_actions'] = array(
                            array(
                                'type'          =>  'standard'      ,
                                'slug'          =>  'edit'          ,
                                'link_title'    =>  'edit'
                                )   ,
                            array(
                                'type'          =>  'standard'      ,
                                'slug'          =>  'delete'        ,
                                'link_title'    =>  'delete'
                                )
                            ) ;

                    }

                    // ---------------------------------------------------------

                }

                // =============================================================
                // CHECK the RECORD ACTIONS (1)...
                // =============================================================

                // -------------------------------------------------------------
                // Here we should have (eg):-
                //
                //      $selected_datasets_dmdd['dataset_records_table']['record_actions'] = array(
                //          array(
                //              'type'          =>  'standard'      ,
                //              'slug'          =>  'edit'          ,
                //              'link_title'    =>  'edit'
                //              )   ,
                //          array(
                //              'type'          =>  'standard'      ,
                //              'slug'          =>  'delete'        ,
                //              'link_title'    =>  'delete'
                //              )   ,
                //          array(
                //              'type'          =>  'custom'                ,
                //              'slug'          =>  'select-dirs-files'     ,
                //              'link_title'    =>  'select files'
                //              )
                //          )
                //
                // -------------------------------------------------------------

                if ( ! is_array( $selected_datasets_dmdd['dataset_records_table']['record_actions'] ) ) {

                    return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "record_actions" (not an array)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // -------------------------------------------------------------

                $allowed_record_action_types = array(
                    'standard'      ,
                    'custom'
                    ) ;

                // -------------------------------------------------------------

                $custom_record_action_indices_by_slug = array() ;
                    //  By default, we assume that there are NO "custom" record
                    //  actions...

                // -------------------------------------------------------------

                foreach ( $selected_datasets_dmdd['dataset_records_table']['record_actions'] as $this_record_action_index => $this_record_action_details ) {

                    // ---------------------------------------------------------

                    $record_action_number = $this_record_action_index + 1 ;

                    // ---------------------------------------------------------
                    // type ?
                    // ---------------------------------------------------------

                    if ( ! isset( $this_record_action_details['type'] ) ) {

                        return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" record action# {$record_action_number} (no "type")
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                    }

                    // ---------------------------------------------------------

                    if (    ! is_string( $this_record_action_details['type'] )
                            ||
                            trim( $this_record_action_details['type'] ) === ''
                        ) {

                        return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + record action# {$record_action_number} + "type" (non-empty string expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                    }

                    // ---------------------------------------------------------

                    if ( ! in_array( $this_record_action_details['type'] , $allowed_record_action_types , TRUE ) ) {

                        $safe_type = htmlentities( $this_record_action_details['type'] ) ;

                        return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Unrecognised/unsupported "dataset_records_table" + record action# {$record_action_number} + "type" ("{$safe_type}")
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                    }

                    // ---------------------------------------------------------
                    // slug ?
                    // ---------------------------------------------------------

                    if ( ! isset( $this_record_action_details['slug'] ) ) {

                        return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" record action# {$record_action_number} (no "slug")
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                    }

                    // ---------------------------------------------------------

                    if (    ! is_string( $this_record_action_details['slug'] )
                            ||
                            trim( $this_record_action_details['slug'] ) === ''
                            ||
                            strlen( $this_record_action_details['slug'] ) > 64
                            ||
                            ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash( $this_record_action_details['slug'] )
                        ) {

                        return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + record action# {$record_action_number} + "slug" (1 to 64 character "alphanumeric underscore dash" type string expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                    }

                    // ---------------------------------------------------------
                    // link_title ?
                    // ---------------------------------------------------------

                    if ( ! isset( $this_record_action_details['link_title'] ) ) {

                        return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" record action# {$record_action_number} (no "link_title")
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                    }

                    // ---------------------------------------------------------

                    if (    ! is_string( $this_record_action_details['link_title'] )
                            ||
                            trim( $this_record_action_details['link_title'] ) === ''
                            ||
                            strlen( $this_record_action_details['link_title'] ) > 255
                        ) {

                        return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + record action# {$record_action_number} + "link_title" (1 to 255 character string expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                    }

                    // ---------------------------------------------------------
                    // Record any custom record actions found...
                    // ---------------------------------------------------------

                    if ( $this_record_action_details['type'] === 'custom' ) {

                        $custom_record_action_indices_by_slug[
                            $this_record_action_details['slug']
                            ] = $this_record_action_index
                            ;

                    }

                    // ---------------------------------------------------------

                }

                // =============================================================
                // CHECK the CUSTOM ACTIONS (but only if at least one
                // record action points to a custom action)...
                // =============================================================

                if ( count( $custom_record_action_indices_by_slug ) > 0 ) {

                    // =========================================================
                    // CHECK the dataset's CUSTOM ACTIONS array...
                    // =========================================================

                    // -------------------------------------------------------------------------
                    // validate_and_index_datasets_custom_actions(
                    //      $selected_datasets_dmdd     ,
                    //      $dataset_title
                    //      )
                    // - - - - - - - - - - - - - - - - - - - - - -
                    // Checks that the specified dataset's:-
                    //      "custom_actions"
                    //
                    // parameter is present - and reasonably valid looking.
                    //
                    // $custom_actions should be (eg):-
                    //
                    //      $custom_actions = array(
                    //
                    //          array(
                    //              'slug'      =>  'select-dirs-files'                     ,
                    //              'args'      =>  array(
                    //                                  'plugin_stuff_relative_filespec'    =>  'select-dirs-and-files.php'     ,
                    //                                  'namespace_and_function_name'       =>  'select_dirs_and_files'
                    //                                  )
                    //              )
                    //
                    //          )
                    //
                    // RETURNS
                    //      o   On SUCCESS!
                    //          - - - - - -
                    //          ARRAY $custom_action_indices_by_slug
                    //
                    //      o   On FAILURE!
                    //          - - - - - -
                    //          $error_message STRING
                    // -------------------------------------------------------------------------

                    $custom_action_indices_by_slug =
                        validate_and_index_datasets_custom_actions(
                            $selected_datasets_dmdd     ,
                            $dataset_title
                            ) ;

                    // ---------------------------------------------------------

                    if ( is_string( $custom_action_indices_by_slug ) ) {
                        return $custom_action_indices_by_slug ;
                    }

                    // ---------------------------------------------------------
                    // Here we should have (eg):-
                    //
                    //      $custom_action_indices_by_slug = Array(
                    //          [select-export-dirs-files] => 0
                    //          )
                    //
                    // ---------------------------------------------------------

//pr( $custom_action_indices_by_slug , '$custom_action_indices_by_slug' ) ;

                    // =========================================================
                    // CHECK that the specified CUSTOM RECORD ACTIONS have a
                    // matching entry in the CUSTOM ACTIONS array...
                    // =========================================================

                    // ---------------------------------------------------------
                    // Here we should have (eg):-
                    //
                    //      $custom_record_action_indices_by_slug = Array(
                    //          select-dirs-files => [2]
                    //          )
                    //
                    // ---------------------------------------------------------

//pr( $custom_record_action_indices_by_slug , '$custom_record_action_indices_by_slug' ) ;

                    // ---------------------------------------------------------

                    foreach ( $custom_record_action_indices_by_slug as $record_action_slug => $record_action_index ) {

                        // ------------------------------------------------------

                        if ( ! array_key_exists( $record_action_slug , $custom_action_indices_by_slug ) ) {

                            $record_action_number = $record_action_index + 1 ;

                            $safe_record_action_slug = htmlentities( $record_action_slug ) ;

                            return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + record action# {$record_action_number} + "slug" ("{$safe_record_action_slug}" - dataset has NO matching "custom action")
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                        }

                        // -----------------------------------------------------

                    }

                    // ---------------------------------------------------------

                }

                // =============================================================
                // Check/default the ACTION SEPARATOR...
                // =============================================================

                if ( isset( $selected_datasets_dmdd['dataset_records_table']['action_separator'] ) ) {

                    // ---------------------------------------------------------

                    if ( ! is_string( $selected_datasets_dmdd['dataset_records_table']['action_separator'] ) ) {

                        return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "action_separator" (not a string)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                    }

                    // ---------------------------------------------------------

                } else {

                    // ---------------------------------------------------------

                    $selected_datasets_dmdd['dataset_records_table']['action_separator'] = ' &nbsp; ' ;

                    // ---------------------------------------------------------

                }

                // =============================================================
                // Set this column's TABLE DATA for all the dataset records...
                // =============================================================

                foreach ( $dataset_records as $record_index => $record_data ) {

                    // -------------------------------------------------------------------------
                    // get_action_column_value_for_dataset_record(
                    //      $all_application_dataset_definitions            ,
                    //      $caller_apps_includes_dir                       ,
                    //      $question_front_end                             ,
                    //      $selected_datasets_dmdd                         ,
                    //      $dataset_records                                ,
                    //      $dataset_slug                                   ,
                    //      $dataset_title                                  ,
                    //      $array_storage_key_field_slug                   ,
                    //      $dataset_record_index                           ,
                    //      $dataset_record_data                            ,
                    //      $column_index                                   ,
                    //      $column_number                                  ,
                    //      $column_def                                     ,
                    //      &$custom_get_table_data_function_data           ,
                    //      &$question_delete_record_javascript_required
                    //      )
                    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
                    // RETURNS
                    //      o   On SUCCESS!
                    //          - - - - - -
                    //          $column_value (HTML) STRING
                    //
                    //          And updates:-
                    //              $question_delete_record_javascript_required
                    //          to TRUE, if required.
                    //
                    //      o   On FAILURE!
                    //          - - - - - -
                    //          ARRAY( $error_message STRING )
                    // -------------------------------------------------------------------------

                    $column_value = get_action_column_value_for_dataset_record(
                                        $all_application_dataset_definitions            ,
                                        $caller_apps_includes_dir                       ,
                                        $question_front_end                             ,
                                        $selected_datasets_dmdd                         ,
                                        $dataset_records                                ,
                                        $dataset_slug                                   ,
                                        $dataset_title                                  ,
                                        $array_storage_key_field_slug                   ,
                                        $record_index                                   ,
                                        $record_data                                    ,
                                        $this_column_index                              ,
                                        $column_number                                  ,
                                        $this_column_def                                ,
                                        $custom_get_table_data_function_data            ,
                                        $question_delete_record_javascript_required
                                        ) ;

                    // ---------------------------------------------------------

                    if ( is_array( $column_value ) ) {
                        return $column_value[0] ;
                    }

                    // ---------------------------------------------------------

                    if ( array_key_exists( $record_index , $table_data ) ) {

                        $table_data[ $record_index ][ $this_column_def['data_field_slug_to_display'] ] = $column_value ;

                    } else {

                        $table_data[ $record_index ] = array(
                            $this_column_def['data_field_slug_to_display'] => $column_value
                            ) ;

                    }

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

            } else {

                // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
                // UNRECOGNISED / UNSUPPORTED "SPECIAL_TYPE"...
                // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

                $safe_instance = htmlentities( $this_column_def['raw_value_from']['instance'] ) ;

                return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Unrecognised/unsupported "dataset_records_table" + "column_defs" + "raw_value_from" + (special-type) "instance" + "{$safe_instance}" - for column# {$column_number}
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                // -------------------------------------------------------------

            }

            // ------------------------------------------------------------------

        } elseif ( $this_column_def['raw_value_from']['method'] === 'foreign-field' ) {

            // =================================================================
            // FOREIGN-FIELD
            // =================================================================

            // -------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_column_def['raw_value_from'] = array(
            //          'method'    =>  'foreign-field'             ,
            //          'instance'  =>  "<target-field-name>"       ,
            //          'args'      =>  array(
            //                              array(
            //                                  'pointer_field_array_storage_slug'  =>  '<pointer_field_slug>'  ,
            //                                  'foreign_dataset'                   =>  '<dataset_slug>'
            //                                  )   ,
            //                              ...
            //                              )
            //          )
            //
            // -----------------------------------------------------------------

            if (    ! is_string( $this_column_def['raw_value_from']['instance'] )
                    ||
                    trim( $this_column_def['raw_value_from']['instance'] ) === ''
                    ||
                    ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_varname( $this_column_def['raw_value_from']['instance'] )
                    ||
                    strlen( $this_column_def['raw_value_from']['instance'] ) > 64
                ) {

                return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "raw_value_from" + (foreign-field) "instance" - for column# {$column_number} (max. 64 character, variable-name like string required)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // ------------------------------------------------------------------

            if ( ! is_array( $this_column_def['raw_value_from']['args'] ) ) {

                return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "raw_value_from" + (foreign-field) "args" - for column# {$column_number} (array required)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // ------------------------------------------------------------------

            $target_array_storage_field_slug =
                $this_column_def['raw_value_from']['instance']
                ;

            // ------------------------------------------------------------------

            $records_to_traverse =
                $this_column_def['raw_value_from']['args']
                ;

            // =================================================================
            // Get this field's TABLE DATA for all the dataset records...
            // =================================================================

            foreach ( $dataset_records as $record_index => $record_data ) {

                // =============================================================
                // GET the RAW FIELD VALUE...
                // =============================================================

                // -------------------------------------------------------------------------
                // get_foreign_field_value(
                //      $start_record_data                      ,
                //      $records_to_traverse                    ,
                //      $target_array_storage_field_slug        ,
                //      &$loaded_datasets                       ,
                //      $all_application_dataset_definitions    ,
                //      $caller_apps_includes_dir               ,
                //      &$custom_get_table_data_function_data
                //      )
                // - - - - - - - - - - - - - - - - - - - - -
                // Returns the specified foreign field value.
                //
                // $records_to_traverse is like (eg):-
                //
                //      $records_to_traverse = array(
                //  //      <array-storage-field-slug-in-current-record>    =>  <dataset-slug-to-go-to>
                //          'category_key'                                  =>  'categories'
                //          'project_key'                                   =>  'projects'
                //          )
                //
                // $loaded_datasets is like (eg):-
                //
                //      $loaded_datasets = array(
                //
                //          <dataset_slug>  =>  array(
                //                                  'title'                 =>  "xxx"           ,
                //                                  'records'               =>  array(...)      ,
                //                                  'key_field_slug'        =>  "xxx" or NULL
                //                                  'record_indices_by_key' =>  array(...)
                //                                  )   ,
                //
                //          ...
                //
                //          )
                //
                // RETURNS
                //      o   array(
                //              $ok = TRUE              ,
                //              $foreign_field_value        //  (any PHP type)
                //              ) on SUCCESS
                //      o   array(
                //              $ok = FALSE             ,
                //              $error_message STRING
                //              ) on FAILURE
                // -------------------------------------------------------------------------

                $result = get_foreign_field_value(
                                $record_data                            ,
                                $records_to_traverse                    ,
                                $target_array_storage_field_slug        ,
                                $loaded_datasets                        ,
                                $all_application_dataset_definitions    ,
                                $caller_apps_includes_dir               ,
                                $custom_get_table_data_function_data
                                ) ;

                // -------------------------------------------------------------

                list( $ok , $raw_field_value ) = $result ;

                // -------------------------------------------------------------

                if ( $ok !== TRUE ) {
                    return $raw_field_value ;
                }

                // =============================================================
                // SAVE the "DISPLAY" VALUE...
                // =============================================================

                $display_value = $raw_field_value ;

                // -------------------------------------------------------------------------
                // apply_display_treatments_to_field_value(
                //      $all_application_dataset_definitions    ,
                //      $selected_datasets_dmdd                 ,
                //      $dataset_records                        ,
                //      $dataset_slug                           ,
                //      $dataset_title                          ,
                //      $question_front_end                     ,
                //      $caller_apps_includes_dir               ,
                //      $this_column_def_index                  ,
                //      $this_column_def                        ,
                //      $this_dataset_record_index              ,
                //      $this_dataset_record_data               ,
                //      &$custom_get_table_data_function_data   ,
                //      &$field_value
                //      )
                // - - - - - - - - - - - - - - - - - - - - - - -
                // Applies the specified "treatments" to the current field's value...
                //
                // RETURNS
                //      o   On SUCCESS!
                //          - - - - - -
                //          TRUE
                //
                //      o   On FAILURE!
                //          - - - - - -
                //          $error_message STRING
                // -------------------------------------------------------------------------

                $result = apply_display_treatments_to_field_value(
                                $all_application_dataset_definitions    ,
                                $selected_datasets_dmdd                 ,
                                $dataset_records                        ,
                                $dataset_slug                           ,
                                $dataset_title                          ,
                                $question_front_end                     ,
                                $caller_apps_includes_dir               ,
                                $this_column_index                      ,
                                $this_column_def                        ,
                                $record_index                           ,
                                $record_data                            ,
                                $custom_get_table_data_function_data    ,
                                $display_value
                                ) ;

                // -------------------------------------------------------------

                if ( is_string( $result ) ) {
                    return $result ;
                }

                // -------------------------------------------------------------

                if ( array_key_exists( $record_index , $table_data ) ) {

                    $table_data[ $record_index ][ $this_column_def['data_field_slug_to_display'] ] = $display_value ;

                } else {

                    $table_data[ $record_index ] = array(
                        $this_column_def['data_field_slug_to_display'] => $display_value
                        ) ;

                }

                // =============================================================
                // SAVE the "SORT" VALUE (if there is one)...
                // =============================================================

                if ( $this_column_def['question_sortable'] ) {

                    // ---------------------------------------------------------

                    $sort_value = $raw_field_value ;

//                  // -------------------------------------------------------------------------
//                  // apply_sort_treatments_to_field_value(
//                  //      $all_application_dataset_definitions    ,
//                  //      $selected_datasets_dmdd                 ,
//                  //      $dataset_records                        ,
//                  //      $dataset_slug                           ,
//                  //      $dataset_title                          ,
//                  //      $question_front_end                     ,
//                  //      $caller_apps_includes_dir               ,
//                  //      $this_column_def_index                  ,
//                  //      $this_column_def                        ,
//                  //      $this_dataset_record_index              ,
//                  //      $this_dataset_record_data               ,
//                  //      &$custom_get_table_data_function_data   ,
//                  //      &$field_value
//                  //      )
//                  // - - - - - - - - - - - - - - - - - - - - - - -
//                  // Applies the specified "treatments" to the current field's value...
//                  //
//                  // RETURNS
//                  //      o   On SUCCESS!
//                  //          - - - - - -
//                  //          TRUE
//                  //
//                  //      o   On FAILURE!
//                  //          - - - - - -
//                  //          $error_message STRING
//                  // -------------------------------------------------------------------------
//
//                  $result = apply_sort_treatments_to_field_value(
//                                  $all_application_dataset_definitions    ,
//                                  $selected_datasets_dmdd                 ,
//                                  $dataset_records                        ,
//                                  $dataset_slug                           ,
//                                  $dataset_title                          ,
//                                  $question_front_end                     ,
//                                  $caller_apps_includes_dir               ,
//                                  $this_column_index                      ,
//                                  $this_column_def                        ,
//                                  $record_index                           ,
//                                  $record_data                            ,
//                                  $custom_get_table_data_function_data    ,
//                                  $sort_value
//                                  ) ;
//
//                  // ---------------------------------------------------------
//
//                  if ( is_string( $result ) ) {
//                      return $result ;
//                  }

                    // ---------------------------------------------------------

                    if ( $data_for === 'wp-list-table' ) {

                        // -----------------------------------------------------

                        if ( array_key_exists( $record_index , $table_data ) ) {

                            $table_data[ $record_index ][ $this_column_def['data_field_slug_to_sort_by'] ] = $sort_value ;

                        } else {

                            $table_data[ $record_index ] = array(
                                $this_column_def['data_field_slug_to_sort_by'] => $sort_value
                                ) ;

                        }

                        // -----------------------------------------------------

                    } elseif ( $data_for === 'dhtmlx-grid' ) {

                        // -----------------------------------------------------
                        // $sort_data is like (eg):-
                        //
                        //      $sort_data = array(
                        //          '<sort_field_slug_1>'   =>  array(...values_1...)
                        //          '<sort_field_slug_2>'   =>  array(...values_2...)
                        //          ...
                        //          '<sort_field_slug_3>'   =>  array(...values_3...)
                        //          )
                        //
                        // NOTE!
                        // =====
                        // When adding the values, we DON'T add duplicates.
                        // -----------------------------------------------------

                        if ( array_key_exists(
                                $this_column_def['data_field_slug_to_sort_by']  ,
                                $sort_data
                                )
                            ) {

                            if ( ! in_array(    $sort_value                                                     ,
                                                $sort_data[ $this_column_def['data_field_slug_to_sort_by'] ]    ,
                                                TRUE
                                                )
                                ) {
                                $sort_data[ $this_column_def['data_field_slug_to_sort_by'] ][] = $sort_value ;
                            }

                        } else {

                            $sort_data[ $this_column_def['data_field_slug_to_sort_by'] ] = array(
                                $sort_value
                                ) ;

                        }

                        // -----------------------------------------------------

                    }

                    // ---------------------------------------------------------

                }

                // =============================================================
                // Repeat with the NEXT RECORD (if there is one)...
                // =============================================================

            }

            // ------------------------------------------------------------------

        } elseif ( $this_column_def['raw_value_from']['method'] === 'custom-function' ) {

            // =================================================================
            // CUSTOM-FUNCTION
            // =================================================================

            // -------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_column_def['raw_value_from'] = array(
            //          'method'    =>  'custom-function'                                               ,
            //          'instance'  =>  "function-name-including-namespace-prefix-if-there-is-one>"     ,
            //          'args'      =>  array()
            //          )
            //
            // -----------------------------------------------------------------

            // -----------------------------------------------------------------
            // instance ?
            // -----------------------------------------------------------------

            if ( ! array_key_exists( 'instance' , $this_column_def['raw_value_from'] ) ) {

                return <<<EOT
PROBLEM:&nbsp; No "dataset_records_table" + "column_defs" + "raw_value_from" + (custom-function) "instance" - for column# {$column_number}
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            if (    ! is_string( $this_column_def['raw_value_from']['instance'] )
                    ||
                    trim( $this_column_def['raw_value_from']['instance'] ) === ''
                    ||
                    strlen( $this_column_def['raw_value_from']['instance'] ) > 512
                ) {

                return <<<EOT
PROBLEM:&nbsp; Bad "dataset_records_table" + "column_defs" + "raw_value_from" + (custom-function) "instance" - for column# {$column_number} (1 to 512 character string required)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            if ( ! function_exists( $this_column_def['raw_value_from']['instance'] ) ) {

                return <<<EOT
PROBLEM:&nbsp; Bad "dataset_records_table" + "column_defs" + "raw_value_from" + (custom-function) "instance" - for column# {$column_number} (no such function)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // =================================================================
            // Get this column's TABLE DATA for all the dataset records...
            // =================================================================

            foreach ( $dataset_records as $record_index => $record_data ) {

                // =============================================================
                // GET THE RAW FIELD VALUE...
                // =============================================================

                // -------------------------------------------------------------------------
                // <my_custom_get_dataset_record_column_value_function>(
                //      $all_application_dataset_definitions    ,
                //      $selected_datasets_dmdd                 ,
                //      $dataset_records                        ,
                //      $dataset_slug                           ,
                //      $dataset_title                          ,
                //      $question_front_end                     ,
                //      $caller_apps_includes_dir               ,
                //      $this_column_def_index                  ,
                //      $this_column_def                        ,
                //      $this_dataset_record_index              ,
                //      $this_dataset_record_data               ,
                //      &$custom_get_table_data_function_data   ,
                //      &$loaded_datasets
                //      )
                // - - - - - - - - - - - - - - - - - - - - - - - - - - -
                // Returns the specified column value...
                //
                // $loaded_datasets is like:-
                //
                //      $loaded_datasets = array(
                //
                //          <dataset_slug>  =>  array(
                //                                  'title'                 =>  "xxx"           ,
                //                                  'records'               =>  array(...)      ,
                //                                  'key_field_slug'        =>  "xxx" or NULL
                //                                  'record_indices_by_key' =>  array(...)
                //                                  )   ,
                //
                //          ...
                //
                //          )
                //
                // RETURNS
                //      o   On SUCCESS!
                //          - - - - - -
                //          $field_value STRING
                //
                //      o   On FAILURE!
                //          - - - - - -
                //          array( $error_message STRING )
                // -------------------------------------------------------------------------

                $raw_field_value = $this_column_def['raw_value_from']['instance'](
                                        $all_application_dataset_definitions    ,
                                        $selected_datasets_dmdd                 ,
                                        $dataset_records                        ,
                                        $dataset_slug                           ,
                                        $dataset_title                          ,
                                        $question_front_end                     ,
                                        $caller_apps_includes_dir               ,
                                        $this_column_index                      ,
                                        $this_column_def                        ,
                                        $record_index                           ,
                                        $record_data                            ,
                                        $custom_get_table_data_function_data    ,
                                        $loaded_datasets
                                        ) ;

                // -------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $raw_field_value ) ;

                if ( is_array( $raw_field_value ) ) {
                    return $raw_field_value[0] ;
                }

                // =============================================================
                // SAVE THE "DISPLAY" VALUE
                // =============================================================

                $display_value = $raw_field_value ;

                // -------------------------------------------------------------------------
                // apply_display_treatments_to_field_value(
                //      $all_application_dataset_definitions    ,
                //      $selected_datasets_dmdd                 ,
                //      $dataset_records                        ,
                //      $dataset_slug                           ,
                //      $dataset_title                          ,
                //      $question_front_end                     ,
                //      $caller_apps_includes_dir               ,
                //      $this_column_def_index                  ,
                //      $this_column_def                        ,
                //      $this_dataset_record_index              ,
                //      $this_dataset_record_data               ,
                //      &$custom_get_table_data_function_data   ,
                //      &$field_value
                //      )
                // - - - - - - - - - - - - - - - - - - - - - - -
                // Applies the specified "treatments" to the current field's value...
                //
                // RETURNS
                //      o   On SUCCESS!
                //          - - - - - -
                //          TRUE
                //
                //      o   On FAILURE!
                //          - - - - - -
                //          $error_message STRING
                // -------------------------------------------------------------------------

                $result = apply_display_treatments_to_field_value(
                                $all_application_dataset_definitions    ,
                                $selected_datasets_dmdd                 ,
                                $dataset_records                        ,
                                $dataset_slug                           ,
                                $dataset_title                          ,
                                $question_front_end                     ,
                                $caller_apps_includes_dir               ,
                                $this_column_index                      ,
                                $this_column_def                        ,
                                $record_index                           ,
                                $record_data                            ,
                                $custom_get_table_data_function_data    ,
                                $display_value
                                ) ;

                // -------------------------------------------------------------

                if ( is_string( $result ) ) {
                    return $result ;
                }

                // -------------------------------------------------------------

                if ( array_key_exists( $record_index , $table_data ) ) {

                    $table_data[ $record_index ][ $this_column_def['data_field_slug_to_display'] ] = $display_value ;

                } else {

                    $table_data[ $record_index ] = array(
                        $this_column_def['data_field_slug_to_display'] => $display_value
                        ) ;

                }

                // =============================================================
                // SAVE THE "SORT" VALUE (if there is one)...
                // =============================================================

                if ( $this_column_def['question_sortable'] ) {

                    // ---------------------------------------------------------

                    $sort_value = $raw_field_value ;

//                  // -------------------------------------------------------------------------
//                  // apply_sort_treatments_to_field_value(
//                  //      $all_application_dataset_definitions    ,
//                  //      $selected_datasets_dmdd                 ,
//                  //      $dataset_records                        ,
//                  //      $dataset_slug                           ,
//                  //      $dataset_title                          ,
//                  //      $question_front_end                     ,
//                  //      $caller_apps_includes_dir               ,
//                  //      $this_column_def_index                  ,
//                  //      $this_column_def                        ,
//                  //      $this_dataset_record_index              ,
//                  //      $this_dataset_record_data               ,
//                  //      &$custom_get_table_data_function_data   ,
//                  //      &$field_value
//                  //      )
//                  // - - - - - - - - - - - - - - - - - - - - - - -
//                  // Applies the specified "treatments" to the current field's value...
//                  //
//                  // RETURNS
//                  //      o   On SUCCESS!
//                  //          - - - - - -
//                  //          TRUE
//                  //
//                  //      o   On FAILURE!
//                  //          - - - - - -
//                  //          $error_message STRING
//                  // -------------------------------------------------------------------------
//
//                  $result = apply_sort_treatments_to_field_value(
//                                  $all_application_dataset_definitions    ,
//                                  $selected_datasets_dmdd                 ,
//                                  $dataset_records                        ,
//                                  $dataset_slug                           ,
//                                  $dataset_title                          ,
//                                  $question_front_end                     ,
//                                  $caller_apps_includes_dir               ,
//                                  $this_column_index                      ,
//                                  $this_column_def                        ,
//                                  $record_index                           ,
//                                  $record_data                            ,
//                                  $custom_get_table_data_function_data    ,
//                                  $sort_value
//                                  ) ;
//
//                  // ---------------------------------------------------------
//
//                  if ( is_string( $result ) ) {
//                      return $result ;
//                  }

                    // ---------------------------------------------------------

                    if ( $data_for === 'wp-list-table' ) {

                        // -----------------------------------------------------

                        if ( array_key_exists( $record_index , $table_data ) ) {

                            $table_data[ $record_index ][ $this_column_def['data_field_slug_to_sort_by'] ] = $sort_value ;

                        } else {

                            $table_data[ $record_index ] = array(
                                $this_column_def['data_field_slug_to_sort_by'] => $sort_value
                                ) ;

                        }

                        // -----------------------------------------------------

                    } elseif ( $data_for === 'dhtmlx-grid' ) {

                        // -----------------------------------------------------
                        // $sort_data is like (eg):-
                        //
                        //      $sort_data = array(
                        //          '<sort_field_slug_1>'   =>  array(...values_1...)
                        //          '<sort_field_slug_2>'   =>  array(...values_2...)
                        //          ...
                        //          '<sort_field_slug_3>'   =>  array(...values_3...)
                        //          )
                        //
                        // NOTE!
                        // =====
                        // When adding the values, we DON'T add duplicates.
                        // -----------------------------------------------------

                        if ( array_key_exists(
                                $this_column_def['data_field_slug_to_sort_by']  ,
                                $sort_data
                                )
                            ) {

                            if ( ! in_array(    $sort_value                                                     ,
                                                $sort_data[ $this_column_def['data_field_slug_to_sort_by'] ]    ,
                                                TRUE
                                                )
                                ) {
                                $sort_data[ $this_column_def['data_field_slug_to_sort_by'] ][] = $sort_value ;
                            }

                        } else {

                            $sort_data[ $this_column_def['data_field_slug_to_sort_by'] ] = array(
                                $sort_value
                                ) ;

                        }

                        // -----------------------------------------------------

                    }

                    // ---------------------------------------------------------

                }

                // =============================================================
                // Repeat with the NEXT RECORD (if there is one)...
                // =============================================================

            }

            // -----------------------------------------------------------------

        } else {

            // =============================================================
            // ERROR
            // =============================================================

            $method = htmlentities( $this_column_def['raw_value_from']['method'] ) ;

            return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Unrecognised/unsupported "dataset_records_table" + "column_defs" + "raw_value_from" + "method" ("{$method}") - for column# {$column_number}
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            // ------------------------------------------------------------------

        }

        // =====================================================================
        // This data field is available for column sorting...
        // =====================================================================

        $data_field_slugs_for_column_sorting[] = $this_column_def['base_slug'] ;

        // =====================================================================
        // Repeat with the NEXT Dataset Records Table data FIELD (if there is
        // one)...
        // =====================================================================

    }

    // =========================================================================
    // Run the TABLE DATA CUSTOMISATION function (if there is one)...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we might have (eg):-
    //
    //      $selected_datasets_dmdd['dataset_records_table']['table_data_customisation'] = array(
    //          'function_name'     =>  "xxx"
    //          'extra_args'        =>  NULL | FALSE | array() | array(...)
    //          )
    //
    // -------------------------------------------------------------------------

    if (    array_key_exists( 'table_data_customisation' , $selected_datasets_dmdd['dataset_records_table'] )
            &&
            is_array( $selected_datasets_dmdd['dataset_records_table']['table_data_customisation'] )
            &&
            count( $selected_datasets_dmdd['dataset_records_table']['table_data_customisation'] ) > 0
        ) {

        // ---------------------------------------------------------------------
        // function_name ?
        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'function_name' , $selected_datasets_dmdd['dataset_records_table']['table_data_customisation'] ) ) {

            return <<<EOT
PROBLEM:&nbsp; No "dataset_records_table" + "table_data_customisation" + "function_name"
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        if (    ! is_string( $selected_datasets_dmdd['dataset_records_table']['table_data_customisation']['function_name'] )
                ||
                trim( $selected_datasets_dmdd['dataset_records_table']['table_data_customisation']['function_name'] ) === ''
            ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "dataset_records_table" + "table_data_customisation" + "function_name" (non-empty string expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        if ( ! function_exists( $selected_datasets_dmdd['dataset_records_table']['table_data_customisation']['function_name'] ) ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "dataset_records_table" + "table_data_customisation" + "function_name" (function not found)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------
        // extra_args ?
        // ---------------------------------------------------------------------

        if (    array_key_exists( 'extra_args' , $selected_datasets_dmdd['dataset_records_table']['table_data_customisation'] )
                &&
                is_array( $selected_datasets_dmdd['dataset_records_table']['table_data_customisation']['extra_args'] )
            ) {
            $extra_args = $selected_datasets_dmdd['dataset_records_table']['table_data_customisation']['extra_args'] ;

        } else {
            $extra_args = array() ;

        }

        // -------------------------------------------------------------------------
        // <my-table-data-customisation-function>(
        //      $all_application_dataset_definitions    ,
        //      $selected_datasets_dmdd                 ,
        //      $dataset_records                        ,
        //      $dataset_slug                           ,
        //      $dataset_title                          ,
        //      $question_front_end                     ,
        //      $caller_apps_includes_dir               ,
        //      $data_for                               ,
        //      $loaded_datasets                        ,
        //      &$custom_get_table_data_function_data   ,
        //      &$table_data                            ,
        //      &$sort_data                             ,
        //      &$data_field_slugs_for_column_sorting
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // Allows you to update any of the following:-
        //      o   $custom_get_table_data_function_data
        //      o   $table_data
        //      o   $sort_data
        //      o   $data_field_slugs_for_column_sorting
        //
        // as required.
        //
        // ---
        //
        // On ENTRY, the $table_data rows will match the $dataset_records rows ONE
        // FOR ONE.  With $table_data having the record info to be displayed in the
        // Dataset Records Table columns.
        //
        // So now you can add new rows, delete old rows, or re-arrange the
        // $table_data rows as reuired.
        //
        // Say you had a "Posts" dataset, that listed a bunch of "posts" that acted
        // very much like WordPress "posts".  Eg:-
        //
        //     $table_data = array(
        //         array(
        //             'title' =>  'Woochester City Gardens'   ,
        //             'text'  =>  "xxx"                       ,
        //             ...
        //             )
        //         array(
        //             'title' =>  'Shifting House'    ,
        //             'text'  =>  "xxx"               ,
        //             ...
        //             )
        //         ...
        //         )
        //
        // And you wanted to display these posts by category.  Eg:-
        //
        //     o   Home Stuff
        //             Shifting House
        //             ...
        //     o   Photography
        //             Woochester City Gardens
        //             ...
        //     o   ...
        //
        // Then this CUSTOM TABLE DATA routine might re-arrange and add to the input
        // $table_data rows as follows:-
        //
        //     $table_data = array(
        //         array(
        //             'title' =>  'HOME STUFF'        ,
        //             'text'  =>  "xxx"               ,
        //             ...
        //             )
        //         array(
        //             'title' =>  '>>> Shifting House'    ,
        //             'text'  =>  "xxx"                   ,
        //             ...
        //             )
        //         ...
        //         array(
        //             'title' =>  'PHOTOGRAPHY'       ,
        //             'text'  =>  "xxx"               ,
        //             ...
        //             )
        //         array(
        //             'title' =>  '>>> Woochester City Gardens'   ,
        //             'text'  =>  "xxx"                           ,
        //             ...
        //             )
        //         ...
        //         )
        //
        // NOTES!
        // ------
        // 1.   $data_for = "wp-list-table" | "dhtmlx-grid"
        //
        // 2.   The field names in $dataset_table are the ARRAY STORAGE field
        //      names
        //
        //      The field names in $table_data are the Dataset Records Table
        //      COLUMN names.
        //
        // 3.   $sort_data is only used if $data_for = "dhtmlx-grid".  For
        //      $data_for = "wp-list-table", "$sort_data is the EMPRY array.
        //
        // RETURNS
        //      o   On SUCCESS
        //              TRUE
        //
        //      o   On FAILURE
        //              $error_message STRING
        // -------------------------------------------------------------------------

        $result = $selected_datasets_dmdd['dataset_records_table']['table_data_customisation']['function_name'](
                        $all_application_dataset_definitions    ,
                        $selected_datasets_dmdd                 ,
                        $dataset_records                        ,
                        $dataset_slug                           ,
                        $dataset_title                          ,
                        $question_front_end                     ,
                        $caller_apps_includes_dir               ,
                        $data_for                               ,
                        $loaded_datasets                        ,
                        $custom_get_table_data_function_data    ,
                        $table_data                             ,
                        $sort_data                              ,
                        $data_field_slugs_for_column_sorting
                        ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // CREATE the SUPPORT JAVASCRIPT (if required)...
    // =========================================================================

    $support_javascript = '' ;

    // -------------------------------------------------------------------------
    // Delete Record Support ?
    // -------------------------------------------------------------------------

    if ( $question_delete_record_javascript_required === TRUE ) {

        // ---------------------------------------------------------------------

        if ( $question_front_end ) {

            // -----------------------------------------------------------------

            require_once( $caller_apps_includes_dir . '/url-utils.php' ) ;

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\
            // get_query_adjusted_current_page_url(
            //      $query_changes = array()        ,
            //      $question_amp = FALSE           ,
            //      $question_die_on_error = FALSE
            //      ) ;
            // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
            // Attempts to retrieve the current page URL from $_SERVER.
            //
            // If successful, returns the URL with the query part adjusted as
            // requested.
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
                                'action'        =>  'delete-record'                 ,
                                'dataset_slug'  =>  '_DATASET_SLUG_GOES_HERE_'      ,
                                'record_key'    =>  '_RECORD_KEY_GOES_HERE_'
                                ) ;

            // -----------------------------------------------------------------

            if (    isset( $_GET['application'] )
                    &&
                    trim( $_GET['application'] ) !== ''
                    &&
                    strlen( $_GET['application'] ) <= 64
                    &&
                    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash( $_GET['application'] )
                ) {
                $query_changes['application'] = $_GET['application'] ;

            } else {
                $query_changes['application'] = NULL ;

            }

            // -----------------------------------------------------------------

            $question_amp = FALSE ;

            $question_die_on_error = FALSE ;

            $base_href = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\get_query_adjusted_current_page_url(
                            $query_changes              ,
                            $question_amp               ,
                            $question_die_on_error
                            ) ;

            if ( is_array( $base_href ) ) {
                return $base_href[0] ;
            }

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            if (    isset( $_GET['application'] )
                    &&
                    trim( $_GET['application'] ) !== ''
                    &&
                    strlen( $_GET['application'] ) <= 64
                    &&
                    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash( $_GET['application'] )
                ) {
                $application = '&application=' . $_GET['application'] ;

            } else {
                $application = '' ;

            }

            // -----------------------------------------------------------------

            $base_href = admin_url() . <<<EOT
/admin.php?page={$_GET['page']}&action=delete-record{$application}&dataset_slug=_DATASET_SLUG_GOES_HERE_&record_key=_RECORD_KEY_GOES_HERE_
EOT;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        require_once( $caller_apps_includes_dir . '/path-utils.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pathUtils\wp_path2url(
        //      $path
        //      )
        // - - - - - -
        // RETURNS:-
        //      o   $url on SUCCESS
        //      o   array( $error_message ) on FAILURE
        // -------------------------------------------------------------------------

        $js_files_url = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pathUtils\wp_path2url(
                            dirname( __FILE__ ) . '/js'
                            ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $js_files_url ) ) {
            return $js_files_url[0] ;
        }

        // -------------------------------------------------------------------------
        // greatKiwi_datasetManager_question_delete_record_proper(
        //      a_el                    ,
        //      dataset_slug            ,
        //      record_key              ,
        //      question_front_end      ,
        //      base_href
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Pops up a "DELETE this record, ARE YOU SURE?" box - and calls the
        // specified "base_href" to selected the specified record if the user
        // answers Yes.
        //
        // "base_href" is like (eg):-
        //      http://www.thissite.com/[XXX]&dataset_slug=_DATASET_SLUG_GOES_HERE_[&YYY]&record_key=_RECORD_KEY_GOES_HERE_[&ZZZ]
        // -------------------------------------------------------------------------

        if ( $question_front_end ) {
            $question_front_end_js = 'true' ;
        } else {
            $question_front_end_js = 'false' ;
        }

        // ---------------------------------------------------------------------

        $support_javascript = <<<EOT
<script type="text/javascript" src="{$js_files_url}/common.js"></script>
<script type="text/javascript" src="{$js_files_url}/delete-record.js"></script>
<script type="text/javascript">
    function greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager_questionDeleteRecord(
        a_el        ,
        record_key
        ) {
        // ---------------------------------------------------------------------
        greatKiwi_datasetManager_question_delete_record_proper(
            a_el                        ,
            '{$_GET['dataset_slug']}'   ,
            record_key                  ,
            {$question_front_end_js}    ,
            '{$base_href}'
            ) ;
        // ---------------------------------------------------------------------
    }
</script>
EOT;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

//pr( $table_data ) ;

//pr( $sort_data ) ;

    if ( $data_for === 'wp-list-table' ) {

        return array(
                    $table_data                             ,
                    $data_field_slugs_for_column_sorting    ,
                    $support_javascript
                    ) ;

    } elseif ( $data_for === 'dhtmlx-grid' ) {

        return array(
                    $table_data                             ,
                    $sort_data                              ,
                    $data_field_slugs_for_column_sorting    ,
                    $support_javascript
                    ) ;

    }

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

