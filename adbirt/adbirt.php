<?php

/*
Plugin Name: Adbirt
Description: This is to declare that the plugin works with Adbirt as a third party platform and by using the plugin, I hereby abide by the Term of Service and privacy policy of Adbirt as stated on their website without violating any of their terms and privacy. https://adbirt.com/privacy and https://adbirt.com/terms
Author: Adbirt.com <info@adbirt.com>
Version: 0.1
Author URI: info@adbirt.com
*/

/**
 * Enqueue a script with jQuery as a dependency.
 */
function adbirt_scripts_method() {
    wp_enqueue_script( 'adbirt-script', 'https://adbirt.com/public/assets/js/advertiser.js', array( 'jquery' ), null, true );
}
add_action( 'wp_enqueue_scripts', 'adbirt_scripts_method' );
