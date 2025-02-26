<?php

namespace RankologyFno\Services\Admin\Settings\LocalBusiness\Fields;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

trait FieldType {
    /**
     * 
     *
     * @return void
     */
    public function renderFieldType() {
        $selected = rankology_fno_get_service('OptionPro')->getLocalBusinessType(); ?>

        <select id="rankology_local_business_type" name="rankology_fno_option_name[rankology_local_business_type]">
            <?php foreach (rankology_lb_types_list() as $type_value => $type_i18n) { ?>
                <option <?php selected($type_value, $selected); ?> value="<?php echo $type_value; ?>">
                    <?php esc_html_e($type_i18n, 'wp-rankology'); ?>
                </option>
            <?php } ?>
        </select>
        <?php
    }
}
