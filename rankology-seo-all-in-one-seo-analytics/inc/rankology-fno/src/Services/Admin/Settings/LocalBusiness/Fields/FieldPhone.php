<?php

namespace RankologyFno\Services\Admin\Settings\LocalBusiness\Fields;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

trait FieldPhone {
    /**
     * 
     *
     * @return void
     */
    public function renderFieldPhone() {
        $value = rankology_fno_get_service('OptionPro')->getLocalBusinessPhone(); ?>
        <input
            type="text"
            name="rankology_fno_option_name[rankology_local_business_phone]"
            placeholder="<?php echo esc_html__('e.g. +44501020304', 'wp-rankology'); ?>"
            aria-label="<?php echo __('Telephone', 'wp-rankology'); ?>"
            value="<?php echo esc_html($value); ?>"
        />

        <p class="description"><?php esc_html_e('<span class="field-recommended">Recommended</span> property by Google.', 'wp-rankology'); ?></p>

        <?php
    }
}
