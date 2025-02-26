<?php
/**
 * Plugin Name: Any Posts Widget
 * Plugin URI: https://wordpress.org/plugins/any-posts-widget/
 * Description: Provides a widget allow choosing posts to display easily.
 * Author: Truong Giang
 * Author URI: https://truongwp.com/
 * Version: 1.0.1
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: any-posts-widget
 * Domain Path: /languages
 *
 * @package Any_Posts_Widget
 */

/*
Copyright (C) 2017  Truong Giang (Truongwp)  truongwp@gmail.com

Any Posts Widget is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Any Posts Widget is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Any Posts Widget. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( defined( 'ANY_POSTS_WIDGET_VERSION' ) ) {
	return;
}

define( 'ANY_POSTS_WIDGET_VERSION', '1.0.1' );
define( 'ANY_POSTS_WIDGET_FILE', __FILE__ );
define( 'ANY_POSTS_WIDGET_PATH', plugin_dir_path( ANY_POSTS_WIDGET_FILE ) );
define( 'ANY_POSTS_WIDGET_URL', plugin_dir_url( ANY_POSTS_WIDGET_FILE ) );

require_once ANY_POSTS_WIDGET_PATH . 'class-any-posts-widget.php';

if ( ! function_exists( 'any_posts_widget' ) ) {
	/**
	 * Get plugin instance.
	 *
	 * @return Any_Posts_Widget
	 */
	function any_posts_widget() {
		return Any_Posts_Widget::get_instance();
	}
}

$GLOBALS['any_posts_widget'] = any_posts_widget();
