<?php

// *****************************************************************************
// INCLUDES / WP-ADMIN-DOWNLOADS-COMMON.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_wpAdminDownloads ;

// =============================================================================
// get_wp_admin_downloads_meta_key_prefix()
// =============================================================================

function get_wp_admin_downloads_meta_key_prefix() {
    return 'ferntec_wpAdminDownloads_' ;
}

// =============================================================================
// get_wp_admin_downloads_meta_key_suffix()
// =============================================================================

function get_wp_admin_downloads_meta_key_suffix() {
    return '_adSwapper_local_v0x1x211' ;
}

// =============================================================================
// Define a function to return the META KEYS (so that both the CREATE and
// DELIVERY routines use the same meta key string values)...
// =============================================================================

function get_meta_keys() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wpAdminDownloads\
    // get_meta_keys()
    // - - - - - - - -
    // RETURNS
    //      $meta_keys = ARRAY(
    //          'plugin_camel_name'     =>  "xxx"   ,
    //          'plugin_version_alnum'  =>  "xxx"   ,
    //          'string_to_download'    =>  "xxx"   ,
    //          'output_file_basename'  =>  "xxx"   ,
    //          'content_type'          =>  "xxx"   ,
    //          'user_download_key'     =>  "xxx"   ,
    //          'number_chunks'         =>  N       ,
    //          'checksum'              =>  "xxx"
    //          )
    // -------------------------------------------------------------------------

    $wp_admin_downloads_meta_key_prefix = get_wp_admin_downloads_meta_key_prefix() ;

    $wp_admin_downloads_meta_key_suffix = get_wp_admin_downloads_meta_key_suffix() ;

    // -------------------------------------------------------------------------

    $meta_keys = array() ;

    $max_meta_key_length = 255 ;

    // -------------------------------------------------------------------------
    // plugin_camel_name
    // -------------------------------------------------------------------------

    $meta_key = $wp_admin_downloads_meta_key_prefix .
                'plugin_camel_name' .
                $wp_admin_downloads_meta_key_suffix
                ;

    // -------------------------------------------------------------------------

    if ( strlen( $meta_key ) > $max_meta_key_length ) {
        $meta_key = \substr( $meta_key , 0 , $max_meta_key_length ) ;
    }

    // -------------------------------------------------------------------------

    $meta_keys[ 'plugin_camel_name' ] = $meta_key ;

    // -------------------------------------------------------------------------
    // plugin_version_alnum
    // -------------------------------------------------------------------------

    $meta_key = $wp_admin_downloads_meta_key_prefix .
                'plugin_version_alnum' .
                $wp_admin_downloads_meta_key_suffix
                ;

    // -------------------------------------------------------------------------

    if ( strlen( $meta_key ) > $max_meta_key_length ) {
        $meta_key = \substr( $meta_key , 0 , $max_meta_key_length ) ;
    }

    // -------------------------------------------------------------------------

    $meta_keys[ 'plugin_version_alnum' ] = $meta_key ;

    // -------------------------------------------------------------------------
    // stringToDownload
    // -------------------------------------------------------------------------

    $meta_key = $wp_admin_downloads_meta_key_prefix .
                'stringToDownload' .
                $wp_admin_downloads_meta_key_suffix
                ;

    // -------------------------------------------------------------------------

    if ( strlen( $meta_key ) > $max_meta_key_length ) {
        $meta_key = \substr( $meta_key , 0 , $max_meta_key_length ) ;
    }

    // -------------------------------------------------------------------------

    $meta_keys[ 'string_to_download' ] = $meta_key ;

    // -------------------------------------------------------------------------
    // outputFileBasename
    // -------------------------------------------------------------------------

    $meta_key = $wp_admin_downloads_meta_key_prefix .
                'outputFileBasename' .
                $wp_admin_downloads_meta_key_suffix
                ;

    // -------------------------------------------------------------------------

    if ( strlen( $meta_key ) > $max_meta_key_length ) {
        $meta_key = \substr( $meta_key , 0 , $max_meta_key_length ) ;
    }

    // -------------------------------------------------------------------------

    $meta_keys[ 'output_file_basename' ] = $meta_key ;

    // -------------------------------------------------------------------------
    // contentType
    // -------------------------------------------------------------------------

    $meta_key = $wp_admin_downloads_meta_key_prefix .
                'contentType' .
                $wp_admin_downloads_meta_key_suffix
                ;

    // -------------------------------------------------------------------------

    if ( strlen( $meta_key ) > $max_meta_key_length ) {
        $meta_key = \substr( $meta_key , 0 , $max_meta_key_length ) ;
    }

    // -------------------------------------------------------------------------

    $meta_keys[ 'content_type' ] = $meta_key ;

    // -------------------------------------------------------------------------
    // userDownloadKey
    // -------------------------------------------------------------------------

    $meta_key = $wp_admin_downloads_meta_key_prefix .
                'userDownloadKey' .
                $wp_admin_downloads_meta_key_suffix
                ;

    // -------------------------------------------------------------------------

    if ( strlen( $meta_key ) > $max_meta_key_length ) {
        $meta_key = \substr( $meta_key , 0 , $max_meta_key_length ) ;
    }

    // -------------------------------------------------------------------------

    $meta_keys[ 'user_download_key' ] = $meta_key ;

    // -------------------------------------------------------------------------
    // numberChunks
    // -------------------------------------------------------------------------

    $meta_key = $wp_admin_downloads_meta_key_prefix .
                'numberChunks' .
                $wp_admin_downloads_meta_key_suffix
                ;

    // -------------------------------------------------------------------------

    if ( strlen( $meta_key ) > $max_meta_key_length ) {
        $meta_key = \substr( $meta_key , 0 , $max_meta_key_length ) ;
    }

    // -------------------------------------------------------------------------

    $meta_keys[ 'number_chunks' ] = $meta_key ;

    // -------------------------------------------------------------------------
    // checksum
    // -------------------------------------------------------------------------

    $meta_key = $wp_admin_downloads_meta_key_prefix .
                'checksum' .
                $wp_admin_downloads_meta_key_suffix
                ;

    // -------------------------------------------------------------------------

    if ( strlen( $meta_key ) > $max_meta_key_length ) {
        $meta_key = \substr( $meta_key , 0 , $max_meta_key_length ) ;
    }

    // -------------------------------------------------------------------------

    $meta_keys[ 'checksum' ] = $meta_key ;

    // -------------------------------------------------------------------------
    // SUCCESS!
    // -------------------------------------------------------------------------

    return $meta_keys ;

    // -------------------------------------------------------------------------
    // That's that!
    // -------------------------------------------------------------------------

}

