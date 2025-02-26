<?php

namespace RankologyFno\Services\Options;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');


class GoogleAnalyticsOptionPro {
    /**
     * 
     *
     * @return array
     */
    public function getOption() {
        return get_option('rankology_google_analytics_option_name1');
    }

    /**
     * 
     *
     * @param string $key
     *
     * @return mixed
     */
    public function searchOptionByKey($key) {
        $data = $this->getOption();

        if (empty($data)) {
            return null;
        }

        if ( ! isset($data[$key])) {
            return null;
        }

        return $data[$key];
    }

    public function getAccessToken() {
        return $this->searchOptionByKey('access_token');
    }

    public function getRefreshToken() {
        return $this->searchOptionByKey('refresh_token');
    }

    public function getDebug() {
        return $this->searchOptionByKey('debug');
    }
}
