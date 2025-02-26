<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / AD-DISPLAYER / GENERIC-SUPPORT /
//      SITES-THIS-JOURNEY.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer ;

// -----------------------------------------------------------------------------
// OVERVIEW
// --------
// A "journey" starts with the first ad/site displayed on the page - and ends
// with either:-
//
//      o   The last ad/site displayed on the page, or;
//
//      o   Once the last unique site in the current Ads List has been
//          displayed.
//
// It's purpose is to ensure that we don't display ads from the same site,
// one after the other.
//
// Though I don't know that it does this perfectly.  Since once all the
// unique sites have been displayed, and we have to start a new jouney, what's
// to prevent the first site in the new journey being the same as the last
// site in the old journey?
//
// But how to do this better ???
// -----------------------------------------------------------------------------

// =============================================================================
// get_sites_this_journey_variable_name()
// =============================================================================

function get_sites_this_journey_variable_name() {
    return 'greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer_sitesThisJourney' ;
        //  Holds an ARRAY like (eg):-
        //      array(
        //          "<site-id-1>"       ,
        //          "<site-id-2>"       ,
        //          ...
        //          )
}

// =============================================================================
// is_site_in_current_journey()
// =============================================================================

function is_site_in_current_journey(
    $site_sid
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // is_site_in_current_journey(
    //      $site_sid
    //      )
    // - - - - - - - - - - - - - - - -
    // RETURNS
    //      TRUE or FALSE
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    $varname = get_sites_this_journey_variable_name() ;

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $varname , $GLOBALS ) ) {
        return FALSE ;
            //  Site NOT in current journey!
    }

    // -------------------------------------------------------------------------

    if ( ! is_array( $GLOBALS[ $varname ] ) ) {

        $ns = __NAMESPACE__ ;
        $fn = __FUNCTION__  ;
        $ln = __LINE__ - 4  ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "sites_this_journeys" (array expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        die( nl2br( $msg ) ) ;

    }

    // -------------------------------------------------------------------------

    if ( in_array( $site_sid , $GLOBALS[ $varname ] , TRUE ) ) {
        return TRUE ;
            //  Site IS in current journey!
    }

    // -------------------------------------------------------------------------

    return FALSE ;
        //  Site NOT in current journey!

    // -------------------------------------------------------------------------

}

// =============================================================================
// add_site_to_current_journey()
// =============================================================================

function add_site_to_current_journey(
    $site_sid
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // add_site_to_current_journey(
    //      $site_sid
    //      )
    // - - - - - - - - - - - - - -
    // Adds the specified site, to the list of sites already in the current
    // journey.
    //
    // RETURNS
    //      TRUE
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    $varname = get_sites_this_journey_variable_name() ;

    // -------------------------------------------------------------------------

    if ( array_key_exists( $varname , $GLOBALS ) ) {

        // ---------------------------------------------------------------------

        if ( ! is_array( $GLOBALS[ $varname ] ) ) {

            $ns = __NAMESPACE__ ;
            $fn = __FUNCTION__  ;
            $ln = __LINE__ - 4  ;

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "sites_this_journeys" (array expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

            die( nl2br( $msg ) ) ;

        }

        // ---------------------------------------------------------------------

        if ( ! in_array( $site_sid , $GLOBALS[ $varname ] , TRUE ) ) {
            $GLOBALS[ $varname ][] = $site_sid ;
        }

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $GLOBALS[ $varname ] = array( $site_sid ) ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// clear_current_journey()
// =============================================================================

function clear_current_journey() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // clear_current_journey()
    // - - - - - - - - - - - -
    // Empties the list of sites in the current journey.
    //
    // RETURNS
    //      TRUE
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    $GLOBALS[ get_sites_this_journey_variable_name() ] = array() ;

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// is_journey_ended()
// =============================================================================

function is_journey_ended(
    $site_sids_in_current_ads_list
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // is_journey_ended(
    //      $site_sids_in_current_ads_list
    //      )
    // - - - - - - - - - - - - - - - - - -
    // Checks to see if there's at least one site in the current ads list,
    // that's NOT yet in the current journey.
    //
    // RETURNS
    //      TRUE / FALSE
    //
    // "dies()" on error
    // -------------------------------------------------------------------------

    $site_sid_in_current_journey =
        $GLOBALS[ get_sites_this_journey_variable_name() ]
        ;

    // -------------------------------------------------------------------------

    foreach ( $site_sids_in_current_ads_list as $this_ads_list_site_sid ) {

        if (    ! in_array(
                    $this_ads_list_site_sid         ,
                    $site_sid_in_current_journey
                    )
            ) {
            return TRUE ;
        }

    }

    // -------------------------------------------------------------------------

    return FALSE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

