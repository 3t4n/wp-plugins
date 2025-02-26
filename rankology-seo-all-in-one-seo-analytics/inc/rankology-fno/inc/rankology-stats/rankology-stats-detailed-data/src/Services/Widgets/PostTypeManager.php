<?php

namespace Rankology_Stats\Detailed_Data\Services\Widgets;

use RANKOLOGY_STATS\DB;
use RANKOLOGY_STATS\Helper;
class PostTypeManager
{
    public function __construct()
    {
        add_filter('rankology_stats_default_post_types', [$this, 'rknsUnlockCustomPostTypes'], 10);
        add_filter('rankology_stats_pages_page_sub_list_select', '__return_true', 10, 1);
        add_filter('rankology_stats_pages_where_type_query', [$this, 'rknsAddSubListFeatureToPagesChartWidget'], 10, 3);
    }
    public function rknsUnlockCustomPostTypes($postTypes)
    {
        return \array_map(function ($postType) {
            return \in_array($postType, ['post', 'page', 'product']) ? $postType : 'post_type_' . $postType;
        }, Helper::get_list_post_type());
    }
    public function rknsAddSubListFeatureToPagesChartWidget($query, $id, $type)
    {
        global $wpdb;
        $pageType = !empty($_GET['type']) ? sanitize_text_field($_GET['type']) : \false;
        $pageID = !empty($_GET['page_id']) ? sanitize_text_field($_GET['page_id']) : \false;
        if (!empty($id) && ($pageType && $pageID) && $type == $pageType) {
            $pagesTable = DB::table('pages');
            $pageUri = $wpdb->get_var($wpdb->prepare("SELECT `uri` FROM `" . $pagesTable . "` WHERE `page_id` = %d", $pageID));
            return $wpdb->prepare("`uri` = '%s'", $pageUri);
        }
        return $query;
    }
}
