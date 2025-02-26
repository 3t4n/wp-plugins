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

namespace UA1Labs\Fire\Studio;

class WpPluginHelper
{

    const ROLE_USER_ADMINISTRATOR = 'administrator';

    /**
     * The base url of the firestudio plubin.
     * 
     * @var string
     */
    private $pluginBaseUrl;

    /**
     * The current WP user.
     * 
     * @var \WP_User
     */
    private $wpUser;

    /**
     * The class constructor.
     */
    public function __construct()
    {
        $this->pluginBaseUrl = \ua1_firestudio_get_base_url();
        $this->wpUser = \wp_get_current_user();
        $this->cookie = $_COOKIE;
    }

    /**
     * Returns the base url of the firestudio plugin.
     * 
     * @return boolean
     */
    public function getFirestudioBaseUrl()
    {
        return $this->pluginBaseUrl;
    }

    /**
     * Determines if the current user is an admin user.
     * 
     * @return boolean
     */
    public function isAdminUser()
    {
        return isset($this->wpUser->roles) 
            && is_array($this->wpUser->roles) 
            && in_array(self::ROLE_USER_ADMINISTRATOR, $this->wpUser->roles);
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