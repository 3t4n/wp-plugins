<?php 

    add_action( 'plugins_loaded', 'RSFFCF7_load_textdomain_pro' );
    function RSFFCF7_load_textdomain_pro() {
        load_plugin_textdomain( 'woo-product-and-custom-post-type-dropdown-cf7', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
    }
    
    add_filter( 'load_textdomain_mofile', 'RSFFCF7_load_my_own_textdomain_pro', 10, 2 );
    function RSFFCF7_load_my_own_textdomain_pro( $mofile, $domain ) {
        if ( 'woo-product-and-custom-post-type-dropdown-cf7' === $domain && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) ) {
            $locale = apply_filters( 'plugin_locale', determine_locale(), $domain );
            $mofile = WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) . '/languages/' . $domain . '-' . $locale . '.mo';
        }
        return $mofile;
    }
    