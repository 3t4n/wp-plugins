<?php

// *****************************************************************************
// DATASET-MANAGER / ADD-EDIT-RECORD_SUBMISSION-HANDLER.PHP
// (C) 2013 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// Support Routines...
// =============================================================================

    require_once( dirname( __FILE__ ) . '/add-edit-record_submission-handler-support.php' ) ;

// =============================================================================
// handle_zebra_form_submission()
// =============================================================================

function handle_zebra_form_submission(
    $caller_app_slash_plugins_global_namespace      ,
    $dataset_manager_home_page_title                ,
    $caller_apps_includes_dir                       ,
    $all_application_dataset_definitions            ,
    $dataset_slug                                   ,
    $selected_datasets_dmdd                         ,
    $dataset_title                                  ,
    $dataset_records                                ,
    $record_indices_by_key                          ,
    $key_field_slug                                 ,
    $question_adding                                ,
    $form_slug_underscored
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // handle_zebra_form_submission(
    //      $caller_app_slash_plugins_global_namespace      ,
    //      $dataset_manager_home_page_title                ,
    //      $caller_apps_includes_dir                       ,
    //      $all_application_dataset_definitions            ,
    //      $dataset_slug                                   ,
    //      $selected_datasets_dmdd                         ,
    //      $dataset_title                                  ,
    //      $dataset_records                                ,
    //      $record_indices_by_key                          ,
    //      $key_field_slug                                 ,
    //      $question_adding                                ,
    //      $form_slug_underscored
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // If EDITING, updates the record from $_POST and saves it back to the
    // stored dataset.
    //
    // If ADDING, creates a new record (from the info. in the dataset
    // definition and $_POST), and saves it back to the stored dataset.
    //
    // RETURNS
    //      o   On SUCCESS!
    //              TRUE
    //
    //      o   On FAILURE
    //              array(
    //                  $error_message    STRING
    //                  $error_field_slug STRING
    //                  )
    //          NOTE! If the error is a generic one - that belongs to no
    //                specific field - then $error_field_slug will be the empty
    //                string.
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $selected_datasets_dmdd = Array(
    //
    //          [dataset_slug] => categories
    //          [dataset_name_singular]     => category
    //          [dataset_name_plural]       => categories
    //          [dataset_title_singular]    => Category
    //          [dataset_title_plural]      => Categories
    //          [basepress_dataset_handle]  => Array(
    //              [nice_name]     => researchAssistant_byFernTec_categories
    //              [unique_key]    => 6934fccc-c552-46b0-8db5-87a02...d9af7adf54
    //              [version]       => 0.1
    //              )
    //
    //          [dataset_records_table] => Array(
    //
    //              [columns] => Array(
    //
    //                  [0] => Array(
    //                              [column_title]                  => Project
    //                              [data_field_slug]               => project_title
    //                              [question_sortable]             => 1
    //                              [data_field_slug_to_sort_by]    =>
    //                              [column_slug]                   =>
    //                              )
    //
    //                  [1] => Array(
    //                              [column_title]                  => Title
    //                              [data_field_slug]               => title
    //                              [question_sortable]             => 1
    //                              [data_field_slug_to_sort_by]    =>
    //                              [column_slug]                   =>
    //                              )
    //
    //                  [2] => Array(
    //                              [column_title]                  => Action
    //                              [data_field_slug]               => action
    //                              [question_sortable]             =>
    //                              [column_slug]                   =>
    //                              )
    //
    //                  )
    //
    //              [data_field_defs] => Array(
    //
    //                  [0] => Array(
    //                              [data_field_slug]       => project_title
    //                              [value_from]            => Array(
    //                                                              [method]    => foreign-field
    //                                                              [instance]  => title
    //                                                              [args]      => Array(
    //                                                                              [parent_key] => projects
    //                                                                              )
    //                                                              )
    //                              [treatments]            => Array()
    //                              [treatment_function]    =>
    //                              )
    //
    //                  [1] => Array(
    //                              [data_field_slug]       => title
    //                              [value_from]            => Array(
    //                                  [method]    => array-storage-field-slug
    //                                  [instance]  => title
    //                                  )
    //                              [treatments]            =>
    //                              [treatment_function]    =>
    //                              )
    //
    //                  [2] => Array(
    //                              [data_field_slug]       =>
    //                              [value_from]            => Array(
    //                                  [method]    => special-type
    //                                  [instance]  => action
    //                                  )
    //                              )
    //
    //                  )
    //
    //              [rows_per_page]                         => 10
    //              [default_data_field_slug_to_orderby]    => title
    //              [default_order]                         => asc
    //              [actions]                               => Array(
    //                                                              [edit]   => edit
    //                                                              [delete] => delete
    //                                                              )
    //              [action_separator]                      =>
    //
    //              )
    //
    //          [zebra_form] => Array(
    //
    //              [form_specs] => Array(
    //                                  [name]                  => add_edit_category
    //                                  [method]                => POST
    //                                  [action]                =>
    //                                  [attributes]            => Array(
    //                                                                  [target] => _parent
    //                                                                  )
    //                                  [clientside_validation] => 1
    //                                  )
    //
    //              [field_specs] => Array(
    //
    //                  [0] => Array(
    //                              [form_field_name]       => parent_key
    //                              [zebra_control_type]    => select
    //                              [label]                 => Project
    //                              [value_from]            =>
    //                              [attributes]            => Array()
    //                              [rules]                 => Array(
    //                                  [required] => Array(
    //                                      [0] => error
    //                                      [1] => Field is required
    //                                      )
    //                                  )
    //                              [type_specific_args]    => Array(
    //                                  [options_getter_function] => Array(
    //                                      [function_name] => \researchAssistant_byFernTec_datasetManagerDatasetDefs_categories\get_options_for_project_selector
    //                                      [extra_args] =>
    //                                      )
    //                                  )
    //                              [constraints] => Array(
    //                                  [0] => Array(
    //                                              [type] => unique-key
    //                                              )
    //                                  )
    //                              )
    //
    //                  ...
    //
    //                  [5] => Array(
    //                              [form_field_name]       => cancel
    //                              [zebra_control_type]    => button
    //                              [label]                 =>
    //                              [attributes]            => Array(
    //                                  [onclick] => window.parent.location.href="http://localhost/plugdev/wp-admin//admin.php?page=researchAssistant&action=manage-dataset&dataset_slug=categories"
    //                                  )
    //                              [rules]                 => Array()
    //                              [type_specific_args]    => Array(
    //                                                              [caption]   => Cancel
    //                                                              [type]      => button
    //                                                              )
    //                              )
    //
    //                  )
    //
    //              [focus_field_slug] => 1
    //
    //              )
    //
    //          [array_storage_record_structure]    => Array(
    //
    //              [0] => Array(
    //                          [slug]          => created_server_datetime_UTC
    //                          [value_from]    => Array(
    //                                                  [method]    => created-server-datetime-utc
    //                                                  )
    //                          )
    //
    //              ...
    //
    //              [6] => Array(
    //                          [slug]          => notes_slash_comments
    //                          [value_from]    => Array(
    //                                                  [method]    => post
    //                                                  [instance]  => notes_slash_comments
    //                                                  )
    //
    //                          )
    //
    //              )
    //
    //          [array_storage_key_field_slug] => key
    //
    //          )
    //
    // -------------------------------------------------------------------------

//pr( $selected_datasets_dmdd ) ;

//pr( $_POST ) ;

    // =========================================================================
    // Some useful shortcuts...
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    if ( $question_adding ) {
        $adding_editing = 'Adding' ;

    } else {
        $adding_editing = 'Editing' ;

    }

    // -------------------------------------------------------------------------

    $no_error_field_slug = '' ;

    // -------------------------------------------------------------------------

    $zebra_form_definition = $selected_datasets_dmdd['zebra_forms'][ $form_slug_underscored ] ;

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

        return array( $msg , $no_error_field_slug ) ;

    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $app_handle ) ;

    // -------------------------------------------------------------------------

    $core_plugapp_dirs =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_core_plugapp_dirs(
            $path_in_plugin     ,
            $app_handle
            ) ;

    // =========================================================================
    // CHECK the:-
    //      $selected_datasets_dmdd
    // variables that are used...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/check-and-default-array-storage-record-structure.php' ) ;

    // -------------------------------------------------------------------------
    // check_and_default_array_storage_record_structure(
    //      $caller_app_slash_plugins_global_namespace      ,
    //      $dataset_manager_home_page_title                ,
    //      $caller_apps_includes_dir                       ,
    //      &$all_application_dataset_definitions           ,
    //      &$selected_datasets_dmdd                        ,
    //      $dataset_records                                ,
    //      $dataset_title                                  ,
    //      $dataset_slug
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Checks for:-
    //      $selected_datasets_dmdd['array_storage_record_structure']
    //
    // defaulting it and it's members as necessary.
    //
    // On successful return, we know that:-
    //      $selected_datasets_dmdd['array_storage_record_structure']
    //
    // is like:-
    //
    //      $selected_datasets_dmdd['array_storage_record_structure'] = array(
    //          'checked_defaulted_ok'  =>  TRUE    ,
    //          array(
    //              'slug'          =>  '<1 to 64 character variable name like string>'
    //              'array_storage_value_from'    =>  array(
    //                                      'method'    =>  '<1 to 64 character alphanumeric underscore dash like string>'
    //                                      ...0 to 2 more args...
    //                                      )
    //              )
    //          ...
    //          )
    //
    // So for all fields:-
    //      o   "slug" is set and valid
    //      o   "value_from" is an array - with at least a "method" element.
    //          Where the method name looks to be valid.
    //
    // However:-
    //      o   Whether or not the field's method name is recognised/supported,
    //          and;
    //      o   Whether or not the field's "instance" and "args" elements are
    //          supplied and valid for the method concerned, has NOT been
    //          checked.
    //
    // RETURNS:-
    //      On SUCCESS!
    //      - - - - - -
    //      TRUE
    //      And the caller's:-
    //          $all_application_dataset_definitions, and;
    //          $selected_datasets_dmdd
    //      have been updated as follows:-
    //          o   ...['array_storage_record_structure']['checked_defaulted_ok']
    //                  = TRUE
    //          o   The individual fields will have had any required default
    //              values set.
    //
    //      On FAILURE!
    //      - - - - - -
    //      $error_message STRING
    // -------------------------------------------------------------------------

    $result = check_and_default_array_storage_record_structure(
                    $caller_app_slash_plugins_global_namespace      ,
                    $dataset_manager_home_page_title                ,
                    $caller_apps_includes_dir                       ,
                    $all_application_dataset_definitions            ,
                    $selected_datasets_dmdd                         ,
                    $dataset_records                                ,
                    $dataset_title                                  ,
                    $dataset_slug
                    ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return array( $result , $no_error_field_slug ) ;
    }

    // =========================================================================
    // GET the field's POST VAR NAMES BY SLUG...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $selected_datasets_dmdd['array_storage_record_structure'] = array(
    //
    //          // ---------------------------------------------------------------------
    //          //
    //          //  'slug'  MUST be specified (variable name type string)
    //          //
    //          //  'array_storage_value_from'    OPTIONAL
    //          //
    //          //      o   If specified, must be one of:-
    //          //
    //          //          #   array(
    //          //                  'method'    =>  'created-server-datetime-utc'
    //          //                  //  "instance" and "args", if specified, are IGNORED
    //          //                  )
    //          //
    //          //          #   array(
    //          //                  'method'    =>  'last-modified-server-datetime-utc'
    //          //                  //  "instance" and "args", if specified, are IGNORED
    //          //                  )
    //          //
    //          //          #   array(
    //          //                  'method'    =>  'unique-key'
    //          //                  //  "instance" and "args", if specified, are IGNORED
    //          //                  )
    //          //
    //          //          #   array(
    //          //                  'method'    =>  'literal'                   ,
    //          //                  'instance'  =>  <any-PHP-scalar-value>
    //          //                  //  "args", if specified, is IGNORED
    //          //                  )
    //          //
    //          //          #   array(
    //          //                  'method'    =>  'get'               ,
    //          //                  'instance'  =>  '<get-var-name>'
    //          //                  //  If "instance" is unspecified - or is anything but a
    //          //                  //  non-empty string, then '<get-var-name>' defaults to
    //          //                  //  the field's "slug"
    //          //                  //  "args", if specified, is IGNORED
    //          //                  )
    //          //
    //          //          #   array(
    //          //                  'method'    =>  'post'              ,
    //          //                  'instance'  =>  '<post-var-name>'
    //          //                  //  If "instance" is unspecified - or is anything but a
    //          //                  //  non-empty string, then '<post-var-name>' defaults to
    //          //                  //  the field's "slug"
    //          //                  //  "args", if specified, is IGNORED
    //          //                  )
    //          //
    //          //          #   array(
    //          //                  'method'    =>  'server'                ,
    //          //                  'instance'  =>  '<server-var-name>'
    //          //                  //  If "instance" is unspecified - or is anything but a
    //          //                  //  non-empty string, then '<server-var-name>' defaults to
    //          //                  //  the field's "slug"
    //          //                  //  "args", if specified, is IGNORED
    //          //                  )
    //          //
    //          //          #   array(
    //          //                  'method'    =>  'cookie'                ,
    //          //                  'instance'  =>  '<cookie-var-name>'
    //          //                  //  If "instance" is unspecified - or is anything but a
    //          //                  //  non-empty string, then '<cookie-var-name>' defaults to
    //          //                  //  the field's "slug"
    //          //                  //  "args", if specified, is IGNORED
    //          //                  )
    //          //
    //          //          #   array(
    //          //                  'method'    =>  'function'                                          ,
    //          //                  'instance'  =>  '<function-name-including-namespace-if-necessary>'  ,
    //          //                  'args'      =>  <any-PHP-value>
    //          //                                  Though if multiple values are to be
    //          //                                  supplied, will usually be an
    //          //                                  associative array.  Eg:-
    //          //                                      array(
    //          //                                          'name_1'        =>  <value_1>
    //          //                                          'name_2'        =>  <value_2>
    //          //                                          ...                 ...
    //          //                                          'name_N'        =>  <value_N>
    //          //                                          )
    //          //                  )
    //          //
    //          //      o   If NOT specified, the field's value will be set to the
    //          //          empty string.
    //          //
    //          // ---------------------------------------------------------------------
    //
    //          array(
    //              'slug'          =>  'created_server_datetime_UTC'      ,
    //              'array_storage_value_from'    =>  array(
    //                                      'method'    =>  'created-server-datetime-utc'
    //                                      )
    //              )   ,
    //
    //          array(
    //              'slug'          =>  'last_modified_server_datetime_UTC'    ,
    //              'array_storage_value_from'    =>  array(
    //                                      'method'    =>  'last-modified-server-datetime-utc'
    //                                      )
    //              )   ,
    //
    //          array(
    //              'slug'          =>  'key'       ,
    //              'array_storage_value_from'    =>  array(
    //                                      'method'    =>  'unique-key'
    //                                      )
    //              )   ,
    //
    //          array(
    //              'slug'          =>  'parent_key'    ,
    //              'array_storage_value_from'    =>  array(
    //                                      'method'    =>  'post'          ,
    //                                      'instance'  =>  'parent_key'
    //                                      )
    //              )   ,
    //
    //          array(
    //              'slug'          =>  'parent_is'     ,       //  "project" or "category"
    //              'array_storage_value_from'    =>  array(
    //                                      'method'    =>  'post'          ,
    //                                      'instance'  =>  'parent_is'
    //                                      )
    //              )   ,
    //
    //          array(
    //              'slug'          =>  'title'         ,
    //              'array_storage_value_from'    =>  array(
    //                                      'method'    =>  'post'      ,
    //                                      'instance'  =>  'title'
    //                                      )
    //              )   ,
    //
    //          array(
    //              'slug'          =>  'notes_slash_comments'      ,
    //              'array_storage_value_from'    =>  array(
    //                                      'method'    =>  'post'                      ,
    //                                      'instance'  =>  'notes_slash_comments'
    //                                      )
    //              )
    //
    //          ) ;
    //
    //
    // -------------------------------------------------------------------------

    $post_var_names_by_array_storage_slug = array() ;

    // -------------------------------------------------------------------------

    foreach ( $selected_datasets_dmdd['array_storage_record_structure'] as $this_index => $array_storage_field_details ) {

        // =====================================================================
        // checked_defaulted_ok ?
        // =====================================================================

        if ( $this_index === 'checked_defaulted_ok' ) {
            continue ;
        }

        // -----------------------------------------------------------------

        if ( array_key_exists( $array_storage_field_details['slug'] , $post_var_names_by_array_storage_slug ) ) {

            $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Duplicate field slug "{$array_storage_field_details['slug']}" - in dataset's "array_storage_record_structure"
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $msg , $no_error_field_slug ) ;

        }

        // =====================================================================
        // Any "post_var_name" ?
        // =====================================================================

        foreach ( $array_storage_field_details['array_storage_value_from'] as $add_edit => $value_from_details ) {

            // -----------------------------------------------------------------

            if ( $value_from_details['method'] === 'post' ) {

                // -------------------------------------------------------------

                if ( ! array_key_exists( 'instance' , $value_from_details ) ) {

                    $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "array_storage_value_from" + "{$add_edit}" (no "instance")
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                    return array( $msg , $no_error_field_slug ) ;

                }

                // -------------------------------------------------------------

                if (    ! is_string( $value_from_details['instance'] )
                        ||
                        trim( $value_from_details['instance'] ) === ''
                        ||
                        ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_varname( $value_from_details['instance'] )
                        ||
                        strlen( $value_from_details['instance'] ) > 64
                    ) {

                    $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "array_storage_value_from" + "{$add_edit}" + "instance" (1 to 64 character variable name type string expected)
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                    return array( $msg , $no_error_field_slug ) ;

                }

                // -------------------------------------------------------------

                $post_var_names_by_array_storage_slug[ $array_storage_field_details['slug'] ] =
                    $value_from_details['instance']
                    ;

                // -------------------------------------------------------------

                break ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // Repeat with the next field in:-
        //      array_storage_record_structure
        //
        // (if there is one)...
        // =====================================================================

    }

    // =========================================================================
    // GET the "CHECKBOX" and "RADIOS" type ZEBRA FORM FIELDS...
    // =========================================================================

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // These are required because CHECKBOX and RADIO fields behave differently
    // from other form fields.  Eg:-
    //      o   Their name=value is submitted if the checkbox is ticked
    //      o   Their name=value ISN'T submitted if the checkbox is ISN'T
    //          ticked
    // -------------------------------------------------------------------------

    $zebra_form_field_indices_of_checkbox_type_zebra_form_fields = array() ;

    $zebra_form_field_indices_of_radios_type_zebra_form_fields = array() ;

    // -------------------------------------------------------------------------

    foreach ( $zebra_form_definition['field_specs'] as $this_zebra_form_field_index => $this_zebra_form_field_details ) {

        if ( $this_zebra_form_field_details['zebra_control_type'] === 'checkbox' ) {
            $zebra_form_field_indices_of_checkbox_type_zebra_form_fields[] = $this_zebra_form_field_index ;
        }

        if ( $this_zebra_form_field_details['zebra_control_type'] === 'radios' ) {
            $zebra_form_field_indices_of_radios_type_zebra_form_fields[] = $this_zebra_form_field_index ;
        }

    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $zebra_form_field_indices_of_checkbox_type_zebra_form_fields ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $zebra_form_field_indices_of_radios_type_zebra_form_fields ) ;

    // =========================================================================
    // Do the VALIDATA error checking (if there is any)...
    // =========================================================================

    if (    count( $_POST ) > 0
            &&
            array_key_exists( 'validata_record_structure_slug' , $zebra_form_definition )
            &&
            is_string( $zebra_form_definition['validata_record_structure_slug'] )
            &&
            trim( $zebra_form_definition['validata_record_structure_slug'] ) !== ''
        ) {

        // ---------------------------------------------------------------------

        require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/validata/validate-things.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validata\
        // validate_associative_array(
        //      $core_plugapp_dirs                  ,
        //      $record_structure_slug              ,
        //      $associative_array_to_validate      ,
        //      $caller_ns                          ,
        //      $caller_fn                          ,
        //      $caller_ln
        //      )
        // - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      On SUCCESS
        //          TRUE
        //
        //      On FALSE
        //          $error_message STRING
        //
        //          NOTE!   The error message will probably be multi-line.  Use
        //                  nl2br() or display it in PRE tags, if you DON'T want
        //                  the lines to wrap.
        // -------------------------------------------------------------------------

        $record_structure_slug = $zebra_form_definition['validata_record_structure_slug'] ;

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $_POST = Array(
        //          [name_add_edit_ad_swapper_central_manual_registrations] => add_edit_ad_swapper_central_manual_registrations
        //          [zebra_honeypot_add_edit_ad_swapper_central_manual_registrations] =>
        //          [zebra_csrf_token_add_edit_ad_swapper_central_manual_registrations] => e32b27f84bbd0cfa0420679b232e7081
        //          [target_site_url] => qwerwqrerq
        //          [start_year_utc] => qwerqewr
        //          [start_month_utc] => qwerqwe
        //          [start_day_utc] => qwerqwe
        //          [end_year_utc] => qwerrq
        //          [end_month_utc] => wewrq
        //          [end_day_utc] => qwer
        //          [save_me] => Submit
        //          )
        //
        // ---------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_POST , '$_POST' ) ;

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $post_var_names_by_array_storage_slug = Array(
        //          [target_site_url] => target_site_url
        //          [start_year_utc]  => start_year_utc
        //          [start_month_utc] => start_month_utc
        //          [start_day_utc]   => start_day_utc
        //          [end_year_utc]    => end_year_utc
        //          [end_month_utc]   => end_month_utc
        //          [end_day_utc]     => end_day_utc
        //          )
        //
        // ---------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $post_var_names_by_array_storage_slug , '$post_var_names_by_array_storage_slug' ) ;

        // ---------------------------------------------------------------------

        $associative_array_to_validate = $_POST ;

        // ---------------------------------------------------------------------

        foreach ( $associative_array_to_validate as $name => $value ) {

            if ( ! in_array( $name , $post_var_names_by_array_storage_slug , TRUE ) ) {
                unset( $associative_array_to_validate[ $name ] ) ;
            }

        }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $associative_array_to_validate , '$associative_array_to_validate' ) ;

        // ---------------------------------------------------------------------

        $caller_ns = __NAMESPACE__ ;
        $caller_fn = __FUNCTION__  ;
        $caller_ln = __LINE__      ;

        // ---------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validata\validate_associative_array(
                $core_plugapp_dirs                  ,
                $record_structure_slug              ,
                $associative_array_to_validate      ,
                $caller_ns                          ,
                $caller_fn                          ,
                $caller_ln
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return array( '--ZEBRA--' . nl2br( $result ) , '???' ) ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // If we're ADDING a new record, get the NEW RECORD DEFAULT DATA (if the
    // dataset has any)...
    // =========================================================================

    $new_record_default_data = NULL ;

    // -------------------------------------------------------------------------

    if ( $question_adding ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_dataset_specific_default_record_data(
        //      $core_plugapp_dirs                      ,
        //      $all_application_dataset_definitions    ,
        //      $selected_datasets_dmdd                 ,
        //      $dataset_records                        ,
        //      $record_indices_by_key                  ,
        //      $dataset_title                          ,
        //      $question_base64_encode = TRUE
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // If the dataset has a:-
        //      "default_record_functions_namespace_name"
        //
        // then we call the
        //      "get_default_record_data()"
        //
        // function in that namespace, to get the default record data for use when
        // adding a new record.
        //
        // NOTE!
        // =====
        // $question_base64_encode tells this routine whether any base64
        // encoded fields in the returned record should be returned base64
        // encoded or not.
        //
        // RETURN
        //      o   On SUCCESS
        //              ARRAY(
        //                  'data'              =>  $default_record_data ARRAY
        //                  )
        //              --OR--
        //              ARRAY(
        //                  'data'              =>  $default_record_data ARRAY
        //                  'key_field_slug'    =>  "xxx"
        //                  )
        //
        //      o   On FAILURE
        //              ##  FALSE, if the dataset has NO
        //                      "get_default_record_data()"
        //                  functions namespace
        //              --or--
        //              ##  $error_message STRING
        // -------------------------------------------------------------------------

        $question_base64_encode = FALSE ;

        // ---------------------------------------------------------------------

        $result = get_dataset_specific_default_record_data(
                        $core_plugapp_dirs                      ,
                        $all_application_dataset_definitions    ,
                        $selected_datasets_dmdd                 ,
                        $dataset_records                        ,
                        $record_indices_by_key                  ,
                        $dataset_title                          ,
                        $question_base64_encode
                        ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        if ( is_array( $result ) ) {
            $new_record_default_data = $result['data'] ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Support Routines...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/add-edit-record_constraints-handler.php' ) ;

    // =========================================================================
    // ADD/UPDATE the RECORD...
    // =========================================================================

//echo '<h1 style="#AA0000">handle_zebra_form_submission()</h1>' ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_GET , '$_GET' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_POST , '$_POST' ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $adding_editing , '$adding_editing' ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $post_var_names_by_array_storage_slug , '$post_var_names_by_array_storage_slug' ) ;

    if ( $question_adding ) {

        // =====================================================================
        // ADD
        // =====================================================================

        $record_to_add = array() ;

        // =====================================================================
        // Add the new record field's, one by one...
        // =====================================================================

        foreach ( $selected_datasets_dmdd['array_storage_record_structure'] as $this_index => $array_storage_field_details ) {

            // -----------------------------------------------------------------

            if ( $this_index === 'checked_defaulted_ok' ) {
                continue ;
            }

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $array_storage_field_details = array(
            //          'slug'                      =>  'created_server_datetime_UTC'      ,
            //          'array_storage_value_from'  =>  array(
            //                                              'method'    =>  'created-server-datetime-utc'
            //                                              )
            //          )
            //
            //      --OR--
            //
            //      $array_storage_field_details = array(
            //          'slug'                      =>  'parent_key'    ,
            //          'array_storage_value_from'  =>  array(
            //                                              'method'    =>  'post'          ,
            //                                              'instance'  =>  'parent_key'
            //                                              )
            //          )
            //
            // -----------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $array_storage_field_details , '$array_storage_field_details' ) ;

            // =================================================================
            // GET the (ARRAY STORAGE) FIELD VALUE...
            // =================================================================

            // -------------------------------------------------------------------------
            // get_array_storage_field_value(
            //      $dataset_manager_home_page_title                                ,
            //      $caller_apps_includes_dir                                       ,
            //      $all_application_dataset_definitions                            ,
            //      $dataset_slug                                                   ,
            //      $selected_datasets_dmdd                                         ,
            //      $zebra_form_definition                                          ,
            //      $dataset_title                                                  ,
            //      $dataset_records                                                ,
            //      $record_indices_by_key                                          ,
            //      $key_field_slug                                                 ,
            //      $question_adding                                                ,
            //      $adding_editing                                                 ,
            //      $array_storage_field_details                                    ,
            //      $zebra_form_field_indices_of_checkbox_type_zebra_form_fields    ,
            //      $zebra_form_field_indices_of_radios_type_zebra_form_fields      ,
            //      $new_record_default_data
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
            //      o   On SUCCESS!
            //          - - - - - -
            //          array(
            //              $ok = TRUE                      ,
            //              $field_value (any PHP type)     ,
            //              $question_change
            //              )
            //              NOTE!
            //              -----
            //              If $question_change is anything but TRUE, then the array
            //              storage field SHOULDN'T be updated with the returned
            //              $field_value.  For example, if you're editing a record
            //              identified by some unique "key", then that "key" field
            //              should never (usually) be updated.  It's a unique
            //              identifier for the record - assigned when the record is
            //              first created - and remaining unchanged till the record
            //              is destroyed.
            //
            //      o   On FAILURE!
            //          - - - - - -
            //          array(
            //              $ok = FALSE             ,
            //              $error_message STRING
            //              )
            // -------------------------------------------------------------------------

            $result = get_array_storage_field_value(
                            $dataset_manager_home_page_title                                ,
                            $caller_apps_includes_dir                                       ,
                            $all_application_dataset_definitions                            ,
                            $dataset_slug                                                   ,
                            $selected_datasets_dmdd                                         ,
                            $zebra_form_definition                                          ,
                            $dataset_title                                                  ,
                            $dataset_records                                                ,
                            $record_indices_by_key                                          ,
                            $key_field_slug                                                 ,
                            $question_adding                                                ,
                            $adding_editing                                                 ,
                            $array_storage_field_details                                    ,
                            $zebra_form_field_indices_of_checkbox_type_zebra_form_fields    ,
                            $zebra_form_field_indices_of_radios_type_zebra_form_fields      ,
                            $new_record_default_data
                            ) ;

            // -----------------------------------------------------------------

            if ( count( $result ) === 3 ) {
                list( $ok , $field_value , $question_change ) = $result ;

            } else {
                list( $ok , $error_message ) = $result ;

            }

            // -----------------------------------------------------------------

            if ( $ok === FALSE ) {
                return array( $error_message , $array_storage_field_details['slug'] ) ;
            }

            // =================================================================
            // SET/CHANGE the ARRAY STORAGE FIELD's VALUE ?
            // =================================================================

//if ( $question_change ) {
//    echo '<br />Array Storage Field Value:&nbsp; ' , $field_value , ' &nbsp; (CHANGE/SAVE)' ;
//} else {
//    echo '<br />Array Storage Field Value:&nbsp; ' , $field_value , ' &nbsp; (DON\'T CHANGE/SAVE !!!)' ;
//}

            if ( $question_change ) {

                // =============================================================
                // Handle any (ARRAY STORAGE) CONSTRAINTS...
                // =============================================================

                // -------------------------------------------------------------------------
                // handle_array_storage_constraints(
                //      $core_plugapp_dirs                      ,
                //      $caller_apps_includes_dir               ,
                //      $all_application_dataset_definitions    ,
                //      $dataset_slug                           ,
                //      $selected_datasets_dmdd                 ,
                //      $dataset_title                          ,
                //      $dataset_records                        ,
                //      $key_field_slug                         ,
                //      $record_indices_by_key                  ,
                //      $array_storage_field_details            ,
                //      $question_adding                        ,
                //      $new_or_existing_field_value            ,
                //      $record_being_editeds_index
                //      )
                // - - - - - - - - - - - - - - - - - - - - - - -
                // RETURNS
                //      o   On SUCCESS!
                //          - - - - - -
                //          TRUE
                //
                //      o   On FAILURE!
                //          - - - - - -
                //          $error_message STRING
                // -------------------------------------------------------------------------

                $record_being_editeds_index = NULL ;

                // -------------------------------------------------------------

                $result = handle_array_storage_constraints(
                                $core_plugapp_dirs                      ,
                                $caller_apps_includes_dir               ,
                                $all_application_dataset_definitions    ,
                                $dataset_slug                           ,
                                $selected_datasets_dmdd                 ,
                                $dataset_title                          ,
                                $dataset_records                        ,
                                $key_field_slug                         ,
                                $record_indices_by_key                  ,
                                $array_storage_field_details            ,
                                $question_adding                        ,
                                $field_value                            ,
                                $record_being_editeds_index
                                ) ;

                // -------------------------------------------------------------

                if ( is_string( $result ) ) {
                    return array( $result , $array_storage_field_details['slug'] ) ;
                }

                // =============================================================
                // Set the field value...
                // =============================================================

                $record_to_add[ $array_storage_field_details['slug'] ] = $field_value ;

//echo '<br />ADDING: ' , $array_storage_field_details['slug'] , ' --- "' , $field_value , '" --- ' , gettype( $field_value ) ;

                // -------------------------------------------------------------

            }

            // =================================================================
            // Repeat with the next:-
            //      array_storage_record_structure
            //
            // field (if there is one)...
            // =================================================================

        }

        // =====================================================================
        // Append the new record to the dataset...
        // =====================================================================

//      $dataset_records[] = $record_to_add ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $record_to_add , '&lt;record to ADD&gt;' ) ;

        // ---------------------------------------------------------------------

    } else {

        // =====================================================================
        // EDIT
        // =====================================================================

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

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return array( $result , $no_error_field_slug ) ;
        }

        // ---------------------------------------------------------------------

        if ( $result === FALSE ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Caller specific record to be edited not found!
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $msg , $no_error_field_slug ) ;

        }

        // ---------------------------------------------------------------------

        list(
            $replacement_records_key        ,
            $replacement_records_index      ,
            $replacement_record
            ) = $result ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $replacement_record , '&lt;existing record to be edited&gt;' ) ;

        // ---------------------------------------------------------------------

        $replacement_record_before_updates = $replacement_record ;

        // =====================================================================
        // UPDATE THE RECORD'S FIELDS, one by one...
        // =====================================================================

        foreach ( $selected_datasets_dmdd['array_storage_record_structure'] as $this_index => $array_storage_field_details ) {

            // -----------------------------------------------------------------

            if ( $this_index === 'checked_defaulted_ok' ) {
                continue ;
            }

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $array_storage_field_details = array(
            //          'slug'          =>  'created_server_datetime_UTC'      ,
            //          'array_storage_value_from'    =>  array(
            //                                  'method'    =>  'created-server-datetime-utc'
            //                                  )
            //          )
            //
            //      --OR--
            //
            //      $array_storage_field_details = array(
            //          'slug'          =>  'parent_key'    ,
            //          'array_storage_value_from'    =>  array(
            //                                  'method'    =>  'post'          ,
            //                                  'instance'  =>  'parent_key'
            //                                  )
            //          )
            //
            // -----------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $array_storage_field_details , '$array_storage_field_details' ) ;

            // =================================================================
            // GET the FIELD VALUE...
            // =================================================================

            // -------------------------------------------------------------------------
            // get_array_storage_field_value(
            //      $dataset_manager_home_page_title                                ,
            //      $caller_apps_includes_dir                                       ,
            //      $all_application_dataset_definitions                            ,
            //      $dataset_slug                                                   ,
            //      $selected_datasets_dmdd                                         ,
            //      $zebra_form_definition                                          ,
            //      $dataset_title                                                  ,
            //      $dataset_records                                                ,
            //      $record_indices_by_key                                          ,
            //      $key_field_slug                                                 ,
            //      $question_adding                                                ,
            //      $adding_editing                                                 ,
            //      $array_storage_field_details                                    ,
            //      $zebra_form_field_indices_of_checkbox_type_zebra_form_fields    ,
            //      $zebra_form_field_indices_of_radios_type_zebra_form_fields      ,
            //      $new_record_default_data
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - -
            //      o   On SUCCESS!
            //          - - - - - -
            //          array(
            //              $ok = TRUE                      ,
            //              $field_value (any PHP type)     ,
            //              $question_change
            //              )
            //              NOTE!
            //              -----
            //              If $question_change is anything but TRUE, then the array
            //              storage field SHOULDN'T be updated with the returned
            //              $field_value.  For example, if you're editing a record
            //              identified by some unique "key", then that "key" field
            //              should never (usually) be updated.  It's a unique
            //              identifier for the record - assigned when the record is
            //              first created - and remaining unchanged till the record
            //              is destroyed.
            //
            //      o   On FAILURE!
            //          - - - - - -
            //          array(
            //              $ok = FALSE             ,
            //              $error_message STRING
            //              )
            // -------------------------------------------------------------------------

            $result = get_array_storage_field_value(
                            $dataset_manager_home_page_title                                ,
                            $caller_apps_includes_dir                                       ,
                            $all_application_dataset_definitions                            ,
                            $dataset_slug                                                   ,
                            $selected_datasets_dmdd                                         ,
                            $zebra_form_definition                                          ,
                            $dataset_title                                                  ,
                            $dataset_records                                                ,
                            $record_indices_by_key                                          ,
                            $key_field_slug                                                 ,
                            $question_adding                                                ,
                            $adding_editing                                                 ,
                            $array_storage_field_details                                    ,
                            $zebra_form_field_indices_of_checkbox_type_zebra_form_fields    ,
                            $zebra_form_field_indices_of_radios_type_zebra_form_fields      ,
                            $new_record_default_data
                            ) ;

            // -----------------------------------------------------------------

            if ( count( $result ) === 3 ) {
                list( $ok , $field_value , $question_change ) = $result ;

            } else {
                list( $ok , $error_message ) = $result ;

            }

            // -----------------------------------------------------------------

            if ( $ok === FALSE ) {
                return array( $error_message , $array_storage_field_details['slug'] ) ;
            }

            // =================================================================
            // SET/CHANGE the ARRAY STORAGE FIELD's VALUE ?
            // =================================================================

//if ( $question_change ) {
//    echo '<br />Array Storage Field Value:&nbsp; ' , $field_value , ' &nbsp; (CHANGE/SAVE)' ;
//} else {
//    echo '<br />Array Storage Field Value:&nbsp; ' , $field_value , ' &nbsp; (DON\'T CHANGE/SAVE !!!)' ;
//}

            if ( $question_change ) {

                // =============================================================
                // Handle any (ARRAY STORAGE) CONSTRAINTS...
                // =============================================================

                // -------------------------------------------------------------------------
                // handle_array_storage_constraints(
                //      $core_plugapp_dirs                      ,
                //      $caller_apps_includes_dir               ,
                //      $all_application_dataset_definitions    ,
                //      $dataset_slug                           ,
                //      $selected_datasets_dmdd                 ,
                //      $dataset_title                          ,
                //      $dataset_records                        ,
                //      $key_field_slug                         ,
                //      $record_indices_by_key                  ,
                //      $array_storage_field_details            ,
                //      $question_adding                        ,
                //      $new_or_existing_field_value            ,
                //      $record_being_editeds_index
                //      )
                // - - - - - - - - - - - - - - - - - - - - - - -
                // RETURNS
                //      o   On SUCCESS!
                //          - - - - - -
                //          TRUE
                //
                //      o   On FAILURE!
                //          - - - - - -
                //          $error_message STRING
                // -------------------------------------------------------------------------

                $record_being_editeds_index = $replacement_records_index ;

                // -------------------------------------------------------------

                $result = handle_array_storage_constraints(
                                $core_plugapp_dirs                      ,
                                $caller_apps_includes_dir               ,
                                $all_application_dataset_definitions    ,
                                $dataset_slug                           ,
                                $selected_datasets_dmdd                 ,
                                $dataset_title                          ,
                                $dataset_records                        ,
                                $key_field_slug                         ,
                                $record_indices_by_key                  ,
                                $array_storage_field_details            ,
                                $question_adding                        ,
                                $field_value                            ,
                                $record_being_editeds_index
                                ) ;

                // -------------------------------------------------------------

                if ( is_string( $result ) ) {
                    return array( $result , $array_storage_field_details['slug'] ) ;
                }

                // =============================================================
                // Set the field value...
                // =============================================================

                $replacement_record[ $array_storage_field_details['slug'] ] = $field_value ;

//echo '<br />EDITING: ' , $array_storage_field_details['slug'] , ' --- "' , $field_value , '" --- ' , gettype( $field_value ) ;

                // -------------------------------------------------------------

            }

            // =================================================================
            // Repeat with the next:-
            //      array_storage_record_structure
            //
            // field (if there is one)...
            // =================================================================

        }

        // =====================================================================
        // Write the updated record back to the dataset...
        // =====================================================================

//      $dataset_records[ $replacement_records_index ] = $replacement_record ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $replacement_record , '&lt;updated record to SAVE&gt;' ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Support Routines...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/pre-post-add-edit-record-routines.php' ) ;

    // =========================================================================
    // Do the PRE ADD ROUTINE (if one was specified)...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we might have (eg):-
    //
    //      $selected_datasets_dmdd['pre_add_routine'] = array(
    //          'fn'            =>  'xxx'           ,
    //          'extra_args'    =>  array(...)
    //          ) ;
    //
    // -------------------------------------------------------------------------

    if ( $question_adding ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // question_do_pre_add_routine(
        //      $core_plugapp_dirs                          ,
        //      $dataset_manager_home_page_title            ,
        //      $caller_apps_includes_dir                   ,
        //      $all_application_dataset_definitions        ,
        //      $dataset_slug                               ,
        //      $selected_datasets_dmdd                     ,
        //      $dataset_title                              ,
        //      $dataset_records                            ,
        //      $record_indices_by_key                      ,
        //      $key_field_slug                             ,
        //      $question_adding                            ,
        //      $form_slug_underscored                      ,
        //      $record_to_add
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - -
        // Calls the dataset-specific pre add routine, if one was specified.
        //
        // RETURNS
        //      On SUCCESS!
        //          o   ARRAY $stuff_to_pass_to_the_post_add_routine, or;
        //          o   FALSE if $dataset_records ISN'T to be updated on disk
        //              (and the record addition is to be (silently) aborted).
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        $stuff_to_pass_to_the_post_add_routine =
            question_do_pre_add_routine(
                $core_plugapp_dirs                          ,
                $dataset_manager_home_page_title            ,
                $caller_apps_includes_dir                   ,
                $all_application_dataset_definitions        ,
                $dataset_slug                               ,
                $selected_datasets_dmdd                     ,
                $dataset_title                              ,
                $dataset_records                            ,
                $record_indices_by_key                      ,
                $key_field_slug                             ,
                $question_adding                            ,
                $form_slug_underscored                      ,
                $record_to_add
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $stuff_to_pass_to_the_post_add_routine ) ) {
            return array( $stuff_to_pass_to_the_post_add_routine , $no_error_field_slug ) ;
        }

        // ---------------------------------------------------------------------

        if ( $stuff_to_pass_to_the_post_add_routine === FALSE ) {
            return TRUE ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Do the PRE EDIT ROUTINE (if one was specified)...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we might have (eg):-
    //
    //      $selected_datasets_dmdd['pre_edit_routine'] = array(
    //          'fn'            =>  'xxx'           ,
    //          'extra_args'    =>  array()
    //          ) ;
    //
    // -------------------------------------------------------------------------

    if ( ! $question_adding ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // question_do_pre_edit_routine(
        //      $core_plugapp_dirs                          ,
        //      $dataset_manager_home_page_title            ,
        //      $caller_apps_includes_dir                   ,
        //      $all_application_dataset_definitions        ,
        //      $dataset_slug                               ,
        //      $selected_datasets_dmdd                     ,
        //      $dataset_title                              ,
        //      $dataset_records                            ,
        //      $record_indices_by_key                      ,
        //      $key_field_slug                             ,
        //      $question_adding                            ,
        //      $form_slug_underscored                      ,
        //      $replacement_record_before_updates          ,
        //      &$replacement_record_after_updates
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - -
        // Checks and calls the dataset-specific pre add routine, if one was
        // specified.
        //
        // Called after the record to be updated has been successfully created.
        // But not yet:-
        //      o   Updated in $dataset_records, or;
        //      o   Saved to disk.
        //
        // $replacement_record_after_updates is provided by reference - so that
        // this routine can update it (before it's updated in $dataset_records
        // and saved to disk).
        //
        // RETURNS
        //      On SUCCESS!
        //          o   ARRAY $stuff_to_pass_to_the_post_edit_routine, or;
        //          o   FALSE if $dataset_records ISN'T to be updated on disk
        //              (and the record edit/update is to be (silently) aborted).
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        $stuff_to_pass_to_the_post_edit_routine =
            question_do_pre_edit_routine(
                $core_plugapp_dirs                          ,
                $dataset_manager_home_page_title            ,
                $caller_apps_includes_dir                   ,
                $all_application_dataset_definitions        ,
                $dataset_slug                               ,
                $selected_datasets_dmdd                     ,
                $dataset_title                              ,
                $dataset_records                            ,
                $record_indices_by_key                      ,
                $key_field_slug                             ,
                $question_adding                            ,
                $form_slug_underscored                      ,
                $replacement_record_before_updates          ,
                $replacement_record
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $stuff_to_pass_to_the_post_edit_routine ) ) {
            return array( $stuff_to_pass_to_the_post_edit_routine , $no_error_field_slug ) ;
        }

        // ---------------------------------------------------------------------

        if ( $stuff_to_pass_to_the_post_edit_routine === FALSE ) {
            return TRUE ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // UPDATE the DATASET...
    // =========================================================================

    $pre_add_edit_dataset_records = $dataset_records ;

    // -------------------------------------------------------------------------

    if (    array_key_exists( 'storage_method' , $selected_datasets_dmdd )
            &&
            $selected_datasets_dmdd['storage_method'] === 'mysql'
        ) {

        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // STORAGE METHOD = "MYSQL"...
        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

        // =====================================================================
        // Get the record's "array_storage_key_field_slug" (so that we can
        // remove this field)...
        // =====================================================================

        if (    array_key_exists( 'array_storage_key_field_slug' , $selected_datasets_dmdd )
                &&
                is_string( $selected_datasets_dmdd['array_storage_key_field_slug'] )
                &&
                trim( $selected_datasets_dmdd['array_storage_key_field_slug'] ) !== ''
            ) {

            $field_slugs_to_remove = array(
                $selected_datasets_dmdd['array_storage_key_field_slug']
                ) ;

        } else {

            $field_slugs_to_remove = array() ;

        }

        // =====================================================================
        // Get the MySQL table name (for the dataset's MySQL table)...
        // =====================================================================

        require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/basepress-mysql.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\
        // prepend_wordpress_table_name_prefix()
        //      $table_name
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Prepends the WordPress table prefix to the supplied table name, and
        // returns the result.
        //
        // NOTE!
        // =====
        // From:-
        //      http://codex.wordpress.org/Creating_Tables_with_Plugins
        //
        //    "DATABASE TABLE PREFIX
        //    =====================
        //    In the wp-config.php file, a WordPress site owner can define a
        //    database table prefix. By default, the prefix is "wp_", but you'll
        //    need to check on the actual value and use it to define your database
        //    table name. This value is found in the $wpdb->prefix variable. (If
        //    you're developing for a version of WordPress older than 2.0, you'll
        //    need to use the $table_prefix global variable, which is deprecated in
        //    version 2.1)."
        //
        // -------------------------------------------------------------------------

        $mysql_table_name =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\prepend_wordpress_table_name_prefix(
                $dataset_slug
                ) ;

        // =====================================================================
        // ADD or UPDATE the record...
        // =====================================================================

        if ( $question_adding ) {

            // =================================================================
            // ADD...
            // =================================================================

            foreach ( $field_slugs_to_remove as $this_field_slug ) {
                unset( $record_to_add[ $this_field_slug ] ) ;
            }

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\
            // add_record(
            //      $table_name         ,
            //      $raw_record_data
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
            // $raw_record_data should be like:-
            //
            //      $raw_record_data = array(
            //          'field_name_1'  =>  <field_value_1>     ,
            //          ...
            //          'field_name_N'  =>  <field_value_N>
            //          )
            //
            // In other words, $raw_record_data must be an associative ARRAY of
            //      field name  =>  field_value
            //
            // pairs.  Where:-
            //
            // 1.   At least ONE field must be specified.
            //
            // 2.   Field values can be any of the following PHP data types:-
            //          STRING
            //          INT
            //          FLOAT
            //          TRUE    (stored as 1 in the DB)
            //          FALSE   (stored as 0 in the DB)
            //          NULL    (stored as NULL in the DB)
            //
            //      PHP ARRAY and OBJECT type fields AREN'T allowed.
            //
            // 3.   You DON'T have to supply INT and FLOAT values as PHP
            //      INTs or FLOATS.  They can be supplied as PHP STRINGS
            //      (eg; from $_GET and/or $_POST).  And MySQL will
            //      automatically convert them (before storing them).
            //
            //      NOTE!
            //      -----
            //      Every value that "add_record()" supplies to MySQL will
            //      be supplied in STRING format.  So putting (eg):-
            //          $_GET['id']
            //
            //      into $raw_record_data like:-
            //          $raw_record_data['id'] = (int) $_GET['id']
            //
            //      is pointless.  Since "add_record()" will simply do:-
            //          (string) $raw_record_data['id']
            //
            //      to it before supplying it to MySQL.
            //
            // 4.   The field values MUST NOT be SQL escaped.  You MUST supply
            //      the RAW input data (even the raw $_GET and $_POST data
            //      entered by the user).  And "add_record()" will escape it
            //      for you.
            //
            // ---
            //
            // RETURNS either:-
            //      o   The new record's record ID (as PHP INT) on SUCCESS
            //      o   An error message STRING on FAILURE
            // -------------------------------------------------------------------------

            $record_id =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\add_record(
                    $mysql_table_name   ,
                    $record_to_add
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $record_id ) ) {
                return array( $record_id , $no_error_field_slug ) ;
            }

            // -----------------------------------------------------------------

        } else {

            // =================================================================
            // UPDATE...
            // =================================================================

            // =================================================================
            // Check the "record_key" to be updated...
            // =================================================================

            if ( ! array_key_exists( 'record_key' , $_GET ) ) {

                $msg = <<<EOT
PROBLEM:&nbsp; No "record_key"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                return array( $msg , $no_error_field_slug ) ;

            }

            // -----------------------------------------------------------------

            require_once( $core_plugapp_dirs['dataset_manager_includes_dir'] . '/mysql-array-storage-key-field-overrides-support.php' ) ;

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
            // get_check_mysql_array_storage_key_field_overrides(
            //      $caller_apps_includes_dir       ,
            //      $selected_datasets_dmdd         ,
            //      $dataset_title                  ,
            //      $dataset_record_data
            //      )
            // - - - - - - - - - - - - - - - - - - -
            // If $dataset_record_data is STRING
            //      then $key_field_value = $_GET[ $dataset_record_data ]
            // Else (If $dataset_record_data is ARRAY):-
            //      then $key_field_value = $dataset_record_data[ <key_field_slug> ]
            //
            // RETURNS:-
            //      On SUCCESS
            //          NULL means there are NO mysql array storage key field overrides
            //          --OR--
            //          $key_field_details = array(
            //              'slug'                              =>  "xxx"                   ,
            //              'format'                            =>  "yyy"                   ,
            //              'value'                             =>  "zzz"                   ,
            //              'fail_link_creation_silently'       =>  TRUE/FALSE              ,
            //              'url_encode_function_name'          =>  "" | "aaa"              ,
            //              'url_decode_function_name'          =>  "" | "bbb"
            //              )
            //
            //              Where:-
            //
            //              o   $key_field_details['format'] is one of:-
            //                  --  OLD VERSION
            //                      #   "sequential-id"         (default)
            //                      #   "ctype-digit"
            //                      #   "great-kiwi-password"
            //                  --  NEW VERSION
            //                      #   "mysql-bigint-id"       (default)
            //                      #   "sequential-id"
            //                      #   "great-kiwi-password"
            //                      #   "url"
            //                      #   "custom-function"
            //
            //              o   $key_field_details['value'] is the (validated and ok)
            //                  value from the specified dataset record.
            //
            //              o   $key_field_details['fail_link_creation_silently'] means
            //                  that the key field contained NO value - but instead of
            //                  issuing an error, the caller should just NOT create
            //                  the "edit"/"delete" record link.
            //
            //              o   $key_field_details['url_encode_function_name']:-
            //                  --  Can be the empty string (if NO key field url encode
            //                      function is to be used).
            //                  --  If other than the empty string, then the specified
            //                      function exists.
            //
            //              o   $key_field_details['url_decode_function_name']:-
            //                  --  Can be the empty string (if NO key field url decode
            //                      function is to be used).
            //                  --  If other than the empty string, then the specified
            //                      function exists.
            //
            //      On FAILURE
            //          $error_message STRING
            // -------------------------------------------------------------------------

            $key_field_get_var_name = 'record_key' ;

            // -----------------------------------------------------------------

            $key_field_details =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_check_mysql_array_storage_key_field_overrides(
                    $core_plugapp_dirs['plugins_includes_dir']      ,
                    $selected_datasets_dmdd                         ,
                    $dataset_title                                  ,
                    $key_field_get_var_name
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $key_field_details ) ) {
                return array( $key_field_details , $no_error_field_slug ) ;
            }

            // -----------------------------------------------------------------

            if (    $key_field_details === NULL
                    ||
                    $key_field_details['value'] === ''
                ) {

                $msg = <<<EOT
PROBLEM:&nbsp; Bad "record_key"
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                return array( $msg , $no_error_field_slug ) ;

            }

            // -----------------------------------------------------------------

/*
            require_once( $caller_apps_includes_dir . '/sequential-ids-support.php' ) ;

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\
            // question_sequential_id(
            //      $candidate_sid
            //      )
            // - - - - - - - - - - - -
            // Determines whether or not $candidate_sid looks like a sequential ID
            // as generated by (eg):-
            //      get_new_sequential_id()
            //      get_new_sequential_id_thats_unique_in_dataset()
            //
            // or not.  And returns TRUE or FALSE accordingly.
            //
            // In other words, $candidate_sid must be something like (eg):-
            //      "dczv-mwhk"
            //      "9npd-xd2h"
            //      "pxx4-4942-9vwm"
            //      "2n43-3dny-dykm"
            //      etc...
            // -------------------------------------------------------------------------

            if ( \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\question_sequential_id(
                    $_GET['record_key']
                    ) !== TRUE
                ) {

                $msg = <<<EOT
PROBLEM:&nbsp; Bad "record_key"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                return array( $msg , $no_error_field_slug ) ;

            }
*/

            // =================================================================
            // Remove the fields that MySQL doesn't want...
            // =================================================================

            foreach ( $field_slugs_to_remove as $this_field_slug ) {
                unset( $replacement_record[ $this_field_slug ] ) ;
            }

            // =================================================================
            // Get the MySQL "key" field for the record to be updated...
            // =================================================================

//          $mysql_key_field_slug = NULL ;
//
//          // -----------------------------------------------------------------
//
//          if (    array_key_exists( 'mysql_overrides' , $selected_datasets_dmdd )
//                  &&
//                  is_array( $selected_datasets_dmdd['mysql_overrides'] )
//                  &&
//                  array_key_exists( 'array_storage_key_field_slug' , $selected_datasets_dmdd['mysql_overrides'] )
//                  &&
//                  is_string( $selected_datasets_dmdd['mysql_overrides']['array_storage_key_field_slug'] )
//                  &&
//                  trim( $selected_datasets_dmdd['mysql_overrides']['array_storage_key_field_slug'] ) !== ''
//              ) {
//
//              // -----------------------------------------------------------------
//
//              $mysql_key_field_slug =
//                  $selected_datasets_dmdd['mysql_overrides']['array_storage_key_field_slug']
//                  ;
//
//              // -----------------------------------------------------------------
//
//          } else {
//
//              // -----------------------------------------------------------------
//
//              $msg = <<<EOT
//  PROBLEM:&nbsp; Can't find "key" field of record to update
//  Detected in:&nbsp; \\{$ns}\\{$fn}()
//  EOT;
//
//              return array( $msg , $no_error_field_slug ) ;
//
//              // -----------------------------------------------------------------
//
//          }

            // -----------------------------------------------------------------

            $mysql_key_field_slug = $key_field_details['slug'] ;

            // =================================================================
            // Update the record...
            // =================================================================

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\
            // update_exactly_one_record(
            //      $table_name         ,
            //      $raw_record_data    ,
            //      $where
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
            // $raw_record_data should be like:-
            //
            //      $raw_record_data = array(
            //          'field_name_1'  =>  <field_value_1>     ,
            //          ...
            //          'field_name_N'  =>  <field_value_N>
            //          )
            //
            // In other words, $raw_record_data must be an associative ARRAY of
            //      field name  =>  field_value
            //
            // pairs.  Where:-
            //
            // 1.   At least ONE field must be specified.
            //
            // 2.   Field values can be any of the following PHP data types:-
            //          STRING
            //          INT
            //          FLOAT
            //          TRUE    (stored as 1 in the DB)
            //          FALSE   (stored as 0 in the DB)
            //          NULL    (stored as NULL in the DB)
            //
            //      PHP ARRAY and OBJECT type fields aren't allowed (and
            //      will cause an error-message return)
            //
            // 3.   You DON'T have to supply INT and FLOAT values as PHP
            //      INTs or FLOATS.  They can be supplied as PHP STRINGS
            //      (eg; from $_GET and/or $_POST).  And MySQL will
            //      automatically convert them (before storing them).
            //
            //      NOTE!
            //      -----
            //      Every value that "add_record()" supplies to MySQL will
            //      be supplied in STRING format.  So putting (eg):-
            //          $_GET['id']
            //
            //      into $raw_record_data like:-
            //          $raw_record_data['id'] = (int) $_GET['id']
            //
            //      is pointless.  Since "add_record()" will simply do:-
            //          (string) $raw_record_data['id']
            //
            //      to it before supplying it to MySQL.
            //
            // 4.   The field values MUST NOT be SQL escaped.  You MUST supply
            //      the RAW input data (even the raw $_GET and $_POST data
            //      entered by the user).  And "add_record()" will escape it
            //      for you.
            //
            // NOTE!
            // =====
            // $raw_record_data DOESN'T have to include ALL the fields in the record.
            // Only those whoose value you want to update (= set/change).
            //
            // ---
            //
            // $where is like (eg):-
            //
            //      $where = array(
            //                  'this'  =>  "xxx"
            //                  'that'  =>  Y
            //                  )
            //
            // Multiple where conditions are joined by AND.
            //
            // ---
            //
            // RETURNS either:-
            //      o   TRUE on SUCCESS
            //      o   An error message STRING on FAILURE
            // -------------------------------------------------------------------------

            $where = array(
                        $mysql_key_field_slug   =>  $_GET['record_key']
                        ) ;

            // -----------------------------------------------------------------

            $result =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\update_exactly_one_record(
                    $mysql_table_name       ,
                    $replacement_record     ,
                    $where
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return array( $result , $no_error_field_slug ) ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    } else {

        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // STORAGE METHOD = "ARRAY-STORAGE"...
        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

        if ( $question_adding ) {

            // -----------------------------------------------------------------
            // Append the new record to the dataset...
            // -----------------------------------------------------------------

            $dataset_records[] = $record_to_add ;

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------
            // Replace the original record in the dataset (with the updated
            // record)...
            // -----------------------------------------------------------------

            $dataset_records[ $replacement_records_index ] = $replacement_record ;

            // -----------------------------------------------------------------

        }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $replacement_record , '&lt;updated record to SAVE&gt;' ) ;

        // =====================================================================
        // SAVE the updated DATASET RECORDS...
        // =====================================================================

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\save_numerically_indexed(
        //      $dataset_name                       ,
        //      $array_to_save                      ,
        //      $question_die_on_error = FALSE
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - -
        // Saves the specified numerically-indexed PHP array.
        //
        // RETURNS
        //      o   On SUCCESS
        //          - - - - -
        //          TRUE
        //
        //      o   On FAILURE
        //          - - - - -
        //          $error message STRING
        // -------------------------------------------------------------------------

        $question_die_on_error = FALSE ;

        // ---------------------------------------------------------------------

        $result = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\save_numerically_indexed(
                        $selected_datasets_dmdd['dataset_slug']     ,
                        $dataset_records                            ,
                        $question_die_on_error
                        ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return array( $result , $no_error_field_slug ) ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Do the POST ADD ROUTINE (if one was specified)...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we might have (eg):-
    //
    //      $selected_datasets_dmdd['post_add_routine'] = array(
    //          'fn'            =>  'xxx'           ,
    //          'extra_args'    =>  array(...)
    //          ) ;
    //
    // -------------------------------------------------------------------------

    if ( $question_adding ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // question_do_post_add_routine()
        //      $core_plugapp_dirs                          ,
        //      $dataset_manager_home_page_title            ,
        //      $caller_apps_includes_dir                   ,
        //      $all_application_dataset_definitions        ,
        //      $dataset_slug                               ,
        //      $selected_datasets_dmdd                     ,
        //      $dataset_title                              ,
        //      $dataset_records                            ,
        //      $record_indices_by_key                      ,
        //      $key_field_slug                             ,
        //      $question_adding                            ,
        //      $form_slug_underscored                      ,
        //      $pre_add_edit_dataset_records               ,
        //      $record_added                               ,
        //      $stuff_passed_from_the_pre_add_routine
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - -
        // Called after:-
        //      o   $record_to_add = $record_added has been successfully created,
        //          and;
        //      o   Added to $dataset_records.
        //      o   And the updated $dataset_records has been successfully saved
        //          to disk.
        //
        // NOTES!
        // ======
        // 1.   $record_indices_by_key HASN'T been updated (with the new record
        //      that's been added to $dataset_records).
        //
        // RETURNS
        //      On SUCCESS!
        //          TRUE
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        $result =
            question_do_post_add_routine(
                $core_plugapp_dirs                          ,
                $dataset_manager_home_page_title            ,
                $caller_apps_includes_dir                   ,
                $all_application_dataset_definitions        ,
                $dataset_slug                               ,
                $selected_datasets_dmdd                     ,
                $dataset_title                              ,
                $dataset_records                            ,
                $record_indices_by_key                      ,
                $key_field_slug                             ,
                $question_adding                            ,
                $form_slug_underscored                      ,
                $pre_add_edit_dataset_records               ,
                $record_to_add                              ,
                $stuff_to_pass_to_the_post_add_routine
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return array( $result , $no_error_field_slug ) ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Do the POST EDIT ROUTINE (if one was specified)...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we might have (eg):-
    //
    //      $selected_datasets_dmdd['post_edit_routine'] = array(
    //          'fn'            =>  'xxx'           ,
    //          'extra_args'    =>  array()
    //          ) ;
    //
    // -------------------------------------------------------------------------

    if ( ! $question_adding ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // question_do_post_edit_routine(
        //      $core_plugapp_dirs                          ,
        //      $dataset_manager_home_page_title            ,
        //      $caller_apps_includes_dir                   ,
        //      $all_application_dataset_definitions        ,
        //      $dataset_slug                               ,
        //      $selected_datasets_dmdd                     ,
        //      $dataset_title                              ,
        //      $dataset_records                            ,
        //      $record_indices_by_key                      ,
        //      $key_field_slug                             ,
        //      $question_adding                            ,
        //      $form_slug_underscored                      ,
        //      $pre_add_edit_dataset_records               ,
        //      $replacement_record_before_updates          ,
        //      $replacement_record_after_updates           ,
        //      $stuff_passed_from_the_pre_edit_routine
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - -
        // Called after:-
        //      o   The $replacement_record has been successfully created, and;
        //      o   Updated in $dataset_records.
        //      o   And the updated $dataset_records has been successfully saved
        //          to disk.
        //
        // RETURNS
        //      On SUCCESS!
        //          TRUE
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        $result =
            question_do_post_edit_routine(
                $core_plugapp_dirs                          ,
                $dataset_manager_home_page_title            ,
                $caller_apps_includes_dir                   ,
                $all_application_dataset_definitions        ,
                $dataset_slug                               ,
                $selected_datasets_dmdd                     ,
                $dataset_title                              ,
                $dataset_records                            ,
                $record_indices_by_key                      ,
                $key_field_slug                             ,
                $question_adding                            ,
                $form_slug_underscored                      ,
                $pre_add_edit_dataset_records               ,
                $replacement_record_before_updates          ,
                $replacement_record                         ,
                $stuff_to_pass_to_the_post_edit_routine
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return array( $result , $no_error_field_slug ) ;
        }

        // ---------------------------------------------------------------------

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
// That's that!
// =============================================================================

