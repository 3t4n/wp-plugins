<?php

/**
 * Plugin Name: DataMentor
 * Description: This plugin is used to insert data table using elementor editor.
 * Plugin URL: https://wordpress.org/plugins/datamentor/
 * Version: 1.7
 * Author: Auburnforest
 * Author URI: https://auburnforest.com
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Elementor tested up to: 3.22.3
 * Elementor Pro tested up to: 3.22.1
 * Text Domain: datamentor
 * Domain Path: /languages/
 */
/*
 * Exit if accessed directly
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Define Plugin URL and Directory Path
 */
define('DMELE_URL', plugins_url('/', __FILE__));  // Define Plugin URL
define('DMELE_PATH', plugin_dir_path(__FILE__));  // Define Plugin Directory Path
define('DMELE_DOMAIN', 'datamentor');  // Define Plugin Text-domain

/**
 * Load plugin text-domain.
 *
 * @since 1.0.0
 */
function dmele_elementor_elments_load_plugin_textdomain() {
    load_plugin_textdomain('datamentor', false, dirname(plugin_basename(__FILE__)) . '/languages');
}

add_action('plugins_loaded', 'dmele_elementor_elments_load_plugin_textdomain');

/**
 * Require files.
 *
 * DataMentor Elementor Elements Register Elements ( Widgets).
 *
 * @since 1.0.0
 */
if (!function_exists('dmele_elements_widget_register')) {

    function dmele_elements_widget_register() {
        require_once DMELE_PATH . 'includes/elements/datamentor-table.php';
        require_once DMELE_PATH . 'includes/datamentor-functions.php';
    }

}
add_action('elementor/widgets/register', 'dmele_elements_widget_register');

/**
 * DataMentor Elementor Elements Register Categories.
 *
 * @since 1.0.0
 */
function dmele_elementor_elments_categories_registered($elements_manager) {

    $elements_manager->add_category(
            'datamentor', [
        'title' => __('DataMentor', 'datamentor'),
        'icon' => 'fa fa-plug'
            ]
    );
}

add_action('elementor/elements/categories_registered', 'dmele_elementor_elments_categories_registered');

/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 */
if (!function_exists('dmele_elements_widget_script_register')) {

    function dmele_elements_widget_script_register() {
        wp_register_style('common-dm-style', DMELE_URL . 'assets/css/common-dm-style.css', array(), 1.0,  false);
        wp_enqueue_style('common-dm-style');
    }

}
add_action('wp_enqueue_scripts', 'dmele_elements_widget_script_register');

/**
 * Check current version of Elementor
 */
if (!function_exists('dmele_elements_plugin_load')) {

    function dmele_elements_plugin_load() {

        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', 'dmele_elements_widget_fail_load');
            return;
        }
        $elementor_version_required = '1.1.2';
        if (!version_compare(ELEMENTOR_VERSION, $elementor_version_required, '>=')) {
            add_action('admin_notices', 'dmele_elements_elementor_update_notice');
            return;
        }
    }

}
add_action('plugins_loaded', 'dmele_elements_plugin_load');

/**
 * This notice will appear if Elementor is not installed or activated or both
 */
if (!function_exists('dmele_elements_widget_fail_load')) {

    function dmele_elements_widget_fail_load() {
        $screen = get_current_screen();
        if (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) {
            return;
        }

        $plugin = 'elementor/elementor.php';

        if (dmele_elements_elementor_installed()) {
            if (!current_user_can('activate_plugins')) {
                return;
            }
            $activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin);

            $message = '<p><strong>' . esc_html__('DataMentor', 'datamentor') . '</strong>' . esc_html__('widgets not working because you need to activate the Elementor plugin.', 'datamentor') . '</p>';
            $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $activation_url, esc_html__('Activate Elementor Now', 'datamentor')) . '</p>';
        } else {
            if (!current_user_can('install_plugins')) {
                return;
            }

            $install_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=elementor'), 'install-plugin_elementor');

            $message = '<p><strong>' . esc_html__('DataMentor', 'datamentor') . '</strong>' . esc_html__('widgets not working because you need to install the Elemenor plugin', 'datamentor') . '</p>';
            $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $install_url, esc_html__('Install Elementor Now', 'datamentor')) . '</p>';
        }

        echo '<div class="error"><p>' . wp_kses_post($message) . '</p></div>';
    }

}

/**
 * Display admin notice for Elementor update if Elementor version is old
 */
if (!function_exists('dmele_elements_elementor_update_notice')) {

    function dmele_elements_elementor_update_notice() {
        if (!current_user_can('update_plugins')) {
            return;
        }

        $file_path = 'elementor/elementor.php';

        $upgrade_link = wp_nonce_url(self_admin_url('update.php?action=upgrade-plugin&plugin=') . $file_path, 'upgrade-plugin_' . $file_path);
        $message = '<p> <strong>' . esc_html__('DataMentor', 'datamentor') . '</strong>' . esc_html__( 'widgets not working because you are using an old version of Elementor.', 'datamentor') . '</p>';
        $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $upgrade_link, esc_html__('Update Elementor Now', 'datamentor')) . '</p>';
        echo '<div class="error">' . wp_kses_post($message) . '</div>';
    }

}

/**
 * Action when plugin installed
 */
if (!function_exists('dmele_elements_elementor_installed')) {

    function dmele_elements_elementor_installed() {

        $file_path = 'elementor/elementor.php';
        $installed_plugins = get_plugins();

        return isset($installed_plugins[$file_path]);
    }

}

/**
 * Add reviews metadata on plugin activation
 */
if (!function_exists('dmele_elements_plugin_activation')) {

    function dmele_elements_plugin_activation() {
        $notices = get_option('datamentor_reviews', array());

        $notices[] = '<p>' . __('Hi, you are now using <strong>DataMentor</strong> plugin. I would really appreciate it if you could give me the five star to our plugin.', 'datamentor') . '</p><p>' . __('<a href="https://wordpress.org/support/plugin/datamentor/reviews/?filter=5#new-post" target="_blank" class="rating-link"><strong> Okay, you deserve it </strong></a>', 'datamentor') . '</p>';
        update_option('datamentor_reviews', $notices);
    }

}
register_activation_hook(__FILE__, 'dmele_elements_plugin_activation');

/**
 * Display admin notice on DataMentor activation for ratings
 */
if (!function_exists('dmele_elements_reviews_notices')) {

    function dmele_elements_reviews_notices() {
        if ($notices = get_option('datamentor_reviews')) {
            foreach ($notices as $notice) {
                echo "<div class='notice notice-success is-dismissible'><p>" . wp_kses_post($notice) . "</p></div>";
            }
            delete_option('datamentor_reviews');
        }
    }

    add_action('admin_notices', 'dmele_elements_reviews_notices');
}

/**
 * Remove reviews metadata on plugin deactivation.
 */
if (!function_exists('dmele_elements_plugin_deactivation')) {

    function dmele_elements_plugin_deactivation() {
        delete_option('datamentor_reviews');
    }

}
register_deactivation_hook(__FILE__, 'dmele_elements_plugin_deactivation');
