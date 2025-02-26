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
 * This service provides access to standard WP interactions.
 */
class WpHelperService
{

    const ROLE_USER_ADMINISTRATOR = 'administrator';

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
        $this->wpUser = \wp_get_current_user();
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

}