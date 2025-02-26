<?php

// *****************************************************************************
// VALIDATA.APP / INCLUDES / BOOLEAN-VALIDATORS.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions ;

// =============================================================================
// bool()
// =============================================================================

function bool(
    $value
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // bool(
    //      $value
    //      )
    // - - - - - -
    // Is the value one of PHP TRUE or FALSE ?
    //
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $explanation = <<<EOT
A PHP boolean value - TRUE or FALSE - was expected.
EOT;

    // -------------------------------------------------------------------------

    if ( ! is_bool( $value ) ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// boolean_string_01()
// =============================================================================

function boolean_string_01(
    $value
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // boolean_string_01(
    //      $value
    //      )
    // - - - - - -
    // Is the value one of "0" (FALSE) or "1" (TRUE) ?
    //
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $explanation = <<<EOT
A string - either "0" = FALSE or "1" = TRUE - was expected.
EOT;

    // -------------------------------------------------------------------------

    if (    $value !== '0'
            &&
            $value !== '1'
        ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// boolean_string_yesno()
// =============================================================================

function boolean_string_yesno(
    $value
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // boolean_string_yesno(
    //      $value
    //      )
    // - - - - - -
    // Is the value one of "no" (FALSE) or "yes" (TRUE) ?
    //
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $explanation = <<<EOT
A string - either "yes" = TRUE or "no" = FALSE - was expected.
EOT;

    // -------------------------------------------------------------------------

    if (    $value !== 'yes'
            &&
            $value !== 'no'
        ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// boolean_string_truefalse()
// =============================================================================

function boolean_string_truefalse(
    $value
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // boolean_string_truefalse(
    //      $value
    //      )
    // - - - - - -
    // Is the value one of "true" (TRUE) or "false" (FALSE) ?
    //
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $explanation = <<<EOT
A string - either "true" = TRUE or "false" = FALSE - was expected.
EOT;

    // -------------------------------------------------------------------------

    if (    $value !== 'true'
            &&
            $value !== 'false'
        ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

