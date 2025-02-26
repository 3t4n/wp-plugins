<?php

namespace RankologyFno\Actions\Sitemap;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

use Rankology\Core\Hooks\ExecuteHooksFrontend;

class RenderVideoSitemap implements ExecuteHooksFrontend {
    /**
     * 
     *
     * @return void
     */
    public function hooks() {
        add_action('pre_get_posts', [$this, 'render'], 1);
    }

    /**
     * 
     *
     * @return void
     */
    protected function hooksWPMLCompatibility() {
        if (!defined('ICL_SITEPRESS_VERSION')) {
            return;
        }

        if ( 2 != apply_filters( 'wpml_setting', false, 'language_negotiation_type' ) ) {
            add_filter('request', function ($q) {
                $current_language = apply_filters('wpml_current_language', false);
                $default_language = apply_filters('wpml_default_language', false);
                if ($current_language !== $default_language) {
                    unset($q['rankology_video']);
                }

                return $q;
            });
        }
    }

    /**
     * 
     * @see @pre_get_posts
     *
     * @param Query $query
     *
     * @return void
     */
    public function render($query) {
        if ( ! $query->is_main_query()) {
            return;
        }

        if ('1' !== rankology_fno_get_service('SitemapOptionPro')->getSitemapVideoEnable()) {
            return;
        }

        if ('1' === get_query_var('rankology_video')) {
            $filename = 'template-xml-sitemaps-video.php';
        }

        $this->hooksWPMLCompatibility();

        if (isset($filename) && file_exists(RANKOLOGY_FNO_PLUGIN_DIR_PATH . 'inc/functions/video-sitemap/' . $filename)) {
            include RANKOLOGY_FNO_PLUGIN_DIR_PATH . 'inc/functions/video-sitemap/' . $filename;
            exit();
        }
    }
}
