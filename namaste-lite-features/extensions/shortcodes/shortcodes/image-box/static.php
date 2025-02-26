<?php if (!defined('FW')) die('Forbidden');

$uri = NAMASTE_PLUGIN_URL.'/extensions/shortcodes/shortcodes/image-box';

wp_enqueue_style(
    'namaste-image-box-shortcode',
    $uri . '/static/css/styles.css'
);
