<?php
include "../../../wp-load.php";
$redirect = WP_PLUGIN_URL.'../../../';
 wp_logout();
 wp_redirect($redirect);
?>