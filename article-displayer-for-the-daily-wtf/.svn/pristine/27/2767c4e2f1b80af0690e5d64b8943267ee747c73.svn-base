<?php

/*
Plugin Name: TDWTF Article Plugin
Plugin URI: http://www.spokanewp.com
Description: A plugin to display a description and link to the most recent TDWTF article.
Version: 1.0
Author: Ethan Federman
Author URI: http://www.spokanewp.com
License: GPL2
*/

define( 'WDWTF_PLUGIN_ABSOLUTE_PATH', dirname(__FILE__) );
define( 'TDWTF_PLUGIN_DIR', plugin_dir_url(__FILE__) . '/' );

require_once("src/TDWTFPlugin/Article.php");
require_once("src/TDWTFPlugin/Author.php");
require_once("src/TDWTFPlugin/Controller.php");

$controller = new \TDWTFPlugin\Controller();

//register_activation_hook( __FILE__, array( $controller, 'init' ) );

$controller->init();

if(is_admin())
{
	$controller->initAdmin();
}