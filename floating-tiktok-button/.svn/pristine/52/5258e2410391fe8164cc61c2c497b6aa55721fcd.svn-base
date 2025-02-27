<?php

namespace Pagup\TikTokButton\Controllers;

use Pagup\TikTokButton\Core\Asset;
use Pagup\TikTokButton\Core\Option;
use Pagup\TikTokButton\Core\Plugin;
class ButtonController {
    protected $safe_files = [
        'button_qrcode',
        'button',
        'button_styles',
        '../vendor/qrcode.min.js',
        'assets/floating-tiktok-button.js'
    ];

    public function __construct() {
        add_action( 'wp_footer', array(&$this, 'tiktok_button') );
        add_action( 'wp_head', array(&$this, 'styles') );
        // Add styles and scripts front-end
        add_action( 'wp_enqueue_scripts', array(&$this, 'frontend_assets') );
    }

    public function tiktok_button() {
        $options_data = Option::all();
        if ( !empty( $options_data ) ) {
            wp_localize_script( 'ftb__tiktok', 'options', $options_data );
        }
        if ( Option::check( 'enable_button' ) ) {
            if ( Option::get( 'enable_button' ) !== "disable" ) {
                $option = new Option();
                if ( is_singular( array('post', 'page') ) ) {
                    return Plugin::view( 'button', compact( 'option' ), $this->safe_files );
                }
            }
        }
    }

    public function styles() {
        $option = new Option();
        if ( Option::check( 'enable_button' ) && Option::get( 'enable_button' ) !== "disable" ) {
            return Plugin::view( 'button_styles', compact( 'option' ), $this->safe_files );
        }
    }

    public function frontend_assets() {
    }

}

$ButtonControllers = new ButtonController();