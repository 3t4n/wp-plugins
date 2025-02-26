<?php

// *****************************************************************************
// DATASET-MANAGER / ADD-EDIT-RECORD_SUBMISSION-HANDLER-SUPPORT.PHP
// (C) 2013 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// get_array_storage_field_value()
// =============================================================================

function get_array_storage_field_value(
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
    ) {

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
    //      array(
    //          'method'    =>  'maintained-programatically'
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

    // =========================================================================
    // Support Routines...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/standard-field-values.php' ) ;

    // =========================================================================
    // Init. the output variables...
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $success = TRUE  ;
    $failure = FALSE ;

    // -------------------------------------------------------------------------

    $question_change = TRUE ;
        //  Override this for field methods that assume the field values
        //  are assigned at "add" time only.

    // -------------------------------------------------------------------------

    if ( $question_adding ) {

        // ---------------------------------------------------------------------

        if ( array_key_exists( 'add' , $array_storage_field_details['array_storage_value_from'] ) ) {

            $value_from_details = $array_storage_field_details['array_storage_value_from']['add'] ;

        } elseif ( array_key_exists( 'add-edit' , $array_storage_field_details['array_storage_value_from'] ) ) {

            $value_from_details = $array_storage_field_details['array_storage_value_from']['add-edit'] ;

        } else {

            $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "array_storage_value_from" (no "add" or "add-edit")
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $failure , $msg ) ;

        }

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        if ( array_key_exists( 'edit' , $array_storage_field_details['array_storage_value_from'] ) ) {

            $value_from_details = $array_storage_field_details['array_storage_value_from']['edit'] ;

        } elseif ( array_key_exists( 'add-edit' , $array_storage_field_details['array_storage_value_from'] ) ) {

            $value_from_details = $array_storage_field_details['array_storage_value_from']['add-edit'] ;

        } else {

            $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "array_storage_value_from" (no "edit" or "add-edit")
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $failure , $msg ) ;

        }

        // ---------------------------------------------------------------------

    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $value_from_details ) ;

    // =========================================================================
    // Processing is "METHOD" dependent...
    // =========================================================================

    if ( $value_from_details['method'] === 'created-server-datetime-utc' ) {

        // =====================================================================
        // $value_from_details = array(
        //      'method'    =>  'created-server-datetime-utc'
        //      //  "instance" and "args", if specified, are IGNORED
        //      )
        // =====================================================================

//      $field_value = time() ;
        $field_value = get_server_datetime_UTC() ;

        // ---------------------------------------------------------------------

        if ( ! $question_adding ) {
            $question_change = FALSE ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $value_from_details['method'] === 'last-modified-server-datetime-utc' ) {

        // =====================================================================
        // $value_from_details = array(
        //      'method'    =>  'last-modified-server-datetime-utc'
        //      //  "instance" and "args", if specified, are IGNORED
        //      )
        // =====================================================================

//      $field_value = time() ;
        $field_value = get_server_datetime_UTC() ;

        // ---------------------------------------------------------------------

    } elseif ( $value_from_details['method'] === 'created-server-micro-datetime-utc' ) {

        // =====================================================================
        // $value_from_details = array(
        //      'method'    =>  'created-server-micro-datetime-utc'
        //      //  "instance" and "args", if specified, are IGNORED
        //      )
        // =====================================================================

        // ---------------------------------------------------------------------
        // NOTE!
        // -----
        // "Micro" dates/times are expressed as floats like (eg):-
        //
        //      12.34 = 12 seconds and 340 microseconds
        //
        // "micro" = 1 millionth
        // ---------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // mixed microtime ([ bool $get_as_float = false ] )
        // - - - - - - - - - - - - - - - - - - - - - - - - -
        // microtime() returns the current Unix timestamp with microseconds. This
        // function is only available on operating systems that support the
        // gettimeofday() system call.
        //
        //      get_as_float
        //          If used and set to TRUE, microtime() will return a float instead
        //          of a string, as described in the return values section below.
        //
        // By default, microtime() returns a string in the form "msec sec", where
        // sec is the number of seconds since the Unix epoch (0:00:00 January 1,1970
        // GMT), and msec measures microseconds that have elapsed since sec and is
        // also expressed in seconds.
        //
        // If get_as_float is set to TRUE, then microtime() returns a float, which
        // represents the current time in seconds since the Unix epoch accurate to
        // the nearest microsecond.
        //
        // (PHP 4, PHP 5)
        //
        // CHANGELOG
        //      Version     Description
        //      5.0.0       The get_as_float parameter was added.
        // -------------------------------------------------------------------------

//      if ( function_exists( 'microtime' ) ) {
//          list( $usec , $sec ) = explode( chr(32) , microtime() ) ;
//          $field_value = (float) $usec + (float) $sec ;
//              //  Getting the microtime() as float this way works in both
//              //  PHP 4 and 5.
//
//      } else {
//          $field_value = (float) time() ;
//
//      }

        // ---------------------------------------------------------------------

        $field_value = get_server_micro_datetime_UTC() ;

        // ---------------------------------------------------------------------

        if ( ! $question_adding ) {
            $question_change = FALSE ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $value_from_details['method'] === 'last-modified-server-micro-datetime-utc' ) {

        // =====================================================================
        // $value_from_details = array(
        //      'method'    =>  'last-modified-server-micro-datetime-utc'
        //      //  "instance" and "args", if specified, are IGNORED
        //      )
        // =====================================================================

        // ---------------------------------------------------------------------
        // NOTE!
        // -----
        // "Micro" dates/times are expressed as floats like (eg):-
        //
        //      12.34 = 12 seconds and 340 microseconds
        //
        // "micro" = 1 millionth
        // ---------------------------------------------------------------------

//      if ( function_exists( 'microtime' ) ) {
//          list( $usec , $sec ) = explode( chr(32) , microtime() ) ;
//          $field_value = (float) $usec + (float) $sec ;
//              //  Getting the microtime() as float this way works in both
//              //  PHP 4 and 5.
//
//      } else {
//          $field_value = (float) time() ;
//
//      }

        // ---------------------------------------------------------------------

        $field_value = get_server_micro_datetime_UTC() ;

        // ---------------------------------------------------------------------

    } elseif ( $value_from_details['method'] === 'unique-key' ) {

        // =====================================================================
        // $value_from_details = array(
        //      'method'    =>  'unique-key'
        //      //  "instance" and "args", if specified, are IGNORED
        //      )
        // =====================================================================

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_unique_record_key_for_dataset(
        //      $record_indices_by_key
        //      )
        // - - - - - - - - - - - - - - - - -
        // RETURNS
        //      o   On SUCCESS
        //              $record_key STRING
        //
        //      o   On FAILURE
        //              ARRAY( $error_message STRING )
        // -------------------------------------------------------------------------

        $field_value =  get_unique_record_key_for_dataset(
                            $record_indices_by_key
                            ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $field_value ) ) {

            return array(
                        $failure            ,
                        $field_value[0]
                        ) ;

        }

        // ---------------------------------------------------------------------

        if ( ! $question_adding ) {
            $question_change = FALSE ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $value_from_details['method'] === 'literal' ) {

        // =====================================================================
        // $value_from_details = array(
        //      'method'    =>  'literal'                   ,
        //      'instance'  =>  <any-PHP-scalar- value>
        //      //  "args", if specified, is IGNORED
        //      )
        // =====================================================================

        if ( ! isset( $value_from_details['instance'] ) ) {

            $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "array_storage_value_from" (method "literal" requires "instance")
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $failure , $msg ) ;

        }

        // ---------------------------------------------------------------------

        if ( ! is_scalar( $value_from_details['instance'] ) ) {

            $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "array_storage_value_from" + "instance" (scalar value - INT, STRING, BOOL or FLOAT - expected)
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $failure , $msg ) ;

        }

        // ---------------------------------------------------------------------

        $field_value = $value_from_details['instance'] ;

        // ---------------------------------------------------------------------

    } elseif ( $value_from_details['method'] === 'get' ) {

        // =====================================================================
        // $value_from_details = array(
        //      'method'    =>  'get'               ,
        //      'instance'  =>  '<get-var-name>'
        //      //  If "instance" is unspecified - or is anything but a
        //      //  non-empty string, then '<get-var-name>' defaults to
        //      //  the field's "slug"
        //      //  "args", if specified, is IGNORED
        //      )
        // =====================================================================

        // ---------------------------------------------------------------------
        // NOTE!
        // =====
        // CHECKBOX fields are a special case.  They WON'T be submitted - and
        // placed into $_GET or $_POST (acc. to the form METHOD) - unless the
        // checkbox is CHECKED.
        //
        // Hence we must detect this - and default the field value to TRUE or
        // FALSE accordingly...
        // ---------------------------------------------------------------------

        if ( count( $zebra_form_field_indices_of_checkbox_type_zebra_form_fields ) > 0 ) {

            // -------------------------------------------------------------------------
            // is_array_storage_field_a_checkbox_type_field(
            //      $selected_datasets_dmdd                                         ,
            //      $zebra_form_definition                                          ,
            //      $dataset_slug                                                   ,
            //      $dataset_title                                                  ,
            //      $array_storage_field_details                                    ,
            //      $zebra_form_field_indices_of_checkbox_type_zebra_form_fields    ,
            //      $get_post                                                       ,
            //      $value_from_details
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
            // RETURNS
            //      o   On SUCCESS!
            //              array(
            //                  $question_checkbox_type_field BOOL          ,
            //                  $expected_checkbox_value STRING or NULL
            //                  )
            //
            //      o   On FAILURE!
            //              $error_message STRING
            // -------------------------------------------------------------------------

            $get_post = 'get' ;

            $result = is_array_storage_field_a_checkbox_type_field(
                            $selected_datasets_dmdd                                         ,
                            $zebra_form_definition                                          ,
                            $dataset_slug                                                   ,
                            $dataset_title                                                  ,
                            $array_storage_field_details                                    ,
                            $zebra_form_field_indices_of_checkbox_type_zebra_form_fields    ,
                            $get_post                                                       ,
                            $value_from_details
                            ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return array( $failure , $result ) ;
            }

            // -----------------------------------------------------------------

            list(
                $question_checkbox_type_field   ,
                $expected_checkbox_value
                ) = $result ;

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            $question_checkbox_type_field = FALSE ;
            $expected_checkbox_value      = NULL  ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // NOTE!
        // =====
        // RADIO fields are a special case.  They WON'T be submitted - and
        // placed into $_GET or $_POST (acc. to the form METHOD) - unless one
        // radio in the group (of radios with the name name) is CHECKED.
        //
        // Hence we must detect this - and default the field value to it's
        // default accordingly...
        // ---------------------------------------------------------------------

        if ( count( $zebra_form_field_indices_of_radios_type_zebra_form_fields ) > 0 ) {

            // -------------------------------------------------------------------------
            // is_array_storage_field_a_radios_type_field(
            //      $selected_datasets_dmdd                                         ,
            //      $zebra_form_definition                                          ,
            //      $dataset_slug                                                   ,
            //      $dataset_title                                                  ,
            //      $array_storage_field_details                                    ,
            //      $zebra_form_field_indices_of_radios_type_zebra_form_fields      ,
            //      $get_post                                                       ,
            //      $value_from_details
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
            // RETURNS
            //      o   On SUCCESS!
            //          - - - - - -
            //          TRUE or FALSE
            //
            //      o   On FAILURE!
            //          $error_message STRING
            // -------------------------------------------------------------------------

            $get_post = 'get' ;

            $question_radios_type_field = is_array_storage_field_a_radios_type_field(
                                                $selected_datasets_dmdd                                         ,
                                                $zebra_form_definition                                          ,
                                                $dataset_slug                                                   ,
                                                $dataset_title                                                  ,
                                                $array_storage_field_details                                    ,
                                                $zebra_form_field_indices_of_radios_type_zebra_form_fields      ,
                                                $get_post                                                       ,
                                                $value_from_details
                                                ) ;

            // -----------------------------------------------------------------

            if ( is_string( $question_radios_type_field ) ) {
                return array( $failure , $question_radios_type_field ) ;
            }

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            $question_radios_type_field = FALSE ;

            // -----------------------------------------------------------------

        }

        // -------------------------------------------------------------------------
        // get_slash_check_get_post_server_or_cookie_field_value(
        //      $dataset_title                  ,
        //      $array_storage_field_details    ,
        //      $_WHATEVER                      ,
        //      $whatever                       ,
        //      $adding_editing                 ,
        //      $question_checkbox_type_field   ,
        //      $question_radios_type_field     ,
        //      $expected_checkbox_value        ,
        //      $value_from_details
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // NOTE!
        // =====
        // The returned CHECKBOX type field values are TRUE or FALSE.
        // All other returned field values are STRINGS.
        //
        // RETURNS
        //      o   On SUCCESS!
        //          - - - - - -
        //          $field_value (BOOL or STRING)
        //
        //      o   On FAILURE!
        //          - - - - - -
        //          array( $error_message STRING )
        // -------------------------------------------------------------------------

        $field_value = get_slash_check_get_post_server_or_cookie_field_value(
                            $dataset_title                  ,
                            $array_storage_field_details    ,
                            $_GET                           ,
                            'get'                           ,
                            $adding_editing                 ,
                            $question_checkbox_type_field   ,
                            $question_radios_type_field     ,
                            $expected_checkbox_value        ,
                            $value_from_details
                            ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $field_value ) ) {
            return array( $failure , $field_value[0] ) ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $value_from_details['method'] === 'post' ) {

        // =====================================================================
        // $value_from_details = array(
        //      'method'    =>  'post'               ,
        //      'instance'  =>  '<post-var-name>'
        //      //  If "instance" is unspecified - or is anything but a
        //      //  non-empty string, then '<post-var-name>' defaults to
        //      //  the field's "slug"
        //      //  "args", if specified, is IGNORED
        //      )
        // =====================================================================

        // ---------------------------------------------------------------------
        // NOTE!
        // =====
        // CHECKBOX fields are a special case.  They WON'T be submitted - and
        // placed into $_GET or $_POST (acc. to the form METHOD) - unless the
        // checkbox is CHECKED.
        //
        // Hence we must detect this - and default the field value to TRUE or
        // FALSE accordingly...
        // ---------------------------------------------------------------------

        if ( count( $zebra_form_field_indices_of_checkbox_type_zebra_form_fields ) > 0 ) {

            // -------------------------------------------------------------------------
            // is_array_storage_field_a_checkbox_type_field(
            //      $selected_datasets_dmdd                                         ,
            //      $zebra_form_definition                                          ,
            //      $dataset_slug                                                   ,
            //      $dataset_title                                                  ,
            //      $array_storage_field_details                                    ,
            //      $zebra_form_field_indices_of_checkbox_type_zebra_form_fields    ,
            //      $get_post                                                       ,
            //      $value_from_details
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
            // RETURNS
            //      o   On SUCCESS!
            //              array(
            //                  $question_checkbox_type_field BOOL          ,
            //                  $expected_checkbox_value STRING or NULL
            //                  )
            //
            //      o   On FAILURE!
            //              $error_message STRING
            // -------------------------------------------------------------------------

            $get_post = 'post' ;

            $result = is_array_storage_field_a_checkbox_type_field(
                            $selected_datasets_dmdd                                         ,
                            $zebra_form_definition                                          ,
                            $dataset_slug                                                   ,
                            $dataset_title                                                  ,
                            $array_storage_field_details                                    ,
                            $zebra_form_field_indices_of_checkbox_type_zebra_form_fields    ,
                            $get_post                                                       ,
                            $value_from_details
                            ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return array( $failure , $result ) ;
            }

            // -----------------------------------------------------------------

            list(
                $question_checkbox_type_field   ,
                $expected_checkbox_value
                ) = $result ;

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            $question_checkbox_type_field = FALSE ;
            $expected_checkbox_value      = NULL  ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // NOTE!
        // =====
        // RADIO fields are a special case.  They WON'T be submitted - and
        // placed into $_GET or $_POST (acc. to the form METHOD) - unless one
        // radio in the group (of radios with the name name) is CHECKED.
        //
        // Hence we must detect this - and default the field value to it's
        // default accordingly...
        // ---------------------------------------------------------------------

        if ( count( $zebra_form_field_indices_of_radios_type_zebra_form_fields ) > 0 ) {

            // -------------------------------------------------------------------------
            // is_array_storage_field_a_radios_type_field(
            //      $selected_datasets_dmdd                                         ,
            //      $zebra_form_definition                                          ,
            //      $dataset_slug                                                   ,
            //      $dataset_title                                                  ,
            //      $array_storage_field_details                                    ,
            //      $zebra_form_field_indices_of_radios_type_zebra_form_fields      ,
            //      $get_post                                                       ,
            //      $value_from_details
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
            // RETURNS
            //      o   On SUCCESS!
            //          - - - - - -
            //          TRUE or FALSE
            //
            //      o   On FAILURE!
            //          $error_message STRING
            // -------------------------------------------------------------------------

            $get_post = 'post' ;

            $question_radios_type_field = is_array_storage_field_a_radios_type_field(
                                                $selected_datasets_dmdd                                         ,
                                                $zebra_form_definition                                          ,
                                                $dataset_slug                                                   ,
                                                $dataset_title                                                  ,
                                                $array_storage_field_details                                    ,
                                                $zebra_form_field_indices_of_radios_type_zebra_form_fields      ,
                                                $get_post                                                       ,
                                                $value_from_details
                                                ) ;

            // -----------------------------------------------------------------

            if ( is_string( $question_radios_type_field ) ) {
                return array( $failure , $question_radios_type_field ) ;
            }

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            $question_radios_type_field = FALSE ;

            // -----------------------------------------------------------------

        }

        // -------------------------------------------------------------------------
        // get_slash_check_get_post_server_or_cookie_field_value(
        //      $dataset_title                  ,
        //      $array_storage_field_details    ,
        //      $_WHATEVER                      ,
        //      $whatever                       ,
        //      $adding_editing                 ,
        //      $question_checkbox_type_field   ,
        //      $question_radios_type_field     ,
        //      $expected_checkbox_value        ,
        //      $value_from_details
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // NOTE!
        // =====
        // The returned CHECKBOX type field values are TRUE or FALSE.
        // All other returned field values are STRINGS.
        //
        // RETURNS
        //      o   On SUCCESS!
        //          - - - - - -
        //          $field_value (BOOL or STRING)
        //
        //      o   On FAILURE!
        //          - - - - - -
        //          array( $error_message STRING )
        // -------------------------------------------------------------------------

        $field_value = get_slash_check_get_post_server_or_cookie_field_value(
                            $dataset_title                  ,
                            $array_storage_field_details    ,
                            $_POST                          ,
                            'post'                          ,
                            $adding_editing                 ,
                            $question_checkbox_type_field   ,
                            $question_radios_type_field     ,
                            $expected_checkbox_value        ,
                            $value_from_details
                            ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $field_value ) ) {
            return array( $failure , $field_value[0] ) ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $value_from_details['method'] === 'server' ) {

        // =====================================================================
        // $value_from_details = array(
        //      'method'    =>  'server'               ,
        //      'instance'  =>  '<server-var-name>'
        //      //  If "instance" is unspecified - or is anything but a
        //      //  non-empty string, then '<server-var-name>' defaults to
        //      //  the field's "slug"
        //      //  "args", if specified, is IGNORED
        //      )
        // =====================================================================

        // -------------------------------------------------------------------------
        // get_slash_check_get_post_server_or_cookie_field_value(
        //      $dataset_title                  ,
        //      $array_storage_field_details    ,
        //      $_WHATEVER                      ,
        //      $whatever                       ,
        //      $adding_editing                 ,
        //      $question_checkbox_type_field   ,
        //      $question_radios_type_field     ,
        //      $value_from_details
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // NOTE!
        // =====
        // The returned CHECKBOX type field values are TRUE or FALSE.
        // All other returned field values are STRINGS.
        //
        // RETURNS
        //      o   On SUCCESS!
        //          - - - - - -
        //          $field_value (BOOL or STRING)
        //
        //      o   On FAILURE!
        //          - - - - - -
        //          array( $error_message STRING )
        // -------------------------------------------------------------------------

        $question_checkbox_type_field = FALSE ;
        $question_radios_type_field   = FALSE ;
        $expected_checkbox_value      = NULL  ;

        // ---------------------------------------------------------------------

        $field_value = get_slash_check_get_post_server_or_cookie_field_value(
                            $dataset_title                  ,
                            $array_storage_field_details    ,
                            $_SERVER                        ,
                            'server'                        ,
                            $adding_editing                 ,
                            $question_checkbox_type_field   ,
                            $question_radios_type_field     ,
                            $expected_checkbox_value        ,
                            $value_from_details
                            ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $field_value ) ) {
            return array( $failure , $field_value[0] ) ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $value_from_details['method'] === 'cookie' ) {

        // =====================================================================
        // $value_from_details = array(
        //      'method'    =>  'cookie'               ,
        //      'instance'  =>  '<cookie-var-name>'
        //      //  If "instance" is unspecified - or is anything but a
        //      //  non-empty string, then '<cookie-var-name>' defaults to
        //      //  the field's "slug"
        //      //  "args", if specified, is IGNORED
        //      )
        // =====================================================================

        // -------------------------------------------------------------------------
        // get_slash_check_get_post_server_or_cookie_field_value(
        //      $dataset_title                  ,
        //      $array_storage_field_details    ,
        //      $_WHATEVER                      ,
        //      $whatever                       ,
        //      $adding_editing                 ,
        //      $question_checkbox_type_field   ,
        //      $question_radios_type_field     ,
        //      $value_from_details
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // NOTE!
        // =====
        // The returned CHECKBOX type field values are TRUE or FALSE.
        // All other returned field values are STRINGS.
        //
        // RETURNS
        //      o   On SUCCESS!
        //          - - - - - -
        //          $field_value (BOOL or STRING)
        //
        //      o   On FAILURE!
        //          - - - - - -
        //          array( $error_message STRING )
        // -------------------------------------------------------------------------

        $question_checkbox_type_field = FALSE ;
        $question_radios_type_field   = FALSE ;
        $expected_checkbox_value      = NULL  ;

        // ---------------------------------------------------------------------

        $field_value = get_slash_check_get_post_server_or_cookie_field_value(
                            $dataset_title                  ,
                            $array_storage_field_details    ,
                            $_COOKIE                        ,
                            'cookie'                        ,
                            $adding_editing                 ,
                            $question_checkbox_type_field   ,
                            $question_radios_type_field     ,
                            $expected_checkbox_value        ,
                            $value_from_details
                            ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $field_value ) ) {
            return array( $failure , $field_value[0] ) ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $value_from_details['method'] === 'function' ) {

        // =====================================================================
        // $value_from_details = array(
        //      'method'    =>  'function'                                          ,
        //      'instance'  =>  '<function-name-including-namespace-if-necessary>'  ,
        //      'args'      =>  <any-PHP-value>
        //      )
        // =====================================================================

        if ( ! isset( $value_from_details['instance'] ) ) {

            $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "array_storage_value_from" (method "function" requires "instance")
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $failure , $msg ) ;

        }

        // ---------------------------------------------------------------------

        if (    ! is_string( $value_from_details['instance'] )
                ||
                trim( $value_from_details['instance'] ) === ''
                ||
                ! ctype_graph( $value_from_details['instance'] )
                ||
                strlen( $value_from_details['instance'] ) > 255
            ) {

            $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "array_storage_value_from" + "instance" (1 to 255 character function name - with optional namespace prefix - expected)
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $failure , $msg ) ;

        }

        // ---------------------------------------------------------------------

        if ( ! function_exists( $value_from_details['instance'] ) ) {

            $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "array_storage_value_from" + "instance" (function not found)
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $failure , $msg ) ;

        }

        // ---------------------------------------------------------------------

        if ( isset( $value_from_details['args'] ) ) {
            $extra_args = $value_from_details['args'] ;

        } else {
            $extra_args = NULL ;

        }

        // ---------------------------------------------------------------------
        // Array Storage Get Field Value Function
        // - - - - - - - - - - - - - - - - - - -
        // Is like:-
        //
        //      $field_value = $value_from_details['instance'](
        //                          $dataset_manager_home_page_title        ,
        //                          $caller_apps_includes_dir               ,
        //                          $all_application_dataset_definitions    ,
        //                          $dataset_slug                           ,
        //                          $selected_datasets_dmdd                 ,
        //                          $dataset_title                          ,
        //                          $dataset_records                        ,
        //                          $record_indices_by_key                  ,
        //                          $key_field_slug                         ,
        //                          $question_adding                        ,
        //                          $array_storage_field_slug               ,
        //                          $extra_args
        //                          )
        //
        // RETURNS
        //      o   On SUCCESS!
        //          - - - - - -
        //          array( $field_value )
        //          Where $field_value can be any PHP data type
        //
        //      o   On FAILURE!
        //          - - - - - -
        //          $error_message STRING
        // ---------------------------------------------------------------------

        $result = $value_from_details['instance'](
                        $dataset_manager_home_page_title        ,
                        $caller_apps_includes_dir               ,
                        $all_application_dataset_definitions    ,
                        $dataset_slug                           ,
                        $selected_datasets_dmdd                 ,
                        $dataset_title                          ,
                        $dataset_records                        ,
                        $record_indices_by_key                  ,
                        $key_field_slug                         ,
                        $question_adding                        ,
                        $array_storage_field_details['slug']    ,
                        $extra_args
                        ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return array( $failure , $result ) ;
        }

        // ---------------------------------------------------------------------

        $field_value = $result[0] ;

        // ---------------------------------------------------------------------

    } elseif ( $value_from_details['method'] === 'from-default-record' ) {

        // =====================================================================
        // $value_from_details = array(
        //      'method'    =>  'from-default-record'           ,
        //      'instance'  =>  '<array-storage-field-slug>'
        //      )
        // =====================================================================

        if ( ! $question_adding ) {

            $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "array_storage_value_from" (method "from-default-record" only allowed when ADDING a new record)
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $failure , $msg ) ;

        }

        // ---------------------------------------------------------------------

        if ( ! is_array( $new_record_default_data ) ) {

            $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; No default new record (array expected)
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $failure , $msg ) ;

        }

        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'instance' , $value_from_details ) ) {

            $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "array_storage_value_from" (method "from-default-record" requires "instance")
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $failure , $msg ) ;

        }

        // ---------------------------------------------------------------------

        if (    ! is_string( $value_from_details['instance'] )
                ||
                trim( $value_from_details['instance'] ) === ''
            ) {

            $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "array_storage_value_from" + "instance" (non-empty field name string expected)
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $failure , $msg ) ;

        }

        // ---------------------------------------------------------------------

        if ( ! array_key_exists(
                    $value_from_details['instance']     ,
                    $new_record_default_data
                    )
            ) {

            $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "array_storage_value_from" + "instance" (no such field in default record)
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $failure , $msg ) ;

        }

        // ---------------------------------------------------------------------

        $field_value = $new_record_default_data[ $value_from_details['instance'] ] ;

        // ---------------------------------------------------------------------

    } elseif ( $value_from_details['method'] === 'dont-change' ) {

        // =====================================================================
        // $value_from_details = array(
        //      'method'    =>  'dont-change'
        //      )
        // =====================================================================

        if ( $question_adding ) {

            $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "array_storage_value_from" (method "dont-change" only allowed when EDITING an existing record)
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $failure , $msg ) ;

        }

        // ---------------------------------------------------------------------

        $field_value = NULL ;
            //  Ignored (because $question_change, see below, is FALSE)

        // ---------------------------------------------------------------------

        $question_change = FALSE ;

        // ---------------------------------------------------------------------

    } elseif ( $value_from_details['method'] === 'maintained-programatically' ) {

        // =====================================================================
        // $value_from_details = array(
        //      'method'    =>  'maintained-programatically'
        //      )
        // =====================================================================

        $field_value = NULL ;
            //  Ignored (because $question_change, see below, is FALSE)

        // ---------------------------------------------------------------------

        $question_change = FALSE ;

        // ---------------------------------------------------------------------

    } else {

        // =====================================================================
        // ERROR!
        // =====================================================================

        $field_type = htmlentities( $value_from_details['method'] ) ;

        $msg = <<<EOT
PROBLEM Adding Dataset Record:&nbsp; Unrecognised/unsupported "array_storage_record_structure" + "array_storage_value_from" + "method" ("{$field_type}")
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        return array( $failure , $msg ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return array( $success , $field_value , $question_change ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_slash_check_get_post_server_or_cookie_field_value()
// =============================================================================

function get_slash_check_get_post_server_or_cookie_field_value(
    $dataset_title                  ,
    $array_storage_field_details    ,
    $_WHATEVER                      ,
    $whatever                       ,
    $adding_editing                 ,
    $question_checkbox_type_field   ,
    $question_radios_type_field     ,
    $expected_checkbox_value        ,
    $value_from_details
    ) {

    // -------------------------------------------------------------------------
    // get_slash_check_get_post_server_or_cookie_field_value(
    //      $dataset_title                  ,
    //      $array_storage_field_details    ,
    //      $_WHATEVER                      ,
    //      $whatever                       ,
    //      $adding_editing                 ,
    //      $question_checkbox_type_field   ,
    //      $question_radios_type_field     ,
    //      $expected_checkbox_value        ,
    //      $value_from_details
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // NOTE!
    // =====
    // The returned CHECKBOX type field values are TRUE or FALSE.
    // All other returned field values are STRINGS.
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          $field_value (BOOL or STRING)
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          array( $error_message STRING )
    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    if ( ! isset( $value_from_details['instance'] ) ) {

        $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "array_storage_value_from" (method "{$whatever}" requires "instance")
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        return array( $msg ) ;

    }

    // -------------------------------------------------------------------------

    if (    ! is_string( $value_from_details['instance'] )
            ||
            trim( $value_from_details['instance'] ) === ''
            ||
            ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_varname( $value_from_details['instance'] )
            ||
            strlen( $value_from_details['instance'] ) > 64
        ) {

        $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "array_storage_value_from" + "instance" (1 to 64 character variable name like string expected)
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        return array( $msg ) ;

    }

    // -------------------------------------------------------------------------

    if ( ! array_key_exists(
                $value_from_details['instance']    ,
                $_WHATEVER
                )
        ) {

        // ---------------------------------------------------------------------

        if ( $question_checkbox_type_field ) {
            return FALSE ;
            //  A CHECKBOX field that's NOT present in the submitted form is a
            //  checkbox that ISN'T ticked.
            //
            //  And is stored as field value FALSE in the ARRAY storage
            //  record.

        }

        // ---------------------------------------------------------------------

        if ( $question_radios_type_field ) {

            // -----------------------------------------------------------------

            if ( ! array_key_exists( 'default' , $value_from_details ) ) {

                $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "array_storage_value_from" (no "default" specified for "radios" type field)
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                return array( $msg ) ;

            }

            // -----------------------------------------------------------------

            if ( ! is_string( $value_from_details['default'] ) ) {

                $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "array_storage_value_from" + "default" (string expected)
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                return array( $msg ) ;

            }

            // -----------------------------------------------------------------

            return $value_from_details['default'] ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        $instance = htmlentities( $value_from_details['instance'] ) ;

        $whatever_uc = strtoupper( $whatever ) ;

        $msg = <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "array_storage_value_from" + "instance" (no {$whatever_uc} variable named "{$instance}")
For dataset:&nbsp; "{$dataset_title}"
and field (slug):&nbsp; "{$array_storage_field_details['slug']}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        return array( $msg ) ;

    }

    // -------------------------------------------------------------------------

    if ( $question_checkbox_type_field ) {

        // ---------------------------------------------------------------------

        if ( $_WHATEVER[ $value_from_details['instance'] ] !== $expected_checkbox_value ) {

            $safe_whatever_field_name = htmlentities( $value_from_details['instance'] ) ;

            $msg = <<<EOT
PROBLEM:&nbsp; Unexpected checkbox field value
For dataset:&nbsp; "{$dataset_title}"
and field:&nbsp; "{$safe_whatever_field_name}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        return TRUE ;
            //  A CHECKBOX field that IS present in the submitted form is a
            //  checkbox that IS ticked.
            //
            //  And is stored as field value TRUE in the ARRAY storage
            //  record.

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $field_value = $_WHATEVER[ $value_from_details['instance'] ] ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wordpressMagicQuotes\
    // question_magic_quotes_gpc()
    // - - - - - - - - - - - - - -
    // RETURNS
    //      o   TRUE if $_GET, $_POST and $_COOKIE values have had
    //          "addslashes()" done to them (and thus, need to be run
    //          through "stripslashes()" before use).
    //      o   FALSE otherwise.
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wordpressMagicQuotes\
    // question_magic_quotes_server()
    // - - - - - - - - - - - - - - -
    // RETURNS
    //      o   TRUE if $_SERVER values have had "addslashes()" done to them
    //          (and thus, need to be run through "stripslashes()" before use).
    //      o   FALSE otherwise.
    // -------------------------------------------------------------------------

    if (    in_array( $whatever , array( 'get' , 'post' , 'cookie' ) , TRUE )
            &&
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wordpressMagicQuotes\question_magic_quotes_gpc()
        ) {
        return \stripslashes( $field_value ) ;

    } elseif (  $whatever === 'server'
                &&
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wordpressMagicQuotes\question_magic_quotes_server()
        ) {
        return \stripslashes( $field_value ) ;

    }

    // -------------------------------------------------------------------------

    return $field_value ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// is_array_storage_field_a_checkbox_type_field()
// =============================================================================

/*
function is_array_storage_field_a_checkbox_type_field(
    $selected_datasets_dmdd                                         ,
    $zebra_form_definition                                          ,
    $dataset_slug                                                   ,
    $dataset_title                                                  ,
    $array_storage_field_details                                    ,
    $zebra_form_field_indices_of_checkbox_type_zebra_form_fields    ,
    $get_post                                                       ,
    $value_from_details
    ) {

    // -------------------------------------------------------------------------
    // is_array_storage_field_a_checkbox_type_field(
    //      $selected_datasets_dmdd                                         ,
    //      $zebra_form_definition                                          ,
    //      $dataset_slug                                                   ,
    //      $dataset_title                                                  ,
    //      $array_storage_field_details                                    ,
    //      $zebra_form_field_indices_of_checkbox_type_zebra_form_fields    ,
    //      $get_post                                                       ,
    //      $value_from_details
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          TRUE or FALSE
    //
    //      o   On FAILURE!
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $selected_datasets_dmdd = array(
    //
    //          ...
    //
    //          ['array_storage_record_structure'] => array(
    //
    //              array(
    //                  'slug'          =>  'created_server_micro_datetime_UTC'      ,
    //                  'array_storage_value_from'    =>  array(
    //                                          'method'    =>  'created-server-micro-datetime-utc'
    //                                          )   ,
    //                  'constraints'   =>  array(
    //                                          array(
    //                                              'method'    =>  'unix-timestamp-with-microseconds'
    //                                              )
    //                                          )
    //                  )   ,
    //
    //              ...
    //
    //              array(
    //                  'slug'          =>  'key'       ,
    //                  'array_storage_value_from'    =>  array(
    //                                          'method'    =>  'unique-key'
    //                                          )   ,
    //                  'constraints'   =>  array(
    //                                          array(
    //                                              'method'    =>  'unique-key'
    //                                              )
    //                                          )
    //                  )   ,
    //
    //              array(
    //                  'slug'          =>  'pathspec'                      ,
    //                  'array_storage_value_from'    =>  array(
    //                                          'method'    =>  'post'          ,
    //                                          'instance'  =>  'pathspec'
    //                                          )   ,
    //                  'constraints'   =>  array()
    //                  )   ,
    //
    //              ...
    //
    //              )   ,
    //
    //          ...
    //
    //          ['zebra_form'] => array(
    //
    //              'form_specs'    =>  array(
    //                                      'name'                      =>  'add_edit_plugin_component'     ,
    //                                      'method'                    =>  'POST'                          ,
    //                                      'action'                    =>  ''                              ,
    //                                      'attributes'                =>  array()                         ,
    //                                      'clientside_validation'     =>  TRUE
    //                                      )   ,
    //
    //              'field_specs'   =>  array(
    //
    //                  array(
    //                      'form_field_name'       =>  'pathspec'          ,
    //                      'zebra_control_type'    =>  'text'              ,
    //                      'label'                 =>  'Pathspec'          ,
    //                      'attributes'            =>  array()             ,
    //                      'rules'                 =>  array(
    //                          'required'  =>  array(
    //                                              'error'             ,   // variable to add the error message to
    //                                              'Field is required'     // error message if value doesn't validate
    //                                              )
    //                          )
    //                      )   ,
    //
    //                  array(
    //                      'form_field_name'       =>  'save_me'       ,
    //                      'zebra_control_type'    =>  'submit'        ,
    //                      'label'                 =>  NULL            ,
    //                      'attributes'            =>  array()         ,
    //                      'rules'                 =>  array()         ,
    //                      'type_specific_args'    =>  array(
    //                          'caption'   =>  'Submit'
    //                          )
    //                      )   ,
    //
    //                  )   ,
    //
    //              'focus_field_slug'  =>  'pathspec'
    //
    //              )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//pr( func_get_args() ) ;

//pr( $selected_datasets_dmdd['array_storage_record_structure'] ) ;

//pr( $selected_datasets_dmdd['zebra_forms'][ $form_slug_underscored ]['field_specs'] ) ;

//pr( $array_storage_field_details ) ;

//exit() ;

    // -------------------------------------------------------------------------

    $target_form_field_name_from_instance = NULL ;

    if (    isset( $value_from_details )
            &&
            isset( $value_from_details['method'] )
            &&
            strtolower( $value_from_details['method'] ) === strtolower( $get_post )
            &&
            isset( $value_from_details['instance'] )
            &&
            is_string( $value_from_details['instance'] )
            &&
            trim( $value_from_details['instance'] ) !== ''
            &&
            strlen( $value_from_details['instance'] ) <= 64
            &&
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_varname( $value_from_details['instance'] )
        ) {
        $target_form_field_name_from_instance = $value_from_details['instance'] ;
    }

    // -------------------------------------------------------------------------

    $target_form_field_name_from_slug = NULL ;

    if (    isset( $array_storage_field_details['slug'] )
            &&
            is_string( $array_storage_field_details['slug'] )
            &&
            trim( $array_storage_field_details['slug'] ) !== ''
            &&
            strlen( $array_storage_field_details['slug'] ) <= 64
            &&
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_varname( $array_storage_field_details['slug'] )
        ) {
        $target_form_field_name_from_slug = $array_storage_field_details['slug'] ;
    }

    // -------------------------------------------------------------------------

    foreach ( $zebra_form_field_indices_of_checkbox_type_zebra_form_fields as $zebra_form_field_index ) {

        // ---------------------------------------------------------------------

        $zebra_form_field_details = $zebra_form_definition['field_specs'][ $zebra_form_field_index ] ;

        // ---------------------------------------------------------------------

        if (    isset( $zebra_form_field_details['form_field_name'] )
                &&
                is_string( $zebra_form_field_details['form_field_name'] )
            ) {

            // -----------------------------------------------------------------

            if (    $zebra_form_field_details['form_field_name'] === $target_form_field_name_from_instance
                    ||
                    $zebra_form_field_details['form_field_name'] === $target_form_field_name_from_slug
                ) {
                return TRUE ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    return FALSE ;

    // -------------------------------------------------------------------------

}
*/

// =============================================================================
// is_array_storage_field_a_checkbox_type_field()
// =============================================================================

function is_array_storage_field_a_checkbox_type_field(
    $selected_datasets_dmdd                                         ,
    $zebra_form_definition                                          ,
    $dataset_slug                                                   ,
    $dataset_title                                                  ,
    $array_storage_field_details                                    ,
    $zebra_form_field_indices_of_checkbox_type_zebra_form_fields    ,
    $get_post                                                       ,
    $value_from_details
    ) {

    // -------------------------------------------------------------------------
    // is_array_storage_field_a_checkbox_type_field(
    //      $selected_datasets_dmdd                                         ,
    //      $zebra_form_definition                                          ,
    //      $dataset_slug                                                   ,
    //      $dataset_title                                                  ,
    //      $array_storage_field_details                                    ,
    //      $zebra_form_field_indices_of_checkbox_type_zebra_form_fields    ,
    //      $get_post                                                       ,
    //      $value_from_details
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      o   On SUCCESS!
    //              array(
    //                  $question_checkbox_type_field BOOL          ,
    //                  $expected_checkbox_value STRING or NULL
    //                  )
    //
    //      o   On FAILURE!
    //              $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $selected_datasets_dmdd = array(
    //
    //          ...
    //
    //          ['array_storage_record_structure'] => array(
    //
    //              array(
    //                  'slug'          =>  'created_server_micro_datetime_UTC'      ,
    //                  'array_storage_value_from'    =>  array(
    //                                          'method'    =>  'created-server-micro-datetime-utc'
    //                                          )   ,
    //                  'constraints'   =>  array(
    //                                          array(
    //                                              'method'    =>  'unix-timestamp-with-microseconds'
    //                                              )
    //                                          )
    //                  )   ,
    //
    //              ...
    //
    //              array(
    //                  'slug'          =>  'key'       ,
    //                  'array_storage_value_from'    =>  array(
    //                                          'method'    =>  'unique-key'
    //                                          )   ,
    //                  'constraints'   =>  array(
    //                                          array(
    //                                              'method'    =>  'unique-key'
    //                                              )
    //                                          )
    //                  )   ,
    //
    //              array(
    //                  'slug'          =>  'pathspec'                      ,
    //                  'array_storage_value_from'    =>  array(
    //                                          'method'    =>  'post'          ,
    //                                          'instance'  =>  'pathspec'
    //                                          )   ,
    //                  'constraints'   =>  array()
    //                  )   ,
    //
    //              ...
    //
    //              )   ,
    //
    //          ...
    //
    //          ['zebra_form'] => array(
    //
    //              'form_specs'    =>  array(
    //                                      'name'                      =>  'add_edit_plugin_component'     ,
    //                                      'method'                    =>  'POST'                          ,
    //                                      'action'                    =>  ''                              ,
    //                                      'attributes'                =>  array()                         ,
    //                                      'clientside_validation'     =>  TRUE
    //                                      )   ,
    //
    //              'field_specs'   =>  array(
    //
    //                  array(
    //                      'form_field_name'       =>  'pathspec'          ,
    //                      'zebra_control_type'    =>  'text'              ,
    //                      'label'                 =>  'Pathspec'          ,
    //                      'attributes'            =>  array()             ,
    //                      'rules'                 =>  array(
    //                          'required'  =>  array(
    //                                              'error'             ,   // variable to add the error message to
    //                                              'Field is required'     // error message if value doesn't validate
    //                                              )
    //                          )
    //                      )   ,
    //
    //                  array(
    //                      'form_field_name'       =>  'save_me'       ,
    //                      'zebra_control_type'    =>  'submit'        ,
    //                      'label'                 =>  NULL            ,
    //                      'attributes'            =>  array()         ,
    //                      'rules'                 =>  array()         ,
    //                      'type_specific_args'    =>  array(
    //                          'caption'   =>  'Submit'
    //                          )
    //                      )   ,
    //
    //                  )   ,
    //
    //              'focus_field_slug'  =>  'pathspec'
    //
    //              )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//pr( func_get_args() ) ;

//pr( $selected_datasets_dmdd['array_storage_record_structure'] ) ;

//pr( $selected_datasets_dmdd['zebra_forms'][ $form_slug_underscored ]['field_specs'] ) ;

//pr( $array_storage_field_details ) ;

//exit() ;

    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $target_form_field_name_from_instance = NULL ;

    // -------------------------------------------------------------------------

    if (    isset( $value_from_details )
            &&
            isset( $value_from_details['method'] )
            &&
            strtolower( $value_from_details['method'] ) === strtolower( $get_post )
            &&
            isset( $value_from_details['instance'] )
            &&
            is_string( $value_from_details['instance'] )
            &&
            trim( $value_from_details['instance'] ) !== ''
            &&
            strlen( $value_from_details['instance'] ) <= 64
            &&
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_varname( $value_from_details['instance'] )
        ) {
        $target_form_field_name_from_instance = $value_from_details['instance'] ;
    }

    // -------------------------------------------------------------------------

    $target_form_field_name_from_slug = NULL ;

    // -------------------------------------------------------------------------

    if (    isset( $array_storage_field_details['slug'] )
            &&
            is_string( $array_storage_field_details['slug'] )
            &&
            trim( $array_storage_field_details['slug'] ) !== ''
            &&
            strlen( $array_storage_field_details['slug'] ) <= 64
            &&
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_varname( $array_storage_field_details['slug'] )
        ) {
        $target_form_field_name_from_slug = $array_storage_field_details['slug'] ;
    }

    // -------------------------------------------------------------------------

    foreach ( $zebra_form_field_indices_of_checkbox_type_zebra_form_fields as $zebra_form_field_index ) {

        // ---------------------------------------------------------------------

        $zebra_form_field_details = $zebra_form_definition['field_specs'][ $zebra_form_field_index ] ;

        // ---------------------------------------------------------------------

        if (    isset( $zebra_form_field_details['form_field_name'] )
                &&
                is_string( $zebra_form_field_details['form_field_name'] )
            ) {

            // -----------------------------------------------------------------

            if (    $zebra_form_field_details['form_field_name'] === $target_form_field_name_from_instance
                    ||
                    $zebra_form_field_details['form_field_name'] === $target_form_field_name_from_slug
                ) {

                // -------------------------------------------------------------

                $expected_value = '1' ;     //  The default

                // -------------------------------------------------------------

                if (    array_key_exists( 'type_specific_args' , $zebra_form_field_details )
                        &&
                        is_array( $zebra_form_field_details['type_specific_args'] )
                        &&
                        array_key_exists( 'value' , $zebra_form_field_details['type_specific_args'] )
                    ) {

                    // ---------------------------------------------------------

                    if ( ! is_string( $zebra_form_field_details['type_specific_args']['value'] ) ) {

                        // -----------------------------------------------------

                        $safe_field_name = htmlentities( $zebra_form_field_details['form_field_name'] ) ;

                        $zebra_form_field_number = $zebra_form_field_index + 1 ;

                        return <<<EOT
PROBLEM:&nbsp; Bad "type_specific_args" + "value" (string expected)
For dataset:&nbsp; "{$dataset_title}"
and Zebra Form field# {$zebra_form_field_number}:&nbsp; "{$safe_field_name}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                        // -----------------------------------------------------

                    }

                    // ---------------------------------------------------------

                    $expected_value = $zebra_form_field_details['type_specific_args']['value'] ;

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

                return array(
                            TRUE                ,
                            $expected_value
                            ) ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    return array(
                FALSE   ,
                NULL
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// is_array_storage_field_a_radios_type_field()
// =============================================================================

function is_array_storage_field_a_radios_type_field(
    $selected_datasets_dmdd                                         ,
    $zebra_form_definition                                          ,
    $dataset_slug                                                   ,
    $dataset_title                                                  ,
    $array_storage_field_details                                    ,
    $zebra_form_field_indices_of_radios_type_zebra_form_fields      ,
    $get_post                                                       ,
    $value_from_details
    ) {

    // -------------------------------------------------------------------------
    // is_array_storage_field_a_radios_type_field(
    //      $selected_datasets_dmdd                                         ,
    //      $zebra_form_definition                                          ,
    //      $dataset_slug                                                   ,
    //      $dataset_title                                                  ,
    //      $array_storage_field_details                                    ,
    //      $zebra_form_field_indices_of_radios_type_zebra_form_fields      ,
    //      $get_post                                                       ,
    //      $value_from_details
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          TRUE or FALSE
    //
    //      o   On FAILURE!
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $selected_datasets_dmdd = array(
    //
    //          ...
    //
    //          ['array_storage_record_structure'] => array(
    //
    //              array(
    //                  'slug'          =>  'created_server_micro_datetime_UTC'      ,
    //                  'array_storage_value_from'    =>  array(
    //                                          'method'    =>  'created-server-micro-datetime-utc'
    //                                          )   ,
    //                  'constraints'   =>  array(
    //                                          array(
    //                                              'method'    =>  'unix-timestamp-with-microseconds'
    //                                              )
    //                                          )
    //                  )   ,
    //
    //              ...
    //
    //              array(
    //                  'slug'          =>  'key'       ,
    //                  'array_storage_value_from'    =>  array(
    //                                          'method'    =>  'unique-key'
    //                                          )   ,
    //                  'constraints'   =>  array(
    //                                          array(
    //                                              'method'    =>  'unique-key'
    //                                              )
    //                                          )
    //                  )   ,
    //
    //              array(
    //                  'slug'          =>  'pathspec'                      ,
    //                  'array_storage_value_from'    =>  array(
    //                                          'method'    =>  'post'          ,
    //                                          'instance'  =>  'pathspec'
    //                                          )   ,
    //                  'constraints'   =>  array()
    //                  )   ,
    //
    //              ...
    //
    //              )   ,
    //
    //          ...
    //
    //          ['zebra_form'] => array(
    //
    //              'form_specs'    =>  array(
    //                                      'name'                      =>  'add_edit_plugin_component'     ,
    //                                      'method'                    =>  'POST'                          ,
    //                                      'action'                    =>  ''                              ,
    //                                      'attributes'                =>  array()                         ,
    //                                      'clientside_validation'     =>  TRUE
    //                                      )   ,
    //
    //              'field_specs'   =>  array(
    //
    //                  array(
    //                      'form_field_name'       =>  'pathspec'          ,
    //                      'zebra_control_type'    =>  'text'              ,
    //                      'label'                 =>  'Pathspec'          ,
    //                      'attributes'            =>  array()             ,
    //                      'rules'                 =>  array(
    //                          'required'  =>  array(
    //                                              'error'             ,   // variable to add the error message to
    //                                              'Field is required'     // error message if value doesn't validate
    //                                              )
    //                          )
    //                      )   ,
    //
    //                  array(
    //                      'form_field_name'       =>  'save_me'       ,
    //                      'zebra_control_type'    =>  'submit'        ,
    //                      'label'                 =>  NULL            ,
    //                      'attributes'            =>  array()         ,
    //                      'rules'                 =>  array()         ,
    //                      'type_specific_args'    =>  array(
    //                          'caption'   =>  'Submit'
    //                          )
    //                      )   ,
    //
    //                  )   ,
    //
    //              'focus_field_slug'  =>  'pathspec'
    //
    //              )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//pr( func_get_args() ) ;

//pr( $selected_datasets_dmdd['array_storage_record_structure'] ) ;

//pr( $selected_datasets_dmdd['zebra_form']['field_specs'] ) ;

//pr( $array_storage_field_details ) ;

//exit() ;

    // -------------------------------------------------------------------------

    $target_form_field_name_from_instance = NULL ;

    if (    isset( $value_from_details )
            &&
            isset( $value_from_details['method'] )
            &&
            strtolower( $value_from_details['method'] ) === strtolower( $get_post )
            &&
            isset( $value_from_details['instance'] )
            &&
            is_string( $value_from_details['instance'] )
            &&
            trim( $value_from_details['instance'] ) !== ''
            &&
            strlen( $value_from_details['instance'] ) <= 64
            &&
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_varname( $value_from_details['instance'] )
        ) {
        $target_form_field_name_from_instance = $value_from_details['instance'] ;
    }

    // -------------------------------------------------------------------------

    $target_form_field_name_from_slug = NULL ;

    if (    isset( $array_storage_field_details['slug'] )
            &&
            is_string( $array_storage_field_details['slug'] )
            &&
            trim( $array_storage_field_details['slug'] ) !== ''
            &&
            strlen( $array_storage_field_details['slug'] ) <= 64
            &&
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_varname( $array_storage_field_details['slug'] )
        ) {
        $target_form_field_name_from_slug = $array_storage_field_details['slug'] ;
    }

    // -------------------------------------------------------------------------

    foreach ( $zebra_form_field_indices_of_radios_type_zebra_form_fields as $zebra_form_field_index ) {

        // ---------------------------------------------------------------------

        $zebra_form_field_details = $zebra_form_definition['field_specs'][ $zebra_form_field_index ] ;

        // ---------------------------------------------------------------------

        if (    isset( $zebra_form_field_details['form_field_name'] )
                &&
                is_string( $zebra_form_field_details['form_field_name'] )
            ) {

            // -----------------------------------------------------------------

            if (    $zebra_form_field_details['form_field_name'] === $target_form_field_name_from_instance
                    ||
                    $zebra_form_field_details['form_field_name'] === $target_form_field_name_from_slug
                ) {
                return TRUE ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    return FALSE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

