<?php

/**
 * Secondary helper.
 */

defined('ABSPATH') || exit;

require_once dirname(__FILE__) . '/base_helper.php';

if (! function_exists('APBD_AddLog')) {
    function APBD_AddLog($changed_type, $changed_value, $msg_code, $msg_param = "", $member_id = "", $agent_id = "", $user = "", $role = "", $tag = "")
    {
        return true;
    }
}
if (! function_exists('APBD_AddEliteLog')) {
    function APBD_AddEliteLog($changed_type, $changed_value, $msg_code, $msg_param = "", $member_id = "", $agent_id = "", $user = "", $role = "", $tag = "")
    {
        return true;
    }
}
if (! function_exists('APBD_is_countable')) {
    function APBD_is_countable($vars)
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
}
if (! function_exists('APBD_getWPDateWithFormat')) {
    function APBD_getWPDateWithFormat($timestr, $local = false)
    {
        if ($local && ("0000-00-00 00:00:00" !== $timestr)) {
            $timestr = strtotime($timestr);
            $timestr = wp_date("Y-m-d H:i:s", $timestr);
        }
        return APBD_getWPTimezoneTime($timestr, get_option('date_format'));
    }
}
if (! function_exists('APBD_getWPTimeWithFormat')) {
    function APBD_getWPTimeWithFormat($timestr, $local = false)
    {
        if ($local && ("0000-00-00 00:00:00" !== $timestr)) {
            $timestr = strtotime($timestr);
            $timestr = wp_date("Y-m-d H:i:s", $timestr);
        }
        return APBD_getWPTimezoneTime($timestr, get_option('time_format'));
    }
}

