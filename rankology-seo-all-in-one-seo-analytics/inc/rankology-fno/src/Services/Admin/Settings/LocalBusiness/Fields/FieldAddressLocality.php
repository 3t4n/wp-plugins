<?php

namespace RankologyFno\Services\Admin\Settings\LocalBusiness\Fields;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

trait FieldAddressLocality {
    /**
     * 
     *
     * @return void
     */
    public function renderFieldAddressLocality() {
        $value = rankology_fno_get_service('OptionPro')->getLocalBusinessAddressLocality(); ?>
        <input
            type="text"
            name="rankology_fno_option_name[rankology_local_business_address_locality]"
            placeholder="<?php echo esc_html__('e.g. Biarritz', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('City', 'wp-rankology'); ?>"
            value="<?php echo esc_html($value); ?>" />

        <p class="description"><?php esc_html_e('<span class="field-required">Required</span> property by Google.', 'wp-rankology'); ?></p>
        <?php
    }
}
