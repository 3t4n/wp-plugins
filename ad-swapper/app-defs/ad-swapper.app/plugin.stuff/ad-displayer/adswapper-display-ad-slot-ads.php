<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / AD-DISPLAYER / ADSWAPPER-DISPLAY-AD-SLOT-ADS.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

// =============================================================================
// adswapper_display_ad_slot_ads()
// =============================================================================

function adswapper_display_ad_slot_ads(
    $ad_slot_name
    ) {

    // -------------------------------------------------------------------------
    // adswapper_display_ad_slot_ads(
    //      $ad_slot_name
    //      )
    // - - - - - - - - - - - - - - - - -
    // Return the front-end HTML that goes where the ad slot is.  In other
    // words, returns the Ad Swapper ad (or ads) that go in that ad slot.
    //
    // N.B.  The returned HTML could be an error message.
    //
    // ---
    //
    // $ad_slot_name should be the value in the Name field of the ad slot
    // whoose ads you want to display.  Eg:-
    //      o   "header-banner"
    //      o   "sidebar"
    //
    // (or whatever it's called).
    //
    // ---
    //
    // You normally insert this PHP function in your WordPress theme files -
    // where you want those Ad Swapper ads to appear - as follows:-
    //
    //      ...
    //      if ( function_exists( 'adswapper_display_ad_slot_ads' ) ) {
    //          echo adswapper_display_ad_slot_ads( 'header-banner' ) ;
    //      }
    //      ...
    //      if ( function_exists( 'adswapper_display_ad_slot_ads' ) ) {
    //          echo adswapper_display_ad_slot_ads( 'sidebar' ) ;
    //      }
    //      ...
    //
    // NOTE!
    //
    // 1.   The "function_exists()" line matters.  Without it - if you ever
    //      deactivate the Ad Swapper plugin - and forget to remove these:-
    //          adswapper_display_ad_slot_ads( 'xxx' )
    //      lines from your theme files - your page/site probably WON'T
    //      display properly.  (With these function_exists()" lines, the
    //      missing:-
    //          adswapper_display_ad_slot_ads( 'xxx' )
    //      functions will just be ignored.
    //
    //  2.  The "echo" command (preceding the:-
    //          adswapper_display_ad_slot_ads( 'xxx' )
    //      function call), is needed to send the HTML string returned by
    //      the function to the user's browser.  Without that "echo" command,
    //      the ads won't appear.
    //
    // RETURNS
    //      $html STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Get the widget's ad slot HTML...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/display-ad-slot-ads.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // get_ad_html_for_ad_slot(
    //      $ad_slot_name_or_widget_id  ,
    //      $question_widget_id
    //      )
    // - - - - - - - - - - - - - - - - -
    // Returns the front-end HTML that goes where the ad slot is.  In other
    // words, generates and returns the Ad Swapper ad (or ads), to go in the ad
    // slot.
    //
    // N.B. The returned HTML could be an error message.
    //
    // RETURNS
    //      $ad_slot_html STRING
    // -------------------------------------------------------------------------

    $ad_slot_name_or_widget_id = $ad_slot_name ;

    $question_widget_id = FALSE ;

    // -------------------------------------------------------------------------

    $ad_slot_html =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\get_ad_html_for_ad_slot(
            $ad_slot_name_or_widget_id      ,
            $question_widget_id
            ) ;

    // =========================================================================
    // Return the HTML wrapped in the Widget Area before/after stuff...
    // =========================================================================

    return $ad_slot_html ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

