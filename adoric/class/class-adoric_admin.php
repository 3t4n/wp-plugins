<?php

defined( 'ABSPATH' ) or exit;

class adoric_admin
{
    public function __construct() {
        add_action( 'admin_menu', [ $this, 'adoric_add_menu_item' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'load_resources' ] );
        add_filter( 'plugin_action_links_' . ADORIC_PLUGIN_BASE, [ $this, 'plugin_action_links' ] );
    }
    
    public static function load_resources($hook) 
    {
        $isAdoricPage = strpos($hook, ADORIC_MAIN_DIR) !== false;
        $isAdoricDashboardPage = $isAdoricPage && (strpos($hook, 'dashboard') !== false);
        $isAdoricSettingsPage = $isAdoricPage && (strpos($hook, 'settings') !== false);
        
        if ($isAdoricPage) {
            wp_register_style( 'wpAdoricDashboardStylesheet', ADORIC_PLUGIN_URL . 'assets/css/dashboard.css' );
            wp_register_style( 'wpAdoricSettingsStylesheet', ADORIC_PLUGIN_URL . 'assets/css/settings.css' );
            wp_register_script( 'wpAdoricDashboardScript', ADORIC_PLUGIN_URL . 'assets/js/dashboard.js' );
            wp_register_script( 'wpAdoricSettingsScript', ADORIC_PLUGIN_URL . 'assets/js/settings.js' );

            if ($isAdoricDashboardPage) {
                wp_enqueue_style( 'wpAdoricDashboardStylesheet' );
                wp_enqueue_script( 'wpAdoricDashboardScript' );
            }
            if ($isAdoricSettingsPage) {
                wp_enqueue_style( 'wpAdoricSettingsStylesheet' );
                wp_enqueue_script( 'wpAdoricSettingsScript' );
            }
        }
        
        wp_register_style( 'wpAdminAdoricLinkStylesheet', ADORIC_PLUGIN_URL . 'assets/css/admin.css' );
        wp_enqueue_style( 'wpAdminAdoricLinkStylesheet' );
    }
    
    public static function plugin_action_links($links)
    {
        $settings_link = sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'admin.php?page=' . ADORIC_MAIN_DIR . '/views/settings.php' ), __( 'Settings', 'Adoric' ) );

        array_unshift( $links, $settings_link );

        $links['go_pro'] = sprintf( '<a href="%1$s" target="_blank" class="adoric-plugins-gopro">%2$s</a>', 'https://adoric.com/pricing', __( 'Go Pro', 'Adoric' ) );

        return $links;
    }
    
    public static function adoric_add_menu_item()
    {
        add_menu_page(
            '',
            'Adoric',
            'manage_options',
            ADORIC_MAIN_DIR . '/views/dashboard.php',
            null,
            ADORIC_PLUGIN_URL . 'assets/img/menu_logo.svg',
            30
        );
        add_submenu_page(
            plugin_dir_path(ADORIC__FILE__) . 'views/dashboard.php',
            '',
            'Dashboard',
            'manage_options',
            ADORIC_MAIN_DIR . '/views/dashboard.php',
            null
        );
        add_submenu_page(
            plugin_dir_path(ADORIC__FILE__) . 'views/dashboard.php',
            '',
            'Settings',
            'manage_options',
            ADORIC_MAIN_DIR . '/views/settings.php',
            null
        );
    }

}
