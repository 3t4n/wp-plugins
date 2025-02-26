<?php

// *****************************************************************************
// DATASET-MANAGER / ADD-EDIT-RECORD-GET-RECORD-TO-BE-EDITED.PHP
// (C) 2013 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// get_existing_record_to_be_edited()
// =============================================================================

function get_existing_record_to_be_edited(
    $selected_datasets_dmdd     ,
    $dataset_records            ,
    $record_indices_by_key      ,
    $dataset_title
    ) {

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

    $question_create = FALSE ;

    // -------------------------------------------------------------------------

    return get_record_to_be_edited(
                $selected_datasets_dmdd     ,
                $dataset_records            ,
                $record_indices_by_key      ,
                $dataset_title              ,
                $question_create
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_or_create_record_to_be_edited()
// =============================================================================

function get_or_create_record_to_be_edited(
    $selected_datasets_dmdd     ,
    $dataset_records            ,
    $record_indices_by_key      ,
    $dataset_title
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_or_create_record_to_be_edited(
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
    //          Where the returned record might be a NEW record (that
    //          this routine's caller can add to the dataset, if it
    //          needs/wants to).
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
    //              $record_to_be_edited_key   STRING       ,
    //              $record_to_be_edited_index INT / NULL   ,
    //              $record_to_be_edited       ARRAY
    //              )
    //
    //          Where if:-
    //              $record_to_be_edited_index = NULL
    //
    //          it means that this record should be added as a NEW record
    //          to the dataset (because, for example, this is a NEW caller,
    //          who doesn't have a record in the dataset yet).
    //
    //          In this case, we should also have:-
    //              $record_to_be_edited_key = '' (empty string)
    //
    //          And a new unique record key should be generated.
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $question_create = TRUE ;

    // -------------------------------------------------------------------------

    return get_record_to_be_edited(
                $selected_datasets_dmdd     ,
                $dataset_records            ,
                $record_indices_by_key      ,
                $dataset_title              ,
                $question_create
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_record_to_be_edited()
// =============================================================================

function get_record_to_be_edited(
    $selected_datasets_dmdd     ,
    $dataset_records            ,
    $record_indices_by_key      ,
    $dataset_title              ,
    $question_create
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_record_to_be_edited(
    //      $selected_datasets_dmdd     ,
    //      $dataset_records            ,
    //      $record_indices_by_key      ,
    //      $dataset_title              ,
    //      $question_create
    //      )
    // - - - - - - - - - - - - - - - - -
    // Returns the record to be edited.  More specifically:-
    //
    //      o   If the dataset supports CALLER SPECIFIC records, returns
    //          the record returned by the dataset specific:-
    //              "get_caller_specific_record()"
    //          routine.
    //
    //      o   If the dataset DOESN'T support CALLER SPECIFIC records,
    //          returns the record specified by:-
    //                  $_GET['record_key']
    //
    // NOTE!    If the dataset supports CALLER SPECIFIC RECORDS - AND
    //          $question_create === TRUE - then the record returned
    //          ***might*** be a NEW record (that has to be ADDED to
    //          the dataset).
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
    //              $record_to_be_edited_key   STRING       ,
    //              $record_to_be_edited_index INT / NULL   ,
    //              $record_to_be_edited       ARRAY
    //              )
    //
    //          Where if:-
    //              $record_to_be_edited_index = NULL
    //
    //          o   If the dataset's "storage_method" is "mysql":-
    //
    //                  This is OK (MySQL stored records have NO index)
    //
    //                  And $record_to_be_edited_key should be a
    //                  NON-EMPTY sytring.
    //
    //          o   Otherwise (if the dataset's "storage_method" is
    //              "array-storage"):-
    //
    //                  It means that this record should be added as a NEW
    //                  record to the dataset (because, for example, this is a
    //                  NEW caller, who doesn't have a record in the dataset
    //                  yet).
    //
    //                  In this case, we should also have:-
    //                      $record_to_be_edited_key = '' (empty string)
    //
    //                  And a new unique record key should be generated.
    //
    //      o   On FAILURE!
    //          - - - - - -
    //              ##  FALSE if:-
    //                  --  The dataset supports CALLER SPECIFIC RECORDS,
    //                      AND;
    //                  --  NO record for the current caller was found,
    //                      AND;
    //                  --  $question_create !== TRUE
    //          --or--
    //              ##  $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Init...
    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__ ;

    // =========================================================================
    // CALLER SPECIFIC RECORD MODE ?
    // =========================================================================

    if (    array_key_exists( 'question_caller_specific_record_mode' , $selected_datasets_dmdd )
            &&
            $selected_datasets_dmdd['question_caller_specific_record_mode'] === TRUE
        ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_caller_specific_record_to_be_edited(
        //      $selected_datasets_dmdd     ,
        //      $dataset_records            ,
        //      $record_indices_by_key      ,
        //      $dataset_title              ,
        //      $question_create
        //      )
        // - - - - - - - - - - - - - - - - -
        // Returns the record to be edited.
        //
        // Called from "get_record_to_be_edited()" - but only if:-
        //      $selected_datasets_dmdd['question_caller_specific_record_mode']
        // exists and is TRUE
        //
        // IGNORES $_GET['record_key'].
        //
        // ONLY works if we're EDITING a record !!!
        //
        // RETURNS:-
        //      o   On SUCCESS!
        //          - - - - - -
        //          array(
        //              STRING $record_to_be_edited_key     ,
        //              INT    $record_to_be_edited_index   ,
        //              ARRAY  $record_to_be_edited
        //              )
        //
        //          Where if:-
        //              $record_to_be_edited_index = NULL
        //
        //          it means that this record should be added as a NEW record
        //          to the dataset (because, for example, this is a NEW caller,
        //          who doesn't have a record in the dataset yet).
        //
        //          In this case, we should also have:-
        //              $record_to_be_edited_key = '' (empty string)
        //
        //          And a new unique record key should be generated.
        //
        //      o   On FAILURE!
        //          - - - - - -
        //          $error_message STRING
        // -------------------------------------------------------------------------

        return get_caller_specific_record_to_be_edited(
                    $selected_datasets_dmdd     ,
                    $dataset_records            ,
                    $record_indices_by_key      ,
                    $dataset_title              ,
                    $question_create
                    ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // GET RECORD SPECIFIED BY:-
    //      $_GET['record_key']
    // =========================================================================

    // -------------------------------------------------------------------------
    // Get the GET VARIABLE NAME for the record to be edited's "key"...
    // -------------------------------------------------------------------------

    $key_field_get_var_name = 'record_key' ;

    // -------------------------------------------------------------------------
    // Is that GET VARIABLE present ?
    // -------------------------------------------------------------------------

    if ( ! isset( $_GET[ $key_field_get_var_name ] ) ) {

        return <<<EOT
PROBLEM Editing Dataset Record:&nbsp; No "record_key"
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // =========================================================================
    // Record in MySQL table ?
    // =========================================================================

    if (    array_key_exists( 'storage_method' , $selected_datasets_dmdd )
            &&
            $selected_datasets_dmdd['storage_method'] === 'mysql'
        ) {

        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // Get record from MySQL TABLE...
        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

        // =====================================================================
        // Get the CORE PLUGAPP DIRS...
        // =====================================================================

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

        // ---------------------------------------------------------------------

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

        // ---------------------------------------------------------------------

        $core_plugapp_dirs =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_core_plugapp_dirs(
                $path_in_plugin     ,
                $app_handle
                ) ;

        // =====================================================================
        // Record key OK ?
        // =====================================================================

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_GET , '$_GET' ) ;

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

        $key_field_details =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_check_mysql_array_storage_key_field_overrides(
                $core_plugapp_dirs['plugins_includes_dir']      ,
                $selected_datasets_dmdd                         ,
                $dataset_title                                  ,
                $key_field_get_var_name
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $key_field_details ) ) {
            return $key_field_details ;
        }

        // ---------------------------------------------------------------------

        if (    $key_field_details === NULL
                ||
                $key_field_details['value'] === ''
            ) {

            return <<<EOT
PROBLEM editing dataset record:&nbsp; Bad "record_key"
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

/*
        $key_field_format = 'sequential-id' ;

        // ---------------------------------------------------------------------

        if (    array_key_exists( 'mysql_overrides' , $selected_datasets_dmdd )
                &&
                is_array( $selected_datasets_dmdd['mysql_overrides'] )
                &&
                array_key_exists( 'key_field_format' , $selected_datasets_dmdd['mysql_overrides'] )
            ) {

            // -----------------------------------------------------------------

            if (    in_array(
                        $selected_datasets_dmdd['mysql_overrides']['key_field_format']              ,
                        array( 'ctype-digit' , 'sequential-id' , 'great-kiwi-password' , 'url' )    ,
                        TRUE
                        )
                ) {

                $key_field_format =
                    $selected_datasets_dmdd['mysql_overrides']['key_field_format']
                    ;

            } else {

                return <<<EOT
PROBLEM editing dataset record:&nbsp; Unrecognised/unsupported "mysql_overrides" + "key_field_format" (#1)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        $key_field_value = $_GET[ $key_field_get_var_name ] ;

        // ---------------------------------------------------------------------

        if ( $key_field_format === 'ctype-digit' ) {

            // -----------------------------------------------------------------

            $key_field_ok =
                \ctype_digit( $key_field_value )
                &&
                $key_field_value > 0
                ;

            // -----------------------------------------------------------------

        } elseif ( $key_field_format === 'sequential-id' ) {

            // -----------------------------------------------------------------

            require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/sequential-ids-support.php' ) ;

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

            $key_field_ok =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\question_sequential_id(
                    $key_field_value
                    ) ;

            // -----------------------------------------------------------------

        } elseif ( $key_field_format === 'great-kiwi-password' ) {

            // -----------------------------------------------------------------

            $key_field_format_args = array() ;

            // -----------------------------------------------------------------

            if ( array_key_exists( 'key_field_format_args' , $selected_datasets_dmdd['mysql_overrides'] ) ) {
                $key_field_format_args = $selected_datasets_dmdd['mysql_overrides']['key_field_format_args'] ;
            }

            // -----------------------------------------------------------------

            if ( ! is_array( $key_field_format_args ) ) {

                return <<<EOT
PROBLEM editing dataset record:&nbsp; Unrecognised/unsupported "mysql_overrides" + "key_field_format_args"
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/great-kiwi-passwords.php' ) ;

            // -----------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\
            // question_grouped_random_password(
            //      $candidate_password     ,
            //      $options = array()
            //      )
            // - - - - - - - - - - - - - - - - -
            // Checks whether the $candidate_password is a grouped random password
            // like:-
            //      k53t-xc92-v7k3
            //      etc
            //
            // Allowed password characters are those in:-
            //      GREAT_KIWI_ALLOWED_PASSWORD_CHARACTERS
            //
            // Currently these are all the ASCII alphanumeric characters but:-
            //      0    1    5    6    8
            //      A    B    D    E    I    O    Q    S    U
            //      a    b    e    f    i    j    l    o    q    r    s    t    u
            //
            // These are omitted because they're combinations like:-
            //      0/8/B/D/Q
            //      1/I/l
            //      5/S
            //      etc
            //
            // that can easily be confused with each other.
            //
            // ---
            //
            // $options is like (eg):-
            //
            //      $options = array(
            //          'number_groups'         =>  4       ,
            //          'chars_per_group'       =>  4       ,
            //          'group_separator'       =>  '-'     ,
            //          'lowercase_only'        =>  TRUE    ,
            //          'question_punctuation'  =>  FALSE
            //          )
            //
            // ---
            //
            // NOTE!
            // -----
            // With some combinations, it depends very much on the FONT used (as to
            // how similar two different characters look).  Thus the above rules are
            // a worst-case set.  Stuff is in there if in any common (web) font,
            // the chance of confusion exists.
            //
            // RETURNS
            //      On SUCCESS
            //          TRUE or FALSE
            //
            //      On FAILURE
            //          $error_message STRING
            // -----------------------------------------------------------------------

            $key_field_ok =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\question_grouped_random_password(
                    $key_field_value            ,
                    $key_field_format_args
                    ) ;

            // -----------------------------------------------------------------

        } elseif ( $key_field_format === 'url' ) {

            // -----------------------------------------------------------------

            require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/validata/url-validators.php' ) ;

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
            // absolute_url_string__minLen_maxLen_questionEmptyOK(
            //      $value                              ,
            //      $minlen            = 'default'      ,
            //      $maxlen            = 'default'      ,
            //      $question_empty_ok = TRUE
            //      )
            // - - - - - - - - - - - - - - - - - - - - -
            // NOTES!
            // ------
            // 1.   $question_empty_ok gives you the flexibility to specify (eg):-
            //          o   $minlen = 32
            //          o   $maxlen = 64
            //          o   $question_empty_ok = TRUE
            //
            //      So as to permit either:-
            //          o   The empty string, or;
            //          o   A 32 to 64 character URL string.
            //
            // 2.   Default $minlen = 10 = strlen( "http://x.y" )
            //      (= shortest possible absolute URL).
            //
            // 3.   Default $maxlen = 2000
            //      See (eg):
            //          http://stackoverflow.com/questions/417142/what-is-the-maximum-length-of-a-url-in-different-browsers
            //
            // RETURNS
            //      On SUCCESS!
            //          TRUE
            //
            //      On FAILURE
            //          $error_message STRING
            // -------------------------------------------------------------------------

            $minlen            = 'default' ;
            $maxlen            = 255       ;    //  Max. MySQL field length
            $question_empty_ok = FALSE     ;

            // -------------------------------------------------------------

            $key_field_ok =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\absolute_url_string__minLen_maxLen_questionEmptyOK(
                    $key_field_value        ,
                    $minlen                 ,
                    $maxlen                 ,
                    $question_empty_ok
                    ) ;

            // -----------------------------------------------------------------

        } else {

            return <<<EOT
PROBLEM editing dataset record:&nbsp; Unrecognised/unsupported "mysql_overrides" + "key_field_format" (#2)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        if ( $key_field_ok !== TRUE ) {

            return <<<EOT
PROBLEM editing dataset record:&nbsp; Bad "record_key"
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }
*/

        // =====================================================================
        // Get/check the DATASET SLUG...
        // =====================================================================

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_GET ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $selected_datasets_dmdd ) ;

        if (    ! array_key_exists( 'dataset_slug' , $_GET )
                ||
                ! array_key_exists( 'dataset_slug' , $selected_datasets_dmdd )
                ||
                $_GET['dataset_slug'] !== $selected_datasets_dmdd['dataset_slug']
                ||
                trim( $_GET['dataset_slug'] ) === ''
                ||
                trim( $_GET['dataset_slug'] ) !== $_GET['dataset_slug']
            ) {

            return <<<EOT
PROBLEM editing dataset record:&nbsp; Can't find "dataset_slug"
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        $dataset_slug = $_GET['dataset_slug'] ;

        // =====================================================================
        // Get the MySQL Table name...
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
        // Get the KEY FIELD SLUG...
        // =====================================================================

//      if (    array_key_exists( 'mysql_overrides' , $selected_datasets_dmdd )
//              &&
//              is_array( $selected_datasets_dmdd['mysql_overrides'] )
//              &&
//              array_key_exists( 'array_storage_key_field_slug' , $selected_datasets_dmdd['mysql_overrides'] )
//              &&
//              is_string( $selected_datasets_dmdd['mysql_overrides']['array_storage_key_field_slug'] )
//              &&
//              trim( $selected_datasets_dmdd['mysql_overrides']['array_storage_key_field_slug'] ) !== ''
//          ) {
//
//          $key_field_slug =
//              $selected_datasets_dmdd['mysql_overrides']['array_storage_key_field_slug']
//              ;
//
//      } else {
//
//          return <<<EOT
//  PROBLEM editing dataset record:&nbsp; Can't find table's "key" field
//  For dataset:&nbsp; "{$dataset_title}"
//  Detected in:&nbsp; \\{$ns}\\{$fn}()
//  EOT;
//
//      }

        // ---------------------------------------------------------------------

        $key_field_slug = $key_field_details['slug'] ;

        // =====================================================================
        // Load the record...
        // =====================================================================

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\
        // get_zero_or_more_records(
        //      $sql
        //      )
        // - - - - - - - - - - - - - - - - - - - - -
        // NOTES!
        // ======
        // 1.   The INPUT $sql should NOT be escaped.
        //
        // 2.   MySQL Data Types AREN'T PRESERVED!
        //      ----------------------------------
        //      In other words, something stored in the DB as a MySQL INT, WON'T
        //      necessarily be returned as a PHP INT.  It comes back as a STRING.
        //
        //      I haven't checked FLOATs and TIMESTAMPS, etc.  But I assume that
        //      the same applies to them.
        //
        //      Why this happens I'm not sure.  But presumably, since we access
        //      the database with the WordPress Wpdb class - it's that class's
        //      fault.
        //
        // RETURNS
        //      On SUCCESS
        //      - - - - -
        //      The 0+ records specified by the SQL string (as a PHP numeric
        //      array of records).  Eg:-
        //
        //          $records = array(
        //              0   =>  array(
        //                          'field_name_1'  =>  <field_value_1>     ,
        //                          'field_name_2'  =>  <field_value_2>     ,
        //                          ...                 ...
        //                          'field_name_N'  =>  <field_value_N>
        //                          )
        //              ...
        //              )
        //
        //      On FAILURE
        //      - - - - -
        //      An error message STRING.
        // -------------------------------------------------------------------------

        $sql = <<<EOT
SELECT *
FROM `{$mysql_table_name}`
WHERE `{$key_field_slug}` = "{$_GET[ $key_field_get_var_name ]}"
EOT;

        // ---------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\get_zero_or_more_records(
                $sql
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        if ( count( $result ) < 1 ) {

            return <<<EOT
PROBLEM editing dataset record:&nbsp; Record not found
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        if ( count( $result ) > 1 ) {

            return <<<EOT
PROBLEM editing dataset record:&nbsp; Duplicate record key
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $result[0] ) ;

        // =====================================================================
        // SUCCESS!
        // =====================================================================

        return array(
                    $_GET[ $key_field_get_var_name ]    ,
                    NULL                                ,
                    $result[0]
                    ) ;

        // ---------------------------------------------------------------------

    }

    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // Get record from ARRAY STORAGE...
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    // -------------------------------------------------------------------------
    // Does the "key", specified by the "key" GET VARIABLE, look valid ?
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // is_record_key(
    //      $candidate_record_key
    //      )
    // - - - - - - - - - - - - - - - - -
    // RETURNS
    //      o   On SUCCESS
    //              TRUE
    //
    //      o   On FAILURE
    //              FALSE
    // -------------------------------------------------------------------------

    if ( ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\is_record_key(
                $_GET[ $key_field_get_var_name ]
                )
        ) {

        return <<<EOT
PROBLEM editing dataset record:&nbsp; Bad "record_key"
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------
    // Does the "key", specified by the "key" GET VARIABLE, point to an
    // existing dataset record ?
    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $_GET[ $key_field_get_var_name ] , $record_indices_by_key ) ) {

        return <<<EOT
PROBLEM Editing Dataset Record:&nbsp; Bad "record_key" (no such record)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------
    // OK; we've found the record to be edited...
    // -------------------------------------------------------------------------

    return array(
                $_GET[ $key_field_get_var_name ]                                                    ,
                $record_indices_by_key[ $_GET[ $key_field_get_var_name ] ]                          ,
                $dataset_records[ $record_indices_by_key[ $_GET[ $key_field_get_var_name ] ] ]
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_caller_specific_record_to_be_edited()
// =============================================================================

function get_caller_specific_record_to_be_edited(
    $selected_datasets_dmdd     ,
    $dataset_records            ,
    $record_indices_by_key      ,
    $dataset_title              ,
    $question_create
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_caller_specific_record_to_be_edited(
    //      $selected_datasets_dmdd     ,
    //      $dataset_records            ,
    //      $record_indices_by_key      ,
    //      $dataset_title              ,
    //      $question_create
    //      )
    // - - - - - - - - - - - - - - - - -
    // Returns the record to be edited.
    //
    // Called from "get_record_to_be_edited()" - but only if:-
    //      $selected_datasets_dmdd['question_caller_specific_record_mode']
    // exists and is TRUE
    //
    // IGNORES $_GET['record_key'].
    //
    // ONLY works if we're EDITING a record !!!
    //
    // RETURNS:-
    //      o   On SUCCESS!
    //          - - - - - -
    //          array(
    //              $record_to_be_edited_key   STRING       ,
    //              $record_to_be_edited_index INT / NULL   ,
    //              $record_to_be_edited       ARRAY
    //              )
    //
    //          Where if:-
    //              $record_to_be_edited_index = NULL
    //
    //          it means that this record should be added as a NEW record
    //          to the dataset (because, for example, this is a NEW caller,
    //          who doesn't have a record in the dataset yet).
    //
    //          In this case, we should also have:-
    //              $record_to_be_edited_key = '' (empty string)
    //
    //          And a new unique record key should be generated.
    //
    //      o   On FAILURE!
    //          - - - - - -
    //              ##  FALSE if:-
    //                  --  The dataset supports CALLER SPECIFIC RECORDS,
    //                      AND;
    //                  --  NO record for the current caller was found,
    //                      AND;
    //                  --  $question_create !== TRUE
    //          --or--
    //              ##  $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init...
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__ ;

    // =========================================================================
    // ERROR CHECKING
    // =========================================================================

    // -------------------------------------------------------------------------
    // question_caller_specific_record_mode ?
    // -------------------------------------------------------------------------

    if ( ! array_key_exists( 'question_caller_specific_record_mode' , $selected_datasets_dmdd ) ) {

        return <<<EOT
PROBLEM getting caller specific dataset record:&nbsp; No "question_caller_specific_record_mode" in dataset definition
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    if ( $selected_datasets_dmdd['question_caller_specific_record_mode'] !== TRUE ) {

        return <<<EOT
PROBLEM getting caller specific dataset record:&nbsp; Bad "question_caller_specific_record_mode" in dataset definition (TRUE expected)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------
    // caller_specific_record_functions_namespace_name ?
    // -------------------------------------------------------------------------

    if ( ! array_key_exists( 'caller_specific_record_functions_namespace_name' , $selected_datasets_dmdd ) ) {

        return <<<EOT
PROBLEM getting caller specific dataset record:&nbsp; No "caller_specific_record_functions_namespace_name" in dataset definition
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    if (    ! is_string( $selected_datasets_dmdd['caller_specific_record_functions_namespace_name'] )
            ||
            trim( $selected_datasets_dmdd['caller_specific_record_functions_namespace_name'] ) === ''
        ) {

        return <<<EOT
PROBLEM getting caller specific dataset record:&nbsp; Bad "caller_specific_record_functions_namespace_name" in dataset definition (non-empty string expected)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

//  if ( ! namespace_exists( $selected_datasets_dmdd['caller_specific_record_functions_namespace_name'] ) ) {
//
//      return <<<EOT
//  PROBLEM getting caller specific dataset record:&nbsp; Bad "caller_specific_record_functions_namespace_name" in dataset definition (no such namespace)
//  For dataset:&nbsp; "{$dataset_title}"
//  Detected in:&nbsp; \\{$ns}\\{$fn}()
//  EOT;
//
//  }

    // =========================================================================
    // Check for the "get_caller_specific_record()" function...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_<datasetCamelName>\
    // get_existing_caller_specific_record(
    //      $selected_datasets_dmdd     ,
    //      $dataset_records            ,
    //      $record_indices_by_key      ,
    //      $dataset_title
    //      )
    // - - - - - - - - - - - - - - - - -
    // Returns the EXISTING caller specific record in the dataset.  Unless
    // the caller has NO record in the dataset yet.  In which case, it returns
    // FALSE.
    //
    // RETURNS
    //      o   On SUCCESS
    //              ARRAY(
    //                  $caller_specific_record_key   STRING
    //                  $caller_specific_record_index INT
    //                  $caller_specific_record_data  ARRAY
    //                  )
    //
    //      o   On FAILURE
    //              ##  FALSE if there's NO caller-specific record in the
    //                  dataset yet
    //          --OR--
    //              ##  $error_message STRING on error
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_<datasetCamelName>\
    // get_or_create_caller_specific_record(
    //      $selected_datasets_dmdd     ,
    //      $dataset_records            ,
    //      $record_indices_by_key      ,
    //      $dataset_title              ,
    //      $question_create
    //      )
    // - - - - - - - - - - - - - - - - -
    // Returns the caller specific record from the dataset.  Unless there's
    // NO caller specific record in the database yet, in which case it returns
    // a NEW record for the caller.
    //
    // Where that new record is created by calling the dataset's:-
    //     get_default_record_data()
    // routine.
    //
    // NOTE!
    // =====
    // The new record ISN'T added to the (array stored) dataset.  The routine
    // that calls this routine should do that (if it wantsw/needs to).
    //
    // RETURNS
    //      o   On SUCCESS
    //              ARRAY(
    //                  $caller_specific_record_key   STRING
    //                  $caller_specific_record_index INT / NULL
    //                  $caller_specific_record_data  ARRAY
    //                  )
    //
    //          Where if:-
    //              $caller_specific_record_index = NULL
    //
    //          it means that this record should be added as a NEW record
    //          to the dataset (because, for example, this is a NEW caller,
    //          who doesn't have a record in the dataset yet).
    //
    //          In this case, we should also have:-
    //              $caller_specific_record_key = '' (empty string)
    //
    //          (and a new unique record key should also be generated).
    //
    //      o   On FAILURE
    //              $error_message STRING
    // -------------------------------------------------------------------------

    if ( $question_create === TRUE ) {

        $get_caller_specific_record_function_name =
            '\\' .
            $selected_datasets_dmdd['caller_specific_record_functions_namespace_name'] .
            '\\get_or_create_caller_specific_record'
            ;

    } else {

        $get_caller_specific_record_function_name =
            '\\' .
            $selected_datasets_dmdd['caller_specific_record_functions_namespace_name'] .
            '\\get_existing_caller_specific_record'
            ;

    }

    // -------------------------------------------------------------------------

    if ( ! function_exists( $get_caller_specific_record_function_name ) ) {

        return <<<EOT
PROBLEM getting caller specific dataset record:&nbsp; "get_xxx_caller_specific_record()" function not found
The missing function's name is:&nbsp; {$get_caller_specific_record_function_name}
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // =========================================================================
    // Run the "get_xxx_caller_specific_record()" function - and return it's
    // results...
    // =========================================================================

    return $get_caller_specific_record_function_name(
                $selected_datasets_dmdd     ,
                $dataset_records            ,
                $record_indices_by_key      ,
                $dataset_title
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

