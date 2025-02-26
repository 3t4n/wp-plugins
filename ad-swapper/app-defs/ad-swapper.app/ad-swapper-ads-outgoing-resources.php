<?php

// *****************************************************************************
// AD-SWAPPER.APP / AD-SWAPPER-ADS-OUTGOING-RESOURCES.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAdsOutgoing ;

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
// get_default_record_data()
// =============================================================================

function get_default_record_data(
    $core_plugapp_dirs                      ,
    $all_application_dataset_definitions    ,
    $selected_datasets_dmdd                 ,
    $dataset_records                        ,
    $record_indices_by_key                  ,
    $dataset_title                          ,
    $question_base64_encode
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_datasetDef_adSwapperAdsOutgoing\
    // get_default_record_data(
    //      $core_plugapp_dirs                      ,
    //      $all_application_dataset_definitions    ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_records                        ,
    //      $record_indices_by_key                  ,
    //      $dataset_title                          ,
    //      $question_base64_encode
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the default new record.  Ie; Return the record data we should use
    // when adding a new record to the database.
    //
    // However, it's NOT necessary that ALL the fields be defined.  For
    // example, fields like:-
    //      o   created_datatime_utc
    //      o   last_modified_datatime_utc
    //      o   key
    //      o   ...or any other field for that matter...
    //
    // can be omitted.  And if they are omitted, they'll be created with the
    // default values specified in the dataset's Zebra Form Field and Array
    // Storage Field definitions (as per normal, when adding a new dataset
    // record).
    //
    // NOTE!
    // =====
    // $question_base64_encode tells this routine whether any base64
    // encoded fields in the returned record should be returned base64
    // encoded or not.
    //
    // RETURNS
    //      o   On SUCCESS
    //              ARRAY(
    //                  'data'              =>  $new_record_data ARRAY
    //                  )
    //              --OR--
    //              ARRAY(
    //                  'data'              =>  $new_record_data ARRAY
    //                  'key_field_slug'    =>  "xxx"
    //                  )
    //
    //      o   On FAILURE
    //              $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $dataset_records = Array(
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]       => 1418537702
    //                      [last_modified_server_datetime_utc] => 1418537702
    //                      [key]                               => 3f0a7093-65c4-456d-8cf2-795953e33f50-1418537702-953577-1360
    //                      [local_key]                         => 542e82a17ed5ab8803342ef00a637fccbe6abd29caec550d16252856c60fa88b
    //                      [global_sid]                        =>
    //                      [image_url]                         => http://localhost/plugdev/wp-content/uploads/2014/06/rookie-mag-postcards-from-wonderland.jpeg
    //                      [link_url]                          => http://www.google.co.nz
    //                      [alt_text]                          =>
    //                      [description]                       =>
    //                      [start_datetime]                    =>
    //                      [end_datetime]                      =>
    //                      [question_disabled]                 =>
    //                      [aspect_ratio_min]                  =>
    //                      [aspect_ratio_max]                  =>
    //                      [sequence_number]                   =>
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $dataset_records ) ;

    // =========================================================================
    // Init...
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__ ;

    // =========================================================================
    // local_key
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/random.php' ) ;

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/string-utils.php' ) ;

    // -------------------------------------------------------------------------

    $max_attempts = 30 ;

    $number_attempts = 0 ;

    // -------------------------------------------------------------------------

    while( TRUE ) {

        // ---------------------------------------------------------------------
        // Prevent lock-up...
        // ---------------------------------------------------------------------

        if ( $number_attempts >= $max_attempts ) {

            return <<<EOT
PROBLEM:&nbsp; Can't generate "local_key"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------
        // Generate a candidate local key...
        // ---------------------------------------------------------------------

        $candidate_local_key =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_random\secure_rand( 32 ) ;
                //  32 byte binary

        // ---------------------------------------------------------------------

        $candidate_local_key =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\hex_encode(
                $candidate_local_key
                ) ;
                //  64 character hex

        // ---------------------------------------------------------------------
        // Make sure this key not already used...
        // ---------------------------------------------------------------------

        $already_exists = FALSE ;

        // ---------------------------------------------------------------------

        foreach ( $dataset_records as $this_record ) {

            // -----------------------------------------------------------------

            if ( ! array_key_exists( 'local_key' , $this_record ) ) {

                return <<<EOT
PROBLEM:&nbsp; No "local_key"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            if (    ! is_string( $this_record['local_key'] )
                    ||
                    trim( $this_record['local_key'] ) === ''
                ) {

                return <<<EOT
PROBLEM:&nbsp; Bad "local_key" (non-empty string expected)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            if ( $this_record['local_key'] === $candidate_local_key ) {
                $already_exists = TRUE ;
                break ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        if ( ! $already_exists ) {
            break ;
        }

        // ---------------------------------------------------------------------

        $number_attempts++ ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $local_key = $candidate_local_key ;

    // =========================================================================
    // Create the default record...
    // =========================================================================

    $default_data = array(
        'local_key'     =>  $local_key      ,
        'global_sid'    =>  ''
        ) ;

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return array(
                'data'  =>  $default_data
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_special_type_selector_options()
// =============================================================================

function get_special_type_selector_options(
    $home_page_title                        ,
    $caller_apps_includes_dir               ,
    $all_application_dataset_definitions    ,
    $dataset_slug                           ,
    $selected_datasets_dmdd                 ,
    $dataset_title                          ,
    $dataset_records                        ,
    $record_indices_by_key                  ,
    $question_adding                        ,
    $field_number                           ,
    $field_details                          ,
    $the_record                             ,
    $the_records_index                      ,
    $array_storage_field_slugs              ,
    $extra_args
    ) {

    // -------------------------------------------------------------------------
    // <get_xxx_selector_options>(
    //      $home_page_title                        ,
    //      $caller_apps_includes_dir               ,
    //      $all_application_dataset_definitions    ,
    //      $dataset_slug                           ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_title                          ,
    //      $dataset_records                        ,
    //      $record_indices_by_key                  ,
    //      $question_adding                        ,
    //      $field_number                           ,
    //      $field_details                          ,
    //      $the_record                             ,
    //      $the_records_index                      ,
    //      $array_storage_field_slugs              ,
    //      $extra_args
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Returns a "select" control "options" array - as required by Zebra Forms.
    //
    // The returned array is like (eg):-
    //
    //      array(
    //          "Option 1 Text"
    //          "Option 2 Text"
    //          ...
    //          )
    //
    //      array(
    //          "option 1 value"    =>  "Option 1 Text"
    //          "option 2 value"    =>  "Option 2 Text"
    //          ...
    //          )
    //
    //      array(
    //          "Option Group 1 Title"  =>  array(
    //              "option A value"    =>  "Option A Text"
    //              "option B value"    =>  "Option B Text"
    //              ...
    //              )
    //          "Option Group 2 Title"  =>  array(
    //              "option M value"    =>  "Option M Text"
    //              "option N value"    =>  "Option N Text"
    //              ...
    //              )
    //          ...
    //          )
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          array(
    //              $ok = TRUE          ,
    //              ARRAY $options
    //              )
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          array(
    //              $ok = FALSE             ,
    //              $error_message STRING
    //              )
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( \func_get_args() ) ;

    // =========================================================================
    // Create the options...
    // =========================================================================

    // -------------------------------------------------------------------------
    // We want to return an array like:-
    //
    //      array(
    //          "option 1 value"    =>  "Option 1 Text"
    //          "option 2 value"    =>  "Option 2 Text"
    //          ...
    //          )
    // -------------------------------------------------------------------------

    $options = array(
        ''          =>  '(none)'        ,
        'banner'    =>  'Banner'
        ) ;

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return array(
                TRUE        ,
                $options
                ) ;

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
    // Get the "Next/Prev" butons toolbar HTML...
    // =========================================================================

    if ( $question_adding ) {

        // ---------------------------------------------------------------------

        $out = '' ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

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

        // ---------------------------------------------------------------------

        if ( is_array( $next_prev_record_toolbar_html ) ) {
            return $next_prev_record_toolbar_html ;
        }

        // ---------------------------------------------------------------------

        $out = <<<EOT
<div style="margin:0.5em 0 1.5em 0.5em; width:96%; text-align:center; border:1px solid #0066CC">{$next_prev_record_toolbar_html}</div>
EOT;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Record specified (only if editing)...
    // =========================================================================

    if (    ! array_key_exists( 'record_key' , $_GET )
            ||
            trim( $_GET['record_key'] ) === ''
            ||
            ! array_key_exists( $_GET['record_key'] , $record_indices_by_key )
        ) {
        return $out ;
    }

    // =========================================================================
    // Show the image...
    // =========================================================================

    $this_record =
        $dataset_records[
            $record_indices_by_key[ $_GET['record_key'] ]
            ] ;

    // -------------------------------------------------------------------------

    if ( trim( $this_record['image_url'] ) === '' ) {
        return $out ;
            //  NO image to show
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

        return $out . <<<EOT
<div style="background-color:#FFF0F0;border:1px solid #AA0000;color:#AA0000;padding:0.3em 1em">
    WARNING!&nbsp; The "image_url" doesn't point to a valid image!
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

        return $out . <<<EOT
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
    // SUCCESS!
    // =========================================================================

    return $out . $image_html ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_dataset_records_table_custom_page_header_html()
// =============================================================================

function get_dataset_records_table_custom_page_header_html(
    $core_plugapp_dirs                              ,
    $all_application_dataset_definitions            ,
    $selected_datasets_dmdd                         ,
    $dataset_records                                ,
    $dataset_title                                  ,
    $dataset_slug                                   ,
    $question_front_end                             ,
    $table_data
    ) {

    // -------------------------------------------------------------------------
    // <custom_page_header_function_name>(
    //      $core_plugapp_dirs                              ,
    //      $all_application_dataset_definitions            ,
    //      $selected_datasets_dmdd                         ,
    //      $dataset_records                                ,
    //      $dataset_title                                  ,
    //      $dataset_slug                                   ,
    //      $question_front_end                             ,
    //      $table_data
    //      ) ;
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          $custom_dataset_records_table_page_header_html STRING
    //
    //      On FAILURE
    //          array( $error_message STRING )
    // -------------------------------------------------------------------------

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

    $dataset_slug = 'ad_swapper_site_profile' ;

    // -------------------------------------------------------------------------

    $dataset_records =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\load_numerically_indexed(
            $dataset_slug               ,
            $question_die_on_error
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $dataset_records ) ) {
        return $dataset_records ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $dataset_records = Array(
    //
    //          [0] => Array(
    //                      [created_server_datetime_utc]       => 1418445063
    //                      [last_modified_server_datetime_utc] => 1418445063
    //                      [key]                               => add9f270-9f5b-429a-a264-f0f5c7cc59db-1418445063-977293-1355
    //                      [site_title]                        => Plugdev
    //                      [home_page_url]                     => http://localhost/plugdev
    //                      [general_description]               =>
    //                      [ads_wanted_description]            =>
    //                      [sites_wanted_description]          =>
    //                      [categories_available]              =>
    //                      [categories_wanted]                 =>
    //                      [geoip_continents_incl]             =>
    //                      [geoip_continents_excl]             =>
    //                      [geoip_countries_incl]              => NZ
    //                      [geoip_countries_excl]              =>
    //                      [geoip_regions_incl]                =>
    //                      [geoip_regions_excl]                =>
    //                      [geoip_cities_incl]                 =>
    //                      [geoip_cities_excl]                 =>
    //                      )
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $dataset_records , '$dataset_records' ) ;

    // -------------------------------------------------------------------------

    $images_dir_url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_images_url()
        ;

    // -------------------------------------------------------------------------

    if ( count( $dataset_records ) < 1 ) {

        // ---------------------------------------------------------------------

        $msg = <<<EOT
<u>NOTE!</u><br />
<b style="background-color:#FFFF80">Please fill in and submit the Site Profile
form</b> (by clicking the <b>Maintain This Site's Profile</b> option, from the
Ad Swapper plugin Main Menu).&nbsp; Until you've done this - and in particular,
selected at least one country or continent to target your ads at - you won't be
able to upload your ads to other Ad Swapper sites (or even display them on your
own).
EOT;

        // ---------------------------------------------------------------------

        return <<<EOT
<div
    style="background-color:#F0F8FF; color:#000000; border:1px solid #66AAFF; margin:2em 1.5em 1.5em 0; padding:1em"
    >
    <div>
        <img
            border="0"
            width="64"
            src="{$images_dir_url}/round-info-icon-256x256.png"
            style="float:left; margin-right:1.5em"
            />
        {$msg}
        <div style="clear:both"></div>
    </div>
</div>
EOT;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $site_profile = $dataset_records[0] ;

    // -------------------------------------------------------------------------

    if (    trim( $site_profile['geoip_continents_incl'] ) === ''
            &&
            trim( $site_profile['geoip_countries_incl'] ) === ''
        ) {

        // ---------------------------------------------------------------------

        $msg = <<<EOT
<div style="font-size:110%; font-weight:bold">WARNING; these ads WON'T BE
DISPLAYED on other Ad Swapper sites!</div>

<div style="margin-top:0.5em">To upload ads to Ad Swapper Central (for display
on other Ad Swapper sites), you must first <b>select at least one country or
continent</b> for the ads to be shown on.&nbsp; Do this from the <b>Maintain
This Site's Profile</b> option (on the Ad Swapper plugin Main Menu).&nbsp;
<i>Once you've done that, you can then run the <b>Update Central Site</b> option
(to upload your ads for distribution to other Ad Swapper sites).</i></div>
EOT;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $countries_incl  = trim( $site_profile['geoip_countries_incl'] )  ;

        $continents_incl = trim( $site_profile['geoip_continents_incl'] ) ;

        $countries_excl  = trim( $site_profile['geoip_countries_excl'] )  ;

        // ---------------------------------------------------------------------

        $msg = <<<EOT
Your ads (below) are currently targeted at:-
<div style="margin-bottom:0.5em"><table
    border="0"
    cellpadding="0"
    cellspacing="0"
    style="padding-left:2em"
    >
    <tr>
        <td align="right" style="text-align:right">COUNTRIES INCLUDED:</td>
        <td style="padding-left:1em"><b>{$countries_incl}</b></td>
    </tr>
    <tr>
        <td align="right" style="text-align:right">CONTINENTS INCLUDED:</td>
        <td style="padding-left:1em"><b>{$continents_incl}</b></td>
    </tr>
    <tr>
        <td align="right" style="text-align:right">COUNTRIES EXCLUDED:</td>
        <td style="padding-left:1em"><b>{$countries_excl}</b></td>
    </tr>
</table></div>
You can adjust these settings from the <b>Maintain This Site's Profile</b>
option (on the Ad Swapper plugin Main Menu).&nbsp; <i>And once your ads are
ready (for distribution to other Ad Swapper sites), run the <b>Update Central
Site</b> option (from the Ad Swapper plugin Main Menu), to start
advertising.</i>
EOT;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    return <<<EOT
<div
    style="background-color:#F0F8FF; color:#000000; border:1px solid #66AAFF; margin:2em 1.5em 1.5em 0; padding:1em"
    >
    <div>
        <img
            border="0"
            width="64"
            src="{$images_dir_url}/round-info-icon-256x256.png"
            style="float:left; margin-right:1.5em"
            />
        {$msg}
        <div style="clear:both"></div>
    </div>
</div>
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

