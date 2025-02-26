<?php

defined( 'ABSPATH' ) || exit;

/**
 * Manage the AIDM form page
 */

class Aidm_Form {

    public function __construct()
    {
        add_action( 
            'admin_enqueue_scripts', 
            array( $this, 'enqueue_scripts' ) 
        );

        add_action( 
            'admin_post_'.AIDM_POST_ID, 
            array( $this, 'save_changes' ) 
        );
    }


    /**
     * enqueue scripts and styles
     */
    public function enqueue_scripts() {
        // enqueue all codeMirror css themes
        
        foreach( glob( AIDM_CM_DIR.'*.css' ) as $filename ) {
            wp_enqueue_style( 
                basename( $filename, '.css' ), 
                AIDM_CM_URL.basename( $filename ),
            );
        }

        // load codeMirror editor with type == php
        $cm_settings[ 'codeEditor' ] = wp_enqueue_code_editor( 
            array( 'type' => 'text/x-php' ) 
        );

        // plugin js
        wp_enqueue_script( 
            'aidmHome', 
            AIDM_JS_URL.'aidmHome.js',
        );

        wp_localize_script( 
            'aidmHome', 
            'aidmFormData', 
            array( 
                'cmSettings' => $cm_settings,
                'codeSample' => __( "// this code sample is here to show you the different themes\n// feel free to change this sample\n\n\$sampleText = 'helloWorld';\n\nfunction hello_world( \$text ) { \n    echo \$text;\n}\n\nhello_world( \$sampleText );", aidm_get_text_domain() )
            ) 
        );
        
        // plugin css
        wp_enqueue_style( 
            'aidm-home', 
            AIDM_CSS_URL.'aidm-home.css',
        );
    }

    /**
     * process the form to admin_post.php and save preference in the database
     */
    public function save_changes() {
        $nonce = sanitize_text_field( 
            $_POST[ aidm_get_nonce_id() ] 
        );

        $action = sanitize_text_field( 
            $_POST[ 'action' ] 
        );

        $theme_preference = sanitize_text_field( 
            $_POST[ 'theme' ] 
        );

        $redirect_to = admin_url( 'admin.php?page='.AIDM_FORM_ID.'&message=' );

        if ( 
            ! isset( $nonce ) 
            || ! wp_verify_nonce( $nonce, $action )
        ) {
            $redirect_to .= 'nonce_error';

        } else if ( ! current_user_can( 'manage_options' ) ) {
            $redirect_to .= 'capabilities_error';

        } else {
            if ( self::update_theme_preference( $theme_preference ) ) {
                $redirect_to .= 'success';
            } else {
                $redirect_to .= 'error';
            }
        }
        
        wp_safe_redirect( $redirect_to );

        exit;
    }

    /**
     * update the database
     */
    public function update_theme_preference( $theme_preference ) {
        $user_id = get_current_user_id();
        $meta_key = 'aidm-theme-preference';
        $meta_value = $theme_preference;

        return update_user_meta( $user_id, $meta_key, $meta_value );
    }
}
