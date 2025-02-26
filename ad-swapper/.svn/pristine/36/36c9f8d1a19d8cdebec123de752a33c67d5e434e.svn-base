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

    $help_text_fixed_row_height_grid_outer_width_px = <<<EOT
<b style="color:#CC0000">REQUIRED!</b>&nbsp; If "type" (see above), ISN'T
"Fixed-Row-Height-Grid", then enter a dummy value (eg; 999)
EOT;

    // -------------------------------------------------------------------------

    $help_text_fixed_row_height_grid_row_fill_method = <<<EOT
Specifies how the row height is set (from the heights of the images on the
row):-<ul style="margin:0">
    <li><span style="display:inline-block; width:6em; font-weight:bold">None</span>     <i>See "Max. Row Height Div Width", below.</i></li>
    <li><span style="display:inline-block; width:6em; font-weight:bold">Average</span>  <i>Images shorter/taller than the average are expanded/compressed heightwise.</i></li>
    <li><span style="display:inline-block; width:6em; font-weight:bold">Mid</span>      <i>The mid-sized image is displayed as is; shorter/taller images are expanded/compressed heightwise.</i></li>
    <li><span style="display:inline-block; width:6em; font-weight:bold">Shortest</span> <i>The shortest image is displayed as is; taller images are compressed heightwise.</i></li>
    <li><span style="display:inline-block; width:6em; font-weight:bold">Tallest</span>  <i>The tallest image is displayed as is; shorter images are expanded heightwise.</i></li>
</ul>
(optional - default = None)
EOT;

    // -------------------------------------------------------------------------

    $help_text_fixed_row_height_grid_max_row_height_div_width = <<<EOT
