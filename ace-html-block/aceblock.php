<?php 

/*
Plugin Name: Ace HTML Block
Description: Raw  HTML Block with ACE Editor
Version:     1.0.1
Author:      Will Delphia
License:     GPL2
*/


function aceblock_block() {
    wp_register_script(
        'aceblock-js',
        plugins_url( 'aceblock.build.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-editor' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'aceblock.build.js' )
    );

    register_block_type( 'aceblock/aceblock', array(
        'editor_script' => 'aceblock-js',
        )
    );
}
add_action( 'init', 'aceblock_block' );