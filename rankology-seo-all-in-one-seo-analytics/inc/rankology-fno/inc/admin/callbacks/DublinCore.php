<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_dublin_core_enable_callback() {
    $options = get_option('rankology_fno_option_name');

    $check = isset($options['rankology_dublin_core_enable']); ?>

<label for="rankology_dublin_core_enable">
    <input id="rankology_dublin_core_enable" name="rankology_fno_option_name[rankology_dublin_core_enable]" type="checkbox"
        <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Enable Dublin Core meta tags (dc.title, dc.description, dc.source, dc.language, dc.relation, dc.subject)', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_dublin_core_enable'])) {
        esc_attr($options['rankology_dublin_core_enable']);
    }
}
