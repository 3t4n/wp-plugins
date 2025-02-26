<?php

// *****************************************************************************
// AD-SWAPPER.APP / FIXED-HEIGHT-BANNER / FORM-FIELDS.PHP
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

    $help_text_fixed_height_banner_outer_width_px = <<<EOT
<b style="color:#CC0000">REQUIRED!</b>&nbsp; If "type" (see above), ISN'T "Fixed-Height-Banner", then enter a dummy value (eg; 999)
EOT;

    // -------------------------------------------------------------------------

    $help_text_fixed_height_banner_outer_height_px = <<<EOT
<b style="color:#CC0000">REQUIRED!</b>&nbsp; If "type" (see above), ISN'T "Fixed-Height-Banner", then enter a dummy value (eg; 999)
EOT;

    // -------------------------------------------------------------------------

    $temp = array(

            // -----------------------------------------------------------------
            // fixed_height_banner_outer_width_px
            // fixed_height_banner_outer_height_px
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_height_banner_outer_width_px'            ,
                'zebra_control_type'    =>  'text'                                          ,
                'label'                 =>  'Outer Width (px)'                              ,
                'help_text'             =>  $help_text_fixed_height_banner_outer_width_px   ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )                                           ,
                'rules'                 =>  array(
                    'required'  =>  array(
                                        'error'             ,   // variable to add the error message to
                                        'Field is required'     // error message if value doesn't validate
                                        )
                    )
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_height_banner_outer_height_px'           ,
                'zebra_control_type'    =>  'text'                                          ,
                'label'                 =>  'Outer Height (px)'                             ,
                'help_text'             =>  $help_text_fixed_height_banner_outer_height_px  ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )                                           ,
                'rules'                 =>  array(
                    'required'  =>  array(
                                        'error'             ,   // variable to add the error message to
                                        'Field is required'     // error message if value doesn't validate
                                        )
                    )
                )   ,

            // -----------------------------------------------------------------
            // fixed_height_banner_fit_or_shrink
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_height_banner_fit_or_shrink'         ,
                'zebra_control_type'    =>  'select'                                    ,
                'label'                 =>  'Fit or Shrink ?'                           ,
                'help_text'             =>  '(optional - default = Shrink)'             ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )                                       ,
                'rules'                 =>  array()                                     ,
                'type_specific_args'    =>  array(
                    'options_getter_function'   =>  array(
                        'function_name' =>  '\\' . __NAMESPACE__ . '\\get_fit_or_shrink_selector_options'    ,
                        'extra_args'    =>  NULL
                        )
                    )
                )   ,

            // -----------------------------------------------------------------
            // fixed_height_banner_halign
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_height_banner_halign'                ,
                'zebra_control_type'    =>  'select'                                    ,
                'label'                 =>  'Horizontal Alignment ("Shrunk" ads only)'  ,
                'help_text'             =>  '(optional - default = Center)'             ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )                                       ,
                'rules'                 =>  array()                                     ,
                'type_specific_args'    =>  array(
                    'options_getter_function'   =>  array(
                        'function_name' =>  '\\' . __NAMESPACE__ . '\\get_halign_selector_options'      ,
                        'extra_args'    =>  NULL
                        )
                    )
                )   ,

            // -----------------------------------------------------------------
            // fixed_height_banner_valign
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_height_banner_valign'                ,
                'zebra_control_type'    =>  'select'                                    ,
                'label'                 =>  'Vertical Alignment ("Shrunk" ads only)'    ,
                'help_text'             =>  '(optional - default = Middle'              ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )                                       ,
                'rules'                 =>  array()                                     ,
                'type_specific_args'    =>  array(
                    'options_getter_function'   =>  array(
                        'function_name' =>  '\\' . __NAMESPACE__ . '\\get_valign_selector_options'      ,
                        'extra_args'    =>  NULL
                        )
                    )
                )   ,

            // -----------------------------------------------------------------
            // fixed_height_banner_undercolour
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_height_banner_undercolour'               ,
                'zebra_control_type'    =>  'text'                                          ,
                'label'                 =>  'Undercolour (#123ABC) ("Shrunk" ads only)'     ,
                'help_text'             =>  '(optional - default = transparent)'            ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------
            // fixed_height_banner_min_ad_aspect_ratio
            // fixed_height_banner_min_resized_ad_width_percent
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_height_banner_min_ad_aspect_ratio'       ,
                'zebra_control_type'    =>  'text'                                          ,
                'label'                 =>  'Min. Ad Aspect Ratio'                          ,
                'help_text'             =>  '"Banner" ads with an aspect ration (width / height) LESS than this, WON\'T be displayed.&nbsp; (optional - default = 4)'   ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_height_banner_min_resized_ad_width_percent'      ,
                'zebra_control_type'    =>  'text'                                                  ,
                'label'                 =>  'Min. Resized Ad Width (%)'                             ,
                'help_text'             =>  '"Banner" ads that occupy - WIDTHWISE - less of their container than this, WON\'T be displayed (optional - default = 50)'    ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------
            // fixed_height_banner_extra_style
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_height_banner_extra_style'       ,
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

