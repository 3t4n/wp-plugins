<?php
namespace p123on;

/**
 * Admin Pages Handler
 */
class Admin {

    public function __construct() {
        add_action( 'admin_menu', [ $this, 'p123on_admin_menu' ] );
        add_action( 'init', [ $this, 'p123on_register_post_type' ] );
        add_action('wp_enqueue_scripts', [ $this,  'p123on_add_js' ] );
        add_action( 'init', [ $this, 'p123on_register_post_meta' ] );
    }

    /**
     * Register our custom post type
     *
     * @return void
     */
    public function p123on_register_post_type() {
        register_post_type('video_123on',
            array(
                'labels'      => array(
                    'name'          => __('Videos', 'textdomain'),
                    'singular_name' => __('Video', 'textdomain'),
                ),
                    'public'      => true,
                    'has_archive' => true,
                    'show_in_rest' => true,
            )
        );
    }

    /**
     * Register custom post meta
     *
     * @return void
     */
    public function p123on_register_post_meta() {
        register_meta('post', 'hot_spots', array(
            'type' => 'object',
            'description' => 'Meta Desc',
            'show_in_rest' => true,
            'single' => true
            )
        );
    }

    function p123on_add_js(){
        wp_localize_script( 'ajax-script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' )));
    }

    /**
     * Register our menu page
     *
     * @return void
     */
    public function p123on_admin_menu() {
        global $submenu;

        $capability = 'manage_options';
        $slug       = 'vue-app';

        $hook = add_menu_page( __( 'Videos', 'textdomain' ), __( '123on', 'textdomain' ), $capability, $slug, [ $this, 'plugin_page' ], plugin_dir_url( __FILE__ ) . '../assets/img/plugin-icon.png' );

        if ( current_user_can( $capability ) ) {
            $submenu[ $slug ][] = array( __( 'Videos', 'textdomain' ), $capability, 'admin.php?page=' . $slug . '#/' );
            $submenu[ $slug ][] = array( __( 'Add new', 'textdomain' ), $capability, 'admin.php?page=' . $slug . '#/add-new' );
        }

        add_action( 'load-' . $hook, [ $this, 'init_hooks'] );
    }
    
    /**
     * Initialize our hooks for the admin page
     *
     * @return void
     */
    public function init_hooks() {
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
    }
    
    /**
     * Load scripts and styles for the app
     *
     * @return void
     */
    public function enqueue_scripts() {
        wp_enqueue_style( 'p123on-admin' );
        wp_enqueue_script( 'p123on-admin' );
        wp_localize_script( 'p123on-admin', 'wpApiSettings', array(
            'root' => esc_url_raw( rest_url() ),
            'nonce' => wp_create_nonce( 'wp_rest' )
         ) );
    }

    /**
     * Render our admin page
     *
     * @return void
     */
    public function plugin_page() {
        echo '<div class="wrap"><div id="vue-admin-app"></div></div>';
    }
}