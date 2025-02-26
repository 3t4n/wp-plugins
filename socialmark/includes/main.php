<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

include_once SOCIALMARK_INCLUDES . '/admin/plugin-activation.php';
if ( ! is_admin()) {
    include_once SOCIALMARK_INCLUDES . '/frontend.php';
} else if(is_admin()) {
    include_once SOCIALMARK_INCLUDES . '/admin/admin-options.php';
    include_once SOCIALMARK_INCLUDES . '/admin/enqueue-files.php';

}
include_once SOCIALMARK_INCLUDES . '/uninstall.php';