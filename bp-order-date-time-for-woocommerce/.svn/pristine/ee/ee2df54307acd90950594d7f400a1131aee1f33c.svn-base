<?php
/**
 * @package BP Delivery For Woocommerce
 */

namespace Bright_Delivery_for_Woocommerce\Base;

use Bright_Delivery_for_Woocommerce\Bootstrap;

class BaseController {

    public static $PLUGIN_URL = '';
    public static $PLUGIN_PATH = '';
    public static $PLUGIN_FULL_NAME = '';
    public static $PLUGIN_TEMPLATES = '';

    public function __construct() {

        self::$PLUGIN_URL       = plugin_dir_url( dirname( __FILE__, 2 ) );
        self::$PLUGIN_PATH      = plugin_dir_path( dirname( __FILE__, 2 ) );
        self::$PLUGIN_TEMPLATES = self::$PLUGIN_PATH . 'templates/';
        self::$PLUGIN_FULL_NAME = str_replace( 'src', Bootstrap::FILE_MAIN_WITH_EXTENSION, plugin_basename( dirname( __FILE__, 2 ) ) );
    }
}
