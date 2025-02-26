<?php

// *****************************************************************************
// AD-SWAPPER.APP / AD-IMPRESSIONS-RESOURCES.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAdImpressions ;
        //  NOTE!
        //  -----
        //  The dataset name/slug should be camel cased.  Eg:-
        //      projects
        //      referenceUrls
        //      globalLogMessages

// =============================================================================
// get_datetime_column_value()
// =============================================================================

function get_datetime_column_value(
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
    //          [created_server_datetime_utc]       => 1423132755
    //          [last_modified_server_datetime_utc] => 0
    //          [key]                               => 6aad84b5-5afc-4e94-9afe-62387cfc4464-1423132755-25859-1515
    //          [datetime_utc]                      => 1423132755
    //          [ad_sid]                            => 2gkm-czhv
    //          [ad_slot_sid]                       => 18
    //          [page_request_id]                   => 7
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $this_dataset_record_data , '$this_dataset_record_data' ) ;

    if ( ( time() - $this_dataset_record_data['datetime_utc'] ) < 60 ) {
        $seconds = ':s' ;

    } else {
        $seconds = '' ;

    }

    // -------------------------------------------------------------------------

    if ( gmdate( 'G' , $this_dataset_record_data['datetime_utc'] ) > 12 ) {
        $military = '\&\n\b\s\p\;(G:i' . $seconds . ')' ;

    } else {
        $military = '' ;

    }

    // -------------------------------------------------------------------------

    $format = 'D\&\n\b\s\p\; j M Y\&\n\b\s\p\; g:i' . $seconds . 'a' . $military . '\&\n\b\s\p\; e' ;

    // -------------------------------------------------------------------------

    $datetime = gmdate(
                    $format                                         ,
                    $this_dataset_record_data['datetime_utc']
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

    $ago =
        \human_time_diff(
            (int) $this_dataset_record_data['datetime_utc']     ,
            time()
            ) ;

    // -------------------------------------------------------------------------

    return <<<EOT
{$datetime}<br /><b>{$ago} ago</b>
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_ad_column_value()
// =============================================================================

function get_ad_column_value(
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
    //          [created_server_datetime_utc]       => 1423132755
    //          [last_modified_server_datetime_utc] => 0
    //          [key]                               => 6aad84b5-5afc-4e94-9afe-62387cfc4464-1423132755-25859-1515
    //          [datetime_utc]                      => 1423132755
    //          [ad_sid]                            => 2gkm-czhv
    //          [ad_slot_sid]                       => 18
    //          [page_request_id]                   => 7
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $this_dataset_record_data , '$this_dataset_record_data' ) ;

    // =========================================================================
    // Get the Available Ads record...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/shared-resources.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\
    // get_available_ads_record_by_ad_sid(
    //      $all_application_dataset_definitions    ,
    //      $ad_sid                                 ,
    //      &$loaded_datasets   = NULL              ,
    //      &$core_plugapp_dirs = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $available_ads_record ARRAY
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $available_ads_record =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\get_available_ads_record_by_ad_sid(
            $all_application_dataset_definitions    ,
            $this_dataset_record_data['ad_sid']     ,
            $loaded_datasets
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $available_ads_record ) ) {
        return $available_ads_record ;
    }

    // =========================================================================
    // Get the Available Sites record...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\
    // get_available_sites_record_by_ad_sid(
    //      $all_application_dataset_definitions    ,
    //      $site_sid                               ,
    //      &$loaded_datasets   = NULL              ,
    //      &$core_plugapp_dirs = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $available_sites_record ARRAY
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $available_sites_record = FALSE ;

    // -------------------------------------------------------------------------

    if (    array_key_exists( 'ad_swapper_site_sid' , $available_ads_record )
            &&
            trim( $available_ads_record['ad_swapper_site_sid'] ) !== ''
        ) {

        // ---------------------------------------------------------------------

        $available_sites_record =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\get_available_sites_record_by_ad_sid(
                $all_application_dataset_definitions            ,
                $available_ads_record['ad_swapper_site_sid']    ,
                $loaded_datasets
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $available_sites_record ) ) {
            return $available_sites_record ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Create and return the column value...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Site
    // -------------------------------------------------------------------------

    $site = '???' ;

    // -------------------------------------------------------------------------

    if ( is_array( $available_sites_record ) ) {

        // ---------------------------------------------------------------------

        $site_title = FALSE ;

        $home_page_url = FALSE ;

        // ---------------------------------------------------------------------

        if ( trim( $available_sites_record['site_title'] ) !== '' ) {
            $site_title = $available_sites_record['site_title'] ;
        }

        // ---------------------------------------------------------------------

        if ( trim( $available_sites_record['home_page_url'] ) !== '' ) {
            $home_page_url = $available_sites_record['home_page_url'] ;
        }

        // ---------------------------------------------------------------------

        if (    ! is_string( $site_title )
                &&
                is_string( $home_page_url )
            ) {
            $site_title = $home_page_url ;
        }

        // ---------------------------------------------------------------------

        if ( is_string( $site_title ) ) {

            // -----------------------------------------------------------------

            if ( is_string( $home_page_url ) ) {

                $site = <<<EOT
<a  target="_blank"
    href="{$home_page_url}"
    style="text-decoration:none"
    >{$site_title}</a>
EOT;

            } else {

                $site = $site_title ;

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // Ad
    // -------------------------------------------------------------------------

    $ad_image = '&lt;no ad image&gt;' ;

    $ad_link  = '&lt;no ad link&gt;'  ;

    // -------------------------------------------------------------------------

    if ( is_array( $available_ads_record ) ) {

        // ---------------------------------------------------------------------

        $image_url = FALSE ;

        // ---------------------------------------------------------------------

        if ( trim( $available_ads_record['image_url'] ) !== '' ) {
            $image_url = $available_ads_record['image_url'] ;
        }

        // ---------------------------------------------------------------------

        $link_url  = FALSE ;

        // ---------------------------------------------------------------------

        if ( trim( $available_ads_record['link_url'] ) !== '' ) {
            $link_url = $available_ads_record['link_url'] ;
        }

        // ---------------------------------------------------------------------

        if ( is_string( $image_url ) ) {

            // -----------------------------------------------------------------

            $ad_image = <<<EOT
<a  target="_blank"
    href="{$image_url}"
    style="text-decoration:none"
    ><img   border="0"
            src="{$image_url}"
            style="max-width:200px; max-height:100px"
            /></a>
EOT;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        if ( is_string( $link_url ) ) {

            // -----------------------------------------------------------------

            $ad_link = <<<EOT
&rarr; <a  target="_blank"
    href="{$link_url}"
    style="text-decoration:none"
    >{$link_url}</a>
EOT;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    return <<<EOT
{$ad_image}<br />{$ad_link}<br />From Site: {$site}
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

/*
// =============================================================================
// get_ad_slot_column_value()
// =============================================================================

function get_ad_slot_column_value(
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
    //          [created_server_datetime_utc]       => 1423132755
    //          [last_modified_server_datetime_utc] => 0
    //          [key]                               => 6aad84b5-5afc-4e94-9afe-62387cfc4464-1423132755-25859-1515
    //          [datetime_utc]                      => 1423132755
    //          [ad_sid]                            => 2gkm-czhv
    //          [ad_slot_sid]                       => 18
    //          [page_request_id]                   => 7
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $this_dataset_record_data , '$this_dataset_record_data' ) ;

    // =========================================================================
    // Get the Ad Slots record...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/shared-resources.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\
    // get_ad_slots_record_by_ad_slot_sid(
    //      $all_application_dataset_definitions    ,
    //      $ad_slot_sid                            ,
    //      &$loaded_datasets   = NULL              ,
    //      &$core_plugapp_dirs = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $ad_slots_record ARRAY
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $ad_slots_record =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\get_ad_slots_record_by_ad_slot_sid(
            $all_application_dataset_definitions        ,
            $this_dataset_record_data['ad_slot_sid']    ,
            $loaded_datasets
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $ad_slots_record ) ) {
        return $ad_slots_record ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]       => 1423272554
    //                      [last_modified_server_datetime_utc] => 1423272554
    //                      [key]                               => c6886167-8b81-43c4-9bbb-b7391a007356-1423272554-653172-1523
    //                      [local_key]                         => 28aba5f6449b8e71f0b96c80a9156f20c0ca451a36e5483c7653579d6f554485
    //                      [name]                              => right-sidebar
    //                      [title]                             => Right Sidebar
    //                      [description]                       =>
    //                      [width_nominal]                     => 300
    //                      [width_min]                         =>
    //                      [width_max]                         =>
    //                      [height_nominal]                    => 480
    //                      [height_min]                        =>
    //                      [height_max]                        =>
    //                      [sequence_number]                   =>
    //                      [question_disabled]                 =>
    //                      [global_sid]                        => 23mk-hzcw
    //                      )
    //
    // -------------------------------------------------------------------------

    // =========================================================================
    // Create and return the column value...
    // =========================================================================

    $ad_slot_title = '???' ;

    // -------------------------------------------------------------------------

    if (    array_key_exists( 'title' , $ad_slots_record )
            &&
            is_string( $ad_slots_record['title'] )
            &&
            trim( $ad_slots_record['title'] ) !== ''
        ) {

        $ad_slot_title = $ad_slots_record['title'] ;

    } elseif (  array_key_exists( 'name' , $ad_slots_record )
                &&
                is_string( $ad_slots_record['name'] )
                &&
                trim( $ad_slots_record['name'] ) !== ''
        ) {

        $ad_slot_title =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_title(
                $ad_slots_record['name']
                ) ;

    }

    // -------------------------------------------------------------------------

    return $ad_slot_title ;

    // =========================================================================
    // That's that!
    // =========================================================================

}
*/

// =============================================================================
// get_page_and_ad_slot_column_value()
// =============================================================================

function get_page_and_ad_slot_column_value(
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
    //          [created_server_datetime_utc]       => 1423132755
    //          [last_modified_server_datetime_utc] => 0
    //          [key]                               => 6aad84b5-5afc-4e94-9afe-62387cfc4464-1423132755-25859-1515
    //          [datetime_utc]                      => 1423132755
    //          [ad_sid]                            => 2gkm-czhv
    //          [ad_slot_sid]                       => 18
    //          [page_request_id]                   => 7
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $this_dataset_record_data , '$this_dataset_record_data' ) ;

    // =========================================================================
    // Error checking...
    // =========================================================================

    if (    ! \array_key_exists( 'page_request_id' , $this_dataset_record_data )
            ||
            \trim( $this_dataset_record_data['page_request_id'] ) === ''
            ||
            ! \ctype_digit( (string) $this_dataset_record_data['page_request_id'] )
            ||
            $this_dataset_record_data['page_request_id'] < 1
        ) {
        return '???' ;
    }

    // =========================================================================
    // Get the Ad Slot's "Page Requests" record...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/shared-resources.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\
    // get_page_requests_record_by_page_request_id(
    //      $all_application_dataset_definitions    ,
    //      $page_request_id                        ,
    //      $core_plugapp_dirs = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // NOTE!
    // =====
    // "Page Requests" are stored in a MySQL table (not array storage).
    //
    // RETURNS
    //      On SUCCESS
    //          o   array(
    //                  $core_plugapp_dirs              STRING          ,
    //                  $page_requests_mysql_table_name STRING          ,
    //                  $page_requests_record           ARRAY/FALSE
    //                  )
    //              Where $page_requests_record is one of:-
    //                  --  ARRAY (if page request found)
    //                  --  FALSE (if page request NOT found)
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $core_plugapp_dirs = NULL ;

    // -------------------------------------------------------------------------

    $result =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\get_page_requests_record_by_page_request_id(
            $all_application_dataset_definitions            ,
            $this_dataset_record_data['page_request_id']    ,
            $core_plugapp_dirs
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return array( $result ) ;
    }

    // -------------------------------------------------------------------------

    list(
        $core_plugapp_dirs                  ,
        $page_requests_mysql_table_name     ,
        $page_requests_record
        ) = $result ;

    // -------------------------------------------------------------------------

    if ( $result === FALSE ) {
        return '???' ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $page_requests_record = Array(
    //          [id]                                => 14
    //          [created_server_datetime]           => 0000-00-00 00:00:00
    //          [last_modified_server_datetime]     => 2015-02-07 19:01:01
    //          [created_server_datetime_utc]       => 0
    //          [last_modified_server_datetime_utc] => 0
    //          [php_time]                          => 1423288861
    //          [php_microtime]                     => 0.97445100 1423288861
    //          [request_time]                      => 1423288861
    //          [request_time_float]                =>
    //          [request_uri]                       => /plugdev/
    //          [full_request_url]                  => http://localhost/plugdev/
    //          [asadid]                            =>
    //          [http_referer]                      => http://localhost/...&orderby=datetime_utc&order=desc
    //          [remote_addr]                       => 127.0.0.1
    //          [http_user_agent]                   => Mozilla/5.0 (X11;...Firefox/35.0
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $page_requests_record , '$page_requests_record' ) ;

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
            $page_requests_record['full_request_url']
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $page ) ) {
        return $page ;
    }

    // =========================================================================
    // Get the Ad Slots record...
    // =========================================================================

//  require_once( dirname( __FILE__ ) . '/shared-resources.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\
    // get_ad_slots_record_by_ad_slot_sid(
    //      $all_application_dataset_definitions    ,
    //      $ad_slot_sid                            ,
    //      &$loaded_datasets   = NULL              ,
    //      &$core_plugapp_dirs = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $ad_slots_record ARRAY
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $ad_slots_record =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sharedResources\get_ad_slots_record_by_ad_slot_sid(
            $all_application_dataset_definitions        ,
            $this_dataset_record_data['ad_slot_sid']    ,
            $loaded_datasets
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $ad_slots_record ) ) {
        return $ad_slots_record ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]       => 1423272554
    //                      [last_modified_server_datetime_utc] => 1423272554
    //                      [key]                               => c6886167-8b81-43c4-9bbb-b7391a007356-1423272554-653172-1523
    //                      [local_key]                         => 28aba5f6449b8e71f0b96c80a9156f20c0ca451a36e5483c7653579d6f554485
    //                      [name]                              => right-sidebar
    //                      [title]                             => Right Sidebar
    //                      [description]                       =>
    //                      [width_nominal]                     => 300
    //                      [width_min]                         =>
    //                      [width_max]                         =>
    //                      [height_nominal]                    => 480
    //                      [height_min]                        =>
    //                      [height_max]                        =>
    //                      [sequence_number]                   =>
    //                      [question_disabled]                 =>
    //                      [global_sid]                        => 23mk-hzcw
    //                      )
    //
    // -------------------------------------------------------------------------

    $ad_slot_title = '???' ;

    // -------------------------------------------------------------------------

    if (    array_key_exists( 'title' , $ad_slots_record )
            &&
            is_string( $ad_slots_record['title'] )
            &&
            trim( $ad_slots_record['title'] ) !== ''
        ) {

        $ad_slot_title = $ad_slots_record['title'] ;

    } elseif (  array_key_exists( 'name' , $ad_slots_record )
                &&
                is_string( $ad_slots_record['name'] )
                &&
                trim( $ad_slots_record['name'] ) !== ''
        ) {

        $ad_slot_title =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_title(
                $ad_slots_record['name']
                ) ;

    }

    // =========================================================================
    // Create and return the column value...
    // =========================================================================

    return <<<EOT
<a  target="_blank"
    href="{$page_requests_record['full_request_url']}"
    style="text-decoration:none"
    >{$page}</a> &rarr; {$ad_slot_title}
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

