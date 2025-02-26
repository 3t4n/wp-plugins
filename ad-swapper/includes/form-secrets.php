<?php

// *****************************************************************************
// INCLUDES / FORM-SECRETS.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_formSecrets ;

// =============================================================================
// The "Form Secrets" dataset...
// =============================================================================

function get_form_secrets_dataset_details() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_formSecrets\
    // get_form_secrets_dataset_details()
    // - - - - - - - - - - - - - - - - -
    // RETURNS
    //      ARRAY $form_secrets_dataset_details = array(
    //                  'dataset_slug'              =>  "xxx"                       ,
    //                  'basepress_dataset_handle'  =>  $basepress_dataset_handle   ,
    //                  'array_storage_data'        =>  $array_storage_data
    //                  )
    //
    //      Where: $basepress_dataset_handle = array(
    //          'nice_name'     =>  "xxx"   ,
    //          'unique_key'    =>  "yyy"   ,
    //          'version'       =>  "zzz"
    //          )
    //
    //      And: $array_storage_data = array(
    //          'default_storage_method'    =>  "json" | "basepress-dataset"    ,
    //          'json_data_files_dir'       =>  NULL | "xxx"                    ,
    //          'supported_datasets'        =>  $supported_datasets
    //          ) ;
    //
    //      And: $supported_datasets = array
    //          "<dataset_slug>"    =>  array(
    //              'storage_method'            =>  "json" | "basepress-dataset"    ,
    //              'json_filespec'             =>  NULL | "xxx"                    ,
    //              'basepress_dataset_handle'  =>  $basepress_dataset_handle
    //              )
    //          ...
    //          )
    // -------------------------------------------------------------------------

    $basepress_dataset_uid =
        '0e4f5647-74e1-402d-973f-1bd73ed57f24' . '-' .
        'd5d94d37-d481-4dc6-b94a-8a59ca2cf142' . '-' .
        'e4520bd0-e440-4aa6-b430-2b9e1dfb75cc' . '-' .
        '1340f1f7-c572-4b38-8684-0c8940a1be18'
        ;

    // -------------------------------------------------------------------------

    $basepress_dataset_handle = array(
        'nice_name'     =>  'greatKiwi_byFernTec_formSecrets'   ,
        'unique_key'    =>  $basepress_dataset_uid              ,
        'version'       =>  '0.1'
        ) ;

    // -------------------------------------------------------------------------

    $dataset_slug = 'great_kiwi_form_secrets' ;

    // -------------------------------------------------------------------------

    $supported_datasets = array(
        $dataset_slug   =>  array(
            'storage_method'            =>  'basepress-dataset'         ,
            'json_filespec'             =>  NULL                        ,
            'basepress_dataset_handle'  =>  $basepress_dataset_handle
            )
        ) ;

    // -------------------------------------------------------------------------

    $array_storage_data = array(
        'default_storage_method'    =>  'basepress-dataset'     ,
        'json_data_files_dir'       =>  NULL                    ,
        'supported_datasets'        =>  $supported_datasets
        ) ;

    // -------------------------------------------------------------------------

    return array(
        'dataset_slug'              =>  $dataset_slug               ,
        'basepress_dataset_handle'  =>  $basepress_dataset_handle   ,
        'array_storage_data'        =>  $array_storage_data
        ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_new_form_secret()
// =============================================================================

function get_new_form_secret(
    $form_name                  ,
    $instance_data_or_hash
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_formSecrets\
    // get_new_form_secret(
    //      $form_name                  ,
    //      $instance_data_or_hash
    //      )
    // - - - - - - - - - - - - - - - - -
    // A "form secret" is a 128 character random hex string.  That's unique to
    // the supplied:-
    //      o   $form_name
    //      o   $instance_data_or_hash
    // and;
    //      o   $_SERVER['REMOTE_ADDR']
    //      o   $_SERVER['HTTP_USER_AGENT']
    //
    // A copy of the form secret and the above details is kept in a record
    // in the "Form Secrets" dataset.  The form secret should be included in
    // the GET/POST data when the form is submitted.  The submission is then
    // only accepted if a "Form Secrets" record with the matching details
    // exists.
    //
    // RETURNS
    //      On SUCCESS
    //          $form_secret STRING
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    // =========================================================================
    // Get the "Form Secrets" dataset details...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_formSecrets\
    // get_form_secrets_dataset_details()
    // - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      ARRAY $form_secrets_dataset_details = array(
    //                  'dataset_slug'              =>  "xxx"                       ,
    //                  'basepress_dataset_handle'  =>  $basepress_dataset_handle   ,
    //                  'array_storage_data'        =>  $array_storage_data
    //                  )
    //
    //      Where: $basepress_dataset_handle = array(
    //          'nice_name'     =>  "xxx"   ,
    //          'unique_key'    =>  "yyy"   ,
    //          'version'       =>  "zzz"
    //          )
    //
    //      And: $array_storage_data = array(
    //          'default_storage_method'    =>  "json" | "basepress-dataset"    ,
    //          'json_data_files_dir'       =>  NULL | "xxx"                    ,
    //          'supported_datasets'        =>  $supported_datasets
    //          ) ;
    //
    //      And: $supported_datasets = array
    //          "<dataset_slug>"    =>  array(
    //              'storage_method'            =>  "json" | "basepress-dataset"    ,
    //              'json_filespec'             =>  NULL | "xxx"                    ,
    //              'basepress_dataset_handle'  =>  $basepress_dataset_handle
    //              )
    //          ...
    //          )
    // -------------------------------------------------------------------------

    $form_secrets_dataset_details =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_formSecrets\get_form_secrets_dataset_details()
        ;

    // =========================================================================
    // LOAD the current "Form Secrets" dataset...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/array-storage.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\
    // load_numerically_indexed(
    //      $dataset_name                       ,
    //      $question_die_on_error = FALSE      ,
    //      $array_storage_data = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Loads and returns the specified PHP numerically indexed array.
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
    //          A possibly empty PHP numerically indexed ARRAY.
    //
    //      o   On FAILURE
    //          - - - - -
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $question_die_on_error = FALSE ;

    // -------------------------------------------------------------------------

    $form_secret_records =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\load_numerically_indexed(
            $form_secrets_dataset_details['dataset_slug']           ,
            $question_die_on_error                                  ,
            $form_secrets_dataset_details['array_storage_data']
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $form_secret_records ) ) {
        return array( $form_secret_records ) ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $form_secret_records = Array(
    //
    //          [0] => Array(
    //                      [form_name]             => toggle-outgoing-ad-from-ad-swapper-central
    //                      [instance_data_or_hash] => ncgh-vzkm
    //                      [REMOTE_ADDR]           => 127.0.0.1
    //                      [HTTP_USER_AGENT]       => Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0
    //                      [start_datetime_utc]    => 1421400378
    //                      [form_secret]           => 8cc85bb24d630ad37eb17825bdda0294803616dd18a058375dce15cdc5fb3ddea337c457a9e22a9f82f45296b56c445b54503eafa54610ed4d1bafddaf6f632c
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $form_secret_records , '$form_secret_records' ) ;

    // =========================================================================
    // Delete any:-
    //      o   Timed-out scecrets, and;
    //      o   Existing secrets for this form, REMOTE_ADDR and
    //          HTTP_USER_AGENT...
    // =========================================================================

    $timeout_start_datetime_utc = time() - 3600 ;
        //  Forms time out after 1 hour...

    // -------------------------------------------------------------------------

    foreach ( $form_secret_records as $this_index => $this_record ) {

        // ---------------------------------------------------------------------
        // Delete any timed out forms...
        // ---------------------------------------------------------------------

        if ( $this_record['start_datetime_utc'] < $timeout_start_datetime_utc ) {
            unset( $form_secret_records[ $this_index ] ) ;
            continue ;
        }

        // ---------------------------------------------------------------------
        // Delete any (un-timed-out) instances of this form for the same IP
        // address and browser...
        // ---------------------------------------------------------------------

        if (    $this_record['form_name'] === $form_name
                &&
                $this_record['instance_data_or_hash'] === $instance_data_or_hash
                &&
                $this_record['REMOTE_ADDR'] === $_SERVER['REMOTE_ADDR']
                &&
                $this_record['HTTP_USER_AGENT'] === $_SERVER['HTTP_USER_AGENT']
            ) {
            unset( $form_secret_records[ $this_index ] ) ;
            continue ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Generate a new, random "form secret" string...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/random.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_random\
    // secure_rand(
    //      $length
    //      )
    // - - - - - -
    // According to it's author, this routine generates a really strong
    // random number in PHP.
    //
    // See:-
    //      http://www.zimuel.it/strong-cryptography-in-php/
    //
    // NOTES!
    // ======
    // 1.   $length is in bytes.
    //
    // 2.   By default, this function calls PHPs:-
    //          openssl_random_pseudo_bytes()
    //      function (which is supposedly the best way to generate random
    //      numbers in PHP).
    //
    // 3.   The returned value is a STRING.
    //
    // 4.   The returned STRING is binary (NOT hex-encoded).  Thus it's just
    //      rubbish characters (when displayed).
    // -------------------------------------------------------------------------

    $length = 64 ;

    // -------------------------------------------------------------------------

    $form_secret =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_random\secure_rand(
            $length
            ) ;

    // =========================================================================
    // Hex-encode the form secret (to avoid problems when it's placed in
    // URLs)...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/string-utils.php' ) ;

    // -------------------------------------------------------------------------

    $form_secret =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\hex_encode(
            $form_secret
            ) ;

    // =========================================================================
    // Create the new "Form Secrets" record...
    // =========================================================================

    $new_form_secrets_record = array(
        'form_name'             =>  $form_name                      ,
        'instance_data_or_hash' =>  $instance_data_or_hash          ,
        'REMOTE_ADDR'           =>  $_SERVER['REMOTE_ADDR']         ,
        'HTTP_USER_AGENT'       =>  $_SERVER['HTTP_USER_AGENT']     ,
        'start_datetime_utc'    =>  time()                          ,
        'form_secret'           =>  $form_secret
        ) ;

    // =========================================================================
    // Append the new entry to the "Form Secrets" dataset...
    // =========================================================================

    $form_secret_records[] = $new_form_secrets_record ;

    // =========================================================================
    // Save the updated "Form Secrets" dataset...
    // =========================================================================

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

//  $question_die_on_error = FALSE ;

    // -------------------------------------------------------------------------

    $result =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\save_numerically_indexed(
            $form_secrets_dataset_details['dataset_slug']           ,
            $form_secret_records                                    ,
            $question_die_on_error                                  ,
            $form_secrets_dataset_details['array_storage_data']
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return array( $result ) ;
    }

    // =========================================================================
    // Return the new "form secret"...
    // =========================================================================

    return $form_secret ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// validate_form_secret()
// =============================================================================

function validate_form_secret(
    $form_name                  ,
    $instance_data_or_hash      ,
    $form_secret
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_formSecrets\
    // validate_form_secret(
    //      $form_name                  ,
    //      $instance_data_or_hash      ,
    //      $form_secret
    //      )
    // - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          One of:-
    //          o   ARRAY $form_secret_record (if the form secret WAS found).
    //              Where $form_secret_record is like (eg):-
    //                  array(
    //                      'form_name'             =>  $form_name              ,
    //                      'instance_data_or_hash' =>  $instance_data_or_hash  ,
    //                      'REMOTE_ADDR'           =>  "xxx"                   ,
    //                      'HTTP_USER_AGENT'       =>  "yyy"                   ,
    //                      'start_datetime_utc'    =>  ZZZ                     ,
    //                      'form_secret'           =>  $form_secret
    //                      )
    //          o   FALSE (if the specified form secret WASN'T found).
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Get the "Form Secrets" dataset details...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_formSecrets\
    // get_form_secrets_dataset_details()
    // - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      ARRAY $form_secrets_dataset_details = array(
    //                  'dataset_slug'              =>  "xxx"                       ,
    //                  'basepress_dataset_handle'  =>  $basepress_dataset_handle   ,
    //                  'array_storage_data'        =>  $array_storage_data
    //                  )
    //
    //      Where: $basepress_dataset_handle = array(
    //          'nice_name'     =>  "xxx"   ,
    //          'unique_key'    =>  "yyy"   ,
    //          'version'       =>  "zzz"
    //          )
    //
    //      And: $array_storage_data = array(
    //          'default_storage_method'    =>  "json" | "basepress-dataset"    ,
    //          'json_data_files_dir'       =>  NULL | "xxx"                    ,
    //          'supported_datasets'        =>  $supported_datasets
    //          ) ;
    //
    //      And: $supported_datasets = array
    //          "<dataset_slug>"    =>  array(
    //              'storage_method'            =>  "json" | "basepress-dataset"    ,
    //              'json_filespec'             =>  NULL | "xxx"                    ,
    //              'basepress_dataset_handle'  =>  $basepress_dataset_handle
    //              )
    //          ...
    //          )
    // -------------------------------------------------------------------------

    $form_secrets_dataset_details =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_formSecrets\get_form_secrets_dataset_details()
        ;

    // =========================================================================
    // LOAD the current "Form Secrets" dataset...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/array-storage.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\
    // load_numerically_indexed(
    //      $dataset_name                       ,
    //      $question_die_on_error = FALSE      ,
    //      $array_storage_data = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Loads and returns the specified PHP numerically indexed array.
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
    //          A possibly empty PHP numerically indexed ARRAY.
    //
    //      o   On FAILURE
    //          - - - - -
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $question_die_on_error = FALSE ;

    // -------------------------------------------------------------------------

    $form_secret_records =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\load_numerically_indexed(
            $form_secrets_dataset_details['dataset_slug']           ,
            $question_die_on_error                                  ,
            $form_secrets_dataset_details['array_storage_data']
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $form_secret_records ) ) {
        return $form_secret_records ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $form_secret_records = Array(
    //
    //          [0] => Array(
    //                      [form_name]             => toggle-outgoing-ad-from-ad-swapper-central
    //                      [instance_data_or_hash] => ncgh-vzkm
    //                      [REMOTE_ADDR]           => 127.0.0.1
    //                      [HTTP_USER_AGENT]       => Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0
    //                      [start_datetime_utc]    => 1421400378
    //                      [form_secret]           => 8cc85bb24d630ad37eb17825bdda0294803616dd18a058375dce15cdc5fb3ddea337c457a9e22a9f82f45296b56c445b54503eafa54610ed4d1bafddaf6f632c
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $form_secret_records , '$form_secret_records' ) ;

    // =========================================================================
    // Loop over the form secrets:-
    //      1.  Deleting any timed-out secrets, and;
    //      2.  Searching for the secret to be validated.
    // =========================================================================

    $timeout_start_datetime_utc = time() - 3600 ;
        //  Forms time out after 1 hour...

    // -------------------------------------------------------------------------

    $question_any_form_secret_records_deleted = FALSE ;

    // -------------------------------------------------------------------------

    $matching_secret_record_data = FALSE ;

    // -------------------------------------------------------------------------

    foreach ( $form_secret_records as $this_index => $this_record ) {

        // ---------------------------------------------------------------------
        // Delete any timed out records...
        // ---------------------------------------------------------------------

        if ( $this_record['start_datetime_utc'] < $timeout_start_datetime_utc ) {
            unset( $form_secret_records[ $this_index ] ) ;
            $question_any_form_secret_records_deleted = TRUE ;
            continue ;
        }

        // ---------------------------------------------------------------------
        // Is this the form secret record ?
        // ---------------------------------------------------------------------

        if (    $this_record['form_name'] === $form_name
                &&
                $this_record['instance_data_or_hash'] === $instance_data_or_hash
                &&
                $this_record['REMOTE_ADDR'] === $_SERVER['REMOTE_ADDR']
                &&
                $this_record['HTTP_USER_AGENT'] === $_SERVER['HTTP_USER_AGENT']
                &&
                $this_record['form_secret'] === $form_secret
            ) {
            $matching_secret_record_data = $this_record ;
        }

        // ---------------------------------------------------------------------
        // Repeat until we've checked all records (so that time-out deletion
        // checking is done on ALL records).
        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Save the updated "Form Secrets" dataset (if necessary)...
    // =========================================================================

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

    if ( $question_any_form_secret_records_deleted ) {

        // ---------------------------------------------------------------------

//      $question_die_on_error = FALSE ;

        // ---------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\save_numerically_indexed(
                $form_secrets_dataset_details['dataset_slug']           ,
                $form_secret_records                                    ,
                $question_die_on_error                                  ,
                $form_secrets_dataset_details['array_storage_data']
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SUCCESS/FAILURE
    // =========================================================================

    return $matching_secret_record_data ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// delete_form_secret()
// =============================================================================

function delete_form_secret(
    $form_name                  ,
    $instance_data_or_hash      ,
    $form_secret
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_formSecrets\
    // delete_form_secret(
    //      $form_name                  ,
    //      $instance_data_or_hash      ,
    //      $form_secret
    //      )
    // - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          TRUE (if the specified form secret either didn't exist,
    //          or was deleted OK).
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Get the "Form Secrets" dataset details...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_formSecrets\
    // get_form_secrets_dataset_details()
    // - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      ARRAY $form_secrets_dataset_details = array(
    //                  'dataset_slug'              =>  "xxx"                       ,
    //                  'basepress_dataset_handle'  =>  $basepress_dataset_handle   ,
    //                  'array_storage_data'        =>  $array_storage_data
    //                  )
    //
    //      Where: $basepress_dataset_handle = array(
    //          'nice_name'     =>  "xxx"   ,
    //          'unique_key'    =>  "yyy"   ,
    //          'version'       =>  "zzz"
    //          )
    //
    //      And: $array_storage_data = array(
    //          'default_storage_method'    =>  "json" | "basepress-dataset"    ,
    //          'json_data_files_dir'       =>  NULL | "xxx"                    ,
    //          'supported_datasets'        =>  $supported_datasets
    //          ) ;
    //
    //      And: $supported_datasets = array
    //          "<dataset_slug>"    =>  array(
    //              'storage_method'            =>  "json" | "basepress-dataset"    ,
    //              'json_filespec'             =>  NULL | "xxx"                    ,
    //              'basepress_dataset_handle'  =>  $basepress_dataset_handle
    //              )
    //          ...
    //          )
    // -------------------------------------------------------------------------

    $form_secrets_dataset_details =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_formSecrets\get_form_secrets_dataset_details()
        ;

    // =========================================================================
    // LOAD the current "Form Secrets" dataset...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/array-storage.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\
    // load_numerically_indexed(
    //      $dataset_name                       ,
    //      $question_die_on_error = FALSE      ,
    //      $array_storage_data = NULL
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Loads and returns the specified PHP numerically indexed array.
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
    //          A possibly empty PHP numerically indexed ARRAY.
    //
    //      o   On FAILURE
    //          - - - - -
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $question_die_on_error = FALSE ;

    // -------------------------------------------------------------------------

    $form_secret_records =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\load_numerically_indexed(
            $form_secrets_dataset_details['dataset_slug']           ,
            $question_die_on_error                                  ,
            $form_secrets_dataset_details['array_storage_data']
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $form_secret_records ) ) {
        return $form_secret_records ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $form_secret_records = Array(
    //
    //          [0] => Array(
    //                      [form_name]             => toggle-outgoing-ad-from-ad-swapper-central
    //                      [instance_data_or_hash] => ncgh-vzkm
    //                      [REMOTE_ADDR]           => 127.0.0.1
    //                      [HTTP_USER_AGENT]       => Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0
    //                      [start_datetime_utc]    => 1421400378
    //                      [form_secret]           => 8cc85bb24d630ad37eb17825bdda0294803616dd18a058375dce15cdc5fb3ddea337c457a9e22a9f82f45296b56c445b54503eafa54610ed4d1bafddaf6f632c
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $form_secret_records , '$form_secret_records' ) ;

    // =========================================================================
    // Loop over the form secrets, deleting:-
    //      1.  Any timed-out secrets, and;
    //      2.  The secret to be deleted.
    // =========================================================================

    $timeout_start_datetime_utc = time() - 3600 ;
        //  Forms time out after 1 hour...

    // -------------------------------------------------------------------------

    $question_any_form_secret_records_deleted = FALSE ;

    // -------------------------------------------------------------------------

    foreach ( $form_secret_records as $this_index => $this_record ) {

        // ---------------------------------------------------------------------
        // Delete any timed out records...
        // ---------------------------------------------------------------------

        if ( $this_record['start_datetime_utc'] < $timeout_start_datetime_utc ) {
            unset( $form_secret_records[ $this_index ] ) ;
            $question_any_form_secret_records_deleted = TRUE ;
            continue ;
        }

        // ---------------------------------------------------------------------
        // Delete the specified form secret record...
        // ---------------------------------------------------------------------

        if (    $this_record['form_name'] === $form_name
                &&
                $this_record['instance_data_or_hash'] === $instance_data_or_hash
                &&
                $this_record['REMOTE_ADDR'] === $_SERVER['REMOTE_ADDR']
                &&
                $this_record['HTTP_USER_AGENT'] === $_SERVER['HTTP_USER_AGENT']
                &&
                $this_record['form_secret'] === $form_secret
            ) {
            unset( $form_secret_records[ $this_index ] ) ;
            $question_any_form_secret_records_deleted = TRUE ;
        }

        // ---------------------------------------------------------------------
        // Repeat until we've checked all records (so that time-out deletion
        // checking is done on ALL records).
        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Save the updated "Form Secrets" dataset (if necessary)...
    // =========================================================================

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

    if ( $question_any_form_secret_records_deleted ) {

        // ---------------------------------------------------------------------

//      $question_die_on_error = FALSE ;

        // ---------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\save_numerically_indexed(
                $form_secrets_dataset_details['dataset_slug']           ,
                $form_secret_records                                    ,
                $question_die_on_error                                  ,
                $form_secrets_dataset_details['array_storage_data']
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SUCCESS
    // =========================================================================

    return TRUE ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

