<?php

// *****************************************************************************
// VALIDATA.APP / INCLUDES / FLOAT-VALIDATORS.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions ;

// =============================================================================
// floating_point_string__min_max_maxlen_signchars_pointchars_questionEmptyOK()
// =============================================================================

function floating_point_string__min_max_maxlen_signchars_pointchars_questionEmptyOK(
    $value                      ,
    $min                        ,
    $max                        ,
    $maxlen     = 'default'     ,
    $signchars  = '+-'          ,
    $pointchars = '.'           ,
    $question_empty_ok = TRUE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // floating_point_string__min_max_maxlen_signchars_pointchars_questionEmptyOK(
    //      $value                      ,
    //      $min                        ,
    //      $max                        ,
    //      $maxlen     = 'default'     ,
    //      $signchars  = '+-'          ,
    //      $pointchars = '.'           ,
    //      $question_empty_ok = TRUE
    //      )
    // - - - - - - - - - - - - - - - - -
    // Tries to validate a string containing a floating point number.  Where
    // floating point numbers are as described here:-
    //      https://en.wikipedia.org/wiki/Floating_point
    //      http://php.net/manual/en/language.types.float.php
    //
    // $maxlen:
    //      The maximum length of the string, including any sign and decimal
    //      point characters.
    //
    //      $maxlen = 'default' means $maxlen = 16.
    //
    //          Where the 16 is from:-
    //              http://php.net/manual/en/language.types.float.php
    //
    //              "The size of a float is platform-dependent, although a
    //              maximum of ~1.8e308 with a precision of roughly 14 decimal
    //              digits is a common value (the 64 bit IEEE format)."
    //
    //          And allowing for 1 x sign char + 1 x decimal point char, on
    //          top of the 14 decimal digits.
    //
    // $signchars:
    //      One of:-
    //          ""              (NO sign characters are permitted)
    //          "-"             (A leading "-" character is permitted)
    //          "+"             (A leading "+" character is permitted)
    //          "+-" or "-+"    (A leading "+" or "-" character is permitted)
    //                          (DEFAULT)
    //
    // $pointchars:
    //      Defines the character or characters that may be used for the
    //      decimal point.  Eg:-
    //          ""              (NO decimal characters are allowed)
    //          "."             (Only "." is permitted) (DEFAULT)
    //          ","             (Only "," is permitted)
    //          ".," or ",."    (Either "." or "," is permitted)
    //
    //      Only "." and "," are allowed in $pointchars.  Though acc. to:-
    //          https://en.wikipedia.org/wiki/Decimal_mark
    //
    //      other characters are sometimes used (or have been used in the
    //      past).
    //
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    if ( $question_empty_ok ) {

        $explanation = <<<EOT
Floating point number expected (with perhaps some restrictions).&nbsp; The field may also be left blank
EOT;

    } else {

        $explanation = <<<EOT
Floating point number expected (with perhaps some restrictions)
EOT;

    }

    // -------------------------------------------------------------------------

    if ( ! is_string( $value ) ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    if (    $question_empty_ok
            &&
            trim( $value ) === ''
        ) {
        return TRUE ;
    }

    // -------------------------------------------------------------------------

    if ( $maxlen === 'default' ) {

        $maxlen = 16 ;

    } elseif ( ! is_int( $maxlen ) || $maxlen < 0 ) {

        return <<<EOT
Bad "maxlen" (0, 1, 2... expected)
EOT;

    }

    // -------------------------------------------------------------------------

    if ( strlen( $value ) > $maxlen ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    $signchars_regex_by_signchars = array(
        ''          =>  ''          ,
        '-'         =>  '-?'        ,
        '+'         =>  '\+?'       ,
        '-+'        =>  '[+-]?'     ,
        '+-'        =>  '[+-]?'
        ) ;

    // -------------------------------------------------------------------------

    if (    ! is_string( $signchars )
            ||
            ! array_key_exists( $signchars , $signchars_regex_by_signchars )
    ) {

        return <<<EOT
Bad "signchars" (one of "", "-", "+" , "-+", "+-" was expected)
EOT;

    }

    // -------------------------------------------------------------------------

    $pointchars_regex_by_pointchars = array(
        ''          =>  ''          ,
        '.'         =>  '\.?'       ,
        ','         =>  ',?'        ,
        '.,'        =>  '[.,]?'     ,
        ',.'        =>  '[.,]?'
        ) ;

    // -------------------------------------------------------------------------

    if (    ! is_string( $pointchars )
            ||
            ! array_key_exists( $pointchars , $pointchars_regex_by_pointchars )
        ) {

        return <<<EOT
Bad "pointchars" (one of "", ".", ",", ".,", ",." was expected)
EOT;

    }

    // -------------------------------------------------------------------------

    $max_digits = $maxlen ;

    if ( $signchars !== '' ) {
        $max_digits-- ;
    }

    if ( $pointchars !== '' ) {
        $max_digits-- ;
    }

    // -------------------------------------------------------------------------

    if ( $max_digits < 0 ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    $regex =    '/^' .
                $signchars_regex_by_signchars[ $signchars ] .
                '[0-9]{0,' . $max_digits . '}' .
                $pointchars .
                '[0-9]{0,' . $max_digits . '}' .
                '$/'
                ;

    // -------------------------------------------------------------------------

    if (    preg_match(
                $regex  ,
                $value
                ) !== 1
        ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------
    // SUCCESS!
    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------
    // That's that!
    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

