<?php
/**
 * Class AdhubPlatform_Options
 * 
 * Gestisce le opzioni del plugin
 * 
 * @package AdhubPlatform
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class AdhubPlatform_Options {
    private $options;
    private $option_name = 'adhub_platform_options';

    public function __construct() {
        $default_options = array(
            'enabled' => true,
            'cmp_script' => '',
            'desktop_970x250' => '',
            'desktop_970x250_device' => 'desktop',
            'desktop_300x600' => '',
            'desktop_300x600_device' => 'desktop',
            'desktop_300x250' => '',
            'desktop_300x250_device' => 'desktop',
            'desktop_300x250_2' => '',
            'desktop_300x250_2_device' => 'desktop',
            'desktop_sticky_video' => '',
            'desktop_sticky_video_device' => 'both',
            'desktop_native_single' => '',
            'desktop_native_single_device' => 'both',
            'desktop_native_extended' => '',
            'desktop_native_extended_device' => 'both',
            'desktop_728x90' => '',
            'desktop_728x90_device' => 'desktop',
            'desktop_skin' => '',
            'desktop_skin_device' => 'desktop',
            'mobile_320x100' => '',
            'mobile_320x100_device' => 'mobile',
            'mobile_320x50' => '',
            'mobile_320x50_device' => 'mobile'
        );

        $this->options = get_option($this->option_name, $default_options);
    }

    public function get_option($key) {
        return isset($this->options[$key]) ? $this->options[$key] : null;
    }

    public function get_all_options() {
        return $this->options;
    }

    public function update_options($new_options) {
        $this->options = array_merge($this->options, $new_options);
        return update_option($this->option_name, $this->options);
    }

    public function should_display_ad($position) {
        if (!$this->should_display_ads()) {
            return false;
        }

        $device_setting = $this->get_option($position . '_device');
        $is_mobile = wp_is_mobile();

        switch ($device_setting) {
            case 'desktop':
                return !$is_mobile;
            case 'mobile':
                return $is_mobile;
            case 'both':
            default:
                return true;
        }
    }

    public function should_display_ads() {
        return (bool) $this->get_option('enabled');
    }

    public function get_ad_tag($position) {
        if (!$this->should_display_ads()) {
            return '';
        }

        $tag = $this->get_option($position);
        return !empty($tag) ? $tag : '';
    }

    public function get_cmp_script() {
        return $this->get_option('cmp_script');
    }

    public function has_inmobi_cmp() {
        $cmp_script = $this->get_option('cmp_script');
        return !empty($cmp_script) && 
               (strpos($cmp_script, 'InMobi Choice') !== false || 
                strpos($cmp_script, 'inmobi.com/choice/') !== false);
    }
}