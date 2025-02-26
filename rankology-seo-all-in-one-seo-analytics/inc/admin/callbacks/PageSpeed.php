<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//Page Speed Insights
function rankology_ps_url_callback() {
    $options = get_option('rankology_instant_indexing_option_namepspeed');

    if (isset($_GET['data_permalink'])) {
        $check   = $_GET['data_permalink'];
    } else {
        $check   = isset($options['rankology_ps_url']) ? $options['rankology_ps_url'] : get_home_url();
    }

    printf(
    '<input id="rankology_ps_url" type="text" name="rankology_instant_indexing_option_namepspeed[rankology_ps_url]" aria-label="' . __('Enter a URL to analyse with Page Speed Insights', 'wp-rankology') . '" placeholder="' . esc_html__('Enter a URL to analyse with Page Speed Insights', 'wp-rankology') . '" value="%s">',
    esc_html($check)
    ); ?>

    <p class="rankology-help description">
        <?php esc_html_e('Leave this field empty to analyse homepage', 'wp-rankology'); ?>
    </p>

    <?php
}
function rankology_ps_api_key_callback() {
    $options = get_option('rankology_instant_indexing_option_namepspeed');
    $check   = isset($options['rankology_ps_api_key']) ? $options['rankology_ps_api_key'] : null;

    printf(
    '<input id="rankology_ps_api_key" type="text" name="rankology_instant_indexing_option_namepspeed[rankology_ps_api_key]" aria-label="' . __('Google Page Speed Insights API key', 'wp-rankology') . '" placeholder="' . esc_html__('Enter your Page Speed Insights API key', 'wp-rankology') . '" value="%s">',
    esc_html($check)
    );

    include_once dirname(dirname(__FILE__)) . '/sections/PageSpeedReport.php';
}
