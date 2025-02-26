<?php

namespace Rankology_Stats\Detailed_Data\Services\Widgets\Widget;

use RANKOLOGY_STATS\Admin_Template;
use Rankology_Stats\Detailed_Data\Helper;
use Rankology_Stats\Detailed_Data\Services\Abstracts\AbstractWidget;
use RANKOLOGY_STATS\DB;
use RANKOLOGY_STATS\Referred;
use RANKOLOGY_STATS\TimeZone;
use RANKOLOGY_STATS\Visitor;
class TopReferringWidget extends AbstractWidget
{
    public function register()
    {
        add_filter('rankology_stats_pages_chart_referring', [$this, 'registerTopReferringMetaBox'], 10, 2);
    }
    public function registerTopReferringMetaBox($content, $args)
    {
        global $wpdb;
        $postID = isset($args['custom_get']['ID']) ? $args['custom_get']['ID'] : \false;
        $postType = isset($args['custom_get']['type']) ? $args['custom_get']['type'] : \false;
        $pageID = isset($args['custom_get']['page_id']) ? $args['custom_get']['page_id'] : \false;
        $dateRange = $args['DateRang'];
        $fromDate = TimeZone::getCurrentDate('Y-m-d', '-0', \strtotime($dateRange['from']));
        $toDate = TimeZone::getCurrentDate('Y-m-d', '-0', \strtotime($dateRange['to']));
        $visitorTable = DB::table('visitor');
        $sqlWhere = '';
        $domain_name = \rtrim(\preg_replace('/^https?:\\/\\//', '', get_site_url()), " / ");
        foreach (array("http", "https", "ftp") as $protocol) {
            foreach (array('', 'www.') as $w3) {
                $sqlWhere .= "`" . $visitorTable . "`.`referred` NOT LIKE '{$protocol}://{$w3}{$domain_name}%' AND ";
            }
        }
        $sqlWhere .= "`" . $visitorTable . "`.`referred` REGEXP \"^(https?://|www\\.)[\\.A-Za-z0-9\\-]+\\.[a-zA-Z]{2,4}\" AND `" . $visitorTable . "`.`referred` <> '' AND LENGTH(`" . $visitorTable . "`.`referred`) >=12";
        $sql = $this->_buildQuery(['post_id' => $postID, 'page_id' => $pageID, 'post_type' => $postType, 'from_date' => $fromDate, 'to_date' => $toDate, 'sql_select' => "SELECT SUBSTRING_INDEX(REPLACE( REPLACE( `" . $visitorTable . "`.`referred`, 'http://', '') , 'https://' , '') , '/', 1 ) as `domain`, count(`" . $visitorTable . "`.`referred`) as `number`", 'sql_where' => $sqlWhere, 'sql_group' => "GROUP BY `domain`", 'sql_order' => "ORDER BY `number` DESC", 'sql_limit' => "LIMIT 10"]);
        $total = $wpdb->query($sql);
        $result = $wpdb->get_results($sql);
        $get_urls = [];
        foreach ($result as $items) {
            $get_urls[$items->domain] = Referred::get_referer_from_domain($items->domain);
        }
        $referring = Referred::PrepareReferData($get_urls);
        return Helper::loadTemplate('pages-chart-top-referring.php', ['referring' => $referring, 'pagination' => \false]);
    }
}
