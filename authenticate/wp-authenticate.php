<?php
/**
 * Plugin Name: Authenticate
 * Plugin URI: http://xavisys.com/wordpress-authentication-plugin/
 * Description: Instantly requires that users be logged in to visit your site. Also serves as a good base for expansion. No interface, just activate and go!
 * Author: Aaron Campbell
 * Version: 1.0.0
 * Author URI: http://xavisys.com/
 */

/**
 * wpAuthenticate is the class that handles ALL of the plugin functionality.
 * It helps us avoid name collisions
 * http://codex.wordpress.org/Writing_a_Plugin#Avoiding_Function_Name_Collisions
 */
class wpAuthenticate {
    /**
     * If the current page isn't 'wp-login.php' or 'wp-register.php', ensure the
     * user is logged in.
     *
     * @return void
     */
    public static function check_auth_to_read () {
        //If the current page isn't 'wp-login.php' or 'wp-register.php' redirect
        if ((strpos($_SERVER['PHP_SELF'], 'wp-login.php') === false) && (strpos($_SERVER['PHP_SELF'], 'wp-register.php') === false)) {
            auth_redirect();
        }
    }
}

/**
 * Add filters and actions
 */
add_filter('init', array('wpAuthenticate','check_auth_to_read'));
