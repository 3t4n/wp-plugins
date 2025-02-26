<?php

// *****************************************************************************
// INCLUDES / NUMBER-SUPPORT.PHP
// (C) 2015 Peter Newman. All Rights Reserved
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_numberSupport ;

// =============================================================================
// PHP_INT_MIN
// =============================================================================

    define( 'PHP_INT_MIN' , PHP_INT_MAX * (-1) - 1 ) ;
        //  -2147483648

// =============================================================================
// is_signed_integer()
// =============================================================================

function is_signed_integer(
    $value
    ) {

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

    if ( is_int( $value ) ) {
        return (string) $value ;

    } elseif ( is_float( $value ) ) {
        $value = (string) $value ;

    } elseif ( ! is_string( $value ) ) {
        return FALSE ;

    }

    // -------------------------------------------------------------------------

    if ( trim( $value ) === '' ) {
        return FALSE ;
    }

    // -------------------------------------------------------------------------

    $str_value = $value ;

    // -------------------------------------------------------------------------

    if ( substr( $value , 0 , 1 ) === '-' ) {

        $value = substr( $value , 1 ) ;

        if ( trim( $value ) === '' ) {
            return FALSE ;
        }

    }

    // -------------------------------------------------------------------------

    if ( ! ctype_digit( $value ) ) {
        return FALSE ;
    }

    // -------------------------------------------------------------------------

    return $str_value ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// is_unsigned_integer()
// =============================================================================

function is_unsigned_integer(
    $value
    ) {

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

    if ( is_int( $value ) ) {
        return (string) $value ;

    } elseif ( is_float( $value ) ) {
        $value = (string) $value ;

    } elseif ( ! is_string( $value ) ) {
        return FALSE ;

    }

    // -------------------------------------------------------------------------

    if (    trim( $value ) === ''
            ||
            ! ctype_digit( $value )
        ) {
        return FALSE ;
    }

    // -------------------------------------------------------------------------

    return $value ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

