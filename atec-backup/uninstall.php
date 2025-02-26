<?php
if (!defined('ABSPATH')) { exit(); }
wp_cache_delete('atec_wpb_version');

(function() {
    $arr = ['atec_WPB_settings','atec_WPB_last_settings'];
    foreach($arr as $a) delete_option($a);

    if (!class_exists('ATEC_fs')) @require('includes/atec-fs.php');
    $afs = new ATEC_fs();
    $afs->rmdir($afs->upload_dir('backup'),true);
})();
?>