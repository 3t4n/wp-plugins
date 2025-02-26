<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / CUSTOM.PAGES / UPDATE-LOCAL-SITE.CP /
//      UPDATE-THIS-SITES-WEB-SITE-COLLECTION-MEMBERS.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateLocalSite ;

// =============================================================================
// update_this_sites_web_site_collection_members()
// =============================================================================

function update_this_sites_web_site_collection_members(
    $core_plugapp_dirs                      ,
    $question_front_end                     ,
    $all_application_dataset_definitions    ,
    &$loaded_datasets                       ,
    $api_passback_data
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_updateLocalSite\
    // update_this_sites_web_site_collection_members(
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
    //          [your_web_site_collection_members] => Array(
    //              [2222-2222-2222-2222-d4ky-9zyg-gp2w-hdyy] => Array(
    //                  [0] => 2222-2222-2222-2222
    //                  ...
    //                  )
    //              [2222-2222-2222-2222-zn2w-vc3g-pvxd-vpzv] => Array(
    //                  [0] => 2222-2222-2222-2222
    //                  ...
    //                  )
    //              ...
    //              )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $api_passback_data ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $api_passback_data['your_web_site_collection_members'] ) ;

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__     ;
    $fn = __FUNCTION__      ;
    $ln = (string) __LINE__ ;

    // =========================================================================
    // Get/check the incoming data...
    // =========================================================================

    if ( ! is_array( $api_passback_data['your_web_site_collection_members'] ) ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "your_web_site_collection_members" (array expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    $incoming_records =
        $api_passback_data['your_web_site_collection_members']
        ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $incoming_records = Array(
    //          [2222-2222-2222-2222-d4ky-9zyg-gp2w-hdyy] => Array(
    //              [0] => 2222-2222-2222-2222
    //              ...
    //              )
    //          [2222-2222-2222-2222-zn2w-vc3g-pvxd-vpzv] => Array(
    //              [0] => 2222-2222-2222-2222
    //              ...
    //              )
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $incoming_records , '$incoming_records' ) ;

    // =========================================================================
    // Loop over the incoming records:-
    //
    //      1.  Checking their validity, and;
    //
    //      2.  Converting them to:-
    //              array(
    //                  [0] => array(
    //                              'collection_global_unique_key'  =>  "xxx"   ,
    //                              'member_site_unique_key'        =>  "yyy"
    //                              )
    //                  ...
    //                  )
    //
    //          format.
    //
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/great-kiwi-passwords.php' ) ;

    // -----------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\
    // question_grouped_random_password(
    //      $candidate_password     ,
    //		$options = array()
    //		)
    // - - - - - - - - - - - - - - - - -
    // Checks whether the $candidate_password is a grouped random password
    // like:-
    //		k53t-xc92-v7k3
    //		etc
    //
    // Allowed password characters are those in:-
    //		GREAT_KIWI_ALLOWED_PASSWORD_CHARACTERS
    //
    // Currently these are all the ASCII alphanumeric characters but:-
    //		0    1    5    6    8
    //		A    B    D    E    I    O    Q    S    U
    //		a    b    e    f    i    j    l    o    q    r    s    t    u
    //
    // These are omitted because they're combinations like:-
    //		0/8/B/D/Q
    //		1/I/l
    //		5/S
    //		etc
    //
    // that can easily be confused with each other.
    //
    // ---
    //
    // $options is like (eg):-
    //
    //		$options = array(
    //			'number_groups'		    =>	4		,
    //			'chars_per_group'	    =>	4		,
    //			'group_separator'	    =>	'-'		,
    //			'lowercase_only'	    =>	TRUE    ,
    //          'question_punctuation'  =>  FALSE
    //			)
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

    $collection_global_unique_key_options = array(
    	'number_groups'		    =>	8		,
    	'chars_per_group'	    =>	4       ,
    	'group_separator'	    =>	'-'	    ,
    	'lowercase_only'	    =>	TRUE    ,
        'question_punctuation'  =>  FALSE
        ) ;

    // -------------------------------------------------------------------------

    $site_unique_key_options = array(
    	'number_groups'		    =>	4		,
    	'chars_per_group'	    =>	4       ,
    	'group_separator'	    =>	'-'	    ,
    	'lowercase_only'	    =>	TRUE    ,
        'question_punctuation'  =>  FALSE
        ) ;

    // -------------------------------------------------------------------------

    $temp = array() ;

    // -------------------------------------------------------------------------

    foreach ( $incoming_records as $this_collection_global_unique_key => $this_collections_member_sites ) {

        // ---------------------------------------------------------------------

        if (    ! is_string( $this_collection_global_unique_key )
                ||
                trim( $this_collection_global_unique_key ) === ''
                ||
                ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\question_grouped_random_password(
                        $this_collection_global_unique_key      ,
                        $collection_global_unique_key_options
                  		)
            ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "your_web_site_collection_members" (invalid collection global unique key)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        if ( ! is_array( $this_collections_member_sites ) ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "your_web_site_collection_members" (collection member sites - array expected)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        foreach ( $this_collections_member_sites as $this_member_site_unique_key ) {

            // -----------------------------------------------------------------

            if (    ! is_string( $this_member_site_unique_key )
                    ||
                    trim( $this_member_site_unique_key ) === ''
                    ||
                    ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\question_grouped_random_password(
                            $this_member_site_unique_key    ,
                            $site_unique_key_options
                      		)
                ) {

                return <<<EOT
PROBLEM:&nbsp; Bad "your_web_site_collection_members" (invalid member site unique key)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

            }

            // -----------------------------------------------------------------

            $temp[] = array(
                'collection_global_unique_key'  =>  $this_collection_global_unique_key  ,
                'member_site_unique_key'        =>  $this_member_site_unique_key
                ) ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $incoming_records = $temp ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $incoming_records = Array(
    //
    //          [0] => Array(
    //                      [collection_global_unique_key] => 2222-2222-2222-2222-d4ky-9zyg-gp2w-hdyy
    //                      [member_site_unique_key]       => 2222-2222-2222-2222
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $incoming_records , '$incoming_records' ) ;

    // =========================================================================
    // Convert the INCOMING records from:-
    //
    //      array(
    //          [0] => array(
    //                      'collection_global_unique_key'  =>  "xxx"   ,
    //                      'member_site_unique_key'        =>  "yyy"
    //                      )
    //          ...
    //          )
    //
    // to:-
    //
    //      array(
    //          '<collection_global_unique_key>-<member_site_unique_key>'   =>  array(
    //              'collection_global_unique_key'  =>  "xxx"   ,
    //              'member_site_unique_key'        =>  "yyy"
    //              )
    //          ...
    //          )
    //
    // format.
    //
    // NOTE!
    // =====
    // We do this because it makes it easy to detect the records to be added
    // to the target dataset.
    // =========================================================================

    $temp = array() ;

    // -------------------------------------------------------------------------

    foreach ( $incoming_records as $this_incoming_record ) {

        // ---------------------------------------------------------------------

        $key =  $this_incoming_record['collection_global_unique_key'] .
                '-' .
                $this_incoming_record['member_site_unique_key']
                ;

        // ---------------------------------------------------------------------

        $temp[ $key ] = $this_incoming_record ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $incoming_records = $temp ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $incoming_records = Array(
    //
    //          [2222-2222-2222-2222-d4ky-9zyg-gp2w-hdyy-2222-2222-2222-2222] => Array(
    //              [collection_global_unique_key] => 2222-2222-2222-2222-d4ky-9zyg-gp2w-hdyy
    //              [member_site_unique_key]       => 2222-2222-2222-2222
    //              )
    //
    //          [2222-2222-2222-2222-zn2w-vc3g-pvxd-vpzv-2222-2222-2222-2222] => Array(
    //              [collection_global_unique_key] => 2222-2222-2222-2222-zn2w-vc3g-pvxd-vpzv
    //              [member_site_unique_key]       => 2222-2222-2222-2222
    //              )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $incoming_records , '$incoming_records' ) ;

    // =========================================================================
    // Load the EXISTING records...
    // =========================================================================

    $existing_records_dataset_slug =
        'ad_swapper_this_sites_web_site_collection_members'
        ;

    // -------------------------------------------------------------------------

    $existing_records =
        $loaded_datasets[ $existing_records_dataset_slug ]['records']
        ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $existing_records = Array(
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]          => 1425547215
    //                      [last_modified_server_datetime_utc]    => 1425547215
    //                      [key]                                  => 2d15b235-8e95-4a69-b556-e8929817488c-1425547215-722280-1688
    //                      [collection_global_unique_key]         => 2222-2222-2222-2222-d4ky-9zyg-gp2w-hdyy
    //                      [member_site_unique_key]               => 2222-2222-2222-2222
    //                      [question_member_enabled_by_moderator] =>
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $existing_records , '$existing_records' ) ;

    // =========================================================================
    // Convert the EXISTING records from:-
    //
    //      array(
    //          [0] => array(
    //                      'collection_global_unique_key'          =>  "xxx"       ,
    //                      'member_site_unique_key'                =>  "yyy"       ,
    //                      'question_member_enabled_by_moderator'  =>  TRUE/FALSE
    //                      )
    //          ...
    //          )
    //
    // to:-
    //
    //      array(
    //          '<collection_global_unique_key>-<member_site_unique_key>'   =>  array(
    //              'collection_global_unique_key'          =>  "xxx"       ,
    //              'member_site_unique_key'                =>  "yyy"       ,
    //              'question_member_enabled_by_moderator'  =>  TRUE/FALSE  ,
    //              'index'                                 =>  0+
    //              )
    //          ...
    //          )
    //
    // format.
    //
    // NOTE!
    // =====
    // We do this because it makes it easy to detect the records to be deleted
    // from the target dataset.
    // =========================================================================

    $temp = array() ;

    // -------------------------------------------------------------------------

    foreach ( $existing_records as $this_index => $this_existing_record ) {

        // ---------------------------------------------------------------------

        $key =  $this_existing_record['collection_global_unique_key'] .
                '-' .
                $this_existing_record['member_site_unique_key']
                ;

        // ---------------------------------------------------------------------

        $temp[ $key ] = $this_existing_record ;

        // ---------------------------------------------------------------------

        $temp[ $key ]['index'] = $this_index ;
            //  We need this when deleting the unwanted records

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $existing_records = $temp ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $existing_records = Array(
    //
    //          [2222-2222-2222-2222-d4ky-9zyg-gp2w-hdyy-2222-2222-2222-2222] => Array(
    //              [created_server_datetime_utc]          => 1425547215
    //              [last_modified_server_datetime_utc]    => 1425547215
    //              [key]                                  => 2d15b235-8e95-4a69-b556-e8929817488c-1425547215-722280-1688
    //              [collection_global_unique_key]         => 2222-2222-2222-2222-d4ky-9zyg-gp2w-hdyy
    //              [member_site_unique_key]               => 2222-2222-2222-2222
    //              [question_member_enabled_by_moderator] =>
    //              [index]                                => 0
    //              )
    //
    //          ...
    //
    //          )
    //
    // NOTE!
    // =====
    // We do this because it makes it easy to detect the records to be added
    // to the target dataset.
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $existing_records , '$existing_records' ) ;

    // =========================================================================
    // Loop over the EXISTING records, deleting those that are no longer
    // amongst the incoming records...
    // =========================================================================

    $number_deleted = 0 ;

    // -------------------------------------------------------------------------

    foreach ( $existing_records as $combined_key => $this_existing_record ) {

        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                    $combined_key       ,
                    $incoming_records
                    )
            ) {

            // -----------------------------------------------------------------

            unset(  $loaded_datasets[ $existing_records_dataset_slug ]['records'][
                        $this_existing_record['index']
                        ] ) ;

            // -----------------------------------------------------------------

            $number_deleted++ ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // If any records were deleted, then fix up the dataset...
    // =========================================================================

    if ( $number_deleted > 0 ) {

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

        // =====================================================================
        // RELOAD the "record_indices_by_key"...
        // =====================================================================

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

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        $loaded_datasets[ $existing_records_dataset_slug ]['record_indices_by_key'] =
            $result
            ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Loop over the INCOMING records, adding those that aren't amongst the
    // EXISTING records...
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

    foreach ( $incoming_records as $combined_key => $this_incoming_record ) {

        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                    $combined_key       ,
                    $existing_records
                    )
            ) {

            // -----------------------------------------------------------------
            // Create the record to add...
            // -----------------------------------------------------------------

            $record_to_add = $this_incoming_record ;

            // -----------------------------------------------------------------

            $record_to_add['question_member_enabled_by_moderator'] = FALSE ;

            // -----------------------------------------------------------------
            // Add it...
            // -----------------------------------------------------------------

            $dataset_manager_home_page_title = '(dataset manager home page title)' ;

            $caller_apps_includes_dir = $core_plugapp_dirs['plugins_includes_dir'] ;

            $selected_datasets_dmdd =
                $all_application_dataset_definitions[ $existing_records_dataset_slug ]
                ;

            $form_slug_underscored = 'default' ;

            // -----------------------------------------------------------------

            $_GET['application'] = 'ad-swapper' ;

            // -----------------------------------------------------------------

            $result =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\add_record_programatically(
                    $dataset_manager_home_page_title                                                ,
                    $caller_apps_includes_dir                                                       ,
                    $all_application_dataset_definitions                                            ,
                    $existing_records_dataset_slug                                                  ,
                    $selected_datasets_dmdd                                                         ,
                    $loaded_datasets[ $existing_records_dataset_slug ]['title']                     ,
                    $loaded_datasets[ $existing_records_dataset_slug ]['records']                   ,
                    $loaded_datasets[ $existing_records_dataset_slug ]['record_indices_by_key']     ,
                    $loaded_datasets[ $existing_records_dataset_slug ]['key_field_slug']            ,
                    $form_slug_underscored                                                          ,
                    $record_to_add
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

            list(
                $updated_record_to_add                                                          ,
                $loaded_datasets[ $existing_records_dataset_slug ]['records']                   ,
                $loaded_datasets[ $existing_records_dataset_slug ]['record_indices_by_key']
                ) = $result ;

            // -----------------------------------------------------------------

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

