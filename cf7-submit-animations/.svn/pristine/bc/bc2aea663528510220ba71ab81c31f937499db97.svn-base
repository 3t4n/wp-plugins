<?php

/**
 * @package CF7SubmitAnimations
 */

namespace Cf7subanimsinc;

final class Init
{
    /**
     * Store all the calsses inside an array 
     * @return array Full list of classes
     */
    public static function get_services()
    {
        return [
            Base\PluginSettingsLink::class,
            Pages\Dashboard::class,
            Base\Enqueue::class,
            Base\SetCookies::class,

        ];
    }
    /**
     * Loop through the classes, initialize them,
     * and call the register() method if it exists
     * @return 
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    /**
     * Initialize the class 
     * @param class $class      class from the service array
     * @return class instance   new intance of the class
     */

    private static function instantiate($class)
    {
        $service = new $class();
        return $service;
    }
}
