<?php
namespace DaReactions;
/**
 *
 */
class Request
{
    /**
     * @return array|false|null
     */
    public static function getRequestData()
    {
        $filters = filter_input_array(
            INPUT_GET, array(
                'paged' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'orderby' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'order' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'page' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'date-range' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'da-reactions-nocache' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'filter-type' => array(
                    'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                    'flags' => FILTER_REQUIRE_ARRAY
                ),
                'filter-id' => array(
                    'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                    'flags' => FILTER_REQUIRE_ARRAY
                )
            )
        );
        if (darea_fs()->is_premium()) {
            if (empty($filters['filter-type'])) {
                $filters['filter-type'] = array();
            }
            if (empty($filters['filter-id'])) {
                $filters['filter-id'] = array();
            }
        } else {
            if (!empty($filters['filter-type'])) {
                $filters['filter-type'] = array(end($filters['filter-type']));
            } else {
                $filters['filter-type'] = array();
            }
            if (!empty($filters['filter-id'])) {
                $filters['filter-id'] = array(end($filters['filter-id']));
            } else {
                $filters['filter-id'] = array();
            }
        }
        return $filters;
    }
}
