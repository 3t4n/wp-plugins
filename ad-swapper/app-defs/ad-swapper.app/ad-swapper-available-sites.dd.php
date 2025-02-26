<?php

// *****************************************************************************
// AD-SWAPPER.APP / AD-SWAPPER-AVAILABLE-SITES.DD.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableSites ;
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
        '37eff6e1-bc70-490d-93e9-b9a585d8d20d' . '-' .
        '2ee42443-d9f7-4bab-aa4a-63919ed23ffc' . '-' .
        '6320145f-3813-4eec-838b-fa0fe91541e0' . '-' .
        'f58c84ec-d167-4d77-9764-cc3f30c9e712'
        ;

    // -------------------------------------------------------------------------

    $basepress_dataset_handle = array(
        'nice_name'     =>  'adSwapper_byFernTec_availableSites'    ,
        'unique_key'    =>  $basepress_dataset_uid                  ,
        'version'       =>  '0.1'
        ) ;

    // -------------------------------------------------------------------------

    $dataset_slug = 'ad_swapper_available_sites' ;

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

    require_once( dirname( __FILE__ ) . '/available-site-resources.php' ) ;

    require_once( dirname( __FILE__ ) . '/available-site-get-new-field-value-functions.php' ) ;

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
            'slug'                      =>  'ad_swapper_site_sid'       ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'ad_swapper_site_sid'
                                                                    )
                                                )   ,
            'constraints'   =>  array()
            )   ,

        // ---------------------------------------------------------------------

//      array(
//          'slug'                      =>  'site_unique_key'           ,
//          'array_storage_value_from'  =>  array(
//                                              'add-edit'  =>  array(
//                                                                  'method'    =>  'post'                  ,
//                                                                  'instance'  =>  'site_unique_key'
//                                                                  )
//                                              )   ,
//          'constraints'   =>  array()
//          )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'site_title'                ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'              ,
                                                                    'instance'  =>  'site_title'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'home_page_url'             ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'              ,
                                                                    'instance'  =>  'home_page_url'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'general_description'       ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                  ,
                                                                    'instance'  =>  'general_description'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'ads_wanted_description'            ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                      ,
                                                                    'instance'  =>  'ads_wanted_description'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'sites_wanted_description'            ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                      ,
                                                                    'instance'  =>  'sites_wanted_description'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'question_trial_mode_site'      ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                      ,
                                                                    'instance'  =>  'question_trial_mode_site'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

//      array(
//          'slug'                      =>  'subscription_type'     ,
//          'array_storage_value_from'  =>  array(
//                                              'add-edit'  =>  array(
//                                                                  'method'    =>  'post'                  ,
//                                                                  'instance'  =>  'subscription_type'
//                                                                  )
//                                              )   ,
//          'constraints'               =>  array()
//          )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'this_site_approves_plugin_site'    ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                              ,
                                                                    'instance'  =>  'this_site_approves_plugin_site'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'this_site_targets_plugin_site'     ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                              ,
                                                                    'instance'  =>  'this_site_targets_plugin_site'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )

        // ---------------------------------------------------------------------

//      array(
//          'slug'                      =>  'categories_available'          ,
//          'array_storage_value_from'  =>  array(
//                                              'add-edit'  =>  array(
//                                                                  'method'    =>  'post'                  ,
//                                                                  'instance'  =>  'categories_available'
//                                                                  )
//                                              )   ,
//          'constraints'               =>  array()
//          )   ,
//
//      // ---------------------------------------------------------------------
//
//      array(
//          'slug'                      =>  'categories_wanted'          ,
//          'array_storage_value_from'  =>  array(
//                                              'add-edit'  =>  array(
//                                                                  'method'    =>  'post'                  ,
//                                                                  'instance'  =>  'categories_wanted'
//                                                                  )
//                                              )   ,
//          'constraints'               =>  array()
//          )

        // ---------------------------------------------------------------------

