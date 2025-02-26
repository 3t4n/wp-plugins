<?php
/**
 * Plugin Name: WP Disable Site Health
 * Plugin URI: https://eastsidecode.com
 * Description: WordPress plugin to disable Site Health screen.
 * Version: 1.0
 * Author: Louis Fico
 * Author URI: http://eastsidecode.com
 * License: GPL12
 */


if ( ! defined( 'ABSPATH' ) ) exit;


// disable the admin menu

function escode_remove_site_health_menu() {

    remove_submenu_page( 'tools.php', 'site-health.php' );

}

add_action( 'admin_menu', 'escode_remove_site_health_menu' );



// block site health page screen

function escode_block_site_health_access() {

    if ( is_admin() ) {

        $screen = get_current_screen();

        // if screen id is site health
        if ( 'site-health' == $screen->id ) {
            wp_redirect( admin_url() );
            exit;
        }

    }

}

add_action( 'current_screen', 'escode_block_site_health_access' );



