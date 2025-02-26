<?php

// *****************************************************************************
// AD-SWAPPER.APP / / SIDEBAR / DATASET-FIELDS.PHP
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
        // sidebar_outer_width_px
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'sidebar_outer_width_px'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'sidebar_outer_width_px'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------
        // sidebar_outer_max_height_px
        // sidebar_max_ads
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'sidebar_outer_max_height_px'       ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                          ,
                                                                    'instance'  =>  'sidebar_outer_max_height_px'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  0 = NO limit

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'sidebar_max_ads'                   ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'sidebar_max_ads'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  0 = NO limit

        // ---------------------------------------------------------------------
        // sidebar_gap_height_px
        // sidebar_gap_colour
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'sidebar_gap_height_px'             ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'sidebar_gap_height_px'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'sidebar_gap_colour'                ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'sidebar_gap_colour'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------
        // sidebar_fit_start_height_div_width
        // sidebar_fit_end_discard_start_height_div_width
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'sidebar_fit_start_height_div_width'        ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                                  ,
                                                                    'instance'  =>  'sidebar_fit_start_height_div_width'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'sidebar_fit_end_discard_start_height_div_width'        ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                                              ,
                                                                    'instance'  =>  'sidebar_fit_end_discard_start_height_div_width'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------
        // sidebar_extra_style
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'sidebar_extra_style'               ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'sidebar_extra_style'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )

        // ---------------------------------------------------------------------

        ) ;

// =============================================================================
// That's that!
// =============================================================================

