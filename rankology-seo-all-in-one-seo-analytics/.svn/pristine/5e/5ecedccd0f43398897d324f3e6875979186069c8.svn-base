<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_rich_snippets_enable_callback() {
    $options = get_option('rankology_fno_option_name');

    $check = isset($options['rankology_rich_snippets_enable']); ?>

<label for="rankology_rich_snippets_enable">
    <input id="rankology_rich_snippets_enable" name="rankology_fno_option_name[rankology_rich_snippets_enable]"
        type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Enable Structured Data Types metabox for your posts, pages and custom post types', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_rich_snippets_enable'])) {
        esc_attr($options['rankology_rich_snippets_enable']);
    }
}

function rankology_rich_snippets_publisher_logo_callback() {
    $options = get_option('rankology_fno_option_name');

    $options_set = isset($options['rankology_rich_snippets_publisher_logo']) ? esc_attr($options['rankology_rich_snippets_publisher_logo']) : null;

    $options_set2 = isset($options['rankology_rich_snippets_publisher_logo_width']) ? esc_attr($options['rankology_rich_snippets_publisher_logo_width']) : null;
    $options_set3 = isset($options['rankology_rich_snippets_publisher_logo_height']) ? esc_attr($options['rankology_rich_snippets_publisher_logo_height']) : null;

    $check = isset($options['rankology_rich_snippets_publisher_logo']); ?>

<input id="rankology_rich_snippets_publisher_logo_meta" autocomplete="off" type="text"
    value="<?php echo $options_set; ?>"
    name="rankology_fno_option_name[rankology_rich_snippets_publisher_logo]"
    aria-label="<?php esc_html_e('Upload your publisher logo', 'wp-rankology'); ?>"
    placeholder="<?php esc_html_e('Select your logo', 'wp-rankology'); ?>" />

<input id="rankology_rich_snippets_publisher_logo_width" type="hidden"
    value="<?php echo $options_set2; ?>"
    name="rankology_fno_option_name[rankology_rich_snippets_publisher_logo_width]" />
<input id="rankology_rich_snippets_publisher_logo_height" type="hidden"
    value="<?php echo $options_set3; ?>"
    name="rankology_fno_option_name[rankology_rich_snippets_publisher_logo_height]" />

<input id="rankology_rich_snippets_publisher_logo_upload" class="btn btnSecondary" type="button"
    value="<?php esc_html_e('Upload an Image', 'wp-rankology'); ?>" />

<input id="rankology_rich_snippets_publisher_logo_remove" class="btn btnLink is-deletable" type="button" value="<?php esc_html_e('Remove', 'wp-rankology'); ?>" />

<p class="rankology-help description">
    <?php esc_html_e('A logo that is representative of the organization. Files must be JPG, PNG, GIF, WebP or SVG. The image must be 150x150px, at minimum.', 'wp-rankology'); ?>
</p>

<div id="rankology_rich_snippets_publisher_logo_placeholder_upload" class="rankology-img-placeholder" data_caption="<?php esc_html_e('Click to select an image', 'wp-rankology'); ?>">
    <img id="rankology_rich_snippets_publisher_logo_placeholder_src" src="<?php echo $options_set; ?>" />
</div>

<?php
    if (isset($options['rankology_rich_snippets_publisher_logo'])) {
        esc_attr($options['rankology_rich_snippets_publisher_logo']);
    }
}

function rankology_rich_snippets_site_nav_callback() {
    $options = get_option('rankology_fno_option_name');

    $selected = isset($options['rankology_rich_snippets_site_nav']) ? $options['rankology_rich_snippets_site_nav'] : null; ?>

<select id="rankology_rich_snippets_site_nav" name="rankology_fno_option_name[rankology_rich_snippets_site_nav]">
    <option <?php if ('none' == $selected) { ?>
        selected="selected"
        <?php } ?>
        value="none"><?php esc_html_e('None', 'wp-rankology'); ?>
    </option>

    <?php if (function_exists('wp_get_nav_menus')) {
        $menus = wp_get_nav_menus();
        if ( ! empty($menus)) {
            foreach ($menus as $menu) { ?>
    <option <?php if (esc_attr($menu->term_id) == $selected) { ?>
        selected="selected"
        <?php } ?>
        value="<?php esc_attr_e($menu->term_id); ?>"><?php esc_html_e($menu->name); ?>
    </option>
    <?php }
        }
    } ?>
</select>

<p class="description">
    <?php esc_html_e('Select your primary navigation. This can help search engines better understand the structure of your site.', 'wp-rankology'); ?>
</p>

<p class="description">
    <?php esc_html_e('This schema will be printed in the source code of your homepage.', 'wp-rankology'); ?>
</p>

<?php if (isset($options['rankology_rich_snippets_site_nav'])) {
        esc_attr($options['rankology_rich_snippets_site_nav']);
    }
}
