<?php

// *****************************************************************************
// DATASET-MANAGER / MYSQL-ARRAY-STORAGE-KEY-FIELD-OVERRIDES-SUPPORT.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// get_allowed_array_storage_key_field_formats()
// =============================================================================

function get_allowed_array_storage_key_field_formats(
    $old_new
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_allowed_array_storage_key_field_formats(
    //      $old_new
    //      )
    // - - - - - - - - - - - - - - - - - - - - - -
    // $old_new = "old" or "new"
    //
    // RETURNS
    //      On SUCCESS
    //          $allowed_key_field_formats = array(...)
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    if ( $old_new === 'old' ) {

        return array(
                    'sequential-id'         ,
                    'ctype-digit'           ,
                    'great-kiwi-password'
                    ) ;

    } elseif ( $old_new === 'new' ) {

        return array(   'mysql-bigint-id'       ,
                        'sequential-id'         ,
                        'great-kiwi-password'   ,
                        'url'                   ,
                        'custom-function'
                        ) ;

    }

    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    return <<<EOT
PROBLEM:&nbsp; Bad "storage_method" ("array-storage" or "mysql" expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_check_mysql_array_storage_key_field_overrides()
// =============================================================================

function get_check_mysql_array_storage_key_field_overrides(
    $caller_apps_includes_dir       ,
    $selected_datasets_dmdd         ,
    $dataset_title                  ,
    $dataset_record_data
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_check_mysql_array_storage_key_field_overrides(
    //      $caller_apps_includes_dir       ,
    //      $selected_datasets_dmdd         ,
    //      $dataset_title                  ,
    //      $dataset_record_data
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // If $dataset_record_data is STRING
    //      then $key_field_value = $_GET[ $dataset_record_data ]
    // Else (If $dataset_record_data is ARRAY):-
    //      then $key_field_value = $dataset_record_data[ <key_field_slug> ]
    //
    // RETURNS:-
    //      On SUCCESS
    //          NULL means there are NO mysql array storage key field overrides
    //          --OR--
    //          $key_field_details = array(
    //              'slug'                              =>  "xxx"                   ,
    //              'format'                            =>  "yyy"                   ,
    //              'value'                             =>  "zzz"                   ,
    //              'fail_link_creation_silently'       =>  TRUE/FALSE              ,
    //              'url_encode_function_name'          =>  "" | "aaa"              ,
    //              'url_decode_function_name'          =>  "" | "bbb"
    //              )
    //
    //              Where:-
    //
    //              o   $key_field_details['format'] is one of:-
    //                  --  OLD VERSION
    //                      #   "sequential-id"         (default)
    //                      #   "ctype-digit"
    //                      #   "great-kiwi-password"
    //                  --  NEW VERSION
    //                      #   "mysql-bigint-id"       (default)
    //                      #   "sequential-id"
    //                      #   "great-kiwi-password"
    //                      #   "url"
    //                      #   "custom-function"
    //
    //              o   $key_field_details['value'] is the (validated and ok)
    //                  value from the specified dataset record.
    //
    //              o   $key_field_details['fail_link_creation_silently'] means
    //                  that the key field contained NO value - but instead of
    //                  issuing an error, the caller should just NOT create
    //                  the "edit"/"delete" record link.
    //
    //              o   $key_field_details['url_encode_function_name']:-
    //                  --  Can be the empty string (if NO key field url encode
    //                      function is to be used).
    //                  --  If other than the empty string, then the specified
    //                      function exists.
    //
    //              o   $key_field_details['url_decode_function_name']:-
    //                  --  Can be the empty string (if NO key field url decode
    //                      function is to be used).
    //                  --  If other than the empty string, then the specified
    //                      function exists.
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // OVERVIEW
    // ========
    // For use with tables that are stored in a MySql database (as opposed to
    // array storage).
    //
    // In this case, instead of having a record like (eg):-
    //
    //      array(
    //          'created_server_datetime_utc'           =>  xxx
    //          'last_modified_server_datetime_utc'     =>  xxx
    //
    //          'key'                                   =>  xxx     //  DELETED
    //
    //          'target_site_url'                       =>  xxx
    //          'start_year_utc'                        =>  xxx
    //          'start_month_utc'                       =>  xxx
    //          'start_day_utc'                         =>  xxx
    //          'end_year_utc'                          =>  xxx
    //          'end_month_utc'                         =>  xxx
    //          'end_day_utc'                           =>  xxx
    //          )
    //
    // we have a record like (eg):-
    //
    //      array(
    //          'id'                                    =>  xxx     //  ADDED
    //          'created_server_datetime'               =>  xxx     //  ADDED
    //          'last_modified_server_datetime'         =>  xxx     //  ADDED
    //
    //          'created_server_datetime_utc'           =>  xxx
    //          'last_modified_server_datetime_utc'     =>  xxx
    //
    //          'target_site_url'                       =>  xxx
    //          'start_year_utc'                        =>  xxx
    //          'start_month_utc'                       =>  xxx
    //          'start_day_utc'                         =>  xxx
    //          'end_year_utc'                          =>  xxx
    //          'end_month_utc'                         =>  xxx
    //          'end_day_utc'                           =>  xxx
    //          )
    //
    // The big change is that the "key" field disappears, and is replaced by
    // the "id" field.
    //
    // Which affects "edit" and "delete" record selection.
    //
    // Since the "record_key" GET variable can no longer hold the contents
    // of the record to be edited/deleted's "key" field.  Instead, some other
    // field must be used.
    //
    // We could just default to the "id" field.  But to give more flexibility,
    // we allow the dataset definer to specify the field to be used.
    //
    // OLD SYSTEM
    // ----------
    // Was like (eg):-
    //
    //      $dataset_details = array(
    //          ...
    //          'dataset_slug'                      =>  'ad_swapper_central_site_registrations'     ,
    //          ...
    //          'array_storage_key_field_slug'      =>  'key'                                       ,
    //          ...
    //          'storage_method'    =>  'mysql'     ,   //  "array-storage" or "mysql"
    //          ...
    //          'mysql_overrides'   =>  array(
    //              'array_storage_key_field_slug'                      =>  'ad_swapper_site_sid'   ,
    //              'key_field_format'                                  =>  'sequential-id'         ,
    //              'key_field_format_args'                             =>  NULL                    ,
    //              'fail_link_creation_silently_on_empty_record_key'   =>  TRUE
    //              )
    //          ...
    //          )
    //
    //      Where "key_field_format" could be one of:-
    //          o   "sequential-id"         (default)
    //          o   "ctype-digit"
    //          o   "great-kiwi-password"
    //
    // The old system wasn't fully implemented (and was partially broken).
    //
    // It's retained for backward compatability (to eliminate the need to
    // update the old applications/plugins that use it).
    //
    // NEW SYSTEM
    // ----------
    // Is (eg):-
    //
    //      $dataset_details = array(
    //          ...
    //          'dataset_slug'                      =>  'ad_swapper_central_manual_registrations'   ,
    //          ...
    //          'array_storage_key_field_slug'      =>  'key'                               ,
    //          ...
    //          'storage_method'                    =>  'mysql'     ,   //  "array-storage" or "mysql"
    //          ...
    //          'mysql_overrides'                   =>  array(
    //              'array_storage_key_field'       =>  array(
    //                  'slug'                                              =>  'id'                ,
    //                  'format'                                            =>  'mysql-bigint-id'   ,
    //                  'format_args'                                       =>  array()             ,
    //  //              'custom_validation_function_name'                   =>  ''                  ,
    //                  'fail_link_creation_silently_on_empty_record_key'   =>  FALSE               ,
    //                  'url_encode_function_name'                          =>  ''                  ,
    //                  'url_decode_function_name'                          =>  ''
    //                  )
    //              )
    //
    //          )
    //
    //      Where:-
    //
    //      1.  "format" can be one of:-
    //          --  "mysql-bigint-id"       (default)
    //          --  "sequential-id"
    //          --  "great-kiwi-password"
    //          --  "url"
    //          --  "custom-function"
    //
    //      2.  "format_args" is "format" dependent, as follows:-
    //
    //          --  "mysql-bigint-id"
    //                  NOT USED
    //
    //          --  "sequential-id"
    //                  NOT USED
    //
    //          --  "great-kiwi-password"
    //                  $options array as required by:-
    //                      \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\question_grouped_random_password()
    //
    //          --  "url"
    //                  array(
    //                      'minlen'    =>  N --or-- "default" = 10
    //                      'maxlen'    =>  N --or-- "default" = 2000
    //                      )
    //
    //          --  "custom_function"
    //                  Array of parameters (for the called function), as
    //                  required by:-
    //                      call_user_func_array()
    //
    //      3.  "custom_validation_function_name" is only required if:-
    //              "format" = "custom-function"
    //
    // The new system should be used for all new applications/plugins.
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $dataset_record_data , '$dataset_record_data' ) ;

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Storage Method Dependent...
    // =========================================================================

    if ( array_key_exists( 'storage_method' , $selected_datasets_dmdd ) ) {
        $storage_method = $selected_datasets_dmdd['storage_method'] ;

    } else {
        $storage_method = 'array-storage' ;

    }

    // -------------------------------------------------------------------------

    if ( $storage_method === 'array-storage' ) {

        // =====================================================================
        // ARRAY-STORAGE
        // =====================================================================

        return NULL ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( $storage_method !== 'mysql' ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "storage_method" ("array-storage" or "mysql" expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // =========================================================================
    // MYSQL
    // =========================================================================

    if ( ! array_key_exists( 'mysql_overrides' , $selected_datasets_dmdd ) ) {

        return <<<EOT
PROBLEM:&nbsp; No "mysql_overrides"
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    if ( ! is_array( $selected_datasets_dmdd['mysql_overrides'] ) ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "mysql_overrides" (array expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // =========================================================================
    // No "new" system ?
    //
    // If so, call the old...
    // =========================================================================

    if (    ! array_key_exists( 'array_storage_key_field' , $selected_datasets_dmdd['mysql_overrides'] )
            ||
            ! is_array( $selected_datasets_dmdd['mysql_overrides']['array_storage_key_field'] )
            ||
            count( $selected_datasets_dmdd['mysql_overrides']['array_storage_key_field'] ) === 0
        ) {

        // ---------------------------------------------------------------------

        $result = get_check_mysql_array_storage_key_field_overrides_old(
                        $caller_apps_includes_dir       ,
                        $selected_datasets_dmdd         ,
                        $dataset_title                  ,
                        $dataset_record_data
                        ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) || $result === NULL ) {
            return $result ;
        }

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $result = array(
        //          'slug'                          =>  "xxx"           ,
        //          'format'                        =>  "yyy"           ,
        //          'value'                         =>  "zzz"           ,
        //          'fail_link_creation_silently'   =>  TRUE/FALSE
        //          )
        //
        // ---------------------------------------------------------------------

        $result['url_encode_function_name'] = '' ;
        $result['url_decode_function_name'] = '' ;

        // ---------------------------------------------------------------------

        return $result ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // NEW VERSION
    // =========================================================================

    $key_field_details =
        $selected_datasets_dmdd['mysql_overrides']['array_storage_key_field']
        ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $key_field_details , '$key_field_details' ) ;

    // =========================================================================
    // ERROR CHECKING
    // =========================================================================

    // -------------------------------------------------------------------------
    // slug ?
    // -------------------------------------------------------------------------

    if ( ! array_key_exists( 'slug' , $key_field_details ) ) {

        return <<<EOT
PROBLEM:&nbsp; No "mysql_overrides" + "array_storage_key_field" + "slug"
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    if ( ! is_string( $key_field_details['slug'] ) ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "mysql_overrides" + "array_storage_key_field" + "slug" (string expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }


    // -------------------------------------------------------------------------

    $key_field_slug = $key_field_details['slug'] ;

    // -------------------------------------------------------------------------

    if ( is_string( $dataset_record_data ) ) {

        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                    $dataset_record_data    ,
                    $_GET
                    )
            ) {

            $safe_dataset_record_data = htmlentities( $dataset_record_data ) ;

            return <<<EOT
PROBLEM:&nbsp; Bad "\$dataset_record_data" ("{$safe_dataset_record_data}" - no such field in \$_GET)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                    $key_field_slug         ,
                    $dataset_record_data
                    )
            ) {

            $safe_key_field_slug = htmlentities( $key_field_slug ) ;

            return <<<EOT
PROBLEM:&nbsp; Bad "mysql_overrides" + "array_storage_key_field" + "slug" ("{$safe_key_field_slug}" - dataset record has no such field)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // format ?
    // -------------------------------------------------------------------------

    $key_field_format = NULL ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_allowed_array_storage_key_field_formats(
    //      $old_new
    //      )
    // - - - - - - - - - - - - - - - - - - - - - -
    // $old_new = "old" or "new"
    //
    // RETURNS
    //      On SUCCESS
    //          $allowed_key_field_formats = array(...)
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $allowed_array_storage_key_field_formats =
        get_allowed_array_storage_key_field_formats( 'new' )
        ;

    // -------------------------------------------------------------------------

    if ( is_string( $allowed_array_storage_key_field_formats ) ) {
        return $allowed_array_storage_key_field_formats ;
    }

    // -------------------------------------------------------------------------

    if ( array_key_exists( 'format' , $key_field_details ) ) {

        if (    is_string( $key_field_details['format'] )
                &&
                trim( $key_field_details['format'] ) === ''
            ) {
            $key_field_format = 'mysql-bigint-id' ;

        } elseif (  in_array(
                        $key_field_details['format']                ,
                        $allowed_array_storage_key_field_formats    ,
                        TRUE
                        )
            ) {
            $key_field_format = $key_field_details['format'] ;

        }

    } else {
        $key_field_format = 'mysql-bigint-id' ;

    }

    // -------------------------------------------------------------------------

    if ( ! is_string( $key_field_format ) ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "mysql_overrides" + "array_storage_key_field" + "format"
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------
    // value ?
    // -------------------------------------------------------------------------

    if ( is_string( $dataset_record_data ) ) {
        $key_field_value = $_GET[ $dataset_record_data ] ;

    } else {
        $key_field_value = $dataset_record_data[ $key_field_slug ] ;

    }

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // is_valid_record_key(
    //      $caller_apps_includes_dir   ,
    //      $dataset_title              ,
    //      $selected_datasets_dmdd     ,
    //      $key_field_details          ,
    //      $key_field_value            ,
    //      $key_field_format
    //      )
    // - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          TRUE or FALSE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $key_field_ok =
        is_valid_record_key(
            $caller_apps_includes_dir   ,
            $dataset_title              ,
            $selected_datasets_dmdd     ,
            $key_field_details          ,
            $key_field_value            ,
            $key_field_format
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $key_field_ok ) ) {
        return $key_field_ok ;
    }

    // -------------------------------------------------------------------------

/*
    $key_field_ok = FALSE ;

    // -------------------------------------------------------------------------

    if ( $key_field_format === 'mysql-bigint-id' ) {

        // ---------------------------------------------------------------------

        $bigint_unsigned_max = '18446744073709551615' ;

        // ---------------------------------------------------------------------
        // int bccomp ( string $left_operand , string $right_operand [, int $scale = int ] )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Returns 0 if the two operands are equal, 1 if the left_operand is
        // larger than the right_operand, -1 otherwise.
        // ---------------------------------------------------------------------

        if (    is_string( $key_field_value )
                &&
                trim( $key_field_value ) !== ''
                &&
                \ctype_digit( $key_field_value )
                &&
                $key_field_value > 0
                &&
                bccomp( $key_field_value , $bigint_unsigned_max ) <= 0
            ) {
            $key_field_ok = TRUE ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $key_field_format === 'sequential-id' ) {

        // ---------------------------------------------------------------------

        require_once( $caller_apps_includes_dir . '/sequential-ids-support.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\
        // question_sequential_id(
        //      $candidate_sid
        //      )
        // - - - - - - - - - - - -
        // Determines whether or not $candidate_sid looks like a sequential ID
        // as generated by (eg):-
        //      get_new_sequential_id()
        //      get_new_sequential_id_thats_unique_in_dataset()
        //
        // or not.  And returns TRUE or FALSE accordingly.
        //
        // In other words, $candidate_sid must be something like (eg):-
        //      "dczv-mwhk"
        //      "9npd-xd2h"
        //      "pxx4-4942-9vwm"
        //      "2n43-3dny-dykm"
        //      etc...
        // -------------------------------------------------------------------------

        if ( \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\question_sequential_id(
                $key_field_value
                ) === TRUE
            ) {
            $key_field_ok = TRUE ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $key_field_format === 'great-kiwi-password' ) {

        // ---------------------------------------------------------------------

        if ( array_key_exists( 'format_args' , $key_field_details ) ) {
            $key_field_format_args = $key_field_details['format_args'] ;

        } else {
            $key_field_format_args = array() ;

        }

        // ---------------------------------------------------------------------

        if ( ! is_array( $key_field_format_args ) ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "mysql_overrides" + "array_storage_key_field" + "format_args" (array of "great kiwi password" options expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        require_once( $caller_apps_includes_dir . '/great-kiwi-passwords.php' ) ;

        // -----------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\
        // question_grouped_random_password(
        //      $candidate_password     ,
        //      $options = array()
        //      )
        // - - - - - - - - - - - - - - - - -
        // Checks whether the $candidate_password is a grouped random password
        // like:-
        //      k53t-xc92-v7k3
        //      etc
        //
        // Allowed password characters are those in:-
        //      GREAT_KIWI_ALLOWED_PASSWORD_CHARACTERS
        //
        // Currently these are all the ASCII alphanumeric characters but:-
        //      0    1    5    6    8
        //      A    B    D    E    I    O    Q    S    U
        //      a    b    e    f    i    j    l    o    q    r    s    t    u
        //
        // These are omitted because they're combinations like:-
        //      0/8/B/D/Q
        //      1/I/l
        //      5/S
        //      etc
        //
        // that can easily be confused with each other.
        //
        // ---
        //
        // $options is like (eg):-
        //
        //      $options = array(
        //          'number_groups'         =>  4       ,
        //          'chars_per_group'       =>  4       ,
        //          'group_separator'       =>  '-'     ,
        //          'lowercase_only'        =>  TRUE    ,
        //          'question_punctuation'  =>  FALSE
        //          )
        //
        // ---
        //
        // NOTE!
        // -----
        // With some combinations, it depends very much on the FONT used (as to
        // how similar two different characters look).  Thus the above rules are
        // a worst-case set.  Stuff is in there if in any common (web) font,
        // the chance of confusion exists.
        //
        // RETURNS
        //      On SUCCESS
        //          TRUE or FALSE
        //
        //      On FAILURE
        //          $error_message STRING
        // -----------------------------------------------------------------------

        if ( \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\question_grouped_random_password(
                $key_field_value            ,
                $key_field_format_args
                ) === TRUE
            ) {
            $key_field_ok = TRUE ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $key_field_format === 'url' ) {

        // ---------------------------------------------------------------------

        if ( array_key_exists( 'format_args' , $key_field_details ) ) {

            $key_field_format_args = $key_field_details['format_args'] ;

            if ( ! is_array( $key_field_format_args ) ) {

                return <<<EOT
PROBLEM:&nbsp; Bad "mysql_overrides" + "array_storage_key_field" + "format_args" (array expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

        } else {

            $key_field_format_args = array() ;

        }

        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'minlen' , $key_field_format_args ) ) {
            $key_field_format_args['minlen'] = 'default' ;
        }

        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'maxlen' , $key_field_format_args ) ) {
            $key_field_format_args['maxlen'] = 'default' ;
        }

        // ---------------------------------------------------------------------

        if ( count( $key_field_format_args ) > 2 ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "mysql_overrides" + "array_storage_key_field" + "format_args" (array( "minlen" => "default"|N , "maxlen" => "default"|M ) expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        $minlen = $key_field_format_args['minlen'] ;

        // ---------------------------------------------------------------------

        if (    $minlen !== 'default'
                ||
                ! is_int( $minlen )
                ||
                $minlen < 0
            ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "mysql_overrides" + "array_storage_key_field" + "format_args" + "minlen" ("default or INT 0+ expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        $maxlen = $key_field_format_args['maxlen'] ;

        // ---------------------------------------------------------------------

        if (    $maxlen !== 'default'
                ||
                ! is_int( $maxlen )
                ||
                $maxlen < 0
            ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "mysql_overrides" + "array_storage_key_field" + "format_args" + "maxlen" ("default or INT 0+ expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        require_once( $caller_apps_includes_dir . '/validata/url-validators.php' ) ;

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

        $question_empty_ok = FALSE ;

        // ---------------------------------------------------------------------

        if (    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\absolute_url_string__minLen_maxLen_questionEmptyOK(
                    $key_field_value        ,
                    $minlen                 ,
                    $maxlen                 ,
                    $question_empty_ok
                    ) === TRUE
            ) {
            $key_field_ok = TRUE ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $key_field_format === 'custom-function' ) {

        // ---------------------------------------------------------------------

        //  TODO !!!

        // -------------------------------------------------------------------------
        // mixed call_user_func_array ( callable $callback , array $param_arr )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Calls the callback given by the first parameter with the parameters in
        // param_arr.
        //
        //      callback
        //          The callable to be called.
        //
        //      param_arr
        //          The parameters to be passed to the callback, as an indexed
        //          array.
        //
        // Returns the return value of the callback, or FALSE on error.
        //
        // (PHP 4 >= 4.0.4, PHP 5)
        //
        // CHANGELOG
        //
        //      Version     Description
        //      5.3.0   The interpretation of object oriented keywords like parent and self has changed. Previously, calling them using the double colon syntax would emit an E_STRICT warning because they were interpreted as static.
        //
        // EXAMPLES
        //
        //      Call the foobar() function with 2 arguments
        //      call_user_func_array("foobar", array("one", "two"));
        //
        //      As of PHP 5.3.0
        //      call_user_func_array(__NAMESPACE__ .'\Foo::test', array('Hannes'));
        //
        //      As of PHP 5.3.0
        //      call_user_func_array(array(__NAMESPACE__ .'\Foo', 'test'), array('Philip'));
        //
        // Note:    Before PHP 5.4, referenced variables in param_arr are passed to
        //          the function by reference, regardless of whether the function
        //          expects the respective parameter to be passed by reference. This
        //          form of call-time pass by reference does not emit a deprecation
        //          notice, but it is nonetheless deprecated, and has been removed
        //          in PHP 5.4. Furthermore, this does not apply to internal
        //          functions, for which the function signature is honored. Passing
        //          by value when the function expects a parameter by reference
        //          results in a warning and having call_user_func() return FALSE
        //          (there is, however, an exception for passed values with
        //          reference count = 1, such as in literals, as these can be turned
        //          into references without ill effects — but also without writes
        //          to that value having any effect —; do not rely in this
        //          behavior, though, as the reference count is an implementation
        //          detail and the soundness of this behavior is questionable).
        //
        // Note:    Callbacks registered with functions such as call_user_func() and
        //          call_user_func_array() will not be called if there is an
        //          uncaught exception thrown in a previous callback.
        // -------------------------------------------------------------------------

        return <<<EOT
PROBLEM:&nbsp; "mysql_overrides" + "array_storage_key_field" + "format_args" = "custom-function" not yet implemented
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        return <<<EOT
PROBLEM:&nbsp; Unrecognised/unsupported "mysql_overrides" + "array_storage_key_field" + "format_args"
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        // ---------------------------------------------------------------------

    }
*/

    // -------------------------------------------------------------------------

    $fail_link_creation_silently = FALSE ;

    // -------------------------------------------------------------------------

    if ( $key_field_ok !== TRUE ) {

        // ---------------------------------------------------------------------

        if (    $key_field_value === ''
                &&
                array_key_exists( 'fail_link_creation_silently_on_empty_record_key' , $key_field_details )
                &&
                $key_field_details['fail_link_creation_silently_on_empty_record_key'] === TRUE
            ) {

            // -----------------------------------------------------------------

            $fail_link_creation_silently = TRUE ;

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            $safe_key_field_slug = htmlentities( $key_field_slug ) ;

            $safe_key_field_format = htmlentities( $key_field_format ) ;

            return <<<EOT
PROBLEM:&nbsp; Bad dataset field ("{$safe_key_field_slug}" - doesn't match specified format: {$safe_key_field_format})
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // url_encode_function_name ?
    // -------------------------------------------------------------------------

    if (    array_key_exists( 'url_encode_function_name' , $key_field_details )
            &&
            is_string( $key_field_details['url_encode_function_name'] )
            &&
            trim( $key_field_details['url_encode_function_name'] ) !== ''
            &&
            function_exists( $key_field_details['url_encode_function_name'] )
        ) {
        $url_encode_function_name =
            trim( $key_field_details['url_encode_function_name'] )
            ;

    } else {
        $url_encode_function_name = '' ;

    }

    // -------------------------------------------------------------------------
    // url_decode_function_name ?
    // -------------------------------------------------------------------------

    if (    array_key_exists( 'url_decode_function_name' , $key_field_details )
            &&
            is_string( $key_field_details['url_decode_function_name'] )
            &&
            trim( $key_field_details['url_decode_function_name'] ) !== ''
            &&
            function_exists( $key_field_details['url_decode_function_name'] )
        ) {
        $url_decode_function_name =
            trim( $key_field_details['url_decode_function_name'] )
            ;

    } else {
        $url_decode_function_name = '' ;

    }

    // -------------------------------------------------------------------------
    // SUCCESS!
    // -------------------------------------------------------------------------

    return array(
        'slug'                          =>  $key_field_slug                     ,
        'format'                        =>  $key_field_format                   ,
        'value'                         =>  $key_field_value                    ,
        'fail_link_creation_silently'   =>  $fail_link_creation_silently        ,
        'url_encode_function_name'      =>  $url_encode_function_name           ,
        'url_decode_function_name'      =>  $url_decode_function_name
        ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// is_valid_record_key()
// =============================================================================

function is_valid_record_key(
    $caller_apps_includes_dir   ,
    $dataset_title              ,
    $selected_datasets_dmdd     ,
    $key_field_details          ,
    $key_field_value            ,
    $key_field_format
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // is_valid_record_key(
    //      $caller_apps_includes_dir   ,
    //      $dataset_title              ,
    //      $selected_datasets_dmdd     ,
    //      $key_field_details          ,
    //      $key_field_value            ,
    //      $key_field_format
    //      )
    // - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          TRUE or FALSE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Storage Method Dependent...
    // =========================================================================

    if ( array_key_exists( 'storage_method' , $selected_datasets_dmdd ) ) {
        $storage_method = $selected_datasets_dmdd['storage_method'] ;

    } else {
        $storage_method = 'array-storage' ;

    }

    // -------------------------------------------------------------------------

    if ( $storage_method === 'array-storage' ) {

        // =====================================================================
        // ARRAY-STORAGE
        // =====================================================================

        require_once( $caller_apps_includes_dir . '/sequential-ids-support.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\
        // question_sequential_id(
        //      $candidate_sid
        //      )
        // - - - - - - - - - - - -
        // Determines whether or not $candidate_sid looks like a sequential ID
        // as generated by (eg):-
        //      get_new_sequential_id()
        //      get_new_sequential_id_thats_unique_in_dataset()
        //
        // or not.  And returns TRUE or FALSE accordingly.
        //
        // In other words, $candidate_sid must be something like (eg):-
        //      "dczv-mwhk"
        //      "9npd-xd2h"
        //      "pxx4-4942-9vwm"
        //      "2n43-3dny-dykm"
        //      etc...
        // -------------------------------------------------------------------------

        return
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\question_sequential_id(
                $key_field_value
                ) ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( $storage_method !== 'mysql' ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "storage_method" ("array-storage" or "mysql" expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // =========================================================================
    // MYSQL
    // =========================================================================

    if ( ! array_key_exists( 'mysql_overrides' , $selected_datasets_dmdd ) ) {

        return <<<EOT
PROBLEM:&nbsp; No "mysql_overrides"
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    if ( ! is_array( $selected_datasets_dmdd['mysql_overrides'] ) ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "mysql_overrides" (array expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // =========================================================================
    // Call the NEW or OLD validation routines...
    // =========================================================================

    if (    ! array_key_exists( 'array_storage_key_field' , $selected_datasets_dmdd['mysql_overrides'] )
            ||
            ! is_array( $selected_datasets_dmdd['mysql_overrides']['array_storage_key_field'] )
        ) {

        // ---------------------------------------------------------------------
        // OLD
        // ---------------------------------------------------------------------

        $old_new = 'old' ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------
        // NEW
        // ---------------------------------------------------------------------

        $old_new = 'new' ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $key_field_ok = FALSE ;

    // -------------------------------------------------------------------------

    if (    $key_field_format === 'mysql-bigint-id'
            &&
            $old_new === 'new'
        ) {

        // ---------------------------------------------------------------------

        $bigint_unsigned_max = '18446744073709551615' ;

        // ---------------------------------------------------------------------
        // int bccomp ( string $left_operand , string $right_operand [, int $scale = int ] )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Returns 0 if the two operands are equal, 1 if the left_operand is
        // larger than the right_operand, -1 otherwise.
        // ---------------------------------------------------------------------

        if (    is_string( $key_field_value )
                &&
                trim( $key_field_value ) !== ''
                &&
                \ctype_digit( $key_field_value )
                &&
                $key_field_value > 0
                &&
                bccomp( $key_field_value , $bigint_unsigned_max ) <= 0
            ) {
            $key_field_ok = TRUE ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $key_field_format === 'sequential-id' ) {

        // ---------------------------------------------------------------------

        require_once( $caller_apps_includes_dir . '/sequential-ids-support.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\
        // question_sequential_id(
        //      $candidate_sid
        //      )
        // - - - - - - - - - - - -
        // Determines whether or not $candidate_sid looks like a sequential ID
        // as generated by (eg):-
        //      get_new_sequential_id()
        //      get_new_sequential_id_thats_unique_in_dataset()
        //
        // or not.  And returns TRUE or FALSE accordingly.
        //
        // In other words, $candidate_sid must be something like (eg):-
        //      "dczv-mwhk"
        //      "9npd-xd2h"
        //      "pxx4-4942-9vwm"
        //      "2n43-3dny-dykm"
        //      etc...
        // -------------------------------------------------------------------------

        if ( \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\question_sequential_id(
                $key_field_value
                ) === TRUE
            ) {
            $key_field_ok = TRUE ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $key_field_format === 'great-kiwi-password' ) {

        // ---------------------------------------------------------------------

        if ( array_key_exists( 'format_args' , $key_field_details ) ) {
            $key_field_format_args = $key_field_details['format_args'] ;

        } else {
            $key_field_format_args = array() ;

        }

        // ---------------------------------------------------------------------

        if ( ! is_array( $key_field_format_args ) ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "mysql_overrides" + "array_storage_key_field" + "format_args" (array of "great kiwi password" options expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        require_once( $caller_apps_includes_dir . '/great-kiwi-passwords.php' ) ;

        // -----------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\
        // question_grouped_random_password(
        //      $candidate_password     ,
        //      $options = array()
        //      )
        // - - - - - - - - - - - - - - - - -
        // Checks whether the $candidate_password is a grouped random password
        // like:-
        //      k53t-xc92-v7k3
        //      etc
        //
        // Allowed password characters are those in:-
        //      GREAT_KIWI_ALLOWED_PASSWORD_CHARACTERS
        //
        // Currently these are all the ASCII alphanumeric characters but:-
        //      0    1    5    6    8
        //      A    B    D    E    I    O    Q    S    U
        //      a    b    e    f    i    j    l    o    q    r    s    t    u
        //
        // These are omitted because they're combinations like:-
        //      0/8/B/D/Q
        //      1/I/l
        //      5/S
        //      etc
        //
        // that can easily be confused with each other.
        //
        // ---
        //
        // $options is like (eg):-
        //
        //      $options = array(
        //          'number_groups'         =>  4       ,
        //          'chars_per_group'       =>  4       ,
        //          'group_separator'       =>  '-'     ,
        //          'lowercase_only'        =>  TRUE    ,
        //          'question_punctuation'  =>  FALSE
        //          )
        //
        // ---
        //
        // NOTE!
        // -----
        // With some combinations, it depends very much on the FONT used (as to
        // how similar two different characters look).  Thus the above rules are
        // a worst-case set.  Stuff is in there if in any common (web) font,
        // the chance of confusion exists.
        //
        // RETURNS
        //      On SUCCESS
        //          TRUE or FALSE
        //
        //      On FAILURE
        //          $error_message STRING
        // -----------------------------------------------------------------------

        if ( \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\question_grouped_random_password(
                $key_field_value            ,
                $key_field_format_args
                ) === TRUE
            ) {
            $key_field_ok = TRUE ;
        }

        // ---------------------------------------------------------------------

    } elseif (  $key_field_format === 'ctype-digit'
                &&
                $old_new === 'old'
        ) {

        // ---------------------------------------------------------------------

        if ( \ctype_digit( $key_field_value ) ) {
            $key_field_ok = TRUE ;
        }

        // ---------------------------------------------------------------------

    } elseif (  $key_field_format === 'url'
                &&
                $old_new === 'new'
        ) {

        // ---------------------------------------------------------------------

        if ( array_key_exists( 'format_args' , $key_field_details ) ) {

            $key_field_format_args = $key_field_details['format_args'] ;

            if ( ! is_array( $key_field_format_args ) ) {

                return <<<EOT
PROBLEM:&nbsp; Bad "mysql_overrides" + "array_storage_key_field" + "format_args" (array expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

        } else {

            $key_field_format_args = array() ;

        }

        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'minlen' , $key_field_format_args ) ) {
            $key_field_format_args['minlen'] = 'default' ;
        }

        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'maxlen' , $key_field_format_args ) ) {
            $key_field_format_args['maxlen'] = 'default' ;
        }

        // ---------------------------------------------------------------------

        if ( count( $key_field_format_args ) > 2 ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "mysql_overrides" + "array_storage_key_field" + "format_args" (array( "minlen" => "default"|N , "maxlen" => "default"|M ) expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        $minlen = $key_field_format_args['minlen'] ;

        // ---------------------------------------------------------------------

        if (    $minlen !== 'default'
                ||
                ! is_int( $minlen )
                ||
                $minlen < 0
            ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "mysql_overrides" + "array_storage_key_field" + "format_args" + "minlen" ("default or INT 0+ expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        $maxlen = $key_field_format_args['maxlen'] ;

        // ---------------------------------------------------------------------

        if (    $maxlen !== 'default'
                ||
                ! is_int( $maxlen )
                ||
                $maxlen < 0
            ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "mysql_overrides" + "array_storage_key_field" + "format_args" + "maxlen" ("default or INT 0+ expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        require_once( $caller_apps_includes_dir . '/validata/url-validators.php' ) ;

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

        $question_empty_ok = FALSE ;

        // ---------------------------------------------------------------------

        if (    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\absolute_url_string__minLen_maxLen_questionEmptyOK(
                    $key_field_value        ,
                    $minlen                 ,
                    $maxlen                 ,
                    $question_empty_ok
                    ) === TRUE
            ) {
            $key_field_ok = TRUE ;
        }

        // ---------------------------------------------------------------------

    } elseif (  $key_field_format === 'custom-function'
                &&
                $old_new === 'new'
        ) {

        // ---------------------------------------------------------------------

        //  TODO !!!

        // -------------------------------------------------------------------------
        // mixed call_user_func_array ( callable $callback , array $param_arr )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Calls the callback given by the first parameter with the parameters in
        // param_arr.
        //
        //      callback
        //          The callable to be called.
        //
        //      param_arr
        //          The parameters to be passed to the callback, as an indexed
        //          array.
        //
        // Returns the return value of the callback, or FALSE on error.
        //
        // (PHP 4 >= 4.0.4, PHP 5)
        //
        // CHANGELOG
        //
        //      Version     Description
        //      5.3.0   The interpretation of object oriented keywords like parent and self has changed. Previously, calling them using the double colon syntax would emit an E_STRICT warning because they were interpreted as static.
        //
        // EXAMPLES
        //
        //      Call the foobar() function with 2 arguments
        //      call_user_func_array("foobar", array("one", "two"));
        //
        //      As of PHP 5.3.0
        //      call_user_func_array(__NAMESPACE__ .'\Foo::test', array('Hannes'));
        //
        //      As of PHP 5.3.0
        //      call_user_func_array(array(__NAMESPACE__ .'\Foo', 'test'), array('Philip'));
        //
        // Note:    Before PHP 5.4, referenced variables in param_arr are passed to
        //          the function by reference, regardless of whether the function
        //          expects the respective parameter to be passed by reference. This
        //          form of call-time pass by reference does not emit a deprecation
        //          notice, but it is nonetheless deprecated, and has been removed
        //          in PHP 5.4. Furthermore, this does not apply to internal
        //          functions, for which the function signature is honored. Passing
        //          by value when the function expects a parameter by reference
        //          results in a warning and having call_user_func() return FALSE
        //          (there is, however, an exception for passed values with
        //          reference count = 1, such as in literals, as these can be turned
        //          into references without ill effects — but also without writes
        //          to that value having any effect —; do not rely in this
        //          behavior, though, as the reference count is an implementation
        //          detail and the soundness of this behavior is questionable).
        //
        // Note:    Callbacks registered with functions such as call_user_func() and
        //          call_user_func_array() will not be called if there is an
        //          uncaught exception thrown in a previous callback.
        // -------------------------------------------------------------------------

        return <<<EOT
PROBLEM:&nbsp; "mysql_overrides" + "array_storage_key_field" + "format_args" = "custom-function" not yet implemented
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $safe_key_field_format = htmlentities( $key_field_format ) ;

        // ---------------------------------------------------------------------

        return <<<EOT
PROBLEM:&nbsp; Unrecognised/unsupported "mysql_overrides" + "array_storage_key_field" + "format" ("{$safe_key_field_format}")
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    return $key_field_ok ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_check_mysql_array_storage_key_field_overrides_old()
// =============================================================================

function get_check_mysql_array_storage_key_field_overrides_old(
    $caller_apps_includes_dir       ,
    $selected_datasets_dmdd         ,
    $dataset_title                  ,
    $dataset_record_data
    ) {

    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------
    // Assumed to be called from:-
    //      \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    //      get_check_mysql_array_storage_key_field_overrides(
    // -------------------------------------------------------------------------

    if (    ! array_key_exists( 'mysql_overrides' , $selected_datasets_dmdd )
            ||
            ! is_array( $selected_datasets_dmdd['mysql_overrides'] )
            ||
            ! array_key_exists( 'array_storage_key_field_slug' , $selected_datasets_dmdd['mysql_overrides'] )
            ||
            ! is_string( $selected_datasets_dmdd['mysql_overrides']['array_storage_key_field_slug'] )
            ||
            trim( $selected_datasets_dmdd['mysql_overrides']['array_storage_key_field_slug'] ) === ''
        ) {
        return NULL ;
    }

    // -------------------------------------------------------------------------

    $key_field_slug =
        $selected_datasets_dmdd['mysql_overrides']['array_storage_key_field_slug']
        ;

    // -------------------------------------------------------------------------
    // If $dataset_record_data is STRING
    //      then $key_field_value = $_GET[ $dataset_record_data ]
    // Else (If $dataset_record_data is ARRAY):-
    //      then $key_field_value = $dataset_record_data[ <key_field_slug> ]
    // -------------------------------------------------------------------------

    if ( is_string( $dataset_record_data ) ) {

        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                    $dataset_record_data    ,
                    $_GET
                    )
            ) {

            $safe_dataset_record_data = htmlentities( $dataset_record_data ) ;

            return <<<EOT
PROBLEM:&nbsp; Bad "\$dataset_record_data" ("{$safe_dataset_record_data}" - no such field in \$_GET)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                    $key_field_slug         ,
                    $dataset_record_data
                    )
            ) {

            $safe_key_field_slug = htmlentities( $key_field_slug ) ;

            return <<<EOT
PROBLEM:&nbsp; Bad "mysql_overrides" + "array_storage_key_field_slug" ("{$safe_key_field_slug}" - dataset record has no such field)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( is_string( $dataset_record_data ) ) {
        $key_field_value = $_GET[ $dataset_record_data ] ;

    } else {
        $key_field_value = $dataset_record_data[ $key_field_slug ] ;

    }

    // -------------------------------------------------------------------------

    $key_field_format = NULL ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_allowed_array_storage_key_field_formats(
    //      $old_new
    //      )
    // - - - - - - - - - - - - - - - - - - - - - -
    // $old_new = "old" or "new"
    //
    // RETURNS
    //      On SUCCESS
    //          $allowed_key_field_formats = array(...)
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $allowed_array_storage_key_field_formats =
        get_allowed_array_storage_key_field_formats( 'old' )
        ;

    // -------------------------------------------------------------------------

    if ( is_string( $allowed_array_storage_key_field_formats ) ) {
        return $allowed_array_storage_key_field_formats ;
    }
    // -------------------------------------------------------------------------

    if ( array_key_exists( 'key_field_format' , $selected_datasets_dmdd['mysql_overrides'] ) ) {

        if (    is_string( $selected_datasets_dmdd['mysql_overrides']['key_field_format'] )
                &&
                trim( $selected_datasets_dmdd['mysql_overrides']['key_field_format'] ) === ''
            ) {
            $key_field_format = 'sequential-id' ;

        } elseif (  in_array(
                        $selected_datasets_dmdd['mysql_overrides']['key_field_format']      ,
                        $allowed_array_storage_key_field_formats                            ,
                        TRUE
                        )
            ) {
            $key_field_format = $selected_datasets_dmdd['mysql_overrides']['key_field_format'] ;

        }

    } else {
        $key_field_format = 'sequential-id' ;

    }

    // -------------------------------------------------------------------------

    if ( ! is_string( $key_field_format ) ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "mysql_overrides" + "key_field_format"
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // is_valid_record_key(
    //      $caller_apps_includes_dir   ,
    //      $dataset_title              ,
    //      $selected_datasets_dmdd     ,
    //      $key_field_details          ,
    //      $key_field_value            ,
    //      $key_field_format
    //      )
    // - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          TRUE or FALSE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $key_field_details = $selected_datasets_dmdd['mysql_overrides'] ;

    // -------------------------------------------------------------------------

    $key_field_ok =
        is_valid_record_key(
            $caller_apps_includes_dir   ,
            $dataset_title              ,
            $selected_datasets_dmdd     ,
            $key_field_details          ,
            $key_field_value            ,
            $key_field_format
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $key_field_ok ) ) {
        return $key_field_ok ;
    }

    // -------------------------------------------------------------------------

/*
    $key_field_ok = FALSE ;

    // -------------------------------------------------------------------------

    if ( $key_field_format === 'ctype-digit' ) {

        // ---------------------------------------------------------------------

        if ( \ctype_digit( $key_field_value ) ) {
            $key_field_ok = TRUE ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $key_field_format === 'sequential-id' ) {

        // ---------------------------------------------------------------------

        require_once( $caller_apps_includes_dir . '/sequential-ids-support.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\
        // question_sequential_id(
        //      $candidate_sid
        //      )
        // - - - - - - - - - - - -
        // Determines whether or not $candidate_sid looks like a sequential ID
        // as generated by (eg):-
        //      get_new_sequential_id()
        //      get_new_sequential_id_thats_unique_in_dataset()
        //
        // or not.  And returns TRUE or FALSE accordingly.
        //
        // In other words, $candidate_sid must be something like (eg):-
        //      "dczv-mwhk"
        //      "9npd-xd2h"
        //      "pxx4-4942-9vwm"
        //      "2n43-3dny-dykm"
        //      etc...
        // -------------------------------------------------------------------------

        if ( \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\question_sequential_id(
                $key_field_value
                ) === TRUE
            ) {
            $key_field_ok = TRUE ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $key_field_format === 'great-kiwi-password' ) {

        // ---------------------------------------------------------------------

        $key_field_format_args = array() ;

        // ---------------------------------------------------------------------

        if ( array_key_exists( 'key_field_format_args' , $selected_datasets_dmdd['mysql_overrides'] ) ) {
            $key_field_format_args = $selected_datasets_dmdd['mysql_overrides']['key_field_format_args'] ;
        }

        // ---------------------------------------------------------------------

        if ( ! is_array( $key_field_format_args ) ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "mysql_overrides" + "key_field_format_args" (array of "great kiwi password" options expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        require_once( $caller_apps_includes_dir . '/great-kiwi-passwords.php' ) ;

        // -----------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\
        // question_grouped_random_password(
        //      $candidate_password     ,
        //      $options = array()
        //      )
        // - - - - - - - - - - - - - - - - -
        // Checks whether the $candidate_password is a grouped random password
        // like:-
        //      k53t-xc92-v7k3
        //      etc
        //
        // Allowed password characters are those in:-
        //      GREAT_KIWI_ALLOWED_PASSWORD_CHARACTERS
        //
        // Currently these are all the ASCII alphanumeric characters but:-
        //      0    1    5    6    8
        //      A    B    D    E    I    O    Q    S    U
        //      a    b    e    f    i    j    l    o    q    r    s    t    u
        //
        // These are omitted because they're combinations like:-
        //      0/8/B/D/Q
        //      1/I/l
        //      5/S
        //      etc
        //
        // that can easily be confused with each other.
        //
        // ---
        //
        // $options is like (eg):-
        //
        //      $options = array(
        //          'number_groups'         =>  4       ,
        //          'chars_per_group'       =>  4       ,
        //          'group_separator'       =>  '-'     ,
        //          'lowercase_only'        =>  TRUE    ,
        //          'question_punctuation'  =>  FALSE
        //          )
        //
        // ---
        //
        // NOTE!
        // -----
        // With some combinations, it depends very much on the FONT used (as to
        // how similar two different characters look).  Thus the above rules are
        // a worst-case set.  Stuff is in there if in any common (web) font,
        // the chance of confusion exists.
        //
        // RETURNS
        //      On SUCCESS
        //          TRUE or FALSE
        //
        //      On FAILURE
        //          $error_message STRING
        // -----------------------------------------------------------------------

        if ( \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\question_grouped_random_password(
                $key_field_value            ,
                $key_field_format_args
                ) === TRUE
            ) {
            $key_field_ok = TRUE ;
        }

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        return <<<EOT
PROBLEM:&nbsp; Unrecognised/unsupported "mysql_overrides" + "key_field_format"
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        // ---------------------------------------------------------------------

    }
*/

    // -------------------------------------------------------------------------
    // fail_link_creation_silently
    // -------------------------------------------------------------------------

    $fail_link_creation_silently = FALSE ;

    // -------------------------------------------------------------------------

    if ( $key_field_ok !== TRUE ) {

        // ---------------------------------------------------------------------

        if (    $key_field_value === ''
                &&
                array_key_exists( 'fail_link_creation_silently_on_empty_record_key' , $selected_datasets_dmdd['mysql_overrides'] )
                &&
                $selected_datasets_dmdd['mysql_overrides']['fail_link_creation_silently_on_empty_record_key'] === TRUE
            ) {

            // -----------------------------------------------------------------

            $fail_link_creation_silently = TRUE ;

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            $safe_key_field_slug = htmlentities( $key_field_slug ) ;

            $safe_key_field_format = htmlentities( $key_field_format ) ;

            return <<<EOT
PROBLEM:&nbsp; Bad dataset field ("{$safe_key_field_slug}" - doesn't match specified format: {$safe_key_field_format})
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // SUCCESS!
    // -------------------------------------------------------------------------

    return array(
                'slug'                          =>  $key_field_slug                 ,
                'format'                        =>  $key_field_format               ,
                'value'                         =>  $key_field_value                ,
                'fail_link_creation_silently'   =>  $fail_link_creation_silently
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

