<?php

// *****************************************************************************
// INCLUDES / WP-ADMIN-DOWNLOADS-DELIVERY.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_wpAdminDownloads ;

    // -------------------------------------------------------------------------
    // OVERVIEW
    // ========
    // We want to download the requested content:-
    //      o   AFTER WordPress is fully loaded - and the (admin) user
    //          authenticated, but;
    //      o   BEFORE the (admin) page headers are sent.
    //
    // From:-
    //      http://codex.wordpress.org/Plugin_API/Action_Reference
    //
    // we have the following list of actions run during an "edit.php" admin
    // page load:-
    //
    //      muplugins_loaded    After must-use plugins are loaded
    //      ...
    //      plugins_loaded      After active plugins and pluggable functions are loaded
    //      ...
    //      setup_theme
    //      ...
    //      after_setup_theme   At this stage, the current user is not yet authenticated.
    //      ...
    //      set_current_user
    //      init                Typically used by plugins to initialize. The
    //                          current user is already authenticated by this time.
    //      ...
    //      wp_loaded           After WordPress is fully loaded
    //      _admin_menu         See also: _user_admin_menu, _network_admin_menu
    //      admin_menu          See also: user_admin_menu, network_admin_menu
    //      admin_init
    //      current_screen
    //      load-(page)
    //      send_headers        Where custom HTTP headers can be added
    //      ...
    //      wp                  After WP object is set up (ref array)
    //      ...
    //      shutdown            PHP execution is about to end
    //      wp_dashboard_setup  Allows customization of admin Dashboard
    //
    // (The above list is PARTIAL - many hooks have been omitted.)
    //
    // So "admin_init" looks like a good place.
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // add_action( 'admin_init', 'function_name' )
    // - - - - - - - - - - - - - - - - - - - - - -
    // admin_init is triggered before any other hook when a user accesses the
    // admin area. This hook doesn't provide any parameters, so it can only be
    // used to callback a specified function.
    //
    // EXAMPLE: ACCESS CONTROL
    //
    //      /**
    //       * Restrict access to the administration screens.
    //       *
    //       * Only administrators will be allowed to access the admin screens,
    //       * all other users will be shown a message instead.
    //       *
    //       * We do allow access for Ajax requests though, since these may be
    //       * initiated from the front end of the site by non-admin users.
    //       */
    //      function restrict_admin() {
    //          if ( ! current_user_can( 'manage_options' ) && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
    //              wp_die( __( 'You are not allowed to access this part of the site' ) );
    //          }
    //      }
    //      add_action( 'admin_init', 'restrict_admin', 1 );
    //
    //      In this example we block access to the admin panel for users that do
    //      not have the Administrator Role.
    //
    // EXAMPLE: ACCESS CONTROL WITH REDIRECT
    //
    //      This example works similarly to the first example, but it will
    //      automatically redirect users lacking the specified capability to the
    //      homepage.
    //
    //      /**
    //       * Restrict access to the administration screens.
    //       *
    //       * Only administrators will be allowed to access the admin screens,
    //       * all other users will be automatically redirected to the front of
    //       * the site instead.
    //       *
    //       * We do allow access for Ajax requests though, since these may be
    //       * initiated from the front end of the site by non-admin users.
    //       */
    //      function restrict_admin_with_redirect() {
    //          if ( ! current_user_can( 'manage_options' ) && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
    //              wp_redirect( site_url() );
    //              exit;
    //          }
    //      }
    //      add_action( 'admin_init', 'restrict_admin_with_redirect', 1 );
    //
    // EXAMPLE: REGISTERING NEW SETTINGS
    //
    //      Another typical usage is to register a new setting for use by a
    //      plugin:
    //
    //      function myplugin_settings() {
    //          register_setting( 'myplugin', 'myplugin_setting_1', 'intval' );
    //          register_setting( 'myplugin', 'myplugin_setting_2', 'intval' );
    //      }
    //      add_action( 'admin_init', 'myplugin_settings' );
    // -------------------------------------------------------------------------

// =============================================================================
// admin_init_handler()
// =============================================================================

