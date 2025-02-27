<?php

namespace Pagup\Vidseo\Controllers;

use Pagup\Vidseo\Core\Option;
use Pagup\Vidseo\Core\Plugin;
use Pagup\Vidseo\Core\Request;
class SettingsController {
    public function add_settings() {
        add_submenu_page(
            'edit.php?post_type=vidseo',
            'VidSEO Settings',
            'Settings',
            'manage_options',
            'settings',
            array(&$this, 'page')
        );
    }

    public function page() {
        $success = '';
        $safe = array(
            "true",
            "vidseo-settings",
            "vidseo-recs",
            "vidseo-youtube",
            "remove_settings"
        );
        if ( isset( $_POST['update'] ) ) {
            if ( function_exists( 'current_user_can' ) && !current_user_can( 'manage_options' ) ) {
                die( 'Sorry, not allowed...' );
            }
            check_admin_referer( 'vidseo_settings', 'vidseo_nonce' );
            if ( !isset( $_POST['vidseo_nonce'] ) || !wp_verify_nonce( $_POST['vidseo_nonce'], 'vidseo_settings' ) ) {
                die( 'Sorry, not allowed. Nonce doesn\'t verify' );
            }
            $options = [
                'vidseo_excerpt'        => Request::input( 'vidseo_excerpt' ),
                'hide_title'            => Request::checkbox( 'hide_title', $safe ),
                'disable_trans'         => Request::checkbox( 'disable_trans', $safe ),
                'hide_trans'            => Request::checkbox( 'hide_trans', $safe ),
                'vidseo_width'          => Request::input( 'vidseo_width' ),
                'vidseo_autoplay'       => Request::checkbox( 'vidseo_autoplay', $safe ),
                'vidseo_loop'           => Request::checkbox( 'vidseo_loop', $safe ),
                'vidseo_captions'       => Request::checkbox( 'vidseo_captions', $safe ),
                'vidseo_controls'       => Request::checkbox( 'vidseo_controls', $safe ),
                'vidseo_annotations'    => Request::checkbox( 'vidseo_annotations', $safe ),
                'vidseo_fullscreen'     => Request::checkbox( 'vidseo_fullscreen', $safe ),
                'vidseo_modestbranding' => Request::checkbox( 'vidseo_modestbranding', $safe ),
                'vidseo_muted'          => Request::checkbox( 'vidseo_muted', $safe ),
                'vidseo_vimeo_title'    => Request::checkbox( 'vidseo_vimeo_title', $safe ),
                'vidseo_author'         => Request::checkbox( 'vidseo_author', $safe ),
                'vidseo_title_bg'       => Request::input( 'vidseo_title_bg' ),
                'vidseo_title_txt'      => Request::input( 'vidseo_title_txt' ),
                'vidseo_trans_bg'       => Request::input( 'vidseo_trans_bg' ),
                'vidseo_trans_txt'      => Request::input( 'vidseo_trans_txt' ),
                'remove_settings'       => Request::checkbox( 'remove_settings', $safe ),
            ];
            update_option( 'vidseo', $options );
            // update options
            $success = '<div class="notice vidseo-notice notice-success is-dismissible"><p><strong>' . esc_html__( 'Settings saved.', 'bigta' ) . '</strong></p></div>';
        }
        $options = new Option();
        $notification = new \Pagup\Vidseo\Controllers\NotificationController();
        echo $notification->support();
        //set active class for navigation tabs
        $active_tab = ( isset( $_GET['tab'] ) && in_array( $_GET['tab'], $safe ) ? sanitize_key( $_GET['tab'] ) : 'vidseo-settings' );
        //Plugin::dd($_POST);
        //var_dump(Option::all());
        // purchase notification
        $purchase_url = "edit.php?post_type=vidseo&page=settings-pricing";
        $get_pro = sprintf( wp_kses( __( '<a href="%s">Get Pro version</a> to enable', 'vidseo' ), array(
            'a' => array(
                'href'   => array(),
                'target' => array(),
            ),
        ) ), esc_url( $purchase_url ) );
        // Return Views
        if ( $active_tab == 'vidseo-settings' ) {
            return Plugin::view( 'settings', compact(
                'active_tab',
                'options',
                'get_pro',
                'success'
            ) );
        }
        if ( $active_tab == 'vidseo-recs' ) {
            $plugins = array(
                array(
                    "name" => __( "Schema App Structured Data by Hunch Manifest", 'vidseo' ),
                    "desc" => __( "Get Schema.org structured data for all pages, posts, categories and profile pages on activation.", 'vidseo' ),
                    "link" => "https://wordpress.org/plugins/schema-app-structured-data-for-schemaorg/",
                    "img"  => "/admin/assets/imgs/1.jpg",
                ),
                array(
                    "name" => __( "Yasr – Yet Another Stars Rating by Dario Curvino", 'vidseo' ),
                    "desc" => __( "Boost the way people interact with your website, e-commerce or blog with an easy and intuitive WordPress rating system!", 'vidseo' ),
                    "link" => "https://wordpress.org/plugins/yet-another-stars-rating/",
                    "img"  => "/admin/assets/imgs/2.jpg",
                ),
                array(
                    "name" => __( "Better Robots.txt optimization – Website indexing, traffic, ranking & SEO Booster + Woocommerce", 'vidseo' ),
                    "desc" => __( "Better Robots.txt is an all in one SEO robots.txt plugin, it creates a virtual robots.txt including your XML sitemaps (Yoast or else) to boost your website ranking on search engines.", 'vidseo' ),
                    "link" => "https://wordpress.org/plugins/better-robots-txt/",
                    "img"  => "/admin/assets/imgs/3.png",
                ),
                array(
                    "name" => __( "Smush Image Compression and Optimization By WPMU DEV", 'vidseo' ),
                    "desc" => __( "Compress and optimize (or optimise) image files, improve performance and boost your SEO rank using Smush WordPress image compression and optimization.", 'vidseo' ),
                    "link" => "https://wordpress.org/plugins/wp-smushit/",
                    "img"  => "/admin/assets/imgs/4.jpg",
                ),
                array(
                    "name" => __( "404 to 301 By Joel James", 'vidseo' ),
                    "desc" => __( "Automatically redirect, log and notify all 404 page errors to any page using 301 redirection...", 'vidseo' ),
                    "link" => "https://wordpress.org/plugins/404-to-301/",
                    "img"  => "/admin/assets/imgs/5.png",
                ),
                array(
                    "name" => __( "Yoast SEO By Team Yoast", 'vidseo' ),
                    "desc" => __( "Improve your WordPress SEO: Write better content and have a fully optimized WordPress site using the Yoast SEO plugin.", 'vidseo' ),
                    "link" => "https://wordpress.org/plugins/wordpress-seo/",
                    "img"  => "/admin/assets/imgs/6.png",
                )
            );
            return Plugin::view( "recommendations", compact( 'active_tab', 'plugins' ) );
        }
        if ( $active_tab == 'vidseo-youtube' ) {
            return Plugin::view( "youtube-transcription", compact( 'active_tab' ) );
        }
    }

}

$settings = new SettingsController();