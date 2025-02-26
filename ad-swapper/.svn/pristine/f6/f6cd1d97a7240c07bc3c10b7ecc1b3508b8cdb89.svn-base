<?php

// *****************************************************************************
// DATASET-MANAGER / UPDATE-AND-SAVE-ARRAY-STORED-DATASET-DATA.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// ============================================================================
// do_updaction_4_dataset()
// =============================================================================

function do_updaction_4_dataset(
    $core_plugapp_dirs                                                  ,
    &$loaded_datasets                                                   ,
    $dataset_slug                                                       ,
    $selected_datasets_dmdd                                             ,
    $record_indices_by_field_slug_to_add                                ,
    $record_indices_by_field_slug_to_remove                             ,
    $distinct_values_and_their_record_indices__by_field_slug__to_add    ,
    $distinct_values_and_their_record_indices__by_field_slug__to_remove
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // do_updaction_4_dataset(
    //      $core_plugapp_dirs                                                  ,
    //      &$loaded_datasets                                                   ,
    //      $dataset_slug                                                       ,
    //      $selected_datasets_dmdd                                             ,
    //      $record_indices_by_field_slug_to_add                                ,
    //      $record_indices_by_field_slug_to_remove                             ,
    //      $distinct_values_and_their_record_indices__by_field_slug__to_add    ,
    //      $distinct_values_and_their_record_indices__by_field_slug__to_remove
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Does the dataset updating requested by:-
    //      $_GET['updaction']
    //
    // Then saves the updated dataset back to array storage - and re-loads the
    // current page.
    //
    // RETURNS
    //      On SUCCESS
    //          FALSE   Means NO "updaction" was requested for this dataset.
    //                  So we should continue with the "auto" or "manual"
    //                  updating.
    //          NOTE!   If "updaction" WAS requested for this dataset - and
    //                  was completed successfully - then this routine
    //                  DOESN'T return.
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $record_indices_by_field_slug_to_add = Array(
    //
    //          [show_ads_list_reload_buttons] => Array(
    //              [0] => 0
    //              )
    //
    //          [question_manual_update_approval] => Array(
    //              [0] => 0
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $record_indices_by_field_slug_to_add        ,
//    '$record_indices_by_field_slug_to_add'
//    ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $record_indices_by_field_slug_to_remove = Array(
    //
    //          [hide_ads_list_reload_buttons] => Array(
    //              [0] => 0
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $record_indices_by_field_slug_to_remove     ,
//    '$record_indices_by_field_slug_to_remove'
//    ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $distinct_values_and_their_record_indices__by_field_slug__to_add = Array(
    //
    //          [show_ads_list_reload_buttons] => Array(
    //
    //              [0] => Array(
    //                          [value]             =>
    //                          [record_indices]    =>  Array(
    //                              [0] => 0
    //                              )
    //                          )
    //
    //              ...
    //
    //              )
    //
    //          [question_manual_update_approval] => Array(
    //
    //              [0] => Array(
    //                          [value]             =>
    //                          [record_indices]    => Array(
    //                              [0] => 0
    //                              )
    //                          )
    //
    //              ...
    //
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $distinct_values_and_their_record_indices__by_field_slug__to_add        ,
//    '$distinct_values_and_their_record_indices__by_field_slug__to_add'
//    ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $distinct_values_and_their_record_indices__by_field_slug__to_remove = Array(
    //
    //          [hide_ads_list_reload_buttons] => Array(
    //
    //              [0] => Array(
    //                          [value]          => 1
    //                          [record_indices] => Array(
    //                                                  [0] => 0
    //                                                  )
    //                          )
    //
    //              ...
    //
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $distinct_values_and_their_record_indices__by_field_slug__to_remove     ,
//    '$distinct_values_and_their_record_indices__by_field_slug__to_remove'
//    ) ;

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__ ;

    // =========================================================================
    // Retrieve the "updaction" parameters...
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/string-utils.php' ) ;

    // -------------------------------------------------------------------------

    $updaction = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\hex_decode( $_GET['updaction'] ) ;

    // -------------------------------------------------------------------------

    $updaction = @unserialize( $updaction ) ;
                //  Return Values
                //
                //  The converted value is returned, and can be a boolean,
                //  integer, float, string, array or object.
                //
                //  In case the passed string is not unserializeable, FALSE is
                //  returned and E_NOTICE is issued.

    // -------------------------------------------------------------------------

    if ( ! is_array( $updaction ) ) {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM:&nbsp; Bad "updaction" (#1)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $updaction , '$updaction' ) ;

    // =========================================================================
    // ERROR CHECKING...
    // =========================================================================

    if (    count( $updaction ) !== 3
            ||
            ! array_key_exists( 'dataset' , $updaction )
            ||
            ! array_key_exists( 'field' , $updaction )
            ||
            ! array_key_exists( 'action' , $updaction )
        ) {

        $ln = __LINE__ - 6 ;

        return <<<EOT
PROBLEM:&nbsp; Bad "updaction" (#2)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------
    // dataset ?
    // -------------------------------------------------------------------------

    if (    ! is_string( $updaction['dataset'] )
            ||
            trim( $updaction['dataset'] ) === ''
            ||
            ! array_key_exists( $updaction['dataset'] , $loaded_datasets )
        ) {

        $ln = __LINE__ - 5 ;

        return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "dataset"
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // =========================================================================
    // If the "updaction" DATASET ISN'T the current dataset, then abort...
    // =========================================================================

    if ( $updaction['dataset'] !== $dataset_slug ) {
        return FALSE ;
    }

    // =========================================================================
    // ERROR CHECKING (cont'd)...
    // =========================================================================

    // -------------------------------------------------------------------------
    // field ?
    // -------------------------------------------------------------------------

    if (    ! is_null( $updaction['field'] )
            &&
            (   ! is_string( $updaction['field'] )
                ||
                trim( $updaction['field'] ) === ''
                )
        ) {

        $ln = __LINE__ - 6 ;

        return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field"
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------
    // action ?
    // -------------------------------------------------------------------------

    if (    ! is_string( $updaction['action'] )
            ||
            trim( $updaction['action'] ) === ''
        ) {

        $ln = __LINE__ - 4 ;

        return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "action"
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // =========================================================================
    // Error check and PROCESS the recognised/supported actions...
    // =========================================================================

    if ( $updaction['action'] === 'add-this-field' ) {

        // =====================================================================
        // ADD-THIS-FIELD
        // =====================================================================

        if (    ! is_string( $updaction['field'] )
                ||
                ! array_key_exists(
                        $updaction['field']                                                 ,
                        $distinct_values_and_their_record_indices__by_field_slug__to_add
                        )

            ) {

            $ln = __LINE__ - 8 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field"
For action:&nbsp; {$updaction['action']}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------
        // Create the updated dataset...
        // ---------------------------------------------------------------------

        $new_dataset_records =
            $loaded_datasets[ $dataset_slug ]['records']
            ;

        // ---------------------------------------------------------------------

        foreach (   $distinct_values_and_their_record_indices__by_field_slug__to_add[ $updaction['field'] ]
                    as
                    $this_distinct_value_and_its_record_indices
            ) {

            // -----------------------------------------------------------------

            $this_distinct_value = $this_distinct_value_and_its_record_indices['value'] ;

            // -----------------------------------------------------------------

            $these_record_indices = $this_distinct_value_and_its_record_indices['record_indices'] ;

            // -----------------------------------------------------------------

            foreach ( $these_record_indices as $this_target_index ) {

                // -------------------------------------------------------------

                $new_dataset_records[ $this_target_index ][ $updaction['field'] ] =
                    $this_distinct_value
                    ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Save the updated dataset...
        // ---------------------------------------------------------------------

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
        // NOTE!
        // -----
        // Does:-
        //      $array_to_save = array_values( $array_to_save ) ;
        //
        // to ensures it's indices are 0, 1, 2... (before saving it).
        //
        // ---
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
        //          TRUE
        //
        //      o   On FAILURE
        //          - - - - -
        //          $error message STRING
        // -------------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\save_numerically_indexed(
                $dataset_slug           ,
                $new_dataset_records
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $updaction['action'] === 'add-all-dataset-fields' ) {

        // =====================================================================
        // ADD-ALL-DATASET-FIELDS
        // =====================================================================

        if ( ! is_null( $updaction['field'] ) ) {

            $ln = __LINE__ - 2 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field"
For action:&nbsp; {$updaction['action']}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------
        // Create the updated dataset...
        // ---------------------------------------------------------------------

        $new_dataset_records =
            $loaded_datasets[ $dataset_slug ]['records']
            ;

        // ---------------------------------------------------------------------

        foreach (   $distinct_values_and_their_record_indices__by_field_slug__to_add
                    as
                    $this_field_slug => $these_distinct_values_and_record_indices
            ) {

            // -----------------------------------------------------------------

            foreach (   $these_distinct_values_and_record_indices
                        as
                        $this_distinct_value_and_its_record_indices
                ) {

                // -------------------------------------------------------------

                $this_distinct_value = $this_distinct_value_and_its_record_indices['value'] ;

                // -------------------------------------------------------------

                $these_record_indices = $this_distinct_value_and_its_record_indices['record_indices'] ;

                // -------------------------------------------------------------

                foreach ( $these_record_indices as $this_target_index ) {

                    // ---------------------------------------------------------

                    $new_dataset_records[ $this_target_index ][ $this_field_slug ] =
                        $this_distinct_value
                        ;

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Save the updated dataset...
        // ---------------------------------------------------------------------

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
        // NOTE!
        // -----
        // Does:-
        //      $array_to_save = array_values( $array_to_save ) ;
        //
        // to ensures it's indices are 0, 1, 2... (before saving it).
        //
        // ---
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
        //          TRUE
        //
        //      o   On FAILURE
        //          - - - - -
        //          $error message STRING
        // -------------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\save_numerically_indexed(
                $dataset_slug           ,
                $new_dataset_records
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $updaction['action'] === 'remove-this-field' ) {

        // =====================================================================
        // REMOVE-THIS-FIELD
        // =====================================================================

        if ( count( $record_indices_by_field_slug_to_add ) > 0 ) {

            $ln = __LINE__ - 2 ;

            return <<<EOT
PROBLEM:&nbsp; Can't remove fields (because this dataset still has some fields to add)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        if (    ! is_string( $updaction['field'] )
                ||
                ! array_key_exists(
                        $updaction['field']                                                 ,
                        $distinct_values_and_their_record_indices__by_field_slug__to_remove
                        )

            ) {

            $ln = __LINE__ - 8 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field"
For action:&nbsp; {$updaction['action']}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------
        // Create the updated dataset...
        // ---------------------------------------------------------------------

        $new_dataset_records =
            $loaded_datasets[ $dataset_slug ]['records']
            ;

        // ---------------------------------------------------------------------

        foreach (   $distinct_values_and_their_record_indices__by_field_slug__to_remove[ $updaction['field'] ]
                    as
                    $this_distinct_value_and_its_record_indices
            ) {

            // -----------------------------------------------------------------

            foreach (   $this_distinct_value_and_its_record_indices['record_indices']
                        as
                        $this_target_index
                ) {

                // -------------------------------------------------------------

                unset( $new_dataset_records[ $this_target_index ][ $updaction['field'] ] ) ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Save the updated dataset...
        // ---------------------------------------------------------------------

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
        // NOTE!
        // -----
        // Does:-
        //      $array_to_save = array_values( $array_to_save ) ;
        //
        // to ensures it's indices are 0, 1, 2... (before saving it).
        //
        // ---
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
        //          TRUE
        //
        //      o   On FAILURE
        //          - - - - -
        //          $error message STRING
        // -------------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\save_numerically_indexed(
                $dataset_slug           ,
                $new_dataset_records
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $updaction['action'] === 'remove-all-dataset-fields' ) {

        // =====================================================================
        // REMOVE-ALL-DATASET-FIELDS
        // =====================================================================

        if ( count( $record_indices_by_field_slug_to_add ) > 0 ) {

            $ln = __LINE__ - 2 ;

            return <<<EOT
PROBLEM:&nbsp; Can't remove fields (because this dataset still has some fields to add)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        if ( ! is_null( $updaction['field'] ) ) {

            $ln = __LINE__ - 2 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field"
For action:&nbsp; {$updaction['action']}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------
        // Create the updated dataset...
        // ---------------------------------------------------------------------

        $new_dataset_records =
            $loaded_datasets[ $dataset_slug ]['records']
            ;

        // ---------------------------------------------------------------------

        foreach (   $distinct_values_and_their_record_indices__by_field_slug__to_remove
                    as
                    $this_field_slug => $these_distinct_values_and_record_indices
            ) {

            // -----------------------------------------------------------------

            foreach (   $these_distinct_values_and_record_indices
                        as
                        $this_distinct_value_and_its_record_indices
                ) {

                // -------------------------------------------------------------

                foreach (   $this_distinct_value_and_its_record_indices['record_indices']
                            as
                            $this_target_index
                    ) {

                    // ---------------------------------------------------------

                    unset( $new_dataset_records[ $this_target_index ][ $this_field_slug ] ) ;

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Save the updated dataset...
        // ---------------------------------------------------------------------

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
        // NOTE!
        // -----
        // Does:-
        //      $array_to_save = array_values( $array_to_save ) ;
        //
        // to ensures it's indices are 0, 1, 2... (before saving it).
        //
        // ---
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
        //          TRUE
        //
        //      o   On FAILURE
        //          - - - - -
        //          $error message STRING
        // -------------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\save_numerically_indexed(
                $dataset_slug           ,
                $new_dataset_records
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $updaction['action'] === 'add-all-then-remove-all' ) {

        // =====================================================================
        // ADD-ALL-THEN-REMOVE-ALL
        // =====================================================================

        if ( ! is_null( $updaction['field'] ) ) {

            $ln = __LINE__ - 2 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field"
For action:&nbsp; {$updaction['action']}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------
        // Create the updated dataset...
        // ---------------------------------------------------------------------

        $new_dataset_records =
            $loaded_datasets[ $dataset_slug ]['records']
            ;

        // ---------------------------------------------------------------------
        // ADD ALL
        // ---------------------------------------------------------------------

        foreach (   $distinct_values_and_their_record_indices__by_field_slug__to_add
                    as
                    $this_field_slug => $these_distinct_values_and_record_indices
            ) {

            // -----------------------------------------------------------------

            foreach (   $these_distinct_values_and_record_indices
                        as
                        $this_distinct_value_and_its_record_indices
                ) {

                // -------------------------------------------------------------

                $this_distinct_value = $this_distinct_value_and_its_record_indices['value'] ;

                // -------------------------------------------------------------

                $these_record_indices = $this_distinct_value_and_its_record_indices['record_indices'] ;

                // -------------------------------------------------------------

                foreach ( $these_record_indices as $this_target_index ) {

                    // ---------------------------------------------------------

                    $new_dataset_records[ $this_target_index ][ $this_field_slug ] =
                        $this_distinct_value
                        ;

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // REMOVE ALL
        // ---------------------------------------------------------------------

        foreach (   $distinct_values_and_their_record_indices__by_field_slug__to_remove
                    as
                    $this_field_slug => $these_distinct_values_and_record_indices
            ) {

            // -----------------------------------------------------------------

            foreach (   $these_distinct_values_and_record_indices
                        as
                        $this_distinct_value_and_its_record_indices
                ) {

                // -------------------------------------------------------------

                foreach (   $this_distinct_value_and_its_record_indices['record_indices']
                            as
                            $this_target_index
                    ) {

                    // ---------------------------------------------------------

                    unset( $new_dataset_records[ $this_target_index ][ $this_field_slug ] ) ;

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Save the updated dataset...
        // ---------------------------------------------------------------------

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
        // NOTE!
        // -----
        // Does:-
        //      $array_to_save = array_values( $array_to_save ) ;
        //
        // to ensures it's indices are 0, 1, 2... (before saving it).
        //
        // ---
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
        //          TRUE
        //
        //      o   On FAILURE
        //          - - - - -
        //          $error message STRING
        // -------------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\save_numerically_indexed(
                $dataset_slug           ,
                $new_dataset_records
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

    } else {

        // =====================================================================
        // ERROR
        // =====================================================================

        $ln = __LINE__ - 4 ;

        return <<<EOT
PROBLEM:&nbsp; Unrecognised/unsupported "updaction" + "action"
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Dataset Manually Updated OK!
    //
    //      =>  Update this datase's
    //              "last checked dataset details"...
    // =========================================================================

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_GET , '$_GET' ) ;

    // -------------------------------------------------------------------------

/*
    if (    array_key_exists( 'application' , $_GET )
            &&
            trim( $_GET['application'] ) !== ''
            &&
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_dash( $_GET['application'] )
        ) {

        // ---------------------------------------------------------------------

        $option_name =
            str_replace( '-' , '_' , $_GET['application'] ) .
            '_last_checked_dataset_details'
            ;

        // ---------------------------------------------------------------------

        $last_checked_dataset_details =
            get_option( $option_name ) ;
                //  Returns the current value for the specified option.  If the
                //  option does not exist, returns parameter $default if
                //  specified or boolean FALSE by default.

        // ---------------------------------------------------------------------

        if ( $last_checked_dataset_details === FALSE ) {
            $last_checked_dataset_details = array() ;
        }

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_dataset_definition_file_details(
        //      $core_plugapp_dirs      ,
        //      $dataset_slug
        //      )
        // - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      On SUCCESS
        //          array(
        //              $dd_filespec    ,
        //              $filesize       ,
        //              $filemtime      ,
        //              $sha1_file
        //              )
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        $result = get_dataset_definition_file_details(
                        $core_plugapp_dirs      ,
                        $dataset_slug
                        ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        list(
            $dd_filespec    ,
            $filesize       ,
            $filemtime      ,
            $sha1_file
            ) = $result ;

        // ---------------------------------------------------------------------

        $last_checked_dataset_details[ $dataset_slug ] = array(
            'filesize'  =>  $filesize       ,
            'filemtime' =>  $filemtime      ,
            'sha1_file' =>  $sha1_file
            ) ;

        // -------------------------------------------------------------------------
        // update_option( $option, $new_value, $autoload )
        // - - - - - - - - - - - - - - - - - - - - - - - -
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
        //      $newvalue
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
                        $option_name                    ,
                        $last_checked_dataset_details
                        ) ;

        // ---------------------------------------------------------------------

        if ( $result !== TRUE ) {

            $ln = __LINE__ - 2 ;

            $safe_dataset_slug = htmlentities( $dataset_slug ) ;

            return <<<EOT
PROBLEM:&nbsp; "set_option()" failure updating db update details
For dataset:&nbsp; {$safe_dataset_slug}
Detected in:&nbsp; \\{$ns}\\{$fn} near line {$ln}
EOT;

        }

        // -----------------------------------------------------------

    }
*/

    // =========================================================================
    // SUCCESS!
    //
    //      =>  Go back to the calling page (= plugin home page), with URL
    //          params:-
    //              o   "updaction" removed, and;
    //              o   "updaction_finished" = <dataset_slug>
    //
    //          So as to trigger the database update routines into updating:-
    //              "last checked dataset details"
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/url-utils.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\
    // get_query_adjusted_current_page_url(
    //      $query_changes = array()        ,
    //      $question_amp = FALSE           ,
    //      $question_die_on_error = FALSE
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Attempts to retrieve the current page URL from $_SERVER.
    //
    // If successful, returns the URL with the query part adjusted as
    // requested.
    //
    // ---
    //
    // $query_changes is like:-
    //
    //      $query_changes = array(
    //                          'name1'     =>  NULL
    //                          'name2'     =>  'xxx'
    //                          )
    //
    // Where the values supplied should NOT be URL encoded.
    // ("get_query_adjusted_current_page_url()" will urlencode() them 4 you.)
    //
    // If the value is NULL, then the query parameter is removed (if it
    // exists).  Otherwise, the query parameter is set (silently overwriting
    // any existing value).
    //
    // RETURNS
    //      o   On SUCCESS!
    //          -----------
    //          $query_adjusted_current_page_url STRING
    //
    //      o   On FAILURE!
    //          -----------
    //          If $question_die_on_error = TRUE
    //              Doesn't return
    //          If $question_die_on_error = FALSE
    //              array( $error_message STRING )
    // -------------------------------------------------------------------------

    $query_changes = array(
        'updaction'             =>  NULL            ,
        'updaction_finished'    =>  $dataset_slug
        ) ;

    // -------------------------------------------------------------------------

    $question_amp          = FALSE ;

    $question_die_on_error = FALSE ;

    // -------------------------------------------------------------------------

    $url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\get_query_adjusted_current_page_url(
            $query_changes              ,
            $question_amp               ,
            $question_die_on_error
            ) ;

    // -------------------------------------------------------------------------

/*
    $go_back_to_calling_page = <<<EOT
<script type="text/javascript">
    location.href="{$url}" ;
</script>
EOT;

    // -------------------------------------------------------------------------

    echo $go_back_to_calling_page ;
*/

    // -------------------------------------------------------------------------

    $ok = <<<EOT
<h3>Dataset Updated OK</h3>

<p><a href="{$url}" style="font-size:133%; font-weight:bold; text-decoration:none">OK</a></p>

<br />
<br />
<br />
EOT;

    // -------------------------------------------------------------------------

    die( $ok ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

