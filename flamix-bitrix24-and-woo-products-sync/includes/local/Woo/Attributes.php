<?php

namespace FlamixLocal\Exchange\Woo;

use Flamix\CommerceML\Contracts\ExportImport;

class Attributes implements ExportImport
{
    public static function get(int $page = 0, array $params = []): array
    {
        $attributes = [];
        $products = wc_get_products(['posts_per_page' => -1]);
        foreach ($products as $product) {
            $tmp = Products::get_attribute($product);
            $attributes = array_merge_recursive($attributes, $tmp);
        }

        if (empty($attributes)) return [];

        foreach ($attributes as $key => &$attribute) {
            $options = $attribute;
            if (is_array($options)) {
                foreach ($options as &$option) {
                    $option = [
                        'code' => 'xml_value',
                        'value' => $option,
                    ];
                }
            } else {
                $options = [
                    'code' => 'xml_value',
                    'value' => $options,
                ];
            }

            $attribute = [
                'id' => $key,
                'name' => $key,
                'multi' => 'true',
                'variant_values' => $options,
            ];
        }

        return $attributes;
    }

    public static function set(int $entity_id, array $data = []): bool
    {
        return true;
    }
}