<?php
/**
 *  Plugin Name: DWQA Migration
 *  Description: Migration your bbpress to DW question and answer
 *  Author: Designwall
 *  Author URI: #
 *  Author Email: #
 *  Version: 1.0.1
 *  Text Domain: cdwqa
 */

namespace CDWQA;


// If this file is called directly, abort.
if (!defined('WPINC')) {
    die();
}

// use CDWQA\Includes\Integration;
use CDWQA\Includes\Main;
use CDWQA\Includes\Migration;

define('CDWQA_SLUG', 'cdwqa');
define('CDWQA_PREFIX', 'cdwqa_');
define('CDWQA_ROOT_FILE', __FILE__);
define('CDWQA_DIR', trailingslashit(plugin_dir_path(CDWQA_ROOT_FILE)) );
define('CDWQA_URI', trailingslashit(plugin_dir_url(CDWQA_ROOT_FILE)) );

// Let's do this!
spl_autoload_register(__NAMESPACE__ . '\\autoload');
add_action('plugins_loaded', array(CDWQA::getInstance(), 'init'));

class CDWQA {
	private static $instance = null;
	
	public function init() {
        // Integration::getInstance();
        Main::getInstance();
        // Migration::getInstance();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}


function autoload($class = '') {
    if (!strstr($class, 'CDWQA')) {
        return;
    }
    $result = str_replace('CDWQA\\', '', $class);
    $result = str_replace('\\', '/', $result);
    if( file_exists(CDWQA_DIR . $result . '.php') ){
    	require_once CDWQA_DIR . $result . '.php';
    }
    
}