<?php

// *****************************************************************************
// AD-SWAPPER.APP / AD-SWAPPER-ADS-OUTGOING.DD.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAdsOutgoing ;
        //  NOTE!
        //  -----
        //  The dataset name/slug should be camel cased.  Eg:-
        //      projects
        //      referenceUrls
        //      globalLogMessages

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
        'cb9a9e23-91cd-46e8-817e-3728aae83e79' . '-' .
        '4a3d0bdc-2c55-40b9-a10a-99db52114718' . '-' .
        '71ee1809-b1d2-46ec-bac1-9f32b245f7eb' . '-' .
        '28736844-8353-11e4-ad3a-e3781e5d46b0'
        ;

    // -------------------------------------------------------------------------

    $basepress_dataset_handle = array(
        'nice_name'     =>  'adSwapper_byFernTec_adsOutgoing'       ,
        'unique_key'    =>  $basepress_dataset_uid                  ,
        'version'       =>  '0.1'
        ) ;

    // =========================================================================
    // Support...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/ad-swapper-ads-outgoing-resources.php' ) ;

    // =========================================================================
    // Record Structure...
    // =========================================================================

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
            'slug'                      =>  'local_key'                 ,
            'array_storage_value_from'  =>  array(
                                                'add'   =>  array(
                                                                'method'    =>  'from-default-record'       ,
                                                                'instance'  =>  'local_key'
                                                                )   ,
                                                'edit'  =>  array(
                                                                'method'    =>  'dont-change'
                                                                )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'global_sid'                ,
            'array_storage_value_from'  =>  array(
//                                              'add'   =>  array(
//                                                              'method'    =>  'from-default-record'       ,
//                                                              'instance'  =>  'global_sid'
//                                                              )   ,
//                                              'edit'  =>  array(
//                                                              'method'    =>  'dont-change'
//                                                              )
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'maintained-programatically'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'special_type'                  ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'special_type'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  "" or "banner"

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'image_url'                 ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'image_url'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'link_url'                 ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'link_url'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'alt_text'              ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'alt_text'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'description'               ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'description'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'start_datetime'        ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'              ,
                                                                    'instance'  =>  'start_datetime'
                                                                    )
                                                )   ,
            'constraints'   =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'end_datetime'          ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'              ,
                                                                    'instance'  =>  'end_datetime'
                                                                    )
                                                )   ,
            'constraints'   =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'aspect_ratio_min'      ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'aspect_ratio_min'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'aspect_ratio_max'      ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'aspect_ratio_max'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'sequence_number'               ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'              ,
                                                                    'instance'  =>  'sequence_number'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'question_disabled'          ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'question_disabled'
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

    $focus_field_slug = 'image_url' ;

//  if (    function_exists( '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\\is_export_version_short_slug' )
//          &&
//          \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\is_export_version_short_slug( 'std' )
//      ) {
//      $focus_field_slug = 'original_url' ;
//  }

    // -------------------------------------------------------------------------

    $help_text_image_url = <<<EOT
The URL (usually on your site), where the image is located.&nbsp; If the image
is in your Media Library (which is usually should be), then you can get it's URL
from the "Attachment" &rarr; "URL" field.
EOT;

    // -------------------------------------------------------------------------

    $help_text_link_url = <<<EOT
