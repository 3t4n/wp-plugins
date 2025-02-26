<?php
/*
Plugin Name: Dessky Cache
Text Domain: dessky-cache
Description: Dessky Cache is the ultralight caching plugin suited for websites that are hosted on shared hosting with limited resources.
Author: Dessky
Author URI: https://dessky.com
License: GPL2+
Version: 1.1
*/

/*
Copyright (C)  2020 Dessky
Copyright (C)  2016 keycdn
Copyright (C)  2011-2015 Sergej Müller

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/


// exit
defined('ABSPATH') OR exit;


// constants
define('DCH_FILE', __FILE__);
define('DCH_DIR', dirname(__FILE__));
define('DCH_BASE', plugin_basename(__FILE__));
define('DCH_CACHE_DIR', WP_CONTENT_DIR. '/cache/dessky-cache');
define('DCH_MIN_WP', '4.1');

// hooks
add_action(
	'plugins_loaded',
	array(
		'Dessky_Cache',
		'instance'
	)
);
register_activation_hook(
	__FILE__,
	array(
		'Dessky_Cache',
		'on_activation'
	)
);
register_deactivation_hook(
	__FILE__,
	array(
		'Dessky_Cache',
		'on_deactivation'
	)
);
register_uninstall_hook(
	__FILE__,
	array(
		'Dessky_Cache',
		'on_uninstall'
	)
);


// autoload register
spl_autoload_register('dch_core_autoload');

// autoload function
function dch_core_autoload($class) {
	if ( in_array($class, array('Dessky_Cache', 'Dessky_Cache_Disk')) ) {
		require_once(
			sprintf(
				'%s/core/%s.php',
				DCH_DIR,
				strtolower($class)
			)
		);
	}
}
