<?php

namespace FlamixLocal\Exchange\Settings;

use FlamixLocal\Exchange\Woo\Categories;
use FlamixLocal\Exchange\Woo\Products;

class Setting
{
    public static function init()
    {
        self::registerMenu();
        self::registerExternalID();
    }

    public static function registerMenu()
    {
        add_action('admin_menu', [__NAMESPACE__ . '\Setting', 'add_menu']); //Register menu
        add_filter('plugin_action_links_' . FLAMIX_EXCHANGE_PLUGIN_CODE . '/' . FLAMIX_EXCHANGE_PLUGIN_CODE . '.php', [__NAMESPACE__ . '\Setting', 'add_link_to_plugin_widget']); //Add extra link to plugin page
    }

    /**
     * Register our External ID to show when edit
     *
     * @return void
     */
    public static function registerExternalID()
    {
        Categories::editExternalID();
        Products::editExternalID();
    }

    /**
     * Get Plugin UNIQ Name to Setting
     *
     * @return string
     */
    public static function getPluginName()
    {
        return strtolower(str_replace('\\', '_', __NAMESPACE__));
    }

    /**
     * Get Full Options Name
     *
     * @param $name
     * @return string
     */
    public static function getOptionName($name)
    {
        return self::getPluginName() . '_' . $name;
    }

    /**
     * Get Options VALUE by Name
     *
     * @param string $name Option name
     * @param bool|int|string|null $default Default options value
     * @return mixed|void
     */
    public static function getOption(string $name, $default = false)
    {
        return get_option(self::getOptionName($name), $default);
    }

    /**
     * Register Setting Page in Menu
     */
    public static function add_menu()
    {
        add_menu_page(__('Flamix: Bitrix24 and WooCommerce Products Sync', FLAMIX_EXCHANGE_PLUGIN_CODE), __('B24 Products Sync', FLAMIX_EXCHANGE_PLUGIN_CODE), 'administrator', __FILE__, [__NAMESPACE__ . '\Setting', 'include_setting_page'], 'dashicons-update', '55.1000');
        add_action('admin_init', [__NAMESPACE__ . '\Setting', 'register_options']);
    }

    /**
     * Register options
     */
    public static function register_options()
    {
        register_setting(self::getOptionName('group'), self::getOptionName('lead_domain'), ['\Flamix\Plugin\General\Helpers', 'parseDomain']);
        register_setting(self::getOptionName('group'), self::getOptionName('lead_api'));
        register_setting(self::getOptionName('group'), self::getOptionName('product_find_by'));
    }

    /**
     * Include page
     */
    public static function include_setting_page()
    {
        include_once FLAMIX_EXCHANGE_PLUGIN_DIR . '/resources/views/index.php';
    }

    /**
     * Add link to Setting Page and Install Module Landing
     * @param $links
     * @return mixed
     */
    public static function add_link_to_plugin_widget($links)
    {
        $url = esc_url(add_query_arg(
            'page',
            FLAMIX_EXCHANGE_PLUGIN_CODE . '/includes/local/Settings/Setting.php',
            get_admin_url() . 'options-general.php'
        ));

        $settings_link = '<a href="' . $url . '">' . __('Settings', FLAMIX_EXCHANGE_PLUGIN_CODE) . '</a>';
        $plugin_link = '<a target="_blank" href="https://flamix.solutions/bitrix24/warehouse/sync_products.php">' . __('Bitrix24 Plugin', FLAMIX_EXCHANGE_PLUGIN_CODE) . '</a>';

        array_push($links, $settings_link, $plugin_link);

        return $links;
    }
}