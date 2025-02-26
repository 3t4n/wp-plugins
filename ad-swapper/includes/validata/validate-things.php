<?php

// *****************************************************************************
// VALIDATA.APP / INCLUDES / VALIDATA / VALIDATE-THINGS.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_validata ;

// =============================================================================
// validate_associative_array()
// =============================================================================

function validate_associative_array(
    $core_plugapp_dirs                  ,
    $record_structure_slug              ,
    $associative_array_to_validate      ,
    $caller_ns                          ,
    $caller_fn                          ,
    $caller_ln
    ) {

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

    $array_of_records_to_validate = array(
        $associative_array_to_validate
        ) ;

    // -------------------------------------------------------------------------

    return validate_array_of_records(
                $core_plugapp_dirs                  ,
                $record_structure_slug              ,
                $array_of_records_to_validate       ,
                $caller_ns                          ,
                $caller_fn                          ,
                $caller_ln
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// validate_associative_array_base()
// =============================================================================

function validate_associative_array_base(
    $record_structure_slug              ,
    $associative_array_to_validate      ,
    $required_field_defs_by_slug        ,
    $optional_field_defs_by_slug        ,
    $all_field_slugs
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validata\
    // validate_associative_array_base(
    //      $record_structure_slug              ,
    //      $associative_array_to_validate      ,
    //      $required_field_defs_by_slug        ,
    //      $optional_field_defs_by_slug        ,
    //      $all_field_slugs
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //
    //      On FALSE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $required_field_defs / $optional_field_defs = Array(
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]       => 1433991664
    //                      [last_modified_server_datetime_utc] => 1433991664
    //                      [key]                               => ab09035e-491c-409b-8640-d057d6e74b22-1433991664-474765-1874
    //                      [record_structure_key]              => 33e34a41-347c-44db-af16-fd2b84955f62-1433991597-629799-1873
    //                      [slug]                              => local_key
    //                      [question_required]                 => 1
    //                      [function_name]                     => hex_string__case_minlen_maxlen_questionemptyok
    //                      [args]                              => Array(
    //                                                                  [0] => lower
    //                                                                  [1] => 64
    //                                                                  [2] => 64
    //                                                                  [3] =>
    //                                                                  )
    //                      [sequence_number]                   => 10
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $associative_array_to_validate , '$associative_array_to_validate' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $required_field_defs_by_slug   , '$required_field_defs_by_slug'   ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $optional_field_defs_by_slug   , '$optional_field_defs_by_slug'   ) ;

    // -------------------------------------------------------------------------
    // mixed call_user_func_array ( callable $callback , array $param_arr )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Calls the callback given by the first parameter with the parameters in
    // param_arr.
    //
    //      callback
    //          The callable to be called.
    //
    //      param_arr
    //          The parameters to be passed to the callback, as an indexed
    //          array.
    //
    // Returns the return value of the callback, or FALSE on error.
    //
    // (PHP 4 >= 4.0.4, PHP 5)
    //
    // CHANGELOG
    //
    //      Version     Description
    //      5.3.0   The interpretation of object oriented keywords like parent and self has changed. Previously, calling them using the double colon syntax would emit an E_STRICT warning because they were interpreted as static.
    //
    // EXAMPLES
    //
    //      Call the foobar() function with 2 arguments
    //      call_user_func_array("foobar", array("one", "two"));
    //
    //      As of PHP 5.3.0
    //      call_user_func_array(__NAMESPACE__ .'\Foo::test', array('Hannes'));
    //
    //      As of PHP 5.3.0
    //      call_user_func_array(array(__NAMESPACE__ .'\Foo', 'test'), array('Philip'));
    //
    // Note:    Before PHP 5.4, referenced variables in param_arr are passed to
    //          the function by reference, regardless of whether the function
    //          expects the respective parameter to be passed by reference. This
    //          form of call-time pass by reference does not emit a deprecation
    //          notice, but it is nonetheless deprecated, and has been removed
    //          in PHP 5.4. Furthermore, this does not apply to internal
    //          functions, for which the function signature is honored. Passing
    //          by value when the function expects a parameter by reference
    //          results in a warning and having call_user_func() return FALSE
    //          (there is, however, an exception for passed values with
    //          reference count = 1, such as in literals, as these can be turned
    //          into references without ill effects — but also without writes
    //          to that value having any effect —; do not rely in this
    //          behavior, though, as the reference count is an implementation
    //          detail and the soundness of this behavior is questionable).
    //
    // Note:    Callbacks registered with functions such as call_user_func() and
    //          call_user_func_array() will not be called if there is an
    //          uncaught exception thrown in a previous callback.
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    require_once( dirname( __FILE__ ) . '/load-validation-functions.php' ) ;

    // -------------------------------------------------------------------------

    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validata\load_validation_functions() ;

    // =========================================================================
    // Loop over the array to be checked's fields, validating each one in
    // turn...
    // =========================================================================

    $required_field_slugs_found = array() ;

    // -------------------------------------------------------------------------

    foreach ( $associative_array_to_validate as $name => $value ) {

        // ---------------------------------------------------------------------

        if (    array_key_exists(
                    $name                           ,
                    $required_field_defs_by_slug
                    )
            ) {

            // -----------------------------------------------------------------
            // REQUIRED
            // -----------------------------------------------------------------

            $this_field_def = $required_field_defs_by_slug[ $name ] ;

            // -----------------------------------------------------------------

            $required_field_slugs_found[] = $name ;

            // -----------------------------------------------------------------

        } elseif (  array_key_exists(
                        $name                           ,
                        $optional_field_defs_by_slug
                        )
            ) {

            // -----------------------------------------------------------------
            // OPTIONAL
            // -----------------------------------------------------------------

            $this_field_def = $optional_field_defs_by_slug[ $name ] ;

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------
            // UNWANTED
            // -----------------------------------------------------------------

            $ln = __LINE__ - 6 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "{$record_structure_slug}" record:&nbsp; Contains unknown field:&nbsp; "{$name}"
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // CHECK THE VALUE...
        // ---------------------------------------------------------------------

        $vfn =
            '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\\' .
            $this_field_def['function_name']
            ;
            //  "vfn" = Validation Function Name

//echo h1( $vfn ) ;

        // ---------------------------------------------------------------------

        if ( ! function_exists( $vfn ) ) {

            $ln = __LINE__ - 2 ;

            return <<<EOT
PROBLEM validating "{$record_structure_slug}" record:&nbsp; Validation function not found
For field slug:&nbsp; {$name}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        $args = $this_field_def['args'] ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $args , $args ) ;

        // ---------------------------------------------------------------------

        array_unshift( $args , $value ) ;
            //  $value to pushed to start of array (becomes new first
            //  element)

        // ---------------------------------------------------------------------

        $result = call_user_func_array( $vfn , $args ) ;
                        //  Returns the return value of the callback, or
                        //  FALSE on error.

        // ---------------------------------------------------------------------

        if ( $result === FALSE ) {

            $ln = __LINE__ - 2 ;

            return <<<EOT
PROBLEM validating "{$record_structure_slug}" record:&nbsp; Validation function call failure
For field slug:&nbsp; {$name}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {

            $haystack    = $result    ;
            $needle      = 'PROBLEM:' ;
            $ignore_case = FALSE      ;

            if (    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\contains(
                        $haystack       ,
                        $needle         ,
                        $ignore_case
                        )
                ) {

                return $result ;

            } else {

                return <<<EOT
PROBLEM:&nbsp; Bad "$name" field value
{$result}
EOT;

            }

        }

        // ---------------------------------------------------------------------
        // REPEAT with the next name=value pair (in the associative array being
        // checked) - if there is one...
        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Are all the REQUIRED fields present ?
    // =========================================================================

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $required_field_slugs_found , '$required_field_slugs_found' ) ;

    if (    count( $required_field_slugs_found )
            <
            count( $required_field_defs_by_slug )
        ) {

        // ---------------------------------------------------------------------

        $ln = __LINE__ - 6 ;

        // ---------------------------------------------------------------------

        $missing_fields = '' ;

        foreach ( $required_field_defs_by_slug as $slug => $def ) {

            if ( ! in_array( $slug , $required_field_slugs_found , TRUE ) ) {

                $missing_fields .= <<<EOT
<li>{$slug}</li>
EOT;

            }

        }

        // ---------------------------------------------------------------------

        return <<<EOT
PROBLEM:&nbsp; Bad "{$record_structure_slug}" record:&nbsp; The following required fields are missing:-<ul style="margin-top:0; margin-bottom:0">{$missing_fields}</ul>
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

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
// validate_array_of_records()
// =============================================================================

function validate_array_of_records(
    $core_plugapp_dirs                  ,
    $record_structure_slug              ,
    $array_of_records_to_validate       ,
    $caller_ns                          ,
    $caller_fn                          ,
    $caller_ln
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validata\
    // validate_array_of_records(
    //      $core_plugapp_dirs                  ,
    //      $record_structure_slug              ,
    //      $array_of_records_to_validate       ,
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

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Get the VALIDATA FIELDS...
    // =========================================================================

    $filespec =
        $core_plugapp_dirs['apps_plugin_stuff_dir'] .
        '/validata/field-defs-4-' .
        $record_structure_slug .
        '.php'
        ;

//echo h2( $filespec ) ;

    // -------------------------------------------------------------------------

    if ( ! is_file( $filespec ) ) {

        $ln = __LINE__ ;

        return <<<EOT
PROBLEM validating "{$record_structure_slug}":&nbsp; <b>Field defs file not found</b>

<b>Detected in</b>:&nbsp; \\{$ns}\\{$fn}() near line {$ln}

<b>Validator called from</b>:&nbsp; \\{$caller_ns}\\{$caller_fn}() near line {$caller_ln}
EOT;


    }

    // -------------------------------------------------------------------------

    require_once( $filespec ) ;
        //  The field defs are store as executable PHP code (created by
        //  "var_export()").

    // -------------------------------------------------------------------------

    $varname = str_replace( '-' , '_' , $record_structure_slug ) ;

    // -------------------------------------------------------------------------

    $varname = <<<EOT
field_defs_4_{$varname}
EOT;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $$varname =
    //      $field_defs_4_ad_swapper_central_incoming_ad_slots =
    //      Array(
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]       => 1433991664
    //                      [last_modified_server_datetime_utc] => 1433991664
    //                      [key]                               => ab09035e-491c-409b-8640-d057d6e74b22-1433991664-474765-1874
    //                      [record_structure_key]              => 33e34a41-347c-44db-af16-fd2b84955f62-1433991597-629799-1873
    //                      [slug]                              => local_key
    //                      [question_required]                 => 1
    //                      [function_name]                     => hex_string__case_minlen_maxlen_questionemptyok
    //                      [args]                              => Array(
    //                                                                  [0] => lower
    //                                                                  [1] => 64
    //                                                                  [2] => 64
    //                                                                  [3] =>
    //                                                                  )
    //                      [sequence_number]                   => 10
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $$varname , $varname ) ;

    // -------------------------------------------------------------------------

    $field_defs = $$varname ;
        //  Simplify the varname...

    // =========================================================================
    // Split the field defs into required and optional - where the required
    // and optional fields are indexed by slug...
    //
    // Also, get ALL the field slugs...
    // =========================================================================

    $required_field_defs_by_slug = array() ;
    $optional_field_defs_by_slug = array() ;

    // -------------------------------------------------------------------------

    $all_field_slugs = array() ;

    // -------------------------------------------------------------------------

    foreach ( $field_defs as $this_field_def ) {

        // ---------------------------------------------------------------------

        if ( $this_field_def['question_required'] ) {
            $required_field_defs_by_slug[ $this_field_def['slug'] ] = $this_field_def ;

        } else {
            $optional_field_defs_by_slug[ $this_field_def['slug'] ] = $this_field_def ;

        }

        // ---------------------------------------------------------------------

        if ( ! in_array( $this_field_def['slug'] , $all_field_slugs , TRUE ) ) {
            $all_field_slugs[] = $this_field_def['slug'] ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Loop over the array's records, checking each one...
    // =========================================================================

    foreach ( $array_of_records_to_validate as $this_record ) {

        // ---------------------------------------------------------------------

        $result = validate_associative_array_base(
                        $record_structure_slug              ,
                        $this_record                        ,
                        $required_field_defs_by_slug        ,
                        $optional_field_defs_by_slug        ,
                        $all_field_slugs
                        ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
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

