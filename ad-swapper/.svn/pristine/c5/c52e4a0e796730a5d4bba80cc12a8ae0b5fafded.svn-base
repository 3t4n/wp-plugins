<?php

// *****************************************************************************
// AD-SWAPPER.APP / AVAILABLE-SITE-RESOURCES.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableSites ;

// =============================================================================
// get_question_display_ads_help_text()
// =============================================================================

function get_question_display_ads_help_text(
    $core_plugapp_dirs                      ,
    $all_application_dataset_definitions    ,
    $question_front_end                     ,
    $dataset_slug                           ,
    $selected_datasets_dmdd                 ,
    $dataset_title                          ,
    $dataset_records                        ,
    $record_indices_by_key                  ,
    $form_slug_underscored                  ,
    $question_adding                        ,
    $zebra_form_field_number                ,
    $zebra_form_field_details               ,
    $the_record                             ,
    $the_records_index                      ,
    $extra_args
    ) {

    // -------------------------------------------------------------------------
    // <get_field_specific_help_text_function>(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $question_front_end                     ,
    //      $dataset_slug                           ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_title                          ,
    //      $dataset_records                        ,
    //      $record_indices_by_key                  ,
    //      $form_slug_underscored                  ,
    //      $question_adding                        ,
    //      $zebra_form_field_number                ,
    //      $zebra_form_field_details               ,
    //      $the_record                             ,
    //      $the_records_index                      ,
    //      $extra_args
    //      ) {
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $help_text STRING
    //
    //      On FAILURE
    //          ARRAY( $error message STRING )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $the_record = Array(
    //          [created_server_datetime_utc]                   => 1421545408
    //          [last_modified_server_datetime_utc]             => 1421545408
    //          [key]                                           => 10906d4d-6d60-4e39-b201-9bf2b52f4347-1421545408-370125-1421
    //          [ad_swapper_site_sid]                           => 2kcv-gwhz
    //          [site_title]                                    => Plugdev
    //          [home_page_url]                                 => http://localhost/plugdev
    //          [general_description]                           =>
    //          [ads_wanted_description]                        =>
    //          [sites_wanted_description]                      =>
    //          [categories_available]                          =>
    //          [categories_wanted]                             =>
    //          [question_display_this_sites_ads_on_your_site]  => 1
    //          [question_display_your_ads_on_this_site]        => 1
    //          )
    //
    //      $extra_args = Array(
    //      //  'direction' =>  'yours-on-theirs' | 'theirs-on-yours'
    //          'direction' =>  'plugin-on-this' | 'this-on-plugin'
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $the_record ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $extra_args ) ;

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // extra_args + direction ?
    // =========================================================================

    if ( ! array_key_exists( 'direction' , $extra_args ) ) {

        $msg = <<<EOT
PROBLEM:&nbsp; No "extra_args" + "direction"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        return array( $msg ) ;

    }

    // =========================================================================
    // GET the "Toggle Available Sites" URL...
    // =========================================================================

    require_once(
        dirname( __FILE__ ) .
        '/plugin.stuff/extras/toggle-available-sites/get-toggle-available-site-url.php'
        ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_toggleAvailableSites\
    // get_toggle_available_site_url(
    //      $core_plugapp_dirs      ,
    //      $site_record            ,
    //      $direction
    //      )
    // - - - - - - - - - - - - - - -
    // $direction is one of:  "theirs-on-yours"  "yours-on-theirs"
    //
    // RETURNS
    //      On SUCCESS
    //          $toggle_available_site_url STRING
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    $url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_toggleAvailableSites\get_toggle_available_site_url(
            $core_plugapp_dirs          ,
            $the_record                 ,
            $extra_args['direction']
            ) ;

    // =========================================================================
    // Get the available site's "other site specific settings" record (if
    // there is one)...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableSites\
    // get_site_specific_settings_record(
    //      $all_application_dataset_definitions    ,
    //      &$loaded_datasets                       ,
    //      $target_ad_swapper_site_sid
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          $site_specific_settings_record ARRAY
    //          --OR--
    //          NULL (= no site specific settings record found for this site)
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $loaded_datasets = array() ;

    // -------------------------------------------------------------------------

    $target_ad_swapper_site_sid =
        $the_record['ad_swapper_site_sid']
        ;

    // -------------------------------------------------------------------------

    $site_specific_settings_record =
        get_site_specific_settings_record(
            $all_application_dataset_definitions    ,
            $loaded_datasets                        ,
            $target_ad_swapper_site_sid
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $site_specific_settings_record ) ) {
        return array( $site_specific_settings_record ) ;
    }

    // =========================================================================
    // Create and return the help text...
    // =========================================================================

