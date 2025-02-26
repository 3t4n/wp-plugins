<?php

/**
 * Plugin Name: Lazy Images Without Jetpack
 * Description: Speed up your site and create a smoother viewing experience by loading images as visitors scroll down the screen, instead of all at once. Based on Lazy Images module, from Jetpack plugin, http://wordpress.org/plugins/jetpack/
 * Author: Nico Kaiser
 * Version: 1.2
 * Author URI: https://kaiser.me
 * License: GPL2+
 */

define( 'LAZY_IMAGES_VERSION', '1.2' );

/**
 * This module relies heavily upon the Lazy Load plugin which was worked on by
 * Mohammad Jangda (batmoo), the WordPress.com VIP team, the TechCrunch 2011
 * redesign team, and Jake Goldman of 10up LLC.
 *
 * The JavaScript has been updated to rely on InterSection observer instead of
 * jQuery Sonar. Many thanks to Dean Hume (deanhume) and his example:
 * https://github.com/deanhume/lazy-observer-load
 */

require_once( plugin_dir_path( __FILE__ ) . 'lazy-images/lazy-images.php' );

/*
 * Initialize lazy images on the wp action so that conditional
 * tags are safe to use.
 *
 * As an example, this is important if a theme wants to disable lazy images except
 * on single posts, pages, or attachments by short-circuiting lazy images when
 * is_singular() returns false.
 *
 * See: https://github.com/Automattic/jetpack/issues/8888
 */

add_action( 'wp', array( 'Lazy_Images', 'instance' ) );
