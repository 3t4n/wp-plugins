<?php

// *****************************************************************************
// AD-SWAPPER.APP / PLUGIN.STUFF / AD-SWAPPER-PROPER.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_pluginSetup ;

// =============================================================================
// SESSION SUPPORT
// (Needed for saving pages in the Basepress Page Cache.)
// =============================================================================

    function start_session_for_basepress_page_cache() {
        if ( session_id() === '' ) {
            session_start() ;
        }
    }

    add_action ( 'init' , '\\' . __NAMESPACE__ . '\\start_session_for_basepress_page_cache' , 1 ) ;

// =============================================================================
// get_export_version_short_slug()
// =============================================================================

function get_export_version_short_slug() {
    return 'local' ;
}

// =============================================================================
// is_export_version_short_slug()
// =============================================================================

function is_export_version_short_slug( $instr ) {
    return ( $instr === 'local' ) ;
}

// =============================================================================
// Common Stuff...
// =============================================================================

//  require_once( dirname( __FILE__ ) . '/common.php' ) ;

// =============================================================================
// Install this plugin's SHORTCODES...
// =============================================================================

//  require_once( dirname( __FILE__ ) . '/shortcodes/wp-clippings.php' ) ;

// =============================================================================
// Register this plugin's CUSTOM POST TYPES...
// =============================================================================

//  require_once( dirname( __FILE__ ) . '/scripts/wp-clippings-custom-post-type/wp-clippings-custom-post-type.php' ) ;

// =============================================================================
// Register this plugin's WIDGETS...
// =============================================================================

    require_once( dirname( __FILE__ ) . '/ad-displayer/ad-display-widget.php' ) ;

// =============================================================================
// Load the (global) PHP function (used to display Ad Swapper ads in WordPress
// themes - without using widgets)...
// =============================================================================

    require_once( dirname( __FILE__ ) . '/ad-displayer/adswapper-display-ad-slot-ads.php' ) ;

// =============================================================================
// Load the Ad Swapper shortcodes (used to display Ad Swapper ads in WordPress
// page/post content)...
// =============================================================================

    require_once( dirname( __FILE__ ) . '/ad-displayer/shortcodes.php' ) ;

// =============================================================================
// Hook this plugin's HOOKS...
// =============================================================================

//  require_once( dirname( __FILE__ ) . '/hooks/wp/wp.php' ) ;
        //  Records page requests (for reporting purposes).
        //
        //  Implemented but commented out.  Since results in a lot of stored
        //  data - which we're not using yet.

// =============================================================================
// Database Updating...
// =============================================================================

    require_once( dirname( __FILE__ ) . '/get-database-update-method.php' ) ;

// =============================================================================
// Positions for Core Menu Items
// =============================================================================

//    2 Dashboard
//    4 Separator
//    5 Posts
//   10 Media
//   15 Links
//   20 Pages
//   25 Comments
//   59 Separator
//   60 Appearance
//   65 Plugins
//   70 Users
//   75 Tools
//   80 Settings
//   99 Separator

// =============================================================================
// See also:-
//      add_menu_page()
//      remove_menu_page()
//
//      add_submenu_page()
//      remove_submenu_page()
//
//      add_dashboard_page()
//      add_posts_page()
//      add_media_page()
//      add_links_page()
//      add_pages_page()
//      add_comments_page()
//      add_theme_page()
//      add_plugins_page()
//      add_users_page()
//      add_management_page()
//      add_options_page()
// =============================================================================

