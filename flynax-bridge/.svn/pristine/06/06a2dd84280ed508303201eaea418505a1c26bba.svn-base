<?php

namespace Flynax\Plugins\FlynaxBridge;

/**
 * Class Events
 *
 * @since 2.0.0
 *
 * @package Flynax\Plugins\FlynaxBridge
 */
class Events
{
    /**
     * Fire right after generating WordPress bridge token
     *
     * @param string $token - Token which was generated
     * @return bool         - Toking saving result
     */
    public function afterTokenGenerate($token)
    {
        return $token ? update_option('flb_wp_token', $token) : false;
    }

    /**
     * Fire before FlynaxBridge plugin uninstalling
     */
    public function beforePluginUninstall()
    {
        delete_option('flb_flynax_listings');

        Request::get('flynax-bridge-uninstall', [], true);
    }

    /**
     * Calling static magic method
     *
     * @param string $name - Calling method
     * @param mixed  $arguments - Arguments which are you passing to the static method
     */
    public static function __callStatic($name, $arguments)
    {
        $self = new self();
        if (method_exists($self, $name)) {
            call_user_func(array($self, $name), $arguments);
        }
    }
}
