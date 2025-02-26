<?php

namespace RankologyFno\Services\Admin\Settings\LocalBusiness\Fields;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

trait FieldCuisine
{
    /**
     * 
     *
     * @return void
     */
    public function renderFieldCuisine()
    {
        $value = rankology_fno_get_service('OptionPro')->getLocalBusinessCuisine(); ?>
<input type="text" name="rankology_fno_option_name[rankology_local_business_cuisine]"
    placeholder="<?php esc_html_e('e.g. French, Italian, Indian, American', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Cuisine served', 'wp-rankology'); ?>"
    value="<?php echo esc_html($value); ?>" />
<p class="description">
    <?php esc_html_e('Only to be filled if the business type is: "FoodEstablishment", "Bakery", "BarOrPub", "Brewery", "CafeOrCoffeeShop", "FastFoodRestaurant", "IceCreamShop", "Restaurant" or "Winery".', 'wp-rankology'); ?>
</p>

<p class="description"><?php esc_html_e('<span class="field-recommended">Recommended</span> property by Google.', 'wp-rankology'); ?>
</p>

<?php
    }
}
