<?php
/** 
 * OPBW Process
 * 
 * @uses history_id
 * 
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly    
$download_url = admin_url( 'admin-ajax.php' ).'?action=opbw_download_backup&history_id='.$history_id.'&ajax_nonce_parameter='.wp_create_nonce( "opbw-nonce-ajax" );
?>
<div class="opbw-history-actions">
    <a class="history-edit opbw_hidden" title="<?php esc_attr_e('Edit', 'opal-bulkedit-for-woocommerce') ?>" href="<?php echo esc_url(admin_url('admin.php?page=opbw-bulk-edit&history_id='.$history_id)) ?>"><span class="dashicons dashicons-edit"></span></a>
    <a class="history-logs" title="<?php esc_attr_e('Check logs', 'opal-bulkedit-for-woocommerce') ?>" href="javascript:void(0)" data-id="<?php echo esc_attr($history_id) ?>"><span class="dashicons dashicons-clipboard"></span></a>
    <a class="history-download-backup" title="<?php esc_attr_e('Download backup file', 'opal-bulkedit-for-woocommerce') ?>" href="<?php echo esc_attr($download_url) ?>" data-id="<?php echo esc_attr($history_id) ?>"><span class="dashicons dashicons-download"></span></a>
    <a class="history-restore" title="<?php esc_attr_e('Restore before editing', 'opal-bulkedit-for-woocommerce') ?>" href="javascript:void(0)" data-id="<?php echo esc_attr($history_id) ?>"><span class="dashicons dashicons-image-rotate"></span></a>
    <a class="history-delete" title="<?php esc_attr_e('Delete history', 'opal-bulkedit-for-woocommerce') ?>" href="javascript:void(0)" data-id="<?php echo esc_attr($history_id) ?>"><span class="dashicons dashicons-trash"></span></a>
</div>