The number entered here is multiplied by the cell width - to get the maximum
height of each cell.&nbsp; For example, 0.5 will give you a cell that's half as
wide as it's high.&nbsp; The default value (1), will give you a square
cell.&nbsp; And 2 will give you a cell that's twice as high as it is wide.&nbsp;
Images - that once resized to the cell width - are:-<ul style="margin:0">
    <li><b>Shorter</b> than this maximum cell height, are aligned vertically
        within the cell (as specified by "Vertical Alignment</b>, below).</li>
    <li><b>Taller</b> than this maximum cell height (but shorter than the
        Ad/Image Discard Height, see below), are compressed vertically, to fit
        within the cell.</li>
</ul>
Fractional values (eg; 0.6667) are OK.<br />
(optional, 0+, default = 1)
EOT;

    // -------------------------------------------------------------------------

    $help_text_fixed_row_height_grid_discard_ad_image_height_div_width = <<<EOT
The number entered here is multiplied by the cell width - to get the height
after which ad images are discarded.&nbsp; For example, with a cell width of
300px, and a field value of 1.5, then any ad image, once resized to 300px
(wide), that's taller than 450px, will be discarded.&nbsp; Fractional values
(eg; 0.6667) are OK.<br />
(optional, 0+, default = 1.5)
EOT;

    // -------------------------------------------------------------------------

    $help_text_fixed_row_height_grid_valign = <<<EOT
Only used if "Row Fill Method" (see above) = <b>None</b>.<br />
And even then, only applies to ad images - that once resized to the cell width -
AREN'T as tall as the cell.&nbsp; In which case, determines how the image is
vertically aligned within the cell.<br />
(optional, default = "middle")
EOT;

    // -------------------------------------------------------------------------

    $help_text_fixed_row_height_grid_question_sort_on_height = <<<EOT
Causes the ads to be sorted in height order - from shortest to tallest (before
they're displayed in the grid).&nbsp; This reduces the amount of vertical waste
space ("Row Fill Method" = None) - or vertical expansion/compression (any other
"Row Fill Method").&nbsp; So the grid uses less space vertically - and usually
looks better too (though this is perhaps subjective).&nbsp; It also "promotes"
shorter ads to the top of the grid - where they're probably more likely to be
seen/noticed by users.&nbsp; It does however, destroy the random order in which
ads are otherwise displayed.&nbsp; Where the purpose of the random ordering is
to ensure that all Ad Swapper sites get the same priority (for their ads).&nbsp;
Ie; everyone takes equal turns at being first and last, etc.<br />
(optional, default = Yes)
EOT;

    // -------------------------------------------------------------------------

    $help_text_fixed_row_height_grid_question_delete_duplicates = <<<EOT
Only used if "Sort (the Ad Images) On Height ?" (see above), is
ticked/Yes/True.<br />
If you've set <b>Max. Ads Per Site Per Page</b> greater than 1 (in your Site
Profile), then duplicate ads/images are possible.&nbsp; And if the grid's ad
images are also sorted on height, then those duplicate ads/images will usually
appear next to each other.&nbsp; And thus be much more noticeable than when the
ads/images are sorted randomly.&nbsp; If you feel that this is a bit
distracting/annoying/confusing (or whatever), then select Yes to get rid of the
duplicates.<br />
(optional - default = Yes)
EOT;

    // -------------------------------------------------------------------------

    $temp = array(

            // -----------------------------------------------------------------
            // fixed_row_height_grid_outer_width_px
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_row_height_grid_outer_width_px'              ,
                'zebra_control_type'    =>  'text'                                              ,
                'label'                 =>  'Outer Width (px)'                                  ,
                'help_text'             =>  $help_text_fixed_row_height_grid_outer_width_px     ,
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
            // fixed_row_height_grid_number_rows
            // fixed_row_height_grid_number_cols
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_row_height_grid_number_cols'     ,
                'zebra_control_type'    =>  'text'                                  ,
                'label'                 =>  'Number Cols'                           ,
                'help_text'             =>  '(optional, 1+, default = 3)'           ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_row_height_grid_number_rows'     ,
                'zebra_control_type'    =>  'text'                                  ,
                'label'                 =>  'Number Rows'                           ,
                'help_text'             =>  '(optional, 1+, default = 3)'           ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------
            // fixed_row_height_grid_hgap_px
            // fixed_row_height_grid_hgap_colour
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_row_height_grid_hgap_px'             ,
                'zebra_control_type'    =>  'text'                                      ,
                'label'                 =>  'Horizontal Gap Width (px)'                 ,
                'help_text'             =>  '(optional, 0+, default = 8)'               ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_row_height_grid_hgap_colour'         ,
                'zebra_control_type'    =>  'text'                                      ,
                'label'                 =>  'Horizontal Gap Colour (#123ABC)'           ,
                'help_text'             =>  '(optional, default = transparent)'         ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------
            // fixed_row_height_grid_vgap_px
            // fixed_row_height_grid_vgap_colour
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_row_height_grid_vgap_px'             ,
                'zebra_control_type'    =>  'text'                                      ,
                'label'                 =>  'Vertical Gap Width (px)'                   ,
                'help_text'             =>  '(optional, 0+, default = 8)'               ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_row_height_grid_vgap_colour'         ,
                'zebra_control_type'    =>  'text'                                      ,
                'label'                 =>  'Vertical Gap Colour (#123ABC)'             ,
                'help_text'             =>  '(optional, default = transparent)'         ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------
            // fixed_row_height_grid_max_row_height_div_width
            // fixed_row_height_grid_discard_ad_image_height_div_width
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_row_height_grid_max_row_height_div_width'            ,
                'zebra_control_type'    =>  'text'                                                      ,
                'label'                 =>  'Max. Row Height Div Width'                                 ,
                'help_text'             =>  $help_text_fixed_row_height_grid_max_row_height_div_width   ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_row_height_grid_discard_ad_image_height_div_width'               ,
                'zebra_control_type'    =>  'text'                                                                  ,
                'label'                 =>  'Discard Ad/Image Height Div Width'                                     ,
                'help_text'             =>  $help_text_fixed_row_height_grid_discard_ad_image_height_div_width      ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // ---------------------------------------------------------------------
            // fixed_row_height_grid_row_fill_method
            // ---------------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_row_height_grid_row_fill_method'             ,
                'zebra_control_type'    =>  'select'                                            ,
                'label'                 =>  'Row Fill Method'                                   ,
                'help_text'             =>  $help_text_fixed_row_height_grid_row_fill_method    ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )                                               ,
                'rules'                 =>  array()                                             ,
                'type_specific_args'    =>  array(
                    'options_getter_function'   =>  array(
                        'function_name' =>  '\\' . __NAMESPACE__ . '\\get_row_fill_method_selector_options'    ,
                        'extra_args'    =>  NULL
                        )
                    )
                )   ,
                //  "none" , "average" , "mid" , "shortest" , "tallest"

            // -----------------------------------------------------------------
            // fixed_row_height_grid_valign
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_row_height_grid_valign'              ,
                'zebra_control_type'    =>  'select'                                    ,
                'label'                 =>  'Vertical Alignment'                        ,
                'help_text'             =>  $help_text_fixed_row_height_grid_valign     ,
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
            // fixed_row_height_question_sort_on_height
            // fixed_row_height_question_delete_duplicates
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_row_height_grid_question_sort_on_height'             ,
                'zebra_control_type'    =>  'select'                                                    ,
                'label'                 =>  'Sort (the Ad Images) On Height ?'                          ,
                'help_text'             =>  $help_text_fixed_row_height_grid_question_sort_on_height    ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )                                               ,
                'rules'                 =>  array()                                             ,
                'type_specific_args'    =>  array(
                    'options_getter_function'   =>  array(
                        'function_name' =>  '\\' . __NAMESPACE__ . '\\get_yes_no_selector_options'    ,
                        'extra_args'    =>  NULL
                        )
                    )
                )   ,
                //  "yes" , 'no"

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_row_height_grid_question_delete_duplicates'              ,
                'zebra_control_type'    =>  'select'                                                        ,
                'label'                 =>  'Delete Duplicate Ads/Images (When Sorting on Height) ?'        ,
                'help_text'             =>  $help_text_fixed_row_height_grid_question_delete_duplicates     ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )                                               ,
                'rules'                 =>  array()                                             ,
                'type_specific_args'    =>  array(
                    'options_getter_function'   =>  array(
                        'function_name' =>  '\\' . __NAMESPACE__ . '\\get_yes_no_selector_options'    ,
                        'extra_args'    =>  NULL
                        )
                    )
                )   ,
                //  "yes" , 'no"

            // -----------------------------------------------------------------
            // fixed_row_height_grid_extra_style
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'fixed_row_height_grid_extra_style'       ,
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

