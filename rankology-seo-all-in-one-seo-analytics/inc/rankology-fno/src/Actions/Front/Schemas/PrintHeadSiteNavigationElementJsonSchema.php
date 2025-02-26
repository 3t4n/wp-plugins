<?php

namespace RankologyFno\Actions\Front\Schemas;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Core\Hooks\ExecuteHooksFrontend;

class PrintHeadSiteNavigationElementJsonSchema implements ExecuteHooksFrontend {
    public function hooks() {
        add_action('wp_head', [$this, 'render'], 2);
    }

    public function render() {
        /**
         * Check if Rich Snippets toggle is ON
         *
         * 
         * 
         */
        if (rankology_get_toggle_option('rich-snippets') !=='1') {
            return;
        }

        /**
         * Check if is homepage
         *
         * 
         * 
         */
        if (!is_front_page()) {
            return;
        }

        if ('none' === rankology_fno_get_service('OptionPro')->getRichSnippetsSiteNavigation()) {
            return;
        }

        $jsons = rankology_get_service('JsonSchemaGenerator')->getJsonsEncoded([
            'site-navigation-element'
        ]);

        if ($jsons[0] === '[]') {
            return;
        }
        ?><script type="application/ld+json"><?php echo apply_filters('rankology_schemas_site_navigation_element_html', $jsons[0]); ?></script>
<?php
    }
}
