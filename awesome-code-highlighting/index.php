<?php 
/*
Plugin Name: Awesome Code Highlighting
Plugin URI: https://wordpress.org/plugins/awesome-code-highlighting/
Description: Auto-magically Highlight Code Blocks. Currently requires manually code changes to change the code theme.
Version: 0.0.2
Author: Richard Keller
Author URI: https://richardkeller.net 
License: GPL2
Tags: code highlight, syntax
*/

require_once(__DIR__ . '/customizer.php');

class RBK_Code_Highlight {
    public function __construct() {    
        add_action('wp_enqueue_scripts', array($this, 'rbk_code_highlights'));
        add_action('wp_footer', array($this, 'rbk_remove_pre_style'));
    }

    public $options = array(

    );

    public function rbk_code_highlights(){
        wp_enqueue_script('rbk-code-highlights-js', plugin_dir_url( __FILE__ ).'highlight.pack.js', array());
        wp_enqueue_script('rbk-code-highlights-js-2', plugin_dir_url( __FILE__ ).'init-highlight.js', array('rbk-code-highlights-js'));
        wp_enqueue_style('rbk-code-highlights-css', plugin_dir_url( __FILE__ ).'styles/'.get_option('code_highlighting_theme').'.css');
    }
    public function rbk_remove_pre_style() {
        echo '
            <style type="text/css">
                .wp-block-code {
                    border: 0;
                }
                pre {
                    overflow: auto;
                }
            </style>
        ';
    }
}

if( !is_admin() ){
    new RBK_Code_Highlight();
}

?>