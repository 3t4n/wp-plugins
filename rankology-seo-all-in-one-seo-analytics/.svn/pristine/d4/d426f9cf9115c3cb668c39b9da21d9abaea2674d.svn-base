<?php

namespace Rankology_Stats\Detailed_Data\Services\Widgets\Widget;

use Rankology_Stats\Detailed_Data\Helper;
use Rankology_Stats\Detailed_Data\Services\Abstracts\AbstractWidget;
use RANKOLOGY_STATS\DB;
use RANKOLOGY_STATS\TimeZone;
use RANKOLOGY_STATS\UserAgent;
class TopBrowsersWidget extends AbstractWidget
{
    public function register()
    {
        add_filter('rankology_stats_pages_chart_browsers', [$this, 'registerTopBrowsersMetaBox'], 10, 2);
    }
    public function registerTopBrowsersMetaBox($content, $args)
    {
        global $wpdb;
        $postID = isset($args['custom_get']['ID']) ? $args['custom_get']['ID'] : \false;
        $postType = isset($args['custom_get']['type']) ? $args['custom_get']['type'] : \false;
        $pageID = isset($args['custom_get']['page_id']) ? $args['custom_get']['page_id'] : \false;
        $dateRange = $args['DateRang'];
        $fromDate = TimeZone::getCurrentDate('Y-m-d', '-0', \strtotime($dateRange['from']));
        $toDate = TimeZone::getCurrentDate('Y-m-d', '-0', \strtotime($dateRange['to']));
        $total = $count = $top_ten = 0;
        $BrowserVisits = $browsers_value = $browsers_name = array();
        $visitorTable = DB::table('visitor');
        $Browsers = rankology_stats_ua_list();
        foreach ($Browsers as $Browser) {
            // Build the query.
            $sql = $this->_buildQuery(['post_id' => $postID, 'page_id' => $pageID, 'post_type' => $postType, 'from_date' => $fromDate, 'to_date' => $toDate, 'sql_select' => "SELECT COUNT(DISTINCT `" . $visitorTable . "`.`ID`, `" . $visitorTable . "`.`agent`)", 'sql_where' => "`" . $visitorTable . "`.`agent`='" . $Browser . "'"]);
            // Set the browser visits.
            $BrowserVisits[$Browser] = $wpdb->get_var($sql);
            // Set the total visits.
            $total += $BrowserVisits[$Browser];
        }
        //Add Unknown Agent to total
        $sql = $this->_buildQuery(['post_id' => $postID, 'post_type' => $postType, 'from_date' => $fromDate, 'to_date' => $toDate, 'sql_select' => "SELECT COUNT(DISTINCT `" . $visitorTable . "`.`ID`, `" . $visitorTable . "`.`agent`)", 'sql_where' => "`" . $visitorTable . "`.`agent` NOT IN ('" . \implode("','", $Browsers) . "')"]);
        // Set the browser visits.
        $other_agent_count = $wpdb->get_var($sql);
        // Add to total.
        $total += $other_agent_count;
        //Sort Browser List By Visitor ASC
        \arsort($BrowserVisits);
        // Get List Of Browser
        foreach ($BrowserVisits as $key => $value) {
            $value = (int) $value;
            if ($value == 0) {
                continue;
            }
            $top_ten += $value;
            $count++;
            if ($count > 9) {
                break;
            }
            $browser_name = UserAgent::BrowserList(\strtolower($key));
            $browsers_name[] = $browser_name;
            $browsers_value[] = $value;
        }
        // Push Other Browser
        if ($browsers_name and $browsers_value and $other_agent_count > 0) {
            $browsers_name[] = __('Other', 'rankology-stats');
            $browsers_value[] = (int) ($total - $top_ten);
        }
        return Helper::loadTemplate('pages-chart-top-browsers.php', ['browsers_name' => $browsers_name, 'browsers_value' => $browsers_value, 'total' => $total]);
    }
}
