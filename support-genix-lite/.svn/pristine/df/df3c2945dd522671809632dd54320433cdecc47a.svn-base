<?php

/**
 * Karnel.
 */

defined('ABSPATH') || exit;

if (!class_exists("AppsBDKarnelSupportGenixLite")) {
    abstract class AppsBDKarnelSupportGenixLite
    {
        public static $appsbd_globalJS;
        public static $appsbd_globalCss;
        public static $setAppProperies;

        public $moduleList = [];
        public $pluginFile;
        public $pluginBaseName;
        private static $appGlobalVar = [];
        private static $_instence = [];
        private static $_instence_base = [];
        public $pluginName;
        public $pluginVersion;
        public $isTabMenu = false;
        protected static $warningMessage;
        protected static $errorMessage = [];
        protected static $infoMessage = [];
        protected static $hiddenFilelds = [];
        protected $isDevelopmode = false;
        protected $isDemoMode = false;
        private $isLoadJqGrid = false;
        public $pluginIconClass;
        public $mainMenuIconClass;
        public $_topmenu = [];
        public $_set_action_prefix = "";

        public $licenseMessage = "";
        public $showMessage = false;
        private $is_license_active = false;
        private $is_module_loaded = false;
        public $support_genix_slug = "";
        public $support_genix_assets_slug = "";
        public $menuTitle;
        public  $pluginSlugName;
        public $bootstrapVersion = '4.3.1';
        public static $_admin_notice = [];
        /**
         * @return bool
         */
        public function isLicenseActive()
        {
            return $this->is_license_active;
        }

        /**
         * @param bool $is_license_active
         */
        public function setIsLicenseActive($is_license_active)
        {
            $this->is_license_active = $is_license_active;
        }
        /**
         * @return bool
         */
        public function isModuleLoaded()
        {
            return $this->is_module_loaded;
        }

        /**
         * @param bool $is_module_loaded
         */
        public function setIsModuleLoaded($is_module_loaded)
        {
            $this->is_module_loaded = $is_module_loaded;
        }

        /**
         * @return array
         */
        public function GetAppGlobalVar()
        {
            return self::$appGlobalVar;
        }
        function AddAdminNotice($msg)
        {
            $id = hash("crc32b", $msg);
            static::$_admin_notice[$id] = $msg;
        }
        function is_countable($vars)
        {
            if (function_exists("is_countable")) {
                return is_countable($vars);
            } else {
                if (is_string($vars) || is_bool($vars)) {
                    return false;
                }

                return is_array($vars) || is_object($vars);
            }
        }

        function AddTopMenu($title, $icon, $func, $class = '', $isTab = true, $attr = [])
        {
            $n        = new stdClass();
            $n->title = $title;
            $n->func  = $func;
            $n->icon  = $icon;
            $n->class = $class;
            $n->istab = $isTab;
            $n->attr  = "";
            if ($this->is_countable($attr) && count($attr) > 0) {
                foreach ($attr as $ke => $v) {
                    $n->attr .= ' ' . $ke . '="' . $v . '" ';
                }
            }

            $this->_topmenu[] = $n;
        }

        /**
         * @param array $appGlobalVar
         */
        public function AddAppGlobalVar($key, $value)
        {
            self::$appGlobalVar[$key] = $this->__($value);
        }
        /**
         * @param mixed $menuTitle
         */
        public function setMenuTitle($menuTitle)
        {
            $this->menuTitle = $menuTitle;
        }
        /**
         * @return bool
         */
        public function isDevelopmode()
        {
            return $this->isDevelopmode;
        }

        /**
         * @param bool $isDevelopmode
         */
        public function setIsDevelopmode($isDevelopmode)
        {
            $this->isDevelopmode = $isDevelopmode;
        }

        /**
         * @return bool
         */
        public function isLoadJqGrid()
        {
            return $this->isLoadJqGrid;
        }
        /**
         * @param bool $isLoadJqGrid
         */
        public function SetIsLoadJqGrid($isLoadJqGrid)
        {
            $this->isLoadJqGrid = $isLoadJqGrid;
        }

        public function SetPluginIconClass($class, $mainMenuIconClass = '')
        {
            $this->pluginIconClass = $class;
            if (empty($mainMenuIconClass)) {
                $mainMenuIconClass = $class;
            }
            $this->mainMenuIconClass = $mainMenuIconClass;
        }

        /**
         * @param string $set_action_prefix
         */
        public function setSetActionPrefix($set_action_prefix)
        {
            $this->_set_action_prefix = $set_action_prefix;
        }

        /**
         * @return string
         */
        public function getHookActionStr($str)
        {
            return $this->_set_action_prefix . "/" . $str;
        }

        /**
         * @return bool
         */
        public function isDemoMode()
        {
            return $this->isDemoMode;
        }

        /**
         * @param bool $isDemoMode
         */
        public function setIsDemoMode($isDemoMode)
        {
            $this->isDemoMode = $isDemoMode;
        }


        abstract function GetHeaderHtml();

        abstract function GetFooterHtml();

        function __construct($pluginBaseFile, $version = '1.0.0')
        {
            $this->pluginFile                              = $pluginBaseFile;
            $this->menuTitle = $this->pluginName;
            self::$_instence[get_class($this)]         = &$this;
            self::$_instence_base[$this->pluginBaseName] = &self::$_instence[get_class($this)];
            spl_autoload_register(array($this, "_myautoload_method"));
            $this->pluginSlugName     = &$this->pluginBaseName;
            $this->support_genix_slug = "SUPPORT_GENIX";
            $this->support_genix_assets_slug = "support-genix";
            if (is_callable($this->support_genix_slug . "_initialize")) {
                call_user_func($this->support_genix_slug . "_initialize");
            }
        }

        function initialize() {}

        public static function __callStatic($func, $args)
        {
            if (isset(self::$setAppProperies[$func])) {
                return call_user_func_array(self::$setAppProperies[$func], $args);
            }

            return;
        }

        public static function SetProptety($name, $value)
        {
            self::$setAppProperies[$name] = $value;
        }

        function __destruct()
        {
            if ($this->isDevelopmode) {
                $qu   = AppsBDModel::GetTotalQueriesForLog();
                $path = plugin_dir_path($this->pluginFile) . "logs/";
                if (is_writable($path)) {
                    if (! is_dir($path)) {
                        mkdir($path, 0740, true);
                    }
                    $path .= "queries.sql";
                    //if (is_writable($filename)) {
                    if (file_exists($path) && filesize($path) > (1024 * 500)) {
                        unlink($path);
                    }
                    if (! empty($qu)) {
                        $fh = fopen($path, 'a');
                        if ($fh) {
                            $count   = AppsBDModel::GetTotalQueriesCountStr();
                            $queries = "-- " . get_permalink() . "----" . (date('Y-m-d h:i:s A')) . "--$count\n";
                            $queries .= $qu;
                            $queries .= "-- -----------------------------------------------------\n\n";
                            fwrite($fh, $queries);
                            fclose($fh);
                        }
                    }
                }
            }
        }

        final function CheckPluginVersionUpdate()
        {
            $db_version = get_option("APBD_pv_support-genix-lite", "");
            $db_pro_version = get_option("APBD_pv_support-genix", "");
            $db_pro_version = empty($db_pro_version) ? get_option("APBD_pv_apbd-wp-support", "") : $db_pro_version;

            $db_new_activated = rest_sanitize_boolean(get_option("apbd_support_genix_lite_new_activation", true));
            $db_new_pro_activated = rest_sanitize_boolean(get_option("apbd_support_genix_new_activation", true));

            if (true === $db_new_activated) {
                $new_activated = (empty($db_version) ? true : false);
                update_option('apbd_support_genix_lite_new_activation', $new_activated);
            }

            if (true === $db_new_pro_activated) {
                $new_pro_activated = (empty($db_pro_version) ? true : false);
                update_option('apbd_support_genix_new_activation', $new_pro_activated);
            }

            if (empty($db_version) || $db_version != $this->pluginVersion) {
                update_option("APBD_pv_support-genix-lite", $this->pluginVersion);

                if ($this->is_countable($this->moduleList)) {
                    foreach ($this->moduleList as $moduleObject) {
                        $moduleObject->OnTableCreate();
                        $moduleObject->OnPluginVersionUpdated($this->pluginVersion, $db_version, $db_pro_version);
                    }
                }
            }
        }

        public function _myautoload_method($class)
        {
            $basepath  = $path = plugin_dir_path($this->pluginFile);
            $firstchar = substr($class, 0, 1);
            if (strtoupper($firstchar) == "M") {
                $modelfilename = $basepath . "models/";
                if (file_exists($modelfilename . "database/{$class}.php")) {
                    APBD_LoadDatabaseModel($this->pluginFile, $class, $class);
                    return;
                } elseif (file_exists($modelfilename . "{$class}.php")) {
                    APBD_Load_Any($modelfilename . "{$class}.php");
                }
            } elseif (file_exists($basepath . "libs/{$class}.php")) {
                APBD_LoadLib($this->pluginFile, $class);
            } elseif (file_exists($basepath . "core/{$class}.php")) {
                APBD_Load_Any($basepath . "core/{$class}.php", $class);
            } elseif (file_exists($basepath . "appcore/{$class}.php")) {
                APBD_Load_Any($basepath . "appcore/{$class}.php", $class);
            }
        }

        public static function AddError($msg)
        {
            self::$errorMessage[] = $msg;
        }

        public static function AddWarning($msg)
        {
            self::$warningMessage[] = $msg;
        }

        public static function AddInfo($msg)
        {
            self::$infoMessage[] = $msg;
        }

        public static function GetError($prefix = '', $postfix = '')
        {
            if (count(self::$errorMessage) > 0) {
                return $prefix . implode($postfix . $prefix, self::$errorMessage) . $postfix;
            }

            return '';
        }

        public static function GetInfo($prefix = '', $postfix = '')
        {
            if (count(self::$infoMessage) > 0) {
                return $prefix . implode($postfix . $prefix, self::$infoMessage) . $postfix;
            }

            return '';
        }

        public static function GetWarning($prefix = '', $postfix = '')
        {
            if (is_array(self::$warningMessage) && count(self::$warningMessage) > 0) {
                return $prefix . implode($postfix . $prefix, self::$warningMessage) . $postfix;
            }

            return '';
        }

        public static function GetMsg($prefix1 = '', $prefix2 = '', $prefix3 = '', $postfix = '')
        {
            $str = self::GetError($prefix2, $postfix);
            $str .= self::GetInfo($prefix1, $postfix);
            $str .= self::GetWarning($prefix3, $postfix);
            if (! empty($str)) {
                return '<div class="d-m-b">' . $str . '</div>';
            }

            return '';
        }

        public static function HasUIMsg()
        {
            return count(self::$infoMessage) > 0 || count(self::$errorMessage) > 0;
        }

        public static function AddHiddenFields($key, $value)
        {
            self::$hiddenFilelds[$key] = $value;
        }

        public static function AddOldFields($key, $value)
        {
            self::AddHiddenFields("old_" . $key, $value);
        }

        public static function GetHiddenFieldsArray()
        {
            return self::$hiddenFilelds;
        }

        public static function GetHiddenFieldsHTML()
        {
            ob_start();
            foreach (self::$hiddenFilelds as $name => $value) {
?>
                <input type="hidden" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value); ?>" />
            <?php
            }

            return ob_get_clean();
        }

        function AddCoreLib($libname)
        {
            if (! class_exists($libname)) {
                $path = dirname(__FILE__) . "/" . $libname . ".php";
                if (file_exists($path)) {
                    @include_once($path);
                }
            }
        }

        function AddLib($libname)
        {
            if (! class_exists($libname)) {
                $path = plugin_dir_path($this->pluginFile) . "lib/" . $libname . ".php";
                if (file_exists($path)) {
                    @include_once($path);
                }
            }
        }

        /**
         *
         * @return self
         */
        static function &GetInstance()
        {
            return self::$_instence[static::class];
        }

        /**
         * @param $base
         *
         * @return self
         */
        static function &GetInstanceByBase($base)
        {
            return self::$_instence_base[$base];
        }

        /**
         * @param $moduleClassName
         */
        function AddModule($moduleClassName)
        {
            if (! class_exists($moduleClassName)) {
                $path = plugin_dir_path($this->pluginFile) . "modules/" . $moduleClassName . ".php";
                if (file_exists($path)) {
                    @include_once($path);
                }
            }
            $this->moduleList[] = new $moduleClassName($this->pluginBaseName, $this);
            if (! $this->isTabMenu) {
                if ($this->is_countable($this->moduleList) && count($this->moduleList) > 1) {
                    $this->isTabMenu = true;
                }
            }
        }

        function WPAdminCheckDefaultCssScript($src)
        {

            if (empty($src) || $src == 1 || preg_match("/\/assets|\/css\/main.css|\/wp-admin\/|\/wp-includes\/|\/plugins\/woocommerce\/assets\/|\/plugins\/elementor\/assets\/css\/admin/", $src)) {
                return true;
            }

            return false;
        }

        function AddJquery()
        {
            wp_enqueue_script('jquery');
        }

        function WpHead() {}
        public function BasePath($relative_path = '')
        {
            return  plugin_dir_path($this->pluginFile) . $relative_path;
        }
        function AdminScriptData()
        {
            ?>
            <script type="text/javascript">
                <?php
                foreach ($this->moduleList as $moduleObject) {
                    //$moduleObject=new APPSBDBase();
                    $moduleObject->AdminScriptData();
                }
                ?>
            </script>
        <?php
        }

        function AddAdminStyle($StyleId, $StyleFileName = '', $isFromRoot = false, $deps = [])
        {
            if ($isFromRoot) {
                $start = "/";
            } else {
                $start = "/assets/css/";
            }

            if (! empty($StyleFileName)) {
                self::RegisterAdminStyle($StyleId, plugins_url($start . $StyleFileName, $this->pluginFile), $deps);
            } else {
                self::RegisterAdminStyle($StyleId);
            }
        }

        function AddAdminScript($ScriptId, $ScriptFileName = '', $isFromRoot = false, $deps = [])
        {
            if ($isFromRoot) {
                $start = "/";
            } else {
                $start = "/assets/js/";
            }
            if (! empty($ScriptFileName)) {
                self::RegisterAdminScript($ScriptId, plugins_url($start . $ScriptFileName, $this->pluginFile), $deps);
            } else {
                self::RegisterAdminScript($ScriptId, '');
            }
        }

        static function RegisterAdminStyle($handle, $src = "", $deps = [], $ver = false, $in_footer = false)
        {
            self::$appsbd_globalCss[] = $handle;
            if (! empty($src)) {
                if (! $ver) {
                    $thisObj = self::GetInstance();
                    $pluginFile = $thisObj->pluginFile;
                    $ver = $thisObj->pluginVersion;

                    $base_url = plugin_dir_url($pluginFile);
                    $base_path = plugin_dir_path($pluginFile);
                    $file_path = realpath(str_replace($base_url, $base_path, $src));

                    if (file_exists($file_path)) {
                        $ver .= '-';
                        $ver .= filemtime($file_path);

                        if (defined('WP_DEBUG') && !!WP_DEBUG) {
                            $ver .= '-';
                            $ver .= time();
                        }
                    }
                }

                wp_register_style($handle, $src, $deps, $ver, $in_footer);
            }
            wp_enqueue_style($handle);
        }

        static function RegisterAdminScript($handle, $src = "", $deps = [], $ver = false, $in_footer = false)
        {
            self::$appsbd_globalJS[] = $handle;
            if (! empty($src)) {
                if (! $ver) {
                    $thisObj = self::GetInstance();
                    $pluginFile = $thisObj->pluginFile;
                    $ver = $thisObj->pluginVersion;

                    $base_url = plugin_dir_url($pluginFile);
                    $base_path = plugin_dir_path($pluginFile);
                    $file_path = realpath(str_replace($base_url, $base_path, $src));

                    if (file_exists($file_path)) {
                        $ver .= '-';
                        $ver .= filemtime($file_path);

                        if (defined('WP_DEBUG') && !!WP_DEBUG) {
                            $ver .= '-';
                            $ver .= time();
                        }
                    }
                }

                wp_deregister_script($handle);
                wp_register_script($handle, $src, $deps, $ver, $in_footer);
            }
            wp_enqueue_script($handle);
        }

        function OnAdminMainOptionStyles()
        {

            foreach ($this->moduleList as $moduleObject) {
                if ($moduleObject->OnAdminMainOptionStyles($this)) {
                }
            }
        }

        function OnAdminGlobalStyles()
        {
            $this->AddAdminStyle($this->support_genix_assets_slug . "-global", "main.css");

            foreach ($this->moduleList as $moduleObject) {
                if ($moduleObject->OnAdminGlobalStyles()) {
                }
            }
        }
        function OnAdminNotices()
        {
            echo implode("", static::$_admin_notice);
        }

        function OnAdminAppStyles()
        {
            foreach ($this->moduleList as $moduleObject) {
                //$moduleObject=new APPSBDBase();
                $moduleObject->AdminStyles();
            }
        }

        function OnAdminAppScripts()
        {
            foreach ($this->moduleList as $moduleObject) {
                //$moduleObject=new APPSBDBase();
                $moduleObject->AdminScripts();
            }
        }

        function OnAdminMainOptionScripts()
        {
            foreach ($this->moduleList as $moduleObject) {
                if ($moduleObject->OnAdminMainOptionScripts()) {
                }
            }
        }

        function OnAdminGlobalScripts()
        {
            $this->AddAdminScript($this->support_genix_assets_slug . "-global", "main.js", false, ["jquery"]);

            foreach ($this->moduleList as $moduleObject) {
                if ($moduleObject->OnAdminGlobalScripts()) {
                }
            }
        }


        final function SetAdminStyle()
        {

            if (is_callable($this->support_genix_slug . "_SetAdminStyle")) {
                call_user_func($this->support_genix_slug . "_SetAdminStyle");
            }
        }

        function SetAdminScript()
        {
            if (is_callable($this->support_genix_slug . "_SetAdminScript")) {
                call_user_func($this->support_genix_slug . "_SetAdminScript");
            }
        }


        function SetClientScript()
        {
            foreach ($this->moduleList as $moduleObject) {
                //$moduleObject=new APPSBDBase();
                if ($moduleObject->IsActive()) {
                    $moduleObject->ClientScript();
                }
            }
        }

        function SetClientStyle()
        {
            foreach ($this->moduleList as $moduleObject) {
                //$moduleObject=new APPSBDBase();
                if ($moduleObject->IsActive()) {
                    $moduleObject->ClientStyle();
                }
            }
        }

        function CheckAdminPage()
        {
            $page = ! empty($_REQUEST['page']) ? sanitize_text_field($_REQUEST['page']) : "";
            $page = trim($page);
            if (! empty($page)) {
                if ($page == $this->pluginBaseName) {
                    return true;
                }
                foreach ($this->moduleList as $moduleObject) {
                    //$moduleObject=new APPSBDBase();
                    if ($moduleObject->IsPageCheck($page)) {
                        return true;
                    }
                }
            }

            return false;
        }

        static function IsMainOptionPage()
        {
            $file = basename($_SERVER['SCRIPT_FILENAME']);
            if ($file == "plugins.php") {
                if (empty($_REQUEST['page'])) {
                    return true;
                }
            }

            return false;
        }

        final public function _OnInit()
        {
            if (is_callable($this->support_genix_slug . "_init")) {
                call_user_func($this->support_genix_slug . "_init");
            }
        }

        final function AdminMenu()
        {
            if (is_callable($this->support_genix_slug . "_AdminMenu")) {
                call_user_func($this->support_genix_slug . "_AdminMenu");
            }
        }

        final function AdminHead()
        {
            if (is_callable($this->support_genix_slug . "_AdminHead")) {
                call_user_func($this->support_genix_slug . "_AdminHead");
            }
        }

        function _e($string, $parameter = NULL, $_ = NULL)
        {
            $args = func_get_args();
            echo call_user_func_array([$this, "__"], $args);
        }

        function _ee($string, $parameter = NULL, $_ = NULL)
        {
            $args = func_get_args();
            foreach ($args as &$arg) {
                if (is_string($arg)) {
                    $arg = $this->__($arg);
                }
            }
            echo call_user_func_array("sprintf", $args);
        }

        function __($string, $parameter = NULL, $_ = NULL)
        {
            $args = func_get_args();
            array_splice($args, 1, 0, array($this->pluginBaseName));

            return call_user_func_array("APBD_Lan__", $args);
        }

        function ___($string, $parameter = NULL, $_ = NULL)
        {
            $args = func_get_args();
            foreach ($args as &$arg) {
                if (is_string($arg)) {
                    $arg = $this->__($arg);
                }
            }

            return call_user_func_array("sprintf", $args);
        }

        function OnInit()
        {
            //$this->AddAdminStyle( "admin-core-style.css", "apsbdplugincore" );
        }

        final function LinksActions($links)
        {
            if (Apbd_wps_settings::isAgentLoggedIn()) {
                $user = wp_get_current_user();
                $role_slugs = isset($user->roles) ? $user->roles : array();

                if (current_user_can('manage_options') || in_array('administrator', $role_slugs)) {
                    $links[] = "<a class='edit coption' href='admin.php?page=" . $this->pluginBaseName . "#/settings'>" . $this->__("Settings") . "</a>";
                }

                $links[] = "<a class='edit coption' href='admin.php?page=" . $this->pluginBaseName . "'>" . $this->__("Tickets") . "</a>";
            }

            foreach ($this->moduleList as $moduleObject) {
                $moduleObject->LinksActions($links);
            }

            return $links;
        }

        final function PluginRowMeta($plugin_meta, $plugin_file)
        {
            if ($plugin_file == plugin_basename($this->pluginFile)) {
                foreach ($this->moduleList as $moduleObject) {
                    $moduleObject->PluginRowMeta($plugin_meta);
                }
            }

            return $plugin_meta;
        }

        final function SetClientScriptBase()
        {
            $this->SetClientScript();
        }

        final function SetClientStyleBase()
        {
            $this->SetClientStyle();
        }

        final function SetAdminScriptBase()
        {
            $this->SetAdminScript();
        }

        final function SetAdminStyleBase()
        {
            $this->SetAdminStyle();
        }

        final function OnActive()
        {
            $new_activation = rest_sanitize_boolean(get_option('apbd_support_genix_lite_new_activation', true));
            $new_pro_activation = rest_sanitize_boolean(get_option('apbd_support_genix_new_activation', true));

            foreach ($this->moduleList as $moduleObject) {
                $moduleObject->OnTableCreate();
                $moduleObject->OnActive($new_activation, $new_pro_activation);
            }

            update_option('apbd_support_genix_redirect_flag', true);
        }

        final function OnDeactive()
        {
            foreach ($this->moduleList as $moduleObject) {
                if ($moduleObject->OnDeactive()) {
                    return true;
                }
            }

            // Clear corn schedule.
            $corn_hooks = [];

            foreach ($corn_hooks as $hook) {
                if (wp_next_scheduled($hook)) {
                    wp_clear_scheduled_hook($hook);
                }
            }
        }

        function getActiveModuleId()
        {
            $selected = (! empty($_COOKIE[$this->pluginBaseName . '_st_menu'])) ? $_COOKIE[$this->pluginBaseName . '_st_menu'] : "";
            if (! empty($selected)) {
                return $selected;
            }
            if ($this->is_countable($this->moduleList) && count($this->moduleList) > 0) {
                return $this->moduleList[0]->GetModuleId();
            }

            return "";
        }

        /**
         * @param AppsBDBaseModuleLite $moduleObject
         * @param string $currentModuleId
         */
        function geMenuTabItem($moduleObject, $activeModuleId)
        {
            $currentModuleId = $moduleObject->GetModuleId();
        ?>
            <li class="nav-item">
                <a id="tb-<?php echo esc_attr($currentModuleId); ?>" data-module-id="<?php echo esc_attr($currentModuleId); ?>"
                    title="<?php echo esc_attr($moduleObject->GetMenuTitle()); ?>"
                    data-placement="right"
                    class="app-tooltip nav-link <?php echo esc_attr($activeModuleId == $currentModuleId ? ' active ' : ''); ?>"
                    data-toggle="pill" href="#<?php echo esc_attr($currentModuleId); ?>">
                    <i class="<?php echo esc_attr($moduleObject->GetMenuIcon()); ?> pull-left"></i>
                    <span class="apd-title"><?php echo wp_kses_html($moduleObject->GetMenuTitle()); ?></span>
                    <?php echo wp_kses_html($moduleObject->GetMenuCounter()); ?>
                    <span class="apd-sub-title"><?php echo wp_kses_html($moduleObject->GetMenuSubTitle()); ?></span>
                </a>
            </li>
        <?php
        }

        function getMenuTab()
        {
            if (! $this->isTabMenu) {
                return;
            }
            $activeModuleId  = $this->getActiveModuleId();
            $isMenuOpen      = ! isset($_COOKIE[$this->pluginBaseName . '_sel_menu']) || ! empty($_COOKIE[$this->pluginBaseName . '_sel_menu']);
            $lastMenu        = NULL;
            $currentModuleId = "";
        ?>
            <!-- Nav pills -->
            <nav id="apd-sidebar" class="<?php echo ($isMenuOpen ? ' active ' : ''); ?>">
                <ul class="nav flex-column">
                    <?php foreach ($this->moduleList as $moduleObject) {
                        if ($moduleObject->isDisabledMenu()) {
                            continue;
                        }
                        if ($moduleObject->isHiddenModule()) {
                            continue;
                        }
                        if (empty($lastMenu) && $moduleObject->isLastMenu()) {
                            $lastMenu = $moduleObject;
                            continue;
                        }
                        $this->geMenuTabItem($moduleObject, $activeModuleId);
                    }
                    if (! empty($lastMenu)) {
                        $this->geMenuTabItem($lastMenu, $activeModuleId);
                    }
                    ?>

                </ul>
            </nav>
            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    $('#apd-sidebar a[data-toggle="pill"]').on('shown.bs.tab', function(e) {
                        e.target // newly activated tab
                        e.relatedTarget // previous active tab
                        var onactivated = $(e.target).data("module-id");
                        try {
                            APPSBDAPPJS.core.CallOnTabActive(onactivated);
                            APPSBDAPPJS.core.SetCookie("<?php echo esc_js($this->pluginBaseName . '_st_menu'); ?>", onactivated, 30, "/");
                        } catch (e) {}
                        try {
                            $('.app-right-menu .navbar-nav .nav-link').removeClass("active");
                        } catch (e) {}
                    })

                    $('.app-right-menu .navbar-nav .nav-link').on('click', function(e) {
                        $("#apd-sidebar .nav .nav-item a.nav-link").removeClass("active");
                    });
                    try {
                        APPSBDAPPJS.core.CallOnTabActive("<?php echo esc_js($activeModuleId); ?>");
                    } catch (e) {}
                });
            </script>
<?php
        }

        function OptionFormBase()
        {
            echo '<div id="support-genix"></div>';
        }

        final function PluginUpdate($transient)
        {
            return $transient;
        }

        final function checkUpdateInfo($false, $action, $arg)
        {
            return $false;
        }

        private function _getHeaderHtml()
        {
            $this->GetHeaderHtml();
        }

        final function RedirectToDashboard()
        {
            $redirect_flag = get_option('apbd_support_genix_redirect_flag');

            if (true === rest_sanitize_boolean($redirect_flag)) {
                update_option('apbd_support_genix_redirect_flag', false);
                if (Apbd_wps_settings::isAgentLoggedIn()) {
                    wp_safe_redirect(admin_url('admin.php?page=support-genix'));
                    exit();
                }
            }
        }

        final function StartPlugin()
        {
            if (is_callable($this->support_genix_slug . "_StartPlugin")) {
                call_user_func($this->support_genix_slug . "_StartPlugin");
            }
            $this->CheckPluginVersionUpdate($this->pluginVersion);

            new APBD_WPS_Corn_Jobs();
        }
    }
}