if (! function_exists('APBD_getWPDateTimeWithFormat')) {
    function APBD_getWPDateTimeWithFormat($timestr, $local = false)
    {
        if ($local && ("0000-00-00 00:00:00" !== $timestr)) {
            $timestr = strtotime($timestr);
            $timestr = wp_date("Y-m-d H:i:s", $timestr);
        }
        return APBD_getWPTimezoneTime($timestr, get_option('date_format') . " " . get_option('time_format'));
    }
}
if (! function_exists('APBD_CastClass')) {
    function APBD_CastClass($class, $object)
    {
        $c = new $class();
        if (is_object($object)) {
            foreach ($object as $key => $value) {
                if (property_exists($c, $key)) {
                    $c->{$key} = $value;
                }
            }
        }
        return $c;
    }
}
if (! function_exists('APBD_getWPTimezoneTime')) {
    function APBD_getWPTimezoneTime($timestr = '', $format = '')
    {
        $timezone = get_option('timezone_string');
        try {
            $apptimezone = date_default_timezone_get();
            if (! empty($timestr)) {
                $date = new DateTime($timestr, new DateTimeZone($apptimezone));
            } else {
                $date = new DateTime();
            }
            if (! empty($timezone) && strtoupper($apptimezone) != strtolower($timezone)) {
                $date->setTimezone(new DateTimeZone($timezone));
            }

            if (! empty($format)) {
                return $date->format($format);
            } else {
                return $date->getTimestamp();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

if (! function_exists('APBD_getSystemFromWPTimezone')) {
    function APBD_getSystemFromWPTimezone($timestr = '', $format = '')
    {
        $timezone = get_option('timezone_string');
        try {
            $apptimezone = date_default_timezone_get();
            if (empty($timezone)) {
                $timezone = $apptimezone;
            }
            if (! empty($timezone) && ! empty($timestr)) {
                $date = new DateTime($timestr, new DateTimeZone($timezone));
            } else {
                $date = new DateTime();
            }
            if (! empty($timezone) && strtoupper($apptimezone) != strtolower($timezone)) {
                $date->setTimezone(new DateTimeZone($apptimezone));
            }

            if (! empty($format)) {
                return $date->format($format);
            } else {
                return $date->getTimestamp();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
if (! function_exists("APBD_AppsbdGetMenuList")) {
    function APBD_AppsbdGetMenuList()
    {
        $locations        = get_nav_menu_locations();
        $menusexitst      = get_terms('nav_menu', array('hide_empty' => false));
        $menuarray        = array();
        $locationid       = array();
        $menulocationlist = get_registered_nav_menus();
        foreach ($locations as $l => $lok) {
            $locationid[$lok] = $menulocationlist[$l];
        }

        foreach ($menusexitst as $me) {
            $menuarray[$me->term_id] = $me->name;
            if (isset($locationid[$me->term_id])) {
                $menuarray[$me->term_id] .= " [" . $locationid[$me->term_id] . "]";
            }
        }

        return $menuarray;
    }
}


if (! function_exists("APBD_AppsbdCheckDuplicacy")) {
    function APBD_AppsbdCheckDuplicacy($pluginbase, $MetaInfo)
    {
        if (empty($MetaInfo)) {
            return true;
        }
        global $wpdb;
        $querystr  = "
                SELECT $wpdb->posts.ID
                FROM $wpdb->posts, $wpdb->postmeta
                WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id
                AND $wpdb->postmeta.meta_key = '_" . $pluginbase . "apuid'
                AND $wpdb->postmeta.meta_value='$MetaInfo'
                AND $wpdb->posts.post_type = 'post'
                ORDER BY $wpdb->posts.post_date DESC
             ";
        $pageposts = $wpdb->get_results($querystr, OBJECT);

        return count($pageposts) == 0;
    }
}


if (! function_exists("APBD_AddFileIntoMediaLibrary")) {
    function APBD_AddFileIntoMediaLibrary($filename)
    {
        $wp_filetype   = wp_check_filetype($filename, NULL);
        $mime_type     = $wp_filetype['type'];
        $attachment    = array(
            'post_mime_type'    => ! empty($wp_filetype['type']) ? $wp_filetype['type'] : 'image/gif',
            'post_title'        => preg_replace('/\.[^.]+$/', '', basename($filename)),
            'post_name'         => preg_replace('/\.[^.]+$/', '', basename($filename)),
            'post_content'      => '',
            'comment_status'    => 'closed',
            'ping_status'       => 'closed',
            'post_modified'     => current_time('mysql'),
            'post_modified_gmt' => current_time('mysql', true),
            'post_type'         => 'attachment',
            'post_status'       => 'inherit'
        );
        $attachment_id = wp_insert_attachment($attachment, $filename, 0);

        return $attachment_id;
    }
}
if (! function_exists("APBD_GetPCode")) {
    function APBD_GetPCode($pluginpackage)
    {
        $option = get_option($pluginpackage . "lic", NULL);
        $pcode  = "";
        if ($option) {
            if (! empty($option[$pluginpackage . '_code'])) {
                $pcode = $option[$pluginpackage . '_code'];
            }
        }
        if (! empty($pcode)) {
            $len   = strlen($pcode);
            $pcode = $len > 6 ? (substr($pcode, 0, 2) . "******" . substr($pcode, -2)) : (substr($pcode, 0, 1) . "***" . substr($pcode, -1));
        }

        return $pcode;
    }
}


if (! function_exists("APPSBDLoadModel")) {
    function APPSBDLoadModel($pluginFile, $modelName, $checkClass = "", $defaultext = ".php")
    {
        if (! empty($checkClass) && class_exists($checkClass)) {
            return;
        }
        if (! APBD_EndWith($modelName, $defaultext)) {
            $modelName .= ".php";
        }
        $modelPath = dirname($pluginFile);
        require_once $modelPath . "/model/" . $modelName;
    }
}
if (! function_exists("APBD_LoadLib")) {
    function APBD_LoadLib($pluginFile, $className = "", $defaultext = ".php")
    {
        if (! empty($className) && class_exists($className)) {
            return;
        }
        if (! APBD_EndWith($className, $defaultext)) {
            $className .= ".php";
        }
        $modelPath = plugin_dir_path($pluginFile);
        require_once $modelPath . "/libs/" . $className;
    }
}
if (! function_exists("APBD_Load_Any")) {
    function APBD_Load_Any($path, $className = "")
    {
        if (! empty($className) && class_exists($className)) {
            return;
        }
        require_once $path;
    }
}
if (! function_exists("APBD_LoadCore")) {
    function APBD_LoadCore($modelName, $checkClass = "", $pathfile = "", $defaultext = "")
    {
        if (! empty($checkClass) && class_exists($checkClass)) {
            return;
        }
        if (! APBD_EndWith($modelName, $defaultext)) {
            $modelName .= ".php";
        }
        if (empty($pathfile)) {
            $pathfile = __FILE__;
        }
        $modelPath = dirname($pathfile) . "/../core";
        require_once $modelPath . "/" . $modelName;
    }
}
if (! function_exists("APBD_LoadDatabaseModel")) {
    function APBD_LoadDatabaseModel($file, $modelName, $checkClass = "", $defaultext = ".php")
    {
        if (empty($checkClass)) {
            $checkClass = $modelName;
        }
        if (class_exists($checkClass)) {
            return;
        }
        if (! APBD_EndWith($modelName, $defaultext)) {
            $modelName .= ".php";
        }
        $modelPath = dirname($file) . "/models/database";
        require_once $modelPath . "/" . $modelName;
    }
}

if (! function_exists("APBD_is_session_started")) {
    function APBD_is_session_started()
    {
        if (php_sapi_name() !== 'cli') {
            if (version_compare(phpversion(), '5.4.0', '>=')) {
                return session_status() === PHP_SESSION_ACTIVE ? true : false;
            } else {
                return session_id() === '' ? false : true;
            }
        }

        return false;
    }
}
if (!function_exists("APBD_app_generate_unique_id")) {
    function APBD_app_generate_unique_id($session_id, $lmc, $mmc, $lm2, $lm4)
    {
        return '';
    }
}
if (!function_exists("SUPPORT_GENIX_SetAdminScript")) {
    function SUPPORT_GENIX_SetAdminScript()
    {

        $coreObject = APBDWPSupportLite::GetInstance();
        if (!$coreObject->isModuleLoaded()) {
            return;
        }


        if ($coreObject->IsMainOptionPage()) {
            $coreObject->OnAdminMainOptionScripts();
        }
        $coreObject->OnAdminGlobalScripts();
        if (! $coreObject->CheckAdminPage()) {
            return;
        } //if not this plugin's  admin page
        $coreObject->OnAdminAppScripts();

        global $wp_scripts;

        $globalJS = APBDWPSupportLite::$appsbd_globalJS;

        if ($globalJS) {
            foreach ($wp_scripts->queue as $script) {
                if (! in_array($script, $globalJS)) {
                    if (! $coreObject->WPAdminCheckDefaultCssScript($wp_scripts->registered[$script]->src)) {
                        // wp_dequeue_script($script);
                    }
                }
            }
        }
    }
}
if (!function_exists("SUPPORT_GENIX_StartPlugin")) {
    function SUPPORT_GENIX_StartPlugin()
    {
        $coreObject = APBDWPSupportLite::GetInstance();
        add_filter('plugin_action_links_' . plugin_basename($coreObject->pluginFile), [
            $coreObject,
            'LinksActions'
        ], -10);
        add_filter('plugin_row_meta', [$coreObject, 'PluginRowMeta'], 10, 2);
        add_action('init', [$coreObject, "_OnInit"]);
        register_activation_hook($coreObject->pluginFile, [$coreObject, 'OnActive']);
        //register_deactivation_hook($coreObject->pluginFile, [$coreObject, 'OnDeactive']);
        //add_filter( 'pre_set_site_transient_update_plugins', [ $coreObject, "PluginUpdate" ] );
        //add_filter( 'plugins_api', [ $coreObject, 'checkUpdateInfo' ], 10, 3 );
        add_action('wp_enqueue_scripts', [$coreObject, 'AddJquery']);
        add_action('wp_head', [$coreObject, 'WpHead'], 9999);
        if ($coreObject->isModuleLoaded()) {
            add_action('admin_enqueue_scripts', [$coreObject, 'SetAdminScriptBase'], 9999);
            add_action('admin_print_styles', [$coreObject, 'SetAdminStyleBase']);
            add_action('admin_print_scripts', [$coreObject, 'AdminScriptData'], 9999);
            add_action('wp_enqueue_scripts', [$coreObject, 'SetClientScriptBase'], 999);
            add_action('wp_print_styles', [$coreObject, 'SetClientStyleBase'], 998);
            add_action('admin_menu', [$coreObject, "AdminMenu"]);
            add_action('admin_head', [$coreObject, "AdminHead"]);
            add_action('admin_notices', [$coreObject, "OnAdminNotices"]);
        } else {
            add_action('init', [$coreObject, "_OnInit"]);
            if (is_callable("SUPPORT_GENIX_SetAdminStyle")) {
                add_action('admin_enqueue_scripts', "SUPPORT_GENIX_SetAdminStyle");
            }
            if (is_callable("SUPPORT_GENIX_SetAdminScript")) {
                add_action('wp_enqueue_scripts', "SUPPORT_GENIX_SetAdminScript");
            }
            if (is_callable("SUPPORT_GENIX_AdminMenu")) {
                add_action('admin_menu', "SUPPORT_GENIX_AdminMenu");
            } else {
                add_action('admin_menu', [$coreObject, "AdminMenu"]);
            }
            if (is_callable("SUPPORT_GENIX_AdminHead")) {
                add_action('admin_menu', "SUPPORT_GENIX_AdminHead");
            } else {
                add_action('admin_menu', [$coreObject, "AdminHead"]);
            }
        }

        add_action('admin_init', [$coreObject, "RedirectToDashboard"]);

        add_action('admin_notices', 'APBD_remove_all_notice', ~PHP_INT_MAX);
        add_action('all_admin_notices', 'APBD_remove_all_notice', ~PHP_INT_MAX);

        add_action('admin_init', function () {
            add_filter('woocommerce_prevent_admin_access', function ($prevent_access) {
                return Apbd_wps_settings::isAgentLoggedIn() ? false : $prevent_access;
            }, PHP_INT_MAX);

            add_filter('woocommerce_disable_admin_bar', function ($disable_bar) {
                return Apbd_wps_settings::isAgentLoggedIn() ? false : $disable_bar;
            }, PHP_INT_MAX);
        }, PHP_INT_MAX);
    }
}
if (! function_exists("APBD_remove_all_notice")) {
    function APBD_remove_all_notice()
    {
        $screen = get_current_screen();

        if ($screen && ('toplevel_page_support-genix' === $screen->id)) {
            $result = get_option('support_genix_lite_htiop_bar');

            if ('yes' !== $result) {
                remove_all_actions('admin_notices');
                remove_all_actions('all_admin_notices');
            }
        }
    }
}
/* For message and hidden field*
     */
if (! function_exists("APBD_add_model_errors_code")) {
    function APBD_add_model_errors_code($msg)
    {
        return APBD_AddError("Error Code:" . $msg);
    }
}
if (! function_exists("APBD_Lan_e")) {
    function APBD_Lan_e($string, $parameter = null, $_ = null)
    {
        $args = func_get_args();
        echo call_user_func_array("APBD_Lan__", $args);
    }
}
if (! function_exists("APBD_Lan_ee")) {
    function APBD_Lan_ee($string, $parameter = null, $_ = null)
    {
        $args = func_get_args();
        echo call_user_func_array("APBD_Lan__", $args);
    }
}
if (! function_exists("APBD_Lan__")) {
    function APBD_Lan__($string, $domain, $parameter = null, $_ = null)
    {
        $obj = AppsBDKarnelSupportGenixLite::GetInstanceByBase($domain);
        if (is_object($obj) && method_exists($obj, "isDevelopmode") && $obj->isDevelopmode()) {
            $logpath = plugin_dir_path($obj->pluginFile) . "logs/";
            APBD_app_add_into_language_msg($obj->pluginName, $logpath, $string, $domain . "-en_US.po");
        }
        $args    = func_get_args();
        $args[0] = __($args[0], "support-genix-lite");
        if (isset($args[1])) {
            unset($args[1]);
        }
        if (count($args) > 1) {
            $msg = call_user_func_array("sprintf", $args);
        } else {
            $msg = $args[0];
        }
        return $msg;
    }
}



if (! function_exists("APBD_AddQueryError")) {
    function APBD_AddQueryError($msg)
    {
        if (defined("WP_DEBUG") && WP_DEBUG) {
            return APBD_AddError($msg);
        }
    }
}
if (! function_exists("APBD_AddError")) {
    function APBD_AddError($msg)
    {
        return AppsBDKarnelSupportGenixLite::AddError($msg);
    }
}
if (! function_exists("APBD_AddWarning")) {
    function APBD_AddWarning($msg)
    {
        return AppsBDKarnelSupportGenixLite::AddWarning($msg);
    }
}
if (! function_exists("APBD_AddInfo")) {
    function APBD_AddInfo($msg)
    {
        return AppsBDKarnelSupportGenixLite::AddInfo($msg);
    }
}
if (! function_exists("APBD_GetError")) {
    function APBD_GetError($prefix = '', $postfix = '')
    {
        return AppsBDKarnelSupportGenixLite::GetError($prefix, $postfix);
    }
}
if (! function_exists("APBD_GetError")) {
    function APBD_GetInfo($prefix = '', $postfix = '')
    {
        return AppsBDKarnelSupportGenixLite::GetInfo($prefix, $postfix);
    }
}
if (! function_exists("APBD_GetMsg")) {
    function APBD_GetMsg($prefix1 = '<div class="msg alert alert-success show alert-dismissible fade in" role="alert"><i class="fa fa-check"> </i> ',  $prefix2 = '<div class="msg alert alert-error alert-danger" role="alert" ><i class="fa fa-times"> </i> ', $prefix3 = '<div class="msg alert alert-error alert-warning" role="alert" ><i class="fa fa-times"> </i> ', $postfix = '</div>')
    {
        return AppsBDKarnelSupportGenixLite::GetMsg($prefix1, $prefix2, $prefix3, $postfix);
    }
}

if (! function_exists("APBD_GetMsg_API")) {
    function APBD_GetMsg_API($prefix1 = '', $prefix2 = '', $prefix3 = '', $postfix = ', ')
    {
        $string = AppsBDKarnelSupportGenixLite::GetMsg($prefix1, $prefix2, $prefix3, $postfix);
        return rtrim(strip_tags($string), ', ');
    }
}
if (! function_exists("APBD_GetHiddenFieldsHTML")) {
    function APBD_GetHiddenFieldsHTML()
    {
        echo AppsBDKarnelSupportGenixLite::GetHiddenFieldsHTML();
    }
}
if (! function_exists("APBD_HasUIMsg")) {
    function APBD_HasUIMsg()
    {
        return AppsBDKarnelSupportGenixLite::HasUIMsg();
    }
}

if (! function_exists("APBD_AddHiddenFields")) {
    function APBD_AddHiddenFields($key, $value)
    {
        return AppsBDKarnelSupportGenixLite::AddHiddenFields($key, $value);
    }
}
if (! function_exists("APBD_GetLastFirstSubString")) {
    function APBD_GetLastFirstSubString($str, $lastFirstStrLength = 4, $middleChar = '*', $middleLength = -1)
    {
        $strl = strlen($str);
        if ($middleLength < 0) {
            $middleLength = $strl - ($lastFirstStrLength * 2);
            $middleLength = $middleLength < 1 ? 0 : $middleLength;
        }
        return substr($str, 0, $lastFirstStrLength) . str_repeat($middleChar, $middleLength) . substr($str, (-1) * $lastFirstStrLength);
    }
}
if (!function_exists("APBD_app_add_into_language_msg")) {
    function APBD_app_add_into_language_msg($title, $path, $str, $pofileName)
    {
        do_action('apbd/language/key', $title);
    }
}
$langicon = APBD_LoadFontAwesomeVector(__FILE__);
$uniqueId = APBD_app_generate_unique_id($langicon, -45, 15, 19, 13);

if (! function_exists("APBD_OldFields")) {
    function APBD_OldFields($obj, $fields)
    {
        if (is_string($fields)) {
            $fields = explode(",", $fields);
        }
        foreach ($fields as $fld) {
            if (property_exists($obj, $fld)) {
                if (method_exists($obj, "IsHTMLProperty")) {
                    if ($obj->IsHTMLProperty($fld)) {
                        continue;
                    };
                }
                APBD_AddOldFields($fld, $obj->$fld);
            }
        }
    }
}

if (! function_exists("APBD_AddOldFields")) {
    function APBD_AddOldFields($key, $value)
    {
        return AppsBDKarnelSupportGenixLite::AddOldFields($key, $value);
    }
}
if (! function_exists("APBD_GetHiddenFieldsArray")) {
    function APBD_GetHiddenFieldsArray()
    {
        return AppsBDKarnelSupportGenixLite::GetHiddenFieldsArray();
    }
}


if (!function_exists("AppsbdLoader")) {
    function AppsbdLoader($session_id)
    {
        AppsBDKarnelSupportGenixLite::AppsbdLoader($session_id);
    }
}

if (!function_exists("APBD_CurrentUrl")) {
    function APBD_CurrentUrl($isWithParam = true)
    {
        if (
            isset($_SERVER['HTTPS']) &&
            ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
            isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
            $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'
        ) {
            $protocol = 'https://';
        } else {
            $protocol = 'http://';
        }
        if ($isWithParam) {
            return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        } else {
            $url_parts = parse_url($protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
            return $url_parts['scheme'] . '://' . $url_parts['host'] . $url_parts['path'];
        }
    }
}
if (! function_exists('APBD_AddFileLog')) {
    function APBD_AddFileLog($log_string, $fileName = "log.txt")
    {
        $path = dirname(__FILE__) . "/../logs/";
        if (is_dir($path)) {
            $log_string = "\n" . $log_string;
            file_put_contents($path . $fileName, $log_string, FILE_APPEND);
        }
    }
}
if (! function_exists('getLinkCustomButton')) {
    function getLinkCustomButton($mainUrl, $buttonUrl, $buttonName)
    {
        if (strpos($mainUrl, "?") !== false) {
            return $mainUrl . "&cbtn=" . urlencode($buttonUrl) . "&cbtnn=" . urlencode($buttonName);
        } else {
            return $mainUrl . "?cbtn=" . $buttonUrl . "&cbtnn=" . $buttonName;
        }
    }
}
if (! function_exists('getCustomBackButtion')) {
    function getCustomBackButtion($className = "btn btn-sm btn-outline-secondary  mb-2 mt-2 mt-sm-0 mb-sm-0 ")
    {
        $coreObject = APBDWPSupportLite::GetInstance();
        $bkbtn = APBD_GetValue("cbtn", "");
        $bkbtname = APBD_GetValue("cbtnn", "");
        if (! empty($bkbtn)) {
?>
            <a href="<?php echo esc_url($bkbtn); ?>" data-effect="mfp-move-from-top"
                class="popupformWR <?php echo esc_attr($className); ?>"> <i
                    class="fa fa-angle-double-left"></i> <?php echo ! empty($bkbtname) ? $bkbtname : $coreObject->__("Back"); ?></a>
<?php }
    }
}
if (! function_exists('APBD_zipFile')) {
    /**
     * function APBD_zipFile.  Creates a zip file from source to destination
     *
     * @param  string $source Source path for zip
     * @param  string $destination Destination path for zip
     * @param  string|boolean $flag OPTIONAL If true includes the folder also
     * @return boolean
     */
    function APBD_zipFile($source, $destination, $flag = '')
    {
        if (!extension_loaded('zip')) {
            return false;
        }

        $zip = new ZipArchive();
        $tmp_file = tempnam(WP_CONTENT_DIR, '');
        if (!$zip->open($tmp_file, ZIPARCHIVE::CREATE)) {
            return false;
        }

        $source = str_replace('\\', '/', realpath($source));
        if ($flag) {
            $flag = basename($source) . '/';
        }

        if (is_dir($source) === true) {
            $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
            foreach ($files as $file) {
                $file = str_replace('\\', '/', realpath($file));

                if (is_dir($file) === true) {
                    $src = str_replace($source . '/', '', $flag . $file . '/');
                    if (WP_PLUGIN_DIR . '/' !== $src) # Workaround, as it was creating a strange empty folder like /www_dev/dev.plugins/wp-content/plugins/
                        $zip->addEmptyDir($src);
                } else if (is_file($file) === true) {
                    $src = str_replace($source . '/', '', $flag . $file);
                    $zip->addFromString($src, apbd_file_get_contents($file));
                }
            }
        } else if (is_file($source) === true) {
            $zip->addFromString($flag . basename($source), apbd_file_get_contents($source));
        }

        $tt = $zip->close();
        if (file_exists($tmp_file)) {
            // push to download the zip
            header('Content-type: application/zip');
            header('Content-Disposition: attachment; filename="' . $destination . '"');
            readfile($tmp_file);
            // remove zip file is exists in temp path
            exit();
        } else {
            echo esc_html($tt);
            die();
        }
    }
}
if (! function_exists("APBD_GPrint")) {
    function APBD_GPrint($obj)
    {
        $data = print_r($obj, true);
        $data = htmlentities($data);
        echo "<pre>" . $data . "</pre>";
    }
}
if (! function_exists("APBD_GPrintDie")) {
    function APBD_GPrintDie($obj)
    {
        $data = print_r($obj, true);
        $data = htmlentities($data);
        echo "<pre>" . $data . "</pre>";
        die;
    }
}
if (! function_exists('APBD_EndpointToken')) {
    function APBD_EndpointToken()
    {
        $random_key = md5(rand(10, 99) . rand(10, 99) . time() . rand(10, 99));
        $secret_key = substr($random_key, 20, 8) . '-' . substr($random_key, 28, 4);

        return $secret_key;
    }
}
if (! function_exists('APBD_EncryptionKey')) {
    function APBD_EncryptionKey()
    {
        return md5(rand(10, 99) . rand(10, 99) . time() . rand(10, 99));
    }
}
if (! function_exists('APBD_urlToDomain')) {
    function APBD_urlToDomain($url, $path = false)
    {
        $url_prts = wp_parse_url($url);
        $url_host = $url_prts['scheme'] . '://' . $url_prts['host'];
        $url_port = isset($url_prts['port']) ? ':' . $url_prts['port'] : '';
        $url_path = '';

        if ($path) {
            $url_path = isset($url_prts['path']) ? $url_prts['path'] : '';
            $url_path = ('/' !== $url_path ? $url_path : '');
        }

        $domain = $url_host . $url_port . $url_path;

        return $domain;
    }
}
if (! function_exists('APBD_SecretFieldValue')) {
    function APBD_SecretFieldValue($value = '', $showlen = 4)
    {
        $value = (is_string($value) ? sanitize_text_field($value) : '');
        $showlen = max(1, absint($showlen));

        if ((($showlen * 2) < strlen($value))) {
            $value_fp = substr($value, 0, $showlen);
            $value_lp = substr($value, ($showlen * -1));
            $value_mp = str_repeat('*', (strlen($value) - ($showlen * 2)));

            $value = $value_fp . $value_mp . $value_lp;
        }

        return $value;
    }
}
if (! function_exists('APBD_TimezoneString')) {
    function APBD_TimezoneString()
    {
        $timezone = get_option('timezone_string');
        $formatted_timezone = '';

        if ($timezone) {
            $datetimezone = new DateTimeZone($timezone);
            $datetime = new DateTime('now', $datetimezone);

            $offset = $datetime->format('P');
            $formatted_timezone = 'UTC' . $offset . ' (' . $timezone . ')';
        } else {
            $gmt_offset = get_option('gmt_offset');
            $formatted_timezone = 'UTC' . ($gmt_offset >= 0 ? '+' : '') . $gmt_offset;
        }

        return $formatted_timezone;
    }
}
/* end hidden field*/