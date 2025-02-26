<?php
/*
 Plugin Name: Harden WP
 Plugin URI: http://wpkeeper.com/wordpress-plugin/harden-wp-wordpress-plugin/
 Description: Harden WP is a super simple plugin when activated automaticly provides protection against Brute Force attacks as well as common known exploits of WordPress.
 Version: 1.0.1
 Author: jgwpk
 Author URI: http://wpkeeper.com
 License: GPL2
 */

/*
 Copyright 2013  jgwpk  (email : support@wpkeeper.com)

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

/**
 * Some Basic Things
 */
define('HARDENPACK_BASEURL', $_SERVER['HTTP_HOST']);

/**
 * Plugin Activation Hook
 *
 * Right now the plugin is basic and will juts do what it needs to do to protect the WordPress Install
 */
function hardenWP_install() {

	// Loot what we need
	require_once (dirname(__FILE__) . '/library/backend_rewrites.class.php');
	require_once (dirname(__FILE__) . '/library/bot_rewrites.class.php');
	
	// Generate a new key for the plugin
	$randomKey = substr(md5(rand()), 0, 7);
	
	
	
	// Create and or add random key for later plugin use
	// For th time being we will simply create one key and leave it.
	// This will hook in nice in later planned plugin version
	if(!get_option('hardenwp_random_key'))
		add_option('hardenwp_random_key', $randomKey);

	// Set new object instances
	$backend_rewrites = new harden_backend_rewrites();
	$bot_rewrites = new harden_botList();

	// Get Root
	$harden_wordpress_root = ABSPATH;
	$harden_htaccess_path = $harden_wordpress_root . '.htaccess';

	// Check to see if permalinks is set. If not then leave a WP Die Message.
	global $wp_rewrite;
	if ($wp_rewrite -> permalink_structure == '')
		wp_die('<h2>Oops!</h2> You must be using permalinks for Harden WP to work. <p><a href="http://google.com" onclick="if(!confirm(\'You will be redirected off your site. Do you want to continue?\')){ return false; }" title="Find out how to fix this error">Click Here</a> to find out how to fix the issue.</p> <p><a href="#" title="Go back" onclick="history.go(-1); return false;">Go Back</a></p>');

	// Check if the .htaccess file is writable
	if (!is_writable($harden_htaccess_path))
		wp_die('<h2>Oops!</h2> Harden WP found that your .htaccess file is not writable. <p><a href="http://google.com" onclick="if(!confirm(\'You will be redirected off your site. Do you want to continue?\')){ return false; }" title="Find out how to fix this error">Click Here</a> to find out how to fix the issue.</p> <p><a href="#" title="Go back" onclick="history.go(-1); return false;">Go Back</a></p>');

	// Fresh Content
	$org_htaccess_content = file_get_contents($harden_htaccess_path);

	// Start adding the plugin content to the .htaccess file
	$htaccess = fopen($harden_htaccess_path, 'w+');

	// Just in case lets do a check so we are not creating a mess
	if (!strpos(file_get_contents($harden_htaccess_path), '# Harden WP Rewrite Rules For WordPress Backend'))
		fwrite($htaccess, $backend_rewrites -> output());

	// Close the connection
	fclose($htaccess);

	// Start adding the plugin content to the .htaccess file
	$htaccess = fopen($harden_htaccess_path, 'a');

	// Write the Bot Data to the htaccess file
	if (!strpos(file_get_contents($harden_htaccess_path), '# Harden WP Rewrite Rules For Bad Bots'))
		fwrite($htaccess, $bot_rewrites -> output() . $org_htaccess_content);

	// Close the connection
	fclose($htaccess);
}

register_activation_hook(__FILE__, 'hardenWP_install');

/**
 * Deactivation Hook
 *
 * Simply Remove the content from the .htaccess file for now
 */
function hardenWP_uninstall() {

	// Loot what we need
	require_once (dirname(__FILE__) . '/library/backend_rewrites.class.php');
	require_once (dirname(__FILE__) . '/library/bot_rewrites.class.php');

	// Set new object instances
	$backend_rewrites = new harden_backend_rewrites();
	$bot_rewrites = new harden_botList();

	// Get Root
	$harden_wordpress_root = ABSPATH;
	$harden_htaccess_path = $harden_wordpress_root . '.htaccess';

	// Check if the .htaccess file is writable
	if (!is_writable($harden_htaccess_path))
		wp_die('<h2>Oops!</h2> Starter Pack found that your .htaccess file is not writable. <p><a href="http://google.com" onclick="if(!confirm(\'You will be redirected off your site. Do you want to continue?\')){ return false; }" title="Find out how to fix this error">Click Here</a> to find out how to fix the issue.</p> <p><a href="#" title="Go back" onclick="history.go(-1); return false;">Go Back</a></p>');

	// Strip backend code rewrite contents
	$stripped_backend_rewrites = str_replace($backend_rewrites -> output(), '', file_get_contents($harden_htaccess_path));

	// Open htaccess file for complete rewrite of contents
	$htaccess = fopen($harden_htaccess_path, 'w+');

	// Rewrite the htacess file without Backend Rewrites
	fwrite($htaccess, $stripped_backend_rewrites);

	// Close the connection
	fclose($htaccess);

	// Strip backend code Bot Rewrites
	$stripped_bot_rewrites = str_replace($bot_rewrites -> output(), '', file_get_contents($harden_htaccess_path));

	// Open htaccess file for complete rewrite of contents
	$htaccess = fopen($harden_htaccess_path, 'w+');

	// Rewrite the htacess file without Bot Rewrites
	fwrite($htaccess, $stripped_bot_rewrites);

	// Close the connection
	fclose($htaccess);
}

register_deactivation_hook(__FILE__, 'hardenWP_uninstall');
?>