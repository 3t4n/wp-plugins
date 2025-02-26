<?php

// *****************************************************************************
// AD-SWAPPER.APP / AD-SLOT-GET-NEW-FIELD-VALUE-FUNCTIONS.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAdSlots ;

// =============================================================================
// get_new_field_value_functions_array()
// =============================================================================

function get_new_field_value_functions_array() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAdSlots\
    // get_new_field_value_functions_array()
    // - - - - - - - - - - - - - - - - - - -
    // Returns the array value for the "Ad Swapper Ad Slots" dataset's
    //      "get_new_field_value_functions"
    //
    // field.
    // -------------------------------------------------------------------------

    $entries = array(
        //  As of:  23 December 2015
        'global_sid'                                              =>    'new_field_value_is_empty_string'   ,
        'type'                                                    =>    'new_field_value_is_empty_string'   ,
        'border_top_px'                                           =>    'new_field_value_is_empty_string'   ,
        'border_bottom_px'                                        =>    'new_field_value_is_empty_string'   ,
        'border_left_px'                                          =>    'new_field_value_is_empty_string'   ,
        'border_right_px'                                         =>    'new_field_value_is_empty_string'   ,
        'border_colour_top'                                       =>    'new_field_value_is_empty_string'   ,
        'border_colour_bottom'                                    =>    'new_field_value_is_empty_string'   ,
        'border_colour_left'                                      =>    'new_field_value_is_empty_string'   ,
        'border_colour_right'                                     =>    'new_field_value_is_empty_string'   ,
        'fixed_height_banner_outer_width_px'                      =>    'new_field_value_is_empty_string'   ,
        'fixed_height_banner_outer_height_px'                     =>    'new_field_value_is_empty_string'   ,
        'fixed_height_banner_min_ad_aspect_ratio'                 =>    'new_field_value_is_empty_string'   ,
        'fixed_height_banner_min_resized_ad_width_percent'        =>    'new_field_value_is_empty_string'   ,
        'fixed_height_banner_fit_or_shrink'                       =>    'new_field_value_is_empty_string'   ,
        'fixed_height_banner_halign'                              =>    'new_field_value_is_empty_string'   ,
        'fixed_height_banner_valign'                              =>    'new_field_value_is_empty_string'   ,
        'fixed_height_banner_undercolour'                         =>    'new_field_value_is_empty_string'   ,
        'fixed_height_banner_extra_style'                         =>    'new_field_value_is_empty_string'   ,
        'sidebar_outer_width_px'                                  =>    'new_field_value_is_empty_string'   ,
        'sidebar_outer_max_height_px'                             =>    'new_field_value_is_empty_string'   ,
        'sidebar_max_ads'                                         =>    'new_field_value_is_empty_string'   ,
        'sidebar_gap_height_px'                                   =>    'new_field_value_is_empty_string'   ,
        'sidebar_gap_colour'                                      =>    'new_field_value_is_empty_string'   ,
        'sidebar_fit_start_height_div_width'                      =>    'new_field_value_is_empty_string'   ,
        'sidebar_fit_end_discard_start_height_div_width'          =>    'new_field_value_is_empty_string'   ,
        'sidebar_extra_style'                                     =>    'new_field_value_is_empty_string'   ,
        'fixed_row_height_grid_outer_width_px'                    =>    'new_field_value_is_empty_string'   ,
        'fixed_row_height_grid_number_rows'                       =>    'new_field_value_is_empty_string'   ,
        'fixed_row_height_grid_number_cols'                       =>    'new_field_value_is_empty_string'   ,
        'fixed_row_height_grid_hgap_px'                           =>    'new_field_value_is_empty_string'   ,
        'fixed_row_height_grid_hgap_colour'                       =>    'new_field_value_is_empty_string'   ,
        'fixed_row_height_grid_vgap_px'                           =>    'new_field_value_is_empty_string'   ,
        'fixed_row_height_grid_vgap_colour'                       =>    'new_field_value_is_empty_string'   ,
        'fixed_row_height_grid_max_row_height_div_width'          =>    'new_field_value_is_empty_string'   ,
        'fixed_row_height_grid_discard_ad_image_height_div_width' =>    'new_field_value_is_empty_string'   ,
        'fixed_row_height_grid_row_fill_method'                   =>    'new_field_value_is_empty_string'   ,
        'fixed_row_height_grid_valign'                            =>    'new_field_value_is_empty_string'   ,
        'fixed_row_height_grid_question_sort_on_height'           =>    'new_field_value_is_empty_string'   ,
        'fixed_row_height_grid_question_delete_duplicates'        =>    'new_field_value_is_empty_string'   ,
        'fixed_row_height_grid_extra_style'                       =>    'new_field_value_is_empty_string'
        ) ;

    // -------------------------------------------------------------------------
    // Make the required array.  Eg:-
    //
    //      $selected_datasets_dmdd = array(
    //
    //          ...
    //
    //          'get_new_field_value_functions'     =>  array(
    //
    //              'question_trial_mode_site'  =>  array(
    //                  'name'  =>  '\\' . __NAMESPACE__ . '\\get_new_field_value_4_question_trial_mode_site'       ,
    //                  'args'  =>  array()
    //                  )   ,
    //
    //              ...
    //
    //              )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

    $get_new_field_value_functions = array() ;

    // -------------------------------------------------------------------------

    foreach ( $entries as $this_field_slug => $this_get_new_field_value_function_name ) {

        // ---------------------------------------------------------------------

        $get_new_field_value_functions[ $this_field_slug ] = array(
            'name'  =>  '\\' . __NAMESPACE__ . '\\' . $this_get_new_field_value_function_name   ,
            'args'  =>  NULL
            ) ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    return $get_new_field_value_functions ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// new_field_value_is_empty_string()
// =============================================================================

function new_field_value_is_empty_string(
    $core_plugapp_dirs                          ,
    $loaded_datasets                            ,
    $dataset_slug                               ,
    $selected_datasets_dmdd                     ,
    $record_indices_by_field_slug_to_add        ,
    $record_indices_by_field_slug_to_remove     ,
    $this_record                                ,
    $field_slug_to_add                          ,
    $get_new_field_value_function_args
    ) {

    // -------------------------------------------------------------------------
    // <array_stored_get_new_field_value_function>(
    //      $core_plugapp_dirs                          ,
    //      $loaded_datasets                            ,
    //      $dataset_slug                               ,
    //      $selected_datasets_dmdd                     ,
    //      $record_indices_by_field_slug_to_add        ,
    //      $record_indices_by_field_slug_to_remove     ,
    //      $this_record                                ,
    //      $field_slug_to_add                          ,
    //      $get_new_field_value_function_args
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the value for the specified field to be added to the
    // specified record.
    //
    // RETURNS
    //      On SUCCESS
    //          array(
    //              $ok = TRUE
    //              $new_field_value (any PHP type)
    //              )
    //
    //      On FAILURE
    //          array(
    //              $ok = FALSE
    //              $error_message STRING
    //              )
    // -------------------------------------------------------------------------

    $new_field_value = '' ;

    // -------------------------------------------------------------------------

    return array(
        TRUE                ,
        $new_field_value
        ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

