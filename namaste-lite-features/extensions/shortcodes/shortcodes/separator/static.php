<?php if (!defined('FW')) die('Forbidden');

$uri = NAMASTE_PLUGIN_URL.'/extensions/shortcodes/shortcodes/separator';

wp_enqueue_style(
    'namaste-separator-shortcode',
    $uri . '/static/css/styles.css'
);
