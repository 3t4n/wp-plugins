<?php

namespace RankologyFno\Actions\Sitemap;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

use Rankology\Core\Hooks\ExecuteHooks;

class RouterNewsSitemap implements ExecuteHooks {
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
        if ('1' !== rankology_fno_get_service('OptionPro')->getGoogleNewsEnable() || ! function_exists('rankology_get_toggle_option') || '1' !== rankology_get_toggle_option('news')) {
            return;
        }

        //Google News
        add_rewrite_rule('news.xml?$', 'index.php?rankology_news=1', 'top');
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
        if ('1' !== rankology_fno_get_service('OptionPro')->getGoogleNewsEnable() || ! function_exists('rankology_get_toggle_option') || '1' !== rankology_get_toggle_option('news')) {
            return $vars;
        }

        $vars[] = 'rankology_news';

        return $vars;
    }
}
