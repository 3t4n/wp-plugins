<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_breadcrumbs_enable_callback() {
    $options = get_option('rankology_fno_option_namebr');

    $check = isset($options['rankology_breadcrumbs_enable']); ?>

<label for="rankology_breadcrumbs_enable">

   <input id="rankology_breadcrumbs_enable" name="rankology_fno_option_namebr[rankology_breadcrumbs_enable]" type="checkbox"
        <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Enable HTML Breadcrumbs', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_breadcrumbs_enable'])) {
        esc_attr($options['rankology_breadcrumbs_enable']);
    }
}

function rankology_breadcrumbs_enable_json_callback() {
    $options = get_option('rankology_fno_option_namebr');

    $check = isset($options['rankology_breadcrumbs_json_enable']); ?>

<label for="rankology_breadcrumbs_json_enable">
    <input id="rankology_breadcrumbs_json_enable" name="rankology_fno_option_namebr[rankology_breadcrumbs_json_enable]"
        type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Enable JSON-LD Breadcrumbs', 'wp-rankology'); ?>
</label>

<p class="description">
    <?php esc_html_e('To avoid duplicated schemas, don\'t enable this option if HTML Breadcrumbs is ON.', 'wp-rankology'); ?>
</p>
<p class="description">
    <?php esc_html_e('JSON-LD will automatically add to the head using the wp_head hook.', 'wp-rankology'); ?>
</p>

<?php if (isset($options['rankology_breadcrumbs_json_enable'])) {
        esc_attr($options['rankology_breadcrumbs_json_enable']);
    }
}

function rankology_breadcrumbs_separator_callback() {
    $options = get_option('rankology_fno_option_namebr');
    $check = isset($options['rankology_breadcrumbs_separator']) ? $options['rankology_breadcrumbs_separator'] : null;

    printf(
        '<input type="text" class="rankology_breadcrumbs_sep" name="rankology_fno_option_namebr[rankology_breadcrumbs_separator]" aria-label="' . __('Breadcrumbs Separator', 'wp-rankology') . '" placeholder="' . esc_html__('e.g. \ ', 'wp-rankology') . '" value="%s" />',
        esc_html($check)
    ); ?>

<div class="wrap-tags">
    <button type="button" class="btn btnSecondary tag-title" id="rankology-tag-breadcrumbs-1" data-tag="-"><?php esc_html_e('-', 'wp-rankology'); ?></button>
    <button type="button" class="btn btnSecondary tag-title" id="rankology-tag-breadcrumbs-2" data-tag="–"
        class="tag-title"><?php esc_html_e('–', 'wp-rankology'); ?></button>
    <button type="button" class="btn btnSecondary tag-title" id="rankology-tag-breadcrumbs-3" data-tag=">"
        class="tag-title"><?php esc_html_e('>', 'wp-rankology'); ?></button>
    <button type="button" class="btn btnSecondary tag-title" id="rankology-tag-breadcrumbs-4" data-tag="<"
        class="tag-title"><?php esc_html_e('<', 'wp-rankology'); ?></button>
    <button type="button" class="btn btnSecondary tag-title" id="rankology-tag-breadcrumbs-5" data-tag="|"
        class="tag-title"><?php esc_html_e('|', 'wp-rankology'); ?></button>
</div>

<?php
}

function rankology_breadcrumbs_cpt_callback() {
    $none = ['name' => 'none', 'label' => 'None'];
    $none = json_decode(json_encode($none));
    $none_a['none'] = $none;

    $serviceWpData = rankology_get_service('WordPressData');

    if ( ! $serviceWpData || ! method_exists($serviceWpData, 'getTaxonomies')) {
        $tax = [];
    } else {
        $tax = $serviceWpData->getTaxonomies();
    }

    if ( ! empty($tax)) {
        foreach ($tax as $taxonomy) { ?>
<h3><?php esc_html_e($taxonomy->label); ?> <em><small>(<?php esc_html_e($taxonomy->name); ?>)</small></em></h3>

<select id="rankology_breadcrumbs_cpt"
    name="rankology_fno_option_namebr[rankology_breadcrumbs_cpt][<?php echo $taxonomy->name; ?>][cpt]">

    <?php

            if ( ! $serviceWpData) {
                $cpt = [];
            } else {
                $cpt = $serviceWpData->getPostTypes();
            }
            unset($cpt['page']);
            $cpt = array_merge($none_a, $cpt);

            if ( ! empty($cpt)) {
                foreach ($cpt as $post_type) {
                    $options = get_option('rankology_fno_option_namebr');

                    $selected = isset($options['rankology_breadcrumbs_cpt'][$taxonomy->name]['cpt']) ? $options['rankology_breadcrumbs_cpt'][$taxonomy->name]['cpt'] : null; ?>

    <option <?php if (esc_attr($post_type->name) == $selected) { ?>
        selected="selected"
        <?php } ?>
        value="<?php esc_attr_e($post_type->name); ?>"><?php esc_html_e($post_type->label); ?>
    </option>

    <?php if (isset($options['rankology_breadcrumbs_cpt'][$taxonomy->name]['cpt'])) {
                        esc_attr($options['rankology_breadcrumbs_cpt'][$taxonomy->name]['cpt']);
                    }
                }
            }?>
</select>
<?php }
    }
}

