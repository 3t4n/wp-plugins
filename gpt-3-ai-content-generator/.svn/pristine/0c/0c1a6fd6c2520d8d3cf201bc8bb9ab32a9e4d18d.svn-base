<?php

/**
 * REST API Core Class
 *
 * @class    WPOAI_REST_API
 * @package  includes
 * @version  0.0.1
 */

if ( !defined( 'ABSPATH' ) ) {
    exit;
    // Exit if accessed directly.
}


if ( !class_exists( 'WPOAI_REST_API', false ) ) {
    /**
     * REST API class.
     */
    class WPOAI_REST_API
    {
        /**
         * filter hook
         *
         * @var string
         */
        private  $_hook_prefix = 'WPOAI_REST_API/' ;
        /**
         * Constructor.
         */
        public function __construct()
        {
            // include all related files
            add_action( 'init', array( $this, 'includes' ), 0 );
        }
        
        /**
         * includes all api files
         */
        public function includes()
        {
            // functions
            include_once __DIR__ . '/wpoai-rest-api-functions.php';
            // classes
            include_once __DIR__ . '/class-wpoai-rest-api-core.php';
            include_once __DIR__ . '/class-wpoai-rest-api-wizard.php';
            include_once __DIR__ . '/class-wpoai-rest-api-settings.php';
            include_once __DIR__ . '/class-wpoai-rest-api-custom_models.php';
            include_once __DIR__ . '/class-wpoai-rest-api-aiengines.php';
            include_once __DIR__ . '/class-wpoai-rest-api-generations.php';
            include_once __DIR__ . '/class-wpoai-rest-api-templates.php';
            include_once __DIR__ . '/class-wpoai-rest-api-notes.php';
            include_once __DIR__ . '/class-wpoai-rest-api-wizard.php';
            include_once __DIR__ . '/class-wpoai-rest-api-image.php';
        }
    
    }
    // end - WPOAI_REST_API
    return new WPOAI_REST_API();
}

// end - class_exists