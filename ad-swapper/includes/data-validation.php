<?php

// *****************************************************************************
// INCLUDES / DATA-VALIDATION.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_dataValidation ;

// =============================================================================
// question_valid()
// =============================================================================

function question_valid(
    $php_type_criteria                              ,
    $string_criteria                                ,
    $value                                          ,
    $plugin_specific_string_validators = array()
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_dataValidation\
    // question_valid(
    //      $php_type_criteria                              ,
    //      $string_criteria                                ,
    //      $value                                          ,
    //      $plugin_specific_string_validators = array()
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // $php_type_criteria must be either:-
    //      o   FALSE, NULL or the empty string ("") - which means that ANY
    //          PHP type will do,
    // or;
    //      o   A string containing one or more of the following (separated
    //          by "|"):-
    //              'array'
    //              'bool'
    //              'callable'
    //              'double'
    //              'float'
    //              'int'
    //              'integer'
    //              'long'
    //              'null'
    //              'numeric'
    //              'object'
    //              'real'
    //              'resource'
    //              'scalar'
    //              'string'
    //
    // For example:-
    //      ""              any PHP type will do.
    //      "int"           value must be a PHP INT
    //      "int|string"    value must be either an INT or a STRING
    //
    // NOTE that there's a "is_xxx()" function for each of the
    // $php_type_criteria specified above.  And it's the corresponding
    // "is_xxx()" function that's called to check if the $value matches the
    // $php_type_criteria.
    //
    // ---
    //
    // $string_criteria must be either:-
    //      o   FALSE, NULL or the empty string ("") - which means that NO
    //          string criteria will be checked,
    // or;
    //      o   A string like (eg):-
    //
    //              "xxx"
    //                  String value must match the "xxx" specified
    //
    //              "xxx{1,8}"
    //                  Ditto, and must be 1 to 8 chars long
    //
    //              "xxx|yyy|zzz|..."
    //                  String must match "xxx" OR "yyy OR "zzz" (etc)
    //
    //              "xxx|yyy{,9}|zzz|..."
    //                  Ditto, and "yyy" must be 0 to 9 chars long
    //
    //              "xxx|yyy{3,}|zzz|..."
    //                  Ditto, and "yyy" must be 3 or more chars long
    //
    //          Where you can put one of:-
    //              "trim:"
    //              "ltrim:"
    //              "rtrim:"
    //          at the start of the string (if you want it trimmed before doing
    //          the string validation).
    //
    //          And where "xxx" is one of:-
    //
    //              //  "ctype_xxx()" based...
    //              'alnum'     =>  'alphanumeric'              ,
    //              'alpha'     =>  'alphabetic'                ,
    //              'cntrl'     =>  'control'                   ,
    //              'digit'     =>  'numeric'                   ,
    //              'graph'     =>  'non-blank, printable'      ,
    //              'lower'     =>  'lowercase'                 ,
    //              'print'     =>  'printable'                 ,
    //              'punct'     =>  'punctuation'               ,
    //              'space'     =>  'space'                     ,
    //              'upper'     =>  'uppercase'                 ,
    //              'xdigit'    =>  'hex digit'
    //
    //              //  "filter_var()" based...
    //              'boolean'
    //              'email'
    //              'ip'
    //              'url'
    //
    //              //  Great Kiwi based #1...
    //              'empty'     -   String is an empty string (no chars at all).
    //                              Eg: ""
    //              '!empty'    -   String is an non-empty string (contains one or more
    //                              (possibly blank) chars.
    //                              Eg: " ", "   ", "abc", " the quick brown fox "
    //              'blank'     -   String contains one or more blank chars.
    //                              Eg: "   "
    //              '!blank'    -   String contains at least one non-blank char.
    //                              Eg: " hello   "
    //
    //              //  Great Kiwi based #2...
    //              ...
    //
    // ---
    //


    // RETURNS
    //      On SUCCESS
    //          TRUE or FALSE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Check the PHP TYPE CRITERIA...
    // =========================================================================

    if ( is_string( $php_type_criteria ) ) {

        // ---------------------------------------------------------------------

        if ( $php_type_criteria !== '' ) {

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //      "int"           value must be a PHP INT
            //      "int|string"    value must be either an INT or a STRING
            // -----------------------------------------------------------------

            $is_xxx = array(
                            'array'         ,
                            'bool'          ,
                            'callable'      ,
                            'double'        ,
                            'float'         ,
                            'int'           ,
                            'integer'       ,
                            'long'          ,
                            'null'          ,
                            'numeric'       ,
                            'object'        ,
                            'real'          ,
                            'resource'      ,
                            'scalar'        ,
                            'string'
                            ) ;

            // -----------------------------------------------------------------

            $groups = explode( '|' , $php_type_criteria ) ;

            // -----------------------------------------------------------------

            $value_matches_criteria = FALSE ;

            // -----------------------------------------------------------------

            foreach ( $groups as $this_xxx ) {

                // -------------------------------------------------------------

                if ( ! in_array( $this_xxx , $is_xxx , TRUE ) ) {

                    $safe_xxx = htmlentities( $this_xxx ) ;

                    return <<<EOT
PROBLEM:&nbsp; Bad "php_type_criteria" (unrecognised/unsupported PHP type "{$safe_xxx}")
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // -------------------------------------------------------------

                $fn = '\is_' . $this_xxx ;

                // -------------------------------------------------------------

                if ( $fn( $value ) ) {
                    $value_matches_criteria = TRUE ;
                    break ;
                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            if ( ! $value_matches_criteria ) {
                return FALSE ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        if (    $php_type_criteria !== FALSE
                &&
                $php_type_criteria !== NULL
            ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "php_type_criteria" (NULL, FALSE or string expected)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------


    // =========================================================================
    // The $string_criteria are only checked if $value is a STRING...
    // =========================================================================

    if ( ! is_string( $value ) ) {
        return TRUE ;
    }

    // =========================================================================
    // Check the STRING CRITERIA (if required)...
    // =========================================================================

    if (    $string_criteria === NULL
            ||
            $string_criteria === FALSE
            ||
            $string_criteria === ''
        ) {
        return TRUE ;
    }

    // -------------------------------------------------------------------------

    if ( ! is_string( $string_criteria ) ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "string_criteria" (string expected)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------
    // Here, $string_criteria should be a string like (eg):-
    //
    //      "xxx"
    //      "xxx{1,8}"
    //      "xxx|yyy|zzz|..."
    //      "xxx|yyy{,9}|zzz|..."
    //      "xxx|yyy{3,}|zzz|..."
    //
    // Where one of:-
    //      "trim:"
    //      "ltrim:"
    //      "rtrim:"
    //
    // can be at the start of the string - if it's to be trimmed before doing
    // the validation.
    // -------------------------------------------------------------------------

    // =========================================================================
    // trim:
    // ltrim:
    // rtrim:
    // =========================================================================

    $groups = explode( ':' , $string_criteria ) ;

    // -------------------------------------------------------------------------

    if ( count( $groups ) > 1 ) {

        // ---------------------------------------------------------------------

        if ( count( $groups ) > 2 ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "string_criteria" (too many ":")
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        $trim_fn = $groups[0] ;

        // ---------------------------------------------------------------------

        if ( $trim_fn === 'trim' ) {
            $value = trim( $value ) ;

        } elseif ( $trim_fn === 'ltrim' ) {
            $value = ltrim( $value ) ;

        } elseif ( $trim_fn === 'rtrim' ) {
            $value = rtrim( $value ) ;

        } else {

            return <<<EOT
PROBLEM:&nbsp; Bad "string_criteria" (unrecognised "trim" type)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        $string_criteria = $groups[1] ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // Here, $string_criteria should be a string like (eg):-
    //      "xxx"
    //      "xxx{1,8}"
    //      "xxx|yyy|zzz|..."
    //      "xxx|yyy{,9}|zzz|..."
    //      "xxx|yyy{3,}|zzz|..."
    // -------------------------------------------------------------------------

    $ctype_xxx = array(
                    'alnum'     ,
                    'alpha'     ,
                    'cntrl'     ,
                    'digit'     ,
                    'graph'     ,
                    'lower'     ,
                    'print'     ,
                    'punct'     ,
                    'space'     ,
                    'upper'     ,
                    'xdigit'
                    ) ;

    // -------------------------------------------------------------------------

    $filter_var_xxx = array(
                        'boolean'   =>  FILTER_VALIDATE_BOOLEAN     ,
                        'email'     =>  FILTER_VALIDATE_EMAIL       ,
                        'ip'        =>  FILTER_VALIDATE_IP          ,
                        'url'       =>  FILTER_VALIDATE_URL
                        ) ;

    // -------------------------------------------------------------------------

    $groups = explode( '|' , $string_criteria ) ;

    // -------------------------------------------------------------------------

    $regex = '/^(.)*\{(.)*\}$/' ;

    // -------------------------------------------------------------------------

    $match_found = FALSE ;

    // -------------------------------------------------------------------------

    foreach ( $groups as $this_xxx ) {

        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // Allow the user to put some white space in the criteria string...
        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

        $this_xxx = trim( $this_xxx ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $this_xxx ) ;

        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // Analyse and strip the min/max string length thing (if there is
        // one)...
        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

        $number_matches = preg_match(
                                $regex      ,
                                $this_xxx   ,
                                $matches
                                ) ;
                                //  preg_match() returns 1 if the pattern
                                //  matches given subject, 0 if it does not, or
                                //  FALSE if an error occurred.

        // ---------------------------------------------------------------------

        if ( $number_matches === FALSE ) {

            return <<<EOT
PROBLEM:&nbsp; "preg_match()" failure analysing string length specs
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        $min = NULL ;

        $max = NULL ;

        // ---------------------------------------------------------------------

        if ( $number_matches === 1 ) {

            // -----------------------------------------------------------------

            $this_xxx      = trim( $matches[1] ) ;

            $min_comma_max = trim( $matches[2] ) ;

            // -----------------------------------------------------------------

            $min_max = explode( ',' , $min_comma_max ) ;

            // -----------------------------------------------------------------

            if ( count( $min_max ) === 1 ) {

                // -------------------------------------------------------------

                $min_max = trim( $min_max[0] ) ;

                // -------------------------------------------------------------

                if (    $min_max === ''
                        ||
                        ! \ctype_digit( $min_max )
                    ) {

                    $safe_string_criteria = htmlentities( $string_criteria ) ;

                    return <<<EOT
PROBLEM:&nbsp; Bad string length in "string_criteria" ("{$safe_string_criteria}")
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // -------------------------------------------------------------

                $min = (int) $min_max ;
                $max = (int) $min_max ;

                // -------------------------------------------------------------

            } elseif ( count( $min_max ) === 2 ) {

                // -------------------------------------------------------------

                $min = trim( $min_max[0] ) ;
                $max = trim( $min_max[1] ) ;

                // -------------------------------------------------------------

                if ( $min === '' ) {
                    $min = 0 ;

                } elseif ( \ctype_digit( $min ) ) {
                    $min = (int) $min ;

                } else {

                    $safe_string_criteria = htmlentities( $string_criteria ) ;

                    return <<<EOT
PROBLEM:&nbsp; Bad minimum string length in "string_criteria" ("{$safe_string_criteria}")
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // -------------------------------------------------------------

                if ( $max === '' ) {
                    $max = PHP_INT_MAX ;

                } elseif ( \ctype_digit( $max ) ) {
                    $max = (int) $max ;

                } else {

                    $safe_string_criteria = htmlentities( $string_criteria ) ;

                    return <<<EOT
PROBLEM:&nbsp; Bad maximum string length in "string_criteria" ("{$safe_string_criteria}")
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // -------------------------------------------------------------

            } else {

                // -------------------------------------------------------------

                $safe_string_criteria = htmlentities( $string_criteria ) ;

                return <<<EOT
PROBLEM:&nbsp; Bad min/max string length in "string_criteria" ("{$safe_string_criteria}")
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // Check the min/max string length (if required)...
        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

        if (    (   is_int( $min )
                    &&
                    strlen( $value ) < $min
                    )
                ||
                (   is_int( $max )
                    &&
                    strlen( $value ) > $max
                    )
            ) {
            continue ;
        }

        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // Process the "xxx" proper...
        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $this_xxx ) ;

        // =====================================================================
        // ctype_xxx() based...
        // =====================================================================

        if ( in_array( $this_xxx , $ctype_xxx , TRUE ) ) {

            // -----------------------------------------------------------------

            if ( strlen( value ) < 1 ) {
                continue ;
            }

            // -----------------------------------------------------------------

            $fn = '\ctype_' . $this_xxx ;

            // -----------------------------------------------------------------

            if ( $fn( $value ) ) {
                $match_found = TRUE ;
                break ;
            }

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // filter_var() based...
        // =====================================================================

        // -------------------------------------------------------------------------
        // mixed filter_var ( mixed $variable [, int $filter = FILTER_DEFAULT [, mixed $options ]] )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        //
        //  variable
        //      Value to filter.
        //
        //  filter
        //      The ID of the filter to apply. The Types of filters manual page
        //      lists the available filters.
        //
        //      If omitted, FILTER_DEFAULT will be used, which is equivalent to
        //      FILTER_UNSAFE_RAW. This will result in no filtering taking place by
        //      default.
        //
        //  options
        //      Associative array of options or bitwise disjunction of flags. If
        //      filter accepts options, flags can be provided in "flags" field of
        //      array. For the "callback" filter, callable type should be passed.
        //      The callback must accept one argument, the value to be filtered, and
        //      return the value after filtering/sanitizing it.
        //
        // RETURN VALUES
        //      Returns the filtered data, or FALSE if the filter fails.
        // -------------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // VALIDATE FILTERS
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // ID           FILTER_VALIDATE_BOOLEAN
        // Name         "boolean"
        // Options      default
        // Flags        FILTER_NULL_ON_FAILURE
        // Description
        //      Returns TRUE for "1", "true", "on" and "yes". Returns FALSE
        //      otherwise.
        //
        //      If FILTER_NULL_ON_FAILURE is set, FALSE is returned only for "0",
        //      "false", "off", "no", and "", and NULL is returned for all
        //      non-boolean values.
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // ID           FILTER_VALIDATE_EMAIL
        // Name         "validate_email"
        // Options      default
        // Flags
        // Description
        //      Validates value as e-mail.
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // ID           FILTER_VALIDATE_IP
        // Name         "validate_ip"
        // Options      default
        // Flags        FILTER_FLAG_IPV4,
        //              FILTER_FLAG_IPV6,
        //              FILTER_FLAG_NO_PRIV_RANGE,
        //              FILTER_FLAG_NO_RES_RANGE
        // Description
        //      Validates value as IP address, optionally only IPv4 or IPv6 or not
        //      from private or reserved ranges.
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // ID           FILTER_VALIDATE_REGEXP
        // Name         "validate_regexp"
        // Options      default, regexp
        // Flags
        // Description
        //      Validates value against regexp, a Perl-compatible regular
        //      expression.
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // ID           FILTER_VALIDATE_URL
        // Name         "validate_url"
        // Options      default
        // Flags        FILTER_FLAG_PATH_REQUIRED,
        //              FILTER_FLAG_QUERY_REQUIRED
        // Description
        //      Validates value as URL (according to »
        //      http://www.faqs.org/rfcs/rfc2396), optionally with required
        //      components. Beware a valid URL may not specify the HTTP protocol
        //      http:// so further validation may be required to determine the URL
        //      uses an expected protocol, e.g. ssh:// or mailto:. Note that the
        //      function will only find ASCII URLs to be valid; internationalized
        //      domain names (containing non-ASCII characters) will fail.
        // -------------------------------------------------------------------------

        if ( array_key_exists( $this_xxx , $filter_var_xxx ) ) {

            // -----------------------------------------------------------------

            if (    strlen( $value ) < 1
                    &&
                    $this_xxx !== 'boolean'
                ) {
                continue ;
            }

            // -----------------------------------------------------------------

            $result = \filter_var( $value , $filter_var_xxx[ $this_xxx ] ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $result ) ;

            // -----------------------------------------------------------------

            if ( $result !== FALSE ) {
                $match_found = TRUE ;
                break ;
            }

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        }

        // =====================================================================
        //  Great Kiwi based #1...
        // =====================================================================

        // ---------------------------------------------------------------------
        // 'empty'     -   String is an empty string (no chars at all).
        //                 Eg: ""
        //
        // '!empty'    -   String is an non-empty string (contains one or more
        //                 (possibly blank) chars.
        //                 Eg: " ", "   ", "abc", " the quick brown fox "
        //
        // 'blank'     -   String contains one or more blank chars.
        //                 Eg: "   "
        //
        // '!blank'    -   String contains at least one non-blank char.
        //                 Eg: " hello   "
        // ---------------------------------------------------------------------

        if ( $this_xxx === 'empty' ) {

            if ( $value === '' ) {
                $match_found = TRUE ;
                break ;
            }

        } elseif ( $this_xxx === '!empty' ) {

            if ( $value !== '' ) {
                $match_found = TRUE ;
                break ;
            }

        } elseif ( $this_xxx === 'blank' ) {

            if ( $value !== '' && trim( $value ) === '' ) {
                $match_found = TRUE ;
                break ;
            }

        } elseif ( $this_xxx === '!blank' ) {

            if ( trim( $value ) !== '' ) {
                $match_found = TRUE ;
                break ;
            }

        }

        // =====================================================================
        //  Great Kiwi based #2...
        // =====================================================================

        //  TODO!!!

        // =====================================================================
        // Plugin Specific String Validators
        // =====================================================================

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSpecificDataValidation\
        // get_plugin_specific_string_validators(
        //      $core_plugapp_dirs
        //      )
        // - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      On SUCCESS
        //
        //          $plugin_specific_string_validators = array(
        //              'validator-name-1'  =>  'validator_function_name_1'
        //              'validator-name-2'  =>  'validator_function_name_2'
        //              ...
        //              'validator-name-N'  =>  'validator_function_name_N'
        //              )
        //
        //          Where each validator function is like:-
        //
        //              function ( $value_to_be_tested ) { ... }
        //
        //          And returns:-
        //              On SUCCESS
        //                  TRUE or FALSE
        //
        //              On FAILURE
        //                  $error_message STRING
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSpecificDataValidation\
        // get_plugin_specific_string_validators(
        //      $core_plugapp_dirs
        //      )
        // - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      On SUCCESS
        //
        //          $plugin_specific_stringdata_validation = array(
        //              'validator-name-1'  =>  'validator_function_name_1'
        //              'validator-name-2'  =>  'validator_function_name_2'
        //              ...
        //              'validator-name-N'  =>  'validator_function_name_N'
        //              )
        //
        //          Where each validator function is like:-
        //
        //              function ( $value_to_be_tested ) { ... }
        //
        //          And returns:-
        //              On SUCCESS
        //                  TRUE or FALSE
        //
        //              On FAILURE
        //                  $error_message STRING
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        if (    is_array( $plugin_specific_string_validators )
                &&
                array_key_exists( $this_xxx , $plugin_specific_string_validators )
            ) {

            // -----------------------------------------------------------------

            $validator_function_name =
                $plugin_specific_string_validators[ $this_xxx ]
                ;

            // -----------------------------------------------------------------

            $result = $validator_function_name( $value ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

            if ( $result === TRUE ) {
                $match_found = TRUE ;
                break ;
            }

            // -----------------------------------------------------------------

        }

        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // Repeat with the next group (if there is one)...
        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $match_found ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// validate_data_array()
// =============================================================================

function validate_data_array(
    $array_to_check                                 ,
    $required_members                               ,
    $optional_members                               ,
    $plugin_specific_string_validators = array()
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_dataValidation\
    // validate_data_array(
    //      $array_to_check                                 ,
    //      $required_members                               ,
    //      $optional_members                               ,
    //      $plugin_specific_string_validators = array()
    //      )
    // - - - - - - - - - - - - -
    // Routine to check an array of name => value pairs.
    //
    // Performs some basic checking of those pairs.  On the assumption that
    // the caller will perform some more detailed checking if the quick
    // validity check performed by this routine succeeds.
    //
    // ---
    //
    // The input parameters should be like:-
    //
    //      $array_to_check = array(
    //          'field_name_1'  =>  <value_1>   ,
    //          'field_name_2'  =>  <value_2>   ,
    //          ...             =>
    //          'field_name_N'  =>  <value_N>
    //          )
    //
    //      $required_members = array(
    //          'field_name_1'  =>  array(
    //                                  'php_type_criteria' =>  "xxx"   ,
    //                                  'string_criteria'   =>  "yyy"   ,
    //                                  'error_message'     =>  "zzz"
    //                                  )   ,
    //          'field_name_2'  =>  array(
    //                                  'php_type_criteria' =>  "xxx"   ,
    //                                  'string_criteria'   =>  "yyy"   ,
    //                                  'error_message'     =>  "zzz"
    //                                  )   ,
    //          ...             =>  ...
    //          'field_name_N'  =>  array(
    //                                  'php_type_criteria' =>  "xxx"   ,
    //                                  'string_criteria'   =>  "yyy"   ,
    //                                  'error_message'     =>  "zzz"
    //                                  )
    //          )
    //
    //      $optional_members = array(
    //          'field_name_1'  =>  array(
    //                                  'php_type_criteria' =>  "xxx"   ,
    //                                  'string_criteria'   =>  "yyy"   ,
    //                                  'error_message'     =>  "zzz"
    //                                  )   ,
    //          'field_name_2'  =>  array(
    //                                  'php_type_criteria' =>  "xxx"   ,
    //                                  'string_criteria'   =>  "yyy"   ,
    //                                  'error_message'     =>  "zzz"
    //                                  )   ,
    //          ...             =>  ...
    //          'field_name_N'  =>  array(
    //                                  'php_type_criteria' =>  "xxx"   ,
    //                                  'string_criteria'   =>  "yyy"   ,
    //                                  'error_message'     =>  "zzz"
    //                                  )
    //          )
    //
    // ---
    //
    // See:-
    //      \greatKiwi_byFernTec_adSwapper_local_v0x1x211_dataArrayValidation\
    //      question_valid()
    //
    // for the format of the:-
    //      "php_type_criteria"
    // and;
    //      "string_criteria"
    // strings.
    //
    // ---
    //
    // "error_message" is OPTIONAL.  If NOT specified:-
    //      ""
    //
    // is used.
    //
    // NOTE!
    // =====
    // The "error_message" (if there is one) will be inserted to the returned
    // $error_message, as follows:-
    //
    //          return <<<EOT
    //      PROBLEM:&nbsp; Bad "<field_name>" (<error_message>)
    //      Detected in:&nbsp; \\{$ns}\\{$fn}()
    //      EOT;
    //
    // ---
    //
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Is $array_to_check an array ?
    // =========================================================================

    if ( ! is_array( $array_to_check ) ) {

        return <<<EOT
PROBLEM:&nbsp; <b>Bad "array_to_check" (not an array)</b>
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // =========================================================================
    // Is $required_members an array ?
    // =========================================================================

    if ( ! is_array( $required_members ) ) {

        return <<<EOT
PROBLEM:&nbsp; <b>Bad "required_members" (not an array)</b>
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // =========================================================================
    // Check the REQUIRED members...
    // =========================================================================

    foreach ( $required_members as $required_field_name => $required_field_data ) {

        // ---------------------------------------------------------------------

        if ( ! array_key_exists( $required_field_name , $array_to_check ) ) {

            return <<<EOT
PROBLEM:&nbsp; <b>No "{$required_field_name}"</b>
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        if ( ! is_array( $required_field_data ) ) {

            return <<<EOT
PROBLEM:&nbsp; <b>Bad "required_field_data" (array expected)</b>
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'php_type_criteria' , $required_field_data ) ) {

            return <<<EOT
PROBLEM:&nbsp; <b>Bad "required_field_data" (no "php_type_criteria")</b>
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'string_criteria' , $required_field_data ) ) {

            return <<<EOT
PROBLEM:&nbsp; <b>Bad "required_field_data" (no "string_criteria")</b>
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        $result = question_valid(
                        $required_field_data['php_type_criteria']       ,
                        $required_field_data['string_criteria']         ,
                        $array_to_check[ $required_field_name ]         ,
                        $plugin_specific_string_validators
                        ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        if ( $result !== TRUE ) {

            if ( array_key_exists( 'error_message' , $required_field_data ) ) {
                $msg = trim( $required_field_data['error_message'] ) ;
            } else {
                $msg = '' ;
            }

            if ( $msg !== '' ) {
                $msg = chr(32) . '(<b>' . $msg . '</b>)' ;
            }

            return <<<EOT
PROBLEM:&nbsp; Bad "{$required_field_name}"{$msg}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Is $optional_members an array ?
    // =========================================================================

    if ( ! is_array( $optional_members ) ) {

        return <<<EOT
PROBLEM:&nbsp; <b>Bad "optional_members" (not an array)</b>
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // =========================================================================
    // Check the OPTIONAL members...
    // =========================================================================

    foreach ( $optional_members as $optional_field_name => $optional_field_data ) {

        // ---------------------------------------------------------------------

        if ( ! array_key_exists( $optional_field_name , $array_to_check ) ) {
            continue ;
        }

        // ---------------------------------------------------------------------

        if ( ! is_array( $optional_field_data ) ) {

            return <<<EOT
PROBLEM:&nbsp; <b>Bad "optional_field_data" (array expected)</b>
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'php_type_criteria' , $optional_field_data ) ) {

            return <<<EOT
PROBLEM:&nbsp; <b>Bad "optional_field_data" (no "php_type_criteria")</b>
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'string_criteria' , $optional_field_data ) ) {

            return <<<EOT
PROBLEM:&nbsp; <b>Bad "optional_field_data" (no "string_criteria")</b>
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        $result = question_valid(
                        $optional_field_data['php_type_criteria']       ,
                        $optional_field_data['string_criteria']         ,
                        $array_to_check[ $optional_field_name ]         ,
                        $plugin_specific_string_validators
                        ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        if ( $result !== TRUE ) {

            if ( array_key_exists( 'error_message' , $optional_field_data ) ) {
                $msg = trim( $optional_field_data['error_message'] ) ;
            } else {
                $msg = '' ;
            }

            if ( $msg !== '' ) {
                $msg = chr(32) . '(<b>' . $msg . '</b>)' ;
            }

            return <<<EOT
PROBLEM:&nbsp; Bad "{$optional_field_name}"{$msg}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Are there any members that are neither required nor optional ?
    // =========================================================================

    foreach ( $array_to_check as $name => $value ) {

        // ---------------------------------------------------------------------

        if (    ! array_key_exists( $name , $required_members )
                &&
                ! array_key_exists( $name , $optional_members )
            ) {

            return <<<EOT
PROBLEM:&nbsp; Unrecognised/unsupported array member "{$name}".&nbsp; This member is neither optional nor required (in this array)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

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

