<?php
defined('ABSPATH') or die('No direct access permitted');

    // main dashboard
    function sfbl_dashboard()
    {
        // check if user has the rights to manage options
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        // --------- ADMIN DASHBOARD ------------ //
        sfbl_admin_dashboard();
    }

    // main settings
    function sfbl_settings()
    {
        // check if user has the rights to manage options
        if (! current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        // if a post has been made
        if (isset($_POST['sfblData'])) {
            // get posted data
            $sfblPost = $_POST['sfblData'];
            parse_str($sfblPost, $sfblPost);

            // if the nonce doesn't check out...
            if (!isset($sfblPost['sfbl_save_nonce']) || !wp_verify_nonce($sfblPost['sfbl_save_nonce'], 'sfbl_save_settings')) {
                die('There was no nonce provided, or the one provided did not verify.');
            }

            // prepare array to save
            $arrOptions = array(
                'pages'             => (isset($sfblPost['pages'])               ? stripslashes_deep($sfblPost['pages']) : null),
                'posts'             => (isset($sfblPost['posts'])               ? stripslashes_deep($sfblPost['posts']) : null),
                'follow_text'       => (isset($sfblPost['follow_text'])         ? stripslashes_deep($sfblPost['follow_text']) : null),
                'image_set'         => (isset($sfblPost['image_set'])           ? stripslashes_deep($sfblPost['image_set']) : null),
                'selected_buttons'  => (isset($sfblPost['selected_buttons'])    ? stripslashes_deep($sfblPost['selected_buttons']) : null),
            );

            // prepare array of buttons
            $arrButtons = json_decode(get_option('sfbl_buttons'), true);

            // loop through each button
            foreach ($arrButtons as $button => $arrButton) {
                // add url for each network to array
                $arrOptions['url_'.$button] = $sfblPost['url_'.$button];
            }

            // save the settings
            sfbl_update_options($arrOptions);

            return true;
        }

        // include required admin view
        include_once SFBL_ROOT.'/system/views/admin_panel.php';

        // get sfbl settings
        $sfbl_settings = get_sfbl_settings();

        // --------- ADMIN PANEL ------------ //
        sfbl_admin_panel($sfbl_settings);
    }
