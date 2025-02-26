<?php

namespace RankologyFno\Services\Admin\Settings\LocalBusiness\Fields;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

trait FieldAddressCountry {
    /**
     * 
     *
     * @return void
     */
    public function renderFieldAddressCountry() {
        $value = rankology_fno_get_service('OptionPro')->getLocalBusinessAddressCountry(); ?>
        <input
            type="text"
            name="rankology_fno_option_name[rankology_local_business_address_country]"
            placeholder="<?php echo esc_html__('e.g. France', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Country', 'wp-rankology'); ?>"
            value="<?php echo esc_html($value); ?>" />

        <p class="description"><?php esc_html_e('<span class="field-required">Required</span> property by Google.', 'wp-rankology'); ?></p>
        <?php
    }
}