// =============================================================================
// get_user_download_key()
// =============================================================================

function get_user_download_key() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wpAdminDownloads\
    // get_user_download_key()
    // - - - - - - - - - - - -
    // The returned key is like (eg):-
    //
    //               1         2         3         4         5
    //      123456789012345678901234567890123456789012345678901
    //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-0-1
    //
    //               1         2         3         4         5         6
    //      12345678901234567890123456789012345678901234567890123456789012345
    //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-999977-2147483647
    //      ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ ^^^^^^^^^^^^^^^^^ ^^^^^^^^^^
    //                  GUID PART                 MICROTIME PART   SEQUENTIAL
    //                                                             RECORD NO.
    //                                                             PART
    //
    // So it's 51 to 65 characters long.  And if PHP_INT_MAX (for the
    // "sequential record number" part), were to increase, it could be even
    // longer.
    //
    // =>   Make 50 to 80 or so characters, the limits for validity checking.
    //
    // RETURNS
    //      o   On SUCCESS
    //              $record_key STRING
    //
    //      o   On FAILURE
    //              ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // GUID Part...
    // =========================================================================

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // MSDN defines GUID as "a 128-bit integer (16 bytes) that can be used
    // across all computers and networks wherever a unique identifier is
    // required. Such an identifier has a very low probability of being
    // duplicated."
    //
    // GUID consists of alphanumeric characters only and is grouped in five
    // groups separated by hyphens as seen in this example:
    //      3f2504e0-4f89-11d3-9a0c-0305e82c3301
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // From:-
    //      http://www.php.net/manual/en/function.com-create-guid.php
    // -------------------------------------------------------------------------

    if ( function_exists( '\com_create_guid' ) === TRUE ) {
        $guid_part = strtolower( trim( com_create_guid() , '{}' ) ) ;

    } else {
        $guid_part = strtolower( sprintf(
                        '%04X%04X-%04X-%04X-%04X-%04X%04X%04X'  ,
                        mt_rand(     0 , 65535 )                ,
                        mt_rand(     0 , 65535 )                ,
                        mt_rand(     0 , 65535 )                ,
                        mt_rand( 16384 , 20479 )                ,
                        mt_rand( 32768 , 49151 )                ,
                        mt_rand(     0 , 65535 )                ,
                        mt_rand(     0 , 65535 )                ,
                        mt_rand(     0 , 65535 )
                        ) ) ;

    }

    // =========================================================================
    // MicroTime Part...
    // =========================================================================

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // By adding in the micro-time we guarantee a reasonable degree of
    // uniqueness.  Since microtime() is accurate to 1us (= 1 millionth of
    // a second).
    //
    // But it is (at least theoretically,) possible for this function:-
    //      get_unique_record_key()
    //
    // to be called more than once in a given 1us period (particularly on
    // very fast machines)
    //
    // ---
    //
    // Note that on a standard 2012 era desktop, the following code:-
    //
    //      while ( TRUE ) {
    //          $gtod = gettimeofday() ;
    //          echo '<br />' , $gtod['sec'] , ' &nbsp;&mdash;&nbsp; ' , $gtod['usec'];
    //      }
    //
    // generates (eg):=-
    //
    //      1400040711  --  999977
    //      1400040711  --  999981
    //      1400040711  --  999985
    //      1400040711  --  999988
    //      1400040711  --  999999
    //      1400040712  --  2
    //      1400040712  --  6
    //      1400040712  --  10
    //      1400040712  --  13
    //      1400040712  --  17
    //      1400040712  --  20
    //      ...         --
    //      1400040712  --  91
    //      1400040712  --  95
    //      1400040712  --  98
    //      1400040712  --  102
    //      1400040712  --  106
    //      ...         --
    //      1400040712  --  982
    //      1400040712  --  986
    //      1400040712  --  989
    //      1400040712  --  993
    //      1400040712  --  996
    //      1400040712  --  1000
    //      1400040712  --  1004
    //      1400040712  --  1007
    //      ...
    //
    // So in general (on standard desktops), two sequential calls to:-
    //      gettimeofday()
    //
    // will generate different micro-second precesion time values.
    //
    // But to guarantee that two sequential calls to:-
    //      get_unique_record_key()
    //
    // generate two different micro-second precision time values. we:-
    //
    //      o   Call "gettimeofday()" once, to get an initial value.
    //
    //      o   Then call "gettimeofday()" repetitively, until we get a
    //          different value.
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // mixed gettimeofday ([ bool $return_float = false ] )
    // - - - - - - - - - - - - - - - - - - - - - - - - - -
    // This is an interface to gettimeofday(2). It returns an associative array
    // containing the data returned from the system call.
    //
    //      return_float
    //          When set to TRUE, a float instead of an array is returned.
    //
    // By default an array is returned. If return_float is set, then a float is
    // returned.
    //
    //      Array keys:
    //
    //      "sec"           - seconds since the Unix Epoch
    //      "usec"          - microseconds
    //      "minuteswest"   - minutes west of Greenwich
    //      "dsttime"       - type of dst correction
    //
    // (PHP 4, PHP 5)
    //
    // CHANGELOG
    //      Version     Description
    //      5.1.0       The return_float parameter was added.
    //
    // NOTE!
    // =====
    // The "microtime()" function has a note that says:-
    //      "This function is only available on operating systems that support
    //      the gettimeofday() system call."
    //
    // Does this note apply to the "gettimeofday()" function too ?
    // -------------------------------------------------------------------------

    if ( \function_exists( '\gettimeofday' ) ) {

        // ----------------------------------------------------------------------
        // Use the "gettimeofday()" function...
        // ----------------------------------------------------------------------

        $gtod = gettimeofday() ;
        $initial_microtime_part = $gtod['sec'] . '-' . $gtod['usec'] ;

        // ---------------------------------------------------------------------

        while ( TRUE ) {
            $gtod = gettimeofday() ;
            $microtime_part = $gtod['sec'] . '-' . $gtod['usec'] ;
            if ( $microtime_part !== $initial_microtime_part ) {
                break ;
            }
        }

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------
        // NO "gettimeofday()" function...
        // ---------------------------------------------------------------------

        $initial_time = time() ;

        // ---------------------------------------------------------------------

        while ( TRUE ) {
            $microtime_part = time() ;
            if ( $microtime_part !== $initial_time ) {
                break ;
            }
        }

        // ---------------------------------------------------------------------

        $microtime_part .= '-' . mt_rand( 0 , 999999 ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Sequential Download Number Part...
    // =========================================================================

    // -------------------------------------------------------------------------
    // get_option( $option, $default )
    // - - - - - - - - - - - - - - - -
    // A safe way of getting values for a named option from the options database
    // table. If the desired option does not exist, or no value is associated
    // with it, FALSE will be returned.
    //
    //      $option
    //          (string) (required) Name of the option to retrieve. A concise
    //          list of valid options is below, but a more complete one can be
    //          found at the Option Reference. Matches $option_name in
    //          register_setting() for custom options.
    //
    //          Default: None
    //
    //          Underscores separate words, lowercase only - this is going to be
    //          in a database.
    //
    //      $default
    //          (mixed) (optional) The default value to return if no value is
    //          returned (ie. the option is not in the database).
    //
    //          Default: false
    //
    // RETURN VALUES
    //      (mixed)
    //      Current value for the specified option. If the specified option does
    //      not exist, returns boolean FALSE.
    //
    // CHANGELOG
    //      Since 1.5.0
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // update_option( $option, $new_value )
    // - - - - - - - - - - - - - - - - - -
    // Use the function update_option() to update a named option/value pair to
    // the options database table. The $option (option name) value is escaped
    // with $wpdb->prepare before the INSERT statement but not the option value,
    // this value should always be properly sanitized.
    //
    // This function may be used in place of add_option, although it is not as
    // flexible. update_option will check to see if the option already exists.
    // If it does not, it will be added with add_option('option_name',
    // 'option_value'). Unless you need to specify the optional arguments of
    // add_option(), update_option() is a useful catch-all for both adding and
    // updating options.
    //
    // Note:    This function cannot be used to change whether an option is to
    //          be loaded (or not loaded) by wp_load_alloptions(). In that case,
    //          a delete_option() should be followed by use of the add_option()
    //          function.
    //
    //      $option
    //          (string) (required) Name of the option to update. Must not
    //          exceed 64 characters. A list of valid default options to update
    //          can be found at the Option Reference.
    //
    //          Default: None
    //
    //      $newvalue
    //          (mixed) (required) The NEW value for this option name. This
    //          value can be an integer, string, array, or object.
    //
    //          Default: None
    //
    // RETURN VALUE
    //      (boolean)
    //      True if option value has changed, false if not or if update failed.
    //
    // CHANGE LOG
    //      Since: 1.0.0
    // -------------------------------------------------------------------------

    //                     1         2         3         4         5         6         7         8         9
    //           01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
    // namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_wpAdminDownloads_lastUsedSequentialDownloadNumber

    //                        1         2         3         4         5         6         7
    //              01234567890123456789012345678901234567890123456789012345678901234567890123456789
    $option_name = 'adSwapper_local_v0x1x211_lastUsedSequentialDownloadNumber' ;

    if ( strlen( $option_name ) > 64 ) {
        $option_name = substr( $option_name , 0 , 64 ) ;
    }

    // -------------------------------------------------------------------------

    $last_used_sequential_download_number = \get_option( $option_name ) ;

    // -------------------------------------------------------------------------

    if ( $last_used_sequential_download_number === FALSE ) {
        $last_used_sequential_download_number = 1 ;

    } else {
        if ( $last_used_sequential_download_number == PHP_INT_MAX ) {
            $last_used_sequential_download_number = 1 ;

        } else {
            $last_used_sequential_download_number++ ;

        }

    }

    // -------------------------------------------------------------------------

    $ok = \update_option( $option_name , $last_used_sequential_download_number ) ;

    // -------------------------------------------------------------------------

    if ( $ok !== TRUE ) {

        $msg = <<<EOT
PROBLEM:&nbsp; "update_option()" failure updating "{$option_name}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        return array( $msg ) ;

    }

    // -------------------------------------------------------------------------

    $sequential_part = (string) $last_used_sequential_download_number ;

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return <<<EOT
{$guid_part}-{$microtime_part}-{$sequential_part}
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// is_user_download_key()
// =============================================================================

function is_user_download_key(
    $candidate_user_download_key
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wpAdminDownloads\
    // is_user_download_key(
    //      $candidate_user_download_key
    //      )
    // - - - - - - - - - - - - - - - - -
    // Is the input string a record key like (eg):-
    //
    //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-0-1
    //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-999977-2147483647
    //      etc
    //
    // RETURNS
    //      o   On SUCCESS
    //              TRUE
    //
    //      o   On FAILURE
    //              FALSE
    // ---------------------------------------------------------------------------

//echo '<br /><br />' , $candidate_user_download_key ;

    // -------------------------------------------------------------------------

    if ( ! \is_string( $candidate_user_download_key ) ) {
        return FALSE ;
    }

    // -------------------------------------------------------------------------
    // User download keys are like (eg):-
    //
    //               1         2         3         4         5
    //      123456789012345678901234567890123456789012345678901
    //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-0-1
    //
    //               1         2         3         4         5         6
    //      12345678901234567890123456789012345678901234567890123456789012345
    //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-999977-2147483647
    //      ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ ^^^^^^^^^^^^^^^^^ ^^^^^^^^^^
    //                  GUID PART                 MICROTIME PART   SEQUENTIAL
    //                                                             RECORD NO.
    //                                                             PART
    //
    // So it's 51 to 65 characters long.  And if PHP_INT_MAX (for the
    // "sequential user_download number" part), were to increase, it could be even
    // longer.
    //
    // =>   Make 50 to 80 or so characters, the limits for validity checking.
    // -------------------------------------------------------------------------

    //  NOTE!   The special regular expression characters are:
    //              . \ + * ? [ ^ ] $ ( ) { } = ! < > | : -

    $pattern =
        '/^[a-z0-9]{8}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{12}-\d{10}-\d{1,6}-\d{1,10}$/'
        ;

    // -------------------------------------------------------------------------

    $number_matches = \preg_match(
                            $pattern                ,
                            $candidate_user_download_key
                            ) ;
                            //  preg_match() returns 1 if the pattern matches
                            //  given subject, 0 if it does not, or FALSE if an
                            //  error occurred.

    // -------------------------------------------------------------------------

    if ( $number_matches === FALSE ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;

        $msg = <<<EOT
PROBLEM:&nbsp; "preg_match()" failure checking user_download key
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    if ( $number_matches === 1 ) {
        return TRUE ;
    }

    // -------------------------------------------------------------------------

    return FALSE ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// delete_all_wp_admin_downloads_user_meta_data()
// =============================================================================

function delete_all_wp_admin_downloads_user_meta_data(
    $user_id
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wpAdminDownloads\
    // delete_all_wp_admin_downloads_user_meta_data(
    //      $user_id
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Delete ALL the "WP Admin Downloads" user meta data (for the currently
    // logged-in user).
    //
    // This is done after each WP Admin Downloads completes (whether
    // sucessfully or not).
    //
    // And we delete ALL "WP Admin Downloads" specific meta key/value pairs
    // that we can find.  Just in case some previous WP Admin Download crashed
    // before it's meta data could be successfully removed.
    //
    // We also delete this meta data BEFORE starting a new WP Admin Download.
    // To prevent any existing and possibly corrupt data from stuffing things
    // up.
    //
    // RETURNS
    //      o   On SUCCESS
    //              TRUE
    //
    //      o   On FAILURE
    //              $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // There must be a currently logged-in user...
    // =========================================================================

    // -------------------------------------------------------------------------
    // is_user_logged_in()
    // - - - - - - - - - -
    // This Conditional Tag checks if the current visitor is logged in. This is
    // a boolean function, meaning it returns either TRUE or FALSE.'
    //
    // This function does not accept any parameters.
    //
    // RETURN VALUES
    //      (boolean)
    //          True if user is logged in, false if not logged in.
    //
    // CHANGE LOG
    //      Since: 2.0.0
    // -------------------------------------------------------------------------

    if ( ! \is_user_logged_in() ) {
        return TRUE ;
            //  Just IGNORE the request.
    }

    // =========================================================================
    // The currently logged-in user must have the specified $user_id...
    // =========================================================================

    // -------------------------------------------------------------------------
    // $user_ID = get_current_user_id()
    // - - - - - - - - - - - - - - - -
    // Returns the ID of the current user.
    //
    // RETURNS
    //      (int) The user's ID, if there is a current user; otherwise 0.
    //
    // CHANGELOG
    //      Since: Version 3.0
    // -------------------------------------------------------------------------

    if ( \get_current_user_id() !== $user_id ) {

        return <<<EOT
PROBLEM:&nbsp; User mismatch
Detected in:&nbsp; \\{$ns}\\{$fn}
EOT;

    }

    // =========================================================================
    // Get ALL the currently logged-in user's meta data...
    // =========================================================================

    // -------------------------------------------------------------------------
    // get_user_meta($user_id, $key, $single)
    // - - - - - - - - - - - - - - - - - - -
    // Retrieve a single meta field or all fields of user_meta data for the
    // given user. Uses get_metadata(). This function replaces the deprecated
    // get_usermeta() function.
    //
    //      $user_id
    //          (integer) (required) The ID of the user whose data should be
    //          retrieved.
    //          Default: None
    //
    //      $key
    //          (string) (optional) The meta_key in the wp_usermeta table for
    //          the meta_value to be returned. If left empty, will return all
    //          user_meta fields for the given user.
    //          Default: (empty string)
    //
    //      $single
    //          (boolean) (optional) If true return value of meta data field, if
    //          false return an array. This parameter has no effect if $key is
    //          left blank.
    //          Default: false
    //
    // RETURN VALUES
    //      (mixed) Will be an Array if $key is not specified or if $single is
    //      false. Will be value of meta_value field if $single is true.
    //
    //      NOTE
    //      If the meta value does not exist and $single is true the function
    //      will return an empty string. If $single is false an empty array is
    //      returned.
    //
    // EXAMPLES
    //
    // This example returns and then displays the last name for user id 9.
    //
    //      $user_id = 9;
    //      $key = 'last_name';
    //      $single = true;
    //      $user_last = get_user_meta( $user_id, $key, $single );
    //
    // This example demonstrates leaving the $key argument blank, in order to
    // retrieve all meta data for the given user (in this example, user_id = 9):
    //
    //      $all_meta_for_user = get_user_meta( 9 );
    //
    //      Generates:-
    //
    //          $all_meta_for_user = Array(
    //              [first_name]    => Array( [0] => Tom      )
    //              [last_name]     => Array( [0] => Auger    )
    //              [nickname]      => Array( [0] => tomauger )
    //              [description]   => etc....
    //              )
    //
    // Note: in order to access the data in this example, you need to
    // dereference the array that is returned for each key, like so:
    //
    //      $last_name = $all_meta_for_user['last_name'][0];
    //
    // To avoid this, you may want to run a simple array_map() on the results of
    // get_user_meta() in order to take only the first index of each result
    // (this emulating what the $single argument does when $key is provided:
    //
    //      $all_meta_for_user =
    //          array_map( function( $a ){ return $a[0]; }, get_user_meta( $user_id ) );
    //
    //      Generates:-
    //
    //          $all_meta_for_user = Array(
    //              [first_name]    => Tom
    //              [last_name]     => Auger
    //              [nickname]      => tomauger
    //              [description]   => etc....
    //              )
    //
    // CHANGE LOG
    //      Since: 3.0
    // -------------------------------------------------------------------------

    $key = '' ;

    $all_user_meta_data = \get_user_meta( $user_id , $key ) ;

    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $all_user_meta_data ) ;

    // =========================================================================
    // DELETE the USER's "WP ADMIN DOWNLOAD" META DATA...
    // =========================================================================

    // -------------------------------------------------------------------------
    // delete_user_meta( $user_id, $meta_key, $meta_value )
    // - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Remove metadata matching criteria from a user.
    //
    // You can match based on the key, or key and value. Removing based on key
    // and value, will keep from removing duplicate metadata with the same key.
    // It also allows removing all metadata matching key, if needed.
    //
    //      $user_id
    //          (integer) (required) user ID
    //          Default: None
    //
    //      $meta_key
    //          (string) (required) Metadata name.
    //          Default: None
    //
    //      $meta_value
    //          (mixed) (optional) Metadata value.
    //          Default: ''
    //
    // RETURN VALUES
    //      (boolean)
    //      False for failure. True for success.
    //
    // CHANGE LOG
    //      Since: 3.0
    // -------------------------------------------------------------------------

    $wp_admin_downloads_meta_key_prefix = get_wp_admin_downloads_meta_key_prefix() ;

    // -------------------------------------------------------------------------

    $wp_admin_downloads_meta_key_prefix_len =
        strlen( $wp_admin_downloads_meta_key_prefix )
        ;

    // -------------------------------------------------------------------------

    foreach ( $all_user_meta_data as $name => $value ) {

        // ---------------------------------------------------------------------

        if ( substr( $name , 0 , $wp_admin_downloads_meta_key_prefix_len ) === $wp_admin_downloads_meta_key_prefix ) {

            // -----------------------------------------------------------------

            $result = \delete_user_meta( $user_id , $name ) ;

            // -----------------------------------------------------------------

            if ( $result === FALSE ) {

                return <<<EOT
PROBLEM:&nbsp; "delete_user_meta()" failure (cleaning up WP Admin Downloads user meta data)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

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

