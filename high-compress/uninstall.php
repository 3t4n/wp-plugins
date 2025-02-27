
<?php
// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

delete_option('HIGHCOMPRESS_API_KEY');
delete_option('HIGHCOMPRESS_MODE');
delete_option('HIGHCOMPRESS_USER_ID');
delete_option('HIGHCOMPRESS_PLAN_NAME');
delete_option('HIGHCOMPRESS_MY');

 ?>
