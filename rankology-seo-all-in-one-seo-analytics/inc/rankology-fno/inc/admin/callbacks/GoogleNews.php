<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//Google News
function rankology_news_enable_callback() {
    $options = get_option('rankology_fno_option_name');

    $check = isset($options['rankology_news_enable']); ?>

<label for="rankology_news_enable">
    <input id="rankology_news_enable" name="rankology_fno_option_name[rankology_news_enable]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Enable Google News Sitemap', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_news_enable'])) {
        esc_attr($options['rankology_news_enable']);
    }
}

function rankology_news_name_callback() {
    $options = get_option('rankology_fno_option_name');
    $check   = isset($options['rankology_news_name']) ? $options['rankology_news_name'] : null;

    printf(
    '<input type="text" name="rankology_fno_option_name[rankology_news_name]" aria-label="' . __('Publication Name', 'wp-rankology') . '" placeholder="' . esc_html__('Enter your Google News Publication Name', 'wp-rankology') . '" value="%s"></textarea>',
    esc_html($check)
    );
}

function rankology_news_name_post_types_list_callback() {
    $options = get_option('rankology_fno_option_name');

    $check = isset($options['rankology_news_name_post_types_list']);

    global $wp_post_types;

    $args = [
        'show_ui' => true,
    ];

    $output   = 'objects'; // names or objects, note names is the default
    $operator = 'and'; // 'and' or 'or'

    $post_types = get_post_types($args, $output, $operator);

    foreach ($post_types as $rankology_cpt_key => $rankology_cpt_value) { ?>
<!--List all post types-->
<div class="rankology_wrap_single_cpt">

    <?php
        $check = isset($options['rankology_news_name_post_types_list'][$rankology_cpt_key]['include']);
        ?>
    <label
        for="rankology_xml_sitemap_post_types_list_include[<?php echo $rankology_cpt_key; ?>]">
        <input
            id="rankology_xml_sitemap_post_types_list_include[<?php echo $rankology_cpt_key; ?>]"
            name="rankology_fno_option_name[rankology_news_name_post_types_list][<?php echo $rankology_cpt_key; ?>][include]"
            type="checkbox" <?php if ('1' == $check) { ?>
        checked="yes"
        <?php } ?>
        value="1"/>

        <?php echo $rankology_cpt_value->labels->name; ?>
    </label>

    <?php if (isset($options['rankology_news_name_post_types_list'][$rankology_cpt_key]['include'])) {
            esc_attr($options['rankology_news_name_post_types_list'][$rankology_cpt_key]['include']);
        }
    ?>
</div>

<?php
    }
}