/*
        array(
            'slug'                      =>  'geoip_continents_incl'     ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                      ,
                                                                    'instance'  =>  'geoip_continents_incl'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'geoip_continents_excl'     ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                      ,
                                                                    'instance'  =>  'geoip_continents_excl'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'geoip_countries_incl'      ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                      ,
                                                                    'instance'  =>  'geoip_countries_incl'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'geoip_countries_excl'      ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                      ,
                                                                    'instance'  =>  'geoip_countries_excl'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'geoip_regions_incl'      ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                      ,
                                                                    'instance'  =>  'geoip_regions_incl'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'geoip_regions_excl'      ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                      ,
                                                                    'instance'  =>  'geoip_regions_excl'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'geoip_cities_incl'      ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                      ,
                                                                    'instance'  =>  'geoip_cities_incl'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'slug'                      =>  'geoip_cities_excl'      ,
            'array_storage_value_from'  =>  array(
                                                'add-edit'  =>  array(
                                                                    'method'    =>  'post'                      ,
                                                                    'instance'  =>  'geoip_cities_excl'
                                                                    )
                                                )   ,
            'constraints'               =>  array()
            )   ,
*/

        // ---------------------------------------------------------------------

//      array(
//          'slug'                      =>  'question_disabled_by_ad_swapper_central'       ,
//          'array_storage_value_from'  =>  array(
//                                              'add-edit'  =>  array(
//                                                                  'method'    =>  'post'                                      ,
//                                                                  'instance'  =>  'question_disabled_by_ad_swapper_central'
//                                                                  )
//                                              )   ,
//          'constraints'               =>  array()
//          )

        // ---------------------------------------------------------------------

//      array(
//          'slug'                      =>  'question_display_this_sites_ads_on_your_site'      ,
//          'array_storage_value_from'  =>  array(
//                                              'add-edit'  =>  array(
//                                                                  'method'    =>  'post'                                          ,
//                                                                  'instance'  =>  'question_display_this_sites_ads_on_your_site'
//                                                                  )
//                                              )   ,
//          'constraints'               =>  array()
//          )   ,
//
//      // ---------------------------------------------------------------------
//
//      array(
//          'slug'                      =>  'question_display_your_ads_on_this_site'        ,
//          'array_storage_value_from'  =>  array(
//                                              'add-edit'  =>  array(
//                                                                  'method'    =>  'post'                                      ,
//                                                                  'instance'  =>  'question_display_your_ads_on_this_site'
//                                                                  )
//                                              )   ,
//          'constraints'               =>  array()
//          )

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
//      '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager' .
//      '\\get_cancel_button_onclick_attribute_value'
        '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableSites' .
        '\\get_cancel_button_onclick_attribute_value_4_available_sites'
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

    $focus_field_slug = 'site_title' ;

