<?php

namespace Flynax\Plugins\FlynaxBridge;

/**
 * Class FlynaxBridge - Main plugin class
 *
 * @since 2.0.0
 *
 * @package Flynax\Plugins\FlynaxBridge
 */
class FlynaxBridge
{
    /**
     * Plugin key for the lang sections
     */
    const PLUGIN_KEY = 'fl_bridge';

    /**
     * Run plugin
     */
    public function run()
    {
        load_theme_textdomain(self::PLUGIN_KEY, FLYNAX_BRIDGE_PLUGIN_DIR . 'lang');

        $this->registerHooks();

        register_uninstall_hook(FLYNAX_BRIDGE_PLUGIN_DIR . 'flynax-bridge.php', [FlynaxBridge::class, 'uninstall']);
        register_deactivation_hook(FLYNAX_BRIDGE_PLUGIN_DIR . 'flynax-bridge.php', [FlynaxBridge::class, 'uninstall']);
    }

    /**
     * Plugin uninstall
     *
     * @since 2.2.0 - Method changed to static
     */
    public static function uninstall()
    {
        (new Events)->beforePluginUninstall();

        delete_option('flb_wp_token');
        delete_option('flb_fl_token');
        delete_option('flb_fl_url');
        delete_option('flb_flynax_listings');
        delete_option(Widgets::OPTION_WIDGET_KEY);
    }

    /**
     * Register all hooks of the plugin
     */
    public function registerHooks()
    {
        $pluginHooks = new Hooks();
        $pluginHooks->register();
    }

    /**
     * Register all widgets of the plugin
     */
    public function registerWidgets()
    {
        $pluginWidgets = new Widgets();
        $pluginWidgets->register();
    }
}
