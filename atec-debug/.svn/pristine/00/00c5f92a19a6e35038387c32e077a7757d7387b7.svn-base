<?php
if (!defined('ABSPATH')) { exit(); }
/**
* Fixit: 1.1.25 | CRITICAL, wp-config*.txt
* Fixit: 1.1.29 | CRITICAL, delete @atec-wpd-debug-log.php
*/

(function() {
    if (!class_exists('ATEC_fs')) @require('includes/atec-fs.php');
    $afs = new ATEC_fs();

    $afs->unlink(ABSPATH.'/wp-config.php.atec-debug-bck.txt');
    $afs->unlink(WPMU_PLUGIN_DIR.'/@atec-wpd-debug-log.php');
})();
?>