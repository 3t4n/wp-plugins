<?php

// *****************************************************************************
// AD-SWAPPER.APP / FIXED-HEIGHT-BANNER / DATASET-FIELDS.PHP
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
        // fixed_height_banner_outer_width_px
        // fixed_height_banner_outer_height_px
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_height_banner_outer_width_px'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'fixed_height_banner_outer_width_px'
                                                                    )
                                                )   ,
            'constraints'               =>  array(
//                                              array(
//                                                  'method'    =>  'unsigned-integer'      ,
//                                                  'args'      =>  array(
//                                                      'min'   =>  0           ,
//                                                      'max'   =>  9999
//                                                      )
//                                                  )
                                                )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_height_banner_outer_height_px'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'fixed_height_banner_outer_height_px'
                                                                    )
                                                )   ,
            'constraints'               =>  array(
//                                              array(
//                                                  'method'    =>  'unsigned-integer'      ,
//                                                  'args'      =>  array(
//                                                      'min'   =>  0           ,
//                                                      'max'   =>  9999
//                                                      )
//                                                  )
                                                )
            )   ,

        // ---------------------------------------------------------------------
        // fixed_height_banner_min_ad_aspect_ratio
        // fixed_height_banner_min_resized_ad_width_percent
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_height_banner_min_ad_aspect_ratio'       ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'fixed_height_banner_min_ad_aspect_ratio'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_height_banner_min_resized_ad_width_percent'       ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'fixed_height_banner_min_resized_ad_width_percent'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------
        // fixed_height_banner_fit_or_shrink
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_height_banner_fit_or_shrink'             ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'fixed_height_banner_fit_or_shrink'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------
        // fixed_height_banner_halign
        // fixed_height_banner_valign
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_height_banner_halign'             ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'fixed_height_banner_halign'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_height_banner_valign'             ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'fixed_height_banner_valign'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------
        // fixed_height_banner_undercolour
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_height_banner_undercolour'             ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'fixed_height_banner_undercolour'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------
        // fixed_height_banner_extra_style
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'fixed_height_banner_extra_style'               ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'fixed_height_banner_extra_style'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )

        // ---------------------------------------------------------------------

        ) ;

// =============================================================================
// That's that!
// =============================================================================

