<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / AD-DISPLAYER / IMAGESIZES-SUPPORT.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer ;

// =============================================================================
// get_imagesize_records_variable_name()
// =============================================================================

function get_imagesize_records_variable_name() {
    return 'ad_swapper_imagesize_records' ;
}

// =============================================================================
// get_imagesize_records_array_storage_slug()
// =============================================================================

function get_imagesize_records_array_storage_slug() {
    return 'ad_swapper_imagesize_records' ;
}

// =============================================================================
// get_array_storage_data_4_imagesize_records()
// =============================================================================

function get_array_storage_data_4_imagesize_records() {

    // -------------------------------------------------------------------------

    $basepress_dataset_uid =
        'c344a345-b26f-4d33-bfe5-b1f628a8e835' . '-' .
        '47209c61-949c-457c-961b-41500c629c61' . '-' .
        'adbab825-0a6a-4afd-9c88-4159547897be' . '-' .
        '8c06bead-54f6-4b68-88ff-160241f484e5'
        ;

    // -------------------------------------------------------------------------

    $basepress_dataset_handle = array(
        'nice_name'     =>  'adSwapper_byFernTec_imagesizeRecords'  ,
        'unique_key'    =>  $basepress_dataset_uid                  ,
        'version'       =>  '0.1'
        ) ;

    // -------------------------------------------------------------------------

    $supported_datasets = array(
        get_imagesize_records_array_storage_slug()  =>  array(
            'storage_method'            =>  'basepress-dataset'         ,
            'json_filespec'             =>  NULL                        ,
            'basepress_dataset_handle'  =>  $basepress_dataset_handle
            )
        ) ;

    // -------------------------------------------------------------------------

    return array(
        'default_storage_method'    =>  'basepress-dataset'     ,
        'json_data_files_dir'       =>  NULL                    ,
        'supported_datasets'        =>  $supported_datasets
        ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_imagesize_records()
// =============================================================================

function get_imagesize_records(
    $core_plugapp_dirs                      ,
    &$question_imagesize_records_changed
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer\
    // get_imagesize_records(
    //      $core_plugapp_dirs                      ,
    //      &$question_imagesize_records_changed
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // Loads the IMAGESIZE records from the in-memory cache:-
    //      $GLOBALS[ get_imagesize_records_variable_name() ]
    //
    // Loading that cache from array-stored:-
    //      get_imagesize_records_array_storage_slug()
    //
    // if this hasn't yet been done.
    //
    // RETURNS
    //      On SUCCESS
    //          ARRAY $imagesize_records
    //
    //          $imagesize_records is like (eg):-
    //
    //              array(
    //
    //                  <image_url_1>   =>  array(
    //                      'last_checked_datetime_utc'     =>  <unix-timestamp>    ,
    //                      'question_image_ok'             =>  TRUE                ,
    //                      'imagesize'                     =>  <imagesize>         ,
    //                      'width'                         =>  <width>             ,
    //                      'height'                        =>  <height>
    //                      )   ,
    //
    //                  <image_url_2>   =>  array(
    //                      'last_checked_datetime_utc'     =>  <unix-timestamp>    ,
    //                      'question_image_ok'             =>  FALSE               ,
    //                      'imagesize'                     =>  NULL                ,
    //                      'width'                         =>  NULL                ,
    //                      'height'                        =>  NULL
    //                      )   ,
    //
    //                  ...
    //
    //                  )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $varname = get_imagesize_records_variable_name() ;

    // -------------------------------------------------------------------------
    // Already loaded (this page) ?
    // -------------------------------------------------------------------------

    if (    array_key_exists(
                $varname    ,
                $GLOBALS
                )
            &&
            is_array( $GLOBALS[ $varname ] )
        ) {
        return $GLOBALS[ $varname ] ;
            //  YES!
            //      =>  Return it...
    }

    // -------------------------------------------------------------------------
    // NO!
    // -------------------------------------------------------------------------

//  require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/array-storage.php' ) ;
        //  Assumed already done (and that array storage has been initialised).

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\
    // load(
    //      $dataset_name                       ,
    //      $question_die_on_error = FALSE      ,
    //      $array_storage_data = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // Loads and returns the specified PHP numerically indexed or associative
    // ARRAY.
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
    //          ARRAY $array
    //          A possibly empty PHP numerically indexed or associative ARRAY.
    //
    //      o   On FAILURE
    //          - - - - -
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $question_die_on_error = FALSE ;

    $array_storage_data = get_array_storage_data_4_imagesize_records() ;

    // -------------------------------------------------------------------------

    $imagesize_records =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\load(
            get_imagesize_records_array_storage_slug()  ,
            $question_die_on_error                      ,
            $array_storage_data
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $imagesize_records ) ) {
        return $imagesize_records ;
    }

    // -------------------------------------------------------------------------
    // Get rid of any URLs that are more than ONE WEEK old.  So as to:-
    //
    //      1.  Result in auto-clean-up of old - and no longer in the
    //          "available ads" dataset - image URLs, and;
    //
    //      2.  Force a re-check that the image file:-
    //              a)  Still exists, and;
    //              b)  It's cached size etc data is still correct,
    //
    //          at least once a week.
    // -------------------------------------------------------------------------

    $one_week_ago = time() - ( 3600 * 24 * 7 ) ;
        //  GMT

    // -------------------------------------------------------------------------

    foreach ( $imagesize_records as $this_image_url => $this_imagesize_record_data ) {

        // ---------------------------------------------------------------------

        if ( $this_imagesize_record_data['last_checked_datetime_utc'] < $one_week_ago ) {

            unset( $imagesize_records[ $this_image_url ] ) ;

            $question_imagesize_records_changed = TRUE ;

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $GLOBALS[ $varname ] = $imagesize_records ;

    // -------------------------------------------------------------------------

    return $GLOBALS[ $varname ] ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// set_imagesize_records()
// =============================================================================

function set_imagesize_records(
    $imagesize_records
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer\
    // set_imagesize_records(
    //      $imagesize_records
    //      )
    // - - - - - - - - - - - -
    // Updates both the memory cached:-
    //      $GLOBALS[ get_imagesize_records_variable_name() ]
    //
    // and array-stored:-
    //      get_imagesize_records_array_storage_slug()
    //
    // versions of these records
    //
    // ---
    //
    // $imagesize_records should be like (eg):-
    //
    //              array(
    //
    //                  <image_url_1>   =>  array(
    //                      'last_checked_datetime_utc'     =>  <unix-timestamp>    ,
    //                      'question_image_ok'             =>  TRUE                ,
    //                      'imagesize'                     =>  <imagesize>         ,
    //                      'width'                         =>  <width>             ,
    //                      'height'                        =>  <height>
    //                      )   ,
    //
    //                  <image_url_2>   =>  array(
    //                      'last_checked_datetime_utc'     =>  <unix-timestamp>    ,
    //                      'question_image_ok'             =>  FALSE               ,
    //                      'imagesize'                     =>  NULL                ,
    //                      'width'                         =>  NULL                ,
    //                      'height'                        =>  NULL
    //                      )   ,
    //
    //                  ...
    //
    //                  )
    //
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $GLOBALS[ get_imagesize_records_variable_name() ] = $imagesize_records ;

    // -------------------------------------------------------------------------

//  require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/array-storage.php' ) ;
        //  Assumed already done (and that array storage has been initialised).

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\
    // save(
    //      $dataset_name                       ,
    //      $array_to_save                      ,
    //      $question_die_on_error = FALSE      ,
    //      $array_storage_data = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // Saves the specified (PHP) array.
    //
    // This array is typically either:-
    //
    //      o   An PHP NUMERICALLY-INDEXED ARRAY of RECORDS
    //
    //              Eg:-
    //                  $returned_array = array(
    //                      [0] =>  array(
    //                                  'name1' =>  <value1>
    //                                  'name2' =>  <value2>
    //                                  ...
    //                                  'nameN' =>  <valueN>
    //                                  )   ,
    //                      ...
    //                      )
    //
    //      o   A PHP ASSOCIATIVE ARRAY of NAME=VALUE PAIRS
    //
    //              Eg:-
    //                  $returned_array = array(
    //                      'name1' =>  <value1>
    //                      'name2' =>  <value2>
    //                      ...
    //                      'nameN' =>  <valueN>
    //                      )
    //
    //          Where each value can itself be a numeric or associative array
    //          (to any depth).
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

    $question_die_on_error = FALSE ;

    $array_storage_data = get_array_storage_data_4_imagesize_records() ;

    // -------------------------------------------------------------------------

    return \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\save(
                get_imagesize_records_array_storage_slug()  ,
                $imagesize_records                          ,
                $question_die_on_error                      ,
                $array_storage_data
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_imagesize_data_4_image_at_url()
// =============================================================================

function get_imagesize_data_4_image_at_url(
    $core_plugapp_dirs                      ,
    &$imagesize_records                     ,
    &$question_imagesize_records_changed    ,
    $image_url
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer\
    // get_imagesize_data_4_image_at_url(
    //      $core_plugapp_dirs                      ,
    //      &$imagesize_records                     ,
    //      &$question_imagesize_records_changed    ,
    //      $image_url
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS:-
    //      On SUCCESS
    //
    //          o   FALSE
    //                  (= not a valid Ad Swapper supported - ie;
    //                  web-compatable - image)
    //
    //          --OR--
    //
    //          o   ARRAY $imagesize_details
    //
    //              Where $imagesize_details is one of:-
    //
    //              --  array(
    //                      'last_checked_datetime_utc'     =>  <unix-timestamp>    ,
    //                      'question_image_ok'             =>  TRUE                ,
    //                      'imagesize'                     =>  <imagesize>         ,
    //                      'width'                         =>  <width>             ,
    //                      'height'                        =>  <height>
    //                      )
    //
    //              --  array(
    //                      'last_checked_datetime_utc'     =>  <unix-timestamp>    ,
    //                      'question_image_ok'             =>  FALSE               ,
    //                      'imagesize'                     =>  NULL                ,
    //                      'width'                         =>  NULL                ,
    //                      'height'                        =>  NULL
    //                      )
    //
    //              NOTE!
    //              =====
    //              If the specified image is OK - but ISN'T in:-
    //                  $imagesize_records
    //
    //              then adds it and updates:-
    //                  $imagesize_records
    //                  $question_imagesize_records_changed (sets it to TRUE)
    //
    //              accordingly.
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Image already in imagesize records ?
    // =========================================================================

    if (    array_key_exists(
                $image_url              ,
                $imagesize_records
                )
        ) {

        // ---------------------------------------------------------------------
        // Get it's imagesize details...
        // ---------------------------------------------------------------------

        $imagesize_details = $imagesize_records[ $image_url ] ;

        // ---------------------------------------------------------------------
        // Reload required ?
        // ---------------------------------------------------------------------

        $one_week_ago = time() - ( 3600 * 24 * 7 ) ;

        // ---------------------------------------------------------------------

        if ( $imagesize_details['last_checked_datetime_utc'] > $one_week_ago ) {
            return $imagesize_details ;
                //  NO!
        }

        // ---------------------------------------------------------------------
        // YES
        // ---------------------------------------------------------------------

        unset( $imagesize_records[ $image_url ] ) ;
            //  Force re-check

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Load/reload the imagesize details...
    // =========================================================================

//echo '<p>Loading/reloading imagesize data for:-<b>' , $image_url , '</b>' ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer\
    // validate_and_get_imagesize_4_image_at_url(
    //      $core_plugapp_dirs      ,
    //      $image_url
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS!
    //          o   FALSE
    //                  (= not a valid Ad Swapper supported - ie;
    //                  web-compatable - image)
    //
    //          --OR--
    //
    //          o   ARRAY $imagesize_details
    //
    //              (The array returned by PHP's "getimagesize()")
    //
    //              Ie:-
    //                  array(
    //                      0           =>  <width>
    //                      1           =>  <height>
    //                      2           =>  PHP <IMAGETYPE_XXX>
    //                      3           =>  'height="yyy" width="xxx"' STRING
    //                                      for IMG tag
    //                      'mime'      =>  MIME type of the image
    //                      'channels'  =>  3 for RGB imgs and 4 for CMYK imgs
    //                      'bits'      =>  number of bits for each color
    //                      )
    //
    //              NOTE!
    //              =====
    //              The IMAGETYPE_XXX will be one of:-
    //                  o   IMAGETYPE_JPEG
    //                  o   IMAGETYPE_PNG
    //                  o   IMAGETYPE_GIF
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $imagesize =
        validate_and_get_imagesize_4_image_at_url(
            $core_plugapp_dirs      ,
            $image_url
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $imagesize ) ) {
        return $imagesize ;
    }

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer\
    // add_imagesize_record(
    //      &$imagesize_records             ,
    //      &$question_imagesize_records_changed     ,
    //      $image_url                      ,
    //      $question_image_ok              ,
    //      $imagesize
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // If $question_image_ok === TRUE, then $imagesize must be the ARRAY
    // returned by PHP's "getimagesize()".  And $imagesize_records is
    // updated as follows:-
    //
    //          $imagesize_records[ $image_url ] = array(
    //              'last_checked_datetime_utc'     =>  time()          ,
    //              'question_image_ok'             =>  TRUE            ,
    //              'imagesize'                     =>  $imagesize      ,
    //              'width'                         =>  $width          ,
    //              'height'                        =>  $height
    //              ) ;
    //
    // If $question_image_ok !== TRUE, then $imagesize is discarded.  And
    // $imagesize_records is updated as follows:-
    //
    //          $imagesize_records[ $image_url ] = array(
    //              'last_checked_datetime_utc'     =>  time()      ,
    //              'question_image_ok'             =>  FALSE       ,
    //              'imagesize'                     =>  NULL        ,
    //              'width'                         =>  NULL        ,
    //              'height'                        =>  NULL
    //              ) ;
    //
    // Updates both:-
    //      $imagesize_records
    //      $question_imagesize_records_changed (sets it TRUE)
    //
    // RETURNS
    //      Nothing
    // -------------------------------------------------------------------------

    if ( is_array( $imagesize ) ) {

        $question_image_ok = TRUE ;

    } else {

        $question_image_ok = FALSE ;

        $imagesize = NULL ;

    }

    // -------------------------------------------------------------------------

    add_imagesize_record(
        $imagesize_records                      ,
        $question_imagesize_records_changed     ,
        $image_url                              ,
        $question_image_ok                      ,
        $imagesize
        ) ;

    // -------------------------------------------------------------------------

    return $imagesize_records[ $image_url ] ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// add_imagesize_record()
// =============================================================================

function add_imagesize_record(
    &$imagesize_records                     ,
    &$question_imagesize_records_changed    ,
    $image_url                              ,
    $question_image_ok                      ,
    $imagesize
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer\
    // add_imagesize_record(
    //      &$imagesize_records                     ,
    //      &$question_imagesize_records_changed    ,
    //      $image_url                              ,
    //      $question_image_ok                      ,
    //      $imagesize
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // If $question_image_ok === TRUE, then $imagesize must be the ARRAY
    // returned by PHP's "getimagesize()".  And $imagesize_records is
    // updated as follows:-
    //
    //          $imagesize_records[ $image_url ] = array(
    //              'last_checked_datetime_utc'     =>  time()          ,
    //              'question_image_ok'             =>  TRUE            ,
    //              'imagesize'                     =>  $imagesize      ,
    //              'width'                         =>  $width          ,
    //              'height'                        =>  $height
    //              ) ;
    //
    // If $question_image_ok !== TRUE, then $imagesize is discarded.  And
    // $imagesize_records is updated as follows:-
    //
    //          $imagesize_records[ $image_url ] = array(
    //              'last_checked_datetime_utc'     =>  time()      ,
    //              'question_image_ok'             =>  FALSE       ,
    //              'imagesize'                     =>  NULL        ,
    //              'width'                         =>  NULL        ,
    //              'height'                        =>  NULL
    //              ) ;
    //
    // Updates both:-
    //      $imagesize_records
    //      $question_imagesize_records_changed (sets it TRUE)
    //
    // RETURNS
    //      Nothing
    // -------------------------------------------------------------------------

    if ( $question_image_ok ) {
        $width  = $imagesize[0] ;
        $height = $imagesize[1] ;

    } else {
        $imagesize = NULL ;
        $width     = NULL ;
        $height    = NULL ;

    }

    // -------------------------------------------------------------------------

    $imagesize_records[ $image_url ] = array(
        'last_checked_datetime_utc'     =>  time()                  ,
        'question_image_ok'             =>  $question_image_ok      ,
        'imagesize'                     =>  $imagesize              ,
        'width'                         =>  $width                  ,
        'height'                        =>  $height
        ) ;

    // -------------------------------------------------------------------------

    $question_imagesize_records_changed = TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// update_imagesize_record()
// =============================================================================

function update_imagesize_record(
    &$imagesize_records                     ,
    &$question_imagesize_records_changed    ,
    $image_url                              ,
    $question_image_ok                      ,
    $imagesize
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer\
    // update_imagesize_record(
    //      &$imagesize_records                     ,
    //      &$question_imagesize_records_changed    ,
    //      $image_url                              ,
    //      $question_image_ok                      ,
    //      $imagesize
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // If $question_image_ok === TRUE, then $imagesize must be the ARRAY
    // returned by PHP's "getimagesize()".  And $imagesize_records is
    // updated as follows:-
    //
    //          $imagesize_records[ $image_url ] = array(
    //              'last_checked_datetime_utc'     =>  time()          ,
    //              'question_image_ok'             =>  TRUE            ,
    //              'imagesize'                     =>  $imagesize      ,
    //              'width'                         =>  $width          ,
    //              'height'                        =>  $height
    //              ) ;
    //
    // If $question_image_ok !== TRUE, then $imagesize is discarded.  And
    // $imagesize_records is updated as follows:-
    //
    //          $imagesize_records[ $image_url ] = array(
    //              'last_checked_datetime_utc'     =>  time()      ,
    //              'question_image_ok'             =>  FALSE       ,
    //              'imagesize'                     =>  NULL        ,
    //              'width'                         =>  NULL        ,
    //              'height'                        =>  NULL
    //              ) ;
    //
    // Updates both:-
    //      $imagesize_records
    //      $question_imagesize_records_changed (sets it TRUE)
    //
    // RETURNS
    //      Nothing
    // -------------------------------------------------------------------------

    return add_imagesize_record(
                $imagesize_records                      ,
                $question_imagesize_records_changed     ,
                $image_url                              ,
                $question_image_ok                      ,
                $imagesize
                ) ;
        //  It's the exact same code as for ADDING an imagesize record.

    // -------------------------------------------------------------------------

}

// =============================================================================
// validate_and_get_imagesize_4_image_at_url()
// =============================================================================

function validate_and_get_imagesize_4_image_at_url(
    $core_plugapp_dirs      ,
    $image_url
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_AdDisplayer\
    // validate_and_get_imagesize_4_image_at_url(
    //      $core_plugapp_dirs      ,
    //      $image_url
    //      )
    // - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS!
    //          o   FALSE
    //                  (= not a valid Ad Swapper supported - ie;
    //                  web-compatable - image)
    //
    //          --OR--
    //
    //          o   ARRAY $imagesize_details
    //
    //              (The array returned by PHP's "getimagesize()")
    //
    //              Ie:-
    //                  array(
    //                      0           =>  <width>
    //                      1           =>  <height>
    //                      2           =>  PHP <IMAGETYPE_XXX>
    //                      3           =>  'height="yyy" width="xxx"' STRING
    //                                      for IMG tag
    //                      'mime'      =>  MIME type of the image
    //                      'channels'  =>  3 for RGB imgs and 4 for CMYK imgs
    //                      'bits'      =>  number of bits for each color
    //                      )
    //
    //              NOTE!
    //              =====
    //              The IMAGETYPE_XXX will be one of:-
    //                  o   IMAGETYPE_JPEG
    //                  o   IMAGETYPE_PNG
    //                  o   IMAGETYPE_GIF
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // image_url specified and valid ?
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/validata/url-validators.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\
    // absolute_url_string__minLen_maxLen_questionEmptyOK(
    //      $value                              ,
    //      $minlen            = 'default'      ,
    //      $maxlen            = 'default'      ,
    //      $question_empty_ok = TRUE
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // NOTES!
    // ------
    // 1.   $question_empty_ok gives you the flexibility to specify (eg):-
    //          o   $minlen = 32
    //          o   $maxlen = 64
    //          o   $question_empty_ok = TRUE
    //
    //      So as to permit either:-
    //          o   The empty string, or;
    //          o   A 32 to 64 character URL string.
    //
    // 2.   Default $minlen = 10 = strlen( "http://x.y" )
    //      (= shortest possible absolute URL).
    //
    // 3.   Default $maxlen = 2000
    //      See (eg):
    //          http://stackoverflow.com/questions/417142/what-is-the-maximum-length-of-a-url-in-different-browsers
    //
    // RETURNS
    //      On SUCCESS!
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $image_url_minlen            = 'default' ;
    $image_url_maxlen            = 'default' ;
    $image_url_question_empty_ok = FALSE     ;

    // -------------------------------------------------------------------------

    $result =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\absolute_url_string__minLen_maxLen_questionEmptyOK(
            $image_url                      ,
            $image_url_minlen               ,
            $image_url_maxlen               ,
            $image_url_question_empty_ok
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;

    } elseif ( $result !== TRUE ) {
        return FALSE ;

    }

    // =========================================================================
    // Check that the image exists, and is valid..
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

    $imagesize = getimagesize( $image_url ) ;

    // -------------------------------------------------------------------------

    if (    $imagesize === FALSE
            ||
            ! in_array(
                    $imagesize[2]                                               ,
                    array( IMAGETYPE_JPEG , IMAGETYPE_PNG , IMAGETYPE_GIF )     ,
                    TRUE
                    )
        ) {
        return FALSE ;
    }

    // -------------------------------------------------------------------------

    return $imagesize ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

