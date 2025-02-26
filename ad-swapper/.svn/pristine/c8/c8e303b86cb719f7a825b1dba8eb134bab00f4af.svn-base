<?php

// *****************************************************************************
// AD-SWAPPER.APP / AD-SLOT-FIELD-GROUPS.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAdSlots ;
        //  NOTE!
        //  -----
        //  The dataset name/slug should be camel cased.  Eg:-
        //      projects
        //      referenceUrls
        //      globalLogMessages

// =============================================================================
// get_ad_slot_field_groups()
// =============================================================================

function get_ad_slot_field_groups() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAdSlots\
    // get_ad_slot_field_groups()
    // - - - - - - - - - - - - -
    // Returns an array like (eg):-
    //
    //      $field_groups = array(
    //          array(
    //              'form_field_name'   =>  'xxx'
    //              'html_before'       =>  'yyy'
    //              'html_after'        =>  'zzz'
    //              )
    //          ...
    //          )
    //
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $header_font_size = '150%' ;

    // -------------------------------------------------------------------------

    $field_group_heading_style = <<<EOT
margin-top:1em; padding:0.5em 1em; background-color:#000000; color:#FFFFFF
EOT;

    // -------------------------------------------------------------------------

    $field_group_title_style = <<<EOT
font-size:{$header_font_size}; font-weight:bold
EOT;

    // -------------------------------------------------------------------------

    $field_group_text_style = <<<EOT
margin-top:0.5em; padding-left:1em; font-style:italic
EOT;

    // -------------------------------------------------------------------------

    $field_groups = array() ;

    // =========================================================================
    // General Stuff
    // =========================================================================

    $html_before = <<<EOT
<div style="{$field_group_heading_style}">
    <div style="{$field_group_title_style}">General Stuff</div>
</div>
EOT;

    // -------------------------------------------------------------------------

    $html_after = '' ;

    // -------------------------------------------------------------------------

    $field_groups[] = array(
        'form_field_name'   =>  'question_disabled'     ,
        'html_before'       =>  $html_before            ,
        'html_after'        =>  $html_after
        ) ;

    // =========================================================================
    // Borders
    // =========================================================================

    $html_before = <<<EOT
<div style="{$field_group_heading_style}">
    <div style="{$field_group_title_style}">Borders</div>
    <div style="{$field_group_text_style}">
        All Ad Slots - no matter what the type - may have an (optional) border
        around them (to provide space between the ads in the ad slot, and the
        surrounding content).
    </div>
</div>
EOT;

    // -------------------------------------------------------------------------

    $html_after = '' ;

    // -------------------------------------------------------------------------

    $field_groups[] = array(
        'form_field_name'   =>  'border_top_px'         ,
        'html_before'       =>  $html_before            ,
        'html_after'        =>  $html_after
        ) ;

    // =========================================================================
    // Fixed Height Banner
    // =========================================================================

    $html_before = <<<EOT
<div style="{$field_group_heading_style}">
    <div style="{$field_group_title_style}">Fixed Height Banner</div>
    <div style="{$field_group_text_style}">
        Fill-in the following fields if "<b>Type</b>" (see above) is
        "<b>Fixed-Height Banner</b>".&nbsp; Only the first two fields are
        required.&nbsp; The rest have defaults (which should work in most
        situations).&nbsp; Just override these defaults if required...
    </div>
</div>
EOT;

    // -------------------------------------------------------------------------

    $html_after = '' ;

    // -------------------------------------------------------------------------

    $field_groups[] = array(
        'form_field_name'   =>  'fixed_height_banner_outer_width_px'    ,
        'html_before'       =>  $html_before                            ,
        'html_after'        =>  $html_after
        ) ;

    // =========================================================================
    // Sidebar
    // =========================================================================

    $html_before = <<<EOT
<div style="{$field_group_heading_style}">
    <div style="{$field_group_title_style}">Sidebar</div>
    <div style="{$field_group_text_style}">
        Fill-in the following fields if "<b>Type</b>" (see above) is
        "<b>Sidebar</b>".&nbsp; Only the first field is required.&nbsp; The rest
        have defaults (which should work in most situations).&nbsp; Just
        override these defaults if required...
    </div>
</div>
EOT;

    // -------------------------------------------------------------------------

    $html_after = '' ;

    // -------------------------------------------------------------------------

    $field_groups[] = array(
        'form_field_name'   =>  'sidebar_outer_width_px'        ,
        'html_before'       =>  $html_before                    ,
        'html_after'        =>  $html_after
        ) ;

    // =========================================================================
    // Fixed Row Height Grid
    // =========================================================================

    $html_before = <<<EOT
<div style="{$field_group_heading_style}">
    <div style="{$field_group_title_style}">Fixed Row Height Grid</div>
    <div style="{$field_group_text_style}">
        Fill-in the following fields if "<b>Type</b>" (see above) is
        "<b>Fixed-Row-Height-Grid</b>".&nbsp; Only the first field is
        required.&nbsp; The rest have defaults (which should work in most
        situations).&nbsp; Just override these defaults if required...
    </div>
</div>
EOT;

    // -------------------------------------------------------------------------

    $html_after = '' ;

    // -------------------------------------------------------------------------

    $field_groups[] = array(
        'form_field_name'   =>  'fixed_row_height_grid_outer_width_px'      ,
        'html_before'       =>  $html_before                                ,
        'html_after'        =>  $html_after
        ) ;

    // =========================================================================
    // Submit / Cancel
    // =========================================================================

    $html_before = <<<EOT
<div style="{$field_group_heading_style}">
    <div style="{$field_group_title_style}">Submit / Cancel</div>
</div>
EOT;

    // -------------------------------------------------------------------------

    $html_after = '' ;

    // -------------------------------------------------------------------------

    $field_groups[] = array(
        'form_field_name'   =>  'save_me'           ,
        'html_before'       =>  $html_before        ,
        'html_after'        =>  $html_after
        ) ;

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $field_groups ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

