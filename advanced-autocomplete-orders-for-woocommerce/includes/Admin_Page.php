<?php
/**
 * Admin_Page Class
 *
 * @category Admin_Page
 * @package  Optemiz\AWO
 * @author   Nazrul Islam Nayan <nazrulislamnayan7@gmail.com>
 * @license  GPL3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @since    1.0.0
 */

namespace Optemiz\AWO;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Admin_Page class
 *
 * @class Admin_Page The class that manages all about Admin Page.
 *
 * @category Admin_Page
 * @package  Optemiz\AWO
 * @author   Nazrul Islam Nayan <nazrulislamnayan7@gmail.com>
 * @license  GPL3 https://www.gnu.org/licenses/gpl-3.0.en.html
 */
class Admin_Page extends \Optemiz\Dashboard\Settings {

    /**
     * Class constructor
     *
     * Sets up all the appropriate hooks and functions
     * within our plugin.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();

        do_action( 'awo_admin_page_loaded', $this );
    }

    /**
     * Instance.
     * 
     * The instance will be created if it does not exist yet.
     *
     * @return self The main instance.
     * @since 1.0.0
     */
    public static function instance(): self {
        static $instance = null;
        if ( is_null( $instance ) ) {
            $instance = new self();
        }

        return $instance;
    }

	/**
	 * Page Title
	 *
	 * @return string
	 */
	public function page_title(): string {
		return __( 'Settings', 'advanced-autocomplete-woocommerce-orders' );
	}

	/**
	 * Menu Title
	 *
	 * @return string
	 */
	public function menu_title(): string {
		return __( 'Settings', 'advanced-autocomplete-woocommerce-orders' );
	}

	/**
	 * Page ID
	 *
	 * @return string
	 */
	public function page_id(): string {
		return 'awo-settings';
	}

	/**
	 * Settings ID
	 *
	 * @return string
	 */
	public function settings_id(): string {
		return 'happydevs_settings';
	}

}