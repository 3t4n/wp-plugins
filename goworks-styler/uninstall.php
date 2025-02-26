<?php

if (!defined('ABSPATH') && !defined('WP_UNINSTALL_PLUGIN')) exit();

function goworks_styler_delete_plugin() {
	delete_option('goworks_styler_settings');
}

goworks_styler_delete_plugin();
