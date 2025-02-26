<?php

// *****************************************************************************
// AD-SWAPPER.APP / AD-SWAPPER-PLUGIN-SETTINGS.DD.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperPluginSettings ;
        //  NOTE!
        //  -----
        //  The dataset name/slug should be camel cased.  Eg:-
        //      projects
        //      referenceUrls
        //      globalLogMessages

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
    // Define this dataset's BASEPRESS DATASET HANDLE...
    // =========================================================================

    $basepress_dataset_uid =
        'fda2aedc-ed9e-442c-aee3-fdabccb1e9cf' . '-' .
        '3a68caba-439e-46cc-b990-3eef21f18dfc' . '-' .
        'b31338a6-8ed8-4aa0-9795-6de4533d0711' . '-' .
        'cf8b1d85-91ec-494d-b820-2b965bf8e01e'
        ;

    // -------------------------------------------------------------------------

    $basepress_dataset_handle = array(
        'nice_name'     =>  'adSwapper_byFernTec_pluginSettings'        ,
        'unique_key'    =>  $basepress_dataset_uid                      ,
        'version'       =>  '0.1'
        ) ;

    // =========================================================================
    // Support...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/plugin-settings-resources.php' ) ;

    require_once( dirname( __FILE__ ) . '/plugin-setting-field-groups.php' ) ;

    // =========================================================================
    // Record Structure...
    // =========================================================================

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
            'slug'                      =>  'ad_swapper_user_sid'           ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'ad_swapper_user_sid'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  Eg;     "a1px-kq95-7yx3-hw3t-ah5k-w3np"

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'ad_swapper_site_sid'       ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'ad_swapper_site_sid'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'site_unique_key'           ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'site_unique_key'
                                                                    )
                                                )           ,
            'constraints'   =>  array(
                                    array(
                                        'method'    =>  'grouped-random-password'       ,
                                        'args'      =>  $site_unique_key_options
                                        )
                                    )                       ,
            'mysql_column_attributes'   =>  array(
                'Type'      =>  'TINYTEXT'      ,
                'Key'       =>  'UNI'
                )                                           ,
            'mysql_column_attribute_extras' =>  array(
                'max_key_length'    =>  19
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
            //  that uniquely identifies this site.
            //
            //  Created at and copied from Ad Swapper Central.

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'site_registration_key'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                      ,
                                                                    'instance'  =>  'site_registration_key'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'api_public_encryption_key'     ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                          ,
                                                                    'instance'  =>  'api_public_encryption_key'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'api_mcryption_key'     ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'api_mcryption_key'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'api_url_override'          ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'              ,
                                                                    'instance'  =>  'api_url_override'
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

    $focus_field_slug = 'wp_home_url' ;

//  if (    function_exists( '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\\is_export_version_short_slug' )
//          &&
//          \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\is_export_version_short_slug( 'std' )
//      ) {
//      $focus_field_slug = 'original_url' ;
//  }

    // -------------------------------------------------------------------------

    $help_text_wp_home_url = <<<EOT
Please <b>copy/paste</b> this field <span
style="background-color:#FFFF80">&nbsp;TO&nbsp;</span> <b>Add (Edit) Site
Registration</b> &rarr; <b>WP Home URL</b> (for this site on Ad Swapper <span
style="background-color:#FFFF80">&nbsp;Central&nbsp;</span>).

<hr style="margin:0.2em 0" />

<i>NOTE!&nbsp; This field has been copied from WordPress "Settings" &rarr;
"General" &rarr; "Site Address (URL)".&nbsp; You can set/change it there.</i>
EOT;

    // -------------------------------------------------------------------------

    $help_text_wp_site_url = <<<EOT
Please <b>copy/paste</b> this field <span
style="background-color:#FFFF80">&nbsp;TO&nbsp;</span> <b>Add (Edit) Site
Registration</b> &rarr; <b>WP Site URL</b> (for this site on Ad Swapper <span
style="background-color:#FFFF80">&nbsp;Central&nbsp;</span>).

<hr style="margin:0.2em 0" />

<i>NOTE!&nbsp; This field has been copied from WordPress "Settings" &rarr;
"General" &rarr; "WordPress Address (URL)".&nbsp; You can set/change it
there.</i>
EOT;

    // -------------------------------------------------------------------------

    $help_text_site_registration_key = <<<EOT
Please <b>copy/paste</b> this field <span
style="background-color:#FFFF80">&nbsp;TO&nbsp;</span> <b>Add (Edit) Site
Registration</b> &rarr; <b>Site Registration Key</b> (for this site on Ad
Swapper <span style="background-color:#FFFF80">&nbsp;Central&nbsp;</span>).

<hr style="margin:0.2em 0" />

<i>NOTE!&nbsp; This field has been auto-generated for you.&nbsp; You CAN'T
change it.</i>
EOT;

    // -------------------------------------------------------------------------

    $help_text_ad_swapper_user_sid = <<<EOT
Please <b>copy/paste</b> this <span
style="background-color:#FFFF80">&nbsp;FROM&nbsp;</span> <b>Add (Edit) Site
Registration</b> &rarr; <b>Ad Swapper Account ID</b> (for this site on Ad
Swapper <span style="background-color:#FFFF80">&nbsp;Central&nbsp;</span>).
EOT;

    // -------------------------------------------------------------------------

//      $help_text_api_public_encryption_key = <<<EOT
//  Please <b>copy/paste</b> this <span
//  style="background-color:#FFFF80">&nbsp;FROM&nbsp;</span> <b>Add (Edit) Site
//  Registration</b> &rarr; <b>API Public Encryption Key</b> (for this site on Ad
//  Swapper <span style="background-color:#FFFF80">&nbsp;Central&nbsp;</span>).
//  EOT;

    // -------------------------------------------------------------------------

    $help_text_api_mcryption_key = <<<EOT
Please <b>copy/paste</b> this <span
style="background-color:#FFFF80">&nbsp;FROM&nbsp;</span> <b>Add (Edit) Site
Registration</b> &rarr; <b>API Encryption/Decryption Key</b> (for this site on
Ad Swapper <span style="background-color:#FFFF80">&nbsp;Central&nbsp;</span>).
EOT;

    // -------------------------------------------------------------------------

    $help_text_ad_swapper_site_sid = <<<EOT
Please <b>copy/paste</b> this <span
style="background-color:#FFFF80">&nbsp;FROM&nbsp;</span> <b>Add (Edit) Site
Registration</b> &rarr; <b>Ad Swapper Site ID</b> (for this site on Ad Swapper
<span style="background-color:#FFFF80">&nbsp;Central&nbsp;</span>).
EOT;

    // -------------------------------------------------------------------------

    $help_text_site_unique_key = <<<EOT
Please <b>copy/paste</b> this <span
style="background-color:#FFFF80">&nbsp;FROM&nbsp;</span> <b>Add (Edit) Site
Registration</b> &rarr; <b>Site Unique Key</b> (for this site on Ad Swapper
<span style="background-color:#FFFF80">&nbsp;Central&nbsp;</span>).
EOT;

    // -------------------------------------------------------------------------

    $help_text_api_url_override = <<<EOT
This field should <b>normally be left EMPTY.</b>&nbsp; Only fill it if you
want/need to override the URL to which Ad Swapper API calls are made.&nbsp; And
you should NEVER do this unless you know what you're doing (and are aware of the
<b>security risks</b>).&nbsp; Or WE (Ad Swapper) tell you to.
EOT;

    // -------------------------------------------------------------------------

