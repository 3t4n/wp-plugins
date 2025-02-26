<?php

namespace DavidWenner\ATestimonialBuilder;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use DavidWenner\ATestimonialBuilder\ATBS_Handlers;
use DavidWenner\ATestimonialBuilder\ATBS_LayoutMapper;
 
class ATBS_Functions {

    /**
     * is_logged_in
     * @return boolean
     */
    public static function atbs_is_logged_in()
    {
        return get_option('atbs_is_logged_in', false) || static::atbs_is_guest_logged_in();
    }

    /**
     * is_guest_logged_in
     * @return boolean
     */
    public static function atbs_is_guest_logged_in()
    {
        return get_option('atbs_is_guest_logged_in', false);
    }

    /**
     * Login Form
     * @return string
     */
    public static function atbs_render_login_page()
    {
        if (!static::atbs_is_logged_in()) {
            require_once ATBS_DIR . 'includes/views/login-form.php';
        } else {
            wp_redirect(admin_url('admin.php?page=a-testimonial-builder'));
        }
    }

    /**
     * Logout
     */
    public static function atbs_render_logout_page()
    {
        if (get_option('atbs_is_logged_in', false)) {
            update_option('atbs_user_identity', null);
            update_option('atbs_is_logged_in', false);
        } else if (static::atbs_is_guest_logged_in()) {
            update_option('atbs_is_guest_logged_in', false);
        }
        return static::atbs_render_login_page();
    }

    /**
     * Manage page
     * @return string
     */
    public static function atbs_render_manage_page()
    {
        if (!static::atbs_is_logged_in()) {
            static::atbs_render_login_page();
        } else {
            // Verify nonce
            if (isset($_GET['atbs_nonce']) && !wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['atbs_nonce'])), 'atbs_contents')) {
                queue_flash_message(__('Nonce verification failed.', 'a-testimonial-builder'), 'error');
            }

            $search = isset($_GET['ContentSearch']) ? array_map('sanitize_text_field', wp_unslash($_GET['ContentSearch'])) : [];

            $contents = ATBS_Handlers::atbs_handle_get_content($search);

            require_once ATBS_DIR . 'includes/views/content.php';
        }
    }

    /**
     * Settings page
     * @return string
     */
    public static function atbs_render_settings_page()
    {
        if (!static::atbs_is_logged_in()) {
            static::atbs_render_login_page();
        } else {
            $settings = (new ATBS_LayoutMapper(ATBS_Handlers::atbs_handle_get_settings()))->map();
            $preview_url = static::atbs_get_preview_url();
            require_once ATBS_DIR . 'includes/views/settings.php';
        }
    }

    /**
     * atbs_get_preview_url
     * @return string|null
     */
    public static function atbs_get_preview_url()
    {
        if (($post_id = get_option('atbs_post_id', null)) && ($post = get_post($post_id))) {
            return get_preview_post_link($post);
        }
        return null;
    }

    /**
     * Profile page
     * @return string
     */
    public static function atbs_render_profile_page()
    {
        if (!static::atbs_is_logged_in()) {
            static::atbs_render_login_page();
        } else {
            $profile = ATBS_Handlers::atbs_handle_get_profile();
            require_once ATBS_DIR . 'includes/views/profile.php';
        }
    }

    /**
     * Capture page
     * @return string
     */
    public static function atbs_render_capture_page()
    {
        if (!static::atbs_is_logged_in()) {
            static::atbs_render_login_page();
        } else {
            $links = ATBS_Handlers::atbs_handle_get_capture_links();
            require_once ATBS_DIR . 'includes/views/capture.php';
        }
    }

    /**
     * Help page
     * @return string
     */
    public static function atbs_render_help_page()
    {
        require_once ATBS_DIR . 'includes/views/help.php';
    }
}
