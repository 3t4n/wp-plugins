<?php

spl_autoload_register(function ($class) {
    $classPath = strtr($class, '\\', DIRECTORY_SEPARATOR);
    $fullClassPath = __DIR__ . DIRECTORY_SEPARATOR . $classPath . '.php';

    if (file_exists($fullClassPath)) {
        include_once $fullClassPath;
    }
});
