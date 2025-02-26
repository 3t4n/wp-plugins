<?php
/**
 * Plugin Name: Change Product Author for WooCommerce
 * Plugin URI: https://zeropointdevelopment.com/
 * Description: Quickly change or transfer your WooCommerce product author to another users in the WordPress website.
 * Version: 1.0.4
 * Requires Plugins: woocommerce
 * WC requires at least: 7.0
 * WC tested up to: 9.0.2
 * Author: Wil Brown @DeveloperWil
 * Author URI: https://profiles.wordpress.org/developerwil
 * License: GNU/GPL V2 or Later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
* Copyright © 2020 Zero Point Development.  (https://zeropointdevelopment.com/)
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
 */

// No direct access thank you very much
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* WooCommerce Change Product Author
*/
function cpafwc_add_author_post_type_support() {
	add_post_type_support( 'product',  array(  'author' ) );
}
add_action( 'init', 'cpafwc_add_author_post_type_support', 12 );

add_action( 'before_woocommerce_init', function() {
    if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
    }
} );