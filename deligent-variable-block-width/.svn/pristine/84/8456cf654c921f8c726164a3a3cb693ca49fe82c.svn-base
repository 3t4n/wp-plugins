<?php
/**
* Plugin Name: Deligent Variable Columns Block
* Plugin URI: https://about.me/jankimoradiya
* Description: This plugin will work as Addons to Gutenberg’s ‘Column’ block.
* Author: Janki Moradiya
* Author URI: https://profiles.wordpress.org/jankimoradiya/
* Version: 1.0.0
* License: GPL2+
* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

defined( 'ABSPATH' ) || exit;

/**
* Enqueue the block's assets for the editor.
*
* @since 1.0.0
*/
function deligent_variable_columns_block_enqueue() {
    wp_register_script(
        'deligent-variable-columns-block-script',
        plugins_url( 'js/block.build.js', __FILE__ ),
        array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components') // Dependencies, defined above.
    );
    wp_register_style(
        'deligent-variable-columns-block-style',
        plugins_url( '/css/admin-block.css', __FILE__ )
    );

    register_block_type('deligent/variable-columns-block', array(
        'editor_script' => 'deligent-variable-columns-block-script',
        'editor_style' => 'deligent-variable-columns-block-style',
    ));
}

/**
 * Action for the register gutenberg custom block
 */
add_action('admin_init', 'deligent_variable_columns_block_enqueue');

/**
 * Enqueue scripts and styles.
 */
function deligent_variable_columns_block_enqueue_scripts() {
    wp_enqueue_style('deligent-variable-columns-style', plugins_url( 'css/front-block.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'deligent_variable_columns_block_enqueue_scripts' );