function rankology_breadcrumbs_tax_callback() {
    $none = ['name' => 'none', 'label' => 'None'];
    $none = json_decode(json_encode($none));
    $none_a['none'] = $none;

    $serviceWpData = rankology_get_service('WordPressData');
    $cpt = [];
    if ($serviceWpData) {
        $cpt = $serviceWpData->getPostTypes();
    }

    if ( ! empty($cpt)) {
        foreach ($cpt as $post_type) { ?>
<h3><?php esc_html_e($post_type->label); ?> <em><small>(<?php esc_html_e($post_type->name); ?>)</small></em></h3>

<select id="rankology_breadcrumbs_tax"
    name="rankology_fno_option_namebr[rankology_breadcrumbs_tax][<?php echo $post_type->name; ?>][tax]">

    <?php

        $serviceWpData = rankology_get_service('WordPressData');
        $tax = [];
        if ($serviceWpData && method_exists($serviceWpData, 'getTaxonomies')) {
            $tax = $serviceWpData->getTaxonomies();
        }

        $tax = array_merge($none_a, $tax);

        if ( ! empty($tax)) {
            foreach ($tax as $taxonomy) {
                $options = get_option('rankology_fno_option_namebr');

                $selected = isset($options['rankology_breadcrumbs_tax'][$post_type->name]['tax']) ? $options['rankology_breadcrumbs_tax'][$post_type->name]['tax'] : null; ?>

    <option <?php if (esc_attr($taxonomy->name) == $selected) { ?>
        selected="selected"
        <?php } ?>
        value="<?php esc_attr_e($taxonomy->name); ?>"><?php esc_html_e($taxonomy->label); ?>
    </option>

    <?php if (isset($options['rankology_breadcrumbs_tax'][$post_type->name]['tax'])) {
                    esc_attr($options['rankology_breadcrumbs_tax'][$post_type->name]['tax']);
                }
            }
        }?>
</select>
<?php }
    }
}

function rankology_breadcrumbs_remove_blog_page_callback() {
    $options = get_option('rankology_fno_option_namebr');

    $check = isset($options['rankology_breadcrumbs_remove_blog_page']); ?>

<label for="rankology_breadcrumbs_remove_blog_page">
    <input id="rankology_breadcrumbs_remove_blog_page"
        name="rankology_fno_option_namebr[rankology_breadcrumbs_remove_blog_page]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Remove static Posts page defined in WordPress Reading settings', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_breadcrumbs_remove_blog_page'])) {
        esc_attr($options['rankology_breadcrumbs_remove_blog_page']);
    }
}

function rankology_breadcrumbs_remove_shop_page_callback() {
    $options = get_option('rankology_fno_option_namebr');

    $check = isset($options['rankology_breadcrumbs_remove_shop_page']); ?>

<label for="rankology_breadcrumbs_remove_shop_page">
    <input id="rankology_breadcrumbs_remove_shop_page"
        name="rankology_fno_option_namebr[rankology_breadcrumbs_remove_shop_page]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Remove the static Shop page defined in the WooCommerce settings', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_breadcrumbs_remove_shop_page'])) {
        esc_attr($options['rankology_breadcrumbs_remove_shop_page']);
    }
}

function rankology_breadcrumbs_i18n_here_callback() {
    $options = get_option('rankology_fno_option_namebr');
    $check = isset($options['rankology_breadcrumbs_i18n_here']) ? $options['rankology_breadcrumbs_i18n_here'] : null;

    printf(
        '<input type="text" name="rankology_fno_option_namebr[rankology_breadcrumbs_i18n_here]" aria-label="' . __('e.g. You are here: ', 'wp-rankology') . '" placeholder="' . esc_html__('e.g. You are here: ', 'wp-rankology') . '" value="%s" />',
        esc_html($check)
    ); ?>

<p class="description">
    <?php esc_html_e('HTML tags allowed, e.g. <code>span</code>, <code>p</code>...', 'wp-rankology'); ?>
</p>

<?php
}

function rankology_breadcrumbs_i18n_home_callback() {
    $options = get_option('rankology_fno_option_namebr');
    $check = isset($options['rankology_breadcrumbs_i18n_home']) ? $options['rankology_breadcrumbs_i18n_home'] : null;

    printf(
        '<input type="text" name="rankology_fno_option_namebr[rankology_breadcrumbs_i18n_home]" aria-label="' . __('Home', 'wp-rankology') . '" placeholder="' . esc_html__('default: Home', 'wp-rankology') . '" value="%s" />',
        esc_html($check)
    ); ?>
<p class="description">
    <?php esc_html_e('HTML tags allowed, e.g. <code>span</code>, <code>p</code>...', 'wp-rankology'); ?>
</p>
<?php
}