//  if (    function_exists( '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\\is_export_version_short_slug' )
//          &&
//          \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\is_export_version_short_slug( 'std' )
//      ) {
//      $focus_field_slug = 'original_url' ;
//  }

    // -------------------------------------------------------------------------

    $zebra_form = array(

        'form_specs'    =>  array(
                                'name'                      =>  'add_edit_ad_swapper_available_site'    ,
                                'method'                    =>  'POST'                                  ,
                                'action'                    =>  ''                                      ,
                                'attributes'                =>  array()                                 ,
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

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'site_title'        ,
                'zebra_control_type'    =>  'text'              ,
                'label'                 =>  'Site Title'        ,
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
                'form_field_name'       =>  'home_page_url'     ,
                'zebra_control_type'    =>  'text'              ,
                'label'                 =>  'Home Page URL'     ,
//              'help_text'             =>  'The URL of the page the teaser points to.&nbsp; This page can be on your <b>own site or an external site</b>.'       ,
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
                'form_field_name'       =>  'question_display_this_sites_ads_on_your_site'      ,
                'zebra_control_type'    =>  'checkbox'                                          ,
                'label'                 =>  'Display This Site\'s Ads On Your Site ?'         ,
                'help_text'             =>  array(
                                                'function'      =>  '\\' . __NAMESPACE__ . '\\get_question_display_ads_help_text'    ,
                                                'extra_args'    =>  array(
//                                                                      'direction' =>  'theirs-on-yours'
                                                                        'direction' =>  'this-on-plugin'
                                                                        )
                                                )   ,
                'form_field_value_from' =>  array(
                    'add'   =>  array(
                                    'method'    =>  'function'      ,
                                    'instance'  =>  array(
                                                        'function_name' =>  '\\' . __NAMESPACE__ . '\\get_field_value_4_question_display_this_sites_ads_on_your_site'       ,
                                                        'extra_args'    =>  array()
                                                        )
                                    )   ,
                    'edit'   =>  array(
                                    'method'    =>  'function'      ,
                                    'instance'  =>  array(
                                                        'function_name' =>  '\\' . __NAMESPACE__ . '\\get_field_value_4_question_display_this_sites_ads_on_your_site'       ,
                                                        'extra_args'    =>  array()
                                                        )
                                    )
                    )   ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%; text-align:left'     ,
//                                              'readonly'  =>  'readonly'
                                                'disabled'  =>  'disabled'
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
                'form_field_name'       =>  'question_display_your_ads_on_this_site'    ,
                'zebra_control_type'    =>  'checkbox'                                  ,
                'label'                 =>  'Display Your Ads On This Site ?'           ,
                'help_text'             =>  array(
                                                'function'      =>  '\\' . __NAMESPACE__ . '\\get_question_display_ads_help_text'    ,
                                                'extra_args'    =>  array(
//                                                                      'direction' =>  'yours-on-theirs'
                                                                        'direction' =>  'plugin-on-this'
                                                                        )
                                                )   ,
                'form_field_value_from' =>  array(
                    'add'   =>  array(
                                    'method'    =>  'function'      ,
                                    'instance'  =>  array(
                                                        'function_name' =>  '\\' . __NAMESPACE__ . '\\get_field_value_4_question_display_your_ads_on_this_site'     ,
                                                        'extra_args'    =>  array()
                                                        )
                                    )   ,
                    'edit'   =>  array(
                                    'method'    =>  'function'      ,
                                    'instance'  =>  array(
                                                        'function_name' =>  '\\' . __NAMESPACE__ . '\\get_field_value_4_question_display_your_ads_on_this_site'     ,
                                                        'extra_args'    =>  array()
                                                        )
                                    )
                    )   ,
                'attributes'            =>  array(
//                                              'style'     =>  'width:98%; text-align:left'     ,
//                                              'readonly'  =>  'readonly'
                                                'disabled'  =>  'disabled'
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
                'form_field_name'       =>  'ad_swapper_site_sid'       ,
                'zebra_control_type'    =>  'text'                      ,
                'label'                 =>  'Ad Swapper Site ID'        ,
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
                'form_field_name'       =>  'general_description'           ,
//              'zebra_control_type'    =>  'textarea'                      ,
                'zebra_control_type'    =>  'hidden'                        ,
                'label'                 =>  'General Description'           ,
//              'help_text'             =>  'A description of the page/content the teaser points to (eg; <b>copy/paste the first paragraph</b> of the page the teaser points to).'     ,
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
                'form_field_name'       =>  'ads_wanted_description'        ,
//              'zebra_control_type'    =>  'textarea'                      ,
                'zebra_control_type'    =>  'hidden'                        ,
                'label'                 =>  'Ads Wanted Description'        ,
//              'help_text'             =>  'A description of the page/content the teaser points to (eg; <b>copy/paste the first paragraph</b> of the page the teaser points to).'     ,
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
                'form_field_name'       =>  'sites_wanted_description'      ,
//              'zebra_control_type'    =>  'textarea'                      ,
                'zebra_control_type'    =>  'hidden'                        ,
                'label'                 =>  'Sites Wanted Description'      ,
//              'help_text'             =>  'A description of the page/content the teaser points to (eg; <b>copy/paste the first paragraph</b> of the page the teaser points to).'     ,
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

/*
            array(
                'form_field_name'       =>  'categories_available'      ,
                'zebra_control_type'    =>  'text'                      ,
                'label'                 =>  'Categories Available'      ,
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
                'form_field_name'       =>  'categories_wanted'         ,
                'zebra_control_type'    =>  'text'                      ,
                'label'                 =>  'Categories Wanted'         ,
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
*/

            // -----------------------------------------------------------------

/*
            array(
                'form_field_name'       =>  'geoip_continents_incl'     ,
                'zebra_control_type'    =>  'text'                      ,
                'label'                 =>  'Continents Included'       ,
//              'help_text'             =>  ''                          ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'     ,
                                                'readonly'  =>  'readonly'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'geoip_continents_excl'     ,
                'zebra_control_type'    =>  'text'                      ,
                'label'                 =>  'Continents Excluded'       ,
//              'help_text'             =>  ''                          ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'     ,
                                                'readonly'  =>  'readonly'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'geoip_countries_incl'      ,
                'zebra_control_type'    =>  'text'                      ,
                'label'                 =>  'Countries Included'        ,
//              'help_text'             =>  ''                          ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'     ,
                                                'readonly'  =>  'readonly'
                                                )               ,
                'rules'                 =>  array()
                )   ,

            // -----------------------------------------------------------------

            array(
                'form_field_name'       =>  'geoip_countries_excl'      ,
                'zebra_control_type'    =>  'text'                      ,
                'label'                 =>  'Countries Excluded'        ,
//              'help_text'             =>  ''                          ,
                'attributes'            =>  array(
                                                'style'     =>  'width:98%'     ,
                                                'readonly'  =>  'readonly'
                                                )               ,
                'rules'                 =>  array()
                )   ,
*/

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

//      'custom_add_edit_record_page_header_fn' =>  '\\' . __NAMESPACE__ . '\\get_custom_add_edit_record_page_header'

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
            'base_slug'                     =>  'site_title'            ,
            'label'                         =>  'Site Title'            ,
            'question_sortable'             =>  TRUE                    ,
//          'raw_value_from'                =>  array(
//                                                  'method'    =>  'array-storage-field-slug'  ,
//                                                  'instance'  =>  'site_title'
//                                                  )   ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'custom-function'                                           ,
                                                    'instance'  =>  '\\' . __NAMESPACE__ . '\\get_site_title_column_value'      ,
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
            'base_slug'                     =>  'home_page_url'         ,
            'label'                         =>  'Home Page URL'         ,
            'question_sortable'             =>  TRUE                    ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'array-storage-field-slug'  ,
                                                    'instance'  =>  'home_page_url'
                                                    )   ,
            'display_treatments'            =>  array(
                                                    array(
                                                        'method'    =>  'to-clickable-url'
                                                        )
                                                    )
            )   ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'display_this_sites_ads_on_your_site'                                       ,
//          'label'                         =>  'Display This Site\'s Ads On Your Site&nbsp;?'                              ,
            'label_function'                =>  array(
                'name_incl_namespace'   =>  '\\' . __NAMESPACE__ . '\\get_title_4_includes_plugin_site_title_DRT_column'    ,
                'extra_args'            =>  'Display This Site\'s Ads On [*PLUGIN*SITE*TITLE*]&nbsp;?'                      ,
                )   ,
            'question_sortable'             =>  TRUE                    ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'custom-function'                                                                   ,
                                                    'instance'  =>  '\\' . __NAMESPACE__ . '\\get_display_this_sites_ads_on_your_site_column_value'     ,
                                                    'args'      =>  array()
                                                    )   ,
            'display_treatments'            =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'this_site_targets_plugin_site'                                             ,
