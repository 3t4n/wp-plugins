<?php

defined('ABSPATH') or die('No direct access permitted');

    // add settings link on plugin page
    function sfbl_settings_link($links)
    {
        // add to plugins links
        array_unshift($links, '<a href="admin.php?page=simple-follow-buttons-light">Settings</a>');

        // return all links
        return $links;
    }

    // include js files and upload script
    function sfbl_admin_scripts()
    {
        wp_enqueue_media();

        // ready available with wp
        wp_enqueue_script('jquery-ui');
        wp_enqueue_script('jquery-ui-sortable');

        // bootstrap
        wp_register_script('sfblBootstrap', plugins_url('js/admin/bootstrap.js', SFBL_FILE));
        wp_enqueue_script('sfblBootstrap');

        // bootstrap switch
        wp_register_script('sfblSwitch', plugins_url('js/admin/switch.js', SFBL_FILE));
        wp_enqueue_script('sfblSwitch');

        // bootstrap colorpicker
        wp_register_script('sfblColorPicker', plugins_url('js/admin/colorpicker.js', SFBL_FILE));
        wp_enqueue_script('sfblColorPicker');

        // if viewing the styling page
        if ($_GET['page'] == 'simple-follow-buttons-styling') {
            // include custom css file
            add_action('admin_head', 'sfbl_style_head');
        }

        // finish with sfbl admin
        wp_register_script('sfbl-js', plugins_url('js/admin/admin.js', SFBL_FILE));
        wp_enqueue_script('sfbl-js');
    }

    // include styles for the sfbl admin panel
    function sfbl_admin_styles()
    {
        // admin styles
        wp_register_style('sfbl-colorpicker', plugins_url('css/colorpicker.css', SFBL_FILE));
        wp_enqueue_style('sfbl-colorpicker');
        wp_register_style('sfbl-bootstrap-style', plugins_url('css/readable.css', SFBL_FILE));
        wp_enqueue_style('sfbl-bootstrap-style');
        wp_register_style('sfbl-admin-theme', plugins_url('followbuttons/assets/css/ssbp-all.css', SFBL_FILE));
        wp_enqueue_style('sfbl-admin-theme');
        wp_register_style('sfbl-switch-styles', plugins_url('css/switch.css', SFBL_FILE));
        wp_enqueue_style('sfbl-switch-styles');
        wp_register_style('sfbl-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
        wp_enqueue_style('sfbl-font-awesome');

        // this one last to overwrite any CSS it needs to
        wp_register_style('sfbl-admin-style', plugins_url('css/style.css', SFBL_FILE));
        wp_enqueue_style('sfbl-admin-style');
    }

    // menu settings
    function sfbl_menu()
    {
        // add menu page
        add_options_page( 'Simple Follow Buttons Light', 'Follow Buttons', 'manage_options', 'simple-follow-buttons-light', 'sfbl_settings');
    }
