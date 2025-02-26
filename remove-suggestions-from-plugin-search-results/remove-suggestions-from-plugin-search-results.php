<?php
/*
 Plugin Name: Remove suggestions from plugin search results
 Plugin URI: https://apasionados.es/blog/
 Description: Removes the "suggestions" that some plugins insert in the plugin search inside of WordPress.
 Author: <a href="https://apasionados.es">Apasionados</a>
 Author URI: https://apasionados.es/
 Version: 1.0.1
 Text Domain: remove-suggestions-from-plugin-search-results
 Domain Path: /languages
 License: GPL v3
 License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
*/
/*
 This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 You should have received a copy of the GNU General Public License along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

if (!defined( 'ABSPATH')) {
    exit;
} // Exit if accessed directly

// Remove JetPack injected ads from version JetPack >=7.2 and other JetPack promotions:
add_filter( 'jetpack_show_promotions', '__return_false' );
add_filter( 'can_display_jetpack_manage_notice', '__return_false', 20 );
add_filter( 'jetpack_just_in_time_msgs', '__return_false', 20 );
// Remove injected ads from WooCommerce version >=3.6:
add_filter('woocommerce_allow_marketplace_suggestions', '__return_false');
// Remove injected ads from tinyhelp, a dead simple library to inject module suggestions into WordPress plugin search results (https://github.com/tinyhelp/tinyhelp)
add_filter( 'tinyhelp_show', '__return_false' );