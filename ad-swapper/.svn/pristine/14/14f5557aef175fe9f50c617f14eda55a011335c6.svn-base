<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / AD-DISPLAYER /
//      HANDLE-RELOAD-ADS-LIST-REQUEST.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFerntec_handleAdsListReloadRequest ;

// =============================================================================
// handle_ads_list_reload_request()
// =============================================================================

function handle_ads_list_reload_request() {

    // -------------------------------------------------------------------------
    // handle_ads_list_reload_request()
    // - - - - - - - - - - - - - - - -
    // Reloads the "ads list" (for the specified "ad slot ad type").
    //
    // RETURNS
    //      Nothing
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $_POST = Array(
    //                  [ad_type] => banner
    //                  [goto]    => http://localhost/plugdev/
    //                  )
    //
    // -------------------------------------------------------------------------

//echo '<pre>' ;
//print_r( $_POST ) ;
//echo '</pre>' ;

    // =========================================================================
    // ERROR CHECKING
    // =========================================================================

    if ( count( $_POST ) !== 2 ) {
        echo 'Bad $_POST' ;
        return ;
    }

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( 'ad_type' , $_POST ) ) {
        echo 'No "ad_type"' ;
        return ;
    }

    // -------------------------------------------------------------------------

    if ( ! in_array( $_POST['ad_type'] , array( 'banner' , 'normal' ) , TRUE ) ) {
        echo 'Bad "ad_type"' ;
        return ;
    }

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( 'goto' , $_POST ) ) {
        echo 'No "goto"' ;
        return ;
    }

    // -------------------------------------------------------------------------

    require_once( dirname( dirname( dirname( dirname( dirname( __FILE__ ) ) ) ) ) . '/includes/url-utils.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\
    // is_url(
    //      $candidate_url
    //      )
    // - - - - - - - - - -
    // Returns a flag indicating whether or not the specified string looks
    // like an ABSOLUTE URL.
    //
    // NOTE!
    // =====
    // This routine is a wrapper around:-
    //      absolute_url_string__minLen_maxLen_questionEmptyOK()
    //
    // Use the wrapped routine if you want more control.
    //
    // RETURNS
    //      TRUE or FALSE
    // -------------------------------------------------------------------------

    if ( ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\is_url( $_POST['goto'] ) ) {
        echo 'Bad "goto" (URL expected)' ;
        return ;
    }

    // =========================================================================
    // Request the "ads list" reload...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/ad-display-generic-support.php' ) ;

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

    $ad_type      = $_POST['ad_type'] ;
    $set_or_clear = 'set'             ;

    // -------------------------------------------------------------------------

    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\set_or_clear_ads_list_reload_request(
        $ad_type            ,
        $set_or_clear
        ) ;

    // =========================================================================
    // Goto the specified page...
    // =========================================================================

    echo <<<EOT
<script type="text/javascript">
    location.href = "{$_POST['goto']}" ;
</script>
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

