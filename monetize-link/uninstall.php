<?php
namespace MonetizeLinkPlugin;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/utils.php';

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

mlp_plugin_delete_options();