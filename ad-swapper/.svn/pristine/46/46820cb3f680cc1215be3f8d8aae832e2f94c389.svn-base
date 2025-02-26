<?php

// *****************************************************************************
// DATASET-MANAGER / UPDATE-ARRAY-STORED-DATASET-DATA.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// ============================================================================
// update_array_stored_dataset_data()
// =============================================================================

function update_array_stored_dataset_data(
    $core_plugapp_dirs              ,
    &$loaded_datasets               ,
    $dataset_slug                   ,
    $selected_datasets_dmdd         ,
    $this_dataset_update_method
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // update_array_stored_dataset_data(
    //      $core_plugapp_dirs              ,
    //      &$loaded_datasets               ,
    //      $dataset_slug                   ,
    //      $selected_datasets_dmdd         ,
    //      $this_dataset_update_method
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // This routine is called - when the application/plugin first starts -
    // if the:-
    //      "xxx.app/yyy.dd.php"
    //
    // file (in which the dataset is defined) - has been changed since the
    // last time this routine was run.
    //
    // ---
    //
    // This routine then checks to see whether the dataset structure defined
    // in the dataset definition file:-
    //      "xxx.app/yyy.dd.php"
    //
    // matches the structure in the stored $dataset_records.  And if NOT,
    // updates the stored dataset records as specified by:-
    //      $this_dataset_update_method
    //
    // ---
    //
    // $this_dataset_update_method is "auto" or "manual".
    //
    // RETURNS
    //      On SUCCESS
    //          TRUE  - If "auto" update required AND successfully
    //                  completed.
    //          --OR--
    //          FALSE - If "auto" update required BUT NOT done.
    //          --OR--
    //          NULL  - NO database updating is required (for this
    //                  dataset) - AND - "updaction_finished" was set
    //                  (for this dataset).
    //          --OR--
    //          array(
    //              $manual_approval_page_html__4_dataset    STRING     ,
    //              $distinct_value_summary_pages__4_dataset STRING     ,
    //              $record_listing_pages__4_dataset         STRING
    //              ) ARRAY
    //              NOTE!   All the above strings will be EMPTY, if the dataset
    //                      required NO ("auto" or "manual") updates.
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_GET , '$_GET' ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_POST , '$_POST' ) ;

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $get_new_field_function_error_token = '[*GET*NEW_FIELD*FUNCTION*ERROR*]' ;

    // -------------------------------------------------------------------------

    $safe_dataset_slug = htmlentities( $dataset_slug ) ;

    // =========================================================================
    // Get the fields to ADD (if any)...
    // =========================================================================

    $defined_field_slugs = array() ;

    // -------------------------------------------------------------------------

    $record_indices_by_field_slug_to_add = array() ;

    // -------------------------------------------------------------------------

    foreach ( $selected_datasets_dmdd['array_storage_record_structure'] as $this_defn_index => $this_defn_record ) {

        // ---------------------------------------------------------------------

        $defined_field_slugs[] = $this_defn_record['slug'] ;

        // ---------------------------------------------------------------------

        foreach ( $loaded_datasets[ $dataset_slug ]['records'] as $this_data_index => $this_data_record ) {

            // -----------------------------------------------------------------

            if (    ! array_key_exists(
                            $this_defn_record['slug']       ,
                            $this_data_record
                            )
                ) {

                // -------------------------------------------------------------

                if (    array_key_exists(
                            $this_defn_record['slug']               ,
                            $record_indices_by_field_slug_to_add
                            )
                    ) {

                    $record_indices_by_field_slug_to_add[ $this_defn_record['slug'] ][] =
                        $this_data_index
                        ;

                } else {

                    $record_indices_by_field_slug_to_add[ $this_defn_record['slug'] ] =
                        array( $this_data_index )
                        ;

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

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

    // =========================================================================
    // Get the fields to REMOVE (if any)...
    // =========================================================================

    $record_indices_by_field_slug_to_remove = array() ;

    // -------------------------------------------------------------------------

    foreach ( $loaded_datasets[ $dataset_slug ]['records'] as $this_data_index => $this_data_record ) {

        // ---------------------------------------------------------------------

        foreach ( $this_data_record as $name => $value ) {

            // -----------------------------------------------------------------

            if (    ! in_array(
                            $name                   ,
                            $defined_field_slugs    ,
                            TRUE
                            )
                ) {

                // -------------------------------------------------------------

                if (    array_key_exists(
                            $name                                       ,
                            $record_indices_by_field_slug_to_remove
                            )
                    ) {

                    $record_indices_by_field_slug_to_remove[ $name ][] =
                        $this_data_index
                        ;

                } else {

                    $record_indices_by_field_slug_to_remove[ $name ] =
                        array( $this_data_index )
                        ;

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

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

    // =========================================================================
    // Init.
    // =========================================================================

    $nothing_to_do = array( '' , '' , '' ) ;

    // =========================================================================
    // Anything to do ?
    // =========================================================================

    if (    count( $record_indices_by_field_slug_to_add ) < 1
            &&
            count( $record_indices_by_field_slug_to_remove ) < 1
        ) {

        // =====================================================================
        // Updaction Finished ?
        // =====================================================================

        if (    array_key_exists( 'updaction_finished' , $_GET )
                &&
                $_GET['updaction_finished'] === $dataset_slug
            ) {

            return NULL ;

        }

        // =====================================================================
        // That's that!
        // =====================================================================

        return $nothing_to_do ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Check that each field to ADD has a GET NEW FIELD VALUE function...
    // =========================================================================

    if ( count( $record_indices_by_field_slug_to_add ) > 0 ) {

        // ----------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $selected_datasets_dmdd = array(
        //
        //          ...
        //
        //          'get_new_field_value_functions'     =>  array(
        //              'show_ads_list_reload_buttons'  =>  array(
        //                  'name'  =>  '\\' . __NAMESPACE__ . '\\get_new_field_value_4_show_ads_list_reload_buttons'   ,
        //                  'args'  =>  array()
        //                  )   ,
        //              'question_manual_update_approval'  =>  array(
        //                  'name'  =>  '\\' . __NAMESPACE__ . '\\get_new_field_value_4_question_manual_update_approval'   ,
        //                  'args'  =>  array()
        //                  )
        //              )
        //
        //          ...
        //
        //          )
        //
        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                    'get_new_field_value_functions'     ,
                    $selected_datasets_dmdd
                    )
                ||
                ! is_array( $selected_datasets_dmdd['get_new_field_value_functions'] )
                ||
                count( $selected_datasets_dmdd['get_new_field_value_functions'] ) < 1
            ) {

            // -----------------------------------------------------------------

            $ln = __LINE__ - 8 ;

            $count = count( $record_indices_by_field_slug_to_add ) ;

            $field_slugs_to_add = '' ;

            foreach ( $record_indices_by_field_slug_to_add as $this_field_slug => $these_record_indices ) {

                $safe_field_slug = htmlentities( $this_field_slug ) ;

                $field_slugs_to_add .= <<<EOT
<li style="margin-top:0; margin-bottom:0; padding-left:0.33em; font-weight:bold; color:#003399">{$safe_field_slug}</li>
EOT;

            }

            // -----------------------------------------------------------------

            $msg = <<<EOT
<br />

<div style="max-width:640px; color:#800000">

    <h1>Database Update</h1>

    <br />

    <p>PROBLEM:&nbsp; There are {$count} fields to ADD - but NO
    "get_new_field_value" functions defined.</p>

    <p style="margin-bottom:0">The fields - of dataset <b style="color:#003399;
    font-size:124%">{$safe_dataset_slug}</b> - that need "get_new_field_value"
    functions - are:-</p>

    <ul style="list-style-type:disc; margin-left:2em">{$field_slugs_to_add}</ul>

    <p>Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}</p>

</div>
EOT;

            // -----------------------------------------------------------------

            $msg = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_one_line(
                        $msg
                        ) ;

            // -----------------------------------------------------------------

            return $get_new_field_function_error_token . $msg ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        $get_new_field_value_function_errors = '' ;

        // ---------------------------------------------------------------------

        $tdh_style = <<<EOT
padding:4px 12px
EOT;

        // ---------------------------------------------------------------------

        $tdh_name_style = <<<EOT
padding:4px 12px; color:#003399; font-weight:bold
EOT;

        // ---------------------------------------------------------------------

        foreach ( $record_indices_by_field_slug_to_add as $this_field_slug => $these_record_indices ) {

            // -----------------------------------------------------------------

            if (    ! array_key_exists(
                        $this_field_slug                                            ,
                        $selected_datasets_dmdd['get_new_field_value_functions']
                        )
                ) {

                // -------------------------------------------------------------

                $get_new_field_value_function_errors .= <<<EOT
<tr>
    <td style="{$tdh_name_style}">{$this_field_slug}</td>
    <td style="{$tdh_style}">NO "get_new_field_value" function defined</td>
</tr>
EOT;

                // -------------------------------------------------------------

                continue ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            if ( ! is_array( $selected_datasets_dmdd['get_new_field_value_functions'][ $this_field_slug ] ) ) {

                // -------------------------------------------------------------

                $get_new_field_value_function_errors .= <<<EOT
<tr>
    <td style="{$tdh_name_style}">{$this_field_slug}</td>
    <td style="{$tdh_style}">Bad "get_new_field_value" function definition (array expected)</td>
</tr>
EOT;

                // -------------------------------------------------------------

                continue ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            if (    ! array_key_exists(
                        'name'                                                                          ,
                        $selected_datasets_dmdd['get_new_field_value_functions'][ $this_field_slug ]
                        )
                ) {

                // -------------------------------------------------------------

                $get_new_field_value_function_errors .= <<<EOT
<tr>
    <td style="{$tdh_name_style}">{$this_field_slug}</td>
    <td style="{$tdh_style}">Bad "get_new_field_value" function definition (no function "name")</td>
</tr>
EOT;

                // -------------------------------------------------------------

                continue ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            $get_new_field_value_function_name =
                $selected_datasets_dmdd['get_new_field_value_functions'][ $this_field_slug ]['name']
                ;

            // -------------------------------------------------------------

            if (    ! is_string( $get_new_field_value_function_name )
                    ||
                    trim( $get_new_field_value_function_name ) === ''
                ) {

                // -------------------------------------------------------------

                $get_new_field_value_function_errors .= <<<EOT
<tr>
    <td style="{$tdh_name_style}">{$this_field_slug}</td>
    <td style="{$tdh_style}">Bad "get_new_field_value" function "name" (non-empty string expected)</td>
</tr>
EOT;

                // -------------------------------------------------------------

                continue ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            if ( ! function_exists( $get_new_field_value_function_name ) ) {

                // -------------------------------------------------------------

                $get_new_field_value_function_errors .= <<<EOT
<tr>
    <td style="{$tdh_name_style}">{$this_field_slug}</td>
    <td style="{$tdh_style}">Bad "get_new_field_value" function (function not found)</td>
</tr>
EOT;

                // -------------------------------------------------------------

                continue ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        if ( $get_new_field_value_function_errors !== '' ) {

            // -----------------------------------------------------------------

            $ln = __LINE__ - 4 ;

            // -----------------------------------------------------------------

            $msg = <<<EOT
<br />

<div style="max-width:640px; color:#800000">

    <h1>Database Update</h1>

    <br />

    <p>PROBLEM:&nbsp; One or more of the fields to add - to the <b
    style="color:#003399; font-size:124%">{$safe_dataset_slug}</b> dataset -
    have <b>NO or an invalid "get_new_field_value" function</b>.&nbsp; As
    follows:-</p>

    <div style="padding-left:2em"><table
        border="1"
        cellpadding="0"
        cellspacing="0"
        >
        <tr>
            <th style="{$tdh_style}">Field</th>
            <th style="{$tdh_style}">Problem/Error</th>
        </tr>
        {$get_new_field_value_function_errors}
    </table></div>

    <br />

    <p>Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}</p>

</div>
EOT;

            // -----------------------------------------------------------------

            $msg = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_one_line(
                        $msg
                        ) ;

            // -----------------------------------------------------------------

            return $get_new_field_function_error_token . $msg ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Support Routines..
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/update-xxx-stored-dataset-data-support.php' ) ;

    // =========================================================================
    // Get the DISTINCT VALUES to ADD...
    // =========================================================================

    // --------------------------------------------------------------------------
    // Here we should/must have (eg):-
    //
    //      $selected_datasets_dmdd = array(
    //
    //          ...
    //
    //          'get_new_field_value_functions'     =>  array(
    //              'show_ads_list_reload_buttons'  =>  array(
    //                  'name'  =>  '\\' . __NAMESPACE__ . '\\get_new_field_value_4_show_ads_list_reload_buttons'   ,
    //                  'args'  =>  array()
    //                  )   ,
    //              'question_manual_update_approval'  =>  array(
    //                  'name'  =>  '\\' . __NAMESPACE__ . '\\get_new_field_value_4_question_manual_update_approval'   ,
    //                  'args'  =>  array()
    //                  )
    //              )
    //
    //          ...
    //
    //          )
    //
    // --------------------------------------------------------------------------

    $distinct_values_and_their_record_indices__by_field_slug__to_add = array() ;

    // --------------------------------------------------------------------------

    foreach ( $record_indices_by_field_slug_to_add as $this_slug => $record_indices_to_add_this_field_to ) {

        // ---------------------------------------------------------------------

        $get_new_field_value_function_name =
            $selected_datasets_dmdd['get_new_field_value_functions'][ $this_slug ]['name']
            ;

        // ---------------------------------------------------------------------

        if (    array_key_exists(
                    'args'                                                                  ,
                    $selected_datasets_dmdd['get_new_field_value_functions'][ $this_slug ]
                    )
            ) {

            $get_new_field_value_function_args =
                $selected_datasets_dmdd['get_new_field_value_functions'][ $this_slug ]['args']
                ;

        } else {

            $get_new_field_value_function_args = NULL ;

        }

        // ---------------------------------------------------------------------

        $distinct_values_and_their_record_indices = array() ;

        // ---------------------------------------------------------------------

        foreach ( $record_indices_to_add_this_field_to as $this_record_index ) {

            // -----------------------------------------------------------------

            $this_record =
                $loaded_datasets[ $dataset_slug ]['records'][ $this_record_index ]
                ;

            // -------------------------------------------------------------------------
            // <array_stored_get_new_field_value_function>(
            //      $core_plugapp_dirs                          ,
            //      $loaded_datasets                            ,
            //      $dataset_slug                               ,
            //      $selected_datasets_dmdd                     ,
            //      $record_indices_by_field_slug_to_add        ,
            //      $record_indices_by_field_slug_to_remove     ,
            //      $this_record                                ,
            //      $field_slug_to_add                          ,
            //      $get_new_field_value_function_args
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - - - -
            // Returns the value for the specified field to be added to the
            // specified record.
            //
            // RETURNS
            //      On SUCCESS
            //          array(
            //              $ok = TRUE
            //              $new_field_value (any PHP type)
            //              )
            //
            //      On FAILURE
            //          array(
            //              $ok = FALSE
            //              $error_message STRING
            //              )
            // -------------------------------------------------------------------------

            $result =
                $get_new_field_value_function_name(
                    $core_plugapp_dirs                          ,
                    $loaded_datasets                            ,
                    $dataset_slug                               ,
                    $selected_datasets_dmdd                     ,
                    $record_indices_by_field_slug_to_add        ,
                    $record_indices_by_field_slug_to_remove     ,
                    $this_record                                ,
                    $this_slug                                  ,
                    $get_new_field_value_function_args
                    ) ;

            // -----------------------------------------------------------------

            list(
                $ok                 ,
                $new_field_value
                ) = $result ;

            // -----------------------------------------------------------------

            if ( $ok === FALSE ) {
                return $new_field_value ;
            }

            // -------------------------------------------------------------------------
            // get_list_index_4_value(
            //      $list           ,
            //      $target_value
            //      )
            // - - - - - - - - - - - -
            // Searches a list of records like:-
            //      array(
            //          array(
            //              'value'             =>  <any-PHP-type>
            //              'record_indices'    =>  array(...)
            //              )
            //          ...
            //          )
            //
            // for the specified value.
            //
            // RETURNS
            //      $list_index = NULL (if target value NOT found)
            //      --OR--
            //      $list_index = INT 0+ (if target value found)
            // -------------------------------------------------------------------------

            $list_index =
                get_list_index_4_value(
                    $distinct_values_and_their_record_indices   ,
                    $new_field_value
                    ) ;

            // -----------------------------------------------------------------

            if ( is_int( $list_index ) ) {

                $distinct_values_and_their_record_indices[ $list_index ]['record_indices'][] =
                    $this_record_index
                    ;

            } else {

                $distinct_values_and_their_record_indices[] =
                    array(
                        'value'             =>  $new_field_value                ,
                        'record_indices'    =>  array( $this_record_index )
                        ) ;

            }

            // -----------------------------------------------------------------

        }

        // ----------------------------------------------------------------------

        $distinct_values_and_their_record_indices__by_field_slug__to_add[ $this_slug ] =
            $distinct_values_and_their_record_indices
            ;

        // ---------------------------------------------------------------------

    }

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
//    $distinct_values_and_their_record_indices__by_field_slug__to_add      ,
//    '$distinct_values_and_their_record_indices__by_field_slug__to_add'
//    ) ;

//foreach ( $distinct_values_and_their_record_indices__by_field_slug__to_add as $this_slug => $distinct_values_and_their_record_indices ) {
//    foreach ( $distinct_values_and_their_record_indices as $this_record ) {
//        echo '<br />' ;
//        var_dump( $this_record['value'] ) ;
//    }
//}

    // =========================================================================
    // Get the DISTINCT VALUES to REMOVE...
    // =========================================================================

    $distinct_values_and_their_record_indices__by_field_slug__to_remove = array() ;

    // --------------------------------------------------------------------------

    foreach ( $record_indices_by_field_slug_to_remove as $this_slug => $record_indices_to_remove_this_field_from ) {

        // ---------------------------------------------------------------------

        $distinct_values_and_their_record_indices = array() ;

        // ---------------------------------------------------------------------

        foreach ( $record_indices_to_remove_this_field_from as $this_record_index ) {

            // -----------------------------------------------------------------

            $this_record =
                $loaded_datasets[ $dataset_slug ]['records'][ $this_record_index ]
                ;

            // -----------------------------------------------------------------

            $target_value = $this_record[ $this_slug ] ;

            // -------------------------------------------------------------------------
            // get_list_index_4_value(
            //      $list           ,
            //      $target_value
            //      )
            // - - - - - - - - - - - -
            // Searches a list of records like:-
            //      array(
            //          array(
            //              'value'             =>  <any-PHP-type>
            //              'record_indices'    =>  array(...)
            //              )
            //          ...
            //          )
            //
            // for the specified value.
            //
            // RETURNS
            //      $list_index = NULL (if target value NOT found)
            //      --OR--
            //      $list_index = INT 0+ (if target value found)
            // -------------------------------------------------------------------------

            $list_index =
                get_list_index_4_value(
                    $distinct_values_and_their_record_indices   ,
                    $target_value
                    ) ;

            // -----------------------------------------------------------------

            if ( is_int( $list_index ) ) {

                $distinct_values_and_their_record_indices[ $list_index ]['record_indices'][] =
                    $this_record_index
                    ;

            } else {

                $distinct_values_and_their_record_indices[] =
                    array(
                        'value'             =>  $target_value                   ,
                        'record_indices'    =>  array( $this_record_index )
                        ) ;

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        $distinct_values_and_their_record_indices__by_field_slug__to_remove[ $this_slug ] =
            $distinct_values_and_their_record_indices
            ;

        // =====================================================================
        // Repeat with the next field slug to add (if there is one)...
        // =====================================================================

        }

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

//foreach ( $distinct_values_and_their_record_indices__by_field_slug__to_remove as $this_slug => $distinct_values_and_their_record_indices ) {
//    foreach ( $distinct_values_and_their_record_indices as $this_record ) {
//        echo '<br />' ;
//        var_dump( $this_record['value'] ) ;
//    }
//}

    // =========================================================================
    // Do the requested MANUAL UPDATING (for the currently selected dataset)...
    // =========================================================================

    if (    $this_dataset_update_method === 'manual'
            &&
            array_key_exists( 'updaction' , $_GET )
            &&
            trim( $_GET['updaction'] ) !== ''
            &&
            ctype_xdigit( $_GET['updaction'] )
        ) {

        // ---------------------------------------------------------------------

        require_once( dirname( __FILE__ ) . '/update-and-save-array-stored-dataset-data.php' ) ;

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

        $result = do_updaction_4_dataset(
                        $core_plugapp_dirs                                                  ,
                        $loaded_datasets                                                    ,
                        $dataset_slug                                                       ,
                        $selected_datasets_dmdd                                             ,
                        $record_indices_by_field_slug_to_add                                ,
                        $record_indices_by_field_slug_to_remove                             ,
                        $distinct_values_and_their_record_indices__by_field_slug__to_add    ,
                        $distinct_values_and_their_record_indices__by_field_slug__to_remove
                        ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------
        // Fall through to do this dataset's "auto" or "manual" updating...
        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Display the "MANUAL APPROVAL" page ?
    // =========================================================================

    if ( $this_dataset_update_method === 'manual' ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_manual_approval_page_html_4_dataset(
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
        // RETURNS
        //      On SUCCESS
        //          array(
        //              $manual_approval_page_html__4_dataset    STRING     ,
        //              $distinct_value_summary_pages__4_dataset STRING     ,
        //              $record_listing_pages__4_dataset         STRING
        //              )
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        return get_manual_approval_page_html_4_dataset(
                    $core_plugapp_dirs                                                  ,
                    $loaded_datasets                                                    ,
                    $dataset_slug                                                       ,
                    $selected_datasets_dmdd                                             ,
                    $record_indices_by_field_slug_to_add                                ,
                    $record_indices_by_field_slug_to_remove                             ,
                    $distinct_values_and_their_record_indices__by_field_slug__to_add    ,
                    $distinct_values_and_their_record_indices__by_field_slug__to_remove
                    ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // AUTO-UPDATE ?
    // =========================================================================

    if ( $this_dataset_update_method === 'auto' ) {

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

        return TRUE ;
            //  Update required and successfully completed!

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SUCCESS
    // =========================================================================

    return FALSE ;
        //  Update required but NOT done!

    // =========================================================================
    // That's that!
    // =========================================================================

}

/*
// =============================================================================
// get_list_index_4_value()
// =============================================================================

function get_list_index_4_value(
    $list           ,
    $target_value
    ) {

    // -------------------------------------------------------------------------
    // get_list_index_4_value(
    //      $list           ,
    //      $target_value
    //      )
    // - - - - - - - - - - - -
    // Searches a list of records like:-
    //      array(
    //          array(
    //              'value'             =>  <any-PHP-type>
    //              'record_indices'    =>  array(...)
    //              )
    //          ...
    //          )
    //
    // for the specified value.
    //
    // RETURNS
    //      $list_index = NULL (if target value NOT found)
    //      --OR--
    //      $list_index = INT 0+ (if target value found)
    // -------------------------------------------------------------------------

    foreach ( $list as $list_index => $list_record ) {
        if ( $list_record['value'] === $target_value ) {
            return $list_index ;
        }
    }

    // -------------------------------------------------------------------------

    return NULL ;

    // -------------------------------------------------------------------------

}
*/

// =============================================================================
// get_manual_approval_page_html_4_dataset()
// =============================================================================

function get_manual_approval_page_html_4_dataset(
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
    // get_manual_approval_page_html_4_dataset(
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
    // RETURNS
    //      On SUCCESS
    //          array(
    //              $manual_approval_page_html__4_dataset    STRING     ,
    //              $distinct_value_summary_pages__4_dataset STRING     ,
    //              $record_listing_pages__4_dataset         STRING
    //              )
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

    // -------------------------------------------------------------------------

    $total_records =
        count( $loaded_datasets[ $dataset_slug ]['records'] )
        ;

    // -------------------------------------------------------------------------

    $intro_style = <<<EOT
margin-bottom:0.33em; font-size:133%; font-style:italic
EOT;

    // -------------------------------------------------------------------------

    $tdh_style = <<<EOT
padding:3px 10px
EOT;

    // -------------------------------------------------------------------------

    $distinct_value_summary_pages__4_dataset = '' ;

    // -------------------------------------------------------------------------

    $record_listing_pages__4_dataset = '' ;

    // =========================================================================
    // ADD...
    // =========================================================================

    // -------------------------------------------------------------------------
    // get_green_colours()
    // - - - - - - - - - -
    // RETURNS
    //      list(
    //          $light_green_bg     ,
    //          $dark_green_bg      ,
    //          $green_text
    //          )
    // -------------------------------------------------------------------------

    list(
        $light_green_bg     ,
        $dark_green_bg      ,
        $green_text
        ) = get_green_colours() ;

    // -------------------------------------------------------------------------
    // Table Rows...
    // -------------------------------------------------------------------------

    $fields_to_add_html = '' ;

    // -------------------------------------------------------------------------

    $question_add = TRUE ;

    // -------------------------------------------------------------------------

    foreach ( $record_indices_by_field_slug_to_add as $this_slug => $record_indices_to_add_this_field_to ) {

        // =====================================================================
        // Get the "show_distinct_values" DIV ID...
        // =====================================================================

        $id = <<<EOT
distinct-values-to-add-summary-4-{$dataset_slug}-{$this_slug}
EOT;

        // =====================================================================
        // Get:-
        //      $number_records_to_add_this_field_to__pretty
        // =====================================================================

        $number_records_to_add_this_field_to = count( $record_indices_to_add_this_field_to ) ;

        // ---------------------------------------------------------------------

        $number_records_to_add_this_field_to__pretty =
            get_number_records__pretty(
                $number_records_to_add_this_field_to    ,
                $total_records
                ) ;

        // =====================================================================
        // Get:-
        //      $number_records_NOT_to_add_this_field_to__pretty
        // =====================================================================

        $number_records_NOT_to_add_this_field_to =
            $total_records - $number_records_to_add_this_field_to
            ;

        // ---------------------------------------------------------------------

        $number_records_NOT_to_add_this_field_to__pretty =
            get_number_records__pretty(
                $number_records_NOT_to_add_this_field_to    ,
                $total_records
                ) ;

        // =====================================================================
        // Get:-
        //      $number_distinct_values__pretty
        // =====================================================================

        if (    array_key_exists(
                    $this_slug                                                          ,
                    $distinct_values_and_their_record_indices__by_field_slug__to_add
                    )
            ) {

            // -----------------------------------------------------------------

            $number_distinct_values =
                count( $distinct_values_and_their_record_indices__by_field_slug__to_add[ $this_slug ] )
                ;

            // -----------------------------------------------------------------

            $number_distinct_values__pretty = (string) $number_distinct_values ;

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            $number_distinct_values__pretty = '1' ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        $number_distinct_values__pretty .= <<<EOT
 &nbsp; <a href="javascript:show_distinct_values('{$id}')">show&nbsp;distinct&nbsp;values</a>
EOT;

        // =====================================================================
        // Add the field slug row...
        // =====================================================================

        // -------------------------------------------------------------------------
        // get_updaction_url(
        //      $core_plugapp_dirs      ,
        //      $args
        //      )
        // - - - - - - - - - - - - - - -
        // Adds the "updaction" parameters specified in $args, to the current
        // page url.
        //
        // $args should be like (eg):-
        //
        //      $args = array(
        //                  'dataset'   =>  $dataset_slug       ,
        //                  'field'     =>  $this_slug          ,
        //                  'action'    =>  'add-this-field'
        //                  )
        //
        // RETURNS
        //      On SUCCESS
        //          $url STRING
        //
        //      On FAILURE
        //          array( $error_message STRING )
        // -------------------------------------------------------------------------

        $url = get_updaction_url(
                    $core_plugapp_dirs      ,
                    array(
                        'dataset'   =>  $dataset_slug       ,
                        'field'     =>  $this_slug          ,
                        'action'    =>  'add-this-field'
                        )
                    ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $url ) ) {
            return $url[0] ;
        }

        // ---------------------------------------------------------------------

        $action = <<<EOT
<a href="javascript:void()" onclick="question_add_this_field(this,'{$this_slug}','{$url}')">add&nbsp;this&nbsp;field</a>
EOT;

        // ---------------------------------------------------------------------

        $fields_to_add_html .= <<<EOT
<tr>
    <td style="{$tdh_style}; font-size:106%; font-weight:bold; color:{$green_text}">{$this_slug}</td>
    <td style="{$tdh_style}">{$number_records_to_add_this_field_to__pretty}</td>
    <td style="{$tdh_style}">{$number_distinct_values__pretty}</td>
    <td style="{$tdh_style}">{$number_records_NOT_to_add_this_field_to__pretty}</td>
    <td style="{$tdh_style}">{$action}</td>
</tr>
EOT;

        // =====================================================================
        // Get the distinct values (for this field slug)...
        // =====================================================================

        // -------------------------------------------------------------------------
        // get_distinct_values_for_field__summary_and_record_listing_pages(
        //      $core_plugapp_dirs                          ,
        //      $dataset_records                            ,
        //      $dataset_slug                               ,
        //      $field_slug                                 ,
        //      $distinct_values_and_their_record_indices   ,
        //      $question_add
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      array(
        //          $distinct_values_summary_pages__4_field STRING
        //          $record_listing_pages__4_field          STRING
        //          )
        // -------------------------------------------------------------------------

        list(
            $distinct_values_summary_pages__4_field     ,
            $record_listing_pages__4_field
            ) =
            get_distinct_values_for_field__summary_and_record_listing_pages(
                $core_plugapp_dirs                                                              ,
                $loaded_datasets[ $dataset_slug ]['records']                                    ,
                $dataset_slug                                                                   ,
                $this_slug                                                                      ,
                $distinct_values_and_their_record_indices__by_field_slug__to_add[ $this_slug ]  ,
                $question_add
                ) ;

        // ---------------------------------------------------------------------

        $distinct_value_summary_pages__4_dataset .= <<<EOT
<div id="{$id}" style="display:none">{$distinct_values_summary_pages__4_field}</div>
EOT;

        // ---------------------------------------------------------------------

        $record_listing_pages__4_dataset .=
            $record_listing_pages__4_field
            ;

        // =====================================================================
        // Repeat with the next field slug (if there is one)...
        // =====================================================================

    }

    // -------------------------------------------------------------------------
    // Table Proper
    // -------------------------------------------------------------------------

    $add_table_style = <<<EOT
background-color:{$light_green_bg}
EOT;

    // -------------------------------------------------------------------------

    $number_fields_to_add = count( $record_indices_by_field_slug_to_add ) ;

    // -------------------------------------------------------------------------

    if ( $number_fields_to_add === 1 ) {
        $fs = '' ;

    } else {
        $fs = 's' ;

    }

    // -------------------------------------------------------------------------

    if ( $total_records === 1 ) {
        $rs = '' ;

    } else {
        $rs = 's' ;

    }

    // -------------------------------------------------------------------------
    // get_updaction_url(
    //      $core_plugapp_dirs      ,
    //      $args
    //      )
    // - - - - - - - - - - - - - - -
    // Adds the "updaction" parameters specified in $args, to the current
    // page url.
    //
    // $args should be like (eg):-
    //
    //      $args = array(
    //                  'dataset'   =>  $dataset_slug       ,
    //                  'field'     =>  $this_slug          ,
    //                  'action'    =>  'add-this-field'
    //                  )
    //
    // RETURNS
    //      On SUCCESS
    //          $url STRING
    //
    //      On FAILURE
    //          array( $error_message STRING )
    // -------------------------------------------------------------------------

    $url = get_updaction_url(
                $core_plugapp_dirs      ,
                array(
                    'dataset'   =>  $dataset_slug               ,
                    'field'     =>  NULL                        ,
                    'action'    =>  'add-all-dataset-fields'
                    )
                ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $url ) ) {
        return $url[0] ;
    }

    // -------------------------------------------------------------------------

    if ( $fields_to_add_html !== '' ) {

        // ---------------------------------------------------------------------

        $fields_to_add_html = <<<EOT
<p style="{$intro_style}"><b>{$number_fields_to_add}</b> field{$fs} to
<b>ADD</b> - to <b>{$total_records}</b> record{$rs} - as follows:-</p>

<div><table
    border="1"
    cellpadding="0"
    cellspacing="0"
    style="{$add_table_style}"
    align="center"
    >
    <tr>
        <th style="{$tdh_style}; background-color:{$dark_green_bg}; color:{$green_text}">Field Name</th>
        <th style="{$tdh_style}; background-color:{$dark_green_bg}; color:{$green_text}">#Records To Add This Field To</th>
        <th style="{$tdh_style}; background-color:{$dark_green_bg}; color:{$green_text}">#Distinct Values To Add</th>
        <th style="{$tdh_style}; background-color:{$dark_green_bg}; color:{$green_text}">#Records NOT To Add This Field To</th>
        <th style="{$tdh_style}; background-color:{$dark_green_bg}; color:{$green_text}">Action</th>
    </tr>
{$fields_to_add_html}
</table></div>

<p style="margin-top:0.5em"><a
    href="javascript:void()"
    onclick="question_add_all_dataset_fields(this,'{$dataset_slug}','{$url}')"
    >ADD ALL The Above Fields</a></p>
EOT;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // REMOVE
    // =========================================================================

    // -------------------------------------------------------------------------
    // get_red_colours()
    // - - - - - - - - -
    // RETURNS
    //      list(
    //          $light_red_bg       ,
    //          $dark_red_bg        ,
    //          $red_text
    //          )
    // -------------------------------------------------------------------------

    list(
        $light_red_bg       ,
        $dark_red_bg        ,
        $red_text
        ) = get_red_colours() ;

    // -------------------------------------------------------------------------

    $question_add = FALSE ;

    // -------------------------------------------------------------------------
    // Rows...
    // -------------------------------------------------------------------------

    $fields_to_remove_html = '' ;

    // -------------------------------------------------------------------------

    foreach ( $record_indices_by_field_slug_to_remove as $this_slug => $record_indices_to_remove_this_field_from ) {

        // =====================================================================
        // Get the "show_distinct_values" DIV ID...
        // =====================================================================

        $id = <<<EOT
distinct-values-to-remove-summary-4-{$dataset_slug}-{$this_slug}
EOT;

        // =====================================================================
        // Get:-
        //      $number_records_to_remove_this_field_from__pretty
        // =====================================================================

        $number_records_to_remove_this_field_from =
            count( $record_indices_to_remove_this_field_from )
            ;

        // ---------------------------------------------------------------------

        $number_records_to_remove_this_field_from__pretty =
            get_number_records__pretty(
                $number_records_to_remove_this_field_from   ,
                $total_records
                ) ;

        // =====================================================================
        // Get:-
        //      $number_records_NOT_to_remove_this_field_from__pretty
        // =====================================================================

        $number_records_NOT_to_remove_this_field_from =
            $total_records - $number_records_to_remove_this_field_from
            ;

        // ---------------------------------------------------------------------

        $number_records_NOT_to_remove_this_field_from__pretty =
            get_number_records__pretty(
                $number_records_NOT_to_remove_this_field_from   ,
                $total_records
                ) ;

        // =====================================================================
        // Get:-
        //      $number_distinct_values__pretty
        // =====================================================================

        if (    array_key_exists(
                    $this_slug                                                              ,
                    $distinct_values_and_their_record_indices__by_field_slug__to_remove
                    )
            ) {

            // -----------------------------------------------------------------

            $number_distinct_values =
                count( $distinct_values_and_their_record_indices__by_field_slug__to_remove[ $this_slug ] )
                ;

            // -----------------------------------------------------------------

            $number_distinct_values__pretty = (string) $number_distinct_values ;

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            $number_distinct_values__pretty = '1' ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        $number_distinct_values__pretty .= <<<EOT
 &nbsp; <a href="javascript:show_distinct_values('{$id}')">show&nbsp;distinct&nbsp;values</a>
EOT;

        // =====================================================================
        // Action
        // =====================================================================

        if ( count( $record_indices_by_field_slug_to_add ) < 1 ) {

            // -------------------------------------------------------------------------
            // get_updaction_url(
            //      $core_plugapp_dirs      ,
            //      $args
            //      )
            // - - - - - - - - - - - - - - -
            // Adds the "updaction" parameters specified in $args, to the current
            // page url.
            //
            // $args should be like (eg):-
            //
            //      $args = array(
            //                  'dataset'   =>  $dataset_slug       ,
            //                  'field'     =>  $this_slug          ,
            //                  'action'    =>  'add-this-field'
            //                  )
            //
            // RETURNS
            //      On SUCCESS
            //          $url STRING
            //
            //      On FAILURE
            //          array( $error_message STRING )
            // -------------------------------------------------------------------------

            $url = get_updaction_url(
                        $core_plugapp_dirs      ,
                        array(
                            'dataset'   =>  $dataset_slug           ,
                            'field'     =>  $this_slug              ,
                            'action'    =>  'remove-this-field'
                            )
                        ) ;

            // -----------------------------------------------------------------

            if ( is_array( $url ) ) {
                return $url[0] ;
            }

            // -----------------------------------------------------------------

            $action = <<<EOT
<a  href="javascript:void()"
    onclick="question_remove_this_field(this,'{$this_slug}','{$url}')"
    >remove&nbsp;this&nbsp;field</a>
EOT;
                //  Can only remove fields if there are NO fields to ADD.
                //
                //  This is because the "get New field value" routines may want
                //  to look at the value of fields being removed - as when
                //  renaming a field, for example).

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            $action = '&nbsp;' ;

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // Field Slug Row...
        // =====================================================================

        $fields_to_remove_html .= <<<EOT
<tr>
    <td style="{$tdh_style}; font-size:106%; font-weight:bold; color:{$red_text}">{$this_slug}</td>
    <td style="{$tdh_style}">{$number_records_to_remove_this_field_from__pretty}</td>
    <td style="{$tdh_style}">{$number_distinct_values__pretty}</td>
    <td style="{$tdh_style}">{$number_records_NOT_to_remove_this_field_from__pretty}</td>
    <td style="{$tdh_style}">{$action}</td>
</tr>
EOT;

        // =====================================================================
        // Get the distinct values (for this field slug)...
        // =====================================================================

        // -------------------------------------------------------------------------
        // get_distinct_values_for_field__summary_and_record_listing_pages(
        //      $core_plugapp_dirs                          ,
        //      $dataset_records                            ,
        //      $dataset_slug                               ,
        //      $field_slug                                 ,
        //      $distinct_values_and_their_record_indices   ,
        //      $question_add
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      array(
        //          $distinct_values_summary_pages__4_field STRING
        //          $record_listing_pages__4_field          STRING
        //          )
        // -------------------------------------------------------------------------

        list(
            $distinct_values_summary_pages__4_field     ,
            $record_listing_pages__4_field
            ) =
            get_distinct_values_for_field__summary_and_record_listing_pages(
                $core_plugapp_dirs                                                                  ,
                $loaded_datasets[ $dataset_slug ]['records']                                        ,
                $dataset_slug                                                                       ,
                $this_slug                                                                          ,
                $distinct_values_and_their_record_indices__by_field_slug__to_remove[ $this_slug ]   ,
                $question_add
                ) ;

        // ---------------------------------------------------------------------

        $distinct_value_summary_pages__4_dataset .= <<<EOT
<div id="{$id}" style="display:none">{$distinct_values_summary_pages__4_field}</div>
EOT;

        // ---------------------------------------------------------------------

        $record_listing_pages__4_dataset .=
            $record_listing_pages__4_field
            ;

        // =====================================================================
        // Repeat with the next field slug (if there is one)...
        // =====================================================================

    }

    // -------------------------------------------------------------------------
    // Table Proper
    // -------------------------------------------------------------------------

    $remove_table_style = <<<EOT
background-color:{$light_red_bg}
EOT;

    // -------------------------------------------------------------------------

    $number_fields_to_remove = count( $record_indices_by_field_slug_to_remove ) ;

    // -------------------------------------------------------------------------

    if ( $number_fields_to_remove === 1 ) {
        $fs = '' ;

    } else {
        $fs = 's' ;

    }

    // -------------------------------------------------------------------------

    if ( $total_records === 1 ) {
        $rs = '' ;

    } else {
        $rs = 's' ;

    }

    // -------------------------------------------------------------------------

    if ( count( $record_indices_by_field_slug_to_add ) < 1 ) {

        // -------------------------------------------------------------------------
        // get_updaction_url(
        //      $core_plugapp_dirs      ,
        //      $args
        //      )
        // - - - - - - - - - - - - - - -
        // Adds the "updaction" parameters specified in $args, to the current
        // page url.
        //
        // $args should be like (eg):-
        //
        //      $args = array(
        //                  'dataset'   =>  $dataset_slug       ,
        //                  'field'     =>  $this_slug          ,
        //                  'action'    =>  'add-this-field'
        //                  )
        //
        // RETURNS
        //      On SUCCESS
        //          $url STRING
        //
        //      On FAILURE
        //          array( $error_message STRING )
        // -------------------------------------------------------------------------

        $url = get_updaction_url(
                    $core_plugapp_dirs      ,
                    array(
                        'dataset'   =>  $dataset_slug                   ,
                        'field'     =>  NULL                            ,
                        'action'    =>  'remove-all-dataset-fields'
                        )
                    ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $url ) ) {
            return $url[0] ;
        }

        // ---------------------------------------------------------------------

        $remove_all = <<<EOT
<p  style="margin-top:0.5em"><a
    href="javascript:void()"
    onclick="question_remove_all_dataset_fields(this,'{$dataset_slug}','{$url}')"
    >REMOVE ALL The Above Fields</a></p>
EOT;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $remove_all = '' ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( $fields_to_remove_html !== '' ) {

        // ---------------------------------------------------------------------

        $fields_to_remove_html = <<<EOT
<p style="{$intro_style}"><b>{$number_fields_to_remove}</b> field{$fs} to
<b>REMOVE</b> - from <b>{$total_records}</b> record{$rs} - as follows:-</p>

<div><table
    border="1"
    cellpadding="0"
    cellspacing="0"
    style="{$remove_table_style}"
    align="center"
    >
    <tr>
        <th style="{$tdh_style}; background-color:{$dark_red_bg}; color:{$red_text}">Field Name</th>
        <th style="{$tdh_style}; background-color:{$dark_red_bg}; color:{$red_text}">#Records To Remove This Field From</th>
        <th style="{$tdh_style}; background-color:{$dark_red_bg}; color:{$red_text}">#Distinct Values To Remove</th>
        <th style="{$tdh_style}; background-color:{$dark_red_bg}; color:{$red_text}">#Records NOT To Remove This Field From</th>
        <th style="{$tdh_style}; background-color:{$dark_red_bg}; color:{$red_text}">Action</th>
    </tr>
{$fields_to_remove_html}
</table></div>

{$remove_all}
EOT;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // EVERYTHING
    // =========================================================================

    $container_div_style = <<<EOT
position:relative; text-align:center; padding:0.5em 2em 2em 2em; margin:4em 2em 0 2em; background-color:#FFFFFF; border:3px dashed #999999
EOT;

    // -------------------------------------------------------------------------

    $h2_style = <<<EOT
display:inline-block; padding:0.33em 3em; background-color:#000000; color:#FFFFFF; font-weight:bold; margin-bottom:0
EOT;

    // -------------------------------------------------------------------------
    // get_updaction_url(
    //      $core_plugapp_dirs      ,
    //      $args
    //      )
    // - - - - - - - - - - - - - - -
    // Adds the "updaction" parameters specified in $args, to the current
    // page url.
    //
    // $args should be like (eg):-
    //
    //      $args = array(
    //                  'dataset'   =>  $dataset_slug       ,
    //                  'field'     =>  $this_slug          ,
    //                  'action'    =>  'add-this-field'
    //                  )
    //
    // RETURNS
    //      On SUCCESS
    //          $url STRING
    //
    //      On FAILURE
    //          array( $error_message STRING )
    // -------------------------------------------------------------------------

    $url = get_updaction_url(
                $core_plugapp_dirs      ,
                array(
                    'dataset'   =>  $dataset_slug               ,
                    'field'     =>  NULL                        ,
                    'action'    =>  'add-all-then-remove-all'
                    )
                ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $url ) ) {
        return $url[0] ;
    }

    // -------------------------------------------------------------------------

    $light_pink = '#FF1493' ;
    $dark_pink  = '#AD0E64' ;

    // -------------------------------------------------------------------------

    $manual_approval_page_html_4_dataset = <<<EOT
<div    id="container-div-4-{$dataset_slug}"
        style="{$container_div_style}"
        >

    <div style="position:absolute; top:-12px; left:-12px; font-size:167%; display:inline; background-color:{$light_pink}; color:#FFFFFF; padding:5px 10px; line-height:120%; border-top:12px solid {$dark_pink}; border-left:12px solid {$dark_pink}">
        <b>Array</b><br />Stored
    </div>

    <h2 style="{$h2_style}"><span style="font-weight:normal; font-style:italic"
        >Dataset:</span>&nbsp;&nbsp;&nbsp;&nbsp; {$dataset_slug}</h2>

    {$fields_to_add_html}

    {$fields_to_remove_html}

    <p style="background-color:#000000; margin-top:2em; margin-bottom:0; padding:3px 2em">
        <a  style="color:#FFFFFF; text-decoration:none; font-size:106%"
            href="javascript:void()"
            onclick="question_add_all_then_remove_all(this,'{$dataset_slug}','{$url}')"
            ><b>UPDATE ENTIRE DATASET</b><br />(ADD ALL Fields To Be Added -
                Then REMOVE ALL Fields To Be Removed)</a>
    </p>

</div>
EOT;

    // =========================================================================
    // SUCCESS
    // =========================================================================

    return array(
        $manual_approval_page_html_4_dataset            ,
        $distinct_value_summary_pages__4_dataset        ,
        $record_listing_pages__4_dataset
        ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

/*
// =============================================================================
// get_green_colours()
// =============================================================================

function get_green_colours() {

    // -------------------------------------------------------------------------
    // get_green_colours()
    // - - - - - - - - - -
    // RETURNS
    //      list(
    //          $light_green_bg     ,
    //          $dark_green_bg      ,
    //          $green_text
    //          )
    // -------------------------------------------------------------------------

    return array(
                '#F0FFF8'   ,
                '#CEFFE8'   ,
                '#007000'
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_red_colours()
// =============================================================================

function get_red_colours() {

    // -------------------------------------------------------------------------
    // get_red_colours()
    // - - - - - - - - -
    // RETURNS
    //      list(
    //          $light_red_bg       ,
    //          $dark_red_bg        ,
    //          $red_text
    //          )
    // -------------------------------------------------------------------------

    return array(
                '#FFEEEE'   ,
                '#FFDDDD'   ,
                '#AA0000'
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_s()
// =============================================================================

function get_s(
    $value
    ) {
    if ( $value == 1 ) {
        return '' ;
    }
    return 's' ;
}

// =============================================================================
// get_number_records__pretty()
// =============================================================================

function get_number_records__pretty(
    $number_records     ,
    $total_records
    ) {

    // -------------------------------------------------------------------------

    $s = get_s( $number_records ) ;

    // -------------------------------------------------------------------------

    if ( $number_records === $total_records ) {

        // ---------------------------------------------------------------------

        return <<<EOT
<b>All</b> &nbsp; ({$number_records} record{$s})
EOT;

        // ---------------------------------------------------------------------

    } elseif ( $number_records === 0 ) {

        // ---------------------------------------------------------------------

        return <<<EOT
<b>None</b>
EOT;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $percent =
            round(
                ( $number_records * 100 ) / $total_records
                ) ;

        // ---------------------------------------------------------------------

        return <<<EOT
<b>{$percent}%</b> &nbsp; ({$number_records} record{$s})
EOT;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

}
*/

// =============================================================================
// get_distinct_values_for_field__summary_and_record_listing_pages()
// =============================================================================

function get_distinct_values_for_field__summary_and_record_listing_pages(
    $core_plugapp_dirs                          ,
    $dataset_records                            ,
    $dataset_slug                               ,
    $field_slug                                 ,
    $distinct_values_and_their_record_indices   ,
    $question_add
    ) {

    // -------------------------------------------------------------------------
    // get_distinct_values_for_field__summary_and_record_listing_pages(
    //      $core_plugapp_dirs                          ,
    //      $dataset_records                            ,
    //      $dataset_slug                               ,
    //      $field_slug                                 ,
    //      $distinct_values_and_their_record_indices   ,
    //      $question_add
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS       //      array(
    //          $distinct_values_summary_pages__4_field STRING
    //          $record_listing_pages__4_field          STRING
    //          )
    // -------------------------------------------------------------------------

    // =========================================================================
    // List the records by distinct value...
    // =========================================================================

//  ob_start() ;

//    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//        $distinct_values_and_their_record_indices       ,
//        '$distinct_values_and_their_record_indices'
//        ) ;

//  $distinct_values_for_field__summary_page = ob_get_clean() ;

    // -------------------------------------------------------------------------

    $tdh_style = <<<EOT
padding:3px 10px; text-align:center
EOT;

    // -------------------------------------------------------------------------

    $distinct_values_for_field__summary_page = '' ;

    // -------------------------------------------------------------------------

    $records_for_distinct_value__listing_pages__4_all_distinct_values = '' ;

    // -------------------------------------------------------------------------

    $total_distinct_values = count( $distinct_values_and_their_record_indices ) ;

    $this_distinct_value_number = 1 ;

    // -------------------------------------------------------------------------

    foreach ( $distinct_values_and_their_record_indices as $this_record ) {

        // ---------------------------------------------------------------------

        $this_distinct_value = $this_record['value'] ;

        $these_record_indices = $this_record['record_indices'] ;

        // ---------------------------------------------------------------------

        $this_type = gettype( $this_distinct_value ) ;

        // ---------------------------------------------------------------------

        $number_records = count( $these_record_indices ) ;

        // ---------------------------------------------------------------------

        $s = get_s( $number_records ) ;

        // ---------------------------------------------------------------------

        $id = <<<EOT
the-records-4-{$dataset_slug}-{$field_slug}-distinct-value-{$this_distinct_value_number}
EOT;

        // -------------------------------------------------------------------------
        // get_records_for_distinct_value__listing_page(
        //      $core_plugapp_dirs          ,
        //      $dataset_records            ,
        //      $dataset_slug               ,
        //      $field_slug                 ,
        //      $distinct_value             ,
        //      $these_record_indices       ,
        //      $question_add
        //      )
        // - - - - - - - - - - - - - - - - -
        // RETURNS
        //      $records_for_distinct_value__listing_page STRING
        // -------------------------------------------------------------------------

        $records_for_distinct_value__listing_page =
            get_records_for_distinct_value__listing_page(
                $core_plugapp_dirs          ,
                $dataset_records            ,
                $dataset_slug               ,
                $field_slug                 ,
                $this_distinct_value        ,
                $these_record_indices       ,
                $question_add
                ) ;

        // ---------------------------------------------------------------------

        $records_for_distinct_value__listing_pages__4_all_distinct_values .= <<<EOT
<div
    id="{$id}"
    style="padding:5px 0; display:none"
    >{$records_for_distinct_value__listing_page}</div>
EOT;

        // ---------------------------------------------------------------------

        $records_column_value = <<<EOT
{$number_records} record{$s} &nbsp; <a href="javascript:toggle_distinct_value_records('{$id}')">show/hide</a>
EOT;

        // -------------------------------------------------------------------------
        // raw_2_displayable(
        //      $name   ,
        //      $value
        //      )
        // - - - - - - - - -
        // RETURNS
        //      array(
        //          $displayable_value        STRING    ,
        //          $extra_info_slash_comment STRING
        //          )
        // -------------------------------------------------------------------------

        list(
            $displayable_value          ,
            $extra_info_slash_comment
            ) = raw_2_displayable(
                    ''                      ,
                    $this_distinct_value
                    ) ;

        // ---------------------------------------------------------------------

        if ( $extra_info_slash_comment !== '' ) {

            $displayable_value .= <<<EOT
<br />({$extra_info_slash_comment})
EOT;

        }

        // ---------------------------------------------------------------------

        $distinct_values_for_field__summary_page .= <<<EOT
<tr>
    <td style="{$tdh_style}">#{$this_distinct_value_number} of {$total_distinct_values}</td>
    <td style="{$tdh_style}"><b style="color:#0066CC">{$displayable_value}</b></td>
    <td style="{$tdh_style}">{$this_type}</td>
    <td style="{$tdh_style}">{$records_column_value}</td>
</tr>
EOT;

        // ---------------------------------------------------------------------

        $this_distinct_value_number++ ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( $question_add ) {
        $add_remove_1 = 'Add' ;
        $add_remove_2 = 'Add To' ;

    } else {
        $add_remove_1 = 'Remove' ;
        $add_remove_2 = 'Remove From' ;

    }

    // -------------------------------------------------------------------------

    $distinct_values_for_field__summary_page = <<<EOT
<table
    border="1"
    cellpadding="0"
    cellspacing="0"
    align="center"
    >
    <tr>
        <th style="{$tdh_style}">&nbsp;</th>
        <th style="{$tdh_style}">Distinct Value To {$add_remove_1}</th>
        <th style="{$tdh_style}">PHP Type</th>
        <th style="{$tdh_style}">Records To {$add_remove_2}</th>
    </tr>
{$distinct_values_for_field__summary_page}
</table>
EOT;

    // =========================================================================
    // Tie everything together...
    // =========================================================================

    $h1_style = <<<EOT
margin-top:1em; text-align:center; line-height:133%
EOT;

    // -------------------------------------------------------------------------

    $h2_style = <<<EOT
text-align:center; line-height:133%; font-size:133%
EOT;

    // -------------------------------------------------------------------------

    if ( $question_add ) {
        $add_remove = 'Add' ;

    } else {
        $add_remove = 'Remove' ;

    }

    // -------------------------------------------------------------------------

    $distinct_values_for_field__summary_page = <<<EOT
<h1 style="{$h1_style}">
    Distinct Values To {$add_remove}
    <a  style="margin-left:2em; font-size:70%; font-weight:normal"
        href="javascript:back_to_main_page()"
        >back</a>
</h1>

<h2 style="{$h2_style}">For Dataset:&nbsp; <b>{$dataset_slug}</b><br />And
Field:&nbsp; <b style="color:#0066CC">{$field_slug}</b></h2>

{$distinct_values_for_field__summary_page}
EOT;

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return array(
                $distinct_values_for_field__summary_page                            ,
                $records_for_distinct_value__listing_pages__4_all_distinct_values
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

/*
// =============================================================================
// raw_2_displayable()
// =============================================================================

function raw_2_displayable(
    $name   ,
    $value
    ) {

    // -------------------------------------------------------------------------
    // raw_2_displayable(
    //      $name   ,
    //      $value
    //      )
    // - - - - - - - - -
    // RETURNS
    //      array(
    //          $displayable_value        STRING    ,
    //          $extra_info_slash_comment STRING
    //          )
    // -------------------------------------------------------------------------

    $extra_info_slash_comment = '' ;

    // -------------------------------------------------------------------------

    if ( is_bool( $value ) ) {

        // ---------------------------------------------------------------------

        if ( $value ) {
            $displayable_value = 'TRUE' ;
        } else {
            $displayable_value = 'FALSE' ;
        }

        // ---------------------------------------------------------------------

    } elseif ( is_string( $value ) ) {

        // ---------------------------------------------------------------------

        $strlen = strlen( $value ) ;

        // ---------------------------------------------------------------------

        if ( $strlen === 0 ) {

            $displayable_value = '""' ;

            $extra_info_slash_comment = 'empty string' ;

        } elseif ( $strlen > 255 ) {

            $displayable_value = '"' . htmlentities( substr( $value , 0 , 255 ) ) . '..."';

            $extra_info_slash_comment = $strlen . ' chars total; first 255 shown' ;

        } else {

            $displayable_value = '"' . htmlentities( $value ) . '"' ;

            $extra_info_slash_comment = $strlen . ' chars' ;

        }

        // ---------------------------------------------------------------------

    } elseif ( is_int( $value ) ) {

        // ---------------------------------------------------------------------

        $displayable_value = $value ;

        // ---------------------------------------------------------------------

        if (    contains_ignoring_case( $name , 'date' )
                ||
                contains_ignoring_case( $name , 'time' )
            ) {

            $extra_info_slash_comment =
                gmdate( 'j M Y G:i:s' , $value )
                ;
                //  Returns a formatted date string. If a non-numeric value is
                //  used for timestamp, FALSE is returned and an E_WARNING level
                //  error is emitted.

            $extra_info_slash_comment .= ' GMT' ;

        }

        // ---------------------------------------------------------------------

    } elseif ( $value === NULL ) {

        // ---------------------------------------------------------------------

        $displayable_value = 'NULL' ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $displayable_value = (string) $value ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    return array(
        $displayable_value          ,
        $extra_info_slash_comment
        ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// contains_ignoring_case()
// =============================================================================

function contains_ignoring_case(
    $haystack   ,
    $needle
    ) {

    return stripos( $haystack , $needle ) !== FALSE ;
                //  Returns the position as an integer. If needle is
                //  not found, strpos() will return boolean FALSE.

}
*/

// =============================================================================
// get_records_for_distinct_value__listing_page()
// =============================================================================

function get_records_for_distinct_value__listing_page(
    $core_plugapp_dirs          ,
    $dataset_records            ,
    $dataset_slug               ,
    $field_slug                 ,
    $distinct_value             ,
    $these_record_indices       ,
    $question_add
    ) {

    // -------------------------------------------------------------------------
    // get_records_for_distinct_value__listing_page(
    //      $core_plugapp_dirs          ,
    //      $dataset_records            ,
    //      $dataset_slug               ,
    //      $field_slug                 ,
    //      $distinct_value             ,
    //      $these_record_indices       ,
    //      $question_add
    //      )
    // - - - - - - - - - - - - - - - - -
    // RETURNS
    //      $records_for_distinct_value__listing_page STRING
    // -------------------------------------------------------------------------

    $tdh_style = <<<EOT
padding:3px 10px; text-align:center
EOT;

    // -------------------------------------------------------------------------

    $tdh_style_left = <<<EOT
padding:3px 10px; text-align:left
EOT;

    // -------------------------------------------------------------------------

    $tdh_style_right = <<<EOT
padding:3px 10px; text-align:right
EOT;

    // -------------------------------------------------------------------------

    if ( $question_add ) {

        // -------------------------------------------------------------------------
        // get_green_colours()
        // - - - - - - - - - -
        // RETURNS
        //      list(
        //          $light_green_bg     ,
        //          $dark_green_bg      ,
        //          $green_text
        //          )
        // -------------------------------------------------------------------------

        list(
            $light_bg       ,
            $dark_bg        ,
            $text_colour
            ) = get_green_colours() ;

        // ---------------------------------------------------------------------

        $add_remove = 'ADD field to' ;

        // ---------------------------------------------------------------------

    } else {

        // -------------------------------------------------------------------------
        // get_red_colours()
        // - - - - - - - - - -
        // RETURNS
        //      list(
        //          $light_red_bg       ,
        //          $dark_red_bg        ,
        //          $red_text
        //          )
        // -------------------------------------------------------------------------

        list(
            $light_bg       ,
            $dark_bg        ,
            $text_colour
            ) = get_red_colours() ;

        // ---------------------------------------------------------------------

        $add_remove = 'REMOVE field from' ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $item_count = count( $these_record_indices ) ;

    // -------------------------------------------------------------------------

    $total_count = count( $dataset_records ) ;

    // -------------------------------------------------------------------------

    $all_records_html = '' ;

    // -------------------------------------------------------------------------

    foreach ( $these_record_indices as $this_item_index => $this_record_index ) {

        // ---------------------------------------------------------------------

        $this_record = $dataset_records[ $this_record_index ] ;

        // ---------------------------------------------------------------------

        $this_records_html = '' ;

        // ---------------------------------------------------------------------

        foreach ( $this_record as $name => $value ) {

            // -------------------------------------------------------------------------
            // raw_2_displayable(
            //      $name   ,
            //      $value
            //      )
            // - - - - - - - - -
            // RETURNS
            //      array(
            //          $displayable_value        STRING    ,
            //          $extra_info_slash_comment STRING
            //          )
            // -------------------------------------------------------------------------

            list(
                $displayable_value          ,
                $extra_info_slash_comment
                ) = raw_2_displayable(
                        $name   ,
                        $value
                        ) ;

            // -----------------------------------------------------------------

            if ( $extra_info_slash_comment === '' ) {
                $extra_info_slash_comment = '&nbsp;' ;
            }

            // -----------------------------------------------------------------

            $type = gettype( $value ) ;

            // -----------------------------------------------------------------

            if (    $question_add === FALSE
                    &&
                    $name === $field_slug
                ) {

                $highlight_style = <<<EOT
; background-color:{$dark_bg}; color:{$text_colour}; font-weight:bold
EOT;

            } else {

                $highlight_style = '' ;

            }

            // -----------------------------------------------------------------

            $this_records_html .= <<<EOT
<tr>
    <td style="{$tdh_style_right}{$highlight_style}">{$name}</td>
    <td style="{$tdh_style_left}{$highlight_style}">{$displayable_value}</td>
    <td style="{$tdh_style_left}{$highlight_style}">{$extra_info_slash_comment}</td>
    <td style="{$tdh_style}{$highlight_style}">{$type}</td>
</tr>
EOT;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        if ( $question_add ) {

            // -------------------------------------------------------------------------
            // raw_2_displayable(
            //      $name   ,
            //      $value
            //      )
            // - - - - - - - - -
            // RETURNS
            //      array(
            //          $displayable_value        STRING    ,
            //          $extra_info_slash_comment STRING
            //          )
            // -------------------------------------------------------------------------

            list(
                $displayable_value          ,
                $extra_info_slash_comment
                ) = raw_2_displayable(
                        $field_slug         ,
                        $distinct_value
                        ) ;

            // -----------------------------------------------------------------

            if ( $extra_info_slash_comment === '' ) {
                $extra_info_slash_comment = '&nbsp;' ;
            }

            // -----------------------------------------------------------------

            $type = gettype( $distinct_value ) ;

            // -----------------------------------------------------------------

            $highlight_style = <<<EOT
; background-color:{$dark_bg}; color:{$text_colour}; font-weight:bold
EOT;

            // -----------------------------------------------------------------

            $this_records_html .= <<<EOT
<tr>
    <td style="{$tdh_style_right}{$highlight_style}">{$field_slug}</td>
    <td style="{$tdh_style_left}{$highlight_style}">{$displayable_value}</td>
    <td style="{$tdh_style_left}{$highlight_style}">{$extra_info_slash_comment}</td>
    <td style="{$tdh_style}{$highlight_style}">{$type}</td>
</tr>
EOT;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        $item_number = $this_item_index + 1 ;

        // ---------------------------------------------------------------------

        if ( $this_item_index > 0 ) {

            $margin_top = <<<EOT
 style="margin-top:2em"
EOT;

        } else {

            $margin_top = '' ;

        }

        // ---------------------------------------------------------------------

        $this_records_html = <<<EOT
<div{$margin_top}>
    <div style="text-align:left; font-weight:bold">Record# {$item_number} of
    {$item_count} to {$add_remove} &mdash; Out of {$total_count} dataset records
    total &mdash; Record index {$this_record_index}</div>
    <table
        border="1"
        cellpadding="0"
        cellspacing="0"
        align="center"
        style="background-color:{$light_bg}"
        >
        <tr>
            <th style="{$tdh_style}; background-color:{$dark_bg}; color:{$text_colour}">Field Name</th>
            <th style="{$tdh_style}; background-color:{$dark_bg}; color:{$text_colour}">Field Value</th>
            <th style="{$tdh_style}; background-color:{$dark_bg}; color:{$text_colour}">Extra Info. / Comments</th>
            <th style="{$tdh_style}; background-color:{$dark_bg}; color:{$text_colour}">PHP Type (of Field Value)</th>
        </tr>
    {$this_records_html}
    </table>
</div>
EOT;

        // ---------------------------------------------------------------------

        $all_records_html .= $this_records_html ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Tie everything together...
    // =========================================================================

    $h1_style = <<<EOT
margin-top:1em; text-align:center; line-height:133%
EOT;

    // -------------------------------------------------------------------------

    $h2_style = <<<EOT
text-align:center; line-height:133%; font-size:133%
EOT;

    // -------------------------------------------------------------------------

    if ( $question_add ) {
        $add_remove = 'Add' ;

    } else {
        $add_remove = 'Remove' ;

    }

    // -------------------------------------------------------------------------

    list(
        $displayable_value          ,
        $extra_info_slash_comment
        ) = raw_2_displayable(
                $field_slug         ,
                $distinct_value
                ) ;

    // -------------------------------------------------------------------------

    if ( $extra_info_slash_comment !== '' ) {

        $displayable_value = <<<EOT
{$displayable_value} ({$extra_info_slash_comment})
EOT;

    }

    // -------------------------------------------------------------------------

    $records_for_distinct_value__listing_page = <<<EOT
<h1 style="{$h1_style}">
    Records For Distinct Value To {$add_remove}
    <a  style="margin-left:2em; font-size:70%; font-weight:normal"
        href="javascript:back_to_distinct_value_summary_page()"
        >back</a><br />
    <b style="color:#0066CC; position:relative; top:8px">{$displayable_value}</b>
</h1>

<h2 style="{$h2_style}">
    For Dataset:&nbsp; <b>{$dataset_slug}</b><br />
    And Field:&nbsp; <b style="color:#0066CC">{$field_slug}</b>
</h2>

{$all_records_html}
EOT;

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $records_for_distinct_value__listing_page ;

    // -------------------------------------------------------------------------

}

/*
// =============================================================================
// get_updaction_url()
// =============================================================================

function get_updaction_url(
    $core_plugapp_dirs      ,
    $args
    ) {

    // -------------------------------------------------------------------------
    // get_updaction_url(
    //      $core_plugapp_dirs      ,
    //      $args
    //      )
    // - - - - - - - - - - - - - - -
    // Adds the "updaction" parameters specified in $args, to the current
    // page url.
    //
    // $args should be like (eg):-
    //
    //      $args = array(
    //                  'dataset'   =>  $dataset_slug       ,
    //                  'field'     =>  $this_slug          ,
    //                  'action'    =>  'add-this-field'
    //                  )
    //
    // RETURNS
    //      On SUCCESS
    //          $url STRING
    //
    //      On FAILURE
    //          array( $error_message STRING )
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $args , '$args' ) ;

    // -------------------------------------------------------------------------

    $args = serialize( $args ) ;
                //  Returns a string containing a byte-stream representation of
                //  value that can be stored anywhere.
                //
                //  Note that this is a binary string which may include null
                //  bytes, and needs to be stored and handled as such. For
                //  example, serialize() output should generally be stored in a
                //  BLOB field in a database, rather than a CHAR or TEXT field.

    // -------------------------------------------------------------------------

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/string-utils.php' ) ;

    // -------------------------------------------------------------------------

    $args = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\hex_encode( $args ) ;

    // -------------------------------------------------------------------------

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
        'updaction' =>  $args
        ) ;

    // -------------------------------------------------------------------------

    $question_amp          = FALSE ;

    $question_die_on_error = FALSE ;

    // -------------------------------------------------------------------------

    return
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\get_query_adjusted_current_page_url(
            $query_changes              ,
            $question_amp               ,
            $question_die_on_error
            ) ;

    // -------------------------------------------------------------------------

}
*/

// =============================================================================
// That's that!
// =============================================================================