The URL (usually on your site), where the user should be taken when they click
the ad's image.&nbsp; May be left blank (in which case, clicking the image does
nothing).
EOT;

    // -------------------------------------------------------------------------

    $zebra_form = array(

        'form_specs'    =>  array(
                                'name'                      =>  'add_edit_ad_swapper_ad_outgoing'       ,
                                'method'                    =>  'POST'                                  ,
                                'action'                    =>  ''                                      ,
                                'attributes'                =>  array()                                 ,
                                'clientside_validation'     =>  TRUE
                                )   ,

        'field_specs'   =>  array(

/*



*/

            array(
                'form_field_name'       =>  'question_disabled'     ,
                'zebra_control_type'    =>  'checkbox'              ,
                'label'                 =>  'Disabled ?'            ,
//              'help_text'             =>  '"header", "footer", "sidebar-or-column" or "inline"'       ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array(
//                  'required'  =>  array(
//                                      'error'             ,   // variable to add the error message to
//                                      'Field is required'     // error message if value doesn't validate
//                                      )
                    )
                )   ,

            array(
                'form_field_name'       =>  'image_url'                     ,
                'zebra_control_type'    =>  'text'                          ,
                'label'                 =>  'Image URL'                     ,
                'help_text'             =>  $help_text_image_url            ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )                           ,
                'rules'                 =>  array(
                    'required'  =>  array(
                                        'error'             ,   // variable to add the error message to
                                        'Field is required'     // error message if value doesn't validate
                                        )
                    )
                )   ,

            array(
                'form_field_name'       =>  'link_url'                      ,
                'zebra_control_type'    =>  'text'                          ,
                'label'                 =>  'Link URL'                      ,
                'help_text'             =>  $help_text_link_url             ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )                           ,
                'rules'                 =>  array(
//                  'required'  =>  array(
//                                      'error'             ,   // variable to add the error message to
//                                      'Field is required'     // error message if value doesn't validate
//                                      )
                    )
                )   ,

            array(
                'form_field_name'       =>  'special_type'                                      ,
                'zebra_control_type'    =>  'select'                                            ,
                'label'                 =>  'Special Type'                                      ,
                'help_text'             =>  'Is this a "banner" or other special type ad ?'     ,
                'form_field_value_from' =>  NULL                                                ,
                'attributes'            =>  array()                                             ,
                'rules'                 =>  array(
//                  'required'  =>  array(
//                                      'error'             ,   // variable to add the error message to
//                                      'Field is required'     // error message if value doesn't validate
//                                      )
                    )   ,
                'type_specific_args'    =>  array(
                    'options_getter_function'   =>  array(
                        'function_name' =>  '\\' . __NAMESPACE__ . '\\get_special_type_selector_options'    ,
                        'extra_args'    =>  NULL
                        )
                    )
                )   ,

            array(
                'form_field_name'       =>  'alt_text'                      ,
//              'zebra_control_type'    =>  'text'                          ,
                'zebra_control_type'    =>  'hidden'                        ,
                'label'                 =>  'Alt Text'                      ,
//              'help_text'             =>  'A description of the page/content the teaser points to (eg; <b>copy/paste the first paragraph</b> of the page the teaser points to).'     ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )                           ,
                'rules'                 =>  array(
//                  'required'  =>  array(
//                                      'error'             ,   // variable to add the error message to
//                                      'Field is required'     // error message if value doesn't validate
//                                      )
                    )
                )   ,

            array(
                'form_field_name'       =>  'description'                   ,
                'zebra_control_type'    =>  'hidden'                        ,
//              'label'                 =>  'Description'                   ,
//              'help_text'             =>  'A description of the page/content the teaser points to (eg; <b>copy/paste the first paragraph</b> of the page the teaser points to).'     ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%; height:200px'
                                                )                           ,
                'rules'                 =>  array(
//                  'required'  =>  array(
//                                      'error'             ,   // variable to add the error message to
//                                      'Field is required'     // error message if value doesn't validate
//                                      )
                    )
                )   ,

            array(
                'form_field_name'       =>  'start_datetime'        ,
                'zebra_control_type'    =>  'hidden'                ,
//              'label'                 =>  'Start Date/Time'       ,
//              'help_text'             =>  '"header", "footer", "sidebar-or-column" or "inline"'       ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array(
//                  'required'  =>  array(
//                                      'error'             ,   // variable to add the error message to
//                                      'Field is required'     // error message if value doesn't validate
//                                      )
                    )
                )   ,

            array(
                'form_field_name'       =>  'end_datetime'          ,
                'zebra_control_type'    =>  'hidden'                ,
//              'label'                 =>  'End Date/Time'         ,
//              'help_text'             =>  '"header", "footer", "sidebar-or-column" or "inline"'       ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array(
//                  'required'  =>  array(
//                                      'error'             ,   // variable to add the error message to
//                                      'Field is required'     // error message if value doesn't validate
//                                      )
                    )
                )   ,

            array(
                'form_field_name'       =>  'aspect_ratio_min'      ,
//              'zebra_control_type'    =>  'text'                  ,
                'zebra_control_type'    =>  'hidden'                ,
                'label'                 =>  'Aspect Ratio Min'      ,
//              'help_text'             =>  '"header", "footer", "sidebar-or-column" or "inline"'       ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array(
//                  'required'  =>  array(
//                                      'error'             ,   // variable to add the error message to
//                                      'Field is required'     // error message if value doesn't validate
//                                      )
                    )
                )   ,

            array(
                'form_field_name'       =>  'aspect_ratio_max'      ,
//              'zebra_control_type'    =>  'text'                  ,
                'zebra_control_type'    =>  'hidden'                ,
                'label'                 =>  'Aspect Ratio Max'      ,
//              'help_text'             =>  '"header", "footer", "sidebar-or-column" or "inline"'       ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array(
//                  'required'  =>  array(
//                                      'error'             ,   // variable to add the error message to
//                                      'Field is required'     // error message if value doesn't validate
//                                      )
                    )
                )   ,

            array(
                'form_field_name'       =>  'sequence_number'       ,
//              'zebra_control_type'    =>  'text'                  ,
                'zebra_control_type'    =>  'hidden'                ,
                'label'                 =>  'Sequence Number'       ,
//              'help_text'             =>  '"header", "footer", "sidebar-or-column" or "inline"'       ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array(
//                  'required'  =>  array(
//                                      'error'             ,   // variable to add the error message to
//                                      'Field is required'     // error message if value doesn't validate
//                                      )
                    )
                )   ,

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

        'focus_field_slug'  =>  $focus_field_slug       ,

        'custom_add_edit_record_page_header_fn' =>  '\\' . __NAMESPACE__ . '\\get_custom_add_edit_record_page_header'   ,

        'validata_record_structure_slug'    =>  'ad-swapper-local-outgoing-ad-submissions'

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

        array(
            'base_slug'                     =>  'question_disabled'     ,
            'label'                         =>  'Disabled ?'            ,
            'question_sortable'             =>  TRUE                    ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'question_disabled'
                                                    )   ,
            'display_treatments'            =>  array(
                array(
                    'method'    =>  'yes-no'        ,
                    'args'      =>  array(
                                        'custom_conversions'    =>  array(
                                            'TRUE'  =>  '<span style="color:#AA0000">YES</span>'                    ,
                                            'FALSE' =>  '<span style="color:#008000">no</span>'
                                            )
                                        )
                    )
                )
            )   ,

        array(
            'base_slug'                     =>  'image_url'             ,
            'label'                         =>  'Image'                 ,
            'question_sortable'             =>  TRUE                    ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'image_url'
                                                    )   ,
            'display_treatments'            =>  array(
                                                    array(
                                                        'method'    =>  'image'     ,
                                                        'args'      =>  array(
                                                                            'style' =>  'max-width:100px'
                                                                            )
                                                        )
                                                    )
            )   ,

        array(
            'base_slug'                     =>  'link_url'              ,
            'label'                         =>  'Links To'              ,
            'question_sortable'             =>  TRUE                    ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'link_url'
                                                    )   ,
            'display_treatments'            =>  array(
                array(
                    'method'    =>  'to-clickable-url'      ,
                    'args'      =>  array(
//                                      'text'          =>  "Xxx"
                                            //  (Optional; if not specified the field value is used)
//                                      'url'           =>  "xxx"
                                            //  (Optional; if not specified the field value is used)
                                        'attributes'    =>  array(
                                                                //  Eg;
                                                                'target'    =>  '_blank'                    ,
//                                                              'class'     =>  "xxx"                       ,
                                                                'style'     =>  'text-decoration:none'
                                                                )
                                            //  Optional
                                        )
                    )
                )
            )   ,

        array(
            'base_slug'                     =>  'special_type'              ,
            'label'                         =>  'Special Type'              ,
            'question_sortable'             =>  TRUE                        ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'special_type'
                                                    )   ,
            'display_treatments'            =>  NULL
            )   ,

        array(
            'base_slug'                     =>  'width_x_height'            ,
            'label'                         =>  'Actual Width x Height'     ,
            'question_sortable'             =>  TRUE                        ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'custom-function'                                               ,
                                                    'instance'  =>  '\\' . __NAMESPACE__ . '\\get_width_x_height_column_value'      ,
                                                    'args'      =>  array()
                                                    )   ,
            'display_treatments'            =>  NULL
            )   ,

