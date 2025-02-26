<?php

/**
 * Plugin Name: Flynax Bridge
 * Description: Flynax Bridge
 * Version: 2.2.0
 * Author: Flynax Software
 */

use Flynax\Plugins\FlynaxBridge\FlynaxBridge;

require_once 'vendor/autoload.php';

define('FLYNAX_BRIDGE_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('FLYNAX_BRIDGE_PLUGIN_URL', plugin_dir_url(__FILE__));
define('FLYNAX_BRIDGE_PLUGIN_VERSION', '2.2.0');

$plugin = new FlynaxBridge();
$plugin->run();
