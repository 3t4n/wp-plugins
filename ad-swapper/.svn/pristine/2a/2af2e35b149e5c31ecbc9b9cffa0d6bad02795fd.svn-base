<?php

// *****************************************************************************
// DATASET-MANAGER / ADD-RECORD-PROGRAMATICALLY.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// add_record_programatically()
// =============================================================================

function add_record_programatically(
    $dataset_manager_home_page_title        ,
    $caller_apps_includes_dir               ,
    $all_application_dataset_definitions    ,
    $dataset_slug                           ,
    $selected_datasets_dmdd                 ,
    $dataset_title                          ,
    $dataset_records                        ,
    $record_indices_by_key                  ,
    $key_field_slug                         ,
    $form_slug_underscored                  ,
    $record_to_add
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // add_record_programatically(
    //      $dataset_manager_home_page_title        ,
    //      $caller_apps_includes_dir               ,
    //      $all_application_dataset_definitions    ,
    //      $dataset_slug                           ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_title                          ,
    //      $dataset_records                        ,
    //      $record_indices_by_key                  ,
    //      $key_field_slug                         ,
    //      $form_slug_underscored                  ,
    //      $record_to_add
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Adds a record to the specified dataset at any random time (when this
    // function is called).
    //
    // As opposed to the normal method of adding a record; which is to
    // display the Zebra Form for an empty record - and then add the record
    // once that form has been successfully submitted.
    //
    // NOTES!
    // ======
    // 1.   $record_to_add need NOT contain all the fields from the dataset.
    //      It generally just contains the main data fields:-
    //          o   name
    //          o   age
    //          o   title
    //          o   description
    //          o   etc, etc
    //
    //      but not the hidden and background fields like (eg):-
    //          o   created_datetime_utc
    //          o   last_modified_datetime_utc
    //          o   key
    //          o   etc, etc
    //
    //      The missing fields (if any), will be filled in from the:-
    //          "array_storage_value_from"
    //
    //      variables in the dataset's array storage record definition.
    //
    // 2.   This routine should however be similar to (and updated with,)
    //      the normal record adding routine (that runs when a new record
    //      is submitted - and is found in):-
    //          Function:  handle_zebra_form_submission()
    //          File....:  add-edit-record_submission-handler.php
    //
    // ---
    //
    // RETURNS
    //      o   On SUCCESS
    //              ARRAY(
    //                  $updated_record_to_add              ,
    //                  $updated_dataset_records            ,
    //                  $updated_record_indices_by_key
    //                  )
    //
    //      o   On FAILURE
    //              $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init...
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

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
    // $zebra_form_definition
    // =========================================================================

    $zebra_form_definition = $selected_datasets_dmdd['zebra_forms'][ $form_slug_underscored ] ;

    // =========================================================================
    // $question_adding
    // =========================================================================

    $question_adding = TRUE ;

    // =========================================================================
    // $adding_editing
    // =========================================================================

//  if ( $question_adding ) {
        $adding_editing = 'Adding' ;

//  } else {
//      $adding_editing = 'Editing' ;
//
//  }

    // =========================================================================
    // $zebra_form_field_indices_of_checkbox_type_zebra_form_fields
    // $zebra_form_field_indices_of_radios_type_zebra_form_fields
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
    // Get the NEW RECORDS DEFAULT DATA (if the dataset has any)...
    // =========================================================================

    $new_record_default_data = NULL ;

    // -------------------------------------------------------------------------

//  if ( $question_adding ) {

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

//  }

    // =========================================================================
    // Create the (initially empty) output record...
    // =========================================================================

    $output_record = array() ;

    // =========================================================================
    // Walk over the ARRAY STORAGE fields - adding them to the output record...
    // =========================================================================

    foreach ( $selected_datasets_dmdd['array_storage_record_structure'] as $this_index => $array_storage_field_details ) {

        // ---------------------------------------------------------------------
        // Skip the "checked_defaulted_ok" entry...
        // ---------------------------------------------------------------------

        if ( $this_index === 'checked_defaulted_ok' ) {
            continue ;
        }

        // ---------------------------------------------------------------------
        // If the current array storage field IS in the:-
        //      $record_to_add
        //
        // then add it to the output record as is...
        // ---------------------------------------------------------------------

        if ( array_key_exists( $array_storage_field_details['slug'] , $record_to_add ) ) {

            $output_record[ $array_storage_field_details['slug'] ] =
                $record_to_add[ $array_storage_field_details['slug'] ]
                ;

            continue ;

        }

        // ---------------------------------------------------------------------
        // If the current array storage field ISN'T in the:-
        //      $record_to_add
        //
        // then get it from the array storage field's:-
        //      "array_storage_value_from"
        //
        // variable (as per normal)...
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
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
        // ---------------------------------------------------------------------

        // =====================================================================
        // GET the (ARRAY STORAGE) FIELD VALUE...
        // =====================================================================

        require_once( $caller_apps_includes_dir . '/dataset-manager/add-edit-record_submission-handler-support.php' ) ;

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

        // ---------------------------------------------------------------------

        if ( count( $result ) === 3 ) {
            list( $ok , $field_value , $question_change ) = $result ;

        } else {
            list( $ok , $error_message ) = $result ;

        }

        // ---------------------------------------------------------------------

        if ( $ok === FALSE ) {
            return $error_message ;
        }

        // =====================================================================
        // SET/CHANGE the ARRAY STORAGE FIELD's VALUE ?
        // =====================================================================

        if ( $question_change ) {

            // =================================================================
            // Handle any (ARRAY STORAGE) CONSTRAINTS...
            // =================================================================

            require_once( $caller_apps_includes_dir . '/dataset-manager/add-edit-record_constraints-handler.php' ) ;

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
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
            //
            //          NOTE!
            //          =====
            //          If the error message string begins with "--ZEBRA--", then it's
            //          assumed to be a "friendly" error message - that should be
            //          displayed at the top of the (re-displayed) Zebra Form.
            // -------------------------------------------------------------------------

            $record_being_editeds_index = NULL ;

            // -----------------------------------------------------------------

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

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // =================================================================
            // Set the field value...
            // =================================================================

            $output_record[ $array_storage_field_details['slug'] ] = $field_value ;

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // Repeat with the next:-
        //      array_storage_record_structure
        //
        // field (if there is one)...
        // =====================================================================

    }

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

    require_once( dirname( __FILE__ ) . '/pre-post-add-edit-record-routines.php' ) ;

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
            $output_record
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $stuff_to_pass_to_the_post_add_routine ) ) {
        return array( $stuff_to_pass_to_the_post_add_routine , $no_error_field_slug ) ;
    }

    // -------------------------------------------------------------------------

    if ( $stuff_to_pass_to_the_post_add_routine === FALSE ) {
        return TRUE ;
    }

    // =========================================================================
    // Append the new record to the dataset...
    // =========================================================================

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $output_record ) ;

    $pre_add_edit_dataset_records = $dataset_records ;

    $dataset_records[] = $output_record ;

    // =========================================================================
    // SAVE the updated DATASET RECORDS...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\
    // save_numerically_indexed(
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

    // -------------------------------------------------------------------------

    $result = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\save_numerically_indexed(
                    $selected_datasets_dmdd['dataset_slug']     ,
                    $dataset_records                            ,
                    $question_die_on_error
                    ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
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
            $output_record                              ,
            $stuff_to_pass_to_the_post_add_routine
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return array( $result , $no_error_field_slug ) ;
    }

    // =========================================================================
    // Update $record_indices_by_key...
    // =========================================================================

    $last_index = count( $dataset_records ) - 1 ;

    // -------------------------------------------------------------------------

    $record_indices_by_key[
        $dataset_records[ $last_index ][ $key_field_slug ]
        ] = $last_index ;

    // =========================================================================
    // SUCCESS
    // =========================================================================

    return array(
                $output_record          ,
                $dataset_records        ,
                $record_indices_by_key
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

