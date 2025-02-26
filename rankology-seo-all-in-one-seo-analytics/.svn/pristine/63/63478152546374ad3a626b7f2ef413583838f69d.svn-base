<?php

namespace WPRankologyElementorAddon\Controls;

if ( ! defined('ABSPATH')) {
    exit();
}

class Google_Suggestions_Control extends \Elementor\Base_Control {
    public function get_type() {
        return 'rankology-google-suggestions';
    }

    public function enqueue() {
        wp_enqueue_style(
            'rkseo-el-google-suggestions-style',
            RANKOLOGY_ELEMENTOR_ADDON_URL . 'assets/css/google-suggestions.css'
        );

        wp_enqueue_script(
            'rkseo-el-google-suggestions-script',
            RANKOLOGY_ELEMENTOR_ADDON_URL . 'assets/js/google-suggestions.js',
            ['jquery'],
            RANKOLOGY_VERSION,
            true
        );

        if ('' != get_locale()) {
            $locale       = substr(get_locale(), 0, 2);
            $country_code = substr(get_locale(), -2);
        } else {
            $locale       = 'en';
            $country_code = 'US';
        }

        wp_localize_script(
            'rkseo-el-google-suggestions-script',
            'googleSuggestions',
            [
                'locale'      => $locale,
                'countryCode' => $country_code,
            ]
        );
    }

    protected function get_default_settings() {
        global $post;

        return [
            'label'       => __('Google suggestions', 'wp-rankology'),
            'tooltip'     => rankology_tooltip(__('Google suggestions', 'wp-rankology'), __('Enter a keyword, or a phrase, to find the top 10 Google suggestions instantly. This is useful if you want to work with the long tail technique.', 'wp-rankology'), esc_html('my super keyword,another keyword,keyword')),
            'placeholder' => __('Get suggestions from Google', 'wp-rankology'),
            'buttonLabel' => __('Get suggestions!', 'wp-rankology'),
        ];
    }

    public function content_template() {
        ?>
<div class="elementor-control-field rankology-google-suggestions">
    <label for="rankology_google_suggest_kw_meta">
        <div>{{{ data.label }}} {{{ data.tooltip }}}</div>
        <input id="rankology_google_suggest_kw_meta" type="text" placeholder="{{ data.placeholder }}"
            aria-label="Google suggestions">
    </label>
    <button id="rankology_get_suggestions" type="button"
        class="btn btnSecondary elementor-button elementor-button-default">{{{ data.buttonLabel }}}</button>
    <ul id='rankology_suggestions'></ul>
</div>
<?php
    }
}
