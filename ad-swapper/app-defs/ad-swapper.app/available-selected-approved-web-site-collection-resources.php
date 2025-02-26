<?php

// *****************************************************************************
// AD-SWAPPER.APP / AVAILABLE-SELECTED-APPROVED-WEB-SITE-COLLECTION-RESOURCES.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableSelectedAndApprovedWebSiteCollections ;

// =============================================================================
// get_description_column_value()
// =============================================================================

function get_description_column_value(
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_records                        ,
    $dataset_slug                           ,
    $dataset_title                          ,
    $question_front_end                     ,
    $caller_apps_includes_dir               ,
    $this_column_def_index                  ,
    $this_column_def                        ,
    $this_dataset_record_index              ,
    $this_dataset_record_data               ,
    &$custom_get_table_data_function_data   ,
    &$loaded_datasets
    ) {

    // -------------------------------------------------------------------------
    // <my_custom_get_dataset_record_column_value_function>(
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_records                        ,
    //      $dataset_slug                           ,
    //      $dataset_title                          ,
    //      $question_front_end                     ,
    //      $caller_apps_includes_dir               ,
    //      $this_column_def_index                  ,
    //      $this_column_def                        ,
    //      $this_dataset_record_index              ,
    //      $this_dataset_record_data               ,
    //      &$custom_get_table_data_function_data   ,
    //      &$loaded_datasets
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the specified column value...
    //
    // $loaded_datasets is like:-
    //
    //      $loaded_datasets = array(
    //
    //          <dataset_slug>  =>  array(
    //                                  'title'                 =>  "xxx"           ,
    //                                  'records'               =>  array(...)      ,
    //                                  'key_field_slug'        =>  "xxx" or NULL
    //                                  'record_indices_by_key' =>  array(...)
    //                                  )   ,
    //
    //          ...
    //
    //          )
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          $field_value STRING
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          array( $error_message STRING )
    // -------------------------------------------------------------------------

//$temp = array_keys( $loaded_datasets ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $temp ) ;

//  // =========================================================================
//  // Get the "Web Site Collections" record...
//  // =========================================================================
//
//  require_once( dirname( __FILE__ ) . '/shared-resources.php' ) ;
//
//  // -------------------------------------------------------------------------
//  // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\
//  // get_web_site_collections_record_by_collection_global_unique_key(
//  //      $all_application_dataset_definitions    ,
//  //      $collection_global_unique_key           ,
//  //      &$loaded_datasets   = NULL              ,
//  //      &$core_plugapp_dirs = NULL
//  //      )
//  // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//  // RETURNS
//  //      On SUCCESS
//  //          $web_site_collections_record ARRAY
//  //
//  //      On FAILURE
//  //          $error_message STRING
//  // -------------------------------------------------------------------------
//
//  $web_site_collections_record =
//      \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\get_web_site_collections_record_by_collection_global_unique_key(
//          $all_application_dataset_definitions                        ,
//          $this_dataset_record_data['collection_global_unique_key']   ,
//          $loaded_datasets
//          ) ;
//
//  // -------------------------------------------------------------------------
//
//  if ( is_string( $web_site_collections_record ) ) {
//      return $web_site_collections_record ;
//  }

    // =========================================================================
    // Create the column value...
    // =========================================================================

    $column_value = trim( $this_dataset_record_data['description'] ) ;

    // -------------------------------------------------------------------------

    if ( $column_value !== '' ) {

        // -------------------------------------------------------------------------
        // array preg_split ( string $pattern , string $subject [, int $limit = -1 [, int $flags = 0 ]] )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Split the given string by a regular expression.
        //
        //      pattern
        //          The pattern to search for, as a string.
        //
        //      subject
        //          The input string.
        //
        //      limit
        //          If specified, then only substrings up to limit are returned with
        //          the rest of the string being placed in the last substring. A
        //          limit of -1, 0 or NULL means "no limit" and, as is standard
        //          across PHP, you can use NULL to skip to the flags parameter.
        //
        //      flags
        //          flags can be any combination of the following flags (combined
        //          with the | bitwise operator):
        //
        //          PREG_SPLIT_NO_EMPTY
        //              If this flag is set, only non-empty pieces will be returned
        //              by preg_split().
        //
        //          PREG_SPLIT_DELIM_CAPTURE
        //              If this flag is set, parenthesized expression in the
        //              delimiter pattern will be captured and returned as well.
        //
        //          PREG_SPLIT_OFFSET_CAPTURE
        //              If this flag is set, for every occurring match the appendant
        //              string offset will also be returned. Note that this changes
        //              the return value in an array where every element is an array
        //              consisting of the matched string at offset 0 and its string
        //              offset into subject at offset 1.
        //
        // Returns an array containing substrings of subject split along boundaries
        // matched by pattern.
        //
        // (PHP 4, PHP 5)
        // -------------------------------------------------------------------------

        $words_array = \preg_split(
                            '/\s+/'         ,
                            $column_value
                            ) ;

        // -----------------------------------------------------------------

        $max_words = 16 ;

        // -----------------------------------------------------------------

        if ( count( $words_array ) > $max_words ) {
            $words_array = array_slice( $words_array , 0 , $max_words ) ;
        }

        // -----------------------------------------------------------------

        $column_value = implode( chr(32) , $words_array ) . '...' ;

        // -----------------------------------------------------------------

     }

    // -------------------------------------------------------------------------

    $url = trim( $this_dataset_record_data['collection_home_page_url'] ) ;

    // -------------------------------------------------------------------------

    if ( $url !== '' ) {

        $url = <<<EOT
<a  target="_blank"
    href="{$url}"
    style="text-decoration:none; font-weight:bold"
    >more...</a>
EOT;

    }

    // -------------------------------------------------------------------------

    if ( $column_value === '' ) {

        $column_value = $url ;

    } else {

        $column_value .= <<<EOT
 {$url}
EOT;

    }

    // =========================================================================
    // Return the column value...
    // =========================================================================

    return $column_value ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

