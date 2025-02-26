<?php
/**
 * Plugin Name: QuadMenu - Storefront Mega Menu
 * Plugin URI: https://quadmenu.com
 * Description: Integrates QuadMenu with the Woocommerce Storefront theme.
 * Version: 1.1.2
 * Author: QuadMenu
 * Author URI: https://quadmenu.com
 * License: GPL
* License: GPLv3
 */
if (!defined('ABSPATH')) {
    die('-1');
}

if (!class_exists('QuadMenu_Storefront')) {

    final class QuadMenu_Storefront {

        function __construct() {

            add_action('admin_notices', array($this, 'notices'));

            add_filter('quadmenu_developer_options', array($this, 'options'), 10);
            add_filter('quadmenu_default_themes', array($this, 'themes'), 10);
            add_filter('quadmenu_default_options', array($this, 'general'), 10);
            add_filter('quadmenu_default_options_social', array($this, 'social'), 10);
            add_filter('quadmenu_default_options_theme_storefront_light', array($this, 'light'), 10);
            add_filter('quadmenu_default_options_theme_storefront_dark', array($this, 'dark'), 10);
            add_filter('quadmenu_default_options_location_primary', array($this, 'primary'), 10);

            //add_filter('quadmenu_locate_template', array($this, 'theme'), 10, 5);
        }

        function notices() {

            $screen = get_current_screen();

            if (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) {
                return;
            }

            $plugin = 'quadmenu/quadmenu.php';

            if (is_plugin_active($plugin)) {
                return;
            }

            if (is_quadmenu_installed()) {

                if (!current_user_can('activate_plugins')) {
                    return;
                }
                ?>
                <div class="error">
                    <p>
                        <a href="<?php echo wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1', 'activate-plugin_' . $plugin); ?>" class='button button-secondary'><?php _e('Activate QuadMenu', 'quadmenu'); ?></a>
                        <?php esc_html_e('QuadMenu Storefront not working because you need to activate the QuadMenu plugin.', 'quadmenu'); ?>   
                    </p>
                </div>
                <?php
            } else {

                if (!current_user_can('install_plugins')) {
                    return;
                }
                ?>
                <div class="error">
                    <p>
                        <a href="<?php echo wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=quadmenu'), 'install-plugin_quadmenu'); ?>" class='button button-secondary'><?php _e('Install QuadMenu', 'quadmenu'); ?></a>
                        <?php esc_html_e('QuadMenu Storefront not working because you need to install the QuadMenu plugin.', 'quadmenu'); ?>
                    </p>
                </div>
                <?php
            }
        }

        function themes($themes) {

            $themes['storefront_light'] = 'Storefront Light';
            $themes['storefront_dark'] = 'Storefront Dark';

            return $themes;
        }

        function general($defaults) {

            $defaults['viewport'] = 1;
            $defaults['styles'] = 1;
            $defaults['styles_normalize'] = 1;
            $defaults['styles_widgets'] = 1;
            $defaults['styles_icons'] = 'fontawesome';
            $defaults['styles_pscrollbar'] = 1;
            $defaults['gutter'] = 36;


            return $defaults;
        }

        function primary($defaults) {

            $defaults['theme'] = 'storefront_dark';

            return $defaults;
        }

        function options($options) {

            // Locations
            // -----------------------------------------------------------------
            $options['primary_integration'] = 1;
            $options['primary_unwrap'] = 0;

            // Dark
            // -----------------------------------------------------------------

            $options['storefront_dark_theme_title'] = 'Storefront Dark';
            $options['storefront_dark_layout_width_selector'] = '';
            $options['storefront_dark_layout_align'] = 'left';

            $options['storefront_dark_layout'] = 'collapse';
            $options['storefront_dark_layout_offcanvas_float'] = 'left';
            $options['storefront_dark_layout_classes'] = 'main-navigation';
            $options['storefront_dark_layout_width'] = 0;
            $options['storefront_dark_layout_width_inner'] = 0;
            $options['storefront_dark_layout_width_inner_selector'] = '';
            $options['storefront_dark_layout_sticky_divider'] = '';
            $options['storefront_dark_layout_sticky'] = 0;
            $options['storefront_dark_layout_sticky_offset'] = '90';
            //$options['storefront_dark_layout_divider'] = 'hide';
            $options['storefront_dark_layout_current'] = 0;
            $options['storefront_dark_layout_offcanvas_float'] = 'right';
            $options['storefront_dark_layout_hover_effect'] = '';
            $options['storefront_dark_layout_breakpoint'] = '768';
            $options['storefront_dark_mobile_shadow'] = 'hide';

            $options['storefront_dark_navbar_logo_bg'] = 'transparent';

            $options['storefront_dark_sticky'] = '';
            $options['storefront_dark_sticky_height'] = '70';
            $options['storefront_dark_sticky_background'] = 'transparent';
            $options['storefront_dark_sticky_logo_height'] = '25';

            $options['storefront_dark_navbar_logo'] = array();
            $options['storefront_dark_navbar_height'] = '78';
            $options['storefront_dark_navbar_width'] = '260';
            $options['storefront_dark_navbar_background'] = 'color';
            $options['storefront_dark_navbar_background_color'] = 'transparent';
            $options['storefront_dark_navbar_background_to'] = 'transparent';

            $options['storefront_dark_navbar_background_deg'] = '17';

            // Light
            // -----------------------------------------------------------------

            $options['storefront_light_theme_title'] = 'Storefront Dark';
            $options['storefront_light_layout_width_selector'] = '';
            $options['storefront_light_layout_align'] = 'left';
            $options['storefront_light_layout'] = 'collapse';
            $options['storefront_light_layout_offcanvas_float'] = 'left';
            $options['storefront_light_layout_classes'] = 'main-navigation';
            $options['storefront_light_layout_width'] = 0;
            $options['storefront_light_layout_width_inner'] = 0;
            $options['storefront_light_layout_width_inner_selector'] = '';
            $options['storefront_light_layout_sticky_divider'] = '';
            $options['storefront_light_layout_sticky'] = 0;
            $options['storefront_light_layout_sticky_offset'] = '90';
            //$options['storefront_light_layout_divider'] = 'hide';
            $options['storefront_light_layout_current'] = 0;
            $options['storefront_light_layout_offcanvas_float'] = 'right';
            $options['storefront_light_layout_hover_effect'] = '';
            $options['storefront_light_layout_breakpoint'] = '768';
            $options['storefront_light_mobile_shadow'] = 'hide';

            $options['storefront_light_navbar_logo_bg'] = 'transparent';

            $options['storefront_light_sticky'] = '';
            $options['storefront_light_sticky_height'] = '70';
            $options['storefront_light_sticky_background'] = 'transparent';
            $options['storefront_light_sticky_logo_height'] = '25';

            $options['storefront_light_navbar_logo'] = array();
            $options['storefront_light_navbar_height'] = '78';
            $options['storefront_light_navbar_width'] = '260';
            $options['storefront_light_navbar_background'] = 'color';
            $options['storefront_light_navbar_background_color'] = 'transparent';
            $options['storefront_light_navbar_background_to'] = 'transparent';

            $options['storefront_light_navbar_background_deg'] = '17';

            // CSS
            // -----------------------------------------------------------------

            $options['css'] = '
                    @media (min-width: 768px) {
                        #masthead .col-full {
                            position: relative;
                        }
                    }
                    .site-header {
                        border-bottom: 0;
                    }
                    #quadmenu.quadmenu-storefront_light,
                    #quadmenu.quadmenu-storefront_light .quadmenu-container,
                    #quadmenu.quadmenu-storefront_dark,
                    #quadmenu.quadmenu-storefront_dark .quadmenu-container {
                        position: initial!important;
                    }
                    #quadmenu.quadmenu-storefront_light.quadmenu-align-left .quadmenu-navbar-toggle,
                    #quadmenu.quadmenu-storefront_dark.quadmenu-align-left .quadmenu-navbar-toggle {
                        margin: 28px;
                        position: absolute;
                        top: 0;
                        right: 0;
                    }
                    #quadmenu.quadmenu-storefront_light.quadmenu-is-horizontal .quadmenu-navbar-nav > li:first-child > a > .quadmenu-item-content,
                    #quadmenu.quadmenu-storefront_dark.quadmenu-is-horizontal .quadmenu-navbar-nav > li:first-child > a > .quadmenu-item-content {
                        padding-left: 0;
                    }
                    #quadmenu.quadmenu-storefront_light .widget_recent_entries ul, 
                    #quadmenu.quadmenu-storefront_light .widget_pages ul, 
                    #quadmenu.quadmenu-storefront_light .widget_categories ul, 
                    #quadmenu.quadmenu-storefront_light .widget_archive ul, 
                    #quadmenu.quadmenu-storefront_light .widget_recent_comments ul, 
                    #quadmenu.quadmenu-storefront_light .widget_nav_menu ul, 
                    #quadmenu.quadmenu-storefront_light .widget_links ul, 
                    #quadmenu.quadmenu-storefront_light .widget_product_categories ul, 
                    #quadmenu.quadmenu-storefront_light .widget_layered_nav ul, 
                    #quadmenu.quadmenu-storefront_light .widget_layered_nav_filters ul,
                    #quadmenu.quadmenu-storefront_dark .widget_recent_entries ul, 
                    #quadmenu.quadmenu-storefront_dark .widget_pages ul, 
                    #quadmenu.quadmenu-storefront_dark .widget_categories ul, 
                    #quadmenu.quadmenu-storefront_dark .widget_archive ul, 
                    #quadmenu.quadmenu-storefront_dark .widget_recent_comments ul, 
                    #quadmenu.quadmenu-storefront_dark .widget_nav_menu ul, 
                    #quadmenu.quadmenu-storefront_dark .widget_links ul, 
                    #quadmenu.quadmenu-storefront_dark .widget_product_categories ul, 
                    #quadmenu.quadmenu-storefront_dark .widget_layered_nav ul, 
                    #quadmenu.quadmenu-storefront_dark .widget_layered_nav_filters ul {
                        padding-left: 1.618em;
                    }
            ';

            return $options;
        }

        function dark($defaults) {

            // Layout
            // -----------------------------------------------------------------

            $defaults['layout_caret'] = 'show';
            $defaults['layout_trigger'] = 'hoverintent';
            $defaults['layout_breakpoint'] = '768';
            $defaults['layout_hover_effect'] = '';
            $defaults['layout_animation'] = 'quadmenu_btt';

            // Fonts
            // -----------------------------------------------------------------
            $defaults['navbar_font'] = $defaults['font'] = array(
                'font-family' => 'Source Sans Pro',
                //'google' => true,
                'font-size' => '14',
                'font-weight' => '400',
            );

            $defaults['dropdown_font'] = array(
                'font-family' => 'Source Sans Pro',
                //'google' => true,
                'font-size' => '13',
                'font-weight' => '400',
            );

            // Navbar
            // -----------------------------------------------------------------

            $defaults['navbar_logo'] = array();
            $defaults['navbar_height'] = '78';
            $defaults['navbar_width'] = '260';
            $defaults['navbar_toggle_open'] = '#96588a';
            $defaults['navbar_toggle_close'] = '#96588a';
            $defaults['navbar_mobile_border'] = 'transparent';
            $defaults['navbar_background'] = 'color';
            $defaults['navbar_background_color'] = 'transparent';
            $defaults['navbar_background_to'] = 'transparent';

            $defaults['navbar_background_deg'] = '17';

            $defaults['navbar_sharp'] = 'rgba(255,255,255,0.05)';
            $defaults['navbar_text'] = '#9aa0a7';

            $defaults['navbar_logo_height'] = '60';
            $defaults['navbar_link'] = '#d5d9db';
            $defaults['navbar_link_hover'] = '#ffffff';
            $defaults['navbar_link_bg'] = 'transparent';
            $defaults['navbar_link_bg_hover'] = 'transparent';
            $defaults['navbar_link_hover_effect'] = 'transparent';
            $defaults['navbar_link_margin'] = array('border-top' => '0', 'border-right' => '0', 'border-left' => '0', 'border-bottom' => '0');
            $defaults['navbar_link_radius'] = array('border-top' => '0', 'border-right' => '0', 'border-left' => '0', 'border-bottom' => '0');
            $defaults['navbar_link_transform'] = '';
            $defaults['navbar_link_icon'] = '#96588a';
            $defaults['navbar_link_icon_hover'] = '#ffffff';
            $defaults['navbar_link_subtitle'] = '#9aa0a7';
            $defaults['navbar_link_subtitle_hover'] = '#9aa0a7';
            $defaults['navbar_button'] = '#ffffff';
            $defaults['navbar_button_hover'] = '#ffffff';
            $defaults['navbar_button_bg'] = '#96588a';
            $defaults['navbar_button_bg_hover'] = '#000000';
            $defaults['navbar_badge'] = '#96588a';
            $defaults['navbar_badge_color'] = '#ffffff';
            $defaults['navbar_scrollbar'] = '#96588a';
            $defaults['navbar_scrollbar_rail'] = '#ffffff';

            // Dropdown
            // -------------------------------------------------------------------------
            $defaults['dropdown_margin'] = 0;
            $defaults['dropdown_radius'] = 0;
            $defaults['dropdown_border'] = array('border-all' => '0', 'border-top' => '0', 'border-color' => '#ffffff');
            $defaults['dropdown_background'] = '#ffffff';
            $defaults['dropdown_scrollbar'] = '#222222';
            $defaults['dropdown_scrollbar_rail'] = '#eeeeee';
            $defaults['dropdown_title'] = '#1d1e24';
            $defaults['dropdown_title_border'] = array('border-all' => '1', 'border-top' => '1', 'border-color' => '#eeeeee', 'border-style' => 'solid');
            $defaults['dropdown_link'] = '#333333';
            $defaults['dropdown_link_hover'] = '#96588a';
            $defaults['dropdown_link_bg_hover'] = '#eaeff3';
            $defaults['dropdown_link_border'] = array('border-all' => '0', 'border-top' => '0', 'border-color' => '#eee', 'border-style' => 'solid');
            $defaults['dropdown_link_transform'] = '';
            $defaults['dropdown_button'] = '#ffffff';
            $defaults['dropdown_button_bg'] = '#96588a';
            $defaults['dropdown_button_hover'] = '#ffffff';
            $defaults['dropdown_button_bg_hover'] = '#7d3f71';
            $defaults['dropdown_link_icon'] = '#96588a';
            $defaults['dropdown_link_icon_hover'] = '#96588a';
            $defaults['dropdown_link_subtitle'] = '#6d6d6d';
            $defaults['dropdown_link_subtitle_hover'] = '#6d6d6d';

            return $defaults;
        }

        function light($defaults) {

            // Layout
            // -----------------------------------------------------------------
            $defaults['layout'] = 'collapse';
            $defaults['layout_offcanvas_float'] = 'left';
            $defaults['layout_caret'] = 'show';
            $defaults['layout_trigger'] = 'hoverintent';
            $defaults['layout_classes'] = 'main-navigation';
            $defaults['layout_breakpoint'] = '768';
            $defaults['layout_hover_effect'] = '';
            $defaults['layout_animation'] = 'quadmenu_btt';

            // Fonts
            // -----------------------------------------------------------------
            $defaults['navbar_font'] = $defaults['font'] = array(
                'font-family' => 'Source Sans Pro',
                //'google' => true,
                'font-size' => '14',
                'font-weight' => '400',
            );

            $defaults['dropdown_font'] = array(
                'font-family' => 'Source Sans Pro',
                //'google' => true,
                'font-size' => '13',
                'font-weight' => '400',
            );

            // Navbar
            // -----------------------------------------------------------------


            $defaults['navbar_toggle_open'] = '#96588a';
            $defaults['navbar_toggle_close'] = '#96588a';
            $defaults['navbar_mobile_border'] = 'transparent';

            $defaults['navbar_sharp'] = 'transparent';
            $defaults['navbar_text'] = '#9aa0a7';

            $defaults['navbar_logo_height'] = '60';
            $defaults['navbar_link'] = '#333333';
            $defaults['navbar_link_hover'] = '#747474';
            $defaults['navbar_link_bg'] = 'transparent';
            $defaults['navbar_link_bg_hover'] = 'transparent';
            $defaults['navbar_link_hover_effect'] = 'transparent';
            $defaults['navbar_link_margin'] = array('border-top' => '0', 'border-right' => '0', 'border-left' => '0', 'border-bottom' => '0');
            $defaults['navbar_link_radius'] = array('border-top' => '0', 'border-right' => '0', 'border-left' => '0', 'border-bottom' => '0');
            $defaults['navbar_link_transform'] = '';
            $defaults['navbar_link_icon'] = '#96588a';
            $defaults['navbar_link_icon_hover'] = '#ffffff';
            $defaults['navbar_link_subtitle'] = '#9aa0a7';
            $defaults['navbar_link_subtitle_hover'] = '#9aa0a7';
            $defaults['navbar_button'] = '#ffffff';
            $defaults['navbar_button_hover'] = '#ffffff';
            $defaults['navbar_button_bg'] = '#96588a';
            $defaults['navbar_button_bg_hover'] = '#000000';
            $defaults['navbar_badge'] = '#96588a';
            $defaults['navbar_badge_color'] = '#ffffff';
            $defaults['navbar_scrollbar'] = '#96588a';
            $defaults['navbar_scrollbar_rail'] = '#ffffff';

            // Dropdown
            // -------------------------------------------------------------------------
            $defaults['dropdown_margin'] = 0;
            $defaults['dropdown_radius'] = 0;
            $defaults['dropdown_border'] = array('border-all' => '0', 'border-top' => '0', 'border-color' => '#ffffff');
            $defaults['dropdown_background'] = '#ffffff';
            $defaults['dropdown_scrollbar'] = '#222222';
            $defaults['dropdown_scrollbar_rail'] = '#eeeeee';
            $defaults['dropdown_title'] = '#1d1e24';
            $defaults['dropdown_title_border'] = array('border-all' => '1', 'border-top' => '1', 'border-color' => '#eeeeee', 'border-style' => 'solid');
            $defaults['dropdown_link'] = '#333333';
            $defaults['dropdown_link_hover'] = '#96588a';
            $defaults['dropdown_link_bg_hover'] = '#eaeff3';
            $defaults['dropdown_link_border'] = array('border-all' => '0', 'border-top' => '0', 'border-color' => '#eee', 'border-style' => 'solid');
            $defaults['dropdown_link_transform'] = '';
            $defaults['dropdown_button'] = '#ffffff';
            $defaults['dropdown_button_bg'] = '#96588a';
            $defaults['dropdown_button_hover'] = '#ffffff';
            $defaults['dropdown_button_bg_hover'] = '#7d3f71';
            $defaults['dropdown_link_icon'] = '#96588a';
            $defaults['dropdown_link_icon_hover'] = '#96588a';
            $defaults['dropdown_link_subtitle'] = '#6d6d6d';
            $defaults['dropdown_link_subtitle_hover'] = '#6d6d6d';

            return $defaults;
        }

        function social($social) {

            return array(
                array(
                    'title' => 'Facebook',
                    'icon' => 'fa fa-facebook ',
                    'url' => 'https://facebook.com/groups/quadmenu',
                ),
                array(
                    'title' => 'Twitter',
                    'icon' => 'fa fa-twitter',
                    'url' => 'https://facebook.com/groups/quadmenu',
                ),
                array(
                    'title' => 'Google',
                    'icon' => 'fa fa-google-plus',
                    'url' => 'https://facebook.com/groups/quadmenu',
                ),
                array(
                    'title' => 'RSS',
                    'icon' => 'fa fa-rss',
                    'url' => 'https://facebook.com/groups/quadmenu',
                ),
            );
        }

        static function activation() {

            update_option('_quadmenu_compiler', true);

            if (class_exists('QuadMenu')) {

                QuadMenu_Redux::add_notification('blue', esc_html__('Thanks for install QuadMenu Storefront. We have to create the stylesheets. Please wait.', 'quadmenu'));

                QuadMenu_Activation::activation();
            }
        }

    }

    new QuadMenu_Storefront();

    register_activation_hook(__FILE__, array('QuadMenu_Storefront', 'activation'));
}

if (!function_exists('storefront_primary_navigation')) {

    function storefront_primary_navigation() {

        wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container_class' => 'primary-navigation',
                )
        );
    }

}

if (!function_exists('is_quadmenu_installed')) {

    function is_quadmenu_installed() {

        $file_path = 'quadmenu/quadmenu.php';

        $installed_plugins = get_plugins();

        return isset($installed_plugins[$file_path]);
    }

}
