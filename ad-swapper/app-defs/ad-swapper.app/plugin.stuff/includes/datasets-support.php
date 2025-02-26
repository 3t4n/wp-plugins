<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / INCLUDES / DATASETS-SUPPORT.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetSupport ;

// =============================================================================
// CACHE VARIABLES
// =============================================================================

    $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetCache'] = NULL ;

    $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_questionDatasetCacheNeedsReloading'] = TRUE ;

    $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_cachedDatasetsThatNeedReloading'] = array() ;

// =============================================================================
// dataset_cache_needs_reloading()
// =============================================================================

function dataset_cache_needs_reloading() {
    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetSupport\
    // dataset_cache_needs_reloading()
    // - - - - - - - - - - - - - - - -
    // Forces:-
    //      \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetSupport\get_ad_swapper_dataset_records()
    // to reload the dataset cache, the next time it's called.
    //
    // RETURNS
    //      nothing
    // -------------------------------------------------------------------------
    $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_questionDatasetCacheNeedsReloading'] = TRUE ;
    // -------------------------------------------------------------------------
}

// =============================================================================
// this_cached_dataset_needs_reloading()
// =============================================================================

function this_cached_dataset_needs_reloading(
    $dataset_slug
    ) {
    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetSupport\
    // this_cached_dataset_needs_reloading(
    //      $dataset_slug
    //      )
    // - - - - - - - - - - - - - - - - - -
    // Forces:-
    //      \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetSupport\get_ad_swapper_dataset_records()
    // to retrieve the CACHED Ad Swapper datasets - but to RELOAD the specified
    // dataset from DISK.
    //
    // RETURNS
    //      nothing
    // -------------------------------------------------------------------------
    if ( ! in_array(
                $dataset_slug       ,
                $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_cachedDatasetsThatNeedReloading']
                )
        ) {
        $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_cachedDatasetsThatNeedReloading'][] = $dataset_slug ;
    }
    // -------------------------------------------------------------------------
}

// =============================================================================
// get_ad_swapper_dataset_records()
// =============================================================================

