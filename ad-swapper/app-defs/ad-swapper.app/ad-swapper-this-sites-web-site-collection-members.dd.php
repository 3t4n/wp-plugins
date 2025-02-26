<?php

// *****************************************************************************
// AD-SWAPPER-CENTRAL.APP / AD-SWAPPER-THIS-SITES-WEB-SITE-COLLECTION-MEMBERS.DD.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperThisSitesWebSiteCollectionMembers ;
        //  NOTE!
        //  -----
        //  The dataset name/slug should be camel cased.  Eg:-
        //      projects
        //      referenceUrls
        //      globalLogMessages

//error_reporting( E_ALL ) ;
//ini_set( 'display_errors' , '1' ) ;

// =============================================================================
// get_datasets_array_storage_details()
// =============================================================================

function get_datasets_array_storage_details() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableSites\
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
        'acb855a6-1552-441d-93df-c42722899d59' . '-' .
        '65d79452-570a-49ce-8fef-6970da293db5' . '-' .
        '87832901-0ace-4a2e-8919-ec368c4e2412' . '-' .
        '88358b17-86dc-4517-aa2a-e9701dd27711'
        ;

    // -------------------------------------------------------------------------

    $basepress_dataset_handle = array(
        'nice_name'     =>  'adSwapper_byFernTec_thisSitesWebSiteCollectionMembers'     ,
        'unique_key'    =>  $basepress_dataset_uid                                      ,
        'version'       =>  '0.1'
        ) ;

    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_this_sites_web_site_collection_members' ;

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

    require_once( dirname( __FILE__ ) . '/web-site-collection-member-resources.php' ) ;

    // =========================================================================
    // Record Structure...
    // =========================================================================

    $collection_global_unique_key_options = array(
    	'number_groups'		    =>	8		,
    	'chars_per_group'	    =>	4       ,
    	'group_separator'	    =>	'-'	    ,
    	'lowercase_only'	    =>	TRUE    ,
        'question_punctuation'  =>  FALSE
        ) ;

    // -------------------------------------------------------------------------

    $site_unique_key_options = array(
    	'number_groups'		    =>	4		,
    	'chars_per_group'	    =>	4       ,
    	'group_separator'	    =>	'-'	    ,
    	'lowercase_only'	    =>	TRUE    ,
        'question_punctuation'  =>  FALSE
        ) ;

    // -------------------------------------------------------------------------

    $array_storage_record_structure = array(

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

        array(
            'slug'                      =>  'collection_global_unique_key'      ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                              ,
                                                                    'instance'  =>  'collection_global_unique_key'
                                                                    )
                                                )   ,
            'constraints'   =>  array(
                                    array(
                                        'method'    =>  'grouped-random-password'               ,
                                        'args'      =>  $collection_global_unique_key_options
                                        )
                                    )
            )   ,
            //  A string of the form:-
            //
            //                1         2         3
            //       123456789012345678901234567890123456789
            //      "1234-1234-1234-1234-1234-1234-1234-1234"
            //
            //      "9dck-9gn2-cyzn-x3dg-x9v7-7hg7-zdpp-kvm9"
            //
            //  that uniquely identifies this collection.

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'member_site_unique_key'        ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                      ,
                                                                    'instance'  =>  'member_site_unique_key'
                                                                    )
                                                )   ,
            'constraints'   =>  array(
                                    array(
                                        'method'    =>  'grouped-random-password'               ,
                                        'args'      =>  $site_unique_key_options
                                        )
                                    )
            )   ,
            //  A string of the form:-
            //
            //                1
            //       1234567890123456789
            //      "1234-1234-1234-1234"
            //
            //      "9dck-9gn2-cyzn-x3dg"
            //      "x9v7-7hg7-zdpp-kvm9"
            //      "4whw-4wk2-37pg-yyxc"
            //
            //  that uniquely identifies the site that wants to belong to
            //  this collection.

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'question_member_enabled_by_moderator'   ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                                  ,
                                                                    'instance'  =>  'question_member_enabled_by_moderator'
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

