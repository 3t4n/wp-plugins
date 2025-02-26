<?php

namespace Flynax\Plugins\FlynaxBridge;

/**
 * Plugin views worker
 *
 * @since 2.0.0
 *
 * @package Flynax\Plugins\FlynaxBridge
 */
class View
{
    /**
     * Display view file and send parameters
     *
     * @param string $viewName   - View file name which is located in the 'Views' folder
     * @param array  $parameters - Parameters, which you want to send to the view
     *
     * @return bool - False if something went wrong
     */
    public static function display($viewName, $parameters)
    {
        $viewPath = FLYNAX_BRIDGE_PLUGIN_DIR . 'view/' . $viewName;
        if (!file_exists($viewPath)) {
            return false;
        }

        extract($parameters, EXTR_SKIP);

        require $viewPath;
    }
}