// =============================================================================
// CREATE ADMIN MENU
// =============================================================================

    // -------------------------------------------------------------------------
    // add_menu_page(
    //      $page_title     ,
    //      $menu_title     ,
    //      $capability     ,
    //      $menu_slug      ,
    //      $function       ,
    //      $icon_url       ,
    //      $position
    //      )
    // - - - - - - - - - - -
    // PARAMETERS
    //
    //      $page_title
    //          (string) (required) The text to be displayed in the title tags
    //          of the page when the menu is selected
    //          Default: None
    //
    //      $menu_title
    //          (string) (required) The on-screen name text for the menu
    //          Default: None
    //
    //      $capability
    //          (string) (required) The capability required for this menu to be
    //          displayed to the user.  User levels are deprecated and should
    //          not be used here!
    //          Default: None
    //
    //      $menu_slug
    //          (string) (required) The slug name to refer to this menu by
    //          (should be unique for this menu).  Prior to Version 3.0 this
    //          was called the file (or handle) parameter.  If the function
    //          parameter is omitted, the menu_slug should be the PHP file that
    //          handles the display of the menu page content.
    //          Default: None
    //
    //      $function
    //          The function that displays the page content for the menu page.
    //          Technically, the function parameter is optional, but if it is
    //          not supplied, then WordPress will basically assume that
    //          including the PHP file will generate the administration screen,
    //          without calling a function.  Most plugin authors choose to put
    //          the page-generating code in a function within their main plugin
    //          file.  In the event that the function parameter is specified,
    //          it is possible to use any string for the file parameter.  This
    //          allows usage of pages such as ?page=my_super_plugin_page
    //          instead of ?page=my-super-plugin/admin-options.php.
    //
    //          The function must be referenced in one of two ways:
    //
    //          o   If the function is a member of a class within the plugin
    //              it should be referenced as array( $this, 'function_name' )
    //
    //          o   In all other cases, using the function name itself is
    //              sufficient
    //
    //      $icon_url
    //          (string) (optional) The url to the icon to be used for this
    //          menu.  This parameter is optional.  Icons should be fairly
    //          small, around 16 x 16 pixels for best results.  You can use
    //          the plugin_dir_url( __FILE__ ) function to get the URL of your
    //          plugin directory, and then add the image filename to it.  You
    //          can set $icon_url to "div" to have wordpress generate <br> tag
    //          instead of <img>.  This can be used for more advanced formating
    //          via CSS, such as changing icon on hover.
    //          Default:
    //
    //      $position
    //          (integer) (optional) The position in the menu order this menu
    //          should appear.  By default, if this parameter is omitted, the
    //          menu will appear at the bottom of the menu structure.  The
    //          higher the number, the lower its position in the menu.
    //          WARNING: if two menu items use the same position attribute,
    //          one of the items may be overwritten so that only one item
    //          displays!  Risk of conflict can be reduced by using decimal
    //          instead of integer values, e.g. 63.3 instead of 63 (Note: Use
    //          quotes in code, IE '63.3').
    //          Default: bottom of menu structure
    //
    // RETURNS
    //
    //      string $hookname used internally to track menu page callbacks for
    //      outputting the page inside the global $menu array
    // -------------------------------------------------------------------------

    require_once( dirname( __FILE__ ) . '/admin/home.php' ) ;

    // -------------------------------------------------------------------------

    function add_admin_menu() {

        if ( is_adswapper_admanager_site() ) {

            $page_title = 'Ad Swapper Ad Manager v0.1.211 - Admin Section' ;
            $menu_title = 'Ad Swapper Ad Manager v0.1.211'                 ;

            $capability = 'read' ;

        } else {

            // -----------------------------------------------------------------
            // Here we should have (eg):-
            //
            //      $GLOBALS['wordpress_plugins_repository_support'] = array(
            //          'is_wordpress_plugins_repository_specific_version'      =>  FALSE           ,
            //          'plugin_title_4_admin_left_menu'                        =>  'Ad Swapper'    ,
            //          'plugin_title_4_page_header'                            =>  'Ad Swapper'    ,
            //          'wordpress_plugins_repository_specific_version_number'  =>  '[*WPRSVN*]'
            //          ) ;
            //
            // -----------------------------------------------------------------

            $page_title = '' ;
            $menu_title = '' ;

            // -----------------------------------------------------------------

            if (    array_key_exists(
                        'wordpress_plugins_repository_support'  ,
                        $GLOBALS
                        )
                    &&
                    is_array( $GLOBALS['wordpress_plugins_repository_support'] )
                    &&
                    array_key_exists(
                        'is_wordpress_plugins_repository_specific_version'  ,
                        $GLOBALS['wordpress_plugins_repository_support']
                        )
                    &&
                    $GLOBALS['wordpress_plugins_repository_support']['is_wordpress_plugins_repository_specific_version'] === TRUE
                ) {

                // -------------------------------------------------------------

                if (    array_key_exists(
                            'plugin_title_4_page_header'                        ,
                            $GLOBALS['wordpress_plugins_repository_support']
                            )
                        &&
                        is_string( $GLOBALS['wordpress_plugins_repository_support']['plugin_title_4_page_header'] )
                    ) {
                    $page_title = trim(
                        $GLOBALS['wordpress_plugins_repository_support']['plugin_title_4_page_header']
                        ) ;
                }

                // -------------------------------------------------------------

                if (    array_key_exists(
                            'plugin_title_4_admin_left_menu'                    ,
                            $GLOBALS['wordpress_plugins_repository_support']
                            )
                        &&
                        is_string( $GLOBALS['wordpress_plugins_repository_support']['plugin_title_4_admin_left_menu'] )
                    ) {
                    $menu_title = trim(
                        $GLOBALS['wordpress_plugins_repository_support']['plugin_title_4_admin_left_menu']
                        ) ;
                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------

            if ( $page_title === '' ) {
                $page_title =
                    'Ad Swapper Local v0.1.211 - Admin Section'
                    ;
            }

            // -----------------------------------------------------------------

            if ( $menu_title === '' ) {
                $menu_title =
                    'Ad Swapper Local v0.1.211'
                    ;
            }

            // -----------------------------------------------------------------

            $capability = 'manage_options' ;

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------

        $menu_slug  = 'adSwapperLocalV0x1x211'                        ;

        $function   = '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_adminSection\\home_page'    ;

        $icon_url   = '' ;

//      $position   = 58.1          ;   //  Just below WooCommerce Products
//      $position   = '91.3456'     ;   //  Bottom of menu (after Settings)
        $position   = NULL          ;   //  Bottom of menu (after Settings)

        add_menu_page(
            $page_title     ,
            $menu_title     ,
            $capability     ,
            $menu_slug      ,
            $function       ,
            $icon_url       ,
            $position
            ) ;

    }

    // -------------------------------------------------------------------------

    add_action( 'admin_menu' , '\\' . __NAMESPACE__ . '\\add_admin_menu' ) ;

// =============================================================================
// CREATE ADMIN SUB-MENU
// =============================================================================

    // -------------------------------------------------------------------------
    // add_submenu_page(
    //      $parent_slug        ,
    //      $page_title         ,
    //      $menu_title         ,
    //      $capability         ,
    //      $menu_slug          ,
    //      $function
    //      )
    // - - - - - - - - - - - - -
    // Add a sub menu page.
    //
    // This function should normally be hooked in with one of the the
    // admin_menu actions depending on the menu where the sub menu is to
    // appear:
    //      admin_menu          The normal, or site, administration menu
    //      user_admin_menu     The user administration menu
    //      network_admin_menu  The network administration menu
    //
    // PARAMETERS
    //
    //      $parent_slug
    //          (string) (required) The slug name for the parent menu (or the
    //          file name of a standard WordPress admin page).  Use NULL or
    //          set to 'options.php' if you want to create a page that doesn't
    //          appear in any menu.
    //          Default:
    //
    //          Examples:
    //
    //              For Dashboard: add_submenu_page( 'index.php', ... ) ;
    //                  Also see add_dashboard_page()
    //              For Posts: add_submenu_page( 'edit.php', ... ) ;
    //                  Also see Also see add_posts_page()
    //              For Media: add_submenu_page( 'upload.php', ... ) ;
    //                  Also see add_media_page()
    //              For Links: add_submenu_page( 'link-manager.php', ... ) ;
    //                  Also see add_links_page()
    //              For Pages: add_submenu_page( 'edit.php?post_type=page', ... ) ;
    //                  Also see add_pages_page()
    //              For Comments: add_submenu_page( 'edit-comments.php', ... ) ;
    //                  Also see add_comments_page()
    //              For Custom Post Types: add_submenu_page( 'edit.php?post_type=your_post_type', ... ) ;
    //              For Appearance: add_submenu_page( 'themes.php', ... ) ;
    //                  Also see add_theme_page()
    //              For Plugins: add_submenu_page( 'plugins.php', ... ) ;
    //                  Also see add_plugins_page()
    //              For Users: add_submenu_page( 'users.php', ... ) ;
    //                  Also see add_users_page()
    //              For Tools: add_submenu_page( 'tools.php', ... ) ;
    //                  Also see add_management_page()
    //              For Settings: add_submenu_page( 'options-general.php', ... ) ;
    //                  Also see add_options_page()
    //
    //      $page_title
    //          (string) (required) The text to be displayed in the title tags
    //          of the page when the menu is selected
    //          Default:
    //
    //      $menu_title
    //          (string) (required) The text to be used for the menu
    //          Default:
    //
    //      $capability
    //          (string) (required) The capability required for this menu to be
    //          displayed to the user.
    //          Default:
    //
    //      $menu_slug
    //          (string) (required) The slug name to refer to this menu by
    //          (should be unique for this menu).  If you want to NOT duplicate
    //          the parent menu item, you need to set the name of the $menu_slug
    //          exactly the same as the parent slug.
    //          Default:
    //
    //          NOTE!
    //          =====
    //          In situations where a plugin is creating its own top-level menu,
    //          the first submenu will normally have the same link title as the
    //          top-level menu and hence the link will be duplicated. The
    //          duplicate link title can be avoided by calling the
    //          add_submenu_page function the first time with the parent_slug
    //          and menu_slug parameters being given the same value.
    //
    //      $function
    //          (string / array) (optional) The function to be called to output
    //          the content for this page.
    //          Default:
    //
    //          The function must be referenced in one of two ways:
    //
    //          o   If the function is a member of a class within the plugin
    //              it should be referenced as array( $this, 'function_name' )
    //              if the class is instantiated as an object or
    //              array( __CLASS__, 'function_name' ) if it's called
    //              statically
    //
    //          o   In all other cases, using the function name itself is
    //              sufficient
    //
    // RETURNS
    //      string The resulting page's hook_suffix, or false if the user does
    //      not have the capability required.
    //
    // NOTE!
    // -----
    // For $menu_slug please don't use __FILE__ it makes for an ugly URL, and
    // is a minor security nuance.
    // -------------------------------------------------------------------------

    // =========================================================================
    // Admin Home...
    // =========================================================================

/*
//  require_once( dirname( __FILE__ ) . '/admin/home.php' ) ;

    // -------------------------------------------------------------------------

    function add_adminMenuItem_home_page() {

        $parent_slug = 'researchAssistant'                                          ;
        $page_title  = 'Research Assistant - Admin Home Page'                       ;
        $menu_title  = 'Admin Home'                                                 ;
        $capability  = 'manage_options'                                             ;
        $menu_slug   = 'researchAssistant'                                          ;
        $function   = '\\researchAssistant_byFernTec_adminSection\\home_page'       ;

        add_submenu_page(
            $parent_slug    ,
            $page_title     ,
            $menu_title     ,
            $capability     ,
            $menu_slug      ,
            $function
            ) ;

    }

    // ---------------------------------------------------------------------

    add_action( 'admin_menu' , '\\researchAssistant_byFernTec_pluginSetup\\add_adminMenuItem_home_page' ) ;
*/

// =============================================================================
// Enqueue this Plugin's Styles and Scripts...
// =============================================================================

function enqueue_my_styles_and_scripts() {

    // =========================================================================
    // Scott Hamper Cookies
    // =========================================================================

    $handle    = 'scott-hamper-cookies' ;
    $deps      = FALSE                  ;
    $ver       = '0.3.1'                ;
    $in_footer = FALSE                  ;

    // -------------------------------------------------------------------------

    $src       = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_js_url() .
                 '/scottHamperCookies.js'
                 ;

    // -------------------------------------------------------------------------

    \wp_enqueue_script( $handle , $src , $deps , $ver , $in_footer ) ;

    // =========================================================================
    // TinyColor
    // =========================================================================

//  $handle    = 'tinycolor'            ;
//  $deps      = FALSE                  ;
//  $ver       = '1.0.0'                ;
//  $in_footer = FALSE                  ;
//
//  // -------------------------------------------------------------------------
//
//  $src       = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_js_url() .
//               '/tinycolor.js'
//               ;
//
//  // -------------------------------------------------------------------------
//
//  \wp_enqueue_script( $handle , $src , $deps , $ver , $in_footer ) ;

    // =========================================================================
    // jQuery
    // =========================================================================

//  \wp_enqueue_script( 'jquery' ) ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// -----------------------------------------------------------------------------

    add_action(
        'admin_enqueue_scripts'                                     ,
        '\\' . __NAMESPACE__ . '\\enqueue_my_styles_and_scripts'
        ) ;

//  add_action(
//      'wp_enqueue_scripts'                                        ,
//      '\\' . __NAMESPACE__ . '\\enqueue_my_styles_and_scripts'
//      ) ;

// =============================================================================
// WORDPRESS ADMIN DOWNLOADS
// =============================================================================

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

//  function get_admin_downloader_required_capabilities() {
//      return array(
//                  'all'   =>  array(
//                                  'manage_options'
//                                  )
//                  ) ;
//  }
//
//  // -------------------------------------------------------------------------
//
//  require_once( dirname( dirname( dirname( dirname( __FILE__ ) ) ) ) . '/includes/wp-admin-downloads-delivery.php' ) ;
//
//  // -------------------------------------------------------------------------
//
//  add_action(
//      'admin_init'                                                                                        ,
//      '\\greatKiwi_byFernTec_adSwapper_local_v0x1x211_wpAdminDownloads\\admin_init_handler'     ,
//      1
//      ) ;

// =============================================================================
// Ad Swapper Ad Manager Site Support...
// =============================================================================

    require_once( dirname( __FILE__ ) . '/adswapper-admanager-support.php' ) ;

// =============================================================================
// Add the "remote/get-cached-page.php" support...
// =============================================================================

    function greatKiwi_byFerntec_getCachedPage_callback() {

//      global $wpdb; // this is how you get access to the database
//      $whatever = intval( $_POST['whatever'] );
//      $whatever += 10;
//      echo $whatever;

        require( dirname( dirname( dirname( dirname( __FILE__ ) ) ) ) . '/remote/get-cached-page.php' ) ;

        wp_die(); // this is required to terminate immediately and return a proper response

    }

// -----------------------------------------------------------------------------

    add_action(
        'wp_ajax_greatKiwi_byFerntec_getCachedPage'                             ,
        '\\' . __NAMESPACE__ . '\\greatKiwi_byFerntec_getCachedPage_callback'
        ) ;

// =============================================================================
// Add the "handle ads list reload request" support...
// =============================================================================

    function greatKiwi_byFerntec_handleAdsListReloadRequest_callback() {

//      global $wpdb; // this is how you get access to the database
//      $whatever = intval( $_POST['whatever'] );
//      $whatever += 10;
//      echo $whatever;

        require( dirname( __FILE__ ) . '/ad-displayer/handle-ads-list-reload-request.php' ) ;

        \greatKiwi_byFerntec_handleAdsListReloadRequest\handle_ads_list_reload_request() ;

        wp_die(); // this is required to terminate immediately and return a proper response

    }

// -----------------------------------------------------------------------------

    add_action(
        'wp_ajax_greatKiwi_byFerntec_handleAdsListReloadRequest'                            ,
        '\\' . __NAMESPACE__ . '\\greatKiwi_byFerntec_handleAdsListReloadRequest_callback'
        ) ;

// =============================================================================
// Add the "toggle available ads" support...
// =============================================================================

    function greatKiwi_byFerntec_toggleAvailableAds_callback() {

//      global $wpdb; // this is how you get access to the database
//      $whatever = intval( $_POST['whatever'] );
//      $whatever += 10;
//      echo $whatever;

        require( dirname( __FILE__ ) . '/extras/toggle-available-ads/toggle-available-ad.php' ) ;

        wp_die(); // this is required to terminate immediately and return a proper response

    }

// -----------------------------------------------------------------------------

    add_action(
        'wp_ajax_greatKiwi_byFerntec_toggleAvailableAds'                            ,
        '\\' . __NAMESPACE__ . '\\greatKiwi_byFerntec_toggleAvailableAds_callback'
        ) ;

// =============================================================================
// Add the "toggle available sites" support...
// =============================================================================

    function greatKiwi_byFerntec_toggleAvailableSites_callback() {

//      global $wpdb; // this is how you get access to the database
//      $whatever = intval( $_POST['whatever'] );
//      $whatever += 10;
//      echo $whatever;

        require( dirname( __FILE__ ) . '/extras/toggle-available-sites/toggle-available-site.php' ) ;

        wp_die(); // this is required to terminate immediately and return a proper response

    }

// -----------------------------------------------------------------------------

    add_action(
        'wp_ajax_greatKiwi_byFerntec_toggleAvailableSites'                              ,
        '\\' . __NAMESPACE__ . '\\greatKiwi_byFerntec_toggleAvailableSites_callback'
        ) ;

// =============================================================================
// That's that!
// =============================================================================

