<?php

namespace RankologyFno\Services\Admin\Settings\LocalBusiness\Fields;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

trait FieldPostalCode {
    /**
     * 
     *
     * @return void
     */
    public function renderFieldPostalCode() {
        $value = rankology_fno_get_service('OptionPro')->getLocalBusinessPostalCode(); ?>
        <input
            type="text"
            name="rankology_fno_option_name[rankology_local_business_postal_code]"
            placeholder="<?php echo esc_html__('e.g. 64200', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Postal code', 'wp-rankology'); ?>"
            value="<?php echo esc_html($value); ?>" />

        <p class="description"><?php esc_html_e('<span class="field-required">Required</span> property by Google.', 'wp-rankology'); ?></p>

        <?php
    }
}
