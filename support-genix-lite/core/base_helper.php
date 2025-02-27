<?php

/**
 * Base helper.
 */

defined('ABSPATH') || exit;

if (!defined("APPSBD_IsPostBack")) {
    define("APPSBD_IsPostBack", strtoupper($_SERVER['REQUEST_METHOD']) == 'POST');
}
if (! function_exists("APBD_IsValidEmail")) {
    function APBD_IsValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
if (! function_exists('APBD_getTextByKey')) {
    function APBD_getTextByKey($key, $data = array())
    {
        return ! empty($data[$key]) ? $data[$key] : $key;
    }
}
if (!function_exists("SUPPORT_GENIX_SetAdminStyle")) {
    function SUPPORT_GENIX_SetAdminStyle()
    {
        $coreObject = APBDWPSupportLite::GetInstance();
        if (!$coreObject->isModuleLoaded()) {
            $coreObject->AddAdminStyle($coreObject->support_genix_assets_slug . "-global", "main.css");
            $coreObject->AddAdminScript($coreObject->support_genix_assets_slug . "-global", "main.js", false, ["jquery"]);
            return;
        }
        if (APBDWPSupportLite::IsMainOptionPage()) {
            $coreObject->OnAdminMainOptionStyles();
        }
        $coreObject->OnAdminGlobalStyles();

        if (! $coreObject->CheckAdminPage()) {
            return;
        }
        $coreObject->OnAdminAppStyles();

        global $wp_styles;

        $globalCss = APBDWPSupportLite::$appsbd_globalCss;

        if ($globalCss) {
            foreach ($wp_styles->queue as $style) {
                if (! in_array($style, $globalCss)) {
                    if (! $coreObject->WPAdminCheckDefaultCssScript($wp_styles->registered[$style]->src)) {
                        // wp_dequeue_style($style);
                    }
                }
            }
        }
    }
}
if (! function_exists("APBD_AppsbdGetCurlData")) {
    function APBD_AppsbdGetCurlData($url, $postdata = array(), $useragent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36")
    {

        if (! file_exists(dirname(__FILE__) . "/gtcookies.txt")) {
            $fh = fopen(dirname(__FILE__) . "/gtcookies.txt", 'w+');
            fclose($fh);
        }
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120);
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSLVERSION, 3);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . "/gtcookies.txt"); // cookies storage / here the changes have been made
        curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . "/gtcookies.txt");
        $result   = curl_exec($ch);
        $errorNo  = curl_errno($ch);
        $errorMsg = curl_error($ch);
        curl_close($ch);
        if ($errorNo == 0) {
            return $result;
        }

        return '';
    }
}
if (! function_exists("APBD_LoadFontAwesomeVector")) {
    function APBD_LoadFontAwesomeVector($basePath)
    {
        $path = realpath(dirname($basePath) . "/../uilib/font-awesome/4.7.0/fonts/FontAwesome.svg");
        if (file_exists($path)) {
            $data = strip_tags(apbd_file_get_contents($path));
            return $data;
        }
        return "";
    }
}
if (! function_exists("APBD_DownloadFile")) {
    function APBD_DownloadFile($url, $downloadpath)
    {
        $dir = dirname($downloadpath);
        if (! is_dir($dir)) {
            mkdir($dir, 0755);
        }
        if (is_file($downloadpath) && file_exists($downloadpath)) {
            $dir          = dirname($downloadpath);
            $filename     = basename($downloadpath);
            $downloadpath = $dir . "/" . time() . $filename;
        }
        $file = fopen($url, "rb");
        if ($file) {
            $newf = fopen($downloadpath, "wb");

            if ($newf) {
                while (! feof($file)) {
                    fwrite($newf, fread($file, 1024 * 8), 1024 * 8);
                }
            }
        }

        if ($file) {
            fclose($file);
        }

        return $downloadpath;
    }
}