//  if ( $extra_args['direction'] === 'theirs-on-yours' ) {
    if ( $extra_args['direction'] === 'this-on-plugin' ) {

        // ---------------------------------------------------------------------
        // This record site
        // ---------------------------------------------------------------------

        if ( is_array( $site_specific_settings_record ) ) {

            if ( $site_specific_settings_record['question_display_this_sites_ads_on_your_site'] ) {
                $currently = 'YES' ;
                $change_to = 'NO' ;

            } else {
                $currently = 'NO' ;
                $change_to = 'YES' ;

            }

        } else {
            $currently = 'NO' ;
            $change_to = 'YES' ;

        }

        // ---------------------------------------------------------------------

        return <<<EOT
Currently <b>{$currently}</b><br /><a
    href="{$url}"
    style="text-decoration:none; border-bottom:1px dashed #005C80; color:#005C80"
    >change to {$change_to}</a> &nbsp; <i>(clicking the checkbox below WON'T work)</i>
EOT;

        // ---------------------------------------------------------------------

//  } elseif ( $extra_args['direction'] === 'yours-on-theirs' ) {
    } elseif ( $extra_args['direction'] === 'plugin-on-this' ) {

        // ---------------------------------------------------------------------

        if ( is_array( $site_specific_settings_record ) ) {

            if ( $site_specific_settings_record['question_display_your_ads_on_this_site'] ) {
                $currently = 'YES' ;
                $change_to = 'NO' ;

            } else {
                $currently = 'NO' ;
                $change_to = 'YES' ;

            }

        } else {
            $currently = 'NO' ;
            $change_to = 'YES' ;

        }

        // ---------------------------------------------------------------------

        return <<<EOT
Currently <b>{$currently}</b><br /><a
    href="{$url}"
    style="text-decoration:none; border-bottom:1px dashed #005C80; color:#005C80"
    >change to {$change_to}</a> &nbsp; <i>(clicking the checkbox below WON'T work)</i>
EOT;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

//PROBLEM:&nbsp; Bad "extra_args" + "direction" (must be one of "theirs-on-yours" or "yours-on-theirs")

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "extra_args" + "direction" (must be one of "this-on-plugin" or "plugin-on-this")
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        return array( $msg ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_site_specific_settings_record()
// =============================================================================

function get_site_specific_settings_record(
    $all_application_dataset_definitions    ,
    &$loaded_datasets                       ,
    $target_ad_swapper_site_sid
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableSites\
    // get_site_specific_settings_record(
    //      $all_application_dataset_definitions    ,
    //      &$loaded_datasets                       ,
    //      $target_ad_swapper_site_sid
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          $site_specific_settings_record ARRAY
    //          --OR--
    //          NULL (= no site specific settings record found for this site)
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          $error_message STRING
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $loaded_datasets    ,
//    '$loaded_datasets'
//    ) ;

    // -------------------------------------------------------------------------

    $target_dataset_slug = 'ad_swapper_other_site_specific_settings' ;

    // -------------------------------------------------------------------------

    if ( array_key_exists( $target_dataset_slug , $loaded_datasets ) ) {

        // ---------------------------------------------------------------------

        $other_site_specific_settings_records =
            $loaded_datasets[ $target_dataset_slug ]['records']
            ;

        // ---------------------------------------------------------------------

    } else {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_dataset_title_records_key_field_slug_and_record_indices_by_key(
        //      $all_application_dataset_definitions    ,
        //      $dataset_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      o   On SUCCESS
        //              ARRAY(
        //                  $dataset_title                  STRING
        //                  $dataset_records                ARRAY
        //                  $array_storage_key_field_slug   STRING
        //                  $record_indices_by_key          ARRAY
        //                  )
        //
        //      o   On FAILURE
        //              $error_message STRING
        // -------------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_dataset_title_records_key_field_slug_and_record_indices_by_key(
                $all_application_dataset_definitions    ,
                $target_dataset_slug
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        $loaded_datasets[ $target_dataset_slug ] = array(
            'title'                         =>  $result[0]      ,
            'records'                       =>  $result[1]      ,
            'key_field_slug'                =>  $result[2]      ,
            'record_indices_by_key'         =>  $result[3]
            ) ;

        // ---------------------------------------------------------------------

        $other_site_specific_settings_records = $result[1] ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $other_site_specific_settings_records       ,
//    '$other_site_specific_settings_records'
//    ) ;

    // -------------------------------------------------------------------------

    $this_site_specific_settings_record = NULL ;

    // -------------------------------------------------------------------------

    foreach ( $other_site_specific_settings_records as $this_record ) {

        // ---------------------------------------------------------------------

        if (    $this_record['ad_swapper_site_sid']
                ===
                $target_ad_swapper_site_sid
            ) {

            $this_site_specific_settings_record = $this_record ;

            break ;

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    return $this_site_specific_settings_record ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_site_title_column_value()
// =============================================================================

function get_site_title_column_value(
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_records                        ,
    $dataset_slug                           ,
    $dataset_title                          ,
    $question_front_end                     ,
    $caller_apps_includes_dir               ,
    $this_column_def_index                  ,
    $this_column_def                        ,
    $this_dataset_record_index              ,
    $this_dataset_record_data               ,
    &$custom_get_table_data_function_data   ,
    &$loaded_datasets
    ) {

    // -------------------------------------------------------------------------
    // <my_custom_get_dataset_record_column_value_function>(
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_records                        ,
    //      $dataset_slug                           ,
    //      $dataset_title                          ,
    //      $question_front_end                     ,
    //      $caller_apps_includes_dir               ,
    //      $this_column_def_index                  ,
    //      $this_column_def                        ,
    //      $this_dataset_record_index              ,
    //      $this_dataset_record_data               ,
    //      &$custom_get_table_data_function_data   ,
    //      &$loaded_datasets
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the specified column value...
    //
    // $loaded_datasets is like:-
    //
    //      $loaded_datasets = array(
    //
    //          <dataset_slug>  =>  array(
    //                                  'title'                 =>  "xxx"           ,
    //                                  'records'               =>  array(...)      ,
    //                                  'key_field_slug'        =>  "xxx" or NULL
    //                                  'record_indices_by_key' =>  array(...)
    //                                  )   ,
    //
    //          ...
    //
    //          )
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          $field_value STRING
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          array( $error_message STRING )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $this_dataset_record_data = Array(
    //          [created_server_datetime_utc]       => 1448932456
    //          [last_modified_server_datetime_utc] => 1448932456
    //          [key]                               => c574b600-eb75-49fc-9722-f82af8927d52-1448932456-396001-5235
    //          [ad_swapper_site_sid]               => 2kmv-hzgc
    //          [site_title]                        => Plugdev
    //          [home_page_url]                     => http://localhost/plugdev
    //          [general_description]               =>
    //          [ads_wanted_description]            =>
    //          [sites_wanted_description]          =>
    //          [question_trial_mode_site]          =>
    //          [subscription_type]                 => trial
    //          [this_site_approves_plugin_site]    =>
    //          [this_site_targets_plugin_site]     =>
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $this_dataset_record_data       ,
//    '$this_dataset_record_data'
//    ) ;

    // -------------------------------------------------------------------------

    $site_title = <<<EOT
<b>{$this_dataset_record_data['site_title']}</b>
EOT;

    // -------------------------------------------------------------------------

    require_once( dirname( __FILE__ ) . '/plugin.stuff/includes/ad-swapper-core-stuff.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adSwapperCoreStuff\
    // get_plugin_sites_ad_swapper_site_sid(
    //      $core_plugapp_dirs = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // NOTE!
    // -----
    // The value stored is cached (in memory), to make subsequent calls
    // faster.
    //
    // RETURNS
    //      On SUCCESS
    //          $plugin_sites_ad_swapper_site_sid STRING
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    $plugin_sites_ad_swapper_site_sid =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adSwapperCoreStuff\get_plugin_sites_ad_swapper_site_sid()
        ;

    // -------------------------------------------------------------------------

    if ( is_array( $plugin_sites_ad_swapper_site_sid ) ) {
        return $plugin_sites_ad_swapper_site_sid ;
    }

    // -------------------------------------------------------------------------

    if (    $this_dataset_record_data['ad_swapper_site_sid']
            ===
            $plugin_sites_ad_swapper_site_sid
        ) {

        $site_title .= <<<EOT
<br /><span style="color:#007000; background-color:#FFFFD7">&nbsp;plugin site&nbsp;</span>
EOT;

    }


    // -------------------------------------------------------------------------

    return $site_title ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_display_your_ads_on_this_site_column_value()
// =============================================================================

function get_display_your_ads_on_this_site_column_value(
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_records                        ,
    $dataset_slug                           ,
    $dataset_title                          ,
    $question_front_end                     ,
    $caller_apps_includes_dir               ,
    $this_column_def_index                  ,
    $this_column_def                        ,
    $this_dataset_record_index              ,
    $this_dataset_record_data               ,
    &$custom_get_table_data_function_data   ,
    &$loaded_datasets
    ) {

    // -------------------------------------------------------------------------
    // <my_custom_get_dataset_record_column_value_function>(
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_records                        ,
    //      $dataset_slug                           ,
    //      $dataset_title                          ,
    //      $question_front_end                     ,
    //      $caller_apps_includes_dir               ,
    //      $this_column_def_index                  ,
    //      $this_column_def                        ,
    //      $this_dataset_record_index              ,
    //      $this_dataset_record_data               ,
    //      &$custom_get_table_data_function_data   ,
    //      &$loaded_datasets
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the specified column value...
    //
    // $loaded_datasets is like:-
    //
    //      $loaded_datasets = array(
    //
    //          <dataset_slug>  =>  array(
    //                                  'title'                 =>  "xxx"           ,
    //                                  'records'               =>  array(...)      ,
    //                                  'key_field_slug'        =>  "xxx" or NULL
    //                                  'record_indices_by_key' =>  array(...)
    //                                  )   ,
    //
    //          ...
    //
    //          )
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          $field_value STRING
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          array( $error_message STRING )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $this_dataset_record_data = Array(
    //          [created_server_datetime_utc]       => 1448932456
    //          [last_modified_server_datetime_utc] => 1448932456
    //          [key]                               => c574b600-eb75-49fc-9722-f82af8927d52-1448932456-396001-5235
    //          [ad_swapper_site_sid]               => 2kmv-hzgc
    //          [site_title]                        => Plugdev
    //          [home_page_url]                     => http://localhost/plugdev
    //          [general_description]               =>
    //          [ads_wanted_description]            =>
    //          [sites_wanted_description]          =>
    //          [question_trial_mode_site]          =>
    //          [subscription_type]                 => trial
    //          [this_site_approves_plugin_site]    =>
    //          [this_site_targets_plugin_site]     =>
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $this_dataset_record_data       ,
//    '$this_dataset_record_data'
//    ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableSites\
    // get_site_specific_settings_record(
    //      $all_application_dataset_definitions    ,
    //      &$loaded_datasets                       ,
    //      $target_ad_swapper_site_sid
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          $site_specific_settings_record ARRAY
    //          --OR--
    //          NULL (= no site specific settings record found for this site)
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $target_ad_swapper_site_sid = $this_dataset_record_data['ad_swapper_site_sid'] ;

    // -------------------------------------------------------------------------

    $target_site_specific_settings_record =
        get_site_specific_settings_record(
            $all_application_dataset_definitions    ,
            $loaded_datasets                        ,
            $target_ad_swapper_site_sid
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $target_site_specific_settings_record ) ) {
        return array( $target_site_specific_settings_record ) ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $target_site_specific_settings_record = Array(
    //          [created_server_datetime_utc]                  => 1446798206
    //          [last_modified_server_datetime_utc]            => 1446798206
    //          [key]                                          => 83d10f9a-13c0-46fd-bdc6-948f0d6be5b6-1446798205-969982-5107
    //          [ad_swapper_site_sid]                          => 2kmv-hzgc
    //          [question_display_your_ads_on_this_site]       =>
    //          [question_display_this_sites_ads_on_your_site] =>
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $target_site_specific_settings_record       ,
//    '$target_site_specific_settings_record'
//    ) ;

    // -------------------------------------------------------------------------

    $yes = <<<EOT
<span style="color:#008000; font-weight:bold">YES</span>
EOT;

    // -------------------------------------------------------------------------

    $no = <<<EOT
<span style="color:#AA0000">no</span>
EOT;

    // -------------------------------------------------------------------------

    if ( ! is_array( $target_site_specific_settings_record ) ) {
        return $no ;
    }

    // -------------------------------------------------------------------------

    if ( $target_site_specific_settings_record['question_display_your_ads_on_this_site'] ) {
        return $yes ;
    }

    // -------------------------------------------------------------------------

    return $no ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_display_this_sites_ads_on_your_site_column_value()
// =============================================================================

function get_display_this_sites_ads_on_your_site_column_value(
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_records                        ,
    $dataset_slug                           ,
    $dataset_title                          ,
    $question_front_end                     ,
    $caller_apps_includes_dir               ,
    $this_column_def_index                  ,
    $this_column_def                        ,
    $this_dataset_record_index              ,
    $this_dataset_record_data               ,
    &$custom_get_table_data_function_data   ,
    &$loaded_datasets
    ) {

    // -------------------------------------------------------------------------
    // <my_custom_get_dataset_record_column_value_function>(
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_records                        ,
    //      $dataset_slug                           ,
    //      $dataset_title                          ,
    //      $question_front_end                     ,
    //      $caller_apps_includes_dir               ,
    //      $this_column_def_index                  ,
    //      $this_column_def                        ,
    //      $this_dataset_record_index              ,
    //      $this_dataset_record_data               ,
    //      &$custom_get_table_data_function_data   ,
    //      &$loaded_datasets
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the specified column value...
    //
    // $loaded_datasets is like:-
    //
    //      $loaded_datasets = array(
    //
    //          <dataset_slug>  =>  array(
    //                                  'title'                 =>  "xxx"           ,
    //                                  'records'               =>  array(...)      ,
    //                                  'key_field_slug'        =>  "xxx" or NULL
    //                                  'record_indices_by_key' =>  array(...)
    //                                  )   ,
    //
    //          ...
    //
    //          )
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          $field_value STRING
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          array( $error_message STRING )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $this_dataset_record_data = Array(
    //          [created_server_datetime_utc]       => 1448932456
    //          [last_modified_server_datetime_utc] => 1448932456
    //          [key]                               => c574b600-eb75-49fc-9722-f82af8927d52-1448932456-396001-5235
    //          [ad_swapper_site_sid]               => 2kmv-hzgc
    //          [site_title]                        => Plugdev
    //          [home_page_url]                     => http://localhost/plugdev
    //          [general_description]               =>
    //          [ads_wanted_description]            =>
    //          [sites_wanted_description]          =>
    //          [question_trial_mode_site]          =>
    //          [subscription_type]                 => trial
    //          [this_site_approves_plugin_site]    =>
    //          [this_site_targets_plugin_site]     =>
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $this_dataset_record_data       ,
//    '$this_dataset_record_data'
//    ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableSites\
    // get_site_specific_settings_record(
    //      $all_application_dataset_definitions    ,
    //      &$loaded_datasets                       ,
    //      $target_ad_swapper_site_sid
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          $site_specific_settings_record ARRAY
    //          --OR--
    //          NULL (= no site specific settings record found for this site)
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $target_ad_swapper_site_sid = $this_dataset_record_data['ad_swapper_site_sid'] ;

    // -------------------------------------------------------------------------

    $target_site_specific_settings_record =
        get_site_specific_settings_record(
            $all_application_dataset_definitions    ,
            $loaded_datasets                        ,
            $target_ad_swapper_site_sid
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $target_site_specific_settings_record ) ) {
        return array( $target_site_specific_settings_record ) ;
    }

    // -------------------------------------------------------------------------

    $yes = <<<EOT
<span style="color:#008000; font-weight:bold">YES</span>
EOT;

    // -------------------------------------------------------------------------

    $no = <<<EOT
<span style="color:#AA0000">no</span>
EOT;

    // -------------------------------------------------------------------------

    if ( ! is_array( $target_site_specific_settings_record ) ) {
        return $no ;
    }

    // -------------------------------------------------------------------------

    if ( $target_site_specific_settings_record['question_display_this_sites_ads_on_your_site'] ) {
        return $yes ;
    }

    // -------------------------------------------------------------------------

    return $no ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_field_value_4_question_display_your_ads_on_this_site()
// =============================================================================

function get_field_value_4_question_display_your_ads_on_this_site(
    $home_page_title                        ,
    $caller_apps_includes_dir               ,
    $all_application_dataset_definitions    ,
    $dataset_slug                           ,
    $selected_datasets_dmdd                 ,
    $dataset_title                          ,
    $dataset_records                        ,
    $record_indices_by_key                  ,
    $question_adding                        ,
    $zebra_form_field_number                ,
    $zebra_form_field_details               ,
    $the_record                             ,
    $the_records_index                      ,
    $array_storage_field_slugs              ,
    $extra_args
    ) {

    // -------------------------------------------------------------------------
    // <get_field_value_function>(
    //      $home_page_title                        ,
    //      $caller_apps_includes_dir               ,
    //      $all_application_dataset_definitions    ,
    //      $dataset_slug                           ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_title                          ,
    //      $dataset_records                        ,
    //      $record_indices_by_key                  ,
    //      $question_adding                        ,
    //      $zebra_form_field_number                ,
    //      $zebra_form_field_details               ,
    //      $the_record                             ,
    //      $the_records_index                      ,
    //      $array_storage_field_slugs              ,
    //      $extra_args
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the specified field's value (for display in a Zebra Forms
    // based "add/edit record" form).
    //
    // NOTE!
    // -----
    // $the_record and $the_records_index are both NULL when
    // $question_adding is TRUE
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          array(
    //              $ok = TRUE                      ,
    //              $field_value <any PHP type>
    //              )
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          array(
    //              $ok = FALSE             ,
    //              $error_message STRING
    //              )
    // -------------------------------------------------------------------------

    return array(
                TRUE        ,
                FALSE
                ) ;
                //  A DUMMY VALUE is returned.  Because it's:-
                //      get_question_display_ads_help_text()
                //
                //  that gets/sets the real value.

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_field_value_4_question_display_this_sites_ads_on_your_site()
// =============================================================================

function get_field_value_4_question_display_this_sites_ads_on_your_site(
    $home_page_title                        ,
    $caller_apps_includes_dir               ,
    $all_application_dataset_definitions    ,
    $dataset_slug                           ,
    $selected_datasets_dmdd                 ,
    $dataset_title                          ,
    $dataset_records                        ,
    $record_indices_by_key                  ,
    $question_adding                        ,
    $zebra_form_field_number                ,
    $zebra_form_field_details               ,
    $the_record                             ,
    $the_records_index                      ,
    $array_storage_field_slugs              ,
    $extra_args
    ) {

    // -------------------------------------------------------------------------
    // <get_field_value_function>(
    //      $home_page_title                        ,
    //      $caller_apps_includes_dir               ,
    //      $all_application_dataset_definitions    ,
    //      $dataset_slug                           ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_title                          ,
    //      $dataset_records                        ,
    //      $record_indices_by_key                  ,
    //      $question_adding                        ,
    //      $zebra_form_field_number                ,
    //      $zebra_form_field_details               ,
    //      $the_record                             ,
    //      $the_records_index                      ,
    //      $array_storage_field_slugs              ,
    //      $extra_args
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the specified field's value (for display in a Zebra Forms
    // based "add/edit record" form).
    //
    // NOTE!
    // -----
    // $the_record and $the_records_index are both NULL when
    // $question_adding is TRUE
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          array(
    //              $ok = TRUE                      ,
    //              $field_value <any PHP type>
    //              )
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          array(
    //              $ok = FALSE             ,
    //              $error_message STRING
    //              )
    // -------------------------------------------------------------------------

    return array(
                TRUE        ,
                FALSE
                ) ;
                //  A DUMMY VALUE is returned.  Because it's:-
                //      get_question_display_ads_help_text()
                //
                //  that gets/sets the real value.

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_this_site_approves_plugin_site_column_value()
// =============================================================================

function get_this_site_approves_plugin_site_column_value(
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_records                        ,
    $dataset_slug                           ,
    $dataset_title                          ,
    $question_front_end                     ,
    $caller_apps_includes_dir               ,
    $this_column_def_index                  ,
    $this_column_def                        ,
    $this_dataset_record_index              ,
    $this_dataset_record_data               ,
    &$custom_get_table_data_function_data   ,
    &$loaded_datasets
    ) {

    // -------------------------------------------------------------------------
    // <my_custom_get_dataset_record_column_value_function>(
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_records                        ,
    //      $dataset_slug                           ,
    //      $dataset_title                          ,
    //      $question_front_end                     ,
    //      $caller_apps_includes_dir               ,
    //      $this_column_def_index                  ,
    //      $this_column_def                        ,
    //      $this_dataset_record_index              ,
    //      $this_dataset_record_data               ,
    //      &$custom_get_table_data_function_data   ,
    //      &$loaded_datasets
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the specified column value...
    //
    // $loaded_datasets is like:-
    //
    //      $loaded_datasets = array(
    //
    //          <dataset_slug>  =>  array(
    //                                  'title'                 =>  "xxx"           ,
    //                                  'records'               =>  array(...)      ,
    //                                  'key_field_slug'        =>  "xxx" or NULL
    //                                  'record_indices_by_key' =>  array(...)
    //                                  )   ,
    //
    //          ...
    //
    //          )
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          $field_value STRING
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          array( $error_message STRING )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $this_dataset_record_data = Array(
    //          [created_server_datetime_utc]       => 1448932456
    //          [last_modified_server_datetime_utc] => 1448932456
    //          [key]                               => c574b600-eb75-49fc-9722-f82af8927d52-1448932456-396001-5235
    //          [ad_swapper_site_sid]               => 2kmv-hzgc
    //          [site_title]                        => Plugdev
    //          [home_page_url]                     => http://localhost/plugdev
    //          [general_description]               =>
    //          [ads_wanted_description]            =>
    //          [sites_wanted_description]          =>
    //          [question_trial_mode_site]          =>
    //          [subscription_type]                 => trial
    //          [this_site_approves_plugin_site]    => 1
    //          [this_site_targets_plugin_site]     => 1
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $this_dataset_record_data , '$this_dataset_record_data' ) ;

    // -------------------------------------------------------------------------

    $yes = <<<EOT
<span style="color:#666666; font-weight:bold">YES</span>
EOT;

    // -------------------------------------------------------------------------

    $no = <<<EOT
<span style="color:#666666">no</span>
EOT;

    // -------------------------------------------------------------------------

    if ( $this_dataset_record_data['this_site_approves_plugin_site'] ) {
        return $yes ;
    }

    // -------------------------------------------------------------------------

    return $no ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_this_site_targets_plugin_site_column_value()
// =============================================================================

function get_this_site_targets_plugin_site_column_value(
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_records                        ,
    $dataset_slug                           ,
    $dataset_title                          ,
    $question_front_end                     ,
    $caller_apps_includes_dir               ,
    $this_column_def_index                  ,
    $this_column_def                        ,
    $this_dataset_record_index              ,
    $this_dataset_record_data               ,
    &$custom_get_table_data_function_data   ,
    &$loaded_datasets
    ) {

    // -------------------------------------------------------------------------
    // <my_custom_get_dataset_record_column_value_function>(
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_records                        ,
    //      $dataset_slug                           ,
    //      $dataset_title                          ,
    //      $question_front_end                     ,
    //      $caller_apps_includes_dir               ,
    //      $this_column_def_index                  ,
    //      $this_column_def                        ,
    //      $this_dataset_record_index              ,
    //      $this_dataset_record_data               ,
    //      &$custom_get_table_data_function_data   ,
    //      &$loaded_datasets
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the specified column value...
    //
    // $loaded_datasets is like:-
    //
    //      $loaded_datasets = array(
    //
    //          <dataset_slug>  =>  array(
    //                                  'title'                 =>  "xxx"           ,
    //                                  'records'               =>  array(...)      ,
    //                                  'key_field_slug'        =>  "xxx" or NULL
    //                                  'record_indices_by_key' =>  array(...)
    //                                  )   ,
    //
    //          ...
    //
    //          )
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          $field_value STRING
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          array( $error_message STRING )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $this_dataset_record_data = Array(
    //          [created_server_datetime_utc]       => 1448932456
    //          [last_modified_server_datetime_utc] => 1448932456
    //          [key]                               => c574b600-eb75-49fc-9722-f82af8927d52-1448932456-396001-5235
    //          [ad_swapper_site_sid]               => 2kmv-hzgc
    //          [site_title]                        => Plugdev
    //          [home_page_url]                     => http://localhost/plugdev
    //          [general_description]               =>
    //          [ads_wanted_description]            =>
    //          [sites_wanted_description]          =>
    //          [question_trial_mode_site]          =>
    //          [subscription_type]                 => trial
    //          [this_site_approves_plugin_site]    => 1
    //          [this_site_targets_plugin_site]     => 1
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $this_dataset_record_data , '$this_dataset_record_data' ) ;

    // -------------------------------------------------------------------------

    $yes = <<<EOT
<span style="color:#666666; font-weight:bold">YES</span>
EOT;

    // -------------------------------------------------------------------------

    $no = <<<EOT
<span style="color:#666666">no</span>
EOT;

    // -------------------------------------------------------------------------

    if ( $this_dataset_record_data['this_site_targets_plugin_site'] ) {
        return $yes ;
    }

    // -------------------------------------------------------------------------

    return $no ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// custom_get_filter_titles_by_value_function()
// =============================================================================

function custom_get_filter_titles_by_value_function(
    $core_plugapp_dirs                          ,
    $all_application_dataset_definitions        ,
    $selected_datasets_dmdd                     ,
    $dataset_records                            ,
    $dataset_title                              ,
    $dataset_slug                               ,
    $question_front_end                         ,
    $table_data                                 ,
    $safe_dataset_title                         ,
    $filter_details                             ,
    $cookie_name                                ,
    $toolbar_ui_type                            ,
    $currently_selected_filter_value            ,
    $custom_get_titles_by_value_function_args
    ) {

    // -------------------------------------------------------------------------
    // <custom_get_filter_titles_by_value_function>(
    //      $core_plugapp_dirs                          ,
    //      $all_application_dataset_definitions        ,
    //      $selected_datasets_dmdd                     ,
    //      $dataset_records                            ,
    //      $dataset_title                              ,
    //      $dataset_slug                               ,
    //      $question_front_end                         ,
    //      $table_data                                 ,
    //      $safe_dataset_title                         ,
    //      $filter_details                             ,
    //      $cookie_name                                ,
    //      $toolbar_ui_type                            ,
    //      $currently_selected_filter_value            ,
    //      $custom_get_titles_by_value_function_args
    //      )
    // - - - - - - - - - - - - - - - - -
    // $filter_details is (eg):-
    //
    //      $filter_details = Array(
    //          [toolbar_title]                             =>  Record Structure                            ,
    //          [toolbar_ui_type]                           =>  'dropdown'                                  ,
    //          [cookie_name]                               =>  validata-field-filter-record-structure      ,
    //          [default_cookie_value]                      =>  ''                                          ,
    //          [custom_get_toolbar_html_function]          =>  NULL                                        ,
    //          [custom_get_toolbar_html_function_args]     =>  NULL                                        ,
    //          [custom_get_titles_by_value_function]       =>  NULL                                        ,
    //          [custom_get_titles_by_value_function_args]  =>  NULL                                        ,
    //          [custom_record_filtering_function]          =>  NULL                                        ,
    //          [custom_record_filtering_function_args]     =>  NULL                                        ,
    //          [foreign_dataset_field_args]                =>  array(
    //              [foreign_dataset_slug]      =>  validata_record_structures      ,
    //              [foreign_match_field_slug]  =>  key                             ,
    //              [foreign_title_field_slug]  =>  slug                            ,
    //              [this_match_field_slug]     =>  record_structure_key
    //              )
    //          )
    //
    // RETURNS
    //      On SUCCESS
    //          $filter_titles_by_value = array
    //              "value-1"   =>  "Title 1"
    //              "value-2"   =>  "Title 2"
    //                              ...
    //              "value-N"   =>  "Title N"
    //              ) ARRAY
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    if ( ! array_key_exists( 'pv' , $_GET ) ) {
        return array() ;
    }

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableSites\
    // get_record_counts_by_filter_value(
    //      $core_plugapp_dirs      ,
    //      $dataset_records        ,
    //      $page_variant
    //      )
    // - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          array(
    //              'all'       =>  I
    //              'yes-yes'   =>  J
    //              'yes-no'    =>  K
    //              'no-yes'    =>  L
    //              'no-no'     =>  M
    //              )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    if ( $_GET['pv'] === 'sites-to-advertise' ) {

        // ---------------------------------------------------------------------

        $record_counts_by_filter_value =
            get_record_counts_by_filter_value(
                $core_plugapp_dirs      ,
                $dataset_records        ,
                $_GET['pv']
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $record_counts_by_filter_value ) ) {
            return $record_counts_by_filter_value ;
        }

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $record_counts_by_filter_value = Array(
        //          [all]       => 2
        //          [yes-yes]   => 0
        //          [yes-no]    => 0
        //          [no-yes]    => 1
        //          [no-no]     => 1
        //          )
        //
        // ---------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $record_counts_by_filter_value      ,
//    '$record_counts_by_filter_value'
//    ) ;

        // ---------------------------------------------------------------------

        foreach ( $record_counts_by_filter_value as $name => $value ) {
            if ( $value === 0 ) {
                $record_counts_by_filter_value[ $name ] = 'none' ;
            }
        }
            //  Show "0" as "none"

        // ---------------------------------------------------------------------

        $rcbfv = $record_counts_by_filter_value ;

        // ---------------------------------------------------------------------

        return array(
            'all'       =>  'All The Sites That You Can (Potentially At Least) ADVERTISE ('                         . $rcbfv['all']     . ')'   ,
            'yes-yes'   =>  'YES-YES --- These are The SITES YOU\'RE CURRENTLY ADVERTISING ('                       . $rcbfv['yes-yes'] . ')'   ,
            'yes-no'    =>  'YES-No --- YOU\'RE HAPPY To Advertise Them. But THEY HAVEN\'T REQUESTED This Yet ('    . $rcbfv['yes-no']  . ')'   ,
            'no-yes'    =>  'No-YES --- THEY WANT To Advertise On You. But YOU HAVEN\'T APPROVED This Yet ('        . $rcbfv['no-yes']  . ')'   ,
            'no-no'     =>  'No-No --- Neither Of You Has Yet Requested/Approved Their Advertising On Your Site ('  . $rcbfv['no-no']   . ')'
            ) ;

        // ---------------------------------------------------------------------

    } elseif ( $_GET['pv'] === 'sites-to-advertise-on' ) {

        // ---------------------------------------------------------------------

        $record_counts_by_filter_value =
            get_record_counts_by_filter_value(
                $core_plugapp_dirs      ,
                $dataset_records        ,
                $_GET['pv']
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $record_counts_by_filter_value ) ) {
            return $record_counts_by_filter_value ;
        }

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $record_counts_by_filter_value = Array(
        //          [all]       => 2
        //          [yes-yes]   => 0
        //          [yes-no]    => 0
        //          [no-yes]    => 1
        //          [no-no]     => 1
        //          )
        //
        // ---------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $record_counts_by_filter_value      ,
//    '$record_counts_by_filter_value'
//    ) ;

        // ---------------------------------------------------------------------

        foreach ( $record_counts_by_filter_value as $name => $value ) {
            if ( $value === 0 ) {
                $record_counts_by_filter_value[ $name ] = 'none' ;
            }
        }
            //  Show "0" as "none"

        // ---------------------------------------------------------------------

        $rcbfv = $record_counts_by_filter_value ;

        // ---------------------------------------------------------------------

        return array(
            'all'       =>  'All The Sites That You Can (Potentially At Least) ADVERTISE ON ('                              . $rcbfv['all']     . ')'   ,
            'yes-yes'   =>  'YES-YES --- These are The SITES YOU\'RE CURRENTLY ADVERTISING ON ('                            . $rcbfv['yes-yes'] . ')'   ,
            'yes-no'    =>  'YES-No --- YOU\'VE ASKED To Advertise On Them. But THEY HAVEN\'T APPROVED You Yet ('           . $rcbfv['yes-no']  . ')'   ,
            'no-yes'    =>  'No-YES --- THEY\'VE APPROVED Your Advertising On Them. But YOU HAVEN\'T REQUESTED This Yet ('  . $rcbfv['no-yes']  . ')'   ,
            'no-no'     =>  'No-No --- Neither Of You Has Yet Requested/Approved Your Advertising On Their Site ('          . $rcbfv['no-no']   . ')'
            ) ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    return array() ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// custom_record_filtering_function()
// =============================================================================

function custom_record_filtering_function(
    $core_plugapp_dirs                      ,
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_records                        ,
    $dataset_slug                           ,
    $dataset_title                          ,
    $question_front_end                     ,
    &$loaded_datasets                       ,
    $currently_selected_filter_value
    ) {

    // -------------------------------------------------------------------------
    // <custom_record_filtering_function>(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_records                        ,
    //      $dataset_slug                           ,
    //      $dataset_title                          ,
    //      $question_front_end                     ,
    //      &$loaded_datasets                       ,
    //      $currently_selected_filter_value
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // $currently_selected_filter_value is the filter (COOKIE) value to be
    // used.
    //
    // RETURNS
    //      On SUCCESS
    //          $filtered_dataset_records ARRAY
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $_GET = Array(
    //                  [page]         => pluginPlant
    //                  [action]       => manage-dataset
    //                  [application]  => ad-swapper
    //                  [dataset_slug] => ad_swapper_available_sites
    //                  )
    //
    //      --OR--
    //
    //      $_GET = Array(
    //                  [page]         => pluginPlant
    //                  [action]       => manage-dataset
    //                  [application]  => ad-swapper
    //                  [dataset_slug] => ad_swapper_available_sites
    //                  [pv]           => sites-to-advertise
    //                  )
    //
    //      --OR--
    //
    //      $_GET = Array(
    //                  [page]         => pluginPlant
    //                  [action]       => manage-dataset
    //                  [application]  => ad-swapper
    //                  [dataset_slug] => ad_swapper_available_sites
    //                  [pv]           => sites-to-advertise-on
    //                  )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $_GET       ,
//    '$_GET'
//    ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $_COOKIE    ,
//    '$_COOKIE'
//    ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $dataset_records = Array(
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]       => 1448932456
    //                      [last_modified_server_datetime_utc] => 1448932456
    //                      [key]                               => c574b600-eb75-49fc-9722-f82af8927d52-1448932456-396001-5235
    //                      [ad_swapper_site_sid]               => 2kmv-hzgc
    //                      [site_title]                        => Plugdev
    //                      [home_page_url]                     => http://localhost/plugdev
    //                      [general_description]               =>
    //                      [ads_wanted_description]            =>
    //                      [sites_wanted_description]          =>
    //                      [question_trial_mode_site]          =>
    //                      [subscription_type]                 => trial
    //                      [this_site_approves_plugin_site]    => 1
    //                      [this_site_targets_plugin_site]     => 1
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $dataset_records    ,
//    '$dataset_records'
//    ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $loaded_datasets    ,
//    '$loaded_datasets'
//    ) ;

    // =========================================================================
    // pv ?
    // =========================================================================

    if (    ! array_key_exists(
                'pv'        ,
                $_GET
                )
        ) {
        return $dataset_records ;
    }

    // -------------------------------------------------------------------------

    if (    ! in_array(
                $_GET['pv']                                                 ,
                array( 'sites-to-advertise' , 'sites-to-advertise-on' )     ,
                TRUE
                )
        ) {
        return array() ;
    }

    // =========================================================================
    // Init. #1
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Get the PLUGIN SITE'S SUBSCRIPTION STATUS...
    // =========================================================================

    require_once( $core_plugapp_dirs['apps_dot_app_dir'] . '/site-and-plugin-status-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_siteAndPluginStatusSupport\
    // get_site_and_plugin_status()
    // - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $site_and_plugin_status ARRAY
    //
    //          Which array should be like (eg):-
    //
    //              $site_and_plugin_status = array(
    //                  'last_central_data_retrieval_time_gmt'  =>  <this-time()>                       ,
    //                  'subscription_license_key'              =>  '' or 32-char HEX string            ,
    //                  'exact_subscription_type'               =>  'trial", "paid", "manual", etc      ,
    //                  'effective_subscription_type'           =>  'trial" or "paid"                   ,
    //                  'subscription_start_datetime_gmt'       =>  <that-time()>                       ,
    //                  'subscription_expiry_datetime_gmt'      =>  <the-other-time()>                  ,
    //                  'central_plugin_version'                =>  'X.Y.Z'                             ,
    //                  'min_local_plugin_version'              =>  'A.B.C'                             ,
    //                  'max_local_plugin_version'              =>  'D.E.F'
    //                  )
    //
    //          Though if the "site_and_plugin_status" HASN'T been set yet
    //          (because "Update Local Site" HASN'T been run yet), it will be
    //          like:-
    //
    //              $site_and_plugin_status = array(
    //                  'last_central_data_retrieval_time_gmt'  =>  0           ,
    //                  'subscription_license_key'              =>  'unknown'   ,
    //                  'exact_subscription_type'               =>  'unknown'   ,
    //                  'effective_subscription_type'           =>  'unknown'   ,
    //                  'subscription_start_datetime_gmt'       =>  0           ,
    //                  'subscription_expiry_datetime_gmt'      =>  0           ,
    //                  'central_plugin_version'                =>  'unknown'   ,
    //                  'min_local_plugin_version'              =>  'unknown'   ,
    //                  'max_local_plugin_version'              =>  'unknown'
    //                  )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $site_and_plugin_status =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_siteAndPluginStatusSupport\get_site_and_plugin_status()
        ;

    // -------------------------------------------------------------------------

    if ( is_string( $site_and_plugin_status ) ) {
        return $site_and_plugin_status ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $site_and_plugin_status = Array(
    //          [subscription_license_key]             => 8bb5a535f3b949223e4be34bccfe97fe
    //          [exact_subscription_type]              => paid
    //          [effective_subscription_type]          => paid
    //          [subscription_start_datetime_gmt]      => 1449313376
    //          [subscription_expiry_datetime_gmt]     => 1478564757
    //          [central_plugin_version]               => latest
    //          [min_local_plugin_version]             => unknown
    //          [max_local_plugin_version]             => unknown
    //          [last_central_data_retrieval_time_gmt] => 1449393461
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $site_and_plugin_status     ,
//    '$site_and_plugin_status'
//    ) ;

    // -------------------------------------------------------------------------

    if (    in_array(
                $site_and_plugin_status['effective_subscription_type']      ,
                array( 'trial' , 'paid' )                                   ,
                TRUE
                )
        ) {

        $plugin_sites_subscription_type =
            $site_and_plugin_status['effective_subscription_type']
            ;

    } else {

        $plugin_sites_subscription_type = 'trial' ;

    }

    // =========================================================================
    // Get the OTHER SITE SPECIFIC SETTINGS (indexed by site sid)...
    // =========================================================================

    $other_site_specific_settings_dataset_slug =
        'ad_swapper_other_site_specific_settings'
        ;

    // -------------------------------------------------------------------------

    if (    array_key_exists(
                $other_site_specific_settings_dataset_slug  ,
                $loaded_datasets
                )
        ) {

        // ---------------------------------------------------------------------

        $other_site_specific_settings_records =
            $loaded_datasets[ $other_site_specific_settings_dataset_slug ]['records']
            ;

        // ---------------------------------------------------------------------

    } else {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_dataset_title_records_key_field_slug_and_record_indices_by_key(
        //      $all_application_dataset_definitions    ,
        //      $dataset_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      o   On SUCCESS
        //              ARRAY(
        //                  $dataset_title                  STRING
        //                  $dataset_records                ARRAY
        //                  $array_storage_key_field_slug   STRING
        //                  $record_indices_by_key          ARRAY
        //                  )
        //
        //      o   On FAILURE
        //              $error_message STRING
        // -------------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_dataset_title_records_key_field_slug_and_record_indices_by_key(
                $all_application_dataset_definitions        ,
                $other_site_specific_settings_dataset_slug
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        $loaded_datasets[ $other_site_specific_settings_dataset_slug ] = array(
            'title'                         =>  $result[0]      ,
            'records'                       =>  $result[1]      ,
            'key_field_slug'                =>  $result[2]      ,
            'record_indices_by_key'         =>  $result[3]
            ) ;

        // ---------------------------------------------------------------------

        $other_site_specific_settings_records = $result[1] ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $other_site_specific_settings_records = Array(
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]                   => 1446798206
    //                      [last_modified_server_datetime_utc]             => 1446798206
    //                      [key]                                           => 83d10f9a-13c0-46fd-bdc6-948f0d6be5b6-1446798205-969982-5107
    //                      [ad_swapper_site_sid]                           => 2kmv-hzgc
    //                      [question_display_your_ads_on_this_site]        => 1
    //                      [question_display_this_sites_ads_on_your_site]  =>
    //                      )
    //
    //          ...
    //
    //          )
    //
    //      )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $other_site_specific_settings_records       ,
//    '$other_site_specific_settings_records'
//    ) ;

    // =========================================================================
    // Create two lists:-
    //      o   $site_sids_to_display_on_your_site
    //      o   $site_sids_you_want_to_advertise_on
    // =========================================================================

    $site_sids_to_display_on_your_site  = array() ;
    $site_sids_you_want_to_advertise_on = array() ;

    // -------------------------------------------------------------------------

    foreach ( $other_site_specific_settings_records as $this_record ) {

        if ( $this_record['question_display_this_sites_ads_on_your_site'] ) {
            $site_sids_to_display_on_your_site[] = $this_record['ad_swapper_site_sid'] ;
        }

        if ( $this_record['question_display_your_ads_on_this_site'] ) {
            $site_sids_you_want_to_advertise_on[] = $this_record['ad_swapper_site_sid'] ;
        }

    }

    // =========================================================================
    // Init. #2
    // =========================================================================

    $filtered_dataset_records = array() ;

    // =========================================================================
    // SITES TO ADVERTISE...
    // =========================================================================

    if ( $_GET['pv'] === 'sites-to-advertise' ) {

        // ---------------------------------------------------------------------
        // NOTES!
        // ======
        // 1.   Both "trial" and "paid" subscription sites can advertise ALL
        //      other sites.
        //
        // 2.   So it's just a case of implementing the "yes-yes" (etc)
        //      filters.
        // ---------------------------------------------------------------------

        if ( $currently_selected_filter_value === 'yes-yes' ) {
            $question_plugin_approves_this = TRUE  ;
            $question_this_targets_plugin  = TRUE  ;

        } elseif ( $currently_selected_filter_value === 'yes-no' ) {
            $question_plugin_approves_this = TRUE  ;
            $question_this_targets_plugin  = FALSE ;

        } elseif ( $currently_selected_filter_value === 'no-yes' ) {
            $question_plugin_approves_this = FALSE ;
            $question_this_targets_plugin  = TRUE  ;

        } elseif ( $currently_selected_filter_value === 'no-no' ) {
            $question_plugin_approves_this = FALSE ;
            $question_this_targets_plugin  = FALSE ;

        } elseif ( $currently_selected_filter_value === 'all' ) {
            $question_plugin_approves_this = NULL ;
            $question_this_targets_plugin  = NULL ;
                //  Not used

        } else {

            $ln = __LINE__ - 2 ;

            return <<<EOT
PROBLEM:&nbsp; Unrecognised/unsupported "currently_selected_filter_value" (#1)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        foreach ( $dataset_records as $this_record ) {

            // -----------------------------------------------------------------

            if ( $currently_selected_filter_value === 'all' ) {
                $filtered_dataset_records[] = $this_record ;
                continue ;
            }

            // -----------------------------------------------------------------

            if (    $this_record['this_site_targets_plugin_site'] === $question_this_targets_plugin
                    &&
                    in_array(
                        $this_record['ad_swapper_site_sid']     ,
                        $site_sids_to_display_on_your_site      ,
                        TRUE
                        ) === $question_plugin_approves_this
                ) {
                $filtered_dataset_records[] = $this_record ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        return $filtered_dataset_records ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SITES TO ADVERTISE ON...
    // =========================================================================

    if ( $_GET['pv'] === 'sites-to-advertise-on' ) {

        // ---------------------------------------------------------------------
        // NOTES!
        // ======
        // 1.   "Trial" sites can only advertise on:-
        //      o   "question_trial_mode" sites, and;
        //      o   Themselves.
        //
        // 2.   "Paid" sites can advertise on ALL other sites.
        //
        // 3.   After that, it's just a case of implementing the "yes-yes"
        //      (etc) filters.
        // ---------------------------------------------------------------------

        require_once( $core_plugapp_dirs['apps_plugin_stuff_dir'] . '/includes/ad-swapper-core-stuff.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adSwapperCoreStuff\
        // get_plugin_sites_ad_swapper_site_sid(
        //      $core_plugapp_dirs
        //      )
        // - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      On SUCCESS
        //          $plugin_sites_ad_swapper_site_sid STRING
        //
        //      On FALIURE
        //          ARRAY( $error_message STRING )
        // -------------------------------------------------------------------------

        $plugin_sites_ad_swapper_site_sid =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adSwapperCoreStuff\get_plugin_sites_ad_swapper_site_sid(
                $core_plugapp_dirs
                ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $plugin_sites_ad_swapper_site_sid ) ) {
            return $plugin_sites_ad_swapper_site_sid[0] ;
        }

        // ---------------------------------------------------------------------

        if ( $currently_selected_filter_value === 'yes-yes' ) {
            $question_plugin_targets_this  = TRUE  ;
            $question_this_approves_plugin = TRUE  ;

        } elseif ( $currently_selected_filter_value === 'yes-no' ) {
            $question_plugin_targets_this  = TRUE  ;
            $question_this_approves_plugin = FALSE ;

        } elseif ( $currently_selected_filter_value === 'no-yes' ) {
            $question_plugin_targets_this  = FALSE ;
            $question_this_approves_plugin = TRUE  ;

        } elseif ( $currently_selected_filter_value === 'no-no' ) {
            $question_plugin_targets_this  = FALSE ;
            $question_this_approves_plugin = FALSE ;

        } elseif ( $currently_selected_filter_value === 'all' ) {
            $question_plugin_approves_this = NULL ;
            $question_this_targets_plugin  = NULL ;
                //  Not used

        } else {

            $ln = __LINE__ - 2 ;

            return <<<EOT
PROBLEM:&nbsp; Unrecognised/unsupported "currently_selected_filter_value" (#2)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        foreach ( $dataset_records as $this_record ) {

            // -----------------------------------------------------------------

            if ( $plugin_sites_subscription_type !== 'paid' ) {

                // -------------------------------------------------------------

                if (    $this_record['question_trial_mode_site'] !== TRUE
                        &&
                        $this_record['ad_swapper_site_sid'] !== $plugin_sites_ad_swapper_site_sid
                    ) {
                    continue ;      //  Skip this site
                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            if ( $currently_selected_filter_value === 'all' ) {
                $filtered_dataset_records[] = $this_record ;
                continue ;
            }

            // -----------------------------------------------------------------

            if (    $this_record['this_site_approves_plugin_site'] === $question_this_approves_plugin
                    &&
                    in_array(
                        $this_record['ad_swapper_site_sid']     ,
                        $site_sids_you_want_to_advertise_on     ,
                        TRUE
                        ) === $question_plugin_targets_this
                ) {
                $filtered_dataset_records[] = $this_record ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        return $filtered_dataset_records ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // ERROR!
    // =========================================================================

    $ln = __LINE__ ;

    return <<<EOT
PROBLEM:&nbsp; Unrecognised/unsupported "pv"
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_record_counts_by_filter_value()
// =============================================================================

function get_record_counts_by_filter_value(
    $core_plugapp_dirs      ,
    $dataset_records        ,
    $page_variant
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableSites\
    // get_record_counts_by_filter_value(
    //      $core_plugapp_dirs      ,
    //      $dataset_records        ,
    //      $page_variant
    //      )
    // - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          array(
    //              'all'       =>  I
    //              'yes-yes'   =>  J
    //              'yes-no'    =>  K
    //              'no-yes'    =>  L
    //              'no-no'     =>  M
    //              )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $dataset_records = Array(
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]       => 1448932456
    //                      [last_modified_server_datetime_utc] => 1448932456
    //                      [key]                               => c574b600-eb75-49fc-9722-f82af8927d52-1448932456-396001-5235
    //                      [ad_swapper_site_sid]               => 2kmv-hzgc
    //                      [site_title]                        => Plugdev
    //                      [home_page_url]                     => http://localhost/plugdev
    //                      [general_description]               =>
    //                      [ads_wanted_description]            =>
    //                      [sites_wanted_description]          =>
    //                      [question_trial_mode_site]          =>
    //                      [subscription_type]                 => trial
    //                      [this_site_approves_plugin_site]    =>
    //                      [this_site_targets_plugin_site]     =>
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $dataset_records        ,
//    '$dataset_records'
//    ) ;

    // =========================================================================
    // Get the PLUGIN SITE'S SUBSCRIPTION STATUS...
    // =========================================================================

    require_once( $core_plugapp_dirs['apps_dot_app_dir'] . '/site-and-plugin-status-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_siteAndPluginStatusSupport\
    // get_site_and_plugin_status()
    // - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $site_and_plugin_status ARRAY
    //
    //          Which array should be like (eg):-
    //
    //              $site_and_plugin_status = array(
    //                  'last_central_data_retrieval_time_gmt'  =>  <this-time()>                       ,
    //                  'subscription_license_key'              =>  '' or 32-char HEX string            ,
    //                  'exact_subscription_type'               =>  'trial", "paid", "manual", etc      ,
    //                  'effective_subscription_type'           =>  'trial" or "paid"                   ,
    //                  'subscription_start_datetime_gmt'       =>  <that-time()>                       ,
    //                  'subscription_expiry_datetime_gmt'      =>  <the-other-time()>                  ,
    //                  'central_plugin_version'                =>  'X.Y.Z'                             ,
    //                  'min_local_plugin_version'              =>  'A.B.C'                             ,
    //                  'max_local_plugin_version'              =>  'D.E.F'
    //                  )
    //
    //          Though if the "site_and_plugin_status" HASN'T been set yet
    //          (because "Update Local Site" HASN'T been run yet), it will be
    //          like:-
    //
    //              $site_and_plugin_status = array(
    //                  'last_central_data_retrieval_time_gmt'  =>  0           ,
    //                  'subscription_license_key'              =>  'unknown'   ,
    //                  'exact_subscription_type'               =>  'unknown'   ,
    //                  'effective_subscription_type'           =>  'unknown'   ,
    //                  'subscription_start_datetime_gmt'       =>  0           ,
    //                  'subscription_expiry_datetime_gmt'      =>  0           ,
    //                  'central_plugin_version'                =>  'unknown'   ,
    //                  'min_local_plugin_version'              =>  'unknown'   ,
    //                  'max_local_plugin_version'              =>  'unknown'
    //                  )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $site_and_plugin_status =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_siteAndPluginStatusSupport\get_site_and_plugin_status()
        ;

    // -------------------------------------------------------------------------

    if ( is_string( $site_and_plugin_status ) ) {
        return $site_and_plugin_status ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $site_and_plugin_status = Array(
    //          [subscription_license_key]             => 8bb5a535f3b949223e4be34bccfe97fe
    //          [exact_subscription_type]              => paid
    //          [effective_subscription_type]          => paid
    //          [subscription_start_datetime_gmt]      => 1449313376
    //          [subscription_expiry_datetime_gmt]     => 1478564757
    //          [central_plugin_version]               => latest
    //          [min_local_plugin_version]             => unknown
    //          [max_local_plugin_version]             => unknown
    //          [last_central_data_retrieval_time_gmt] => 1449393461
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $site_and_plugin_status     ,
//    '$site_and_plugin_status'
//    ) ;

    // -------------------------------------------------------------------------

    if (    in_array(
                $site_and_plugin_status['effective_subscription_type']      ,
                array( 'trial' , 'paid' )                                   ,
                TRUE
                )
        ) {

        $plugin_sites_subscription_type =
            $site_and_plugin_status['effective_subscription_type']
            ;

    } else {

        $plugin_sites_subscription_type = 'trial' ;

    }

    // =========================================================================
    // Get the OTHER SITE SPECIFIC SETTINGS (indexed by site sid)...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\
    // load_numerically_indexed(
    //      $dataset_name                       ,
    //      $question_die_on_error = FALSE      ,
    //      $array_storage_data = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Loads and returns the specified PHP numerically indexed array.
    //
    // $array_storage_data can be either:-
    //
    //      o   NULL (in which case:-
    //              $GLOBALS['GREAT_KIWI']['ARRAY_STORAGE']
    //          is used), or;
    //
    //      o   array(
    //              'default_storage_method'    =>  "json" | "basepress-dataset"
    //              'json_data_files_dir'       =>  NULL | "xxx"
    //              'supported_datasets'        =>  $supported_datasets
    //              )
    //          Where $supported_datasets is:-
    //              array(
    //                  '<some_dataset_slug>'   =>  array(
    //                      'storage_method'            =>  NULL | "json" | "basepress-dataset"     ,
    //                      'json_filespec'             =>  NULL | "xxx"                            ,
    //                      'basepress_dataset_handle'  =>  $some_basepress_dataset_handle
    //                      )
    //                  ...
    //                  )
    //          Where $some_basepress_dataset_handle is (eg):-
    //              array(
    //                  'nice_name'     =>  'adSwapper_byFerntec_someDatasetName'   ,
    //                  'unique_key'    =>  $some_basepress_dataset_uid             ,
    //                  'version'       =>  '0.1'
    //                  )
    //          Where $some_basepress_dataset_uid is (eg):-
    //              '2f35c079-ef2e-4dea-a0e2-f1f861375aef' . '-' .
    //              'afe2576d-76b2-4a5c-83a3-60b652467438' . '-' .
    //              '995a2d40-63d3-11e3-949a-0800200c9a66' . '-' .
    //              'a6acf950-63d3-11e3-949a-0800200c9a66'
    //              ;
    //
    // RETURNS
    //      o   On SUCCESS
    //          - - - - -
    //          ARRAY $array
    //          A possibly empty PHP numerically indexed ARRAY.
    //
    //      o   On FAILURE
    //          - - - - -
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $other_site_specific_settings_dataset_slug =
        'ad_swapper_other_site_specific_settings'
        ;

    // -------------------------------------------------------------------------

    $other_site_specific_settings_records =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\load_numerically_indexed(
            $other_site_specific_settings_dataset_slug
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $other_site_specific_settings_records ) ) {
        return $other_site_specific_settings_records ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $other_site_specific_settings_records = Array(
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]                   => 1446798206
    //                      [last_modified_server_datetime_utc]             => 1446798206
    //                      [key]                                           => 83d10f9a-13c0-46fd-bdc6-948f0d6be5b6-1446798205-969982-5107
    //                      [ad_swapper_site_sid]                           => 2kmv-hzgc
    //                      [question_display_your_ads_on_this_site]        => 1
    //                      [question_display_this_sites_ads_on_your_site]  =>
    //                      )
    //
    //          ...
    //
    //          )
    //
    //      )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $other_site_specific_settings_records       ,
//    '$other_site_specific_settings_records'
//    ) ;

    // =========================================================================
    // Create two lists:-
    //      o   $site_sids_to_display_on_your_site
    //      o   $site_sids_you_want_to_advertise_on
    // =========================================================================

    $site_sids_to_display_on_your_site  = array() ;
    $site_sids_you_want_to_advertise_on = array() ;

    // -------------------------------------------------------------------------

    foreach ( $other_site_specific_settings_records as $this_record ) {

        if ( $this_record['question_display_this_sites_ads_on_your_site'] ) {
            $site_sids_to_display_on_your_site[] = $this_record['ad_swapper_site_sid'] ;
        }

        if ( $this_record['question_display_your_ads_on_this_site'] ) {
            $site_sids_you_want_to_advertise_on[] = $this_record['ad_swapper_site_sid'] ;
        }

    }

    // =========================================================================
    // Loop over tne dataset records, counting those in each filter category...
    // =========================================================================

    $record_counts = array(
        'all'       =>  0   ,
        'yes-yes'   =>  0   ,
        'yes-no'    =>  0   ,
        'no-yes'    =>  0   ,
        'no-no'     =>  0
        ) ;

    // -------------------------------------------------------------------------

    if ( $page_variant === 'sites-to-advertise' ) {

        // ---------------------------------------------------------------------

        foreach ( $dataset_records as $this_record ) {

            // -----------------------------------------------------------------

            $record_counts['all']++ ;

            // -----------------------------------------------------------------

            if (    in_array(
                        $this_record['ad_swapper_site_sid']     ,
                        $site_sids_to_display_on_your_site      ,
                        TRUE
                        )
                ) {

                // -------------------------------------------------------------

                if ( $this_record['this_site_targets_plugin_site'] ) {
                    $record_counts['yes-yes']++ ;

                } else {
                    $record_counts['yes-no']++ ;

                }

                // -------------------------------------------------------------

            } else {

                // -------------------------------------------------------------

                if ( $this_record['this_site_targets_plugin_site'] ) {
                    $record_counts['no-yes']++ ;

                } else {
                    $record_counts['no-no']++ ;

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    } elseif ( $page_variant === 'sites-to-advertise-on' ) {

        // ---------------------------------------------------------------------
        // NOTES!
        // ======
        // 1.   "Trial" sites can only advertise on:-
        //      o   "question_trial_mode" sites, and;
        //      o   Themselves.
        //
        // 2.   "Paid" sites can advertise on ALL other sites.
        //
        // 3.   After that, it's just a case of implementing the "yes-yes"
        //      (etc) filters.
        // ---------------------------------------------------------------------

        require_once( $core_plugapp_dirs['apps_plugin_stuff_dir'] . '/includes/ad-swapper-core-stuff.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adSwapperCoreStuff\
        // get_plugin_sites_ad_swapper_site_sid(
        //      $core_plugapp_dirs
        //      )
        // - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      On SUCCESS
        //          $plugin_sites_ad_swapper_site_sid STRING
        //
        //      On FALIURE
        //          ARRAY( $error_message STRING )
        // -------------------------------------------------------------------------

        $plugin_sites_ad_swapper_site_sid =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adSwapperCoreStuff\get_plugin_sites_ad_swapper_site_sid(
                $core_plugapp_dirs
                ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $plugin_sites_ad_swapper_site_sid ) ) {
            return $plugin_sites_ad_swapper_site_sid[0] ;
        }

        // ---------------------------------------------------------------------

        foreach ( $dataset_records as $this_record ) {

            // -----------------------------------------------------------------
            // Can the plugin site advertise on this site ?
            // -----------------------------------------------------------------

            if ( $plugin_sites_subscription_type !== 'paid' ) {

                // -------------------------------------------------------------

                if (    $this_record['question_trial_mode_site'] !== TRUE
                        &&
                        $this_record['ad_swapper_site_sid'] !== $plugin_sites_ad_swapper_site_sid
                    ) {
                    continue ;      //  Skip this site
                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------
            // YES; increment the appropriate counts...
            // -----------------------------------------------------------------

            $record_counts['all']++ ;

            // -----------------------------------------------------------------

            if (    in_array(
                        $this_record['ad_swapper_site_sid']     ,
                        $site_sids_you_want_to_advertise_on     ,
                        TRUE
                        )
                ) {

                // -------------------------------------------------------------

                if ( $this_record['this_site_approves_plugin_site'] ) {
                    $record_counts['yes-yes']++ ;

                } else {
                    $record_counts['yes-no']++ ;

                }

                // -------------------------------------------------------------

            } else {

                // -------------------------------------------------------------

                if ( $this_record['this_site_approves_plugin_site'] ) {
                    $record_counts['no-yes']++ ;

                } else {
                    $record_counts['no-no']++ ;

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        return array(
                    'all'       =>  '?'     ,
                    'yes-yes'   =>  '?'     ,
                    'yes-no'    =>  '?'     ,
                    'no-yes'    =>  '?'     ,
                    'no-no'     =>  '?'
                    ) ;

        // ---------------------------------------------------------------------
        // ?FIXME ???
        //
        //      Maybe we should return an error message instead ???
        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $record_counts ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_runtime_javascript_4_dataset_record_table()
// =============================================================================

function get_runtime_javascript_4_dataset_record_table() {

    // -------------------------------------------------------------------------
    // get_runtime_javascript_4_dataset_record_table()
    // - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      $runtime_javascript STRING
    //      Can be the empty string.
    //      Must include any necessary <SCRIPT> tags.
    // -------------------------------------------------------------------------

    // =========================================================================
    // Background colour - to highlight - the selected page variant page's
    // key columns (in the Dataset Records Table)...
    // =========================================================================

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // The Dataset Records Table HTML is like (eg):-
    //
    //      <table class="wp-list-table widefat fixed striped ad_swapper_available_sites">
    //
    //          <thead>
    //              <tr>
    //                  <th scope="col" id='site_title_display' class='manage-column column-site_title_display column-primary sortable desc'><a href="http://localhost/plugdev/wp-admin/?page=pluginPlant&#038;action=manage-dataset&#038;application=ad-swapper&#038;dataset_slug=ad_swapper_available_sites&#038;orderby=site_title&#038;order=asc"><span>Site Title</span><span class="sorting-indicator"></span></a></th>
    //                  <th scope="col" id='home_page_url_display' class='manage-column column-home_page_url_display sortable desc'><a href="http://localhost/plugdev/wp-admin/?page=pluginPlant&#038;action=manage-dataset&#038;application=ad-swapper&#038;dataset_slug=ad_swapper_available_sites&#038;orderby=home_page_url&#038;order=asc"><span>Home Page URL</span><span class="sorting-indicator"></span></a></th>
    //                  <th scope="col" id='display_this_sites_ads_on_your_site' class='manage-column column-display_this_sites_ads_on_your_site sortable desc'><a href="http://localhost/plugdev/wp-admin/?page=pluginPlant&#038;action=manage-dataset&#038;application=ad-swapper&#038;dataset_slug=ad_swapper_available_sites&#038;orderby=display_this_sites_ads_on_your_site&#038;order=asc"><span>Display This Site's Ads On Your Site&nbsp;?</span><span class="sorting-indicator"></span></a></th>
    //                  <th scope="col" id='this_site_targets_plugin_site' class='manage-column column-this_site_targets_plugin_site sortable desc'><a href="http://localhost/plugdev/wp-admin/?page=pluginPlant&#038;action=manage-dataset&#038;application=ad-swapper&#038;dataset_slug=ad_swapper_available_sites&#038;orderby=this_site_targets_plugin_site&#038;order=asc"><span>This Site Wants To Advertise On Your Site&nbsp;?</span><span class="sorting-indicator"></span></a></th>
    //                  <th scope="col" id='display_your_ads_on_this_site' class='manage-column column-display_your_ads_on_this_site sortable desc'><a href="http://localhost/plugdev/wp-admin/?page=pluginPlant&#038;action=manage-dataset&#038;application=ad-swapper&#038;dataset_slug=ad_swapper_available_sites&#038;orderby=display_your_ads_on_this_site&#038;order=asc"><span>Display Your Ads On This Site&nbsp;?</span><span class="sorting-indicator"></span></a></th>
    //                  <th scope="col" id='this_site_approves_plugin_site' class='manage-column column-this_site_approves_plugin_site sortable desc'><a href="http://localhost/plugdev/wp-admin/?page=pluginPlant&#038;action=manage-dataset&#038;application=ad-swapper&#038;dataset_slug=ad_swapper_available_sites&#038;orderby=this_site_approves_plugin_site&#038;order=asc"><span>This Site Has Approved Your Site&nbsp;?</span><span class="sorting-indicator"></span></a></th>
    //                  <th scope="col" id='action' class='manage-column column-action'>Action</th>
    //              </tr>
    //          </thead>
    //
    //          <tbody id="the-list" data-wp-lists='list:ad_swapper_available_site'>
    //              <tr>
    //                  <td class='site_title_display column-site_title_display has-row-actions column-primary' data-colname="Site Title"><strong>Plugdev</strong><button type="button" class="toggle-row"><span class="screen-reader-text">Show more details</span></button></td>
    //                  <td class='home_page_url_display column-home_page_url_display' data-colname="Home Page URL"><a href="http://localhost/plugdev"target="_blank">http://localhost/plugdev</a></td>
    //                  <td class='display_this_sites_ads_on_your_site column-display_this_sites_ads_on_your_site' data-colname="Display This Site's Ads On Your Site&nbsp;?"><span style="color:#008000; font-weight:bold">YES</span></td>
    //                  <td class='this_site_targets_plugin_site column-this_site_targets_plugin_site' data-colname="This Site Wants To Advertise On Your Site&nbsp;?"><span style="color:#666666; font-weight:bold">YES</span></td>
    //                  <td class='display_your_ads_on_this_site column-display_your_ads_on_this_site' data-colname="Display Your Ads On This Site&nbsp;?"><span style="color:#008000; font-weight:bold">YES</span></td>
    //                  <td class='this_site_approves_plugin_site column-this_site_approves_plugin_site' data-colname="This Site Has Approved Your Site&nbsp;?"><span style="color:#666666; font-weight:bold">YES</span></td>
    //                  <td class='action column-action' data-colname="Action"><a href="http://localhost/plugdev/wp-admin/admin.php?page=pluginPlant&action=edit-record&application=ad-swapper&dataset_slug=ad_swapper_available_sites&record_key=c574b600-eb75-49fc-9722-f82af8927d52-1448932456-396001-5235" style="text-decoration:none">view/edit</a></td>
    //              </tr>
    //          </tbody>
    //
    //          <tfoot>
    //              <tr>
    //                  <th scope="col"  class='manage-column column-site_title_display column-primary sortable desc'><a href="http://localhost/plugdev/wp-admin/?page=pluginPlant&#038;action=manage-dataset&#038;application=ad-swapper&#038;dataset_slug=ad_swapper_available_sites&#038;orderby=site_title&#038;order=asc"><span>Site Title</span><span class="sorting-indicator"></span></a></th>
    //                  <th scope="col"  class='manage-column column-home_page_url_display sortable desc'><a href="http://localhost/plugdev/wp-admin/?page=pluginPlant&#038;action=manage-dataset&#038;application=ad-swapper&#038;dataset_slug=ad_swapper_available_sites&#038;orderby=home_page_url&#038;order=asc"><span>Home Page URL</span><span class="sorting-indicator"></span></a></th>
    //                  <th scope="col"  class='manage-column column-display_this_sites_ads_on_your_site sortable desc'><a href="http://localhost/plugdev/wp-admin/?page=pluginPlant&#038;action=manage-dataset&#038;application=ad-swapper&#038;dataset_slug=ad_swapper_available_sites&#038;orderby=display_this_sites_ads_on_your_site&#038;order=asc"><span>Display This Site's Ads On Your Site&nbsp;?</span><span class="sorting-indicator"></span></a></th>
    //                  <th scope="col"  class='manage-column column-this_site_targets_plugin_site sortable desc'><a href="http://localhost/plugdev/wp-admin/?page=pluginPlant&#038;action=manage-dataset&#038;application=ad-swapper&#038;dataset_slug=ad_swapper_available_sites&#038;orderby=this_site_targets_plugin_site&#038;order=asc"><span>This Site Wants To Advertise On Your Site&nbsp;?</span><span class="sorting-indicator"></span></a></th>
    //                  <th scope="col"  class='manage-column column-display_your_ads_on_this_site sortable desc'><a href="http://localhost/plugdev/wp-admin/?page=pluginPlant&#038;action=manage-dataset&#038;application=ad-swapper&#038;dataset_slug=ad_swapper_available_sites&#038;orderby=display_your_ads_on_this_site&#038;order=asc"><span>Display Your Ads On This Site&nbsp;?</span><span class="sorting-indicator"></span></a></th>
    //                  <th scope="col"  class='manage-column column-this_site_approves_plugin_site sortable desc'><a href="http://localhost/plugdev/wp-admin/?page=pluginPlant&#038;action=manage-dataset&#038;application=ad-swapper&#038;dataset_slug=ad_swapper_available_sites&#038;orderby=this_site_approves_plugin_site&#038;order=asc"><span>This Site Has Approved Your Site&nbsp;?</span><span class="sorting-indicator"></span></a></th>
    //                  <th scope="col"  class='manage-column column-action'>Action</th>
    //              </tr>
    //          </tfoot>
    //  </table>
    //
    // -------------------------------------------------------------------------

    if (    array_key_exists( 'pv' , $_GET )
            &&
            in_array(
                $_GET['pv']                                                 ,
                array( 'sites-to-advertise' , 'sites-to-advertise-on' )     ,
                TRUE
                )
        ) {
        $pv = $_GET['pv'] ;

    } else {
        $pv = '' ;

    }

    // -------------------------------------------------------------------------

    $cookie_name =
        get_last_displayed_available_sites_page_variant_cookie_name()
        ;

    // -------------------------------------------------------------------------

    return <<<EOT
<script type="text/javascript">

function do_ad_swapper_available_sites_column_highlighting() {

    // -------------------------------------------------------------------------

    var uri = URI( location.href ) ;

    // -------------------------------------------------------------------------

    if ( uri.hasQuery( 'pv' ) !== true ) {
        return ;
    }

    // -------------------------------------------------------------------------

//  var bg = '#C1FFC1' ;    //  Dark Sea Green 1
//  var bg = '#B4EEB4' ;    //  Dark Sea Green 2
    var bg = '#DEF7DE' ;    //  Dark Sea Green 2 (lightened a bit)

    // -------------------------------------------------------------------------

    if ( uri.hasQuery( 'pv' , 'sites-to-advertise' ) ) {

        // ---------------------------------------------------------------------

        jQuery( 'tbody#the-list td' ).each( function( index , td_el ) {
            var class_value = jQuery( td_el ).attr( 'class' ) ;
            if ( class_value.indexOf( 'display_this_sites_ads_on_your_site' ) >= 0 ) {
                td_el.style.backgroundColor = bg ;
            }
        } ) ;

        // ---------------------------------------------------------------------

        jQuery( 'tbody#the-list td' ).each( function( index , td_el ) {
            var class_value = jQuery( td_el ).attr( 'class' ) ;
            if ( class_value.indexOf( 'this_site_targets_plugin_site' ) >= 0 ) {
                td_el.style.backgroundColor = bg ;
            }
        } ) ;

        // ---------------------------------------------------------------------

    }


    // -------------------------------------------------------------------------

    if ( uri.hasQuery( 'pv' , 'sites-to-advertise-on' ) ) {

        // ---------------------------------------------------------------------

        jQuery( 'tbody#the-list td' ).each( function( index , td_el ) {
            var class_value = jQuery( td_el ).attr( 'class' ) ;
            if ( class_value.indexOf( 'display_your_ads_on_this_site' ) >= 0 ) {
                td_el.style.backgroundColor = bg ;
            }
        } ) ;

        // ---------------------------------------------------------------------

        jQuery( 'tbody#the-list td' ).each( function( index , td_el ) {
            var class_value = jQuery( td_el ).attr( 'class' ) ;
            if ( class_value.indexOf( 'this_site_approves_plugin_site' ) >= 0 ) {
                td_el.style.backgroundColor = bg ;
            }
        } ) ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

}

    // -------------------------------------------------------------------------

    scottHamperCookies.set( '{$cookie_name}' , '{$pv}' ) ;

    // -------------------------------------------------------------------------

    do_ad_swapper_available_sites_column_highlighting() ;

    // -------------------------------------------------------------------------

</script>
EOT;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_last_displayed_available_sites_page_variant_cookie_name()
// =============================================================================

function get_last_displayed_available_sites_page_variant_cookie_name() {
    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableSites\
    // get_last_displayed_available_sites_page_variant_cookie_name()
    // -------------------------------------------------------------------------
    return 'ad_swapper_last_available_sites_pv' ;
    // -------------------------------------------------------------------------
}

// =============================================================================
// get_cancel_button_onclick_attribute_value_4_available_sites()
// =============================================================================

function get_cancel_button_onclick_attribute_value_4_available_sites(
    $home_page_title                                            ,
    $caller_apps_includes_dir                                   ,
    $all_application_dataset_definitions                        ,
    $dataset_slug                                               ,
    $question_front_end                                         ,
    $display_options                                            ,
    $submission_options                                         ,
    $selected_datasets_dmdd                                     ,
    $dataset_title                                              ,
    $dataset_records                                            ,
    $record_indices_by_key                                      ,
    $question_adding                                            ,
    $form_slug_underscored                                      ,
    $array_storage_field_indices_to_base64_encode_pre_check     ,
    $zebra_form_field_number                                    ,
    $zebra_form_field_details                                   ,
    $the_record                                                 ,
    $the_records_index                                          ,
    $array_storage_field_slugs                                  ,
    $extra_args
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableSites\
    // get_cancel_button_onclick_attribute_value_4_available_sites(
    //      $home_page_title                                            ,
    //      $caller_apps_includes_dir                                   ,
    //      $all_application_dataset_definitions                        ,
    //      $dataset_slug                                               ,
    //      $question_front_end                                         ,
    //      $display_options                                            ,
    //      $submission_options                                         ,
    //      $selected_datasets_dmdd                                     ,
    //      $dataset_title                                              ,
    //      $dataset_records                                            ,
    //      $record_indices_by_key                                      ,
    //      $question_adding                                            ,
    //      $form_slug_underscored                                      ,
    //      $array_storage_field_indices_to_base64_encode_pre_check     ,
    //      $zebra_form_field_number                                    ,
    //      $zebra_form_field_details                                   ,
    //      $the_record                                                 ,
    //      $the_records_index                                          ,
    //      $array_storage_field_slugs                                  ,
    //      $extra_args
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      o   On SUCCESS!
    //              $attribute_value STRING
    //
    //      o   On FAILURE!
    //              ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $_COOKIE    ,
//    '$_COOKIE'
//    ) ;

    // -------------------------------------------------------------------------

    $cookie_name =
        get_last_displayed_available_sites_page_variant_cookie_name()
        ;

    // -------------------------------------------------------------------------

    if (    array_key_exists(
                $cookie_name    ,
                $_COOKIE
                )
            &&
            in_array(
                $_COOKIE[ $cookie_name ]                                    ,
                array( 'sites-to-advertise' , 'sites-to-advertise-on' )     ,
                TRUE
                )
        ) {

        // ---------------------------------------------------------------------

        require_once( $caller_apps_includes_dir . '/dataset-manager/get-dataset-urls.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_manage_dataset_url(
        //      $caller_apps_includes_dir   ,
        //      $question_front_end         ,
        //      $dataset_slug = NULL        ,
        //      $page_variant = NULL
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Returns the "manage-dataset" URL.
        //
        // If $dataset_slug is NULL, then we use:-
        //      $_GET['dataset_slug']
        //
        // If a STRING $page_variant slug is supplied, it's the CALLER's job to
        // ensure that it's defined.  In:-
        //      $selected_datasets_dmdd['dataset_records_table']['page_variants']
        //
        // RETURNS
        //      o   On SUCCESS!
        //          - - - - - -
        //          STRING $url
        //
        //      o   On FAILURE!
        //          - - - - - -
        //          ARRAY( $error_message STRING )
        // -------------------------------------------------------------------------

        $page_variant = $_COOKIE[ $cookie_name ] ;

        // ---------------------------------------------------------------------

        $pv_url =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_manage_dataset_url(
                $caller_apps_includes_dir   ,
                $question_front_end         ,
                $dataset_slug               ,
                $page_variant
                ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $pv_url ) ) {
            return $pv_url ;
        }

        // ---------------------------------------------------------------------

        return <<<EOT
window.parent.location.href="{$pv_url}"
EOT;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    return
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_cancel_button_onclick_attribute_value(
            $home_page_title                                            ,
            $caller_apps_includes_dir                                   ,
            $all_application_dataset_definitions                        ,
            $dataset_slug                                               ,
            $question_front_end                                         ,
            $display_options                                            ,
            $submission_options                                         ,
            $selected_datasets_dmdd                                     ,
            $dataset_title                                              ,
            $dataset_records                                            ,
            $record_indices_by_key                                      ,
            $question_adding                                            ,
            $form_slug_underscored                                      ,
            $array_storage_field_indices_to_base64_encode_pre_check     ,
            $zebra_form_field_number                                    ,
            $zebra_form_field_details                                   ,
            $the_record                                                 ,
            $the_records_index                                          ,
            $array_storage_field_slugs                                  ,
            $extra_args
            ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_pv_header_html_4_sites_to_advertise()
// =============================================================================

function get_pv_header_html_4_sites_to_advertise(
    $core_plugapp_dirs                      ,
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_records                        ,
    $dataset_title                          ,
    $dataset_slug                           ,
    $question_front_end                     ,
    $table_data                             ,
    $page_variant_slug                      ,
    $page_variant_details                   ,
    $extra_args
    ) {

    // -------------------------------------------------------------------------
    // <my_custom_get_header_html_4_<page_variant_slug>-function>(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_records                        ,
    //      $dataset_title                          ,
    //      $dataset_slug                           ,
    //      $question_front_end                     ,
    //      $table_data                             ,
    //      $page_variant_slug                      ,
    //      $page_variant_details                   ,
    //      $extra_args
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS:-
    //      o   On SUCCESS
    //              $page_variant_header_html_from_function STRING
    //
    //      o   On FAILURE
    //              ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // get_pv_header_sub_title_html(
    //      $core_plugapp_dirs
    //      )
    // - - - - - - - - - - - - - - -
    // RETURNS:-
    //      On SUCCESS
    //          $pv_header_sub_title_html STRING
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    $pv_header_sub_title_html =
        get_pv_header_sub_title_html( $core_plugapp_dirs )
        ;

    // -------------------------------------------------------------------------

    if ( is_array( $pv_header_sub_title_html ) ) {
        return $pv_header_sub_title_html ;
    }

    // -------------------------------------------------------------------------

    return <<<EOT
<h1 style="text-align:center; margin-bottom:0">Select Sites To Advertise</h1>
{$pv_header_sub_title_html}
EOT;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_pv_header_html_4_sites_to_advertise_on()
// =============================================================================

function get_pv_header_html_4_sites_to_advertise_on(
    $core_plugapp_dirs                      ,
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_records                        ,
    $dataset_title                          ,
    $dataset_slug                           ,
    $question_front_end                     ,
    $table_data                             ,
    $page_variant_slug                      ,
    $page_variant_details                   ,
    $extra_args
    ) {

    // -------------------------------------------------------------------------
    // <my_custom_get_header_html_4_<page_variant_slug>-function>(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_records                        ,
    //      $dataset_title                          ,
    //      $dataset_slug                           ,
    //      $question_front_end                     ,
    //      $table_data                             ,
    //      $page_variant_slug                      ,
    //      $page_variant_details                   ,
    //      $extra_args
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS:-
    //      o   On SUCCESS
    //              $page_variant_header_html_from_function STRING
    //
    //      o   On FAILURE
    //              ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // get_pv_header_sub_title_html(
    //      $core_plugapp_dirs
    //      )
    // - - - - - - - - - - - - - - -
    // RETURNS:-
    //      On SUCCESS
    //          $pv_header_sub_title_html STRING
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    $pv_header_sub_title_html =
        get_pv_header_sub_title_html( $core_plugapp_dirs )
        ;

    // -------------------------------------------------------------------------

    if ( is_array( $pv_header_sub_title_html ) ) {
        return $pv_header_sub_title_html ;
    }

    // -------------------------------------------------------------------------

    return <<<EOT
<h1 style="text-align:center; margin-bottom:0">Select Sites To Advertise On</h1>
{$pv_header_sub_title_html}
EOT;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_pv_header_sub_title_html()
// =============================================================================

function get_pv_header_sub_title_html(
    $core_plugapp_dirs
    ) {

    // -------------------------------------------------------------------------
    // get_pv_header_sub_title_html(
    //      $core_plugapp_dirs
    //      )
    // - - - - - - - - - - - - - - -
    // RETURNS:-
    //      On SUCCESS
    //          $pv_header_sub_title_html STRING
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    require_once( dirname( __FILE__ ) . '/plugin.stuff/includes/ad-swapper-core-stuff.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adSwapperCoreStuff\
    // get_site_profile_record(
    //      $core_plugapp_dirs
    //      )
    // - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $site_profile_record ARRAY
    //
    //          Eg;
    //
    //              $site_profile_record = array(
    //                  [created_server_datetime_utc]       => 1418445063
    //                  [last_modified_server_datetime_utc] => 1418445063
    //                  [key]                               => add9f270-9f5b-429a-a264-f0f5c7cc59db-1418445063-977293-1355
    //                  [site_title]                        => Plugdev
    //                  [home_page_url]                     => http://localhost/plugdev
    //                  [general_description]               =>
    //                  [ads_wanted_description]            =>
    //                  [sites_wanted_description]          =>
    //                  [categories_available]              =>
    //                  [categories_wanted]                 =>
    //                  [geoip_continents_incl]             =>
    //                  [geoip_continents_excl]             =>
    //                  [geoip_countries_incl]              => NZ
    //                  [geoip_countries_excl]              =>
    //                  [geoip_regions_incl]                =>
    //                  [geoip_regions_excl]                =>
    //                  [geoip_cities_incl]                 =>
    //                  [geoip_cities_excl]                 =>
    //                  [max_ads_per_site_per_page]         => 1
    //                  [question_auto_approve_new_ads]     =>
    //                  [test_method]                       => none
    //                  [test_ip]                           => 127.0.0.1
    //                  [question_disable_incoming_ads]     =>
    //                  [question_disable_outgoing_ads]     =>
    //                  [license_key]                       => 8bb5a535f3b949223e4be34bccfe97fe
    //                  [show_ads_list_reload_buttons]      =>
    //                  [question_manual_update_approval]   => 1
    //                  [max_repetitions_per_ad_per_page]   => 1
    //                  )
    //
    //      On FALIURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $site_profile =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adSwapperCoreStuff\get_site_profile_record(
            $core_plugapp_dirs
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $site_profile ) ) {
        return array( $site_profile ) ;
    }

    // -------------------------------------------------------------------------

    $big_font_size = '167%' ;

    // -------------------------------------------------------------------------

    $site_title = <<<EOT
<a  target="_blank"
    href="{$site_profile['home_page_url']}"
    style="text-decoration:none; color:#0066CC; font-size:{$big_font_size}; font-weight:bold"
    >{$site_profile['site_title']}</a>
EOT;

    // -------------------------------------------------------------------------

    require_once( dirname( __FILE__ ) . '/site-and-plugin-status-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_siteAndPluginStatusSupport\
    // get_site_and_plugin_status()
    // - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $site_and_plugin_status ARRAY
    //
    //          Which array should be like (eg):-
    //
    //              $site_and_plugin_status = array(
    //                  'last_central_data_retrieval_time_gmt'  =>  <this-time()>                       ,
    //                  'subscription_license_key'              =>  '' or 32-char HEX string            ,
    //                  'exact_subscription_type'               =>  'trial", "paid", "manual", etc      ,
    //                  'effective_subscription_type'           =>  'trial" or "paid"                   ,
    //                  'subscription_start_datetime_gmt'       =>  <that-time()>                       ,
    //                  'subscription_expiry_datetime_gmt'      =>  <the-other-time()>                  ,
    //                  'central_plugin_version'                =>  'X.Y.Z'                             ,
    //                  'min_local_plugin_version'              =>  'A.B.C'                             ,
    //                  'max_local_plugin_version'              =>  'D.E.F'
    //                  )
    //
    //          Though if the "site_and_plugin_status" HASN'T been set yet
    //          (because "Update Local Site" HASN'T been run yet), it will be
    //          like:-
    //
    //              $site_and_plugin_status = array(
    //                  'last_central_data_retrieval_time_gmt'  =>  0           ,
    //                  'subscription_license_key'              =>  'unknown'   ,
    //                  'exact_subscription_type'               =>  'unknown'   ,
    //                  'effective_subscription_type'           =>  'unknown'   ,
    //                  'subscription_start_datetime_gmt'       =>  0           ,
    //                  'subscription_expiry_datetime_gmt'      =>  0           ,
    //                  'central_plugin_version'                =>  'unknown'   ,
    //                  'min_local_plugin_version'              =>  'unknown'   ,
    //                  'max_local_plugin_version'              =>  'unknown'
    //                  )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $site_and_plugin_status =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_siteAndPluginStatusSupport\get_site_and_plugin_status()
        ;

    // -------------------------------------------------------------------------

    if ( is_string( $site_and_plugin_status ) ) {
        return array( $site_and_plugin_status ) ;
    }

    // -------------------------------------------------------------------------

    $subscription_type = $site_and_plugin_status['effective_subscription_type'] ;

    // -------------------------------------------------------------------------

    if (    ! in_array(
                    $subscription_type          ,
                    array( 'trial' , 'paid' )   ,
                    TRUE
                    )
        ) {
        $subscription_type = '&lt;unknown&gt;' ;
    }

    // -------------------------------------------------------------------------

    $subscription_type = <<<EOT
<span style="color:#0066CC; font-size:{$big_font_size}; font-weight:bold">{$subscription_type}</span>
EOT;

    // -------------------------------------------------------------------------

    if (    trim( $site_and_plugin_status['subscription_expiry_datetime_gmt'] ) !== ''
            &&
            ctype_digit( (string) $site_and_plugin_status['subscription_expiry_datetime_gmt'] )
            &&
            $site_and_plugin_status['subscription_expiry_datetime_gmt']
            >
            time() - ( 3600 * 24 * 365 * 3 )        //  3 years ago+
        ) {

        $expiry_datetime = gmdate(
                                'j M Y,\&\n\b\s\p\; G:i (g:ia)'                                             ,
                                $site_and_plugin_status['subscription_expiry_datetime_gmt']
                                ) ;

        $which_expires = <<<EOT
<span style="margin:0 1em">which expires:&nbsp; <span style="color:#0066CC">{$expiry_datetime}&nbsp; GMT</span></span>
EOT;

    } else {

        $which_expires = '' ;

    }

    // -------------------------------------------------------------------------

    return <<<EOT
<p style="text-align:center; margin-bottom:28px">
    <span style="margin:0 1em">for site:&nbsp; {$site_title}</span>
    <span style="margin:0 1em">which has subscription type:&nbsp; {$subscription_type}</span>
    {$which_expires}
</p>
EOT;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_title_4_includes_plugin_site_title_DRT_column
// =============================================================================

function get_title_4_includes_plugin_site_title_DRT_column (
    $core_plugapp_dirs                      ,
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_records                        ,
    $dataset_title                          ,
    $dataset_slug                           ,
    $question_front_end                     ,
    $table_data                             ,
    $this_column                            ,
    $extra_args
    ) {

    // -------------------------------------------------------------------------
    // <my_custom_get_dataset_records_table_column_label_function>(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_records                        ,
    //      $dataset_title                          ,
    //      $dataset_slug                           ,
    //      $question_front_end                     ,
    //      $table_data                             ,
    //      $this_column                            ,
    //      $extra_args
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $column_label STRING
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $extra_args = "Display This Site's Ads On [*PLUGIN*SITE*TITLE*]&nbsp;?"
    //
    // -------------------------------------------------------------------------

    require_once( $core_plugapp_dirs['apps_plugin_stuff_dir'] . '/includes/ad-swapper-core-stuff.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adSwapperCoreStuff\
    // get_site_profile_record(
    //      $core_plugapp_dirs
    //      )
    // - - - - - - - - - - - -
    // The returned value is cached (in memory) - for speed on the second
    // and subsequent calls.
    //
    // RETURNS
    //      On SUCCESS
    //          $site_profile_record ARRAY
    //
    //          Eg;
    //
    //              $site_profile_record = array(
    //                  [created_server_datetime_utc]       => 1418445063
    //                  [last_modified_server_datetime_utc] => 1418445063
    //                  [key]                               => add9f270-9f5b-429a-a264-f0f5c7cc59db-1418445063-977293-1355
    //                  [site_title]                        => Plugdev
    //                  [home_page_url]                     => http://localhost/plugdev
    //                  [general_description]               =>
    //                  [ads_wanted_description]            =>
    //                  [sites_wanted_description]          =>
    //                  [categories_available]              =>
    //                  [categories_wanted]                 =>
    //                  [geoip_continents_incl]             =>
    //                  [geoip_continents_excl]             =>
    //                  [geoip_countries_incl]              => NZ
    //                  [geoip_countries_excl]              =>
    //                  [geoip_regions_incl]                =>
    //                  [geoip_regions_excl]                =>
    //                  [geoip_cities_incl]                 =>
    //                  [geoip_cities_excl]                 =>
    //                  [max_ads_per_site_per_page]         => 1
    //                  [question_auto_approve_new_ads]     =>
    //                  [test_method]                       => none
    //                  [test_ip]                           => 127.0.0.1
    //                  [question_disable_incoming_ads]     =>
    //                  [question_disable_outgoing_ads]     =>
    //                  [license_key]                       => 8bb5a535f3b949223e4be34bccfe97fe
    //                  [show_ads_list_reload_buttons]      =>
    //                  [question_manual_update_approval]   => 1
    //                  [max_repetitions_per_ad_per_page]   => 1
    //                  )
    //
    //      On FALIURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $site_profile =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adSwapperCoreStuff\get_site_profile_record(
            $core_plugapp_dirs
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $site_profile ) ) {
        return array( $site_profile ) ;
    }

    // -------------------------------------------------------------------------

    $site_title = trim( $site_profile['site_title'] ) ;

    // -------------------------------------------------------------------------

    if ( $site_title === '' ) {
        $site_title = 'Plugin Site' ;

    } elseif ( strlen( $site_title ) > 32 ) {
        $site_title = substr( $site_title , 0 , 32 ) ;

    }

    // -------------------------------------------------------------------------

//    $site_title = <<<EOT
//<div style="display:inline; background-color:#FFFFD7">{$site_title}</div>
//EOT;

//    $site_title = <<<EOT
//<div style="display:inline; color:#000000">{$site_title}</div>
//EOT;

    $site_title = <<<EOT
<b style="color:#555555; font-size:92%">{$site_title}</b>
EOT;

    // -------------------------------------------------------------------------

    $column_title = str_replace(
                        '[*PLUGIN*SITE*TITLE*]'     ,
                        $site_title                 ,
                        $extra_args
                        ) ;

    // -------------------------------------------------------------------------

    return $column_title ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

