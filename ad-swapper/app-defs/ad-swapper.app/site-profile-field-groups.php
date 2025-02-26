<?php

// *****************************************************************************
// AD-SWAPPER.APP / SITE-PROFILE-FIELD-GROUPS.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperSiteProfile ;
        //  NOTE!
        //  -----
        //  The dataset name/slug should be camel cased.  Eg:-
        //      projects
        //      referenceUrls
        //      globalLogMessages

// =============================================================================
// get_site_profile_field_groups()
// =============================================================================

function get_site_profile_field_groups() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperSiteProfile\
    // get_site_profile_field_groups()
    // - - - - - - - - - - - - - - - -
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
        'form_field_name'   =>  'site_title'    ,
        'html_before'       =>  $html_before    ,
        'html_after'        =>  $html_after
        ) ;

    // =========================================================================
    // GeoIP
    // =========================================================================


    $html_before = <<<EOT
<div style="{$field_group_heading_style}">
    <div style="{$field_group_title_style}">GeoIP</div>
    <div style="{$field_group_text_style}">

        <u>NOTE!</u><br />
        <b>You MUST enter at least one country or continent code</b>!&nbsp; Or
        else NONE of your ads will be displayed (on any Ad Swapper sites -
        including your own).&nbsp; The goal is to ensure that every Ad Swapper
        gets the <b>maximum advertising</b> - by making it easy for everyone to
        <b>restrict their advertising to only those countries/continents where
        it will be most useful</b>.&nbsp; So when picking your
        countries/continents, please tick all those you need to target.&nbsp;
        But please also <b>try to avoid wasting your advertising</b>, where the
        only real effect will be to deny it to others.

    </div>
</div>
EOT;

    // -------------------------------------------------------------------------

    $html_after = '' ;

    // -------------------------------------------------------------------------

    $field_groups[] = array(
        'form_field_name'   =>  'geoip_countries_incl'      ,
        'html_before'       =>  $html_before                ,
        'html_after'        =>  $html_after
        ) ;

    // =========================================================================
    // License Key
    // =========================================================================

    $html_before = <<<EOT
<div style="{$field_group_heading_style}">
    <div style="{$field_group_title_style}">License Key</div>
    <div style="{$field_group_text_style}">
        Entering a (valid) license key here, will switch this site from "Free
        Test Drive / Trial" mode, to <b>"Paid Subscription" mode</b> (until the
        license expires, at least).

    </div>
</div>
EOT;

    // -------------------------------------------------------------------------

    $html_after = '' ;

    // -------------------------------------------------------------------------

    $field_groups[] = array(
        'form_field_name'   =>  'license_key'       ,
        'html_before'       =>  $html_before        ,
        'html_after'        =>  $html_after
        ) ;

    // =========================================================================
    // Ad Related Settings
    // =========================================================================

    $html_before = <<<EOT
<div style="{$field_group_heading_style}">
    <div style="{$field_group_title_style}">Ad Related Settings</div>
</div>
EOT;

    // -------------------------------------------------------------------------

    $html_after = '' ;

    // -------------------------------------------------------------------------

    $field_groups[] = array(
        'form_field_name'   =>  'question_auto_approve_new_ads'     ,
        'html_before'       =>  $html_before                        ,
        'html_after'        =>  $html_after
        ) ;

    // =========================================================================
    // Disable Incoming And/Or Outgoing Ads ?
    // =========================================================================

    $html_before = <<<EOT
<div style="{$field_group_heading_style}">
    <div style="{$field_group_title_style}">Disable Incoming And/Or Outgoing Ads ?</div>
    <div style="{$field_group_text_style}">
        You can use these fields to (quickly and easily) <b>disable this site's
        Ad Swapper advertising</b>.&nbsp; By using these checkboxes, there's no
        need to make complicated (and hard to restore,) changes to your other
        settings (like deleting all your ads, or de-selecting all your selected
        sites, for example).

    </div>
</div>
EOT;

    // -------------------------------------------------------------------------

    $html_after = '' ;

    // -------------------------------------------------------------------------

    $field_groups[] = array(
        'form_field_name'   =>  'question_disable_incoming_ads'     ,
        'html_before'       =>  $html_before                        ,
        'html_after'        =>  $html_after
        ) ;

    // =========================================================================
    // Test Mode
    // =========================================================================

    $html_before = <<<EOT
<div style="{$field_group_heading_style}">
    <div style="{$field_group_title_style}">Test Mode</div>
    <div style="{$field_group_text_style}">
        Test Mode allows you to <b>try out the Ad Swapper plugin</b> - without
        anyone but yourself (the WebMaster) being able to see any Ad Swapper
        ads.&nbsp; In test mode, ads are only displayed to the IP Address or
        Cookie you specify.&nbsp; So your normal users/readers see NO ads.
    </div>
</div>
EOT;

    // -------------------------------------------------------------------------

    $html_after = '' ;

    // -------------------------------------------------------------------------

    $field_groups[] = array(
        'form_field_name'   =>  'test_method'       ,
        'html_before'       =>  $html_before        ,
        'html_after'        =>  $html_after
        ) ;

    // =========================================================================
    // Plugin Developer Related Settings
    // =========================================================================

    $html_before = <<<EOT
<div style="{$field_group_heading_style}">
    <div style="{$field_group_title_style}">Plugin Developer Related Settings</div>
    <div style="{$field_group_text_style}">
        Forget about this.&nbsp; It's for the plugin developers only!
    </div>
</div>
EOT;

    // -------------------------------------------------------------------------

    $html_after = '' ;

    // -------------------------------------------------------------------------

    $field_groups[] = array(
        'form_field_name'   =>  'question_manual_update_approval'   ,
        'html_before'       =>  $html_before                        ,
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

