<?php
/**
 * Property price settings
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$theme_currency_sign     = $this->get_option('cre_currency_sign', '$');
$theme_currency_position = $this->get_option('cre_currency_sign_position', 'before');
$theme_no_price_text     = $this->get_option('cre_empty_price_text', esc_html__( 'Price On Call', 'crucial-real-estate'));

if (isset($_POST['_wpnonce']) &&  wp_verify_nonce($_POST['_wpnonce'], 'cre_settings')) {
    update_option('cre_currency_sign', sanitize_text_field($theme_currency_sign));
    update_option('cre_currency_sign_position', sanitize_text_field($theme_currency_position));
    update_option('cre_empty_price_text', sanitize_text_field($theme_no_price_text));
    $this->notice();
}
?>
<div class="cre-admin-page-content">

    <form method="post" action="" novalidate="novalidate">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="cre_currency_sign"><?php esc_html_e('Currency Sign', 'crucial-real-estate'); ?></label></th>
                    <td>
                        <input name="cre_currency_sign" type="text" id="cre_currency_sign" value="<?php echo esc_attr($theme_currency_sign); ?>" class="regular-text code">
                        <p class="description"><?php esc_html_e('Provide currency sign. For Example: $', 'crucial-real-estate'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php esc_html_e('Position of Currency Sign', 'crucial-real-estate'); ?></th>
                    <td>
                        <fieldset>
                            <legend class="screen-reader-text"><span><?php esc_html_e('Position of Currency Sign', 'crucial-real-estate'); ?></span></legend>
                            <label>
                                <input type="radio" name="cre_currency_sign_position" value="before" <?php checked($theme_currency_position, 'before') ?>>
                                <span><?php esc_html_e('Before the numbers', 'crucial-real-estate'); ?></span>
                            </label>
                            <br>
                            <label>
                                <input type="radio" name="cre_currency_sign_position" value="after" <?php checked($theme_currency_position, 'after') ?>>
                                <span><?php esc_html_e('After the numbers', 'crucial-real-estate'); ?></span>
                            </label>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="cre_empty_price_text"><?php esc_html_e('Empty Price Text', 'crucial-real-estate'); ?></label></th>
                    <td>
                        <input name="cre_empty_price_text" type="text" id="cre_empty_price_text" value="<?php echo esc_attr($theme_no_price_text); ?>" class="regular-text code">
                        <p class="description"><?php esc_html_e('Text to display when no price is provided.', 'crucial-real-estate'); ?></p>
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