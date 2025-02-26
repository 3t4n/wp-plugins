<?php

namespace Rankology_Stats\Detailed_Data\Services\Widgets\Widget;

use RANKOLOGY_STATS\Admin_Template;
use Rankology_Stats\Detailed_Data\Helper;
use Rankology_Stats\Detailed_Data\Services\Abstracts\AbstractWidget;
use RANKOLOGY_STATS\DB;
use RANKOLOGY_STATS\TimeZone;
use RANKOLOGY_STATS\Visitor;
class LatestVisitorsWidget extends AbstractWidget
{
    public function register()
    {
        add_filter('rankology_stats_pages_chart_visitors', [$this, 'registerLatestVisitorsMetaBox'], 10, 2);
    }
    public function registerLatestVisitorsMetaBox($content, $args)
    {
        $postID = isset($args['custom_get']['ID']) ? $args['custom_get']['ID'] : \false;
        $postType = isset($args['custom_get']['type']) ? $args['custom_get']['type'] : \false;
        $pageID = isset($args['custom_get']['page_id']) ? $args['custom_get']['page_id'] : \false;
        $dateRange = $args['DateRang'];
        $fromDate = TimeZone::getCurrentDate('Y-m-d', '-0', \strtotime($dateRange['from']));
        $toDate = TimeZone::getCurrentDate('Y-m-d', '-0', \strtotime($dateRange['to']));
        $sql = $this->_buildQuery(['post_id' => $postID, 'page_id' => $pageID, 'post_type' => $postType, 'from_date' => $fromDate, 'to_date' => $toDate, 'sql_order' => 'ORDER BY `' . DB::table('visitor') . '`.`ID` DESC']);
        $visitors = Visitor::get(['sql' => $sql, 'per_page' => 10]);
        return Helper::loadTemplate('pages-chart-visitors.php', ['visitors' => $visitors, 'attributes' => ['showLoggedUsers' => \true]]);
    }
}
