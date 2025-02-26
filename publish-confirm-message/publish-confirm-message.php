<?php
/**
 * Plugin Name: Publish Confirm Message
 * Description: An extra confirmation dialogue for the publish button to avoid accidental publishing.
 * Author:      Arul Prasad J
 * Author URI:  https://profiles.wordpress.org/arulprasadj/
 * Plugin URI:  https://wordpress.org/plugins/publish-confirm-message/
 * Donate link: https://paypal.me/arulprasadj?locale.x=en_GB
 * Text Domain: publish-confirm-message
 * Domain Path: /lang
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Version:     2.0
 */

/*
Copyright (C)  2020-2024 arulprasadj

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

*/

// Quit, if now WP environment.
defined( 'ABSPATH' ) || exit;

define( 'APJ_PCM_VERSION', '2.0' );

define( 'APJ_PCM_REQUIRED_WP_VERSION', '4.5' );

define( 'APJ_PCM_PLUGIN', __FILE__ );

define( 'APJ_PCM_PLUGIN_NAME', 'Publish Confirm Message');

define( 'APJ_PCM_PLUGIN_PATH', 'publish-confirm-message.php');

define( 'APJ_PCM_MENU_SLUG', 'publish-confirm-message/core/admin/adminpage.php' );

define( 'APJ_PCM_DEFAULT_MESSAGE', 'Are you sure you want to publish this now?');

define( 'APJ_PCM_OPT_NAME', 'apj_pcm_message');

define( 'APJ_PCM_OPT_ERR_NAME', 'apj_pcm_admin_error');

require_once plugin_dir_path(__FILE__) . 'core/apj-functions.php';

//Activate plugin
register_activation_hook(__FILE__, array('apjPCM\PublishConfirmMessage', 'activate'));

//Uninstall plugin
register_uninstall_hook(__FILE__, array('apjPCM\PublishConfirmMessage', 'uninstall'));

//Init hooks
\apjPCM\PublishConfirmMessage::initHooks();


?>
