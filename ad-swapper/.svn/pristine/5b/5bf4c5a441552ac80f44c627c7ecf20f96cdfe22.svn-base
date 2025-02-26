<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / AD-DISPLAYER / GENERIC-SUPPORT /
//      NUMBER-TIMES-AD-DISPLAYED-THIS-PAGE.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer ;


// =============================================================================
// get_number_times_ad_displayed_this_page_variable_name()
// =============================================================================

function get_number_times_ad_displayed_this_page_variable_name() {
    return 'greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer_numberTimesAdDisplayedThisPage' ;
        //  Holds an ARRAY like (eg):-
        //      array(
        //          "<site-id-1>"   =>  I   ,
        //          "<site-id-2>"   =>  J   ,
        //          ...
        //          )
}

// =============================================================================
// get_number_times_ad_displayed_this_page()
// =============================================================================

function get_number_times_ad_displayed_this_page(
    $ad_sid
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_number_times_ad_displayed_this_page(
    //      $ad_sid
    //      )
    // - - - - - - - - - - - - - - - - - - - -
    // Returns the time of times the specified ad has been displayed (on the
    // current page being displayed).
    //
    // RETURNS
    //      INT $number_times_ad_displayed_this_page
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    $varname = get_number_times_ad_displayed_this_page_variable_name() ;

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $varname , $GLOBALS ) ) {
        return 0 ;
            //  Ad NOT displayed yet
    }

    // -------------------------------------------------------------------------

    if ( ! is_array( $GLOBALS[ $varname ] ) ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "number_times_ad_displayed_this_pages" (array expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $ad_sid , $GLOBALS[ $varname ] ) ) {
        return 0 ;
            //  Ad NOT displayed yet
    }

    // -------------------------------------------------------------------------

    if (    ! is_int( $GLOBALS[ $varname ][ $ad_sid ] )
            ||
            $GLOBALS[ $varname ][ $ad_sid ] < 0
        ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 6  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "number_times_ad_displayed_this_pages" (for ad) (0, 1, 2, ... expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    return $GLOBALS[ $varname ][ $ad_sid ] ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// inc_number_times_ad_displayed_this_page()
// =============================================================================

function inc_number_times_ad_displayed_this_page(
    $ad_sid
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // inc_number_times_ad_displayed_this_page(
    //      $ad_sid
    //      )
    // - - - - - - - - - - - - - - - - - - - -
    // Increments the time of times the specified ad has been displayed (on the
    // current page being displayed).
    //
    // RETURNS
    //      Nothing
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    $varname = get_number_times_ad_displayed_this_page_variable_name() ;

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $varname , $GLOBALS ) ) {
        $GLOBALS[ $varname ] = array(
            $ad_sid =>  1
            ) ;
        return ;
    }

    // -------------------------------------------------------------------------

    if ( ! is_array( $GLOBALS[ $varname ] ) ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "number_times_ad_displayed_this_pages" (array expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $ad_sid , $GLOBALS[ $varname ] ) ) {
        $GLOBALS[ $varname ][ $ad_sid ] = 1 ;
        return ;
    }

    // -------------------------------------------------------------------------

    if (    ! is_int( $GLOBALS[ $varname ][ $ad_sid ] )
            ||
            $GLOBALS[ $varname ][ $ad_sid ] < 0
        ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 6  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "number_times_ad_displayed_this_pages" (for ad) (0, 1, 2, ... expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    $GLOBALS[ $varname ][ $ad_sid ]++ ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

