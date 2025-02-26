<?php

// *****************************************************************************
// AD-SWAPPER.APP / AD-SWAPPER-OTHER-SITE-SPECIFIC-SETTINGS.DD.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperOtherSiteSpecificSettings ;
        //  NOTE!
        //  -----
        //  The dataset name/slug should be camel cased.  Eg:-
        //      projects
        //      referenceUrls
        //      globalLogMessages

// =============================================================================
// get_full_blank_slash_defaulted_record()
// =============================================================================

function get_full_blank_slash_defaulted_record(
    $core_plugapp_dirs              ,
    $dataset_records                ,
    $record_indices_by_key = NULL
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperOtherSiteSpecificSettings\
    // get_full_blank_slash_defaulted_record(
    //      $core_plugapp_dirs              ,
    //      $dataset_records                ,
    //      $record_indices_by_key = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // Returns a "blank" array storage record - containing ALL the dataset's
    // fields.
    //
    // With all fields other than the `overhead' fields:-
    //      o   created_server_datetime_utc
    //      o   last_modified_server_datetime_utc
    //      o   key
    //
    // set to their default values.  EXCEPT for the:-
    //      o   ad_swapper_site_sid
    //
    // field - which is left BLANK (empty string) - and MUST be set by the
    // CALLER (before the record is stored).
    //
    // NOTE!
    // =====
    // The returned record isn't added to the input $dataset_records.
    // Nor is is saved to disk.  It's the caller's job to do these things
    // (f required).
    //
    // RETURNS
    //      On SUCCESS
    //          $blank_record ARRAY
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    require_once( $core_plugapp_dirs['dataset_manager_includes_dir'] . '/common.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_blank_record(
    //      $dataset_records                ,
    //      $record_indices_by_key = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // Returns a new blank record, for a standard "array stored" array storage
    // record.
    //
    // NOTE!
    // =====
    // 1.   Won't work for "mysql" stored records!
    // 2.   Only works for datasets who's "key" field slug is "key".
    // 3.   The returned record isn't added to the input $dataset_records.
    //      Nor is is saved to disk.  It's the caller's job to do these things
    //      (f required).
    //
    // RETURNS
    //      On SUCCESS
    //          $blank_record = array(
    //              'created_server_datetime_utc'       =>  1234567890
    //              'last_modified_server_datetime_utc' =>  1234567890
    //              'key'                               =>
    //              )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $blank_record =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_blank_record(
            $dataset_records            ,
            $record_indices_by_key
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $blank_record ) ) {
        return $blank_record ;
    }

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // Please UPDATE the following code whenever fields are changed (added,
    // re-named or deleted), in this dataset.
    // -------------------------------------------------------------------------

    $blank_record['ad_swapper_site_sid'] = '' ;

    // -------------------------------------------------------------------------

    $blank_record['question_display_your_ads_on_this_site']       = FALSE ;
    $blank_record['question_display_this_sites_ads_on_your_site'] = FALSE ;

    // -------------------------------------------------------------------------
    // SUCCESS!
    // -------------------------------------------------------------------------

    return $blank_record ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_datasets_array_storage_details()
// =============================================================================

function get_datasets_array_storage_details() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperOtherSiteSpecificSettings\
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
        'a0f7f0f9-6ce8-496e-8958-bd5a80179cb2' . '-' .
        '0c25f91e-747a-4d5e-81ca-96bc5e61236f' . '-' .
        '01b1975f-b18f-4915-b5e5-489ae9ec6d03' . '-' .
        '239bb7c3-818f-49dd-9d3e-68deef64a989'
        ;

    // -------------------------------------------------------------------------

    $basepress_dataset_handle = array(
        'nice_name'     =>  'adSwapper_byFernTec_adSwapperOtherSiteSpecificSettings'    ,
        'unique_key'    =>  $basepress_dataset_uid                                      ,
        'version'       =>  '0.1'
        ) ;

    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_other_site_specific_settings' ;

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
    // Get this dataset's BASEPRESS DATASET HANDLE...
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

//  require_once( dirname( __FILE__ ) . '/page-request-resources.php' ) ;

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
        // RECORD PROPER
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'ad_swapper_site_sid'    ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                              ,
                                                                    'instance'  =>  'other_site_ad_swapper_site_sid'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  The other site's Ad Swapper site SID

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'question_display_your_ads_on_this_site'        ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                                      ,
                                                                    'instance'  =>  'question_display_your_ads_on_this_site'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'question_display_this_sites_ads_on_your_site'      ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                                          ,
                                                                    'instance'  =>  'question_display_this_sites_ads_on_your_site'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )

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

    $focus_field_slug = 'ad_swapper_site_sid' ;

//  if (    function_exists( '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\\is_export_version_short_slug' )
//          &&
//          \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\is_export_version_short_slug( 'std' )
//      ) {
//      $focus_field_slug = 'original_url' ;
//  }

    // -------------------------------------------------------------------------

    $this_field_can_be_edited_from = <<<EOT
