<?php

/**
 ***** DO NOT CALL ANY FUNCTIONS DIRECTLY FROM THIS FILE ******
 *
 * This file will be loaded even before the framework is loaded
 * so the $app is not available here, only declare functions here.
 */


is_readable(__DIR__.'/globals_dev.php') && include 'globals_dev.php';

if (!function_exists('ExactLink')) {
    function ExactLink($module = null) {
        return \ExactLinks\App\App::getInstance($module);
    }
}
