<?php

// *****************************************************************************
// VALIDATA.APP / INCLUDES / STRING-VALIDATORS.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions ;

// =============================================================================
// hex_string__case_minLen_maxLen_questionEmptyOK()
// =============================================================================

function hex_string__case_minLen_maxLen_questionEmptyOK(
    $value                              ,
    $case              = 'mixed'        ,
    $minlen            = 0              ,
    $maxlen            = PHP_INT_MAX    ,
    $question_empty_ok = TRUE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // hex_string__case_minLen_maxLen_questionEmptyOK(
    //      $value                              ,
    //      $case              = 'mixed'        ,
    //      $minlen            = 0              ,
    //      $maxlen            = PHP_INT_MAX    ,
    //      $question_empty_ok = TRUE
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
    //          o   A 32 to 64 character HEX string.
    //
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // _check_case_minlen_maxlen_questionEmptyOK(
    //      $case               ,
    //      $minlen             ,
    //      $maxlen             ,
    //      $question_empty_ok
    //      )
    // - - - - - - - - - - - - -
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

    $result = _check_case_minlen_maxlen_questionEmptyOK(
                    $case               ,
                    $minlen             ,
                    $maxlen             ,
                    $question_empty_ok
                    ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
    }

    // -------------------------------------------------------------------------

    if ( $minlen === $maxlen ) {
        $long = 'exactly ' . number_format( $minlen ) ;
        $eg_len = $minlen ;

    } else {
        $long = 'at least ' . number_format( $minlen ) . ', but no more than ' . number_format( $maxlen ) . ',' ;
        $eg_len = mt_rand( $minlen , $maxlen ) ;

    }

    // -------------------------------------------------------------------------

    if ( $eg_len > 16 ) {
        $eg_len = 16 ;
        $dotdotdot = '...' ;

    } else {
        $dotdotdot = '' ;

    }

    // -------------------------------------------------------------------------

    $chars = '0123456789abcdefABCDEF' ;

    $start_index = 0 ;
    $end_index   = strlen( $chars ) - 1 ;

    $eg = '' ;

    for( $i=0 ; $i<$eg_len ; $i++ ) {
        $eg .= $chars[ mt_rand( $start_index , $end_index ) ] ;
    }

    $eg .= $dotdotdot ;

    // -------------------------------------------------------------------------

    $case1 = '' ;
    $case2 = '' ;

    if ( $case === 'lower' ) {
        $eg    = strtolower( $eg ) ;
        $case1 = 'A lowercase' ;

    } elseif ( $case === 'upper' ) {
        $eg    = strtoupper( $eg ) ;
        $case1 = 'An UPPERCASE' ;

    } elseif ( $case === 'uniform' ) {
        $eg    = strtolower( $eg ) ;
        $case1 = 'An all lowercase or all UPPERCASE' ;

    } else {
        $case1 = 'A' ;
        $case2 = ' (any case)' ;

    }

    // -------------------------------------------------------------------------

    $explanation = <<<EOT
{$case1} HEX string - {$long} characters long{$case2} - was expected.&nbsp; For
example:-<div style="padding-left; font-weight:bold">{$eg}</div>
EOT;

    // -------------------------------------------------------------------------

    $explanation = _nl2sp( $explanation ) ;

    // -------------------------------------------------------------------------

    if ( ! is_string( $value ) ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    if (    strlen( $value ) === 0
            &&
            $question_empty_ok
        ) {
        return TRUE ;
    }

    // -------------------------------------------------------------------------

    if ( ! ctype_xdigit( $value ) ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    if (    $case === 'lower'
            &&
            strtolower( $value ) !== $value
        ) {
        return $explanation ;

    } elseif (  $case === 'upper'
                &&
                strtoupper( $value ) !== $value
        ) {
        return $explanation ;

    } elseif (  $case === 'uniform'
                &&
                ! ( strtolower( $value ) === $value
                    ||
                    strtoupper( $value ) === $value
                    )
        ) {
        return $explanation ;

    }

    // -------------------------------------------------------------------------

    if (    strlen( $value ) < $minlen
            ||
            strlen( $value ) > $maxlen
        ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// dashed_name_string__default__questionEmptyOK()
// =============================================================================

function dashed_name_string__default__questionEmptyOK(
    $value                      ,
    $question_empty_ok = TRUE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // dashed_name_string__default__questionEmptyOK(
    //      $value                      ,
    //      $question_empty_ok = TRUE
    //      )
    // - - - - - - - - - - - - - - - - -
    // The defaults are:-
    //      $case   = 'lower'
    //      $minlen = 1
    //      $maxlen = 255
    //
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $case   = 'lower' ;
    $minlen = 1       ;
    $maxlen = 255     ;

    // -------------------------------------------------------------------------

    return dashed_name_string__case_minLen_maxLen_questionEmptyOK(
                $value                  ,
                $case                   ,
                $minlen                 ,
                $maxlen                 ,
                $question_empty_ok
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// dashed_name_string__case_minLen_maxLen_questionEmptyOK()
// =============================================================================

function dashed_name_string__case_minLen_maxLen_questionEmptyOK(
    $value                              ,
    $case              = 'mixed'        ,
    $minlen            = 0              ,
    $maxlen            = PHP_INT_MAX    ,
    $question_empty_ok = TRUE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // dashed_name_string__case_minLen_maxLen_questionEmptyOK(
    //      $value                              ,
    //      $case              = 'mixed'        ,
    //      $minlen            = 0              ,
    //      $maxlen            = PHP_INT_MAX    ,
    //      $question_empty_ok = TRUE
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

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // _check_case_minlen_maxlen_questionEmptyOK(
    //      $case               ,
    //      $minlen             ,
    //      $maxlen             ,
    //      $question_empty_ok
    //      )
    // - - - - - - - - - - - - -
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

    $result = _check_case_minlen_maxlen_questionEmptyOK(
                    $case               ,
                    $minlen             ,
                    $maxlen             ,
                    $question_empty_ok
                    ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
    }

    // -------------------------------------------------------------------------

    if ( $minlen === $maxlen ) {
        $long = 'exactly ' . number_format( $minlen ) ;

    } else {
        $long = 'at least ' . number_format( $minlen ) . ', but no more than ' . number_format( $maxlen ) . ',' ;

    }

    // -------------------------------------------------------------------------

    $case1 = '' ;
    $case2 = '' ;

    $eg = 'Some-Dashed-Name' ;

    if ( $case === 'lower' ) {
        $eg    = strtolower( $eg ) ;
        $case1 = 'all lowercase' ;

    } elseif ( $case === 'upper' ) {
        $eg    = strtoupper( $eg ) ;
        $case1 = 'all UPPERCASE' ;

    } elseif ( $case === 'uniform' ) {
        $eg    = strtolower( $eg ) ;
        $case1 = 'all lowercase or all UPPERCASE' ;

    } else {
        $case2 = ' case doesn\'t matter' ;

    }

    // -------------------------------------------------------------------------

    if ( $question_empty_ok ) {

        $explanation = <<<EOT
The empty string - or a string like (eg):-<ul>
<li>this-name</li>
<li>that-name</li>
<li>the-other-name</li>
</ul> was expected.&nbsp; The non-empty string must be {$long} characters long, and {$case1}.
EOT;

    } else {

        $explanation = <<<EOT
A string like (eg):-<ul>
<li>this-name</li>
<li>that-name</li>
<li>the-other-name</li>
</ul> was expected.&nbsp; It must be {$long} characters long, and {$case1}.
EOT;

    }

    // -------------------------------------------------------------------------

    $explanation = _nl2sp( $explanation ) ;

    // -------------------------------------------------------------------------

    if ( ! is_string( $value ) ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    if (    strlen( $value ) === 0
            &&
            $question_empty_ok
        ) {
        return TRUE ;
    }

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

    if ( \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_dashed_name( $value ) !== TRUE ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    if (    $case === 'lower'
            &&
            strtolower( $value ) !== $value
        ) {
        return $explanation ;

    } elseif (  $case === 'upper'
                &&
                strtoupper( $value ) !== $value
        ) {
        return $explanation ;

    } elseif (  $case === 'uniform'
                &&
                ! ( strtolower( $value ) === $value
                    ||
                    strtoupper( $value ) === $value
                    )
        ) {
        return $explanation ;

    }

    // -------------------------------------------------------------------------

    if (    strlen( $value ) < $minlen
            ||
            strlen( $value ) > $maxlen
        ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// general_title_string__mixedCase_noTags_minLen1_maxLen255__questionEmptyOK()
// =============================================================================

function general_title_string__mixedCase_noTags_minLen1_maxLen255__questionEmptyOK(
    $value                      ,
    $question_empty_ok = TRUE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // general_title_string__mixedCase_noTags_minLen1_maxLen255__questionEmptyOK(
    //      $value                      ,
    //      $question_empty_ok = TRUE
    //      )
    // - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $minlen = 1   ;
    $maxlen = 255 ;

    // -------------------------------------------------------------------------

    return general_title_string__mixedCase_noTags__minLen_maxLen_questionEmptyOK(
                $value                  ,
                $minlen                 ,
                $maxlen                 ,
                $question_empty_ok
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// general_title_string__mixedCase_noTags__minLen_maxLen_questionEmptyOK()
// =============================================================================

function general_title_string__mixedCase_noTags__minLen_maxLen_questionEmptyOK(
    $value                              ,
    $minlen            = 0              ,
    $maxlen            = PHP_INT_MAX    ,
    $question_empty_ok = TRUE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // general_title_string__mixedCase_noTags__minLen_maxLen_questionEmptyOK(
    //      $value                              ,
    //      $minlen            = 0              ,
    //      $maxlen            = PHP_INT_MAX    ,
    //      $question_empty_ok = TRUE
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
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

    $case = 'mixed' ;

    // -------------------------------------------------------------------------

    if ( $minlen === $maxlen ) {
        $long = 'exactly ' . number_format( $minlen ) ;

    } else {
        $long = 'at least ' . number_format( $minlen ) . ', but no more than ' . number_format( $maxlen ) . ',' ;

    }

    // -------------------------------------------------------------------------

    $explanation = <<<EOT
A "Title" like string was expected.&nbsp; Eg:-<ul>
    <li>This Title</li>
    <li>That Title</li>
    <li>The Other Title</li>
</ul>It must NOT contain any:-<ul>
    <li>Non-printable characters, or;</li>
    <li>PHP or HTML tags.</li>
</ul>It must be {$long} characters long.
EOT;

    // -------------------------------------------------------------------------

    $explanation = _nl2sp( $explanation ) ;

    // -------------------------------------------------------------------------

    return _xxx_string_notags_case_minlen_maxlen_questionEmptyOK(
                $value              ,
                $case               ,
                $minlen             ,
                $maxlen             ,
                $question_empty_ok  ,
                $explanation
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// general_text_string__mixedCase_noTags_minLen1_maxLen65535__questionEmptyOK()
// =============================================================================

function general_text_string__mixedCase_noTags_minLen1_maxLen65535__questionEmptyOK(
    $value                      ,
    $question_empty_ok = TRUE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // general_text_string__mixedCase_noTags_minLen1_maxLen65535__questionEmptyOK()
    //      $value                      ,
    //      $question_empty_ok = TRUE
    //      )
    // - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $minlen = 1     ;
    $maxlen = 65535 ;

    // -------------------------------------------------------------------------

    return general_text_string__mixedCase_noTags__minLen_maxLen_questionEmptyOK(
                $value                  ,
                $minlen                 ,
                $maxlen                 ,
                $question_empty_ok
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// general_text_string__mixedCase_noTags__minLen_maxLen_questionEmptyOK()
// =============================================================================

function general_text_string__mixedCase_noTags__minLen_maxLen_questionEmptyOK(
    $value                              ,
    $minlen            = 0              ,
    $maxlen            = PHP_INT_MAX    ,
    $question_empty_ok = TRUE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // general_text_string__mixedCase_noTags__minLen_maxLen_questionEmptyOK()
    //      $value                              ,
    //      $minlen            = 0              ,
    //      $maxlen            = PHP_INT_MAX    ,
    //      $question_empty_ok = TRUE
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - -
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

    $case = 'mixed' ;

    // -------------------------------------------------------------------------

    if ( $minlen === $maxlen ) {
        $long = 'exactly ' . number_format( $minlen ) ;

    } else {
        $long = 'at least ' . number_format( $minlen ) . ', but no more than ' . number_format( $maxlen ) . ',' ;

    }

    // -------------------------------------------------------------------------

    $explanation = <<<EOT
A general text like string was expected.&nbsp; Eg:-<div style="padding-left:2em;
font-weight:bold">Blah, blah, blah...</div>It must NOT contain:-<ul>
    <li>Non-printable characters, or;</li>
    <li>PHP or HTML tags.</li>
</ul>It must be {$long} characters long.
EOT;

    // -------------------------------------------------------------------------

    $explanation = _nl2sp( $explanation ) ;

    // -------------------------------------------------------------------------

    return _xxx_string_notags_case_minlen_maxlen_questionEmptyOK(
                $value              ,
                $case               ,
                $minlen             ,
                $maxlen             ,
                $question_empty_ok  ,
                $explanation
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// _xxx_string_notags_case_minlen_maxlen_questionEmptyOK()
// =============================================================================

function _xxx_string_notags_case_minlen_maxlen_questionEmptyOK(
    $value              ,
    $case               ,
    $minlen             ,
    $maxlen             ,
    $question_empty_ok  ,
    $explanation
    ) {

    // -------------------------------------------------------------------------
    // *** INTERNAL USE ONLY ***
    //
    // That's why the first character is "_"
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // _xxx_string_notags_minlen_maxlen_question_empty_ok(
    //      $value              ,
    //      $case               ,
    //      $minlen             ,
    //      $maxlen             ,
    //      $question_empty_ok  ,
    //      $explanation
    //      )
    // - - - - - - - - - - - - -
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

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // _check_case_minlen_maxlen_questionEmptyOK(
    //      $case               ,
    //      $minlen             ,
    //      $maxlen             ,
    //      $question_empty_ok
    //      )
    // - - - - - - - - - - - - -
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

    $result = _check_case_minlen_maxlen_questionEmptyOK(
                    $case               ,
                    $minlen             ,
                    $maxlen             ,
                    $question_empty_ok
                    ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
    }

    // -------------------------------------------------------------------------

    if ( ! is_string( $value ) ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    if (    strlen( $value ) === 0
            &&
            $question_empty_ok
        ) {
        return TRUE ;
    }

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

    if ( \strip_tags( $value ) !== $value ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    if ( ! _ctype_print_unicode( $value ) ) {
        return $explanation ;
    }
        //  Is PHP's "ctype_print()" UTF-8 aware ?

    // -------------------------------------------------------------------------

    if (    $case === 'lower'
            &&
            strtolower( $value ) !== $value
        ) {
        return $explanation ;

    } elseif (  $case === 'upper'
                &&
                strtoupper( $value ) !== $value
        ) {
        return $explanation ;

    } elseif (  $case === 'uniform'
                &&
                ! ( strtolower( $value ) === $value
                    ||
                    strtoupper( $value ) === $value
                    )
        ) {
        return $explanation ;

    }

    // -------------------------------------------------------------------------

    if (    strlen( $value ) < $minlen
            ||
            strlen( $value ) > $maxlen
        ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// decimal_digits_string__minLen_maxLen_questionEmptyOK_min_max()
// =============================================================================

function decimal_digits_string__minLen_maxLen_questionEmptyOK_min_max(
    $value                              ,
    $minlen            = 0              ,
    $maxlen            = PHP_INT_MAX    ,
    $question_empty_ok = TRUE           ,
    $min               = NULL           ,
    $max               = NULL
    ) {

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( func_get_args() ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // decimal_digits_string__minLen_maxLen_questionEmptyOK_min_max(
    //      $value                              ,
    //      $minlen            = 0              ,
    //      $maxlen            = PHP_INT_MAX    ,
    //      $question_empty_ok = TRUE           ,
    //      $min               = NULL           ,
    //      $max               = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // NOTES!
    // ------
    // 1.   $question_empty_ok gives you the flexibility to specify (eg):-
    //          o   $minlen = 32
    //          o   $maxlen = 64
    //          o   $question_empty_ok
    //
    //      So as to permit either:-
    //          o   The empty string, or;
    //          o   A 32 to 64 character string.
    //
    // 2.   $minlen and $maxlen should be specified as (unsigned) INTs.
    //
    // 3.   $min and $max should be specified as STRINGS (such as BCMATH
    //      manipulates).
    //
    // 4.   $min = NULL means:-
    //                  $min= '0'
    //
    // 5.   $max = NULL means:-
    //                  $max = str_repeat( '9' , $maxlen )
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

    $result = _check_minlen_maxlen_questionEmptyOK(
                    $minlen             ,
                    $maxlen             ,
                    $question_empty_ok
                    ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
    }

    // -------------------------------------------------------------------------

    if ( is_int( $min ) && $min >= 0 ) {
        $min = (string) $min ;
    }

    // -------------------------------------------------------------------------

    if ( is_int( $max ) && $max >= 0 ) {
        $max = (string) $max ;
    }

    // -------------------------------------------------------------------------

    if ( $min === NULL ) {

        $min = '0' ;

    } elseif (  ! is_string( $min )
                ||
                trim( $min ) === ''
                ||
                ! ctype_digit( $min )
        ) {

        $ln = __LINE__ - 5 ;

        return <<<EOT
PROBLEM:&nbsp; Bad "min" (STRING of decimal digits - "0" to "9" - expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    if ( $max === NULL ) {

        $max = str_repeat( '9' , $maxlen ) ;

    } elseif ( $max === PHP_INT_MAX ) {

        $max = (string) PHP_INT_MAX ;

    } elseif (  ! is_string( $max )
                ||
                trim( $max ) === ''
                ||
                ! ctype_digit( $max )
        ) {

        $ln = __LINE__ - 5 ;

        return <<<EOT
PROBLEM:&nbsp; Bad "max" (STRING of decimal digits - "0" to "9" - expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    if ( $minlen === $maxlen ) {
        $long = 'exactly ' . number_format( $minlen ) ;
        $eg_len = $minlen ;

    } else {
        $long = 'at least ' . number_format( $minlen ) . ', but no more than ' . number_format( $maxlen ) . ',' ;
        $eg_len = mt_rand( $minlen , $maxlen ) ;

    }

    // -------------------------------------------------------------------------

    if ( $eg_len > 16 ) {
        $eg_len = 16 ;
        $dotdotdot = '...' ;

    } else {
        $dotdotdot = '' ;

    }

    // -------------------------------------------------------------------------

    $chars = '0123456789' ;

    $start_index = 0 ;
    $end_index   = strlen( $chars ) - 1 ;

    $eg = '' ;

    for( $i=0 ; $i<$eg_len ; $i++ ) {
        $eg .= $chars[ mt_rand( $start_index , $end_index ) ] ;
    }

    $eg .= $dotdotdot ;

    // -------------------------------------------------------------------------

    $pretty_min = number_format( $min ) ;
    $pretty_max = number_format( $max ) ;

    // -------------------------------------------------------------------------

    if ( $question_empty_ok ) {

        $explanation = <<<EOT
Either:-<ul style="margin-top:0; margin-bottom:0">
<li>The empty string (""), or;<li>
<li>A string of DECIMAL DIGITS ("0" to "9"),</li>
</ul>was expected.
EOT;

    } else {

        $explanation = <<<EOT
A string of DECIMAL DIGITS ("0" to "9"), was expected.
EOT;

    }

    // -------------------------------------------------------------------------

    $explanation .= <<<EOT
&nbsp; For example:-<div style="padding-left; font-weight:bold">{$eg}</div>In
addition:-<ul style="margin-top:0; margin-bottom:0">
<li>The string must be {$long} characters long.&nbsp; And;</li>
<li>The value must be in the range: "{$min}" ({$pretty_min}) to "{$max}"
    ({$pretty_max}).</li>
<ul>
EOT;

    // -------------------------------------------------------------------------

    $explanation = _nl2sp( $explanation ) ;

    // -------------------------------------------------------------------------

    if ( ! is_string( $value ) ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    if (    strlen( $value ) === 0
            &&
            $question_empty_ok
        ) {
        return TRUE ;
    }

    // -------------------------------------------------------------------------

    if ( ! ctype_digit( $value ) ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    if (    strlen( $value ) < $minlen
            ||
            strlen( $value ) > $maxlen
        ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------
    //  bccomp( $left , $right )
    //  - - - - - - - - - - - -
    //  Returns 0 if the two operands are equal, 1 if the left_operand is larger
    //  than the right_operand, -1 otherwise.
    // -------------------------------------------------------------------------

    if (    bccomp( $value , $min ) < 0
            ||
            bccomp( $value , $max ) > 0
        ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// sequential_id_string__questionEmptyOK()
// =============================================================================

function sequential_id_string__questionEmptyOK(
    $value                      ,
    $question_empty_ok = TRUE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // sequential_id_string__minLen_maxLen_questionEmptyOK_min_max(
    //      $value                      ,
    //      $question_empty_ok = TRUE
    //      )
    // - - - - - - - - - - - - - - - - -
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

    $result = _check_questionEmptyOK(
                    $question_empty_ok
                    ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
    }

    // -------------------------------------------------------------------------

    if ( $question_empty_ok ) {

        $explanation = <<<EOT
Either:-<ul style="margin-top:0; margin-bottom:0">
<li>The empty string (""), or;<li>
<li>A "sequential id" like (eg):-<ul style="margin-top:0; margin-bottom:0">
    <li>9npd-xd2h</li>
    <li>pxx4-4942-9vwm</li>
    <li>dczv-2n43-3dny-dykm</li>
    <li>...</li>
</ul></li></ul>was expected.
EOT;

    } else {

        $explanation = <<<EOT
A "sequential id" like (eg):-<ul style="margin-top:0; margin-bottom:0">
    <li>9npd-xd2h</li>
    <li>pxx4-4942-9vwm</li>
    <li>dczv-2n43-3dny-dykm</li>
    <li>...</li>
</ul>was expected.
EOT;

    }

    // -------------------------------------------------------------------------

    $explanation = _nl2sp( $explanation ) ;

    // -------------------------------------------------------------------------

    if ( ! is_string( $value ) ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    if (    strlen( $value ) === 0
            &&
            $question_empty_ok
        ) {
        return TRUE ;
    }

    // -------------------------------------------------------------------------

    require_once( dirname( dirname( __FILE__ ) ) . '/sequential-ids-support.php' ) ;

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

    if (    ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\question_sequential_id(
                    $value
                    )
        ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// grouped_random_password_string_default__questionEmptyOK()
// =============================================================================

function grouped_random_password_string_default__questionEmptyOK(
    $value                      ,
    $question_empty_ok = TRUE
    ) {

    // -------------------------------------------------------------------------

    $options = array() ;

    // -------------------------------------------------------------------------

    return grouped_random_password_string__options_questionEmptyOK(
                $value              ,
                $options            ,
                $question_empty_ok
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// grouped_random_password_string_simple__numberGroups_charsPerGroup_questionEmptyOK()
// =============================================================================

function grouped_random_password_string_simple__numberGroups_charsPerGroup_questionEmptyOK(
    $value                      ,
    $number_groups              ,
    $chars_per_group            ,
    $question_empty_ok = TRUE
    ) {

    // -------------------------------------------------------------------------

    $options = array(
      			'number_groups'		=>	$number_groups       ,
      			'chars_per_group'	=>  $chars_per_group
                ) ;

    // -------------------------------------------------------------------------

    return grouped_random_password_string__options_questionEmptyOK(
                $value              ,
                $options            ,
                $question_empty_ok
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// grouped_random_password_string__options_questionEmptyOK()
// =============================================================================

function grouped_random_password_string__options_questionEmptyOK(
    $value                      ,
    $options = array()          ,
    $question_empty_ok = TRUE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // grouped_random_password_string__options_questionEmptyOK(
    //      $value                      ,
    //      $options = array()          ,
    //      $question_empty_ok = TRUE
    //      )
    // - - - - - - - - - - - - - - - - -
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

    $result = _check_questionEmptyOK(
                    $question_empty_ok
                    ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
    }

    // -------------------------------------------------------------------------

    if ( ! is_array( $options ) ) {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM:&nbsp; Bad "options" (array expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    if ( $question_empty_ok ) {

        $explanation = <<<EOT
Either:-<ul style="margin-top:0; margin-bottom:0">
<li>The empty string (""), or;<li>
<li>A grouped random string like (eg):-<ul style="margin-top:0; margin-bottom:0">
    <li>9npd-xd2h</li>
    <li>pxx4-4942-9vwm</li>
    <li>dczv-2n43-3dny-dykm</li>
    <li>...</li>
</ul></li></ul>was expected.
EOT;

    } else {

        $explanation = <<<EOT
A grouped random string like (eg):-<ul style="margin-top:0; margin-bottom:0">
    <li>9npd-xd2h</li>
    <li>pxx4-4942-9vwm</li>
    <li>dczv-2n43-3dny-dykm</li>
    <li>...</li>
</ul>was expected.
EOT;

    }

    // -------------------------------------------------------------------------

    if ( ! is_string( $value ) ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    if (    strlen( $value ) === 0
            &&
            $question_empty_ok
        ) {
        return TRUE ;
    }

    // -----------------------------------------------------------------------

    require_once( dirname( dirname( __FILE__ ) ) . '/great-kiwi-passwords.php' ) ;

    // -----------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\
    // question_grouped_random_password(
    //      $candidate_password     ,
    //		$options = array()
    //		)
    // - - - - - - - - - - - - - - - - -
    // Checks whether the $candidate_password is a grouped random password
    // like:-
    //		k53t-xc92-v7k3
    //		etc
    //
    // Allowed password characters are those in:-
    //		GREAT_KIWI_ALLOWED_PASSWORD_CHARACTERS
    //
    // Currently these are all the ASCII alphanumeric characters but:-
    //		0    1    5    6    8
    //		A    B    D    E    I    O    Q    S    U
    //		a    b    e    f    i    j    l    o    q    r    s    t    u
    //
    // These are omitted because they're combinations like:-
    //		0/8/B/D/Q
    //		1/I/l
    //		5/S
    //		etc
    //
    // that can easily be confused with each other.
    //
    // ---
    //
    // $options is like (eg):-
    //
    //		$options = array(
    //			'number_groups'		    =>	4		,
    //			'chars_per_group'	    =>	4		,
    //			'group_separator'	    =>	'-'		,
    //			'lowercase_only'	    =>	TRUE    ,
    //          'question_punctuation'  =>  FALSE
    //			)
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
            $value      ,
      		$options
      		) ;

    // -----------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
    }

    // -----------------------------------------------------------------------

    if ( $result !== TRUE ) {
        return $explanation ;
    }

    // -----------------------------------------------------------------------

    return TRUE ;

    // -----------------------------------------------------------------------

}

// =============================================================================
// empty_string()
// =============================================================================

function empty_string(
    $value
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // empty_string(
    //      $value                      ,
    //      )
    // - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $explanation = <<<EOT
An empty string was expected.
EOT;

    // -------------------------------------------------------------------------

    if (    ! is_string( $value )
            ||
            $value !== ''
        ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// empty_or_blank_string()
// =============================================================================

function empty_or_blank_string(
    $value
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // empty_or_blank_string(
    //      $value                      ,
    //      )
    // - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $explanation = <<<EOT
An empty or blank string was expected.
EOT;

    // -------------------------------------------------------------------------

    if (    ! is_string( $value )
            ||
            trim( $value ) !== ''
        ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// canned_strings__allowedStrings_questionEmptyOK()
// =============================================================================

function canned_strings__allowedStrings_questionEmptyOK(
    $value                          ,
    $allowed_strings = array()      ,
    $question_empty_ok = TRUE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // canned_strings__allowedStrings_questionEmptyOK(
    //      $value                          ,
    //      $allowed_strings = array()      ,
    //      $question_empty_ok = TRUE
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $temp = $allowed_strings ;

    if (    $question_empty_ok
            &&
            ! in_array( '' , $temp , TRUE )
        ) {
        array_unshift( $temp , '' ) ;
    }

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\
    // array_values_to_list(
    //      $array                      ,
    //      $separator      = ', '      ,
    //      $last_separator = ', '      ,
    //      $quotes         = ''
    //      )
    // - - - - - - - - - - - - - - - - -
    // Converts (eg):-
    //
    //      o   array( 'this' , 'that' , 'the other thing' ) TO:-
    //              "this", "that", "the other thing"
    //              "this", "that" or "the other thing"
    //              'this', 'that', 'the other thing'
    //              'this', 'that' or 'the other thing'
    //              this, that, the other thing
    //              this, that or the other thing
    //
    //      o   array( 25 , 704 , 'apple' , 12 , 'orange' ) TO:-
    //              "25", "704", "apple", "12" , "orange"
    //              25, 704, apple, 12 or orange
    //              25 704 apple 12 orange
    //              etc, etc.
    //
    // RETURNS the list (as a STRING)
    // -------------------------------------------------------------------------

    $separator      = ', ' ;
    $last_separator = ', ' ;
    $quotes         = '"'  ;

    // -------------------------------------------------------------------------

    $allowed_strings_as_string =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\array_values_to_list(
            $temp               ,
            $separator          ,
            $last_separator     ,
            $quotes
            ) ;

    // -------------------------------------------------------------------------

    $explanation = <<<EOT
One of the following strings - {$allowed_strings_as_string} - was expected.
EOT;

    // -------------------------------------------------------------------------

    if ( ! in_array( $value , $temp , TRUE ) ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

