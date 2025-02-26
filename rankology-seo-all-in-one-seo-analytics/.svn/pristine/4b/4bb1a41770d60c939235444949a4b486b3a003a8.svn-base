<?php

namespace RankologyFno\Services\Admin\Settings\LocalBusiness\Fields;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

trait FieldLatitude {
    /**
     * 
     *
     * @return void
     */
    public function renderFieldLatitude() {
        $value = rankology_fno_get_service('OptionPro')->getLocalBusinessLatitude(); ?>
        <input
            type="text"
            name="rankology_fno_option_name[rankology_local_business_lat]"
            placeholder="<?php echo esc_html__('e.g. 43.4831389', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Latitude', 'wp-rankology'); ?>"
            value="<?php echo esc_html($value); ?>" />

        <p class="description"><?php esc_html_e('<span class="field-recommended">Recommended</span> property by Google.', 'wp-rankology'); ?></p>
        <?php
    }
}