function rankology_breadcrumbs_i18n_author_callback() {
    $options = get_option('rankology_fno_option_namebr');
    $check = isset($options['rankology_breadcrumbs_i18n_author']) ? $options['rankology_breadcrumbs_i18n_author'] : null;

    printf(
        '<input type="text" name="rankology_fno_option_namebr[rankology_breadcrumbs_i18n_author]" aria-label="' . __('Author:', 'wp-rankology') . '" placeholder="' . esc_html__('default: Author:', 'wp-rankology') . '" value="%s" />',
        esc_html($check)
    );
}

function rankology_breadcrumbs_i18n_404_callback() {
    $options = get_option('rankology_fno_option_namebr');
    $check = isset($options['rankology_breadcrumbs_i18n_404']) ? $options['rankology_breadcrumbs_i18n_404'] : null;

    printf(
        '<input type="text" name="rankology_fno_option_namebr[rankology_breadcrumbs_i18n_404]" aria-label="' . __('404 error', 'wp-rankology') . '" placeholder="' . esc_html__('default: 404 error', 'wp-rankology') . '" value="%s" />',
        esc_html($check)
    );
}

function rankology_breadcrumbs_i18n_search_callback() {
    $options = get_option('rankology_fno_option_namebr');
    $check = isset($options['rankology_breadcrumbs_i18n_search']) ? $options['rankology_breadcrumbs_i18n_search'] : null;

    printf(
        '<input type="text" name="rankology_fno_option_namebr[rankology_breadcrumbs_i18n_search]" aria-label="' . __('Search results for: ', 'wp-rankology') . '" placeholder="' . esc_html__('default: Search results for: ', 'wp-rankology') . '" value="%s" />',
        esc_html($check)
    );
}

function rankology_breadcrumbs_i18n_no_results_callback() {
    $options = get_option('rankology_fno_option_namebr');
    $check = isset($options['rankology_breadcrumbs_i18n_no_results']) ? $options['rankology_breadcrumbs_i18n_no_results'] : null;

    printf(
        '<input type="text" name="rankology_fno_option_namebr[rankology_breadcrumbs_i18n_no_results]" aria-label="' . __('No results', 'wp-rankology') . '" placeholder="' . esc_html__('default: No results', 'wp-rankology') . '" value="%s" />',
        esc_html($check)
    );
}

function rankology_breadcrumbs_i18n_attachments_callback() {
    $options = get_option('rankology_fno_option_namebr');
    $check = isset($options['rankology_breadcrumbs_i18n_attachments']) ? $options['rankology_breadcrumbs_i18n_attachments'] : null;

    printf(
        '<input type="text" name="rankology_fno_option_namebr[rankology_breadcrumbs_i18n_attachments]" aria-label="' . __('Attachments', 'wp-rankology') . '" placeholder="' . esc_html__('default: Attachments', 'wp-rankology') . '" value="%s" />',
        esc_html($check)
    );
}

function rankology_breadcrumbs_i18n_paged_callback() {
    $options = get_option('rankology_fno_option_namebr');

    $check = isset($options['rankology_breadcrumbs_i18n_paged']) ? $options['rankology_breadcrumbs_i18n_paged'] : null;

    printf(
        '<input type="text" name="rankology_fno_option_namebr[rankology_breadcrumbs_i18n_paged]" aria-label="' . __('Page ', 'wp-rankology') . '" placeholder="' . esc_html__('default: Page ', 'wp-rankology') . '" value="%s" />',
        esc_html($check)
    );
}

function rankology_breadcrumbs_separator_disable_callback() {
    $options = get_option('rankology_fno_option_namebr');

    $check = isset($options['rankology_breadcrumbs_separator_disable']); ?>

<label for="rankology_breadcrumbs_separator_disable">
    <input id="rankology_breadcrumbs_separator_disable"
        name="rankology_fno_option_namebr[rankology_breadcrumbs_separator_disable]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>
    <?php esc_html_e('My theme is already displaying a separator in my breadcrumbs', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_breadcrumbs_separator_disable'])) {
        esc_attr($options['rankology_breadcrumbs_separator_disable']);
    }
}

function rankology_breadcrumbs_storefront_callback() {
    $options = get_option('rankology_fno_option_namebr');

    $check = isset($options['rankology_breadcrumbs_storefront']); ?>

<label for="rankology_breadcrumbs_storefront">
    <input id="rankology_breadcrumbs_storefront" name="rankology_fno_option_namebr[rankology_breadcrumbs_storefront]"
        type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>
    <?php esc_html_e('Try to automatically override Storefront‘s default breadcrumbs', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_breadcrumbs_storefront'])) {
        esc_attr($options['rankology_breadcrumbs_storefront']);
    }
}
