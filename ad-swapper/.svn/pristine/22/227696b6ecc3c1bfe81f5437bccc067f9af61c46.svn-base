<?php

// *****************************************************************************
// AD-SWAPPER.APP / AD-SWAPPER-AVAILABLE-SELECTED-AND-APPROVED-WEB-SITE-COLLECTIONS.DD.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableSelectedAndApprovedWebSiteCollections ;
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
        'be5c7341-c853-4fe8-9cb1-ae309bd3c0a8' . '-' .
        '3fc31e7b-3d92-4ace-9bec-4a7a0d7b686b' . '-' .
        '0e13bc3a-00e5-40b9-9e68-3b01a9078ec8' . '-' .
        '793d82c5-b8eb-4135-8b49-16cbd4cd42dc'
        ;

    // -------------------------------------------------------------------------

    $basepress_dataset_handle = array(
        'nice_name'     =>  'adSwapper_byFernTec_availableSelectedAndApprovedWebSiteCollections'    ,
        'unique_key'    =>  $basepress_dataset_uid                                                  ,
        'version'       =>  '0.1'
        ) ;

    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_available_selected_and_approved_web_site_collections' ;

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

//  require_once( dirname( __FILE__ ) . '/available-site-resources.php' ) ;

    require_once( dirname( __FILE__ ) . '/available-selected-approved-web-site-collection-resources.php' ) ;

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

    $collection_local_unique_key_options = array(
    	'number_groups'		    =>	4		,
    	'chars_per_group'	    =>	4       ,
    	'group_separator'	    =>	'-'	    ,
    	'lowercase_only'	    =>	TRUE    ,
        'question_punctuation'  =>  FALSE
        ) ;

    // -------------------------------------------------------------------------

    $collection_global_unique_key_options = array(
    	'number_groups'		    =>	8		,
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
            'slug'                      =>  'site_unique_key'           ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'site_unique_key'
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
            //  that uniquely identifies the site this collection belongs to.

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'local_unique_key'          ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'local_unique_key'
                                                                    )
                                                )   ,
            'constraints'   =>  array(
                                    array(
                                        'method'    =>  'grouped-random-password'               ,
                                        'args'      =>  $collection_local_unique_key_options
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
            //  that uniquely identifies this collection (but only on this
            //  local site).

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'global_unique_key'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'global_unique_key'
                                                                    )
                                                )   ,
            'constraints'   =>  array(
                                    array(
                                        'method'    =>  'grouped-random-password'               ,
                                        'args'      =>  $collection_global_unique_key_options
                                        )
                                    )
            )   ,
            //  = "<site-unique-key>" . '-' . <local-unique-key>"
            //
            //  Or in other words, a string of the form:-
            //
            //                1         2         3
            //       123456789012345678901234567890123456789
            //      "1234-1234-1234-1234-1234-1234-1234-1234"
            //
            //      "x9v7-7hg7-zdpp-kvm9-9dck-9gn2-cyzn-x3dg"
            //
            //  that uniquely identifies this collection - both locally (on
            //  this site) - and globally.

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'name_slash_title'              ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'              ,
                                                                    'instance'  =>  'name_slash_title'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'description'           ,
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
            'slug'                      =>  'collection_home_page_url'          ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                          ,
                                                                    'instance'  =>  'collection_home_page_url'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'question_moderated'        ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'question_moderated'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  Is this collection moderated?  Ie; Has the collection owner
            //  reserved the right to approve the sites that join?

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'question_selected'          ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'question_selected'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  Has the local (plugin) site owner asked to join this
            //  collection?

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'question_approved'         ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'question_approved'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
            //  Has the collection owner approved that the local (plugin)
            //  site may join?

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'question_member'           ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'question_member'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )
            //  Is the local (plugin) site a member of this collection?
            //
            //  Calculated as follows:-
            //
            //      If collection IS moderated:
            //
            //          If:
            //              o   Local site owner has selected this collection,
            //                  AND;
            //              o   Collection owner has approved that this local
            //                  site may join
            //              TRUE
            //
            //          Otherwise:
            //              FALSE
            //
            //      If collection ISN'T moderated:
            //          TRUE

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

