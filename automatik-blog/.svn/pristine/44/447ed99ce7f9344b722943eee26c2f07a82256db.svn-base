<?php

if (!defined("ABSPATH")) {
    exit(); // Prevent direct access
}

class Automatik_Blog_Plugin_Settings
{
    public function __construct()
    {
        // Add actions to create the settings page
        add_action("admin_menu", [$this, "add_settings_page"]);

        // Enqueue admin scripts and styles
        add_action("admin_enqueue_scripts", [$this, "enqueue_admin_assets"]);
    }

    public function add_settings_page()
    {
        add_menu_page(
            "Automatik Blog", // Page title
            "Automatik Blog", // Menu title
            "manage_options", // Capability required
            "automatik_blog-settings", // Menu slug
            [$this, "create_admin_page"], // Callback function
            plugin_dir_url(__FILE__) . "../assets/icon.png", // Icon URL
            81 // Position in the menu
        );
    }

    public function create_admin_page()
    {
        // Retrieve the unique code generated on plugin activation
        $unique_code = get_option("automatik_blog_unique_code");
        $site_url = get_bloginfo("url");
        $site_name = get_bloginfo("name");

        // Build the connection URL
        $connection_url =
            "https://app.automatikblog.com/home_area?menu=CW&CD=" .
            urlencode($unique_code) .
            "&WS=" .
            urlencode($site_url) .
            "&SN=" .
            urlencode($site_name);
        ?>
        <div class="wrap automatik_blog-admin-wrapper">
            <h1><?php esc_html_e("Automatik Blog", "automatik-blog"); ?></h1>
            <h2><?php esc_html_e("Connection Test", "automatik-blog"); ?></h2>
            <p><?php esc_html_e(
                "Click the button below to test the connection with Automatik Blog.",
                "automatik-blog"
            ); ?></p>
            <a href="<?php echo esc_url(
                $connection_url
            ); ?>" class="button button-primary" target="_blank"><?php esc_html_e(
                "Test Connection",
                "automatik-blog"
            ); ?></a>
        </div>
        <?php
    }

    public function enqueue_admin_assets($hook)
    {
        if ("toplevel_page_automatik_blog-settings" !== $hook) {
            return;
        }

        wp_enqueue_style(
            "automatik_blog-admin-styles",
            AUTOMATIK_BLOG_PLUGIN_URL . "assets/css/admin-styles.css",
            [],
            AUTOMATIK_BLOG_PLUGIN_VERSION
        );
    }
}