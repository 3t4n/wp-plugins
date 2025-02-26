<?php
/**
* Plugin Name:       Atom Featured Image
* Plugin URI:        https://github.com/stummer/Atom-Featured-Image
* Description:       Adds the post's featured image to the atom feed
* Version:           1.0.0
* Requires at least: 5.3
* Author:            Henning Stummer
* Author URI:        https://www.stummerweb.de
* License:           GPL v3 or later
* License URI:       https://www.gnu.org/licenses/gpl-3.0
* Text Domain:       atom_featured_image
* Domain Path:       /languages
*
* @package Atom Featured Image
*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
**/

// If this file was called directly, abort.
defined('ABSPATH') || exit();

// Defines the base path of the plugin.
define('ATOM_IMAGE_BASE_PATH', dirname(__FILE__));

// Defines the default size of the image used in the atom feed.
define('ATOM_IMAGE_DEFAULT_SIZE', 'medium');


/*
* Loading and initializing all classes.
* @since  1.0.0
*/
require_once ATOM_IMAGE_BASE_PATH . '/includes/options.php';
require_once ATOM_IMAGE_BASE_PATH . '/includes/feed-image.php';
require_once ATOM_IMAGE_BASE_PATH . '/includes/admin-settings.php';
require_once ATOM_IMAGE_BASE_PATH . '/includes/loader.php';

\AtomFeaturedImage\Loader::init();
