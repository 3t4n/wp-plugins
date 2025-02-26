<?php

namespace RankologyFno\Services\Admin\Settings\LocalBusiness\Fields;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

trait FieldMenu {
    /**
     *
     * @return void
     */
    public function renderFieldMenu() {
        $value = rankology_fno_get_service('OptionPro')->getLocalBusinessMenu(); ?>
<input type="text" name="rankology_fno_option_name[rankology_local_business_menu]"
    placeholder="<?php printf(esc_html__('e.g. %s', 'wp-rankology'), get_home_url()); ?>"
    aria-label="<?php esc_html_e('The URL of the menu.', 'wp-rankology'); ?>"
    value="<?php echo esc_html($value); ?>" />

<p class="description"><?php esc_html_e('<span class="field-recommended">Recommended</span> property by Google.', 'wp-rankology'); ?>
</p>

<?php
    }
}
