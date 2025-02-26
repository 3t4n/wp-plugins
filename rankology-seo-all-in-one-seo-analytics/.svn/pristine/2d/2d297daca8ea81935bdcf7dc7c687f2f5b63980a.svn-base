<?php

namespace Rankology_Stats\Detailed_Data\Services\Widgets\Widget;

use Rankology_Stats\Detailed_Data\Helper;
use Rankology_Stats\Detailed_Data\Services\Abstracts\AbstractWidget;
use RANKOLOGY_STATS\Pages;
use RANKOLOGY_STATS\TimeZone;
use RANKOLOGY_STATS\Visitor;
class PostVisitorsWidget extends AbstractWidget
{
    public function register()
    {
        add_filter('rankology_stats_meta_box_post_visitors', [$this, 'registerPostVisitorsMetaBox'], 10, 2);
    }
    public function registerPostVisitorsMetaBox($content, \WP_Post $post)
    {
        $postID = $post->ID;
        $postType = Pages::get_post_type($postID);
        $fromDate = TimeZone::getCurrentDate('Y-m-d', -20);
        $toDate = TimeZone::getCurrentDate('Y-m-d');
        $sql = $this->_buildQuery(['post_id' => $postID, 'post_type' => $postType, 'from_date' => $fromDate, 'to_date' => $toDate]);
        $visitors = Visitor::get(['sql' => $sql, 'per_page' => 15]);
        return Helper::loadTemplate('meta-box-post-visitors.php', ['visitors' => $visitors, 'attributes' => ['showLoggedUsers' => \true]]);
    }
}
