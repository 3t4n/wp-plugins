<?php

namespace RankologyFno\Actions\FiltersFree;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Core\Hooks\ExecuteHooks;

class SubTabsVideoSitemap implements ExecuteHooks {
    public function hooks() {
        add_filter('rankology_active_video_sitemap', function () {
            return rankology_fno_get_service('SitemapOptionPro')->getSitemapVideoEnable() === '1';
        });
    }
}
