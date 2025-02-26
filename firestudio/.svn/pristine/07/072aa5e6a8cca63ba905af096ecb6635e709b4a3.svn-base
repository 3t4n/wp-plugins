<?php

/**
 *    __  _____   ___   __          __
 *   / / / /   | <  /  / /   ____ _/ /_  _____
 *  / / / / /| | / /  / /   / __ `/ __ `/ ___/
 * / /_/ / ___ |/ /  / /___/ /_/ / /_/ (__  )
 * `____/_/  |_/_/  /_____/`__,_/_.___/____/
 *
 * @package FireStudio
 * @author UA1 Labs Developers https://ua1.us
 * @copyright Copyright (c) UA1 Labs
 */

namespace UA1Labs\Fire\Studio\Service;

/**
 * This service provides a way to export configurations from the PHP side
 * to the javascript side.
 */
class JsConfigService
{

    /**
     * Contains the config that will eventually make
     * it to the html as a js object.
     *
     * @var object
     */
    private $config;

    /**
     * The class constructor.
     */
    public function __construct()
    {
        $this->config = (object) [];
    }

    /**
     * Adds a new $key to the config object and set the $value.
     *
     * @param string $key The key you want to store the value at
     * @param mixed $value The value of the config key
     */
    public function addConfig($key, $value)
    {
        $this->config->{$key} = $value;
    }

    /**
     * returns the config object.
     *
     * @return object
     */
    public function getConfig()
    {
        return $this->config;
    }

}