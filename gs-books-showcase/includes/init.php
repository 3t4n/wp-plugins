<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

add_action('plugins_loaded', function() {
    
    /**
     * Compatibility check with Pro plugin
     */
    if ( is_pro_compatible() ) {
        /**
         * Activation redirects
         */
        register_activation_hook( GS_BOOKS_PLUGIN_FILE, 'GS_BOOKS\on_activation' );

        /**
         * Init Appsero
         */
        gs_appsero_init();

        /**
         * Load Main Plugin
         */
        require_once GS_BOOKS_PLUGIN_DIR . 'includes/plugin.php';
    }
    
    /**
     * Remove Reviews Metadata on plugin Deactivation.
     */
    register_deactivation_hook( GS_BOOKS_PLUGIN_FILE, 'GS_BOOKS\on_deactivation' );
    
    /**
     * Plugins action links
     */
    add_filter( 'plugin_action_links_' . plugin_basename( GS_BOOKS_PLUGIN_FILE ), 'GS_BOOKS\add_pro_link' );
    
    /**
     * Plugins Load Text Domain
     */
    add_action( 'init', 'GS_BOOKS\gs_load_textdomain' );

}, -20 );