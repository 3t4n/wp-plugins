<?php

namespace RankologyFno\Services\Admin\Settings\LocalBusiness\Fields;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

trait FieldUrl
{
    /**
     * 
     *
     * @return void
     */
    public function renderFieldUrl()
    {
        $value = rankology_fno_get_service('OptionPro')->getLocalBusinessUrl(); ?>
<input type="text" name="rankology_fno_option_name[rankology_local_business_url]"
    placeholder="<?php printf(esc_html__('default: %s', 'wp-rankology'), get_home_url()); ?>"
    aria-label="<?php esc_html_e('URL', 'wp-rankology'); ?>"
    value="<?php esc_html_e($value); ?>" />
<p class="description">
    <?php esc_html_e('Default: homepage. Google recommends to include your business details (address, phone, website...) for your visitors too.', 'wp-rankology'); ?>
</p>

<p class="description"><?php esc_html_e('<span class="field-recommended">Recommended</span> property by Google.', 'wp-rankology'); ?>
</p>

<?php
    }
}
