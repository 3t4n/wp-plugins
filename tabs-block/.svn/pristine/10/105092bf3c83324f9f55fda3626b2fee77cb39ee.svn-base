<?php
/*
Plugin Name: Tabs Block
Plugin URI: https://tishonator.com/product/tabs-block
Description: Tabs Block is a simple plugin that adds a Gutenberg block for adding Tabs content to your posts and pages. Fully responsive and accessible.
Author: tishonator
Version: 1.0.0
Author URI: http://tishonator.com/
Contributors: tishonator
Text Domain: tabs-block
*/

if ( !class_exists('tishonator_tb_TabsBlockPlugin') ) :

    /**
     * Register the plugin.
     *
     * Display the administration panel, insert JavaScript etc.
     */
    class tishonator_tb_TabsBlockPlugin {
        
    	/**
    	 * Instance object
    	 *
    	 * @var object
    	 * @see get_instance()
    	 */
    	protected static $instance = NULL;


        /**
         * Constructor
         */
        public function __construct() {}

        /**
         * Setup
         */
        public function setup() {

            add_action( 'init', array(&$this, 'register_scripts') );

            // register a block to display team members
            add_action( 'init', array(&$this, 'register_block') );
        }

        /**
         * Register scripts used to display team members
         */
        public function register_scripts() {

            if ( !is_admin() ) {
                
                // Tabs Block CSS
                wp_register_style('tabs-block-css',
                    plugins_url('css/tabs-block.css', __FILE__), true);

                wp_enqueue_style( 'tabs-block-css',
                    plugins_url('css/tabs-block.css', __FILE__), array( ) );

                // JQuery UI Tabs
                wp_enqueue_script( 'jquery-ui-tabs' );

                // Tabs Block JS
                wp_register_script('tabs-block-js',
                    plugins_url('js/tabs-block.js', __FILE__), array('jquery'));

                wp_enqueue_script('tabs-block-js',
                        plugins_url('js/tabs-block.js', __FILE__), array('jquery') );
            }
        }

        /*
         * Register Block
         */
        public function register_block() {

            global $pagenow;

            $arrDeps = ($pagenow === 'widgets.php') ?
                array( 'wp-edit-widgets', 'wp-blocks', 'wp-i18n', 'wp-element', )
              : array( 'wp-editor', 'wp-blocks', 'wp-i18n', 'wp-element', );

            // Tab Item
            wp_register_script(
                'tishonator-tab-item-block',
                plugins_url('js/tab-item.js', __FILE__),
                $arrDeps
            );

            register_block_type( 'tishonator/tab-item-block', array(
                'editor_script' => 'tishonator-tab-item-block',
            ) );
        }

    	/**
    	 * Used to access the instance
         *
         * @return object - class instance
    	 */
    	public static function get_instance() {

    		if ( NULL === self::$instance ) {
                self::$instance = new self();
            }

    		return self::$instance;
    	}
    }

endif; // tishonator_tb_TabsBlockPlugin

add_action('plugins_loaded',
    array( tishonator_tb_TabsBlockPlugin::get_instance(), 'setup' ), 10);
