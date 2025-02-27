<?php
namespace Pagup\TikTokButton;
use Pagup\TikTokButton\Core\Asset;

class Settings {

    public function __construct()
    {

        $settings = new \Pagup\TikTokButton\Controllers\SettingsController;

        // Add settings page
        add_action( 'admin_menu', array( &$settings, 'add_settings' ) );

        // Add setting link to plugin page
        $plugin_base = FTB_PLUGIN_BASE;
        add_filter( "plugin_action_links_{$plugin_base}", array( &$this, 'setting_link' ) );

        if (isset($_GET['page']) && $_GET['page'] == 'floating-tiktok-button') {
        
            // Add styles and scripts back-end
            add_action( 'admin_enqueue_scripts', array( &$this, 'assets') );

        }

    }

    public function setting_link( $links ) {

        array_unshift( $links, '<a href="admin.php?page=floating-tiktok-button">Settings</a>' );

        return $links;
    }

    public function assets() {

        $safe = ['assets/flexboxgrid.min.css', 'assets/app.css', '../vendor/qrcode.min.js', '../vendor/jscolor.js', '../vendor/jscolor.js', '../vendor/vue.min.js', 'assets/app.js'];

        Asset::style_remote('ftb__font', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap');
        Asset::style('ftb__flexboxgrid', 'assets/flexboxgrid.min.css', $safe);
        Asset::style('ftb__styles', 'assets/app.css', $safe);
        Asset::script('ftb__qrcode', '../vendor/qrcode.min.js', array(), true, $safe);
        Asset::script('ftb__jscolor', '../vendor/jscolor.js', array(), true, $safe);
        Asset::script('ftb__vuejs', '../vendor/vue.min.js', array(), true, $safe);
        Asset::script('ftb__script', 'assets/app.js', array(), true, $safe);

        wp_enqueue_media();
    
    }

}

$settings = new Settings;