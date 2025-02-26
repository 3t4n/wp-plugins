<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_google_analytics_purchases_callback() {
    
    $options = get_option('rankology_google_analytics_option_name');

    $check = isset($options['rankology_google_analytics_purchases']); ?>

<label for="rankology_google_analytics_purchases">
    <input id="rankology_google_analytics_purchases"
        name="rankology_google_analytics_option_name[rankology_google_analytics_purchases]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Measure purchases', 'wp-rankology'); ?>
</label>

<p class="description">
    <?php esc_html_e('Only orders with <code>completed</code> or <code>processing</code> status will be tracked.','wp-rankology'); ?>
</p>


<?php if (isset($options['rankology_google_analytics_purchases'])) {
        esc_attr($options['rankology_google_analytics_purchases']);
    }
}

function rankology_google_analytics_add_to_cart_callback() {
    $options = get_option('rankology_google_analytics_option_name');

    $check = isset($options['rankology_google_analytics_add_to_cart']); ?>

<label for="rankology_google_analytics_add_to_cart">
    <input id="rankology_google_analytics_add_to_cart"
        name="rankology_google_analytics_option_name[rankology_google_analytics_add_to_cart]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Measure additions to shopping carts', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_google_analytics_add_to_cart'])) {
        esc_attr($options['rankology_google_analytics_add_to_cart']);
    }
}

function rankology_google_analytics_remove_from_cart_callback() {
    $options = get_option('rankology_google_analytics_option_name');

    $check = isset($options['rankology_google_analytics_remove_from_cart']); ?>

<label for="rankology_google_analytics_remove_from_cart">
    <input id="rankology_google_analytics_remove_from_cart"
        name="rankology_google_analytics_option_name[rankology_google_analytics_remove_from_cart]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Measure removals from shopping carts', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_google_analytics_remove_from_cart'])) {
        esc_attr($options['rankology_google_analytics_remove_from_cart']);
    }
}
