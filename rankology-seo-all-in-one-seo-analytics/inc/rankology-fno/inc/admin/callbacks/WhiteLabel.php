<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_white_label_admin_header_callback() {
    if (is_network_admin() && is_multisite()) {
        $options = get_option('rankology_fno_mu_option_name');

        $check = isset($options['rankology_mu_white_label_admin_header']); ?>

<label for="rankology_mu_white_label_admin_header">
    <input id="rankology_mu_white_label_admin_header"
        name="rankology_fno_mu_option_name[rankology_mu_white_label_admin_header]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>
    <?php esc_html_e('Remove all blocks except SEO settings from the SEO dashboard including Onboarding, SEO News, Notifications Center, Get started, Go Insights, SEO Tools and more', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_mu_white_label_admin_header'])) {
            esc_attr($options['rankology_mu_white_label_admin_header']);
        }
    } else {
        $options = get_option('rankology_fno_option_name');

        $check = isset($options['rankology_white_label_admin_header']); ?>

<label for="rankology_white_label_admin_header">
    <input id="rankology_white_label_admin_header" name="rankology_fno_option_name[rankology_white_label_admin_header]"
        type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>
    <?php esc_html_e('Remove all blocks except SEO settings from the SEO dashboard including Onboarding, SEO News, Notifications Center, Get started, Go Insights, SEO Tools and more', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_white_label_admin_header'])) {
            esc_attr($options['rankology_white_label_admin_header']);
        }
    }
}

function rankology_white_label_admin_menu_callback() {
    if (is_network_admin() && is_multisite()) {
        $options = get_option('rankology_fno_mu_option_name');
        $check = isset($options['rankology_mu_white_label_admin_menu']) ? esc_attr($options['rankology_mu_white_label_admin_menu']) : null; ?>

<input type="text" name="rankology_fno_mu_option_name[rankology_mu_white_label_admin_menu]"
    placeholder="<?php esc_html_e('Enter your dashicons CSS class name', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('CSS Dashicons class name without quotes', 'wp-rankology'); ?>"
    value="<?php echo esc_attr($check); ?>" />
<?php
    } else {
        $options = get_option('rankology_fno_option_name');
        $check = isset($options['rankology_white_label_admin_menu']) ? esc_attr($options['rankology_white_label_admin_menu']) : null; ?>
<input type="text" name="rankology_fno_option_name[rankology_white_label_admin_menu]"
    placeholder="<?php esc_html_e('Enter your dashicons CSS class name', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('CSS Dashicons class name without quotes', 'wp-rankology'); ?>"
    value="<?php echo esc_attr($check); ?>" />
<?php
    } ?>

<p class="description">
    <a class="rankology-help" href="https://developer.wordpress.org/resource/dashicons/" target="_blank">
        <?php esc_html_e('Find your Dashicons CSS class name on the official website', 'wp-rankology'); ?>
    </a>
    <span class="rankology-help dashicons dashicons-redo"></span>
</p>

<?php
}

function rankology_white_label_admin_bar_icon_callback() {
    if (is_network_admin() && is_multisite()) {
        $options = get_option('rankology_fno_mu_option_name');
        $check = isset($options['rankology_mu_white_label_admin_bar_icon']) ? esc_attr($options['rankology_mu_white_label_admin_bar_icon']) : null; ?>

<input type="text" name="rankology_fno_mu_option_name[rankology_mu_white_label_admin_bar_icon]"
    placeholder="<?php esc_html_e('e.g. <span class="my-custom-icon-class"></span> SEO', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Enter the label of the link for admin bar', 'wp-rankology'); ?>"
    value="<?php echo $check; ?>" />
<?php
    } else {
        $options = get_option('rankology_fno_option_name');
        $check = isset($options['rankology_white_label_admin_bar_icon']) ? esc_attr($options['rankology_white_label_admin_bar_icon']) : null; ?>
<input type="text" name="rankology_fno_option_name[rankology_white_label_admin_bar_icon]"
    placeholder="<?php esc_html_e('e.g. <span class="my-custom-icon-class"></span> SEO', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Enter the label of the link for admin bar', 'wp-rankology'); ?>"
    value="<?php echo $check; ?>" />
<?php
    }
}

