<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//WooCommerce
function rankology_woocommerce_cart_page_no_index_callback() {
    $options = get_option('rankology_fno_option_name');

    $check = isset($options['rankology_woocommerce_cart_page_no_index']); ?>

<label for="rankology_woocommerce_cart_page_no_index">
    <input id="rankology_woocommerce_cart_page_no_index"
        name="rankology_fno_option_name[rankology_woocommerce_cart_page_no_index]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('noindex', 'wp-rankology'); ?>
</label>

<p class="description">
    <?php esc_html_e('If your theme or plugin displays the cart across your entire WordPress site, don\'t enable this option.', 'wp-rankology'); ?>
</p>

<?php if (isset($options['rankology_woocommerce_cart_page_no_index'])) {
        esc_attr($options['rankology_woocommerce_cart_page_no_index']);
    }
}

function rankology_woocommerce_checkout_page_no_index_callback() {
    $options = get_option('rankology_fno_option_name');

    $check = isset($options['rankology_woocommerce_checkout_page_no_index']); ?>

<label for="rankology_woocommerce_checkout_page_no_index">
    <input id="rankology_woocommerce_checkout_page_no_index"
        name="rankology_fno_option_name[rankology_woocommerce_checkout_page_no_index]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('noindex', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_woocommerce_checkout_page_no_index'])) {
        esc_attr($options['rankology_woocommerce_checkout_page_no_index']);
    }
}

function rankology_woocommerce_customer_account_page_no_index_callback() {
    $options = get_option('rankology_fno_option_name');

    $check = isset($options['rankology_woocommerce_customer_account_page_no_index']); ?>

<label for="rankology_woocommerce_customer_account_page_no_index">
    <input id="rankology_woocommerce_customer_account_page_no_index"
        name="rankology_fno_option_name[rankology_woocommerce_customer_account_page_no_index]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('noindex', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_woocommerce_customer_account_page_no_index'])) {
        esc_attr($options['rankology_woocommerce_customer_account_page_no_index']);
    }
}

function rankology_woocommerce_product_og_price_callback() {
    $options = get_option('rankology_fno_option_name');

    $check = isset($options['rankology_woocommerce_product_og_price']); ?>

<label for="rankology_woocommerce_product_og_price">
    <input id="rankology_woocommerce_product_og_price"
        name="rankology_fno_option_name[rankology_woocommerce_product_og_price]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>
    <?php esc_html_e('Add product:price:amount meta for product', 'wp-rankology'); ?>
</label>

<pre><?php echo esc_html('<meta property="product:price:amount" content="99" />'); ?></pre>

<?php if (isset($options['rankology_woocommerce_product_og_price'])) {
        esc_attr($options['rankology_woocommerce_product_og_price']);
    }
}

function rankology_woocommerce_product_og_currency_callback() {
    $options = get_option('rankology_fno_option_name');

    $check = isset($options['rankology_woocommerce_product_og_currency']); ?>

<label for="rankology_woocommerce_product_og_currency">
    <input id="rankology_woocommerce_product_og_currency"
        name="rankology_fno_option_name[rankology_woocommerce_product_og_currency]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>
    <?php esc_html_e('Add product:price:currency meta for product', 'wp-rankology'); ?>
</label>

<pre><?php echo esc_html('<meta property="product:price:currency" content="USD" />'); ?></pre>

<?php if (isset($options['rankology_woocommerce_product_og_currency'])) {
        esc_attr($options['rankology_woocommerce_product_og_currency']);
    }
}

function rankology_woocommerce_meta_generator_callback() {
    $options = get_option('rankology_fno_option_name');

    $check = isset($options['rankology_woocommerce_meta_generator']); ?>

<label for="rankology_woocommerce_meta_generator">
    <input id="rankology_woocommerce_meta_generator" name="rankology_fno_option_name[rankology_woocommerce_meta_generator]"
        type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Remove WooCommerce meta generator', 'wp-rankology'); ?>
</label>

<pre><?php echo esc_html('<meta name="generator" content="WooCommerce 8.0" />'); ?></pre>

<?php if (isset($options['rankology_woocommerce_meta_generator'])) {
        esc_attr($options['rankology_woocommerce_meta_generator']);
    }
}

function rankology_woocommerce_schema_output_callback() {
    $options = get_option('rankology_fno_option_name');

    $check = isset($options['rankology_woocommerce_schema_output']); ?>

<label for="rankology_woocommerce_schema_output">
    <input id="rankology_woocommerce_schema_output" name="rankology_fno_option_name[rankology_woocommerce_schema_output]"
        type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Remove default JSON-LD structured data (WooCommerce 3+)', 'wp-rankology'); ?>
</label>

<p class="description">
    <?php printf(__('You can disable it and create your own <a href="%s">automatic product schema</a>.', 'wp-rankology'), esc_url(admin_url('edit.php?post_type=rankology_schemas'))); ?>
</p>

<?php if (isset($options['rankology_woocommerce_schema_output'])) {
        esc_attr($options['rankology_woocommerce_schema_output']);
    }
}

function rankology_woocommerce_schema_breadcrumbs_output_callback() {
    $options = get_option('rankology_fno_option_name');

    $check = isset($options['rankology_woocommerce_schema_breadcrumbs_output']); ?>

<label for="rankology_woocommerce_schema_breadcrumbs_output">
    <input id="rankology_woocommerce_schema_breadcrumbs_output"
        name="rankology_fno_option_name[rankology_woocommerce_schema_breadcrumbs_output]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Remove default breadcrumbs JSON-LD structured data (WooCommerce 3+)', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_woocommerce_schema_breadcrumbs_output'])) {
        esc_attr($options['rankology_woocommerce_schema_breadcrumbs_output']);
    }
}
