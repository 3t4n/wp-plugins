<?php

namespace Pagup\Bigta;

use Pagup\Bigta\Core\Asset;
class Settings {
    protected $metabox;

    protected $dom;

    public function __construct() {
        $settings = new \Pagup\Bigta\Controllers\SettingsController();
        $this->metabox = new \Pagup\Bigta\Controllers\MetaboxController();
        $this->dom = new \Pagup\Bigta\Controllers\DomController();
        add_action( 'admin_menu', array(&$settings, 'add_settings') );
        add_action( 'wp_ajax_bigta__options', array(&$settings, 'save_options') );
        add_action( 'wp_ajax_bigta__onboarding', array(&$settings, 'onboarding') );
        add_action( 'admin_enqueue_scripts', array(&$this, 'assets') );
        add_action( 'add_meta_boxes', array(&$this, 'add_metabox') );
        add_filter(
            'script_loader_tag',
            array(&$this, 'add_module_to_script'),
            10,
            3
        );
    }

    public function add_metabox() {
        $post_types = array('post', 'page');
        foreach ( $post_types as $post_type ) {
            add_meta_box(
                'bigta_post_options',
                // id, used as the html id att
                __( 'Bulk Image Title Attribute' ),
                // meta box title
                array(&$this->metabox, 'metabox'),
                // callback function, spits out the content
                $post_type,
                // post type or page. This adds to posts only
                'side',
                // context, where on the screen
                'low'
            );
        }
    }

    public function assets() {
        if ( isset( $_GET['page'] ) && !empty( $_GET['page'] ) && $_GET['page'] === "bigta" ) {
            if ( BIGTA_PLUGIN_MODE === "prod" ) {
                Asset::style( 'bigta__styles', 'admin/ui/index.css' );
                Asset::script(
                    'bigta__main',
                    'admin/ui/index.js',
                    array(),
                    true
                );
            } else {
                Asset::script_remote(
                    'bigta__client',
                    'http://localhost:5173/@vite/client',
                    array(),
                    true,
                    true
                );
                Asset::script_remote(
                    'bigta__main',
                    'http://localhost:5173/src/main.ts',
                    array(),
                    true,
                    true
                );
            }
        }
        Asset::style( 'bigta_styles', 'admin/assets/app.css' );
    }

    function add_module_to_script( $tag, $handle, $src ) {
        if ( BIGTA_PLUGIN_MODE === "prod" ) {
            if ( 'bigta__main' === $handle ) {
                $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
            }
        } else {
            if ( 'bigta__client' === $handle || 'bigta__main' === $handle ) {
                $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
            }
        }
        return $tag;
    }

}

$settings = new Settings();