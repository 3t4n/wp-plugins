<?php

if ( ! class_exists( 'About_Author_Box_General' ) ) {

    /**
     * General plugin class
     *
     * @since 1.0.0
     */
    class About_Author_Box_General {

       /**
         * Constructor
         *
         * @since 1.0.0
         */
        function __construct() {

            // load text domain
            add_action( 'init', array( $this, 'load_textdomain' ) );

            // enqueue scripts and styles
            add_action( 'wp_enqueue_scripts', array( $this, 'scripts_and_styles' ) );

        }

        /**
         * Load text domain
         *
         * @since 1.0.0
         */
        function load_textdomain() {

            load_plugin_textdomain( 'about-author-box', false, ABOUT_AUTHOR_BOX_DIR_NAME . '/languages' );

        }

        /**
         * Enqueue scripts and styles
         *
         * @since 1.0.0
         */
        function scripts_and_styles() {

            wp_enqueue_style( 'about-author-box-css', ABOUT_AUTHOR_BOX_URL . 'css/about-author-box.css', array(), ABOUT_AUTHOR_BOX_VERSION );

        }

    }

}

new About_Author_Box_General();
