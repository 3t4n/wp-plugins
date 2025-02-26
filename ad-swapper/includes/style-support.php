<?php

// *****************************************************************************
// INCLUDES / STYLE-SUPPORT.PHP
// (C)_ 2014 Peter Newman. All Rights Reserved
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_styleSupport ;

// =============================================================================
// get_style_string__cross_browser_rounded_corners()
// =============================================================================

function get_style_string__cross_browser_rounded_corners(
    $radius = '10px'
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_styleSupport\
    // get_style_string__cross_browser_rounded_corners(
    //      $radius = '10px'
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS (eg):-
    //      $style_string =
    //          "-moz-border-radius:10px; -webkit-border-radius:10px; -khtml-border-radius:10px; border-radius:10px"
    //
    // NOT IE 8 or below!
    // -------------------------------------------------------------------------

    return <<<EOT
-moz-border-radius:{$radius}; -webkit-border-radius:{$radius}; -khtml-border-radius:{$radius}; border-radius:{$radius}
EOT;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_style_string__cross_browser_box_shadow()
// =============================================================================

function get_style_string__cross_browser_box_shadow(
    $options = '10px 10px 10px #808080'
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_styleSupport\
    // get_style_string__cross_browser_box_shadow(
    //      $options = '10px 10px 10px #808080'
    //      )
    // - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS (eg):-
    //      $style_string =
    //          "-moz-box-shadow:10px 10px 10px #808080; -webkit-box-shadow:10px 10px 10px #808080; box-shadow:10px 10px 10px #808080"
    // -------------------------------------------------------------------------

    return <<<EOT
-moz-box-shadow:{$options}; -webkit-box-shadow:{$options}; box-shadow:{$options}
EOT;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_style_string__cross_browser_text_shadow()
// =============================================================================

function get_style_string__cross_browser_text_shadow(
    $options = '1px 1px 1px #808080'
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_styleSupport\
    // get_style_string__cross_browser_text_shadow(
    //      $options = '1px 1px 1px #808080'
    //      )
    // - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS (eg):-
    //      $style_string =
    //          "text-shadow:1px 1px 1px #808080"
    // -------------------------------------------------------------------------

    return <<<EOT
text-shadow:{$options}
EOT;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

