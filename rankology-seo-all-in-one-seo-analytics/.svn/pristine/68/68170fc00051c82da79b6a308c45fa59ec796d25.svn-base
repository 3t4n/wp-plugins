<?php

namespace Rankology_Stats\Detailed_Data\Services\Widgets\Widget;

use Rankology_Stats\Detailed_Data\Helper;
use Rankology_Stats\Detailed_Data\Services\Abstracts\AbstractWidget;
use RANKOLOGY_STATS\DB;
use RANKOLOGY_STATS\TimeZone;
use RANKOLOGY_STATS\UserAgent;
class TopPlatformsWidget extends AbstractWidget
{
    public function register()
    {
        add_filter('rankology_stats_pages_chart_platforms', [$this, 'registerTopPlatformsMetaBox'], 10, 2);
    }
    public function registerTopPlatformsMetaBox($content, $args)
    {
        global $wpdb;
        $postID = isset($args['custom_get']['ID']) ? $args['custom_get']['ID'] : \false;
        $postType = isset($args['custom_get']['type']) ? $args['custom_get']['type'] : \false;
        $pageID = isset($args['custom_get']['page_id']) ? $args['custom_get']['page_id'] : \false;
        $dateRange = $args['DateRang'];
        $fromDate = TimeZone::getCurrentDate('Y-m-d', '-0', \strtotime($dateRange['from']));
        $toDate = TimeZone::getCurrentDate('Y-m-d', '-0', \strtotime($dateRange['to']));
        $visitorTable = DB::table('visitor');
        $sql = $this->_buildQuery(['post_id' => $postID, 'page_id' => $pageID, 'post_type' => $postType, 'from_date' => $fromDate, 'to_date' => $toDate, 'sql_select' => "SELECT DISTINCT `" . $visitorTable . "`.`platform`, COUNT(DISTINCT `" . $visitorTable . "`.`ID`, `" . $visitorTable . "`.`agent`) as count", 'sql_group' => "GROUP BY `" . $visitorTable . "`.`platform`", 'sql_order' => "ORDER BY count DESC"]);
        $list = $wpdb->get_results($sql, ARRAY_A);
        // Sort By Count
        \RANKOLOGY_STATS\Helper::SortByKeyValue($list, 'count');
        // Get Last 10 Version that Max number
        $platforms = \array_slice($list, 0, 10);
        $platforms_name = $platforms_value = [];
        $total = 0;
        // Push to array
        foreach ($platforms as $platform) {
            if (\trim($platform['platform']) != "") {
                // Sanitize Version name
                $platforms_name[] = sanitize_text_field($platform['platform']);
                // Get List Count
                $platforms_value[] = (int) $platform['count'];
                // Add to Total
                $total += $platform['count'];
            }
        }
        return Helper::loadTemplate('pages-chart-top-platforms.php', ['platforms_name' => $platforms_name, 'platforms_value' => $platforms_value, 'total' => $total]);
    }
}
