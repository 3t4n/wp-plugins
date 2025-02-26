<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / AD-DISPLAYER /
//      ADS-LIST-SUPPORT.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer ;

// -----------------------------------------------------------------------------
// OVERVIEW
// ========
// The ads list is stored in an array like:-
//
//      $ads_list = array(
//
//          'ads_grouped_by_site'   =>  array(
//
//              array(
//
//                  'site_sid'  =>  "xxx"
//
//                  'ads'   =>  array(
//                                  <ads-record-1>
//                                  <ads-record-2>
//                                  ...
//                                  <ads-record-N>
//                                  )
//
//                  'ad_indices_by_sid'     =>  array(
//                      <ad-sid-1>      =>  0   ,
//                      <ad-sid-2>      =>  1   ,
//                      ...
//                      <ad-sid-N>      =>  M
//                      )
//
//                  'next_free_ad_index'    =>  <0...>
//
//                  'question_all_ads_shown'    =>  TRUE/FALSE
//
//                  )
//
//              ...
//
//              )
//
//          'site_indices_by_sid'    =>  array(
//              <site-sid-1>    =>  0   ,
//              <site-sid-2>    =>  1   ,
//              ...
//              <site-sid-N>    =>  M
//              )
//
//          'current_site_index'        =>  <0...>
//
//          'question_all_ads_shown'    =>  TRUE/FALSE
//
//          )
//
// Where "sid" = "Sequential ID":-
//
//      o   Is the BIGINT "id" field of the Ad Swapper Central "available
//          sites" and "available ads" tables,
//
//      o   Converted to a string like:-
//              "9khc-zwmv"
//
//          by "number2key()"
//
// In other words, these "sids" provide global unique ids for the sites and
// ads.
// -----------------------------------------------------------------------------

// =============================================================================
// die_if_bad_ad_type()
// =============================================================================

