<?php
if (!defined('ABSPATH')) {
    exit;
}

// Verify the nonce before processing $_GET data
if (isset($_GET['_wpnonce']) && !wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['_wpnonce'])), 'ghl-cf7_nonce')) {
    wp_die(esc_html__('Nonce verification failed.', 'go-high-level-extension-for-contact-form7'));
}

// Process only after nonce verification
if (isset($_GET['one_connection']) && sanitize_text_field(wp_unslash($_GET['one_connection'])) === 'success') {
    $ghlcf7_access_token  = isset($_GET['atoken']) ? sanitize_text_field(wp_unslash($_GET['atoken'])) : '';
    $ghlcf7_refresh_token = isset($_GET['rtoken']) ? sanitize_text_field(wp_unslash($_GET['rtoken'])) : '';
    $ghlcf7_locationId    = isset($_GET['loctid']) ? sanitize_text_field(wp_unslash($_GET['loctid'])) : '';
    $ghlcf7_client_id     = isset($_GET['clntid']) ? sanitize_text_field(wp_unslash($_GET['clntid'])) : '';
    $ghlcf7_client_secret = isset($_GET['clntsct']) ? sanitize_text_field(wp_unslash($_GET['clntsct'])) : '';

    // Save data only if valid
    if (!empty($ghlcf7_access_token)) {
        update_option('ghlcf7_access_token', $ghlcf7_access_token);
    }
    if (!empty($ghlcf7_refresh_token)) {
        update_option('ghlcf7_refresh_token', $ghlcf7_refresh_token);
    }
    if (!empty($ghlcf7_locationId)) {
        update_option('ghlcf7_locationId', $ghlcf7_locationId);
        $location_name = ghlcf7_location_name($ghlcf7_locationId);
        if (!empty($location_name) && isset($location_name->name)) {
            update_option('ghlcf7_loc_name', $location_name->name);
        }
    }
    if (!empty($ghlcf7_client_id)) {
        update_option('ghlcf7_client_id', $ghlcf7_client_id);
    }
    if (!empty($ghlcf7_client_secret)) {
        update_option('ghlcf7_client_secret', $ghlcf7_client_secret);
    }

    update_option('ghlcf7_location_connected', 1);

    delete_transient('ghlcf7_location_tags');
    delete_transient('ghlcf7_location_wokflow');

    wp_redirect(admin_url('admin.php?page=ib-ghlcf7'));
    exit;
}

$ghlcf7_location_connected = get_option('ghlcf7_location_connected', 0);
$ghlcf7_client_id = get_option('ghlcf7_client_id');
$ghlcf7_client_secret = get_option('ghlcf7_client_secret');
$ghlcf7_locationId = get_option('ghlcf7_locationId');
$redirect_page = admin_url('admin.php?page=ib-ghlcf7');
$redirect_uri = get_site_url();
$nonce = wp_create_nonce('ghl-cf7_nonce');
$connect_url = esc_url(add_query_arg(
    array(
        'get_code' => 1,
        'redirect_page' => $redirect_page,
        '_wpnonce' => $nonce,
    ),
    GHLCF7_AUTH_URL
));
?>

<div id="ib-ghlcf7">
    <h1> <?php esc_html_e('Connect With Your GHL Subaccount', 'go-high-level-extension-for-contact-form7'); ?> </h1>
    <hr />
    <table class="form-table" role="presentation">
        <tbody>
            <tr>
                <th scope="row">
                    <label> <?php esc_html_e('Connect GHL Subaccount Location', 'go-high-level-extension-for-contact-form7'); ?> </label>
                </th>
                <td>
                    <?php if ($ghlcf7_location_connected) { ?>
                    <div class="connected-location">
                        <button class="button button-connected"
                            disabled><?php esc_html_e('Connected', 'go-high-level-extension-for-contact-form7'); ?></button>
                        <!-- Show success message after connection -->
                        <?php if (isset($_GET['connected']) && sanitize_text_field(wp_unslash($_GET['connected'])) === 'true') { ?>
                        <p class="success-message">
                            <?php esc_html_e('You have successfully connected to Subaccount Location ID:', 'go-high-level-extension-for-contact-form7'); ?>
                            <?php echo esc_html($ghlcf7_locationId); ?></p>
                        <?php } ?>
                        <p class="description">
                            <?php esc_html_e('To connect another subaccount location, click below:', 'go-high-level-extension-for-contact-form7'); ?></p>
                        <a class="ghl_connect button"
                            href="<?php echo esc_html($connect_url); ?>"><?php esc_html_e('Connect Another Subaccount', 'go-high-level-extension-for-contact-form7'); ?></a>
                    </div>
                    <?php } else { ?>
                    <div class="not-connected-location">
                        <p class="description">
                            <?php esc_html_e("You're not connected to any subaccount location yet.", 'go-high-level-extension-for-contact-form7'); ?></p>
                        <a class="ghl_connect button"
                            href="<?php echo esc_html($connect_url); ?>"><?php esc_html_e('Connect GHL Subaccount', 'go-high-level-extension-for-contact-form7'); ?></a>
                    </div>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php esc_html_e('Your Connected GHL Subaccount LocationID', 'go-high-level-extension-for-contact-form7'); ?></label>
                </th>
                <td>
                    <?php if ($ghlcf7_location_connected) { ?>
                    <p class="description"><?php esc_html_e('Location ID:', 'go-high-level-extension-for-contact-form7'); ?>
                        <?php echo esc_html($ghlcf7_locationId); ?></p>
                    <?php } else { ?>
                    <p class="description">
                        <?php esc_html_e('You are not connected yet. Please connect by clicking the above button.', 'go-high-level-extension-for-contact-form7'); ?>
                    </p>
                    <?php } ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>