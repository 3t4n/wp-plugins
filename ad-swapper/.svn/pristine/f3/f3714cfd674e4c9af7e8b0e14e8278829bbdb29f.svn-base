<?php

// *****************************************************************************
// / APP-DEFS / AD-SWAPPER.APP / PAGE-REQUEST-RESOURCES.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperPageRequests ;

// =============================================================================
// get_datetime_utc_column_value()
// =============================================================================

function get_datetime_utc_column_value(
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
    //          [id]                                => 1
    //          [created_server_datetime]           => 0000-00-00 00:00:00
    //          [last_modified_server_datetime]     => 2015-02-03 21:31:18
    //          [created_server_datetime_utc]       => 0
    //          [last_modified_server_datetime_utc] => 0
    //          [php_time]                          => 1422952278
    //          [php_microtime]                     => 0.42002200 1422952278
    //          [request_time]                      => 1422952278
    //          [request_time_float]                =>
    //          [request_uri]                       => /plugdev/
    //          [full_request_url]                  => http://localhost/plugdev/
    //          [asadid]                            =>
    //          [http_referer]                      => http://localhost/plugdev/wp-admin/admin.php?page=pluginPlant
    //          [remote_addr]                       => 127.0.0.1
    //          [http_user_agent]                   => Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $this_dataset_record_data , '$this_dataset_record_data' ) ;

    $out = gmdate(
                'D j M Y\&\n\b\s\p\; G:i:s\&\n\b\s\p\; (g:i:sa) e'      ,
                (int) $this_dataset_record_data['php_time']
                ) ;

    // -------------------------------------------------------------------------
    // human_time_diff( $from, $to )
    // - - - - - - - - - - - - - - -
    // Determines the difference between two timestamps.
    //
    // The difference is returned in a human readable format such as "1 hour",
    // "5 mins", "2 days".
    //
    //      $from
    //          (integer) (required) Unix timestamp from which the difference
    //          begins.
    //
    //          Default: None
    //
    //      $to
    //          (integer) (optional) Unix timestamp to end the time difference.
    //          Default becomes time() if not set.
    //
    //          Default: ''
    //
    // RETURN VALUES
    //      (string) Human readable time difference.
    //
    // EXAMPLES
    //
    //      To print an entry's time ("2 days ago"):
    //          echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago' ;
    //
    //      For comments:
    //          echo human_time_diff( get_comment_time('U'), current_time('timestamp') ) . ' ago' ;
    //
    // CHANGE LOG
    //      Since: 1.5.0
    // -------------------------------------------------------------------------

    $out .=
        '<br />' .
        \human_time_diff(
            (int) $this_dataset_record_data['php_time']     ,
            time()
            ) . ' ago' ;

    // -------------------------------------------------------------------------

    return $out ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_page_column_value()
// =============================================================================

function get_page_column_value(
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
    //      $dataset_slug = 'ad_swapper_page_requests'
    //
    //      $this_dataset_record_data = Array(
    //          [id]                                => 1
    //          [created_server_datetime]           => 0000-00-00 00:00:00
    //          [last_modified_server_datetime]     => 2015-02-03 21:31:18
    //          [created_server_datetime_utc]       => 0
    //          [last_modified_server_datetime_utc] => 0
    //          [php_time]                          => 1422952278
    //          [php_microtime]                     => 0.42002200 1422952278
    //          [request_time]                      => 1422952278
    //          [request_time_float]                =>
    //          [request_uri]                       => /plugdev/
    //          [full_request_url]                  => http://localhost/plugdev/
    //          [asadid]                            =>
    //          [http_referer]                      => http://localhost/plugdev/wp-admin/admin.php?page=pluginPlant
    //          [remote_addr]                       => 127.0.0.1
    //          [http_user_agent]                   => Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $dataset_slug , '$dataset_slug' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $this_dataset_record_data , '$this_dataset_record_data' ) ;

    // =========================================================================
    // Get the name/title of the page that WordPress might have displayed
    // (in response to the page request URL)...
    // =========================================================================

    require_once( $caller_apps_includes_dir . '/wordpress-url-to-page-name-slash-title.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wordpressUtils\
    // wordpress_url_to_page_name_slash_title(
    //      $target_url
    //      )
    // - - - - - - - - - - - - - - - - - - - -
    // Trys to convert the specified request URL to the name/title of the
    // page (in the generic sense), that WordPress has/will display (given
    // that request URL).
    //
    // RETURNS
    //      o   On SUCCESS
    //              $page_name_slash_title STRING
    //
    //      o   On FAILURE
    //              array( $error_message STRING )
    // -------------------------------------------------------------------------

    $page =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wordpressUtils\wordpress_url_to_page_name_slash_title(
            $this_dataset_record_data['full_request_url']
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $page ) ) {
        return $page ;
    }

    // =========================================================================
    // Create and return the column value...
    // =========================================================================

    return <<<EOT
<a  target="_blank"
    href="{$this_dataset_record_data['full_request_url']}"
    style="text-decoration:none"
    >{$page}</a>
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

