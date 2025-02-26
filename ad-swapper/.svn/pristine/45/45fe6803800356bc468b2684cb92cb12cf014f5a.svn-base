<?php

// *****************************************************************************
// INCLUDES / GEOIP / ALPHA / MAIN.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_geoipAlpha ;

// =============================================================================
// OVERVIEW
// --------
// This "alpha" variant of GeoIP is an interface to MaxMind GeoIp2Lite:-
//      http://dev.maxmind.com/geoip/geoip2/geolite2/
//
// But the MaxMind GeoIp2 PHP code here:-
//      http://maxmind.github.io/GeoIP2-php/
//
// (needed to access the free databases), is hard to get working.
//
// So we use:-
//      https://freegeoip.net/
//
// and:-
//      http://www.telize.com/
//
// which are free online web services for getting the MaxMind GeoIP data.
// =============================================================================

// =============================================================================
// ip_address_to_city_data()
// =============================================================================

function ip_address_to_city_data(
    $target_ip
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_geoipAlpha\
    // ip_address_to_city_data(
    //      $target_ip
    //      )
    // - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $geoip_info ARRAY
    //
    //          Where (eg):-
    //
    //              $geoip_info = Array(
    //                  [ip]            => 127.0.0.1
    //                  [country_code]  =>
    //                  [country_name]  =>
    //                  [region_code]   =>
    //                  [region_name]   =>
    //                  [city]          =>
    //                  [zip_code]      =>
    //                  [time_zone]     =>
    //                  [latitude]      => 0
    //                  [longitude]     => 0
    //                  [metro_code]    => 0
    //                  )
    //
    //              $geoip_info = Array(
    //                  [ip]            => 118.127.46.63
    //                  [country_code]  => AU
    //                  [country_name]  => Australia
    //                  [region_code]   => QLD
    //                  [region_name]   => Queensland
    //                  [city]          => Brisbane
    //                  [zip_code]      => 4000
    //                  [time_zone]     => Australia/Brisbane
    //                  [latitude]      => -27.485
    //                  [longitude]     => 153.02
    //                  [metro_code]    => 0
    //                  )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // We can deliver quick results, if we're running on localhost...
    // =========================================================================

    if ( $target_ip === '127.0.0.1' ) {

        return array(
            'ip'            => '127.0.0.1'      ,
            'country_code'  => ''               ,
            'country_name'  => ''               ,
            'region_code'   => ''               ,
            'region_name'   => ''               ,
            'city'          => ''               ,
            'zip_code'      => ''               ,
            'time_zone'     => ''               ,
            'latitude'      => 0                ,
            'longitude'     => 0                ,
            'metro_code'    => 0
            ) ;
            //  This is the data returned by:-
            //      https://freegeoip.net/
            //
            //  for IP = 127.0.0.1

    }

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__     ;
    $fn = __FUNCTION__      ;
    $ln = (string) __LINE__ ;

    // =========================================================================
    // Make sure we have a valid IP address...
    // =========================================================================

    if (    ! is_string( $target_ip )
            ||
            trim( $target_ip ) === ''
        ) {

        return <<<EOT
PROBLEM:&nbsp; Bad IP address (non-empty string expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------
    // mixed filter_var ( mixed $variable [, int $filter = FILTER_DEFAULT [, mixed $options ]] )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Filters a variable with a specified filter
    //
    //      variable
    //          Value to filter.
    //
    //      filter
    //          The ID of the filter to apply. The Types of filters manual page
    //          lists the available filters.
    //
    //          If omitted, FILTER_DEFAULT will be used, which is equivalent to
    //          FILTER_UNSAFE_RAW. This will result in no filtering taking place
    //          by default.
    //
    //      options
    //          Associative array of options or bitwise disjunction of flags. If
    //          filter accepts options, flags can be provided in "flags" field
    //          of array. For the "callback" filter, callable type should be
    //          passed. The callback must accept one argument, the value to be
    //          filtered, and return the value after filtering/sanitizing it.
    //
    //          // for filters that accept options, use this format
    //          $options = array(
    //              'options' => array(
    //                  'default' => 3, // value to return if the filter fails
    //                  // other options here
    //                  'min_range' => 0
    //              ),
    //              'flags' => FILTER_FLAG_ALLOW_OCTAL,
    //              ) ;
    //          $var = filter_var('0755', FILTER_VALIDATE_INT, $options);
    //
    //          // for filter that only accept flags, you can pass them directly
    //          $var = filter_var('oops', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    //
    //          // for filter that only accept flags, you can also pass as an array
    //          $var = filter_var('oops', FILTER_VALIDATE_BOOLEAN,
    //                        array('flags' => FILTER_NULL_ON_FAILURE));
    //
    //          // callback validate filter
    //          function foo($value)
    //          {
    //              // Expected format: Surname, GivenNames
    //              if (strpos($value, ", ") === false) return false;
    //              list($surname, $givennames) = explode(", ", $value, 2);
    //              $empty = (empty($surname) || empty($givennames));
    //              $notstrings = (!is_string($surname) || !is_string($givennames));
    //              if ($empty || $notstrings) {
    //                  return false;
    //              } else {
    //                  return $value;
    //              }
    //          }
    //          $var = filter_var('Doe, Jane Sue', FILTER_CALLBACK, array('options' => 'foo'));
    //
    // Returns the filtered data, or FALSE if the filter fails.
    //
    // (PHP 5 >= 5.2.0)
    // -------------------------------------------------------------------------

    if (    filter_var(
                $target_ip              ,
                FILTER_VALIDATE_IP
                ) === FALSE
        ) {

        return <<<EOT
PROBLEM:&nbsp; Bad IP address (IPv4 or IPv6 expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // =========================================================================
    // Get the GeoIP info...
    // =========================================================================

    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // FROM: Cached results stored in MySQL database...
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    // TODO !!!

    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // FROM: "freegeoip.net"...
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    // -------------------------------------------------------------------------
    // get_geoip_info_from_freegeoip_dot_net(
    //      $target_ip
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $geoip_info ARRAY
    //
    //          Where (eg):-
    //
    //              $geoip_info = Array(
    //                  [ip]            => 127.0.0.1
    //                  [country_code]  =>
    //                  [country_name]  =>
    //                  [region_code]   =>
    //                  [region_name]   =>
    //                  [city]          =>
    //                  [zip_code]      =>
    //                  [time_zone]     =>
    //                  [latitude]      => 0
    //                  [longitude]     => 0
    //                  [metro_code]    => 0
    //                  )
    //
    //              $geoip_info = Array(
    //                  [ip]            => 118.127.46.63
    //                  [country_code]  => AU
    //                  [country_name]  => Australia
    //                  [region_code]   => QLD
    //                  [region_name]   => Queensland
    //                  [city]          => Brisbane
    //                  [zip_code]      => 4000
    //                  [time_zone]     => Australia/Brisbane
    //                  [latitude]      => -27.485
    //                  [longitude]     => 153.02
    //                  [metro_code]    => 0
    //                  )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $geoip_info =
        get_geoip_info_from_freegeoip_dot_net(
            $target_ip
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $geoip_info ) ) {
        return $geoip_info ;
    }

return $geoip_info ;
    //  As of early 2016, FreeGeoIP seems to be failing a lot.  Ie, generates:-
    //      "Connection timed out after 5000 milliseconds"
    //
    //  errors.
    //
    //  Since NO replacement (eg; telize.com") is yet available, we return
    //  the original error message (because it's more descriptive of what
    //  the real problem is).

    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // FROM: "telize.com"...
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::








    // =========================================================================
    // FAILURE
    // =========================================================================

    return <<<EOT
PROBLEM:&nbsp; Couldn't get GeoIP info. for your IP address
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;


    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_geoip_info_from_freegeoip_dot_net()
// =============================================================================

function get_geoip_info_from_freegeoip_dot_net(
    $target_ip
    ) {

    // -------------------------------------------------------------------------
    // get_geoip_info_from_freegeoip_dot_net(
    //      $target_ip
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $geoip_info ARRAY
    //
    //          Where (eg):-
    //
    //              $geoip_info = Array(
    //                  [ip]            => 127.0.0.1
    //                  [country_code]  =>
    //                  [country_name]  =>
    //                  [region_code]   =>
    //                  [region_name]   =>
    //                  [city]          =>
    //                  [zip_code]      =>
    //                  [time_zone]     =>
    //                  [latitude]      => 0
    //                  [longitude]     => 0
    //                  [metro_code]    => 0
    //                  )
    //
    //              $geoip_info = Array(
    //                  [ip]            => 118.127.46.63
    //                  [country_code]  => AU
    //                  [country_name]  => Australia
    //                  [region_code]   => QLD
    //                  [region_name]   => Queensland
    //                  [city]          => Brisbane
    //                  [zip_code]      => 4000
    //                  [time_zone]     => Australia/Brisbane
    //                  [latitude]      => -27.485
    //                  [longitude]     => 153.02
    //                  [metro_code]    => 0
    //                  )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Send HTTP request to "freegeoip.net"...
    // =========================================================================

    // -------------------------------------------------------------------------
    // $response = wp_remote_get( $url, $args )
    // - - - - - - - - - - - - - - - - - - - -
    // Retrieve the raw response from the HTTP request using the GET method.
    // Results include HTTP headers and content.
    //
    // See wp_remote_post() for using the HTTP POST method
    //
    //      $args = array(
    //                  'timeout'     => 5,
    //                  'redirection' => 5,
    //                  'httpversion' => '1.0',
    //                  'user-agent'  => 'WordPress/' . $wp_version . '; ' . get_bloginfo( 'url' ),
    //                  'blocking'    => true,
    //                  'headers'     => array(),
    //                  'cookies'     => array(),
    //                  'body'        => null,
    //                  'compress'    => false,
    //                  'decompress'  => true,
    //                  'sslverify'   => true,
    //                  'stream'      => false,
    //                  'filename'    => null
    //                  )
    //
    //      $url
    //          (string) (required) Site URL to retrieve.
    //          Default: None
    //
    //      $args
    //          (array) (optional) Override the defaults.
    //          Default: array()
    //
    // See HTTP API for more information on the arguments array format.
    //
    // RETURN VALUES
    //      (WP_Error|array)
    //          The response or WP_Error on failure. See wp_remote_post() for a
    //          full example of response array format.
    //
    // CHANGE LOG
    //      Since: 2.7.0
    // -------------------------------------------------------------------------

    $url = 'http://freegeoip.net/json/' . $target_ip ;

    // -------------------------------------------------------------------------

    $response = wp_remote_get( $url ) ;

    // -------------------------------------------------------------------------

    if ( is_wp_error( $response ) ) {
        return $response->get_error_message() ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $response = Array(
    //
    //          [headers]   => Array(
    //                              [server]                      => nginx/1.4.6 (Ubuntu)
    //                              [date]                        => Mon, 23 Feb 2015 07:17:32 GMT
    //                              [content-type]                => application/json
    //                              [content-length]              => 170
    //                              [connection]                  => close
    //                              [access-control-allow-method] => GET, HEAD, OPTIONS
    //                              [access-control-allow-origin] => *
    //                              [x-database-date]             => Fri, 06 Feb 2015 16:56:08 GMT
    //                              )
    //
    //          [body]      => {"ip":"127.0.0.1","country_code":"","country_name":"","region_code":"","region_name":"","city":"","zip_code":"","time_zone":"","latitude":0,"longitude":0,"metro_code":0}
    //
    //          [response]  => Array(
    //                              [code]    => 200
    //                              [message] => OK
    //                              )
    //
    //          [cookies]   => Array()
    //
    //          [filename]  =>
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $response , '$response' ) ;

    // -------------------------------------------------------------------------

    if (    ! array_key_exists( 'response' , $response )
            ||
            ! array_key_exists( 'code' , $response['response'] )
            ||
            $response['response']['code'] != 200
            ||
            ! array_key_exists( 'body' , $response )
            ||
            ! is_string( $response['body'] )
            ||
            trim( $response['body'] ) === ''
        ) {

        return <<<EOT
PROBLEM:&nbsp; Unexpected response from "freegeoip.net"
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // =========================================================================
    // Convert the GeoIP info. from JSON to associative array...
    // =========================================================================

    // -------------------------------------------------------------------------
    // mixed json_decode ( string $json [, bool $assoc = false [, int $depth = 512 [, int $options = 0 ]]] )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Takes a JSON encoded string and converts it into a PHP variable.
    //
    //      json
    //          The json string being decoded.
    //
    //          This function only works with UTF-8 encoded strings.
    //
    //          Note:   PHP implements a superset of JSON as specified in the
    //                  original RFC 4627 - it will also encode and decode
    //                  scalar types and NULL. RFC 4627 only supports these
    //                  values when they are nested inside an array or an
    //                  object.
    //
    //                  Although this superset is consistent with the expanded
    //                  definition of "JSON text" in the newer » RFC 7159
    //                  (which aims to supersede RFC 4627) and » ECMA-404, this
    //                  may cause interoperability issues with older JSON
    //                  parsers that adhere strictly to RFC 4627 when encoding a
    //                  single scalar value.
    //
    //      assoc
    //          When TRUE, returned objects will be converted into associative
    //          arrays.
    //
    //      depth
    //          User specified recursion depth.
    //
    //      options
    //          Bitmask of JSON decode options. Currently only
    //          JSON_BIGINT_AS_STRING is supported (default is to cast large
    //          integers as floats)
    //
    // Returns the value encoded in json in appropriate PHP type. Values true,
    // false and null are returned as TRUE, FALSE and NULL respectively. NULL is
    // returned if the json cannot be decoded or if the encoded data is deeper
    // than the recursion limit.
    //
    //
    // NOTE:    In the event of a failure to decode, json_last_error() can be
    //          used to determine the exact nature of the error.
    //
    // CHANGELOG
    //
    //      VERSION     DESCRIPTION
    //      5.6.0       Invalid non-lowercased variants of the true, false and
    //                  null literals are no longer accepted as valid input, and
    //                  will generate warnings.
    //
    //      5.4.0       The options parameter was added.
    //
    //      5.3.0       Added the optional depth. The default recursion depth
    //                  was increased from 128 to 512
    //
    //      5.2.3       The nesting limit was increased from 20 to 128
    //
    //      5.2.1       Added support for JSON decoding of basic types.
    //
    // (PHP 5 >= 5.2.0, PECL json >= 1.2.0)
    // -------------------------------------------------------------------------

    $assoc = TRUE ;

    // -------------------------------------------------------------------------

    $geoip_info = \json_decode(
                        $response['body']   ,
                        $assoc
                        ) ;

    // -------------------------------------------------------------------------

    $errno = \json_last_error() ;

    // -------------------------------------------------------------------------

    if ( $errno !== JSON_ERROR_NONE ) {

        return <<<EOT
PROBLEM:&nbsp; "json_decode()" failure (error# {$errno}) converting response from "freegeoip.net"
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $geoip_info = Array(
    //          [ip]            => 127.0.0.1
    //          [country_code]  =>
    //          [country_name]  =>
    //          [region_code]   =>
    //          [region_name]   =>
    //          [city]          =>
    //          [zip_code]      =>
    //          [time_zone]     =>
    //          [latitude]      => 0
    //          [longitude]     => 0
    //          [metro_code]    => 0
    //          )
    //
    //      $geoip_info = Array(
    //          [ip]            => 118.127.46.63
    //          [country_code]  => AU
    //          [country_name]  => Australia
    //          [region_code]   => QLD
    //          [region_name]   => Queensland
    //          [city]          => Brisbane
    //          [zip_code]      => 4000
    //          [time_zone]     => Australia/Brisbane
    //          [latitude]      => -27.485
    //          [longitude]     => 153.02
    //          [metro_code]    => 0
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $geoip_info , '$geoip_info' ) ;

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $geoip_info ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