/*
    $help_text_name_slash_title = <<<EOT
<i>Enter a <b>unique</b> name/title for this collection.&nbsp; Note!&nbsp; We
CAN'T check whether any other collection has the same name/title as that you
enter here - until you run &ldquo;<b>Update Central Site</b>&rdquo; (to upload
this collection's details to the Central site).&nbsp; If another collection is
found with the same name when you do this, an error message will be displayed
(and you'll have to come back here to change the name - and then run
&ldquo;Update Central Site&rdquo; again).</i>
EOT;

    // -------------------------------------------------------------------------

    $help_text_description = <<<EOT
<i>Describe this collection in more detail.&nbsp; Eg; the <b>sites</b> in it -
and/or the <b>customers/readers/users</b> that you're trying to attract (to show
your advertising to).&nbsp; This information will be used by other Ad Swappers -
so that they can decide whether or not they want to join (ie; advertise on), the
sites is this collection.</i>
EOT;

    // -------------------------------------------------------------------------

    $help_text_collection_home_page_url = <<<EOT
<i>If you want to create a page - on some site of yours - to <b>describe this
collection in more detail</b> (eg; the sites in it - and/or the customers/users
that you're trying to attract), then enter the URL of that page here.</i>

EOT;
*/

    // -------------------------------------------------------------------------

    $help_text_question_moderated = <<<EOT
<i>If <b>checked</b>, then the Collection owner has the right to select which
sites may join the collection.&nbsp; If <b>unchecked</b>, then this site will
automatically be added to the Collection (once you've "Selected?" it,
below).</i>
EOT;

    // -------------------------------------------------------------------------

    $site_title = \get_bloginfo( 'name' ) ;

    $home_url = \get_home_url() ;

    // -------------------------------------------------------------------------

    $help_text_question_selected = <<<EOT
<i>Check this box if you want to <b>add this site (<a target="_blank"
href="{$home_url}" style="text-decoration:none">"{$site_title}"</a>) to the
collection</b>.<br />

<u>NOTE</u><br />
If you check/uncheck this checkbox, you'll then have to; <b>"Submit"</b> this
form; run <b>"Update Central Site"</b>, and then run <b>"Update Local Site"</b>,
before the changes will take effect.&nbsp; And if the collection is
<b>"moderated"</b>, you'll also have to wait for moderator approval of your
application to join (which may take several days).</i>
EOT;

    // -------------------------------------------------------------------------

    $focus_field_slug = 'question_selected' ;

