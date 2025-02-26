<?php

namespace Flynax\Plugins\FlynaxBridge;

/**
 * Class Cache
 *
 * @since 2.0.0
 *
 * @package Flynax\Plugins\FlynaxBridge
 */
class Cache
{
    /**
     * Update Flynax listings widget
     */
    public static function updateFlListings()
    {
        $widgets  = Widgets::getFlWidgetsOptions();
        $listings = array();

        foreach ($widgets as $key => $widget) {
            if ($key == '_multiwidget') {
                continue;
            }

            $widgetOptions = [
                'type' => $widget['l_type'],
                'count' => (int) $widget['l_count'],
            ];

            switch ($widget['l_mode']) {
                case 'recently_added':
                    $result = Request::get(
                        '/listings/recent',
                        array(
                            'limit' => $widgetOptions['count'],
                            'l_type' => $widgetOptions['type'],
                        )
                    );
                    break;
                case 'featured':
                    $result = Request::get(
                        '/listings/featured',
                        array(
                            'limit' => $widgetOptions['count'],
                            'l_type' => $widgetOptions['type'],
                        )
                    );
                    break;
            }

            if (is_array($result)) {
                $response = json_decode($result['body'], true);
                $listings[$key] = $response['data'];
            }
        }

        update_option('flb_flynax_listings', $listings ?: '');
    }

    /**
     * Get listings of the flynax for widget
     *
     * @return mixed - Listings from Flynax
     */
    public static function getFlListings($widgetNumber = 0)
    {
        if (!get_option('flb_flynax_listings')) {
            self::updateFlListings();
        }

        $cachedWidgets = (array) get_option('flb_flynax_listings');

        return $widgetNumber && $cachedWidgets && isset($cachedWidgets[$widgetNumber])
            ? $cachedWidgets[$widgetNumber]
            : reset($cachedWidgets);
    }
}
