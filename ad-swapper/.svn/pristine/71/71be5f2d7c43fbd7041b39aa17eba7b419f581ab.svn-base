<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / CUSTOM.PAGES / RELOAD-ADS-LIST.CP /
//      PAGE-DISPLAY-FILE.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_reloadAdsList ;

// =============================================================================
// get_page_html()
// =============================================================================

function get_page_html(
    $core_plugapp_dirs                                  ,
    $applications_dataset_and_view_definitions_etc      ,
    $all_custom_pages                                   ,
    $this_custom_page                                   ,
    $question_front_end
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_<customPageNameCamelCase>\
    // get_page_html(
    //      $core_plugapp_dirs                                  ,
    //      $applications_dataset_and_view_definitions_etc      ,
    //      $all_custom_pages                                   ,
    //      $this_custom_page                                   ,
    //      $question_front_end
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Handles a GET call with:-
    //      $_GET['action'] = 'custom-page'
    //
    // RETURNS
    //      o   On SUCCESS
    //              $page_html STRING
    //              (The HTML for the page to be displayed.)
    //
    //      o   On FAILURE
    //              ARRAY( $error_message ) STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // NOTES!
    // ------
    // 1.   Here we should have (eg):-
    //
    //          $_GET = Array(
    //                      [page]          => pluginPlant
    //                      [action]        => custom-page
    //                      [application]   => selective-exporter
    //                      [custom_page]   => export-pages
    //                      )
    //
    // 2.   At this point, the following GET variables:-
    //          o   'page'
    //          o   'action'
    //          o   'application'
    //          o   'custom_page'
    //
    //      have been validated - and are OK.
    //
    // 3.   All, other (eg; custom page specific,) GET variables are unchecked.
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_GET ) ;

    // =========================================================================
    // Init...
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Display the custom page proper...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/reload-ads-list.php' ) ;

    // -------------------------------------------------------------------------

    return get_custom_page_html_proper(
                $core_plugapp_dirs                                  ,
                $applications_dataset_and_view_definitions_etc      ,
                $all_custom_pages                                   ,
                $this_custom_page                                   ,
                $question_front_end
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

