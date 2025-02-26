<?php
/*
  Plugin Name: AP Twig Bridge
  Version: 1.0
  Plugin URI: http://artprima.cz/
  Description: Makes it possible to create templates for Wordpress using Twig template engine
  Author: Denis Voytyuk
  Author URI: http://artprima.cz/
 */
require_once __DIR__.'/lib/ClassLoader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$apTwigBridgeLoader = new UniversalClassLoader();

$apTwigBridgeLoader->registerPrefixes(array(
            'Twig_Extensions_' => __DIR__.'/lib/Twig/lib/Twig/Twig-extensions',
            'Twig_'            => __DIR__.'/lib/Twig/lib',
            'APBridge_'        => __DIR__.'/lib'
));
$apTwigBridgeLoader->register();

$apTwigBridge = new APBridge_Main();

add_action('init', array(&$apTwigBridge, 'init'));
