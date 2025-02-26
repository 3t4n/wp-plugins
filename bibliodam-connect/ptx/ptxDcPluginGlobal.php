<?php
    
    namespace PTDC\ptx;
    
    if (!defined('ABSPATH')) {
        exit();
    }
    
    /**
     * Global usage class.
     *
     * This class is used to load functions that are global (Admin and Frontend) used.
     *
     * @package    BiblioDAM
     * @subpackage BiblioDAM/ptx
     * @author     Publishers Toolbox <support@afrozaar.com>
     *
     * @since      1.0.0
     */
    class ptxDcPluginGlobal {
        
        /**
         * The ID of this plugin.
         *
         * @access private
         * @var string $pluginName The ID of this plugin.
         * @since 1.0.0
         */
        private $pluginName;
        
        /**
         * The version of this plugin.
         *
         * @since 1.0.0
         * @access private
         * @var string $pluginVersion The current version of this plugin.
         */
        private $pluginVersion;
        
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
         * Return the plugin options.
         *
         * @since 1.0.0
         */
        public function getPluginOptions() {
            return get_option($this->pluginName, []);
        }
    
        /**
         * Update the options.
         *
         * @param $inputOption array
         *
         * @return bool
         *
         * @since 1.0.0
         */
        public function ptxUpdatePluginOptions($inputOption = []): bool {
            return update_option($this->pluginName, $inputOption);
        }
        
        /**
         * Enable upload for webp image files.
         *
         * @param $existingMimes
         *
         * @return mixed
         *
         * @since 1.0.0
         */
        public function webpUploadMimes($existingMimes) {
            $existingMimes['webp'] = 'image/webp';
            
            return $existingMimes;
        }
        
        /**
         * Enable preview / thumbnail for webp image files.
         *
         * @param $result
         * @param $path
         *
         * @return mixed
         *
         * @since 1.0.0
         */
        public function webpIsDisplayable($result, $path) {
            if ($result === false) {
                $displayableImageTypes = [IMAGETYPE_WEBP];
                $info                  = @getimagesize($path);
                if (empty($info)) {
                    $result = false;
                } elseif (!in_array($info[2], $displayableImageTypes, true)) {
                    $result = false;
                } else {
                    $result = true;
                }
            }
            
            return $result;
        }
        
        /**
         * Check for dependent plugins needed to run this plugin.
         *
         * @since 1.0.0
         */
        public function checkDependentNotifications(): void {
            $class          = 'notice notice-error';
            $checkDependent = $this->checkDependentPlugins();
            
            /**
             * Detect if Imigino plugin is installed and active.
             */
            if (!$checkDependent['imigino']['installed']) {
                $link    = '<a href="plugin-install.php?s=Imigino+Video+Connect&tab=search&type=term" target="_blank" rel="noopener noreferrer">Imigino Video Connect</a>';
                $message = __('<b>BiblioDam Connect:</b> Imigino Video Connect not installed. Please install it from here: ', $this->pluginName);
                echo '<div class="' . $class . '"><p>' . $message . ' ' . $link . '</p></div>';
            } else if (!$checkDependent['imigino']['active']) {
                $link    = '<a href="plugins.php?s=Imigino+Video+Connect&plugin_status=all" target="_blank" rel="noopener noreferrer">Imigino Video Connect</a>';
                $message = __('<b>BiblioDam Connect:</b> Imigino Video Connect plugin not activated. Please activate it here:', $this->pluginName);
                echo '<div class="' . $class . '"><p>' . $message . ' ' . $link . '</p></div>';
            }
        }
        
        /**
         * Check dependent states.
         *
         * @return array
         *
         * @since 1.0.0
         */
        public function checkDependentPlugins(): array {
            $dependent = [];
            
            /**
             * Detect if Imigino plugin is installed and activated.
             */
            if (file_exists(WP_PLUGIN_DIR . '/imigino-video-connect/imigino-video-connect.php')) {
                $dependent['imigino']['installed'] = true;
            } else {
                $dependent['imigino']['installed'] = false;
            }
            
            if (is_plugin_active_for_network('imigino-video-connect/imigino-video-connect.php') || in_array('imigino-video-connect/imigino-video-connect.php', apply_filters('active_plugins', get_option('active_plugins')), true)) {
                $dependent['imigino']['active'] = true;
            } else {
                $dependent['imigino']['active'] = false;
            }
            
            if ($dependent['imigino']['active'] && $dependent['imigino']['installed']) {
                $dependent['imigino']['in_use'] = true;
            } else {
                $dependent['imigino']['in_use'] = false;
            }
            
            /**
             * Detect if classic editor is installed and active.
             */
            if (file_exists(WP_PLUGIN_DIR . '/classic-editor/classic-editor.php')) {
                $dependent['classic']['installed'] = true;
            } else {
                $dependent['classic']['installed'] = false;
            }
            
            if (is_plugin_active_for_network('classic-editor/classic-editor.php') || in_array('classic-editor/classic-editor.php', apply_filters('active_plugins', get_option('active_plugins')), true)) {
                $dependent['classic']['active'] = true;
            } else {
                $dependent['classic']['active'] = false;
            }
            
            if ($dependent['classic']['active'] && $dependent['classic']['installed']) {
                $dependent['classic']['in_use'] = true;
            } else {
                $dependent['classic']['in_use'] = false;
            }
            
            return $dependent;
            
        }
        
        /**
         * Create a proper clean slug for anything.
         *
         * @param $text
         * @param string $divider
         *
         * @return false|string|string[]|null
         *
         * @since 1.0.0
         */
        public static function slugCreate($text, $divider = '-') {
            $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
            $text = preg_replace('~[^-\w]+~', '', $text);
            $text = trim($text, '-');
            $text = preg_replace('~-+~', '-', $text);
            $text = strtolower($text);
            if (empty($text)) {
                return 'n-a';
            }
            
            return $text;
        }
        
    }
