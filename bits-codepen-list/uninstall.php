<?php

if (! defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

delete_option('bits_codepen_shortcode_cachetime');
