<?php

// *****************************************************************************
// AD-SWAPPER.APP / MANUALLY-APPROVED-AVAILABLE-ADS-SUPPORT.PHP
// (C) 2015 Peter Newman.  All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_manuallyApprovedAvailableAds ;

// =============================================================================
// get_manually_approved_available_ads_option_name()
// =============================================================================

function get_manually_approved_available_ads_option_name() {
    return 'ad_swapper_manually_approved_available_ads' ;
}

// =============================================================================
// record_available_ads_approval_setting()
// =============================================================================

function record_available_ads_approval_setting(
    $ad_sid                 ,
    $question_approved
    ) {

    // ------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_manuallyApprovedAvailableAds\
    // record_available_ads_approval_setting(
    //      $ad_sid                 ,
    //      $question_approved
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // Record the fact that a specific "available ad" was either approved or
    // rejected.
    //
    // $question_approved must be TRUE or FALSE.
    //
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

    $option_name = get_manually_approved_available_ads_option_name() ;

    // =========================================================================
    // ERROR CHECKING
    // =========================================================================

    if ( ! is_bool( $question_approved ) ) {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM:&nbsp; Bad "question_approved" (TRUE or FALSE expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

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

    $manually_approved_available_ads =
        get_option(
            $option_name
            ) ;

    // -------------------------------------------------------------------------

    if ( $manually_approved_available_ads === FALSE ) {
        $manually_approved_available_ads = array() ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $manually_approved_available_ads = Array(
    //
    //          "<ad_sid>"  =>  <a-time()_last_downloaded>
    //
    //          "<ad_sid>"  =>  <r-time()_last_downloaded>
    //
    //          [nnhw-zmcg] =>  a-1448527327        (approved)
    //
    //          [9khc-zwmv] =>  r-1448527327        (rejected)
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $manually_approved_available_ads        ,
//    '$manually_approved_available_ads'
//    ) ;

    // =========================================================================
    // Update the current value...
    // =========================================================================

    $question_value_updated = FALSE ;

    // -------------------------------------------------------------------------

    if (    array_key_exists(
                $ad_sid                             ,
                $manually_approved_available_ads
                )
        ) {

        // ---------------------------------------------------------------------

        $parts = explode( '-' , $manually_approved_available_ads[ $ad_sid ] ) ;

        // ---------------------------------------------------------------------

        if (    count( $parts ) !== 2
                ||
                ! in_array( $parts[0] , array( 'a' , 'r' ) , TRUE )
                ||
                trim( $parts[1] ) === ''
                ||
                ! ctype_digit( $parts[1] )
            ) {

            $ln = __LINE__ - 6 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "manually_approved_available ad" entry (not in expected format)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        if (    $question_approved === TRUE
                &&
                $parts[0] !== 'a'
            ) {

            // -----------------------------------------------------------------

            $manually_approved_available_ads[ $ad_sid ] =
                'a-' . $parts[1]
                ;

            // -----------------------------------------------------------------

            $question_value_updated = TRUE ;

            // -----------------------------------------------------------------

        } elseif (  $question_approved !== TRUE
                    &&
                    $parts[0] !== 'r'
            ) {

            // -----------------------------------------------------------------

            $manually_approved_available_ads[ $ad_sid ] =
                'r-' . $parts[1]
                ;

            // -----------------------------------------------------------------

            $question_value_updated = TRUE ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        if ( $question_approved === TRUE ) {

            $manually_approved_available_ads[ $ad_sid ] =
                'a-' . (string) time()
                ;

        } else {

            $manually_approved_available_ads[ $ad_sid ] =
                'r-' . (string) time()
                ;

        }
        //  Actually, this "available ad" was downloaded BEFORE time().  But we
        //  don't know the exact "time()" - so this is our best guess.

        // ---------------------------------------------------------------------

        $question_value_updated = TRUE ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Save the new value ?
    // =========================================================================

    if ( $question_value_updated ) {

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
                        $manually_approved_available_ads
                        ) ;

        // ---------------------------------------------------------------------

        if ( $result !== TRUE ) {

            $ln = __LINE__ - 2 ;

            return <<<EOT
PROBLEM:&nbsp; "update_option()" failure updating manually approved available ads
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

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

