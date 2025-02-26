<?php

namespace RankologyFno\Services\Options;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');


class OptionBot {

    /**
     * 
     *
     * @return array
     */
    public function getOption() {
        return get_option('rankology_bot_option_name');
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
     * @return string
     */
    public function getBotScanSettingsCleaning() {
        return $this->searchOptionByKey('rankology_bot_scan_settings_cleaning');
    }

    /**
     * 
     *
     * @return string
     */
    public function getBotScanSettingsType() {
        return $this->searchOptionByKey('rankology_bot_scan_settings_type');
    }

    /**
     * 
     *
     * @return string
     */
    public function getBotScanSettingsWhere() {
        return $this->searchOptionByKey('rankology_bot_scan_settings_where');
    }

    /**
     * 
     *
     * @return string
     */
    public function getBotScanSettings404() {
        return $this->searchOptionByKey('rankology_bot_scan_settings_404');
    }

    /**
     * 
     *
     * @return string
     */
    public function getBotScanSettingsTimeout() {
        return $this->searchOptionByKey('rankology_bot_scan_settings_timeout');
    }

    /**
     * 
     *
     * @return string
     */
    public function getBotScanSettingsNumber() {
        return $this->searchOptionByKey('rankology_bot_scan_settings_number');
    }

    /**
     * 
     *
     * @return string
     */
    public function getBotScanSettingsPostTypes() {
        return $this->searchOptionByKey('rankology_bot_scan_settings_post_types');
    }
}
