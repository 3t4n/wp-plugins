<?php

// *****************************************************************************
// DATASET-MANAGER / ADD-EDIT-RECORD_CONSTRAINTS-HANDLER.PHP
// (C) 2013 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// handle_array_storage_constraints()
// =============================================================================

function handle_array_storage_constraints(
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
    $new_or_existing_field_value            ,
    $record_being_editeds_index
    ) {

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

    // =========================================================================
    // Anything to do ?
    // =========================================================================

    if ( ! isset( $array_storage_field_details['constraints'] ) ) {
        return TRUE ;
    }

    // =========================================================================
    // YES!
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $array_storage_field_details['constraints'] = array(
    //
    //          //  An ARRAY containing zero or more sub-arrays, as follows:-
    //
    //          array(
    //              'method'    =>  'unique'
    //              //  "instance" and "args", if specified, are ignored
    //              )
    //
    //          array(
    //              'method'    =>  'unique-case-insensitively'
    //              //  "instance" and "args", if specified, are ignored
    //              )
    //
    //          array(
    //              'method'    =>  'unique-key'
    //              //  "instance" and "args", if specified, are ignored
    //              )
    //
    //          array(
    //              'method'    =>  'unique-key-or-empty-string'
    //              //  "instance" and "args", if specified, are ignored
    //              )
    //
    //          array(
    //              'method'    =>  'unique-key-or-some-other-string'
    //              'instance'  =>  "other_string"
    //                              --OR--
    //                              array(
    //                                  'other-str-1'   ,
    //                                  'other-str-2'   ,
    //                                  ...
    //                                  )
    //              //  "args", if specified, is ignored
    //              )
    //
    //          array(
    //              'method'    =>  'in-array-strict'
    //              'instance'  =>  array(...)
    //              //  "args", if specified, is ignored
    //              )
    //
    //          array(
    //              'method'    =>  'in-array-not-strict'
    //              'instance'  =>  array(...)
    //              //  "args", if specified, is ignored
    //              )
    //
    //          array(
    //              'method'    =>  'custom'
    //              'instance'  =>  '<function name, including namespace prefix
    //                              if necessary>'
    //              'args'      =>  Any PHP value (including typically a PHP
    //                              object or associative array of
    //                              name=value pairs), that you want to pass
    //                              to the custom function.  If NOT
    //                              specified, NULL will be passed.
    //              )
    //
    //          array(
    //              'method'    =>  'email-address'
    //              'instance'  =>  'strict' | 'not-strict' (default)
    //              //  "args", if specified, is ignored
    //              )
    //
    //          array(
    //              'method'    =>  'bool'
    //              //  "instance" and "args", if specified, are ignored
    //              )
    //
    //          array(
    //              'method'    =>  'mysql-int-type-record-id'
    //              'args'      =>  array(
    //                                  'question_optional'     =>  TRUE/FALSE
    //                                  )
    //              //  "instance", if specified, is ignored
    //              )
    //
    //          array(
    //              'method'    =>  'mysql-bigint-type-record-id'
    //              'args'      =>  array(
    //                                  'question_optional'     =>  TRUE/FALSE
    //                                  )
    //              //  "instance", if specified, is ignored
    //              )
    //
    //          array(
    //              'method'    =>  'comma-separated-list-of-mysql-int-type-record-ids'
    //              'args'      =>  array(
    //                                  'question_optional'     =>  TRUE/FALSE      ,
    //                                  'asterisk_means_all'    =>  TRUE/FALSE
    //                                  )
    //              //  "instance", if specified, is ignored
    //              )
    //
    //          array(
    //              'method'    =>  'comma-separated-list-of-mysql-bigint-type-record-ids'
    //              'args'      =>  array(
    //                                  'question_optional'     =>  TRUE/FALSE      ,
    //                                  'asterisk_means_all'    =>  TRUE/FALSE
    //                                  )
    //              //  "instance", if specified, is ignored
    //              )
    //
    //          array(
    //              'method'    =>  'wordpress-role-name'
    //              'args'      =>  array(
    //                                  'question_optional'     =>  TRUE/FALSE
    //                                  )
    //              //  "instance", if specified, is ignored
    //              )
    //
    //          array(
    //              'method'    =>  'comma-separated-list-of-wordpress-role-names'
    //              'args'      =>  array(
    //                                  'question_optional'     =>  TRUE/FALSE      ,
    //                                  'asterisk_means_all'    =>  TRUE/FALSE
    //                                  )
    //              //  "instance", if specified, is ignored
    //              )
    //
    //          array(
    //              'method'    =>  'signed-integer'
    //              'args'      =>  array(
    //                                  'min'               =>  <1+ digits>
    //                                  'max'               =>  <1+ digits>
    //                                  'question_optional' =>  TRUE/FALSE
    //                                  )
    //              //  "instance", if specified, is ignored
    //              )
    //              //  A STRING, INT or FLOAT that's digits only - with
    //              //  optional leading minus sign.  If either "min" and/or
    //              //  "max" are not specified or NULL/FALSE/empty string,
    //              //  then NO such "min"/"max" applies.
    //
    //          array(
    //              'method'    =>  'unsigned-integer'
    //              'args'      =>  array(
    //                                  'min'               =>  <1+ digits>
    //                                  'max'               =>  <1+ digits>
    //                                  'question_optional' =>  TRUE/FALSE
    //                                  )
    //              //  "instance", if specified, is ignored
    //              )
    //              //  A STRING, INT or FLOAT that's digits only (and has NO
    //              //  leading minus sign).  If either "min" and/or "max" are
    //              //  not specified or NULL/FALSE/empty string, then NO such
    //              //  "min"/"max" applies.
    //
    //          array(
    //              'method'    =>  'dashed-name'
    //              )
    //              //  Eg; "hello-world"
    //
    //          array(
    //              'method'    =>  'notags'
    //              )
    //              //  No HTML or PHP (uses "strip_tags()")
    //
    //          array(
    //              'method'    =>  'sequential-id'     ,
    //              'args'      =>  array(
    //                                  'or_empty_string'   =>  TRUE / FALSE
    //                                  )
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $dataset_records             , '$dataset_records' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $question_adding             , '$question_adding' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $new_or_existing_field_value , '$new_or_existing_field_value' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $record_being_editeds_index  , '$record_being_editeds_index' ) ;

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__ ;

    // =========================================================================
    // Some useful shortcuts...
    // =========================================================================

    if ( $question_adding ) {
        $adding_editing = 'Adding' ;

    } else {
        $adding_editing = 'Editing' ;

    }

    // -------------------------------------------------------------------------

    $array_storage_field_slug =
        $array_storage_field_details['slug']
        ;

    // -------------------------------------------------------------------------

    $safe_array_storage_field_slug =
        htmlentities(
            $array_storage_field_slug
            ) ;

    // -------------------------------------------------------------------------

    $safe_array_storage_field_title =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_title(
            $array_storage_field_slug
            ) ;

    // -------------------------------------------------------------------------

    $safe_new_or_existing_field_value =
        htmlentities(
            $new_or_existing_field_value
            ) ;

    // -------------------------------------------------------------------------

    $safe_dataset_title =
        htmlentities(
            $dataset_title
            ) ;

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
    // Check this array storage field's "constraints"...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Array ?
    // -------------------------------------------------------------------------

    if ( ! is_array( $array_storage_field_details['constraints'] ) ) {

        return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "constraints" (not an array)
For dataset:&nbsp; {$safe_dataset_title}
and field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------
    // Check each constraint individually...
    // -------------------------------------------------------------------------

    foreach ( $array_storage_field_details['constraints'] as $this_index => $this_constraint ) {

        // ---------------------------------------------------------------------

        $constraint_number = $this_index + 1 ;

        // ---------------------------------------------------------------------
        // Array ?
        // ---------------------------------------------------------------------

        if ( ! is_array( $this_constraint ) ) {

            return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "constraints" - for constraint# {$constraint_number} (not an array)
For dataset:&nbsp; {$safe_dataset_title}
and field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------
        // Has "method" ?
        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'method' , $this_constraint ) ) {

            return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; No "array_storage_record_structure" + "constraints"  + "method" - for constraint# {$constraint_number}
For dataset:&nbsp; {$safe_dataset_title}
and field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------
        // Method looks OK ?
        // ---------------------------------------------------------------------

        if (    ! is_string( $this_constraint['method'] )
                ||
                trim( $this_constraint['method'] ) === ''
                ||
                ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash(
                        $this_constraint['method']
                        )
                ||
                strlen( $this_constraint['method'] ) > 64
            ) {

            return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "constraints"  + "method" - for constraint# {$constraint_number} (1 to 64 character alphanumeric underscore dash type string expected)
For dataset:&nbsp; {$safe_dataset_title}
and field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // =====================================================================
        // Handle the METHODS...
        // =====================================================================

        if ( $this_constraint['method'] === 'unique' ) {

            // =================================================================
            // FIELD CONSTRAINT = "UNIQUE"
            // =================================================================

            // -----------------------------------------------------------------
            // For MySQL tables, we assume that the UNIQUE fields are
            // defined with UNIQUE keys.  So NO special uniqueness checking
            // is required here...
            // -----------------------------------------------------------------

            if ( $storage_mode === 'mysql' ) {
                continue ;
            }

            // -----------------------------------------------------------------
            // In other words, there may be max. one record that
            // has any given value.
            // -----------------------------------------------------------------

            foreach ( $dataset_records as $this_record_index => $this_record ) {

                // -------------------------------------------------------------

                if (    array_key_exists( $array_storage_field_slug , $this_record )
                        &&
                        $this_record[ $array_storage_field_slug ] == $new_or_existing_field_value
                    ) {

                    // ---------------------------------------------------------

                    if (    $question_adding
                            ||
                            $record_being_editeds_index !== $this_record_index
                        ) {

                        // -----------------------------------------------------

                        return <<<EOT
--ZEBRA--A record with the {$safe_array_storage_field_title} "{$safe_new_or_existing_field_value}" already exists.&nbsp; Please enter another {$safe_array_storage_field_title}...
EOT;

                        // -----------------------------------------------------

                    }

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'unique-case-insensitively' ) {

            // =================================================================
            // FIELD CONSTRAINT = "UNIQUE-CASE-INSENSITIVELY"
            // =================================================================

            // -----------------------------------------------------------------
            // In other words, there may be max. one record that
            // has any given value.
            // -----------------------------------------------------------------

            $new_or_existing_field_value_lc = strtolower( $new_or_existing_field_value ) ;

            // -----------------------------------------------------------------

            foreach ( $dataset_records as $this_record_index => $this_record ) {

                // -------------------------------------------------------------

                if (    array_key_exists( $array_storage_field_slug , $this_record )
                        &&
                        strtolower( $this_record[ $array_storage_field_slug ] ) === $new_or_existing_field_value_lc
                    ) {

                    // ---------------------------------------------------------

                    if (    $question_adding
                            ||
                            $record_being_editeds_index !== $this_record_index
                        ) {

                        // -----------------------------------------------------

                        return <<<EOT
--ZEBRA--A record with the {$safe_array_storage_field_title} "{$safe_new_or_existing_field_value}" already exists.&nbsp; Please enter another {$safe_array_storage_field_title} (that differs from any existing {$safe_array_storage_field_title} by more than just case)...
EOT;

                        // -----------------------------------------------------

                    }

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'unique-key' ) {

            // =================================================================
            // FIELD CONSTRAINT = "UNIQUE-KEY"
            // =================================================================

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
            // is_record_key(
            //      $candidate_record_key
            //      )
            // - - - - - - - - - - - - - - - - -
            // Is the input string a record key like (eg):-
            //
            //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-0-1
            //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-999977-2147483647
            //      etc
            //
            // RETURNS
            //      o   On SUCCESS
            //              TRUE
            //
            //      o   On FAILURE
            //              FALSE
            // ---------------------------------------------------------------------------

            if ( ! is_record_key( $new_or_existing_field_value ) ) {

                // --------------------------------------------------------------

                return <<<EOT
--ZEBRA--"{$safe_array_storage_field_title}" must be a Standard Dataset Manager "unique key"
EOT;

                // --------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            continue ;

            // ------------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'unique-key-or-empty-string' ) {

            // =================================================================
            // FIELD CONSTRAINT = "UNIQUE-KEY-OR-EMPTY-STRING"
            // =================================================================

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
            // is_record_key(
            //      $candidate_record_key
            //      )
            // - - - - - - - - - - - - - - - - -
            // Is the input string a record key like (eg):-
            //
            //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-0-1
            //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-999977-2147483647
            //      etc
            //
            // RETURNS
            //      o   On SUCCESS
            //              TRUE
            //
            //      o   On FAILURE
            //              FALSE
            // ---------------------------------------------------------------------------

            // -----------------------------------------------------------------
            // The field value should be a record key like (eg):-
            //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-0-1
            //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-999977-2147483647
            //      etc
            //
            // Though an empty string is also allowed.  This copes with (for
            // example), a category tree.  where the root catagories have NO
            // parent - and thus their "parent category key"s are the empty
            // string.
            // -----------------------------------------------------------------

            $err_msg = <<<EOT
--ZEBRA--"{$safe_array_storage_field_title}" must be either a Standard Dataset Manager "unique key", or the empty string.
EOT;

            // -----------------------------------------------------------------

            if ( ! is_string( $new_or_existing_field_value ) ) {
                return $err_msg ;
            }

            // -----------------------------------------------------------------

            if ( $new_or_existing_field_value !== '' ) {

                // -------------------------------------------------------------

                if ( ! is_record_key( $new_or_existing_field_value ) ) {
                    return $err_msg ;
                }

                // --------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            continue ;

            // ------------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'unique-key-or-some-other-string' ) {

            // =================================================================
            // FIELD CONSTRAINT = "UNIQUE-KEY-OR-SOME-OTHER-STRING"
            // =================================================================

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
            // is_record_key(
            //      $candidate_record_key
            //      )
            // - - - - - - - - - - - - - - - - -
            // Is the input string a record key like (eg):-
            //
            //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-0-1
            //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-999977-2147483647
            //      etc
            //
            // RETURNS
            //      o   On SUCCESS
            //              TRUE
            //
            //      o   On FAILURE
            //              FALSE
            // ---------------------------------------------------------------------------

            // -----------------------------------------------------------------
            // The field value should be a record key like (eg):-
            //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-0-1
            //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-999977-2147483647
            //      etc
            //
            // Though another string is also allowed.  As specified by the
            // "instance" parameter.
            // -----------------------------------------------------------------

            // -----------------------------------------------------------------
            // Here we should have:-
            //
            //      array(
            //          'method'    =>  'unique-key-or-some-other-string'
            //          'instance'  =>  "other_string"
            //                          --OR--
            //                          array(
            //                              'other-str-1'   ,
            //                              'other-str-2'   ,
            //                              ...
            //                              )
            //          //  "args", if specified, is ignored
            //          )
            //
            // -----------------------------------------------------------------

            $err_msg = <<<EOT
--ZEBRA--"{$safe_array_storage_field_title}" must be either a Standard Dataset Manager "unique key", or some pre-defined string.
EOT;

            // -----------------------------------------------------------------
            // Value must be string...
            // -----------------------------------------------------------------

            if ( ! is_string( $new_or_existing_field_value ) ) {
                return $err_msg ;
            }

            // -----------------------------------------------------------------

            if ( ! is_record_key( $new_or_existing_field_value ) ) {

                // -------------------------------------------------------------
                // NOT a record key...
                // -------------------------------------------------------------

                // -------------------------------------------------------------
                // "instance" required...
                // -------------------------------------------------------------

                if ( ! array_key_exists( 'instance' , $this_constraint ) ) {

                    return <<<EOT
PROBLEM:&nbsp; No "instance" (for the "{$safe_array_storage_field_title}" array storage field constraint)
In dataset:&nbsp; "{$safe_dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // -------------------------------------------------------------
                // instance OK ?
                // -------------------------------------------------------------

                if ( is_string( $this_constraint['instance'] ) ) {

                    if ( $new_or_existing_field_value !== $this_constraint['instance'] ) {
                        return $err_msg ;
                    }

                } elseif ( is_array( $this_constraint['instance'] ) ) {

                    if ( ! in_array( $new_or_existing_field_value , $this_constraint['instance'] ) ) {
                        return $err_msg ;
                    }

                } else {

                    return <<<EOT
PROBLEM: Bad "instance" (for the "{$safe_array_storage_field_title}" array storage field constraint - string or array expected)
In dataset:&nbsp; "{$safe_dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // -----------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'in-array-strict' ) {

            // =================================================================
            // FIELD CONSTRAINT = "IN-ARRAY-STRICT"
            // =================================================================

            // -----------------------------------------------------------------
            // Here we should have:-
            //
            //      $this_constraint = array(
            //              'method'    =>  'in-array-strict'
            //              'instance'  =>  array(...)
            //              //  "args", if specified, is ignored
            //              )
            //
            // -----------------------------------------------------------------

            if ( ! array_key_exists( 'instance' , $this_constraint ) ) {

                return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; No "array_storage_record_structure" + "constraints"  + "instance" - for constraint# {$constraint_number}
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            if ( ! is_array( $this_constraint['instance'] ) ) {

                return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "constraints"  + "instance" - for constraint# {$constraint_number} (array expected)
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            if ( ! in_array( $new_or_existing_field_value , $this_constraint['instance'] , TRUE ) ) {

                return <<<EOT
--ZEBRA--Bad "{$safe_array_storage_field_title}" ("{$safe_new_or_existing_field_value}" isn't a recognised/supported value for this field)
EOT;

            }

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'unix-timestamp' ) {

            // =================================================================
            // FIELD CONSTRAINT = "UNIX-TIMESTAMP"
            // =================================================================

            $new_or_existing_field_value_str = (string) $new_or_existing_field_value ;

            // -----------------------------------------------------------------

            if (    ! is_scalar( $new_or_existing_field_value )
                    ||
                    trim( $new_or_existing_field_value_str ) === ''
                    ||
                    ! ctype_digit( $new_or_existing_field_value_str )
                    ||
                    strlen( $new_or_existing_field_value_str ) > 32
                ) {

                // --------------------------------------------------------------

                return <<<EOT
--ZEBRA--Bad "{$safe_array_storage_field_title}" ("{$safe_new_or_existing_field_value}" - a Unix Timestamp was expected)
EOT;

                // --------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'unix-timestamp-with-microseconds' ) {

            // =================================================================
            // FIELD CONSTRAINT = "UNIX-TIMESTAMP-WITH-MICROSECONDS"
            // =================================================================

            // -----------------------------------------------------------------
            // NOTE!
            // -----
            // "Micro" dates/times are expressed as floats like (eg):-
            //
            //      12.34 = 12 seconds and 340,000 microseconds
            //
            // "micro" = 1 millionth
            // -----------------------------------------------------------------

            $new_or_existing_field_value_str = (string) $new_or_existing_field_value ;

            // -----------------------------------------------------------------

            $unix_timestamp_with_microseconds_error_message = <<<EOT
--ZEBRA--Bad "{$safe_array_storage_field_title}" ("{$safe_new_or_existing_field_value}" - a Unix Timestamp in float format with optional microseconds was expected : Please enter (eg) "12.34" = 12 seconds and 340,000 microseconds)
EOT;

            // -----------------------------------------------------------------

            $ignore_case = TRUE ;

            // -----------------------------------------------------------------

            if ( \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\contains(
                    $new_or_existing_field_value_str , '.' , $ignore_case
                    )
                ) {

                // -------------------------------------------------------------
                // "12.34" expected...
                // -------------------------------------------------------------

                $parts = explode( '.' , $new_or_existing_field_value_str ) ;

                // -------------------------------------------------------------

                if (    count( $parts ) !== 2
                        ||
                        ! ctype_digit( $parts[0] )
                        ||
                        strlen( $parts[0] ) > 11
                        ||
                        ! ctype_digit( $parts[1] )
                        ||
                        strlen( $parts[1] ) > 6
                    ) {
                    return $unix_timestamp_with_microseconds_error_message ;
                }

                // -------------------------------------------------------------

            } else {

                // -------------------------------------------------------------
                // "1234" expected...
                // -------------------------------------------------------------

                if (    trim( $new_or_existing_field_value_str ) === ''
                        ||
                        strlen( $new_or_existing_field_value_str ) > 11
                        ||
                        ! ctype_digit( $new_or_existing_field_value_str )
                    ) {
                    return $unix_timestamp_with_microseconds_error_message ;
                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'custom' ) {

            // =================================================================
            // FIELD CONSTRAINT = "CUSTOM" (FUNCTION)
            // =================================================================

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_constraint = array(
            //          'method'    =>  'custom'
            //          'instance'  =>  '<function name, including namespace
            //                          prefix if necessary>'
            //          'args'      =>  Any PHP value (including typically a PHP
            //                          object or associative array of
            //                          name=value pairs), that you want to pass
            //                          to the custom function.  If NOT
            //                          specified, NULL will be passed.
            //          )
            //
            // -----------------------------------------------------------------

            if ( ! array_key_exists( 'instance' , $this_constraint ) ) {

                return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; No "array_storage_record_structure" + "constraints"  + "instance" - for constraint# {$constraint_number}
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            if (    ! is_string( $this_constraint['instance'] )
                    ||
                    trim( $this_constraint['instance'] ) === ''
                    ||
                    strlen( $this_constraint['instance'] ) > 512
                ) {

                return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "constraints"  + "instance" - for constraint# {$constraint_number} (1 to 512 character string expected)
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            if ( ! \function_exists( $this_constraint['instance'] ) ) {

                return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "array_storage_record_structure" + "constraints"  + "instance" - for constraint# {$constraint_number} (no such function)
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -------------------------------------------------------------------------
            // <my_custom_field_value_checker_function>(
            //      $caller_apps_includes_dir       ,
            //      $dataset_title                  ,
            //      $dataset_records                ,
            //      $array_storage_field_details    ,
            //      $question_adding                ,
            //      $new_or_existing_field_value    ,
            //      $record_being_editeds_index     ,
            //      $custom_args
            //      )
            // - - - - - - - - - - - - -
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

            if ( ! array_key_exists( 'args' , $this_constraint ) ) {
                $custom_args = NULL ;

            } else {
                $custom_args = $this_constraint['args'] ;

            }

            // -----------------------------------------------------------------

            $result = $this_constraint['instance'](
                            $caller_apps_includes_dir       ,
                            $dataset_title                  ,
                            $dataset_records                ,
                            $array_storage_field_details    ,
                            $question_adding                ,
                            $new_or_existing_field_value    ,
                            $record_being_editeds_index     ,
                            $custom_args
                            ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'email' ) {

            // =================================================================
            // FIELD CONSTRAINT = "EMAIL"
            // =================================================================

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_constraint = array(
            //          'method'    =>  'email'
            //          'instance'  =>  'strict' (must pass all available email tests)
            //                          --OR--
            //                          'loose' (is accepted so long as it passes at
            //                                  least one email test).
            //          //  "args", if specified, is ignored
            //          )
            //
            // -----------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $this_constraint ) ;

            $question_strict = FALSE ;
                //  Must pass at least one test...

            // -----------------------------------------------------------------

            if (    array_key_exists( 'instance' , $this_constraint )
                    &&
                    $this_constraint['instance'] === 'strict'
                ) {
                $question_strict = TRUE ;
                    //  Must pass ALL (available) email tests...
            }

            // -----------------------------------------------------------------

            $question_loose = ! $question_strict ;

            $number_tests_available = 0 ;

            $number_tests_passed = 0 ;

            $bad_email = <<<EOT
--ZEBRA--Invalid email address<br />Please try again...
EOT;

            // -----------------------------------------------------------------
            // FILTER_VALIDATE_EMAIL
            // -----------------------------------------------------------------

            // -------------------------------------------------------------------------
            // mixed filter_var ( mixed $variable [, int $filter = FILTER_DEFAULT [, mixed $options ]] )
            // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
            // Filters a variable with a specified filter
            //
            //      variable
            //          Value to filter.
            //
            //      filter
            //          The ID of the filter to apply. The Types of filters manual page
            //          lists the available filters.
            //
            //      options
            //          Associative array of options or bitwise disjunction of flags. If
            //          filter accepts options, flags can be provided in "flags" field
            //          of array. For the "callback" filter, callable type should be
            //          passed. The callback must accept one argument, the value to be
            //          filtered, and return the value after filtering/sanitizing it.
            //
            //          // for filters that accept options, use this format
            //          $options = array(
            //              'options' => array(
            //                  'default' => 3, // value to return if the filter fails
            //                  // other options here
            //                  'min_range' => 0
            //              ),
            //              'flags' => FILTER_FLAG_ALLOW_OCTAL,
            //          );
            //          $var = filter_var('0755', FILTER_VALIDATE_INT, $options);
            //
            //          // for filter that only accept flags, you can pass them directly
            //          $var = filter_var('oops', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
            //
            //          // for filter that only accept flags, you can also pass as an array
            //          $var = filter_var('oops', FILTER_VALIDATE_BOOLEAN,
            //                            array('flags' => FILTER_NULL_ON_FAILURE));
            //
            //          // callback validate filter
            //          function foo($value)
            //          {
            //              // Expected format: Surname, GivenNames
            //              if (strpos($value, ", ") === false) return false;
            //              list($surname, $givennames) = explode(", ", $value, 2);
            //              $empty = (empty($surname) || empty($givennames));
            //              $notstrings = (!is_string($surname) || !is_string($givennames));
            //              if ($empty || $notstrings) {
            //                  return false;
            //              } else {
            //                  return $value;
            //              }
            //          }
            //          $var = filter_var('Doe, Jane Sue', FILTER_CALLBACK, array('options' => 'foo'));
            //
            // Returns the filtered data, or FALSE if the filter fails.
            //
            // (PHP 5 >= 5.2.0)
            // -------------------------------------------------------------------------

            if ( function_exists( '\\filter_var' ) ) {

                $number_tests_available++ ;

                if ( \filter_var( $new_or_existing_field_value , FILTER_VALIDATE_EMAIL ) !== FALSE ) {

                    if ( $question_loose ) {
                        continue ;          //  Valid email
                    }

                    $number_tests_passed++ ;

                }

            }

            // -----------------------------------------------------------------
            //  /**
            //  Validate an email address.
            //  Provide email address (raw input)
            //  Returns true if the email address has the email
            //  address format and the domain exists.
            //  */
            //
            //  /*
            //  From:   Linux Journal, Issue 158
            //          "Validate an E-Mail Address with PHP, the Right Way"
            //          Douglas Lovell
            //          Jun 01, 2007
            //
            //          http://www.linuxjournal.com/article/9585?page=0,0
            //  */
            // -----------------------------------------------------------------

            require_once( $caller_apps_includes_dir . '/validEmail-douglasLovell.php' ) ;

            // -----------------------------------------------------------------

            if ( function_exists( '\\validEmail' ) ) {

                $number_tests_available++ ;

                if ( \validEmail( $new_or_existing_field_value ) ) {

                    if ( $question_loose ) {
                        continue ;          //  Valid email
                    }

                    $number_tests_passed++ ;

                }

            }

            // -----------------------------------------------------------------

            if ( $number_tests_available === 0 ) {

                return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Can't validate "email" field (no email validation routines available)
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            if ( $number_tests_passed >= $number_tests_available ) {
                continue ;          //  Valid email

            } elseif ( $number_tests_passed === 0 ) {
                return $bad_email ;

            }

            // -----------------------------------------------------------------
            // At least one - but NOT all available - tests passed...
            // -----------------------------------------------------------------

            if ( $question_strict ) {
                return $bad_email ;
            }

            // -----------------------------------------------------------------

            continue ;          //  Valid email

            // -----------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'bool' ) {

            // =================================================================
            // FIELD CONSTRAINT = "BOOL"
            // =================================================================

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_constraint = array(
            //          'method'    =>  'bool'
            //          //  "instance" and "args", if specified, are ignored
            //          )
            //
            // -----------------------------------------------------------------

            if (    $new_or_existing_field_value !== '0'
                    &&
                    $new_or_existing_field_value !== '1'
                ) {

//              $safe_new_or_existing_field_value = htmlentities( $new_or_existing_field_value ) ;

                return <<<EOT
--ZEBRA--Bad "{$safe_array_storage_field_title}" ("{$safe_new_or_existing_field_value}" - "0" or "1" was expected)
EOT;

            }

            // -----------------------------------------------------------------

            continue ;          //  Valid bool

            // -----------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'mysql-int-type-record-id' ) {

            // =================================================================
            // FIELD CONSTRAINT = "MYSQL-INT-TYPE-RECORD-ID"
            // =================================================================

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_constraint = array(
            //          'method'    =>  'mysql-int-type-record-id'
            //          'args'      =>  array(
            //                              'question_optional'     =>  TRUE/FALSE
            //                              )
            //          //  "instance", if specified, is ignored
            //          )
            //
            // -----------------------------------------------------------------

            // -------------------------------------------------------------------------
            // check_and_default_the_args(
            //      $safe_dataset_title                     ,
            //      $safe_array_storage_field_slug          ,
            //      $safe_array_storage_field_title         ,
            //      $adding_editing                         ,
            //      $constraint_number                      ,
            //      $expected_members_and_their_defaults    ,
            //      &$this_constraint
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - -
            // $expected_members_and_their_defaults is like (eg):-
            //
            //      $expected_members_and_their_defaults = array(
            //          'question_optional'     =>  array(
            //                                          'allowed_types'     =>  array( 'boolean' )     ,
            //                                          'default_value'     =>  FALSE
            //                                          )
            //          'asterisk_means_all'    =>  array(
            //                                          'allowed_types'     =>  array( 'boolean' )     ,
            //                                          'default_value'     =>  FALSE
            //                                          )
            //          )
            //
            // RETURNS
            //      o   On SUCCESS
            //              TRUE
            //
            //      o   On FAILURE
            //              $error_message STRING
            // -------------------------------------------------------------------------

            $expected_members_and_their_defaults = array(
                'question_optional'     =>  array(
                                                'allowed_types'     =>  array( 'boolean' )     ,
                                                'default_value'     =>  FALSE
                                                )
                ) ;

            // -----------------------------------------------------------------

            $result = check_and_default_the_args(
                            $safe_dataset_title                     ,
                            $safe_array_storage_field_slug          ,
                            $safe_array_storage_field_title         ,
                            $adding_editing                         ,
                            $constraint_number                      ,
                            $expected_members_and_their_defaults    ,
                            $this_constraint
                            ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

            if ( trim( $new_or_existing_field_value ) === '' ) {

                // -------------------------------------------------------------

                if ( $this_constraint['args']['question_optional'] !== TRUE ) {

                    return <<<EOT
--ZEBRA--Bad "{$safe_array_storage_field_title}" ("{$safe_new_or_existing_field_value}" - a MySQL INT type record id was expected)
EOT;

                }

                // -------------------------------------------------------------

            } else {

                // -------------------------------------------------------------------------
                // is_mysql_record_id_type_int(
                //      $safe_array_storage_field_slug          ,
                //      $safe_array_storage_field_title         ,
                //      $safe_new_or_existing_field_value       ,
                //      $new_or_existing_field_value
                //      )
                // - - - - - - - - - - - - - - - - -
                // RETURNS
                //      o   On SUCCESS
                //              TRUE
                //
                //      o   On FAILURE
                //              $error_meaage STRING
                // -------------------------------------------------------------------------

                $result = is_mysql_record_id_type_int(
                                $safe_array_storage_field_slug          ,
                                $safe_array_storage_field_title         ,
                                $safe_new_or_existing_field_value       ,
                                $new_or_existing_field_value
                                ) ;

                // -------------------------------------------------------------

                if ( is_string( $result ) ) {
                    return $result ;
                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'comma-separated-list-of-mysql-int-type-record-ids' ) {

            // =================================================================
            // FIELD CONSTRAINT = "COMMA-SEPARATED-LIST-OF-MYSQL-INT-TYPE-RECORD-IDS"
            // =================================================================

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_constraint = array(
            //          'method'    =>  'comma-separated-list-of-mysql-int-type-record-ids'
            //          'args'      =>  array(
            //                              'question_optional'     =>  TRUE/FALSE      ,
            //                              'asterisk_means_all'    =>  TRUE/FALSE
            //                              )
            //          //  "instance", if specified, is ignored
            //          )
            //
            // -----------------------------------------------------------------

            // -------------------------------------------------------------------------
            // check_and_default_the_args(
            //      $safe_dataset_title                     ,
            //      $safe_array_storage_field_slug          ,
            //      $safe_array_storage_field_title         ,
            //      $adding_editing                         ,
            //      $constraint_number                      ,
            //      $expected_members_and_their_defaults    ,
            //      &$this_constraint
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - -
            // $expected_members_and_their_defaults is like (eg):-
            //
            //      $expected_members_and_their_defaults = array(
            //          'question_optional'     =>  array(
            //                                          'allowed_types'     =>  array( 'boolean' )     ,
            //                                          'default_value'     =>  FALSE
            //                                          )
            //          'asterisk_means_all'    =>  array(
            //                                          'allowed_types'     =>  array( 'boolean' )     ,
            //                                          'default_value'     =>  FALSE
            //                                          )
            //          )
            //
            // RETURNS
            //      o   On SUCCESS
            //              TRUE
            //
            //      o   On FAILURE
            //              $error_message STRING
            // -------------------------------------------------------------------------

            $expected_members_and_their_defaults = array(
                'question_optional'     =>  array(
                                                'allowed_types'     =>  array( 'boolean' )     ,
                                                'default_value'     =>  FALSE
                                                )   ,
                'asterisk_means_all'    =>  array(
                                                'allowed_types'     =>  array( 'boolean' )     ,
                                                'default_value'     =>  FALSE
                                                )
                ) ;

            // -----------------------------------------------------------------

            $result = check_and_default_the_args(
                            $safe_dataset_title                     ,
                            $safe_array_storage_field_slug          ,
                            $safe_array_storage_field_title         ,
                            $adding_editing                         ,
                            $constraint_number                      ,
                            $expected_members_and_their_defaults    ,
                            $this_constraint
                            ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

            $err_msg = <<<EOT
--ZEBRA--Bad "{$safe_array_storage_field_title}" ("{$safe_new_or_existing_field_value}" -
EOT;

            // -----------------------------------------------------------------

            if ( $this_constraint['args']['question_optional'] ) {

                if ( $this_constraint['args']['asterisk_means_all'] ) {
                    $err_msg .= ' the empty string, "*" or' ;

                } else {
                    $err_msg .= ' the empty string or ' ;

                }

            } else {

                if ( $this_constraint['args']['asterisk_means_all'] ) {
                    $err_msg .= ' "*" or ' ;

                } else {
                    $err_msg .= '' ;

                }

            }

            // -----------------------------------------------------------------

            $err_msg .= ' a comma-separated list of MySQL INT type record IDs was expected)' ;

            // -----------------------------------------------------------------

            if ( trim( $new_or_existing_field_value ) === '' ) {

                // -------------------------------------------------------------

                if ( ! $this_constraint['args']['question_optional'] ) {
                    return $err_msg ;
                }

                // -------------------------------------------------------------

            } elseif ( $new_or_existing_field_value === '*' ) {

                // -------------------------------------------------------------

                if ( ! $this_constraint['args']['asterisk_means_all'] ) {
                    return $err_msg ;
                }

                // -------------------------------------------------------------

            } else {

                // -------------------------------------------------------------

                $parts = explode( ',' , $new_or_existing_field_value ) ;

                // -------------------------------------------------------------

                foreach ( $parts as $this_candidate_mysql_record_id ) {

                    // -------------------------------------------------------------------------
                    // is_mysql_record_id_type_int(
                    //      $safe_array_storage_field_slug          ,
                    //      $safe_array_storage_field_title         ,
                    //      $safe_new_or_existing_field_value       ,
                    //      $new_or_existing_field_value
                    //      )
                    // - - - - - - - - - - - - - - - - -
                    // RETURNS
                    //      o   On SUCCESS
                    //              TRUE
                    //
                    //      o   On FAILURE
                    //              $error_meaage STRING
                    // -------------------------------------------------------------------------

                    $result = is_mysql_record_id_type_int(
                                    $safe_array_storage_field_slug          ,
                                    $safe_array_storage_field_title         ,
                                    $safe_new_or_existing_field_value       ,
                                    $this_candidate_mysql_record_id
                                    ) ;

                    // ---------------------------------------------------------

                    if ( is_string( $result ) ) {
                        return $result ;
                    }

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'mysql-bigint-type-record-id' ) {

            // =================================================================
            // FIELD CONSTRAINT = "MYSQL-RECORD-ID-TYPE-BIGINT"
            // =================================================================

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_constraint = array(
            //          'method'    =>  'mysql-bigint-type-record-id'
            //          'args'      =>  array(
            //                              'question_optional'     =>  TRUE/FALSE      ,
            //                              'asterisk_means_all'    =>  TRUE/FALSE
            //                              )
            //          //  "instance", if specified, is ignored
            //          )
            //
            // -----------------------------------------------------------------

            // -------------------------------------------------------------------------
            // check_and_default_the_args(
            //      $safe_dataset_title                     ,
            //      $safe_array_storage_field_slug          ,
            //      $safe_array_storage_field_title         ,
            //      $adding_editing                         ,
            //      $constraint_number                      ,
            //      $expected_members_and_their_defaults    ,
            //      &$this_constraint
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - -
            // $expected_members_and_their_defaults is like (eg):-
            //
            //      $expected_members_and_their_defaults = array(
            //          'question_optional'     =>  array(
            //                                          'allowed_types'     =>  array( 'boolean' )     ,
            //                                          'default_value'     =>  FALSE
            //                                          )
            //          'asterisk_means_all'    =>  array(
            //                                          'allowed_types'     =>  array( 'boolean' )     ,
            //                                          'default_value'     =>  FALSE
            //                                          )
            //          )
            //
            // RETURNS
            //      o   On SUCCESS
            //              TRUE
            //
            //      o   On FAILURE
            //              $error_message STRING
            // -------------------------------------------------------------------------

            $expected_members_and_their_defaults = array(
                'question_optional'     =>  array(
                                                'allowed_types'     =>  array( 'boolean' )     ,
                                                'default_value'     =>  FALSE
                                                )
                ) ;

            // -----------------------------------------------------------------

            $result = check_and_default_the_args(
                            $safe_dataset_title                     ,
                            $safe_array_storage_field_slug          ,
                            $safe_array_storage_field_title         ,
                            $adding_editing                         ,
                            $constraint_number                      ,
                            $expected_members_and_their_defaults    ,
                            $this_constraint
                            ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

            if ( trim( $new_or_existing_field_value ) === '' ) {

                // -------------------------------------------------------------

                if ( $this_constraint['args']['question_optional'] !== TRUE ) {

                    return <<<EOT
--ZEBRA--Bad "{$safe_array_storage_field_title}" ("{$safe_new_or_existing_field_value}" - a MySQL BIGINT type record id was expected)
EOT;

                }

                // -------------------------------------------------------------

            } else {

                // -------------------------------------------------------------------------
                // is_mysql_record_id_type_bigint(
                //      $safe_array_storage_field_slug          ,
                //      $safe_array_storage_field_title         ,
                //      $safe_new_or_existing_field_value       ,
                //      $new_or_existing_field_value
                //      )
                // - - - - - - - - - - - - - - - - -
                // RETURNS
                //      o   On SUCCESS
                //              TRUE
                //
                //      o   On FAILURE
                //              $error_meaage STRING
                // -------------------------------------------------------------------------

                $result = is_mysql_record_id_type_bigint(
                                $safe_array_storage_field_slug          ,
                                $safe_array_storage_field_title         ,
                                $safe_new_or_existing_field_value       ,
                                $new_or_existing_field_value
                                ) ;

                // -----------------------------------------------------------------

                if ( is_string( $result ) ) {
                    return $result ;
                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'comma-separated-list-of-mysql-bigint-type-record-ids' ) {

            // =================================================================
            // FIELD CONSTRAINT = "COMMA-SEPARATED-LIST-OF-MYSQL-BIGINT-TYPE-RECORD-IDS"
            // =================================================================

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_constraint = array(
            //          'method'    =>  'comma-separated-list-of-mysql-bigint-type-record-ids'
            //          'args'      =>  array(
            //                              'question_optional'     =>  TRUE/FALSE      ,
            //                              'asterisk_means_all'    =>  TRUE/FALSE
            //                              )
            //          //  "instance", if specified, is ignored
            //          )
            //
            // -----------------------------------------------------------------

            // -------------------------------------------------------------------------
            // check_and_default_the_args(
            //      $safe_dataset_title                     ,
            //      $safe_array_storage_field_slug          ,
            //      $safe_array_storage_field_title         ,
            //      $adding_editing                         ,
            //      $constraint_number                      ,
            //      $expected_members_and_their_defaults    ,
            //      &$this_constraint
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - -
            // $expected_members_and_their_defaults is like (eg):-
            //
            //      $expected_members_and_their_defaults = array(
            //          'question_optional'     =>  array(
            //                                          'allowed_types'     =>  array( 'boolean' )     ,
            //                                          'default_value'     =>  FALSE
            //                                          )
            //          'asterisk_means_all'    =>  array(
            //                                          'allowed_types'     =>  array( 'boolean' )     ,
            //                                          'default_value'     =>  FALSE
            //                                          )
            //          )
            //
            // RETURNS
            //      o   On SUCCESS
            //              TRUE
            //
            //      o   On FAILURE
            //              $error_message STRING
            // -------------------------------------------------------------------------

            $expected_members_and_their_defaults = array(
                'question_optional'     =>  array(
                                                'allowed_types'     =>  array( 'boolean' )     ,
                                                'default_value'     =>  FALSE
                                                )   ,
                'asterisk_means_all'    =>  array(
                                                'allowed_types'     =>  array( 'boolean' )     ,
                                                'default_value'     =>  FALSE
                                                )
                ) ;

            // -----------------------------------------------------------------

            $result = check_and_default_the_args(
                            $safe_dataset_title                     ,
                            $safe_array_storage_field_slug          ,
                            $safe_array_storage_field_title         ,
                            $adding_editing                         ,
                            $constraint_number                      ,
                            $expected_members_and_their_defaults    ,
                            $this_constraint
                            ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

            $err_msg = <<<EOT
--ZEBRA--Bad "{$safe_array_storage_field_title}" ("{$safe_new_or_existing_field_value}" -
EOT;

            // -----------------------------------------------------------------

            if ( $this_constraint['args']['question_optional'] ) {

                if ( $this_constraint['args']['asterisk_means_all'] ) {
                    $err_msg .= ' the empty string, "*" or' ;

                } else {
                    $err_msg .= ' the empty string or ' ;

                }

            } else {

                if ( $this_constraint['args']['asterisk_means_all'] ) {
                    $err_msg .= ' "*" or ' ;

                } else {
                    $err_msg .= '' ;

                }

            }

            // -----------------------------------------------------------------

            $err_msg .= ' a comma-separated list of MySQL BIGINT type record IDs was expected)' ;

            // -----------------------------------------------------------------

            if ( trim( $new_or_existing_field_value ) === '' ) {

                // -------------------------------------------------------------

                if ( ! $this_constraint['args']['question_optional'] ) {
                    return $err_msg ;
                }

                // -------------------------------------------------------------

            } elseif ( $new_or_existing_field_value === '*' ) {

                // -------------------------------------------------------------

                if ( ! $this_constraint['args']['asterisk_means_all'] ) {
                    return $err_msg ;
                }

                // -------------------------------------------------------------

            } else {

                // -------------------------------------------------------------

                $parts = explode( ',' , $new_or_existing_field_value ) ;

                // -------------------------------------------------------------

                foreach ( $parts as $this_candidate_mysql_record_id ) {

                    // -------------------------------------------------------------------------
                    // is_mysql_record_id_type_bigint(
                    //      $safe_array_storage_field_slug          ,
                    //      $safe_array_storage_field_title         ,
                    //      $safe_new_or_existing_field_value       ,
                    //      $new_or_existing_field_value
                    //      )
                    // - - - - - - - - - - - - - - - - -
                    // RETURNS
                    //      o   On SUCCESS
                    //              TRUE
                    //
                    //      o   On FAILURE
                    //              $error_meaage STRING
                    // -------------------------------------------------------------------------

                    $result = is_mysql_record_id_type_bigint(
                                    $safe_array_storage_field_slug          ,
                                    $safe_array_storage_field_title         ,
                                    $safe_new_or_existing_field_value       ,
                                    $this_candidate_mysql_record_id
                                    ) ;

                    // ---------------------------------------------------------

                    if ( is_string( $result ) ) {
                        return $result ;
                    }

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'wordpress-role-name' ) {

            // =================================================================
            // FIELD CONSTRAINT = "WORDPRESS-ROLE-NAME"
            // =================================================================

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_constraint = array(
            //          'method'    =>  'wordpress-role-name'
            //          'args'      =>  array(
            //                              'question_optional' =>  TRUE/FALSE
            //                              )
            //          //  "instance", if specified, is ignored
            //          )
            //
            // -----------------------------------------------------------------

            // -------------------------------------------------------------------------
            // check_and_default_the_args(
            //      $safe_dataset_title                     ,
            //      $safe_array_storage_field_slug          ,
            //      $safe_array_storage_field_title         ,
            //      $adding_editing                         ,
            //      $constraint_number                      ,
            //      $expected_members_and_their_defaults    ,
            //      &$this_constraint
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - -
            // $expected_members_and_their_defaults is like (eg):-
            //
            //      $expected_members_and_their_defaults = array(
            //          'question_optional'     =>  array(
            //                                          'allowed_types'     =>  array( 'boolean' )     ,
            //                                          'default_value'     =>  FALSE
            //                                          )
            //          'asterisk_means_all'    =>  array(
            //                                          'allowed_types'     =>  array( 'boolean' )     ,
            //                                          'default_value'     =>  FALSE
            //                                          )
            //          )
            //
            // RETURNS
            //      o   On SUCCESS
            //              TRUE
            //
            //      o   On FAILURE
            //              $error_message STRING
            // -------------------------------------------------------------------------

            $expected_members_and_their_defaults = array(
                'question_optional'     =>  array(
                                                'allowed_types'     =>  array( 'boolean' )     ,
                                                'default_value'     =>  FALSE
                                                )
                ) ;

            // -----------------------------------------------------------------

            $result = check_and_default_the_args(
                            $safe_dataset_title                     ,
                            $safe_array_storage_field_slug          ,
                            $safe_array_storage_field_title         ,
                            $adding_editing                         ,
                            $constraint_number                      ,
                            $expected_members_and_their_defaults    ,
                            $this_constraint
                            ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

            if ( trim( $new_or_existing_field_value ) === '' ) {

                // -------------------------------------------------------------

                if ( $this_constraint['args']['question_optional'] !== TRUE ) {

                    return <<<EOT
--ZEBRA--Please enter a WordPress role name into the "{$safe_array_storage_field_title}" field
EOT;

                }

                // -------------------------------------------------------------

            } else {

                // -------------------------------------------------------------

                global $wp_roles;

                // -------------------------------------------------------------

                if ( ! array_key_exists( $new_or_existing_field_value , $wp_roles->roles ) ) {

                    return <<<EOT
--ZEBRA--Bad "{$safe_array_storage_field_title}" ("{$safe_new_or_existing_field_value}" - a WordPress role name was expected)
EOT;

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'comma-separated-list-of-wordpress-role-names' ) {

            // =================================================================
            // FIELD CONSTRAINT = "COMMA-SEPARATED-LIST-OF-WORDPRESS-ROLE-NAMES"
            // =================================================================

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_constraint = array(
            //          'method'    =>  'comma-separated-list-of-wordpress-role-names'
            //          'args'      =>  array(
            //                              'question_optional'     =>  TRUE/FALSE      ,
            //                              'asterisk_means_all'    =>  TRUE/FALSE
            //                              )
            //          //  "instance", if specified, is ignored
            //          )
            //
            // -----------------------------------------------------------------

            // -------------------------------------------------------------------------
            // check_and_default_the_args(
            //      $safe_dataset_title                     ,
            //      $safe_array_storage_field_slug          ,
            //      $safe_array_storage_field_title         ,
            //      $adding_editing                         ,
            //      $constraint_number                      ,
            //      $expected_members_and_their_defaults    ,
            //      &$this_constraint
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - -
            // $expected_members_and_their_defaults is like (eg):-
            //
            //      $expected_members_and_their_defaults = array(
            //          'question_optional'     =>  array(
            //                                          'allowed_types'     =>  array( 'boolean' )     ,
            //                                          'default_value'     =>  FALSE
            //                                          )
            //          'asterisk_means_all'    =>  array(
            //                                          'allowed_types'     =>  array( 'boolean' )     ,
            //                                          'default_value'     =>  FALSE
            //                                          )
            //          )
            //
            // RETURNS
            //      o   On SUCCESS
            //              TRUE
            //
            //      o   On FAILURE
            //              $error_message STRING
            // -------------------------------------------------------------------------

            $expected_members_and_their_defaults = array(
                'question_optional'     =>  array(
                                                'allowed_types'     =>  array( 'boolean' )     ,
                                                'default_value'     =>  FALSE
                                                )   ,
                'asterisk_means_all'    =>  array(
                                                'allowed_types'     =>  array( 'boolean' )     ,
                                                'default_value'     =>  FALSE
                                                )
                ) ;

            // -----------------------------------------------------------------

            $result = check_and_default_the_args(
                            $safe_dataset_title                     ,
                            $safe_array_storage_field_slug          ,
                            $safe_array_storage_field_title         ,
                            $adding_editing                         ,
                            $constraint_number                      ,
                            $expected_members_and_their_defaults    ,
                            $this_constraint
                            ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

            $err_msg = <<<EOT
--ZEBRA--Bad "{$safe_array_storage_field_title}" ("{$safe_new_or_existing_field_value}" -
EOT;

            // -----------------------------------------------------------------

            if ( $this_constraint['args']['question_optional'] ) {

                if ( $this_constraint['args']['asterisk_means_all'] ) {
                    $err_msg .= ' the empty string, "*" or' ;

                } else {
                    $err_msg .= ' the empty string or' ;

                }

            } else {

                if ( $this_constraint['args']['asterisk_means_all'] ) {
                    $err_msg .= ' "*" or' ;

                } else {
                    $err_msg .= '' ;

                }

            }

            // -----------------------------------------------------------------

            $err_msg .= ' a comma-separated list of WordPress role names was expected)' ;

            // -----------------------------------------------------------------

            if ( trim( $new_or_existing_field_value ) === '' ) {

                // -------------------------------------------------------------

                if ( ! $this_constraint['args']['question_optional'] ) {
                    return $err_msg ;
                }

                // -------------------------------------------------------------

            } elseif ( $new_or_existing_field_value === '*' ) {

                // -------------------------------------------------------------

                if ( ! $this_constraint['args']['asterisk_means_all'] ) {
                    return $err_msg ;
                }

                // -------------------------------------------------------------

            } else {

                // -------------------------------------------------------------

                $parts = explode( ',' , $new_or_existing_field_value ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $parts ) ;

                // -------------------------------------------------------------

                global $wp_roles;

                // -------------------------------------------------------------

//              $allowed_role_names = array_keys(
//                                          $wp_roles->roles
//                                          ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $allowed_role_names ) ;

                // -------------------------------------------------------------

                foreach ( $parts as $this_candidate_wordpress_role_name ) {

                    // ---------------------------------------------------------

                    if ( ! array_key_exists( $this_candidate_wordpress_role_name , $wp_roles->roles ) ) {
                        return $err_msg ;
                    }

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'grouped-random-password' ) {

            // =================================================================
            // FIELD CONSTRAINT = "GROUPED-RANDOM-PASSWORD"
            // =================================================================

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_constraint = array(
            //          'method'    =>  'grouped-random-password'
            //          'args'      =>  array(
            //			                    'number_groups'		=>	4		,
            //			                    'chars_per_group'	=>	4		,
            //			                    'group_separator'	=>	'-'		,
            //			                    'lowercase_only'	=>	TRUE
            //			                    )
            //          //  "instance", if specified, is ignored
            //          )
            //
            // Where 'args' is like the $options array for:-
            //      question_grouped_random_password()
            // -----------------------------------------------------------------

            if ( ! array_key_exists( 'args' , $this_constraint ) ) {

                $options = array() ;

            } else {

                if ( ! is_array( $this_constraint['args'] ) ) {

                    return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "{$safe_array_storage_field_title}" ("args" must be a (possibly empty) array)
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                $options = $this_constraint['args']  ;

            }

            // -----------------------------------------------------------------

            require_once( $caller_apps_includes_dir . '/great-kiwi-passwords.php' ) ;

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
            //          'number_groups'     =>  4       ,
            //          'chars_per_group'   =>  4       ,
            //          'group_separator'   =>  '-'     ,
            //          'lowercase_only'    =>  TRUE
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

            $result =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\question_grouped_random_password(
                    $new_or_existing_field_value        ,
                    $options
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

            if ( $result !== TRUE ) {

//              $safe_new_or_existing_field_value = htmlentities( $new_or_existing_field_value ) ;

                $candidate =
                    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\generate_grouped_random_password(
                        $options
                        ) ;

                return <<<EOT
--ZEBRA--Bad "{$safe_array_storage_field_title}" ("{$safe_new_or_existing_field_value}" - a grouped random password like "{$candidate}" was expected)
EOT;

            }

            // -----------------------------------------------------------------

            continue ;          //  Valid grouped random password

            // -----------------------------------------------------------------



        } elseif ( $this_constraint['method'] === 'signed-integer' ) {

            // =================================================================
            // FIELD CONSTRAINT = "SIGNED-INTEGER"
            // =================================================================

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_constraint = array(
            //              'method'    =>  'signed-integer'
            //              'args'      =>  array(
            //                                  'min'               =>  <1+ digits>
            //                                  'max'               =>  <1+ digits>
            //                                  'question_optional' =>  TRUE/FALSE
            //                                  )
            //              //  "instance", if specified, is ignored
            //              )
            //              //  A STRING, INT or FLOAT that's digits only - with
            //              //  optional leading minus sign.  If either "min" and/or
            //              //  "max" are not specified or NULL/FALSE/empty string,
            //              //  then NO such "min"/"max" applies.
            //
            // -----------------------------------------------------------------

            // -------------------------------------------------------------------------
            // is_signed_slash_unsigned_integer(
            //      $caller_apps_includes_dir           ,
            //      $new_or_existing_field_value        ,
            //      $this_constraint                    ,
            //      $question_signed                    ,
            //      $adding_editing                     ,
            //      $safe_dataset_title                 ,
            //      $safe_array_storage_field_title     ,
            //      $safe_array_storage_field_slug
            //      )
            // - - - - - - - - - - - - - - - - - - -
            // RETURNS
            //      On SUCCESS
            //          ARRAY( $str_value STRING )
            //              Where $str_value is $new_or_existing field value converted
            //              to a (signed integer) STRING
            //
            //      On FAILURE
            //          $error_message STRING
            // -------------------------------------------------------------------------

            $question_signed = TRUE ;

            // -----------------------------------------------------------------

            $str_value = is_signed_slash_unsigned_integer(
                                $caller_apps_includes_dir           ,
                                $new_or_existing_field_value        ,
                                $this_constraint                    ,
                                $question_signed                    ,
                                $adding_editing                     ,
                                $safe_dataset_title                 ,
                                $safe_array_storage_field_title     ,
                                $safe_array_storage_field_slug
                                ) ;

            // -----------------------------------------------------------------

            if ( is_string( $str_value ) ) {
                return $str_value ;
            }

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'unsigned-integer' ) {

            // =================================================================
            // FIELD CONSTRAINT = "UNSIGNED-INTEGER"
            // =================================================================

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_constraint = array(
            //              'method'    =>  'unsigned-integer'
            //              'args'      =>  array(
            //                                  'min'               =>  <1+ digits>
            //                                  'max'               =>  <1+ digits>
            //                                  'question_optional' =>  TRUE/FALSE
            //                                  )
            //              //  "instance", if specified, is ignored
            //              )
            //              //  A STRING, INT or FLOAT that's digits only (and has NO
            //              //  leading minus sign).  If either "min" and/or "max" are
            //              //  not specified or NULL/FALSE/empty string, then NO such
            //              //  "min"/"max" applies.
            //
            // -----------------------------------------------------------------

            // -------------------------------------------------------------------------
            // is_signed_slash_unsigned_integer(
            //      $caller_apps_includes_dir           ,
            //      $new_or_existing_field_value        ,
            //      $this_constraint                    ,
            //      $question_signed                    ,
            //      $adding_editing                     ,
            //      $safe_dataset_title                 ,
            //      $safe_array_storage_field_title     ,
            //      $safe_array_storage_field_slug
            //      )
            // - - - - - - - - - - - - - - - - - - -
            // RETURNS
            //      On SUCCESS
            //          ARRAY( $str_value STRING )
            //              Where $str_value is $new_or_existing field value converted
            //              to a (signed integer) STRING
            //
            //      On FAILURE
            //          $error_message STRING
            // -------------------------------------------------------------------------

            $question_signed = FALSE ;

            // -----------------------------------------------------------------

            $str_value = is_signed_slash_unsigned_integer(
                                $caller_apps_includes_dir           ,
                                $new_or_existing_field_value        ,
                                $this_constraint                    ,
                                $question_signed                    ,
                                $adding_editing                     ,
                                $safe_dataset_title                 ,
                                $safe_array_storage_field_title     ,
                                $safe_array_storage_field_slug
                                ) ;

            // -----------------------------------------------------------------

            if ( is_string( $str_value ) ) {
                return $str_value ;
            }

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'dashed-name' ) {

            // =================================================================
            // FIELD CONSTRAINT = "DASHED-NAME"
            // =================================================================

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_constraint = array(
            //          'method'    =>  'dashed-name'
            //          //  "args" and "instance", if specified, are ignored
            //          )
            //
            // -----------------------------------------------------------------

            // -----------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\
            // ctype_dashed_name( $value )
            // - - - - - - - - - - - - - -
            // Lowercase alphanumeric characters and dash only.
            // No leading, trailing or double dashes.
            // No leading numerics (perhaps not necessary - but let's be safe)
            //
            // RETURNS
            //      TRUE or FALSE
            // -----------------------------------------------------------------------

            if ( ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_dashed_name(
                        $new_or_existing_field_value
                        )
                ) {

//              $safe_new_or_existing_field_value = htmlentities( $new_or_existing_field_value ) ;

                return <<<EOT
--ZEBRA--Bad "{$safe_array_storage_field_title}" ({$safe_new_or_existing_field_value}).&nbsp; Must have lowercase alphanumeric characters only (and optionally dash/minus ("-") as word separator).&nbsp; No spaces.&nbsp; Eg; "welcome", "jenny99", "hello-world".
EOT;

            }

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'notags' ) {

            // =================================================================
            // FIELD CONSTRAINT = "NOTAGS"
            // =================================================================

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_constraint = array(
            //          'method'    =>  'notags'
            //          //  "args" and "instance", if specified, are ignored
            //          )
            //
            // -----------------------------------------------------------------

            // -------------------------------------------------------------------------
            // string strip_tags ( string $str [, string $allowable_tags ] )
            // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
            // This function tries to return a string with all NULL bytes, HTML and PHP
            // tags stripped from a given str. It uses the same tag stripping state
            // machine as the fgetss() function.
            //
            //      str
            //          The input string.
            //
            //      allowable_tags
            //          You can use the optional second parameter to specify tags which
            //          should not be stripped.
            //
            //          Note:   HTML comments and PHP tags are also stripped. This is
            //                  hardcoded and can not be changed with allowable_tags.
            //
            //          Note:   This parameter should not contain whitespace.
            //                  strip_tags() sees a tag as a case-insensitive string
            //                  between < and the first whitespace or >. It means that
            //                  strip_tags("<br/>", "<br>") returns an empty string.
            //
            // Returns the stripped string.
            //
            // (PHP 4, PHP 5)
            // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $new_or_existing_field_value ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( htmlentities( $new_or_existing_field_value ) ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( \strip_tags( $new_or_existing_field_value ) ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( htmlentities( \strip_tags( $new_or_existing_field_value ) ) ) ;

//exit() ;

            if ( \strip_tags( $new_or_existing_field_value ) !== $new_or_existing_field_value ) {

                return <<<EOT
--ZEBRA--Bad "{$safe_array_storage_field_title}" (no HTML allowed)
EOT;

            }

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        } elseif ( $this_constraint['method'] === 'sequential-id' ) {

            // =================================================================
            // FIELD CONSTRAINT = "SEQUENTIAL-ID"
            // =================================================================

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_constraint = array(
            //          'method'    =>  'sequential-id'     ,
            //          'args'      =>  array(
            //                              'or_empty_string'   =>  TRUE / FALSE
            //                              'or_blank_string'   =>  TRUE / FALSE
            //                              )
            //          )
            //
            // -----------------------------------------------------------------

            $or_empty_string = FALSE ;
            $or_blank_string = FALSE ;

            // -----------------------------------------------------------------

            if ( array_key_exists( 'args' , $this_constraint ) ) {

                // -------------------------------------------------------------

                if ( ! is_array( $this_constraint['args'] ) ) {

                    return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "{$safe_array_storage_field_title}" + "constraints" + "args" (must be a (possibly empty) array)
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // -------------------------------------------------------------

                if ( array_key_exists( 'or_empty_string' , $this_constraint['args'] ) ) {

                    // ---------------------------------------------------------

                    if ( ! is_bool( $this_constraint['args']['or_empty_string'] ) ) {

                        return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "{$safe_array_storage_field_title}" + "constraints" + "args" + "or_empty_string" (boolean expected)
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                    }

                    // ---------------------------------------------------------

                    $or_empty_string = $this_constraint['args']['or_empty_string'] ;

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

                if ( array_key_exists( 'or_blank_string' , $this_constraint['args'] ) ) {

                    // ---------------------------------------------------------

                    if ( ! is_bool( $this_constraint['args']['or_blank_string'] ) ) {

                        return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "{$safe_array_storage_field_title}" + "constraints" + "args" + "or_blank_string" (boolean expected)
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                    }

                    // ---------------------------------------------------------

                    $or_blank_string = $this_constraint['args']['or_blank_string'] ;

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            if (    $or_empty_string
                    &&
                    $new_or_existing_field_value === ''
                ) {
                continue ;
            }

            // -----------------------------------------------------------------

            if (    $or_blank_string
                    &&
                    trim( $new_or_existing_field_value ) === ''
                ) {
                continue ;
            }

            // -----------------------------------------------------------------

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

            if ( ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\question_sequential_id(
                        $new_or_existing_field_value === ''
                        )
                ) {

                return <<<EOT
--ZEBRA--Bad "{$safe_array_storage_field_title}" (sequential ID expected)
EOT;

            }

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        } else {

            // =================================================================
            // ERROR
            // =================================================================

            $safe_constraint_method = htmlentities( $this_constraint['method'] ) ;

            return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Unrecognised/unsupported "array_storage_record_structure" + "constraints" + "method" - for constraint# {$constraint_number} ("{$safe_constraint_method}")
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            // -----------------------------------------------------------------

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
// is_signed_slash_unsigned_integer()
// =============================================================================

function is_signed_slash_unsigned_integer(
    $caller_apps_includes_dir           ,
    $new_or_existing_field_value        ,
    $this_constraint                    ,
    $question_signed                    ,
    $adding_editing                     ,
    $safe_dataset_title                 ,
    $safe_array_storage_field_title     ,
    $safe_array_storage_field_slug
    ) {

    // -------------------------------------------------------------------------
    // is_signed_slash_unsigned_integer(
    //      $caller_apps_includes_dir           ,
    //      $new_or_existing_field_value        ,
    //      $this_constraint                    ,
    //      $question_signed                    ,
    //      $adding_editing                     ,
    //      $safe_dataset_title                 ,
    //      $safe_array_storage_field_title     ,
    //      $safe_array_storage_field_slug
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          ARRAY( $str_value STRING )
    //              Where $str_value is $new_or_existing field value converted
    //              to a (signed integer) STRING
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__ ;

    // -------------------------------------------------------------------------

    $safe_new_or_existing_field_value = htmlentities( $new_or_existing_field_value ) ;

    // -----------------------------------------------------------------

    if ( ! array_key_exists( 'args' , $this_constraint ) ) {

        return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "{$safe_array_storage_field_title}" (no "args")
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -----------------------------------------------------------------

    if ( ! is_array( $this_constraint['args'] ) ) {

        return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "{$safe_array_storage_field_title}" + "args" (array expected)
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -----------------------------------------------------------------

    if (    trim( $new_or_existing_field_value ) === ''
            &&
            array_key_exists( 'question_optional' , $this_constraint['args'] )
            &&
            $this_constraint['args']['question_optional'] === TRUE
        ) {
        return array( '' ) ;
    }

    // -----------------------------------------------------------------

    require_once( $caller_apps_includes_dir . '/number-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_numberSupport\
    // is_signed_integer(
    //      $value
    //      )
    // - - - - - - - - -
    // The input $value must be either:-
    //      o   INT
    //      o   STRING, or;
    //      o   FLOAT
    //
    // So long as it:-
    //      o   Consists of DIGITS only - with an OPTIONAL leading
    //          minus ("-") sign, and;
    //      o   There is at least ONE digit.
    //
    // Eg:-
    //      0
    //      -123
    //      "456"
    //      -99999
    //      "1234567890123456789012345678901234567890"
    //      "-1234567890123456789012345678901234567890"
    //
    // There is no limit as to how many digits there are.  So a string of
    // digits as handled by BCMATH is OK.
    //
    // RETURNS
    //      On SUCCESS
    //          $str_value STRING
    //              The input value, converted into string form.
    //
    //      On FAILURE
    //          FALSE
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_numberSupport\
    // is_unsigned_integer(
    //      $value
    //      )
    // - - - - - - - - -
    // The input $value must be either:-
    //      o   INT
    //      o   STRING, or;
    //      o   FLOAT
    //
    // So long as it:-
    //      o   Consists of DIGITS only, and;
    //      o   There is at least ONE digit.
    //
    // Eg:-
    //      0
    //      123
    //      "456"
    //      99999
    //      "1234567890123456789012345678901234567890"
    //
    // There is no limit as to how many digits there are.  So a string of
    // digits as handled by BCMATH is OK.
    //
    // RETURNS
    //      On SUCCESS
    //          $str_value STRING
    //              The input value, converted into string form.
    //
    //      On FAILURE
    //          FALSE
    // -------------------------------------------------------------------------

    if ( $question_signed ) {

        $str_value =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_numberSupport\is_signed_integer(
                    $new_or_existing_field_value
                    ) ;

    } else {

        $str_value =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_numberSupport\is_unsigned_integer(
                    $new_or_existing_field_value
                    ) ;

    }

    // -----------------------------------------------------------------

    if ( $str_value === FALSE ) {

        if ( $question_signed ) {
            $msg = 'A signed number (digits only, with optional leading minus sign,) is required.' ;

        } else {
            $msg = 'An unsigned number (0, 1, 2...) is required.' ;

        }

        return <<<EOT
--ZEBRA--Bad "{$safe_array_storage_field_title}" ({$safe_new_or_existing_field_value}).&nbsp; {$msg}
EOT;

    }

    // -----------------------------------------------------------------

    if ( ! array_key_exists( 'min' , $this_constraint['args'] ) ) {

        return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "{$safe_array_storage_field_title}" + "args" (no "min")
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -----------------------------------------------------------------

    if ( ! array_key_exists( 'max' , $this_constraint['args'] ) ) {

        return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "{$safe_array_storage_field_title}" + "args" (no "max")
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -----------------------------------------------------------------

    $str_constraint_min =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_numberSupport\is_signed_integer(
            $this_constraint['args']['min']
            ) ;

    // -----------------------------------------------------------------

    if ( $str_constraint_min === FALSE ) {

        return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "{$safe_array_storage_field_title}" + "args" + "min" (signed integer expected)
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -----------------------------------------------------------------

    $str_constraint_max =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_numberSupport\is_signed_integer(
            $this_constraint['args']['max']
            ) ;

    // -----------------------------------------------------------------

    if ( $str_constraint_max === FALSE ) {

        return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "{$safe_array_storage_field_title}" + "args" + "max" (signed integer expected)
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -----------------------------------------------------------------

    if ( \bccomp( $str_constraint_min , $str_constraint_max ) > 1 ) {

        return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad "{$safe_array_storage_field_title}" + "args" + "min" and/or "{$safe_array_storage_field_title}" + "args" + "max" ("min" must be less than or equal to "max")
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -----------------------------------------------------------------

    if (    \bccomp( $str_value , $str_constraint_min ) < 0
            ||
            \bccomp( $str_value , $str_constraint_max ) > 0
        ) {

        return <<<EOT
--ZEBRA--Bad "{$safe_array_storage_field_title}" ({$safe_new_or_existing_field_value}).&nbsp; A number in the range {$str_constraint_min} to {$str_constraint_max} is required.
EOT;

    }

    // -----------------------------------------------------------------

    return array( $str_value ) ;

    // -----------------------------------------------------------------

}

// =============================================================================
// is_mysql_record_id_type_int()
// =============================================================================

function is_mysql_record_id_type_int(
    $safe_array_storage_field_slug          ,
    $safe_array_storage_field_title         ,
    $safe_new_or_existing_field_value       ,
    $new_or_existing_field_value
    ) {

    // -------------------------------------------------------------------------
    // is_mysql_record_id_type_int(
    //      $safe_array_storage_field_slug          ,
    //      $safe_array_storage_field_title         ,
    //      $safe_new_or_existing_field_value       ,
    //      $new_or_existing_field_value
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      o   On SUCCESS
    //              TRUE
    //
    //      o   On FAILURE
    //              $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Acc. to:-
    //      http://dev.mysql.com/doc/refman/5.1/en/integer-types.html
    //
    // the MySQL INT data type is:-
    //      4 bytes
    //      -2,147,483,648 to 2,147,483,647 (signed)
 	//      0 to 4,294,967,295              (unsigned)
    //
    // - which is the same as PHP INT.
    //
    // A MySQL record ID is 1+.
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // int bccomp ( string $left_operand = "" , string $right_operand = "" [, int $scale = int ] )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Compares the left_operand to the right_operand and returns the result as
    // an integer.
    //
    //      left_operand
    //          The left operand, as a string.
    //
    //      right_operand
    //          The right operand, as a string.
    //
    //      scale
    //          The optional scale parameter is used to set the number of digits
    //          after the decimal place which will be used in the comparison.
    //
    // Returns 0 if the two operands are equal, 1 if the left_operand is larger
    // than the right_operand, -1 otherwise.
    //
    // (PHP 4, PHP 5)
    // -------------------------------------------------------------------------

    if (    trim( $new_or_existing_field_value ) === ''
            ||
            ! \ctype_digit( $new_or_existing_field_value )
            ||
            \bccomp( $new_or_existing_field_value , '1' , 0 ) < 0
            ||
            \bccomp( $new_or_existing_field_value , '4294967295' , 0 ) > 0
        ) {

        return <<<EOT
--ZEBRA--Bad "{$safe_array_storage_field_title}" ("{$safe_new_or_existing_field_value}" - a MySQL INT type record ID was expected)
EOT;

    }

    // -----------------------------------------------------------------

    return TRUE ;

    // -----------------------------------------------------------------

}

// =============================================================================
// is_mysql_record_id_type_bigint()
// =============================================================================

function is_mysql_record_id_type_bigint(
    $safe_array_storage_field_slug          ,
    $safe_array_storage_field_title         ,
    $safe_new_or_existing_field_value       ,
    $new_or_existing_field_value
    ) {

    // -------------------------------------------------------------------------
    // is_mysql_record_id_type_bigint(
    //      $safe_array_storage_field_slug          ,
    //      $safe_array_storage_field_title         ,
    //      $safe_new_or_existing_field_value       ,
    //      $new_or_existing_field_value
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      o   On SUCCESS
    //              TRUE
    //
    //      o   On FAILURE
    //              $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Acc. to:-
    //      http://dev.mysql.com/doc/refman/5.1/en/integer-types.html
    //
    // the MySQL BIGINT data type is:-
    //      8 bytes
    //      -9,223,372,036,854,775,808 to 9,223,372,036,854,775,807 (signed)
 	//      0 to 18,446,744,073,709,551,615                         (unsigned)
    //
    // So we need to handle this with PHP's BCMATH.
    //
    // A MySQL record ID is 1+.
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // int bccomp ( string $left_operand = "" , string $right_operand = "" [, int $scale = int ] )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Compares the left_operand to the right_operand and returns the result as
    // an integer.
    //
    //      left_operand
    //          The left operand, as a string.
    //
    //      right_operand
    //          The right operand, as a string.
    //
    //      scale
    //          The optional scale parameter is used to set the number of digits
    //          after the decimal place which will be used in the comparison.
    //
    // Returns 0 if the two operands are equal, 1 if the left_operand is larger
    // than the right_operand, -1 otherwise.
    //
    // (PHP 4, PHP 5)
    // -------------------------------------------------------------------------

    if (    trim( $new_or_existing_field_value ) === ''
            ||
            ! \ctype_digit( $new_or_existing_field_value )
            ||
            \bccomp( $new_or_existing_field_value , '1' , 0 ) < 0
            ||
            \bccomp( $new_or_existing_field_value , '18446744073709551615' , 0 ) > 0
        ) {

        return <<<EOT
--ZEBRA--Bad "{$safe_array_storage_field_title}" ("{$safe_new_or_existing_field_value}" - a MySQL BIGINT type record ID was expected)
EOT;

    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// check_and_default_the_args()
// =============================================================================

function check_and_default_the_args(
    $safe_dataset_title                     ,
    $safe_array_storage_field_slug          ,
    $safe_array_storage_field_title         ,
    $adding_editing                         ,
    $constraint_number                      ,
    $expected_members_and_their_defaults    ,
    &$this_constraint
    ) {

    // -------------------------------------------------------------------------
    // check_and_default_the_args(
    //      $safe_dataset_title                     ,
    //      $safe_array_storage_field_slug          ,
    //      $safe_array_storage_field_title         ,
    //      $adding_editing                         ,
    //      $constraint_number                      ,
    //      $expected_members_and_their_defaults    ,
    //      &$this_constraint
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // $expected_members_and_their_defaults is like (eg):-
    //
    //      $expected_members_and_their_defaults = array(
    //          'question_optional'     =>  array(
    //                                          'allowed_types'     =>  array( 'boolean' )     ,
    //                                          'default_value'     =>  FALSE
    //                                          )
    //          'asterisk_means_all'    =>  array(
    //                                          'allowed_types'     =>  array( 'boolean' )     ,
    //                                          'default_value'     =>  FALSE
    //                                          )
    //          )
    //
    // RETURNS
    //      o   On SUCCESS
    //              TRUE
    //
    //      o   On FAILURE
    //              $error_message STRING
    // -------------------------------------------------------------------------

    if ( ! array_key_exists( 'args' , $this_constraint ) ) {
        $this_constraint['args'] = $expected_members_and_their_defaults ;
        return TRUE ;
    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $this_constraint ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $expected_members_and_their_defaults ) ;

    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    if ( ! is_array( $this_constraint['args'] ) ) {

        return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad array storage field constraint# {$constraint_number} + "args" (array expected)
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    foreach ( $expected_members_and_their_defaults as $expected_name => $expected_details ) {

        // ---------------------------------------------------------------------

        if ( array_key_exists( $expected_name , $this_constraint['args'] ) ) {

            // -----------------------------------------------------------------

            $args_value = $this_constraint['args'][ $expected_name ] ;

            // -----------------------------------------------------------------

            $args_values_type = \gettype( $args_value ) ;

            // -----------------------------------------------------------------

            if ( ! in_array( $args_values_type , $expected_details['allowed_types'] , TRUE ) ) {

                return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad array storage field constraint# {$constraint_number} + "args" + "{$expected_name}" (type "{$args_values_type}" not supported)
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            $this_constraint['args'][ $expected_name ] = $expected_details['default_value'] ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    foreach ( $this_constraint['args'] as $actual_name => $actual_value ) {

        // ---------------------------------------------------------------------

        if ( ! array_key_exists( $actual_name , $expected_members_and_their_defaults ) ) {

            $safe_actual_name = htmlentities( $actual_name ) ;

            return <<<EOT
PROBLEM {$adding_editing} Dataset Record:&nbsp; Bad array storage field constraint "args" (contains unrecognised/unsupported key: "{$safe_actual_name}")
For dataset:&nbsp; {$safe_dataset_title}
and array storage field:&nbsp; {$safe_array_storage_field_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

