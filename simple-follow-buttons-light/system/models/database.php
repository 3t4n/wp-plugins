<?php

defined('ABSPATH') or die('No direct access permitted');

    // activate sfbl function
    function sfbl_activate()
    {
        // likely a reactivation, return doing nothing
        if (get_option('sfbl_version') !== false) {
            return;
        }

        // array ready with defaults
        $sfbl_settings = array(
            'pages'             => '',
            'posts'             => '',
            'image_set'         => 'circle',
            'follow_text'        => '',
            'selected_buttons'  => 'facebook,google,twitter,linkedin',
        );

        // prepare array of buttons
        $arrButtons = sfbl_button_helper_array();

        // update/add buttons helper
        update_option('sfbl_buttons', json_encode($arrButtons));

        // loop through each button
        foreach ($arrButtons as $button => $arrButton) {
            // add custom button to array of options
            $sfbl_settings['sfb_custom_'.$button] = '';
            $sfbl_settings['url_'.$button] = '';
        }

        // json encode
        $jsonSettings = json_encode($sfbl_settings);

        // insert default options for sfbl
        add_option('sfbl_settings', $jsonSettings);

        // save settings to json file
        sfbl_update_options($sfbl_settings);

        // add sfbl version as a separate option
        add_option('sfbl_version', SFBL_VERSION);
    }

    // uninstall sfbl function
    function sfbl_uninstall()
    {
        //if uninstall not called from WordPress exit
        if (defined('WP_UNINSTALL_PLUGIN')) {
            exit();
        }

        // delete sfbl options
        delete_option('sfbl_version');
        delete_option('sfbl_settings');
        delete_option('sfbl_buttons');
    }

    // the upgrade function
    function upgrade_sfbl($sfblVersion)
    {
        // initial installation, do not proceed with upgrade script
        if ($sfblVersion === false) {
            return;
        }

// planning ahead
/*
        // lower than 0.0.2
        if ($sfblVersion < '0.0.2') {
            // added in 0.0.2
            $new = array(
                '' => '',
            );
        }

        // save the new options
        sfbl_update_options($new);

        // button helper array
        sfbl_button_helper_array();

        // set new version number
        update_option('sfbl_version', SFBL_VERSION);
*/
    }

    // button helper option
    function sfbl_button_helper_array()
    {
        // helper array for sfb
        return array(
            'diggit' => array(
                'full_name' => 'Diggit',
                'url_prefix' => 'http://digg.com/source/',
            ),
            'email' => array(
                'full_name'    => 'Email',
            ),
            'facebook' => array(
                'full_name'    => 'Facebook',
                'url_prefix' => 'https://www.facebook.com/',
            ),
            'google' => array(
                'full_name'    => 'Google+',
                'url_prefix' => 'https://plus.google.com/+',
            ),
            'linkedin' => array(
                'full_name'    => 'LinkedIn',
                'url_prefix' => 'https://linkedin.com/in/',
            ),
            'pinterest' => array(
                'full_name'    => 'Pinterest',
                'url_prefix' => 'https://www.pinterest.com/',
            ),
            'reddit' => array(
                'full_name'    => 'Reddit',
                'url_prefix' => 'https://www.reddit.com/user/',
            ),
            'tumblr' => array(
                'full_name'    => 'Tumblr',
                'url_prefix' => 'http://',
                'url_suffix' => '.tumblr.com',
            ),
            'twitter' => array(
                'full_name'    => 'Twitter',
                'url_prefix' => 'https://twitter.com/',
            ),
            'vk' => array(
                'full_name'    => 'VK',
                'url_prefix' => 'https://vk.com/',
            ),
            'yummly' => array(
                'full_name'    => 'Yummly',
                'url_prefix' => 'http://www.yummly.co.uk/page/',
            ),
        );
    }