function admin_init_handler() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wpAdminDownloads\
    // admin_init_handler()
    // - - - - - - - - - -
    // Called every time that an Admin Page is displayed (when the host plugin
    // is installed and activated).  Checks to see if a download has been
    // requested - and starts the requested download if so.
    //
    // NOTE!
    // =====
    // 1.   For the admin downloads to work, you MUST add the following code to
    //      the plugin's startup routine:-
    //
    //          require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/wp-admin-download-delivery.php' ) ;
    //          add_action(
    //              'admin_init'                                                                                        ,
    //              '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_wpAdminDownloads\\admin_init_handler'     ,
    //              1
    //              ) ;
    //
    // 2.   If NO download was requested, RETURNS.
    //
    //      If a download was requested, exit()s (DOESN'T RETURN).
    //
    //      If a download was requested - but an error occurred while actioning
    //      it - issues an error message then exit()s (DOESN'T RETURN).
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $_POST = Array(
    //          ...
    //          [great_kiwi_wordpress_admin_download_request] => 2d6c962e-ee4e-404f-a293-390dae2a6cdc-1413230947-597424-1
    //          ...
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $_POST ) ;

    // =========================================================================
    // Is there a POST request containing the:-
    //      'great_kiwi_wordpress_admin_download_request'
    //
    // variable ?
    //
    // If NOT, there's no download request to service.
    // =========================================================================

    if (    count( $_POST ) < 1
            ||
            ! array_key_exists( 'great_kiwi_wordpress_admin_download_request' , $_POST )
        ) {
        return ;
            //  NOTHING TO DO !!!
    }

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    require_once( dirname( __FILE__ ) . '/wp-admin-downloads-common.php' ) ;

    // =========================================================================
    // Does the
    //      $_POST['great_kiwi_wordpress_admin_download_request']
    //
    // value look like a valid download key ?
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wpAdminDownloads\
    // is_user_download_key(
    //      $candidate_user_download_key
    //      )
    // - - - - - - - - - - - - - - - - -
    // Is the input string a record key like (eg):-
    //
    //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-0-1
    //      3f2504e0-4f89-11d3-9a0c-0305e82c3301-1400040711-999977-2147483647
    //      etc
    //
    // RETURNS
    //      o   On SUCCESS
    //              TRUE
    //
    //      o   On FAILURE
    //              FALSE
    // ---------------------------------------------------------------------------

    if ( ! is_user_download_key(
                $_POST['great_kiwi_wordpress_admin_download_request']
                )
        ) {

        $msg = <<<EOT
PROBLEM:&nbsp; Bad "great_kiwi_wordpress_admin_download_request"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        die( \nl2br( $msg ) ) ;

    }

    // =========================================================================
    // There must be a LOGGED-IN (admin) USER...
    // =========================================================================

    // -------------------------------------------------------------------------
    // is_user_logged_in()
    // - - - - - - - - - -
    // This Conditional Tag checks if the current visitor is logged in. This is
    // a boolean function, meaning it returns either TRUE or FALSE.'
    //
    // This function does not accept any parameters.
    //
    // RETURN VALUES
    //      (boolean)
    //          True if user is logged in, false if not logged in.
    //
    // CHANGE LOG
    //      Since: 2.0.0
    // -------------------------------------------------------------------------

    if ( ! \is_user_logged_in() ) {

        $msg = <<<EOT
Sorry, but this download is for logged in users only
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        die( \nl2br( $msg ) ) ;

    }

    // =========================================================================
    // The USER MUST HAVE THE CAPABILITIES specified by (the plugin-specific):-
    //
    //      \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\
    //      get_admin_downloader_required_capabilities()
    //
    // routine.  Unless that routine HASN'T been specified, in which case
    // "manage_options" capability is required (in other words, the logged-in
    // user must be an "Administrator").
    // =========================================================================

    // -------------------------------------------------------------------------
    // current_user_can( $capability, $args )
    // - - - - - - - - - - - - - - - - - - -
    // Whether the current user has a certain capability. See: Roles and
    // Capabilities.
    //
    //      $capability
    //          (string) (required) A capability. This is case-sensitive, and
    //          should be all lowercase.
    //          Default: None
    //
    //      $args
    //          (mixed) (optional) Any additional arguments that may be needed,
    //          such as a post ID. Some capability checks (like 'edit_post' or
    //          'delete_page') require this be provided.
    //          Default: None
    //
    // RETURNS
    //      (boolean)
    //          true if the current user has the capability.
    //          false if the current user does not have the capability.
    //
    //      Caution: current_user_can returns true even for a non existing or a
    //      junk post id
    //
    // CAPABILITIES PARAMETERS
    //
    // Here is a list of current $capability strings (keep in mind plugins may
    // adjust the capabilities array).
    //
    //      activate_plugins (boolean)
    //      add_users (boolean)
    //      create_users (boolean)
    //      delete_others_pages (boolean)
    //      delete_others_posts (boolean)
    //      delete_pages (boolean)
    //      delete_plugins (boolean)
    //      delete_posts (boolean)
    //      delete_private_pages (boolean)
    //      delete_private_posts (boolean)
    //      delete_published_pages (boolean)
    //      delete_published_posts (boolean)
    //      delete_themes (boolean)
    //      delete_users (boolean)
    //      edit_dashboard (boolean)
    //      edit_others_pages (boolean)
    //      edit_others_posts (boolean)
    //      edit_pages (boolean)
    //      edit_plugins (boolean)
    //      edit_posts (boolean)
    //      edit_private_pages (boolean)
    //      edit_private_posts (boolean)
    //      edit_published_pages (boolean)
    //      edit_published_posts (boolean)
    //      edit_themes (boolean)
    //      edit_theme_options (boolean)
    //      import (boolean)
    //      install_plugins (boolean)
    //      install_themes (boolean)
    //      list_users (boolean)
    //      manage_categories (boolean)
    //      manage_links (boolean)
    //      manage_options (boolean)
    //      moderate_comments (boolean)
    //      promote_users (boolean)
    //      publish_pages (boolean)
    //      publish_posts (boolean)
    //      read (boolean)
    //      read_private_pages (boolean)
    //      read_private_posts (boolean)
    //      remove_users (boolean)
    //      switch_themes (boolean)
    //      unfiltered_html (boolean)
    //      unfiltered_upload (boolean)
    //      update_core (boolean)
    //      update_plugins (boolean)
    //      update_themes (boolean)
    //      upload_files (boolean)
    //      level_10 (boolean) - deprecated
    //      level_9 (boolean) - deprecated
    //      level_8 (boolean) - deprecated
    //      level_7 (boolean) - deprecated
    //      level_6 (boolean) - deprecated
    //      level_5 (boolean) - deprecated
    //      level_4 (boolean) - deprecated
    //      level_3 (boolean) - deprecated
    //      level_2 (boolean) - deprecated
    //      level_1 (boolean) - deprecated
    //      level_0 (boolean) - deprecated
    //
    // NOTES
    //      Do not pass a role name to current_user_can(), as this is not
    //      guaranteed to work correctly (see #22624). Instead, you may wish to
    //      try the check user role function put together by AppThemes.
    //
    // CHANGELOG
    //      Since: 2.0.0
    // -------------------------------------------------------------------------

