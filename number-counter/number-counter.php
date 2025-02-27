<?php

/**
 * Plugin Name:     Number Counter
 * Plugin URI: 		https://essential-blocks.com
 * Description:     Put spotlight in important data using Counter block for Gutenberg. Customize the designs by adding proper Animation effects with flexibility and many more!
 * Version:         1.1.6
 * Author:          WPDeveloper
 * Author URI: 		https://wpdeveloper.net
 * License:         GPLv3 or later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     number-counter
 *
 * @package         create-block
 */

/**
 * Registers all block assets so that they can be enqueued through the block editor
 * in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/tutorials/block-tutorial/applying-styles-with-stylesheets/
 */

define('NUMBER_COUNTER_BLOCK_VERSION', "1.1.6");
define('NUMBER_COUNTER_BLOCK_ADMIN_URL', plugin_dir_url(__FILE__));
define('NUMBER_COUNTER_BLOCK_ADMIN_PATH', dirname(__FILE__));

require_once __DIR__ . '/includes/font-loader.php';
require_once __DIR__ . '/includes/post-meta.php';
require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/lib/style-handler/style-handler.php';

function number_counter_init()
{

	$script_asset_path = NUMBER_COUNTER_BLOCK_ADMIN_PATH . "/dist/index.asset.php";
	if (!file_exists($script_asset_path)) {
		throw new Error(
			'You need to run `npm start` or `npm run build` for the "number-counter/number-counter" block first.'
		);
	}
	$script_asset = require($script_asset_path);
	$all_dependencies = array_merge($script_asset['dependencies'], array(
		'wp-blocks',
		'wp-i18n',
		'wp-element',
		'wp-block-editor',
		'number-counter-block-controls-util',
		'essential-blocks-eb-animation'
	));

	$index_js     = NUMBER_COUNTER_BLOCK_ADMIN_URL . 'dist/index.js';
	wp_register_script(
		'essential-blocks-separate-number-counter-editor',
		$index_js,
		$all_dependencies,
		$script_asset['version'],
		true
	);

	$load_animation_js = NUMBER_COUNTER_BLOCK_ADMIN_URL . 'assets/js/eb-animation-load.js';
	wp_register_script(
		'essential-blocks-eb-animation',
		$load_animation_js,
		array(),
		NUMBER_COUNTER_BLOCK_VERSION,
		true
	);

	$animate_css = NUMBER_COUNTER_BLOCK_ADMIN_URL . 'assets/css/animate.min.css';
	wp_register_style(
		'essential-blocks-animation',
		$animate_css,
		array(),
		NUMBER_COUNTER_BLOCK_VERSION
	);
	$frontend_js = NUMBER_COUNTER_BLOCK_ADMIN_URL . 'dist/frontend/index.js';
	wp_register_script(
		'essential-blocks-counter-frontend',
		$frontend_js,
		array(),
		NUMBER_COUNTER_BLOCK_VERSION,
		true
	);

	wp_register_style(
		'fontpicker-default-theme',
		NUMBER_COUNTER_BLOCK_ADMIN_URL . 'assets/css/fonticonpicker.base-theme.react.css',
		array(),
		NUMBER_COUNTER_BLOCK_VERSION,
		"all"
	);

	wp_register_style(
		'fontpicker-matetial-theme',
		NUMBER_COUNTER_BLOCK_ADMIN_URL . 'assets/css/fonticonpicker.material-theme.react.css',
		array(),
		NUMBER_COUNTER_BLOCK_VERSION,
		"all"
	);

	wp_register_style(
		'fontawesome-frontend-css',
		NUMBER_COUNTER_BLOCK_ADMIN_URL . 'assets/css/font-awesome5.css',
		array(),
		NUMBER_COUNTER_BLOCK_VERSION,
		"all"
	);

	if (!WP_Block_Type_Registry::get_instance()->is_registered('essential-blocks/number-counter')) {
		register_block_type(
			Number_Counter_Helper::get_block_register_path("number-counter/number-counter", NUMBER_COUNTER_BLOCK_ADMIN_PATH),
			array(
				'editor_script' => 'essential-blocks-separate-number-counter-editor',
				'editor_style' 	=> 'number-counter-editor-css',
				'render_callback' => function ($attributes, $content) {
					if (!is_admin()) {
						wp_enqueue_style('fontawesome-frontend-css');
						wp_enqueue_style('essential-blocks-animation');
						wp_enqueue_script('essential-blocks-counter-frontend');
						wp_enqueue_script('essential-blocks-eb-animation');
					}
					return $content;
				}
			)
		);
	}
}

add_action('init', 'number_counter_init', 99);
