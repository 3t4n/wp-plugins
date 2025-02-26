<?php

class Add_Meta_Tag_For_Wordpress_Admin_Display {

    public static function init() {
       
        require_once plugin_dir_path(dirname(__FILE__)) . 'partials/class-add-meta-tag-for-wordpress-general-setting.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'partials/class-add-meta-tag-for-wordpress-html-output.php';
        
        add_action('admin_menu', array(__CLASS__, 'add_meta_tag_for_wordpress'));
    }

    public static function add_meta_tag_for_wordpress() {
        add_options_page('Meta Tag', 'Meta Tag', 'manage_options', 'add-meta-tag-for-wordpress', array(__CLASS__, 'add_meta_tag_for_wordpress_settings'));
    }

    public static function add_meta_tag_for_wordpress_settings() {
        $setting_tabs = apply_filters('metadata_setting_tab', array('general' => 'General'));
        $current_tab = (isset($_GET['tab'])) ? $_GET['tab'] : 'general';
        ?>
        <h2 class="nav-tab-wrapper">
            <?php
            foreach ($setting_tabs as $name => $label)
                echo '<a href="' . admin_url('admin.php?page=add-meta-tag-for-wordpress&tab=' . $name) . '" class="nav-tab ' . ( $current_tab == $name ? 'nav-tab-active' : '' ) . '">' . $label . '</a>';
            ?>
        </h2>
        <?php
        foreach ($setting_tabs as $setting_tabkey => $setting_tabvalue) {
            switch ($setting_tabkey) {
                case $current_tab:
                    do_action('metadata_' . $setting_tabkey . '_setting_save_field');
                    do_action('metadata_' . $setting_tabkey . '_setting');
                    break;
            }
        }
    }

}

Add_Meta_Tag_For_Wordpress_Admin_Display::init();
