<?php
/**
 *
 * @package           Japanese_Lorem_Block
 *
 * Plugin Name:       Japanese Lorem Block
 * Plugin URI:        https://github.com/TeBenachi/Japanese-lorem-text
 * Description:       Japanese Lorem Block generates one paragraph of placeholder text in Japanese.
 * Version:           1.0.2
 * Author:            TeBenachi
 * Author URI:        https://profiles.wordpress.org/utz119/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       japanese-lorem-block
 * Domain Path:       /languages
 */

if( ! defined( 'ABSPATH' )) {
     exit;
}

function jplr_blocks_register_block_type($block, $options = array())
 {
    register_block_type(
        'jplr-blocks/' . $block,
        array_merge(
            array(
                'editor_script' =>  'jplr-blocks-editor-script',
                'editor_style'  =>  'jplr-blocks-editor-style',
                'script'        =>  'jplr-blocks-script',
                'style'         =>  'jplr-blocks-style'
            )
        )
    );
}
    
function jplr_blocks_register() {
     
    wp_register_script(
        'jplr-blocks-editor-script', 
        plugins_url('dist/editor.js', __FILE__ ),
        array('wp-blocks', 'wp-i18n','wp-element', 'wp-editor', 'wp-components')
    );
    
    wp_register_script(
        'jplr-blocks-script', 
        plugins_url('dist/script.js', __FILE__ )
    );
    
    wp_register_style(
        'jplr-blocks-editor-style',
        plugins_url("dist/editor.css", __FILE__),
        array( 'wp-edit-blocks' )
    );
    
    wp_register_style(
        'jplr-blocks-style',
        plugins_url("dist/script.css", __FILE__)
    );
            
    jplr_blocks_register_block_type('japaneseloremblock');

}
 
add_action( 'init', 'jplr_blocks_register' );
 