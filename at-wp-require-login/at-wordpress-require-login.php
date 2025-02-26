<?php
/*
* Plugin Name: WordPress Require Login
* Plugin URI: https://www.tudorache.me
* Description: If activated, the plugin will lock down the site for public access and ask them for an username and password in order to access it.
* Version: 1.0
* Author: Adrian Tudorache
* Author URI: https://www.tudorache.me
* Text Domain: at-wordpress-require-login
*/

function at_wp_rl_redirect() {
    if (!is_user_logged_in()) {
        auth_redirect();
    }
}

add_action('get_header', 'at_wp_rl_redirect');
?>