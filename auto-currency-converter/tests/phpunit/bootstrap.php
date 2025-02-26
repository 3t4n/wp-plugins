<?php

$basePath = realpath(dirname(dirname(__DIR__)));
$autoload = $basePath . "/vendor/autoload.php";

if (!file_exists($autoload)) {
    die(<<<MSG
 Please run "composer install" to install dependencies and create autoload file.

MSG
    );
}

$loader = require $autoload;
$loader->addPsr4('Fixture\\', 'tests/Fixture');
