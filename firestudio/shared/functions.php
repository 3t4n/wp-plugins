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

/**
 * Obtains the service location singleton instance and returns it.
 *
 * @return \UA1Labs\Fire\Studio\Injector
 */
function firestudio_injector()
{
    $injector = \UA1Labs\Fire\Studio\Injector::instance();
    return $injector;
}

/**
 * Gives you access to the main firestudio object.
 *
 * @return \UA1Labs\Fire\Studio
 */
function firestudio()
{
    return firestudio_injector()->get(\UA1Labs\Fire\Studio::class);
}