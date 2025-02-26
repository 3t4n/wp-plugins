<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$CheckNameFields = get_option('ghlcf7_name_fields', []);
$CheckEmailValue = get_option('ghlcf7_email_field');
$CheckPhoneValue = get_option('ghlcf7_phne_field');
?>

<div id="ghlcf7-options">
    <h1><?php esc_html_e('Map Your Contact Form 7 Fields here', 'go-high-level-extension-for-contact-form7'); ?></h1>
    <hr />

    <form id="ghlcf7-settings-form" method="POST" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">

        <?php wp_nonce_field('ghl-cf7'); ?>

        <input type="hidden" name="action" value="ghlcf7_admin_settings">

        <table class="form-table" role="presentation">
            <tbody>
                <tr>
                    <th scope="row">
                        <label><?php esc_html_e('Name Fields: ', 'go-high-level-extension-for-contact-form7'); ?></label>
                    </th>
                    <td id="name-fields-container">
                        <?php foreach ($CheckNameFields as $field) : ?>
                        <div class="name-field-wrapper">
                            <select name="name-field-types[]">
                                <option value="first_name" <?php selected($field['type'], 'first_name'); ?>>First Name
                                </option>
                                <option value="last_name" <?php selected($field['type'], 'last_name'); ?>>Last Name
                                </option>
                                <option value="middle_name" <?php selected($field['type'], 'middle_name'); ?>>Middle
                                    Name</option>
                                <option value="prefix" <?php selected($field['type'], 'prefix'); ?>>Prefix</option>
                                <option value="suffix" <?php selected($field['type'], 'suffix'); ?>>Suffix</option>
                            </select>
                            <input type="text" name="name-field-values[]"
                                value="<?php echo esc_attr($field['value']); ?>">
                            <button type="button" class="remove-name-field">Remove</button>
                        </div>
                        <?php endforeach; ?>
                        <button type="button" id="add-name-field">Add Name Field</button>
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label><?php esc_html_e('Email: ', 'go-high-level-extension-for-contact-form7'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="email-field" value="<?php echo esc_attr($CheckEmailValue); ?>">
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label><?php esc_html_e('Phone: ', 'go-high-level-extension-for-contact-form7'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="phone-field" value="<?php echo esc_attr($CheckPhoneValue); ?>">
                    </td>
                </tr>
            </tbody>
        </table>

        <div>
            <button class="ghl_cf7 button" type="submit" name="ghl_trigger">Update Settings</button>
        </div>
    </form>
</div>