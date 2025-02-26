<?php

/*
  Plugin Name: Cot Tackle
  Description: Extended feature for Cot theme.
  Plugin URI: https://wordpress.org/plugins/cot-tackle/
  Author: iam00
  Author URI: https://profiles.wordpress.org/iam00/
  Version: 1.0
  License: GPL2
  Text Domain: cot-tackle
  Domain Path: /languages
 */

/*
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

  Copyright (C) 2017  iam00  sabujdas94@gmail.com
 */

if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}
define('CT_VERSION', '1.0');
define('CT_PLUGIN_DIR', plugin_dir_path(__FILE__));

load_plugin_textdomain('cot-tackle', FALSE, 'cot-tackle/languages');

require_once ( CT_PLUGIN_DIR . '/class.cot-tackle.php' );


add_action('plugins_loaded', array('Cot_Tackle', 'includes'));
add_action('plugins_loaded', array('Cot_Tackle', 'init'), 4);


