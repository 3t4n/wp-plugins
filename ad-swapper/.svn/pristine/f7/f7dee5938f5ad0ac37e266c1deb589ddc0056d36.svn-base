<?php

// *****************************************************************************
// DATASET-MANAGER / FLITERING-SIMPLE-FILTERING.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// simple_filter_dataset_records()
// =============================================================================

function simple_filter_dataset_records(
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
    // simple_filter_dataset_records(
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
    // Simple filtering is where we have (eg):-
    //
    //      $selected_datasets_dmdd = array(
    //          ...
    //          'dataset_records_table'     =>  array(
    //              ...
    //              'filter_function'   =>  array(
    //                  'name_incl_namespace'   =>  '\\' . __NAMESPACE__ . '\\<my_simple_filter_function_name>'     ,
    //                  'extra_args'            =>  NULL
    //                  )
    //              ...
    //              )
    //          ...
    //          )
    //
    // The simple filter function then filters the supplied:-
    //      $dataset_records
    //
    // based on (eg):-
    //      o   $_GET
    //      o   $_POST
    //      o   $_COOKIE (*)
    //      o   $_SERVER
    //      o   or WordPress login related variables/functions like (eg):-
    //          --  current_user_can()
    //          --  is user logged in()
    //          --  wp_get_current_user()
    //          --  etc
    //      o   etc
    //
    // (*)  Complex filtering - see "filter_dataset_records()" - also uses
    //      $_COOKIE.
    //
    // RETURNS
    //      On SUCCESS
    //          $filtered_dataset_records ARRAY
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // On entry, we assume that the caller:-
    //      get_dataset_records_table_data()
    //
    // has verified that:-
    //
    //      array_key_exists( 'filter_function' , $selected_datasets_dmdd['dataset_records_table'] )
    //      &&
    //      is_array( $selected_datasets_dmdd['dataset_records_table']['filter_function'] )
    //      &&
    //      count( $selected_datasets_dmdd['dataset_records_table']['filter_function'] ) > 0
    //
    // So processing continues from there...
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $safe_dataset_title = htmlentities( $dataset_title ) ;

    // -------------------------------------------------------------------------

    $filter_function_details =
        $selected_datasets_dmdd['dataset_records_table']['filter_function']
        ;

    // =========================================================================
    // ERROR CHECKING...
    // =========================================================================

    if (    ! array_key_exists(
                'name_incl_namespace'       ,
                $filter_function_details
                )
        ) {

        $ln = __LINE__ - 5 ;

        return <<<EOT
PROBLEM simple filtering dataset records table:&nbsp; No "name_incl_namespace"
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    if ( ! is_string( $filter_function_details['name_incl_namespace'] ) ) {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM simple filtering dataset records table:&nbsp; Bad "name_incl_namespace" (string expected)
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    if ( trim( $filter_function_details['name_incl_namespace'] ) === '' ) {
        return $dataset_records ;
    }

    // -------------------------------------------------------------------------

    if ( ! function_exists( $filter_function_details['name_incl_namespace'] ) ) {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM simple filtering dataset records table:&nbsp; Bad "name_incl_namespace" (function not found)
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // =========================================================================
    // Call the custom filter function...
    // =========================================================================

    if (    array_key_exists(
                'extra_args'                ,
                $filter_function_details
                )
        ) {
        $extra_args = $filter_function_details['extra_args'] ;

    } else {
        $extra_args = NULL ;

    }

    // -------------------------------------------------------------------------
    // <some_custom_simple_filter_function>(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_records                        ,
    //      $dataset_slug                           ,
    //      $dataset_title                          ,
    //      $question_front_end                     ,
    //      &$loaded_datasets                       ,
    //      $extra_args
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Simple filtering is where we have (eg):-
    //
    //      $selected_datasets_dmdd = array(
    //          ...
    //          'dataset_records_table'     =>  array(
    //              ...
    //              'filter_function'   =>  array(
    //                  'name_incl_namespace'   =>  '\\' . __NAMESPACE__ . '\\<my_simple_filter_function_name>'     ,
    //                  'extra_args'            =>  NULL
    //                  )
    //              ...
    //              )
    //          ...
    //          )
    //
    // The simple filter function then filters the supplied:-
    //      $dataset_records
    //
    // based on (eg):-
    //      o   $_GET
    //      o   $_POST
    //      o   $_COOKIE (*)
    //      o   $_SERVER
    //      o   or WordPress login related variables/functions like (eg):-
    //          --  current_user_can()
    //          --  is user logged in()
    //          --  wp_get_current_user()
    //          --  etc
    //      o   etc
    //
    // (*)  Complex filtering - see "filter_dataset_records()" - also uses
    //      $_COOKIE.
    //
    // RETURNS
    //      On SUCCESS
    //          $filtered_dataset_records ARRAY
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    return $filter_function_details['name_incl_namespace'](
                $core_plugapp_dirs                      ,
                $all_application_dataset_definitions    ,
                $selected_datasets_dmdd                 ,
                $dataset_records                        ,
                $dataset_slug                           ,
                $dataset_title                          ,
                $question_front_end                     ,
                $loaded_datasets                        ,
                $extra_args
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

