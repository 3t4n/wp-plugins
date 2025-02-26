<?php
/**
 * Plugin Name: Snoobi ID checker
 * Description: Snoobi ID checker plugin
 * Version: 1.0
 * Author: Snoobi Technology B.V.
 * Plugin URI: https://www.imelaps.ee/plugin/readme.txt
 * Copyright: 2021 Snoobi B.V.
 * License: GPLv2
 **/

defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

function snoobiic_plugin_init($attrs) {
    $id = $attrs['id'];
    if(array_key_exists('language', $attrs)) {
        $language = $attrs['language'];
    } else {
        $language = 'en';
    }

    snoobiic_enqueue_scripts($id, $language);
    ob_start() ?>
<div id="snoobi-id-check"></div>
<?php
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}

function snoobiic_enqueue_scripts($id, $language) {
    $args = [
        'id'            => $id,
        'language'         => $language,
    ];
    wp_register_script( 'snoobiidscript', plugins_url('scripts/function.js', __FILE__), [], null, true );
    wp_localize_script( 'snoobiidscript', 'myData', $args);
    wp_enqueue_script( 'snoobiidscript' );
}

add_shortcode('idsnoobi', 'snoobiic_plugin_init');
