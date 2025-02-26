<?php

class ATDI_Main_Init {

    private $theme_authors = array('amplethemes', 'a2zthemes');
    public $all_themes = array(
        'online-portfolio',
        'online-portfolio-pro',
        'ample-magazine',
        'ample-magazine-pro',
        'adorable-blog',
        'saraswati-blog',
        'ours-restaurant',
        'ours-restaurant-pro',
        'special-news',
        'ample-shop',
        'ample-shop-pro',
        'az-multipurpose',
        'az-multipurpose-pro',
        'news-bulletin',
        'news-bulletin-pro'
    );


    public static function instance() {

        static $instance = null;

        if ( null === $instance ) {
            $instance = new ATDI_Main_Init;
        }

        return $instance;
    }

    public function run() {
        $this->load_dependencies();

        if ( in_array(adti_get_current_theme_author(),$this->theme_authors) || in_array(adti_get_current_theme_slug(),$this->all_themes)) {
            $this->hooks();
        }

    }

    private function load_dependencies() {

        require_once ATDI_PATH . 'inc/aidi-advanced-import.php';

    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.2
     * @access   private
     */
    private function hooks() {

        $plugin_hooks = adti_advanced_import();

        add_filter( 'admin_menu', array( $plugin_hooks, 'import_menu' ), 10, 1 );
        add_filter( 'wp_ajax_atdi_getting_started', array( $plugin_hooks, 'install_advanced_import' ), 10, 1 );
        add_filter( 'admin_enqueue_scripts', array( $plugin_hooks, 'enqueue_styles' ), 10, 1 );
        add_filter( 'admin_enqueue_scripts', array( $plugin_hooks, 'enqueue_scripts' ), 10, 1 );
        add_filter( 'admin_init', array( $plugin_hooks, 'load_advanced_import' ), 10 );


    }
}
function aidi_main_init() {

    return ATDI_Main_Init::instance();
}
aidi_main_init()->run();