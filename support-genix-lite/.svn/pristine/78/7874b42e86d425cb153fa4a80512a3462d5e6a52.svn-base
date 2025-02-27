<?php

/**
 * Settings.
 */

defined('ABSPATH') || exit;

class Apbd_wps_settings extends AppsBDBaseModuleLite
{
    /**
     * @var string
     */
    private static $uploadBasePath = WP_CONTENT_DIR . "/uploads/support-genix/";

    function initialize()
    {
        parent::initialize();
        $this->disableDefaultForm();
        $this->AddAjaxAction("data_logo", [$this, "dataLogo"]);
        $this->AddAjaxAction("data_file", [$this, "dataFile"]);
        $this->AddAjaxAction("data_captcha", [$this, "dataCaptcha"]);
        $this->AddAjaxAction("data_status", [$this, "dataStatus"]);
        $this->AddAjaxAction("data_style", [$this, "dataStyle"]);
        $this->AddAjaxAction("data_basic", [$this, "dataBasic"]);
        $this->AddAjaxAction("page_for_select", [$this, "page_for_select"]);
        $this->AddAjaxAction("logo", [$this, "AjaxRequestCallbackLogo"]);
        $this->AddAjaxAction("file", [$this, "AjaxRequestCallbackFile"]);
        $this->AddAjaxAction("captcha", [$this, "AjaxRequestCallbackCaptcha"]);

        $this->AddPortalAjaxAction("data_file", [$this, "dataFile"]);

        $this->AddPortalAjaxBothAction("data_basic", [$this, "dataBasic"]);

        self::$uploadBasePath = apply_filters('apbd-wps/filter/set-upload-path', self::$uploadBasePath);

        //filters
        add_filter("apbd-wps/filter/ticket-read-attached-files", [$this, 'set_ticket_attached_files'], 2, 2);
        add_filter("apbd-wps/filter/reply-read-attached-files", [$this, 'set_ticket_reply_attached_files'], 2, 2);
        add_filter("apbd-wps/filter/ticket-custom-properties", [$this, 'ticketCustomFields'], 2, 2);
        add_filter("apbd-wps/filter/user-custom-properties", [$this, 'userCustomFields'], 2, 2);

        //actions
        add_action("apbd-wps/action/download-file", [$this, 'download_file'], 8, 3);
        add_action("apbd-wps/action/ticket-created", [$this, 'save_ticket_meta'], 8, 2);
        add_action("apbd-wps/action/user-created", [$this, 'save_user_meta'], 8, 2);
        add_action("apbd-wps/action/user-updated", [$this, 'save_user_meta'], 8, 2);
        add_action("apbd-wps/action/download-file", [$this, 'download_file'], 8, 3);
        add_action("apbd-wps/action/ticket-custom-field-update", [$this, 'update_ticket_meta'], 10, 3);

        add_action('apbd-wps/action/ticket-created', [$this, "ticket_assign"], 8, 2);
        add_action('apbd-wps/action/ticket-created', [$this, "send_ticket_email"], 9, 2);
        add_action('apbd-wps/action/ticket-assigned', [$this, "notify_user_on_ticket_assigned"], 9, 1);
        add_action('apbd-wps/action/ticket-replied', [$this, "send_reply_notification"], 9, 2);
        add_action('apbd-wps/action/ticket-status-change', [$this, "send_close_ticket_email"], 9, 2);
        add_action('apbd-wps/action/ticket-status-change', [$this, "add_status_ticket_log"], 9, 2);
        add_action('apbd-wps/action/ticket-email-notification-change', [$this, "add_email_notification_ticket_log"], 9, 2);

        add_action('wp_mail_failed', [$this, "mail_send_failed"], 9, 1);

        add_filter("apbd-wps/filter/incoming-webhook-custom-field-valid", [$this, 'valid_incoming_webhook_custom_field'], 10, 5);
        add_filter("apbd-wps/filter/ticket-details-custom-properties", [$this, 'final_filter_custom_field'], 10, 3);
        add_filter('display_post_states', [$this, "post_states"], 10, 2);
        add_filter('wp_kses_allowed_html', [$this, 'custom_wpkses_post_tags'], 10, 2);
        add_filter('apbd-wps/filter/track-id-type', [$this, 'track_id_type'], 10);
        add_filter('apbd-wps/filter/display-track-id', [$this, 'display_track_id'], 10);
        add_filter('apbd-wps/filter/query-track-id', [$this, 'query_track_id'], 10);
        add_filter('apbd-wps/filter/ref-track-id', [$this, 'ref_track_id'], 10);
        add_action('apbd-wps/action/portal-header', [$this, "portal_header_custom"]);

        add_action('apbd-wps/action/ticket-created', function ($ticket) {
            do_action('apbd-wps/action/ticket-assigned-notice', $ticket);
        }, 98);

        add_action('show_user_profile', [$this, 'ProfileEditAction'], -99999);
        add_action('edit_user_profile', [$this, 'ProfileEditAction'], -99999);
        add_action('personal_options_update', [$this, 'ProfileUpdateAction']);
        add_action('edit_user_profile_update', [$this, 'ProfileUpdateAction']);

        add_action('template_redirect', [$this, 'portal_redirect'], ~PHP_INT_MAX);
        add_action('template_redirect', [$this, 'portal_templates'], ~PHP_INT_MAX);
        add_shortcode('supportgenix', [$this, 'portal_shortcodes']);
    }
    function portal_redirect()
    {
        if (is_user_logged_in()) {
            return;
        }

        global $post;

        $currentUrl = get_permalink($post);
        $currentUrl = esc_url_raw($currentUrl);

        $ticketPage = $this->GetOption("ticket_page", "");

        if (
            is_object($post) &&
            isset($post->post_content) &&
            (
                (!empty($ticketPage) && is_page($ticketPage)) ||
                has_shortcode($post->post_content, 'supportgenix')
            )
        ) {
            $is_wp_login_reg = sanitize_text_field($this->GetOption('is_wp_login_reg', 'N'));

            if ('Y' === $is_wp_login_reg) {
                $login_page = esc_url_raw($this->GetOption('login_page', ''));
                $login_page = empty($login_page) ? wp_login_url($currentUrl) : $login_page;

                if (home_url($_SERVER['REQUEST_URI']) !== $login_page) {
                    wp_safe_redirect($login_page);
                    exit;
                }
            }
        }
    }
    function portal_templates()
    {
        if (wp_validate_boolean(get_query_var('sgnix'))) {
            $this->guest_ticket_login();
        }

        $ticketPage = $this->GetOption("ticket_page", "");
        $shortcodeMode = $this->GetOption("ticket_page_shortcode", "N");

        if (! empty($ticketPage)) {
            if (is_page($ticketPage) && ('Y' !== $shortcodeMode)) {
?>
                <!DOCTYPE html>
                <html lang="">

                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width,initial-scale=1">
                    <link rel="icon" href="<?php echo esc_url($this->GetOption("app_favicon", $this->get_portal_url("dist/img/favicon32x32.png"))); ?>">
                    <link rel="icon" type="image/png" href="<?php echo esc_url($this->GetOption("app_favicon", $this->get_portal_url("dist/img/favicon180x180.png"))); ?>">
                    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url($this->GetOption("app_favicon", $this->get_portal_url("dist/img/favicon180x180.png"))); ?>">
                    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url($this->GetOption("app_favicon", $this->get_portal_url("dist/img/favicon32x32.png"))); ?>">
                    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url($this->GetOption("app_favicon", $this->get_portal_url("dist/img/favicon16x16.png"))); ?>">
                    <title><?php echo esc_html(get_the_title()); ?></title>
                    <?php do_action('apbd-wps/action/portal-header'); ?>
                </head>

                <body class="support-genix-portal">
                    <noscript>
                        <strong>
                            <?php $this->_e("We're sorry but Support Genix doesn't work properly without JavaScript enabled."); ?>
                        </strong>
                    </noscript>
                    <div id="support-genix"></div>
                </body>

                </html>
        <?php
                exit;
            }
        }
    }
    function portal_shortcodes()
    {
        ob_start();
        do_action('apbd-wps/action/portal-header', true);
        ?>
        <noscript>
            <strong>
                <?php $this->_e("We're sorry but Support Genix doesn't work properly without JavaScript enabled."); ?>
            </strong>
        </noscript>
        <div id="support-genix" class="support-shortcode"></div>
        <?php
        return ob_get_clean();
    }
    function portal_header_custom($shortcode = false)
    {
        global $post;

        $currentUrl = get_permalink($post);
        $currentUrl = esc_url_raw($currentUrl);

        $coreObject = APBDWPSupportLite::GetInstance();
        $base_path = plugin_dir_path($coreObject->pluginFile);
        $dist_path = untrailingslashit($base_path) . "/portal/dist";
        $dist_css_files = apbd_wps_get_files_in_directory($dist_path, 'css');
        $dist_js_files = apbd_wps_get_files_in_directory($dist_path, 'js');

        // Main CSS.
        if (is_array($dist_css_files) && !empty($dist_css_files)) {
            foreach ($dist_css_files as $file_name) {
                if (0 === strpos($file_name, 'main.')) {
        ?>
                    <link rel="stylesheet" id="support-genix-portal-main-css" href="<?php echo esc_url($this->get_portal_url("dist/{$file_name}")); ?>" media="" />
            <?php
                }
            }
        } else {
            ?>
            <link rel="stylesheet" id="support-genix-portal-main-css" href="<?php echo esc_url($this->get_portal_url("dist/main.CYYCLPxX.1738820436135.css")); ?>" media="" />
        <?php
        }

        // Primary color.
        if (!empty($this->get_primary_brand_color())) {
        ?>
            <style>
                <?php echo wp_kses_post($this->set_primary_color_css()); ?>
            </style>
        <?php
        }

        // Secondary color.
        if (!empty($this->get_secondary_brand_color())) {
        ?>
            <style>
                <?php echo wp_kses_post($this->set_secondary_color_css()); ?>
            </style>
        <?php
        }

        // Custom CSS.
        if (!empty($this->get_custom_css())) {
        ?>
            <style>
                <?php echo wp_kses_post($this->get_custom_css()); ?>
            </style>
        <?php
        }

        // Logo.
        $logo_url = esc_url_raw($this->GetOption('app_logo', ''));
        $logo_url = empty($logo_url) ? $this->get_portal_url("dist/img/logo.png", false) : $logo_url;

        // WP Login Reg.
        $reg_url = '';
        $login_url = '';
        $profile_url = '';

        $logout_url = wp_logout_url($currentUrl);
        $logout_url = htmlspecialchars_decode($logout_url);

        $is_wp_login_reg = sanitize_text_field($this->GetOption('is_wp_login_reg', 'N'));
        $is_wp_profile_link = sanitize_text_field($this->GetOption('is_wp_profile_link', 'N'));

        if ('Y' === $is_wp_login_reg) {
            $reg_url = esc_url_raw($this->GetOption('reg_page', ''));
            $reg_url = empty($reg_url) ? wp_registration_url() : $reg_url;

            $login_url = esc_url_raw($this->GetOption('login_page', ''));
            $login_url = empty($login_url) ? wp_login_url($currentUrl) : $login_url;
        }

        if ('Y' === $is_wp_profile_link) {
            $profile_url = esc_url_raw($this->GetOption('wp_profile_link', ''));
            $profile_url = empty($profile_url) ? admin_url("profile.php") : $profile_url;
        }

        // JS Config.
        $support_genix_config = [
            'lite' => true,
            'demo' => $coreObject->isDemoMode(),
            'shortcode' => $shortcode,
            'logo_url' => $logo_url,
            'reg_url' => $reg_url,
            'login_url' => $login_url,
            'profile_url' => $profile_url,
            'logout_url' => $logout_url,
            'logged_in' => is_user_logged_in(),
            'is_master' => Apbd_wps_settings::isAgentLoggedIn(),
            'home_url' => home_url(),
            'rest_url' => rest_url('apbd-wps/v1/portal/'),
            'rest_nonce' => wp_create_nonce('wp_rest'),
            'copy_text' => $this->copyright_text(),
            'primary_color' => $this->get_primary_brand_color(),
            'weekend_notice' => '',
            'texts' => Apbd_wps_settings::portal_texts(),
            'debug' => defined('WP_DEBUG') ? !!WP_DEBUG : false,
        ];
        ?>
        <script id="support-genix-portal-main-js-extra">
            var support_genix_config = <?php echo json_encode($support_genix_config); ?>;
        </script>
        <?php

        // Main JS.
        if (is_array($dist_js_files) && !empty($dist_js_files)) {
            foreach ($dist_js_files as $file_name) {
                if (0 === strpos($file_name, 'main.')) {
        ?>
                    <script type="module" src="<?php echo esc_url($this->get_portal_url("dist/{$file_name}")); ?>" id="support-genix-portal-main-js"></script>
            <?php
                }
            }
        } else {
            ?>
            <script type="module" src="<?php echo esc_url($this->get_portal_url("dist/main.WyXjDOeh.1738820436135.js")); ?>" id="support-genix-portal-main-js"></script>
        <?php
        }
    }
    function set_primary_color_css()
    {
        $color = $this->get_primary_brand_color();
        $css = '#support-genix .quill .ql-container .ql-editor a,#support-genix .quill .ql-container .ql-editor a:focus,#support-genix .quill .ql-container .ql-editor a:hover,#support-genix .quill .ql-replies:hover,#support-genix a.sg-anchor,#support-genix a.sg-anchor:focus,#support-genix a.sg-anchor:hover,.quill .ql-container .ql-editor a,.quill .ql-container .ql-editor a:focus,.quill .ql-container .ql-editor a:hover,.quill .ql-replies:hover,.sg-reply-text a,.sg-reply-text a:focus,.sg-reply-text a:hover,.sgenix-ant-modal a.sg-anchor,.sgenix-ant-modal a.sg-anchor:focus,.sgenix-ant-modal a.sg-anchor:hover{color:' . $color . '}#support-genix .sgenix-ant-form input.sgenix-ant-input:hover,#support-genix input.sgenix-ant-input:hover,.sgenix-ant-modal .sgenix-ant-form input.sgenix-ant-input:hover,.sgenix-ant-modal input.sgenix-ant-input:hover{border-color:' . $color . '}#support-genix .sgenix-ant-form input.sgenix-ant-input:focus,#support-genix .sgenix-ant-form input.sgenix-ant-input:focus-within,#support-genix input.sgenix-ant-input:focus,#support-genix input.sgenix-ant-input:focus-within,.sgenix-ant-modal .sgenix-ant-form input.sgenix-ant-input:focus,.sgenix-ant-modal .sgenix-ant-form input.sgenix-ant-input:focus-within,.sgenix-ant-modal input.sgenix-ant-input:focus,.sgenix-ant-modal input.sgenix-ant-input:focus-within{border-color:' . $color . '}#support-genix .cm-editor.cm-focused,#support-genix .cm-editor:hover,.cm-editor.cm-focused,.cm-editor:hover{border:1px solid ' . $color . '}#support-genix .quill .ql-toolbar.ql-snow .ql-active,#support-genix .quill .ql-toolbar.ql-snow .ql-picker-label:hover,#support-genix .quill .ql-toolbar.ql-snow button:hover,.quill .ql-toolbar.ql-snow .ql-active,.quill .ql-toolbar.ql-snow .ql-picker-label:hover,.quill .ql-toolbar.ql-snow button:hover{color:' . $color . '!important}#support-genix .quill .ql-toolbar.ql-snow .ql-active .ql-stroke,#support-genix .quill .ql-toolbar.ql-snow .ql-picker-label:hover .ql-stroke,#support-genix .quill .ql-toolbar.ql-snow button:hover .ql-stroke,.quill .ql-toolbar.ql-snow .ql-active .ql-stroke,.quill .ql-toolbar.ql-snow .ql-picker-label:hover .ql-stroke,.quill .ql-toolbar.ql-snow button:hover .ql-stroke{stroke:' . $color . '!important}#support-genix .quill .ql-toolbar.ql-snow .ql-active .ql-fill,#support-genix .quill .ql-toolbar.ql-snow .ql-picker-label:hover .ql-fill,#support-genix .quill .ql-toolbar.ql-snow button:hover .ql-fill,.quill .ql-toolbar.ql-snow .ql-active .ql-fill,.quill .ql-toolbar.ql-snow .ql-picker-label:hover .ql-fill,.quill .ql-toolbar.ql-snow button:hover .ql-fill{fill:' . $color . '!important}';
        return $css;
    }
    function set_secondary_color_css()
    {
        $color = $this->get_secondary_brand_color();
        $css = '';
        return $css;
    }
    function get_profile_link()
    {
        if ($this->GetOption('is_wp_profile_link', 'N') == 'Y') {
            $profileLink = $this->GetOption('wp_profile_link', '');
            if (! empty($profileLink)) {
                return $profileLink;
            } else {
                return admin_url("profile.php");
            }
        } else {
            return '';
        }
    }
    function get_custom_css()
    {
        return '';
    }
    function get_primary_brand_color()
    {
        return '#0bbc5c';
    }
    function get_secondary_brand_color()
    {
        return '#ff6e30';
    }
    function track_id_type($track_id)
    {
        $seq_track_id = 'N';

        if ($seq_track_id == "Y") {
            $track_id = "S";
        }
        return $track_id;
    }
    function display_track_id($track_id)
    {
        $prefix = substr($track_id, 0, 2);
        if ("S-" == $prefix) {
            $track_id = substr($track_id, 2);
            $seq_track_id = 'N';

            if ('Y' === $seq_track_id) {
                $setted_length = $this->GetOption('track_id_min_len');
                $setted_length = absint($setted_length);
                $setted_length = min(10, $setted_length);

                $setted_prefix = $this->GetOption('track_id_prefix');
                $setted_prefix = sanitize_text_field($setted_prefix);

                if ($setted_length) {
                    $track_id = str_pad($track_id, $setted_length, '0', STR_PAD_LEFT);
                }

                if ($setted_prefix) {
                    $track_id = $setted_prefix . $track_id;
                }
            }
        }
        return $track_id;
    }

