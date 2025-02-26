<?php

// *****************************************************************************
// DATASET MANAGER / MYSQL-SUPPORT.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport ;

// =============================================================================
// auto_create_or_validate__return_table_name_for__datasets_mysql_table(
// =============================================================================

function auto_create_or_validate__return_table_name_for__datasets_mysql_table(
    $core_plugapp_dirs                                              ,
    $question_front_end                                             ,
    $selected_datasets_dmdd_or_target_apps_apps_dir_relative_path   ,
    $dataset_slug
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\
    // auto_create_or_validate__return_table_name_for__datasets_mysql_table(
    //      $core_plugapp_dirs                                              ,
    //      $question_front_end                                             ,
    //      $selected_datasets_dmdd_or_target_apps_apps_dir_relative_path   ,
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
    // $selected_datasets_dmdd_or_target_apps_apps_dir_relative_path should
    // be either:-
    //      $selected_datasets_dmdd = ARRAY(...)
    //
    // or:-
    //      $target_apps_apps_dir_relative_path STRING like (eg):-
    //      o   "teaser-maker"
    //      o   "basepress-users/reporting-module"
    //      o   etc.
    //
    // If the auto-creation/validation is successful, returns the table's
    // MySQL able name.
    //
    // RETURNS
    //      On SUCCESS
    //          $mysql_table_name STRING
    //
    //      On FAILURE
    //          ARRAY
    //              $error_message STRING
    //              )
    // -------------------------------------------------------------------------

    // =========================================================================
    // Auto-Create/Validate the specified dataset's MySQL table,,,
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\
    // auto_create_or_validate_mysql_table(
    //      $core_plugapp_dirs                                              ,
    //      $question_front_end                                             ,
    //      $selected_datasets_dmdd_or_target_apps_apps_dir_relative_path   ,
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
    // $selected_datasets_dmdd_or_target_apps_apps_dir_relative_path should
    // be either:-
    //      $selected_datasets_dmdd = ARRAY(...)
    //
    // or:-
    //      $target_apps_apps_dir_relative_path STRING like (eg):-
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
        auto_create_or_validate_mysql_table(
            $core_plugapp_dirs                                              ,
            $question_front_end                                             ,
            $selected_datasets_dmdd_or_target_apps_apps_dir_relative_path   ,
            $dataset_slug
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return array( $result ) ;
    }

    // -------------------------------------------------------------------------

    if ( is_array( $result ) ) {
        return array( str_replace( array( "\r" , "\n" ) , '' , $result[0] ) ) ;
    }

    // =========================================================================
    // Get the MySQL table name (for the dataset's MySQL table)...
    // =========================================================================

//  require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/basepress-mysql.php' ) ;

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
    // SUCCESS!
    // =========================================================================

    return $mysql_table_name ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// auto_create_or_validate_mysql_table()
// =============================================================================

function auto_create_or_validate_mysql_table(
    $core_plugapp_dirs                                              ,
    $question_front_end                                             ,
    $selected_datasets_dmdd_or_target_apps_apps_dir_relative_path   ,
    $dataset_slug
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\
    // auto_create_or_validate_mysql_table(
    //      $core_plugapp_dirs                                              ,
    //      $question_front_end                                             ,
    //      $selected_datasets_dmdd_or_target_apps_apps_dir_relative_path   ,
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
    // $selected_datasets_dmdd_or_target_apps_apps_dir_relative_path should
    // be either:-
    //      $selected_datasets_dmdd = ARRAY(...)
    //
    // or:-
    //      $target_apps_apps_dir_relative_path STRING like (eg):-
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

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\debug_print_backtrace() ;

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Load the DATASET DEFINITIONS (if necessary)...
    //
    // We need these (for the dataset/table concerned), irrespective of
    // whether we're going to auto-create or validate that table.
    // =========================================================================

    if ( is_string( $selected_datasets_dmdd_or_target_apps_apps_dir_relative_path ) ) {

        // ---------------------------------------------------------------------

        require_once( $core_plugapp_dirs['dataset_manager_includes_dir'] . '/common.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\
        // load_dataset_definitions(
        //      $core_plugapp_dirs                      ,
        //      $target_apps_apps_dir_relative_path     ,
        //      $question_front_end
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // $target_apps_apps_dir_relative_path is like (eg):-
        //      o   "teaser-maker"
        //      o   "basepress-users/reporting-module"
        //      o   etc.
        //
        // RETURNS
        //      o   On SUCCESS
        //              ARRAY(
        //                  $app_defs_directory_tree                        ,
        //                  $applications_dataset_and_view_definitions_etc  ,
        //                  $all_application_dataset_definitions
        //                  )
        //
        //      o   On FAILURE
        //              $error_message STRING
        // -------------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\load_dataset_definitions(
                $core_plugapp_dirs                                              ,
                $selected_datasets_dmdd_or_target_apps_apps_dir_relative_path   ,
                $question_front_end
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return $result ;
        }

        // ---------------------------------------------------------------------

        list(
            $app_defs_directory_tree                        ,
            $applications_dataset_and_view_definitions_etc  ,
            $all_application_dataset_definitions
            ) = $result ;

        // =====================================================================
        // Is the specified dataset defined ?
        // =====================================================================

        if ( ! array_key_exists( $dataset_slug , $all_application_dataset_definitions ) ) {

            $safe_dataset_slug = htmlentities( $dataset_slug ) ;

            return <<<EOT
PROBLEM:&nbsp; Unrecognised/unsupported dataset ("{$safe_dataset_slug}")
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // =====================================================================
        // Get the specified dataset's definition...
        // =====================================================================

        $selected_datasets_dmdd =
            $all_application_dataset_definitions[ $dataset_slug ]
            ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        $selected_datasets_dmdd =
            $selected_datasets_dmdd_or_target_apps_apps_dir_relative_path
            ;

        // ---------------------------------------------------------------------

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
    // Create the dataset's MySQL table definition (from the dataset
    // definition)...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\
    // get_corresponding_mysql_table_definition(
    //      $core_plugapp_dirs                              ,
    //      $question_front_end                             ,
    //  //  $target_apps_apps_dir_relative_path             ,
    //  //  $all_application_dataset_definitions            ,
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
        get_corresponding_mysql_table_definition(
            $core_plugapp_dirs                              ,
            $question_front_end                             ,
//          $target_apps_apps_dir_relative_path             ,
//          $all_application_dataset_definitions            ,
            $selected_datasets_dmdd                         ,
            $dataset_slug                                   ,
            $mysql_table_name
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $corresponding_mysql_table_definition ) ) {
        return $corresponding_mysql_table_definition ;
    }

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

        return auto_create_mysql_table(
                    $core_plugapp_dirs                          ,
                    $question_front_end                         ,
                    $dataset_slug                               ,
                    $mysql_table_name                           ,
                    $corresponding_mysql_table_definition
                    ) ;

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
        get_existing_mysql_table_definition(
            $core_plugapp_dirs          ,
            $question_front_end         ,
            $mysql_table_name
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $existing_table_definition ) ) {
        return $existing_table_definition ;
    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr(
//    $existing_table_definition      ,
//    '$existing_table_definition'
//    ) ;

    // =========================================================================
    // Validate the existing table.
    //
    // In other words, compare the existing MySQL table with the table that
    // corresponds to the current dataset definition.
    //
    // And if they differ, complain!
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\
    // question_mysql_tables_match(
    //      $core_plugapp_dirs                      ,
    //      $question_front_end                     ,
    //      $dataset_slug                           ,
    //      $mysql_table_name                       ,
    //      $corresponding_mysql_table_definition   ,
    //      $existing_mysql_table_definition        ,
    //      $question_report                        ,
    //      $question_show_fixes
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          o   TRUE if the table definitions are the same
    //          o   If the table definitions are different:-
    //              --  If $question_report === TRUE
    //                  $report STRING  (which shows the differences between the
    //                                  two table definitions).
    //              --  If $question_report === FALSE
    //                  FALSE
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    $question_report = TRUE ;

    $question_show_fixes = FALSE ;

    // -------------------------------------------------------------------------

    $tables_match =
        question_mysql_tables_match(
            $core_plugapp_dirs                      ,
            $question_front_end                     ,
            $dataset_slug                           ,
            $mysql_table_name                       ,
            $corresponding_mysql_table_definition   ,
            $existing_table_definition              ,
            $question_report                        ,
            $question_show_fixes
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $tables_match ) ) {
        return $tables_match['0'] ;
    }

    // -------------------------------------------------------------------------

    if ( $tables_match !== TRUE ) {

        // ---------------------------------------------------------------------

        if ( $question_report ) {

            // -----------------------------------------------------------------

            $safe_dataset_title =
                \htmlentities(
                    $selected_datasets_dmdd['dataset_title_plural']
                    ) ;

            // -----------------------------------------------------------------

            require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/wordpress-user-support.php' ) ;

            // -------------------------------------------------------------------------
            // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wpUserSupport\
            // is_administrator()
            // - - - - - - - - -
            // RETURNS:-
            //      o   TRUE if there's a currently logged-in WordPress user - AND
            //          that user is an Administrator (= has the "manage_options"
            //          capability.
            //      o   FALSE otherwise.
            // -------------------------------------------------------------------------

            if ( \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wpUserSupport\is_administrator() ) {   //  !!!!

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\debug_print_backtrace() ;

                $differences = <<<EOT
<p>The <b>differences are</b>:-</p>
<div style="padding-left:3em">{$tables_match}</div>
EOT;

            } else {

                $differences = '' ;

            }

            // -----------------------------------------------------------------

            $msg = <<<EOT
<div style="max-width:480px">

    <p style="color:#AA0000">PROBLEM:&nbsp; <b>Can't Continue!</b></p>

    <p style="color:#AA0000">The (Ad Swapper) "{$safe_dataset_title}" dataset
    has been changed (and no longer matches the corresponding data table on
    disk).</p>

</div>

<div style="width:98%">{$differences}</div>

</br />
</br />
EOT;

            // -----------------------------------------------------------------

            return array( $msg ) ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        return array( 'TABLE MISMATCH' ) ;

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
// get_corresponding_mysql_table_definition()
// =============================================================================

function get_corresponding_mysql_table_definition(
    $core_plugapp_dirs                              ,
    $question_front_end                             ,
//  $target_apps_apps_dir_relative_path             ,
//  $all_application_dataset_definitions            ,
    $selected_datasets_dmdd                          ,
    $dataset_slug                                   ,
    $mysql_table_name
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\
    // get_corresponding_mysql_table_definition(
    //      $core_plugapp_dirs                              ,
    //      $question_front_end                             ,
    //  //  $target_apps_apps_dir_relative_path             ,
    //  //  $all_application_dataset_definitions            ,
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

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $selected_datasets_dmdd = Array(
    //
    //          [dataset_slug]              => ad_swapper_central_users
    //          [dataset_name_singular]     => ad_swapper_central_user
    //          [dataset_name_plural]       => ad_swapper_central_users
    //          [dataset_title_singular]    => User
    //          [dataset_title_plural]      => Users
    //
    //          [basepress_dataset_handle]  => Array(
    //              [nice_name]  => adSwapperCentral_byFernTec_users
    //              [unique_key] => 7835e7cf-5077-41...-16d3b19bc5
    //              [version]    => 0.1
    //              )
    //
    //          [dataset_records_table]     => Array(
    //              [column_defs]       => Array(
    //                  [0] => Array(
    //                              [base_slug]         => wp_user_id
    //                              [label]             => WordPress User ID
    //                              [question_sortable] => 1
    //                              [raw_value_from]    => Array(
    //                                                          [method]   => array-storage-field-slug
    //                                                          [instance] => wp_user_id
    //                                                          )
    //                              [display_treatments] =>
    //                              )
    //                  ...
    //                  )
    //              )
    //              [rows_per_page]                      => 10
    //              [default_data_field_slug_to_orderby] => wp_user_id
    //              [default_order]                      => asc
    //              [buttons]                            => Array(
    //                                                          [0] => Array(
    //                                                                      [type] => add_record
    //                                                                      )
    //                                                          )
    //              [record_actions]                    => Array(
    //                  [0] => Array(
    //                              [type]       => standard
    //                              [slug]       => edit
    //                              [link_title] => edit
    //                              )
    //                  ...
    //                  )
    //              [action_separator]                  =>
    //              )
    //
    //          [zebra_forms] => Array(
    //              [default] => Array(
    //                  [form_specs] => Array(
    //                                      [name]                  => add_edit_ad_swapper_user
    //                                      [method]                => POST
    //                                      [action]                =>
    //                                      [attributes]            => Array()
    //                                      [clientside_validation] => 1
    //                                      )
    //                  [field_specs] => Array(
    //                      [0] => Array(
    //                              [form_field_name]    => wp_user_id
    //                              [zebra_control_type] => text
    //                              [label]              => WordPress User ID
    //                              [attributes]         => Array(
    //                                                          [readonly] => readonly
    //                                                          )
    //                              [rules]              => Array(
    //                                  [required] => Array(
    //                                                  [0] => error
    //                                                  [1] => Field is required
    //                                                  )
    //                                  )
    //                              )
    //                      ...
    //                      )
    //                  [focus_field_slug] => wp_user_id
    //                  )
    //
    //              )
    //
    //          [array_storage_record_structure] => Array(
    //              [0] => Array(
    //                          [slug]                      => created_server_datetime_utc
    //                          [array_storage_value_from]  => Array(
    //                              [add]   => Array(
    //                                              [method] => created-server-datetime-utc
    //                                              )
    //                              [edit]  => Array(
    //                                              [method] => dont-change
    //                                              )
    //                              )
    //
    //                          [constraints]               => Array(
    //                              [0] => Array(
    //                                          [method] => unix-timestamp
    //                                          )
    //                              )
    //                          [mysql_column_attributes]   => Array(
    //                              'Field'     =>  'id'                        ,
    //                              'Type'      =>  'BIGINT(20) UNSIGNED'       ,
    //                              'Null'      =>  'NO'                        ,
    //                              'Key'       =>  'PRI'                       ,
    //                              'Default'   =>  ''                          ,
    //                              'Extra'     =>  'AUTO_INCREMENT'
    //                              )
    //                          )
    //              ...
    //              [2] => Array(
    //                          [slug]                      => key
    //                          [array_storage_value_from]  => Array(
    //                              [add]   => Array(
    //                                              [method] => unique-key
    //                                              )
    //                              [edit]  => Array(
    //                                              [method] => dont-change
    //                                              )
    //                              )
    //                          [constraints] => Array(
    //                              [0] => Array(
    //                                          [method] => unique-key
    //                                          )
    //                              )
    //                          )
    //              [3] => Array(
    //                          [slug]                      => wp_user_id
    //                          [array_storage_value_from]  => Array(
    //                              [add-edit]  => Array(
    //                                                  [method]    => post
    //                                                  [instance]  => wp_user_id
    //                                                  )
    //                              )
    //                          [constraints]               => Array()
    //                          )
    //              ...
    //              )
    //
    //          [array_storage_key_field_slug]  => key
    //          [custom_actions]                => Array()
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $selected_datasets_dmdd , '$selected_datasets_dmdd' ) ;

    // =========================================================================
    // OVERVIEW!
    // =========
    // A dataset is assumed to be have the following fields:-
    //
    //      o   created_server_datetime_utc
    //      o   last_modified_server_datetime_utc
    //      o   key
    //      o   ...other fields as required...
    //
    // We convert this to a MySQL table as follows:-
    //
    //      o   Add an UNSIGNED BIGINT "id" field (to replace the dataset's
    //          "key" field).
    //      o   Keep the:-
    //              --  created_server_datetime_utc, and;
    //              --  last_modified_server_datetime_utc
    //          fields.
    //      o   Drop the "key" field.
    //      o   Keep all the remaining fields.
    //
    // The table's fields are the same as the array storage fields.
    //
    // Where by default, all dataset fields become MySQL TEXT fields (that
    // default to the empty string).  Though since MySQL text fields default to
    // the ermpty string anyway, there's no need to explicitly set this (so long
    // as we don't give the field the NULL property).
    // =========================================================================

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $safe_dataset_slug = htmlentities( $dataset_slug ) ;

    // =========================================================================
    // Do some error checking - to make sure that the dataset fields are what
    // we expect...
    // =========================================================================

    $dataset_field_names = array() ;

    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\debug_print_backtrace() ;

    foreach ( $selected_datasets_dmdd['array_storage_record_structure'] as $this_array_storage_field ) {
        $dataset_field_names[] = $this_array_storage_field['slug'] ;
    }

    // -------------------------------------------------------------------------
    // created_server_datetime_utc ?
    // -------------------------------------------------------------------------

    if ( ! in_array( 'created_server_datetime_utc' , $dataset_field_names , TRUE ) ) {

        return <<<EOT
PROBLEM:&nbsp; No "created_server_datetime_utc" field
In dataset:&nbsp; {$safe_dataset_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------
    // last_modified_server_datetime_utc ?
    // -------------------------------------------------------------------------

    if ( ! in_array( 'last_modified_server_datetime_utc' , $dataset_field_names , TRUE ) ) {

        return <<<EOT
PROBLEM:&nbsp; No "last_modified_server_datetime_utc" field
In dataset:&nbsp; {$safe_dataset_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------
    // array_storage_key_field_slug ?
    // -------------------------------------------------------------------------

    if ( ! array_key_exists( 'array_storage_key_field_slug' , $selected_datasets_dmdd ) ) {

        return <<<EOT
PROBLEM:&nbsp; No "array_storage_key_field_slug"
For dataset:&nbsp; {$safe_dataset_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------

    if (    ! is_string( $selected_datasets_dmdd['array_storage_key_field_slug'] )
            ||
            $selected_datasets_dmdd['array_storage_key_field_slug'] !== 'key'
        ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "array_storage_key_field_slug" ("key" expected)
In dataset:&nbsp; {$safe_dataset_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------
    // key ?
    // -------------------------------------------------------------------------

    if ( ! in_array( 'key' , $dataset_field_names , TRUE ) ) {

        return <<<EOT
PROBLEM:&nbsp; No "key" field
In dataset:&nbsp; {$safe_dataset_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -------------------------------------------------------------------------
    // id ?
    // -------------------------------------------------------------------------

    if (    in_array( 'id' , $dataset_field_names , TRUE )
            ||
            in_array( 'ID' , $dataset_field_names , TRUE )
            ||
            in_array( 'Id' , $dataset_field_names , TRUE )
            ||
            in_array( 'iD' , $dataset_field_names , TRUE )
        ) {

        return <<<EOT
PROBLEM:&nbsp; Unexpected "id" field
In dataset:&nbsp; {$safe_dataset_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $dataset_field_names , '$dataset_field_names' ) ;

    // =========================================================================
    // OK; let's create the table columns...
    // =========================================================================

    // -------------------------------------------------------------------------
    // id
    // created_server_datetime_utc
    // last_modified_server_datetime_utc
    // -------------------------------------------------------------------------

    //      [Field]     => ID
    //      [Type]      => bigint(20) unsigned
    //      [Null]      => NO
    //      [Key]       => PRI
    //      [Default]   =>
    //      [Extra]     => auto_increment

    //  NOTES!
    //  ======
    //  1.  If neither NULL nor NOT NULL is specified, the column is treated as
    //      though NULL had been specified.

    // -------------------------------------------------------------------------

//  $mysql_date_now = '"' . date('Y-m-d H:i:s') . '"' ;

    // -------------------------------------------------------------------------

    $table_columns = array(
                        array(
                            'Field'     =>  'id'                        ,
                            'Type'      =>  'BIGINT(20) UNSIGNED'       ,
                            'Null'      =>  'NO'                        ,
                            'Key'       =>  'PRI'                       ,
                            'Default'   =>  ''                          ,
                            'Extra'     =>  'AUTO_INCREMENT'
                            )   ,
                        //  ----------------------------------------------------
                        //  NOTE!
                        //  =====
                        //  We really want two fields:-
                        //      created_server_datetime_utc, and;
                        //      last-modified_server_datetime_utc
                        //
                        //  that MySQL:-
                        //      o   Sets automatically (as records
                        //          are inserted and deleted),
                        //      o   To the appropriate Unix Timestamp.
                        //
                        //  BUT MySQL doesn't support this yet (though
                        //  it ***may*** do with later versions).
                        //
                        //  ---
                        //
                        //  So we FIRST create the:
                        //      created_server_datetime, and;
                        //      last-modified_server_datetime
                        //
                        //  fields - which do the best we can with
                        //  MySQL's DATETIME/TIMESTAMP support.  But which
                        //  require you use:-
                        //      UNIX_TIMESTAMP( `created_server_datetime` )
                        //      UNIX_TIMESTAMP( `last-modified_server_datetime` )
                        //
                        //  (on read), to get the required Unix Timestamps.
                        //
                        //  ---
                        //
                        //  Then we create the:-
                        //      created_server_datetime_utc, and;
                        //      last-modified_server_datetime_utc
                        //
                        //  which require PHP to manually set these variables
                        //  when adding and updating records.
                        //  ----------------------------------------------------
                        array(
                            'Field'     =>  'created_server_datetime'           ,
                            'Type'      =>  'DATETIME'                          ,
                            'Null'      =>  'NO'                                ,
                            'Key'       =>  ''                                  ,
                            'Default'   =>  '"0000-00-00 00:00:00"'             ,
                            'Extra'     =>  ''
                            )   ,
                        array(
                            'Field'     =>  'last_modified_server_datetime'     ,
                            'Type'      =>  'TIMESTAMP'                         ,
                            'Null'      =>  'NO'                                ,
                            'Key'       =>  ''                                  ,
                            'Default'   =>  'CURRENT_TIMESTAMP'                 ,
                            'Extra'     =>  'ON UPDATE CURRENT_TIMESTAMP'
                            )   ,
                        array(
                            'Field'     =>  'created_server_datetime_utc'       ,
                            'Type'      =>  'INT(10) UNSIGNED'                  ,
                            'Null'      =>  'NO'                                ,
                            'Key'       =>  ''                                  ,
                            'Default'   =>  '0'                                 ,
                            'Extra'     =>  ''
                            )   ,
                        array(
                            'Field'     =>  'last_modified_server_datetime_utc'     ,
                            'Type'      =>  'INT(10) UNSIGNED'                      ,
                            'Null'      =>  'NO'                                    ,
                            'Key'       =>  ''                                      ,
                            'Default'   =>  '0'                                     ,
                            'Extra'     =>  ''
                            )
                        ) ;

    // -------------------------------------------------------------------------

    $field_names_to_ignore = array(
        'created_server_datetime_utc'           ,
        'last_modified_server_datetime_utc'     ,
        'key'
        ) ;

    // -------------------------------------------------------------------------

    $key_lengths_by_field_name = array() ;

    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $selected_datasets_dmdd['array_storage_record_structure'] , '$selected_datasets_dmdd[\'array_storage_record_structure\']' ) ;

    foreach ( $selected_datasets_dmdd['array_storage_record_structure'] as $this_key => $this_array_storage_field ) {

        // ---------------------------------------------------------------------

        if ( $this_key === 'checked_defaulted_ok' ) {
            continue ;
        }

        // ---------------------------------------------------------------------

        if ( in_array( $this_array_storage_field['slug'] , $field_names_to_ignore , TRUE ) ) {
            continue ;
        }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $this_array_storage_field , '$this_array_storage_field' ) ;

        // ---------------------------------------------------------------------

        $safe_field_slug = htmlentities( $this_array_storage_field['slug'] ) ;

        // ---------------------------------------------------------------------
        // Here we might have (eg):-
        //
        //      $this_array_storage_field['mysql_column_attributes'] = Array(
        //          'Field'     =>  'id'                        ,
        //          'Type'      =>  'BIGINT(20) UNSIGNED'       ,
        //          'Null'      =>  'NO'                        ,
        //          'Key'       =>  'PRI'                       ,
        //          'Default'   =>  ''                          ,
        //          'Extra'     =>  'AUTO_INCREMENT'
        //          )
        //
        // Though by default:-
        //      $this_array_storage_field['mysql_column_attributes']
        //
        // doesn't exist.  And defaults as follows:-
        //      $this_array_storage_field['mysql_column_attributes'] - array(
        //          'Field'     =>  ''                          ,
        //          'Type'      =>  'TEXT'                      ,
        //          'Null'      =>  'NO'                        ,
        //          'Key'       =>  ''                          ,
        //          'Default'   =>  '""'                        ,
        //          'Extra'     =>  ''
        //          )
        //
        // NOTES!
        // ======
        //
        // 'Field'
        //      Should normally NOT be specified or set to NULL.  Set it to
        //      some MySQL column name if you want to override the array
        //      storage field's "slug".
        //
        // 'Type'
        //      Defaults to TEXT.  But any valid MySQL data type can be
        //      specified (INT, BIGINT, DATETIME, etc).  If the INT or BIGINT
        //      is to be UNSIGNED, specify it thus:-
        //          INT UNSIGNED
        //          BIGINT UNSIGNED
        //
        // 'Null'
        //      'YES', 'NO' or the empty string ('').
        //
        // 'Key'
        //      'PRI', 'UNI' or the empty string (= none)
        //
        // 'Default'
        //      Eg:-
        //      o   0                       (= INI/BIGINT 0)
        //      o   "hello world"           (= string "Hello World"
        //      o   'hello world'           (ditto)
        //      o   "0000-00-00 00:00:00"   (= MySQL DATETIME or TIMESTAMP)
        //      o   '2014-05-14 16:03:05"   (ditto)
        //      o   'NOW()'                 (= MySQL NOW() function)
        //      o   etc...
        //
        // 'Extra'
        //      Eg:-
        //      o   'AUTO_INCREMENT'
        //      o   'ON UPDATE CURRENT TIMESTAMP'
        //      o   etc...
        // ---------------------------------------------------------------------

        $default_mysql_column_attributes = array(
            'Field'     =>  $this_array_storage_field['slug']   ,
            'Type'      =>  'TEXT'                              ,
            'Null'      =>  'NO'                                ,
            'Key'       =>  ''                                  ,
            'Default'   =>  ''                                  ,
            'Extra'     =>  ''
            ) ;

        // ---------------------------------------------------------------------

        if ( array_key_exists( 'mysql_column_attributes' , $this_array_storage_field ) ) {

            // -----------------------------------------------------------------

            if ( $this_array_storage_field['mysql_column_attributes'] === NULL ) {

                // -------------------------------------------------------------

                $this_array_storage_field['mysql_column_attributes'] =
                    $default_mysql_column_attributes
                    ;

                // -------------------------------------------------------------

            } else {

                // -------------------------------------------------------------

                if ( ! is_array( $this_array_storage_field['mysql_column_attributes'] ) ) {

                    return <<<EOT
PROBLEM:&nbsp; Bad "mysql_column_attributes" (NULL or possibly empty array expected)
For array storage field:&nbsp; {$safe_field_slug}
Of dataset:&nbsp; {$safe_dataset_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // -------------------------------------------------------------

                foreach ( $default_mysql_column_attributes as
                                $mysql_column_attribute_name => $default_mysql_column_attribute_value
                                ) {

                    // ---------------------------------------------------------

                    if (    ! array_key_exists(
                                $mysql_column_attribute_name                            ,
                                $this_array_storage_field['mysql_column_attributes']
                                )
                            ||
                            $this_array_storage_field['mysql_column_attributes'][
                                 $mysql_column_attribute_name
                                 ] === NULL
                        ) {

                        $this_array_storage_field['mysql_column_attributes'][
                            $mysql_column_attribute_name
                            ] = $default_mysql_column_attribute_value ;

                    }

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        } else {

            // -----------------------------------------------------------------

            $this_array_storage_field['mysql_column_attributes'] =
                $default_mysql_column_attributes
                ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $this_array_storage_field['mysql_column_attributes'] = array(
        //          'Field'     =>  'xxx'       ,
        //          'Type'      =>  'xxx'       ,
        //          'Null'      =>  'xxx'       ,
        //          'Key'       =>  'xxx'       ,
        //          'Default'   =>  'xxx'       ,
        //          'Extra'     =>  'xxx'
        //          )
        //
        // ---------------------------------------------------------------------

        $table_columns[] = array(
            'Field'     =>  $this_array_storage_field['mysql_column_attributes']['Field']       ,
            'Type'      =>  $this_array_storage_field['mysql_column_attributes']['Type']        ,
            'Null'      =>  $this_array_storage_field['mysql_column_attributes']['Null']        ,
            'Key'       =>  $this_array_storage_field['mysql_column_attributes']['Key']         ,
            'Default'   =>  $this_array_storage_field['mysql_column_attributes']['Default']     ,
            'Extra'     =>  $this_array_storage_field['mysql_column_attributes']['Extra']
            ) ;

        // ---------------------------------------------------------------------

        if (    array_key_exists( 'mysql_column_attribute_extras' , $this_array_storage_field )
                &&
                is_array( $this_array_storage_field['mysql_column_attribute_extras'] )
                &&
                array_key_exists( 'max_key_length' , $this_array_storage_field['mysql_column_attribute_extras'] )
                &&
                trim( $this_array_storage_field['mysql_column_attribute_extras']['max_key_length'] ) !== ''
                &&
                \ctype_digit( (string) $this_array_storage_field['mysql_column_attribute_extras']['max_key_length'] )
            ) {

            $key_lengths_by_field_name[ $this_array_storage_field['mysql_column_attributes']['Field'] ] =
                $this_array_storage_field['mysql_column_attribute_extras']['max_key_length']
                ;

        }

        // ---------------------------------------------------------------------

    }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $table_columns , '$table_columns' ) ;

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    $corresponding_mysql_table_definition = array(
        'columns'                   =>  $table_columns              ,
        'key_lengths_by_field_name' =>  $key_lengths_by_field_name
        ) ;

    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $table_columns , '$table_columns' ) ;

    return $corresponding_mysql_table_definition ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_existing_mysql_table_definition()
// =============================================================================

function get_existing_mysql_table_definition(
    $core_plugapp_dirs          ,
    $question_front_end         ,
    $mysql_table_name
    ) {

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

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $safe_table_name = htmlentities( $mysql_table_name ) ;

    // =========================================================================
    // Perform the SHOW COLUMNS query...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\
    // get_zero_or_more_records(
    //      $sql
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // NOTE!  The INPUT $sql should NOT be escaped.
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

    // -------------------------------------------------------------------------
    // SHOW [FULL] COLUMNS {FROM | IN} tbl_name [{FROM | IN} db_name]
    //      [LIKE 'pattern' | WHERE expr]
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // "SHOW COLUMNS" gives you (eg):-
    //
    //      [Field]     => ID
    //      [Type]      => bigint(20) unsigned
    //      [Null]      => NO
    //      [Key]       => PRI
    //      [Default]   =>
    //      [Extra]     => auto_increment
    //
    // Whereas "SHOW FULL COLUMNS" gives you (eg):-
    //
    //      [Field]      => ID
    //      [Type]       => bigint(20) unsigned
    //      [Null]       => NO
    //      [Key]        => PRI
    //      [Default]    =>
    //      [Extra]      => auto_increment
    //      +
    //      [Collation]  =>
    //      [Privileges] => select,insert,update,references
    //      [Comment]    =>
    //
    // Since we don't need the extra info, we go with "SHOW COLUMNS" only.
    // -------------------------------------------------------------------------

    $sql = <<<EOT
SHOW COLUMNS FROM `{$mysql_table_name}`
EOT;

    // -------------------------------------------------------------------------

    $columns =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\get_zero_or_more_records(
            $sql
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $columns ) ) {
        return $columns ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $columns = array(
    //
    //          [0] => Array(
    //                      [Field]     => ID
    //                      [Type]      => bigint(20) unsigned
    //                      [Null]      => NO
    //                      [Key]       => PRI
    //                      [Default]   =>
    //                      [Extra]     => auto_increment
    //                      )
    //
    //          [2] => Array(
    //                      [Field]     => post_date
    //                      [Type]      => datetime
    //                      [Null]      => NO
    //                      [Key]       =>
    //                      [Default]   => 0000-00-00 00:00:00
    //                      [Extra]     =>
    //                      )
    //
    //          [4] => Array(
    //                      [Field]     => post_content
    //                      [Type]      => longtext
    //                      [Null]      => NO
    //                      [Key]       =>
    //                      [Default]   =>
    //                      [Extra]     =>
    //                      )
    //
    //          [5] => Array(
    //                      [Field]     => post_title
    //                      [Type]      => text
    //                      [Null]      => NO
    //                      [Key]       =>
    //                      [Default]   =>
    //                      [Extra]     =>
    //                      )
    //
    //          [14] => Array(
    //                      [Field]     => post_modified
    //                      [Type]      => datetime
    //                      [Null]      => NO
    //                      [Key]       =>
    //                      [Default]   => 0000-00-00 00:00:00
    //                      [Extra]     =>
    //                      )
    //
    //          [19] => Array(
    //                      [Field]     => menu_order
    //                      [Type]      => int(11)
    //                      [Null]      => NO
    //                      [Key]       =>
    //                      [Default]   => 0
    //                      [Extra]     =>
    //                      )
    //
    //          )
    //
    // -------------------------------------------------------------------------

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    $existing_mysql_table_definition = array(
        'columns'   =>  $columns
        ) ;

    // -------------------------------------------------------------------------

    return $existing_mysql_table_definition ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// auto_create_mysql_table()
// =============================================================================

function auto_create_mysql_table(
    $core_plugapp_dirs                      ,
    $question_front_end                     ,
    $dataset_slug                           ,
    $mysql_table_name                       ,
    $corresponding_mysql_table_definition
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\
    // auto_create_mysql_table(
    //      $core_plugapp_dirs                      ,
    //      $question_front_end                     ,
    //      $dataset_slug                           ,
    //      $mysql_table_name                       ,
    //      $corresponding_mysql_table_definition
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

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
    //              [1] => Array(
    //                          [Field]     => created_server_datetime
    //                          [Type]      => DATETIME
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   => 2014-12-16 08:52:39
    //                          [Extra]     =>
    //                          )
    //
    //              [2] => Array(
    //                          [Field]     => last_modified_server_datetime
    //                          [Type]      => TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   => 2014-12-16 08:52:39
    //                          [Extra]     =>
    //                          )
    //
    //              [3] => Array(
    //                          [Field]     => wp_user_id
    //                          [Type]      => TEXT
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   =>
    //                          [Extra]     =>
    //                          )
    //
    //              [4] => Array(
    //                          [Field]     => ad_swapper_user_sid
    //                          [Type]      => TEXT
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   =>
    //                          [Extra]     =>
    //                          )
    //
    //              )
    //
    //          [key_lengths_by_field_name] => Array(
    //              [wp_user_id]          => 20
    //              [ad_swapper_user_sid] => 24
    //              )
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $corresponding_mysql_table_definition , '$corresponding_mysql_table_definition' ) ;

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $safe_dataset_slug = htmlentities( $dataset_slug     ) ;

//  $safe_table_name   = htmlentities( $mysql_table_name ) ;

    // =========================================================================
    // Create the COLUMN/FIELD definition SQL...
    // =========================================================================

    $primary_key_field_name = NULL ;
    $unique_key_field_names = array() ;

    // -------------------------------------------------------------------------

    $number_auto_increment_fields = 0 ;

    // -------------------------------------------------------------------------

    $columns_sql = '' ;

    $comma = '' ;

    // -------------------------------------------------------------------------

    foreach ( $corresponding_mysql_table_definition['columns'] as $this_column ) {

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
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
        // ---------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // Get the column structure SQL...
        // -------------------------------------------------------------------------

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

        $column_structure_sql =
            get_column_structure_sql(
                $primary_key_field_name             ,
                $unique_key_field_names             ,
                $number_auto_increment_fields       ,
                $safe_dataset_slug                  ,
                $this_column
                ) ;

        // ---------------------------------------------------------------------

        if ( is_array( $column_structure_sql ) ) {
            return $column_structure_sql[0] ;
        }

        // ---------------------------------------------------------------------
        // Prepend the column name...
        // ---------------------------------------------------------------------

        $this_column_sql = <<<EOT
    `{$this_column['Field']}` {$column_structure_sql}
EOT;

        // ---------------------------------------------------------------------
        // Append the field/column (to the column creation SQL)...
        // ---------------------------------------------------------------------

        $columns_sql .= <<<EOT
{$comma}{$this_column_sql}
EOT;

        // ---------------------------------------------------------------------

        $comma = ' ,' . "\n" ;

        // ---------------------------------------------------------------------
        // Repeat with the NEXT field/column (if there is one)...
        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Create the TABLE definition SQL...
    // =========================================================================

    $sql = <<<EOT
CREATE TABLE `{$mysql_table_name}` (
{$columns_sql}
EOT;

    // -------------------------------------------------------------------------

    if ( $primary_key_field_name !== NULL ) {

        $sql .= <<<EOT
{$comma}    PRIMARY KEY `{$primary_key_field_name}` ( `{$primary_key_field_name}` )
EOT;

        $comma = ' ,' . "\n" ;

    }

    // -------------------------------------------------------------------------

//  UNIQUE KEY `random` ( `random` (128) )

    foreach ( $unique_key_field_names as $this_unique_key_field_name ) {

        // ---------------------------------------------------------------------

        if (    array_key_exists(
                    $this_unique_key_field_name                                             ,
                    $corresponding_mysql_table_definition['key_lengths_by_field_name']
                    )
            ) {

            $this_unique_key_length =
                $corresponding_mysql_table_definition['key_lengths_by_field_name'][ $this_unique_key_field_name ]
                ;

        } else {

            $safe_field_name = htmlwentities( $this_unique_key_field_name ) ;

            return <<<EOT
PROBLEM:&nbsp; Key length not specified
For Dataset:&nbsp; {$safe_dataset_slug}
And Field:&nbsp; {$safe_field_name}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        $sql .= <<<EOT
{$comma}    UNIQUE KEY `{$this_unique_key_field_name}` ( `{$this_unique_key_field_name}` ({$this_unique_key_length}) )
EOT;

        // ---------------------------------------------------------------------

        $comma = ' ,' . "\n" ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $sql .= <<<EOT
\n)
EOT;

    // =========================================================================
    // Create the TABLE...
    // =========================================================================

//      echo <<<EOT
//  <br />
//  <br />
//  <br />
//  <br />
//  <big><b><pre style="line-height:160%">{$sql}</pre></b></big>
//  EOT;

    // ---------------------------------------------------------------------

    global $wpdb ;

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

    $ok = $wpdb->query( $sql ) ;

    // ---------------------------------------------------------------------

    if ( $ok !== TRUE ) {

        return <<<EOT
PROBLEM:&nbsp; Couldn't create MySQL table
For Dataset:&nbsp; {$safe_dataset_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // ---------------------------------------------------------------------
    // On SUCCESS:-
    //      $wpdb->query()
    //
    // seems to return TRUE (ie; it returns the boolean value "1").
    // ---------------------------------------------------------------------

//pr( $number_records_affected ) ;
//echo "\n" , gettype( $number_records_affected ) , "\n" ;

    // ---------------------------------------------------------------------

//  if (    gettype( $number_records_affected ) !== 'boolean'
//          ||
//          $number_records_affected != 1
//      ) {
//
//      return <<<EOT
//  PROBLEM:&nbsp; Couldn't create MySQL table (#2)
//  For Dataset:&nbsp; {$safe_dataset_slug}
//  Detected in:&nbsp; \\{$ns}\\{$fn}()
//  EOT;
//
//  }

    // =========================================================================
    // Set auto-increment start value...
    // =========================================================================

//      $sql = <<<EOT
//  ALTER TABLE `{$mysql_table_name}` AUTO_INCREMENT=1001
//  EOT;
//
//      // ---------------------------------------------------------------------
//
//      $number_records_affected = $wpdb->query( $sql ) ;
//                                      //  The function returns an integer
//                                      //  corresponding to the number of rows
//                                      //  affected/selected.  If there is a
//                                      //  MySQL error, the function will
//                                      //  return FALSE.
//
//      // ---------------------------------------------------------------------
//
//      if ( $number_records_affected === FALSE ) {
//
//          $msg = <<<EOT
//  PROBLEM:&nbsp; Couldn't adjust auto_increment start value (#1)
//  Detected in:&nbsp; \\{$ns}\\{$fn}()
//  EOT;
//
//          return array( $msg ) ;
//
//      }
//
//      // ---------------------------------------------------------------------
//      // On SUCCESS:-
//      //      $wpdb->query()
//      //
//      // seems to return TRUE (ie; it returns the boolean value "1").
//      // ---------------------------------------------------------------------
//
//  //pr( $number_records_affected ) ;
//  //echo "\n" , gettype( $number_records_affected ) , "\n" ;
//
//      // ---------------------------------------------------------------------
//
//      if (    gettype( $number_records_affected ) !== 'boolean'
//              ||
//              $number_records_affected != 1
//          ) {
//
//          $msg = <<<EOT
//  PROBLEM:&nbsp; Couldn't adjust auto_increment start value (#2)
//  Detected in:&nbsp; \\{$ns}\\{$fn}()
//  EOT;
//
//          return array( $msg ) ;
//
//      }

    // =========================================================================
    // Make sure that it worked...
    // =========================================================================

    if ( \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\table_exists( $mysql_table_name ) !== TRUE ) {

        return <<<EOT
PROBLEM:&nbsp; Couldn't create MySQL table (#3)
For Dataset:&nbsp; {$safe_dataset_slug}
Detected in:&nbsp; \\{$ns}\\{$fn}()
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
// get_column_structure_sql()
// =============================================================================

function get_column_structure_sql(
    &$primary_key_field_name            ,
    &$unique_key_field_names            ,
    &$number_auto_increment_fields      ,
    $safe_dataset_slug                  ,
    $this_column
    ) {

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
    // Eg:-
    //
    //      CREATE TABLE `<table_name>` (
    //          `id`                BIGINT UNSIGNED NOT NULL AUTO_INCREMENT     ,
    //          `random`            TINYTEXT NOT NULL                           ,
    //          `datetime_created`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP         ,
    //          PRIMARY KEY         `id` ( `id` )                               ,
    //          UNIQUE KEY          `random` ( `random` (128) )
    //      )
    //
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
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
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $safe_column_name = htmlentities( $this_column['Field'] ) ;

    // =========================================================================
    // Field / Type
    // =========================================================================

//      $column_structure_sql = <<<EOT
//          `{$this_column['Field']}` {$this_column['Type']}
//      EOT;

    // =========================================================================
    // PRIMARY KEY ?
    // =========================================================================

    if ( $this_column['Key'] === 'PRI' ) {

        // ---------------------------------------------------------------------

        if ( $primary_key_field_name !== NULL ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Two or more PRIMARY KEYS are requested (but only ONE column may be a PRIMARY KEY in any MySQL table)
For Dataset:&nbsp; {$safe_dataset_slug}
And Column/Field:&nbsp; {$safe_column_name}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $msg ) ;

        }

        // -----------------------------------------------------------------

        $primary_key_field_name = $this_column['Field'] ;

        // -----------------------------------------------------------------

    }

    // =========================================================================
    // UNIQUE KEY ?
    // =========================================================================

    if ( $this_column['Key'] === 'UNI' ) {

        // -----------------------------------------------------------------

        $unique_key_field_names[] = $this_column['Field'] ;

        // -----------------------------------------------------------------

    }

    // =========================================================================
    // TYPE ?
    // =========================================================================

    $column_structure_sql = <<<EOT
 {$this_column['Type']}
EOT;

    // =========================================================================
    // NULL ?
    // =========================================================================

    if ( $this_column['Null'] === 'YES' ) {

        // -----------------------------------------------------------------

        $column_structure_sql .= <<<EOT
 NULL
EOT;

        // -----------------------------------------------------------------

    } elseif ( $this_column['Null'] === 'NO' ) {

        // -----------------------------------------------------------------

        $column_structure_sql .= <<<EOT
 NOT NULL
EOT;

        // -----------------------------------------------------------------

    }

    // =========================================================================
    // DEFAULT ?
    // =========================================================================

    if ( trim( $this_column['Default'] ) !== '' ) {

        // -----------------------------------------------------------------

        $column_structure_sql .= <<<EOT
 DEFAULT {$this_column['Default']}
EOT;

        // -----------------------------------------------------------------

    }

    // =========================================================================
    // EXTRA ?
    // =========================================================================

    if ( trim( $this_column['Extra'] ) !== '' ) {

        // -----------------------------------------------------------------

        $column_structure_sql .= <<<EOT
 {$this_column['Extra']}
EOT;

        // -----------------------------------------------------------------

    }

    // =========================================================================
    // AUTO_INCREMENT ?
    // =========================================================================

    if ( $this_column['Extra'] === 'AUTO_INCREMENT' ) {

        // -----------------------------------------------------------------

        if ( $number_auto_increment_fields > 0 ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Two or more AUTO_INCREMENT columns have been specified (but only ONE column may be AUTO_INCREMENT in a MySQL table)
For Dataset:&nbsp; {$safe_dataset_slug}
And Column/Field:&nbsp; {$safe_column_name}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $msg ) ;

        }

        // -----------------------------------------------------------------

        $column_structure_sql .= <<<EOT
 AUTO_INCREMENT
EOT;

        // -----------------------------------------------------------------

        $number_auto_increment_fields++ ;

        // -----------------------------------------------------------------

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $column_structure_sql ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// question_mysql_tables_match()
// =============================================================================

function question_mysql_tables_match(
    $core_plugapp_dirs                      ,
    $question_front_end                     ,
    $dataset_slug                           ,
    $mysql_table_name                       ,
    $corresponding_mysql_table_definition   ,
    $existing_mysql_table_definition        ,
    $question_report                        ,
    $question_show_fixes
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\
    // question_mysql_tables_match(
    //      $core_plugapp_dirs                      ,
    //      $question_front_end                     ,
    //      $dataset_slug                           ,
    //      $mysql_table_name                       ,
    //      $corresponding_mysql_table_definition   ,
    //      $existing_mysql_table_definition        ,
    //      $question_report                        ,
    //      $question_show_fixes
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS
    //      On SUCCESS
    //          o   TRUE if the table definitions are the same
    //          o   If the table definitions are different:-
    //              --  If $question_report === TRUE
    //                  $report STRING  (which shows the differences between the
    //                                  two table definitions).
    //              --  If $question_report === FALSE
    //                  FALSE
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
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
    //                          )
    //              [1] => Array(
    //                          [Field]     => created_server_datetime
    //                          [Type]      => DATETIME
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   =>
    //                          [Extra]     =>
    //                          )
    //              [2] => Array(
    //                          [Field]     => last_modified_server_datetime
    //                          [Type]      => TIMESTAMP
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   =>
    //                          [Extra]     => ON UPDATE CURRENT_TIMESTAMP
    //                          )
    //              [3] => Array(
    //                          [Field]     => wp_user_id
    //                          [Type]      => TEXT
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   =>
    //                          [Extra]     =>
    //                          )
    //              [4] => Array(
    //                          [Field] => ad_swapper_user_sid
    //                          [Type]      => TEXT
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   =>
    //                          [Extra]     =>
    //                          )
    //              )
    //          )
    //
    //      $existing_mysql_table_definition = Array(
    //          [columns] => Array(
    //              [0] => Array(
    //                          [Field]     => id
    //                          [Type]      => bigint(20) unsigned
    //                          [Null]      => NO
    //                          [Key]       => PRI
    //                          [Default]   =>
    //                          [Extra]     => auto_increment
    //                          )
    //              [1] => Array(
    //                          [Field]     => created_server_datetime
    //                          [Type]      => datetime
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   => 2014-12-17 00:44:50
    //                          [Extra]     =>
    //                          )
    //              [2] => Array(
    //                          [Field]     => last_modified_server_datetime
    //                          [Type]      => timestamp
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   => 2014-12-17 00:44:50
    //                          [Extra]     => on update CURRENT_TIMESTAMP
    //                          )
    //              [3] => Array(
    //                          [Field]     => wp_user_id
    //                          [Type]      => text
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   =>
    //                          [Extra]     =>
    //                          )
    //              [4] => Array(
    //                          [Field]     => ad_swapper_user_sid
    //                          [Type]      => text
    //                          [Null]      => NO
    //                          [Key]       =>
    //                          [Default]   =>
    //                          [Extra]     =>
    //                          )
    //              )
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $corresponding_mysql_table_definition , '$corresponding_mysql_table_definition' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $existing_mysql_table_definition , '$existing_mysql_table_definition' ) ;

    // =========================================================================
    // Init.
    // =========================================================================

//  $ns = __NAMESPACE__ ;
//  $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    $safe_dataset_slug = htmlentities( $dataset_slug     ) ;

//  $safe_table_name   = htmlentities( $mysql_table_name ) ;

    // -------------------------------------------------------------------------
    // Get the EXISTING column indices by name...
    //
    // So that we can quickly determine if a specified corresponding column
    // is in the existing table, or not.
    // -------------------------------------------------------------------------

    $existing_column_indices_by_name = array() ;

    foreach ( $existing_mysql_table_definition['columns'] as $this_index => $this_column ) {
        $existing_column_indices_by_name[ $this_column['Field'] ] = $this_index ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $existing_column_indices_by_name = Array(
    //          [id]                            => 0
    //          [created_server_datetime]       => 1
    //          [last_modified_server_datetime] => 2
    //          [wp_user_id]                    => 3
    //          [ad_swapper_user_sid]           => 4
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $existing_column_indices_by_name , '$existing_column_indices_by_name' ) ;

    // =========================================================================
    // NO REPORT !!!
    // =========================================================================

    if ( ! $question_report ) {

        // -------------------------------------------------------------------------
        // NOTE!
        // =====
        // The PHP array comparison operators are:-
        //
        //      $a == $b    Equality    TRUE if $a and $b have the same key/value
        //                              pairs.
        //
        //      $a === $b   Identity    TRUE if $a and $b have the same key/value
        //                              pairs in the same order and of the same
        //                              types.
        //
        // So we can't use these to test whether or not the table definitions are
        // the same - because they're case-sensitive (and we want to ignore case).
        // -------------------------------------------------------------------------

//      return $existing_mysql_table_definition == $corresponding_mysql_table_definition ;

        // ---------------------------------------------------------------------
        // Test the COLUMN definitions for equality:-
        //      1.  Ignoring case (as far as some of the values are concerned),
        //          and;
        //      2.  Ignoring field order.
        // ---------------------------------------------------------------------

        foreach ( $corresponding_mysql_table_definition['columns'] as $this_corresponding_column ) {

            // -----------------------------------------------------------------

            if (    ! array_key_exists(
                        $this_corresponding_column['Field']     ,
                        $existing_column_indices_by_name
                        )
                ) {
                return FALSE ;
            }

            // -----------------------------------------------------------------

            $this_existing_column =
                $existing_mysql_table_definition['columns'][
                    $existing_column_indices_by_name[
                        $this_corresponding_column['Field']
                        ]
                    ] ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $this_corresponding_column , '$this_corresponding_column' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $this_existing_column , '$this_existing_column' ) ;

            // -----------------------------------------------------------------
            // NOTE!
            // =====
            // For any column where DEFAULT ISN'T specified - the 'Default'
            // value returned by SHOW COLUMNS may be either:-
            //      o   NULL, or;
            //      o   '' (the empty string)
            //
            // Basically MySQL seems to select one or the other based on the
            // column type and the MySQL version - and the other column
            // settings that may apply.  It's VERY complicated and hard to
            // predict/define.
            //
            // Thus we treat a 'Default' value of either:-
            //      o   NULL, or;
            //      o   '' (the empty string)
            //
            // as meaning that NO DEFAULT was specified.
            //
            // ---
            //
            // P.S. If you want to specify (eg):-
            //          DEFAULT NULL
            //
            //      for some column, then you'd achieve this with:-
            //          'Default'   =>  'NULL'
            //
            //      The 'Default' value returned by SHOW COLUMNS would then be:-
            //          'NULL' (= the string "NULL")
            //
            //      Which ISN'T the same as the:-
            //          o   NULL, or;
            //          o   '' (the empty string)
            //
            //      returned when NO DEFAULT value was specified at all.
            // -----------------------------------------------------------------

            if ( $this_corresponding_column['Default'] === $this_existing_column['Default'] ) {

                $default_differs = FALSE ;

            } else {

                // -------------------------------------------------------------

                if (    \is_string( $this_corresponding_column[ 'Default' ] )
                        &&
                        \is_string( $this_existing_column[ 'Default' ] )
                        &&
                        (   \strtolower( trim( $this_corresponding_column[ 'Default' ] , '"' ) )
                            ===
                            \strtolower( $this_existing_column[ 'Default' ] )
                            )
                    ) {

                    $default_differs = FALSE ;
                        //  This is to take care of the fact that 'Default'
                        //  STRING (and DATETIME) values in the dataset
                        //  definition are (or at least, should be,) enclosed in
                        //  double quotes.

                } else {

                    // ---------------------------------------------------------

                    if (    $this_corresponding_column['Default'] === NULL
                            ||
                            $this_corresponding_column['Default'] === ''
                        ) {
                        $corresponding_default_none = TRUE ;
                    } else {
                        $corresponding_default_none = FALSE ;
                    }

                    // ---------------------------------------------------------

                    if (    $this_existing_column['Default'] === NULL
                            ||
                            $this_existing_column['Default'] === ''
                        ) {
                        $existing_default_none = TRUE ;
                    } else {
                        $existing_default_none = FALSE ;
                    }

                    // ---------------------------------------------------------

                    if (    $corresponding_default_none
                            &&
                            $existing_default_none
                        ) {
                        $default_differs = FALSE ;

                    } else {
                        $default_differs = TRUE ;

                    }

                    // ---------------------------------------------------------

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

//echo '<br />' ;
//echo '<br />' , $this_corresponding_column['Field'] , '...' ;
//echo '<br />' , gettype( $this_corresponding_column['Type']    ) , ' --- ' , gettype( $this_existing_column['Type']    ) ;
//echo '<br />' , gettype( $this_corresponding_column['Null']    ) , ' --- ' , gettype( $this_existing_column['Null']    ) ;
//echo '<br />' , gettype( $this_corresponding_column['Key']     ) , ' --- ' , gettype( $this_existing_column['Key']     ) ;
//echo '<br />' , gettype( $this_corresponding_column['Default'] ) , ' --- ' , gettype( $this_existing_column['Default'] ) ;
//echo '<br />' , gettype( $this_corresponding_column['Extra']   ) , ' --- ' , gettype( $this_existing_column['Extra']   ) ;

            if (    strtolower( $this_corresponding_column['Type'] ) !== strtolower( $this_existing_column['Type'] )
                    ||
                    $this_corresponding_column['Null'] !== $this_existing_column['Null']
                    ||
                    $this_corresponding_column['Key'] !== $this_existing_column['Key']
                    ||
//                  $this_corresponding_column['Default'] !== $this_existing_column['Default']
                    $default_differs
                    ||
                    strtolower( $this_corresponding_column['Extra'] ) !== strtolower( $this_existing_column['Extra'] )
                ) {
                return FALSE ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        return TRUE ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // REPORT !!!
    // =========================================================================

    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // Walk over the CORRESPONDING columns - and list the EXISTING columns
    // that either:-
    //      o   Aren't present, or;
    //      o   Are different.
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    $td_style = <<<EOT
padding:0.5em 1em; background-color:#DD4040; color:#FFFFFF
EOT;

    // -------------------------------------------------------------------------

    $th_style = <<<EOT
padding:0.5em 1em; background-color:#000000; color:#FFFFFF; font-size:120%
EOT;

    // -------------------------------------------------------------------------

    $report_data_rows = '' ;

    // -------------------------------------------------------------------------

    foreach ( $corresponding_mysql_table_definition['columns'] as $this_corresponding_column ) {

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $this_corresponding_column = Array(
        //          [Field]   => id
        //          [Type]    => BIGINT(20) UNSIGNED
        //          [Null]    => NO
        //          [Key]     => PRI
        //          [Default] =>
        //          [Extra]   => AUTO_INCREMENT
        //          )
        //
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // Is this CORRESPONDING column in the EXISTING table ?
        //
        // If not, make it a "MISSING FROM MySQL TABLE" row...
        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                    $this_corresponding_column['Field']     ,
                    $existing_column_indices_by_name
                    )
            ) {

            // -----------------------------------------------------------------

//      <th style="{$th_style}">Field/Column Name</th>
//      <th style="{$th_style}">Attribute</th>
//      <th style="{$th_style}">Should Be</th>
//      <th style="{$th_style}">Is</th>
//      <th style="{$th_style}">Action</th>

            // -----------------------------------------------------------------

            if ( $question_show_fixes ) {
                $action_col = <<<EOT
    <td style="{$td_style}">-</td>
EOT;

            } else {
                $action_col = '' ;

            }

            // -----------------------------------------------------------------

            $report_data_rows .= <<<EOT
<tr>
    <td style="{$td_style}" align="right">{$this_corresponding_column['Field']}</td>
    <td style="{$td_style}" colspan="3" align="center"><b>MISSING</b> from MySQL
        table<br />(Please RENAME (a "<b>no longer required</b>" column) or
        ADD)</td>
    {$action_col}
</tr>
EOT;

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Get the EXISTING column definition...
        // ---------------------------------------------------------------------

        $this_existing_column =
            $existing_mysql_table_definition['columns'][
                $existing_column_indices_by_name[ $this_corresponding_column['Field'] ]
                ] ;

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $this_existing_column = Array(
        //          [Field]     => id
        //          [Type]      => bigint(20) unsigned
        //          [Null]      => NO
        //          [Key]       => PRI
        //          [Default]   =>
        //          [Extra]     => auto_increment
        //          )
        //
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // Compare the CORRESPONDING and EXISTING column definitions - and add
        // a row to the output table that identifies the differences (if any
        // exist)...
        // ---------------------------------------------------------------------

        $differences = array() ;

        // ---------------------------------------------------------------------
        // Type ?
        // ---------------------------------------------------------------------

        $result =
            compare_column_attributes(
                $safe_dataset_slug              ,
                $mysql_table_name               ,
                $this_corresponding_column      ,
                $this_existing_column           ,
                $differences                    ,
                'Type'
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return array( $result ) ;
        }

        // ---------------------------------------------------------------------
        // Null ?
        // ---------------------------------------------------------------------

        $result =
            compare_column_attributes(
                $safe_dataset_slug              ,
                $mysql_table_name               ,
                $this_corresponding_column      ,
                $this_existing_column           ,
                $differences                    ,
                'Null'
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return array( $result ) ;
        }

        // ---------------------------------------------------------------------
        // Key ?
        // ---------------------------------------------------------------------

        $result =
            compare_column_attributes(
                $safe_dataset_slug              ,
                $mysql_table_name               ,
                $this_corresponding_column      ,
                $this_existing_column           ,
                $differences                    ,
                'Key'
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return array( $result ) ;
        }

        // ---------------------------------------------------------------------
        // Default ?
        // ---------------------------------------------------------------------

        $result =
            compare_column_attributes(
                $safe_dataset_slug              ,
                $mysql_table_name               ,
                $this_corresponding_column      ,
                $this_existing_column           ,
                $differences                    ,
                'Default'
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return array( $result ) ;
        }

        // ---------------------------------------------------------------------
        // Extra ?
        // ---------------------------------------------------------------------

        $result =
            compare_column_attributes(
                $safe_dataset_slug              ,
                $mysql_table_name               ,
                $this_corresponding_column      ,
                $this_existing_column           ,
                $differences                    ,
                'Extra'
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return array( $result ) ;
        }

        // ---------------------------------------------------------------------
        // Report the differences (if there are any)...
        // ---------------------------------------------------------------------

//      <th style="{$th_style}">Field/Column Name</th>
//      <th style="{$th_style}">Attribute</th>
//      <th style="{$th_style}">Should Be</th>
//      <th style="{$th_style}">Is</th>
//      <th style="{$th_style}">Action</th>

        // ---------------------------------------------------------------------

        $number_differences = count( $differences) ;

        // ---------------------------------------------------------------------

        if ( $number_differences > 0 ) {

            // -----------------------------------------------------------------

            $name_col = <<<EOT
<td style="{$td_style}" align="right" rowspan="{$number_differences}">{$this_corresponding_column['Field']}</td>
EOT;

            // -----------------------------------------------------------------

            foreach ( $differences as $this_difference ) {

                // -------------------------------------------------------------

                if ( $question_show_fixes ) {
                    $action_col = <<<EOT
    <td style="{$td_style}">{$this_difference['action']}</td>
EOT;

                } else {
                    $action_col = '' ;

                }

                // -------------------------------------------------------------

                $report_data_rows .= <<<EOT
<tr>
    {$name_col}
    <td style="{$td_style}">{$this_difference['attribute']}</td>
    <td style="{$td_style}">{$this_difference['should_be']}</td>
    <td style="{$td_style}">{$this_difference['is']}</td>
    {$action_col}
</tr>
EOT;

                // -------------------------------------------------------------

                $name_col = '' ;

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // Repeat with the next CORRESPONDING column (if there is one)...
        // ---------------------------------------------------------------------

    }

    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // Walk over the EXISTING columns - and list the CORRESPONDING columns
    // that AREN'T present.
    //
    // (There's NO need to list corresponding columns that are different, since
    // this has already been done.)
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    // -------------------------------------------------------------------------
    // Get the CORRRESPONDING column indices by name...
    //
    // So that we can quickly determine if a specified existing column
    // is in the corresponding table, or not.
    // -------------------------------------------------------------------------

    $corresponding_column_indices_by_name = array() ;

    foreach ( $corresponding_mysql_table_definition['columns'] as $this_index => $this_column ) {
        $corresponding_column_indices_by_name[ $this_column['Field'] ] = $this_index ;
    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $corresponding_column_indices_by_name = Array(
    //          [id]                                => 0
    //          [created_server_datetime_utc]       => 1
    //          [last_modified_server_datetime_utc] => 2
    //          [wp_user_id]                        => 3
    //          [ad_swapper_user_sid]               => 4
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $corresponding_column_indices_by_name , '$corresponding_column_indices_by_name' ) ;

    foreach ( $existing_mysql_table_definition['columns'] as $this_existing_column ) {

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $this_existing_column = Array(
        //          [Field]   => id
        //          [Type]    => BIGINT(20) UNSIGNED
        //          [Null]    => NO
        //          [Key]     => PRI
        //          [Default] =>
        //          [Extra]   => AUTO_INCREMENT
        //          )
        //
        // ---------------------------------------------------------------------

        // ---------------------------------------------------------------------
        // Is this EXISTING column in the CORRESPONDING table ?
        //
        // If not, make it a "NO LONGER REQUIRED IN MySQL TABLE" row...
        // ---------------------------------------------------------------------

        if (    ! array_key_exists(
                    $this_existing_column['Field']          ,
                    $corresponding_column_indices_by_name
                    )
            ) {

            // -----------------------------------------------------------------

            if ( $question_show_fixes ) {
                $action_col = <<<EOT
    <td style="{$td_style}">-</td>
EOT;

            } else {
                $action_col = '' ;

            }

            // -----------------------------------------------------------------

            $report_data_rows .= <<<EOT
<tr>
    <td style="{$td_style}" align="right">{$this_existing_column['Field']}</td>
    <td style="{$td_style}" colspan="3" align="center"><b>NO LONGER REQUIRED</b>
        in MySQL table<br />(Please RENAME (to a "<b>missing</b>" column) or
        DROP)</td>
    {$action_col}
</tr>
EOT;

            // -----------------------------------------------------------------

            continue ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    if ( $report_data_rows === '' ) {
        return TRUE ;
    }

    // -------------------------------------------------------------------------

    if ( $question_show_fixes ) {
        $action_col = <<<EOT
        <th style="{$th_style}">SQL to Fix (*)</th>
EOT;
        $footnote = <<<EOT
<p style="font-style:italic">(*)&nbsp; Copy/paste this SQL into PHPMyAdmin's
"SQL" tab (and press "Go").&nbsp; Or run it from the command line (for
example).</p>
EOT;

    } else {
        $action_col = '' ;
        $footnote = '' ;

    }

    // -------------------------------------------------------------------------

    return <<<EOT
<p style="margin-top:3em">
    <table border="1" ce--llpadding="0" ce--llspacing="0">
        <tr>
            <th style="{$th_style}">Field/Column Name</th>
            <th style="{$th_style}">Attribute</th>
            <th style="{$th_style}">Should Be</th>
            <th style="{$th_style}">Is</th>
            {$action_col}
        </tr>
        {$report_data_rows}
    </table>
</p>
{$footnote}
EOT;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// compare_column_attibutes
// =============================================================================

function compare_column_attributes(
    $safe_dataset_slug                      ,
    $mysql_table_name                       ,
    $this_corresponding_column              ,
    $this_existing_column                   ,
    &$differences                           ,
    $attribute
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\
    // compare_column_attributes(
    //      $safe_dataset_slug              ,
    //      $mysql_table_name               ,
    //      $this_corresponding_column      ,
    //      $this_existing_column           ,
    //      &$differences                   ,
    //      $attribute
    //      )
    // - - - - - - - - - - - - - - - - - - -
    // Updates $differences, if the specified column attributes don't match.
    //
    // RETURNS
    //      On SUCCESS
    //          TRUE
    //
    //      On FAILURE
    //          $error_message STRING
    // -------------------------------------------------------------------------

    if (    \strtolower( $this_corresponding_column[ $attribute ] )
            ===
            \strtolower( $this_existing_column[ $attribute ] )
        ) {
        return ;
    }

    // -------------------------------------------------------------------------

    if (    \is_string( $this_corresponding_column[ $attribute ] )
            &&
            \is_string( $this_existing_column[ $attribute ] )
            &&
            (   \strtolower( trim( $this_corresponding_column[ $attribute ] , '"' ) )
                ===
                \strtolower( $this_existing_column[ $attribute ] )
                )
        ) {
        return ;
    }
        //  This is to take care of the fact that 'Default' STRING (and
        //  DATETIME) values in the dataset definition are (or at least,
        //  should be,) enclosed in double quotes.

    // -------------------------------------------------------------------------

    if (    is_string( $this_corresponding_column[ $attribute ] )
            &&
            $this_corresponding_column[ $attribute ] === ''
        ) {
        $should_be = '(empty string)' ;

    } else {
        $should_be = $this_corresponding_column[ $attribute ] .
                     ' (' . gettype( $this_corresponding_column[ $attribute ] ) . ')'
                     ;

    }

    // -------------------------------------------------------------------------

    if (    is_string( $this_existing_column[ $attribute ] )
            &&
            $this_existing_column[ $attribute ] === ''
        ) {
        $is = '(empty string)' ;

    } else {
        $is = $this_existing_column[ $attribute ] .
              ' (' . gettype( $this_existing_column[ $attribute ] ) . ')'
              ;

    }

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // From:-
    //      http://hoelz.ro/wiki/mysql-alter-table-alter-change-modify-column
    //
    // Whenever I have to change a column in MySQL (which isn't that often), I
    // always forget the difference between ALTER COLUMN, CHANGE COLUMN, and
    // MODIFY COLUMN. Here's a handy reference.
    //
    //      ALTER COLUMN
    //          Used to set or remove the default value for a column. Example:
    //
    //          ALTER TABLE MyTable ALTER COLUMN foo SET DEFAULT 'bar';
    //          ALTER TABLE MyTable ALTER COLUMN foo DROP DEFAULT;
    //
    //      CHANGE COLUMN
    //          Used to rename a column, change its datatype, or move it within
    //          the schema. Example:
    //
    //          ALTER TABLE MyTable CHANGE COLUMN foo bar VARCHAR(32) NOT NULL FIRST;
    //          ALTER TABLE MyTable CHANGE COLUMN foo bar VARCHAR(32) NOT NULL AFTER baz;
    //
    //      MODIFY COLUMN
    //          Used to do everything CHANGE COLUMN can, but without renaming
    //          the column. Example:
    //
    //          ALTER TABLE MyTable MODIFY COLUMN foo VARCHAR(32) NOT NULL AFTER baz;
    // -------------------------------------------------------------------------

//  $action = '' ;
//
//  // -------------------------------------------------------------------------
//
//  if ( is_string( $this_corresponding_column[ $attribute ] ) ) {
//      $value = '"' . $this_corresponding_column[ $attribute ] . '"' ;
//
//  } else {
//      $value = '"' . $this_corresponding_column[ $attribute ] . '"' ;
//
//  }
//
//  // -------------------------------------------------------------------------
//
//      if ( $attribute === 'Default' ) {
//
//          $action = <<<EOT
//  ALTER TABLE `{$mysql_table_name}` ALTER COLUMN `{$this_corresponding_column['Field']}` SET DEFAULT {$value}
//  EOT;
//
//      }

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
    // The returned SQL might be like (eg):-
    //      o   "`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT"
    //      o   "`random` TINYTEXT NOT NULL"
    //      o   "`datetime_created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP"
    //
    // RETURNS
    //      On SUCCESS
    //          $column_structure_sql STRING
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    $primary_key_field_name       = NULL    ;
    $unique_key_field_names       = array() ;
    $number_auto_increment_fields = 0       ;
        //  Dummy values; we don't actually use them.

    // -------------------------------------------------------------------------

    $column_structure_sql =
        get_column_structure_sql(
            $primary_key_field_name         ,
            $unique_key_field_names         ,
            $number_auto_increment_fields   ,
            $safe_dataset_slug              ,
            $this_corresponding_column
            ) ;

    // ---------------------------------------------------------------------

    if ( is_array( $column_structure_sql ) ) {
        return $column_structure_sql[0] ;
    }

    // -------------------------------------------------------------------------

    $action = <<<EOT
ALTER TABLE `{$mysql_table_name}` MODIFY COLUMN `{$this_corresponding_column['Field']}` {$column_structure_sql}
EOT;

    // -------------------------------------------------------------------------

    $differences[] = array(
        'attribute'     =>  $attribute      ,
        'should_be'     =>  $should_be      ,
        'is'            =>  $is             ,
        'action'        =>  $action
        ) ;

    // -------------------------------------------------------------------------

    }

// =============================================================================
// That's that!
// =============================================================================

