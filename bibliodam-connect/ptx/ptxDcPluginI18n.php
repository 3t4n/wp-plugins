<?php
    
    namespace PTDC\ptx;
    
    if (!defined('ABSPATH')) {
        exit();
    }
    
    /**
     * Define the internationalization functionality.
     *
     * Loads and defines the internationalization files for this plugin so that it is ready for translation.
     *
     * @package    BiblioDAM
     * @subpackage BiblioDAM/ptx
     * @author     Publishers Toolbox <support@afrozaar.com>
     *
     * @since      1.0.0
     */
    class ptxDcPluginI18n {
        
        /**
         * The unique identifier of this plugin.
         *
         * @access protected
         * @var string $pluginName The string used to uniquely identify this plugin.
         * @since 1.0.0
         */
        protected $pluginName;
        
        /**
         * The current version of the plugin.
         *
         * @access protected
         * @var string $pluginVersion The current version of the plugin.
         * @since 1.0.0
         */
        protected $pluginVersion;
        
        /**
         * Initialize the collections used to maintain backend and frontend functions.
         *
         * @param string $pluginName
         * @param string $pluginVersion
         *
         * @since 1.0.0
         */
        public function __construct($pluginName, $pluginVersion) {
            $this->pluginName    = $pluginName;
            $this->pluginVersion = $pluginVersion;
        }
        
        /**
         * Load the plugin text domain for translation.
         *
         * @since 1.0.0
         */
        public function loadPluginTextDomain(): void {
            load_plugin_textdomain($this->pluginName, false, dirname(plugin_basename(__FILE__), 2) . '/languages/');
        }
    }
