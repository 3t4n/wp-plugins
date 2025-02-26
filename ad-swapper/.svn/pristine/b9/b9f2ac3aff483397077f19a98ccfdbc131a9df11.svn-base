<?php

// *****************************************************************************
// AD-SWAPPER.APP / AD-SWAPPER-PAGE-REQUESTS.DD.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperPageRequests ;
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

    $basepress_dataset_uid =
        '198b29f9-7d1f-45be-a16f-eacd3397cc59' . '-' .
        'e2cf44f5-f4b9-4cff-a75d-0fb94a13abec' . '-' .
        '462adf62-6c29-4c5e-96f7-08bf43077d83' . '-' .
        'f5fbbe2d-39c0-4e02-bf0e-1ef664be6b52'
        ;

    // -------------------------------------------------------------------------

    $basepress_dataset_handle = array(
        'nice_name'     =>  'adSwapper_byFernTec_adSwapperPageRequests'     ,
        'unique_key'    =>  $basepress_dataset_uid                          ,
        'version'       =>  '0.1'
        ) ;

    // =========================================================================
    // Support...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/page-request-resources.php' ) ;

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
        // REQUEST INFO...
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'php_time'              ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'              ,
                                                                    'instance'  =>  'php_time'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  From PHP's time()...

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'php_microtime'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'              ,
                                                                    'instance'  =>  'php_microtime'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  From PHP's microtime()...

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'request_time'          ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'              ,
                                                                    'instance'  =>  'request_time'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  From PHP's $_SERVER['REQUEST_TIME']...

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'request_time_float'        ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'request_time_float'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  From PHP's $_SERVER['REQUEST_TIME_FLOAT']...

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'request_uri'               ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'request_uri'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  From PHP's $_SERVER['REQUEST_URI']...

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'full_request_url'              ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'full_request_url'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  From Great Kiwi's "get_current_page_url()"...

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'asadid'            ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'      ,
                                                                    'instance'  =>  'asadid'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  Contains: $_GET['asadid'] (if that GET variable existed).
            //
            //  If the "asadid" is non-blank (and valid), then it means that
            //  this page request was a "click-through" - where the user
            //  came to this page by clicking an Ad Swapper ad (on some other
            //  Ad Swapper site).

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'http_referer'              ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'http_referer'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  From PHP's $_SERVER['HTTP_REFERER']...

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'remote_addr'               ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'remote_addr'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  From PHP's $_SERVER['REMOTE_ADDR']...

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'http_user_agent'           ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'              ,
                                                                    'instance'  =>  'http_user_agent'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )
            //  From PHP's $_SERVER['HTTP_USER_AGENT']...

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

    $focus_field_slug = 'php_time' ;

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
                                'custom_form_title_edit'    =>  'View Page Request Details'
                                )   ,

        'field_specs'   =>  array(

/*



*/

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'php_time'                                                          ,
                'zebra_control_type'    =>  'text'                                                              ,
                'label'                 =>  'Request time()'                                                    ,
                'help_text'             =>  'Request time - from PHP\'s time() - in Unix Timestamp format.'     ,
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

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'php_microtime'                             ,
                'zebra_control_type'    =>  'text'                                      ,
                'label'                 =>  'Request microtime()'                       ,
                'help_text'             =>  'Request time - from PHP\'s microtime()'    ,
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

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'request_time'                                              ,
                'zebra_control_type'    =>  'text'                                                      ,
                'label'                 =>  'REQUEST_TIME'                                              ,
                'help_text'             =>  'Request time - from PHP\'s $_SERVER[\'REQUEST_TIME\'].'    ,
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

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'request_time_float'                                            ,
                'zebra_control_type'    =>  'text'                                                          ,
                'label'                 =>  'REQUEST_TIME_FLOAT'                                            ,
                'help_text'             =>  'Request time - from PHP\'s $_SERVER[\'REQUEST_TIME_FLOAT\'].'  ,
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

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'request_uri'                                                   ,
                'zebra_control_type'    =>  'textarea'                                                      ,
                'label'                 =>  'REQUEST_URI'                                                   ,
                'help_text'             =>  'Partial page URL - from PHP\'s $_SERVER[\'REQUEST_URI\'].'     ,
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

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'full_request_url'                              ,
                'zebra_control_type'    =>  'textarea'                                      ,
                'label'                 =>  'Full Page URL'                                 ,
                'help_text'             =>  'Full page URL - from PHP\'s $_SERVER[].'       ,
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

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'asadid'                ,
                'zebra_control_type'    =>  'text'                  ,
                'label'                 =>  'Ad Swapper Ad ID'      ,
                'help_text'             =>  'If specified, means that this page request was generated by the user clicking one of your Ad Swapper ads (on some other Ad Swapper site).'     ,
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

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'http_referer'                                      ,
                'zebra_control_type'    =>  'text'                                              ,
                'label'                 =>  'HTTP_REFERER'                                      ,
                'help_text'             =>  'The URL from which the user came to this page.'    ,
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

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'remote_addr'                                       ,
                'zebra_control_type'    =>  'text'                                              ,
                'label'                 =>  'Remote IP'                                         ,
                'help_text'             =>  'The IP address of the user'                        ,
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

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'http_user_agent'                                               ,
                'zebra_control_type'    =>  'textarea'                                                      ,
                'label'                 =>  'User Agent'                                                    ,
                'help_text'             =>  'The User Agent (browser) that the page was displayed in.'      ,
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

//          'slug'                      =>  'php_time'              ,
//          'slug'                      =>  'php_microtime'         ,
//          'slug'                      =>  'request_time'          ,
//          'slug'                      =>  'request_time_float'        ,
//          'slug'                      =>  'request_uri'               ,
//          'slug'                      =>  'full_request_url'              ,
//          'slug'                      =>  'http_referer'              ,
//          'slug'                      =>  'remote_addr'               ,
//          'slug'                      =>  'http_user_agent'           ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'datetime_utc'          ,
            'label'                         =>  'Request Date/Time'     ,
            'question_sortable'             =>  TRUE                    ,
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'  ,
//                                                  'instance'  =>  'datetime_utc'
//                                                  )   ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'custom-function'                                           ,
                                                    'instance'  =>  '\\' . __NAMESPACE__ . '\\get_datetime_utc_column_value'    ,
                                                    'args'      =>  array()
                                                    )   ,
            'display_treatments'            =>  NULL
            )   ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'full_request_url'                                  ,
            'label'                         =>  'Requested/Displayed Page <i>(on Your Site)</i>'    ,
            'question_sortable'             =>  TRUE                                                ,
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'  ,
//                                                  'instance'  =>  'full_request_url'
//                                                  )   ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'custom-function'                                   ,
                                                    'instance'  =>  '\\' . __NAMESPACE__ . '\\get_page_column_value'    ,
                                                    'args'      =>  array()
                                                    )   ,
            'display_treatments'            =>  array(
//              array(
//                  'method'    =>  'to-clickable-url'      ,
//                  'args'      =>  array(
//                                      'attributes'    =>  array(
//                                          'target'    =>  '_blank'                    ,
//                                          'style'     =>  'text-decoration:none'
//                                          )
//                                      )
//                  )
                )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'http_referer'                                                          ,
            'label'                         =>  'Referring Page <i>(on Yours or Any Other Site, Ad Swapper or Not)<i>'  ,
            'question_sortable'             =>  TRUE                                                                    ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'http_referer'
                                                    )   ,
            'display_treatments'            =>  array(
                array(
                    'method'    =>  'to-clickable-url'      ,
                    'args'      =>  array(
                                        'attributes'    =>  array(
                                            'target'    =>  '_blank'                    ,
                                            'style'     =>  'text-decoration:none'
                                            )
                                        )
                    )
                )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'asadid'                                                        ,
            'label'                         =>  'Clicked Ad Swapper Ad <i>(if any, on Referring Page)</i>'      ,
            'question_sortable'             =>  TRUE                                                            ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'asadid'
                                                    )   ,
            'display_treatments'            =>  NULL
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
        'dataset_slug'                      =>  'ad_swapper_page_requests'          ,
        'dataset_name_singular'             =>  'ad_swapper_page_request'           ,
        'dataset_name_plural'               =>  'ad_swapper_page_requests'          ,
        'dataset_title_singular'            =>  'Page Request'                      ,
        'dataset_title_plural'              =>  'Page Requests'                     ,
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

        'storage_method'    =>  'mysql'     ,   //  "array-storage" or "mysql"

        'mysql_overrides'   =>  array(
            'array_storage_key_field_slug'                      =>  'id'                        ,
            'key_field_format'                                  =>  'ctype-digit'               ,
            'fail_link_creation_silently_on_empty_record_key'   =>  TRUE                        ,
            'missing_fields'                                    =>  array(
                                                                        'key'
                                                                        )                       ,
            'extra_fields'                                      =>  array(
                                                                        'id'
                                                                        )
            )

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

