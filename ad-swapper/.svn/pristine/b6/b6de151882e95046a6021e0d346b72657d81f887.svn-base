<?php

// *****************************************************************************
// DATASET-MANAGER / FILTERING-UI.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// question_get_filter_toolbar()
// =============================================================================

function question_get_filter_toolbar(
    $core_plugapp_dirs                      ,
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_records                        ,
    $dataset_title                          ,
    $dataset_slug                           ,
    $question_front_end                     ,
    $table_data
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // question_get_filter_toolbar(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_records                        ,
    //      $dataset_title                          ,
    //      $dataset_slug                           ,
    //      $question_front_end                     ,
    //      $table_data
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // $table_data is the data to be displayed in the "Dataset Records Table".
    // And was created AFTER any filtering (of the dataset records that the
    // Dataset Records Table is displaying) was applied.
    //
    // RETURNS
    //      On SUCCESS
    //          $toolbar_html STRING
    //          (possibly the empty string, if NO filter toolbar)
    //
    //      On FAILURE
    //          array( $error_message STRING )
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Any filters defined ?
    // =========================================================================

    if (    ! array_key_exists( 'filters' , $selected_datasets_dmdd['dataset_records_table'] )
            ||
            ! is_array( $selected_datasets_dmdd['dataset_records_table']['filters'] )
            ||
            count( $selected_datasets_dmdd['dataset_records_table']['filters'] ) < 1
        ) {
        return '' ;
            //  NO!
    }

    // =========================================================================
    // Get the dataset title (for error messages)...
    // =========================================================================

    $safe_dataset_title = htmlentities( $dataset_title ) ;

    // =========================================================================
    // Only exactly one filter supported at the moment...
    // =========================================================================

    if ( count( $selected_datasets_dmdd['dataset_records_table']['filters'] ) !== 1 ) {

        $ln = __LINE__ - 2 ;

        $msg = <<<EOT
PROBLEM creating filter toolbar:&nbsp; Multiple (dataset records table) filters not supported yet
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        return array( $msg ) ;

    }

    // =========================================================================
    // Get the filter details...
    // =========================================================================

    $filter_details = $selected_datasets_dmdd['dataset_records_table']['filters'][0] ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $filter_details = Array(
    //          [toolbar_title]                             =>  Record Structure
    //          [toolbar_ui_type]                           =>  dropdown
    //          [cookie_name]                               =>  NULL                ,
    //          [default_cookie_value]                      =>  NULL                ,
    //          [cookie_names_by_pv_slug]                   =>  array(
    //              'sites-to-advertise'    =>  'ad-swapper-sites-to-advertise'     ,
    //              'sites-to-advertise-on' =>  'ad-swapper-sites-to-advertise-on'
    //              )   ,
    //          [default_cookie_values_by_pv_slug]          =>  array(
    //              'sites-to-advertise'    =>  'yes-yes'   ,
    //              'sites-to-advertise-on' =>  'yes-yes'
    //              )   ,
    //          [titles_by_value]                           =>  NULL
    //          [custom_get_toolbar_html_function]          =>
    //          [custom_get_toolbar_html_function_args]     =>
    //          [custom_get_titles_by_value_function]       =>
    //          [custom_get_titles_by_value_function_args]  =>
    //          [custom_record_filtering_function]          =>
    //          [custom_record_filtering_function_args]     =>
    //          [get_help_html_function]                    =>                                                                          ,
    //          [get_help_html_function_args]               =>                                                                          ,
    //          [foreign_dataset_field_args]                =>  Array(
    //              [foreign_dataset_slug]      =>  validata_record_structures
    //              [foreign_match_field_slug]  =>  key
    //              [foreign_title_field_slug]  =>  slug
    //              [this_match_field_slug]     =>  record_structure_key
    //              )
    //          )
    //
    //
    //  NOTES
    //  =====
    //  1.  "toolbar_ui_type" must be one of:-
    //          "dropdown", "buttons", "custom"
    //
    //  2.  If "toolbar_ui_type" is "custom", then
    //          "custom_get_toolbar_html_function" MUST be specified.
    //
    //  3.  "xxx_function":-
    //          o   Can be NULL or an empty string if NO such function is
    //              specified.  And:-
    //          o   Must include the (absolute) namespace name (of the function
    //              concerned)
    //
    //  4.  "xxx_function_args" can be any PHP type.  It will be passed to the
    //      "xxx_function" as is.
    //
    //  5.  "default_cookie_value" is the value to be used if the filter COOKIE
    //      HASN'T been set yet.  Should be a string.  Defaults to the empty
    //      string ("").
    //
    //  6.  If there's NO:-
    //          "custom_get_titles_by_value_function"
    //
    //      then we'll (try to) get the titles by value from the:-
    //          "foreign_dataset_field_args"
    //
    //  7.  If there's NO:-
    //          "custom_record_filtering_function"
    //
    //      then we'll (try to) filter the records using the:-
    //          "foreign_dataset_field_args"
    //
    //  8.  If a valid:-
    //          "get_help_html_function"
    //
    //      is specified - and the "toolbar-ui-type" is either "dropdown" or
    //      "button" - then a "toggle help" button/link will be displayed on
    //      the filter toolbar.  Which will show/hide the specified help HTML
    //      in a DIV immediately below the filter toolbar.  If
    //      "toolbar-ui-type" is "custom" then the help text will only appear
    //      if supported by the "custom_get_toolbar_html_function" function.
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $filter_details     ,
//    '$filter_details'
//    ) ;

    // =========================================================================
    // If a PAGE VARIANT was specified (in $_GET['pv']), get and validate it...
    // =========================================================================

    if (    array_key_exists(
                'pv'        ,
                $_GET
                )
            &&
            in_array(
                $_GET['pv']                                                 ,
                array( 'sites-to-advertise' , 'sites-to-advertise-on' )     ,
                TRUE
                )
        ) {
        $selected_pv = $_GET['pv'] ;

    } else {
        $selected_pv = '' ;

    }

    // -------------------------------------------------------------------------

    if ( $selected_pv !== '' ) {

        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                    'page_variants'                                     ,
                    $selected_datasets_dmdd['dataset_records_table']
                    )
                ||
                ! is_array( $selected_datasets_dmdd['dataset_records_table']['page_variants'] )
                ||
                ! array_key_exists(
                    $selected_pv                                                        ,
                    $selected_datasets_dmdd['dataset_records_table']['page_variants']
                    )
            ) {
            $selected_pv = '' ;

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Check/default the "toolbar ui type"...
    // =========================================================================

    if ( array_key_exists( 'toolbar_ui_type' , $filter_details ) ) {

        // ---------------------------------------------------------------------

        if ( ! in_array(
                    $filter_details['toolbar_ui_type']  ,
                    array(
                        'dropdown'      ,
                        'buttons'       ,
                        'custom'
                        )                               ,
                    TRUE
                    )
            ) {

            $ln = __LINE__ - 7 ;

            $msg = <<<EOT
PROBLEM:&nbsp; Unrecognised/unsupported "toolbar_ui_type"
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        $toolbar_ui_type = $filter_details['toolbar_ui_type'] ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $toolbar_ui_type = 'dropdown' ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // If "toolbar_ui_type" is "custom", then either:-
    //
    //      o   "titles_by_value", or a;
    //
    //      o   "custom_get_titles_by_value_function"
    //
    // function MUST be specified...
    // =========================================================================

    if ( $toolbar_ui_type === 'custom' ) {

        // ---------------------------------------------------------------------

        if (    ! array_key_exists( 'titles_by_value' , $filter_details )
                &&
                ! array_key_exists( 'custom_get_titles_by_value_function' , $filter_details )
            ) {

            $ln = __LINE__ - 4 ;

            $msg = <<<EOT
PROBLEM:&nbsp; Either "titles_by_value" or "custom_get_titles_by_value_function" must be specified (when "toolbar_ui_type" is "custom")
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Get the filter cookie name and value...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/filtering-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_filter_cookie_name_and_value(
    //      $safe_dataset_title         ,
    //      $filter_details             ,
    //      $selected_pv                ,
    //      $question_cookie_required
    //      )
    // - - - - - - - - - - - - - - - - -
    // $selected_pv should be the validated value obtained from $_GET['pv'] (or
    // the empty string, if NO $_GET['pv'] exists).
    //
    // If NO cookie name was specified (in the filter definition), returns
    //      array(
    //          NULL    ,
    //          NULL
    //          )
    //
    // Returns the filter specified default cookie value, if the cookie name
    // cookie wasn't set.
    //
    // RETURNS
    //      On SUCCESS
    //          array(
    //              $cookie_name    ,
    //              $cookie_value
    //              )
    //          --OR--
    //          array(
    //              NULL    ,
    //              NULL
    //              )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    if ( $selected_pv === '' ) {
        $question_cookie_required = FALSE ;
    } else {
        $question_cookie_required = TRUE ;
    }

    // -------------------------------------------------------------------------

    $result =
        get_filter_cookie_name_and_value(
            $safe_dataset_title         ,
            $filter_details             ,
            $selected_pv                ,
            $question_cookie_required
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return array( $result ) ;
    }

    // -------------------------------------------------------------------------

    list(
        $cookie_name                        ,
        $currently_selected_filter_value
        ) = $result ;

    // =========================================================================
    // Get the filter titles by values...
    // =========================================================================

    // -------------------------------------------------------------------------
    // NOTES!
    // ======
    // 1.   The filter titles and values are used to create the:-
    //          o   "dropdown", and;
    //          o   "buttons"
    //
    //      "toolbar ui types".  And "custom" toolbar ui types, too, if the:-
    //          "custom_get_toolbar_html_function"
    //
    //      handles them.
    //
    // 2.   The titles and values are returned in an array like:-
    //
    //          $filter_titles_by_value = array
    //              "value-1"   =>  "Title 1"
    //              "value-2"   =>  "Title 2"
    //                              ...
    //              "value-N"   =>  "Title N"
    //              )
    //
    //      Where the "Title X" will be:-
    //          o   The <select> <option> title (for "dropdown" toolbar ui
    //              types), or;
    //          o   The button title (for "buttons" toolbar ui types).
    //
    // 3.   If there's NO:-
    //          "custom_get_titles_by_value_function"
    //
    //      then we'll (try to) get the titles by value from the:-
    //          "foreign_dataset_field_args"
    // -------------------------------------------------------------------------

    if (    array_key_exists( 'titles_by_value' , $filter_details )
            &&
            is_array( $filter_details['titles_by_value'] )
            &&
            count( $filter_details['titles_by_value'] ) > 0
        ) {

        $filter_titles_by_value =
            $filter_details['titles_by_value']
            ;

    } elseif (  array_key_exists( 'custom_get_titles_by_value_function' , $filter_details )
                &&
                is_string( $filter_details['custom_get_titles_by_value_function'] )
                &&
                trim( $filter_details['custom_get_titles_by_value_function'] ) !== ''
        ) {

        // =====================================================================
        // CUSTOM "GET TITLES BY VALUE" FUNCTION ?
        // =====================================================================

        if ( ! function_exists( $filter_details['custom_get_titles_by_value_function'] ) ) {

            $ln = __LINE__ - 2 ;

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "custom_get_titles_by_value_function" (function not found)
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

            return array( $msg ) ;

        }

        // =====================================================================
        // CUSTOM "GET TITLES BY VALUE" FUNCTION !
        // =====================================================================

        if ( array_key_exists( 'custom_get_titles_by_value_function_args' , $filter_details ) ) {

            $custom_get_titles_by_value_function_args =
                $filter_details['custom_get_titles_by_value_function_args']
                ;

        } else {

            $custom_get_titles_by_value_function_args = NULL ;

        }

        // -------------------------------------------------------------------------
        // <custom_get_filter_titles_by_value_function>(
        //      $core_plugapp_dirs                          ,
        //      $all_application_dataset_definitions        ,
        //      $selected_datasets_dmdd                     ,
        //      $dataset_records                            ,
        //      $dataset_title                              ,
        //      $dataset_slug                               ,
        //      $question_front_end                         ,
        //      $table_data                                 ,
        //      $safe_dataset_title                         ,
        //      $filter_details                             ,
        //      $cookie_name                                ,
        //      $toolbar_ui_type                            ,
        //      $currently_selected_filter_value            ,
        //      $custom_get_titles_by_value_function_args
        //      )
        // - - - - - - - - - - - - - - - - -
        // $filter_details is (eg):-
        //
        //      $filter_details = Array(
        //          [toolbar_title]                             =>  Record Structure                            ,
        //          [toolbar_ui_type]                           =>  'dropdown'                                  ,
        //          [cookie_name]                               =>  validata-field-filter-record-structure      ,
        //          [default_cookie_value]                      =>  ''                                          ,
        //          [custom_get_toolbar_html_function]          =>  NULL                                        ,
        //          [custom_get_toolbar_html_function_args]     =>  NULL                                        ,
        //          [custom_get_titles_by_value_function]       =>  NULL                                        ,
        //          [custom_get_titles_by_value_function_args]  =>  NULL                                        ,
        //          [custom_record_filtering_function]          =>  NULL                                        ,
        //          [custom_record_filtering_function_args]     =>  NULL                                        ,
        //          [foreign_dataset_field_args]                =>  array(
        //              [foreign_dataset_slug]      =>  validata_record_structures      ,
        //              [foreign_match_field_slug]  =>  key                             ,
        //              [foreign_title_field_slug]  =>  slug                            ,
        //              [this_match_field_slug]     =>  record_structure_key
        //              )
        //          )
        //
        // RETURNS
        //      On SUCCESS
        //          $filter_titles_by_value = array
        //              "value-1"   =>  "Title 1"
        //              "value-2"   =>  "Title 2"
        //                              ...
        //              "value-N"   =>  "Title N"
        //              ) ARRAY
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        $filter_titles_by_value =
            $filter_details['custom_get_titles_by_value_function'](
                $core_plugapp_dirs                          ,
                $all_application_dataset_definitions        ,
                $selected_datasets_dmdd                     ,
                $dataset_records                            ,
                $dataset_title                              ,
                $dataset_slug                               ,
                $question_front_end                         ,
                $table_data                                 ,
                $safe_dataset_title                         ,
                $filter_details                             ,
                $cookie_name                                ,
                $toolbar_ui_type                            ,
                $currently_selected_filter_value            ,
                $custom_get_titles_by_value_function_args
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $filter_titles_by_value ) ) {
            return array( $filter_titles_by_value ) ;
        }

        // ---------------------------------------------------------------------

    } elseif (  array_key_exists( 'foreign_dataset_field_args' , $filter_details )
                &&
                is_array( $filter_details['foreign_dataset_field_args'] )
                &&
                count( $filter_details['foreign_dataset_field_args'] ) > 0
        ) {

        // =====================================================================
        // STANDARD "GET TITLES BY VALUE" FUNCTION ?
        //
        //      Get titles and values from "FOREIGN DATASET FIELD" ?
        // =====================================================================

        // -------------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $filter_details = Array(
        //          ...
        //          [foreign_dataset_field_args]            =>  array(
        //              [foreign_dataset_slug]      =>  validata_record_structures  ,
        //              [foreign_match_field_slug]  =>  key                         ,
        //              [foreign_title_field_slug]  =>  slug                        ,
        //              [this_match_field_slug]     =>  record_structure_key
        //              )
        //          ...
        //          )
        //
        // -------------------------------------------------------------------------

        if ( count( $filter_details['foreign_dataset_field_args'] ) !== 4 ) {

            $ln = __LINE__ - 4 ;

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "foreign_dataset_field_args" (four element array expected)
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------
        // Check the array members...
        // ---------------------------------------------------------------------

        //  TODO !!!

        // ---------------------------------------------------------------------
        // Load the foreign dataset records...
        // ---------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\load_numerically_indexed(
        //      $dataset_name                       ,
        //      $question_die_on_error = FALSE
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Loads and returns the specified PHP numerically indexed array.
        //
        // RETURNS
        //      o   On SUCCESS
        //          - - - - -
        //          ARRAY $array
        //          A possibly empty PHP numerically indexed ARRAY.
        //
        //      o   On FAILURE
        //          - - - - -
        //          $error_message STRING
        // -------------------------------------------------------------------------

        $question_die_on_error = FALSE ;

        // ---------------------------------------------------------------------

        $foreign_dataset_records =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\load_numerically_indexed(
                $filter_details['foreign_dataset_field_args']['foreign_dataset_slug']     ,
                $question_die_on_error
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $foreign_dataset_records ) ) {
            return array( $foreign_dataset_records ) ;
        }

        // ---------------------------------------------------------------------

        $filter_titles_by_value = array(
            'all'   =>  'All'   ,
            'none'  =>  'None'
            ) ;

        // ---------------------------------------------------------------------

        foreach ( $foreign_dataset_records as $this_record ) {

            // -----------------------------------------------------------------

            $filter_titles_by_value[
                $this_record[ $filter_details['foreign_dataset_field_args']['foreign_match_field_slug'] ]
                ] =
                $this_record[ $filter_details['foreign_dataset_field_args']['foreign_title_field_slug'] ]
                ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    } else {

        // =====================================================================
        // ERROR !
        // =====================================================================

        $ln = __LINE__ - 4 ;

        $msg = <<<EOT
PROBLEM:&nbsp; Can't get filter titles by value (neither "titles_by_value" nor "custom_get_titles_by_value_function" nor "foreign_dataset_field_args" were specified)
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        return array( $msg ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // NO "Titles By Value" means NO Filter Toolbar...
    // =========================================================================

    if ( count( $filter_titles_by_value ) < 1 ) {
        return '' ;
    }

    // =========================================================================
    // HELP ?
    // =========================================================================

    if (    array_key_exists( 'get_help_html_function' , $filter_details )
            &&
            is_string( $filter_details['get_help_html_function'] )
            &&
            trim( $filter_details['get_help_html_function'] ) !== ''
        ) {

        // ---------------------------------------------------------------------

        if ( ! function_exists( $filter_details['get_help_html_function'] ) ) {

            // -----------------------------------------------------------------

            $ln = __LINE__ - 4 ;

            $msg = <<<EOT
PROBLEM:&nbsp; Bad get help HTML function (for filter - function not found)
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

            return array( $msg ) ;

            // -----------------------------------------------------------------

        }

        // -------------------------------------------------------------------------
        // <custom_get_help_html_function>(
        //      $core_plugapp_dirs                      ,
        //      $all_application_dataset_definitions    ,
        //      $selected_datasets_dmdd                 ,
        //      $dataset_records                        ,
        //      $dataset_title                          ,
        //      $dataset_slug                           ,
        //      $question_front_end                     ,
        //      $table_data                             ,
        //      $safe_dataset_title                     ,
        //      $filter_details                         ,
        //      $cookie_name                            ,
        //      $currently_selected_filter_value        ,
        //      $filter_titles_by_value
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      On SUCCESS
        //          $help_html STRING
        //          (possibly the empty string, if NO help required)
        //
        //      On FAILURE
        //          array( $error_message STRING )
        // -------------------------------------------------------------------------

        $help_html =
            $filter_details['get_help_html_function'](
                $core_plugapp_dirs                      ,
                $all_application_dataset_definitions    ,
                $selected_datasets_dmdd                 ,
                $dataset_records                        ,
                $dataset_title                          ,
                $dataset_slug                           ,
                $question_front_end                     ,
                $table_data                             ,
                $safe_dataset_title                     ,
                $filter_details                         ,
                $cookie_name                            ,
                $currently_selected_filter_value        ,
                $filter_titles_by_value
                ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $help_html ) ) {
            return $help_html ;
        }

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $help_html = '' ;


        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Get and return the toolbar HTML...
    // =========================================================================

    if ( $toolbar_ui_type === 'dropdown' ) {

        // =====================================================================
        // DROPDOWN
        // =====================================================================

        return get_toolbar_html_dropdown(
                    $core_plugapp_dirs                      ,
                    $all_application_dataset_definitions    ,
                    $selected_datasets_dmdd                 ,
                    $dataset_records                        ,
                    $dataset_title                          ,
                    $dataset_slug                           ,
                    $question_front_end                     ,
                    $table_data                             ,
                    $safe_dataset_title                     ,
                    $filter_details                         ,
                    $cookie_name                            ,
                    $currently_selected_filter_value        ,
                    $filter_titles_by_value                 ,
                    $help_html
                    ) ;

        // --------------------------------------------------------------------

    } elseif ( $toolbar_ui_type === 'buttons' ) {

        // =====================================================================
        // BUTTONS
        // =====================================================================

        return get_toolbar_html_buttons(
                    $core_plugapp_dirs                      ,
                    $all_application_dataset_definitions    ,
                    $selected_datasets_dmdd                 ,
                    $dataset_records                        ,
                    $dataset_title                          ,
                    $dataset_slug                           ,
                    $question_front_end                     ,
                    $table_data                             ,
                    $safe_dataset_title                     ,
                    $filter_details                         ,
                    $cookie_name                            ,
                    $currently_selected_filter_value        ,
                    $filter_titles_by_value                 ,
                    $help_html
                    ) ;

        // --------------------------------------------------------------------

    } elseif ( $toolbar_ui_type !== 'custom' ) {

        // =====================================================================
        // ERROR !
        // =====================================================================

        $ln = __LINE__ - 6 ;

        $safe_toolbar_ui_type = htmlentities( $toolbar_ui_type ) ;

        $msg = <<<EOT
PROBLEM:&nbsp; Unrecognised/unsupported "toolbar_ui_type" ("{$safe_toolbar_ui_type}")
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        return array( $msg ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Custom "get_toolbar_html" function ?
    // =========================================================================

    if (    ! is_string( $filter_details['custom_get_toolbar_html_function'] )
            ||
            trim( $filter_details['custom_get_toolbar_html_function'] ) === ''
        ) {

        $ln = __LINE__ - 4 ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "custom_get_toolbar_html_function" (non-empty string expected)
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        return array( $msg ) ;

    }

    // -------------------------------------------------------------------------

    if ( ! function_exists( $filter_details['custom_get_toolbar_html_function'] ) ) {

        // ---------------------------------------------------------------------

        $ln = __LINE__ - 4 ;

        $msg = <<<EOT
PROBLEM:&nbsp; Bad custom toolbar HTML function (function not found)
For dataset:&nbsp; {$safe_dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        return array( $msg ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // CUSTOM (GET FILTER TOOLBAR HTML FUNCTION)
    // =========================================================================

    if ( array_key_exists( 'custom_get_toolbar_html_function_args' , $filter_details ) ) {

        $custom_get_toolbar_html_function_args =
            $filter_details['custom_get_toolbar_html_function_args']
            ;

    } else {

        $custom_get_toolbar_html_function_args = NULL ;

    }

    // -------------------------------------------------------------------------
    // <custom_get_filter_toolbar_html_function>(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_records                        ,
    //      $dataset_title                          ,
    //      $dataset_slug                           ,
    //      $question_front_end                     ,
    //      $table_data                             ,
    //      $safe_dataset_title                     ,
    //      $filter_details                         ,
    //      $cookie_name                            ,
    //      $currently_selected_filter_value        ,
    //      $filter_titles_by_value                 ,
    //      $help_html                              ,
    //      $custom_get_toolbar_html_function_args
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // NOTES!
    // ======
    // 1.   $filter_details is (eg):-
    //
    //          $filter_details = Array(
    //              [toolbar_title]                             =>  Record Structure                            ,
    //              [toolbar_ui_type]                           =>  'dropdown'                                  ,
    //              [cookie_name]                               =>  validata-field-filter-record-structure      ,
    //              [default_cookie_value]                      =>  ''                                          ,
    //              [custom_get_toolbar_html_function]          =>  NULL                                        ,
    //              [custom_get_toolbar_html_function_args]     =>  NULL                                        ,
    //              [custom_get_titles_by_value_function]       =>  NULL                                        ,
    //              [custom_get_titles_by_value_function_args]  =>  NULL                                        ,
    //              [custom_record_filtering_function]          =>  NULL                                        ,
    //              [custom_record_filtering_function_args]     =>  NULL                                        ,
    //              [foreign_dataset_field_args]                =>  array(
    //                  [foreign_dataset_slug]      =>  validata_record_structures      ,
    //                  [foreign_match_field_slug]  =>  key                             ,
    //                  [foreign_title_field_slug]  =>  slug                            ,
    //                  [this_match_field_slug]     =>  record_structure_key
    //                  )
    //              )
    //
    // 2.   $custom_get_toolbar_html_function_args will be NULL, if NO:-
    //          "custom_get_toolbar_html_function_args"
    //
    //      was specified.
    //
    // RETURNS
    //      On SUCCESS
    //          $toolbar_html STRING
    //          (possibly the empty string, if NO filter toolbar)
    //
    //      On FAILURE
    //          array( $error_message STRING )
    // -------------------------------------------------------------------------

    return
        $filter_details['custom_get_toolbar_html_function'](
            $core_plugapp_dirs                      ,
            $all_application_dataset_definitions    ,
            $selected_datasets_dmdd                 ,
            $dataset_records                        ,
            $dataset_title                          ,
            $dataset_slug                           ,
            $question_front_end                     ,
            $table_data                             ,
            $safe_dataset_title                     ,
            $filter_details                         ,
            $cookie_name                            ,
            $currently_selected_filter_value        ,
            $filter_titles_by_value                 ,
            $help_html                              ,
            $custom_get_toolbar_html_function_args
            ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_toolbar_html_dropdown()
// =============================================================================

function get_toolbar_html_dropdown(
    $core_plugapp_dirs                      ,
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_records                        ,
    $dataset_title                          ,
    $dataset_slug                           ,
    $question_front_end                     ,
    $table_data                             ,
    $safe_dataset_title                     ,
    $filter_details                         ,
    $cookie_name                            ,
    $currently_selected_filter_value        ,
    $filter_titles_by_value                 ,
    $help_html
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_toolbar_html_dropdown(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_records                        ,
    //      $dataset_title                          ,
    //      $dataset_slug                           ,
    //      $question_front_end                     ,
    //      $table_data                             ,
    //      $safe_dataset_title                     ,
    //      $filter_details                         ,
    //      $cookie_name                            ,
    //      $currently_selected_filter_value        ,
    //      $filter_titles_by_value                 ,
    //      $help_html
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $toolbar_html STRING
    //          (possibly the empty string, if NO filter toolbar)
    //
    //      On FAILURE
    //          array( $error_message STRING )
    // -------------------------------------------------------------------------

    // =========================================================================
    // Get the "dropdown" options...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we should have (eg):-

    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $filter_titles_by_value     ,
//    '$filter_titles_by_value'
//    ) ;

    // -------------------------------------------------------------------------

//  <select>
//    <option value="volvo">Volvo</option>
//    <option value="saab">Saab</option>
//    <option value="opel">Opel</option>
//    <option value="audi">Audi</option>
//  </select>

    // -------------------------------------------------------------------------

    $select_options = '' ;

    // -------------------------------------------------------------------------

    foreach ( $filter_titles_by_value as $this_value => $this_title ) {

        // ---------------------------------------------------------------------

        if ( $this_value === $currently_selected_filter_value ) {
            $selected = ' SELECTED' ;
        } else {
            $selected = '' ;
        }

        // ---------------------------------------------------------------------

        $select_options .= <<<EOT
<option value="{$this_value}"{$selected}> {$this_title} </option>
EOT;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // toggle help ?
    // =========================================================================

    if ( $help_html === '' ) {

        // ---------------------------------------------------------------------

        $toggle_help_link = '' ;

        // ---------------------------------------------------------------------

        $help_text_container = '' ;

        // ---------------------------------------------------------------------

        $help_js = '' ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $toggle_help_link = <<<EOT
<a  href="javascript:void()"
    onclick="ferntec_SDM_toggle_DRT_filter_help()"
    style="margin-left:2em; text-decoration:none; color:#0066CC"
    >toggle help</a>
EOT;

        // ---------------------------------------------------------------------

        $help_text_container = <<<EOT
<div    id="ferntec_SDM_DRT_filter_help_text_container"
        style="display:none"
        >{$help_html}</div>
EOT;

        // ---------------------------------------------------------------------

        $help_js = <<<EOT
    function ferntec_SDM_toggle_DRT_filter_help() {
        var el = document.getElementById( 'ferntec_SDM_DRT_filter_help_text_container' ) ;
        if ( el.style.display === 'none' ) {
            el.style.display = '' ;
        } else {
            el.style.display = 'none' ;
        }
    }
EOT;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Create the toolbar...
    // =========================================================================

    $js_dir_url = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_js_url() ;

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // The WordPress Table routines use a query variable named "paged", to
    // access the second and third, etc pages (in a table that takes more
    // than one page (of 10 items), to display).
    //
    // So if "paged" = (say) 3 - and you set a filter value - with:-
    //      ferntec_SDM_set_DRT_filter()
    //
    // - which in turn does:-
    //      location.reload( true ) ;
    //
    // - when the new filter value has less than 3 pages - then the table won't
    // display correctly.  So we must detect this "paged" query variable (in
    // the current page's URI), and remove it (when setting a new filter value
    // - so as to force the new table to display from page 1).
    // -------------------------------------------------------------------------

    $filter_toolbar_html = <<<EOT
<div style="background-color:#CCCCCC; padding:4px 1em; width:95%">
<b>{$filter_details['toolbar_title']}</b>:&nbsp; <select
    id="ferntec-SDM-set-DRT-filter"
    style="margin:0 1em"
    onchange="ferntec_SDM_set_DRT_filter()"
    >{$select_options}</select>&nbsp; <span
        style="font-size:117%; color:#0066CC; font-weight:bold; cursor:pointer; position:relative; top:3px"
        onclick="ferntec_SDM_set_DRT_filter()"
        onmouseover="this.style.textDecoration='underline'"
        onmouseout="this.style.textDecoration=''"
        >GO</span>{$toggle_help_link}
</div>
{$help_text_container}
<script type="text/javascript"
        src="{$js_dir_url}/URI.min.js"
        ></script>
<script type="text/javascript">
    function ferntec_SDM_set_DRT_filter() {
        var select_el = document.getElementById( 'ferntec-SDM-set-DRT-filter' ) ;
        var value = select_el.options[ select_el.selectedIndex ].value ;
        scottHamperCookies.set( "{$cookie_name}" , value ) ;
        var uri = URI( location.href ) ;
        if ( uri.hasQuery('paged') ) {
            location.href = uri.removeSearch('paged') ;
        } else {
            location.reload( true ) ;
        }
    }
{$help_js}
</script>
EOT;

    // =========================================================================
    // SUCCESS
    // =========================================================================

    return $filter_toolbar_html ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