//          'label'                         =>  'This Site Wants To Advertise On Your Site&nbsp;?'                          ,
//          'label'                         =>  'This Site Has Targeted Your Site&nbsp;?'                                   ,
            'label_function'                =>  array(
                'name_incl_namespace'   =>  '\\' . __NAMESPACE__ . '\\get_title_4_includes_plugin_site_title_DRT_column'    ,
                'extra_args'            =>  'This Site Has Targeted [*PLUGIN*SITE*TITLE*]&nbsp;?'                           ,
                )   ,
            'question_sortable'             =>  TRUE                    ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'custom-function'                                                           ,
                                                    'instance'  =>  '\\' . __NAMESPACE__ . '\\get_this_site_targets_plugin_site_column_value'   ,
                                                    'args'      =>  array()
                                                    )   ,
            'display_treatments'            =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'display_your_ads_on_this_site'                                             ,
//          'label'                         =>  'Display Your Ads On This Site&nbsp;?'                                      ,
            'label_function'                =>  array(
                'name_incl_namespace'   =>  '\\' . __NAMESPACE__ . '\\get_title_4_includes_plugin_site_title_DRT_column'    ,
                'extra_args'            =>  'Display [*PLUGIN*SITE*TITLE*]\'s Ads On This Site&nbsp;?'                      ,
                )   ,
            'question_sortable'             =>  TRUE                    ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'custom-function'                                                           ,
                                                    'instance'  =>  '\\' . __NAMESPACE__ . '\\get_display_your_ads_on_this_site_column_value'   ,
                                                    'args'      =>  array()
                                                    )   ,
            'display_treatments'            =>  array()
            )   ,

        // ---------------------------------------------------------------------

        array(
            'base_slug'                     =>  'this_site_approves_plugin_site'                                            ,
//          'label'                         =>  'This Site Has Approved Your Site&nbsp;?'                                   ,
            'label_function'                =>  array(
                'name_incl_namespace'   =>  '\\' . __NAMESPACE__ . '\\get_title_4_includes_plugin_site_title_DRT_column'    ,
                'extra_args'            =>  'This Site Has Approved [*PLUGIN*SITE*TITLE*]&nbsp;?'                           ,
                )   ,
            'question_sortable'             =>  TRUE                    ,
            'raw_value_from'                =>  array(
                                                    'method'    =>  'custom-function'                                                           ,
                                                    'instance'  =>  '\\' . __NAMESPACE__ . '\\get_this_site_approves_plugin_site_column_value'  ,
                                                    'args'      =>  array()
                                                    )   ,
            'display_treatments'            =>  array()
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
        'default_data_field_slug_to_orderby'    =>  'site_title'                                ,
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
                                                            'link_title'    =>  'view/edit'
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
        'action_separator'                      =>  ' &nbsp;&nbsp; '        ,

        'page_variants'                         =>  array(

            'sites-to-advertise'    =>  array(
                'title'                 =>  ''          ,
                'header_html'           =>  ''          ,
                'header_html_function'  =>  array(
                    'name_incl_namespace'   =>  '\\' . __NAMESPACE__ . '\\get_pv_header_html_4_sites_to_advertise'      ,
                    'extra_args'            =>  NULL
                    )
                )   ,

            'sites-to-advertise-on' =>  array(
                'title'                 =>  ''          ,
                'header_html'           =>  ''          ,
                'header_html_function'  =>  array(
                    'name_incl_namespace'   =>  '\\' . __NAMESPACE__ . '\\get_pv_header_html_4_sites_to_advertise_on'   ,
                    'extra_args'            =>  NULL
                    )
                )

            )       ,

        'question_show_raw_mode_toggle_buttons'     =>  FALSE       ,

        'filters'       =>  array(
            array(
                'toolbar_title'                             =>  'Sites To Show?'    ,
                'toolbar_ui_type'                           =>  'dropdown'          ,
                'cookie_name'                               =>  NULL                ,
                'default_cookie_value'                      =>  NULL                ,
                'cookie_names_by_pv_slug'                   =>  array(
                    'sites-to-advertise'    =>  'ad-swapper-sites-to-advertise'     ,
                    'sites-to-advertise-on' =>  'ad-swapper-sites-to-advertise-on'
                    )   ,
                'default_cookie_values_by_pv_slug'          =>  array(
                    'sites-to-advertise'    =>  'yes-yes'   ,
                    'sites-to-advertise-on' =>  'yes-yes'
                    )   ,
                'titles_by_value'                           =>  NULL                ,
                'custom_get_toolbar_html_function'          =>  NULL                                                                    ,
                'custom_get_toolbar_html_function_args'     =>  NULL                                                                    ,
                'custom_get_titles_by_value_function'       =>  '\\' . __NAMESPACE__ . '\\custom_get_filter_titles_by_value_function'   ,
                'custom_get_titles_by_value_function_args'  =>  NULL                                                                    ,
                'custom_record_filtering_function'          =>  '\\' . __NAMESPACE__ . '\\custom_record_filtering_function'             ,
                'custom_record_filtering_function_args'     =>  NULL                                                                    ,
                'get_help_html_function'                    =>  NULL    ,   //  '\\' . __NAMESPACE__ . '\\get_help_html_4_filtering'                    ,
                'get_help_html_function_args'               =>  NULL                                                                    ,
                'foreign_dataset_field_args'                =>  array(
                    'foreign_dataset_slug'          =>  ''  ,
                    'foreign_match_field_slug'      =>  ''  ,
                    'foreign_title_field_slug'      =>  ''  ,
                    'this_match_field_slug'         =>  ''
                    )
                )
            )   ,
            //  NOTES
            //  =====
            //  1.  "toolbar_ui_type" must be one of:-
            //          "dropdown", "buttons", "custom"
            //
            //  2.  If "toolbar_ui_type" is "custom", then
            //          "custom_get_toolbar_html_function" MUST be specified.
            //
            //  3.  "xxx_function":-
            //          o   Can be NULL or an empty string if NO such function is
            //              specified.  And:-
            //          o   Must include the (absolute) namespace name (of the function
            //              concerned)
            //
            //  4.  "xxx_function_args" can be any PHP type.  It will be passed to the
            //      "xxx_function" as is.
            //
            //  5.  "default_cookie_value" is the value to be used if the filter COOKIE
            //      HASN'T been set yet.  Should be a string.  Defaults to the empty
            //      string ("").
            //
            //  6.  If there's NO:-
            //          "custom_get_titles_by_value_function"
            //
            //      then we'll (try to) get the titles by value from the:-
            //          "foreign_dataset_field_args"
            //
            //  7.  If there's NO:-
            //          "custom_record_filtering_function"
            //
            //      then we'll (try to) filter the records using the:-
            //          "foreign_dataset_field_args"

        'runtime_javascript'    =>  get_runtime_javascript_4_dataset_record_table()

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
        'dataset_slug'                      =>  'ad_swapper_available_sites'        ,
        'dataset_name_singular'             =>  'ad_swapper_available_site'         ,
        'dataset_name_plural'               =>  'ad_swapper_available_sites'        ,
        'dataset_title_singular'            =>  'Available Site'                    ,
        'dataset_title_plural'              =>  'Available Sites'                   ,
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

        'get_new_field_value_functions'     =>  array(

            'question_trial_mode_site'  =>  array(
                'name'  =>  '\\' . __NAMESPACE__ . '\\get_new_field_value_4_question_trial_mode_site'       ,
                'args'  =>  array()
                )   ,

            'this_site_approves_plugin_site'  =>  array(
                'name'  =>  '\\' . __NAMESPACE__ . '\\get_new_field_value_4_this_site_approves_plugin_site'     ,
                'args'  =>  array()
                )   ,

            'this_site_targets_plugin_site'  =>  array(
                'name'  =>  '\\' . __NAMESPACE__ . '\\get_new_field_value_4_this_site_targets_plugin_site'      ,
                'args'  =>  array()
                )   ,

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

