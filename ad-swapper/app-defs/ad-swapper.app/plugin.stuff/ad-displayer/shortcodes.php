<?php

// ***************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / AD-DISPLAYER / SHORTCODES.PHP
// (C) 2015 Peter Newman. All Rights Reserved
// ***************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer ;

    // -------------------------------------------------------------------------
    // WORDPRESS SHORTCODES API - OVERVIEW
    // ===================================
    // From:  http://codex.wordpress.org/Shortcode_API
    //
    // SYNOPSIS
    //
    //      // [bartag foo="foo-value"]
    //      function bartag_func( $atts ) {
    //
    //          extract( shortcode_atts( array(
    //              'foo' => 'something',
    //              'bar' => 'something else',
    //              ), $atts ) );
    //
    //          return "foo = {$foo}";
    //
    //      }
    //
    //      add_shortcode( 'bartag', 'bartag_func' );
    //
    // ---
    //
    // Shortcode attributes are entered like this:
    //      [myshortcode foo="bar" bar="bing"]
    //
    // These attributes will be converted into an associative array like the
    // following, passed to the handler function as its $atts parameter:
    //      array( 'foo' => 'bar', 'bar' => 'bing' )
    //
    // The array keys are the attribute names; array values are the
    // corresponding attribute values. In addition, the zeroeth entry
    // ($atts[0]) will hold the string that matched the shortcode regex, but
    // ONLY IF that is different from the callback name. See the discussion
    // of attributes, below.
    //
    // ---
    //
    // Any string returned (not echoed) by the shortcode handler will be
    // inserted into the post body in place of the shortcode itself.
    //
    // ---
    //
    // The parameters passed to the shortcode handler are:-
    //
    //      $atts    - an associative array of attributes, or an empty string if no attributes are given
    //      $content - the enclosed content (if the shortcode is used in its enclosing form)
    //      $tag     - the shortcode tag, useful for shared callback functions
    //
    // Eg:-
    //
    //      my_shortcode_handler( $atts , $content , $tag )
    //
    // -------------------------------------------------------------------------

// =============================================================================
// adswapper_ad_slot_shortcode_handler()
// =============================================================================

function adswapper_ad_slot_shortcode_handler( $atts , $content , $tag ) {

    // -------------------------------------------------------------------------
    // The syntax is:-
    //
    //      [adswapper-ad-slot name="xxx"]
    //      [adswapper_ad_slot name="xxx"]
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $atts = Array(
    //                  [name] => "header-banner" (or whatever)
    //                  )
    //
    // -------------------------------------------------------------------------

//ob_start() ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $atts ) ;
//return ob_get_clean() ;

    // =========================================================================
    // ERROR CHECKING...
    // =========================================================================

//  $err_div_style = 'color:#AA0000; border:1px solid #000000; padding:0 0.33em' ;

    // -------------------------------------------------------------------------
    // $atts
    // -------------------------------------------------------------------------

    if ( ! is_array( $atts ) ) {
        $atts = array() ;
    }

    // -------------------------------------------------------------------------
    // name ?
    // -------------------------------------------------------------------------

    if (    ! array_key_exists( 'name' , $atts )
            ||
            trim( $atts['name'] ) === ''
        ) {

        return '' ;
            //  NO "name"
            //      =>  NO ads...

    }

    // -------------------------------------------------------------------------

//      return <<<EOT
//  <div style="{$err_div_style}">
//      Blah blah blah...
//  </div>
//  EOT;

    // =========================================================================
    // Get the ad slot HTML...
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

    $ad_slot_name_or_widget_id = trim( $atts['name'] ) ;

    $question_widget_id = FALSE ;

    // -------------------------------------------------------------------------

    $ad_slot_html =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\get_ad_html_for_ad_slot(
            $ad_slot_name_or_widget_id      ,
            $question_widget_id
            ) ;

    // =========================================================================
    // Return the ad slot HTML...
    // =========================================================================

    return $ad_slot_html ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// Add the shortcode...
// =============================================================================

    add_shortcode(
        'adswapper-ad-slot'                                             ,
        '\\' . __NAMESPACE__ . '\\adswapper_ad_slot_shortcode_handler'
        ) ;

    // -------------------------------------------------------------------------

    add_shortcode(
        'adswapper_ad_slot'                                             ,
        '\\' . __NAMESPACE__ . '\\adswapper_ad_slot_shortcode_handler'
        ) ;

// =============================================================================
// That's that!
// =============================================================================

