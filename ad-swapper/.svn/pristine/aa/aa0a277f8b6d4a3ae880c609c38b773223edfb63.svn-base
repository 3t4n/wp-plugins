<?php

// *****************************************************************************
// INCLUDES / WORDPRESS-USER-SUPPORT.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_wpUserSupport ;

// =============================================================================
// Standard WordPress User Routines
// =============================================================================

    // -------------------------------------------------------------------------
    // is_user_logged_in()
    // - - - - - - - - - -
    // This Conditional Tag checks if the current visitor is logged in. This is
    // a boolean function, meaning it returns either TRUE or FALSE.
    //
    // This function does not accept any parameters.
    //
    // RETURN VALUES
    //      (boolean)
    //      True if user is logged in, false if not logged in.
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // current_user_can( $capability, $args )
    // - - - - - - - - - - - - - - - - - - -
    // Whether the current user has a certain capability. See: Roles and
    // Capabilities.
    //
    //      $capability
    //          (string) (required) A capability. This is case-sensitive, and
    //          should be all lowercase.
    //
    //          Default: None
    //
    //      $args
    //          (mixed) (optional) Any additional arguments that may be needed,
    //          such as a post ID. Some capability checks (like 'edit_post' or
    //          'delete_page') require this be provided.
    //
    //          Default: None
    //
    // RETURNS
    //      (boolean)
    //          true if the current user has the capability.
    //          false if the current user does not have the capability.
    //
    //      Caution:    current_user_can returns true even for a non existing or
    //                  a junk post id
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // wp_get_current_user()
    // - - - - - - - - - - -
    // Retrieve the current user object (WP_User).
    //
    // NOTES!
    // ------
    // 1.   Wrapper of get_currentuserinfo() using the global variable
    //      $current_user.
    // 2.   Use the init or any subsequent action to call this function. Calling
    //      it outside of an action can lead to troubles. See #14024 for
    //      details.
    //
    // PARAMETERS
    //      none (this function does not accept any parameters)
    //
    // RETURN VALUES
    //
    //      WP_User (object)
    //      WP_User object where it can be retrieved using member variables.
    //
    // CHANGE LOG
    //      Since: 2.0.3
    // -------------------------------------------------------------------------

// =============================================================================
// current_user_has_role()
// =============================================================================

function current_user_has_role(
    $role_name                  ,
    $question_strict = TRUE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wpUserSupport\
    // current_user_has_role(
    //      $role_name                  ,
    //      $question_strict = TRUE
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // If $question_strict is TRUE, then there MUST be a logged-in user
    // (and an error message is returned if there ISN'T one).
    //
    // If $question_strict is FALSE, then FALSE is returned if there's NO
    // logged-in user.
    //
    // RETURNS
    //      On SUCCESS
    //          TRUE or FALSE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Is there a logged in user ?
    // =========================================================================

    // -------------------------------------------------------------------------
    // is_user_logged_in()
    // - - - - - - - - - -
    // This Conditional Tag checks if the current visitor is logged in. This is
    // a boolean function, meaning it returns either TRUE or FALSE.
    //
    // This function does not accept any parameters.
    //
    // RETURN VALUES
    //      (boolean)
    //      True if user is logged in, false if not logged in.
    // -------------------------------------------------------------------------

    if ( ! \is_user_logged_in() ) {

        if ( $question_strict ) {

            return <<<EOT
PROBLEM:&nbsp; Sorry, but a logged-in user was expected!
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        return FALSE ;

    }

    // =========================================================================
    // Get the current user's data...
    // =========================================================================

    // -------------------------------------------------------------------------
    // wp_get_current_user()
    // - - - - - - - - - - -
    // Retrieve the current user object (WP_User).
    //
    // NOTES!
    // ------
    // 1.   Wrapper of get_currentuserinfo() using the global variable
    //      $current_user.
    // 2.   Use the init or any subsequent action to call this function. Calling
    //      it outside of an action can lead to troubles. See #14024 for
    //      details.
    //
    // PARAMETERS
    //      none (this function does not accept any parameters)
    //
    // RETURN VALUES
    //
    //      WP_User (object)
    //      WP_User object where it can be retrieved using member variables.
    //
    // CHANGE LOG
    //      Since: 2.0.3
    // -------------------------------------------------------------------------

    $current_user_obj = \wp_get_current_user() ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $current_user_obj = WP_User Object(
    //
    //          [data] => stdClass Object(
    //                          [ID] => 7
    //                          [user_login]            => adswapper
    //                          [user_pass]             => $P$BI0CLW9hPzsHqqi1149ZVPuxPXkmby/
    //                          [user_nicename]         => adswapper
    //                          [user_email]            => petern@greatkiwi.co.nz
    //                          [user_url]              =>
    //                          [user_registered]       => 2014-11-19 02:26:56
    //                          [user_activation_key]   =>
    //                          [user_status]           => 0
    //                          [display_name]          => Ad Swapper
    //                          )
    //
    //          [ID] => 7
    //
    //          [caps] => Array(
    //                          [adswapper] => 1
    //                          )
    //
    //          [cap_key] => wp_capabilities
    //
    //          [roles] => Array(
    //                          [0] => adswapper
    //                          )
    //
    //          [allcaps] => Array(
    //                          [read]      => 1
    //                          [level_0]   => 1
    //                          [adswapper] => 1
    //                          )
    //
    //          [filter] =>
    //
    //      )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $current_user_obj ) ;

    // -------------------------------------------------------------------------

    if ( in_array( strtolower( $role_name ) , $current_user_obj->roles , TRUE ) ) {
        return TRUE ;
    }

    // -------------------------------------------------------------------------

    return FALSE ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// is_administrator()
// =============================================================================

function is_administrator() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wpUserSupport\
    // is_administrator()
    // - - - - - - - - -
    // RETURNS:-
    //      o   TRUE if there's a currently logged-in WordPress user - AND
    //          that user is an Administrator (= has the "manage_options"
    //          capability.
    //      o   FALSE otherwise.
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // is_user_logged_in()
    // - - - - - - - - - -
    // This Conditional Tag checks if the current visitor is logged in. This is
    // a boolean function, meaning it returns either TRUE or FALSE.
    //
    // This function does not accept any parameters.
    //
    // RETURN VALUES
    //      (boolean)
    //      True if user is logged in, false if not logged in.
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // current_user_can( $capability, $args )
    // - - - - - - - - - - - - - - - - - - -
    // Whether the current user has a certain capability. See: Roles and
    // Capabilities.
    //
    //      $capability
    //          (string) (required) A capability. This is case-sensitive, and
    //          should be all lowercase.
    //
    //          Default: None
    //
    //      $args
    //          (mixed) (optional) Any additional arguments that may be needed,
    //          such as a post ID. Some capability checks (like 'edit_post' or
    //          'delete_page') require this be provided.
    //
    //          Default: None
    //
    // RETURNS
    //      (boolean)
    //          true if the current user has the capability.
    //          false if the current user does not have the capability.
    //
    //      Caution:    current_user_can returns true even for a non existing or
    //                  a junk post id
    // -------------------------------------------------------------------------

    if (    \is_user_logged_in()
            &&
            \current_user_can( 'manage_options' )
        ) {
        return TRUE ;
    }

    // -------------------------------------------------------------------------

    return FALSE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

