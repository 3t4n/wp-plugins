<?php
namespace Pagup\Vidseo;
use Pagup\Vidseo\Core\Asset;

class Settings {

    public function __construct()
    {

        $settings = new \Pagup\Vidseo\Controllers\SettingsController;
        $cpt = new \Pagup\Vidseo\Controllers\CPTController;
        $metabox = new \Pagup\Vidseo\Controllers\MetaboxController;
        $metabox = new \Pagup\Vidseo\Controllers\MetaboxController;

        // Add settings page
        add_action( 'admin_menu', array( &$settings, 'add_settings' ) );

        // Add Custom Post Type for VidSEO
        add_action( 'init', array(&$cpt, 'vidseo_post'), 0 );

        // Add metaboxes to post-types
        add_action( 'add_meta_boxes', array(&$metabox, 'add_metabox') );
        add_action( 'add_meta_boxes', array(&$metabox, 'add_meta_sidebar') );

        // Save meta data
        add_action( 'save_post', array(&$metabox, 'metadata'));

        // Add setting link to plugin page
        $plugin_base = VIDSEO_PLUGIN_BASE;
        add_filter( "plugin_action_links_{$plugin_base}", array( &$this, 'setting_link' ) );
        
        // Add styles and scripts
        add_action( 'admin_enqueue_scripts', array( &$this, 'assets') );

    }

    public function setting_link( $links ) {

        array_unshift( $links, '<a href="edit.php?post_type=vidseo&page=settings">Settings</a>' );

        return $links;
    }

    public function assets() {

        $screen = get_current_screen();

        if ($screen->post_type == "vidseo") {

            Asset::style_remote('vidseo_font', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap');
            Asset::style('vidseo_styles', 'admin/assets/app.css');
            //Asset::script('vidseo_vue_dev', 'vendor/vue.js'); // Vuejs Development/testing
            Asset::script('vidseo_vue', 'vendor/vue.min.js'); // Vuejs Production version
            wp_enqueue_editor();
            Asset::script('vidseo_script', 'admin/assets/app.min.js', true);
            Asset::script('vidseo_jscolor', 'vendor/jscolor.js');

        }
    
    }
}

$settings = new Settings;