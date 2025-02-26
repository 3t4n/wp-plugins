<?php
    
    namespace PTDC\ptx;
    
    if (!defined('ABSPATH')) {
        exit();
    }
    
    /**
     * Setup the Gutenberg block dependencies.
     *
     * @since      1.0.0
     * @subpackage BiblioDAM/ptx
     * @author     Publishers Toolbox <support@afrozaar.com>
     *
     * @package    BiblioDAM
     */
    class ptxDcPluginBlock {
        /**
         * The unique identifier of this plugin.
         *
         * @access protected
         * @since 1.0.0
         * @var string $pluginName The string used to uniquely identify this plugin.
         */
        protected string $pluginName;
        
        /**
         * The current version of the plugin.
         *
         * @access protected
         * @since 1.0.0
         * @var string $pluginVersion The current version of the plugin.
         */
        protected string $pluginVersion;
        
        /**
         * Initialize the collections used to maintain backend and frontend functions.
         *
         * @param string $pluginName
         * @param string $pluginVersion
         *
         * @since 1.0.0
         */
        public function __construct(string $pluginName, string $pluginVersion) {
            $this->pluginName    = $pluginName;
            $this->pluginVersion = $pluginVersion;
        }
        
        /**
         * Register the scripts and stylesheets for the block area.
         *
         * @since 1.2.0
         */
        public function enqueueScriptsAndStyles(): void {
            wp_enqueue_style($this->pluginName . '-bc-block', plugin_dir_url(__DIR__) . 'admin/css/block.min.css', [], $this->pluginVersion, 'all');
            // Only load the script when in the backend.
            if (is_admin()) {
                wp_enqueue_script($this->pluginName . '-bc-block', plugins_url($this->pluginName) . '/build/index.min.js', [
                    'wp-block-editor',
                    'wp-blocks',
                    'wp-components',
                    'wp-element',
                    'wp-i18n',
                    'wp-polyfill',
                ], $this->pluginVersion, true);
            }
        }
        
        /**
         * Register the JavaScript for the block area.
         *
         * @since 1.0.0
         */
        public function enqueueBlock(): void {
            register_block_type($this->pluginName . '/bc-block', [
                'style'         => $this->pluginName . '-bc-block',
                'editor_script' => $this->pluginName . '-bc-block',
            ]);
        }
    }