function die_if_bad_ad_type( $ad_type ) {

    // -------------------------------------------------------------------------

    if (    ! in_array(
                $ad_type                        ,
                array( 'banner' , 'normal' )    ,
                TRUE
                )
        ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 7  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad `ad_type` ("banner" or "normal" expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_ads_list_option_name()
// =============================================================================

function get_ads_list_option_name( $ad_type ) {
    // $ad_type is assumed to be one of:   "banner", "normal"
    return 'adSwapper_adDisplayer_adsList_' . $ad_type ;
}

// =============================================================================
// get_ads_list()
// =============================================================================

function get_ads_list( $ad_type ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_ads_list( $ad_type )
    // - - - - - - - - - - - -
    // Returns the currently stored (and possibly empty) "ads list" (or FALSE,
    // if there is NO currently stored ads list).
    //
    // $ad_type is assumed to be one of:   "banner", "normal"
    //
    // NOTE!
    // =====
    // If an array is returned, that array has been validated OK by:-
    //      die_if_bad_ads_list()
    //
    // RETURNS
    //      ARRAY $ads_list
    //      --OR--
    //      FALSE (= there is NO "ads list" stored in the WordPress options
    //      database yet).
    //
    //      The value returned has been checked - and is OK to use.
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    die_if_bad_ad_type( $ad_type ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_array_option(
    //      $option_name                ,
    //      $die_if_not_exist = FALSE
    //      )
    // - - - - - - - - - - - - - - -
    // Retrieves a PHP ARRAY from the WordPress options database.
    //
    // Should be used instead of "get_option()", because "get_option()"
    //      o   Doesn't check that the returned value is an array
    //
    // NOTE!
    // =====
    // The ARRAY value can have been saved with either; "update_option(), or;
    // "update_option_properly()".
    //
    // RETURNS
    //      o   $die_if_not_exist = TRUE
    //              ARRAY $saved_value
    //              dies()s if option doesn't exist
    //
    //      o   $die_if_not_exist = FALSE
    //              ARRAY $saved_value
    //              --or--
    //              FALSE (= option doesn't exist)
    //
    // die()s on error (eg; retrieved option not an array)
    // -------------------------------------------------------------------------

    $die_if_not_exist = FALSE ;

    // -------------------------------------------------------------------------

    $ads_list = get_array_option(
                    get_ads_list_option_name( $ad_type )    ,
                    $die_if_not_exist
                    ) ;

    // -------------------------------------------------------------------------

    if ( $ads_list === FALSE ) {
        return FALSE ;
    }

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // die_if_bad_ads_list(
    //      $ads_list
    //      )
    // - - - - - - - - -
    // Dies if the the specified "ads list" appears INVALID (in the sense that
    // it's NOT an ARRAY that contains the variables that it's supposed to).
    //
    // RETURNS
    //      Nothing
    //
    // die()s on error
    // -------------------------------------------------------------------------

    die_if_bad_ads_list( $ads_list ) ;

    // -------------------------------------------------------------------------

    return $ads_list ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// set_ads_list()
// =============================================================================

function set_ads_list( $ad_type , $ads_list ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // set_ads_list(
    //      $ad_type    ,
    //      $ads_list
    //      )
    // - - - - - - - - -
    // Saves the specified "ads list" (in the WordPress options database).
    //
    // $ad_type must be one of:   "banner", "normal"
    //
    // RETURNS
    //      TRUE
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    die_if_bad_ad_type( $ad_type ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // die_if_bad_ads_list(
    //      $ads_list
    //      )
    // - - - - - - - - -
    // Dies if the the specified "ads list" appears INVALID (in the sense that
    // it's NOT an ARRAY that contains the variables that it's supposed to).
    //
    // RETURNS
    //      Nothing
    //
    // die()s on error
    // -------------------------------------------------------------------------

    die_if_bad_ads_list( $ads_list ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // update_option_properly(
    //      $option_name    ,
    //      $new_value      ,
    //      $autoload
    //      )
    // - - - - - - - - - - -
    // Fixes numerous bugs with WordPress's "update_option()".
    //
    // In particular:-
    //
    // 1.   You can now save BOOLEAN values.  Though you MUST read them with:-
    //          get_boolean_option()
    //
    // 2.   Integer values can be retrieved as INTs - by reading them with:-
    //          get_integer_option()
    //
    // 3.   Doubles/floats and resources still not supported yet.
    //
    // $new_value MUST be:-
    //          boolean, integer, string, array, or object
    //
    // RETURNS:-
    //      TRUE (whether the new value is different from the old value or not)
    //
    // "dies()" on error.
    // -------------------------------------------------------------------------

    $autoload = TRUE ;

    // -------------------------------------------------------------------------

    update_option_properly(
        get_ads_list_option_name( $ad_type )    ,
        $ads_list                               ,
        $autoload
        ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // set_update_LOCAL_site_run_since_ads_list_last_reloaded()
    //      $value
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Set this variable to $value (which must be TRUE or FALSE ).
    //
    // RETURNS
    //      TRUE
    //
    // die()s on error
    // -------------------------------------------------------------------------

    set_update_LOCAL_site_run_since_ads_list_last_reloaded( FALSE ) ;

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_empty_ads_list()
// =============================================================================

function get_empty_ads_list() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_empty_ads_list()
    // - - - - - - - - - -
    // Returns an empty ads list (no sites nor ads).
    //
    // RETURNS
    //      $ads_list ARRAY
    // -------------------------------------------------------------------------

    $ads_list = array(
        'ads_grouped_by_site'       =>  array()     ,
        'site_indices_by_sid'       =>  array()     ,
        'current_site_index'        =>  0           ,
        'question_all_ads_shown'    =>  FALSE
        ) ;

    // -------------------------------------------------------------------------

    die_if_bad_ads_list( $ads_list ) ;

    // -------------------------------------------------------------------------

    return $ads_list ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// question_ads_list_is_empty()
// =============================================================================

function question_ads_list_is_empty(
    $ads_list
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // question_ads_list_is_empty(
    //      $ads_list
    //      )
    // - - - - - - - - - - - - - -
    // Returns a flag that indicates whether or not the specified "ads list"
    // is empty (in the sense that has has NO ads).
    //
    // RETURNS
    //      TRUE or FALSE
    //
    // die()s on error
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $ads_list = array(
    //
    //          'ads_grouped_by_site'   =>  array(
    //
    //              array(
    //
    //                  'site_sid'  =>  "xxx"
    //
    //                  'ads'   =>  array(
    //                                  <ads-record-1>
    //                                  <ads-record-2>
    //                                  ...
    //                                  <ads-record-N>
    //                                  )
    //
    //                  'ad_indices_by_sid'     =>  array(
    //                      <ad-sid-1>      =>  0   ,
    //                      <ad-sid-2>      =>  1   ,
    //                      ...
    //                      <ad-sid-N>      =>  M
    //                      )
    //
    //                  'next_free_ad_index'    =>  <0...>
    //
    //                  'question_all_ads_shown'    =>  TRUE/FALSE
    //
    //                  )
    //
    //              ...
    //
    //              )
    //
    //          'site_indices_by_sid'    =>  array(
    //              <site-sid-1>    =>  0   ,
    //              <site-sid-2>    =>  1   ,
    //              ...
    //              <site-sid-N>    =>  M
    //              )
    //
    //          'current_site_index'        =>  <0...>
    //
    //          'question_all_ads_shown'    =>  TRUE/FALSE
    //
    //          )
    //
    // -------------------------------------------------------------------------

    if (    count( $ads_list ) === 0
            ||
            ! array_key_exists( 'ads_grouped_by_site' , $ads_list )
            ||
            count( $ads_list['ads_grouped_by_site'] ) === 0
        ) {
        return TRUE ;
    }

    // -------------------------------------------------------------------------

    return FALSE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// die_if_bad_ads_list()
// =============================================================================

function die_if_bad_ads_list(
    $ads_list
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // die_if_bad_ads_list(
    //      $ads_list
    //      )
    // - - - - - - - - -
    // Dies if the the specified "ads list" appears INVALID (in the sense that
    // it's NOT an ARRAY that contains the variables that it's supposed to).
    //
    // RETURNS
    //      Nothing
    //
    // die()s on error
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $ads_list = array(
    //
    //          'ads_grouped_by_site'   =>  array(
    //
    //              array(
    //
    //                  'site_sid'  =>  "xxx"
    //
    //                  'ads'   =>  array(
    //                                  <ads-record-1>
    //                                  <ads-record-2>
    //                                  ...
    //                                  <ads-record-N>
    //                                  )
    //
    //                  'ad_indices_by_sid'     =>  array(
    //                      <ad-sid-1>      =>  0   ,
    //                      <ad-sid-2>      =>  1   ,
    //                      ...
    //                      <ad-sid-N>      =>  M
    //                      )
    //
    //                  'next_free_ad_index'    =>  <0...>
    //
    //                  'question_all_ads_shown'    =>  TRUE/FALSE
    //
    //                  )
    //
    //              ...
    //
    //              )
    //
    //          'site_indices_by_sid'    =>  array(
    //              <site-sid-1>    =>  0   ,
    //              <site-sid-2>    =>  1   ,
    //              ...
    //              <site-sid-N>    =>  M
    //              )
    //
    //          'current_site_index'        =>  <0...>
    //
    //          'question_all_ads_shown'    =>  TRUE/FALSE
    //
    //          )
    //
    // -------------------------------------------------------------------------

//echo '<pre>' ;
//print_r( $ads_list ) ;
//echo '</pre>' ;

    // -------------------------------------------------------------------------

    if (    ! is_array( $ads_list )
            ||
            count( $ads_list ) < 1
        ) {

        $msg = <<<EOT
Bad "ads list" (non-empty array expected)
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    $required_toplevel_members = array(
        'ads_grouped_by_site'       =>  'array'     ,
        'site_indices_by_sid'       =>  'array'     ,
        'current_site_index'        =>  'integer'   ,
        'question_all_ads_shown'    =>  'boolean'
        ) ;

    // -------------------------------------------------------------------------

    foreach ( $required_toplevel_members as $name => $type ) {

        // ---------------------------------------------------------------------

        if ( ! array_key_exists( $name , $ads_list ) ) {

            $msg = <<<EOT
Bad "ads list" (no "{$name}")
EOT;

            die( nl2br( $msg ) ) ;

        }

        // ---------------------------------------------------------------------

        if ( gettype( $ads_list[ $name ] ) !== $type ) {

            $msg = <<<EOT
Bad "ads list" + "{$name}" ({$type} expected)
EOT;

            die( nl2br( $msg ) ) ;

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $required_sitelevel_members = array(
        'site_sid'                  =>  'string'    ,
        'ads'                       =>  'array'     ,
        'ad_indices_by_sid'         =>  'array'     ,
        'next_free_ad_index'        =>  'integer'   ,
        'question_all_ads_shown'    =>  'boolean'
        ) ;

    // -------------------------------------------------------------------------

    foreach ( $ads_list['ads_grouped_by_site'] as $this_index => $this_site ) {

        // ---------------------------------------------------------------------

        foreach ( $required_sitelevel_members as $name => $type ) {

            // -----------------------------------------------------------------

            if ( ! array_key_exists( $name , $this_site ) ) {

                $msg = <<<EOT
Bad "ads list" (site index {$this_index} has NO "{$name}")
EOT;

                die( nl2br( $msg ) ) ;

            }

            // -----------------------------------------------------------------

            if ( gettype( $this_site[ $name ] ) !== $type ) {

                $msg = <<<EOT
Bad "ads list" + site index {$this_index} + "{$name}" ({$type} expected)
EOT;

                die( nl2br( $msg ) ) ;

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    return ;

    // -------------------------------------------------------------------------

}

// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------

/*
// =============================================================================
// get_next_free_ads_list_item_index_option_name()
// =============================================================================

function get_next_free_ads_list_item_index_option_name( $ad_type ) {
    // $ad_type is assumed to be one of:   "banner", "normal"
    return 'adSwapper_adDisplayer_nextFreeAdsListItemIndex_' . $ad_type ;
}

// =============================================================================
// get_ads_list_is_empty_option_name()
// =============================================================================

function get_ads_list_is_empty_option_name( $ad_type ) {
    // $ad_type is assumed to be one of:   "banner", "normal"
    return 'adSwapper_adDisplayer_adsListIsEmpty_' . $ad_type ;
}

// =============================================================================
// get_all_ads_list_parameters()
// =============================================================================

function get_all_ads_list_parameters( $ad_type ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_all_ads_list_parameters( $ad_type )
    // - - - - - - - - - - - - - - - - - - - -
    // Returns all the "ads list" related parameters.
    //
    // $ad_type should be one of:   "banner", "normal"
    //
    // RETURNS
    //      array(
    //          $ads_list                           ,
    //          $question_ads_list_is_empty         ,   //  TRUE or FALSE
    //          $next_free_ads_list_item_index          //  1 to PHP_INT_MAX
    //          )
    //      --OR--
    //      FALSE (= there is NO "ads list" stored in the WordPress options
    //      database yet).
    //
    //      If an array is returned, the values in it have been checked - and
    //      are OK to use.
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    die_if_bad_ad_type( $ad_type ) ;

    // -------------------------------------------------------------------------

    $ads_list = get_ads_list( $ad_type ) ;

    // -------------------------------------------------------------------------

    if ( $ads_list === FALSE ) {
        return FALSE ;
    }

    // -------------------------------------------------------------------------

    return array(
                $ads_list                                       ,
                get_question_ads_list_is_empty( $ad_type )      ,
                get_next_free_ads_list_item_index( $ad_type )
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// set_all_ads_list_parameters()
// =============================================================================

function set_all_ads_list_parameters(
    $ad_type                            ,
    $ads_list                           ,
    $question_ads_list_is_empty         ,
    $next_free_ads_list_item_index
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // set_all_ads_list_parameters(
    //      $ad_type                            ,
    //      $ads_list                           ,
    //      $question_ads_list_is_empty         ,
    //      $next_free_ads_list_item_index
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // Sets all the "ads list" related parameters.
    //
    // $ad_type should be one of:   "banner", "normal"
    //
    // RETURNS
    //      TRUE
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    set_ads_list(
        $ad_type    ,
        $ads_list
        ) ;

    // -------------------------------------------------------------------------

    set_question_ads_list_is_empty(
        $ad_type                        ,
        $question_ads_list_is_empty
        ) ;

    // -------------------------------------------------------------------------

    set_next_free_ads_list_item_index(
        $ad_type                        ,
        $next_free_ads_list_item_index
        ) ;

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_question_ads_list_is_empty()
// =============================================================================

function get_question_ads_list_is_empty( $ad_type ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_question_ads_list_is_empty(
    //      $ad_type
    //      )
    // - - - - - - - - - - - - - - - -
    // Returns a boolean value that indicates whether or not the (last Loaded)
    // "ads list" (= list of ads to be displayed), is empty.
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
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_boolean_option(
    //      $option_name                ,
    //      $die_if_not_exist = FALSE
    //      )
    // - - - - - - - - - - - - - - - - -
    // Retrieves a PHP BOOLEAN value (TRUE or FALSE), from the WordPress
    // options database.
    //
    // NOTE!
    // =====
    // The BOOLEAN value MUST have been saved with "update_option_properly()".
    //
    // RETURNS
    //      If $die_if_not_exist = TRUE
    //          TRUE or FALSE
    //          dies() if option doesn't exist
    //      If $die_if_not_exist = FALSE
    //          TRUE or FALSE
    //          NULL if option doesn't exist
    //
    // die()s on other error
    // -------------------------------------------------------------------------

    $die_if_not_exist = TRUE ;

    // -------------------------------------------------------------------------

    return get_boolean_option(
                get_ads_list_is_empty_option_name( $ad_type )   ,
                $die_if_not_exist
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// set_question_ads_list_is_empty()
// =============================================================================

function set_question_ads_list_is_empty(
    $ad_type                        ,
    $question_ads_list_is_empty
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // set_question_ads_list_is_empty(
    //      $ad_type                        ,
    //      $question_ads_list_is_empty
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // Set the
    //      "question_ads_list_is_empty"
    //
    // option.
    //
    // $ad_type should be one of:   "banner", "normal"
    //
    // RETURNS
    //      TRUE
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    if ( ! is_bool( $question_ads_list_is_empty ) ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "question_ads_list_is_empty" (TRUE or FALSE expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    die_if_bad_ad_type( $ad_type ) ;

    // -------------------------------------------------------------------------
    // "update_option()" can't save booleans.  So we save them as INT 0 or 1
    // instead...
    // -------------------------------------------------------------------------

    if ( $question_ads_list_is_empty ) {
        $question_ads_list_is_empty = 1 ;

    } else {
        $question_ads_list_is_empty = 0 ;

    }

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // update_option_properly(
    //      $option_name    ,
    //      $new_value      ,
    //      $autoload
    //      )
    // - - - - - - - - - - -
    // Fixes numerous bugs with WordPress's "update_option()".
    //
    // In particular:-
    //
    // 1.   You can now save BOOLEAN values.  Though you MUST read them with:-
    //          get_boolean_option()
    //
    // 2.   Integer values can be retrieved as INTs - by reading them with:-
    //          get_integer_option()
    //
    // 3.   Doubles/floats and resources still not supported yet.
    //
    // $new_value MUST be:-
    //          boolean, integer, string, array, or object
    //
    // RETURNS:-
    //      TRUE (whether the new value is different from the old value or not)
    //
    // "dies()" on error.
    // -------------------------------------------------------------------------

    $autoload = TRUE ;

    // -------------------------------------------------------------------------

    update_option_properly(
        get_ads_list_is_empty_option_name( $ad_type )   ,
        $question_ads_list_is_empty                     ,
        $autoload
        ) ;

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_next_free_ads_list_item_index()
// =============================================================================

function get_next_free_ads_list_item_index( $ad_type ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_next_free_ads_list_item_index(
    //      $ad_type
    //      )
    // - - - - - - - - - - - - - - - - -
    // Returns the index of the next free item in the ads list (= the next
    // ad to be displayed)...
    //
    // $ad_type should be one of:   "banner", "normal"
    //
    // RETURNS
    //      INT $next_free_ads_list_item_index (0 to PHP_INT_MAX)
    //
    //      The value returned has been checked - and is OK to use.
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    die_if_bad_ad_type( $ad_type ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_integer_option(
    //      $option_name
    //      )
    // - - - - - - - - - -
    // Retrieves a PHP INT value, from the WordPress options database.
    //
    // Should be used instead of "get_option()", because "get_option()"
    // returns INTs as STRINGs.
    //
    // NOTE!
    // =====
    // The INTEGER value can have been saved with either; "update_option(), or;
    // "update_option_properly()".
    //
    // RETURNS
    //      INT $saved_value
    //
    // die()s on error (eg; option doesn't exist yet)
    // -------------------------------------------------------------------------

    $option_name = get_next_free_ads_list_item_index_option_name( $ad_type ) ;

    // -------------------------------------------------------------------------

    $index = get_integer_option(
                $option_name
                ) ;

    // -------------------------------------------------------------------------

    if ( $index < 0 ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        $safe_option_name = htmlentities( $option_name ) ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "{$safe_option_name}" (0, 1, 2, ... expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    return $index ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// set_next_free_ads_list_item_index()
// =============================================================================

function set_next_free_ads_list_item_index(
    $ad_type                        ,
    $next_free_ads_list_item_index
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // set_next_free_ads_list_item_index(
    //      $ad_type                        ,
    //      $next_free_ads_list_item_index
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // Sets the index of the next free item in the ads list (= the next ad
    // to be displayed)...
    //
    // $ad_type should be one of:   "banner", "normal"
    //
    // RETURNS
    //      TRUE
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    if (    ! is_int( $next_free_ads_list_item_index )
            ||
            $next_free_ads_list_item_index < 0
        ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 6  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "next_free_ads_list_item_index" (0, 1, 2, ... expected) (#2)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    die_if_bad_ad_type( $ad_type ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // update_option_properly(
    //      $option_name    ,
    //      $new_value      ,
    //      $autoload
    //      )
    // - - - - - - - - - - -
    // Fixes numerous bugs with WordPress's "update_option()".
    //
    // In particular:-
    //
    // 1.   You can now save BOOLEAN values.  Though you MUST read them with:-
    //          get_boolean_option()
    //
    // 2.   Integer values can be retrieved as INTs - by reading them with:-
    //          get_integer_option()
    //
    // 3.   Doubles/floats and resources still not supported yet.
    //
    // $new_value MUST be:-
    //          boolean, integer, string, array, or object
    //
    // RETURNS:-
    //      TRUE (whether the new value is different from the old value or not)
    //
    // "dies()" on error.
    // -------------------------------------------------------------------------

    $autoload = TRUE ;

    // -------------------------------------------------------------------------

    update_option_properly(
        get_next_free_ads_list_item_index_option_name( $ad_type )   ,
        $next_free_ads_list_item_index                              ,
        $autoload
        ) ;

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}
*/

// =============================================================================
// That's that!
// =============================================================================

