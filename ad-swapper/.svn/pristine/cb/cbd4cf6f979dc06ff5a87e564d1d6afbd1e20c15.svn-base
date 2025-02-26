<?php

// *****************************************************************************
// AD-SWAPPER.APP / SIDEBAR / FORM-FIELDS.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAdSlots ;
        //  NOTE!
        //  -----
        //  The dataset name/slug should be camel cased.  Eg:-
        //      projects
        //      referenceUrls
        //      globalLogMessages

// =============================================================================
// The Extra Form Fields - For This Ad Slot Type...
// =============================================================================

    $help_text_sidebar_outer_width_px = <<<EOT
<b style="color:#CC0000">REQUIRED!</b>&nbsp; If "type" (see above), ISN'T "Sidebar", then enter a dummy value (eg; 999)
EOT;

    // -------------------------------------------------------------------------

    $help_text_sidebar_fit_start_height_div_width = <<<EOT
Ads that go in the sidebar will be resized - widthwise - to fit in the sidebar
exactly.&nbsp; Whether or not the ad is reduced in size - heightwise - to some
maximum height, then depends on the relationship between:-<ul style="margin:0">

    <li>The resulting ad image height, and;

    <li>The ad image width multiplied by the value of this field.</li>

</ul>As follows:-<dl style="margin:0 0 0 2em">

    <dt>LESS THAN OR EQUAL</dt>

        <dd>The ad is displayed with it's aspect ratio preserved.</dd>

    <dt>GREATER THAN</dt>

        <dd>The ad will be shrunk - heightwise - to the ad image width
            multiplied by the value of this field.</dd>

</dl>
(optional - default = 1)
EOT;

    // -------------------------------------------------------------------------

    $help_text_sidebar_fit_end_discard_start_height_div_width = <<<EOT
Ads that go in the sidebar will be resized - widthwise - to fit in the sidebar
exactly.&nbsp; Whether or not the ad is displayed then depends on the
relationship between:-<ul style="margin:0">

    <li>The resulting ad image height, and;

    <li>The ad image width multiplied by the value of this field.</li>

</ul>As follows:-<dl style="margin:0 0 0 2em">

    <dt>LESS THAN OR EQUAL</dt>

        <dd>The ad is DISPLAYED (though possibly reduced in size - heightwise -
            as specified by the previous field).</dd>

    <dt>GREATER THAN</dt>

        <dd>The ad is DISCARDED.</dd>

</dl>
(optional - default = 1.5)
EOT;

    // -------------------------------------------------------------------------

    $temp = array(

            // -----------------------------------------------------------------
            // sidebar_outer_width_px
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'sidebar_outer_width_px'                ,
                'zebra_control_type'    =>  'text'                                  ,
                'label'                 =>  'Outer Width (px)'                      ,
                'help_text'             =>  $help_text_sidebar_outer_width_px       ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )                                   ,
                'rules'                 =>  array(
                    'required'  =>  array(
                                        'error'             ,   // variable to add the error message to
                                        'Field is required'     // error message if value doesn't validate
                                        )
                    )
                )   ,

            // -----------------------------------------------------------------
            // sidebar_outer_max_height_px
            // sidebar_max_ads
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'sidebar_outer_max_height_px'       ,
                'zebra_control_type'    =>  'text'                              ,
                'label'                 =>  'Outer Height Max. (px)'            ,
                'help_text'             =>  '(optional:&nbsp; Default = 1000 &nbsp;&nbsp;&mdash;&nbsp;&nbsp; 0 = NO limit)'     ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'sidebar_max_ads'                   ,
                'zebra_control_type'    =>  'text'                              ,
                'label'                 =>  'Max. #Ads'                         ,
                'help_text'             =>  '(optional - default = 999 (effectively, no limit) - 0 = no limit)'   ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------
            // sidebar_gap_height_px
            // sidebar_gap_colour
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'sidebar_gap_height_px'                     ,
                'zebra_control_type'    =>  'text'                                      ,
                'label'                 =>  'Gap Height (px)'                           ,
                'help_text'             =>  '(optional - default = 8)'                  ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'sidebar_gap_colour'                        ,
                'zebra_control_type'    =>  'text'                                      ,
                'label'                 =>  'Gap Colour (#123ABC)'                      ,
                'help_text'             =>  '(optional - default = transparent)'        ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------
            // sidebar_fit_start_height_div_width
            // sidebar_fit_end_discard_start_height_div_width
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'sidebar_fit_start_height_div_width'                        ,
                'zebra_control_type'    =>  'text'                                                      ,
                'label'                 =>  'Fit Start Height/Width'                                    ,
                'help_text'             =>  $help_text_sidebar_fit_start_height_div_width               ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'sidebar_fit_end_discard_start_height_div_width'            ,
                'zebra_control_type'    =>  'text'                                                      ,
                'label'                 =>  'Fit End / Discard Start Height/Width'                      ,
                'help_text'             =>  $help_text_sidebar_fit_end_discard_start_height_div_width   ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------
            // sidebar_extra_style
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'sidebar_extra_style'       ,
                'zebra_control_type'    =>  'text'                                  ,
                'label'                 =>  'Extra Style'                           ,
                'help_text'             =>  '(optional - CSS style string - eg; "margin-left:2em; overflow:none" - without the surrounding double quotes)'   ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )

            // -----------------------------------------------------------------

            ) ;

// =============================================================================
// That's that!
// =============================================================================

