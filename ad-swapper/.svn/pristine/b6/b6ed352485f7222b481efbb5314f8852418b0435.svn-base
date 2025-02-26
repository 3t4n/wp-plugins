<?php

// *****************************************************************************
// AD-SWAPPER.APP / VETTED-AVAILABLE-ADS-SUPPORT.PHP
// (C) 2015 Peter Newman.  All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_vettedAvailableAds ;

// =============================================================================
// get_vetted_available_ads_option_name()
// =============================================================================

function get_vetted_available_ads_option_name() {
    return 'ad_swapper_vetted_available_ads' ;
}

// =============================================================================
// set_available_ad_vetted()
// =============================================================================

function set_available_ad_vetted(
    $ad_sid
    ) {

    // ------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_vettedAvailableAds\
    // set_available_ad_vetted(
    //      $ad_sid
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // ------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $option_name = get_vetted_available_ads_option_name() ;

    // =========================================================================
    // Get the current value...
    // =========================================================================

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
    // -------------------------------------------------------------------------

    $vetted_available_ads =
        get_option(
            $option_name
            ) ;

    // -------------------------------------------------------------------------

    if ( $vetted_available_ads === FALSE ) {
        $vetted_available_ads = array() ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $vetted_available_ads = Array(
    //
    //          "<ad-sid>"  =>  <time()-last-downloaded>
    //
    //          [nnhw-zmcg] =>  1448527327
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $vetted_available_ads        ,
//    '$vetted_available_ads'
//    ) ;

    // =========================================================================
    // Update the current value...
    // =========================================================================

//  $now = time() ;

    // -------------------------------------------------------------------------

//  if (    array_key_exists(
//              $ad_sid                             ,
//              $vetted_available_ads
//              )
//      ) {

//      $vetted_available_ads[ $ad_sid ] = $now ;
        $vetted_available_ads[ $ad_sid ] = time() ;

//  } else {
//
//      $vetted_available_ads[ $ad_sid ] = $now ;
//          //  Actually, this "available ad" was downloaded BEFORE $now.
//          //  But we don't know the exact "time()" - so this is our best
//          //  guess.
//
//  }

    // =========================================================================
    // Save the new value...
    // =========================================================================

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

    $result = update_option(
                    $option_name                        ,
                    $vetted_available_ads
                    ) ;

    // -------------------------------------------------------------------------

    if ( $result !== TRUE ) {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM:&nbsp; "update_option()" failure updating vetted available ads
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

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

