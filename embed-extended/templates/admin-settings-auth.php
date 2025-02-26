<?php

$settings = $data['settings'];

?>
<form method="post">
    <p><?php _e('Some websites require authentication keys/tokens to access their embed feature. Provide the required keys/token for the following websites in order for them to work properly.', 'embed-extended'); ?></p>

    <h2 class="title"><?php _e('Google Maps', 'embed-extended'); ?></h2>
    <table class="form-table" role="presentation">
        <tr>
            <th scope="row">
                <label for="embed-extended-gmaps-api-key">
                    <?php _e('Google Maps API Key', 'embed-extended'); ?>
                </label>
            </th>
            <td>
                <input type="text" class="regular-text" name="embed_extended_gmaps_api_key" id="embed-extended-gmaps-api-key"
                    value="<?php esc_attr_e($settings['embed_extended_gmaps_api_key']) ?>" />
                <p class="description" id="embed-extended-gmaps-api-key-description">
                    <?php

                        printf(
                            /* translators: 1: Google Maps API Key documentation link, 2: Google Maps Embed API link. */
                            __('To get a Google Maps API Key, follow instructions on the Google Maps documentation <a href="%1$s" target="_blank">here</a>. Additionally, make sure that the <a href="%2$s" target="_blank">Maps Embed API</a> for this key is enabled.', 'embed-extended'),
                            'https://developers.google.com/maps/documentation/embed/get-api-key',
                            'https://console.cloud.google.com/google/maps-apis/apis/maps-embed-backend.googleapis.com'
                        );

                    ?>
                </p>
            </td>
        </tr>
    </table>

    <?php submit_button(); ?>
</form>
