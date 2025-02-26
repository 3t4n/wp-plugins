<?php
function afpw_register_fb_pg_wd_js()
{
    wp_register_script( 'afpw-author-facebook-page',AFPW_PLUGIN_URL.'/js/author-facebook-page-widget.js', array('jquery'), AFPW_PLUGIN_VERSION, 'all' );

    wp_enqueue_script( 'afpw-author-facebook-page' );

    global $afpw_options;
    $afpw_options['appId'] = get_option('afpw_fb_app_id');

    // Fallback to WordPress language constant
    if ( null == $afpw_options['language'] ) {
        $afpw_options['language'] = defined( 'WPLANG' ) ? WPLANG : get_locale();
    }

    // Fallback to plugin author's default appId
    if ( !isset( $afpw_options['appId'] ) || null == $afpw_options['appId'] ) {
        // TODO: Make this better.
        $afpw_options['appId'] = 124661207633391;
    }
    
    // passing values to js
    $data = array(
        'language' => $afpw_options['language'],
        'appId'    => $afpw_options['appId']
    );
    //* Pass the language option from the database to javascript.
    wp_localize_script( 'afpw-author-facebook-page', 'afpw_script_vars', $data );
}
add_action( 'wp_enqueue_scripts', 'afpw_register_fb_pg_wd_js' );



function afpw_facebook_page_widget_register_admin_css()
{
    // Register the style like this for a plugin:
    wp_register_style( 'afpw', AFPW_PLUGIN_URL.'/css/afpw.css', array(), AFPW_PLUGIN_VERSION, 'all' );
    wp_enqueue_style( 'afpw' );
}
add_action( 'admin_enqueue_scripts', 'afpw_facebook_page_widget_register_admin_css' );

?>