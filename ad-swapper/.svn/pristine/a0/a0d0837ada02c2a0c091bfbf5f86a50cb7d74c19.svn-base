<?php

// *****************************************************************************
// DATASET-MANAGER / ADD-EDIT-RECORD_CREATE-ZEBRA-FORM.PHP
// (C) 2013 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// Support routines...
// =============================================================================

    require_once( dirname( __FILE__ ) . '/add-edit-record_create-zebra-form_get-field-value.php' ) ;

    require_once( dirname( __FILE__ ) . '/add-edit-record_create-zebra-form_add-field-obj.php' ) ;

// =============================================================================
// create_zebra_form_object_instance()
// =============================================================================

function create_zebra_form_object_instance(
    $home_page_title                                                ,
    $caller_apps_includes_dir                                       ,
    $all_application_dataset_definitions                            ,
    $dataset_slug                                                   ,
    $question_front_end                                             ,
    $display_options    = array()                                   ,
    $submission_options = array()                                   ,
    $selected_datasets_dmdd                                         ,
    $dataset_title                                                  ,
    $dataset_records                                                ,
    $record_indices_by_key                                          ,
    $question_adding                                                ,
    $adding_editing                                                 ,
    $form_slug_underscored                                          ,
    $key_field_slug                                                 ,
    $pre_check_base64_encoded_array_storage_field_indices_by_slug
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // create_zebra_form_object_instance(
    //      $home_page_title                                                ,
    //      $caller_apps_includes_dir                                       ,
    //      $all_application_dataset_definitions                            ,
    //      $dataset_slug                                                   ,
    //      $question_front_end                                             ,
    //      $display_options    = array()                                   ,
    //      $submission_options = array()                                   ,
    //      $selected_datasets_dmdd                                         ,
    //      $dataset_title                                                  ,
    //      $dataset_records                                                ,
    //      $record_indices_by_key                                          ,
    //      $question_adding                                                ,
    //      $adding_editing                                                 ,
    //      $form_slug_underscored                                          ,
    //      $key_field_slug                                                 ,
    //      $pre_check_base64_encoded_array_storage_field_indices_by_slug
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Creates the form as a Zebra Form Object - which can later be turned
    // into HTML with the Zebra Form "render()" method.
    //
    // ---
    //
    // This routine adds the fields specified in the dataset's
    //      <dataset_def>['zebra_forms'][ <form_slug_underscored> ]['field_specs']
    //
    // variable, to the form.
    //
    // ---
    //
    // Note that the main routine for getting the field's value (to be
    // displayed in the form), is:-
    //      get_field_value_for_zebra_form()
    //
    // from file:  add-edit-record_create-zebra-form_get_field_value.php
    //
    // ---
    //
    // RETURNS
    //      o   On SUCCESS!
    //              array(
    //                  $zebra_form (= reference to Zebra Form object instance)
    //                  $selected_datasets_dmdd_updated
    //                  )
    //
    //      o   On FAILURE
    //              $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // create_zebra_form_object_instance()
    // -----------------------------------
    //
    //      =======================================
    //      PROCESSING OVERVIEW (USING PSEUDO CODE)
    //      =======================================
    //
    //      //  1.  Instantiate the form...
    //
    //              $zebra_form = new \Zebra_Form(
    //
    //      //  2.  Get the dataset record to be displayed/edited in the
    //      //      form...
    //
    //              if ( <adding a new record> ) {
    //
    //                  $the_record_to_be_displayed/edited_in_the form
    //                      = NULL ;
    //
    //              } elseif ( <editing an existing record> ) {
    //
    //                  $the_record_to_be_displayed/edited_in_the form
    //                      = get_record_to_be_edited(...)
    //
    //              }
    //
    //      //  3.  Loop over the Zebra Form field definitions (in the dataset
    //      //      definition) - adding each field in turn to the form...
    //
    //              foreach ( <zebra-form-field-in-the-dataset-definition ) {
    //
    //                  //  3.1     Skip any fields whoose Zebra Form field
    //                  //          definition has a
    //                  //              "question_show_me_function_name"
    //                  //          specified. And that function, when called,
    //                  //          returns FALSE
    //
    //                  //  3.2     Get the field's value to go in the form
    //                  //          being created.
    //
    //                  $field_value = get_field_value_for_zebra_form(...)
    //
    //                  //  3.3     Add the field to the form object...
    //
    //                  add_field_to_zebra_form_object_instance(...)
    //
    //                  //  3.4     Repeat with the next field (if there is
    //                  //          one)...
    //
    //              }
    //
    //      //  4.  Return the completed Form object...
    //
    //              return $zebra_form ;
    //
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $selected_datasets_dmdd = Array(
    //
    //          [dataset_slug]              => categories
    //          [dataset_name_singular]     => category
    //          [dataset_name_plural]       => categories
    //          [dataset_title_singular]    => Category
    //          [dataset_title_plural]      => Categories
    //          [basepress_dataset_handle]  => Array(
    //              [nice_name]     => researchAssistant_byFernTec_categories
    //              [unique_key]    => 6934fccc-c552-46b0-8db5-87a022f7c...af7adf54
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
    //                              [data_field_slug]   => project_title
    //                              [value_from]        => Array(
    //                                  [method]    => foreign-field
    //                                  [instance]  => title
    //                                  [args]      => Array(
    //                                                      [parent_key] => projects
    //                                                      )
    //                                  )
    //                              )
    //
    //                  [1] => Array(
    //                              [data_field_slug]   => title
    //                              [value_from]        => Array(
    //                                  [method]    => array-storage-field-slug
    //                                  [instance]  => title
    //                                  )
    //                      )
    //
    //                  [2] => Array(
    //                          [data_field_slug]       =>
    //                          [value_from]            => Array(
    //                              [method]    => special-type
    //                              [instance]  => action
    //                              )
    //                          )
    //
    //                  )
    //
    //              [rows_per_page]                         => 10
    //              [default_data_field_slug_to_orderby]    => title
    //              [default_order]                         => asc
    //              [actions]                               => Array(
    //                                                              [edit]      => edit
    //                                                              [delete]    => delete
    //                                                              )
    //              [action_separator]                      =>
    //
    //              )
    //
    //          [zebra_form] => Array(
    //
    //              [form_specs] => Array(
    //                  [name]                  => add_edit_category
    //                  [method]                => POST
    //                  [action]                =>
    //                  [attributes]            => Array(
    //                      [target] => _parent
    //                      )
    //                  [clientside_validation] => 1
    //                  )
    //
    //              [field_specs] => Array(
    //
    //                  [0] => Array(
    //                              [form_field_name]       => parent_key
    //                              [zebra_control_type]    => select
    //                              [label]                 => Project
    //                              [value_from]            => Array(
    //                                  [add] => Array(
    //                                      [method]    => literal
    //                                      [args]      =>
    //                                      )
    //
    //                                  [edit] => Array(
    //                                      [method]    => array-storage-field-slug
    //                                      [args]      => parent_key
    //                                      )
    //                                  )
    //                              [attributes] => Array()
    //                              [rules] => Array(
    //                                  [required] => Array(
    //                                      [0] => error
    //                                      [1] => Field is required
    //                                      )
    //                                  )
    //                              [type_specific_args] => Array(
    //                                  [options_getter_function] => Array(
    //                                      [function_name] => \researchAssistant_byFernTec_datasetManagerDatasetDefs_categories\get_options_for_project_selector
    //                                      [extra_args] =>
    //                                      )
    //                                  )
    //                              [constraints] => Array(
    //                                  [0] => Array(
    //                                              [method] => unique-key
    //                                              )
    //                                  )
    //                              )
    //
    //                  ...
    //
    //                  [5] => Array(
    //                              [form_field_name]       => cancel
    //                              [zebra_control_type]    => button
    //                              [label]                 => Cancel
    //                              [attributes]            => Array(
    //                                  [onclick] => window.parent.location.href="http://localhost/plugdev/wp-admin//admin.php?page=researchAssistant&action=manage-dataset&dataset_slug=categories"
    //                                  )
    //                              [rules]                 => Array()
    //                              [type_specific_args]    => Array(
    //                                  [caption]   => Cancel
    //                                  [type]      => button
    //                                  )
    //                              [constraints] => Array()
    //                              )
    //
    //                  )
    //
    //              [focus_field_slug] => 1
    //
    //              [checked_defaulted_ok] => 1
    //
    //              )
    //
    //          [array_storage_record_structure] => Array(
    //
    //              [0] => Array(
    //                          [slug]       => created_server_datetime_UTC
    //                          [value_from] => Array(
    //                              [method] => created-server-datetime-utc
    //                              )
    //                          )
    //
    //              ...
    //
    //              [6] => Array(
    //                          [slug]       => notes_slash_comments
    //                          [value_from] => Array(
    //                              [method] => post
    //                              [instance] => notes_slash_comments
    //                              )
    //                          )
    //
    //              [checked_defaulted_ok] => 1
    //
    //              )
    //
    //          [array_storage_key_field_slug] => key
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_basepressLogger\pr( $selected_datasets_dmdd ) ;

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__ ;

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
    // LOAD Zebra Forms...
    // =========================================================================

    require_once( $caller_apps_includes_dir . '/Zebra_Form-master/Zebra_Form.php' ) ;

    // =========================================================================
    // Zebra-Form field types and their parameters:-
    //
    //      button
    //          id
    //          caption
    //          attributes
    //          type = 'button'
    //
    //      captcha
    //          id
    //          attach_to
    //          $storage = 'cookie'
    //
    //      checkbox
    //          id
    //          value
    //          attributes
    //
    //      date
    //          id
    //          default
    //          attributes
    //
    //      file
    //          id
    //          attributes
    //
    //      hidden
    //          id
    //          default
    //
    //      image
    //          id
    //          src
    //          attributes
    //
    //      label
    //          id
    //          attach_to
    //          caption
    //          attributes
    //
    //      note
    //          id
    //          attach_to
    //          caption
    //          attributes
    //
    //      password
    //          id
    //          default
    //          attributes
    //
    //      radio
    //          id
    //          value
    //          attributes
    //
    //      reset
    //          id
    //          caption
    //          attributes
    //
    //      select
    //          id
    //          default
    //          attributes
    //          default_other
    //
    //      submit
    //          id
    //          caption
    //          attributes
    //
    //      text
    //          id
    //          default
    //          attributes
    //
    //      textarea
    //          id
    //          default
    //          attributes
    //
    //      time
    //          id
    //          default
    //          attributes
    //
    // =========================================================================

    // =========================================================================
    // Zebra-Form "Rules"
    // ------------------
    // See "set_rule()" method in the Zebra-Form docs for descriptions of the
    // individual rules...
    //
    //      alphabet
    //      alphanumeric
    //      captcha
    //      compare
    //      convert
    //      custom
    //      date
    //      datecompare
    //      dependencies
    //      digits
    //      email
    //      emails
    //      filesize
    //      filetype
    //      float
    //      image
    //      length
    //      number
    //      regexp
    //      required
    //      resize
    //      upload
    //      url
    //
    // =========================================================================

    // =========================================================================
    // Get the ARRAY STORAGE FIELD SLUGS...
    // =========================================================================

    $array_storage_field_slugs = array() ;

    foreach ( $selected_datasets_dmdd['array_storage_record_structure'] as $this_field ) {

        //  TODO Error Checking ???

        $array_storage_field_slugs[] = $this_field['slug'] ;

    }

    // =========================================================================
    // Make the FORM...
    // =========================================================================

    // -------------------------------------------------------------------------
    // void __construct ( string $name , [ string $method = 'POST'] , [ string $action = ''] , [ array $attributes = ''] )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Initializes the form.
    //
    //      $form = new Zebra_Form('myform');
    //
    // PARAMETERS
    //
    //      string  $name
    //                  Name of the form
    //
    //      string  $method
    //                  (Optional) Specifies which HTTP method will be used to
    //                  submit the form data set.
    //
    //                  Possible (case-insensitive) values are POST and GET
    //
    //                  Default is POST
    //
    //      string  $action
    //                  (Optional) An URI to where to submit the form data set.
    //
    //                  If left empty, the form will submit to itself.
    //
    //                  You should *always* submit the form to itself, or
    //                  server-side validation will not take place and you will
    //                  have a great security risk. Submit the form to itself,
    //                  let it do the server-side validation, and then redirect
    //                  accordingly!
    //
    //      array   $attributes
    //                  (Optional) An array of attributes valid for a <form> tag
    //                  (i.e. style)
    //
    //                  Note that the following attributes are automatically set
    //                  when the control is created and should not be altered
    //                  manually:
    //
    //                      action, method, enctype, name
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // $selected_datasets_dmdd['zebra_form']['form_specs'] = Array(
    //      [name]                  => add_edit_project
    //      [method]                => POST
    //      [action]                =>
    //      [attributes]            => Array()
    //      [clientside_validation] => 1
    //      )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Instantiate the form...
    // -------------------------------------------------------------------------

    $form_specs = $selected_datasets_dmdd['zebra_forms'][ $form_slug_underscored ]['form_specs'] ;

    // -------------------------------------------------------------------------

    $zebra_form = new \Zebra_Form(
                    $form_specs['name']             ,
                    $form_specs['method']           ,
                    $form_specs['action']           ,
                    $form_specs['attributes']
                    ) ;

    // =========================================================================
    // Get the stuff required by:-
    //      get_field_value_for_zebra_form()
    // =========================================================================

    $zebra_form_definition =
        $selected_datasets_dmdd['zebra_forms'][ $form_slug_underscored ]
        ;

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

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // The above are required because CHECKBOX and RADIO fields behave
    // differently from other form fields.  Eg:-
    //      o   Their name=value is submitted if the checkbox is ticked
    //      o   Their name=value ISN'T submitted if the checkbox is ISN'T
    //          ticked
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $zebra_form_field_indices_of_checkbox_type_zebra_form_fields ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $zebra_form_field_indices_of_radios_type_zebra_form_fields ) ;

    // =========================================================================
    // Get the stuff required by:-
    //  <my_custom_get_attribute_value_function>()
    // =========================================================================

    $array_storage_field_indices_to_base64_encode_pre_check =
        array_values(
            $pre_check_base64_encoded_array_storage_field_indices_by_slug
            ) ;

//  \greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//      $pre_check_base64_encoded_array_storage_field_indices_by_slug
//      ) ;

    // =========================================================================
    // GET the RECORD TO BE EDITED (if necessary)...
    //
    // NOTE!
    // =====
    // When EDITING a record, we NEED the record to be EDITED - so that we know
    // what the existing field values are (to be displayed in the form).
    //
    // But when ADDING a record, we DON'T need to know this (because there are
    // NO existing field values).
    // =========================================================================

    if ( $question_adding ) {

        // =====================================================================
        // ADDING
        // =====================================================================

        $the_record        = NULL ;
        $the_records_index = NULL ;

        // ---------------------------------------------------------------------

    } else {

        // =====================================================================
        // EDITING
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

        $result =
            get_existing_record_to_be_edited(
                $selected_datasets_dmdd     ,
                $dataset_records            ,
                $record_indices_by_key      ,
                $dataset_title
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        if ( $result === FALSE ) {

            $the_record        = NULL ;
            $the_records_index = NULL ;
                // In other words:-
                //      o   The dataset supports CALLER SPECIFIC RECORDS,
                //          AND;
                //      o   NO record for the current caller was found.
                //
                // So in fact, we're ADDING a new caller specific record.

        } else {

            list(
                $the_records_key        ,
                $the_records_index      ,
                $the_record
                ) = $result ;

        }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $the_record ) ;

        // =====================================================================
        // Do any BASE 64 DECODING required...
        // =====================================================================

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $selected_datasets_dmdd ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $the_record ) ;

        foreach ( $selected_datasets_dmdd['array_storage_record_structure'] as $field_index => $field_data ) {

            // -----------------------------------------------------------------

            if ( ! is_array( $field_data ) ) {
                continue ;
                    //  Skip the:-
                    //      "checked_defaulted_ok"
                    //  field.
            }

            // -----------------------------------------------------------------

            if ( in_array( $field_index , $array_storage_field_indices_to_base64_encode_pre_check , TRUE ) ) {

                // -------------------------------------------------------------

                if ( ! array_key_exists( $field_data['slug'] , $the_record ) ) {

                    $field_number = $field_index + 1 ;

                    $safe_field_slug = htmlentities( $field_data['slug'] ) ;

                    return <<<EOT
PROBLEM base64 decoding field value:&nbsp; No field# {$field_number} ("{$safe_field_slug}") in record to be edited
Dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // -------------------------------------------------------------

                $the_record[ $field_data['slug'] ] = base64_decode( $the_record[ $field_data['slug'] ] ) ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

//pr( $the_record ) ;

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
    // ADD the ZEBRA FORM FIELDS (to the form definition)...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $selected_datasets_dmdd['zebra_forms'][ $form_slug_underscored ]['field_specs'] = array(
    //
    //          array(
    //              'form_field_name'       =>  'category_key'              ,
    //              'zebra_control_type'    =>  'select'                    ,
    //              'label'                 =>  'Project &amp; Category'    ,
    //              'value_from'            =>  NULL                        ,
    //              'attributes'            =>  array()                     ,
    //              'rules'                 =>  array(
    //                  'required'  =>  array(
    //                                      'error'             ,   // variable to add the error message to
    //                                      'Field is required'     // error message if value doesn't validate
    //                                      )
    //                  )   ,
    //              'type_specific_args'    =>  array(
    //                  'options_getter_function'   =>  array(
    //                      'function_name' =>  '\\researchAssistant_byFernTec_datasetManagerDatasetDefs_reference_urls\\get_options_for_project_selector'  ,
    //                      'extra_args'    =>  NULL
    //                      )
    //                  )
    //              )   ,
    //
    //          array(
    //              'form_field_name'       =>  'title'     ,
    //              'zebra_control_type'    =>  'text'      ,
    //              'label'                 =>  'Title'     ,
    //              'default_value'         =>  NULL        ,
    //              'attributes'            =>  array()     ,
    //              'rules'                 =>  array(
    //                  'required'  =>  array(
    //                                      'error'             ,   // variable to add the error message to
    //                                      'Field is required'     // error message if value doesn't validate
    //                                      )
    //                  )
    //              )   ,
    //
    //          array(
    //              'form_field_name'       =>  'notes_slash_comments'      ,
    //              'zebra_control_type'    =>  'textarea'                  ,
    //              'label'                 =>  'Project Notes/Comments'    ,
    //              'default_value'         =>  NULL                        ,
    //              'attributes'            =>  array()                     ,
    //              'rules'                 =>  array()
    //              )   ,
    //
    //          array(
    //              'form_field_name'       =>  'save_me'                   ,
    //              'zebra_control_type'    =>  'submit'                    ,
    //              'label'                 =>  NULL                        ,
    //              'default_value'         =>  NULL                        ,
    //              'attributes'            =>  array()                     ,
    //              'rules'                 =>  array()
    //              'type_specific_args'    =>  array(
    //                  'caption'       =>  'Submit'
    //                  )
    //              )   ,
    //
    //          array(
    //              'form_field_name'           =>  'cancel'                    ,
    //              'zebra_control_type'        =>  'button'                    ,
    //              'label'                     =>  NULL                        ,
    //              'default_value'             =>  NULL                        ,
    //              'attributes'                =>  array(
    //                                                  'onclick'   =>  'location.href="' . $cancel_href . '"'
    //                                                  )   ,
    //              'rules'                     =>  array()                     ,
    //              'type_specific_args'        =>  array(
    //                  'caption'       =>  '<span style="position:relative; top:-6px">Cancel</span>'    ,
    //                  'type'          =>  'button'
    //                  )
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

    foreach ( $selected_datasets_dmdd['zebra_forms'][ $form_slug_underscored ]['field_specs'] as $zebra_form_field_index => $zebra_form_field_details ) {

        // ---------------------------------------------------------------------

        $zebra_form_field_number = $zebra_form_field_index + 1 ;

        $field_title = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_title( $zebra_form_field_details['form_field_name'] ) ;

        // =====================================================================
        // Field ERROR CHECKING and DEFAULTS...
        // =====================================================================

        //  See:  check-and-default-zebra-form-definition.php

        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // ADD this field ?
        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $zebra_form_field_details = Array(
        //          [form_field_name]       => email
        //          [zebra_control_type]    => text
        //          [label]                 => Email
        //          [attributes]            => Array()
        //          [rules]                 => Array(
        //              [required] => Array(
        //                  [0] => error
        //                  [1] => Field is required
        //                  )
        //              )
        //          [display_options]       => Array(
        //              [question_show_me_function_name] => \greatKiwi_byFernTec_basepressUsers_v0x1_datasetDef_users\question_show_email
        //              )
        //          [value_from] => Array(
        //              [add] => Array(
        //                  [method]    => literal
        //                  [args]      =>
        //                  )
        //              [edit] => Array(
        //                  [method]    => array-storage-field-slug
        //                  [args]      => email
        //                  )
        //              )
        //          [type_specific_args]    => Array()
        //          [constraints]           => Array()
        //          )
        //
        // ---------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $zebra_form_field_details ) ;

        // ---------------------------------------------------------------------

        if (    array_key_exists( 'display_options' , $zebra_form_field_details )
                &&
                is_array( $zebra_form_field_details['display_options'] )
                &&
                array_key_exists( 'question_show_me_function_name' , $zebra_form_field_details['display_options'] )
                &&
                is_string( $zebra_form_field_details['display_options']['question_show_me_function_name'] )
                &&
                trim( $zebra_form_field_details['display_options']['question_show_me_function_name'] ) !== ''
                &&
                strlen( $zebra_form_field_details['display_options']['question_show_me_function_name'] ) <= 512
                &&
                function_exists( $zebra_form_field_details['display_options']['question_show_me_function_name'] )
            ) {

            // -------------------------------------------------------------------------
            // my_custom_question_show_me_function(
            //      $home_page_title                        ,
            //      $caller_apps_includes_dir               ,
            //      $all_application_dataset_definitions    ,
            //      $dataset_slug                           ,
            //      $question_front_end                     ,
            //      $display_options                        ,
            //      $submission_options                     ,
            //      $selected_datasets_dmdd                 ,
            //      $dataset_title                          ,
            //      $dataset_records                        ,
            //      $record_indices_by_key                  ,
            //      $question_adding                        ,
            //      $zebra_form_field_index                 ,
            //      $zebra_form_field_number                ,
            //      $zebra_form_field_details
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - -
            // RETURNS
            //      o   On SUCCESS!
            //          - - - - - -
            //          TRUE or FALSE
            //
            //      o   On FAILURE!
            //          - - - - - -
            //          $error_message STRING
            // -------------------------------------------------------------------------

            $result = $zebra_form_field_details['display_options']['question_show_me_function_name'](
                            $home_page_title                        ,
                            $caller_apps_includes_dir               ,
                            $all_application_dataset_definitions    ,
                            $dataset_slug                           ,
                            $question_front_end                     ,
                            $display_options                        ,
                            $submission_options                     ,
                            $selected_datasets_dmdd                 ,
                            $dataset_title                          ,
                            $dataset_records                        ,
                            $record_indices_by_key                  ,
                            $question_adding                        ,
                            $zebra_form_field_index                 ,
                            $zebra_form_field_number                ,
                            $zebra_form_field_details
                            ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

            if ( $result !== TRUE ) {
                continue ;
                    //  Skip this field
            }

            // -----------------------------------------------------------------

        }

        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // ADD the FIELD (to the FORM definition...
        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

        // =====================================================================
        // Create the standard:-
        //      $field_args
        //
        // (with the values used by most Zebra Form field types).
        //
        // NOTE!
        // -----
        // We'll add to or replace the standard values with the Zebra Form
        // field type specific values - as required - below...
        // =====================================================================

        $zebra_form_add_field_args = array() ;

        // ---------------------------------------------------------------------
        // id
        // ---------------------------------------------------------------------

        $zebra_form_add_field_args['id'] = $zebra_form_field_details['form_field_name'] ;

        // ---------------------------------------------------------------------
        // default
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // NOTE!
        // =====
        // Zebra Form controls with NO default value are (eg):-
        //      o   submit
        //      o   button
        // ---------------------------------------------------------------------

        if ( ! in_array(
                    $zebra_form_field_details['zebra_control_type']     ,
                    get_zebra_controls_with_no_default_value()          ,
                    TRUE
                    )
            ) {

            // ----------------------------------------------------------------
            // Get the form field's:-
            //      $array_storage_field_details
            // ----------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $selected_datasets_dmdd['array_storage_record_structure'] ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $zebra_form_field_details ) ;

            $array_storage_field_details = NULL ;

            // ----------------------------------------------------------------

            foreach ( $selected_datasets_dmdd['array_storage_record_structure'] as $this_index => $candidate_array_storage_field_details ) {

                if ( $this_index === 'checked_defaulted_ok' ) {
                    continue ;
                }

                if (    array_key_exists( 'slug' , $candidate_array_storage_field_details )
                        &&
                        is_string( $candidate_array_storage_field_details['slug'] )
                        &&
                        trim( $candidate_array_storage_field_details['slug'] ) !== ''
                        &&
                        $candidate_array_storage_field_details['slug'] === $zebra_form_field_details['form_field_name']
                    ) {

                    $array_storage_field_details = $candidate_array_storage_field_details ;

                    break ;

                }

            }

            // ----------------------------------------------------------------

/*
            if ( ! is_array( $array_storage_field_details ) ) {

                return <<<EOT
PROBLEM: Can't find "array_storage_field_details"
For dataset:&nbsp; "{$dataset_title}"
and Zebra Form field:&nbsp; {$field_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }
*/

// DEADED 6 NOV 2014

            // -------------------------------------------------------------------------
            // get_field_value_for_zebra_form(
            //      $home_page_title                                                ,
            //      $caller_apps_includes_dir                                       ,
            //      $all_application_dataset_definitions                            ,
            //      $dataset_slug                                                   ,
            //      $selected_datasets_dmdd                                         ,
            //      $dataset_title                                                  ,
            //      $dataset_records                                                ,
            //      $record_indices_by_key                                          ,
            //      $question_adding                                                ,
            //      $zebra_form_field_number                                        ,
            //      $zebra_form_field_details                                       ,
            //      $the_record                                                     ,
            //      $the_records_index                                              ,
            //      $array_storage_field_slugs                                      ,
            //      $zebra_form_definition                                          ,
            //      $key_field_slug                                                 ,
            //      $adding_editing                                                 ,
            //      $array_storage_field_details                                    ,
            //      $zebra_form_field_indices_of_checkbox_type_zebra_form_fields    ,
            //      $zebra_form_field_indices_of_radios_type_zebra_form_fields      ,
            //      $new_record_default_data
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - -
            // RETURNS
            //      o   On SUCCESS!
            //          - - - - - -
            //          array(
            //              $ok = TRUE                      ,
            //              $field_value <any PHP type>
            //              )
            //
            //      o   On FAILURE!
            //          - - - - - -
            //          array(
            //              $ok = FALSE             ,
            //              $error_message STRING
            //              )
            // -------------------------------------------------------------------------

            $result = get_field_value_for_zebra_form(
                            $home_page_title                                                ,
                            $caller_apps_includes_dir                                       ,
                            $all_application_dataset_definitions                            ,
                            $dataset_slug                                                   ,
                            $selected_datasets_dmdd                                         ,
                            $dataset_title                                                  ,
                            $dataset_records                                                ,
                            $record_indices_by_key                                          ,
                            $question_adding                                                ,
                            $zebra_form_field_number                                        ,
                            $zebra_form_field_details                                       ,
                            $the_record                                                     ,
                            $the_records_index                                              ,
                            $array_storage_field_slugs                                      ,
                            $zebra_form_definition                                          ,
                            $key_field_slug                                                 ,
                            $adding_editing                                                 ,
                            $array_storage_field_details                                    ,
                            $zebra_form_field_indices_of_checkbox_type_zebra_form_fields    ,
                            $zebra_form_field_indices_of_radios_type_zebra_form_fields      ,
                            $new_record_default_data
                            ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $result ) ;

            // -----------------------------------------------------------------

            list( $ok , $field_value ) = $result ;

            // -----------------------------------------------------------------

            if ( $ok !== TRUE ) {
                return $field_value ;
            }

//echo '<h2 style="color:#AA0000">Field Value for Form:&nbsp; ' , $field_value , '</h2>' ;

            // -----------------------------------------------------------------

            $zebra_form_add_field_args['default'] = $field_value ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // atttributes
        // ---------------------------------------------------------------------

        if ( array_key_exists( 'attributes' , $zebra_form_field_details ) ) {
            $zebra_form_add_field_args['attributes'] = $zebra_form_field_details['attributes'] ;

        } else {
            $zebra_form_add_field_args['attributes'] = array() ;

        }

        // ---------------------------------------------------------------------
        // dynamic_atttributes
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $zebra_form_field_details['dynamic_attributes'] = array(
        //          'onclick'       =>  array(
        //              'function_name'     =>  $get_cancel_button_onclick_attribute_value_function_name    ,
        //              'extra_args'        =>  NULL
        //              )
        //          )
        //
        // ---------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $zebra_form_field_details ) ;

        if ( array_key_exists( 'dynamic_attributes' , $zebra_form_field_details ) ) {

            // -----------------------------------------------------------------

            if ( ! is_array( $zebra_form_field_details['dynamic_attributes'] ) ) {

                return <<<EOT
PROBLEM: Bad Zebra Form field "dynamic_attributes" (array expected)
For dataset:&nbsp; "{$dataset_title}"
and Zebra Form field:&nbsp; {$field_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            $attribute_number = 1 ;

            // -----------------------------------------------------------------

            foreach ( $zebra_form_field_details['dynamic_attributes'] as $attribute_name => $attribute_details ) {

//          get_attribute_value_function_name ) {

                // -------------------------------------------------------------

                if (    ! is_string( $attribute_name )
                        ||
                        trim( $attribute_name ) === ''
                    ) {

                    return <<<EOT
PROBLEM: Bad Zebra Form field "dynamic_attributes" + attribute# {$attribute_number} + &lt;attribute_name&gt;" (non-blank string expected)
For dataset:&nbsp; "{$dataset_title}"
and Zebra Form field:&nbsp; {$field_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // -------------------------------------------------------------

                $safe_attribute_name = htmlentities( $attribute_name ) ;

                // -------------------------------------------------------------

                if ( ! is_array( $attribute_details ) ) {

                    return <<<EOT
PROBLEM: Bad Zebra Form field "dynamic_attributes" + attribute# {$attribute_number} ("{$safe_attribute_name}") (array expected)
For dataset:&nbsp; "{$dataset_title}"
and Zebra Form field:&nbsp; {$field_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // -------------------------------------------------------------

                if ( ! array_key_exists( 'function_name' , $attribute_details ) ) {

                    return <<<EOT
PROBLEM: Bad Zebra Form field "dynamic_attributes" + attribute# {$attribute_number} ("{$safe_attribute_name}" - no "function_name")
For dataset:&nbsp; "{$dataset_title}"
and Zebra Form field:&nbsp; {$field_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // -------------------------------------------------------------

                if (    ! is_string( $attribute_details['function_name'] )
                        ||
                        trim( $attribute_details['function_name'] ) === ''
                    ) {

                    return <<<EOT
PROBLEM: Bad Zebra Form field "dynamic_attributes" + attribute# {$attribute_number} ("{$safe_attribute_name}") + "function_name" (non-blank string expected)
For dataset:&nbsp; "{$dataset_title}"
and Zebra Form field:&nbsp; {$field_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // -------------------------------------------------------------

                if ( ! function_exists( $attribute_details['function_name'] ) ) {

                    return <<<EOT
PROBLEM: Bad Zebra Form field "dynamic_attributes" + attribute# {$attribute_number} ("{$safe_attribute_name}") + "function_name" (no such function)
For dataset:&nbsp; "{$dataset_title}"
and Zebra Form field:&nbsp; {$field_title}
and attribute:&nbsp; {$safe_attribute_name}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // -------------------------------------------------------------

                if ( array_key_exists( 'extra_args' , $attribute_details ) ) {
                    $extra_args = $attribute_details['extra_args'] ;

                } else {
                    $extra_args = NULL ;

                }

                // -------------------------------------------------------------------------
                // <my_custom_get_attribute_value_function>(
                //      $home_page_title                                            ,
                //      $caller_apps_includes_dir                                   ,
                //      $all_application_dataset_definitions                        ,
                //      $dataset_slug                                               ,
                //      $question_front_end                                         ,
                //      $display_options                                            ,
                //      $submission_options                                         ,
                //      $selected_datasets_dmdd                                     ,
                //      $dataset_title                                              ,
                //      $dataset_records                                            ,
                //      $record_indices_by_key                                      ,
                //      $question_adding                                            ,
                //      $form_slug_underscored                                      ,
                //      $array_storage_field_indices_to_base64_encode_pre_check     ,
                //      $zebra_form_field_number                                    ,
                //      $zebra_form_field_details                                   ,
                //      $the_record                                                 ,
                //      $the_records_index                                          ,
                //      $array_storage_field_slugs                                  ,
                //      $extra_args
                //      )
                // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                // RETURNS
                //      o   On SUCCESS!
                //              $attribute_value STRING
                //
                //      o   On FAILURE!
                //              ARRAY( $error_message STRING )
                // -------------------------------------------------------------------------

                $result = $attribute_details['function_name'](
                                $home_page_title                                            ,
                                $caller_apps_includes_dir                                   ,
                                $all_application_dataset_definitions                        ,
                                $dataset_slug                                               ,
                                $question_front_end                                         ,
                                $display_options                                            ,
                                $submission_options                                         ,
                                $selected_datasets_dmdd                                     ,
                                $dataset_title                                              ,
                                $dataset_records                                            ,
                                $record_indices_by_key                                      ,
                                $question_adding                                            ,
                                $form_slug_underscored                                      ,
                                $array_storage_field_indices_to_base64_encode_pre_check     ,
                                $zebra_form_field_number                                    ,
                                $zebra_form_field_details                                   ,
                                $the_record                                                 ,
                                $the_records_index                                          ,
                                $array_storage_field_slugs                                  ,
                                $extra_args
                                ) ;

                // -------------------------------------------------------------

                if ( is_array( $result ) ) {
                    return $result[0] ;
                }

                // -------------------------------------------------------------

                $zebra_form_add_field_args['attributes'][ $attribute_name ] =
                    $result
                    ;

                // -------------------------------------------------------------

                $attribute_number++ ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $zebra_form_add_field_args ) ;

        // ---------------------------------------------------------------------
        // onfocus / onblur
        // ---------------------------------------------------------------------

        $onfocus = <<<EOT
greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager_addEditRecord_zebraForm_onfocus(this)
EOT;

        // ---------------------------------------------------------------------

        if ( isset( $zebra_form_add_field_args['attributes']['onfocus'] ) ) {
            $zebra_form_add_field_args['attributes']['onfocus'] += ';' + $onfocus ;

        } else {
            $zebra_form_add_field_args['attributes']['onfocus'] = $onfocus ;

        }

        // ---------------------------------------------------------------------

        $onblur = <<<EOT
greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager_addEditRecord_zebraForm_onblur(this)
EOT;

        // ---------------------------------------------------------------------

        if ( isset( $zebra_form_add_field_args['attributes']['onblur'] ) ) {
            $zebra_form_add_field_args['attributes']['onblur'] += ';' + $onblur ;

        } else {
            $zebra_form_add_field_args['attributes']['onblur'] = $onblur ;

        }

        // ---------------------------------------------------------------------

//\greatKiwi_basepressLogger\pr( $zebra_form_add_field_args ) ;

        // =====================================================================
        // Create the standard:-
        //      $zebra_form_field_label_args
        //
        // (with the values used by most Zebra Form field types).
        //
        // NOTE!
        // -----
        // We'll add to or replace the standard values with the Zebra Form
        // field type specific values - as required - below...
        // =====================================================================

        // -------------------------------------------------------------------------
        // void __construct ( string $id , string $attach_to , mixed $caption , [ array $attributes = ''] )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Add an <LABEL> control to the form.
        //
        // Do not instantiate this class directly! Use the add() method instead!
        //
        // PARAMETERS
        //
        //      string  $id
        //          Unique name to identify the control in the form.
        //
        //          This is the name of the variable to be used in the template
        //          file, containing the generated HTML for the control.  Eg; in a
        //          template file, in order to print the generated HTML for a
        //          control named "my_label", one would use:
        //
        //              echo $my_label;
        //
        //      string  $attach_to
        //          The id attribute of the control to attach the note to.
        //
        //          Notice that this must be the "id" attribute of the control you
        //          are attaching the label to, and not the "name" attribute!
        //
        //          This is important as while most of the controls have their id
        //          attribute set to the same value as their name attribute, for
        //          checkboxes, selects and radio buttons this is different.
        //
        //          Exception to the rule:
        //
        //              o   Just like in the case of notes, if you want a master
        //                  label, a label that is attached to a group of
        //                  checkboxes/radio buttons rather than individual
        //                  controls, this attribute must instead refer to the name
        //                  of the controls (which, for groups of checkboxes/radio
        //                  buttons, is one and the same). This is important because
        //                  if the group of checkboxes/radio buttons have the
        //                  required rule set, this is the only way in which the
        //                  "required" symbol (the red asterisk) will be attached to
        //                  the master label instead of being attached to the first
        //                  checkbox/radio button from the group.
        //
        //      mixed   $caption
        //          Caption of the label.
        //
        //          Putting a $ (dollar) sign before a character will turn that
        //          specific character into the accesskey. If you need the dollar
        //          sign in the label, escape it with \ (backslash)
        //
        //      array   $attributes
        //          (Optional) An array of attributes valid for label elements
        //          (style, etc)
        //
        //          Must be specified as an associative array, in the form of
        //          attribute => value.
        //
        //          SPECIAL ATTRIBUTE:
        //
        //          When setting the special attribute inside to true, the label
        //          will appear inside the control is attached to (if the control
        //          the label is attached to is a textbox or a textarea) and will
        //          disappear when the control will receive focus. When the "inside"
        //          attribute is set to TRUE, the label will not be available in the
        //          template file as it will be contained by the control the label
        //          is attached to!
        //
        //              $form->add('label', 'my_label', 'my_control', 'My Label:', array('inside' => true));
        //
        //          Sometimes, when using floats, the inside-labels will not be
        //          correctly positioned as jQuery will return invalid numbers for
        //          the parent element's position; If this is the case, make sure
        //          you enclose the form in a div with position:relative to fix this
        //          issue.
        //
        //          See set_attributes() on how to set attributes, other than
        //          through the constructor.
        //
        //          The following attributes are automatically set when the control
        //          is created and should not be altered manually:
        //
        //              id, for
        // -------------------------------------------------------------------------

        $zebra_form_field_label_args = array(
            'id'            =>  'label_for_' . $zebra_form_field_details['form_field_name']     ,
            'attach_to'     =>  $zebra_form_add_field_args['id']                                ,
            'caption'       =>  $zebra_form_field_details['label']                              ,
            'attributes'    =>  array()
            ) ;

        // =====================================================================
        // Create the:-
        //      $zebra_form_field_note_args
        //
        // (if necessary)...
        // =====================================================================

        // -------------------------------------------------------------------------
        // void __construct ( string $id , string $attach_to , string $caption , [ array $attributes = ''] )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Adds a "note" to the form, attached to a control.
        //
        // Do not instantiate this class directly! Use the add() method instead!
        //
        //      string  $id
        //          Unique name to identify the control in the form.
        //
        //          This is the name of the variable to be used in the template
        //          file, containing the generated HTML for the control.
        //
        //          // in a template file, in order to print the generated HTML
        //          // for a control named "my_note", one would use:
        //          echo $my_note;
        //
        //      string  $attach_to
        //          The id attribute of the control to attach the note to.
        //
        //          Notice that this must be the "id" attribute of the control you
        //          are attaching the label to, and not the "name" attribute!
        //
        //          This is important as while most of the controls have their id
        //          attribute set to the same value as their name attribute, for
        //          checkboxes, selects and radio buttons this is different.
        //
        //          Exception to the rule:
        //
        //              Just like in the case of labels, if you want a master note,
        //              a note that is attached to a group of checkboxes/radio
        //              buttons rather than individual controls, this attribute must
        //              instead refer to the name of the controls (which, for groups
        //              of checkboxes/radio buttons, is one and the same).
        //
        //      string  $caption
        //          Content of the note (can be both plain text and/or HTML)
        //
        //      array   $attributes
        //          (Optional) An array of attributes valid for div elements (style,
        //          etc)
        //
        //          Must be specified as an associative array, in the form of
        //          attribute => value.
        //
        //              // setting the "style" attribute
        //              $obj = $form->add(
        //                  'note',
        //                  'note_my_text',
        //                  'my_text',
        //                  array(
        //                      'style' => 'width:250px'
        //                  )
        //              );
        //
        //          See set_attributes() on how to set attributes, other than
        //          through the constructor.
        //
        //          The following attributes are automatically set when the control
        //          is created and should not be altered manually:
        //              class
        // -------------------------------------------------------------------------

//      unset( $zebra_form_field_note_args ) ;

        $zebra_form_field_note_args = NULL ;

        // ---------------------------------------------------------------------

        if (    array_key_exists( 'help_text' , $zebra_form_field_details )
                &&
                $zebra_form_field_details['help_text'] !== NULL
                &&
                $zebra_form_field_details['help_text'] !== FALSE
            ) {

            // -----------------------------------------------------------------

            if ( is_string( $zebra_form_field_details['help_text'] ) ) {

                // -------------------------------------------------------------

                $help_text = trim( $zebra_form_field_details['help_text'] ) ;

                // -------------------------------------------------------------

            } elseif ( is_array( $zebra_form_field_details['help_text'] ) ) {

                // -------------------------------------------------------------
                // Here we should (eg):-
                //
                //      $zebra_form_field_details['help_text'] = array(
                //          'function'      =>  "<some-function-name-including-namespace>"
                //          'extra_args'    =>  <any-PHP-type>
                //          )
                //
                // -------------------------------------------------------------

                if ( ! array_key_exists( 'function' , $zebra_form_field_details['help_text'] ) ) {

                    return <<<EOT
PROBLEM: Bad "help_text" (no "function")
For dataset:&nbsp; "{$dataset_title}"
and Zebra Form field:&nbsp; {$field_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // -------------------------------------------------------------

                if (    ! is_string( $zebra_form_field_details['help_text']['function'] )
                        ||
                        trim( $zebra_form_field_details['help_text']['function'] ) === ''
                    ) {

                    return <<<EOT
PROBLEM: Bad "help_text" + "function" (non-empty string expected)
For dataset:&nbsp; "{$dataset_title}"
and Zebra Form field:&nbsp; {$field_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // -------------------------------------------------------------

                if ( ! function_exists( $zebra_form_field_details['help_text']['function'] ) ) {

                    return <<<EOT
PROBLEM: Bad "help_text" + "function" (no such function)
For dataset:&nbsp; "{$dataset_title}"
and Zebra Form field:&nbsp; {$field_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // -------------------------------------------------------------

                if ( array_key_exists( 'extra_args' , $zebra_form_field_details['help_text'] ) ) {
                    $extra_args = $zebra_form_field_details['help_text']['extra_args'] ;

                } else {
                    $extra_args = array() ;

                }

                // -------------------------------------------------------------

                $help_text =
                    $zebra_form_field_details['help_text']['function'](
                        $core_plugapp_dirs                      ,
                        $all_application_dataset_definitions    ,
                        $question_front_end                     ,
                        $dataset_slug                           ,
                        $selected_datasets_dmdd                 ,
                        $dataset_title                          ,
                        $dataset_records                        ,
                        $record_indices_by_key                  ,
                        $form_slug_underscored                  ,
                        $question_adding                        ,
                        $zebra_form_field_number                ,
                        $zebra_form_field_details               ,
                        $the_record                             ,
                        $the_records_index                      ,
                        $extra_args
                        ) ;

                // -------------------------------------------------------------

                if ( is_array( $help_text ) ) {
                    return $help_text[0] ;
                }

                // -------------------------------------------------------------

            } else {

                return <<<EOT
PROBLEM: Bad "help_text" (NULL, FALSE, string or array expected)
For dataset:&nbsp; "{$dataset_title}"
and Zebra Form field:&nbsp; {$field_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            if ( $help_text !== '' ) {

                $caption = <<<EOT
<div style="margin-bottom:0.35em; font-size:120%; color:#333333; line-height:120%">{$help_text}</div>
EOT;

                $zebra_form_field_note_args = array(
                    'id'            =>  'note_for_' . $zebra_form_field_details['form_field_name']      ,
                    'attach_to'     =>  $zebra_form_add_field_args['id']                                ,
                    'caption'       =>  $caption                                                        ,
                    'attributes'    =>  array()
                    ) ;

            }

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // ADD the FIELD proper (overridding any of the default Zebra Form
        // field properties, as required)...
        // =====================================================================

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // add_field_to_zebra_form_object_instance(
        //      $home_page_title                        ,
        //      $caller_apps_includes_dir               ,
        //      $all_application_dataset_definitions    ,
        //      $dataset_slug                           ,
        //      $selected_datasets_dmdd                 ,
        //      $dataset_title                          ,
        //      $dataset_records                        ,
        //      $record_indices_by_key                  ,
        //      $question_adding                        ,
        //      $the_record                             ,
        //      $the_records_index                      ,
        //      $array_storage_field_slugs              ,
        //      &$zebra_form                            ,
        //      $field_title                            ,
        //      $zebra_form_field_number                ,
        //      $zebra_form_field_details               ,
        //      $zebra_form_field_label_args            ,
        //      $zebra_form_field_note_args             ,
        //      $zebra_form_add_field_args
        //      )
        // - - - - - - - - - - - - - - - - - - - -
        // Adds the specified field to the $zebra_form object.
        //
        // RETURNS:-
        //      o   On SUCCESS
        //              TRUE
        //
        //      o   On FAILURE
        //              $error_message STRING
        // -------------------------------------------------------------------------

        $result =
            add_field_to_zebra_form_object_instance(
                $home_page_title                        ,
                $caller_apps_includes_dir               ,
                $all_application_dataset_definitions    ,
                $dataset_slug                           ,
                $selected_datasets_dmdd                 ,
                $dataset_title                          ,
                $dataset_records                        ,
                $record_indices_by_key                  ,
                $question_adding                        ,
                $the_record                             ,
                $the_records_index                      ,
                $array_storage_field_slugs              ,
                $zebra_form                             ,
                $field_title                            ,
                $zebra_form_field_number                ,
                $zebra_form_field_details               ,
                $zebra_form_field_label_args            ,
                $zebra_form_field_note_args             ,
                $zebra_form_add_field_args
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // =====================================================================
        // Repeat with the NEXT FIELD (if there is one)...
        // =====================================================================

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return array(
                $zebra_form                 ,
                $selected_datasets_dmdd
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

