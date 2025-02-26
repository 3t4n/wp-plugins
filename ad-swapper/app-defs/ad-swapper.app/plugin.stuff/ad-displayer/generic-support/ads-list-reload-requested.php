<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / AD-DISPLAYER / GENERIC-SUPPORT /
//      ADS-LIST-RELOAD-REQUESTED.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer ;


// =============================================================================
// get_ads_list_reload_requests_option_name()
// =============================================================================

function get_ads_list_reload_requests_option_name() {
    return 'adSwapper_adDisplayer_adsListReloadRequests' ;
        //  Holds an ARRAY like (eg):-
        //      array(
        //          'banner'    ,
        //          'normal'
        //          )
        //  which array holds the "ad slot ad types" of the "ads lists"
        //  whoose reload has been requested.
}

// =============================================================================
// get_ads_list_reload_requested()
// =============================================================================

function get_ads_list_reload_requested( $ad_type ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_ads_list_reload_requested(
    //      $ad_type
    //      )
    // - - - - - - - - - - - - - - - -
    // Returns a boolean value that indicates whether or not a reload of the
    // specified "ads list" has been requested.
    //
    // $ad_type should be one of:   "banner", "normal"
    //
    // RETURNS
    //      TRUE or FALSE
    //
    //      The value returned has been checked - and is OK to use.
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    die_if_bad_ad_type( $ad_type ) ;

    // -------------------------------------------------------------------------
    // get_option( $option , $default )
    // - - - - - - - - - - - - - - - -
    // A safe way of getting values for a named option from the options database
    // table . If the desired option does not exist, or no value is associated
    // with it, FALSE will be returned.
    //
    //      $option
    //          (string) (required) Name of the option to retrieve. Underscores
    //          separate words, lowercase only.
    //          Default: None
    //
    //      $default
    //          (mixed) (optional) The default value to return if no value is
    //          returned (ie. the option is not in the database).
    //          Default: false
    //
    // RETURN VALUES
    //      (mixed) Current value for the specified option. If the option does
    //      not exist, returns parameter $default if specified or boolean FALSE
    //      by default.
    // ------------------------------------------------------------------------

    $ads_list_reload_requests =
        get_option(
            get_ads_list_reload_requests_option_name()  ,
            array()
            ) ;

    // -------------------------------------------------------------------------

    if ( ! is_array( $ads_list_reload_requests ) ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "ads_list_reload_requests" (array expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

//echo '<pre>' ;
//print_r( $ads_list_reload_requests ) ;
//echo '</pre>' ;

    // -------------------------------------------------------------------------

    if ( in_array( $ad_type , $ads_list_reload_requests , TRUE ) ) {
        return TRUE ;
    }

    // -------------------------------------------------------------------------

    return FALSE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// set_or_clear_ads_list_reload_request()
// =============================================================================

function set_or_clear_ads_list_reload_request(
    $ad_type        ,
    $set_or_clear
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // set_or_clear_ads_list_reload_request(
    //      $ad_type            ,
    //      $set_or_clear
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // Sets or clears the flag that indicates whether or not a reload of the
    // specified "ads list" has been requested.
    //
    // $ad_type should be one of:   "banner", "normal"
    //
    // $set_or_clear should be one of:  "set", "clear"
    //
    // RETURNS
    //      TRUE
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    die_if_bad_ad_type( $ad_type ) ;

    // -------------------------------------------------------------------------

    if ( ! in_array( $set_or_clear , array( 'set' , 'clear' ) , TRUE ) ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "set_or_clear" ("set" or "clear" expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------
    // get_option( $option , $default )
    // - - - - - - - - - - - - - - - -
    // A safe way of getting values for a named option from the options database
    // table . If the desired option does not exist, or no value is associated
    // with it, FALSE will be returned.
    //
    //      $option
    //          (string) (required) Name of the option to retrieve. Underscores
    //          separate words, lowercase only.
    //          Default: None
    //
    //      $default
    //          (mixed) (optional) The default value to return if no value is
    //          returned (ie. the option is not in the database).
    //          Default: false
    //
    // RETURN VALUES
    //      (mixed) Current value for the specified option. If the option does
    //      not exist, returns parameter $default if specified or boolean FALSE
    //      by default.
    // ------------------------------------------------------------------------

    $ads_list_reload_requests =
        get_option(
            get_ads_list_reload_requests_option_name()  ,
            array()
            ) ;

    // -------------------------------------------------------------------------

    if ( ! is_array( $ads_list_reload_requests ) ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "ads_list_reload_requests" (array expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    if ( $set_or_clear === 'set' ) {

        // ---------------------------------------------------------------------
        // SET
        // ---------------------------------------------------------------------

        if ( in_array( $ad_type , $ads_list_reload_requests , TRUE ) ) {
            return TRUE ;       //  Already set
        }

        // ---------------------------------------------------------------------

        $ads_list_reload_requests[] = $ad_type ;

        // ---------------------------------------------------------------------

    } elseif ( $set_or_clear === 'clear' ) {

        // ---------------------------------------------------------------------
        // CLEAR
        // ---------------------------------------------------------------------

        if ( ! in_array( $ad_type , $ads_list_reload_requests , TRUE ) ) {
            return TRUE ;       //  Already clear
        }

        // ---------------------------------------------------------------------

        foreach ( $ads_list_reload_requests as $key => $value ) {
            if ( $value === $ad_type ) {
                unset( $ads_list_reload_requests[ $key ] ) ;
//              break ;
            }
        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // update_option( $option , $new_value , $autoload )
    // - - - - - - - - - - - - - - - - - - - - - - - - -
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
    //      $option
    //          (string) (required) Name of the option to update. Must not
    //          exceed 64 characters. A list of valid default options to update
    //          can be found at the Option Reference.
    //          Default: None
    //
    //      $new_value
    //          (mixed) (required) The NEW value for this option name. This
    //          value can be an integer, string, array, or object.
    //          Default: None
    //
    //      $autoload
    //          (mixed) (optional) Whether to load the option when WordPress
    //          starts up. For existing options `$autoload` can only be updated
    //          using `update_option()` if `$value` is also changed. Accepts
    //          'yes' or true to enable, 'no' or false to disable. For
    //          non-existent options, the default value is 'yes'.
    //          Default: null
    //
    // RETURN VALUE
    //      (boolean) True if option value has changed, false if not or if
    //      update failed.
    // -------------------------------------------------------------------------

    $autoload = TRUE ;

    // -------------------------------------------------------------------------

    update_option(
        get_ads_list_reload_requests_option_name()  ,
        $ads_list_reload_requests                   ,
        $autoload
        ) ;

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

