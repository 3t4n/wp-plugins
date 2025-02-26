<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / CUSTOM.PAGES / UPDATE-LOCAL-SITE.CP /
//      PAGE-DISPLAY-FILE.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateLocalSite ;

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
    // Define the WordPress "post-type" to be selected/exported...
    // =========================================================================

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // WordPress post types include:-
    //      o   'post'       - a post.
    //      o   'page'       - a page.
    //      o   'revision'   - a revision.
    //      o   'attachment' - an attachment.
    //      o   '<custom-post-types>'
    // -------------------------------------------------------------------------

//  $requested_post_type = 'page' ;

    // =========================================================================
    // Define the WordPress "statuses" to be selected/exported (as a
    // comma-separated list/string)...
    // =========================================================================

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // WordPress post type "status" values include:-
    //      o   'publish'    - A published post or page
    //      o   'pending'    - post is pending review
    //      o   'draft'      - a post in draft status
    //      o   'auto-draft' - a newly created post, with no content
    //      o   'future'     - a post to publish in the future
    //      o   'private'    - not visible to users who are not logged in
    //      o   'inherit'    - a revision. see get_children.
    //      o   'trash'      - post is in trashbin. added with Version 2.9.
    // -------------------------------------------------------------------------

//  $allowed_post_type_status_values = array(
//      'publish'       ,
//      'pending'       ,
//      'draft'         ,
//      'future'        ,
//      'private'       ,
//      'inherit'
//      ) ;
        //  All but "auto-draft" and "trash"

    // =========================================================================
    // Submission Handler...
    // =========================================================================

//  if ( count( $_POST ) > 0 ) {
//
//      // ---------------------------------------------------------------------
//
//      require_once( dirname( __FILE__ ) . '/submission-handler.php' ) ;
//
//      // -------------------------------------------------------------------------
//      // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_<customPageNameCamelCase>\
//      // submission_handler(
//      //      $core_plugapp_dirs                                  ,
//      //      $applications_dataset_and_view_definitions_etc      ,
//      //      $all_custom_pages                                   ,
//      //      $this_custom_page                                   ,
//      //      $question_front_end                                 ,
//      //      $requested_post_type                                ,
//      //      $allowed_post_type_status_values
//      //      )
//      // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//      // Returns the WordPress page selector HTML.
//      //
//      // RETURNS
//      //      o   On SUCCESS
//      //              $page_html STRING
//      //              (The HTML for the page to be displayed.)
//      //
//      //      o   On FAILURE
//      //              ARRAY( $error_message ) STRING
//      // -------------------------------------------------------------------------
//
//      return submission_handler(
//                  $core_plugapp_dirs                                  ,
//                  $applications_dataset_and_view_definitions_etc      ,
//                  $all_custom_pages                                   ,
//                  $this_custom_page                                   ,
//                  $question_front_end                                 ,
//                  $requested_post_type                                ,
//                  $allowed_post_type_status_values
//                  ) ;
//
//      // ---------------------------------------------------------------------
//
//  }

    // =========================================================================
    // Display the custom page proper...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/update-local-site.php' ) ;

    // -------------------------------------------------------------------------

//  return get_wordpress_post_slash_page_selector_html(
//              $core_plugapp_dirs                                  ,
//              $applications_dataset_and_view_definitions_etc      ,
//              $all_custom_pages                                   ,
//              $this_custom_page                                   ,
//              $question_front_end                                 ,
//              $requested_post_type                                ,
//              $allowed_post_type_status_values
//              ) ;

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

