<?php

namespace RankologyFno\Services\Admin\Settings\LocalBusiness\Fields;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

trait FieldLongitude {
    /**
     * 
     *
     * @return void
     */
    public function renderFieldLongitude() {
        $value = rankology_fno_get_service('OptionPro')->getLocalBusinessLongitude(); ?>
        <input
            type="text"
            name="rankology_fno_option_name[rankology_local_business_lon]"
            placeholder="<?php esc_html_e('e.g. -1.5630987', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Longitude', 'wp-rankology'); ?>"
            value="<?php echo esc_html($value); ?>" />

        <p class="description"><?php esc_html_e('<span class="field-recommended">Recommended</span> property by Google.', 'wp-rankology'); ?></p>
        <?php
    }
}
