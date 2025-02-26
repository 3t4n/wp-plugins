<?php

namespace Rankology_Stats\Detailed_Data\Services\Model;

use Rankology_Stats\Detailed_Data\Helper;
use RANKOLOGY_STATS\DB;
class HourlyUsageModel
{
    public static function get($args = array())
    {
        $data = self::getHourlyUsageQuery();
        $labels = [];
        $hits = [];
        $pages = [];
        foreach ($data as $hour => $row) {
            $labels[] = $hour >= 12 ? ($hour == 12 ? 12 : $hour - 12) . 'pm' : ($hour == 0 ? 12 : $hour) . 'am';
            $hits[] = $row['hits'];
            $pages[] = $row['pages'];
        }
        echo Helper::loadTemplate('meta-box-hourly-usage.php', \compact('labels', 'hits', 'pages'));
    }
    public static function getHourlyUsageQuery($timestamp = null)
    {
        global $wpdb;
        // get hourly usage data
        $query = $wpdb->get_results("SELECT HOUR(date) as hour, COUNT(visitor_id) as hits, COUNT(DISTINCT page_id) as pages FROM " . DB::table('visitor_relationships') . " WHERE date LIKE '" . \date('Y-m-d') . "%' GROUP BY hour");
        // create an array with 24 elements and fill it with 0
        $visitors = \array_fill(0, 24, ['hits' => 0, 'pages' => 0]);
        // fill the array with the query results
        foreach ($query as $row) {
            $visitors[$row->hour] = ['hits' => (int) $row->hits, 'pages' => (int) $row->pages];
        }
        // return the array
        return $visitors;
    }
}
