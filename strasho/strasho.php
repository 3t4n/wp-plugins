<?php
/*
Plugin Name: sTRASHo
Plugin URI: http://boris.kuzmanov.ninja/strasho/
Description: sTRASHo is a smart and easy way to delete your menu items.
Author: Boris Kuzmanov
Author URI: http://boris.kuzmanov.ninja
Version: 1.0.0
License: GPL2
License URI:
*/

class Strasho {
    const name = 'sTRASHo';
    const slug = 'strasho';

    function __construct() {
        register_activation_hook(__FILE__, array(&$this, 'install_strasho'));
        add_action('admin_footer', array(&$this, 'init_strasho'));
    }

    function install_strasho() {
        // nothing happens on installation :)
    }

    function init_strasho() {
        if( is_admin() ) {
            global $pagenow;
        }
        if( ! is_super_admin() ) {
            return;
        }
        if( $pagenow != 'nav-menus.php' ) {
            return;
        }
        $this->register_scripts_and_styles();
    }

    private function register_scripts_and_styles() {
        $this->load_file( self::slug . '-admin-script', 'strasho.js', true );
        $this->load_file( self::slug . '-admin-style', 'strasho.css' );
    }

    private function load_file( $name, $file_path, $is_script = false ) {
        $url    = plugins_url( $file_path, __FILE__ );
        $file   = plugin_dir_path( __FILE__ ) . $file_path;

        if( file_exists( $file ) ) {
            if( $is_script ) {
                wp_register_script( $name, $url, array( 'jquery' ) );
                wp_enqueue_script( $name );
            } else {
                wp_register_style( $name, $url );
                wp_enqueue_style( $name );
            }
        }
    }
}
new Strasho();
?>