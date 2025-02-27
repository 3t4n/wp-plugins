<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @see       Etsy360
 * @since      1.0.0
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @author     Etsy360 <info@etsy360.com>
 */
class Embed_Integrate_Etsy_Shop_Admin
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     *
     * @var string the ID of this plugin
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     *
     * @var string the current version of this plugin
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     *
     * @param string $plugin_name the name of this plugin
     * @param string $version     the version of this plugin
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__).'css/embed-integrate-etsy-shop-admin.css', [], $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__).'js/embed-integrate-etsy-shop-admin.js', ['jquery'], $this->version, false);
    }

    /**
     * Register admin menu.
     *
     * @since 1.0.0
     */
    public function embed_etsy_menu()
    {
        // Top-level page
        $page_title = __('Etsy Embed');
        $menu_title = __('Etsy Embed');
        $capability = 'manage_options';
        $menu_slug = 'etsy_embed';
        $function = 'display_options_page';
        $icon = plugin_dir_url(__FILE__).'/imgs/icon-16x16.png';
        $position = 3;

        add_menu_page($page_title, $menu_title, $capability, $menu_slug, [$this, $function], $icon, $position);
    }

    public function display_options_page()
    {
        require_once plugin_dir_path(__FILE__).'partials/'.$this->plugin_name.'-admin-display.php';
    }

    public function ee_ajax()
    {
        echo '<script type="text/javascript">
        var ajaxurl = "'.admin_url('admin-ajax.php').'";        
        </script>
        ';
    }

    public function validate_token_callback()
    {
        $url = 'https://etsy360io.local/api/v1/validateToken/yfYpE92PIqgToFMjyUiu4mWwiiVkIJcXDxXuDBEZSTSpsw46jqj3W93rF9dUcpnC';

        $request = wp_remote_get($url);

        if (is_wp_error($request)) {
            return false; // Bail early
        }

        $body = wp_remote_retrieve_body($request);

        echo esc_html(wp_json_encode($body));

        exit;
    }

    /***
     * Save user token using Ajax request
     */
    public function save_user_token_callback()
    {
        $token = sanitize_text_field($_REQUEST['token']);
        update_option('user_token', $token);
    }
}
