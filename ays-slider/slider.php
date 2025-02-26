<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class AYS{
    protected $version = '1.0.0';
    protected $plugin_name = 'AYSSlider';
    protected $prefix = 'ays';
    protected static $instance = null;

	private function __construct() {
        $this->setup_constants();
    }
    public function setup_constants() {
        if (!defined('AYS_DIR')) {
            define('AYS_DIR', dirname(__FILE__));
        }
        if(!defined('ABSPATH')){
          define( 'ABSPATH', dirname(__FILE__) . '/' );
        }
        if (!defined('AYS_PREFIX')) {
            define('AYS_PREFIX', $this->prefix);
        }
        if (!defined('AYS_NAME')) {
            define('AYS_NAME', $this->plugin_name);
        }
        if (!defined('AYS_URL')) {
            define('AYS_URL', plugins_url(plugin_basename(dirname(__FILE__))));
        }
        if (!defined('AYS_VERSION')) {
            define('AYS_VERSION', plugins_url($this->version));
        }
    }
	public static function get_instance() {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}
