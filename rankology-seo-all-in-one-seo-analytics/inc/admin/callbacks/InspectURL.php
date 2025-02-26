<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//Google Search Console API
function rankology_fno_inspect_url_api_callback() {
    $options = get_option('rankology_instant_indexing_option_nameiu');
    $check   = isset($options['rankology_instant_indexing_google_api_key']) ? esc_attr($options['rankology_instant_indexing_google_api_key']) : null;

    printf(
    '<textarea id="rankology_instant_indexing_google_api_key" name="rankology_instant_indexing_option_nameiu[rankology_instant_indexing_google_api_key]" rows="12" placeholder="' . esc_html__('Paste your Google JSON key file here', 'wp-rankology') . '" aria-label="' . __('Paste your Google JSON key file here', 'wp-rankology') . '">%s</textarea>',
    esc_html($check));
}

//Google Search Console Domain Property
function rankology_gsc_domain_property_callback() {
    $options = get_option('rankology_instant_indexing_option_nameiu');

    $check = isset($options['rankology_gsc_domain_property']); ?>

<label for="rankology_gsc_domain_property">
    <input id="rankology_gsc_domain_property" name="rankology_instant_indexing_option_nameiu[rankology_gsc_domain_property]" type="checkbox"
        <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('I‘m using a domain property to add my site in Google Search Console', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_gsc_domain_property'])) {
        esc_attr($options['rankology_gsc_domain_property']);
    }
}

//Google Search Console Date Range
function rankology_gsc_date_range_callback() {
    $options = get_option('rankology_instant_indexing_option_nameiu');

    $selected = isset($options['rankology_gsc_date_range']) ? $options['rankology_gsc_date_range'] : '- 3 months';
    ?>

<select id="rankology_gsc_date_range" name="rankology_instant_indexing_option_nameiu[rankology_gsc_date_range]">
    <?php
        $dates = [
            '- 7 days'        => __('Last 7 days','wp-rankology'),
            '- 28 days'       => __('Last 28 days','wp-rankology'),
            '- 3 months'      => __('Last 3 months (default)','wp-rankology'),
            '- 6 months'      => __('Last 6 months','wp-rankology'),
            '- 12 months'     => __('Last 12 months','wp-rankology'),
            '- 16 months'     => __('Last 16 months','wp-rankology'),
        ];
        if ( ! empty($dates)) {
            foreach ($dates as $key => $date) { ?>
    <option <?php if (esc_attr($key) == $selected) { ?>
        selected="selected"
        <?php } ?>
        value="<?php esc_attr_e($key); ?>"><?php esc_html_e($date); ?>
    </option>
    <?php }
        }
    ?>
</select>

<div class="rankology-notice">
    <p>
        <?php printf(__('To see Google Search Console data from post types list, please enable the GSC columns from <a href="%s">Advanced settings</a>','wp-rankology'), admin_url('admin.php?page=rankology-advanced#tab=tab_rankology_advanced_appearance')); ?>
    </p>

    <p>
        <?php esc_html_e('A schedule task will be executed daily to get your data from Search Console. Click the button below to manually init the data.', 'wp-rankology'); ?>
    </p>
</div>

<p>
    <div id="rankology_launch_bot_search_console" class="btn btnPrimary">
        <?php esc_html_e('Get Insights from Google Search Console', 'wp-rankology'); ?>
    </div>
    <span class="spinner"></span>
</p>
<div class="log"></div>

<?php if (isset($options['rankology_gsc_date_range'])) {
        esc_attr($options['rankology_gsc_date_range']);
    }
}
