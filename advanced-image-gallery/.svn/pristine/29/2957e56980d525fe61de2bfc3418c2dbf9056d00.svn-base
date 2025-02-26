<?php
/**
 * Plugin Name: Advanced Image Gallery for Elementor - Grid, Carousel & Slideshow
 * Description: Advanced Image Gallery is a versatile plugin for creating stunning media grids, carousels, gallery, and slideshows with an ease way.
 * Version: 1.1
 * Plugin URI: 
 * Author: Zluck Solutions
 * Author URI: https://zluck.com
 * License: GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: advanced-image-gallery
 */

// Prevent direct access to the file
if (!defined('ABSPATH')) {
    exit;
}
// Define the absolute path to the includes file
$deactivation_feedback_file = plugin_dir_path(__FILE__) . 'include/deactivation-feedback.php';

// Check if the file exists before including it
if (file_exists($deactivation_feedback_file)) {
    require_once $deactivation_feedback_file;
} else {
    // Optional: Log an error or handle the missing file scenario gracefully
    error_log('Required file "deactivation-feedback.php" is missing.');
}

// Check if Elementor is active and display an admin notice if it's not
function zlfms_check_elementor_active()
{
    if (!did_action('elementor/loaded')) {
        // Admin notice to inform the user Elementor is required
        add_action('admin_notices', 'zlfms_elementor_inactive_notice');
    }
}
add_action('plugins_loaded', 'zlfms_check_elementor_active');

// Show admin notice if Elementor is not active
function zlfms_elementor_inactive_notice()
{
    if (current_user_can('activate_plugins')) {
        $activate_url = wp_nonce_url(
            admin_url('plugins.php?action=activate&plugin=elementor/elementor.php'),
            'activate-plugin_elementor/elementor.php'
        );
        echo wp_kses_post('
            <div class="notice notice-error is-dismissible">
                <p>' . esc_html__('Elementor Advanced Gallery requires Elementor plugin to be active. Please activate Elementor to continue.', 'advanced-image-gallery') . '</p>
                <p><a href="' . esc_url($activate_url) . '" class="button-primary">' . esc_html__('Activate Elementor', 'advanced-image-gallery') . '</a></p>
            </div>
        ');
    }
}

// Prevent plugin activation if Elementor is not active
function zlfms_activate_plugin()
{
    if (!did_action('elementor/loaded')) {
        deactivate_plugins(plugin_basename(__FILE__)); // Deactivate this plugin
        wp_die(
            esc_html__('Elementor Advanced Gallery requires Elementor to be installed and activated. The plugin has been deactivated.', 'advanced-image-gallery'),
            esc_html__('Plugin dependency check failed', 'advanced-image-gallery'),
            array('back_link' => true)
        );
    }
}

register_activation_hook(__FILE__, 'zlfms_activate_plugin');

// Register the widget only if Elementor is active
function zlfms_register_media_gallery($widgets_manager)
{
    if (!did_action('elementor/loaded')) {
        return; // Stop if Elementor is not active
    }
    require_once plugin_dir_path(__FILE__) . 'widgets/class-image-gallery-widget.php';
    $widgets_manager->register(new zlfms_advanced_image_gallery());
}
add_action('elementor/widgets/register', 'zlfms_register_media_gallery');

// Enqueue styles and scripts for the plugin
function zlfms_enqueue_styles_scripts()
{
    // Enqueue styles and scripts on the frontend
    if (is_page() || is_single()) {
        wp_enqueue_script('jquery');// Ensure jQuery is loaded
        wp_enqueue_style('elementor_advanced_gallery_style', plugin_dir_url(__FILE__) . 'assets/css/advanced-gallery-style.css', [], '1.1.1'); // Custom CSS
        wp_enqueue_style('elementor_advanced_gallery_bundle_css', plugin_dir_url(__FILE__) . 'assets/swiper/swiper-bundle.min.css', [], '1.1.1'); //swiper bundle min css

        // Enqueue Elementor Font Awesome only if Elementor is active
        if (defined('ELEMENTOR_VERSION')) {
            wp_enqueue_style('elementor-fontawesome', plugins_url('/elementor/assets/lib/font-awesome/css/fontawesome.min.css'), [], ELEMENTOR_VERSION);
            wp_enqueue_style('elementor-fontawesome-regular', plugins_url('/elementor/assets/lib/font-awesome/css/regular.min.css'), [], ELEMENTOR_VERSION);
            wp_enqueue_style('elementor-fontawesome-brands', plugins_url('/elementor/assets/lib/font-awesome/css/brands.min.css'), [], ELEMENTOR_VERSION);
            wp_enqueue_style('elementor-fontawesome-solid', plugins_url('/elementor/assets/lib/font-awesome/css/solid.min.css'), [], ELEMENTOR_VERSION);
        }

        // Swiper library and custom initialization script
        wp_enqueue_script('elementor_swiper_gallery_carousel_element_js', plugin_dir_url(__FILE__) . 'assets/swiper/swiper-bundle.min.js', ['jquery'], '1.1.1', true); //swiper bundle min js
        wp_enqueue_script('elementor_advanced_gallery_carousel_js', plugin_dir_url(__FILE__) . 'assets/js/advanced-gallery-carousel.js', ['jquery'], '1.1.1', true); // advanced carousel js
        wp_enqueue_script('elementor_advanced_gallery_slideshow_js', plugin_dir_url(__FILE__) . 'assets/js/advanced-gallery-slideshow.js', ['jquery'], '1.1.1', true);// advanced slideshow js
    }
}
add_action('wp_enqueue_scripts', 'zlfms_enqueue_styles_scripts', 999);

add_action('admin_enqueue_scripts', 'zlgcb_register_counter_block_admin_assets');
function zlgcb_register_counter_block_admin_assets($hook_suffix)
{
    // Register the style for the block editor.
    wp_register_style(
        'zlfms-counter-block-gallery',
        plugins_url('assets/css/admin_gallery.css', __FILE__), // URL to the CSS file
        [], // Dependencies: WordPress block editor styles
        filemtime(plugin_dir_path(__FILE__) . 'assets/css/admin_gallery.css') // Version parameter: File modification time for cache-busting
    );

    // Enqueue the registered style
    wp_enqueue_style('zlfms-counter-block-gallery');

    // Check if we are on the Plugins page to enqueue the script
    if ($hook_suffix === 'plugins.php') {
        // Enqueue the script for the deactivation popup
        wp_enqueue_script(
            'zlfms-admin',
            plugin_dir_url(__FILE__) . 'assets/js/deactivation-feedback.js', // URL to the JavaScript file
            array('jquery'), // Dependencies: jQuery
            filemtime(plugin_dir_path(__FILE__) . 'assets/js/deactivation-feedback.js'), // Version parameter: File modification time for cache-busting
            true // Load the script in the footer
        );

        // Localize the script with necessary data
        wp_localize_script('zlfms-admin', 'zl_ajax_obj', array(
            'ajax_url' => admin_url('admin-ajax.php'), // URL for AJAX requests
            'nonce'    => wp_create_nonce('zlfms_deactivation_nonce') // Nonce for security
        ));
    }
}