<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / CUSTOM.PAGES / UPDATE-LOCAL-SITE.CP /
//      UPDATE-AVAILABLE-AND-SELECTED-WEB-SITE-COLLECTIONS.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateLocalSite ;

// =============================================================================
// update_available_and_selected_web_site_collections()
// =============================================================================

function update_available_and_selected_web_site_collections(
    $core_plugapp_dirs                      ,
    $question_front_end                     ,
    $all_application_dataset_definitions    ,
    &$loaded_datasets                       ,
    $api_passback_data
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateLocalSite\
    // update_available_and_selected_web_site_collections(
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
    //          [available_web_site_collections] => Array(
    //
    //              [0] => Array(
    //                  [site_unique_key]          => 2222-2222-2222-2222
    //                  [local_unique_key]         => d4ky-9zyg-gp2w-hdyy
    //                  [global_unique_key]        => 2222-2222-2222-2222-d4ky-9zyg-gp2w-hdyy
    //                  [name_slash_title]         => Dog Lovers
    //                  [description]              => Targeted at users who are dog lovers....
    //                  [collection_home_page_url] => http://www.ferntechnology.com/
    //                  [question_moderated]       => 1
    //                  )
    //
    //              ...
    //
    //              )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $api_passback_data ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $api_passback_data['available_web_site_collections'] ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $loaded_datasets['ad_swapper_available_selected_and_approved_web_site_collections'] = Array(
    //          [title]                 => Available and Selected Web Site Collections
    //          [records]               => Array(
    //              [0] => Array(
    //                  [created_server_datetime_utc]       => 1425359578
    //                  [last_modified_server_datetime_utc] => 1425359578
    //                  [key]                               => d738e5eb-1955-45fd-96e4-42e7e202aa5a-1425359578-466429-1683
    //                  [site_unique_key]                   => 2222-2222-2222-2222
    //                  [local_unique_key]                  => d4ky-9zyg-gp2w-hdyy
    //                  [global_unique_key]                 => 2222-2222-2222-2222-d4ky-9zyg-gp2w-hdyy
    //                  [name_slash_title]                  => Dog Lovers
    //                  [description]                       => Targeted at users who are dog lovers...
    //                  [collection_home_page_url]          => http://www.ferntechnology.com/
    //                  [question_moderated]                => 1
    //                  [question_selected]                 =>
    //                  )
    //              )
    //          [key_field_slug]        => key
    //          [record_indices_by_key] => Array(
    //              [d738e5eb-1955-45fd-96e4-42e7e202aa5a-1425359578-466429-1683] => 0
    //              )
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $loaded_datasets['ad_swapper_available_selected_and_approved_web_site_collections']          ,
//    '$loaded_datasets[\'ad_swapper_available_selected_and_approved_web_site_collections\']'
//    ) ;

//          'slug'                      =>  'created_server_datetime_utc'       ,
//          'slug'                      =>  'last_modified_server_datetime_utc'     ,
//          'slug'                      =>  'key'       ,
//          'slug'                      =>  'local_unique_key'          ,
//          'slug'                      =>  'global_unique_key'         ,
//          'slug'                      =>  'name_slash_title'              ,
//          'slug'                      =>  'description'           ,
//          'slug'                      =>  'collection_home_page_url'          ,
//          'slug'                      =>  'question_moderated'        ,
//          'slug'                      =>  'question_selected'          ,

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $incoming_available_web_site_collections =
        $api_passback_data['available_web_site_collections']
        ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $incoming_available_web_site_collections[0]     ,
//    '$incoming_available_web_site_collections[0]'
//    ) ;

    // -------------------------------------------------------------------------

    $existing_records_dataset_slug =
        'ad_swapper_available_selected_and_approved_web_site_collections'
        ;

    // -------------------------------------------------------------------------

    $existing_available_web_site_collections =
        $loaded_datasets[ $existing_records_dataset_slug ]['records']
        ;

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

    $record_structure_slug = 'ad-swapper-local-incoming-available-web-site-collections' ;

    $array_of_records_to_validate = $incoming_available_web_site_collections ;

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
    // Get the "global_unique_keys" of the existing available web site
    // collections...
    //
    // NOTE!
    // -----
    // We need this info. to determine:-
    //      a)  Which incoming records need to be added, and;
    //      b)  Which match existing records that (might) need to be updated.
    // =========================================================================

    $existing_record_indices_by_global_unique_key = array() ;

    // -------------------------------------------------------------------------

    foreach ( $existing_available_web_site_collections as $this_index => $this_record ) {

        // ---------------------------------------------------------------------

        $existing_record_indices_by_global_unique_key[
            $this_record['global_unique_key']
            ] = $this_index ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Get the "global_unique_keys" of the incoming available web site
    // collections...
    //
    // NOTE!
    // -----
    // We need this info. to determine which of the existing records need to be
    // deleted (if any).
    // =========================================================================

    $global_unique_keys_of_incoming_available_web_site_collections = array() ;

    // -------------------------------------------------------------------------

    foreach ( $incoming_available_web_site_collections as $this_record ) {

        $global_unique_keys_of_incoming_available_web_site_collections[] =
            $this_record['global_unique_key']
            ;

    }

    // =========================================================================
    // Get the incoming records to ADD and UPDATE...
    // =========================================================================

    $incoming_record_indices_to_add    = array() ;
    $incoming_record_indices_to_update = array() ;

    // -------------------------------------------------------------------------

    foreach ( $incoming_available_web_site_collections as $this_index => $this_record ) {

        // ---------------------------------------------------------------------

        if (    array_key_exists(
                    $this_record['global_unique_key']               ,
                    $existing_record_indices_by_global_unique_key
                    )
            ) {
            $incoming_record_indices_to_update[] = $this_index ;

        } else {
            $incoming_record_indices_to_add[] = $this_index ;

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Get the existing records to DELETE...
    // =========================================================================

    $existing_record_indices_to_delete = array() ;

    // -------------------------------------------------------------------------

    foreach ( $existing_available_web_site_collections as $this_index => $this_record ) {

        // ---------------------------------------------------------------------

        if (    ! in_array(
                    $this_record['global_unique_key']                                   ,
                    $global_unique_keys_of_incoming_available_web_site_collections      ,
                    TRUE
                    )
            ) {
            $existing_record_indices_to_delete[] = $this_index ;
        }

        // ---------------------------------------------------------------------

    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $incoming_record_indices_to_add      ,
//    '$incoming_record_indices_to_add'
//    ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $incoming_record_indices_to_update       ,
//    '$incoming_record_indices_to_update'
//    ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $existing_record_indices_to_delete      ,
//    '$existing_record_indices_to_delete'
//    ) ;

    // =========================================================================
    // UPDATE the (existing) records to be updated...
    //
    // NOTE!
    // =====
    // Since we're updating the existing record fields in place, this
    // updating DOESN'T affect the existing record indices.
    // =========================================================================

    $question_any_existing_records_updated = FALSE ;

    // -------------------------------------------------------------------------

    $field_names_to_update = array(
        'name_slash_title'              =>  ''          ,
        'description'                   =>  ''          ,
        'collection_home_page_url'      =>  ''          ,
        'question_moderated'            =>  'bool'
        ) ;
        //  Only the above fields need updating.

    // -------------------------------------------------------------------------

    foreach ( $incoming_record_indices_to_update as $this_incoming_record_index ) {

        // ---------------------------------------------------------------------

        $incoming_record_to_update =
            $incoming_available_web_site_collections[ $this_incoming_record_index ]
            ;

        // ---------------------------------------------------------------------

        $existing_record_index =
            $existing_record_indices_by_global_unique_key[
                $incoming_record_to_update['global_unique_key']
                ] ;

        // ---------------------------------------------------------------------

        $existing_record_to_update =
            $existing_available_web_site_collections[
                $existing_record_index
                ] ;

        // ---------------------------------------------------------------------

        foreach ( $incoming_record_to_update as $field_name => $field_value ) {

            // -----------------------------------------------------------------

            if (    array_key_exists(
                        $field_name                 ,
                        $field_names_to_update
                        )
                ) {

                // -------------------------------------------------------------

                if ( $field_names_to_update[ $field_name ] === 'bool' ) {

                    if ( $field_value == 1 ) {
                        $field_value = TRUE ;
                    } else {
                        $field_value = FALSE ;
                    }
                    //  "0"/"1" => FALSE/TRUE

                }

                // -------------------------------------------------------------

                if ( $field_value !== $existing_record_to_update[ $field_name ] ) {

                    // ---------------------------------------------------------

                    $loaded_datasets[ $existing_records_dataset_slug ]['records'][
                        $existing_record_index
                        ][ $field_name ] = $field_value ;

                    // ---------------------------------------------------------

                    $question_any_existing_records_updated = TRUE ;

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // DELETE the (already available) records to be deleted...
    //
    // NOTE!
    // =====
    // Deleting DOES affect the existing record indices.
    // =========================================================================

    foreach ( $existing_record_indices_to_delete as $this_index ) {
        unset( $loaded_datasets[ $existing_records_dataset_slug ]['records'][ $this_index ] ) ;
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
                $existing_records_dataset_slug                                      ,
                $loaded_datasets[ $existing_records_dataset_slug ]['records']       ,
                $question_die_on_error                                              ,
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
                    $loaded_datasets[ $existing_records_dataset_slug ]['title']            ,
                    $loaded_datasets[ $existing_records_dataset_slug ]['records']          ,
                    $loaded_datasets[ $existing_records_dataset_slug ]['key_field_slug']
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

            $loaded_datasets[ $existing_records_dataset_slug ]['record_indices_by_key'] =
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

    foreach ( $incoming_record_indices_to_add as $this_incoming_record_index ) {

        // ---------------------------------------------------------------------
        // FROM THIS:
        //      'site_unique_key'          => 2222-2222-2222-2222
        //      'local_unique_key'         => d4ky-9zyg-gp2w-hdyy
        //      'global_unique_key'        => 2222-2222-2222-2222-d4ky-9zyg-gp2w-hdyy
        //      'name_slash_title'         => Dog Lovers
        //      'description'              => Targeted at users who are dog lovers....
        //      'collection_home_page_url' => http://www.ferntechnology.com/
        //      'question_moderated'       => 1
        //
        // CREATE THIS:
        //      'created_server_datetime_utc'
        //      'last_modified_server_datetime_utc'
        //      'key'
        //      - - - - - - - - - - - - - - - - - -
        //      'site_unique_key'
        //      'local_unique_key'
        //      'global_unique_key'
        //      'name_slash_title'
        //      'description'
        //      'collection_home_page_url'
        //      'question_moderated'
        //      - - - - - - - - - - - - - - - - - -
        //      'question_selected'
        // ---------------------------------------------------------------------

        $record_to_add =
            $incoming_available_web_site_collections[ $this_incoming_record_index ]
            ;

        // ---------------------------------------------------------------------

        if ( $record_to_add['question_moderated'] == 1 ) {
            $record_to_add['question_moderated'] = TRUE ;

        } else {
            $record_to_add['question_moderated'] = FALSE ;

        }
        //  "0"/"1" => FALSE/TRUE

        // ---------------------------------------------------------------------

        $record_to_add['question_selected'] = FALSE ;

        // ---------------------------------------------------------------------

        $record_to_add['question_approved'] = FALSE ;

        // ---------------------------------------------------------------------

        $record_to_add['question_member'] = FALSE ;

        // ---------------------------------------------------------------------

        $dataset_manager_home_page_title = '(dataset manager home page title)' ;

        $caller_apps_includes_dir = $core_plugapp_dirs['plugins_includes_dir'] ;

        $selected_datasets_dmdd =
            $all_application_dataset_definitions[ $existing_records_dataset_slug ]
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
                $existing_records_dataset_slug                                                 ,
                $selected_datasets_dmdd                                                             ,
                $loaded_datasets[ $existing_records_dataset_slug ]['title']                    ,
                $loaded_datasets[ $existing_records_dataset_slug ]['records']                  ,
                $loaded_datasets[ $existing_records_dataset_slug ]['record_indices_by_key']    ,
                $loaded_datasets[ $existing_records_dataset_slug ]['key_field_slug']           ,
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
            $loaded_datasets[ $existing_records_dataset_slug ]['records']                  ,
            $loaded_datasets[ $existing_records_dataset_slug ]['record_indices_by_key']
            ) = $result ;

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

