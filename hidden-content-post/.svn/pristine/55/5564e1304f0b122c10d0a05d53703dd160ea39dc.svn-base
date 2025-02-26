<?php
    /*
    Plugin Name: Hidden content post wordpress
    Plugin URI: http://hoangthuc.com/
    Description: This is not just a plugin, it is simple. Your shortcode [content][/content]
    Author: HoangThuc
    Version: 1.0
    Author URI: http://hoangthuc.com/
    */
    function hide_content($alt,$content=''){  
        $current_user = wp_get_current_user();
        $user_role = ($current_user->roles);
        $user_role = $user_role[0];

        if ($user_role == 'administrator') {

        } elseif ($user_role == 'editor') {

        } elseif ($user_role == 'author') {

        } elseif ($user_role == 'contributor') {

        } elseif ($user_role == 'subscriber') {

        } else {
            $content=$alt['alert'];
        }    
        return $content;
    }
    add_shortcode('content','hide_content');

    
    
    