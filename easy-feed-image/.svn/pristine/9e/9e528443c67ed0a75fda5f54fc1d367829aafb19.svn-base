<?php
defined('ABSPATH') or exit;

global $wp_version;

if (version_compare($wp_version, ADEFI_WP_REQUIRED_VERSION, '<')) {
    wp_die(esc_attr__('Este plugin requer no mínimo a versão ' . ADEFI_WP_REQUIRED_VERSION . ' do Wordpress', 'ad_feed_image_easy'));
}

update_option(ADEFI_PREFIX . '_version', ADEFI_VERSION);