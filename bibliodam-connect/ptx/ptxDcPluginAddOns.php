<?php
    
    namespace PTDC\ptx;
    
    use ZipArchive;
    
    if (!defined('ABSPATH')) {
        exit();
    }
    
    /**
     * Define the Add-Ons functionality.
     *
     * Loads and setup the Add-Ons functionality.
     *
     * @package    BiblioDAM
     * @subpackage BiblioDAM/ptx
     * @author     Publishers Toolbox <support@afrozaar.com>
     *
     * @since      1.0.4
     */
    class ptxDcPluginAddOns {
        
        /**
         * The array containing all the addons to load.
         *
         * @access protected
         * @var array $addOns The array used to store the Add-Ons.
         * @since 1.0.4
         */
        public $addOns = [];
        
        /**
         * The unique identifier of this plugin.
         *
         * @access protected
         * @var string $pluginName The string used to uniquely identify this plugin.
         * @since 1.0.4
         */
        protected $pluginName;
        
        /**
         * The current version of the plugin.
         *
         * @access protected
         * @var string $pluginVersion The current version of the plugin.
         * @since 1.0.4
         */
        protected $pluginVersion;
        
        /**
         * The api uri to fetch Add-Ons and updates.
         *
         * @access constant
         *
         * @var string ADDONS_URI The uri that wordpress uri match.
         *
         * @since 1.0.4
         */
        public const ADDONS_URI = 'https://api.ptwebsuite.com/wp-json/wp/v2/addon';
        
        /**
         * Initialize the collections used to maintain backend and frontend functions.
         *
         * @param string $pluginName
         * @param string $pluginVersion
         *
         * @since 1.0.4
         */
        public function __construct($pluginName, $pluginVersion) {
            $this->pluginName    = $pluginName;
            $this->pluginVersion = $pluginVersion;
        }
        
        /**
         * The loader that's responsible for maintaining and registering all hooks that power the plugin.
         *
         * @access protected
         * @var $loader | Maintains and registers all hooks for the plugin.
         * @since 1.0.0
         */
        protected $loader;
        
        /**
         * Loads all Add-Ons for the plugin.
         *
         * @return array
         *
         * @since 1.0.4
         */
        public function ptxLoadAddOns(): array {
            foreach (glob(plugin_dir_path(__DIR__) . 'add-ons/**/*.php') as $addOn) {
                $fileName  = str_replace('/', DIRECTORY_SEPARATOR, $addOn);
                $className = pathinfo($fileName);
                $class     = '\PTDC\addon\\' . $className['filename'] . '\\' . $className['filename'];
                require $fileName;
                if (class_exists($class)) {
                    $this->addOns[] = new $class($this->pluginName, $this->pluginVersion);
                }
            }
            
            return $this->addOns;
        }
        
        /**
         * Return installed Add-Ons.
         *
         * Use the 'class' parameter to return an Array of the class object.
         *
         * @param string $key
         *
         * @return array|mixed
         *
         * @since 1.0.4
         */
        public function getAddOnsLocalVersion($key = '') {
            $installedAddOns = [];
            
            foreach ($this->addOns as $objKey => $addOn) {
                $installedAddOns[$addOn->addonUnique] = $addOn->addonVersion;
            }
            
            if (!empty($key)) {
                return $installedAddOns[$key];
            }
            
            return $installedAddOns;
        }
        
        /**
         * Count the Add-Ons that needs to be updated.
         *
         * @since 1.0.4
         */
        public function getAddOnUpdatesCount(): int {
            $countAddonUpdates = [];
            $localAddAns       = $this->getAddOnsLocalVersion();
            $apiAddonsMeta     = $this->checkAddOnsApi();
            foreach ($apiAddonsMeta as $checkAddOn) {
                $apiMeta      = $checkAddOn['meta'];
                $inArray      = array_key_exists($apiMeta['unique_identifier'], $localAddAns);
                $authPlugin   = $this->checkValue($this->pluginName, $apiMeta['products'], 'domain_name');
                $versionCheck = $this->getAddOnsLocalVersion($apiMeta['unique_identifier']) !== $apiMeta['version'];
                if ($inArray && $authPlugin && $versionCheck) {
                    $countAddonUpdates[$checkAddOn['title']['rendered']] = $apiMeta['version'];
                }
            }
            
            return count($countAddonUpdates);
        }
        
        /**
         * Checks if value exists in array.
         *
         * @param $needle
         * @param $haystack
         * @param $key
         *
         * @return bool
         *
         * @since 1.0.4
         */
        public function checkValue($needle, $haystack, $key): bool {
            return is_array($haystack) && in_array($needle, array_column($haystack, $key), true);
        }
        
        /**
         * Checks if value exists in array.
         *
         * @param array $clients
         * @param string $needle
         * @param string $unique
         *
         * @return array
         *
         * @since 1.0.4
         */
        public function checkClientValue(array $clients, string $needle, string $unique) {
            $returnValues = [];
            foreach ($clients as $key => $client) {
                $returnValues[$unique] = $this->checkValue($needle, $client['client_urls'], 'url');
            }
            
            return $returnValues;
        }
        
        /**
         * Loads all Add-Ons for the plugin.
         *
         * @since 1.0.4
         */
        public function ptxAvailableAddOns(): void {
            $sitUrl = get_bloginfo('url');
            $addOns = false;
            
            /**
             * Get the Add-Ons details.
             */
            $localAddAns   = $this->getAddOnsLocalVersion();
            $apiAddonsMeta = $this->checkAddOnsApi();
            
            /**
             * Array to list API Add-Ons.
             */
            $apiAddOns = [];
            
            /**
             * List all of the Add-Ons from the API and check if they are installed.
             * If they are installed, check if they need an update.
             */
            foreach ($apiAddonsMeta as $key => $checkAddOn) {
                $apiMeta     = $checkAddOn['meta'];
                $installed   = false;
                $version     = false;
                $apiAddOns[] = $apiMeta['unique_identifier'];
                /**
                 * First check if this Add-On is for this Plugin.
                 */
                if ($this->checkValue($this->pluginName, $apiMeta['products'], 'domain_name')) {
                    $addOns = true;
                    
                    /**
                     * Check if the Add-On is for private clients.
                     */
                    $privateAddOn  = $apiMeta['availability'] !== 'Public';
                    $isClientArray = is_array($apiMeta['clients']);
                    $clientAccess  = $this->checkClientValue($apiMeta['clients'], $sitUrl, $apiMeta['unique_identifier']);
                    $addOnBlocked  = array_key_exists($apiMeta['unique_identifier'], $clientAccess) && empty($clientAccess[$apiMeta['unique_identifier']]);
                    if ($privateAddOn && $isClientArray && !empty($apiMeta['clients']) && $addOnBlocked) {
                        continue;
                    }
                    
                    /**
                     * Set the default display options to the API.
                     */
                    $icon         = $apiMeta['icon'];
                    $addOnVersion = $apiMeta['version'];
                    $description  = $apiMeta['description'];
                    $unique       = $apiMeta['unique_identifier'];
                    $title        = $checkAddOn['title']['rendered'];
                    /**
                     * Check Add-On availability.
                     */
                    if (array_key_exists($apiMeta['unique_identifier'], $localAddAns)) {
                        $installed = true;
                        /**
                         * Get the local class object.
                         */
                        $class = '\PTDC\addon\\' . $apiMeta['unique_identifier'] . '\\' . $apiMeta['unique_identifier'];
                        if (class_exists($class)) {
                            $addonClass   = new $class($this->pluginName, $this->pluginVersion);
                            $icon         = $addonClass->addonIcon;
                            $addOnVersion = $addonClass->addonVersion;
                            $description  = $addonClass->addonDescription;
                            $unique       = $addonClass->addonUnique;
                            $title        = $addonClass->addonName;
                        }
                    }
                    
                    /**
                     * Check if the local version match up with the api version.
                     */
                    if ($this->getAddOnsLocalVersion($apiMeta['unique_identifier']) === $apiMeta['version']) {
                        $version = true;
                    }
                    
                    $package = $apiMeta['package'];
                    ?>
                    <div class="col-1-4 ptx-addons-block <?php echo $unique; ?>">
                        <div class="addon-version">Version: <?php echo $addOnVersion; ?></div>
                        <?php if ($icon) { ?>
                            <div class="addon-icon">
                                <img src="<?php echo $icon; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
                            </div>
                        <?php } ?>
                        <div class="addon-header">
                            <h4><?php printf(esc_attr__($title, $this->pluginName)); ?><span><?php echo $installed ? ' (Installed)' : ''; ?></span></h4>
                        </div>
                        <div class="addon-body">
                            <div class="grid">
                                <div class="col-1-1">
                                    <div class="addon-message" style="display: none;"></div>
                                    <?php if (!$installed || !$version) {
                                        if (!$installed) {
                                            $title = __('Install', $this->pluginName);
                                        } else {
                                            $title = __('Update: ' . $apiMeta['version'], $this->pluginName);
                                        }
                                        ?>
                                        <button class="btn is-secondary <?php echo !$version && $installed ? 'is-half' : 'is-full'; ?> addon-button" data-addon="<?php echo $unique; ?>" data-task="update" data-package="<?php echo $package; ?>"><?php echo $title; ?></button>
                                        <?php if (!$version && $installed) { ?>
                                            <button class="btn is-secondary is-half addon-button" data-addon="<?php echo $unique; ?>" data-task="delete"><?php _e('Delete', $this->pluginName); ?></button>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <button class="btn is-secondary is-full addon-button" data-addon="<?php echo $unique; ?>" data-task="delete"><?php _e('Delete', $this->pluginName); ?></button>
                                    <?php } ?>
                                </div>
                                <div class="col-1-1 description"><p><?php echo $description; ?></p></div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            
            /**
             * Check if local installs exist.
             *
             * If it exists, check if its deprecated in favour of another Add-On,
             * and if not deprecated then dont support it anymore.
             */
            foreach (glob(plugin_dir_path(__DIR__) . 'add-ons/**/*.php') as $addOn) {
                $fileName  = str_replace('/', DIRECTORY_SEPARATOR, $addOn);
                $className = pathinfo($fileName);
                $class     = '\PTDC\addon\\' . $className['filename'] . '\\' . $className['filename'];
                if (class_exists($class)) {
                    $installedAddons = new $class($this->pluginName, $this->pluginVersion);
                    $addonClass      = new $class($this->pluginName, $this->pluginVersion);
                    $icon            = $addonClass->addonIcon;
                    $addOnVersion    = $addonClass->addonVersion;
                    $description     = $addonClass->addonDescription;
                    $unique          = $addonClass->addonUnique;
                    $title           = $addonClass->addonName;
                    if (!in_array($installedAddons->addonUnique, $apiAddOns, true)) { ?>
                        <div class="col-1-4 ptx-addons-block <?php echo $unique; ?>">
                            <div class="addon-version">Version: <?php echo $addOnVersion; ?></div>
                            <?php if ($icon) { ?>
                                <div class="addon-icon">
                                    <img src="<?php echo $icon; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
                                </div>
                            <?php } ?>
                            <div class="addon-header">
                                <h4><?php printf(esc_attr__($title, $this->pluginName)); ?><span> (Installed)</span></h4>
                            </div>
                            <div class="addon-body">
                                <div class="grid">
                                    <div class="col-1-1">
                                        <div class="addon-message">This Add-On is no longer supported.</div>
                                        <button class="btn is-secondary is-full addon-button" data-addon="<?php echo $unique; ?>" data-task="delete"><?php _e('Delete', $this->pluginName); ?></button>
                                    </div>
                                    <div class="col-1-1 description"><p><?php echo $description; ?></p></div>
                                </div>
                            </div>
                        </div>
                    <?php }
                }
            }
            
            /**
             * If there are no Add-Ons display a generic message.
             */
            if (empty($localAddAns) || !$addOns) { ?>
                <div class="col-1-1 has-margin-top"><h4><?php printf(esc_attr__('There are no Add-Ons for this plugin currently.', $this->pluginName)); ?></h4></div>
                <?php
            }
        }
        
        /**
         * Select which template to display at any given time.
         *
         * @param $position
         *
         * @since 1.0.4
         */
        public function ptxAddOnDisplayTemplate($position): void {
            foreach ($this->addOns as $keySections => $valSections) {
                $valSections->addOnDisplayTemplate($position);
            }
        }
        
        /**
         * Select which hooks to to load at any given time.
         *
         * @param $position
         *
         * @since 1.0.4
         */
        public function ptxAddOnLoadHooks($position): void {
            $ptxOptions = (new ptxDcPluginGlobal($this->pluginName, $this->pluginVersion))->getPluginOptions();
            switch ($position) {
                case 'admin':
                    foreach ($this->addOns as $keySections => $valSections) {
                        if (isset($ptxOptions['add-on'][$valSections->addonUnique]['active'])) {
                            $valSections->addOnAdminHooks();
                        }
                    }
                    break;
                case 'frontend':
                    foreach ($this->addOns as $keySections => $valSections) {
                        if (isset($ptxOptions['add-on'][$valSections->addonUnique]['active'])) {
                            $valSections->addOnPublicHooks();
                        }
                    }
                    break;
                default:
            }
        }
        
        /**
         * Check the addons versions and validity.
         *
         * @return array
         *
         * @since 1.0.4
         * @throws \JsonException
         */
        public function checkAddOnsApi(): array {
            return ptxDcPluginRequests::request(self::ADDONS_URI, '', '', 'array', 'GET');
        }
        
        /**
         * Download and extract new package.
         *
         * @param $package
         * @param $addon
         *
         * @return array
         *
         * @since 1.0.4
         */
        public function getAddonUpdate($package, $addon): array {
            $directory = plugin_dir_path(__DIR__) . 'add-ons/';
            
            if (!is_dir($directory) && !mkdir($directory, 0777, true) && !is_dir($directory)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $directory));
            }
            
            $newAddon = $directory . $addon . '.zip';
            
            if (!copy($package, $newAddon)) {
                $errors = error_get_last();
                
                return ['status' => $errors['type'], 'message' => $errors['message']];
            }
            
            $zip = new ZipArchive;
            $res = $zip->open($newAddon);
            if ($res === true) {
                $zip->extractTo($directory);
                $zip->close();
                unlink($newAddon);
            } else {
                return ['status' => 'zip', 'message' => 'UnZip Failed.'];
            }
            
            return ['status' => 'complete'];
        }
        
        /**
         * Delete the Add-On.
         *
         * @param $addon
         *
         * @return array
         *
         * @since 1.0.4
         */
        public function deletePluginAddOn($addon): array {
            $directory = plugin_dir_path(__DIR__) . 'add-ons/';
            $path      = $directory . $addon;
            
            /**
             * Remove the Add-On options as well.
             */
            $ptxOptions = (new ptxDcPluginGlobal($this->pluginName, $this->pluginVersion))->getPluginOptions();
            unset($ptxOptions['add-on'][$addon]);
            (new ptxDcPluginGlobal($this->pluginName, $this->pluginVersion))->ptxUpdatePluginOptions($ptxOptions);
            
            $removeAddon = self::deleteDir($path);
            
            if ($removeAddon) {
                return ['status' => 'complete'];
            }
            
            return ['status' => 'rem', 'message' => 'Could not remove Add-On or Directory doesnt exist.'];
        }
        
        /**
         * Delete files and directory safely.
         *
         * @param $path
         *
         * @return bool
         *
         * @since 1.0.4
         */
        public static function deleteDir($path): bool {
            if (empty($path)) {
                return false;
            }
            
            return is_file($path) ? @unlink($path) : (array_reduce(glob($path . '/*'), static function($r, $i) { return $r && self::deleteDir($i); }, true)) && @rmdir($path);
        }
    }