NOTE!&nbsp; <i>This field can (only) be edited from the "<b>Select the Sites to
Advertise/Advertise On</b>" / "<b>Manage Available Sites</b>" screen.</i>
EOT;

    // -------------------------------------------------------------------------

    $zebra_form = array(

        'form_specs'    =>  array(
                                'name'                      =>  'add_edit_ad_swapper_other_site_specific_settings'  ,
                                'method'                    =>  'POST'                                              ,
                                'action'                    =>  ''                                                  ,
                                'attributes'                =>  array()                                             ,
                                'clientside_validation'     =>  TRUE                                                ,
                                'custom_form_title_edit'    =>  'View Other Site\'s Site Specific Settings'
                                )   ,

        'field_specs'   =>  array(

/*



*/

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'ad_swapper_site_sid'                   ,
                'zebra_control_type'    =>  'text'                                  ,
                'label'                 =>  'Other Site\'s Ad Swapper Site SID'     ,
                'help_text'             =>  ''                                      ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                'readonly'  =>  'readonly'
                                                )               ,
                'rules'                 =>  array(
//                  'required'  =>  array(
//                                      'error'             ,   // variable to add the error message to
//                                      'Field is required'     // error message if value doesn't validate
//                                      )
                    )
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'question_display_your_ads_on_this_site'            ,
                'zebra_control_type'    =>  'checkbox'                                          ,
                'label'                 =>  'Display Your Site\'s Ads On This Other Site ?'     ,
                'help_text'             =>  $this_field_can_be_edited_from                      ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                'readonly'  =>  'disabled'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'question_display_this_sites_ads_on_your_site'      ,
                'zebra_control_type'    =>  'checkbox'                                          ,
                'label'                 =>  'Display This Other Site\'s Ads On Your Site ?'     ,
                'help_text'             =>  $this_field_can_be_edited_from                      ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                'readonly'  =>  'disabled'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

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

            // -----------------------------------------------------------------

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

            // -----------------------------------------------------------------

            )   ,

        'focus_field_slug'  =>  $focus_field_slug

        ) ;

    // =========================================================================
    // Dataset Records Table...
    // =========================================================================

    $dataset_records_table_columns = array(

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'ad_swapper_site_sid'                   ,
            'label'                         =>  'Other Site\'s Ad Swapper Site SID'     ,
            'question_sortable'             =>  TRUE                                    ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'ad_swapper_site_sid'
                                                    )   ,
            'display_treatments'            =>  NULL
            )   ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'question_display_your_ads_on_this_site'            ,
            'label'                         =>  'Display Your Ads On This Other Site&nbsp;?'        ,
            'question_sortable'             =>  TRUE                    ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'                  ,
                                                    'instance'  =>  'question_display_your_ads_on_this_site'
                                                    )   ,
            'display_treatments'            =>  array(
                array(
                    'method'    =>  'yes-no'        ,
                    'args'      =>  array(
                                        'custom_conversions'    =>  array(
                                            'TRUE'  =>  '<span style="color:#008000; font-weight:bold">YES</span>'      ,
                                            'FALSE' =>  '<span style="color:#AA0000">no</span>'
                                            )
                                        )
                    )
                )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'question_display_this_sites_ads_on_your_site'          ,
            'label'                         =>  'Display This Other Site\'s Ads On Your Site&nbsp;?'    ,
            'question_sortable'             =>  TRUE                    ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'                          ,
                                                    'instance'  =>  'question_display_this_sites_ads_on_your_site'
                                                    )   ,
            'display_treatments'            =>  array(
                array(
                    'method'    =>  'yes-no'        ,
                    'args'      =>  array(
                                        'custom_conversions'    =>  array(
                                            'TRUE'  =>  '<span style="color:#008000; font-weight:bold">YES</span>'      ,
                                            'FALSE' =>  '<span style="color:#AA0000">no</span>'
                                            )
                                        )
                    )
                )
            )   ,

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
        'default_data_field_slug_to_orderby'    =>  'ad_swapper_site_sid'                       ,
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
                                                            'type'          =>  'standard'      ,
                                                            'slug'          =>  'edit'          ,
                                                            'link_title'    =>  'view'
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
        'dataset_slug'                      =>  'ad_swapper_other_site_specific_settings'       ,
        'dataset_name_singular'             =>  'ad_swapper_other_site_specific_setting'        ,
        'dataset_name_plural'               =>  'ad_swapper_other_site_specific_settings'       ,
        'dataset_title_singular'            =>  'Other Site\'s Site Specific Settings'          ,
        'dataset_title_plural'              =>  'Other Site Specific Settings'                  ,
        'basepress_dataset_handle'          =>  $basepress_dataset_handle                       ,
        'dataset_records_table'             =>  $dataset_records_table                          ,
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
//          'key_field_format'                                  =>  'ctype-digit'               ,
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

