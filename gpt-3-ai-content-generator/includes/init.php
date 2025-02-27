<?php

/**
 * Plugin Core Class
 *
 * @author 		WPOPENAI
 * @package 	includes
 * @since 		0.0.1
 * 
 */

if ( !class_exists( 'WPOPENAI' ) ) {
    class WPOPENAI
    {
        /**
         * Class instance
         *
         * @access private
         * @var object
         */
        private static  $_instance = null ;
        /**
         * Absolute url to plugin's directory 
         *
         * @access private
         * @var string
         */
        private  $_plugin_url = null ;
        /**
         * Absolute path to plugin's directory 
         *
         * @access private
         * @var string
         */
        private  $_plugin_path = null ;
        /**
         * Plugin hook prefix ( for filter & action hooks )
         *
         * @access private
         * @var string
         */
        private  $_plugin_hook = null ;
        /**
         * Plugin metabox prefix
         *
         * @access private
         * @var string
         */
        private  $_plugin_meta_prefix = null ;
        /**
         * Plugin option id
         *
         * @access private
         * @var string
         */
        private  $_plugin_options = null ;
        /**
         * Plugin labels
         *
         * @access private
         * @var array
         */
        private  $_labels = null ;
        /**
         * Get class instance
         *
         * @access public
         * @return object
         */
        public static function get_instance()
        {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new WPOPENAI();
            }
            return self::$_instance;
        }
        
        /**
         * Retrieve plugin path
         *
         * @access public
         * @param string $path (optional) - appended into plugin directory
         * @return string
         */
        public function plugin_path( $path = '' )
        {
            return $this->_plugin_path . ltrim( $path, '/' );
        }
        
        /**
         * Retrieve plugin url
         *
         * @access public
         * @param string $url (optional) - appended into plugin directory
         * @return string
         */
        public function plugin_url( $url = '' )
        {
            return $this->_plugin_url . ltrim( $url, '/' );
        }
        
        /**
         * Get plugin hook (for filter & action hooks )
         *
         * @access public
         * @return string
         */
        public function plugin_hook()
        {
            return $this->_plugin_hook;
        }
        
        /**
         * Get plugin metabox prefix
         *
         * @access public
         * @return string
         */
        public function plugin_meta_prefix()
        {
            return $this->_plugin_meta_prefix;
        }
        
        /**
         * Get plugin option id
         *
         * @access public
         * @return string
         */
        public function plugin_options()
        {
            return $this->_plugin_options;
        }
        
        /**
         * Class Constructor
         *
         * @access private
         */
        function __construct()
        {
            // setup variables
            $this->_plugin_path = WPOAI_PATH;
            $this->_plugin_url = WPOAI_URL;
            $this->_plugin_hook = 'wpoai_';
            $this->_plugin_meta_prefix = '_wpoai_';
            $this->_plugin_options = 'wpopenai';
            // include required files
            $this->includes();
            // enqueue admin styles & scripts
            add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_styles_scripts' ), 49 );
        }
        
        /**
         * Enqueue admin styles & scripts
         *
         * @access public
         */
        public function register_admin_styles_scripts( $hook )
        {
            
            if ( ('post.php' === $hook || 'post-new.php' === $hook) && wpoai_who_can_access( 'blocks_scripts', array(
                'hook' => $hook,
            ) ) ) {
                $wpoai_blocks_assets = (require $this->plugin_path( 'dist/blocks.asset.php' ));
                // blocks related styles & scripts
                wp_enqueue_style(
                    'wpoai-blocks',
                    $this->plugin_url( 'dist/blocks.css' ),
                    null,
                    $wpoai_blocks_assets['version']
                );
                wp_enqueue_script(
                    'wpoai-blocks',
                    $this->plugin_url( 'dist/blocks.js' ),
                    $wpoai_blocks_assets['dependencies'],
                    $wpoai_blocks_assets['version'],
                    true
                );
                wp_localize_script( 'wpoai-blocks', 'WPOAI_REST_API', apply_filters( $this->plugin_hook() . 'blocks_localize_args', array(
                    'root'         => esc_url_raw( rest_url() ),
                    'version'      => WPOAI_VERSION,
                    'ai_engines'   => wpoai_ai_engines_options(),
                    'settings_url' => admin_url( 'admin.php?page=wpopenai' ),
                ) ) );
            }
            
            // only load on plugin settings page
            
            if ( 'toplevel_page_wpopenai' === $hook ) {
                wp_enqueue_style( 'wp-components' );
                $wpoai_settings_assets = (require $this->plugin_path( 'dist/settings.asset.php' ));
                wp_enqueue_style(
                    'wpoai-settings',
                    $this->plugin_url( 'dist/settings.css' ),
                    null,
                    $wpoai_settings_assets['version']
                );
                wp_enqueue_script(
                    'wpoai-settings',
                    $this->plugin_url( 'dist/settings.js' ),
                    $wpoai_settings_assets['dependencies'],
                    $wpoai_settings_assets['version'],
                    true
                );
                wp_localize_script( 'wpoai-settings', 'WPOAI_REST_API', apply_filters( $this->plugin_hook() . 'settings_localize_args', array(
                    'root'         => esc_url_raw( rest_url() ),
                    'version'      => WPOAI_VERSION,
                    'ai_engines'   => wpoai_ai_engines_options(),
                    'plugin_url'   => $this->plugin_url(),
                    'admin_url'    => admin_url( 'admin.php' ),
                    'settings_url' => admin_url( 'admin.php?page=wpopenai' ),
                    'post_url'     => admin_url( 'post.php' ),
                ) ) );
            }
            
            // end - $hook
        }
        
        /**
         * Include required files
         *
         * @access public
         */
        public function includes()
        {
            // functions
            require_once $this->plugin_path( 'includes/wizard/functions-wizard.php' );
            // classes
            require_once $this->plugin_path( 'includes/content-generation/class-content-generation.php' );
            require_once $this->plugin_path( 'includes/wizard-instant-article/class-wizard-instant-article.php' );
            require_once $this->plugin_path( 'includes/wizard/class-wizard.php' );
            require_once $this->plugin_path( 'includes/image/class-wpoai-image.php' );
            require_once $this->plugin_path( 'includes/templates/class-wpoai-templates.php' );
            require_once $this->plugin_path( 'includes/api/class-wpoai-rest-api.php' );
            require_once $this->plugin_path( 'includes/admin/class-wpoai-admin.php' );
        }
    
    }
    // end - class WPOPENAI
}

// end - !class_exists('WPOPENAI')