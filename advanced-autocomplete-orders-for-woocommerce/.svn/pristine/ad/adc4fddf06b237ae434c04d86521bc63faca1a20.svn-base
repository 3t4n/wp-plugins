<?php
/**
 * Admin_Menu Class
 *
 * @category Admin_Menu
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
 * Admin_Menu class
 *
 * @class Admin_Menu The class that manages all about Admin Menus.
 *
 * @category Admin_Menu
 * @package  Optemiz\AWO
 * @author   Nazrul Islam Nayan <nazrulislamnayan7@gmail.com>
 * @license  GPL3 https://www.gnu.org/licenses/gpl-3.0.en.html
 */
class Admin_Menu {

    /**
     * Class constructor
     *
     * Sets up all the appropriate hooks and functions
     * within our plugin.
     *
     * @return void
     */
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'admin_menu' ), 20 );

        do_action( 'awo_admin_menu_loaded', $this );
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
	 * Admin_Menu Menus.
     * 
     * @return void
	 */
    public function admin_menu() {
        global $admin_page_hooks;

        if(!isset($admin_page_hooks['happydevs'])) {
            add_menu_page( 'HappyDevs', 'HappyDevs', 'manage_options', 'happydevs', array( $this, 'root_page' ), '', 30 );
        }

        add_submenu_page( 'happydevs', esc_html__('Autocomplete Orders', 'advanced-autocomplete-woocommerce-orders'), esc_html__('Autocomplete Orders', 'advanced-autocomplete-woocommerce-orders'), 'manage_options', 'autocomplete-orders', array( $this, 'autocomplete_orders_page' ) );
        add_submenu_page( 'happydevs', esc_html__('Settings', 'advanced-autocomplete-woocommerce-orders'), esc_html__('Settings', 'advanced-autocomplete-woocommerce-orders'), 'manage_options', 'awo-settings', array( Settings::instance(), 'setting_page' ), 9999 );

        //remove the automatically added main submenu.
        remove_submenu_page('happydevs', 'happydevs');
    }

    public function root_page() {

    }

    public function autocomplete_orders_page() {

    }

    /**
     * Product List.
     * 
     * @return void
     */
    public function products_list() {
        echo '<div class="ffw-products-list-wrapper opt-list-wrapper"></div>';
    }
    
    /**
     * FAQs List.
     * 
     * @return void
     */
    public function faqs_list() {
        echo '<div class="ffw-faqs-list-wrapper opt-list-wrapper"></div>';
    }

    /**
     * AI page content
     * 
     * @since 1.7.0
     * @return void
     */
    public function awo_ai_page() {
        $content = "";
			
        ob_start();

        ?>
        <div class="ffw-admin-wrapper">
            <?php
                include AWO_FILE_DIR . '/views/ai-faqs/body.php';
            ?>
        </div>
        <?php

        $content .= ob_get_clean();

        echo $content;
    }

    /**
     * Templates Page content
     * 
     * @since 2.0.0
     * 
     * @return void
     */
    public function awo_templates_page() {
        $content = "";
			
        ob_start();

        ?>
        <div class="ffw-admin-wrapper">
            <?php
                include AWO_FILE_DIR . '/views/templates.php';
            ?>
        </div>
        <?php

        $content .= ob_get_clean();

        echo $content;
    }

    /**
	 * Submenu callback.
	 */
    public function submenu_callback() {

        // redirect to pro page
        if( isset($_GET['page']) && 'ffw-upgrade-to-pro' == $_GET['page'] ) {
            wp_redirect( AWO_PRO_URL );
            die;
        }
        
    }

}