<?php

# Check get_plugin_data function exist
if (!function_exists('get_plugin_data')) {
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
}

# Set Plugin path and url defines.
define('RANKOLOGY_STATS_URL', plugin_dir_url(dirname(__FILE__)));
define('RANKOLOGY_STATS_DIR', plugin_dir_path(dirname(__FILE__)));
define('RANKOLOGY_STATS_MAIN_FILE', RANKOLOGY_STATS_DIR . 'rankology-stats.php');
define('RANKOLOGY_STATS_UPLOADS_DIR', 'rankology-stats');
define('RANKOLOGY_STATS_SITE_URL', home_url());

# Get plugin Data.
$plugin_data = get_plugin_data(RANKOLOGY_STATS_MAIN_FILE);

# Set another useful Plugin defines.
define('RANKOLOGY_STATS_VERSION', $plugin_data['Version']);
define('RANKOLOGY_STATS_SITE', $plugin_data['PluginURI']);
define('RANKOLOGY_STATS_REQUIRE_PHP_VERSION', '5.4.0');
