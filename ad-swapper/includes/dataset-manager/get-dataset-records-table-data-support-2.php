<?php

// *****************************************************************************
// DATASET-MANAGER / GET-DATASET-RECORDS-TABLE-DATA-SUPPORT-2.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// get_dataset_records_table_data_do_filtering()
// =============================================================================

function get_dataset_records_table_data_do_filtering(
    $core_plugapp_dirs                      ,
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_records                        ,
    $dataset_slug                           ,
    $dataset_title                          ,
    $question_front_end                     ,
    &$loaded_datasets
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_dataset_records_table_data_do_filtering(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_records                        ,
    //      $dataset_slug                           ,
    //      $dataset_title                          ,
    //      $question_front_end                     ,
    //      &$loaded_datasets
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $filtered_dataset_records
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Get the filter details...
    // =========================================================================

    if ( count( $selected_datasets_dmdd['dataset_records_table']['filters'] ) !== 1 ) {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM filtering dataset records table:&nbsp; Exactly one filter expected
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }
        //  We CAN'T handle more than one filter yet.
        //
        //  Because the question of how exactly to handle more than one
        //  filter, isn't yet resolved).

    // -------------------------------------------------------------------------

    $filter_details = $selected_datasets_dmdd['dataset_records_table']['filters'][0] ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $filter_details = Array(
    //
    //          [0] => Array(
    //                      [toolbar_title]             => Record Structure
    //                      [cookie_name]               => validata-field-filter-record-structure
    //                      [custom_filter_function]    =>
    //                      [cff_args]                  =>
    //                      [foreign_dataset_slug]      => validata_record_structures
    //                      [foreign_match_field_slug]  => key
    //                      [foreign_title_field_slug]  => slug
    //                      [this_match_field_slug]     => record_structure_key
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $filter_details ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_COOKIE ) ;

    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // CUSTOM FILTER HANDLER
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    if (    is_string( $filter_details['custom_filter_function'] )
            &&
            trim( $filter_details['custom_filter_function'] ) !== ''
        ) {

        //  *** NOT YET IMPLEMENTED ***

        $ln = __LINE__ - 6 ;

        return <<<EOT
PROBLEM filtering dataset records table:&nbsp; Custom filter functions not yet supported !!!
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // STANDARD FILTER HANDLER
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    // =========================================================================
    // Does the cookie specify something ?
    //
    // If NOT, return ALL the dataset records (unfiltered)...
    // =========================================================================

    if (    ! array_key_exists(
                    $filter_details['cookie_name']      ,
                    $_COOKIE
                    )
        ) {
        return $dataset_records ;
    }

    // =========================================================================
    // YES!  Then filter the records...
    // =========================================================================

    $cookie_value = trim( $_COOKIE[ $filter_details['cookie_name'] ] ) ;

    // -------------------------------------------------------------------------

    if (    $cookie_value === ''
            ||
            $cookie_value === 'none'
        ) {
        return array() ;

    } elseif ( $cookie_value === 'all' ) {
        return $dataset_records ;

    } elseif ( ! is_record_key( $cookie_value ) ) {
        return array() ;

    }

    // =========================================================================
    // Load the foreign dataset...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // question_add_to_loaded_datasets(
    //      $all_application_dataset_definitions    ,
    //      $dataset_slug                           ,
    //      &$loaded_datasets
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // On successful exit, $loaded_datasets will be like:-
    //
    //      $loaded_datasets[ $dataset_slug ] = array(
    //          'title'                     =>  "xxx"                           ,
    //          'records'                   =>  array() --OR-- array(...)       ,
    //          'key_field_slug'            =>  "xxx"                           ,
    //          'record_indices_by_key'     =>  array() --OR-- array(...)
    //          )
    //
    // RETURNS
    //      o   On SUCCESS
    //              TRUE
    //
    //      o   On FAILURE
    //              $error_message STRING
    // -------------------------------------------------------------------------

    $result = question_add_to_loaded_datasets(
                    $all_application_dataset_definitions        ,
                    $filter_details['foreign_dataset_slug']     ,
                    $loaded_datasets
                    ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
    }

    // =========================================================================
    // Do the filtering...
    // =========================================================================

    $filtered_dataset_records = array() ;

    // -------------------------------------------------------------------------

    foreach ( $dataset_records as $this_record ) {

        // ---------------------------------------------------------------------

        if (    $this_record[
                    $filter_details['this_match_field_slug']
                    ] === $cookie_value
            ) {
            $filtered_dataset_records[] = $this_record ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $filtered_dataset_records ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

