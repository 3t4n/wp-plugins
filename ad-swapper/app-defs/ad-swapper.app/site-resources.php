<?php

// *****************************************************************************
// AD-SWAPPER.APP / SITE-RESOURCES.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperSiteProfile ;
        //  NOTE!
        //  -----
        //  The dataset name/slug should be camel cased.  Eg:-
        //      projects
        //      referenceUrls
        //      globalLogMessages

// =============================================================================
// get_custom_add_edit_record_page_header()
// =============================================================================

function get_custom_add_edit_record_page_header(
    $core_plugapp_dirs                      ,
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_slug                           ,
    $dataset_title                          ,
    $dataset_records                        ,
    $key_field_slug                         ,
    $record_indices_by_key                  ,
    $question_front_end                     ,
    $question_adding                        ,
    $form_slug_underscored                  ,
    $zebra_form_def
    ) {

    // -------------------------------------------------------------------------
    // <dataset_specific_get_custom_add_edit_record_page_header>(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_slug                           ,
    //      $dataset_title                          ,
    //      $dataset_records                        ,
    //      $key_field_slug                         ,
    //      $record_indices_by_key                  ,
    //      $question_front_end                     ,
    //      $question_adding                        ,
    //      $form_slug_underscored                  ,
    //      $zebra_form_def
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the HTML for a custom header to go at the top of the
    // add/edit record page.
    //
    // RETURNS
    //      On SUCCESS
    //          $header_html STRING
    //
    //      On FAILURE
    //          array( $error_message STRING )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $_GET = Array(
    //                  [page]          => pluginPlant
    //                  [action]        => edit-record
    //                  [application]   => ad-swapper-central
    //                  [dataset_slug]  => ad_swapper_central_sites
    //                  [record_key]    => 504bb6b0-71c7-4515-a8dd-3f7c824a1030-1417766397-355167-1274
    //                  )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_GET , '$_GET' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_POST , '$_POST' ) ;

    // =========================================================================
    // Get the various WP sourced stuff...
    // =========================================================================

    $wp_site_title = \get_bloginfo( 'site_title' ) ;

    $wp_tagline    = \get_bloginfo( 'description' ) ;

    $wp_home_url   = \home_url() ;

    $wp_site_url   = \site_url() ;

    // =========================================================================
    // Create and return the page header...
    // =========================================================================

    return <<<EOT
<div style="background-color:#8B2252; color:#FFFFFF; padding:1em; margin-bottom:1em; width:95%">

    <table border="0" cellpadding="0" cellspacing="0"><tr>

        <td valign="top" width="45%">

            <h2 style="color:#FFFFFF; margin-top:0;
            text-decoration:underline">Maintain Ad Swapper Site Profile</h2>

            <p style="font-style:italic">Please <b
            style="font-size:133%">describe this site to other Ad Swappers</b>
            (on the Ad Swapper network)...</p>

            <p style="padding-left:2em; font-style:italic">NOTE!&nbsp; <b>Once
            you've saved changes</b> to the data below, please use the plugin's
            <b>Update Central Site</b> option (on the Ad Swapper plugin Main
            Menu), to upload those changes to Ad Swapper Central.</p>

        </td>

        <td width="5%">&nbsp;</td>

        <td valign="top" width="45%">

            <p style="margin:0 0 0.5em 0; font-style:italic; font-size:115%;
            background-color:#FFFFFF; color:#8B2252; padding:5px 10px">For
            reference, this site's WordPress <b>"Settings" &rarr; "General"</b>
            details are:-</p>

            <table style="margin-left:1em">
                <tr>
                    <td align="right"
                        style="font-style:italic"
                        >Site Title:</td>
                    <td style="padding-left:1em"
                        >{$wp_site_title}</td>
                    <td style="padding-left:1em; font-style:italic"
                        >&nbsp;</td>
                </tr>
                <tr>
                    <td align="right"
                        style="font-style:italic"
                        >Tagline:</td>
                    <td style="padding-left:1em"
                        >{$wp_tagline}</td>
                    <td style="padding-left:1em; font-style:italic"
                        >&nbsp;</td>
                </tr>
                <tr>
                    <td align="right"
                        style="font-style:italic"
                        >Home URL:</td>
                    <td style="padding-left:1em"
                        ><a href="{$wp_home_url}" target="_blank"
                            style="color:#FFFFFF"
                            >{$wp_home_url}</a></td>
                    <td style="padding-left:1em; font-style:italic"
                        >Called <b>"Site Address (URL)"</b>, on the WordPress
                        General Settings page.</td>
                </tr>
                <tr>
                    <td align="right"
                        style="font-style:italic"
                        >Site URL:</td>
                    <td style="padding-left:1em"
                        ><a href="{$wp_site_url}" target="_blank"
                            style="color:#FFFFFF"
                            >{$wp_site_url}</a></td>
                    <td style="padding-left:1em; font-style:italic"
                        >Called <b>"WordPress Address (URL)"</b>, on the
                        WordPress General Settings page.</td>
                </tr>
            </table>

        </td>

    </table>

</div>
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_default_record_data()
// =============================================================================

function get_default_record_data(
    $core_plugapp_dirs                      ,
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_records                        ,
    $record_indices_by_key                  ,
    $dataset_title                          ,
    $question_base64_encode
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_<datasetCamelName>\
    // get_default_record_data(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_records                        ,
    //      $record_indices_by_key                  ,
    //      $dataset_title                          ,
    //      $question_base64_encode
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the default new record.  Ie; Return the record data we should use
    // when adding a new record to the database.
    //
    // However, it's NOT necessary that ALL the fields be defined.  For
    // example, fields like:-
    //      o   created_datatime_utc
    //      o   last_modified_datatime_utc
    //      o   key
    //      o   ...or any other field for that matter...
    //
    // can be omitted.  And if they are omitted, they'll be created with the
    // default values specified in the dataset's Zebra Form Field and Array
    // Storage Field definitions (as per normal, when adding a new dataset
    // record).
    //
    // NOTE!
    // =====
    // $question_base64_encode tells this routine whether any base64
    // encoded fields in the returned record should be returned base64
    // encoded or not.
    //
    // RETURNS
    //      o   On SUCCESS
    //              ARRAY(
    //                  'data'              =>  $new_record_data ARRAY
    //                  )
    //              --OR--
    //              ARRAY(
    //                  'data'              =>  $new_record_data ARRAY
    //                  'key_field_slug'    =>  "xxx"
    //                  )
    //
    //      o   On FAILURE
    //              $error_message STRING
    // -------------------------------------------------------------------------

    $site_title = \get_bloginfo( 'name' ) ;

    $home_page_url = home_url() ;

    // -------------------------------------------------------------------------

    $default_record_data =
        array(
            'site_title'    =>  $site_title     ,
            'home_page_url' =>  $home_page_url
            ) ;

    // -------------------------------------------------------------------------

    return array(
                'data'  =>  $default_record_data
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_test_method_selector_options()
// =============================================================================

function get_test_method_selector_options(
    $home_page_title                        ,
    $caller_apps_includes_dir               ,
    $all_application_dataset_definitions    ,
    $dataset_slug                           ,
    $selected_datasets_dmdd                 ,
    $dataset_title                          ,
    $dataset_records                        ,
    $record_indices_by_key                  ,
    $question_adding                        ,
    $field_number                           ,
    $field_details                          ,
    $the_record                             ,
    $the_records_index                      ,
    $array_storage_field_slugs              ,
    $extra_args
    ) {

    // -------------------------------------------------------------------------
    // <get_xxx_selector_options>(
    //      $home_page_title                        ,
    //      $caller_apps_includes_dir               ,
    //      $all_application_dataset_definitions    ,
    //      $dataset_slug                           ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_title                          ,
    //      $dataset_records                        ,
    //      $record_indices_by_key                  ,
    //      $question_adding                        ,
    //      $field_number                           ,
    //      $field_details                          ,
    //      $the_record                             ,
    //      $the_records_index                      ,
    //      $array_storage_field_slugs              ,
    //      $extra_args
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Returns a "select" control "options" array - as required by Zebra Forms.
    //
    // The returned array is like (eg):-
    //
    //      array(
    //          "Option 1 Text"
    //          "Option 2 Text"
    //          ...
    //          )
    //
    //      array(
    //          "option 1 value"    =>  "Option 1 Text"
    //          "option 2 value"    =>  "Option 2 Text"
    //          ...
    //          )
    //
    //      array(
    //          "Option Group 1 Title"  =>  array(
    //              "option A value"    =>  "Option A Text"
    //              "option B value"    =>  "Option B Text"
    //              ...
    //              )
    //          "Option Group 2 Title"  =>  array(
    //              "option M value"    =>  "Option M Text"
    //              "option N value"    =>  "Option N Text"
    //              ...
    //              )
    //          ...
    //          )
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          array(
    //              $ok = TRUE          ,
    //              ARRAY $options
    //              )
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          array(
    //              $ok = FALSE             ,
    //              $error_message STRING
    //              )
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( \func_get_args() ) ;

    // =========================================================================
    // Create the options...
    // =========================================================================

    // -------------------------------------------------------------------------
    // We want to return an array like:-
    //
    //      array(
    //          "option 1 value"    =>  "Option 1 Text"
    //          "option 2 value"    =>  "Option 2 Text"
    //          ...
    //          )
    // -------------------------------------------------------------------------

    $options = array(
        'none'          =>  'None'          ,
        'ip-address'    =>  'IP Address'    ,
        'cookie'        =>  'Cookie'
        ) ;

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return array(
                TRUE        ,
                $options
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_test_method_cookie_name()
// =============================================================================

function get_test_method_cookie_name() {
    return 'adSwapper_adDisplayer_testMethod_cookie' ;
}

// =============================================================================
// question_post_set_cookie_on_add()
// =============================================================================

function question_post_set_cookie_on_add(
    $core_plugapp_dirs                          ,
    $dataset_manager_home_page_title            ,
    $caller_apps_includes_dir                   ,
    $all_application_dataset_definitions        ,
    $dataset_slug                               ,
    $selected_datasets_dmdd                     ,
    $dataset_title                              ,
    $dataset_records                            ,
    $record_indices_by_key                      ,
    $key_field_slug                             ,
    $question_adding                            ,
    $form_slug_underscored                      ,
    $pre_add_edit_dataset_records               ,
    $record_added                               ,
    $stuff_passed_from_the_pre_add_routine
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // question_do_post_add_routine()
    //      $core_plugapp_dirs                          ,
    //      $dataset_manager_home_page_title            ,
    //      $caller_apps_includes_dir                   ,
    //      $all_application_dataset_definitions        ,
    //      $dataset_slug                               ,
    //      $selected_datasets_dmdd                     ,
    //      $dataset_title                              ,
    //      $dataset_records                            ,
    //      $record_indices_by_key                      ,
    //      $key_field_slug                             ,
    //      $question_adding                            ,
    //      $form_slug_underscored                      ,
    //      $pre_add_edit_dataset_records               ,
    //      $record_added                               ,
    //      $stuff_passed_from_the_pre_add_routine
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // Called after:-
    //      o   $record_to_add = $record_added has been successfully created,
    //          and;
    //      o   Added to $dataset_records.
    //      o   And the updated $dataset_records has been successfully saved
    //          to disk.
    //
    // NOTES!
    // ======
    // 1.   $record_indices_by_key HASN'T been updated (with the new record
    //      that's been added to $dataset_records).
    //
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    if ( $record_added['test_method'] === 'cookie' ) {

        // ---------------------------------------------------------------------

        $cookie_name = get_test_method_cookie_name() ;

        $one_year_in_seconds = 60 * 60 * 24 * 365 ;

        // ---------------------------------------------------------------------

//      setcookie(
//          $cookie_name                        ,
//          $cookie_name                        ,       //  Same value as name
//          time() + $one_year_in_seconds               //  Expire in one year
//          ) ;
//          //  Doesn't work - because output already started.

        // ---------------------------------------------------------------------

        echo <<<EOT
<script type="text/javascript">
    scottHamperCookies.set( '{$cookie_name}' , '{$cookie_name}' , { expires:{$one_year_in_seconds} } ) ;
</script>
EOT;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return TRUE ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// question_post_set_cookie_on_edit()
// =============================================================================

function question_post_set_cookie_on_edit(
    $core_plugapp_dirs                          ,
    $dataset_manager_home_page_title            ,
    $caller_apps_includes_dir                   ,
    $all_application_dataset_definitions        ,
    $dataset_slug                               ,
    $selected_datasets_dmdd                     ,
    $dataset_title                              ,
    $dataset_records                            ,
    $record_indices_by_key                      ,
    $key_field_slug                             ,
    $question_adding                            ,
    $form_slug_underscored                      ,
    $pre_add_edit_dataset_records               ,
    $replacement_record_before_updates          ,
    $replacement_record_after_updates           ,
    $stuff_passed_from_the_pre_edit_routine
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // question_do_post_edit_routine(
    //      $core_plugapp_dirs                          ,
    //      $dataset_manager_home_page_title            ,
    //      $caller_apps_includes_dir                   ,
    //      $all_application_dataset_definitions        ,
    //      $dataset_slug                               ,
    //      $selected_datasets_dmdd                     ,
    //      $dataset_title                              ,
    //      $dataset_records                            ,
    //      $record_indices_by_key                      ,
    //      $key_field_slug                             ,
    //      $question_adding                            ,
    //      $form_slug_underscored                      ,
    //      $pre_add_edit_dataset_records               ,
    //      $replacement_record_before_updates          ,
    //      $replacement_record_after_updates           ,
    //      $stuff_passed_from_the_pre_edit_routine
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // Called after:-
    //      o   The $replacement_record has been successfully created, and;
    //      o   Updated in $dataset_records.
    //      o   And the updated $dataset_records has been successfully saved
    //          to disk.
    //
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    if ( $replacement_record_after_updates['test_method'] === 'cookie' ) {

        // ---------------------------------------------------------------------

        $cookie_name = get_test_method_cookie_name() ;

        $one_year_in_seconds = 60 * 60 * 24 * 365 ;

        // ---------------------------------------------------------------------

//      setcookie(
//          $cookie_name                        ,
//          $cookie_name                        ,       //  Same value as name
//          time() + $one_year_in_seconds               //  Expire in one year
//          ) ;
//          //  Doesn't work - because output already started.

        // ---------------------------------------------------------------------

        echo <<<EOT
<script type="text/javascript">
    scottHamperCookies.set( '{$cookie_name}' , '{$cookie_name}' , { expires:{$one_year_in_seconds} } ) ;
</script>
EOT;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return TRUE ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