    function query_track_id($track_id)
    {
        $seq_track_id = 'N';

        if ('Y' === $seq_track_id) {
            $setted_length = $this->GetOption('track_id_min_len');
            $setted_length = absint($setted_length);
            $setted_length = min(10, $setted_length);

            $setted_prefix = $this->GetOption('track_id_prefix');
            $setted_prefix = sanitize_text_field($setted_prefix);

            if ($setted_prefix && (0 === strpos($track_id, $setted_prefix))) {
                $track_id = ltrim($track_id, $setted_prefix);
                $track_id = absint($track_id);
            }

            if (is_numeric($track_id)) {
                $track_id = "S-" . $track_id;
            }
        }

        return $track_id;
    }

    function ref_track_id($track_id)
    {
        $prefix = substr($track_id, 0, 2);
        if ("S-" == $prefix) {
            $track_id = substr($track_id, 2);
        }
        return $track_id;
    }
    function custom_wpkses_post_tags($tags, $context)
    {
        if ('post' === $context) {
            $tags['iframe'] = array(
                'src'             => true,
                'height'          => true,
                'width'           => true,
                'frameborder'     => true,
                'allowfullscreen' => true,
            );
        }
        return $tags;
    }

    function GetMultiLangFields()
    {
        return [
            'ticket_page' => '',
            'login_page' => '',
            'reg_page' => '',
            'wp_profile_link' => '',
            'footer_cp_text' => '',
            'disable_closed_ticket_reply_notice' => '',
            'app_logo' => '',
            'tkt_status_new' => '',
            'tkt_status_active' => '',
            'tkt_status_inactive' => '',
            'tkt_status_closed' => '',
            'tkt_status_in_progress' => '',
            'tkt_status_re_open' => '',
            'tkt_status_deleted' => '',
        ];
    }

    function SetOption()
    {
        $optionName = $this->getModuleOptionName();
        $this->SetMultiLangOption($optionName);
    }

    function UpdateOption()
    {
        $optionName = $this->getModuleOptionName();
        return $this->UpdateMultiLangOption($optionName);
    }

    public function OnInit()
    {
        parent::OnInit();
        add_filter('apbd-wps/filter/attached-file', [$this, "fileCheck"], 10, 5);
        add_action('apbd-wps/action/attach-files', [$this, "attach_file"], 10, 3);
        $this->add_support_genix_rewrite();
        add_filter('query_vars', [$this, 'register_query_var']);
        add_action('admin_bar_menu', [$this, 'support_genix_admin_bar_button'], 999);
    }
    function support_genix_admin_bar_button(\WP_Admin_Bar $wp_admin_bar)
    {
        $userObj = wp_get_current_user();
        $isAgentUser = Apbd_wps_settings::isAgentLoggedIn($userObj);
        $isAdminUser = current_user_can('manage_options') || in_array('administrator', $userObj->roles);
        $isAdminPanel = is_admin();

        $pageId = $this->GetOption("ticket_page", "");
        $adminUrl = admin_url('admin.php?page=support-genix');
        $portalUrl = (!empty($pageId) && ('page' === get_post_type($pageId))) ? get_page_link($pageId) : '';

        $pageUrl = $isAdminPanel && $isAgentUser ? $adminUrl : $portalUrl;
        $pageLabel = ($isAdminPanel && $isAgentUser && ($isAdminUser || $portalUrl) ? $this->__("Support Genix") : $this->__("Support Tickets"));
        $pageIcon = '<span class="dashicons-logo-icon"></span> ';

        if (!$isAdminPanel || !$isAgentUser) {
            $pageIcon = '<style>#wpadminbar #wp-admin-bar-support-genix > .ab-item:before {content: "\f333";top: 2px;}</style>';
        }

        if (!empty($pageUrl)) {
            $wp_admin_bar->add_node([
                'id'    => 'support-genix',
                'title' => $pageIcon . $pageLabel,
                'href'  => $pageUrl,
                'target'  => "_blank"
            ]);

            if ($isAdminPanel && $isAgentUser) {
                if ($isAdminUser || $portalUrl) {
                    $wp_admin_bar->add_menu([
                        'parent' => 'support-genix',
                        'id' => 'support-genix-tickets',
                        'title' => $this->__("Tickets"),
                        'href' => $pageUrl . '#/tickets',
                    ]);
                }

                if ($isAdminUser) {
                    $wp_admin_bar->add_menu([
                        'parent' => 'support-genix',
                        'id' => 'support-genix-settings',
                        'title' => $this->__("Settings"),
                        'href' => $pageUrl . '#/settings',
                    ]);
                }

                if ($portalUrl) {
                    $wp_admin_bar->add_menu([
                        'parent' => 'support-genix',
                        'id' => 'support-genix-portal',
                        'title' => $this->__("Visit Portal"),
                        'href' => $portalUrl,
                    ]);
                }
            }
        }
    }
    function copyright_text()
    {
        $site_url = get_site_url();
        $site_title = get_bloginfo('name');
        $year = date('Y');

        $default_cp_text = sprintf($this->__("Copyright %s © %s"), '[site_link]', '[year]');

        $footer_cp_text = '';
        $footer_cp_text = stripslashes($footer_cp_text);
        $footer_cp_text = trim($footer_cp_text);

        if ("" === $footer_cp_text) {
            $footer_cp_text = $default_cp_text;
        }

        $footer_cp_text = str_replace("[site_title]", $site_title, $footer_cp_text);
        $footer_cp_text = str_replace("[site_url]", $site_url, $footer_cp_text);
        $footer_cp_text = str_replace("[site_link]", sprintf('<a href="%s">%s</a>', $site_url, $site_title), $footer_cp_text);
        $footer_cp_text = str_replace("[year]", $year, $footer_cp_text);

        $hide_pb_text = $this->GetOption("is_hide_cp_text", "N");

        if ("Y" !== $hide_pb_text) {
            $footer_cp_text = sprintf('%s | %s', $footer_cp_text, sprintf($this->__('Powered by %s'), '<a target="_blank" href="https://supportgenix.com">Support Genix</a>'));
        }

        return $footer_cp_text;
    }

    function post_states($post_states, $post)
    {
        if ($this->GetOption('ticket_page') == $post->ID) {
            $post_states['support_genix'] = esc_html__('Support Genix', 'support-genix-lite');
        }
        return $post_states;
    }
    function register_query_var($vars)
    {
        $vars[] = 'sg_ticket';
        $vars[] = 'sgnix';
        return $vars;
    }
    function add_support_genix_rewrite()
    {

        add_rewrite_rule('^sgnix/?([^/]*)/?', 'index.php?sgnix=true&sg_ticket=$matches[1]', 'top');
        if (! empty(get_transient('supportgenix_rwrite_rule'))) {
            flush_rewrite_rules(true);
            delete_transient('supportgenix_rwrite_rule');
        }
    }

