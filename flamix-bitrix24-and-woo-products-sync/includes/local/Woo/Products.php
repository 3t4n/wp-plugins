<?php

namespace FlamixLocal\Exchange\Woo;

use Flamix\CommerceML\Contracts\ExportImport;
use Flamix\CommerceML\Contracts\CanWorkWithExternalID;
use FlamixLocal\Exchange\Settings\Setting;
use FlamixLocal\Exchange\Woo\Traits\ExternalID\Products as ExternalID;
use WC_Product;

class Products implements ExportImport, CanWorkWithExternalID
{
    use ExternalID;

    public static function get(int $page, array $params = []): array
    {
        $tmp = [];
        $products = static::getProductsWithVariables($page, $params);

        foreach ($products as $product) {
            $product_id = $product->get_id();

            // Variables has peculiarity
            if (!$product->get_parent_id()) {
                $categories = $product->get_category_ids();
            } else {
                $parent_product = wc_get_product($product->get_parent_id()); // Will take some info prom Parent Product
                $categories = $parent_product->get_category_ids();
            }

            $tmp[$product_id]['id'] = static::getXmlId($product); // TODO: Add special format in future: "parent#child"
            $tmp[$product_id]['name'] = preg_replace('/\s?\(#\d+\)/', '', strip_tags($product->get_formatted_name())); // Correct work with variables
            $tmp[$product_id]['description'] = $product->get_description();
            $tmp[$product_id]['image'] = static::getImage($product);
            $tmp[$product_id]['property_value'] = static::get_attribute($product);
            $tmp[$product_id]['sku'] = $product->get_sku();
            $tmp[$product_id]['weight'] = $product->get_weight();
            $tmp[$product_id]['length'] = $product->get_length();
            $tmp[$product_id]['width'] = $product->get_width();
            $tmp[$product_id]['height'] = $product->get_height();

            foreach ($categories as $category_id) {
                $tmp[$product_id]['categories'][] = [
                    'code' => 'id',
                    'value' => Categories::getOrGenerateIfNotExist($category_id),
                ];
            }

            $price = self::price($product);
            if ($price > 0) {
                $tmp[$product_id]['prices']['BASE'] = [
                    'code' => 'price',
                    'priceId' => 'BASE',
                    'currency' => get_woocommerce_currency(),
                    'priceItem' => $price,
                ];
            }

            $price_sale = self::price($product, 'sale');
            if ($price_sale > 0 && $price_sale !== $price) {
                $tmp[$product_id]['prices']['SALE'] = [
                    'code' => 'price',
                    'priceId' => 'SALE',
                    'currency' => get_woocommerce_currency(),
                    'priceItem' => $price_sale,
                ];
            }
        }

        // TODO: Make WORDPRESS filter for changing info (ex, currency)
        return $tmp;
    }

    public static function set(int $entity_id, array $data = []): bool
    {
        $product = wc_get_product($entity_id);

        if (isset($data['quantity'])) {
            $product->set_manage_stock(true);
            $product->set_stock_quantity((float)$data['quantity']);
        }

        if (isset($data['price']))
            $product->set_regular_price($data['price']);

        if (isset($data['price_sale']))
            $product->set_sale_price($data['price_sale']);

        return (bool)$product->save();
    }

    /**
     * Return ALL product count
     *
     * @return int
     */
    public static function productCount(): int
    {
        return count(wc_get_products(['posts_per_page' => -1]));
    }

    /**
     * Return ID
     *
     * @param WC_Product $product
     * @return string|int
     */
    private static function getXmlId(WC_Product $product)
    {
        switch (Setting::getOption('product_find_by')) {
            case 'SKU':
                return $product->sku ?? '';
                break;

            case 'ID':
                return $product->get_id();
                break;

            // EXTERNAL_ID in others cases
            default:
                return self::getOrGenerateIfNotExist($product->get_id());
                break;
        }
    }

    /**
     * Get one thumbnail
     *
     * @param WC_Product $product
     * @return string
     */
    private static function getImage(WC_Product $product): string
    {
        return wp_get_attachment_image_url($product->get_image_id(), 'full');
    }

    /**
     * Get product price.
     *
     * @param $product
     * @param string $type regular or sale
     * @return float
     */
    private static function price($product, string $type = 'regular'): float
    {
        if ($product->is_type('variable')) {
            return (float)$product->get_variation_regular_price('min', true);
        }

        if ($type === 'regular') {
            return (float)$product->get_regular_price();
        }

        if ($type === 'sale') {
            return (float)$product->get_sale_price();
        }

        return 0;
    }

    /**
     * Take and modify from wc_display_product_attributes
     *
     * @param WC_Product $product
     * @return array
     */
    public static function get_attribute(WC_Product $product): array
    {
        $attributes = $product->get_attributes();
        $values = [];

        foreach ($attributes as $code => $attribute) {
            // For variables
            if (is_string($attribute)) {
                $values[$code][] = $attribute;
                continue;
            }

            $code = $attribute->get_name();

            if ($attribute->is_taxonomy()) {
                $attribute_taxonomy = $attribute->get_taxonomy_object();
                $attribute_values = wc_get_product_terms($product->get_id(), $attribute->get_name(), ['fields' => 'all']);

                foreach ($attribute_values as $attribute_value) {
                    $value_name = esc_html($attribute_value->name);

                    if ($attribute_taxonomy->attribute_public) {
                        $values[$code][] = $attribute->get_name();
                    } else {
                        $values[$code][] = $value_name;
                    }
                }
            } else {
                $options = $attribute->get_options();

                foreach ($options as $option) {
                    $values[$code][] = esc_html($option);
                }
            }
        }

        return $values;
    }

    /**
     * Get products and variables as independent product.
     *
     * @param int $page
     * @param array $params
     * @return array
     */
    private static function getProductsWithVariables(int $page, array $params = []): array
    {
        $tmp = array_merge([
            'orderby' => 'id',
            'page' => $page,
            'posts_per_page' => commerceml_config('items_per_page', 30),
        ], $params);

        $products = wc_get_products($tmp);
        foreach ($products as $product) {
            if ($product->is_type('variable')) {
                $variables = $product->get_children();
                foreach ($variables as $variable_id) {
                    $products[] = wc_get_product($variable_id);
                }
            }
        }

        return $products;
    }
}