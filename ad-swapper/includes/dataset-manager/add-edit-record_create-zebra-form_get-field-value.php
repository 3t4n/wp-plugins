<?php

// *****************************************************************************
// DATASET-MANAGER / ADD-EDIT-RECORD_CREATE-ZEBRA-FORM_GET_FIELD_VALUE.PHP
// (C) 2013 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// get_field_value_for_zebra_form()
// =============================================================================

function get_field_value_for_zebra_form(
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
    ) {

//echo '<h2 style="margin-top:3em; background-color:#AA0000; color:#FFFFFF">Get Field Value for Zebra Form</h2>' ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $zebra_form_field_number , '$zebra_form_field_number' ) ;

//  if ( $zebra_form_field_details['form_field_name'] === 'question_disabled' ) {
//
//      \greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//          $zebra_form_field_details       ,
//          '$zebra_form_field_details'
//          ) ;
//
//      \greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//          $zebra_form_field_indices_of_checkbox_type_zebra_form_fields        ,
//          '$zebra_form_field_indices_of_checkbox_type_zebra_form_fields'
//          ) ;
//
//  }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_GET , '$_GET' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_POST , '$_POST' ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $adding_editing , '$adding_editing' ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $the_record , '$the_record' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $the_records_index , '$the_records_index' ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $array_storage_field_details , '$array_storage_field_details' ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $new_record_default_data , '$new_record_default_data' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
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
    // Returns the field value to go in the form we're creating.
    //
    // We get this field value as follows:-
    //
    //      o   If the form HAS been submitted, then we use the
    //          submitted value (from $_POST).
    //
    //      o   If the form HASN'T been submitted, then...
    //
    //          --  If the dataset has a:-
    //                  "get_default_record_data()"
    //
    //              function - AND the required field exists in the
    //              record data returned by that function - then we
    //              use that value.
    //
    //          --  Otherwise, we use the value specified by:-
    //                  <Zebra Form field> + "form_field_value_from"
    //
    //              NOTE!
    //              =====
    //              <Zebra Form field> + "form_field_value_from" can
    //              be any of the following:-
    //
    //              1.  Method:     array-storage-value-from
    //                  Instance:   <array storage field slug>
    //                  --------------------------------------------------------
    //                  Use the value specified by the specified array storage
    //                  field's "array_storage_value_from" variable.
    //
    //                  See:-
    //                          File: add-edit-record_submission-handler-support.php
    //                      Function: get_array_storage_field_value()
    //                  for full details (of the "array_storage_value_from"
    //                  variable).
    //
    //              2.  Method:     array-storage-field-value
    //                  Instance:   <array storage field slug>
    //                  --------------------------------------------------------
    //                  Use the current value of the specified array storage
    //                  field.
    //
    //              3.  Method:     literal
    //                  Instance:   <some PHP value>
    //                  --------------------------------------------------------
    //                  Use the specified value.
    //
    //              4.  Method:     function
    //                  Instance:   <some function name>
    //                  Args:       <some PHP value>
    //                  --------------------------------------------------------
    //                  Use the value returned by the specified function.
    //
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

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $zebra_form_field_details = Array(
    //          [form_field_name]       =>  pathspec
    //          [zebra_control_type]    =>  text
    //          [label]                 =>  Pathspec
    //          [attributes]            =>  Array()
    //          [rules]                 =>  Array(
    //              [required] => Array(
    //                  [0] => error
    //                  [1] => Field is required
    //                  )
    //              )
    //          [form_field_value_from]            => Array(
    //              [add] => Array(
    //                  [method]    => literal
    //                  [args]      =>
    //                  )
    //
    //              [edit] => Array(
    //                  [method]    => array-storage-field-slug
    //                  [args]      => pathspec
    //                  )
    //              )
    //          [type_specific_args]    => Array()
    //          [constraints]           => Array()
    //          )
    //
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      o   If ADDING a Record
    //              $the_record              = NULL
    //              $new_record_default_data =
    //                  o   NULL - if the dataset has NO
    //                      "get_default_record_data() routine
    //                  o   array(...) - if the dataset HAS a
    //                      "get_default_record_data() routine
    //
    //      o   If EDITING a Record
    //              $the_record              = array(...)
    //              $new_record_default_data = NULL
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init. the local variables used (to make the code clearer)...
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__ ;

    // -------------------------------------------------------------------------

    $success = TRUE  ;
    $failure = FALSE ;

    // =========================================================================
    // Ignore the Zebra Form controls that have no "default value"...
    //
    // NOTE!
    // =====
    // Zebra Form controls with NO default value are (eg):-
    //      o   submit
    //      o   button
    // =========================================================================

    if ( in_array(
                $zebra_form_field_details['zebra_control_type']     ,
                get_zebra_controls_with_no_default_value()          ,
                TRUE
                )
        ) {

        return array( $success , NULL ) ;
                    //  The returned value is a dummy value which is ignored.

     }

    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // If the form HAS been submitted, then we get the field value from the
    // submitted value...
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_POST , '$_POST' ) ;

    if ( count( $_POST ) > 0 ) {

        // =====================================================================
        // Is the FORM FIELD NAME in $_POST ?
        // =====================================================================

        if ( ! array_key_exists(
                    $zebra_form_field_details['form_field_name']        ,
                    $_POST
                    )
            ) {

            // =================================================================
            // NO!
            // =================================================================

            if ( $zebra_form_field_details['zebra_control_type'] === 'checkbox' ) {

                // -------------------------------------------------------------
                // If the field is a CHECKBOX, this is OK.
                //
                // It just means that the checkbox WASN'T checked:-
                //      ==>     field value = FALSE
                // -------------------------------------------------------------

                return array(
                            $success    ,
                            FALSE
                            ) ;

                // -------------------------------------------------------------

            } elseif ( $zebra_form_field_details['zebra_control_type'] === 'radios' ) {

                // -------------------------------------------------------------
                // If the field is a RADIO GROUP, it's also OK.
                //
                // It just means that NO radio button has been checked:-
                //      ==>     field value = ''
                // -------------------------------------------------------------

                return array(
                            $success    ,
                            ''      //  Ie; NO value is currently selected
                            ) ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------
            // For any other field type, we have a:-
            //      No "<field name>"
            // error...
            // -----------------------------------------------------------------

            $msg = <<<EOT
PROBLEM:&nbsp; No "{$zebra_form_field_details['form_field_name']}" (in submitted data)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            // -----------------------------------------------------------------

            return array(
                        $failure    ,
                        $msg
                        ) ;

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // If we get here, then the form field WAS submitted (in $_POST)...
        // =====================================================================

        if ( $zebra_form_field_details['zebra_control_type'] === 'checkbox' ) {

            // =================================================================
            // Submitted CHECKBOX field...
            // =================================================================

            // -------------------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $zebra_form_field_details = Array(
            //          [form_field_name]       => enabled
            //          [zebra_control_type]    => checkbox
            //          [label]                 => Enabled ?
            //          [help_text]             => You can permanently disable this Gadget (eg; because it's under development, buggy, or no longer needed), if you want to.
            //          [attributes]            => Array()
            //          [rules]                 => Array()
            //          [type_specific_args]    => Array(
            //                                          [defaults_checked] => 1
            //                                          )
            //          [form_field_value_from] => Array(
            //                                          [add] => Array(
            //                                                      [method] => literal
            //                                                      [args]   =>
            //                                                      )
            //                                          [edit] => Array(
            //                                                      [method] => array-storage-field-slug
            //                                                      [args]   => enabled
            //                                                      )
            //                                          )
            //          [constraints]           => Array()
            //          )
            //
            // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $zebra_form_field_details ) ;

            // -----------------------------------------------------------------
            // The DEFAULT checkbox value is "1"...
            // -----------------------------------------------------------------

            $expected_value = '1' ;

            // -----------------------------------------------------------------
            // If another checkbox value was specified (in the form definition),
            // then get/check it...
            // -----------------------------------------------------------------

            if (    array_key_exists( 'type_specific_args' , $zebra_form_field_details )
                    &&
                    is_array( $zebra_form_field_details['type_specific_args'] )
                    &&
                    array_key_exists( 'value' , $zebra_form_field_details['type_specific_args'] )
                ) {

                // -------------------------------------------------------------

                if ( ! is_string( $zebra_form_field_details['type_specific_args']['value'] ) ) {

                    // ---------------------------------------------------------

                    $safe_field_name = htmlentities( $zebra_form_field_details['form_field_name'] ) ;

                    $msg = <<<EOT
PROBLEM:&nbsp; Bad "type_specific_args" + "value" (string expected)
For dataset:&nbsp; "{$dataset_title}"
and Zebra Form field# {$zebra_form_field_number}:&nbsp; "{$safe_field_name}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                    // ---------------------------------------------------------

                    return array(
                                $failure    ,
                                $msg
                                ) ;

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

                $expected_value = $zebra_form_field_details['type_specific_args']['value'] ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------
            // Are the submitted and expected CHECKED checkbox values the same ?
            // -----------------------------------------------------------------

            if ( $_POST[ $zebra_form_field_details['form_field_name'] ] !== $expected_value ) {

                // -------------------------------------------------------------
                // NO --> ERROR!
                // -------------------------------------------------------------

                $msg = <<<EOT
PROBLEM:&nbsp; Bad "{$zebra_form_field_details['form_field_name']}" (unexpected value in submitted data)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                // -------------------------------------------------------------

                return array(
                            $failure    ,
                            $msg
                            ) ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------
            // YES --> SUCCESS!
            // -----------------------------------------------------------------

            return array(
                        $success                                                    ,
                        TRUE
                        ) ;

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // NORMAL field (other than a CHECKBOX) - that WAS submitted in
        // $_POST...
        //
        //      ==>     field value = submitted value
        // =====================================================================

        return array(
                    $success                                                    ,
                    $_POST[ $zebra_form_field_details['form_field_name'] ]
                    ) ;

        // ---------------------------------------------------------------------

    }

    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // If the form HASN'T been submitted, then we FIRST try getting the field
    // value from the custom DEFAULT RECORD (if one was specified)...
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    if ( is_array( $new_record_default_data ) ) {

        // ---------------------------------------------------------------------
        // If the requested field is in the default record data, return
        // it's value...
        // ---------------------------------------------------------------------

        if ( array_key_exists(
                    $zebra_form_field_details['form_field_name']    ,
                    $new_record_default_data
                    )
            ) {

            // -----------------------------------------------------------------

            return array(
                        $success                                                                    ,
                        $new_record_default_data[ $zebra_form_field_details['form_field_name'] ]
                        ) ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Otherwise, fall through to get the default value that's specified
        // by the Zebra Form Fields "form_field_value_from" variable...
        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // If the form HASN'T been submitted
    // AND
    // There was NO DEFAULT RECORD (or there was a default record - but NO
    // value for current array storage field was specified in it)
    // THEN
    // We get the field value from the Zebra Form field's
    //      "form_field_value_from"
    // variable...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $zebra_form_field_details['form_field_value_from'] = array(
    //
    //          'add'   =>  array(
    //                          'method'    =>  'array-storage-value-from'
    //                          'instance'  =>  <array storage field slug>
    //                          )
    //                          //  Use the value specified by the specified
    //                          //  field's "array-storage-value-from" variable.
    //
    //                      -OR-
    //
    //                      array(
    //                          'method'    =>  'literal'
    //                          'instance'  =>  <some literal value>
    //                          )
    //                          //  Use the specified value.
    //
    //                      -OR-
    //
    //                      array(
    //                          'method'    =>  'function'
    //                          'instance'  =>  '<function name, including namespace prefix if used>
    //                          'args'      =>  <the extra args (if any), used by this function
    //                                          - any PHP value>
    //                          )
    //                          //  Use the value returned by the specified
    //                          //  function.
    //
    //                      NOTE!
    //                      -----
    //                      array(
    //                          'method'    =>  'array-storage-field-value'
    //                          'instance"  =>  <array storage field slug>
    //                          )
    //                      ISN'T allowed when adding.  Because by definition,
    //                      there's NO existing field value to retrieve.
    //
    //          'edit'  =>  array(
    //                          'method'    =>  'array-storage-value-from'
    //                          'instance'  =>  <array storage field slug>
    //                          )
    //                          //  Use the value specified by the specified
    //                          //  field's "array-storage-value-from" variable.
    //
    //                      -OR-
    //
    //                      array(
    //                          'method'    =>  'array-storage-field-value'
    //                          'instance"  =>  <array storage field slug>
    //                          )
    //                          //  Use the specified field's existing value.
    //
    //                      -OR-
    //
    //                      array(
    //                          'method'    =>  'literal'
    //                          'instance'  =>  <any PHP value>
    //                          )
    //                          //  Use the specified value.
    //
    //                      -OR-
    //
    //                      array(
    //                          'method'    =>  'function'
    //                          'instance'  =>  '<function name, including namespace prefix if used>
    //                          'args'      =>  <the extra args (if any), used by this function
    //                                          - any PHP value>
    //                          )
    //                          //  Use the value returned by the specified
    //                          //  function.
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $zebra_form_field_details ) ;

    // -------------------------------------------------------------------------

    if ( $question_adding ) {
        $add_edit = 'add' ;

    } else {
        $add_edit = 'edit' ;

    }

    // -------------------------------------------------------------------------

    $method_and_args = $zebra_form_field_details['form_field_value_from'][ $add_edit ] ;

//pr( $method_and_args ) ;

    // -------------------------------------------------------------------------

    if ( $method_and_args['method'] === 'array-storage-value-from' ) {

        // =====================================================================
        // METHOD = ARRAY-STORAGE-VALUE-FROM
        // =====================================================================

        // ---------------------------------------------------------------------
        // $method_and_args = array(
        //      'method'    =>  'array-storage-value-from'
        //      'instance'  =>  <array storage field slug>
        //      )
        //      //  Use the value specified by the specified
        //      //  field's "array-storage-value-from" variable.
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // "instance" specified ?
        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'instance' , $method_and_args ) ) {

            // -----------------------------------------------------------------

            $msg = <<<EOT
PROBLEM: Bad Zebra Form field definition (no "form_field_value_from" + "instance")
For field:&nbsp; {$zebra_form_field_details['form_field_name']}
Of dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            // -----------------------------------------------------------------

            return array(
                        $failure    ,
                        $msg
                        ) ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // "instance" = non-blank string ?
        // ---------------------------------------------------------------------

        if (    ! is_string( $method_and_args['instance'] )
                ||
                trim( $method_and_args['instance'] ) === ''
            ) {

            // -----------------------------------------------------------------

            $msg = <<<EOT
PROBLEM: Bad "form_field_value_from" + "instance" (non-blank string expected)
For field:&nbsp; {$zebra_form_field_details['form_field_name']}
Of dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            // -----------------------------------------------------------------

            return array(
                        $failure    ,
                        $msg
                        ) ;

            // -----------------------------------------------------------------

        }

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
        //      $zebra_form_field_indices_of_radios_type_zebra_form_fields
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Returns the value for the specified (array storage) field - as
        // specified by that field's "array_storage_value_from" variable.
        //
        // Ie:-
        //
        //      <dataset-definition>(
        //          "array_storage_record_structure" => array(
        //              <array-storage-field-definition> => array(
        //                  "array_storage_value_from"  =>  array(...)
        //                  )
        //              )
        //          )
        //
        // ---
        //
        // Where "array_storage_value_from" can have the following values (as of
        // 23 September 2014):-
        //
        //      array(
        //          'method'    =>  'created-server-datetime-utc'
        //          )
        //
        //      array(
        //          'method'    =>  'last-modified-server-datetime-utc'
        //          )
        //
        //      array(
        //          'method'    =>  'created-server-micro-datetime-utc'
        //          )
        //
        //      array(
        //          'method'    =>  'last-modified-server-micro-datetime-utc'
        //          )
        //
        //      array(
        //          'method'    =>  'unique-key'
        //          )
        //
        //      array(
        //          'method'    =>  'literal'                   ,
        //          'instance'  =>  <any-PHP-scalar-value>
        //          )
        //
        //      array(
        //          'method'    =>  'get'               ,
        //          'instance'  =>  '<get-var-name>'
        //          )
        //
        //      array(
        //          'method'    =>  'post'              ,
        //          'instance'  =>  '<post-var-name>'
        //          )
        //
        //      array(
        //          'method'    =>  'server'            ,
        //          'instance'  =>  '<server-var-name>'
        //          )
        //
        //      array(
        //          'method'    =>  'cookie'            ,
        //          'instance'  =>  '<cookie-var-name>'
        //          )
        //
        //      array(
        //          'method'    =>  'function'                                      ,
        //          'instance'  =>  '<function-name-including-namespace-if-used>'   ,
        //          'args'      =>  <any-PHP-value>
        //          )
        //
        // ---
        //
        // RETURNS:-
        //
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
                        $home_page_title                                                ,
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
                        $zebra_form_field_indices_of_radios_type_zebra_form_fields
                        ) ;

        // ---------------------------------------------------------------------

        $ok = $result[0] ;

        // ---------------------------------------------------------------------

        if ( $ok ) {

            list(
                $ok             ,
                $field_value    ,
                $question_change
                ) = $result ;

        } else {

            list(
                $ok             ,
                $error_message
                ) = $result ;

        }

        // ---------------------------------------------------------------------

        if ( $ok === FALSE ) {

            return array(
                        $failure        ,
                        $err_message
                        ) ;

        }

        // ---------------------------------------------------------------------
        // SUCCESS
        // ---------------------------------------------------------------------

        return array(
                    $success        ,
                    $field_value
                    ) ;

        // ---------------------------------------------------------------------

    } elseif ( $method_and_args['method'] === 'array-storage-field-value' ) {

        // =====================================================================
        // METHOD = ARRAY-STORAGE-FIELD-VALUE
        // =====================================================================

        // ---------------------------------------------------------------------
        // $method_and_args = array(
        //      'method'    =>  'array-storage-field-value'
        //      'instance"  =>  <array storage field slug>
        //      )
        //      //  Use the specified field's existing value.
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // Only valid when editing...
        //
        // Because when adding (a record), there is by definition, no existing
        // record to get the existing field value from).
        // ---------------------------------------------------------------------

        if ( $question_adding ) {

            // -----------------------------------------------------------------

            $msg = <<<EOT
PROBLEM: Bad "form_field_value_from" + "method" ("array-storage-field-value" not valid when ADDING a record)
For field:&nbsp; {$zebra_form_field_details['form_field_name']}
Of dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            // -----------------------------------------------------------------

            return array(
                        $failure    ,
                        $msg
                        ) ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Is $the_record an array ?
        // ---------------------------------------------------------------------

        if ( ! is_array( $the_record ) ) {

            // -----------------------------------------------------------------

            $msg = <<<EOT
PROBLEM: Bad "the_record" (array expected)
For field:&nbsp; {$zebra_form_field_details['form_field_name']}
Of dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            // -----------------------------------------------------------------

            return array(
                        $failure    ,
                        $msg
                        ) ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // "instance" specified ?
        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'instance' , $method_and_args ) ) {

            // -----------------------------------------------------------------

            $msg = <<<EOT
PROBLEM: Bad Zebra Form field definition (no "form_field_value_from" + "instance")
For field:&nbsp; {$zebra_form_field_details['form_field_name']}
Of dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            // -----------------------------------------------------------------

            return array(
                        $failure    ,
                        $msg
                        ) ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // "instance" = non-blank string ?
        // ---------------------------------------------------------------------

        if (    ! is_string( $method_and_args['instance'] )
                ||
                trim( $method_and_args['instance'] ) === ''
            ) {

            // -----------------------------------------------------------------

            $msg = <<<EOT
PROBLEM: Bad "form_field_value_from" + "instance" (non-blank string expected)
For field:&nbsp; {$zebra_form_field_details['form_field_name']}
Of dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            // -----------------------------------------------------------------

            return array(
                        $failure    ,
                        $msg
                        ) ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Specified field in record ?
        // ---------------------------------------------------------------------

        if ( ! array_key_exists( $method_and_args['instance'] , $the_record ) ) {

//\debug_print_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $the_record , '$the_record' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $zebra_form_field_details , '$zebra_form_field_details' ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $selected_datasets_dmdd , '$selected_datasets_dmdd' ) ;

            // -----------------------------------------------------------------

            if (    array_key_exists( 'storage_method' , $selected_datasets_dmdd )
                    &&
                    $selected_datasets_dmdd['storage_method'] === 'mysql'
                    &&
                    array_key_exists( 'mysql_overrides' , $selected_datasets_dmdd )
                    &&
                    is_array( $selected_datasets_dmdd['mysql_overrides'] )
                    &&
                    array_key_exists( 'missing_fields' , $selected_datasets_dmdd['mysql_overrides'] )
                    &&
                    is_array( $selected_datasets_dmdd['mysql_overrides']['missing_fields'] )
                    &&
                    in_array( $method_and_args['instance'] , $selected_datasets_dmdd['mysql_overrides']['missing_fields'] , TRUE )
                ) {

                return array(
                            $success    ,
                            ''
                            ) ;

            }

            // -----------------------------------------------------------------

            $msg = <<<EOT
PROBLEM: Bad "the_record" OR Zebra Form field definition (record contains NO "{$method_and_args['instance']}" field)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            // -----------------------------------------------------------------

            return array(
                        $failure    ,
                        $msg
                        ) ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // SUCCESS
        // ---------------------------------------------------------------------

        return array(
                    $success                                    ,
                    $the_record[ $method_and_args['instance'] ]
                    ) ;

        // ---------------------------------------------------------------------

    } elseif ( $method_and_args['method'] === 'literal' ) {

        // =====================================================================
        // METHOD = LITERAL
        // =====================================================================

        // ---------------------------------------------------------------------
        // $method_and_args = array(
        //      'method'    =>  'literal'
        //      'instance'  =>  <some literal value>
        //      )
        //      //  Use the specified value.
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // "instance" specified ?
        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'instance' , $method_and_args ) ) {

            // -----------------------------------------------------------------

            $msg = <<<EOT
PROBLEM: Bad Zebra Form field definition (no "form_field_value_from" + "instance")
For field:&nbsp; {$zebra_form_field_details['form_field_name']}
Of dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            // -----------------------------------------------------------------

            return array(
                        $failure    ,
                        $msg
                        ) ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // SUCCESS!
        // ---------------------------------------------------------------------

        return array(
                    $success                        ,
                    $method_and_args['instance']
                    ) ;

        // ---------------------------------------------------------------------

    } elseif ( $method_and_args['method'] === 'function' ) {

        // =====================================================================
        // METHOD = FUNCTION
        // =====================================================================

        // ---------------------------------------------------------------------
        // This seems to be the old version:-
        //
        //      $method_and_args = array(
        //          'method'    =>  'function'
        //          'instance'  =>  '<function name, including namespace prefix if used>
        //          'args'      =>  <the extra args (if any), used by this function
        //                      - any PHP value>
        //          )
        //          //  Use the value returned by the specified
        //          //  function.
        //
        // Ab=nd this seems to be the new version:-
        //
        //      $method_and_args = array(
        //          'method'    =>  'function'
        //          'instance'  =>  array(
        //                              'function_name' =>  '<function name, including namespace prefix if used>
        //                              'extra_args'    =>  <the extra args (if any), used by this function
        //                                                  any PHP value>
        //                              )
        //          )
        //          //  Use the value returned by the specified
        //          //  function.
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // "instance" specified ?
        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'instance' , $method_and_args ) ) {

            // -----------------------------------------------------------------

            $msg = <<<EOT
PROBLEM: Bad Zebra Form field definition (no "form_field_value_from" + "instance")
For field:&nbsp; {$zebra_form_field_details['form_field_name']}
Of dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            // -----------------------------------------------------------------

            return array(
                        $failure    ,
                        $msg
                        ) ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // "instance" = non-blank string ?
        // ---------------------------------------------------------------------

        if (    is_string( $method_and_args['instance'] )
                &&
                trim( $method_and_args['instance'] ) !== ''
            ) {

            // -----------------------------------------------------------------
            // OLD VERSION
            // -----------------------------------------------------------------

            $fn = $method_and_args['instance'] ;

            // -----------------------------------------------------------------

            if ( ! \function_exists( $fn ) ) {

                $msg = <<<EOT
PROBLEM: Bad "form_field_value_from" + "instance" (function not found)
For field:&nbsp; {$zebra_form_field_details['form_field_name']}
Of dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                return array(
                            $failure    ,
                            $msg
                            ) ;

            }

            // -----------------------------------------------------------------

            if ( array_key_exists( 'args' , $method_and_args ) ) {
                $extra_args = $method_and_args['args'] ;

            } else {
                $extra_args = array() ;

            }

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------
            // NEW VERSION
            // -----------------------------------------------------------------

            if ( ! is_array( $method_and_args['instance'] ) ) {

                $msg = <<<EOT
PROBLEM: Bad "form_field_value_from" + "instance" (non-blank string or array expected)
For field:&nbsp; {$zebra_form_field_details['form_field_name']}
Of dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                return array(
                            $failure    ,
                            $msg
                            ) ;

            }

            // -----------------------------------------------------------------

            if ( ! array_key_exists( 'function_name' , $method_and_args['instance'] ) ) {

                $msg = <<<EOT
PROBLEM: Bad "form_field_value_from" + "instance" (no "function_name")
For field:&nbsp; {$zebra_form_field_details['form_field_name']}
Of dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                return array(
                            $failure    ,
                            $msg
                            ) ;

            }

            // -----------------------------------------------------------------

            $fn = $method_and_args['instance']['function_name'] ;

            // -----------------------------------------------------------------

            if ( ! \function_exists( $fn ) ) {

                $msg = <<<EOT
PROBLEM: Bad "form_field_value_from" + "instance" + "function_name" (function not found)
For field:&nbsp; {$zebra_form_field_details['form_field_name']}
Of dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                return array(
                            $failure    ,
                            $msg
                            ) ;

            }

            // -----------------------------------------------------------------

            if ( array_key_exists( 'extra_args' , $method_and_args['instance'] ) ) {
                $extra_args = $method_and_args['instance']['extra_args'] ;

            } else {
                $extra_args = array() ;

            }

            // -----------------------------------------------------------------

        }

        // -------------------------------------------------------------------------
        // <get_field_value_function>(
        //      $home_page_title                        ,
        //      $caller_apps_includes_dir               ,
        //      $all_application_dataset_definitions    ,
        //      $dataset_slug                           ,
        //      $selected_datasets_dmdd                 ,
        //      $dataset_title                          ,
        //      $dataset_records                        ,
        //      $record_indices_by_key                  ,
        //      $question_adding                        ,
        //      $zebra_form_field_number                ,
        //      $zebra_form_field_details               ,
        //      $the_record                             ,
        //      $the_records_index                      ,
        //      $array_storage_field_slugs              ,
        //      $extra_args
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // Returns the specified field's value (for display in a Zebra Forms
        // based "add/edit record" form).
        //
        // NOTE!
        // -----
        // $the_record and $the_records_index are both NULL when
        // $question_adding is TRUE
        //
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

        return $fn(
                    $home_page_title                        ,
                    $caller_apps_includes_dir               ,
                    $all_application_dataset_definitions    ,
                    $dataset_slug                           ,
                    $selected_datasets_dmdd                 ,
                    $dataset_title                          ,
                    $dataset_records                        ,
                    $record_indices_by_key                  ,
                    $question_adding                        ,
                    $zebra_form_field_number                ,
                    $zebra_form_field_details               ,
                    $the_record                             ,
                    $the_records_index                      ,
                    $array_storage_field_slugs              ,
                    $extra_args
                    ) ;

        // ---------------------------------------------------------------------

    } else {

        // =====================================================================
        // ERROR
        // =====================================================================

        $msg = <<<EOT
PROBLEM: Unrecognised/unsupported "form_field_value_from" + "{$add_edit}" + "method" - for field# {$zebra_form_field_number}
For field:&nbsp; {$zebra_form_field_details['form_field_name']}
Of dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        // ---------------------------------------------------------------------

        return array(
                    $failure    ,
                    $msg
                    ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

