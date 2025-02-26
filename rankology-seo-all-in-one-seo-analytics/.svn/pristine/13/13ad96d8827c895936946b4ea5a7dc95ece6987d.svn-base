<?php

namespace Rankology_Stats\Detailed_Data\Services\Widgets\Widget;

use Rankology_Stats\Detailed_Data\Services\Abstracts\AbstractWidget;
class ComparisonWidget extends AbstractWidget
{
    public function register()
    {
        add_filter('rankology_stats_overview_meta_box_list', [$this, 'registerComparisonMetaBox']);
        add_filter('rankology_stats_meta_box_class', [$this, 'registerComparisonMetaBoxClass'], 10, 2);
    }
    /**
     * @param $metaboxes
     * @return array
     */
    public function registerComparisonMetaBox($metaboxes)
    {
        return \array_merge(['comparison' => ['name' => __('Stats Overview', 'rankology-stats-detailed-data'), 'place' => 'side', 'priority' => 'default', 'show_on_dashboard' => \false, 'js' => \false]], $metaboxes);
    }
    /**
     * @param $class
     * @param $metabox
     * @return mixed
     */
    public function registerComparisonMetaBoxClass($class, $metabox)
    {
        if ($metabox == 'comparison') {
            $class = '\\Rankology_Stats\\Detailed_Data\\Services\\Model\\ComparisonModel';
        }
        return $class;
    }
}
