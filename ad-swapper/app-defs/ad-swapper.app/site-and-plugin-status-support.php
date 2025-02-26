<?php

// *****************************************************************************
// AD-SWAPPER.APP / SITE-AND-PLUGIN-STATUS-SUPPORT.PHP
// (C) 2015 Peter Newman.  All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_siteAndPluginStatusSupport ;

// =============================================================================
// get_site_and_plugin_status_option_name()
// =============================================================================

function get_site_and_plugin_status_option_name() {
    return 'ad_swapper_site_and_plugin_status' ;
}

// =============================================================================
// get_site_and_plugin_status()
// =============================================================================

function get_site_and_plugin_status() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_siteAndPluginStatusSupport\
    // get_site_and_plugin_status()
    // - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $site_and_plugin_status ARRAY
    //
    //          Which array should be like (eg):-
    //
    //              $site_and_plugin_status = array(
    //                  'last_central_data_retrieval_time_gmt'  =>  <this-time()>                       ,
    //                  'subscription_license_key'              =>  '' or 32-char HEX string            ,
    //                  'exact_subscription_type'               =>  'trial", "paid", "manual", etc      ,
    //                  'effective_subscription_type'           =>  'trial" or "paid"                   ,
    //                  'subscription_start_datetime_gmt'       =>  <that-time()>                       ,
    //                  'subscription_expiry_datetime_gmt'      =>  <the-other-time()>                  ,
    //                  'central_plugin_version'                =>  'X.Y.Z'                             ,
    //                  'min_local_source_plugin_version'       =>  'A.B.C'                             ,
    //                  'max_local_source_plugin_version'       =>  'D.E.F'                             ,
    //                  'min_local_wordpress_plugin_version'    =>  'G.H.I'                             ,
    //                  'max_local_wordpress_plugin_version'    =>  'J.K.L'
    //                  )
    //
    //          Though if the "site_and_plugin_status" HASN'T been set yet
    //          (because "Update Local Site" HASN'T been run yet), it will be
    //          like:-
    //
    //              $site_and_plugin_status = array(
    //                  'last_central_data_retrieval_time_gmt'  =>  0           ,
    //                  'subscription_license_key'              =>  'unknown'   ,
    //                  'exact_subscription_type'               =>  'unknown'   ,
    //                  'effective_subscription_type'           =>  'unknown'   ,
    //                  'subscription_start_datetime_gmt'       =>  0           ,
    //                  'subscription_expiry_datetime_gmt'      =>  0           ,
    //                  'central_plugin_version'                =>  'unknown'   ,
    //                  'min_local_source_plugin_version'       =>  'unknown'   ,
    //                  'max_local_source_plugin_version'       =>  'unknown'   ,
    //                  'min_local_wordpress_plugin_version'    =>  'unknown'   ,
    //                  'max_local_wordpress_plugin_version'    =>  'unknown'
    //                  )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $no_current_value = array(
        'last_central_data_retrieval_time_gmt'  =>  0           ,
        'subscription_license_key'              =>  'unknown'   ,
        'exact_subscription_type'               =>  'unknown'   ,
        'effective_subscription_type'           =>  'unknown'   ,
        'subscription_start_datetime_gmt'       =>  0           ,
        'subscription_expiry_datetime_gmt'      =>  0           ,
        'central_plugin_version'                =>  'unknown'   ,
        'min_local_source_plugin_version'       =>  'unknown'   ,
        'max_local_source_plugin_version'       =>  'unknown'   ,
        'min_local_wordpress_plugin_version'    =>  'unknown'   ,
        'max_local_wordpress_plugin_version'    =>  'unknown'
        ) ;

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

    $site_and_plugin_status =
        get_option(
            get_site_and_plugin_status_option_name()
            ) ;

    // -------------------------------------------------------------------------

    if ( $site_and_plugin_status === FALSE ) {
        return $no_current_value ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $site_and_plugin_status = Array(
    //          [subscription_license_key]              => 8bb5a535f3b949223e4be34bccfe97fe
    //          [exact_subscription_type]               => paid
    //          [effective_subscription_type]           => paid
    //          [subscription_start_datetime_gmt]       => 1449313376
    //          [subscription_expiry_datetime_gmt]      => 1478564757
    //          [central_plugin_version]                => latest
    //          [min_local_source_plugin_version]       =>  'unknown'
    //          [max_local_source_plugin_version]       =>  'unknown'
    //          [min_local_wordpress_plugin_version]    =>  'unknown'
    //          [max_local_wordpress_plugin_version]    =>  'unknown'
    //          [last_central_data_retrieval_time_gmt]  => 1449367400
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $site_and_plugin_status        ,
//    '$site_and_plugin_status'
//    ) ;

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $site_and_plugin_status ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// set_site_and_plugin_status()
// =============================================================================

function set_site_and_plugin_status(
    $site_and_plugin_status
    ) {

    // ------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_siteAndPluginStatusSupport\
    // set_site_and_plugin_status(
    //      $site_and_plugin_status
    //      )
    // - - - - - - - - - - - - - -
    // $site_and_plugin_status should be like (eg):-
    //
    //      $site_and_plugin_status = array(
    //          'last_central_data_retrieval_time_gmt'  =>  <this-time()>                       ,
    //          'subscription_license_key'              =>  '' or 32-char HEX string            ,
    //          'exact_subscription_type'               =>  'trial", "paid", "manual", etc      ,
    //          'effective_subscription_type'           =>  'trial" or "paid"                   ,
    //          'subscription_start_datetime_gmt'       =>  <that-time()>                       ,
    //          'subscription_expiry_datetime_gmt'      =>  <the-other-time()>                  ,
    //          'central_plugin_version'                =>  'X.Y.Z'                             ,
    //          'min_local_source_plugin_version'       =>  'A.B.C'                             ,
    //          'max_local_source_plugin_version'       =>  'D.E.F'                             ,
    //          'min_local_wordpress_plugin_version'    =>  'G.H.I'                             ,
    //          'max_local_wordpress_plugin_version'    =>  'J.K.L'
    //          )
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

    // =========================================================================
    // ERROR CHECKING
    // =========================================================================

    if (    ! is_array( $site_and_plugin_status )
            ||
            count( $site_and_plugin_status ) < 1
        ) {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM:&nbsp; Bad "site_and_plugin_status" (non-empty array expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    //  TODO:   More checking ???

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $site_and_plugin_status = Array(
    //          [subscription_license_key]             => 8bb5a535f3b949223e4be34bccfe97fe
    //          [exact_subscription_type]              => paid
    //          [effective_subscription_type]          => paid
    //          [subscription_start_datetime_gmt]      => 1449313376
    //          [subscription_expiry_datetime_gmt]     => 1478564757
    //          [central_plugin_version]               => latest
    //          [min_local_source_plugin_version]      => unknown
    //          [max_local_source_plugin_version]      => unknown
    //          [min_local_wordpress_plugin_version]   => unknown
    //          [max_local_wordpress_plugin_version]   => unknown
    //          [last_central_data_retrieval_time_gmt] => 1449367727
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $site_and_plugin_status        ,
//    '$site_and_plugin_status'
//    ) ;

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
                    get_site_and_plugin_status_option_name()    ,
                    $site_and_plugin_status
                    ) ;

    // -------------------------------------------------------------------------

    if ( $result !== TRUE ) {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM:&nbsp; "update_option()" failure updating site and plugin status
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

