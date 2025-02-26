<?php

namespace Rankology_Stats\Detailed_Data\Services\Widgets\Widget;

use RANKOLOGY_STATS\Country;
use Rankology_Stats\Detailed_Data\Helper;
use Rankology_Stats\Detailed_Data\Services\Abstracts\AbstractWidget;
use RANKOLOGY_STATS\DB;
use RANKOLOGY_STATS\GeoIP;
use RANKOLOGY_STATS\IP;
use RANKOLOGY_STATS\TimeZone;
use RANKOLOGY_STATS\UserAgent;
class VisitorsMapWidget extends AbstractWidget
{
    public function register()
    {
        add_filter('rankology_stats_pages_chart_visitors_map', [$this, 'registerVisitorsMapMetaBox'], 10, 2);
    }
    public function registerVisitorsMapMetaBox($content, $args)
    {
        global $wpdb;
        $postID = isset($args['custom_get']['ID']) ? $args['custom_get']['ID'] : \false;
        $postType = isset($args['custom_get']['type']) ? $args['custom_get']['type'] : \false;
        $pageID = isset($args['custom_get']['page_id']) ? $args['custom_get']['page_id'] : \false;
        $dateRange = $args['DateRang'];
        $fromDate = TimeZone::getCurrentDate('Y-m-d', '-0', \strtotime($dateRange['from']));
        $toDate = TimeZone::getCurrentDate('Y-m-d', '-0', \strtotime($dateRange['to']));
        $visitorTable = DB::table('visitor');
        $CountryCode = Country::getList();
        $final_result[GeoIP::$private_country] = array();
        $sql = $this->_buildQuery(['post_id' => $postID, 'page_id' => $pageID, 'post_type' => $postType, 'from_date' => $fromDate, 'to_date' => $toDate]);
        $list = $wpdb->get_results($sql);
        if ($list) {
            foreach ($list as $new_country) {
                $final_result[\strtolower($new_country->location)][] = $new_country;
            }
        }
        $final_total = \count($list) - \count($final_result[GeoIP::$private_country]);
        unset($final_result[GeoIP::$private_country]);
        $startColor = array(200, 238, 255);
        $endColor = array(0, 100, 145);
        foreach ($final_result as $items) {
            foreach ($items as $markets) {
                if ($markets->location == GeoIP::$private_country) {
                    continue;
                }
                $visitor['browser'] = array('name' => $markets->agent, 'logo' => UserAgent::getBrowserLogo($markets->agent));
                if (IP::IsHashIP($markets->ip)) {
                    $visitor['ip'] = IP::$hash_ip_prefix;
                } else {
                    $visitor['ip'] = $markets->ip;
                }
                if (GeoIP::active('city')) {
                    try {
                        $visitor['city'] = GeoIP::getCity($markets->ip);
                    } catch (\Exception $e) {
                        $visitor['city'] = '';
                    }
                }
                $get_ipp[$markets->location][] = $visitor;
            }
            if (isset($get_ipp) and isset($markets) and \array_key_exists($markets->location, $get_ipp)) {
                // Show Only Last Five User
                $market_total = \count($get_ipp[$markets->location]);
                // Set Country information
                $response['country'][\strtolower($markets->location)] = array('location' => $markets->location, 'name' => $CountryCode[$markets->location], 'flag' => Country::flag($markets->location));
                // Set Visitor List
                $response['visitor'][\strtolower($markets->location)] = \array_slice($get_ipp[$markets->location], 0, 6);
                # We only Six number User from every Country
                // Set Color For Country
                $response['color'][\strtolower($markets->location)] = \sprintf("#%02X%02X%02X", \round($startColor[0] + ($endColor[0] - $startColor[0]) * $market_total / $final_total), \round($startColor[1] + ($endColor[1] - $startColor[1]) * $market_total / $final_total), \round($startColor[2] + ($endColor[2] - $startColor[2]) * $market_total / $final_total));
                // Set total Every Country
                $response['total_country'][\strtolower($markets->location)] = $market_total;
            }
        }
        $response['total'] = $final_total;
        return Helper::loadTemplate('pages-chart-visitors-map.php', ['response' => $response]);
    }
}
