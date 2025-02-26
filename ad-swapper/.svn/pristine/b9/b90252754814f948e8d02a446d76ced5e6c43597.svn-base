<?php

// *****************************************************************************
// VALIDATA.APP / INCLUDES / GEOIP-VALIDATORS.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions ;

// =============================================================================
// geoip_continent_codes_string__default__questionEmptyOK()
// =============================================================================

function geoip_continent_codes_string__default__questionEmptyOK(
    $value                      ,
    $question_empty_ok = TRUE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // geoip_continent_codes_string__default__questionEmptyOK(
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

    $case       = 'mixed'   ;
    $minlen     = 'default' ;
    $maxlen     = 'default' ;
    $minentries = 'default' ;
    $maxentries = 'default' ;

    // -------------------------------------------------------------------------

    return geoip_continent_codes_string__case_minLen_maxLen_questionEmptyOK_minEntries_maxEntries(
                $value                  ,
                $case                   ,
                $minlen                 ,
                $maxlen                 ,
                $question_empty_ok      ,
                $minentries             ,
                $maxentries
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// geoip_continent_codes_string__case_minLen_maxLen_questionEmptyOK_minEntries_maxEntries()
// =============================================================================

function geoip_continent_codes_string__case_minLen_maxLen_questionEmptyOK_minEntries_maxEntries(
    $value                              ,
    $case              = 'mixed'        ,
    $minlen            = 'default'      ,
    $maxlen            = 'default'      ,
    $question_empty_ok = TRUE           ,
    $minentries        = 'default'      ,
    $maxentries        = 'default'
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // geoip_continent_codes_string__case_minLen_maxLen_questionEmptyOK_minEntries_maxEntries(
    //      $value                              ,
    //      $case              = 'mixed'        ,
    //      $minlen            = 'default'      ,
    //      $maxlen            = 'default'      ,
    //      $question_empty_ok = TRUE           ,
    //      $minentries        = 'default'      ,
    //      $maxentries        = 'default'
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
    //          o   A 32 to 64 character geoip continent codes string.
    //
    // 2.   $minentries and $maxentries allow you to control the number of
    //      entries in the comma-separated string.  Eg:-
    //          o   "minentries" = "1": "NZ"
    //          o   "maxentries" = "3": "NZ,EU,GB"
    //
    // 3.   $minentries must be one of
    //          o   0 to PHP_INT_MAX
    //          o   'default' = 1
    //
    // 4.   $maxentries must be one of:-
    //          o   0 to PHP_INT_MAX
    //          o   'default' = 7 (the number of defined continent codes)
    //
    // 5.   $minlen must be one of:-
    //          o   0 to PHP_INT_MAX
    //          o   'default' = 2
    //
    // 6.   $maxlen must be one of:-
    //          o   0 to PHP_INT_MAX
    //          o   'default' = 20
    //
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    require_once( dirname( dirname( __FILE__ ) ) . '/geoip/alpha/continent-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_geoipAlpha\
    // get_continent_codes_to_names_array()
    // - - - - - - - - - - - - - - - - - -
    // Returns an array like (eg):-
    //
    //      $continent_codes_to_names_array = array(
    //          [AS] => Asia                ,
    //          [AF] => Africa              ,
    //          [EU] => Europe              ,
    //          [AN] => Antarctica          ,
    //          [OC] => Oceania             ,
    //          [NA] => North America       ,
    //          [SA] => South America
    //          )
    //
    // -------------------------------------------------------------------------

    $continent_codes_to_names_array =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_geoipAlpha\get_continent_codes_to_names_array()
        ;

    // -------------------------------------------------------------------------

    if ( $minlen === 'default' ) {
        $minlen = 2 ;
    }

    // -------------------------------------------------------------------------

    if ( $maxlen === 'default' ) {

        $maxlen = strlen(
                    implode(
                        ','     ,
                        array_keys( $continent_codes_to_names_array )
                        )
                    ) ;
                    //  Eg:-
                    //      strlen( "AS,AF,EU,AN,OC,NA,SA" )
                    //      = 20

    }

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

    $default_minentries = 1 ;
    $default_maxentries = count( $continent_codes_to_names_array ) ;

    // -------------------------------------------------------------------------

    $result = _check_default_minentries_maxentries(
                    $minentries             ,
                    $maxentries             ,
                    $default_minentries     ,
                    $default_maxentries
                    ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
    }

    // -------------------------------------------------------------------------

    if ( $question_empty_ok ) {

        $explanation = <<<EOT
Either:-<ul style="margin-top:0; margin-bottom:0">
  <li>The empty string, or;</li>
  <li>A single GeoIP continent code, or a comma-separated list of them,</li>
</ul>was expected.
EOT;

    } else {

        $explanation = <<<EOT
A single GeoIP continent code - or a comma-separated list of them - was expected.
EOT;

    }

    // -------------------------------------------------------------------------

    if ( ! is_string( $value ) ) {
        return _nl2sp( $explanation ) ;
    }

    // -------------------------------------------------------------------------

    if (    strlen( $value ) === 0
            &&
            $question_empty_ok
        ) {
        return TRUE ;
    }

    // -------------------------------------------------------------------------

    if (    strlen( $value ) < $minlen
            ||
            strlen( $value ) > $maxlen
        ) {
        return _nl2sp( $explanation ) ;
    }

    // -------------------------------------------------------------------------

    if (    $case === 'lower'
            &&
            strtolower( $value ) !== $value
        ) {
        return _nl2sp( $explanation ) ;

    } elseif (  $case === 'upper'
                &&
                strtoupper( $value ) !== $value
        ) {
        return _nl2sp( $explanation ) ;

    } elseif (  $case === 'uniform'
                &&
                ! ( strtolower( $value ) === $value
                    ||
                    strtoupper( $value ) === $value
                    )
        ) {
        return _nl2sp( $explanation ) ;

    }

    // -----------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\
    // ctype_regex( $value , $regex , $must_be_string = FALSE )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // $regex should be like a PCRE regex string (as fed to "pcre_match()",
    // for example).  Eg:-
    //      "/[a-z0-9]/"
    //      "/[^a-z0-9]/"
    //      etc, etc.
    //
    // Returns:-
    //      o   TRUE if the value matches both the $regex and the
    //          $must_be_string condition.
    //      o   FALSE if the DOESN'T match BOTH the $regex and the
    //          $must_be_string condition.
    //      o   TEXT-ONLY ERROR MESSAGE (STRING) on ERROR (eg; "preg_match()"
    //          failure due to invalid $regex).
    // -----------------------------------------------------------------------

    $must_be_string = TRUE ;

    $regex = '/[a-zA-Z,]*/' ;

    // -----------------------------------------------------------------------

    $result = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_regex(
                    $value              ,
                    $regex              ,
                    $must_be_string
                    ) ;

    // -----------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;

    } elseif ( $result === FALSE ) {
        return _nl2sp( $explanation ) ;

    }

    // -------------------------------------------------------------------------

    $codes = explode( ',' , $value ) ;

    // -------------------------------------------------------------------------

    if (    count( $codes ) < $minentries
            ||
            count( $codes ) > $maxentries
        ) {
        return _nl2sp( $explanation ) ;
    }

    // -------------------------------------------------------------------------

    foreach ( $codes as $this_code ) {

        if (    ! array_key_exists(
                    strtoupper( $this_code )            ,
                    $continent_codes_to_names_array
                    )
            ) {
            return _nl2sp( $explanation ) ;
        }

    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// geoip_country_codes_string__default__questionEmptyOK
// =============================================================================

function geoip_country_codes_string__default__questionEmptyOK(
    $value                      ,
    $question_empty_ok = TRUE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // geoip_country_codes_string__default__questionEmptyOK(
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

    $case       = 'mixed'   ;
    $minlen     = 'default' ;
    $maxlen     = 'default' ;
    $minentries = 'default' ;
    $maxentries = 'default' ;

    // -------------------------------------------------------------------------

    return geoip_country_codes_string__case_minLen_maxLen_questionEmptyOK_minEntries_maxEntries(
                $value              ,
                $case               ,
                $minlen             ,
                $maxlen             ,
                $question_empty_ok  ,
                $minentries         ,
                $maxentries
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// geoip_country_codes_string__case_minLen_maxLen_questionEmptyOK_minEntries_maxEntries()
// =============================================================================

function geoip_country_codes_string__case_minLen_maxLen_questionEmptyOK_minEntries_maxEntries(
    $value                              ,
    $case              = 'mixed'        ,
    $minlen            = 'default'      ,
    $maxlen            = 'default'      ,
    $question_empty_ok = TRUE           ,
    $minentries        = 'default'      ,
    $maxentries        = 'default'
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // geoip_country_codes_string__case_minLen_maxLen_questionEmptyOK_minEntries_maxEntries(
    //      $value                              ,
    //      $case              = 'mixed'        ,
    //      $minlen            = 'default'      ,
    //      $maxlen            = 'default'      ,
    //      $question_empty_ok = TRUE           ,
    //      $minentries        = 'default'      ,
    //      $maxentries        = 'default'
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
    //          o   A 32 to 64 character geoip country codes string.
    //
    // 2.   $minentries and $maxentries allow you to control the number of
    //      entries in the comma-separated string.  Eg:-
    //          o   "minentries" = "1": "NZ"
    //          o   "maxentries" = "3": "NZ,EU,GB"
    //
    // 3.   $minentries must be one of
    //          o   0 to PHP_INT_MAX
    //          o   'default' = 1
    //
    // 4.   $maxentries must be one of:-
    //          o   0 to PHP_INT_MAX
    //          o   'default' = 7 (the number of defined continent codes)
    //
    // 5.   $minlen must be one of:-
    //          o   0 to PHP_INT_MAX
    //          o   'default' = 2
    //
    // 6.   $maxlen must be one of:-
    //          o   0 to PHP_INT_MAX
    //          o   'default' = 20
    //
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    require_once( dirname( dirname( __FILE__ ) ) . '/geoip/alpha/continent-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_geoipAlpha\
    // get_country_to_continent_codes_array()
    // - - - - - - - - - - - - - - - - - - -
    // Returns an array like:-
    //
    //      $country_to_continent_codes_array = array(
    //          'AD' => 'EU'
    //          'AE' => 'AS'
    //          'AF' => 'AS'
    //          'AG' => 'NA'
    //          ...
    //          'ZW' => 'AF'
    //          )
    //
    // Where the data was retieved from:-
    //      http://dev.maxmind.com/geoip/legacy/codes/country_continent/
    //
    // on 25 February 2015.
    //
    // RETURNS
    //      $country_to_continent_codes_array ARRAY
    // -------------------------------------------------------------------------

    $country_to_continent_codes_array =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_geoipAlpha\get_country_to_continent_codes_array()
        ;

    // -------------------------------------------------------------------------

    if ( $minlen === 'default' ) {
        $minlen = 2 ;
    }

    // -------------------------------------------------------------------------

    if ( $maxlen === 'default' ) {

        $maxlen = strlen(
                    implode(
                        ','     ,
                        array_keys( $country_to_continent_codes_array )
                        )
                    ) ;
                    //  Eg:-
                    //      strlen( "AS,AF,EU,AN,OC,NA,SA" )
                    //      = 20

    }

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

    $default_minentries = 1 ;
    $default_maxentries = count( $country_to_continent_codes_array ) ;

    // -------------------------------------------------------------------------

    $result = _check_default_minentries_maxentries(
                    $minentries             ,
                    $maxentries             ,
                    $default_minentries     ,
                    $default_maxentries
                    ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
    }

    // -------------------------------------------------------------------------

    if ( $question_empty_ok ) {

        $explanation = <<<EOT
Either:-<ul style="margin-top:0; margin-bottom:0">
  <li>The empty string, or;</li>
  <li>A single GeoIP country code, or a comma-separated list of them,</li>
</ul>was expected.
EOT;

    } else {

        $explanation = <<<EOT
A single GeoIP country code - or a comma-separated list of them - was expected.
EOT;

    }

    // -------------------------------------------------------------------------

    if ( ! is_string( $value ) ) {
        return _nl2sp( $explanation ) ;
    }

    // -------------------------------------------------------------------------

    if (    strlen( $value ) === 0
            &&
            $question_empty_ok
        ) {
        return TRUE ;
    }

    // -------------------------------------------------------------------------

    if (    strlen( $value ) < $minlen
            ||
            strlen( $value ) > $maxlen
        ) {
        return _nl2sp( $explanation ) ;
    }

    // -------------------------------------------------------------------------

    if (    $case === 'lower'
            &&
            strtolower( $value ) !== $value
        ) {
        return _nl2sp( $explanation ) ;

    } elseif (  $case === 'upper'
                &&
                strtoupper( $value ) !== $value
        ) {
        return _nl2sp( $explanation ) ;

    } elseif (  $case === 'uniform'
                &&
                ! ( strtolower( $value ) === $value
                    ||
                    strtoupper( $value ) === $value
                    )
        ) {
        return _nl2sp( $explanation ) ;

    }

    // -----------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\
    // ctype_regex( $value , $regex , $must_be_string = FALSE )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // $regex should be like a PCRE regex string (as fed to "pcre_match()",
    // for example).  Eg:-
    //      "/[a-z0-9]/"
    //      "/[^a-z0-9]/"
    //      etc, etc.
    //
    // Returns:-
    //      o   TRUE if the value matches both the $regex and the
    //          $must_be_string condition.
    //      o   FALSE if the DOESN'T match BOTH the $regex and the
    //          $must_be_string condition.
    //      o   TEXT-ONLY ERROR MESSAGE (STRING) on ERROR (eg; "preg_match()"
    //          failure due to invalid $regex).
    // -----------------------------------------------------------------------

    $must_be_string = TRUE ;

    $regex = '/[a-zA-Z,]*/' ;

    // -----------------------------------------------------------------------

    $result = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_regex(
                    $value              ,
                    $regex              ,
                    $must_be_string
                    ) ;

    // -----------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;

    } elseif ( $result === FALSE ) {
        return _nl2sp( $explanation ) ;

    }

    // -------------------------------------------------------------------------

    $codes = explode( ',' , $value ) ;

    // -------------------------------------------------------------------------

    if (    count( $codes ) < $minentries
            ||
            count( $codes ) > $maxentries
        ) {
        return _nl2sp( $explanation ) ;
    }

    // -------------------------------------------------------------------------

    foreach ( $codes as $this_code ) {

        if (    ! array_key_exists(
                    strtoupper( $this_code )            ,
                    $country_to_continent_codes_array
                    )
            ) {
            return _nl2sp( $explanation ) ;
        }

    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

