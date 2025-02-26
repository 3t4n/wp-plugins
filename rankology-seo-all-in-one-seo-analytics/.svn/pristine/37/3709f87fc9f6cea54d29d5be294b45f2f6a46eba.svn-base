<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_fno_advanced_appearance_ps_col_callback() {
    $options = get_option('rankology_advanced_option_name');

    $check = isset($options['rankology_advanced_appearance_ps_col']); ?>

<label for="rankology_advanced_appearance_ps_col">
	<input id="rankology_advanced_appearance_ps_col"
		name="rankology_advanced_option_name[rankology_advanced_appearance_ps_col]" type="checkbox" <?php if ('1' == $check) { ?>
	checked="yes"
	<?php } ?>
	value="1"/>

	<?php esc_html_e('Display Page Speed column to check performances', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_advanced_appearance_ps_col'])) {
        esc_attr($options['rankology_advanced_appearance_ps_col']);
    }
}

function rankology_fno_advanced_appearance_search_console_callback() {
        $options = get_option('rankology_advanced_option_name');

        $check = isset($options['rankology_advanced_appearance_search_console']); ?>

    <label for="rankology_advanced_appearance_search_console">
        <input id="rankology_advanced_appearance_search_console"
            name="rankology_advanced_option_name[rankology_advanced_appearance_search_console]" type="checkbox" <?php if ('1' == $check) { ?>
        checked="yes"
        <?php } ?>
        value="1"/>

        <?php esc_html_e('Display Search Console Data (clicks, impressions, CTR, positions)', 'wp-rankology');
    ?>
</label>

<?php if (isset($options['rankology_advanced_appearance_search_console'])) {
		esc_attr($options['rankology_advanced_appearance_search_console']);
	}
}
