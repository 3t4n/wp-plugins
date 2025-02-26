<?php
/**
 * @author Andreasyan.net
 * Plugin: GA Meta Tags
 * URL: http://andreasyan.net/
 */
?>
<?php

    /**
     * Register All Menus.
     *
     * @since 2.0
     */
    add_action ( 'admin_menu', 'ga_meta_tags_menu' );

    function ga_meta_tags_menu(){
        add_menu_page ( 'GA Meta Tags', 'GA Meta Tags', 'manage_options', 'ga-meta-tags', 'ga_meta_tags_home_page', plugins_url ( 'ga-meta-tags/images/favicon.ico' ), 6 );
        add_submenu_page ( 'ga-meta-tags', 'Main Options', 'Main Options', 'manage_options', 'ga-meta-tags', 'ga_meta_tags_home_page' );        
        add_submenu_page ( 'ga-meta-tags', 'Google Options', 'Google Options', 'manage_options', 'ga-meta-tags-google', 'ga_meta_tags_google_page' );
    }

    /**
     * Load CSS and JS.
     *
     * @since 1.0
     */
    add_action ( 'admin_menu', 'ga_meta_tags_load_css_js' );

    function ga_meta_tags_load_css_js() {
        wp_enqueue_script ( 'jquery' ); // Enque Default jQuery
        wp_enqueue_script ( 'jquery-ui-core' ); // Enque Default jQuery UI Core
        wp_enqueue_script ( 'jquery-ui-tabs' ); // Enque Default jQuery UI Tabs
    
        wp_register_script ( 'ga-meta-tags-plugin-bootstrap-script', plugins_url ( '../js/bootstrap.min.js', __FILE__ ) );
        wp_enqueue_script ( 'ga-meta-tags-plugin-bootstrap-script' );
        wp_register_script ( 'ga-meta-tags-plugin-script', plugins_url ( '../js/ga-meta-tags.js', __FILE__ ) );
        wp_enqueue_script ( 'ga-meta-tags-plugin-script' );
    
        wp_register_style ( 'ga-meta-tags-plugin-bootstrap', plugins_url ( '../css/bootstrap.min.css', __FILE__ ) );
        wp_enqueue_style ( 'ga-meta-tags-plugin-bootstrap' );
        wp_register_style ( 'ga-meta-tags-plugin-bootstrap-theme', plugins_url ( '../css/bootstrap-theme.min.css', __FILE__ ) );
        wp_enqueue_style ( 'ga-meta-tags-plugin-bootstrap-theme' );
        wp_register_style ( 'ga-meta-tags-plugin-css', plugins_url ( '../css/ga-meta-tags.css', __FILE__ ) );
        wp_enqueue_style ( 'ga-meta-tags-plugin-css' );

    }

    /**
     * Get all Header Meta Tags
     *
     * @since 2.0
     */
    add_action ( 'wp_head', 'ga_meta_tags_header', 2 );
    
    function ga_meta_tags_header(){
        $meta_tags_description = get_option ( 'ga_meta_tags_description' );
        $meta_tags_keywords = get_option ( 'ga_meta_tags_keyword' );
        $meta_tags_robots = get_option ( 'ga_meta_tags_robots' );
        $meta_tags_revisit = get_option ( 'ga_meta_tags_revisit' );
        $meta_tags_generator = get_option ( 'ga_meta_tags_generator' );
        $meta_tags_author = get_option ( 'ga_meta_tags_author' );
        $meta_tags_contact = get_option ( 'ga_meta_tags_contact' );
        $meta_tags_copyright = get_option ( 'ga_meta_tags_copyright' );
        $meta_tags_language = get_option ( 'ga_meta_tags_language' );

        $meta_tags_google_wm = get_option ( 'ga_meta_tags_google_webmaster' );
        $meta_tags_google_an = get_option ( 'ga_meta_tags_google_analytics' );
        $meta_tags_google_author_profile = get_option ( 'ga_meta_tags_google_author_profile' );
        $meta_tags_google_author_page = get_option ( 'ga_meta_tags_google_author_page' );

        echo "\n";
        echo "<!-- GA Meta Tags plugin by Andreasyan.net -->\n";

        if (! ($meta_tags_description == "")) {
            $meta_tags_description_meta = '<meta name="description" content="' . sanitize_text_field($meta_tags_description) . '" /> ';
            echo $meta_tags_description_meta . "\n";
        }
        if (! ($meta_tags_keywords == "")) {
            $meta_tags_keywords_meta = '<meta name="keywords" content="' . sanitize_text_field($meta_tags_keywords) . '" /> ';
            echo $meta_tags_keywords_meta. "\n";
        }
        if (! ($meta_tags_robots == "")) {
            $meta_tags_robots_meta = '<meta name="robots" content="' . sanitize_text_field($meta_tags_robots) . '" /> ';
            echo $meta_tags_robots_meta . "\n";
        }
        if (! ($meta_tags_revisit == "")) {
            $meta_tags_revisit_meta = '<meta name="revisit-after" content="' . sanitize_text_field($meta_tags_revisit) . '" /> ';
            echo $meta_tags_revisit_meta . "\n";
        }
        if (! ($meta_tags_generator == "")) {
            $meta_tags_generator_meta = '<meta name="generator" content="' . sanitize_text_field($meta_tags_generator) . '" /> ';
            echo $meta_tags_generator_meta . "\n";
        }
        if (! ($meta_tags_author == "")) {
            $meta_tags_author_meta = '<meta name="author" content="' . sanitize_text_field($meta_tags_author) . '" /> ';
            echo $meta_tags_author_meta . "\n";
        }
        if (! ($meta_tags_contact == "")) {
            $meta_tags_contact_meta = '<meta name="contact" content="' . sanitize_text_field($meta_tags_contact) . '" /> ';
            echo $meta_tags_contact_meta . "\n";
        }
        if (! ($meta_tags_copyright == "")) {
            $meta_tags_copyright_meta = '<meta name="copyright" content="' . sanitize_text_field($meta_tags_copyright) . '" /> ';
            echo $meta_tags_copyright_meta . "\n";
        }
        if (! ($meta_tags_language == "")) {
            $meta_tags_language_meta = '<meta name="language" content="' . sanitize_text_field($meta_tags_language) . '" /> ';
            echo $meta_tags_language_meta . "\n";
        }
        if (! ($meta_tags_google_wm == "")) {
            $meta_tags_google_wm_meta = '<meta name="google-site-verification" content="' . sanitize_text_field($meta_tags_google_wm) . '" /> ';
            echo $meta_tags_google_wm_meta . "\n";
        }
        if (! ($meta_tags_google_an == "")) {
            echo '<script>' . "\n";
            echo '(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){' . "\n";
            echo '  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),' . "\n";
            echo 'm=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)' . "\n";
            echo '})(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');' . "\n";
            echo 'ga(\'create\', \'' . $meta_tags_google_an . '\', \'auto\');' . "\n";
            echo 'ga(\'send\', \'pageview\');' . "\n";
            echo '</script>' . "\n";
        }
        if (! ($meta_tags_google_author_profile == "")) {
            $meta_tags_google_author_profile_meta = '<link rel="author" href="' . $meta_tags_google_author_profile . '">';
            echo $meta_tags_google_author_profile_meta . "\n";
        }

        if (! ($meta_tags_google_author_page == "")) {
            $meta_tags_google_author_page_meta = '<link rel="publisher" href="' . $meta_tags_google_author_page . '">';
            echo $meta_tags_google_author_page_meta . "\n";
        }
        
        echo "<!-- /GA Meta Tags plugin -->\n\n";
    }

    /**
     * Get all Footer Meta Tags
     *
     * @since 2.0
     */
    add_action ( 'wp_footer', 'ga_meta_tags_footer', 1000 );
    
    function ga_meta_tags_footer(){
        $meta_tags_google_tag_manager = get_option ( 'ga_meta_tags_google_tag_manager' );

        if (! ($meta_tags_google_tag_manager == "")) {
            echo "\n";
            echo "<!-- GA Meta Tags plugin by Andreasyan.net -->\n";

            echo '<noscript><iframe src="//www.googletagmanager.com/ns.html?id=' . $meta_tags_google_tag_manager . '" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>' . "\n";
            echo '<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src= \'//www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f); })(window,document,\'script\',\'dataLayer\',\'' . $meta_tags_google_tag_manager . '\');</script>' . "\n";
            
            echo "<!-- /GA Meta Tags plugin -->\n\n";
        }
    }

    /**
     * Initialize Variable.
     *
     * @since 2.0
     */
    add_option ( 'ga_meta_tags_description', '' );
    add_option ( 'ga_meta_tags_keyword', '' );
    add_option ( 'ga_meta_tags_robots', '' );
    add_option ( 'ga_meta_tags_revisit', '' );
    add_option ( 'ga_meta_tags_generator', '' );
    add_option ( 'ga_meta_tags_author', '' );
    add_option ( 'ga_meta_tags_contact', '' );
    add_option ( 'ga_meta_tags_copyright', '' );
    add_option ( 'ga_meta_tags_language', '' );

    add_option ( 'ga_meta_tags_google_analytics', '' );
    add_option ( 'ga_meta_tags_google_webmaster', '' );
    add_option ( 'ga_meta_tags_google_author_profile', '' );
    add_option ( 'ga_meta_tags_google_author_page', '' );
    add_option ( 'ga_meta_tags_google_tag_manager', '' );

    /**
     * Save All Options.
     *
     * @since 2.0
     */
    function ga_meta_tags_save_all_options() {

        if (isset ( $_POST ['update_home'] )) {
            if( current_user_can('administrator') ){
                if (! isset ( $_POST ['ga_meta_tags_update_setting'] )){
                    die ( "Looks like you didn't send any credentials." );
                }

                update_option ( 'ga_meta_tags_description', ( string ) $_POST ["ga_meta_tags_description"] );
                update_option ( 'ga_meta_tags_keyword', ( string ) $_POST ["ga_meta_tags_keyword"] );
                update_option ( 'ga_meta_tags_robots', ( string ) $_POST ["ga_meta_tags_robots"] );
                update_option ( 'ga_meta_tags_revisit', ( string ) $_POST ["ga_meta_tags_revisit"] );
                update_option ( 'ga_meta_tags_generator', ( string ) $_POST ["ga_meta_tags_generator"] );
                update_option ( 'ga_meta_tags_author', ( string ) $_POST ["ga_meta_tags_author"] );
                update_option ( 'ga_meta_tags_contact', ( string ) $_POST ["ga_meta_tags_contact"] );
                update_option ( 'ga_meta_tags_copyright', ( string ) $_POST ["ga_meta_tags_copyright"] );
                update_option ( 'ga_meta_tags_language', ( string ) $_POST ["ga_meta_tags_language"] );

                echo '<div id="message" class="updated fade"><p><strong>Main Settings Updated.</strong></p></div>';
                echo '</strong>';
            }
            else{
                die ( "The fields can change only administrator." );
            }
        }

        if (isset ( $_POST ['update_google'] )) {
            if( current_user_can('administrator') ){
                if (! isset ( $_POST ['ga_meta_tags_update_setting'] )){
                    die ( "Looks like you didn't send any credentials." );
                }

                update_option ( 'ga_meta_tags_google_analytics', ( string ) $_POST ["ga_meta_tags_google_analytics"] );
                update_option ( 'ga_meta_tags_google_webmaster', ( string ) $_POST ["ga_meta_tags_google_webmaster"] );
                update_option ( 'ga_meta_tags_google_author_profile', ( string ) $_POST ["ga_meta_tags_google_author_profile"] );
                update_option ( 'ga_meta_tags_google_author_page', ( string ) $_POST ["ga_meta_tags_google_author_page"] );
                update_option ( 'ga_meta_tags_google_tag_manager', ( string ) $_POST ["ga_meta_tags_google_tag_manager"] );

                echo '<div id="message" class="updated fade"><p><strong>Google Settings Updated.</strong></p></div>';
                echo '</strong>';
            }
            else{
                die ( "The fields can change only administrator." );
            }
        }
    }

    /**
     * Add Home Page.
     *
     * @since 1.0
     */
    function ga_meta_tags_home_page() {
        ga_meta_tags_save_all_options ();
        require_once (dirname ( __FILE__ ) . '/ga-meta-tags-home.php');
    }

    /**
     * Add Google Page.
     *
     * @since 2.0
     */
    function ga_meta_tags_google_page() {
        ga_meta_tags_save_all_options ();
        require_once (dirname ( __FILE__ ) . '/ga-meta-tags-google.php');
    }
