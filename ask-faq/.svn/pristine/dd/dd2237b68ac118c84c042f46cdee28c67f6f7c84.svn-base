<?php
/**
 * Plugin Name:       Ask FAQ
 * Description:       Best FAQ block including tab and accordion version what provides to use text, audio and video as Write Answer.
 * Requires at least: 4.0
 * Requires PHP:      7.0
 * Version:           0.0.2
 *  Author:         ThemeAtelier
 *  Author URI:     http://themeatelier.net/
 *  Requirements:   PHP 7.0 or above, WordPress 4.0 or above.
 * Text Domain:  ask-faq
 */

 // load text domain from plugin folder
function ask_faq_load_textdomain()
{
	load_plugin_textdomain('', false, dirname(__FILE__) . "/languages");
}
add_action("plugins_loaded", 'ask_faq_load_textdomain');


 // faq block init
function create_ask_faq_block_init() {
	register_block_type( __DIR__ . '/build/tabs' );
	register_block_type( __DIR__ . '/build/tab' );
	register_block_type( __DIR__ . '/build/accordion-block');
}

add_action( 'init', 'create_ask_faq_block_init' );

function ask_faq_load_scripts_textdomain(){
    wp_set_script_translations( 'create-block-asktabfaq-editor-script', 'ask-faq', dirname(__FILE__) . "/languages" );
    wp_set_script_translations( 'create-block-tabquestion-editor-script', 'ask-faq', dirname(__FILE__) . "/languages" );
    wp_set_script_translations( 'create-block-askaccordionfaq-editor-script', 'ask-faq', dirname(__FILE__) . "/languages" );
}
add_action('init', 'ask_faq_load_scripts_textdomain');

 // faq block scripts
function ask_faq_script() {
    wp_enqueue_script( 'material-components', plugin_dir_url( __FILE__ ) . 'material-components.js' );
    wp_enqueue_script( 'ask-tab-main', plugin_dir_url( __FILE__ ) . 'ask.main.js' );
}
add_action( 'wp_footer', 'ask_faq_script' );

// Register block category 
function ask_faq_plugin_categories( $categories ) {
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'ask-faq',
                'title' => __( 'ask-faq', 'ask-faq' ),
            ],
        ]
    );
}
add_action( 'block_categories', 'ask_faq_plugin_categories', 10, 2 );