<?php

/**
 * Support.
 */

defined('ABSPATH') || exit;

APBD_LoadCore("AppsBDKarnelSupportGenixLite", "AppsBDKarnelSupportGenixLite", __FILE__);

class APBDWPSupportLite extends AppsBDKarnelSupportGenixLite
{
    function __construct($pluginBaseFile, $version = '1.0.0')
    {
        $this->pluginFile       = $pluginBaseFile;
        $this->pluginBaseName   = 'support-genix';
        $this->pluginName       = 'Support Genix';
        $this->pluginVersion    = $version;
        $this->bootstrapVersion = '4.6.0';
        parent::__construct($pluginBaseFile, $version);

        if (!defined('SUPPORTGENIX_DEMO')) {
            define('SUPPORTGENIX_DEMO', false);
        }
        $this->setIsDemoMode(SUPPORTGENIX_DEMO);
    }
    public static function get_portal_url($link, $ver = "1.0.0")
    {
        return plugins_url("portal/" . $link . "?v=" . $ver, self::GetInstance()->pluginFile);
    }
    public function initialize()
    {
        parent::initialize();
        $this->SetIsLoadJqGrid(true);
        $this->SetPluginIconClass("dashicons-logo-icon", 'dashicons-logo-icon');
        $this->setSetActionPrefix("apbd_wps");
        $this->AddModule("Apbd_wps_role");
        $this->AddModule("Apbd_wps_ticket_category");
        $this->AddModule("Apbd_wps_ticket_tag");
        $this->AddModule("Apbd_wps_ticket_assign_rule");
        $this->AddModule("Apbd_wps_email_template");
        $this->AddModule("Apbd_wps_canned_msg");
        $this->AddModule("Apbd_wps_custom_field");
        $this->AddModule("Apbd_wps_woocommerce");
        $this->AddModule("Apbd_wps_edd");
        $this->AddModule("Apbd_wps_fluentcrm");
        $this->AddModule("Apbd_wps_whatsapp");
        $this->AddModule("Apbd_wps_slack");
        $this->AddModule("Apbd_wps_envato_system");
        $this->AddModule("Apbd_wps_elite_licenser");
        $this->AddModule("Apbd_wps_tutorlms");
        $this->AddModule("Apbd_wps_betterdocs");
        $this->AddModule("Apbd_wps_webhook");
        $this->AddModule("Apbd_wps_incoming_webhook");
        $this->AddModule("Apbd_wps_mailbox");
        $this->AddModule("Apbd_wps_email_to_ticket");
        $this->AddModule("Apbd_wps_ticket");
        $this->AddModule("Apbd_wps_ticket_reply");
        $this->AddModule("Apbd_wps_users");
        $this->AddModule("Apbd_wps_settings");
        $this->AddModule("Apbd_wps_report");
        $this->AddModule("Apbd_wps_report_email");
        $this->AddModule("Apbd_wps_weekend");
        $this->AddModule("Apbd_wps_google");
        $this->AddModule("Apbd_wps_debug_log");
    }
    function _myautoload_method($class)
    {
        $basepath = plugin_dir_path($this->pluginFile);

        $filename = $basepath . "api/{$class}.php";
        if (file_exists($filename)) {
            APBD_Load_Any($filename, $class);
        } else {
            $isFound = false;
            foreach (['v1'] as $subpath) {
                $filename = $basepath . "api/{$subpath}/{$class}.php";

                if (file_exists($filename)) {
                    $isFound = true;
                    APBD_LoadPluginAPI($class, $subpath);
                }
            }
            if (!$isFound) {
                parent::_myautoload_method($class);
            }
        }
    }
    public function OnInit()
    {
        parent::OnInit();
        add_action('rest_api_init', function () {
            header("Access-Control-Allow-Origin: *");
            $namespace = self::getNamespaceStr();
            new APBDWPSHeartBitAPI($namespace);
            new APBDWPSUserAPI($namespace);
            new APBDWPSTicketAPI($namespace);
            new APBDWPSAPIConfig($namespace);
            new APBDWPSAPIPortal($namespace);
        });
    }


