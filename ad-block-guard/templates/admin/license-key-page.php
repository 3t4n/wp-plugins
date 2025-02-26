<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>


<div class="wrap">

	<h1><?php esc_html_e('AdBlock Guard Pro', 'ad-block-guard'); ?></h1>
	<h2><?php esc_html_e('Licensing Manager', 'ad-block-guard'); ?></h2>
    
    <div class="inside">

    <?php
    $license_checker = \AdBlockGuard\LicenseChecker::getInstance();

    if (isset($_POST['submit_license_key'])) {
        // Verify the nonce before processing the form
        if (
            !isset($_POST['wuadblockguard_license_nonce']) || 
            !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['wuadblockguard_license_nonce'])), 'wuadblockguard_license_action')
        ) {
            wp_die(esc_html__('Nonce verification failed. Please try again.', 'ad-block-guard'));
        }

        if (isset($_POST['pro_license_key'])) {
            $license_key = sanitize_text_field(wp_unslash($_POST['pro_license_key']));
        }

        $license_checker->setLicenseKey($license_key);

        $result = $license_checker->activateLicense();

        if ($result['success']) {
            update_option('wuadblockguard_license_status', 'valid');
            update_option('wuadblockguard_license_expires', $result['expires']);
            echo '<div class="updated"><p>' . esc_html__('License key saved and activated.', 'ad-block-guard') . '</p></div>';
        } else {
            echo '<div class="error"><p>' . esc_html__('License activation failed: ', 'ad-block-guard') . esc_html($result['error']) . '</p></div>';
        }
    }

    if (isset($_POST['deactivate_license'])) {
        // Verify the nonce before processing the form
        if (
            !isset($_POST['wuadblockguard_license_nonce']) || 
            !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['wuadblockguard_license_nonce'])), 'wuadblockguard_license_action')
        ) {
            wp_die(esc_html__('Nonce verification failed. Please try again.', 'ad-block-guard'));
        }


        $result = $license_checker->deactivateLicense();

        if ($result['success']) {
            delete_option('wuadblockguard_license_key');
            delete_option('wuadblockguard_license_status');
            delete_option('wuadblockguard_license_expires');
            echo '<div class="updated"><p>' . esc_html__('License deactivated successfully.', 'ad-block-guard') . '</p></div>';
        } else {
            echo '<div class="error"><p>' . esc_html__('License deactivation failed: ', 'ad-block-guard') . esc_html($result['error']) . '</p></div>';
        }
    }

    $current_key = get_option('wuadblockguard_license_key', '');
    $license_status = get_option('wuadblockguard_license_status', 'inactive');
    $license_expires = get_option('wuadblockguard_license_expires', '');
    $product_id = $license_checker->getProductId(); // Using productId from LicenseChecker
    $store_url = $license_checker->getStoreUrl();   // Using storeUrl from LicenseChecker


    ?>
    <form method="post" action="">
        <?php wp_nonce_field('wuadblockguard_license_action', 'wuadblockguard_license_nonce'); ?>
        <table class="wp-list-table widefat fixed striped responsive-table table-width">
            <tr>
                <th><label for="pro_license_key"><?php esc_html_e('License Key', 'ad-block-guard'); ?></label></th>
                <td>
                    <input type="text" id="pro_license_key" name="pro_license_key" value="<?php echo esc_attr($current_key); ?>" class="regular-text">
                </td>
            </tr>
            <tr>
                <th><?php esc_html_e('License Status', 'ad-block-guard'); ?></th>
                <td>
                    <?php
                    if (empty($current_key)) {
                        echo '<div class="license-status inactive">' . esc_html__('No License Entered', 'ad-block-guard') . '</div>';
                    } else {
                        if ($license_status === 'valid') {
                            echo '<div class="license-status active">' . esc_html__('Active', 'ad-block-guard') . '</div>';
                            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="button button-info" href="#" onclick="document.getElementById(\'deactivate-license-form\').submit();">' . esc_html__('Deactivate License', 'ad-block-guard') . '</a>';
                        } elseif ($license_status === 'expired') {
                            $renewal_url = esc_url($store_url . "/checkout/?edd_license_key=" . urlencode($current_key) . "&download_id=" . urlencode($product_id));
                            echo '<div class="license-status expired">' . esc_html__('Expired', 'ad-block-guard') . '</div>';
                            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="button button-primary" href="' . esc_url($renewal_url) . '" target="_blank">' . esc_html__('Renew License', 'ad-block-guard') . '</a>';
                        } else {
                            switch ( strtolower( $license_status ) ) {
                                case 'inactive':
                                    echo '<div class="license-status inactive">' . esc_html__( 'Inactive', 'ad-block-guard' ) . '</div>';
                                    break;
                                case 'active':
                                    echo '<span style="color: green;">' . esc_html__( 'Active', 'ad-block-guard' ) . '</span>';
                                    break;
                                case 'expired':
                                    echo '<span style="color: red;">' . esc_html__( 'Expired', 'ad-block-guard' ) . '</span>';
                                    break;
                                case 'revoked':
                                    echo '<span style="color: red;">' . esc_html__( 'Revoked', 'ad-block-guard' ) . '</span>';
                                    break;
                                case 'disabled':
                                    echo '<span style="color: red;">' . esc_html__( 'Disabled', 'ad-block-guard' ) . '</span>';
                                    break;
                                case 'pending':
                                    echo '<span style="color: red;">' . esc_html__( 'Pending', 'ad-block-guard' ) . '</span>';
                                    break;
                                case 'failed':
                                    echo '<span style="color: red;">' . esc_html__( 'Failed', 'ad-block-guard' ) . '</span>';
                                    break;
                                default:
                                    echo '<span style="color: red;">' . esc_html__( 'Failed', 'ad-block-guard' ) . '</span>';
                                    break;
                            }
                        }
                    }
                    ?>
                </td>
            </tr>

            <?php 

            	$product_details = $license_checker->getProductDetails();

            	if ($license_status !== 'valid' && !empty($product_details)) : ?>


                <tr>
                    <th><?php esc_html_e('Purchase', 'ad-block-guard'); ?></th>
                    <td>
                        <?php
                        
                        if ($product_details) {
                            echo '<a href="' . esc_url($product_details['permalink']) . '" target="_blank" class="button button-primary">' . esc_html__('Buy License', 'ad-block-guard') . ' ( ' . esc_html($product_details['price']) . ' )</a>';
                        }
                        ?>
                    </td>
                </tr>
            <?php endif; ?>
            <?php if ($license_status === 'valid' && !empty($license_expires)) : ?>
                <tr>
                    <th><?php esc_html_e('License Expires', 'ad-block-guard'); ?></th>
                    <td>
                        <div class="license-status active"><?php echo esc_html(date_i18n(get_option('date_format'), strtotime($license_expires))); ?></div>
                    </td>
                </tr>
            <?php endif; ?>
        </table>
        <?php submit_button(__('Save License Key', 'ad-block-guard'), 'primary', 'submit_license_key'); ?>
    </form>

    <form method="post" action="" id="deactivate-license-form">
        <?php wp_nonce_field('wuadblockguard_license_action', 'wuadblockguard_license_nonce'); ?>
        <input type="hidden" name="deactivate_license" value="1">
    </form>
</div>
</div>
</div>
