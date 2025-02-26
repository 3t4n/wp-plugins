<?php

namespace RANKOLOGY_STATS\MetaBox;

use RANKOLOGY_STATS\DB;
use RANKOLOGY_STATS\Helper;
use RANKOLOGY_STATS\Menus;
use RANKOLOGY_STATS\TimeZone;

class platforms extends MetaBoxAbstract
{
    /**
     * Get Platforms Chart
     *
     * @param array $arg
     * @return array
     * @throws \Exception
     */
    public static function get($arg = array())
    {
        global $wpdb;

        // Set Default Params
        $defaults = array(
            'ago'    => 0,
            'from'   => '',
            'to'     => '',
            'order'  => '',
            'number' => 10 // Get Max number of platform
        );
        $args     = wp_parse_args($arg, $defaults);

        // Filter By Date
        self::filterByDate($args);

        // Get List Of Days
        $days_time_list = array_keys(self::$daysList);
        foreach (self::$daysList as $k => $v) {
            $date[]          = $v['format'];
            $total_daily[$k] = 0;
        }

        // Set Default Value
        $total       = $count = 0;
        $lists_value = $lists_name = array();

        $order_by = '';
        if ($args['order'] and in_array($args['order'], array('DESC', 'ASC', 'desc', 'asc'))) {
            $order_by = "ORDER BY `count` " . esc_sql($args['order']);
        }

        $sql = $wpdb->prepare("SELECT platform, COUNT(*) as count FROM " . DB::table('visitor') . " WHERE platform != '" . _x('Unknown', 'Platform', 'rankology-stats') . "' AND `last_counter` BETWEEN %s AND %s GROUP BY platform {$order_by}", reset($days_time_list), end($days_time_list));

        // Get List All Platforms
        $list = $wpdb->get_results($sql, ARRAY_A);

        // Sort By Count
        Helper::SortByKeyValue($list, 'count');

        // Get Last 10 Version that Max number
        $platforms = array_slice($list, 0, $args['number']);

        // Push to array
        foreach ($platforms as $l) {

            if (trim($l['platform']) != "") {

                // Sanitize Version name
                $lists_name[] = sanitize_text_field($l['platform']);

                // Get List Count
                $lists_value[] = (int)$l['count'];

                // Add to Total
                $total += $l['count'];
            }
        }

        // Set Title
        if (end($days_time_list) == TimeZone::getCurrentDate("Y-m-d")) {
            $title = sprintf(__('%s Statistics in the last %s days', 'rankology-stats'), __('Platforms', 'rankology-stats'), self::$countDays);
        } else {
            $title = sprintf(__('%s Statistics from %s to %s', 'rankology-stats'), __('Platforms', 'rankology-stats'), $args['from'], $args['to']);
        }

        // Prepare Response
        $response = array(
            'title'          => $title,
            'platform_name'  => $lists_name,
            'platform_value' => $lists_value,
            'info'           => array(
                'visitor_page' => Menus::admin_url('visitors')
            ),
            'total'          => $total
        );

        // Check For No Data Meta Box
        if (count(array_filter($lists_value)) < 1 and !isset($args['no-data'])) {
            $response['no_data'] = 1;
        }

        // Response
        return self::response($response);
    }

}