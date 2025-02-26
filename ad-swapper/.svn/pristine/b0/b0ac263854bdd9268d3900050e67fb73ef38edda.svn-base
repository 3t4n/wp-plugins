<?php

// *****************************************************************************
// AD-SWAPPER.APP / AD-SWAPPER-AD-SLOTS.DD.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAdSlots ;
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
        '7eb2323e-6d29-11e4-92a6-5bc71d5d46b0' . '-' .
        '48238845-6693-406f-b77b-c2df88657e71' . '-' .
        '8a362bbb-aef3-4806-be1a-6a8d8229dc9a' . '-' .
        'da172b93-e2d1-4cd0-b987-a1658fdcf9fb'
        ;

    // -------------------------------------------------------------------------

    $basepress_dataset_handle = array(
        'nice_name'     =>  'adSwapper_byFernTec_adSlots'       ,
        'unique_key'    =>  $basepress_dataset_uid              ,
        'version'       =>  '0.1'
        ) ;

    // =========================================================================
    // Support...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/ad-slot-resources.php' ) ;

    require_once( dirname( __FILE__ ) . '/ad-slot-field-groups.php' ) ;

    // -------------------------------------------------------------------------

    $min_width_height = 32   ;
    $max_width_height = 3200 ;

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
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'maintained-programatically'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'name'                  ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'name'
                                                                    )
                                                )   ,
            'constraints'               =>  array(
                array(
                    'method'    =>  'unique'
                    )   ,
                array(
                    'method'    =>  'dashed-name'
                    )
                )
            )   ,
            //  Eg; "header", "footer", "sidebar-or-column", "inline"

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'title'                 ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'title'
                                                                    )
                                                )   ,
            'constraints'               =>  array(
                array(
                    'method'    =>  'unique'
                    )   ,
                array(
                    'method'    =>  'notags'
                    )
                )
            )   ,
            //  Eg; "Header", "Footer", "Sidebar", "Inline", "Banner", etc

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'description'           ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'description'
                                                                    )
                                                )   ,
            'constraints'   =>  array(
                array(
                    'method'    =>  'notags'
                    )
                )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'type'                  ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'type'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  "fixed-height-banner"
            //  "flexi-height-banner"
            //  "sidebar"
            //  "fixed-row-height-grid"
            //  "newspaper-style-grid"

        // ---------------------------------------------------------------------
        // border_top_px
        // border_bottom_px
        // border_left_px
        // border_right_px
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'border_top_px'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'border_top_px'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'border_bottom_px'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'border_bottom_px'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'border_left_px'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'border_left_px'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'border_right_px'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'border_right_px'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------
        // border_colour_top
        // border_colour_bottom
        // border_colour_left
        // border_colour_right
        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'border_colour_top'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'border_colour_top'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'border_colour_bottom'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'border_colour_bottom'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'border_colour_left'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'border_colour_left'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'border_colour_right'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'border_colour_right'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        ) ;

    // -------------------------------------------------------------------------

    require( dirname( __FILE__ ) . '/fixed-height-banner/dataset-fields.php' ) ;

    $array_storage_record_structure = array_merge(
                                            $array_storage_record_structure     ,
                                            $temp
                                            ) ;

    // -------------------------------------------------------------------------

    require( dirname( __FILE__ ) . '/sidebar/dataset-fields.php' ) ;

    $array_storage_record_structure = array_merge(
                                            $array_storage_record_structure     ,
                                            $temp
                                            ) ;

    // -------------------------------------------------------------------------

    require( dirname( __FILE__ ) . '/fixed-row-height-grid/dataset-fields.php' ) ;

    $array_storage_record_structure = array_merge(
                                            $array_storage_record_structure     ,
                                            $temp
                                            ) ;

    // -------------------------------------------------------------------------

    $temp = array(

        // ---------------------------------------------------------------------

/*
        array(
            'slug'                      =>  'width_nominal'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'width_nominal'
                                                                    )
                                                )   ,
            'constraints'               =>  array(
                                                array(
                                                    'method'    =>  'unsigned-integer'      ,
                                                    'args'      =>  array(
                                                        'min'   =>  $min_width_height       ,
                                                        'max'   =>  $max_width_height
                                                        )
                                                    )
                                                )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'width_min'             ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'width_min'
                                                                    )
                                                )   ,
            'constraints'               =>  array(
                                                array(
                                                    'method'    =>  'unsigned-integer'      ,
                                                    'args'      =>  array(
                                                        'min'               =>  $min_width_height       ,
                                                        'max'               =>  $max_width_height       ,
                                                        'question_optional' =>  TRUE
                                                        )
                                                    )
                                                )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'width_max'             ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'width_max'
                                                                    )
                                                )   ,
            'constraints'               =>  array(
                                                array(
                                                    'method'    =>  'unsigned-integer'      ,
                                                    'args'      =>  array(
                                                        'min'               =>  $min_width_height       ,
                                                        'max'               =>  $max_width_height       ,
                                                        'question_optional' =>  TRUE
                                                        )
                                                    )
                                                )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'height_nominal'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'height_nominal'
                                                                    )
                                                )   ,
            'constraints'               =>  array(
                                                array(
                                                    'method'    =>  'unsigned-integer'      ,
                                                    'args'      =>  array(
                                                        'min'   =>  $min_width_height       ,
                                                        'max'   =>  $max_width_height
                                                        )
                                                    )
                                                )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'height_min'             ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'height_min'
                                                                    )
                                                )   ,
            'constraints'               =>  array(
                                                array(
                                                    'method'    =>  'unsigned-integer'      ,
                                                    'args'      =>  array(
                                                        'min'               =>  $min_width_height       ,
                                                        'max'               =>  $max_width_height       ,
                                                        'question_optional' =>  TRUE
                                                        )
                                                    )
                                                )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'height_max'             ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'          ,
                                                                    'instance'  =>  'height_max'
                                                                    )
                                                )   ,
            'constraints'               =>  array(
                                                array(
                                                    'method'    =>  'unsigned-integer'      ,
                                                    'args'      =>  array(
                                                        'min'               =>  $min_width_height       ,
                                                        'max'               =>  $max_width_height       ,
                                                        'question_optional' =>  TRUE
                                                        )
                                                    )
                                                )
            )   ,
*/

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'sequence_number'               ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'              ,
                                                                    'instance'  =>  'sequence_number'
                                                                    )
                                                )   ,
            'constraints'               =>  array(
                                                array(
                                                    'method'    =>  'unsigned-integer'      ,
                                                    'args'      =>  array(
                                                        'min'               =>  0           ,
                                                        'max'               =>  99999       ,
                                                        'question_optional' =>  TRUE
                                                        )
                                                    )
                                                )
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

    // -------------------------------------------------------------------------

    $array_storage_record_structure = array_merge(
                                            $array_storage_record_structure     ,
                                            $temp
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

    $focus_field_slug = 'name' ;

//  if (    function_exists( '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\\is_export_version_short_slug' )
//          &&
//          \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\is_export_version_short_slug( 'std' )
//      ) {
//      $focus_field_slug = 'original_url' ;
//  }

    // -------------------------------------------------------------------------

    $help_text_name = <<<EOT
A name that uniquely identifies this Ad Slot.&nbsp; Lowercase alphanumeric and
dash/minus ("-") characters only.&nbsp; Eg;&nbsp; "header", "footer",
"left-sidebar", "right-sidebar", "sidebar-or-column", "banner", "inline", etc...
EOT;

    // -------------------------------------------------------------------------

    $help_text_title = <<<EOT
A title that uniquely identifies this Ad Slot.&nbsp; Normally, it will be a
"Title Case" version of the "Name" specified above.&nbsp; Eg;&nbsp; "Header",
"Footer", "Left Sidebar", "Right Sidebar", "Sidebar/Column", "Banner", "Inline",
etc...
EOT;

    // -------------------------------------------------------------------------

    $help_text_description = <<<EOT
Optional.&nbsp; A description of this Ad Slot (mainly for the benefit of other
Ad Swappers thinking of placing their ads on your site).
EOT;

    // -------------------------------------------------------------------------

    $must_be_in_the_range = <<<EOT
Must be in the range {$min_width_height} to {$max_width_height} (pixels)
EOT;

    // -------------------------------------------------------------------------

    $help_text_width_nominal = <<<EOT
The normal width of this Ad Slot (in pixels).&nbsp; {$must_be_in_the_range}.
EOT;

    // -------------------------------------------------------------------------

    $help_text_width_min = <<<EOT
The minimum width of ads that go in this Ad Slot (in pixels).&nbsp;
{$must_be_in_the_range}.&nbsp; If NOT specified, defaults to the "Width Nominal"
specified above.
EOT;

    // -------------------------------------------------------------------------

    $help_text_width_max = <<<EOT
The maximum width of ads that go in this Ad Slot (in pixels).&nbsp;
{$must_be_in_the_range}.&nbsp; If NOT specified, defaults to the "Width Nominal"
specified above.
EOT;

    // -------------------------------------------------------------------------

    $help_text_height_nominal = <<<EOT
The normal height of this Ad Slot (in pixels).&nbsp; {$must_be_in_the_range}.
EOT;

    // -------------------------------------------------------------------------

    $help_text_height_min = <<<EOT
The minimum height of ads that go in this Ad Slot (in pixels).&nbsp;
{$must_be_in_the_range}.&nbsp; If NOT specified, defaults to the "Height
Nominal" specified above.
EOT;

    // -------------------------------------------------------------------------

    $help_text_height_max = <<<EOT
The maximum height of ads that go in this Ad Slot (in pixels).&nbsp;
{$must_be_in_the_range}.&nbsp; If NOT specified, defaults to the "Height
Nominal" specified above.
EOT;

    // -------------------------------------------------------------------------

    $help_text_sequence_number = <<<EOT
If you'd like to control the order in which your Ad Slots are listed, enter a
number into this field.&nbsp; Eg; <b>10</b> for the first Ad Slot, <b>20</b> for
the second, and so on...
EOT;

    // -------------------------------------------------------------------------

    $field_specs = array(

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'question_disabled'     ,
                'zebra_control_type'    =>  'checkbox'              ,
                'label'                 =>  'Disabled ?'            ,
                'attributes'            =>  array()                 ,
                'rules'                 =>  array()
                )   ,

            array(
                'form_field_name'       =>  'name'                  ,
                'zebra_control_type'    =>  'text'                  ,
                'label'                 =>  'Name'                  ,
                'help_text'             =>  $help_text_name         ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array(
                    'required'  =>  array(
                                        'error'             ,   // variable to add the error message to
                                        'Field is required'     // error message if value doesn't validate
                                        )
                    )
                )   ,

            array(
                'form_field_name'       =>  'title'                 ,
                'zebra_control_type'    =>  'text'                  ,
                'label'                 =>  'Title'                 ,
                'help_text'             =>  $help_text_title        ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            array(
                'form_field_name'       =>  'description'                   ,
                'zebra_control_type'    =>  'textarea'                      ,
                'label'                 =>  'Description'                   ,
                'help_text'             =>  $help_text_description          ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%; height:200px'
                                                )                           ,
                'rules'                 =>  array()
                )   ,

            array(
                'form_field_name'       =>  'sequence_number'               ,
                'zebra_control_type'    =>  'text'                          ,
                'label'                 =>  'Sequence Number'               ,
                'help_text'             =>  $help_text_sequence_number      ,
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
                'form_field_name'       =>  'type'                          ,
                'zebra_control_type'    =>  'select'                        ,
                'label'                 =>  'Type'                          ,
//              'help_text'             =>  $help_text_description          ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%; height:200px'
                                                )                           ,
                'rules'                 =>  array(
                    'required'  =>  array(
                                        'error'             ,   // variable to add the error message to
                                        'Field is required'     // error message if value doesn't validate
                                        )
                    )   ,
                'type_specific_args'    =>  array(
                    'options_getter_function'   =>  array(
                        'function_name' =>  '\\' . __NAMESPACE__ . '\\get_type_selector_options'    ,
                        'extra_args'    =>  NULL
                        )
                    )
                )   ,

            // -----------------------------------------------------------------
            // border_top_px
            // border_bottom_px
            // border_left_px
            // border_right_px
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'border_top_px'        ,
                'zebra_control_type'    =>  'text'                              ,
                'label'                 =>  'Top Border Width (px)'             ,
                'help_text'             =>  '(optional - default = 0)'          ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'border_bottom_px'     ,
                'zebra_control_type'    =>  'text'                              ,
                'label'                 =>  'Bottom Border Width (px)'          ,
                'help_text'             =>  '(optional - default = 0)'          ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'border_left_px'       ,
                'zebra_control_type'    =>  'text'                              ,
                'label'                 =>  'Left Border Width (px)'            ,
                'help_text'             =>  '(optional - default = 0)'          ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'border_right_px'      ,
                'zebra_control_type'    =>  'text'                              ,
                'label'                 =>  'Right Border Width (px)'           ,
                'help_text'             =>  '(optional - default = 0)'          ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------
            // border_colour_top
            // border_colour_bottom
            // border_colour_left
            // border_colour_right
            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'border_colour_top'        ,
                'zebra_control_type'    =>  'text'                                  ,
                'label'                 =>  'Top Border Colour (#123ABC)'           ,
                'help_text'             =>  '(optional - default = transparent)'    ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'border_colour_bottom'     ,
                'zebra_control_type'    =>  'text'                                  ,
                'label'                 =>  'Bottom Border Colour (#123ABC)'        ,
                'help_text'             =>  '(optional - default = transparent)'    ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'border_colour_left'       ,
                'zebra_control_type'    =>  'text'                                  ,
                'label'                 =>  'Left Border Colour (#123ABC)'          ,
                'help_text'             =>  '(optional - default = transparent)'    ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'border_colour_right'   ,
                'zebra_control_type'    =>  'text'                                      ,
                'label'                 =>  'Right Border Colour (#123ABC)'             ,
                'help_text'             =>  '(optional - default = transparent)'        ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array()
                )

            // -----------------------------------------------------------------

            ) ;

        // --------------------------------------------------------------------

        require( dirname( __FILE__ ) . '/fixed-height-banner/form-fields.php' ) ;

        $field_specs = array_merge( $field_specs , $temp ) ;

        // --------------------------------------------------------------------

        require( dirname( __FILE__ ) . '/sidebar/form-fields.php' ) ;

        $field_specs = array_merge( $field_specs , $temp ) ;

        // --------------------------------------------------------------------

        require( dirname( __FILE__ ) . '/fixed-row-height-grid/form-fields.php' ) ;

        $field_specs = array_merge( $field_specs , $temp ) ;

        // --------------------------------------------------------------------

    $temp = array(

            // -----------------------------------------------------------------

/*
            array(
                'form_field_name'       =>  'width_nominal'                     ,
                'zebra_control_type'    =>  'text'                              ,
                'label'                 =>  'Width Nominal'                     ,
                'help_text'             =>  $help_text_width_nominal            ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array(
                    'required'  =>  array(
                                        'error'             ,   // variable to add the error message to
                                        'Field is required'     // error message if value doesn't validate
                                        )
                    )
                )   ,

            array(
                'form_field_name'       =>  'width_min'                     ,
                'zebra_control_type'    =>  'text'                          ,
                'label'                 =>  'Width Min'                     ,
                'help_text'             =>  $help_text_width_min            ,
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
                'form_field_name'       =>  'width_max'             ,
                'zebra_control_type'    =>  'text'                  ,
                'label'                 =>  'Width Max'             ,
                'help_text'             =>  $help_text_width_max    ,
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
                'form_field_name'       =>  'height_nominal'                ,
                'zebra_control_type'    =>  'text'                          ,
                'label'                 =>  'Height Nominal'                ,
                'help_text'             =>  $help_text_height_nominal       ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%'
                                                )               ,
                'rules'                 =>  array(
                    'required'  =>  array(
                                        'error'             ,   // variable to add the error message to
                                        'Field is required'     // error message if value doesn't validate
                                        )
                    )
                )   ,

            array(
                'form_field_name'       =>  'height_min'                ,
                'zebra_control_type'    =>  'text'                      ,
                'label'                 =>  'Height Min'                ,
                'help_text'             =>  $help_text_height_min       ,
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
                'form_field_name'       =>  'height_max'                ,
                'zebra_control_type'    =>  'text'                      ,
                'label'                 =>  'Height Max'                ,
                'help_text'             =>  $help_text_height_max       ,
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
*/

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

            ) ;

        // ---------------------------------------------------------------------

        $field_specs = array_merge( $field_specs , $temp ) ;

    // -------------------------------------------------------------------------

    $zebra_form = array(

        'form_specs'        =>  array(
                                    'name'                      =>  'add_edit_ad_swapper_ad_slots'      ,
                                    'method'                    =>  'POST'                              ,
                                    'action'                    =>  ''                                  ,
                                    'attributes'                =>  array()                             ,
                                    'clientside_validation'     =>  TRUE
                                    )   ,

        'field_specs'       =>  $field_specs    ,

        'focus_field_slug'  =>  $focus_field_slug           ,

        'custom_add_edit_record_page_header_fn'
                            =>  '\\' . __NAMESPACE__ . '\\get_custom_add_edit_record_page_header'   ,

        'field_groups'      =>  get_ad_slot_field_groups()      ,

        'validata_record_structure_slug'    =>  'ad-swapper-local-ad-slot-submissions'

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
            'base_slug'                     =>  'name_slash_title'      ,
            'label'                         =>  'Title (Name)'          ,
            'question_sortable'             =>  TRUE                    ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'custom-function'                                               ,
                                                    'instance'  =>  '\\' . __NAMESPACE__ . '\\get_name_slash_title_column_value'    ,
                                                    'args'      =>  array()
                                                    )   ,
            'display_treatments'            =>  NULL
            )   ,