//  if (    ! \current_user_can( 'edit_pages' )
//          ||
//          ! \current_user_can( 'edit_posts' )
//      ) {
//
//      $msg = <<<EOT
//  Sorry, but this download is for logged in users with "edit_pages" and "edit_posts" capabilities only
//  Detected in:&nbsp; \\{$ns}\\{$fn}()
//  EOT;
//
//      die( \nl2br( $msg ) ) ;
//
//  }

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\
    // get_admin_downloader_required_capabilities()
    // - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS an array like:-
    //
    //      array(
    //          'all'   =>  array(
    //                          'this_capability'
    //                          'that_capability'
    //                          ...
    //                          )   ,
    //          'any'   =>  array(
    //                          'this_capability'
    //                          'that_capability'
    //                          ...
    //                          )
    //          )
    //
    // For example:-
    //
    //      array(
    //          'all'   =>  array(
    //                          'manage_options'
    //                          )
    //          )
    //
    // Where "all" means that the currently logged-in user must have ALL
    // the listed capabilities.  And "any" means that the currently
    // logged-in user can "admin download" if they have ANY of the listed
    // capabilities.
    // -------------------------------------------------------------------------

    $no_permissions_error_message = <<<EOT
<p>Sorry, you don't have sufficient permissions to download this content.</p>
EOT;

    // -------------------------------------------------------------------------

    if ( function_exists( '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\\get_admin_downloader_required_capabilities' ) ) {

        // ---------------------------------------------------------------------

        $required_capabilities =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup\get_admin_downloader_required_capabilities()
            ;

        // ---------------------------------------------------------------------

        if ( array_key_exists( 'all' , $required_capabilities ) ) {

            foreach ( $required_capabilities['all'] as $this_capability ) {

                if ( ! \current_user_can( $this_capability ) ) {
                    die( nl2br( $no_permissions_error_message ) ) ;
                }

            }

        }

        // ---------------------------------------------------------------------

        if ( array_key_exists( 'any' , $required_capabilities ) ) {

            // -----------------------------------------------------------------

            $can_download = FALSE ;

            // -----------------------------------------------------------------

            foreach ( $required_capabilities['any'] as $this_capability ) {

                if ( \current_user_can( $this_capability ) ) {
                    $can_download = TRUE ;
                    break ;
                }

            }

            // -----------------------------------------------------------------

            if ( ! $can_download ) {
                return $no_permissions_error_message ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        if ( ! \current_user_can( 'manage_options' ) ) {
            die( nl2br( $no_permissions_error_message ) ) ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // Get the CURRENT USER'S DETAILS...
    // =========================================================================

    // -------------------------------------------------------------------------
    // get_currentuserinfo()
    // - - - - - - - - - - -
    // Retrieves the information pertaining to the currently logged in user, and
    // places it in the global variable $current_user. Properties map directly
    // to the wp_users table in the database (see Database Description).
    //
    // Also places the individual attributes into the following separate global
    // variables:
    //
    //      $user_login
    //
    //      $user_ID        (Equal $current_user->ID, not
    //                      $current_user->user_ID)
    //
    //      $user_email
    //
    //      $user_url       (User's website, as entered in the user's Profile)
    //
    //      $user_pass      (The phpass hash of the user password - useful for
    //                      comparing input at a password prompt with the actual
    //                      user password.)
    //
    //      $display_name   (User's name, displayed according to the 'How to
    //                      display name' User option)
    //
    //      $user_identity  (User's name, displayed according to the 'How to
    //                      display name' User option (since 3.0))
    //
    // DEFAULT USAGE
    //      The call to get_currentuserinfo() places the current user's info
    //      into $current_user, where it can be retrieved using member
    //      variables.
    //
    //          global $current_user ;
    //          get_currentuserinfo() ;
    //
    //          echo 'Username: ' . $current_user->user_login . "\n";
    //          echo 'User email: ' . $current_user->user_email . "\n";
    //          echo 'User first name: ' . $current_user->user_firstname . "\n";
    //          echo 'User last name: ' . $current_user->user_lastname . "\n";
    //          echo 'User display name: ' . $current_user->display_name . "\n";
    //          echo 'User ID: ' . $current_user->ID . "\n";
    // -------------------------------------------------------------------------

    global $current_user ;

    \get_currentuserinfo() ;

    // =========================================================================
    // Get the logged-in user's ADMIN DOWNLOAD RELATED META DATA...
    // =========================================================================

    // -------------------------------------------------------------------------
    // get_user_meta($user_id, $key, $single)
    // - - - - - - - - - - - - - - - - - - -
    // Retrieve a single meta field or all fields of user_meta data for the
    // given user. Uses get_metadata(). This function replaces the deprecated
    // get_usermeta() function.
    //
    //      $user_id
    //          (integer) (required) The ID of the user whose data should be
    //          retrieved.
    //          Default: None
    //
    //      $key
    //          (string) (optional) The meta_key in the wp_usermeta table for
    //          the meta_value to be returned. If left empty, will return all
    //          user_meta fields for the given user.
    //          Default: (empty string)
    //
    //      $single
    //          (boolean) (optional) If true return value of meta data field, if
    //          false return an array. This parameter has no effect if $key is
    //          left blank.
    //          Default: false
    //
    // RETURN VALUES
    //      (mixed) Will be an Array if $key is not specified or if $single is
    //      false. Will be value of meta_value field if $single is true.
    //
    //      NOTE
    //      If the meta value does not exist and $single is true the function
    //      will return an empty string. If $single is false an empty array is
    //      returned.
    //
    // EXAMPLES
    //
    // This example returns and then displays the last name for user id 9.
    //
    //      $user_id = 9;
    //      $key = 'last_name';
    //      $single = true;
    //      $user_last = get_user_meta( $user_id, $key, $single );
    //
    // This example demonstrates leaving the $key argument blank, in order to
    // retrieve all meta data for the given user (in this example, user_id = 9):
    //
    //      $all_meta_for_user = get_user_meta( 9 );
    //
    //      Generates:-
    //
    //          $all_meta_for_user = Array(
    //              [first_name]    => Array( [0] => Tom      )
    //              [last_name]     => Array( [0] => Auger    )
    //              [nickname]      => Array( [0] => tomauger )
    //              [description]   => etc....
    //              )
    //
    // Note: in order to access the data in this example, you need to
    // dereference the array that is returned for each key, like so:
    //
    //      $last_name = $all_meta_for_user['last_name'][0];
    //
    // To avoid this, you may want to run a simple array_map() on the results of
    // get_user_meta() in order to take only the first index of each result
    // (this emulating what the $single argument does when $key is provided:
    //
    //      $all_meta_for_user =
    //          array_map( function( $a ){ return $a[0]; }, get_user_meta( $user_id ) );
    //
    //      Generates:-
    //
    //          $all_meta_for_user = Array(
    //              [first_name]    => Tom
    //              [last_name]     => Auger
    //              [nickname]      => tomauger
    //              [description]   => etc....
    //              )
    //
    // CHANGE LOG
    //      Since: 3.0
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wpAdminDownloads\
    // get_meta_keys()
    // - - - - - - - -
    // RETURNS
    //      $meta_keys = ARRAY(
    //          'string_to_download'    =>  "xxx"   ,
    //          'output_file_basename'  =>  "xxx"   ,
    //          'content_type'          =>  "xxx"   ,
    //          'user_download_key'     =>  "xxx"   ,
    //          'number_chunks'         =>  N       ,
    //          'checksum'              =>  "xxx"
    //          )
    // -------------------------------------------------------------------------

    $meta_keys = get_meta_keys() ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $meta_keys = Array(
    //          [plugin_camel_name]    => adSwapper_local
    //          [plugin_version_alnum] => v0x1x211
    //          [string_to_download]   => wpAdminDownloads_stringToDownload_adSwapper_local_v0x1x211
    //          [output_file_basename] => wpAdminDownloads_outputFileBasename_adSwapper_local_v0x1x211
    //          [content_type]         => wpAdminDownloads_contentType_adSwapper_local_v0x1x211
    //          [user_download_key]    => wpAdminDownloads_userDownloadKey_adSwapper_local_v0x1x211
    //          [number_chunks]        => wpAdminDownloads_numberChunks_adSwapper_local_v0x1x211
    //          [checksum]             => wpAdminDownloads_checksum_adSwapper_local_v0x1x211
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $meta_keys , $meta_keys ) ;

    // -------------------------------------------------------------------------

    $single = TRUE ;
        //  For "get_user_meta()"...

    // =========================================================================
    // Ignore this download - unless it's for the correct plugin...
    // =========================================================================

    $plugin_camel_name =
        \get_user_meta( $current_user->ID , $meta_keys['plugin_camel_name'] , $single )
        ;

    // -------------------------------------------------------------------------

    $plugin_version_alnum =
        \get_user_meta( $current_user->ID , $meta_keys['plugin_version_alnum'] , $single )
        ;

//echo $plugin_camel_name , ' --- ' , $plugin_version_alnum ;

    // -------------------------------------------------------------------------

    if (    $plugin_camel_name !== 'adSwapper_local'
            ||
            $plugin_version_alnum !== 'v0x1x211'
        ) {
        return ;
    }

    // =========================================================================
    // Does the USER META user download key match the REQUESTED user download
    // key ?
    // =========================================================================

    $user_download_key =
        \get_user_meta( $current_user->ID , $meta_keys['user_download_key'] , $single )
        ;

    // -------------------------------------------------------------------------

    if (    $user_download_key
            !==
            $_POST['great_kiwi_wordpress_admin_download_request']
        ) {

        $msg = <<<EOT
Sorry, Unrecognised "great_kiwi_wordpress_admin_download_request"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        die( \nl2br( $msg ) ) ;

    }

    // =========================================================================
    // Get the DOWNLOAD DETAILS...
    // =========================================================================

    // -------------------------------------------------------------------------
    // outputFileBasename
    // -------------------------------------------------------------------------

    $output_file_basename =
        \get_user_meta( $current_user->ID , $meta_keys['output_file_basename'] , $single )
        ;

    // -------------------------------------------------------------------------
    // content_type
    // -------------------------------------------------------------------------

    $content_type =
        \get_user_meta( $current_user->ID , $meta_keys['content_type'] , $single )
        ;

    // -------------------------------------------------------------------------
    // numberChunks
    // -------------------------------------------------------------------------

    $number_chunks =
        \get_user_meta( $current_user->ID , $meta_keys['number_chunks'] , $single )
        ;

    // -------------------------------------------------------------------------
    // checksum
    // -------------------------------------------------------------------------

    $checksum =
        \get_user_meta( $current_user->ID , $meta_keys['checksum'] , $single )
        ;

    // =========================================================================
    // Rebuild the STRING_TO_DOWNLOAD...
    // =========================================================================

    $string_to_download = '' ;

    $number_chunks_unpacked = 0 ;

    $chunk_number = 1 ;

    // -------------------------------------------------------------------------

    while ( TRUE ) {

        // ---------------------------------------------------------------------

        $chunk_key = $meta_keys['string_to_download'] . '_' . $chunk_number ;

        // ---------------------------------------------------------------------

        $this_chunk = \get_user_meta( $current_user->ID , $chunk_key , $single ) ;
                            //  If the meta value does not exist and $single is
                            //  true the function will return an empty string.

        // ---------------------------------------------------------------------

        if ( $this_chunk === '' ) {
            break ;
        }

        // ---------------------------------------------------------------------

        $string_to_download .= $this_chunk ;

        // ---------------------------------------------------------------------

        $number_chunks_unpacked++ ;

        $chunk_number++ ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // DELETE the USER's "ADMIN DOWNLOAD" META DATA...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wpAdminDownloads\
    // delete_all_wp_admin_downloads_user_meta_data(
    //      $user_id
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - -
    // Delete ALL the "WP Admin Downloads" user meta data (for the currently
    // logged-in user).
    //
    // This is done after each WP Admin Downloads completes (whether
    // sucessfully or not).
    //
    // And we delete ALL "WP Admin Downloads" specific meta key/value pairs
    // that we can find.  Just in case some previous WP Admin Download crashed
    // before it's meta data could be successfully removed.
    //
    // We also delete this meta data BEFORE starting a new WP Admin Download.
    // To prevent any existing and possibly corrupt data from stuffing things
    // up.
    //
    // RETURNS
    //      o   On SUCCESS
    //              TRUE
    //
    //      o   On FAILURE
    //              $error_message STRING
    // -------------------------------------------------------------------------

    $result = delete_all_wp_admin_downloads_user_meta_data(
                    $current_user->ID
                    ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        die( \nl2br( $result ) ) ;
    }

    // =========================================================================
    // Calculate the unpacked string's CHECKSUM...
    // =========================================================================

    // -------------------------------------------------------------------------
    // int crc32 ( string $str )
    // - - - - - - - - - - - - -
    // Generates the cyclic redundancy checksum polynomial of 32-bit lengths of
    // the str. This is usually used to validate the integrity of data being
    // transmitted.
    //
    // WARNING
    //
    // Because PHP's integer type is signed many crc32 checksums will result in
    // negative integers on 32bit platforms. On 64bit installations all crc32()
    // results will be positive integers though.
    //
    // So you need to use the "%u" formatter of sprintf() or printf() to get the
    // string representation of the unsigned crc32() checksum in decimal format.
    //
    // For a hexadecimal representation of the checksum you can either use the
    // "%x" formatter of sprintf() or printf() or the dechex() conversion
    // functions, both of these also take care of converting the crc32() result
    // to an unsigned integer.
    //
    // Having 64bit installations also return negative integers for higher
    // result values was considered but would break the hexadecimal conversion
    // as negatives would get an extra 0xFFFFFFFF######## offset then. As
    // hexadecimal representation seems to be the most common use case we
    // decided to not break this even if it breaks direct decimal comparisons in
    // about 50% of the cases when moving from 32 to 64bits.
    //
    // In retrospect having the function return an integer maybe wasn't the best
    // idea and returning a hex string representation right away (as e.g. md5()
    // does) might have been a better plan to begin with.
    //
    // For a more portable solution you may also consider the generic hash().
    // hash("crc32b", $str) will return the same string as dechex(crc32($str)).
    //
    //      str
    //          The data.
    //
    // RETURN VALUES
    //      Returns the crc32 checksum of str as an integer.
    //
    // (PHP 4 >= 4.0.1, PHP 5)
    // -------------------------------------------------------------------------

    $crc32 = \dechex( \crc32( $string_to_download ) ) ;

    // -------------------------------------------------------------------------
    // string md5 ( string $str [, bool $raw_output = false ] )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Calculates the MD5 hash of str using the » RSA Data Security, Inc. MD5
    // Message-Digest Algorithm, and returns that hash.
    //
    //      str
    //          The string.
    //
    //      raw_output
    //          If the optional raw_output is set to TRUE, then the md5 digest
    //          is instead returned in raw binary format with a length of 16.
    //
    // RETURN VALUES
    //      Returns the hash as a 32-character hexadecimal number.
    //
    // (PHP 4, PHP 5)
    // -------------------------------------------------------------------------

    $md5 = \md5( $string_to_download ) ;

    // -------------------------------------------------------------------------
    // string sha1 ( string $str [, bool $raw_output = false ] )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Calculates the sha1 hash of str using the » US Secure Hash Algorithm 1.
    //
    //      str
    //          The input string.
    //
    //      raw_output
    //          If the optional raw_output is set to TRUE, then the sha1 digest
    //          is instead returned in raw binary format with a length of 20,
    //          otherwise the returned value is a 40-character hexadecimal
    //          number.
    //
    // RETURN VALUES
    //      Returns the sha1 hash as a string.
    //
    // (PHP 4 >= 4.3.0, PHP 5)
    //
    // CHANGELOG
    //      Version Description
    //      5.0.0   The raw_output parameter was added.
    // -------------------------------------------------------------------------

    $sha1 = \sha1( $string_to_download ) ;

    // -------------------------------------------------------------------------

    $unpacked_checksum = $crc32 . '-' . $md5 . '-' . $sha1 . '-' . \strlen( $string_to_download ) ;

    // =========================================================================
    // UNPACKED STRING OK ?
    // =========================================================================

    if ( $unpacked_checksum !== $checksum ) {

        $msg = <<<EOT
PROBLEM:&nbsp; Download string checksum error
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        die( \nl2br( $msg ) ) ;

    }

    // =========================================================================
    // As a further safety check, we make sure that the UNPACKED STRING IS
    // NON-EMPTY...
    //
    // NOTE!
    // =====
    // The unpacked string IS allowed to be blank (all white space).
    // =========================================================================

    if ( $string_to_download === '' ) {

        $msg = <<<EOT
PROBLEM:&nbsp; Download string is empty
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        die( \nl2br( $msg ) ) ;

    }

    // =========================================================================
    // DELIVER the requested DOWNLOAD...
    // =========================================================================

    header( 'Content-Description: File Transfer' ) ;
    header( 'Content-Type: {$content_type}' ) ;
    header( 'Content-Disposition: attachment; filename="' . $output_file_basename . '"' ) ;
    header( 'Expires: 0' ) ;
    header( 'Cache-Control: must-revalidate' ) ;
    header( 'Pragma: public' ) ;
    header( 'Content-Length: ' . strlen( $string_to_download ) ) ;

    // -------------------------------------------------------------------------

    ob_clean() ;
    flush() ;

    // -------------------------------------------------------------------------

    echo $string_to_download ;

    exit() ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================

