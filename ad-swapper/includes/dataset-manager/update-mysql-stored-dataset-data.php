<?php

// *****************************************************************************
// DATASET-MANAGER / UPDATE-MYSQL-STORED-DATASET-DATA.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// ============================================================================
// update_mysql_stored_dataset_data()
// =============================================================================

function update_mysql_stored_dataset_data(
    $core_plugapp_dirs              ,
    $question_front_end             ,
    $dataset_slug                   ,
    $selected_datasets_dmdd         ,
    $this_dataset_update_method
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // update_mysql_stored_dataset_data(
    //      $core_plugapp_dirs              ,
    //      $question_front_end             ,
    //      $dataset_slug                   ,
    //      $selected_datasets_dmdd         ,
    //      $this_dataset_update_method
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // This routine is called - when the application/plugin first starts -
    // if the:-
    //      "xxx.app/yyy.dd.php"
    //
    // file (in which the dataset is defined) - has been changed since the
    // last time this routine was run.
    //
    // ---
    //
    // This routine then checks to see whether the dataset structure defined
    // in the dataset definition file:-
    //      "xxx.app/yyy.dd.php"
    //
    // matches the structure in the stored MySQL table.  And if NOT,
    // updates the stored MySQL table as specified by:-
    //      $this_dataset_update_method
    //
    // ---
    //
    // $this_dataset_update_method is "auto" or "manual".
    //
    // RETURNS
    //      On SUCCESS
    //          TRUE  - If "auto" update required AND successfully
    //                  completed.
    //          --OR--
    //          FALSE - If "auto" update required BUT NOT done.
    //          --OR--
    //          NULL  - NO database updating is required (for this
    //                  dataset) - AND - "updaction_finished" was set
    //                  (for this dataset).
    //          --OR--
    //          array(
    //              $manual_approval_page_html__4_dataset    STRING     ,
    //              $distinct_value_summary_pages__4_dataset STRING     ,
    //              $record_listing_pages__4_dataset         STRING
    //              ) ARRAY
    //              NOTE!   All the above strings will be EMPTY, if the MySQL
    //                      table required NO ("auto" or "manual") updates.
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_GET , '$_GET' ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_POST , '$_POST' ) ;

    // =========================================================================
    // Init. #1
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $get_new_field_function_error_token = '[*GET*NEW_FIELD*FUNCTION*ERROR*]' ;

    // =========================================================================
    // Get the MySQL table name (for the dataset's MySQL table)...
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/basepress-mysql.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\
    // prepend_wordpress_table_name_prefix()
    //      $table_name
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Prepends the WordPress table prefix to the supplied table name, and
    // returns the result.
    //
    // NOTE!
    // =====
    // From:-
    //      http://codex.wordpress.org/Creating_Tables_with_Plugins
    //
    //    "DATABASE TABLE PREFIX
    //    =====================
    //    In the wp-config.php file, a WordPress site owner can define a
    //    database table prefix. By default, the prefix is "wp_", but you'll
    //    need to check on the actual value and use it to define your database
    //    table name. This value is found in the $wpdb->prefix variable. (If
    //    you're developing for a version of WordPress older than 2.0, you'll
    //    need to use the $table_prefix global variable, which is deprecated in
    //    version 2.1)."
    //
    // -------------------------------------------------------------------------

    $mysql_table_name =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\prepend_wordpress_table_name_prefix(
            $dataset_slug
            ) ;

    // =========================================================================
    // Create the dataset's MySQL table definition (from the dataset
    // definition)...
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/mysql-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\
    // get_corresponding_mysql_table_definition(
    //      $core_plugapp_dirs                              ,
    //      $question_front_end                             ,
    //      $selected_datasets_dmdd                         ,
    //      $dataset_slug                                   ,
    //      $mysql_table_name
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the definition of the MySQL table that corresponds to the
    // specified dataset (and it's array storage definition).
    //
    // The returned table definition will be like (eg):-
    //
    //      $corresponding_mysql_table_definition = Array(
    //          [columns] => Array(
    //              [0] => Array(
    //                          [Field]     => id
    //                          [Type]      => BIGINT(20) UNSIGNED
    //                          [Null]      => NO
    //                          [Key]       => PRI
    //                          [Default]   =>
    //                          [Extra]     => AUTO_INCREMENT
    //                          )   ,
    //              [1] => Array(
    //                          [Field]     => created_server_datetime
    //                          [Type]      => DATETIME
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   => 2014-12-16 08:52:39
    //                          [Extra]     =>
    //                          )   ,
    //              ...
    //              )
    //          [key_lengths_by_field_name] => Array(
    //              [name]  =>  16
    //              ...
    //          )
    //
    // RETURNS
    //      On SUCCESS
    //          ARRAY $corresponding_mysql_table_definition
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $corresponding_mysql_table_definition =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\get_corresponding_mysql_table_definition(
            $core_plugapp_dirs                              ,
            $question_front_end                             ,
            $selected_datasets_dmdd                         ,
            $dataset_slug                                   ,
            $mysql_table_name
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $corresponding_mysql_table_definition ) ) {
        return $corresponding_mysql_table_definition ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $corresponding_mysql_table_definition = Array(
    //
    //          [columns] => Array(
    //
    //              [0] => Array(
    //                          [Field]     => id
    //                          [Type]      => BIGINT(20) UNSIGNED
    //                          [Null]      => NO
    //                          [Key]       => PRI
    //                          [Default]   =>
    //                          [Extra]     => AUTO_INCREMENT
    //                          )
    //
    //              [1] => Array (
    //                          [Field]     => created_server_datetime
    //                          [Type]      => DATETIME
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   => "0000-00-00 00:00:00"
    //                          [Extra]     =>
    //                          )
    //
    //              [2] => Array(
    //                          [Field]     => last_modified_server_datetime
    //                          [Type]      => TIMESTAMP
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   => CURRENT_TIMESTAMP
    //                          [Extra]     => ON UPDATE CURRENT_TIMESTAMP
    //                          )
    //
    //              [3] => Array(
    //                          [Field]     => created_server_datetime_utc
    //                          [Type]      => INT(10) UNSIGNED
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   => 0
    //                          [Extra]     =>
    //                          )
    //
    //              [4] => Array(
    //                          [Field]     => last_modified_server_datetime_utc
    //                          [Type]      => INT(10) UNSIGNED
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   => 0
    //                          [Extra]     =>
    //                          )
    //
    //              [5] => Array(
    //                          [Field]     => this_field
    //                          [Type]      => TEXT
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   =>
    //                          [Extra]     =>
    //                          )
    //
    //              ...
    //
    //              [8] => Array(
    //                          [Field]     => boolean_field_one
    //                          [Type]      => TEXT
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   =>
    //                          [Extra]     =>
    //                          )
    //
    //              ...
    //
    //              )
    //
    //          [key_lengths_by_field_name] => Array()
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $corresponding_mysql_table_definition       ,
//    '$corresponding_mysql_table_definition'
//    ) ;

    // =========================================================================
    // Does the table exist ?
    //
    // If NOT, auto-create it...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\
    // table_exists(
    //      $table_name
    //      )
    // - - - - - - - - - - - - - - -
    // RETURNS TRUE or FALSE, depending on whether the table exists or not.
    //
    // NOTE!
    // -----
    // $table_name is an ABSOLUTE table name (as stored in the MySQL database)
    // - with the WordPress table prefix prepended if necessary.
    //
    // Call:-
    //
    //      table_exists(
    //          prepend_wordpress_table_name_prefix( $table_name )
    //          )
    //
    // if you want to supply the table name WITHOUT the WordPress table prefix
    // (and have that prefix automatically prepended for you).
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\
    // auto_create_mysql_table(
    //      $core_plugapp_dirs          ,
    //      $question_front_end         ,
    //      $dataset_slug               ,
    //      $mysql_table_name           ,
    //      $corresponding_mysql_table_definition
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    if (    ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\table_exists(
                $mysql_table_name
                )
        ) {

        // ---------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\auto_create_mysql_table(
                $core_plugapp_dirs                          ,
                $question_front_end                         ,
                $dataset_slug                               ,
                $mysql_table_name                           ,
                $corresponding_mysql_table_definition
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Get the existing MySQL table's definition...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\
    // get_existing_mysql_table_definition(
    //      $core_plugapp_dirs          ,
    //      $question_front_end         ,
    //      $mysql_table_name
    //      )
    // - - - - - - - - - - - - - - - - -
    // Returns the results of a SHOW COLUMNS query on the specified MySQL
    // Table...
    //
    // RETURNS
    //      On SUCCESS
    //          ARRAY $corresponding_mysql_table_definition
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    $existing_table_definition =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\get_existing_mysql_table_definition(
            $core_plugapp_dirs          ,
            $question_front_end         ,
            $mysql_table_name
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $existing_table_definition ) ) {
        return $existing_table_definition ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $existing_table_definition = Array(
    //
    //          [columns] => Array(
    //
    //              [0] => Array(
    //                          [Field]     => id
    //                          [Type]      => bigint(20) unsigned
    //                          [Null]      => NO
    //                          [Key]       => PRI
    //                          [Default]   =>
    //                          [Extra]     => auto_increment
    //                          )
    //
    //              [1] => Array(
    //                          [Field]     => created_server_datetime
    //                          [Type]      => datetime
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   => 0000-00-00 00:00:00
    //                          [Extra]     =>
    //                          )
    //
    //              [2] => Array(
    //                          [Field]     => last_modified_server_datetime
    //                          [Type]      => timestamp
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   => CURRENT_TIMESTAMP
    //                          [Extra]     => on update CURRENT_TIMESTAMP
    //                          )
    //
    //              [3] => Array(
    //                          [Field]     => created_server_datetime_utc
    //                          [Type]      => int(10) unsigned
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   => 0
    //                          [Extra]     =>
    //                          )
    //
    //              [4] => Array(
    //                          [Field]     => last_modified_server_datetime_utc
    //                          [Type]      => int(10) unsigned
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   => 0
    //                          [Extra]     =>
    //                          )
    //
    //              [5] => Array(
    //                          [Field]     => this_field
    //                          [Type]      => text
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   =>
    //                          [Extra]     =>
    //                          )
    //
    //              ...
    //
    //              [8] => Array(
    //                          [Field]     => boolean_field_one
    //                          [Type]      => text
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   =>
    //                          [Extra]     =>
    //                          )
    //
    //              ...
    //
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $existing_table_definition      ,
//    '$existing_table_definition'
//    ) ;

    // =========================================================================
    // Index the column definitions by field_slug...
    // =========================================================================

    $corresponding_column_definitions_by_field_slug = array() ;

    // -------------------------------------------------------------------------

    foreach ( $corresponding_mysql_table_definition['columns'] as $this_column ) {

        $corresponding_column_definitions_by_field_slug[ $this_column['Field'] ] =
            $this_column
            ;

    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $corresponding_column_definitions_by_field_slug = Array(
    //
    //          [id] => Array(
    //                      [Field]     => id
    //                      [Type]      => BIGINT(20) UNSIGNED
    //                      [Null]      => NO
    //                      [Key]       => PRI
    //                      [Default]   =>
    //                      [Extra]     => AUTO_INCREMENT
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $corresponding_column_definitions_by_field_slug     ,
//    '$corresponding_column_definitions_by_field_slug'
//    ) ;

    // -------------------------------------------------------------------------

    $existing_column_definitions_by_field_slug = array() ;

    // -------------------------------------------------------------------------

    foreach ( $existing_table_definition['columns'] as $this_column ) {

        $existing_column_definitions_by_field_slug[ $this_column['Field'] ] =
            $this_column
            ;

    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $existing_column_definitions_by_field_slug = Array(
    //
    //          [id] => Array(
    //                      [Field]     => id
    //                      [Type]      => bigint(20) unsigned
    //                      [Null]      => NO
    //                      [Key]       => PRI
    //                      [Default]   =>
    //                      [Extra]     => auto_increment
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $existing_column_definitions_by_field_slug     ,
//    '$existing_column_definitions_by_field_slug'
//    ) ;

    // =========================================================================
    // Support Routines..
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/update-xxx-stored-dataset-data-support.php' ) ;

    // =========================================================================
    // Get the fields/columns to ADD and UPDATE (if any)...
    // =========================================================================

    $fields_to_add_by_field_slug = array() ;

    // -------------------------------------------------------------------------

    $fields_to_update_by_field_slug = array() ;

    // -------------------------------------------------------------------------

    foreach ( $corresponding_column_definitions_by_field_slug as $required_field_slug => $required_field_definition ) {

        // ---------------------------------------------------------------------

        if (    array_key_exists(
                    $required_field_slug                            ,
                    $existing_column_definitions_by_field_slug
                    )
            ) {

            // -----------------------------------------------------------------

            if (    question_mysql_column_defs_different(
                        $required_field_definition                                              ,
                        $existing_column_definitions_by_field_slug[ $required_field_slug ]
                        )
                ) {

                // -------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $required_field_definition      ,
//    '$required_field_definition'
//    ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $existing_column_definitions_by_field_slug[ $required_field_slug ]      ,
//    '$existing_column_definitions_by_field_slug[ $required_field_slug ]'
//    ) ;

                // -------------------------------------------------------------

                $fields_to_update_by_field_slug[ $required_field_slug ] =
                    $required_field_definition
                    ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            $fields_to_add_by_field_slug[ $required_field_slug ] =
                $required_field_definition
                ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $fields_to_add_by_field_slug = Array(
    //
    //          [new_field_one] => Array(
    //                                  [Field] => new_field_one
    //                                  [Type] => TEXT
    //                                  [Null] => NO
    //                                  [Key] =>
    //                                  [Default] =>
    //                                  [Extra] =>
    //                                  )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $fields_to_add_by_field_slug        ,
//    '$fields_to_add_by_field_slug'
//    ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $fields_to_update_by_field_slug =
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $fields_to_update_by_field_slug     ,
//    '$fields_to_update_by_field_slug'
//    ) ;

    // =========================================================================
    // Get the fields to REMOVE (if any)...
    // =========================================================================

    $fields_to_remove_by_field_slug = array() ;

    // -------------------------------------------------------------------------

    foreach ( $existing_column_definitions_by_field_slug as $existing_field_slug => $existing_field_definition ) {

        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                    $existing_field_slug                            ,
                    $corresponding_column_definitions_by_field_slug
                    )
            ) {

            // -----------------------------------------------------------------

            $fields_to_remove_by_field_slug[ $existing_field_slug ] =
                $existing_field_definition
                ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $fields_to_remove_by_field_slug =
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $fields_to_remove_by_field_slug        ,
//    '$fields_to_remove_by_field_slug'
//    ) ;

    // =========================================================================
    // Init. #2
    // =========================================================================

    $safe_dataset_slug = htmlentities( $dataset_slug ) ;

    // -------------------------------------------------------------------------

    $nothing_to_do = array( '' , '' , '' ) ;

    // =========================================================================
    // Anything to do ?
    // =========================================================================

    if (    count( $fields_to_add_by_field_slug ) < 1
            &&
            count( $fields_to_update_by_field_slug ) < 1
            &&
            count( $fields_to_remove_by_field_slug ) < 1
        ) {

        // =====================================================================
        // Updaction Finished ?
        // =====================================================================

        if (    array_key_exists( 'updaction_finished' , $_GET )
                &&
                $_GET['updaction_finished'] === $dataset_slug
            ) {

            return NULL ;

        }

        // =====================================================================
        // That's that!
        // =====================================================================

        return $nothing_to_do ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Check that each field to be ADDED has a GET NEW FIELD VALUE function...
    // =========================================================================

    if ( count( $fields_to_add_by_field_slug ) > 0 ) {

        // ----------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $selected_datasets_dmdd = array(
        //
        //          ...
        //
        //          'get_new_field_value_functions'     =>  array(
        //              'show_ads_list_reload_buttons'  =>  array(
        //                  'name'  =>  '\\' . __NAMESPACE__ . '\\get_new_field_value_4_show_ads_list_reload_buttons'   ,
        //                  'args'  =>  array()
        //                  )   ,
        //              'question_manual_update_approval'  =>  array(
        //                  'name'  =>  '\\' . __NAMESPACE__ . '\\get_new_field_value_4_question_manual_update_approval'   ,
        //                  'args'  =>  array()
        //                  )
        //              )
        //
        //          ...
        //
        //          )
        //
        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                    'get_new_field_value_functions'     ,
                    $selected_datasets_dmdd
                    )
                ||
                ! is_array( $selected_datasets_dmdd['get_new_field_value_functions'] )
                ||
                count( $selected_datasets_dmdd['get_new_field_value_functions'] ) < 1
            ) {

            // -----------------------------------------------------------------

            $ln = __LINE__ - 8 ;

            $count = count( $fields_to_add_by_field_slug ) ;

            $field_slugs_to_add = '' ;

            foreach ( $fields_to_add_by_field_slug as $this_field_slug => $this_field_definition ) {

                $safe_field_slug = htmlentities( $this_field_slug ) ;

                $field_slugs_to_add .= <<<EOT
<li style="margin-top:0; margin-bottom:0; padding-left:0.33em; font-weight:bold; color:#003399">{$safe_field_slug}</li>
EOT;

            }

            // -----------------------------------------------------------------

            $msg = <<<EOT
<br />

<div style="max-width:640px; color:#800000">

    <h1>Database Update</h1>

    <br />

    <p>PROBLEM:&nbsp; There are {$count} fields to ADD - but NO
    "get_new_field_value" functions defined.</p>

    <p style="margin-bottom:0">The fields - of dataset/table <b
    style="color:#003399; font-size:124%">{$safe_dataset_slug}</b> - that need
    "get_new_field_value" functions - are:-</p>

    <ul style="list-style-type:disc; margin-left:2em">{$field_slugs_to_add}</ul>

    <p>Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}</p>

</div>
EOT;

            // -----------------------------------------------------------------

            $msg = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_one_line(
                        $msg
                        ) ;

            // -----------------------------------------------------------------

            return $get_new_field_function_error_token . $msg ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        $get_new_field_value_function_errors = '' ;

        // ---------------------------------------------------------------------

        $tdh_style = <<<EOT
padding:4px 12px
EOT;

        // ---------------------------------------------------------------------

        $tdh_name_style = <<<EOT
padding:4px 12px; color:#003399; font-weight:bold
EOT;

        // ---------------------------------------------------------------------

        foreach ( $fields_to_add_by_field_slug as $this_field_slug => $this_field_definition ) {

            // -----------------------------------------------------------------

            if (    ! array_key_exists(
                        $this_field_slug                                            ,
                        $selected_datasets_dmdd['get_new_field_value_functions']
                        )
                ) {

                // -------------------------------------------------------------

                $get_new_field_value_function_errors .= <<<EOT
<tr>
    <td style="{$tdh_name_style}">{$this_field_slug}</td>
    <td style="{$tdh_style}">NO "get_new_field_value" function defined</td>
</tr>
EOT;

                // -------------------------------------------------------------

                continue ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            if ( ! is_array( $selected_datasets_dmdd['get_new_field_value_functions'][ $this_field_slug ] ) ) {

                // -------------------------------------------------------------

                $get_new_field_value_function_errors .= <<<EOT
<tr>
    <td style="{$tdh_name_style}">{$this_field_slug}</td>
    <td style="{$tdh_style}">Bad "get_new_field_value" function definition (array expected)</td>
</tr>
EOT;

                // -------------------------------------------------------------

                continue ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            if (    ! array_key_exists(
                        'name'                                                                          ,
                        $selected_datasets_dmdd['get_new_field_value_functions'][ $this_field_slug ]
                        )
                ) {

                // -------------------------------------------------------------

                $get_new_field_value_function_errors .= <<<EOT
<tr>
    <td style="{$tdh_name_style}">{$this_field_slug}</td>
    <td style="{$tdh_style}">Bad "get_new_field_value" function definition (no function "name")</td>
</tr>
EOT;

                // -------------------------------------------------------------

                continue ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            $get_new_field_value_function_name =
                $selected_datasets_dmdd['get_new_field_value_functions'][ $this_field_slug ]['name']
                ;

            // -------------------------------------------------------------

            if (    ! is_string( $get_new_field_value_function_name )
                    ||
                    trim( $get_new_field_value_function_name ) === ''
                ) {

                // -------------------------------------------------------------

                $get_new_field_value_function_errors .= <<<EOT
<tr>
    <td style="{$tdh_name_style}">{$this_field_slug}</td>
    <td style="{$tdh_style}">Bad "get_new_field_value" function "name" (non-empty string expected)</td>
</tr>
EOT;

                // -------------------------------------------------------------

                continue ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            if ( ! function_exists( $get_new_field_value_function_name ) ) {

                // -------------------------------------------------------------

                $get_new_field_value_function_errors .= <<<EOT
<tr>
    <td style="{$tdh_name_style}">{$this_field_slug}</td>
    <td style="{$tdh_style}">Bad "get_new_field_value" function (function not found)</td>
</tr>
EOT;

                // -------------------------------------------------------------

                continue ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        if ( $get_new_field_value_function_errors !== '' ) {

            // -----------------------------------------------------------------

            $ln = __LINE__ - 4 ;

            // -----------------------------------------------------------------

            $msg = <<<EOT
<br />

<div style="max-width:640px; color:#800000">

    <h1>Database Update</h1>

    <br />

    <p>PROBLEM:&nbsp; One or more of the fields to add - to the <b
    style="color:#003399; font-size:124%">{$safe_dataset_slug}</b> table - have
    <b>NO or an invalid "get_new_field_value" function</b>.&nbsp; As
    follows:-</p>

    <div style="padding-left:2em"><table
        border="1"
        cellpadding="0"
        cellspacing="0"
        >
        <tr>
            <th style="{$tdh_style}">Field</th>
            <th style="{$tdh_style}">Problem/Error</th>
        </tr>
        {$get_new_field_value_function_errors}
    </table></div>

    <br />

    <p>Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}</p>

</div>
EOT;

            // -----------------------------------------------------------------

            $msg = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_one_line(
                        $msg
                        ) ;

            // -----------------------------------------------------------------

            return $get_new_field_function_error_token . $msg ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Load ALL the TABLE RECORDS...
    // =========================================================================

    // -------------------------------------------------------------------------
    // NOTES!
    // ======
    // 1.   We need these records to get the DISTINCT VALUES to be added,
    //      updated and removed.
    //
    // 2.   We need ALL fields of ALL records, because the "get new field
    //      value" functions - for the fields to be added - might potentially
    //      want to read any field value in the existing record - to determine
    //      the new field's value.
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\
    // get_zero_or_more_records(
    //      $sql
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // NOTES!
    // ======
    // 1.   The INPUT $sql should NOT be escaped.
    //
    // 2.   MySQL Data Types AREN'T PRESERVED!
    //      ----------------------------------
    //      In other words, something stored in the DB as a MySQL INT, WON'T
    //      necessarily be returned as a PHP INT.  It comes back as a STRING.
    //
    //      I haven't checked FLOATs and TIMESTAMPS, etc.  But I assume that
    //      the same applies to them.
    //
    //      Why this happens I'm not sure.  But presumably, since we access
    //      the database with the WordPress Wpdb class - it's that class's
    //      fault.
    //
    // RETURNS
    //      On SUCCESS
    //      - - - - -
    //      The 0+ records specified by the SQL string (as a PHP numeric
    //      array of records).  Eg:-
    //
    //          $records = array(
    //              0   =>  array(
    //                          'field_name_1'  =>  <field_value_1>     ,
    //                          'field_name_2'  =>  <field_value_2>     ,
    //                          ...                 ...
    //                          'field_name_N'  =>  <field_value_N>
    //                          )
    //              ...
    //              )
    //
    //      On FAILURE
    //      - - - - -
    //      An error message STRING.
    // -------------------------------------------------------------------------

    $sql = <<<EOT
SELECT *
FROM `{$mysql_table_name}`
EOT;

    // -------------------------------------------------------------------------

    $all_table_records =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\get_zero_or_more_records(
            $sql
            ) ;

    // ---------------------------------------------------------------------

    if ( is_string( $all_table_records ) ) {
        return $all_table_records ;
    }

    // =========================================================================
    // INDEX the TABLE RECORDS by ID...
    // =========================================================================

    $all_table_records_by_record_id = array() ;

    // -------------------------------------------------------------------------

    foreach ( $all_table_records as $this_record ) {

        $all_table_records_by_record_id[ $this_record['id'] ] = $this_record ;

    }

    // -------------------------------------------------------------------------

    unset( $all_table_records ) ;
        //  No longer required.  Retrieve the memory

    // =========================================================================
    // Get the DISTINCT VALUES to ADD...
    // =========================================================================

    $distinct_values_and_their_record_ids__by_field_slug__to_add = array() ;

    // -------------------------------------------------------------------------

    if ( count( $fields_to_add_by_field_slug ) > 0 ) {

        // ---------------------------------------------------------------------
        // Walk over the fields to add, in turn...
        // ---------------------------------------------------------------------

        foreach ( $fields_to_add_by_field_slug  as $this_field_slug => $this_field_definition ) {

            // -----------------------------------------------------------------
            // Get the "get new field value" function (and it's args, if any)...
            // -----------------------------------------------------------------

            $get_new_mysql_field_value_function_name =
                $selected_datasets_dmdd['get_new_field_value_functions'][ $this_field_slug ]['name']
                ;

            // -----------------------------------------------------------------

            if (    array_key_exists(
                        'args'                                                                          ,
                        $selected_datasets_dmdd['get_new_field_value_functions'][ $this_field_slug ]
                        )
                ) {

                $get_new_field_value_function_args =
                    $selected_datasets_dmdd['get_new_field_value_functions'][ $this_field_slug ]['args']
                    ;

            } else {

                $get_new_field_value_function_args = NULL ;

            }

            // -----------------------------------------------------------------

            $distinct_values_and_their_record_ids = array() ;

            // -----------------------------------------------------------------
            // Walk over the table records - collecting all the distinct values
            // to add...
            // -----------------------------------------------------------------

            foreach ( $all_table_records_by_record_id as $this_record_id => $this_record ) {

                // -------------------------------------------------------------------------
                // <mysql_get_new_field_value_function>(
                //      $core_plugapp_dirs                      ,
                //      $selected_datasets_dmdd                 ,
                //      $dataset_slug                           ,
                //      $field_slug_to_add                      ,
                //      $all_table_records_by_record_id         ,
                //      $this_record                            ,
                //      $get_new_field_value_function_args
                //      )
                // - - - - - - - - - - - - - - - - - - - - - - -
                // Returns the value for the specified field to be added to the
                // specified record.
                //
                // RETURNS
                //      On SUCCESS
                //          array(
                //              $ok = TRUE
                //              $new_field_value (any PHP type)
                //              )
                //
                //      On FAILURE
                //          array(
                //              $ok = FALSE
                //              $error_message STRING
                //              )
                // -------------------------------------------------------------------------

                $result =
                    $get_new_mysql_field_value_function_name(
                        $core_plugapp_dirs                      ,
                        $selected_datasets_dmdd                 ,
                        $dataset_slug                           ,
                        $this_field_slug                        ,
                        $all_table_records_by_record_id         ,
                        $this_record                            ,
                        $get_new_field_value_function_args
                        ) ;

                // ---------------------------------------------------------

                list(
                    $ok                 ,
                    $new_field_value
                    ) = $result ;

                // ---------------------------------------------------------

                if ( $ok === FALSE ) {
                    return $new_field_value ;
                }

                // -------------------------------------------------------------------------
                // get_list_index_4_value(
                //      $list           ,
                //      $target_value
                //      )
                // - - - - - - - - - - - -
                // Searches a list of records like:-
                //      array(
                //          array(
                //              'value'         =>  <any-PHP-type>
                //              'record_ids'    =>  array(...)
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

                $list_index =
                    get_list_index_4_value(
                        $distinct_values_and_their_record_ids   ,
                        $new_field_value
                        ) ;

                // ---------------------------------------------------------

                if ( is_int( $list_index ) ) {

                    $distinct_values_and_their_record_ids[ $list_index ]['record_ids'][] =
                        $this_record_id
                        ;

                } else {

                    $distinct_values_and_their_record_ids[] =
                        array(
                            'value'         =>  $new_field_value                ,
                            'record_ids'    =>  array( $this_record_id )
                            ) ;

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            $distinct_values_and_their_record_ids__by_field_slug__to_add[ $this_field_slug ] =
                $distinct_values_and_their_record_ids
                ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $distinct_values_and_their_record_ids__by_field_slug__to_add = Array(
    //
    //          [new_field_one] => Array(
    //
    //              [0] => Array(
    //                          [value]      => 17 Dec 2015 1:45:20 GMT
    //                          [record_ids] => Array(
    //                                              [0] => 1
    //                                              )
    //                          )
    //
    //              ...
    //
    //              )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $distinct_values_and_their_record_ids__by_field_slug__to_add      ,
//    '$distinct_values_and_their_record_ids__by_field_slug__to_add'
//    ) ;

//foreach ( $distinct_values_and_their_record_ids__by_field_slug__to_add as $this_slug => $distinct_values_and_their_record_ids ) {
//    foreach ( $distinct_values_and_their_record_ids as $this_record ) {
//        echo '<br />' ;
//        var_dump( $this_record['value'] ) ;
//    }
//}

    // =========================================================================
    // Get the DISTINCT VALUES to UPDATE...
    // =========================================================================

    $distinct_values_and_their_record_ids__by_field_slug__to_update = array() ;

    // -------------------------------------------------------------------------

    if ( count( $fields_to_update_by_field_slug ) > 0 ) {

        // ---------------------------------------------------------------------
        // Walk over the fields to update, in turn...
        // ---------------------------------------------------------------------

        foreach ( $fields_to_update_by_field_slug  as $this_field_slug => $this_field_definition ) {

            // -----------------------------------------------------------------
            // Walk over the table records - collecting the distinct value to
            // update...
            // -----------------------------------------------------------------

            $distinct_values_and_their_record_ids = array() ;

            // -----------------------------------------------------------------

            foreach ( $all_table_records_by_record_id as $this_record_id => $this_record ) {

                // -------------------------------------------------------------

                $this_field_value = $this_record[ $this_field_slug ] ;

                // -------------------------------------------------------------------------
                // get_list_index_4_value(
                //      $list           ,
                //      $target_value
                //      )
                // - - - - - - - - - - - -
                // Searches a list of records like:-
                //      array(
                //          array(
                //              'value'         =>  <any-PHP-type>
                //              'record_ids'    =>  array(...)
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

                $list_index =
                    get_list_index_4_value(
                        $distinct_values_and_their_record_ids   ,
                        $this_field_value
                        ) ;

                // ---------------------------------------------------------

                if ( is_int( $list_index ) ) {

                    $distinct_values_and_their_record_ids[ $list_index ]['record_ids'][] =
                        $this_record_id
                        ;

                } else {

                    $distinct_values_and_their_record_ids[] =
                        array(
                            'value'         =>  $this_field_value           ,
                            'record_ids'    =>  array( $this_record_id )
                            ) ;

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            $distinct_values_and_their_record_ids__by_field_slug__to_update[ $this_field_slug ] =
                $distinct_values_and_their_record_ids
                ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $distinct_values_and_their_record_ids__by_field_slug__to_update = Array(
    //
    //          [new_field_one] => Array(
    //
    //              [0] => Array(
    //                          [value]      => 17 Dec 2015 1:45:20 GMT
    //                          [record_ids] => Array(
    //                                              [0] => 1
    //                                              )
    //                          )
    //
    //              ...
    //
    //              )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $distinct_values_and_their_record_ids__by_field_slug__to_update      ,
//    '$distinct_values_and_their_record_ids__by_field_slug__to_update'
//    ) ;

//foreach ( $distinct_values_and_their_record_ids__by_field_slug__to_update as $this_slug => $distinct_values_and_their_record_ids ) {
//    foreach ( $distinct_values_and_their_record_ids as $this_record ) {
//        echo '<br />' ;
//        var_dump( $this_record['value'] ) ;
//    }
//}

    // =========================================================================
    // Get the DISTINCT VALUES to REMOVE...
    // =========================================================================

    $distinct_values_and_their_record_ids__by_field_slug__to_remove = array() ;

    // -------------------------------------------------------------------------

    if ( count( $fields_to_remove_by_field_slug ) > 0 ) {

        // ---------------------------------------------------------------------
        // Walk over the fields to remove, in turn...
        // ---------------------------------------------------------------------

        foreach ( $fields_to_remove_by_field_slug  as $this_field_slug => $this_field_definition ) {

            // -----------------------------------------------------------------
            // Walk over the table records - collecting the distinct value to
            // remove...
            // -----------------------------------------------------------------

            $distinct_values_and_their_record_ids = array() ;

            // -----------------------------------------------------------------

            foreach ( $all_table_records_by_record_id as $this_record_id => $this_record ) {

                // -------------------------------------------------------------

                $this_field_value = $this_record[ $this_field_slug ] ;

                // -------------------------------------------------------------------------
                // get_list_index_4_value(
                //      $list           ,
                //      $target_value
                //      )
                // - - - - - - - - - - - -
                // Searches a list of records like:-
                //      array(
                //          array(
                //              'value'         =>  <any-PHP-type>
                //              'record_ids'    =>  array(...)
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

                $list_index =
                    get_list_index_4_value(
                        $distinct_values_and_their_record_ids   ,
                        $this_field_value
                        ) ;

                // ---------------------------------------------------------

                if ( is_int( $list_index ) ) {

                    $distinct_values_and_their_record_ids[ $list_index ]['record_ids'][] =
                        $this_record_id
                        ;

                } else {

                    $distinct_values_and_their_record_ids[] =
                        array(
                            'value'         =>  $this_field_value           ,
                            'record_ids'    =>  array( $this_record_id )
                            ) ;

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            $distinct_values_and_their_record_ids__by_field_slug__to_remove[ $this_field_slug ] =
                $distinct_values_and_their_record_ids
                ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $distinct_values_and_their_record_ids__by_field_slug__to_remove = Array(
    //
    //          [new_field_one] => Array(
    //
    //              [0] => Array(
    //                          [value]      => 17 Dec 2015 1:45:20 GMT
    //                          [record_ids] => Array(
    //                                              [0] => 1
    //                                              )
    //                          )
    //
    //              ...
    //
    //              )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $distinct_values_and_their_record_ids__by_field_slug__to_remove      ,
//    '$distinct_values_and_their_record_ids__by_field_slug__to_remove'
//    ) ;

//foreach ( $distinct_values_and_their_record_ids__by_field_slug__to_remove as $this_slug => $distinct_values_and_their_record_ids ) {
//    foreach ( $distinct_values_and_their_record_ids as $this_record ) {
//        echo '<br />' ;
//        var_dump( $this_record['value'] ) ;
//    }
//}

    // =========================================================================
    // Do the requested MANUAL UPDATING (for the currently selected dataset)...
    // =========================================================================

    if (    $this_dataset_update_method === 'manual'
            &&
            array_key_exists( 'updaction' , $_GET )
            &&
            trim( $_GET['updaction'] ) !== ''
            &&
            ctype_xdigit( $_GET['updaction'] )
        ) {

        // ---------------------------------------------------------------------

        require_once( dirname( __FILE__ ) . '/update-and-save-mysql-stored-dataset-data.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // do_updaction_4_mysql_table(
        //      $core_plugapp_dirs                                                  ,
        //      $dataset_slug                                                       ,
        //      $selected_datasets_dmdd                                             ,
        //      $mysql_table_name                                                   ,
        //      $all_table_records_by_record_id                                     ,
        //      $fields_to_add_by_field_slug                                        ,
        //      $fields_to_update_by_field_slug                                     ,
        //      $fields_to_remove_by_field_slug                                     ,
        //      $distinct_values_and_their_record_ids__by_field_slug__to_add        ,
        //      $distinct_values_and_their_record_ids__by_field_slug__to_update     ,
        //      $distinct_values_and_their_record_ids__by_field_slug__to_remove
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Does the dataset updating requested by:-
        //      $_GET['updaction']
        //
        // Then saves the updated dataset back to array storage - and re-loads the
        // current page.
        //
        // RETURNS
        //      On SUCCESS
        //          FALSE   Means NO "updaction" was requested for this dataset.
        //                  So we should continue with the "auto" or "manual"
        //                  updating.
        //          NOTE!   If "updaction" WAS requested for this dataset - and
        //                  was completed successfully - then this routine
        //                  DOESN'T return.
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        $result = do_updaction_4_mysql_table(
                        $core_plugapp_dirs                                                  ,
                        $dataset_slug                                                       ,
                        $selected_datasets_dmdd                                             ,
                        $mysql_table_name                                                   ,
                        $all_table_records_by_record_id                                     ,
                        $fields_to_add_by_field_slug                                        ,
                        $fields_to_update_by_field_slug                                     ,
                        $fields_to_remove_by_field_slug                                     ,
                        $distinct_values_and_their_record_ids__by_field_slug__to_add        ,
                        $distinct_values_and_their_record_ids__by_field_slug__to_update     ,
                        $distinct_values_and_their_record_ids__by_field_slug__to_remove
                        ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------
        // Fall through to do this dataset's "auto" or "manual" updating...
        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Display the "MANUAL APPROVAL" page ?
    // =========================================================================

    if ( $this_dataset_update_method === 'manual' ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
        // get_manual_approval_page_html_4_mysql_table(
        //      $core_plugapp_dirs                                                  ,
        //      $selected_datasets_dmdd                                             ,
        //      $dataset_slug                                                       ,
        //      $all_table_records_by_record_id                                     ,
        //      $fields_to_add_by_field_slug                                        ,
        //      $fields_to_update_by_field_slug                                     ,
        //      $fields_to_remove_by_field_slug                                     ,
        //      $distinct_values_and_their_record_ids__by_field_slug__to_add        ,
        //      $distinct_values_and_their_record_ids__by_field_slug__to_update     ,
        //      $distinct_values_and_their_record_ids__by_field_slug__to_remove
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Creates and returns a page like (eg):-
        //
        //                          Database Update Required
        //                          Database Update Required
        //
        //                    Dataset: array_stored_test_dataset_one
        //
        //  2 fields to ADD - to 3 records - as follows:-
        //  ==============================================================================================
        //  Field Name      #Records To Add     #Distinct Values        #Records NOT To     Action
        //                  This Field To       To Add                  Add This Field To
        //  ==============  ==================  ======================  ==================  ==============
        //  new_field_one   All (3 records)     3 show distinct values  None                add this field
        //  new_field_two   All (3 records)     1 show distinct values  None                add this field
        //  ==============================================================================================
        //
        //                            ADD ALL The Above Fields
        //
        //  1 field to REMOVE - from 3 records - as follows:-
        //  ==============================================================================================
        //  Field Name      #Records To Remove  #Distinct Values        #Records NOT To             Action
        //                  This Field From     To Remove               Remove This Field From
        //  ==============  ==================  ======================  ==========================  ======
        //  new_field_three All (3 records)     1 show distinct values  None
        //  ==============================================================================================
        //
        //                              UPDATE ENTIRE DATASET
        //       (ADD ALL Fields To Be Added - Then REMOVE ALL Fields To Be Removed)
        //
        // RETURNS
        //      On SUCCESS
        //          array(
        //              $manual_approval_page_html__4_dataset    STRING     ,
        //              $distinct_value_summary_pages__4_dataset STRING     ,
        //              $record_listing_pages__4_dataset         STRING
        //              )
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        return get_manual_approval_page_html_4_mysql_table(
                    $core_plugapp_dirs                                                  ,
                    $selected_datasets_dmdd                                             ,
                    $dataset_slug                                                       ,
                    $all_table_records_by_record_id                                     ,
                    $fields_to_add_by_field_slug                                        ,
                    $fields_to_update_by_field_slug                                     ,
                    $fields_to_remove_by_field_slug                                     ,
                    $distinct_values_and_their_record_ids__by_field_slug__to_add        ,
                    $distinct_values_and_their_record_ids__by_field_slug__to_update     ,
                    $distinct_values_and_their_record_ids__by_field_slug__to_remove
                    ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // AUTO-UPDATE ?
    // =========================================================================

/*
    if ( $this_dataset_update_method === 'auto' ) {

        // ---------------------------------------------------------------------
        // Create the updated dataset...
        // ---------------------------------------------------------------------

        $new_dataset_records =
            $loaded_datasets[ $dataset_slug ]['records']
            ;

        // ---------------------------------------------------------------------
        // ADD ALL
        // ---------------------------------------------------------------------

        foreach (   $distinct_values_and_their_record_ids__by_field_slug__to_add
                    as
                    $this_field_slug => $these_distinct_values_and_record_indices
            ) {

            // -----------------------------------------------------------------

            foreach (   $these_distinct_values_and_record_indices
                        as
                        $this_distinct_value_and_its_record_indices
                ) {

                // -------------------------------------------------------------

                $this_distinct_value = $this_distinct_value_and_its_record_indices['value'] ;

                // -------------------------------------------------------------

                $these_record_indices = $this_distinct_value_and_its_record_indices['record_indices'] ;

                // -------------------------------------------------------------

                foreach ( $these_record_indices as $this_target_index ) {

                    // ---------------------------------------------------------

                    $new_dataset_records[ $this_target_index ][ $this_field_slug ] =
                        $this_distinct_value
                        ;

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // REMOVE ALL
        // ---------------------------------------------------------------------

        foreach (   $distinct_values_and_their_record_ids__by_field_slug__to_remove
                    as
                    $this_field_slug => $these_distinct_values_and_record_indices
            ) {

            // -----------------------------------------------------------------

            foreach (   $these_distinct_values_and_record_indices
                        as
                        $this_distinct_value_and_its_record_indices
                ) {

                // -------------------------------------------------------------

                foreach (   $this_distinct_value_and_its_record_indices['record_indices']
                            as
                            $this_target_index
                    ) {

                    // ---------------------------------------------------------

                    unset( $new_dataset_records[ $this_target_index ][ $this_field_slug ] ) ;

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Save the updated dataset...
        // ---------------------------------------------------------------------

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

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_arrayStorage\save_numerically_indexed(
                $dataset_slug           ,
                $new_dataset_records
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        return TRUE ;
            //  Update required and successfully completed!

        // ---------------------------------------------------------------------

    }
*/

    // =========================================================================
    // SUCCESS
    // =========================================================================

    return FALSE ;
        //  Update required but NOT done!

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// question_mysql_column_defs_different()
// =============================================================================

function question_mysql_column_defs_different(
    $this_field_definition      ,
    $that_field_definition
    ) {

    // --------------------------------------------------------------------------
    // question_mysql_column_defs_different(
    //      $this_field_definition      ,
    //      $that_field_definition
    //      )
    // - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //         TRUE or FALSE
    //
    //      On FAILURE
    //          $error_message STRING
    // --------------------------------------------------------------------------

    if ( count( $this_field_definition ) !== count( $that_field_definition ) ) {
        return TRUE ;
    }

    // --------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $this_field_definition / $that_field_definition = Array(
    //          [Field]     => id
    //          [Type]      => BIGINT(20) UNSIGNED
    //          [Null]      => NO
    //          [Key]       => PRI
    //          [Default]   =>
    //          [Extra]     => AUTO_INCREMENT
    //          )
    //
    // -------------------------------------------------------------------------

    $required_allowed_field_names = array(
        'Field'     ,
        'Type'      ,
        'Null'      ,
        'Key'       ,
        'Default'   ,
        'Extra'
        ) ;

    // -------------------------------------------------------------------------

    foreach ( $required_allowed_field_names as $this_field_name ) {

        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                        $this_field_name        ,
                        $this_field_definition
                        )
                ||
                ! array_key_exists(
                        $this_field_name        ,
                        $that_field_definition
                        )
            ) {
            return TRUE ;
        }

        // ---------------------------------------------------------------------
        // NOTE!
        // =====
        // The "created_server_datetime" field of a MySQL table has a string
        // Default value like:-
        //      0000-00-00 00:00:00
        //
        // But:-
        //      get_corresponding_mysql_table_definition()
        //
        // includes double quotes around the Default value.  Ie, we have:-
        //
        //      $this_field_definition = Array(
        //          [Field]     => created_server_datetime
        //          [Type]      => DATETIME
        //          [Null]      => NO
        //          [Key]       =>
        //          [Default]   => "0000-00-00 00:00:00"
        //          [Extra]     =>
        //          )
        //
        //      $that_field_definition = Array(
        //          [Field]     => created_server_datetime
        //          [Type]      => datetime
        //          [Null]      => NO
        //          [Key]       =>
        //          [Default]   => 0000-00-00 00:00:00
        //          [Extra]     =>
        //          )
        //
        // where it's $this_field_definition that's created by:-
        //      get_corresponding_mysql_table_definition()
        //
        // and $that_field_definition that's retrieved from the created
        // table.
        //
        // I'm not sure if that's a bug in:-
        //      get_corresponding_mysql_table_definition()
        //
        // or whether there's a reason for the surrounding double quotes.
        //
        // So, to prevent problems, we special case this field.
        // ---------------------------------------------------------------------

        if (    $this_field_name === 'Default'
                &&
                $this_field_definition['Field'] === 'created_server_datetime'
                &&
                $that_field_definition['Field'] === 'created_server_datetime'
            ) {

            $this_field_definition[ $this_field_name ] =
                trim( $this_field_definition[ $this_field_name ] , '"' )
                ;

        }

        // ---------------------------------------------------------------------

        if (    strtolower( $this_field_definition[ $this_field_name ] )
                !==
                strtolower( $that_field_definition[ $this_field_name ] )
            ) {
            return TRUE ;
        }

        // ---------------------------------------------------------------------

    }

    // --------------------------------------------------------------------------

    return FALSE ;

    // --------------------------------------------------------------------------

}

// =============================================================================
// get_manual_approval_page_html_4_mysql_table()
// =============================================================================

function get_manual_approval_page_html_4_mysql_table(
    $core_plugapp_dirs                                                  ,
    $selected_datasets_dmdd                                             ,
    $dataset_slug                                                       ,
    $all_table_records_by_record_id                                     ,
    $fields_to_add_by_field_slug                                        ,
    $fields_to_update_by_field_slug                                     ,
    $fields_to_remove_by_field_slug                                     ,
    $distinct_values_and_their_record_ids__by_field_slug__to_add        ,
    $distinct_values_and_their_record_ids__by_field_slug__to_update     ,
    $distinct_values_and_their_record_ids__by_field_slug__to_remove
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_manual_approval_page_html_4_mysql_table(
    //      $core_plugapp_dirs                                                  ,
    //      $selected_datasets_dmdd                                             ,
    //      $dataset_slug                                                       ,
    //      $all_table_records_by_record_id                                     ,
    //      $fields_to_add_by_field_slug                                        ,
    //      $fields_to_update_by_field_slug                                     ,
    //      $fields_to_remove_by_field_slug                                     ,
    //      $distinct_values_and_their_record_ids__by_field_slug__to_add        ,
    //      $distinct_values_and_their_record_ids__by_field_slug__to_update     ,
    //      $distinct_values_and_their_record_ids__by_field_slug__to_remove
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Creates and returns a page like (eg):-
    //
    //                          Database Update Required
    //                          Database Update Required
    //
    //                    Dataset: array_stored_test_dataset_one
    //
    //  2 fields to ADD - to 3 records - as follows:-
    //  ==============================================================================================
    //  Field Name      #Records To Add     #Distinct Values        #Records NOT To     Action
    //                  This Field To       To Add                  Add This Field To
    //  ==============  ==================  ======================  ==================  ==============
    //  new_field_one   All (3 records)     3 show distinct values  None                add this field
    //  new_field_two   All (3 records)     1 show distinct values  None                add this field
    //  ==============================================================================================
    //
    //                            ADD ALL The Above Fields
    //
    //  1 field to REMOVE - from 3 records - as follows:-
    //  ==============================================================================================
    //  Field Name      #Records To Remove  #Distinct Values        #Records NOT To             Action
    //                  This Field From     To Remove               Remove This Field From
    //  ==============  ==================  ======================  ==========================  ======
    //  new_field_three All (3 records)     1 show distinct values  None
    //  ==============================================================================================
    //
    //                              UPDATE ENTIRE DATASET
    //       (ADD ALL Fields To Be Added - Then REMOVE ALL Fields To Be Removed)
    //
    // RETURNS
    //      On SUCCESS
    //          array(
    //              $manual_approval_page_html__4_dataset    STRING     ,
    //              $distinct_value_summary_pages__4_dataset STRING     ,
    //              $record_listing_pages__4_dataset         STRING
    //              )
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $fields_to_add_by_field_slug = Array(
    //
    //          [new_field_one] => Array(
    //                                  [Field] => new_field_one
    //                                  [Type] => TEXT
    //                                  [Null] => NO
    //                                  [Key] =>
    //                                  [Default] =>
    //                                  [Extra] =>
    //                                  )
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $fields_to_add_by_field_slug        ,
//    '$fields_to_add_by_field_slug'
//    ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $fields_to_update_by_field_slug =
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $fields_to_update_by_field_slug     ,
//    '$fields_to_update_by_field_slug'
//    ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $fields_to_remove_by_field_slug =
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $fields_to_remove_by_field_slug        ,
//    '$fields_to_remove_by_field_slug'
//    ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $distinct_values_and_their_record_ids__by_field_slug__to_add = Array(
    //
    //          [new_field_one] => Array(
    //
    //              [0] => Array(
    //                          [value]      => 17 Dec 2015 1:45:20 GMT
    //                          [record_ids] => Array(
    //                                              [0] => 1
    //                                              )
    //                          )
    //
    //              ...
    //
    //              )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $distinct_values_and_their_record_ids__by_field_slug__to_add        ,
//    '$distinct_values_and_their_record_ids__by_field_slug__to_add'
//    ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $distinct_values_and_their_record_ids__by_field_slug__to_update =
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $distinct_values_and_their_record_ids__by_field_slug__to_update     ,
//    '$distinct_values_and_their_record_ids__by_field_slug__to_update'
//    ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $distinct_values_and_their_record_ids__by_field_slug__to_remove =
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $distinct_values_and_their_record_ids__by_field_slug__to_remove     ,
//    '$distinct_values_and_their_record_ids__by_field_slug__to_remove'
//    ) ;

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__ ;

    // -------------------------------------------------------------------------

    $total_records =
        count( $all_table_records_by_record_id )
        ;

    // -------------------------------------------------------------------------

    $intro_style = <<<EOT
margin-bottom:0.33em; font-size:133%; font-style:italic
EOT;

    // -------------------------------------------------------------------------

    $tdh_style = <<<EOT
padding:3px 10px
EOT;

    // -------------------------------------------------------------------------

    $distinct_value_summary_pages__4_dataset = '' ;

    // -------------------------------------------------------------------------

    $record_listing_pages__4_dataset = '' ;

    // =========================================================================
    // ADD...
    // =========================================================================

    // -------------------------------------------------------------------------
    // We're creating the ADD table - eg:-
    //
    //      2 fields to ADD - to 3 records - as follows:-
    //      ==============================================================================================
    //      Field Name      #Records To Add     #Distinct Values        #Records NOT To     Action
    //                      This Field To       To Add                  Add This Field To
    //      ==============  ==================  ======================  ==================  ==============
    //      new_field_one   All (3 records)     3 show distinct values  None                add this field
    //      new_field_two   All (3 records)     1 show distinct values  None                add this field
    //      ==============================================================================================
    //
    //                                           ADD ALL The Above Fields
    //
    // -------------------------------------------------------------------------

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

    list(
        $light_green_bg     ,
        $dark_green_bg      ,
        $green_text
        ) = get_green_colours() ;

    // -------------------------------------------------------------------------
    // Table Rows...
    // -------------------------------------------------------------------------

    $fields_to_add_html = '' ;

    // -------------------------------------------------------------------------

    $add_update_remove = 'add' ;

    // -------------------------------------------------------------------------

    foreach (   $distinct_values_and_their_record_ids__by_field_slug__to_add
                as
                $this_field_slug => $distinct_values_and_their_record_ids
        ) {

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $distinct_values_and_their_record_ids = Array(
        //
        //          [0] => Array(
        //                      [value]      => 17 Dec 2015 1:45:20 GMT
        //                      [record_ids] => Array(
        //                                          [0] => 1
        //                                          )
        //                      )
        //
        //          ...
        //
        //          )
        //
        // ---------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $distinct_values_and_their_record_ids       ,
//    '$distinct_values_and_their_record_ids'
//    ) ;

        // =====================================================================
        // Get the $record_ids_to_add_this_field_to...
        // =====================================================================

        $record_ids_to_add_this_field_to = array() ;

        // ---------------------------------------------------------------------

        foreach (   $distinct_values_and_their_record_ids
                    as
                    $this_index => $this_distinct_value_and_its_record_ids
            ) {

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_distinct_value_and_its_record_ids = Array(
            //          [value]      => 17 Dec 2015 1:45:20 GMT
            //          [record_ids] => Array(
            //                              [0] => 1
            //                              )
            //          )
            //
            // -----------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $this_distinct_value_and_its_record_ids       ,
//    '$this_distinct_value_and_its_record_ids'
//    ) ;

            // -----------------------------------------------------------------

            $record_ids_to_add_this_field_to = array_merge(
                $record_ids_to_add_this_field_to                        ,
                $this_distinct_value_and_its_record_ids['record_ids']
                ) ;

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // Get the "show_distinct_values" DIV ID...
        // =====================================================================

        $id = <<<EOT
distinct-values-to-add-summary-4-{$dataset_slug}-{$this_field_slug}
EOT;

        // =====================================================================
        // Get:-
        //      $number_records_to_add_this_field_to__pretty
        // =====================================================================

        $number_records_to_add_this_field_to = count( $record_ids_to_add_this_field_to ) ;

        // ---------------------------------------------------------------------

        $number_records_to_add_this_field_to__pretty =
            get_number_records__pretty(
                $number_records_to_add_this_field_to    ,
                $total_records
                ) ;

        // =====================================================================
        // Get:-
        //      $number_records_NOT_to_add_this_field_to__pretty
        // =====================================================================

        $number_records_NOT_to_add_this_field_to =
            $total_records - $number_records_to_add_this_field_to
            ;

        // ---------------------------------------------------------------------

        $number_records_NOT_to_add_this_field_to__pretty =
            get_number_records__pretty(
                $number_records_NOT_to_add_this_field_to    ,
                $total_records
                ) ;

        // =====================================================================
        // Get:-
        //      $number_distinct_values__pretty
        // =====================================================================

//      if (    array_key_exists(
//                  $this_field_slug                                                          ,
//                  $distinct_values_and_their_record_ids__by_field_slug__to_add
//                  )
//          ) {

            // -----------------------------------------------------------------

            $number_distinct_values =
                count( $distinct_values_and_their_record_ids )
                ;

            // -----------------------------------------------------------------

            $number_distinct_values__pretty = (string) $number_distinct_values ;

            // -----------------------------------------------------------------

//      } else {
//
//          // -----------------------------------------------------------------
//
//          $number_distinct_values__pretty = '1' ;
//
//          // -----------------------------------------------------------------
//
//      }

        // ---------------------------------------------------------------------

        $number_distinct_values__pretty .= <<<EOT
 &nbsp; <a href="javascript:show_distinct_values('{$id}')">show&nbsp;distinct&nbsp;values</a>
EOT;

        // =====================================================================
        // Add the field slug row...
        // =====================================================================

        // -------------------------------------------------------------------------
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
        //                  'field'     =>  $this_field_slug          ,
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

        $url = get_updaction_url(
                    $core_plugapp_dirs      ,
                    array(
                        'dataset'   =>  $dataset_slug       ,
                        'field'     =>  $this_field_slug    ,
                        'action'    =>  'add-this-field'
                        )
                    ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $url ) ) {
            return $url[0] ;
        }

        // ---------------------------------------------------------------------

        $action = <<<EOT
<a href="javascript:void()" onclick="question_add_this_field(this,'{$this_field_slug}','{$url}')">add&nbsp;this&nbsp;field</a>
EOT;

        // ---------------------------------------------------------------------

        $fields_to_add_html .= <<<EOT
<tr>
    <td style="{$tdh_style}; font-size:106%; font-weight:bold; color:{$green_text}">{$this_field_slug}</td>
    <td style="{$tdh_style}">{$number_records_to_add_this_field_to__pretty}</td>
    <td style="{$tdh_style}">{$number_distinct_values__pretty}</td>
    <td style="{$tdh_style}">{$number_records_NOT_to_add_this_field_to__pretty}</td>
    <td style="{$tdh_style}">{$action}</td>
</tr>
EOT;

        // =====================================================================
        // Get the distinct values (for this field slug)...
        // =====================================================================

        // -------------------------------------------------------------------------
        // get_distinct_values_for_field__summary_and_record_listing_pages__mysql(
        //      $core_plugapp_dirs                          ,
        //      $all_table_records_by_record_id             ,
        //      $dataset_slug                               ,
        //      $field_slug                                 ,
        //      $distinct_values_and_their_record_ids       ,
        //      $add_update_remove
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      array(
        //          $distinct_values_summary_pages__4_field STRING
        //          $record_listing_pages__4_field          STRING
        //          )
        // -------------------------------------------------------------------------

        list(
            $distinct_values_summary_pages__4_field     ,
            $record_listing_pages__4_field
            ) =
            get_distinct_values_for_field__summary_and_record_listing_pages__mysql(
                $core_plugapp_dirs                          ,
                $all_table_records_by_record_id             ,
                $dataset_slug                               ,
                $this_field_slug                            ,
                $distinct_values_and_their_record_ids       ,
                $add_update_remove
                ) ;

        // ---------------------------------------------------------------------

        $distinct_value_summary_pages__4_dataset .= <<<EOT
<div id="{$id}" style="display:none">{$distinct_values_summary_pages__4_field}</div>
EOT;

        // ---------------------------------------------------------------------

        $record_listing_pages__4_dataset .=
            $record_listing_pages__4_field
            ;

        // =====================================================================
        // Repeat with the next field slug (if there is one)...
        // =====================================================================

    }

    // -------------------------------------------------------------------------
    // Table Proper
    // -------------------------------------------------------------------------

    $add_table_style = <<<EOT
background-color:{$light_green_bg}
EOT;

    // -------------------------------------------------------------------------

    $number_fields_to_add = count( $fields_to_add_by_field_slug ) ;

    // -------------------------------------------------------------------------

    if ( $number_fields_to_add === 1 ) {
        $fs = '' ;

    } else {
        $fs = 's' ;

    }

    // -------------------------------------------------------------------------

    if ( $total_records === 1 ) {
        $rs = '' ;

    } else {
        $rs = 's' ;

    }

    // -------------------------------------------------------------------------
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
    //                  'field'     =>  $this_field_slug          ,
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

    $url = get_updaction_url(
                $core_plugapp_dirs      ,
                array(
                    'dataset'   =>  $dataset_slug               ,
                    'field'     =>  NULL                        ,
                    'action'    =>  'add-all-dataset-fields'
                    )
                ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $url ) ) {
        return $url[0] ;
    }

    // -------------------------------------------------------------------------

    if ( $fields_to_add_html !== '' ) {

        // ---------------------------------------------------------------------

        $fields_to_add_html = <<<EOT
<p style="{$intro_style}"><b>{$number_fields_to_add}</b> field{$fs} to
<b>ADD</b> - to <b>{$total_records}</b> record{$rs} - as follows:-</p>

<div><table
    border="1"
    cellpadding="0"
    cellspacing="0"
    style="{$add_table_style}"
    align="center"
    >
    <tr>
        <th style="{$tdh_style}; background-color:{$dark_green_bg}; color:{$green_text}">Field Name</th>
        <th style="{$tdh_style}; background-color:{$dark_green_bg}; color:{$green_text}">#Records To Add This Field To</th>
        <th style="{$tdh_style}; background-color:{$dark_green_bg}; color:{$green_text}">#Distinct Values To Add</th>
        <th style="{$tdh_style}; background-color:{$dark_green_bg}; color:{$green_text}">#Records NOT To Add This Field To</th>
        <th style="{$tdh_style}; background-color:{$dark_green_bg}; color:{$green_text}">Action</th>
    </tr>
{$fields_to_add_html}
</table></div>

<p style="margin-top:0.5em"><a
    href="javascript:void()"
    onclick="question_add_all_dataset_fields(this,'{$dataset_slug}','{$url}')"
    >ADD ALL The Above Fields</a></p>
EOT;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // UPDATE
    // =========================================================================

    // -------------------------------------------------------------------------
    // We're creating the UPDATE table - eg:-
    //
    //      1 field to UPDATE - in 3 records - as follows:-
    //      ====================================================================================================
    //      Field Name       #Records To Update  #Distinct Values        #Records NOT To       Action
    //                       This Field In       To (Possibly) Change    Update This Field In
    //      ===============  ==================  ======================  ====================  =================
    //      new_field_three  All (3 records)     1 show distinct values  None                  update this field
    //      ====================================================================================================
    //
    //                                  UPDATE ALL The Above Fields
    //
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // get_blue_colours()
    // - - - - - - - - -
    // RETURNS
    //      list(
    //          $light_blue_bg      ,
    //          $dark_blue_bg       ,
    //          $blue_text
    //          )
    // -------------------------------------------------------------------------

    list(
        $light_blue_bg       ,
        $dark_blue_bg        ,
        $blue_text
        ) = get_blue_colours() ;

    // -------------------------------------------------------------------------

    $add_update_remove = 'update' ;

    // -------------------------------------------------------------------------
    // Rows...
    // -------------------------------------------------------------------------

    $fields_to_update_html = '' ;

    // -------------------------------------------------------------------------

    foreach (   $distinct_values_and_their_record_ids__by_field_slug__to_update
                as
                $this_field_slug => $distinct_values_and_their_record_ids
        ) {

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $distinct_values_and_their_record_ids = Array(
        //
        //          [0] => Array(
        //                      [value]      => 17 Dec 2015 1:45:20 GMT
        //                      [record_ids] => Array(
        //                                          [0] => 1
        //                                          )
        //                      )
        //
        //          ...
        //
        //          )
        //
        // ---------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $distinct_values_and_their_record_ids       ,
//    '$distinct_values_and_their_record_ids'
//    ) ;

        // =====================================================================
        // Get the $record_ids_to_update_this_field_in...
        // =====================================================================

        $record_ids_to_update_this_field_in = array() ;

        // ---------------------------------------------------------------------

        foreach (   $distinct_values_and_their_record_ids
                    as
                    $this_index => $this_distinct_value_and_its_record_ids
            ) {

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_distinct_value_and_its_record_ids = Array(
            //          [value]      => 17 Dec 2015 1:45:20 GMT
            //          [record_ids] => Array(
            //                              [0] => 1
            //                              )
            //          )
            //
            // -----------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $this_distinct_value_and_its_record_ids       ,
//    '$this_distinct_value_and_its_record_ids'
//    ) ;

            // -----------------------------------------------------------------

            $record_ids_to_update_this_field_in = array_merge(
                $record_ids_to_update_this_field_in                         ,
                $this_distinct_value_and_its_record_ids['record_ids']
                ) ;

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // Get the "show_distinct_values" DIV ID...
        // =====================================================================

        $id = <<<EOT
distinct-values-to-update-summary-4-{$dataset_slug}-{$this_field_slug}
EOT;

        // =====================================================================
        // Get:-
        //      $number_records_to_update_this_field_in__pretty
        // =====================================================================

        $number_records_to_update_this_field_in =
            count( $record_ids_to_update_this_field_in )
            ;

        // ---------------------------------------------------------------------

        $number_records_to_update_this_field_in__pretty =
            get_number_records__pretty(
                $number_records_to_update_this_field_in     ,
                $total_records
                ) ;

        // =====================================================================
        // Get:-
        //      $number_records_NOT_to_update_this_field_in__pretty
        // =====================================================================

        $number_records_NOT_to_update_this_field_in =
            $total_records - $number_records_to_update_this_field_in
            ;

        // ---------------------------------------------------------------------

        $number_records_NOT_to_update_this_field_in__pretty =
            get_number_records__pretty(
                $number_records_NOT_to_update_this_field_in     ,
                $total_records
                ) ;

        // =====================================================================
        // Get:-
        //      $number_distinct_values__pretty
        // =====================================================================

//      if (    array_key_exists(
//                  $this_field_slug                                                              ,
//                  $distinct_values_and_their_record_ids__by_field_slug__to_update
//                  )
//          ) {

            // -----------------------------------------------------------------

            $number_distinct_values =
                count( $distinct_values_and_their_record_ids )
                ;

            // -----------------------------------------------------------------

            $number_distinct_values__pretty = (string) $number_distinct_values ;

            // -----------------------------------------------------------------

//      } else {
//
//          // -----------------------------------------------------------------
//
//          $number_distinct_values__pretty = '1' ;
//
//          // -----------------------------------------------------------------
//
//      }

        // ---------------------------------------------------------------------

        $number_distinct_values__pretty .= <<<EOT
 &nbsp; <a href="javascript:show_distinct_values('{$id}')">show&nbsp;distinct&nbsp;values</a>
EOT;

        // =====================================================================
        // Action
        // =====================================================================

        if ( count( $fields_to_add_by_field_slug ) < 1 ) {

            // -------------------------------------------------------------------------
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
            //                  'field'     =>  $this_field_slug          ,
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

            $url = get_updaction_url(
                        $core_plugapp_dirs      ,
                        array(
                            'dataset'   =>  $dataset_slug           ,
                            'field'     =>  $this_field_slug        ,
                            'action'    =>  'update-this-field'
                            )
                        ) ;

            // -----------------------------------------------------------------

            if ( is_array( $url ) ) {
                return $url[0] ;
            }

            // -----------------------------------------------------------------

            $action = <<<EOT
<a  href="javascript:void()"
    onclick="question_update_this_field(this,'{$this_field_slug}','{$url}')"
    >update&nbsp;this&nbsp;field</a>
EOT;
                //  Can only update fields if there are NO fields to ADD.
                //
                //  This is because the "get New field value" routines may want
                //  to look at the value of fields being updated - as when
                //  updating a field value, for example).

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            $action = '&nbsp;' ;

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // Field Slug Row...
        // =====================================================================

        $fields_to_update_html .= <<<EOT
<tr>
    <td style="{$tdh_style}; font-size:106%; font-weight:bold; color:{$blue_text}">{$this_field_slug}</td>
    <td style="{$tdh_style}">{$number_records_to_update_this_field_in__pretty}</td>
    <td style="{$tdh_style}">{$number_distinct_values__pretty}</td>
    <td style="{$tdh_style}">{$number_records_NOT_to_update_this_field_in__pretty}</td>
    <td style="{$tdh_style}">{$action}</td>
</tr>
EOT;

        // =====================================================================
        // Get the distinct values (for this field slug)...
        // =====================================================================

        // -------------------------------------------------------------------------
        // get_distinct_values_for_field__summary_and_record_listing_pages__mysql(
        //      $core_plugapp_dirs                          ,
        //      $all_table_records_by_record_id             ,
        //      $dataset_slug                               ,
        //      $field_slug                                 ,
        //      $distinct_values_and_their_record_ids       ,
        //      $add_update_remove
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      array(
        //          $distinct_values_summary_pages__4_field STRING
        //          $record_listing_pages__4_field          STRING
        //          )
        // -------------------------------------------------------------------------

        list(
            $distinct_values_summary_pages__4_field     ,
            $record_listing_pages__4_field
            ) =
            get_distinct_values_for_field__summary_and_record_listing_pages__mysql(
                $core_plugapp_dirs                          ,
                $all_table_records_by_record_id             ,
                $dataset_slug                               ,
                $this_field_slug                            ,
                $distinct_values_and_their_record_ids       ,
                $add_update_remove
                ) ;

        // ---------------------------------------------------------------------

        $distinct_value_summary_pages__4_dataset .= <<<EOT
<div id="{$id}" style="display:none">{$distinct_values_summary_pages__4_field}</div>
EOT;

        // ---------------------------------------------------------------------

        $record_listing_pages__4_dataset .=
            $record_listing_pages__4_field
            ;

        // =====================================================================
        // Repeat with the next field slug (if there is one)...
        // =====================================================================

    }

    // -------------------------------------------------------------------------
    // Table Proper
    // -------------------------------------------------------------------------

    $update_table_style = <<<EOT
background-color:{$light_blue_bg}
EOT;

    // -------------------------------------------------------------------------

    $number_fields_to_update = count( $fields_to_update_by_field_slug ) ;

    // -------------------------------------------------------------------------

    if ( $number_fields_to_update === 1 ) {
        $fs = '' ;

    } else {
        $fs = 's' ;

    }

    // -------------------------------------------------------------------------

    if ( $total_records === 1 ) {
        $rs = '' ;

    } else {
        $rs = 's' ;

    }

    // -------------------------------------------------------------------------

    if ( count( $fields_to_add_by_field_slug ) < 1 ) {

        // -------------------------------------------------------------------------
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
        //                  'field'     =>  $this_field_slug          ,
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

        $url = get_updaction_url(
                    $core_plugapp_dirs      ,
                    array(
                        'dataset'   =>  $dataset_slug                   ,
                        'field'     =>  NULL                            ,
                        'action'    =>  'update-all-dataset-fields'
                        )
                    ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $url ) ) {
            return $url[0] ;
        }

        // ---------------------------------------------------------------------

        $update_all = <<<EOT
<p  style="margin-top:0.5em"><a
    href="javascript:void()"
    onclick="question_update_all_dataset_fields(this,'{$dataset_slug}','{$url}')"
    >UPDATE ALL The Above Fields</a></p>
EOT;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $update_all = '' ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( $fields_to_update_html !== '' ) {

        // ---------------------------------------------------------------------

        $fields_to_update_html = <<<EOT
<p style="{$intro_style}"><b>{$number_fields_to_update}</b> field{$fs} to
<b>UPDATE</b> - in <b>{$total_records}</b> record{$rs} - as follows:-</p>

<div><table
    border="1"
    cellpadding="0"
    cellspacing="0"
    style="{$update_table_style}"
    align="center"
    >
    <tr>
        <th style="{$tdh_style}; background-color:{$dark_blue_bg}; color:{$blue_text}">Field Name</th>
        <th style="{$tdh_style}; background-color:{$dark_blue_bg}; color:{$blue_text}">#Records To Update This Field In</th>
        <th style="{$tdh_style}; background-color:{$dark_blue_bg}; color:{$blue_text}">#Distinct Values To (Possibly) Update</th>
        <th style="{$tdh_style}; background-color:{$dark_blue_bg}; color:{$blue_text}">#Records NOT To Update This Field In</th>
        <th style="{$tdh_style}; background-color:{$dark_blue_bg}; color:{$blue_text}">Action</th>
    </tr>
{$fields_to_update_html}
</table></div>

{$update_all}
EOT;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // REMOVE
    // =========================================================================

    // -------------------------------------------------------------------------
    // We're creating the REMOVE table - eg:-
    //
    //      1 field to REMOVE - from 3 records - as follows:-
    //      =========================================================================================================
    //      Field Name      #Records To Remove  #Distinct Values        #Records NOT To             Action
    //                      This Field From     To Remove               Remove This Field From
    //      ==============  ==================  ======================  ==========================  =================
    //      new_field_three All (3 records)     1 show distinct values  None                        remove this field
    //      =========================================================================================================
    //
    //                                  REMOVE ALL The Above Fields
    //
    // -------------------------------------------------------------------------

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

    list(
        $light_red_bg       ,
        $dark_red_bg        ,
        $red_text
        ) = get_red_colours() ;

    // -------------------------------------------------------------------------

    $add_update_remove = 'remove' ;

    // -------------------------------------------------------------------------
    // Rows...
    // -------------------------------------------------------------------------

    $fields_to_remove_html = '' ;

    // -------------------------------------------------------------------------

    foreach (   $distinct_values_and_their_record_ids__by_field_slug__to_remove
                as
                $this_field_slug => $distinct_values_and_their_record_ids
        ) {

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $distinct_values_and_their_record_ids = Array(
        //
        //          [0] => Array(
        //                      [value]      => 17 Dec 2015 1:45:20 GMT
        //                      [record_ids] => Array(
        //                                          [0] => 1
        //                                          )
        //                      )
        //
        //          ...
        //
        //          )
        //
        // ---------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $distinct_values_and_their_record_ids       ,
//    '$distinct_values_and_their_record_ids'
//    ) ;

        // =====================================================================
        // Get the $record_ids_to_remove_this_field_from...
        // =====================================================================

        $record_ids_to_remove_this_field_from = array() ;

        // ---------------------------------------------------------------------

        foreach (   $distinct_values_and_their_record_ids
                    as
                    $this_index => $this_distinct_value_and_its_record_ids
            ) {

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $this_distinct_value_and_its_record_ids = Array(
            //          [value]      => 17 Dec 2015 1:45:20 GMT
            //          [record_ids] => Array(
            //                              [0] => 1
            //                              )
            //          )
            //
            // -----------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $this_distinct_value_and_its_record_ids       ,
//    '$this_distinct_value_and_its_record_ids'
//    ) ;

            // -----------------------------------------------------------------

            $record_ids_to_remove_this_field_from = array_merge(
                $record_ids_to_remove_this_field_from                   ,
                $this_distinct_value_and_its_record_ids['record_ids']
                ) ;

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // Get the "show_distinct_values" DIV ID...
        // =====================================================================

        $id = <<<EOT
distinct-values-to-remove-summary-4-{$dataset_slug}-{$this_field_slug}
EOT;

        // =====================================================================
        // Get:-
        //      $number_records_to_remove_this_field_from__pretty
        // =====================================================================

        $number_records_to_remove_this_field_from =
            count( $record_ids_to_remove_this_field_from )
            ;

        // ---------------------------------------------------------------------

        $number_records_to_remove_this_field_from__pretty =
            get_number_records__pretty(
                $number_records_to_remove_this_field_from   ,
                $total_records
                ) ;

        // =====================================================================
        // Get:-
        //      $number_records_NOT_to_remove_this_field_from__pretty
        // =====================================================================

        $number_records_NOT_to_remove_this_field_from =
            $total_records - $number_records_to_remove_this_field_from
            ;

        // ---------------------------------------------------------------------

        $number_records_NOT_to_remove_this_field_from__pretty =
            get_number_records__pretty(
                $number_records_NOT_to_remove_this_field_from   ,
                $total_records
                ) ;

        // =====================================================================
        // Get:-
        //      $number_distinct_values__pretty
        // =====================================================================

//      if (    array_key_exists(
//                  $this_field_slug                                                              ,
//                  $distinct_values_and_their_record_ids__by_field_slug__to_remove
//                  )
//          ) {

            // -----------------------------------------------------------------

            $number_distinct_values =
                count( $distinct_values_and_their_record_ids )
                ;

            // -----------------------------------------------------------------

            $number_distinct_values__pretty = (string) $number_distinct_values ;

            // -----------------------------------------------------------------

//      } else {
//
//          // -----------------------------------------------------------------
//
//          $number_distinct_values__pretty = '1' ;
//
//          // -----------------------------------------------------------------
//
//      }

        // ---------------------------------------------------------------------

        $number_distinct_values__pretty .= <<<EOT
 &nbsp; <a href="javascript:show_distinct_values('{$id}')">show&nbsp;distinct&nbsp;values</a>
EOT;

        // =====================================================================
        // Action
        // =====================================================================

        if (    count( $fields_to_add_by_field_slug ) < 1
                &&
                count( $fields_to_update_by_field_slug ) < 1
            ) {

            // -------------------------------------------------------------------------
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
            //                  'field'     =>  $this_field_slug          ,
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

            $url = get_updaction_url(
                        $core_plugapp_dirs      ,
                        array(
                            'dataset'   =>  $dataset_slug           ,
                            'field'     =>  $this_field_slug        ,
                            'action'    =>  'remove-this-field'
                            )
                        ) ;

            // -----------------------------------------------------------------

            if ( is_array( $url ) ) {
                return $url[0] ;
            }

            // -----------------------------------------------------------------

            $action = <<<EOT
<a  href="javascript:void()"
    onclick="question_remove_this_field(this,'{$this_field_slug}','{$url}')"
    >remove&nbsp;this&nbsp;field</a>
EOT;
                //  Can only remove fields if there are NO fields to either
                //  ADD or UPDATE.
                //
                //  This is because the "get New field value" routines may want
                //  to look at the value of fields being removed - as when
                //  renaming a field, for example).

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            $action = '&nbsp;' ;

            // -----------------------------------------------------------------

        }

        // =====================================================================
        // Field Slug Row...
        // =====================================================================

        $fields_to_remove_html .= <<<EOT
<tr>
    <td style="{$tdh_style}; font-size:106%; font-weight:bold; color:{$red_text}">{$this_field_slug}</td>
    <td style="{$tdh_style}">{$number_records_to_remove_this_field_from__pretty}</td>
    <td style="{$tdh_style}">{$number_distinct_values__pretty}</td>
    <td style="{$tdh_style}">{$number_records_NOT_to_remove_this_field_from__pretty}</td>
    <td style="{$tdh_style}">{$action}</td>
</tr>
EOT;

        // =====================================================================
        // Get the distinct values (for this field slug)...
        // =====================================================================

        // -------------------------------------------------------------------------
        // get_distinct_values_for_field__summary_and_record_listing_pages__mysql(
        //      $core_plugapp_dirs                          ,
        //      $all_table_records_by_record_id             ,
        //      $dataset_slug                               ,
        //      $field_slug                                 ,
        //      $distinct_values_and_their_record_ids       ,
        //      $add_update_remove
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      array(
        //          $distinct_values_summary_pages__4_field STRING
        //          $record_listing_pages__4_field          STRING
        //          )
        // -------------------------------------------------------------------------

        list(
            $distinct_values_summary_pages__4_field     ,
            $record_listing_pages__4_field
            ) =
            get_distinct_values_for_field__summary_and_record_listing_pages__mysql(
                $core_plugapp_dirs                          ,
                $all_table_records_by_record_id             ,
                $dataset_slug                               ,
                $this_field_slug                            ,
                $distinct_values_and_their_record_ids       ,
                $add_update_remove
                ) ;

        // ---------------------------------------------------------------------

        $distinct_value_summary_pages__4_dataset .= <<<EOT
<div id="{$id}" style="display:none">{$distinct_values_summary_pages__4_field}</div>
EOT;

        // ---------------------------------------------------------------------

        $record_listing_pages__4_dataset .=
            $record_listing_pages__4_field
            ;

        // =====================================================================
        // Repeat with the next field slug (if there is one)...
        // =====================================================================

    }

    // -------------------------------------------------------------------------
    // Table Proper
    // -------------------------------------------------------------------------

    $remove_table_style = <<<EOT
background-color:{$light_red_bg}
EOT;

    // -------------------------------------------------------------------------

    $number_fields_to_remove = count( $fields_to_remove_by_field_slug ) ;

    // -------------------------------------------------------------------------

    if ( $number_fields_to_remove === 1 ) {
        $fs = '' ;

    } else {
        $fs = 's' ;

    }

    // -------------------------------------------------------------------------

    if ( $total_records === 1 ) {
        $rs = '' ;

    } else {
        $rs = 's' ;

    }

    // -------------------------------------------------------------------------

    if ( count( $fields_to_add_by_field_slug ) < 1 ) {

        // -------------------------------------------------------------------------
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
        //                  'field'     =>  $this_field_slug          ,
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

        $url = get_updaction_url(
                    $core_plugapp_dirs      ,
                    array(
                        'dataset'   =>  $dataset_slug                   ,
                        'field'     =>  NULL                            ,
                        'action'    =>  'remove-all-dataset-fields'
                        )
                    ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $url ) ) {
            return $url[0] ;
        }

        // ---------------------------------------------------------------------

        $remove_all = <<<EOT
<p  style="margin-top:0.5em"><a
    href="javascript:void()"
    onclick="question_remove_all_dataset_fields(this,'{$dataset_slug}','{$url}')"
    >REMOVE ALL The Above Fields</a></p>
EOT;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $remove_all = '' ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( $fields_to_remove_html !== '' ) {

        // ---------------------------------------------------------------------

        $fields_to_remove_html = <<<EOT
<p style="{$intro_style}"><b>{$number_fields_to_remove}</b> field{$fs} to
<b>REMOVE</b> - from <b>{$total_records}</b> record{$rs} - as follows:-</p>

<div><table
    border="1"
    cellpadding="0"
    cellspacing="0"
    style="{$remove_table_style}"
    align="center"
    >
    <tr>
        <th style="{$tdh_style}; background-color:{$dark_red_bg}; color:{$red_text}">Field Name</th>
        <th style="{$tdh_style}; background-color:{$dark_red_bg}; color:{$red_text}">#Records To Remove This Field From</th>
        <th style="{$tdh_style}; background-color:{$dark_red_bg}; color:{$red_text}">#Distinct Values To Remove</th>
        <th style="{$tdh_style}; background-color:{$dark_red_bg}; color:{$red_text}">#Records NOT To Remove This Field From</th>
        <th style="{$tdh_style}; background-color:{$dark_red_bg}; color:{$red_text}">Action</th>
    </tr>
{$fields_to_remove_html}
</table></div>

{$remove_all}
EOT;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // EVERYTHING
    // =========================================================================

    // -------------------------------------------------------------------------
    // We're creating the update box for the entire dataset - eg:-
    //
    //                                Dataset: array_stored_test_dataset_one
    //
    //      2 fields to ADD - to 3 records - as follows:-
    //      ==============================================================================================
    //      Field Name      #Records To Add     #Distinct Values        #Records NOT To     Action
    //                      This Field To       To Add                  Add This Field To
    //      ==============  ==================  ======================  ==================  ==============
    //      new_field_one   All (3 records)     3 show distinct values  None                add this field
    //      new_field_two   All (3 records)     1 show distinct values  None                add this field
    //      ==============================================================================================
    //
    //                                    ADD ALL The Above Fields
    //
    //      1 field to REMOVE - from 3 records - as follows:-
    //      ==============================================================================================
    //      Field Name      #Records To Remove  #Distinct Values        #Records NOT To             Action
    //                      This Field From     To Remove               Remove This Field From
    //      ==============  ==================  ======================  ==========================  ======
    //      new_field_three All (3 records)     1 show distinct values  None
    //      ==============================================================================================
    //
    //                                   REMOVE ALL The Above Fields
    //
    //                                     UPDATE ENTIRE DATASET
    //               (ADD ALL Fields To Be Added - Then REMOVE ALL Fields To Be Removed)
    //
    // -------------------------------------------------------------------------

    $container_div_style = <<<EOT
position:relative; text-align:center; padding:0.5em 2em 2em 2em; margin:4em 2em 0 2em; background-color:#FFFFFF; border:3px dashed #999999
EOT;

    // -------------------------------------------------------------------------

    $h2_style = <<<EOT
display:inline-block; padding:0.33em 3em; background-color:#000000; color:#FFFFFF; font-weight:bold; margin-bottom:0
EOT;

    // -------------------------------------------------------------------------
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
    //                  'field'     =>  $this_field_slug          ,
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

    $url = get_updaction_url(
                $core_plugapp_dirs      ,
                array(
                    'dataset'   =>  $dataset_slug                               ,
                    'field'     =>  NULL                                        ,
                    'action'    =>  'add-all-then-update-all-then-remove-all'
                    )
                ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $url ) ) {
        return $url[0] ;
    }

    // -------------------------------------------------------------------------

    $light_cyan = '#00C5CD' ;
    $dark_cyan  = '#00767A' ;

    // -------------------------------------------------------------------------

    $manual_approval_page_html_4_dataset = <<<EOT
<div    id="container-div-4-{$dataset_slug}"
        style="{$container_div_style}"
        >

    <div style="position:absolute; top:-12px; left:-12px; font-size:167%; display:inline; background-color:{$light_cyan}; color:#FFFFFF; padding:5px 10px; line-height:120%; border-top:12px solid {$dark_cyan}; border-left:12px solid {$dark_cyan}">
        <b>MySQL</b><br />Stored
    </div>

    <h2 style="{$h2_style}"><span style="font-weight:normal; font-style:italic"
        >Dataset:</span>&nbsp;&nbsp;&nbsp;&nbsp; {$dataset_slug}</h2>

    {$fields_to_add_html}

    {$fields_to_update_html}

    {$fields_to_remove_html}

    <p style="background-color:#000000; margin-top:2em; margin-bottom:0; padding:3px 2em">
        <a  style="color:#FFFFFF; text-decoration:none; font-size:106%"
            href="javascript:void()"
            onclick="question_add_all_then_update_all_then_remove_all(this,'{$dataset_slug}','{$url}')"
            ><b>UPDATE ENTIRE DATASET</b><br />(ADD ALL Fields To Be Added -
                UPDATE ALL Fields To Be Updated - Then REMOVE ALL Fields To Be
                Removed)</a>
    </p>

</div>
EOT;

    // =========================================================================
    // SUCCESS
    // =========================================================================

    return array(
        $manual_approval_page_html_4_dataset            ,
        $distinct_value_summary_pages__4_dataset        ,
        $record_listing_pages__4_dataset
        ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_distinct_values_for_field__summary_and_record_listing_pages__mysql()
// =============================================================================

function get_distinct_values_for_field__summary_and_record_listing_pages__mysql(
    $core_plugapp_dirs                          ,
    $all_table_records_by_record_id             ,
    $dataset_slug                               ,
    $field_slug                                 ,
    $distinct_values_and_their_record_ids       ,
    $add_update_remove
    ) {

    // -------------------------------------------------------------------------
    // get_distinct_values_for_field__summary_and_record_listing_pages__mysql(
    //      $core_plugapp_dirs                      ,
    //      $all_table_records_by_record_id         ,
    //      $dataset_slug                           ,
    //      $field_slug                             ,
    //      $distinct_values_and_their_record_ids   ,
    //      $add_update_remove
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Creates/returns some pages like (eg):-
    //
    // 1.   $distinct_values_summary_pages__4_field
    //
    //                               Distinct Values To Add   back
    //
    //                      For Dataset:  array_stored_test_dataset_one
    //                      And Field:    new_field_one
    //
    //          ======================================================================
    //                      Distinct Value To Add       PHP Type    Records To Add To
    //          ==========  ==========================  ==========  ==================
    //          #1 of 3     "21 Nov 2015 9:00:22 GMT"   string      1 record show/hide
    //                      (23 chars)
    //          #2 of 3     "21 Nov 2015 9:00:57 GMT"   string      1 record show/hide
    //                      (23 chars)
    //          #3 of 3     "21 Nov 2015 9:01:32 GMT"   string      1 record show/hide
    //                      (23 chars)
    //          ======================================================================
    //
    // 2.   $record_listing_pages__4_field
    //
    //                                  Records For Distinct Value To Add   back
    //
    //                                    "21 Nov 2015 9:00:22 GMT" (23 chars)
    //
    //                              For Dataset:  array_stored_test_dataset_one
    //                              And Field:    new_field_one
    //
    //      Record# 1 of 1 to ADD field to - Out of 3 dataset records total - Record index 0
    //      =========================================================================================================
    //      Field Name                          Field Value     Extra Info. / Comments      PHP Type (of Field Value)
    //      ==================================  ==============  ==========================  =========================
    //      created_server_datetime_utc         1448096422      21 Nov 2015 9:00:22 GMT     integer
    //      last_modified_server_datetime_utc   1448096422      21 Nov 2015 9:00:22 GMT     integer
    //      key                                 "0f...5144"     59 chars                    string
    //      this_field                          "this"          4 chars                     string
    //      that_field                          "that"          4 chars                     string
    //      the_other_field                     "The othe..."   70 chars                    string
    //      boolean_field_one                   TRUE                                        boolean
    //      boolean_field_two                   FALSE                                       boolean
    //      new_field_three                     ""              empty string                string
    //      new_field_one                       "21 Nov 2015 9:00:22 GMT"
    //                                                          23 chars                    string
    //      =========================================================================================================
    //
    // RETURNS
    //      array(
    //          $distinct_values_summary_pages__4_field STRING
    //          $record_listing_pages__4_field          STRING
    //          )
    // -------------------------------------------------------------------------

    // =========================================================================
    // List the records by distinct value...
    // =========================================================================

//  ob_start() ;

//    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//        $distinct_values_and_their_record_ids     ,
//        '$distinct_values_and_their_record_ids'
//        ) ;

//  $distinct_values_for_field__summary_page = ob_get_clean() ;

    // -------------------------------------------------------------------------

    $tdh_style = <<<EOT
padding:3px 10px; text-align:center
EOT;

    // -------------------------------------------------------------------------

    $distinct_values_for_field__summary_page = '' ;

    // -------------------------------------------------------------------------

    $records_for_distinct_value__listing_pages__4_all_distinct_values = '' ;

    // -------------------------------------------------------------------------

    $total_distinct_values = count( $distinct_values_and_their_record_ids ) ;

    // -------------------------------------------------------------------------

    $this_distinct_value_number = 1 ;

    // -------------------------------------------------------------------------

    foreach ( $distinct_values_and_their_record_ids as $this_record ) {

        // ---------------------------------------------------------------------

        $this_distinct_value = $this_record['value'] ;

        $these_record_ids = $this_record['record_ids'] ;

        // ---------------------------------------------------------------------

        $this_type = gettype( $this_distinct_value ) ;

        // ---------------------------------------------------------------------

        $number_records = count( $these_record_ids ) ;

        // ---------------------------------------------------------------------

        $s = get_s( $number_records ) ;

        // ---------------------------------------------------------------------

        $id = <<<EOT
the-records-4-{$dataset_slug}-{$field_slug}-distinct-value-{$this_distinct_value_number}
EOT;

        // -------------------------------------------------------------------------
        // get_records_for_distinct_value__listing_page__mysql(
        //      $core_plugapp_dirs                  ,
        //      $all_table_records_by_record_id     ,
        //      $dataset_slug                       ,
        //      $field_slug                         ,
        //      $distinct_value                     ,
        //      $these_record_ids                   ,
        //      $add_update_remove
        //      )
        // - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      $records_for_distinct_value__listing_page STRING
        // -------------------------------------------------------------------------

        $records_for_distinct_value__listing_page =
            get_records_for_distinct_value__listing_page__mysql(
                $core_plugapp_dirs                  ,
                $all_table_records_by_record_id     ,
                $dataset_slug                       ,
                $field_slug                         ,
                $this_distinct_value                ,
                $these_record_ids                   ,
                $add_update_remove
                ) ;

        // ---------------------------------------------------------------------

        $records_for_distinct_value__listing_pages__4_all_distinct_values .= <<<EOT
<div
    id="{$id}"
    style="padding:5px 0; display:none"
    >{$records_for_distinct_value__listing_page}</div>
EOT;

        // ---------------------------------------------------------------------

        $records_column_value = <<<EOT
{$number_records} record{$s} &nbsp; <a href="javascript:toggle_distinct_value_records('{$id}')">show/hide</a>
EOT;

        // -------------------------------------------------------------------------
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

        list(
            $displayable_value          ,
            $extra_info_slash_comment
            ) = raw_2_displayable(
                    ''                      ,
                    $this_distinct_value
                    ) ;

        // ---------------------------------------------------------------------

        if ( $extra_info_slash_comment !== '' ) {

            $displayable_value .= <<<EOT
<br />({$extra_info_slash_comment})
EOT;

        }

        // ---------------------------------------------------------------------

        $distinct_values_for_field__summary_page .= <<<EOT
<tr>
    <td style="{$tdh_style}">#{$this_distinct_value_number} of {$total_distinct_values}</td>
    <td style="{$tdh_style}"><b style="color:#0066CC">{$displayable_value}</b></td>
    <td style="{$tdh_style}">{$this_type}</td>
    <td style="{$tdh_style}">{$records_column_value}</td>
</tr>
EOT;

        // ---------------------------------------------------------------------

        $this_distinct_value_number++ ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( $add_update_remove === 'add' ) {
        $add_remove_1 = 'Add' ;
        $add_remove_2 = 'Add To' ;

    } elseif ( $add_update_remove === 'update' ) {
        $add_remove_1 = 'Update' ;
        $add_remove_2 = 'Update In' ;

    } elseif ( $add_update_remove === 'remove' ) {
        $add_remove_1 = 'Remove' ;
        $add_remove_2 = 'Remove From' ;

    } else {
        //  TODO:   Error Message!

    }

    // -------------------------------------------------------------------------

    $distinct_values_for_field__summary_page = <<<EOT
<table
    border="1"
    cellpadding="0"
    cellspacing="0"
    align="center"
    >
    <tr>
        <th style="{$tdh_style}">&nbsp;</th>
        <th style="{$tdh_style}">Distinct Value To {$add_remove_1}</th>
        <th style="{$tdh_style}">PHP Type</th>
        <th style="{$tdh_style}">Records To {$add_remove_2}</th>
    </tr>
{$distinct_values_for_field__summary_page}
</table>
EOT;

    // =========================================================================
    // Tie everything together...
    // =========================================================================

    $h1_style = <<<EOT
margin-top:1em; text-align:center; line-height:133%
EOT;

    // -------------------------------------------------------------------------

    $h2_style = <<<EOT
text-align:center; line-height:133%; font-size:133%
EOT;

    // -------------------------------------------------------------------------

    if ( $add_update_remove === 'add' ) {
        $add_remove = 'Add' ;

    } elseif ( $add_update_remove === 'update' ) {
        $add_remove = 'Update' ;

    } elseif ( $add_update_remove === 'remove' ) {
        $add_remove = 'Remove' ;

    } else {
        //  TODO:  Error Message!

    }

    // -------------------------------------------------------------------------

    $distinct_values_for_field__summary_page = <<<EOT
<h1 style="{$h1_style}">
    Distinct Values To {$add_remove}
    <a  style="margin-left:2em; font-size:70%; font-weight:normal"
        href="javascript:back_to_main_page()"
        >back</a>
</h1>

<h2 style="{$h2_style}">For Dataset:&nbsp; <b>{$dataset_slug}</b><br />And
Field:&nbsp; <b style="color:#0066CC">{$field_slug}</b></h2>

{$distinct_values_for_field__summary_page}
EOT;

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return array(
                $distinct_values_for_field__summary_page                            ,
                $records_for_distinct_value__listing_pages__4_all_distinct_values
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_records_for_distinct_value__listing_page__mysql()
// =============================================================================

function get_records_for_distinct_value__listing_page__mysql(
    $core_plugapp_dirs                  ,
    $all_table_records_by_record_id     ,
    $dataset_slug                       ,
    $field_slug                         ,
    $distinct_value                     ,
    $these_record_ids                   ,
    $add_update_remove
    ) {

    // -------------------------------------------------------------------------
    // get_records_for_distinct_value__listing_page__mysql(
    //      $core_plugapp_dirs                  ,
    //      $all_table_records_by_record_id     ,
    //      $dataset_slug                       ,
    //      $field_slug                         ,
    //      $distinct_value                     ,
    //      $these_record_ids                   ,
    //      $add_update_remove
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      $records_for_distinct_value__listing_page STRING
    // -------------------------------------------------------------------------

    $tdh_style = <<<EOT
padding:3px 10px; text-align:center
EOT;

    // -------------------------------------------------------------------------

    $tdh_style_left = <<<EOT
padding:3px 10px; text-align:left
EOT;

    // -------------------------------------------------------------------------

    $tdh_style_right = <<<EOT
padding:3px 10px; text-align:right
EOT;

    // -------------------------------------------------------------------------

    if ( $add_update_remove === 'add' ) {

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

        list(
            $light_bg       ,
            $dark_bg        ,
            $text_colour
            ) = get_green_colours() ;

        // ---------------------------------------------------------------------

        $add_remove = 'ADD field to' ;

        // ---------------------------------------------------------------------

    } elseif ( $add_update_remove === 'update' ) {

        // -------------------------------------------------------------------------
        // get_blue_colours()
        // - - - - - - - - - -
        // RETURNS
        //      list(
        //          $light_blue_bg     ,
        //          $dark_blue_bg      ,
        //          $blue_text
        //          )
        // -------------------------------------------------------------------------

        list(
            $light_bg       ,
            $dark_bg        ,
            $text_colour
            ) = get_blue_colours() ;

        // ---------------------------------------------------------------------

        $add_remove = 'UPDATE field in' ;

        // ---------------------------------------------------------------------

    } elseif ( $add_update_remove === 'remove' ) {

        // -------------------------------------------------------------------------
        // get_red_colours()
        // - - - - - - - - - -
        // RETURNS
        //      list(
        //          $light_red_bg       ,
        //          $dark_red_bg        ,
        //          $red_text
        //          )
        // -------------------------------------------------------------------------

        list(
            $light_bg       ,
            $dark_bg        ,
            $text_colour
            ) = get_red_colours() ;

        // ---------------------------------------------------------------------

        $add_remove = 'REMOVE field from' ;

        // ---------------------------------------------------------------------

    } else {

        //  TODO:  Error message!

    }

    // -------------------------------------------------------------------------

    $item_count = count( $these_record_ids ) ;

    // -------------------------------------------------------------------------

    $total_count = count( $all_table_records_by_record_id ) ;

    // -------------------------------------------------------------------------

    $all_records_html = '' ;

    // -------------------------------------------------------------------------

    foreach ( $these_record_ids as $this_item_index => $this_record_id ) {

        // ---------------------------------------------------------------------

        $this_record = $all_table_records_by_record_id[ $this_record_id ] ;

        // ---------------------------------------------------------------------

        $this_records_html = '' ;

        // ---------------------------------------------------------------------

        foreach ( $this_record as $name => $value ) {

            // -------------------------------------------------------------------------
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

            list(
                $displayable_value          ,
                $extra_info_slash_comment
                ) = raw_2_displayable(
                        $name   ,
                        $value
                        ) ;

            // -----------------------------------------------------------------

            if ( $extra_info_slash_comment === '' ) {
                $extra_info_slash_comment = '&nbsp;' ;
            }

            // -----------------------------------------------------------------

            $type = gettype( $value ) ;

            // -----------------------------------------------------------------

            if (    $name === $field_slug
                    &&
                    (   $add_update_remove === 'update'
                        ||
                        $add_update_remove === 'remove'
                        )
                ) {

                $highlight_style = <<<EOT
; background-color:{$dark_bg}; color:{$text_colour}; font-weight:bold
EOT;

            } else {

                $highlight_style = '' ;

            }

            // -----------------------------------------------------------------

            $this_records_html .= <<<EOT
<tr>
    <td style="{$tdh_style_right}{$highlight_style}">{$name}</td>
    <td style="{$tdh_style_left}{$highlight_style}">{$displayable_value}</td>
    <td style="{$tdh_style_left}{$highlight_style}">{$extra_info_slash_comment}</td>
    <td style="{$tdh_style}{$highlight_style}">{$type}</td>
</tr>
EOT;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        if ( $add_update_remove === 'add' ) {

            // -------------------------------------------------------------------------
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

            list(
                $displayable_value          ,
                $extra_info_slash_comment
                ) = raw_2_displayable(
                        $field_slug         ,
                        $distinct_value
                        ) ;

            // -----------------------------------------------------------------

            if ( $extra_info_slash_comment === '' ) {
                $extra_info_slash_comment = '&nbsp;' ;
            }

            // -----------------------------------------------------------------

            $type = gettype( $distinct_value ) ;

            // -----------------------------------------------------------------

            $highlight_style = <<<EOT
; background-color:{$dark_bg}; color:{$text_colour}; font-weight:bold
EOT;

            // -----------------------------------------------------------------

            $this_records_html .= <<<EOT
<tr>
    <td style="{$tdh_style_right}{$highlight_style}">{$field_slug}</td>
    <td style="{$tdh_style_left}{$highlight_style}">{$displayable_value}</td>
    <td style="{$tdh_style_left}{$highlight_style}">{$extra_info_slash_comment}</td>
    <td style="{$tdh_style}{$highlight_style}">{$type}</td>
</tr>
EOT;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        $item_number = $this_item_index + 1 ;

        // ---------------------------------------------------------------------

        if ( $this_item_index > 0 ) {

            $margin_top = <<<EOT
 style="margin-top:2em"
EOT;

        } else {

            $margin_top = '' ;

        }

        // ---------------------------------------------------------------------

        $this_records_html = <<<EOT
<div{$margin_top}>
    <div style="text-align:left; font-weight:bold">Record# {$item_number} of
    {$item_count} to {$add_remove} &mdash; Out of {$total_count} dataset records
    total &mdash; Record ID {$this_record_id}</div>
    <table
        border="1"
        cellpadding="0"
        cellspacing="0"
        align="center"
        style="background-color:{$light_bg}"
        >
        <tr>
            <th style="{$tdh_style}; background-color:{$dark_bg}; color:{$text_colour}">Field Name</th>
            <th style="{$tdh_style}; background-color:{$dark_bg}; color:{$text_colour}">Field Value</th>
            <th style="{$tdh_style}; background-color:{$dark_bg}; color:{$text_colour}">Extra Info. / Comments</th>
            <th style="{$tdh_style}; background-color:{$dark_bg}; color:{$text_colour}">PHP Type (of Field Value)</th>
        </tr>
    {$this_records_html}
    </table>
</div>
EOT;

        // ---------------------------------------------------------------------

        $all_records_html .= $this_records_html ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Tie everything together...
    // =========================================================================

    $h1_style = <<<EOT
margin-top:1em; text-align:center; line-height:133%
EOT;

    // -------------------------------------------------------------------------

    $h2_style = <<<EOT
text-align:center; line-height:133%; font-size:133%
EOT;

    // -------------------------------------------------------------------------

    if ( $add_update_remove === 'add' ) {
        $add_remove = 'Add' ;

    } elseif ( $add_update_remove === 'update' ) {
        $add_remove = 'Update' ;

    } elseif ( $add_update_remove === 'remove' ) {
        $add_remove = 'Remove' ;

    } else {
        //  TODO:  Error Message!

    }

    // -------------------------------------------------------------------------

    list(
        $displayable_value          ,
        $extra_info_slash_comment
        ) = raw_2_displayable(
                $field_slug         ,
                $distinct_value
                ) ;

    // -------------------------------------------------------------------------

    if ( $extra_info_slash_comment !== '' ) {

        $displayable_value = <<<EOT
{$displayable_value} ({$extra_info_slash_comment})
EOT;

    }

    // -------------------------------------------------------------------------

    $records_for_distinct_value__listing_page = <<<EOT
<h1 style="{$h1_style}">
    Records For Distinct Value To {$add_remove}
    <a  style="margin-left:2em; font-size:70%; font-weight:normal"
        href="javascript:back_to_distinct_value_summary_page()"
        >back</a><br />
    <b style="color:#0066CC; position:relative; top:8px">{$displayable_value}</b>
</h1>

<h2 style="{$h2_style}">
    For Dataset:&nbsp; <b>{$dataset_slug}</b><br />
    And Field:&nbsp; <b style="color:#0066CC">{$field_slug}</b>
</h2>

{$all_records_html}
EOT;

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $records_for_distinct_value__listing_page ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

