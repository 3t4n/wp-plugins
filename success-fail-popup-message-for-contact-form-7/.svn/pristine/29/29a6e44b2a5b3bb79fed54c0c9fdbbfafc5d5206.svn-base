<?php 

// Use load textdomain
add_action( 'plugins_loaded', 'SFPMCF7_load_textdomain' );
function SFPMCF7_load_textdomain() {
    load_plugin_textdomain( 'success-fail-popup-message-for-contact-form-7' , false , dirname( SFPMCF7_BASE_NAME ) . '/languages'); 
}


// Use load textdomain mofile
function SFPMCF7_load_my_own_textdomain( $mofile, $domain ) {
    if ( 'success-fail-popup-message-for-contact-form-7' === $domain && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) ) {
        $locale = apply_filters( 'plugin_locale', determine_locale(), $domain );
        $mofile = WP_PLUGIN_DIR . '/' . dirname( SFPMCF7_BASE_NAME ) . '/languages/' . $domain . '-' . $locale . '.mo';
    }
    return $mofile;
}
add_filter( 'load_textdomain_mofile', 'SFPMCF7_load_my_own_textdomain', 10, 2 );