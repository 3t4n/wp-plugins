<?php
/**
 * GDPR settings
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$cre_gdpr                 = $this->get_option('cre_gdpr', '0');
$cre_gdpr_in_email        = $this->get_option('cre_gdpr_in_email', '0');

if ( isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'cre_settings') ) {
    update_option('cre_gdpr', intval($cre_gdpr));
    update_option('cre_gdpr_in_email', intval($cre_gdpr_in_email));
    $this->notice();
}
?>
<div class="cre-admin-page-content">
    <form method="post" action="" novalidate="novalidate">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><?php esc_html_e('Add GDPR agreement checkbox in forms across website?', 'crucial-real-estate'); ?></th>
                    <td>
                        <fieldset>
                            <legend class="screen-reader-text"><span><?php esc_html_e('Add GDPR agreement checkbox in forms across website?', 'crucial-real-estate'); ?></span></legend>
                            <label>
                                <input type="radio" name="cre_gdpr" value="1" <?php checked($cre_gdpr, '1') ?>>
                                <span><?php esc_html_e('Yes', 'crucial-real-estate'); ?></span>
                            </label>
                            <br>
                            <label>
                                <input type="radio" name="cre_gdpr" value="0" <?php checked($cre_gdpr, '0') ?>>
                                <span><?php esc_html_e('No', 'crucial-real-estate'); ?></span>
                            </label>
                        </fieldset>
                    </td>
                </tr>
                <th scope="row"><?php esc_html_e('Add GDPR detail in resulting email?', 'crucial-real-estate'); ?></th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span><?php esc_html_e('Add GDPR detail in resulting email?', 'crucial-real-estate'); ?></span></legend>
                        <label>
                            <input type="radio" name="cre_gdpr_in_email" value="1" <?php checked($cre_gdpr_in_email, '1') ?>>
                            <span><?php esc_html_e('Yes', 'crucial-real-estate'); ?></span>
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="cre_gdpr_in_email" value="0" <?php checked($cre_gdpr_in_email, '0') ?>>
                            <span><?php esc_html_e('No', 'crucial-real-estate'); ?></span>
                        </label>
                    </fieldset>
                </td>
                </tr>
            </tbody>
        </table>
        <div class="submit">
            <?php wp_nonce_field('cre_settings'); ?>
            <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php esc_attr_e('Save Changes', 'crucial-real-estate'); ?>">
        </div>
    </form>
</div>