<?php

namespace RankologyFno\Services\Options;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

class SitemapOptionPro {

    /**
     * 
     *
     * @return array
     */
    public function getOption() {
        return get_option('rankology_xml_sitemap_option_name');
    }

    /**
     * 
     *
     * @return string|null
     *
     * @param string $key
     */
    protected function searchOptionByKey($key) {
        $data = $this->getOption();

        if (empty($data)) {
            return null;
        }

        if ( ! isset($data[$key])) {
            return null;
        }

        return $data[$key];
    }

    /**
     * 
     *
     * @return string|null
     */
    public function getSitemapVideoEnable() {
        return $this->searchOptionByKey('rankology_xml_sitemap_video_enable');
    }
}
