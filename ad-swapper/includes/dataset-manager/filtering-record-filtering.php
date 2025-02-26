<?php

// *****************************************************************************
// DATASET-MANAGER / FLITERING-RECORD-FILTERING.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// question_filter_dataset_records()
// =============================================================================

function question_filter_dataset_records(
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
    // question_filter_dataset_records(
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
    //          o   $filtered_dataset_records ARRAY
    //                  If the dataset (records table) has some filters
    //                  defined.
    //          --OR--
    //          o   NULL
    //                  If the dataset (records table) has NO filters
    //                  defined.
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Any filters defined (for this dataset) ?
    // =========================================================================

    if (    ! array_key_exists( 'filters' , $selected_datasets_dmdd['dataset_records_table'] )
            ||
            ! is_array( $selected_datasets_dmdd['dataset_records_table']['filters'] )
        ) {
        return NULL ;
    }

    // =========================================================================
    // YES!
    //      =>  Do the filtering!
    // =========================================================================

    return filter_dataset_records(
                $core_plugapp_dirs                      ,
                $all_application_dataset_definitions    ,
                $selected_datasets_dmdd                 ,
                $dataset_records                        ,
                $dataset_slug                           ,
                $dataset_title                          ,
                $question_front_end                     ,
                $loaded_datasets
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// filter_dataset_records()
// =============================================================================

function filter_dataset_records(
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
    // filter_dataset_records(
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
    //          $filtered_dataset_records ARRAY
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $safe_dataset_title = htmlentities( $dataset_title ) ;

    // =========================================================================
    // Get the filter details...
    // =========================================================================

    if ( count( $selected_datasets_dmdd['dataset_records_table']['filters'] ) !== 1 ) {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM filtering dataset records table:&nbsp; Exactly one filter expected
For dataset:&nbsp; {$safe_dataset_title}
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
    //          [toolbar_title]                             =>  Record Structure
    //          [toolbar_ui_type]                           =>  dropdown
    //          [cookie_name]                               =>  validata-field-filter-record-structure
    //          [default_cookie_value]                      =>
    //          [custom_get_toolbar_html_function]          =>
    //          [custom_get_toolbar_html_function_args]     =>
    //          [custom_get_titles_by_value_function]       =>
    //          [custom_get_titles_by_value_function_args]  =>
    //          [custom_record_filtering_function]          =>
    //          [custom_record_filtering_function_args]     =>
    //          [foreign_dataset_field_args]                =>  Array(
    //              [foreign_dataset_slug]      =>  validata_record_structures
    //              [foreign_match_field_slug]  =>  key
    //              [foreign_title_field_slug]  =>  slug
    //              [this_match_field_slug]     =>  record_structure_key
    //              )
    //          )
    //
    //
    //  NOTES
    //  =====
    //  1.  "toolbar_ui_type" must be one of:-
    //          "dropdown", "buttons", "custom"
    //
    //  2.  If "toolbar_ui_type" is "custom", then
    //          "custom_get_toolbar_html_function" MUST be specified.
    //
    //  3.  "xxx_function":-
    //          o   Can be NULL or an empty string if NO such function is
    //              specified.  And:-
    //          o   Must include the (absolute) namespace name (of the function
    //              concerned)
    //
    //  4.  "xxx_function_args" can be any PHP type.  It will be passed to the
    //      "xxx_function" as is.
    //
    //  5.  "default_cookie_value" is the value to be used if the filter COOKIE
    //      HASN'T been set yet.  Should be a string.  Defaults to the empty
    //      string ("").
    //
    //  6.  If there's NO:-
    //          "custom_get_titles_by_value_function"
    //
    //      then we'll (try to) get the titles by value from the:-
    //          "foreign_dataset_field_args"
    //
    //  7.  If there's NO:-
    //          "custom_record_filtering_function"
    //
    //      then we'll (try to) filter the records using the:-
    //          "foreign_dataset_field_args"
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $filter_details     ,
//    '$filter_details'
//    ) ;

    // =========================================================================
    // If a PAGE VARIANT was specified (in $_GET['pv']), get and validate it...
    // =========================================================================

    if (    array_key_exists(
                'pv'        ,
                $_GET
                )
            &&
            in_array(
                $_GET['pv']                                                 ,
                array( 'sites-to-advertise' , 'sites-to-advertise-on' )     ,
                TRUE
                )
        ) {
        $selected_pv = $_GET['pv'] ;

    } else {
        $selected_pv = '' ;

    }

    // -------------------------------------------------------------------------

    if ( $selected_pv !== '' ) {

        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                    'page_variants'                                     ,
                    $selected_datasets_dmdd['dataset_records_table']
                    )
                ||
                ! is_array( $selected_datasets_dmdd['dataset_records_table']['page_variants'] )
                ||
                ! array_key_exists(
                    $selected_pv                                                        ,
                    $selected_datasets_dmdd['dataset_records_table']['page_variants']
                    )
            ) {
            $selected_pv = '' ;

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Get the filter cookie name and value...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/filtering-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_filter_cookie_name_and_value(
    //      $safe_dataset_title         ,
    //      $filter_details             ,
    //      $selected_pv                ,
    //      $question_cookie_required
    //      )
    // - - - - - - - - - - - - - - - - -
    // $selected_pv should be the validated value obtained from $_GET['pv'] (or
    // the empty string, if NO $_GET['pv'] exists).
    //
    // If NO cookie name was specified (in the filter definition), returns
    //      array(
    //          NULL    ,
    //          NULL
    //          )
    //
    // Returns the filter specified default cookie value, if the cookie name
    // cookie wasn't set.
    //
    // RETURNS
    //      On SUCCESS
    //          array(
    //              $cookie_name    ,
    //              $cookie_value
    //              )
    //          --OR--
    //          array(
    //              NULL    ,
    //              NULL
    //              )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    if ( $selected_pv === '' ) {
        $question_cookie_required = FALSE ;
    } else {
        $question_cookie_required = TRUE ;
    }

    // -------------------------------------------------------------------------

    $result =
        get_filter_cookie_name_and_value(
            $safe_dataset_title         ,
            $filter_details             ,
            $selected_pv                ,
            $question_cookie_required
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return array( $result ) ;
    }

    // -------------------------------------------------------------------------

    list(
        $cookie_name                        ,
        $currently_selected_filter_value
        ) = $result ;

    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // CUSTOM RECORD FILTERING FUNCTION ?
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    if (    array_key_exists( 'custom_record_filtering_function' , $filter_details )
            &&
            is_string( $filter_details['custom_record_filtering_function'] )
            &&
            trim( $filter_details['custom_record_filtering_function'] ) !== ''
        ) {

        // ---------------------------------------------------------------------

        if ( ! function_exists( $filter_details['custom_record_filtering_function'] ) ) {

            $ln = __LINE__ - 2 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "custom_record_filtering_function" (function not found)
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        if ( array_key_exists( 'custom_record_filtering_function_args' , $filter_details ) ) {

            $custom_record_filtering_function_args =
                $filter_details['custom_record_filtering_function_args']
                ;

        } else {

            $custom_record_filtering_function_args = NULL ;

        }

        // -------------------------------------------------------------------------
        // <custom_record_filtering_function>(
        //      $core_plugapp_dirs                      ,
        //      $all_application_dataset_definitions    ,
        //      $selected_datasets_dmdd                 ,
        //      $dataset_records                        ,
        //      $dataset_slug                           ,
        //      $dataset_title                          ,
        //      $question_front_end                     ,
        //      &$loaded_datasets                       ,
        //      $currently_selected_filter_value
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // $currently_selected_filter_value is the filter (COOKIE) value to be
        // used.
        //
        // RETURNS
        //      On SUCCESS
        //          $filtered_dataset_records ARRAY
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        return
            $filter_details['custom_record_filtering_function'](
                $core_plugapp_dirs                      ,
                $all_application_dataset_definitions    ,
                $selected_datasets_dmdd                 ,
                $dataset_records                        ,
                $dataset_slug                           ,
                $dataset_title                          ,
                $question_front_end                     ,
                $loaded_datasets                        ,
                $currently_selected_filter_value
                ) ;

        // ---------------------------------------------------------------------

    }

    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // STANDARD RECORD FILTERING FUNCTION !
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    // =========================================================================
    // Handle "all" and "none"...
    // =========================================================================

    if ( $currently_selected_filter_value === 'all' ) {
        return $dataset_records ;
    }

    // -------------------------------------------------------------------------

    if ( $currently_selected_filter_value === 'none' ) {
        return array() ;
    }

    // =========================================================================
    // Does the cookie specify something ?
    //
    // If NOT, return ALL the dataset records (unfiltered)...
    // =========================================================================

//  if (    ! array_key_exists(
//                  $filter_details['cookie_name']      ,
//                  $_COOKIE
//                  )
//      ) {
//      return $dataset_records ;
//  }

    // =========================================================================
    // YES!  Then filter the records...
    // =========================================================================

//  $cookie_value = trim( $_COOKIE[ $filter_details['cookie_name'] ] ) ;
//
//  // -------------------------------------------------------------------------
//
//  if (    $cookie_value === ''
//          ||
//          $cookie_value === 'none'
//      ) {
//      return array() ;
//
//  } elseif ( $cookie_value === 'all' ) {
//      return $dataset_records ;
//
//  } elseif ( ! is_record_key( $cookie_value ) ) {
//      return array() ;
//
//  }

    // =========================================================================
    // ERROR CHECKING
    // =========================================================================

    $required_fields = array(
        'foreign_dataset_slug'      ,
        'this_match_field_slug'
        ) ;

    // -------------------------------------------------------------------------

    foreach ( $required_fields  as $index => $field_name ) {

        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                    $field_name                                     ,
                    $filter_details['foreign_dataset_field_args']
                    )
            ) {

            $ln = __LINE__ - 5 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "foreign_dataset_field_args" (no "{$field_name}")
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // foreign_dataset_slug ?
    // -------------------------------------------------------------------------

    if (    ! is_string( $filter_details['foreign_dataset_field_args']['foreign_dataset_slug'] )
            ||
            trim( $filter_details['foreign_dataset_field_args']['foreign_dataset_slug'] ) === ''
        ) {

        $ln = __LINE__ - 4 ;

        return <<<EOT
PROBLEM:&nbsp; Bad "foreign_dataset_field_args" + "foreign_dataset_slug" (non-empty string expected)
Or perhaps a "custom_record_filtering_function" is required - but hasn't been specified yet.
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    if (    ! array_key_exists(
                    $filter_details['foreign_dataset_field_args']['foreign_dataset_slug']   ,
                    $all_application_dataset_definitions
                    )
        ) {

        $ln = __LINE__ - 5 ;

        $safe_dataset_slug = htmlentities(
                                $filter_details['foreign_dataset_field_args']['foreign_dataset_slug']
                                ) ;

        return <<<EOT
PROBLEM:&nbsp; Bad "foreign_dataset_field_args" + "foreign_dataset_slug" ("{$safe_dataset_slug}" - no such dataset)
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------
    // this_match_field_slug ?
    // -------------------------------------------------------------------------

    if (    ! is_string( $filter_details['foreign_dataset_field_args']['this_match_field_slug'] )
            ||
            trim( $filter_details['foreign_dataset_field_args']['this_match_field_slug'] ) === ''
        ) {

        $ln = __LINE__ - 4 ;

        return <<<EOT
PROBLEM:&nbsp; Bad "foreign_dataset_field_args" + "this_match_field_slug" (non-empty string expected)
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

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
                    $all_application_dataset_definitions                                    ,
                    $filter_details['foreign_dataset_field_args']['foreign_dataset_slug']   ,
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

        if (    array_key_exists(
                    $filter_details['foreign_dataset_field_args']['this_match_field_slug']  ,
                    $this_record
                    )
                &&
                $this_record[
                    $filter_details['foreign_dataset_field_args']['this_match_field_slug']
                    ] === $currently_selected_filter_value
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