function rankology_white_label_admin_title_callback() {
    if (is_network_admin() && is_multisite()) {
        $options = get_option('rankology_fno_mu_option_name');
        $check = isset($options['rankology_mu_white_label_admin_title']) ? esc_attr($options['rankology_mu_white_label_admin_title']) : null; ?>

<input type="text" name="rankology_fno_mu_option_name[rankology_mu_white_label_admin_title]"
    placeholder="<?php esc_html_e('default value: SEO', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Enter the title for the main menu', 'wp-rankology'); ?>"
    value="<?php echo $check; ?>" />
<?php
    } else {
        $options = get_option('rankology_fno_option_name');
        $check = isset($options['rankology_white_label_admin_title']) ? esc_attr($options['rankology_white_label_admin_title']) : null; ?>

<input type="text" name="rankology_fno_option_name[rankology_white_label_admin_title]"
    placeholder="<?php esc_html_e('default value: SEO', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Enter the title for the main menu', 'wp-rankology'); ?>"
    value="<?php echo $check; ?>" />
<?php
    }
}

function rankology_white_label_help_links_callback() {
    if (is_network_admin() && is_multisite()) {
        $options = get_option('rankology_fno_mu_option_name');

        $check = isset($options['rankology_mu_white_label_help_links']); ?>

<label for="rankology_mu_white_label_help_links">
    <input id="rankology_mu_white_label_help_links"
        name="rankology_fno_mu_option_name[rankology_mu_white_label_help_links]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>
    <?php esc_html_e('Hide help icons and Rankology documentation links', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_mu_white_label_help_links'])) {
            esc_attr($options['rankology_mu_white_label_help_links']);
        }
    } else {
        $options = get_option('rankology_fno_option_name');

        $check = isset($options['rankology_white_label_help_links']); ?>

<label for="rankology_white_label_help_links">
    <input id="rankology_white_label_help_links" name="rankology_fno_option_name[rankology_white_label_help_links]"
        type="checkbox" <?php if (' 1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Hide help icons and Rankology documentation links', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_white_label_help_links'])) {
            esc_attr($options['rankology_white_label_help_links']);
        }
    }
}
function rankology_white_label_plugin_list_title_callback() {
    if (is_network_admin() && is_multisite()) {
        $options = get_option('rankology_fno_mu_option_name');
        $check = isset($options['rankology_mu_white_label_plugin_list_title']) ?
    esc_attr($options['rankology_mu_white_label_plugin_list_title']) : null; ?>

<input type="text" name="rankology_fno_mu_option_name[rankology_mu_white_label_plugin_list_title]"
    placeholder="<?php esc_html_e('e.g. SEO plugin', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e(
        'Enter a plugin title',
        'wp-rankology'
    ); ?>" value="<?php echo $check; ?>" />

<?php
    } else {
        $options = get_option('rankology_fno_option_name');
        $check = isset($options['rankology_white_label_plugin_list_title']) ?
    esc_attr($options['rankology_white_label_plugin_list_title']) : null; ?>

<input type="text" name="rankology_fno_option_name[rankology_white_label_plugin_list_title]"
    placeholder="<?php esc_html_e('e.g. SEO plugin', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Enter a plugin title', 'wp-rankology'); ?>"
    value="<?php echo $check; ?>" />

<?php
    }
}
function rankology_white_label_plugin_list_title_pro_callback() {
    if (is_network_admin() && is_multisite()) {
        $options = get_option('rankology_fno_mu_option_name');
        $check = isset($options['rankology_mu_white_label_plugin_list_title_pro']) ?
    esc_attr($options['rankology_mu_white_label_plugin_list_title_pro']) : null; ?>

<input type="text" name="rankology_fno_mu_option_name[rankology_mu_white_label_plugin_list_title_pro]"
    placeholder="<?php esc_html_e('e.g. SEO plugin', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Enter a plugin title', 'wp-rankology'); ?>"
    value="<?php echo $check; ?>" />

<?php
    } else {
        $options = get_option('rankology_fno_option_name');
        $check = isset($options['rankology_white_label_plugin_list_title_pro']) ?
    esc_attr($options['rankology_white_label_plugin_list_title_pro']) : null; ?>

<input type="text" name="rankology_fno_option_name[rankology_white_label_plugin_list_title_pro]"
    placeholder="<?php esc_html_e('e.g. SEO plugin', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Enter a plugin title', 'wp-rankology'); ?>"
    value="<?php echo $check; ?>" />
<?php
    }
}
function rankology_white_label_plugin_list_desc_callback() {
    if (is_network_admin() && is_multisite()) {
        $options = get_option('rankology_fno_mu_option_name');
        $check = isset($options['rankology_mu_white_label_plugin_list_desc']) ?
    esc_attr($options['rankology_mu_white_label_plugin_list_desc']) : null; ?>

<input type="text" name="rankology_fno_mu_option_name[rankology_mu_white_label_plugin_list_desc]"
    placeholder="<?php esc_html_e('e.g. Best SEO WordPress plugin', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Enter a description', 'wp-rankology'); ?>"
    value="<?php echo $check; ?>" />

<?php
    } else {
        $options = get_option('rankology_fno_option_name');
        $check = isset($options['rankology_white_label_plugin_list_desc']) ?
    esc_attr($options['rankology_white_label_plugin_list_desc']) : null; ?>

<input type="text" name="rankology_fno_option_name[rankology_white_label_plugin_list_desc]"
    placeholder="<?php esc_html_e('e.g. Best SEO WordPress plugin', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Enter a description', 'wp-rankology'); ?>"
    value="<?php echo $check; ?>" />

<?php
    }
}
function rankology_white_label_plugin_list_desc_pro_callback() {
    if (is_network_admin() && is_multisite()) {
        $options = get_option('rankology_fno_mu_option_name');
        $check = isset($options['rankology_mu_white_label_plugin_list_desc_pro']) ?
    esc_attr($options['rankology_mu_white_label_plugin_list_desc_pro']) : null; ?>

<input type="text" name="rankology_fno_mu_option_name[rankology_mu_white_label_plugin_list_desc_pro]"
    placeholder="<?php esc_html_e('e.g. Best SEO WordPress plugin', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Enter a description', 'wp-rankology'); ?>"
    value="<?php echo $check; ?>" />

<?php
    } else {
        $options = get_option('rankology_fno_option_name');
        $check = isset($options['rankology_white_label_plugin_list_desc_pro'])
    ? esc_attr($options['rankology_white_label_plugin_list_desc_pro']) : null; ?>

<input type="text" name="rankology_fno_option_name[rankology_white_label_plugin_list_desc_pro]"
    placeholder="<?php esc_html_e('e.g. Best SEO WordPress plugin', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Enter a description', 'wp-rankology'); ?>"
    value="<?php echo $check; ?>" />

<?php
    }
}
function rankology_white_label_plugin_list_author_callback() {
    if (is_network_admin() && is_multisite()) {
        $options = get_option('rankology_fno_mu_option_name');
        $check = isset($options['rankology_mu_white_label_plugin_list_author']) ?
    esc_attr($options['rankology_mu_white_label_plugin_list_author']) : null; ?>

<input type="text" name="rankology_fno_mu_option_name[rankology_mu_white_label_plugin_list_author]"
    placeholder="<?php esc_html_e('e.g. John Doe', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Enter the author name', 'wp-rankology'); ?>"
    value="<?php echo $check; ?>" />

<?php
    } else {
        $options = get_option('rankology_fno_option_name');
        $check = isset($options['rankology_white_label_plugin_list_author']) ?
    esc_attr($options['rankology_white_label_plugin_list_author']) : null; ?>

<input type="text" name="rankology_fno_option_name[rankology_white_label_plugin_list_author]"
    placeholder="<?php esc_html_e('e.g. John Doe', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Enter the author name', 'wp-rankology'); ?>"
    value="<?php echo $check; ?>" />

<?php
    } ?>

<p class="description">
    <?php esc_html_e('This option will apply to both Rankology and Rankology FNO.', 'wp-rankology'); ?>
</p>

<?php
}
function rankology_white_label_plugin_list_website_callback() {
    if (is_network_admin() && is_multisite()) {
        $options = get_option('rankology_fno_mu_option_name');
        $check = isset($options['rankology_mu_white_label_plugin_list_website']) ?
    esc_attr($options['rankology_mu_white_label_plugin_list_website']) : null; ?>

<input type="text" name="rankology_fno_mu_option_name[rankology_mu_white_label_plugin_list_website]"
    placeholder="<?php esc_html_e('e.g. https://www.example.com/', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Enter a website URL', 'wp-rankology'); ?>"
    value="<?php echo $check; ?>" />

<?php
    } else {
        $options = get_option('rankology_fno_option_name');
        $check = isset($options['rankology_white_label_plugin_list_website'])
    ? esc_attr($options['rankology_white_label_plugin_list_website']) : null; ?>

<input type="text" name="rankology_fno_option_name[rankology_white_label_plugin_list_website]"
    placeholder="<?php esc_html_e('e.g. https://www.example.com/', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Enter a website URL', 'wp-rankology'); ?>"
    value="<?php echo $check; ?>" />

<?php
    } ?>

<p class="description">
    <?php esc_html_e('This option will apply to both Rankology and Rankology FNO.', 'wp-rankology'); ?>
</p>

<?php
}
function rankology_white_label_plugin_list_view_details_callback() {
    if (is_network_admin() && is_multisite()) {
        $options = get_option('rankology_fno_mu_option_name');
        $check = isset($options['rankology_mu_white_label_plugin_list_view_details']); ?>

<label for="rankology_mu_white_label_plugin_list_view_details">
    <input id="rankology_mu_white_label_plugin_list_view_details"
        name="rankology_fno_mu_option_name[rankology_mu_white_label_plugin_list_view_details]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Remove View details modal link', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_mu_white_label_plugin_list_view_details'])) {
            esc_attr($options['rankology_mu_white_label_plugin_list_view_details']);
        }
    } else {
        $options = get_option('rankology_fno_option_name');
        $check = isset($options['rankology_white_label_plugin_list_view_details']); ?>

<label for="rankology_white_label_plugin_list_view_details">
    <input id="rankology_white_label_plugin_list_view_details"
        name="rankology_fno_option_name[rankology_white_label_plugin_list_view_details]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Remove View details modal link', 'wp-rankology'); ?>
</label>

<?php
        if (isset($options['rankology_white_label_plugin_list_view_details'])) {
            esc_attr($options['rankology_white_label_plugin_list_view_details']);
        }
    } ?>

