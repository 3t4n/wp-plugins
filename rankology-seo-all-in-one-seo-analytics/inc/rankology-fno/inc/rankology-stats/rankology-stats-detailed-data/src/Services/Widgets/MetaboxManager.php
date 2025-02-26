<?php

namespace Rankology_Stats\Detailed_Data\Services\Widgets;

use Rankology_Stats\Detailed_Data\Services\Widgets\Widget\ComparisonWidget;
use Rankology_Stats\Detailed_Data\Services\Widgets\Widget\LatestVisitorsWidget;
use Rankology_Stats\Detailed_Data\Services\Widgets\Widget\OnlineUsersWidget;
use Rankology_Stats\Detailed_Data\Services\Widgets\Widget\PostVisitorsWidget;
use Rankology_Stats\Detailed_Data\Services\Widgets\Widget\TopBrowsersWidget;
use Rankology_Stats\Detailed_Data\Services\Widgets\Widget\TopCountriesWidget;
use Rankology_Stats\Detailed_Data\Services\Widgets\Widget\TopPlatformsWidget;
use Rankology_Stats\Detailed_Data\Services\Widgets\Widget\TopReferringWidget;
use Rankology_Stats\Detailed_Data\Services\Widgets\Widget\TopVisitorsWidget;
use Rankology_Stats\Detailed_Data\Services\Widgets\Widget\VisitorsMapWidget;
class MetaboxManager
{
    private $metaboxes = [ComparisonWidget::class, LatestVisitorsWidget::class, PostVisitorsWidget::class, TopVisitorsWidget::class, TopReferringWidget::class, TopCountriesWidget::class, OnlineUsersWidget::class, TopBrowsersWidget::class, TopPlatformsWidget::class, VisitorsMapWidget::class];
    public function init()
    {
        foreach ($this->metaboxes as $metabox) {
            $metabox = new $metabox();
            $metabox->register();
        }
    }
}
