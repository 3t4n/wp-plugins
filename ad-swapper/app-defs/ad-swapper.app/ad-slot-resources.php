<?php

// *****************************************************************************
// AD-SWAPPER.APP / AD-SLOT-RESOURCES.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAdSlots ;

// =============================================================================
// get_name_slash_title_column_value()
// =============================================================================

function get_name_slash_title_column_value(
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
    //          [created_server_datetime_utc]       => 1420422637
    //          [last_modified_server_datetime_utc] => 1420422637
    //          [key]                               => 9ffdb62f-a92f-4a3f-bcbb-275d7657863a-1420422637-585399-1398
    //          [name]                              => right-sidebar
    //          [title]                             => Right Sidebar
    //          [description]                       => RGlzcGxhe...yeSBwYWdlLg==
    //          [width_nominal]                     =>
    //          [width_min]                         =>
    //          [width_max]                         =>
    //          [height_nominal]                    =>
    //          [height_min]                        =>
    //          [height_max]                        =>
    //          [sequence_number]                   =>
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $this_dataset_record_data , '$this_dataset_record_data' ) ;

    // -------------------------------------------------------------------------

    $name = trim( $this_dataset_record_data['name'] ) ;

    // -------------------------------------------------------------------------

    if ( trim( $this_dataset_record_data['title'] ) === '' ) {

        require_once( $caller_apps_includes_dir . '/string-utils.php' ) ;

        $title =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringtUtils\to_title(
                $name
                ) ;

    } else {

        $title = trim( $this_dataset_record_data['title'] ) ;

    }

    // -------------------------------------------------------------------------

    return <<<EOT
<b>{$title}</b> ({$name})
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

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
    // Left Column
    // =========================================================================

    if ( $question_adding ) {

        $text1 = <<<EOT
Please enter the details of the new Ad Slot you'd like to create.
EOT;

    } else {

        $text1 = <<<EOT
Please edit this Ad Slot's details.
EOT;

    }

    // -------------------------------------------------------------------------

    $left_column = <<<EOT
<p style="margin-top:0; font-size:110%; font-style:italic">{$text1}</p>
EOT;

    // =========================================================================
    // Right Column
    // =========================================================================

    $right_column = <<<EOT
<h3 style="margin-top:0; color:#FFFFFF"><u>NOTE!</u></h3>

<p>An "Ad Slot" is an area on your site where you display Ad Swapper ads from
other sites</p>

<p style="margin-bottom:0">Obviously, you'll need at least one Ad Slot (if
you're to display any Ad Swapper ads).&nbsp; Though you can have as many as you
like.</p>
EOT;

    // =========================================================================
    // Create and return the page header...
    // =========================================================================

    return <<<EOT
<div style="background-color:#8B2252; color:#FFFFFF; padding:1em; margin-bottom:1em; width:95%">
    <table border="0" cellpadding="0" cellspacing="0"><tr>
        <td valign="top" width="45%">{$left_column}</td>
        <td width="5%">&nbsp;</td>
        <td valign="top" width="45%">{$right_column}</td>
    </table>
</div>
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// check_before_adding_ad_slot_record()
// =============================================================================

