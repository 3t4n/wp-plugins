<?php

// *****************************************************************************
// DATASET MANAGER / MYSQL-SUPPORT-4-MANAGE-DATASET.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport ;

// =============================================================================
// load_table_records()
// =============================================================================

function load_table_records(
    $core_plugapp_dirs                          ,
    $all_application_dataset_definitions        ,
    $dataset_slug                               ,
    $question_front_end
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\
    // load_table_records(
    //      $core_plugapp_dirs                          ,
    //      $all_application_dataset_definitions        ,
    //      $dataset_slug                               ,
    //      $question_front_end
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the records in the MySQL table associated with the specified
    // dataset.
    //
    // By default, loads ALL the records in the dataset's MySQL table.
    //
    // But if a:-
    //      <dataset_definition>['mysql_overrides']['load_all_records_function']
    //
    // was specified, will call that to do the loading (which allows you to load
    // whatever records you want - those for the currently logged-in (WordPress)
    // user, for example).
    //
    // RETURNS
    //      On SUCCESS
    //          ARRAY $table_records
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

    $safe_dataset_slug = htmlentities( $dataset_slug ) ;

    // =========================================================================
    // Get $selected_datasets_dmdd...
    // =========================================================================

    if ( ! array_key_exists( $dataset_slug , $all_application_dataset_definitions ) ) {

        return <<<EOT
PROBLEM:&nbsp; Dataset definition not found
Dataset:&nbsp; {$safe_dataset_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    $selected_datasets_dmdd = $all_application_dataset_definitions[ $dataset_slug ] ;

    // =========================================================================
    // Get the "application"...
    // =========================================================================

/*
    if (    ! array_key_exists( 'application' , $_GET )
            ||
            trim( $_GET['application'] ) === ''
        ) {

        return <<<EOT
PROBLEM:&nbsp; No "application"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    $target_apps_apps_dir_relative_path = $_GET['application'] ;
*/

    // =========================================================================
    // Auto-Create/Validate the specified MySQL table,,,
    // =========================================================================

    require_once( $core_plugapp_dirs['dataset_manager_includes_dir'] . '/mysql-support.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\
    // auto_create_or_validate_mysql_table(
    //      $core_plugapp_dirs                      ,
    //      $question_front_end                     ,
    //  //  $target_apps_apps_dir_relative_path     ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_slug
    //      )
    // - - - - - - - - - - - - - - - - -
    // Auto-creates the dataset's MySQL table (if that table doesn't exist yet).
    //
    // Or validates the table if it does exist.  Where, by validate, we mean
    // check that the table on disk is the same as defined in the dataset
    // definition.  In other words, if the dataset definition has been updated
    // (but the table on disk hasn't), complain!
    //
    // $target_apps_apps_dir_relative_path is like (eg):-
    //      o   "teaser-maker"
    //      o   "basepress-users/reporting-module"
    //      o   etc.
    //
    // RETURNS
    //      On SUCCESS
    //          TRUE if the dataset has a corresponding MySQL table - and either
    //          that table already existed - or was created OK.
    //
    //      On FAILURE
    //          One of:-
    //          --  $error_message STRING
    //                  If some error ocurred while trying to create or
    //                  validate the table
    //          --  ARRAY( $differences_report STRING )
    //                  If the table DIDN'T validate OK.  In other words, the
    //                  dataset definition has been edited - and no longer
    //                  matches the existing MySQL table stored on disk.
    // -------------------------------------------------------------------------

    $result =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\auto_create_or_validate_mysql_table(
            $core_plugapp_dirs                      ,
            $question_front_end                     ,
//          $target_apps_apps_dir_relative_path     ,
            $selected_datasets_dmdd                 ,
            $dataset_slug
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return $result ;
    }

    // -------------------------------------------------------------------------

    if ( is_array( $result ) ) {
        return str_replace( array( "\r" , "\n" ) , '' , $result[0] ) ;
    }

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
    // Get the specified dataset's DATASET MANAGER DATASET DEFINITION...
    // =========================================================================

/*
    if ( ! array_key_exists( $dataset_slug , $all_application_dataset_definitions ) ) {

        return <<<EOT
PROBLEM:&nbsp; Unrecognised/unsupported dataset
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    $selected_datasets_dmdd = $all_application_dataset_definitions[ $dataset_slug ] ;
*/

    // =========================================================================
    // Does the dataset have a custom (MySQL) "load_all_records" function ?
    //
    // If so, call that (to get the table records)...
    // =========================================================================

    if (    array_key_exists( 'mysql_overrides' , $selected_datasets_dmdd )
            &&
            is_array( $selected_datasets_dmdd['mysql_overrides'] )
            &&
            array_key_exists( 'load_all_records_function' , $selected_datasets_dmdd['mysql_overrides'] )
            &&
            is_string( $selected_datasets_dmdd['mysql_overrides']['load_all_records_function'] )
            &&
            trim( $selected_datasets_dmdd['mysql_overrides']['load_all_records_function'] ) !== ''
        ) {

        // ---------------------------------------------------------------------

        if ( ! function_exists( $selected_datasets_dmdd['mysql_overrides']['load_all_records_function'] ) ) {

            return <<<EOT
PROBLEM:&nbsp; Bad "mysql_overrides" + "load_all_records_function" (function not found)
For dataset:&nbsp; {$safe_dataset_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // -------------------------------------------------------------------------
        // \<some_namespace>\<custom_load_all_records_function>(
        //      $core_plugapp_dirs                          ,
        //      $all_application_dataset_definitions        ,
        //      $dataset_slug                               ,
        //      $question_front_end                         ,
        //      $safe_dataset_slug                          ,
        //      $mysql_table_name
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - - - -
        // Returns the records in the MySQL table associated with the specified
        // dataset.
        //
        // You can use this custom function to override the default
        // "load all records" function (which default function loads ALL the
        // records in the (dataset's) MySQL table.
        //
        // Maybe you want to load only those records that belong to the logged-in
        // (WordPress) user, for example.
        //
        // RETURNS
        //      On SUCCESS
        //          ARRAY $table_records
        //
        //      On FAILURE
        //          $error_message STRING
        // -------------------------------------------------------------------------

        return $selected_datasets_dmdd['mysql_overrides']['load_all_records_function'](
                    $core_plugapp_dirs                          ,
                    $all_application_dataset_definitions        ,
                    $dataset_slug                               ,
                    $question_front_end                         ,
                    $safe_dataset_slug                          ,
                    $mysql_table_name
                    ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Load all the records...
    // =========================================================================

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
SELECT * FROM `{$mysql_table_name}`
EOT;

    // -------------------------------------------------------------------------

    return \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\get_zero_or_more_records(
                $sql
                ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