<p class="description">
    <?php esc_html_e('This option will apply to both Rankology and Rankology FNO.', 'wp-rankology'); ?>
</p>
<?php
}
function rankology_white_label_menu_pages_callback() {
    $rankology_menu_pages = [
        'rankology-option' => __('SEO', 'wp-rankology'),
        'rankology-titles' => __('Header Metas', 'wp-rankology'),
        'rankology-xml-sitemap' => __('XML / HTML Sitemap', 'wp-rankology'),
        'rankology-social' => __('Social Platforms', 'wp-rankology'),
        'rankology-google-analytics' => __('Analytics', 'wp-rankology'),
        'rankology-advanced' => __('Advanced', 'wp-rankology'),
        'rankology-import-export' => __('Tools', 'wp-rankology'),
        'rankology-bot-batch' => __('BOT', 'wp-rankology'),
        'rankology-license' => __('License', 'wp-rankology'),
        'rankology-fno-page' => __('General Settings', 'wp-rankology'),
        'edit.php?post_type=rankology_404' => __('Redirections', 'wp-rankology'),
        'edit.php?post_type=rankology_bot' => __('Broken links', 'wp-rankology'),
        'edit.php?post_type=rankology_schemas' => __('Schemas', 'wp-rankology'),
    ];

    if (is_network_admin() && is_multisite()) {
        $options = get_option('rankology_fno_mu_option_name');

        foreach ($rankology_menu_pages as $rankology_menu_pages_key => $rankology_menu_pages_value) { ?>
<div class="rankology_wrap_single_cpt">

    <?php $check = isset($options['rankology_mu_white_label_menu_pages'][$rankology_menu_pages_key]['include']); ?>

    <label
        for="rankology_mu_white_label_menu_pages_list[<?php echo $rankology_menu_pages_key; ?>]">

        <input
            id="rankology_mu_white_label_menu_pages_list[<?php echo $rankology_menu_pages_key; ?>]"
            name="rankology_fno_mu_option_name[rankology_mu_white_label_menu_pages][<?php echo $rankology_menu_pages_key; ?>][include]"
            type="checkbox" <?php if (' 1' == $check) { ?>
        checked="yes"
        <?php } ?>
        value="1"/>

        <?php echo $rankology_menu_pages_value; ?>
    </label>
    <?php if (isset($options['rankology_mu_white_label_menu_pages'][$rankology_menu_pages_key]['include'])) {
            esc_attr($options['rankology_mu_white_label_menu_pages'][$rankology_menu_pages_key]['include']);
        } ?>
</div>
<?php }
    } ?>

<p class="description">
    <?php esc_html_e('Users with the "manage_options" capability will still see the menus.', 'wp-rankology'); ?>
</p>
<?php
}