//  if (    function_exists( '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\\is_export_version_short_slug' )
//          &&
//          \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\is_export_version_short_slug( 'std' )
//      ) {
//      $focus_field_slug = 'original_url' ;
//  }

    // -------------------------------------------------------------------------

    $zebra_form = array(

        'form_specs'    =>  array(
                                'name'                      =>  'add_edit_available_selected_approved_web_site_collection'      ,
                                'method'                    =>  'POST'                                                          ,
                                'action'                    =>  ''                                                              ,
                                'attributes'                =>  array()                                                         ,
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

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'question_selected'                                             ,
                'zebra_control_type'    =>  'checkbox'                                                      ,
                'label'                 =>  'Do You Want This Site To Belong To This Collection&nbsp;?'     ,
                'help_text'             =>  $help_text_question_selected                                    ,
//              'help_text'             =>  array(
//                                              'function'      =>  '\\' . __NAMESPACE__ . '\\get_question_display_ads_help_text'    ,
//                                              'extra_args'    =>  array(
//                                                                      'direction' =>  'theirs-on-yours'
//                                                                      )
//                                              )   ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%; text-align:left'     ,
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
                'form_field_name'       =>  'question_approved'                                                             ,
//              'zebra_control_type'    =>  'checkbox'                                                                      ,
                'zebra_control_type'    =>  'hidden'                                                                        ,
                'label'                 =>  'Has the Collection Owner/Moderator Approved Your Application to Join&nbsp;?'   ,
//              'help_text'             =>  $help_text_question_selected                                                    ,
//              'help_text'             =>  array(
//                                              'function'      =>  '\\' . __NAMESPACE__ . '\\get_question_display_ads_help_text'    ,
//                                              'extra_args'    =>  array(
//                                                                      'direction' =>  'theirs-on-yours'
//                                                                      )
//                                              )   ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%; text-align:left'     ,
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'question_member'                                       ,
//              'zebra_control_type'    =>  'checkbox'                                              ,
                'zebra_control_type'    =>  'hidden'                                                ,
                'label'                 =>  'Are You A Member of This Collection&nbsp;?'            ,
//              'help_text'             =>  $help_text_question_selected                            ,
//              'help_text'             =>  array(
//                                              'function'      =>  '\\' . __NAMESPACE__ . '\\get_question_display_ads_help_text'    ,
//                                              'extra_args'    =>  array(
//                                                                      'direction' =>  'theirs-on-yours'
//                                                                      )
//                                              )   ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%; text-align:left'     ,
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'name_slash_title'              ,
                'zebra_control_type'    =>  'text'                          ,
                'label'                 =>  'Title'                         ,
//              'help_text'             =>  $help_text_name_slash_title     ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'     ,
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
                'form_field_name'       =>  'description'                   ,
                'zebra_control_type'    =>  'textarea'                      ,
                'label'                 =>  'Description'                   ,
//              'help_text'             =>  $help_text_description          ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%; height:200px'       ,
                                                'readonly'  =>  'readonly'
                                                )                           ,
                'rules'                 =>  array(
//                  'required'  =>  array(
//                                      'error'             ,   // variable to add the error message to
//                                      'Field is required'     // error message if value doesn't validate
//                                      )
                    )
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'collection_home_page_url'              ,
                'zebra_control_type'    =>  'text'                                  ,
                'label'                 =>  'Collection Home Page URL'              ,
//              'help_text'             =>  $help_text_collection_home_page_url     ,
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
                'form_field_name'       =>  'question_moderated'                                                            ,
                'zebra_control_type'    =>  'checkbox'                                                                      ,
                'label'                 =>  'Moderated?'                                                                    ,
                'help_text'             =>  $help_text_question_moderated                                                   ,
//              'help_text'             =>  array(
//                                              'function'      =>  '\\' . __NAMESPACE__ . '\\get_question_display_ads_help_text'    ,
//                                              'extra_args'    =>  array(
//                                                                      'direction' =>  'theirs-on-yours'
//                                                                      )
//                                              )   ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%; text-align:left'     ,
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
                'form_field_name'       =>  'site_unique_key'               ,
//              'zebra_control_type'    =>  'text'                          ,
                'zebra_control_type'    =>  'hidden'                        ,
                'label'                 =>  'Site Unique Key'               ,
                'help_text'             =>  '' ,    //  $help_text_name_slash_title     ,
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

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'local_unique_key'              ,
//              'zebra_control_type'    =>  'text'                          ,
                'zebra_control_type'    =>  'hidden'                        ,
                'label'                 =>  'Local Unique Key'              ,
                'help_text'             =>  '' ,    //  $help_text_name_slash_title     ,
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

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'global_unique_key'             ,
//              'zebra_control_type'    =>  'text'                          ,
                'zebra_control_type'    =>  'hidden'                        ,
                'label'                 =>  'Global Unique Key'             ,
                'help_text'             =>  '' ,    //  $help_text_name_slash_title     ,
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

        'validata_record_structure_slug'    =>  'ad-swapper-local-available-selected-approved-web-site-collection-submissions'

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

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'name_slash_title'      ,
            'label'                         =>  'Title'                 ,
            'question_sortable'             =>  TRUE                    ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'name_slash_title'
                                                    )   ,
            'display_treatments'            =>  array(
                                                    array(
                                                        'method'    =>  'bold'
                                                        )
                                                    )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'description'           ,
            'label'                         =>  'Description'           ,
            'question_sortable'             =>  FALSE                   ,
            'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'  ,
