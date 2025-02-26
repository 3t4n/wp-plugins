<?php
/*
 * Plugin Name: Enable Cart Fragments
 * Description: Fix Elementor mini cart issue by enabling WooCommerce cart fragments with a toggle option in the WordPress Customizer.
 * Version: 1.1
 * Author: Galaxy Weblinks
 * Author URI: http://www.galaxyweblinks.com
 * License: GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: enable-cart-fragments
 * Domain Path: /languages
 * Requires Plugins: woocommerce
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register customizer settings for enabling cart fragments.
 *
 * @param WP_Customize_Manager $wp_customize The customizer object.
 */
function encfr_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'encfr_section', array(
        'title'    => __( 'Enable Cart Fragments', 'enable-cart-fragments' ),
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'encfr_enable_fragments', array(
        'default'           => 'no',
        'sanitize_callback' => 'encfr_sanitize_toggle',
    ) );

    $wp_customize->add_control( 'encfr_enable_fragments_control', array(
        'label'       => __( 'Enable WooCommerce Cart Fragments', 'enable-cart-fragments' ),
        'section'     => 'encfr_section',
        'settings'    => 'encfr_enable_fragments',
        'type'        => 'checkbox',
        'description' => __( 'Check to enable cart fragments functionality.', 'enable-cart-fragments' ),
    ) );
}
// Add customizer setting and control
add_action( 'customize_register', 'encfr_customize_register' );

/**
 * Sanitize checkbox input.
 *
 * @param string $value The input value.
 * @return string 'yes' if checked, 'no' otherwise.
 */
function encfr_sanitize_toggle( $value ) {
    return ( $value === 'yes' ) ? 'yes' : 'no';
}

// Re-enable WooCommerce Cart Fragments based on customizer setting
add_action( 'wp_enqueue_scripts', 'encfr_enqueue_cart_fragments', 10 );

/**
 * Conditionally enqueue WooCommerce cart fragments script.
 */
function encfr_enqueue_cart_fragments() {
    // Get the customizer setting
    $enable_fragments = get_theme_mod( 'encfr_enable_fragments', 'no' );

    // Check if WooCommerce is active and fragments are enabled in the customizer
    if ( class_exists( 'WooCommerce' ) && $enable_fragments === 'yes' ) {
        wp_enqueue_script( 'wc-cart-fragments' );

        // Optional: Make sure the cart fragments script is only loaded on relevant pages
        add_filter( 'woocommerce_cart_fragment_refresh_delay', function() {
            return 0; // Instant refresh
        }, 10, 1 );

        add_filter( 'woocommerce_cart_fragments_enabled', '__return_true' );
    }
}

/**
 * Disable WooCommerce cart fragments if the customizer setting is off.
 */
function encfr_maybe_disable_cart_fragments() {
    $enable_fragments = get_theme_mod( 'encfr_enable_fragments', 'no' );

    if ( $enable_fragments !== 'yes' ) {
        // Disable the cart fragments functionality
        remove_filter( 'woocommerce_cart_fragment_refresh_delay', '__return_true', 10 );
        remove_filter( 'woocommerce_cart_fragments_enabled', '__return_true' );
    }
}
// Disable filters when cart fragments are disabled
add_action( 'init', 'encfr_maybe_disable_cart_fragments' );


/**
 * You can use these filters to add custom links to your plugin row in the plugin list.
 * @param $links, $file
 * @return $links [array]
 */
if (! function_exists('encfr_add_custom_plugin_links')) {
    function encfr_add_custom_plugin_links($links, $file)
    {
        if (!isset($plugin)){
            $plugin = plugin_basename(__FILE__);
        }

        if ($plugin == $file) {
            $links[] = '<a href="https://wp-plugins.galaxyweblinks.com/wp-plugins/enable-cart-fragments/doc/" target="_blank">Documentation</a>';
            $links[] = '<a href="https://wp-plugins.galaxyweblinks.com/contact/" target="_blank">Contact Support</a>';
        }
        return $links;
    }
}
add_filter('plugin_row_meta', 'encfr_add_custom_plugin_links', 10, 2);