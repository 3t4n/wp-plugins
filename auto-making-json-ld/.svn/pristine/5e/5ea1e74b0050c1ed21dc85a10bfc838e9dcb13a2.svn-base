<?php

if (!defined('ABSPATH')) exit;

spl_autoload_register(function ($className){

    // set namespace
    $prefix = 'amJL_class\\';

    // check existence
    $baseDir = autoMakingJSONLD . 'amJL_class/';
    $len = strlen($prefix);
    if (strncmp($prefix, $className, $len) !== 0) return;

    // get file path from class name
    $relativerClass = substr($className, $len);
    $file = $baseDir . str_replace('\\', '/', $relativerClass) . '.php';

    // read file
    if(file_exists($file))  require_once($file);
    
});