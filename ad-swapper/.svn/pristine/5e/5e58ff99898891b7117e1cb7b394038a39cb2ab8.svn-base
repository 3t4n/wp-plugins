<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / AD-DISPLAYER / GENERIC-SUPPORT /
//      ADS-PER-SITE-THIS-PAGE.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer ;

// =============================================================================
// get_ads_per_site_this_page_variable_name()
// =============================================================================

function get_ads_per_site_this_page_variable_name() {
    return 'greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer_adsPerSiteThisPage' ;
        //  Holds an ARRAY like (eg):-
        //      array(
        //          "<site-sid-1>"  =>  N   ,
        //          "<site-sid-2>"  =>  M   ,
        //          ...
        //          )
}

// =============================================================================
// get_ads_this_site_this_page()
// =============================================================================

function get_ads_this_site_this_page(
    $site_sid
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_ads_this_site_this_page(
    //      $site_sid
    //      )
    // - - - - - - - - - - - - - -
    // Returns the number of ads displayed so far, for this site, on the
    // current page.
    //
    // RETURNS
    //      INT $ads_this_site_this_page
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    $varname = get_ads_per_site_this_page_variable_name() ;

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $varname , $GLOBALS ) ) {
        return 0 ;
            //  NO ads displayed this page (for this site, as yet)
    }

    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    if ( ! is_array( $GLOBALS[ $varname ] ) ) {

        $ln = __LINE__ - 2  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "ads_per_site_this_page" (array expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $site_sid , $GLOBALS[ $varname ] ) ) {
        return 0 ;
            //  NO ads displayed this page (for this site, as yet)
    }

    // -------------------------------------------------------------------------

    if (    ! is_int( $GLOBALS[ $varname ][ $site_sid ] )
            ||
            $GLOBALS[ $varname ][ $site_sid ] < 0
        ) {

        $ln = __LINE__ - 4  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "ads_per_site_this_page" (for site) (0, 1, 2... expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    return $GLOBALS[ $varname ][ $site_sid ] ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// inc_ads_this_site_this_page()
// =============================================================================

function inc_ads_this_site_this_page(
    $site_sid
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // inc_ads_this_site_this_page(
    //      $site_sid
    //      )
    // - - - - - - - - - - - - - -
    // Increments the number of ads displayed so far, for this site, on the
    // current page.
    //
    // RETURNS
    //      TRUE
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    $varname = get_ads_per_site_this_page_variable_name() ;

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $varname , $GLOBALS ) ) {

        $GLOBALS[ $varname ] =
            array(
                $site_sid   =>  1
                ) ;

        return TRUE ;

    }

    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    if ( ! is_array( $GLOBALS[ $varname ] ) ) {

        $ln = __LINE__ - 2  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "ads_per_site_this_page" (array expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $site_sid , $GLOBALS[ $varname ] ) ) {

        $GLOBALS[ $varname ][ $site_sid ] = 1 ;

        return TRUE ;

    }

    // -------------------------------------------------------------------------

    if (    ! is_int( $GLOBALS[ $varname ][ $site_sid ] )
            ||
            $GLOBALS[ $varname ][ $site_sid ] < 0
        ) {

        $ln = __LINE__ - 4  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "ads_per_site_this_page" (for site) (0, 1, 2... expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    $GLOBALS[ $varname ][ $site_sid ]++ ;

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