    public function guest_ticket_login()
    {
        $ticket_param = rtrim(APBD_GetValue('p', ''), '/');

        if (! empty($ticket_param)) {
            $encKey = Apbd_wps_settings::GetEncryptionKey();
            $encObj = Apbd_WPS_EncryptionLib::getInstance($encKey);
            $requestParam = $encObj->decryptObj($ticket_param);

            if (! empty($requestParam->ticket_id) && ! empty($requestParam->ticket_user)) {
                $ticket = Mapbd_wps_ticket::FindBy("id", $requestParam->ticket_id);

                if (! empty($ticket) && $ticket->ticket_user == $requestParam->ticket_user) {
                    $is_guest_user = get_user_meta($ticket->ticket_user, "is_guest", true) == "Y";
                    $disable_hotlink = Apbd_wps_settings::GetModuleOption('disable_ticket_hotlink', 'N');

                    if ($is_guest_user || 'Y' !== $disable_hotlink) {
                        $ticket_link = Mapbd_wps_ticket::getTicketAdminLink($ticket);

                        if (is_user_logged_in()) {
                            wp_logout();
                        }

                        wp_clear_auth_cookie();
                        wp_set_current_user($ticket->ticket_user);
                        wp_set_auth_cookie($ticket->ticket_user);
                        wp_safe_redirect($ticket_link);
                        exit;
                    }
                }
            }
        }
    }
    public static function ConvertOldSettings()
    {
        $migrated = get_option('apbd_support_genix_migrated', false);

        if ($migrated) {
            return;
        }

        global $wpdb;

        $options = $wpdb->get_results("
            SELECT option_name, option_value
            FROM {$wpdb->options}
            WHERE option_name LIKE '%apbd-wp-support%'
        ");

        if (!empty($options)) {
            foreach ($options as $option) {
                $option_name = $option->option_name;
                $option_value = $option->option_value;

                $new_option_name = str_replace('apbd-wp-support', 'support-genix', $option_name);
                $new_option_value = is_serialized($option_value) ? unserialize($option_value) : $option_value;

                update_option($new_option_name, $new_option_value);
            }
        }

        update_option('apbd_support_genix_migrated', true);
    }
    public static function CreateEncryptionKey()
    {
        $encryption_key = get_option('apbd_wps_encryption_key', '');
        if (empty($encryption_key)) {
            $encryption_key = APBD_EncryptionKey();
            if (! empty($encryption_key)) {
                update_option('apbd_wps_encryption_key', $encryption_key);
            }
        }
    }
    public static function GetEncryptionKey()
    {
        $encryption_key = get_option('apbd_wps_encryption_key', 'WPS_ABD_enc');
        $encryption_key = (! empty($encryption_key) ? $encryption_key : 'WPS_ABD_enc');
        return $encryption_key;
    }
    public function get_portal_url($link, $withVersion = true)
    {
        if (!$withVersion) {
            return plugins_url("portal/" . $link, $this->pluginFile);
        } else {
            $version = $this->kernelObject->pluginVersion;

            $base_path = plugin_dir_path($this->kernelObject->pluginFile);
            $file_path = realpath($base_path . "portal/" . $link);

            if (file_exists($file_path)) {
                $version .= '-';
                $version .= filemtime($file_path);

                if (defined('WP_DEBUG') && !!WP_DEBUG) {
                    $version .= '-';
                    $version .= time();
                }
            }

            return plugins_url("portal/" . $link . "?v=" . $version, $this->pluginFile);
        }
    }

    public static function get_upload_path()
    {
        return self::$uploadBasePath;
    }

    public static function isClientLoggedIn($user = null)
    {
        return !self::isAgentLoggedIn($user);
    }
    public static function isAgentLoggedIn($user = null)
    {
        if (empty($user)) {
            $user = wp_get_current_user();
        }

        if (empty($user) || empty($user->roles)) {
            return false;
        }
        if (current_user_can('manage_options') || in_array('administrator', $user->roles)) {
            return true;
        }
        $agent_roles = Mapbd_wps_role::FindAllBy("status", "A", ["is_agent" => "Y"]);
        foreach ($agent_roles as $agent_role) {
            if (in_array($agent_role->slug, $user->roles)) {
                return true;
            }
        }

        return false;
    }
    public static function getSupportGenixRole($user)
    {
        if (in_array('administrator', $user->roles)) {
            return self::GetModuleInstance()->__("Administrator");
        }
        $agent_roles = Mapbd_wps_role::FindAllBy("status", "A", ["is_agent" => "Y"]);
        foreach ($agent_roles as $agent_role) {
            if (in_array($agent_role->slug, $user->roles)) {
                return $agent_role->name;
            }
        }
    }
    public static function GetCaptchaSetting()
    {
        $rc_set = new stdClass();
        $rc_set->status = Apbd_wps_settings::GetModuleOption("recaptcha_v3_status", "I") == "A";
        if ($rc_set->status) {
            $rc_set->hide_badge       = Apbd_wps_settings::GetModuleOption("recaptcha_v3_hide_badge", "N") == "Y";
            $rc_set->site_key         = Apbd_wps_settings::GetModuleOption("recaptcha_v3_site_key", "");
            $rc_set->on_login_form    = Apbd_wps_settings::GetModuleOption("captcha_on_login_form", "Y") == "Y";
            $rc_set->on_create_ticket = Apbd_wps_settings::GetModuleOption("captcha_on_create_tckt", "Y") == "Y";
            $rc_set->on_reg_form      = Apbd_wps_settings::GetModuleOption("captcha_on_reg_form", "Y") == "Y";
        }
        $rc_set = apply_filters('apbd-wps/captcha-settings', $rc_set);
        return $rc_set;
    }

    public function GetAllowedFileType()
    {
        $key = "allowed_type";
        $options = $this->options;
        $defaultType = ["image", "docs", "text", "pdf"];
        $allowedType = ((isset($options[$key]) && is_array($options[$key])) ? array_map('sanitize_text_field', $options[$key]) : $defaultType);
        $allowedType = (! empty($allowedType) ? array_map('strtolower', $allowedType) : $defaultType);
        $defaultExts = ['jpg', 'jpeg', 'png', 'webp', 'gif', 'doc', 'docx', 'xls', 'xlsx', 'txt', 'pdf'];
        $allowedExts = [];

        foreach ($allowedType as $type) {
            switch ($type) {
                case 'image':
                    $allowedExts = array_merge($allowedExts, ['jpg', 'jpeg', 'png', 'webp', 'gif']);
                    break;

                case 'docs':
                    $allowedExts = array_merge($allowedExts, ['doc', 'docx', 'xls', 'xlsx']);
                    break;

                case 'text':
                    $allowedExts = array_merge($allowedExts, ['txt']);
                    break;

                case 'csv':
                    $allowedExts = array_merge($allowedExts, ['csv']);
                    break;

                case 'pdf':
                    $allowedExts = array_merge($allowedExts, ['pdf']);
                    break;

                case 'zip':
                    $allowedExts = array_merge($allowedExts, ['zip']);
                    break;

                case 'json':
                    $allowedExts = array_merge($allowedExts, ['json']);
                    break;
            }
        }

        $allowedExts = array_unique($allowedExts);
        $allowedExts = (! empty($allowedExts) ? $allowedExts : $defaultExts);

        return $allowedExts;
    }

    public function GetAllowedFileTypeStr()
    {
        return implode(",", $this->GetAllowedFileType());
    }

    public static function GetModuleAllowedFileType()
    {
        $_self = self::GetModuleInstance();
        $extns = $_self->GetAllowedFileType();

        return $extns;
    }

    public static function GetModuleAllowedFileTypeStr()
    {
        $_self = self::GetModuleInstance();
        $extns = $_self->GetAllowedFileTypeStr();

        return $extns;
    }

    public static function CheckCaptcha($token)
    {
        if (Apbd_wps_settings::GetModuleOption("recaptcha_v3_status", "I") == "A") {
            $secret = Apbd_wps_settings::GetModuleOption("recaptcha_v3_secret_key", "");
            return self::isValid($token, $secret);
        } else {
            return true;
        }
    }
    protected  static function isValid($token, $secret = "")
    {
        if (empty($secret) || empty($token)) {
            return false;
        }
        try {
            $response = wp_remote_get(add_query_arg(array(
                'secret'   => $secret,
                'response' => $token,
            ), 'https://www.google.com/recaptcha/api/siteverify'));

            if (is_wp_error($response) || empty($response['body']) || ! ($json = json_decode($response['body'])) || ! $json->success) {
                return false;
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function user_login()
    {
        $payload = APBD_read_php_input_stream();
        if (! empty($payload)) {
            $payload = json_decode($payload, true);
        }
        $credentials = [];
        $credentials['user_login'] = $payload['username'];
        $credentials['user_password'] = $payload['password'];
        if (is_user_logged_in()) {
            wp_logout();
        }
        $response = new Apbd_WPS_API_Response();
        $user = wp_signon($credentials);
        if (is_wp_error($user)) {
            $response->SetResponse(false, strip_tags($user->get_error_message()), $credentials);
            return $response;
        } else {
            wp_set_current_user($user->ID);
            wp_set_auth_cookie($user->ID, true);
            $responseData = new stdClass();
            $responseData->id = $user->ID;
            $responseData->wp_rest_nonce = wp_create_nonce("wp_rest");
            $responseData->username = $user->user_login;
            $responseData->email = $user->user_email;
            $responseData->name = $user->first_name . ' ' . $user->last_name;
            $responseData->loggedIn = is_user_logged_in();
            $responseData->isAgent = Apbd_wps_settings::isAgentLoggedIn();
            if (empty(trim($responseData->name))) {
                $responseData->name = $user->display_name;
            }
            $responseData->caps = $user->caps;
            $responseData->img  = get_user_meta($user->ID, 'supportgenix_avatar', true) ? get_user_meta($user->ID, 'supportgenix_avatar', true) : get_avatar_url($user->ID);
            $response->SetResponse(true, "logged in Successfully", $responseData);
            wp_send_json($response);
        }
    }

    public function OnVersionUpdate($current_version = "", $previous_version = "", $last_pro_version = "")
    {
        parent::OnVersionUpdate($current_version, $previous_version, $last_pro_version);

        if (empty($previous_version)) {
            if (! empty($last_pro_version)) {
                // When pro version is less than 1.3.4
                if (1 === version_compare('1.3.4', $last_pro_version)) {
                    // From version 1.0.9
                    Mapbd_wps_custom_field::UpdateDBTable();
                }

                // When pro version is less than 1.4.0
                if (1 === version_compare('1.4.0', $last_pro_version)) {
                    // From version 1.0.9
                    Mapbd_wps_ticket_assign_rule::UpdateDBTable();
                }

                // When pro version is less than 1.4.2
                if (1 === version_compare('1.4.2', $last_pro_version)) {
                    // From version 1.1.0
                    Mapbd_wps_role::UpdateExStatus();;
                    Mapbd_wps_ticket::UpdateDBTable();
                    Mapbd_wps_email_templates::UpdateTemplateGroup();
                }

                // When pro version is less than 1.4.4
                if (1 === version_compare('1.4.4', $last_pro_version)) {
                    // From version 1.1.2
                    Mapbd_wps_role::UpdateDBTableCharset();
                    Mapbd_wps_role_access::UpdateDBTableCharset();
                    Mapbd_wps_ticket_assign_rule::UpdateDBTableCharset();
                    Mapbd_wps_ticket::UpdateDBTableCharset();
                    Mapbd_wps_ticket_category::UpdateDBTableCharset();
                    Mapbd_wps_ticket_log::UpdateDBTableCharset();
                    Mapbd_wps_ticket_reply::UpdateDBTableCharset();
                    Mapbd_wps_notification::UpdateDBTableCharset();
                    Mapbd_wps_custom_field::UpdateDBTableCharset();
                    Mapbd_wps_email_templates::UpdateDBTableCharset();
                    Mapbd_wps_support_meta::UpdateDBTableCharset();
                    Mapbd_wps_debug_log::UpdateDBTableCharset();
                    Mapbd_wps_canned_msg::UpdateDBTableCharset();
                    Mapbd_wps_notes::UpdateDBTableCharset();
                }

                // When pro version is less than 1.4.5
                if (1 === version_compare('1.4.5', $last_pro_version)) {
                    // From version 1.1.3
                    Mapbd_wps_ticket_reply::UpdateDBTable();
                }

                // When pro version is less than 1.5.4
                if (1 === version_compare('1.5.4', $last_pro_version)) {
                    // From version 1.2.0
                    Mapbd_wps_email_templates::UpdateTemplateGroup2();
                }

                // When pro version is less than 1.5.8
                if (1 === version_compare('1.5.8', $last_pro_version)) {
                    // From version 1.2.3
                    $this->UpdateAllowedFileType();
                }

                // When pro version is less than 1.6.6
                if (1 === version_compare('1.6.6', $last_pro_version)) {
                    // From version 1.3.1
                    Mapbd_wps_email_templates::UpdateTemplateGroup3();
                    Mapbd_wps_role::UpdateExAccess();
                    Mapbd_wps_role::AddNewAccess();
                }

                // When pro version is less than 1.7.0
                if (1 === version_compare('1.7.0', $last_pro_version)) {
                    // From version 1.3.5
                    Mapbd_wps_ticket::UpdateDBTable2();
                }

                // When pro version is less than 1.7.1
                if (1 === version_compare('1.7.1', $last_pro_version)) {
                    // From version 1.3.6
                    Mapbd_wps_role::AddNewAccess2();
                }

                // When pro version is less than 1.7.3
                if (1 === version_compare('1.7.3', $last_pro_version)) {
                    // From version 1.3.8
                    Mapbd_wps_ticket_log::UpdateDBTable();
                }

                // When free version is less than 1.4.0
                if (1 === version_compare('1.8.0', $last_pro_version)) {
                    // From version 1.4.0
                    Mapbd_wps_email_templates::UpdateTemplateGroup4();
                }
            } else {
                // From version 1.1.0
                $this->CreateTicketPage();
            }

            // From version 1.4.0
            Apbd_wps_settings::CreateEncryptionKey();
        } else {
            // From version 1.0.9
            if (1 === version_compare('1.0.9', $previous_version)) {
                // When pro version is empty or less than 1.3.4
                if (empty($last_pro_version) || (1 === version_compare('1.3.4', $last_pro_version))) {
                    Mapbd_wps_custom_field::UpdateDBTable();
                }

                // When pro version is empty or less than 1.4.0
                if (empty($last_pro_version) || (1 === version_compare('1.4.0', $last_pro_version))) {
                    Mapbd_wps_ticket_assign_rule::UpdateDBTable();
                }
            }

            // From version 1.1.0
            if (1 === version_compare('1.1.0', $previous_version)) {
                // When pro version is empty or less than 1.4.2
                if (empty($last_pro_version) || (1 === version_compare('1.4.2', $last_pro_version))) {
                    Mapbd_wps_role::UpdateExStatus();
                    Mapbd_wps_ticket::UpdateDBTable();
                    Mapbd_wps_email_templates::UpdateTemplateGroup();
                }
            }

            // From version 1.1.2
            if (1 === version_compare('1.1.2', $previous_version)) {
                // When pro version is empty or less than 1.4.4
                if (empty($last_pro_version) || (1 === version_compare('1.4.4', $last_pro_version))) {
                    Mapbd_wps_role::UpdateDBTableCharset();
                    Mapbd_wps_role_access::UpdateDBTableCharset();
                    Mapbd_wps_ticket_assign_rule::UpdateDBTableCharset();
                    Mapbd_wps_ticket::UpdateDBTableCharset();
                    Mapbd_wps_ticket_category::UpdateDBTableCharset();
                    Mapbd_wps_ticket_log::UpdateDBTableCharset();
                    Mapbd_wps_ticket_reply::UpdateDBTableCharset();
                    Mapbd_wps_notification::UpdateDBTableCharset();
                    Mapbd_wps_custom_field::UpdateDBTableCharset();
                    Mapbd_wps_email_templates::UpdateDBTableCharset();
                    Mapbd_wps_support_meta::UpdateDBTableCharset();
                    Mapbd_wps_debug_log::UpdateDBTableCharset();
                    Mapbd_wps_canned_msg::UpdateDBTableCharset();
                    Mapbd_wps_notes::UpdateDBTableCharset();
                }
            }

            // From version 1.1.3
            if (1 === version_compare('1.1.3', $previous_version)) {
                Mapbd_wps_ticket_reply::UpdateDBTable();
            }

            // From version 1.2.0
            if (1 === version_compare('1.2.0', $previous_version)) {
                // When pro version is empty or less than 1.5.4
                if (empty($last_pro_version) || (1 === version_compare('1.5.4', $last_pro_version))) {
                    Mapbd_wps_email_templates::UpdateTemplateGroup2();
                }
            }

            // From version 1.2.2
            if (1 === version_compare('1.2.2', $previous_version)) {
                $this->ConvertToMultiLangOptions();
            }

            // From version 1.2.3
            if (1 === version_compare('1.2.3', $previous_version)) {
                $this->UpdateAllowedFileType();
            }

            // From version 1.3.1
            if (1 === version_compare('1.3.1', $previous_version)) {
                // When pro version is empty or less than 1.6.6
                if (empty($last_pro_version) || (1 === version_compare('1.6.6', $last_pro_version))) {
                    Apbd_wps_settings::CreateEncryptionKey();
                    Mapbd_wps_email_templates::UpdateTemplateGroup3();
                    Mapbd_wps_role::UpdateExAccess();
                    Mapbd_wps_role::AddNewAccess();
                }
            }

            // From version 1.3.5
            if (1 === version_compare('1.3.5', $previous_version)) {
                // When pro version is empty or less than 1.7.0
                if (empty($last_pro_version) || (1 === version_compare('1.7.0', $last_pro_version))) {
                    Mapbd_wps_ticket::UpdateDBTable2();
                }
            }

            // From version 1.3.6
            if (1 === version_compare('1.3.6', $previous_version)) {
                // When pro version is empty or less than 1.7.1
                if (empty($last_pro_version) || (1 === version_compare('1.7.1', $last_pro_version))) {
                    Mapbd_wps_role::AddNewAccess2();
                }
            }

            // From version 1.3.8
            if (1 === version_compare('1.3.8', $previous_version)) {
                // When pro version is empty or less than 1.7.3
                if (empty($last_pro_version) || (1 === version_compare('1.7.3', $last_pro_version))) {
                    Mapbd_wps_ticket_log::UpdateDBTable();
                }
            }

            // From version 1.4.0
            if (1 === version_compare('1.4.0', $previous_version)) {
                // When pro version is empty or less than 1.8.0
                if (empty($last_pro_version) || (1 === version_compare('1.8.0', $last_pro_version))) {
                    Mapbd_wps_email_templates::UpdateTemplateGroup4();
                }
            }
        }

        // From version 1.4.4
        Apbd_wps_settings::ConvertOldSettings();
    }

    public function OnActive($new_activation = true, $new_pro_activation = true)
    {
        parent::OnActive($new_activation, $new_pro_activation);

        // Set re-write rule
        set_transient('supportgenix_rwrite_rule', "Yes");

        // Create tables
        Mapbd_wps_ticket::CreateDBTable();
        Mapbd_wps_ticket_category::CreateDBTable();
        Mapbd_wps_ticket_tag::CreateDBTable();
        Mapbd_wps_ticket_log::CreateDBTable();
        Mapbd_wps_ticket_reply::CreateDBTable();
        Mapbd_wps_notification::CreateDBTable();
        Mapbd_wps_custom_field::CreateDBTable();
        Mapbd_wps_woocommerce::CreateDBTable();
        Mapbd_wps_edd::CreateDBTable();
        Mapbd_wps_fluentcrm::CreateDBTable();
        Mapbd_wps_support_meta::CreateDBTable();
        Mapbd_wps_debug_log::CreateDBTable();
        Mapbd_wps_webhook::CreateDBTable();
        Mapbd_wps_incoming_webhook::CreateDBTable();
        Mapbd_wps_canned_msg::CreateDBTable();
        Mapbd_wps_imap_settings::CreateDBTable();
        Mapbd_wps_imap_api_settings::CreateDBTable();
        Mapbd_wps_notes::CreateDBTable();
        Mapbd_wps_role::CreateDBTable();
        Mapbd_wps_role_access::CreateDBTable();
        Mapbd_wps_ticket_assign_rule::CreateDBTable();
        Mapbd_wps_email_templates::CreateDBTable();

        // Add default data
        Mapbd_wps_role::SetDefaultRole();
        Mapbd_wps_ticket_assign_rule::SetDefaultAssignRole();
        Mapbd_wps_email_templates::AddDefaultTemplates();
    }

    function CreateTicketPage()
    {
        $pageId = absint(get_option('apbd_wps_ticket_page_id'));
        $currentPageId = absint($this->GetOption("ticket_page", "0"));

        if (('page' !== get_post_type($pageId)) && ('page' !== get_post_type($currentPageId))) {
            $pageArgs = array(
                'post_title'   => $this->__('Ticket'),
                'post_content' => '<!-- wp:shortcode -->[supportgenix]<!-- /wp:shortcode -->',
                'post_status'  => 'publish',
                'post_type'    => 'page',
            );

            $createdPageId = wp_insert_post($pageArgs);

            if ($createdPageId) {
                update_option('apbd_wps_ticket_page_id', $createdPageId);
                $this->AddOption("ticket_page", $createdPageId);
            }
        }
    }

    function ConvertToMultiLangOptions()
    {
        $status = get_option($this->pluginBaseName . "_o_tkt_status", null);
        $status = (is_array($status) ? $status : []);

        if (! empty($status)) {
            $options = $this->options;
            $options = (is_array($options) ? $options : []);
            $options = array_merge($options, $status);

            $this->options = $options;
        }

        $this->multiLangCode = 'en';

        if ($this->UpdateOption()) {
            delete_option($this->pluginBaseName . "_o_tkt_status");
        }
    }

    function GenerateSecretKey()
    {
        $random_key = md5(rand(10, 99) . rand(10, 99) . time() . rand(10, 99));
        $secret_key = substr($random_key, 20, 8) . '-' . substr($random_key, 28, 4);

        return $secret_key;
    }

    function UpdateAllowedFileType()
    {
        $allowedType = $this->GetOption('allowed_type', 'jpg,png,txt,pdf,docs');
        $allowedType = explode(',', strtolower(sanitize_text_field($allowedType)));
        $allowedType = array_map('trim', $allowedType);
        $updatedType = [];

        if (! empty($allowedType)) {
            $allowedType = array_unique($allowedType);

            foreach ($allowedType as $type) {
                switch ($type) {
                    case 'jpg':
                    case 'jpeg':
                    case 'png':
                    case 'webp':
                    case 'gif':
                        $updatedType[] = 'image';
                        break;

                    case 'doc':
                    case 'docx':
                    case 'xls':
                    case 'xlsx':
                        $updatedType[] = 'docs';
                        break;

                    case 'txt':
                        $updatedType[] = 'text';
                        break;

                    case 'csv':
                        $updatedType[] = 'csv';
                        break;

                    case 'pdf':
                        $updatedType[] = 'pdf';
                        break;

                    case 'zip':
                        $updatedType[] = 'zip';
                        break;

                    case 'json':
                        $updatedType[] = 'json';
                        break;
                }
            }
        }

        $this->options['allowed_type'] = $updatedType;
        $this->UpdateOption();
    }

    function userCustomFields($customFieldWithValue, $ticket_id)
    {
        $ticketMetas = Mapbd_wps_support_meta::getUserMeta($ticket_id);
        $ticketMetas = apply_filters('apbd-wps/filter/custom-field-metadata', $ticketMetas);

        $custom_fileds = Mapbd_wps_custom_field::getCustomFieldForAPI();
        $custom_fileds = apply_filters('apbd-wps/filter/before-custom-get', $custom_fileds);
        $custom_fileds = apply_filters('apbd-wps/filter/display-properties', $custom_fileds);

        if (! empty($custom_fileds->reg_form)) {
            foreach ($custom_fileds->reg_form as $custom_filed) {
                $custom_filed->field_value = ! empty($ticketMetas[$custom_filed->input_name]) ? $ticketMetas[$custom_filed->input_name] : "";
                $custom_filed->is_editable = true;
                $customFieldWithValue[] = $custom_filed;
            }
        }
        $customFieldWithValue = apply_filters('apbd-wps/filter/custom-additional-fields', $customFieldWithValue);
        return $customFieldWithValue;
    }

    function ticketCustomFields($customFieldWithValue, $ticket_id)
    {
        $ticketMetas = Mapbd_wps_support_meta::getTicketMeta($ticket_id);
        $ticketMetas = apply_filters('apbd-wps/filter/custom-field-metadata', $ticketMetas);

        $custom_fileds = Mapbd_wps_custom_field::getCustomFieldForTicketDetailsAPI($ticket_id);
        $custom_fileds = apply_filters('apbd-wps/filter/before-custom-get', $custom_fileds);
        $custom_fileds = apply_filters('apbd-wps/filter/display-properties', $custom_fileds);

        if (! empty($custom_fileds->ticket_form)) {
            foreach ($custom_fileds->ticket_form as $custom_filed) {
                $custom_filed->field_value = ! empty($ticketMetas[$custom_filed->input_name]) ? $ticketMetas[$custom_filed->input_name] : "";
                if ($custom_filed->field_type == 'S') {
                    $custom_filed->field_value = ! empty($custom_filed->field_value);
                }
                $custom_filed->is_editable = true;
                $customFieldWithValue[] = $custom_filed;
            }
        }
        $customFieldWithValue = apply_filters('apbd-wps/filter/custom-additional-fields', $customFieldWithValue);
        return $customFieldWithValue;
    }

    /**
     * @param Mapbd_wps_ticket $ticket
     * @param $custom_fields
     */
    function save_ticket_meta($ticket, $custom_fields)
    {
        if (! empty($custom_fields) && is_array($custom_fields)) {
            foreach ($custom_fields as $key => $custom_field) {
                if (substr($key, 0, 1) == "D") {
                    $n = new Mapbd_wps_support_meta();
                    $n->item_id($ticket->id);
                    $n->item_type('T');
                    $n->meta_key(preg_replace("#[^0-9]#", '', $key));
                    $n->meta_type('D');
                    $n->meta_value($custom_field);
                    if (!$n->Save()) {
                        Mapbd_wps_debug_log::AddGeneralLog("Custom field save failed", print_r($n, true) . "\n" . APBD_GetMsg_API());
                    }
                }
            }
        }
    }

    /**
     * @param Apbd_WPS_User $ticket
     * @param $custom_fields
     */
    function save_user_meta($userObj, $custom_fields)
    {
        if (! empty($custom_fields) && is_array($custom_fields)) {
            foreach ($custom_fields as $key => $custom_field) {
                if (substr($key, 0, 1) == "D") {
                    $c = new Mapbd_wps_support_meta();
                    $c->item_id($userObj->id);
                    $c->item_type('U');
                    $c->meta_key(preg_replace("#[^0-9]#", '', $key));
                    $c->meta_type('D');
                    if ($c->Select()) {
                        $u = new Mapbd_wps_support_meta();
                        $u->SetWhereUpdate("id", $c->id);
                        $u->meta_value($custom_field);
                        $u->Update();
                    } else {
                        $n = new Mapbd_wps_support_meta();
                        $n->item_id($userObj->id);
                        $n->item_type('U');
                        $n->meta_key(preg_replace("#[^0-9]#", '', $key));
                        $n->meta_type('D');
                        $n->meta_value($custom_field);
                        if (!$n->Save()) {
                            Mapbd_wps_debug_log::AddGeneralLog("Custom field save failed on user meta", $n);
                        }
                    }
                }
            }
        }
    }

    /**
     * @param Mapbd_wps_ticket $ticket
     * @param $custom_fields
     */
    function update_ticket_meta($ticket_id, $pro_name, $value)
    {
        if (strtoupper(substr($pro_name, 0, 1)) == "D") {
            $s = new Mapbd_wps_support_meta();
            $s->item_id($ticket_id);
            $s->meta_key(preg_replace("#[^0-9]#", '', $pro_name));
            $s->meta_type('D');
            if ($s->Select()) {
                $n = new Mapbd_wps_support_meta();
                $n->meta_value($value);
                $n->SetWhereUpdate("item_id", $ticket_id);
                $n->SetWhereUpdate("meta_key", preg_replace("#[^0-9]#", '', $pro_name));
                $n->SetWhereUpdate("meta_type", 'D');
                if (!$n->Update()) {
                    Mapbd_wps_debug_log::AddGeneralLog("Custom field update failed", APBD_GetMsg_API() . "\nTicket ID: $ticket_id, Custom Name: $pro_name, value:$value");
                }
            } else {
                $n = new Mapbd_wps_support_meta();
                $n->meta_value($value);
                $n->item_id($ticket_id);
                $n->item_type('T');
                $n->meta_key(preg_replace("#[^0-9]#", '', $pro_name));
                $n->meta_type('D');
                $n->meta_value($value);
                if (!$n->Save()) {
                    Mapbd_wps_debug_log::AddGeneralLog("Custom field update failed", APBD_GetMsg_API() . "\nTicket ID: $ticket_id, Custom Name: $pro_name, value:$value");
                }
            }
        }
    }

    /**
     * @param [] $attached_files
     * @param Mapbd_wps_ticket $ticket
     */
    function set_ticket_attached_files($attached_files, $ticket)
    {
        $ticketDir = self::$uploadBasePath;

        if (empty($ticket->id)) {
            return $attached_files;
        } else {
            $ticketDir = $ticketDir . $ticket->id . "/attached_files/";
        }
        $this->read_all_file($attached_files, $ticketDir, "T", $ticket->id);
        return $attached_files;
    }

    /**
     * @param $attached_files
     * @param Mapbd_wps_ticket_reply $ticket_reply
     * @return mixed
     */
    function set_ticket_reply_attached_files($attached_files, $ticket_reply)
    {
        $ticketDir = self::$uploadBasePath;

        if (empty($ticket_reply->reply_id)) {
            return $attached_files;
        } else {
            $ticketDir = $ticketDir . $ticket_reply->ticket_id . "/replied/" . $ticket_reply->reply_id . "/attached_files/";
        }
        $this->read_all_file($attached_files, $ticketDir, "R", $ticket_reply->ticket_id, $ticket_reply->reply_id);
        return $attached_files;
    }

    function download_file($type, $ticket_or_reply_id, $file) {}

    function read_all_file(&$attached_files, $path, $tType, $ticket_id, $ticket_reply_id = null)
    {
        $allowed_files = $this->GetAllowedFileTypeStr();
        $path = rtrim($path, '/');
        if ($tType == 'R') {
            $ticket_id .= '_' . $ticket_reply_id;
        }
        $namespace = APBDWPSupportLite::getNamespaceStr();
        if (is_dir($path)) {
            foreach (glob($path . '/*.{' . $allowed_files . '}', GLOB_BRACE) as $file) {
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                $fileProperty = new stdClass();
                if (! empty($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'], 'nginx') !== false) {
                    $relative_path = str_replace(WP_CONTENT_DIR, '', $file);
                    $fileProperty->url = content_url($relative_path);
                } else {
                    $fileProperty->url = get_rest_url(null, $namespace . '/ticket/file-dl') . "/$tType/$ticket_id/" . basename($file);
                }
                $fileProperty->type = APBD_getMimeType($file);
                $fileProperty->ext = $ext;
                $attached_files[] = $fileProperty;
            }
        }
    }

    public function data()
    {
        $apiResponse = new Apbd_WPS_API_Response();

        $client_role = $this->GetOption('client_role', 'subscriber');
        $ticket_page = $this->GetOption('ticket_page', '');
        $ticket_page_shortcode = $this->GetOption('ticket_page_shortcode', 'N');
        $footer_cp_text = '';
        $is_wp_login_reg = $this->GetOption('is_wp_login_reg', 'N');
        $login_page = $this->GetOption('login_page', '');
        $reg_page = $this->GetOption('reg_page', '');
        $is_wp_profile_link = $this->GetOption('is_wp_profile_link', 'N');
        $wp_profile_link = $this->GetOption('wp_profile_link', '');
        $is_seq_track_id = 'N';
        $track_id_prefix = $this->GetOption('track_id_prefix', '');
        $track_id_min_len = $this->GetOption('track_id_min_len', '');
        $auto_close_ticket = 'N';
        $auto_close_ticket_after = $this->GetOption('auto_close_ticket_after', '');
        $disable_closed_ticket_reply = 'N';
        $disable_closed_ticket_reply_notice = '';
        $is_hide_cp_text = $this->GetOption('is_hide_cp_text', 'N');
        $is_public_ticket_opt_on_creation = $this->GetOption('is_public_ticket_opt_on_creation', 'N');
        $is_public_ticket_opt_on_details = $this->GetOption('is_public_ticket_opt_on_details', 'N');
        $is_public_tickets_menu = $this->GetOption('is_public_tickets_menu', 'N');
        $disable_registration_form = $this->GetOption('disable_registration_form', 'N');
        $disable_guest_ticket_creation = $this->GetOption('disable_guest_ticket_creation', 'N');
        $close_ticket_opt_for_customer = 'N';
        $disable_ticket_hotlink = $this->GetOption('disable_ticket_hotlink', 'N');

        $ticket_page_shortcode = ('Y' === $ticket_page_shortcode) ? true : false;
        $is_wp_login_reg = ('Y' === $is_wp_login_reg) ? true : false;
        $is_wp_profile_link = ('Y' === $is_wp_profile_link) ? true : false;
        $is_seq_track_id = ('Y' === $is_seq_track_id) ? true : false;
        $auto_close_ticket = ('Y' === $auto_close_ticket) ? true : false;
        $disable_closed_ticket_reply = ('Y' === $disable_closed_ticket_reply) ? true : false;
        $is_hide_cp_text = ('Y' === $is_hide_cp_text) ? true : false;
        $is_public_ticket_opt_on_creation = ('Y' === $is_public_ticket_opt_on_creation) ? true : false;
        $is_public_ticket_opt_on_details = ('Y' === $is_public_ticket_opt_on_details) ? true : false;
        $is_public_tickets_menu = ('Y' === $is_public_tickets_menu) ? true : false;
        $disable_registration_form = ('Y' === $disable_registration_form) ? true : false;
        $disable_guest_ticket_creation = ('Y' === $disable_guest_ticket_creation) ? true : false;
        $close_ticket_opt_for_customer = ('Y' === $close_ticket_opt_for_customer) ? true : false;
        $disable_ticket_hotlink = ('Y' === $disable_ticket_hotlink) ? true : false;

        $client_role = !empty($client_role) ? $client_role : 'subscriber';
        $ticket_page = strval($ticket_page);

        $data = [
            'client_role' => $client_role,
            'ticket_page' => $ticket_page,
            'ticket_page_shortcode' => $ticket_page_shortcode,
            'footer_cp_text' => $footer_cp_text,
            'is_wp_login_reg' => $is_wp_login_reg,
            'login_page' => $login_page,
            'reg_page' => $reg_page,
            'is_wp_profile_link' => $is_wp_profile_link,
            'wp_profile_link' => $wp_profile_link,
            'is_seq_track_id' => $is_seq_track_id,
            'track_id_prefix' => $track_id_prefix,
            'track_id_min_len' => $track_id_min_len,
            'auto_close_ticket' => $auto_close_ticket,
            'auto_close_ticket_after' => $auto_close_ticket_after,
            'disable_closed_ticket_reply' => $disable_closed_ticket_reply,
            'disable_closed_ticket_reply_notice' => $disable_closed_ticket_reply_notice,
            'is_hide_cp_text' => $is_hide_cp_text,
            'is_public_ticket_opt_on_creation' => $is_public_ticket_opt_on_creation,
            'is_public_ticket_opt_on_details' => $is_public_ticket_opt_on_details,
            'is_public_tickets_menu' => $is_public_tickets_menu,
            'disable_registration_form' => $disable_registration_form,
            'disable_guest_ticket_creation' => $disable_guest_ticket_creation,
            'close_ticket_opt_for_customer' => $close_ticket_opt_for_customer,
            'disable_ticket_hotlink' => $disable_ticket_hotlink,
        ];

        $apiResponse->SetResponse(true, "", $data);

        echo wp_json_encode($apiResponse);
    }

    public function dataLogo()
    {
        $apiResponse = new Apbd_WPS_API_Response();

        $default = [
            'app_favicon' => $this->get_portal_url("dist/img/favicon180x180.png", false),
            'app_logo' => $this->get_portal_url("dist/img/logo.png", false),
        ];

        $app_favicon = $this->GetOption('app_favicon', $default['app_favicon']);
        $app_logo = $this->GetOption('app_logo', $default['app_logo']);

        $data = [
            'default' => $default,
            'app_favicon' => $app_favicon,
            'app_logo' => $app_logo,
        ];

        $apiResponse->SetResponse(true, "", $data);

        echo wp_json_encode($apiResponse);
    }

    public function dataFile()
    {
        $apiResponse = new Apbd_WPS_API_Response();

        $ticket_file_upload = $this->GetOption('ticket_file_upload', 'A');
        $file_upload_size = $this->GetOption('file_upload_size', 2);
        $allowed_type = $this->GetOption('allowed_type', ['image', 'docs', 'text', 'pdf']);

        $ticket_file_upload = ('A' === $ticket_file_upload) ? true : false;

        $data = [
            'ticket_file_upload' => $ticket_file_upload,
            'file_upload_size' => $file_upload_size,
            'allowed_type' => $allowed_type,
        ];

        $apiResponse->SetResponse(true, "", $data);

        echo wp_json_encode($apiResponse);
    }

    public function dataCaptcha()
    {
        $apiResponse = new Apbd_WPS_API_Response();

        $recaptcha_v3_status = $this->GetOption('recaptcha_v3_status', 'I');
        $recaptcha_v3_site_key = $this->GetOption('recaptcha_v3_site_key', '');
        $recaptcha_v3_secret_key = $this->GetOption('recaptcha_v3_secret_key', '');
        $captcha_on_login_form = $this->GetOption('captcha_on_login_form', 'Y');
        $captcha_on_create_tckt = $this->GetOption('captcha_on_create_tckt', 'Y');
        $captcha_on_reg_form = $this->GetOption('captcha_on_reg_form', 'Y');
        $recaptcha_v3_hide_badge = $this->GetOption('recaptcha_v3_hide_badge', 'N');

        $recaptcha_v3_status = ('A' === $recaptcha_v3_status) ? true : false;
        $recaptcha_v3_hide_badge = ('Y' === $recaptcha_v3_hide_badge) ? true : false;

        // Secret key.
        $recaptcha_v3_secret_key = APBD_SecretFieldValue($recaptcha_v3_secret_key);

        // Display options.
        $recaptcha_v3_display_opts = [];

        if ('Y' === $captcha_on_login_form) {
            $recaptcha_v3_display_opts[] = 'captcha_on_login_form';
        }

        if ('Y' === $captcha_on_create_tckt) {
            $recaptcha_v3_display_opts[] = 'captcha_on_create_tckt';
        }

        if ('Y' === $captcha_on_reg_form) {
            $recaptcha_v3_display_opts[] = 'captcha_on_reg_form';
        }

        $data = [
            'recaptcha_v3_status' => $recaptcha_v3_status,
            'recaptcha_v3_site_key' => $recaptcha_v3_site_key,
            'recaptcha_v3_secret_key' => $recaptcha_v3_secret_key,
            'recaptcha_v3_display_opts' => $recaptcha_v3_display_opts,
            'recaptcha_v3_hide_badge' => $recaptcha_v3_hide_badge,
        ];

        $apiResponse->SetResponse(true, "", $data);

        echo wp_json_encode($apiResponse);
    }

    public function dataStatus()
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(true, "", []);

        echo wp_json_encode($apiResponse);
    }

    public function dataStyle()
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(true, "", []);

        echo wp_json_encode($apiResponse);
    }

    public function dataBasic()
    {
        $namespace = APBDWPSupportLite::getNamespaceStr();
        $apiObj = new APBDWPSAPIConfig($namespace, false);

        $apiResponse = $apiObj->basic_settings();

        echo wp_json_encode($apiResponse);
    }

    public function page_for_select($except_id = 0, $select = false, $select_all = false, $with_id = false, $no_value = false)
    {
        $apiResponse = new Apbd_WPS_API_Response();

        $except_id = APBD_GetValue("except_id", 0);
        $select = APBD_GetValue("select", false);
        $select_all = APBD_GetValue("select_all", false);
        $with_id = APBD_GetValue("with_id", false);
        $no_value = APBD_GetValue("no_value", false);

        $except_id = absint($except_id);
        $select = rest_sanitize_boolean($select);
        $select_all = rest_sanitize_boolean($select_all);
        $with_id = rest_sanitize_boolean($with_id);
        $no_value = rest_sanitize_boolean($no_value);

        $pages = get_pages();

        $result = [];
        $valkey = $no_value ? 'key' : 'value';

        if ($select) {
            $result[] = [
                $valkey => "",
                'label' => '-- ' . $this->__('Select Page') . ' --',
            ];
        }

        if ($select_all) {
            $result[] = [
                $valkey => "0",
                'label' => $this->__('All Pages'),
            ];
        }

        foreach ($pages as $page) {
            $id = $page->ID;
            $title = $page->post_title;

            $id = absint($id);

            if ($id !== $except_id) {
                $title .= $with_id ? ' ' . $this->___('(ID: %d)', $id) : '';

                $result[] = [
                    $valkey => strval($id),
                    'label' => $title,
                ];
            }
        }

        $apiResponse->SetResponse(true, "", [
            'result' => $result,
            'total' => count($result),
        ]);

        echo wp_json_encode($apiResponse);
    }

    public function AjaxRequestCallback()
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));
        $beforeSave = $this->options;

        $hasError = false;

        if (APPSBD_IsPostBack) {
            $client_role = sanitize_text_field(APBD_PostValue('client_role', ''));
            $ticket_page = sanitize_text_field(APBD_PostValue('ticket_page', ''));
            $ticket_page_shortcode = sanitize_text_field(APBD_PostValue('ticket_page_shortcode', ''));
            $footer_cp_text = sanitize_text_field($this->GetOption('footer_cp_text', ''));
            $is_wp_login_reg = sanitize_text_field(APBD_PostValue('is_wp_login_reg', ''));
            $login_page = esc_url_raw(APBD_PostValue('login_page', ''));
            $reg_page = esc_url_raw(APBD_PostValue('reg_page', ''));
            $is_wp_profile_link = sanitize_text_field(APBD_PostValue('is_wp_profile_link', ''));
            $wp_profile_link = esc_url_raw(APBD_PostValue('wp_profile_link', ''));
            $is_seq_track_id = sanitize_text_field($this->GetOption('is_seq_track_id', 'N'));
            $track_id_prefix = sanitize_text_field(APBD_PostValue('track_id_prefix', ''));
            $track_id_min_len = sanitize_text_field(APBD_PostValue('track_id_min_len', ''));
            $auto_close_ticket = sanitize_text_field($this->GetOption('auto_close_ticket', 'N'));
            $auto_close_ticket_after = sanitize_text_field(APBD_PostValue('auto_close_ticket_after', ''));
            $disable_closed_ticket_reply = sanitize_text_field($this->GetOption('disable_closed_ticket_reply', 'N'));
            $disable_closed_ticket_reply_notice = sanitize_text_field($this->GetOption('disable_closed_ticket_reply_notice', ''));
            $is_hide_cp_text = sanitize_text_field(APBD_PostValue('is_hide_cp_text', ''));
            $is_public_ticket_opt_on_creation = sanitize_text_field(APBD_PostValue('is_public_ticket_opt_on_creation', ''));
            $is_public_ticket_opt_on_details = sanitize_text_field(APBD_PostValue('is_public_ticket_opt_on_details', ''));
            $is_public_tickets_menu = sanitize_text_field(APBD_PostValue('is_public_tickets_menu', ''));
            $disable_registration_form = sanitize_text_field(APBD_PostValue('disable_registration_form', ''));
            $disable_guest_ticket_creation = sanitize_text_field(APBD_PostValue('disable_guest_ticket_creation', ''));
            $close_ticket_opt_for_customer = sanitize_text_field($this->GetOption('close_ticket_opt_for_customer', 'N'));
            $disable_ticket_hotlink = sanitize_text_field(APBD_PostValue('disable_ticket_hotlink', ''));

            $ticket_page_shortcode = 'Y' === $ticket_page_shortcode ? 'Y' : 'N';
            $is_wp_login_reg = 'Y' === $is_wp_login_reg ? 'Y' : 'N';
            $is_wp_profile_link = 'Y' === $is_wp_profile_link ? 'Y' : 'N';
            $is_seq_track_id = 'Y' === $is_seq_track_id ? 'Y' : 'N';
            $auto_close_ticket = 'Y' === $auto_close_ticket ? 'Y' : 'N';
            $disable_closed_ticket_reply = 'Y' === $disable_closed_ticket_reply ? 'Y' : 'N';
            $is_hide_cp_text = 'Y' === $is_hide_cp_text ? 'Y' : 'N';
            $is_public_ticket_opt_on_creation = 'Y' === $is_public_ticket_opt_on_creation ? 'Y' : 'N';
            $is_public_ticket_opt_on_details = 'Y' === $is_public_ticket_opt_on_details ? 'Y' : 'N';
            $is_public_tickets_menu = 'Y' === $is_public_tickets_menu ? 'Y' : 'N';
            $disable_registration_form = 'Y' === $disable_registration_form ? 'Y' : 'N';
            $disable_guest_ticket_creation = 'Y' === $disable_guest_ticket_creation ? 'Y' : 'N';
            $close_ticket_opt_for_customer = 'Y' === $close_ticket_opt_for_customer ? 'Y' : 'N';
            $disable_ticket_hotlink = 'Y' === $disable_ticket_hotlink ? 'Y' : 'N';

            // Client role.
            $client_role = !empty($client_role) ? $client_role : 'subscriber';

            // Ticket page.
            $ticket_page = intval($ticket_page);
            $ticket_page = ('page' === get_post_type($ticket_page)) ? $ticket_page : 0;

            // Track id min length.
            $track_id_min_len = max(1, intval($track_id_min_len));

            // Auto close ticket after.
            $auto_close_ticket_after = max(1, intval($auto_close_ticket_after));

            $this->AddIntoOption('client_role', $client_role);
            $this->AddIntoOption('ticket_page', $ticket_page);
            $this->AddIntoOption('ticket_page_shortcode', $ticket_page_shortcode);
            $this->AddIntoOption('footer_cp_text', $footer_cp_text);
            $this->AddIntoOption('is_wp_login_reg', $is_wp_login_reg);
            $this->AddIntoOption('login_page', $login_page);
            $this->AddIntoOption('reg_page', $reg_page);
            $this->AddIntoOption('is_wp_profile_link', $is_wp_profile_link);
            $this->AddIntoOption('wp_profile_link', $wp_profile_link);
            $this->AddIntoOption('is_seq_track_id', $is_seq_track_id);
            $this->AddIntoOption('track_id_prefix', $track_id_prefix);
            $this->AddIntoOption('track_id_min_len', $track_id_min_len);
            $this->AddIntoOption('auto_close_ticket', $auto_close_ticket);
            $this->AddIntoOption('auto_close_ticket_after', $auto_close_ticket_after);
            $this->AddIntoOption('disable_closed_ticket_reply', $disable_closed_ticket_reply);
            $this->AddIntoOption('disable_closed_ticket_reply_notice', $disable_closed_ticket_reply_notice);
            $this->AddIntoOption('is_hide_cp_text', $is_hide_cp_text);
            $this->AddIntoOption('is_public_ticket_opt_on_creation', $is_public_ticket_opt_on_creation);
            $this->AddIntoOption('is_public_ticket_opt_on_details', $is_public_ticket_opt_on_details);
            $this->AddIntoOption('is_public_tickets_menu', $is_public_tickets_menu);
            $this->AddIntoOption('disable_registration_form', $disable_registration_form);
            $this->AddIntoOption('disable_guest_ticket_creation', $disable_guest_ticket_creation);
            $this->AddIntoOption('close_ticket_opt_for_customer', $close_ticket_opt_for_customer);
            $this->AddIntoOption('disable_ticket_hotlink', $disable_ticket_hotlink);

            if (!$hasError) {
                if ($beforeSave !== $this->options) {
                    if ($this->UpdateOption()) {
                        $apiResponse->SetResponse(true, $this->__('Saved Successfully'));
                    } else {
                        $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                    }
                } else {
                    $apiResponse->SetResponse(false, $this->__('Nothing to save.'));
                }
            } else {
                $apiResponse->SetResponse(false, $this->__('Invalid data.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function AjaxRequestCallbackLogo()
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));
        $beforeSave = $this->options;

        $hasError = false;

        if (APPSBD_IsPostBack) {
            $app_favicon = esc_url_raw(APBD_PostValue('app_favicon', ''));
            $app_logo = esc_url_raw(APBD_PostValue('app_logo', ''));

            if (
                (1 > strlen($app_favicon)) ||
                (1 > strlen($app_logo))
            ) {
                $hasError = true;
            }

            $this->AddIntoOption('app_favicon', $app_favicon);
            $this->AddIntoOption('app_logo', $app_logo);

            if (!$hasError) {
                if ($beforeSave !== $this->options) {
                    if ($this->UpdateOption()) {
                        $apiResponse->SetResponse(true, $this->__('Saved Successfully'));
                    } else {
                        $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                    }
                } else {
                    $apiResponse->SetResponse(false, $this->__('Nothing to save.'));
                }
            } else {
                $apiResponse->SetResponse(false, $this->__('Invalid data.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function AjaxRequestCallbackFile()
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));
        $beforeSave = $this->options;

        $hasError = false;

        if (APPSBD_IsPostBack) {
            $ticket_file_upload = sanitize_text_field(APBD_PostValue('ticket_file_upload', ''));

            if ('A' === $ticket_file_upload) {
                $file_upload_size = sanitize_text_field(APBD_PostValue('file_upload_size', ''));
                $allowed_type = sanitize_text_field(APBD_PostValue('allowed_type', ''));

                $file_upload_size = max(1, intval($file_upload_size));

                // Type.
                $allowed_type = explode(',', $allowed_type);
                $all__allowed_type = ['image', 'docs', 'text', 'csv', 'pdf', 'zip', 'json'];
                $def__allowed_type = ['image', 'docs', 'text', 'pdf'];
                $new__allowed_type = [];

                foreach ($allowed_type as $key) {
                    if (in_array($key, $all__allowed_type, true)) {
                        $new__allowed_type[] = $key;
                    }
                }

                if (empty($new__allowed_type)) {
                    $new__allowed_type = $def__allowed_type;
                }

                $this->AddIntoOption('ticket_file_upload', 'A');
                $this->AddIntoOption('file_upload_size', $file_upload_size);
                $this->AddIntoOption('allowed_type', $new__allowed_type);
            } else {
                $this->AddIntoOption('ticket_file_upload', 'I');
            }

            if (!$hasError) {
                if ($beforeSave !== $this->options) {
                    if ($this->UpdateOption()) {
                        $apiResponse->SetResponse(true, $this->__('Saved Successfully'));
                    } else {
                        $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                    }
                } else {
                    $apiResponse->SetResponse(false, $this->__('Nothing to save.'));
                }
            } else {
                $apiResponse->SetResponse(false, $this->__('Invalid data.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function AjaxRequestCallbackCaptcha()
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));
        $beforeSave = $this->options;

        $hasError = false;

        if (APPSBD_IsPostBack) {
            $recaptcha_v3_status = sanitize_text_field(APBD_PostValue('recaptcha_v3_status', ''));

            if ('A' === $recaptcha_v3_status) {
                $recaptcha_v3_site_key = sanitize_text_field(APBD_PostValue('recaptcha_v3_site_key', ''));
                $recaptcha_v3_secret_key = sanitize_text_field(APBD_PostValue('recaptcha_v3_secret_key', ''));
                $recaptcha_v3_display_opts = sanitize_text_field(APBD_PostValue('recaptcha_v3_display_opts', ''));
                $recaptcha_v3_hide_badge = sanitize_text_field(APBD_PostValue('recaptcha_v3_hide_badge', ''));

                $recaptcha_v3_hide_badge = 'Y' === $recaptcha_v3_hide_badge ? 'Y' : 'N';

                // Secret key.
                if (str_contains($recaptcha_v3_secret_key, '*')) {
                    $recaptcha_v3_secret_key = $this->GetOption('recaptcha_v3_secret_key', '');
                }

                // Display options.
                $recaptcha_v3_display_opts = explode(',', $recaptcha_v3_display_opts);
                $all__recaptcha_v3_display_opts = ['captcha_on_login_form', 'captcha_on_create_tckt', 'captcha_on_reg_form'];

                foreach ($all__recaptcha_v3_display_opts as $opt) {
                    if (in_array($opt, $recaptcha_v3_display_opts, true)) {
                        $this->AddIntoOption($opt, 'Y');
                    } else {
                        $this->AddIntoOption($opt, 'N');
                    }
                }

                if (
                    (1 > strlen($recaptcha_v3_site_key)) ||
                    (1 > strlen($recaptcha_v3_secret_key))
                ) {
                    $hasError = true;
                }

                $this->AddIntoOption('recaptcha_v3_status', 'A');
                $this->AddIntoOption('recaptcha_v3_site_key', $recaptcha_v3_site_key);
                $this->AddIntoOption('recaptcha_v3_secret_key', $recaptcha_v3_secret_key);
                $this->AddIntoOption('recaptcha_v3_hide_badge', $recaptcha_v3_hide_badge);
            } else {
                $this->AddIntoOption('recaptcha_v3_status', 'I');
            }

            if (!$hasError) {
                if ($beforeSave !== $this->options) {
                    if ($this->UpdateOption()) {
                        $apiResponse->SetResponse(true, $this->__('Saved Successfully'));
                    } else {
                        $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                    }
                } else {
                    $apiResponse->SetResponse(false, $this->__('Nothing to save.'));
                }
            } else {
                $apiResponse->SetResponse(false, $this->__('Invalid data.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    function CreateBaseFolder()
    {
        if (is_dir(self::$uploadBasePath)) {
            if (wp_mkdir_p(self::$uploadBasePath)) {
                apbd_file_put_contents(
                    self::$uploadBasePath . "/.htaccess",
                    '<IfModule authz_core_module>
                        Require all denied
                    </IfModule>
                    <IfModule !authz_core_module>
                        Deny from all
                    </IfModule>'
                );
            }
        }
    }
    function getTicketAttachedPath($ticket_id, $reply_id = '')
    {
        $this->CreateBaseFolder();
        $ticketDir = self::$uploadBasePath;
        if (! empty($ticket_id)) {
            $ticketDir = $ticketDir . $ticket_id;
            if (! empty($reply_id)) {
                $ticketDir = $ticketDir . "/replied/" . $reply_id . "/attached_files/";
            } else {
                $ticketDir = $ticketDir . "/attached_files/";
            }
        }
        if (!is_dir($ticketDir)) {
            if (!wp_mkdir_p($ticketDir)) {
                $this->AddError("System couldn't create directory");
                return false;
            }
        }
        return $ticketDir;
    }
    function attach_file($ticket_files, $ticketObj, $reply_obj = null)
    {
        if ($this->kernelObject->isDemoMode()) {
            $this->AddError("File upload has been disabled in demomode");
            return false;
        }
        if (Apbd_wps_settings::GetModuleOption("ticket_file_upload", 'A') == 'A') {
            $this->CreateBaseFolder();
            $ticketDir = self::$uploadBasePath;
            if (! empty($ticketObj->id)) {
                $ticketDir = $ticketDir . $ticketObj->id;
                if (! empty($reply_obj->reply_id)) {
                    $ticketDir = $ticketDir . "/replied/" . $reply_obj->reply_id . "/attached_files/";
                } else {
                    $ticketDir = $ticketDir . "/attached_files/";
                }
            }


            if (!is_dir($ticketDir)) {
                if (!wp_mkdir_p($ticketDir)) {
                    $this->AddError("System couldn't create directory");
                    return false;
                }
            }

            if (is_dir($ticketDir)) {
                foreach ($ticket_files['name'] as $ind => $name) {
                    $fname = strtolower(preg_replace('#[^a-z0-9\-\.\_]#i', "_", $name));
                    if (move_uploaded_file($ticket_files['tmp_name'][$ind], $ticketDir . $fname)) {
                    }
                }
            }
        }
    }

    /**
     * @param boolean $isOk
     * @param string $name
     * @param int $error
     * @param string $type
     * @param int $size
     * @return boolean
     */

    function fileCheck($isOk, $name, $error, $type, $size)
    {
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $allowed = Apbd_wps_settings::GetModuleAllowedFileType();
        if (in_array($ext, ['php', 'js', 'sh', 'bash', 'cgi'])) {
            return false;
        }
        if (!in_array($ext, $allowed)) {
            $isOk = false;
        }
        return $isOk;
    }

    /**
     * @param Mapbd_wps_ticket $ticketObj
     * @param $customFields
     */
    public function ticket_assign($ticketObj, $customFields = [])
    {

        Mapbd_wps_ticket_assign_rule::ProcessRuleByCategory($ticketObj);
    }

    /**
     * @param Mapbd_wps_ticket_reply $replyObj
     */
    public function send_reply_notification($replyObj)
    {
        $ticketObj = Mapbd_wps_ticket::FindBy("id", $replyObj->ticket_id);
        if (! empty($replyObj) && ! empty($ticketObj)) {
            Mapbd_wps_ticket_assign_rule::ProcessReplyNotificationAndEmail($replyObj, $ticketObj);
        }
    }

    /**
     * @param Mapbd_wps_ticket $ticketObj
     * @param $customFields
     */
    public function send_ticket_email($ticketObj, $customFields)
    {
        Mapbd_wps_ticket::Send_ticket_open_email($ticketObj);
    }
    /**
     * @param Mapbd_wps_ticket $ticketObj
     */
    public function send_close_ticket_email($ticketObj)
    {
        if ($ticketObj->status == "C") {
            Mapbd_wps_ticket::Send_ticket_close_email($ticketObj);
        }
    }
    /**
     * @param Mapbd_wps_ticket $ticketObj
     */
    public function add_status_ticket_log($ticketObj, $logBy = 0)
    {
        $logBy = absint($logBy);
        if (! empty($logBy)) {
            $logByType = Apbd_wps_settings::isClientLoggedIn() ? 'U' : 'A';
            $statusArray = $ticketObj->GetPropertyRawOptions('status');
            $statusName = $statusArray[$ticketObj->status];
            Mapbd_wps_ticket_log::AddTicketLog($ticketObj->id, $logBy, $logByType, $ticketObj->___("Ticket status changed to %s", $statusName), $ticketObj->status);
        } else {
            $logBy = isset($ticketObj->assigned_on) ? absint($ticketObj->assigned_on) : 0;
            if (empty($logBy)) {
                $logBy = isset($ticketObj->last_replied_by) ? absint($ticketObj->last_replied_by) : 0;
            }
            $statusArray = $ticketObj->GetPropertyRawOptions('status');
            $statusName = $statusArray[$ticketObj->status];
            Mapbd_wps_ticket_log::AddTicketLog($ticketObj->id, $logBy, 'A', $ticketObj->___("Ticket status changed to %s Automatically", $statusName), $ticketObj->status);
        }
    }
    /**
     * @param Mapbd_wps_ticket $ticketObj
     */
    public function add_email_notification_ticket_log($ticketObj, $logBy = 0)
    {
        $logBy = absint($logBy);
        $isAgent = Apbd_wps_settings::isAgentLoggedIn();

        if ($isAgent && ! empty($logBy)) {
            $ticketId = $ticketObj->id;
            $ticketStatus = $ticketObj->status;
            $notification = $ticketObj->email_notification;

            if ('Y' === $notification) {
                Mapbd_wps_ticket_log::AddTicketLog($ticketId, $logBy, 'A', $ticketObj->___("Email notification enabled by"), $ticketStatus, 'A');
            } elseif ('N' === $notification) {
                Mapbd_wps_ticket_log::AddTicketLog($ticketId, $logBy, 'A', $ticketObj->___("Email notification disabled by"), $ticketStatus, 'A');
            }
        }
    }
    /**
     *@param Mapbd_wps_ticket $ticketObj
     */
    public function notify_user_on_ticket_assigned($ticketObj)
    {
        if (! empty($ticketObj->assigned_on)) {
            $title = apbd_get_user_title_by_user($ticketObj->assigned_on);
            Mapbd_wps_ticket_log::AddTicketLog($ticketObj->id, $ticketObj->assigned_on, "A", $ticketObj->___("Ticket assigned on %s", $title), $ticketObj->status);
        }

        Mapbd_wps_notification::AddNotification($ticketObj->assigned_on, "Assigned Ticket", "Ticket has been assigned to you", "", "/ticket/" . $ticketObj->id, false, "T", "A", $ticketObj->id);
        Mapbd_wps_ticket::Send_ticket_assigned_email($ticketObj);
    }

    /**
     * @param WP_Error $error
     */
    public function mail_send_failed($error)
    {
        Mapbd_wps_debug_log::AddEmailLog("Email send failed", $error);
    }

    function valid_incoming_webhook_custom_field($response, $custom_fields, $user_email = '', $user_exists = false, $ticket_category_id = 0)
    {
        if (empty($response) && ! empty($custom_fields)) {
            $predfn_custom_fields = Mapbd_wps_custom_field::FindAllBy("status", "A");

            foreach ($predfn_custom_fields as $predfn_custom_field) {
                $id = $predfn_custom_field->id;
                $field_label = $predfn_custom_field->field_label;
                $categories = $predfn_custom_field->choose_category;
                $fld_option = $predfn_custom_field->fld_option;
                $field_type = $predfn_custom_field->field_type;
                $where_to_create = $predfn_custom_field->where_to_create;
                $create_for = $predfn_custom_field->create_for;
                $is_required = $predfn_custom_field->is_required;

                $field_key = sprintf('D%1$d', $id);

                $categories = trim($categories);
                $categories = (0 < strlen($categories) ? explode(',', $categories) : array());
                $categories = array_map(function ($value) {
                    return trim($value);
                }, $categories);

                $fld_option = trim($fld_option);
                $fld_option = (0 < strlen($fld_option) ? explode(',', $fld_option) : array());
                $fld_option = array_map(function ($value) {
                    return trim($value);
                }, $fld_option);

                if (('A' === $create_for) || ('E' === $field_type) || (! empty($categories) && ! in_array('0', $categories) && ! in_array($ticket_category_id, $categories))) {
                    continue;
                };

                if (empty($response) && isset($custom_fields[$field_key])) {
                    $field_value = $custom_fields[$field_key];

                    $response = array(
                        'status' => true,
                        'msg' => '',
                    );

                    if (! empty($field_value)) {
                        if ('N' === $field_type) {
                            if (! is_numeric($field_value)) {
                                $response = array(
                                    'status' => false,
                                    'msg' => sprintf($this->__('%1$s must contain number.'), $field_label),
                                );
                            }
                        } elseif ('U' === $field_type) {
                            $new_field_value = esc_url($field_value);

                            if ($field_value !== $new_field_value) {
                                $response = array(
                                    'status' => false,
                                    'msg' => sprintf($this->__('%1$s is invalid.'), $field_label),
                                );
                            }
                        } elseif (('R' === $field_type) || ('W' === $field_type)) {
                            if (! empty($fld_option) && ! in_array($field_value, $fld_option, true)) {
                                $response = array(
                                    'status' => false,
                                    'msg' => sprintf($this->__('%1$s is invalid.'), $field_label),
                                );
                            }
                        }
                    } elseif (('Y' === $is_required) && (('T' === $where_to_create) || (('I' === $where_to_create) && (false === $user_exists)))) {
                        $response = array(
                            'status' => false,
                            'msg' => sprintf($this->__('%1$s is required.'), $field_label),
                        );
                    }

                    $response = ((isset($response['status']) && (true !== $response['status'])) ? $response : array());
                }
            }
        }

        return $response;
    }

    function final_filter_custom_field($custom_fields, $ticket_or_user_id = '')
    {
        $isClient = Apbd_wps_settings::isClientLoggedIn();
        if ($isClient) {
            foreach ($custom_fields as &$custom_field) {
                if (substr($custom_field->input_name, 0, 1) == "D" && ! empty($custom_field->field_value)) {
                    $custom_field->is_editable = false;
                }
            }
        } elseif (! current_user_can('edit-custom-field')) {
            foreach ($custom_fields as &$custom_field) {
                if (substr($custom_field->input_name, 0, 1) == "D") {
                    $custom_field->is_editable = false;
                }
            }
        }
        return $custom_fields;
    }

    public function ProfileEditAction($user)
    {
        $user_id = (isset($user->ID) ? absint($user->ID) : 0);

        if (empty($user_id) || ! current_user_can('edit_user', $user_id)) {
            return;
        }

        $options = apply_filters('apbd-wps/filter/profile-edit-options', array());

        if (! is_array($options) || empty($options)) {
            return;
        }
        ?>
        <h2 style="padding-top: 15px;"><?php $this->_e('Support Genix Options'); ?></h2>
        <table class="form-table" role="presentation">
            <tbody>
                <?php
                foreach ($options as $option_key => $option) {
                    $option_key = 'support_genix_' . sanitize_key(strval($option_key));
                    $option_label = (isset($option['label']) ? sanitize_text_field($option['label']) : '');
                    $option_description = (isset($option['description']) ? sanitize_text_field($option['description']) : '');
                    $option_value = sanitize_text_field(get_user_meta($user_id, $option_key, true));
                ?>
                    <tr class="user-<?php echo esc_attr($option_key); ?>-wrap">
                        <th><label for="<?php echo esc_attr($option_key); ?>"><?php echo esc_html($option_label); ?></label></th>
                        <td>
                            <input type="text" name="<?php echo esc_attr($option_key); ?>" id="<?php echo esc_attr($option_key); ?>" aria-describedby="<?php echo esc_attr($option_key); ?>-description" value="<?php echo esc_attr($option_value); ?>" class="regular-text ltr">
                            <p class="description" id="<?php echo esc_attr($option_key); ?>-description"><?php echo esc_html($option_description); ?></p>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
<?php
    }

    public function ProfileUpdateAction($user_id)
    {
        if (empty($user_id) || ! current_user_can('edit_user', $user_id)) {
            return;
        }

        $options = apply_filters('apbd-wps/filter/profile-edit-options', array());

        if (! is_array($options) || empty($options)) {
            return;
        }

        foreach ($options as $option_key => $option) {
            $option_key = 'support_genix_' . sanitize_key(strval($option_key));
            $option_value = (isset($_POST[$option_key]) ? sanitize_text_field($_POST[$option_key]) : '');

            update_user_meta($user_id, $option_key, $option_value);
        }
    }

    public static function dashboard_texts()
    {
        $core = APBDWPSupportLite::GetInstance();

        $texts = [
            'Tickets' => $core->__('Tickets'),
            'Reports' => $core->__('Reports'),
            'Settings' => $core->__('Settings'),
            'Saved Replies' => $core->__('Saved Replies'),
            'All Tickets' => $core->__('All Tickets'),
            'My Tickets' => $core->__('My Tickets'),
            'Unassigned' => $core->__('Unassigned'),
            'Trashed' => $core->__('Trashed'),
            'Sort: Reply Date (Newest First)' => $core->__('Sort: Reply Date (Newest First)'),
            'Sort: Reply Date (Oldest First)' => $core->__('Sort: Reply Date (Oldest First)'),
            'Sort: Opening Date (Newest First)' => $core->__('Sort: Opening Date (Newest First)'),
            'Sort: Opening Date (Oldest First)' => $core->__('Sort: Opening Date (Oldest First)'),
            'Bulk Actions' => $core->__('Bulk Actions'),
            'Quick Edit' => $core->__('Quick Edit'),
            'Move to Trash' => $core->__('Move to Trash'),
            'Restore' => $core->__('Restore'),
            'Delete' => $core->__('Delete'),
            'All Agents' => $core->__('All Agents'),
            'All Categories' => $core->__('All Categories'),
            'Ticket' => $core->__('Ticket'),
            'Add New %s' => $core->__('Add New %s'),
            'Add Ticket' => $core->__('Add Ticket'),
            'Need Reply' => $core->__('Need Reply'),
            'Search keyword' => $core->__('Search keyword'),
            'Reset Filters' => $core->__('Reset Filters'),
            'Select Category' => $core->__('Select Category'),
            'Title' => $core->__('Title'),
            'Reply' => $core->__('Reply'),
            'Agent' => $core->__('Agent'),
            'Date' => $core->__('Date'),
            'Showing %1$d - %2$d of %3$d' => $core->__('Showing %1$d - %2$d of %3$d'),
            'Apply' => $core->__('Apply'),
            'Trash' => $core->__('Trash'),
            'Are you sure want to move to trash?' => $core->__('Are you sure want to move to trash?'),
            'Are you sure want to delete?' => $core->__('Are you sure want to delete?'),
            'Are you sure want to restore?' => $core->__('Are you sure want to restore?'),
            'Activate' => $core->__('Activate'),
            'Are you sure want to activate?' => $core->__('Are you sure want to activate?'),
            'Deactivate' => $core->__('Deactivate'),
            'Are you sure want to deactivate?' => $core->__('Are you sure want to deactivate?'),
            'Re-open' => $core->__('Re-open'),
            'Are you sure want to re-open?' => $core->__('Are you sure want to re-open?'),
            'Close' => $core->__('Close'),
            'Are you sure want to close?' => $core->__('Are you sure want to close?'),
            'Public' => $core->__('Public'),
            'Are you sure want to make public?' => $core->__('Are you sure want to make public?'),
            'Private' => $core->__('Private'),
            'Are you sure want to make private?' => $core->__('Are you sure want to make private?'),
            'by %s' => $core->__('by %s'),
            'Agent:' => $core->__('Agent:'),
            'Replied:' => $core->__('Replied:'),
            '%1$s at %2$s' => $core->__('%1$s at %2$s'),
            'Created:' => $core->__('Created:'),
            'Status' => $core->__('Status'),
            'Ticket Track ID' => $core->__('Ticket Track ID'),
            'Search User' => $core->__('Search User'),
            'Select User' => $core->__('Select User'),
            'Create User' => $core->__('Create User'),
            'Choose User' => $core->__('Choose User'),
            'First Name' => $core->__('First Name'),
            'First name' => $core->__('First name'),
            '%s is required.' => $core->__('%s is required.'),
            'Last Name' => $core->__('Last Name'),
            'Last name' => $core->__('Last name'),
            'Email Address' => $core->__('Email Address'),
            'Email address' => $core->__('Email address'),
            'Send the new user an email about their account.' => $core->__('Send the new user an email about their account.'),
            'Back' => $core->__('Back'),
            'Create' => $core->__('Create'),
            'User' => $core->__('User'),
            'Ticket User' => $core->__('Ticket User'),
            'Change User' => $core->__('Change User'),
            'Category' => $core->__('Category'),
            'Subject' => $core->__('Subject'),
            'Description' => $core->__('Description'),
            'Click or drag file to upload' => $core->__('Click or drag file to upload'),
            'Cancel' => $core->__('Cancel'),
            'Insert %s' => $core->__('Insert %s'),
            'Export Ticket' => $core->__('Export Ticket'),
            'Private Ticket' => $core->__('Private Ticket'),
            'Click to make it public.' => $core->__('Click to make it public.'),
            'Email notification' => $core->__('Email notification'),
            'Are you sure want to enable email notification to customer for this ticket?' => $core->__('Are you sure want to enable email notification to customer for this ticket?'),
            'Yes' => $core->__('Yes'),
            'No' => $core->__('No'),
            'Email notification to customer for this ticket.' => $core->__('Email notification to customer for this ticket.'),
            'Email notification.' => $core->__('Email notification.'),
            'Copy Hotlink' => $core->__('Copy Hotlink'),
            'Are you sure want to disable email notification to customer for this ticket?' => $core->__('Are you sure want to disable email notification to customer for this ticket?'),
            'Information' => $core->__('Information'),
            'Edit' => $core->__('Edit'),
            'Category:' => $core->__('Category:'),
            'N/A' => $core->__('N/A'),
            'Status:' => $core->__('Status:'),
            'Note' => $core->__('Note'),
            'Assigned on:' => $core->__('Assigned on:'),
            'Ticket Data' => $core->__('Ticket Data'),
            'Additional Data' => $core->__('Additional Data'),
            'Edit %s' => $core->__('Edit %s'),
            'Starter' => $core->__('Starter'),
            'Ticket Logs (%d)' => $core->__('Ticket Logs (%d)'),
            'Save Changes' => $core->__('Save Changes'),
            'Content' => $core->__('Content'),
            'Add Internal Note' => $core->__('Add Internal Note'),
            'Submit Reply' => $core->__('Submit Reply'),
            'Are you sure want to submit reply and close ticket?' => $core->__('Are you sure want to submit reply and close ticket?'),
            'Submit & Close Ticket' => $core->__('Submit & Close Ticket'),
            'Summary Data' => $core->__('Summary Data'),
            'Responses' => $core->__('Responses'),
            'Closed' => $core->__('Closed'),
            'Report Based On' => $core->__('Report Based On'),
            'Line chart' => $core->__('Line chart'),
            'Clear filters' => $core->__('Clear filters'),
            'Export' => $core->__('Export'),
            'Reload' => $core->__('Reload'),
            'This count represents the total number of tickets currently requiring a response, and is not constrained by the date range filter.' => $core->__('This count represents the total number of tickets currently requiring a response, and is not constrained by the date range filter.'),
            'This count reflects the total number of times tickets have been marked as closed.' => $core->__('This count reflects the total number of times tickets have been marked as closed.'),
            'These are tickets that have not yet been categorized.' => $core->__('These are tickets that have not yet been categorized.'),
            'These are tickets that have not yet been assigned.' => $core->__('These are tickets that have not yet been assigned.'),
            'Bar chart' => $core->__('Bar chart'),
            'General' => $core->__('General'),
            'User Roles' => $core->__('User Roles'),
            'Categories' => $core->__('Categories'),
            'Assign Rules' => $core->__('Assign Rules'),
            'Email Templates' => $core->__('Email Templates'),
            'Custom Fields' => $core->__('Custom Fields'),
            'Email to Ticket' => $core->__('Email to Ticket'),
            'Modern' => $core->__('Modern'),
            'Traditional' => $core->__('Traditional'),
            'Webhooks' => $core->__('Webhooks'),
            'Incoming' => $core->__('Incoming'),
            'Outgoing' => $core->__('Outgoing'),
            'Integrations' => $core->__('Integrations'),
            'WooCommerce' => $core->__('WooCommerce'),
            'EDD' => $core->__('EDD'),
            'FluentCRM' => $core->__('FluentCRM'),
            'WhatsApp' => $core->__('WhatsApp'),
            'Slack' => $core->__('Slack'),
            'Tutor LMS' => $core->__('Tutor LMS'),
            'BetterDocs' => $core->__('BetterDocs'),
            'Envato' => $core->__('Envato'),
            'Elite Licenser' => $core->__('Elite Licenser'),
            'Manage License' => $core->__('Manage License'),
            'Main' => $core->__('Main'),
            'Logo' => $core->__('Logo'),
            'File' => $core->__('File'),
            'reCAPTCHA (v3)' => $core->__('reCAPTCHA (v3)'),
            'Style' => $core->__('Style'),
            'Login with Envato' => $core->__('Login with Envato'),
            'Learn more' => $core->__('Learn more'),
            'Documentation' => $core->__('Documentation'),
            'Client Role' => $core->__('Client Role'),
            'Client role' => $core->__('Client role'),
            'Ticket Page' => $core->__('Ticket Page'),
            'Enable shortcode mode for ticket page.' => $core->__('Enable shortcode mode for ticket page.'),
            'App Loader Text' => $core->__('App Loader Text'),
            'Footer Copyright Text' => $core->__('Footer Copyright Text'),
            'Remove powered-by.' => $core->__('Remove powered-by.'),
            'Enable Wordpress Login Register.' => $core->__('Enable Wordpress Login Register.'),
            'Enable Wordpress Profile Link.' => $core->__('Enable Wordpress Profile Link.'),
            'Enable Sequential Ticket Track ID.' => $core->__('Enable Sequential Ticket Track ID.'),
            'Enable auto ticket close.' => $core->__('Enable auto ticket close.'),
            'Disable closed ticket reply.' => $core->__('Disable closed ticket reply.'),
            'Enable public ticket option (on creation).' => $core->__('Enable public ticket option (on creation).'),
            'Enable public ticket option (on details).' => $core->__('Enable public ticket option (on details).'),
            'Enable to show public tickets.' => $core->__('Enable to show public tickets.'),
            'Disable registration form.' => $core->__('Disable registration form.'),
            'Disable guest ticket creation.' => $core->__('Disable guest ticket creation.'),
            'Enable ticket close option for customer.' => $core->__('Enable ticket close option for customer.'),
            'Show other tickets in ticket details page.' => $core->__('Show other tickets in ticket details page.'),
            'Hide ticket details info by default.' => $core->__('Hide ticket details info by default.'),
            'Disable ticket search by value of custom field.' => $core->__('Disable ticket search by value of custom field.'),
            'Disable ticket hotlink (except guest ticket).' => $core->__('Disable ticket hotlink (except guest ticket).'),
            'Disable auto-scroll to the latest response on ticket details.' => $core->__('Disable auto-scroll to the latest response on ticket details.'),
            'Discard' => $core->__('Discard'),
            'Translatable' => $core->__('Translatable'),
            'App Icon' => $core->__('App Icon'),
            'App Logo' => $core->__('App Logo'),
            'Enable App Loader.' => $core->__('Enable App Loader.'),
            'Dashboard Image' => $core->__('Dashboard Image'),
            'Client & Reg. Page Image' => $core->__('Client & Reg. Page Image'),
            'Nothing selected' => $core->__('Nothing selected'),
            'Upload' => $core->__('Upload'),
            'Click to enable file upload and setup.' => $core->__('Click to enable file upload and setup.'),
            'Max file size' => $core->__('Max file size'),
            'Allowed File Types' => $core->__('Allowed File Types'),
            'Photos %s' => $core->__('Photos %s'),
            'Docs %s' => $core->__('Docs %s'),
            'Text %s' => $core->__('Text %s'),
            'CSV %s' => $core->__('CSV %s'),
            'PDF %s' => $core->__('PDF %s'),
            'Zip %s' => $core->__('Zip %s'),
            'JSON %s' => $core->__('JSON %s'),
            'Click to enable and setup.' => $core->__('Click to enable and setup.'),
            'Site Key' => $core->__('Site Key'),
            'Site key' => $core->__('Site key'),
            'Secret Key' => $core->__('Secret Key'),
            'Secret key' => $core->__('Secret key'),
            'Value containing any asterisk (*) will not be updated.' => $core->__('Value containing any asterisk (*) will not be updated.'),
            'Display Options' => $core->__('Display Options'),
            'Show in Login Form' => $core->__('Show in Login Form'),
            'Show in Ticket Form (If not logged in)' => $core->__('Show in Ticket Form (If not logged in)'),
            'Show in Registration Form' => $core->__('Show in Registration Form'),
            'Hide reCAPTCHA Badge.' => $core->__('Hide reCAPTCHA Badge.'),
            'New' => $core->__('New'),
            'Active' => $core->__('Active'),
            'Inactive' => $core->__('Inactive'),
            'In-progress' => $core->__('In-progress'),
            '%s (Status Label)' => $core->__('%s (Status Label)'),
            '%s (status label)' => $core->__('%s (status label)'),
            'Primary Brand Color' => $core->__('Primary Brand Color'),
            'primary' => $core->__('primary'),
            'Default %s brand color: %s (HEX).' => $core->__('Default %s brand color: %s (HEX).'),
            'Secondary Brand Color' => $core->__('Secondary Brand Color'),
            'secondary' => $core->__('secondary'),
            'Custom CSS' => $core->__('Custom CSS'),
            'Click to disable file upload.' => $core->__('Click to disable file upload.'),
            'App Loader' => $core->__('App Loader'),
            'Login Page Link' => $core->__('Login Page Link'),
            'Please enter a valid URL.' => $core->__('Please enter a valid URL.'),
            'Registration Link' => $core->__('Registration Link'),
            'WP Profile Link' => $core->__('WP Profile Link'),
            'Ticket track ID prefix' => $core->__('Ticket track ID prefix'),
            'Ticket track ID length' => $core->__('Ticket track ID length'),
            'Auto ticket close after' => $core->__('Auto ticket close after'),
            'Disable reply notice text' => $core->__('Disable reply notice text'),
            'Click to disable.' => $core->__('Click to disable.'),
            'Add New' => $core->__('Add New'),
            'User Role' => $core->__('User Role'),
            'ID' => $core->__('ID'),
            'Name' => $core->__('Name'),
            'Action' => $core->__('Action'),
            'Built-in' => $core->__('Built-in'),
            'Support Agent or Manager.' => $core->__('Support Agent or Manager.'),
            'Capabilities' => $core->__('Capabilities'),
            'All Capabilities' => $core->__('All Capabilities'),
            'Manager' => $core->__('Manager'),
            'Preset' => $core->__('Preset'),
            'Assign me' => $core->__('Assign me'),
            'Ticket reply' => $core->__('Ticket reply'),
            'Manage unassigned tickets' => $core->__('Manage unassigned tickets'),
            'Manage other agent\'s tickets' => $core->__('Manage other agent\'s tickets'),
            'Closed ticket list' => $core->__('Closed ticket list'),
            'Ticket Details' => $core->__('Ticket Details'),
            'Change status' => $core->__('Change status'),
            'Change privacy' => $core->__('Change privacy'),
            'Assign agent' => $core->__('Assign agent'),
            'Change category' => $core->__('Change category'),
            'Move to trash' => $core->__('Move to trash'),
            'Create note' => $core->__('Create note'),
            'Edit custom field value' => $core->__('Edit custom field value'),
            'Show ticket user email' => $core->__('Show ticket user email'),
            'Show ticket hotlink' => $core->__('Show ticket hotlink'),
            'Trashed Ticket' => $core->__('Trashed Ticket'),
            'Trashed ticket list' => $core->__('Trashed ticket list'),
            'Restore ticket' => $core->__('Restore ticket'),
            'Delete ticket' => $core->__('Delete ticket'),
            'Edit order source' => $core->__('Edit order source'),
            'Edit Purchase Code' => $core->__('Edit Purchase Code'),
            'Update' => $core->__('Update'),
            'Parent Category' => $core->__('Parent Category'),
            'Assign Rule' => $core->__('Assign Rule'),
            'Rule Type' => $core->__('Rule Type'),
            'Role or Agent' => $core->__('Role or Agent'),
            'Assign to role' => $core->__('Assign to role'),
            'Assign to agent' => $core->__('Assign to agent'),
            'Rule type' => $core->__('Rule type'),
            'Notify to agent' => $core->__('Notify to agent'),
            'Select Role' => $core->__('Select Role'),
            'Role' => $core->__('Role'),
            'Choose Category' => $core->__('Choose Category'),
            'Placeholers' => $core->__('Placeholers'),
            'Ticket Created' => $core->__('Ticket Created'),
            'Ticket Replied' => $core->__('Ticket Replied'),
            'Ticket Assigned' => $core->__('Ticket Assigned'),
            'Ticket Closed' => $core->__('Ticket Closed'),
            'Admin or Agent' => $core->__('Admin or Agent'),
            'Customer (Ticket Portal)' => $core->__('Customer (Ticket Portal)'),
            'Customer (Email to Ticket)' => $core->__('Customer (Email to Ticket)'),
            'Email Template' => $core->__('Email Template'),
            'Recipient' => $core->__('Recipient'),
            'Saved Reply' => $core->__('Saved Reply'),
            'Custom Field' => $core->__('Custom Field'),
            'Label' => $core->__('Label'),
            'Slug' => $core->__('Slug'),
            'Type' => $core->__('Type'),
            'Field Type' => $core->__('Field Type'),
            'Field type' => $core->__('Field type'),
            'Textbox' => $core->__('Textbox'),
            'Numeric' => $core->__('Numeric'),
            'Switch' => $core->__('Switch'),
            'Radio' => $core->__('Radio'),
            'Dropdown' => $core->__('Dropdown'),
            'Instruction Text' => $core->__('Instruction Text'),
            'URL Input' => $core->__('URL Input'),
            'Field Label' => $core->__('Field Label'),
            'Field label' => $core->__('Field label'),
            'Field Slug' => $core->__('Field Slug'),
            'Field slug' => $core->__('Field slug'),
            'Placeholder' => $core->__('Placeholder'),
            'Form Options' => $core->__('Form Options'),
            'Required Field' => $core->__('Required Field'),
            'Half Field' => $core->__('Half Field'),
            'Create Where' => $core->__('Create Where'),
            'Ticket Form' => $core->__('Ticket Form'),
            'Registration Form' => $core->__('Registration Form'),
            'Create For' => $core->__('Create For'),
            'Admin Only' => $core->__('Admin Only'),
            'Both (Clients & Admin)' => $core->__('Both (Clients & Admin)'),
            'Field Options' => $core->__('Field Options'),
            'Comma-separated options (example: Option A, Option B, Option C).' => $core->__('Comma-separated options (example: Option A, Option B, Option C).'),
            'Mailboxes (Modern)' => $core->__('Mailboxes (Modern)'),
            'Mailbox' => $core->__('Mailbox'),
            'Mailboxes (Traditional)' => $core->__('Mailboxes (Traditional)'),
            'The mailbox address will be generated here automatically!' => $core->__('The mailbox address will be generated here automatically!'),
            'Connected Email Address' => $core->__('Connected Email Address'),
            'Connected email address' => $core->__('Connected email address'),
            'Please enter a valid email.' => $core->__('Please enter a valid email.'),
            'Upon saving, when the mailbox address is generated, please forward your support emails from connected email address to the mailbox address.' => $core->__('Upon saving, when the mailbox address is generated, please forward your support emails from connected email address to the mailbox address.'),
            'Attached with ticket category.' => $core->__('Attached with ticket category.'),
            'I agree with the Support Genix email to ticket %sterms and conditions%s.' => $core->__('I agree with the Support Genix email to ticket %sterms and conditions%s.'),
            'Please make sure that support emails from connected address are forwared to mailbox address.' => $core->__('Please make sure that support emails from connected address are forwared to mailbox address.'),
            'Address:' => $core->__('Address:'),
            'Connected:' => $core->__('Connected:'),
            'Host' => $core->__('Host'),
            'Port' => $core->__('Port'),
            'User Email' => $core->__('User Email'),
            'User email' => $core->__('User email'),
            'User Password' => $core->__('User Password'),
            'User password' => $core->__('User password'),
            'Secure protocol (SSL/TLS).' => $core->__('Secure protocol (SSL/TLS).'),
            'Secure Protocol Type' => $core->__('Secure Protocol Type'),
            'Mailboxes Settings' => $core->__('Mailboxes Settings'),
            'Cron Job Command' => $core->__('Cron Job Command'),
            'or' => $core->__('or'),
            'Email Reply Start Text' => $core->__('Email Reply Start Text'),
            'Incoming Webhooks' => $core->__('Incoming Webhooks'),
            'Incoming Webhook' => $core->__('Incoming Webhook'),
            'Secret' => $core->__('Secret'),
            'The incoming webhook URL will be generated here automatically!' => $core->__('The incoming webhook URL will be generated here automatically!'),
            'Field' => $core->__('Field'),
            'Email' => $core->__('Email'),
            'Required' => $core->__('Required'),
            'Ticket Subject' => $core->__('Ticket Subject'),
            'Text' => $core->__('Text'),
            'Ticket Description' => $core->__('Ticket Description'),
            'User First Name' => $core->__('User First Name'),
            'Optional' => $core->__('Optional'),
            'User Last Name' => $core->__('User Last Name'),
            'Ticket Category ID' => $core->__('Ticket Category ID'),
            'Number' => $core->__('Number'),
            'Ticket Attachment(s)' => $core->__('Ticket Attachment(s)'),
            'URL' => $core->__('URL'),
            'URLs array (or comma separated URLs)' => $core->__('URLs array (or comma separated URLs)'),
            'WooCommerce Store ID' => $core->__('WooCommerce Store ID'),
            'If enabled' => $core->__('If enabled'),
            'WooCommerce Order ID' => $core->__('WooCommerce Order ID'),
            'Envato Purchase Code' => $core->__('Envato Purchase Code'),
            'Elite Licenser Purchase Code' => $core->__('Elite Licenser Purchase Code'),
            'Ticket Custom Fields' => $core->__('Ticket Custom Fields'),
            'Based on settings' => $core->__('Based on settings'),
            'Outgoing Webhooks' => $core->__('Outgoing Webhooks'),
            'Outgoing Webhook' => $core->__('Outgoing Webhook'),
            'Events' => $core->__('Events'),
            'Remote URL' => $core->__('Remote URL'),
            'Trigger Events' => $core->__('Trigger Events'),
            'On Ticket Creation' => $core->__('On Ticket Creation'),
            'On Ticket Replied' => $core->__('On Ticket Replied'),
            'On Client Creation' => $core->__('On Client Creation'),
            'WooCommerce Integration' => $core->__('WooCommerce Integration'),
            'WooCommerce Integrations' => $core->__('WooCommerce Integrations'),
            'Store' => $core->__('Store'),
            'WooCommerce Integrations Settings' => $core->__('WooCommerce Integrations Settings'),
            'Get Support' => $core->__('Get Support'),
            'Order Info Required' => $core->__('Order Info Required'),
            'Show in Ticket Form' => $core->__('Show in Ticket Form'),
            'Show support menu in my account page.' => $core->__('Show support menu in my account page.'),
            'Menu Title' => $core->__('Menu Title'),
            'Menu title' => $core->__('Menu title'),
            'Order #{{order_id}} has been placed by {{user_full_name}} at {{store_title}}' => $core->__('Order #{{order_id}} has been placed by {{user_full_name}} at {{store_title}}'),
            'A new Order #{{order_id}} has been placed by {{user_full_name}} in your store {{store_title}}.' => $core->__('A new Order #{{order_id}} has been placed by {{user_full_name}} in your store {{store_title}}.'),
            'WooCommerce in same site' => $core->__('WooCommerce in same site'),
            'WooCommerce in external site' => $core->__('WooCommerce in external site'),
            'Store Title' => $core->__('Store Title'),
            'Store title' => $core->__('Store title'),
            'Disallow Options' => $core->__('Disallow Options'),
            'Disallow cancelled order ID' => $core->__('Disallow cancelled order ID'),
            'Disallow refunded order ID' => $core->__('Disallow refunded order ID'),
            'Verify Options' => $core->__('Verify Options'),
            'Verify customer email address' => $core->__('Verify customer email address'),
            'Verify external store SSL' => $core->__('Verify external store SSL'),
            'Auto ticket creation.' => $core->__('Auto ticket creation.'),
            'Ticket Category' => $core->__('Ticket Category'),
            'Ticket subject' => $core->__('Ticket subject'),
            'Available placeholders: {{store_id}}, {{store_title}}, {{store_url}}, {{order_id}}, {{user_email}}, {{user_first_name}}, {{user_last_name}} and {{user_full_name}}.' => $core->__('Available placeholders: {{store_id}}, {{store_title}}, {{store_url}}, {{order_id}}, {{user_email}}, {{user_first_name}}, {{user_last_name}} and {{user_full_name}}.'),
            'Ticket description' => $core->__('Ticket description'),
            'Store URL' => $core->__('Store URL'),
            'Home URL of the store (example: https://example.com).' => $core->__('Home URL of the store (example: https://example.com).'),
            'API Consumer Key' => $core->__('API Consumer Key'),
            'API consumer key' => $core->__('API consumer key'),
            'API Consumer Secret' => $core->__('API Consumer Secret'),
            'API consumer secret' => $core->__('API consumer secret'),
            'Edd Integrations' => $core->__('Edd Integrations'),
            'Edd Integration' => $core->__('Edd Integration'),
            'Site' => $core->__('Site'),
            'EDD in same site' => $core->__('EDD in same site'),
            'EDD in external site' => $core->__('EDD in external site'),
            'Show order details button.' => $core->__('Show order details button.'),
            'API Endpoint' => $core->__('API Endpoint'),
            'API endpoint' => $core->__('API endpoint'),
            'API endpoint URL (example: https://example.com/edd-api/)' => $core->__('API endpoint URL (example: https://example.com/edd-api/)'),
            'API Public Key' => $core->__('API Public Key'),
            'API public key' => $core->__('API public key'),
            'API Token' => $core->__('API Token'),
            'API token' => $core->__('API token'),
            'Admin URL' => $core->__('Admin URL'),
            'FluentCRM Integrations' => $core->__('FluentCRM Integrations'),
            'FluentCRM Integration' => $core->__('FluentCRM Integration'),
            'FluentCRM in same site' => $core->__('FluentCRM in same site'),
            'FluentCRM in external site' => $core->__('FluentCRM in external site'),
            'List IDs' => $core->__('List IDs'),
            'Comma-separated IDs of list (example: 1,2,3,4).' => $core->__('Comma-separated IDs of list (example: 1,2,3,4).'),
            'Tag IDs' => $core->__('Tag IDs'),
            'Comma-separated IDs of tag (example: 1,2,3,4).' => $core->__('Comma-separated IDs of tag (example: 1,2,3,4).'),
            'Contact status' => $core->__('Contact status'),
            'Pending' => $core->__('Pending'),
            'Subscribed' => $core->__('Subscribed'),
            'Unsubscribed' => $core->__('Unsubscribed'),
            'Webhook URL' => $core->__('Webhook URL'),
            '%s Integration' => $core->__('%s Integration'),
            'Twilio Account SID' => $core->__('Twilio Account SID'),
            'Twilio Auth Token' => $core->__('Twilio Auth Token'),
            'Twilio WhatsApp Number' => $core->__('Twilio WhatsApp Number'),
            'Twilio WhatsApp number' => $core->__('Twilio WhatsApp number'),
            'Notification Events' => $core->__('Notification Events'),
            'Response from WhatsApp.' => $core->__('Response from WhatsApp.'),
            'Please use this URL into your Twilio settings to enable your agent to respond to tickets via WhatsApp.' => $core->__('Please use this URL into your Twilio settings to enable your agent to respond to tickets via WhatsApp.'),
            'Slack Bot User OAuth Token' => $core->__('Slack Bot User OAuth Token'),
            'Slack Channel Name' => $core->__('Slack Channel Name'),
            'Slack Channel name' => $core->__('Slack Channel name'),
            'Slack Channel ID' => $core->__('Slack Channel ID'),
            'Response from Slack.' => $core->__('Response from Slack.'),
            'Please use this URL into your Slack settings to enable your agent to respond to tickets via Slack.' => $core->__('Please use this URL into your Slack settings to enable your agent to respond to tickets via Slack.'),
            'Click to enable.' => $core->__('Click to enable.'),
            'Suggested Docs Heading' => $core->__('Suggested Docs Heading'),
            'Suggested Docs heading' => $core->__('Suggested Docs heading'),
            'Number of Suggested Docs' => $core->__('Number of Suggested Docs'),
            'Enter a value between 1 and 20.' => $core->__('Enter a value between 1 and 20.'),
            'Envato API Token' => $core->__('Envato API Token'),
            'Envato API token' => $core->__('Envato API token'),
            'License Required' => $core->__('License Required'),
            'Check Support Expiry' => $core->__('Check Support Expiry'),
            'Please use this Confirmation URL while Register Envato App.' => $core->__('Please use this Confirmation URL while Register Envato App.'),
            'Loading...' => $core->__('Loading...'),
            'Envato Username' => $core->__('Envato Username'),
            'Envato username' => $core->__('Envato username'),
            'App Client ID' => $core->__('App Client ID'),
            'App client ID' => $core->__('App client ID'),
            'App Client Secret' => $core->__('App Client Secret'),
            'App client secret' => $core->__('App client secret'),
            'API endpoint URL (example: https://example.com/wp-json/licensor/).' => $core->__('API endpoint URL (example: https://example.com/wp-json/licensor/).'),
            'API Key' => $core->__('API Key'),
            'API key' => $core->__('API key'),
            'Enable cache response.' => $core->__('Enable cache response.'),
            'If you enable this, license code checking request will be cache for 5 minutes.' => $core->__('If you enable this, license code checking request will be cache for 5 minutes.'),
            'License Code' => $core->__('License Code'),
            'License code' => $core->__('License code'),
            'Activate License' => $core->__('Activate License'),
            'License Status' => $core->__('License Status'),
            'Valid' => $core->__('Valid'),
            'License Type' => $core->__('License Type'),
            'License Expired on' => $core->__('License Expired on'),
            'Support Expired on' => $core->__('Support Expired on'),
            'Your License Key' => $core->__('Your License Key'),
            'Are you sure want to deactivate license?' => $core->__('Are you sure want to deactivate license?'),
            'Deactivate License' => $core->__('Deactivate License'),
            'Deactivate license' => $core->__('Deactivate license'),
            'Order' => $core->__('Order'),
            'Order Up' => $core->__('Order Up'),
            'Are you sure want to change order?' => $core->__('Are you sure want to change order?'),
            'Order Down' => $core->__('Order Down'),
            'Slug:' => $core->__('Slug:'),
            'Type:' => $core->__('Type:'),
            '%s:' => $core->__('%s:'),
            'This field is required.' => $core->__('This field is required.'),
            'Order Reset' => $core->__('Order Reset'),
            'Are you sure want to reset order?' => $core->__('Are you sure want to reset order?'),
            'Reset Order' => $core->__('Reset Order'),
            'Same-site' => $core->__('Same-site'),
            'Select' => $core->__('Select'),
            'Categories:' => $core->__('Categories:'),
            'Reply and close ticket' => $core->__('Reply and close ticket'),
            'Assign Agent' => $core->__('Assign Agent'),
            'Set Category' => $core->__('Set Category'),
            'Set Status' => $core->__('Set Status'),
            'Select Agent' => $core->__('Select Agent'),
            'Select Category' => $core->__('Select Category'),
            'Select Status' => $core->__('Select Status'),
            'Select Agent' => $core->__('Select Agent'),
            'Select Category' => $core->__('Select Category'),
            'Select Status' => $core->__('Select Status'),
            'Pro Edition' => $core->__('Pro Edition'),
            'Performance Insights' => $core->__('Performance Insights'),
            'Weekend & Holiday' => $core->__('Weekend & Holiday'),
            'Weekend' => $core->__('Weekend'),
            'Holiday' => $core->__('Holiday'),
            'Other Tickets (%d)' => $core->__('Other Tickets (%d)'),
            'Host:' => $core->__('Host:'),
            'Email:' => $core->__('Email:'),
            'Report Schedule' => $core->__('Report Schedule'),
            'Report schedule' => $core->__('Report schedule'),
            'Custom Minutes' => $core->__('Custom Minutes'),
            'Hourly' => $core->__('Hourly'),
            'Daily' => $core->__('Daily'),
            'Weekly' => $core->__('Weekly'),
            'Monthly' => $core->__('Monthly'),
            'Time' => $core->__('Time'),
            'Recipients' => $core->__('Recipients'),
            'Comma separated email addresses.' => $core->__('Comma separated email addresses.'),
            'Custom minutes' => $core->__('Custom minutes'),
            'Enter a value between 5 and 60.' => $core->__('Enter a value between 5 and 60.'),
            'Day of Week' => $core->__('Day of Week'),
            'Day of week' => $core->__('Day of week'),
            'Monday' => $core->__('Monday'),
            'Tuesday' => $core->__('Tuesday'),
            'Wednesday' => $core->__('Wednesday'),
            'Thursday' => $core->__('Thursday'),
            'Friday' => $core->__('Friday'),
            'Saturday' => $core->__('Saturday'),
            'Sunday' => $core->__('Sunday'),
            'Day of Month' => $core->__('Day of Month'),
            'Day of month' => $core->__('Day of month'),
            'Enter a value between 1 and 31.' => $core->__('Enter a value between 1 and 31.'),
            'Please note that our support team is currently out of office for the weekend. While you\'re welcome to submit your ticket, it will be reviewed when we return on the next business day. We appreciate your patience and will address your inquiry as soon as possible.' => $core->__('Please note that our support team is currently out of office for the weekend. While you\'re welcome to submit your ticket, it will be reviewed when we return on the next business day. We appreciate your patience and will address your inquiry as soon as possible.'),
            'Weekend Days' => $core->__('Weekend Days'),
            'Enable portal notice.' => $core->__('Enable portal notice.'),
            'Enable email notification.' => $core->__('Enable email notification.'),
            'Day' => $core->__('Day'),
            'Time range' => $core->__('Time range'),
            'Add More' => $core->__('Add More'),
            'Our office is currently closed for the holiday. While you\'re welcome to submit your ticket, please be aware that our team will review it when we return to the office. We thank you for your understanding and will respond to your request promptly upon our return.' => $core->__('Our office is currently closed for the holiday. While you\'re welcome to submit your ticket, please be aware that our team will review it when we return to the office. We thank you for your understanding and will respond to your request promptly upon our return.'),
            'Date Ranges' => $core->__('Date Ranges'),
            'Date range' => $core->__('Date range'),
            'Portal Notice Content' => $core->__('Portal Notice Content'),
            'Portal notice content' => $core->__('Portal notice content'),
            'Email Notification Content' => $core->__('Email Notification Content'),
            'Email notification content' => $core->__('Email notification content'),
            'Saved reply inserted.' => $core->__('Saved reply inserted.'),
            'System Timezone: %s' => $core->__('System Timezone: %s'),
            'All' => $core->__('All'),
            'All Tags' => $core->__('All Tags'),
            '%d Category' => $core->__('%d Category'),
            '%d Tag' => $core->__('%d Tag'),
            '%d Agent' => $core->__('%d Agent'),
            'Security' => $core->__('Security'),
            'Tags' => $core->__('Tags'),
            'Email Notifications' => $core->__('Email Notifications'),
            'Login Systems' => $core->__('Login Systems'),
            'Login with Google' => $core->__('Login with Google'),
            'Tag' => $core->__('Tag'),
            'Please use this Confirmation URL while Register Google App.' => $core->__('Please use this Confirmation URL while Register Google App.'),
            'Tag:' => $core->__('Tag:'),
            'Select Tag' => $core->__('Select Tag'),
            'Set Tag' => $core->__('Set Tag'),
            'Tags:' => $core->__('Tags:'),
            '%d Tags' => $core->__('%d Tags'),
        ];

        return $texts;
    }

    public static function portal_texts()
    {
        $core = APBDWPSupportLite::GetInstance();

        $texts = [
            'Home' => $core->__('Home'),
            'Tickets' => $core->__('Tickets'),
            'Create Ticket as a Guest' => $core->__('Create Ticket as a Guest'),
            'Login' => $core->__('Login'),
            'Username or Email Address' => $core->__('Username or Email Address'),
            'Username or email address' => $core->__('Username or email address'),
            '%s is required.' => $core->__('%s is required.'),
            'Password' => $core->__('Password'),
            'Remember me.' => $core->__('Remember me.'),
            'Lost your password?' => $core->__('Lost your password?'),
            'Reset Password' => $core->__('Reset Password'),
            'Get New Password' => $core->__('Get New Password'),
            'Don\'t have an account?' => $core->__('Don\'t have an account?'),
            'Register Now' => $core->__('Register Now'),
            'Register' => $core->__('Register'),
            'First Name' => $core->__('First Name'),
            'First name' => $core->__('First name'),
            'Last Name' => $core->__('Last Name'),
            'Last name' => $core->__('Last name'),
            'Email Address' => $core->__('Email Address'),
            'Email address' => $core->__('Email address'),
            'Confirm Password' => $core->__('Confirm Password'),
            'Confirm password' => $core->__('Confirm password'),
            'This field is required.' => $core->__('This field is required.'),
            'Saved Replies' => $core->__('Saved Replies'),
            'Returning User? Login' => $core->__('Returning User? Login'),
            'Category' => $core->__('Category'),
            'Subject' => $core->__('Subject'),
            'Description' => $core->__('Description'),
            'Click or drag file to upload' => $core->__('Click or drag file to upload'),
            'Make this ticket public.' => $core->__('Make this ticket public.'),
            'Create' => $core->__('Create'),
            'Insert %s' => $core->__('Insert %s'),
            'All Tickets' => $core->__('All Tickets'),
            'Sort: Reply Date (Newest First)' => $core->__('Sort: Reply Date (Newest First)'),
            'Sort: Reply Date (Oldest First)' => $core->__('Sort: Reply Date (Oldest First)'),
            'Sort: Opening Date (Newest First)' => $core->__('Sort: Opening Date (Newest First)'),
            'Sort: Opening Date (Oldest First)' => $core->__('Sort: Opening Date (Oldest First)'),
            'Bulk Actions' => $core->__('Bulk Actions'),
            'All Agents' => $core->__('All Agents'),
            'All Categories' => $core->__('All Categories'),
            'Add Ticket' => $core->__('Add Ticket'),
            'Search keyword' => $core->__('Search keyword'),
            'Reset Filters' => $core->__('Reset Filters'),
            'Ticket' => $core->__('Ticket'),
            'Add New %s' => $core->__('Add New %s'),
            'Select Category' => $core->__('Select Category'),
            'Profile' => $core->__('Profile'),
            'Change Password' => $core->__('Change Password'),
            'Logout' => $core->__('Logout'),
            'Title' => $core->__('Title'),
            'Date' => $core->__('Date'),
            'Showing %1$d - %2$d of %3$d' => $core->__('Showing %1$d - %2$d of %3$d'),
            'by %s' => $core->__('by %s'),
            'Replied:' => $core->__('Replied:'),
            '%1$s at %2$s' => $core->__('%1$s at %2$s'),
            'Created:' => $core->__('Created:'),
            'Status' => $core->__('Status'),
            'Ticket Track ID' => $core->__('Ticket Track ID'),
            'Reply Count' => $core->__('Reply Count'),
            'Export Ticket' => $core->__('Export Ticket'),
            'Information' => $core->__('Information'),
            'Category:' => $core->__('Category:'),
            'N/A' => $core->__('N/A'),
            'Status:' => $core->__('Status:'),
            'Reply' => $core->__('Reply'),
            'Ticket Data' => $core->__('Ticket Data'),
            'Additional Data' => $core->__('Additional Data'),
            'Edit %s' => $core->__('Edit %s'),
            'Starter' => $core->__('Starter'),
            'Back to Tickets' => $core->__('Back to Tickets'),
            'Update' => $core->__('Update'),
            'Current Password' => $core->__('Current Password'),
            'Current password' => $core->__('Current password'),
            'New Password' => $core->__('New Password'),
            'New password' => $core->__('New password'),
            'Confirm New Password' => $core->__('Confirm New Password'),
            'Confirm new password' => $core->__('Confirm new password'),
            'Cancel' => $core->__('Cancel'),
            'Content' => $core->__('Content'),
            'Submit Reply' => $core->__('Submit Reply'),
            'Reply and close ticket' => $core->__('Reply and close ticket'),
            'Are you sure want to submit reply and close ticket?' => $core->__('Are you sure want to submit reply and close ticket?'),
            'Yes' => $core->__('Yes'),
            'No' => $core->__('No'),
            'Submit & Close Ticket' => $core->__('Submit & Close Ticket'),
            'Edit' => $core->__('Edit'),
            '%s:' => $core->__('%s:'),
            'Save Changes' => $core->__('Save Changes'),
            '%s is not valid.' => $core->__('%s is not valid.'),
            'My Tickets' => $core->__('My Tickets'),
            'Unassigned' => $core->__('Unassigned'),
            'Trashed' => $core->__('Trashed'),
            'Quick Edit' => $core->__('Quick Edit'),
            'Move to Trash' => $core->__('Move to Trash'),
            'Restore' => $core->__('Restore'),
            'Delete' => $core->__('Delete'),
            'Need Reply' => $core->__('Need Reply'),
            'Agent' => $core->__('Agent'),
            'Apply' => $core->__('Apply'),
            'Trash' => $core->__('Trash'),
            'Are you sure want to move to trash?' => $core->__('Are you sure want to move to trash?'),
            'Are you sure want to delete?' => $core->__('Are you sure want to delete?'),
            'Are you sure want to restore?' => $core->__('Are you sure want to restore?'),
            'Activate' => $core->__('Activate'),
            'Are you sure want to activate?' => $core->__('Are you sure want to activate?'),
            'Deactivate' => $core->__('Deactivate'),
            'Are you sure want to deactivate?' => $core->__('Are you sure want to deactivate?'),
            'Re-open' => $core->__('Re-open'),
            'Are you sure want to re-open?' => $core->__('Are you sure want to re-open?'),
            'Close' => $core->__('Close'),
            'Are you sure want to close?' => $core->__('Are you sure want to close?'),
            'Public' => $core->__('Public'),
            'Are you sure want to make public?' => $core->__('Are you sure want to make public?'),
            'Private' => $core->__('Private'),
            'Are you sure want to make private?' => $core->__('Are you sure want to make private?'),
            'Order Up' => $core->__('Order Up'),
            'Are you sure want to change order?' => $core->__('Are you sure want to change order?'),
            'Order Down' => $core->__('Order Down'),
            'Reset Order' => $core->__('Reset Order'),
            'Are you sure want to reset order?' => $core->__('Are you sure want to reset order?'),
            'Email notification' => $core->__('Email notification'),
            'Are you sure want to enable email notification to customer for this ticket?' => $core->__('Are you sure want to enable email notification to customer for this ticket?'),
            'Email notification to customer for this ticket.' => $core->__('Email notification to customer for this ticket.'),
            'Email notification.' => $core->__('Email notification.'),
            'Copy Hotlink' => $core->__('Copy Hotlink'),
            'Are you sure want to disable email notification to customer for this ticket?' => $core->__('Are you sure want to disable email notification to customer for this ticket?'),
            'Other Tickets (%d)' => $core->__('Other Tickets (%d)'),
            'Agent:' => $core->__('Agent:'),
            'Note' => $core->__('Note'),
            'Ticket Logs (%d)' => $core->__('Ticket Logs (%d)'),
            'Search User' => $core->__('Search User'),
            'Select User' => $core->__('Select User'),
            'Create User' => $core->__('Create User'),
            'Choose User' => $core->__('Choose User'),
            'Ticket User' => $core->__('Ticket User'),
            'Change User' => $core->__('Change User'),
            'Send the new user an email about their account.' => $core->__('Send the new user an email about their account.'),
            'Back' => $core->__('Back'),
            'User' => $core->__('User'),
            'Add Internal Note' => $core->__('Add Internal Note'),
            'Saved reply inserted.' => $core->__('Saved reply inserted.'),
            'Active' => $core->__('Active'),
            'Inactive' => $core->__('Inactive'),
            'Closed' => $core->__('Closed'),
            'All' => $core->__('All'),
            'All Tags' => $core->__('All Tags'),
            '%d Categor' => $core->__('%d Categor'),
            '%d Tag' => $core->__('%d Tag'),
            '%d Agent' => $core->__('%d Agent'),
            'Tags:' => $core->__('Tags:'),
            'Tag:' => $core->__('Tag:'),
            'Select Status' => $core->__('Select Status'),
            'Select Agent' => $core->__('Select Agent'),
            'Select Tag' => $core->__('Select Tag'),
            'Assign Agent' => $core->__('Assign Agent'),
            'Set Category' => $core->__('Set Category'),
            'Set Tag' => $core->__('Set Tag'),
            'Set Status' => $core->__('Set Status'),
            'Tag' => $core->__('Tag'),
            'Login with Google' => $core->__('Login with Google'),
            'Login with Envato' => $core->__('Login with Envato'),
            'or' => $core->__('or'),
            'Register with Google' => $core->__('Register with Google'),
            'Register with Envato' => $core->__('Register with Envato'),
        ];

        return $texts;
    }
}
