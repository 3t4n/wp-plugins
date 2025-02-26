<?php
/*
Plugin Name: Add Save on Facebook Button
Plugin URI: http://uspelite.com
Version: 1.1.1
Author: Kaloyan Gadzhev
Description: The plugin allows you to add "Save on Facebook" button to articles and pages on your website.
*/

if (!defined('WPINC')) {
    die;
}

register_activation_hook( __FILE__, 'setDefaultOptions');

function setDefaultOptions() {
    $displayOptions = array(
                'button-size'   =>  'large',
                'button-position'   =>  'top',
                'button-alignment'     =>  'center',
                'post-type-post'     =>  'post'
        );
        
        if (!get_option('sof-section')) {
            add_option('sof-section', $displayOptions);
        }
        
        $facebookOptions = array(
                'sof-sdk'   =>  1,
                'sof-lang'  =>  'en_EN'
        );
        
        if (!get_option('sof-facebook')) {
            add_option('sof-facebook', $facebookOptions);
        }
}

require_once plugin_dir_path(__FILE__) . 'includes/save-on-facebook-master.php';
define( 'SaveButtonPluginPath', plugin_dir_path( __FILE__ ));

function runSaveOnFacebook() {
    $saveButton = new SaveOnFacebook;
    $saveButton->run();
}

runSaveOnFacebook();
?>
