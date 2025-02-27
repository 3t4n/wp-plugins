<?php

/**
 * Helper.
 */

defined('ABSPATH') || exit;

include_once "secondary_helper.php";

if (!function_exists('oldDataArrayMerge')) {
    function oldDataArrayMerge($arr1, &$newArray)
    {
        if (!is_array($arr1)) {
            if (!method_exists($arr1, "getPropertiesArray")) {
                return;
            }
            $arr1 = $arr1->getPropertiesArray();
        }
        $except = ['id'];
        foreach ($arr1 as $key => $val) {
            if (in_array($key, $except)) {
                continue;
            }
            if (!isset($newArray['old_' . $key])) {
                $newArray['old_' . $key] = $val;
            }
        }
    }
}
if (!function_exists("SUPPORT_GENIX_initialize")) {
    function SUPPORT_GENIX_initialize()
    {
        $coreObject = APBDWPSupportLite::GetInstance();

        $coreObject->setIsLicenseActive(false);
        $coreObject->setIsModuleLoaded(true);

        $coreObject->AddAppGlobalVar("yesText", "Yes");
        $coreObject->AddAppGlobalVar("noText", "No");
        $coreObject->AddAppGlobalVar("okText", "Ok");
        $coreObject->AddAppGlobalVar("Loading", "Loading");
        $coreObject->AddAppGlobalVar("bs_noneResultsText", "No Results matched {0}");
        $coreObject->AddAppGlobalVar("bs_noneSelectedText", "Nothing selected");
        $coreObject->AddAppGlobalVar("bs_seaching", "Searching..");
        $coreObject->_set_action_prefix = $coreObject->pluginBaseName;

        add_action('admin_post_apbd_wps_license_info', function () {
            $apiResponse = new Apbd_WPS_API_Response();
            $apiResponse->SetResponse(true, "", [
                'data' => [
                    "is_valid" => true,
                    "expire_date" => "No expiry",
                    "support_end" => "Unlimited",
                    "license_title" => "Support Genix Lite",
                    "license_key" => "XXXXXXXX-XXXXXXXX-XXXXXXXX-XXXXXXXX",
                    "msg" => "License successfully verified!",
                    "renew_link" => "",
                    "expire_renew_link" => "",
                    "support_renew_link" => "",
                ],
                'active' => true,
            ]);

            echo wp_json_encode($apiResponse);
        });

        if (!$coreObject->isModuleLoaded()) {
        }

        $coreObject->initialize();
    }
}
if (! function_exists("wp_kses_html")) {
    function wp_kses_html($html)
    {
        $allowedposttags = wp_kses_allowed_html('post');
        $allowed_atts = array('align' => true, 'class' => true, 'type' => true, 'id' => true, 'dir' => true, 'lang' => true, 'style' => true, 'xml:lang' => true, 'src' => true, 'alt' => true, 'href' => true, 'rel' => true, 'rev' => true, 'target' => true, 'novalidate' => true, 'value' => true, 'name' => true, 'tabindex' => true, 'action' => true, 'method' => true, 'for' => true, 'width' => true, 'height' => true, 'data-*' => true, 'selected' => true, "checked" => true, 'title' => true,);
        $allowedTags = ['address', 'a', 'abbr', 'acronym', 'area', 'article', 'aside', 'audio', 'b', 'bdo', 'big', 'blockquote', 'br', 'button', 'caption', 'cite', 'code', 'col', 'colgroup', 'del', 'dd', 'dfn', 'details', 'div', 'dl', 'dt', 'em', 'fieldset', 'section', 'figure', 'figcaption', 'font', 'footer', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'header', 'hgroup', 'hr', 'i', 'img', 'ins', 'kbd', 'label', 'legend', 'li', 'main', 'map', 'mark', 'menu', 'nav', 'p', 'pre', 'q', 's', 'samp', 'span', 'section', 'small', 'strike', 'strong', 'sub', 'summary', 'sup', 'table', 'tbody', 'td', 'textarea', 'tfoot', 'th', 'thead', 'title', 'tr', 'track', 'tt', 'u', 'ul', 'ol', 'var', 'video', 'form', 'input', 'iframe', 'script', 'style', 'option', 'select'];
        foreach ($allowedTags as $tag) {
            $allowedposttags[$tag] = $allowed_atts;
        }
        return wp_kses($html, $allowedposttags);
    }
}
if (! function_exists('app_sanitize_object')) {

    function app_sanitize_object($var)
    {
        if (is_array($var)) {
            return array_map('app_sanitize_object', $var);
        } else {
            return is_scalar($var) ? sanitize_text_field($var) : $var;
        }
    }
}
if (!function_exists("SUPPORT_GENIX_AdminMenu")) {
    /**
     * @param AppsBDKarnelSupportGenixLite s$coreObjec
     */
    function SUPPORT_GENIX_AdminMenu()
    {
        if (!Apbd_wps_settings::isAgentLoggedIn()) {
            return;
        }

        $coreObject = APBDWPSupportLite::GetInstance();
        $menu_label = $coreObject->menuTitle;
        $capability = 'read';

        $userObj = wp_get_current_user();
        $isAdminUser = current_user_can('manage_options') || in_array('administrator', $userObj->roles);
        $pricingUrl = 'https://supportgenix.com/pricing/?utm_source=admin&utm_medium=mainmenu&utm_campaign=free';

        add_menu_page(
            $coreObject->pluginName,
            $menu_label,
            $capability,
            $coreObject->pluginBaseName,
            [$coreObject, 'OptionFormBase'],
            $coreObject->mainMenuIconClass,
            2.00001
        );

        if ($isAdminUser) {
            add_submenu_page(
                $coreObject->pluginBaseName,
                $coreObject->__('Tickets'),
                $coreObject->__('Tickets'),
                $capability,
                $coreObject->pluginBaseName . '#/tickets',
                [$coreObject, 'OptionFormBase']
            );

            add_submenu_page(
                $coreObject->pluginBaseName,
                $coreObject->__('Settings'),
                $coreObject->__('Settings'),
                $capability,
                $coreObject->pluginBaseName . '#/settings',
                [$coreObject, 'OptionFormBase']
            );

            add_submenu_page(
                $coreObject->pluginBaseName,
                $coreObject->__('Upgrade to Pro'),
                $coreObject->__('Upgrade to Pro'),
                $capability,
                $pricingUrl
            );
        }

        foreach ($coreObject->moduleList as $moduleObject) {
            $moduleObject->AdminSubMenu();
        }
    }
}
if (!function_exists("SUPPORT_GENIX_AdminHead")) {
    /**
     * @param AppsBDKarnelSupportGenixLite s$coreObjec
     */
    function SUPPORT_GENIX_AdminHead()
    {
        if (!Apbd_wps_settings::isAgentLoggedIn()) {
            return;
        }

        global $submenu;

        if (is_array($submenu) && !empty($submenu)) {
            foreach ($submenu as $key => $items) {
                if (('support-genix' !== $key) || !is_array($items) || empty($items)) {
                    continue;
                }

                $new__items = [];

                foreach ($items as $item) {
                    $slug = isset($item[2]) ? $item[2] : '';

                    if (empty($slug) || ('support-genix' === $slug)) {
                        continue;
                    }

                    if (0 === strpos($slug, 'https://supportgenix.com/pricing/')) {
                        if (isset($item[4])) {
                            $item[4] .= ' support-genix-upgrade-pro';
                        } else {
                            $item[] = 'support-genix-upgrade-pro';
                        }
                    }

                    $new__items[] = $item;
                }

                $submenu[$key] = $new__items;
            }
        }
    }
}
/* end hidden field*/