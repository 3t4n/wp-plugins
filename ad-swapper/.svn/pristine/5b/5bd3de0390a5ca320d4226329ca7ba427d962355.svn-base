<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / HOOKS / WP / WP.PHP
// (C) 2015 Peter Newman.  All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_hooksWp ;

// =============================================================================
// wp_hook_handler()
// =============================================================================

function wp_hook_handler(
    $wp
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_hooksWp\
    // wp_hook_handler( $wp )
    // - - - - - - - - - - -
    // Registers the page request...
    //
    // RETURNS
    //      Nothing
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // wp
    // ==
    // This action hook runs immediately after the global WP class object is set
    // up.
    //
    // The $wp object is passed to the hooked function as a reference (no return
    // is necessary).
    //
    // This hook is one effective place to perform any high-level filtering or
    // validation, following queries, but before WordPress does any routing,
    // processing, or handling.
    //
    // The 'wp' hook is found in /wp-includes/class-wp.php, within the main()
    // method of the WP() class.
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // "wp" is called after the various WordPress setup has been done - but
    // before page printing starts.
    //
    // See:-
    //      http://codex.wordpress.org/Plugin_API/Action_Reference
    // -------------------------------------------------------------------------

//\error_reporting( E_ALL ) ;
//\ini_set( 'display_errors' , '1' ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $wp = WP Object(
    //
    //              [public_query_vars] => Array(
    //                  [0] => m
    //                  [1] => p
    //                  [2] => posts
    //                  [3] => w
    //                  [4] => cat
    //                  [5] => withcomments
    //                  ...
    //                  [71] => wc-api
    //                  [72] => wc-api-version
    //                  [73] => wc-api-route
    //                  )
    //
    //              [private_query_vars] => Array(
    //                  [0] => offset
    //                  [1] => posts_per_page
    //                  [2] => posts_per_archive_page
    //                  [3] => showposts
    //                  [4] => nopaging
    //                  [5] => post_type
    //                  ...
    //                  [21] => post_parent
    //                  [22] => post_parent__in
    //                  [23] => post_parent__not_in
    //                  )
    //
    //              [extra_query_vars] => Array()
    //
    //              [query_vars] => Array()
    //
    //              [query_string]  =>
    //              [request]       =>
    //              [matched_rule]  =>
    //              [matched_query] =>
    //              [did_permalink] =>
    //
    //              )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $wp , '$wp' ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $_SERVER = Array(
    //          [SERVER_SOFTWARE]       => Apache/2.2.21...Perl/v5.10.1
    //          [REQUEST_URI]           => /plugdev/
    //          [UNIQUE_ID]             => VNA72H8AAQEAAA71WygAAAAI
    //          [HTTP_HOST]             => localhost
    //          [HTTP_USER_AGENT]       => Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0
    //          [HTTP_ACCEPT]           => text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
    //          [HTTP_ACCEPT_LANGUAGE]  => en-US,en;q=0.5
    //          [HTTP_ACCEPT_ENCODING]  => gzip, deflate
    //          [HTTP_REFERER]          => http://localhost/...Plant
    //          [HTTP_COOKIE]           => wp-settings-time-2=1407576415...nm4ef6v22
    //          [HTTP_CONNECTION]       => keep-alive
    //          [HTTP_CACHE_CONTROL]    => max-age=0
    //          [PATH]                  => /usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin
    //          [SERVER_SIGNATURE]      => Apache/2.2.21...Port 80
    //          [SERVER_NAME]           => localhost
    //          [SERVER_ADDR]           => 127.0.0.1
    //          [SERVER_PORT]           => 80
    //          [REMOTE_ADDR]           => 127.0.0.1
    //          [DOCUMENT_ROOT]         => /opt/lampp/htdocs
    //          [SERVER_ADMIN]          => you@example.com
    //          [SCRIPT_FILENAME]       => /opt/lampp/.../index.php
    //          [REMOTE_PORT]           => 41022
    //          [GATEWAY_INTERFACE]     => CGI/1.1
    //          [SERVER_PROTOCOL]       => HTTP/1.1
    //          [REQUEST_METHOD]        => GET
    //          [QUERY_STRING]          =>
    //          [SCRIPT_NAME]           => /plugdev/index.php
    //          [PHP_SELF]              => /plugdev/index.php
    //          [REQUEST_TIME]          => 1422932952
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_SERVER , '$_SERVER' ) ;

    // =========================================================================
    // Record GET requests only...
    // =========================================================================

    if (    ! array_key_exists( 'REQUEST_METHOD' , $_SERVER )
            ||
            $_SERVER['REQUEST_METHOD'] !== 'GET'
        ) {
        return ;
    }

    // =========================================================================
    // Record page requests ?
    // =========================================================================

    if ( record_page_requests() !== TRUE ) {
        return ;
    }

    // =========================================================================
    // Ignore requests for the plugin's cached "Add/Edit Record" pages...
    // =========================================================================

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // These pages have URLS like (eg):-
    //
    //      http://localhost/plugdev/wp-content/plugins/plugin-plant/remote/get-cached-page.php
    //          ?page_name=plugin-workshop-great-kiwi-standard-dataset-manager-add-edit-form
    //          &page_key=54d17782bf...48aeab3d3ae442b1-260099352-1601887730-557173384-1329029421-1750125161-953266031
    // -------------------------------------------------------------------------

    if (    array_key_exists( 'REQUEST_URI' , $_SERVER )
            &&
            contains(
                $_SERVER['REQUEST_URI']     ,
                '/remote/get-cached-page.php?page_name=plugin-workshop-great-kiwi-standard-dataset-manager-add-edit-form&page_key='
                )
        ) {
        return ;
    }

    // =========================================================================
    // For speed, we:-
    //      a)  Assume that the "Page Requests" table has already been created,
    //          and;
    //      b)  Write the record directly to it.
    // =========================================================================

    // =========================================================================
    // Get the CORE PLUGAPP DIRS...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\
    // get_core_plugapp_dirs(
    //      $path_in_plugin         ,
    //      $app_handle = NULL
    //      )
    // - - - - - - - - - - - - - - -
    // Returns the dirspecs of the main dirs used in a given app.  Ie:-
    //
    //      array(
    //          'plugin_root_dir'                   =>  "xxx"   ,
    //          'plugins_includes_dir'              =>  "xxx"   ,
    //          'plugins_app_defs_dir'              =>  "xxx"   ,
    //          'dataset_manager_includes_dir'      =>  "xxx"   ,   //  (1)
    //          'apps_dot_app_dir'                  =>  "xxx"   ,   //  (2)
    //          'apps_plugin_stuff_dir'             =>  "xxx"       //  (3)
    //          'custom_pages_dir'                  =>  "xxx"       //  (4)
    //          )
    //
    //      (1) This is where most of the "Dataset Manager" includes files
    //          are stored.
    //
    //      (2) If $app_handle === NULL, the returned 'apps_dot_app_dir'
    //          is NULL too.
    //
    //      (3) If $app_handle === NULL, the returned 'apps_plugin_stuff_dir'
    //          is NULL too.
    //
    //      (4) If $app_handle === NULL, the returned 'custom_pages_dir'
    //          is NULL too.
    //
    // ---
    //
    // $path_in_plugin should be a file, directory or link path in the
    // plugin (or "app") from which this function is called.  Typically,
    // one uses __FILE__ for this purpose.  Eg:-
    //
    //      \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_single_app_defs_root_dir( __FILE__ ) ;
    //
    // ---
    //
    // $app_handle should be either:-
    //
    //      o   A single "app slug" - eg; "research-assistant" - as a
    //          STRING.  For which the returned dirspec might be (eg):-
    //
    //              /home/joe/.../plugins/some-plugin/app-defs/research-assistant.app
    //
    // Or:-
    //
    //      o   An array of (nested) app slugs.  Eg:-
    //
    //              array(
    //                  'some-app'          ,
    //                  'child-app'         ,
    //                  'grandchild-app'
    //                  [...]
    //                  )
    //
    //          For which the returned dirspec might be (eg):-
    //
    //              /home/joe/.../plugins/some-plugin/app-defs/some-app.app/child-app.app/grandchild-app.app
    //
    // Exits with an error message if the directory can't be returned (eg;
    // doesn't exist).
    //
    // NOTE!
    // -----
    // These "apps" and "datasets" (etc) are typically defined in a directory
    // tree structure like (eg):-
    //
    //      /plugins/this-plugin/
    //      +-- app-defs/
    //      |   +-- some-app.app/
    //      |   |   +-- child-app.app/
    //      |   |       +-- grandchild-app.app
    //      |   |           +-- etc...
    //      |   +-- another-app.app/
    //      |       +-- ...
    //      +-- includes/
    //      +-- js/
    //      +-- admin/
    //      +-- remote/
    //      +-- ...etc...
    //      +-- this-plugin.php
    //      +-- ...etc...
    //
    // -------------------------------------------------------------------------

    $path_in_plugin = __FILE__ ;

    $app_handle = 'ad-swapper' ;

    // -------------------------------------------------------------------------

    $core_plugapp_dirs =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_core_plugapp_dirs(
            $path_in_plugin     ,
            $app_handle
            ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $core_plugapp_dirs = Array(
    //          [plugin_root_dir]               => /.../wp-content/plugins/plugin-plant
    //          [plugins_includes_dir]          => /.../wp-content/plugins/plugin-plant/includes
    //          [plugins_app_defs_dir]          => /.../wp-content/plugins/plugin-plant/app-defs
    //          [dataset_manager_includes_dir]  => /.../wp-content/plugins/plugin-plant/includes/dataset-manager
    //          [apps_dot_app_dir]              => /.../wp-content/plugins/plugin-plant/app-defs/ad-swapper.app
    //          [apps_plugin_stuff_dir]         => /.../wp-content/plugins/plugin-plant/app-defs/ad-swapper.app/plugin.stuff
    //          [custom_pages_dir]              => /.../wp-content/plugins/plugin-plant/app-defs/ad-swapper.app/plugin.stuff/custom.pages
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $core_plugapp_dirs , '$core_plugapp_dirs' ) ;

    // =========================================================================
    // Create the record to add to the page requests file...
    // =========================================================================

    // -------------------------------------------------------------------------
    // request_time
    // -------------------------------------------------------------------------

    if ( array_key_exists( 'REQUEST_TIME' , $_SERVER ) ) {
        $request_time = (string) $_SERVER['REQUEST_TIME'] ;
    } else {
        $request_time = '' ;
    }

    // -------------------------------------------------------------------------
    // request_time_float
    // -------------------------------------------------------------------------

    if ( array_key_exists( 'REQUEST_TIME_FLOAT' , $_SERVER ) ) {
        $request_time_float = (string) $_SERVER['REQUEST_TIME_FLOAT'] ;
    } else {
        $request_time_float = '' ;
    }

    // -------------------------------------------------------------------------
    // request_uri
    // -------------------------------------------------------------------------

    if ( array_key_exists( 'REQUEST_URI' , $_SERVER ) ) {
        $request_uri = $_SERVER['REQUEST_URI'] ;
    } else {
        $request_uri = '' ;
    }

    // -------------------------------------------------------------------------
    // full_request_url
    // -------------------------------------------------------------------------

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/url-utils.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\
    // get_current_page_url(
    //      $question_die_on_error = FALSE
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Attempts to retrieve the current page URL from $_SERVER.
    //
    // RETURNS
    //      o   On SUCCESS!
    //          -----------
    //          $current_page_url STRING
    //
    //      o   On FAILURE!
    //          -----------
    //          If $question_die_on_error = TRUE
    //              Doesn't return
    //          If $question_die_on_error = FALSE
    //              array( $error_message STRING )
    // -------------------------------------------------------------------------

    $question_die_on_error = FALSE ;

    // -------------------------------------------------------------------------

    $full_request_url =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\get_current_page_url(
            $question_die_on_error
            ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $full_request_url ) ) {
        $full_request_url = '' ;
    }

    // -------------------------------------------------------------------------
    // asadid
    // -------------------------------------------------------------------------

    $asadid = '' ;

    // -------------------------------------------------------------------------

    if (    array_key_exists( 'asadid' , $_GET )
            &&
            trim( $_GET['asadid'] ) !== ''
        ) {

        // ---------------------------------------------------------------------

        require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/sequential-ids-support.php' ) ;

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

        if (    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\question_sequential_id(
                    $_GET['asadid']
                    )
            ) {

            //  TODO:   Check that it's one of this site's As IDs...

            $asadid = $_GET['asadid'] ;

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------
    // http_referer
    // -------------------------------------------------------------------------

    if ( array_key_exists( 'HTTP_REFERER' , $_SERVER ) ) {
        $http_referer = $_SERVER['HTTP_REFERER'] ;
    } else {
        $http_referer = '' ;
    }

    // -------------------------------------------------------------------------
    // remote_addr
    // -------------------------------------------------------------------------

    if ( array_key_exists( 'REMOTE_ADDR' , $_SERVER ) ) {
        $remote_addr = $_SERVER['REMOTE_ADDR'] ;
    } else {
        $remote_addr = '' ;
    }

    // -------------------------------------------------------------------------
    // http_user_agent
    // -------------------------------------------------------------------------

    if ( array_key_exists( 'HTTP_USER_AGENT' , $_SERVER ) ) {
        $http_user_agent = $_SERVER['HTTP_USER_AGENT'] ;
    } else {
        $http_user_agent = '' ;
    }

    // -------------------------------------------------------------------------
    // Finally, we can create the record...
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \mictotime()
    // ------------
    // By default, microtime() returns a string in the form "msec sec", where
    // sec is the number of seconds since the Unix epoch (0:00:00 January 1,1970
    // GMT), and msec measures microseconds that have elapsed since sec and is
    // also expressed in seconds.
    //
    // Eg:- "0.35320400 1422951638"
    // -------------------------------------------------------------------------

    $page_request_record = array(
        'php_time'              =>  (string) \time()        ,
        'php_microtime'         =>  \microtime()            ,
        'request_time'          =>  $request_time           ,
        'request_time_float'    =>  $request_time_float     ,
        'request_uri'           =>  $request_uri            ,
        'full_request_url'      =>  $full_request_url       ,
        'asadid'                =>  $asadid                 ,
        'http_referer'          =>  $http_referer           ,
        'remote_addr'           =>  $remote_addr            ,
        'http_user_agent'       =>  $http_user_agent
        ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $page_request_record , '$page_request_record' ) ;

    // =========================================================================
    // Get the MySQL table name...
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

    $dataset_slug = 'ad_swapper_page_requests' ;

    // -------------------------------------------------------------------------

    $mysql_table_name =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\prepend_wordpress_table_name_prefix(
            $dataset_slug
            ) ;

    // =========================================================================
    // Add the record to the "Page Requests" file...
    // =========================================================================

//  require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/basepress-mysql.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\
    // add_record(
    //      $table_name         ,
    //      $raw_record_data
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // $raw_record_data should be like:-
    //
    //      $raw_record_data = array(
    //          'field_name_1'  =>  <field_value_1>     ,
    //          ...
    //          'field_name_N'  =>  <field_value_N>
    //          )
    //
    // In other words, $raw_record_data must be an associative ARRAY of
    //      field name  =>  field_value
    //
    // pairs.  Where:-
    //
    // 1.   At least ONE field must be specified.
    //
    // 2.   Field values can be any of the following PHP data types:-
    //          STRING
    //          INT
    //          FLOAT
    //          TRUE    (stored as 1 in the DB)
    //          FALSE   (stored as 0 in the DB)
    //          NULL    (stored as NULL in the DB)
    //
    //      PHP ARRAY and OBJECT type fields AREN'T allowed.
    //
    // 3.   You DON'T have to supply INT and FLOAT values as PHP
    //      INTs or FLOATS.  They can be supplied as PHP STRINGS
    //      (eg; from $_GET and/or $_POST).  And MySQL will
    //      automatically convert them (before storing them).
    //
    //      NOTE!
    //      -----
    //      Every value that "add_record()" supplies to MySQL will
    //      be supplied in STRING format.  So putting (eg):-
    //          $_GET['id']
    //
    //      into $raw_record_data like:-
    //          $raw_record_data['id'] = (int) $_GET['id']
    //
    //      is pointless.  Since "add_record()" will simply do:-
    //          (string) $raw_record_data['id']
    //
    //      to it before supplying it to MySQL.
    //
    // 4.   The field values MUST NOT be SQL escaped.  You MUST supply
    //      the RAW input data (even the raw $_GET and $_POST data
    //      entered by the user).  And "add_record()" will escape it
    //      for you.
    //
    // ---
    //
    // RETURNS either:-
    //      o   The new record's record ID (as PHP INT) on SUCCESS
    //      o   An error message STRING on FAILURE
    // -------------------------------------------------------------------------

    $old_question_die_on_error = $GLOBALS['BASEPRESS']['MYSQL']['question_die_on_error'] ;

    $GLOBALS['BASEPRESS']['MYSQL']['question_die_on_error'] = FALSE ;

    // -------------------------------------------------------------------------

    $record_id =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\add_record(
            $mysql_table_name       ,
            $page_request_record
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $record_id ) ) {

        // ---------------------------------------------------------------------
        // If the request fails, then we assume it's maybe because the
        // "page_requests_table" HASN'T been created yet.
        //
        // So we create it, then try again..
        // ---------------------------------------------------------------------

        require_once( $core_plugapp_dirs['dataset_manager_includes_dir'] . '/mysql-support.php' ) ;

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

        $question_front_end = FALSE ;

        // ---------------------------------------------------------------------

        $selected_datasets_dmdd_or_target_apps_apps_dir_relative_path =
            'ad-swapper'
            ;

        // ---------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_mysqlSupport\auto_create_or_validate_mysql_table(
                $core_plugapp_dirs                                              ,
                $question_front_end                                             ,
                $selected_datasets_dmdd_or_target_apps_apps_dir_relative_path   ,
                $dataset_slug
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            $msg = $record_id . '<br /><br />' . $result ;
            die( nl2br( $msg ) ) ;

        } elseif ( is_array( $result ) ) {
            $msg = $record_id . '<br /><br />' . $result[0] ;
            die( nl2br( $msg ) ) ;

        }

        // ---------------------------------------------------------------------

        $record_id =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\add_record(
                $mysql_table_name       ,
                $page_request_record
                ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $record_id ) ) {
            die( nl2br( $record_id ) ) ;
        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    $GLOBALS['BASEPRESS']['MYSQL']['question_die_on_error'] =
        $old_question_die_on_error
        ;

    // =========================================================================
    // CACHE the PAGE REQUEST ID (so that any Ad Impressions on the page can
    // find out what it is)...
    // =========================================================================

    $GLOBALS['greatKiwi_byFernTec_adSwapper_local_v0x1x211_pageRequestId'] =
        $record_id
        ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// contains()
// =============================================================================

//  Copied from "includes/string-utils.php", for speed...

//  function contains( $haystack , $needle , $ignore_case = FALSE ) {
//
//      if ( $ignore_case ) {
//          return stripos( $haystack , $needle ) !== FALSE ;
//                      //  Returns the position as an integer. If needle is
//                      //  not found, strpos() will return boolean FALSE.
//      }
//
//      return strpos( $haystack , $needle ) !== FALSE ;
//                  //  Returns the position as an integer. If needle is
//                  //  not found, strpos() will return boolean FALSE.
//
//  }

function contains( $haystack , $needle ) {

    return stripos( $haystack , $needle ) !== FALSE ;
                //  Returns the position as an integer. If needle is
                //  not found, strpos() will return boolean FALSE.

}

// =============================================================================
// Add this action...
// =============================================================================

    // -------------------------------------------------------------------------
    // add_action( $hook, $function_to_add, $priority, $accepted_args )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Hooks a function on to a specific action.
    //
    // More specifically, this function will run the function $function_to_add
    // when the event $hook occurs.
    //
    // This function is an alias to add_filter().
    //
    // See Plugin API/Action Reference for a list of action hooks. Actions are
    // (usually) triggered when the WordPress core calls do_action().
    //
    //      $hook
    //          (string) (required) The name of the action to which
    //          $function_to_add is hooked. (See Plugin API/Action Reference for
    //          a list of action hooks). Can also be the name of an action
    //          inside a theme or plugin file, or the special tag "all", in
    //          which case the function will be called for all hooks.
    //
    //          Default: None
    //
    //      $function_to_add
    //          (callback) (required) The name of the function you wish to be
    //          hooked.
    //
    //          Default: None
    //
    //      $priority
    //          (int) (optional) Used to specify the order in which the
    //          functions associated with a particular action are executed.
    //          Lower numbers correspond with earlier execution, and functions
    //          with the same priority are executed in the order in which they
    //          were added to the action.
    //
    //          Default: 10
    //
    //      $accepted_args
    //          (int) (optional) The number of arguments the hooked function
    //          accepts. In WordPress 1.5.1+, hooked functions can take extra
    //          arguments that are set when the matching do_action() or
    //          apply_filters() call is run. For example, the action
    //          comment_id_not_found will pass any functions that hook onto it
    //          the ID of the requested comment.
    //
    //          Default: 1
    //
    // RETURN VALUES
    //      (boolean)
    //      Always True.
    // -------------------------------------------------------------------------

    if ( record_page_requests() ) {

        add_action(
            'wp'                                            ,
            '\\' . __NAMESPACE__ . '\\wp_hook_handler'
            ) ;

    }

    // -------------------------------------------------------------------------

// =============================================================================
// record_page_requests()
// =============================================================================

function record_page_requests() {

    // -------------------------------------------------------------------------

    if ( is_multisite() ) {

        // ---------------------------------------------------------------------

        if ( ! array_key_exists( 'HTTP_HOST' , $_SERVER ) ) {
            die( 'PROBLEM:&nbsp; No HTTP_HOST' ) ;
        }

        // ---------------------------------------------------------------------

        $multisite_domain_names_to_skip_page_request_recording_on = array(
            'adswapper.biz'         ,
            'localhost.com'
            ) ;

        // ---------------------------------------------------------------------

        foreach ( $multisite_domain_names_to_skip_page_request_recording_on as $this_domain_name ) {

            $this_domain_name_len = strlen( $this_domain_name ) ;

            if ( substr( $_SERVER['HTTP_HOST'] , -1 * $this_domain_name_len ) === $this_domain_name ) {
                return FALSE ;
            }

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================

