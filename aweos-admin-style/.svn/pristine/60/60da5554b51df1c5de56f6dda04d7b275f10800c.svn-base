<?php

/**
 * AWEOS Admin Style
 *
 * @wordpress-plugin
 * Plugin Name: AWEOS Admin Style
 * Plugin URI:  -
 * Description: -
 * Version:     1.2.6
 * Author:      AWEOS GmbH
 * Author URI:  https://aweos.de
 * Text Domain: aw_admin-style
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!defined('ABSPATH')) exit;

require_once 'admin-menu.php';

function awas_register_activation_hook() {
    if (version_compare(get_bloginfo("version"), "4.5", "<")) {
        wp_die("Please update WordPress to use this plugin");
    }

    if (get_option("awas_run_once") !== "did_run") {
    	
    	// header("Location: " . plugin_dir_(url uri)( __FILE__ ) . "");
		// die();

    	// update_option("awas_run_once", "did_run");
    }
}

################################################
##  -- general colors, credits and footer --  ##
################################################

if (get_option("awas-agreement") !== "agreed") return;

function awas_url() {
    return "https://aweos.de";
}

add_filter("login_headerurl", "awas_url");

function awas_loginfooter() { 
	?>
    <div class="werbeagentur">
		<a class="aweos" title="Werbeagentur AWEOS" href="https://aweos.de">Werbeagentur AWEOS</a>
    </div>
    <?php
 }

add_action("login_footer", "awas_loginfooter");

function awas_custom_login() { 
	wp_enqueue_style( "awas_style", plugin_dir_url( __FILE__ ) . "public/style.css", NULL, "10.0");
}

add_action('login_head', 'awas_custom_login');