<?php

namespace ExactLinks\App\Libs\Csv;

class CsvDataProcess 
{
    public function allColumns() {
        return [
            'Link Name', 
            'Target URL', 
            'Short URL', 
            'Total Clicks', 
            'Unique Clicks',
            'Orders',
            'Conversion Rate', 
            'Net Sales', 
            'Browser Name',
            'Clicks',
            'OS Name',
            'Clicks',
            'Traffic Source Name',
            'Clicks',
            'Devices Name',
            'Clicks',
            'Country Name',
            'Clicks',
            'Link Placement Sources',
            'Product Name',
            'Sale Quantity',
            'Product Price'
        ];
    }

    public function allDatas($getAnalytics) {
        $rows = [];
        $totalClicks = [];
        $orders = [];
        $conversionAmounts = [];
        $totalUniqueClicks = isset($getAnalytics->data['ip_result']) ? count($getAnalytics->data['ip_result']) : 0;
        $settings = get_option('exactlinks_settings');

        foreach ($getAnalytics->data['browser_result'] ?? [] as $browser) {
            $totalClicks[] = $browser->clicks;
        }

        foreach ($getAnalytics->data['date_conversion_result'] ?? [] as $analytic) {
            $orders[] = $analytic->clicks;
        }

        $conversionRate = $totalUniqueClicks > 0 ? (array_sum($orders) * 100) / $totalUniqueClicks : 0;

        foreach ($getAnalytics->data['date_conversion_amount_result'] ?? [] as $analytic) {
            $conversionAmounts[] = $analytic->total;
        }

        $dataCounts = [
            isset($getAnalytics->data['browser_result']) ? count($getAnalytics->data['browser_result']) : 0,
            isset($getAnalytics->data['os_result']) ? count($getAnalytics->data['os_result']) : 0,
            isset($getAnalytics->data['traffic_result']) ? count($getAnalytics->data['traffic_result']) : 0,
            isset($getAnalytics->data['devices_result']) ? count($getAnalytics->data['devices_result']) : 0,
            isset($getAnalytics->data['country_name']) ? count($getAnalytics->data['country_name']) : 0,
            isset($getAnalytics->data['shortlink_sources']) ? count($getAnalytics->data['shortlink_sources']) : 0,
            isset($getAnalytics->data['convertion_items']) ? count($getAnalytics->data['convertion_items']) : 0
        ];

        $maxValues = max($dataCounts);

        for ($i = 0; $i < $maxValues; $i++) {
            $singleRow = [];

            if ($i === 0) {
                $singleRow[] = $getAnalytics->data['link']->title ?? '';
                $singleRow[] = $getAnalytics->data['link']->target_url ?? '';
                $singleRow[] = isset($getAnalytics->data['link']) ? $this->getSlugUrl($getAnalytics->data['link']) : '';
                $singleRow[] = array_sum($totalClicks);
                $singleRow[] = $totalUniqueClicks;
                $singleRow[] = array_sum($orders);
                $singleRow[] = round($conversionRate, 2) . '%';
                $singleRow[] = number_format(array_sum($conversionAmounts), 2);
            } else {
                $singleRow = array_fill(0, 8, '');
            }

            $singleRow[] = $getAnalytics->data['browser_result'][$i]->browser_name ?? '';
            $singleRow[] = $getAnalytics->data['browser_result'][$i]->clicks ?? '';

            $singleRow[] = $getAnalytics->data['os_result'][$i]->os_name ?? '';
            $singleRow[] = $getAnalytics->data['os_result'][$i]->clicks ?? '';

            $singleRow[] = $getAnalytics->data['traffic_result'][$i]->traffic_source_name ?? '';
            $singleRow[] = $getAnalytics->data['traffic_result'][$i]->clicks ?? '';

            $singleRow[] = $getAnalytics->data['devices_result'][$i]->devices_name ?? '';
            $singleRow[] = $getAnalytics->data['devices_result'][$i]->clicks ?? '';

            $singleRow[] = $getAnalytics->data['country_name'][$i]->country_name ?? '';
            $singleRow[] = $getAnalytics->data['country_name'][$i]->clicks ?? '';

            $singleRow[] = $getAnalytics->data['shortlink_sources'][$i]['url'] ?? '';

            $singleRow[] = $getAnalytics->data['convertion_items'][$i]->product_name ?? '';
            $singleRow[] = $getAnalytics->data['convertion_items'][$i]->sale_quantity ?? '';
            $singleRow[] = isset($getAnalytics->data['convertion_items'][$i]->price) ? $settings['currency'] . $getAnalytics->data['convertion_items'][$i]->price : '';

            $rows[] = $singleRow;
        }

        return $rows;
    }

    public function getPrefixLinkUrl($link) {
        $prefixLink = get_site_url();

        if (!empty($link->subdomain_name)) {
            return str_replace('://', '://' . $link->subdomain_name . '.', $prefixLink);
        }

        return $prefixLink;
    }

    public function getSlugUrl($link) {
        return $this->getPrefixLinkUrl($link) . '/' . ($link->slug ?? '');
    }
}
