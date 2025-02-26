<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / CUSTOM.PAGES / UPDATE-LOCAL-SITE.CP /
//      UPDATE-APPROVED-WEB-SITE-COLLECTION-MEMBERSHIPS.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateLocalSite ;

// =============================================================================
// update_approved_web_site_collection_memberships()
// =============================================================================

function update_approved_web_site_collection_memberships(
    $core_plugapp_dirs                      ,
    $question_front_end                     ,
    $all_application_dataset_definitions    ,
    &$loaded_datasets                       ,
    $api_passback_data
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateLocalSite\
    // update_approved_web_site_collection_memberships(
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
    //          ...
    //
    //          [approved_web_site_collection_memberships] => Array(
    //              [0] => 2222-2222-2222-2222-zn2w-vc3g-pvxd-vpzv
    //              ...
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
    //                  [question_approved]                 =>
    //                  [question_member]                   =>
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

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__     ;
    $fn = __FUNCTION__      ;
    $ln = (string) __LINE__ ;

    // -------------------------------------------------------------------------

    $existing_records_dataset_slug =
        'ad_swapper_available_selected_and_approved_web_site_collections'
        ;

    // =========================================================================
    // Get the INCOMING records...
    // =========================================================================

    $incoming_records =
        $api_passback_data['approved_web_site_collection_memberships']
        ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $incoming_records = Array(
    //          [0] => 2222-2222-2222-2222-zn2w-vc3g-pvxd-vpzv
    //          ...
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $incoming_records       ,
//    '$incoming_records'
//    ) ;

    // =========================================================================
    // Get the EXISTING records...
    // =========================================================================

    $existing_records =
        $loaded_datasets[ $existing_records_dataset_slug ]['records']
        ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $existing_records = Array(
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]       => 1425777748
    //                      [last_modified_server_datetime_utc] => 1425777748
    //                      [key]                               => 23273521-979f-41ea-b09e-6ad4f74ac408-1425777748-128484-1704
    //                      [site_unique_key]                   => 2222-2222-2222-2222
    //                      [local_unique_key]                  => d4ky-9zyg-gp2w-hdyy
    //                      [global_unique_key]                 => 2222-2222-2222-2222-d4ky-9zyg-gp2w-hdyy
    //                      [name_slash_title]                  => Dog Lovers
    //                      [description]                       => Targeted at users who are dog lovers...
    //                      [collection_home_page_url]          => http://www.ferntechnology.com/
    //                      [question_moderated]                => 1
    //                      [question_selected]                 => 1
    //                      [question_approved]                 =>
    //                      [question_member]                   =>
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $existing_records       ,
//    '$existing_records'
//    ) ;

    // =========================================================================
    // ERROR CHECK the INCOMING records...
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/great-kiwi-passwords.php' ) ;

    // -----------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\
    // question_grouped_random_password(
    //      $candidate_password     ,
    //      $options = array()
    //      )
    // - - - - - - - - - - - - - - - - -
    // Checks whether the $candidate_password is a grouped random password
    // like:-
    //      k53t-xc92-v7k3
    //      etc
    //
    // Allowed password characters are those in:-
    //      GREAT_KIWI_ALLOWED_PASSWORD_CHARACTERS
    //
    // Currently these are all the ASCII alphanumeric characters but:-
    //      0    1    5    6    8
    //      A    B    D    E    I    O    Q    S    U
    //      a    b    e    f    i    j    l    o    q    r    s    t    u
    //
    // These are omitted because they're combinations like:-
    //      0/8/B/D/Q
    //      1/I/l
    //      5/S
    //      etc
    //
    // that can easily be confused with each other.
    //
    // ---
    //
    // $options is like (eg):-
    //
    //      $options = array(
    //          'number_groups'         =>  4       ,
    //          'chars_per_group'       =>  4       ,
    //          'group_separator'       =>  '-'     ,
    //          'lowercase_only'        =>  TRUE    ,
    //          'question_punctuation'  =>  FALSE
    //          )
    //
    // ---
    //
    // NOTE!
    // -----
    // With some combinations, it depends very much on the FONT used (as to
    // how similar two different characters look).  Thus the above rules are
    // a worst-case set.  Stuff is in there if in any common (web) font,
    // the chance of confusion exists.
    //
    // RETURNS
    //      On SUCCESS
    //          TRUE or FALSE
    //
    //      On FAILURE
    //          $error_message STRING
    // -----------------------------------------------------------------------

    $options_4_collection_global_unique_key = array(
        'number_groups'         =>  8       ,
        'chars_per_group'       =>  4       ,
        'group_separator'       =>  '-'     ,
        'lowercase_only'        =>  TRUE    ,
        'question_punctuation'  =>  FALSE
        ) ;

    // -----------------------------------------------------------------------

    foreach ( $incoming_records as $this_collection_global_unique_key ) {

        // -------------------------------------------------------------------

        if (    ! is_string( $this_collection_global_unique_key )
                ||
                trim( $this_collection_global_unique_key ) === ''
                ||
                ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\question_grouped_random_password(
                        $this_collection_global_unique_key          ,
                        $options_4_collection_global_unique_key
                        )
            ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "collection_global_unique_key"
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // -------------------------------------------------------------------

    }

    // =========================================================================
    // Loop over the EXISTING records, updating the:-
    //      question_approved
    //      question_member
    //
    // fields, if necessary...
    // =========================================================================

    $question_any_updates_made = FALSE ;

    // -------------------------------------------------------------------------

    foreach ( $existing_records as $this_existing_index => $this_existing_record ) {

        // ---------------------------------------------------------------------
        // Determine what "question_approved" should be...
        // ---------------------------------------------------------------------

        if (    in_array(
                    $this_existing_record['global_unique_key']      ,
                    $incoming_records
                    )
            ) {
            $required_question_approved = TRUE ;

        } else {
            $required_question_approved = FALSE ;

        }

        // ---------------------------------------------------------------------
        // Flip it, if necessary...
        // ---------------------------------------------------------------------

        if (    $this_existing_record['question_approved']
                !==
                $required_question_approved
            ) {

            // -----------------------------------------------------------------

            $loaded_datasets[ $existing_records_dataset_slug ]['records'][
                $this_existing_index
                ]['question_approved'] = $required_question_approved ;

            // -----------------------------------------------------------------

            $question_any_updates_made = TRUE ;

            // -------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Determine what "question_member" should be...
        // ---------------------------------------------------------------------

        if ( $this_existing_record['question_moderated'] ) {

            // -----------------------------------------------------------------
            // The Collection IS Moderated...
            // -----------------------------------------------------------------

            if (    $this_existing_record['question_selected']
                    &&
                    in_array(
                        $this_existing_record['global_unique_key']      ,
                        $incoming_records
                        )
                ) {
                $required_question_member = TRUE ;

            } else {
                $required_question_member = FALSE ;

            }

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------
            // The Collection ISN'T Moderated...
            // -----------------------------------------------------------------

            if ( $this_existing_record['question_selected'] ) {
                $required_question_member = TRUE ;

            } else {
                $required_question_member = FALSE ;

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Flip it, if necessary...
        // ---------------------------------------------------------------------

        if (    $this_existing_record['question_member']
                !==
                $required_question_member
            ) {

            // -----------------------------------------------------------------

            $loaded_datasets[ $existing_records_dataset_slug ]['records'][
                $this_existing_index
                ]['question_member'] = $required_question_member ;

            // -----------------------------------------------------------------

            $question_any_updates_made = TRUE ;

            // -------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Repeat with the next existing record (if there is any)...
        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SAVE the updated dataset (if necessary)...
    // =========================================================================

    if ( $question_any_updates_made ) {

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

