<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / AD-DISPLAYER / AD-DISPLAY-UPDATE-SUPPORT.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer ;

// =============================================================================
// validate_ad_display_widget_admin_form_submission()
// =============================================================================

function validate_ad_display_widget_admin_form_submission(
    $that           ,
    $new_instance   ,
    $old_instance
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
    // validate_ad_display_widget_admin_form_submission(
    //      $that           ,
    //      $new_instance   ,
    //      $old_instance
    //      )
    // - - - - - - - - - - - - - - - - -
    // Checks that the new values to be saved to the WP options database
    // are valid.
    //
    // Returns the filtered/sanitised options if this is the case; FALSE
    // otherwise.
    //
    // RETURNS
    //      On SUCCESS
    //          $options_to_save STRING
    //
    //      On FAILURE
    //          FALSE
    // -------------------------------------------------------------------------

//  /**
//   * Processing widget options on save
//   *
//   * @param array $new_instance The new options
//   * @param array $old_instance The previous options
//   */
//  public function update( $new_instance, $old_instance ) {
//      // processes widget options to be saved
//  }

//  /**
//   * Sanitize widget form values as they are saved.
//   *
//   * @see WP_Widget::update()
//   *
//   * @param array $new_instance Values just sent to be saved.
//   * @param array $old_instance Previously saved values from database.
//   *
//   * @return array Updated safe values to be saved.
//   */
//  public function update( $new_instance, $old_instance )

//  update (line 58)
//
//  Update a particular instance.
//
//  This function should check that $new_instance is set correctly. The newly
//  calculated value of $instance should be returned. If "false" is returned,
//  the instance won't be saved/updated.
//
//  return: Settings to save or bool false to cancel saving
//
//  array update (array $new_instance, array $old_instance)
//
//      array $new_instance: New settings for this instance as input by the user via form()
//      array $old_instance: Old settings for this instance

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $new_instance = Array(
    //          [ad_swapper_ad_slot_key] => cf94d256-ece4-4b84-af71-6d562059ee4f-1420622748-483667-1405
    //          )
    //
    //      $old_instance = Array(
    //          [ad_swapper_ad_slot_key] =>
    //          )
    //
    //      $that = greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\ad_swapper_ad_display_widget Object(
    //                  [id_base]           => ad_swapper_ad_display_widget
    //                  [name]              => Ad Swapper Ad Displayer
    //                  [widget_options]    => Array(
    //                          [classname]     => widget_ad_swapper_ad_display_widget
    //                          [description]   => Drag me to the widget area(s) you want to display Ad Swapper Ads in...
    //                          )
    //                  [control_options]   => Array(
    //                          [id_base] => ad_swapper_ad_display_widget
    //                          )
    //                  [number]            => 2
    //                  [id]                => ad_swapper_ad_display_widget-2
    //                  [updated]           =>
    //                  [option_name]       => widget_ad_swapper_ad_display_widget
    //                  )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $that , '$that' ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_POST , '$_POST' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $new_instance , '$new_instance' ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $old_instance , '$old_instance' ) ;

//exit() ;

    // =========================================================================
    // Init.
    // =========================================================================

//  $ns = __NAMESPACE__ ;
//  $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $ad_slots_dataset_slug = 'ad_swapper_ad_slots' ;

    $widget_settings_dataset_slug = 'ad_swapper_widget_settings' ;

    // -------------------------------------------------------------------------

    $settings_to_save = array() ;

    // =========================================================================
    // Get this widget instance's settings...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/widget-settings-support.php' ) ;

    // -------------------------------------------------------------------------
    // greatKiwi_byFernTec_adSwapper_local_v0x1x211_widgetSettingsSupport\
    // load_widget_instance_settings(
    //      $widget_instance_obj                            ,
    //      $widget_settings_dataset_slug                   ,
    //      &$all_application_dataset_definitions = NULL    ,
    //      &$loaded_datasets                     = NULL    ,
    //      &$core_plugapp_dirs                   = NULL    ,
    //      &$app_handle                          = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns this widget instance's currently saved settings (in a PHP
    // associative array).  If the widget instances has NO settings (yet),
    // returns an empty array.
    //
    // Set $loaded_datasets to NULL if the (ARRAY STORAGE) datasets haven't
    // been loaded yet...
    //
    // $app_handle should be (eg):-
    //      "teaser-maker"
    //      "ad-swapper"
    //      ...
    //
    // (and is only required if $loaded_datasets = NULL).
    //
    // RETURNS
    //      On SUCCESS
    //          ARRAY $widget_instance_settings
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $all_application_dataset_definitions = NULL         ;
    $loaded_datasets                     = NULL         ;
    $core_plugapp_dirs                   = NULL         ;
    $app_handle                          = 'ad-swapper' ;

    // -------------------------------------------------------------------------

    $widget_instance_settings =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_widgetSettingsSupport\load_widget_instance_settings(
            $that                                   ,
            $widget_settings_dataset_slug           ,
            $all_application_dataset_definitions    ,
            $loaded_datasets                        ,
            $core_plugapp_dirs                      ,
            $app_handle
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $widget_instance_settings ) ) {
        die( nl2br( $widget_instance_settings ) ) ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $loaded_datasets = Array(
    //
    //          [ad_swapper_ad_slots] => Array(
    //              [title]         => Ad Slots
    //              [records]       => Array(
    //                  [0] => Array(
    //                      [created_server_datetime_utc]       => 1420622748
    //                      [last_modified_server_datetime_utc] => 1420622748
    //                      [key]                               => cf94d256-ece4-4b84-af71-6d562059ee4f-1420622748-483667-1405
    //                      [local_key]                         => 971c0f797cbb593f6a441dabad4494b76b4424a472e8afc99aaad1f82d1a7142
    //                      [name]                              => right-sidebar
    //                      [title]                             => Right Sidebar
    //                      [description]                       =>
    //                      [width_nominal]                     => 300
    //                      [width_min]                         =>
    //                      [width_max]                         =>
    //                      [height_nominal]                    => 400
    //                      [height_min]                        => 32
    //                      [height_max]                        => 1000
    //                      [sequence_number]                   => 10
    //                      [global_id]                         => 10
    //                      )
    //
    //                  [1] => Array(
    //                      [created_server_datetime_utc]       => 1420699900
    //                      [last_modified_server_datetime_utc] => 1420699900
    //                      [key]                               => 8d00c863-ccf8-467b-bcf0-27f1f176b645-1420699900-596488-1406
    //                      [local_key]                         => 554358ae4516ad3693af16a4d1d617b1b6f1fc61ff7cac5361d368c07e6358d2
    //                      [name]                              => full-width-footer
    //                      [title]                             => Full-Width Footer
    //                      [description]                       =>
    //                      [width_nominal]                     => 1000
    //                      [width_min]                         => 300
    //                      [width_max]                         => 1000
    //                      [height_nominal]                    => 300
    //                      [height_min]                        => 32
    //                      [height_max]                        => 600
    //                      [sequence_number]                   => 20
    //                      [global_id]                         => 11
    //                      )
    //
    //                  )
    //
    //              [key_field_slug] => key
    //
    //              [record_indices_by_key] => Array(
    //                  [cf94d256-ece4-4b84-af71-6d562059ee4f-1420622748-483667-1405] => 0
    //                  [8d00c863-ccf8-467b-bcf0-27f1f176b645-1420699900-596488-1406] => 1
    //                  )
    //
    //              )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $loaded_datasets ) ;

    // =========================================================================
    // ad_slot_key ?
    // =========================================================================

    $new_ad_slot_key = NULL ;
        //  DON'T update this setting...

    // -------------------------------------------------------------------------

    if (    array_key_exists( 'ad_slot_key' , $_POST )
            &&
            is_string( $_POST['ad_slot_key'] )
        ) {

        // ---------------------------------------------------------------------

        if ( trim( $_POST['ad_slot_key'] ) === '' ) {

            // -----------------------------------------------------------------

            $new_ad_slot_key = '' ;

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            require_once( $core_plugapp_dirs['dataset_manager_includes_dir'] . '/record-key-support.php' ) ;

             // -------------------------------------------------------------------------
             // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
             // is_record_key(
             //      $candidate_record_key
             //      )
             // - - - - - - - - - - - - - - - - -
             // Is the input string a record key like (eg):-
             //
             //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-0-1
             //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-999977-2147483647
             //      etc
             //
             // RETURNS
             //      o   On SUCCESS
             //              TRUE
             //
             //      o   On FAILURE
             //              FALSE
             // ---------------------------------------------------------------------------

             if (   \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\is_record_key(
                         $_POST['ad_slot_key']
                         )
                    &&
                    array_key_exists(
                        $_POST['ad_slot_key']                                            ,
                        $loaded_datasets[ $ad_slots_dataset_slug ]['record_indices_by_key']
                        )
                ) {

                // -------------------------------------------------------------

                $new_ad_slot_key = $_POST['ad_slot_key'] ;

                // -------------------------------------------------------------

             } else {

                // -------------------------------------------------------------
                // Keep the old key (if it's valid)...
                // -------------------------------------------------------------

                if (    array_key_exists( 'ad_slot_key' , $widget_instance_settings )
                        &&
                        is_string( $widget_instance_settings['ad_slot_key'] )
                    ) {

                    // ---------------------------------------------------------

                    if ( trim( $widget_instance_settings['ad_slot_key'] ) === '' ) {

                        // -----------------------------------------------------

                        $new_ad_slot_key = '' ;

                        // -----------------------------------------------------

                    } else {

                        // -----------------------------------------------------

                        if (    ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\is_record_key(
                                        $widget_instance_settings['ad_slot_key']
                                        )
                                ||
                                ! array_key_exists(
                                        $widget_instance_settings['ad_slot_key']                                ,
                                        $loaded_datasets[ $ad_slots_dataset_slug ]['record_indices_by_key']
                                        )
                            ) {

                            $new_ad_slot_key = '' ;

                        }

                        // -----------------------------------------------------

                    }

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( $new_ad_slot_key !== NULL ) {
        $settings_to_save['ad_slot_key'] = $new_ad_slot_key ;
    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $settings_to_save , '$settings_to_save' ) ;

//exit() ;

    // =========================================================================
    // Save the settings...
    // =========================================================================

    $question_add = TRUE ;

    // -------------------------------------------------------------------------

    foreach ( $loaded_datasets[ $widget_settings_dataset_slug ]['records'] as $this_index => $this_record ) {

        if ( $this_record['widget_id'] === $that->id ) {

            $loaded_datasets[ $widget_settings_dataset_slug ]['records'][ $this_index ]['widget_settings'] =
                $settings_to_save
                ;

            $question_add = FALSE ;

            break ;

        }

    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $loaded_datasets[ $widget_settings_dataset_slug ]['records'] ) ;

    // -------------------------------------------------------------------------

    if ( $question_add ) {

        // ---------------------------------------------------------------------
        // ADD
        // ---------------------------------------------------------------------

        $record_to_add = array(
            'widget_id'         =>  $that->id           ,
            'widget_settings'   =>  $settings_to_save
            ) ;

        // ---------------------------------------------------------------------

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

        $dataset_manager_home_page_title = '(dataset manager home page title)' ;

        $caller_apps_includes_dir = $core_plugapp_dirs['plugins_includes_dir'] ;

        $widget_settings_datasets_dmdd =
            $all_application_dataset_definitions[ $widget_settings_dataset_slug ]
            ;

        $form_slug_underscored = 'default' ;

        // ---------------------------------------------------------------------

        $_GET['application'] = 'ad-swapper' ;

        // ---------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\add_record_programatically(
                $dataset_manager_home_page_title                                                ,
                $caller_apps_includes_dir                                                       ,
                $all_application_dataset_definitions                                            ,
                $widget_settings_dataset_slug                                                   ,
                $widget_settings_datasets_dmdd                                                  ,
                $loaded_datasets[ $widget_settings_dataset_slug ]['title']                      ,
                $loaded_datasets[ $widget_settings_dataset_slug ]['records']                    ,
                $loaded_datasets[ $widget_settings_dataset_slug ]['record_indices_by_key']      ,
                $loaded_datasets[ $widget_settings_dataset_slug ]['key_field_slug']             ,
                $form_slug_underscored                                                          ,
                $record_to_add
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            die( nl2br( $result ) ) ;
        }

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------
        // UPDATE
        // ---------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\save_numerically_indexed(
        //      $dataset_name                       ,
        //      $array_to_save                      ,
        //      $question_die_on_error = FALSE
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

        // ---------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\save_numerically_indexed(
                $widget_settings_dataset_slug                                   ,
                $loaded_datasets[ $widget_settings_dataset_slug ]['records']    ,
                $question_die_on_error
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            die( nl2br( $result ) ) ;
        }

        // ---------------------------------------------------------------------

    }

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

    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetSupport\dataset_cache_needs_reloading() ;

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $new_instance ;
//  return FALSE ;

                //  DON'T save the settings (to the WordPress options DB)!
                //
                //  (Because we've already saved them (to ARRAY STORAGE).)

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

