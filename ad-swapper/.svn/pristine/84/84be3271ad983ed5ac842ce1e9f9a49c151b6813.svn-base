<?php

// *****************************************************************************
// VALIDATA.APP / INCLUDES / URL-VALIDATORS.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions ;

// =============================================================================
// absolute_url_string__minLen10_maxLen2000__questionEmptyOK()
// =============================================================================

function absolute_url_string__minLen10_maxLen2000__questionEmptyOK(
    $value                      ,
    $question_empty_ok = TRUE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // absolute_url_string__minLen10_maxLen2000__questionEmptyOK(
    //      $value                      ,
    //      $question_empty_ok = TRUE
    //      )
    // - - - - - - - - - - - - - - - - -
    // o    Default $minlen = 10 = strlen( "http://x.y" )
    //      (= Shortest possible absolute URL).
    //
    // o    Default $maxlen = 2000
    //      (= Max. URL length in many browsers - although it varies)
    //      See (eg):
    //          http://stackoverflow.com/questions/417142/what-is-the-maximum-length-of-a-url-in-different-browsers
    //
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $minlen = 'default' ;
    $maxlen = 'default' ;

    // -------------------------------------------------------------------------

    return absolute_url_string__minLen_maxLen_questionEmptyOK(
                $value                  ,
                $minlen                 ,
                $maxlen                 ,
                $question_empty_ok
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// absolute_url_string__minLen_maxLen_questionEmptyOK()
// =============================================================================

function absolute_url_string__minLen_maxLen_questionEmptyOK(
    $value                              ,
    $minlen            = 'default'      ,
    $maxlen            = 'default'      ,
    $question_empty_ok = TRUE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // absolute_url_string__minLen_maxLen_questionEmptyOK(
    //      $value                              ,
    //      $minlen            = 'default'      ,
    //      $maxlen            = 'default'      ,
    //      $question_empty_ok = TRUE
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // NOTES!
    // ------
    // 1.   $question_empty_ok gives you the flexibility to specify (eg):-
    //          o   $minlen = 32
    //          o   $maxlen = 64
    //          o   $question_empty_ok = TRUE
    //
    //      So as to permit either:-
    //          o   The empty string, or;
    //          o   A 32 to 64 character URL string.
    //
    // 2.   Default $minlen = 10 = strlen( "http://x.y" )
    //      (= shortest possible absolute URL).
    //
    // 3.   Default $maxlen = 2000
    //      (= Max. URL length in many browsers - although it varies)
    //      See (eg):
    //          http://stackoverflow.com/questions/417142/what-is-the-maximum-length-of-a-url-in-different-browsers
    //
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    if ( $minlen === 'default' ) {
        $minlen = 10 ;
            //           1
            //  1234567890
            //  http://x.y
    }

    // -------------------------------------------------------------------------

    if ( $maxlen === 'default' ) {
        $maxlen = 2000 ;
            //  See (eg):-
            //      http://stackoverflow.com/questions/417142/what-is-the-maximum-length-of-a-url-in-different-browsers
    }

    // -------------------------------------------------------------------------

    require_once( dirname( __FILE__ ) . '/validation-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // _check_minlen_maxlen_questionEmptyOK(
    //      $minlen             ,
    //      $maxlen             ,
    //      $question_empty_ok
    //      )
    // - - - - - - - - - - - - -
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

    if ( $minlen === $maxlen ) {
        $long = 'exactly ' . number_format( $minlen ) ;

    } else {
        $long = 'at least ' . number_format( $minlen ) . ', but no more than ' . number_format( $maxlen ) ;

    }

    // -------------------------------------------------------------------------

    $explanation = <<<EOT
An absolute URL - {$long} characters long - was expected
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
    // mixed parse_url ( string $url [, int $component = -1 ] )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // This function parses a URL and returns an associative array containing
    // any of the various components of the URL that are present.
    //
    // This function is not meant to validate the given URL, it only breaks it
    // up into the above listed parts. Partial URLs are also accepted,
    // parse_url() tries its best to parse them correctly.
    //
    //      url
    //          The URL to parse.  Invalid characters are replaced by _.
    //
    //      component
    //          Specify one of PHP_URL_SCHEME, PHP_URL_HOST, PHP_URL_PORT,
    //          PHP_URL_USER, PHP_URL_PASS, PHP_URL_PATH, PHP_URL_QUERY or
    //          PHP_URL_FRAGMENT to retrieve just a specific URL component as a
    //          string (except when PHP_URL_PORT is given, in which case the
    //          return value will be an integer).
    //
    // RETURNS
    //      On seriously malformed URLs, parse_url() may return FALSE.
    //
    //      If the component parameter is omitted, an associative array is
    //      returned. At least one element will be present within the array.
    //      Potential keys within this array are:
    //
    //          scheme - e.g. http
    //          host
    //          port
    //          user
    //          pass
    //          path
    //          query - after the question mark ?
    //          fragment - after the hashmark #
    //
    // If the component parameter is specified, parse_url() returns a string (or
    // an integer, in the case of PHP_URL_PORT) instead of an array. If the
    // requested component doesn't exist within the given URL, NULL will be
    // returned.
    //
    // (PHP 4, PHP 5)
    //
    // CHANGELOG
    //      Version Description
    //      ------- -----------------------------------------------------------
    //      5.4.7   Fixed host recognition when scheme is omitted and a leading
    //              component separator is present.
    //      5.3.3   Removed the E_WARNING that was emitted when URL parsing
    //              failed.
    //      5.1.2   Added the component parameter.
    // -------------------------------------------------------------------------

    $components = parse_url( $value ) ;

    // -------------------------------------------------------------------------

    if (    $components === FALSE
            ||
            ! array_key_exists( 'scheme' , $components )
            ||
            ! array_key_exists( 'host' , $components )
        ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------
    // mixed filter_var ( mixed $variable [, int $filter = FILTER_DEFAULT [, mixed $options ]] )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
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
    //      Validates whether the value is a valid e-mail address.
    //
    //      In general, this validates e-mail addresses against the syntax in
    //      RFC 822, with the exceptions that comments and whitespace folding
    //      are not supported.
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
    //      Validates value as URL (according to
    //          http://www.faqs.org/rfcs/rfc2396),
    //      optionally with required components. Beware a valid URL may not
    //      specify the HTTP protocol http:// so further validation may be
    //      required to determine the URL uses an expected protocol, e.g. ssh://
    //      or mailto:.
    //
    //      Note that the function will only find ASCII URLs to be valid;
    //      internationalized domain names (containing non-ASCII characters)
    //      will fail.
    // -------------------------------------------------------------------------

    $validated_url = filter_var( $value , FILTER_VALIDATE_URL ) ;
                        //  Returns the filtered data, or FALSE if the filter
                        //  fails.

    // -------------------------------------------------------------------------

    if ( $validated_url === FALSE ) {
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
// That's that!
// =============================================================================

