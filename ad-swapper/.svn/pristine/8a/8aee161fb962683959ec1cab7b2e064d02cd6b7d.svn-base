<?php

// *****************************************************************************
// AD-SWAPPER.APP / AD-SWAPPER-AD-IMPRESSIONS.DD.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAdImpressions ;
        //  NOTE!
        //  -----
        //  The dataset name/slug should be camel cased.  Eg:-
        //      projects
        //      referenceUrls
        //      globalLogMessages

// ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// NOTES!
// ======
// 1.   An "Ad Impression" is registered every time an Ad Swapper AD IS DRAWN on
//      a front-end page.
//
// 2.   A given front-end page may contain more than one Ad Swapper ad (and
//      thus may generate more than one Ad Impression).
// ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

//error_reporting( E_ALL ) ;
//ini_set( 'display_errors' , '1' ) ;

// =============================================================================
// get_datasets_array_storage_details()
// =============================================================================

function get_datasets_array_storage_details() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAdImpressions\
    // get_datasets_array_storage_details()
    // - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      ARRAY $datasets_array_storage_details = array(
    //                  'dataset_slug'              =>  "xxx"                       ,
    //                  'basepress_dataset_handle'  =>  $basepress_dataset_handle   ,
    //                  'array_storage_data'        =>  $array_storage_data
    //                  )
    //
    //      Where: $basepress_dataset_handle = array(
    //          'nice_name'     =>  "xxx"   ,
    //          'unique_key'    =>  "yyy"   ,
    //          'version'       =>  "zzz"
    //          )
    //
    //      And: $array_storage_data = array(
    //          'default_storage_method'    =>  "json" | "basepress-dataset"    ,
    //          'json_data_files_dir'       =>  NULL | "xxx"                    ,
    //          'supported_datasets'        =>  $supported_datasets
    //          ) ;
    //
    //      And: $supported_datasets = array
    //          "<dataset_slug>"    =>  array(
    //              'storage_method'            =>  "json" | "basepress-dataset"    ,
    //              'json_filespec'             =>  NULL | "xxx"                    ,
    //              'basepress_dataset_handle'  =>  $basepress_dataset_handle
    //              )
    //          ...
    //          )
    // -------------------------------------------------------------------------

    $basepress_dataset_uid =
        '7cbefdb4-39f1-46bf-aee0-d463d78ee080' . '-' .
        '0ec3bf07-84c6-44c5-8495-9b0b73c11e1e' . '-' .
        '1fb00150-d293-4fe1-b657-d006e89c4f4e' . '-' .
        'b7033bcd-8732-4992-8cb9-de4b0506f72e'
        ;

    // -------------------------------------------------------------------------

    $basepress_dataset_handle = array(
        'nice_name'     =>  'adSwapper_byFernTec_adSwapperAdImpressions'    ,
        'unique_key'    =>  $basepress_dataset_uid                          ,
        'version'       =>  '0.1'
        ) ;

    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_ad_impressions' ;

    // -------------------------------------------------------------------------

    $supported_datasets = array(
        $dataset_slug   =>  array(
            'storage_method'            =>  'basepress-dataset'         ,
            'json_filespec'             =>  NULL                        ,
            'basepress_dataset_handle'  =>  $basepress_dataset_handle
            )
        ) ;

    // -------------------------------------------------------------------------

    $array_storage_data = array(
        'default_storage_method'    =>  'basepress-dataset'     ,
        'json_data_files_dir'       =>  NULL                    ,
        'supported_datasets'        =>  $supported_datasets
        ) ;

    // -------------------------------------------------------------------------

    return array(
        'dataset_slug'              =>  $dataset_slug               ,
        'basepress_dataset_handle'  =>  $basepress_dataset_handle   ,
        'array_storage_data'        =>  $array_storage_data
        ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_dataset_details()
// =============================================================================

function get_dataset_details(
    $caller_app_slash_plugins_global_namespace      ,
    $question_front_end
    ) {

//error_reporting( E_ALL ) ;
//ini_set( 'display_errors' , '1' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_teasers\get_dataset_details(
    //      $caller_app_slash_plugins_global_namespace      ,
    //      $question_front_end
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns an array holding the specified dataset's details - as required
    // by the dataset manager.
    //
    // The returned array is like (eg):-
    //
    //      $dataset_details = array(
    //          'dataset_slug'              =>  'projects'      ,
    //          'dataset_name_singular'     =>  'project'       ,
    //          'dataset_name_plural'       =>  'projects'      ,
    //          'dataset_title_singular'    =>  'Project'       ,
    //          'dataset_title_plural'      =>  'Projects'      ,
    //          'basepress_dataset_handle'  =>  array(...)
    //          ) ;
    //
    // -------------------------------------------------------------------------

    // =========================================================================
    // Define this dataset's BASEPRESS DATASET HANDLE...
    // =========================================================================

    $datasets_array_storage_details =
        get_datasets_array_storage_details()
        ;

    // -------------------------------------------------------------------------

    $basepress_dataset_handle =
        $datasets_array_storage_details['basepress_dataset_handle']
        ;

    // =========================================================================
    // Support...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/ad-impressions-resources.php' ) ;

    // =========================================================================
    // Record Structure...
    // =========================================================================

    $array_storage_record_structure = array(

        // ---------------------------------------------------------------------
        // BASE STUFF...
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'created_server_datetime_utc'       ,
            'array_storage_value_from'  =>  array(
                                                'add'   =>  array(
                                                                'method'    =>  'created-server-datetime-utc'
                                                                )   ,
                                                'edit'  =>  array(
                                                                'method'    =>  'dont-change'
                                                                )
                                                )   ,
            'constraints'               =>  array(
                                                array(
                                                    'method'    =>  'unix-timestamp'
                                                    )
                                                )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'last_modified_server_datetime_utc'     ,
            'array_storage_value_from'  =>  array(
                                                'add'   =>  array(
                                                                'method'    =>  'last-modified-server-datetime-utc'
                                                                )   ,
                                                'edit'  =>  array(
                                                                'method'    =>  'dont-change'
                                                                )
                                                )   ,
            'constraints'               =>  array(
                                                array(
                                                    'method'    =>  'unix-timestamp'
                                                    )
                                                )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'key'       ,
            'array_storage_value_from'  =>  array(
                                                'add'   =>  array(
                                                                'method'    =>  'unique-key'
                                                                )   ,
                                                'edit'  =>  array(
                                                                'method'    =>  'dont-change'
                                                                )
                                                )   ,
            'constraints'               =>  array(
                                                array(
                                                    'method'    =>  'unique-key'
                                                    )
                                                )
            )   ,

        // ---------------------------------------------------------------------
        // IMPRESSION INFO...
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'datetime_utc'          ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'              ,
                                                                    'instance'  =>  'datetime_utc'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  The date/time the ad was displayed...

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'ad_sid'                ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'ad_sid'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  The ad that was displayed...

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'ad_slot_sid'                ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'ad_sid'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  The ad slot the ad was displayed in...

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'page_request_id'           ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'              ,
                                                                    'instance'  =>  'page_request_id'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  The MySQL ID of the page request the ad was displayed on...

        // ---------------------------------------------------------------------

        ) ;

    // =========================================================================
    // Zebra-Form Form Definition...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_add_edit_form_cancel_href_and_onclick(
    //      $caller_app_slash_plugins_global_namespace      ,
    //      $question_front_end                             ,
    //      $dataset_slug
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          array(
    //              $cancel_href STRING
    //              $onclick STRING
    //              )
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $get_cancel_button_onclick_attribute_value_function_name =
        '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager' .
        '\\get_cancel_button_onclick_attribute_value'
        ;

    // -------------------------------------------------------------------------

    $focus_field_slug = 'datetime_utc' ;

//  if (    function_exists( '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\\is_export_version_short_slug' )
//          &&
//          \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\is_export_version_short_slug( 'std' )
//      ) {
//      $focus_field_slug = 'original_url' ;
//  }

    // -------------------------------------------------------------------------

    $zebra_form = array(

        'form_specs'    =>  array(
                                'name'                      =>  'add_edit_ad_swapper_ad_impression'     ,
                                'method'                    =>  'POST'                                  ,
                                'action'                    =>  ''                                      ,
                                'attributes'                =>  array()                                 ,
                                'clientside_validation'     =>  TRUE                                    ,
                                'custom_form_title_edit'    =>  'View Ad Impression Details'
                                )   ,

        'field_specs'   =>  array(

/*



*/

            array(
                'form_field_name'       =>  'datetime_utc'                                                      ,
                'zebra_control_type'    =>  'text'                                                              ,
                'label'                 =>  'Date/Time'                                                         ,
                'help_text'             =>  'The date/time the ad was displayed (in Unix Timestamp format).'    ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                'readonly'  =>  'readonly'
                                                )               ,
                'rules'                 =>  array(
                    'required'  =>  array(
                                        'error'             ,   // variable to add the error message to
                                        'Field is required'     // error message if value doesn't validate
                                        )
                    )
                )   ,

            array(
                'form_field_name'       =>  'ad_sid'                            ,
                'zebra_control_type'    =>  'text'                              ,
                'label'                 =>  'Ad ID'                             ,
                'help_text'             =>  'The ad that was displayed.'        ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                'readonly'  =>  'readonly'
                                                )               ,
                'rules'                 =>  array(
                    'required'  =>  array(
                                        'error'             ,   // variable to add the error message to
                                        'Field is required'     // error message if value doesn't validate
                                        )
                    )
                )   ,

            array(
                'form_field_name'       =>  'ad_slot_sid'                               ,
                'zebra_control_type'    =>  'text'                                      ,
                'label'                 =>  'Ad Slot ID'                                ,
                'help_text'             =>  'The ad slot the ad was displayed in.'      ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                'readonly'  =>  'readonly'
                                                )               ,
                'rules'                 =>  array(
                    'required'  =>  array(
                                        'error'             ,   // variable to add the error message to
                                        'Field is required'     // error message if value doesn't validate
                                        )
                    )
                )   ,

            array(
                'form_field_name'       =>  'page_request_id'                                       ,
                'zebra_control_type'    =>  'text'                                                  ,
                'label'                 =>  'Page Request ID'                                       ,
                'help_text'             =>  'The page request for which this ad was displayed.'     ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                'readonly'  =>  'readonly'
                                                )               ,
                'rules'                 =>  array(
                    'required'  =>  array(
                                        'error'             ,   // variable to add the error message to
                                        'Field is required'     // error message if value doesn't validate
                                        )
                    )
                )   ,

