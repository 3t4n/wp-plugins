<?php

namespace Rankology_Stats\Detailed_Data\Services\Widgets;

use RANKOLOGY_STATS\Helper;
class TaxonomyManager
{
    public function __construct()
    {
        add_filter('rankology_stats_default_taxonomies', [$this, 'rknsUnlockCustomTaxonomies'], 10);
        add_filter('rankology_stats_pages_where_type_query', [$this, 'rknsAddTaxonomiesTerms'], 10, 3);
    }
    public function rknsUnlockCustomTaxonomies($defaultTaxonomies)
    {
        return \array_keys(Helper::get_list_taxonomy());
    }
    public function rknsAddTaxonomiesTerms($query, $id, $type)
    {
        $taxonomies = \array_keys(Helper::get_list_taxonomy());
        if (\in_array($type, $taxonomies) && !\in_array($type, ['category', 'post_tag'])) {
            if ($id == -1) {
                $terms = get_terms(['taxonomy' => $type, 'hide_empty' => \false, 'fields' => 'ids']);
                $query = "`type`='tax'  AND `id` IN (" . (\count($terms) ? \implode(',', $terms) : '0') . ")";
            } else {
                $query = "`type`='tax' AND `id` = " . $id;
            }
        }
        return $query;
    }
}