function check_before_adding_ad_slot_record(
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
    &$record_to_add                             ,
    $extra_args
    ) {

    // -------------------------------------------------------------------------
    // <some_dataset_specific_pre_add_routine>(
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
    //      &$record_to_add                             ,
    //      $extra_args
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // Called after the record to be added has been successfully created.
    // But:-
    //      o   Before that record has been added to $dataset_records, and;
    //      o   Before the updated $dataset_records has been saved back to disk.
    //
    // $record_to_add is provided by reference - so that this routine can
    // update it (before it's added to $dataset_records and saved to disk).
    //
    // RETURNS
    //      On SUCCESS!
    //          o   ARRAY $stuff_to_pass_to_the_post_add_routine, or;
    //          o   FALSE if $dataset_records ISN'T to be updated on disk
    //              (and the record addition is to be (silently) aborted).
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // check_widths_and_heights(
    //      $record_to_check
    //      )
    // - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $result =
        check_widths_and_heights(
            $record_to_add
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
    }

    // -------------------------------------------------------------------------

    return array() ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// check_before_editing_ad_slot_record()
// =============================================================================

function check_before_editing_ad_slot_record(
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
    $replacement_record_before_updates          ,
    &$replacement_record_after_updates          ,
    $extra_args
    ) {

    // -------------------------------------------------------------------------
    // <some_dataset_specific_pre_edit_routine>(
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
    //      $replacement_record_before_updates          ,
    //      &$replacement_record_after_updates          ,
    //      $extra_args
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // Called after the record to be updated has been successfully created.
    // But not yet:-
    //      o   Updated in $dataset_records, or;
    //      o   Saved to disk.
    //
    // $replacement_record_after_updates is provided by reference - so that
    // this routine can update it (before it's updated in $dataset_records
    // and saved to disk).
    //
    // RETURNS
    //      On SUCCESS!
    //          o   ARRAY $stuff_to_pass_to_the_post_edit_routine, or;
    //          o   FALSE if $dataset_records ISN'T to be updated on disk
    //              (and the record edit/update is to be (silently) aborted).
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // The rules are:-
    //
    //      "width_min" <= "width_nominal"
    //      "width_max" >= "width_nominal"
    //
    //      "height_min" <= "height_nominal"
    //      "height_max" >= "height_nominal"
    //
    // If not observed, we issue an error message (and thus abort the save)...
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // check_widths_and_heights(
    //      $record_to_check
    //      )
    // - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $result =
        check_widths_and_heights(
            $replacement_record_after_updates
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
    }

    // -------------------------------------------------------------------------

    return array() ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// check_widths_and_heights()
// =============================================================================

function check_widths_and_heights(
    $record_to_check
    ) {

    // -------------------------------------------------------------------------
    // check_widths_and_heights(
    //      $record_to_check
    //      )
    // - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $record_to_check = Array(
    //          [created_server_datetime_utc]       => 1420422637
    //          [last_modified_server_datetime_utc] => 1420422637
    //          [key]                               => 9ffdb62f-a92f-4a3f-bcbb-275d7657863a-1420422637-585399-1398
    //          [name]                              => right-sidebar
    //          [title]                             => Right Sidebar
    //          [description]                       => xxx
    //          [width_nominal]                     => 300
    //          [width_min]                         => 100
    //          [width_max]                         => 999
    //          [height_nominal]                    => 480
    //          [height_min]                        =>
    //          [height_max]                        =>
    //          [sequence_number]                   =>
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $record_to_check ) ;

    // -------------------------------------------------------------------------
    // The rules are:-
    //
    //      "width_min" <= "width_nominal"
    //      "width_max" >= "width_nominal"
    //
    //      "height_min" <= "height_nominal"
    //      "height_max" >= "height_nominal"
    //
    // If not observed, we issue an error message (and thus abort the save)...
    // -------------------------------------------------------------------------

    // =========================================================================
    // Width...
    // =========================================================================

    if (    array_key_exists( 'width_nominal' , $record_to_check )
            &&
            trim( $record_to_check['width_nominal'] ) !== ''
        ) {

        // =====================================================================
        // "width_min" <= "width_nominal" ?
        // =====================================================================

        if (    array_key_exists( 'width_min' , $record_to_check )
                &&
                trim( $record_to_check['width_min'] ) !== ''
            ) {

            // -----------------------------------------------------------------

            $result = \bccomp(
                            $record_to_check['width_min']          ,
                            $record_to_check['width_nominal']
                            ) ;
                            //  Returns 0 if the two operands are equal,
                            //  1 if the left_operand is larger than the
                            //  right_operand, -1 otherwise.

            // -----------------------------------------------------------------

            if ( $result === 1 ) {

                $safe_width_min     = htmlentities( $record_to_check['width_min']     ) ;
                $safe_width_nominal = htmlentities( $record_to_check['width_nominal'] ) ;

                return <<<EOT
--ZEBRA--Bad "Width Min" ({$safe_width_min}) and/or "Width Nominal" ({$safe_width_nominal}) ("Width Min" must be <= "Width Nominal")
EOT;

            }

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // "width_max" >= "width_nominal" ?
        // =====================================================================

        if (    array_key_exists( 'width_max' , $record_to_check )
                &&
                trim( $record_to_check['width_max'] ) !== ''
            ) {

            // -----------------------------------------------------------------

            $result = \bccomp(
                            $record_to_check['width_max']          ,
                            $record_to_check['width_nominal']
                            ) ;
                            //  Returns 0 if the two operands are equal,
                            //  1 if the left_operand is larger than the
                            //  right_operand, -1 otherwise.

            // -----------------------------------------------------------------

            if ( $result === -1 ) {

                $safe_width_max     = htmlentities( $record_to_check['width_max']     ) ;
                $safe_width_nominal = htmlentities( $record_to_check['width_nominal'] ) ;

                return <<<EOT
--ZEBRA--Bad "Width Max" ({$safe_width_max}) and/or "Width Nominal" ({$safe_width_nominal}) ("Width Max" must be >= "Width Nominal")
EOT;

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Height...
    // =========================================================================

    if (    array_key_exists( 'height_nominal' , $record_to_check )
            &&
            trim( $record_to_check['height_nominal'] ) !== ''
        ) {

        // =====================================================================
        // "height_min" <= "height_nominal" ?
        // =====================================================================

        if (    array_key_exists( 'height_min' , $record_to_check )
                &&
                trim( $record_to_check['height_min'] ) !== ''
            ) {

            // -----------------------------------------------------------------

            $result = \bccomp(
                            $record_to_check['height_min']          ,
                            $record_to_check['height_nominal']
                            ) ;
                            //  Returns 0 if the two operands are equal,
                            //  1 if the left_operand is larger than the
                            //  right_operand, -1 otherwise.

            // -----------------------------------------------------------------

            if ( $result === 1 ) {

                $safe_height_min     = htmlentities( $record_to_check['height_min']     ) ;
                $safe_height_nominal = htmlentities( $record_to_check['height_nominal'] ) ;

                return <<<EOT
--ZEBRA--Bad "Height Min" ({$safe_height_min}) and/or "Height Nominal" ({$safe_height_nominal}) ("Height Min" must be <= "Height Nominal")
EOT;

            }

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // "height_max" >= "height_nominal" ?
        // =====================================================================

        if (    array_key_exists( 'height_max' , $record_to_check )
                &&
                trim( $record_to_check['height_max'] ) !== ''
            ) {

            // -----------------------------------------------------------------

            $result = \bccomp(
                            $record_to_check['height_max']          ,
                            $record_to_check['height_nominal']
                            ) ;
                            //  Returns 0 if the two operands are equal,
                            //  1 if the left_operand is larger than the
                            //  right_operand, -1 otherwise.

            // -----------------------------------------------------------------

            if ( $result === -1 ) {

                $safe_height_max     = htmlentities( $record_to_check['height_max']     ) ;
                $safe_height_nominal = htmlentities( $record_to_check['height_nominal'] ) ;

                return <<<EOT
--ZEBRA--Bad "Height Max" ({$safe_height_max}) and/or "Height Nominal" ({$safe_height_nominal}) ("Height Max" must be >= "Height Nominal")
EOT;

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // OK!
    // =========================================================================

    return TRUE ;

    // -------------------------------------------------------------------------

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
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAdsOutgoing\
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

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $dataset_records = Array(
    //
    //          [0] => Array(
    //                      [local_key]       => 971c0f7...d1a7142
    //                      [name]            => right-sidebar
    //                      [title]           => Right Sidebar
    //                      [description]     =>
    //                      [width_nominal]   => 300
    //                      [width_min]       =>
    //                      [width_max]       =>
    //                      [height_nominal]  => 400
    //                      [height_min]      => 32
    //                      [height_max]      => 1000
    //                      [sequence_number] => 10
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $dataset_records ) ;

    // =========================================================================
    // Init...
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__ ;

    // =========================================================================
    // local_key
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/random.php' ) ;

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/string-utils.php' ) ;

    // -------------------------------------------------------------------------

    $max_attempts = 30 ;

    $number_attempts = 0 ;

    // -------------------------------------------------------------------------

    while( TRUE ) {

        // ---------------------------------------------------------------------
        // Prevent lock-up...
        // ---------------------------------------------------------------------

        if ( $number_attempts >= $max_attempts ) {

            return <<<EOT
PROBLEM:&nbsp; Can't generate "local_key"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------
        // Generate a candidate local key...
        // ---------------------------------------------------------------------

        $candidate_local_key =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_random\secure_rand( 32 ) ;
                //  32 byte binary

        // ---------------------------------------------------------------------

        $candidate_local_key =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\hex_encode(
                $candidate_local_key
                ) ;
                //  64 character hex

        // ---------------------------------------------------------------------
        // Make sure this key not already used...
        // ---------------------------------------------------------------------

        $already_exists = FALSE ;

        // ---------------------------------------------------------------------

        foreach ( $dataset_records as $this_record ) {

            // -----------------------------------------------------------------

            if ( ! array_key_exists( 'local_key' , $this_record ) ) {

                return <<<EOT
PROBLEM:&nbsp; No "local_key"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            if (    ! is_string( $this_record['local_key'] )
                    ||
                    trim( $this_record['local_key'] ) === ''
                ) {

                return <<<EOT
PROBLEM:&nbsp; Bad "local_key" (non-empty string expected)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            if ( $this_record['local_key'] === $candidate_local_key ) {
                $already_exists = TRUE ;
                break ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        if ( ! $already_exists ) {
            break ;
        }

        // ---------------------------------------------------------------------

        $number_attempts++ ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $local_key = $candidate_local_key ;

    // =========================================================================
    // Create the default record...
    // =========================================================================

    $default_data = array(
        'local_key'     =>  $local_key      ,
        'global_sid'    =>  ''
        ) ;

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return array(
                'data'  =>  $default_data
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_type_selector_options()
// =============================================================================

function get_type_selector_options(
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
        'fixed-height-banner'       =>  'Fixed-Height Banner'       ,
        'flexi-height-banner'       =>  'Flexi-Height Banner'       ,
        'sidebar'                   =>  'Sidebar'                   ,
        'fixed-row-height-grid'     =>  'Fixed-Row-Height Grid'     ,
        'newspaper-style-grid'      =>  'Newspaper-Style Grid'
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
// get_fit_or_shrink_selector_options()
// =============================================================================

function get_fit_or_shrink_selector_options(
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
        'fit'       =>  'Fit'       ,
        'shrink'    =>  'Shrink'
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
// get_row_fill_method_selector_options()
// =============================================================================

function get_row_fill_method_selector_options(
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
        'none'                      =>  'None'                      ,
        'average'                   =>  'Average'                   ,
        'mid'                       =>  'Mid'                       ,
        'shortest'                  =>  'Shortest'                  ,
        'tallest'                   =>  'Tallest'
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
// get_halign_selector_options()
// =============================================================================

function get_halign_selector_options(
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
        'left'      =>  'Left'      ,
        'center'    =>  'Center'    ,
        'right'     =>  'Right'
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
// get_valign_selector_options()
// =============================================================================

function get_valign_selector_options(
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
        'top'       =>  'Top'       ,
        'middle'    =>  'Middle'    ,
        'bottom'    =>  'Bottom'
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
// get_yes_no_selector_options()
// =============================================================================

function get_yes_no_selector_options(
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
        'yes'       =>  'Yes'   ,
        'no'        =>  'No'
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
// That's that!
// =============================================================================