//          array(
//              'form_field_name'       =>  'save_me'       ,
//              'zebra_control_type'    =>  'submit'        ,
//              'label'                 =>  NULL            ,
//              'attributes'            =>  array()         ,
//              'rules'                 =>  array()         ,
//              'type_specific_args'    =>  array(
//                  'caption'   =>  'Submit'
//                  )
//              )   ,

            array(
                'form_field_name'       =>  'cancel'                    ,
                'zebra_control_type'    =>  'button'                    ,
                'label'                 =>  NULL                        ,
//              'attributes'            =>  array(
//                                              'onclick'   =>  $onclick
//                                              )   ,
                'dynamic_attributes'    =>  array(
                    'onclick'       =>  array(
                        'function_name'     =>  $get_cancel_button_onclick_attribute_value_function_name    ,
                        'extra_args'        =>  NULL
                        )
                    )   ,
                'rules'                 =>  array()                     ,
                'type_specific_args'    =>  array(
                    'caption'       =>  'Cancel'        ,
                    'type'          =>  'button'
                    )
                )

            )   ,

        'focus_field_slug'  =>  $focus_field_slug

        ) ;

    // =========================================================================
    // Dataset Records Table...
    // =========================================================================

    $dataset_records_table_columns = array(

//          'slug'                      =>  'datetime_utc'          ,
//          'slug'                      =>  'ad_sid'                ,
//          'slug'                      =>  'ad_slot_sid'                ,
//          'slug'                      =>  'remote_addr'               ,
//          'slug'                      =>  'http_user_agent'           ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'datetime_utc'                  ,
            'label'                         =>  'Date/Time (Ad Displayed)'      ,
            'question_sortable'             =>  TRUE                            ,
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'  ,
//                                                  'instance'  =>  'datetime_utc'
//                                                  )   ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'custom-function'                                       ,
                                                    'instance'  =>  '\\' . __NAMESPACE__ . '\\get_datetime_column_value'    ,
                                                    'args'      =>  array()
                                                    )   ,
            'display_treatments'            =>  NULL
            )   ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'ad_sid'                        ,
            'label'                         =>  'Ad Image, Link &amp; Site'     ,
            'question_sortable'             =>  TRUE                            ,
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'  ,
//                                                  'instance'  =>  'ad_sid'
//                                                  )   ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'custom-function'                                   ,
                                                    'instance'  =>  '\\' . __NAMESPACE__ . '\\get_ad_column_value'      ,
                                                    'args'      =>  array()
                                                    )   ,
            'display_treatments'            =>  NULL
            )   ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'page_and_ad_slot'                                                          ,
            'label'                         =>  'Page &rarr; Ad Slot<br />(<i>On Your Site, That Ad Was Displayed In</i>)'  ,
            'question_sortable'             =>  TRUE                                                                        ,
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'  ,
//                                                  'instance'  =>  'page_request_id'
//                                                  )   ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'custom-function'                                               ,
                                                    'instance'  =>  '\\' . __NAMESPACE__ . '\\get_page_and_ad_slot_column_value'    ,
                                                    'args'      =>  array()
                                                    )   ,
            'display_treatments'            =>  NULL
            )   ,

        // ---------------------------------------------------------------------

