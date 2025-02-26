<?php

// *****************************************************************************
// VALIDATA.APP / INCLUDES / IP-ADDRESS-VALIDATORS.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions ;

// =============================================================================
// ip_address_string__questionEmptyOK()
// =============================================================================

function ip_address_string__questionEmptyOK(
    $value                      ,
    $question_empty_ok = TRUE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // ip_address_string__questionEmptyOK(
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

    $explanation = <<<EOT
An IP address (v4 or v6) - was expected
EOT;

    // -------------------------------------------------------------------------

    if ( ! is_string( $value ) ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    if (    trim( $value ) === ''
            &&
            $question_empty_ok
        ) {
        return TRUE ;
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

    $validated_ip = filter_var( $value , FILTER_VALIDATE_IP ) ;
                        //  Returns the filtered data, or FALSE if the filter
                        //  fails.

    // -------------------------------------------------------------------------

    if ( $validated_ip === FALSE ) {
        return $explanation ;
    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

