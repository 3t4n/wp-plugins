<?php

// *****************************************************************************
// DATASET-MANAGER / UPDATE-AND-SAVE-MYSQL-STORED-DATASET-DATA.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// ============================================================================
// do_updaction_4_mysql_table()
// =============================================================================

function do_updaction_4_mysql_table(
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
    ) {

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

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $fields_to_add_by_field_slug = Array(
    //
    //          [new_field_one] => Array(
    //                                  [Field]     => new_field_one
    //                                  [Type]      => TEXT
    //                                  [Null]      => NO
    //                                  [Key]       =>
    //                                  [Default]   =>
    //                                  [Extra]     =>
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

    // =========================================================================
    // Retrieve the "updaction" parameters...
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/string-utils.php' ) ;

    // -------------------------------------------------------------------------

    $updaction = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\hex_decode( $_GET['updaction'] ) ;

    // -------------------------------------------------------------------------

    $updaction = @unserialize( $updaction ) ;
                //  Return Values
                //
                //  The converted value is returned, and can be a boolean,
                //  integer, float, string, array or object.
                //
                //  In case the passed string is not unserializeable, FALSE is
                //  returned and E_NOTICE is issued.

    // -------------------------------------------------------------------------

    if ( ! is_array( $updaction ) ) {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM:&nbsp; Bad "updaction" (#1)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $updaction , '$updaction' ) ;

    // =========================================================================
    // ERROR CHECKING...
    // =========================================================================

    if (    count( $updaction ) !== 3
            ||
            ! array_key_exists( 'dataset' , $updaction )
            ||
            ! array_key_exists( 'field' , $updaction )
            ||
            ! array_key_exists( 'action' , $updaction )
        ) {

        $ln = __LINE__ - 6 ;

        return <<<EOT
PROBLEM:&nbsp; Bad "updaction" (#2)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------
    // dataset ?
    // -------------------------------------------------------------------------

//  if (    ! is_string( $updaction['dataset'] )
//          ||
//          trim( $updaction['dataset'] ) === ''
//          ||
//          ! array_key_exists( $updaction['dataset'] , $loaded_datasets )
//      ) {
//
//      $ln = __LINE__ - 5 ;
//
//          return <<<EOT
//  PROBLEM:&nbsp; Bad "updaction" + "dataset"
//  Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
//  EOT;
//
//  }

    // =========================================================================
    // If the "updaction" DATASET ISN'T the current dataset, then abort...
    // =========================================================================

    if ( $updaction['dataset'] !== $dataset_slug ) {
        return FALSE ;
    }

    // =========================================================================
    // ERROR CHECKING (cont'd)...
    // =========================================================================

    // -------------------------------------------------------------------------
    // field ?
    // -------------------------------------------------------------------------

    if (    ! is_null( $updaction['field'] )
            &&
            (   ! is_string( $updaction['field'] )
                ||
                trim( $updaction['field'] ) === ''
                )
        ) {

        $ln = __LINE__ - 6 ;

        return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field"
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------

    if (    is_string( $updaction['field'] )
            &&
            trim( $updaction['field'] ) !== ''
            &&
            ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore(
                    $updaction['field']
                    )
        ) {

        $ln = __LINE__ - 7 ;

        return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field" name (contains invalid characters)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // -------------------------------------------------------------------------
    // action ?
    // -------------------------------------------------------------------------

    if (    ! is_string( $updaction['action'] )
            ||
            trim( $updaction['action'] ) === ''
        ) {

        $ln = __LINE__ - 4 ;

        return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "action"
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // =========================================================================
    // Support Routines
    // =========================================================================

    require_once( dirname( __FILE__ ) . '/mysql-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\
    // get_column_structure_sql(
    //      &$primary_key_field_name            ,
    //      &$unique_key_field_names            ,
    //      &$number_auto_increment_fields      ,
    //      $safe_dataset_slug                  ,
    //      $this_column
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // Returns the SQL needed to create/define a table column.  And updates
    // the:-
    //      $primary_key_field_name
    //      $unique_key_field_names
    //      $number_auto_increment_fields
    //
    // variables in the caller whilst doing so.
    //
    // ---
    //
    // On entry we should have (eg):-
    //
    //      $this_column = array(
    //          [Field]     => id
    //          [Type]      => BIGINT(20) UNSIGNED
    //          [Null]      => NO
    //          [Key]       => PRI
    //          [Default]   =>
    //          [Extra]     => AUTO_INCREMENT
    //          )
    //
    // ---
    //
    // The returned SQL might be like (eg):-
    //      o   " BIGINT UNSIGNED NOT NULL AUTO_INCREMENT"
    //      o   " TINYTEXT NOT NULL"
    //      o   " TIMESTAMP DEFAULT CURRENT_TIMESTAMP"
    //
    // Ie; The leading field/column name ISN'T included.
    //
    // ---
    //
    // RETURNS
    //      On SUCCESS
    //          $column_structure_sql STRING
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // RUNNING GENERAL QUERIES
    // =======================
    // The query function allows you to execute any SQL query on the WordPress
    // database.  It is best used when there is a need for specific, custom, or
    // otherwise complex SQL queries.  For more basic queries, such as selecting
    // information from a table, see the other wpdb functions above.
    //
    // General Syntax
    //
    //      $wpdb->query('query')
    //
    //      query
    //          (string) The SQL query you wish to execute.
    //
    // This function returns an integer value indicating the number of rows
    // affected/selected for SELECT, INSERT, DELETE, UPDATE, etc.
    //
    // For CREATE, ALTER, TRUNCATE and DROP SQL statements, (which affect whole
    // tables instead of specific rows) this function returns TRUE on success.
    //
    // If a MySQL error is encountered, the function will return FALSE.  Note
    // that since both 0 and FALSE may be returned for row queries, you should
    // be careful when checking the return value.  Use the identity operator
    // (===) to check for errors (e.g., false === $result), and whether any rows
    // were affected (e.g., 0 === $result).
    //
    // EXAMPLES
    //
    // 1.   Delete the 'gargle' meta key and value from Post 13. (We'll add the
    //      'prepare' method to make sure we're not dealing with an illegal
    //      operation or any illegal characters):
    //
    //          $wpdb->query(
    //              $wpdb->prepare(
    //                  "
    //                  DELETE FROM $wpdb->postmeta
    //                  WHERE post_id = %d
    //                  AND meta_key = %s
    //                  "   ,
    //                  13, 'gargle'
    //                  )
    //              ) ;
    //
    //      Performed in WordPress by delete_post_meta().
    //
    // 2.   Set the parent of Page 15 to Page 7.
    //
    //          $wpdb->query(
    //              "
    //              UPDATE $wpdb->posts
    //              SET post_parent = 7
    //              WHERE ID = 15
    //              AND post_status = 'static'
    //              "
    //              ) ;
    //
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // PROTECT QUERIES AGAINST SQL INJECTION ATTACKS
    // =============================================
    // For a more complete overview of SQL escaping in WordPress, see database
    // Data Validation. It is a must-read for all WordPress code contributors
    // and plugin authors.
    //
    // All data in SQL queries must be SQL-escaped before the SQL query is
    // executed to prevent against SQL injection attacks. The prepare method
    // performs this functionality for WordPress, which supports both a
    // sprintf()-like and vsprintf()-like syntax.
    //
    // Please note: As of 3.5, wpdb::prepare() enforces a minimum of 2
    // arguments. [more info]
    //
    //      $sql = $wpdb->prepare( 'query' , value_parameter[, value_parameter ... ] )
    //
    //      query
    //          (string) The SQL query you wish to execute, with placeholders
    //          (see below).
    //
    //      value_parameter
    //          (int|string|array) The value to substitute into the placeholder.
    //
    //          Many values may be passed by simply passing more arguments in a
    //          sprintf()-like fashion.  Alternatively the second argument can
    //          be an array containing the values as in PHP's vsprintf()
    //          function.
    //
    //          Care must be taken not to allow direct user input to this
    //          parameter, which would enable array manipulation of any query
    //          with multiple placeholders.  Values cannot be SQL-escaped.
    //
    // PLACEHOLDERS
    //
    //      The query parameter for prepare accepts sprintf()-like placeholders.
    //
    //      The %s (string), %d (integer) and %f (float) formats are supported.
    //
    //      (The %s and %d placeholders have been available since the function
    //      was added to core in Version 2.3, %f has only been available since
    //      Version 3.3.)
    //
    //      Any other % characters may cause parsing errors unless they are
    //      escaped.  All % characters inside SQL string literals, including
    //      LIKE wildcards, must be double-% escaped as %%.  All of %d, %f, and
    //      %s are to be left unquoted in the query string.  Note that the %d
    //      placeholder only accepts integers, so you can't pass numbers that
    //      have comma values via %d.  If you need comma values, use %f as float
    //      instead.
    //
    // EXAMPLES
    //
    // 1.   Add Meta key => value pair "Harriet's Adages" => "WordPress'
    //      database interface is like Sunday Morning: Easy." to Post 10.
    //
    //          $metakey    = "Harriet's Adages";
    //          $metavalue  = "WordPress' database interface is like Sunday Morning: Easy.";
    //
    //          $wpdb->query( $wpdb->prepare(
    //              "
    //              INSERT INTO $wpdb->postmeta
    //              ( post_id, meta_key, meta_value )
    //              VALUES ( %d, %s, %s )
    //              "               ,
    //              10              ,
    //              $metakey        ,
    //              $metavalue
    //          ) ) ;
    //
    //      Performed in WordPress by add_meta().
    //
    // 2.   The same query using vsprintf()-like syntax.
    //
    //          $metakey = "Harriet's Adages";
    //          $metavalue = "WordPress' database interface is like Sunday Morning: Easy.";
    //
    //          $wpdb->query( $wpdb->prepare(
    //              "
    //              INSERT INTO $wpdb->postmeta
    //              ( post_id, meta_key, meta_value )
    //              VALUES ( %d, %s, %s )
    //              "   ,
    //              array(
    //                  10          ,
    //                  $metakey    ,
    //                  $metavalue
    //                  )
    //          ) ) ;
    //
    //      Note that in this example we pack the values together in an array.
    //      This can be useful when we don't know the number of arguments we
    //      need to pass until runtime.
    //
    //      Notice that you do not have to worry about quoting strings.  Instead
    //      of passing the variables directly into the SQL query, use a %s
    //      placeholder for strings, a %d placedolder for integers, and a %f as
    //      a placeholder for floats.  You can pass as many values as you like,
    //      each as a new parameter in the prepare() method.
    //
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // UPDATE ROWS
    // ===========
    // Update a row in the table. Returns false if errors, or the number of rows
    // affected if successful.
    //
    //      $wpdb->update( $table, $data, $where, $format = null, $where_format = null )
    //
    //      table
    //          (string) The name of the table to update.
    //
    //      data
    //          (array) Data to update (in column => value pairs). Both $data
    //          columns and $data values should be "raw" (neither should be SQL
    //          escaped). This means that if you are using GET or POST data you
    //          may need to use stripslashes() to avoid slashes ending up in the
    //          database.
    //
    //      where
    //          (array) A named array of WHERE clauses (in column => value
    //          pairs). Multiple clauses will be joined with ANDs. Both $where
    //          columns and $where values should be "raw".
    //
    //      format
    //          (array|string) (optional) An array of formats to be mapped to
    //          each of the values in $data. If string, that format will be used
    //          for all of the values in $data.
    //
    //      where_format
    //          (array|string) (optional) An array of formats to be mapped to
    //          each of the values in $where. If string, that format will be
    //          used for all of the items in $where.
    //
    // Possible format values: %s as string; %d as integer (whole number) and %f
    // as float. (See below for more information.) If omitted, all values in
    // $where will be treated as strings.
    //
    // RETURN VALUES:
    //      This function returns the number of rows updated, or false if there
    //      is an error. Keep in mind that if the $data matches what is already
    //      in the database, no rows will be updated, so 0 will be returned.
    //      Because of this, you should probably check the return with false ===
    //      $result
    //
    // EXAMPLES
    //      Update a row, where the ID is 1, the value in the first column is a
    //      string and the value in the second column is a number:
    //
    //          $wpdb->update(
    //              'table'                         ,
    //              array(
    //                  'column1' => 'value1',  // string
    //                  'column2' => 'value2'   // integer (number)
    //                  )                           ,
    //              array( 'ID' => 1 )              ,
    //              array(
    //                  '%s',   // value1
    //                  '%d'    // value2
    //                  )                           ,
    //              array( '%d' )
    //              ) ;
    //
    // ATTENTION:
    //      %d can't deal with comma values - if you're not using full numbers,
    //      use string/%s.
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $safe_dataset_slug = htmlentities( $dataset_slug ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $updaction['field'] ) ) {
        $safe_field_name = htmlentities( $updaction['field'] ) ;
    }

    // -------------------------------------------------------------------------

    global $wpdb ;

    // =========================================================================
    // Error check and PROCESS the recognised/supported ACTIONS...
    // =========================================================================

    if ( $updaction['action'] === 'add-this-field' ) {

        // =====================================================================
        // ADD-THIS-FIELD
        // =====================================================================

        // ---------------------------------------------------------------------
        // Error Checking...
        // ---------------------------------------------------------------------

        if (    ! is_string( $updaction['field'] )
                ||
                trim( $updaction['field'] ) === ''
            ) {

            $ln = __LINE__ - 4 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field" (non-empty string expected)
For dataset:&nbsp; {$safe_dataset_slug}
And action:&nbsp; {$updaction['action']}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                        $updaction['field']             ,
                        $fields_to_add_by_field_slug
                        )
            ) {

            $ln = __LINE__ - 5 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field" (not a recognised field to add) #1
For dataset:&nbsp; {$safe_dataset_slug}
And action:&nbsp; {$updaction['action']}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                        $updaction['field']                                                 ,
                        $distinct_values_and_their_record_ids__by_field_slug__to_add
                        )
            ) {

            $ln = __LINE__ - 5 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field" (not a recognised field to add) #2
For dataset:&nbsp; {$safe_dataset_slug}
And action:&nbsp; {$updaction['action']}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------
        // Add the field...
        // ---------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // add_single_field(
        //      $core_plugapp_dirs                                              ,
        //      $safe_dataset_slug                                              ,
        //      $safe_action                                                    ,
        //      $mysql_table_name                                               ,
        //      $fields_to_add_by_field_slug                                    ,
        //      $distinct_values_and_their_record_ids__by_field_slug__to_add    ,
        //      $field_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      On SUCCESS
        //          TRUE
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        $result =
            add_single_field(
                $core_plugapp_dirs                                              ,
                $safe_dataset_slug                                              ,
                $updaction['action']                                            ,
                $mysql_table_name                                               ,
                $fields_to_add_by_field_slug                                    ,
                $distinct_values_and_their_record_ids__by_field_slug__to_add    ,
                $updaction['field']
                ) ;

        // -------------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $updaction['action'] === 'add-all-dataset-fields' ) {

        // =====================================================================
        // ADD-ALL-DATASET-FIELDS
        // =====================================================================

        // ---------------------------------------------------------------------
        // Error Checking...
        // ---------------------------------------------------------------------

        if ( ! is_null( $updaction['field'] ) ) {

            $ln = __LINE__ - 2 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field"
For action:&nbsp; {$updaction['action']}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------
        // Add the fields...
        // ---------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // add_single_field(
        //      $core_plugapp_dirs                                              ,
        //      $safe_dataset_slug                                              ,
        //      $safe_action                                                    ,
        //      $mysql_table_name                                               ,
        //      $fields_to_add_by_field_slug                                    ,
        //      $distinct_values_and_their_record_ids__by_field_slug__to_add    ,
        //      $field_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      On SUCCESS
        //          TRUE
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        foreach (   $distinct_values_and_their_record_ids__by_field_slug__to_add
                    as
                    $this_field_slug => $distinct_values_and_their_record_ids
            ) {

            // -----------------------------------------------------------------

            $result =
                add_single_field(
                    $core_plugapp_dirs                                              ,
                    $safe_dataset_slug                                              ,
                    $updaction['action']                                            ,
                    $mysql_table_name                                               ,
                    $fields_to_add_by_field_slug                                    ,
                    $distinct_values_and_their_record_ids__by_field_slug__to_add    ,
                    $this_field_slug
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    } elseif ( $updaction['action'] === 'update-this-field' ) {

        // =====================================================================
        // UPDATE-THIS-FIELD
        // =====================================================================

        // ---------------------------------------------------------------------
        // Error Checking...
        // ---------------------------------------------------------------------

        if (    ! is_string( $updaction['field'] )
                ||
                trim( $updaction['field'] ) === ''
            ) {

            $ln = __LINE__ - 4 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field" (non-empty string expected)
For dataset:&nbsp; {$safe_dataset_slug}
And action:&nbsp; {$updaction['action']}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                        $updaction['field']                 ,
                        $fields_to_update_by_field_slug
                        )
            ) {

            $ln = __LINE__ - 5 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field" (not a recognised field to update) #1
For dataset:&nbsp; {$safe_dataset_slug}
And action:&nbsp; {$updaction['action']}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                        $updaction['field']                                                 ,
                        $distinct_values_and_their_record_ids__by_field_slug__to_update
                        )
            ) {

            $ln = __LINE__ - 5 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field" (not a recognised field to update) #2
For dataset:&nbsp; {$safe_dataset_slug}
And action:&nbsp; {$updaction['action']}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        if ( count( $fields_to_add_by_field_slug ) > 0 ) {

            $ln = __LINE__ - 4 ;

            return <<<EOT
PROBLEM:&nbsp; Can't update this field (because this dataset still has some fields to add)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------
        // Update the field...
        // ---------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // update_single_field(
        //      $core_plugapp_dirs                                                  ,
        //      $safe_dataset_slug                                                  ,
        //      $safe_action                                                        ,
        //      $mysql_table_name                                                   ,
        //      $fields_to_update_by_field_slug                                     ,
        //      $distinct_values_and_their_record_ids__by_field_slug__to_update     ,
        //      $field_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      On SUCCESS
        //          TRUE
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        $result =
            update_single_field(
                $core_plugapp_dirs                                                  ,
                $safe_dataset_slug                                                  ,
                $updaction['action']                                                ,
                $mysql_table_name                                                   ,
                $fields_to_update_by_field_slug                                     ,
                $distinct_values_and_their_record_ids__by_field_slug__to_update     ,
                $updaction['field']
                ) ;

        // -------------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $updaction['action'] === 'update-all-dataset-fields' ) {

        // =====================================================================
        // UPDATE-ALL-DATASET-FIELDS
        // =====================================================================

        // ---------------------------------------------------------------------
        // Error Checking...
        // ---------------------------------------------------------------------

        if ( ! is_null( $updaction['field'] ) ) {

            $ln = __LINE__ - 2 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field"
For action:&nbsp; {$updaction['action']}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        if ( count( $fields_to_add_by_field_slug ) > 0 ) {

            $ln = __LINE__ - 4 ;

            return <<<EOT
PROBLEM:&nbsp; Can't update fields (because this dataset still has some fields to add)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------
        // Update the fields...
        // ---------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // update_single_field(
        //      $core_plugapp_dirs                                                  ,
        //      $safe_dataset_slug                                                  ,
        //      $safe_action                                                        ,
        //      $mysql_table_name                                                   ,
        //      $fields_to_update_by_field_slug                                     ,
        //      $distinct_values_and_their_record_ids__by_field_slug__to_update     ,
        //      $field_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      On SUCCESS
        //          TRUE
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        foreach (   $distinct_values_and_their_record_ids__by_field_slug__to_update
                    as
                    $this_field_slug => $distinct_values_and_their_record_ids
            ) {

            // -----------------------------------------------------------------

            $result =
                update_single_field(
                    $core_plugapp_dirs                                                  ,
                    $safe_dataset_slug                                                  ,
                    $updaction['action']                                                ,
                    $mysql_table_name                                                   ,
                    $fields_to_update_by_field_slug                                     ,
                    $distinct_values_and_their_record_ids__by_field_slug__to_update     ,
                    $this_field_slug
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    } elseif ( $updaction['action'] === 'remove-this-field' ) {

        // =====================================================================
        // REMOVE-THIS-FIELD
        // =====================================================================

        if (    count( $fields_to_add_by_field_slug ) > 0
                ||
                count( $fields_to_update_by_field_slug ) > 0
            ) {

            $ln = __LINE__ - 4 ;

            return <<<EOT
PROBLEM:&nbsp; Can't remove fields (because this dataset still has some fields to either add and/or update)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        if (    ! is_string( $updaction['field'] )
                ||
                trim( $updaction['field'] ) === ''
            ) {

            $ln = __LINE__ - 4 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field" (non-empty string expected)
For dataset:&nbsp; {$safe_dataset_slug}
And action:&nbsp; {$updaction['action']}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                        $updaction['field']                 ,
                        $fields_to_remove_by_field_slug
                        )
            ) {

            $ln = __LINE__ - 5 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field" (not a recognised field to remove) #1
For dataset:&nbsp; {$safe_dataset_slug}
And action:&nbsp; {$updaction['action']}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                        $updaction['field']                                                 ,
                        $distinct_values_and_their_record_ids__by_field_slug__to_remove
                        )
            ) {

            $ln = __LINE__ - 5 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field" (not a recognised field to remove) #2
For dataset:&nbsp; {$safe_dataset_slug}
And action:&nbsp; {$updaction['action']}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // -------------------------------------------------------------------------
        // remove_single_field(
        //      $core_plugapp_dirs                                                  ,
        //      $safe_dataset_slug                                                  ,
        //      $safe_action                                                        ,
        //      $mysql_table_name                                                   ,
        //      $fields_to_remove_by_field_slug                                     ,
        //      $distinct_values_and_their_record_ids__by_field_slug__to_remove     ,
        //      $field_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      On SUCCESS
        //          TRUE
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        $result =
            remove_single_field(
                $core_plugapp_dirs                                                  ,
                $safe_dataset_slug                                                  ,
                $updaction['action']                                                ,
                $mysql_table_name                                                   ,
                $fields_to_remove_by_field_slug                                     ,
                $distinct_values_and_their_record_ids__by_field_slug__to_remove     ,
                $updaction['field']
                ) ;

        // -------------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

    } elseif ( $updaction['action'] === 'remove-all-dataset-fields' ) {

        // =====================================================================
        // REMOVE-ALL-DATASET-FIELDS
        // =====================================================================

        if (    count( $fields_to_add_by_field_slug ) > 0
                ||
                count( $fields_to_update_by_field_slug ) > 0
            ) {

            $ln = __LINE__ - 4 ;

            return <<<EOT
PROBLEM:&nbsp; Can't remove fields (because this dataset still has some fields to either add and/or update)
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

        if ( ! is_null( $updaction['field'] ) ) {

            $ln = __LINE__ - 2 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field"
For action:&nbsp; {$updaction['action']}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // -------------------------------------------------------------------------
        // remove_single_field(
        //      $core_plugapp_dirs                                                  ,
        //      $safe_dataset_slug                                                  ,
        //      $safe_action                                                        ,
        //      $mysql_table_name                                                   ,
        //      $fields_to_remove_by_field_slug                                     ,
        //      $distinct_values_and_their_record_ids__by_field_slug__to_remove     ,
        //      $field_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      On SUCCESS
        //          TRUE
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        foreach (   $distinct_values_and_their_record_ids__by_field_slug__to_remove
                    as
                    $this_field_slug => $distinct_values_and_their_record_ids
            ) {

            // -----------------------------------------------------------------

            $result =
                remove_single_field(
                    $core_plugapp_dirs                                                  ,
                    $safe_dataset_slug                                                  ,
                    $updaction['action']                                                ,
                    $mysql_table_name                                                   ,
                    $fields_to_remove_by_field_slug                                     ,
                    $distinct_values_and_their_record_ids__by_field_slug__to_remove     ,
                    $this_field_slug
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    } elseif ( $updaction['action'] === 'add-all-then-update-all-then-remove-all' ) {

        // =====================================================================
        // ADD-ALL-THEN-UPDATE-ALL-THEN-REMOVE-ALL
        // =====================================================================

        if ( ! is_null( $updaction['field'] ) ) {

            $ln = __LINE__ - 2 ;

            return <<<EOT
PROBLEM:&nbsp; Bad "updaction" + "field"
For action:&nbsp; {$updaction['action']}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------
        // ADD...
        // ---------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // add_single_field(
        //      $core_plugapp_dirs                                              ,
        //      $safe_dataset_slug                                              ,
        //      $safe_action                                                    ,
        //      $mysql_table_name                                               ,
        //      $fields_to_add_by_field_slug                                    ,
        //      $distinct_values_and_their_record_ids__by_field_slug__to_add    ,
        //      $field_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      On SUCCESS
        //          TRUE
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        foreach (   $distinct_values_and_their_record_ids__by_field_slug__to_add
                    as
                    $this_field_slug => $distinct_values_and_their_record_ids
            ) {

            // -----------------------------------------------------------------

            $result =
                add_single_field(
                    $core_plugapp_dirs                                              ,
                    $safe_dataset_slug                                              ,
                    $updaction['action']                                            ,
                    $mysql_table_name                                               ,
                    $fields_to_add_by_field_slug                                    ,
                    $distinct_values_and_their_record_ids__by_field_slug__to_add    ,
                    $this_field_slug
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // UPDATE...
        // ---------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // update_single_field(
        //      $core_plugapp_dirs                                                  ,
        //      $safe_dataset_slug                                                  ,
        //      $safe_action                                                        ,
        //      $mysql_table_name                                                   ,
        //      $fields_to_update_by_field_slug                                     ,
        //      $distinct_values_and_their_record_ids__by_field_slug__to_update     ,
        //      $field_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      On SUCCESS
        //          TRUE
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        foreach (   $distinct_values_and_their_record_ids__by_field_slug__to_update
                    as
                    $this_field_slug => $distinct_values_and_their_record_ids
            ) {

            // -----------------------------------------------------------------

            $result =
                update_single_field(
                    $core_plugapp_dirs                                                  ,
                    $safe_dataset_slug                                                  ,
                    $updaction['action']                                                ,
                    $mysql_table_name                                                   ,
                    $fields_to_update_by_field_slug                                     ,
                    $distinct_values_and_their_record_ids__by_field_slug__to_update     ,
                    $this_field_slug
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

        }

        // -------------------------------------------------------------------------
        // REMOVE...
        // -------------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // remove_single_field(
        //      $core_plugapp_dirs                                                  ,
        //      $safe_dataset_slug                                                  ,
        //      $safe_action                                                        ,
        //      $mysql_table_name                                                   ,
        //      $fields_to_remove_by_field_slug                                     ,
        //      $distinct_values_and_their_record_ids__by_field_slug__to_remove     ,
        //      $field_slug
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // RETURNS
        //      On SUCCESS
        //          TRUE
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        foreach (   $distinct_values_and_their_record_ids__by_field_slug__to_remove
                    as
                    $this_field_slug => $distinct_values_and_their_record_ids
            ) {

            // -----------------------------------------------------------------

            $result =
                remove_single_field(
                    $core_plugapp_dirs                                                  ,
                    $safe_dataset_slug                                                  ,
                    $updaction['action']                                                ,
                    $mysql_table_name                                                   ,
                    $fields_to_remove_by_field_slug                                     ,
                    $distinct_values_and_their_record_ids__by_field_slug__to_remove     ,
                    $this_field_slug
                    ) ;

            // -----------------------------------------------------------------

            if ( is_string( $result ) ) {
                return $result ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    } else {

        // =====================================================================
        // ERROR
        // =====================================================================

        $ln = __LINE__ - 6 ;

        return <<<EOT
PROBLEM:&nbsp; Unrecognised/unsupported "updaction" + "action"
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SUCCESS!
    //
    //      =>  Go back to the calling page (= plugin home page), with URL
    //          params:-
    //              o   "updaction" removed, and;
    //              o   "updaction_finished" = <dataset_slug>
    //
    //          So as to trigger the database update routines into updating:-
    //              "last checked dataset details"
    // =========================================================================

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
    // Where the values supplied should NOT be URL encoded.
    // ("get_query_adjusted_current_page_url()" will urlencode() them 4 you.)
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
        'updaction'             =>  NULL            ,
        'updaction_finished'    =>  $dataset_slug
        ) ;

    // -------------------------------------------------------------------------

    $question_amp          = FALSE ;

    $question_die_on_error = FALSE ;

    // -------------------------------------------------------------------------

    $url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\get_query_adjusted_current_page_url(
            $query_changes              ,
            $question_amp               ,
            $question_die_on_error
            ) ;

    // -------------------------------------------------------------------------

/*
    $go_back_to_calling_page = <<<EOT
<script type="text/javascript">
    location.href="{$url}" ;
</script>
EOT;

    // -------------------------------------------------------------------------

    echo $go_back_to_calling_page ;
*/

    // -------------------------------------------------------------------------

    $ok = <<<EOT
<h3>Dataset Updated OK</h3>

<p><a href="{$url}" style="font-size:133%; font-weight:bold; text-decoration:none">OK</a></p>

<br />
<br />
<br />
EOT;

    // -------------------------------------------------------------------------

    die( $ok ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// add_single_field()
// =============================================================================

function add_single_field(
    $core_plugapp_dirs                                              ,
    $safe_dataset_slug                                              ,
    $safe_action                                                    ,
    $mysql_table_name                                               ,
    $fields_to_add_by_field_slug                                    ,
    $distinct_values_and_their_record_ids__by_field_slug__to_add    ,
    $field_slug
    ) {

    // -------------------------------------------------------------------------
    // add_single_field(
    //      $core_plugapp_dirs                                              ,
    //      $safe_dataset_slug                                              ,
    //      $safe_action                                                    ,
    //      $mysql_table_name                                               ,
    //      $fields_to_add_by_field_slug                                    ,
    //      $distinct_values_and_their_record_ids__by_field_slug__to_add    ,
    //      $field_slug
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    global $wpdb ;

    // =========================================================================
    // Get the new field definition SQL...
    // =========================================================================

    $this_column = $fields_to_add_by_field_slug[ $field_slug ] ;

    // -------------------------------------------------------------------------

    $primary_key_field_name       = ''      ;
    $unique_key_field_names       = array() ;
    $number_auto_increment_fields = 0       ;

    // -------------------------------------------------------------------------

    $column_structure_sql =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\get_column_structure_sql(
            $primary_key_field_name             ,
            $unique_key_field_names             ,
            $number_auto_increment_fields       ,
            $safe_dataset_slug                  ,
            $this_column
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $column_structure_sql ) ) {
        return $column_structure_sql[0] ;
    }

    // =========================================================================
    // Add the column to the table...
    // =========================================================================

    $sql = <<<EOT
ALTER TABLE `{$mysql_table_name}`
ADD COLUMN `{$field_slug}` {$column_structure_sql}
EOT;

    // -------------------------------------------------------------------------

    $ok = $wpdb->query( $sql ) ;
            // This function returns an integer value indicating the number of
            // rows affected/selected for SELECT, INSERT, DELETE, UPDATE, etc.
            //
            // For CREATE, ALTER, TRUNCATE and DROP SQL statements, (which
            // affect whole tables instead of specific rows) this function
            // returns TRUE on success.
            //
            // If a MySQL error is encountered, the function will return FALSE.

    // -------------------------------------------------------------------------

    if ( $ok !== TRUE ) {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM:&nbsp; MySQL error adding field ({$wpdb->last_error})
For dataset:&nbsp; {$safe_dataset_slug}
Field:&nbsp; {$field_slug}
And action:&nbsp; {$safe_action}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // =========================================================================
    // Walk over the MySQL table records - setting the new field value
    // for each one...
    // =========================================================================

    $distinct_values_and_their_record_ids =
        $distinct_values_and_their_record_ids__by_field_slug__to_add[ $field_slug ]
        ;

    // -------------------------------------------------------------------------
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
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $distinct_values_and_their_record_ids       ,
//    '$distinct_values_and_their_record_ids'
//    ) ;

    // -------------------------------------------------------------------------

    foreach (   $distinct_values_and_their_record_ids
                as
                $this_distinct_value_and_its_record_ids
        ) {

        // ---------------------------------------------------------------------

        $this_value = $this_distinct_value_and_its_record_ids['value'] ;

        // ---------------------------------------------------------------------

        $these_record_ids = $this_distinct_value_and_its_record_ids['record_ids'] ;

        // ---------------------------------------------------------------------
        // NOTE!
        // =====
        // We can't use:-
        //      $wpdb->update()
        //
        // because it doesn't support the MySQL "IN" syntax - so we can't
        // update all the record IDs in one hit.
        // ---------------------------------------------------------------------

        if ( is_string( $this_value ) ) {
            $format = '%s' ;

        } elseif ( is_int( $this_value ) ) {
            $format = '%d' ;

        } elseif ( is_float( $this_value ) ) {
            $format = '%f' ;

        } else {

            // -----------------------------------------------------------------

            $ln = __LINE__ - 4 ;

            $type = gettype( $this_value ) ;

            return <<<EOT
PROBLEM:&nbsp; Field value has unsupported PHP data type ("{$type}")
For dataset:&nbsp; {$safe_dataset_slug}
Field:&nbsp; {$field_slug}
And action:&nbsp; {$safe_action}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        if ( is_string( $this_value ) ) {

            $this_value = str_replace( '%' , '%%' , $this_value ) ;
                //  See:-
                //      "Any other % characters may cause parsing errors
                //      unless they are escaped.  All % characters inside
                //      SQL string literals, including LIKE wildcards, must
                //      be double-% escaped as %%.  All of %d, %f, and %s
                //      are to be left unquoted in the query string."
                //
                // in $wpdb->prepare()

        }

        // ---------------------------------------------------------------------

        $in = implode( ',' , $these_record_ids ) ;

        // ---------------------------------------------------------------------

        $sql = <<<EOT
UPDATE `{$mysql_table_name}`
SET `{$field_slug}` = {$format}
WHERE `id` IN ({$in})
EOT;

        // ---------------------------------------------------------------------

        $sql = $wpdb->prepare(
                    $sql            ,
                    $this_value
                    ) ;

        // ---------------------------------------------------------------------

        $number_rows_affected = $wpdb->query( $sql ) ;
            // This function returns an integer value indicating the number of
            // rows affected/selected for SELECT, INSERT, DELETE, UPDATE, etc.
            //
            // For CREATE, ALTER, TRUNCATE and DROP SQL statements, (which
            // affect whole tables instead of specific rows) this function
            // returns TRUE on success.
            //
            // If a MySQL error is encountered, the function will return FALSE.

        // ---------------------------------------------------------------------

        if ( $number_rows_affected === FALSE ) {

            $ln = __LINE__ - 2 ;

            return <<<EOT
PROBLEM:&nbsp; MySQL error adding field ({$wpdb->last_error})
For dataset:&nbsp; {$safe_dataset_slug}
Field:&nbsp; {$field_slug}
And action:&nbsp; {$safe_action}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

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
// update_single_field()
// =============================================================================

function update_single_field(
    $core_plugapp_dirs                                                  ,
    $safe_dataset_slug                                                  ,
    $safe_action                                                        ,
    $mysql_table_name                                                   ,
    $fields_to_update_by_field_slug                                     ,
    $distinct_values_and_their_record_ids__by_field_slug__to_update     ,
    $field_slug
    ) {

    // -------------------------------------------------------------------------
    // update_single_field(
    //      $core_plugapp_dirs                                                  ,
    //      $safe_dataset_slug                                                  ,
    //      $safe_action                                                        ,
    //      $mysql_table_name                                                   ,
    //      $fields_to_update_by_field_slug                                     ,
    //      $distinct_values_and_their_record_ids__by_field_slug__to_update     ,
    //      $field_slug
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    global $wpdb ;

    // =========================================================================
    // Get the new field definition SQL...
    // =========================================================================

    $this_column = $fields_to_update_by_field_slug[ $field_slug ] ;

    // -------------------------------------------------------------------------

    $primary_key_field_name       = ''      ;
    $unique_key_field_names       = array() ;
    $number_auto_increment_fields = 0       ;

    // -------------------------------------------------------------------------

    $column_structure_sql =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\get_column_structure_sql(
            $primary_key_field_name             ,
            $unique_key_field_names             ,
            $number_auto_increment_fields       ,
            $safe_dataset_slug                  ,
            $this_column
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $column_structure_sql ) ) {
        return $column_structure_sql[0] ;
    }

    // =========================================================================
    // Update the column definition...
    // =========================================================================

    $sql = <<<EOT
ALTER TABLE `{$mysql_table_name}`
MODIFY COLUMN `{$field_slug}` {$column_structure_sql}
EOT;

    // -------------------------------------------------------------------------

    $ok = $wpdb->query( $sql ) ;
            // This function returns an integer value indicating the number of
            // rows affected/selected for SELECT, INSERT, DELETE, UPDATE, etc.
            //
            // For CREATE, ALTER, TRUNCATE and DROP SQL statements, (which
            // affect whole tables instead of specific rows) this function
            // returns TRUE on success.
            //
            // If a MySQL error is encountered, the function will return FALSE.

    // -------------------------------------------------------------------------

    if ( $ok !== TRUE ) {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM:&nbsp; MySQL error updating field ({$wpdb->last_error})
For dataset:&nbsp; {$safe_dataset_slug}
Field:&nbsp; {$field_slug}
And action:&nbsp; {$safe_action}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

    }

    // =========================================================================
    // Walk over the MySQL table records - updating the field value
    // for each one...
    // =========================================================================

    // -------------------------------------------------------------------------
    //  TODO ???
    //
    //  The "distinct_values_to_update" are the OLD values in the original
    //  table column.  As yet, the "Standard Dataset Manager" doesn't support
    //  a "get_updated_field_value()" routine.
    // -------------------------------------------------------------------------

/*
    $distinct_values_and_their_record_ids =
        $distinct_values_and_their_record_ids__by_field_slug__to_update[ $field_slug ]
        ;

    // -------------------------------------------------------------------------
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
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $distinct_values_and_their_record_ids       ,
//    '$distinct_values_and_their_record_ids'
//    ) ;

    // -------------------------------------------------------------------------

    foreach (   $distinct_values_and_their_record_ids
                as
                $this_distinct_value_and_its_record_ids
        ) {

        // ---------------------------------------------------------------------

        $this_value = $this_distinct_value_and_its_record_ids['value'] ;

        // ---------------------------------------------------------------------

        $these_record_ids = $this_distinct_value_and_its_record_ids['record_ids'] ;

        // ---------------------------------------------------------------------
        // NOTE!
        // =====
        // We can't use:-
        //      $wpdb->update()
        //
        // because it doesn't support the MySQL "IN" syntax - so we can't
        // update all the record IDs in one hit.
        // ---------------------------------------------------------------------

        if ( is_string( $this_value ) ) {
            $format = '%s' ;

        } elseif ( is_int( $this_value ) ) {
            $format = '%d' ;

        } elseif ( is_float( $this_value ) ) {
            $format = '%f' ;

        } else {

            // -----------------------------------------------------------------

            $ln = __LINE__ - 4 ;

            $type = gettype( $this_value ) ;

            return <<<EOT
PROBLEM:&nbsp; Field value has unsupported PHP data type ("{$type}")
For dataset:&nbsp; {$safe_dataset_slug}
Field:&nbsp; {$field_slug}
And action:&nbsp; {$safe_action}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        if ( is_string( $this_value ) ) {

            $this_value = str_replace( '%' , '%%' , $this_value ) ;
                //  See:-
                //      "Any other % characters may cause parsing errors
                //      unless they are escaped.  All % characters inside
                //      SQL string literals, including LIKE wildcards, must
                //      be double-% escaped as %%.  All of %d, %f, and %s
                //      are to be left unquoted in the query string."
                //
                // in $wpdb->prepare()

        }

        // ---------------------------------------------------------------------

        $in = implode( ',' , $these_record_ids ) ;

        // ---------------------------------------------------------------------

        $sql = <<<EOT
UPDATE `{$mysql_table_name}`
SET `{$field_slug}` = {$format}
WHERE `id` IN ({$in})
EOT;

        // ---------------------------------------------------------------------

        $sql = $wpdb->prepare(
                    $sql            ,
                    $this_value
                    ) ;

        // ---------------------------------------------------------------------

        $number_rows_affected = $wpdb->query( $sql ) ;
            // This function returns an integer value indicating the number of
            // rows affected/selected for SELECT, INSERT, DELETE, UPDATE, etc.
            //
            // For CREATE, ALTER, TRUNCATE and DROP SQL statements, (which
            // affect whole tables instead of specific rows) this function
            // returns TRUE on success.
            //
            // If a MySQL error is encountered, the function will return FALSE.

        // ---------------------------------------------------------------------

        if ( $number_rows_affected === FALSE ) {

            $ln = __LINE__ - 2 ;

            return <<<EOT
PROBLEM:&nbsp; MySQL error updating field ({$wpdb->last_error})
For dataset:&nbsp; {$safe_dataset_slug}
Field:&nbsp; {$field_slug}
And action:&nbsp; {$safe_action}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

        }

        // ---------------------------------------------------------------------

    }
*/

    // =========================================================================
    // SUCCESS
    // =========================================================================

    return TRUE ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// remove_single_field()
// =============================================================================

function remove_single_field(
    $core_plugapp_dirs                                                  ,
    $safe_dataset_slug                                                  ,
    $safe_action                                                        ,
    $mysql_table_name                                                   ,
    $fields_to_remove_by_field_slug                                     ,
    $distinct_values_and_their_record_ids__by_field_slug__to_remove     ,
    $field_slug
    ) {

    // -------------------------------------------------------------------------
    // remove_single_field(
    //      $core_plugapp_dirs                                                  ,
    //      $safe_dataset_slug                                                  ,
    //      $safe_action                                                        ,
    //      $mysql_table_name                                                   ,
    //      $fields_to_remove_by_field_slug                                     ,
    //      $distinct_values_and_their_record_ids__by_field_slug__to_remove     ,
    //      $field_slug
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    global $wpdb ;

    // =========================================================================
    // Update the column definition...
    // =========================================================================

    $sql = <<<EOT
ALTER TABLE `{$mysql_table_name}`
DROP COLUMN `{$field_slug}`
EOT;

    // -------------------------------------------------------------------------

    $ok = $wpdb->query( $sql ) ;
            // This function returns an integer value indicating the number of
            // rows affected/selected for SELECT, INSERT, DELETE, UPDATE, etc.
            //
            // For CREATE, ALTER, TRUNCATE and DROP SQL statements, (which
            // affect whole tables instead of specific rows) this function
            // returns TRUE on success.
            //
            // If a MySQL error is encountered, the function will return FALSE.

    // -------------------------------------------------------------------------

    if ( $ok !== TRUE ) {

        $ln = __LINE__ - 2 ;

        return <<<EOT
PROBLEM:&nbsp; MySQL error removing field ({$wpdb->last_error})
For dataset:&nbsp; {$safe_dataset_slug}
Field:&nbsp; {$field_slug}
And action:&nbsp; {$safe_action}
Detected in:&nbsp; \\{$ns}\\{$fn}() near line {$ln}
EOT;

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

