<?php
/**
 * Map and address settings
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$property_default_address       = $this->get_option('cre_property_default_address', esc_html__('15421 Southwest 39th Terrace, Miami, FL 33185, USA', 'crucial-real-estate'));
$property_default_location      = $this->get_option('cre_property_default_location', esc_html__('25.730829,-80.444153', 'crucial-real-estate'));

if (isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'cre_settings')) {
    update_option('cre_property_default_address', sanitize_textarea_field($property_default_address));
    update_option('cre_property_default_location', sanitize_text_field($property_default_location));
    $this->notice();
}
?>
<div class="cre-admin-page-content">
    <form method="post" action="" novalidate="novalidate">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="cre_property_default_address"><?php esc_html_e('Default Address for New Property', 'crucial-real-estate'); ?></label>
                    </th>
                    <td>
                        <textarea name="cre_property_default_address" id="cre_property_default_address" rows="3" cols="40" class="code"><?php echo esc_textarea($property_default_address); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="cre_property_default_location"><?php esc_html_e('Default Map Location for New Property (Latitude,Longitude)', 'crucial-real-estate'); ?></label>
                    </th>
                    <td>
                        <input name="cre_property_default_location" type="text" id="cre_property_default_location" value="<?php echo esc_attr($property_default_location); ?>" class="regular-text code">
                        <p class="description"><?php printf(esc_html__('You can use %s OR %s to get Latitude and longitude of your desired location.', 'crucial-real-estate'), '<a href="http://www.latlong.net/" target="_blank">latlong.net</a>', '<a href="https://getlatlong.net/" target="_blank">getlatlong.net</a>'); ?></p>
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