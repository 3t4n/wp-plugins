<?php
/**
 * Plugin Name: Avatar Proxy
 * Description: Replaces Gravatar with local proxy and serve photo safely.
 * Plugin URI: https://wordpress.org/plugins/avatar-proxy/
 * Author: Frans Allen
 * Author URI: https://www.fransallen.com
 * Version: 0.4
 * Text Domain: avatar-proxy
 * Domain Path: /languages/
 * License: GPLv2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package Avatar Proxy
 * @author Frans Allen
 */

# Exit if accessed directly

if ( !defined('ABSPATH') ) exit;

# Avatar Proxy Rules, by default is 'avatar', you can change it by define from wp-config.php

define('AVATAR_PROXY_RULES', 'avatar');

# Avatar Server

define('AVATAR_SERVER', 'http://gravatar.com/avatar/');

# Avatar Local Server

define('AVATAR_LOCAL_SERVER', home_url('/'));

# Cache Control

define('AVATAR_CACHE_EXPIRES', '86400'); // 1 day (you can modify this)

# Get the plugin

require_once 'includes/functions.php';
require_once 'includes/rules.php';