    function OnAdminAppStyles()
    {
        wp_enqueue_media();

        $base_path = plugin_dir_path($this->pluginFile);
        $dist_path = untrailingslashit($base_path) . "/dashboard/dist";
        $dist_files = apbd_wps_get_files_in_directory($dist_path, 'css');

        if (is_array($dist_files) && !empty($dist_files)) {
            foreach ($dist_files as $file_name) {
                if (0 === strpos($file_name, 'main.')) {
                    $this->AddAdminStyle($this->support_genix_assets_slug . "-dashboard-main", "dashboard/dist/{$file_name}", true);
                }
            }
        } else {
            $this->AddAdminStyle($this->support_genix_assets_slug . "-dashboard-main", "dashboard/dist/main.D00EvwKd.1738820420341.css", true);
        }

        foreach ($this->moduleList as $moduleObject) {
            $moduleObject->AdminStyles();
        }
    }
    function OnAdminAppScripts()
    {
        $coreObject = APBDWPSupportLite::GetInstance();

        $base_path = plugin_dir_path($this->pluginFile);
        $dist_path = untrailingslashit($base_path) . "/dashboard/dist";
        $dist_files = apbd_wps_get_files_in_directory($dist_path, 'js');

        if (is_array($dist_files) && !empty($dist_files)) {
            foreach ($dist_files as $file_name) {
                if (0 === strpos($file_name, 'main.')) {
                    $this->AddAdminScript($this->support_genix_assets_slug . "-dashboard-main", "dashboard/dist/{$file_name}", true);
                }
            }
        } else {
            $this->AddAdminScript($this->support_genix_assets_slug . "-dashboard-main", "dashboard/dist/main.xVuMp9sx.1738820420341.js", true);
        }

        wp_localize_script($this->support_genix_assets_slug . "-dashboard-main", "support_genix_config", [
            'lite' => true,
            'demo' => $coreObject->isDemoMode(),
            'post_url' => admin_url('admin-post.php'),
            'ajax_url' => admin_url('admin-ajax.php'),
            'ajax_nonce' => wp_create_nonce('ajax-nonce'),
            'license_nonce' => wp_create_nonce('apbd-el-license-r'),
            'license_email' => get_option("apbd_wps_license_email", get_bloginfo('admin_email')),
            'admin_email' => get_bloginfo('admin_email'),
            'multi_lang' => apply_filters("apbd-wps/multi-language", ['code' => 'en', 'status' => 'I']),
            'wp_timezone' => APBD_TimezoneString(),
            'wp_settings_url' => admin_url('options-general.php'),
            'pricing_url' => 'https://supportgenix.com/pricing/?utm_source=admin&utm_medium=mainmenu&utm_campaign=free',
            'texts' => Apbd_wps_settings::dashboard_texts(),
            'debug' => defined('WP_DEBUG') ? !!WP_DEBUG : false,
        ]);

        add_filter('script_loader_tag', function ($tag, $handle, $src) {
            if ('support-genix-dashboard-main' === $handle) {
                $tag = '<script type="module" src="' . esc_url($src) . '" id="support-genix-dashboard-main-js"></script>';
            }

            return $tag;
        }, 10, 3);

        foreach ($this->moduleList as $moduleObject) {
            $moduleObject->AdminScripts();
        }
    }
    static function getNamespaceStr()
    {
        return "apbd-wps/v1";
    }

    function GetHeaderHtml()
    {
        // TODO: Implement GetHeaderHtml() method.
    }

    function GetFooterHtml()
    {
        // TODO: Implement GetFooterHtml() method.
    }


    function WPAdminCheckDefaultCssScript($src)
    {
        if (!parent::WPAdminCheckDefaultCssScript($src)) {
            if (empty($src) || $src == 1 || preg_match("/\/plugins\/query-monitor\//", $src)) {
                return true;
            }
        } else {
            return true;
        }
    }
    public function OnAdminGlobalStyles()
    {
        parent::OnAdminGlobalStyles();
    }
    static function StartApp($fileName) {}

    function OptionFormBase()
    {
        echo '<div id="support-genix"></div>';
    }
}