//                                                  'instance'  =>  'description'
                                                    'method'    =>  'custom-function'                                           ,
                                                    'instance'  =>  '\\' . __NAMESPACE__ . '\\get_description_column_value'     ,
                                                    'args'      =>  array()
                                                    )   ,
            'display_treatments'            =>  array(
//              array(
//                  'method'        =>  'max-words'     ,
//                  'max_words'     =>  16
//                  )
                )
            )   ,

        // ---------------------------------------------------------------------

//      array(
//          'base_slug'                     =>  'collection_home_page_url'                      ,
//          'label'                         =>  'Home Page URL (For Extended Description)'      ,
//          'question_sortable'             =>  TRUE                                            ,
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'  ,
//                                                  'instance'  =>  'collection_home_page_url'
//                                                  )   ,
//          'display_treatments'            =>  array(
//                                                  array(
//                                                      'method'    =>  'to-clickable-url'
//                                                      )
//                                                  )
//          )   ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'question_member'                                       ,
            'label'                         =>  'Are You A MEMBER Of This Collection&nbsp;?'       ,
            'question_sortable'             =>  TRUE                                                    ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'      ,
                                                    'instance'  =>  'question_member'
                                                    )   ,
            'display_treatments'            =>  array(
                array(
                    'method'    =>  'yes-no'        ,
                    'args'      =>  array(
                                        'custom_conversions'    =>  array(
                                            'TRUE'  =>  '<span style="color:#008000">YES</span>'                    ,
                                            'FALSE' =>  '<span style="color:#AA0000">no</span>'
                                            )
                                        )
                    )
                )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'question_selected'                             ,
            'label'                         =>  'Have You APPLIED To Join&nbsp;?'               ,
            'question_sortable'             =>  TRUE                                            ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'      ,
                                                    'instance'  =>  'question_selected'
                                                    )   ,
            'display_treatments'            =>  array(
                array(
                    'method'    =>  'yes-no'        ,
                    'args'      =>  array(
                                        'custom_conversions'    =>  array(
                                            'TRUE'  =>  '<span style="color:#008000">YES</span>'                    ,
                                            'FALSE' =>  '<span style="color:#AA0000">no</span>'
                                            )
                                        )
                    )
                )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'question_moderated'                                            ,
            'label'                         =>  'Collection Owner Must APPROVE The Sites That Join&nbsp;?'      ,
            'question_sortable'             =>  TRUE                                                            ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'      ,
                                                    'instance'  =>  'question_moderated'
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

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'question_approved'                             ,
            'label'                         =>  'Have You Been APPROVED&nbsp;?'                 ,
            'question_sortable'             =>  TRUE                                            ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'      ,
                                                    'instance'  =>  'question_approved'
//                                                  'method'    =>  'custom-function'                                           ,
//                                                  'instance'  =>  '\\' . __NAMESPACE__ . '\\get_account_name_column_value'    ,
//                                                  'args'      =>  array()
                                                    )   ,
            'display_treatments'            =>  array(
                array(
                    'method'    =>  'yes-no'        ,
                    'args'      =>  array(
                                        'custom_conversions'    =>  array(
                                            'TRUE'  =>  '<span style="color:#008000">YES</span>'                    ,
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
        'default_data_field_slug_to_orderby'    =>  'name_slash_title'                          ,
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
                                                            'link_title'    =>  'view/join/leave'
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
        'dataset_slug'                      =>  'ad_swapper_available_selected_and_approved_web_site_collections'   ,
        'dataset_name_singular'             =>  'ad_swapper_available_selected_and_approved_web_site_collection'    ,
        'dataset_name_plural'               =>  'ad_swapper_available_selected_and_approved_web_site_collections'   ,
        'dataset_title_singular'            =>  'Available and Possibly Selected/Approved Web Site Collection'      ,
        'dataset_title_plural'              =>  'Available and Possibly Selected/Approved Web Site Collections'     ,
        'basepress_dataset_handle'          =>  $basepress_dataset_handle                                           ,
        'dataset_records_table'             =>  $dataset_records_table                                              ,
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

//      'default_record_functions_namespace_name'   =>  __NAMESPACE__

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

