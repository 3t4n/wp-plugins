<?php

namespace ExactLinks\App\Models;

use ExactLinks\App\Models\Link;
use ExactLinks\App\Models\ConversionItems;

class LinkAnalytics extends Model
{
    protected $table = 'exactlinks_analytics';

    public function isIpAddress($linkId, $ipAddress)
    { 
        return (bool) $this->where('link_id', $linkId)
                ->where('ip', $ipAddress)
                ->first();
    }

    public function getAnalytics($request, $id)
    {
        $linkData   = (new Link)->getLink($id);
        $ConversionItems = (new ConversionItems);
        $analyticId = $request->get('analytic_id');
        $range      = $request->get('range');
        $fromDate   = $request->get('from_date');
        $toDate     = $request->get('to_date');
       
        $dateWise = '';
        $selectDate = 'DATE(date) as date';
        $groupBy = 'DATE(date)';
        
        if ($range == 'this_year') {
            $dateWise = "AND YEAR(CURDATE()) = YEAR(date)"; 
            $selectDate = 'MONTH(date) as month';
            $groupBy = "MONTH(date)";
        } elseif ($range == 'last_month') {
            $dateWise = "AND MONTH(CURDATE()) = MONTH(date) + 1"; 
        } elseif ($range == 'this_month') { 
            $dateWise = "AND MONTH(CURDATE()) = MONTH(date)";
        } elseif ($range == 'last_seven_days') { 
            $dateWise = "AND DATEDIFF(CURDATE(), DATE(date)) < 7";
        } elseif ($range == 'custom_analytics') {
            $fromDate .= ' 00:00:00';
            $toDate .= ' 23:59:59'; 
            $dateWise = "AND date >= '{$fromDate}' && date <= '{$toDate}'";
        }
        
        $browserResult = $this->getDetectResults(
            $name = "browser_name", $analyticId, $dateWise
        );
        
        $osResult = $this->getDetectResults(
            $name = "os_name", $analyticId, $dateWise
        );
        
        $trafficResult = $this->getDetectResults(
            $name = "traffic_source_name", $analyticId, $dateWise
        );
        
        $devicesResult = $this->getDetectResults(
            $name = "devices_name", $analyticId, $dateWise
        );

        $countryResult = $this->getDetectResults(
            $name = "country_name", $analyticId, $dateWise
        );

        $cityResult = $this->getDetectResults(
            $name = "city_name", $analyticId, $dateWise
        );

        $ipResult = $this->getDetectResults(
            $name = "ip", $analyticId, $dateWise
        );
        
        $dateResult = $this->getDateResult(
            $analyticId, $dateWise, $selectDate, $groupBy
        );

        $dateUniqueResult = $this->getUniqueResultsByIp(
            $analyticId, $dateWise, $selectDate, $groupBy
        );

        $shortLinkSources = $this->getLinkSource($linkData);

        $data = [
            'analyticId'            => $analyticId,
            'link'                  => $linkData,
            'range'                 => $range,
            'browser_result'        => $browserResult,
            'os_result'             => $osResult,
            'traffic_result'        => $trafficResult,
            'devices_result'        => $devicesResult,
            'country_name'          => $countryResult,
            'city_name'             => $cityResult,
            'ip_result'             => $ipResult,
            'date_result'           => $dateResult,
            'date_unique_result'    => $dateUniqueResult,
            'from_date'             => $fromDate,
            'to_date'               => $toDate,
            'shortlink_sources'     => $shortLinkSources,
            'convertion_items'      => $ConversionItems->getConversionItems($linkData['slug'])
        ];
        
        if (defined('WC_VERSION') || defined('EDD_VERSION') ) {
            $data['date_conversion_result'] = $this->getConversionResult(
                $analyticId, $dateWise, $selectDate, $groupBy
            );

            $data['date_conversion_amount_result'] = $this->getDateConversionAmountResult(
                $analyticId, $dateWise, $selectDate, $groupBy
            );
        }
        
        if ($linkData['type'] == 'simple' && !defined('EXACTLINKSPRO')) {
            return $data;
        } else if (defined('EXACTLINKSPRO')) {
            return $data;
        } else {
            $data = [
                'analyticId'            => $analyticId,
                'link'                  => $linkData,
                'range'                 => '',
                'browser_result'        => [],
                'os_result'             => [],
                'traffic_result'        => [],
                'devices_result'        => [],
                'country_name'          => [],
                'city_name'             => [],
                'ip_result'             => [],
                'date_result'           => [],
                'date_unique_result'    => [],
                'from_date'             => '',
                'to_date'               => '',
                'shortlink_sources'     => [],
                'date_conversion_result'=> [],
                'date_conversion_amount_result'=> []
            ];
            
            return $data;
        }
    }

