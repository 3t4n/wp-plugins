<?php

// *****************************************************************************
// INCLUDES / WORDPRESS-URL-TO-PAGE-NAME-SLASH-TITLE.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_wordpressUtils ;

// =============================================================================
// wordpress_url_to_page_name_slash_title()
// =============================================================================

function wordpress_url_to_page_name_slash_title(
    $target_url
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_wordpressUtils\
    // wordpress_url_to_page_name_slash_title(
    //      $target_url
    //      )
    // - - - - - - - - - - - - - - - - - - - -
    // Trys to convert the specified request URL to the name/title of the
    // page (in the generic sense), that WordPress has/will display (given
    // that request URL).
    //
    // RETURNS
    //      o   On SUCCESS
    //              $page_name_slash_title STRING
    //
    //      o   On FAILURE
    //              array( $error_message STRING )
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $target_url , '$target_url' ) ;

    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    // OVERVIEW
    // ========
    // We're trying to convert the URL of some display WordPress (front-end)
    // page, to a meaningful page name/title.
    //
    // Although WordPress must convert each page request URL it receives to
    // the page that it displays, it doesn't seem to provide any single
    // function that enables one to find out which page will be displayed
    // for a given request URL.
    //
    // Any WordPress supports a lot of different page types and URL formats.
    // So manually identifying the "page" (in the general sense), that
    // WordPress will render for a given request URL, is complicated and
    // messy.
    //
    // Basically, we just have to step through the various URL formats
    // supported by WordPress (and the "pages" - in the general sense - that
    // it displays), until we find a match...
    // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    // =========================================================================
    // Init...
    // =========================================================================

    $ns = __NAMESPACE__     ;
    $fn = __FUNCTION__      ;
    $ln = (string) __LINE__ ;

    // =========================================================================
    // Untrailingslash the target url (because the comparisons below assume
    // this form)...
    // =========================================================================

    $target_url = \untrailingslashit( $target_url) ;

    // =========================================================================
    // The HOME PAGE is probably the most frequently requested "page" on any
    // site.  So let's try that first...
    // =========================================================================

    // -------------------------------------------------------------------------
    // get_home_url( $blog_id, $path, $scheme )
    // - - - - - - - - - - - - - - - - - - - -
    // The get_home_url template tag retrieves the home url for a given site.
    // Returns the 'home' option with the appropriate protocol, 'https' if
    // is_ssl() and 'http' otherwise. If scheme is 'http' or 'https', is_ssl()
    // is overridden.
    //
    //      $blog_id
    //          (integer) (optional) Blog ID.
    //
    //          Default: null (the current blog)
    //
    //      $path
    //          (string) (optional) Path relative to the home url.
    //
    //          Default: None
    //
    //      $scheme
    //          (string) (optional) Scheme to give the home url context.
    //          Currently 'http', 'https' and 'relative'.
    //
    //          Default: null
    //
    // RETURNS
    //      (string) Home url link with optional path appended.
    //
    // HOOKS
    //      apply_filters() Calls 'home_url' hook on home url before returning.
    //
    // CHANGELOG
    //      Since: 3.0.0
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // get_site_url( $blog_id, $path, $scheme )
    // - - - - - - - - - - - - - - - - - - - -
    // The get_site_url() template tag retrieves the site url for a given site.
    // Returns the 'siteurl' option with the appropriate protocol, 'https' if
    // is_ssl() and 'http' otherwise. If $scheme is 'http' or 'https', is_ssl()
    // is overridden.
    //
    //      $blog_id
    //          (integer) (optional) Blog ID.
    //
    //          Default: current blog
    //
    //      $path
    //          (string) (optional) Path relative to the site url.
    //
    //          Default: None
    //
    //      $scheme
    //          (string) (optional) Scheme to give the site url context.
    //          Currently 'http', 'https', 'login', 'login_post', 'admin' or
    //          'relative'.
    //
    //          Default: null
    //
    // RETURNS
    //      (string) Site url link with optional path appended.
    //
    // FILTER
    //      apply_filters( 'site_url', $url, $path, $orig_scheme, $blog_id );
    //
    // CHANGELOG
    //      Since: 3.0
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // $bloginfo = get_bloginfo( $show, $filter )
    // - - - - - - - - - - - - - - - - - - - - -
    // Returns information about your site which can then be used elsewhere in
    // your PHP code. This function, as well as bloginfo(), can also be used to
    // display your site information anywhere within a template file.
    //
    //      $show
    //          (string) (Optional) Keyword naming the information you want.
    //
    //          Default: name
    //
    //          'name'                  -   Returns the "Site Title" set in
    //                                      Settings > General. This data is
    //                                      retrieved from the "blogname" record
    //                                      in the wp_options table.
    //
    //          'description'           -   Returns the "Tagline" set in
    //                                      Settings > General. This data is
    //                                      retrieved from the "blogdescription"
    //                                      record in the wp_options table.
    //
    //          'wpurl'                 -   Returns the "WordPress address
    //                                      (URL)" set in Settings > General.
    //                                      This data is retrieved from the
    //                                      "siteurl" record in the wp_options
    //                                      table. Consider using site_url()
    //                                      instead, especially for multi-site
    //                                      configurations using paths instead
    //                                      of subdomains (it will return the
    //                                      root site not the current sub-site).
    //
    //          'url'                   -   Returns the "Site address (URL)" set
    //                                      in Settings > General. This data is
    //                                      retrieved from the "home" record in
    //                                      the wp_options table. Equivalent to
    //                                      home_url().
    //
    //          'admin_email'           -   Returns the "E-mail address" set in
    //                                      Settings > General. This data is
    //                                      retrieved from the "admin_email"
    //                                      record in the wp_options table.
    //
    //          'charset'               -   Returns the "Encoding for pages and
    //                                      feeds" set in Settings > Reading.
    //                                      This data is retrieved from the
    //                                      "blog_charset" record in the
    //                                      wp_options table.
    //
    //          'version'               -   Returns the WordPress Version you
    //                                      use. This data is retrieved from the
    //                                      $wp_version variable set in
    //                                      wp-includes/version.php.
    //
    //          'html_type'             -   Returns the Content-Type of
    //                                      WordPress HTML pages (default:
    //                                      "text/html"). This data is retrieved
    //                                      from the "html_type" record in the
    //                                      wp_options table. Themes and plugins
    //                                      can override the default value using
    //                                      the pre_option_html_type filter.
    //
    //          'text_direction'        -   Returns the Text Direction of
    //                                      WordPress HTML pages. Consider using
    //                                      is_rtl() instead.
    //
    //          'language'              -   Returns the language of WordPress.
    //
    //          'stylesheet_url'        -   Returns the primary CSS (usually
    //                                      style.css) file URL of the active
    //                                      theme. Consider using
    //                                      get_stylesheet_uri() instead.
    //
    //          'stylesheet_directory'  -   Returns the stylesheet directory URL
    //                                      of the active theme. (Was a local
    //                                      path in earlier WordPress versions.)
    //                                      Consider using
    //                                      get_stylesheet_directory_uri()
    //                                      instead.
    //
    //          'template_url' / 'template_directory'
    //                                  -   URL of the active theme's directory
    //                                      ('template_directory' was a local
    //                                      path before 2.6; see
    //                                      get_theme_root() and get_template()
    //                                      for hackish alternatives.) Within
    //                                      child themes, both
    //                                      get_bloginfo('template_url') and
    //                                      get_template() will return the
    //                                      parent theme directory. Consider
    //                                      using get_template_directory_uri()
    //                                      instead (for the parent template
    //                                      directory) or
    //                                      get_stylesheet_directory_uri() (for
    //                                      the child template directory).
    //
    //          'pingback_url'          -   Returns the Pingback XML-RPC file
    //                                      URL (xmlrpc.php).
    //
    //          'atom_url'              -   Returns the Atom feed URL
    //                                      (/feed/atom).
    //
    //          'rdf_url'               -   Returns the RDF/RSS 1.0 feed URL
    //                                      (/feed/rfd).
    //
    //          'rss_url'               -   Returns the RSS 0.92 feed URL
    //                                      (/feed/rss).
    //
    //          'rss2_url'              -   Returns the RSS 2.0 feed URL
    //                                      (/feed).
    //
    //          'comments_atom_url'     -   Returns the comments Atom feed URL
    //                                      (/comments/feed).
    //
    //          'comments_rss2_url'     -   Returns the comments RSS 2.0 feed
    //                                      URL (/comments/feed).
    //
    //          'siteurl'               -   Deprecated since version 2.2. Use
    //                                      home_url(), or get_bloginfo('url').
    //
    //          'home'                  -   Deprecated since version 2.2. Use
    //                                      home_url(), or get_bloginfo('url').
    //
    //      $filter
    //          (string) (Optional) Keyword specifying how to filter what is
    //          retrieved.
    //
    //          Default: raw
    //
    //          'display'   -   Passes the value of $show through the
    //                          wptexturize() function before returning it to
    //                          caller.
    //
    //          'raw'       -   Returns the value of $show as is.
    //
    // CHANGE LOG
    //      Since: 0.71
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( \get_home_url() , '\\get_home_url()' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( \get_site_url() , '\\get_site_url()' ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( \bloginfo('url') , '\\bloginfo(\'url\')' ) ;

    if (    (   \function_exists( '\\get_home_url' )
                &&
                $target_url === \get_home_url()
            )
            ||
            (   \function_exists( '\\get_site_url' )
                &&
                $target_url === \get_site_url()
            )
            ||
            $target_url === get_bloginfo( 'url' )
        ) {

        return 'Home Page' ;

    }

    // =========================================================================
    // Break the URL into it's components (to make subsequent analysis easier...
    // =========================================================================

    // -------------------------------------------------------------------------
    // mixed parse_url ( string $url [, int $component = -1 ] )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // This function parses a URL and returns an associative array containing
    // any of the various components of the URL that are present.
    //
    // This function is not meant to validate the given URL, it only breaks it
    // up into the above listed parts. Partial URLs are also accepted,
    // parse_url() tries its best to parse them correctly.
    //
    //      url
    //          The URL to parse. Invalid characters are replaced by _.
    //
    //      component
    //          Specify one of:-
    //              PHP_URL_SCHEME
    //              PHP_URL_HOST
    //              PHP_URL_PORT
    //              PHP_URL_USER
    //              PHP_URL_PASS
    //              PHP_URL_PATH
    //              PHP_URL_QUERY
    //              PHP_URL_FRAGMENT
    //          to retrieve just a specific URL component as a string (except
    //          when PHP_URL_PORT is given, in which case the return value will
    //          be an integer).
    //
    // RETURN VALUES
    //      On seriously malformed URLs, parse_url() may return FALSE.
    //
    //      If the component parameter is omitted, an associative array is
    //      returned. At least one element will be present within the array.
    //      Potential keys within this array are:
    //
    //          scheme - e.g. http
    //          host
    //          port
    //          user
    //          pass
    //          path
    //          query - after the question mark ?
    //          fragment - after the hashmark #
    //
    //      If the component parameter is specified, parse_url() returns a
    //      string (or an integer, in the case of PHP_URL_PORT) instead of an
    //      array. If the requested component doesn't exist within the given
    //      URL, NULL will be returned.
    //
    // CHANGELOG
    //
    //      Version Description
    //
    //      5.4.7   Fixed host recognition when scheme is omitted and a leading
    //              component separator is present.
    //
    //      5.3.3   Removed the E_WARNING that was emitted when URL parsing
    //              failed.
    //
    //      5.1.2   Added the component parameter.
    //
    // (PHP 4, PHP 5)
    //
    // Notes
    //
    //      This function doesn't work with relative URLs.
    //
    //      This function is intended specifically for the purpose of parsing
    //      URLs and not URIs. However, to comply with PHP's backwards
    //      compatibility requirements it makes an exception for the file://
    //      scheme where triple slashes (file:///...) are allowed. For any other
    //      scheme this is invalid.
    // -------------------------------------------------------------------------

    $target_url_components =
        \parse_url( $target_url )
        ;

    // -------------------------------------------------------------------------
    // void parse_str ( string $str [, array &$arr ] )
    // - - - - - - - - - - - - - - - - - - - - - - - -
    // Parses str as if it were the query string passed via a URL and sets
    // variables in the current scope.
    //
    //  Note:   To get the current QUERY_STRING, you may use the variable
    //          $_SERVER['QUERY_STRING']. Also, you may want to read the section
    //          on variables from external sources.
    //
    //  Note:   The magic_quotes_gpc setting affects the output of this
    //          function, as parse_str() uses the same mechanism that PHP uses
    //          to populate the $_GET, $_POST, etc. variables.
    //
    //  str
    //      The input string.
    //
    //  arr
    //      If the second parameter arr is present, variables are stored in this
    //      variable as array elements instead.
    //
    // RETURN VALUES
    //      No value is returned.
    //
    // (PHP 4, PHP 5)
    // -------------------------------------------------------------------------

    $target_url_query_vars = array() ;

    // -------------------------------------------------------------------------

    if (    array_key_exists( 'query' , $target_url_components )
            &&
            trim( $target_url_components['query'] ) !== ''
        ) {

        \parse_str(
                $target_url_components['query']     ,
                $target_url_query_vars
                ) ;

    }

    // =========================================================================
    // Another common WordPress URL format is the "page_id=N" format used for
    // pages.  Ie:-
    //      http://localhost/plugdev/?page_id=2
    // =========================================================================

    if (    \array_key_exists( 'page_id' , $target_url_query_vars )
            &&
            \trim( $target_url_query_vars['page_id'] ) !== ''
            &&
            \ctype_digit( $target_url_query_vars['page_id'] )
            &&
            $target_url_query_vars['page_id'] > 0
        ) {

        // -------------------------------------------------------------------------
        // get_post( $id, $output, $filter )
        // - - - - - - - - - - - - - - - - -
        // Takes a post ID and returns the database record for that post. You can
        // specify, by means of the $output parameter, how you would like the
        // results returned.
        //
        //      $id
        //          (integer or object) (optional) The ID of the post you'd like to
        //          fetch, or an object that specifies the post. By default the
        //          current post is fetched.
        //
        //          Default: null
        //
        //      $output
        //          (string) (optional) How you'd like the result.
        //
        //          OBJECT  - (default) returns a WP_Post object
        //          ARRAY_A - Returns an associative array of field names to values
        //          ARRAY_N - returns a numeric array of field values
        //
        //          Default: OBJECT
        //
        //      $filter
        //          (string) (optional) Filter the post. See sanitize_post_field()
        //          for a full list of values.
        //
        //          raw - (default)
        //
        //          Default: raw
        //
        // RETURN VALUES
        //      Returns a WP_Post object, or null if the post doesnt exist or an
        //      error occurred.
        //
        // NOTES
        //  Before version 3.5, the first parameter $post was required to be a
        //  variable. For example, get_post(7) would cause a fatal error.
        //
        // Change Log
        //      Since 1.5.1
        //      3.5.0 - the $post parameter is no longer passed by reference.
        // -------------------------------------------------------------------------

        $this_post = \get_post(
                            $target_url_query_vars['page_id']   ,
                            ARRAY_A
                            ) ;

        // ---------------------------------------------------------------------

        if (    is_array( $this_post )
                &&
                array_key_exists( 'post_title' , $this_post )
                &&
                is_string( $this_post['post_title'] )
                &&
                trim( $this_post['post_title'] ) !== ''
            ) {

            return htmlentities( $this_post['post_title'] ) ;

        }

        // ---------------------------------------------------------------------

    }


    // =========================================================================
    // LOAD the POSTS (from WordPress)...
    // =========================================================================

    // -------------------------------------------------------------------------
    // $posts_array = get_posts( $args )
    // - - - - - - - - - - - - - - - - -
    // The most appropriate use for get_posts is to create an array of posts
    // based on a set of parameters. It retrieves a list of recent posts or
    // posts matching this criteria. get_posts can also be used to create
    // Multiple Loops, though a more direct reference to WP_Query using new
    // WP_Query is preferred in this case.
    //
    // The parameters of get_posts are similar to those of get_pages but are
    // implemented quite differently, and should be used in appropriate
    // scenarios. get_posts uses WP_Query, whereas get_pages queries the
    // database more directly. Each have parameters that reflect this difference
    // in implementation.
    //
    // query_posts also uses WP_Query, but is not recommended because it
    // directly alters the main loop by changing the variables of the global
    // variable $wp_query. get_posts, on the other hand, simply references a new
    // WP_Query object, and therefore does not affect or alter the main loop.
    //
    // If you would like to alter the main query before it is executed, you can
    // hook into it using pre_get_posts. If you would just like to call an array
    // of posts based on a small and simple set of parameters within a page,
    // then get_posts is your best option.
    //
    // DEFAULT USAGE
    //
    //      $args = array(
    //                  'posts_per_page'   => 5,
    //                  'offset'           => 0,
    //                  'category'         => '',
    //                  'orderby'          => 'post_date',
    //                  'order'            => 'DESC',
    //                  'include'          => '',
    //                  'exclude'          => '',
    //                  'meta_key'         => '',
    //                  'meta_value'       => '',
    //                  'post_type'        => 'post',
    //                  'post_mime_type'   => '',
    //                  'post_parent'      => '',
    //                  'post_status'      => 'publish',
    //                  'suppress_filters' => true
    //                  ) ;
    //
    //      NOTE:   'numberposts' and 'posts_per_page' can be used
    //              interchangeably.
    //
    // PARAMETERS
    //      For full parameters list see WP_Query.
    //
    //      See also get_pages() for example parameter usage.
    //
    //      get_posts() makes use of the WP_Query class to fetch posts. See the
    //      parameters section of the WP_Query documentation for a list of
    //      parameters that this function accepts.
    //
    //      Note:   get_posts uses 'suppress_filters' => true as default, while
    //              query_posts() applies filters by default, this can be
    //              confusing when using query-modifying plugins, like WPML.
    //              Also note that even if 'suppress_filters' is true, any
    //              filters attached to pre_get_posts are still applied—only
    //              filters attached on 'posts_*' or 'comment_feed_*' are
    //              suppressed.
    //
    //      Note:   The category parameter needs to be the ID of the category,
    //              and not the category name.
    //
    //      Note:   The category parameter can be a comma separated list of
    //              categories, as the get_posts() function passes the
    //              'category' parameter directly into WP_Query as 'cat'.
    //
    //      'orderby'
    //          (string) (optional) Sort retrieved posts by parameter.
    //
    //          Default: 'date'
    //
    //          'none' - No order (available with Version 2.8).
    //          'ID' - Order by post id. Note the capitalization.
    //          'author' - Order by author.
    //          'title' - Order by title.
    //          'date' - Order by date.
    //          'modified' - Order by last modified date.
    //          'parent' - Order by post/page parent id.
    //          'rand' - Random order.
    //          'comment_count' - Order by number of comments (available with Version 2.9).
    //          'menu_order' - Order by Page Order. Used most often for Pages (Order field in the Edit Page Attributes box) and for Attachments (the integer fields in the Insert / Upload Media Gallery dialog), but could be used for any post type with distinct 'menu_order' values (they all default to 0).
    //          'meta_value' - Note that a 'meta_key=keyname' must also be present in the query. Note also that the sorting will be alphabetical which is fine for strings (i.e. words), but can be unexpected for numbers (e.g. 1, 3, 34, 4, 56, 6, etc, rather than 1, 3, 4, 6, 34, 56 as you might naturally expect).
    //          'meta_value_num' - Order by numeric meta value (available with Version 2.8). Also note that a 'meta_key=keyname' must also be present in the query. This value allows for numerical sorting as noted above in 'meta_value'.
    //          'post__in' - Matches same order you passed in via the 'include' parameter.
    //
    //          Note:   get_pages() uses the parameter 'sort_column' instead of
    //                  'orderby'. Also, get_pages() requires that 'post_' be
    //                  prepended to these values: 'author, date, modified,
    //                  parent, title, excerpt, content'.
    //
    //      'post_mime_type'
    //          (string or array) (Optional) List of mime types or comma
    //          separated string of mime types.
    //
    //          Default: None
    //
    // RETURN VALUE
    //      (array) List of WP_Post objects.
    //
    //      Unlike get_pages(), get_posts() will return private pages in the
    //      appropriate context (i.e., for an administrator). (See: Andreas
    //      Kirsch, WordPress Hacking II, January 24, 2009-- accessed
    //      2012-11-09.)
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // post_type
    // - - - - -
    //      (string / array) - use post types. Retrieves posts by Post Types,
    //      default value is 'post'. If 'tax_query' is set for a query, the
    //      default value becomes 'any';
    //
    //      o   'post' - a post.
    //
    //      o   'page' - a page.
    //
    //      o   'revision' - a revision.
    //
    //      o   'attachment' - an attachment. The default WP_Query sets
    //          'post_status'=>'publish', but attachments default to
    //          'post_status'=>'inherit' so you'll need to explicitly set
    //          post_status to 'inherit' or 'any' as well. (See post_status,
    //          below)
    //
    //      o   'nav_menu_item' - a navigation menu item
    //
    //      o   'any' - retrieves any type except revisions and types with
    //          'exclude_from_search' set to true.
    //
    //      o   Custom Post Types (e.g. movies)
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // post_status
    // - - - - - -
    //      (string / array) - use post status. Retrieves posts by Post Status.
    //      Default value is 'publish', but if the user is logged in, 'private'
    //      is added. And if the query is run in an admin context
    //      (administration area or AJAX call), protected statuses are added
    //      too. By default protected statuses are 'future', 'draft' and
    //      'pending'.
    //
    //      o   'publish'    - a published post or page.
    //
    //      o   'pending'    - post is pending review.
    //
    //      o   'draft'      - a post in draft status.
    //
    //      o   'auto-draft' - a newly created post, with no content.
    //
    //      o   'future'     - a post to publish in the future.
    //
    //      o   'private'    - not visible to users who are not logged in.
    //
    //      o   'inherit'    - a revision. see get_children.
    //
    //      o   'trash'      - post is in trashbin (available with Version 2.9).
    //
    //      o   'any'        - retrieves any status except those from post
    //                         statuses with 'exclude_from_search' set to true
    //                         (i.e. trash and auto-draft).
    // -------------------------------------------------------------------------

//  $args = array(
//              'posts_per_page'   => -1                    ,   //  ALL
//              'offset'           => 0                     ,
//              'category'         => ''                    ,
//              'orderby'          => 'none'                ,
//              'order'            => 'DESC'                ,
//              'include'          => ''                    ,
//              'exclude'          => ''                    ,
//              'meta_key'         => ''                    ,
//              'meta_value'       => ''                    ,
//              'post_type'        => $post_types           ,
//              'post_mime_type'   => ''                    ,
//              'post_parent'      => ''                    ,
//              'post_status'      => $post_statuses        ,
//              'suppress_filters' => TRUE
//              ) ;
//
//  // -------------------------------------------------------------------------
//
//  $posts_array = \get_posts( $args ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $posts_array = array(
    //
    //          [0] => WP_Post Object(
    //                      [ID]                    => 88
    //                      [post_author]           => 1
    //                      [post_date]             => 2013-10-22 17:23:20
    //                      [post_date_gmt]         => 2013-10-22 04:23:20
    //                      [post_content]          => [woo-deals action="single-promotion" name="Daily Deals"]
    //                      [post_title]            => Daily Deals
    //                      [post_excerpt]          =>
    //                      [post_status]           => publish
    //                      [comment_status]        => closed
    //                      [ping_status]           => open
    //                      [post_password]         =>
    //                      [post_name]             => daily-deals
    //                      [to_ping]               =>
    //                      [pinged]                =>
    //                      [post_modified]         => 2013-10-22 17:23:20
    //                      [post_modified_gmt]     => 2013-10-22 04:23:20
    //                      [post_content_filtered] =>
    //                      [post_parent]           => 0
    //                      [guid]                  => http://localhost/plugdev/?page_id=88
    //                      [menu_order]            => 0
    //                      [post_type]             => page
    //                      [post_mime_type]        =>
    //                      [comment_count]         => 0
    //                      [filter]                => raw
    //                      )
    //
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $posts_array , '$posts_array' ) ;



    // =========================================================================
    // =========================================================================

    // -------------------------------------------------------------------------
    // get_page_uri( $page_id )
    // - - - - - - - - - - - -
    // Builds and returns a URI for a page from a page id.
    //
    // If the page has parents, those are prepended to the URI to provide a full
    // path. For example, a third level page might return a URI like this:
    //
    //      top-level-page/sub-page/current-page
    //
    // PARAMETERS
    //
    //      $page_id
    //          (integer) (required) Page ID.
    //          Default: None
    //
    // RETURN VALUES
    //
    //      (string) Page URI.
    //
    // NOTES
    //      This function will return a "slug" style URI regardless of whether
    //      "pretty" Permalinks are configured.
    //
    // CHANGE LOG
    //      Since: 1.5.0
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // get_page_link($id, $leavename, $sample)
    // - - - - - - - - - - - - - - - - - - - -
    // Retrieves the permalink for the current page (if in The Loop) or any
    // arbitrary page ID if passed as the first argument. All arguments are
    // optional. All arguments default to false.
    //
    // If $id is passed, it will be the id of the page whose link is returned.
    //
    // $leavename can be used to toggle off the switching out of "%pagename%" in
    // permalinks.
    //
    // $sample returns a sample permalink.
    //
    //      $id
    //          (mixed) (optional) Page ID
    //          Default: false
    //
    //      $leavename
    //          (bool) (optional) Whether to keep page name
    //          Default: false
    //
    //      $sample
    //          (bool) (optional) Is it a sample permalink?
    //          Default: false
    //
    // RETURN VALUE
    //      (string) A string containing the permalink.
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // "get_page_uri()" vs. "get_page_link()":-
    //
    //      get_page_uri().:   sample-page
    //      get_page_link():   http://localhost/plugdev/?page_id=2
    //
    // -------------------------------------------------------------------------

/*
foreach ( $posts_array as $this_post ) {

    $page_uri = \get_page_uri( $this_post->ID ) ;

    $page_link = \get_page_link( $this_post->ID ) ;
    $page_link_f_f = \get_page_link( $this_post->ID , FALSE , FALSE ) ;
    $page_link_f_t = \get_page_link( $this_post->ID , FALSE , TRUE  ) ;
    $page_link_t_f = \get_page_link( $this_post->ID , TRUE  , FALSE ) ;
    $page_link_t_t = \get_page_link( $this_post->ID , TRUE  , TRUE  ) ;

    echo <<<EOT
<hr />
{$this_post->post_type}<br />
{$this_post->post_name}<br />
{$this_post->post_title}<br />
{$this_post->guid}<br />
get_page_uri(): &nbsp; {$page_uri}<br />
get_page_link(): &nbsp; {$page_link}<br />
get_page_link_f_f(): &nbsp; {$page_link_f_f}<br />
get_page_link_f_t(): &nbsp; {$page_link_f_t}<br />
get_page_link_t_f(): &nbsp; {$page_link_t_f}<br />
get_page_link_t_t(): &nbsp; {$page_link_t_t}
EOT;

}
*/









    // =========================================================================
    // FAILURE!
    // =========================================================================

    return '???' ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// O L D
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------

/*
    // -------------------------------------------------------------------------
    // get_pages( $args )
    // - - - - - - - - -
    // This function returns an array of pages that are in the blog, optionally
    // constrained by parameters. This array is not tree-like (hierarchical).
    // See the wp_list_pages() template tag for the output of page titles in a
    // tree-like fashion.
    //
    // This function can also retrieve other post types using the 'post_type'
    // parameter, but the type must be hierarchical like pages, or the function
    // will return false.
    //
    // Note that, although similar to get_posts(), several of the parameter
    // names and values differ. (It is implemented quite differently, see
    // get_posts().)
    //
    // DEFAULT USAGE
    //
    //      $args = array(
    //                  'sort_order'    => 'ASC',
    //                  'sort_column'   => 'post_title',
    //                  'hierarchical'  => 1,
    //                  'exclude'       => '',
    //                  'include'       => '',
    //                  'meta_key'      => '',
    //                  'meta_value'    => '',
    //                  'authors'       => '',
    //                  'child_of'      => 0,
    //                  'parent'        => -1,
    //                  'exclude_tree'  => '',
    //                  'number'        => '',
    //                  'offset'        => 0,
    //                  'post_type'     => 'page',
    //                  'post_status'   => 'publish'
    //                  ) ;
    //
    //      $pages = get_pages( $args ) ;
    //
    // PARAMETERS
    //
    //      sort_column
    //          (string) Sorts the list of Pages in a number of different ways.
    //          The default setting is sort alphabetically by Page title.
    //
    //              'post_title'    -   Sort Pages alphabetically (by title) -
    //                                  default
    //
    //              'menu_order'    -   Sort Pages by Page Order. N.B. Note the
    //                                  difference between Page Order and Page
    //                                  ID. The Page ID is a unique number
    //                                  assigned by WordPress to every post or
    //                                  page. The Page Order can be set by the
    //                                  user in the Write>Pages administrative
    //                                  panel.
    //
    //              'post_date'     -   Sort by creation time.
    //
    //              'post_modified' -   Sort by time last modified.
    //
    //              'ID'            -   Sort by numeric Page ID.
    //
    //              'post_author'   -   Sort by the Page author's numeric ID.
    //
    //              'post_name'     -   Sort alphabetically by Post slug. Not
    //                                  supported yet, as of WP 3.3 (See:
    //                                  http://core.trac.wordpress.org/ticket/14368
    //                                  )
    //
    //          Note:   The sort_column parameter can be used to sort the list
    //                  of Pages by the descriptor of any field in the wp_post
    //                  table of the WordPress database. Some useful examples
    //                  are listed here.
    //
    //          Note:   get_posts() uses the parameter 'orderby' instead of
    //                  'sort_column'. Also, get_posts() automatically prepends
    //                  'post_' to these values: 'author, date, modified,
    //                  parent, title, excerpt, content'.
    //
    //      sort_order
    //          (string) Change the sort order of the list of Pages (either
    //          ascending or descending). The default is ascending. Valid
    //          values:
    //
    //              'asc'  - Sort from lowest to highest (Default).
    //              'desc' - Sort from highest to lowest.
    //
    //          Note:   get_posts() uses the parameter 'order' instead of
    //                  'sort_order'.
    //
    //      exclude
    //          (string or array) Define a comma-separated list of Page IDs to
    //          be excluded from the list (example: 'exclude=3,7,31'). Beginning
    //          with Version 3.0, an array of Page ID also can be used. There is
    //          no default value.
    //
    //      include
    //          (string or array) Only include certain Pages in the list
    //          generated by get_pages. Like exclude, this parameter takes a
    //          comma-separated list of Page IDs. Beginning with Version 3.0, an
    //          array of Page ID also can be used. There is no default value.
    //          Note: If this parameter is provided, child_of, parent, exclude,
    //          meta_key, and meta_value params are ignored, and hierarchical is
    //          set to false.
    //
    //      child_of
    //          (integer) Lists the sub-pages of a single Page only; uses the ID
    //          for a Page as the value. Defaults to 0 (list all Pages). Note
    //          that the child_of parameter will also fetch "grandchildren" of
    //          the given ID, not just direct descendants.
    //
    //              0 - default, no child_of restriction
    //
    //          Note:   The child_of parameter is not applied to the SQL query
    //                  for pages. It is applied to the results of the query. If
    //                  a number parameter is also provided, the final results
    //                  may be less than the number specified.
    //
    //      parent
    //          (integer) List those pages that have the provided single page
    //          only ID as parent. Defaults to -1 (displays all Pages regardless
    //          of parent). Note that the 'hierarchical' parameter must be set
    //          to 0 (false) -- which is not default -- or else no results will
    //          be returned for any page other than the top level pages with no
    //          parent (ID=0) and the default all pages (ID=-1). In contrast to
    //          the 'child_of' parameter, this parameter only returns the direct
    //          descendants of the parent, no 'grandchildren'. You can obviate
    //          the 'hierarchical' set to 0 requirement by passing a 'child_of'
    //          parameter set to the same (parent) ID value.
    //
    //              -1 - default, no parent restriction
    //               0 - returns all top level pages
    //
    //      exclude_tree
    //          (integer) The opposite of 'child_of', 'exclude_tree' will remove
    //          all children of a given ID from the results. Useful for hiding
    //          all children of a given page. Can also be used to hide
    //          grandchildren in conjunction with a 'child_of' value. This
    //          parameter was available at Version 2.7.
    //
    //      hierarchical
    //          (boolean) Lists sub-Pages below their parent or lists the Pages
    //          inline. The default is true (list sub-Pages below the parent
    //          list item). NOTE: This default value will prevent meta_key &
    //          parent page searches from finding sub-pages. You need to set
    //          'hierarchical' => 0 for these parameters to work properly. Valid
    //          values:
    //
    //              1 (true) - default
    //              0 (false)
    //
    //      meta_key
    //          (string) Only include the Pages that have this Custom Field Key
    //          (use in conjunction with the meta_value field).
    //
    //      meta_value
    //          (string) Only include the Pages that have this Custom Field
    //          Value (use in conjunction with the meta_key field).
    //
    //      authors
    //          (string) Only include the Pages written by the given author(s)
    //
    //          Note:   get_posts() uses the parameter 'author' instead of
    //                  'authors'.
    //
    //      number
    //          (integer) Sets the number of Pages to list. This causes the SQL
    //          LIMIT value to be defined. Default to no LIMIT. This parameter
    //          was added with Version 2.8.
    //
    //          Note:   get_posts() uses the parameter 'numberposts' instead of
    //                  'number'.
    //
    //      post_type
    //          ("string") Show posts associated with certain type. Valid values
    //          include:
    //
    //              'post'       - a post.
    //              'page'       - a page.
    //              'revision'   - a revision.
    //              'attachment' - an attachment.
    //              Custom Post Types.
    //
    //      offset
    //          (integer) The number of Pages to pass over (or displace) before
    //          collecting the set of Pages. Default is no OFFSET. This
    //          parameter was added with Version 2.8.
    //
    //      post_status
    //          (string) A comma-separated list of post status types that should
    //          be included. For example, 'publish,private'.
    //
    // RETURN
    //
    //      (Array) An array containing all the Pages matching the request, or
    //      false on failure. The returned array is an array of "page" objects.
    //      Each page object is a map containing 24 keys:
    //
    //          ID:                     page/post ID (int)
    //
    //          post_author:            author ID (string)
    //
    //          post_date:              time-date string (YYYY-MM-DD HH:MM:SS),
    //                                  e.g., "2012-10-15 01:02:59"
    //
    //          post_date_gmt:          time-date string
    //
    //          post_content:           HTML (string)
    //
    //          post_title
    //
    //          post_excerpt:           HTML (string)
    //
    //          post_status:            (publish|inherit|pending|private|future|draft|trash)
    //
    //          comment_status:         closed/open
    //
    //          ping_status:            (closed|open)
    //
    //          post_password:
    //
    //          post_name:              slug for page/post
    //
    //          to_ping
    //
    //          pinged
    //
    //          post_modified:          time-date string
    //
    //          post_modified_gmt:      time-date string
    //
    //          post_content_filtered:
    //
    //          post_parent:            parent ID (int)
    //
    //          guid:                   URL
    //
    //          menu_order:             (int)
    //
    //          post_type:              (page|post|attachment)
    //
    //          post_mime_type:
    //
    //          comment_count:          number of comments (string)
    //
    //          filter:
    //
    //      All values are strings unless otherwise shown as (int).
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // $posts_array = get_posts( $args )
    // - - - - - - - - - - - - - - - - -
    // The most appropriate use for get_posts is to create an array of posts
    // based on a set of parameters. It retrieves a list of recent posts or
    // posts matching this criteria. get_posts can also be used to create
    // Multiple Loops, though a more direct reference to WP_Query using new
    // WP_Query is preferred in this case.
    //
    // The parameters of get_posts are similar to those of get_pages but are
    // implemented quite differently, and should be used in appropriate
    // scenarios. get_posts uses WP_Query, whereas get_pages queries the
    // database more directly. Each have parameters that reflect this difference
    // in implementation.
    //
    // query_posts also uses WP_Query, but is not recommended because it
    // directly alters the main loop by changing the variables of the global
    // variable $wp_query. get_posts, on the other hand, simply references a new
    // WP_Query object, and therefore does not affect or alter the main loop.
    //
    // If you would like to alter the main query before it is executed, you can
    // hook into it using pre_get_posts. If you would just like to call an array
    // of posts based on a small and simple set of parameters within a page,
    // then get_posts is your best option.
    //
    // DEFAULT USAGE
    //
    //      $args = array(
    //                  'posts_per_page'   => 5,
    //                  'offset'           => 0,
    //                  'category'         => '',
    //                  'orderby'          => 'post_date',
    //                  'order'            => 'DESC',
    //                  'include'          => '',
    //                  'exclude'          => '',
    //                  'meta_key'         => '',
    //                  'meta_value'       => '',
    //                  'post_type'        => 'post',
    //                  'post_mime_type'   => '',
    //                  'post_parent'      => '',
    //                  'post_status'      => 'publish',
    //                  'suppress_filters' => true
    //                  ) ;
    //
    //      NOTE:   'numberposts' and 'posts_per_page' can be used
    //              interchangeably.
    //
    // PARAMETERS
    //      For full parameters list see WP_Query.
    //
    //      See also get_pages() for example parameter usage.
    //
    //      get_posts() makes use of the WP_Query class to fetch posts. See the
    //      parameters section of the WP_Query documentation for a list of
    //      parameters that this function accepts.
    //
    //      Note:   get_posts uses 'suppress_filters' => true as default, while
    //              query_posts() applies filters by default, this can be
    //              confusing when using query-modifying plugins, like WPML.
    //              Also note that even if 'suppress_filters' is true, any
    //              filters attached to pre_get_posts are still applied—only
    //              filters attached on 'posts_*' or 'comment_feed_*' are
    //              suppressed.
    //
    //      Note:   The category parameter needs to be the ID of the category,
    //              and not the category name.
    //
    //      Note:   The category parameter can be a comma separated list of
    //              categories, as the get_posts() function passes the
    //              'category' parameter directly into WP_Query as 'cat'.
    //
    //      'orderby'
    //          (string) (optional) Sort retrieved posts by parameter.
    //
    //          Default: 'date'
    //
    //          'none' - No order (available with Version 2.8).
    //          'ID' - Order by post id. Note the capitalization.
    //          'author' - Order by author.
    //          'title' - Order by title.
    //          'date' - Order by date.
    //          'modified' - Order by last modified date.
    //          'parent' - Order by post/page parent id.
    //          'rand' - Random order.
    //          'comment_count' - Order by number of comments (available with Version 2.9).
    //          'menu_order' - Order by Page Order. Used most often for Pages (Order field in the Edit Page Attributes box) and for Attachments (the integer fields in the Insert / Upload Media Gallery dialog), but could be used for any post type with distinct 'menu_order' values (they all default to 0).
    //          'meta_value' - Note that a 'meta_key=keyname' must also be present in the query. Note also that the sorting will be alphabetical which is fine for strings (i.e. words), but can be unexpected for numbers (e.g. 1, 3, 34, 4, 56, 6, etc, rather than 1, 3, 4, 6, 34, 56 as you might naturally expect).
    //          'meta_value_num' - Order by numeric meta value (available with Version 2.8). Also note that a 'meta_key=keyname' must also be present in the query. This value allows for numerical sorting as noted above in 'meta_value'.
    //          'post__in' - Matches same order you passed in via the 'include' parameter.
    //
    //          Note:   get_pages() uses the parameter 'sort_column' instead of
    //                  'orderby'. Also, get_pages() requires that 'post_' be
    //                  prepended to these values: 'author, date, modified,
    //                  parent, title, excerpt, content'.
    //
    //      'post_mime_type'
    //          (string or array) (Optional) List of mime types or comma
    //          separated string of mime types.
    //
    //          Default: None
    //
    // RETURN VALUE
    //      (array) List of WP_Post objects.
    //
    //      Unlike get_pages(), get_posts() will return private pages in the
    //      appropriate context (i.e., for an administrator). (See: Andreas
    //      Kirsch, WordPress Hacking II, January 24, 2009-- accessed
    //      2012-11-09.)
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // is_post_type_hierarchical( $post_type )
    // - - - - - - - - - - - - - - - - - - - -
    // This Conditional Tag checks if the post type is hierarchical. This is a
    // boolean function, meaning it returns either TRUE or FALSE (A false return
    // value might also mean that the post type does not exist).
    //
    // Checks to make sure that the post type exists first. Then gets the post
    // type object, and finally returns the hierarchical value in the object.
    //
    //      $post_type
    //          (string) (required) Name of post type
    //          Default: None
    //
    // RETURN VALUES
    //      (boolean) Whether the post_type is hierarchical
    //
    // NOTES
    //      Uses: post_type_exists()     Checks whether post type exists.
    //      Uses: get_post_type_object() Used to get the post type object.
    //
    // CHANGE LOG
    //      Since: 3.0.0
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // From:-
    //      http://codex.wordpress.org/Function_Reference/get_post_status
    //
    // the possible post statuses are:-
    //
    //      'publish'    - A published post or page
    //      'pending'    - post is pending review
    //      'draft'      - a post in draft status
    //      'auto-draft' - a newly created post, with no content
    //      'future'     - a post to publish in the future
    //      'private'    - not visible to users who are not logged in
    //      'inherit'    - a revision. see get_children.
    //      'trash'      - post is in trashbin. added with Version 2.9.
    //
    // -------------------------------------------------------------------------

    // =========================================================================
    // Call "get_pages()" or "get_posts()" - depending on whether the
    // "post_type" to be displayed has "hierarchical like pages".
    //
    // See the following comment from "get_pages()":-
    //
    //      "This function can also retrieve other post types using the
    //      'post_type' parameter, but the type must be hierarchical like pages,
    //      or the function will return false."
    // =========================================================================

    $requested_post_status = implode( ',' , $allowed_post_type_status_values ) ;

    // -------------------------------------------------------------------------

    if ( \is_post_type_hierarchical( $requested_post_type ) ) {

        // =====================================================================
        // HIERARACHICAL POST TYPES
        //
        // ==>  GET_PAGE()
        // =====================================================================

        $get_xxx_function_name = 'get_pages' ;

        // ---------------------------------------------------------------------

        $args = array(
                    'sort_order'    => 'ASC'                    ,
                    'sort_column'   => 'post_title'             ,
                    'hierarchical'  => TRUE                     ,
                    'exclude'       => ''                       ,
                    'include'       => ''                       ,
                    'meta_key'      => ''                       ,
                    'meta_value'    => ''                       ,
                    'authors'       => ''                       ,
                    'child_of'      => 0                        ,
                    'parent'        => -1                       ,
                    'exclude_tree'  => ''                       ,
                    'number'        => ''                       ,
                    'offset'        => 0                        ,
                    'post_type'     => $requested_post_type     ,
                    'post_status'   => $requested_post_status
                    ) ;

        // ---------------------------------------------------------------------

        $wordpress_posts_of_requested_type = \get_pages( $args ) ;

        // ---------------------------------------------------------------------

    } else {

        // =====================================================================
        // NON-HIERARACHICAL POST TYPES
        //
        // ==>  GET_POST()
        // =====================================================================

        $get_xxx_function_name = 'get_posts' ;

        // ---------------------------------------------------------------------

        $args = array(
                    'posts_per_page'   => -1                        ,   //  ALL posts
                    'offset'           => 0                         ,
                    'category'         => ''                        ,
                    'orderby'          => 'post_date'               ,
                    'order'            => 'DESC'                    ,
                    'include'          => ''                        ,
                    'exclude'          => ''                        ,
                    'meta_key'         => ''                        ,
                    'meta_value'       => ''                        ,
                    'post_type'        => $requested_post_type      ,
                    'post_mime_type'   => ''                        ,
                    'post_parent'      => ''                        ,
                    'post_status'      => $requested_post_status    ,
                    'suppress_filters' => TRUE
                    ) ;

        // ---------------------------------------------------------------------

        $wordpress_posts_of_requested_type = \get_posts( $args ) ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( $wordpress_posts_of_requested_type === FALSE ) {

        $msg = <<<EOT
PROBLEM:&nbsp; "{$get_xxx_function_name}()" failure loading WordPress {$requested_post_type}s
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        return array( $msg ) ;

    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      HIERARCHICAL POST TYPES (EG: PAGES)
    //      -----------------------------------
    //
    //      $wordpress_posts_of_requested_type = Array(
    //
    //          ...
    //
    //          [18] => WP_Post Object(
    //                      [ID]                    => 2
    //                      [post_author]           => 1
    //                      [post_date]             => 2013-08-15 07:38:25
    //                      [post_date_gmt]         => 2013-08-15 07:38:25
    //                      [post_content]          => This is an example page...
    //                      [post_title]            => Sample Page
    //                      [post_excerpt]          =>
    //                      [post_status]           => publish
    //                      [comment_status]        => open
    //                      [ping_status]           => open
    //                      [post_password]         =>
    //                      [post_name]             => sample-page
    //                      [to_ping]               =>
    //                      [pinged]                =>
    //                      [post_modified]         => 2013-08-15 07:38:25
    //                      [post_modified_gmt]     => 2013-08-15 07:38:25
    //                      [post_content_filtered] =>
    //                      [post_parent]           => 0
    //                      [guid]                  => http://localhost/plugdev/?page_id=2
    //                      [menu_order]            => 0
    //                      [post_type]             => page
    //                      [post_mime_type]        =>
    //                      [comment_count]         => 0
    //                      [filter]                => raw
    //                      [format_content]        =>
    //                      )
    //
    //          ...
    //
    //          )
    //
    //      NON-HIERARCHICAL POST TYPES (EG: POSTS)
    //      ---------------------------------------
    //
    //      $wordpress_posts_of_requested_type = Array(
    //
    //          ...
    //
    //          [0] => WP_Post Object(
    //                      [ID]                    => 136
    //                      [post_author]           => 1
    //                      [post_date]             => 2014-03-05 15:47:09
    //                      [post_date_gmt]         => 0000-00-00 00:00:00
    //                      [post_content]          => My best friend and her family...
    //                      [post_title]            => Postcards From Wonderland
    //                      [post_excerpt]          => My best friend and her family...
    //                      [post_status]           => draft
    //                      [comment_status]        => closed
    //                      [ping_status]           => open
    //                      [post_password]         =>
    //                      [post_name]             =>
    //                      [to_ping]               =>
    //                      [pinged]                =>
    //                      [post_modified]         => 2014-03-05 15:47:09
    //                      [post_modified_gmt]     => 0000-00-00 00:00:00
    //                      [post_content_filtered] =>
    //                      [post_parent]           => 0
    //                      [guid]                  => http://localhost/plugdev/?p=136
    //                      [menu_order]            => 0
    //                      [post_type]             => post
    //                      [post_mime_type]        =>
    //                      [comment_count]         => 0
    //                      [filter]                => raw
    //                      )
    //          ...
    //
    //          )
    //
    // -------------------------------------------------------------------------

//ob_start() ;
//    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $wordpress_posts_of_requested_type) ;
//return ob_get_clean() ;

    // -------------------------------------------------------------------------
    // get_page_uri( $page_id )
    // - - - - - - - - - - - -
    // Builds and returns a URI for a page from a page id.
    //
    // If the page has parents, those are prepended to the URI to provide a full
    // path. For example, a third level page might return a URI like this:
    //
    //      top-level-page/sub-page/current-page
    //
    // PARAMETERS
    //
    //      $page_id
    //          (integer) (required) Page ID.
    //          Default: None
    //
    // RETURN VALUES
    //
    //      (string) Page URI.
    //
    // NOTES
    //      This function will return a "slug" style URI regardless of whether
    //      "pretty" Permalinks are configured.
    //
    // CHANGE LOG
    //      Since: 1.5.0
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // get_page_link($id, $leavename, $sample)
    // - - - - - - - - - - - - - - - - - - - -
    // Retrieves the permalink for the current page (if in The Loop) or any
    // arbitrary page ID if passed as the first argument. All arguments are
    // optional. All arguments default to false.
    //
    // If $id is passed, it will be the id of the page whose link is returned.
    //
    // $leavename can be used to toggle off the switching out of "%pagename%" in
    // permalinks.
    //
    // $sample returns a sample permalink.
    //
    //      $id
    //          (mixed) (optional) Page ID
    //          Default: false
    //
    //      $leavename
    //          (bool) (optional) Whether to keep page name
    //          Default: false
    //
    //      $sample
    //          (bool) (optional) Is it a sample permalink?
    //          Default: false
    //
    // RETURN VALUE
    //      (string) A string containing the permalink.
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // $ancestors = get_ancestors( $object_id , $object_type )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns an array containing the parents of the given object.
    //
    //      $object_id
    //          (int or string) (required) The ID of the child object
    //          Default: None
    //
    //      $object_type
    //          (string) (required) The name of the object type (page,
    //          hierarchical post type, category, or hierarchical taxonomy) in
    //          question
    //          Default: None
    //
    // RETURN VALUES
    //
    //      (array) Array of ancestors from lowest to highest in the hierarchy
    //
    // EXAMPLES
    //
    //      Given the following category hierarchy (with IDs):
    //
    //          Books (6)
    //              Fiction (23)
    //                  Mystery (208)
    //
    //      get_ancestors( 208, 'category' ) returns:
    //
    //          Array(
    //              [0] => 23
    //              [1] => 6
    //              )
    //
    //      Given the a page hierarchy (with IDs):
    //
    //          About (447)
    //              Child Page (448)
    //
    //      get_ancestors( 448, 'page' ) returns:
    //
    //          Array(
    //              [0] => 447
    //              )
    //
    // NOTES
    //      Filter: get_ancestors is applied to ancestors array before it is
    //      returned.
    //
    // CHANGE LOG
    //      Since: 3.1.0
    // -------------------------------------------------------------------------
*/

// =============================================================================
// That's that!
// =============================================================================

