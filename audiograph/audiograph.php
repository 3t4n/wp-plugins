<?php
/**
 * Plugin Name: Audiograph
 * Plugin URI: https://wordpress.org/plugins/audiograph
 * Description: Embed your Audiograph links with the Audiograph Plugin!
 * Version: 1.0
 * Author: Audiograph, Inc.
 * Author URI: https://audiograph.io
 */


add_action("init", function(){
    wp_oembed_add_provider(
        '#https?://(www\\.)?audiograph\\.io/.*#i',
        'https://audiograph.io/services/oembed',
        true
    );
});