//      array(
//          'base_slug'                     =>  'ad_slot_sid'           ,
//          'label'                         =>  'Ad Slot'               ,
//          'question_sortable'             =>  TRUE                    ,
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'custom-function'                                       ,
//                                                  'instance'  =>  '\\' . __NAMESPACE__ . '\\get_ad_slot_column_value'     ,
//                                                  'args'      =>  array()
//                                                  )   ,
//          'display_treatments'            =>  NULL
//          )   ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'action'            ,
            'label'                         =>  'Action'            ,
            'question_sortable'             =>  FALSE               ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'special-type'      ,
                                                    'instance'  =>  'record-action'
                                                    )   ,
            'display_treatments'            =>  NULL
            )

        // ---------------------------------------------------------------------

        ) ;

    // -------------------------------------------------------------------------
    // The Complete "Dataset Records Table" Definition...
    // -------------------------------------------------------------------------

//      'data_field_defs'                       =>  array(...) OR array()/NULL (means default to columns suggested by dataset records)

    $dataset_records_table = array(

//      'column_defs'                           =>  array(...) OR array()/NULL (means default to columns suggested by "data_field_defs")
//      'rows_per_page'                         =>  10                                          ,
//      'default_data_field_slug_to_orderby'    =>  'xxx' || ''/NULL (means orderby FIRST data field)
//      'default_order'                         =>  'asc' OR 'desc' OR ''/NULL (means default to "asc")
//      'actions'                               =>  array(
//                                                      'edit'      =>  'edit'      ,
//                                                      'delete'    =>  'delete'
//                                                      )   ,
//      'action_separator'                      =>  ' &nbsp;&nbsp; '

        'column_defs'                           =>  $dataset_records_table_columns              ,
        'rows_per_page'                         =>  10                                          ,
        'default_data_field_slug_to_orderby'    =>  'datetime_utc'                              ,
        'default_order'                         =>  'asc'                                       ,
        'buttons'                               =>  array(
//                                                      array(
//                                                          'type'  =>  'add_record'
//                                                          )
//                                                      array(
//                                                          'type'                          =>  'custom'                                                            ,
//                                                          'title'                         =>  'Clone/Copy Built-In Layout'                                        ,
//                                                          'get_button_html_function_name' =>  '\\' . __NAMESPACE__ . '\\get_clone_built_in_layout_button_html'    ,
//                                                          'extra_args'                    =>  NULL
//                                                          )   ,
//                                                      array(
//                                                          'type'  =>  'delete_all_records'
//                                                          )   ,
//                                                      array(
//                                                          'type'  =>  'show_orphaned_records'
//                                                          )
                                                        )   ,
        'record_actions'                        =>  array(
                                                        array(
                                                            'type'          =>  'standard'                      ,
                                                            'slug'          =>  'edit'                          ,
                                                            'link_title'    =>  'view ad impression details'
                                                            )   ,
//                                                      array(
//                                                          'type'          =>  'standard'      ,
//                                                          'slug'          =>  'delete'        ,
//                                                          'link_title'    =>  'delete'
//                                                          )   ,
//                                                      array(
//                                                          'type'          =>  'custom'        ,
//                                                          'slug'          =>  'post-teaser'   ,
//                                                          'link_title'    =>  'post'
//                                                          )
                                                        )   ,
        'action_separator'                      =>  ' &nbsp;&nbsp; '

        ) ;

    // =========================================================================
    // CUSTOM ACTIONS
    // =========================================================================

