<?php

namespace RankologyFno\Services\Admin\Settings\LocalBusiness\Fields;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

trait FieldPlaceId
{
    /**
     * 
     *
     * @return void
     */
    public function renderFieldPlaceId()
    {
        $value = rankology_fno_get_service('OptionPro')->getLocalBusinessPlaceId(); ?>
<input type="text" name="rankology_fno_option_name[rankology_local_business_place_id]"
    placeholder="<?php esc_html_e('e.g. ChIJ1zmBfihrUQ0RE02R1pnXoc8', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Google Maps Place ID', 'wp-rankology'); ?>"
    value="<?php echo esc_html($value); ?>" />
<p class="description">
    <?php echo __('<a href="https://developers.google.com/places/web-service/place-id" target="_blank">Click here to find your Google Maps Place ID</a><span class="rankology-help dashicons dashicons-redo"></span> for your Local Business. <br>This ID will be used to display the Google Maps link from the LB widget.', 'wp-rankology'); ?>
</p>
<?php
    }
}
