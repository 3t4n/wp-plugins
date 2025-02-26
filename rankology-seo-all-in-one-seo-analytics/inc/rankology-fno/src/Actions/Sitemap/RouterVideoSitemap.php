<?php

namespace RankologyFno\Actions\Sitemap;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

use Rankology\Core\Hooks\ExecuteHooks;

class RouterVideoSitemap implements ExecuteHooks {
    /**
     * 
     *
     * @return void
     */
    public function hooks() {
        add_action('init', [$this, 'init']);
        add_action('query_vars', [$this, 'queryVars']);
    }

    /**
     * 
     * @see init
     *
     * @return void
     */
    public function init() {
        if ('1' !== rankology_fno_get_service('SitemapOptionPro')->getSitemapVideoEnable()) {
            return;
        }
        if (empty(rankology_fno_get_service('SitemapOptionPro')->getSitemapVideoEnable())) {
            return;
        }

        $matches[2] = '';
        add_rewrite_rule('video([0-9]+)?.xml$', 'index.php?rankology_video=1&rankology_paged=' . $matches[2], 'top');
    }

    /**
     * 
     * @see query_vars
     *
     * @param array $vars
     *
     * @return array
     */
    public function queryVars($vars) {
        if ('1' !== rankology_fno_get_service('SitemapOptionPro')->getSitemapVideoEnable()) {
            return $vars;
        }
        if (empty(rankology_fno_get_service('SitemapOptionPro')->getSitemapVideoEnable())) {
            return $vars;
        }

        $vars[] = 'rankology_video';

        return $vars;
    }
}
