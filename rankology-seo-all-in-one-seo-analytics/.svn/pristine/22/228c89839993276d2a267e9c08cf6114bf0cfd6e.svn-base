<?php

namespace RankologyFno\Services\Admin\Settings\LocalBusiness\Fields;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

trait FieldStreetAddress {
    /**
     * 
     *
     * @return void
     */
    public function renderFieldStreetAddress() {
        $check = rankology_fno_get_service('OptionPro')->getLocalBusinessStreetAddress(); ?>
        <input
            type="text"
            name="rankology_fno_option_name[rankology_local_business_street_address]"
            placeholder="<?php echo esc_html__('e.g. Place Bellevue', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Street Address', 'wp-rankology'); ?>"
            value="<?php echo esc_html($check); ?>" />

            <p class="description"><?php esc_html_e('<span class="field-required">Required</span> property by Google.', 'wp-rankology'); ?></p>
        <?php
    }
}
