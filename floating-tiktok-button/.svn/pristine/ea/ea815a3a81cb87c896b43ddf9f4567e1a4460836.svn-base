<?php

namespace Pagup\TikTokButton\Controllers;

use Pagup\TikTokButton\Core\Option;
use Pagup\TikTokButton\Core\Plugin;
use Pagup\TikTokButton\Core\Request;
class SettingsController {
    protected $safe_files = ['notices/support', 'settings', 'faq'];

    public function add_settings() {
        add_menu_page(
            'Floating TikTok Button Settings',
            'Floating TikTok Button',
            'manage_options',
            'floating-tiktok-button',
            array(&$this, 'page'),
            'dashicons-pressthis'
        );
    }

    public function page() {
        $safe = [
            "allow",
            "true",
            "button",
            "qrcode",
            "both",
            "disable",
            "post_pages",
            "everywhere",
            "desktop_mobile",
            "desktop",
            "mobile",
            "icon_style1",
            "icon_style2",
            "icon_style3",
            "icon_custom",
            "bottom_left",
            "bottom_right",
            "top_left",
            "top_right",
            "below",
            "above",
            "ftb-settings",
            "ftb-faq"
        ];
        $progress_bar = '';
        if ( isset( $_POST['update'] ) ) {
            if ( function_exists( 'current_user_can' ) && !current_user_can( 'manage_options' ) ) {
                die( 'Sorry, not allowed...' );
            }
            check_admin_referer( 'ftb__settings', 'ftb__nonce' );
            if ( !isset( $_POST['ftb__nonce'] ) || !wp_verify_nonce( $_POST['ftb__nonce'], 'ftb__settings' ) ) {
                die( 'Sorry, not allowed. Nonce doesn\'t verify' );
            }
            $free = [
                'enable_button'       => (string) Request::safe( 'enable_button', $safe ),
                'display_on'          => (string) Request::safe( 'display_on', $safe ),
                'devices'             => (string) Request::safe( 'devices', $safe ),
                'tiktok_id'           => (string) Request::text( 'tiktok_id' ),
                'icon_styles'         => (string) Request::safe( 'icon_styles', $safe ),
                'icon_url'            => (string) Request::text( 'icon_url' ),
                'button_position'     => (string) Request::safe( 'button_position', $safe ),
                'icon_custom_preview' => (string) Request::text( 'icon_custom_preview' ),
                'text_position'       => (string) Request::safe( 'text_position', $safe ),
                'margin_top'          => (int) Request::text( 'margin_top' ),
                'margin_right'        => (int) Request::text( 'margin_right' ),
                'margin_bottom'       => (int) Request::text( 'margin_bottom' ),
                'margin_left'         => (int) Request::text( 'margin_left' ),
                'remove_settings'     => (string) Request::safe( 'remove_settings', $safe ),
            ];
            $pro = [];
            $options = array_merge( $free, $pro );
            update_option( 'floating-tiktok-button', $options );
            // update options
            echo '<div class="notice ftb-notice notice-success is-dismissible"><p><strong>' . esc_html__( 'Settings saved.' ) . '</strong></p></div>';
            $progress_bar = '<div class="ftb-meter ftb-animate"><span style="width: 100%"><span>All Done</span></span></div>';
        }
        $options = new Option();
        $site_title = get_bloginfo( 'name' );
        Plugin::view( 'notices/support', [], $this->safe_files );
        //set active class for navigation tabs
        $active_tab = ( isset( $_GET['tab'] ) && in_array( $_GET['tab'], $safe ) ? sanitize_key( $_GET['tab'] ) : 'ftb-settings' );
        //Plugin::dd(Plugin::view('hello', compact('active_tab'), $this->safe_files));
        // Send options data to app.js
        $options_data = Option::all();
        if ( !empty( $options_data ) ) {
            wp_localize_script( 'ftb__script', 'options', $options_data );
            wp_localize_script( 'ftb__tiktok', 'options', $options_data );
        }
        //Plugin::dump($options_data);
        $post_types = $this->cpts( array('attachment') );
        // Return Views
        if ( $active_tab == 'ftb-settings' ) {
            return Plugin::view( 'settings', compact(
                'active_tab',
                'options',
                'post_types',
                'site_title',
                'progress_bar'
            ), $this->safe_files );
        }
        if ( $active_tab == 'ftb-faq' ) {
            return Plugin::view( "faq", compact( 'active_tab' ), $this->safe_files );
        }
    }

    public function cpts( $excludes ) {
        // All CPTs.
        $post_types = get_post_types( array(
            'public' => true,
        ), 'objects' );
        // remove Excluded CPTs from All CPTs.
        foreach ( $excludes as $exclude ) {
            unset($post_types[$exclude]);
        }
        return $post_types;
    }

}

$settings = new SettingsController();