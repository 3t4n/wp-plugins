<?php

namespace Flynax\Plugins\FlynaxBridge;

use Flynax\Plugins\FlynaxBridge\Widgets\FeaturedListings;

/**
 * Class is registering all widgets of the plugin
 *
 * @since 2.0.0
 *
 * @package Flynax\Plugins\FlynaxBridge
 */
class Widgets
{
    /**
     * Key of widget
     * @since 2.2.0
     */
    const WIDGET_KEY = FlynaxBridge::PLUGIN_KEY . '_featured_listings';

    /**
     * Option key of widget
     * @since 2.2.0
     */
    const OPTION_WIDGET_KEY = 'widget_' . self::WIDGET_KEY;

    /**
     * Register all widgets
     */
    public function register()
    {
        $widgets = array(
            FeaturedListings::class,
        );

        foreach ($widgets as $widget) {
            register_widget(new $widget());
        }
    }

    /**
     * Get all registered widgets options
     *
     * @return array
     */
    public static function getFlWidgetsOptions()
    {
        return get_option(self::OPTION_WIDGET_KEY) ? (array) get_option(self::OPTION_WIDGET_KEY) : [];
    }
}
