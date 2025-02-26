<?php
/*
Plugin Name: Login Logout Redirect
Description: A simple plugin to redirect users after login and logout.
Plugin URI: https://wpmet.com
Version: 1.4
Author: Ataurr
Author URI: https://wpmet.com/
License: GPL-3.0-or-later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

// Restrict direct access to this file
if ( !defined( 'ABSPATH' ) ) exit;

// Define plugin version
define('LOGIN_LOGOUT_REDIRECT_VERSION', '1.0');

// Define plugin directory
define( 'LOGIN_LOGOUT_REDIRECT_URI', untrailingslashit( dirname( __FILE__ ) ) );

class LoginLogoutRedirect {
    public function enqueue_admin_scripts() {
        wp_register_script('login_logout_redirect_script', plugins_url('/assets/js/login-logout-redirect.js', __FILE__), '', LOGIN_LOGOUT_REDIRECT_VERSION, true);
        wp_enqueue_script('login_logout_redirect_script');
        wp_register_style('login_logout_redirect_style', plugins_url('/assets/css/login-logout-redirect.css', __FILE__), '', LOGIN_LOGOUT_REDIRECT_VERSION);
        wp_enqueue_style('login_logout_redirect_style');
    }

    public function __construct() {
        add_action('init', [ $this, 'load_textdomain' ]);
        add_action('admin_init', [ $this, 'register_settings' ]);
        add_action('admin_menu', [ $this, 'register_admin_menu' ]);
        add_action('admin_enqueue_scripts', [ $this, 'enqueue_admin_scripts' ]);
        add_filter('plugin_action_links_' . plugin_basename(__FILE__), [ $this, 'action_links' ]);
        add_filter('login_redirect', [ $this, 'login_logout_redirect_login' ], 10, 3);
        add_action('wp_logout', [ $this, 'login_logout_redirect_logout' ]);
    }

    public function load_textdomain() {
        load_plugin_textdomain( 'login-logout-redirect', false, basename( dirname( __FILE__ ) ) . '/languages' );
    }

    public function register_settings() {
        add_settings_section(
            'login_logout_redirect_settings_section',
            esc_html__('Login and Logout Redirect Options', 'login-logout-redirect'),
            [ $this, 'section_text' ],
            'login_logout_redirect_section'
        );

        add_settings_field(
            'login_logout_redirect_login_enable',
            esc_html__('Enable Login Redirect', 'login-logout-redirect'),
            [ $this, 'login_enable_callback' ],
            'login_logout_redirect_section',
            'login_logout_redirect_settings_section'
        );

        add_settings_field(
            'login_logout_redirect_login',
            esc_html__('Login Redirect URL', 'login-logout-redirect'),
            [ $this, 'login_field_callback' ],
            'login_logout_redirect_section',
            'login_logout_redirect_settings_section'
        );

        register_setting('login_logout_redirect_settings_section', 'login_logout_redirect_login_enable', 'absint');
        register_setting('login_logout_redirect_settings_section', 'login_logout_redirect_login', 'esc_url_raw');
        register_setting('login_logout_redirect_settings_section', 'login_logout_redirect_login_page', 'intval');
        register_setting('login_logout_redirect_settings_section', 'login_logout_redirect_login_custom', 'absint');

        add_settings_field(
            'login_logout_redirect_logout_enable',
            esc_html__('Enable Logout Redirect', 'login-logout-redirect'),
            [ $this, 'logout_enable_callback' ],
            'login_logout_redirect_section',
            'login_logout_redirect_settings_section'
        );

        add_settings_field(
            'login_logout_redirect_logout',
            esc_html__('Logout Redirect URL', 'login-logout-redirect'),
            [ $this, 'logout_field_callback' ],
            'login_logout_redirect_section',
            'login_logout_redirect_settings_section'
        );

        register_setting('login_logout_redirect_settings_section', 'login_logout_redirect_logout_enable', 'absint');
        register_setting('login_logout_redirect_settings_section', 'login_logout_redirect_logout', 'esc_url_raw');
        register_setting('login_logout_redirect_settings_section', 'login_logout_redirect_logout_page', 'intval');
        register_setting('login_logout_redirect_settings_section', 'login_logout_redirect_logout_custom', 'absint');
    }

    public function section_text() {
        printf('<p>%s</p>', esc_html__('You can change WordPress Default login or logout or both redirect URL', 'login-logout-redirect'));
    }

    public function login_enable_callback() {
        $login_redirect_enable = absint(get_option('login_logout_redirect_login_enable'));
        printf('<label class="switch"><input type="checkbox" id="login_logout_redirect_login_enable" name="login_logout_redirect_login_enable" value="1" %s onchange="toggleLoginRedirectSettings()"><span class="slider"></span></label>', checked(1, $login_redirect_enable, false));
    }

    public function login_field_callback() {
        $login_redirect_value = esc_url(get_option('login_logout_redirect_login'));
        $login_redirect_custom = absint(get_option('login_logout_redirect_login_custom'));
        $pages = get_pages();
        $login_redirect_enable = absint(get_option('login_logout_redirect_login_enable'));
        $display_style = $login_redirect_enable ? 'block' : 'none';

        printf('<div id="login_redirect_settings" style="display: %s; margin-top: 10px;">', esc_attr($display_style));

        printf('<div id="login_logout_redirect_login_link_input" style="display: %s; margin-top: 10px;">%s<br><input name="login_logout_redirect_login" type="text" class="regular-text" value="%s" placeholder="%s"/></div>', esc_attr($login_redirect_custom ? 'block' : 'none'), esc_html__('or add a link', 'login-logout-redirect'), esc_attr($login_redirect_value), esc_attr(get_home_url() . '/example-login-redirect-link/'));

        printf('<div id="login_logout_redirect_login_page_select" style="display: %s; margin-top: 10px;">%s<br><select name="login_logout_redirect_login_page" class="regular-text">', esc_attr($login_redirect_custom ? 'none' : 'block'), esc_html__('Select page', 'login-logout-redirect'));
        printf('<option value="">%s</option>', esc_html__('Select a page', 'login-logout-redirect'));
        foreach ($pages as $page) {
            printf('<option value="%d" %s>%s</option>', intval($page->ID), selected(get_option('login_logout_redirect_login_page'), $page->ID, false), esc_html($page->post_title));
        }
        echo '</select></div>';

        printf('<div style="margin-top: 10px;"><input type="checkbox" id="login_logout_redirect_login_custom" name="login_logout_redirect_login_custom" value="1" %s onclick="toggleLoginLink()"><label for="login_logout_redirect_login_custom"> %s</label></div>', checked(1, $login_redirect_custom, false), esc_html__('Add a custom link', 'login-logout-redirect'));

        echo '<small>' . esc_html__('Enter the URL or select the page to which the user will be redirected after a successful login.', 'login-logout-redirect') . '</small>';
        echo '</div>';
    }

    public function logout_enable_callback() {
        $logout_redirect_enable = absint(get_option('login_logout_redirect_logout_enable'));
        printf('<label class="switch"><input type="checkbox" id="login_logout_redirect_logout_enable" name="login_logout_redirect_logout_enable" value="1" %s onchange="toggleLogoutRedirectSettings()"><span class="slider"></span></label>', checked(1, $logout_redirect_enable, false));
    }

    public function logout_field_callback() {
        $logout_redirect_value = esc_url(get_option('login_logout_redirect_logout'));
        $logout_redirect_custom = absint(get_option('login_logout_redirect_logout_custom'));
        $pages = get_pages();
        $logout_redirect_enable = absint(get_option('login_logout_redirect_logout_enable'));
        $display_style = $logout_redirect_enable ? 'block' : 'none';

        printf('<div id="logout_redirect_settings" style="display: %s; margin-top: 10px;">', esc_attr($display_style));

        printf('<div id="login_logout_redirect_logout_link_input" style="display: %s; margin-top: 10px;">%s<br><input name="login_logout_redirect_logout" type="text" class="regular-text" value="%s" placeholder="%s"/></div>', esc_attr($logout_redirect_custom ? 'block' : 'none'), esc_html__('or add a link', 'login-logout-redirect'), esc_attr($logout_redirect_value), esc_attr(get_home_url() . '/example-logout-redirect-link/'));

        printf('<div id="login_logout_redirect_logout_page_select" style="display: %s; margin-top: 10px;">%s<br><select name="login_logout_redirect_logout_page" class="regular-text">', esc_attr($logout_redirect_custom ? 'none' : 'block'), esc_html__('Select page', 'login-logout-redirect'));
        printf('<option value="">%s</option>', esc_html__('Select a page', 'login-logout-redirect'));
        foreach ($pages as $page) {
            printf('<option value="%d" %s>%s</option>', intval($page->ID), selected(get_option('login_logout_redirect_logout_page'), $page->ID, false), esc_html($page->post_title));
        }
        echo '</select></div>';

        printf('<div style="margin-top: 10px;"><input type="checkbox" id="login_logout_redirect_logout_custom" name="login_logout_redirect_logout_custom" value="1" %s onclick="toggleLogoutLink()"><label for="login_logout_redirect_logout_custom"> %s</label></div>', checked(1, $logout_redirect_custom, false), esc_html__('Add a custom link', 'login-logout-redirect'));

        echo '<small>' . esc_html__('Enter the URL or select the page to which the user will be redirected after a successful logout.', 'login-logout-redirect') . '</small>';
        echo '</div>';
    }

    public function register_admin_menu() {
        add_submenu_page('options-general.php', esc_html__('Login and Logout Redirect Options', 'login-logout-redirect'), esc_html__('Login Logout Redirect', 'login-logout-redirect'), 'manage_options', 'login-logout-redirect', [ $this, 'admin_page' ]);
    }

    public function admin_page() {
        ?>
        <form action="options.php" method="POST">
            <?php wp_nonce_field('login_logout_redirect_settings', 'login_logout_redirect_nonce'); ?>
            <?php do_settings_sections('login_logout_redirect_section'); ?>
            <?php settings_fields('login_logout_redirect_settings_section'); ?>
            <?php submit_button(); ?>
        </form>

        <?php
    }

    public function action_links($links) {
        $login_logout_plugin_action_links = array(
            '<a href="' . esc_url(admin_url('admin.php?page=login-logout-redirect')) . '">' . esc_html__('Settings', 'login-logout-redirect') . '</a>',
        );
        return array_merge($links, $login_logout_plugin_action_links);
    }

    public function login_logout_redirect_login($redirect_to, $request, $user) {
        $login_redirect_enable = absint(get_option('login_logout_redirect_login_enable'));
        if (!$login_redirect_enable) {
            return $redirect_to;
        }
        $login_redirect_custom = absint(get_option('login_logout_redirect_login_custom'));
        if ($login_redirect_custom) {
            $redirect_to = esc_url_raw(get_option('login_logout_redirect_login'));
        } else {
            $page_redirect = intval(get_option('login_logout_redirect_login_page'));
            if (!empty($page_redirect)) {
                $redirect_to = esc_url(get_permalink($page_redirect));
            }
        }
        return !empty($redirect_to) ? $redirect_to : esc_url(admin_url());
    }

    public function login_logout_redirect_logout() {
        $logout_redirect_enable = absint(get_option('login_logout_redirect_logout_enable'));
        if (!$logout_redirect_enable) {
            return;
        }
        $logout_redirect_custom = absint(get_option('login_logout_redirect_logout_custom'));
        if ($logout_redirect_custom) {
            $redirect_to = esc_url_raw(get_option('login_logout_redirect_logout'));
        } else {
            $page_redirect = intval(get_option('login_logout_redirect_logout_page'));
            if (!empty($page_redirect)) {
                $redirect_to = esc_url(get_permalink($page_redirect));
            }
        }
        wp_redirect(!empty($redirect_to) ? $redirect_to : home_url());
        exit();
    }
}

new LoginLogoutRedirect();
