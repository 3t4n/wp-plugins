<?php

// *****************************************************************************
// DATASET-MANAGER / GET-DATASET-RECORDS-TABLE-DATA-SUPPORT-1.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// get_foreign_field_value()
// =============================================================================

function get_foreign_field_value(
    $start_record_data                      ,
    $records_to_traverse                    ,
    $target_array_storage_field_slug        ,
    &$loaded_datasets                       ,
    $all_application_dataset_definitions    ,
    $caller_apps_includes_dir               ,
    &$custom_get_table_data_function_data
    ) {

    // -------------------------------------------------------------------------
    // get_foreign_field_value(
    //      $start_record_data                      ,
    //      $records_to_traverse                    ,
    //      $target_array_storage_field_slug        ,
    //      &$loaded_datasets                       ,
    //      $all_application_dataset_definitions    ,
    //      $caller_apps_includes_dir               ,
    //      &$custom_get_table_data_function_data
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // Returns the specified foreign field value.
    //
    // $records_to_traverse is like (eg):-
    //
    //      $records_to_traverse = array(
    //          [0] => Array(
    //                  [pointer_field_array_storage_slug] => parent_key
    //                  [foreign_dataset]                  => categories
    //                  )   ,
    //          [1] => Array(
    //                  [pointer_field_array_storage_slug] => parent_key
    //                  [foreign_dataset]                  => projects
    //                  )
    //          )
    //
    // $loaded_datasets is like (eg):-
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
    //      o   array(
    //              $ok = TRUE              ,
    //              $foreign_field_value        //  (any PHP type)
    //              ) on SUCCESS
    //      o   array(
    //              $ok = FALSE             ,
    //              $error_message STRING
    //              ) on FAILURE
    // -------------------------------------------------------------------------

    $success = TRUE  ;
    $failure = FALSE ;

    // -------------------------------------------------------------------------

    $current_record_data = $start_record_data ;

    // -------------------------------------------------------------------------

//pr( $records_to_traverse ) ;

    foreach ( $records_to_traverse as $this_record_to_traverse ) {

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $this_record_to_traverse = array(
        //          [pointer_field_array_storage_slug] => parent_key
        //          [foreign_dataset]                  => categories
        //          )
        //
        // ---------------------------------------------------------------------

        $array_storage_pointer_field_slug = $this_record_to_traverse['pointer_field_array_storage_slug'] ;

        $dataset_slug_to_goto = $this_record_to_traverse['foreign_dataset'] ;

        // ---------------------------------------------------------------------
        // Make sure that there's a:-
        //      $array_storage_pointer_field_slug
        //
        // field in the current record...
        // ---------------------------------------------------------------------

        if ( ! array_key_exists( $array_storage_pointer_field_slug , $current_record_data ) ) {

//pr( $array_storage_pointer_field_slug ) ;
//pr( $current_record_data ) ;

            $msg = <<<EOT
PROBLEM:&nbsp;&nbsp; Pointer field "{$array_storage_pointer_field_slug}" not found in current dataset record
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_foreign_field_value()
EOT;

            return array( $failure , $msg ) ;

        }

        // ---------------------------------------------------------------------
        // If the target dataset ISN'T in $loaded_datasets yet, then LOAD it...
        // ---------------------------------------------------------------------

        if ( ! array_key_exists( $dataset_slug_to_goto , $loaded_datasets ) ) {

            // -------------------------------------------------------------------------
            // load_dataset(
            //      $all_application_dataset_definitions    ,
            //      $caller_apps_includes_dir               ,
            //      &$loaded_datasets                       ,
            //      $dataset_slug                           ,
            //      $dataset_key_field_slug = NULL          ,
            //      $dataset_title          = NULL          ,
            //      $dataset_records        = NULL          ,
            //      $record_indices_by_key  = NULL
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - -
            // Adds the specified dataset to $loaded_datasets (unless it's already
            // loaded).
            //
            // NOTE!
            // =====
            // 1.   Each of:-
            //          o   $dataset_key_field_slug
            //          o   $dataset_title
            //          o   $dataset_records
            //          o   $record_indices_by_key
            //
            //      is only loaded if it wasn't supplied on input.
            //
            // 2.   $loaded_datasets is like (eg):-
            //
            //          $loaded_datasets = array(
            //
            //              <dataset_slug>  =>  array(
            //                                      'title'                 =>  "xxx"           ,
            //                                      'records'               =>  array(...)      ,
            //                                      'key_field_slug'        =>  "xxx" or NULL
            //                                      'record_indices_by_key' =>  array(...)
            //                                      )   ,
            //
            //              ...
            //
            //              )
            //
            // RETURNS
            //      o   TRUE on SUCCESS
            //      o   $error_message STRING on FAILURE
            // -------------------------------------------------------------------------

            $dataset_key_field_slug = NULL ;
            $dataset_title          = NULL ;
            $dataset_records        = NULL ;
            $record_indices_by_key  = NULL ;

            // -----------------------------------------------------------------

            $result = load_dataset(
                            $all_application_dataset_definitions    ,
                            $caller_apps_includes_dir               ,
                            $loaded_datasets                        ,
                            $dataset_slug_to_goto                   ,
                            $dataset_key_field_slug                 ,
                            $dataset_title                          ,
                            $dataset_records                        ,
                            $record_indices_by_key
                            ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return array( $failure , $result ) ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Get the target dataset's details...
        // ---------------------------------------------------------------------

        $target_dataset_details = $loaded_datasets[ $dataset_slug_to_goto ] ;

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $target_dataset_details = array(
        //          'title'                 =>  "xxx"           ,
        //          'records'               =>  array(...)      ,
        //          'key_field_slug'        =>  "xxx" or NULL
        //          'record_indices_by_key' =>  array(...)
        //          )
        //
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // Replace $current_record_data with the pointed to target dataset
        // record...
        // ---------------------------------------------------------------------

//pr( $loaded_datasets ) ;

        $target_record_key = $current_record_data[ $array_storage_pointer_field_slug ] ;

//pr( $target_record_key ) ;

        // ---------------------------------------------------------------------

        if ( ! array_key_exists(
                    $target_record_key                                  ,
                    $target_dataset_details['record_indices_by_key']
                    )
            ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Target record not found - whilst searching for foreigh field value
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_foreign_field_value()
EOT;

            return array( $failure , $msg ) ;

        }

        // ---------------------------------------------------------------------

        $current_record_data = $target_dataset_details['records'][
                                    $target_dataset_details['record_indices_by_key'][ $target_record_key ]
                                    ] ;

        // ---------------------------------------------------------------------
        // Repeat with the next target dataset (if there is one)...
        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // Check that the target field exists, in the last retrieved record...
    // -------------------------------------------------------------------------

    if ( ! isset( $current_record_data[ $target_array_storage_field_slug ] ) ) {

        $target_array_storage_field_slug = htmlentities( $target_array_storage_field_slug ) ;

        $msg = <<<EOT
PROBLEM:&nbsp;&nbsp; Target dataset field "{$target_array_storage_field_slug}" not found (in target dataset record)
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_foreign_field_value()
EOT;

        return array( $failure , $msg ) ;

    }

    // -------------------------------------------------------------------------
    // SUCCESS!
    // -------------------------------------------------------------------------

    return  array(
                $success                                                    ,
                $current_record_data[ $target_array_storage_field_slug ]
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// apply_display_treatments_to_field_value()
// =============================================================================

function apply_display_treatments_to_field_value(
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
    &$field_value
    ) {

    // -------------------------------------------------------------------------
    // apply_display_treatments_to_field_value(
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
    //      &$field_value
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Applies the column's "display treatments" (if any), to the specified
    // field value...
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          TRUE
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          $error_message STRING
    // -------------------------------------------------------------------------

    if ( ! array_key_exists( 'display_treatments' , $this_column_def ) ) {
        return TRUE ;
    }

    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------
    // The recognised/supported treatments are:-
    //
    //      $this_column_def['display_treatments'] = array(
    //
    //          array(
    //              'method'    =>  'bold'
    //              )
    //
    //          array(
    //              'method'    =>  'to-clickable-url'
    //              'args'      =>  array(
    //                                  'text'          =>  "Xxx"
    //                                      //  (Optional; if not specified the field value is used)
    //                                  'url'           =>  "xxx"
    //                                      //  (Optional; if not specified the field value is used)
    //                                  'attributes'    =>  array(
    //                                                          //  Eg;
    //                                                          'target'    =>  "_blank", etc
    //                                                          'class'     =>  "xxx"
    //                                                          'style'     =>  "xxx"
    //                                                          //  ...etc...
    //                                                          )
    //                                      //  Optional
    //                                  )
    //              )
    //
    //          array(
    //              'method'    =>  'micro-datetime-utc-pretty'
    //              'instance'  =>  NULL | "<date-format-for-seconds-part>"
    //              )
    //              //  Converts date/time like:-
    //              //      123456789.1234
    //              //      (seconds.usec as float)
    //              //  to (eg):-
    //              //      3 Feb 2014 14:02:15 134,800 us
    //
    //          array(
    //              'method'    =>  'yes-no'
    //              'args'      =>  array(
    //                                  'custom_conversions'    =>  array(
    //                                      'TRUE'  =>  'Yes'       ,
    //                                      'FALSE' =>  '&mdash;'
    //                                      )
    //                                  )
    //              )
    //              //  Assumes the field contains a boolean (TRUE/FALSE)
    //              //  value, which it displays as the strings "yes" or
    //              //  "no"
    //
    //          array(
    //              'method'    =>  'password'
    //              )
    //              //  Displays the field value as the same number of "*"
    //
    //          array(
    //              'method'    =>  'image'
    //              'args'      =>  array()
    //              )
    //              //  The raw_field value is assumed to be an image URL.
    //              //  And the image is displayed.
    //
    //          array(
    //              'method'    =>  'htmlentities'
    //              )
    //
    //          array(
    //              'method'    =>  'wrapper'
    //              'args'      =>  array(
    //                                  'before'    =>  "xxx"   ,
    //                                  'after'     =>  "xxx"
    //                                  )
    //              )
    //
    //          array(
    //              'method'        =>  'max-words'     ,
    //              'max_words'     =>  16
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

    $column_number = $this_column_def_index + 1 ;

    // -------------------------------------------------------------------------

    if ( ! is_array( $this_column_def['display_treatments'] ) ) {

        return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "display_treatments" - for column# {$column_number} (array expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    foreach ( $this_column_def['display_treatments'] as $this_index => $this_treatment ) {

        // ---------------------------------------------------------------------

        $treatment_number = $this_index + 1 ;

        // ---------------------------------------------------------------------

        if ( ! is_array( $this_treatment ) ) {

            return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "display_treatments" + treatment# ($treatment_number) - for column# {$column_number} (array expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'method' , $this_treatment ) ) {

            return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "display_treatments" + treatment# ($treatment_number) - for column# {$column_number} (no "method")
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        if (    ! is_string( $this_treatment['method'] )
                ||
                trim( $this_treatment['method'] ) === ''
                ||
                strlen( $this_treatment['method'] ) > 64
                ||
                ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash( $this_treatment['method'] )
            ) {

            return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "display_treatments" + treatment# ($treatment_number) + "method" - for column# {$column_number} (bad "method")
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        if ( $this_treatment['method'] === 'bold' ) {

            // =================================================================
            // BOLD
            // =================================================================

            // -----------------------------------------------------------------
            //  array(
            //      'method'    =>  'bold'
            //      )
            // -----------------------------------------------------------------

            $field_value = <<<EOT
<strong>{$field_value}</strong>
EOT;

            // -----------------------------------------------------------------

        } elseif ( $this_treatment['method'] === 'to-clickable-url' ) {

            // =================================================================
            // TO-CLICKABLE-URL
            // =================================================================

            // -----------------------------------------------------------------
            //  array(
            //      'method'    =>  'to-clickable-url'
            //      'args'      =>  array(
            //                          'text'          =>  "Xxx"
            //                              //  (Optional; if not specified the field value is used)
            //                          'url'           =>  "xxx"
            //                              //  (Optional; if not specified the field value is used)
            //                          'attributes'    =>  array(
            //                                                  //  Eg;
            //                                                  'target'    =>  "_blank", etc
            //                                                  'class'     =>  "xxx"
            //                                                  'style'     =>  "xxx"
            //                                                  //  ...etc...
            //                                                  )
            //                              //  Optional
            //                          )
            //      )
            // -----------------------------------------------------------------

            if ( isset( $this_treatment['args'] ) ) {

                if ( ! is_array( $this_treatment['args'] ) ) {

                    return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "display_treatments" + treatment# ($treatment_number) + "args" - for column# {$column_number} (bad "args" - array expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

            } else {

                $this_treatment['args'] = array() ;

            }

            // -----------------------------------------------------------------

            $href = $field_value ;
            $text = $field_value ;

            // -----------------------------------------------------------------

            if ( isset( $this_treatment['args']['url'] ) ) {

                if ( ! is_string( $this_treatment['args']['url'] ) ) {

                    return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "display_treatments" + treatment# ($treatment_number) + "args" + "url" - for column# {$column_number} (possibly empty string expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                $href = $this_treatment['args']['url'] ;

            }

            // -----------------------------------------------------------------

            if ( isset( $this_treatment['args']['text'] ) ) {

                if (    ! is_string( $this_treatment['args']['text'] )
                        ||
                        trim( $this_treatment['args']['text'] ) === ''
                    ) {

                    return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "display_treatments" + treatment# ($treatment_number) + "args" + "text" - for column# {$column_number} (non-empty string expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                $text = $this_treatment['args']['text'] ;

            }

            // -----------------------------------------------------------------

            $attributes = '' ;
            $comma = '' ;

            // -----------------------------------------------------------------

            if ( isset( $this_treatment['args']['attributes'] ) ) {

                // -------------------------------------------------------------

                if ( ! is_array( $this_treatment['args']['attributes'] ) ) {

                    return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "display_treatments" + treatment# ($treatment_number) + "args" + "attributes" - for column# {$column_number} (possibly empty array expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // -------------------------------------------------------------

                foreach ( $this_treatment['args']['attributes'] as $name => $value ) {

                    $attributes .= <<<EOT
{$comma}{$name}="{$value}"
EOT;

                    $comma = chr(32) ;

                }

                // -------------------------------------------------------------

            } else {

                $attributes = 'target="_blank"' ;

            }

            // -----------------------------------------------------------------

            $field_value = <<<EOT
<a href="{$href}"{$attributes}>{$text}</a>
EOT;

            // -----------------------------------------------------------------

        } elseif ( $this_treatment['method'] === 'micro-datetime-utc-pretty' ) {

            // =================================================================
            // MICRO-DATETIME-UTC-PRETTY
            // =================================================================

            // -----------------------------------------------------------------
            // array(
            //     'method'    =>  'micro-datetime-utc-pretty'
            //     'instance'  =>  NULL | "<date-format-for-seconds-part>"
            //     )
            //     //  Converts date/time like:-
            //     //      123456789.1234
            //     //      (seconds.usec as float)
            //     //  to (eg):-
            //     //      3 Feb 2014 14:02:15 134,800 us
            // -----------------------------------------------------------------

            if ( trim( $field_value ) !== '' ) {

                // -------------------------------------------------------------

                $parts = explode( '.' , $field_value ) ;

                // -------------------------------------------------------------

                if (    count( $parts ) === 2
                        &&
                        ctype_digit( $parts[0] )
                        &&
                        ctype_digit( $parts[1] )
                    ) {

                    // ---------------------------------------------------------

                    $seconds = $parts[0] ;

                    // ---------------------------------------------------------

                    if (    isset( $this_treatment['instance'] )
                            &&
                            is_string( $this_treatment['instance'] )
                            &&
                            trim( $this_treatment['instance'] ) !== ''
                        ) {
                        $format = $this_treatment['instance'] ;

                    } else {
                        $format = 'j M Y\&\n\b\s\p\; G:i:s' ;

                    }

                    // ---------------------------------------------------------

                    $pretty_seconds = date( $format , $seconds ) ;

                    // ---------------------------------------------------------

                    $micro_seconds = $parts[1] ;

                    // ---------------------------------------------------------

                    if ( strlen( $micro_seconds ) < 6 ) {
                        $micro_seconds = str_pad( $micro_seconds , 6 , '0' , STR_PAD_RIGHT ) ;

                    } elseif ( strlen( $micro_seconds ) > 6 ) {
                        $micro_seconds = substr( $micro_seconds , 0 , 6 ) ;

                    }

                    // ---------------------------------------------------------

                    $pretty_micro_seconds = substr( $micro_seconds , 0 , 3 ) .
                                            ',' .
                                            substr( $micro_seconds , 3  ) .
                                            '&nbsp;&micro;s'
                                            ;

                    // ---------------------------------------------------------

                    $field_value = <<<EOT
{$pretty_seconds}&nbsp; {$pretty_micro_seconds}
EOT;

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        } elseif ( $this_treatment['method'] === 'yes-no' ) {

            // =================================================================
            // YES-NO
            // =================================================================

            // -----------------------------------------------------------------
            //  array(
            //      'method'    =>  'yes-no'
            //      'args'      =>  array(
            //                          'custom_conversions'    =>  array(
            //                              'TRUE'  =>  'Yes'       ,
            //                              'FALSE' =>  '&mdash;'
            //                              )
            //                          )
            //      )
            // -----------------------------------------------------------------

            if (    isset( $this_treatment['args'] )
                    &&
                    is_array( $this_treatment['args'] )
                    &&
                    isset( $this_treatment['args']['custom_conversions'] )
                ) {

                if ( $field_value ) {

                    if (    isset( $this_treatment['args']['custom_conversions']['TRUE'] )
                            &&
                            is_scalar( $this_treatment['args']['custom_conversions']['TRUE'] )
                        ) {
                        $field_value = $this_treatment['args']['custom_conversions']['TRUE'] ;

                    } else {
                        $field_value = 'yes' ;

                    }

                } else {

                    if (    isset( $this_treatment['args']['custom_conversions']['FALSE'] )
                            &&
                            is_scalar( $this_treatment['args']['custom_conversions']['FALSE'] )
                        ) {
                        $field_value = $this_treatment['args']['custom_conversions']['FALSE'] ;

                    } else {
                        $field_value = 'no' ;

                    }

                }

            } else {

                if ( $field_value ) {
                    $field_value = 'yes' ;

                } else {
                    $field_value = 'no' ;

                }

            }

            // -----------------------------------------------------------------

        } elseif ( $this_treatment['method'] === 'password' ) {

            // =================================================================
            // PASSWORD
            // =================================================================

            // -----------------------------------------------------------------
            //  array(
            //      'method'    =>  'password'
            //      )
            // -----------------------------------------------------------------

            $field_value = str_repeat( '*' , strlen( $field_value ) ) ;

            // -----------------------------------------------------------------

        } elseif ( $this_treatment['method'] === 'image' ) {

            // =================================================================
            // IMAGE
            // =================================================================

            // -----------------------------------------------------------------
            //  array(
            //      'method'    =>  'image'
            //      'args'      =>  array()
            //      )
            // -----------------------------------------------------------------

            if (    is_string( $field_value )
                    &&
                    trim( $field_value ) !== ''
                ) {

                $ext = pathinfo( $field_value , PATHINFO_EXTENSION ) ;

                $image_extensions = array(
                    'gif'       ,
                    'png'       ,
                    'jpeg'      ,
                    'jpg'       ,
                    'jpe'
                    ) ;

                if ( in_array( strtolower( $ext ) , $image_extensions , TRUE ) ) {

                    $title =    \htmlentities(
                                    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_title(
                                        \strip_tags(
                                            \basename( $field_value )
                                            )
                                        )
                                    ) ;

                    $style = '' ;

                    if (    array_key_exists( 'args' , $this_treatment )
                            &&
                            array_key_exists( 'style' , $this_treatment['args'] )
                            &&
                            is_string( $this_treatment['args']['style'] )
                            &&
                            trim( $this_treatment['args']['style'] ) !== ''
                        ) {

                        $style = 'style="' . trim( $this_treatment['args']['style'] ) . '"' ;

                    }

                    $field_value = <<<EOT
<a  target="_blank"
    href="{$field_value}"
    style="text-decoration:none"
    title="{$title}"
    ><img   border="0"
            src="{$field_value}"
            {$style}
            alt="{$title}"
            /></a>
EOT;

//echo '<br />' , htmlentities( $field_value ) ;

                }

            }

            // -----------------------------------------------------------------

        } elseif ( $this_treatment['method'] === 'htmlentities' ) {

            // =================================================================
            // HTMLENTITIES
            // =================================================================

            // -----------------------------------------------------------------
            //  array(
            //      'method'    =>  'htmlentities'
            //      )
            // -----------------------------------------------------------------

            $field_value = htmlentities( $field_value ) ;

            // -----------------------------------------------------------------

        } elseif ( $this_treatment['method'] === 'wrapper' ) {

            // =================================================================
            // WRAPPER
            // =================================================================

            // -----------------------------------------------------------------
            //  array(
            //      'method'    =>  'wrapper'
            //      'args'      =>  array(
            //                          'before'    =>  "xxx"   ,
            //                          'after'     =>  "xxx"
            //                          )
            //      )
            // -----------------------------------------------------------------

            if (    ! array_key_exists( 'args' , $this_treatment )
                    ||
                    ! is_array( $this_treatment['args'] )
                ) {

                return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "display_treatments" + treatment# ($treatment_number) + "args" - for column# {$column_number} (array expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            if (    array_key_exists( 'before' , $this_treatment['args'] )
                    &&
                    is_string( $this_treatment['args']['before'] )
                ) {

                $field_value = $this_treatment['args']['before'] . $field_value ;

            }

            // -----------------------------------------------------------------

            if (    array_key_exists( 'after' , $this_treatment['args'] )
                    &&
                    is_string( $this_treatment['args']['after'] )
                ) {

                $field_value .= $this_treatment['args']['after'] ;

            }

            // -----------------------------------------------------------------

        } elseif ( $this_treatment['method'] === 'custom' ) {

            // =================================================================
            // CUSTOM
            // =================================================================

            // -----------------------------------------------------------------
            //  array(
            //      'method'    =>  'custom'
            //      'args'      =>  array(
            //                          'function'  =>  "xxx"       ,
            //                          'args'      =>  array(...)
            //                          )
            //      )
            // -----------------------------------------------------------------

            if (    ! array_key_exists( 'args' , $this_treatment )
                    ||
                    ! is_array( $this_treatment['args'] )
                    ||
                    count( $this_treatment['args'] ) < 1
                ) {

                return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "display_treatments" + treatment# ($treatment_number) + "args" - for column# {$column_number} (non-empty array expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            if ( ! array_key_exists( 'function' , $this_treatment['args'] ) ) {

                return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "display_treatments" + treatment# ($treatment_number) + "args" - for column# {$column_number} (no "function" specified)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            $fn = $this_treatment['args']['function'] ;

            // -----------------------------------------------------------------

            if (    ! is_string( $fn )
                    ||
                    trim( $fn ) === ''
                ) {

                return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "display_treatments" + treatment# ($treatment_number) + "args" + "function" - for column# {$column_number} (non-empty string expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            if ( ! \function_exists( $fn ) ) {

                return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "display_treatments" + treatment# ($treatment_number) + "args" + "function" - for column# {$column_number} (function not found)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            if ( array_key_exists( 'args' , $this_treatment['args'] ) ) {
                $extra_args = $this_treatment['args']['args'] ;

            } else {
                $extra_args = array() ;

            }

            // -----------------------------------------------------------------

            if ( ! is_array( $extra_args ) ) {

                return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "display_treatments" + treatment# ($treatment_number) + "args" + "args" - for column# {$column_number} (possibly empty array expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -------------------------------------------------------------------------
            // <custom_display_treatment_function(
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
            //      &$input_field_value                     ,
            //      $extra_args
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - -
            // Apply the specified display treatment to the specified field value.
            //
            // Specified in the dataset record table field's "display_treatments"
            // as follows (eg):-
            //
            //      ...
            //      array(
            //          'base_slug'                     =>  'this_field_name'       ,
            //          'label'                         =>  'This Field Name'       ,
            //          'question_sortable'             =>  TRUE                    ,
            //          'raw_value_from'                =>  array(
            //                                                  'method'    =>  'array-storage-field-slug'  ,
            //                                                  'instance'  =>  'this_field_name'
            //                                                  )   ,
            //          'display_treatments'            =>  array(
            //              array(
            //                  'method'    =>  'custom'
            //                  'args'      =>  array(
            //                                      'function'  =>  "xxx"       ,
            //                                      'args'      =>  array(...)
            //                                      )
            //                  )
            //              )
            //          )
            //      ...
            //
            // RETURNS
            //      o   On SUCCESS!
            //          - - - - - -
            //          TRUE
            //
            //      o   On FAILURE!
            //          - - - - - -
            //          $error_message STRING
            // -------------------------------------------------------------------------

            $result = $fn(
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
                        $custom_get_table_data_function_data    ,
                        $field_value                            ,
                        $extra_args
                        ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

        } elseif ( $this_treatment['method'] === 'max-words' ) {

            // =================================================================
            // MAX-WORDS
            // =================================================================

            // -----------------------------------------------------------------
            // array(
            //     'method'        =>  'max-words'      ,
            //     'max_words'     =>  16
            //     )
            // -----------------------------------------------------------------

            if (    ! array_key_exists( 'max_words' , $this_treatment )
                    ||
                    ! is_numeric( $this_treatment['max_words'] )
                ) {

                return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "display_treatments" + treatment# ($treatment_number) + "max_words" - for column# {$column_number} (number expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            if (    trim( $this_treatment['max_words'] ) === ''
                    ||
                    ! ctype_digit( (string) $this_treatment['max_words'] )
                    ||
                    $this_treatment['max_words'] < 1
                ) {

                return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad "dataset_records_table" + "column_defs" + "display_treatments" + treatment# ($treatment_number) + "max_words" - for column# {$column_number} (number 1+ expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -------------------------------------------------------------------------
            // array preg_split ( string $pattern , string $subject [, int $limit = -1 [, int $flags = 0 ]] )
            // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
            // Split the given string by a regular expression.
            //
            //      pattern
            //          The pattern to search for, as a string.
            //
            //      subject
            //          The input string.
            //
            //      limit
            //          If specified, then only substrings up to limit are returned with
            //          the rest of the string being placed in the last substring. A
            //          limit of -1, 0 or NULL means "no limit" and, as is standard
            //          across PHP, you can use NULL to skip to the flags parameter.
            //
            //      flags
            //          flags can be any combination of the following flags (combined
            //          with the | bitwise operator):
            //
            //          PREG_SPLIT_NO_EMPTY
            //              If this flag is set, only non-empty pieces will be returned
            //              by preg_split().
            //
            //          PREG_SPLIT_DELIM_CAPTURE
            //              If this flag is set, parenthesized expression in the
            //              delimiter pattern will be captured and returned as well.
            //
            //          PREG_SPLIT_OFFSET_CAPTURE
            //              If this flag is set, for every occurring match the appendant
            //              string offset will also be returned. Note that this changes
            //              the return value in an array where every element is an array
            //              consisting of the matched string at offset 0 and its string
            //              offset into subject at offset 1.
            //
            // Returns an array containing substrings of subject split along boundaries
            // matched by pattern.
            //
            // (PHP 4, PHP 5)
            // -------------------------------------------------------------------------

            $words_array = \preg_split(
                                '/\s+/'         ,
                                $field_value
                                ) ;

            // -----------------------------------------------------------------

            if ( count( $words_array ) > $this_treatment['max_words'] ) {
                $words_array = array_slice( $words_array , 0 , $this_treatment['max_words'] ) ;
            }

            // -----------------------------------------------------------------

            $field_value = implode( chr(32) , $words_array ) . '...' ;

            // -----------------------------------------------------------------

        } else {

            // =================================================================
            // ERROR
            // =================================================================

            $safe_method = htmlentities( $this_treatment['method'] ) ;

            return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Unrecognised/unsupported "dataset_records_table" + "column_defs" + "display_treatments" + treatment# ($treatment_number) + "method" + ("{$safe_method}") - for column# {$column_number}
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return TRUE ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_action_column_value_for_dataset_record()
// =============================================================================

function get_action_column_value_for_dataset_record(
    $all_application_dataset_definitions            ,
    $caller_apps_includes_dir                       ,
    $question_front_end                             ,
    $selected_datasets_dmdd                         ,
    $dataset_records                                ,
    $dataset_slug                                   ,
    $dataset_title                                  ,
    $array_storage_key_field_slug                   ,
    $dataset_record_index                           ,
    $dataset_record_data                            ,
    $column_index                                   ,
    $column_number                                  ,
    $column_def                                     ,
    &$custom_get_table_data_function_data           ,
    &$question_delete_record_javascript_required
    ) {

    // -------------------------------------------------------------------------
    // get_action_column_value_for_dataset_record(
    //      $all_application_dataset_definitions            ,
    //      $caller_apps_includes_dir                       ,
    //      $question_front_end                             ,
    //      $selected_datasets_dmdd                         ,
    //      $dataset_records                                ,
    //      $dataset_slug                                   ,
    //      $dataset_title                                  ,
    //      $array_storage_key_field_slug                   ,
    //      $dataset_record_index                           ,
    //      $dataset_record_data                            ,
    //      $column_index                                   ,
    //      $column_number                                  ,
    //      $column_def                                     ,
    //      &$custom_get_table_data_function_data           ,
    //      &$question_delete_record_javascript_required
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          $column_value (HTML) STRING
    //
    //          And updates:-
    //              $question_delete_record_javascript_required
    //          to TRUE, if required.
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $selected_datasets_dmdd['dataset_records_table']['record_actions'] = array(
    //          array(
    //              'type'          =>  'standard'      ,
    //              'slug'          =>  'edit'          ,
    //              'link_title'    =>  'edit'
    //              )   ,
    //          array(
    //              'type'          =>  'standard'      ,
    //              'slug'          =>  'delete'        ,
    //              'link_title'    =>  'delete'
    //              )   ,
    //          array(
    //              'type'          =>  'custom'                ,
    //              'slug'          =>  'select-dirs-files'     ,
    //              'link_title'    =>  'select files'
    //              )
    //          )
    //
    // NOTE!
    // =====
    // The presence of the:-
    //      "type"
    //      "slug"
    //      "link_title"
    //
    // parameters has already been checked for.  As well as some basic
    // checks as to the validity of their respective values.
    // -------------------------------------------------------------------------

    $column_value = '' ;

    $action_comma = '' ;

    // -------------------------------------------------------------------------

    foreach ( $selected_datasets_dmdd['dataset_records_table']['record_actions'] as $record_action_index => $record_action_details ) {

        // ---------------------------------------------------------------------

        $record_action_number = $record_action_index + 1 ;

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $record_action_details = array(
        //          'type'          =>  'standard'      ,
        //          'slug'          =>  'edit'          ,
        //          'link_title'    =>  'edit'
        //          )
        //
        //      --OR--
        //
        //      $record_action_details = array(
        //          'type'          =>  'standard'      ,
        //          'slug'          =>  'delete'        ,
        //          'link_title'    =>  'delete'
        //          )
        //
        //      --OR--
        //
        //      $record_action_details = array(
        //          'type'          =>  'custom'                ,
        //          'slug'          =>  'select-dirs-files'     ,
        //          'link_title'    =>  'select files'
        //          )
        //
        // ---------------------------------------------------------------------

        if ( $record_action_details['type'] === 'standard' ) {

            // -------------------------------------------------------------------------
            // process_standard_record_action_for_dataset_record(
            //      $all_application_dataset_definitions            ,
            //      $caller_apps_includes_dir                       ,
            //      $question_front_end                             ,
            //      $selected_datasets_dmdd                         ,
            //      $dataset_records                                ,
            //      $dataset_slug                                   ,
            //      $dataset_title                                  ,
            //      $array_storage_key_field_slug                   ,
            //      $dataset_record_index                           ,
            //      $dataset_record_data                            ,
            //      $column_index                                   ,
            //      $column_number                                  ,
            //      $column_def                                     ,
            //      &$custom_get_table_data_function_data           ,
            //      &$question_delete_record_javascript_required    ,
            //      &$column_value                                  ,
            //      $action_comma                                   ,
            //      $record_action_index                            ,
            //      $record_action_number                           ,
            //      $record_action_details
            //      )
            // - - - - - - - - - - - - - - - - - - - - - - - - - - -
            // RETURNS
            //      o   On SUCCESS!
            //          - - - - - -
            //          TRUE
            //
            //          And updates:-
            //
            //          1)  $column_value, and;
            //
            //          2)  $question_delete_record_javascript_required
            //              to TRUE, if required.
            //
            //      o   On FAILURE!
            //          - - - - - -
            //          $error_message STRING
            // -------------------------------------------------------------------------

            $result = process_standard_record_action_for_dataset_record(
                            $all_application_dataset_definitions            ,
                            $caller_apps_includes_dir                       ,
                            $question_front_end                             ,
                            $selected_datasets_dmdd                         ,
                            $dataset_records                                ,
                            $dataset_slug                                   ,
                            $dataset_title                                  ,
                            $array_storage_key_field_slug                   ,
                            $dataset_record_index                           ,
                            $dataset_record_data                            ,
                            $column_index                                   ,
                            $column_number                                  ,
                            $column_def                                     ,
                            $custom_get_table_data_function_data            ,
                            $question_delete_record_javascript_required     ,
                            $column_value                                   ,
                            $action_comma                                   ,
                            $record_action_index                            ,
                            $record_action_number                           ,
                            $record_action_details
                            ) ;

            // -----------------------------------------------------------------

        } elseif ( $record_action_details['type'] === 'custom' ) {

            // -----------------------------------------------------------------

            $result = process_custom_record_action_for_dataset_record(
                            $all_application_dataset_definitions            ,
                            $caller_apps_includes_dir                       ,
                            $question_front_end                             ,
                            $selected_datasets_dmdd                         ,
                            $dataset_records                                ,
                            $dataset_slug                                   ,
                            $dataset_title                                  ,
                            $array_storage_key_field_slug                   ,
                            $dataset_record_index                           ,
                            $dataset_record_data                            ,
                            $column_index                                   ,
                            $column_number                                  ,
                            $column_def                                     ,
                            $custom_get_table_data_function_data            ,
                            $question_delete_record_javascript_required     ,
                            $column_value                                   ,
                            $action_comma                                   ,
                            $record_action_index                            ,
                            $record_action_number                           ,
                            $record_action_details
                            ) ;

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            $safe_type = htmlentities( $this_record_action_details['type'] ) ;

            return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Unrecognised/unsupported "dataset_records_table" + record action# {$record_action_number} + "type" ("{$safe_type}")
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_action_column_value_for_dataset_record()
EOT;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return array( $result ) ;
        }

        // ---------------------------------------------------------------------

        $action_comma = $selected_datasets_dmdd['dataset_records_table']['action_separator'] ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $column_value ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// process_standard_record_action_for_dataset_record()
// =============================================================================

function process_standard_record_action_for_dataset_record(
    $all_application_dataset_definitions            ,
    $caller_apps_includes_dir                       ,
    $question_front_end                             ,
    $selected_datasets_dmdd                         ,
    $dataset_records                                ,
    $dataset_slug                                   ,
    $dataset_title                                  ,
    $array_storage_key_field_slug                   ,
    $dataset_record_index                           ,
    $dataset_record_data                            ,
    $column_index                                   ,
    $column_number                                  ,
    $column_def                                     ,
    &$custom_get_table_data_function_data           ,
    &$question_delete_record_javascript_required    ,
    &$column_value                                  ,
    $action_comma                                   ,
    $record_action_index                            ,
    $record_action_number                           ,
    $record_action_details
    ) {

    // -------------------------------------------------------------------------
    // process_standard_record_action_for_dataset_record(
    //      $all_application_dataset_definitions            ,
    //      $caller_apps_includes_dir                       ,
    //      $question_front_end                             ,
    //      $selected_datasets_dmdd                         ,
    //      $dataset_records                                ,
    //      $dataset_slug                                   ,
    //      $dataset_title                                  ,
    //      $array_storage_key_field_slug                   ,
    //      $dataset_record_index                           ,
    //      $dataset_record_data                            ,
    //      $column_index                                   ,
    //      $column_number                                  ,
    //      $column_def                                     ,
    //      &$custom_get_table_data_function_data           ,
    //      &$question_delete_record_javascript_required    ,
    //      &$column_value                                  ,
    //      $action_comma                                   ,
    //      $record_action_index                            ,
    //      $record_action_number                           ,
    //      $record_action_details
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          TRUE
    //
    //          And updates:-
    //
    //          1)  $column_value, and;
    //
    //          2)  $question_delete_record_javascript_required
    //              to TRUE, if required.
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $record_action_details = array(
    //          'type'          =>  'standard'      ,
    //          'slug'          =>  'edit'          ,
    //          'link_title'    =>  'edit'
    //          )
    //
    //      --OR--
    //
    //      $record_action_details = array(
    //          'type'          =>  'standard'      ,
    //          'slug'          =>  'delete'        ,
    //          'link_title'    =>  'delete'
    //          )
    //
    // NOTE!
    // =====
    // The presence of the:-
    //      "type"
    //      "slug"
    //      "link_title"
    //
    // parameters has already been checked for.  As well as some basic
    // checks as to the validity of their respective values.
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $safe_record_action_slug = htmlentities( $record_action_details['slug'] ) ;

    // =========================================================================
    // CHECK the RECORD ACTION "SLUG"...
    // =========================================================================

    if (    $record_action_details['slug'] !== 'edit'
            &&
            $record_action_details['slug'] !== 'delete'
        ) {

        return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Unrecognised/unsupported "dataset_records_table" + record action# {$record_action_number} + "slug" ("{$safe_record_action_slug}") (#1)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // =========================================================================
    // Get the key field value/id of the record to be edited/deleted...
    // =========================================================================

    $target_record_key_slash_id = NULL ;

    // -------------------------------------------------------------------------

    if (    array_key_exists( 'storage_method' , $selected_datasets_dmdd )
            &&
            $selected_datasets_dmdd['storage_method'] === 'mysql'
        ) {

        // ==================================================================
        // STORAGE METHOD = "MYSQL"...
        // ==================================================================

        require_once( dirname( __FILE__ ) . '/mysql-array-storage-key-field-overrides-support.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_check_mysql_array_storage_key_field_overrides(
        //      $caller_apps_includes_dir       ,
        //      $selected_datasets_dmdd         ,
        //      $dataset_title                  ,
        //      $dataset_record_data
        //      )
        // - - - - - - - - - - - - - - - - - - -
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

        $result = get_check_mysql_array_storage_key_field_overrides(
                        $caller_apps_includes_dir       ,
                        $selected_datasets_dmdd         ,
                        $dataset_title                  ,
                        $dataset_record_data
                        ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        if ( $result === NULL ) {

            return TRUE ;
                //  Is this correct?  Basically, we're ignoring the standard
                //  record action if NO MySQL overrides are specified ???

        }

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $result = array(
        //          'slug'                          =>  "xxx"           ,
        //          'format'                        =>  "yyy"           ,
        //          'value'                         =>  "" | "zzz"      ,
        //          'fail_link_creation_silently'   =>  TRUE/FALSE      ,
        //          'url_encode_function_name'      =>  "" | "aaa"      ,
        //          'url_decode_function_name'      =>  "" | "bbb"
        //          )
        //
        // ---------------------------------------------------------------------

        if ( $result['fail_link_creation_silently'] === TRUE ) {
            return TRUE ;
        }

        // ---------------------------------------------------------------------

        $target_record_key_slash_id = $result['value'] ;

        // ---------------------------------------------------------------------

/*
        if (    array_key_exists( 'mysql_overrides' , $selected_datasets_dmdd )
                &&
                is_array( $selected_datasets_dmdd['mysql_overrides'] )
                &&
                array_key_exists( 'array_storage_key_field_slug' , $selected_datasets_dmdd['mysql_overrides'] )
                &&
                is_string( $selected_datasets_dmdd['mysql_overrides']['array_storage_key_field_slug'] )
                &&
                trim( $selected_datasets_dmdd['mysql_overrides']['array_storage_key_field_slug'] ) !== ''
            ) {

            // -----------------------------------------------------------------

            if (    ! array_key_exists(
                        $selected_datasets_dmdd['mysql_overrides']['array_storage_key_field_slug']  ,
                        $dataset_record_data
                        )
                ) {

                $safe_key_field_slug =
                    htmlentities( $selected_datasets_dmdd['mysql_overrides']['array_storage_key_field_slug'] )
                    ;

                return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Can't create "{$safe_record_action_slug}" record link (because record has no "{$safe_key_field_slug}" (= key) field)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            $key_field_format = NULL ;

            // -----------------------------------------------------------------

            if ( array_key_exists( 'key_field_format' , $selected_datasets_dmdd['mysql_overrides'] ) ) {

                if (    is_string( $selected_datasets_dmdd['mysql_overrides']['key_field_format'] )
                        &&
                        trim( $selected_datasets_dmdd['mysql_overrides']['key_field_format'] ) === ''
                    ) {
                    $key_field_format = 'sequential-id' ;

                } elseif (  in_array(
                                $selected_datasets_dmdd['mysql_overrides']['key_field_format']              ,
                                array( 'sequential-id' , 'ctype-digit' , 'great-kiwi-password' , 'url' )    ,
                                TRUE
                                )
                    ) {
                    $key_field_format = $selected_datasets_dmdd['mysql_overrides']['key_field_format'] ;

                }

            } else {
                $key_field_format = 'sequential-id' ;

            }

            // -----------------------------------------------------------------

            if ( ! is_string( $key_field_format ) ) {

                return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Can't create "{$safe_record_action_slug}" record link (unrecognised/unsupported "key_field_format")
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            $key_field_ok = FALSE ;

            // -----------------------------------------------------------------

            $key_field_value =
                $dataset_record_data[
                    $selected_datasets_dmdd['mysql_overrides']['array_storage_key_field_slug']
                    ] ;

            // -----------------------------------------------------------------

            if ( $key_field_format === 'ctype-digit' ) {

                // -------------------------------------------------------------

                if ( \ctype_digit( $key_field_value ) ) {
                    $key_field_ok = TRUE ;
                }

                // -------------------------------------------------------------

            } elseif ( $key_field_format === 'sequential-id' ) {

                // -------------------------------------------------------------

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

                // -------------------------------------------------------------

            } elseif ( $key_field_format === 'great-kiwi-password' ) {

                // -------------------------------------------------------------

                $key_field_format_args = array() ;

                // -----------------------------------------------------------------

                if ( array_key_exists( 'key_field_format_args' , $selected_datasets_dmdd['mysql_overrides'] ) ) {
                    $key_field_format_args = $selected_datasets_dmdd['mysql_overrides']['key_field_format_args'] ;
                }

                // -----------------------------------------------------------------

                if ( ! is_array( $key_field_format_args ) ) {

                    return <<<EOT
PROBLEM creating "{$safe_record_action_slug}" record link (bad "key_field_format_args" - array of "great kiwi password" options expected)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // -------------------------------------------------------------

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

                // -------------------------------------------------------------

            } elseif ( $key_field_format === 'url' ) {

                // -------------------------------------------------------------

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

                $minlen            = 'default' ;
                $maxlen            = 255       ;    //  Max. MySQL field length
                $question_empty_ok = FALSE     ;

                // -------------------------------------------------------------

                if (    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_validationFunctions\absolute_url_string__minLen_maxLen_questionEmptyOK(
                            $key_field_value        ,
                            $minlen                 ,
                            $maxlen                 ,
                            $question_empty_ok
                            ) === TRUE
                    ) {
                    $key_field_ok = TRUE ;
                }

                // -------------------------------------------------------------

            } else {

                return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Can't create "{$safe_record_action_slug}" record link (unrecognised/unsupported "key_field_format")
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -----------------------------------------------------------------

            if ( $key_field_ok !== TRUE ) {

                // -------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $dataset_record_data ) ;

                if (    $key_field_value === ''
                        &&
                        array_key_exists( 'fail_link_creation_silently_on_empty_record_key' , $selected_datasets_dmdd['mysql_overrides'] )
                        &&
                        $selected_datasets_dmdd['mysql_overrides']['fail_link_creation_silently_on_empty_record_key'] === TRUE
                    ) {
                    return TRUE ;
                }

                // -------------------------------------------------------------

                return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Can't create "{$safe_record_action_slug}" record link (because record's "key" field value is invalid)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

//          TODO !!!
//
//          if ( $key_field_format === 'url' ) {
//              We should url_encode() the key_field_value.
//              Not yet implemented.

            $target_record_key_slash_id =
                $dataset_record_data[
                    $selected_datasets_dmdd['mysql_overrides']['array_storage_key_field_slug']
                ] ;

            // -----------------------------------------------------------------

        }
*/

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( $target_record_key_slash_id === NULL ) {

        // ==================================================================
        // STORAGE METHOD = "ARRAY-STORAGE"...
        // ==================================================================

        if ( $array_storage_key_field_slug === '' ) {

            return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; No "dataset_records_table" + "array_storage_key_field_slug" (this value is required for record action = "{$safe_record_action_slug}")
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // -----------------------------------------------------------------

        if ( ! isset( $dataset_record_data[ $array_storage_key_field_slug ] ) ) {

            return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Can't create "{$safe_record_action_slug}" record link (because record has no "{$array_storage_key_field_slug}" (= key) field)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // is_record_key(
        //      $candidate_record_key
        //      )
        // - - - - - - - - - - - - - - - - -
        // RETURNS
        //      o   On SUCCESS
        //              TRUE
        //
        //      o   On FAILURE
        //              FALSE
        // -------------------------------------------------------------------------

        if ( ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\is_record_key(
                    $dataset_record_data[ $array_storage_key_field_slug ]
                    )
            ) {

            return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Can't create "{$safe_record_action_slug}" record link (because record's "{$array_storage_key_field_slug}" field is invalid)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ------------------------------------------------------------------

        $target_record_key_slash_id = $dataset_record_data[ $array_storage_key_field_slug ] ;

        // ------------------------------------------------------------------

    }

    // ----------------------------------------------------------------------

    if ( $record_action_details['slug'] === 'edit' ) {

        // =================================================================
        // EDIT
        // =================================================================

/*
        if ( $array_storage_key_field_slug === '' ) {

            return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; No "dataset_records_table" + "array_storage_key_field_slug" (this value is required for record action = "edit")
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // -----------------------------------------------------------------

        if ( ! isset( $dataset_record_data[ $array_storage_key_field_slug ] ) ) {

            return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Can't edit record (because it has no "{$array_storage_key_field_slug}" (= key) field)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // is_record_key(
        //      $candidate_record_key
        //      )
        // - - - - - - - - - - - - - - - - -
        // RETURNS
        //      o   On SUCCESS
        //              TRUE
        //
        //      o   On FAILURE
        //              FALSE
        // -------------------------------------------------------------------------

        if ( ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\is_record_key(
                    $dataset_record_data[ $array_storage_key_field_slug ]
                    )
            ) {

            return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Can't edit record (because it's "{$array_storage_key_field_slug}" field is invalid)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }
*/

        // -----------------------------------------------------------------

        require_once( dirname( __FILE__ ) . '/get-dataset-urls.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_edit_record_url(
        //      $caller_apps_includes_dir   ,
        //      $question_front_end         ,
        //      $dataset_slug = NULL        ,
        //      $record_key = NULL
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

        $href = get_edit_record_url(
                    $caller_apps_includes_dir       ,
                    $question_front_end             ,
                    $_GET['dataset_slug']           ,
                    $target_record_key_slash_id
                    ) ;

        // -----------------------------------------------------------------

        if ( is_array( $href ) ) {
            return $href[0] ;
        }

        // -----------------------------------------------------------------

        if ( $question_front_end ) {

            $column_value .= <<<EOT
{$action_comma}<a
    href="javascript:void()"
    onclick="window.parent.location.href='{$href}'"
    style="text-decoration:none">{$record_action_details['link_title']}</a>
EOT;
            //  Because the link we're clicking is in an IFRAME

        } else {

            $column_value .= <<<EOT
{$action_comma}<a href="{$href}" style="text-decoration:none">{$record_action_details['link_title']}</a>
EOT;

        }

        // -----------------------------------------------------------------

    } elseif ( $record_action_details['slug'] === 'delete' ) {

        // =================================================================
        // DELETE
        // =================================================================

/*
        if ( $array_storage_key_field_slug === '' ) {

            return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; No "dataset_records_table" + "array_storage_key_field_slug" (this value is required for action = "delete")
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // -----------------------------------------------------------------

        if ( ! isset( $dataset_record_data[ $array_storage_key_field_slug ] ) ) {

            return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Can't delete record (because it has no "{$array_storage_key_field_slug}" (= key) field)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // is_record_key(
        //      $candidate_record_key
        //      )
        // - - - - - - - - - - - - - - - - -
        // RETURNS
        //      o   On SUCCESS
        //              TRUE
        //
        //      o   On FAILURE
        //              FALSE
        // -------------------------------------------------------------------------

        if ( ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\is_record_key(
                    $dataset_record_data[ $array_storage_key_field_slug ]
                    )
            ) {

            return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Can't delete record (because it's "{$array_storage_key_field_slug}" field is invalid)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }
*/

        // -----------------------------------------------------------------

        $column_value .= <<<EOT
{$action_comma}<a
    href="javascript:void()"
    style="text-decoration:none"
    onclick="greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager_questionDeleteRecord(this,'{$target_record_key_slash_id}')"
    >{$record_action_details['link_title']}</a>
EOT;

        // -----------------------------------------------------------------

        $question_delete_record_javascript_required = TRUE ;

        // -----------------------------------------------------------------

    } else {

        // =====================================================================
        // ERROR (UNRECOGNISED/UNSUPPORTED RECORD ACTION "SLUG")
        // =====================================================================

        $safe_slug = htmlentities( $record_action_details['slug'] ) ;

        return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Unrecognised/unsupported "dataset_records_table" + record action# {$record_action_number} + "slug" ("{$safe_record_action_slug}") (#2)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return TRUE ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// process_custom_record_action_for_dataset_record()
// =============================================================================

function process_custom_record_action_for_dataset_record(
    $all_application_dataset_definitions            ,
    $caller_apps_includes_dir                       ,
    $question_front_end                             ,
    $selected_datasets_dmdd                         ,
    $dataset_records                                ,
    $dataset_slug                                   ,
    $dataset_title                                  ,
    $array_storage_key_field_slug                   ,
    $dataset_record_index                           ,
    $dataset_record_data                            ,
    $column_index                                   ,
    $column_number                                  ,
    $column_def                                     ,
    &$custom_get_table_data_function_data           ,
    &$question_delete_record_javascript_required    ,
    &$column_value                                  ,
    $action_comma                                   ,
    $record_action_index                            ,
    $record_action_number                           ,
    $record_action_details
    ) {

    // -------------------------------------------------------------------------
    // process_custom_record_action_for_dataset_record(
    //      $all_application_dataset_definitions            ,
    //      $caller_apps_includes_dir                       ,
    //      $question_front_end                             ,
    //      $selected_datasets_dmdd                         ,
    //      $dataset_records                                ,
    //      $dataset_slug                                   ,
    //      $dataset_title                                  ,
    //      $array_storage_key_field_slug                   ,
    //      $dataset_record_index                           ,
    //      $dataset_record_data                            ,
    //      $column_index                                   ,
    //      $column_number                                  ,
    //      $column_def                                     ,
    //      &$custom_get_table_data_function_data           ,
    //      &$question_delete_record_javascript_required    ,
    //      &$column_value                                  ,
    //      $action_comma                                   ,
    //      $record_action_index                            ,
    //      $record_action_number                           ,
    //      $record_action_details
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          TRUE
    //
    //          And updates:-
    //
    //          1)  $column_value, and;
    //
    //          2)  $question_delete_record_javascript_required
    //              to TRUE, if required.
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $record_action_details = array(
    //          'type'          =>  'custom'                ,
    //          'slug'          =>  'select-dirs-files'     ,
    //          'link_title'    =>  'select files'
    //          )
    //
    // NOTE!
    // =====
    // The presence of the:-
    //      "type"
    //      "slug"
    //      "link_title"
    //
    // parameters has already been checked for.  As well as some basic
    // checks as to the validity of their respective values.
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // The "custom actions" are defined by the dataset's "custom_actions"
    // parameter.  Ie:-
    //
    //      $selected_datasets_dmdd['custom_actions'] = array(
    //
    //          array(
    //              'slug'      =>  'select-dirs-files'                     ,
    //              'args'      =>  array(
    //                                  'plugin_stuff_relative_filespec'    =>  'select-dirs-and-files.php'     ,
    //                                  'namespace_and_function_name'       =>  'select_dirs_and_files'
    //                                  )
    //              )
    //
    //          )
    //
    // NOTE!
    // =====
    // The presence of the:-
    //      "slug" and;
    //      "args"
    //
    // parameters has already been checked for.  As well as some basic
    // checks of to the validity of their respective values.
    // -------------------------------------------------------------------------

    // =========================================================================
    // Get the CUSTOM ACTION pointed to by the record action...
    // =========================================================================

    $custom_action_details = NULL ;

    // -------------------------------------------------------------------------

    foreach ( $selected_datasets_dmdd['custom_actions'] as $this_custom_action_index => $this_custom_action_details ) {

        if ( $this_custom_action_details['slug'] === $record_action_details['slug'] ) {
            $custom_action_details = $this_custom_action_details ;


        }

    }

    // -------------------------------------------------------------------------

    if ( ! is_array( $custom_action_details ) ) {

        return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Bad record action# {$record_action_number} ("{$record_action_details['slug']}" - matching custom action not found)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\process_custom_record_action_for_dataset_record()
EOT;

    }

    // =========================================================================
    // Process the CUSTOM ACTION pointed to by the record action...
    // =========================================================================

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $custom_action_details = array(
    //          'slug'      =>  'select-dirs-files'                     ,
    //          'args'      =>  array(
    //                              'plugin_stuff_relative_filespec'    =>  'select-dirs-and-files.php'     ,
    //                              'namespace_and_function_name'       =>  'select_dirs_and_files'
    //                              )
    //          )
    //
    // -------------------------------------------------------------------------

    if ( $array_storage_key_field_slug === '' ) {

        return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; No "dataset_records_table" + "array_storage_key_field_slug" (this value is required for custom record actions)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\process_custom_record_action_for_dataset_record()
EOT;

    }

    // -----------------------------------------------------------------

    if ( ! isset( $dataset_record_data[ $array_storage_key_field_slug ] ) ) {

        return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Can't create custom record action (because record has no "{$array_storage_key_field_slug}" (= key) field)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\process_custom_record_action_for_dataset_record()
EOT;

    }

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // is_record_key(
    //      $candidate_record_key
    //      )
    // - - - - - - - - - - - - - - - - -
    // RETURNS
    //      o   On SUCCESS
    //              TRUE
    //
    //      o   On FAILURE
    //              FALSE
    // -------------------------------------------------------------------------

    if ( ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\is_record_key(
                $dataset_record_data[ $array_storage_key_field_slug ]
                )
        ) {

        return <<<EOT
PROBLEM Displaying Dataset Records:&nbsp; Can't create custom record action (because record's "{$array_storage_key_field_slug}" field is invalid)
For dataset:&nbsp; {$dataset_title}
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\process_custom_record_action_for_dataset_record()
EOT;

    }

    // -----------------------------------------------------------------

    require_once( dirname( __FILE__ ) . '/get-dataset-urls.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\get_custom_record_action_url(
    //      $caller_apps_includes_dir   ,
    //      $question_front_end         ,
    //      $dataset_slug = NULL        ,
    //      $action_slug = NULL         ,
    //      $record_key = NULL          ,
    //      $view_title = FALSE         ,
    //      $return_to = FALSE          ,
    //      $view_slug = FALSE
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the specififed CUSTOM RECORD ACTION URL.
    //
    // If $dataset_slug is NULL, then we use:-
    //      $_GET['dataset_slug']
    //
    // If $action_slug is NULL, then we use:-
    //      $_GET['action_slug']
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

    $href = get_custom_record_action_url(
                $caller_apps_includes_dir                               ,
                $question_front_end                                     ,
                $_GET['dataset_slug']                                   ,
                $custom_action_details['slug']                          ,
                $dataset_record_data[ $array_storage_key_field_slug ]
                ) ;

    // -----------------------------------------------------------------

    if ( is_array( $href ) ) {
        return $href[0] ;
    }

    // -----------------------------------------------------------------

    if ( $question_front_end ) {

        $column_value .= <<<EOT
{$action_comma}<a
    href="javascript:void()"
    onclick="window.parent.location.href='{$href}'"
    style="text-decoration:none">{$record_action_details['link_title']}</a>
EOT;
            //  Because the link we're clicking is in an IFRAME

    } else {

        $column_value .= <<<EOT
{$action_comma}<a href="{$href}" style="text-decoration:none">{$record_action_details['link_title']}</a>
EOT;

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return TRUE ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

