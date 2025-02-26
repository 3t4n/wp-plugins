<?php

namespace FlamixLocal\Exchange\Woo;

use Flamix\CommerceML\Contracts\CanWorkWithExternalID;
use Flamix\CommerceML\Contracts\ExportImport;
use FlamixLocal\Exchange\Woo\Traits\ExternalID\Categories as ExternalID;

class Categories implements ExportImport, CanWorkWithExternalID
{
    use ExternalID;

    /**
     * @param int $page - Its actually PARENT to recurrent
     * @param array $params
     * @return array
     */
    public static function get(int $page = 0, array $params = []): array
    {
        $params = array_merge([
            'taxonomy' => 'product_cat',
            'orderby' => 'id',
            'show_count' => false,
            'pad_counts' => false,
            'hierarchical' => true,
            'title_li' => '',
            'hide_empty' => false,
            'parent' => $page,
        ], $params);

        $categories = get_categories($params);
        if (empty($categories))
            return [];

        $tmp = [];
        foreach ($categories as $category) {
            $tmp[$category->term_id] = [
                'id' => self::getOrGenerateIfNotExist($category->term_id),
                'name' => $category->name,
                'description' => $category->description,
                'categories' => self::get($category->term_id),
            ];
        }

        return $tmp;
    }

    public static function set(int $entity_id, array $data = []): bool
    {
        return true;
    }
}