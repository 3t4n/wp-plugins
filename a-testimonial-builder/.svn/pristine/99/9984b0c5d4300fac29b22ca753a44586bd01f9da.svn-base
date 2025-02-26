<?php

namespace DavidWenner\ATestimonialBuilder;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Enqueue plugin stylesheets and scripts
 */
class ATBS_Assets {

    public function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'atbs_enqueue_assets']);
    }

    public function atbs_enqueue_assets()
    {
        //Register main css (if not already registered)
        wp_register_style('a-testimonial-builder-core', ATBS_URL . 'assets/css/bootstrap.min.css', [], '1.0');
        wp_register_style('a-testimonial-builder-fancybox', ATBS_URL . 'assets/plugins/fancybox/fancybox.css', [], '1.0');
        wp_register_style('a-testimonial-builder-colorpicker', ATBS_URL . 'assets/css/bootstrap-colorpicker.css', [], '1.0');
        wp_register_style('a-testimonial-builder-style', ATBS_URL . 'assets/css/vocalreferences-plugin.css', [], '1.0');

        // Enqueue the css
        wp_enqueue_style('a-testimonial-builder-core');
        wp_enqueue_style('a-testimonial-builder-fancybox');
        wp_enqueue_style('a-testimonial-builder-fancybox');
        wp_enqueue_style('a-testimonial-builder-colorpicker');
        wp_enqueue_style('a-testimonial-builder-style');

        // Register main scripts (if not already registered)
        wp_register_script('a-testimonial-builder-bootstrap-bundle', ATBS_URL . 'assets/js/bootstrap.bundle.js', array('jquery'), '1.0', true);
        wp_register_script('a-testimonial-builder-fancybox', ATBS_URL . 'assets/plugins/fancybox/jquery.fancybox.min.js', array('jquery'), '1.0', true);
        wp_register_script('a-testimonial-builder-colorpicker', ATBS_URL . 'assets/js/bootstrap-colorpicker.min.js', array('jquery'), '1.0', true);
        wp_register_script('a-testimonial-builder-script', ATBS_URL . 'assets/js/vocalreferences-plugin.js', array('jquery'), '1.0', true);

        // Enqueue the script
        wp_enqueue_script('a-testimonial-builder-bootstrap');
        wp_enqueue_script('a-testimonial-builder-bootstrap-bundle');
        wp_enqueue_script('a-testimonial-builder-fancybox');
        wp_enqueue_script('a-testimonial-builder-colorpicker');
        wp_enqueue_script('a-testimonial-builder-script');

        // Prepare the localized data
        $localization_data = [
            'Are you sure you want to delete the testimonial?' => __('Are you sure you want to delete the testimonial?', 'a-testimonial-builder'),
            'Are you sure you want to approve the testimonial?' => __('Are you sure you want to approve the testimonial?', 'a-testimonial-builder'),
        ];

        // Prepare initialization variables
        $init_data = [
            'oauth_token' => get_option('atbs_oauth_token'),
            'identity' => get_option('atbs_user_identity', null) ?: get_option('atbs_guest_identity', null),
            'api_url' => ATBS_API_URL,
        ];

        // Construct the inline script
        $inline_script = sprintf(
                'ATBS_Plugin.i18n(%s); ATBS_Plugin.init(%s);',
                wp_json_encode($localization_data),
                wp_json_encode($init_data)
        );

        // Add the inline script
        wp_add_inline_script('a-testimonial-builder-script', $inline_script);
    }
}
