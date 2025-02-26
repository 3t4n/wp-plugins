<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / GET-DATABASE-UPDATE-METHOD.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// get_database_update_method()
// =============================================================================

function get_database_update_method(
    $core_plugapp_dirs                              ,
    $app_defs_directory_tree                        ,
    $applications_dataset_and_view_definitions_etc  ,
    $all_application_dataset_definitions            ,
    $loaded_datasets
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_database_update_method(
    //      $core_plugapp_dirs                              ,
    //      $app_defs_directory_tree                        ,
    //      $applications_dataset_and_view_definitions_etc  ,
    //      $all_application_dataset_definitions            ,
    //      $loaded_datasets
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns:-
    //      o   The application/plugin's DEFAULT database update method, and;
    //      o   Any dataset-specific OVERRIDES.
    //
    // NOTE!
    // =====
    // This routine is APP/PLUGIN specific.  It's defined in the
    // app/plugin's "plugin.stuff" dir.
    //
    // RETURNS
    //      On SUCCESS
    //          array(
    //              $default_database_update_method STRING
    //              One of:-
    //                  "none"
    //                  "manual"
    //                  "auto"
    //              ,
    //              NULL
    //              --OR--
    //              $dataset_specfic_update_method_overrides
    //              )
    //
    //          Where $dataset_specfic_update_method_overrides is like (eg):-
    //              array(
    //                  'dataset_slug_1'    =>  "none" || "manual" || "auto"    ,
    //                  'dataset_slug_2'    =>  "none" || "manual" || "auto"    ,
    //                  ...
    //                  )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Get the "Site Profile"...
    // =========================================================================

    $site_profile_dataset_slug = 'ad_swapper_site_profile' ;

    // -------------------------------------------------------------------------

    if (    array_key_exists(
                $site_profile_dataset_slug  ,
                $loaded_datasets
                )
            &&
            count( $loaded_datasets[ $site_profile_dataset_slug ]['records'] ) === 1
        ) {

        // ---------------------------------------------------------------------

        $site_profile = $loaded_datasets[ $site_profile_dataset_slug ]['records'][0] ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

//          $ln = __LINE__ - 2 ;
//
//          return <<<EOT
//  PROBLEM:&nbsp; No "Site Profile"
//  Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
//  EOT;
            //  CAN'T do this.  As if we do; a newly installed plugin - which
            //  by definition has NO Site Profile - will generate the above
            //  error when we try to edit/save the Site Profile record.
            //
            //  So we get stuck in a hole which we can't get out of.
            //
            //  To prevent this, we create a fake Site Profile record - for
            //  the use of this routine only - which keeps the following code
            //  happy.
            //
            //  NOTE that a newly installed plugin - by definition - has NO
            //  database/dataset/table data to be updated.  But we force
            //  manual updating ON - just in case.  Though in theory, we
            //  expect NO updating to be required.

        // ---------------------------------------------------------------------

        $site_profile = array(
            'question_manual_update_approval'   =>  TRUE
            ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // question_manual_update_approval ?
    // =========================================================================

    if (    ! array_key_exists(
                'question_manual_update_approval'       ,
                $site_profile
                )
        ) {

        // ---------------------------------------------------------------------

//          $ln = __LINE__ - 7 ;
//
//          return <<<EOT
//  PROBLEM:&nbsp; No "question_manual_update_approval" (in "Site Profile")
//  Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
//  EOT;

        // ---------------------------------------------------------------------

        $database_update_method = 'manual' ;

        // ---------------------------------------------------------------------

    } elseif ( ! is_bool( $site_profile['question_manual_update_approval'] ) ) {

        // ---------------------------------------------------------------------

//          $ln = __LINE__ - 4 ;
//
//          return <<<EOT
//  PROBLEM:&nbsp; Bad "question_manual_update_approval" (in "Site Profile")
//  Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
//  EOT;

        // ---------------------------------------------------------------------

        $database_update_method = 'manual' ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        if ( $site_profile['question_manual_update_approval'] ) {
            $database_update_method = 'manual' ;

        } else {
            $database_update_method = 'auto' ;

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $dataset_specfic_update_method_overrides = array(
        'ad_swapper_page_requests'  =>  'none'
        ) ;

    // -------------------------------------------------------------------------

    return array(
                $database_update_method                     ,
                $dataset_specfic_update_method_overrides
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

