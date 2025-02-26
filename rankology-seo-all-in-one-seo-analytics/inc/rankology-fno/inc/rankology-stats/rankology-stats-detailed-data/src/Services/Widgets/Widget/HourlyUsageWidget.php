<?php

namespace Rankology_Stats\Detailed_Data\Services\Widgets\Widget;

use Rankology_Stats\Detailed_Data\Services\Abstracts\AbstractWidget;
use RANKOLOGY_STATS\Menus;
class HourlyUsageWidget extends AbstractWidget
{
    public function register()
    {
        add_filter('rankology_stats_overview_meta_box_list', [$this, 'registerHourlyUsageMetaBox']);
        add_filter('rankology_stats_meta_box_class', [$this, 'registerHourlyUsageMetaBoxClass'], 10, 2);
        add_action('admin_enqueue_scripts', [$this, 'enqueueScript']);
    }
    public function enqueueScript()
    {
        if (Menus::in_page('overview')) {
            wp_enqueue_script('rankology-stats-detailed-data-hourly-usage', RANKOLOGY_STATS_DETAILED_DATA_URL . '/assets/js/hourly-usage.js', ['jquery'], RANKOLOGY_STATS_DETAILED_DATA_VERSION, \true);
        }
    }
    public function registerHourlyUsageMetaBox($metaboxes)
    {
        $metaboxes['hourly-usage'] = ['name' => __('Hourly Usage', 'rankology-stats-detailed-data'), 'place' => 'normal', 'priority' => 'default', 'show_on_dashboard' => \false, 'js' => \false];
        return $metaboxes;
    }
    public function registerHourlyUsageMetaBoxClass($class, $metabox)
    {
        if ($metabox == 'hourly-usage') {
            $class = '\\Rankology_Stats\\Detailed_Data\\Services\\Model\\HourlyUsageModel';
        }
        return $class;
    }
}
