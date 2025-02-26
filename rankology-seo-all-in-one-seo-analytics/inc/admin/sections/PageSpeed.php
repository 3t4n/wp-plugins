<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rkseo_print_section_info_page_speed() {
    rankology_print_pre_section('page-speed');
    $options = get_option('rankology_instant_indexing_option_namepspeed');
    $url = isset($options['rankology_ps_url']) ? $options['rankology_ps_url'] : get_home_url();
    ?>
    <p>
        <button type="button" class="rankology-request-page-speed btn btnPrimary"
            data_permalink="<?php if (isset($url)) {
                echo esc_html($url);
            } else {
             echo get_home_url();
            } ?>">
            <?php esc_html_e('Analyse with PageSpeed Insights', 'wp-rankology'); ?>
        </button>

        <a href="javascript:window.print()" class="btn btnTertiary">
            <?php esc_html_e('Save as PDF', 'wp-rankology'); ?>
        </a>

        <button type="button" id="rankology-clear-page-speed-cache" class="btn btnTertiary is-deletable">
            <?php esc_html_e('Remove last analysis', 'wp-rankology'); ?>
        </button>

        <span class="spinner"></span>
    </p>
    <?php
}
