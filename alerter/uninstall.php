<?php
// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

// delete the array-field from the database
delete_option( 'alwk_options' );