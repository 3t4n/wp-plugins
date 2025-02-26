<?php

namespace Rankology_Stats\Detailed_Data\Services\Widgets\Widget;

use RANKOLOGY_STATS\Admin_Template;
use RANKOLOGY_STATS\Country;
use Rankology_Stats\Detailed_Data\Helper;
use Rankology_Stats\Detailed_Data\Services\Abstracts\AbstractWidget;
use RANKOLOGY_STATS\DB;
use RANKOLOGY_STATS\Menus;
use RANKOLOGY_STATS\Referred;
use RANKOLOGY_STATS\TimeZone;
use RANKOLOGY_STATS\Visitor;
class TopCountriesWidget extends AbstractWidget
{
    public function register()
    {
        add_filter('rankology_stats_pages_chart_countries', [$this, 'registerTopCountriesMetaBox'], 10, 2);
    }
    public function registerTopCountriesMetaBox($content, $args)
    {
        global $wpdb;
        $postID = isset($args['custom_get']['ID']) ? $args['custom_get']['ID'] : \false;
        $postType = isset($args['custom_get']['type']) ? $args['custom_get']['type'] : \false;
        $pageID = isset($args['custom_get']['page_id']) ? $args['custom_get']['page_id'] : \false;
        $dateRange = $args['DateRang'];
        $fromDate = TimeZone::getCurrentDate('Y-m-d', '-0', \strtotime($dateRange['from']));
        $toDate = TimeZone::getCurrentDate('Y-m-d', '-0', \strtotime($dateRange['to']));
        $visitorTable = DB::table('visitor');
        $ISOCountryCode = Country::getList();
        $sql = $this->_buildQuery(['post_id' => $postID, 'page_id' => $pageID, 'post_type' => $postType, 'from_date' => $fromDate, 'to_date' => $toDate, 'sql_select' => "SELECT `" . $visitorTable . "`.`location` AS location, COUNT(`" . $visitorTable . "`.`location`) AS `count`", 'sql_group' => "GROUP BY `" . $visitorTable . "`.`location`", 'sql_order' => "ORDER BY `count` DESC", 'sql_limit' => "LIMIT 10"]);
        $result = $wpdb->get_results($sql);
        $list = [];
        foreach ($result as $item) {
            $item->location = \strtoupper($item->location);
            $list[] = array('location' => $item->location, 'name' => $ISOCountryCode[$item->location], 'flag' => Country::flag($item->location), 'link' => Menus::admin_url('visitors', array('location' => $item->location)), 'number' => $item->count);
        }
        return Helper::loadTemplate('pages-chart-top-countries.php', ['countries' => $list, 'pagination' => \false]);
    }
}
