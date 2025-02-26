<?php
namespace Wp_Administration_Style;

require_once WP_ADMINISTRATION_STYLE['PATH'] . 'includes/is-gutenberg-active.php';

defined('ABSPATH') or die();

if (!class_exists('Wp_Administration_Style')) {
    final class Wp_Administration_Style {
        public function __construct() {
            add_action('admin_head', [$this, 'farsi_font_face']);
            add_action('admin_enqueue_scripts', [$this, 'dashboard_styles']);
            add_action('login_enqueue_scripts', [$this, 'login_styles']);
            add_action('login_head', [$this, 'farsi_font_face']);

            // Elementor editor styles
            add_action('elementor/editor/wp_head', [$this, 'farsi_font_face']);
            add_action('elementor/editor/after_enqueue_styles', fn() => wp_enqueue_style('wp-administration-style::elementor-editor', WP_ADMINISTRATION_STYLE['URL'] . 'static/css/elementor-editor.css', [], WP_ADMINISTRATION_STYLE['VERSION']));
            add_action('elementor/preview/enqueue_styles', function () {
                $this->farsi_font_face();
                wp_enqueue_style('wp-administration-style::elementor-preview', WP_ADMINISTRATION_STYLE['URL'] . 'static/css/elementor-preview.css', [], WP_ADMINISTRATION_STYLE['VERSION']);
            });
            add_action('elementor/editor/after_enqueue_scripts', fn() => wp_enqueue_script('wp-administration-style::elementor-editor', WP_ADMINISTRATION_STYLE['URL'] . 'static/js/elementor-editor.js', [], WP_ADMINISTRATION_STYLE['VERSION']));

            add_action('plugins_loaded', function () {
                if (!class_exists('Elementor_Ad_Eraser')) {
                    require_once WP_ADMINISTRATION_STYLE['PATH'] . 'elementor-ad-eraser/elementor-ad-eraser.php';
                }
            });
        }

        public function dashboard_styles() {
            wp_enqueue_style('wp-administration-style::base', WP_ADMINISTRATION_STYLE['URL'] . 'static/css/base.css', [], WP_ADMINISTRATION_STYLE['VERSION']);
            wp_enqueue_style('wp-administration-style::uicons', WP_ADMINISTRATION_STYLE['URL'] . 'static/fonts/wp-administration-style-icons/style.css', [], WP_ADMINISTRATION_STYLE['VERSION']);

            if (is_gutenberg_active()) {
                wp_enqueue_style('wp-administration-style::gutenberg', WP_ADMINISTRATION_STYLE['URL'] . 'static/css/gutenberg.css', [], WP_ADMINISTRATION_STYLE['VERSION']);
                wp_enqueue_script('wp-administration-style::gutenberg', WP_ADMINISTRATION_STYLE['URL'] . 'static/js/gutenberg.js', [], WP_ADMINISTRATION_STYLE['VERSION']);
            }

            if (is_plugin_active('elementor/elementor.php')) {
                wp_enqueue_style('wp-administration-style::elementor', WP_ADMINISTRATION_STYLE['URL'] . 'static/css/elementor.css', [], WP_ADMINISTRATION_STYLE['VERSION']);
            }

            if (is_plugin_active('woocommerce/woocommerce.php')) {
                wp_enqueue_style('wp-administration-style::woocommerce', WP_ADMINISTRATION_STYLE['URL'] . 'static/css/woocommerce.css', [], WP_ADMINISTRATION_STYLE['VERSION']);
            }

            wp_enqueue_style('wp-administration-style::mce', WP_ADMINISTRATION_STYLE['URL'] . 'static/css/mce.css', [], WP_ADMINISTRATION_STYLE['VERSION']);
            wp_enqueue_script('wp-administration-style::js', WP_ADMINISTRATION_STYLE['URL'] . 'static/js/index.js', [], WP_ADMINISTRATION_STYLE['VERSION']);
        }

        public function login_styles() {
            wp_enqueue_style('wp-administration-style::signin', WP_ADMINISTRATION_STYLE['URL'] . 'static/css/signin.css', [], WP_ADMINISTRATION_STYLE['VERSION']);
            wp_enqueue_style('wp-administration-style::uicons', WP_ADMINISTRATION_STYLE['URL'] . 'static/fonts/wp-administration-style-icons/style.css', [], WP_ADMINISTRATION_STYLE['VERSION']);
        }

        public function farsi_font_face() {
            echo '
                <link id="wp-administration-style-vazirmatn-link" rel="preload" href="' .
                WP_ADMINISTRATION_STYLE['URL'] .
                'static/fonts/Vazirmatn/Vazirmatn[wght].woff2?v' .
                WP_ADMINISTRATION_STYLE['VERSION'] .
                '" as="font" type="font/woff2" crossorigin />

                <style id="wp-administration-style-vazirmatn-style" type="text/css">
                    @font-face {
                        font-family: "wp-administration-style-vazirmatn";
                        src: url("' .
                WP_ADMINISTRATION_STYLE['URL'] .
                'static/fonts/Vazirmatn/Vazirmatn[wght].woff2?v' .
                WP_ADMINISTRATION_STYLE['VERSION'] .
                '") format("woff2 supports variations"),
                            url("' .
                WP_ADMINISTRATION_STYLE['URL'] .
                'static/fonts/Vazirmatn/Vazirmatn[wght].woff2?v' .
                WP_ADMINISTRATION_STYLE['VERSION'] .
                '") format("woff2-variations");
                        font-weight: 100 900;
                        font-display: block;
                        font-style: normal;
                    }
                </style>
            ';
        }
    }

    new Wp_Administration_Style();
}
