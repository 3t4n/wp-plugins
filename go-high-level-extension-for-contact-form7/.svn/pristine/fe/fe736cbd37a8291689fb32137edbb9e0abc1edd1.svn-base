<?php
if (!defined('ABSPATH')) {
    exit;
}

// Check if the form is submitted
if (isset($_POST['ghl_global'])) {
    // Verify the nonce
    if (!isset($_POST['_wpnonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), 'ghlcf7_global_tags_action')) {
        wp_die(esc_html__('Nonce verification failed.', 'go-high-level-extension-for-contact-form7'));
    }

    // Check if 'global-tags' exists in the POST data
    $global_tags = isset($_POST['global-tags']) ? sanitize_text_field(wp_unslash($_POST['global-tags'])) : '';

    // Save the sanitized value
    update_option('ghlcf7-global-tag-names', $global_tags);
}

// Retrieve the saved value to display in the form
$CheckglobalTag = get_option('ghlcf7-global-tag-names', '');

?>

<div id="ghlcf7-options">
    <h1><?php esc_html_e('Set Your Global Tags For Form', 'go-high-level-extension-for-contact-form7'); ?></h1>
    <hr />

    <form id="ghlcf7-settings-form" method="POST">
        <?php wp_nonce_field('ghlcf7_global_tags_action'); ?>
        <table class="form-table" role="presentation">
            <tbody>
                <tr>
                    <th scope="row">
                        <label><?php esc_html_e('Global Tags: ', 'go-high-level-extension-for-contact-form7'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="global-tags" value="<?php echo esc_attr($CheckglobalTag); ?>">
                    </td>
                </tr>
            </tbody>
        </table>

        <div>
            <button class="ghl_cf7 button" type="submit"
                name="ghl_global"><?php esc_html_e('Update Settings', 'go-high-level-extension-for-contact-form7'); ?></button>
        </div>
    </form>
</div>