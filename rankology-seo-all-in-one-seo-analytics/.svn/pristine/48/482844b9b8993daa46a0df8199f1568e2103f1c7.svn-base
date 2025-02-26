<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_rewrite_search_callback() {
    $options = get_option('rankology_fno_option_name');
    $check   = isset($options['rankology_rewrite_search']) ? esc_attr($options['rankology_rewrite_search']) : null; ?>

<input type="text" name="rankology_fno_option_name[rankology_rewrite_search]"
    placeholder="<?php esc_html_e('Search results base', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Search results base, e.g. "search-results" without quotes', 'wp-rankology'); ?>"
    value="<?php echo $check; ?>" />

<p class="description">
    <?php esc_html_e('Flush your permalinks each time you edit this setting.', 'wp-rankology'); ?>
</p>

<?php
}
