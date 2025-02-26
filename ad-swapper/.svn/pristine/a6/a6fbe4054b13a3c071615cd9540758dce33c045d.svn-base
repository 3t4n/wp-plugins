<?php

// *****************************************************************************
// INCLUDES / DATASET-MANAGER / PRE-POST-ADD-EDIT-RECORD-ROUTINES.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// question_do_pre_add_routine()
// =============================================================================

function question_do_pre_add_routine(
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
    &$record_to_add
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // question_do_pre_add_routine(
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
    //      &$record_to_add
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // Checks and calls the dataset-specific pre add routine, if one was
    // specified.
    //
    // Called after the record to be updated has been successfully created.
    // But not yet:-
    //      o   Added to $dataset_records, or;
    //      o   Saved to disk.
    //
    // $record_to_add is provided by reference - so that this routine can
    // update it (before it's saved to disk).
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
    // Here we might have (eg):-
    //
    //      $selected_datasets_dmdd['pre_add_routine'] = array(
    //          'fn'            =>  'xxx'           ,
    //          'extra_args'    =>  array(...)
    //          ) ;
    //
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init...
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $stuff_to_pass_to_the_post_add_routine = array() ;

    // =========================================================================
    // Pre-add routine specified ?
    // =========================================================================

    if (    ! $question_adding
            ||
            ! array_key_exists( 'pre_add_routine' , $selected_datasets_dmdd )
            ||
            ! is_array( $selected_datasets_dmdd['pre_add_routine'] )
            ||
            count( $selected_datasets_dmdd['pre_add_routine'] ) < 1
        ) {
        return $stuff_to_pass_to_the_post_add_routine ;
    }

    // =========================================================================
    // YES - check it...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $selected_datasets_dmdd['pre_add_routine'] = array(
    //          'fn'            =>  'xxx'           ,
    //          'extra_args'    =>  array(...)
    //          ) ;
    //
    // -------------------------------------------------------------------------

    if ( ! array_key_exists( 'fn' , $selected_datasets_dmdd['pre_add_routine'] ) ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "pre_add_routine" (no "fn")
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    if (    ! is_string( $selected_datasets_dmdd['pre_add_routine']['fn'] )
            ||
            trim( $selected_datasets_dmdd['pre_add_routine']['fn'] ) === ''
        ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "pre_add_routine" + "fn" (non-empty string expected)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    if ( ! function_exists( $selected_datasets_dmdd['pre_add_routine']['fn'] ) ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "pre_add_routine" + "fn" (function not found)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    if ( array_key_exists( 'extra_args' , $selected_datasets_dmdd['pre_add_routine'] ) ) {

        $extra_args = $selected_datasets_dmdd['pre_add_routine']['extra_args'] ;

        if (    $extra_args === NULL
                ||
                $extra_args === FALSE
            ) {
            $extra_args = array() ;
        }

        if ( ! is_array( $extra_args ) ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "pre_add_routine" + "extra_args" (possibly empty array, NULL or FALSE expected)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

    } else {

        $extra_args = array() ;

    }

    // =========================================================================
    // Pre-add routine OK!  => Do it.
    // =========================================================================

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

    return $selected_datasets_dmdd['pre_add_routine']['fn'](
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
        $record_to_add                              ,
        $extra_args
        ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// question_do_pre_edit_routine()
// =============================================================================

function question_do_pre_edit_routine(
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
    &$replacement_record_after_updates
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // question_do_pre_edit_routine(
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
    //      &$replacement_record_after_updates
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // Checks and calls the dataset-specific pre add routine, if one was
    // specified.
    //
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

    // =========================================================================
    // Init...
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $stuff_to_pass_to_the_post_edit_routine = array() ;

    // =========================================================================
    // Pre-edit routine specified ?
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we might have (eg):-
    //
    //      $selected_datasets_dmdd['pre_edit_routine'] = array(
    //          'fn'            =>  'xxx'           ,
    //          'extra_args'    =>  array()
    //          ) ;
    //
    // -------------------------------------------------------------------------

    if (    $question_adding
            ||
            ! array_key_exists( 'pre_edit_routine' , $selected_datasets_dmdd )
            ||
            ! is_array( $selected_datasets_dmdd['pre_edit_routine'] )
            ||
            count( $selected_datasets_dmdd['pre_edit_routine'] ) < 1
        ) {
        return $stuff_to_pass_to_the_post_edit_routine ;
    }

    // =========================================================================
    // YES - check it...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $selected_datasets_dmdd['pre_edit_routine'] = array(
    //          'fn'            =>  'xxx'           ,
    //          'extra_args'    =>  array(...)
    //          ) ;
    //
    // -------------------------------------------------------------------------

    if ( ! array_key_exists( 'fn' , $selected_datasets_dmdd['pre_edit_routine'] ) ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "pre_edit_routine" (no "fn")
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    if (    ! is_string( $selected_datasets_dmdd['pre_edit_routine']['fn'] )
            ||
            trim( $selected_datasets_dmdd['pre_edit_routine']['fn'] ) === ''
        ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "pre_edit_routine" + "fn" (non-empty string expected)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    if ( ! function_exists( $selected_datasets_dmdd['pre_edit_routine']['fn'] ) ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "pre_edit_routine" + "fn" (function not found)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    if ( array_key_exists( 'extra_args' , $selected_datasets_dmdd['pre_edit_routine'] ) ) {

        $extra_args = $selected_datasets_dmdd['pre_edit_routine']['extra_args'] ;

        if (    $extra_args === NULL
                ||
                $extra_args === FALSE
            ) {
            $extra_args = array() ;
        }

        if ( ! is_array( $extra_args ) ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "pre_edit_routine" + "extra_args" (possibly empty array, NULL or FALSE expected)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

    } else {

        $extra_args = array() ;

    }

    // =========================================================================
    // Pre-edit routine OK!  => Do it.
    // =========================================================================

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

    return $selected_datasets_dmdd['pre_edit_routine']['fn'](
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
        $replacement_record_after_updates           ,
        $extra_args
        ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// question_do_post_add_routine()
// =============================================================================

function question_do_post_add_routine(
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

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $selected_datasets_dmdd['post_add_routine'] = array(
    //          'fn'            =>  'xxx'           ,
    //          'extra_args'    =>  array(...)
    //          ) ;
    //
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init...
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Post-add routine specified ?
    // =========================================================================

    if (    ! $question_adding
            ||
            ! array_key_exists( 'post_add_routine' , $selected_datasets_dmdd )
            ||
            ! is_array( $selected_datasets_dmdd['post_add_routine'] )
            ||
            count( $selected_datasets_dmdd['post_add_routine'] ) < 1
        ) {
        return TRUE ;
    }

    // =========================================================================
    // YES - check it...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $selected_datasets_dmdd['post_add_routine'] = array(
    //          'fn'            =>  'xxx'           ,
    //          'extra_args'    =>  array(...)
    //          ) ;
    //
    // -------------------------------------------------------------------------

    if ( ! array_key_exists( 'fn' , $selected_datasets_dmdd['post_add_routine'] ) ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "post_add_routine" (no "fn")
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    if (    ! is_string( $selected_datasets_dmdd['post_add_routine']['fn'] )
            ||
            trim( $selected_datasets_dmdd['post_add_routine']['fn'] ) === ''
        ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "post_add_routine" + "fn" (non-empty string expected)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    if ( ! function_exists( $selected_datasets_dmdd['post_add_routine']['fn'] ) ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "post_add_routine" + "fn" (function not found)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    if ( array_key_exists( 'extra_args' , $selected_datasets_dmdd['post_add_routine'] ) ) {

        $extra_args = $selected_datasets_dmdd['post_add_routine']['extra_args'] ;

        if (    $extra_args === NULL
                ||
                $extra_args === FALSE
            ) {
            $extra_args = array() ;
        }

        if ( ! is_array( $extra_args ) ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "post_add_routine" + "extra_args" (possibly empty array, NULL or FALSE expected)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

    } else {

        $extra_args = array() ;

    }

    // =========================================================================
    // Post-add routine OK!  => Do it.
    // =========================================================================

    // -------------------------------------------------------------------------
    // <some_dataset_specific_post_add_routine>(
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
    //      $extra_args                                 ,
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

    return $selected_datasets_dmdd['post_add_routine']['fn'](
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
        $stuff_passed_from_the_pre_add_routine      ,
        $extra_args
        ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// question_do_post_edit_routine()
// =============================================================================

function question_do_post_edit_routine(
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

    // -------------------------------------------------------------------------
    // Here we might have (eg):-
    //
    //      $selected_datasets_dmdd['post_edit_routine'] = array(
    //          'fn'            =>  'xxx'           ,
    //          'extra_args'    =>  array()
    //          ) ;
    //
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init...
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Post-edit routine specified ?
    // =========================================================================

    if (    $question_adding
            ||
            ! array_key_exists( 'post_edit_routine' , $selected_datasets_dmdd )
            ||
            ! is_array( $selected_datasets_dmdd['post_edit_routine'] )
            ||
            count( $selected_datasets_dmdd['post_edit_routine'] ) < 1
        ) {
        return TRUE ;
    }

    // =========================================================================
    // YES - check it...
    // =========================================================================

    // ---------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $selected_datasets_dmdd['post_edit_routine'] = array(
    //          'fn'            =>  'xxx'           ,
    //          'extra_args'    =>  array(...)
    //          ) ;
    //
    // ---------------------------------------------------------------------

    if ( ! array_key_exists( 'fn' , $selected_datasets_dmdd['post_edit_routine'] ) ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "post_edit_routine" (no "fn")
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // ---------------------------------------------------------------------

    if (    ! is_string( $selected_datasets_dmdd['post_edit_routine']['fn'] )
            ||
            trim( $selected_datasets_dmdd['post_edit_routine']['fn'] ) === ''
        ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "post_edit_routine" + "fn" (non-empty string expected)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // ---------------------------------------------------------------------

    if ( ! function_exists( $selected_datasets_dmdd['post_edit_routine']['fn'] ) ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "post_edit_routine" + "fn" (function not found)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // ---------------------------------------------------------------------

    if ( array_key_exists( 'extra_args' , $selected_datasets_dmdd['post_edit_routine'] ) ) {

        $extra_args = $selected_datasets_dmdd['post_edit_routine']['extra_args'] ;

        if (    $extra_args === NULL
                ||
                $extra_args === FALSE
            ) {
            $extra_args = array() ;
        }

        if ( ! is_array( $extra_args ) ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "post_edit_routine" + "extra_args" (possibly empty array, NULL or FALSE expected)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

    } else {

        $extra_args = array() ;

    }

    // =========================================================================
    // Post-edit routine OK!  => Do it.
    // =========================================================================

    // -------------------------------------------------------------------------
    // <some_dataset_specific_post_edit_routine>(
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
    //      $stuff_passed_from_the_pre_edit_routine     ,
    //      $extra_args
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

    return $selected_datasets_dmdd['post_edit_routine']['fn'](
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
        $stuff_passed_from_the_pre_edit_routine     ,
        $extra_args
        ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

