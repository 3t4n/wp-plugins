<?php

// *****************************************************************************
// DATASET-MANAGER / UPDATE-ARRAY-STORED-DATASET-DATA.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// get_list_index_4_value()
// =============================================================================

function get_list_index_4_value(
    $list           ,
    $target_value
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
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
    //              --OR--
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
// get_blue_colours()
// =============================================================================

function get_blue_colours() {

    // -------------------------------------------------------------------------
    // get_blue_colours()
    // - - - - - - - - -
    // RETURNS
    //      list(
    //          $light_blue_bg       ,
    //          $dark_blue_bg        ,
    //          $blue_text
    //          )
    // -------------------------------------------------------------------------

//                '#99CCFF'   ,

    return array(
                '#DDEEFF'   ,
                '#AAD4FF'   ,
                '#004488'
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


// =============================================================================
// raw_2_displayable()
// =============================================================================

function raw_2_displayable(
    $name   ,
    $value
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
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

// =============================================================================
// get_updaction_url()
// =============================================================================

function get_updaction_url(
    $core_plugapp_dirs      ,
    $args
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
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
    //                  'field'     =>  $this_sfield_lug    ,
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

// =============================================================================
// That's that!
// =============================================================================

