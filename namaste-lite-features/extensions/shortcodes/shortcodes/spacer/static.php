<?php if (!defined('FW')) die('Forbidden');

$uri = NAMASTE_PLUGIN_URL.'/extensions/shortcodes/shortcodes/spacer';

wp_enqueue_style(
    'namaste-spacer-shortcode',
    $uri . '/static/css/styles.css'
);
