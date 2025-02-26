<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_bot_scan_settings_post_types_callback() {
    $options = get_option('rankology_bot_option_name');

    global $wp_post_types;

    $args = [
        'show_ui' => true,
        'public' => true,
    ];

    $output = 'objects'; // names or objects, note names is the default
    $operator = 'and'; // 'and' or 'or'

    $post_types = get_post_types($args, $output, $operator);

    foreach ($post_types as $rankology_cpt_key => $rankology_cpt_value) {
        ?>
<!--List all post types-->
<div class="rankology_wrap_single_cpt">

    <?php
        $check = isset($options['rankology_bot_scan_settings_post_types'][$rankology_cpt_key]['include']); ?>

    <label
        for="rankology_bot_scan_settings_post_types_include[<?php echo $rankology_cpt_key; ?>]">
        <input
            id="rankology_bot_scan_settings_post_types_include[<?php echo $rankology_cpt_key; ?>]"
            name="rankology_bot_option_name[rankology_bot_scan_settings_post_types][<?php echo $rankology_cpt_key; ?>][include]"
            type="checkbox" <?php if ('1' == $check) { ?>
        checked="yes"
        <?php } ?>
        value="1"/>

        <?php echo $rankology_cpt_value->labels->name; ?>
    </label>

    <?php if (isset($options['rankology_bot_scan_settings_post_types'][$rankology_cpt_key]['include'])) {
            esc_attr($options['rankology_bot_scan_settings_post_types'][$rankology_cpt_key]['include']);
        } ?>
</div>

<?php
    }
}

function rankology_bot_scan_settings_where_callback() {
    $options = get_option('rankology_bot_option_name');

    $where = ['post_content' => __('Post content', 'wp-rankology'), 'body_page' => __('Source code of your page (extremely slow)', 'wp-rankology')];

    foreach ($where as $key => $value) { ?>
<div class="rankology_wrap_single_cpt">

    <?php if (isset($options['rankology_bot_scan_settings_where'])) {
        $check = $options['rankology_bot_scan_settings_where'];
    } else {
        $check = 'post_content';
    } ?>

    <label
        for="rankology_bot_scan_settings_where_include[<?php echo $key; ?>]">
        <input
            id="rankology_bot_scan_settings_where_include[<?php echo $key; ?>]"
            name="rankology_bot_option_name[rankology_bot_scan_settings_where]" type="radio" <?php if ($key == $check) { ?>
        checked="yes"
        <?php } ?>
        value="<?php echo $key; ?>"/>

        <?php echo $value; ?>
    </label>

    <?php if (isset($options['rankology_bot_scan_settings_where'])) {
        esc_attr($options['rankology_bot_scan_settings_where']);
    } ?>
</div>
<?php }
}

function rankology_bot_scan_settings_number_callback() {
    $options = get_option('rankology_bot_option_name');

    $check = isset($options['rankology_bot_scan_settings_number']); ?>

<input type="number" min="10" name="rankology_bot_option_name[rankology_bot_scan_settings_number]" <?php if ('1' == $check) { ?>
value="<?php echo esc_attr($options['rankology_bot_scan_settings_number']); ?>"
<?php } ?>
value="100"/>

<?php if (isset($options['rankology_bot_scan_settings_number'])) {
        esc_html($options['rankology_bot_scan_settings_number']);
    } ?>
<p class="description">
    <?php esc_html_e('The higher the value, the more time it will take. Min 10. Default: 100', 'wp-rankology'); ?>
</p>

<?php
}

function rankology_bot_scan_settings_type_callback() {
    $options = get_option('rankology_bot_option_name');

    $check = isset($options['rankology_bot_scan_settings_type']); ?>

<label for="rankology_bot_scan_settings_type">
    <input id="rankology_bot_scan_settings_type" name="rankology_bot_option_name[rankology_bot_scan_settings_type]"
        type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Yes', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_bot_scan_settings_type'])) {
        esc_attr($options['rankology_bot_scan_settings_type']);
    }
}

function rankology_bot_scan_settings_404_callback() {
    $options = get_option('rankology_bot_option_name');

    $check = isset($options['rankology_bot_scan_settings_404']); ?>

<label for="rankology_bot_scan_settings_404">
    <input id="rankology_bot_scan_settings_404" name="rankology_bot_option_name[rankology_bot_scan_settings_404]"
        type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Yes', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_bot_scan_settings_404'])) {
        esc_attr($options['rankology_bot_scan_settings_404']);
    }
}

function rankology_bot_scan_settings_timeout_callback() {
    $options = get_option('rankology_bot_option_name');

    $check = isset($options['rankology_bot_scan_settings_timeout']); ?>

<input type="number" min="0" max="60" name="rankology_bot_option_name[rankology_bot_scan_settings_timeout]" <?php if ('1' == $check) { ?>
value="<?php echo esc_attr($options['rankology_bot_scan_settings_timeout']); ?>"
<?php } ?>
value="5"/>

<?php if (isset($options['rankology_bot_scan_settings_timeout'])) {
        esc_html($options['rankology_bot_scan_settings_timeout']);
    } ?>

<p class="description">
    <?php esc_html_e('If the request exceeds x seconds of delay, the link will be considered as down', 'wp-rankology'); ?>
</p>

<?php
}

function rankology_bot_scan_settings_cleaning_callback() {
    $options = get_option('rankology_bot_option_name');

    $check = isset($options['rankology_bot_scan_settings_cleaning']); ?>

<label for="rankology_bot_scan_settings_cleaning">
    <input id="rankology_bot_scan_settings_cleaning" name="rankology_bot_option_name[rankology_bot_scan_settings_cleaning]"
        type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Yes', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_bot_scan_settings_cleaning'])) {
        esc_attr($options['rankology_bot_scan_settings_cleaning']);
    }
}
