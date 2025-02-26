<?php

/**
 *    __  _____   ___   __          __
 *   / / / /   | <  /  / /   ____ _/ /_  _____
 *  / / / / /| | / /  / /   / __ `/ __ `/ ___/
 * / /_/ / ___ |/ /  / /___/ /_/ / /_/ (__  )
 * `____/_/  |_/_/  /_____/`__,_/_.___/____/
 *
 * @package FireDI
 * @author UA1 Labs Developers https://ua1.us
 * @copyright Copyright (c) UA1 Labs
 */

namespace UA1Labs\Fire;

use \Exception;
use \Psr\Container\ContainerExceptionInterface;

/**
 * Exception thrown from the FireDI library.
 */
class DiException extends Exception implements ContainerExceptionInterface
{

    const ERROR_CLASS_NOT_FOUND = 'Class "%s" does not exist and it definition cannot be registered with FireDI.';
    const ERROR_CIRCULAR_DEPENDENCY = 'While trying to resolve class "%s", FireDI found that there was a cirular dependency caused by the class "%s".';

}
