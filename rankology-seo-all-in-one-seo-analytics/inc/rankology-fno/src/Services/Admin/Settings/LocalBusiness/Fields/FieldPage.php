<?php

namespace RankologyFno\Services\Admin\Settings\LocalBusiness\Fields;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

trait FieldPage
{
    /**
     * 
     *
     * @return void
     */
    public function renderFieldPage()
    {
        $value = rankology_fno_get_service('OptionPro')->getLocalBusinessPage(); ?>
<input type="text" name="rankology_fno_option_name[rankology_local_business_page]"
    placeholder="<?php esc_html_e('Enter your post, page or post type ID, e.g. 64', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Post ID', 'wp-rankology'); ?>"
    value="<?php echo esc_html($value); ?>" />
<p class="description">
    <?php esc_html_e('Default: homepage. Google recommends to include your business details (address, phone, website...) for your visitors too.', 'wp-rankology'); ?>
</p>
<?php
    }
}