    protected function getDetectResults($name, $analyticId, $dateWise)
    {
        global $wpdb;

        $link_clicks_table_name = $wpdb->prefix . $this->table;

        $result = $wpdb->get_results(
            "SELECT $name, COUNT(link_id) as clicks 
            FROM {$link_clicks_table_name} 
            WHERE (link_id = $analyticId) AND (conversion_text IS NULL) $dateWise
            GROUP BY $name" 
        );

        return $result;
    }

    protected function getDateResult($analyticId, $dateWise, $selectDate, $groupBy)
    {
        global $wpdb;

        $link_clicks_table_name = $wpdb->prefix . $this->table;

        $result = $wpdb->get_results( 
            "SELECT $selectDate, COUNT(link_id) as clicks 
            FROM {$link_clicks_table_name} 
            WHERE (link_id = $analyticId) AND (conversion_text IS NULL) $dateWise
            GROUP BY $groupBy" 
        );

        return $result;
    }

    protected function getUniqueResultsByIp($analyticId, $dateWise, $selectDate, $groupBy)
    {
        global $wpdb;

        $link_clicks_table_name = $wpdb->prefix . $this->table;

        $result = $wpdb->get_results( 
            "SELECT $selectDate, ip, count(*) as clicks 
            FROM (
                SELECT ip, date, COUNT(link_id) as clicks 
                FROM {$link_clicks_table_name} 
                WHERE (link_id = $analyticId) AND (conversion_text IS NULL) $dateWise
                GROUP BY $groupBy, ip
            ) AA
            GROUP BY $groupBy" 
        );

        return $result;
    }

    protected function getConversionResult($analyticId, $dateWise, $selectDate, $groupBy)
    {
        global $wpdb;

        $link_clicks_table_name = $wpdb->prefix . $this->table;

        $conversion_text = " AND conversion_text = 'thankyou_url' ";

        $result = $wpdb->get_results( 
            "SELECT $selectDate, COUNT(link_id) as clicks 
            FROM {$link_clicks_table_name} 
            WHERE (link_id = $analyticId) $conversion_text $dateWise
            GROUP BY $groupBy" 
        );

        return $result;
    }

    protected function getDateConversionAmountResult($analyticId, $dateWise, $selectDate, $groupBy)
    {
        global $wpdb;

        $link_clicks_table_name = $wpdb->prefix . $this->table;

        $conversion_amount = "AND conversion_amount";
        
        $result = $wpdb->get_results( 
            "SELECT $selectDate, sum(conversion_amount) as total 
            FROM {$link_clicks_table_name} 
            WHERE (link_id = $analyticId) $conversion_amount $dateWise
            GROUP BY $groupBy" 
        ); 

        return $result;
    }

    protected function getLinkSource($linkData)
    {
        $type = 'box';

        if ( $linkData['type'] == 'choice_pages') {
            $type = 'choice'; 
        }

        if ( $linkData['type'] == 'box_content') {
            $type = 'box'; 
        }

        $siteLinkSearch  =  get_site_url().'/'.$linkData['slug']; 
        $shortcodeSlugSearch = '[exactlinks '. "$type".'-slug='.'"'.$linkData['slug'].'"'.']'; 

        $siteLinkSearch =  $this->shortLinkSources($siteLinkSearch);
        $shortcodeSlugSearch = $this->shortLinkSources($shortcodeSlugSearch);

        $shortLinkSources = array_merge($siteLinkSearch, $shortcodeSlugSearch);
        
        $uniquePosts = $this->returnUniqueProperty($shortLinkSources, 'url');
        
        return $uniquePosts;
    }

    protected function shortLinkSources($search)
    {   
        $args = array (
                    "post_type"   => array( 'post', 'page', 'product', 'download'),
                    'post_status' => 'publish',
                    "s" => $search
                );
        
        $posts = get_posts( $args );
       
        $data = [];

        if (!$posts) {
            return $data;   
        }
       
        foreach($posts as $post) {
            $sourceLink = array(
                'post_title' => $post->post_title,
                'url'        => get_permalink($post->ID)
            );
            array_push($data, $sourceLink);
        }
        
        return $data;
    }

    public function returnUniqueProperty($array, $property) 
    {
        $tempArray = array_unique(array_column($array, $property));
        
        $moreUniqueArray = array_values(array_intersect_key($array, $tempArray));
        
        return $moreUniqueArray;
    }
}
