<?php
if (!function_exists('awesome_instagram_feed_theme_options')) :
    function awesome_instagram_feed_options()
    {
        $defaults = array(

            //banner section
            'instagram_feed_style' => 'slider',
            'instagram_feed_username' => '',
            'instagram_feed_accesstoken' => '',
            'instagram_feed_clientid' => '',
            'instagram_title' => '',
            'instagram_url' => '',
        );

        $options = get_option('awesome_instagram_feed_options', $defaults);

        //Parse defaults again - see comments
        $options = wp_parse_args($options, $defaults);

        return $options;
    }
endif;