//      array(
//          'base_slug'                     =>  'description'           ,
//          'label'                         =>  'Description'           ,
//          'question_sortable'             =>  TRUE                    ,
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'  ,
//                                                  'instance'  =>  'description'
//                                                  )   ,
//          'display_treatments'            =>  NULL
//          )   ,

//      array(
//          'base_slug'                     =>  'start_datetime'        ,
//          'label'                         =>  'Start Date/Time'       ,
//          'question_sortable'             =>  TRUE                    ,
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'  ,
//                                                  'instance'  =>  'start_datetime'
//                                                  )   ,
//          'display_treatments'            =>  NULL
//          )   ,
//
//      array(
//          'base_slug'                     =>  'end_datetime'          ,
//          'label'                         =>  'End Date/Time'         ,
//          'question_sortable'             =>  TRUE                    ,
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'  ,
//                                                  'instance'  =>  'end_datetime'
//                                                  )   ,
//          'display_treatments'            =>  NULL
//          )   ,

//      array(
//          'base_slug'                     =>  'aspect_ratio_min'      ,
//          'label'                         =>  'Aspect Ratio Min'      ,
//          'question_sortable'             =>  TRUE                    ,
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'  ,
//                                                  'instance'  =>  'aspect_ratio_min'
//                                                  )   ,
//          'display_treatments'            =>  NULL
//          )   ,
//
//      array(
//          'base_slug'                     =>  'aspect_ratio_max'      ,
//          'label'                         =>  'Aspect Ratio Max'      ,
//          'question_sortable'             =>  TRUE                    ,
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'  ,
//                                                  'instance'  =>  'aspect_ratio_max'
//                                                  )   ,
//          'display_treatments'            =>  NULL
//          )   ,

