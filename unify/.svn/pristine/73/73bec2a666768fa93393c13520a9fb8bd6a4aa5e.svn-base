<?php

/**
 * @author CodeClouds <sales@codeclouds.com>
 * @final
 * @package _Self
 */

require_once __DIR__ . "/class-loader/Stack.php";

spl_autoload_register(function ($class) {
    $file_path = _Self\ClassLoader\Stack::run($class);

    if ($file_path !== null && is_string($file_path) && file_exists($file_path)) {
        require_once $file_path;
    }
});
