<?php
/**
 * @package   mvam-animate
 */
/* 
 @wordpress-plugin
 Plugin Name:       Ani-Mate Animation Extension
 Description:       Adds Animate On Scroll AOS function to Gutenberg blocks
 Version:           1.0.1
 Timestamp:         2023.08.15
 Author:            Brent Patroch
 Author URI:        https://modevmedia.com
 License:           GPLv2 or later
 License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 Text Domain:		mvam-animate
 */

 // Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


// Load gutenberg block extensions
add_action( 'enqueue_block_assets', 'mvam_extend_blocks' );

function mvam_extend_blocks() {
    // Enqueue our script
    wp_enqueue_script(
        'add-attributes-js',
        esc_url( plugins_url( '/build/index.js', __FILE__ ) ),
        array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ),
        '1.0.0',
        true // Enqueue the script in the footer.
    );
}

// Enque AOS 
function mvam_animate_enqueues() {
     wp_enqueue_style('mvam-animate',plugins_url( '/css/aos.css', __FILE__ ));
     wp_register_script('mvam-aos-js', plugins_url( '/js/aos.js', __FILE__ ), array( ),'2.3.4',true);
     wp_enqueue_script('mvam-aos-js');
     wp_register_script('mvam-aos-init-js', plugins_url( '/js/init.js', __FILE__ ), array( ),'1.0',true);
     wp_enqueue_script('mvam-aos-init-js');
}
add_action('wp_enqueue_scripts', 'mvam_animate_enqueues', 91);