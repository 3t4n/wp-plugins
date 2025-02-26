<?php

namespace RankologyFno\Services\Admin\Settings\LocalBusiness\Fields;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

trait FieldPriceRange {
    /**
     * 
     *
     * @return void
     */
    public function renderFieldPriceRange() {
        $value = rankology_fno_get_service('OptionPro')->getLocalBusinessPriceRange(); ?>
        <input
            type="text"
            autocomplete="off" name="rankology_fno_option_name[rankology_local_business_price_range]"
            placeholder="<?php echo esc_html__('e.g. $$, €€€, or ££££...', 'wp-rankology'); ?>"
            aria-label="<?php echo __('Price range', 'wp-rankology'); ?>"
            value="<?php echo esc_html($value); ?>"
        />

        <p class="description"><?php esc_html_e('<span class="field-recommended">Recommended</span> property by Google.', 'wp-rankology'); ?></p>

        <?php
    }
}
