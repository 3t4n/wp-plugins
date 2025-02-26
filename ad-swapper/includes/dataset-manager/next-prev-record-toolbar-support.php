<?php

// *****************************************************************************
// DATASET-MANAGER / NEXT-PREV-RECORD-TOOLBAR-SUPPORT.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// get_next_prev_record_toolbar_html()
// =============================================================================

function get_next_prev_record_toolbar_html(
    $core_plugapp_dirs                      ,
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_slug                           ,
    $dataset_title                          ,
    $dataset_records                        ,
    $key_field_slug                         ,
    $record_indices_by_key                  ,
    $question_front_end                     ,
    $question_adding
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_next_prev_record_toolbar_html(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_slug                           ,
    //      $dataset_title                          ,
    //      $dataset_records                        ,
    //      $key_field_slug                         ,
    //      $record_indices_by_key                  ,
    //      $question_front_end                     ,
    //      $question_adding
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the HTML for the "Next/Previous Records Toolbar".
    //
    // Note!
    // =====
    // This version can be called from a:-
    //      <dataset_specific_get_custom_add_edit_record_page_header>
    //
    // function.  Which allows you to place the next/prev records
    // toolbar whereever you like (before, within or after) the
    // dataset specific add/edit page header proper.
    //
    // RETURNS
    //      On SUCCESS
    //          $next_previous_record_toolbar_html STRING
    //
    //      On FAILURE
    //          array( $error_message STRING )
    // -------------------------------------------------------------------------

    // =========================================================================
    // NO toolbar, if adding...
    // =========================================================================

    if ( $question_adding ) {
        return '' ;
    }

    // =========================================================================
    // Record key OK ?
    // =========================================================================

    if (    ! array_key_exists( 'record_key' , $_GET )
            ||
            trim( $_GET['record_key'] ) === ''
            ||
            ! array_key_exists( $_GET['record_key'] , $record_indices_by_key )
        ) {
        return '' ;
    }

    // =========================================================================
    // Filter the records ?
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/filtering-record-filtering.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // question_filter_dataset_records(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_records                        ,
    //      $dataset_slug                           ,
    //      $dataset_title                          ,
    //      $question_front_end                     ,
    //      &$loaded_datasets
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          o   $filtered_dataset_records ARRAY
    //                  If the dataset (records table) has some filters
    //                  defined.
    //          --OR--
    //          o   NULL
    //                  If the dataset (records table) has NO filters
    //                  defined.
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $loaded_datasets = array() ;

    // -------------------------------------------------------------------------

    $filtered_dataset_records =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\question_filter_dataset_records(
            $core_plugapp_dirs                      ,
            $all_application_dataset_definitions    ,
            $selected_datasets_dmdd                 ,
            $dataset_records                        ,
            $dataset_slug                           ,
            $dataset_title                          ,
            $question_front_end                     ,
            $loaded_datasets
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $filtered_dataset_records ) ) {
        return array( $filtered_dataset_records ) ;
    }

    // -------------------------------------------------------------------------

    if ( is_array( $filtered_dataset_records ) ) {

        // ---------------------------------------------------------------------

        $dataset_records = $filtered_dataset_records ;

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

        $record_indices_by_key =
            get_dataset_record_indices_by_key(
                $dataset_title      ,
                $dataset_records    ,
                $key_field_slug
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $record_indices_by_key ) ) {
            return array( $record_indices_by_key ) ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Init.
    // =========================================================================

    $caller_apps_includes_dir = $core_plugapp_dirs['plugins_includes_dir'] ;

    // -------------------------------------------------------------------------

    $view_title = FALSE ;
    $return_to  = FALSE ;
    $view_slug  = FALSE ;
        //  For "get_edit_record_url()"...

    // =========================================================================
    // Check record key OK...
    // =========================================================================

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // When the records are filtered, it's possible for the record specified
    // by:-
    //      $_GET['record_key']
    //
    // to be NOT in (the filtered):-
    //      $dataset_records (and their $record_indices_by_key)
    //
    // In which case, the immediately following code will generate (eg):-
    //
    //      Notice: Undefined index:
    //      c615f8e6-f342-4e03-8011-f17be45ef3b6-1448932596-431965-5244 in
    //      /opt/lampp/htdocs/plugdev/wp-content/plugins/plugin-plant/includes/dataset-manager/next-prev-record-toolbar-support.php
    //      on line 179
    //
    //      Notice: Undefined offset: -1 in
    //      /opt/lampp/htdocs/plugdev/wp-content/plugins/plugin-plant/includes/dataset-manager/next-prev-record-toolbar-support.php
    //      on line 416
    //
    // And NOT work.
    //
    // To fix this, we:-
    //
    //      o   Display the first of the filtered records (if there are any
    //          filtered records left), or;
    //
    //      o   Return to the Manage Dataset screen (if there are NO
    //          filtered records left).
    //
    // The above is a somewhat cludgy solution.  But the only real fix is
    // to design things such that records can't disappear like this (due to
    // filtering).
    //
    // ---
    //
    // As an example of this happening, say we have a dataset whoose records
    // are marked as "vetted", once they're displayed.  And say we have a
    // filter to select the "unvetted" records.
    //
    // So we select and display an "unvetted" record.  But displaying it
    // causes it to become "vetted".  So if we refresh the page, the record
    // will no longer be in the filtered $dataset_records.  Thus generating
    // the above error messages.
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_manage_dataset_url(
    //      $caller_apps_includes_dir   ,
    //      $question_front_end         ,
    //      $dataset_slug = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the "manage-dataset" URL.
    //
    // If $dataset_slug is NULL, then we use:-
    //      $_GET['dataset_slug']
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          STRING $url
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $_GET['record_key'] , $record_indices_by_key ) ) {

        // ---------------------------------------------------------------------
        // Oops!  Record gone!
        // ---------------------------------------------------------------------

        if ( count( $record_indices_by_key ) > 0 ) {

            // -----------------------------------------------------------------
            // Goto first filtered record...
            // -----------------------------------------------------------------

            $new_record_key = array_keys( $record_indices_by_key ) ;

            $new_record_key = $new_record_key[0] ;

            // -----------------------------------------------------------------

            $url =
                get_edit_record_url(
                    $caller_apps_includes_dir   ,
                    $question_front_end         ,
                    $dataset_slug               ,
                    $new_record_key             ,
                    $view_title                 ,
                    $return_to                  ,
                    $view_slug
                    ) ;

            // -----------------------------------------------------------------

            if ( is_array( $url ) ) {
                return $url ;
            }

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            $url =
                get_manage_dataset_url(
                    $caller_apps_includes_dir   ,
                    $question_front_end         ,
                    $dataset_slug
                    ) ;

            // -----------------------------------------------------------------

            if ( is_array( $url ) ) {
                return $url ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        echo <<<EOT
<script type="text/javascript">
    location.href="{$url}" ;
</script>
EOT;

        // ---------------------------------------------------------------------

        exit() ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Get the various record indices used...
    // =========================================================================

    $this_index = $record_indices_by_key[ $_GET['record_key'] ] ;

    // -------------------------------------------------------------------------

    $last_index = count( $dataset_records ) - 1 ;

    // =========================================================================
    // Support Routines...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_edit_record_url(
    //      $caller_apps_includes_dir   ,
    //      $question_front_end         ,
    //      $dataset_slug = NULL        ,
    //      $record_key = NULL          ,
    //      $view_title = FALSE         ,
    //      $return_to = FALSE          ,
    //      $view_slug = FALSE
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the "edit-record" URL.
    //
    // If $dataset_slug is NULL, then we use:-
    //      $_GET['dataset_slug']
    //
    // If $record_key is NULL, then we use:-
    //      $_GET['record_key']
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          STRING $url
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    $record_keys_by_index =
        array_flip( $record_indices_by_key )
        ;
            //  Returns the flipped array on success and NULL on failure.

    // -------------------------------------------------------------------------

    if ( ! is_array( $record_keys_by_index ) ) {
        return '' ;
    }

    // =========================================================================
    // First Link...
    // =========================================================================

    if ( $this_index === 0 ) {

        // ---------------------------------------------------------------------

        $first_link =
            get__next_prev_record_toolbar__dead_link_html(
                'first'
                ) ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $record_key = $record_keys_by_index[ 0 ] ;

        // ---------------------------------------------------------------------

        $first_url =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_edit_record_url(
                $caller_apps_includes_dir   ,
                $question_front_end         ,
                $dataset_slug               ,
                $record_key                 ,
                $view_title                 ,
                $return_to                  ,
                $view_slug
                ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $first_url ) ) {
            return $first_url ;
        }

        // ---------------------------------------------------------------------

        $first_link =
            get__next_prev_record_toolbar__live_link_html(
                'first'     ,
                $first_url
                ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Last Link...
    // =========================================================================

    if ( $this_index === $last_index ) {

        // ---------------------------------------------------------------------

        $last_link =
            get__next_prev_record_toolbar__dead_link_html(
                'last'
                ) ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $record_key = $record_keys_by_index[ $last_index ] ;

        // ---------------------------------------------------------------------

        $last_url =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_edit_record_url(
                $caller_apps_includes_dir   ,
                $question_front_end         ,
                $dataset_slug               ,
                $record_key                 ,
                $view_title                 ,
                $return_to                  ,
                $view_slug
                ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $last_url ) ) {
            return $last_url ;
        }

        // ---------------------------------------------------------------------

        $last_link =
            get__next_prev_record_toolbar__live_link_html(
                'last'      ,
                $last_url
                ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Next Link...
    // =========================================================================

    if ( $this_index >= $last_index ) {

        // ---------------------------------------------------------------------

        $next_link =
            get__next_prev_record_toolbar__dead_link_html(
                'next'
                ) ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $record_key = $record_keys_by_index[ $this_index + 1 ] ;

        // ---------------------------------------------------------------------

        $next_url =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_edit_record_url(
                $caller_apps_includes_dir   ,
                $question_front_end         ,
                $dataset_slug               ,
                $record_key                 ,
                $view_title                 ,
                $return_to                  ,
                $view_slug
                ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $next_url ) ) {
            return $next_url ;
        }

        // ---------------------------------------------------------------------

        $next_link =
            get__next_prev_record_toolbar__live_link_html(
                'next'      ,
                $next_url
                ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Prev Link...
    // =========================================================================

    if ( $this_index === 0 ) {

        // ---------------------------------------------------------------------

        $prev_link =
            get__next_prev_record_toolbar__dead_link_html(
                'prev'
                ) ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $record_key = $record_keys_by_index[ $this_index - 1 ] ;

        // ---------------------------------------------------------------------

        $prev_url =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_edit_record_url(
                $caller_apps_includes_dir   ,
                $question_front_end         ,
                $dataset_slug               ,
                $record_key                 ,
                $view_title                 ,
                $return_to                  ,
                $view_slug
                ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $prev_url ) ) {
            return $prev_url ;
        }

        // ---------------------------------------------------------------------

        $prev_link =
            get__next_prev_record_toolbar__live_link_html(
                'prev'      ,
                $prev_url
                ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    $div_style = <<<EOT
background-color:#F0F8FF; padding:6px 0
EOT;

    // -------------------------------------------------------------------------

    $record_number = $this_index + 1 ;

    $record_count = count( $dataset_records ) ;

    // -------------------------------------------------------------------------

    return <<<EOT
<div style="{$div_style}">{$first_link}{$last_link} record# {$record_number} of {$record_count} {$prev_link}{$next_link}</div>
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get__next_prev_record_toolbar__button_style()
// =============================================================================

function get__next_prev_record_toolbar__button_style( $bg ) {

    // -------------------------------------------------------------------------

    $border_radius = '9px' ;

    // -------------------------------------------------------------------------

    return <<<EOT
display:inline-block;
margin:0 20px;
padding:0 16px 1px 16px;
background-color:{$bg}; color:#FFFFFF;
-moz-border-radius:{$border_radius}; -webkit-border-radius:{$border_radius}; -khtml-border-radius:{$border_radius}; border-radius:{$border_radius};
font-weight:bold
EOT;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get__next_prev_record_toolbar__live_link_html()
// =============================================================================

function get__next_prev_record_toolbar__live_link_html(
    $text       ,
    $url
    ) {

    // -------------------------------------------------------------------------

    $a_style = get__next_prev_record_toolbar__button_style( '#0066CC' ) . <<<EOT
; text-decoration:none
EOT;

    // -------------------------------------------------------------------------

    $a_style = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_one_tight_line( $a_style ) ;

    // -------------------------------------------------------------------------

    return <<<EOT
<a  href="{$url}"
    style="{$a_style}"
    >{$text}</a>
EOT;

    // -------------------------------------------------------------------------

}


// =============================================================================
// get__next_prev_record_toolbar__dead_link_html()
// =============================================================================

function get__next_prev_record_toolbar__dead_link_html(
    $text
    ) {

    // -------------------------------------------------------------------------

    $span_style = get__next_prev_record_toolbar__button_style( '#808080' ) ;

    // -------------------------------------------------------------------------

    $span_style = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_one_tight_line( $span_style ) ;

    // -------------------------------------------------------------------------

    return <<<EOT
<span style="{$span_style}">{$text}</span>
EOT;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

