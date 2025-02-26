<?php

// *****************************************************************************
// VALIDATA.APP / INCLUDES / VALIDATA / VALIDATION-SUPPORT.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions ;

// =============================================================================
// _check_case()
// =============================================================================

function _check_case(
    $case
    ) {

    // -------------------------------------------------------------------------
    // *** INTERNAL USE ONLY ***
    //
    // That's why the first character is "_"
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // _check_case(
    //      $case
    //      )
    // - - - - - -
    // NOTES!
    // ------
    // 1.   $case must be one of:-
    //          o   "lower"
    //          o   "upper"
    //          o   "uniform"
    //          o   "mixed"
    //
    //          Where "uniform" means either ALL lowercase or ALL uppercase.
    //          But NOT mixed.
    //
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    if (    ! is_string( $case )
            ||
            ! in_array( $case , array( 'lower' , 'upper' , 'uniform' , 'mixed' ) , TRUE )
        ) {

        $ln = __LINE__ - 4 ;

        return <<<EOT
PROBLEM:&nbsp; Bad "case" (One of "lower", "upper", "uniform" or "mixed" expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// _check_questionEmptyOK()
// =============================================================================

function _check_questionEmptyOK(
    $question_empty_ok
    ) {

    // -------------------------------------------------------------------------
    // *** INTERNAL USE ONLY ***
    //
    // That's why the first character is "_"
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // _check_questionEmptyOK(
    //      $question_empty_ok
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    if ( ! is_bool( $question_empty_ok ) ) {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM: Bad "question_empty_ok" (BOOLEAN expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// _check_minlen_maxlen_questionEmptyOK()
// =============================================================================

function _check_minlen_maxlen_questionEmptyOK(
    $minlen             ,
    $maxlen             ,
    $question_empty_ok
    ) {

    // -------------------------------------------------------------------------
    // *** INTERNAL USE ONLY ***
    //
    // That's why the first character is "_"
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // _check_minlen_maxlen_questionEmptyOK(
    //      $minlen             ,
    //      $maxlen             ,
    //      $question_empty_ok
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // NOTES!
    // ------
    // 1.   $question_empty_ok gives you the flexibility to specify (eg):-
    //          o   $minlen = 32
    //          o   $maxlen = 64
    //          o   $question_empty_ok
    //
    //      So as to permit either:-
    //          o   The empty string, or;
    //          o   A 32 to 64 character dashed name string.
    //
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    if (    ! is_int( $minlen )
            ||
            $minlen < 0
        ) {

        $ln = __LINE__ - 4 ;

        return <<<EOT
PROBLEM: Bad "minlen" (non-negative INT expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    if (    ! is_int( $maxlen )
            ||
            $maxlen < 0
        ) {

        $ln = __LINE__ - 4 ;

        return <<<EOT
PROBLEM: Bad "maxlen" (non-negative INT expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    if ( ! is_bool( $question_empty_ok ) ) {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM: Bad "question_empty_ok" (BOOLEAN expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    if (    $minlen === 0
            &&
            $question_empty_ok !== TRUE
        ) {

        $ln = __LINE__ - 4 ;

        return <<<EOT
PROBLEM: Inconsistent "minlen" and "question_empty_ok" (if "minlen" is 0, then "question_empty_ok" must be TRUE)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// _check_case_minlen_maxlen_questionEmptyOK()
// =============================================================================

function _check_case_minlen_maxlen_questionEmptyOK(
    $case               ,
    $minlen             ,
    $maxlen             ,
    $question_empty_ok
    ) {

    // -------------------------------------------------------------------------
    // *** INTERNAL USE ONLY ***
    //
    // That's why the first character is "_"
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // _check_case_minlen_maxlen_questionEmptyOK(
    //      $case               ,
    //      $minlen             ,
    //      $maxlen             ,
    //      $question_empty_ok
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // NOTES!
    // ------
    // 1.   $case must be one of:-
    //          o   "lower"
    //          o   "upper"
    //          o   "uniform"
    //          o   "mixed"
    //
    //          Where "uniform" means either ALL lowercase or ALL uppercase.
    //          But NOT mixed.
    //
    // 2.   $question_empty_ok gives you the flexibility to specify (eg):-
    //          o   $minlen = 32
    //          o   $maxlen = 64
    //          o   $question_empty_ok
    //
    //      So as to permit either:-
    //          o   The empty string, or;
    //          o   A 32 to 64 character dashed name string.
    //
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $result =
        _check_case(
            $case
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
    }

    // -------------------------------------------------------------------------

    return _check_minlen_maxlen_questionEmptyOK(
                $minlen             ,
                $maxlen             ,
                $question_empty_ok
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// _check_default_minentries_maxentries()
// =============================================================================

function _check_default_minentries_maxentries(
    &$minentries                        ,
    &$maxentries                        ,
    $default_minentries = 0             ,
    $default_maxentries = PHP_INT_MAX
    ) {

    // -------------------------------------------------------------------------
    // *** INTERNAL USE ONLY ***
    //
    // That's why the first character is "_"
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // _check_default_minentries_maxentries(
    //      &$minentries                        ,
    //      &$maxentries                        ,
    //      $default_minentries = 0             ,
    //      $default_maxentries = PHP_INT_MAX
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // NOTES!
    // ------
    // 1.   $minentries must be one of
    //          o   0 to PHP_INT_MAX
    //          o   'default' = $default_minentries
    //
    // 2.   $minentries must be one of:-
    //          o   0 to PHP_INT_MAX
    //          o   'default' = $default_max_entries
    //
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    if (    ! is_int( $default_minentries )
            ||
            $default_minentries < 0
        ) {

        $ln = __LINE__ - 4 ;

        return <<<EOT
PROBLEM: Bad "default_minentries" (non-negative INT expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    if (    ! is_int( $default_maxentries )
            ||
            $default_maxentries < 0
        ) {

        $ln = __LINE__ - 4 ;

        return <<<EOT
PROBLEM: Bad "default_maxentries" (non-negative INT expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    if ( $minentries === 'default' ) {
        $minentries = $default_minentries ;
    }

    // -------------------------------------------------------------------------

    if (    ! is_int( $minentries )
            ||
            $minentries < 0
        ) {

        $ln = __LINE__ - 4 ;

        return <<<EOT
PROBLEM: Bad "minentries" (non-negative INT or "default" expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    if ( $maxentries === 'default' ) {
        $maxentries = $default_maxentries ;
    }

    // -------------------------------------------------------------------------

    if (    ! is_int( $maxentries )
            ||
            $maxentries < 0
        ) {

        $ln = __LINE__ - 4 ;

        return <<<EOT
PROBLEM: Bad "maxentries" (non-negative INT or "default" expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// _ctype_print_unicode( $input )
// =============================================================================

//  From: https://gist.github.com/qeremy/8009975

if ( ! defined( 'CTYPE_PRINT_UNICODE_PATTERN' ) ) {
    define( 'CTYPE_PRINT_UNICODE_PATTERN'       ,
            "~^[\pL\pN\s\"\~" . preg_quote( "!#$%&'()*+,-./:;<=>?@[\]^_`{|}Â´" ) . "]+$~u"
            ) ;
}

function _ctype_print_unicode( $input ) {
    return preg_match( CTYPE_PRINT_UNICODE_PATTERN , $input ) ;
}

// =============================================================================
// _nl2sp()
// =============================================================================

function _nl2sp( $in ) {
    return str_replace( array( '\r\n' , '\n' , '\r' , "\r\n" , "\n" , "\r"  ) , chr(32) , $in ) ;
}

// =============================================================================
// That's that!
// =============================================================================

