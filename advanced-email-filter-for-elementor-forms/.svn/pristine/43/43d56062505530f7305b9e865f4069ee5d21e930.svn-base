<?php
namespace AEFE;

if (!defined('ABSPATH')) {
    exit;
}


class Admin_Notice {
    private $notice_type;

    public function __construct($type = 'elementor_pro') {
        $this->notice_type = $type;
        add_action('admin_notices', [$this, 'show_admin_notice']);
    }

    public function show_admin_notice() {
        if ($this->notice_type === 'pro-active') {
            $this->show_free_version_notice();
        } else {
            $this->show_missing_elementor_notice();
        }
    }

    private function show_free_version_notice() {
        $message = sprintf(
            /* translators: 1: Plugin name */
            esc_html__('Please deactivate the Pro version of %1$s before activating the Free version.', 'advanced-email-filter-for-elementor-forms'),
            '<strong>' . esc_html__('Advanced Email Filter for Elementor Forms', 'advanced-email-filter-for-elementor-forms') . '</strong>'
        );

        printf(
            '<div class="notice notice-error"><p>%s</p></div>',
            wp_kses_post($message)
        );
    }

    public function show_missing_elementor_notice() {
        $message = sprintf(
            /* translators: 1: Plugin name, 2: Elementor Pro */
            esc_html__('%1$s requires %2$s to be installed and activated.', 'advanced-email-filter-for-elementor-forms'),
            '<strong>' . esc_html__('Advanced Email Filter for Elementor Forms', 'advanced-email-filter-for-elementor-forms') . '</strong>',
            '<strong>' . esc_html__('Elementor Pro', 'advanced-email-filter-for-elementor-forms') . '</strong>'
        );
    
        printf(
            '<div class="notice notice-error"><p>%s</p></div>',
            wp_kses_post($message)
        );
    }
}