if (! function_exists("APBD_PostValue")) {
    function APBD_PostValue($index, $default = NULL)
    {
        $data = wp_parse_args($_POST);

        if (! isset($data[$index])) {
            return $default;
        } else {
            return $data[$index];
        }
    }
}

if (! function_exists("APBD_RequestValue")) {
    function APBD_RequestValue($index, $default = NULL)
    {
        $data = wp_parse_args($_REQUEST);

        if (! isset($data[$index])) {
            return $default;
        } else {
            return $data[$index];
        }
    }
}
if (! function_exists("APBD_GetValue")) {
    function APBD_GetValue($index, $default = NULL)
    {
        $data = wp_parse_args($_GET);

        if (! isset($data[$index])) {
            return $default;
        } else {
            return $data[$index];
        }
    }
}
if (! function_exists("SMPrint")) {
    function SMPrint($obj)
    {
        echo "<pre>" . print_r($obj, true) . "</pre>";
    }
}
if (! function_exists("APBD_CleanDomainName")) {
    function APBD_CleanDomainName($domain)
    {
        $domain = trim($domain);
        $domain = strtolower($domain);
        $url = str_replace(['https://', 'http://'], "", $domain);
        $iswww = substr($url, 0, 4);
        if (strtolower($iswww) == "www.") {
            $url = substr($url, 4);
        }
        return $url;
    }
}

if (! function_exists("APBD_GetUrlToHost")) {
    function APBD_GetUrlToHost($url)
    {
        $result = parse_url($url);
        $url    = ! empty($result['host']) ? $result['host'] : $url;
        $url    = APBD_CleanDomainName($url);

        return $url;
    }
}

if (! function_exists("APBD_EndWith")) {
    function APBD_EndWith($haystack, $needle)
    {
        $len  = strlen($haystack);
        $nlen = strlen($needle);
        $sub  = substr($haystack, -$nlen);
        if ($sub == $needle) {
            return true;
        }

        return false;
    }
}
if (! function_exists("APBD_StartWith")) {
    function APBD_StartWith($haystack, $needle)
    {
        $len  = strlen($haystack);
        $nlen = strlen($needle);
        $sub  = substr($haystack, 0, $nlen);
        if ($sub == $needle) {
            return true;
        }

        return false;
    }
}
if (! function_exists('APBD_status_txt')) {
    function APBD_status_txt($status_code)
    {
        $status = array(
            "A" => "<span class='text-success'>" . esc_html__("Active", "support-genix-lite") . "</span>",
            "I" => "<span class='text-danger'> " . esc_html__("Inactive", "support-genix-lite") . "</span>",
            "Y" => "<span class='text-success'>" . esc_html__("Yes", "support-genix-lite") . "</span>",
            "N" => "<span class='text-danger'>" . esc_html__("No", "support-genix-lite") . "</span>"
        );

        return ! empty($status[$status_code]) ? $status[$status_code] : $status_code;
    }
}
if (! function_exists("APBD_getTimeSpan")) {
    function APBD_getTimeSpan($fisettime)
    {
        if (version_compare(PHP_VERSION, '5.3') >= 0) {
            $d1 = new DateTime();
            $d1->setTimestamp($fisettime);
            $d2 = new DateTime();
            if ($d1->diff($d2)->days > 0) {
                if ($d1->diff($d2)->i == 1) {
                    return "Yesterday";
                }
                $isS = $d1->diff($d2)->days ? "s" : "";

                return $d1->diff($d2)->days . " day$isS ago";
            } elseif ($d1->diff($d2)->h > 0) {
                $isS = $d1->diff($d2)->h ? "s" : "";

                return $d1->diff($d2)->h . " hour$isS ago";
            } elseif ($d1->diff($d2)->i > 0) {
                $isS = $d1->diff($d2)->i ? "s" : "";

                return $d1->diff($d2)->i . " minute$isS ago";
            } elseif ($d1->diff($d2)->s > 0) {
                return $d1->diff($d2)->i . " seconds ago";
            } else {
                return " a moment ago";
            }
        } else {
            return date('Y-m-d H:i:s', $fisettime);
        }
    }
}

