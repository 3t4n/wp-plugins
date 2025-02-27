<?php
defined( 'ABSPATH' ) or exit;
function mbo_enqueue_wc_admin_meta_boxes()
{
    if ( function_exists( 'WC' ) )
    {
        wp_enqueue_script( 'wc-admin-meta-boxes', WC()->plugin_url() . '/assets/js/admin/meta-boxes.min.js', array( 'jquery', 'jquery-ui-datepicker', /*'jquery-ui-sortable', 'accounting', 'round',*/ 'wc-enhanced-select', /*'plupload-all', 'stupidtable',*/ 'jquery-tiptip' ), WC_VERSION, true );
    }
}