//  $bg = '#FFF8DC' ;       //  Cornsilk
//  $bg = '#FFFBED' ;       //  Cornsilk lightened a bit
//  $bg = '#FFF1F8' ;       //  Deep Pink 1 lightened a bit
//  $bg = '#E9F6FE' ;       //  Light Sky Blue lightened a bit
//  $bg = '#166354' ;       //  Cyan darkened
    $bg = '#25A890' ;       //  Cyan darkened

    // -------------------------------------------------------------------------

    $input_style_text = <<<EOT
width:98%; background-color:{$bg}; color:#FFFFFF; background-image:none; font-size:106%
EOT;

    $input_style_textarea = <<<EOT
{$input_style_text}; height:200px
EOT;

    // -------------------------------------------------------------------------

    $zebra_form = array(

        'form_specs'    =>  array(
                                'name'                      =>  'add_edit_ad_swapper_plugin_settings'   ,
                                'method'                    =>  'POST'                                  ,
                                'action'                    =>  ''                                      ,
                                'attributes'                =>  array()                                 ,
                                'clientside_validation'     =>  TRUE
                                )   ,

        'field_specs'   =>  array(

/*



*/

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'wp_home_url'                   ,
                'zebra_control_type'    =>  'text'                          ,
                'label'                 =>  'WP Home URL'                   ,
                'help_text'             =>  $help_text_wp_home_url          ,
                'form_field_value_from' => Array(
                    'add'   =>  array(
                                    'method'    =>  'function'                                      ,
                                    'instance'  =>  array(
                                        'function_name' =>  '\\' . __NAMESPACE__ . '\\get_wp_home_url'      ,
                                        'extra_args'    =>  array()
                                        )
                                    )   ,
                    'edit'  =>  array(
                                    'method'    =>  'function'                                      ,
                                    'instance'  =>  array(
                                        'function_name' =>  '\\' . __NAMESPACE__ . '\\get_wp_home_url'      ,
                                        'extra_args'    =>  array()
                                        )
                                    )
                    )   ,
                'attributes'            =>  array(
                                                'style'     =>  $input_style_text   ,
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
                'form_field_name'       =>  'wp_site_url'                   ,
                'zebra_control_type'    =>  'text'                          ,
                'label'                 =>  'WP Site URL'                   ,
                'help_text'             =>  $help_text_wp_site_url          ,
                'form_field_value_from' => Array(
                    'add'   =>  array(
                                    'method'    =>  'function'                                      ,
                                    'instance'  =>  array(
                                        'function_name' =>  '\\' . __NAMESPACE__ . '\\get_wp_site_url'      ,
                                        'extra_args'    =>  array()
                                        )
                                    )   ,
                    'edit'  =>  array(
                                    'method'    =>  'function'                                      ,
                                    'instance'  =>  array(
                                        'function_name' =>  '\\' . __NAMESPACE__ . '\\get_wp_site_url'      ,
                                        'extra_args'    =>  array()
                                        )
                                    )
                    )   ,
                'attributes'            =>  array(
                                                'style'     =>  $input_style_text   ,
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
                'form_field_name'       =>  'site_registration_key'                                     ,
                'zebra_control_type'    =>  'textarea'                                                  ,
                'label'                 =>  'Site Registration Key'                                     ,
                'help_text'             =>  $help_text_site_registration_key                            ,
                'attributes'            =>  array(
                                                'style'     =>  $input_style_text . '; height:300px'    ,
                                                'readonly'  =>  'readonly'
                                                )   ,
                'rules'                 =>  array(
//                  'required'  =>  array(
//                                      'error'             ,   // variable to add the error message to
//                                      'Field is required'     // error message if value doesn't validate
//                                      )
                    )
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'ad_swapper_user_sid'           ,
                'zebra_control_type'    =>  'text'                          ,
                'label'                 =>  'Ad Swapper Account ID'         ,
                'help_text'             =>  $help_text_ad_swapper_user_sid  ,
                'attributes'            =>  array(
                                                'style'     =>  $input_style_text
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
                'form_field_name'       =>  'ad_swapper_site_sid'           ,
                'zebra_control_type'    =>  'text'                          ,
                'label'                 =>  'Ad Swapper Site ID'            ,
                'help_text'             =>  $help_text_ad_swapper_site_sid  ,
                'attributes'            =>  array(
                                                'style'     =>  $input_style_text
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
                'form_field_name'       =>  'site_unique_key'               ,
                'zebra_control_type'    =>  'text'                          ,
                'label'                 =>  'Site Unique Key'               ,
                'help_text'             =>  $help_text_site_unique_key      ,
                'attributes'            =>  array(
                                                'style'     =>  $input_style_text
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
                'form_field_name'       =>  'api_public_encryption_key'             ,
//              'zebra_control_type'    =>  'textarea'                              ,
                'zebra_control_type'    =>  'hidden'                                ,
                'label'                 =>  'API Public Encryption Key'             ,
//              'help_text'             =>  $help_text_api_public_encryption_key    ,
                'attributes'            =>  array(
                                                'style'     =>  $input_style_textarea
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
                'form_field_name'       =>  'api_mcryption_key'                 ,
                'zebra_control_type'    =>  'text'                              ,
                'label'                 =>  'API Encryption/Decryption Key'     ,
                'help_text'             =>  $help_text_api_mcryption_key        ,
                'attributes'            =>  array(
                                                'style'     =>  $input_style_text
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
                'form_field_name'       =>  'api_url_override'              ,
                'zebra_control_type'    =>  'text'                          ,
                'label'                 =>  'API URL Override'              ,
                'help_text'             =>  $help_text_api_url_override     ,
                'attributes'            =>  array(
                                                'style'     =>  $input_style_text
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

        'focus_field_slug'  =>  $focus_field_slug           ,

        'custom_add_edit_record_page_header_fn' =>  '\\' . __NAMESPACE__ . '\\get_custom_add_edit_record_page_header'   ,

        'field_groups'  =>  get_plugin_setting_field_groups()       ,

        'validata_record_structure_slug'    =>  'ad-swapper-local-plugin-setting-submissions'

        ) ;

    // =========================================================================
    // Dataset Records Table...
    // =========================================================================

    // -------------------------------------------------------------------------
    // NOT USED !!!
    // -------------------------------------------------------------------------

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
            'base_slug'                     =>  'api_url_override'      ,
            'label'                         =>  'API URL Override'      ,
            'question_sortable'             =>  FALSE                   ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'api_url_override'
                                                    )   ,
            'display_treatments'            =>  NULL
            )   ,

/*
        array(
            'base_slug'                     =>  'original_title'        ,
            'label'                         =>  'Title'                 ,
            'question_sortable'             =>  TRUE                    ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'original_title'
                                                    )   ,
            'display_treatments'            =>  NULL
            )   ,

        array(
            'base_slug'                     =>  'original_clipped_text'     ,
            'label'                         =>  'Clipping'                  ,
            'question_sortable'             =>  FALSE                       ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'original_clipped_text'
                                                    )   ,
            'display_treatments'            =>  array(
                array(
                    'method'    =>  'wrapper'       ,
                    'args'      =>  array(
                                        'before'    =>  '<div style="height:80px; overflow:auto">'      ,
                                        'after'     =>  '</div>'
                                        )
                    )
                )
            )   ,

        array(
            'base_slug'                     =>  'original_media_url'        ,
            'label'                         =>  'Media'                     ,
            'question_sortable'             =>  FALSE                       ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'original_media_url'
                                                    )   ,
            'display_treatments'            =>  array(
                array(
                    'method'    =>  'image'         ,
                    'args'      =>  array(
                                        'style'     =>  'height:80px'       ,
                                        )
                                    )
                    )
            )   ,
*/

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
        'default_data_field_slug_to_orderby'    =>  'ad_swapper_user_id'                        ,
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

    $dataset_details = array(
        'dataset_slug'                      =>  'ad_swapper_plugin_settings'        ,
        'dataset_name_singular'             =>  'ad_swapper_plugin_settings'        ,
        'dataset_name_plural'               =>  'ad_swapper_plugin_settings'        ,
        'dataset_title_singular'            =>  'Plugin Settings'                   ,
        'dataset_title_plural'              =>  'Plugin Settings'                   ,
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

        'max_records'                       =>  1           ,
        'question_single_record_mode'       =>  TRUE        ,

        'default_record_functions_namespace_name'   =>  __NAMESPACE__

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

