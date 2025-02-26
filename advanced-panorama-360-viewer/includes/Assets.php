<?php

namespace AP360V;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Assets {

    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function enqueue_styles() {
        
    }

    public function enqueue_scripts() {
        
    }

    public function enqueue_admin_assets() {
        
    }

    public function enqueue_block_editor_assets() {
        
    }

    public function enqueue_libraries(){
        wp_register_script(
            'pannellum-2.5.6',
            AP360V_URL . 'lib/pannellum/pannellum.js',
            array(),
            '2.5.6',
            false
        );
        wp_register_style(
            'pannellum-2.5.6',
            AP360V_URL . 'lib/pannellum/pannellum.css',
            array(),
            '2.5.6',
            'all'
        );
    }
}