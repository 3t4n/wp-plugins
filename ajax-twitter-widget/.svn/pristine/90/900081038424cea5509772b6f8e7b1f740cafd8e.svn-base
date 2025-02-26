<?php

/*
  Plugin Name: Asyncronous Twitter Messager
  Plugin URI: http://netjas.com
  Description: Asyncronous Twitter Messager.
  Version: 1.0
  Author: Roberto Ratti
  Author URI: http://netjas.com/
  License: GPLv2 or later
 */
?>
<?php

/*  Copyright 2013  Roberto Ratti  (email : roberto.ratti@netjas.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
?>
<?php

register_activation_hook(__FILE__, 'twitter_widget_activate');
register_deactivation_hook(__FILE__, 'twitter_widget_deactivate');
add_action('after_setup_theme', 'plugin_setup');

/*
 * Checks if the current user can install and manage the plugin.
 */

function checkUserPrivileges() {
    if (!current_user_can('install_plugins')) {
        wp_die("current user can't install plugins");
    }
}

/*
 * Activate the plugin
 */

function twitter_widget_activate() {
    checkUserPrivileges();
    set_transient('update_time', 60);
    set_transient('twitter_status', "1");
}

/*
 * Install the i18n internationalization support
 */

function plugin_setup() {
    load_plugin_textdomain('ajax-twitter-widget', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}

/*
 * Deactivate the plugin
 */

function twitter_widget_deactivate() {
    delete_transient('update_time');
    delete_transient('token');
    delete_transient('lastTweets');
    delete_transient('twitter_status');
}

require_once 'twitter-widget.php';
?>