//      array(
//          'base_slug'                     =>  'sequence_number'       ,
//          'label'                         =>  'Sequence Number'       ,
//          'question_sortable'             =>  TRUE                    ,
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'  ,
//                                                  'instance'  =>  'sequence_number'
//                                                  )   ,
//          'display_treatments'            =>  NULL
//          )   ,

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

        ) ;

    // -------------------------------------------------------------------------
    // The Complete "Dataset Records Table" Definition...
    // -------------------------------------------------------------------------

//      'data_field_defs'                       =>  array(...) OR array()/NULL (means default to columns suggested by dataset records)

//      'default_data_field_slug_to_orderby'    =>  'sequence_number'                           ,

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
        'default_data_field_slug_to_orderby'    =>  'image_url'                                 ,
        'default_order'                         =>  'asc'                                       ,
        'buttons'                               =>  array(
                                                        array(
                                                            'type'  =>  'add_record'
                                                            )
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
                                                            'link_title'    =>  'edit'
                                                            )   ,
                                                        array(
                                                            'type'          =>  'standard'      ,
                                                            'slug'          =>  'delete'        ,
                                                            'link_title'    =>  'delete'
                                                            )   ,
//                                                      array(
//                                                          'type'          =>  'custom'        ,
//                                                          'slug'          =>  'post-teaser'   ,
//                                                          'link_title'    =>  'post'
//                                                          )
                                                        )   ,
        'action_separator'                      =>  ' &nbsp;&nbsp; '        ,

        'custom_page_header_function'           =>
            '\\' . __NAMESPACE__ . '\\get_dataset_records_table_custom_page_header_html'

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

    require_once( dirname( __FILE__ ) . '/outgoing-ads-get-new-field-value-functions.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAdsOutgoing\
    // get_new_field_value_functions_array()
    // - - - - - - - - - - - - - - - - - - -
    // Returns the array value for the "Ad Swapper Ads Outgoing" dataset's
    //      "get_new_field_value_functions"
    //
    // field.
    // -------------------------------------------------------------------------

    $dataset_details = array(
        'dataset_slug'                      =>  'ad_swapper_ads_outgoing'           ,
        'dataset_name_singular'             =>  'ad_swapper_ads_outgoing'           ,
        'dataset_name_plural'               =>  'ad_swapper_ads_outgoing'           ,
        'dataset_title_singular'            =>  'Outgoing Ad'                       ,
        'dataset_title_plural'              =>  'Outgoing Ads'                      ,
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

        'default_record_functions_namespace_name'           =>  __NAMESPACE__       ,
            //  If specified, it's an error unless this namespace contains a
            //  "get_default_record_data()" function

        'get_new_field_value_functions'     =>  get_new_field_value_functions_array()

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