if (! function_exists("APBD_GetValidDate")) {
    function APBD_GetValidDate($str, $format = 'Y-m-d')
    {
        if (! empty($str)) {
            $t = strtotime($str);
            if ($t) {
                return date($format, $t);
            }
        }
        return '';
    }
}

if (! function_exists('APBD_getCountryList')) {
    function APBD_getCountryList()
    {
        $jsonFile = dirname(__FILE__) . "/../data/json_data/country.json";
        if (file_exists($jsonFile)) {
            $json = apbd_file_get_contents($jsonFile);
            if (! empty($json)) {
                return json_decode($json);
            }
        }
        return array();
    }
}
if (!function_exists("SUPPORT_GENIX_init")) {
    function SUPPORT_GENIX_init()
    {
        $coreObject = APBDWPSupportLite::GetInstance();
        do_action($coreObject->_set_action_prefix . "/register_module", $coreObject);
        load_plugin_textdomain("support-genix-lite", FALSE, basename(dirname($coreObject->pluginFile)) . '/languages/');
        if ($coreObject->isModuleLoaded()) {
            foreach ($coreObject->moduleList as $moduleObject) {
                if ($moduleObject->OnInit()) {
                    return true;
                }
            }
            $coreObject->OnInit();
        } else {
            //need to change later

        }
    }
}
if (! function_exists('APBD_getCountryKeyValuePair')) {
    function APBD_getCountryKeyValuePair($inCountryNameFirst = false)
    {
        $countries = APBD_getCountryList();
        $response = array();
        foreach ($countries as $country) {
            if ($inCountryNameFirst) {
                $response[$country->name] = $country->code;
            } else {
                $response[$country->code] = $country->name;
            }
        }
        asort($response);
        return $response;
    }
}
if (! function_exists("APBD_file_put_contents")) {
    function APBD_file_put_contents($filename, $data, $flags = 0, $context = NULL)
    {
        if (file_put_contents($filename, $data, $flags, $context)) {
            return true;
        } else {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            WP_Filesystem();
            global $wp_filesystem;

            return $wp_filesystem->put_contents(
                $filename,
                $data,
                FS_CHMOD_FILE // predefined mode settings for WP files
            );
        }
    }
}
if (! function_exists("APBD_get_remote_ip")) {
    function APBD_get_remote_ip()
    {
        if (! empty($_SERVER['HTTP_X_REAL_IP'])) {
            return $_SERVER['HTTP_X_REAL_IP'];
        } elseif (! empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (! empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            return $_SERVER['HTTP_CF_CONNECTING_IP'];
        } else {
            return ! empty($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : "-";
        }
    }
}
if (!function_exists('APBD_get_file_system')) {
    /**
     * @return WP_Filesystem_Direct
     */
    function &APBD_get_file_system()
    {
        global $wp_filesystem;
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        WP_Filesystem();
        return $wp_filesystem;
    }
}
if (! function_exists("APBD_file_get_contents")) {
    function APBD_file_get_contents($filename)
    {
        $wp_filesystem = APBD_get_file_system();
        return $wp_filesystem->get_contents($filename);
    }
}
if (! function_exists("APBD_read_php_input_stream")) {
    function APBD_read_php_input_stream()
    {
        $wp_filesystem = APBD_get_file_system();
        return $wp_filesystem->get_contents('php://input');
    }
}

if (! function_exists("APBD_AddLogFile")) {
    function APBD_AddLogFile($data, $isAppend = true, $filename = "appsbd.log")
    {
        $filenamePath = WP_CONTENT_DIR . "/" . $filename;
        if (!is_string($data)) {
            $data = print_r($data, true);
        }
        if ($isAppend) {
            return apbd_file_put_contents($filenamePath, $data, FILE_APPEND);
        } else {
            return apbd_file_put_contents($filenamePath, $data);
        }
        // in production mode
        return false;
    }
}
