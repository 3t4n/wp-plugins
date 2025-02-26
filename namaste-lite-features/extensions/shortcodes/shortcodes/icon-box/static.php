<?php if (!defined('FW')) die('Forbidden');

$uri = NAMASTE_PLUGIN_URL.'/extensions/shortcodes/shortcodes/icon-box';

wp_enqueue_style(
    'namaste-icon-box-shortcode',
    $uri . '/static/css/styles.css'
);