//  $result = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_add_edit_form_cancel_href_and_onclick(
//                  $caller_app_slash_plugins_global_namespace      ,
//                  $question_front_end                             ,
//                  'teasers'
//                  ) ;
//
//  // -------------------------------------------------------------------------
//
//  if ( is_string( $result ) ) {
//      return $result ;
//  }
//
//  // -------------------------------------------------------------------------
//
//  list(
//      $cancel_href    ,
//      $onclick
//      ) = $result ;

    // -------------------------------------------------------------------------

    $get_cancel_button_onclick_attribute_value_function_name =
        '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager' .
        '\\get_cancel_button_onclick_attribute_value'
        ;

    // -------------------------------------------------------------------------

/*
    $help_markdown = <<<EOT
<a target="_blank" href="http://michelf.ca/projects/php-markdown/reference/" style="text-decoration:none"><b>help</b></a>
EOT;

    // -------------------------------------------------------------------------

    $help_bbcode = <<<EOT
<a target="_blank" href="http://nbbc.sourceforge.net/readme.php?page=intro_over" style="text-decoration:none"><b>help</b></a>
EOT;
*/

    // -------------------------------------------------------------------------

    $focus_field_slug = 'question_member_enabled_by_moderator' ;

//  if (    function_exists( '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\\is_export_version_short_slug' )
//          &&
//          \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\is_export_version_short_slug( 'std' )
//      ) {
//      $focus_field_slug = 'original_url' ;
//  }

    // -------------------------------------------------------------------------

    $zebra_form = array(

        'form_specs'    =>  array(
                                'name'                      =>  'add_edit_ad_swapper_web_site_collection_member'    ,
                                'method'                    =>  'POST'                                              ,
                                'action'                    =>  ''                                                  ,
                                'attributes'                =>  array()                                             ,
                                'clientside_validation'     =>  TRUE
                                )   ,

        'field_specs'   =>  array(

/*



*/

//              array(
//                  'form_field_name'       =>  'question_disabled_by_ad_swapper_central'   ,
//                  'zebra_control_type'    =>  'checkbox'                                  ,
//                  'label'                 =>  'Disable The Following Site ?'              ,
//                  'help_text'             =>  array(
//                                                  'function'      =>  '\\' . __NAMESPACE__ . '\\get_disable_site_from_ad_swapper_central_help_text'    ,
//                                                  'extra_args'    =>  array()
//                                                  )   ,
//                  'attributes'            =>  array(
//  //                                              'style'     =>  'width:98%; text-align:left'     ,
//                                                  'readonly'  =>  'readonly'
//                                                  )               ,
//                  'rules'                 =>  array(
//                      'required'  =>  array(
//                                          'error'             ,   // variable to add the error message to
//                                          'Field is required'     // error message if value doesn't validate
//                                          )
//                      )
//                  )   ,

//              array(
//                  'form_field_name'       =>  'ad_swapper_site_sid'       ,
//                  'zebra_control_type'    =>  'text'                      ,
//                  'label'                 =>  'Ad Swapper Site ID'        ,
//  //              'help_text'             =>  'The title for this teaser.&nbsp; Using the <b>same title as the page the teaser points to</b> usually works well.'     ,
//                  'attributes'            =>  array(
//                                                  'style'     =>  'width:98%'     ,
//                                                  'readonly'  =>  'readonly'
//                                                  )               ,
//                  'rules'                 =>  array(
//  //                  'required'  =>  array(
//  //                                      'error'             ,   // variable to add the error message to
//  //                                      'Field is required'     // error message if value doesn't validate
//  //                                      )
//                      )
//                  )   ,

//          'slug'                      =>  'collection_global_unique_key'      ,
//          'slug'                      =>  'member_site_unique_key'        ,
//          'slug'                      =>  'question_member_enabled_by_moderator'   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'collection_global_unique_key'      ,
                'zebra_control_type'    =>  'text'                              ,
                'label'                 =>  'Collection Global Unique Key'      ,
//              'help_text'             =>  'The title for this teaser.&nbsp; Using the <b>same title as the page the teaser points to</b> usually works well.'     ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'     ,
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
                'form_field_name'       =>  'member_site_unique_key'            ,
                'zebra_control_type'    =>  'text'                              ,
                'label'                 =>  'Member Site Unique Key'            ,
//              'help_text'             =>  'The title for this teaser.&nbsp; Using the <b>same title as the page the teaser points to</b> usually works well.'     ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'     ,
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
                'form_field_name'       =>  'question_member_enabled_by_moderator'                                                  ,
                'zebra_control_type'    =>  'checkbox'                                                                              ,
                'label'                 =>  'Member Site Enabled/Approved (By You)&nbsp;?'                                          ,
                'help_text'             =>  '<i>Tick this checkbox if you want this site to be a member of your collection.</i>'    ,
//              'help_text'             =>  array(
//                                              'function'      =>  '\\' . __NAMESPACE__ . '\\get_disable_from_ad_swapper_central_help_text'    ,
//                                              'extra_args'    =>  array()
//                                              )   ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%; text-align:left'
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
                'form_field_name'       =>  'save_me'       ,
                'zebra_control_type'    =>  'submit'        ,
                'label'                 =>  NULL            ,
                'attributes'            =>  array()         ,
                'rules'                 =>  array()         ,
                'type_specific_args'    =>  array(
                    'caption'   =>  'Submit'
                    )
                )   ,

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

        'focus_field_slug'  =>  $focus_field_slug       ,

//      'custom_add_edit_record_page_header_fn' =>  '\\' . __NAMESPACE__ . '\\get_custom_add_edit_record_page_header'

        'validata_record_structure_slug'    =>  'ad-swapper-local-this-sites-web-site-collection-member-submissions'

        ) ;

    // =========================================================================
    // Dataset Records Table...
    // =========================================================================

    $dataset_records_table_columns = array(

//      array(
//          'base_slug'                     =>  'xxx'
//          'label'                         =>  'Xxx' OR ''/NULL (means use "to_title( <base slug> )"
//          'question_sortable'             =>  TRUE OR FALSE/NULL
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'      ,
//                                                  'instance'  =>  "xxx"
//                                                  )   ,
//                                              --OR--
//                                              array(
//                                                  'method'    =>  'special-type'                  ,
//                                                  'instance'  =>  "action"
//                                                  )   ,
//                                              --OR--
//                                              array(
//                                                  'method'    =>  'foreign-field'                 ,
//                                                  'instance'  =>  "<target-field-name>"
//                                                  'args'      =>  array(
//                                                                      array(
//                                                                          'pointer_field_array_storage_slug'  =>  '<pointer_field_slug>'  ,
//                                                                          'foreign_dataset'                   =>  '<dataset_slug>'
//                                                                          )   ,
//                                                                      ...
//                                                                      )
//                                                  )   ,
//
//          'width_in_percent'              =>  1 to 100 (All columns must add up 100%.  Though
//                                              some columns may be left 0/NULL or unspecified -
//                                              in which case the leftover width will be evenly
//                                              distributed amongst these columns.
//          'header_halign'                 =>  'left' | 'center' | 'right'
//          'header_valign'                 =>  'top' | 'middle' | 'bottom'
//          'data_halign'                   =>  'left' | 'center' | 'right'
//          'data_valign'                   =>  'top' | 'middle' | 'bottom'
//
//          'data_field_slug_4_display'     =>  "xxx" (generated automatically; DON'T specify)
//          'data_field_slug_4_sort'        =>  "xxx" (generated automatically; DON'T specify)
//          )   ,

//      array(
//          'base_slug'                     =>  'owner_ad_swapper_user_id'      ,
//          'label'                         =>  'Owner'                         ,
//          'question_sortable'             =>  TRUE                            ,
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'  ,
//                                                  'instance'  =>  'owner_ad_swapper_user_id'
//                                                  )   ,
//          'display_treatments'            =>  NULL
//          )   ,

//          array(
//              'base_slug'                     =>  'account'               ,
//              'label'                         =>  'Account'               ,
//              'question_sortable'             =>  TRUE                    ,
//              'raw_value_from'                =>  array(
//  //                                                  'method'    =>  'array-storage-field-slug'  ,
//  //                                                  'instance'  =>  'ad_swapper_site_sid'
//                                                      'method'    =>  'custom-function'                                           ,
//                                                      'instance'  =>  '\\' . __NAMESPACE__ . '\\get_account_name_column_value'    ,
//                                                      'args'      =>  array()
//                                                      )   ,
//              'display_treatments'            =>  NULL
//              )   ,

//          'slug'                      =>  'collection_global_unique_key'      ,
//          'slug'                      =>  'member_site_unique_key'        ,
//          'slug'                      =>  'question_member_enabled_by_moderator'   ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'collection_global_unique_key'          ,
            'label'                         =>  'Collection'                            ,
            'question_sortable'             =>  TRUE                                    ,
            'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'  ,
//                                                  'instance'  =>  'collection_global_unique_key'
                                                    'method'    =>  'custom-function'                                           ,
                                                    'instance'  =>  '\\' . __NAMESPACE__ . '\\get_collection_column_value'      ,
                                                    'args'      =>  array()
                                                    )   ,
            'display_treatments'            =>  array(
//                                                  array(
//                                                      'method'    =>  'bold'
//                                                      )
                                                    )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'member_site_unique_key'                ,
            'label'                         =>  'Member Site'                           ,
            'question_sortable'             =>  TRUE                                    ,
            'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'  ,
