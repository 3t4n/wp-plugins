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
 * This service provides a way to interact with cookies.
 */
class Cookie
{

    /**
     * The $_COOKIE global object
     *
     * @var array
     */
    private $cookie;

    /**
     * The class constructor.
     */
    public function __construct()
    {
        $this->cookie = $_COOKIE;
    }

    /**
     * Returns the string value of the cookie by $name.
     *
     * @return string
     */
    public function getCookieValue($name)
    {
        return isset($this->cookie[$name]) ? $this->cookie[$name] : '';
    }

}