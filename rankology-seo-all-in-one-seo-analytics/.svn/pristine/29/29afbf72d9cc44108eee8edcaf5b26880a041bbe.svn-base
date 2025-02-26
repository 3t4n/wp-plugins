<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_edd_product_og_price_callback() {
    $options = get_option('rankology_fno_option_name');

    $check = isset($options['rankology_edd_product_og_price']); ?>

<label for="rankology_edd_product_og_price">
    <input id="rankology_edd_product_og_price" name="rankology_fno_option_name[rankology_edd_product_og_price]"
        type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Add product:price:amount meta for product', 'wp-rankology'); ?>
</label>

<pre><?php echo esc_html('<meta property="product:price:amount" content="99" />'); ?></pre>

<?php if (isset($options['rankology_edd_product_og_price'])) {
        esc_attr($options['rankology_edd_product_og_price']);
    }
}

function rankology_edd_product_og_currency_callback() {
    $options = get_option('rankology_fno_option_name');

    $check = isset($options['rankology_edd_product_og_currency']); ?>

<label for="rankology_edd_product_og_currency">
    <input id="rankology_edd_product_og_currency" name="rankology_fno_option_name[rankology_edd_product_og_currency]"
        type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Add product:price:currency meta for product', 'wp-rankology'); ?>
</label>

<pre><?php echo esc_html('<meta property="product:price:currency" content="USD" />'); ?></pre>

<?php if (isset($options['rankology_edd_product_og_currency'])) {
        esc_attr($options['rankology_edd_product_og_currency']);
    }
}

function rankology_edd_meta_generator_callback() {
    $options = get_option('rankology_fno_option_name');

    $check = isset($options['rankology_edd_meta_generator']); ?>

<label for="rankology_edd_meta_generator">
    <input id="rankology_edd_meta_generator" name="rankology_fno_option_name[rankology_edd_meta_generator]" type="checkbox"
        <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Remove EDD meta generator', 'wp-rankology'); ?>
</label>

<pre><?php echo esc_html('<meta name="generator" content="Easy Digital Downloads v3.0" />'); ?></pre>

<?php if (isset($options['rankology_edd_meta_generator'])) {
        esc_attr($options['rankology_edd_meta_generator']);
    }
}
