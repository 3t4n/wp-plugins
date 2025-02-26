<?php

add_action('admin_menu', array('ClicktovoteSettings', 'add_options_menu'));

class ClicktovoteSettings
{
    public function add_options_menu()
    {
        add_options_page('click-to-vote.me Settings', 'click-to-vote.me', 'manage_options', 'click-to-vote', array('ClicktovoteSettings', 'display_settings_page'));
    }

    public function display_settings_page()
    {
        $action = $_SERVER["REQUEST_URI"];
        $updated = false;

        if (isset($_POST['settings_update'])) {
            $width = filter_var($_POST["clicktovote_width"], FILTER_SANITIZE_NUMBER_INT);
            $height = filter_var($_POST["clicktovote_height"], FILTER_SANITIZE_NUMBER_INT);

            update_option('clicktovote_width', $width);
            update_option('clicktovote_height', $height);

            $updated = true;
        }

        $width = get_option('clicktovote_width');
        $height = get_option('clicktovote_height');

        require "templates/settings.php";
    }
}
