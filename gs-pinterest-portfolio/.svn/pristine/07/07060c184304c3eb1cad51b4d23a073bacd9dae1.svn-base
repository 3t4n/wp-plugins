<?php

namespace GSPIN;

// if direct access than exit the file.
defined('ABSPATH') || exit;

class Admin {
    
    /**
     * Singleton Instance
     *
     * @access private static
     */
    private static $instance;
    
    /**
     * Class Constructor
     *
     * @since  2.0.8
     * @return void
     */
    public function __construct() {
        
        add_action( 'admin_menu', array( $this, 'menus' ) );
    }
    
    /**
     * Get class singleton instance
     *
     * @return Class Instance
     */
    public static function get_instance() {
        if ( ! self::$instance instanceof GSPlugins_wps ) {
            self::$instance = new GSPlugins_wps();
        }
        
        return self::$instance;
    }
    
    /**
     * Registers dashboard menus.
     * 
     * @since 
     */
    public function menus() {
        add_menu_page(
            __( 'GS Pinterest', 'gs-pinterest' ),
            __( 'GS Pinterest', 'gs-pinterest' ),
            'manage_options',
            'gsp-pinterest-main',
            array( $this, 'view' ),
            GSPIN_PLUGIN_URI . '/assets/img/icon.svg',
            GSPIN_MENU_POSITION
        );
    }

    /**
     * Includes view of shortcode builder.
     * 
     * @since  2.0.12
     * @return void
     */
    public function view() {
        include GSPIN_PLUGIN_DIR . 'ShortcodeBuilder/Page.php';
    }

    /**
     * Display's main menu page.
     * 
     * @since 2.0.8
     */
    public function displayMainMenuPage() {
        $protocol = is_ssl() ? 'https' : 'http';
        $response = wp_remote_get( $protocol . '://gsplugins.com/gs_plugins_list/index.php' );

        if ( ! is_wp_error ( $response ) ) {
            echo $response['body'];
        }
    }

    /**
     * Display help page.
     * 
     * @since 2.0.8
     */
    public function displayHelpPage() {
        include GSPIN_PLUGIN_DIR . 'includes/views/Help.php';
    }

    /**
	 * Callback method for displaying free items page.
	 * 
	 * @since 2.0.8
	 */
    public function displayFreeItems() {
        include GSPIN_PLUGIN_DIR . 'includes/views/FreeItems.php';
    }

    public function plugin_page() {
        include GSPIN_PLUGIN_DIR . 'includes/views/PluginPage.php';
    }
}
