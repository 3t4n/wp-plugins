<?php

namespace FlamixLocal\Exchange\Woo\Traits\ExternalID;

trait Products
{
    public static function saveExternalID(int $id, string $value): bool
    {
        $product = wc_get_product($id);
        $product->update_meta_data('EXTERNAL_ID', sanitize_text_field($value));
        return $product->save();
    }

    public static function getExternalID(int $id)
    {
        return wc_get_product($id)->get_meta('EXTERNAL_ID');
    }

    public static function getOrGenerateIfNotExist(int $id): string
    {
        $flamix_external_id = self::getExternalID($id);
        if (!empty($flamix_external_id))
            return $flamix_external_id;

        $generate = 'flamix-' . md5('flamix_product_' . rand(0, 10000) . '_' . $id);
        self::saveExternalID($id, $generate);
        return $generate;
    }

    public static function editExternalID(): bool
    {
        // Show in main product
        add_action('woocommerce_product_options_general_product_data', function () {
            global $post;
            static::show_external_id_input($post->ID);
        });

        // Show in variables
        add_action('woocommerce_product_after_variable_attributes', function ($loop_index, $variation_data, $variation) {
            static::show_external_id_input($variation->ID);
        }, 10, 3);

        // Save
        add_action('woocommerce_admin_process_product_object', function ($product) {
            if (isset($_POST['EXTERNAL_ID']))
                $product->update_meta_data('EXTERNAL_ID', sanitize_text_field($_POST['EXTERNAL_ID']));
        });

        return true;
    }

    /**
     * Show input with EXTERNAL_ID.
     *
     * @return void
     */
    public static function show_external_id_input(int $product_id)
    {
        woocommerce_wp_text_input([
            'id' => 'EXTERNAL_ID',
            'value' => wc_get_product($product_id)->get_meta('EXTERNAL_ID'),
            'label' => 'EXTERNAL_ID',
            'description' => 'Fields was created for Flamix Product Sync!'
        ]);
    }

    /**
     * We can find product by 100% available attribute
     *
     * @param string $key ID|SKU|EXTERNAL_ID (default)
     * @param $value
     * @return int
     */
    public static function getProductBy(string $key, $value): int
    {
        switch (strtoupper($key)) {
            case 'ID':
                return (int)$value;

            case 'SKU':
                return (int)wc_get_product_id_by_sku($value);

            case 'EXTERNAL_ID':
            default:
                return self::getProductByExternalID($value);
        }
    }

    /**
     * Find first product by EXTERNAL_ID attribute
     *
     * Use SQL for optimization
     *
     * @param $external_id
     * @return int
     */
    public static function getProductByExternalID($external_id): int
    {
        global $wpdb;
        return (int)$wpdb->get_var(
            $wpdb->prepare(
                "SELECT posts.ID
                        FROM {$wpdb->posts} as posts
                        INNER JOIN {$wpdb->postmeta} AS postmeta ON posts.ID = postmeta.post_id
                        WHERE
                              posts.post_type IN ('product', 'product_variation')
                              AND posts.post_status != 'trash'
                              AND postmeta.meta_key = %s
                              AND postmeta.meta_value = %s
                        LIMIT 1",
                'EXTERNAL_ID',
                $external_id
            )
        );
    }
}