//  $custom_action_teaser_to_post_filespec =
//      dirname( __FILE__ ) . '/plugin.stuff/scripts/teaser-to-post.php'
//      ;

    // -------------------------------------------------------------------------

    $custom_actions = array(

//      array(
//          'slug'      =>  'post-teaser'                   ,
//          'args'      =>  array(
//                              'include_filespec'              =>  $custom_action_teaser_to_post_filespec                                                  ,
//                              'namespace_and_function_name'   =>  '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_teaserMaker\\teaser_to_post'
//                              )
//          )

        ) ;

    // =========================================================================
    // Define this dataset's details - as required by the dataset manager...
    // =========================================================================

    $dataset_details = array(
        'dataset_slug'                      =>  'ad_swapper_ad_impressions'         ,
        'dataset_name_singular'             =>  'ad_swapper_ad_impression'          ,
        'dataset_name_plural'               =>  'ad_swapper_ad_impressions'         ,
        'dataset_title_singular'            =>  'Ad Impression'                     ,
        'dataset_title_plural'              =>  'Ad Impressions'                    ,
        'basepress_dataset_handle'          =>  $basepress_dataset_handle           ,
        'dataset_records_table'             =>  $dataset_records_table              ,
        'zebra_forms'                       =>  array(
                                                    'default'   =>  $zebra_form
                                                    )                               ,
        'array_storage_record_structure'    =>  $array_storage_record_structure     ,
        'array_storage_key_field_slug'      =>  'key'                               ,
        'custom_actions'                    =>  $custom_actions                     ,

//      'parent_details'                    =>  array(
//          'type'                  =>  'single-parent-key-field'   ,
//          'type_specific_args'    =>  array(
//              'parent_dataset_slug'                       =>  'teaser_categories'     ,
//              'parent_dataset_key_field_slug'             =>  'parent_key'
//              )
//          )
//          //  This dataset's records ***may*** optionally have a PARENT.
//          //  o   "parent_dataset_slug" must be a non-empty string.
//          //  o   The array storage record's:-
//          //          ""
//          //      field may contain either:-
//          //          --  The empty string (in which case, this child
//          //              record has NO parent), or;
//          //          --  A "record key" from the parent dataset.
//          //
//          //  The dataset records may have CHILDREN too (see
//          //  "child_dataset_slugs", below).

//      'storage_method'    =>  'mysql'     ,   //  "array-storage" or "mysql"
//
//      'mysql_overrides'   =>  array(
//          'array_storage_key_field_slug'                      =>  'id'                        ,
//          'fail_link_creation_silently_on_empty_record_key'   =>  TRUE                        ,
//          'missing_fields'                                    =>  array(
//                                                                      'key'
//                                                                      )                       ,
//          'extra_fields'                                      =>  array(
//                                                                      'id'
//                                                                      )
//          )

        ) ;

    // =========================================================================
    // Return this dataset's details...
    // =========================================================================

    return $dataset_details ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

