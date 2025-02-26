<?php

namespace Rankology_Stats\Detailed_Data\Services\Widgets\Widget;

use Rankology_Stats\Detailed_Data\Helper;
use Rankology_Stats\Detailed_Data\Services\Abstracts\AbstractWidget;
use RANKOLOGY_STATS\DB;
use RANKOLOGY_STATS\TimeZone;
use RANKOLOGY_STATS\UserOnline;
class OnlineUsersWidget extends AbstractWidget
{
    public function register()
    {
        add_filter('rankology_stats_pages_chart_useronline', [$this, 'registerOnlineUsersMetaBox'], 10, 2);
    }
    public function registerOnlineUsersMetaBox($content, $args)
    {
        global $wpdb;
        $postID = isset($args['custom_get']['ID']) ? $args['custom_get']['ID'] : \false;
        $postType = isset($args['custom_get']['type']) ? $args['custom_get']['type'] : \false;
        $pageID = isset($args['custom_get']['page_id']) ? $args['custom_get']['page_id'] : \false;
        $dateRange = $args['DateRang'];
        $fromDate = TimeZone::getCurrentDate('Y-m-d', '-0', \strtotime($dateRange['from']));
        $toDate = TimeZone::getCurrentDate('Y-m-d', '-0', \strtotime($dateRange['to']));
        $list = UserOnline::get(['sql' => "SELECT * FROM `" . DB::table('useronline') . "` WHERE page_id='" . $postID . "' AND type='" . $postType . "' ORDER BY ID DESC", 'per_page' => 10]);
        return Helper::loadTemplate('pages-chart-online-users.php', ['onlines' => $list, 'pagination' => \false]);
    }
}
