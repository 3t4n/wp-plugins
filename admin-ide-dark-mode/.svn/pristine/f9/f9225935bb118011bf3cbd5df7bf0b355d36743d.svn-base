<?php

defined( 'ABSPATH' ) || exit;

/**
 * Load JS FIles to change CodeMirror Style in Admin
 */

class Aidm {
    public function __construct()
    {
        add_action( 
            'admin_enqueue_scripts', 
            array( $this, 'enqueue_scripts' ) 
        );
    }

    /**
     * enqueue scripts and styles
     */
    public function enqueue_scripts() {
        $user_theme_preference = aidm_get_user_admin_ide_theme_preference();
            
        wp_enqueue_script( 
            'aidm', 
            AIDM_JS_URL.'aidm.js',
        );

        wp_localize_script( 
            'aidm', 
            'aidm', 
            array( 'theme_name' => $user_theme_preference )
        );

        wp_enqueue_style( 
            'aidm-admin', 
            AIDM_CM_URL.$user_theme_preference.'.css',
        );
    }

}
