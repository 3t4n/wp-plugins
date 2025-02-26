<?php

namespace RANKOLOGY_STATS\MetaBox;

use RANKOLOGY_STATS\Option;
use RANKOLOGY_STATS\TimeZone;

class hits extends MetaBoxAbstract
{
    /**
     * Default Number day in Hits Chart
     *
     * @var int
     */
    public static $default_days_ago = 7;

    /**
     * Show Chart Hit
     *
     * @param array $args
     * @return array
     * @throws \Exception
     */
    public static function get($args = array())
    {
        // Check Number Days Or Between
        if (isset($args['from']) and isset($args['to'])) {
            $params = array('from' => $args['from'], 'to' => $args['to']);
        } else {
            $days   = (!empty($args['ago']) ? $args['ago'] : self::$default_days_ago);
            $params = array('ago' => $days);
        }

        // Prepare Response
        $response = self::HitsChart($params);

        // Check For No Data Meta Box
        if ((isset($response['visits']) and (!isset($args['no-data'])) and isset($response['visitors']) and count(array_filter($response['visits'])) < 1 and count(array_filter($response['visitors'])) < 1) || (isset($response['visits']) and !isset($response['visitors']) and count(array_filter($response['visits'])) < 1) || (!isset($response['visits']) and isset($response['visitors']) and count(array_filter($response['visitors'])) < 1)) {
            $response['no_data'] = 1;
        }

        // Response
        return self::response($response);
    }

    /**
     * Get Last Hits Chart
     *
     * @param array $args
     * @return array
     * @throws \Exception
     */
    public static function HitsChart($args = array())
    {

        // Set Default Params
        $defaults = array(
            'ago'  => 0,
            'from' => '',
            'to'   => ''
        );
        $args     = wp_parse_args($args, $defaults);

        // Prepare Default
        $visitors     = $date = $visits = array();
        $total_visits = $total_visitors = 0;

        // Filter By Date
        self::filterByDate($args);

        // Get List Of Days
        $days_time_list = array_keys(self::$daysList);
        foreach (self::$daysList as $k => $v) {
            $date[] = $v['format'];
        }

        // Set Title
        if (end($days_time_list) == TimeZone::getCurrentDate("Y-m-d")) {
            $title = sprintf(__('Traffic in the last %s days', 'rankology-stats'), self::$countDays);
        } else {
            $title = sprintf(__('Traffic from %s to %s', 'rankology-stats'), $args['from'], $args['to']);
        }

        // Push Basic Chart Data
        $data = array(
            'title' => $title,
            'date'  => $date
        );

        // Get Visits Chart
        if (Option::get('visits')) {
            foreach ($days_time_list as $d) {
                $total_visits += $visits[] = (int)rankology_stats_visit($d, true);
            }
            $data['visits'] = $visits;
        }

        // Get Visitors Chart
        if (Option::get('visitors')) {
            foreach ($days_time_list as $d) {
                $total_visitors += $visitors[] = (int)rankology_stats_visitor($d, true);
            }
            $data['visitors'] = $visitors;
        }

        // Set Total
        $data['total'] = array(
            'visits'   => number_format_i18n($total_visits),
            'visitors' => number_format_i18n($total_visitors)
        );

        return $data;
    }

}