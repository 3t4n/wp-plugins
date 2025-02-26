<?php

add_action('admin_menu', 'meet_analytics_setting_page');
    function meet_analytics_setting_page()
    {
        $page_title = 'Google Analytics - Meetanshi';
        $menu_title = 'Google Analytics';
        $capability = 'manage_options';
        $menu_slug = 'meet-ga';
        $function = 'analytics_page_setting_markup';
        $icon_url = 'dashicons-admin-appearance';
        $position = 100;
        add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);
    }


    function analytics_page_setting_markup()
    {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e(get_admin_page_title()); ?></h1>
            <p><?php
                include (plugin_dir_path(__FILE__).'meet-admin-form.php');
                ?>
            </p>
        </div>
        <?php
    }
    require_once (plugin_dir_path(__FILE__).'ga-code-script.php');


