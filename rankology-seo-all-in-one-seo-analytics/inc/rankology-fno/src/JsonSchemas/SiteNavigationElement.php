<?php

namespace RankologyFno\JsonSchemas;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Helpers\RichSnippetType;
use Rankology\Models\GetJsonData;
use RankologyFno\Models\JsonSchemaValue;

class SiteNavigationElement extends JsonSchemaValue implements GetJsonData {
    const NAME = 'site-navigation-element';

    const ALIAS = ['site-navigation'];

    protected function getName() {
        return self::NAME;
    }

    /**
     * 
     *
     * @param array $context
     *
     * @return array
     */
    public function getJsonData($context = null) {
        $data = $this->getArrayJson();

        if ( ! function_exists('wp_get_nav_menu_items')) {
            return [];
        }

        $navItems  = rankology_fno_get_service('OptionPro')->getRichSnippetsSiteNavigation();

        $menuItems = wp_get_nav_menu_items($navItems);

        if (empty($menuItems)) {
            return [];
        }

        foreach ($menuItems as $item) {
            if (empty($item->url)) {
                continue;
            }
            $data['name'][] = $item->title;
            $data['url'][] = $item->url;
        }

        return apply_filters('rankology_fno_get_json_data_site_navigation_element', $data, $context);
    }
}
