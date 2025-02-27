<?php

// =============================================================================
// WP Clear RSS Cache
// 
// Released under the GNU General Public Licence v2
// http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
// 
// Please refer all questions/requests to: mdjekic@gmail.com
//
// This is an add-on for WordPress
// http://wordpress.org/
// =============================================================================

// =============================================================================
// This piece of software is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY, without even the implied warranty of MERCHANTABILITY or
// FITNESS FOR A PARTICULAR PURPOSE.
// =============================================================================

/*
  Plugin Name: WP Clear RSS Cache
  Plugin URI: http://wordpress.org/extend/plugins/wp-clear-rss-cache
  Description: A simple WP action to clear the RSS widget cashe.
  Version: 1.1
  Author: Miloš Đekić
  Author URI: http://milos.djekic.net
 */

// check if direct access attempted
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) {
    header('HTTP/1.1 403 Forbidden');
    exit('Direct access not alowed.'); 
}

// wp-clear-rss-cache version
define("WPCRC",'1.0');

// define paths
define('WPCRC_DIR', WP_CONTENT_DIR . '/plugins/wp-clear-rss-cache');

/**
 * Renders the action
 * 
 * @global $synchi_themes
 */
function wpcrc_render_action() {
    include(WPCRC_DIR . '/clear.php'); 
}

/**
 * Adds a menu item for wpcrc action
 */
function wpcrc_menu() {
    add_submenu_page(
        'themes.php', // parent
        'WP Clear RSS Cache', // page title
        'Clear RSS Cache', // menu item title
        'administrator', // permission
        'wpcrc_action', // unique page name
        'wpcrc_render_action' // rendering function
    );
}

// register menu item
add_action('admin_menu', 'wpcrc_menu');

?>