//                                                  'instance'  =>  'member_site_unique_key'
                                                    'method'    =>  'custom-function'                                           ,
                                                    'instance'  =>  '\\' . __NAMESPACE__ . '\\get_member_site_column_value'     ,
                                                    'args'      =>  array()
                                                    )   ,
            'display_treatments'            =>  array(
//                                                  array(
//                                                      'method'    =>  'bold'
//                                                      )
                                                    )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'question_member_enabled_by_moderator'              ,
            'label'                         =>  'Member Site Enabled/Approved (By You)&nbsp;?'      ,
            'question_sortable'             =>  TRUE                                                ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'      ,
                                                    'instance'  =>  'question_member_enabled_by_moderator'
                                                    )   ,
            'display_treatments'            =>  array(
                array(
                    'method'    =>  'yes-no'        ,
                    'args'      =>  array(
                                        'custom_conversions'    =>  array(
                                            'TRUE'  =>  '<span style="color:#008000">YES</span>'    ,
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
    // "Account" column = administrators only...
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // is_user_logged_in()
    // - - - - - - - - - -
    // Checks if the current visitor is logged in.  This is a boolean function,
    // meaning it returns either TRUE or FALSE.
    //
    // RETURN VALUES
    //      (boolean)
    //      TRUE if user is logged in, FALSE if not logged in.
    // -------------------------------------------------------------------------

//  if (    ! is_user_logged_in()
//          ||
//          ! \current_user_can( 'manage_options' )
//      ) {
//
//      foreach ( $dataset_records_table_columns as $this_index => $this_column ) {
//
//          if ( $this_column['base_slug'] === 'account' ) {
//              unset( $dataset_records_table_columns[ $this_index ] ) ;
//              break ;
//          }
//
//      }
//
//  }

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
        'default_data_field_slug_to_orderby'    =>  'collection_global_unique_key'              ,
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
                                                            'type'          =>  'standard'          ,
                                                            'slug'          =>  'edit'              ,
                                                            'link_title'    =>  'enable/disable'
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
        'dataset_slug'                      =>  'ad_swapper_this_sites_web_site_collection_members'     ,
        'dataset_name_singular'             =>  'ad_swapper_this_sites_web_site_collection_member'      ,
        'dataset_name_plural'               =>  'ad_swapper_this_sites_web_site_collection_members'     ,
        'dataset_title_singular'            =>  'This Site\'s Web Site Collection Member'               ,
        'dataset_title_plural'              =>  'This Site\'s Web Site Collection Members'              ,
        'basepress_dataset_handle'          =>  $basepress_dataset_handle                               ,
        'dataset_records_table'             =>  $dataset_records_table                                  ,
        'zebra_forms'                       =>  array(
                                                    'default'   =>  $zebra_form
                                                    )                               ,
        'array_storage_record_structure'    =>  $array_storage_record_structure     ,
        'array_storage_key_field_slug'      =>  'key'                               ,
        'custom_actions'                    =>  $custom_actions

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
//          'array_storage_key_field_slug'                      =>  'collection_global_unique_key'              ,
//          'key_field_format'                                  =>  'great-kiwi-password'                       ,
//          'key_field_format_args'                             =>  $collection_global_unique_key_options       ,
//          'fail_link_creation_silently_on_empty_record_key'   =>  TRUE                                        ,
//          'missing_fields'                                    =>  array(
//                                                                      'key'
//                                                                      )                                       ,
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

