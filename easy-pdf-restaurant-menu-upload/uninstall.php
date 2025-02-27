<?php

if (defined('WP_UNINSTALL_PLUGIN') === false) {
    echo "no way";
    exit;
}

define('PLUGIN_PATH_nsc_eprm', plugin_dir_path(__FILE__));
define('PLUGIN_CONFIGS_PATH_nsc_eprm', PLUGIN_PATH_nsc_eprm . "plugin-config.json");
define('PLUGIN_URL_nsc_eprm', plugin_dir_url(__FILE__));

require dirname(__FILE__) . "/class/class-plugin-configs-nsc_eprm.php";
require dirname(__FILE__) . "/class/class-uninstall-nsc_eprm.php";

$uninstaller = new uninstaller_nsc_eprm();
$uninstaller->delete_options_nsc_eprm();
$uninstaller->remove_directory_nsc_eprm();
