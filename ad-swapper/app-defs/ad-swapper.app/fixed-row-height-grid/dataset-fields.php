<?php

// *****************************************************************************
// AD-SWAPPER.APP / FIXED-ROW-HEIGHT-GRID / DATASET-FIELDS.PHP
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
// The Extra Dataset Fields - For This Ad Slot Type...
// =============================================================================

    $temp = array(

        // ---------------------------------------------------------------------
        // fixed_row_height_grid_outer_width_px
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_row_height_grid_outer_width_px'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'fixed_row_height_grid_outer_width_px'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------
        // fixed_row_height_grid_number_rows
        // fixed_row_height_grid_number_cols
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_row_height_grid_number_rows'       ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'              ,
                                                                    'instance'  =>  'fixed_row_height_grid_number_rows'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  0 = NO limit

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_row_height_grid_number_cols'       ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'              ,
                                                                    'instance'  =>  'fixed_row_height_grid_number_cols'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  0 = NO limit

        // ---------------------------------------------------------------------
        // fixed_row_height_grid_hgap_px
        // fixed_row_height_grid_hgap_colour
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_row_height_grid_hgap_px'             ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'fixed_row_height_grid_hgap_px'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_row_height_grid_hgap_colour'                ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'fixed_row_height_grid_hgap_colour'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------
        // fixed_row_height_grid_vgap_px
        // fixed_row_height_grid_vgap_colour
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_row_height_grid_vgap_px'             ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'fixed_row_height_grid_vgap_px'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_row_height_grid_vgap_colour'                ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'fixed_row_height_grid_vgap_colour'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------
        // fixed_row_height_grid_max_row_height_div_width
        // fixed_row_height_grid_discard_ad_image_height_div_width
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_row_height_grid_max_row_height_div_width'       ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'              ,
                                                                    'instance'  =>  'fixed_row_height_grid_max_row_height_div_width'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  0 = NO limit

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_row_height_grid_discard_ad_image_height_div_width'       ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'              ,
                                                                    'instance'  =>  'fixed_row_height_grid_discard_ad_image_height_div_width'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  0 = NO limit

        // ---------------------------------------------------------------------
        // fixed_row_height_grid_row_fill_method
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_row_height_grid_row_fill_method'        ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'              ,
                                                                    'instance'  =>  'fixed_row_height_grid_row_fill_method'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  "none" , "average" , "mid" , "shortest" , "tallest"

        // ---------------------------------------------------------------------
        // fixed_row_height_grid_valign
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_row_height_grid_valign'                    ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'fixed_row_height_grid_valign'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------
        // fixed_row_height_grid_question_sort_on_height
        // fixed_row_height_grid_question_delete_duplicates
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_row_height_grid_question_sort_on_height'   ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'fixed_row_height_grid_question_sort_on_height'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_row_height_grid_question_delete_duplicates'      ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'fixed_row_height_grid_question_delete_duplicates'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------
        // fixed_row_height_grid_extra_style
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_row_height_grid_extra_style'               ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'fixed_row_height_grid_extra_style'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )

        // ---------------------------------------------------------------------

        ) ;

// =============================================================================
// That's that!
// =============================================================================

