<?php
/**
 * Plugin Name:       Mega Block Hero Banner Slider
 * Description:       A customizable block slider hero banner with Bootstrap 4, Swiper.js, background image, color, padding control, and advanced background settings.
 * Version:           1.1
 * Author:            Govind Sharma
 * Author URI:        https://weblogixsoft.com
 * Text Domain:       mega-blocks-editable-slider-block-with-advanced-background-settings
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

// Include the block registration code from a separate file
require_once plugin_dir_path( __FILE__ ) . 'includes/block-registration.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-slider.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/frontend-import.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/settings-page.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/shortcodes.php';


/**
 * Enqueue Bootstrap 4 and Swiper.js for the front-end slider functionality.
 */
function mega_enqueue_slider_assets() {
    // Only enqueue on the front-end where the block is used
    if ( has_block( 'mega-blocks/slider' ) ) {
        // Enqueue Bootstrap 4
        wp_enqueue_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), '4.3.1' );
        wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js', array(), '4.3.1', true );

        // Enqueue Swiper.js for the front-end slider
        wp_enqueue_script( 'swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), '6.5.1', true );
        wp_enqueue_style( 'swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(), '6.5.1' );

        // Add inline Swiper.js configuration
        wp_add_inline_script( 'swiper-js', '
            const swiper = new Swiper(".mega-slider-block", {
                slidesPerView: 1,
                loop: true,
                autoplay: { delay: 3000 },
            });
        ', true );
    }
}
add_action( 'wp_enqueue_scripts', 'mega_enqueue_slider_assets' );

/**
 * Enqueue frontend styles for the slider block.
 */
function mega_slider_block_frontend_assets() {
    // Enqueue CSS for the full-width layout on the frontend
    wp_enqueue_style(
        'mega-slider-block-frontend-style',
        plugins_url( 'blocks/mega-slider/hero-slider/style.css', __FILE__ ) // Assuming style.css is the CSS file
    );
}
add_action( 'wp_enqueue_scripts', 'mega_slider_block_frontend_assets' );

/**
 * Enqueue the selected Google Font for frontend.
 */
function mega_slider_enqueue_google_fonts( $font_families ) {
    if ( ! empty( $font_families ) ) {
        $query_args = array(
            'family' => implode( '|', array_unique( $font_families ) ),
            'display' => 'swap',
        );
        wp_enqueue_style( 'mega-google-fonts', add_query_arg( $query_args, 'https://fonts.googleapis.com/css2' ), array(), null );
    }
}
add_action( 'wp_enqueue_scripts', 'mega_slider_enqueue_google_fonts' );

/**
 * Enqueue Animate.css from local files.
 */
function mega_slider_enqueue_animate_css() {
    wp_enqueue_style( 'animate-css', plugins_url( 'assets/css/animate.min.css', __FILE__ ), array(), '4.1.1' );
}
add_action( 'wp_enqueue_scripts', 'mega_slider_enqueue_animate_css' );
add_action( 'enqueue_block_editor_assets', 'mega_slider_enqueue_animate_css' );