//      array(
//          'base_slug'                     =>  'title'                 ,
//          'label'                         =>  'Title'                 ,
//          'question_sortable'             =>  TRUE                    ,
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'  ,
//                                                  'instance'  =>  'title'
//                                                  )   ,
//          'display_treatments'            =>  NULL
//          )   ,

        array(
            'base_slug'                     =>  'description'           ,
            'label'                         =>  'Description'           ,
            'question_sortable'             =>  FALSE                   ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'description'
                                                    )   ,
            'display_treatments'            =>  NULL
            )   ,

//      array(
//          'base_slug'                     =>  'width_nominal_min_max'                     ,
//          'label'                         =>  'Width (in PX)<br />Nominal (Min-Max)'      ,
//          'question_sortable'             =>  FALSE                                       ,
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'custom-function'                                           ,
//                                                  'instance'  =>  '\\' . __NAMESPACE__ . '\\get_width_in_px_column_value'     ,
//                                                  'args'      =>  array()
//                                                  )   ,
//          'display_treatments'            =>  NULL
//          )   ,
//
//      array(
//          'base_slug'                     =>  'height_nominal_min_max'                    ,
//          'label'                         =>  'Height (in PX)<br />Nominal (Min-Max)'     ,
//          'question_sortable'             =>  FALSE                                       ,
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'custom-function'                                           ,
//                                                  'instance'  =>  '\\' . __NAMESPACE__ . '\\get_height_in_px_column_value'    ,
//                                                  'args'      =>  array()
//                                                  )   ,
//          'display_treatments'            =>  NULL
//          )   ,

        array(
            'base_slug'                     =>  'type'                  ,
            'label'                         =>  'Type'                  ,
            'question_sortable'             =>  TRUE                    ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'type'
                                                    )   ,
            'display_treatments'            =>  NULL
            )   ,

        array(
            'base_slug'                     =>  'sequence_number'       ,
            'label'                         =>  'Sequence Number'       ,
            'question_sortable'             =>  TRUE                    ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'sequence_number'
                                                    )   ,
            'display_treatments'            =>  NULL
            )   ,

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
        'default_data_field_slug_to_orderby'    =>  'sequence_number'                           ,
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

    require_once( dirname( __FILE__ ) . '/ad-slot-get-new-field-value-functions.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAdSlots\
    // get_new_field_value_functions_array()
    // - - - - - - - - - - - - - - - - - - -
    // Returns the array value for the "Ad Swapper Ad Slots" dataset's
    //      "get_new_field_value_functions"
    //
    // field.
    // -------------------------------------------------------------------------

    $dataset_details = array(
        'dataset_slug'                      =>  'ad_swapper_ad_slots'               ,
        'dataset_name_singular'             =>  'ad_swapper_ad_slot'                ,
        'dataset_name_plural'               =>  'ad_swapper_ad_slots'               ,
        'dataset_title_singular'            =>  'Ad Slot'                           ,
        'dataset_title_plural'              =>  'Ad Slots'                          ,
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

        'pre_add_routine'       =>  array(
                                        'fn'            =>  '\\' . __NAMESPACE__ . '\\check_before_adding_ad_slot_record'   ,
                                        'extra_args'    =>  array()
                                        )   ,

        'pre_edit_routine'      =>  array(
                                        'fn'            =>  '\\' . __NAMESPACE__ . '\\check_before_editing_ad_slot_record'  ,
                                        'extra_args'    =>  array()
                                        )   ,

//      'pre_delete_routine'    =>  array(
//                                      'fn'            =>  'xxx'               ,
//                                      'extra_args'    =>  array()
//                                      )   ,
//
//      'post_add_routine'      =>  array(
//                                      'fn'            =>  '\\' . __NAMESPACE__ . '\\post_add_matching_site_record'    ,
//                                      'extra_args'    =>  array()
//                                      )   ,
//
//      'post_edit_routine'     =>  array(
//                                      'fn'            =>  'xxx'           ,
//                                      'extra_args'    =>  array()
//                                      )   ,
//
//      'post_delete_routine'   =>  array(
//                                      'fn'            =>  'xxx'               ,
//                                      'extra_args'    =>  array()
//                                      )

        'default_record_functions_namespace_name'           =>  __NAMESPACE__   ,
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

