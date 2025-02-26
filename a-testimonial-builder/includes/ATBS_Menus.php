<?php

namespace DavidWenner\ATestimonialBuilder;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use DavidWenner\ATestimonialBuilder\ATBS_Functions;

class ATBS_Menus {

    private $_functions;
    
    public function __construct()
    {
        $this->_functions = new ATBS_Functions();
        // Register the plugin menu and submenu pages
        add_action('admin_menu', [$this, 'atbs_register_menu_pages']);
    }

    public function atbs_register_menu_pages()
    {
        add_menu_page(
                __('VocalReferences', 'a-testimonial-builder'),
                __('VocalReferences', 'a-testimonial-builder'),
                'manage_options',
                'a-testimonial-builder',
                [$this->_functions, 'atbs_render_manage_page'],
                'dashicons-format-chat',
                26
        );

        add_submenu_page(
                'a-testimonial-builder',
                __('Manage Testimonials', 'a-testimonial-builder'),
                __('Manage Testimonials', 'a-testimonial-builder'),
                'manage_options',
                'a-testimonial-builder', [$this->_functions, 'atbs_render_manage_page']);

        add_submenu_page(
                'a-testimonial-builder',
                __('Display Settings', 'a-testimonial-builder'),
                __('Display Settings', 'a-testimonial-builder'),
                'manage_options',
                'a-testimonial-builder-settings',
                [$this->_functions, 'atbs_render_settings_page']
        );
        add_submenu_page(
                'a-testimonial-builder',
                __('Profile', 'a-testimonial-builder'),
                __('Profile', 'a-testimonial-builder'),
                'manage_options',
                'a-testimonial-builder-profile',
                [$this->_functions, 'atbs_render_profile_page']
        );
        add_submenu_page(
                'a-testimonial-builder',
                __('Capture URL', 'a-testimonial-builder'),
                __('Capture URL', 'a-testimonial-builder'),
                'manage_options',
                'a-testimonial-builder-capture',
                [$this->_functions, 'atbs_render_capture_page']
        );
        add_submenu_page(
                'a-testimonial-builder',
                __('Help', 'a-testimonial-builder'),
                __('Help', 'a-testimonial-builder'),
                'manage_options',
                'a-testimonial-builder-help',
                [$this->_functions, 'atbs_render_help_page']
        );

        if (ATBS_Functions::atbs_is_logged_in()) {
            if (ATBS_Functions::atbs_is_guest_logged_in()) {
                add_submenu_page(
                        'a-testimonial-builder',
                        __('Logout', 'a-testimonial-builder'),
                        __('Logout (Guest)', 'a-testimonial-builder'),
                        'manage_options',
                        'a-testimonial-builder-logout',
                        [$this->_functions, 'atbs_render_logout_page']
                );
            } else {
                add_submenu_page(
                        'a-testimonial-builder',
                        __('Logout', 'a-testimonial-builder'),
                        __('Logout', 'a-testimonial-builder'),
                        'manage_options',
                        'a-testimonial-builder-logout',
                        [$this->_functions, 'atbs_render_logout_page']
                );
            }
        }
    }
}
