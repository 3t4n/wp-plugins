<?php
/**
 * Plugin Name:       AI Content Forge
 * Description:       AI Content Forge is a Gutenberg block that allows users to generate content using OpenAI's API. This block can be added to posts or pages to automatically generate content based on a prompt.
 * Requires at least: 6.7.1
 * Requires PHP:      7.2
 * Version:           1.0.0
 * Author:            Aarti Chauhan
 * Author URI:        https://profiles.wordpress.org/aarti1318/
 * Contributors:      aarti1318, dhavaldanny
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ai-content-forge
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
require_once plugin_dir_path(__FILE__) . 'includes/settings.php';

function aicg_ai_content_forge_block_init() {
	register_block_type( __DIR__ . '/build', array(
        'render_callback' => 'aicg_render_ai_content_generator_block',
    ) );
	wp_localize_script(
        'aicg-ai-content-forge-editor-script',
        'AIContentGeneratorSettings',
        array(
            'apiKey' => get_option('aicg_openai_api_key'),
            'model'  => get_option('aicg_openai_model', 'gpt-3.5-turbo'),
        )
    );
}
add_action( 'init', 'aicg_ai_content_forge_block_init' );

