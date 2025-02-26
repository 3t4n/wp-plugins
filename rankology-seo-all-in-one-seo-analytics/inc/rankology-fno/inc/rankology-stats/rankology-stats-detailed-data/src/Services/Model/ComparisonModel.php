<?php

namespace Rankology_Stats\Detailed_Data\Services\Model;

use Rankology_Stats\Detailed_Data\Helper;
use RANKOLOGY_STATS\DB;
use RANKOLOGY_STATS\TimeZone;
class ComparisonModel
{
    public static function get($args = array())
    {
        $data = ['referrals' => ['this_week' => self::getReferrerCount(-7, 0) ?? 0, 'last_week' => self::getReferrerCount(-14, -7) ?? 0], 'visitors' => ['this_week' => self::getVisitorsCount(-7, 0) ?? 0, 'last_week' => self::getVisitorsCount(-14, -7) ?? 0], 'visits' => ['this_week' => self::getVisitsCount(-7, 0) ?? 0, 'last_week' => self::getVisitsCount(-14, -7) ?? 0]];
        foreach ($data as $key => $value) {
            $data[$key]['diff'] = $value['this_week'] - $value['last_week'];
            if ($data[$key]['diff'] > 0) {
                $data[$key]['diff_type'] = 'plus';
            } elseif ($data[$key]['diff'] < 0) {
                $data[$key]['diff_type'] = 'minus';
                $data[$key]['diff'] = $value['last_week'] - $value['this_week'];
            } else {
                $data[$key]['diff_type'] = 'equal';
            }
            $data[$key]['diff_percentage'] = $value['last_week'] ? $data[$key]['diff'] / $value['last_week'] * 100 : 0;
        }
        $data['onlines'] = rankology_stats_useronline();
        echo Helper::loadTemplate('meta-box-comparison.php', $data);
    }
    public static function getReferrerCount($from = null, $to = null)
    {
        global $wpdb;
        $sql = "SELECT `referred` FROM `" . DB::table('visitor') . "` WHERE referred <> '' AND (`last_counter` BETWEEN '" . TimeZone::getCurrentDate('Y-m-d', $from) . "' AND '" . TimeZone::getCurrentDate('Y-m-d', $to) . "')";
        $result = $wpdb->get_results($sql);
        $urls = array();
        foreach ($result as $item) {
            $url = \parse_url($item->referred);
            if (empty($url['host']) || \stristr(get_bloginfo('url'), $url['host'])) {
                continue;
            }
            $urls[] = $url['scheme'] . '://' . $url['host'];
        }
        $get_urls = \array_count_values($urls);
        return \count($get_urls);
    }
    public static function getVisitorsCount($from = null, $to = null)
    {
        global $wpdb;
        $sql = "SELECT COUNT(last_counter) FROM `" . DB::table('visitor') . "` WHERE (`last_counter` BETWEEN '" . TimeZone::getCurrentDate('Y-m-d', $from) . "' AND '" . TimeZone::getCurrentDate('Y-m-d', $to) . "')";
        $result = $wpdb->get_var($sql);
        return $result;
    }
    public static function getVisitsCount($from = null, $to = null)
    {
        global $wpdb;
        $sql = "SELECT SUM(visit) FROM `" . DB::table('visit') . "` WHERE (`last_counter` BETWEEN '" . TimeZone::getCurrentDate('Y-m-d', $from) . "' AND '" . TimeZone::getCurrentDate('Y-m-d', $to) . "')";
        $result = $wpdb->get_var($sql);
        return $result;
    }
}
