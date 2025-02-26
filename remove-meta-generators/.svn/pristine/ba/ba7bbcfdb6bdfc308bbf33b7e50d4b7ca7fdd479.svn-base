<?php
/*
    Plugin Name: Remove Meta Generators
    Description: Remove all meta generator tags for all plugins. No settings necessary! Install and activate.
    Author: <a href="https://www.webbernaut.com">Webbernaut</a>
    Author URI: https://www.webbernaut.com
    License: GPLv2 or later
    Text Domain: remove-meta-generators
    Version: 1.1
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Set the version of this plugin
if ( ! defined( 'removeMetaGenerators' ) ) {
    define( 'removeMetaGenerators', '1.1' );
}

class removeMetaGenerators {
    function __construct() {
        add_action( 'init', array( &$this, 'init_removeMetaGenerators' ) ); // Hook up to the init action
    }

    function init_removeMetaGenerators() {
        ini_set( 'output_buffering', 'on' ); // turns on output_buffering
        function remove_meta_generators( $html ) {
            $pattern = '/<meta name(.*)"generator"[^>]*>/i';
            $html = preg_replace( $pattern, '', $html );
            return $html;
        }
        function clean_meta_generators() {
            ob_start( 'remove_meta_generators' );
        }
        add_action( 'template_redirect', 'clean_meta_generators', 100 );
        add_action( 'wp_footer', function () { ob_end_flush(); }, 100 );
    }
}

new removeMetaGenerators();
