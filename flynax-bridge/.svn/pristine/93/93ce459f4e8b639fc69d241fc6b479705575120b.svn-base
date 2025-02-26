<?php

namespace Flynax\Plugins\FlynaxBridge\Traits;

/**
 * Trait SingletonTrait
 *
 * @since  2.0.0
 *
 * @package Flynax\Plugins\FlynaxBridge\Traits
 */
trait SingletonTrait
{
    /**
     * Store the singleton object.
     */
    private static $singleton = false;

    /**
     * Create an inaccessible contructor.
     */
    private function __construct()
    {
        $this->__instance();
    }

    /**
     * Fetch an instance of the class.
     */
    public static function getInstance()
    {
        if (self::$singleton === false) {
            self::$singleton = new self();
        }

        return self::$singleton;
    }
}
