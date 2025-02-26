<?php
    
    namespace PTDC\ptx;
    
    use PTDC\admin\ptxDcPluginAdmin;
    
    if (!defined('ABSPATH')) {
        exit();
    }
    
    /**
     * The core plugin class.
     *
     * This is used to define internationalization, admin-specific hooks, and public-facing site hooks.
     *
     * @since      1.0.0
     * @subpackage BiblioDAM/ptx
     * @author     Publishers Toolbox <support@afrozaar.com>
     *
     * @package    BiblioDAM
     */
    class ptxDcPluginCore {
        
        /**
         * The loader that's responsible for maintaining and registering all hooks that power the plugin.
         *
         * @access protected
         * @since 1.0.0
         * @var ptxDcPluginLoader $loader Maintains and registers all hooks for the plugin.
         */
        protected ptxDcPluginLoader $loader;
        
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
         * The current version of the plugin.
         *
         * @access protected
         * @since 1.0.4
         * @var string $pluginVersion The current version of the plugin.
         */
        protected $pluginAddOns;
        
        /**
         * Define the core functionality of the plugin.
         *
         * Set the plugin name and the plugin version that can be used throughout the plugin.
         * Load the dependencies, define the locale, and set the hooks for the admin area and
         * the public-facing side of the site.
         *
         * @since 1.0.0
         */
        public function __construct() {
            $this->pluginVersion = PTX_BIBLIODAM_CONNECT_VERSION;
            $this->pluginName    = PTX_BIBLIODAM_CONNECT_NAME;
            
            /**
             * Init and setup Add-Ons for global use.
             */
            $this->pluginAddOns = new ptxDcPluginAddOns($this->pluginName, $this->pluginVersion);
            $this->pluginAddOns->ptxLoadAddOns();
            
            $this->loadDependencies();
            $this->defineGlobalHooks();
            $this->setLocale();
            if (is_admin()) {
                $this->defineAdminHooks();
                $this->defineBlockHooks();
                $this->pluginAddOns->ptxAddOnLoadHooks('admin');
            } else {
                $this->defineFrontendHooks();
                $this->pluginAddOns->ptxAddOnLoadHooks('frontend');
            }
        }
        
        /**
         * Load the required dependencies for this plugin.
         *
         * Create an instance of the loader which will be used to register the hooks with WordPress.
         *
         * @access private
         * @since 1.0.0
         */
        private function loadDependencies(): void {
            $this->loader = new ptxDcPluginLoader();
        }
        
        /**
         * Define the locale for this plugin for internationalization.
         *
         * @access private
         * @since 1.0.0
         */
        private function setLocale(): void {
            $pluginI18n = new ptxDcPluginI18n($this->getPluginName(), $this->getPluginVersion());
            $this->loader->addAction('plugins_loaded', $pluginI18n, 'loadPluginTextDomain');
            
            /**
             * Passes translations to JavaScript.
             */
            // wp_set_script_translations($this->getPluginName() . '-bc-block', $this->getPluginName());
        }
        
        /**
         * Define block to load for the importer.
         *
         * @access private
         * @since 1.0.0
         */
        private function defineBlockHooks(): void {
            $pluginBlocks = new ptxDcPluginBlock($this->getPluginName(), $this->getPluginVersion());
            $this->loader->addAction('admin_enqueue_scripts', $pluginBlocks, 'enqueueScriptsAndStyles');
            
            /**
             * Load the block.
             */
            $this->loader->addAction('init', $pluginBlocks, 'enqueueBlock');
        }
        
        /**
         * Define the globals for this plugin.
         *
         * Used for functions, filters and hooks that are available globally.
         *
         * @access private
         * @since 1.0.0
         */
        private function defineGlobalHooks(): void {
            $pluginGlobal = new ptxDcPluginGlobal($this->getPluginName(), $this->getPluginVersion());
            $this->loader->addAction('mime_types', $pluginGlobal, 'webpUploadMimes');
            $this->loader->addAction('file_is_displayable_image', $pluginGlobal, 'webpIsDisplayable', 10, 2);
            
            /**
             * Admin Notifications.
             */
            $this->loader->addAction('admin_notices', $pluginGlobal, 'checkDependentNotifications');
        }
        
        /**
         * Register all the hooks related to the admin area functionality of the plugin.
         *
         * @access private
         * @since 1.0.0
         */
        private function defineAdminHooks(): void {
            $pluginAdmin = new ptxDcPluginAdmin($this->getPluginName(), $this->getPluginVersion(), $this->getPluginAddOns());
            
            /**
             * Scripts to load on plugin init.
             */
            if (isset($_GET['page']) && ($_GET['page'] === $this->pluginName)) {
                $this->loader->addAction('admin_enqueue_scripts', $pluginAdmin, 'enqueueScriptsAndStyles');
            }
            
            /**
             * Add admin menu.
             */
            $this->loader->addAction('admin_menu', $pluginAdmin, 'dcAddPluginAdminMenu');
            
            /**
             * Add action link.
             */
            $pluginBasename = plugin_basename(plugin_dir_path(__DIR__) . $this->pluginName . '.php');
            $this->loader->addFilter('plugin_action_links_' . $pluginBasename, $pluginAdmin, 'ptxAddActionLinks');
            
            /**
             * Add import button.
             */
            $this->loader->addAction('admin_head-edit.php', $pluginAdmin, 'addCustomImportButton');
            
            /**
             * Add import button.
             */
            $this->loader->addAction('admin_footer', $pluginAdmin, 'addDamScript');
            
            /**
             * Dam picker script.
             */
            $this->loader->addAction('admin_enqueue_scripts', $pluginAdmin, 'enqueueDamScript');
            $this->loader->addAction('admin_enqueue_scripts', $pluginAdmin, 'enqueueDamStyle');
            
            /**
             * Global ptx plugin ajax call.
             */
            $this->loader->addAction('wp_ajax_ptx_admin', $pluginAdmin, 'ptxAjaxAdmin');
            
            
            /**
             * Classic editor button.
             */
            $this->loader->addAction('media_buttons', $pluginAdmin, 'classicLauncherButton', 15);
        }
        
        /**
         * Register all the hooks related to the public-facing functionality of the plugin.
         *
         * @access   private
         * @since    1.0.0
         */
        private function defineFrontendHooks(): void {
            $pluginPublic = new ptxDcPluginBlock($this->getPluginName(), $this->getPluginVersion());
            /**
             * load scripts.
             */
            $this->loader->addAction('wp_enqueue_scripts', $pluginPublic, 'enqueueScriptsAndStyles');
            
        }
        
        /**
         * Run the loader to execute all the hooks with WordPress.
         *
         * @since 1.0.0
         */
        public function run(): void {
            $this->loader->run();
        }
        
        /**
         * The name of the plugin used to uniquely identify it within the context of
         * WordPress and to define internationalization functionality.
         *
         * @return string The name of the plugin.
         *
         * @since 1.0.0
         */
        public function getPluginName(): string {
            return $this->pluginName;
        }
        
        /**
         * Retrieve the version number of the plugin.
         *
         * @return string The version number of the plugin.
         *
         * @since 1.0.0
         */
        public function getPluginVersion(): string {
            return $this->pluginVersion;
        }
        
        /**
         * Retrieve the Add-Ons for this plugin.
         *
         * @since 1.0.4
         */
        public function getPluginAddOns() {
            return $this->pluginAddOns;
        }
    }