function get_ad_swapper_dataset_records(
    $core_plugapp_dirs          ,
    $question_front_end
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetSupport\
    // get_ad_swapper_dataset_records(
    //      $core_plugapp_dirs      ,
    //      $question_front_end
    //      )
    // - - - - - - - - - - - - - - -
    // Returns the CACHED Ad Swapper dataset records.
    //
    // RETURNS:-
    //
    //      On FAILURE
    //          $error_message STRING
    //
    //      On SUCCESS
    //          array(
    //              $app_defs_directory_tree                        ,
    //              $applications_dataset_and_view_definitions_etc  ,
    //              $all_application_dataset_definitions            ,
    //              $loaded_datasets
    //              )
    //
    // Where:-
    //
    //      $loaded_datasets = Array(
    //
    //          [ad_swapper_impressions] => Array(
    //              [title]                 => Impressions
    //              [records]               => Array()
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array()
    //              )
    //
    //          [ad_swapper_settings] => Array(
    //              [title]                 => Settings
    //              [records]               => Array(
    //                  [0] => Array(
    //                              [created_server_datetime_utc]       => 1416388978
    //                              [last_modified_server_datetime_utc] => 1416388978
    //                              [key]                               => c885e81e-4af9-40bd-a485-34c9d835d9e5-1416388978-679287-1131
    //                              [api_url_override]                  => http://localhost/plugdev/wp-content/plugins/plugin-plant/app-defs/ad-swapper-central.app/plugin.stuff/api/api-call-handler.php
    //                              )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [c885e81e-4af9-40bd-a485-34c9d835d9e5-1416388978-679287-1131] => 0
    //                  )
    //              )
    //
    //          [ad_swapper_site_profile] => Array(
    //              [title]                 => Site Profile
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1416718948
    //                      [last_modified_server_datetime_utc] => 1416718948
    //                      [key]                               => 9475e467-59b6-4f6d-9f32-5413e2b07c4e-1416718948-108185-1163
    //                      [site_owners_ad_swapper_user_id]    => z4v2-mkcx-wh79-yg3n
    //                      [site_url]                          => http://www.example.com
    //                      [site_title]                        => The Site
    //                      [site_description]                  =>
    //                      [ads_wanted_description]            =>
    //                      [sites_wanted_description]          =>
    //                      [categories_available]              =>
    //                      [categories_wanted]                 =>
    //                      )
    //                  )
    //              [key_field_slug]        => key
    //              [record_indices_by_key] => Array(
    //                  [9475e467-59b6-4f6d-9f32-5413e2b07c4e-1416718948-108185-1163] => 0
    //                  )
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

//  $ns = __NAMESPACE__ ;
//  $fn = __FUNCTION__  ;

    // =========================================================================
    // Already cached ?
    // =========================================================================

    if (    is_array( $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetCache'] )
            &&
            $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_questionDatasetCacheNeedsReloading'] === FALSE
        ) {

        // ---------------------------------------------------------------------
        // Do any specific datasets need reloading ?
        // ---------------------------------------------------------------------

        if ( count( $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_cachedDatasetsThatNeedReloading'] ) > 0 ) {

            // -----------------------------------------------------------------
            // YES - Reload them!
            // -----------------------------------------------------------------

            list(
                $app_defs_directory_tree                        ,
                $applications_dataset_and_view_definitions_etc  ,
                $all_application_dataset_definitions            ,
                $loaded_datasets
                ) = $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetCache'] ;

            // -----------------------------------------------------------------

            foreach ( $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_cachedDatasetsThatNeedReloading'] as $dataset_slug ) {

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
                        $dataset_slug
                        ) ;

                // -------------------------------------------------------------

                if ( is_string( $result ) ) {
                    return $result ;
                }

                // -------------------------------------------------------------

                list(
                    $dataset_title                  ,
                    $dataset_records                ,
                    $array_storage_key_field_slug   ,
                    $record_indices_by_key
                    ) = $result ;

                // -------------------------------------------------------------

                $loaded_datasets[ $dataset_slug ]['records'] =
                    $dataset_records
                    ;

                // -------------------------------------------------------------

                $loaded_datasets[ $dataset_slug ]['record_indices_by_key'] =
                    $record_indices_by_key
                    ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetCache'] =
                array(
                    $app_defs_directory_tree                        ,
                    $applications_dataset_and_view_definitions_etc  ,
                    $all_application_dataset_definitions            ,
                    $loaded_datasets
                    ) ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Return the cached and reloaded (if necessary) datasets...
        // ---------------------------------------------------------------------

        return $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetCache'] ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // Load/reload ALL the datasets...
    // -------------------------------------------------------------------------

    $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetCache'] = NULL ;

    $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_questionDatasetCacheNeedsReloading'] = TRUE ;

    $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_cachedDatasetsThatNeedReloading'] = array() ;

    // =========================================================================
    // Load the application's DATASET DEFINITIONS and DATASETS...
    // =========================================================================

    require_once( $core_plugapp_dirs['dataset_manager_includes_dir'] . '/page-startup-stuff.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // load_datasets(
    //      $app_handle             ,
    //      $question_front_end     ,
    //      $core_plugapp_dirs
    //      )
    // - - - - - - - - - - - - - - -
    // Loads and returns the application's dataset definitions and records.
    //
    // You can call this routine at the start of some PHP page that's called
    // directly - by some url like (eg):-
    //      http://www.example.com/path/to/some-php-file.php
    //
    // Then you have all the info. needed to:-
    //      o   Access the plugin's includes files and scripts, etc.
    //      o   Read/write the plugin's datasets.
    //
    // NOTES!
    // ------
    // 1.   $app_handle is the application's dash-separated, lowercase
    //      name.  Eg:-
    //          "gadgets"
    //          "picture-docs"
    //          "teaser-maker"
    //
    // 2.   $question_front_end should be TRUE or FALSE
    //
    // RETURNS:-
    //
    //      On FAILURE
    //          $error_message STRING
    //
    //      On SUCCESS
    //          array(
    //              $app_defs_directory_tree                        ,
    //              $applications_dataset_and_view_definitions_etc  ,
    //              $all_application_dataset_definitions            ,
    //              $loaded_datasets
    //              )
    //
    // Where:-
    //
    //      $loaded_datasets = Array(
    //
    //          [gadgets] => Array(
    //
    //              [title]                 => Gadgets
    //
    //              [records]               => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_UTC]       => 1402881712
    //                      [last_modified_server_datetime_UTC] => 1402903717
    //                      [author_key]                        =>
    //                      [version_key]                       =>
    //                      [theme_key]                         =>
    //                      [key]                               => fd2958ca-bc52-4015-b6d3-02ce079b0b2f-1402881712-453134-243
    //                      [title]                             => Spaced List Item
    //                      [enabled]                           => 1
    //                      [temporarily_disabled]              =>
    //                      [synopsis]                          => PHAgY4uPC9kaXY+
    //                      [synopsis_format]                   => nl2br
    //                      [description]                       => SW5kZGVtKS4=
    //                      [description_format]                => none
    //                      [docs_url]                          =>
    //                      [screenshot_url]                    => http://localhost/plugdev/wp-content/uploads/2014/06/gadget-screenshot-spaced-list-item.jpeg
    //                      [html_4_head_start]                 =>
    //                      [html_4_head_end]                   =>
    //                      [html_4_body_start]                 =>
    //                      [html_4_body_end]                   =>
    //                      [css_4_head_start]                  =>
    //                      [css_4_head_end]                    => LnNwYWNlZC1sawOw0KfQ==
    //                      [js_4_head_start]                   =>
    //                      [js_4_head_end]                     =>
    //                      [js_4_body_start]                   =>
    //                      [js_4_body_end]                     =>
    //                      )
    //
    //                  ...
    //
    //                  )
    //
    //              [key_field_slug]        => key
    //
    //              [record_indices_by_key] => Array(
    //                  [fd2958ca-bc52-4015-b6d3-02ce079b0b2f-1402881712-453134-243] => 0
    //                  )
    //
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

    $app_handle = 'ad-swapper' ;

    // -------------------------------------------------------------------------

    $result =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\load_datasets(
            $app_handle             ,
            $question_front_end     ,
            $core_plugapp_dirs
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $result ) ) {
        $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetCache'] = $result ;
        $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_questionDatasetCacheNeedsReloading'] = FALSE ;
        $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_cachedDatasetsThatNeedReloading'] = array() ;
    }

    // -------------------------------------------------------------------------

    return $result ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

