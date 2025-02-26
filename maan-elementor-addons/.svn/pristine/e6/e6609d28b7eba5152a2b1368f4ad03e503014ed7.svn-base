<?php
/**
 * Plugin Name: Maan Elementor Addons
 * Plugin URI: https://maanelementoraddons.com
 * Description: The elementor addons which is really useful.
 * Author: maantheme
 * Author URI: https://maantheme.com
 * Version: 1.0.1
 * Text Domain: maan-elementor-addons
 * Domain Path: languages
 *
 * Maan Elementor Addons is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Maan Elementor Addons is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Maan Elementor Addons. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package maanelementoraddons
 * @category Core
 * @author Maan Elementor Addons
 * @version 1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */
final class Maan_Elementor_Addons {

    /**
     * Plugin version
     *
     * @var string
     */
    const version = '1.0';

    /**
     * Class construcotr
     */
    private function __construct() {
        $this->define_constants();

        register_activation_hook( __FILE__, [ $this, 'activate' ] );

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Initializes a singleton instance
     *
     * @return \Maan_Elementor_Addons
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants() {
        define( 'MAAN_ELEMENTOR_ADDONS_VERSION', self::version );
        define( 'MAAN_ELEMENTOR_ADDONS_FILE', __FILE__ );
        define( 'MAAN_ELEMENTOR_ADDONS_PATH', __DIR__ );
        define( 'MAAN_ELEMENTOR_ADDONS_DIR', dirname(MAAN_ELEMENTOR_ADDONS_FILE).'/' );
        define( 'MAAN_ELEMENTOR_ADDONS_ELEMENTOR_DIR', dirname(MAAN_ELEMENTOR_ADDONS_FILE).'/elementor/' );
        define( 'MAAN_ELEMENTOR_ADDONS_URL', plugins_url( '', MAAN_ELEMENTOR_ADDONS_FILE ) );
        define( 'MAAN_ELEMENTOR_ADDONS_ASSETS', MAAN_ELEMENTOR_ADDONS_URL . '/assets/' );
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin() {
        if ( is_admin() ) {
            new Maantheme\Addons\Admin();
        } else {
            new Maantheme\Addons\Frontend();
        }

        new Maantheme\Addons\Elementor\Init();

    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate() {
        $installer = new Maantheme\Addons\Installer();
        $installer->run();
    }
}

/**
 * Initializes the main plugin
 *
 * @return \Maan_Elementor_Addons
 */
function maan_elementor_addons() {
    return Maan_Elementor_Addons::init();
}

// kick-off the plugin
maan_elementor_addons();