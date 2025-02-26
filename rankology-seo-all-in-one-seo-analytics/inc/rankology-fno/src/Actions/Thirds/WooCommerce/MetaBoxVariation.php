<?php

namespace RankologyFno\Actions\Thirds\WooCommerce;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

use Rankology\Core\Hooks\ExecuteHooks;

class MetaBoxVariation implements ExecuteHooks {
    public function hooks() {
        add_action('woocommerce_product_after_variable_attributes', [$this, 'variationSettingsFields'], 10, 3);
        add_action('woocommerce_save_product_variation', [$this, 'saveVariationSettingsFields'], 10, 2);
        add_filter('woocommerce_available_variation', [$this, 'loadVariationSettingsFields']);
    }

    /**
     * 
     *
     * @param array $variation
     *
     * @return array
     */
    public function loadVariationSettingsFields($variation) {
        $variation['rankology_global_ids'] = get_post_meta($variation['variation_id'], 'rankology_global_ids', true);
        $variation['rankology_barcode'] = get_post_meta($variation['variation_id'], 'rankology_barcode', true);

        return $variation;
    }

    /**
     * 
     *
     * @param int    $variation_id
     * @param string $loop
     *
     * @return void
     */
    public function saveVariationSettingsFields($variation_id, $loop) {
        $globalIds = $_POST['rankology_global_ids'][$loop];

        if ( ! empty($globalIds)) {
            update_post_meta($variation_id, 'rankology_global_ids', esc_attr($globalIds));
        } else {
            delete_post_meta($variation_id, 'rankology_global_ids');
        }

        $barCode = $_POST['rankology_barcode'][$loop];

        if ( ! empty($barCode)) {
            update_post_meta($variation_id, 'rankology_barcode', esc_attr($barCode));
        } else {
            delete_post_meta($variation_id, 'rankology_barcode');
        }
    }

    /**
     * 
     *
     * @param string $loop
     * @param array  $variation_data
     * @param object $variation
     *
     * @return void
     */
    public function variationSettingsFields($loop, $variation_data, $variation) {
        woocommerce_wp_select(
            [
                'id' => "rankology_global_ids{$loop}",
                'name' => "rankology_global_ids[{$loop}]",
                'value' => get_post_meta($variation->ID, 'rankology_global_ids', true),
                'label' => __('Product Global Identifiers type', 'wp-rankology'),
                'desc_tip' => false,
                'description' => '',
                'options' => [
                    'none' => __('None', 'wp-rankology'),
                    'gtin8' => __('gtin8 (ean8)', 'wp-rankology'),
                    'gtin12' => __('gtin12 (ean12)', 'wp-rankology'),
                    'gtin13' => __('gtin13 (ean13)', 'wp-rankology'),
                    'gtin14' => __('gtin14 (ean14)', 'wp-rankology'),
                    'mpn' => __('mpn', 'wp-rankology'),
                    'isbn' => __('isbn', 'wp-rankology'),
                ],
                'wrapper_class' => 'form-row form-row-full',
            ]
        );

        woocommerce_wp_text_input(
            [
                'id' => "rankology_barcode{$loop}",
                'name' => "rankology_barcode[{$loop}]",
                'value' => get_post_meta($variation->ID, 'rankology_barcode', true),
                'label' => __('Product Global Identifiers', 'wp-rankology'),
                'desc_tip' => false,
                'description' => '',
                'wrapper_class' => 'form-row form-row-full',
            ]
        );
    }
}
