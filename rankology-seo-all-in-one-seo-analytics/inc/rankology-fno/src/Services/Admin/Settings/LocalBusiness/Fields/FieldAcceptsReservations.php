<?php

namespace RankologyFno\Services\Admin\Settings\LocalBusiness\Fields;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

trait FieldAcceptsReservations {
    /**
     *
     * @return void
     */
    public function renderFieldAcceptsReservations() {
        $value = rankology_fno_get_service('OptionPro')->getLocalBusinessAcceptsReservations(); ?>
<input type="text" name="rankology_fno_option_name[rankology_local_business_accepts_reservations]"
    placeholder="<?php echo esc_html__('e.g. True', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Accepts reservations ', 'wp-rankology'); ?>"
    value="<?php echo esc_html($value); ?>" />
<p class="description">
    <?php esc_html_e('Indicates whether a FoodEstablishment accepts reservations. Values can be Boolean (True or False), an URL at which reservations can be made or (for backwards compatibility) the strings Yes or No.', 'wp-rankology'); ?>
</p>


<p class="description"><?php esc_html_e('<span class="field-recommended">Recommended</span> property by Google.', 'wp-rankology'); ?>
</p>

<?php
    }
}
