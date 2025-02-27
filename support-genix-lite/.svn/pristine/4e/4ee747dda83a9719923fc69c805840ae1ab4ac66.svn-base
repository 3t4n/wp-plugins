<?php
/*
Plugin Name: Support Genix Lite
Plugin URI: http://supportgenix.com
Description: Client ticketing app for Wordpress
Version: 1.4.10
Author: Support Genix
Author URI: https://supportgenix.com
Text Domain: support-genix-lite
Domain Path: /languages/
*/

defined('ABSPATH') || exit;

global $wpdb;
$appWpSUpportLiteLoad = false;
$appWpSUpportLiteFile = __FILE__;
$appWpSUpportLitePath = dirname($appWpSUpportLiteFile);
$appWpSUpportLiteVersion = '1.4.10';

if (!defined('SUPPORT_GENIX_LITE_FILE_PATH')) {
    define('SUPPORT_GENIX_LITE_FILE_PATH', $appWpSUpportLitePath);
}

if (!defined('SUPPORT_GENIX_LITE_VERSION')) {
    define('SUPPORT_GENIX_LITE_VERSION', $appWpSUpportLiteVersion);
}

include_once ABSPATH . 'wp-admin/includes/plugin.php';
include_once $appWpSUpportLitePath . '/appcore/APBDWPDiagnosticData.php';
include_once $appWpSUpportLitePath . '/appcore/APBDWPLoaderLite.php';
include_once $appWpSUpportLitePath . '/appcore/APBDWPOfferLite.php';
include_once $appWpSUpportLitePath . '/appcore/APBDWPHasThemesNewsAPI.php';

$appWpSUpportLiteLoad = APBDWPLoaderLite::isReadyToLoad($appWpSUpportLiteFile, $appWpSUpportLiteVersion);

if (true === $appWpSUpportLiteLoad) {
    include_once $appWpSUpportLitePath . '/appcore/APBDWPPromoBannerNotice.php';

    include_once $appWpSUpportLitePath . '/core/helper.php';
    include_once $appWpSUpportLitePath . '/appcore/plugin_helper.php';
    include_once $appWpSUpportLitePath . '/appcore/APBDWPSupportLite.php';

    $appWpSUpportLitePos = new APBDWPSupportLite($appWpSUpportLiteFile, $appWpSUpportLiteVersion);
    $appWpSUpportLitePos->StartPlugin();

    // Deactivation hook.
    register_deactivation_hook($appWpSUpportLiteFile, [$appWpSUpportLitePos, 'OnDeactive']);
}
