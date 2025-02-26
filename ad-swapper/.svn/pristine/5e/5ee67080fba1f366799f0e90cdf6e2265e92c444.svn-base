<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / CUSTOM.PAGES / UPDATE-LOCAL-SITE.CP /
//      UPDATE-AVAILABLE-ADS.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateLocalSite ;

// =============================================================================
// update_available_ads()
// =============================================================================

function update_available_ads(
    $core_plugapp_dirs                      ,
    $question_front_end                     ,
    $all_application_dataset_definitions    ,
    &$loaded_datasets                       ,
    $api_passback_data
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateLocalSite\
    // update_available_ads(
    //      $core_plugapp_dirs                      ,
    //      $question_front_end                     ,
    //      $all_application_dataset_definitions    ,
    //      &$loaded_datasets                       ,
    //      $api_passback_data
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $api_passback_data = Array(
    //
    //          [outgoing_ads] => Array(
    //
    //              [0] => Array(
    //                          [global_sid]            => 9khc-zwmv
    //                          [ad_swapper_site_sid]   => 2kmv-hzgc
    //                          [image_url]             => http://localhost/plugdev/wp-content/uploads/2015/02/ad-swapper-happy-dogs-ad-2.png
    //                          [link_url]              => http://www.nzkc.org.nz/
    //                          [special_type]          =>
    //                          [alt_text]              =>
    //                          [description]           =>
    //                          [start_datetime]        =>
    //                          [end_datetime]          =>
    //                          [aspect_ratio_min]      =>
    //                          [aspect_ratio_max]      =>
    //                          [geoip_continents_incl] =>
    //                          [geoip_continents_excl] =>
    //                          [geoip_countries_incl]  => NZ
    //                          [geoip_countries_excl]  =>
    //                          [geoip_regions_incl]    =>
    //                          [geoip_regions_excl]    =>
    //                          [geoip_cities_incl]     =>
    //                          [geoip_cities_excl]     =>
    //                          )
    //
    //              ...
    //
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $api_passback_data ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $loaded_datasets['ad_swapper_available_ads'] = Array(
    //          [title]                 => Available Ads
    //          [records]               => Array(
    //              [0] => Array(
    //                          [created_server_datetime_utc]       => 1448417351
    //                          [last_modified_server_datetime_utc] => 1448417351
    //                          [key]                               => 8ca5d4a5-361e-44cf-a8ef-58119a5bcfa3-1448417351-326107-5154
    //                          [global_sid]                        => 9khc-zwmv
    //                          [ad_swapper_site_sid]               => 2kmv-hzgc
    //                          [image_url]                         => http://localhost/plugdev/wp-content/uploads/2015/02/ad-swapper-happy-dogs-ad-2.png
    //                          [link_url]                          => http://www.nzkc.org.nz/
    //                          [special_type]                      =>
    //                          [alt_text]                          =>
    //                          [description]                       =>
    //                          [start_datetime]                    =>
    //                          [end_datetime]                      =>
    //                          [aspect_ratio_min]                  =>
    //                          [aspect_ratio_max]                  =>
    //                          [geoip_continents_incl]             =>
    //                          [geoip_continents_excl]             =>
    //                          [geoip_countries_incl]              => NZ
    //                          [geoip_countries_excl]              =>
    //                          [geoip_regions_incl]                =>
    //                          [geoip_regions_excl]                =>
    //                          [geoip_cities_incl]                 =>
    //                          [geoip_cities_excl]                 =>
    //                          [question_display]                  => 1
    //                          )
    //              ...
    //              )
    //          [key_field_slug]        => key
    //          [record_indices_by_key] => Array(
    //              [8641b083-c4e6-444b-adde-5d483d446c0a-1421569237-807000-1423] => 0
    //              )
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $loaded_datasets , '$loaded_datasets' ) ;

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $incoming_outgoing_ads = $api_passback_data['outgoing_ads'] ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $incoming_outgoing_ads      ,
//    '$incoming_outgoing_ads'
//    ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $incoming_outgoing_ads[0]      ,
//    '$incoming_outgoing_ads[0]'
//    ) ;

    // -------------------------------------------------------------------------

    $available_ads_dataset_slug = 'ad_swapper_available_ads' ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $loaded_datasets[ $available_ads_dataset_slug ]['records']      ,
//    '$loaded_datasets[ $available_ads_dataset_slug ][\'records\']'
//    ) ;

    // -------------------------------------------------------------------------

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/sequential-ids-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\
    // question_sequential_id(
    //      $candidate_sid
    //      )
    // - - - - - - - - - - - -
    // Determines whether or not $candidate_sid looks like a sequential ID
    // as generated by (eg):-
    //      get_new_sequential_id()
    //      get_new_sequential_id_thats_unique_in_dataset()
    //
    // or not.  And returns TRUE or FALSE accordingly.
    //
    // In other words, $candidate_sid must be something like (eg):-
    //      "dczv-mwhk"
    //      "9npd-xd2h"
    //      "pxx4-4942-9vwm"
    //      "2n43-3dny-dykm"
    //      etc...
    // -------------------------------------------------------------------------

    // =========================================================================
    // VALIDATA the INCOMING DATA...
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/validata/validate-things.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validata\
    // validate_array_of_records(
    //      $core_plugapp_dirs                  ,
    //      $record_structure_slug              ,
    //      $array_of_records_to_validate       ,
    //      $caller_ns                          ,
    //      $caller_fn                          ,
    //      $caller_ln
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //
    //      On FALSE
    //          $error_message STRING
    //
    //          NOTE!   The error message will probably be multi-line.  Use
    //                  nl2br() or display it in PRE tags, if you don't want
    //                  the lines to wrap.
    // -------------------------------------------------------------------------

    $record_structure_slug = 'ad-swapper-local-incoming-available-ads' ;

    $array_of_records_to_validate = $incoming_outgoing_ads ;

    // -------------------------------------------------------------------------

    $result =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validata\validate_array_of_records(
            $core_plugapp_dirs                  ,
            $record_structure_slug              ,
            $array_of_records_to_validate       ,
            __NAMESPACE__                       ,
            __FUNCTION__                        ,
            __LINE__
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
    }

    // =========================================================================
    // Get the GLOBAL SIDS of the already downloaded records...
    // =========================================================================

    $existing_record_indices_by_global_sid = array() ;

    // -------------------------------------------------------------------------

    foreach ( $loaded_datasets[ $available_ads_dataset_slug ]['records'] as $this_index => $this_record ) {

        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'global_sid' , $this_record ) ) {

            return <<<EOT
PROBLEM:&nbsp; No "global_sid" (in existing "Available Ad")
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        if (    ! is_string( $this_record['global_sid'] )
                ||
                trim( $this_record['global_sid'] ) === ''
            ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "global_sid" (in existing "Available Ad" - non-empty string expected)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        if (    ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\question_sequential_id(
                        $this_record['global_sid']
                        )
            ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "global_sid" (in existing "Available Ad")
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        $existing_record_indices_by_global_sid[ $this_record['global_sid'] ] = $this_index ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Identify the records to ADD and UPDATE...
    // =========================================================================

    $incoming_record_indices_to_add = array() ;

    // -------------------------------------------------------------------------

    $incoming_record_indices_to_update_by_global_sid = array() ;

    // -------------------------------------------------------------------------

    $incoming_global_sids = array() ;

    // -------------------------------------------------------------------------

    foreach ( $incoming_outgoing_ads as $this_incoming_outgoing_ad_index => $this_incoming_outgoing_ad_record ) {

        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'global_sid' , $this_incoming_outgoing_ad_record ) ) {

            return <<<EOT
PROBLEM:&nbsp; No "global_sid" (in incoming "Available Ad")
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        if (    ! is_string( $this_incoming_outgoing_ad_record['global_sid'] )
                ||
                trim( $this_incoming_outgoing_ad_record['global_sid'] ) === ''
            ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "global_sid" (in incoming "Available Ad" - non-empty string expected)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        if (    ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\question_sequential_id(
                        $this_incoming_outgoing_ad_record['global_sid']
                        )
            ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "global_sid" (in incoming "Available Ad")
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        if (    array_key_exists(
                    $this_incoming_outgoing_ad_record['global_sid']     ,
                    $existing_record_indices_by_global_sid
                    )
            ) {
            $incoming_record_indices_to_update_by_global_sid[
                $this_incoming_outgoing_ad_record['global_sid']
                ] = $this_incoming_outgoing_ad_index ;

        } else {
            $incoming_record_indices_to_add[] = $this_incoming_outgoing_ad_index ;

        }

        // ---------------------------------------------------------------------

        $incoming_global_sids[] = $this_incoming_outgoing_ad_record['global_sid'] ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Identify the existing records to DELETE...
    // =========================================================================

    $existing_record_indices_to_delete = array() ;

    // -------------------------------------------------------------------------

    foreach ( $loaded_datasets[ $available_ads_dataset_slug ]['records'] as $this_index => $this_record ) {

        // ---------------------------------------------------------------------

        if (    ! in_array(
                    $this_record['global_sid']      ,
                    $incoming_global_sids
                    )
            ) {
            $existing_record_indices_to_delete[] = $this_index ;
        }

        // ---------------------------------------------------------------------

    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $incoming_record_indices_to_add     ,
//    '$incoming_record_indices_to_add'
//    ) ;
//
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $incoming_record_indices_to_update_by_global_sid    ,
//    '$incoming_record_indices_to_update_by_global_sid'
//    ) ;
//
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $existing_record_indices_to_delete      ,
//    '$existing_record_indices_to_delete'
//    ) ;

//return TRUE ;

    // =========================================================================
    // UPDATE the (existing) records to be updated...
    // =========================================================================

    $question_any_existing_records_updated = FALSE ;

    // -------------------------------------------------------------------------

    foreach ( $incoming_record_indices_to_update_by_global_sid as $this_global_sid => $this_incoming_record_index ) {

        // ---------------------------------------------------------------------

        $incoming_record_to_update = $incoming_outgoing_ads[ $this_incoming_record_index ] ;

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $incoming_record_to_update = Array(
        //          [global_sid]            => 9khc-zwmv
        //          [ad_swapper_site_sid]   => 2kmv-hzgc
        //          [image_url]             => http://localhost/plugdev/wp-content/uploads/2015/02/ad-swapper-happy-dogs-ad-2.png
        //          [link_url]              => http://www.nzkc.org.nz/
        //          [special_type]          =>
        //          [alt_text]              =>
        //          [description]           =>
        //          [start_datetime]        =>
        //          [end_datetime]          =>
        //          [aspect_ratio_min]      =>
        //          [aspect_ratio_max]      =>
        //          [geoip_continents_incl] =>
        //          [geoip_continents_excl] =>
        //          [geoip_countries_incl]  => NZ
        //          [geoip_countries_excl]  =>
        //          [geoip_regions_incl]    =>
        //          [geoip_regions_excl]    =>
        //          [geoip_cities_incl]     =>
        //          [geoip_cities_excl]     =>
        //          )
        //
        // ---------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $incoming_record_to_update     ,
//    '$incoming_record_to_update'
//    ) ;

        // ---------------------------------------------------------------------

        $existing_record_to_update =
            $loaded_datasets[ $available_ads_dataset_slug ]['records'][
                $existing_record_indices_by_global_sid[
                    $this_global_sid
                    ]
                ] ;

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $existing_record_to_update = Array(
        //          [created_server_datetime_utc]       => 1448417351
        //          [last_modified_server_datetime_utc] => 1448417351
        //          [key]                               => 8ca5d4a5-361e-44cf-a8ef-58119a5bcfa3-1448417351-326107-5154
        //          [global_sid]                        => 9khc-zwmv
        //          [ad_swapper_site_sid]               => 2kmv-hzgc
        //          [image_url]                         => http://localhost/plugdev/wp-content/uploads/2015/02/ad-swapper-happy-dogs-ad-2.png
        //          [link_url]                          => http://www.nzkc.org.nz/
        //          [special_type]                      =>
        //          [alt_text]                          =>
        //          [description]                       =>
        //          [start_datetime]                    =>
        //          [end_datetime]                      =>
        //          [aspect_ratio_min]                  =>
        //          [aspect_ratio_max]                  =>
        //          [geoip_continents_incl]             =>
        //          [geoip_continents_excl]             =>
        //          [geoip_countries_incl]              => NZ
        //          [geoip_countries_excl]              =>
        //          [geoip_regions_incl]                =>
        //          [geoip_regions_excl]                =>
        //          [geoip_cities_incl]                 =>
        //          [geoip_cities_excl]                 =>
        //          [question_display]                  => 1
        //          )
        //
        // ---------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $existing_record_to_update     ,
//    '$existing_record_to_update'
//    ) ;

        // ---------------------------------------------------------------------

        foreach ( $incoming_record_to_update as $field_name => $field_value ) {

            // -----------------------------------------------------------------

            if (    ! array_key_exists( $field_name , $existing_record_to_update )
                    ||
                    $existing_record_to_update[ $field_name ] !== $field_value
                ) {

                $loaded_datasets[ $available_ads_dataset_slug ]['records'][
                    $existing_record_indices_by_global_sid[
                        $this_global_sid
                        ]
                    ][ $field_name ] = $field_value ;

                $question_any_existing_records_updated = TRUE ;

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // DELETE the (existing) records to be deleted...
    // =========================================================================

    foreach ( $existing_record_indices_to_delete as $this_index ) {
        unset( $loaded_datasets[ $available_ads_dataset_slug ]['records'][ $this_index ] ) ;
    }

    // =========================================================================
    // If there were any updates or deletes, save the updated dataset
    // records (and reload the "record_indices_by_key", if necessary)...
    // =========================================================================

    if (    $question_any_existing_records_updated
            ||
            count( $existing_record_indices_to_delete ) > 0
        ) {

        // =====================================================================
        // SAVE the (modified) dataset records...
        // =====================================================================

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\
        // save_numerically_indexed(
        //      $dataset_name                       ,
        //      $array_to_save                      ,
        //      $question_die_on_error = FALSE      ,
        //      $array_storage_data = NULL
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - -
        // Saves the specified numerically-indexed PHP array.
        //
        // RETURNS
        //      o   On SUCCESS
        //          - - - - -
        //          TRUE
        //
        //      o   On FAILURE
        //          - - - - -
        //          $error message STRING
        // -------------------------------------------------------------------------

        $question_die_on_error = FALSE ;
        $array_storage_data    = NULL  ;

        // ---------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\save_numerically_indexed(
                $available_ads_dataset_slug                                     ,
                $loaded_datasets[ $available_ads_dataset_slug ]['records']      ,
                $question_die_on_error                                                  ,
                $array_storage_data
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        if ( count( $existing_record_indices_to_delete ) > 0 ) {

            // =================================================================
            // RELOAD the "record_indices_by_key"...
            // =================================================================

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
            // get_dataset_record_indices_by_key(
            //      $dataset_title      ,
            //      $dataset_records    ,
            //      $key_field_slug
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
            // RETURNS:-
            //      o   (array) $record_indices_by_id on SUCCESS
            //      o   (string) $error_message on FAILURE
            // -------------------------------------------------------------------------

            $result =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_dataset_record_indices_by_key(
                    $loaded_datasets[ $available_ads_dataset_slug ]['title']            ,
                    $loaded_datasets[ $available_ads_dataset_slug ]['records']          ,
                    $loaded_datasets[ $available_ads_dataset_slug ]['key_field_slug']
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

            $loaded_datasets[ $available_ads_dataset_slug ]['record_indices_by_key'] =
                $result
                ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // ADD the records to be added...
    // =========================================================================

    require_once( $core_plugapp_dirs['dataset_manager_includes_dir'] . '/add-record-programatically.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // add_record_programatically(
    //      $dataset_manager_home_page_title        ,
    //      $caller_apps_includes_dir               ,
    //      $all_application_dataset_definitions    ,
    //      $dataset_slug                           ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_title                          ,
    //      $dataset_records                        ,
    //      $record_indices_by_key                  ,
    //      $key_field_slug                         ,
    //      $form_slug_underscored                  ,
    //      $record_to_add
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Adds a record to the specified dataset at any random time (when this
    // function is called).
    //
    // As opposed to the normal method of adding a record; which is to
    // display the Zebra Form for an empty record - and then add the record
    // once that form has been successfully submitted.
    //
    // NOTES!
    // ======
    // 1.   $record_to_add need NOT contain all the fields from the dataset.
    //      It generally just contains the main data fields:-
    //          o   name
    //          o   age
    //          o   title
    //          o   description
    //          o   etc, etc
    //
    //      but not the hidden and background fields like (eg):-
    //          o   created_datetime_utc
    //          o   last_modified_datetime_utc
    //          o   key
    //          o   etc, etc
    //
    //      The missing fields (if any), will be filled in from the:-
    //          "array_storage_value_from"
    //
    //      variables in the dataset's array storage record definition.
    //
    // 2.   This routine should however be similar to (and updated with,)
    //      the normal record adding routine (that runs when a new record
    //      is submitted - and is found in):-
    //          Function:  handle_zebra_form_submission()
    //          File....:  add-edit-record_submission-handler.php
    //
    // ---
    //
    // RETURNS
    //      o   On SUCCESS
    //              ARRAY(
    //                  $updated_record_to_add              ,
    //                  $updated_dataset_records            ,
    //                  $updated_record_indices_by_key
    //                  )
    //
    //      o   On FAILURE
    //              $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Get the default "question_display"...
    // -------------------------------------------------------------------------

    $site_profile_dataset_slug = 'ad_swapper_site_profile' ;

    $question_auto_approve_new_ads_field_slug = 'question_auto_approve_new_ads' ;

    // -------------------------------------------------------------------------

    if (    array_key_exists( $site_profile_dataset_slug , $loaded_datasets )
            &&
            is_array( $loaded_datasets[ $site_profile_dataset_slug ] )
            &&
            array_key_exists( 'records' , $loaded_datasets[ $site_profile_dataset_slug ] )
            &&
            count( $loaded_datasets[ $site_profile_dataset_slug ]['records'] ) === 1
            &&
            array_key_exists( 0 , $loaded_datasets[ $site_profile_dataset_slug ]['records'] )
            &&
            array_key_exists(
                $question_auto_approve_new_ads_field_slug                       ,
                $loaded_datasets[ $site_profile_dataset_slug ]['records'][0]
                )
            &&
            is_bool( $loaded_datasets[ $site_profile_dataset_slug ]['records'][0][ $question_auto_approve_new_ads_field_slug ] )
        ) {

        $default_question_display =
            $loaded_datasets[ $site_profile_dataset_slug ]['records'][0][ $question_auto_approve_new_ads_field_slug ]
            ;

    } else {

        $default_question_display = FALSE ;

    }

    // -------------------------------------------------------------------------
    // Get the manually approved/dis-approved ads...
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // get_option( $option , $default )
    // - - - - - - - - - - - - - - - -
    // A safe way of getting values for a named option from the options database
    // table . If the desired option does not exist, or no value is associated
    // with it, FALSE will be returned.
    //
    //      $option
    //          (string) (required) Name of the option to retrieve. Underscores
    //          separate words, lowercase only.
    //          Default: None
    //
    //      $default
    //          (mixed) (optional) The default value to return if no value is
    //          returned (ie. the option is not in the database).
    //          Default: false
    //
    // RETURN VALUES
    //      (mixed) Current value for the specified option. If the option does
    //      not exist, returns parameter $default if specified or boolean FALSE
    //      by default.
    // -------------------------------------------------------------------------

    require_once( $core_plugapp_dirs['apps_dot_app_dir'] . '/manually-approved-available-ads-support.php' ) ;

    // -------------------------------------------------------------------------

    $option_name =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_manuallyApprovedAvailableAds\get_manually_approved_available_ads_option_name()
        ;

    // -------------------------------------------------------------------------

    $manually_approved_available_ads =
        get_option(
            $option_name
            ) ;

    // -------------------------------------------------------------------------

    if ( $manually_approved_available_ads === FALSE ) {
        $manually_approved_available_ads = array() ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $manually_approved_available_ads = Array(
    //
    //          "<ad_sid>"  =>  <a-time()_last_downloaded>
    //
    //          "<ad_sid>"  =>  <r-time()_last_downloaded>
    //
    //          [nnhw-zmcg] =>  a-1448527327        (approved)
    //
    //          [9khc-zwmv] =>  r-1448527327        (rejected)
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $manually_approved_available_ads        ,
//    '$manually_approved_available_ads'
//    ) ;

    // -------------------------------------------------------------------------
    // Add the records to be added...
    // -------------------------------------------------------------------------

    $now = time() ;

    // -------------------------------------------------------------------------

    $question_manually_approved_available_ads_updated = FALSE ;

    // -------------------------------------------------------------------------

    foreach ( $incoming_record_indices_to_add as $this_incoming_record_index ) {

        // ---------------------------------------------------------------------

        $record_to_add = $incoming_outgoing_ads[ $this_incoming_record_index ] ;

        // ---------------------------------------------------------------------

        $ad_sid_to_add = $record_to_add['global_sid'] ;

        // ---------------------------------------------------------------------

        if (    array_key_exists(
                    $ad_sid_to_add                      ,
                    $manually_approved_available_ads
                    )
            ) {

            // -----------------------------------------------------------------

            $parts = explode( '-' , $manually_approved_available_ads[ $ad_sid_to_add ] ) ;

            // -----------------------------------------------------------------

            if (    count( $parts ) !== 2
                    ||
                    ! in_array( $parts[0] , array( 'a' , 'r' ) , TRUE )
                    ||
                    trim( $parts[1] ) === ''
                    ||
                    ! ctype_digit( $parts[1] )
                ) {

                $ln = __LINE__ - 6 ;

                return <<<EOT
PROBLEM:&nbsp; Bad "manually_approved_available ad" entry #1 (not in expected format)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

            }

            // -----------------------------------------------------------------

            if ( $parts[0] === 'a' ) {
                $record_to_add['question_display'] = TRUE ;

            } else {
                $record_to_add['question_display'] = FALSE ;

            }

            // -----------------------------------------------------------------

            $manually_approved_available_ads[ $ad_sid_to_add ] =
                $parts[0] . '-' . (string) $now
                ;

            // -----------------------------------------------------------------

            $question_manually_approved_available_ads_updated = TRUE ;

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            $record_to_add['question_display'] =
                $default_question_display
                ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        $dataset_manager_home_page_title = '(dataset manager home page title)' ;

        $caller_apps_includes_dir = $core_plugapp_dirs['plugins_includes_dir'] ;

        $selected_datasets_dmdd =
            $all_application_dataset_definitions[ $available_ads_dataset_slug ]
            ;

        $form_slug_underscored = 'default' ;

        // ---------------------------------------------------------------------

        $_GET['application'] = 'ad-swapper' ;

        // ---------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\add_record_programatically(
                $dataset_manager_home_page_title                                                    ,
                $caller_apps_includes_dir                                                           ,
                $all_application_dataset_definitions                                                ,
                $available_ads_dataset_slug                                                 ,
                $selected_datasets_dmdd                                                             ,
                $loaded_datasets[ $available_ads_dataset_slug ]['title']                    ,
                $loaded_datasets[ $available_ads_dataset_slug ]['records']                  ,
                $loaded_datasets[ $available_ads_dataset_slug ]['record_indices_by_key']    ,
                $loaded_datasets[ $available_ads_dataset_slug ]['key_field_slug']           ,
                $form_slug_underscored                                                              ,
                $record_to_add
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        list(
            $updated_record_to_add                                                              ,
            $loaded_datasets[ $available_ads_dataset_slug ]['records']                  ,
            $loaded_datasets[ $available_ads_dataset_slug ]['record_indices_by_key']
            ) = $result ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // Clean up:-
    //      $manually_approved_available_ads
    //
    // By getting rid of ads that haven't been downloaded for at least one
    // year...
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $manually_approved_available_ads        ,
//    '$manually_approved_available_ads'
//    ) ;

    $one_year_ago = $now - ( 365 * 24 * 3600 ) ;

    // -------------------------------------------------------------------------

    foreach ( $manually_approved_available_ads as $this_ad_sid => $this_ad_sid_details ) {

        // ---------------------------------------------------------------------

        $parts = explode( '-' , $this_ad_sid_details ) ;

        // ---------------------------------------------------------------------

            if (    count( $parts ) !== 2
                    ||
                    ! in_array( $parts[0] , array( 'a' , 'r' ) , TRUE )
                    ||
                    trim( $parts[1] ) === ''
                    ||
                    ! ctype_digit( $parts[1] )
                ) {

                $ln = __LINE__ - 6 ;

                return <<<EOT
PROBLEM:&nbsp; Bad "manually_approved_available ad" entry #2 (not in expected format)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

            }

        // ---------------------------------------------------------------------

        if ( $parts[1] < $one_year_ago ) {

            unset( $manually_approved_available_ads[ $this_ad_sid ] ) ;

            $question_manually_approved_available_ads_updated = TRUE ;

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // Save the updated:-
    //      $manually_approved_available_ads
    //
    // (if necessary)...
    // -------------------------------------------------------------------------

    if ( $question_manually_approved_available_ads_updated === TRUE ) {

        // -------------------------------------------------------------------------
        // update_option( $option , $new_value , $autoload )
        // - - - - - - - - - - - - - - - - - - - - - - - - -
        // Use the function update_option() to update a named option/value pair to
        // the options database table. The $option (option name) value is escaped
        // with $wpdb->prepare before the INSERT statement but not the option value,
        // this value should always be properly sanitized.
        //
        // This function may be used in place of add_option, although it is not as
        // flexible. update_option will check to see if the option already exists.
        // If it does not, it will be added with add_option('option_name',
        // 'option_value'). Unless you need to specify the optional arguments of
        // add_option(), update_option() is a useful catch-all for both adding and
        // updating options.
        //
        //      $option
        //          (string) (required) Name of the option to update. Must not
        //          exceed 64 characters. A list of valid default options to update
        //          can be found at the Option Reference.
        //          Default: None
        //
        //      $new_value
        //          (mixed) (required) The NEW value for this option name. This
        //          value can be an integer, string, array, or object.
        //          Default: None
        //
        //      $autoload
        //          (mixed) (optional) Whether to load the option when WordPress
        //          starts up. For existing options `$autoload` can only be updated
        //          using `update_option()` if `$value` is also changed. Accepts
        //          'yes' or true to enable, 'no' or false to disable. For
        //          non-existent options, the default value is 'yes'.
        //          Default: null
        //
        // RETURN VALUE
        //      (boolean) True if option value has changed, false if not or if
        //      update failed.
        // -------------------------------------------------------------------------

        $result = update_option(
                        $option_name                        ,
                        $manually_approved_available_ads
                        ) ;

        // ---------------------------------------------------------------------

        if ( $result !== TRUE ) {

            $ln = __LINE__ - 2 ;

            return <<<EOT
PROBLEM:&nbsp; "update_option()" failure updating manually approved available ads
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

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

