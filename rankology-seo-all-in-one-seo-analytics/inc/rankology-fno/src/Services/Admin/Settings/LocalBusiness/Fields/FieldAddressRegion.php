<?php

namespace RankologyFno\Services\Admin\Settings\LocalBusiness\Fields;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

trait FieldAddressRegion {
    /**
     * 
     *
     * @return void
     */
    public function renderFieldAddressRegion() {
        $value = rankology_fno_get_service('OptionPro')->getLocalBusinessAddressRegion(); ?>
        <input
            type="text"
            name="rankology_fno_option_name[rankology_local_business_address_region]"
            placeholder="<?php echo esc_html__('e.g. Nouvelle Aquitaine', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('State', 'wp-rankology'); ?>"
            value="<?php echo esc_html($value); ?>" />

        <p class="description"><?php esc_html_e('<span class="field-required">Required</span> property by Google.', 'wp-rankology'); ?></p>
        <?php
    }
}
