<?php
/**
 * @package AtlScrollTop
 */
/*
Plugin Name: Atelier Scroll Top
Plugin URI: https://bitbucket.org/maniek0borsuk88/atelier-scroll-top
Description: Atelier Scroll Top plugin allows to easily and fast scroll back to the top of the page,
	with fully customizable options, images,icons and styles .
Version: 1.3
Author: Mariusz Borkowski
Author URI: https://atelierweb.pl
License: GPLv2 or later
Text Domain: atl-scroll-top
Domain Path: /languages/
*/

use atlScrollTop\Init;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/* Define */
define( 'ATL_AST_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define('ATL_AST_PLUGIN_NAME', plugin_basename(__FILE__));

if(file(dirname(__FILE__) . '/vendor/autoload.php')):
	require_once dirname(__FILE__) . '/vendor/autoload.php';
endif;

$init = new Init();



