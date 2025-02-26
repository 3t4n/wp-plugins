<?php

// *****************************************************************************
// AD-SWAPPER.APP / WEB-SITE-COLLECTION-MEMBER-RESOURCES.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperThisSitesWebSiteCollectionMembers ;

// =============================================================================
// get_collection_column_value()
// =============================================================================

function get_collection_column_value(
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

    // =========================================================================
    // Get the "Web Site Collections" record...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/shared-resources.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\
    // get_web_site_collections_record_by_collection_global_unique_key(
    //      $all_application_dataset_definitions    ,
    //      $collection_global_unique_key           ,
    //      &$loaded_datasets   = NULL              ,
    //      &$core_plugapp_dirs = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $web_site_collections_record ARRAY
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $web_site_collections_record =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\get_web_site_collections_record_by_collection_global_unique_key(
            $all_application_dataset_definitions                        ,
            $this_dataset_record_data['collection_global_unique_key']   ,
            $loaded_datasets
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $web_site_collections_record ) ) {
        return $web_site_collections_record ;
    }

    // =========================================================================
    // Return the collection name/title...
    // =========================================================================

//  return $this_dataset_record_data['collection_global_unique_key'] ;

    return $web_site_collections_record['name_slash_title'] ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_member_site_column_value()
// =============================================================================

function get_member_site_column_value(
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

    // =========================================================================
    // Get the "Available Sites" record...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/shared-resources.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\
    // get_available_sites_record_by_site_unique_key(
    //      $all_application_dataset_definitions    ,
    //      $site_unique_key                        ,
    //      &$loaded_datasets   = NULL              ,
    //      &$core_plugapp_dirs = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $available_sites_record ARRAY
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $available_sites_record =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\get_available_sites_record_by_site_unique_key(
            $all_application_dataset_definitions                    ,
            $this_dataset_record_data['member_site_unique_key']     ,
            $loaded_datasets
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $available_sites_record ) ) {
        return $available_sites_record ;
    }

    // =========================================================================
    // Return the member site title and URL...
    // =========================================================================

    $site_title = '' ;

    // -------------------------------------------------------------------------

    if (    array_key_exists( 'site_title' , $available_sites_record )
            &&
            trim( $available_sites_record['site_title'] ) !== ''
        ) {
        $site_title = $available_sites_record['site_title'] ;
    }

    // -------------------------------------------------------------------------

    $url = '' ;

    // -------------------------------------------------------------------------

    if (    array_key_exists( 'home_page_url' , $available_sites_record )
            &&
            trim( $available_sites_record['home_page_url'] ) !== ''
        ) {
        $url = $available_sites_record['home_page_url'] ;
    }

    // -------------------------------------------------------------------------

    if ( $site_title === '' ) {
        $site_title = $url ;
    }

    // -------------------------------------------------------------------------

    if ( $site_title === '' ) {
        return '???' ;

    } elseif ( $url === '' ) {
        return $url ;

    }

    // -------------------------------------------------------------------------

    return <<<EOT
<a  target="_blank"
    href="{$url}"
    style="text-decoration:none"
    >{$site_title}</a>
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

