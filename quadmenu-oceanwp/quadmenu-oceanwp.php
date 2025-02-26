<?php
/**
 * Plugin Name: QuadMenu - OceanWP
 * Plugin URI: https://quadmenu.com
 * Description: Integrates QuadMenu with the Divi theme.
 * Version: 1.0.4
 * Author: QuadMenu
 * Author URI: https://quadmenu.com
 * License: codecanyon
* License: GPLv3
 */
if (!defined('ABSPATH')) {
    die('-1');
}

if (!class_exists('QuadMenu_OceanWP')) {

    final class QuadMenu_OceanWP {

        function __construct() {

            add_action('admin_notices', array($this, 'notices'));
            add_filter('quadmenu_developer_options', array($this, 'developer'), 10);
            add_filter('quadmenu_default_themes', array($this, 'themes'), 10);
            add_filter('quadmenu_default_options', array($this, 'defaults'), 10);
            add_filter('quadmenu_default_options_social', array($this, 'social'), 10);
            add_filter('quadmenu_default_options_theme_oceanwp', array($this, 'oceanwp'), 10);
            add_filter('quadmenu_default_options_location_main_menu', array($this, 'main_menu'), 10);

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
                        <?php esc_html_e('QuadMenu OceanWP not working because you need to activate the QuadMenu plugin.', 'quadmenu'); ?>   
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
                        <?php esc_html_e('QuadMenu OceanWP not working because you need to install the QuadMenu plugin.', 'quadmenu'); ?>
                    </p>
                </div>
                <?php
            }
        }

        function themes($themes) {
            $themes['oceanwp'] = 'OceanWP';

            return $themes;
        }

        function defaults($defaults) {

            $defaults['viewport'] = 1;
            $defaults['styles'] = 1;
            $defaults['styles_normalize'] = 1;
            $defaults['styles_widgets'] = 1;
            $defaults['styles_icons'] = 'fontawesome';
            $defaults['styles_pscrollbar'] = 1;
            $defaults['gutter'] = 40;
            $defaults['css'] = '
                    #quadmenu.quadmenu-is-horizontal .quadmenu-navbar-nav>li.quadmenu-item-type-tabs>.quadmenu-dropdown-menu>ul>li>ul.quadmenu-tabs>li.quadmenu-item-type-tab {
                        background-color: rgb(245, 245, 245);
                    }

                    #sidr {
                        display: none!important;
                    }              
                    #quadmenu.quadmenu-oceanwp:not(.quadmenu-is-horizontal) .navbar-offcanvas {
                        background-color: #333;
                    }
                    #quadmenu.quadmenu-oceanwp {
                        position: absolute;
                        background-color: transparent;
                        z-index: 9999;
                        left: 0;
                        right: 0;
                        width: 100%;
                    }
                    #quadmenu.quadmenu-oceanwp .quadmenu-navbar-nav > li.quadmenu-item:last-child .quadmenu-item-content, 
                    #quadmenu.quadmenu-oceanwp .quadmenu-navbar-nav > li.quadmenu-item:last-child .quadmenu-toggle-container {
                        padding-right: 15px;
                    }
                    #quadmenu.quadmenu-oceanwp .quadmenu-navbar-brand {
                        padding-left: 0;
                        padding-right: 0;
                    }
                    #quadmenu.quadmenu-oceanwp.quadmenu-is-horizontal .quadmenu-navbar-nav li > .quadmenu-dropdown-menu,
                    #quadmenu.quadmenu-oceanwp.quadmenu-is-horizontal .quadmenu-navbar-nav li > .quadmenu-dropdown-menu {
                        border-top: 4px solid #52a7fe;
                    }                

            ';

            return $defaults;
        }

        function main_menu($defaults) {

            $defaults['integration'] = 1;
            $defaults['theme'] = 'oceanwp';

            return $defaults;
        }

        function developer($options) {

            // Locations
            // -----------------------------------------------------------------
            $options['main_menu_unwrap'] = 0;

            // Themes
            // -----------------------------------------------------------------

            $options['oceanwp_theme_title'] = 'OceanWP';
            //$options['oceanwp_layout_width_selector'] = '.elementor-container';
            $options['oceanwp_layout_sticky_divider'] = '';
            $options['oceanwp_layout_sticky'] = 0;
            $options['oceanwp_layout_sticky_offset'] = '90';
            $options['oceanwp_layout_divider'] = 'hide';
            $options['oceanwp_layout_current'] = 0;
            $options['oceanwp_layout_hover_effect'] = '';
            $options['oceanwp_layout_breakpoint'] = '768';

            $options['oceanwp_sticky'] = '';
            $options['oceanwp_sticky_height'] = '70';
            $options['oceanwp_sticky_background'] = 'transparent';
            $options['oceanwp_sticky_logo_height'] = '25';

            return $options;
        }

        function oceanwp($defaults) {

            // Layout
            // -----------------------------------------------------------------

            $defaults['layout'] = 'offcanvas';
            $defaults['layout_offcanvas_float'] = 'right';
            $defaults['layout_caret'] = 'show';
            $defaults['layout_trigger'] = 'hoverintent';
            $defaults['layout_classes'] = 'main-navigation';
            $defaults['layout_breakpoint'] = '768';
            $defaults['layout_hover_effect'] = '';
            $defaults['layout_animation'] = 'quadmenu_btt';

            // Fonts
            // -----------------------------------------------------------------
            $defaults['navbar_font'] = array(
                'font-family' => 'Dosis',
                'google' => true,
                'font-size' => '13',
                'font-weight' => '600',
            );

            $defaults['font'] = $defaults['dropdown_font'] = array(
                'font-family' => 'Dosis',
                'google' => true,
                'font-size' => '12',
                'font-weight' => '400',
            );

            // Navbar
            // -----------------------------------------------------------------
            $defaults['navbar_logo'] = array(
                'url' => plugin_dir_url(__FILE__) . 'images/logo.png'
            );
            $defaults['navbar_height'] = '100';
            $defaults['navbar_width'] = '260';
            $defaults['navbar_toggle_open'] = '#ffffff';
            $defaults['navbar_toggle_close'] = '#52a7fe';
            $defaults['navbar_mobile_border'] = 'transparent';
            $defaults['navbar_background'] = 'color';
            $defaults['navbar_background_color'] = 'transparent';
            $defaults['navbar_background_to'] = 'transparent';

            $defaults['navbar_background_deg'] = '17';

            $defaults['navbar_sharp'] = 'transparent';
            $defaults['navbar_text'] = '#9aa0a7';

            $defaults['navbar_logo_height'] = '27';
            $defaults['navbar_llogo_bg'] = 'transparent';
            $defaults['navbar_link'] = '#ffffff';
            $defaults['navbar_link_hover'] = '#52a7fe';
            $defaults['navbar_link_bg'] = 'transparent';
            $defaults['navbar_link_bg_hover'] = 'transparent';
            $defaults['navbar_link_hover_effect'] = 'transparent';
            $defaults['navbar_link_margin'] = array('border-top' => '0', 'border-right' => '0', 'border-left' => '0', 'border-bottom' => '0');
            $defaults['navbar_link_radius'] = array('border-top' => '0', 'border-right' => '0', 'border-left' => '0', 'border-bottom' => '0');
            $defaults['navbar_link_transform'] = 'uppercase';
            $defaults['navbar_link_icon'] = '#52a7fe';
            $defaults['navbar_link_icon_hover'] = '#ffffff';
            $defaults['navbar_link_subtitle'] = '#9aa0a7';
            $defaults['navbar_link_subtitle_hover'] = '#9aa0a7';
            $defaults['navbar_button'] = '#ffffff';
            $defaults['navbar_button_hover'] = '#52a7fe';
            $defaults['navbar_button_bg'] = '#52a7fe';
            $defaults['navbar_button_bg_hover'] = '#ffffff';
            $defaults['navbar_badge'] = '#52a7fe';
            $defaults['navbar_badge_color'] = '#ffffff';
            $defaults['navbar_scrollbar'] = '#52a7fe';
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
            $defaults['dropdown_link_hover'] = '#555555';
            $defaults['dropdown_link_bg_hover'] = '#f8f8f8';
            $defaults['dropdown_link_border'] = array('border-all' => '1', 'border-top' => '1', 'border-color' => '#f1f1f1', 'border-style' => 'solid');
            $defaults['dropdown_link_transform'] = '';
            $defaults['dropdown_button'] = '#ffffff';
            $defaults['dropdown_button_hover'] = '#52a7fe';
            $defaults['dropdown_button_bg'] = '#52a7fe';
            $defaults['dropdown_button_bg_hover'] = '#ffffff';
            $defaults['dropdown_link_icon'] = '#52a7fe';
            $defaults['dropdown_link_icon_hover'] = '#52a7fe';
            $defaults['dropdown_link_subtitle'] = '#9aa0a7';
            $defaults['dropdown_link_subtitle_hover'] = '#6d6d6d';

            return $defaults;
        }

        function social($social) {

            return array(
                array(
                    'title' => 'Facebook',
                    'icon' => 'fa fa-facebook ',
                    'url' => 'http://codecanyon.net/user/quadlayers/portfolio?ref=quadlayers',
                ),
                array(
                    'title' => 'Twitter',
                    'icon' => 'fa fa-twitter',
                    'url' => 'http://codecanyon.net/user/quadlayers/portfolio?ref=quadlayers',
                ),
                array(
                    'title' => 'Google',
                    'icon' => 'fa fa-google-plus',
                    'url' => 'http://codecanyon.net/user/quadlayers/portfolio?ref=quadlayers',
                ),
                array(
                    'title' => 'RSS',
                    'icon' => 'fa fa-rss',
                    'url' => 'http://codecanyon.net/user/quadlayers/portfolio?ref=quadlayers',
                ),
            );
        }

        static function activation() {

            update_option('_quadmenu_compiler', true);

            if (class_exists('QuadMenu')) {

                QuadMenu_Redux::add_notification('blue', esc_html__('Thanks for install QuadMenu OceanWP. We have to create the stylesheets. Please wait.', 'quadmenu-oceanwp'));

                QuadMenu_Activation::activation();
            }
        }

    }

    new QuadMenu_OceanWP();

    register_activation_hook(__FILE__, array('QuadMenu_OceanWP', 'activation'));
}

if (!function_exists('oceanwp_sidr_menu_source')) {

    function oceanwp_sidr_menu_source() {
        return '';
    }

}

if (!function_exists('oceanwp_header_template')) {

    function oceanwp_header_template() {

        // Return if no header
        if (!oceanwp_display_header()) {
            return;
        }
        ?>
        <div id="transparent-header-wrap" class="clr">
            <header id="site-header" class="transparent-header clr" data-height="100" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
                <div id="site-header-inner" class="clr container">
                    <?php wp_nav_menu(array('theme_location' => 'main_menu')); ?>
                </div>
            </header>
        </div>
        <?php
    }

    add_action('ocean_header', 'oceanwp_header_template');
}

if (!function_exists('is_quadmenu_installed')) {

    function is_quadmenu_installed() {

        $file_path = 'quadmenu/quadmenu.php';

        $installed_plugins = get_plugins();

        return isset($installed_plugins[$file_path]);
    }

}
