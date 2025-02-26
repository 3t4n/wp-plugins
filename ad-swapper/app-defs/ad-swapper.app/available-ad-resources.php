<?php

// *****************************************************************************
// AD-SWAPPER.APP / AD-SWAPPER-AVAILABLE-AD-RESOURCES.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableAds ;

// =============================================================================
// get_width_x_height_column_value()
// =============================================================================

function get_width_x_height_column_value(
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

    // =========================================================================
    // Get the image URL...
    // =========================================================================

    $image_url = $this_dataset_record_data['image_url'] ;

    // -------------------------------------------------------------------------

    if ( trim( $image_url ) === '' ) {
        return '' ;
    }

    // =========================================================================
    // Get the image's height and width...
    // =========================================================================

    // -------------------------------------------------------------------------
    // array getimagesize ( string $filename [, array &$imageinfo ] )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // The getimagesize() function will determine the size of any given image
    // file and return the dimensions along with the file type and a
    // height/width text string to be used inside a normal HTML IMG tag and the
    // correspondant HTTP content type.
    //
    // getimagesize() can also return some more information in imageinfo
    // parameter.
    //
    // Note:    Note that JPC and JP2 are capable of having components with
    //          different bit depths. In this case, the value for "bits" is the
    //          highest bit depth encountered. Also, JP2 files may contain
    //          multiple JPEG 2000 codestreams. In this case, getimagesize()
    //          returns the values for the first codestream it encounters in the
    //          root of the file.
    //
    // Note:    The information about icons are retrieved from the icon with the
    //          highest bitrate.
    //
    //      filename
    //          This parameter specifies the file you wish to retrieve
    //          information about. It can reference a local file or
    //          (configuration permitting) a remote file using one of the
    //          supported streams.
    //
    //      imageinfo
    //          This optional parameter allows you to extract some extended
    //          information from the image file. Currently, this will return the
    //          different JPG APP markers as an associative array. Some programs
    //          use these APP markers to embed text information in images. A
    //          very common one is to embed » IPTC information in the APP13
    //          marker. You can use the iptcparse() function to parse the binary
    //          APP13 marker into something readable.
    //
    // RETURN VALUES
    //
    // Returns an array with up to 7 elements. Not all image types will include
    // the channels and bits elements.
    //
    //      Index 0 and 1 contains respectively the width and the height of the
    //      image.
    //
    //          Note:   Some formats may contain no image or may contain
    //                  multiple images. In these cases, getimagesize() might
    //                  not be able to properly determine the image size.
    //                  getimagesize() will return zero for width and height in
    //                  these cases.
    //
    //      Index 2 is one of the IMAGETYPE_XXX constants indicating the type of
    //      the image.
    //
    //      Index 3 is a text string with the correct height="yyy" width="xxx"
    //      string that can be used directly in an IMG tag.
    //
    //      mime is the correspondant MIME type of the image. This information
    //      can be used to deliver images with the correct HTTP Content-type
    //      header:
    //
    //      channels will be 3 for RGB pictures and 4 for CMYK pictures.
    //
    //      bits is the number of bits for each color.
    //
    // For some image types, the presence of channels and bits values can be a
    // bit confusing. As an example, GIF always uses 3 channels per pixel, but
    // the number of bits per pixel cannot be calculated for an animated GIF
    // with a global color table.
    //
    // On failure, FALSE is returned.
    //
    //  (PHP 4, PHP 5)
    //
    // ERRORS/EXCEPTIONS
    //      If accessing the filename image is impossible getimagesize() will
    //      generate an error of level E_WARNING. On read error, getimagesize()
    //      will generate an error of level E_NOTICE.
    // -------------------------------------------------------------------------

    $imagesize = \getimagesize( $image_url ) ;

    // -------------------------------------------------------------------------

    if ( ! is_array( $imagesize ) ) {
        return '???' ;
    }

    // -------------------------------------------------------------------------

    return <<<EOT
{$imagesize[0]} x {$imagesize[1]}
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_site_column_value()
// =============================================================================

function get_site_column_value(
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

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $loaded_datasets ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $this_dataset_record_data = Array(
    //          [created_server_datetime_utc]       => 1421569635
    //          [last_modified_server_datetime_utc] => 1421569635
    //          [key]                               => cfe6de47-5c12-4397-b9f6-61af9d6fd1d5-1421569635-787371-1425
    //          [global_sid]                        => ncgh-vzkm
    //          [ad_swapper_site_sid]               => 2kcv-gwhz
    //          [image_url]                         => http://localhost/plugdev/wp-content/uploads/2014/06/rookie-mag-postcards-from-wonderland.jpeg
    //          [link_url]                          => http://www.google.co.nz
    //          [alt_text]                          =>
    //          [description]                       =>
    //          [start_datetime]                    =>
    //          [end_datetime]                      =>
    //          [aspect_ratio_min]                  =>
    //          [aspect_ratio_max]                  =>
    //          [sequence_number]                   =>
    //          [question_display]                  => 1
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $this_dataset_record_data , '$this_dataset_record_data' ) ;

    // =========================================================================
    // Load the "Available Sites" (unless they're already loaded)...
    // =========================================================================

    $available_sites_dataset_slug = 'ad_swapper_available_sites' ;

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $available_sites_dataset_slug , $loaded_datasets ) ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_dataset_title_records_key_field_slug_and_record_indices_by_key(
        //      $all_application_dataset_definitions    ,
        //      $dataset_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      o   On SUCCESS
        //              ARRAY(
        //                  $dataset_title                  STRING
        //                  $dataset_records                ARRAY
        //                  $array_storage_key_field_slug   STRING
        //                  $record_indices_by_key          ARRAY
        //                  )
        //
        //      o   On FAILURE
        //              $error_message STRING
        // -------------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_dataset_title_records_key_field_slug_and_record_indices_by_key(
                $all_application_dataset_definitions    ,
                $available_sites_dataset_slug
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return array( $result ) ;
        }

        // ---------------------------------------------------------------------

        list(
            $loaded_datasets[ $available_sites_dataset_slug ]['title']                  ,
            $loaded_datasets[ $available_sites_dataset_slug ]['records']                ,
            $loaded_datasets[ $available_sites_dataset_slug ]['key_field_slug']         ,
            $loaded_datasets[ $available_sites_dataset_slug ]['record_indices_by_key']
            ) = $result ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Get the site record...
    // =========================================================================

    $site_record = NULL ;

    // -------------------------------------------------------------------------

    foreach ( $loaded_datasets[ $available_sites_dataset_slug ]['records'] as $this_record ) {

        if ( $this_record['ad_swapper_site_sid'] === $this_dataset_record_data['ad_swapper_site_sid'] ) {
            $site_record = $this_record ;
            break ;
        }

    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $site_record = Array(
    //          [created_server_datetime_utc]                   => 1421545408
    //          [last_modified_server_datetime_utc]             => 1421545408
    //          [key]                                           => 10906d4d-6d60-4e39-b201-9bf2b52f4347-1421545408-370125-1421
    //          [ad_swapper_site_sid]                           => 2kcv-gwhz
    //          [site_title]                                    => Plugdev
    //          [home_page_url]                                 => http://localhost/plugdev
    //          [general_description]                           =>
    //          [ads_wanted_description]                        =>
    //          [sites_wanted_description]                      =>
    //          [categories_available]                          =>
    //          [categories_wanted]                             =>
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $site_record , '$site_record' ) ;

    // =========================================================================
    // Load the "Site Specific Settings" (unless they're already loaded)...
    // =========================================================================

    $site_specific_settings_dataset_slug = 'ad_swapper_other_site_specific_settings' ;

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $site_specific_settings_dataset_slug , $loaded_datasets ) ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_dataset_title_records_key_field_slug_and_record_indices_by_key(
        //      $all_application_dataset_definitions    ,
        //      $dataset_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      o   On SUCCESS
        //              ARRAY(
        //                  $dataset_title                  STRING
        //                  $dataset_records                ARRAY
        //                  $array_storage_key_field_slug   STRING
        //                  $record_indices_by_key          ARRAY
        //                  )
        //
        //      o   On FAILURE
        //              $error_message STRING
        // -------------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_dataset_title_records_key_field_slug_and_record_indices_by_key(
                $all_application_dataset_definitions    ,
                $site_specific_settings_dataset_slug
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return array( $result ) ;
        }

        // ---------------------------------------------------------------------

        list(
            $loaded_datasets[ $site_specific_settings_dataset_slug ]['title']                  ,
            $loaded_datasets[ $site_specific_settings_dataset_slug ]['records']                ,
            $loaded_datasets[ $site_specific_settings_dataset_slug ]['key_field_slug']         ,
            $loaded_datasets[ $site_specific_settings_dataset_slug ]['record_indices_by_key']
            ) = $result ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Get the site specific settings record...
    // =========================================================================

    $site_specific_settings_record = NULL ;

    // -------------------------------------------------------------------------

    foreach ( $loaded_datasets[ $site_specific_settings_dataset_slug ]['records'] as $this_record ) {

        if ( $this_record['ad_swapper_site_sid'] === $this_dataset_record_data['ad_swapper_site_sid'] ) {
            $site_specific_settings_record = $this_record ;
            break ;
        }

    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $site_specific_settings_record = Array(
    //          [created_server_datetime_utc]                  => 1446798206
    //          [last_modified_server_datetime_utc]            => 1446798206
    //          [key]                                          => 83d10f9a-13c0-46fd-bdc6-948f0d6be5b6-1446798205-969982-5107
    //          [ad_swapper_site_sid]                          => 2kmv-hzgc
    //          [question_display_your_ads_on_this_site]       => 1
    //          [question_display_this_sites_ads_on_your_site] => 1
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $site_specific_settings_record , '$site_specific_settings_record' ) ;

    // =========================================================================
    // Create and return the column value...
    // =========================================================================

    if (    is_array( $site_specific_settings_record )
            &&
            $site_specific_settings_record['question_display_this_sites_ads_on_your_site'] !== TRUE
        ) {

        $site_disabled = <<<EOT
<br /><span style="color:#AA0000; font-style:italic">(not approved by you)</span>
EOT;

    } else {

        $site_disabled = '' ;

    }

    // -------------------------------------------------------------------------

    if ( $site_record === NULL ) {

        return <<<EOT
{$this_dataset_record_data['ad_swapper_site_sid']} {$site_disabled}
EOT;

    } else {

        return <<<EOT
{$site_record['site_title']}<br /><a
    target="_blank"
    href="{$site_record['home_page_url']}"
    style="text-decoration:none"
    >{$site_record['home_page_url']}</a> {$site_disabled}
EOT;

    }

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_aspect_ratio_column_value()
// =============================================================================

function get_aspect_ratio_column_value(
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

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $loaded_datasets ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $this_dataset_record_data = Array(
    //          [created_server_datetime_utc]       => 1421569635
    //          [last_modified_server_datetime_utc] => 1421569635
    //          [key]                               => cfe6de47-5c12-4397-b9f6-61af9d6fd1d5-1421569635-787371-1425
    //          [global_sid]                        => ncgh-vzkm
    //          [ad_swapper_site_sid]               => 2kcv-gwhz
    //          [image_url]                         => http://localhost/plugdev/wp-content/uploads/2014/06/rookie-mag-postcards-from-wonderland.jpeg
    //          [link_url]                          => http://www.google.co.nz
    //          [alt_text]                          =>
    //          [description]                       =>
    //          [start_datetime]                    =>
    //          [end_datetime]                      =>
    //          [aspect_ratio_min]                  =>
    //          [aspect_ratio_max]                  =>
    //          [sequence_number]                   =>
    //          [question_display]                  => 1
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $this_dataset_record_data , '$this_dataset_record_data' ) ;

    // -------------------------------------------------------------------------

    if ( trim( $this_dataset_record_data['aspect_ratio_min'] ) === '' ) {
        $aspect_ratio_min = 1 ;

    } else {
        $aspect_ratio_min = $this_dataset_record_data['aspect_ratio_min'] ;

    }

    // -------------------------------------------------------------------------

    if ( trim( $this_dataset_record_data['aspect_ratio_max'] ) === '' ) {
        $aspect_ratio_max = 1 ;

    } else {
        $aspect_ratio_max = $this_dataset_record_data['aspect_ratio_max'] ;

    }

    // -------------------------------------------------------------------------

    return <<<EOT
{$aspect_ratio_min}-{$aspect_ratio_max}
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_question_display_column_value()
// =============================================================================

function get_question_display_column_value(
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

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $loaded_datasets ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $this_dataset_record_data = Array(
    //          [created_server_datetime_utc]       => 1421569635
    //          [last_modified_server_datetime_utc] => 1421569635
    //          [key]                               => cfe6de47-5c12-4397-b9f6-61af9d6fd1d5-1421569635-787371-1425
    //          [global_sid]                        => ncgh-vzkm
    //          [ad_swapper_site_sid]               => 2kcv-gwhz
    //          [image_url]                         => http://localhost/plugdev/wp-content/uploads/2014/06/rookie-mag-postcards-from-wonderland.jpeg
    //          [link_url]                          => http://www.google.co.nz
    //          [alt_text]                          =>
    //          [description]                       =>
    //          [start_datetime]                    =>
    //          [end_datetime]                      =>
    //          [aspect_ratio_min]                  =>
    //          [aspect_ratio_max]                  =>
    //          [sequence_number]                   =>
    //          [question_display]                  => 1
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $this_dataset_record_data , '$this_dataset_record_data' ) ;

    // =========================================================================
    // NO ?
    // =========================================================================

    if ( ! $this_dataset_record_data['question_display'] ) {

        return <<<EOT
<span style="color:#AA0000">no</span>
EOT;

    }

    // =========================================================================
    // Load the "Site Specific Settings" (unless they're already loaded)...
    // =========================================================================

    $site_specific_settings_dataset_slug = 'ad_swapper_other_site_specific_settings' ;

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( $site_specific_settings_dataset_slug , $loaded_datasets ) ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_dataset_title_records_key_field_slug_and_record_indices_by_key(
        //      $all_application_dataset_definitions    ,
        //      $dataset_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      o   On SUCCESS
        //              ARRAY(
        //                  $dataset_title                  STRING
        //                  $dataset_records                ARRAY
        //                  $array_storage_key_field_slug   STRING
        //                  $record_indices_by_key          ARRAY
        //                  )
        //
        //      o   On FAILURE
        //              $error_message STRING
        // -------------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_dataset_title_records_key_field_slug_and_record_indices_by_key(
                $all_application_dataset_definitions    ,
                $site_specific_settings_dataset_slug
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return array( $result ) ;
        }

        // ---------------------------------------------------------------------

        list(
            $loaded_datasets[ $site_specific_settings_dataset_slug ]['title']                  ,
            $loaded_datasets[ $site_specific_settings_dataset_slug ]['records']                ,
            $loaded_datasets[ $site_specific_settings_dataset_slug ]['key_field_slug']         ,
            $loaded_datasets[ $site_specific_settings_dataset_slug ]['record_indices_by_key']
            ) = $result ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Get the site record...
    // =========================================================================

    $site_specific_settings_record = NULL ;

    // -------------------------------------------------------------------------

    foreach ( $loaded_datasets[ $site_specific_settings_dataset_slug ]['records'] as $this_record ) {

        if ( $this_record['ad_swapper_site_sid'] === $this_dataset_record_data['ad_swapper_site_sid'] ) {
            $site_specific_settings_record = $this_record ;
            break ;
        }

    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $site_specific_settings_record = Array(
    //          [created_server_datetime_utc]                  => 1446798206
    //          [last_modified_server_datetime_utc]            => 1446798206
    //          [key]                                          => 83d10f9a-13c0-46fd-bdc6-948f0d6be5b6-1446798205-969982-5107
    //          [ad_swapper_site_sid]                          => 2kmv-hzgc
    //          [question_display_your_ads_on_this_site]       => 1
    //          [question_display_this_sites_ads_on_your_site] => 1
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $site_specific_settings_record , '$site_specific_settings_record' ) ;

    // =========================================================================
    // Create and return the column value...
    // =========================================================================

    if ( $site_specific_settings_record['question_display_this_sites_ads_on_your_site'] ) {

        return <<<EOT
<span style="color:#008000; font-weight:bold">YES</span>
EOT;

    } else {

        return <<<EOT
<span style="color:#008000; text-decoration:line-through">yes</span>
<span style="color:#AA0000; font-weight:bold">NO</span>
<i>(the ad is enabled, but the site isn't)</i>
EOT;

    }

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_question_display_this_ad_help_text()
// =============================================================================

function get_question_display_this_ad_help_text(
    $core_plugapp_dirs                      ,
    $all_application_dataset_definitions    ,
    $question_front_end                     ,
    $dataset_slug                           ,
    $selected_datasets_dmdd                 ,
    $dataset_title                          ,
    $dataset_records                        ,
    $record_indices_by_key                  ,
    $form_slug_underscored                  ,
    $question_adding                        ,
    $zebra_form_field_number                ,
    $zebra_form_field_details               ,
    $the_record                             ,
    $the_records_index                      ,
    $extra_args
    ) {

    // -------------------------------------------------------------------------
    // <get_field_specific_help_text_function>(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $question_front_end                     ,
    //      $dataset_slug                           ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_title                          ,
    //      $dataset_records                        ,
    //      $record_indices_by_key                  ,
    //      $form_slug_underscored                  ,
    //      $question_adding                        ,
    //      $zebra_form_field_number                ,
    //      $zebra_form_field_details               ,
    //      $the_record                             ,
    //      $the_records_index                      ,
    //      $extra_args
    //      ) {
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $help_text STRING
    //
    //      On FAILURE
    //          ARRAY( $error message STRING )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $the_record = Array(
    //          [created_server_datetime_utc]       => 1421569635
    //          [last_modified_server_datetime_utc] => 1421569635
    //          [key]                               => cfe6de47-5c12-4397-b9f6-61af9d6fd1d5-1421569635-787371-1425
    //          [global_sid]                        => ncgh-vzkm
    //          [ad_swapper_site_sid]               => 2kcv-gwhz
    //          [image_url]                         => http://localhost/plugdev/wp-content/uploads/2014/06/rookie-mag-postcards-from-wonderland.jpeg
    //          [link_url]                          => http://www.google.co.nz
    //          [alt_text]                          =>
    //          [description]                       =>
    //          [start_datetime]                    =>
    //          [end_datetime]                      =>
    //          [aspect_ratio_min]                  =>
    //          [aspect_ratio_max]                  =>
    //          [sequence_number]                   =>
    //          [question_display]                  => 1
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $the_record ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $extra_args ) ;

    // =========================================================================
    // GET the "Toggle Available Ads" URL...
    // =========================================================================

    require_once(
        dirname( __FILE__ ) .
        '/plugin.stuff/extras/toggle-available-ads/get-toggle-available-ad-url.php'
        ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_toggleAvailableAds\
    // get_toggle_available_ad_url(
    //      $core_plugapp_dirs      ,
    //      $site_record            ,
    //      $direction
    //      )
    // - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $toggle_available_ad_url STRING
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    $url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_toggleAvailableAds\get_toggle_available_ad_url(
            $core_plugapp_dirs      ,
            $the_record
            ) ;

    // =========================================================================
    // Create and return the help text...
    // =========================================================================

    if ( $the_record['question_display'] ) {
        $currently = 'YES' ;
        $change_to = 'NO' ;

    } else {
        $currently = 'NO' ;
        $change_to = 'YES' ;

    }

    // ---------------------------------------------------------------------

    return <<<EOT
Currently <b>{$currently}</b><br /><a
    href="{$url}"
    style="text-decoration:none; border-bottom:1px dashed #005C80; color:#005C80"
    >change to {$change_to}</a> &nbsp; <i>(clicking the checkbox below WON'T work)</i>
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_custom_add_edit_record_page_header()
// =============================================================================

function get_custom_add_edit_record_page_header(
    $core_plugapp_dirs                      ,
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_slug                           ,
    $dataset_title                          ,
    $dataset_records                        ,
    $key_field_slug                         ,
    $record_indices_by_key                  ,
    $question_front_end                     ,
    $question_adding                        ,
    $form_slug_underscored                  ,
    $zebra_form_def
    ) {

    // -------------------------------------------------------------------------
    // <dataset_specific_get_custom_add_edit_record_page_header>(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_slug                           ,
    //      $dataset_title                          ,
    //      $dataset_records                        ,
    //      $key_field_slug                         ,
    //      $record_indices_by_key                  ,
    //      $question_front_end                     ,
    //      $question_adding                        ,
    //      $form_slug_underscored                  ,
    //      $zebra_form_def
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the HTML for a custom header to go at the top of the
    // add/edit record page.
    //
    // RETURNS
    //      On SUCCESS
    //          $header_html STRING
    //
    //      On FAILURE
    //          array( $error_message STRING )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $_GET = Array(
    //                  [page]          => pluginPlant
    //                  [action]        => edit-record
    //                  [application]   => ad-swapper-central
    //                  [dataset_slug]  => ad_swapper_central_sites
    //                  [record_key]    => 504bb6b0-71c7-4515-a8dd-3f7c824a1030-1417766397-355167-1274
    //                  )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_GET , '$_GET' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_POST , '$_POST' ) ;

    // =========================================================================
    // Record specified (only if editing)...
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
    // Get the image HTML...
    // =========================================================================

    $this_record =
        $dataset_records[
            $record_indices_by_key[ $_GET['record_key'] ]
            ] ;

    // -------------------------------------------------------------------------

    if ( trim( $this_record['image_url'] ) === '' ) {
        return '' ;
    }

    // -------------------------------------------------------------------------
    // array getimagesize ( string $filename [, array &$imageinfo ] )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // The getimagesize() function will determine the size of any given image
    // file and return the dimensions along with the file type and a
    // height/width text string to be used inside a normal HTML IMG tag and the
    // correspondant HTTP content type.
    //
    // getimagesize() can also return some more information in imageinfo
    // parameter.
    //
    // Note: Note that JPC and JP2 are capable of having components with
    //       different bit depths. In this case, the value for "bits" is the
    //       highest bit depth encountered. Also, JP2 files may contain multiple
    //       JPEG 2000 codestreams. In this case, getimagesize() returns the
    //       values for the first codestream it encounters in the root of the
    //       file.
    //
    // Note: The information about icons are retrieved from the icon with the
    //       highest bitrate.
    //
    //      filename
    //          This parameter specifies the file you wish to retrieve
    //          information about. It can reference a local file or
    //          (configuration permitting) a remote file using one of the
    //          supported streams.
    //
    //      imageinfo
    //          This optional parameter allows you to extract some extended
    //          information from the image file. Currently, this will return the
    //          different JPG APP markers as an associative array. Some programs
    //          use these APP markers to embed text information in images. A
    //          very common one is to embed IPTC information in the APP13
    //          marker. You can use the iptcparse() function to parse the binary
    //          APP13 marker into something readable.
    //
    // Returns an array with up to 7 elements. Not all image types will include
    // the channels and bits elements.
    //
    //      Index 0 and 1 contains respectively the width and the height of the
    //      image.
    //
    //          Note: Some formats may contain no image or may contain multiple
    //                images. In these cases, getimagesize() might not be able
    //                to properly determine the image size. getimagesize() will
    //                return zero for width and height in these cases.
    //
    //      Index 2 is one of the IMAGETYPE_XXX constants indicating the type of
    //      the image.
    //
    //      Index 3 is a text string with the correct height="yyy" width="xxx"
    //      string that can be used directly in an IMG tag.
    //
    //      mime is the correspondant MIME type of the image. This information
    //      can be used to deliver images with the correct HTTP Content-type
    //      header:
    //
    //      channels will be 3 for RGB pictures and 4 for CMYK pictures.
    //
    //      bits is the number of bits for each color.
    //
    // For some image types, the presence of channels and bits values can be a
    // bit confusing. As an example, GIF always uses 3 channels per pixel, but
    // the number of bits per pixel cannot be calculated for an animated GIF
    // with a global color table.
    //
    // On failure, FALSE is returned.
    //
    // ERRORS/EXCEPTIONS
    //      If accessing the filename image is impossible getimagesize() will
    //      generate an error of level E_WARNING. On read error, getimagesize()
    //      will generate an error of level E_NOTICE.
    //
    // (PHP 4, PHP 5, PHP 7)
    //
    // CHANGELOG
    //
    //      --------------------------------------------------------------------
    //      Version     Description
    //      -------     --------------------------------------------------------
    //      5.3.0       Added icon support.
    //      5.2.3       Read errors generated by this function downgraded to
    //                  E_NOTICE from E_WARNING.
    //      4.3.2       Support for JPC, JP2, JPX, JB2, XBM, and WBMP became
    //                  available.
    //      4.3.2       JPEG 2000 support was added for the imageinfo parameter.
    //      4.3.0       bits and channels are present for other image types,
    //                  too.
    //      4.3.0       Support for SWC and IFF was added.
    //      4.2.0       Support for TIFF was added.
    //      4.0.6       Support for BMP and PSD was added.
    //      --------------------------------------------------------------------
    //
    // -------------------------------------------------------------------------

    $imagesize = getimagesize( $this_record['image_url'] ) ;

    // ---------------------------------------------------------------------

    if ( $imagesize === FALSE ) {

        return <<<EOT
<div style="background-color:#FFF0F0;border:1px solid #AA0000;color:#AA0000;padding:0.3em 1em">
    WARNING!&nbsp; The "image_url" doesn't seem to point to a valid image!
</div>
EOT;

    }

    // ---------------------------------------------------------------------

    if (    ! in_array(
                    $imagesize[2]                                               ,
                    array( IMAGETYPE_JPEG , IMAGETYPE_PNG , IMAGETYPE_GIF )     ,
                    TRUE
                    )
        ) {

        return <<<EOT
<div style="background-color:#FFF0F0;border:1px solid #AA0000;color:#AA0000;padding:0.3em 1em">
    WARNING!&nbsp; Ad Swapper ads - to be displayed in other browsers - must be GIF, JPEG or PNG images only.
</div>
EOT;
            //  Not JPEG, GIF or PNG

    }

    // ---------------------------------------------------------------------
    // Get the raw image size and aspect ratio...
    // ---------------------------------------------------------------------

    $raw_image_width_px  = $imagesize[0] ;
    $raw_image_height_px = $imagesize[1] ;

    // -------------------------------------------------------------------------

    $raw_image_aspect_ratio = $raw_image_width_px / $raw_image_height_px ;

    // -------------------------------------------------------------------------

    if ( $raw_image_height_px >= 150 ) {
        $img_height = 150 ;

    } else {
        $img_height = $raw_image_height_px ;

    }

    // -------------------------------------------------------------------------

    $raw_image_aspect_ratio = round( $raw_image_aspect_ratio , 2 ) ;

    // -------------------------------------------------------------------------

    $width_x_height = <<<EOT
<div>
    <b>{$raw_image_width_px}</b> x <b>{$raw_image_height_px}</b>&nbsp; (width x height)
    &nbsp;&nbsp;&nbsp;&nbsp; &mdash; &nbsp;&nbsp;&nbsp;&nbsp;
    Aspect Ratio (width / height):&nbsp; <b>{$raw_image_aspect_ratio}</b>
</div>
EOT;

    // -------------------------------------------------------------------------

    $image_html = <<<EOT
<div style="margin:0.5em 0; padding-left:5em">
    <a  href="{$this_record['image_url']}"
        style="text-decoration:none"
        ><img
            border="0"
            height="{$img_height}"
            src="{$this_record['image_url']}"
            /></a>{$width_x_height}</div>
EOT;

    // =========================================================================
    // Get the "Next/Prev" butons toolbar HTML...
    // =========================================================================

    require_once( $core_plugapp_dirs['dataset_manager_includes_dir'] . '/next-prev-record-toolbar-support.php' ) ;

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

    $next_prev_record_toolbar_html =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_next_prev_record_toolbar_html(
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
            ) ;

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return <<<EOT
<div style="margin:0.5em 0 1.5em 0.5em; width:96%; text-align:center; border:1px solid #0066CC">{$next_prev_record_toolbar_html}</div>
{$image_html}
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// custom_get_filter_titles_by_value_function()
// =============================================================================

function custom_get_filter_titles_by_value_function(
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
    ) {

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

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableAds\
    // get_record_counts_by_filter_value(
    //      $core_plugapp_dirs      ,
    //      $dataset_records        ,
    //      $dataset_slug           ,
    //      $dataset_title
    //      )
    // - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          ARRAY $record_counts_by_filter_value = array(
    //                      'all'               =>  G   ,
    //                      'vetted'            =>  H   ,
    //                      'unvetted'          =>  I   ,
    //                      'manually-approved' =>  J   ,
    //                      'manually-rejected' =>  K   ,
    //                      'default-approved'  =>  L   ,
    //                      'default-rejected'  =>  M   ,
    //                      'all-approved'      =>  N   ,
    //                      'all-rejected'      =>  O
    //                      ) ;
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $record_counts_by_filter_value =
        get_record_counts_by_filter_value(
            $core_plugapp_dirs  ,
            $dataset_records    ,
            $dataset_slug       ,
            $dataset_title
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $record_counts_by_filter_value ) ) {
        return $record_counts_by_filter_value ;
    }

    // -------------------------------------------------------------------------

    foreach ( $record_counts_by_filter_value as $filter_value => $record_count ) {

        if ( $record_count === 0 ) {
            $record_counts_by_filter_value[ $filter_value ] = 'none' ;
                //  "0" to "none"
        }

    }

    // -------------------------------------------------------------------------

    $rcbfv = $record_counts_by_filter_value ;

    // -------------------------------------------------------------------------

    return array(
                'all'               =>  'All ('                 . $rcbfv['all']                 . ')'   ,
                'vetted'            =>  'Vetted ('              . $rcbfv['vetted']              . ')'   ,
                'unvetted'          =>  'UnVetted ('            . $rcbfv['unvetted']            . ')'   ,
                'manually-approved' =>  'Manually Approved ('   . $rcbfv['manually-approved']   . ')'   ,
                'manually-rejected' =>  'Manually Rejected ('   . $rcbfv['manually-rejected']   . ')'   ,
                'default-approved'  =>  'Default Approved ('    . $rcbfv['default-approved']    . ')'   ,
                'default-rejected'  =>  'Default Rejected ('    . $rcbfv['default-rejected']    . ')'   ,
                'all-approved'      =>  'All Approved ('        . $rcbfv['all-approved']        . ')'   ,
                'all-rejected'      =>  'All Rejected ('        . $rcbfv['all-rejected']        . ')'   ,
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_help_html_4_filtering()
// =============================================================================

function get_help_html_4_filtering(
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
    ) {

    // -------------------------------------------------------------------------
    // <get_help_html_function>(
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

    $container_div_style = <<<EOT
background-color:#F7FFF7; color:#006000; padding:0.5em 1em
EOT;

    // -------------------------------------------------------------------------

    $h6_style = <<<EOT
margin:10px 0 0 0; font-size:133%
EOT;

    // -------------------------------------------------------------------------

    $p_style = <<<EOT
margin:10px 0
EOT;

    // -------------------------------------------------------------------------

    $dl_style = <<<EOT
margin:0 0 0 1.5em
EOT;

    // -------------------------------------------------------------------------

    $dt_style = <<<EOT
font-size:117%; font-weight:bold
EOT;

    // -------------------------------------------------------------------------

    $dd_style = <<<EOT
margin-left:1.5em
EOT;

    // -------------------------------------------------------------------------



    return <<<EOT
<div style="{$container_div_style}">

    <h6 style="{$h6_style}">HELP:&nbsp; Which Ads Do You Want To Show ?</h6>

    <p style="{$p_style}">Please choose one of the following (from the dropdown
    above):-</p>

    <dl style="{$dl_style}">

        <dt style="{$dt_style}">All</dt>

<dd style="{$dd_style}">
Displays ALL the ads that are currently available (for display on YOUR site).
</dd>

        <dt style="{$dt_style}">Vetted</dt>

<dd style="{$dd_style}">
Displays the ads that you've already "VETTED".&nbsp; In other words, you've
viewed the ad - and possibly (but not necessarily,) accepted or rejected it.
</dd>

        <dt style="{$dt_style}">UnVetted</dt>

<dd style="{$dd_style}">
Displays the NEWLY DOWNLOADED ads that you HAVEN'T "VETTED" yet.&nbsp; <span
style="background-color:#FFFFCC">&nbsp;This is the DEFAULT (and generally MOST
USEFUL,) setting.&nbsp;</span><br />
<u>NOTE!</u><br />
To "vet" an ad, click the <b>view/edit/vet</b> link, in it's "Action"
column.&nbsp; Once you've done that, the ad will be marked as "vetted".&nbsp; No
matter whether you then approve/reject the ad for display on your site - or
simply navigate away from the <b>view/edit/vet</b> (= "Edit Available Ad")
screen, to another page.
</dd>

        <dt style="{$dt_style}">Manually Approved</dt>

<dd style="{$dd_style}">
These are the ads you've MANUALLY APPROVED.&nbsp; Show these if you want to
check that you didn't APPROVE something by mistake.
</dd>

        <dt style="{$dt_style}">Manually Rejected</dt>

<dd style="{$dd_style}">
These are the ads you've MANUALLY REJECTED.&nbsp; Show these if you want to
check that you didn't REJECT something by mistake.
</dd>

        <dt style="{$dt_style}">Default Approved</dt>

<dd style="{$dd_style}">
These are ads that you've neither MANUALLY approved nor rejected yet.&nbsp; So
they've been APPROVED - because the "Auto-Approve New Ads ?" field - in your
"Site Profile" - at the time the ad was LAST DOWNLOADED - was "YES".&nbsp;
<i>You can click the "view/edit/vet" link (in the ad's "Action" column), if
you'd like to MANUALLY REJECT or APPROVE any of these ads.</i>
</dd>

        <dt style="{$dt_style}">Default Rejected</dt>

<dd style="{$dd_style}">
These are ads that you've neither MANUALLY approved nor rejected yet.&nbsp; So
they've been REJECTED - because the "Auto-Approve New Ads ?" field - in your
"Site Profile" - at the time the ad was LAST DOWNLOADED - was "NO".&nbsp; <i>You
can click the "view/edit/vet" link (in the ad's "Action" column), if you'd like
to MANUALLY APPROVE or REJECT any of these ads.</i>
</dd>

        <dt style="{$dt_style}">All Approved</dt>

<dd style="{$dd_style}">
ALL the APPROVED ads (whether they were approved MANUALLY, or by DEFAULT).
</dd>

        <dt style="{$dt_style}">All Rejected</dt>

<dd style="{$dd_style}">
ALL the REJECTED ads (whether they were rejected MANUALLY, or by DEFAULT).
</dd>

    </dl>

</div>
EOT;


    // -------------------------------------------------------------------------

}

// =============================================================================
// get_record_counts_by_filter_value()
// =============================================================================

function get_record_counts_by_filter_value(
    $core_plugapp_dirs      ,
    $dataset_records        ,
    $dataset_slug           ,
    $dataset_title
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAvailableAds\
    // get_record_counts_by_filter_value(
    //      $core_plugapp_dirs      ,
    //      $dataset_records        ,
    //      $dataset_slug           ,
    //      $dataset_title
    //      )
    // - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          ARRAY $record_counts_by_filter_value = array(
    //                      'all'               =>  G   ,
    //                      'vetted'            =>  H   ,
    //                      'unvetted'          =>  I   ,
    //                      'manually-approved' =>  J   ,
    //                      'manually-rejected' =>  K   ,
    //                      'default-approved'  =>  L   ,
    //                      'default-rejected'  =>  M   ,
    //                      'all-approved'      =>  N   ,
    //                      'all-rejected'      =>  O
    //                      ) ;
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $_GET       ,
//    '$_GET'
//    ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $_COOKIE    ,
//    '$_COOKIE'
//    ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $dataset_records = Array(
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]       => 1448588776
    //                      [last_modified_server_datetime_utc] => 1448588776
    //                      [key]                               => bd4b055e-c856-40a6-a34a-f73b131822c2-1448588776-609962-5198
    //                      [global_sid]                        => 9khc-zwmv
    //                      [ad_swapper_site_sid]               => 2kmv-hzgc
    //                      [image_url]                         => http://localhost/plugdev/wp-content/uploads/2015/02/ad-swapper-happy-dogs-ad-2.png
    //                      [link_url]                          => http://www.nzkc.org.nz/
    //                      [special_type]                      =>
    //                      [alt_text]                          =>
    //                      [description]                       =>
    //                      [start_datetime]                    =>
    //                      [end_datetime]                      =>
    //                      [aspect_ratio_min]                  =>
    //                      [aspect_ratio_max]                  =>
    //                      [geoip_continents_incl]             =>
    //                      [geoip_continents_excl]             =>
    //                      [geoip_countries_incl]              => NZ
    //                      [geoip_countries_excl]              =>
    //                      [geoip_regions_incl]                =>
    //                      [geoip_regions_excl]                =>
    //                      [geoip_cities_incl]                 =>
    //                      [geoip_cities_excl]                 =>
    //                      [question_display]                  =>
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $dataset_records    ,
//    '$dataset_records'
//    ) ;

    // =========================================================================
    // VETTED / UNVETTED SUPPORT...
    // =========================================================================

    require_once( $core_plugapp_dirs['apps_dot_app_dir'] . '/vetted-available-ads-support.php' ) ;

    // ---------------------------------------------------------------------

    $option_name =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_vettedAvailableAds\get_vetted_available_ads_option_name()
        ;

    // -------------------------------------------------------------------------
    // get_option( $option , $default )
    // - - - - - - - - - - - - - - - -
    // A safe way of getting values for a named option from the options database
    // table . If the desired option does not exist, or no value is associated
    // with it, FALSE will be returned.
    //
    //      $option
    //          (string) (required) Name of the option to retrieve. Underscores
    //          separate words, lowercase only.
    //          Default: None
    //
    //      $default
    //          (mixed) (optional) The default value to return if no value is
    //          returned (ie. the option is not in the database).
    //          Default: false
    //
    // RETURN VALUES
    //      (mixed) Current value for the specified option. If the option does
    //      not exist, returns parameter $default if specified or boolean FALSE
    //      by default.
    // -------------------------------------------------------------------------

    $vetted_available_ads =
        get_option(
            $option_name
            ) ;

    // -------------------------------------------------------------------------

    if ( $vetted_available_ads === FALSE ) {
        $vetted_available_ads = array() ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $vetted_available_ads = Array(
    //
    //          "<ad-sid>"  =>  <time()-last-downloaded>
    //
    //          [nnhw-zmcg] =>  1448527327
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $vetted_available_ads        ,
//    '$vetted_available_ads'
//    ) ;

    // =========================================================================
    // MANUALLY APPROVED SUPPORT...
    // =========================================================================

    require_once( $core_plugapp_dirs['apps_dot_app_dir'] . '/manually-approved-available-ads-support.php' ) ;

    // -------------------------------------------------------------------------

    $option_name =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_manuallyApprovedAvailableAds\get_manually_approved_available_ads_option_name()
        ;

    // -------------------------------------------------------------------------
    // get_option( $option , $default )
    // - - - - - - - - - - - - - - - -
    // A safe way of getting values for a named option from the options database
    // table . If the desired option does not exist, or no value is associated
    // with it, FALSE will be returned.
    //
    //      $option
    //          (string) (required) Name of the option to retrieve. Underscores
    //          separate words, lowercase only.
    //          Default: None
    //
    //      $default
    //          (mixed) (optional) The default value to return if no value is
    //          returned (ie. the option is not in the database).
    //          Default: false
    //
    // RETURN VALUES
    //      (mixed) Current value for the specified option. If the option does
    //      not exist, returns parameter $default if specified or boolean FALSE
    //      by default.
    // -------------------------------------------------------------------------

    $manually_approved_available_ads =
        get_option(
            $option_name
            ) ;

    // -------------------------------------------------------------------------

    if ( $manually_approved_available_ads === FALSE ) {
        $manually_approved_available_ads = array() ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $manually_approved_available_ads = Array(
    //          [y9hw-vmck] => a-1450061200
    //          [yycg-kvzh] => a-1450061200
    //          [nnhw-zmcg] => a-1448932596
    //          [ndpc-mkgz] => r-1448932596
    //          [99cw-hmgk] => a-1449987858
    //          ...
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $manually_approved_available_ads        ,
//    '$manually_approved_available_ads'
//    ) ;

    // =========================================================================
    // Init. (Main Record Counting Loop)...
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $record_counts_by_filter_value = array(
        'all'               =>  count( $dataset_records )       ,
        'vetted'            =>  0                               ,
        'unvetted'          =>  0                               ,
        'manually-approved' =>  0                               ,
        'manually-rejected' =>  0                               ,
        'default-approved'  =>  0                               ,
        'default-rejected'  =>  0                               ,
        'all-approved'      =>  0                               ,
        'all-rejected'      =>  0
        ) ;

    // =========================================================================
    // Loop over the records, counting those in each category...
    // =========================================================================

    foreach ( $dataset_records as $this_record ) {

        // ---------------------------------------------------------------------
        // Vetted / Unvetted...
        // ---------------------------------------------------------------------

        if (    array_key_exists(
                    $this_record['global_sid']  ,
                    $vetted_available_ads
                    )
            ) {
            $record_counts_by_filter_value['vetted']++ ;

        } else {
            $record_counts_by_filter_value['unvetted']++ ;

        }

        // ---------------------------------------------------------------------
        // Manually Approved / Rejected ?
        // ---------------------------------------------------------------------

        if (    array_key_exists(
                    $this_record['global_sid']          ,
                    $manually_approved_available_ads
                    )
            ) {
            $question_manually_approved_or_rejected = TRUE ;

        } else {
            $question_manually_approved_or_rejected = FALSE ;

        }

        // ---------------------------------------------------------------------

        if ( $question_manually_approved_or_rejected === TRUE ) {

            // -----------------------------------------------------------------
            // Manually Approved / Rejected
            // -----------------------------------------------------------------

            $parts = explode(
                        '-'                                                             ,
                        $manually_approved_available_ads[ $this_record['global_sid'] ]
                        ) ;

            // -----------------------------------------------------------------

            if ( count( $parts ) === 2 ) {

                // -------------------------------------------------------------

                if ( $parts[0] === 'a' ) {
                    $record_counts_by_filter_value['manually-approved']++ ;

                } elseif ( $parts[0] === 'r' ) {
                    $record_counts_by_filter_value['manually-rejected']++ ;

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------
            // Default Approved / Rejected
            // -----------------------------------------------------------------

            if ( $this_record['question_display'] === TRUE ) {
                $record_counts_by_filter_value['default-approved']++ ;

            } else {
                $record_counts_by_filter_value['default-rejected']++ ;

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // All Approved / Rejected
        // ---------------------------------------------------------------------

        if ( $this_record['question_display'] === TRUE ) {
            $record_counts_by_filter_value['all-approved']++ ;

        } else {
            $record_counts_by_filter_value['all-rejected']++ ;

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $record_counts_by_filter_value      ,
//    '$record_counts_by_filter_value'
//    ) ;

    // -------------------------------------------------------------------------
    // SUCCESS
    // -------------------------------------------------------------------------

    return $record_counts_by_filter_value ;

    // -------------------------------------------------------------------------
    // That's that!
    // -------------------------------------------------------------------------

}

// =============================================================================
// custom_record_filtering_function()
// =============================================================================

function custom_record_filtering_function(
    $core_plugapp_dirs                      ,
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_records                        ,
    $dataset_slug                           ,
    $dataset_title                          ,
    $question_front_end                     ,
    &$loaded_datasets                       ,
    $currently_selected_filter_value
    ) {

    // -------------------------------------------------------------------------
    // <custom_record_filtering_function>(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_records                        ,
    //      $dataset_slug                           ,
    //      $dataset_title                          ,
    //      $question_front_end                     ,
    //      &$loaded_datasets                       ,
    //      $currently_selected_filter_value
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // $currently_selected_filter_value is the filter (COOKIE) value to be
    // used.
    //
    // RETURNS
    //      On SUCCESS
    //          $filtered_dataset_records ARRAY
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $_GET       ,
//    '$_GET'
//    ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $_COOKIE    ,
//    '$_COOKIE'
//    ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $dataset_records = Array(
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]       => 1448588776
    //                      [last_modified_server_datetime_utc] => 1448588776
    //                      [key]                               => bd4b055e-c856-40a6-a34a-f73b131822c2-1448588776-609962-5198
    //                      [global_sid]                        => 9khc-zwmv
    //                      [ad_swapper_site_sid]               => 2kmv-hzgc
    //                      [image_url]                         => http://localhost/plugdev/wp-content/uploads/2015/02/ad-swapper-happy-dogs-ad-2.png
    //                      [link_url]                          => http://www.nzkc.org.nz/
    //                      [special_type]                      =>
    //                      [alt_text]                          =>
    //                      [description]                       =>
    //                      [start_datetime]                    =>
    //                      [end_datetime]                      =>
    //                      [aspect_ratio_min]                  =>
    //                      [aspect_ratio_max]                  =>
    //                      [geoip_continents_incl]             =>
    //                      [geoip_continents_excl]             =>
    //                      [geoip_countries_incl]              => NZ
    //                      [geoip_countries_excl]              =>
    //                      [geoip_regions_incl]                =>
    //                      [geoip_regions_excl]                =>
    //                      [geoip_cities_incl]                 =>
    //                      [geoip_cities_excl]                 =>
    //                      [question_display]                  =>
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $dataset_records    ,
//    '$dataset_records'
//    ) ;

    // =========================================================================
    // ALL ?
    // =========================================================================

    if ( $currently_selected_filter_value === 'all' ) {
        return $dataset_records ;
    }

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $filtered_dataset_records = array() ;

    // =========================================================================
    // VETTED or UNVETTED ?
    // =========================================================================

    if (    $currently_selected_filter_value === 'vetted'
            ||
            $currently_selected_filter_value === 'unvetted'
        ) {

        // ---------------------------------------------------------------------

        require_once( $core_plugapp_dirs['apps_dot_app_dir'] . '/vetted-available-ads-support.php' ) ;

        // ---------------------------------------------------------------------

        $option_name =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_vettedAvailableAds\get_vetted_available_ads_option_name()
            ;

        // -------------------------------------------------------------------------
        // get_option( $option , $default )
        // - - - - - - - - - - - - - - - -
        // A safe way of getting values for a named option from the options database
        // table . If the desired option does not exist, or no value is associated
        // with it, FALSE will be returned.
        //
        //      $option
        //          (string) (required) Name of the option to retrieve. Underscores
        //          separate words, lowercase only.
        //          Default: None
        //
        //      $default
        //          (mixed) (optional) The default value to return if no value is
        //          returned (ie. the option is not in the database).
        //          Default: false
        //
        // RETURN VALUES
        //      (mixed) Current value for the specified option. If the option does
        //      not exist, returns parameter $default if specified or boolean FALSE
        //      by default.
        // -------------------------------------------------------------------------

        $vetted_available_ads =
            get_option(
                $option_name
                ) ;

        // -------------------------------------------------------------------------

        if ( $vetted_available_ads === FALSE ) {
            $vetted_available_ads = array() ;
        }

        // -------------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $vetted_available_ads = Array(
        //
        //          "<ad-sid>"  =>  <time()-last-downloaded>
        //
        //          [nnhw-zmcg] =>  1448527327
        //
        //          ...
        //
        //          )
        //
        // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $vetted_available_ads        ,
//    '$vetted_available_ads'
//    ) ;

        // ---------------------------------------------------------------------

        if ( $currently_selected_filter_value === 'vetted' ) {

            // -----------------------------------------------------------------

            foreach ( $dataset_records as $this_record ) {

                if (    array_key_exists(
                            $this_record['global_sid']  ,
                            $vetted_available_ads
                            )
                    ) {
                    $filtered_dataset_records[] = $this_record ;
                }

            }

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            foreach ( $dataset_records as $this_record ) {

                if (    ! array_key_exists(
                            $this_record['global_sid']  ,
                            $vetted_available_ads
                            )
                    ) {
                    $filtered_dataset_records[] = $this_record ;
                }

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        return $filtered_dataset_records ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // ALL APPROVED / REJECTED ?
    // =========================================================================

    if ( $currently_selected_filter_value === 'all-approved' ) {

        // ---------------------------------------------------------------------
        // ALL APPROVED
        // ---------------------------------------------------------------------

        foreach ( $dataset_records as $this_record ) {

            if ( $this_record['question_display'] === TRUE ) {
                $filtered_dataset_records[] = $this_record ;
            }

        }

        // ---------------------------------------------------------------------

        return $filtered_dataset_records ;

        // ---------------------------------------------------------------------

    } elseif ( $currently_selected_filter_value === 'all-rejected' ) {

        // ---------------------------------------------------------------------
        // ALL REJECTED
        // ---------------------------------------------------------------------

        foreach ( $dataset_records as $this_record ) {

            if ( $this_record['question_display'] !== TRUE ) {
                $filtered_dataset_records[] = $this_record ;
            }

        }

        // ---------------------------------------------------------------------

        return $filtered_dataset_records ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Get the MANUALLY APPROVED AVAILABLE ADS...
    // =========================================================================

    require_once( $core_plugapp_dirs['apps_dot_app_dir'] . '/manually-approved-available-ads-support.php' ) ;

    // -------------------------------------------------------------------------

    $option_name =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_manuallyApprovedAvailableAds\get_manually_approved_available_ads_option_name()
        ;

    // -------------------------------------------------------------------------
    // get_option( $option , $default )
    // - - - - - - - - - - - - - - - -
    // A safe way of getting values for a named option from the options database
    // table . If the desired option does not exist, or no value is associated
    // with it, FALSE will be returned.
    //
    //      $option
    //          (string) (required) Name of the option to retrieve. Underscores
    //          separate words, lowercase only.
    //          Default: None
    //
    //      $default
    //          (mixed) (optional) The default value to return if no value is
    //          returned (ie. the option is not in the database).
    //          Default: false
    //
    // RETURN VALUES
    //      (mixed) Current value for the specified option. If the option does
    //      not exist, returns parameter $default if specified or boolean FALSE
    //      by default.
    // -------------------------------------------------------------------------

    $manually_approved_available_ads =
        get_option(
            $option_name
            ) ;

    // -------------------------------------------------------------------------

    if ( $manually_approved_available_ads === FALSE ) {
        $manually_approved_available_ads = array() ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $manually_approved_available_ads = Array(
    //          [y9hw-vmck] => a-1450061200
    //          [yycg-kvzh] => a-1450061200
    //          [nnhw-zmcg] => a-1448932596
    //          [ndpc-mkgz] => r-1448932596
    //          [99cw-hmgk] => a-1449987858
    //          ...
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $manually_approved_available_ads        ,
//    '$manually_approved_available_ads'
//    ) ;

    // -------------------------------------------------------------------------

    if ( $currently_selected_filter_value === 'manually-approved' ) {

        // ---------------------------------------------------------------------
        // MANUALLY APPROVED
        // ---------------------------------------------------------------------

        foreach ( $dataset_records as $this_record ) {

            if (    $this_record['question_display'] === TRUE
                    &&
                    array_key_exists(
                        $this_record['global_sid']          ,
                        $manually_approved_available_ads
                        )
                ) {

                //  TODO ???
                //
                //  Check for "a" immediately preceding the "-"
                //  in the value ???

                $filtered_dataset_records[] = $this_record ;

            }

        }

        // ---------------------------------------------------------------------

        return $filtered_dataset_records ;

        // ---------------------------------------------------------------------

    } elseif ( $currently_selected_filter_value === 'manually-rejected' ) {

        // ---------------------------------------------------------------------
        // MANUALLY REJECTED
        // ---------------------------------------------------------------------

        foreach ( $dataset_records as $this_record ) {

            if (    $this_record['question_display'] !== TRUE
                    &&
                    array_key_exists(
                        $this_record['global_sid']          ,
                        $manually_approved_available_ads
                        )
                ) {

                //  TODO ???
                //
                //  Check for "r" immediately preceding the "-"
                //  in the value ???

                $filtered_dataset_records[] = $this_record ;

            }

        }

        // ---------------------------------------------------------------------

        return $filtered_dataset_records ;

        // ---------------------------------------------------------------------

    } elseif ( $currently_selected_filter_value === 'default-approved' ) {

        // ---------------------------------------------------------------------
        // DEFAULT APPROVED
        // ---------------------------------------------------------------------

        foreach ( $dataset_records as $this_record ) {

            if (    $this_record['question_display'] === TRUE
                    &&
                    ! array_key_exists(
                        $this_record['global_sid']          ,
                        $manually_approved_available_ads
                        )
                ) {

                $filtered_dataset_records[] = $this_record ;

            }

        }

        // ---------------------------------------------------------------------

        return $filtered_dataset_records ;

        // ---------------------------------------------------------------------

    } elseif ( $currently_selected_filter_value === 'default-rejected' ) {

        // ---------------------------------------------------------------------
        // DEFAULT REJECTED
        // ---------------------------------------------------------------------

        foreach ( $dataset_records as $this_record ) {

            if (    $this_record['question_display'] !== TRUE
                    &&
                    ! array_key_exists(
                        $this_record['global_sid']          ,
                        $manually_approved_available_ads
                        )
                ) {

                $filtered_dataset_records[] = $this_record ;

            }

        }

        // ---------------------------------------------------------------------

        return $filtered_dataset_records ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // ERROR
    // -------------------------------------------------------------------------

    $ln = __LINE__ ;

    return <<<EOT
PROBLEM:&nbsp; Unrecognised/unsupported "currently_selected_filter_value"
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    // -------------------------------------------------------------------------
    // That's that!
    // -------------------------------------------------------------------------

}

// =============================================================================
// set_record_vetted()
// =============================================================================

function set_record_vetted(
    $core_plugapp_dirs                      ,
    $all_application_dataset_definitions    ,
    $display_options                        ,
    $submission_options                     ,
    $storage_mode                           ,
    $selected_datasets_dmdd                 ,
    $dataset_slug                           ,
    $dataset_title                          ,
    $dataset_records                        ,
    $key_field_slug                         ,
    $record_indices_by_key                  ,
    $question_front_end                     ,
    $question_adding                        ,
    $iframe_page_html                       ,
    $pre_display_function_args
    ) {

    // -------------------------------------------------------------------------
    // <some_custom_pre_display_function>(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $display_options                        ,
    //      $submission_options                     ,
    //      $storage_mode                           ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_slug                           ,
    //      $dataset_title                          ,
    //      $dataset_records                        ,
    //      $key_field_slug                         ,
    //      $record_indices_by_key                  ,
    //      $question_front_end                     ,
    //      $question_adding                        ,
    //      $iframe_page_html                       ,
    //      $pre_display_function_args
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // The "pre display" function is run once the form - for the record to
    // be added or edited - has been created.  And just before it's displayed
    // to the screen.
    //
    // The idea is to run this function only if we're as certain as possible
    // that the user will see the add/edit form - and be able to submit it.
    //
    // Essentially; the "pre display" function's purpose is to let you run
    // some dataset specific PHP code - when you're as certain as possible
    // that the form will actually be displayed (for the user to view, edit
    // and submit).
    //
    // ---
    //
    // The "pre display" function can't modify the displayed form in any way.
    // apart from via any Javascript it returns.  Although it can echo HTML
    // - which will appear below any headers and toobars already output -
    // and immediately above the form proper (but still, outside the IFRAME).
    //
    // Also; the returned Javascript is added to the PARENT page - in which
    // the IFRAME that contains the add/edit form proper is embedded.  So
    // the Javascript must take that into account if it wants to adjust any
    // content IN the IFRAME.  The IFRAME has the ID:-
    //      "greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager_addEditForm_iframe"
    //
    // The returned Javascript MUST include enclosing SCRIPT tags.
    //
    // RETURNS
    //      On SUCCESS
    //          $pre_display_function_returned_js STRING
    //              (May be the empty string)
    //
    //      On FAILURE
    //          array( $error_message STRING )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $_GET = Array(
    //                  [page]          => pluginPlant
    //                  [action]        => edit-record
    //                  [application]   => ad-swapper
    //                  [dataset_slug]  => ad_swapper_available_ads
    //                  [record_key]    => bd4b055e-c856-40a6-a34a-f73b131822c2-1448588776-609962-5198
    //                  )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_GET , '$_GET' ) ;

    // -------------------------------------------------------------------------
    // Editing (viewing) only
    // -------------------------------------------------------------------------

    if ( $question_adding ) {
        return '' ;
    }

    // -------------------------------------------------------------------------
    // Get the record being edited...
    // -------------------------------------------------------------------------

    if (    array_key_exists( 'record_key' , $_GET )
            &&
            array_key_exists( $_GET['record_key'] , $record_indices_by_key )
            &&
            array_key_exists( $record_indices_by_key[ $_GET['record_key'] ] , $dataset_records )
        ) {

        $this_record = $dataset_records[ $record_indices_by_key[ $_GET['record_key'] ] ] ;

    } else {

        return '' ;
            //  Maybe we should issue an error message ???

    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $this_record = Array(
    //          [created_server_datetime_utc]       => 1448588776
    //          [last_modified_server_datetime_utc] => 1448588776
    //          [key]                               => bd4b055e-c856-40a6-a34a-f73b131822c2-1448588776-609962-5198
    //          [global_sid]                        => 9khc-zwmv
    //          [ad_swapper_site_sid]               => 2kmv-hzgc
    //          [image_url]                         => http://localhost/plugdev/wp-content/uploads/2015/02/ad-swapper-happy-dogs-ad-2.png
    //          [link_url]                          => http://www.nzkc.org.nz/
    //          [special_type]                      =>
    //          [alt_text]                          =>
    //          [description]                       =>
    //          [start_datetime]                    =>
    //          [end_datetime]                      =>
    //          [aspect_ratio_min]                  =>
    //          [aspect_ratio_max]                  =>
    //          [geoip_continents_incl]             =>
    //          [geoip_continents_excl]             =>
    //          [geoip_countries_incl]              => NZ
    //          [geoip_countries_excl]              =>
    //          [geoip_regions_incl]                =>
    //          [geoip_regions_excl]                =>
    //          [geoip_cities_incl]                 =>
    //          [geoip_cities_excl]                 =>
    //          [question_display]                  =>
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $this_record        ,
//    '$this_record'
//    ) ;

    // -------------------------------------------------------------------------

    require_once( dirname( __FILE__ ) . '/vetted-available-ads-support.php' ) ;

    // ------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_vettedAvailableAds\
    // set_available_ad_vetted(
    //      $ad_sid
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // ------------------------------------------------------------------------

    $result =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_vettedAvailableAds\set_available_ad_vetted(
            $this_record['global_sid']
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return array( $result ) ;
    }

    // -------------------------------------------------------------------------

    return '' ;

    // -------------------------------------------------------------------------
}

// =============================================================================
// That's that!
// =============================================================================

