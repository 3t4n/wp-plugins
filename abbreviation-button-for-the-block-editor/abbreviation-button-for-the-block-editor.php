<?php 
/**
 * Plugin Name: Abbreviation button for the Block Editor
 * Plugin URI: https://whodunit.fr/gestion-des-abreviations-pour-lediteur-de-blocs-gutenberg
 * Description: Add an abbreviation format button to the formatting toolbar in the block editor.
 * Version: 0.1
 * Author: audrasjb, guillaumeturpin, whodunitagency
 * Author URI: https://whodunit.fr
 * text-domain: abbreviation-button-for-the-block-editor
**/

function abbr_button_enqueue_block_editor_assets() {
	wp_enqueue_script( 'abbreviation-tag-script',
		plugins_url( 'build/index.js', __FILE__ ),
		[],
		filemtime( plugin_dir_path( __FILE__ ) . 'build/index.js' ),
		true
	);
	wp_set_script_translations( 'abbreviation-tag-script', 'abbreviation-button-for-the-block-editor' );

	wp_enqueue_style( 'abbreviation-tag-style',
		plugins_url( 'build/index.css', __FILE__ ),
		[],
		filemtime( plugin_dir_path( __FILE__ ) . 'build/index.css' )
	);
}
add_action( 'enqueue_block_editor_assets', 'abbr_button_enqueue_block_editor_assets' );

function abbr_button_set_script_translations() {
	wp_set_script_translations( 'abbreviation-tag-script', 'abbreviation-button-for-the-block-editor' );
}
add_action( 'init', 'abbr_button_set_script_translations' );
