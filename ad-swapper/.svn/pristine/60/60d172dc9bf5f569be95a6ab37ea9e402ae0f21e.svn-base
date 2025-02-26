<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN-SETTING-FIELD-GROUPS.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperPluginSettings ;
        //  NOTE!
        //  -----
        //  The dataset name/slug should be camel cased.  Eg:-
        //      projects
        //      referenceUrls
        //      globalLogMessages

// =============================================================================
// get_plugin_setting_field_groups()
// =============================================================================

function get_plugin_setting_field_groups() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAdSlots\
    // get_plugin_setting_field_groups()
    // - - - - - - - - - - - - - - - - -
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

    $list_number_font_size = '200%' ;

    $header_font_size = '150%' ;

    $text_font_size = '117%' ;

    // -------------------------------------------------------------------------

    $field_group_heading_style = <<<EOT
margin-top:1em; padding:0.5em 1em; background-color:#000000; color:#FFFFFF
EOT;

    // -------------------------------------------------------------------------

    $list_number_style = <<<EOT
font-size:{$list_number_font_size}; font-weight:bold
EOT;

    // -------------------------------------------------------------------------

    $field_group_title_style = <<<EOT
font-size:{$header_font_size}; font-weight:bold
EOT;

    // -------------------------------------------------------------------------

    $field_group_text_style = <<<EOT
margin-top:0.1em; padding-left:2.5em; font-size:{$text_font_size}; font-style:italic
EOT;

    // -------------------------------------------------------------------------

    $field_groups = array() ;

    // =========================================================================
    // Copy/Paste FROM Here
    // =========================================================================

    $html_before = <<<EOT
<div style="{$field_group_heading_style}">
    <div>
        <span style="{$list_number_style}">3.</span>
        <span style="{$field_group_title_style}">&nbsp; Copy/Paste FROM Here</span>
    </div>
    <div style="{$field_group_text_style}">
        Copy/paste the following three fields - <u>TO the form in the OTHER TAB</u>...
    </div>
</div>
EOT;

    // -------------------------------------------------------------------------

    $html_after = '' ;

    // -------------------------------------------------------------------------

    $field_groups[] = array(
        'form_field_name'   =>  'wp_home_url'   ,
        'html_before'       =>  $html_before    ,
        'html_after'        =>  $html_after
        ) ;

    // =========================================================================
    // Save The OTHER Form
    // =========================================================================

//      make the mental note to return to it (once you've submitted it), by
//      pressing the <b>"edit"</b> button for the site you've just
//      registered.&nbsp; Then
//
//      veb>and press
//
//      the "Submit" button...

    $html_before = <<<EOT
<div style="{$field_group_heading_style}">
    <div>
        <span style="{$list_number_style}">4.</span>
        <span style="{$field_group_title_style}">&nbsp; Save The OTHER Form</span>
    </div>
    <div style="{$field_group_text_style}">
        Go to Step 4. - in the "Add Site Registration" form in the OTHER TAB -
        and follow the instructions there.

        <div style="margin-top:0.5em; font-size:117%;
            text-decoration:underline">NOTE!</div>
        If you save the "Add Site Registration" form in the other tab/window (as
        instructed) - and then wind up lost - remember that, once you've saved
        the "Add Site Registration" form, you'll be returned to the <b>"Manage
        Site Registrations"</b> screen (in the other tab/window).&nbsp; From
        which you must press the <b>"edit"</b> button - for the Ad Swapper site
        you've just registered - to come back to the <b>"Edit Site
        Registration"</b> screen (and get the field values you need to
        copy/paste to this form, below)...

    </div>
</div>
EOT;

    // -------------------------------------------------------------------------

    $html_after = '' ;

    // -------------------------------------------------------------------------

    $field_groups[] = array(
        'form_field_name'   =>  'ad_swapper_user_sid'   ,
        'html_before'       =>  $html_before            ,
        'html_after'        =>  $html_after
        ) ;

    // =========================================================================
    // Copy/Paste TO Here
    // =========================================================================

    $html_before = <<<EOT
<div style="{$field_group_heading_style}">
    <div>
        <span style="{$list_number_style}">5.</span>
        <span style="{$field_group_title_style}">&nbsp; Copy/Paste TO Here</span>
    </div>
    <div style="{$field_group_text_style}">
        Copy/paste the following four fields - <u>FROM the corresponding fields
        in the OTHER TAB</u>
    </div>
</div>
EOT;

    // -------------------------------------------------------------------------

    $html_after = '' ;

    // -------------------------------------------------------------------------

    $field_groups[] = array(
        'form_field_name'   =>  'ad_swapper_user_sid'   ,
        'html_before'       =>  $html_before            ,
        'html_after'        =>  $html_after
        ) ;

    // =========================================================================
    // Save THIS Form
    // =========================================================================

    $html_before = <<<EOT
<div style="{$field_group_heading_style}">
    <div>
        <span style="{$list_number_style}">6.</span>
        <span style="{$field_group_title_style}">&nbsp; Save THIS Form</span>
    </div>
    <div style="{$field_group_text_style}">
        By pressing the <b>"Submit"</b> button (immediately) below...
    </div>
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
    // Done!
    // =========================================================================

    $html_before = <<<EOT
<div style="{$field_group_heading_style}">
    <div>
        <span style="{$list_number_style}">7.</span>
        <span style="{$field_group_title_style}">&nbsp; Done!</span>
    </div>
    <div style="{$field_group_text_style}">
        Once you've pressed the <b>Submit</b> button (immediately above,) you'll
        be returned to the Ad Swapper (Local) plugin's <b>Main Menu</b>.&nbsp;
        The site that this Ad Swapper plugin is installed on should now be
        registered with Ad Swapper Central.&nbsp; And you should be able to
        create and upload ads (and do everything else that Ad Swapper does).
    </div>
</div>

<div style="{$field_group_heading_style}; margin-top:2em">
    <div style="{$field_group_title_style}">Extras</div>
    <div style="{$field_group_text_style}">
        IGNORE the following fields (unless you know what you're doing - they're
        mainly intended for the use of the plugin developers).
    </div>
</div>
EOT;

    // -------------------------------------------------------------------------

    $html_after = '' ;

    // -------------------------------------------------------------------------

    $field_groups[] = array(
        'form_field_name'   =>  'api_url_override'      ,
        'html_before'       =>  $html_before            ,
        'html_after'        =>  $html_after
        ) ;

    // =========================================================================
    // Cancel
    // =========================================================================

    $html_before = <<<EOT
<div style="{$field_group_heading_style}">
    <div style="{$field_group_title_style}">Cancel</div>
    <div style="{$field_group_text_style}">
        Return to the Ad Swapper Main Menu - WITHOUT saving the form (and thus,
        discarding any changes you may have made).
    </div>
</div>
EOT;

    // -------------------------------------------------------------------------

    $html_after = '' ;

    // -------------------------------------------------------------------------

    $field_groups[] = array(
        'form_field_name'   =>  'cancel'            ,
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

