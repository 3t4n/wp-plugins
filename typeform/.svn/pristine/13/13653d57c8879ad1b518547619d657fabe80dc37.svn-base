<?php

/**
 * Plugin Name: Typeform
 * Plugin URI:  https://www.typeform.com/
 * Description: Create beautiful online forms, surveys, quizzes, and much more.
 * Version:     2.9.1
 * Author:      Typeform
 * Author URI:  https://www.typeform.com/?utm_source=wordpressorg&utm_medium=referral&utm_campaign=wordpressorg_integration&utm_content=directory
 * License:     Apache-2.0
 * License URI: https://directory.fsf.org/wiki/License:Apache-2.0
 *
 * @package typeform
 */

defined('ABSPATH') or die('No script kiddies please!');

function typeform_plugin_scripts()
{
    $asset_file = include( plugin_dir_path( __FILE__ ) . 'dist/index.asset.php');

    wp_enqueue_script(
        'typeform-embed',
        plugins_url('dist/index.js', __FILE__),
        $asset_file['dependencies'],
        $asset_file['version']
    );
}

// For gutenberg
if (function_exists('register_block_type')) {
    add_action('enqueue_block_editor_assets', 'typeform_plugin_scripts');
}
