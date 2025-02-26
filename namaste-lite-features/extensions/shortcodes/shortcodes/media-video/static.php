<?php if (!defined('FW')) die('Forbidden');

$uri = NAMASTE_PLUGIN_URL.'/extensions/shortcodes/shortcodes/media-video';

wp_enqueue_style(
    'namaste-media-video-shortcode',
    $uri . '/static/css/styles.css'
);

wp_enqueue_script(
	'namaste-media-video-shortcode-script',
    $uri . '/static/js/video.js'
);